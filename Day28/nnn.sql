-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2024 at 05:50 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nnn`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `rarity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `name`, `image`, `type`, `rarity`) VALUES
(1, 'Mindy - B:Lilac', 'mindyBL.jpg', 'Star Dewasa', 'Common'),
(2, 'Mindy - B:Buttermilk', 'mindyBM.jpg', 'Star Dewasa', 'Common'),
(3, 'Tranquify - B:Buttermilk', 'tranquifyBM.jpg', 'Star Dewasa', 'Common'),
(4, 'Dear Daisy - B:Star Lover Ungu', 'daisySLU.jpg', 'Star Dewasa', 'Common'),
(5, 'Dear Daisy - B:Star Lover Peach', 'daisySLP.jpg', 'Star Dewasa', 'Common'),
(6, 'Matteo - Gray', 'matteoG.jpg', 'Star Dewasa', 'Uncommon'),
(7, 'Matteo - Brown', 'matteoB.jpg', 'Star Dewasa', 'Uncommon'),
(8, 'Candy Floss Berry - B:Blush', 'candyflossB.jpg', 'Star Dewasa', 'Rare'),
(9, 'Golden Memory - B:Lich Sage', 'goldenmemoryLS.jpg', 'Star Dewasa', 'Rare'),
(10, 'Maharani', 'maharani.jpg', 'Star Dewasa', 'Epic');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(64) NOT NULL,
  `bpoint` int(11) NOT NULL,
  `hold` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `bpoint`, `hold`) VALUES
(2, 'admin', 'admin@gmail.com', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 0, 2),
(3, 'cihuyman', 'ahciong@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 0, 10);

-- --------------------------------------------------------

--
-- Table structure for table `user_items`
--

CREATE TABLE `user_items` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_items`
--

INSERT INTO `user_items` (`id`, `user_id`, `item_id`) VALUES
(91, 3, 1),
(99, 3, 9),
(100, 3, 1),
(101, 3, 2),
(102, 3, 6),
(103, 3, 9),
(104, 3, 5),
(105, 3, 6),
(106, 3, 1),
(107, 3, 1),
(108, 3, 5),
(109, 3, 7),
(110, 3, 10),
(111, 3, 6),
(112, 3, 7),
(113, 3, 8),
(114, 3, 5),
(115, 3, 6),
(116, 3, 5),
(117, 3, 7),
(118, 3, 8),
(119, 3, 4),
(120, 3, 4),
(121, 3, 1),
(122, 3, 6),
(123, 3, 7),
(124, 3, 6),
(125, 3, 1),
(126, 3, 2),
(127, 3, 5),
(128, 3, 3),
(129, 3, 9),
(130, 3, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hold` (`hold`);

--
-- Indexes for table `user_items`
--
ALTER TABLE `user_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `item_id` (`item_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_items`
--
ALTER TABLE `user_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`hold`) REFERENCES `items` (`item_id`);

--
-- Constraints for table `user_items`
--
ALTER TABLE `user_items`
  ADD CONSTRAINT `user_items_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `user_items_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `items` (`item_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
