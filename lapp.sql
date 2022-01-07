-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 18, 2021 at 09:53 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `activity` text NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`id`, `userID`, `activity`, `created`) VALUES
(1, 1, 'The user created User Info, Admin', '0000-00-00 00:00:00'),
(2, 4, 'User Info Admin logged in', '2019-08-06 14:41:19'),
(3, 1, 'The user created User User, User', '2019-08-06 14:47:36'),
(4, 1, 'The user created User Bike, Rider', '2019-08-06 14:54:09'),
(5, 1, 'The user created User Bike, Rider', '2019-08-06 15:03:43'),
(6, 1, 'The user created User Bike, Rider', '2019-08-06 15:28:18'),
(7, 1, 'The user created User Office, Officer', '2019-08-06 17:56:29'),
(8, 1, 'User Admin Admin logged in', '2019-08-06 18:17:32'),
(9, 1, 'Updated User Logistics, Rider', '2019-08-06 20:47:52'),
(10, 1, 'Updated User Logistics, Rider', '2019-08-06 20:48:06'),
(11, 1, 'Updated User Office, User', '2019-08-06 20:57:07'),
(12, 1, 'Updated User System, Admin', '2019-08-06 20:58:21'),
(13, 1, 'Updated User System, Admin', '2019-08-06 20:58:29'),
(14, 1, 'Updated branch Abijo', '2019-08-06 21:08:25'),
(15, 1, 'Updated branch Abijo', '2019-08-06 21:16:38'),
(16, 1, 'Updated User Logistics, Riders', '2019-08-06 21:24:29'),
(17, 1, 'Updated User System, Admin', '2019-08-06 21:27:31'),
(18, 1, 'Updated User System, Admin', '2019-08-06 21:27:36'),
(19, 1, 'Updated User Office, User', '2019-08-06 21:28:14'),
(20, 1, 'Percel sending operation by userID 1 for Sender Ojo, User (Tracking Number: LAG5713327)', '2019-08-08 13:58:01'),
(21, 1, 'Percel sending operation by userID 1 for Sender Ojo, User (Tracking Number: LAG4635503)', '2019-08-08 13:59:41'),
(22, 1, 'Percel sending operation by userID 1 for Sender Ojo, User (Tracking Number: LAG3341155)', '2019-08-08 14:03:24'),
(23, 1, 'Percel sending operation by userID 1 for Sender Ojo, User (Tracking Number: LAG0636436)', '2019-08-08 14:05:35'),
(24, 1, 'Percel sending operation by userID 1 for Sender Dapo, Onaolapo (Tracking Number: LAG7265234)', '2019-08-08 14:08:51'),
(25, 1, 'User System Admin logged in', '2019-08-08 16:29:35'),
(26, 1, 'User System Admin logged in', '2019-08-09 16:44:13'),
(27, 1, 'User System Admin logged in', '2019-08-09 22:36:01'),
(28, 1, 'User System Admin logged in', '2019-08-10 21:56:39'),
(29, 1, 'User System Admin logged in', '2019-08-11 20:53:27'),
(30, 1, 'User System Admin logged in', '2019-08-11 21:28:08'),
(31, 1, 'User System Admin logged in', '2019-08-12 16:52:04'),
(32, 1, 'User System Admin logged in', '2019-08-12 17:00:40'),
(33, 1, 'User System Admin logged in', '2019-08-12 17:02:30'),
(34, 1, 'User System Admin logged in', '2019-08-12 17:04:57'),
(35, 1, 'User System Admin logged in', '2019-08-12 17:08:07'),
(36, 1, 'Percel sending operation by userID 1 for Sender Ade, Grace (Tracking Number: LAG4125437)', '2019-08-12 20:33:31'),
(37, 1, 'User System Admin logged in', '2019-08-12 20:53:41'),
(38, 1, 'Percel sending operation by userID 1 for Sender George, Harry (Tracking Number: LAG4000532)', '2019-08-12 21:00:02'),
(39, 1, 'Percel sending operation by userID 1 for Sender George, Harry (Tracking Number: LAG4345331)', '2019-08-12 21:02:37'),
(40, 1, 'Percel sending operation by userID 1 for Sender Grace, Kane (Tracking Number: LAG0000342)', '2019-08-12 22:37:04'),
(41, 1, 'Percel sending operation by userID 1 for Sender Brown, Dave (Tracking Number: LAG6436423)', '2019-08-12 22:42:26'),
(42, 1, 'User System Admin logged in', '2019-08-13 09:36:08'),
(43, 1, 'Percel sending operation by userID 1 for Sender Mercy, Oscar (Tracking Number: LAG6313630)', '2019-08-13 09:58:15'),
(44, 1, 'User System Admin logged in', '2019-08-13 11:06:29'),
(45, 1, 'User System Admin logged in', '2019-08-13 16:04:14'),
(46, 1, 'User System Admin logged in', '2019-08-13 19:19:31'),
(47, 1, 'User System Admin logged in', '2019-08-13 19:19:56'),
(48, 1, 'User System Admin logged in', '2019-08-13 20:14:54'),
(49, 1, 'Percel pickup operation by userID 1 for Sender John, James (Tracking Number: LAG7122643)', '2019-08-13 22:16:06'),
(50, 1, 'User System Admin logged in', '2019-08-14 12:12:35'),
(51, 1, 'User System Admin logged in', '2019-08-14 13:16:07'),
(52, 1, 'User System Admin logged in', '2019-08-14 18:25:28'),
(53, 1, 'User System Admin logged in', '2019-08-18 20:12:28'),
(54, 1, 'User System Admin logged in', '2019-08-19 09:11:51'),
(55, 1, 'User System Admin logged in', '2019-08-19 17:03:54'),
(56, 1, 'User System Admin logged in', '2019-08-21 12:41:19'),
(57, 1, 'User System Admin logged in', '2019-08-24 09:25:55'),
(58, 1, 'User System Admin logged in', '2019-09-26 11:52:27'),
(59, 1, 'User System Admin logged in', '2019-10-02 12:06:18'),
(60, 1, 'User System Admin logged in', '2019-10-08 17:34:49'),
(61, 1, 'User System Admin logged in', '2019-10-17 13:02:55'),
(62, 1, 'User System Admin logged in', '2019-10-17 13:36:01'),
(63, 1, 'User System Admin logged in', '2019-10-24 18:07:06'),
(64, 1, 'User System Admin logged in', '2019-11-01 14:43:05'),
(65, 1, 'User System Admin logged in', '2019-11-02 19:00:00'),
(66, 1, 'User System Admin logged in', '2019-11-04 17:04:50'),
(67, 1, 'User System Admin logged in', '2019-11-13 10:05:31'),
(68, 1, 'User System Admin logged in', '2019-11-22 19:19:08'),
(69, 1, 'User System Admin logged in', '2019-12-05 15:36:12'),
(70, 1, 'User System Admin logged in', '2019-12-07 19:30:37'),
(71, 1, 'User System Admin logged in', '2019-12-23 09:53:25'),
(72, 1, 'User System Admin logged in', '2020-02-03 17:54:14'),
(73, 1, 'User System Admin logged in', '2020-02-11 16:30:22'),
(74, 1, 'User System Admin logged in', '2020-02-20 10:00:51'),
(75, 1, 'User System Admin logged in', '2020-02-26 09:30:48'),
(76, 1, 'User System Admin logged in', '2020-08-28 13:42:27'),
(77, 1, 'User System Admin logged in', '2021-01-05 15:14:28');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` int(11) NOT NULL,
  `branch` varchar(100) NOT NULL,
  `address` varchar(300) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `compID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `branch`, `address`, `phone`, `email`, `compID`) VALUES
