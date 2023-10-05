-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2023 at 03:21 PM
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
-- Database: `prs_prototype`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(32) NOT NULL,
  `session_id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `session_id`, `username`, `password`) VALUES
(1, 1241412151, 'admin', 'admin'),
(2, 1241412152, 'Ted', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `medical_record`
--

CREATE TABLE `medical_record` (
  `medical_record_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `height` varchar(11) NOT NULL,
  `weight` varchar(11) NOT NULL,
  `pulse` varchar(11) NOT NULL,
  `blood_pressure` varchar(11) NOT NULL,
  `respiratory_rate` varchar(11) NOT NULL,
  `allergies` varchar(100) NOT NULL,
  `findings` varchar(100) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `checked_up_date` date NOT NULL,
  `checked_up_time` time NOT NULL,
  `am_pm` varchar(11) NOT NULL,
  `temperature` float NOT NULL,
  `saturation` int(11) NOT NULL,
  `taken` varchar(300) NOT NULL,
  `complaints` varchar(300) NOT NULL,
  `history` varchar(300) NOT NULL,
  `medication` varchar(300) NOT NULL,
  `physical` varchar(100) NOT NULL,
  `recommendation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medical_record`
--

INSERT INTO `medical_record` (`medical_record_id`, `id`, `height`, `weight`, `pulse`, `blood_pressure`, `respiratory_rate`, `allergies`, `findings`, `remarks`, `checked_up_date`, `checked_up_time`, `am_pm`, `temperature`, `saturation`, `taken`, `complaints`, `history`, `medication`, `physical`, `recommendation`) VALUES
(359, 132, '', '', '', '', '', '', '', '', '2023-09-22', '06:02:46', 'pm', 0, 0, '', '', '', '', '', ''),
(360, 133, '', '', '', '', '', '', '', '', '2023-09-22', '06:03:17', 'pm', 0, 0, '', '', '', '', '', ''),
(361, 134, '', '', '', '', '', '', '', '', '2023-09-22', '06:03:57', 'pm', 0, 0, '', '', '', '', '', ''),
(362, 135, '', '', '', '', '', '', '', '', '2023-09-22', '06:04:25', 'pm', 0, 0, '', '', '', '', '', ''),
(363, 136, '', '', '', '', '', '', '', '', '2023-09-22', '06:05:00', 'pm', 0, 0, '', '', '', '', '', ''),
(364, 137, '', '', '', '', '', '', '', '', '2023-09-22', '06:05:40', 'pm', 0, 0, '', '', '', '', '', ''),
(365, 138, '', '', '', '', '', '', '', '', '2023-09-22', '06:06:18', 'pm', 0, 0, '', '', '', '', '', ''),
(366, 139, '', '', '', '', '', '', '', '', '2023-09-22', '06:07:05', 'pm', 0, 0, '', '', '', '', '', ''),
(367, 140, '', '', '', '', '', '', '', '', '2023-09-22', '06:07:51', 'pm', 0, 0, '', '', '', '', '', ''),
(368, 141, '', '', '', '', '', '', '', '', '2023-09-22', '06:08:31', 'pm', 0, 0, '', '', '', '', '', ''),
(369, 142, '', '', '', '', '', '', '', '', '2023-09-22', '06:09:01', 'pm', 0, 0, '', '', '', '', '', ''),
(370, 143, '', '', '', '', '', '', '', '', '2023-09-22', '06:09:37', 'pm', 0, 0, '', '', '', '', '', ''),
(371, 144, '', '', '', '', '', '', '', '', '2023-09-22', '06:10:12', 'pm', 0, 0, '', '', '', '', '', ''),
(372, 145, '', '', '', '', '', '', '', '', '2023-09-22', '06:10:50', 'pm', 0, 0, '', '', '', '', '', ''),
(373, 146, '', '', '', '', '', '', '', '', '2023-09-22', '06:11:31', 'pm', 0, 0, '', '', '', '', '', ''),
(374, 147, '', '', '', '', '', '', '', '', '2023-09-22', '06:12:11', 'pm', 0, 0, '', '', '', '', '', ''),
(375, 148, '', '', '', '', '', '', '', '', '2023-09-22', '06:12:42', 'pm', 0, 0, '', '', '', '', '', ''),
(376, 149, '', '', '', '', '', '', '', '', '2023-09-22', '06:13:20', 'pm', 0, 0, '', '', '', '', '', ''),
(481, 181, '', '', '', '', '', '', '', '', '2023-09-29', '10:33:35', 'pm', 0, 0, '', '', '', '', '', ''),
(482, 157, '', '', '', '', '', '', '', '', '2023-09-29', '10:37:09', 'pm', 0, 0, '', '', '', '', '', ''),
(483, 182, '143', '12', '123', '123', '', '', '', '', '2023-09-29', '10:47:12', 'pm', 123, 123, '', '', '', '', '', ''),
(484, 182, '', '', '', '', '', '', '', '', '2023-09-29', '10:49:07', 'pm', 0, 0, '', '', '', '', '', ''),
(485, 182, '123', '123', '123', '123', '', 'Sadfas', 'Asdfasfa', '', '2023-09-29', '10:49:49', 'pm', 123, 123, 'Sadfas', 'Sadfas', 'Asdfas', 'Asdfas', 'Asdfa', 'Sadfa'),
(486, 182, '154', '123', '1231', '1231', '', 'Sadfas', 'Asdfas', '', '2023-09-30', '10:51:49', 'pm', 1231, 123131, 'Sadfas', 'Asdfasfas', 'Asdfas', 'Asdgadsgas', 'Sadfasfdas', 'Asgdasgas'),
(487, 164, '', '', '', '', '', '', '', '', '2023-09-30', '12:02:27', 'am', 0, 0, '', '', '', '', '', ''),
(488, 160, '', '', '', '', '', '', '', '', '0000-00-00', '03:01:02', 'am', 0, 0, '', '', '', '', '', ''),
(489, 173, '', '', '', '', '', '', '', '', '2023-09-30', '03:01:39', 'am', 0, 0, '', '', '', '', '', ''),
(490, 164, '', '', '', '', '', '', '', '', '2023-09-30', '08:55:32', 'pm', 0, 0, '', '', '', '', '', ''),
(491, 159, '', '', '', '', '', '', 'Test', '', '0000-00-00', '11:12:36', 'pm', 0, 0, '', '', '', 'Test', '', ''),
(492, 164, '', '', '', '', '', '', 'Test', '', '2023-09-30', '11:14:09', 'pm', 0, 0, '', '', '', 'Test', '', 'Test'),
(493, 134, '', '', '', '', '', '', 'Test', '', '2023-09-22', '11:15:10', 'pm', 0, 0, '', '', '', 'Test', '', ''),
(494, 134, '', '', '', '', '', '', 'Tets', '', '2023-09-30', '11:16:02', 'pm', 0, 0, '', '', '', '', '', 'Test'),
(495, 145, '', '', '', '', '', '', '', '', '2023-09-22', '01:28:45', 'am', 0, 0, '', '', '', '', '', ''),
(496, 145, '123', '123', '23', '23', '', 'Asdfas', 'Asdfa', '', '2023-09-22', '01:29:03', 'am', 23, 23, 'Asdga', 'Sadh', 'Asdhgas', 'Asdfas', 'Asdhas', 'Asdfa'),
(497, 164, '123', '1231', '', '', '', '', 'Test', '', '2023-09-30', '12:13:01', 'pm', 0, 0, '', '', '', 'Test', '', 'Test'),
(498, 164, '123', '1231', '', '', '', '', 'Test', '', '2023-09-30', '12:17:45', 'pm', 0, 0, '', '', '', 'Test', 'Sadfasfas', 'Test'),
(499, 164, '123', '1231', '', '', '', 'Asdfsa', 'Test', '', '2023-09-30', '12:18:26', 'pm', 0, 0, '', '', 'Asdfasfas', 'Test', 'Sadfasfas', 'Test'),
(500, 164, '123', '1231', '', '', '', 'Asdfsa', 'Test', '', '2023-09-30', '12:29:38', 'pm', 0, 0, '', '', 'Asdfasfas', 'Test', 'Sadfasfas', 'Test'),
(501, 164, '123', '1231', '', '', '', 'Asdfsa', 'Test', '', '2023-09-30', '03:18:48', 'pm', 0, 0, '', '', 'Asdfasfas', 'Test', 'Sadfasfas', 'Test'),
(502, 183, '', '', '', '', '', '', '', '', '2023-10-04', '08:23:12', 'pm', 0, 0, '', '', '', '', '', ''),
(503, 165, '154', '123', '60-100', '90/60', '', 'Afadsfas', 'Dasfads', '', '0000-00-00', '08:38:26', 'pm', 35.8, 99, 'Gdsagas', 'Sdfasfas', 'Asdsafsa', 'Sfasdfas', 'Adsfasfdas', 'Asdgasgas'),
(504, 136, '12', '25', '36', '38', '', '', '', '', '2023-10-04', '09:27:30', 'pm', 36, 99, '', '', '', '', '', ''),
(505, 136, '12', '25', '36', '38', '', 'Gshsndjd', 'Hebsve', '', '2023-10-04', '09:29:43', 'pm', 36, 99, 'Hehdvwid', 'Heheveid', 'Hdhevej', 'Gegehe', 'Hehevsb', 'Ywyegegejd'),
(506, 136, '12', '25', '36', '38', '', 'Gshsndjd', 'Hebsve', '', '2023-10-04', '10:13:55', 'pm', 36, 99, 'Hehdvwid', 'Heheveid', 'Hdhevej', 'Gegehe', 'Hehevsb', 'Test'),
(507, 136, '12', '25', '36', '38', '', 'Beer', 'Simple Fever', '', '2023-10-04', '11:55:46', 'pm', 36, 99, 'Biogesic', 'Chest Pain', 'Typhoid Fever', 'More Biogesic', 'Good', '1-2 Days Of Rest'),
(508, 184, '', '', '', '', '', '', '', '', '2023-10-04', '02:05:35', 'am', 0, 0, '', '', '', '', '', ''),
(509, 136, '', '', '', '', '', 'Beer', '', '', '2023-10-05', '08:32:43', 'pm', 0, 0, '', '', 'Typhoid Fever', '', '', ''),
(510, 136, '', '', '', '', '', 'Beer', '', '', '2023-10-08', '08:32:53', 'pm', 0, 0, '', '', 'Typhoid Fever', '', '', ''),
(511, 136, '12', '213', '123', '123', '', 'Beer', 'Ahas', '', '2023-10-05', '08:33:13', 'pm', 123, 123, 'Sdfa', 'Sadf', 'Typhoid Fever', 'Swdhsahas', 'Gasgas', 'Asdfas'),
(512, 136, '123', '123', 'sadfas', 'dsafas', '', 'Beer', 'Dsafsa', '', '2023-10-08', '08:33:30', 'pm', 0, 0, 'Sadfas', 'Aashsa', 'Typhoid Fever', 'Asdfsa', 'Sdfsadf', 'Ahaswdhas');

