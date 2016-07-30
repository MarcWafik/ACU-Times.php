-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2016 at 12:35 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `journalcms`
--

-- --------------------------------------------------------

--
-- Table structure for table `accses`
--
-- Creation: May 11, 2016 at 08:32 AM
--

CREATE TABLE `accses` (
  `id` int(11) NOT NULL,
  `creatDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdateDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `poll` tinyint(1) NOT NULL DEFAULT '0',
  `article` tinyint(1) NOT NULL DEFAULT '0',
  `youtube` tinyint(1) NOT NULL DEFAULT '0',
  `gallery` tinyint(1) NOT NULL DEFAULT '0',
  `user` tinyint(1) NOT NULL DEFAULT '0',
  `email` tinyint(1) NOT NULL DEFAULT '0',
  `titleEnglish` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `titleArabic` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- RELATIONS FOR TABLE `accses`:
--

--
-- Dumping data for table `accses`
--

INSERT INTO `accses` (`id`, `creatDate`, `lastUpdateDate`, `poll`, `article`, `youtube`, `gallery`, `user`, `email`, `titleEnglish`, `titleArabic`, `isDeleted`) VALUES
(1, '2016-05-09 16:38:03', '2016-05-09 16:38:03', 1, 1, 1, 1, 0, 0, 'Writer', 'كاتب', 0),
(2, '2016-05-09 16:40:35', '2016-05-09 16:40:35', 3, 3, 3, 3, 0, 0, 'Editor', 'محرر', 0),
(4, '2016-05-09 16:59:12', '2016-05-09 16:59:12', 3, 3, 3, 3, 3, 0, 'Admin', 'مشرف', 0);

-- --------------------------------------------------------

--
-- Table structure for table `article`
--
-- Creation: May 11, 2016 at 06:53 AM
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `creatDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdateDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `titleEnglish` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `titleArabic` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `display` tinyint(1) NOT NULL,
  `writerID` int(11) NOT NULL,
  `youtubeID` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `descriptionEnglish` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `descriptionArabic` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `bodyEnglish` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `bodyArabic` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `categoryID` int(11) NOT NULL,
  `language` tinyint(1) NOT NULL,
  `importance` tinyint(1) NOT NULL,
  `imageNumber` tinyint(2) NOT NULL,
  `views` int(11) NOT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- RELATIONS FOR TABLE `article`:
--   `categoryID`
--       `category` -> `id`
--   `writerID`
--       `user` -> `id`
--

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `creatDate`, `lastUpdateDate`, `titleEnglish`, `titleArabic`, `display`, `writerID`, `youtubeID`, `descriptionEnglish`, `descriptionArabic`, `bodyEnglish`, `bodyArabic`, `categoryID`, `language`, `importance`, `imageNumber`, `views`, `isDeleted`) VALUES
(1, '2016-05-11 11:30:36', '2016-05-11 11:30:36', 'dfgh', '', 0, 0, '', 'dfgh', '', '<p>ghjfghjfhgj</p>', '', 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--
-- Creation: May 11, 2016 at 06:53 AM
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `creatDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdateDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `possition` int(11) NOT NULL,
  `nameEnglish` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `nameArabic` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `ParentID` int(11) DEFAULT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- RELATIONS FOR TABLE `category`:
--   `ParentID`
--       `category` -> `id`
--

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `creatDate`, `lastUpdateDate`, `possition`, `nameEnglish`, `nameArabic`, `ParentID`, `isDeleted`) VALUES
(1, '2016-05-09 22:33:40', '2016-05-09 22:37:20', 1, 'News', 'أخبار', NULL, 0),
(3, '2016-05-09 22:35:38', '2016-05-09 23:52:16', 1, 'World News', 'اخبار العالم', 1, 0),
(4, '2016-05-09 23:52:00', '2016-05-09 23:52:00', 3, 'News of University', 'أخبار الجامعة', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--
-- Creation: May 12, 2016 at 10:11 PM
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `creatDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdateDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `titleEnglish` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `titleArabic` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `display` tinyint(1) NOT NULL,
  `writerID` int(11) NOT NULL,
  `imageNumber` tinyint(2) NOT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- RELATIONS FOR TABLE `gallery`:
--   `writerID`
--       `user` -> `id`
--

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--
-- Creation: May 11, 2016 at 08:00 AM
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `creatDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdateDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `message` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `importance` tinyint(1) NOT NULL,
  `source` tinyint(2) NOT NULL,
  `sourceID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- RELATIONS FOR TABLE `notification`:
--   `userID`
--       `user` -> `id`
--

-- --------------------------------------------------------

--
-- Table structure for table `poll`
--
-- Creation: May 11, 2016 at 06:54 AM
--

CREATE TABLE `poll` (
  `id` int(11) NOT NULL,
  `creatDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdateDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `titleEnglish` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `titleArabic` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `display` tinyint(1) NOT NULL,
  `writerID` int(11) NOT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- RELATIONS FOR TABLE `poll`:
--   `writerID`
--       `user` -> `id`
--

-- --------------------------------------------------------

--
-- Table structure for table `pollchoice`
--
-- Creation: May 11, 2016 at 06:54 AM
--

CREATE TABLE `pollchoice` (
  `id` int(11) NOT NULL,
  `creatDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdateDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `textEnglish` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `textArabic` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `votes` int(11) NOT NULL DEFAULT '0',
  `PollID` int(11) NOT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- RELATIONS FOR TABLE `pollchoice`:
--   `PollID`
--       `poll` -> `id`
--

-- --------------------------------------------------------

--
-- Table structure for table `updates`
--
-- Creation: May 11, 2016 at 06:54 AM
--

CREATE TABLE `updates` (
  `id` int(11) NOT NULL,
  `creatDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdateDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `editorID` int(11) NOT NULL,
  `targetID` int(11) NOT NULL,
  `targetType` tinyint(2) NOT NULL,
  `MessageType` tinyint(2) NOT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- RELATIONS FOR TABLE `updates`:
--   `editorID`
--       `user` -> `id`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--
-- Creation: May 11, 2016 at 06:55 AM
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `creatDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdateDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fullName` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(254) COLLATE utf8_unicode_ci NOT NULL,
  `phoneNumber` int(13) NOT NULL,
  `nameArabic` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password` char(64) COLLATE utf8_unicode_ci NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `accsesID` int(11) NOT NULL,
  `about` text COLLATE utf8_unicode_ci NOT NULL,
  `birthDate` date NOT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- RELATIONS FOR TABLE `user`:
--   `accsesID`
--       `accses` -> `id`
--

-- --------------------------------------------------------

--
-- Table structure for table `youtube`
--
-- Creation: May 11, 2016 at 06:55 AM
--

CREATE TABLE `youtube` (
  `id` int(11) NOT NULL,
  `creatDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdateDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `titleEnglish` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `titleArabic` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `display` tinyint(1) NOT NULL,
  `writerID` int(11) NOT NULL,
  `youtubeID` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `descriptionEnglish` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `descriptionArabic` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- RELATIONS FOR TABLE `youtube`:
--   `writerID`
--       `user` -> `id`
--

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accses`
--
ALTER TABLE `accses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `writerID` (`writerID`),
  ADD KEY `titleEnglish` (`titleEnglish`),
  ADD KEY `titleArabic` (`titleArabic`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ParentID` (`ParentID`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `writerID` (`writerID`),
  ADD KEY `titleEnglish` (`titleEnglish`),
  ADD KEY `titleArabic` (`titleArabic`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `poll`
--
ALTER TABLE `poll`
  ADD PRIMARY KEY (`id`),
  ADD KEY `titleEnglish` (`titleEnglish`),
  ADD KEY `titleArabic` (`titleArabic`),
  ADD KEY `writerID` (`writerID`);

--
-- Indexes for table `pollchoice`
--
ALTER TABLE `pollchoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `PollID` (`PollID`);

--
-- Indexes for table `updates`
--
ALTER TABLE `updates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `editorID` (`editorID`),
  ADD KEY `targetID` (`targetID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fullName` (`fullName`),
  ADD KEY `nameArabic` (`nameArabic`);

--
-- Indexes for table `youtube`
--
ALTER TABLE `youtube`
  ADD PRIMARY KEY (`id`),
  ADD KEY `writerID` (`writerID`),
  ADD KEY `titleEnglish` (`titleEnglish`),
  ADD KEY `titleArabic` (`titleArabic`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accses`
--
ALTER TABLE `accses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `poll`
--
ALTER TABLE `poll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pollchoice`
--
ALTER TABLE `pollchoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `updates`
--
ALTER TABLE `updates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `youtube`
--
ALTER TABLE `youtube`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
