-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2024 at 04:19 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `delima_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `purchase_form`
--

CREATE TABLE `purchase_form` (
  `id` int(100) NOT NULL,
  `placed` varchar(255) NOT NULL DEFAULT 'shoppe',
  `orderNo` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phoneNo` varchar(255) NOT NULL,
  `descr` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `note` varchar(255) NOT NULL DEFAULT 'No notes',
  `updateby` varchar(255) NOT NULL DEFAULT 'Mas'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchase_form`
--

INSERT INTO `purchase_form` (`id`, `placed`, `orderNo`, `name`, `phoneNo`, `descr`, `date`, `status`, `note`, `updateby`) VALUES
(1, 'Tiktok', 'TT1234', 'fatnin', '019999', 'jus 4 , pati 1 , madu mixbee 1', '2024-02-06', 'delivered', 'settle', 'amirah'),
(3, 'Facebook', 'FB542', 'aini', '0171824', 'promo jus 4 ', '2024-02-13', 'delivered', 'settle', 'mirah');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `purchase_form`
--
ALTER TABLE `purchase_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `purchase_form`
--
ALTER TABLE `purchase_form`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
