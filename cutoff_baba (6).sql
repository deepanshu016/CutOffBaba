-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 04, 2024 at 08:04 PM
-- Server version: 8.2.0
-- PHP Version: 8.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cutoff_baba`
--

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `DeleteByIDs`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `DeleteByIDs` (IN `table_Name` VARCHAR(50), IN `column_name` VARCHAR(50), IN `ids_list` VARCHAR(255))   BEGIN
    SET @query = CONCAT('DELETE FROM ',table_Name,' WHERE ', column_name, ' IN (', ids_list, ')');
    PREPARE statement FROM @query;
    EXECUTE statement;
    DEALLOCATE PREPARE statement;
END$$

DROP PROCEDURE IF EXISTS `FilterByIDs`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `FilterByIDs` (IN `table_name` VARCHAR(50), IN `column_name` VARCHAR(50), IN `ids_list` VARCHAR(255))   BEGIN
    SET @query = CONCAT('SELECT * FROM ',table_name,' WHERE ', column_name, ' IN (', ids_list, ')');
    PREPARE statement FROM @query;
    EXECUTE statement;
    DEALLOCATE PREPARE statement;
END$$

DROP PROCEDURE IF EXISTS `GetCollegeForCutOff`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetCollegeForCutOff` ()   BEGIN
        SELECT t1.*, 
            c.id, c.course, c.course_full_name, c.course_short_name, c.course_icon, 
            c.stream AS stream_id, c.degree_type AS degree_type_id, c.course_duration, c.exam, 
            c.course_eligibility, c.course_opportunity, c.expected_salary, c.course_fees, 
            c.counselling_authority, t2.full_name AS college_full_name,
            b.id AS branch_id, b.branch AS branch_name, b.branch_type
        FROM tbl_cutfoff_marks_data AS t1 
        INNER JOIN tbl_course AS c ON c.id = t1.course_id
        INNER JOIN tbl_college AS t2 ON t1.college_id = t2.id
        INNER JOIN tbl_branch AS b ON b.id = t1.branch_id;
    END$$

DROP PROCEDURE IF EXISTS `GetCombinedData`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetCombinedData` ()   BEGIN
    SELECT t1.id as college_id, t1.full_name, t1.slug, t1.short_description, 
           COUNT(CASE WHEN t2.file_type = 'image' THEN 1 END) AS image_count,
           COUNT(CASE WHEN t2.file_type = 'doc' THEN 1 END) AS doc_count,
           COUNT(CASE WHEN t2.file_type = 'video' THEN 1 END) AS video_count
    FROM tbl_college t1
             JOIN tbl_uploaded_files t2 ON t1.id = t2.file_data
    GROUP BY t2.file_data;
END$$

DROP PROCEDURE IF EXISTS `getCutOffData`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getCutOffData` ()   BEGIN
    SELECT t1.*, 
        c.id, c.course, c.course_full_name, c.course_short_name, c.course_icon, 
        c.stream AS stream_id, c.degree_type AS degree_type_id, c.course_duration, c.exam, 
        c.course_eligibility, c.course_opportunity, c.expected_salary, c.course_fees, 
        c.counselling_authority, t2.full_name AS college_full_name,
        b.id AS branch_id, b.branch AS branch_name, b.branch_type
    FROM tbl_cutfoff_marks_data AS t1 
    INNER JOIN tbl_course AS c ON c.id = t1.course_id
    INNER JOIN tbl_college AS t2 ON t1.college_id = t2.id
    INNER JOIN tbl_branch AS b ON b.id = t1.branch_id;
END$$

DROP PROCEDURE IF EXISTS `GetMediaData`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetMediaData` (IN `college_id` INT(20), IN `file_types` VARCHAR(20))   BEGIN 
    -- Retrieve data for images
    SELECT * FROM tbl_uploaded_files WHERE file_type = file_types AND file_data = college_id;
    -- Retrieve data for videos
    SELECT * FROM tbl_uploaded_files WHERE file_type = file_types AND file_data = college_id;
    -- Retrieve data for documents
    SELECT * FROM tbl_uploaded_files WHERE file_type = file_types AND file_data = college_id;
END$$

DROP PROCEDURE IF EXISTS `GetParentChildData`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetParentChildData` (IN `parent_table_name` VARCHAR(255), IN `child_table_name` VARCHAR(255), IN `common_field` VARCHAR(255))   BEGIN
    SET @query = CONCAT(
        'SELECT p.id as state_id,p.name as state_name,p.country_id,c.countryCode,c.name as country_name FROM ' ,parent_table_name, ' p ',
        'JOIN ', child_table_name, ' c ON c.id = p.',common_field,''
    );

    -- Execute the dynamic query
    PREPARE statement FROM @query;
    EXECUTE statement;
    DEALLOCATE PREPARE statement;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `keys`
--

