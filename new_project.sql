-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2023 at 05:40 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `username`, `comment`, `p_id`) VALUES
(28, 'hakir_mubarmaj', 'How to add session?', 6),
(29, 'Tusher', 'how to define function?', 8),
(30, 'Tusher', 'Another example of object oriented programming?', 9),
(31, 'Tusher', 'How to create action syntex?', 6),
(32, 'Tanvir', 'Why this is an object oriented language?', 9),
(33, 'Tanvir', 'Why this is better than c?', 10),
(34, 'Tanvir', 'Where it use widely?', 11);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_description` varchar(2000) NOT NULL,
  `username` varchar(100) NOT NULL,
  `image_filename` varchar(100) NOT NULL,
  `u_id` int(11) NOT NULL,
  `c_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `e_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `product_description`, `username`, `image_filename`, `u_id`, `c_time`, `e_time`) VALUES
(6, 'PHP Programming Language', 'PHP (Hypertext Preprocessor) is a widely-used server-side scripting language that has played a pivotal role in web development for over two decades. Here&#039;s a 500-word overview of PHP:\r\n\r\n**1. Origins and Purpose:**\r\nPHP was created in 1994 by Rasmus Lerdorf and initially stood for &quot;Personal Home Page.&quot; It has since evolved into &quot;PHP: Hypertext Preprocessor,&quot; emphasizing its role in web development. PHP was designed to serve dynamic web pages and handle server-side tasks, such as processing form data, interacting with databases, and generating HTML content.\r\n\r\n**2. Open Source and Cross-Platform:**\r\nPHP is an open-source language, which means it is freely available for anyone to use and modify. It is also cross-platform, running on various operating systems, including Windows, macOS, and Linux. PHP is compatible with multiple web servers, with the most popular being Apache and Nginx.\r\n\r\n**3. Server-Side Scripting:**\r\nPHP is primarily used for server-side scripting, allowing developers to embed PHP code within HTML files. When a user requests a web page, the server processes the PHP code, generates HTML dynamically, and sends it to the client&#039;s browser. This enables the creation of dynamic and interactive web applications.\r\n\r\n**4. Syntax and Variables:**\r\nPHP syntax is similar to C and other C-based languages, making it relatively easy to learn for developers familiar with these languages. PHP variables are loosely typed, meaning they automatically change their data type based on the assigned value. This flexibility simplifies coding but requires careful handling to avoid unexpected results.\r\n\r\n**5. Data Types and Structures:**\r\nPHP supports various data types, including strings, numbers, booleans, arrays, and objects. It also offers versatile data structures like associative arrays and multidimensional arrays, making it well-suited for handling complex data.', 'Tanvir', 'php.jpg', 0, '2023-10-08 15:06:42', '2023-10-08 15:20:42'),
(7, 'JavaScript Programming language', 'JavaScript (JS) is a versatile and widely-used programming language that has fundamentally shaped the way we interact with the web and build web applications. With a history dating back to the mid-&#039;90s, JavaScript has evolved from a simple scripting language to a powerful, multi-paradigm language that runs not only in web browsers but also on servers, mobile devices, and even Internet of Things (IoT) devices. Here, we&#039;ll delve into the essence of JavaScript, its key features, and its profound impact on modern software development.\r\n\r\n**Dynamic and Versatile:**\r\nJavaScript is a dynamically typed language, which means that variables can change their data types during runtime. This flexibility allows developers to create highly adaptable and responsive applications. It supports multiple programming paradigms, including object-oriented, functional, and imperative styles, giving developers the freedom to choose the best approach for a particular task.\r\n\r\n**The Language of the Web:**\r\nJavaScript is the core technology behind the interactivity of the World Wide Web. It allows developers to enhance static HTML and CSS websites by adding dynamic content, interactivity, and real-time updates. From simple form validation to complex single-page applications (SPAs) like Gmail and Facebook, JavaScript is the driving force.\r\n\r\n**Cross-Browser Compatibility:**\r\nOne of the challenges JavaScript has tackled over the years is cross-browser compatibility. JS libraries like jQuery and modern web development practices have significantly improved the ability to write code that works consistently across various browsers. Additionally, browser vendors continually improve their JavaScript engines to provide better performance and compliance with web standards.\r\n\r\n**Node.js:**\r\nJavaScript isn&#039;t confined to browsers alone. Node.js, a JavaScript runtime built on Chrome&#039;s V8 JavaScript engine, has opened doors to server-side programming. It allows developers to build scalable', 'Tanvir', 'js.jpg', 0, '2023-10-08 15:07:57', '2023-10-08 15:07:57'),
(8, 'Python Programming Language', 'Python is a versatile and widely-used programming language known for its simplicity, readability, and robust community support. Here are 500 words about Python:\r\n\r\nPython, created by Guido van Rossum and first released in 1991, has grown to become one of the most popular programming languages in the world. Its popularity stems from its clean and easily readable syntax, making it an excellent choice for both beginners and experienced developers.\r\n\r\nOne of Python&#039;s key strengths lies in its versatility. It is a general-purpose language, which means it can be used for a wide range of applications, from web development and data analysis to artificial intelligence and scientific computing. This adaptability makes it a top choice for developers working in various domains.\r\n\r\nPython&#039;s simplicity is a hallmark feature. Its code is easy to write and understand, which reduces the time and effort needed to develop and maintain software. This simplicity is particularly advantageous for newcomers to programming, as it allows them to focus on learning fundamental concepts rather than wrestling with complex syntax.\r\n\r\nThe Python community is another driving force behind its success. Python enthusiasts around the world contribute to its growth by creating libraries and frameworks that extend its capabilities. The Python Package Index (PyPI) hosts thousands of packages that can be easily installed and used, saving developers time and effort in building applications.\r\n\r\nOne of the most significant advantages of Python is its vast ecosystem of libraries and frameworks. For web development, frameworks like Django and Flask simplify the creation of web applications. Data scientists and analysts benefit from libraries like NumPy, pandas, and Matplotlib for data manipulation and visualization. Machine learning practitioners leverage scikit-learn and TensorFlow for building intelligent systems. These libraries, among many others, empower developers to build powerful and efficient', 'hakir_mubarmaj', 'python.jpg', 0, '2023-10-08 15:09:02', '2023-10-08 15:09:02'),
(9, 'Java Programming Language', 'Java is a versatile and influential programming language that has left an indelible mark on the world of software development. Originally developed by James Gosling and his team at Sun Microsystems in the mid-1990s, Java has since become one of the most popular and widely used programming languages globally.\r\n\r\n**Platform Independence:**\r\nOne of Java&#039;s standout features is its platform independence. It achieves this through the use of the Java Virtual Machine (JVM), which allows Java programs to run on any platform that has a compatible JVM installed. This &quot;write once, run anywhere&quot; capability has made Java a top choice for cross-platform development, from desktop applications to web services.\r\n\r\n**Object-Oriented Paradigm:**\r\nJava is rooted in the object-oriented programming paradigm. Everything in Java is an object, making it conducive to modular and maintainable code. Encapsulation, inheritance, and polymorphism are the core principles of Java&#039;s object-oriented design, enabling developers to create efficient and reusable code.\r\n\r\n**Robust and Secure:**\r\nJava is designed with an emphasis on robustness and security. It includes features like automatic memory management (garbage collection) that helps prevent memory leaks and buffer overflows, reducing the likelihood of system crashes. Additionally, Java&#039;s sandboxing and security manager allow developers to create secure applications by controlling access to system resources.\r\n\r\n**Rich Standard Library:**\r\nJava boasts a vast standard library that covers a wide range of functionalities. From data structures to network communication and graphical user interfaces, Java&#039;s standard library provides a comprehensive set of tools to simplify and expedite software development.\r\n\r\n**Community and Ecosystem:**\r\nJava has a vibrant and engaged community of developers. This ecosystem includes numerous frameworks, libraries, and tools that further enhance Java&#039;s capabilities.', 'hakir_mubarmaj', 'javap.jpg', 0, '2023-10-08 15:11:00', '2023-10-08 15:27:53'),
(10, 'C++ Programming Language', 'C++: A Powerful and Versatile Programming Language\r\n\r\nC++ is a programming language that has left an indelible mark on the world of software development. It is a descendant of the venerable C programming language and brings with it a rich history and a wealth of features that have made it a mainstay in the realm of computer programming.\r\n\r\n**History and Evolution:**\r\nC++ was developed by Bjarne Stroustrup in the early 1980s at Bell Labs. Stroustrup&#039;s aim was to create a language that could combine the efficiency and low-level capabilities of C with high-level abstractions, making it suitable for a wider range of applications. Over the years, C++ has undergone several iterations and standardizations, with the most recent being C++20.\r\n\r\n**Powerful Abstractions:**\r\nOne of C++&#039;s defining features is its support for both low-level programming and high-level abstractions. It provides direct memory manipulation through pointers and manual memory management, which makes it suitable for systems programming and creating efficient algorithms. At the same time, it offers high-level abstractions like classes, inheritance, and templates, enabling developers to write elegant and reusable code.\r\n\r\n**Object-Oriented Paradigm:**\r\nC++ is known for its strong support for the object-oriented programming (OOP) paradigm. It allows developers to model real-world entities using classes and objects, promoting code organization, reusability, and modularity. This OOP foundation has led to the creation of numerous software libraries and frameworks in C++.\r\n\r\n**Templates and Generic Programming:**\r\nTemplates in C++ enable generic programming, where algorithms and data structures can be implemented in a way that is independent of specific data types. This powerful feature forms the basis for the Standard Template Library (STL), which provides a rich collection of data structures and algorithms that can be customized for various data types.\r\n\r\n**Standard Library (STL):**\r\nThe STL is a h', 'Tusher', 'c++.jpg', 0, '2023-10-08 15:13:12', '2023-10-08 15:13:12'),
(11, 'C# Programming Language', 'C# (pronounced as &quot;C-sharp&quot;) is a powerful and versatile programming language developed by Microsoft in the early 2000s. It is part of the .NET framework, making it a prominent choice for developing a wide range of software applications, from desktop applications to web services and mobile apps. Here are 500 words about the C# language:\r\n\r\n**C# Syntax and Structure:**\r\n\r\nC# is known for its clean and easy-to-read syntax, which draws inspiration from C, C++, and Java. It uses curly braces `{}` to define blocks of code and employs a similar syntax for declaring variables, loops, and conditionals. The language emphasizes type safety, offering strong type checking to catch errors at compile time rather than runtime.\r\n\r\n**Object-Oriented Programming:**\r\n\r\nC# is primarily an object-oriented programming (OOP) language, which means it revolves around the concept of objects and classes. Developers use classes to define blueprints for objects, encapsulating data and behavior. Inheritance, polymorphism, and encapsulation are fundamental OOP principles supported by C#, allowing for code reuse and modular design.\r\n\r\n**Platform Independence:**\r\n\r\nC# is designed to be platform-independent through the use of the .NET framework. It enables developers to write code once and run it on various platforms, including Windows, macOS, and Linux, by using the .NET Core or .NET 5+ runtime. This cross-platform compatibility extends to web development, allowing C# to power server-side applications and APIs hosted on different platforms.\r\n\r\n**Rich Standard Library:**\r\n\r\nC# benefits from a comprehensive standard library, the .NET Framework (or .NET Core/.NET 5+), which offers an extensive collection of classes and libraries for various tasks. This library includes functionalities for file I/O, networking, database access, cryptography, and more. Additionally, C# has robust support for asynchronous programming, making it well-suited for building responsive and scalable applications.\r\n\r\n*', 'Tusher', 'java.jpg', 0, '2023-10-08 15:19:46', '2023-10-08 15:19:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'Tanvir', 'tushartanvir719@gmail.com', '$2y$10$SmVbnYMnQyLCSPZdnt5YeObXwHFdEXEtu2BNRCu/c/XLk9knIfbqu'),
(2, 'Tusher', 'tanvirtushm@gmail.com', '$2y$10$c7GE.keebyqaU3IkKHrGxeAdmQ9ghKrXkind1mWU4ljgGSQLOa0YS'),
(3, 'hakir_mubarmaj', 'hakirmubarmaj@gmail.com', '$2y$10$25IIJmDWmE9.8hJvluu2GO8bfF0cpv.qTQW.xCiX2ymC0hffkfENO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
