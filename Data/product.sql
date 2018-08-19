-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2018 at 04:19 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.0.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopping_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `img` varchar(50) NOT NULL,
  `battery` int(11) NOT NULL,
  `display` float(11,1) NOT NULL,
  `memory` int(11) NOT NULL,
  `camera` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `img`, `battery`, `display`, `memory`, `camera`, `price`) VALUES
(1, 'RealMe 1', 'Realme1.jpg', 3410, 6.0, 4, 8, 10999),
(2, 'Redmi Y2', 'RedmiY2.jpg', 3080, 5.9, 4, 16, 12999),
(3, 'Huawei Honor 7X', 'Honor7X.jpg', 3340, 5.9, 4, 8, 14999),
(4, 'Oneplus 6', 'Oneplus6.jpg', 3300, 6.2, 6, 16, 34999),
(8, 'Honor Play', 'Honorplay.jpg', 3750, 6.3, 4, 16, 19999),
(9, 'Moto E5 Plus', 'motoe5.jpg', 5000, 6.0, 3, 12, 11999),
(10, 'Redmi 5', 'redmi5.jpg', 3300, 5.7, 3, 12, 8999),
(11, 'Moto G5s Plus', 'motog5.jpg', 3000, 5.5, 4, 13, 12999);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
