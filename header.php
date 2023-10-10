<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>butp.com</title>
    <link rel="stylesheet" href="css/style.css">
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <header class="bg-blue-500 py-4">
    <nav class="fixed top-0 w-full z-50 bg-gray-900">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-18">
            <div class="flex items-center grid-1 grid gap-8 md:grid-cols-2 lg:grid-cols-4">
            <div class="flex-shrink-0">
              <p class="text-white font-bold flex items-center"><img class="h-16" src="https://i.ibb.co/k2FGtQV/attachment-1494076-removebg-preview.png" alt="">BU TUTORIAL POINT</p>
            </div>
            <div class="nav-mid hidden md:block">
                <ul class="ml-10 flex items-baseline space-x-10">
                <li class="link"><a href="index.php" class="text-gray-400 hover:bg-gray-500 hover:text-white px-8 py-5 text-l font-medium hover:font-bold">Home</a></li>
                <li class="link"><a href="products.php" class="text-gray-400 hover:bg-gray-500 hover:text-white px-8 py-5 text-l font-medium hover:font-bold">Posts</a></li>
                <?php
                // Check if the user is logged in and display appropriate links
                if (isset($_SESSION['username'])) {
                    echo '<li class="link"><a href="logout.php" class="text-gray-400 hover:bg-gray-500 hover:text-white px-8 py-5 text-l font-medium hover:font-bold">Logout</a></li>';
                } else {
                    echo '<li class="link"><a href="login.php" class="text-gray-400 hover:bg-gray-500 hover:text-white px-8 py-5 text-l font-medium hover:font-bold">Login</a></li>';
                }
                ?>
                <li class="link"><a href="add_product.php" class="bg-blue-700 text-white hover:bg-blue-400 hover:text-white px-8 py-5 text-l font-medium hover:font-bold">Add_Posts</a></li>
                </ul>
            </div>
            <div><pre> </pre></div>
            <div class="text-right">
              <?php if (isset($_SESSION['username'])) { echo '<a href="my_post.php" class="text-white font-bold">Login As  '.$_SESSION['username'].'</a>'; }else{echo '<p class="text-white font-bold">Not Loged in</p>';}?>
            </div>
          </div>         
        </div>
      </div>
    </nav>
    </header>
</body>
</html>