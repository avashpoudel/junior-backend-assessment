-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 14, 2019 at 09:58 PM
-- Server version: 5.6.40-84.0-log
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
-- Database: `digit128_mindarc_assessment`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrated_data`
--

CREATE TABLE `migrated_data` (
  `product_id` int(11) NOT NULL,
  `sku` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrated_data`
--

INSERT INTO `migrated_data` (`product_id`, `sku`, `name`, `image_url`) VALUES
(1, 'red_shirt_women', 'Mens Red Shirt', ''),
(2, 'red_blouse_women', 'Womens Red Blouse', ''),
(3, 'blue_shorts_women', 'Mens Blue Shorts', '300x300.jpg'),
(4, 'blue_skirt_women', 'Womens Blue Skirt', ''),
(5, 'rainbow_singlet_women', 'Singlet in Rainbow Colours', 'download-300x300.jpg'),
(6, 'sun_one_women', 'Aviator Sunglasses', ''),
(7, 'gold_neck_women', 'Gold Necklace Chain', ''),
(8, 'iph_case_women', 'Iphone Case pink', ''),
(9, 'sam_case_men', 'Samsung Case Skulls', ''),
(10, 'black_shirt_women', 'AC/DC Shirt', '');

-- --------------------------------------------------------

--
-- Table structure for table `original_data`
--

CREATE TABLE `original_data` (
  `product_code` varchar(50) NOT NULL,
  `product_label` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `original_data`
--

INSERT INTO `original_data` (`product_code`, `product_label`, `gender`) VALUES
('red_shirt', 'Mens Red Shirt', 'm'),
('red_blouse', 'Womens Red Blouse', 'f'),
('blue_shorts', 'Mens Blue Shorts', 'm'),
('blue_skirt', 'Womens Blue Skirt', 'f'),
('rainbow_singlet', 'Singlet in Rainbow Colours', 'v'),
('sun_one', 'Aviator Sunglasses', 'f'),
('gold_neck', 'Gold Necklace Chain', ''),
('iph_case', 'Iphone Case pink', ' F'),
('sam_case', 'Samsung Case Skulls', 'M'),
('black_shirt', 'AC/DC Shirt', 'm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrated_data`
--
ALTER TABLE `migrated_data`
  ADD PRIMARY KEY (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
