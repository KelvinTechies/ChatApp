-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2023 at 03:46 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reg_info`
--

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `id` int(11) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `user` varchar(1000) NOT NULL,
  `password` text NOT NULL,
  `Phone no` varchar(50) NOT NULL,
  `Status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id`, `email`, `user`, `password`, `Phone no`, `Status`) VALUES
(23, 'lvinzamani@gmail.com', 'Kelvin', '$2y$10$HtITGhvjfLs7xepM6zDGae1TBqITh/yBpiVMUAK0Cky4SvTcMqQim', '08162942636', 'Active'),
(24, 'lvin@text.com', 'lvin', '$2y$10$X.38UuUPaZ7pcvPMyKqgcehM5PT0CAomttxclytzdn4hmKJSMcFN.', '08162942636', 'Offline');

-- --------------------------------------------------------

--
-- Table structure for table `info_profile`
--

CREATE TABLE `info_profile` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `User_Img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `info_profile`
--

INSERT INTO `info_profile` (`id`, `user_id`, `User_Img`) VALUES
(9, 24, '638f291ac43961.73705269.jpg'),
(10, 23, '638f290e36af02.35354368.jpg'),
(13, 24, '638f291ac43961.73705269.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `Outgoing_Msg_Id` int(11) NOT NULL,
  `Incoming_Msg_Id` int(11) NOT NULL,
  `Message` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `Outgoing_Msg_Id`, `Incoming_Msg_Id`, `Message`) VALUES
(1, 24, 24, 'we are good to go in JESUS name AMEN'),
(2, 23, 24, 'hi'),
(3, 23, 24, 'hw is work'),
(4, 24, 24, 'we are good to go'),
(6, 23, 24, 'work'),
(7, 0, 24, 'de'),
(16, 23, 24, 'gud bwoy'),
(28, 24, 23, 'O bwoy hw far na'),
(41, 23, 24, 'yep'),
(42, 24, 23, 'aiit'),
(43, 23, 24, 'GLory to GOD'),
(44, 24, 23, 'its working'),
(45, 23, 24, 'hi'),
(46, 23, 24, 'hw'),
(47, 24, 23, 'q'),
(48, 24, 23, 'q'),
(49, 23, 24, 'gr8'),
(50, 23, 24, 'd'),
(51, 23, 24, 'gid'),
(52, 23, 24, 't'),
(53, 23, 24, 't'),
(54, 24, 23, 'ty'),
(55, 24, 23, 'ty'),
(56, 23, 24, 'haa'),
(57, 24, 23, 'aiit');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `info_profile`
--
ALTER TABLE `info_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `info_profile`
--
ALTER TABLE `info_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
