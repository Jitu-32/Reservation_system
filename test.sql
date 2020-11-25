-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2020 at 08:16 PM
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
(142, 12, '2021-01-24', 1),
(143, 12, '2021-01-24', 1),
(144, 12, '2021-01-24', 1),
(145, 12, '2021-01-24', 1),
(146, 12, '2021-01-24', 1),
(147, 12, '2021-01-24', 1),
(148, 12, '2021-01-24', 1),
(149, 100, '2021-01-25', 1);

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

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`PNR`, `Name`, `Age`, `Gender`, `Coach_type`, `Seat_type`, `coach_no`, `seat_no`) VALUES
(142, 'Jitendra Shukla', 12, 'M', 'AC', 'LB', 1, 1),
(142, 'amit', 13, 'M', 'AC', 'LB', 1, 2),
(142, 'amrish', 12, 'M', 'AC', 'UB', 1, 3),
(142, 'hhh', 11, 'F', 'AC', 'UB', 1, 4),
(143, 'Jitendra Shukla', 12, 'M', 'AC', 'SL', 1, 5),
(143, 'amit', 13, 'M', 'AC', 'SU', 1, 6),
(143, 'amrish', 12, 'M', 'AC', 'LB', 1, 7),
(143, 'hhh', 11, 'F', 'AC', 'LB', 1, 8),
(144, 'Jitendra Shukla', 12, 'M', 'AC', 'UB', 1, 9),
(144, 'amit', 13, 'M', 'AC', 'UB', 2, 10),
(144, 'amrish', 12, 'M', 'AC', 'SL', 2, 11),
(144, 'hhh', 11, 'F', 'AC', 'SU', 2, 12),
(145, 'Jitendra', 12, 'M', 'AC', 'LB', 2, 13),
(146, 'Jitendra', 12, 'M', 'AC', 'LB', 2, 14),
(147, 'Jitendra', 12, 'M', 'AC', 'UB', 2, 15),
(148, 'Jitendra', 12, 'M', 'AC', 'UB', 2, 16),
(149, 'Jitendra Shukla', 12, 'M', 'SL', 'LB', 1, 1),
(149, 'amit', 13, 'M', 'SL', 'MB', 1, 2),
(149, 'amrish', 12, 'M', 'SL', 'UB', 1, 3),
(149, 'hhh', 11, 'F', 'SL', 'LB', 1, 4);

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
(12, 'abc', 'a', 'b', '2021-01-24', 3, 24, 0, 8),
(100, 'a', 'a', 'b', '2021-01-25', 18, 24, 14, 24),
(123, 'abc', 'a', 'b', '2021-01-24', 18, 24, 10, 16);

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
(1, 'jj', 9999, 1234, '136'),
(9, 'Jitendra', 1234, 6789, 'Indore'),
(11, 'jitu', 1235, 1234, '12');

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
  ADD PRIMARY KEY (`PNR`,`Coach_type`,`coach_no`,`seat_no`);

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
  MODIFY `pnr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `train` FOREIGN KEY (`train_no`,`date`) REFERENCES `trains` (`Train_no`, `date`),
  ADD CONSTRAINT `user` FOREIGN KEY (`booked_by`) REFERENCES `user` (`User id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
