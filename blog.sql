-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2024 at 04:28 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `posted_by_id` int(11) DEFAULT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `posted_by_id`, `title`, `description`, `date_created`, `date_updated`) VALUES
(1, 1, 'First Blog', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis elit dolor, elementum ut ligula ultricies, aliquet eleifend risus. Vivamus ut auctor sapien. Morbi at nibh id lorem viverra commodo augue dui, in pellentesque odio tempor. Etiam lobortis vel enim vitae facilisis. Suspendisse ac faucibus diam, non malesuada nisl. Maecenas vel aliquam eros, sit amet gravida lacus. nteger dictum, nulla [...]', '2024-06-27 12:46:52', '2024-06-27 13:22:56'),
(2, 2, 'Second Blog', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis elit dolor, elementum ut ligula ultricies, aliquet eleifend risus. Vivamus ut auctor sapien. Morbi at nibh id lorem viverra commodo augue dui, in pellentesque odio tempor. Etiam lobortis vel enim vitae facilisis. Suspendisse ac faucibus diam, non malesuada nisl. Maecenas vel aliquam eros, sit amet gravida lacus. nteger dictum, nulla [...]', '2024-06-27 12:46:52', '2024-06-27 13:22:56');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_active` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `blog_id`, `user_id`, `comment`, `date_created`, `date_updated`, `is_active`) VALUES
(2, 1, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec gravida blandit risus at finibus. In suscipit ligula velit, vel commodo libero viverra nec. Aenean luctus eleifend enim quis luctus. Aliquam vulputate placerat ullamcorper.\r\n Reply\r\n', '2024-06-27 13:15:51', '2024-06-27 14:00:42', b'1'),
(3, 2, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec gravida blandit risus at finibus. In suscipit ligula velit, vel commodo libero viverra nec. Aenean luctus eleifend enim quis luctus. Aliquam vulputate placerat ullamcorper.\r\n Reply\r\n', '2024-06-27 13:15:51', '2024-06-27 14:00:42', b'1'),
(4, 1, 1, 'test', '2024-06-27 13:39:42', '2024-06-27 14:01:11', b'0'),
(5, 1, 1, 'wow nice', '2024-06-27 13:50:21', '2024-06-27 14:00:42', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `first_name`, `last_name`, `username`, `password`, `date_created`, `date_updated`) VALUES
(1, 'admin', 'John Edcel', 'Zenarosa', 'admin', 'admin', '2024-06-27 12:16:59', '2024-06-27 13:44:55'),
(2, 'public', 'Lea Mae', 'Cervantes', 'user', 'user', '2024-06-27 12:16:59', '2024-06-27 13:45:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posted_by_fk` (`posted_by_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `blog_fk` (`blog_id`),
  ADD KEY `user_fk` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `posted_by_fk` FOREIGN KEY (`posted_by_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `blog_fk` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`),
  ADD CONSTRAINT `user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
