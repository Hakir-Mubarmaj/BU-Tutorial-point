<?php
// Include the database configuration file
require_once('config.php');

// Check if the user is logged in (add your own authentication logic)
if (!isset($_SESSION['username'])) {
    // Redirect to the login page if the user is not logged in
    header('Location: login.php');
    exit();
}

// Initialize variables to hold product input
$username = $comment = $p_id = '';
$username_error = $comment_error = '';

// Check if the product form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and sanitize user input
    $username = htmlspecialchars($_SESSION['username']);
    $comment = htmlspecialchars($_POST['comment']);
    $p_id = $_POST['post_id'];

    // Perform validation (you can add more validation rules)
   

    if (empty($comment)) {
        $comment_error = 'comment is required';
    }


    $query = "INSERT INTO comment (username, comment,p_id) VALUES (?, ?, ?)";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('ssi', $username, $comment,$p_id);

    if ($stmt->execute()) {
    header('Location: products.php');
    exit();
	}
}

// Close the database connection
$mysqli->close();
?>

