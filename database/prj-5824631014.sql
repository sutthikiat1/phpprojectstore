-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2017 at 06:18 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prj-5824631014`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dep_id` int(5) NOT NULL,
  `dep_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dep_id`, `dep_name`) VALUES
(1, 'Directors'),
(2, 'Personal Manager'),
(3, 'Finance Manager'),
(4, 'Civil Engineer'),
(5, 'Structural Engineer'),
(6, 'Sales Director'),
(8, 'Information technology'),
(11, 'Store Manager'),
(14, 'Accounting'),
(16, 'Customer Service'),
(17, 'Technician'),
(18, 'Human Resources (General)'),
(19, 'Staff/Pay Management');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emy_id` int(11) NOT NULL,
  `emy_fname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `emy_lname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `emy_dep_id` int(5) NOT NULL,
  `emy_pos` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `emy_salary` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emy_id`, `emy_fname`, `emy_lname`, `emy_dep_id`, `emy_pos`, `emy_salary`) VALUES
(1, 'Kevin', 'Lahm', 8, 'Developer', 70000),
(2, 'Dev', 'Diva', 8, 'Engineer Sorfware', 50000),
(3, 'John', 'Carter', 0, ' Secretary', 25000),
(4, 'John', 'Carter', 3, 'Finace', 28000),
(8, 'Frenaddo', 'Torres', 6, 'Manager Sale', 40000);

-- --------------------------------------------------------

--
-- Stand-in structure for view `employee_detail`
-- (See below for the actual view)
--
CREATE TABLE `employee_detail` (
`emy_id` int(11)
,`emy_fname` varchar(20)
,`emy_lname` varchar(20)
,`dep_name` varchar(25)
,`emy_pos` varchar(20)
,`emy_salary` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prd_id` int(2) NOT NULL,
  `prd_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `prd_price` int(10) NOT NULL,
  `prd_pdt_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prd_id`, `prd_name`, `prd_price`, `prd_pdt_id`) VALUES
(29, 'CPU I7-7700K', 11800, 1),
(30, 'CPU I5-7300k', 5930, 1),
(31, 'CPU I3-7100K', 5300, 1),
(32, 'VGA GTX-1080TI', 30000, 2),
(33, 'VGA GTX-1070', 16900, 2),
(34, 'VGA GTX-1060', 7990, 2),
(35, 'DDR3/1600 corsair ve', 2550, 3),
(67, 'DDR4/3000 corsair ve', 7790, 3);

-- --------------------------------------------------------

--
-- Stand-in structure for view `product_detail`
-- (See below for the actual view)
--
CREATE TABLE `product_detail` (
`prd_id` int(2)
,`prd_name` varchar(20)
,`prd_price` int(10)
,`prd_pdt_id` int(5)
,`pdt_name` varchar(20)
);

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `pdt_id` int(5) NOT NULL,
  `pdt_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`pdt_id`, `pdt_name`) VALUES
(1, 'CPU'),
(2, 'Graphic Card'),
(3, 'Ram');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(5) NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `user_fname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `user_lname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `user_tel` int(15) NOT NULL,
  `user_email` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `user_fname`, `user_lname`, `user_tel`, `user_email`) VALUES
(3, 'boss', 'za', 'Sutthikiat', 'Phongsakornmetha', 885251714, 'boss@gmail.com'),
(10, 'admin', 'admin', 'admin', 'admin', 555, 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Structure for view `employee_detail`
--
DROP TABLE IF EXISTS `employee_detail`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `employee_detail`  AS  select `employee`.`emy_id` AS `emy_id`,`employee`.`emy_fname` AS `emy_fname`,`employee`.`emy_lname` AS `emy_lname`,`department`.`dep_name` AS `dep_name`,`employee`.`emy_pos` AS `emy_pos`,`employee`.`emy_salary` AS `emy_salary` from (`employee` join `department` on((`employee`.`emy_dep_id` = `department`.`dep_id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `product_detail`
--
DROP TABLE IF EXISTS `product_detail`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `product_detail`  AS  select `product`.`prd_id` AS `prd_id`,`product`.`prd_name` AS `prd_name`,`product`.`prd_price` AS `prd_price`,`product`.`prd_pdt_id` AS `prd_pdt_id`,`product_type`.`pdt_name` AS `pdt_name` from (`product` join `product_type` on((`product`.`prd_pdt_id` = `product_type`.`pdt_id`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dep_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emy_id`),
  ADD KEY `emy_dep_id` (`emy_dep_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prd_id`),
  ADD KEY `prd_pdt_id` (`prd_pdt_id`);

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`pdt_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dep_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prd_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `pdt_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
