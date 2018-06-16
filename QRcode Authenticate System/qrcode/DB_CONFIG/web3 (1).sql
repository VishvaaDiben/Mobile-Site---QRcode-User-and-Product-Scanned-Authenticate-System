-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2018 at 09:43 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web3`
--

-- --------------------------------------------------------

--
-- Table structure for table `allusers`
--

CREATE TABLE `allusers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(8) NOT NULL,
  `email` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `allusers`
--

INSERT INTO `allusers` (`id`, `name`, `password`, `email`, `username`) VALUES
(3, 'Banner', 'smash', 'Sakaar@planethulk.com', 'Hulk'),
(4, 'admin', 'admin', 'admin@admin.com', 'admin'),
(5, 'thiran', '12345', 'yogen@gmail.com', 'yogen'),
(6, 'Thor', 'T ', 'asgard@realm.com', 'Odinso');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` bigint(20) NOT NULL,
  `product_name` bigint(20) NOT NULL,
  `announce` varchar(200) NOT NULL,
  `battery` varchar(200) NOT NULL,
  `build` varchar(2000) NOT NULL,
  `timestamp` varchar(100) NOT NULL,
  `counter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `announce`, `battery`, `build`, `timestamp`, `counter`) VALUES
(1, 900001, '121141', 'TOEI', 'INDONESIA', '2018-03-11 20:56:16', 2),
(2, 900002, '344566', 'INGRAM', 'INDONESIA', '2018-03-11 20:55:40', 11),
(900085, 900003, '111111', 'INGRAM', 'INDONESIA', '2018-03-11 21:12:00', 2),
(900086, 900004, '111112', 'INGRAM', 'INDONESIA', '2018-03-11 18:45:22', 0),
(900087, 900005, '111113', 'INGRAM', 'INDONESIA', '2018-03-11 18:45:23', 0),
(900088, 900006, '111114', 'INGRAM', 'INDONESIA', '2018-03-11 18:45:23', 0),
(900089, 900007, '111115', 'INGRAM', 'INDONESIA', '2018-03-11 18:45:23', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allusers`
--
ALTER TABLE `allusers`
  ADD UNIQUE KEY `id` (`id`) USING BTREE;

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allusers`
--
ALTER TABLE `allusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=900090;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
