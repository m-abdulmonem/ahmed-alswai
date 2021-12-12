-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 24, 2018 at 04:29 AM
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
-- Database: `ahmedAlSwai`
--
CREATE DATABASE IF NOT EXISTS `ahmedAlSwai` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `ahmedAlSwai`;

-- --------------------------------------------------------

--
-- Table structure for table `alphabet`
--
-- Creation: Aug 01, 2017 at 09:10 PM
--

DROP TABLE IF EXISTS `alphabet`;
CREATE TABLE `alphabet` (
  `id` int(11) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `desc` text,
  `guide` int(11) DEFAULT NULL,
  `permissions` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `alphabet`:
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--
-- Creation: Jul 29, 2017 at 12:24 PM
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `main_title` varchar(255) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `category`:
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_settings`
--
-- Creation: Jul 21, 2017 at 09:03 AM
--

DROP TABLE IF EXISTS `contact_settings`;
CREATE TABLE `contact_settings` (
  `id` int(11) NOT NULL,
  `phone` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `contact_settings`:
--

-- --------------------------------------------------------

--
-- Table structure for table `email_settings`
--
-- Creation: Jul 19, 2017 at 03:01 AM
--

DROP TABLE IF EXISTS `email_settings`;
CREATE TABLE `email_settings` (
  `id` int(11) NOT NULL,
  `host` varchar(50) NOT NULL DEFAULT 'smtp.gmail.com',
  `smtpAuth` varchar(5) NOT NULL DEFAULT 'true',
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `smtpSecure` varchar(5) NOT NULL DEFAULT 'tls',
  `port` int(11) NOT NULL DEFAULT '587',
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `email_settings`:
--

--
-- Dumping data for table `email_settings`
--

INSERT INTO `email_settings` (`id`, `host`, `smtpAuth`, `username`, `password`, `smtpSecure`, `port`, `active`) VALUES
(1, 'smtp.gmail.com', 'true', 'abuabdojoker22@gmail.com', 'mabdulmonem@sara', 'tls', 587, 1),
(2, 'nmdfkvmkdmvkmd', 'true', 'sdk@nnkld.com', '13165115', 'tls', 35165, 0);

-- --------------------------------------------------------

--
-- Table structure for table `error`
--
-- Creation: Jul 20, 2017 at 05:39 AM
--

DROP TABLE IF EXISTS `error`;
CREATE TABLE `error` (
  `id` int(11) NOT NULL,
  `place` varchar(50) DEFAULT NULL,
  `desc` text,
  `fixed` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `error`:
--

-- --------------------------------------------------------

--
-- Table structure for table `guide`
--
-- Creation: Jul 28, 2017 at 05:44 PM
--

DROP TABLE IF EXISTS `guide`;
CREATE TABLE `guide` (
  `id` int(11) NOT NULL,
  `title` varchar(300) DEFAULT NULL,
  `place_address` text,
  `desc` text,
  `phone` int(11) DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `dir` text,
  `photos` text,
  `search_word` text,
  `category` varchar(300) DEFAULT NULL,
  `pay_way` varchar(300) DEFAULT NULL,
  `logo` varchar(250) NOT NULL,
  `type` int(11) NOT NULL,
  `status` int(2) DEFAULT NULL,
  `food_menu` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `guide`:
--

-- --------------------------------------------------------

--
-- Table structure for table `ip`
--
-- Creation: Jul 24, 2017 at 08:12 AM
--

DROP TABLE IF EXISTS `ip`;
CREATE TABLE `ip` (
  `id` int(11) NOT NULL,
  `ip` varchar(50) DEFAULT NULL,
  `block` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `ip`:
--

--
-- Dumping data for table `ip`
--

INSERT INTO `ip` (`id`, `ip`, `block`, `user_id`) VALUES
(1, '127.0.0.1', 0, 1),
(2, '127.0.0.1', 0, 1),
(3, '127.0.0.1', 0, 5),
(4, '127.0.0.1', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--
-- Creation: Jul 19, 2017 at 02:47 AM
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `visitor` int(11) NOT NULL,
  `permlink` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `pages`:
--

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--
-- Creation: Jul 19, 2017 at 02:51 AM
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `desc` text NOT NULL,
  `keywords` text NOT NULL,
  `url` varchar(100) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `lang` varchar(5) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `settings`:
--

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `title`, `desc`, `keywords`, `url`, `icon`, `lang`, `status`) VALUES
(1, 'MrDeveloper', 'mfvwkmvkwfmewklmklwem', 'wekm,fwem,wemk,wmfkwe', 'http://mrdeveloper.com', '/Uploads/Images/favico.ico', 'ar', 0);

-- --------------------------------------------------------

--
-- Table structure for table `socials_settings`
--
-- Creation: Jul 22, 2017 at 02:30 AM
--

DROP TABLE IF EXISTS `socials_settings`;
CREATE TABLE `socials_settings` (
  `id` int(11) NOT NULL,
  `ico` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `socials_settings`:
--

--
-- Dumping data for table `socials_settings`
--

INSERT INTO `socials_settings` (`id`, `ico`, `title`, `url`) VALUES
(1, 'twitter', 'twitter', 'http://twitter.com/mrdeveloper'),
(2, 'facebook', 'facebook', 'http://facebook.com/google');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--
-- Creation: Jul 20, 2017 at 06:36 PM
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `desc` text NOT NULL,
  `status` int(11) NOT NULL,
  `permission` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `dateAtime` datetime NOT NULL,
  `permlink` varchar(50) NOT NULL,
  `passChange` varchar(50) NOT NULL,
  `Activation` varchar(50) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `email_send` int(11) NOT NULL,
  `block` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `users`:
--

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `desc`, `status`, `permission`, `fullname`, `picture`, `dateAtime`, `permlink`, `passChange`, `Activation`, `ip`, `email_send`, `block`) VALUES
(1, 'mabdulmonem', 'mabdo44489@gmail.com', '$2y$12$dBuKBPmFgi7fTZCdIx3hAuiwTM412L.lqMgVPm.H5UK7pHqAb3p4O', 'فاثﻻلنمقصةلةص', 1, 1, 'محمد عبد المنعم خيرى صديق', '/Site/images/avatar5.png', '2017-07-20 07:48:37', '', '$2y$12$iq9eHv14C7itBaMILQJ4T.VZaJ1fQslK0qZVx7UNBoJ', '$2y$10$n3gWeeYtBXqZU5Dy6OyZj.Fs7eypCNMNRd/QUZzMEAt', '127.0.0.1', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alphabet`
--
ALTER TABLE `alphabet`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `alphabet_id_uindex` (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_settings`
--
ALTER TABLE `contact_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contact_info_id_uindex` (`id`);

--
-- Indexes for table `email_settings`
--
ALTER TABLE `email_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `error`
--
ALTER TABLE `error`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `error_id_uindex` (`id`);

--
-- Indexes for table `guide`
--
ALTER TABLE `guide`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `guide_id_uindex` (`id`);

--
-- Indexes for table `ip`
--
ALTER TABLE `ip`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ip_id_uindex` (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socials_settings`
--
ALTER TABLE `socials_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `id` (`id`);
ALTER TABLE `users` ADD FULLTEXT KEY `email` (`email`);
ALTER TABLE `users` ADD FULLTEXT KEY `username_2` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alphabet`
--
ALTER TABLE `alphabet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contact_settings`
--
ALTER TABLE `contact_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `email_settings`
--
ALTER TABLE `email_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `error`
--
ALTER TABLE `error`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `guide`
--
ALTER TABLE `guide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ip`
--
ALTER TABLE `ip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `socials_settings`
--
ALTER TABLE `socials_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
