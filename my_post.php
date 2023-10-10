<?php
// Include the database configuration file
require_once('config.php');
error_reporting(0);
if (!isset($_SESSION['username'])) {
    // Redirect to the login page if the user is not logged in
    header('Location: login.php');
    exit();
}

// Fetch the list of products from the database (you will need to adjust the query based on your database schema)
$query = "SELECT * FROM product";
$result = $mysqli->query($query);
$query = "SELECT * FROM comment";
$result1 = $mysqli->query($query);
$comments = array();

while ($commentRow = $result1->fetch_assoc()) {
    $comments[] = $commentRow;
}

// Close the result set for comments
$result1->close();

// Close the database connection
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
    <link rel="stylesheet" href="css/style.css">
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <header class="bg-blue-500 py-4">
    <?php include 'header.php'; ?>
    </header>
    
    <section class="bg-gray-700">
        <div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        <div class="text-center">
        <h1 class="text-3xl text-white font-semibold mb-4">My Posts</h1></div>
        <div class="grid grid-cols-1 gap-10">
            <?php
            // Loop through the list of products and display them
            $hasPosts = false;
            while ($row = $result->fetch_assoc()) {
                if (strcmp($_SESSION['username'],$row['username'])===0) {
                $hasPosts = true;
                echo '<div class="bg-white rounded shadow p-4 flex">';
                
                // Image on the left with a fixed size
                echo '<div class="w-32 flex-shrink-0 mr-4">';
                echo '<img src="images/' . $row['image_filename'] . '" alt="' . $row['product_name'] . '" class="w-full h-auto">';
                echo '</div>';
                
                // Post title and description on the right
                echo '<div class="flex-grow">';
                echo '<h1 class="text-2xl font-bold mt-2">' . $row['product_name'] . '</h1>';
                echo '<p>' . $row['product_description'] . '</p>';
                echo '<button class="bg-green-500 text-white px-4 py-2 rounded"><a href="edit_product.php?id=' . $row['id'] . '">Edit</a></button>';
				echo '<button class="bg-red-500 text-white px-4 py-2 rounded ml-2"><a href="delete_product.php?id=' . $row['id'] . '">Delete</a></button>';
                
                echo '<div class="bg-gray-300 rounded shadow p-4">';
                echo '<h2 class="text-lg font-semibold mt-2">Comments</h2>';
                $hasComments = false;
                // Display comments initially (hidden by default)
                echo '<div class="mt-4" id="comments-' . $row['id'] . '" style="display: none;">';
                foreach ($comments as $commentRow) {
                    if ($row['id'] === $commentRow['p_id']) {
                        $hasComments = true;
                        echo '<div class="bg-white border p-2 mb-2">';
                        echo '<p class="text-gray-500">' . $commentRow['username'] . ' : ' . $commentRow['comment'] . '</p>';
                        echo '</div>';
                    }
                }
                if (!$hasComments) {
                    echo '<p class="text-gray-500">Be the first to comment</p>';
                }
                echo '</div>';
                
                // Button to see/hide all comments
                echo '<button class="bg-blue-500 text-white px-4 py-2 rounded mt-2" onclick="toggleComments(' . $row['id'] . ')">';
    
                echo '<span id="toggleButtonText-' . $row['id'] . '">See All Comments</span>';
    
                echo '</button>';
                
                // Comment input at the bottom
                echo '<div class="mt-2">';
                echo '<form action="comment.php" method="POST">';
                echo '<input type="hidden" name="post_id" value="' . $row['id'] . '">'; // Hidden input to store the post ID
                echo '<div class="flex items-center border rounded overflow-hidden">';
                echo '<textarea name="comment" class="w-full p-2 border-0" placeholder="Add a reply..."></textarea>';
                echo '<button type="submit" class="bg-blue-500 text-white px-4 py-2">';
                echo '<svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">';
                echo '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>';
                echo '</svg>';
                echo '</button>';
                echo '</div>';
                echo '</form>';
                echo '</div>';

                echo '</div>';
                
                echo '</div>'; // Close the flex-grow div
                
                echo '</div>'; // Close the main div for the post
            }
            }
            if (!$hasPosts) {
                echo '<div class="text-center"><br><br>';
                echo '<h2 class="text-xl text-white font-bold">You have not posted anything yet....</h2>';
                echo '<br><br><br>';
                echo '<h1 class="text-3xl text-white font-bold"><a href="add_product.php" class="hover:text-blue-500">Get Started</a></h1>';
                echo '</div>';
            }
            
            
            
            ?>
        </div>
        </div>
    </section>

    <footer class="bg-gray-200 py-4">
        <div class="container mx-auto text-center">
        <p>All Right Reserved By Tanvir</p>
        </div>
    </footer>
    <script>
    function toggleComments(postId) {
        const commentsSection = document.getElementById('comments-' + postId);
        const buttonText = document.getElementById('toggleButtonText-' + postId);
        
        if (commentsSection.style.display === 'none') {
            commentsSection.style.display = 'block'; // Show comments
            buttonText.textContent = 'Hide Comments'; // Change button text
        } else {
            commentsSection.style.display = 'none'; // Hide comments
            buttonText.textContent = 'See All Comments'; // Change button text
        }
    }
    </script>

</body>
</html>
