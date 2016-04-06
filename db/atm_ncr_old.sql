-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2016 at 12:27 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atm_ncr`
--

-- --------------------------------------------------------

--
-- Table structure for table `atm_checklist`
--

CREATE TABLE `atm_checklist` (
  `id` int(11) NOT NULL,
  `atm_id` int(11) NOT NULL,
  `atm_cctv` int(11) NOT NULL,
  `atm_machine` int(11) NOT NULL,
  `atm_ac` int(11) NOT NULL,
  `atm_guard` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `atm_checklist`
--

INSERT INTO `atm_checklist` (`id`, `atm_id`, `atm_cctv`, `atm_machine`, `atm_ac`, `atm_guard`) VALUES
(1, 1, 0, 0, 0, 0),
(2, 2, 0, 0, 0, 0),
(3, 3, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `atm_details`
--

CREATE TABLE `atm_details` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `atm_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `atm_details`
--

INSERT INTO `atm_details` (`id`, `name`, `bank`, `location`, `atm_image`) VALUES
(1, 'ATM 01', 'HDFC', 'Dwarka Sector 8', 'hdfc_atm.jpg'),
(2, 'ATM 02', 'AXIS', 'Palam Colony', 'axis_atm.jpg'),
(3, 'ATM 03', 'ICICI', 'Dwarka sector 18', 'icici_atm.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `response`
--

CREATE TABLE `response` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `atm_id` int(11) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `resp_lat` varchar(255) NOT NULL,
  `resp_lng` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `atm_checklist`
--
ALTER TABLE `atm_checklist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `atm_details`
--
ALTER TABLE `atm_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `response`
--
ALTER TABLE `response`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `atm_checklist`
--
ALTER TABLE `atm_checklist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `atm_details`
--
ALTER TABLE `atm_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `response`
--
ALTER TABLE `response`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
