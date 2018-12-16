-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 16, 2018 at 07:32 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud_kapanlagi`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_profil`
--

CREATE TABLE `data_profil` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `bod` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_profil`
--

INSERT INTO `data_profil` (`id`, `nama`, `bod`, `address`, `email`, `foto`) VALUES
(23, 'Ahok', '1965-12-01', 'Rutan', 'Ahok@ahok.com', '600x600_20170831_125654.JPG,240x240_20170831_125654.JPG'),
(24, 'Tsamara', '1955-01-02', 'Bekasi', 'Tsamara@wakawaka.com', '600x600_20170831_123626.JPG,240x240_20170831_123626.JPG'),
(25, 'Ahaye', '1970-12-06', 'Pasuruan', 'ahy@uhuy.com', '600x600_20170831_123656.JPG,240x240_20170831_123656.JPG'),
(26, 'Ibat', '2018-12-06', 'Madyopuro', 'nasiqul@ibat.com', '600x60001a1795e5fb30b7bd4862cb3d4bbb7a0.jpg,240x24001a1795e5fb30b7bd4862cb3d4bbb7a0.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_profil`
--
ALTER TABLE `data_profil`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_profil`
--
ALTER TABLE `data_profil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
