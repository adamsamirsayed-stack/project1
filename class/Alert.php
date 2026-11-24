<?php

namespace App;

class Alert
{
    public static function printMessage($text, $type)
    {
        echo "<div class='alert alert-$type'>$text</div>";
    }

    public function showSuccessSignUpAlert()
    {
        if (isset($_SESSION['signUpSuccess'])) {
            self::printMessage("Sign Up Successfull", "success");
            unset($_SESSION['signUpSuccess']);
        }
    }
}