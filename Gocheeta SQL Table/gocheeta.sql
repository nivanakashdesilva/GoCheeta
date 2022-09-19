-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2022 at 05:23 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gocheeta`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `email`, `password`, `level`) VALUES
(2, 'akash', 'akash@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1);

-- --------------------------------------------------------

--
-- Table structure for table `booking_log`
--

CREATE TABLE `booking_log` (
  `id` int(11) NOT NULL,
  `client_list_id` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `vehical_detail_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `reference_code` text NOT NULL,
  `pickup_zone` text NOT NULL,
  `drop_zone` text NOT NULL,
  `status` int(11) NOT NULL,
  `last_updated` datetime NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` int(11) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `location`) VALUES
(1, 'Galle'),
(2, 'Kandy'),
(3, 'Nugegoda'),
(4, 'Gampaha'),
(5, 'Kurunegala'),
(6, 'Jaffna');

-- --------------------------------------------------------

--
-- Table structure for table `client_list`
--

CREATE TABLE `client_list` (
  `id` int(11) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `nic` text NOT NULL,
  `address` text NOT NULL,
  `location` text NOT NULL,
  `mobile_number` tinyint(12) NOT NULL,
  `email_address` text NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `last_login` datetime NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client_list`
--

INSERT INTO `client_list` (`id`, `firstname`, `lastname`, `nic`, `address`, `location`, `mobile_number`, `email_address`, `date_of_birth`, `gender`, `username`, `password`, `last_login`, `date_added`) VALUES
(1, 'Nivan', 'De Silva', 'sassas', '', '4', 0, 'nivanakashdesilva@gmail.com', '0000-00-00', '1', 'akash', '12345', '0000-00-00 00:00:00', '2022-09-18 14:32:23'),
(2, 'Nivan', 'De Silva', '990913340V', '', '6', 0, 'nivanakashdesilva@gmail.com', '0000-00-00', '1', 'akash', '12345', '0000-00-00 00:00:00', '2022-09-18 14:33:32'),
(3, 'Akash', 'De Silva', 'sassas', '582/D Paranakanda Road', '6', 127, 'info@Wiloko.com', '0000-00-00', '1', 'akash', '12345', '0000-00-00 00:00:00', '2022-09-18 14:36:24'),
(4, 'akash', 'De Silva', 'sassas', '75, Hemas House,  Braybrooke Place,', '4', 127, 'nivanakash@hotmail.com', '2022-09-08', '2', 'akash', '12345', '0000-00-00 00:00:00', '2022-09-18 14:37:57');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `id` int(11) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `nic` text NOT NULL,
  `driver_license` text NOT NULL,
  `mobile_number` tinyint(12) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` text NOT NULL,
  `vehical_category_id` int(11) NOT NULL,
  `vehical_detail_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`id`, `firstname`, `lastname`, `nic`, `driver_license`, `mobile_number`, `username`, `password`, `avatar`, `vehical_category_id`, `vehical_detail_id`, `branch_id`, `status`, `date_added`) VALUES
(1, 'Nivan', 'De Silva', '990913340V', 'ssssddd', 127, 'akash', '12345', 'IMG-63269b5e323412.18886868.png', 1, 2, 3, 4, '2022-09-18 09:45:26');

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `id` int(11) NOT NULL,
  `gender` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`id`, `gender`) VALUES
(1, 'Male'),
(2, 'Female'),
(3, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `vehical_category`
--

CREATE TABLE `vehical_category` (
  `id` int(11) NOT NULL,
  `category` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehical_category`
--

INSERT INTO `vehical_category` (`id`, `category`) VALUES
(1, '3 seater'),
(2, '2 seater');

-- --------------------------------------------------------

--
-- Table structure for table `vehical_detail`
--

CREATE TABLE `vehical_detail` (
  `id` int(11) NOT NULL,
  `vehical_make` text NOT NULL,
  `vehical_model` text NOT NULL,
  `vehical_year` varchar(4) NOT NULL,
  `vehical_number` varchar(10) NOT NULL,
  `number_of_seats` int(11) NOT NULL,
  `vehical_category_id` int(11) NOT NULL,
  `vehical_chasie_number` varchar(45) NOT NULL,
  `vehical_insurance_provider` varchar(25) NOT NULL,
  `vehical_insurance_policy_number` varchar(45) NOT NULL,
  `vehical_front_image` text NOT NULL,
  `vehical_leftside_image` text NOT NULL,
  `vehical_rightside_image` text NOT NULL,
  `vehical_rear_image` text NOT NULL,
  `vehical_color` varchar(255) NOT NULL,
  `vehical_added_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehical_detail`
--

INSERT INTO `vehical_detail` (`id`, `vehical_make`, `vehical_model`, `vehical_year`, `vehical_number`, `number_of_seats`, `vehical_category_id`, `vehical_chasie_number`, `vehical_insurance_provider`, `vehical_insurance_policy_number`, `vehical_front_image`, `vehical_leftside_image`, `vehical_rightside_image`, `vehical_rear_image`, `vehical_color`, `vehical_added_date`) VALUES
(1, 'red', 'v12', '2021', 'bhgh - 258', 8, 1, 'sjdbsudsubjbsudbusbudusbdubudb', 'allianz', '1245222asss185222ss', 'IMG-63269c785d5a70.44947477.png', 'IMG-63269c785d5b08.58445144.png', 'IMG-63269c785d5b19.77024169.png', 'IMG-63269c785d5b36.03775185.png', 'blue', '2022-09-18 09:50:08'),
(2, 'red', 'v12', '2022', 'bgh-9383', 8, 1, 'jkj', 'dd', '1245222asss185222ss', 'IMG-6326bd47bd4678.63505187.png', 'IMG-6326bd47bd4792.94606842.', 'IMG-6326bd47bd47c2.56942155.png', 'IMG-6326bd47bd4809.93617041.', 'blue', '2022-09-18 12:10:07'),
(3, 'bajaj', 'v12', '2021', 'bhgh - 258', 21, 0, 'jkj', 'allianz', '1245222asss185222ss', 'IMG-6326bdcaea44f5.89628000.png', 'IMG-6326bdcaea4698.05204269.png', 'IMG-6326bdcaea46b7.45987518.png', 'IMG-6326bdcaea46c7.08237699.png', 'blue', '2022-09-18 12:12:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_log`
--
ALTER TABLE `booking_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_list`
--
ALTER TABLE `client_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehical_category`
--
ALTER TABLE `vehical_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehical_detail`
--
ALTER TABLE `vehical_detail`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `booking_log`
--
ALTER TABLE `booking_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `client_list`
--
ALTER TABLE `client_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vehical_category`
--
ALTER TABLE `vehical_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vehical_detail`
--
ALTER TABLE `vehical_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
