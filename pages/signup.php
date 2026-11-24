<?php
session_start();

use App\Authenticate;

require_once '../vendor/autoload.php';

$auth = new Authenticate();
$auth->signUp();

$error = $auth->error ?? null;
$success = $auth->success ?? null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup</title>
    <link rel="stylesheet" href="../assets/signup.css">
    <script src="../assets/js/alert.js"></script>

    
</head>
<body>

<div class="container">
    <form action="signup.php" method="POST">

        <label>Username</label>
        <input type="text" name="username" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <label>Confirm Password</label>
        <input type="password" name="confirm_password" required>

        <button type="submit" name="signUpBtn">Sign Up</button>

        <p class="login-text">
            Already have an account? <a href="login.php">Login</a>
        </p>

        <?php if(!empty($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>

        <?php if(!empty($success)): ?>
            <div class="success"><?php echo $success; ?></div>
        <?php endif; ?>

    </form>
</div>

</body>
</html> 