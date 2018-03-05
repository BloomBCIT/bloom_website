-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 04, 2018 at 10:20 PM
-- Server version: 5.5.58-cll
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfoli_bloom`
--

-- --------------------------------------------------------

--
-- Table structure for table `orderitem`
--

CREATE TABLE `orderitem` (
  `order_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderitem`
--

INSERT INTO `orderitem` (`order_id`, `product_name`, `quantity`, `price`) VALUES
(1, 'Original Cockscomb flower tea', 1, 20),
(2, 'Original Safflower flower tea', 1, 30),
(3, 'Original Safflower flower tea', 1, 30),
(4, 'Original Safflower flower tea', 3, 90),
(5, 'Original Cockscomb flower tea', 1, 20),
(6, 'Original Marigold flower tea', 3, 120),
(7, 'Original Cockscomb flower tea', 1, 20),
(8, 'Original Safflower flower tea', 1, 30);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_date` varchar(255) NOT NULL,
  `total` int(11) NOT NULL,
  `userkey` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_date`, `total`, `userkey`) VALUES
(1, '2018-03-04', 20, '116577918865867696123'),
(2, '2018-03-04', 30, '116577918865867696123'),
(3, '2018-03-04', 30, '116577918865867696123'),
(4, '2018-03-04', 90, '116577918865867696123'),
(5, '2018-03-04', 20, '108738843388375384175'),
(6, '2018-03-04', 120, '116577918865867696123'),
(7, '2018-03-05', 20, '110417289259291953965'),
(8, '2018-03-05', 30, '116577918865867696123');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `description`, `image`, `price`) VALUES
(1, 'Original Chrysanthemum flower', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.', 'product1.png', 10),
(2, 'Original Cockscomb flower tea', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo magni sapiente, tempore debitis beatae culpa natus architecto.', 'product2.png', 20),
(3, 'Original Safflower flower tea', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.', 'product3.png', 30),
(4, 'Original Marigold flower tea', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo magni sapiente, tempore debitis beatae culpa natus architecto.', 'product1.png', 40);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `reviewtext` varchar(1000) NOT NULL,
  `reviewdate` date NOT NULL,
  `product_id` int(11) NOT NULL,
  `userkey` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `reviewtext`, `reviewdate`, `product_id`, `userkey`) VALUES
(1, 'lkjl\r\n', '2018-03-04', 2, ''),
(2, 'Testing', '2018-03-04', 2, ''),
(12, 'This is good!', '2018-03-04', 3, '116577918865867696123'),
(14, 'It\'s too expensive =(', '2018-03-04', 4, '116577918865867696123'),
(15, 'good', '2018-03-04', 1, '116577918865867696123'),
(16, 'good', '2018-03-04', 1, ''),
(17, 'good', '2018-03-04', 1, ''),
(18, 'I love the product!! thanks!', '2018-03-05', 1, '110417289259291953965'),
(19, 'It is a high-end tea really. I love the taste!!', '2018-03-05', 2, '110417289259291953965'),
(20, 'This is my favorite tea from Bloom. It was worth to buy!!', '2018-03-05', 3, '110417289259291953965'),
(21, 'Even though it was expensive, I enjoyed having it because of the color and scent!', '2018-03-05', 4, '110417289259291953965'),
(22, 'I love this product, looks so pretty with my tea', '2018-03-05', 1, '103406424028910956784'),
(23, 'This is a really great product. I love the taste and the color', '2018-03-05', 2, '103406424028910956784');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `userkey` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `userkey`, `name`, `email`) VALUES
(1, '116577918865867696123', 'Kaylie Son', 'kayliemoa@gmail.com'),
(2, '108738843388375384175', 'James í›ˆ Go', 'jhoongo@gmail.com'),
(3, '110417289259291953965', 'Se Hee Ahn', 'ahnsehee92@gmail.com'),
(4, '103406424028910956784', 'Leo Lou', 'leo.jt.lou@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
