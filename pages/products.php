<?php
session_start();

require_once "../vendor/autoload.php";

use App\Authenticate;

$auth = new Authenticate();
$auth->redirectIfNotAuth();
?>

<?php include("layout/navbar.php"); ?>

<!DOCTYPE html>
<html lang="en">

<?php if (!empty($_SESSION['error'])): ?>
    <div class="error-message">
        <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
    </div>
<?php endif; ?>

<head>
    <meta charset="UTF-8">
    <title>B-Tech | Products</title>
    <link rel="stylesheet" href="../assets/products.css">
</head>

<body>

<header class="header">
    <h1>Our Products</h1>
    <p>Discover high-quality electronics at the best prices</p>
</header>

<div class="filter-bar">

    <form class="filter-form">
        <label>Category</label>
        <select>
            <option>All</option>
            <option>Mobiles</option>
            <option>TVs</option>
            <option>Laptops</option>
            <option>Watches</option>
            <option>Tablets</option>
            <option>Accessories</option>
        </select>
    </form>

</div>

<div class="products">

    <!-- 1 -->
    <form method="GET" action="cart_add.php" class="product">

        <img src="../images/iphone.jpg">
        <h3>iPhone</h3>
        <span>EGP 48000</span>

        <input type="hidden" name="product_name" value="iPhone">
        <input type="hidden" name="price" value="48000">
        <input type="hidden" name="image" value="iphone.jpg">

        <input type="hidden" name="id" value="34">

        <button type="submit">Add to Cart</button>

    </form>

    <!-- 2 -->
    <form method="GET" action="cart_add.php" class="product">

        <img src="../images/samsung.jpg">
        <h3>Samsung Galaxy S23</h3>
        <p>5G Android Smartphone</p>
        <span>EGP 32,000</span>

        <!-- REQUIRED FIX -->
        <input type="hidden" name="id" value="12">

        <button type="submit">Add to Cart</button>

    </form>

    <!-- 3 -->
    <form method="GET" action="cart_add.php" class="product">

        <img src="../images/tv1.jpg">
        <h3>Samsung 55” Smart TV</h3>
        <p>4K UHD Resolution</p>
        <span>EGP 19,500</span>

        <!-- REQUIRED FIX -->
        <input type="hidden" name="id" value="19">

        <button type="submit">Add to Cart</button>

    </form>

    <!-- 4 -->
    <form method="GET" action="cart_add.php" class="product">

        <img src="../images/tv2.jpg">
        <h3>LG 65” OLED TV</h3>
        <p>OLED Display Technology</p>
        <span>EGP 45,000</span>

        <!-- REQUIRED FIX -->
        <input type="hidden" name="id" value="31">

        <button type="submit">Add to Cart</button>

    </form>

    <!-- 5 -->
    <form method="GET" action="cart_add.php" class="product">

        <img src="../images/laptop1.jpg">
        <h3>Dell Inspiron</h3>
        <p>Core i7 – 16GB RAM</p>
        <span>EGP 28,000</span>


        <input type="hidden" name="id" value="29">

        <button type="submit">Add to Cart</button>

    </form>

    <!-- 6 -->
    <form method="GET" action="cart_add.php" class="product">

        <img src="../images/laptop2.jpg">
        <h3>HP Pavilion</h3>
        <p>Core i5 – SSD</p>
        <span>EGP 22,000</span>


        <input type="hidden" name="id" value="27">

        <button type="submit">Add to Cart</button>

    </form>

    <!-- 7 -->
    <form method="POST" action="cart_add.php" class="product">
        <img src="../images/watch1.jpg">
        <h3>Apple Watch Series 8</h3>
        <p>Health & Fitness Tracking</p>
        <span>EGP 14,000</span>

        <input type="hidden" name="product_name" value="Apple Watch Series 8">
        <input type="hidden" name="price" value="14000">
        <input type="hidden" name="image" value="watch1.jpg">

        <button type="submit" name="add_to_cart">Add to Cart</button>
    </form>

    <!-- 8 -->
    <form method="POST" action="cart_add.php" class="product">
        <img src="../images/watch2.jpg">
        <h3>Samsung Galaxy Watch 5</h3>
        <p>Smart Fitness Watch</p>
        <span>EGP 9,500</span>

        <input type="hidden" name="product_name" value="Samsung Galaxy Watch 5">
        <input type="hidden" name="price" value="9500">
        <input type="hidden" name="image" value="watch2.jpg">

        <button type="submit" name="add_to_cart">Add to Cart</button>
    </form>

    <!-- 9 -->
    <form method="POST" action="cart_add.php" class="product">
        <img src="../images/tablet1.jpg">
        <h3>iPad 10th Gen</h3>
        <p>64GB – Wi-Fi</p>
        <span>EGP 18,000</span>

        <input type="hidden" name="product_name" value="iPad 10th Gen">
        <input type="hidden" name="price" value="18000">
        <input type="hidden" name="image" value="tablet1.jpg">

        <button type="submit" name="add_to_cart">Add to Cart</button>
    </form>

    <!-- 10 -->
    <form method="POST" action="cart_add.php" class="product">
        <img src="../images/tablet2.jpg">
        <h3>Lenovo Tablet M10</h3>
        <p>10.1 Inch Display</p>
        <span>EGP 6,500</span>

        <input type="hidden" name="product_name" value="Lenovo Tablet M10">
        <input type="hidden" name="price" value="6500">
        <input type="hidden" name="image" value="tablet2.jpg">

        <button type="submit" name="add_to_cart">Add to Cart</button>
    </form>

    <!-- 11 -->
    <form method="POST" action="cart_add.php" class="product">
        <img src="../images/headphones.jpg">
        <h3>Sony WH-1000XM5</h3>
        <p>Noise Cancelling</p>
        <span>EGP 12,000</span>

        <input type="hidden" name="product_name" value="Sony WH-1000XM5">
        <input type="hidden" name="price" value="12000">
        <input type="hidden" name="image" value="headphones.jpg">

        <button type="submit" name="add_to_cart">Add to Cart</button>
    </form>

    <!-- 12 -->
    <form method="POST" action="cart_add.php" class="product">
        <img src="../images/speaker.jpg">
        <h3>JBL Bluetooth Speaker</h3>
        <p>Portable Wireless Speaker</p>
        <span>EGP 3,000</span>

        <input type="hidden" name="product_name" value="JBL Speaker">
        <input type="hidden" name="price" value="3000">
        <input type="hidden" name="image" value="speaker.jpg">

        <button type="submit" name="add_to_cart">Add to Cart</button>
    </form>

    <!-- 13 -->
    <form method="POST" action="cart_add.php" class="product">
        <img src="../images/mouse.jpg">
        <h3>Logitech Wireless Mouse</h3>
        <p>Bluetooth + USB</p>
        <span>EGP 650</span>

        <input type="hidden" name="product_name" value="Logitech Mouse">
        <input type="hidden" name="price" value="650">
        <input type="hidden" name="image" value="mouse.jpg">

        <button type="submit" name="add_to_cart">Add to Cart</button>
    </form>

    <!-- 14 -->
    <form method="POST" action="cart_add.php" class="product">
        <img src="../images/keyboard.jpg">
        <h3>Gaming Keyboard</h3>
        <p>RGB Mechanical Keyboard</p>
        <span>EGP 1,200</span>

        <input type="hidden" name="product_name" value="Gaming Keyboard">
        <input type="hidden" name="price" value="1200">
        <input type="hidden" name="image" value="keyboard.jpg">

        <button type="submit" name="add_to_cart">Add to Cart</button>
    </form>

    <!-- 15 -->
    <form method="POST" action="cart_add.php" class="product">
        <img src="../images/powerbank.jpg">
        <h3>Anker Power Bank</h3>
        <p>20000mAh Fast Charging</p>
        <span>EGP 1,400</span>

        <input type="hidden" name="product_name" value="Anker Power Bank">
        <input type="hidden" name="price" value="1400">
        <input type="hidden" name="image" value="powerbank.jpg">

        <button type="submit" name="add_to_cart">Add to Cart</button>
    </form>

    <footer>
        <p>© 2025 B-Tech. All Rights Reserved.</p>
    </footer>

</body>
</html>