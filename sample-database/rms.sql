```-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2019 at 03:09 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rms`
--

-- --------------------------------------------------------

--
-- Table structure for table `buyer_details`
--

CREATE TABLE `buyer_details` (
  `id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL DEFAULT '0',
  `buyer_name` varchar(255) NOT NULL DEFAULT '0',
  `address` varchar(255) NOT NULL DEFAULT '0',
  `goods` varchar(255) NOT NULL DEFAULT '0',
  `measure` varchar(255) NOT NULL DEFAULT '0',
  `fees` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buyer_details`
--

INSERT INTO `buyer_details` (`id`, `date`, `buyer_name`, `address`, `goods`, `measure`, `fees`) VALUES
(1, '28-Oct-2019, 07:46:18 am', 'Rafsun Jany Arman', 'Karany Para, House No: 05, Road No: 01', 'Apple, Orange', '2', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `employee_name` varchar(255) NOT NULL DEFAULT '0',
  `post_title` varchar(255) NOT NULL DEFAULT '0',
  `working_type` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `employee_name`, `post_title`, `working_type`) VALUES
(1, 'Rafsun Jany Arman', 'Owner', 'Daily');

-- --------------------------------------------------------

--
-- Table structure for table `employee_details`
--

CREATE TABLE `employee_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `employee_name_daily` varchar(255) NOT NULL DEFAULT '0',
  `post_title_daily` varchar(255) NOT NULL DEFAULT '0',
  `working_type_daily` varchar(255) NOT NULL DEFAULT '0',
  `salary` int(11) NOT NULL DEFAULT 0,
  `time_from` varchar(255) NOT NULL DEFAULT '0',
  `time_to` varchar(255) NOT NULL DEFAULT '0',
  `total_day` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `food_item`
--

CREATE TABLE `food_item` (
  `id` int(11) NOT NULL,
  `set_menu_1` int(11) NOT NULL DEFAULT 0,
  `set_menu_2` int(11) NOT NULL DEFAULT 0,
  `set_menu_3` int(11) NOT NULL DEFAULT 0,
  `set_menu_4` int(11) NOT NULL DEFAULT 0,
  `chicken_burger` int(11) NOT NULL DEFAULT 0,
  `beef_burger` int(11) NOT NULL DEFAULT 0,
  `club_sandwitch` int(11) NOT NULL DEFAULT 0,
  `sub_sandwitch` int(11) NOT NULL DEFAULT 0,
  `cocacola` int(11) NOT NULL DEFAULT 0,
  `sprite` int(11) NOT NULL DEFAULT 0,
  `pepsi` int(11) NOT NULL DEFAULT 0,
  `fanta` int(11) NOT NULL DEFAULT 0,
  `total_sell` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food_item`
--

INSERT INTO `food_item` (`id`, `set_menu_1`, `set_menu_2`, `set_menu_3`, `set_menu_4`, `chicken_burger`, `beef_burger`, `club_sandwitch`, `sub_sandwitch`, `cocacola`, `sprite`, `pepsi`, `fanta`, `total_sell`) VALUES
(1, 2, 0, 0, 0, 222, 0, 0, 0, 0, 0, 222, 0, 6488),
(2, 0, 1212, 0, 0, 0, 1212, 0, 0, 0, 12, 343, 0, 110524),
(3, 0, 0, 0, 23, 0, 23, 0, 0, 0, 0, 0, 0, 2760);

-- --------------------------------------------------------

--
-- Table structure for table `paid_buyer`
--

CREATE TABLE `paid_buyer` (
  `id` int(11) NOT NULL,
  `buyer_name` varchar(255) NOT NULL DEFAULT '0',
  `fees` int(11) NOT NULL DEFAULT 0,
  `paid_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `paid_salary`
--

CREATE TABLE `paid_salary` (
  `id` int(11) NOT NULL,
  `employee_name_daily` varchar(255) NOT NULL DEFAULT '0',
  `salary` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paid_salary`
--

INSERT INTO `paid_salary` (`id`, `employee_name_daily`, `salary`) VALUES
(1, 'Rafsun Jany Arman', 100000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buyer_details`
--
ALTER TABLE `buyer_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_details`
--
ALTER TABLE `employee_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_item`
--
ALTER TABLE `food_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paid_buyer`
--
ALTER TABLE `paid_buyer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paid_salary`
--
ALTER TABLE `paid_salary`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buyer_details`
--
ALTER TABLE `buyer_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee_details`
--
ALTER TABLE `employee_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `food_item`
--
ALTER TABLE `food_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `paid_buyer`
--
ALTER TABLE `paid_buyer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paid_salary`
--
ALTER TABLE `paid_salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
```
