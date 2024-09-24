-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2024 at 03:57 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maternal_health`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_code`
--

CREATE TABLE `access_code` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `image` text NOT NULL,
  `createdAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `access_code`
--

INSERT INTO `access_code` (`id`, `role_id`, `code`, `email`, `image`, `createdAt`) VALUES
(42, 6, 'EEERA98014L76M', 'crislloydy@gmail.com', '', '2024-04-25 21:39:40'),
(43, 6, '338010AA4LETTA', 'crislloyd.dalina378@gmail.com', '', '2024-04-26 02:12:04'),
(44, 6, 'A1T9A5T1L2NAN2', 'stellaroma@gmail.com', '', '2024-04-27 15:04:58'),
(45, 6, '96611ARLL2NAT1', 'santosliwayway12@gmail.com', '', '2024-04-27 16:07:40'),
(46, 6, '0915AR77TAMNA3', 'thomas@gmail.com', '', '2024-04-27 23:50:10');

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mobileno` varchar(50) NOT NULL,
  `is_verified` int(11) NOT NULL DEFAULT 0,
  `is_updated` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `createdAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `role_id`, `email`, `password`, `mobileno`, `is_verified`, `is_updated`, `status`, `createdAt`) VALUES
(1, 1, 'crislloyd.dalina06@gmail.com', 'ea40f00446f106d84e86ff28878f9ae7', '09876543218', 1, 1, 1, '2024-04-07 01:23:22'),
(36, 4, 'brgy@gmail.com', '6ca19de961a7dadd7ab63707d7cd2ccf', '09876543216', 1, 1, 1, '2024-04-13 03:28:21'),
(37, 5, 'triage@gmail.com', 'f233f588a6524c926eb1d698e105e12b', '09876543216', 1, 1, 1, '2024-04-13 03:28:30'),
(38, 2, 'doctor@gmail.com', 'bc787f3459d55553e42d8df8fe54349f', '09876543216', 1, 1, 1, '2024-04-28 15:29:47'),
(39, 5, 'crislloydy@gmail.com', '67aad6efcd569afc846775faffdb3508', '09876543212', 1, 1, 1, '2024-04-04 23:43:13'),
(40, 8, 'lyingin@gmail.com', 'ff7eeff489dca3219792014c61e362ae', '09872154365', 1, 1, 1, '2024-04-13 03:28:41'),
(41, 3, 'midwife@gmail.com', '8a7d123f56456de4749f7f3b746e04dd', '09876543454', 1, 1, 1, '2024-04-15 03:50:18'),
(42, 11, 'hospital@gmail.com', 'ef4f6e0fab54eb847f8e4d456a75b073', '09876543212', 1, 1, 1, '2024-04-05 11:03:28'),
(43, 10, 'lyingin2@gmail.com', 'c7e5d19175342db15ebe40b442c19831', '09876543212', 1, 1, 1, '2024-04-23 10:17:16'),
(44, 4, 'audreynicki.herrera@gmail.com', '9b72f63eeef7dfc66feb16011fd888a3', '09876543215', 1, 1, 1, '2024-03-25 16:28:15'),
(45, 5, 'jayron.borrinaga013@gmail.com', 'f5bb0c8de146c67b44babbf4e6584cc0', '09876543213', 1, 1, 1, '2024-03-25 16:25:32'),
(46, 9, 'johnkenneth.bitoon5@gmail.com', 'b9475e76bd18df33c6fec6ad1ac9a169', '09876543212', 1, 1, 1, '2024-04-24 00:00:27'),
(47, 8, 'ireneo.atenta211@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', '09328372828', 1, 1, 1, '2024-03-25 16:25:05'),
(48, 2, 'jellamie.manlangit0@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '09212883832', 1, 1, 1, '2024-03-25 16:25:18'),
(49, 3, 'markjaysonsiarot01@gmail.com', '52d456275a3bfca96a09b5ea3cc5de12', '09273722819', 1, 1, 1, '2024-03-25 16:27:18'),
(50, 5, 'jayron.borrinaga013@gmail.com', '9f612eca51b8cab2e8a830882ee55f0c', '09217728321', 1, 1, 1, '2024-03-25 16:23:59'),
(51, 7, 'cherryann.barcoma14@gmail.com', '81bd1fdc482925cc0e41bbb2295cd8b6', '09273277762', 1, 1, 1, '2024-04-05 13:10:24'),
(52, 7, 'marga.rotairo@gmail.com', 'f362ab1d08d4af5b3556536e1abba2c1', '09302228737', 1, 1, 1, '2024-03-26 17:18:28'),
(53, 7, 'marga.rotairo@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', '09302228737', 1, 1, 1, '2024-03-26 17:20:51'),
(54, 2, 'doctor2@gmail.com', 'd620370ea49d069ec1e4b3c5820e8d42', '09876543211', 1, 1, 1, '2024-04-28 15:33:10'),
(55, 3, 'midwife2@gmail.com', '8af18f6f8c6d65dd00e65665a99d2472', '09876543456', 1, 1, 1, '2024-04-28 16:54:10');

-- --------------------------------------------------------

--
-- Table structure for table `account_verification_code`
--

CREATE TABLE `account_verification_code` (
  `id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `code` varchar(30) NOT NULL,
  `createdAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `residents_id` int(11) NOT NULL,
  `street` varchar(150) NOT NULL,
  `facilities_id` int(11) NOT NULL,
  `city` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `residents_id`, `street`, `facilities_id`, `city`) VALUES
(1, 1, 'San Simon ', 51, 'Quezon City '),
(2, 2, 'Sta. Catalina', 51, 'Quezon City '),
(3, 3, 'Rose st.', 51, 'Quezon City'),
(4, 4, 'Rizal St', 51, 'Caloocan City'),
(5, 5, 'Bonifacio St', 51, 'Caloocan City '),
(6, 6, 'Aguinaldo St ', 51, 'Caloocan City '),
(7, 7, 'Quezon St', 51, 'Caloocan City '),
(8, 8, 'Canada St', 51, 'Quezon City '),
(9, 9, 'Del Pilar St', 51, 'Caloocan City '),
(10, 10, 'Japan St', 51, 'Quezon City '),
(11, 11, 'Holy St.', 51, 'Quezon City '),
(12, 12, 'unity st.', 51, 'Quezon City '),
(13, 13, 'mactan st.', 51, 'quezon city'),
(14, 14, 'maliit st ', 51, 'quezon city'),
(15, 15, 'pinagkaisa st.', 51, 'quezon city'),
(16, 16, 'andres st.', 51, 'quezon city'),
(17, 17, 'crab st.', 51, 'quezon city'),
(18, 18, 'galit st.', 51, 'quezon city'),
(19, 19, 'kalayaan st.', 51, 'quezon city'),
(20, 20, 'pagsanjan st.', 51, 'quezon city'),
(21, 21, 'sucat st.', 51, 'quezon city'),
(22, 22, 'bohol st', 51, 'quezon city'),
(23, 23, 'forest hill st.', 51, 'quezon city'),
(24, 24, 'freedom st.', 51, 'quezon city'),
(25, 25, 'kalayaan st.', 51, 'quezon city'),
(26, 26, 'lukban st.', 51, 'quezon city'),
(27, 27, 'latundan st.', 51, 'quezon city'),
(28, 28, 'senatorial st.', 51, 'quezon city'),
(29, 29, 'Mayon St.', 51, 'Quezon City'),
(30, 30, 'Wilson St.', 51, 'Quezon City'),
(31, 31, 'Maginhawa St.', 51, 'Qeuzon City'),
(32, 32, 'Filinvest St.', 51, 'Quezon City'),
(33, 33, 'Empire St.', 51, 'Quezon City'),
(34, 34, 'Payatas St.', 51, 'Quezon City'),
(35, 35, 'Balara St.', 51, 'Quezon City'),
(36, 36, 'Banahaw St.', 51, 'Quezon City'),
(37, 37, 'Campo Berde St.', 51, 'Quezon City'),
(38, 38, 'Recuerdo St.', 51, 'Quezon City'),
(39, 39, 'Bicol St.', 51, 'Quezon City'),
(40, 40, 'Batasan st.', 51, 'Quezon City'),
(41, 41, 'Bacolod St', 51, 'Quezon City'),
(42, 42, 'Anahaw st', 51, 'Quezon City'),
(43, 43, 'Acorda st', 51, 'Quezon City'),
(44, 44, 'Makiling st', 51, 'Quezon City'),
(45, 45, 'Sampaguita st', 51, 'Quezon City'),
(46, 46, 'Durian st', 51, 'Quezon City'),
(47, 47, 'Malaya st', 51, 'Quezon City'),
(48, 48, 'Sandakot', 51, 'Quezon City'),
(49, 49, 'Luzon St', 51, 'Quezon City '),
(50, 50, 'Maligaya St', 51, 'Quezon City'),
(51, 51, 'Winston St', 51, 'Quezon City'),
(52, 52, 'Marlboro St', 51, 'Quezon City'),
(53, 53, 'Avon St', 51, 'Quezon City'),
(54, 54, 'Auburn St', 51, 'Quezon City'),
(55, 55, 'Ames St', 51, 'Quezon City'),
(56, 56, 'Aspen St', 51, 'Quezon City'),
(57, 57, 'Bayani St', 51, 'Quezon City'),
(58, 58, 'Mapagmahal St', 51, 'Quezon City'),
(59, 59, 'Mabini St', 51, 'Quezon City'),
(60, 60, '2nd St', 51, 'Quezon City'),
(61, 61, 'Banal St', 51, 'Quezon City'),
(62, 62, '4th Street', 51, 'Quezon City'),
(63, 63, 'Bato Bato', 51, 'Quezon City'),
(64, 64, 'Balabac', 51, 'Quezon City'),
(65, 65, 'Bayaya', 51, 'Quezon City'),
(66, 66, 'Villonco', 51, 'Quezon City'),
(67, 67, 'West Road', 51, 'Quezon City'),
(68, 68, 'Wayan', 51, 'Quezon City'),
(69, 69, 'Bagtikan', 51, 'Quezon City'),
(70, 70, 'Aguinaldo Highway', 51, 'Cavite city'),
(71, 71, 'Emilio Aguinaldo Street', 51, 'Cavite city'),
(72, 72, 'Governor\'s Drive', 51, 'Cavite city'),
(73, 73, 'Molino Boulevard', 51, 'Cavite city'),
(74, 74, 'Gen. Trias Drive', 51, 'Cavite city'),
(75, 75, 'Tirona Highway', 51, 'Cavite city'),
(76, 76, 'Tejero Street', 51, 'Cavite city'),
(77, 77, 'Patindig Araw Street', 51, 'Cavite city'),
(78, 78, 'Arnaldo Highway', 51, 'Cavite city'),
(79, 79, 'Niog Street', 51, 'Cavite city'),
(80, 80, 'Katuparan St', 51, 'Quezon City'),
(81, 81, 'Kasunduan', 51, 'Quezon City'),
(82, 82, 'Katuparan St', 51, 'Quezon City'),
(83, 83, 'Pampanga St.', 51, 'Quezon City'),
(84, 84, 'Payatas ', 51, 'Quezon City'),
(85, 85, 'Batasan', 51, 'Quezon City'),
(86, 86, 'Guyabano St.', 51, 'Quezon City'),
(87, 87, 'Kapalaran', 51, 'Quezon City'),
(88, 88, 'California', 51, 'Quezon City'),
(89, 89, 'General Luis', 51, 'Quezon City'),
(90, 90, 'Acacia', 51, 'Quezon City'),
(91, 91, 'A. mabini', 51, 'Quezon City'),
(92, 92, 'Malac', 51, 'Quezon City'),
(93, 93, 'Marvex', 51, 'Quezon City'),
(94, 94, 'Camilla', 51, 'Quezon City'),
(95, 95, 'Kapalaran', 51, 'Quezon City'),
(96, 96, 'Aurora', 51, 'Quezon City'),
(97, 97, 'Bautista', 51, 'Quezon City'),
(98, 98, 'Ilang Ilang', 51, 'Quezon City'),
(99, 99, 'Tinaduan', 51, 'Quezon City'),
(100, 100, 'Leona', 51, 'Quezon City '),
(101, 101, 'Londe ', 51, 'Quezon City '),
(102, 102, 'Mabini', 51, 'Quezon City '),
(103, 103, 'Vectas', 51, 'Quezon City '),
(104, 104, 'Busan', 51, 'Quezon City '),
(105, 105, 'Costa ', 51, 'Quezon City ');

-- --------------------------------------------------------

--
-- Table structure for table `bed_slot`
--

CREATE TABLE `bed_slot` (
  `id` int(11) NOT NULL,
  `facilities_id` int(11) NOT NULL,
  `slots` varchar(30) NOT NULL,
  `slot_status` int(11) NOT NULL DEFAULT 1,
  `createdAt` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bed_slot`