(1, 'Abijo', '2, Lekan Carenna Street, Fidiso Estate, Abijo.', '08022222234', 'email@logistics.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cost`
--

CREATE TABLE `cost` (
  `id` int(11) NOT NULL,
  `weight` double NOT NULL,
  `size` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `distance` int(11) NOT NULL,
  `place` varchar(200) NOT NULL,
  `cost` double NOT NULL,
  `compID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `cost`
--

INSERT INTO `cost` (`id`, `weight`, `size`, `type`, `distance`, `place`, `cost`, `compID`) VALUES
(1, 4, '7cm x4cm x5cm', 'Box', 2, 'Abijo', 2000, 1),
(2, 10, '7cm x4cm x5cm', 'Percel', 4, 'Awoyaya', 3000, 1),
(3, 3, '7cm x4cm x5cm', 'Box', 3, 'Sangotedo', 2500, 1);

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `id` int(11) NOT NULL,
  `package` varchar(200) NOT NULL,
  `size` varchar(200) NOT NULL,
  `compID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`id`, `package`, `size`, `compID`) VALUES
(1, 'Box', '5cm x 5cm', 1),
(2, 'Percel', '', 1),
(3, 'Envelope', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `compID` int(11) NOT NULL,
  `sender` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `amount` double NOT NULL,
  `mode` varchar(20) NOT NULL,
  `capturedby` int(11) NOT NULL,
  `created` date NOT NULL,
  `status` varchar(15) NOT NULL,
  `tracking` varchar(11) NOT NULL,
  `cardno` varchar(30) NOT NULL,
  `holder` varchar(200) NOT NULL,
  `cvv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `compID`, `sender`, `phone`, `amount`, `mode`, `capturedby`, `created`, `status`, `tracking`, `cardno`, `holder`, `cvv`) VALUES
(1, 1, 'Dapo Onaolapo', '09087651234', 2000, 'Payment Gateway', 1, '2019-08-08', 'Paid', 'LAG7265234', '12345677', 'Dapo', 567),
(2, 1, 'Ade Grace', '01234256620', 2000, 'Payment Gateway', 1, '2019-08-12', 'Pending', 'LAG4125437', '12345678', 'Adewale John', 122),
(3, 1, 'George Harry', '08099988800', 2000, 'Payment Gateway', 1, '2019-08-12', 'Paid', 'LAG4345331', '3242525363737', 'Grace Timothy', 201),
(4, 1, 'Grace Kane', '08076745600', 2000, 'Payment Gateway', 1, '2019-08-12', 'Paid', 'LAG0000342', '1234567', 'Ade John', 101),
(5, 1, 'Brown Dave', '09066699900', 2000, 'Payment Gateway', 1, '2019-08-12', 'Refund', 'LAG6436423', '8900888900098', 'Harry Kane', 909),
(6, 1, 'Mercy Oscar', '09088767800', 2000, 'Payment Gateway', 1, '2019-08-13', 'Paid', 'LAG6313630', '89009833637382', 'Mercy Oscar', 122),
(7, 1, 'John James', '09088767800', 4000, 'Payment Gateway', 1, '2019-08-13', 'Paid', 'LAG7122643', '11110000010101', 'James John', 102);

-- --------------------------------------------------------

--
-- Table structure for table `pickup`
--

CREATE TABLE `pickup` (
  `id` int(11) NOT NULL,
  `fname` varchar(70) NOT NULL,
  `lname` varchar(70) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(11) NOT NULL,
  `receiver` varchar(200) NOT NULL,
  `rphone` varchar(11) NOT NULL,
  `raddress` text NOT NULL,
  `location` varchar(100) NOT NULL,
  `destination` varchar(100) NOT NULL,
  `package` varchar(20) NOT NULL,
  `size` varchar(20) NOT NULL,
  `pickup_cost` double NOT NULL,
  `delivery_cost` double NOT NULL,
  `total_cost` double NOT NULL,
  `tracking` varchar(15) NOT NULL,
  `created` date NOT NULL,
  `createdby` int(11) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Pending',
  `compID` int(11) NOT NULL,
  `branch` int(11) NOT NULL,
  `delivered` date DEFAULT NULL,
  `deliveredby` int(11) DEFAULT NULL,
  `pickby` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `pickup`
--

INSERT INTO `pickup` (`id`, `fname`, `lname`, `address`, `phone`, `receiver`, `rphone`, `raddress`, `location`, `destination`, `package`, `size`, `pickup_cost`, `delivery_cost`, `total_cost`, `tracking`, `created`, `createdby`, `status`, `compID`, `branch`, `delivered`, `deliveredby`, `pickby`) VALUES
(1, 'John', 'James', '2, Badaru Street, Abijo', '09088767800', 'Grace James', '07099900090', '2, Amity Road, Fidiso Estate', 'Abijo', 'Abijo', 'Box', '7cm x4cm x5cm', 2000, 2000, 4000, 'LAG7122643', '2019-08-13', 1, 'Pending', 1, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `id` int(11) NOT NULL,
  `place` varchar(200) NOT NULL,
  `distance` double NOT NULL,
  `compID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`id`, `place`, `distance`, `compID`) VALUES
(1, 'Abijo', 2, 1),
(2, 'Sangotedo', 3, 1),
(3, 'Awoyaya', 4, 1),
(4, 'fgdgd', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`, `name`) VALUES
(1, 1, 'Administrator'),
(2, 2, 'Office User'),
(3, 3, 'Biker'),
(4, 4, 'Sender'),
(5, 5, 'Receiver');

-- --------------------------------------------------------

--
-- Table structure for table `send`
--

CREATE TABLE `send` (
  `id` int(11) NOT NULL,
  `compID` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `rfname` varchar(100) NOT NULL,
  `rlname` varchar(100) NOT NULL,
  `destination` varchar(100) NOT NULL,
  `raddress` text NOT NULL,
  `rphone` varchar(15) NOT NULL,
  `remail` varchar(100) NOT NULL,
  `tracking` varchar(10) NOT NULL,
  `createdby` int(11) NOT NULL,
  `created` date NOT NULL,
  `size` varchar(100) NOT NULL,
  `package` varchar(100) NOT NULL,
  `cost` double NOT NULL,
  `priority` varchar(10) NOT NULL DEFAULT 'Low',
  `branch` varchar(200) NOT NULL,
  `sent` datetime DEFAULT NULL,
  `sstatus` varchar(15) NOT NULL DEFAULT 'Pending',
  `delivered` datetime DEFAULT NULL,
  `deliveredby` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `send`
--

INSERT INTO `send` (`id`, `compID`, `fname`, `lname`, `phone`, `address`, `email`, `rfname`, `rlname`, `destination`, `raddress`, `rphone`, `remail`, `tracking`, `createdby`, `created`, `size`, `package`, `cost`, `priority`, `branch`, `sent`, `sstatus`, `delivered`, `deliveredby`) VALUES
(1, 1, 'Dapo', 'Onaolapo', '09087651234', 'abijo', 'dapoonaolapo@gmail.com', 'Ade', 'Mike', 'Abijo', 'ajah', '0908977633', 'ademikey@yahoo.com', 'LAG7265234', 1, '2019-08-08', '7cm x4cm x5cm', 'Box', 2000, '', '1', '0000-00-00 00:00:00', 'Pending', '0000-00-00 00:00:00', ''),
(2, 1, 'Ade', 'Grace', '01234256620', '2 Bode Thomas Street, Lagos, Nigeria', 'a.grace@yahoo.com', 'Ade', 'John', 'Abijo', '3, Unity Street, Abijo', '09087665400', 'a.john@yahoo.com', 'LAG4125437', 1, '2019-08-12', '7cm x4cm x5cm', 'Box', 2000, 'Low', '1', NULL, 'Pending', NULL, NULL),
(3, 1, 'George', 'Harry', '08099988800', 'Gbagada Lagos', 'h.george@yahoo.com', 'Stanley', 'James', 'Abijo', '12, Tracy Street, Abijo', '07099900090', 'james@yahoo.com', 'LAG4000532', 1, '2019-08-12', '7cm x4cm x5cm', 'Box', 2000, 'Low', '1', NULL, 'Pending', NULL, NULL),
(4, 1, 'George', 'Harry', '08099988800', 'Gbagada Lagos', 'h.george@yahoo.com', 'Stanley', 'James', 'Abijo', '12, Tracy Street, Abijo', '07099900090', 'james@yahoo.com', 'LAG4345331', 1, '2019-08-12', '7cm x4cm x5cm', 'Box', 2000, 'Low', '1', NULL, 'Pending', NULL, NULL),
(5, 1, 'Grace', 'Kane', '08076745600', '10, Tiamiyu Salvage Street, Victoria Island', 'gkane@yahoo.com', 'Francis', 'John', 'Abijo', '12, Hopewell Street, Abijo', '08132456700', 'francis@aol.com', 'LAG0000342', 1, '2019-08-12', '7cm x4cm x5cm', 'Box', 2000, 'Low', '1', NULL, 'Pending', NULL, NULL),
(6, 1, 'Brown', 'Dave', '09066699900', '2, Bode Thomas Street', 'b.dave@gmail.com', 'Grace', 'John', 'Abijo', '20, Abu Street, Abijo', '09088800090', 'grace.john@outlook.com', 'LAG6436423', 1, '2019-08-12', '7cm x4cm x5cm', 'Box', 2000, 'Low', '1', NULL, 'Pending', NULL, NULL),
(7, 1, 'Mercy', 'Oscar', '09088767800', 'Surulere Lagos', 'mercy.oscar@aol.com', 'James', 'Oscar', 'Abijo', '12, Valley Close', '09089877000', 'j.oscar@yahoo.com', 'LAG6313630', 1, '2019-08-13', '7cm x4cm x5cm', 'Box', 2000, 'Low', '1', NULL, 'Pending', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `id` int(11) NOT NULL,
  `width` double NOT NULL,
  `height` double NOT NULL,
  `length` double NOT NULL,
  `compID` int(11) NOT NULL,
  `size` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`id`, `width`, `height`, `length`, `compID`, `size`) VALUES
(1, 5, 4, 3, 1, '5x3x4'),
(2, 7, 5, 4, 1, '7cm x4cm x5cm'),
(3, 2, 2, 2, 1, '2cm x2cm x2cm');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `compID` int(11) NOT NULL,
  `branch` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(64) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `joined` date NOT NULL,
  `role` int(11) NOT NULL,
  `createdby` int(11) NOT NULL,
  `modifiedby` int(11) NOT NULL,
  `modified` date NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `compID`, `branch`, `email`, `password`, `fname`, `lname`, `username`, `phone`, `joined`, `role`, `createdby`, `modifiedby`, `modified`, `address`) VALUES
(1, 1, 1, 'admin@admin.com', '$2y$12$LinwLbLrgWE7MPgZh76z6uc8tV6Y6L/HLPngtGzOrVpZg6ZvPS0W6', 'System', 'Admin', 'Admin', '08033333301', '2019-08-03', 1, 1, 1, '2019-08-06', ''),
(8, 1, 1, 'biker@biker.com', '$2y$12$JwKOyC3/rDGBWE.d2V1rWu8wMRMxDiOrizix7RxsQfyrBj2fqrkE.', 'Logistics', 'Riders', '', '08022222221', '2019-08-06', 3, 1, 1, '2019-08-06', ''),
(9, 1, 1, 'user@user.com', '$2y$12$Ay5a9m1M4tmoBS8yCkmVi.evf0hbBTbfhHkBOxL7Rmx1f3YpsDx1i', 'Office', 'User', '', '07099999901', '2019-08-06', 2, 1, 1, '2019-08-06', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cost`
--
ALTER TABLE `cost`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pickup`
--
ALTER TABLE `pickup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `send`
--
ALTER TABLE `send`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cost`
--
ALTER TABLE `cost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pickup`
--
ALTER TABLE `pickup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `send`
--
ALTER TABLE `send`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
