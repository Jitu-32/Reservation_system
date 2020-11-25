-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2020 at 08:37 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `pnr` int(11) NOT NULL,
  `train_no` int(10) NOT NULL,
  `date` date NOT NULL,
  `booked_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`pnr`, `train_no`, `date`, `booked_by`) VALUES
(1, 12919, '2020-11-27', 5);

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `PNR` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Age` int(3) NOT NULL,
  `Gender` varchar(2) NOT NULL,
  `Coach_type` varchar(2) NOT NULL,
  `Seat_type` varchar(2) NOT NULL,
  `coach_no` int(3) NOT NULL,
  `seat_no` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trains`
--

CREATE TABLE `trains` (
  `Train_no` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `src` varchar(20) NOT NULL,
  `dest` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `sl_seats` int(11) NOT NULL,
  `ac_seats` int(11) NOT NULL,
  `avail_sl` int(11) NOT NULL,
  `avail_ac` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trains`
--

INSERT INTO `trains` (`Train_no`, `name`, `src`, `dest`, `date`, `sl_seats`, `ac_seats`, `avail_sl`, `avail_ac`) VALUES
(4353, 'Amarkantak Express', 'Agra', 'Mathura', '2020-12-04', 18, 24, 18, 24),
(9872, 'Agartala passenger', 'Agartala', 'Howrah', '2020-12-10', 90, 24, 18, 24),
(12367, 'BPL-HWH express', 'Ropar', 'Bhopal', '2020-12-11', 90, 288, 90, 288),
(12919, 'Shatabdi express', 'Bhopal', 'Jabalpur', '2020-11-27', 18, 24, 18, 24),
(14529, 'Malwa Express', 'Indore', 'Vaishno Devi', '2020-12-12', 180, 120, 180, 120),
(56123, 'Ayush Express', 'Ayush ka ghar', 'Waapis ghar', '2020-12-10', 18, 24, 18, 24),
(59022, 'Shaktipunj Express', 'Jabalpur', 'Indore', '2020-12-10', 90, 192, 90, 192);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User id` int(11) NOT NULL,
  `Username` varchar(10) NOT NULL,
  `password` int(11) NOT NULL,
  `Credit_card` int(12) NOT NULL,
  `Address` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User id`, `Username`, `password`, `Credit_card`, `Address`) VALUES
(1, 'gg', 123, 2222, 'hey'),
(2, '', 12345678, 1236, '136, Abhilasha nagar'),
(3, 'jitu', 12345678, 0, 'hyy'),
(4, 'jj', 9999, 12345678, '1355'),
(5, 'yogi', 4567, 345678, 'cgh'),
(6, 'Ayush', 12345678, 1234, 'jj'),
(7, 'vist', 0, 123456, 'Mp');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`pnr`),
  ADD KEY `user` (`booked_by`),
  ADD KEY `train` (`train_no`,`date`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`Coach_type`,`coach_no`,`seat_no`),
  ADD KEY `pnr` (`PNR`);

--
-- Indexes for table `trains`
--
ALTER TABLE `trains`
  ADD PRIMARY KEY (`Train_no`,`date`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `pnr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `train` FOREIGN KEY (`train_no`,`date`) REFERENCES `trains` (`Train_no`, `date`),
  ADD CONSTRAINT `user` FOREIGN KEY (`booked_by`) REFERENCES `user` (`User id`);

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `pnr` FOREIGN KEY (`PNR`) REFERENCES `bookings` (`pnr`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
