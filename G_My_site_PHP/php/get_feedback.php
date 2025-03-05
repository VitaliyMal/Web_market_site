<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


// Подключаемся к базе данных
$host = 'MySQL-8.2';
$dbname = 'user_db';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die(json_encode(["error" => "Ошибка подключения: " . $e->getMessage()]));
}

// Получаем все отзывы из таблицы feedback
$query = "SELECT id, name, message FROM feedback";
$stmt = $pdo->prepare($query);
$stmt->execute();

// Преобразуем результат в JSON
$feedback = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($feedback);
?>
 