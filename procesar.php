<?php


$servername = "localhost";
$username = "root";
$password = "";
$database = "jokoa";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    // Log the error
    error_log("Database connection failed: " . $conn->connect_error);

    // Display a user-friendly error message
    die("Oops! Something went wrong. Please try again later.");
}
?>

