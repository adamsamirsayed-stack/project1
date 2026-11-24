<?php
require_once __DIR__ . "/../class/DB.php";

$db = new \App\DB();
$conn = $db->connection;

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: products.php");
    exit;
}

$product_id = (int) $_GET['id'];

$check = $conn->query("SELECT qty FROM cart WHERE product_id = $product_id");

if ($check && $check->num_rows > 0) {
    $conn->query("UPDATE cart SET qty = qty + 1 WHERE product_id = $product_id");
} else {
    $conn->query("INSERT INTO cart (product_id, qty) VALUES ($product_id, 1)");
}


$return = $_SERVER['HTTP_REFERER'] ?? 'products.php';

header("Location: $return");
exit;
?>