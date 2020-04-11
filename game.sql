-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2018 at 05:43 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `game`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `title` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `game_id`, `title`, `content`, `rating`) VALUES
(1, 1, 'Lorem', 'Ipsum', 5),
(2, 1, 'Lorem', 'Ipsum', 2),
(3, 1, 'qerqewr', 'qerqwer                ', 1),
(4, 2, 'Test comment', 'wow                ', 5);

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `initial_release` year(4) NOT NULL,
  `designer` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `engine` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `developer` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`title`, `initial_release`, `designer`, `engine`, `developer`, `image`, `id`) VALUES
('Fortnite', 2017, 'Darren Sugg', 'Unreal Engine 4', 'Epic Games', 'sources/img/fort.jpg', 1),
('Assassin\'s Creed Origins', 2017, 'Darren Sugg', 'Unreal Engine 4', 'Epic Games', 'sources/img/AC.jpg', 2),
('Call of Duty: WW2', 2017, 'Darren Sugg', 'Unreal Engine 4', 'Epic Games', 'sources/img/cod.jpg', 3),
('FIFA 19', 2017, 'Darren Sugg', 'Unreal Engine 4', 'Epic Games', 'sources/img/fifa1.jpg', 4),
('Gods of War', 2017, 'Darren Sugg', 'Unreal Engine 4', 'Epic Games', 'sources/img/gof.jpg', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_to_game` (`game_id`);

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comment_to_game` FOREIGN KEY (`game_id`) REFERENCES `game` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
