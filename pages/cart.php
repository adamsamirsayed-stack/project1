<?php
require_once __DIR__ . "/../class/DB.php";

$db = new \App\DB();
$conn = $db->connection;

/* ================= QTY UPDATE (NO AJAX) ================= */
if (isset($_GET['action'], $_GET['id'])) {

    $id = (int) $_GET['id'];

    if ($_GET['action'] === 'inc') {
        $conn->query("UPDATE cart SET qty = qty + 1 WHERE product_id = $id");
    }

    if ($_GET['action'] === 'dec') {
        $conn->query("UPDATE cart SET qty = qty - 1 WHERE product_id = $id AND qty > 1");
    }

    header("Location: cart.php");
    exit;
}

/* ================= LOAD CART ================= */
$sql = "
SELECT cart.qty, cart.product_id, products.name, products.price, products.image
FROM cart
JOIN products ON cart.product_id = products.id
";

$result = $conn->query($sql);

$grandTotal = 0;
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Cart</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <style>
        body { background: #f5f5f5; }

        .cart-container {
            max-width: 1000px;
            margin: 50px auto;
        }

        .cart-title {
            text-align: center;
            margin-bottom: 30px;
            font-weight: bold;
        }

        .cart-img {
            width: 60px;
            border-radius: 8px;
        }

        .table {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .total-box {
            text-align: right;
            margin-top: 20px;
            font-size: 20px;
            font-weight: bold;
        }

        .btn-danger {
            font-size: 12px;
            padding: 5px 10px;
        }

        .qty-box {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .qty-btn {
            border: none;
            background: #333;
            color: white;
            padding: 3px 10px;
            border-radius: 5px;
            text-decoration: none;
        }

        .qty-btn:hover {
            background: #555;
            color: white;
        }
    </style>
</head>

<body>

<div class="cart-container">

    <h2 class="cart-title">🛒 My Cart</h2>

    <table class="table table-bordered text-center">

        <thead class="thead-dark">
        <tr>
            <th>Image</th>
            <th>Product</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Total</th>
            <th>Action</th>
        </tr>
        </thead>

        <tbody>

        <?php if ($result->num_rows == 0): ?>
            <tr>
                <td colspan="6">Your cart is empty 😢</td>
            </tr>
        <?php endif; ?>

        <?php while ($item = $result->fetch_assoc()): ?>

            <?php
            $total = $item['price'] * $item['qty'];
            $grandTotal += $total;
            ?>

            <tr id="row-<?php echo $item['product_id']; ?>">

                <td>
                    <img src="uploads/<?php echo $item['image']; ?>" class="cart-img">
                </td>

                <td><?php echo $item['name']; ?></td>

                <td class="price">
                    <?php echo $item['price']; ?>
                </td>

                <td>
                    <div class="qty-box">

                        <a class="qty-btn"
                           href="cart.php?action=dec&id=<?php echo $item['product_id']; ?>">-</a>

                        <span>
                            <?php echo $item['qty']; ?>
                        </span>

                        <a class="qty-btn"
                           href="cart.php?action=inc&id=<?php echo $item['product_id']; ?>">+</a>

                    </div>
                </td>

                <td>
                    <?php echo $total; ?> EGP
                </td>

                <td>
                    <a href="remove.php?id=<?php echo $item['product_id']; ?>"
                       class="btn btn-danger btn-sm">
                        Remove
                    </a>
                </td>

            </tr>

        <?php endwhile; ?>

        </tbody>

    </table>

    <div class="total-box">
        Total: <?php echo $grandTotal; ?> EGP
    </div>

</div>

</body>
</html>