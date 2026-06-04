<?php

session_start();

if(!isset($_SESSION['admin']))
{
    header("Location: login.php");
    exit();
}

$conn = new mysqli(
    "localhost",
    "root",
    "",
    "registration_db"
);

if($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}

$conn->query("DELETE FROM users");

header("Location: index.php?deletedall=1");
exit();

?>