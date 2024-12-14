-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2024 at 06:22 PM
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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`) VALUES
(3, 'Health', 'This Talks about all health related issues'),
(4, 'Science &amp; Technology', 'Lets discover the latest discoveries all around the world'),
(6, 'Uncategorised', 'This is the discription for this category'),
(7, 'Sports', 'Get to everything concerning Sports');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `body` text NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `category_id` int(11) UNSIGNED DEFAULT NULL,
  `author_id` int(11) UNSIGNED NOT NULL,
  `is_featured` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `thumbnail`, `date_time`, `category_id`, `author_id`, `is_featured`) VALUES
(9, 'Are Robots the future', 'Yes they are', '1722188161IMG_20230526_120114.jpg', '2024-07-28 17:36:01', 4, 7, 0),
(10, 'Effects of smoking on the society', 'What does it do to the body', '1722189658IMG_20191218_033407.jpg', '2024-07-28 18:00:58', 3, 33, 1),
(11, 'How does nudity affect the society', 'it is good', '1722189717C__Data_Users_DefApps_AppData_INTERNETEXPLORER_Temp_Saved Images_imagesK9LB5H9N.jpg', '2024-07-28 18:01:57', 3, 33, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(500) NOT NULL,
  `is_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `avatar`, `is_admin`) VALUES
(7, 'Chijindu', 'Iruke', 'C.Iruke', 'cjiruke@gmail.com', '$2y$10$fmyiNzU1B4q0H/Hf3/LMpu02amovMLnKjhCNAN7G14h99VBkrphye', '1721381285IMG_20240429_230032.jpg', 1),
(25, 'Nnaemeka', 'Iruke', 'EmmieHighness', 'emeka1@gmail.com', '$2y$10$g5ukJYfdZ3NuLye6EUX2kO8zEEkE49TicaGlDlbE/PnBTIxI1A9rG', '1721830559IMG_20200514_102400.jpg', 1),
(33, 'Chioma', 'Iruke', 'Chio12', 'chioma@gmail.com', '$2y$10$p5G04yYbvPZvtkhFx3a1SOg3EKvYLc63ggG2VCTtEG5vITtXj15Ba', '1721850449IMG_20240429_230449.jpg', 1),
(45, 'Matthew', 'Orona', 'MattX', 'matthew@gmail.com', '$2y$10$P5gryf3nMZCsx.2x6OT0UOzrkX.BoXiiBk7H..if2CTkRT3NPXRFG', '1721911221IMG_20230603_220310.jpg', 0),
(47, 'Peter', 'Simon', 'Peter S', 'peter@gmail.com', '$2y$10$ELiUCBhBWJ5WQVHzxJclYeLbxr2G6mCeQm6YgUZ/2cE4L1rxu9kq.', '1721911634IMG_20191217_185026.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_blog_author` (`author_id`),
  ADD KEY `fk_blog_category` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `fk_blog_author` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_blog_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
