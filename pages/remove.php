<?php
ob_start();

require_once __DIR__ . "/../class/DB.php";

$db = new \App\DB();
$conn = $db->connection;

if (!isset($_GET['id'])) {
    header("Location: cart.php");
    exit;
}

$product_id = (int)$_GET['id'];

$conn->query("DELETE FROM cart WHERE product_id = $product_id");

$conn->close();

header("Location: cart.php");
exit;