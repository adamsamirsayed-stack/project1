<?php
session_start();

use App\Authenticate;

require_once '../vendor/autoload.php';

$alert = new \App\Alert();
$alert->showSuccessSignUpAlert();

$auth = new Authenticate();

$auth->signIn();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>B-Tech | Login</title>
  <link rel="stylesheet" href="../assets/login.css">
  <link rel="stylesheet" href="../assets/navbar.css"> 
  
</head>
<body>
  <?php if(isset($_SESSION['error'])): ?>
    <div id="customAlert" class="custom-alert">
        <?php echo $_SESSION['error']; ?>
    </div>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>

<?php include("../pages/layout/navbar.php"); ?>

<div class="login-container">
    <h2>Login</h2>

    <form method="POST">
      <label>Email</label>
      <input type="email" name="email" required>

      <label>Password</label>
      <input type="password" name="password" required>


      <button type="submit" name="logInBtn">Login</button>
    </form>

    <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
</div>

</body>
</html>