--

INSERT INTO `bed_slot` (`id`, `facilities_id`, `slots`, `slot_status`, `createdAt`, `status`) VALUES
(1, 57, '1', 2, '2024-04-28 03:41:07', 1),
(2, 57, '2', 1, '2024-04-23 23:35:36', 1),
(3, 57, '3', 1, '2024-04-23 23:35:38', 1),
(4, 57, '4', 1, '2024-04-23 23:35:41', 1),
(5, 57, '5', 1, '2024-04-23 23:35:43', 1),
(6, 57, '6', 1, '2024-04-23 23:36:14', 1),
(7, 57, '7', 1, '2024-04-23 23:36:17', 1),
(8, 57, '8', 1, '2024-04-23 23:36:19', 1),
(9, 57, '9', 1, '2024-04-23 23:36:22', 1),
(10, 57, '10', 1, '2024-04-23 23:36:28', 1),
(11, 57, '11', 1, '2024-04-23 23:36:35', 1),
(12, 57, '12', 1, '2024-04-23 23:36:38', 1),
(13, 57, '13', 0, '2024-04-23 23:36:40', 1),
(14, 55, '1', 2, '2024-04-24 00:06:01', 1),
(15, 55, '2', 2, '2024-04-25 00:14:41', 1),
(16, 55, '3', 2, '2024-04-25 00:26:07', 1),
(17, 55, '4', 2, '2024-04-25 00:28:34', 1),
(18, 55, '5', 2, '2024-04-25 01:35:28', 1),
(19, 55, '6', 2, '2024-04-28 05:13:45', 1),
(20, 55, '7', 2, '2024-04-28 05:25:56', 1),
(21, 55, '8', 1, '2024-04-23 23:45:57', 1),
(22, 55, '9', 1, '2024-04-23 23:46:01', 1),
(23, 55, '10', 1, '2024-04-23 23:46:05', 1),
(24, 55, '11', 1, '2024-04-23 23:46:10', 1),
(25, 55, '12', 1, '2024-04-23 23:47:02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `chat_from` int(11) NOT NULL,
  `chat_to` int(11) NOT NULL,
  `createdAt` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_record`
--

CREATE TABLE `delivery_record` (
  `id` int(11) NOT NULL,
  `refer_patient_id` int(11) NOT NULL,
  `record` text NOT NULL,
  `diagnose` text NOT NULL,
  `attending_physicians` text NOT NULL,
  `md_order_1` text NOT NULL,
  `md_notes_1` text NOT NULL,
  `md_order_2` text NOT NULL,
  `md_notes_2` text NOT NULL,
  `createdAt` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `discharge_mother`
--

CREATE TABLE `discharge_mother` (
  `id` int(11) NOT NULL,
  `refer_patient_id` int(11) NOT NULL,
  `records` text NOT NULL,
  `physical_internal_examination` text NOT NULL,
  `followup_date` date NOT NULL,
  `followup_time` time NOT NULL,
  `other_findings` varchar(200) NOT NULL,
  `medications` varchar(200) NOT NULL,
  `final_discharge_diagnosis` varchar(200) NOT NULL,
  `examined_by` varchar(50) NOT NULL,
  `discharge_by` varchar(50) NOT NULL,
  `patient_sign` varchar(50) NOT NULL,
  `createdAt` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `discharge_newborn`
--

CREATE TABLE `discharge_newborn` (
  `id` int(11) NOT NULL,
  `discharge_mother_id` int(11) NOT NULL,
  `refer_patient_id` int(11) NOT NULL,
  `general_apperance` varchar(200) NOT NULL,
  `vital_signs` text NOT NULL,
  `pentinent_pe_findings` varchar(200) NOT NULL,
  `cord` text NOT NULL,
  `newborn_screening` text NOT NULL,
  `birth_certificate` varchar(200) NOT NULL,
  `medications` varchar(200) NOT NULL,
  `remarks` varchar(200) NOT NULL,
  `final_diagnosis` varchar(200) NOT NULL,
  `examined_by` varchar(50) NOT NULL,
  `discharge_by` varchar(50) NOT NULL,
  `createdAt` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `equipement_type`
--

CREATE TABLE `equipement_type` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `descriptions` varchar(250) NOT NULL,
  `createdAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `equipement_type`
--

INSERT INTO `equipement_type` (`id`, `name`, `descriptions`, `createdAt`) VALUES
(1, 'Emergency', 'For Emergency', '2024-02-03 10:16:29'),
(2, 'Non-Emergency', 'For Non-emergency', '2024-02-03 10:16:29');

-- --------------------------------------------------------

--
-- Table structure for table `equipments`
--

CREATE TABLE `equipments` (
  `id` int(11) NOT NULL,
  `facilities_id` int(11) NOT NULL,
  `equipment_type_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `descriptions` varchar(200) NOT NULL,
  `total_qty` varchar(50) NOT NULL,
  `available_qty` varchar(50) DEFAULT NULL,
  `used_qty` varchar(50) DEFAULT NULL,
  `usedAt` datetime DEFAULT NULL,
  `addAt` datetime DEFAULT NULL,
  `createdAt` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `equipments`
--

INSERT INTO `equipments` (`id`, `facilities_id`, `equipment_type_id`, `name`, `descriptions`, `total_qty`, `available_qty`, `used_qty`, `usedAt`, `addAt`, `createdAt`, `status`) VALUES
(44, 55, 1, 'E1', 'E1', '20', '16', '4', '2024-04-28 05:25:56', '0000-00-00 00:00:00', '2024-04-25 00:04:26', 1),
(45, 55, 1, 'E2', 'E2', '40', '36', '4', '2024-04-28 05:25:57', '0000-00-00 00:00:00', '2024-04-25 00:05:58', 1),
(46, 55, 2, 'EM1', 'EM1', '25', '24', '1', '2024-04-25 01:35:28', '0000-00-00 00:00:00', '2024-04-25 00:06:18', 1),
(47, 55, 2, 'EM2', 'EM2', '30', '29', '1', '2024-04-25 01:35:28', '0000-00-00 00:00:00', '2024-04-26 10:13:38', 0);

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `id` int(11) NOT NULL,
  `facility_type_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(150) NOT NULL,
  `address` varchar(200) NOT NULL,
  `image` text NOT NULL,
  `createdAt` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`id`, `facility_type_id`, `name`, `description`, `address`, `image`, `createdAt`, `status`) VALUES
(50, 4, 'Commonwealth', 'Brgy Descriptions', 'Barangay Commonwealth Barangay Hall', 'c0c7c76d30bd3dcaefc96f40275bdc0a.png', '2024-04-18 01:11:54', 1),
(51, 4, 'Holy Spirit', 'Brgy Descriptions', 'Holy Spirit Barangay Complex', '2838023a778dfaecdc212708f721b788.jpg', '2024-04-18 01:04:54', 1),
(52, 4, 'Batasan Hills', 'Brgy Descriptions', 'New Batasan Hills Barangay Hall', '9a1158154dfa42caddbd0694a4e9bdc8.jpg', '2024-04-18 01:04:35', 1),
(53, 2, 'Veterans Health Center', 'Health Center Descriptions', 'Veterans Health Center', 'd82c8d1619ad8176d665453cfb2e55f0.png', '2024-04-18 01:13:53', 1),
(54, 2, 'Commonwealth Health Center', 'Health Center Descriptions', 'Commonwealth Health Center', 'b446b7bf053394bdf43f5152b1c14892.png', '2024-03-23 02:35:28', 1),
(55, 3, 'East Avenue Medical Center', 'This is Hospital', 'East Avenue Medical Center', 'd755d95cc4fc895898c511dd2766f64f.png', '2024-03-23 02:45:32', 1),
(56, 3, 'Maclang General Hospital', 'This is Hospital', 'Maclang General Hospital', '9f61408e3afb633e50cdf1b20de6f466.png', '2024-04-18 01:16:25', 1),
(57, 5, 'NgC Lying-in Center', 'lyingin', 'NGC Lying-In Clinic', '', '2024-03-24 07:13:30', 1),
(58, 5, 'Betty Go Belmonte Lying-in', 'Betty Go Belmonte Lying-in', 'Betty Go Belmonte Super Health Center', '66f041e16a60928b05a7e228a89c3799.jpg', '2024-04-18 01:15:11', 1),
(59, 2, 'Bagong Silangan Super Health Center', 'Health Center Descriptions', 'Bagong Silangan Super Health Center', '093f65e080a295f8076b1c5722a46aa2.jpg', '2024-04-18 01:13:34', 1),
(60, 5, 'Bagong Silangan Lying-In Clinic', 'Health Center Descriptions', 'Bagong Silangan Lying-In Clinic', '05f8997d1a62a44b8f197a4cadfe726a.png', '2024-04-17 23:35:07', 1),
(61, 2, 'Batasan Hills Super Health Center', 'Health Center Descriptions', 'Batasan Hills Super Health Center', '4ba0ba15eaa2a423755f39f85fa3c1e1.jpg', '2024-04-18 00:10:25', 1),
(62, 4, 'Bagong Silangan', 'Brgy Descriptions', 'Bagong Silangan Barangay Hall', '44f683a84163b3523afe57c2e008bc8c.png', '2024-04-27 21:45:53', 1);

-- --------------------------------------------------------

--
-- Table structure for table `facility_list`
--

CREATE TABLE `facility_list` (
  `id` int(11) NOT NULL,
  `facility_type_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `createdAt` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `facility_list`
--

INSERT INTO `facility_list` (`id`, `facility_type_id`, `name`, `address`, `createdAt`, `status`) VALUES
(1, 4, 'Bagong Silangan', 'Bagong Silangan Barangay Hall', '2024-03-20 07:07:40', 1),
(2, 4, 'Batasan Hills', 'New Batasan Hills Barangay Hall', '2024-03-20 07:07:40', 1),
(3, 4, 'Commonwealth', 'Barangay Commonwealth Barangay Hall', '2024-03-20 07:15:29', 1),
(4, 4, 'Holy Spirit', 'Holy Spirit Barangay Complex', '2024-03-20 07:15:29', 1),
(5, 4, 'Payatas', 'Payatas Barangay Hall', '2024-03-20 07:17:07', 1),
(6, 2, 'Batasan Hills Super Health Center', 'Batasan Hills Super Health Center', '2024-03-20 13:30:45', 1),
(7, 2, 'Bagong Silangan Super Health Center', 'Bagong Silangan Super Health Center', '2024-03-20 13:30:45', 1),
(8, 2, 'Batasan Annex Health Center', 'Batasan Annex Health Center', '2024-03-20 13:30:45', 1),
(9, 2, 'Betty Go Belmonte Super Health Center', 'Betty Go Belmonte Super Health Center', '2024-03-20 13:30:45', 1),
(10, 2, 'Commonwealth Health Center', 'Commonwealth Health Center', '2024-03-20 13:30:45', 1),
(11, 2, 'Lupang Pangako Health Center', 'Lupang Pangako Health Center', '2024-03-20 13:30:45', 1),
(12, 2, 'NGC Super Health Center', 'NGC Lying-In Clinic', '2024-03-20 13:30:45', 1),
(13, 2, 'Veterans Health Center', 'Veterans Health Center', '2024-03-20 13:30:45', 1),
(14, 5, 'Bagong Silangan Lying-In Clinic', 'Bagong Silangan Lying-In Clinic', '2024-04-17 17:18:57', 1),
(15, 5, 'Batasan Hills Lying- In Clinic', 'Batasan Hills Lying- In Clinic', '2024-04-17 17:18:57', 1);

-- --------------------------------------------------------

--
-- Table structure for table `facility_type`
--

CREATE TABLE `facility_type` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `createdAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `facility_type`
--

INSERT INTO `facility_type` (`id`, `name`, `createdAt`) VALUES
(1, 'IT Health Department', '2023-12-29 12:21:37'),
(2, 'Health Center', '2023-12-29 12:21:37'),
(3, 'Hospital', '2023-12-29 12:22:39'),
(4, 'Barangay', '2023-12-29 12:22:39'),
(5, 'Lying-in', '2024-02-06 02:41:56');

-- --------------------------------------------------------

--
-- Table structure for table `forgot_password_tokens`
--

CREATE TABLE `forgot_password_tokens` (
  `id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `token` varchar(100) NOT NULL,
  `expiresAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `createdAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forgot_password_tokens`
--

INSERT INTO `forgot_password_tokens` (`id`, `account_id`, `token`, `expiresAt`, `createdAt`) VALUES
(3, 41, 'b82d232419e8a6904c35', '2024-04-14 19:53:10', '2024-04-15 03:48:10'),
(4, 43, 'dc58a743e6784a044b6e', '2024-04-22 18:23:12', '2024-04-23 02:18:12'),
(5, 43, '442e32083f922ebd0b85', '2024-04-23 02:20:29', '2024-04-23 10:15:29'),
(6, 46, '9f116f6be6713243d2d8', '2024-04-23 16:03:25', '2024-04-23 23:58:25'),
(7, 54, '64efbf14d0b2315e7cdc', '2024-04-28 07:36:47', '2024-04-28 15:31:47'),
(8, 55, 'bdca65f866bce7ad8443', '2024-04-28 08:58:20', '2024-04-28 16:53:20'),
(9, 55, 'c724c5cf6e928aae1be7', '2024-04-28 08:58:37', '2024-04-28 16:53:37'),
(10, 55, '1280b888174b9d1f1c59', '2024-04-28 08:58:41', '2024-04-28 16:53:41');

-- --------------------------------------------------------

--
-- Table structure for table `laboratory`
--

CREATE TABLE `laboratory` (
  `id` int(11) NOT NULL,
  `pre_registration_id` int(11) NOT NULL,
  `impression` varchar(100) NOT NULL,
  `reffered_by` varchar(100) NOT NULL,
  `lab_request` text NOT NULL,
  `followUp_visit` datetime NOT NULL,
  `createdAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laboratory`
--

INSERT INTO `laboratory` (`id`, `pre_registration_id`, `impression`, `reffered_by`, `lab_request`, `followUp_visit`, `createdAt`) VALUES
(28, 71, 'Good', 'Dr. Duke Dike Dunk', '{\"cbw\":\"CBW w/ Platelet\",\"pregtest\":\"Pregnancy Test\"}', '2024-04-25 21:12:00', '2024-04-25 21:13:46'),
(29, 72, 'test', 'Dr. Duke Dike Dunk', '{\"uricacid\":\"Uric Acid\",\"hdldtg\":\"HD/LD/TG\",\"pregtest\":\"Pregnancy Test\"}', '2024-04-26 00:43:00', '2024-04-26 00:43:50'),
(30, 73, 'Not good', 'Dr. Duke Dike Dunk', '{\"bt\":\"BT\",\"t3t4tsh\":\"T3/T4/TSH\",\"pregtest\":\"Pregnancy Test\"}', '2024-04-26 10:01:00', '2024-04-26 10:01:31'),
(31, 74, 'Test', 'Dr. Duke Dike Dunk', '{\"cbw\":\"CBW w/ Platelet\",\"pregtest\":\"Pregnancy Test\"}', '2024-04-27 15:26:00', '2024-04-27 15:27:07'),
(32, 75, 'good', 'Dr. Duke Dike Dunk', '{\"cbw\":\"CBW w/ Platelet\",\"pregtest\":\"Pregnancy Test\"}', '2024-04-27 20:51:00', '2024-04-27 20:51:29'),
(33, 76, 'vrfwef', 'Md. Mid Wife Md', '{\"cbw\":\"CBW w/ Platelet\",\"hdldtg\":\"HD/LD/TG\",\"pregtest\":\"Pregnancy Test\"}', '2024-04-27 23:44:00', '2024-04-27 23:44:57');

-- --------------------------------------------------------

--
-- Table structure for table `message_content`
--

CREATE TABLE `message_content` (
  `id` int(11) NOT NULL,
  `message_type_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `message_from` int(11) NOT NULL,
  `message_to` int(11) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message_content`
--

INSERT INTO `message_content` (`id`, `message_type_id`, `title`, `content`, `message_from`, `message_to`, `createdAt`, `status`) VALUES
(2, 1, 'Absent', '<p>List of Absent Patients: </p><p> 2. Kris Cres Cruz <strong>Address:</strong> San Juana Batasan Hills <strong>Schedule:</strong> Apr 25, 2024 at 2:16am</p><p> </p><p><br></p>', 38, 51, '2024-04-26 03:18:48', 1);

-- --------------------------------------------------------

--
-- Table structure for table `message_feedback`
--

CREATE TABLE `message_feedback` (
  `id` int(11) NOT NULL,
  `message_content_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `feedback` text NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message_feedback`
--

INSERT INTO `message_feedback` (`id`, `message_content_id`, `title`, `feedback`, `createdAt`, `status`) VALUES
(1, 2, 'Feedback', 'Okay Noted', '2024-04-26 04:20:07', 1),
(2, 2, 'Feedback', 'Good Good', '2024-04-26 04:20:37', 1),
(3, 2, 'Feedback', 'skjnfkwksnfkwef', '2024-04-28 15:17:20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `message_type`
--

CREATE TABLE `message_type` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message_type`
--

INSERT INTO `message_type` (`id`, `name`, `createdAt`) VALUES
(1, 'Absent Patient', '2024-03-09 14:33:29'),
(2, 'Announcement', '2024-03-09 14:33:29'),
(3, 'Other', '2024-03-09 14:33:52');

-- --------------------------------------------------------

--
-- Table structure for table `newborn_record`
--

CREATE TABLE `newborn_record` (
  `id` int(11) NOT NULL,
  `delivery_record_id` int(11) NOT NULL,
  `baby_info` text NOT NULL,
  `general_apperance` text NOT NULL,
  `apgar_score` text NOT NULL,
  `maturation_index` text NOT NULL,
  `routine_newborn_care` text NOT NULL,
  `initial_diagnosis` text NOT NULL,
  `abnormal_findings` text NOT NULL,
  `md_order` text NOT NULL,
  `md_notes` text NOT NULL,
  `createdAt` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `notification_type_id` int(11) NOT NULL,
  `notif_to` int(11) NOT NULL,
  `notif_from` int(11) NOT NULL,
  `content` varchar(200) NOT NULL,
  `createdAt` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `notification_type_id`, `notif_to`, `notif_from`, `content`, `createdAt`, `status`) VALUES
(1, 1, 38, 39, 'You have 1 new Patient/s!', '2024-04-26 05:06:18', 2),
(2, 1, 38, 39, 'You have 1 new Patient/s!', '2024-04-26 05:06:20', 2),
(3, 1, 38, 39, 'You have 1 new Patient/s!', '2024-04-26 05:06:54', 2),
(4, 1, 38, 39, 'You have 1 new Patient/s!', '2024-04-26 05:08:58', 2),
(5, 1, 38, 39, 'You have 1 new Patient/s!', '2024-04-26 05:09:00', 2),
(6, 1, 38, 39, 'You have 1 new Patient/s!', '2024-04-26 05:09:13', 2),
(7, 1, 38, 39, 'You have 1 new Patient/s!', '2024-04-28 00:31:50', 2),
(8, 1, 38, 39, 'You have 1 new Patient/s!', '2024-04-28 00:32:00', 2),
(9, 1, 38, 39, 'You have 1 new Patient/s!', '2024-04-28 00:32:02', 2),
(10, 2, 57, 38, 'Referral (Incoming Patient)', '2024-04-28 03:41:06', 2),
(11, 2, 55, 40, 'Referral (Incoming Patient)', '2024-04-28 05:13:44', 2),
(12, 2, 55, 40, 'Referral (Incoming Patient)', '2024-04-28 05:25:54', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notification_type`
--

CREATE TABLE `notification_type` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `createdAt` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification_type`
--

INSERT INTO `notification_type` (`id`, `name`, `createdAt`, `status`) VALUES
(1, 'New Patient', '2024-03-12 18:16:10', 1),
(2, 'Refer Patient', '2024-03-12 18:16:10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `online_registration`
--

CREATE TABLE `online_registration` (
  `id` int(11) NOT NULL,
  `facilities_id` int(11) NOT NULL,
  `confirmation_code` varchar(30) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `birthdate` date NOT NULL,
  `age` int(11) NOT NULL,
  `civilStatus` varchar(50) NOT NULL,
  `occupation` varchar(50) NOT NULL,
  `street` varchar(150) NOT NULL,
  `brgy` varchar(100) NOT NULL,
  `mobileno` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `reason` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `visit_date` date NOT NULL,
  `createdAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `online_registration`
--

INSERT INTO `online_registration` (`id`, `facilities_id`, `confirmation_code`, `firstname`, `middlename`, `lastname`, `birthdate`, `age`, `civilStatus`, `occupation`, `street`, `brgy`, `mobileno`, `email`, `reason`, `status`, `visit_date`, `createdAt`) VALUES
(15, 53, '6301', 'Sia', 'Sue', 'Cruz', '2024-04-04', 22, 'Single', 'Student', 'San Juan', 'Holy Spirit', '09216548677', 'crislloydy@gmail.com', 'Check me Up!', 1, '2024-04-08', '2024-04-04 23:38:02'),
(16, 53, '1702', 'Kris', 'Cres', 'Cruz', '2024-04-05', 22, 'Married', 'House Wife', 'San Juana', 'Batasan Hills', '09216548677', 'crislloyd.dalina378@gmail.com', 'pregpregpregpregpregpregpregpregpregpregpregpregpregpregpregpregpregpregpregpregpregpregpregpregpregpregpregpregpregpregpregpregpregpregpregpregpregpregpregpregpregpregpreg', 1, '2024-04-15', '2024-04-05 05:00:00'),
(17, 53, '0717', 'Juanitota', 'Cres', 'Crukz', '2024-04-15', 1, 'Married', 'House Wife', 'Sa Miquel', 'Commonwealth', '09876543211', 'test@gmail.com', 'cmu', 1, '2024-04-15', '2024-04-05 05:05:25');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `pre_registration_id` int(11) NOT NULL,
  `patient_type_id` int(11) NOT NULL,
  `access_code_id` int(11) NOT NULL,
  `followUp_checkUp` date NOT NULL,
  `time` time NOT NULL,
  `visits` varchar(50) NOT NULL,
  `checkUpStatus` int(11) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `pre_registration_id`, `patient_type_id`, `access_code_id`, `followUp_checkUp`, `time`, `visits`, `checkUpStatus`, `createdAt`, `status`) VALUES
(2, 72, 4, 43, '2024-04-25', '02:16:00', '1st Visit', 1, '2024-04-27 19:41:06', 2),
(3, 72, 1, 43, '2024-04-26', '05:38:00', '2nd Visit', 1, '2024-04-27 19:41:06', 2),
(4, 72, 1, 43, '2024-04-26', '05:42:00', '3rd Visit', 0, '2024-04-27 19:41:06', 2),
(5, 73, 4, 44, '2024-05-01', '20:59:00', '1st Visit', 1, '2024-04-27 07:52:01', 1),
(6, 73, 1, 44, '2024-04-27', '08:00:00', '2nd Visit', 1, '2024-04-28 08:26:59', 1),
(7, 74, 4, 45, '2024-04-27', '16:13:00', '1st Visit', 1, '2024-04-28 08:10:57', 1),
(8, 76, 4, 46, '2024-04-28', '23:54:00', '1st Visit', 0, '2024-04-28 07:48:53', 1),
(9, 74, 1, 45, '2024-04-28', '04:10:00', '2nd Visit', 1, '2024-04-28 08:25:41', 1),
(10, 74, 1, 45, '2024-04-29', '16:30:00', '3rd Visit', 0, '2024-04-28 08:25:41', 1),
(11, 73, 1, 44, '2024-04-28', '16:32:00', '3rd Visit', 1, '2024-04-28 08:27:57', 1),
(12, 73, 1, 44, '2024-04-28', '16:33:00', '4th Visit', 0, '2024-04-28 08:27:56', 1);

-- --------------------------------------------------------

--
-- Table structure for table `patients_completed`
--

CREATE TABLE `patients_completed` (
  `id` int(11) NOT NULL,
  `patients_id` int(11) NOT NULL,
  `createdAt` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `patients_itr`
--

CREATE TABLE `patients_itr` (
  `id` int(11) NOT NULL,
  `patients_id` int(11) NOT NULL,
  `doctor_order` text NOT NULL,
  `husband_data` varchar(250) NOT NULL,
  `notes` text NOT NULL,
  `medical_history` text NOT NULL,
  `personal_social_history` text NOT NULL,
  `laboratory_exam` text NOT NULL,
  `dental_record` text NOT NULL,
  `counseling` text NOT NULL,
  `createdAt` datetime NOT NULL,
  `checkup_by` int(11) NOT NULL DEFAULT 0,
  `edited_by` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patients_itr`
--

INSERT INTO `patients_itr` (`id`, `patients_id`, `doctor_order`, `husband_data`, `notes`, `medical_history`, `personal_social_history`, `laboratory_exam`, `dental_record`, `counseling`, `createdAt`, `checkup_by`, `edited_by`, `status`) VALUES
(43, 2, 'Test lang po sir...   uhuhuhuhuhuhuhuhuhuhuhuhuhuhuhuhTest lang po sir...   uhuhuhuhuhuhuhuhuhuhuhuhuhuhuhuhTest lang po sir...   uhuhuhuhuhuhuhuhuhuhuhuhuhuhuhuhTest lang po sir...   uhuhuhuhuhuhuhuhuhuhuhuhuhuhuhuhTest lang po sir...   uhuhuhuhuhuhuhuhuhuhuhuhuhuhuhuhTest lang po sir...   uhuhuhuhuhuhuhuhuhuhuhuhuhuhuhuhTest lang po sir...   uhuhuhuhuhuhuhuhuhuhuhuhuhuhuhuhTest lang po sir...   uhuhuhuhuhuhuhuhuhuhuhuhuhuhuhuhTest lang po sir...   uhuhuhuhuhuhuhuhuhuhuhuhuhuhuhuhTest lang po sir...   uhuhuhuhuhuhuhuhuhuhuhuhuhuhuhuhTest lang po sir...   uhuhuhuhuhuhuhuhuhuhuhuhuhuhuhuhTest lang po sir...   uhuhuhuhuhuhuhuhuhuhuhuhuhuhuhuhTest lang po sir...   uhuhuhuhuhuhuhuhuhuhuhuhuhuhuhuhTest lang po sir...   uhuhuhuhuhuhuhuhuhuhuhuhuhuhuhuhTest lang po sir...   uhuhuhuhuhuhuhuhuhuhuhuhuhuhuhuhTest lang po sir...   uhuhuhuhuhuhuhuhuhuhuhuhuhuhuhuhTest lang po sir...   uhuhuhuhuhuhuhuhuhuhuhuhuhuhuhuhTest lang po sir...   uhuhuhuhuhuhuhuhuhuhuhuhuhuhuhuhTest lang po sir...   uhuhuhuhuhuhuhuhuhuhuhuhuhuhuhuhTest lang po sir...   uhuhuhuhuhuhuhuhuhuhuhuhuhuhuhuh', '{\"hname\":\"Pepito biksita\",\"hage\":\"23\",\"hoccu\":\"Sk Chairman\"}', '{\"Menarche\":\"fe\",\"Interval\":\"ef\",\"Duration\":\"ewf\",\"G\":\"ef\",\"P\":\"ewf\",\"oth\":\"\",\"LMP\":\"2024-04-26\",\"EDC\":\"2024-04-27\",\"AOG\":\"efwfef\",\"WT\":\"45 kg.\",\"HT\":\"145 cm.\",\"Temp\":\"22\",\"BP\":\"120/100\",\"Nutritional_status\":\"fe\",\"Td_Immunization\":\"ewf\",\"datedose\":\"2024-04-26\",\"ftmethod\":\"ewf\",\"fundicHt\":\"150cm.\",\"L1\":\"fef\",\"L2\":\"ef\",\"L3\":\"efe\",\"L4\":\"fe\",\"fht\":\"fewfew\"}', '{\"medical_history_Hypertension\":\"Hypertension\",\"medical_history_Tubercolosis\":\"Tubercolosis\",\"medical_history_Allergy\":\"Allergy\",\"medical_history_heart_disease\":\"Heart Disease\",\"Others\":\"csc\"}', '{\"personal_social_history_smoke\":\"Smoking\",\"personal_social_history_alcohol\":\"Dringking Alcohol\"}', '{\"lab_type\":\"Pregnancy Test\",\"labdate\":\"Apr. 26, 2024 , 12:43 am\",\"result\":\"test\",\"result_img\":[\"50579798.jpg\",\"Capture.PNG\",\"wallpaper.jpg\"]}', '{\"Dental_18\":\"18\",\"Dental_16\":\"16\",\"Dental_11\":\"11\",\"Dental_25\":\"25\",\"Dental_27\":\"27\",\"Dental_48\":\"48\",\"Dental_46\":\"46\",\"Dental_45\":\"45\",\"Dental_44\":\"44\",\"Dental_41\":\"41\",\"Dental_36\":\"36\"}', '{\"counseling_fplan\":\"Family Planning\",\"counseling_bfeeding\":\"Breastfeeding\",\"Others\":\"csd123\"}', '2024-04-27 14:51:27', 38, 38, 1),
(44, 5, 'dgeg', '{\"hname\":\"General Hospital\",\"hage\":\"25\",\"hoccu\":\"Sk Chairman\"}', '{\"Menarche\":\"gegr\",\"Interval\":\"reg\",\"Duration\":\"reggr\",\"G\":\"rg\",\"P\":\"ge\",\"LMP\":\"2024-04-27\",\"EDC\":\"\",\"AOG\":\"gerg\",\"WT\":\"23 kg.\",\"HT\":\"123 cm.\",\"Temp\":\"20\",\"BP\":\"20/100\",\"Nutritional_status\":\"erg\",\"Td_Immunization\":\"ger\",\"datedose\":\"2024-04-27\",\"ftmethod\":\"er\",\"fundicHt\":\"greg\",\"L1\":\"gergerg\",\"L2\":\"erger\",\"L3\":\"gerg\",\"L4\":\"regr\",\"fht\":\"greg\"}', '{\"medical_history_Hypertension\":\"Hypertension\",\"medical_history_Tubercolosis\":\"Tubercolosis\",\"medical_history_Allergy\":\"Allergy\",\"medical_history_goiter\":\"Goiter\",\"Others\":\"test\"}', '{\"personal_social_history_smoke\":\"Smoking\",\"personal_social_history_alcohol\":\"Dringking Alcohol\"}', '{\"lab_type\":\"Pregnancy Test\",\"labdate\":\"Apr. 26, 2024 , 10:01 am\",\"result\":\"test\",\"result_img\":[\"commu.png\",\"dark-logo.svg\",\"insurance.png\",\"pregy.png\"]}', '{\"Dental_18\":\"18\",\"Dental_17\":\"17\",\"Dental_16\":\"16\",\"Dental_42\":\"42\",\"Dental_34\":\"34\",\"Dental_35\":\"35\",\"Dental_36\":\"36\"}', '{\"counseling_fplan\":\"Family Planning\",\"counseling_bfeeding\":\"Breastfeeding\",\"Others\":\"test\"}', '2024-04-27 15:04:59', 38, 0, 1),
(45, 7, 'updateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUp', '{\"hname\":\"Pepito biksita\",\"hage\":\"32\",\"hoccu\":\"driver\"}', '{\"Menarche\":\"11\",\"Interval\":\"123\",\"Duration\":\"43\",\"G\":\"G1\",\"P\":\"P1\",\"oth\":\"\",\"LMP\":\"2024-04-27\",\"EDC\":\"2024-04-28\",\"AOG\":\"160 days\",\"WT\":\"123 kg.\",\"HT\":\"123 cm.\",\"Temp\":\"26\",\"BP\":\"20/100\",\"Nutritional_status\":\"Healthy \",\"Td_Immunization\":\"test\",\"datedose\":\"2024-04-27\",\"ftmethod\":\"Family Planning\",\"fundicHt\":\"150cm.\",\"L1\":\"L11\",\"L2\":\"L12\",\"L3\":\"L13\",\"L4\":\"L14\",\"fht\":\"100/160\"}', '{\"medical_history_Hypertension\":\"Hypertension\",\"medical_history_bleeding\":\"Bleeding Disorder\"}', '{\"personal_social_history_smoke\":\"Smoking\"}', '{\"lab_type\":\"Pregnancy Test\",\"labdate\":\"Apr. 27, 2024 , 03:27 pm\",\"result\":\"Testing lang...\",\"result_img\":[\"qcu.png\",\"quezoncity.png\"]}', '{\"Dental_18\":\"18\",\"Dental_17\":\"17\",\"Dental_36\":\"36\",\"Dental_37\":\"37\"}', '{\"counseling_fplan\":\"Family Planning\",\"counseling_bfeeding\":\"Breastfeeding\",\"Others\":\"hello\"}', '2024-04-27 21:58:31', 38, 38, 1),
(46, 8, 'The old way set just one configuration key, which combined the server address and your token. This new way sets two different configuration keys: one for the server address and a second for your token. If you’re currently doing it the old way, please update your configuration to this new way. Make sure that you remove any yarn.lock or package-lock.json file prior to installing again as these files will have the old unsupported URLs in them.', '{\"hname\":\"Pepito biksita\",\"hage\":\"22\",\"hoccu\":\"Sk Chairman\"}', '{\"Menarche\":\"fwef\",\"Interval\":\"few\",\"Duration\":\"fwef\",\"G\":\"fwe\",\"P\":\"weff\",\"oth\":\"\",\"LMP\":\"2024-04-27\",\"EDC\":\"2024-04-27\",\"AOG\":\"aefwe\",\"WT\":\"79 kg.\",\"HT\":\"190 cm.\",\"Temp\":\"20\",\"BP\":\"20/100\",\"Nutritional_status\":\"ewf\",\"Td_Immunization\":\"ewf\",\"datedose\":\"2024-04-27\",\"ftmethod\":\"ewf\",\"fundicHt\":\"fewf\",\"L1\":\"fewf\",\"L2\":\"ewf\",\"L3\":\"wef\",\"L4\":\"ewf\",\"fht\":\"wef\"}', '{\"medical_history_Hypertension\":\"Hypertension\",\"medical_history_bleeding\":\"Bleeding Disorder\"}', '{\"personal_social_history_smoke\":\"Smoking\"}', '{\"lab_type\":\"Pregnancy Test\",\"labdate\":\"Apr. 27, 2024 , 11:44 pm\",\"result\":\"ceafwefs\",\"result_img\":[\"fav.png\",\"pregy.png\",\"midwife.png\"]}', '{\"Dental_18\":\"18\",\"Dental_37\":\"37\"}', '{\"counseling_fplan\":\"Family Planning\",\"counseling_hiv\":\"HIV/AIDS\",\"Others\":\"fewf\"}', '2024-04-28 15:48:53', 41, 41, 1);

-- --------------------------------------------------------

--
-- Table structure for table `patient_natal`
--

CREATE TABLE `patient_natal` (
  `id` int(11) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `patient_postnatal`
--

CREATE TABLE `patient_postnatal` (
  `id` int(11) NOT NULL,
  `patients_id` int(11) NOT NULL,
  `patient_info` text NOT NULL,
  `dr_order` varchar(250) NOT NULL,
  `notes` text NOT NULL,
  `advice_counsel` text NOT NULL,
  `advice_counsel_postpartum_dsign` text NOT NULL,
  `createdAt` datetime NOT NULL,
  `checkup_by` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `patient_postpartum`
--

CREATE TABLE `patient_postpartum` (
  `id` int(11) NOT NULL,
  `newborn_record_id` int(11) NOT NULL,
  `patients_id` int(11) NOT NULL,
  `baby_info` text NOT NULL,
  `parents_info` text NOT NULL,
  `patients_records` text NOT NULL,
  `createdAt` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `patient_prenatal`
--

CREATE TABLE `patient_prenatal` (
  `id` int(11) NOT NULL,
  `patients_id` int(11) NOT NULL,
  `dr_order` text NOT NULL,
  `patient_other` text NOT NULL,
  `midwives_notes` text NOT NULL,
  `ob_hx` text NOT NULL,
  `medical_history` text NOT NULL,
  `family_medical_history` text NOT NULL,
  `personal_social_history` text NOT NULL,
  `dental_record` text NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `checkup_by` int(11) NOT NULL,
  `edited_by` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_prenatal`
--

INSERT INTO `patient_prenatal` (`id`, `patients_id`, `dr_order`, `patient_other`, `midwives_notes`, `ob_hx`, `medical_history`, `family_medical_history`, `personal_social_history`, `dental_record`, `createdAt`, `checkup_by`, `edited_by`, `status`) VALUES
(30, 3, '- Test lang po sir...', '{\"marriage\":\"\",\"patphno\":\"\",\"patref\":\"\"}', '{\"Menarche\":\"fe\",\"Itnerval\":\"ef\",\"Duration\":\"ewf\",\"G\":\"ef\",\"P\":\"ewf\",\"LMP\":\"Apr 26, 2024\",\"EDC\":\"Apr 27, 2024\",\"AOG\":\"efwfef\",\"TD_Status\":\"\",\"TD_Given\":\"\",\"FT_Method\":\"\",\"WT\":\"45 kg.\",\"HT\":\"145 cm.\",\"Nutritional_Status\":\"fe\",\"BP\":\"120/100\",\"PR\":\"\",\"Temp\":\"22\",\"L1\":\"ef\",\"Right\":\"\",\"Left\":\"\",\"L3\":\"efe\",\"L4\":\"fe\",\"Presentation\":\"\",\"FH\":\"\",\"FHT\":\"fewfew\",\"fesopen\":\"\",\"calcar\":\"\"}', '{\"G1_y\":\"\",\"G1_td\":\"\",\"G1_sex\":\"\",\"G1_wt\":\"\",\"G1_by\":\"\",\"G2_y\":\"\",\"G2_td\":\"\",\"G2_sex\":\"\",\"G2_wt\":\"\",\"G2_by\":\"\",\"G3_y\":\"\",\"G3_td\":\"\",\"G3_sex\":\"\",\"G3_wt\":\"\",\"G3_by\":\"\",\"G4_y\":\"\",\"G4_td\":\"\",\"G4_sex\":\"\",\"G4_wt\":\"\",\"G4_by\":\"\"}', '{\"medical_history_hypertension\":\"Hypertension\",\"medical_history_TB\":\"Tubercolosis\",\"medical_history_allergy\":\"Allergy\",\"medical_history_heart_disease\":\"Heart Disease\"}', '{}', '{\"personal_social_history_smoking\":\"Smoking\",\"personal_social_history_drinking\":\"Dringking Alcohol\"}', '{\"Dental_18\":\"18\",\"Dental_16\":\"16\",\"Dental_11\":\"11\",\"Dental_25\":\"25\",\"Dental_27\":\"27\",\"Dental_48\":\"48\",\"Dental_46\":\"46\",\"Dental_45\":\"45\",\"Dental_44\":\"44\",\"Dental_41\":\"41\",\"Dental_36\":\"36\"}', '2024-04-25 21:36:48', 38, 0, 1),
(31, 4, 'prenatalDataprenatalDataprenatalDataprenatalDataprenatalDataprenatalDataprenatalDataprenatalDataprenatalDataprenatalDataprenatalDataprenatalDataprenatalDataprenatalDataprenatalDataprenatalDataprenatalDataprenatalDataprenatalDataprenatalDataprenatalDataprenatalDataprenatalDataprenatalDataprenatalDataprenatalDataprenatalDataprenatalDataprenatalDataprenatalDataprenatalDataprenatalDataprenatalDataprenatalDataprenatalDataprenatalDataprenatalDataprenatalDataprenatalDataprenatalDataprenatalDataprenatalDataprenatalDataprenatalDataprenatalDataprenatalDataprenatalDataprenatalDataprenatalDataprenatalDataprenatalDataprenatalDataprenatalDataprenatalDataprenatalDataprenatalDataprenatalDataprenatalDataprenatalDataprenatalDataprenatalDataprenatalDataprenatalData', '', '', '', '', '', '', '', '2024-04-27 15:15:27', 38, 38, 1),
(32, 6, 'dgeg\n\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\n\n', '{\"marriage\":\"123 Quezon City, Philippines\",\"patphno\":\"12-345678901-2\",\"patref\":\"Dr. Jose P. Rizal\"}', '{\"Menarche\":\"gegr\",\"Itnerval\":\"reg\",\"Duration\":\"reggr\",\"G\":\"rg\",\"P\":\"ge\",\"Oth\":\"tes\",\"LMP\":\"2024-04-27\",\"EDC\":\"2024-04-28\",\"AOG\":\"gerg\",\"TD_Status\":\"tes\",\"TD_Given\":\"2024-04-27\",\"FT_Method\":\"tes\",\"WT\":\"23 kg.\",\"HT\":\"123 cm.\",\"Nutritional_Status\":\"erg\",\"BP\":\"20/100\",\"PR\":\"tes\",\"RR\":\"234\",\"Temp\":\"20\",\"L1\":\"erger\",\"L2\":\"L12\",\"Right\":\"tes\",\"Left\":\"tes\",\"L3\":\"gerg\",\"L4\":\"regr\",\"Presentation\":\"tes\",\"FH\":\"tes\",\"FHT\":\"greg\",\"fesopen\":\"tes\",\"calcar\":\"tes\"}', '{\"G1_y\":\"2021\",\"G1_td\":\"normal\",\"G1_sex\":\"female\",\"G1_wt\":\"4\",\"G1_by\":\"me\",\"G2_y\":\"2020\",\"G2_td\":\"normal\",\"G2_sex\":\"male\",\"G2_wt\":\"3\",\"G2_by\":\"you\",\"G3_y\":\"\",\"G3_td\":\"\",\"G3_sex\":\"\",\"G3_wt\":\"\",\"G3_by\":\"\",\"G4_y\":\"\",\"G4_td\":\"\",\"G4_sex\":\"\",\"G4_wt\":\"\",\"G4_by\":\"\"}', '{\"medical_history_hypertension\":\"Hypertension\",\"medical_history_TB\":\"Tubercolosis\",\"medical_history_allergy\":\"Allergy\",\"medical_history_goiter\":\"Goiter\"}', '{\"family_medical_history_hypertensionmh\":\"HypertensionMH\",\"family_medical_history_TBmh\":\"TubercolosisMh\"}', '{\"personal_social_history_smoking\":\"Smoking\",\"personal_social_history_drinking\":\"Dringking Alcohol\"}', '{\"Dental_18\":\"18\",\"Dental_17\":\"17\",\"Dental_16\":\"16\",\"Dental_42\":\"42\",\"Dental_34\":\"34\",\"Dental_35\":\"35\",\"Dental_36\":\"36\"}', '2024-04-27 11:05:47', 38, 38, 1),
(33, 9, 'updateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUp', '{\"marriage\":\"sfse\",\"patphno\":\"00-000000000-9\",\"patref\":\"ef\"}', '{\"Menarche\":\"11\",\"Itnerval\":\"123\",\"Duration\":\"43\",\"G\":\"G1\",\"P\":\"P1\",\"Oth\":\"\",\"LMP\":\"2024-04-27\",\"EDC\":\"2024-04-28\",\"AOG\":\"160 days\",\"TD_Status\":\"vsf\",\"TD_Given\":\"2024-04-28\",\"FT_Method\":\"fef\",\"WT\":\"123 kg.\",\"HT\":\"123 cm.\",\"Nutritional_Status\":\"Healthy \",\"BP\":\"20/100\",\"PR\":\"fe\",\"RR\":\"fef\",\"Temp\":\"26\",\"L1\":\"L11\",\"L2\":\"L12\",\"Right\":\"f\",\"Left\":\"few\",\"L3\":\"L13\",\"L4\":\"L14\",\"Presentation\":\"fef\",\"FH\":\"ef\",\"FHT\":\"100/160\",\"fesopen\":\"eff\",\"calcar\":\"ef\"}', '{\"G1_y\":\"2020\",\"G1_td\":\"Normal\",\"G1_sex\":\"Female\",\"G1_wt\":\"3\",\"G1_by\":\"Dr. Jose Rizal\",\"G2_y\":\"2022\",\"G2_td\":\"Normal\",\"G2_sex\":\"Male\",\"G2_wt\":\"2\",\"G2_by\":\"Dr. Jose Rizal\",\"G3_y\":\"\",\"G3_td\":\"\",\"G3_sex\":\"\",\"G3_wt\":\"\",\"G3_by\":\"\",\"G4_y\":\"\",\"G4_td\":\"\",\"G4_sex\":\"\",\"G4_wt\":\"\",\"G4_by\":\"\"}', '{\"medical_history_hypertension\":\"Hypertension\",\"medical_history_bleeding\":\"Bleeding Disorder\"}', '{\"family_medical_history_hypertensionmh\":\"HypertensionMH\",\"family_medical_history_diabetesmh\":\"DiabetesMH\"}', '{\"personal_social_history_smoking\":\"Smoking\"}', '{\"Dental_18\":\"18\",\"Dental_17\":\"17\",\"Dental_36\":\"36\",\"Dental_37\":\"37\"}', '2024-04-28 08:13:24', 41, 38, 1),
(34, 10, 'updateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUp', '', '', '', '', '', '', '', '2024-04-28 08:25:41', 41, 0, 1),
(35, 11, 'updateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUpupdateFollowUpCheckUp', '', '', '', '', '', '', '', '2024-04-28 08:26:59', 38, 0, 1),
(36, 12, 'prenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatalprenatal', '', '', '', '', '', '', '', '2024-04-28 08:27:57', 41, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `patient_type`
--

CREATE TABLE `patient_type` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_type`
--

INSERT INTO `patient_type` (`id`, `name`, `createdAt`) VALUES
(1, 'Prenatal', '2024-01-14 05:02:09'),
(2, 'Natal', '2024-01-14 05:02:09'),
(3, 'Postnatal', '2024-01-14 05:03:38'),
(4, '1st Check Up ITR', '2024-02-15 12:02:16');

-- --------------------------------------------------------

--
-- Table structure for table `pre_registration`
--

CREATE TABLE `pre_registration` (
  `id` int(11) NOT NULL,
  `residents_id` int(11) NOT NULL,
  `system_users_id` int(11) NOT NULL,
  `registration_type_id` int(11) NOT NULL,
  `online_registration_id` int(11) NOT NULL DEFAULT 0,
  `weight` int(10) NOT NULL,
  `height` int(10) NOT NULL,
  `temp` varchar(20) NOT NULL,
  `bp` varchar(20) NOT NULL,
  `createdAt` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `checkUpStatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pre_registration`
--

INSERT INTO `pre_registration` (`id`, `residents_id`, `system_users_id`, `registration_type_id`, `online_registration_id`, `weight`, `height`, `temp`, `bp`, `createdAt`, `status`, `checkUpStatus`) VALUES
(71, 0, 38, 1, 15, 12, 112, '26', '20/100', '2024-04-25 21:39:40', 2, 1),
(72, 0, 38, 1, 16, 45, 145, '22', '120/100', '2024-04-26 02:12:04', 2, 1),
(73, 11, 38, 2, 0, 23, 123, '20', '20/100', '2024-04-27 15:04:59', 2, 1),
(74, 20, 38, 2, 0, 123, 123, '26', '20/100', '2024-04-27 16:07:40', 2, 1),
(75, 104, 38, 2, 0, 79, 190, '20', '20/100', '2024-04-14 01:28:23', 1, 0),
(76, 2, 38, 2, 0, 79, 190, '20', '20/100', '2024-04-27 23:50:10', 2, 1),
(77, 23, 38, 2, 0, 79, 190, '20', '20/100', '2024-04-14 01:54:12', 1, 0),
(78, 3, 38, 2, 0, 79, 190, '20', '20/100', '2024-04-14 01:56:58', 1, 0),
(79, 18, 38, 2, 0, 79, 190, '20', '20/100', '2024-04-14 02:30:55', 1, 0),
(80, 1, 38, 2, 0, 79, 190, '20', '20/100', '2024-04-14 02:56:22', 1, 0),
(81, 62, 38, 2, 0, 79, 190, '20', '20/100', '2024-04-14 02:57:39', 1, 0),
(82, 81, 38, 2, 0, 79, 190, '20', '20/100', '2024-04-14 03:58:28', 1, 0),
(83, 48, 38, 2, 0, 27, 127, '36', '120/400', '2024-04-14 04:01:53', 1, 0),
(84, 27, 38, 2, 0, 27, 127, '36', '120/400', '2024-04-23 00:28:48', 1, 0),
(85, 36, 38, 2, 0, 27, 127, '36', '120/400', '2024-04-25 20:47:44', 1, 0),
(86, 26, 38, 2, 0, 27, 127, '36', '120/400', '2024-04-25 16:49:38', 1, 0),
(87, 5, 38, 2, 0, 27, 127, '36', '120/400', '2024-04-15 09:53:26', 1, 0),
(88, 4, 38, 2, 0, 0, 0, '', '', '2024-04-26 05:06:18', 1, 0),
(89, 4, 38, 2, 0, 0, 0, '', '', '2024-04-26 05:06:20', 1, 0),
(90, 6, 38, 2, 0, 0, 0, '', '', '2024-04-26 05:06:54', 1, 0),
(91, 0, 38, 1, 16, 23, 23, '23', '120/100', '2024-04-26 05:08:58', 1, 0),
(92, 0, 38, 1, 16, 23, 23, '23', '120/100', '2024-04-26 05:09:00', 1, 0),
(93, 6, 38, 2, 0, 0, 0, '', '', '2024-04-26 05:09:13', 1, 0),
(94, 5, 38, 2, 0, 23, 23, '26', '20/100', '2024-04-28 00:31:50', 1, 0),
(95, 5, 38, 2, 0, 23, 23, '26', '20/100', '2024-04-28 00:32:00', 1, 0),
(96, 5, 38, 2, 0, 23, 23, '26', '20/100', '2024-04-28 00:32:02', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `referral_feedback`
--

CREATE TABLE `referral_feedback` (
  `id` int(11) NOT NULL,
  `refer_patient_id` int(11) NOT NULL,
  `feedback_to` int(11) NOT NULL,
  `patient_info` text NOT NULL,
  `outcome` text NOT NULL,
  `final_diagnos` varchar(250) NOT NULL,
  `recommendation` varchar(250) NOT NULL,
  `createdAt` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `referral_status`
--

CREATE TABLE `referral_status` (
  `id` int(11) NOT NULL,
  `refer_patient_id` int(11) NOT NULL,
  `Report` varchar(50) DEFAULT NULL,
  `createdAt` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `refer_patient`
--

CREATE TABLE `refer_patient` (
  `id` int(11) NOT NULL,
  `patients_id` int(11) NOT NULL,
  `refer_from` int(11) NOT NULL,
  `refer_to` int(11) NOT NULL,
  `referral_details` text NOT NULL,
  `danger_sign` text NOT NULL,
  `createdAt` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `refer_patient`
--

INSERT INTO `refer_patient` (`id`, `patients_id`, `refer_from`, `refer_to`, `referral_details`, `danger_sign`, `createdAt`, `status`) VALUES
(1, 72, 53, 57, '{\"Date/TimeReferral\":\"2024-04-28T03:39\",\"ReferralNumber\":\"39356885\",\"ContactNo.\":\"09876543212\",\"Address\":\"Veterans Health Center\",\"PatientName\":\"Kris Cres Cruz\",\"PatientAge\":\"22\",\"PatientAddress\":\"San Juana Batasan Hills \",\"PatientContactPerson\":\"Pepito biksita\",\"PatientContactNo.\":\"09216548677\",\"ObScore\":\"34\",\"GestationalAge\":\"12\",\"Where\":\"here\",\"BriefHistory\":\"Test\",\"PEFindings\":\"Test\",\"BP\":\"120/160\",\"PR\":\"32\",\"RR\":\"11\",\"T\":\"t2\",\"FundicHeight\":\"123\",\"FetalHearttone\":\"321\",\"InternalExam\":\"23\",\"LabResults\":\"test\",\"Methergin\":\"23\",\"IM\":\"3\",\"I4\":\"2e\",\"Oral\":\"112\",\"TimeGiven\":\"02:34\",\"Oxytocin\":\"2d\",\"AntiHypertensives\":\"2d\",\"Nifedipine\":\"1ed\",\"Hydralazine\":\"2ed\",\"OthersSpecify\":\"dcf\",\"Impression\":\"wef\",\"ReasonRefferal\":\"few\",\"NameRefPhysicianMidwife\":\"few\",\"ContactRefPhysicianMidwife\":\"few\",\"NameReceivePhysician\":\"wef\",\"ContactReceivePhysician\":\"fwef\",\"pub_priv_mrfpublic\":\"Public\",\"Philhealth_phmember\":\"Yes\"}', '{\"danger_sign_unconcious\":\"Unconcious(does not answer)\"}', '2024-04-28 03:41:06', 0);

-- --------------------------------------------------------

--
-- Table structure for table `registration_type`
--

CREATE TABLE `registration_type` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `createdAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration_type`
--

INSERT INTO `registration_type` (`id`, `name`, `createdAt`) VALUES
(1, 'Online', '2024-03-07 10:40:45'),
(2, 'Walk-in', '2024-03-07 10:40:45');

-- --------------------------------------------------------

--
-- Table structure for table `residents`
--

CREATE TABLE `residents` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `birthdate` date NOT NULL,
  `age` int(11) NOT NULL,
  `civilStatus` varchar(50) NOT NULL,
  `occupation` varchar(100) NOT NULL,
  `mobileno` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `createdAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `residents`
--

INSERT INTO `residents` (`id`, `firstname`, `middlename`, `lastname`, `birthdate`, `age`, `civilStatus`, `occupation`, `mobileno`, `email`, `status`, `createdAt`) VALUES
(1, 'Juan', 'Dela', 'Cruz', '2001-02-14', 22, 'Single', 'Student', '9123456789', 'juan.cruz@gmail.com', 1, '2024-03-23 03:29:42'),
(2, 'Thomas', 'Baltazar', 'Morato', '2001-01-29', 22, 'Single', 'Student ', '9231654987', 'thomas@gmail.com', 1, '2024-03-23 03:29:42'),
(3, 'Anya', 'Villa', 'Fernandez ', '2000-01-26', 23, 'Single', 'Student ', '9321564897', 'anya.f@gmail.com', 1, '2024-03-23 03:29:43'),
(4, 'Arjie', 'Soriano ', 'Reid', '2002-04-17', 21, 'Single', 'Student ', '9546798231', 'arj.r@gmail.com', 1, '2024-03-23 03:29:43'),
(5, 'Zeus', 'Maxi', 'Suniga', '2000-08-24', 23, 'Single', 'Student ', '9678945123', 'zeus.s@gmail.com', 1, '2024-03-23 03:29:43'),
(6, 'Mike', 'Dela', 'Rosa', '2002-11-22', 22, 'Single ', 'Student', '9456123789', 'mike.r@gmail.com', 1, '2024-03-23 03:29:43'),
(7, 'Stephen ', 'Aguilla', 'Marcos', '1999-09-21', 24, 'Single', 'Service Crew', '9851324670', 'stephen@gmail.com', 1, '2024-03-23 03:29:43'),
(8, 'Allysa', 'Mateo', 'Dines', '2001-10-01', 22, 'Single', 'Student ', '9345678910', 'ally@gmail.com', 1, '2024-03-23 03:29:43'),
(9, 'Frank', 'Cruz', 'Hosena', '2000-03-26', 23, 'Single ', 'Service Crew ', '9109876523', 'frank.h@gmail.com', 1, '2024-03-23 03:29:44'),
(10, 'Trisha', 'Malatek', 'Caldag', '2000-02-29', 23, 'Single', 'Student ', '9987564231', 'trisha@gmail.com', 1, '2024-03-23 03:29:44'),
(11, 'Stella', 'Roma', 'Del Mar', '1998-06-12', 24, 'Married', 'Manager', '9268748493', 'stellaroma@gmail.com', 1, '2024-03-23 03:29:44'),
(12, 'Bongbong', 'piso', 'marcos', '2003-09-27', 20, 'single', 'unemployed', '9866376131', 'bongbong@gmail.com', 1, '2024-03-23 03:29:44'),
(13, 'liza', 'ria', 'martinez', '2000-07-12', 23, 'single', 'Barista', '9352845194', 'liza@gmail.com', 1, '2024-03-23 03:29:44'),
(14, 'Spinner', 'Hulit', 'Santos', '2002-08-24', 21, 'Single', 'Carpenter', '9375825371', 'spinner@gmail.com', 1, '2024-03-23 03:29:44'),
(15, 'maria', 'banua', 'chikita', '2001-11-11', 22, 'married', 'unemployed', '9334625123', 'maria@gmail.com', 1, '2024-03-23 03:29:44'),
(16, 'pipay', 'jones', 'lim', '2003-01-01', 21, 'single', 'student', '9824634628', 'pipay@gmail.com', 1, '2024-03-23 03:29:44'),
(17, 'patrick', 'star', 'balanac', '1987-07-26', 37, 'widowed', 'call center agent', '9872365427', 'patstar@gmail.com', 1, '2024-03-23 03:29:44'),
(18, 'josh', 'kangkong', 'mojica', '1999-08-26', 25, 'single', 'Seller', '9346271878', 'joshmojica@gmail.com', 1, '2024-03-23 03:29:44'),
(19, 'jonathan', 'andal', 'salonga', '2000-07-20', 22, 'single', 'student', '9115824101', 'jonathan.s@gmail.com', 1, '2024-03-23 03:29:44'),
(20, 'liwayway', 'santos', 'marasigan', '1990-03-12', 32, 'married', 'housewife', '9045821749', 'santosliwayway12@gmail.com', 1, '2024-03-23 03:29:45'),
(21, 'charles ', 'villapana', 'elzid', '1995-10-20', 27, 'married', 'manager', '9254862710', 'charles_elz@gmail.com', 1, '2024-03-23 03:29:45'),
(22, 'edmon allan', 'seito', 'calumpit', '2001-12-01', 22, 'single', 'delivery rider', '9102527961', 'allan.calumpit01@gmail.com', 1, '2024-03-23 03:29:45'),
(23, 'domeng', 'vicencio', 'realondo', '1980-05-15', 42, 'married', 'family driver', '9218529631', 'domeng.15@gmail.com', 1, '2024-03-23 03:29:45'),
(24, 'apolonia', 'alonzo', 'alingasag', '1985-01-25', 38, 'married', 'secretary', '9855739517', 'alingasag_125@gmail.com', 1, '2024-03-23 03:29:46'),
(25, 'juanita', 'villaroel', 'biksita', '1991-01-10', 33, 'married', 'street sweeper', '9952123520', 'juanita.biksita@gmail.com', 1, '2024-03-23 03:29:46'),
(26, 'princess mae', 'dorovo', 'makiling', '2001-04-23', 22, 'single', 'student', '9582421708', 'princess.23@gmail.com', 1, '2024-03-23 03:29:46'),
(27, 'mira', 'valentina', 'garcia', '2000-11-28', 23, 'single', 'cashier', '9254982710', 'mira_garcia.01@gmail.com', 1, '2024-03-23 03:29:46'),
(28, 'mayumi', 'flores', 'mendoza', '2001-03-10', 22, 'single', 'student', '9585514824', 'mayumi.m@gmail.com', 1, '2024-03-23 03:29:46'),
(29, 'Celine', 'Lopez', 'Alfonso', '2002-10-13', 21, 'Single', 'Student', '9347173627', 'celinealfonso@gmail.com', 1, '2024-03-23 03:29:46'),
(30, 'Shisha', 'Alpinio ', 'Gutierrez', '1997-11-14', 26, 'Married', 'Engineer', '9387651987', 'shisha.a.gutierrez@gmail.com', 1, '2024-03-23 03:29:46'),
(31, 'Ronie', 'Flores', 'Martinito', '2000-12-05', 23, 'Maried', 'Writer', '9913782761', 'ronie.05.martinito@gmail.com', 1, '2024-03-23 03:29:46'),
(32, 'Diana ', 'Dealagdon', 'Nicanor', '2001-05-05', 22, 'Single', 'Sales lady', '9381927356', 'nicanor.diana@gmail.com', 1, '2024-03-23 03:29:46'),
(33, 'Jane', 'Aguinaldo ', 'Almazan', '2003-09-06', 21, 'Single', 'Student', '9794728931', 'almazan.jane@gmail.com', 1, '2024-03-23 03:29:46'),
(34, 'Sheila', 'Nunez', 'Nazareth', '2000-04-11', 23, 'Single', 'Online Seller', '9398716243', 'sheilanuneznazareth@gmail.com', 1, '2024-03-23 03:29:47'),
(35, 'Maria', 'Maclang', 'Reyes', '2002-07-11', 21, 'Single', 'Student', '9812763476', 'mariamaclangreyes@gmail.com', 1, '2024-03-23 03:29:47'),
(36, 'Joven', 'Martinez ', 'Gorra', '2001-10-13', 22, 'Single', 'Sudent', '9567893451', 'joven.gorra@gmail.com', 1, '2024-03-23 03:29:47'),
(37, 'Denver Ace', 'Chua', 'Bautista', '2002-12-12', 21, 'Single', 'Office Staff', '9126734981', 'bautistadenverace@gmail.com', 1, '2024-03-23 03:29:47'),
(38, 'Joshua', 'Espana', 'Acdal', '2000-11-11', 23, 'Single', 'Warehouse Staff', '9348712982', 'josua.acdal@gmail.com', 1, '2024-03-23 03:29:47'),
(39, 'Rica', 'Morales', 'Martinez', '1999-12-23', 24, 'Married', 'Vendor', '9152586590', 'ricamorales123@gmail.com', 1, '2024-03-23 03:29:47'),
(40, 'Arianna', 'Gabriel', 'Candila', '1998-11-19', 25, 'Single', 'Teacher', '9104356821', 'candilaarianna@gmail.com', 1, '2024-03-23 03:29:47'),
(41, 'Ayna', 'Gonzales', 'Gabriel', '2000-08-29', 23, 'Single', 'Sales lady', '9951053218', 'ayna.gabriel@gmail.com', 1, '2024-03-23 03:29:47'),
(42, 'Aliyah', 'Rafol', 'Solasco', '1994-01-20', 30, 'Married', 'Housewife', '9182365987', 'aliyahsolasco20@gmail.com', 1, '2024-03-23 03:29:47'),
(43, 'Jane', 'Belina', 'Villar', '1999-11-16', 24, 'Married', 'Housewife', '9297354109', 'belinajane16@gmail.com', 1, '2024-03-23 03:29:47'),
(44, 'Annie', 'Jose', 'Aquino', '2002-12-15', 22, 'Single', 'Service Crew', '9955362145', 'aquino.annie@gmail.com', 1, '2024-03-23 03:29:47'),
(45, 'Beth', 'Arpon', 'Ventosa', '2002-12-15', 25, 'Single', 'Vendor', '9254876512', 'ventosabeth@gmail.com', 1, '2024-03-23 03:29:48'),
(46, 'Joy', 'Sawat', 'Duzon', '2000-07-19', 23, 'Single', 'Call Center', '9152976302', 'joy.duzon19@gmail.com', 1, '2024-03-23 03:29:48'),
(47, 'Jocelyn', 'Tino', 'Maclang', '1996-10-12', 29, 'Married', 'Waitress', '9104531891', 'jocelynmac@gmail.com', 1, '2024-03-23 03:29:48'),
(48, 'Shaira', 'Aligue', 'Arizo', '2000-09-27', 23, 'Single', 'Cashier', '9259712612', 'shairaarizo27@gmail.com', 1, '2024-03-23 03:29:48'),
(49, 'Maria', 'Aldo', 'De Jesus', '1998-01-25', 26, 'Single ', 'Security Analyst ', '9128464938', 'maria.dejesus@gmail.com', 1, '2024-03-23 03:29:48'),
(50, 'Jayesh', 'Astor', 'Moreen', '1993-02-28', 30, 'Single ', 'Operation Manager ', '9194646281', 'j.moreen@gmail.com', 1, '2024-03-23 03:29:48'),
(51, 'Jayen', 'Josh', 'Madrid ', '1996-03-03', 27, 'Married ', 'Photographer ', '9283659373', 'jayen.madrid01@gmail.com', 1, '2024-03-23 03:29:48'),
(52, 'Mary', 'John ', 'Blair', '2000-09-16', 23, 'Single ', 'Programmer ', '9365983663', 'mary.blair@gmail.com', 1, '2024-03-23 03:29:48'),
(53, 'Maya', 'Queen ', 'Bee', '1994-10-11', 29, 'Married ', 'Supervisor ', '9306664528', 'maya.bee0202@gmail.com', 1, '2024-03-23 03:29:48'),
(54, 'Damilola', 'Mike', 'Beatle', '1995-08-13', 28, 'Married ', 'Learning Specialist ', '9634512458', 'damilola.beatle@gmail.com', 1, '2024-03-23 03:29:48'),
(55, 'Lorly', 'Melen', 'Aldon', '2003-07-06', 20, 'Single', 'Data Analyst ', '9261333469', 'lorly.aldon00@gmail.com', 1, '2024-03-23 03:29:49'),
(56, 'Shaine', 'Maine ', 'King', '1994-12-24', 29, 'Married ', 'Human Resources ', '9564445525', 'smking@gmail.com', 1, '2024-03-23 03:29:49'),
(57, 'Theresa', 'Back', 'Gates', '1997-02-12', 25, 'Single ', 'Financial Analyst ', '9451245236', 'theresa.gates@gmail.com', 1, '2024-03-23 03:29:49'),
(58, 'Belle', 'Moore', 'Shaun', '1993-09-02', 30, 'Married ', 'IT Staff', '9461352864', 'belle.shaun@gmail.cpm', 1, '2024-03-23 03:29:49'),
(59, 'Deborah', 'Aisel', 'Kent', '1998-02-07', 25, 'Single', 'CSR', '9200384639', 'debbie.kent@gmail.com', 1, '2024-03-23 03:29:49'),
(60, 'Marky', 'Carso', 'Albao', '1999-12-19', 25, 'Married', 'Sales Man', '9105374927', 'marky.albao69@gmail.com', 1, '2024-03-23 03:29:49'),
(61, 'Mike', 'Panganim', 'Murales', '2001-08-24', 22, 'Single', 'Student', '9163063563', 'murales.mikep12@gmail.com', 1, '2024-03-23 03:29:49'),
(62, 'Jape', 'Ongga', 'Urben', '1997-01-19', 27, 'Married', 'Teacher', '9642472467', 'japeonggaurben54@gmail.com', 1, '2024-03-23 03:29:49'),
(63, 'Jopay', 'Camursa', 'Canao', '2001-06-07', 22, 'Single', 'Student', '9099245182', 'jopayccanao@gmail.com', 1, '2024-03-23 03:29:49'),
(64, 'Tiyang', 'Isabel', 'Gasto', '2000-11-01', 23, 'Single', 'Service Crew', '9222529675', 'gasto.tiyang01@gmail.com', 1, '2024-03-23 03:29:49'),
(65, 'Baloy', 'Canlao', 'Balaba', '2002-04-16', 21, 'Single', 'Student', '9634910468', 'balabaloy@gmail.com', 1, '2024-03-23 03:29:49'),
(66, 'Badang', 'Peralto', 'Sartillo', '1998-02-14', 26, 'Single', 'Technical Director', '9135379563', 'sartilloperalto12@gmail.com', 1, '2024-03-23 03:29:49'),
(67, 'Bakekang', 'Packy', 'Orocio', '2001-09-06', 22, 'Single', 'Student', '9123456789', 'packyorocio54@gmail.com', 1, '2024-03-23 03:29:50'),
(68, 'Darla', 'Sadul', 'Gapaw', '1990-01-29', 34, 'Married', 'Operation Manager ', '9087245612', 'darlasadul@gmail.com', 1, '2024-03-23 03:29:50'),
(69, 'Imang', 'Lamot', 'Bandila', '2002-05-25', 21, 'Single', 'Student', '9167348346', 'bandila.imang85@gmail.com', 1, '2024-03-23 03:29:50'),
(70, 'Emily ', 'Grace ', 'Turner', '1990-02-15', 32, 'Married', 'Software Engineer', '9955956645', 'emily.turner@gmail.com', 1, '2024-03-23 03:29:50'),
(71, 'Marcus ', 'Anthony ', 'Rodriguez', '1985-07-08', 36, 'Single', 'Financial Analyst', '9567108775', 'marcus.rodriguez@gmail.com', 1, '2024-03-23 03:29:50'),
(72, 'Olivia ', 'Jane ', 'Thompson', '1995-03-21', 26, 'Divorced', 'Graphic Designer', '9669917662', 'olivia.thompson@gmail.com', 1, '2024-03-23 03:29:50'),
(73, 'Elijah ', 'Michael ', 'Foster', '1988-11-10', 33, 'Widowed', ' Physician', '9567108774', 'elijah.foster@gmail.com', 1, '2024-03-23 03:29:50'),
(74, 'Sophia ', 'Elizabeth ', 'Baker', '1998-04-05', 23, 'Single', 'Marketing Manager', '9952501985', 'sophia.baker@gmail.com', 1, '2024-03-23 03:29:50'),
(75, 'Xavier ', 'Thomas', 'Hayes', '1982-09-12', 39, 'Married', 'Civil Engineer', '9955956043', 'xavier.hayes@gmail.com', 1, '2024-03-23 03:29:50'),
(76, 'Lily ', 'Marie ', 'Collins', '1993-06-30', 28, 'Single', 'Teacher', '9164739426', ' lily.collins@gmail.com', 1, '2024-03-23 03:29:50'),
(77, 'Jackson ', 'Oliver ', 'Bennett', '1987-12-03', 34, 'Divorced', 'Lawyer', '9750744869', 'jackson.bennett@gmail.com', 1, '2024-03-23 03:29:50'),
(78, 'Ava ', 'Grace ', 'Carter', '2000-05-18', 21, 'Single', 'Psychologist', '9164739261', 'ava.carter@gmail.com', 1, '2024-03-23 03:29:51'),
(79, 'Noah ', 'Alexander ', 'Watson', '1991-10-07', 30, 'Married', 'Architect', '9274371624', 'noah.watson@gmail.com', 1, '2024-03-23 03:29:51'),
(80, 'Kelly', 'Grey', 'Park', '2002-06-03', 21, 'Single', 'Teacher', '9638527451', 'kellypark@yahoo.com', 1, '2024-03-23 03:29:51'),
(81, 'Matilda', 'pat', 'Holt', '1988-12-31', 35, 'Married', 'Police', '9546123458', 'holt.m@gmail.com', 1, '2024-03-23 03:29:51'),
(82, 'Alina', 'Lee', 'Craig', '2002-01-04', 22, 'Single', 'Meteorologist', '9876543212', 'a.elliott@gmail.com        ', 1, '2024-03-23 03:29:51'),
(83, 'Abigail ', 'Ibarra', 'Watson', '1999-07-28', 25, 'Seperated', 'Data Analyst', '9876543219', 'a.watson@mail.com        ', 1, '2024-03-23 03:29:51'),
(84, 'Mika', 'Lucy ', 'Pearl', '1997-04-25', 27, 'Single', 'Manager', '9564738291', 'mika.l.p@yahoo.com', 1, '2024-03-23 03:29:51'),
(85, 'Erica', 'Cruz', 'Santos', '2003-04-21', 21, 'Single', 'Student', '9546378216', 'e.santos@gmail.com', 1, '2024-03-23 03:29:52'),
(86, 'Lily', 'Gulod', 'Ibbara', '1995-09-10', 29, 'Married', 'Bank Teller', '9754362718', 'lily_gulod@gmail.com', 1, '2024-03-23 03:29:52'),
(87, 'Neveah', 'Corpuz', 'Uy', '1992-06-14', 32, 'Married', 'Professor', '9543163518', 'uy.neveah@yahho.com', 1, '2024-03-23 03:29:52'),
(88, 'Rei', 'Vista', 'Layag', '1996-05-03', 28, 'Single', 'Call Center', '9458632654', 'vista.r@gmail.com', 1, '2024-03-23 03:29:52'),
(89, 'Kath', 'Leen', 'Morales', '1988-11-01', 36, 'Widowed', 'Chief Executive', '9642574537', 'kathmorales@yahoo.com', 1, '2024-03-23 03:29:52'),
(90, 'John', 'Crisostomo ', 'Amoranto', '1998-01-13', 26, 'Single', 'Call Center', '9156487523', 'amoranto.john098@gmail.com', 1, '2024-03-23 03:29:52'),
(91, 'Mailyn', 'Garcia', 'Villavicencio', '2000-06-24', 23, 'Single', 'Student', '9614378458', 'mailynvillavicencio0@gmail.com', 1, '2024-03-23 03:29:52'),
(92, 'Angeline', 'Cruz', 'Torres', '1999-12-22', 24, 'Single', 'Service Crew', '9984564281', 'torresangelinee@gmail.com', 1, '2024-03-23 03:29:52'),
(93, 'Christian', 'Angeles', 'Ildefonso', '2000-08-07', 23, 'Single', 'Student', '9134856481', 'christian.ildefonso7@gmail.com', 1, '2024-03-23 03:29:52'),
(94, 'Ma. Lourdes', 'Jeresano', 'Epifania', '1986-04-13', 36, 'Married', 'Housewife', '9462421682', 'lourdes.epifania@gmail.com', 1, '2024-03-23 03:29:52'),
(95, 'Mark', 'Magnifico ', 'Manalansan', '1997-11-19', 27, 'Single', 'Engineer', '9615482132', 'manalansanmark19@gmail.com', 1, '2024-03-23 03:29:52'),
(96, 'Rose marie', 'Tulagan ', 'Gamutia', '2000-09-27', 23, 'Single', 'Student', '9112548651', 'rosegamutia1@gmail.com', 1, '2024-03-23 03:29:52'),
(97, 'Aika kate ', 'Garcio', 'Yamato', '2001-11-11', 22, 'Single', 'Student', '9561232456', 'aikakate.yam11@gmail.com', 1, '2024-03-23 03:29:52'),
(98, 'Jeremy', 'Tumazar', 'Candelario', '1997-05-28', 27, 'Married', 'Teacher', '9654843215', 'candelariojeremy28@gmail.com', 1, '2024-03-23 03:29:53'),
(99, 'Ysabelle', 'Globio', ' Santiago', '2000-12-19', 23, 'Single', 'Sales Lady', '9661254861', 'ysabelle.kyutie@gmail.com', 1, '2024-03-23 03:29:53'),
(100, 'Raoul ', 'Valerio', 'Riego', '1995-09-02', 29, 'Married ', 'Engineer ', '9156754326', 'raoulriego@gmail.com', 1, '2024-03-23 03:29:53'),
(101, 'Crisanto', 'Lopez', 'Alcantara', '2000-12-23', 24, 'Single ', 'Corporate Executive ', '9193428350', 'crisantoalcantara.@gmail.com', 1, '2024-03-23 03:29:53'),
(102, 'Constanciandra', 'Almodovar', 'Lopez', '1996-10-02', 28, 'Married ', 'Business Woman ', '9866355795', 'andralopez@yahoo.com', 1, '2024-03-23 03:29:53'),
(103, 'Timothy ', 'Odelle', 'Pendleton ', '1990-04-13', 34, 'Married ', 'CEO', '9875643286', 'timothy. pendleton@gmail.com', 1, '2024-03-23 03:29:53'),
(104, 'Jacob Kian', 'Perez', 'Jeon', '2002-12-15', 27, 'Single ', 'Artist', '9724563245', 'jjkp@gmail.com', 1, '2024-03-23 03:29:53'),
(105, 'Radleigh', 'Vesarius', 'Riego', '1995-12-18', 29, 'Married ', 'Architect-Engineer ', '9655708098', 'radriego@gmailcom', 1, '2024-03-23 03:29:53');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `code` varchar(50) NOT NULL,
  `description` varchar(150) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `code`, `description`, `created`) VALUES
(1, 'Super Admin', 'SAdm', 'IT Health Department Admin Head', '2023-12-29 12:30:42'),
(2, 'Doctor', 'Dr', 'Doctor User', '2023-12-29 12:32:05'),
(3, 'Midwife', 'Md', 'Midwife user', '2023-12-29 12:32:05'),
(4, 'IT - Barangay', 'IT-Brgy', 'Data encoder', '2023-12-29 12:32:41'),
(5, 'Triage', 'Tr', 'Front Desk', '2024-01-16 16:04:33'),
(6, 'Patient', 'P', 'Patients Access', '2024-01-18 04:01:54'),
(7, 'Chw', 'CHW', 'Community Health Worker', '2024-01-28 16:20:56'),
(8, 'Lyingin Doctor', 'Dr', 'Doctor in lying-in', '2024-02-03 09:36:43'),
(9, 'Hospital Doctor', 'Dr', 'Doctor in Hospital', '2024-02-03 09:37:28'),
(10, 'Lyingin Triage', 'Tr', 'Triage in Lyingin', '2024-04-13 03:51:33'),
(11, 'Hospital Triage ', 'Tr', 'Traiage in Hospital', '2024-04-13 03:51:33');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `schedule_type_id` int(11) NOT NULL,
  `schedule_time_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `end_time` time NOT NULL,
  `event` varchar(250) NOT NULL,
  `created_by` int(11) NOT NULL,
  `createdAt` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `schedule_type_id`, `schedule_time_id`, `date`, `time`, `end_time`, `event`, `created_by`, `createdAt`, `status`) VALUES
(19, 1, 0, '2024-03-13', '08:00:00', '00:00:00', 'available', 51, '2024-03-15 00:57:27', 1),
(20, 1, 0, '2024-03-14', '08:00:00', '00:00:00', 'available', 51, '2024-03-15 00:58:35', 1),
(21, 1, 0, '2024-03-18', '08:00:00', '00:00:00', 'available', 51, '2024-03-15 00:58:54', 1),
(22, 2, 0, '2024-03-27', '08:00:00', '00:00:00', 'Libreng tuli', 51, '2024-03-15 00:59:14', 1),
(23, 2, 0, '2024-03-22', '08:00:00', '00:00:00', 'Libreng Gamot', 51, '2024-03-15 00:59:39', 1),
(24, 3, 0, '2024-03-31', '09:00:00', '00:00:00', 'Araw ng Kalayaan', 51, '2024-03-15 01:04:18', 1),
(25, 1, 0, '2024-04-09', '08:00:00', '00:00:00', 'available', 51, '2024-03-15 12:57:28', 1),
(26, 2, 0, '2024-04-25', '09:00:00', '00:00:00', 'Free Vaccine for Babies ', 51, '2024-03-15 12:58:22', 1),
(27, 3, 0, '2024-03-01', '00:00:00', '00:00:00', 'Araw ng araw', 51, '2024-03-15 12:59:26', 1),
(28, 3, 0, '2024-04-02', '20:34:47', '00:00:00', 'Araw ng mag Araw', 51, '2024-03-21 20:34:47', 1),
(29, 2, 0, '2024-04-30', '07:16:00', '00:00:00', 'Free Vaccine', 51, '2024-04-26 03:16:52', 1),
(30, 2, 0, '2024-05-02', '07:16:00', '15:00:00', 'Pregnancy Orientation', 51, '2024-04-26 04:16:45', 1),
(31, 2, 0, '2024-05-03', '07:12:00', '17:12:00', 'Libreng Gamot', 51, '2024-04-26 05:12:39', 1),
(32, 2, 0, '2024-05-13', '07:15:00', '17:14:00', 'Familly Planning', 51, '2024-04-26 05:14:45', 1);

-- --------------------------------------------------------

--
-- Table structure for table `schedule_time`
--

CREATE TABLE `schedule_time` (
  `id` int(11) NOT NULL,
  `time` varchar(50) NOT NULL,
  `createdAt` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule_time`
--

INSERT INTO `schedule_time` (`id`, `time`, `createdAt`, `status`) VALUES
(1, '8:00 AM - 9:00 AM', '2024-03-14 17:13:02', 1),
(2, '9:00 AM - 10:00 AM', '2024-03-14 17:13:02', 1),
(3, '10:00 AM - 11:00 AM', '2024-03-14 17:14:13', 1),
(4, '11:00 AM - 12:00 AM', '2024-03-14 17:14:13', 1),
(5, '1:00 PM - 2:00 PM', '2024-03-14 17:40:19', 1),
(6, '2:00 PM - 3:00 PM', '2024-03-14 17:40:19', 1),
(7, '3:00 PM - 4:00 PM', '2024-03-14 17:41:07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `schedule_type`
--

CREATE TABLE `schedule_type` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `createdAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule_type`
--

INSERT INTO `schedule_type` (`id`, `name`, `createdAt`) VALUES
(1, 'Appointment', '2024-03-13 12:02:07'),
(2, 'Program', '2024-03-13 12:02:07'),
(3, 'Holiday', '2024-03-13 12:09:51');

-- --------------------------------------------------------

--
-- Table structure for table `system_users`
--

CREATE TABLE `system_users` (
  `id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `facilities_id` int(11) NOT NULL,
  `firstname` varchar(150) NOT NULL,
  `middlename` varchar(150) NOT NULL,
  `lastname` varchar(150) NOT NULL,
  `image` text NOT NULL,
  `createdAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_users`
--

INSERT INTO `system_users` (`id`, `account_id`, `facilities_id`, `firstname`, `middlename`, `lastname`, `image`, `createdAt`) VALUES
(1, 1, 23, 'IT', 'Head', 'Department', 'c4ca4238a0b923820dcc509a6f75849b.png', '2024-02-17 03:00:56'),
(36, 36, 51, 'kap', 'tin', 'kop', '19ca14e7ea6328a42e0eb13d585e4c22.png', '2024-03-22 20:24:25'),
(37, 37, 53, 'Tria', 'ge', 'Tr', '', '2024-03-22 20:24:25'),
(38, 38, 53, 'Duke', 'Dike', 'Dunk', 'a5771bce93e200c36f7cd9dfd0e5deaa.png', '2024-04-28 15:29:47'),
(39, 39, 62, 'Lloydy', 'haha', 'cris', 'd67d8ab4f4c10bf22aa353e27879133c.jpg', '2024-03-23 03:35:06'),
(40, 40, 57, 'Lying', 'In', 'Cent', '', '2024-03-24 07:12:34'),
(41, 41, 53, 'Mid', 'Wife', 'Md', '3416a75f4cea9109507cacd8e2f2aefc.png', '2024-03-24 21:17:53'),
(42, 42, 55, 'Pi', 'Tal', 'Hos', '', '2024-04-05 11:00:32'),
(43, 43, 57, 'Ing', 'In', 'Ly', '', '2024-04-23 02:17:41'),
(44, 44, 8, 'Aud', 'Ry', 'Herrera', '', '2024-03-25 16:10:43'),
(45, 45, 10, 'Borrinaga', 'Bors', 'Jayron', '', '2024-03-25 16:12:33'),
(46, 46, 55, 'john kenneth', 'Cruz', 'bitoon', '', '2024-03-25 16:19:48'),
(47, 47, 4, 'ireneo', 'Black', 'atenta', '', '2024-03-25 16:21:07'),
(48, 48, 10, 'jellamie', 'Aguilla', 'manlangit', '', '2024-03-25 16:21:54'),
(49, 49, 10, 'mark jayson', 'rem', 'siarot', '', '2024-03-25 16:23:13'),
(50, 50, 10, 'jayron', 'dela cruz', 'borrinaga', '', '2024-03-25 16:23:59'),
(51, 51, 53, 'cherry ann', 'ynay', 'barcoma', '', '2024-03-25 16:26:08'),
(52, 52, 10, 'Marga', 'Ccc', 'Rotairo', '', '2024-03-26 17:18:28'),
(53, 53, 10, 'Marga', 'Ccc', 'Rotairo', '', '2024-03-26 17:18:30'),
(54, 54, 54, 'Cris', 'Cruz', 'Crissy', '', '2024-04-28 15:31:04'),
(55, 55, 54, 'mid2', '2m', 'md2', '', '2024-04-28 16:51:10');

-- --------------------------------------------------------

--
-- Table structure for table `try`
--

CREATE TABLE `try` (
  `id` int(11) NOT NULL,
  `message` varchar(200) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `try`
--

INSERT INTO `try` (`id`, `message`, `date`) VALUES
(61, 'mjhvhv', '2024-01-26 10:51:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_code`
--
ALTER TABLE `access_code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_verification_code`
--
ALTER TABLE `account_verification_code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bed_slot`
--
ALTER TABLE `bed_slot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_record`
--
ALTER TABLE `delivery_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discharge_mother`
--
ALTER TABLE `discharge_mother`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discharge_newborn`
--
ALTER TABLE `discharge_newborn`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipement_type`
--
ALTER TABLE `equipement_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipments`
--
ALTER TABLE `equipments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facility_list`
--
ALTER TABLE `facility_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facility_type`
--
ALTER TABLE `facility_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forgot_password_tokens`
--
ALTER TABLE `forgot_password_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `token` (`token`);

--
-- Indexes for table `laboratory`
--
ALTER TABLE `laboratory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message_content`
--
ALTER TABLE `message_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message_feedback`
--
ALTER TABLE `message_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message_type`
--
ALTER TABLE `message_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newborn_record`
--
ALTER TABLE `newborn_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification_type`
--
ALTER TABLE `notification_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `online_registration`
--
ALTER TABLE `online_registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients_completed`
--
ALTER TABLE `patients_completed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients_itr`
--
ALTER TABLE `patients_itr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_natal`
--
ALTER TABLE `patient_natal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_postnatal`
--
ALTER TABLE `patient_postnatal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_postpartum`
--
ALTER TABLE `patient_postpartum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_prenatal`
--
ALTER TABLE `patient_prenatal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_type`
--
ALTER TABLE `patient_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pre_registration`
--
ALTER TABLE `pre_registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referral_feedback`
--
ALTER TABLE `referral_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referral_status`
--
ALTER TABLE `referral_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `refer_patient`
--
ALTER TABLE `refer_patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration_type`
--
ALTER TABLE `registration_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `residents`
--
ALTER TABLE `residents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule_time`
--
ALTER TABLE `schedule_time`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule_type`
--
ALTER TABLE `schedule_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_users`
--
ALTER TABLE `system_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `try`
--
ALTER TABLE `try`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_code`
--
ALTER TABLE `access_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `account_verification_code`
--
ALTER TABLE `account_verification_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `bed_slot`
--
ALTER TABLE `bed_slot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `delivery_record`
--
ALTER TABLE `delivery_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `discharge_mother`
--
ALTER TABLE `discharge_mother`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `discharge_newborn`
--
ALTER TABLE `discharge_newborn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `equipement_type`
--
ALTER TABLE `equipement_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `equipments`
--
ALTER TABLE `equipments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `facility_list`
--
ALTER TABLE `facility_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `facility_type`
--
ALTER TABLE `facility_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `forgot_password_tokens`
--
ALTER TABLE `forgot_password_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `laboratory`
--
ALTER TABLE `laboratory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `message_content`
--
ALTER TABLE `message_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `message_feedback`
--
ALTER TABLE `message_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `message_type`
--
ALTER TABLE `message_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `newborn_record`
--
ALTER TABLE `newborn_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `notification_type`
--
ALTER TABLE `notification_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `online_registration`
--
ALTER TABLE `online_registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `patients_completed`
--
ALTER TABLE `patients_completed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `patients_itr`
--
ALTER TABLE `patients_itr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `patient_natal`
--
ALTER TABLE `patient_natal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient_postnatal`
--
ALTER TABLE `patient_postnatal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `patient_postpartum`
--
ALTER TABLE `patient_postpartum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `patient_prenatal`
--
ALTER TABLE `patient_prenatal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `patient_type`
--
ALTER TABLE `patient_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pre_registration`
--
ALTER TABLE `pre_registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `referral_feedback`
--
ALTER TABLE `referral_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `referral_status`
--
ALTER TABLE `referral_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `refer_patient`
--
ALTER TABLE `refer_patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `registration_type`
--
ALTER TABLE `registration_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `residents`
--
ALTER TABLE `residents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `schedule_time`
--
ALTER TABLE `schedule_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `schedule_type`
--
ALTER TABLE `schedule_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `system_users`
--
ALTER TABLE `system_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `try`
--
ALTER TABLE `try`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
