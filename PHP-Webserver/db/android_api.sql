-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 09, 2017 at 11:07 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `android_api`
--

-- --------------------------------------------------------

--
-- Table structure for table `commands`
--

CREATE TABLE `commands` (
  `id` int(11) NOT NULL,
  `owner` varchar(30) NOT NULL,
  `number_of_device` int(11) NOT NULL,
  `oncommand` varchar(20) NOT NULL,
  `offcommand` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `commands`
--

INSERT INTO `commands` (`id`, `owner`, `number_of_device`, `oncommand`, `offcommand`) VALUES
(1, 'kirit@gmail.com', 1, 'kirit', 'kirit off'),
(2, 'kirit@gmail.com', 2, 'vasu', 'vasu off'),
(3, 'kirit@gmail.com', 3, 'rjs', 'rjs off'),
(4, 'kirit@gmail.com', 4, 'gareja', 'gareja off'),
(5, 'kirit@gmail.com', 5, 'ratanpara', 'ratanpara off'),
(6, 'kirit@gmail.com', 6, 'shiyani', 'shiyani off'),
(7, 'kirit@gmail.com', 7, 'turn on lamp', 'turn off lamp'),
(8, 'kirit@gmail.com', 8, 'turn on', 'turn off');

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE `devices` (
  `no.` int(11) NOT NULL,
  `owner` varchar(25) NOT NULL,
  `device_unique_id` varchar(20) NOT NULL,
  `mac` varchar(20) NOT NULL,
  `local_ip` varchar(20) NOT NULL,
  `global_ip` varchar(20) NOT NULL,
  `latitude` varchar(50) NOT NULL,
  `longitude` varchar(50) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1=Active, 0=Block'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `devices`
--

INSERT INTO `devices` (`no.`, `owner`, `device_unique_id`, `mac`, `local_ip`, `global_ip`, `latitude`, `longitude`, `created_at`, `updated_at`, `status`) VALUES
(10, 'kirit@gmail.com', '59a0ffd1859323.79801', '88:9f:fa:79:9f:57', '192.168.43.186', '49.34.5.224', '22.5667', '72.9333', '2017-08-26', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `no` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `user_type` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `feedback_type` varchar(10) NOT NULL,
  `feedback` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`no`, `name`, `email`, `user_type`, `date`, `feedback_type`, `feedback`) VALUES
(5, 'kirit gareja', 'kirit@gmail.com', 'user', '2017-08-27', 'nutral', 'fgfdg'),
(6, 'kirit gareja', 'kirit@gmail.com', 'user', '2017-09-03', 'nutral', 'this is vary good service');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `owner` varchar(30) NOT NULL,
  `message` varchar(50) NOT NULL,
  `time` datetime(6) NOT NULL,
  `host_type` text NOT NULL COMMENT 'local,global',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0=delete, 1=present'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `owner`, `message`, `time`, `host_type`, `status`) VALUES
(1, 'kirit@gmail.com', 'Turn On Fan', '2017-09-12 00:00:00.000000', 'global', 1),
(2, 'kirit@gmail.com', 'Turn Off Lights', '2017-09-21 00:00:00.000000', 'local', 0),
(3, 'kirit@gmail.com', 'Turn On TV', '2017-09-15 00:00:00.000000', 'local', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `no.` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `security_cam`
--

CREATE TABLE `security_cam` (
  `id` int(11) NOT NULL,
  `owner` varchar(30) NOT NULL,
  `img_path` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(23) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `encrypted_password` varchar(80) NOT NULL,
  `salt` varchar(10) NOT NULL,
  `mobile_no` bigint(50) NOT NULL,
  `dob` date NOT NULL,
  `user_type` varchar(10) NOT NULL,
  `profile_pic` varchar(30) NOT NULL,
  `city` varchar(15) NOT NULL,
  `country` varchar(10) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `address` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `unique_id`, `fname`, `lname`, `email`, `encrypted_password`, `salt`, `mobile_no`, `dob`, `user_type`, `profile_pic`, `city`, `country`, `gender`, `address`, `created_at`, `updated_at`) VALUES
(2, '59a054f130d416.89419051', 'vasu', 'ratanpara', 'vasuratanpara@gmail.com', 'QY7wTPnKVkAnrWLu9vcc4k4Op203Y2JkZjYyMDY5', '7cbdf62069', 7041426923, '1997-01-18', 'admin', 'img/profile_pic/2.jpg', 'Junagadh', 'India', 'Female', 'Bharat Apartment block no 202', '2017-08-25 22:18:49', '2017-09-02 01:59:48'),
(3, '59a05a800109d9.24261858', 'kirit', 'gareja', 'kirit@gmail.com', 'wLEaBjFgZcHkRcyRtv3t+YaG+7hkYWU1OWRkZjRm', 'dae59ddf4f', 9867, '1997-08-07', 'user', 'img/profile_pic/1.jpg', 'junagadh', 'india', 'Male', 'ksdjghurdhdk', '2017-08-25 22:42:32', '2017-09-03 15:53:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `commands`
--
ALTER TABLE `commands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`no.`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`no`),
  ADD UNIQUE KEY `no.` (`no`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `security_cam`
--
ALTER TABLE `security_cam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `unique_id` (`unique_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `commands`
--
ALTER TABLE `commands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `devices`
--
ALTER TABLE `devices`
  MODIFY `no.` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
