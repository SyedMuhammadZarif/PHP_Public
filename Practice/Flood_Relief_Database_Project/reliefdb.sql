-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2024 at 12:47 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `businessdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `funds_received`
--

CREATE TABLE `funds_received` (
  `donation_id` varchar(50) NOT NULL,
  `Amount` int(200) NOT NULL,
  `Payment_Method` varchar(50) NOT NULL,
  `Payment_From` varchar(50) NOT NULL,
  `Payment_Date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `funds_received`
--

INSERT INTO `funds_received` (`donation_id`, `Amount`, `Payment_Method`, `Payment_From`, `Payment_Date`) VALUES
('2024092200095401886897855', 200, 'BankTransfer', '01886897855', '00:09:54 2024-09-22'),
('2024092200101601886897855', 200, 'bkash', '01886897855', '00:10:16 2024-09-22'),
('2024092200271901886897855', 800, 'bkash', '01886897855', '00:27:19 2024-09-22'),
('2024092210123501884800288', 1000, 'bkash', '01884800288', '10:12:35 2024-09-22'),
('2024092210191701884800288', 11111, 'bkash', '01884800288', '10:19:17 2024-09-22'),
('2024092211451901884800288', 1200, 'bkash', '01884800288', '11:45:19 2024-09-22');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `username` varchar(40) NOT NULL,
  `item_id` int(255) NOT NULL,
  `water` int(255) NOT NULL,
  `food` int(255) NOT NULL,
  `cloth` int(255) NOT NULL,
  `medical` int(255) NOT NULL,
  `Start` tinyint(1) DEFAULT NULL,
  `Delivered` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`username`, `item_id`, `water`, `food`, `cloth`, `medical`, `Start`, `Delivered`) VALUES
('01518495321', 4, -10, -10, -10, -10, 1, 0),
('01518495321', 5, -20, -25, -30, -50, 0, 0),
('01884800288', 6, 0, 0, 0, 0, 0, 0),
('01518495321', 7, 100, 0, 50, 10, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `item_stock`
--

CREATE TABLE `item_stock` (
  `Item_ID` int(11) NOT NULL,
  `Item_name` varchar(50) NOT NULL,
  `Quantity_in_stock` bigint(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item_stock`
--

INSERT INTO `item_stock` (`Item_ID`, `Item_name`, `Quantity_in_stock`) VALUES
(1, 'Bandages', 310),
(2, 'Water', 100),
(3, 'Clothes', 300),
(4, 'Food', 45);

-- --------------------------------------------------------

--
-- Table structure for table `releif_request`
--

CREATE TABLE `releif_request` (
  `request_id` int(20) NOT NULL,
  `username` varchar(40) NOT NULL,
  `division` varchar(40) NOT NULL,
  `zilla` varchar(40) NOT NULL,
  `village` varchar(40) NOT NULL,
  `house` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `releif_request`
--

INSERT INTO `releif_request` (`request_id`, `username`, `division`, `zilla`, `village`, `house`) VALUES
(35, '01518495321', 'chittagong', 'feni', 'chagolnaiya', 460),
(36, '01518495321', 'Sylhet', 'Shunamgonj', 'bhatera', 125),
(37, '01518495321', 'Sylhet', 'Shunamgonj', 'bhatera', 0);

-- --------------------------------------------------------

--
-- Table structure for table `relief_item_sent_`
--

CREATE TABLE `relief_item_sent_` (
  `relief_id` varchar(255) NOT NULL,
  `item_id` int(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `received` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `relief_item_sent_`
--

INSERT INTO `relief_item_sent_` (`relief_id`, `item_id`, `quantity`, `received`) VALUES
('2024092122025001886897855', 1, 4, 1),
('2024092122025001886897855', 3, 4, 1),
('2024092122025001886897855', 2, 1, 0),
('2024092122025001886897855', 4, 1, 0),
('2024092200370701886897855', 1, 123, 0),
('2024092200370701886897855', 3, 3, 0),
('2024092200370701886897855', 2, 2, 0),
('2024092200370701886897855', 4, 4, 0),
('2024092210185201884800288', 1, 50, 0),
('2024092210185201884800288', 3, 50, 0),
('2024092210185201884800288', 2, 50, 0),
('2024092210185201884800288', 4, 50, 0),
('2024092210302201639857465', 1, 15, 0),
('2024092210302201639857465', 3, 20, 0),
('2024092210302201639857465', 2, 21, 0),
('2024092210302201639857465', 4, 50, 0),
('2024092211460401884800288', 1, 50, 0),
('2024092211460401884800288', 3, 60, 0),
('2024092211460401884800288', 2, 50, 0),
('2024092211460401884800288', 4, 100, 0);

-- --------------------------------------------------------

--
-- Table structure for table `relief_order_sent`
--

CREATE TABLE `relief_order_sent` (
  `Sender_Phone` varchar(11) NOT NULL,
  `Sender_Address` varchar(255) NOT NULL,
  `request_id` varchar(100) NOT NULL,
  `delivered` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `relief_order_sent`
--

INSERT INTO `relief_order_sent` (`Sender_Phone`, `Sender_Address`, `request_id`, `delivered`) VALUES
('01886897855', 'Bunglow#16 Port Officers Colony, Saltgola, Chittagong', '3', 0),
('01886897855', 'Bunglow#16 Port Officers Colony, Saltgola, Chittagong', '3', 0),
('01884800288', 'shunamganj', '4', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sender_tracking`
--

CREATE TABLE `sender_tracking` (
  `tracking_number` varchar(100) NOT NULL,
  `contact_number` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sender_tracking`
--

INSERT INTO `sender_tracking` (`tracking_number`, `contact_number`) VALUES
('2024092203431001886897855', '1886897855'),
('2024092208360401886897855', '1886897855'),
('2024092210185201884800288', '1884800288'),
('2024092210185201884800288', '1884800288'),
('2024092210302201639857465', '1639857465'),
('2024092211460401884800288', '1884800288');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(11) NOT NULL,
  `password` varchar(20) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `reg_date`, `status`) VALUES
('01518495321', 'flood1', '2024-09-22 09:42:16', 'not ready'),
('01639857465', 'admin', '2024-09-22 06:22:26', 'none'),
('01884800288', 'sender1', '2024-09-22 06:23:22', 'none');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `item_stock`
--
ALTER TABLE `item_stock`
  ADD PRIMARY KEY (`Item_ID`);

--
-- Indexes for table `releif_request`
--
ALTER TABLE `releif_request`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `item_stock`
--
ALTER TABLE `item_stock`
  MODIFY `Item_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `releif_request`
--
ALTER TABLE `releif_request`
  MODIFY `request_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `releif_request`
--
ALTER TABLE `releif_request`
  ADD CONSTRAINT `releif_request_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
