<?php if (session_status() === PHP_SESSION_NONE) session_start(); ?>

<link rel="stylesheet" href="../assets/navbar.css">

<nav>
  <h2>B<span class="dot">.</span>tech</h2>

  <div class="navbar">
    <div class="nav-center">

        <a href="/project1/pages/home.php" class="btn">Home</a>
        <a href="/project1/pages/aboutus.php" class="btn">About Us</a>
        <a href="/project1/pages/products.php" class="btn">Products</a>
        <a href="/project1/pages/Wishlist.php" class="btn">Wishlist</a>
        <a href="/project1/pages/Cart.php" class="btn">Cart</a>

        <input type="text" class="search" placeholder="Search products...">

        <?php if (isset($_SESSION['userID'])): ?>
            <span>Hi, <?= $_SESSION['username'] ?></span>
            <a href="/project1/pages/signout.php" class="btn secondary">Logout</a>
        <?php else: ?>
            <a href="/project1/pages/login.php" class="btn">Sign In</a>
            <a href="/project1/pages/signup.php" class="btn secondary">Sign Up</a>
        <?php endif; ?>



    </div>
  </div>
</nav>