-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2017 at 08:24 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tehnologiiweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat_private`
--

CREATE TABLE `chat_private` (
  `chat_date` int(10) DEFAULT NULL,
  `chat_psw` varchar(20) NOT NULL DEFAULT '',
  `chat_msg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `found`
--

CREATE TABLE `found` (
  `nume` varchar(30) NOT NULL,
  `address` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `specific_description` varchar(1000) NOT NULL,
  `dd1` varchar(50) NOT NULL,
  `dd2` varchar(50) NOT NULL,
  `filename` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `phone` int(10) NOT NULL,
  `image` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`fname`, `lname`, `username`, `email`, `password`, `phone`, `image`) VALUES
('Codruta', 'Dudau', 'codrutadudau', 'andreeacodruta89@yahoo.com', '123456', 767854321, ''),
('', '', '', '', '', 0, ''),
('', '', '', '', '', 0, ''),
('Raluca', 'Murarasu', 'ralucamurarasu', 'ralucamurarasu@yahoo.com', '789987', 789654231, ''),
('', '', '', '', '', 0, ''),
('Alexandra', 'Boca', 'alexandraboca', 'alexandraboca@yahoo.com', '123456789', 723456123, ''),
('Mihaela', 'Nicolae', 'mihaelanicolae', 'mihaelanicolae@yahoo.com', '345678', 745678912, ''),
('Codruta', 'Dudau', 'codrutadudau', 'andreeacodruta89@yahoo.com', '123456', 767854321, ''),
('dsfegr', 'dwfegr', 'defgsr', 'ral@yahoo.com', '12345', 742551848, ''),
('sponge', 'bob', 'spongebob', 'spingebob@yahoo.com', 'sponge', 748021863, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
