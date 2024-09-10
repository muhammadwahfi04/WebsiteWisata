<?php
$host = "localhost";
$user = "root";  // Use your MySQL username
$password = "";  // Use your MySQL password
$database = "db_wisata";

$mysqli = new mysqli($host, $user, $password, $database);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>
