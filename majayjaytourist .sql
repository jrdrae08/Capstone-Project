-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2024 at 09:51 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `majayjaytourist`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `AccountID` int(11) NOT NULL,
  `ApplicationID` int(11) DEFAULT NULL,
  `Email` varchar(100) NOT NULL,
  `PasswordHash` varchar(255) NOT NULL,
  `FirstLoginRequired` tinyint(1) DEFAULT 1,
  `LastLogin` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` varchar(50) NOT NULL DEFAULT 'subadmin',
  `BusinessStatus` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `BusinessArchive` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`AccountID`, `ApplicationID`, `Email`, `PasswordHash`, `FirstLoginRequired`, `LastLogin`, `CreatedAt`, `role`, `BusinessStatus`, `BusinessArchive`) VALUES
(1, 1, 'klnse73i@duckmail.club', '$2y$10$dezT5HMUkOSrJbCkrUIK5.NCjsSkR0qhMK2srWFc0KGXLrhNqVLKa', 0, '2024-08-02 04:53:16', '2024-07-22 11:43:31', 'subadmin', 'Active', 0),
(2, 2, 't2vb6beq@duckmail.club', '$2y$10$hgZY7h8i1A0fpyEs1AJcGe422/03H06Zb7ixk.7VQJx3/r6rFNROe', 0, '2024-07-29 08:11:01', '2024-07-23 14:12:35', 'subadmin', 'Active', 0),
(3, 3, 'fbufef5p@duckmail.club', '$2y$10$LqSVZaKXXeCmep.lZ63Vkeng24o24KcBodcxg35YBLFqmf0XZY6S2', 1, '2024-07-27 02:51:48', '2024-07-27 02:19:20', 'subadmin', 'Active', 0),
(4, 4, 'xgzs16jk@duckmail.club', '$2y$10$GPNoQQEcd1hqcjccjUOz4O4mg6J7Xo6AYiaB/gO98MrczfnGzHoZS', 1, '2024-07-27 06:45:08', '2024-07-27 03:05:07', 'subadmin', 'Active', 0),
(5, 6, 'kasdhgkashd79@gmail.com', '$2y$10$GYaf1iO8RL3Y2Y7FANJq/uPq3qvWzReypmw2ZNm54UQFOg8LcPszi', 1, '2024-07-27 05:21:44', '2024-07-27 05:21:44', 'subadmin', 'Active', 0),
(6, 7, 'jlhsakjhd876@gmail.com', '$2y$10$WnP1ldBtUR/F7AjB11T56ecDY1cxgjeNQabHzuRHFCePcboaWaEYa', 1, '2024-07-27 07:21:19', '2024-07-27 07:21:19', 'subadmin', 'Active', 0),
(7, 8, '4qype90s@duckmail.club', '$2y$10$ao2N3ntMcWsGwsAPjQdZaut7aoa18Pw54RMtcj5cvTY5Ds2aascVG', 0, '2024-07-29 06:18:49', '2024-07-27 07:25:11', 'subadmin', 'Active', 0),
(8, 9, 'ti98z1ro@duckmail.club', '$2y$10$BnSMLBmfPchLQTgsWykDQ.f4U1FPGGNm.sS3yuKRgBJ7dUNHBxmue', 0, '2024-07-27 07:58:47', '2024-07-27 07:52:40', 'subadmin', 'Active', 0),
(9, 11, 'mubjlwjr@duckmail.club', '$2y$10$0nRsvvjBEuq.zXL8f.BYOuKdzKCqcGz6RYBWjia6SJQcn71W0d8ue', 1, '2024-07-29 08:25:35', '2024-07-29 08:25:35', 'subadmin', 'Active', 0),
(10, 12, '6uu8zsnv@duckmail.club', '$2y$10$arR1UFrcabSY7LCJd2QqiuSx4v3rR0vLH3HwW/rCgUrTvGEq.GAEu', 0, '2024-07-29 13:55:33', '2024-07-29 13:54:56', 'subadmin', 'Active', 0),
(11, 13, 'daoug5t5@duckmail.club', '$2y$10$x8cyUuznrFd8m6e.inj9Vuo5xonlw1MGdMedYPgXKqf9Xc2YdIVWK', 1, '2024-07-29 14:41:28', '2024-07-29 14:41:28', 'subadmin', 'Active', 0),
(12, 14, 'juandelacruz87@shurua.xyz', '$2y$10$ljUFBgxK8y/oG3kq48Mo6erQNTKLk3srBhWjnY7TLFttRHZEQib2O', 0, '2024-08-03 12:23:32', '2024-08-03 12:18:36', 'subadmin', 'Active', 0),
(13, 15, '0w02tn82@duckmail.club', '$2y$10$PEjjS4Ckp5/EceMNhTuf7.VTYovZIXFDUFutxNQIGOgFKPdWuqY/6', 0, '2024-08-05 05:59:54', '2024-08-05 05:55:52', 'subadmin', 'Active', 0),
(14, 20, 'ar6wbxbi@duckmail.club', '$2y$10$BieMQp8Xq4Hcvh8oMiiDx.6CLXcxPYx2LuNRhb7j6xQrtxggH6q.K', 0, '2024-08-07 03:04:43', '2024-08-07 03:03:29', 'subadmin', 'Active', 0),
(15, 22, '5s4vns1b@duckmail.club', '$2y$10$ljNs15SgtOou2sxwlfifn.1kaKa4uvQhnnjH.Wg6wdeRxFtPz4jcW', 1, '2024-08-07 06:56:23', '2024-08-07 06:56:23', 'subadmin', 'Active', 0),
(16, 19, 'kshadkhsj@gmail.com', '$2y$10$rsJZgR4ixjVHC0gQdzTQX.MZhlka2GhcEQeRsxzMkuWsQl3n/iA4K', 1, '2024-08-07 06:58:37', '2024-08-07 06:58:37', 'subadmin', 'Active', 0),
(17, 24, 'm61onixw@duckmail.club', '$2y$10$J.U/uPRN7IoYLysGC11g8exbT57OUgHDjkZ5jbmkrY6/GlaoYr76W', 0, '2024-08-07 07:01:05', '2024-08-07 07:00:34', 'subadmin', 'Active', 0),
(18, 25, 'dde30lbr@duckmail.club', '$2y$10$EZPqNcGdJVLa1EICpLSOR.8rjXY.V37cyHnlut0DbckIrEXxgzzRy', 0, '2024-08-07 08:05:08', '2024-08-07 08:04:39', 'subadmin', 'Active', 0),
(19, 18, 'hjsagdhjasgd@gmail.com', '$2y$10$O4HIF0pk.orAGS5bm3cy5.i2sxt/9b/J1PAHsNhObbGukNHNbL4B2', 1, '2024-08-19 04:20:22', '2024-08-19 04:20:22', 'subadmin', 'Active', 0),
(20, 26, 'g20b01bg@duckmail.club', '$2y$10$KVGcGuGQnwTPtHxQmNEvM.q.uiOYVN/XXDg0A5K4mBJ5ggFuadHIe', 0, '2024-08-19 04:22:23', '2024-08-19 04:21:39', 'subadmin', 'Active', 0),
(21, 27, 'dyjel6kw@duckmail.club', '$2y$10$Ky/kQUcnTuNuxQCqL2kWCuW3pVwMD2GLpMp.PIBrV7Ib.kEwhzcPG', 0, '2024-08-19 04:27:14', '2024-08-19 04:24:48', 'subadmin', 'Active', 0),
(23, 28, '7fbnddgp@duckmail.club', '$2y$10$nZEFUk1UVXbvq1bAGOdtJepLCQthRDdVonltaAr40BKTcDh8iTLnG', 0, '2024-08-22 07:24:02', '2024-08-22 07:23:18', 'subadmin', 'Active', 0);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `passcode` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `username`, `passcode`, `role`) VALUES
(1, 'majayjaytourist4005@gmail.com', 'majayjayadmin', '$2y$10$EjICfiBXe4iXPjd85sBpVesNSGRfUxcVHhufh4f9J05TZIIpsdVAq', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `businessapplicationform`
--

CREATE TABLE `businessapplicationform` (
  `ApplicationID` int(11) NOT NULL,
  `RegistrantFirstName` varchar(100) NOT NULL,
  `RegistrantMiddleName` varchar(100) DEFAULT NULL,
  `RegistrantLastName` varchar(100) NOT NULL,
  `ContactNumber` varchar(15) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `Status` enum('Pending','Approved','Rejected') DEFAULT 'Pending',
  `BusinessPermitImage` varchar(255) DEFAULT NULL,
  `PermitExpDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `businessapplicationform`
