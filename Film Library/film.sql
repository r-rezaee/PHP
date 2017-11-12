-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2017 at 10:37 AM
-- Server version: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `film`
--

-- --------------------------------------------------------

--
-- Table structure for table `bibliotek`
--

CREATE TABLE `bibliotek` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `director` text NOT NULL,
  `year` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bibliotek`
--

INSERT INTO `bibliotek` (`id`, `title`, `director`, `year`, `categoryID`) VALUES
(1, 'The Godfather', 'Francis Ford Coppola', 1972, 1),
(17, 'Ice Age: Collision Course', 'Michael Thurmeier', 2016, 4),
(8, 'Seven Samurai', 'Akira Kurosawa', 1954, 1),
(18, 'Dead Pool', 'Tim Miller', 2016, 5);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `text` text NOT NULL,
  `categoryID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`text`, `categoryID`) VALUES
('Thriller', 1),
('Romantic', 2),
('Swedish', 3),
('Animated', 4),
('Comedy', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bibliotek`
--
ALTER TABLE `bibliotek`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bibliotek`
--
ALTER TABLE `bibliotek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
