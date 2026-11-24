<?php
require_once __DIR__ . "/../class/DB.php";

$db = new \App\DB();
$conn = $db->connection;

if (!isset($_GET['id'], $_GET['action'])) {
    header("Location: cart.php");
    exit;
}

$id = (int) $_GET['id'];
$action = $_GET['action'];

if ($action === "inc") {
    $conn->query("UPDATE cart SET qty = qty + 1 WHERE product_id = $id");
}

if ($action === "dec") {
    $conn->query("UPDATE cart SET qty = qty - 1 WHERE product_id = $id");

    $conn->query("DELETE FROM cart WHERE product_id = $id AND qty <= 0");
}

header("Location: cart.php");
exit;