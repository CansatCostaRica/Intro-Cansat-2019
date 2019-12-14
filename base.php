<?php
$servername = "localhost";
$username = "Fabian";
$password = "fabian14";
$dbname = "cansat";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>