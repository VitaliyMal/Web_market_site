<?php
// Подключаемся к базе данных
$host = 'MySQL-8.2';
$dbname = 'user_db';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Ошибка подключения: " . $e->getMessage());
}

// Проверяем, передан ли ID отзыва
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Приводим к целому числу для безопасности
    
    // Удаляем отзыв из базы данных
    $query = "DELETE FROM feedback WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
    if ($stmt->execute()) {
        echo "Отзыв удален";
    } else {
        echo "Ошибка при удалении";
    }
} else {
    echo "Некорректный запрос";
}
?>
