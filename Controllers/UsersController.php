<?php
session_start();
require_once "../Models/Users.php";

class UsersController
{
    private static $user;
    private static $userController;

    private function __construct(){}

    public static function getUsersController()
    {
        if (is_null(self::$userController)) {
            self::$userController = new UsersController();
        }
        return self::$userController;
    }

    public static function getUser()
    {
        if (is_null(self::$user)) {
            self::$user = new Users();
        }
        return self::$user;
    }

    public static function register($username, $password, $password_confirmation, $email)
    {
        $errors = 0;
        if (strlen($username) < 3 || strlen($username) > 10) {
            echo "<p>Invalid username.</p>";
            $errors++;

        }
        if (!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $email)) {
            echo "<p>Invalid email.</p>";
            $errors++;
        }
        if ($password != $password_confirmation) {
            echo "<p>Invalid password.</p>";
            $errors++;
        }
        if (strlen($password) < 8 || strlen($password) > 20) {
            echo "<p>Invalid password.</p>";
            $errors++;
        }
        if ($errors == 0) {
            SELF::getUser();
            $create = SELF::$user->create_user($username, md5($password), $email);
            if ($create) {
                header("Location: UsersController.php");
            }
        }
    }
}

$userController = UsersController::getUsersController();
if (isset($_SESSION["username"]) && isset($_SESSION["password"])) {
    if (isset($_GET["action"]) && $_GET["action"] = "logout") {
        $user->log_out();
    }
    require_once "../Views/Articles/blog.php";
} elseif (isset($_GET["action"]) && $_GET["action"] = "register") {
    if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["password_confirmation"]) && isset($_POST["email"])) {
        $userController::register($_POST["username"], $_POST["password"], $_POST["password_confirmation"], $_POST["email"]);
        // $errors = 0;
        // if (strlen($_POST["username"]) < 3 || strlen($_POST["username"]) > 10) {
        //     echo "<p>Invalid username.</p>";
        //     $errors++;

        // }
        // if (!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST["email"])) {
        //     echo "<p>Invalid email.</p>";
        //     $errors++;
        // }
        // if ($_POST["password"] != $_POST["password_confirmation"]) {
        //     echo "<p>Invalid password.</p>";
        //     $errors++;
        // }
        // if (strlen($_POST["password"]) < 8 || strlen($_POST["password"]) > 20) {
        //     echo "<p>Invalid password.</p>";
        //     $errors++;
        // }
        // if ($errors == 0) {
        //     $create = $user->create_user($_POST["username"], md5($_POST["password"]), $_POST["email"]);
        //     if ($create) {
        //         header("Location: UsersController.php");
        //     }
        // }
    }
    require_once "../Views/Users/registration.php";
} else {
    if (isset($_POST["username_connect"]) && isset($_POST["password_connect"])) {
        $login = $user->log_in($_POST["username_connect"], md5($_POST["password_connect"]));
        if ($login) {
            header("Location: UsersController.php");
        }
    }
    require_once "../Views/Users/connexion.php";
}
