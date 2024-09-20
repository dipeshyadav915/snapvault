<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "snapvault";
$conn =  mysqli_connect($host, $username, $password, $database);
if (!$conn) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
} session_start();