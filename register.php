<?php
include("db.php");
include("header.php");


if (isset($_POST["submit"])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty($_POST["username"]) || empty($_POST["password"])) {
            header("Location: register.php?error=Please fill all fields");
            exit();
        }

        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
        $password = password_hash($password, HASH_HMAC);

        try {

            $query_add_user->bind_param("ss", $username, $password);
            $query_add_user->execute();
            mysqli_close($conn);

            header("Location: index.php");
            exit();
        } catch (mysqli_sql_exception $e) {
            echo "An error ocurred <br>";
            echo $e->getMessage();
        };
    }
}

require("register.view.php");