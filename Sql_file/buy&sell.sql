-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2020 at 10:46 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buy&sell`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`username`, `password`, `picture`) VALUES
('Sabita', '$2y$10$8u24xvHeihFIf0hs8C/M7e88odTeuAJf/HyeefOAnbh6sFtLsvlie', 'uploads/userPhoto.png');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `itemname` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `sname` varchar(255) NOT NULL,
  `slocation` varchar(255) NOT NULL,
  `contactNo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `username`, `itemname`, `price`, `sname`, `slocation`, `contactNo`) VALUES
(29, 'Sanil', 'Pencil', 15, 'Sanil\'s shop', 'Kathmandu', '9841151154'),
(30, 'Sanil', 'book', 40, 'Sanil\'s shop', 'Kathmandu', '9841151154'),
(32, 'Sanil', 'mouse', 450, 'Sanil\'s shop', 'Kathmandu', '9841151154'),
(33, 'Rabindra', 'pencil', 20, 'shopshop', 'ktmktm', '9984854654');

-- --------------------------------------------------------

--
-- Table structure for table `salesman`
--

CREATE TABLE `salesman` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `sname` varchar(255) NOT NULL,
  `slocation` varchar(255) NOT NULL,
  `contactNo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salesman`
--

INSERT INTO `salesman` (`username`, `password`, `picture`, `sname`, `slocation`, `contactNo`) VALUES
('Rabindra', '$2y$10$5/ya2.ofmqBybvJIBRuQNe77q62mokazkio.uEfAzkUM7SNb57fYG', 'uploads/userPhoto.png', 'shopshop', 'ktmktm', '9984854654'),
('Sanil', '$2y$10$DH6/12GUv/FWPsNuXA9Wm.8VErMit0hcQnZJWI5U1m7dYRcudFf6a', 'uploads/5f1e7bbbe21917.80637257.png', 'Sanil\'s shop', 'Kathmandu', '9841151154');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salesman`
--
ALTER TABLE `salesman`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
