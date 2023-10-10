<?php
// Include the database configuration file
require_once('config.php');

// Initialize variables to hold user input
$email = $password = '';
$email_error = $password_error = '';

// Check if the login form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and sanitize user input
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];

    // Perform validation (you can add more validation rules)
    if (empty($email)) {
        $email_error = 'Email is required';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_error = 'Invalid email format';
    }

    if (empty($password)) {
        $password_error = 'Password is required';
    }

    // If there are no validation errors, attempt to log in
    if (empty($email_error) && empty($password_error)) {
        // Fetch user data from the database based on the provided email
        $query = "SELECT username, email, password FROM users WHERE email = ?";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param('s', $email);

        if ($stmt->execute()) {
            $result = $stmt->get_result();

            if ($result->num_rows === 1) {
                $row = $result->fetch_assoc();
                $hashed_password = $row['password'];

                // Verify the provided password against the hashed password
                if (password_verify($password, $hashed_password)) {
                    // Password is correct, set session variables and redirect to a protected page
                    $_SESSION['username'] = $row['username'];
                    header('Location: products.php');
                    exit();
                } else {
                    // Password is incorrect
                    $password_error = 'Incorrect password';
                }
            } else {
                // User with the provided email doesn't exist
                $email_error = 'User not found';
            }
        } else {
            // Database query failed
            echo 'Login failed. Please try again.';
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
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    
    <section class="py-60 bg-gray-700">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="text-center">
        <h1 class="text-3xl text-white font-semibold mb-4">Login</h1>
        <form method="post" action="login.php" class="max-w-md mx-auto p-4 bg-white rounded shadow">
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
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Login</button>
            </div>
            <div class="text-center">
                <p>Don't have an account yet.... <a href="register.php" class="text-blue-500 hover:font-bold">register</a></p>
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
