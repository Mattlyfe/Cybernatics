-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2022 at 03:59 PM
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
-- Database: `useraccounts_be`
--

-- --------------------------------------------------------

--
-- Table structure for table `users_be`
--

CREATE TABLE `users_be` (
  `ID` int(11) NOT NULL,
  `first_name` varchar(150) NOT NULL,
  `last_name` varchar(150) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_be`
--

INSERT INTO `users_be` (`ID`, `first_name`, `last_name`, `password`) VALUES
(29, 'john', 'mir', '123m'),
(30, 'as', 'as', 'as'),
(31, 'as', 'as', 'as'),
(32, 'as', 'as', 'as'),
(33, 'as', 'as', 'as'),
(34, 'as', 'as', 'as'),
(35, 'as', 'asd1', '222'),
(36, 'aaaa', 'aaaa', '4433'),
(37, 'aaaa1', 'aaaa1', '6d5bd61cb782771addb42ed332b989fe021d6fdf'),
(38, 'samplename', 'samplelastname', '7c4a8d09ca3762af61e59520943dc26494f8941b'),
(39, 'aaa', 'aaa', '7e240de74fb1ed08fa08d38063f6a6a91462a815');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users_be`
--
ALTER TABLE `users_be`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users_be`
--
ALTER TABLE `users_be`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
