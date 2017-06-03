-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 03 Iun 2017 la 11:32
-- Versiune server: 10.1.21-MariaDB
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
-- Structura de tabel pentru tabelul `chat_private`
--

CREATE TABLE `chat_private` (
  `chat_date` int(10) DEFAULT NULL,
  `chat_psw` varchar(20) NOT NULL DEFAULT '',
  `chat_msg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `found`
--

CREATE TABLE `found` (
  `id` int(11) NOT NULL,
  `nume` varchar(30) NOT NULL,
  `address` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `specific_description` varchar(1000) NOT NULL,
  `dd1` varchar(50) NOT NULL,
  `dd2` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `filename` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `lost`
--

CREATE TABLE `lost` (
  `id` int(11) NOT NULL,
  `nume` varchar(30) NOT NULL,
  `address` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `specific_description` varchar(1000) NOT NULL,
  `dd1` varchar(50) NOT NULL,
  `dd2` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `filename` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `users`
--

CREATE TABLE `users` (
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `usernameus` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `passwordus` varchar(30) NOT NULL,
  `phone` int(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `images` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `users`
--

INSERT INTO `users` (`fname`, `lname`, `usernameus`, `email`, `passwordus`, `phone`, `gender`, `images`) VALUES
('Codruta', 'Dudau', 'codrutadudau', 'andreeacodruta89@yahoo.com', 'lostnfound', 78956748, '', ''),
('Raluca', 'Murarasu', 'ralucamurarasu', 'ralucamurarasu@yahoo.com', 'caine', 789056784, 'female', ''),
('Alexandra', 'Boca', 'bocaalexandra', 'bocaalexandra@yahoo.com', 'blablabla', 897589436, 'female', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `found`
--
ALTER TABLE `found`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lost`
--
ALTER TABLE `lost`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `found`
--
ALTER TABLE `found`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lost`
--
ALTER TABLE `lost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