-- --------------------------------------------------------

--
-- Table structure for table `personal_info`
--

CREATE TABLE `personal_info` (
  `id` int(11) NOT NULL,
  `firstName` varchar(32) NOT NULL,
  `lastName` varchar(32) NOT NULL,
  `middleName` varchar(32) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `age` bigint(32) NOT NULL,
  `contact` varchar(32) NOT NULL,
  `civil_status` varchar(32) NOT NULL,
  `religion` varchar(32) NOT NULL,
  `birthdate` date NOT NULL,
  `birthplace` varchar(32) NOT NULL,
  `occupation` varchar(32) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `personal_info`
--

INSERT INTO `personal_info` (`id`, `firstName`, `lastName`, `middleName`, `gender`, `age`, `contact`, `civil_status`, `religion`, `birthdate`, `birthplace`, `occupation`, `address`) VALUES
(132, 'Jade', 'Abbajon', 'Rubia', 'Male', 41, '1', '', '', '1982-04-05', '', '', '1'),
(133, 'Marvin', 'Abbas', 'Albit', 'Male', 46, '2', '', '', '1976-12-12', '', '', '1'),
(134, 'Abby Mae', 'Abejar', 'Cordita', 'Female', 24, '3', '', '', '1999-06-02', '', '', '3'),
(135, 'Jasim', 'Abe', 'Emano', 'Male', 37, '4', '', '', '1986-07-02', '', '', '4'),
(136, 'Ivan', 'Abello', 'Zambrano', 'Male', 44, '5', '', '', '1979-09-02', '', '', '1404 Pdel Rosario St. Brgy Guiwan 1 Palompon Leyte'),
(137, 'Jonel', 'Bataican', 'Lacambra', 'Male', 26, '6', '', '', '1997-06-07', '', '', '6'),
(138, 'Shaina Mae', 'Batua', 'Padernal', 'Female', 41, '7', '', '', '1982-07-07', '', '', '7'),
(139, 'Fujico', 'Bayani', 'Dacuro', 'Female', 39, '8', '', '', '1983-12-07', '', '', '8'),
(140, 'Precious Glory', 'Baylon', 'Bayo', 'Female', 38, '9', '', '', '1985-02-04', '', '', '9'),
(141, 'Mark', 'Cabrera', 'Fonte', 'Male', 31, '10', '', '', '1992-07-07', '', '', '10'),
(142, 'Rhiel', 'Cagas', 'Cagatan', 'Male', 37, '11', '', '', '1986-05-07', '', '', '11'),
(143, 'Christian', 'Cajero', 'Baltar', 'Male', 18, '12', '', '', '0000-00-00', '', '', '12'),
(144, 'Ma. Irene', 'Calado', 'Bonete', 'Female', 37, '13', '', '', '1985-12-05', '', '', '13'),
(145, 'John Edison', 'Calderon', 'Cali', 'Male', 35, '14', '', '', '1988-08-08', '', '', '1404 P.del Rosario St. Brgy. Guiwan 1'),
(146, 'Mary Joy', 'Campani', 'Carreon', 'Female', 39, '15', '', '', '1984-04-19', '', '', '1404 P.del Rosario St. Brgy. Guiwan 1 Palompon Leyte'),
(147, 'Lea Mae', 'Carag', 'Panaga', 'Female', 41, '16', '', '', '1981-12-18', '', '', '16'),
(148, 'Arlene', 'Casaldo', 'Tahir', 'Female', 39, '17', '', '', '1983-11-05', '', '', '17'),
(149, 'Samira', 'Dayag ', 'Bautista', 'Female', 29, '18', '', '', '1994-02-24', '', '', '18'),
(150, 'Kimberly', 'Dayap', 'De La Cruz', 'Female', 38, '19', '', '', '1985-05-05', '', '', '19'),
(151, 'Arvin ', 'Dela Cruz', 'Capulong', 'Male', 43, '20', '', '', '1980-03-01', '', '', '20'),
(152, 'Rose Mary', 'Delfin', 'Fuentes', 'Female', 36, '21', '', '', '1987-04-04', '', '', '21'),
(153, 'Conchita', 'Gayamos ', 'Diego', 'Female', 24, '22', '', '', '1998-12-09', '', '', '22'),
(154, 'Junry Jude', 'Ducala ', 'Ducut', 'Male', 34, '23', '', '', '1989-07-07', '', '', '23'),
(155, 'Jayvee', 'Ebol', 'Kidatan', 'Male', 21, '24', '', '', '2001-11-08', '', '', '24'),
(156, 'Angelo', 'Escabas', 'Galo', 'Male', 35, '25', '', '', '1987-12-18', '', '', '25'),
(157, 'Ariel', 'Estor', 'Raagas', 'Male', 37, '26', '', '', '1985-10-09', '', '', '26'),
(158, 'Mark Anthony', 'Faldas ', 'Dacuan', 'Male', 37, '27', '', '', '1986-03-27', '', '', '27'),
(159, 'Joseph', 'Gabaon', 'Felipe', 'Male', 18, '28', '', '', '0000-00-00', '', '', '28'),
(160, 'Daniel', 'Eugenio', 'Francisco', 'Male', 19, '29', '', '', '2004-07-08', '', '', '29'),
(161, 'Jhade Aubrey', 'Alarcon', 'Fugoso', 'Female', 19, '30', '', '', '2003-11-11', '', '', '30'),
(162, 'Analyn', 'Gani', 'Ganzagan', 'Female', 34, '31', '', '', '1988-11-04', '', '', '31'),
(163, 'Kobi', 'Garrdo', 'Cañete', 'Male', 34, '32', '', '', '1988-10-24', '', '', '32'),
(164, 'Efraim', 'Garsula', 'Garrido', 'Male', 18, '33', '', '', '2004-11-05', '', '', 'Jjjj'),
(165, 'John Carlo', 'Gomez ', 'Guevarra', 'Male', 36, '34', '', '', '1987-07-29', '', '', '34'),
(166, 'Wilfredo', 'Salvosa Guindol', 'Guindol', 'Male', 19, '35', '', '', '2004-04-04', '', '', '35'),
(167, 'Jay Carl', 'Gomez ', 'Guyang', 'Male', 18, '36', '', '', '2004-11-04', '', '', '36'),
(168, 'Angelica', 'Hinacay', 'Tadeo', 'Female', 15, '37', '', '', '2007-11-05', '', '', '37'),
(169, 'Windel John', 'Malla', 'Valdez', 'Male', 16, '38', '', '', '0000-00-00', '', '', '38'),
(170, 'Lilibeth', 'Mangili ', 'Villegas', 'Female', 15, '39', '', '', '2008-02-02', '', '', '39'),
(171, 'Jerome', 'Mantilla', 'Peralta', 'Male', 35, '40', '', '', '1988-08-01', '', '', '40'),
(172, 'Juan Miguel', 'Martires', 'Labrador', 'Male', 18, '41', '', '', '2005-05-05', '', '', '41'),
(173, 'Perlyn Joy', 'Malubay', 'Daguro', 'Female', 17, '42', '', '', '2006-06-07', '', '', '42'),
(174, 'Jean Cecilia', 'Medio', 'Medina', 'Female', 15, '43', '', '', '2008-03-06', '', '', '43'),
(178, 'Dsgfdas', 'Dasgas', 'Gdasgdas', 'Male', 0, '12', '', '', '2023-09-05', '', '', '1231'),
(181, 'Asdfas', 'Adsgas', 'Asdgads', 'Male', 0, '12312', '', '', '2023-09-21', '', '', 'Sadsdfasfasdfas'),
(182, 'Test', 'Test', 'Test', 'Male', 0, '1231231', '', '', '2023-09-12', '', '', 'Asdfsfasfasfas'),
(183, 'Sadfas', 'Sadfa', 'Sadfa', 'Female', 0, '1231', '', '', '2023-10-25', '', '', 'Sadfsaf'),
(184, 'Ginger', 'Ginger', 'Ginger', 'Female', 0, '12', '', '', '2023-12-31', '', '', '123131');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medical_record`
--
ALTER TABLE `medical_record`
  ADD PRIMARY KEY (`medical_record_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `personal_info`
--
ALTER TABLE `personal_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `medical_record`
--
ALTER TABLE `medical_record`
  MODIFY `medical_record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=513;

--
-- AUTO_INCREMENT for table `personal_info`
--
ALTER TABLE `personal_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `medical_record`
--
ALTER TABLE `medical_record`
  ADD CONSTRAINT `medical_record_ibfk_1` FOREIGN KEY (`id`) REFERENCES `personal_info` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
