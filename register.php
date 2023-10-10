<?php
// Include the database configuration file
require_once('config.php');

// Initialize variables to hold user input
$username = $email = $password = '';
$username_error = $email_error = $password_error = '';

// Check if the registration form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and sanitize user input
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];

    // Perform validation (you can add more validation rules)
    if (empty($username)) {
        $username_error = 'Username is required';
    }

    if (empty($email)) {
        $email_error = 'Email is required';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_error = 'Invalid email format';
    }

    if (empty($password)) {
        $password_error = 'Password is required';
    }

    // If there are no validation errors, proceed with registration
    if (empty($username_error) && empty($email_error) && empty($password_error)) {
        // Hash the password for security
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert user data into the database
        $query = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param('sss', $username, $email, $hashed_password);

        if ($stmt->execute()) {
            // Registration successful, redirect to login page
            header('Location: login.php');
            exit();
        } else {
            // Registration failed
            echo 'Registration failed. Please try again.';
        }

        // Close the database connection
        $stmt->close();
    }
}

// Close the database connection
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/style.css">
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    
    <section class="py-60 bg-gray-700">
        <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
        <div class="text-center">
        <h1 class="text-3xl text-white font-semibold mb-4">Resister</h1>
        <form method="post" action="register.php" class="max-w-md mx-auto p-4 bg-white rounded shadow">
            <div class="mb-4">
                <label for="username" class="block text-gray-700 font-bold mb-2">Username:</label>
                <input type="text" id="username" name="username" value="<?php echo $username; ?>" class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500">
                <span class="text-red-500"><?php echo $username_error; ?></span>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-bold mb-2">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $email; ?>" class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500">
                <span class="text-red-500"><?php echo $email_error; ?></span>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-bold mb-2">Password:</label>
                <input type="password" id="password" name="password" class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500">
                <span class="text-red-500"><?php echo $password_error; ?></span>
            </div>
            <div class="text-center">
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Register</button>
            </div>
        </form>
        </div>
        </div>
    </section>

    <footer class="bg-gray-200 py-4">
        <div class="container mx-auto text-center">
        <p>All Right Reserved By Tanvir</p>
        </div>
    </footer>
</body>
</html>
