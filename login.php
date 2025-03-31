<?php include("header.php") ?>

<?php
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

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body class="d-flex flex-column justify-content-center align-items-center">
    <main class="form-signin w-25 m-auto">

        <?php
        if (isset($_GET["error"])) {
            echo '<p class="text-danger">' . "{$_GET["error"]}</p>";
        }
        ?>
        <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
            <h1 class="h3 mb-3 fw-normal">Your information to login</h1>
            <div class="form-floating">
                <input type="username" class="form-control" name="username">
                <label for="username">Your username</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" name="password">
                <label for="password">Your Password</label>
            </div>

            <button class="btn btn-primary w-100 py-2" type="submit" name="submit">Login</button>
        </form>
    </main>
    <?php include("footer.html") ?>
</body>

</html>