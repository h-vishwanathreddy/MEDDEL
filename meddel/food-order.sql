-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2022 at 06:56 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food-order`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(12, 'Srujan Rao', 'ad', '47e8b9940d67c57e6b6870083f8ce025'),
(17, 'as', 'aa', '9dd4e461268c8034f5c8564e155c67a6'),
(18, 'srnew', 'anew', '6226f7cbe59e99a90b5cef6f94f966fd'),
(19, 'adminstrator', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(20, 'car', 'car', 'new_password'),
(21, 'admin', 'admin', 'new_password'),
(22, 'bossy', 'boss', '55a844ed8d97ae2ce5ccb2faa009006c');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(12, 'South Indian', 'Food_Category_343.jpg', 'Yes', 'Yes'),
(13, 'Chinese', 'Food_Category_960.jpg', 'Yes', 'Yes'),
(14, 'Soft Drinks', 'Food_Category_155.jpg', 'Yes', 'Yes'),
(15, 'American', 'Food_Category_470.jpg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(5, 'Idly', '', '20.00', 'Food-Name-3422.jpg', 0, 'Yes', 'Yes'),
(6, 'Dosa', '', '30.00', 'Food-Name-3462.jpg', 12, 'Yes', 'Yes'),
(7, 'Poori', '', '30.00', 'Food-Name-9758.jpg', 11, 'Yes', 'Yes'),
(8, 'Biryani', '', '50.00', 'Food-Name-213.jpg', 12, 'Yes', 'Yes'),
(9, 'Roti', '', '50.00', 'Food-Name-9925.jpg', 11, 'Yes', 'Yes'),
(10, 'Noodles', '', '60.00', 'Food-Name-2566.jpg', 13, 'Yes', 'Yes'),
(11, 'Fried Rice', '', '60.00', 'Food-Name-5549.jpg', 13, 'Yes', 'Yes'),
(12, 'Gobi Manchuri', '', '60.00', 'Food-Name-7100.jpg', 13, 'Yes', 'Yes'),
(13, 'Babycorn', '', '60.00', 'Food-Name-8700.jpg', 13, 'Yes', 'Yes'),
(14, 'Burger', '', '80.00', 'Food-Name-8803.jpg', 15, 'Yes', 'Yes'),
(15, 'pizza', '', '100.00', 'Food-Name-2893.jpg', 15, 'Yes', 'Yes'),
(16, 'Wrap', '', '70.00', 'Food-Name-587.jpg', 15, 'Yes', 'Yes'),
(17, 'sandwich', '', '60.00', 'Food-Name-7843.jpg', 15, 'Yes', 'Yes'),
(18, 'coffee', '', '10.00', 'Food-Name-5765.jpg', 14, 'Yes', 'Yes'),
(19, 'Tea', '', '10.00', 'Food-Name-6595.jpg', 14, 'Yes', 'Yes'),
(20, 'Strawberry Icecream', '', '50.00', 'Food-Name-7844.jpg', 17, 'Yes', 'Yes'),
(21, 'Butterscotch IceCream', '', '50.00', 'Food-Name-2382.jpg', 17, 'Yes', 'Yes'),
(22, 'watermelon Juice', '', '30.00', 'Food-Name-2406.jpg', 14, 'Yes', 'Yes'),
(23, 'Sapota', '', '30.00', 'Food-Name-2266.jpg', 14, 'Yes', 'Yes'),
(24, 'Red Velvet Cupcake', '', '60.00', 'Food-Name-7934.jpg', 17, 'Yes', 'Yes'),
(25, 'Oreo', '', '50.00', 'Food-Name-3286.jpg', 14, 'Yes', 'Yes'),
(26, 'Chocolate Pastery', '', '100.00', 'Food-Name-9791.jpg', 17, 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` int(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `food`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(1, 'Nihil numquam quas e', '564.00', 2, '1128.00', '2021-06-29 12:34:11', 'Ordered', 'Charlotte Berg', 1, '0', 0),
(2, 'Accusantium qui adip', '203.00', 3, '609.00', '2021-06-29 12:38:36', 'Ordered', 'Melyssa Sanchez', 1, '0', 0),
(3, 'Nihil numquam quas e', '564.00', 1, '564.00', '2021-06-29 01:13:42', 'Delivered', 'Samantha Carver', 1, '0', 0),
(4, 'Accusantium qui adip', '203.00', 303, '61509.00', '2021-06-29 01:26:08', 'On Delivery', 'Tiger Sandoval', 0, '0', 0),
(5, 'Nihil numquam quas e', '564.00', 1, '564.00', '2021-06-29 01:47:02', 'On Delivery', 'sjr', 999, '8979', 123),
(6, 'Nihil numquam quas e', '564.00', 956, '539184.00', '2021-07-03 10:47:35', 'Ordered', 'Tanner Cantu', 1, '0', 0),
(7, 'Nihil numquam quas e', '564.00', 187, '105468.00', '2021-07-03 10:48:15', 'Ordered', 'Ronan Santos', 1, '0', 0),
(8, 'Nihil numquam quas e', '564.00', 457, '257748.00', '2021-08-10 02:40:17', 'Ordered', 'Orson Ortiz', 1, 'divo@mailinator.com', 0),
(10, 'Idly', '20.00', 5, '100.00', '2021-08-11 07:42:48', 'Delivered', 'ani', 2147483647, 'anir78474@gmail.com', 0),
(11, 'Fried Rice', '60.00', 1, '60.00', '2021-08-11 01:44:23', 'Ordered', 'asdsa', 321, 'gucataxy@mailinator.com', 0),
(12, 'Idly', '20.00', 1, '20.00', '2021-09-12 09:12:47', 'Ordered', 'brijesh', 2147483647, 'dijesem@mailinator.com', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
