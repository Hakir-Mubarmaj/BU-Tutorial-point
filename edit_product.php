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
$id = $product_name = $product_description = '';
$product_name_error = $product_description_error = '';

// Check if a product ID is provided in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the existing product details from the database (you will need to adjust the query based on your database schema)
    $query = "SELECT * FROM product WHERE id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('i', $id);

    if ($stmt->execute()) {
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $product = $result->fetch_assoc();

            // Assign the fetched product details to variables
            $product_name = $product['product_name'];
            $product_description = $product['product_description'];
        } else {
            // Product not found
            header('Location: products.php');
            exit();
        }
    } else {
        // Database query failed
        echo 'Failed to fetch product details.';
    }

    $stmt->close();
} else {
    // No product ID provided in the URL
    header('Location: products.php');
    exit();
}

// Check if the product edit form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and sanitize user input
    $product_name = htmlspecialchars($_POST['product_name']);
    $product_description = htmlspecialchars($_POST['product_description']);

    // Perform validation (you can add more validation rules)
    if (empty($product_name)) {
        $product_name_error = 'Product name is required';
    }

    if (empty($product_description)) {
        $product_description_error = 'Product description is required';
    }

    // If there are no validation errors, update the product in the database
    if (empty($product_name_error) && empty($product_description_error) && empty($product_price_error)) {
        $query = "UPDATE product SET product_name = ?, e_time = NOW(), product_description = ? WHERE id = ?";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param('ssi', $product_name, $product_description, $id);

        if ($stmt->execute()) {
            // Product updated successfully, redirect to the product list page
            header('Location: products.php');
            exit();
        } else {
            // Product update failed
            echo 'Failed to update the product. Please try again.';
        }

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
    <title>Edit Post</title>
    <link rel="stylesheet" href="css/style.css">
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    
    
    <section class="py-60 bg-gray-700">
        <div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        <div class="text-center">
        <h1 class="text-3xl text-white font-semibold mb-4">Edit Post</h1>
        <form method="post" action="edit_product.php?id=<?php echo $id; ?>" class="max-w-md mx-auto p-4 bg-white rounded shadow">
            <div class="mb-4">
                <label for="product_name" class="block text-gray-700 font-bold mb-2">Post caption:</label>
                <input type="text" id="product_name" name="product_name" value="<?php echo $product_name; ?>" class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500">
                <span class="text-red-500"><?php echo $product_name_error; ?></span>
            </div>
            <div class="mb-4">
                <label for="product_description" class="block text-gray-700 font-bold mb-2">Description:</label>
                <textarea id="product_description" name="product_description" class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500"><?php echo $product_description; ?></textarea>
                <span class="text-red-500"><?php echo $product_description_error; ?></span>
            </div>
            <div class="text-center">
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Update Post</button>
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
