<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "crud-db";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$action = $_GET['action'] ?? '';

if ($action == 'create' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    if ($name) {
        $stmt = $conn->prepare("INSERT INTO items (name) VALUES (?)");
        $stmt->bind_param("s", $name);
        $stmt->execute();
        $stmt->close();
    }
}

if ($action == 'read') {
    $result = $conn->query("SELECT * FROM items ORDER BY id DESC");
    $items = [];
    while ($row = $result->fetch_assoc()) {
        $items[] = $row;
    }
    echo json_encode($items);
}

if ($action == 'delete') {
    $id = intval($_GET['id'] ?? 0);
    if ($id > 0) {
        $conn->query("DELETE FROM items WHERE id=$id");
    }
}

$conn->close();
?>
