<?php
// Include the database configuration file
require_once('config.php');

// Check if the user is logged in (add your own authentication logic)
if (!isset($_SESSION['username'])) {
    // Redirect to the login page if the user is not logged in
    header('Location: login.php');
    exit();
}

// Check if a product ID is provided in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the product from the database (you will need to adjust the query based on your database schema)
    $query = "DELETE FROM product WHERE id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('i', $id);

    if ($stmt->execute()) {
        // Product deleted successfully, redirect to the product list page
        header('Location: products.php');
        exit();
    } else {
        // Product deletion failed
        echo 'Failed to delete the product. Please try again.';
    }

    $stmt->close();
} else {
    // No product ID provided in the URL
    header('Location: products.php');
    exit();
}

// Close the database connection
$mysqli->close();
?>