DROP TABLE IF EXISTS `keys`;
CREATE TABLE IF NOT EXISTS `keys` (
  `id` int NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT '0',
  `is_private_key` tinyint(1) NOT NULL DEFAULT '0',
  `ip_addresses` text,
  `date_created` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `keys`
--

INSERT INTO `keys` (`id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(1, 'TEST API', 0, 0, 0, NULL, 2024);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
CREATE TABLE IF NOT EXISTS `logs` (
  `id` int NOT NULL,
  `uri` varchar(255) NOT NULL,
  `method` varchar(6) NOT NULL,
  `params` text,
  `api_key` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `time` int NOT NULL,
  `rtime` float DEFAULT NULL,
  `authorized` varchar(1) NOT NULL,
  `response_code` smallint DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_approval`
--

DROP TABLE IF EXISTS `tbl_approval`;
CREATE TABLE IF NOT EXISTS `tbl_approval` (
  `id` int NOT NULL AUTO_INCREMENT,
  `approval` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_approval`
--

INSERT INTO `tbl_approval` (`id`, `approval`) VALUES
(2, 'MCI'),
(3, 'NMC'),
(5, 'WHO'),
(7, 'ECFMG'),
(8, 'NCISM'),
(9, 'DCI'),
(10, 'NCH'),
(11, 'fgdsfgfd'),
(12, 'sdfgdfgdfgfdg'),
(13, 'EDC'),
(14, 'EDC'),
(15, 'Private'),
(16, 'rtetrtt');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_branch`
--

DROP TABLE IF EXISTS `tbl_branch`;
CREATE TABLE IF NOT EXISTS `tbl_branch` (
  `id` int NOT NULL AUTO_INCREMENT,
  `branch` varchar(255) DEFAULT NULL,
  `courses` varchar(55) DEFAULT NULL,
  `branch_type` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_branch`
--

INSERT INTO `tbl_branch` (`id`, `branch`, `courses`, `branch_type`) VALUES
(2, 'Anatomy', '3', 1),
(3, 'Physiology', '2', 2),
(6, 'Biology', '2', 1),
(8, 'Computer ', '2', 2),
(9, 'Chemistry', '5|7', 1),
(10, 'Physics', '7', 2),
(11, 'Physicsaaa', '10|20|30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

DROP TABLE IF EXISTS `tbl_category`;
CREATE TABLE IF NOT EXISTS `tbl_category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) DEFAULT NULL,
  `head_id` int DEFAULT NULL,
  `short_name` varchar(55) DEFAULT NULL,
  `visibility_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `head_id` (`head_id`),
  KEY `visibility_id` (`visibility_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `category_name`, `head_id`, `short_name`, `visibility_id`) VALUES
(2, 'Demo Category', 2, 'ED', 1),
(4, 'New Category', 2, 'FG', 2),
(5, 'Category One', 3, 'DV', 1),
(6, 'Category Two', 5, 'RF', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_city`
--

DROP TABLE IF EXISTS `tbl_city`;
CREATE TABLE IF NOT EXISTS `tbl_city` (
  `id` int NOT NULL AUTO_INCREMENT,
  `city` varchar(255) NOT NULL,
  `state_id` int NOT NULL,
  `country` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `state_id` (`state_id`)
) ENGINE=InnoDB AUTO_INCREMENT=613 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbl_city`
--

INSERT INTO `tbl_city` (`id`, `city`, `state_id`, `country`) VALUES
(1, 'North and Mid Andman', 32, 105),
(2, 'South Andaman', 32, 105),
(3, 'Nicobar', 32, 105),
(4, 'Adilabad', 1, 105),
(5, 'Anantapur', 1, 105),
(6, 'Chittoor', 1, 105),
(7, 'East Godavari', 1, 105),
(8, 'Guntur', 1, 105),
(9, 'Hyderabad', 1, 105),
(12, 'Khammam', 1, 105),
(13, 'Krishna', 1, 105),
(14, 'Kurnool', 1, 105),
(15, 'Mahbubnagar', 1, 105),
(16, 'Medak', 1, 105),
(17, 'Nalgonda', 1, 105),
(18, 'Nellore', 1, 105),
(19, 'Nizamabad', 1, 105),
(20, 'Prakasam', 1, 105),
(21, 'Rangareddi', 1, 105),
(22, 'Srikakulam', 1, 105),
(23, 'Vishakhapatnam', 1, 105),
(24, 'Vizianagaram', 1, 105),
(25, 'Warangal', 1, 105),
(26, 'West Godavari', 1, 105),
(27, 'Anjaw', 3, 105),
(28, 'Changlang', 3, 105),
(29, 'East Kameng', 3, 105),
(30, 'Lohit', 3, 105),
(31, 'Lower Subansiri', 3, 105),
(32, 'Papum Pare', 3, 105),
(33, 'Tirap', 3, 105),
(34, 'Dibang Valley', 3, 105),
(35, 'Upper Subansiri', 3, 105),
(36, 'West Kameng', 3, 105),
(37, 'Barpeta', 2, 105),
(38, 'Bongaigaon', 2, 105),
(39, 'Cachar', 2, 105),
(40, 'Darrang', 2, 105),
(41, 'Dhemaji', 2, 105),
(42, 'Dhubri', 2, 105),
(43, 'Dibrugarh', 2, 105),
(44, 'Goalpara', 2, 105),
(45, 'Golaghat', 2, 105),
(46, 'Hailakandi', 2, 105),
(47, 'Jorhat', 2, 105),
(48, 'Karbi Anglong', 2, 105),
(49, 'Karimganj', 2, 105),
(50, 'Kokrajhar', 2, 105),
(51, 'Lakhimpur', 2, 105),
(52, 'Marigaon', 2, 105),
(53, 'Nagaon', 2, 105),
(54, 'Nalbari', 2, 105),
(55, 'North Cachar Hills', 2, 105),
(56, 'Sibsagar', 2, 105),
(57, 'Sonitpur', 2, 105),
(58, 'Tinsukia', 2, 105),
(59, 'Araria', 4, 105),
(60, 'Aurangabad', 4, 105),
(61, 'Banka', 4, 105),
(62, 'Begusarai', 4, 105),
(63, 'Bhagalpur', 4, 105),
(64, 'Bhojpur', 4, 105),
(65, 'Buxar', 4, 105),
(66, 'Darbhanga', 4, 105),
(67, 'Purba Champaran', 4, 105),
(68, 'Gaya', 4, 105),
(69, 'Gopalganj', 4, 105),
(70, 'Jamui', 4, 105),
(71, 'Jehanabad', 4, 105),
(72, 'Khagaria', 4, 105),
(73, 'Kishanganj', 4, 105),
(74, 'Kaimur', 4, 105),
(75, 'Katihar', 4, 105),
(76, 'Lakhisarai', 4, 105),
(77, 'Madhubani', 4, 105),
(78, 'Munger', 4, 105),
(79, 'Madhepura', 4, 105),
(80, 'Muzaffarpur', 4, 105),
(81, 'Nalanda', 4, 105),
(82, 'Nawada', 4, 105),
(83, 'Patna', 4, 105),
(84, 'Purnia', 4, 105),
(85, 'Rohtas', 4, 105),
(86, 'Saharsa', 4, 105),
(87, 'Samastipur', 4, 105),
(88, 'Sheohar', 4, 105),
(89, 'Sheikhpura', 4, 105),
(90, 'Saran', 4, 105),
(91, 'Sitamarhi', 4, 105),
(92, 'Supaul', 4, 105),
(93, 'Siwan', 4, 105),
(94, 'Vaishali', 4, 105),
(95, 'Pashchim Champaran', 4, 105),
(96, 'Bastar', 36, NULL),
(97, 'Bilaspur', 36, NULL),
(98, 'Dantewada', 36, NULL),
(99, 'Dhamtari', 36, NULL),
(100, 'Durg', 36, NULL),
(101, 'Jashpur', 36, NULL),
(102, 'Janjgir-Champa', 36, NULL),
(103, 'Korba', 36, NULL),
(104, 'Koriya', 36, NULL),
(105, 'Kanker', 36, NULL),
(106, 'Kawardha', 36, NULL),
(107, 'Mahasamund', 36, NULL),
(108, 'Raigarh', 36, NULL),
(109, 'Rajnandgaon', 36, NULL),
(110, 'Raipur', 36, NULL),
(111, 'Surguja', 36, NULL),
(112, 'Diu', 29, 105),
(113, 'Daman', 29, 105),
(114, 'Central Delhi', 25, 105),
(115, 'East Delhi', 25, 105),
(116, 'New Delhi', 25, 105),
(117, 'North Delhi', 25, 105),
(118, 'North East Delhi', 25, 105),
(119, 'North West Delhi', 25, 105),
(120, 'South Delhi', 25, 105),
(121, 'South West Delhi', 25, 105),
(122, 'West Delhi', 25, 105),
(123, 'North Goa', 26, 105),
(124, 'South Goa', 26, 105),
(125, 'Ahmedabad', 5, NULL),
(126, 'Amreli District', 5, NULL),
(127, 'Anand', 5, NULL),
(128, 'Banaskantha', 5, NULL),
(129, 'Bharuch', 5, NULL),
(130, 'Bhavnagar', 5, NULL),
(131, 'Dahod', 5, NULL),
(132, 'The Dangs', 5, NULL),
(133, 'Gandhinagar', 5, NULL),
(134, 'Jamnagar', 5, NULL),
(135, 'Junagadh', 5, NULL),
(136, 'Kutch', 5, NULL),
(137, 'Kheda', 5, NULL),
(138, 'Mehsana', 5, NULL),
(139, 'Narmada', 5, NULL),
(140, 'Navsari', 5, NULL),
(141, 'Patan', 5, NULL),
(142, 'Panchmahal', 5, NULL),
(143, 'Porbandar', 5, NULL),
(144, 'Rajkot', 5, NULL),
(145, 'Sabarkantha', 5, NULL),
(146, 'Surendranagar', 5, NULL),
(147, 'Surat', 5, NULL),
(148, 'Vadodara', 5, NULL),
(149, 'Valsad', 5, NULL),
(150, 'Ambala', 6, 105),
(151, 'Bhiwani', 6, 105),
(152, 'Faridabad', 6, 105),
(153, 'Fatehabad', 6, 105),
(154, 'Gurgaon', 6, 105),
(155, 'Hissar', 6, 105),
(156, 'Jhajjar', 6, 105),
(157, 'Jind', 6, 105),
(158, 'Karnal', 6, 105),
(159, 'Kaithal', 6, 105),
(160, 'Kurukshetra', 6, 105),
(161, 'Mahendragarh', 6, 105),
(162, 'Mewat', 6, 105),
(163, 'Panchkula', 6, 105),
(164, 'Panipat', 6, 105),
(165, 'Rewari', 6, 105),
(166, 'Rohtak', 6, 105),
(167, 'Sirsa', 6, 105),
(168, 'Sonepat', 6, 105),
(169, 'Yamuna Nagar', 6, 105),
(170, 'Palwal', 6, 105),
(171, 'Bilaspur', 7, 105),
(172, 'Chamba', 7, 105),
(173, 'Hamirpur', 7, 105),
(174, 'Kangra', 7, 105),
(175, 'Kinnaur', 7, 105),
(176, 'Kulu', 7, 105),
(177, 'Lahaul and Spiti', 7, 105),
(178, 'Mandi', 7, 105),
(179, 'Shimla', 7, 105),
(180, 'Sirmaur', 7, 105),
(181, 'Solan', 7, 105),
(182, 'Una', 7, 105),
(183, 'Anantnag', 8, 105),
(184, 'Badgam', 8, 105),
(185, 'Bandipore', 8, 105),
(186, 'Baramula', 8, 105),
(187, 'Doda', 8, 105),
(188, 'Jammu', 8, 105),
(189, 'Kargil', 8, 105),
(190, 'Kathua', 8, 105),
(191, 'Kupwara', 8, 105),
(192, 'Leh', 8, 105),
(193, 'Poonch', 8, 105),
(194, 'Pulwama', 8, 105),
(195, 'Rajauri', 8, 105),
(196, 'Srinagar', 8, 105),
(197, 'Samba', 8, 105),
(198, 'Udhampur', 8, 105),
(199, 'Bokaro', 34, 105),
(200, 'Chatra', 34, 105),
(201, 'Deoghar', 34, 105),
(202, 'Dhanbad', 34, 105),
(203, 'Dumka', 34, 105),
(204, 'Purba Singhbhum', 34, 105),
(205, 'Garhwa', 34, 105),
(206, 'Giridih', 34, 105),
(207, 'Godda', 34, 105),
(208, 'Gumla', 34, 105),
(209, 'Hazaribagh', 34, 105),
(210, 'Koderma', 34, 105),
(211, 'Lohardaga', 34, 105),
(212, 'Pakur', 34, 105),
(213, 'Palamu', 34, 105),
(214, 'Ranchi', 34, 105),
(215, 'Sahibganj', 34, 105),
(216, 'Seraikela and Kharsawan', 34, 105),
(217, 'Pashchim Singhbhum', 34, 105),
(218, 'Ramgarh', 34, 105),
(219, 'Bidar', 9, 105),
(220, 'Belgaum', 9, 105),
(221, 'Bijapur', 9, 105),
(222, 'Bagalkot', 9, 105),
(223, 'Bellary', 9, 105),
(224, 'Bangalore Rural District', 9, 105),
(225, 'Bangalore Urban District', 9, 105),
(226, 'Chamarajnagar', 9, 105),
(227, 'Chikmagalur', 9, 105),
(228, 'Chitradurga', 9, 105),
(229, 'Davanagere', 9, 105),
(230, 'Dharwad', 9, 105),
(231, 'Dakshina Kannada', 9, 105),
(232, 'Gadag', 9, 105),
(233, 'Gulbarga', 9, 105),
(234, 'Hassan', 9, 105),
(235, 'Haveri District', 9, 105),
(236, 'Kodagu', 9, 105),
(237, 'Kolar', 9, 105),
(238, 'Koppal', 9, 105),
(239, 'Mandya', 9, 105),
(240, 'Mysore', 9, 105),
(241, 'Raichur', 9, 105),
(242, 'Shimoga', 9, 105),
(243, 'Tumkur', 9, 105),
(244, 'Udupi', 9, 105),
(245, 'Uttara Kannada', 9, 105),
(246, 'Ramanagara', 9, 105),
(247, 'Chikballapur', 9, 105),
(248, 'Yadagiri', 9, 105),
(249, 'Alappuzha', 10, 105),
(250, 'Ernakulam', 10, 105),
(251, 'Idukki', 10, 105),
(252, 'Kollam', 10, 105),
(253, 'Kannur', 10, 105),
(254, 'Kasaragod', 10, 105),
(255, 'Kottayam', 10, 105),
(256, 'Kozhikode', 10, 105),
(257, 'Malappuram', 10, 105),
(258, 'Palakkad', 10, 105),
(259, 'Pathanamthitta', 10, 105),
(260, 'Thrissur', 10, 105),
(261, 'Thiruvananthapuram', 10, 105),
(262, 'Wayanad', 10, 105),
(263, 'Alirajpur', 11, 105),
(264, 'Anuppur', 11, 105),
(265, 'Ashok Nagar', 11, 105),
(266, 'Balaghat', 11, 105),
(267, 'Barwani', 11, 105),
(268, 'Betul', 11, 105),
(269, 'Bhind', 11, 105),
(270, 'Bhopal', 11, 105),
(271, 'Burhanpur', 11, 105),
(272, 'Chhatarpur', 11, 105),
(273, 'Chhindwara', 11, 105),
(274, 'Damoh', 11, 105),
(275, 'Datia', 11, 105),
(276, 'Dewas', 11, 105),
(277, 'Dhar', 11, 105),
(278, 'Dindori', 11, 105),
(279, 'Guna', 11, 105),
(280, 'Gwalior', 11, 105),
(281, 'Harda', 11, 105),
(282, 'Hoshangabad', 11, 105),
(283, 'Indore', 11, 105),
(284, 'Jabalpur', 11, 105),
(285, 'Jhabua', 11, 105),
(286, 'Katni', 11, 105),
(287, 'Khandwa', 11, 105),
(288, 'Khargone', 11, 105),
(289, 'Mandla', 11, 105),
(290, 'Mandsaur', 11, 105),
(291, 'Morena', 11, 105),
(292, 'Narsinghpur', 11, 105),
(293, 'Neemuch', 11, 105),
(294, 'Panna', 11, 105),
(295, 'Rewa', 11, 105),
(296, 'Rajgarh', 11, 105),
(297, 'Ratlam', 11, 105),
(298, 'Raisen', 11, 105),
(299, 'Sagar', 11, 105),
(300, 'Satna', 11, 105),
(301, 'Sehore', 11, 105),
(302, 'Seoni', 11, 105),
(303, 'Shahdol', 11, 105),
(304, 'Shajapur', 11, 105),
(305, 'Sheopur', 11, 105),
(306, 'Shivpuri', 11, 105),
(307, 'Sidhi', 11, 105),
(308, 'Singrauli', 11, 105),
(309, 'Tikamgarh', 11, 105),
(310, 'Ujjain', 11, 105),
(311, 'Umaria', 11, 105),
(312, 'Vidisha', 11, 105),
(313, 'Ahmednagar', 12, 105),
(314, 'Akola', 12, 105),
(315, 'Amrawati', 12, 105),
(316, 'Aurangabad', 12, 105),
(317, 'Bhandara', 12, 105),
(318, 'Beed', 12, 105),
(319, 'Buldhana', 12, 105),
(320, 'Chandrapur', 12, 105),
(321, 'Dhule', 12, 105),
(322, 'Gadchiroli', 12, 105),
(323, 'Gondiya', 12, 105),
(324, 'Hingoli', 12, 105),
(325, 'Jalgaon', 12, 105),
(326, 'Jalna', 12, 105),
(327, 'Kolhapur', 12, 105),
(328, 'Latur', 12, 105),
(329, 'Mumbai City', 12, 105),
(330, 'Mumbai suburban', 12, 105),
(331, 'Nandurbar', 12, 105),
(332, 'Nanded', 12, 105),
(333, 'Nagpur', 12, 105),
(334, 'Nashik', 12, 105),
(335, 'Osmanabad', 12, 105),
(336, 'Parbhani', 12, 105),
(337, 'Pune', 12, 105),
(338, 'Raigad', 12, 105),
(339, 'Ratnagiri', 12, 105),
(340, 'Sindhudurg', 12, 105),
(341, 'Sangli', 12, 105),
(342, 'Solapur', 12, 105),
(343, 'Satara', 12, 105),
(344, 'Thane', 12, 105),
(345, 'Wardha', 12, 105),
(346, 'Washim', 12, 105),
(347, 'Yavatmal', 12, 105),
(348, 'Bishnupur', 13, 105),
(349, 'Churachandpur', 13, 105),
(350, 'Chandel', 13, 105),
(351, 'Imphal East', 13, 105),
(352, 'Senapati', 13, 105),
(353, 'Tamenglong', 13, 105),
(354, 'Thoubal', 13, 105),
(355, 'Ukhrul', 13, 105),
(356, 'Imphal West', 13, 105),
(357, 'East Garo Hills', 14, 105),
(358, 'East Khasi Hills', 14, 105),
(359, 'Jaintia Hills', 14, 105),
(360, 'Ri-Bhoi', 14, 105),
(361, 'South Garo Hills', 14, 105),
(362, 'West Garo Hills', 14, 105),
(363, 'West Khasi Hills', 14, 105),
(364, 'Aizawl', 15, 105),
(365, 'Champhai', 15, 105),
(366, 'Kolasib', 15, 105),
(367, 'Lawngtlai', 15, 105),
(368, 'Lunglei', 15, 105),
(369, 'Mamit', 15, 105),
(370, 'Saiha', 15, 105),
(371, 'Serchhip', 15, 105),
(372, 'Dimapur', 16, 105),
(373, 'Kohima', 16, 105),
(374, 'Mokokchung', 16, 105),
(375, 'Mon', 16, 105),
(376, 'Phek', 16, 105),
(377, 'Tuensang', 16, 105),
(378, 'Wokha', 16, 105),
(379, 'Zunheboto', 16, 105),
(380, 'Angul', 17, 105),
(381, 'Boudh', 17, 105),
(382, 'Bhadrak', 17, 105),
(383, 'Bolangir', 17, 105),
(384, 'Bargarh', 17, 105),
(385, 'Baleswar', 17, 105),
(386, 'Cuttack', 17, 105),
(387, 'Debagarh', 17, 105),
(388, 'Dhenkanal', 17, 105),
(389, 'Ganjam', 17, 105),
(390, 'Gajapati', 17, 105),
(391, 'Jharsuguda', 17, 105),
(392, 'Jajapur', 17, 105),
(393, 'Jagatsinghpur', 17, 105),
(394, 'Khordha', 17, 105),
(395, 'Kendujhar', 17, 105),
(396, 'Kalahandi', 17, 105),
(397, 'Kandhamal', 17, 105),
(398, 'Koraput', 17, 105),
(399, 'Kendrapara', 17, 105),
(400, 'Malkangiri', 17, 105),
(401, 'Mayurbhanj', 17, 105),
(402, 'Nabarangpur', 17, 105),
(403, 'Nuapada', 17, 105),
(404, 'Nayagarh', 17, 105),
(405, 'Puri', 17, 105),
(406, 'Rayagada', 17, 105),
(407, 'Sambalpur', 17, 105),
(408, 'Subarnapur', 17, 105),
(409, 'Sundargarh', 17, 105),
(410, 'Karaikal', 27, 105),
(411, 'Mahe', 27, 105),
(412, 'Puducherry', 27, 105),
(413, 'Yanam', 27, 105),
(414, 'Amritsar', 18, 105),
(415, 'Bathinda', 18, 105),
(416, 'Firozpur', 18, 105),
(417, 'Faridkot', 18, 105),
(418, 'Fatehgarh Sahib', 18, 105),
(419, 'Gurdaspur', 18, 105),
(420, 'Hoshiarpur', 18, 105),
(421, 'Jalandhar', 18, 105),
(422, 'Kapurthala', 18, 105),
(423, 'Ludhiana', 18, 105),
(424, 'Mansa', 18, 105),
(425, 'Moga', 18, 105),
(426, 'Mukatsar', 18, 105),
(427, 'Nawan Shehar', 18, 105),
(428, 'Patiala', 18, 105),
(429, 'Rupnagar', 18, 105),
(430, 'Sangrur', 18, 105),
(431, 'Ajmer', 19, 105),
(432, 'Alwar', 19, 105),
(433, 'Bikaner', 19, 105),
(434, 'Barmer', 19, 105),
(435, 'Banswara', 19, 105),
(436, 'Bharatpur', 19, 105),
(437, 'Baran', 19, 105),
(438, 'Bundi', 19, 105),
(439, 'Bhilwara', 19, 105),
(440, 'Churu', 19, 105),
(441, 'Chittorgarh', 19, 105),
(442, 'Dausa', 19, 105),
(443, 'Dholpur', 19, 105),
(444, 'Dungapur', 19, 105),
(445, 'Ganganagar', 19, 105),
(446, 'Hanumangarh', 19, 105),
(447, 'Juhnjhunun', 19, 105),
(448, 'Jalore', 19, 105),
(449, 'Jodhpur', 19, 105),
(450, 'Jaipur', 19, 105),
(451, 'Jaisalmer', 19, 105),
(452, 'Jhalawar', 19, 105),
(453, 'Karauli', 19, 105),
(454, 'Kota', 19, 105),
(455, 'Nagaur', 19, 105),
(456, 'Pali', 19, 105),
(457, 'Pratapgarh', 19, 105),
(458, 'Rajsamand', 19, 105),
(459, 'Sikar', 19, 105),
(460, 'Sawai Madhopur', 19, 105),
(461, 'Sirohi', 19, 105),
(462, 'Tonk', 19, 105),
(463, 'Udaipur', 19, 105),
(464, 'East Sikkim', 20, 105),
(465, 'North Sikkim', 20, 105),
(466, 'South Sikkim', 20, 105),
(467, 'West Sikkim', 20, 105),
(468, 'Ariyalur', 21, 105),
(469, 'Chennai', 21, 105),
(470, 'Coimbatore', 21, 105),
(471, 'Cuddalore', 21, 105),
(472, 'Dharmapuri', 21, 105),
(473, 'Dindigul', 21, 105),
(474, 'Erode', 21, 105),
(475, 'Kanchipuram', 21, 105),
(476, 'Kanyakumari', 21, 105),
(477, 'Karur', 21, 105),
(478, 'Madurai', 21, 105),
(479, 'Nagapattinam', 21, 105),
(480, 'The Nilgiris', 21, 105),
(481, 'Namakkal', 21, 105),
(482, 'Perambalur', 21, 105),
(483, 'Pudukkottai', 21, 105),
(484, 'Ramanathapuram', 21, 105),
(485, 'Salem', 21, 105),
(486, 'Sivagangai', 21, 105),
(487, 'Tiruppur', 21, 105),
(488, 'Tiruchirappalli', 21, 105),
(489, 'Theni', 21, 105),
(490, 'Tirunelveli', 21, 105),
(491, 'Thanjavur', 21, 105),
(492, 'Thoothukudi', 21, 105),
(493, 'Thiruvallur', 21, 105),
(494, 'Thiruvarur', 21, 105),
(495, 'Tiruvannamalai', 21, 105),
(496, 'Vellore', 21, 105),
(497, 'Villupuram', 21, 105),
(498, 'Dhalai', 22, 105),
(499, 'North Tripura', 22, 105),
(500, 'South Tripura', 22, 105),
(501, 'West Tripura', 22, 105),
(502, 'Almora', 33, 105),
(503, 'Bageshwar', 33, 105),
(504, 'Chamoli', 33, 105),
(505, 'Champawat', 33, 105),
(506, 'Dehradun', 33, 105),
(507, 'Haridwar', 33, 105),
(508, 'Nainital', 33, 105),
(509, 'Pauri Garhwal', 33, 105),
(510, 'Pithoragharh', 33, 105),
(511, 'Rudraprayag', 33, 105),
(512, 'Tehri Garhwal', 33, 105),
(513, 'Udham Singh Nagar', 33, 105),
(514, 'Uttarkashi', 33, 105),
(515, 'Agra', 23, 105),
(516, 'Allahabad', 23, 105),
(517, 'Aligarh', 23, 105),
(518, 'Ambedkar Nagar', 23, 105),
(519, 'Auraiya', 23, 105),
(520, 'Azamgarh', 23, 105),
(521, 'Barabanki', 23, 105),
(522, 'Badaun', 23, 105),
(523, 'Bagpat', 23, 105),
(524, 'Bahraich', 23, 105),
(525, 'Bijnor', 23, 105),
(526, 'Ballia', 23, 105),
(527, 'Banda', 23, 105),
(528, 'Balrampur', 23, 105),
(529, 'Bareilly', 23, 105),
(530, 'Basti', 23, 105),
(531, 'Bulandshahr', 23, 105),
(532, 'Chandauli', 23, 105),
(533, 'Chitrakoot', 23, 105),
(534, 'Deoria', 23, 105),
(535, 'Etah', 23, 105),
(536, 'Kanshiram Nagar', 23, 105),
(537, 'Etawah', 23, 105),
(538, 'Firozabad', 23, 105),
(539, 'Farrukhabad', 23, 105),
(540, 'Fatehpur', 23, 105),
(541, 'Faizabad', 23, 105),
(542, 'Gautam Buddha Nagar', 23, 105),
(543, 'Gonda', 23, 105),
(544, 'Ghazipur', 23, 105),
(545, 'Gorkakhpur', 23, 105),
(546, 'Ghaziabad', 23, 105),
(547, 'Hamirpur', 23, 105),
(548, 'Hardoi', 23, 105),
(549, 'Mahamaya Nagar', 23, 105),
(550, 'Jhansi', 23, 105),
(551, 'Jalaun', 23, 105),
(552, 'Jyotiba Phule Nagar', 23, 105),
(553, 'Jaunpur District', 23, 105),
(554, 'Kanpur Dehat', 23, 105),
(555, 'Kannauj', 23, 105),
(556, 'Kanpur Nagar', 23, 105),
(557, 'Kaushambi', 23, 105),
(558, 'Kushinagar', 23, 105),
(559, 'Lalitpur', 23, 105),
(560, 'Lakhimpur Kheri', 23, 105),
(561, 'Lucknow', 23, 105),
(562, 'Mau', 23, 105),
(563, 'Meerut', 23, 105),
(564, 'Maharajganj', 23, 105),
(565, 'Mahoba', 23, 105),
(566, 'Mirzapur', 23, 105),
(567, 'Moradabad', 23, 105),
(568, 'Mainpuri', 23, 105),
(569, 'Mathura', 23, 105),
(570, 'Muzaffarnagar', 23, 105),
(571, 'Pilibhit', 23, 105),
(572, 'Pratapgarh', 23, 105),
(573, 'Rampur', 23, 105),
(574, 'Rae Bareli', 23, 105),
(575, 'Saharanpur', 23, 105),
(576, 'Sitapur', 23, 105),
(577, 'Shahjahanpur', 23, 105),
(578, 'Sant Kabir Nagar', 23, 105),
(579, 'Siddharthnagar', 23, 105),
(580, 'Sonbhadra', 23, 105),
(581, 'Sant Ravidas Nagar', 23, 105),
(582, 'Sultanpur', 23, 105),
(583, 'Shravasti', 23, 105),
(584, 'Unnao', 23, 105),
(585, 'Varanasi', 23, 105),
(586, 'Birbhum', 24, 105),
(587, 'Bankura', 24, 105),
(588, 'Bardhaman', 24, 105),
(589, 'Darjeeling', 24, 105),
(590, 'Dakshin Dinajpur', 24, 105),
(591, 'Hooghly', 24, 105),
(592, 'Howrah', 24, 105),
(593, 'Jalpaiguri', 24, 105),
(594, 'Cooch Behar', 24, 105),
(595, 'Kolkata', 24, 105),
(596, 'Malda', 24, 105),
(597, 'Midnapore', 24, 105),
(598, 'Murshidabad', 24, 105),
(599, 'Nadia', 24, 105),
(600, 'North 24 Parganas', 24, 105),
(601, 'South 24 Parganas', 24, 105),
(602, 'Purulia', 24, 105),
(603, 'Uttar Dinajpur', 24, 105),
(604, 'sdfadsfdsfdsf', 14, 105),
(605, 'dfgdfgfsdgdfg', 16, 105),
(606, 'dfsgdfgdgdfgdfgf', 1, 105),
(607, 'Lucknow', 23, 105),
(608, 'Newsssss', 15, 105),
(609, 'gfdsgdfd', 1, 105),
(610, 'dfsgdfgdfg', 2, 105),
(611, 'District Names', 33, 105),
(612, 'New District', 32, 105);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_clinical_details`
--

DROP TABLE IF EXISTS `tbl_clinical_details`;
CREATE TABLE IF NOT EXISTS `tbl_clinical_details` (
  `id` int NOT NULL AUTO_INCREMENT,
  `clinical_detail` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_clinical_details`
--

INSERT INTO `tbl_clinical_details` (`id`, `clinical_detail`) VALUES
(5, 'Beds'),
(6, 'OPD'),
(7, 'OPD'),
(8, 'BOR'),
(9, 'Deaths'),
(10, 'Casualties'),
(11, 'Month'),
(12, 'Year'),
(14, 'gfdsgdfd'),
(15, 'dfsgdfgdfg'),
(16, 'gfdsgdfd'),
(17, 'RTY'),
(18, ''),
(19, ''),
(20, 'Clinical One'),
(21, 'dfgsdgdfgfdg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_clinic_details`
--

DROP TABLE IF EXISTS `tbl_clinic_details`;
CREATE TABLE IF NOT EXISTS `tbl_clinic_details` (
  `id` int NOT NULL AUTO_INCREMENT,
  `details` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_clinic_details`
--

INSERT INTO `tbl_clinic_details` (`id`, `details`, `created_at`, `updated_at`) VALUES
(1, 'CLINICAL NAME', '2023-11-10 18:16:59', '2023-11-10 18:16:59'),
(3, 'Clinical 2', '2023-12-04 19:09:14', '2023-12-25 19:15:28'),
(4, 'dfsgdfgdfg', '2023-12-04 19:09:14', '2023-12-04 19:09:14'),
(5, 'Clinical One', '2023-12-25 19:15:28', '2023-12-25 19:15:28'),
(6, 'dsfdfsfdf', '2023-12-28 18:58:08', '2023-12-28 18:58:08');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_clinic_facility`
--

DROP TABLE IF EXISTS `tbl_clinic_facility`;
CREATE TABLE IF NOT EXISTS `tbl_clinic_facility` (
  `id` int NOT NULL AUTO_INCREMENT,
  `facility` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_clinic_facility`
--

INSERT INTO `tbl_clinic_facility` (`id`, `facility`, `created_at`, `updated_at`) VALUES
(1, 'CLINICAL FACILITIES NAME', '2023-11-10 18:40:36', '2023-11-10 18:40:36'),
(3, 'Bed', '2023-12-04 19:24:30', '2023-12-25 19:19:09'),
(4, 'dfsgdfgdfg', '2023-12-04 19:24:30', '2023-12-04 19:24:30'),
(5, 'Chairs', '2023-12-25 19:19:09', '2023-12-25 19:19:09'),
(6, 'rrrrrreer', '2023-12-28 18:58:56', '2023-12-28 18:58:56');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_college`
--

DROP TABLE IF EXISTS `tbl_college`;
CREATE TABLE IF NOT EXISTS `tbl_college` (
  `id` int NOT NULL AUTO_INCREMENT,
  `full_name` varchar(222) NOT NULL,
  `slug` varchar(55) NOT NULL,
  `short_description` longtext,
  `popular_name_one` varchar(222) DEFAULT NULL,
  `popular_name_two` varchar(222) DEFAULT NULL,
  `establishment` date DEFAULT NULL,
  `gender_accepted` varchar(222) DEFAULT NULL,
  `course_offered` varchar(50) DEFAULT NULL,
  `country` int NOT NULL,
  `state` int NOT NULL,
  `city` int NOT NULL,
  `affiliated_by` varchar(55) DEFAULT NULL,
  `university_name` varchar(225) DEFAULT NULL,
  `approved_by` varchar(55) DEFAULT NULL,
  `college_logo` varchar(255) DEFAULT NULL,
  `college_banner` varchar(225) DEFAULT NULL,
  `prospectus_file` varchar(255) DEFAULT NULL,
  `ownership` int DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `contact_one` varchar(35) DEFAULT NULL,
  `contact_two` varchar(35) DEFAULT NULL,
  `contact_three` varchar(35) DEFAULT NULL,
  `nodal_officer_name` varchar(255) DEFAULT NULL,
  `nodal_officer_no` varchar(35) DEFAULT NULL,
  `keywords` text,
  `tags` text,
  `added_by` int DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_college`
--

INSERT INTO `tbl_college` (`id`, `full_name`, `slug`, `short_description`, `popular_name_one`, `popular_name_two`, `establishment`, `gender_accepted`, `course_offered`, `country`, `state`, `city`, `affiliated_by`, `university_name`, `approved_by`, `college_logo`, `college_banner`, `prospectus_file`, `ownership`, `website`, `email`, `contact_one`, `contact_two`, `contact_three`, `nodal_officer_name`, `nodal_officer_no`, `keywords`, `tags`, `added_by`, `status`, `created_at`, `updated_at`) VALUES
(2, 'College One', 'gddfgsdfgdfgdf-5dcf70fd6199e033b74af3f03b1015192653400e', 'sdfadsfdsfadsf', 'adsfasdf', 'gdfsgdfgdfg', '2024-01-20', '3|4', '3,7', 105, 19, 446, '5', 'sdafsdfdsfsdff', '8_NCISM_NCISM', '9c8af39c962c0644e2697aff8620e61d.jpg', '', '', 4, 'https://www.deepanshumishra.com', 'mdeepanshu205@gmail.com', '646446456', '4564', '43534534543', '', '453535453', '', 'fsdfsafdsf, adsfdsf, adsfsdf, sadfasdf, asdfasdf', 5, 0, '2023-11-08 18:04:48', '2024-02-28 20:24:11'),
(4, 'College Two', 'gddfgsdfgdfgdf-5dcf70fd6199e033b74af3f03b1015192653400e', 'sdfadsfdsfadsf', 'adsfasdf', 'gdfsgdfgdfg', '2024-01-21', '3|4', '3', 105, 19, 446, '5', 'sdafsdfdsfsdff', '8_NCISM_NCISM', 'COLLEGE_IMAGE3092744151699982184.jpeg', '', '', 4, 'https://www.deepanshumishra.com', '', '45645654645', '45654645656', '43534534543', 'dsfgdfgdfgdf', '455445334', 'dgdfgsdfgdf, dsfgdfgdfg, sdfgdgdfg, dsfgdfgdfsgd', 'fsdfsafdsf, adsfdsf, adsfsdf, sadfasdf, asdfasdf', 5, 0, '2023-11-08 18:07:21', '2024-01-10 20:34:06'),
(5, 'BBD', 'bbd-9b5b2c2b02e680f7a7df71855539dc019bdddf89', 'gdsfgdfgdsfgfdgfdsgdfg', 'dfgsdfg', 'dsfgsdfgfdsg', '2024-01-22', '3|4', '2,5', 105, 19, 3, '5', 'fhdhghhghdh', '8_NCISM_NCISM', '9c8af39c962c0644e2697aff8620e61d.jpg', '', '', 4, 'https://www.deepanshumishra.com', 'mishra100.343@rediffmail.com', '4645645645', '45646565466', '45656565655', 'dgfggfdgdsfg', '433543534', 'sdfsfsfsd|asfsdfsdf|asdfasf|sdaafadsf', 'sdfsfsfsd|asfsdfsdf|asdfasf|sdaafadsf', 5, 0, '2023-12-05 17:39:46', '2024-02-28 20:24:14');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_counselling_head`
--

DROP TABLE IF EXISTS `tbl_counselling_head`;
CREATE TABLE IF NOT EXISTS `tbl_counselling_head` (
  `id` int NOT NULL AUTO_INCREMENT,
  `head_name` varchar(255) DEFAULT NULL,
  `course_id` varchar(255) DEFAULT NULL,
  `level_id` int DEFAULT NULL,
  `exams` varchar(255) DEFAULT NULL,
  `state_id` int DEFAULT NULL,
  `college` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `level_id` (`level_id`),
  KEY `state_id` (`state_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_counselling_head`
--

INSERT INTO `tbl_counselling_head` (`id`, `head_name`, `course_id`, `level_id`, `exams`, `state_id`, `college`) VALUES
(2, 'BIHAR MBBS', '3,5', 2, '1|3', 15, ''),
(3, 'BIHAR BDS', '3,2', 2, '4_UG', 12, ''),
(4, 'BIHAR MD', '2,4,5', 2, '4_UG', 12, ''),
(5, 'BIHAR Phd', '5,6', 2, '4_UG', 12, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_counselling_level`
--

DROP TABLE IF EXISTS `tbl_counselling_level`;
CREATE TABLE IF NOT EXISTS `tbl_counselling_level` (
  `id` int NOT NULL AUTO_INCREMENT,
  `level` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_counselling_level`
--

INSERT INTO `tbl_counselling_level` (`id`, `level`) VALUES
(2, 'State Counsellings'),
(3, 'Central Counselling');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_counsellng_plans`
--

DROP TABLE IF EXISTS `tbl_counsellng_plans`;
CREATE TABLE IF NOT EXISTS `tbl_counsellng_plans` (
  `id` int NOT NULL AUTO_INCREMENT,
  `plan_name` text,
  `slug` varchar(255) NOT NULL,
  `degree_type_id` int DEFAULT NULL,
  `course_id` int DEFAULT NULL,
  `price` double(10,2) NOT NULL,
  `discount_percentage` double(10,2) DEFAULT NULL,
  `discounted_price` double(10,2) DEFAULT NULL,
  `description` longtext,
  `terms_condition` longtext,
  `paid_counselling_registration` longtext,
  `payment_info` longtext,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `degree_type_id` (`degree_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_counsellng_plans`
--

INSERT INTO `tbl_counsellng_plans` (`id`, `plan_name`, `slug`, `degree_type_id`, `course_id`, `price`, `discount_percentage`, `discounted_price`, `description`, `terms_condition`, `paid_counselling_registration`, `payment_info`, `status`, `created_at`, `updated_at`) VALUES
(3, 'dfsgdfgdfgdsgdfsgfg', 'dfsgdfgdfgdsgdfsgfg-6f46733d5536079b6c438064762756aef69f82da', 4, 2, 0.00, 15.00, 252.00, 'DescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescription', '<p>asdfasdfasf</p>\r\n', '<p>dsfsafsdfdsf</p>\r\n', '<p>sadfasdfsdfdsfadsfsdf</p>\r\n', 1, '2023-11-29 18:46:01', '2023-11-29 18:51:11'),
(5, 'Plan One', 'plan-one-a3cc5692cce946920a35433546b2fc65d2534af8', 4, 2, 0.00, 15.00, 252.00, 'DescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescription', '<p>asdfasdfasf</p>', '<p>dsfsafsdfdsf</p>', '<p>sadfasdfsdfdsfadsfsdf</p>', 1, '2023-12-05 19:08:22', '2023-12-27 17:31:43'),
(6, 'Plan One', 'plan-one-a3cc5692cce946920a35433546b2fc65d2534af8', 4, 2, 0.00, 15.00, 252.00, 'DescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescription', '<p>asdfasdfasf</p>', '<p>dsfsafsdfdsf</p>', '<p>sadfasdfsdfdsfadsfsdf</p>', 1, '2023-12-27 17:31:43', NULL),
(7, 'Plan One', 'plan-one-a3cc5692cce946920a35433546b2fc65d2534af8', 4, 2, 0.00, 15.00, 252.00, 'DescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescription', '<p>asdfasdfasf</p>', '<p>dsfsafsdfdsf</p>', '<p>sadfasdfsdfdsfadsfsdf</p>', 1, '2023-12-28 19:19:02', NULL),
(8, 'New Plan', 'new-plan-879e9563b6f6bdc8f6791c861cbf49d011f20f6a', NULL, NULL, 350.00, NULL, 300.00, '<ul>\r\n	<li>Tuition Fees Info</li>\r\n	<li>Seat Matrix Info</li>\r\n	<li>Approved Colleges Info</li>\r\n	<li>Cutoff Info</li>\r\n	<li>Category Info</li>\r\n	<li>Counselling Dates</li>\r\n</ul>\r\n', '<p>&nbsp;</p>\r\n\r\n<p>Terms &amp; Condition</p>\r\n\r\n<p><a href=\"javascript:void(\'Cut\')\" onclick=\"CKEDITOR.tools.callFunction(4,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Copy\')\" onclick=\"CKEDITOR.tools.callFunction(7,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Paste\')\" onclick=\"CKEDITOR.tools.callFunction(10,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Paste as plain text\')\" onclick=\"CKEDITOR.tools.callFunction(13,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Paste from Word\')\" onclick=\"CKEDITOR.tools.callFunction(16,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Undo\')\" onclick=\"CKEDITOR.tools.callFunction(19,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Redo\')\" onclick=\"CKEDITOR.tools.callFunction(22,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Spell Checker\')\" onclick=\"CKEDITOR.tools.callFunction(25,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Link\')\" onclick=\"CKEDITOR.tools.callFunction(28,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Unlink\')\" onclick=\"CKEDITOR.tools.callFunction(31,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Anchor\')\" onclick=\"CKEDITOR.tools.callFunction(34,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Image\')\" onclick=\"CKEDITOR.tools.callFunction(37,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Table\')\" onclick=\"CKEDITOR.tools.callFunction(40,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Insert Horizontal Line\')\" onclick=\"CKEDITOR.tools.callFunction(43,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Insert Special Character\')\" onclick=\"CKEDITOR.tools.callFunction(46,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Maximize\')\" onclick=\"CKEDITOR.tools.callFunction(49,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Source\')\" onclick=\"CKEDITOR.tools.callFunction(52,this);return false;\">&nbsp;Source</a><a href=\"javascript:void(\'Bold\')\" onclick=\"CKEDITOR.tools.callFunction(55,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Italic\')\" onclick=\"CKEDITOR.tools.callFunction(58,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Strikethrough\')\" onclick=\"CKEDITOR.tools.callFunction(61,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Remove Format\')\" onclick=\"CKEDITOR.tools.callFunction(64,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Insert/Remove Numbered List\')\" onclick=\"CKEDITOR.tools.callFunction(67,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Insert/Remove Bulleted List\')\" onclick=\"CKEDITOR.tools.callFunction(70,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Decrease Indent\')\" onclick=\"CKEDITOR.tools.callFunction(73,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Increase Indent\')\" onclick=\"CKEDITOR.tools.callFunction(76,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Block Quote\')\" onclick=\"CKEDITOR.tools.callFunction(79,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Formatting Styles\')\" onclick=\"CKEDITOR.tools.callFunction(80,this);return false;\">Styles</a><a href=\"javascript:void(\'Paragraph Format\')\" onclick=\"CKEDITOR.tools.callFunction(83,this);return false;\">Format</a><a href=\"javascript:void(\'About CKEditor 4\')\" onclick=\"CKEDITOR.tools.callFunction(88,this);return false;\">&nbsp;</a></p>\r\n\r\n<p>Terms &amp; Condition</p>\r\n\r\n<p><a href=\"javascript:void(\'Cut\')\" onclick=\"CKEDITOR.tools.callFunction(4,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Copy\')\" onclick=\"CKEDITOR.tools.callFunction(7,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Paste\')\" onclick=\"CKEDITOR.tools.callFunction(10,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Paste as plain text\')\" onclick=\"CKEDITOR.tools.callFunction(13,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Paste from Word\')\" onclick=\"CKEDITOR.tools.callFunction(16,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Undo\')\" onclick=\"CKEDITOR.tools.callFunction(19,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Redo\')\" onclick=\"CKEDITOR.tools.callFunction(22,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Spell Checker\')\" onclick=\"CKEDITOR.tools.callFunction(25,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Link\')\" onclick=\"CKEDITOR.tools.callFunction(28,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Unlink\')\" onclick=\"CKEDITOR.tools.callFunction(31,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Anchor\')\" onclick=\"CKEDITOR.tools.callFunction(34,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Image\')\" onclick=\"CKEDITOR.tools.callFunction(37,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Table\')\" onclick=\"CKEDITOR.tools.callFunction(40,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Insert Horizontal Line\')\" onclick=\"CKEDITOR.tools.callFunction(43,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Insert Special Character\')\" onclick=\"CKEDITOR.tools.callFunction(46,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Maximize\')\" onclick=\"CKEDITOR.tools.callFunction(49,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Source\')\" onclick=\"CKEDITOR.tools.callFunction(52,this);return false;\">&nbsp;Source</a><a href=\"javascript:void(\'Bold\')\" onclick=\"CKEDITOR.tools.callFunction(55,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Italic\')\" onclick=\"CKEDITOR.tools.callFunction(58,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Strikethrough\')\" onclick=\"CKEDITOR.tools.callFunction(61,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Remove Format\')\" onclick=\"CKEDITOR.tools.callFunction(64,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Insert/Remove Numbered List\')\" onclick=\"CKEDITOR.tools.callFunction(67,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Insert/Remove Bulleted List\')\" onclick=\"CKEDITOR.tools.callFunction(70,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Decrease Indent\')\" onclick=\"CKEDITOR.tools.callFunction(73,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Increase Indent\')\" onclick=\"CKEDITOR.tools.callFunction(76,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Block Quote\')\" onclick=\"CKEDITOR.tools.callFunction(79,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Formatting Styles\')\" onclick=\"CKEDITOR.tools.callFunction(80,this);return false;\">Styles</a><a href=\"javascript:void(\'Paragraph Format\')\" onclick=\"CKEDITOR.tools.callFunction(83,this);return false;\">Format</a><a href=\"javascript:void(\'About CKEditor 4\')\" onclick=\"CKEDITOR.tools.callFunction(88,this);return false;\">&nbsp;</a></p>\r\n\r\n<p>Terms &amp; Condition</p>\r\n\r\n<p><a href=\"javascript:void(\'Cut\')\" onclick=\"CKEDITOR.tools.callFunction(4,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Copy\')\" onclick=\"CKEDITOR.tools.callFunction(7,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Paste\')\" onclick=\"CKEDITOR.tools.callFunction(10,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Paste as plain text\')\" onclick=\"CKEDITOR.tools.callFunction(13,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Paste from Word\')\" onclick=\"CKEDITOR.tools.callFunction(16,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Undo\')\" onclick=\"CKEDITOR.tools.callFunction(19,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Redo\')\" onclick=\"CKEDITOR.tools.callFunction(22,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Spell Checker\')\" onclick=\"CKEDITOR.tools.callFunction(25,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Link\')\" onclick=\"CKEDITOR.tools.callFunction(28,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Unlink\')\" onclick=\"CKEDITOR.tools.callFunction(31,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Anchor\')\" onclick=\"CKEDITOR.tools.callFunction(34,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Image\')\" onclick=\"CKEDITOR.tools.callFunction(37,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Table\')\" onclick=\"CKEDITOR.tools.callFunction(40,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Insert Horizontal Line\')\" onclick=\"CKEDITOR.tools.callFunction(43,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Insert Special Character\')\" onclick=\"CKEDITOR.tools.callFunction(46,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Maximize\')\" onclick=\"CKEDITOR.tools.callFunction(49,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Source\')\" onclick=\"CKEDITOR.tools.callFunction(52,this);return false;\">&nbsp;Source</a><a href=\"javascript:void(\'Bold\')\" onclick=\"CKEDITOR.tools.callFunction(55,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Italic\')\" onclick=\"CKEDITOR.tools.callFunction(58,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Strikethrough\')\" onclick=\"CKEDITOR.tools.callFunction(61,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Remove Format\')\" onclick=\"CKEDITOR.tools.callFunction(64,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Insert/Remove Numbered List\')\" onclick=\"CKEDITOR.tools.callFunction(67,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Insert/Remove Bulleted List\')\" onclick=\"CKEDITOR.tools.callFunction(70,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Decrease Indent\')\" onclick=\"CKEDITOR.tools.callFunction(73,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Increase Indent\')\" onclick=\"CKEDITOR.tools.callFunction(76,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Block Quote\')\" onclick=\"CKEDITOR.tools.callFunction(79,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Formatting Styles\')\" onclick=\"CKEDITOR.tools.callFunction(80,this);return false;\">Styles</a><a href=\"javascript:void(\'Paragraph Format\')\" onclick=\"CKEDITOR.tools.callFunction(83,this);return false;\">Format</a><a href=\"javascript:void(\'About CKEditor 4\')\" onclick=\"CKEDITOR.tools.callFunction(88,this);return false;\">&nbsp;</a></p>\r\n\r\n<p>Terms &amp; Condition</p>\r\n\r\n<p><a href=\"javascript:void(\'Cut\')\" onclick=\"CKEDITOR.tools.callFunction(4,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Copy\')\" onclick=\"CKEDITOR.tools.callFunction(7,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Paste\')\" onclick=\"CKEDITOR.tools.callFunction(10,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Paste as plain text\')\" onclick=\"CKEDITOR.tools.callFunction(13,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Paste from Word\')\" onclick=\"CKEDITOR.tools.callFunction(16,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Undo\')\" onclick=\"CKEDITOR.tools.callFunction(19,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Redo\')\" onclick=\"CKEDITOR.tools.callFunction(22,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Spell Checker\')\" onclick=\"CKEDITOR.tools.callFunction(25,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Link\')\" onclick=\"CKEDITOR.tools.callFunction(28,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Unlink\')\" onclick=\"CKEDITOR.tools.callFunction(31,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Anchor\')\" onclick=\"CKEDITOR.tools.callFunction(34,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Image\')\" onclick=\"CKEDITOR.tools.callFunction(37,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Table\')\" onclick=\"CKEDITOR.tools.callFunction(40,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Insert Horizontal Line\')\" onclick=\"CKEDITOR.tools.callFunction(43,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Insert Special Character\')\" onclick=\"CKEDITOR.tools.callFunction(46,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Maximize\')\" onclick=\"CKEDITOR.tools.callFunction(49,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Source\')\" onclick=\"CKEDITOR.tools.callFunction(52,this);return false;\">&nbsp;Source</a><a href=\"javascript:void(\'Bold\')\" onclick=\"CKEDITOR.tools.callFunction(55,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Italic\')\" onclick=\"CKEDITOR.tools.callFunction(58,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Strikethrough\')\" onclick=\"CKEDITOR.tools.callFunction(61,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Remove Format\')\" onclick=\"CKEDITOR.tools.callFunction(64,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Insert/Remove Numbered List\')\" onclick=\"CKEDITOR.tools.callFunction(67,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Insert/Remove Bulleted List\')\" onclick=\"CKEDITOR.tools.callFunction(70,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Decrease Indent\')\" onclick=\"CKEDITOR.tools.callFunction(73,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Increase Indent\')\" onclick=\"CKEDITOR.tools.callFunction(76,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Block Quote\')\" onclick=\"CKEDITOR.tools.callFunction(79,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Formatting Styles\')\" onclick=\"CKEDITOR.tools.callFunction(80,this);return false;\">Styles</a><a href=\"javascript:void(\'Paragraph Format\')\" onclick=\"CKEDITOR.tools.callFunction(83,this);return false;\">Format</a><a href=\"javascript:void(\'About CKEditor 4\')\" onclick=\"CKEDITOR.tools.callFunction(88,this);return false;\">&nbsp;</a></p>\r\n\r\n<p>Terms &amp; Conditionfdgfdgdgfdg</p>\r\n\r\n<p><a href=\"javascript:void(\'Cut\')\" onclick=\"CKEDITOR.tools.callFunction(4,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Copy\')\" onclick=\"CKEDITOR.tools.callFunction(7,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Paste\')\" onclick=\"CKEDITOR.tools.callFunction(10,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Paste as plain text\')\" onclick=\"CKEDITOR.tools.callFunction(13,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Paste from Word\')\" onclick=\"CKEDITOR.tools.callFunction(16,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Undo\')\" onclick=\"CKEDITOR.tools.callFunction(19,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Redo\')\" onclick=\"CKEDITOR.tools.callFunction(22,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Spell Checker\')\" onclick=\"CKEDITOR.tools.callFunction(25,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Link\')\" onclick=\"CKEDITOR.tools.callFunction(28,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Unlink\')\" onclick=\"CKEDITOR.tools.callFunction(31,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Anchor\')\" onclick=\"CKEDITOR.tools.callFunction(34,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Image\')\" onclick=\"CKEDITOR.tools.callFunction(37,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Table\')\" onclick=\"CKEDITOR.tools.callFunction(40,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Insert Horizontal Line\')\" onclick=\"CKEDITOR.tools.callFunction(43,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Insert Special Character\')\" onclick=\"CKEDITOR.tools.callFunction(46,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Maximize\')\" onclick=\"CKEDITOR.tools.callFunction(49,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Source\')\" onclick=\"CKEDITOR.tools.callFunction(52,this);return false;\">&nbsp;Source</a><a href=\"javascript:void(\'Bold\')\" onclick=\"CKEDITOR.tools.callFunction(55,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Italic\')\" onclick=\"CKEDITOR.tools.callFunction(58,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Strikethrough\')\" onclick=\"CKEDITOR.tools.callFunction(61,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Remove Format\')\" onclick=\"CKEDITOR.tools.callFunction(64,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Insert/Remove Numbered List\')\" onclick=\"CKEDITOR.tools.callFunction(67,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Insert/Remove Bulleted List\')\" onclick=\"CKEDITOR.tools.callFunction(70,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Decrease Indent\')\" onclick=\"CKEDITOR.tools.callFunction(73,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Increase Indent\')\" onclick=\"CKEDITOR.tools.callFunction(76,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Block Quote\')\" onclick=\"CKEDITOR.tools.callFunction(79,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Formatting Styles\')\" onclick=\"CKEDITOR.tools.callFunction(80,this);return false;\">Styles</a><a href=\"javascript:void(\'Paragraph Format\')\" onclick=\"CKEDITOR.tools.callFunction(83,this);return false;\">Format</a><a href=\"javascript:void(\'About CKEditor 4\')\" onclick=\"CKEDITOR.tools.callFunction(88,this);return false;\">&nbsp;</a></p>\r\n\r\n<p>Terms &amp; Condition</p>\r\n\r\n<p><a href=\"javascript:void(\'Cut\')\" onclick=\"CKEDITOR.tools.callFunction(4,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Copy\')\" onclick=\"CKEDITOR.tools.callFunction(7,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Paste\')\" onclick=\"CKEDITOR.tools.callFunction(10,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Paste as plain text\')\" onclick=\"CKEDITOR.tools.callFunction(13,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Paste from Word\')\" onclick=\"CKEDITOR.tools.callFunction(16,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Undo\')\" onclick=\"CKEDITOR.tools.callFunction(19,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Redo\')\" onclick=\"CKEDITOR.tools.callFunction(22,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Spell Checker\')\" onclick=\"CKEDITOR.tools.callFunction(25,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Link\')\" onclick=\"CKEDITOR.tools.callFunction(28,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Unlink\')\" onclick=\"CKEDITOR.tools.callFunction(31,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Anchor\')\" onclick=\"CKEDITOR.tools.callFunction(34,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Image\')\" onclick=\"CKEDITOR.tools.callFunction(37,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Table\')\" onclick=\"CKEDITOR.tools.callFunction(40,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Insert Horizontal Line\')\" onclick=\"CKEDITOR.tools.callFunction(43,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Insert Special Character\')\" onclick=\"CKEDITOR.tools.callFunction(46,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Maximize\')\" onclick=\"CKEDITOR.tools.callFunction(49,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Source\')\" onclick=\"CKEDITOR.tools.callFunction(52,this);return false;\">&nbsp;Source</a><a href=\"javascript:void(\'Bold\')\" onclick=\"CKEDITOR.tools.callFunction(55,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Italic\')\" onclick=\"CKEDITOR.tools.callFunction(58,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Strikethrough\')\" onclick=\"CKEDITOR.tools.callFunction(61,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Remove Format\')\" onclick=\"CKEDITOR.tools.callFunction(64,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Insert/Remove Numbered List\')\" onclick=\"CKEDITOR.tools.callFunction(67,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Insert/Remove Bulleted List\')\" onclick=\"CKEDITOR.tools.callFunction(70,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Decrease Indent\')\" onclick=\"CKEDITOR.tools.callFunction(73,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Increase Indent\')\" onclick=\"CKEDITOR.tools.callFunction(76,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Block Quote\')\" onclick=\"CKEDITOR.tools.callFunction(79,this);return false;\">&nbsp;</a><a href=\"javascript:void(\'Formatting Styles\')\" onclick=\"CKEDITOR.tools.callFunction(80,this);return false;\">Styles</a><a href=\"javascript:void(\'Paragraph Format\')\" onclick=\"CKEDITOR.tools.callFunction(83,this);return false;\">Format</a><a href=\"javascript:void(\'About CKEditor 4\')\" onclick=\"CKEDITOR.tools.callFunction(88,this);return false;\">&nbsp;</a></p>\r\n', NULL, NULL, 1, '2024-03-04 19:00:48', '2024-03-04 19:31:09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_country`
--

DROP TABLE IF EXISTS `tbl_country`;
CREATE TABLE IF NOT EXISTS `tbl_country` (
  `id` int NOT NULL AUTO_INCREMENT,
  `countryCode` char(2) NOT NULL DEFAULT '',
  `name` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=258 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbl_country`
--

INSERT INTO `tbl_country` (`id`, `countryCode`, `name`) VALUES
(1, 'AD', 'Andorra'),
(2, 'AE', 'United Arab Emirates'),
(3, 'AF', 'Afghanistan'),
(4, 'AG', 'Antigua and Barbuda'),
(5, 'AI', 'Anguilla'),
(6, 'AL', 'Albania'),
(7, 'AM', 'Armenia'),
(8, 'AO', 'Angola'),
(9, 'AQ', 'Antarctica'),
(11, 'AS', 'American Samoa'),
(12, 'AT', 'Austria'),
(13, 'AU', 'Australia'),
(14, 'AW', 'Aruba'),
(15, 'AX', 'Åland'),
(16, 'AZ', 'Azerbaijan'),
(17, 'BA', 'Bosnia and Herzegovina'),
(18, 'BB', 'Barbados'),
(19, 'BD', 'Bangladesh'),
(20, 'BE', 'Belgium'),
(21, 'BF', 'Burkina Faso'),
(22, 'BG', 'Bulgaria'),
(23, 'BH', 'Bahrain'),
(24, 'BI', 'Burundi'),
(25, 'BJ', 'Benin'),
(26, 'BL', 'Saint Barthélemy'),
(27, 'BM', 'Bermuda'),
(28, 'BN', 'Brunei'),
(29, 'BO', 'Bolivia'),
(30, 'BQ', 'Bonaire'),
(31, 'BR', 'Brazil'),
(32, 'BS', 'Bahamas'),
(33, 'BT', 'Bhutan'),
(34, 'BV', 'Bouvet Island'),
(35, 'BW', 'Botswana'),
(36, 'BY', 'Belarus'),
(37, 'BZ', 'Belize'),
(38, 'CA', 'Canada'),
(39, 'CC', 'Cocos [Keeling] Islands'),
(40, 'CD', 'Democratic Republic of the Congo'),
(41, 'CF', 'Central African Republic'),
(42, 'CG', 'Republic of the Congo'),
(43, 'CH', 'Switzerland'),
(44, 'CI', 'Ivory Coast'),
(45, 'CK', 'Cook Islands'),
(46, 'CL', 'Chile'),
(47, 'CM', 'Cameroon'),
(48, 'CN', 'China'),
(49, 'CO', 'Colombia'),
(50, 'CR', 'Costa Rica'),
(51, 'CU', 'Cuba'),
(52, 'CV', 'Cape Verde'),
(53, 'CW', 'Curacao'),
(54, 'CX', 'Christmas Island'),
(55, 'CY', 'Cyprus'),
(56, 'CZ', 'Czech Republic'),
(57, 'DE', 'Germany'),
(58, 'DJ', 'Djibouti'),
(59, 'DK', 'Denmark'),
(60, 'DM', 'Dominica'),
(61, 'DO', 'Dominican Republic'),
(62, 'DZ', 'Algeria'),
(63, 'EC', 'Ecuador'),
(64, 'EE', 'Estonia'),
(65, 'EG', 'Egypt'),
(66, 'EH', 'Western Sahara'),
(67, 'ER', 'Eritrea'),
(68, 'ES', 'Spain'),
(69, 'ET', 'Ethiopia'),
(70, 'FI', 'Finland'),
(71, 'FJ', 'Fiji'),
(72, 'FK', 'Falkland Islands'),
(73, 'FM', 'Micronesia'),
(74, 'FO', 'Faroe Islands'),
(75, 'FR', 'France'),
(76, 'GA', 'Gabon'),
(77, 'GB', 'United Kingdom'),
(78, 'GD', 'Grenada'),
(79, 'GE', 'Georgia'),
(80, 'GF', 'French Guiana'),
(81, 'GG', 'Guernsey'),
(82, 'GH', 'Ghana'),
(83, 'GI', 'Gibraltar'),
(84, 'GL', 'Greenland'),
(85, 'GM', 'Gambia'),
(86, 'GN', 'Guinea'),
(87, 'GP', 'Guadeloupe'),
(88, 'GQ', 'Equatorial Guinea'),
(89, 'GR', 'Greece'),
(90, 'GS', 'South Georgia and the South Sandwich Islands'),
(91, 'GT', 'Guatemala'),
(92, 'GU', 'Guam'),
(93, 'GW', 'Guinea-Bissau'),
(94, 'GY', 'Guyana'),
(95, 'HK', 'Hong Kong'),
(96, 'HM', 'Heard Island and McDonald Islands'),
(97, 'HN', 'Honduras'),
(98, 'HR', 'Croatia'),
(99, 'HT', 'Haiti'),
(100, 'HU', 'Hungary'),
(101, 'ID', 'Indonesia'),
(102, 'IE', 'Ireland'),
(103, 'IL', 'Israel'),
(104, 'IM', 'Isle of Man'),
(105, 'IN', 'India'),
(106, 'IO', 'British Indian Ocean Territory'),
(107, 'IQ', 'Iraq'),
(108, 'IR', 'Iran'),
(109, 'IS', 'Iceland'),
(110, 'IT', 'Italy'),
(111, 'JE', 'Jersey'),
(112, 'JM', 'Jamaica'),
(113, 'JO', 'Jordan'),
(114, 'JP', 'Japan'),
(115, 'KE', 'Kenya'),
(116, 'KG', 'Kyrgyzstan'),
(117, 'KH', 'Cambodia'),
(118, 'KI', 'Kiribati'),
(119, 'KM', 'Comoros'),
(120, 'KN', 'Saint Kitts and Nevis'),
(121, 'KP', 'North Korea'),
(122, 'KR', 'South Korea'),
(123, 'KW', 'Kuwait'),
(124, 'KY', 'Cayman Islands'),
(125, 'KZ', 'Kazakhstan'),
(126, 'LA', 'Laos'),
(127, 'LB', 'Lebanon'),
(128, 'LC', 'Saint Lucia'),
(129, 'LI', 'Liechtenstein'),
(130, 'LK', 'Sri Lanka'),
(131, 'LR', 'Liberia'),
(132, 'LS', 'Lesotho'),
(133, 'LT', 'Lithuania'),
(134, 'LU', 'Luxembourg'),
(135, 'LV', 'Latvia'),
(136, 'LY', 'Libya'),
(137, 'MA', 'Morocco'),
(138, 'MC', 'Monaco'),
(139, 'MD', 'Moldova'),
(140, 'ME', 'Montenegro'),
(141, 'MF', 'Saint Martin'),
(142, 'MG', 'Madagascar'),
(143, 'MH', 'Marshall Islands'),
(144, 'MK', 'Macedonia'),
(145, 'ML', 'Mali'),
(146, 'MM', 'Myanmar [Burma]'),
(147, 'MN', 'Mongolia'),
(148, 'MO', 'Macao'),
(149, 'MP', 'Northern Mariana Islands'),
(150, 'MQ', 'Martinique'),
(151, 'MR', 'Mauritania'),
(152, 'MS', 'Montserrat'),
(153, 'MT', 'Malta'),
(154, 'MU', 'Mauritius'),
(155, 'MV', 'Maldives'),
(156, 'MW', 'Malawi'),
(157, 'MX', 'Mexico'),
(158, 'MY', 'Malaysia'),
(159, 'MZ', 'Mozambique'),
(160, 'NA', 'Namibia'),
(161, 'NC', 'New Caledonia'),
(162, 'NE', 'Niger'),
(163, 'NF', 'Norfolk Island'),
(164, 'NG', 'Nigeria'),
(165, 'NI', 'Nicaragua'),
(166, 'NL', 'Netherlands'),
(167, 'NO', 'Norway'),
(168, 'NP', 'Nepal'),
(169, 'NR', 'Nauru'),
(170, 'NU', 'Niue'),
(171, 'NZ', 'New Zealand'),
(172, 'OM', 'Oman'),
(173, 'PA', 'Panama'),
(174, 'PE', 'Peru'),
(175, 'PF', 'French Polynesia'),
(176, 'PG', 'Papua New Guinea'),
(177, 'PH', 'Philippines'),
(178, 'PK', 'Pakistan'),
(179, 'PL', 'Poland'),
(180, 'PM', 'Saint Pierre and Miquelon'),
(181, 'PN', 'Pitcairn Islands'),
(182, 'PR', 'Puerto Rico'),
(183, 'PS', 'Palestine'),
(184, 'PT', 'Portugal'),
(185, 'PW', 'Palau'),
(186, 'PY', 'Paraguay'),
(187, 'QA', 'Qatar'),
(188, 'RE', 'Réunion'),
(189, 'RO', 'Romania'),
(190, 'RS', 'Serbia'),
(191, 'RU', 'Russia'),
(192, 'RW', 'Rwanda'),
(193, 'SA', 'Saudi Arabia'),
(194, 'SB', 'Solomon Islands'),
(195, 'SC', 'Seychelles'),
(196, 'SD', 'Sudan'),
(197, 'SE', 'Sweden'),
(198, 'SG', 'Singapore'),
(199, 'SH', 'Saint Helena'),
(200, 'SI', 'Slovenia'),
(201, 'SJ', 'Svalbard and Jan Mayen'),
(202, 'SK', 'Slovakia'),
(203, 'SL', 'Sierra Leone'),
(204, 'SM', 'San Marino'),
(205, 'SN', 'Senegal'),
(206, 'SO', 'Somalia'),
(207, 'SR', 'Suriname'),
(208, 'SS', 'South Sudan'),
(209, 'ST', 'São Tomé and Príncipe'),
(210, 'SV', 'El Salvador'),
(211, 'SX', 'Sint Maarten'),
(212, 'SY', 'Syria'),
(213, 'SZ', 'Swaziland'),
(214, 'TC', 'Turks and Caicos Islands'),
(215, 'TD', 'Chad'),
(216, 'TF', 'French Southern Territories'),
(217, 'TG', 'Togo'),
(218, 'TH', 'Thailand'),
(219, 'TJ', 'Tajikistan'),
(220, 'TK', 'Tokelau'),
(221, 'TL', 'East Timor'),
(222, 'TM', 'Turkmenistan'),
(223, 'TN', 'Tunisia'),
(224, 'TO', 'Tonga'),
(225, 'TR', 'Turkey'),
(226, 'TT', 'Trinidad and Tobago'),
(227, 'TV', 'Tuvalu'),
(228, 'TW', 'Taiwan'),
(229, 'TZ', 'Tanzania'),
(230, 'UA', 'Ukraine'),
(231, 'UG', 'Uganda'),
(232, 'UM', 'U.S. Minor Outlying Islands'),
(233, 'US', 'United States'),
(234, 'UY', 'Uruguay'),
(235, 'UZ', 'Uzbekistan'),
(236, 'VA', 'Vatican City'),
(237, 'VC', 'Saint Vincent and the Grenadines'),
(238, 'VE', 'Venezuela'),
(239, 'VG', 'British Virgin Islands'),
(240, 'VI', 'U.S. Virgin Islands'),
(241, 'VN', 'Vietnam'),
(242, 'VU', 'Vanuatu'),
(243, 'WF', 'Wallis and Futuna'),
(244, 'WS', 'Samoa'),
(245, 'XK', 'Kosovo'),
(246, 'YE', 'Yemen'),
(247, 'YT', 'Mayotte'),
(248, 'ZA', 'South Africa'),
(249, 'ZM', 'Zambia'),
(250, 'ZW', 'Zimbabwe'),
(251, 'WS', 'Wide Site'),
(256, 'EN', 'England'),
(257, 'WS', 'sgdfgdf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course`
--

DROP TABLE IF EXISTS `tbl_course`;
CREATE TABLE IF NOT EXISTS `tbl_course` (
  `id` int NOT NULL AUTO_INCREMENT,
  `course` varchar(255) DEFAULT NULL,
  `course_full_name` text,
  `course_short_name` text,
  `course_icon` varchar(255) DEFAULT NULL,
  `stream` int DEFAULT NULL,
  `degree_type` int DEFAULT NULL,
  `course_duration` double(10,2) DEFAULT NULL,
  `exam` varchar(255) DEFAULT NULL,
  `course_eligibility` longtext,
  `course_opportunity` longtext,
  `expected_salary` longtext,
  `course_fees` longtext,
  `counselling_authority` varchar(55) DEFAULT NULL,
  `college` varchar(255) NOT NULL,
  `branch_type` int NOT NULL,
  `status` tinyint NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_course`
--

INSERT INTO `tbl_course` (`id`, `course`, `course_full_name`, `course_short_name`, `course_icon`, `stream`, `degree_type`, `course_duration`, `exam`, `course_eligibility`, `course_opportunity`, `expected_salary`, `course_fees`, `counselling_authority`, `college`, `branch_type`, `status`, `created_at`, `updated_at`) VALUES
(2, 'MBBS', NULL, NULL, NULL, 2, NULL, NULL, NULL, 't is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lore', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', NULL, NULL, '', 1, 0, '2023-11-10 19:42:23', '2024-02-28 19:51:26'),
(3, 'BAMS', NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 2, 0, '2023-11-10 19:42:23', '2024-02-28 19:40:21'),
(4, 'UG', 'Computer Fundamentalsssss Four', 'CF', 'a6ed49e7c2f977ea9f21daddd955d9dd.jpg', 2, 2, 50.00, '4|6', 'fdhhfghgffhfhdfghghghfdhghhfhd', '01-01-1970', '01-01-1970', '25569', 'fgdhgfhgfhdgf', '2|3|4', 1, 1, '2023-11-10 19:42:23', '2024-03-01 20:17:58'),
(5, 'MS', NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 2, 0, '2023-11-10 19:42:23', '2024-02-28 19:40:23'),
(7, 'MCA', 'sdgdfgdfgdfgdf', 'gsdfgsdfgdfgdfsg', 'a6ed49e7c2f977ea9f21daddd955d9dd.jpg', 4, 3, 23.00, '4', '<p>hfghgfhgfhdfhfhfghdfhfdhfghfd</p>', '<p>fgdhfhgfhdhgfhgfhtryeytrytreyrytreyryrytytreyrtyreytrfdhgfhdfh</p>\r\n', '<p>dgsdfgdfgfdgsdfgfsdgdfgdgdgdfgdgdfgdgdsfgdfgdfg</p>\r\n', '333\n', 'AACCC', '2|4', 1, 1, '2023-11-10 19:48:39', '2024-01-01 19:03:47'),
(8, 'PG', 'Masters in  Computer Application', 'MCA', 'a6ed49e7c2f977ea9f21daddd955d9dd.jpg', 2, 2, 30.00, '4|5', 'fdgsfdgdfsg', 'dfsgdfgsdfdg', '25900', '234', 'cvzzcxvzcxvcxvxcv', '2|3|4', 2, 1, '2023-12-04 19:54:28', '2024-01-01 19:05:26'),
(9, 'UG1', 'Computer Fundamental One', 'CF', 'a6ed49e7c2f977ea9f21daddd955d9dd.jpg', 4, 3, 50.00, '4|5', 'gfhdfghghgfdhghgfhhgfhfghgh', '343', '25569', '25569', 'dfghgfhfdhfgh', '2|3|4', 1, 1, '2023-12-26 17:42:46', '2024-03-01 20:17:47'),
(10, 'UG2', 'Computer Fundamental Two', 'CF', 'a6ed49e7c2f977ea9f21daddd955d9dd.jpg', 4, 3, 50.00, '4|5', 'gfhdfghghgfdhghgfhhgfhfghgh', '1970-01-01', '1970-01-01', '1970-01-01', 'dfghgfhfdhfgh', '2|3|4', 2, 1, '2023-12-28 19:06:12', '2024-03-01 20:17:50'),
(11, 'UG3', 'Computer Fundamental Three', 'CF', 'a6ed49e7c2f977ea9f21daddd955d9dd.jpg', 4, 3, 50.00, '4|5', 'gfhdfghghgfdhghgfhhgfhfghgh', '25569', '25569', '25569', 'dfghgfhfdhfgh', '2|3|4', 1, 1, '2023-12-28 19:07:27', '2024-03-01 20:17:53');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cutfoff_marks_data`
--

DROP TABLE IF EXISTS `tbl_cutfoff_marks_data`;
CREATE TABLE IF NOT EXISTS `tbl_cutfoff_marks_data` (
  `id` int NOT NULL AUTO_INCREMENT,
  `college_id` int DEFAULT NULL,
  `course_id` int DEFAULT NULL,
  `branch_id` int DEFAULT NULL,
  `category_type` varchar(50) DEFAULT NULL,
  `round_one` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT '0',
  `round_two` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT '0',
  `round_three` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT '0',
  `round_four` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT '0',
  `round_five` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT '0',
  `air` varchar(50) DEFAULT NULL,
  `sr` varchar(50) DEFAULT NULL,
  `marks` varchar(50) DEFAULT NULL,
  `year` year DEFAULT NULL,
  `cutoff_head` int NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=201 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_cutfoff_marks_data`
--

INSERT INTO `tbl_cutfoff_marks_data` (`id`, `college_id`, `course_id`, `branch_id`, `category_type`, `round_one`, `round_two`, `round_three`, `round_four`, `round_five`, `air`, `sr`, `marks`, `year`, `cutoff_head`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 3, 2, '6', '1', '0', '0', '0', '0', '1', '0', '0', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(2, 5, 2, 3, '6', '1', '0', '0', '0', '0', '0', '0', '0', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(3, 5, 2, 6, '6', '1', '0', '0', '0', '0', '0', '0', '0', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(4, 5, 2, 8, '6', '1', '0', '0', '0', '0', '0', '0', '0', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(5, 5, 5, 9, '6', '1', '0', '0', '0', '0', '60', '61', '62', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(6, 4, 3, 2, '6', '0', '1', '0', '0', '0', '87', '90', '300', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(7, 5, 2, 3, '6', '0', '1', '0', '0', '0', '0', '0', '0', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(8, 5, 2, 6, '6', '0', '1', '0', '0', '0', '0', '0', '0', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(9, 5, 2, 8, '6', '0', '1', '0', '0', '0', '0', '0', '0', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(10, 5, 5, 9, '6', '0', '1', '0', '0', '0', '63', '64', '65', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(11, 4, 3, 2, '6', '0', '0', '1', '0', '0', '67', '87', '450', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(12, 5, 2, 3, '6', '0', '0', '1', '0', '0', '0', '0', '0', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(13, 5, 2, 6, '6', '0', '0', '1', '0', '0', '0', '0', '0', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(14, 5, 2, 8, '6', '0', '0', '1', '0', '0', '0', '0', '0', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(15, 5, 5, 9, '6', '0', '0', '1', '0', '0', '66', '67', '68', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(16, 4, 3, 2, '6', '0', '0', '0', '1', '0', '78', '98', '550', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(17, 5, 2, 3, '6', '0', '0', '0', '1', '0', '0', '0', '0', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(18, 5, 2, 6, '6', '0', '0', '0', '1', '0', '0', '0', '0', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(19, 5, 2, 8, '6', '0', '0', '0', '1', '0', '0', '0', '0', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(20, 5, 5, 9, '6', '0', '0', '0', '1', '0', '69', '70', '71', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(21, 4, 3, 2, '6', '0', '0', '0', '0', '1', '85', '95', '500', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(22, 5, 2, 3, '6', '0', '0', '0', '0', '1', '0', '0', '0', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(23, 5, 2, 6, '6', '0', '0', '0', '0', '1', '0', '0', '0', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(24, 5, 2, 8, '6', '0', '0', '0', '0', '1', '0', '0', '0', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(25, 5, 5, 9, '6', '0', '0', '0', '0', '1', '72', '73', '74', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(26, 4, 3, 2, '7', '1', '0', '0', '0', '0', '94', '67', '250', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(27, 5, 2, 3, '7', '1', '0', '0', '0', '0', '0', '0', '0', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(28, 5, 2, 6, '7', '1', '0', '0', '0', '0', '0', '0', '0', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(29, 5, 2, 8, '7', '1', '0', '0', '0', '0', '0', '0', '0', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(30, 5, 5, 9, '7', '1', '0', '0', '0', '0', '75', '76', '77', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(31, 4, 3, 2, '7', '0', '1', '0', '0', '0', '87', '90', '300', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(32, 5, 2, 3, '7', '0', '1', '0', '0', '0', '0', '0', '0', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(33, 5, 2, 6, '7', '0', '1', '0', '0', '0', '0', '0', '0', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(34, 5, 2, 8, '7', '0', '1', '0', '0', '0', '0', '0', '0', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(35, 5, 5, 9, '7', '0', '1', '0', '0', '0', '78', '79', '80', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(36, 4, 3, 2, '7', '0', '0', '1', '0', '0', '67', '87', '450', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(37, 5, 2, 3, '7', '0', '0', '1', '0', '0', '0', '0', '0', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(38, 5, 2, 6, '7', '0', '0', '1', '0', '0', '0', '0', '0', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(39, 5, 2, 8, '7', '0', '0', '1', '0', '0', '0', '0', '0', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(40, 5, 5, 9, '7', '0', '0', '1', '0', '0', '81', '82', '83', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(41, 4, 3, 2, '7', '0', '0', '0', '1', '0', '78', '98', '550', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(42, 5, 2, 3, '7', '0', '0', '0', '1', '0', '0', '0', '0', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(43, 5, 2, 6, '7', '0', '0', '0', '1', '0', '0', '0', '0', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(44, 5, 2, 8, '7', '0', '0', '0', '1', '0', '0', '0', '0', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(45, 5, 5, 9, '7', '0', '0', '0', '1', '0', '84', '85', '86', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(46, 4, 3, 2, '7', '0', '0', '0', '0', '1', '85', '95', '500', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(47, 5, 2, 3, '7', '0', '0', '0', '0', '1', '0', '0', '0', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(48, 5, 2, 6, '7', '0', '0', '0', '0', '1', '0', '0', '0', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(49, 5, 2, 8, '7', '0', '0', '0', '0', '1', '0', '0', '0', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(50, 5, 5, 9, '7', '0', '0', '0', '0', '1', '87', '88', '89', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(51, 4, 3, 2, '8', '1', '0', '0', '0', '0', '0', '0', '0', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(52, 5, 2, 3, '8', '1', '0', '0', '0', '0', '0', '0', '0', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(53, 5, 2, 6, '8', '1', '0', '0', '0', '0', '0', '0', '0', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(54, 5, 2, 8, '8', '1', '0', '0', '0', '0', '0', '0', '0', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(55, 5, 5, 9, '8', '1', '0', '0', '0', '0', '90', '91', '92', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(56, 4, 3, 2, '8', '0', '1', '0', '0', '0', '0', '0', '0', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(57, 5, 2, 3, '8', '0', '1', '0', '0', '0', '0', '0', '0', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(58, 5, 2, 6, '8', '0', '1', '0', '0', '0', '0', '0', '0', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(59, 5, 2, 8, '8', '0', '1', '0', '0', '0', '0', '0', '0', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(60, 5, 5, 9, '8', '0', '1', '0', '0', '0', '93', '94', '95', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(61, 4, 3, 2, '8', '0', '0', '1', '0', '0', '0', '0', '0', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(62, 5, 2, 3, '8', '0', '0', '1', '0', '0', '0', '0', '0', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(63, 5, 2, 6, '8', '0', '0', '1', '0', '0', '0', '0', '0', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(64, 5, 2, 8, '8', '0', '0', '1', '0', '0', '0', '0', '0', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(65, 5, 5, 9, '8', '0', '0', '1', '0', '0', '96', '97', '98', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(66, 4, 3, 2, '8', '0', '0', '0', '1', '0', '0', '0', '0', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(67, 5, 2, 3, '8', '0', '0', '0', '1', '0', '0', '0', '0', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(68, 5, 2, 6, '8', '0', '0', '0', '1', '0', '0', '0', '0', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(69, 5, 2, 8, '8', '0', '0', '0', '1', '0', '0', '0', '0', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(70, 5, 5, 9, '8', '0', '0', '0', '1', '0', '99', '100', '101', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(71, 4, 3, 2, '8', '0', '0', '0', '0', '1', '0', '0', '0', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(72, 5, 2, 3, '8', '0', '0', '0', '0', '1', '0', '0', '0', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(73, 5, 2, 6, '8', '0', '0', '0', '0', '1', '0', '0', '0', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(74, 5, 2, 8, '8', '0', '0', '0', '0', '1', '0', '0', '0', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(75, 5, 5, 9, '8', '0', '0', '0', '0', '1', '102', '103', '104', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(76, 4, 3, 2, '9', '1', '0', '0', '0', '0', '0', '0', '0', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(77, 5, 2, 3, '9', '1', '0', '0', '0', '0', '0', '0', '0', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(78, 5, 2, 6, '9', '1', '0', '0', '0', '0', '0', '0', '0', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(79, 5, 2, 8, '9', '1', '0', '0', '0', '0', '0', '0', '0', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(80, 5, 5, 9, '9', '1', '0', '0', '0', '0', '105', '106', '107', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(81, 4, 3, 2, '9', '0', '1', '0', '0', '0', '0', '0', '0', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(82, 5, 2, 3, '9', '0', '1', '0', '0', '0', '0', '0', '0', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(83, 5, 2, 6, '9', '0', '1', '0', '0', '0', '0', '0', '0', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(84, 5, 2, 8, '9', '0', '1', '0', '0', '0', '0', '0', '0', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(85, 5, 5, 9, '9', '0', '1', '0', '0', '0', '108', '109', '110', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(86, 4, 3, 2, '9', '0', '0', '1', '0', '0', '0', '0', '0', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(87, 5, 2, 3, '9', '0', '0', '1', '0', '0', '0', '0', '0', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(88, 5, 2, 6, '9', '0', '0', '1', '0', '0', '0', '0', '0', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(89, 5, 2, 8, '9', '0', '0', '1', '0', '0', '0', '0', '0', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(90, 5, 5, 9, '9', '0', '0', '1', '0', '0', '111', '112', '113', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(91, 4, 3, 2, '9', '0', '0', '0', '1', '0', '0', '0', '0', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(92, 5, 2, 3, '9', '0', '0', '0', '1', '0', '0', '0', '0', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(93, 5, 2, 6, '9', '0', '0', '0', '1', '0', '0', '0', '0', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(94, 5, 2, 8, '9', '0', '0', '0', '1', '0', '0', '0', '0', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(95, 5, 5, 9, '9', '0', '0', '0', '1', '0', '114', '115', '116', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(96, 4, 3, 2, '9', '0', '0', '0', '0', '1', '0', '0', '0', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(97, 5, 2, 3, '9', '0', '0', '0', '0', '1', '0', '0', '0', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(98, 5, 2, 6, '9', '0', '0', '0', '0', '1', '0', '0', '0', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(99, 5, 2, 8, '9', '0', '0', '0', '0', '1', '0', '0', '0', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(100, 5, 5, 9, '9', '0', '0', '0', '0', '1', '117', '118', '119', '2024', 6, 1, '2024-01-10 20:36:45', NULL),
(101, 4, 3, 2, '6', '1', '0', '0', '0', '0', '50', '0', '0', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(102, 5, 2, 3, '6', '1', '0', '0', '0', '0', '40', '0', '0', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(103, 5, 2, 6, '6', '1', '0', '0', '0', '0', '42', '0', '0', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(104, 5, 2, 8, '6', '1', '0', '0', '0', '0', '74', '75', '76', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(105, 5, 5, 9, '6', '1', '0', '0', '0', '0', '60', '61', '62', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(106, 4, 3, 2, '6', '0', '1', '0', '0', '0', '87', '90', '300', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(107, 5, 2, 3, '6', '0', '1', '0', '0', '0', '0', '0', '0', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(108, 5, 2, 6, '6', '0', '1', '0', '0', '0', '0', '0', '0', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(109, 5, 2, 8, '6', '0', '1', '0', '0', '0', '77', '86', '89', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(110, 5, 5, 9, '6', '0', '1', '0', '0', '0', '63', '64', '65', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(111, 4, 3, 2, '6', '0', '0', '1', '0', '0', '67', '87', '450', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(112, 5, 2, 3, '6', '0', '0', '1', '0', '0', '0', '0', '0', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(113, 5, 2, 6, '6', '0', '0', '1', '0', '0', '0', '0', '0', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(114, 5, 2, 8, '6', '0', '0', '1', '0', '0', '66', '89', '56', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(115, 5, 5, 9, '6', '0', '0', '1', '0', '0', '66', '67', '68', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(116, 4, 3, 2, '6', '0', '0', '0', '1', '0', '78', '98', '550', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(117, 5, 2, 3, '6', '0', '0', '0', '1', '0', '0', '0', '0', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(118, 5, 2, 6, '6', '0', '0', '0', '1', '0', '0', '0', '0', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(119, 5, 2, 8, '6', '0', '0', '0', '1', '0', '9', '56', '99', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(120, 5, 5, 9, '6', '0', '0', '0', '1', '0', '69', '70', '71', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(121, 4, 3, 2, '6', '0', '0', '0', '0', '1', '85', '95', '500', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(122, 5, 2, 3, '6', '0', '0', '0', '0', '1', '0', '0', '0', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(123, 5, 2, 6, '6', '0', '0', '0', '0', '1', '0', '0', '0', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(124, 5, 2, 8, '6', '0', '0', '0', '0', '1', '89', '56', '99', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(125, 5, 5, 9, '6', '0', '0', '0', '0', '1', '72', '73', '74', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(126, 4, 3, 2, '7', '1', '0', '0', '0', '0', '94', '67', '250', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(127, 5, 2, 3, '7', '1', '0', '0', '0', '0', '0', '0', '0', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(128, 5, 2, 6, '7', '1', '0', '0', '0', '0', '0', '0', '0', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(129, 5, 2, 8, '7', '1', '0', '0', '0', '0', '65', '65', '89', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(130, 5, 5, 9, '7', '1', '0', '0', '0', '0', '75', '76', '77', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(131, 4, 3, 2, '7', '0', '1', '0', '0', '0', '87', '90', '300', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(132, 5, 2, 3, '7', '0', '1', '0', '0', '0', '0', '0', '0', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(133, 5, 2, 6, '7', '0', '1', '0', '0', '0', '0', '0', '0', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(134, 5, 2, 8, '7', '0', '1', '0', '0', '0', '62', '4', '45', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(135, 5, 5, 9, '7', '0', '1', '0', '0', '0', '78', '79', '80', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(136, 4, 3, 2, '7', '0', '0', '1', '0', '0', '67', '87', '450', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(137, 5, 2, 3, '7', '0', '0', '1', '0', '0', '0', '0', '0', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(138, 5, 2, 6, '7', '0', '0', '1', '0', '0', '0', '0', '0', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(139, 5, 2, 8, '7', '0', '0', '1', '0', '0', '78', '65', '26', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(140, 5, 5, 9, '7', '0', '0', '1', '0', '0', '81', '82', '83', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(141, 4, 3, 2, '7', '0', '0', '0', '1', '0', '78', '98', '550', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(142, 5, 2, 3, '7', '0', '0', '0', '1', '0', '0', '0', '0', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(143, 5, 2, 6, '7', '0', '0', '0', '1', '0', '0', '0', '0', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(144, 5, 2, 8, '7', '0', '0', '0', '1', '0', '9', '65', '5', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(145, 5, 5, 9, '7', '0', '0', '0', '1', '0', '84', '85', '86', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(146, 4, 3, 2, '7', '0', '0', '0', '0', '1', '85', '95', '500', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(147, 5, 2, 3, '7', '0', '0', '0', '0', '1', '0', '0', '0', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(148, 5, 2, 6, '7', '0', '0', '0', '0', '1', '0', '0', '0', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(149, 5, 2, 8, '7', '0', '0', '0', '0', '1', '852', '475', '52', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(150, 5, 5, 9, '7', '0', '0', '0', '0', '1', '87', '88', '89', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(151, 4, 3, 2, '8', '1', '0', '0', '0', '0', '0', '0', '0', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(152, 5, 2, 3, '8', '1', '0', '0', '0', '0', '0', '0', '0', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(153, 5, 2, 6, '8', '1', '0', '0', '0', '0', '0', '0', '0', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(154, 5, 2, 8, '8', '1', '0', '0', '0', '0', '52', '5', '25', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(155, 5, 5, 9, '8', '1', '0', '0', '0', '0', '90', '91', '92', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(156, 4, 3, 2, '8', '0', '1', '0', '0', '0', '0', '0', '0', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(157, 5, 2, 3, '8', '0', '1', '0', '0', '0', '0', '0', '0', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(158, 5, 2, 6, '8', '0', '1', '0', '0', '0', '0', '0', '0', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(159, 5, 2, 8, '8', '0', '1', '0', '0', '0', '45', '25', '86', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(160, 5, 5, 9, '8', '0', '1', '0', '0', '0', '93', '94', '95', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(161, 4, 3, 2, '8', '0', '0', '1', '0', '0', '0', '0', '0', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(162, 5, 2, 3, '8', '0', '0', '1', '0', '0', '0', '0', '0', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(163, 5, 2, 6, '8', '0', '0', '1', '0', '0', '0', '0', '0', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(164, 5, 2, 8, '8', '0', '0', '1', '0', '0', '65', '32', '58', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(165, 5, 5, 9, '8', '0', '0', '1', '0', '0', '96', '97', '98', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(166, 4, 3, 2, '8', '0', '0', '0', '1', '0', '0', '0', '0', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(167, 5, 2, 3, '8', '0', '0', '0', '1', '0', '0', '0', '0', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(168, 5, 2, 6, '8', '0', '0', '0', '1', '0', '0', '0', '0', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(169, 5, 2, 8, '8', '0', '0', '0', '1', '0', '52', '88', '56', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(170, 5, 5, 9, '8', '0', '0', '0', '1', '0', '99', '100', '101', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(171, 4, 3, 2, '8', '0', '0', '0', '0', '1', '0', '0', '0', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(172, 5, 2, 3, '8', '0', '0', '0', '0', '1', '0', '0', '0', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(173, 5, 2, 6, '8', '0', '0', '0', '0', '1', '0', '0', '0', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(174, 5, 2, 8, '8', '0', '0', '0', '0', '1', '89', '26', '35', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(175, 5, 5, 9, '8', '0', '0', '0', '0', '1', '102', '103', '104', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(176, 4, 3, 2, '9', '1', '0', '0', '0', '0', '0', '0', '0', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(177, 5, 2, 3, '9', '1', '0', '0', '0', '0', '0', '0', '0', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(178, 5, 2, 6, '9', '1', '0', '0', '0', '0', '0', '0', '0', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(179, 5, 2, 8, '9', '1', '0', '0', '0', '0', '89', '59', '25', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(180, 5, 5, 9, '9', '1', '0', '0', '0', '0', '105', '106', '107', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(181, 4, 3, 2, '9', '0', '1', '0', '0', '0', '0', '0', '0', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(182, 5, 2, 3, '9', '0', '1', '0', '0', '0', '0', '0', '0', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(183, 5, 2, 6, '9', '0', '1', '0', '0', '0', '0', '0', '0', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(184, 5, 2, 8, '9', '0', '1', '0', '0', '0', '23', '58', '23', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(185, 5, 5, 9, '9', '0', '1', '0', '0', '0', '108', '109', '110', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(186, 4, 3, 2, '9', '0', '0', '1', '0', '0', '0', '0', '0', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(187, 5, 2, 3, '9', '0', '0', '1', '0', '0', '0', '0', '0', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(188, 5, 2, 6, '9', '0', '0', '1', '0', '0', '0', '0', '0', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(189, 5, 2, 8, '9', '0', '0', '1', '0', '0', '11', '58', '3', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(190, 5, 5, 9, '9', '0', '0', '1', '0', '0', '111', '112', '113', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(191, 4, 3, 2, '9', '0', '0', '0', '1', '0', '0', '0', '0', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(192, 5, 2, 3, '9', '0', '0', '0', '1', '0', '0', '0', '0', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(193, 5, 2, 6, '9', '0', '0', '0', '1', '0', '0', '0', '0', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(194, 5, 2, 8, '9', '0', '0', '0', '1', '0', '45', '96', '5', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(195, 5, 5, 9, '9', '0', '0', '0', '1', '0', '114', '115', '116', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(196, 4, 3, 2, '9', '0', '0', '0', '0', '1', '0', '0', '0', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(197, 5, 2, 3, '9', '0', '0', '0', '0', '1', '0', '0', '0', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(198, 5, 2, 6, '9', '0', '0', '0', '0', '1', '0', '0', '0', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(199, 5, 2, 8, '9', '0', '0', '0', '0', '1', '23', '32', '32', '2023', 6, 1, '2024-01-10 20:40:32', NULL),
(200, 5, 5, 9, '9', '0', '0', '0', '0', '1', '117', '118', '119', '2023', 6, 1, '2024-01-10 20:40:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_degree_type`
--

DROP TABLE IF EXISTS `tbl_degree_type`;
CREATE TABLE IF NOT EXISTS `tbl_degree_type` (
  `id` int NOT NULL AUTO_INCREMENT,
  `degreetype` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_degree_type`
--

INSERT INTO `tbl_degree_type` (`id`, `degreetype`) VALUES
(2, 'UG'),
(3, 'PG'),
(4, 'PG Diploma'),
(5, 'Super Speciality'),
(7, 'UGP'),
(8, 'dfsgdfgdfg'),
(9, 'UGC'),
(10, 'erterrterte');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_exam`
--

DROP TABLE IF EXISTS `tbl_exam`;
CREATE TABLE IF NOT EXISTS `tbl_exam` (
  `id` int NOT NULL AUTO_INCREMENT,
  `exam` varchar(255) DEFAULT NULL,
  `exam_full_name` text,
  `exam_short_name` text,
  `degree_type` int DEFAULT NULL,
  `eligibility` varchar(55) DEFAULT NULL,
  `exam_duration` varchar(255) DEFAULT NULL,
  `maximum_marks` double(10,2) DEFAULT NULL,
  `passing_marks` double(10,2) DEFAULT NULL,
  `qualifying_marks` double(10,2) DEFAULT NULL,
  `exam_held_in` varchar(255) DEFAULT NULL,
  `registration_starts` date DEFAULT NULL,
  `registration_ends` date DEFAULT NULL,
  `stream` varchar(255) DEFAULT NULL,
  `course_accepting` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_exam`
--

INSERT INTO `tbl_exam` (`id`, `exam`, `exam_full_name`, `exam_short_name`, `degree_type`, `eligibility`, `exam_duration`, `maximum_marks`, `passing_marks`, `qualifying_marks`, `exam_held_in`, `registration_starts`, `registration_ends`, `stream`, `course_accepting`, `slug`) VALUES
(4, 'UG', 'Computer Fundamentals One', 'CF', 2, 'dfsgdfggsdfgdfg', '60', 50.00, 17.00, 17.00, '2024-12-02', '2024-12-03', '2024-12-04', '2', '3,4', 'ug-8b438931efa6fa40e6bf7f93e32bc75658cc63d4'),
(5, 'PG', 'Masters in  Computer Application', 'MCA', 2, 'sdfgfdgdf', '60', 100.00, 33.00, 23.00, '2024-01-02', '2024-01-03', '2024-01-04', '2', '2,3,4', 'pg-96dd8d96902e9c5af3b96b1eaa9c80cbc615d290'),
(6, 'UG', 'Computer Fundamental Two', 'CF', 2, 'dfsgdfggsdfgdfg', '60', 50.00, 17.00, 17.00, '2024-12-02', '2024-12-03', '2024-12-04', '2', '3,4', 'ug-8b438931efa6fa40e6bf7f93e32bc75658cc63d4'),
(7, 'UG', 'Computer Fundamental Three', 'CF', 2, 'dfsgdfggsdfgdfg', '60', 50.00, 17.00, 17.00, '2024-12-02', '2024-12-03', '2024-12-04', '2', '3,4', 'ug-8b438931efa6fa40e6bf7f93e32bc75658cc63d4'),
(8, 'UG', 'Computer Fundamental Four', 'CF', 2, 'dfsgdfggsdfgdfg', '60', 50.00, 17.00, 17.00, '2024-12-02', '2024-12-03', '2024-12-04', '2', '3,4', 'ug-8b438931efa6fa40e6bf7f93e32bc75658cc63d4'),
(9, 'UG', 'Computer Fundamental Five', 'CF', 2, 'dfsgdfggsdfgdfg', '60', 50.00, 17.00, 17.00, '2024-12-02', '2024-12-03', '2024-12-04', '2', '3,4', 'ug-8b438931efa6fa40e6bf7f93e32bc75658cc63d4');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_facilities`
--

DROP TABLE IF EXISTS `tbl_facilities`;
CREATE TABLE IF NOT EXISTS `tbl_facilities` (
  `id` int NOT NULL AUTO_INCREMENT,
  `facility` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_facilities`
--

INSERT INTO `tbl_facilities` (`id`, `facility`) VALUES
(5, 'Ambulance'),
(6, 'ICU'),
(7, 'Blood Bank'),
(9, 'gfdsgdfd'),
(10, 'RTY'),
(11, 'dfgsdgdfgfdg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feeshead`
--

DROP TABLE IF EXISTS `tbl_feeshead`;
CREATE TABLE IF NOT EXISTS `tbl_feeshead` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fee_head_name` varchar(100) DEFAULT NULL,
  `tution_fees` varchar(50) DEFAULT NULL,
  `hostel_fees` varchar(50) DEFAULT NULL,
  `misc_fees` varchar(50) DEFAULT NULL,
  `bank_details_1` varchar(100) DEFAULT NULL,
  `bank_details_2` varchar(100) DEFAULT NULL,
  `demand_draft_name` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_feeshead`
--

INSERT INTO `tbl_feeshead` (`id`, `fee_head_name`, `tution_fees`, `hostel_fees`, `misc_fees`, `bank_details_1`, `bank_details_2`, `demand_draft_name`, `created_at`, `updated_at`) VALUES
(2, 'gfdsgdfdfggd', '2499', '2499', '234', 'dfgsfdgdfgdfg', 'dfsgdfgfdgsdfd', 'sdfgdsfgdsgdfgdfg', '2023-12-05 16:35:02', '2023-12-26 19:51:11'),
(3, 'gtewertrewtfdsgdfdfggd', '1245', '1245', '324', 'dfgsfdgdfgdfg', 'dfsgdfgfdgsdfd', 'sdfgdsfgdsgdfgdfg', '2023-12-05 16:35:02', '2023-12-26 19:51:11'),
(4, 'gtewertrewtfdsgdfdfggd', '1245', '1245', '324', 'dfgsfdgdfgdfg', 'dfsgdfgfdgsdfd', 'sdfgdsfgdsgdfgdfg', '2023-12-26 19:51:42', '2023-12-26 19:51:42'),
(5, 'gtewertrewtfdsgdfdfggd', '1245', '1245', '324', 'dfgsfdgdfgdfg', 'dfsgdfgfdgsdfd', 'sdfgdsfgdsgdfgdfg', '2023-12-26 19:52:12', '2023-12-26 19:52:12'),
(6, 'gtewertrewtfdsgdfdfggd', '1245', '1245', '324', 'dfgsfdgdfgdfg', 'dfsgdfgfdgsdfd', 'sdfgdsfgdsgdfgdfg', '2023-12-26 19:52:12', '2023-12-26 19:52:12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

DROP TABLE IF EXISTS `tbl_gallery`;
CREATE TABLE IF NOT EXISTS `tbl_gallery` (
  `id` int NOT NULL AUTO_INCREMENT,
  `head_id` int DEFAULT NULL,
  `media_id` int DEFAULT NULL,
  `college_id` int NOT NULL,
  `status` tinyint DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`id`, `head_id`, `media_id`, `college_id`, `status`, `created_at`, `updated_at`) VALUES
(3, 3, 2, 4, 1, '2023-11-15 17:46:41', '2023-11-15 17:46:41'),
(5, 2, 1, 4, 1, '2023-11-15 18:40:49', '2023-11-15 18:40:49'),
(9, 1, 3, 4, 1, '2023-11-15 20:01:12', '2023-11-15 20:01:12'),
(10, 3, 3, 4, 1, '2023-11-15 20:07:10', '2023-11-15 20:07:10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery_heads`
--

DROP TABLE IF EXISTS `tbl_gallery_heads`;
CREATE TABLE IF NOT EXISTS `tbl_gallery_heads` (
  `id` int NOT NULL AUTO_INCREMENT,
  `head_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_gallery_heads`
--

INSERT INTO `tbl_gallery_heads` (`id`, `head_name`, `created_at`, `updated_at`) VALUES
(1, 'Academics', '2023-11-11 07:46:22', '2023-11-11 07:46:22'),
(2, 'Hostel', '2023-11-11 07:46:31', '2023-11-11 07:46:31'),
(3, 'Hospital Building', '2023-11-11 07:46:40', '2023-11-11 07:46:40'),
(4, 'Classrooms', '2023-11-11 07:46:50', '2023-11-11 07:46:50'),
(6, 'gfdsgdfd', '2023-12-05 20:37:06', '2023-12-05 20:37:06'),
(7, 'Other Head', '2023-12-05 20:37:06', '2023-12-27 16:24:01'),
(8, 'gsgdfgsgdfgsg', '2023-12-27 16:24:01', '2023-12-27 16:24:01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gender`
--

DROP TABLE IF EXISTS `tbl_gender`;
CREATE TABLE IF NOT EXISTS `tbl_gender` (
  `id` int NOT NULL AUTO_INCREMENT,
  `gender` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_gender`
--

INSERT INTO `tbl_gender` (`id`, `gender`) VALUES
(3, 'Male'),
(4, 'Female'),
(5, 'dsfgdfg'),
(6, 'Transgender'),
(7, 'Others'),
(8, 'sdfsdfdfdsfs');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nature`
--

DROP TABLE IF EXISTS `tbl_nature`;
CREATE TABLE IF NOT EXISTS `tbl_nature` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nature` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_nature`
--

INSERT INTO `tbl_nature` (`id`, `nature`) VALUES
(2, 'Clinical'),
(3, 'Non Clinical'),
(4, 'Anesthesia Group'),
(5, 'OBG Group'),
(7, 'gfdsgdfd'),
(8, 'Others'),
(9, 'New Nature'),
(10, 'fsdfdsfdfffdsf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

DROP TABLE IF EXISTS `tbl_news`;
CREATE TABLE IF NOT EXISTS `tbl_news` (
  `id` int NOT NULL AUTO_INCREMENT,
  `image` text,
  `slug` text NOT NULL,
  `course_id` text,
  `title` text,
  `short_description` longtext,
  `full_description` longtext,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_news`
--

INSERT INTO `tbl_news` (`id`, `image`, `slug`, `course_id`, `title`, `short_description`, `full_description`, `created_at`, `updated_at`) VALUES
(1, '4b482230c35a4f767aa5bf049bdbf33a.jpg', 'ffsggdf-3c351c4c7ab803b9b9728fd17462632f3517d114', '7', 'ffsggdf', 'dfsgdgdf', '<p>gdfgdgdsggfdgsgdfgdfg</p>\r\n', '2023-11-30 18:32:02', '2023-12-28 19:19:36'),
(3, '4b482230c35a4f767aa5bf049bdbf33a.jpg', 'first-news-13b74d30fcfc4b8b37079e46676faf0cbafec901', '7', 'First News', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2023-11-30 19:39:21', '2023-12-28 19:19:36'),
(4, '4b482230c35a4f767aa5bf049bdbf33a.jpg', 'first-news-13b74d30fcfc4b8b37079e46676faf0cbafec901', '7', 'First News', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2023-12-27 17:59:03', '2023-12-28 19:19:36');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_opens`
--

DROP TABLE IF EXISTS `tbl_opens`;
CREATE TABLE IF NOT EXISTS `tbl_opens` (
  `id` int NOT NULL AUTO_INCREMENT,
  `opens` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_opens`
--

INSERT INTO `tbl_opens` (`id`, `opens`, `created_at`, `updated_at`) VALUES
(1, 'First Open', '2023-11-10 17:34:47', '2023-12-25 19:04:16'),
(3, 'gfdsgdfd', '2023-12-04 18:05:05', '2023-12-04 18:05:05'),
(4, 'dfsgdfgdfg', '2023-12-04 18:05:05', '2023-12-04 18:05:05'),
(5, 'Second Open', '2023-12-25 19:04:16', '2023-12-25 19:04:16'),
(6, 'dfgdfgdfgfdg Open', '2023-12-28 18:52:28', '2023-12-28 18:52:28');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ownership`
--

DROP TABLE IF EXISTS `tbl_ownership`;
CREATE TABLE IF NOT EXISTS `tbl_ownership` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `slug` text NOT NULL,
  `status` tinyint NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_ownership`
--

INSERT INTO `tbl_ownership` (`id`, `title`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(2, 'dsfgfdgfgfd dfgsfdgfdgfgdgg', 'dsfgfdgfgfd-dfgsfdgfdgfgdgg-2105362e32d68e223b88a60ec2dbfef958e15b79', 1, '2023-11-08 16:19:56', '2023-12-25 17:46:07'),
(3, 'Deemed,', 'deemed-493cf48fc78474348f7b0667ac43f23427fda617', 1, '2023-11-08 16:20:09', '2023-12-28 18:23:20'),
(4, 'Private', 'private-e80721793c24ae14edfca9b26ad406a9815cd3ff', 1, '2023-11-08 16:20:23', NULL),
(5, 'Central University', 'central-university-f9b5bba9e504b65988f9a5e7acd99e45db7295ea', 1, '2023-11-08 16:20:47', NULL),
(6, 'fgdhfhgh', 'fgdhfhgh-dafc2fe9fbe9a395c5b66c56dd80345ca7e30180', 0, '2023-12-02 19:08:02', NULL),
(7, 'dfgfdgdfgg', 'dfgfdgdfgg-a8e74dc4bb8a08dc12cd45af384f5456867272d8', 0, '2023-12-25 17:45:46', '2023-12-28 18:23:20'),
(8, 'dfgfdgdfgg', 'dfgfdgdfgg-a8e74dc4bb8a08dc12cd45af384f5456867272d8', 0, '2023-12-25 17:45:51', '2023-12-28 18:23:20'),
(9, 'dfgfdgdfgg', 'dfgfdgdfgg-a8e74dc4bb8a08dc12cd45af384f5456867272d8', 0, '2023-12-25 17:46:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_recognition`
--

DROP TABLE IF EXISTS `tbl_recognition`;
CREATE TABLE IF NOT EXISTS `tbl_recognition` (
  `id` int NOT NULL AUTO_INCREMENT,
  `recognition` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_recognition`
--

INSERT INTO `tbl_recognition` (`id`, `recognition`) VALUES
(2, 'Approvedssss'),
(4, 'fgdsfgfd'),
(5, 'sdfgdfgdfgfdg'),
(6, 'New '),
(7, 'teretert'),
(8, 'teretert');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service_bond_rules`
--

DROP TABLE IF EXISTS `tbl_service_bond_rules`;
CREATE TABLE IF NOT EXISTS `tbl_service_bond_rules` (
  `id` int NOT NULL AUTO_INCREMENT,
  `service_bond` varchar(100) DEFAULT NULL,
  `seat_indentity_charges` varchar(100) DEFAULT NULL,
  `upgradation_processing_fees` varchar(100) DEFAULT NULL,
  `Created_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Updated_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_service_bond_rules`
--

INSERT INTO `tbl_service_bond_rules` (`id`, `service_bond`, `seat_indentity_charges`, `upgradation_processing_fees`, `Created_At`, `Updated_At`) VALUES
(1, 'Femo', '50000', '22', '2023-11-24 19:10:52', '2023-11-24 19:11:19'),
(3, 'rtwertegdsfgfdgfdsg', '2599', '299', '2023-12-05 16:41:47', '2023-12-05 16:41:47'),
(4, 'rtwertegdsfgfdgfdsg', '1399', '499', '2023-12-05 16:41:47', '2023-12-05 16:41:47'),
(5, 'ertertertert', '1488', '499', '2023-12-26 19:57:32', '2023-12-26 19:57:32');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_site_settings`
--

DROP TABLE IF EXISTS `tbl_site_settings`;
CREATE TABLE IF NOT EXISTS `tbl_site_settings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `logo` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `title` longtext,
  `description` longtext,
  `banner_image` varchar(255) DEFAULT NULL,
  `meta_title` longtext,
  `meta_description` longtext,
  `keywords` longtext,
  `mobile_no` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` longtext,
  `gst` varchar(255) DEFAULT NULL,
  `about_us` longtext,
  `terms_condition` longtext,
  `privacy_policy` longtext,
  `return_refund` longtext,
  `onesignal_salt` longtext,
  `onesignal_key` longtext,
  `razorpay_salt` longtext,
  `razorpay_key` longtext,
  `map_api_key` text,
  `invoice_header_img` longtext,
  `invoice_footer_img` longtext,
  `featured_course_price` text,
  `invoice_terms_condition` longtext,
  `analytics_code` longtext,
  `status` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_site_settings`
--

INSERT INTO `tbl_site_settings` (`id`, `logo`, `favicon`, `title`, `description`, `banner_image`, `meta_title`, `meta_description`, `keywords`, `mobile_no`, `email`, `address`, `gst`, `about_us`, `terms_condition`, `privacy_policy`, `return_refund`, `onesignal_salt`, `onesignal_key`, `razorpay_salt`, `razorpay_key`, `map_api_key`, `invoice_header_img`, `invoice_footer_img`, `featured_course_price`, `invoice_terms_condition`, `analytics_code`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ddce09a5f98013ae6516d7af08d14ca4.png', '117388e3c81bb39c6442745843812abc.png', 'Cutoff Baba', 'Cutoff Baba', 'd9f35fde78a00deaf9484ebeed41eaea.png', 'Cutoff Baba', 'Cutoff Baba', NULL, '54645645645645', 'cutoffbaba@gmail.com', 'dfasfsfafsfdfasf', NULL, '<h3>The standard Lorem Ipsum passage, used since the 1500s</h3>\n\n<p>&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot;</p>\n\n<h3>Section 1.10.32 of &quot;de Finibus Bonorum et Malorum&quot;, written by Cicero in 45 BC</h3>\n\n<p>&quot;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&quot;</p>\n\n<h3>1914 translation by H. Rackham</h3>\n\n<p>&quot;But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?&quot;</p>\n\n<h3>Section 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot;, written by Cicero in 45 BC</h3>\n\n<p>&quot;At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.&quot;</p>\n\n<h3>1914 translation by H. Rackham</h3>\n\n<p>&quot;On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.&quot;</p>', '<h3>The standard Lorem Ipsum passage, used since the 1500s</h3>\r\n\r\n<p>&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot;</p>\r\n\r\n<h3>Section 1.10.32 of &quot;de Finibus Bonorum et Malorum&quot;, written by Cicero in 45 BC</h3>\r\n\r\n<p>&quot;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&quot;</p>\r\n\r\n<h3>1914 translation by H. Rackham</h3>\r\n\r\n<p>&quot;But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?&quot;</p>\r\n\r\n<h3>Section 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot;, written by Cicero in 45 BC</h3>\r\n\r\n<p>&quot;At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.&quot;</p>\r\n\r\n<h3>1914 translation by H. Rackham</h3>\r\n\r\n<p>&quot;On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.&quot;</p>', '<h3>The standard Lorem Ipsum passage, used since the 1500s</h3>\r\n\r\n<p>&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot;</p>\r\n\r\n<h3>Section 1.10.32 of &quot;de Finibus Bonorum et Malorum&quot;, written by Cicero in 45 BC</h3>\r\n\r\n<p>&quot;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&quot;</p>\r\n\r\n<h3>1914 translation by H. Rackham</h3>\r\n\r\n<p>&quot;But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?&quot;</p>\r\n\r\n<h3>Section 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot;, written by Cicero in 45 BC</h3>\r\n\r\n<p>&quot;At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.&quot;</p>\r\n\r\n<h3>1914 translation by H. Rackham</h3>\r\n\r\n<p>&quot;On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.&quot;</p>', '<h3>The standard Lorem Ipsum passage, used since the 1500s</h3>\r\n\r\n<p>&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot;</p>\r\n\r\n<h3>Section 1.10.32 of &quot;de Finibus Bonorum et Malorum&quot;, written by Cicero in 45 BC</h3>\r\n\r\n<p>&quot;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&quot;</p>\r\n\r\n<h3>1914 translation by H. Rackham</h3>\r\n\r\n<p>&quot;But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?&quot;</p>\r\n\r\n<h3>Section 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot;, written by Cicero in 45 BC</h3>\r\n\r\n<p>&quot;At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.&quot;</p>\r\n\r\n<h3>1914 translation by H. Rackham</h3>\r\n\r\n<p>&quot;On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.&quot;</p>', NULL, NULL, NULL, NULL, NULL, '51795f5821bfa27c5cc7ccbc9689201c.png', '7a3d4737443ce8fa5fce979357fb276c.png', '50', '<h3>The standard Lorem Ipsum passage, used since the 1500s</h3>\r\n\r\n<p>&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot;</p>\r\n\r\n<h3>Section 1.10.32 of &quot;de Finibus Bonorum et Malorum&quot;, written by Cicero in 45 BC</h3>\r\n\r\n<p>&quot;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&quot;</p>\r\n\r\n<h3>1914 translation by H. Rackham</h3>\r\n\r\n<p>&quot;But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?&quot;</p>\r\n\r\n<h3>Section 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot;, written by Cicero in 45 BC</h3>\r\n\r\n<p>&quot;At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.&quot;</p>\r\n\r\n<h3>1914 translation by H. Rackham</h3>\r\n\r\n<p>&quot;On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.&quot;</p>', 'dsfgdfgdfsgdfgdfgdgdfgdfgdfgdfgdfgdfgsgdfg', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_special_category`
--

DROP TABLE IF EXISTS `tbl_special_category`;
CREATE TABLE IF NOT EXISTS `tbl_special_category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `special_category_name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `head_id` int DEFAULT NULL,
  `short_name` varchar(55) DEFAULT NULL,
  `visibility_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `head_id` (`head_id`),
  KEY `visibility_id` (`visibility_id`),
  KEY `visibility_id_2` (`visibility_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_special_category`
--

INSERT INTO `tbl_special_category` (`id`, `special_category_name`, `slug`, `head_id`, `short_name`, `visibility_id`) VALUES
(8, 'sdfgdf', 'sdfgdf-ff6f5a5a1efadb8a532f82311bfd9ef69f668e7d', 3, 'dfsgfdgdfg', 1),
(9, 'dfsgdgdfg', 'dfsgdgdfg-cbcdd0e9a605e7ea9fd3e6a91fe71d90fa3de6f0', 3, 'dsfgdfg', 1),
(10, 'dfsgfgdf', 'dfsgfgdf-3b148229a31fbd5b797b3cb5b8b9c90bd516d146', 3, 'DF', 1),
(11, 'dfsgfgdf', 'dfsgfgdf-3b148229a31fbd5b797b3cb5b8b9c90bd516d146', 3, 'DF', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_state`
--

DROP TABLE IF EXISTS `tbl_state`;
CREATE TABLE IF NOT EXISTS `tbl_state` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `country_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_state`
--

INSERT INTO `tbl_state` (`id`, `name`, `country_id`) VALUES
(1, 'ANDHRA PRADESH', 105),
(2, 'ASSAM', 105),
(3, 'ARUNACHAL PRADESH', 105),
(4, 'BIHAR', 105),
(6, 'HARYANA', 105),
(7, 'HIMACHAL PRADESH', 105),
(8, 'JAMMU & KASHMIR', 105),
(9, 'KARNATAKA', 105),
(10, 'KERALA', 105),
(11, 'MADHYA PRADESH', 105),
(12, 'MAHARASHTRA', 105),
(13, 'MANIPUR', 105),
(14, 'MEGHALAYA', 105),
(15, 'MIZORAM', 105),
(16, 'NAGALAND', 105),
(17, 'ORISSA', 105),
(18, 'PUNJAB', 105),
(19, 'RAJASTHAN', 105),
(20, 'SIKKIM', 105),
(21, 'TAMIL NADU', 105),
(22, 'TRIPURA', 105),
(23, 'UTTAR PRADESH', 105),
(24, 'WEST BENGAL', 105),
(25, 'DELHI', 105),
(26, 'GOA', 105),
(27, 'PONDICHERY', 105),
(28, 'LAKSHDWEEP', 105),
(29, 'DAMAN & DIU', 105),
(30, 'DADRA & NAGAR', 105),
(31, 'CHANDIGARH', 105),
(32, 'ANDAMAN & NICOBAR', 105),
(33, 'UTTARANCHAL', 105),
(34, 'JHARKHAND', 105),
(35, 'CHATTISGARH', 105),
(37, 'afsfsfsdfsdf', 18),
(38, 'gfdsgdfd', 1),
(39, 'dfsgdfgdfg', 2),
(40, 'sdfsfdf', 13),
(41, 'ddfgdgfgg', 13);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stream`
--

DROP TABLE IF EXISTS `tbl_stream`;
CREATE TABLE IF NOT EXISTS `tbl_stream` (
  `id` int NOT NULL AUTO_INCREMENT,
  `stream` varchar(255) DEFAULT NULL,
  `description` longtext,
  `stream_image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_stream`
--

INSERT INTO `tbl_stream` (`id`, `stream`, `description`, `stream_image`) VALUES
(2, 'Medicals', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC', NULL),
(3, 'Dental', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour', NULL),
(4, 'Ayurveda', 'e sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as nec', NULL),
(5, 'Homoeopathy', 's necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of mod', NULL),
(6, 'Unani', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exe', NULL),
(8, 'gfdsgdfd', 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinde', NULL),
(9, 'dfsgdfgdfg', 'ed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores e', NULL),
(10, 'rytetyrtyy', 'on numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"\n\n1914 translation by H. Rackham', NULL),
(11, 'tttttt', 'ui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iu', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sub_category`
--

DROP TABLE IF EXISTS `tbl_sub_category`;
CREATE TABLE IF NOT EXISTS `tbl_sub_category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sub_category_name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  `head_id` int DEFAULT NULL,
  `short_name` varchar(55) DEFAULT NULL,
  `open_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  KEY `head_id` (`head_id`),
  KEY `open_id` (`open_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_sub_category`
--

INSERT INTO `tbl_sub_category` (`id`, `sub_category_name`, `slug`, `category_id`, `head_id`, `short_name`, `open_id`) VALUES
(10, 'New Sub  Category', 'new-sub-category-774d7f77518bae7cead3458f1f8a01713689a987', 2, 2, 'ED', 4),
(11, 'Second Sub  Category', 'second-sub-category-757656b0729d04be0334140e52dad5b004b9d614', 2, 2, 'RF', 3),
(12, 'Newsss Sub  Category', 'newsss-sub-category-40d949e18b3f023b39a8a1f68d6f4d6883038651', 4, 2, 'TG', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sub_district`
--

DROP TABLE IF EXISTS `tbl_sub_district`;
CREATE TABLE IF NOT EXISTS `tbl_sub_district` (
  `id` int NOT NULL AUTO_INCREMENT,
  `country` int DEFAULT '1',
  `state` int DEFAULT '1',
  `district` int DEFAULT '1',
  `sub_district` varchar(255) DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_sub_district`
--

INSERT INTO `tbl_sub_district` (`id`, `country`, `state`, `district`, `sub_district`, `status`, `created_at`, `updated_at`) VALUES
(2, 105, 2, 34, 'dfgsdfgd', 1, '2023-12-02 18:58:38', '2023-12-28 17:19:22'),
(3, 105, 2, 34, 'dgdfgdfg', 1, '2023-12-02 18:58:38', '2023-12-28 17:19:24'),
(4, 105, 17, 389, 'dfgdfg', 1, '2023-12-06 17:31:42', '2023-12-28 17:19:27'),
(5, 105, 2, 34, 'dfgdfg', 1, '2023-12-25 16:37:59', '2023-12-28 17:19:28'),
(6, 105, 2, 34, 'dfgdfgdfg', 1, '2023-12-25 16:38:21', '2023-12-28 17:19:30'),
(7, 105, 2, 34, 'dfgdfgdfg', 1, '2023-12-28 18:22:32', '2023-12-28 18:22:32'),
(8, 105, 2, 34, 'Newsssss', 1, '2023-12-28 18:22:53', '2023-12-28 18:22:53');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sub_special_category`
--

DROP TABLE IF EXISTS `tbl_sub_special_category`;
CREATE TABLE IF NOT EXISTS `tbl_sub_special_category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sub_special_category_name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `special_id` int DEFAULT NULL,
  `head_id` int DEFAULT NULL,
  `short_name` varchar(55) DEFAULT NULL,
  `open_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `special_id` (`special_id`),
  KEY `head_id` (`head_id`),
  KEY `open_id` (`open_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_sub_special_category`
--

INSERT INTO `tbl_sub_special_category` (`id`, `sub_special_category_name`, `slug`, `special_id`, `head_id`, `short_name`, `open_id`) VALUES
(9, 'dfsgfgdf', 'dfsgfgdf-3b148229a31fbd5b797b3cb5b8b9c90bd516d146', 8, 2, 'DF', 1),
(10, 'dfsgfgdf', 'dfsgfgdf-3b148229a31fbd5b797b3cb5b8b9c90bd516d146', 8, 2, 'DF', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_uploaded_files`
--

DROP TABLE IF EXISTS `tbl_uploaded_files`;
CREATE TABLE IF NOT EXISTS `tbl_uploaded_files` (
  `id` int NOT NULL AUTO_INCREMENT,
  `file_from` varchar(55) NOT NULL COMMENT '''college'',''user'',''academic'',''hostel''',
  `file_type` varchar(55) NOT NULL COMMENT '''image'',''doc'',''video''',
  `file_name` varchar(255) NOT NULL,
  `file_data` int DEFAULT NULL,
  `status` tinyint NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_uploaded_files`
--

INSERT INTO `tbl_uploaded_files` (`id`, `file_from`, `file_type`, `file_name`, `file_data`, `status`, `created_at`, `updated_at`) VALUES
(2, 'college', 'image', 'COLLEGE_IMAGE3092744151699982184.jpeg', 4, 1, '2023-11-14 17:16:24', NULL),
(3, 'college', 'image', 'COLLEGE_IMAGE13360648991699982184.jpeg', 4, 1, '2023-11-14 17:16:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `user_type` enum('1','2','3','4','5') NOT NULL COMMENT '1="Student",2="Institute",3="Instructor",4="Company",5="Admin"',
  `token` varchar(255) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `password` text NOT NULL,
  `status` tinyint NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `quiz_status` int NOT NULL,
  `quiz_result` int NOT NULL,
  `email_verified` int NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `current_address` text,
  `permanent_address` text,
  `city` varchar(255) DEFAULT NULL,
  `is_address_same` tinyint NOT NULL DEFAULT '1',
  `profile_type` varchar(55) DEFAULT NULL,
  `permanent_state` int DEFAULT NULL,
  `permanent_city` int DEFAULT NULL,
  `permanent_pincode` varchar(55) DEFAULT NULL,
  `current_pincode` varchar(55) DEFAULT NULL,
  `current_state` int DEFAULT NULL,
  `current_city` int DEFAULT NULL,
  `selected_exam` int DEFAULT NULL,
  `domicile` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `name`, `email`, `mobile`, `user_type`, `token`, `image`, `password`, `status`, `created_at`, `updated_at`, `quiz_status`, `quiz_result`, `email_verified`, `username`, `current_address`, `permanent_address`, `city`, `is_address_same`, `profile_type`, `permanent_state`, `permanent_city`, `permanent_pincode`, `current_pincode`, `current_state`, `current_city`, `selected_exam`, `domicile`) VALUES
(5, 'Admin', 'admin@gmail.com', '453555345', '5', NULL, NULL, '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, '2023-06-07 14:39:56', NULL, 0, 0, 0, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(37, 'Mukesh', 'mukesh@gmail.com', '8877552344', '1', NULL, NULL, 'dfb14e0152cba3bec7e2f8fc611573d7cc30cb84', 0, '2023-10-15 14:35:05', NULL, 0, 0, 0, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(38, 'dsfgdfgfdg', 'admins@gmail.com', '2343243243', '1', NULL, NULL, 'a29c57c6894dee6e8251510d58c07078ee3f49bf', 0, '2023-10-15 15:04:19', NULL, 1, 1, 0, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(39, 'Gautam Ankit', 'admissn@gmail.com', '1234567890', '1', NULL, NULL, 'd82548a8ca229a3342a9988deaeb90658508d8aa', 0, '2023-10-15 16:29:54', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(40, 'dfgffdgdfg', 'admidfgfdgn@gmail.com', '9898989898', '1', NULL, NULL, 'feb1d0231771f8412274d9cd1937f05a174ed930', 0, '2023-10-15 16:49:29', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(41, 'cvgfygfh', 'admindsdd@gmail.com', '2323232323', '1', NULL, NULL, '29f2a9585888905331adfc092eecc8685a760e0b', 0, '2023-10-15 16:50:19', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(42, 'sdfdsf', 'admsdin@gmail.com', '3343243243', '1', NULL, NULL, '873e665305dd26f89a41b5881d13443ee9b04ace', 0, '2023-10-16 04:23:53', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(43, 'Deepanshu Mishra', 'mdeepanshu20tryy5@gmail.com', '778693128677', '1', NULL, 'fa3d58ce66792f2e41fe4aa38ca002e3.png', '30769a4ee2483bbbc2c9ebdef06a930a5bb69209', 1, '2023-10-16 11:32:38', NULL, 1, 0, 0, 'deepanshu', 'Lucknow', 'Lucknow', 'Lucknow', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(44, 'Deepanshu Mishra', 'mdeepanshu1234205@gmail.com', '778693128643', '1', NULL, NULL, '7c222fb2927d828af22f592134e8932480637c0d', 1, '2023-10-17 11:04:38', NULL, 1, 0, 0, NULL, 'dfsdgdfg', 'dfsgdfgdgdfg', NULL, 0, '3', 4, 62, '127', '453534534', 13, 127, NULL, 0),
(45, 'Deepanshu Mishra', 'mdeepanshu205@gmail.com', '7788990055', '1', NULL, '5b815db2686d605c7409069013c2e71d.JPG', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 1, '2023-10-18 12:21:03', '2023-10-19 01:09:51', 1, 1, 1, NULL, 'fghd', 'fgdhfg', NULL, 0, '1', 10, 249, '454354', '677567', 15, 368, NULL, 0),
(46, 'Deepanshu Mishra', 'mishra134400@gmail.com', '77869312866665', '1', NULL, NULL, '845db344c37ba8e692b6fa190265424ab8622aa8', 0, '2024-02-08 18:33:39', NULL, 0, 0, 0, NULL, NULL, NULL, NULL, 1, NULL, 12, NULL, NULL, NULL, 15, 368, 4, 4),
(48, 'Deepanshu Mishra', 'mishra100@gmail.com', '7786931286', '1', NULL, NULL, '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, '2024-02-08 18:34:27', NULL, 0, 0, 0, NULL, NULL, NULL, NULL, 1, NULL, 12, NULL, NULL, NULL, 15, 368, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_course_preferences`
--

DROP TABLE IF EXISTS `tbl_user_course_preferences`;
CREATE TABLE IF NOT EXISTS `tbl_user_course_preferences` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `course_id` int DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  `sub_category_id` int DEFAULT NULL,
  `domicile_category_id` int DEFAULT NULL,
  `status` enum('0','1') NOT NULL COMMENT '''0''="Inactive",''1''"Active",',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_user_course_preferences`
--

INSERT INTO `tbl_user_course_preferences` (`id`, `user_id`, `course_id`, `category_id`, `sub_category_id`, `domicile_category_id`, `status`, `created_at`, `updated_at`) VALUES
(4, 46, 3, 4, 12, NULL, '0', '2024-03-02 20:25:31', NULL),
(3, 46, 3, 2, 10, NULL, '0', '2024-03-02 20:25:31', NULL),
(5, 46, 3, 4, 12, 4, '0', '2024-03-02 20:25:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_visibility`
--

DROP TABLE IF EXISTS `tbl_visibility`;
CREATE TABLE IF NOT EXISTS `tbl_visibility` (
  `id` int NOT NULL AUTO_INCREMENT,
  `visibility` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_visibility`
--

INSERT INTO `tbl_visibility` (`id`, `visibility`, `created_at`, `updated_at`) VALUES
(1, 'Hidden', '2023-11-10 17:52:38', '2023-11-10 17:52:38'),
(2, 'Visible', '2023-11-10 17:52:53', '2023-11-10 17:52:53'),
(4, 'gfdsgdfd', '2023-12-04 18:00:29', '2023-12-04 18:00:29'),
(5, 'Show', '2023-12-04 18:00:29', '2023-12-25 19:10:40'),
(6, 'Hide', '2023-12-25 19:10:40', '2023-12-25 19:10:40'),
(7, 'tutututu', '2023-12-28 18:53:09', '2023-12-28 18:53:09');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD CONSTRAINT `head_id` FOREIGN KEY (`head_id`) REFERENCES `tbl_counselling_head` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `visibility_id` FOREIGN KEY (`visibility_id`) REFERENCES `tbl_visibility` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_counselling_head`
--
ALTER TABLE `tbl_counselling_head`
  ADD CONSTRAINT `level_id` FOREIGN KEY (`level_id`) REFERENCES `tbl_counselling_level` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `state_id` FOREIGN KEY (`state_id`) REFERENCES `tbl_state` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_special_category`
--
ALTER TABLE `tbl_special_category`
  ADD CONSTRAINT `tbl_special_category_ibfk_1` FOREIGN KEY (`head_id`) REFERENCES `tbl_counselling_head` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_sub_category`
--
ALTER TABLE `tbl_sub_category`
  ADD CONSTRAINT `tbl_sub_category_ibfk_1` FOREIGN KEY (`head_id`) REFERENCES `tbl_counselling_head` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_sub_category_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `tbl_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_sub_category_ibfk_3` FOREIGN KEY (`open_id`) REFERENCES `tbl_opens` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_sub_special_category`
--
ALTER TABLE `tbl_sub_special_category`
  ADD CONSTRAINT `tbl_sub_special_category_ibfk_1` FOREIGN KEY (`head_id`) REFERENCES `tbl_counselling_head` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_sub_special_category_ibfk_2` FOREIGN KEY (`special_id`) REFERENCES `tbl_special_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_sub_special_category_ibfk_3` FOREIGN KEY (`open_id`) REFERENCES `tbl_opens` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
