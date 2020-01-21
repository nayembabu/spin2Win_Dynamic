-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 21, 2020 at 03:02 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spin_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `store_mobile`
--

CREATE TABLE `store_mobile` (
  `iniq_idi` int(11) NOT NULL,
  `mob_no` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `win_price` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `spin_time_stamp` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `store_mobile`
--

INSERT INTO `store_mobile` (`iniq_idi`, `mob_no`, `win_price`, `spin_time_stamp`) VALUES
(12, '01819084855', 'A STAR', '1579615949'),
(13, '01819084850', 'LOSE ALL', '1579618802');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `store_mobile`
--
ALTER TABLE `store_mobile`
  ADD PRIMARY KEY (`iniq_idi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `store_mobile`
--
ALTER TABLE `store_mobile`
  MODIFY `iniq_idi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
