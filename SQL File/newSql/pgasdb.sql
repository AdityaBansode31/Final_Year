-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2023 at 05:40 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pgasdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Admin', 'admin', 8989898989, 'admin@gmail.com', 'f925916e2754e5e03f75dd58a5733251', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblbookpg`
--

CREATE TABLE `tblbookpg` (
  `ID` int(10) NOT NULL,
  `Userid` int(10) DEFAULT NULL,
  `Pgid` int(10) DEFAULT NULL,
  `BookingNumber` int(10) NOT NULL,
  `CheckinDate` date DEFAULT NULL,
  `UserMsg` varchar(250) DEFAULT NULL,
  `BookingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `Remark` varchar(50) DEFAULT NULL,
  `Status` varchar(50) DEFAULT NULL,
  `RemDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblbookpg`
--

INSERT INTO `tblbookpg` (`ID`, `Userid`, `Pgid`, `BookingNumber`, `CheckinDate`, `UserMsg`, `BookingDate`, `Remark`, `Status`, `RemDate`) VALUES
(18, 1, 11, 276253459, '2019-05-22', 'I arrived on 22 may in morning 10 am', '2019-05-20 11:34:09', 'Your Booking has been confirmed.', 'Confirmed', '2019-06-15 13:39:01'),
(19, 2, 16, 966726570, '2019-05-21', 'Give your contact number', '2019-05-20 11:35:55', '', NULL, '2019-06-06 15:29:55'),
(20, 3, 14, 705533047, '2019-05-24', 'Hi, I will arrive on 24 may in eve', '2019-05-20 11:37:23', '', NULL, '2019-06-06 15:29:57'),
(21, 4, 16, 811839401, '2019-05-27', 'bkjhjhhiu', '2019-05-20 11:38:13', '', NULL, '2019-06-06 15:30:00'),
(22, 1, 11, 189316467, '2019-06-28', 'This is sample text fro testing.', '2019-06-06 16:45:47', 'All seat filled.', 'Cancelled', '2019-06-15 13:38:38'),
(24, 1, 13, 369910293, '2019-07-20', 'This is sample text for testing. testing Data', '2019-06-06 17:13:08', 'All Rooms were already full. ', 'Cancelled', '2019-06-15 13:39:45'),
(25, 5, 20, 496196975, '2019-06-30', 'This is sample text for testing.', '2019-06-18 18:21:17', 'Your Accomodation is confirmed', 'Confirmed', '2019-06-18 18:22:13'),
(26, 6, 11, 548034200, '2023-04-13', 'a', '2023-04-13 11:57:24', NULL, NULL, '0000-00-00 00:00:00'),
(27, 6, 20, 960350490, '2023-04-21', 's', '2023-04-13 11:59:35', '2', 'Confirmed', '2023-04-13 12:00:22'),
(28, 6, 21, 649291379, '2023-04-16', 'jig', '2023-04-16 11:51:39', NULL, NULL, '0000-00-00 00:00:00'),
(29, 6, 21, 810038354, '2023-04-16', 'g', '2023-04-16 12:06:32', NULL, NULL, '0000-00-00 00:00:00'),
(30, 6, 22, 627302841, '2023-04-19', 'q', '2023-04-19 06:52:31', 'a', 'Confirmed', '2023-04-19 06:52:58'),
(31, 6, 22, 854938218, '2023-04-19', 'a', '2023-04-19 07:30:07', 'qwer', 'Cancelled', '2023-04-30 17:37:17'),
(32, 6, 22, 112331566, '2023-04-30', 'Comming today', '2023-04-30 13:20:15', 'hurry', 'Confirmed', '2023-04-30 17:37:44'),
(33, 6, 22, 575251379, '2023-05-06', 'NA', '2023-05-06 07:27:45', NULL, NULL, '0000-00-00 00:00:00'),
(34, 6, 22, 113788204, '2023-05-13', 'Additional requests', '2023-05-13 16:36:53', NULL, NULL, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblcity`
--

CREATE TABLE `tblcity` (
  `ID` int(10) NOT NULL,
  `StateID` int(10) DEFAULT NULL,
  `City` varchar(120) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblcity`
--

INSERT INTO `tblcity` (`ID`, `StateID`, `City`, `CreationDate`) VALUES
(16, 12, 'Solapur', '2023-04-19 06:23:27');

-- --------------------------------------------------------

--
-- Table structure for table `tblowner`
--

CREATE TABLE `tblowner` (
  `ID` int(10) NOT NULL,
  `FullName` varchar(200) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblowner`
--

INSERT INTO `tblowner` (`ID`, `FullName`, `Email`, `MobileNumber`, `Password`, `RegDate`) VALUES
(1, 'Rahul Singh', 'guru@gmail.com', 9898989898, '202cb962ac59075b964b07152d234b70', '2019-05-07 11:06:51'),
(2, 'Khusbu', 'hj@gmail.com', 8989898988, '202cb962ac59075b964b07152d234b70', '2019-05-07 11:08:15'),
(3, 'Pg owner test', 'pgtest@gmail.com', 1234567890, 'f925916e2754e5e03f75dd58a5733251', '2019-06-18 18:16:54'),
(4, 'robo', 'bansodeaditya129@gmail.com', 7364821736, '0cc175b9c0f1b6a831c399e269772661', '2023-04-19 07:23:12');

-- --------------------------------------------------------

--
-- Table structure for table `tblpages`
--

CREATE TABLE `tblpages` (
  `ID` int(11) NOT NULL,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` mediumtext DEFAULT NULL,
  `PageDescription` mediumtext DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `Fulfillment` mediumtext NOT NULL,
  `FutureServices` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblpages`
--

INSERT INTO `tblpages` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `UpdationDate`, `Fulfillment`, `FutureServices`) VALUES
(1, 'aboutus', 'About Us', '                                <div style=\"text-align: left;\"><b>PG Accommodation&nbsp;System</b></div><div style=\"text-align: left;\"><br></div><div style=\"text-align: left;\">The aim of pg accommodation system to provide user friendly environment to pg seeker at affordable price. Test data</div>', '2019-06-18 18:15:38', 'The technological revolution in computers has enhanced our abilities to teach. MDS has remained on the cutting edge by instituting the use of computer simulators and remote Web-accessed study material. The company will continue to seek new ways to provide a better and more convenient teaching environment through technology. The virtual class room is a thing of the near future, and we are positioning ourselves to be among the first who will provide such services.', 'The company is in the process of launching a new division for the Seattle office that will encompass training classes for commercial drivers licenses and motorcycle licenses. These services will include comprehensive indoor training classes, job placement assistance for truck and bus drivers, and rented vehicles to practice with, and use for license testing. This program will be launched in 3rd quarter 2004. Depending on its success, management plans to incorporate this program into all the field offices by 3rd quarter 2005..'),
(2, 'contactus', 'Contact Us', '<b>PG Accomodation System</b><div><b>Contact Number:</b>+91-96784532145</div><div><b>email: </b>info@gmail.com</div><div><b>Address : </b>test address</div>', '2019-06-18 18:16:12', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblpg`
--

CREATE TABLE `tblpg` (
  `ID` int(10) NOT NULL,
  `OwnerID` int(20) NOT NULL,
  `StateName` varchar(200) DEFAULT NULL,
  `CityName` varchar(200) DEFAULT NULL,
  `PGTitle` varchar(200) DEFAULT NULL,
  `Type` varchar(120) DEFAULT NULL,
  `RPmonth` varchar(120) DEFAULT NULL,
  `norooms` varchar(45) DEFAULT NULL,
  `Address` varchar(120) DEFAULT NULL,
  `Image` varchar(200) DEFAULT NULL,
  `Electricity` varchar(40) DEFAULT NULL,
  `Parking` varchar(40) DEFAULT NULL,
  `Refregerator` varchar(40) DEFAULT NULL,
  `Furnished` varchar(40) DEFAULT NULL,
  `AC` varchar(40) DEFAULT NULL,
  `Balcony` varchar(40) DEFAULT NULL,
  `StudyTable` varchar(40) DEFAULT NULL,
  `Laundry` varchar(40) DEFAULT NULL,
  `Security` varchar(40) DEFAULT NULL,
  `MealsBreakfast` varchar(45) DEFAULT NULL,
  `MealLunch` varchar(45) NOT NULL,
  `MealDinner` varchar(45) NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `IsActive` int(1) DEFAULT NULL,
  `LastUpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblpg`
--

INSERT INTO `tblpg` (`ID`, `OwnerID`, `StateName`, `CityName`, `PGTitle`, `Type`, `RPmonth`, `norooms`, `Address`, `Image`, `Electricity`, `Parking`, `Refregerator`, `Furnished`, `AC`, `Balcony`, `StudyTable`, `Laundry`, `Security`, `MealsBreakfast`, `MealLunch`, `MealDinner`, `RegDate`, `IsActive`, `LastUpdationDate`) VALUES
(22, 3, 'Maharashtra', 'Solapur', 'abc', 'Both', '3000', '5', 'asdfghj qwer', '88b757133689ac02b9bafb12e73a7497.jpg', 'Yes', 'Yes', '', '', '', '', 'Yes', '', 'Yes', 'Yes', 'Yes', 'Yes', '2023-04-19 06:26:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblpgfacilities`
--

CREATE TABLE `tblpgfacilities` (
  `id` int(11) NOT NULL,
  `pg_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblpgfacilities`
--

INSERT INTO `tblpgfacilities` (`id`, `pg_id`, `name`, `price`, `status`) VALUES
(1, 2, 'AC', 700, 1),
(2, 21, 'Laundry', 12312, 1),
(3, 21, 'Mess', 100, 1),
(4, 22, 'Laundry', 300, 1),
(5, 22, 'Mess', 500, 1),
(6, 22, 'Maid', 800, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblstate`
--

CREATE TABLE `tblstate` (
  `ID` int(10) NOT NULL,
  `StateName` varchar(120) DEFAULT NULL,
  `RegState` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblstate`
--

INSERT INTO `tblstate` (`ID`, `StateName`, `RegState`) VALUES
(12, 'Maharashtra', '2023-04-19 06:23:05');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `ID` int(10) NOT NULL,
  `FullName` varchar(200) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `FatherName` varchar(120) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `ComAddress` varchar(250) DEFAULT NULL,
  `EmergencyNumber` bigint(10) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `LastUpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`ID`, `FullName`, `Email`, `MobileNumber`, `FatherName`, `dob`, `ComAddress`, `EmergencyNumber`, `Password`, `RegDate`, `LastUpdationDate`) VALUES
(1, 'Shantanu Bhardwaj', 'abc@gmail.com', 1111111111, '', '0000-00-00', '', 0, '202cb962ac59075b964b07152d234b70', '2019-05-10 04:08:17', '2019-06-06 17:22:19'),
(2, 'Khusbu', 'abc@gmail.com', 779797977, '', '0000-00-00', '', 0, '202cb962ac59075b964b07152d234b70', '2019-05-10 04:29:46', NULL),
(3, 'Sunita Verma', 'verma@gmail.com', 8797979798, 'Mr. R.K Sharma', '1989-05-26', 'W-365, Merrut', 8989898989, '81dc9bdb52d04dc20036dbd8313ed055', '2019-05-10 04:32:39', '2019-06-07 05:58:51'),
(4, 'Raj', 've@gmail.com', 7977979797, 'Mr.Vivek', '2005-03-21', 'Chandra Vihar H.no:367 Gore gao Mumbai', 8797987979, '202cb962ac59075b964b07152d234b70', '2019-05-10 04:33:17', '2019-06-07 06:03:27'),
(5, 'test user', 'testuser@gmail.com', 1234567890, 'Test', '2018-05-02', 'New Delhi', 1234567890, 'f925916e2754e5e03f75dd58a5733251', '2019-06-18 18:19:51', '2019-06-18 18:20:42'),
(6, 'Aditya Bansode', 'kitoso5960@raotus.com', 7583837565, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', '2023-04-13 11:56:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbluserfacilities`
--

CREATE TABLE `tbluserfacilities` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbluserfacilities`
--

INSERT INTO `tbluserfacilities` (`id`, `user_id`, `book_id`, `name`, `price`) VALUES
(6, 6, 29, 'Laundry', 12312),
(7, 6, 30, 'Laundry', 300),
(8, 6, 30, 'Maid', 800),
(9, 6, 31, 'Laundry', 300),
(10, 6, 31, 'Mess', 500),
(11, 6, 32, 'Laundry', 300),
(12, 6, 32, 'Mess', 500),
(13, 6, 32, 'Maid', 800),
(14, 6, 33, 'Laundry', 300),
(15, 6, 33, 'Mess', 500),
(16, 6, 33, 'Maid', 800),
(17, 6, 34, 'Laundry', 300),
(18, 6, 34, 'Mess', 500);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblbookpg`
--
ALTER TABLE `tblbookpg`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcity`
--
ALTER TABLE `tblcity`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblowner`
--
ALTER TABLE `tblowner`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpages`
--
ALTER TABLE `tblpages`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpg`
--
ALTER TABLE `tblpg`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpgfacilities`
--
ALTER TABLE `tblpgfacilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblstate`
--
ALTER TABLE `tblstate`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbluserfacilities`
--
ALTER TABLE `tbluserfacilities`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblbookpg`
--
ALTER TABLE `tblbookpg`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tblcity`
--
ALTER TABLE `tblcity`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tblowner`
--
ALTER TABLE `tblowner`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblpages`
--
ALTER TABLE `tblpages`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblpg`
--
ALTER TABLE `tblpg`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tblpgfacilities`
--
ALTER TABLE `tblpgfacilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblstate`
--
ALTER TABLE `tblstate`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbluserfacilities`
--
ALTER TABLE `tbluserfacilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
