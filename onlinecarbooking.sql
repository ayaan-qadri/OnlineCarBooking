-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2023 at 03:00 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinecarbooking`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'p3ntw0lf', 'p3ntw0lf@github');

-- --------------------------------------------------------

--
-- Table structure for table `bmw`
--

CREATE TABLE `bmw` (
  `id` int(11) UNSIGNED NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `carName` varchar(50) DEFAULT NULL,
  `price` varchar(50) DEFAULT NULL,
  `fuel` varchar(50) DEFAULT NULL,
  `gearType` varchar(50) DEFAULT NULL,
  `sitting` varchar(10) DEFAULT NULL,
  `engine` varchar(100) DEFAULT NULL,
  `mileage` varchar(50) DEFAULT NULL,
  `bph` varchar(100) DEFAULT NULL,
  `driveType` varchar(100) DEFAULT NULL,
  `rating` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `number` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(20) NOT NULL,
  `car` varchar(20) NOT NULL,
  `brandName` varchar(50) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `brandName` varchar(50) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `brandName`, `img`) VALUES
(11, 'mahidra', 'carBooking/images/logos/mahindra.png'),
(12, 'kia', 'carBooking/images/logos/kia.jpg'),
(13, 'hyundai', 'carBooking/images/logos/hyundai.jpg'),
(14, 'tata', 'carBooking/images/logos/tata.jpg'),
(16, 'bmw', 'carBooking/images/logos/bmw.jpg'),
(17, 'toyota', 'carBooking/images/logos/toyota.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` bigint(255) NOT NULL,
  `details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`details`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `details`) VALUES
(9, '{\"name\":\"P3ntwolf github\",\"number\":\"0000000000\",\"email\":\"pentwold@gmail.com\",\"msg\":\"Hey, Your website is really nice,Keep going.\"}');

-- --------------------------------------------------------

--
-- Table structure for table `hyundai`
--

CREATE TABLE `hyundai` (
  `id` int(11) UNSIGNED NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `carName` varchar(50) DEFAULT NULL,
  `price` varchar(50) DEFAULT NULL,
  `fuel` varchar(50) DEFAULT NULL,
  `gearType` varchar(50) DEFAULT NULL,
  `sitting` varchar(10) DEFAULT NULL,
  `engine` varchar(100) DEFAULT NULL,
  `mileage` varchar(50) DEFAULT NULL,
  `bph` varchar(100) DEFAULT NULL,
  `driveType` varchar(100) DEFAULT NULL,
  `rating` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kia`
--

