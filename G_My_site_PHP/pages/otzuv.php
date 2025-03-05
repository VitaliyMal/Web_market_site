<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форма обратной связи</title>
    <link rel="stylesheet" href="../css/feedback.css">
</head>

<body>
    <?php require __DIR__ . "/../components/header.php"; ?>

    <div class="feedback-container">
        <h2>Форма обратной связи</h2>
        <form method="POST">
            <label for="name">Имя:</label>
            <input type="text" id="name" name="name" required><br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>

            <label for="message">Сообщение:</label><br>
            <textarea id="message" name="message" rows="5" cols="30" required></textarea><br><br>

            <button type="submit">Отправить</button>
        </form>

        <?php
        $host = 'MySQL-8.2';
        $dbname = 'user_db';
        $username = 'root';
        $password = '';

        try {
            $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password); //подключаемся к бд через PDO
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            if ($_SERVER['REQUEST_METHOD'] === 'POST') { //проверяем была ли отправлена форма

                //получаем данные из формы
                $name = trim($_POST['name']);
                $email = trim($_POST['email']);
                $message = trim($_POST['message']);

                if (!empty($name) && !empty($email) && !empty($message)) { //проверяем, не пустые ли поля

                    //sql запрос для вставки данных
                    $sql = "INSERT INTO feedback (name, email, message) VALUES (:name, :email, :message)";
                    
                    //подготовка sql запроса - передача в поле pdo sql команды
                    $stmt = $pdo->prepare($sql);

                    //привязка параметров
                    $stmt->bindParam(':name', $name);
                    $stmt->bindParam(':email', $email);
                    $stmt->bindParam(':message', $message);

                    //Выполнение запроса
                    $stmt->execute();

                    echo "<p class='success-message'>Спасибо за сообщение</p>";
                } else {
                    echo "<p class='error-message'>Введите данные во все поля формы</p>";
                }
            }

        } catch (PDOException $e) {
            echo "<p class='error-message'>Ошибка подключения к базе данных!</p>";
        }
        ?>
    </div>

    <?php require __DIR__ . "/../components/footer.php"; ?>
</body>

</html>