--

INSERT INTO `businessapplicationform` (`ApplicationID`, `RegistrantFirstName`, `RegistrantMiddleName`, `RegistrantLastName`, `ContactNumber`, `Email`, `CreatedAt`, `Status`, `BusinessPermitImage`, `PermitExpDate`) VALUES
(1, 'Eugenio ', '', 'Schneider', '+638374782364', 'EugenioSchneider@gmail.com', '2024-07-22 11:43:10', 'Approved', '669e45ce35299-6694c09ec5832-PLSP logo.png', NULL),
(2, 'Sherwin', '', 'Quizon', '+639323908490', 't2vb6beq@duckmail.club', '2024-07-23 14:07:47', 'Approved', '669fb933be6ab-CCST Lecturer Hiring.png', NULL),
(3, 'Sigmud ', '', 'Fraud', '+632398472389', 'sigmudfraud98@gmail.com', '2024-07-27 02:16:23', 'Approved', '66a458779d3a6-CCST Lecturer Hiring.png', NULL),
(4, 'sdfcsdfds', '', 'fsdfsdf', '+633432423984', 'xgzs16jk@duckmail.club', '2024-07-27 02:53:34', 'Approved', '66a4612e6f625-sigg.jpeg', NULL),
(6, 'JOanna ', '', 'Wiiger', '+637238947239', 'joaanawigue9876@shurua.xyz', '2024-07-27 05:21:10', 'Approved', '66a483c639d46-CCST_Council_Logo (1).png', NULL),
(7, 'Jack', '', 'Dakwson', '+639823745982', 'ifi1fg9l@duckmail.club', '2024-07-27 07:20:33', 'Approved', '66a49fc19765e-CCST Lecturer Hiring.png', NULL),
(8, 'Kayla', '', 'Manalo', '+639384792387', '4qype90s@duckmail.club', '2024-07-27 07:24:49', 'Approved', '66a4a0c1564c6-CCST Lecturer Hiring.png', NULL),
(9, 'Jeremy', '', 'Cabrera', '+632346789237', 'ti98z1ro@duckmail.club', '2024-07-27 07:51:43', 'Approved', '66a4a70fab8f4-CCST_Council_Logo (1).png', NULL),
(10, 'Koligarko', '', 'Silog', '+638328947239', 'qezblk62@duckmail.club', '2024-07-29 07:51:37', 'Rejected', '66a74a09bd693-web4.png', NULL),
(11, 'Kujag', '', 'askdhj', '+639823748923', 'mubjlwjr@duckmail.club', '2024-07-29 07:58:47', 'Approved', '66a74bb77848e-496px-San_Pablo_City_Laguna_seal.svg.png', NULL),
(12, 'nves', '', 'gjhsdfgsdhjg', '+632378642837', 'asghjkdgasd@gmail.com', '2024-07-29 13:52:07', 'Approved', '66a79e87891ec-IS CLUB.png', NULL),
(13, 'Pang ', '', '11', '+632389475239', 'pang11na87@gmail.com', '2024-07-29 14:41:15', 'Approved', '66a7aa0b4a291-CCST Logo.png', NULL),
(14, 'Juan', '', 'dela Cruz', '+633478959483', 'juandelacruz87@shurua.xyz', '2024-08-03 12:18:10', 'Approved', '66ae2002e0e42-CCST Logo.png', NULL),
(15, 'Gerlie', '', 'Garding', '+639983724392', '0w02tn82@duckmail.club', '2024-08-05 05:54:52', 'Approved', '66b0692c02c30-496px-San_Pablo_City_Laguna_seal.svg.png', NULL),
(16, 'Marko', '', 'Pornasa', '+639823472893', 'jrqkt5k3@duckmail.club', '2024-08-05 06:01:10', 'Rejected', '66b06aa620dfc-496px-San_Pablo_City_Laguna_seal.svg.png', NULL),
(17, 'Jumar', '', 'Kanor', '+639837294827', 'jksahdkjasd@gmail.com', '2024-08-07 01:44:14', 'Pending', '66b2d16deed7e-CCST_Council_Logo (1).png', NULL),
(18, 'sadsad', '', 'asdsadd', '+637364782364', 'hjsagdhjasgd@gmail.com', '2024-08-07 01:47:51', 'Approved', '66b2d247386b1-CCST_Council_Logo (1).png', NULL),
(19, 'Gumana', '', 'Kanaman', '+639783246972', 'kshadkhsj@gmail.com', '2024-08-07 01:49:43', 'Approved', '66b2d2b7c2c4d-CCST Logo.png', '2024-08-17'),
(20, 'Jomar ', '', 'Silganan', '+639382748932', 'ar6wbxbi@duckmail.club', '2024-08-07 03:02:21', 'Approved', '66b2e3bde460b-CCST_Council_Logo (1).png', '2036-10-15'),
(21, 'Lumi', '', 'Marabe', '+639837489237', 'lumimarabe98@gmail.com', '2024-08-07 04:56:26', 'Pending', '66b2fe7a728fd-IS CLUB.png', '2024-08-17'),
(22, 'Lomi', '', 'Marabe', '+639327498237', '5s4vns1b@duckmail.club', '2024-08-07 06:55:58', 'Approved', '66b31a7e498c7-CCST_Council_Logo (1).png', '2024-08-16'),
(23, 'Makina ', '', 'Keni', '+639167981273', 'y3kwa8rg@duckmail.club', '2024-08-07 06:58:24', 'Pending', '66b31b108ac1b-IS CLUB.png', '2026-09-17'),
(24, 'Robert ', '', 'Dellava', '+632379423784', 'm61onixw@duckmail.club', '2024-08-07 07:00:24', 'Approved', '66b31b8830b42-CCST_Council_Logo (1).png', '2025-10-07'),
(25, 'Second', '', 'Session', '+639382478923', 'dde30lbr@duckmail.club', '2024-08-07 08:04:25', 'Approved', '66b32a894c1e1-CCST Logo.png', '2024-08-23'),
(26, 'Bohol', '', 'Lano', '+633252356325', 'g20b01bg@duckmail.club', '2024-08-19 04:19:52', 'Approved', '66c2c7e824cea-stanley tumbler.png', '2025-01-19'),
(27, 'Toto', '', 'na', '+633252352353', 'dyjel6kw@duckmail.club', '2024-08-19 04:24:25', 'Approved', '66c2c8f90d776-CCST 2024 frame.png', '2026-05-19'),
(28, 'Eliana', '', 'Pusa', '+633274632784', '7fbnddgp@duckmail.club', '2024-08-22 07:22:42', 'Approved', '66c6e742bade1-Marabe_ITSOCLeadhership Post.png', '2025-01-22');

