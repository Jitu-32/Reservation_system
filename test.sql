-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2020 at 02:27 PM
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
(26, 59022, '2020-12-10', 1),
(27, 59022, '2020-12-10', 1),
(28, 59022, '2020-12-10', 1),
(29, 59022, '2020-12-10', 1),
(30, 59022, '2020-12-10', 1),
(31, 59022, '2020-12-10', 1),
(32, 59022, '2020-12-10', 1),
(33, 59022, '2020-12-10', 1),
(34, 59022, '2020-12-10', 1),
(35, 59022, '2020-12-10', 1),
(36, 59022, '2020-12-10', 1),
(37, 59022, '2020-12-10', 1),
(38, 59022, '2020-12-10', 1),
(39, 59022, '2020-12-10', 1),
(40, 59022, '2020-12-10', 1),
(41, 59022, '2020-12-10', 1),
(42, 59022, '2020-12-10', 1),
(43, 59022, '2020-12-10', 1),
(44, 59022, '2020-12-10', 1),
(45, 59022, '2020-12-10', 1),
(46, 59022, '2020-12-10', 1),
(47, 59022, '2020-12-10', 1),
(48, 59022, '2020-12-10', 1),
(49, 59022, '2020-12-10', 1),
(50, 59022, '2020-12-10', 1),
(51, 59022, '2020-12-10', 1),
(52, 59022, '2020-12-10', 1),
(53, 59022, '2020-12-10', 1),
(54, 59022, '2020-12-10', 1),
(55, 59022, '2020-12-10', 1),
(56, 59022, '2020-12-10', 1),
(57, 59022, '2020-12-10', 1),
(58, 59022, '2020-12-10', 1),
(59, 59022, '2020-12-10', 1),
(73, 59022, '2020-12-10', 1),
(74, 59022, '2020-12-10', 1),
(76, 59022, '2020-12-10', 1),
(77, 59022, '2020-12-10', 1),
(78, 1098, '2021-03-24', 1),
(79, 59022, '2020-12-10', 1),
(80, 1098, '2021-03-24', 1),
(81, 56123, '2020-12-10', 1),
(82, 1000, '2021-01-24', 1),
(83, 1000, '2021-01-24', 1),
(84, 59022, '2020-12-10', 1),
(85, 1000, '2021-01-24', 1),
(86, 999, '2021-01-24', 1),
(87, 1098, '2021-03-24', 1),
(88, 1098, '2021-03-24', 1),
(89, 1098, '2021-03-24', 1),
(90, 59022, '2020-12-10', 1),
(91, 1098, '2021-03-24', 1),
(92, 59022, '2020-12-10', 1),
(93, 59022, '2020-12-10', 1),
(94, 56123, '2020-12-10', 1),
(95, 56123, '2020-12-10', 1),
(96, 56123, '2020-12-10', 1),
(97, 56123, '2020-12-10', 1),
(100, 59022, '2020-12-10', 1),
(101, 123, '2021-01-24', 1),
(102, 59022, '2020-12-10', 1),
(103, 59022, '2020-12-10', 1),
(107, 56123, '2020-12-10', 1),
(108, 59022, '2020-12-10', 1),
(109, 59022, '2020-12-10', 1),
(110, 12367, '2020-12-11', 1),
(111, 12367, '2020-12-11', 1),
(112, 12367, '2020-12-11', 1),
(113, 12367, '2020-12-11', 1),
(114, 12367, '2020-12-11', 1);

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
(50, 'jitu', 12, 'M', 'AC', 'AC', 1, 1),
(50, 'Jitendra', 11, 'M', 'AC', 'AC', 1, 2),
(52, 'ffgg', 12, 'M', 'AC', 'UB', 1, 3),
(55, 'jitu', 12, 'M', 'AC', 'SL', 1, 4),
(55, 'Jitendra', 11, 'M', 'AC', 'SU', 1, 5),
(74, 'jitu', 12, 'M', 'AC', 'SU', 1, 6),
(74, 'Jitendra Shukla', 15, 'M', 'AC', 'LB', 1, 7),
(74, 'wer', 56, 'F', 'AC', 'LB', 1, 8),
(74, 'gg', 45, 'M', 'AC', 'UB', 1, 9),
(109, 'jitu', 12, 'M', 'AC', 'UB', 2, 10),
(109, 'Jitendra Shukla', 15, 'M', 'AC', 'SL', 2, 11),
(109, 'wer', 56, 'F', 'AC', 'SU', 2, 12),
(109, 'gg', 45, 'M', 'AC', 'LB', 2, 13),
(53, 'd', 12, 'M', 'SL', 'MB', 1, 1),
(53, 'a', 12, 'M', 'SL', 'UB', 1, 2),
(53, 'b', 14, 'M', 'SL', 'LB', 1, 3),
(53, 'c', 13, 'M', 'SL', 'MB', 1, 4),
(59, 'jitu', 12, 'M', 'SL', 'MB', 1, 5),
(59, 'Jitendra Shukla', 15, 'M', 'SL', 'UB', 1, 6),
(59, 'wer', 56, 'F', 'SL', 'SL', 1, 7),
(59, 'gg', 45, 'M', 'SL', 'SU', 1, 8),
(73, 'jitu', 12, 'M', 'SL', 'LB', 1, 9),
(73, 'Jitendra Shukla', 15, 'M', 'SL', 'MB', 1, 10),
(73, 'wer', 56, 'F', 'SL', 'UB', 1, 11),
(73, 'gg', 45, 'M', 'SL', 'LB', 2, 12),
(76, 'jitu', 12, 'M', 'SL', 'MB', 2, 13),
(76, 'Jitendra Shukla', 15, 'M', 'SL', 'UB', 2, 14),
(76, 'wer', 56, 'F', 'SL', 'SL', 2, 15),
(76, 'gg', 45, 'M', 'SL', 'SU', 2, 16),
(77, 'jitu', 12, 'M', 'SL', 'LB', 2, 17),
(77, 'Jitendra Shukla', 15, 'M', 'SL', 'MB', 2, 18),
(77, 'oooo', 56, 'F', 'SL', 'UB', 2, 19),
(77, 'op', 45, 'M', 'SL', 'LB', 2, 20),
(77, 'hey', 12, 'M', 'SL', 'MB', 2, 21),
(79, 'jitu', 12, 'M', 'SL', 'UB', 2, 22),
(79, 'Jitendra Shukla', 15, 'M', 'SL', 'SL', 2, 23),
(79, 'wer', 56, 'F', 'SL', 'SU', 2, 24),
(79, 'gg', 45, 'M', 'SL', 'LB', 2, 25),
(79, 'Jitendra Shukla', 3, 'M', 'SL', 'MB', 2, 26),
(84, 'jitu', 12, 'M', 'SL', 'UB', 2, 27),
(84, 'Jitendra Shukla', 15, 'M', 'SL', 'LB', 2, 28),
(84, 'wer', 56, 'F', 'SL', 'MB', 2, 29),
(84, 'gg', 45, 'M', 'SL', 'UB', 2, 30),
(90, 'jitu', 12, 'M', 'SL', 'SL', 2, 31),
(90, 'Jitendra Shukla', 15, 'M', 'SL', 'SU', 2, 32),
(90, 'wer', 56, 'F', 'SL', 'LB', 2, 33),
(90, 'gg', 45, 'M', 'SL', 'MB', 2, 34),
(92, 'jitu', 12, 'M', 'SL', 'UB', 2, 35),
(92, 'Jitendra Shukla', 15, 'M', 'SL', 'LB', 3, 36),
(92, 'wer', 56, 'F', 'SL', 'MB', 3, 37),
(92, 'gg', 45, 'M', 'SL', 'UB', 3, 38),
(93, 'jitu', 12, 'M', 'SL', 'SL', 3, 39),
(93, 'Jitendra Shukla', 15, 'M', 'SL', 'SU', 3, 40),
(93, 'wer', 56, 'F', 'SL', 'LB', 3, 41),
(93, 'gg', 45, 'M', 'SL', 'MB', 3, 42),
(93, 'ggggg', 11, 'F', 'SL', 'UB', 3, 43),
(100, 'Jitendra', 1, 'M', 'SL', 'LB', 3, 44),
(100, 'Yogesh', 12, 'M', 'SL', 'MB', 3, 45),
(102, 'jjjj', 12, 'M', 'SL', 'UB', 3, 46),
(103, 'jitu', 12, 'M', 'SL', 'SU', 5, 88),
(103, 'Jitendra Shukla', 15, 'M', 'SL', 'LB', 5, 89),
(103, 'wer', 56, 'F', 'SL', 'MB', 5, 90),
(103, 'gg', 45, 'M', 'SL', 'UB', 5, 91),
(108, 'jitu', 12, 'M', 'SL', 'LB', 5, 92),
(108, 'Jitendra Shukla', 15, 'M', 'SL', 'MB', 5, 93),
(108, 'wer', 56, 'F', 'SL', 'UB', 5, 94),
(108, 'gg', 45, 'M', 'SL', 'SL', 5, 95),
(108, '123', 1, 'M', 'SL', 'SU', 5, 96);

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
(123, 'abc', 'a', 'b', '2021-01-24', 18, 24, 17, 24),
(123, 'abc', 'a', 'b', '2021-01-25', 18, 24, 18, 24),
(999, 'ii', 'i', 'i', '2021-01-24', 36, 24, 36, 20),
(1000, 'NNN', 'n', 'N', '2021-01-24', 18, 48, 10, 44),
(1098, 'HM', 'Ropar', 'Delhi', '2021-03-24', 54, 48, 30, 48),
(4353, 'Amarkantak Express', 'Agra', 'Mathura', '2020-12-04', 18, 24, 18, 24),
(9872, 'Agartala passenger', 'Agartala', 'Howrah', '2020-12-10', 90, 24, 18, 24),
(12367, 'BPL-HWH express', 'Ropar', 'Bhopal', '2020-12-11', 90, 288, 78, 280),
(12919, 'Shatabdi express', 'Bhopal', 'Jabalpur', '2020-11-27', 18, 24, 18, 24),
(14529, 'Malwa Express', 'Indore', 'Vaishno Devi', '2020-12-12', 180, 120, 180, 120),
(56123, 'Ayush Express', 'Ayush ka ghar', 'Waapis ghar', '2020-12-10', 18, 24, 2, 19),
(59022, 'Shaktipunj Express', 'Jabalpur', 'Indore', '2020-12-10', 90, 192, -6, 179);

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
  ADD PRIMARY KEY (`Coach_type`,`coach_no`,`seat_no`);

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
  MODIFY `pnr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
