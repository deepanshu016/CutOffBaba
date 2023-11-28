-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2023 at 09:27 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cut_off_baba`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `DeleteByIDs` (IN `table_Name` VARCHAR(50), IN `column_name` VARCHAR(50), IN `ids_list` VARCHAR(255))   BEGIN
    SET @query = CONCAT('DELETE FROM ',table_Name,' WHERE ', column_name, ' IN (', ids_list, ')');
    PREPARE statement FROM @query;
    EXECUTE statement;
    DEALLOCATE PREPARE statement;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `FilterByIDs` (IN `table_name` VARCHAR(50), IN `column_name` VARCHAR(50), IN `ids_list` VARCHAR(255))   BEGIN
    SET @query = CONCAT('SELECT * FROM ',table_name,' WHERE ', column_name, ' IN (', ids_list, ')');
    PREPARE statement FROM @query;
    EXECUTE statement;
    DEALLOCATE PREPARE statement;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetCombinedData` ()   BEGIN
    SELECT t1.id as college_id, t1.full_name, t1.slug, t1.short_description, 
           COUNT(CASE WHEN t2.file_type = 'image' THEN 1 END) AS image_count,
           COUNT(CASE WHEN t2.file_type = 'doc' THEN 1 END) AS doc_count,
           COUNT(CASE WHEN t2.file_type = 'video' THEN 1 END) AS video_count
    FROM tbl_college t1
             JOIN tbl_uploaded_files t2 ON t1.id = t2.file_data
    GROUP BY t2.file_data;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetMediaData` (IN `college_id` INT(20), IN `file_types` VARCHAR(20))   BEGIN 
    -- Retrieve data for images
    SELECT * FROM tbl_uploaded_files WHERE file_type = file_types AND file_data = college_id;
    -- Retrieve data for videos
    SELECT * FROM tbl_uploaded_files WHERE file_type = file_types AND file_data = college_id;
    -- Retrieve data for documents
    SELECT * FROM tbl_uploaded_files WHERE file_type = file_types AND file_data = college_id;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_approval`
--

