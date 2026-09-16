<?php
// STEP 1: Connect PHP to MySQL.
$host = "localhost";
$user = "root";
$pass = "";
$db   = "sianmanlapaz";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>
