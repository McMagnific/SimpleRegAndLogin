<?php

$db_name = "localhost";
$db_user = "root";
$db_pass = "";
$db_database = "userdb";
$conn = new mysqli($db_name, $db_user, $db_pass, $db_database);

if ($conn->connect_error) {
    exit("Connection Failed: " . $conn->connect_error);
}

// Prepared Statements
$query_search_user = $conn->prepare("SELECT * FROM users WHERE `username` = ?");
$query_add_user = $conn->prepare("INSERT INTO users (username, password) VALUES (?,?)");
