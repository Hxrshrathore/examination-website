<?php
session_start();

$servername = "localhost";
$username = "u479778203_admin";
$password = "Harshh@05";
$dbname = "u479778203_exam_website";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");
?>
