-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2023 at 06:52 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mohamedfinalproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pro_name` text NOT NULL,
  `pro_image` text NOT NULL,
  `pro_price` text NOT NULL,
  `pro_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `pro_id`, `user_id`, `pro_name`, `pro_image`, `pro_price`, `pro_quantity`) VALUES
(12, 10, 2, 'iPhone 12 Pro', 'image/iphone12.jpg', '705.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `cname` text NOT NULL,
  `cimage` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cname`, `cimage`) VALUES
(1, 'Laptops', 'image/icons8-laptop-50.png'),
(2, 'Android Phones', 'image/icons8-android-os-50.png'),
(3, 'Apple Phones', 'image/icons8-apple-logo-50.png');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `subject` text NOT NULL,
  `msg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `ads` text NOT NULL,
  `city` text NOT NULL,
  `country` text NOT NULL,
  `method` text NOT NULL,
  `total_products` text NOT NULL,
  `total_price` text NOT NULL,
  `date` text NOT NULL,
  `time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `pro_name` text NOT NULL,
  `pro_image` text NOT NULL,
  `brand` text NOT NULL,
  `price` text NOT NULL,
  `os` text NOT NULL,
  `full_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `cat_id`, `pro_name`, `pro_image`, `brand`, `price`, `os`, `full_desc`) VALUES
(1, 1, 'Lenovo 15.6', 'image/6137YYIY24L._AC_SX569_.jpg', 'Lenovo', '299', 'Windows 11', 'Lenovo 15.6\" IdeaPad 1 Laptop, AMD Dual-core Processor, 15.6\" HD Anti-Glare Display, Wi-Fi 6 and Bluetooth 5.0, HDMI, Windows 11 Home in S Mode(12GB RAM | 256GB SSD)'),
(2, 2, 'Galaxy S22', 'image/51W2KpbkmWL._AC_SX425_.jpg', 'SAMSUNG', '424.99', 'Android 12.0', 'SAMSUNG Galaxy S22 Cell Phone, Factory Unlocked Android Smartphone, 128GB, 8K Camera & Video, Night Mode, Brightest Display Screen, 50MP Photo Resolution, Long Battery Life, US Version, Pink Gold'),
(3, 3, 'iPhone 13', 'image/71xb2xkN5qL._AC_SX522_.jpg', 'Apple', '699.99', 'iOS 16', 'Phone 13, 128GB, Blue - Unlocked (Renewed Premium)'),
(4, 1, 'HP Stream 14', 'image/41tzuaDZOPL._AC_SX425_.jpg', 'HP', '289', 'Windows 10 S', '2021 HP Stream 14\" HD SVA Laptop Computer, Intel Celeron N4000 Processor, 4GB RAM, 64GB eMMC Flash Memory, Webcam, 1-Year Office, Intel UHD Graphics 600, Win 10S, Rose Pink, 32GB SnowBell USB Card'),
(5, 2, 'A14 5G', 'image/914cXYd0yOL._AC_SX425_.jpg', 'SAMSUNG', '199.99', 'Android 13.0', 'SAMSUNG Galaxy A14 5G A Series Cell Phone, Factory Unlocked Android Smartphone, 64GB w/Expandable Storage, Long Battery Life, 13MP Camera, 6.6\" Infinite Display Screen, US Version, 2023, Black'),
(6, 3, 'iPhone 13 Pro Max', 'image/61i8Vjb17SL._AC_SX522_.jpg', 'Apple', '1150.00', 'iOS 16', 'iPhone 13 Pro Max, 256GB, Sierra Blue - Unlocked (Renewed Premium)'),
(7, 1, 'ideapad', 'image/712gCL7ikLL._AC_SL1500_.jpg', 'Lenovo', '398', 'Windows 11 S', 'Lenovo IdeaPad 15.6\" Laptop Newest, 15.6 Inch HD Anti-Glare Display, AMD Dual-core Processor, 20GB RAM 1TB SSD, WiFi6 Bluetooth5, 9.5Hr Battery, Windows 11 +GM Accessories'),
(8, 2, 'S22 Ultra', 'image/61U6oC65TTL._AC_SX425_.jpg', 'SAMSUNG', '799', 'Android 12.0', 'SAMSUNG Galaxy S22 Ultra Cell Phone, Factory Unlocked Android Smartphone, 128GB, 8K Camera & Video, Brightest Display Screen, S Pen, Long Battery Life, Fast 4nm Processor, US Version, Phantom Black'),
(9, 3, 'iphone XR', 'image/717KHGCJ6eL._AC_SX679_.jpg', 'Apple', '324.95', 'iOS 12', 'Apple iPhone XR, 64GB, Black - Unlocked (Renewed)'),
(10, 3, 'iPhone 12 Pro', 'image/iphone12.jpg', 'Apple', '705.00', 'iOS 12', 'Apple iPhone 12 Pro, 256GB, Pacific Blue - Unlocked (Renewed Premium)'),
(11, 1, 'Pavilion', 'image/711yMY-peLL._AC_SX569_.jpg', 'HP', '469.00', 'Windows 11', 'HP 2022 Newest Pavilion 15.6\" HD Laptop, Intel Quad-core Pentium Processor, 16GB RAM, 1TB SSD, 11 Hr Battry Life, Intel UHD Graphics, HD Webcam, Bluetooth, HDMI, USB Type-C, Scarlet Red, Win 11'),
(12, 2, 'Samsung Galaxy S23', 'image/71Tt0M+HClL._AC_SX425_.jpg', 'SAMSUNG', '859.99', 'Android 13.0', 'SAMSUNG Galaxy S23 Cell Phone, Factory Unlocked Android Smartphone, 256GB Storage, 50MP Camera, Night Mode, Long Battery Life, Adaptive Display, US Version, 2023, Green'),
(13, 2, 'SmartPhone', 'image/717jfWIn6tL._AC_SX522_.jpg', 'Dilwe', '133.99', 'Android 8.1', 'Dilwe1 i12 Pro MAX Unlocked Smartphone, 6.26in HD Bang Screen Mobile Phone, 1+8G Dual Sim Cell Phone with Free 128G Memory Card for Android 10.0 Gold(US)');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `user_type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(1, 'Mohamed Osama', 'mohamed@gmail.com', 'MohamedOsama2052001', 'admin'),
(2, 'New User', 'user@gmail.com', 'UserGmail123', 'user'),
(3, 'Ahmed Ali', 'ahmed@gmail.com', 'AhmedAli12345', 'user'),
(4, 'Ali Elasyed', 'ali@gmail.com', 'AliElsayed123', 'user'),
(5, 'Mohamed Osama', 'mohamedosama@gmail.com', 'MohamedOsama987', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
