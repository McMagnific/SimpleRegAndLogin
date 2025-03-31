
<?php
include("header.php");
include("db.php");

if (isset($_POST["submit"])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty($_POST["username"]) || empty($_POST["password"])) {
            header("Location: login.php?error=Please fill all fields");
            exit();
        }

        $username = $_POST["username"];
        $password = $_POST["password"];

        try {
            $query_search_user->bind_param("s", $username);
            $query_search_user->execute();

            $result = $query_search_user->get_result();
            mysqli_close($conn);
            $pass_verification = password_verify($password, mysqli_fetch_assoc($result)["password"]);

            if (!$pass_verification) {
                header("Location: login.php?error=Your credentials are wrong");
                exit();
            } else {
                $_SESSION["username"] = $username;
                header("Location: details.php");
                exit();
            }
        } catch (mysqli_sql_exception $e) {
            echo "An error ocurred <br>";
            echo $e->getMessage();
        };
    }
}

require("login.view.php");
