-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 06, 2024 at 08:51 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hospital`
--

DROP TABLE IF EXISTS `tbl_hospital`;
CREATE TABLE IF NOT EXISTS `tbl_hospital` (
  `id` int NOT NULL AUTO_INCREMENT,
  `hospital_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `college_id` int NOT NULL,
  `facilities` longtext NOT NULL,
  `status` tinyint NOT NULL DEFAULT '5',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_hospital`
--

INSERT INTO `tbl_hospital` (`id`, `hospital_name`, `college_id`, `facilities`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Deena Dayal Upadhayay Hospital', 1, '[{\"facility_id\":\"1\",\"value\":\"124\"},{\"facility_id\":\"2\",\"value\":\"24\"},{\"facility_id\":\"3\",\"value\":\"54\"},{\"facility_id\":\"4\",\"value\":\"56\"},{\"facility_id\":\"5\",\"value\":\"45\"},{\"facility_id\":\"6\",\"value\":\"35\"}]', 1, '2024-07-05 20:02:26', '2024-07-06 20:47:08'),
(4, 'New Hospital', 2, '[{\"facility_id\":\"1\",\"value\":\"152\"},{\"facility_id\":\"2\",\"value\":\"56\"},{\"facility_id\":\"3\",\"value\":\"250\"},{\"facility_id\":\"4\",\"value\":0},{\"facility_id\":\"5\",\"value\":0},{\"facility_id\":\"6\",\"value\":0}]', 1, '2024-07-05 20:34:23', '2024-07-06 20:47:08');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
