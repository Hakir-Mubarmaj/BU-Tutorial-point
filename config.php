<?php
// Database configuration
$hostname = 'localhost'; // Replace with your database host name
$username = 'root'; // Replace with your database username
$password = ''; // Replace with your database password
$database = 'new_project'; // Replace with your database name

// Create a new database connection
$mysqli = new mysqli($hostname, $username, $password, $database);

// Check the connection
if ($mysqli->connect_error) {
    die('Connection failed: ' . $mysqli->connect_error);
}

// Start a session (if needed for authentication or other purposes)
session_start();
?>
