<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ-панель</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body>
    <button onclick="window.location.href='../index.php'">На главную</button>
    <button onclick="toggleFeedback()">Редактировать отзывы</button>
    <button id="editUsersBtn">Редактировать пользователей</button>

    <div id="feedback" class="hidden">
        <h2>Отзывы</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Имя</th>
                    <th>Отзыв</th>
                    <th>Действие</th>
                </tr>
            </thead>
            <tbody id="feedback-list">
            </tbody>
        </table>
    </div>

    <div id="usrs" class="hidden">
        <h2>Список пользователей</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Логин</th>
                    <th>Имя</th>
                    <th>Фамилия</th>
                    <th>Дата рождения</th>
                    <th>Админ</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody id="users-list">
            </tbody>
        </table>
        <button id="addUserBtn">Добавить пользователя</button>
    </div>

    <script src="../scripts/admin.js"></script>
    <script src="../scripts/admin_users.js"></script>
   

</body>

</html>
