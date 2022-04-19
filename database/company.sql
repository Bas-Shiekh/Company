-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2021 at 12:37 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `company`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlog`
--

CREATE TABLE `adminlog` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminlog`
--

INSERT INTO `adminlog` (`id`, `username`, `password`) VALUES
(1, 'admin', '123456789'),
(2, 'afsdafsd', 'fsdfsdfsdf');

-- --------------------------------------------------------

--
-- Table structure for table `dbcompany`
--

CREATE TABLE `dbcompany` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `Country` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `address` varchar(30) NOT NULL,
  `section` varchar(30) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `b_date` date NOT NULL,
  `reg_date` date NOT NULL,
  `mobile_number` varchar(20) NOT NULL,
  `status` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dbcompany`
--

INSERT INTO `dbcompany` (`id`, `username`, `password`, `first_name`, `last_name`, `email`, `Country`, `city`, `address`, `section`, `sex`, `b_date`, `reg_date`, `mobile_number`, `status`) VALUES
(2, 'mohmmad200', '123456', 'mohmmad', 'Elshakhe', 'pirlo4586@gmail.com', 'Palestine', 'Gaza', 'gaza', 'operations', 'male', '0000-00-00', '0000-00-00', '0595238737', '2'),
(16, 'admin', '123456', 'basil', 'elshakhe', 'basilelshakhe@gmail.com', 'palestine', 'gaza', 'rafah', 'human resources', 'male', '2021-06-29', '2021-06-02', '0595238737', '');

-- --------------------------------------------------------

--
-- Table structure for table `leavedb`
--

CREATE TABLE `leavedb` (
  `num` int(11) NOT NULL,
  `id` varchar(5) NOT NULL,
  `type-leave` varchar(30) NOT NULL,
  `fromdate` date NOT NULL,
  `todate` date NOT NULL,
  `description` varchar(2000) NOT NULL,
  `admin-description` varchar(2000) NOT NULL,
  `posting-date` date NOT NULL,
  `status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leavedb`
--

INSERT INTO `leavedb` (`num`, `id`, `type-leave`, `fromdate`, `todate`, `description`, `admin-description`, `posting-date`, `status`) VALUES
(8, '2', 'restricted holiday', '2021-05-24', '2021-05-31', '', 'fawfawfadasdasdasdasd', '0000-00-00', '1'),
(12, '16', 'restricted holiday', '2021-09-15', '2021-09-29', 'n cvbncvncvncv', '', '2021-09-09', ''),
(13, '16', 'restricted holiday', '2021-09-30', '2021-10-07', '', '', '2021-09-09', '');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `id` int(11) NOT NULL,
  `section` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`id`, `section`) VALUES
(1, 'Information Technology'),
(2, 'Human Resources'),
(3, 'Operations');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlog`
--
ALTER TABLE `adminlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dbcompany`
--
ALTER TABLE `dbcompany`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leavedb`
--
ALTER TABLE `leavedb`
  ADD PRIMARY KEY (`num`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlog`
--
ALTER TABLE `adminlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dbcompany`
--
ALTER TABLE `dbcompany`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `leavedb`
--
ALTER TABLE `leavedb`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
