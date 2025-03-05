<?php
$servername = "127.0.0.1"; // Use 127.0.0.1 instead of localhost
$username = "root";
$password = "";
$database = "task manager";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

