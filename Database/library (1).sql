-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2024 at 01:38 PM
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
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `FullName` varchar(100) DEFAULT NULL,
  `AdminEmail` varchar(120) DEFAULT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `FullName`, `AdminEmail`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'Anuj Kumar', 'admin@gmail.com', 'admin', 'f925916e2754e5e03f75dd58a5733251', '2024-12-14 04:01:52');

-- --------------------------------------------------------

--
-- Table structure for table `tblauthors`
--

CREATE TABLE `tblauthors` (
  `id` int(11) NOT NULL,
  `AuthorName` varchar(159) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblauthors`
--

INSERT INTO `tblauthors` (`id`, `AuthorName`, `creationDate`, `UpdationDate`) VALUES
(17, 'Henry Manampiring', '2024-12-15 07:49:45', NULL),
(18, 'James Clear', '2024-12-15 07:58:58', NULL),
(19, 'Doni Darmawan', '2024-12-15 08:01:18', NULL),
(20, 'Ali Zaenal', '2024-12-15 08:04:43', NULL),
(21, 'Jerome Polin Sijabat', '2024-12-15 08:15:11', NULL),
(22, 'Author 0', '2024-12-17 06:17:09', '2024-12-16 23:17:29'),
(23, 'J.K Rowling', '2024-12-17 07:40:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblbooks`
--

CREATE TABLE `tblbooks` (
  `id` int(11) NOT NULL,
  `BookName` varchar(255) DEFAULT NULL,
  `CatId` int(11) DEFAULT NULL,
  `AuthorId` int(11) DEFAULT NULL,
  `ISBNNumber` varchar(25) DEFAULT NULL,
  `BookPrice` decimal(10,3) DEFAULT NULL,
  `bookImage` varchar(250) NOT NULL,
  `isIssued` int(1) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblbooks`
--

INSERT INTO `tblbooks` (`id`, `BookName`, `CatId`, `AuthorId`, `ISBNNumber`, `BookPrice`, `bookImage`, `isIssued`, `RegDate`, `UpdationDate`) VALUES
(15, 'Filosofi Teras', 11, 17, '978-623-346-303-4', 1.000, '1734249200_27cbbcce00d6c11db2bd.jpg', NULL, '2024-12-15 07:53:20', NULL),
(16, 'Atomic Habits', 12, 18, '978-602-06-3318-3', 1.000, '1734249595_0fb7f1129ae56740c7cb.jpg', NULL, '2024-12-15 07:59:55', NULL),
(19, 'Buku Latihan Soal:Mantappu Jiwa', 13, 21, '9786020632414', 300.000, '1734250829_a374af88ce82d71fe1b3.jpg', 1, '2024-12-15 08:20:29', '2024-12-16 15:51:07'),
(21, 'DESAIN DAN PEMOGRAMAN WEBSITE', 14, 19, '978-979-692-179-9', 200.000, '1734364115_6ac9078675acffde6a30.jpg', NULL, '2024-12-16 15:48:35', NULL),
(22, 'Cepat dan Mudah Membuat Website Keren dengan WordPress 3.x', 14, 20, '978-979-794-270-0', 200.000, '1734364191_3c5ba96b7b82155c286d.jpg', 0, '2024-12-16 15:49:51', '2024-12-17 06:29:00'),
(23, 'Harry Potter', 21, 23, '123', 100.000, '1734421243_81e8032e9702816ea303.jpg', 0, '2024-12-17 07:40:43', '2024-12-17 07:42:08');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `id` int(11) NOT NULL,
  `CategoryName` varchar(150) DEFAULT NULL,
  `Status` int(1) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`id`, `CategoryName`, `Status`, `CreationDate`, `UpdationDate`) VALUES
(11, 'Filsafat Modern', 1, '2024-12-15 07:52:01', '2024-12-15 08:54:44'),
(12, 'Kepribadian', 1, '2024-12-15 07:58:12', '0000-00-00 00:00:00'),
(13, 'Fiksi Indonesia', 1, '2024-12-15 08:19:16', '0000-00-00 00:00:00'),
(14, 'Programming', 1, '2024-12-15 08:52:41', '0000-00-00 00:00:00'),
(15, 'Romantic', 1, '2024-12-15 08:52:54', '0000-00-00 00:00:00'),
(16, 'Technology', 1, '2024-12-15 08:53:11', '0000-00-00 00:00:00'),
(17, 'Sains', 1, '2024-12-15 08:53:22', '0000-00-00 00:00:00'),
(18, 'Manajemen', 1, '2024-12-15 08:53:36', '0000-00-00 00:00:00'),
(19, 'General', 1, '2024-12-15 08:54:17', '0000-00-00 00:00:00'),
(20, 'coba 1', 1, '2024-12-17 06:16:08', '0000-00-00 00:00:00'),
(21, 'sihir', 1, '2024-12-17 07:39:32', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblissuedbookdetails`
--

CREATE TABLE `tblissuedbookdetails` (
  `id` int(11) NOT NULL,
  `BookId` int(11) DEFAULT NULL,
  `StudentID` varchar(150) DEFAULT NULL,
  `IssuesDate` timestamp NULL DEFAULT current_timestamp(),
  `ReturnDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `RetrunStatus` int(1) DEFAULT NULL,
  `fine` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblissuedbookdetails`
--

INSERT INTO `tblissuedbookdetails` (`id`, `BookId`, `StudentID`, `IssuesDate`, `ReturnDate`, `RetrunStatus`, `fine`) VALUES
(7, 5, 'SID011', '2022-01-22 05:45:57', '2024-12-14 02:13:40', 1, 0),
(8, 1, 'SID002', '2022-01-22 05:59:17', '2022-01-22 06:18:08', 1, 0),
(9, 10, 'SID009', '2022-01-22 07:38:09', '2022-01-22 07:38:54', 1, 0),
(10, 11, 'SID009', '2022-01-22 08:15:02', '2022-01-22 08:15:23', 1, 0),
(11, 1, 'SID012', '2022-01-22 08:17:15', '2024-12-15 07:33:53', 1, 0),
(12, 10, 'SID012', '2022-01-22 08:18:08', '2022-01-22 08:18:22', 1, 5),
(13, 3, 'SID002', '2024-12-13 16:39:06', '2024-12-13 16:39:34', 1, 0),
(14, 3, 'SID002', '2024-12-13 16:40:02', '2024-12-13 16:40:35', 1, 0),
(16, 3, 'SID002', '2024-12-14 01:36:18', '2024-12-15 07:33:39', 1, 0),
(17, 19, '5', '2024-12-15 08:21:24', '2024-12-16 15:38:46', 1, 0),
(18, 18, '7', '2024-12-15 08:24:09', '2024-12-16 15:38:38', 1, 0),
(19, 19, '6', '2024-12-16 15:51:07', NULL, NULL, NULL),
(20, 22, '11', '2024-12-17 06:28:14', '2024-12-17 06:29:00', 1, 5000),
(21, 23, '11', '2024-12-17 07:41:45', '2024-12-17 07:42:08', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblstudents`
--

CREATE TABLE `tblstudents` (
  `id` int(11) NOT NULL,
  `StudentId` varchar(100) DEFAULT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `EmailId` varchar(120) DEFAULT NULL,
  `MobileNumber` char(20) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `Status` int(1) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblstudents`
--

INSERT INTO `tblstudents` (`id`, `StudentId`, `FullName`, `EmailId`, `MobileNumber`, `Password`, `Status`, `RegDate`, `UpdationDate`) VALUES
(12, '5', 'Adnri Joshua Damian', 'Andrijoshuadamian98@gmai.com', '0853 5627 7546', 'e10adc3949ba59abbe56e057f20f883e', 1, '2024-12-15 07:18:23', '2024-12-17 06:22:54'),
(13, '6', 'Andri Joshua ', 'andri@gmail.com', '0811 1112 2244', 'd9f6e636e369552839e7bb8057aeb8da', 1, '2024-12-15 07:44:03', '2024-12-16 08:54:55'),
(14, '7', 'Rido', 'rido@gmail.com', '0811 2222 3333', 'e10adc3949ba59abbe56e057f20f883e', 1, '2024-12-15 07:44:53', NULL),
(15, '8', 'Firdan Wahyu', 'Firdan@gmail.com', '0812 1212 2323', 'e10adc3949ba59abbe56e057f20f883e', 1, '2024-12-15 07:45:17', '2024-12-16 15:54:13'),
(16, '9', 'Julian', 'mammon@gmail.com', '0819 1919 2020', 'e10adc3949ba59abbe56e057f20f883e', 1, '2024-12-15 07:45:58', NULL),
(17, '10', 'Iqbal', 'Julian@gmail.com', '0888 9123 2421', 'e10adc3949ba59abbe56e057f20f883e', 1, '2024-12-15 07:46:19', NULL),
(18, '11', 'Test  Register12', 'test@gmail.com', '0812 2323 9911', 'e10adc3949ba59abbe56e057f20f883e', 1, '2024-12-17 06:25:46', '2024-12-17 07:43:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblauthors`
--
ALTER TABLE `tblauthors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbooks`
--
ALTER TABLE `tblbooks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblissuedbookdetails`
--
ALTER TABLE `tblissuedbookdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblstudents`
--
ALTER TABLE `tblstudents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `StudentId` (`StudentId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblauthors`
--
ALTER TABLE `tblauthors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tblbooks`
--
ALTER TABLE `tblbooks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tblissuedbookdetails`
--
ALTER TABLE `tblissuedbookdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tblstudents`
--
ALTER TABLE `tblstudents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
