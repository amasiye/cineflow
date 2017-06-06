-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 05, 2017 at 02:56 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cineflow_v3`
--

-- --------------------------------------------------------

--
-- Table structure for table `cineflow_categories`
--

CREATE TABLE `cineflow_categories` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_description` text NOT NULL,
  `category_parent` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cineflow_categories`
--

INSERT INTO `cineflow_categories` (`category_id`, `category_name`, `category_description`, `category_parent`) VALUES
(1, 'genre', 'Movie and TV genres', 0),
(2, 'tv', 'TV Shows', 1),
(3, 'action', 'Action Movies', 1),
(4, 'adventure', 'Adventure', 1),
(5, 'comedy', 'Comedy', 1),
(6, 'classics', 'Classics', 1),
(7, 'crime &amp gangster', 'Crime &amp Gangster', 1),
(8, 'drama', 'Drama', 1),
(9, 'epics', 'Epics', 1),
(10, 'historical', 'Historical', 1),
(11, 'horror', 'Horror', 1),
(12, 'musicals &amp; dance', 'Musicals &amp; Dance\r\n', 1),
(13, 'romance', 'Romance', 1),
(14, 'sci-fi', 'Sci-Fi\r\n', 1),
(15, 'war', 'War', 1),
(16, 'westerns', 'Westerns', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cineflow_entries`
--

CREATE TABLE `cineflow_entries` (
  `entry_id` int(10) UNSIGNED NOT NULL,
  `entry_title` varchar(255) NOT NULL,
  `entry_description` text NOT NULL,
  `entry_director` int(11) NOT NULL,
  `entry_cast` varchar(255) NOT NULL,
  `entry_images` text NOT NULL,
  `entry_videos` text NOT NULL,
  `entry_user_score` decimal(2,1) NOT NULL,
  `entry_genres` varchar(255) NOT NULL,
  `entry_year` int(4) NOT NULL,
  `entry_views` text NOT NULL,
  `entry_meta` text NOT NULL,
  `entry_status` enum('listed','unlisted','archived','deleted') NOT NULL DEFAULT 'unlisted',
  `entry_tags` varchar(255) NOT NULL,
  `entry_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `entry_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cineflow_media`
--

CREATE TABLE `cineflow_media` (
  `media_id` bigint(20) NOT NULL,
  `media_title` varchar(255) NOT NULL,
  `media_description` text NOT NULL,
  `media_author` bigint(20) UNSIGNED NOT NULL,
  `media_path` varchar(255) NOT NULL,
  `media_type` enum('image','video','audio') NOT NULL DEFAULT 'video',
  `media_status` enum('active','archived','deleted') NOT NULL DEFAULT 'active',
  `media_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `media_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cineflow_messages`
--

CREATE TABLE `cineflow_messages` (
  `message_id` bigint(20) NOT NULL,
  `message_title` varchar(255) NOT NULL,
  `message_body` text NOT NULL,
  `message_author` bigint(20) NOT NULL,
  `message_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `message_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `message_meta` text NOT NULL,
  `message_type` enum('message','notification','email') NOT NULL DEFAULT 'message'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cineflow_options`
--

CREATE TABLE `cineflow_options` (
  `option_id` int(10) UNSIGNED NOT NULL,
  `option_name` varchar(100) NOT NULL,
  `option_value` text NOT NULL,
  `option_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cineflow_persons`
--

CREATE TABLE `cineflow_persons` (
  `person_id` int(11) NOT NULL,
  `person_name` int(11) NOT NULL,
  `person_info` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cineflow_users`
--

CREATE TABLE `cineflow_users` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_login` varchar(100) NOT NULL,
  `user_password` int(128) NOT NULL,
  `user_email` int(100) NOT NULL,
  `user_fullname` int(128) NOT NULL,
  `user_address` text NOT NULL,
  `user_billing` text NOT NULL,
  `user_type` enum('standard','admin','curator','developer') NOT NULL DEFAULT 'standard',
  `user_registered` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_activity` text NOT NULL,
  `user_status` enum('unverified','verified','dormant','hold','suspended','deactivated','') DEFAULT 'unverified',
  `user_watchlist` text NOT NULL,
  `user_flags` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cineflow_user_activity`
--

CREATE TABLE `cineflow_user_activity` (
  `activity_id` bigint(20) UNSIGNED NOT NULL,
  `activity_actor` bigint(20) UNSIGNED NOT NULL,
  `activity_target` bigint(20) UNSIGNED NOT NULL,
  `activity_action` text NOT NULL,
  `activity_first_action` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `activity_latest_action` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cineflow_categories`
--
ALTER TABLE `cineflow_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `cineflow_entries`
--
ALTER TABLE `cineflow_entries`
  ADD PRIMARY KEY (`entry_id`);

--
-- Indexes for table `cineflow_media`
--
ALTER TABLE `cineflow_media`
  ADD PRIMARY KEY (`media_id`);

--
-- Indexes for table `cineflow_messages`
--
ALTER TABLE `cineflow_messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `cineflow_options`
--
ALTER TABLE `cineflow_options`
  ADD PRIMARY KEY (`option_id`);

--
-- Indexes for table `cineflow_users`
--
ALTER TABLE `cineflow_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- Indexes for table `cineflow_user_activity`
--
ALTER TABLE `cineflow_user_activity`
  ADD PRIMARY KEY (`activity_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cineflow_categories`
--
ALTER TABLE `cineflow_categories`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `cineflow_entries`
--
ALTER TABLE `cineflow_entries`
  MODIFY `entry_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cineflow_media`
--
ALTER TABLE `cineflow_media`
  MODIFY `media_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cineflow_messages`
--
ALTER TABLE `cineflow_messages`
  MODIFY `message_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cineflow_options`
--
ALTER TABLE `cineflow_options`
  MODIFY `option_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cineflow_users`
--
ALTER TABLE `cineflow_users`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cineflow_user_activity`
--
ALTER TABLE `cineflow_user_activity`
  MODIFY `activity_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
