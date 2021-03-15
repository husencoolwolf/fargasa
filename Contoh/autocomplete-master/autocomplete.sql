-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 29, 2017 at 09:52 AM
-- Server version: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `autocomplete`
--

-- --------------------------------------------------------

--
-- Table structure for table `table_buah`
--

CREATE TABLE `tbl_buah` (
  `id` int(11) NOT NULL,
  `buah` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_buah`
--

INSERT INTO `tbl_buah` (`id`, `buah`) VALUES
(1, 'Apple'),
(2, 'Anggur'),
(3, 'Pisang'),
(4, 'Melon'),
(5, 'Peer'),
(6, 'Jeruk'),
(7, 'Semangka'),
(8, 'Nanas'),
(9, 'Manggis'),
(10, 'Durian'),
(11, 'Pepaya'),
(12, 'Sawo'),
(13, 'Rambutan'),
(14, 'Alpukat');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table_buah`
--
ALTER TABLE `tbl_buah`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table_buah`
--
ALTER TABLE `tbl_buah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
