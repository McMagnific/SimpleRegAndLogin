<?php

include("header.php");

if (empty($_SESSION["username"])) {
    header("Location: index.php");
    exit();
}

require("details.view.php");
