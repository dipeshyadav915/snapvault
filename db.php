<?php
$host = "localhost";
$username = "root";
$password = "1234";
$database = "snapvault";
$conn =  mysqli_connect($host, $username, $password, $database);
if (!$conn) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}
session_start();
