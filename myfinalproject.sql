-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2023 at 01:53 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myfinalproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `ordertable`
--

CREATE TABLE `ordertable` (
  `order_id` int(11) NOT NULL,
  `Product_id` int(11) NOT NULL,
  `order_date` varchar(100) NOT NULL,
  `payment_status` varchar(11) NOT NULL DEFAULT 'pending',
  `user_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ordertable`
--

INSERT INTO `ordertable` (`order_id`, `Product_id`, `order_date`, `payment_status`, `user_id`, `customer_id`) VALUES
(4, 8, '2023-08-26', 'pending', 3, 5),
(6, 4, '2023-09-05', 'pending', 3, 4),
(10, 5, '2023-09-25', 'pending', 3, 6),
(12, 14, '2023-09-25', 'Rejected', 4, 7),
(13, 15, '2023-09-25', 'Confirmed', 4, 7),
(14, 9, '2023-09-26', 'pending', 3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `paymenttable`
--

CREATE TABLE `paymenttable` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `payment_status` varchar(100) NOT NULL DEFAULT 'pending',
  `Product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paymenttable`
--

INSERT INTO `paymenttable` (`payment_id`, `order_id`, `payment_status`, `Product_id`) VALUES
(4, 4, 'pending', 8),
(6, 6, 'pending', 4),
(10, 10, 'pending', 5),
(12, 12, 'Rejected', 14),
(14, 14, 'pending', 9);

-- --------------------------------------------------------

--
-- Table structure for table `productdetails`
--

CREATE TABLE `productdetails` (
  `Product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `product_price` varchar(500) NOT NULL,
  `product_image` varchar(300) NOT NULL,
  `product_age` varchar(10) NOT NULL,
  `product_bio` varchar(500) NOT NULL,
  `sell_status` varchar(100) NOT NULL DEFAULT 'pending',
  `display_home` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productdetails`
--

INSERT INTO `productdetails` (`Product_id`, `user_id`, `product_name`, `category_name`, `product_price`, `product_image`, `product_age`, `product_bio`, `sell_status`, `display_home`) VALUES
(3, 3, 'TV', 'Electronics', '30000', 'databaseimage/image-removebg-preview.png', '2', ' Elevate your entertainment with a 2-year-old, professionally used TV. Designed for durability and top-notch performance, it guarantees a consistent and crisp visual experience. Perfect for home theaters or office spaces, this TV offers lasting performance and sleek design. Enjoy the finest in entertainment with proven professional reliability.', 'pending', 1),
(4, 3, 'Electric Guitar', 'Electronics', '10000', 'databaseimage/image-removebg-preview (3).png', '1', 'Unleash your musical prowess with this electric guitar that\'s been skillfully played for a year. This guitar has matured in sound and style, ready to inspire your melodies. Whether you\'re a seasoned musician or just starting out, this instrument carries a year\'s worth of musical journey within its strings. Elevate your music with the experience of a well-loved guitar.', 'pending', 1),
(5, 3, 'Hand Bag', 'Clothing', '5000', 'databaseimage/image-removebg-preview (6).png', '1', 'levate your style with this handbag that has gracefully accompanied its owner for a year. Crafted to withstand the rigors of daily life, it blends durability with a touch of character. With every mark and memory etched into its fabric, this handbag adds a unique story to your ensemble. Carry a piece of well-traveled elegance wherever you go.', 'pending', 1),
(6, 3, 'Iphone 10', 'Electronics', '30000', 'databaseimage/image-removebg-preview (1).png', '3', 'Experience the reliability of an iPhone 10 that\'s been part of its owner\'s journey for three years. From capturing cherished moments to staying connected, this device has been a loyal companion. With a history etched into its sleek design, it\'s more than just a phone—it\'s a testament to lasting quality. Upgrade to a device that comes with its own story.', 'pending', 1),
(7, 3, 'Acer Nitro 5', 'others', '100000', 'databaseimage/image-removebg-preview (2).png', '4', 'Step into gaming greatness with this battle-tested Acer Nitro 5 laptop, proudly serving for four years. From intense gaming sessions to productivity tasks, it\'s a versatile companion that\'s seen it all. With its battle scars and triumphs, this laptop carries the legacy of countless victories. Elevate your experience with a trusted partner that\'s proven its worth.', 'pending', 1),
(8, 3, 'Washing Machine', 'Electronics', '25000', 'databaseimage/image-removebg-preview (5).png', '2', 'Simplify your laundry routine with this dependable washing machine, a faithful companion for two years. From freshening up clothes to tackling tough stains, it\'s been a reliable workhorse. With a history of clean clothes and convenience, this machine is ready to join a new home. Streamline your chores with a trusted laundry ally.', 'pending', 1),
(9, 3, 'Piano', 'Electronics', '50000', 'databaseimage/image-removebg-preview (4).png', '6', 'Unlock the melodies of time with this well-loved piano, harmonizing through six years of musical journeys. From delicate notes to powerful chords, it has enriched countless melodies. With its own unique story embedded in every key, this piano carries the spirit of its past and the promise of new compositions. Elevate your music with the resonance of experience.', 'pending', 1),
(13, 6, 'iphone 8', 'Electronics', '9000', 'databaseimage/rr.jpg', '3', 'jfdslafdsjlafjdlsjafdlsaf', 'Sell', 1),
(14, 4, 'aakash bakash', 'Select Category', '1', 'databaseimage/WIN_20211222_10_26_48_Pro.jpg', '2', 'hahahahaha', 'pending', 1),
(15, 4, 'aaku', 'Select Category', '2', 'databaseimage/WIN_20211222_10_27_05_Pro.jpg', '4', 'asasasasdasda', 'Sell', 1),
(17, 6, 'fan', 'Electronics', '30000', 'databaseimage/370270306_1975768039463294_8873000215949663849_n.jpg', '3', 'gfdsgfdsgf', 'pending', 1);

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(100) NOT NULL,
  `token` varchar(500) NOT NULL,
  `address` varchar(30) NOT NULL,
  `gender` text NOT NULL,
  `role` varchar(10) NOT NULL,
  `registration_date` varchar(20) NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`user_id`, `name`, `email`, `phone`, `password`, `token`, `address`, `gender`, `role`, `registration_date`, `image`) VALUES
(3, 'Aakash Kandel', 'Aakashkandel977@gmail.com', '9800000000', '$2y$10$OH7SxBeJeMMi2r7B7q3/WuPrSbkqybJ3W6qUlCjgoBllnQNgWf19y', '', 'daldale', 'male', 'user', '2023-08-17 16:58:15', 'profilepic/Screenshot 2023-04-10 123035.png'),
(4, 'Aakash Kandel', 'Aakashkandel9777@gmail.com', '9805449777', '$2y$10$8otCg0rBPEuA5ZpC7ZQoR.V9JQ3eLoLr5qa.I5w.h3zRiASsOooQa', '', 'devchuli-12', 'male', 'user', '2023-08-17 17:40:32', 'profilepic/Screenshot 2023-04-10 123035.png'),
(5, 'Basanta Paudel', 'pdlbasanta@gmail.com', '0987654321', '$2y$10$08oF9bucOg9zi7QS0W/6R.vjvgN.wzZL.0cQJuoXme4w9VD9a1/GC', '', 'aakash ko ghar', 'male', 'user', '2023-08-26 10:15:04', 'profilepic/WIN_20230826_13_59_06_Pro.jpg'),
(6, 'Aakash Kandel', 'kandelaakash00@gmail.com', '9805449777', '$2y$10$N6CHRydcdlmnANErpkbWT.lchX0Asj4tP/cyxk9nICD3rn255WRwS', '', ' 731', 'male', 'user', '2023-09-25 16:40:59', 'profilepic/rr.jpg'),
(7, 'Alvir', 'alvir15@gmail.com', '9876543210', '$2y$10$a70JdCe.ZA/KvLQs4udxWeowU5vTD4AWuRmgQWfskfKCU6gzrf8qa', '', 'Jr. Kali No. 731', 'male', 'user', '2023-09-25 18:58:01', 'profilepic/rr.jpg'),
(8, 'Admin', 'akadmin@gmail.com', '9805449777', '$2y$10$BoSZxBO.TKsogNofaDCdIOantC17xGGaLmbroKU2STu2T/KA5v7vm', '', 'Jr. Kali No. 731', 'male', 'admin', '2023-09-25 19:53:43', 'profilepic/rr.jpg'),
(9, '-123', 'pratik@gmail.com', '9805449777', '$2y$10$mJojUGBnOF04OYtlCGzqsON4HFNww2fyo8Rjj.sI.JDnbRp.hRCvK', '', 'Jr. Kali No. 731', 'male', 'user', '2023-09-26 07:06:10', 'profilepic/rijan1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ordertable`
--
ALTER TABLE `ordertable`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `product_id` (`Product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `paymenttable`
--
ALTER TABLE `paymenttable`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`Product_id`);

--
-- Indexes for table `productdetails`
--
ALTER TABLE `productdetails`
  ADD PRIMARY KEY (`Product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ordertable`
--
ALTER TABLE `ordertable`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `paymenttable`
--
ALTER TABLE `paymenttable`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `productdetails`
--
ALTER TABLE `productdetails`
  MODIFY `Product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `userdetails`
--
ALTER TABLE `userdetails`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ordertable`
--
ALTER TABLE `ordertable`
  ADD CONSTRAINT `ordertable_ibfk_1` FOREIGN KEY (`Product_id`) REFERENCES `productdetails` (`Product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ordertable_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `userdetails` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `paymenttable`
--
ALTER TABLE `paymenttable`
  ADD CONSTRAINT `paymenttable_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `ordertable` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `paymenttable_ibfk_2` FOREIGN KEY (`Product_id`) REFERENCES `productdetails` (`Product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `productdetails`
--
ALTER TABLE `productdetails`
  ADD CONSTRAINT `productdetails_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `userdetails` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
