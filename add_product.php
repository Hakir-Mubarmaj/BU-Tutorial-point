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
$product_name = $product_description = '';
$product_name_error = $product_description_error = $image_error = '';

// Check if the product form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and sanitize user input
	$username = htmlspecialchars($_SESSION['username']);
    $product_name = htmlspecialchars($_POST['product_name']);
    $product_description = htmlspecialchars($_POST['product_description']);

    // Perform validation (you can add more validation rules)
    if (empty($product_name)) {
        $product_name_error = 'Product name is required';
    }

    if (empty($product_description)) {
        $product_description_error = 'Product description is required';
    }

    // Process the uploaded image
    if (isset($_FILES['image'])) {
        $image_name = $_FILES['image']['name'];
        $image_tmp_name = $_FILES['image']['tmp_name'];

        if (empty($image_name)) {
            $image_error = 'Image is required';
        } else {
            // Define the target directory to store the uploaded image
            $target_directory = 'images/';
            $target_file = $target_directory . basename($image_name);

            // Check if the image file is a valid image
            $image_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $valid_image_types = array('jpg', 'jpeg', 'png', 'gif');

            if (!in_array($image_type, $valid_image_types)) {
                $image_error = 'Invalid image file format';
            } else {
                // Move the uploaded image to the target directory
                if (move_uploaded_file($image_tmp_name, $target_file)) {
                    // Image uploaded successfully, save product details to the database
                    $query = "INSERT INTO product (product_name, product_description, username, image_filename) VALUES (?, ?, ?, ?)";
                    $stmt = $mysqli->prepare($query);
                    $stmt->bind_param('ssss', $product_name, $product_description, $username, $image_name);

                    if ($stmt->execute()) {
                        // Product added successfully, redirect to the product list page
                        header('Location: products.php');
                        exit();
                    } else {
                        // Product insertion failed
                        $image_error = 'Failed to add the product. Please try again.';
                    }

                    $stmt->close();
                } else {
                    $image_error = 'Failed to upload the image. Please try again.';
                }
            }
        }
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
    <title>Add Product</title>
    <link rel="stylesheet" href="css/style.css">
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    
    
    <section class="py-60 bg-gray-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
        <h1 class="text-3xl text-white font-semibold mb-4">Add post</h1>
        <form method="post" action="add_product.php" enctype="multipart/form-data" class="max-w-md mx-auto p-4 bg-white rounded shadow">
            <div class="mb-4">
                <label for="product_name" class="block text-gray-700 font-bold mb-2">Caption:</label>
                <input type="text" id="product_name" name="product_name" value="<?php echo $product_name; ?>" class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500">
                <span class="text-red-500"><?php echo $product_name_error; ?></span>
            </div>
            <div class="mb-4">
                <label for="product_description" class="block text-gray-700 font-bold mb-2">Description:</label>
                <textarea id="product_description" name="product_description" class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500"><?php echo $product_description; ?></textarea>
                <span class="text-red-500"><?php echo $product_description_error; ?></span>
            </div>
            <div class="mb-4">
                <label for="image" class="block text-gray-700 font-bold mb-2">Post's Image:</label>
                <input type="file" id="image" name="image" accept="image/jpeg, image/png, image/gif" class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500">
                <span class="text-red-500"><?php echo $image_error; ?></span>
            </div>
            <div class="text-center">
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Add Post</button>
            </div>
        </form>
        </div>
    </section>

    <footer class="bg-gray-200 py-4">
        <div class="container mx-auto text-center">
        <p>All Right Reserved By Tanvir</p>
        </div>
    </footer>
</body>
</html>