CREATE TABLE `tbl_approval` (
  `id` int(11) NOT NULL,
  `approval` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(10, 'NCH');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_branch`
--

CREATE TABLE `tbl_branch` (
  `id` int(11) NOT NULL,
  `branch` varchar(255) DEFAULT NULL,
  `courses` varchar(55) DEFAULT NULL,
  `branch_type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_branch`
--

INSERT INTO `tbl_branch` (`id`, `branch`, `courses`, `branch_type`) VALUES
(2, 'Anatomy', NULL, NULL),
(3, 'Physiology', NULL, NULL),
(6, 'rewtertertertewrtert', '3|5', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_city`
--

CREATE TABLE `tbl_city` (
  `id` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state_id` int(11) NOT NULL,
  `country` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_city`
--

INSERT INTO `tbl_city` (`id`, `city`, `state_id`, `country`) VALUES
(1, 'North and Middle Andaman', 32, NULL),
(2, 'South Andaman', 32, NULL),
(3, 'Nicobar', 32, NULL),
(4, 'Adilabad', 1, NULL),
(5, 'Anantapur', 1, NULL),
(6, 'Chittoor', 1, NULL),
(7, 'East Godavari', 1, NULL),
(8, 'Guntur', 1, NULL),
(9, 'Hyderabad', 1, NULL),
(12, 'Khammam', 1, NULL),
(13, 'Krishna', 1, NULL),
(14, 'Kurnool', 1, NULL),
(15, 'Mahbubnagar', 1, NULL),
(16, 'Medak', 1, NULL),
(17, 'Nalgonda', 1, NULL),
(18, 'Nellore', 1, NULL),
(19, 'Nizamabad', 1, NULL),
(20, 'Prakasam', 1, NULL),
(21, 'Rangareddi', 1, NULL),
(22, 'Srikakulam', 1, NULL),
(23, 'Vishakhapatnam', 1, NULL),
(24, 'Vizianagaram', 1, NULL),
(25, 'Warangal', 1, NULL),
(26, 'West Godavari', 1, NULL),
(27, 'Anjaw', 3, NULL),
(28, 'Changlang', 3, NULL),
(29, 'East Kameng', 3, NULL),
(30, 'Lohit', 3, NULL),
(31, 'Lower Subansiri', 3, NULL),
(32, 'Papum Pare', 3, NULL),
(33, 'Tirap', 3, NULL),
(34, 'Dibang Valley', 3, NULL),
(35, 'Upper Subansiri', 3, NULL),
(36, 'West Kameng', 3, NULL),
(37, 'Barpeta', 2, NULL),
(38, 'Bongaigaon', 2, NULL),
(39, 'Cachar', 2, NULL),
(40, 'Darrang', 2, NULL),
(41, 'Dhemaji', 2, NULL),
(42, 'Dhubri', 2, NULL),
(43, 'Dibrugarh', 2, NULL),
(44, 'Goalpara', 2, NULL),
(45, 'Golaghat', 2, NULL),
(46, 'Hailakandi', 2, NULL),
(47, 'Jorhat', 2, NULL),
(48, 'Karbi Anglong', 2, NULL),
(49, 'Karimganj', 2, NULL),
(50, 'Kokrajhar', 2, NULL),
(51, 'Lakhimpur', 2, NULL),
(52, 'Marigaon', 2, NULL),
(53, 'Nagaon', 2, NULL),
(54, 'Nalbari', 2, NULL),
(55, 'North Cachar Hills', 2, NULL),
(56, 'Sibsagar', 2, NULL),
(57, 'Sonitpur', 2, NULL),
(58, 'Tinsukia', 2, NULL),
(59, 'Araria', 4, NULL),
(60, 'Aurangabad', 4, NULL),
(61, 'Banka', 4, NULL),
(62, 'Begusarai', 4, NULL),
(63, 'Bhagalpur', 4, NULL),
(64, 'Bhojpur', 4, NULL),
(65, 'Buxar', 4, NULL),
(66, 'Darbhanga', 4, NULL),
(67, 'Purba Champaran', 4, NULL),
(68, 'Gaya', 4, NULL),
(69, 'Gopalganj', 4, NULL),
(70, 'Jamui', 4, NULL),
(71, 'Jehanabad', 4, NULL),
(72, 'Khagaria', 4, NULL),
(73, 'Kishanganj', 4, NULL),
(74, 'Kaimur', 4, NULL),
(75, 'Katihar', 4, NULL),
(76, 'Lakhisarai', 4, NULL),
(77, 'Madhubani', 4, NULL),
(78, 'Munger', 4, NULL),
(79, 'Madhepura', 4, NULL),
(80, 'Muzaffarpur', 4, NULL),
(81, 'Nalanda', 4, NULL),
(82, 'Nawada', 4, NULL),
(83, 'Patna', 4, NULL),
(84, 'Purnia', 4, NULL),
(85, 'Rohtas', 4, NULL),
(86, 'Saharsa', 4, NULL),
(87, 'Samastipur', 4, NULL),
(88, 'Sheohar', 4, NULL),
(89, 'Sheikhpura', 4, NULL),
(90, 'Saran', 4, NULL),
(91, 'Sitamarhi', 4, NULL),
(92, 'Supaul', 4, NULL),
(93, 'Siwan', 4, NULL),
(94, 'Vaishali', 4, NULL),
(95, 'Pashchim Champaran', 4, NULL),
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
(112, 'Diu', 29, NULL),
(113, 'Daman', 29, NULL),
(114, 'Central Delhi', 25, NULL),
(115, 'East Delhi', 25, NULL),
(116, 'New Delhi', 25, NULL),
(117, 'North Delhi', 25, NULL),
(118, 'North East Delhi', 25, NULL),
(119, 'North West Delhi', 25, NULL),
(120, 'South Delhi', 25, NULL),
(121, 'South West Delhi', 25, NULL),
(122, 'West Delhi', 25, NULL),
(123, 'North Goa', 26, NULL),
(124, 'South Goa', 26, NULL),
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
(150, 'Ambala', 6, NULL),
(151, 'Bhiwani', 6, NULL),
(152, 'Faridabad', 6, NULL),
(153, 'Fatehabad', 6, NULL),
(154, 'Gurgaon', 6, NULL),
(155, 'Hissar', 6, NULL),
(156, 'Jhajjar', 6, NULL),
(157, 'Jind', 6, NULL),
(158, 'Karnal', 6, NULL),
(159, 'Kaithal', 6, NULL),
(160, 'Kurukshetra', 6, NULL),
(161, 'Mahendragarh', 6, NULL),
(162, 'Mewat', 6, NULL),
(163, 'Panchkula', 6, NULL),
(164, 'Panipat', 6, NULL),
(165, 'Rewari', 6, NULL),
(166, 'Rohtak', 6, NULL),
(167, 'Sirsa', 6, NULL),
(168, 'Sonepat', 6, NULL),
(169, 'Yamuna Nagar', 6, NULL),
(170, 'Palwal', 6, NULL),
(171, 'Bilaspur', 7, NULL),
(172, 'Chamba', 7, NULL),
(173, 'Hamirpur', 7, NULL),
(174, 'Kangra', 7, NULL),
(175, 'Kinnaur', 7, NULL),
(176, 'Kulu', 7, NULL),
(177, 'Lahaul and Spiti', 7, NULL),
(178, 'Mandi', 7, NULL),
(179, 'Shimla', 7, NULL),
(180, 'Sirmaur', 7, NULL),
(181, 'Solan', 7, NULL),
(182, 'Una', 7, NULL),
(183, 'Anantnag', 8, NULL),
(184, 'Badgam', 8, NULL),
(185, 'Bandipore', 8, NULL),
(186, 'Baramula', 8, NULL),
(187, 'Doda', 8, NULL),
(188, 'Jammu', 8, NULL),
(189, 'Kargil', 8, NULL),
(190, 'Kathua', 8, NULL),
(191, 'Kupwara', 8, NULL),
(192, 'Leh', 8, NULL),
(193, 'Poonch', 8, NULL),
(194, 'Pulwama', 8, NULL),
(195, 'Rajauri', 8, NULL),
(196, 'Srinagar', 8, NULL),
(197, 'Samba', 8, NULL),
(198, 'Udhampur', 8, NULL),
(199, 'Bokaro', 34, NULL),
(200, 'Chatra', 34, NULL),
(201, 'Deoghar', 34, NULL),
(202, 'Dhanbad', 34, NULL),
(203, 'Dumka', 34, NULL),
(204, 'Purba Singhbhum', 34, NULL),
(205, 'Garhwa', 34, NULL),
(206, 'Giridih', 34, NULL),
(207, 'Godda', 34, NULL),
(208, 'Gumla', 34, NULL),
(209, 'Hazaribagh', 34, NULL),
(210, 'Koderma', 34, NULL),
(211, 'Lohardaga', 34, NULL),
(212, 'Pakur', 34, NULL),
(213, 'Palamu', 34, NULL),
(214, 'Ranchi', 34, NULL),
(215, 'Sahibganj', 34, NULL),
(216, 'Seraikela and Kharsawan', 34, NULL),
(217, 'Pashchim Singhbhum', 34, NULL),
(218, 'Ramgarh', 34, NULL),
(219, 'Bidar', 9, NULL),
(220, 'Belgaum', 9, NULL),
(221, 'Bijapur', 9, NULL),
(222, 'Bagalkot', 9, NULL),
(223, 'Bellary', 9, NULL),
(224, 'Bangalore Rural District', 9, NULL),
(225, 'Bangalore Urban District', 9, NULL),
(226, 'Chamarajnagar', 9, NULL),
(227, 'Chikmagalur', 9, NULL),
(228, 'Chitradurga', 9, NULL),
(229, 'Davanagere', 9, NULL),
(230, 'Dharwad', 9, NULL),
(231, 'Dakshina Kannada', 9, NULL),
(232, 'Gadag', 9, NULL),
(233, 'Gulbarga', 9, NULL),
(234, 'Hassan', 9, NULL),
(235, 'Haveri District', 9, NULL),
(236, 'Kodagu', 9, NULL),
(237, 'Kolar', 9, NULL),
(238, 'Koppal', 9, NULL),
(239, 'Mandya', 9, NULL),
(240, 'Mysore', 9, NULL),
(241, 'Raichur', 9, NULL),
(242, 'Shimoga', 9, NULL),
(243, 'Tumkur', 9, NULL),
(244, 'Udupi', 9, NULL),
(245, 'Uttara Kannada', 9, NULL),
(246, 'Ramanagara', 9, NULL),
(247, 'Chikballapur', 9, NULL),
(248, 'Yadagiri', 9, NULL),
(249, 'Alappuzha', 10, NULL),
(250, 'Ernakulam', 10, NULL),
(251, 'Idukki', 10, NULL),
(252, 'Kollam', 10, NULL),
(253, 'Kannur', 10, NULL),
(254, 'Kasaragod', 10, NULL),
(255, 'Kottayam', 10, NULL),
(256, 'Kozhikode', 10, NULL),
(257, 'Malappuram', 10, NULL),
(258, 'Palakkad', 10, NULL),
(259, 'Pathanamthitta', 10, NULL),
(260, 'Thrissur', 10, NULL),
(261, 'Thiruvananthapuram', 10, NULL),
(262, 'Wayanad', 10, NULL),
(263, 'Alirajpur', 11, NULL),
(264, 'Anuppur', 11, NULL),
(265, 'Ashok Nagar', 11, NULL),
(266, 'Balaghat', 11, NULL),
(267, 'Barwani', 11, NULL),
(268, 'Betul', 11, NULL),
(269, 'Bhind', 11, NULL),
(270, 'Bhopal', 11, NULL),
(271, 'Burhanpur', 11, NULL),
(272, 'Chhatarpur', 11, NULL),
(273, 'Chhindwara', 11, NULL),
(274, 'Damoh', 11, NULL),
(275, 'Datia', 11, NULL),
(276, 'Dewas', 11, NULL),
(277, 'Dhar', 11, NULL),
(278, 'Dindori', 11, NULL),
(279, 'Guna', 11, NULL),
(280, 'Gwalior', 11, NULL),
(281, 'Harda', 11, NULL),
(282, 'Hoshangabad', 11, NULL),
(283, 'Indore', 11, NULL),
(284, 'Jabalpur', 11, NULL),
(285, 'Jhabua', 11, NULL),
(286, 'Katni', 11, NULL),
(287, 'Khandwa', 11, NULL),
(288, 'Khargone', 11, NULL),
(289, 'Mandla', 11, NULL),
(290, 'Mandsaur', 11, NULL),
(291, 'Morena', 11, NULL),
(292, 'Narsinghpur', 11, NULL),
(293, 'Neemuch', 11, NULL),
(294, 'Panna', 11, NULL),
(295, 'Rewa', 11, NULL),
(296, 'Rajgarh', 11, NULL),
(297, 'Ratlam', 11, NULL),
(298, 'Raisen', 11, NULL),
(299, 'Sagar', 11, NULL),
(300, 'Satna', 11, NULL),
(301, 'Sehore', 11, NULL),
(302, 'Seoni', 11, NULL),
(303, 'Shahdol', 11, NULL),
(304, 'Shajapur', 11, NULL),
(305, 'Sheopur', 11, NULL),
(306, 'Shivpuri', 11, NULL),
(307, 'Sidhi', 11, NULL),
(308, 'Singrauli', 11, NULL),
(309, 'Tikamgarh', 11, NULL),
(310, 'Ujjain', 11, NULL),
(311, 'Umaria', 11, NULL),
(312, 'Vidisha', 11, NULL),
(313, 'Ahmednagar', 12, NULL),
(314, 'Akola', 12, NULL),
(315, 'Amrawati', 12, NULL),
(316, 'Aurangabad', 12, NULL),
(317, 'Bhandara', 12, NULL),
(318, 'Beed', 12, NULL),
(319, 'Buldhana', 12, NULL),
(320, 'Chandrapur', 12, NULL),
(321, 'Dhule', 12, NULL),
(322, 'Gadchiroli', 12, NULL),
(323, 'Gondiya', 12, NULL),
(324, 'Hingoli', 12, NULL),
(325, 'Jalgaon', 12, NULL),
(326, 'Jalna', 12, NULL),
(327, 'Kolhapur', 12, NULL),
(328, 'Latur', 12, NULL),
(329, 'Mumbai City', 12, NULL),
(330, 'Mumbai suburban', 12, NULL),
(331, 'Nandurbar', 12, NULL),
(332, 'Nanded', 12, NULL),
(333, 'Nagpur', 12, NULL),
(334, 'Nashik', 12, NULL),
(335, 'Osmanabad', 12, NULL),
(336, 'Parbhani', 12, NULL),
(337, 'Pune', 12, NULL),
(338, 'Raigad', 12, NULL),
(339, 'Ratnagiri', 12, NULL),
(340, 'Sindhudurg', 12, NULL),
(341, 'Sangli', 12, NULL),
(342, 'Solapur', 12, NULL),
(343, 'Satara', 12, NULL),
(344, 'Thane', 12, NULL),
(345, 'Wardha', 12, NULL),
(346, 'Washim', 12, NULL),
(347, 'Yavatmal', 12, NULL),
(348, 'Bishnupur', 13, NULL),
(349, 'Churachandpur', 13, NULL),
(350, 'Chandel', 13, NULL),
(351, 'Imphal East', 13, NULL),
(352, 'Senapati', 13, NULL),
(353, 'Tamenglong', 13, NULL),
(354, 'Thoubal', 13, NULL),
(355, 'Ukhrul', 13, NULL),
(356, 'Imphal West', 13, NULL),
(357, 'East Garo Hills', 14, NULL),
(358, 'East Khasi Hills', 14, NULL),
(359, 'Jaintia Hills', 14, NULL),
(360, 'Ri-Bhoi', 14, NULL),
(361, 'South Garo Hills', 14, NULL),
(362, 'West Garo Hills', 14, NULL),
(363, 'West Khasi Hills', 14, NULL),
(364, 'Aizawl', 15, NULL),
(365, 'Champhai', 15, NULL),
(366, 'Kolasib', 15, NULL),
(367, 'Lawngtlai', 15, NULL),
(368, 'Lunglei', 15, NULL),
(369, 'Mamit', 15, NULL),
(370, 'Saiha', 15, NULL),
(371, 'Serchhip', 15, NULL),
(372, 'Dimapur', 16, NULL),
(373, 'Kohima', 16, NULL),
(374, 'Mokokchung', 16, NULL),
(375, 'Mon', 16, NULL),
(376, 'Phek', 16, NULL),
(377, 'Tuensang', 16, NULL),
(378, 'Wokha', 16, NULL),
(379, 'Zunheboto', 16, NULL),
(380, 'Angul', 17, NULL),
(381, 'Boudh', 17, NULL),
(382, 'Bhadrak', 17, NULL),
(383, 'Bolangir', 17, NULL),
(384, 'Bargarh', 17, NULL),
(385, 'Baleswar', 17, NULL),
(386, 'Cuttack', 17, NULL),
(387, 'Debagarh', 17, NULL),
(388, 'Dhenkanal', 17, NULL),
(389, 'Ganjam', 17, NULL),
(390, 'Gajapati', 17, NULL),
(391, 'Jharsuguda', 17, NULL),
(392, 'Jajapur', 17, NULL),
(393, 'Jagatsinghpur', 17, NULL),
(394, 'Khordha', 17, NULL),
(395, 'Kendujhar', 17, NULL),
(396, 'Kalahandi', 17, NULL),
(397, 'Kandhamal', 17, NULL),
(398, 'Koraput', 17, NULL),
(399, 'Kendrapara', 17, NULL),
(400, 'Malkangiri', 17, NULL),
(401, 'Mayurbhanj', 17, NULL),
(402, 'Nabarangpur', 17, NULL),
(403, 'Nuapada', 17, NULL),
(404, 'Nayagarh', 17, NULL),
(405, 'Puri', 17, NULL),
(406, 'Rayagada', 17, NULL),
(407, 'Sambalpur', 17, NULL),
(408, 'Subarnapur', 17, NULL),
(409, 'Sundargarh', 17, NULL),
(410, 'Karaikal', 27, NULL),
(411, 'Mahe', 27, NULL),
(412, 'Puducherry', 27, NULL),
(413, 'Yanam', 27, NULL),
(414, 'Amritsar', 18, NULL),
(415, 'Bathinda', 18, NULL),
(416, 'Firozpur', 18, NULL),
(417, 'Faridkot', 18, NULL),
(418, 'Fatehgarh Sahib', 18, NULL),
(419, 'Gurdaspur', 18, NULL),
(420, 'Hoshiarpur', 18, NULL),
(421, 'Jalandhar', 18, NULL),
(422, 'Kapurthala', 18, NULL),
(423, 'Ludhiana', 18, NULL),
(424, 'Mansa', 18, NULL),
(425, 'Moga', 18, NULL),
(426, 'Mukatsar', 18, NULL),
(427, 'Nawan Shehar', 18, NULL),
(428, 'Patiala', 18, NULL),
(429, 'Rupnagar', 18, NULL),
(430, 'Sangrur', 18, NULL),
(431, 'Ajmer', 19, NULL),
(432, 'Alwar', 19, NULL),
(433, 'Bikaner', 19, NULL),
(434, 'Barmer', 19, NULL),
(435, 'Banswara', 19, NULL),
(436, 'Bharatpur', 19, NULL),
(437, 'Baran', 19, NULL),
(438, 'Bundi', 19, NULL),
(439, 'Bhilwara', 19, NULL),
(440, 'Churu', 19, NULL),
(441, 'Chittorgarh', 19, NULL),
(442, 'Dausa', 19, NULL),
(443, 'Dholpur', 19, NULL),
(444, 'Dungapur', 19, NULL),
(445, 'Ganganagar', 19, NULL),
(446, 'Hanumangarh', 19, NULL),
(447, 'Juhnjhunun', 19, NULL),
(448, 'Jalore', 19, NULL),
(449, 'Jodhpur', 19, NULL),
(450, 'Jaipur', 19, NULL),
(451, 'Jaisalmer', 19, NULL),
(452, 'Jhalawar', 19, NULL),
(453, 'Karauli', 19, NULL),
(454, 'Kota', 19, NULL),
(455, 'Nagaur', 19, NULL),
(456, 'Pali', 19, NULL),
(457, 'Pratapgarh', 19, NULL),
(458, 'Rajsamand', 19, NULL),
(459, 'Sikar', 19, NULL),
(460, 'Sawai Madhopur', 19, NULL),
(461, 'Sirohi', 19, NULL),
(462, 'Tonk', 19, NULL),
(463, 'Udaipur', 19, NULL),
(464, 'East Sikkim', 20, NULL),
(465, 'North Sikkim', 20, NULL),
(466, 'South Sikkim', 20, NULL),
(467, 'West Sikkim', 20, NULL),
(468, 'Ariyalur', 21, NULL),
(469, 'Chennai', 21, NULL),
(470, 'Coimbatore', 21, NULL),
(471, 'Cuddalore', 21, NULL),
(472, 'Dharmapuri', 21, NULL),
(473, 'Dindigul', 21, NULL),
(474, 'Erode', 21, NULL),
(475, 'Kanchipuram', 21, NULL),
(476, 'Kanyakumari', 21, NULL),
(477, 'Karur', 21, NULL),
(478, 'Madurai', 21, NULL),
(479, 'Nagapattinam', 21, NULL),
(480, 'The Nilgiris', 21, NULL),
(481, 'Namakkal', 21, NULL),
(482, 'Perambalur', 21, NULL),
(483, 'Pudukkottai', 21, NULL),
(484, 'Ramanathapuram', 21, NULL),
(485, 'Salem', 21, NULL),
(486, 'Sivagangai', 21, NULL),
(487, 'Tiruppur', 21, NULL),
(488, 'Tiruchirappalli', 21, NULL),
(489, 'Theni', 21, NULL),
(490, 'Tirunelveli', 21, NULL),
(491, 'Thanjavur', 21, NULL),
(492, 'Thoothukudi', 21, NULL),
(493, 'Thiruvallur', 21, NULL),
(494, 'Thiruvarur', 21, NULL),
(495, 'Tiruvannamalai', 21, NULL),
(496, 'Vellore', 21, NULL),
(497, 'Villupuram', 21, NULL),
(498, 'Dhalai', 22, NULL),
(499, 'North Tripura', 22, NULL),
(500, 'South Tripura', 22, NULL),
(501, 'West Tripura', 22, NULL),
(502, 'Almora', 33, NULL),
(503, 'Bageshwar', 33, NULL),
(504, 'Chamoli', 33, NULL),
(505, 'Champawat', 33, NULL),
(506, 'Dehradun', 33, NULL),
(507, 'Haridwar', 33, NULL),
(508, 'Nainital', 33, NULL),
(509, 'Pauri Garhwal', 33, NULL),
(510, 'Pithoragharh', 33, NULL),
(511, 'Rudraprayag', 33, NULL),
(512, 'Tehri Garhwal', 33, NULL),
(513, 'Udham Singh Nagar', 33, NULL),
(514, 'Uttarkashi', 33, NULL),
(515, 'Agra', 23, NULL),
(516, 'Allahabad', 23, NULL),
(517, 'Aligarh', 23, NULL),
(518, 'Ambedkar Nagar', 23, NULL),
(519, 'Auraiya', 23, NULL),
(520, 'Azamgarh', 23, NULL),
(521, 'Barabanki', 23, NULL),
(522, 'Badaun', 23, NULL),
(523, 'Bagpat', 23, NULL),
(524, 'Bahraich', 23, NULL),
(525, 'Bijnor', 23, NULL),
(526, 'Ballia', 23, NULL),
(527, 'Banda', 23, NULL),
(528, 'Balrampur', 23, NULL),
(529, 'Bareilly', 23, NULL),
(530, 'Basti', 23, NULL),
(531, 'Bulandshahr', 23, NULL),
(532, 'Chandauli', 23, NULL),
(533, 'Chitrakoot', 23, NULL),
(534, 'Deoria', 23, NULL),
(535, 'Etah', 23, NULL),
(536, 'Kanshiram Nagar', 23, NULL),
(537, 'Etawah', 23, NULL),
(538, 'Firozabad', 23, NULL),
(539, 'Farrukhabad', 23, NULL),
(540, 'Fatehpur', 23, NULL),
(541, 'Faizabad', 23, NULL),
(542, 'Gautam Buddha Nagar', 23, NULL),
(543, 'Gonda', 23, NULL),
(544, 'Ghazipur', 23, NULL),
(545, 'Gorkakhpur', 23, NULL),
(546, 'Ghaziabad', 23, NULL),
(547, 'Hamirpur', 23, NULL),
(548, 'Hardoi', 23, NULL),
(549, 'Mahamaya Nagar', 23, NULL),
(550, 'Jhansi', 23, NULL),
(551, 'Jalaun', 23, NULL),
(552, 'Jyotiba Phule Nagar', 23, NULL),
(553, 'Jaunpur District', 23, NULL),
(554, 'Kanpur Dehat', 23, NULL),
(555, 'Kannauj', 23, NULL),
(556, 'Kanpur Nagar', 23, NULL),
(557, 'Kaushambi', 23, NULL),
(558, 'Kushinagar', 23, NULL),
(559, 'Lalitpur', 23, NULL),
(560, 'Lakhimpur Kheri', 23, NULL),
(561, 'Lucknow', 23, NULL),
(562, 'Mau', 23, NULL),
(563, 'Meerut', 23, NULL),
(564, 'Maharajganj', 23, NULL),
(565, 'Mahoba', 23, NULL),
(566, 'Mirzapur', 23, NULL),
(567, 'Moradabad', 23, NULL),
(568, 'Mainpuri', 23, NULL),
(569, 'Mathura', 23, NULL),
(570, 'Muzaffarnagar', 23, NULL),
(571, 'Pilibhit', 23, NULL),
(572, 'Pratapgarh', 23, NULL),
(573, 'Rampur', 23, NULL),
(574, 'Rae Bareli', 23, NULL),
(575, 'Saharanpur', 23, NULL),
(576, 'Sitapur', 23, NULL),
(577, 'Shahjahanpur', 23, NULL),
(578, 'Sant Kabir Nagar', 23, NULL),
(579, 'Siddharthnagar', 23, NULL),
(580, 'Sonbhadra', 23, NULL),
(581, 'Sant Ravidas Nagar', 23, NULL),
(582, 'Sultanpur', 23, NULL),
(583, 'Shravasti', 23, NULL),
(584, 'Unnao', 23, NULL),
(585, 'Varanasi', 23, NULL),
(586, 'Birbhum', 24, NULL),
(587, 'Bankura', 24, NULL),
(588, 'Bardhaman', 24, NULL),
(589, 'Darjeeling', 24, NULL),
(590, 'Dakshin Dinajpur', 24, NULL),
(591, 'Hooghly', 24, NULL),
(592, 'Howrah', 24, NULL),
(593, 'Jalpaiguri', 24, NULL),
(594, 'Cooch Behar', 24, NULL),
(595, 'Kolkata', 24, NULL),
(596, 'Malda', 24, NULL),
(597, 'Midnapore', 24, NULL),
(598, 'Murshidabad', 24, NULL),
(599, 'Nadia', 24, NULL),
(600, 'North 24 Parganas', 24, NULL),
(601, 'South 24 Parganas', 24, NULL),
(602, 'Purulia', 24, NULL),
(603, 'Uttar Dinajpur', 24, NULL),
(604, 'sdfadsfdsfdsf', 14, NULL),
(605, 'dfgdfgfsdgdfg', 16, NULL),
(606, 'dfsgdfgdgdfgdfgf', 1, NULL),
(607, 'Lucknow', 23, 105),
(608, 'Newsssss', 15, 105);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_clinic_details`
--

CREATE TABLE `tbl_clinic_details` (
  `id` int(11) NOT NULL,
  `details` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_clinic_details`
--

INSERT INTO `tbl_clinic_details` (`id`, `details`, `created_at`, `updated_at`) VALUES
(1, 'CLINICAL NAME', '2023-11-10 18:16:59', '2023-11-10 18:16:59');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_clinic_facility`
--

CREATE TABLE `tbl_clinic_facility` (
  `id` int(11) NOT NULL,
  `facility` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_clinic_facility`
--

INSERT INTO `tbl_clinic_facility` (`id`, `facility`, `created_at`, `updated_at`) VALUES
(1, 'CLINICAL FACILITIES NAME', '2023-11-10 18:40:36', '2023-11-10 18:40:36');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_college`
--

CREATE TABLE `tbl_college` (
  `id` int(11) NOT NULL,
  `full_name` varchar(222) NOT NULL,
  `slug` varchar(55) NOT NULL,
  `short_description` longtext DEFAULT NULL,
  `popular_name_one` varchar(222) DEFAULT NULL,
  `popular_name_two` varchar(222) DEFAULT NULL,
  `establishment` date DEFAULT NULL,
  `gender_accepted` varchar(222) DEFAULT NULL,
  `course_offered` int(11) DEFAULT NULL,
  `country` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `city` int(11) NOT NULL,
  `affiliated_by` varchar(55) DEFAULT NULL,
  `university_name` varchar(225) DEFAULT NULL,
  `approved_by` varchar(55) DEFAULT NULL,
  `college_logo` varchar(255) DEFAULT NULL,
  `college_banner` varchar(225) DEFAULT NULL,
  `prospectus_file` varchar(255) DEFAULT NULL,
  `ownership` int(11) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact_one` varchar(35) DEFAULT NULL,
  `contact_two` varchar(35) DEFAULT NULL,
  `contact_three` varchar(35) DEFAULT NULL,
  `nodal_officer_name` varchar(255) DEFAULT NULL,
  `nodal_officer_no` varchar(35) DEFAULT NULL,
  `keywords` text DEFAULT NULL,
  `tags` text DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `status` tinyint(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `column_name` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_college`
--

INSERT INTO `tbl_college` (`id`, `full_name`, `slug`, `short_description`, `popular_name_one`, `popular_name_two`, `establishment`, `gender_accepted`, `course_offered`, `country`, `state`, `city`, `affiliated_by`, `university_name`, `approved_by`, `college_logo`, `college_banner`, `prospectus_file`, `ownership`, `website`, `email`, `contact_one`, `contact_two`, `contact_three`, `nodal_officer_name`, `nodal_officer_no`, `keywords`, `tags`, `added_by`, `status`, `created_at`, `updated_at`, `column_name`) VALUES
(2, 'gddfgsdfgdfgdf', 'gddfgsdfgdfgdf-5dcf70fd6199e033b74af3f03b1015192653400e', 'sdfadsfdsfadsf', 'adsfasdf', 'gdfsgdfgdfg', '2023-11-15', '3|4', 2, 105, 19, 446, '5', 'sdafsdfdsfsdff', '8', '9c8af39c962c0644e2697aff8620e61d.jpg', NULL, NULL, 4, 'https://www.deepanshumishra.com', 'mdeepanshu205@gmail.com', '5654654456', '543534534534', '43534534543', NULL, '43534534534545', NULL, 'fsdfsafdsf, adsfdsf, adsfsdf, sadfasdf, asdfasdf', 5, 1, '2023-11-08 18:04:48', NULL, NULL),
(4, 'gddfgsdfgdfgdf', 'gddfgsdfgdfgdf-5dcf70fd6199e033b74af3f03b1015192653400e', 'sdfadsfdsfadsf', 'adsfasdf', 'gdfsgdfgdfg', '2023-11-15', '3|4', 2, 105, 19, 446, '5', 'sdafsdfdsfsdff', '8', 'COLLEGE_IMAGE3092744151699982184.jpeg', NULL, NULL, 4, 'https://www.deepanshumishra.com', '', '5654654456', '543534534534', '43534534543', 'dsfgdfgdfgdf', '43534534534545', 'dgdfgsdfgdf, dsfgdfgdfg, sdfgdgdfg, dsfgdfgdfsgd', 'fsdfsafdsf, adsfdsf, adsfsdf, sadfasdf, asdfasdf', 5, 1, '2023-11-08 18:07:21', '2023-11-15 19:38:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_country`
--

CREATE TABLE `tbl_country` (
  `id` int(5) NOT NULL,
  `countryCode` char(2) NOT NULL DEFAULT '',
  `name` varchar(45) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(251, 'WS', 'Wide Site');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course`
--

CREATE TABLE `tbl_course` (
  `id` int(11) NOT NULL,
  `course` varchar(255) DEFAULT NULL,
  `course_full_name` text DEFAULT NULL,
  `course_short_name` text DEFAULT NULL,
  `course_icon` varchar(255) DEFAULT NULL,
  `stream` int(11) DEFAULT NULL,
  `degree_type` int(11) DEFAULT NULL,
  `course_duration` double(10,2) DEFAULT NULL,
  `exam` varchar(255) DEFAULT NULL,
  `course_eligibility` longtext DEFAULT NULL,
  `course_opportunity` longtext DEFAULT NULL,
  `expected_salary` longtext DEFAULT NULL,
  `course_fees` longtext DEFAULT NULL,
  `counselling_authority` varchar(55) DEFAULT NULL,
  `college` varchar(255) NOT NULL,
  `branch_type` int(11) NOT NULL,
  `status` tinyint(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_course`
--

INSERT INTO `tbl_course` (`id`, `course`, `course_full_name`, `course_short_name`, `course_icon`, `stream`, `degree_type`, `course_duration`, `exam`, `course_eligibility`, `course_opportunity`, `expected_salary`, `course_fees`, `counselling_authority`, `college`, `branch_type`, `status`, `created_at`, `updated_at`) VALUES
(2, 'MBBS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, '2023-11-10 19:42:23', NULL),
(3, 'BAMS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, '2023-11-10 19:42:23', NULL),
(4, 'MD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, '2023-11-10 19:42:23', NULL),
(5, 'MS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, '2023-11-10 19:42:23', NULL),
(7, 'MCA', 'sdgdfgdfgdfgdf', 'gsdfgsdfgdfgdfsg', 'a6ed49e7c2f977ea9f21daddd955d9dd.jpg', 4, 3, 23.00, '4', '<p>hfghgfhgfhdfhfhfghdfhfdhfghfd</p>', '<p>fgdhfhgfhdhgfhgfhtryeytrytreyrytreyryrytytreyrtyreytrfdhgfhdfh</p>\r\n', '<p>dgsdfgdfgfdgsdfgfsdgdfgdgdgdfgdgdfgdgdsfgdfgdfg</p>\r\n', '<p>fdsgdfgdfgfdsgdfgdfgfdgsdfgfdgsdf</p>\r\n', 'AACCC', '2|4', 2, 0, '2023-11-10 19:48:39', '2023-11-10 20:03:12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_degree_type`
--

CREATE TABLE `tbl_degree_type` (
  `id` int(11) NOT NULL,
  `degreetype` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_degree_type`
--

INSERT INTO `tbl_degree_type` (`id`, `degreetype`) VALUES
(2, 'UG'),
(3, 'PG'),
(4, 'PG Diploma'),
(5, 'Super Speciality');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_exam`
--

CREATE TABLE `tbl_exam` (
  `id` int(11) NOT NULL,
  `exam` varchar(255) DEFAULT NULL,
  `exam_full_name` text DEFAULT NULL,
  `exam_short_name` text DEFAULT NULL,
  `degree_type` int(11) DEFAULT NULL,
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
  `slug` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_exam`
--

INSERT INTO `tbl_exam` (`id`, `exam`, `exam_full_name`, `exam_short_name`, `degree_type`, `eligibility`, `exam_duration`, `maximum_marks`, `passing_marks`, `qualifying_marks`, `exam_held_in`, `registration_starts`, `registration_ends`, `stream`, `course_accepting`, `slug`) VALUES
(4, 'NEET UG', 'National Eligibility Cum Entrance Exam', 'NEET UG', 2, '<p>fghdfhghghgh</p>', '60', 720.00, 520.00, 300.00, '12|1|2|3', '2024-01-01', '2024-03-30', '3|4|5', '2|3|5', 'neet-ug-f01fe3993962d7c65c02bd5f03c2fa0987cb65ff');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feeshead`
--

CREATE TABLE `tbl_feeshead` (
  `id` int(11) NOT NULL,
  `fee_head_name` varchar(100) DEFAULT NULL,
  `tution_fees` varchar(50) DEFAULT NULL,
  `hostel_fees` varchar(50) DEFAULT NULL,
  `misc_fees` varchar(50) DEFAULT NULL,
  `bank_details_1` varchar(100) DEFAULT NULL,
  `bank_details_2` varchar(100) DEFAULT NULL,
  `demand_draft_name` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE `tbl_gallery` (
  `id` int(11) NOT NULL,
  `head_id` int(11) DEFAULT NULL,
  `media_id` int(11) DEFAULT NULL,
  `college_id` int(11) NOT NULL,
  `status` tinyint(4) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `tbl_gallery_heads` (
  `id` int(11) NOT NULL,
  `head_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_gallery_heads`
--

INSERT INTO `tbl_gallery_heads` (`id`, `head_name`, `created_at`, `updated_at`) VALUES
(1, 'Academics', '2023-11-11 07:46:22', '2023-11-11 07:46:22'),
(2, 'Hostel', '2023-11-11 07:46:31', '2023-11-11 07:46:31'),
(3, 'Hospital Building', '2023-11-11 07:46:40', '2023-11-11 07:46:40'),
(4, 'Classrooms', '2023-11-11 07:46:50', '2023-11-11 07:46:50');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gender`
--

CREATE TABLE `tbl_gender` (
  `id` int(11) NOT NULL,
  `gender` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_gender`
--

INSERT INTO `tbl_gender` (`id`, `gender`) VALUES
(3, 'Male'),
(4, 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nature`
--

CREATE TABLE `tbl_nature` (
  `id` int(11) NOT NULL,
  `nature` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_nature`
--

INSERT INTO `tbl_nature` (`id`, `nature`) VALUES
(2, 'Clinical'),
(3, 'Non Clinical'),
(4, 'Anesthesia Group'),
(5, 'OBG Group');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_opens`
--

CREATE TABLE `tbl_opens` (
  `id` int(11) NOT NULL,
  `opens` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_opens`
--

INSERT INTO `tbl_opens` (`id`, `opens`, `created_at`, `updated_at`) VALUES
(1, 'rtretertetertre', '2023-11-10 17:34:47', '2023-11-10 17:36:11');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ownership`
--

CREATE TABLE `tbl_ownership` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `slug` text NOT NULL,
  `status` tinyint(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_ownership`
--

INSERT INTO `tbl_ownership` (`id`, `title`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Govt', 'govt-f8bb7177cc7fe4d3ba57bdcb9e36cdaa596e4cb7', 1, '2023-11-08 16:19:56', NULL),
(3, 'Deemed,', '-da39a3ee5e6b4b0d3255bfef95601890afd80709', 1, '2023-11-08 16:20:09', '2023-11-08 16:23:11'),
(4, 'Private', 'private-e80721793c24ae14edfca9b26ad406a9815cd3ff', 1, '2023-11-08 16:20:23', NULL),
(5, 'Central University', 'central-university-f9b5bba9e504b65988f9a5e7acd99e45db7295ea', 1, '2023-11-08 16:20:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_recognition`
--

CREATE TABLE `tbl_recognition` (
  `id` int(11) NOT NULL,
  `recognition` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_recognition`
--

INSERT INTO `tbl_recognition` (`id`, `recognition`) VALUES
(2, 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service_bond_rules`
--

CREATE TABLE `tbl_service_bond_rules` (
  `id` int(11) NOT NULL,
  `service_bond` varchar(100) DEFAULT NULL,
  `seat_indentity_charges` varchar(100) DEFAULT NULL,
  `upgradation_processing_fees` varchar(100) DEFAULT NULL,
  `Created_At` timestamp NOT NULL DEFAULT current_timestamp(),
  `Updated_At` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_service_bond_rules`
--

INSERT INTO `tbl_service_bond_rules` (`id`, `service_bond`, `seat_indentity_charges`, `upgradation_processing_fees`, `Created_At`, `Updated_At`) VALUES
(1, 'Femo', '50000', '22', '2023-11-24 19:10:52', '2023-11-24 19:11:19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_site_settings`
--

CREATE TABLE `tbl_site_settings` (
  `id` int(11) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `title` longtext DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `banner_image` varchar(255) DEFAULT NULL,
  `meta_title` longtext DEFAULT NULL,
  `meta_description` longtext DEFAULT NULL,
  `keywords` longtext DEFAULT NULL,
  `mobile_no` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `gst` varchar(255) DEFAULT NULL,
  `about_us` longtext DEFAULT NULL,
  `terms_condition` longtext DEFAULT NULL,
  `privacy_policy` longtext DEFAULT NULL,
  `return_refund` longtext DEFAULT NULL,
  `onesignal_salt` longtext DEFAULT NULL,
  `onesignal_key` longtext DEFAULT NULL,
  `razorpay_salt` longtext DEFAULT NULL,
  `razorpay_key` longtext DEFAULT NULL,
  `map_api_key` text DEFAULT NULL,
  `invoice_header_img` longtext DEFAULT NULL,
  `invoice_footer_img` longtext DEFAULT NULL,
  `featured_course_price` text DEFAULT NULL,
  `invoice_terms_condition` longtext DEFAULT NULL,
  `analytics_code` longtext DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_site_settings`
--

INSERT INTO `tbl_site_settings` (`id`, `logo`, `favicon`, `title`, `description`, `banner_image`, `meta_title`, `meta_description`, `keywords`, `mobile_no`, `email`, `address`, `gst`, `about_us`, `terms_condition`, `privacy_policy`, `return_refund`, `onesignal_salt`, `onesignal_key`, `razorpay_salt`, `razorpay_key`, `map_api_key`, `invoice_header_img`, `invoice_footer_img`, `featured_course_price`, `invoice_terms_condition`, `analytics_code`, `status`, `created_at`, `updated_at`) VALUES
(1, 'fbcb470af837842efa2abd8e28aa95f2.png', 'f7415fcafdc6f5442a4305b2475991d9.png', 'Cutoff Baba', 'Cutoff Baba', 'f30704ea5af26ee78f1329c27669a82b.JPG', 'Cutoff Baba', 'Cutoff Baba', NULL, '54645645645645', 'cutoffbaba@gmail.com', 'dfasfsfafsfdfasf', NULL, '<h3>The standard Lorem Ipsum passage, used since the 1500s</h3>\r\n\r\n<p>&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot;</p>\r\n\r\n<h3>Section 1.10.32 of &quot;de Finibus Bonorum et Malorum&quot;, written by Cicero in 45 BC</h3>\r\n\r\n<p>&quot;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&quot;</p>\r\n\r\n<h3>1914 translation by H. Rackham</h3>\r\n\r\n<p>&quot;But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?&quot;</p>\r\n\r\n<h3>Section 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot;, written by Cicero in 45 BC</h3>\r\n\r\n<p>&quot;At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.&quot;</p>\r\n\r\n<h3>1914 translation by H. Rackham</h3>\r\n\r\n<p>&quot;On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.&quot;</p>', '<h3>The standard Lorem Ipsum passage, used since the 1500s</h3>\r\n\r\n<p>&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot;</p>\r\n\r\n<h3>Section 1.10.32 of &quot;de Finibus Bonorum et Malorum&quot;, written by Cicero in 45 BC</h3>\r\n\r\n<p>&quot;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&quot;</p>\r\n\r\n<h3>1914 translation by H. Rackham</h3>\r\n\r\n<p>&quot;But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?&quot;</p>\r\n\r\n<h3>Section 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot;, written by Cicero in 45 BC</h3>\r\n\r\n<p>&quot;At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.&quot;</p>\r\n\r\n<h3>1914 translation by H. Rackham</h3>\r\n\r\n<p>&quot;On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.&quot;</p>', '<h3>The standard Lorem Ipsum passage, used since the 1500s</h3>\r\n\r\n<p>&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot;</p>\r\n\r\n<h3>Section 1.10.32 of &quot;de Finibus Bonorum et Malorum&quot;, written by Cicero in 45 BC</h3>\r\n\r\n<p>&quot;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&quot;</p>\r\n\r\n<h3>1914 translation by H. Rackham</h3>\r\n\r\n<p>&quot;But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?&quot;</p>\r\n\r\n<h3>Section 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot;, written by Cicero in 45 BC</h3>\r\n\r\n<p>&quot;At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.&quot;</p>\r\n\r\n<h3>1914 translation by H. Rackham</h3>\r\n\r\n<p>&quot;On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.&quot;</p>', '<h3>The standard Lorem Ipsum passage, used since the 1500s</h3>\r\n\r\n<p>&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot;</p>\r\n\r\n<h3>Section 1.10.32 of &quot;de Finibus Bonorum et Malorum&quot;, written by Cicero in 45 BC</h3>\r\n\r\n<p>&quot;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&quot;</p>\r\n\r\n<h3>1914 translation by H. Rackham</h3>\r\n\r\n<p>&quot;But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?&quot;</p>\r\n\r\n<h3>Section 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot;, written by Cicero in 45 BC</h3>\r\n\r\n<p>&quot;At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.&quot;</p>\r\n\r\n<h3>1914 translation by H. Rackham</h3>\r\n\r\n<p>&quot;On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.&quot;</p>', NULL, NULL, NULL, NULL, NULL, 'e657162107ae3e8004325d3998fa41ae.JPG', 'de1e22b4ef3b9af450d2c220adeea084.JPG', '50', '<h3>The standard Lorem Ipsum passage, used since the 1500s</h3>\r\n\r\n<p>&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot;</p>\r\n\r\n<h3>Section 1.10.32 of &quot;de Finibus Bonorum et Malorum&quot;, written by Cicero in 45 BC</h3>\r\n\r\n<p>&quot;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&quot;</p>\r\n\r\n<h3>1914 translation by H. Rackham</h3>\r\n\r\n<p>&quot;But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?&quot;</p>\r\n\r\n<h3>Section 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot;, written by Cicero in 45 BC</h3>\r\n\r\n<p>&quot;At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.&quot;</p>\r\n\r\n<h3>1914 translation by H. Rackham</h3>\r\n\r\n<p>&quot;On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.&quot;</p>', 'dsfgdfgdfsgdfgdfgdgdfgdfgdfgdfgdfgdfgsgdfg', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_state`
--

CREATE TABLE `tbl_state` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `country_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(37, 'afsfsfsdfsdf', 18);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stream`
--

CREATE TABLE `tbl_stream` (
  `id` int(11) NOT NULL,
  `stream` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_stream`
--

INSERT INTO `tbl_stream` (`id`, `stream`) VALUES
(2, 'Medical'),
(3, 'Dental'),
(4, 'Ayurveda'),
(5, 'Homoeopathy'),
(6, 'Unani');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sub_district`
--

CREATE TABLE `tbl_sub_district` (
  `id` int(11) NOT NULL,
  `country` int(11) DEFAULT 1,
  `state` int(11) DEFAULT 1,
  `district` int(11) DEFAULT 1,
  `sub_district` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_uploaded_files`
--

CREATE TABLE `tbl_uploaded_files` (
  `id` int(11) NOT NULL,
  `file_from` varchar(55) NOT NULL COMMENT '''college'',''user'',''academic'',''hostel''',
  `file_type` varchar(55) NOT NULL COMMENT '''image'',''doc'',''video''',
  `file_name` varchar(255) NOT NULL,
  `file_data` int(11) DEFAULT NULL,
  `status` tinyint(5) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `user_type` enum('1','2','3','4','5') NOT NULL COMMENT '1="Student",2="Institute",3="Instructor",4="Company",5="Admin"',
  `token` varchar(255) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `password` text NOT NULL,
  `status` tinyint(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `quiz_status` int(11) NOT NULL,
  `quiz_result` int(11) NOT NULL,
  `email_verified` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `current_address` text DEFAULT NULL,
  `permanent_address` text DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `is_address_same` tinyint(5) NOT NULL DEFAULT 1,
  `profile_type` varchar(55) DEFAULT NULL,
  `permanent_state` int(11) DEFAULT NULL,
  `permanent_city` int(11) DEFAULT NULL,
  `permanent_pincode` varchar(55) DEFAULT NULL,
  `current_pincode` varchar(55) DEFAULT NULL,
  `current_state` int(11) DEFAULT NULL,
  `current_city` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `name`, `email`, `mobile`, `user_type`, `token`, `image`, `password`, `status`, `created_at`, `updated_at`, `quiz_status`, `quiz_result`, `email_verified`, `username`, `current_address`, `permanent_address`, `city`, `is_address_same`, `profile_type`, `permanent_state`, `permanent_city`, `permanent_pincode`, `current_pincode`, `current_state`, `current_city`) VALUES
(5, 'Admin', 'admin@gmail.com', '453555345', '5', NULL, NULL, '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, '2023-06-07 14:39:56', NULL, 0, 0, 0, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, 'Mukesh', 'mukesh@gmail.com', '8877552344', '1', NULL, NULL, 'dfb14e0152cba3bec7e2f8fc611573d7cc30cb84', 0, '2023-10-15 14:35:05', NULL, 0, 0, 0, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, 'dsfgdfgfdg', 'admins@gmail.com', '2343243243', '1', NULL, NULL, 'a29c57c6894dee6e8251510d58c07078ee3f49bf', 0, '2023-10-15 15:04:19', NULL, 1, 1, 0, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, 'Gautam Ankit', 'admissn@gmail.com', '1234567890', '1', NULL, NULL, 'd82548a8ca229a3342a9988deaeb90658508d8aa', 0, '2023-10-15 16:29:54', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, 'dfgffdgdfg', 'admidfgfdgn@gmail.com', '9898989898', '1', NULL, NULL, 'feb1d0231771f8412274d9cd1937f05a174ed930', 0, '2023-10-15 16:49:29', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, 'cvgfygfh', 'admindsdd@gmail.com', '2323232323', '1', NULL, NULL, '29f2a9585888905331adfc092eecc8685a760e0b', 0, '2023-10-15 16:50:19', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, 'sdfdsf', 'admsdin@gmail.com', '3343243243', '1', NULL, NULL, '873e665305dd26f89a41b5881d13443ee9b04ace', 0, '2023-10-16 04:23:53', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, 'Deepanshu Mishra', 'mdeepanshu20tryy5@gmail.com', '778693128677', '1', NULL, 'fa3d58ce66792f2e41fe4aa38ca002e3.png', '30769a4ee2483bbbc2c9ebdef06a930a5bb69209', 1, '2023-10-16 11:32:38', NULL, 1, 0, 0, 'deepanshu', 'Lucknow', 'Lucknow', 'Lucknow', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, 'Deepanshu Mishra', 'mdeepanshu1234205@gmail.com', '7786931286', '1', NULL, NULL, '7c222fb2927d828af22f592134e8932480637c0d', 1, '2023-10-17 11:04:38', NULL, 1, 0, 0, NULL, 'dfsdgdfg', 'dfsgdfgdgdfg', NULL, 0, '3', 4, 62, '127', '453534534', 13, 127),
(45, 'Deepanshu Mishra', 'mdeepanshu205@gmail.com', '7788990055', '1', NULL, '5b815db2686d605c7409069013c2e71d.JPG', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 1, '2023-10-18 12:21:03', '2023-10-19 01:09:51', 1, 1, 1, NULL, 'fghd', 'fgdhfg', NULL, 0, '1', 10, 249, '454354', '677567', 15, 368);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_visibility`
--

CREATE TABLE `tbl_visibility` (
  `id` int(11) NOT NULL,
  `visibility` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_visibility`
--

INSERT INTO `tbl_visibility` (`id`, `visibility`, `created_at`, `updated_at`) VALUES
(1, 'Hidden', '2023-11-10 17:52:38', '2023-11-10 17:52:38'),
(2, 'Visible', '2023-11-10 17:52:53', '2023-11-10 17:52:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_approval`
--
ALTER TABLE `tbl_approval`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_branch`
--
ALTER TABLE `tbl_branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_city`
--
ALTER TABLE `tbl_city`
  ADD PRIMARY KEY (`id`),
  ADD KEY `state_id` (`state_id`);

--
-- Indexes for table `tbl_clinic_details`
--
ALTER TABLE `tbl_clinic_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_clinic_facility`
--
ALTER TABLE `tbl_clinic_facility`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_college`
--
ALTER TABLE `tbl_college`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tbl_country`
--
ALTER TABLE `tbl_country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_course`
--
ALTER TABLE `tbl_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_degree_type`
--
ALTER TABLE `tbl_degree_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_exam`
--
ALTER TABLE `tbl_exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_feeshead`
--
ALTER TABLE `tbl_feeshead`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_gallery_heads`
--
ALTER TABLE `tbl_gallery_heads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_gender`
--
ALTER TABLE `tbl_gender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_nature`
--
ALTER TABLE `tbl_nature`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_opens`
--
ALTER TABLE `tbl_opens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ownership`
--
ALTER TABLE `tbl_ownership`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_recognition`
--
ALTER TABLE `tbl_recognition`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_service_bond_rules`
--
ALTER TABLE `tbl_service_bond_rules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_site_settings`
--
ALTER TABLE `tbl_site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_state`
--
ALTER TABLE `tbl_state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_stream`
--
ALTER TABLE `tbl_stream`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sub_district`
--
ALTER TABLE `tbl_sub_district`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_uploaded_files`
--
ALTER TABLE `tbl_uploaded_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tbl_visibility`
--
ALTER TABLE `tbl_visibility`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_approval`
--
ALTER TABLE `tbl_approval`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_branch`
--
ALTER TABLE `tbl_branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_city`
--
ALTER TABLE `tbl_city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=609;

--
-- AUTO_INCREMENT for table `tbl_clinic_details`
--
ALTER TABLE `tbl_clinic_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_clinic_facility`
--
ALTER TABLE `tbl_clinic_facility`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_college`
--
ALTER TABLE `tbl_college`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_country`
--
ALTER TABLE `tbl_country`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=252;

--
-- AUTO_INCREMENT for table `tbl_course`
--
ALTER TABLE `tbl_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_degree_type`
--
ALTER TABLE `tbl_degree_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_exam`
--
ALTER TABLE `tbl_exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_feeshead`
--
ALTER TABLE `tbl_feeshead`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_gallery_heads`
--
ALTER TABLE `tbl_gallery_heads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_gender`
--
ALTER TABLE `tbl_gender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_nature`
--
ALTER TABLE `tbl_nature`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_opens`
--
ALTER TABLE `tbl_opens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_ownership`
--
ALTER TABLE `tbl_ownership`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_recognition`
--
ALTER TABLE `tbl_recognition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_service_bond_rules`
--
ALTER TABLE `tbl_service_bond_rules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_site_settings`
--
ALTER TABLE `tbl_site_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_state`
--
ALTER TABLE `tbl_state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_stream`
--
ALTER TABLE `tbl_stream`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_sub_district`
--
ALTER TABLE `tbl_sub_district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_uploaded_files`
--
ALTER TABLE `tbl_uploaded_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tbl_visibility`
--
ALTER TABLE `tbl_visibility`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
