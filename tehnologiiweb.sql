-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2017 at 05:03 PM
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
-- Table structure for table `found`
--

CREATE TABLE `found` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `nume` varchar(30) NOT NULL,
  `address` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `specific_description` varchar(1000) NOT NULL,
  `dd1` varchar(50) NOT NULL,
  `dd2` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `images` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `found`
--

INSERT INTO `found` (`id`, `userid`, `nume`, `address`, `date`, `specific_description`, `dd1`, `dd2`, `name`, `images`) VALUES
(5, 2, 'girafa', 'Pacureti, strada 3', '2017-06-01', 'Inalta, foarte inalta.', 'animals', 'Iasi', '', 0x6769726166612d73692d707569756c2e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `lost`
--

CREATE TABLE `lost` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `nume` varchar(30) NOT NULL,
  `address` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `specific_description` varchar(1000) NOT NULL,
  `dd1` varchar(50) NOT NULL,
  `dd2` varchar(50) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `images` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lost`
--

INSERT INTO `lost` (`id`, `userid`, `nume`, `address`, `date`, `specific_description`, `dd1`, `dd2`, `name`, `images`) VALUES
(13, 2, 'capul', 'nu stiu', '2017-06-06', 'Nici nu am idee cand si cum.', 'object', 'Calarasi', NULL, 0x31363134323232375f3736393934333837333135393638375f3136323732343238313434373735353130315f6e2e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `usernameus` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `passwordus` varchar(30) NOT NULL,
  `phone` int(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `images` blob NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`fname`, `lname`, `usernameus`, `email`, `passwordus`, `phone`, `gender`, `images`, `id`) VALUES
('Codruta', 'Dudau', 'codrutadudau', 'andreeacodruta89@yahoo.com', 'lostnfound', 78956748, '', 0x63686974616e74612e6a7067, 1),
('Raluca', 'Murarasu', 'ralucamurarasu', 'ralucamurarasu@yahoo.com', 'caine', 789056784, 'female', 0x63686974616e74612e6a7067, 2),
('Alexandra', 'Boca', 'bocaalexandra', 'bocaalexandra@yahoo.com', 'blablabla', 897589436, 'female', '', 3);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `found`
--
ALTER TABLE `found`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `lost`
--
ALTER TABLE `lost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
