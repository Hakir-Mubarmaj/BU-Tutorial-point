<?php
// Start the session to access session variables
session_start();

// Check if the user is logged in
if (isset($_SESSION['username'])) {
    // Unset all session variables
    session_unset();

    // Destroy the session
    session_destroy();

    // Redirect to the login page or any other page you prefer
    header('Location: index.php');
    exit();
} else {
    // If the user is not logged in, you can redirect them to the homepage or a login page
    header('Location: index.php');
    exit();
}
?>
