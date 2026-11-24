<?php
session_start();

require_once "../vendor/autoload.php";
use App\Authenticate;

$auth = new Authenticate();

$auth->signOut();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>B-Tech | Home</title>

    <!-- CSS FILES -->
    <link rel="stylesheet" href="../assets/home.css">
    <link rel="stylesheet" href="../assets/navbar.css">
</head>

<body>



    <?php  include("layout/navbar.php"); ?>


    <header class="hero">
        <div class="hero-content">
            <h1>Welcome to <span>B-Tech</span></h1>
            <p>Your trusted destination for electronics and smart devices.</p>
            <a href="about.php" class="btn">Learn More</a>
        </div>
    </header>


    <main class="home-sections">


        <section class="about">
            <h2>Who We Are</h2>
            <p>
                B-Tech is a leading electronics provider delivering high-quality devices, 
                exceptional warranty, and premium customer service across Egypt.
            </p>
        </section>


        <section class="features">
            <h2>Why Choose B-Tech?</h2>

            <div class="features-container">

                <div class="feature-box">
                    <h3>Wide Range</h3>
                    <p>We offer all electronics you need: mobiles, laptops, TVs, accessories, and more.</p>
                </div>

                <div class="feature-box">
                    <h3>Trusted Quality</h3>
                    <p>All our products come with official warranty and high durability.</p>
                </div>

                <div class="feature-box">
                    <h3>Customer First</h3>
                    <p>We ensure professional support and 24/7 help to our customers.</p>
                </div>

            </div>
        </section>


        <section class="contact-banner">
            <h2>Need Help?</h2>
            <p>Our support team is always here for you. Get in touch anytime.</p>
            <a href="contact.php" class="btn">Contact Us</a>
        </section>

    </main>


    <footer class="footer">
        <p>© 2025 B-Tech. All Rights Reserved.</p>
    </footer>

</body>
</html>