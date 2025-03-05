<?php
    // Начало сессии, если сессия еще не создана
    //if (session_status() == PHP_SESSION_NONE) {
    if (session_status() == 0) {
        session_start();
    }

    ?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация на сайте</title>
    <link rel="stylesheet" href="../css/login-registration.css">
    <link rel="icon" type="image/png" sizes="16x16" href="../image/Logo/main/mini/site_logo_0.png" />
</head>

<body>
    <script src="../scripts/login-registration.js"></script>
    <div class="card-container">
        <div class="card" id="card">
            <div class="face front">
                <header>
                    <div class="form-container">
                        <h1>Вход в систему</h1>
                        <form class="form-login" action="" method="post">
                            <input type="hidden" name="form_type" value="log">
                            <div>
                                <input id="L_login" type="text" autofocus name="L_login" placeholder="Логин">
                            </div>
                            <div>
                                <input id="L_password" type="password" name="L_password" placeholder="Пароль">
                            </div>
                            <div class="error-message" id="errorMessage" style="color: red;"></div>
                            <div class="button">
                                <button id="submit" type="submit">Вход</button>
                            </div>
                            <div class="button">
                                <button type="button" onclick="flipCard('yes')">Регистрация</button>
                            </div>
                        </form>
                    </div>
                </header>
            </div>
            <div class="face back">
                <header>
                    <div class="form-container1">
                        <form class="form-registration" action="" method="post">
                            <fieldset>
                                <legend>Заполните поля:</legend>
                                <input type="hidden" name="form_type" value="reg">
                                <div><input id="email" type="email" autofocus name="email" placeholder="E-mail"
                                        required></div>
                                <div><input id="login" type="text" name="login" placeholder="Логин" required></div>
                                <div><input id="name" type="text" name="name" placeholder="Имя" required></div>
                                <div><input id="second_name" type="text" name="second_name" placeholder="Фамилия"
                                        required></div>
                                <div><input id="password" type="password" name="password" placeholder="Пароль" required>
                                </div>
                                <div><input id="password2" type="password" name="password2"
                                        placeholder="Повторите пароль" required></div>
                                <div><input id="date" type="date" name="date" required></div>
                                <div class="error-message" id="errorMessage" style="color: red;"></div>
                                <div class="button"><button id="submit-registration"
                                        type="submit">Зарегистрироваться</button></div>
                                <div class="button"><button type="reset">Очистить поля</button></div>
                                <div class="button"><button type="button"
                                        onclick="window.location.href='../index.php'">Вернуться</button></div>
                            </fieldset>
                        </form>
                    </div>
                </header>
            </div>
        </div>
    </div>

    <!-- Модальное окно -->
    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <p id="modal-message"></p>
        </div>
    </div>

    <?php
    $host = 'MySQL-8.2';
    $dbname = 'user_db';
    $username = 'root';
    $password = '';

    try {
        // Подключение к базе данных через PDO
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Сообщение об успешном подключении
        echo "<script>showModal('Успешное подключение к базе данных');</script>";
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['form_type'])) {
                $formType = $_POST['form_type'];

                switch ($formType) {
                    case 'log':
                        // Обработка входа пользователя
                        if (isset($_POST['L_login']) && isset($_POST['L_password'])) {
                            $login = trim($_POST['L_login']);
                            $password = trim($_POST['L_password']);

                            if (!empty($login) && !empty($password)) {
                                // Проверяем логин пользователя в базе данных
                                $stmt = $pdo->prepare("SELECT id, password, isAdmin FROM users WHERE login = :login");
                                $stmt->bindParam(':login', $login);
                                $stmt->execute();
                                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                                if ($user && password_verify($password, $user['password'])) {
                                    $_SESSION['user_id'] = $user['id'];
                                    //setcookie('user_id', $user['id'], time() + (86400 * 30), "/"); // нужно проверить создана ли сессия и подцепиться к существующей
                                    if (!isset($_COOKIE['user_id'])) {
                                        setcookie('user_id', $user['id'], time() + (86400 * 30), "/");
                                    } else {
                                        $_SESSION['user_id'] = $_COOKIE['user_id'];
                                    }

                                    if ($user['isAdmin']) {
                                        //header("Location: ../admin.php");
                                        echo "<script>showModal('Добро пожаловать, $login!');</script>";
                                        echo "<script>setTimeout(function(){ window.location.href = './admin.php'; }, 2000);</script>";
                                        exit;
                                    } else {
                                        //header("Location: ../index.php");
                                        echo "<script>showModal('Добро пожаловать, $login!');</script>";
                                        echo "<script>setTimeout(function(){ window.location.href = '../index.php'; }, 2000);</script>";
                                        exit;
                                    }
                                } else {
                                    echo "<script>showModal('Неверный логин или пароль.');</script>";
                                }
                            } else {
                                echo "<script>showModal('Заполните все поля.');</script>";
                            }
                        }
                        break;

                    case 'reg':
                        // Обработка регистрации пользователя
                        if (isset($_POST['email'], $_POST['login'], $_POST['name'], $_POST['second_name'], $_POST['password'], $_POST['password2'], $_POST['date'])) {
                            $email = trim($_POST['email']);
                            $login = trim($_POST['login']);
                            $name = trim($_POST['name']);
                            $second_name = trim($_POST['second_name']);
                            $password = trim($_POST['password']);
                            $password2 = trim($_POST['password2']);
                            $date = trim($_POST['date']);

                            // Проверка на заполненность всех полей
                            if (!empty($email) && !empty($login) && !empty($name) && !empty($second_name) && !empty($password) && !empty($password2) && !empty($date)) {
                                if ($password === $password2) {
                                    // Хеширование пароля перед сохранением в базу
                                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                                    // Запрос на добавление нового пользователя в базу данных
                                    $stmt = $pdo->prepare("INSERT INTO users (email, login, name, second_name, password, birth_date) VALUES (:email, :login, :name, :second_name, :password, :birth_date)");
                                    $stmt->bindParam(':email', $email);
                                    $stmt->bindParam(':login', $login);
                                    $stmt->bindParam(':name', $name);
                                    $stmt->bindParam(':second_name', $second_name);
                                    $stmt->bindParam(':password', $hashedPassword);
                                    $stmt->bindParam(':birth_date', $date);
                                    $stmt->execute();

                                    echo "<script>showModal('Регистрация успешна!');</script>";
                                } else {
                                    echo "<script>showModal('Пароли не совпадают.');</script>";
                                }
                            } else {
                                echo "<script>showModal('Заполните все поля.');</script>";
                            }
                        }
                        break;

                    default:
                        echo "<script>showModal('Неизвестный тип формы.');</script>";
                        break;
                }
            }
        }
    } catch (PDOException $e) {
        // Вывод ошибки при неудачном подключении к базе данных
        echo "<script>showModal('Ошибка подключения к базе данных: " . $e->getMessage() . "');</script>";
    }
    ?>

</body>

</html>