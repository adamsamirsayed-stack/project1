<?php

namespace App;

class Authenticate
{
    public function isAuth(): bool
    {
        return isset($_SESSION['userID']);
    }

    public function redirectIfAuth()
    {
        if ($this->isAuth()) {
            header('Location: home.php');
            exit();
        }
    }

    public function redirectIfNotAuth()
    {
        if (!$this->isAuth()) {
            header('Location: login.php');
            exit();
        }
    }

    public function signUp()
    {
        if (isset($_POST['signUpBtn'])) {

            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirm_password'];

            if ($password != $confirmPassword) {
                \App\Alert::printMessage("Password is not matched", "danger");
                return;
            }

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $db = new DB();
            $insertQuery = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
            $stmt = $db->connection->prepare($insertQuery);
            $stmt->bind_param('sss', $username, $email, $hashedPassword);

            try {
                if ($stmt->execute()) {
                    $_SESSION['signUpSuccess'] = 1;
                    header("Location: login.php");
                    exit();
                }
            } catch (\mysqli_sql_exception $e) {

                // Duplicate email error
                if ($e->getCode() == 1062) {
                    \App\Alert::printMessage("Email already exists!", "danger");
                } else {
                    \App\Alert::printMessage("Something went wrong", "danger");
                }
            }
        }
    }

    public function signin(): void
    {
        if (isset($_POST['logInBtn'])) {

            $email = $_POST['email'];
            $password = $_POST['password'];

            $db = new DB();
            $query = "SELECT * FROM users WHERE email = ?";
            $stmt = $db->connection->prepare($query);
            $stmt->bind_param('s', $email);

            if (!$stmt->execute()) {
                \App\Alert::printMessage("Something went wrong", "danger");
                return;
            }

            $result = $stmt->get_result();

            if ($result->num_rows == 0) {
                \App\Alert::printMessage("Email not found", "danger");
                return;
            }

            $user = $result->fetch_assoc();

            if (!password_verify($password, $user['password'])) {
                \App\Alert::printMessage("Wrong password", "danger");
                return;
            }

            $_SESSION['userID'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            header('Location: products.php');
            exit();
        }
    }

    public function signout()
    {
        if (isset($_GET['logout'])) {
            session_unset();
            session_destroy();
            header('Location: login.php');
            exit();
        }
    }
}
namespace App;

class Cart {
    public function add() {
        // code
    }
}