<?php include("header.php") ?>

<?php

if (empty($_SESSION["username"])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Details Page</title>
</head>

<body>
    <h1> Greetings, <?= $_SESSION["username"] ?></h1>
    <p>Details Page only for logged In users</p>
    <?php include("footer.html") ?>

</body>

</html>