-- --------------------------------------------------------

--
-- Table structure for table `businessinformationform`
--

CREATE TABLE `businessinformationform` (
  `BusinessInfoID` int(11) NOT NULL,
  `ApplicationID` int(11) DEFAULT NULL,
  `BusinessName` varchar(100) NOT NULL,
  `BusinessAddress` varchar(255) NOT NULL,
  `BusinessTypeID` int(11) NOT NULL,
  `BusinessEmail` varchar(100) NOT NULL,
  `BusinessContactNumber` varchar(15) NOT NULL,
  `BusinessDescription` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `businessinformationform`
--

INSERT INTO `businessinformationform` (`BusinessInfoID`, `ApplicationID`, `BusinessName`, `BusinessAddress`, `BusinessTypeID`, `BusinessEmail`, `BusinessContactNumber`, `BusinessDescription`) VALUES
(1, 1, 'Eugenio Schneider', '1212 Street', 2, 'klnse73i@duckmail.club', '+633784678234', 'hjhjsdghjsgfsdhjfgsdhj hsjdfghjsdgfsdfsdfsdfsd'),
(2, 2, 'Sherwin Farms', 'Taytay Laguna', 2, 't2vb6beq@duckmail.club', '+635756756756', 'wala lang'),
(3, 3, 'Karlo Silog', '11 Street', 2, 'fbufef5p@duckmail.club', '+632304723987', 'sdfsdf dsfsdf'),
(4, 4, 'xgzs16jk@duckmail.club', 'ashkdgaskdh', 2, 'xgzs16jk@duckmail.club', '+639835789237', 'jakshdasdasdsadasdsa asdasdas'),
(5, 6, 'Wlala nag ', '7621387126378', 6, 'kasdhgkashd79@gmail.com', '+639834758937', 'khakjd askdhaskjhdaskhdas asdsa'),
(6, 7, 'asdasnmdb', 'klsdjfkljsd', 6, 'jlhsakjhd876@gmail.com', '+637263781264', 'gashjdgasjhdasdhjgas saddsa'),
(7, 8, 'Kayla Manalo', '123 Street', 6, '4qype90s@duckmail.club', '+632394678238', 'kjsahdkjashdsadsad'),
(8, 9, 'Jeremy Cabrera Falls', '12312 Street', 3, 'ti98z1ro@duckmail.club', '+637892364237', 'ksadsadas asdasdas'),
(9, 10, 'Koligarko ', '121 Street', 3, 'qezblk62@duckmail.club', '+639327423894', 'kjadshfsdafas'),
(10, 11, 'Kaliosuda', '121 Street', 6, 'mubjlwjr@duckmail.club', '+638932479823', 'kjlashfdasdsdasd'),
(11, 12, 'Kapal muka', '1212 Street', 3, '6uu8zsnv@duckmail.club', '+633874623874', 'kshsadkjas asdasdsad'),
(12, 13, 'Pang 11', '123 Street', 6, 'daoug5t5@duckmail.club', '+639283749823', 'ljkhdsjkfsdfsdfdsfsdfsdsdfsdfsdfsdfsdfsdfhsdfjhsdgfhjgsdhjfgsdhjfgsdhjfgshjdgfhjsdgfjhsdgfhjsdgfhjsgdhjfgsdjhfgsdjhfgsdhjfgsdhjfgsdhjfsdf'),
(13, 14, 'Juan dela Cruz Farms', '123 Majayjay Laguna', 1, 'juandelacruz87@shurua.xyz', '+637832642378', 'Maganda ito tiwala lang'),
(14, 15, 'Garling Farms', 'Majayjay Street', 2, '0w02tn82@duckmail.club', '+633249873298', 'maraming puno'),
(15, 16, 'Marko Pornasa falls', 'Majyajy Street', 3, 'jrqkt5k3@duckmail.club', '+630983242903', 'Maganda lang'),
(16, 17, 'knashdk', 'kjashdjkashd', 3, 'hslajkdh76@gmail.com', '+637234782364', 'wala langg'),
(17, 18, 'Hinohg', '121 Street', 18, 'lslasdsladjlk@gmail.com', '+639834798237', 'askdjhdsadasd'),
(18, 19, 'Kupal Sila heheh', '1212 Street', 2, 'ksjahdsa796@gmail.com', '+633782642378', 'hgsdasdasdasdasd'),
(19, 20, 'Kalokohan Nman', 'wala langa', 1, '', '+639238749823', 'kjhskashdkasjhdasdasd'),
(20, 21, 'Lumi Zoo', '121 Street', 6, '', '+639823748924', 'kashdjkashdasd'),
(21, 22, 'Lumi Marabe', '121 Street', 2, '', '+633892492384', 'wala lang heheh'),
(22, 23, 'Kupal Sila', '1212 Street', 6, '', '+638902374923', 'kjhsadasdsa asdas'),
(23, 24, 'Wla lang', '121 Street', 18, '', '+639832749328', 'asfasfasfsa'),
(24, 25, 'Second Session', '1212 Street', 2, '', '+639873249827', 'kjdhfjksdhf dskfhsdkf'),
(25, 26, 'Falls Alarm', '232 Street', 3, '', '+633242342342', 'wala lang bobo kaba '),
(26, 27, 'pakyu resort', '21 Street', 1, '', '+638327498237', 'jkndsfdsfsdf'),
(27, 28, 'Pusa Resort', '131 Street', 1, '', '+639023850239', 'kjhfsdfsdfsdfsdsf accept mo pls');

-- --------------------------------------------------------

--
-- Table structure for table `businesstype`
--

CREATE TABLE `businesstype` (
  `BusinessTypeID` int(11) NOT NULL,
  `TypeName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `businesstype`
--

INSERT INTO `businesstype` (`BusinessTypeID`, `TypeName`) VALUES
(1, 'Resort'),
(2, 'Farm'),
(3, 'Falls'),
(6, 'Zoo'),
(18, 'Hot Spring');

-- --------------------------------------------------------

--
-- Table structure for table `business_features`
--

CREATE TABLE `business_features` (
  `BusinessFeatureID` int(11) NOT NULL,
  `BusinessInfoID` int(11) NOT NULL,
  `FeatureID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `business_features`
--

INSERT INTO `business_features` (`BusinessFeatureID`, `BusinessInfoID`, `FeatureID`) VALUES
(47, 24, 47),
(48, 24, 48),
(49, 24, 49),
(50, 24, 50),
(51, 26, 51),
(52, 26, 52),
(54, 27, 54),
(55, 27, 55),
(56, 27, 56),
(58, 26, 58),
(59, 26, 59);

-- --------------------------------------------------------

--
-- Table structure for table `business_media`
--

CREATE TABLE `business_media` (
  `MediaID` int(11) NOT NULL,
  `BusinessInfoID` int(11) NOT NULL,
  `Thumbnail` varchar(255) NOT NULL,
  `Quotation` text NOT NULL,
  `Image1` varchar(255) NOT NULL,
  `Image2` varchar(255) NOT NULL,
  `Image3` varchar(255) NOT NULL,
  `Image4` varchar(255) NOT NULL,
  `Image5` varchar(255) NOT NULL,
  `Image6` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `business_media`
--

INSERT INTO `business_media` (`MediaID`, `BusinessInfoID`, `Thumbnail`, `Quotation`, `Image1`, `Image2`, `Image3`, `Image4`, `Image5`, `Image6`) VALUES
(5, 24, '66c4381413062.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam vehicula pulvinar est, sed consectetur lacus malesuada eu. Vestibulum maximus risus felis, et consectetur lectus feugiat sit amet. Quisque lobortis sinoka?.', '66c2b3b9d864d.jpg', '66c2c6b0d0948.jpg', '66c2c5d52afcd.jpg', '66c2b3bbd62b0.jpg', '66c2b3bc8174b.jpg', '66c2b3bd35a9f.jpg'),
(6, 26, '66c2c9e70b338.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam vehicula pulvinar est, sed consectetur lacus malesuada eu. Vestibulum maximus risus felis, et consectetur lectus feugiat sit amet. Quisque bobokabataenamo.', '66c2c9e7de93e.jpg', '66c2c9e8afcaf.jpg', '66c2c9e98a65e.jpg', '66c2c9ea8410f.jpg', '66c2c9eb5ef7f.jpg', '66c2c9ec4ac5d.jpg'),
(8, 27, '66c7204fce661.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam vehicula pulvinar est, sed consectetur lacus malesuada eu. Vestibulum maximus risus felis, et consectetur lectus feugiat sit amet. Quisque lobortis libero.', '66c720508f4de.jpg', '66c72050cdd89.jpg', '66c7205115c58.jpg', '66c7205142fe4.jpg', '66c7205180022.jpg', '66c7205202601.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `FeatureID` int(11) NOT NULL,
  `FeatureName` varchar(100) NOT NULL,
  `IsActive` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`FeatureID`, `FeatureName`, `IsActive`) VALUES
(47, 'Pet friendly', 0),
(48, 'Panot', 1),
(49, 'Kilabot', 1),
(50, 'Modal', 0),
(51, 'Baboy', 0),
(52, 'Bonak', 0),
(53, 'Kilay', 1),
(54, 'Mabaho', 0),
(55, 'Putek', 1),
(56, 'Bno', 1),
(57, 'Kulay', 1),
(58, 'Hehe', 0),
(59, 'Bota', 0);

-- --------------------------------------------------------

--
-- Table structure for table `frontpagecontent`
--

CREATE TABLE `frontpagecontent` (
  `frontpageid` int(11) NOT NULL,
  `description` text NOT NULL,
  `slider_image_1` varchar(255) NOT NULL,
  `slider_title_1` varchar(255) NOT NULL,
  `slider_content_1` text NOT NULL,
  `slider_image_2` varchar(255) NOT NULL,
  `slider_title_2` varchar(255) NOT NULL,
  `slider_content_2` text NOT NULL,
  `slider_image_3` varchar(255) NOT NULL,
  `slider_title_3` varchar(255) NOT NULL,
  `slider_content_3` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `frontpagecontent`
--

INSERT INTO `frontpagecontent` (`frontpageid`, `description`, `slider_image_1`, `slider_title_1`, `slider_content_1`, `slider_image_2`, `slider_title_2`, `slider_content_2`, `slider_image_3`, `slider_title_3`, `slider_content_3`, `created_at`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque et justo auctor, pulvinar enim eu, aliquet nisi. Vivamus cursus, nulla sit amet sodales rhoncus, dui lacus hendrerit enim, sed dictum enim orci id nibh. Pellentesque auctor leo sed quam viverra faucibus. Vestibulumsadas interdum sagittis iaculis. Nulla dfds sad sd majayjay', '496px-San_Pablo_City_Laguna_seal.svg.png', 'Where to Stay', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra, magna sit amet ornare ultrices, erat massa pellentesque sapien, at dignissim turpis risus in ligula.', 'CCST Logo.png', 'Where to Go', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra, magna sit amet ornare ultrices, erat massa pellentesque sapien, at dignissim turpis risus in ligula.', 'CCST_Council_Logo (1).png', 'Where to Eat', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra, magna sit amet ornare ultrices, erat massa pellentesque sapien, at dignissim turpis risus in ligula.', '2024-07-31 04:05:16');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `RoleID` int(11) NOT NULL,
  `RoleName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `roominfotable`
--

CREATE TABLE `roominfotable` (
  `roomID` int(11) NOT NULL,
  `BusinessInfoID` int(11) NOT NULL,
  `roomName` varchar(255) NOT NULL,
  `roomPrice` decimal(10,2) NOT NULL,
  `adultMax` int(11) NOT NULL,
  `ChildrenMax` int(11) NOT NULL,
  `RoomDescriptions` text NOT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `image3` varchar(255) DEFAULT NULL,
  `image4` varchar(255) DEFAULT NULL,
  `image5` varchar(255) DEFAULT NULL,
  `image6` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roominfotable`
--

INSERT INTO `roominfotable` (`roomID`, `BusinessInfoID`, `roomName`, `roomPrice`, `adultMax`, `ChildrenMax`, `RoomDescriptions`, `image1`, `image2`, `image3`, `image4`, `image5`, `image6`) VALUES
(15, 27, 'Casa de Playa', '12000.00', 100, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam vehicula pulvinar est, sed consectetur lacus malesuada eu. Vestibulum maximus risus felis, et consectetur lectus feugiat sit amet. Quisque lobortis libero.', '../../businessowner/roomImages/Pusa Resort/Casa de Playa/Screenshot (1)_66cda1b97a450.png', '../../businessowner/roomImages/Pusa Resort/Casa de Playa/Screenshot (2)_66cda1b97a5e1.png', '../../businessowner/roomImages/Pusa Resort/Casa de Playa/Screenshot (3)_66cda1b97a72d.png', '../../businessowner/roomImages/Pusa Resort/Casa de Playa/Screenshot (4)_66cda1b97a87d.png', '../../businessowner/roomImages/Pusa Resort/Casa de Playa/Screenshot (5)_66cda1b97a9e8.png', '../../businessowner/roomImages/Pusa Resort/Casa de Playa/Screenshot (6)_66cda1b97ac75.png'),
(16, 26, 'Vista de Laiya', '50.00', 11, 11, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam vehicula pulvinar est, sed consectetur lacus malesuada eu. Vestibulum maximus risus felis, et consectetur lectus feugiat sit amet. Quisque lobortis libero.', '../../businessowner/roomImages/pakyu resort/Vista de Laiya/Screenshot (1)_66cda2192b88f.png', '../../businessowner/roomImages/pakyu resort/Vista de Laiya/Screenshot (2)_66cda2192b9c1.png', '../../businessowner/roomImages/pakyu resort/Vista de Laiya/Screenshot (3)_66cda2192bad1.png', '../../businessowner/roomImages/pakyu resort/Vista de Laiya/Screenshot (4)_66cda2192bbdf.png', '../../businessowner/roomImages/pakyu resort/Vista de Laiya/Screenshot (5)_66cda2192bcfc.png', '../../businessowner/roomImages/pakyu resort/Vista de Laiya/Screenshot (6)_66cda2192bfd8.png'),
(17, 26, 'Panot', '120000.00', 12, 12, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean vitae arcu sollicitudin, ullamcorper orci eget, sollicitudin elit. Donec sit amet nisl maximus, facilisis diam quis, eleifend nulla. Nam vel ligula accumsan, blandit nulla non, fermentum nibh. Aliquam at elementum eros. Curabitur eget sapien laoreet, aliquet arcu eget, dapibus sem. Donec.', '../../businessowner/roomImages/pakyu resort/Panot/Screenshot (1)_66cdb6098dd87.png', '../../businessowner/roomImages/pakyu resort/Panot/Screenshot (2)_66cdb60a75a19.png', '../../businessowner/roomImages/pakyu resort/Panot/Screenshot (3)_66cdb60b3bf10.png', '../../businessowner/roomImages/pakyu resort/Panot/Screenshot (4)_66cdb60c13d45.png', '../../businessowner/roomImages/pakyu resort/Panot/Screenshot (5)_66cdb60cc3346.png', '../../businessowner/roomImages/pakyu resort/Panot/Screenshot (6)_66cdb60d60a61.png'),
(19, 26, 'Black Hat', '12111.00', 121, 1211, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean vitae arcu sollicitudin, ullamcorper orci eget, sollicitudin elit. Donec sit amet nisl maximus, facilisis diam quis, eleifend nulla. Nam vel ligula accumsan, blandit nulla non, fermentum nibh. Aliquam at elementum eros. Curabitur eget sapien laoreet, aliquet arcu eget, dapibus sem. Donec.', '../../businessowner/roomImages/pakyu resort/Black Hat/Screenshot (1)_66d14885cad3e.png', '../../businessowner/roomImages/pakyu resort/Black Hat/Screenshot (2)_66d148869d046.png', '../../businessowner/roomImages/pakyu resort/Black Hat/Screenshot (3)_66d1488750c32.png', '../../businessowner/roomImages/pakyu resort/Black Hat/Screenshot (4)_66d14887eb118.png', '../../businessowner/roomImages/pakyu resort/Black Hat/Screenshot (5)_66d148893d2da.png', '../../businessowner/roomImages/pakyu resort/Black Hat/Screenshot (6)_66d1488a0a547.png');

-- --------------------------------------------------------

--
-- Table structure for table `room_facilities`
--

CREATE TABLE `room_facilities` (
  `FacilityID` int(11) NOT NULL,
  `BusinessInfoID` int(11) NOT NULL,
  `FacilityName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_facilities`
--

INSERT INTO `room_facilities` (`FacilityID`, `BusinessInfoID`, `FacilityName`) VALUES
(1, 26, 'Manok'),
(2, 26, 'Garden'),
(3, 26, 'Balcony'),
(4, 26, 'Boring'),
(5, 26, 'Bobo'),
(6, 26, 'Pogi'),
(7, 26, 'Igip'),
(8, 26, 'Simog');

-- --------------------------------------------------------

--
-- Table structure for table `room_facility_connections`
--

CREATE TABLE `room_facility_connections` (
  `ConnectionID` int(11) NOT NULL,
  `roomID` int(11) NOT NULL,
  `FacilityID` int(11) NOT NULL,
  `IsActive` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_facility_connections`
--

INSERT INTO `room_facility_connections` (`ConnectionID`, `roomID`, `FacilityID`, `IsActive`) VALUES
(1, 16, 1, 0),
(4, 17, 1, 0),
(5, 19, 1, 0),
(6, 16, 4, 0),
(7, 16, 5, 0),
(8, 17, 5, 0),
(9, 19, 5, 0),
(10, 16, 3, 0),
(11, 16, 2, 0),
(12, 17, 2, 0),
(13, 16, 6, 0),
(14, 16, 8, 0);

-- --------------------------------------------------------

--
-- Table structure for table `subadmin`
--

CREATE TABLE `subadmin` (
  `SubAdminID` int(11) NOT NULL,
  `AdminID` int(11) DEFAULT NULL,
  `RoleID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`AccountID`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD KEY `ApplicationID` (`ApplicationID`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `businessapplicationform`
--
ALTER TABLE `businessapplicationform`
  ADD PRIMARY KEY (`ApplicationID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `businessinformationform`
--
ALTER TABLE `businessinformationform`
  ADD PRIMARY KEY (`BusinessInfoID`),
  ADD KEY `ApplicationID` (`ApplicationID`),
  ADD KEY `BusinessTypeID` (`BusinessTypeID`);

--
-- Indexes for table `businesstype`
--
ALTER TABLE `businesstype`
  ADD PRIMARY KEY (`BusinessTypeID`);

--
-- Indexes for table `business_features`
--
ALTER TABLE `business_features`
  ADD PRIMARY KEY (`BusinessFeatureID`),
  ADD KEY `FeatureID` (`FeatureID`),
  ADD KEY `fk_businessinfoid` (`BusinessInfoID`);

--
-- Indexes for table `business_media`
--
ALTER TABLE `business_media`
  ADD PRIMARY KEY (`MediaID`),
  ADD KEY `BusinessInfoID` (`BusinessInfoID`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`FeatureID`),
  ADD UNIQUE KEY `FeatureName` (`FeatureName`);

--
-- Indexes for table `frontpagecontent`
--
ALTER TABLE `frontpagecontent`
  ADD PRIMARY KEY (`frontpageid`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`RoleID`);

--
-- Indexes for table `roominfotable`
--
ALTER TABLE `roominfotable`
  ADD PRIMARY KEY (`roomID`),
  ADD KEY `BusinessInfoID` (`BusinessInfoID`);

--
-- Indexes for table `room_facilities`
--
ALTER TABLE `room_facilities`
  ADD PRIMARY KEY (`FacilityID`),
  ADD KEY `BusinessInfoID` (`BusinessInfoID`);

--
-- Indexes for table `room_facility_connections`
--
ALTER TABLE `room_facility_connections`
  ADD PRIMARY KEY (`ConnectionID`),
  ADD KEY `roomID` (`roomID`),
  ADD KEY `FacilityID` (`FacilityID`);

--
-- Indexes for table `subadmin`
--
ALTER TABLE `subadmin`
  ADD PRIMARY KEY (`SubAdminID`),
  ADD KEY `AdminID` (`AdminID`),
  ADD KEY `RoleID` (`RoleID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `AccountID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `businessapplicationform`
--
ALTER TABLE `businessapplicationform`
  MODIFY `ApplicationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `businessinformationform`
--
ALTER TABLE `businessinformationform`
  MODIFY `BusinessInfoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `businesstype`
--
ALTER TABLE `businesstype`
  MODIFY `BusinessTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `business_features`
--
ALTER TABLE `business_features`
  MODIFY `BusinessFeatureID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `business_media`
--
ALTER TABLE `business_media`
  MODIFY `MediaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `FeatureID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `frontpagecontent`
--
ALTER TABLE `frontpagecontent`
  MODIFY `frontpageid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `RoleID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roominfotable`
--
ALTER TABLE `roominfotable`
  MODIFY `roomID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `room_facilities`
--
ALTER TABLE `room_facilities`
  MODIFY `FacilityID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `room_facility_connections`
--
ALTER TABLE `room_facility_connections`
  MODIFY `ConnectionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `subadmin`
--
ALTER TABLE `subadmin`
  MODIFY `SubAdminID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`ApplicationID`) REFERENCES `businessapplicationform` (`ApplicationID`);

--
-- Constraints for table `businessinformationform`
--
ALTER TABLE `businessinformationform`
  ADD CONSTRAINT `businessinformationform_ibfk_1` FOREIGN KEY (`ApplicationID`) REFERENCES `businessapplicationform` (`ApplicationID`),
  ADD CONSTRAINT `businessinformationform_ibfk_2` FOREIGN KEY (`BusinessTypeID`) REFERENCES `businesstype` (`BusinessTypeID`);

--
-- Constraints for table `business_features`
--
ALTER TABLE `business_features`
  ADD CONSTRAINT `business_features_ibfk_1` FOREIGN KEY (`BusinessInfoID`) REFERENCES `businessinformationform` (`BusinessInfoID`),
  ADD CONSTRAINT `business_features_ibfk_2` FOREIGN KEY (`FeatureID`) REFERENCES `features` (`FeatureID`),
  ADD CONSTRAINT `fk_businessinfoid` FOREIGN KEY (`BusinessInfoID`) REFERENCES `businessinformationform` (`BusinessInfoID`);

--
-- Constraints for table `business_media`
--
ALTER TABLE `business_media`
  ADD CONSTRAINT `business_media_ibfk_1` FOREIGN KEY (`BusinessInfoID`) REFERENCES `businessinformationform` (`BusinessInfoID`) ON DELETE CASCADE;

--
-- Constraints for table `roominfotable`
--
ALTER TABLE `roominfotable`
  ADD CONSTRAINT `roominfotable_ibfk_1` FOREIGN KEY (`BusinessInfoID`) REFERENCES `businessinformationform` (`BusinessInfoID`) ON DELETE CASCADE;

--
-- Constraints for table `room_facilities`
--
ALTER TABLE `room_facilities`
  ADD CONSTRAINT `room_facilities_ibfk_1` FOREIGN KEY (`BusinessInfoID`) REFERENCES `businessinformationform` (`BusinessInfoID`);

--
-- Constraints for table `room_facility_connections`
--
ALTER TABLE `room_facility_connections`
  ADD CONSTRAINT `room_facility_connections_ibfk_1` FOREIGN KEY (`roomID`) REFERENCES `roominfotable` (`roomID`),
  ADD CONSTRAINT `room_facility_connections_ibfk_2` FOREIGN KEY (`FacilityID`) REFERENCES `room_facilities` (`FacilityID`);

--
-- Constraints for table `subadmin`
--
ALTER TABLE `subadmin`
  ADD CONSTRAINT `subadmin_ibfk_1` FOREIGN KEY (`AdminID`) REFERENCES `admin` (`id`),
  ADD CONSTRAINT `subadmin_ibfk_2` FOREIGN KEY (`RoleID`) REFERENCES `role` (`RoleID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
