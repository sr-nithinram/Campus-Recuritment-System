-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2024 at 12:11 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `campus_recruit`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(255) DEFAULT NULL,
  `admin_email` varchar(255) DEFAULT NULL,
  `admin_password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `c_name` varchar(255) DEFAULT NULL,
  `c_mobile` varchar(255) DEFAULT NULL,
  `c_email` varchar(255) DEFAULT NULL,
  `c_address` text DEFAULT NULL,
  `c_eligiblity` text DEFAULT NULL,
  `c_link` varchar(255) DEFAULT NULL,
  `c_studentselect` varchar(255) DEFAULT NULL,
  `del` tinyint(4) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `c_udate` date DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `c_name`, `c_mobile`, `c_email`, `c_address`, `c_eligiblity`, `c_link`, `c_studentselect`, `del`, `date`, `c_udate`, `status`) VALUES
(2, 'John', '9942178898', 'john@gmail.com', 'asdasdas		', NULL, 'https://www.tcs.com/careers/india', '10', NULL, '2023-02-14', '2023-02-14', 1),
(3, '$c_name', '$c_mobile', '$c_email', '$c_address', '$c_eligiblity', '$c_link', '10', 1, '2023-02-14', '0000-00-00', 2),
(4, 'TCS', '9942133946', 'hr@tcs.com', 'dwfww efwef		', 'wewfe wefwe		', 'https://careers.wipro.com/careers-home/', '25', NULL, '2023-03-03', '2023-03-03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cultural`
--

CREATE TABLE `cultural` (
  `id` int(11) NOT NULL,
  `c_name` varchar(255) DEFAULT NULL,
  `c_mobile` varchar(255) DEFAULT NULL,
  `c_email` varchar(255) DEFAULT NULL,
  `c_address` text DEFAULT NULL,
  `c_event` text DEFAULT NULL,
  `c_link` varchar(255) DEFAULT NULL,
  `del` tinyint(4) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `c_udate` date DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cultural`
--

INSERT INTO `cultural` (`id`, `c_name`, `c_mobile`, `c_email`, `c_address`, `c_event`, `c_link`, `del`, `date`, `c_udate`, `status`) VALUES
(2, 'John', '9942178898', 'john@gmail.com', 'asdasdas		', NULL, 'coimbatore', NULL, '2023-02-14', '2023-02-14', 1),
(3, '$c_name', '$c_mobile', '$c_email', '$c_address', '$c_eligiblity', '$c_link', 1, '2023-02-14', '0000-00-00', 2),
(4, 'TCS', '9942133946', 'hr@tcs.com', 'dwfww efwef		', 'wewfe wefwe		', 'link', NULL, '2023-03-03', '2023-03-03', 1),
(5, 'TCS', '9942133944', 'hr@tcs.com', 'werwererwerwerfwe		', 'rwewerew	rwe		', 'jghjuglkjhij', 1, '2023-03-03', NULL, 2),
(6, 'dwee', 'dc', 'df', '		cdeewew	', '	cwecewdcedc		', 'ewdewd', 1, '2024-01-06', '2024-01-06', 2);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `f_name` varchar(255) DEFAULT NULL,
  `f_mobile` varchar(255) DEFAULT NULL,
  `f_email` varchar(255) DEFAULT NULL,
  `f_course` varchar(255) DEFAULT NULL,
  `f_address` text DEFAULT NULL,
  `f_city` varchar(255) DEFAULT NULL,
  `f_password` varchar(255) DEFAULT NULL,
  `del` tinyint(4) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `f_udate` date DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `f_name`, `f_mobile`, `f_email`, `f_course`, `f_address`, `f_city`, `f_password`, `del`, `date`, `f_udate`, `status`) VALUES
(1, 'Fredrick', '987451265', 'fred@gmail.com', NULL, 'xxxdxc	', 'city', '123456', NULL, '2023-02-14', '2023-02-14', 1),
(2, 'Test', '3242342435345', 'tesdtr', NULL, 'fsdfsd		', 'sdf', '23423423r', NULL, '2023-02-14', NULL, 1),
(5, 'Michael', NULL, 'michael@gmail.com', 'BCA', NULL, NULL, '626262', NULL, '2024-03-25', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cultural`
--
ALTER TABLE `cultural`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cultural`
--
ALTER TABLE `cultural`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
