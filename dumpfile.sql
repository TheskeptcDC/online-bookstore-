-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2024 at 04:21 PM
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
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(20) NOT NULL DEFAULT 'Librarian',
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `isbn` int(10) UNSIGNED NOT NULL,
  `book_name` varchar(30) NOT NULL,
  `book_description` text NOT NULL,
  `book_url` varchar(70) DEFAULT ' lib-img.jpeg',
  `decks` int(10) UNSIGNED NOT NULL,
  `isBorrowed` enum('yes','no') NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`isbn`, `book_name`, `book_description`, `book_url`, `decks`, `isBorrowed`) VALUES
(1234, 'test book 2', 'QEF', 'Screenshot 2024-10-07 042734.png', 14, 'yes'),
(11122, 'hack', 'TESTING ', 'Screenshot 2024-10-07 042734.png', 14, 'yes'),
(22222, 'the books', 'FFFFF', 'Screenshot 2024-10-07 042734.png', 14, 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `decks`
--

CREATE TABLE `decks` (
  `deck_id` int(10) UNSIGNED NOT NULL,
  `deck_name` varchar(30) NOT NULL,
  `deck_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `decks`
--

INSERT INTO `decks` (`deck_id`, `deck_name`, `deck_desc`) VALUES
(14, 'books books', 'sdxfcgvhbjdfcghbk'),
(5, 'gfds', 'aerEWRG'),
(4, 'TFDS', 'SRGT');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` varchar(10) NOT NULL,
  `user_name` varchar(20) NOT NULL DEFAULT 'anony',
  `password` text NOT NULL,
  `isAdmin` enum('yes','no') NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `password`, `isAdmin`) VALUES
('', 'dee', '1234', 'no'),
('', 'anony', '12345', 'yes'),
('', 'blessings ', '1234567890', 'yes'),
('', 'kewa', '0987654321', 'no');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`isbn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
