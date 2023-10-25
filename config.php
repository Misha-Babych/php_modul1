<?php
$host = "localhost";
$username = "your_username";
$password = "your_password";
$database = "students_db";

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Помилка підключення до бази даних: " . $conn->connect_error);
}
?>
