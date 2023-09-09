-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2022 at 06:48 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `socialshout`
--

-- --------------------------------------------------------

--
-- Table structure for table `block_list`
--

CREATE TABLE `block_list` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `blocked_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `comment`, `created_at`) VALUES
(5, 4, 1, 'hi', '2022-11-10 09:21:41'),
(6, 4, 1, 'test', '2022-11-10 09:37:58'),
(7, 3, 1, 'hi', '2022-11-10 09:40:18'),
(9, 1, 1, 'test', '2022-11-10 09:42:36'),
(10, 6, 1, 'hi', '2022-11-10 09:47:28'),
(11, 7, 1, 'hi', '2022-11-10 09:49:21'),
(12, 7, 1, 'hi', '2022-11-10 09:52:09'),
(13, 7, 1, 'test', '2022-11-10 09:52:45');

-- --------------------------------------------------------

--
-- Table structure for table `follow_list`
--

CREATE TABLE `follow_list` (
  `id` int(11) NOT NULL,
  `follower_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `follow_list`
--

INSERT INTO `follow_list` (`id`, `follower_id`, `user_id`) VALUES
(2, 2, 1),
(3, 1, 3),
(6, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `post_id`, `user_id`) VALUES
(4, 4, 1),
(9, 6, 2),
(10, 4, 2),
(15, 6, 1),
(17, 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `msg` text NOT NULL,
  `read_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `from_user_id`, `to_user_id`, `msg`, `read_status`, `created_at`) VALUES
(1, 1, 2, 'hi test', 0, '2022-11-10 14:39:40'),
(2, 4, 1, 'test', 1, '2022-11-10 14:46:32'),
(3, 3, 1, 'test', 1, '2022-11-10 14:46:49'),
(4, 2, 1, 'hi', 1, '2022-11-10 16:27:20'),
(5, 1, 2, 'hi', 0, '2022-11-11 05:48:15');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `from_user_id` int(11) NOT NULL,
  `read_status` int(11) NOT NULL DEFAULT 0,
  `post_id` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_img` text NOT NULL,
  `post_text` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `post_img`, `post_text`, `created_at`) VALUES
(1, 1, '1667634366Social Shout-1-2.png', 'first image', '2022-11-05 07:46:06'),
(3, 1, '1667636520SocialShout-logo-1.png', '2nd post', '2022-11-05 08:22:00'),
(4, 1, '1667636802SocialShout-logo-2.jpeg', '', '2022-11-05 08:26:42'),
(5, 11, '1667988936SocialShout-logo-1.png', '', '2022-11-09 10:15:36'),
(6, 2, '1667991608post2.jpg', 'hiii', '2022-11-09 11:00:08'),
(7, 1, '1668073756post.jpg', 'test', '2022-11-10 09:49:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `gender` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `profile_pic` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `acc_status` int(11) NOT NULL COMMENT '0- Not Verified,1- Active,2- blocked '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `gender`, `email`, `username`, `password`, `profile_pic`, `created_at`, `updated_at`, `acc_status`) VALUES
(1, 'Anik', 'Doshi', 1, 'anikdoshi2003@gmail.com', 'anik2003', 'cc03e747a6afbbcbf8be7668acfebee5', '1667636220ANIKDOSHI1809PHOTO.jpg', '2022-11-01 15:14:46', '2022-11-09 10:14:49', 1),
(2, 'Raj', 'Shah', 1, 'anikdoshi3@gmail.com', 'raj123', 'cc03e747a6afbbcbf8be7668acfebee5', 'default_profile.jpg', '2022-11-02 13:04:46', '2022-11-11 05:23:07', 1),
(3, 'te', 'test', 1, 'test3@socialshout.com', 'test3', 'cc03e747a6afbbcbf8be7668acfebee5', 'default_profile.jpg', '2022-11-09 10:19:18', '2022-11-11 05:23:36', 1),
(4, 'test4', 'test', 2, 'test4@socialshout.com', 'test4', 'cc03e747a6afbbcbf8be7668acfebee5', 'default_profile.jpg', '2022-11-09 10:19:43', '2022-11-09 10:35:00', 1),
(5, 'test6', 'test', 0, 'test6@socialshout.com', 'test6', '16d7a4fca7442dda3ad93c9a726597e4', 'default_profile.jpg', '2022-11-09 10:34:19', '2022-11-11 05:23:14', 1),
(17, 'test7', 'test', 1, 'test7@socialshout.com', 'test7.socialshout', 'cc03e747a6afbbcbf8be7668acfebee5', 'default_profile.jpg', '2022-11-10 19:15:41', NULL, 0),
(18, 'test8', 'test8', 1, 'anik.doshi@somaiya.edu', 'test8.socialshout', 'cc03e747a6afbbcbf8be7668acfebee5', 'default_profile.jpg', '2022-11-10 19:16:46', '2022-11-10 19:17:45', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `block_list`
--
ALTER TABLE `block_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `follow_list`
--
ALTER TABLE `follow_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `block_list`
--
ALTER TABLE `block_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `follow_list`
--
ALTER TABLE `follow_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
