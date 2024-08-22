-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for project_management
CREATE DATABASE IF NOT EXISTS `project_management` /*!40100 DEFAULT CHARACTER SET latin1 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `project_management`;

-- Dumping structure for table project_management.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `jenis_kelamin` varchar(50) DEFAULT NULL,
  `telp` varchar(13) DEFAULT NULL,
  `alamat` varchar(225) DEFAULT NULL,
  `foto` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `role_id` int DEFAULT '3',
  `statusdelete` enum('delete','no') DEFAULT 'no',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table project_management.users: ~10 rows (approximately)
INSERT INTO `users` (`id`, `email`, `username`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`, `jenis_kelamin`, `telp`, `alamat`, `foto`, `role_id`, `statusdelete`) VALUES
	(22, 'member@gmail.com', 'member', '$2y$10$xMH2O.mnUf17RBZDFOpeqeL459fg9gddlPbsq4fyA7F/tBLIbttkW', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-07-09 02:15:23', '2024-07-09 02:15:23', NULL, '', '', '', '1-intro-photo-final_2.jpg', NULL, 'no'),
	(23, 'admin@gmail.com', 'admin', '$2y$10$Wevfsbn8hzC.gwZiRsYScu1E19z1gI2tY3dbdduC2BzT2JfqLhLui', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-07-09 08:24:29', '2024-07-09 08:24:29', NULL, '', '0909090909090', '', 'cool-profile-picture-87h46gcobjl5e4xu_2.jpg', NULL, 'no'),
	(24, 'projectmanager@gmail.com', 'project manager', '$2y$10$hpNdQXhIVn5inXCjpPLLJu5VHqyfNCK03cZDg0TTC9Lq32i5ngKQ.', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-07-10 07:25:33', '2024-07-10 07:25:33', NULL, '', '0909090909090', '', 'tips aman berinternet_2.png', NULL, 'no'),
	(26, 'yusmawati10@guru.sd.belajar.id', 'yusmawati', '', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, 'Female', '0909090909090', 'jauh', NULL, NULL, 'no'),
	(27, 'muhammad@gmail.com', 'muhammad', '$2y$10$2fpXWBbAfG0h45pg70EVSOzfak2re2G/SPHFt8.3jfq0AhaZbdaEe', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-07-11 09:01:28', '2024-07-11 09:01:28', NULL, NULL, NULL, NULL, NULL, 2, 'no'),
	(28, 'fadhil@gmail.com', 'fadhil', '$2y$10$Jdwea2LnqD9sBbXX7f.epuXJVSdocYPjiKOTGZC.mFQ2yuzPQQA76', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-07-11 09:07:52', '2024-07-11 09:07:52', NULL, NULL, NULL, NULL, NULL, 2, 'no'),
	(32, 'memberbaru@gmail.com', 'memberbaru', '$2y$10$0aqbGV5KCp/0vyLsqOiLbueYZiSeoYqNMcnqNhiO5ULK36n7RyA8W', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-07-22 08:40:21', '2024-07-22 08:40:21', NULL, NULL, NULL, NULL, NULL, 3, 'no'),
	(33, 'membernew@gmail.com', 'membernew', '$2y$10$eYPv5LsYskzO7gJhDdSvBeKWfYssJGJdQvpdbpS3UihY3qqnFAmTS', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-07-22 08:41:08', '2024-07-22 08:41:08', NULL, NULL, NULL, NULL, NULL, 3, 'delete'),
	(34, 'member1@gmail.com', 'member1', '$2y$10$sFDAIecUC8dHyzT0PThSrOM.D0N7TBbVUqtFkJMgROqlQMO/Tzwm2', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-07-22 08:41:36', '2024-07-22 08:41:36', NULL, NULL, NULL, NULL, NULL, 3, 'delete'),
	(36, 'naktesdelete@gmail.com', 'nak tes delete', '$2y$10$3R6VZt1XxK4Yxb.1HAar2utggec47pa3RFIEGLdMULMgjvhIqbrSq', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-07-30 07:52:54', '2024-07-30 07:52:54', NULL, NULL, NULL, NULL, NULL, 3, 'delete'),
	(37, 'kaproject@gmail.com', 'ketua', '$2y$10$fyss/S3bXbBMFJ8bmTnM/OT5FzGtscjdF8IDZP/O7wDGzH2vbl.ZC', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-07-30 08:46:11', '2024-07-30 08:46:11', NULL, NULL, NULL, NULL, NULL, 3, 'no');

-- Dumping structure for table project_management.auth_activation_attempts
CREATE TABLE IF NOT EXISTS `auth_activation_attempts` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table project_management.auth_activation_attempts: ~0 rows (approximately)

-- Dumping structure for table project_management.auth_groups
CREATE TABLE IF NOT EXISTS `auth_groups` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table project_management.auth_groups: ~3 rows (approximately)
INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
	(1, 'admin', 'admin site'),
	(2, 'project_manager', 'manager site'),
	(3, 'member', 'member site');

-- Dumping structure for table project_management.auth_groups_users


-- Dumping structure for table project_management.auth_logins
CREATE TABLE IF NOT EXISTS `auth_logins` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int unsigned DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `email` (`email`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=233 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table project_management.auth_logins: ~126 rows (approximately)
INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
	(1, '::1', 'admin', 1, '2024-04-29 01:12:35', 0),
	(2, '::1', 'admin', 1, '2024-04-29 01:12:45', 0),
	(3, '::1', 'admin', 1, '2024-04-29 01:20:45', 0),
	(4, '::1', 'user@gmail.com', 2, '2024-04-29 01:23:54', 1),
	(5, '::1', 'riskiaulia518@gmail.com', 3, '2024-04-29 01:43:45', 1),
	(6, '::1', 'user@gmail.com', 2, '2024-04-29 01:45:07', 1),
	(7, '::1', 'riskiaulia518@gmail.com', 3, '2024-05-14 01:54:10', 1),
	(8, '::1', 'riskiaulia518@gmail.com', 3, '2024-05-14 02:10:53', 1),
	(9, '::1', 'riski', NULL, '2024-05-15 01:34:05', 0),
	(10, '::1', 'riski', NULL, '2024-05-15 01:34:17', 0),
	(11, '::1', 'riski', NULL, '2024-05-15 01:34:30', 0),
	(12, '::1', 'riski', NULL, '2024-05-15 01:35:15', 0),
	(13, '::1', 'badriah.sdn28sawang@gmail.com', 4, '2024-05-15 01:36:09', 1),
	(14, '::1', 'badriah.sdn17sawang@gmail.com', 7, '2024-05-15 04:02:16', 1),
	(15, '::1', 'badriah.sdn17sawang@gmail.com', 7, '2024-05-16 04:15:57', 1),
	(16, '::1', 'badriah.sdn17sawang@gmail.com', 7, '2024-05-16 05:07:34', 1),
	(17, '::1', 'badriah.sdn17sawang@gmail.com', 7, '2024-05-17 02:32:34', 1),
	(18, '::1', 'badriah.sdn17sawang@gmail.com', 7, '2024-05-17 07:46:04', 1),
	(19, '::1', 'idasufina.sdn17sawang@gmail.com', 8, '2024-05-17 07:50:16', 1),
	(20, '::1', 'idasufina.sdn17sawang@gmail.com', 8, '2024-05-17 07:55:59', 1),
	(21, '::1', 'idasufina.sdn17sawang@gmail.com', 8, '2024-05-17 07:58:30', 1),
	(22, '::1', 'badriah.sdn17sawang@gmail.com', 1, '2024-05-17 08:03:25', 1),
	(23, '::1', 'badriah.sdn17sawang@gmail.com', 1, '2024-05-17 08:04:31', 1),
	(24, '::1', 'riski', NULL, '2024-05-17 08:06:08', 0),
	(25, '::1', 'riskiaulia518@gmail.com', 9, '2024-05-17 08:06:19', 1),
	(26, '::1', 'badriah.sdn17sawang@gmail.com', 1, '2024-05-17 08:07:02', 1),
	(27, '::1', 'rahmat@gmail.com', 10, '2024-05-17 08:07:55', 1),
	(28, '::1', 'idasufina.sdn17sawang@gmail.com', 8, '2024-05-17 08:08:09', 1),
	(29, '::1', 'rahmat@gmail.com', 10, '2024-05-17 08:08:41', 1),
	(30, '::1', 'fadhil@gmail.com', 11, '2024-05-17 08:10:00', 1),
	(31, '::1', 'fadhil@gmail.com', 11, '2024-05-21 01:19:15', 1),
	(32, '::1', 'idasufina.sdn17sawang@gmail.com', 8, '2024-05-21 01:20:21', 1),
	(33, '::1', 'ida', NULL, '2024-05-30 01:29:03', 0),
	(34, '::1', 'ida', NULL, '2024-05-30 01:30:45', 0),
	(35, '::1', 'idasufina.sdn17sawang@gmail.com', 8, '2024-05-30 01:30:56', 1),
	(36, '::1', 'fadhil@gmail.com', 11, '2024-05-30 01:42:48', 1),
	(37, '::1', 'idasufina.sdn17sawang@gmail.com', 8, '2024-06-03 01:07:56', 1),
	(38, '::1', 'idasufina.sdn17sawang@gmail.com', 8, '2024-06-03 04:32:51', 1),
	(39, '::1', 'idasufina.sdn17sawang@gmail.com', 8, '2024-06-03 07:13:16', 1),
	(40, '::1', 'ida', NULL, '2024-06-05 08:34:50', 0),
	(41, '::1', 'idasufina.sdn17sawang@gmail.com', 8, '2024-06-05 08:34:57', 1),
	(42, '::1', 'rahmat@gmail.com', 10, '2024-06-05 08:36:23', 1),
	(43, '::1', 'idasufina.sdn17sawang@gmail.com', 8, '2024-06-10 01:15:59', 1),
	(44, '::1', 'fadhil', NULL, '2024-06-10 01:28:16', 0),
	(45, '::1', 'rahmat@gmail.com', 10, '2024-06-10 01:28:43', 1),
	(46, '::1', 'idasufina.sdn17sawang@gmail.com', 8, '2024-06-10 02:23:17', 1),
	(47, '::1', 'rahmat@gmail.com', 10, '2024-06-10 03:22:25', 1),
	(48, '::1', 'idasufina@gmail.com', 8, '2024-06-10 04:56:54', 1),
	(49, '::1', 'idasufina@gmail.com', 8, '2024-06-10 08:04:11', 1),
	(50, '::1', 'fadhilakram75@gmail.com', 11, '2024-06-11 02:25:19', 1),
	(51, '::1', 'idasufina@gmail.com', 8, '2024-06-11 02:27:59', 1),
	(52, '::1', 'fadhilakram75@gmail.com', 11, '2024-06-11 07:58:34', 1),
	(53, '::1', 'fadhilakram75@gmail.com', 11, '2024-06-13 03:05:41', 1),
	(54, '::1', 'fadhilakram75@gmail.com', 11, '2024-06-14 01:16:47', 1),
	(55, '::1', 'fadhilakram75@gmail.com', 11, '2024-06-19 07:52:47', 1),
	(56, '::1', 'fadhilakram75@gmail.com', 11, '2024-06-20 01:55:19', 1),
	(57, '::1', 'fadhilakram75@gmail.com', 11, '2024-06-21 01:50:57', 1),
	(58, '::1', 'fadhilakram75@gmail.com', 11, '2024-06-24 04:08:18', 1),
	(59, '::1', 'fadhilakram75@gmail.com', 11, '2024-06-27 01:48:33', 1),
	(60, '::1', 'fadhilakram75@gmail.com', NULL, '2024-06-27 01:50:01', 0),
	(61, '::1', 'fadhilakram75@gmail.com', 11, '2024-06-27 01:50:18', 1),
	(62, '::1', 'fadhilakram75@gmail.com', 11, '2024-06-27 01:53:32', 1),
	(63, '::1', 'rahmat@gmail.com', 10, '2024-06-27 01:54:40', 1),
	(64, '::1', 'fadhilakram75@gmail.com', 11, '2024-06-27 02:21:17', 1),
	(65, '::1', 'idasufina@gmail.com', 8, '2024-06-27 02:22:09', 1),
	(66, '::1', 'fadhilakram75@gmail.com', 11, '2024-06-27 02:23:58', 1),
	(67, '::1', 'riskiaulia518@gmail.com', NULL, '2024-06-27 02:59:07', 0),
	(68, '::1', 'fadhilakram75@gmail.com', 11, '2024-06-27 02:59:49', 1),
	(69, '::1', 'rahmat@gmail.com', 10, '2024-06-27 03:09:54', 1),
	(70, '::1', 'rahmat@gmail.com', 10, '2024-06-27 09:01:40', 1),
	(71, '::1', 'fadhilakram75@gmail.com', 11, '2024-06-28 01:40:27', 1),
	(72, '::1', 'rahmat@gmail.com', 10, '2024-06-28 04:21:49', 1),
	(73, '::1', 'fadhilakram75@gmail.com', 11, '2024-06-28 04:27:02', 1),
	(74, '::1', 'fadhilakram75@gmail.com', 11, '2024-07-01 01:10:17', 1),
	(75, '::1', 'rahmat@gmail.com', 10, '2024-07-01 01:44:56', 1),
	(76, '::1', 'fadhilakram75@gmail.com', 11, '2024-07-01 01:45:59', 1),
	(77, '::1', 'rahmat@gmail.com', 10, '2024-07-01 01:47:19', 1),
	(78, '::1', 'fadhilakram75@gmail.com', 11, '2024-07-01 07:34:38', 1),
	(79, '::1', 'rahmat@gmail.com', 10, '2024-07-01 07:35:25', 1),
	(80, '::1', 'fadhilakram75@gmail.com', 11, '2024-07-02 01:27:23', 1),
	(81, '::1', 'rahmat@gmail.com', 10, '2024-07-02 01:30:24', 1),
	(82, '::1', 'rahmat@gmail.com', 10, '2024-07-02 05:15:35', 1),
	(83, '::1', 'fadhilakram75@gmail.com', 11, '2024-07-02 07:18:50', 1),
	(84, '::1', 'riskiaulia518@gmail.com', NULL, '2024-07-03 01:14:23', 0),
	(85, '::1', 'riskiaulia518@gmail.com', NULL, '2024-07-03 01:14:49', 0),
	(86, '::1', 'rahmat@gmail.com', 10, '2024-07-03 01:17:05', 1),
	(87, '::1', 'fadhilakram75@gmail.com', 11, '2024-07-03 01:25:59', 1),
	(88, '::1', 'riskiaulia@gmail.com', 12, '2024-07-03 01:36:38', 1),
	(89, '::1', 'zaki@gmail.com', 13, '2024-07-03 01:39:15', 1),
	(90, '::1', 'fadhilakram75@gmail.com', 11, '2024-07-03 01:45:51', 1),
	(91, '::1', 'riskiaulia@gmail.com', 12, '2024-07-03 01:59:19', 1),
	(92, '::1', 'rahmat@gmail.com', 10, '2024-07-04 03:05:10', 1),
	(93, '::1', 'idasufina@gmail.com', 8, '2024-07-04 03:05:29', 1),
	(94, '::1', 'projectmanager@gmail.com', 16, '2024-07-04 03:13:25', 1),
	(95, '::1', 'projectmanager@gmail.com', 16, '2024-07-04 03:14:42', 1),
	(96, '::1', 'projectmanager@gmail.com', 16, '2024-07-04 03:15:30', 1),
	(97, '::1', 'projectmanager@gmail.com', 16, '2024-07-04 03:17:38', 1),
	(98, '::1', 'admin@gmail.com', 15, '2024-07-04 03:17:49', 1),
	(99, '::1', 'member@gmail.com', 17, '2024-07-04 03:18:03', 1),
	(100, '::1', 'projectmanager@gmail.com', 16, '2024-07-04 03:18:18', 1),
	(101, '::1', 'rahmat@gmail.com', 10, '2024-07-04 03:19:29', 1),
	(102, '::1', 'projectmanager@gmail.com', 16, '2024-07-04 03:26:16', 1),
	(103, '::1', 'admin', NULL, '2024-07-04 03:29:48', 0),
	(104, '::1', 'admin@gmail.com', 15, '2024-07-04 03:29:56', 1),
	(105, '::1', 'projectmanager@gmail.com', 16, '2024-07-04 03:41:16', 1),
	(106, '::1', 'member@gmail.com', 17, '2024-07-04 03:58:59', 1),
	(107, '::1', 'member@gmail.com', 17, '2024-07-04 04:19:42', 1),
	(108, '::1', 'projectmanager@gmail.com', 16, '2024-07-04 04:32:23', 1),
	(109, '::1', 'projectmanager@gmail.com', 16, '2024-07-04 07:10:25', 1),
	(110, '::1', 'admin@gmail.com', 15, '2024-07-05 03:15:52', 1),
	(111, '::1', 'projectmanager@gmail.com', 16, '2024-07-05 03:56:25', 1),
	(112, '::1', 'rio', NULL, '2024-07-05 04:30:52', 0),
	(113, '::1', 'projectmanager@gmail.com', 16, '2024-07-05 04:36:27', 1),
	(114, '::1', 'rikosimanjuntak@gmail.com', 18, '2024-07-05 04:53:23', 1),
	(115, '::1', 'member@gmail.com', 17, '2024-07-05 08:02:30', 1),
	(116, '::1', 'admin@gmail.com', 15, '2024-07-05 08:02:51', 1),
	(117, '::1', 'member@gmail.com', 17, '2024-07-05 08:05:30', 1),
	(118, '::1', 'projectmanager@gmail.com', 16, '2024-07-05 08:05:46', 1),
	(119, '::1', 'member@gmail.com', 17, '2024-07-05 08:06:02', 1),
	(120, '::1', 'member@gmail.com', 17, '2024-07-05 08:09:21', 1),
	(121, '::1', 'admin@gmail.com', 15, '2024-07-05 08:09:37', 1),
	(122, '::1', 'member@gmail.com', 17, '2024-07-05 08:10:16', 1),
	(123, '::1', 'projectmanager@gmail.com', 16, '2024-07-05 08:10:32', 1),
	(124, '::1', 'member@gmail.com', 17, '2024-07-05 08:10:46', 1),
	(125, '::1', 'projectmanager@gmail.com', 16, '2024-07-05 08:11:21', 1),
	(126, '::1', 'member@gmail.com', 17, '2024-07-05 08:11:36', 1),
	(127, '::1', 'admin@gmail.com', 15, '2024-07-05 08:12:13', 1),
	(128, '::1', 'member@gmail.com', 17, '2024-07-05 08:14:05', 1),
	(129, '::1', 'member', NULL, '2024-07-05 09:01:20', 0),
	(130, '::1', 'member@gmail.com', 17, '2024-07-05 09:01:28', 1),
	(131, '::1', 'rikosimanjuntak@gmail.com', 18, '2024-07-05 09:01:48', 1),
	(132, '::1', 'projectmanager@gmail.com', 16, '2024-07-05 09:43:27', 1),
	(133, '::1', 'member@gmail.com', 17, '2024-07-09 01:09:39', 1),
	(134, '::1', 'riko', NULL, '2024-07-09 01:30:40', 0),
	(135, '::1', 'rikosimanjuntak@gmail.com', 18, '2024-07-09 01:30:55', 1),
	(136, '::1', 'admin@gmail.com', 15, '2024-07-09 01:45:17', 1),
	(137, '::1', 'member@gmail.com', 17, '2024-07-09 01:46:30', 1),
	(138, '::1', 'project manager', NULL, '2024-07-09 01:48:54', 0),
	(139, '::1', 'projectmanager@gmail.com', 16, '2024-07-09 01:49:06', 1),
	(140, '::1', 'member@gmail.com', 17, '2024-07-09 01:59:42', 1),
	(141, '::1', 'admin@gmail.com', 15, '2024-07-09 02:00:41', 1),
	(142, '::1', 'member@gmail.com', 22, '2024-07-09 02:15:39', 1),
	(143, '::1', 'admin@gmail.com', 23, '2024-07-09 08:25:23', 1),
	(144, '::1', 'admin@gmail.com', 23, '2024-07-09 09:07:50', 1),
	(145, '::1', 'member@gmail.com', 22, '2024-07-10 01:47:36', 1),
	(146, '::1', 'projectmanager@gmail.com', 24, '2024-07-10 07:26:18', 1),
	(147, '::1', 'member@gmail.com', 22, '2024-07-10 07:31:28', 1),
	(148, '::1', 'member@gmail.com', 22, '2024-07-11 01:47:48', 1),
	(149, '::1', 'projectmanager@gmail.com', 24, '2024-07-11 03:58:52', 1),
	(150, '::1', 'member@gmail.com', 22, '2024-07-11 08:35:05', 1),
	(151, '::1', 'admin@gmail.com', 23, '2024-07-11 08:55:52', 1),
	(152, '::1', 'yusmawati', NULL, '2024-07-11 08:59:25', 0),
	(153, '::1', 'yusmawati', NULL, '2024-07-11 08:59:46', 0),
	(154, '::1', 'yusmawati', NULL, '2024-07-11 09:00:39', 0),
	(155, '::1', 'yusmawati', NULL, '2024-07-11 09:01:01', 0),
	(156, '::1', 'muhammad@gmail.com', 27, '2024-07-11 09:01:40', 1),
	(157, '::1', 'fadhil@gmail.com', 28, '2024-07-11 09:08:02', 1),
	(158, '::1', 'projectmanager@gmail.com', 24, '2024-07-11 09:09:11', 1),
	(159, '::1', 'fadhil@gmail.com', 28, '2024-07-11 09:09:24', 1),
	(160, '::1', 'projectmanager@gmail.com', 24, '2024-07-11 09:10:58', 1),
	(161, '::1', 'member@gmail.com', 22, '2024-07-11 09:11:24', 1),
	(162, '::1', 'project manajer', NULL, '2024-07-12 07:53:11', 0),
	(163, '::1', 'projectmanager@gmail.com', 24, '2024-07-12 07:53:21', 1),
	(164, '::1', 'member@gmail.com', 22, '2024-07-12 07:55:25', 1),
	(165, '::1', 'projectmanager@gmail.com', 24, '2024-07-14 15:40:43', 1),
	(166, '::1', 'admin@gmail.com', 23, '2024-07-14 16:30:59', 1),
	(167, '::1', 'projectmanager@gmail.com', 24, '2024-07-14 16:32:47', 1),
	(168, '::1', 'projectmanager@gmail.com', 24, '2024-07-16 07:32:55', 1),
	(169, '::1', 'member@gmail.com', 22, '2024-07-16 07:33:19', 1),
	(170, '::1', 'admin@gmail.com', 23, '2024-07-17 01:04:36', 1),
	(171, '::1', 'admin@gmail.com', 23, '2024-07-17 07:20:08', 1),
	(172, '::1', 'projectmanager@gmail.com', 24, '2024-07-17 08:18:26', 1),
	(173, '::1', 'admin@gmail.com', 23, '2024-07-18 07:21:12', 1),
	(174, '::1', 'projectmanager@gmail.com', 24, '2024-07-18 07:21:58', 1),
	(175, '::1', 'member@gmail.com', 22, '2024-07-18 07:28:13', 1),
	(176, '::1', 'admin@gmail.com', 23, '2024-07-18 07:39:05', 1),
	(177, '::1', 'projectmanager@gmail.com', 24, '2024-07-19 01:26:05', 1),
	(178, '::1', 'member@gmail.com', 22, '2024-07-19 01:32:03', 1),
	(179, '::1', 'muhammad@gmail.com', 27, '2024-07-19 01:32:47', 1),
	(180, '::1', 'admin@gmail.com', 23, '2024-07-19 01:35:56', 1),
	(181, '::1', 'admin@gmail.com', 23, '2024-07-19 08:25:35', 1),
	(182, '::1', 'projectmanager@gmail.com', 24, '2024-07-19 09:17:41', 1),
	(183, '::1', 'kepala project', NULL, '2024-07-19 09:25:55', 0),
	(184, '::1', 'kepala', NULL, '2024-07-19 09:27:07', 0),
	(185, '::1', 'kepalaproject@gmail.com', 29, '2024-07-19 09:27:15', 1),
	(186, '::1', 'kepalaproject2@gmail.com', 30, '2024-07-19 09:27:58', 1),
	(187, '::1', 'kepalaproject3@gmail.com', 31, '2024-07-19 09:28:58', 1),
	(188, '::1', 'admin@gmail.com', 23, '2024-07-22 07:46:55', 1),
	(189, '::1', 'projectmanager@gmail.com', 24, '2024-07-22 08:42:21', 1),
	(190, '::1', 'projectmanager@gmail.com', 24, '2024-07-23 07:51:22', 1),
	(191, '::1', 'admin@gmail.com', 23, '2024-07-23 08:42:31', 1),
	(192, '::1', 'projectmanager@gmail.com', 24, '2024-07-24 01:58:51', 1),
	(193, '::1', 'admin@gmail.com', 23, '2024-07-24 03:05:37', 1),
	(194, '::1', 'admin@gmail.com', 23, '2024-07-24 08:06:08', 1),
	(195, '::1', 'member@gmail.com', 22, '2024-07-24 08:07:30', 1),
	(196, '::1', 'project manager', NULL, '2024-07-24 08:33:11', 0),
	(197, '::1', 'projectmanager@gmail.com', 24, '2024-07-24 08:33:19', 1),
	(198, '::1', 'admin@gmail.com', 23, '2024-07-24 09:27:28', 1),
	(199, '::1', 'projectmanager@gmail.com', 24, '2024-07-26 04:12:45', 1),
	(200, '::1', 'admin@gmail.com', 23, '2024-07-26 04:22:32', 1),
	(201, '::1', 'project manager', NULL, '2024-07-26 04:28:10', 0),
	(202, '::1', 'projectmanager@gmail.com', 24, '2024-07-26 04:28:22', 1),
	(203, '::1', 'memberbaru', NULL, '2024-07-26 04:40:08', 0),
	(204, '::1', 'memberbaru@gmail.com', 32, '2024-07-26 04:40:19', 1),
	(205, '::1', 'admin@gmail.com', 23, '2024-07-28 05:55:23', 1),
	(206, '::1', 'member@gmail.com', 22, '2024-07-28 06:36:25', 1),
	(207, '::1', 'projectmanager@gmail.com', 24, '2024-07-28 06:43:32', 1),
	(208, '::1', 'admin@gmail.com', 23, '2024-07-28 15:28:26', 1),
	(209, '::1', 'projectmanager@gmail.com', 24, '2024-07-28 15:39:08', 1),
	(210, '::1', 'member@gmail.com', 22, '2024-07-28 15:48:20', 1),
	(211, '::1', 'projectmanager@gmail.com', 24, '2024-07-30 01:10:50', 1),
	(212, '::1', 'admin', NULL, '2024-07-30 02:31:20', 0),
	(213, '::1', 'admin@gmail.com', 23, '2024-07-30 02:31:26', 1),
	(214, '::1', 'projectmanager@gmail.com', 24, '2024-07-30 02:35:33', 1),
	(215, '::1', 'projectmanager@gmail.com', 24, '2024-07-30 07:17:11', 1),
	(216, '::1', 'admin@gmail.com', 23, '2024-07-30 07:17:35', 1),
	(217, '::1', 'admin@gmail.com', 23, '2024-07-30 08:40:38', 1),
	(218, '::1', 'projectmanager@gmail.com', 24, '2024-07-30 08:43:06', 1),
	(219, '::1', 'kaproject@gmail.com', 37, '2024-07-30 08:47:35', 1),
	(220, '::1', 'kaproject@gmail.com', 37, '2024-07-30 08:48:13', 1),
	(221, '::1', 'admin@gmail.com', 23, '2024-07-30 08:49:13', 1),
	(222, '::1', 'kaproject@gmail.com', 37, '2024-07-30 08:50:15', 1),
	(223, '::1', 'projectmanager@gmail.com', 24, '2024-07-30 08:50:43', 1),
	(224, '::1', 'kaproject@gmail.com', 37, '2024-07-30 08:50:56', 1),
	(225, '::1', 'kaproject@gmail.com', 37, '2024-07-30 08:52:11', 1),
	(226, '::1', 'kaproject@gmail.com', 37, '2024-07-30 08:52:54', 1),
	(227, '::1', 'member@gmail.com', 22, '2024-07-30 09:01:55', 1),
	(228, '::1', 'fadhil@gmail.com', 28, '2024-07-30 09:05:43', 1),
	(229, '::1', 'muhammad@gmail.com', 27, '2024-07-30 09:07:47', 1),
	(230, '::1', 'muhammad@gmail.com', 27, '2024-07-30 09:37:35', 1),
	(231, '::1', 'muhammad@gmail.com', 27, '2024-07-30 09:38:12', 1),
	(232, '::1', 'projectmanager@gmail.com', 24, '2024-07-30 09:39:27', 1);

-- Dumping structure for table project_management.auth_permissions
CREATE TABLE IF NOT EXISTS `auth_permissions` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table project_management.auth_permissions: ~2 rows (approximately)
INSERT INTO `auth_permissions` (`id`, `name`, `description`) VALUES
	(1, 'manage_user', 'mengelola user'),
	(2, 'manage_project', 'mengelola project');

-- Dumping structure for table project_management.auth_groups_permissions
CREATE TABLE IF NOT EXISTS `auth_groups_permissions` (
  `group_id` int unsigned NOT NULL DEFAULT '0',
  `permission_id` int unsigned NOT NULL DEFAULT '0',
  KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  KEY `group_id_permission_id` (`group_id`,`permission_id`),
  CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table project_management.auth_groups_permissions: ~2 rows (approximately)
INSERT INTO `auth_groups_permissions` (`group_id`, `permission_id`) VALUES
	(1, 1),
	(2, 2);

-- Dumping structure for table project_management.auth_reset_attempts
CREATE TABLE IF NOT EXISTS `auth_reset_attempts` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table project_management.auth_reset_attempts: ~0 rows (approximately)

-- Dumping structure for table project_management.auth_tokens
CREATE TABLE IF NOT EXISTS `auth_tokens` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int unsigned NOT NULL,
  `expires` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `auth_tokens_user_id_foreign` (`user_id`),
  KEY `selector` (`selector`),
  CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table project_management.auth_tokens: ~0 rows (approximately)

-- Dumping structure for table project_management.auth_users_permissions
CREATE TABLE IF NOT EXISTS `auth_users_permissions` (
  `user_id` int unsigned NOT NULL DEFAULT '0',
  `permission_id` int unsigned NOT NULL DEFAULT '0',
  KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  KEY `user_id_permission_id` (`user_id`,`permission_id`),
  CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table project_management.auth_users_permissions: ~0 rows (approximately)

-- Dumping structure for table project_management.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int NOT NULL,
  `batch` int unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table project_management.migrations: ~0 rows (approximately)
INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
	(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1714352750, 1);

-- Dumping structure for table project_management.project
CREATE TABLE IF NOT EXISTS `project` (
  `id_project` int NOT NULL AUTO_INCREMENT,
  `id` int unsigned NOT NULL,
  `nama_project` varchar(255) NOT NULL DEFAULT '0',
  `deskripsi_project` longtext NOT NULL,
  `status_project` enum('pending','on progres','done') DEFAULT 'pending',
  `upload_file` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_project`),
  KEY `FK_project_project_manager` (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

-- Dumping data for table project_management.project: ~25 rows (approximately)
INSERT INTO `project` (`id_project`, `id`, `nama_project`, `deskripsi_project`, `status_project`, `upload_file`) VALUES
	(11, 24, 'Rancang Bangun Aplikasi Pendeteksi Khodam', 'Rancang Bangun Aplikasi Pendeteksi Khodam Menggunakan mata batin tersiksa', 'done', NULL),
	(13, 27, 'cxzcxzczx', 'zczxcdcxz xzc dzcxzxcdscszc', 'pending', 'df5ec303-09fd-403e-9f0e-7b134da5e463_1.pdf'),
	(15, 24, 'mcjjs', 'hvdjxvvjxsa', 'pending', 'kep dan guru_1.pdf'),
	(16, 24, 'hvxhfsxsavn', 'xn hcdxhaws', 'pending', 'kep dan guru_2.pdf'),
	(17, 24, ' x sdsxhvsv', 'jbsjdsjcj', 'pending', 'df5ec303-09fd-403e-9f0e-7b134da5e463_3.pdf'),
	(18, 24, 'vcvchhsavx', 'bxcxhsc xsan', 'pending', 'kep dan guru_3.pdf'),
	(19, 24, 'mvhxjvsavjx', ' bmxjvsasjsx', 'pending', ''),
	(20, 24, 'bsx sa n', 'jgsajdv', 'pending', ''),
	(21, 24, 'cjvjckbsvx', ' mxs kvcaakabd', 'pending', 'kep dan guru_4.pdf'),
	(22, 24, ' m cdmk bd', ' vkwvdvxxd', 'pending', ''),
	(23, 24, 'm cjgevxjas', ' cjdjcvjm,', 'pending', ''),
	(24, 24, 'n csvkxm', ' dcyiv cc', 'pending', ''),
	(25, 29, 'bhsiccccg', 'x njvvcisxjvsbc ', 'pending', ''),
	(26, 29, 'jbcjvucjsav', ' xmvzjcjcs', 'pending', ''),
	(27, 29, ' mxvcjvds', ' nxbjcvjkxasax', 'pending', ''),
	(28, 30, ' cmvxckd c', ' xkbsbkdns', 'pending', ''),
	(29, 30, ' nc jb csxdbk d,', ' nxmvkc czdj', 'pending', ''),
	(30, 30, ' nccmhvxjvcj', 'n sjvsdgk v ', 'pending', ''),
	(31, 30, ' chxhcd cmcnxb x', ' mvjsjcbmzc cbksvkbxsbzjkjbdcv c', 'pending', ''),
	(32, 30, 'n chvxjdcvjbdcm', 's c szjdjc dbckdb', 'pending', ''),
	(33, 31, ' nxckbzmx ', 'n,xa khvdcvjms', 'pending', ''),
	(34, 31, 'cx mcd', ' mcjvjv', 'pending', ''),
	(35, 31, 'cn x m c', 'cmdmc ', 'pending', ''),
	(36, 31, 'cx jc', 'bdjb', 'pending', ''),
	(37, 31, 'c mc', ' mdc ', 'pending', ''),
	(38, 31, 'cm xm', ' nxmcc', 'pending', ''),
	(39, 31, 'cx zd', ' x cmdc ', 'pending', ''),
	(40, 37, 'Project Infrstruktur', 'Infrastruktur', 'pending', 'certificate (1).pdf');

-- Dumping structure for table project_management.status
CREATE TABLE IF NOT EXISTS `status` (
  `id_status` int NOT NULL AUTO_INCREMENT,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table project_management.status: ~3 rows (approximately)
INSERT INTO `status` (`id_status`, `status`) VALUES
	(1, 'pending'),
	(2, 'submission'),
	(3, 'rejected'),
	(4, 'approved');

-- Dumping structure for table project_management.modul
CREATE TABLE IF NOT EXISTS `modul` (
  `id_modul` int NOT NULL AUTO_INCREMENT,
  `id_project` int NOT NULL DEFAULT '0',
  `id_status` int NOT NULL DEFAULT '0',
  `id` int unsigned NOT NULL DEFAULT '0',
  `nama_modul` varchar(255) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` datetime DEFAULT NULL,
  `deadline` date NOT NULL,
  `prioritas` varchar(50) NOT NULL,
  `upload` varchar(50) NOT NULL,
  `bobot` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_modul`),
  KEY `FK__project` (`id_project`),
  KEY `id_status` (`id_status`),
  KEY `FK__user` (`id`) USING BTREE,
  CONSTRAINT `FK_modul_project` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_modul_status` FOREIGN KEY (`id_status`) REFERENCES `status` (`id_status`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_modul_users` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

-- Dumping data for table project_management.modul: ~17 rows (approximately)
INSERT INTO `modul` (`id_modul`, `id_project`, `id_status`, `id`, `nama_modul`, `tanggal_mulai`, `tanggal_selesai`, `deadline`, `prioritas`, `upload`, `bobot`) VALUES
	(21, 11, 4, 22, 'biarkan saya tes', '2024-07-13', '2024-07-23 15:04:39', '2024-07-19', 'Low', 'Artikel Cut Tari Auliana 230210059_8.pdf', 10),
	(22, 11, 4, 22, 'yasssss', '2024-07-19', '2024-07-26 15:04:56', '2024-07-26', 'Medium', 'cut paling tarii _1.pdf', 20),
	(26, 11, 4, 22, 'tatata', '2024-07-16', '2024-07-24 02:12:50', '2024-07-17', 'High', 'mean, median, mode.pdf', 20),
	(27, 13, 2, 22, 'bbkbk,b', '2024-07-25', NULL, '2024-07-26', 'Medium', 'kep dan guru.pdf', 30),
	(28, 15, 4, 32, 'mereka', '2024-07-22', '2024-07-24 17:14:40', '2024-07-23', 'Medium', 'kep dan guru_5.pdf', 20),
	(29, 15, 4, 32, 'test mulai', '2024-07-23', '2024-07-25 17:14:42', '2024-07-24', 'High', 'kep dan guru_6.pdf', 30),
	(30, 15, 4, 32, 'taktau tak tau', '2024-07-23', '2024-07-26 17:14:45', '2024-07-30', '', 'df5ec303-09fd-403e-9f0e-7b134da5e463_4.pdf', 10),
	(31, 15, 1, 33, 'ya betul', '2024-07-23', NULL, '2024-07-29', 'Medium', 'kep dan guru_7.pdf', 20),
	(32, 11, 4, 32, 'biarkan saya tes', '2024-07-13', '2024-07-25 09:30:00', '2024-07-16', 'Low', 'Artikel Cut Tari Auliana 230210059_8.pdf', 10),
	(33, 11, 4, 22, 'yasssss', '2024-07-19', '2024-07-27 09:30:06', '2024-07-28', 'Medium', 'cut paling tarii_1.pdf', 20),
	(34, 11, 4, 22, 'tatata', '2024-07-16', '2024-07-28 09:30:11', '2024-07-14', 'High', 'mean, median, mode.pdf', 20),
	(35, 13, 2, 22, 'bbkbk,b', '2024-07-25', NULL, '2024-07-26', 'Medium', 'kep dan guru.pdf', 30),
	(36, 15, 4, 32, 'mereka', '2024-07-22', '2024-07-26 04:43:37', '2024-07-23', 'Medium', 'kep dan guru 5.pdf', 20),
	(39, 15, 1, 34, 'ya betul', '2024-07-23', NULL, '2024-07-29', 'Medium', 'kep dan guru 7.pdf', 20),
	(40, 16, 1, 24, 'mdvsj', '2024-07-30', NULL, '2024-07-31', 'Medium', '1-[Template] Laporan_Magang_TIK-PNL-OK (Repaired).', 10),
	(41, 40, 4, 28, 'fiber optik', '2024-07-30', '2024-07-30 09:36:38', '2024-08-01', 'Medium', 'certificate (1)_1.pdf', 20),
	(42, 40, 4, 27, 'Data Center ', '2024-09-07', '2024-07-30 09:41:04', '2025-07-30', 'Medium', 'certificate-6.pdf', 40),
	(43, 40, 4, 24, 'perancangan infrastruktur pim', '2024-07-30', '2024-07-30 09:44:24', '2024-08-20', 'Medium', 'sisa.pdf', 40);

-- Dumping structure for table project_management.progres
CREATE TABLE IF NOT EXISTS `progres` (
  `id_progres` int NOT NULL AUTO_INCREMENT,
  `id_modul` int NOT NULL,
  `tanggal_pengajuan` datetime DEFAULT NULL,
  `tanggal_peninjauan` datetime DEFAULT NULL,
  `bukti` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `id_status` int DEFAULT NULL,
  `catatan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_progres`),
  KEY `FK__modul` (`id_modul`),
  KEY `FK_progres_status` (`id_status`),
  CONSTRAINT `FK_progres_status` FOREIGN KEY (`id_status`) REFERENCES `status` (`id_status`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

-- Dumping data for table project_management.progres: ~11 rows (approximately)
INSERT INTO `progres` (`id_progres`, `id_modul`, `tanggal_pengajuan`, `tanggal_peninjauan`, `bukti`, `id_status`, `catatan`) VALUES
	(11, 21, '2024-07-12 08:21:17', NULL, 'WhatsApp Image 2024-07-10 at 19.33.28_1.jpeg', 4, 'masak iya'),
	(12, 22, '2024-07-12 08:21:39', NULL, 'images_5.png', 4, 'yang bener'),
	(13, 23, '2024-07-12 08:50:02', NULL, 'WhatsApp Image 2024-07-10 at 19.33.28_2.jpeg', 4, 'masak iya'),
	(14, 23, '2024-07-12 09:12:32', NULL, 'WhatsApp Image 2024-07-10 at 19.33.28_3.jpeg', 4, 'nnnmmnnmn'),
	(15, 26, '2024-07-16 07:51:13', NULL, 'WhatsApp Image 2024-07-16 at 08.18.22.jpeg', 4, 'hqDIGUAFSU'),
	(16, 27, '2024-07-19 01:32:13', NULL, 'kep dan guru.pdf', 2, 'dddddddd'),
	(17, 32, '2024-07-21 09:30:47', NULL, NULL, 4, NULL),
	(18, 33, '2024-07-22 09:31:17', NULL, NULL, 4, NULL),
	(19, 34, '2024-07-24 09:31:40', NULL, NULL, 4, NULL),
	(20, 36, '2024-07-26 04:40:57', NULL, 'certificate-6.pdf', 4, 'udh siap'),
	(21, 36, '2024-07-26 04:43:12', NULL, 'certificate-11.pdf', 4, ''),
	(22, 41, '2024-07-30 09:05:55', NULL, 'absen.pdf', 4, ''),
	(23, 42, '2024-07-30 09:07:57', NULL, '', 4, ''),
	(24, 42, '2024-07-30 09:38:20', NULL, '', 4, 'Tugas sudah selesai'),
	(25, 43, '2024-07-30 09:39:34', NULL, '', 4, 'kelar'),
	(26, 43, '2024-07-30 09:42:24', NULL, '', 4, '');

CREATE TABLE IF NOT EXISTS `auth_groups_users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `group_id` int unsigned NOT NULL DEFAULT '0',
  `user_id` int unsigned NOT NULL DEFAULT '0',
  `username` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `auth_groups_users_user_id_foreign` (`user_id`),
  KEY `group_id_user_id` (`group_id`,`user_id`),
  KEY `FK_auth_groups_users_users` (`username`),
  CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_auth_groups_users_users` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table project_management.auth_groups_users: ~12 rows (approximately)
INSERT INTO `auth_groups_users` (`id`, `group_id`, `user_id`, `username`) VALUES
	(12, 3, 22, NULL),
	(13, 3, 22, 'member'),
	(14, 1, 23, NULL),
	(15, 2, 24, NULL),
	(16, 2, 27, NULL),
	(17, 2, 27, 'muhammad'),
	(18, 2, 28, NULL),
	(19, 2, 28, 'fadhil'),
	(23, 3, 32, NULL),
	(24, 3, 33, NULL),
	(25, 3, 34, NULL),
	(27, 3, 36, NULL),
	(28, 2, 37, NULL),
	(29, 3, 37, 'ketua');

-- Dumping structure for table project_management.requests
CREATE TABLE IF NOT EXISTS `requests` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `status` enum('pending','approved','rejected') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `role_id` int unsigned DEFAULT '3',
  `user_id` int unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`),
  KEY `role_id` (`role_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `FK_requests_auth_groups_users` FOREIGN KEY (`role_id`) REFERENCES `auth_groups_users` (`group_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_requests_auth_groups_users_2` FOREIGN KEY (`user_id`) REFERENCES `auth_groups_users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_requests_auth_groups_users_3` FOREIGN KEY (`username`) REFERENCES `auth_groups_users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table project_management.requests: ~1 rows (approximately)
INSERT INTO `requests` (`id`, `username`, `status`, `created_at`, `updated_at`, `role_id`, `user_id`) VALUES
	(4, 'member', 'pending', '2024-07-08 19:16:03', '2024-07-08 19:16:03', 1, 22),
	(8, 'ketua', 'pending', '2024-07-30 01:47:40', '2024-07-30 01:47:40', 2, 37);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
