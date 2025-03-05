<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: application/json');

$host = 'MySQL-8.2'; 
$dbname = 'user_db';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo json_encode(["error" => "Ошибка подключения: " . $e->getMessage()]);
    exit;
}

// Получение списка пользователей
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $stmt = $pdo->query("SELECT id, email, login, name, second_name, birth_date, isAdmin FROM users");
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    exit;
}

// Обновление пользователя
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $stmt = $pdo->prepare("UPDATE users SET email=?, login=?, name=?, second_name=?, birth_date=?, isAdmin=? WHERE id=?");
    $stmt->execute([$data['email'], $data['login'], $data['name'], $data['second_name'], $data['birth_date'], $data['isAdmin'], $data['id']]);
    echo json_encode(["status" => "success"]);
    exit;
}

// Удаление пользователя
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $data = json_decode(file_get_contents("php://input"), true);
    $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
    $stmt->execute([$data['id']]);
    echo json_encode(["status" => "deleted"]);
    exit;
}

// Добавление нового пользователя
if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    $data = json_decode(file_get_contents('php://input'), true);
    $hashedPassword = password_hash($data['password'], PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("INSERT INTO users (email, login, name, second_name, password, birth_date, isAdmin) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$data['email'], $data['login'], $data['name'], $data['second_name'], $hashedPassword, $data['birth_date'], $data['isAdmin']]);
    echo json_encode(["status" => "added", "id" => $pdo->lastInsertId()]);
    exit;
}

// Обновление пароля
if ($_SERVER['REQUEST_METHOD'] === 'PATCH') {
    $data = json_decode(file_get_contents('php://input'), true);
    $hashedPassword = password_hash($data['password'], PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("UPDATE users SET password = ? WHERE id = ?");
    $stmt->execute([$hashedPassword, $data['id']]);
    echo json_encode(["status" => "success"]);
    exit;
}
?>
