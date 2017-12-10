-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2017 at 11:30 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `code_challenge`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_comments`
--

CREATE TABLE `user_comments` (
  `id` int(11) NOT NULL,
  `comment_data` varchar(10000) NOT NULL,
  `comment_user` int(11) NOT NULL,
  `comment_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `parent_comment` int(11) NOT NULL DEFAULT '0',
  `children` int(11) NOT NULL DEFAULT '0',
  `comment_level` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_comments`
--

INSERT INTO `user_comments` (`id`, `comment_data`, `comment_user`, `comment_time`, `parent_comment`, `children`, `comment_level`) VALUES
(193, 'Hi Thanks for reviewing my submission.', 74, '2017-12-10 03:23:44', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_names`
--

CREATE TABLE `user_names` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `hash_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_names`
--

INSERT INTO `user_names` (`id`, `name`, `hash_name`) VALUES
(74, 'lilton', '8dc');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_comments`
--
ALTER TABLE `user_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_names`
--
ALTER TABLE `user_names`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hash_name` (`hash_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_comments`
--
ALTER TABLE `user_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;
--
-- AUTO_INCREMENT for table `user_names`
--
ALTER TABLE `user_names`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
