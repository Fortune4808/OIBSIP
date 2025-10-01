-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.11.0.7065
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table oibsip_task4_db.pending_user_tab
CREATE TABLE IF NOT EXISTS `pending_user_tab` (
  `titleId` bigint unsigned NOT NULL DEFAULT '0',
  `firstName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `middleName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `lastName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `emailAddress` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `phoneNumber` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `homeAddress` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_german2_ci NOT NULL DEFAULT '',
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `otp` int NOT NULL DEFAULT '0',
  `expiryAt` timestamp NULL DEFAULT NULL,
  `createdTime` datetime DEFAULT NULL,
  `updatedTime` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `emailAddress` (`emailAddress`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table oibsip_task4_db.pending_user_tab: ~0 rows (approximately)

-- Dumping structure for table oibsip_task4_db.setup_master_count_tab
CREATE TABLE IF NOT EXISTS `setup_master_count_tab` (
  `countId` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `countValue` bigint unsigned DEFAULT NULL,
  `countDescription` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `createdTime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table oibsip_task4_db.setup_master_count_tab: ~0 rows (approximately)
INSERT INTO `setup_master_count_tab` (`countId`, `countValue`, `countDescription`, `createdTime`) VALUES
	('REG', 6, 'COUNT NUMBER OF REGISTRATION', '2025-09-23 18:11:08');

-- Dumping structure for table oibsip_task4_db.setup_status_tab
CREATE TABLE IF NOT EXISTS `setup_status_tab` (
  `statusId` bigint unsigned NOT NULL,
  `statusName` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `createdTime` datetime DEFAULT NULL,
  KEY `Index 1` (`statusId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table oibsip_task4_db.setup_status_tab: ~2 rows (approximately)
INSERT INTO `setup_status_tab` (`statusId`, `statusName`, `createdTime`) VALUES
	(1, 'ACTIVE', '2025-09-23 18:23:17'),
	(2, 'INACTIVE', '2025-09-23 18:23:28');

-- Dumping structure for table oibsip_task4_db.setup_title_tab
CREATE TABLE IF NOT EXISTS `setup_title_tab` (
  `titleId` bigint unsigned NOT NULL,
  `titleName` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `createdTime` datetime DEFAULT NULL,
  KEY `Index 1` (`titleId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table oibsip_task4_db.setup_title_tab: ~4 rows (approximately)
INSERT INTO `setup_title_tab` (`titleId`, `titleName`, `createdTime`) VALUES
	(1, 'MR', '2025-09-23 18:21:37'),
	(2, 'MRS', '2025-09-23 18:21:50'),
	(3, 'MISS', '2025-09-23 18:21:59'),
	(4, 'DR', '2025-09-23 18:22:21');

-- Dumping structure for table oibsip_task4_db.user_tab
CREATE TABLE IF NOT EXISTS `user_tab` (
  `userId` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `accessKey` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `titleId` bigint unsigned NOT NULL DEFAULT '0',
  `statusId` bigint unsigned NOT NULL DEFAULT '0',
  `firstName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `middleName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `lastName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `emailAddress` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `phoneNumber` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `homeAddress` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `passport` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `otp` int NOT NULL DEFAULT (0),
  `expiryAt` timestamp NULL DEFAULT NULL,
  `lastLogin` datetime DEFAULT NULL,
  `createdTime` datetime DEFAULT NULL,
  `updatedTime` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `emailAddress` (`emailAddress`),
  KEY `Index 1` (`userId`),
  KEY `FK_user_tab_title_tab` (`titleId`),
  KEY `FK_user_tab_setup_status_tab` (`statusId`),
  CONSTRAINT `FK_user_tab_setup_status_tab` FOREIGN KEY (`statusId`) REFERENCES `setup_status_tab` (`statusId`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_user_tab_title_tab` FOREIGN KEY (`titleId`) REFERENCES `setup_title_tab` (`titleId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table oibsip_task4_db.user_tab: ~3 rows (approximately)
INSERT INTO `user_tab` (`userId`, `accessKey`, `titleId`, `statusId`, `firstName`, `middleName`, `lastName`, `emailAddress`, `phoneNumber`, `homeAddress`, `passport`, `password`, `otp`, `expiryAt`, `lastLogin`, `createdTime`, `updatedTime`) VALUES
	('REG20251001063025006', NULL, 1, 1, 'DONALD', 'SMITH', 'JAMES', 'donald@gmail.com', '4565456765', 'LAGOS STATE', 'default.jpg', '$2y$12$ji4Z/jDxjat1jVYRMqHQU.yF/gNXkQ24aAwFnz7dli4.n7qvadsoq', 0, NULL, NULL, '2025-10-01 19:30:25', NULL),
	('REG20250923055605002', '$2y$12$w7T0fvA2vWyz6HkaMEZvJuJcfFqTWaquQL.X7tJte4SF0eQwl8Tm2', 1, 1, 'OGUNLEYE', 'OPEYEMI', 'FORTUNE', 'fortune@gmail.com', '09056251889', 'ODE REMO', 'default.jpg', '$2y$12$xAGQsnTKh17TedufNyS9ZONRJsbvAZpY7OOQrmlLlj5017daQk6b.', 311391, '2025-09-26 20:19:52', '2025-10-01 19:39:45', '2025-09-23 18:56:05', NULL),
	('REG20250923053143001', '$2y$12$apyD4hUT39Wy8EKvtg5odepUzwQQXwT7fpEjwGBhxOa6naYswaCJ2', 1, 1, 'OGUNLEYE', 'OPEYEMI', 'FORTUNE', 'fortunetechglobal001@gmail.com', '09056251889', 'ODE REMO', 'fortune-pix.jpeg', '$2y$12$YwP5YCfhSwn4qyKsTaSSUOmZursnkglW/WKzKULhTddhA681ZS3tm', 967131, '2025-09-26 20:14:40', '2025-10-01 16:40:57', '2025-09-23 18:31:43', NULL),
	('REG20250926013758003', '$2y$12$C8scnTvFBiWrSDUtFRRV0uiQ5cZUXG4YR69mmDz3OzSeN5EedP5sW', 2, 2, 'NOAH', 'RACHEAL', 'PRECIOUS', 'noah@gmail.com', '5645764563', 'BENUE STATE', 'default.jpg', '$2y$12$8ZfPYgHlBLD995QVLThYg.9KxkA2nriBfvKpEYpXrnQXgINxCgp2e', 0, NULL, '2025-09-28 20:21:55', '2025-09-26 14:37:58', NULL),
	('REG20251001061447004', NULL, 4, 1, 'SAMUEL', 'TESTING', 'SMITH', 'testing@gmail.com', '6545654345', 'ODE REMO', 'default.jpg', '$2y$12$DFADC/1A0D4tRt2HvZaW8eL38NvzQEwJ0k0zk.3l4Toi8Z3g6ehIa', 0, NULL, NULL, '2025-10-01 19:14:47', NULL),
	('REG20251001061838005', NULL, 3, 1, 'TITILOLA', 'OREOLUA', 'JAMES', 'titi@gmail.com', '5676567654', 'OGUN STATE', 'default.jpg', '$2y$12$oklBW48.vNyuY2Yb/By0yOlJCtt6SiJ13B12sg2aROjVW4tbPytNu', 0, NULL, NULL, '2025-10-01 19:18:38', NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
