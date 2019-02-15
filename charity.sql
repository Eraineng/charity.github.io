-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2019 at 03:11 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `charity`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `fullname` varchar(30) DEFAULT NULL,
  `nric` varchar(40) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `studentid` varchar(30) DEFAULT NULL,
  `campus` varchar(100) DEFAULT NULL,
  `faculty` varchar(100) DEFAULT NULL,
  `programme` varchar(100) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `registerdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `fullname`, `nric`, `dob`, `contact`, `email`, `password`, `studentid`, `campus`, `faculty`, `programme`, `address`, `registerdate`) VALUES
(1, 'test', NULL, NULL, NULL, NULL, 'test@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'admin', 'AdMiN', '945201552162', '2019-01-30', '0112233456', 'eraineimpmall@gmail.com', '33cd402ade1c7f8edda13d74b1940c3a', '19WMR12345', 'TARUC', 'FOSC', 'Software Systems Development', 'localhost', NULL),
(3, 'eraine', 'Ng Xiao Ling', '960301146360', '1996-03-01', '0182722620', 'eraineng@gmail.com', 'd3e20ba5c612c45b58d9573c83763054', '16WMR10446', 'TARUC', 'FOSC', 'Software Systems Development', '3, Jalan TTP 6, Taman Tasik Puchong', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