CREATE TABLE `kia` (
  `id` int(11) UNSIGNED NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `carName` varchar(50) DEFAULT NULL,
  `price` varchar(50) DEFAULT NULL,
  `fuel` varchar(50) DEFAULT NULL,
  `gearType` varchar(50) DEFAULT NULL,
  `sitting` varchar(10) DEFAULT NULL,
  `engine` varchar(100) DEFAULT NULL,
  `mileage` varchar(50) DEFAULT NULL,
  `bph` varchar(100) DEFAULT NULL,
  `driveType` varchar(100) DEFAULT NULL,
  `rating` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mahidra`
--

CREATE TABLE `mahidra` (
  `id` int(11) UNSIGNED NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `carName` varchar(50) DEFAULT NULL,
  `price` varchar(50) DEFAULT NULL,
  `fuel` varchar(50) DEFAULT NULL,
  `gearType` varchar(50) DEFAULT NULL,
  `sitting` varchar(10) DEFAULT NULL,
  `engine` varchar(100) DEFAULT NULL,
  `mileage` varchar(50) DEFAULT NULL,
  `bph` varchar(100) DEFAULT NULL,
  `driveType` varchar(100) DEFAULT NULL,
  `rating` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahidra`
--

INSERT INTO `mahidra` (`id`, `img`, `carName`, `price`, `fuel`, `gearType`, `sitting`, `engine`, `mileage`, `bph`, `driveType`, `rating`) VALUES
(1, 'carBooking/brands/images/thar.jpg', 'thar', '11 - 17Lakh', 'Diesel/Petrol', 'manual', '4', '1497 - 2184', '15.2', '116 - 116', '4X4 / RWD', '★★★★'),
(2, 'carBooking/brands/images/xuv700 (2).jpg', 'xuv700', '14 - 27Lakh', 'Diesel/Petrol', 'Manual/Automatic', '5,7', '1999 - 2198', '16', '152 - 197', 'FWD / AWD', '★★★★★'),
(3, 'carBooking/brands/images/bolero.jpg', 'bolero', '9 - 11Lakh', 'Petrol', 'manual', '7', '1439', '16', '74.96', 'RWD', '★★★★'),
(4, 'carBooking/brands/images/xuv300.jpg', 'xuv300', '8 - 15Lakh', 'Diesel/Petrol', 'manual', '5', '1197 - 1497', '20.1', '108 - 128', 'FWD', '★★★★');

-- --------------------------------------------------------

--
-- Table structure for table `mostboughtcars`
--

CREATE TABLE `mostboughtcars` (
  `id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `carName` varchar(50) NOT NULL,
  `rating` varchar(50) NOT NULL,
  `fuel` varchar(20) NOT NULL,
  `sitting` varchar(50) NOT NULL,
  `price` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mostboughtcars`
--

INSERT INTO `mostboughtcars` (`id`, `img`, `carName`, `rating`, `fuel`, `sitting`, `price`) VALUES
(30, 'carBooking/images/endeavour.jpeg', 'endeavour', '★★★★★', 'Diesel/Petrol', '7', '35 - 45 lakh'),
(31, 'carBooking/images/fortuner.jpg', 'fortuner', '★★★★', 'Diesel/Petrol', '7', '32 - 50 lakh'),
(32, 'carBooking/images/urus.jpg', 'urus', '★★★★★', 'Petrol', '5', '4.18 - 4.22 cr'),
(33, 'carBooking/images/x7.jpg', 'BMW X7', '★★★★★', 'Diesel/Petrol', '6', '1.24 - 1.26 cr'),
(34, 'carBooking/images/thar.jpg', 'thar', '★★★★', 'Diesel/Petrol', '4', '11 - 17 lakh');

-- --------------------------------------------------------

--
-- Table structure for table `tata`
--

CREATE TABLE `tata` (
  `id` int(11) UNSIGNED NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `carName` varchar(50) DEFAULT NULL,
  `price` varchar(50) DEFAULT NULL,
  `fuel` varchar(50) DEFAULT NULL,
  `gearType` varchar(50) DEFAULT NULL,
  `sitting` varchar(10) DEFAULT NULL,
  `engine` varchar(100) DEFAULT NULL,
  `mileage` varchar(50) DEFAULT NULL,
  `bph` varchar(100) DEFAULT NULL,
  `driveType` varchar(100) DEFAULT NULL,
  `rating` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `toyota`
--

CREATE TABLE `toyota` (
  `id` int(11) UNSIGNED NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `carName` varchar(50) DEFAULT NULL,
  `price` varchar(50) DEFAULT NULL,
  `fuel` varchar(50) DEFAULT NULL,
  `gearType` varchar(50) DEFAULT NULL,
  `sitting` varchar(10) DEFAULT NULL,
  `engine` varchar(100) DEFAULT NULL,
  `mileage` varchar(50) DEFAULT NULL,
  `bph` varchar(100) DEFAULT NULL,
  `driveType` varchar(100) DEFAULT NULL,
  `rating` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` bigint(20) NOT NULL,
  `password` varchar(16) NOT NULL,
  `mobile_no` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bmw`
--
ALTER TABLE `bmw`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hyundai`
--
ALTER TABLE `hyundai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kia`
--
ALTER TABLE `kia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahidra`
--
ALTER TABLE `mahidra`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mostboughtcars`
--
ALTER TABLE `mostboughtcars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tata`
--
ALTER TABLE `tata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `toyota`
--
ALTER TABLE `toyota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bmw`
--
ALTER TABLE `bmw`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `hyundai`
--
ALTER TABLE `hyundai`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kia`
--
ALTER TABLE `kia`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mahidra`
--
ALTER TABLE `mahidra`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mostboughtcars`
--
ALTER TABLE `mostboughtcars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tata`
--
ALTER TABLE `tata`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `toyota`
--
ALTER TABLE `toyota`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
