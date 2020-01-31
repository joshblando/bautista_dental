-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.26 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for bautista_dental_db
CREATE DATABASE IF NOT EXISTS `bautista_dental_db` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `bautista_dental_db`;

-- Dumping structure for table bautista_dental_db.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adminId` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `employeeId` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table bautista_dental_db.admin: ~0 rows (approximately)
DELETE FROM `admin`;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`id`, `adminId`, `firstName`, `lastName`, `employeeId`, `password`, `photo`, `createdAt`) VALUES
	(1, 'LT3NBH0D', 'Bautista', 'Dental', 'admin', '$2y$10$/vwEbm/dyR3zEq/Vg7MlfOb6B0bUX1WQdkhh2zmuuowSXTJu2OXeO', NULL, '2020-01-30 12:47:17');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- Dumping structure for table bautista_dental_db.appointment
CREATE TABLE IF NOT EXISTS `appointment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `appointmentId` varchar(255) NOT NULL,
  `userId` varchar(255) NOT NULL,
  `serviceId` varchar(255) NOT NULL,
  `employeeId` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `start` varchar(255) NOT NULL,
  `end` varchar(255) NOT NULL,
  `duration` int(11) NOT NULL,
  `time` varchar(255) NOT NULL,
  `message` text,
  `status` varchar(255) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Dumping data for table bautista_dental_db.appointment: ~4 rows (approximately)
DELETE FROM `appointment`;
/*!40000 ALTER TABLE `appointment` DISABLE KEYS */;
INSERT INTO `appointment` (`id`, `appointmentId`, `userId`, `serviceId`, `employeeId`, `date`, `start`, `end`, `duration`, `time`, `message`, `status`, `createdAt`) VALUES
	(6, '851NUHlz', 'HYLJlA27', 'IU3fPNvB ', 'Ma2hzx7I', '2020-01-30', '12:00 PM', '01:00 pm', 1, '12:00 PM,12:30 PM,01:00 PM', '', 'APPROVED', '2020-01-30 19:01:04'),
	(7, '0W2eSwqa', 'HYLJlA27', 'IU3fPNvB ', 'Ma2hzx7I', '2020-01-30', '1:30 PM', '02:30 pm', 1, '01:30 PM,02:00 PM,02:30 PM', '', 'PENDING', '2020-01-29 17:30:28'),
	(8, 'tX5TsmNW', 'HYLJlA27', 'IU3fPNvB ', 'Ma2hzx7I', '2020-01-31', '1:30 PM', '02:30 pm', 1, '01:30 PM,02:00 PM,02:30 PM', '', 'PENDING', '2020-01-29 18:06:36'),
	(9, 'DKSow58C', 'HYLJlA27', 'IU3fPNvB ', 'Ma2hzx7I', '2020-01-31', '11:00 AM', '12:00 pm', 1, '11:00 AM,11:30 AM,12:00 PM', '', 'APPROVED', '2020-01-30 19:00:53'),
	(10, 'O903Wuzh', 'HYLJlA27', 'F7setd5L ', 'Ma2hzx81', '2020-02-20', '10:00 AM', '12:00 pm', 2, '10:00 AM,10:30 AM,11:00 AM,11:30 AM,12:00 PM', '', 'PENDING', '2020-01-30 16:22:52'),
	(11, 'dn47afus', 'HYLJlA27', 'ynxUG1uI ', 'Ma2hzx81', '2020-02-29', '4:00 PM', '05:00 pm', 1, '04:00 PM,04:30 PM,05:00 PM', '', 'PENDING', '2020-01-30 16:23:04'),
	(12, '24n6hAOL', 'HYLJlA27', 'F7setd5L ', 'Ma2hzx81', '2020-03-18', '8:00 AM', '10:00 am', 2, '08:00 AM,08:30 AM,09:00 AM,09:30 AM,10:00 AM', '', 'PENDING', '2020-01-30 16:23:17');
/*!40000 ALTER TABLE `appointment` ENABLE KEYS */;

-- Dumping structure for table bautista_dental_db.category
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoryId` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `photo` varchar(255) DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table bautista_dental_db.category: ~0 rows (approximately)
DELETE FROM `category`;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`id`, `categoryId`, `name`, `description`, `photo`, `createdAt`) VALUES
	(1, 'TyPYE87p', 'Check-up', 'TEST', NULL, '2020-01-13 16:33:36');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;

-- Dumping structure for table bautista_dental_db.employee
CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employeeId` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table bautista_dental_db.employee: ~2 rows (approximately)
DELETE FROM `employee`;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` (`id`, `employeeId`, `title`, `firstName`, `lastName`, `contact`, `email`, `photo`, `role`, `createdAt`) VALUES
	(1, 'Ma2hzx7I', 'Dr.', 'Bautista', 'Bautista', '09876543212', 'bautista@test.com', NULL, 'DOCTOR', '2020-01-12 22:41:02'),
	(2, 'Ma2hzx81', 'Dr.', 'Ok', 'OK', '0987654321', 'ok@test.com', NULL, 'DENTIST', '2020-01-20 01:50:25');
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;

-- Dumping structure for table bautista_dental_db.message
CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `messageId` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bautista_dental_db.message: ~0 rows (approximately)
DELETE FROM `message`;
/*!40000 ALTER TABLE `message` DISABLE KEYS */;
/*!40000 ALTER TABLE `message` ENABLE KEYS */;

-- Dumping structure for table bautista_dental_db.schedule
CREATE TABLE IF NOT EXISTS `schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `scheduleId` varchar(255) NOT NULL,
  `employeeId` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` text NOT NULL,
  `break` varchar(255) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table bautista_dental_db.schedule: ~1 rows (approximately)
DELETE FROM `schedule`;
/*!40000 ALTER TABLE `schedule` DISABLE KEYS */;
INSERT INTO `schedule` (`id`, `scheduleId`, `employeeId`, `date`, `time`, `break`, `createdAt`) VALUES
	(3, 'Kns6jpVT', 'Ma2hzx7I', '2020-01-30', '11:00 AM,11:30 AM,1:30 PM,12:00 PM', '12:30 PM,01:00 PM,01:30 PM,02:00 PM', '2020-01-29 17:18:07');
/*!40000 ALTER TABLE `schedule` ENABLE KEYS */;

-- Dumping structure for table bautista_dental_db.service
CREATE TABLE IF NOT EXISTS `service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `serviceId` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `photo` varchar(255) DEFAULT NULL,
  `categoryId` varchar(255) NOT NULL,
  `duration` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table bautista_dental_db.service: ~3 rows (approximately)
DELETE FROM `service`;
/*!40000 ALTER TABLE `service` DISABLE KEYS */;
INSERT INTO `service` (`id`, `serviceId`, `name`, `description`, `photo`, `categoryId`, `duration`) VALUES
	(1, 'ynxUG1uI', 'TEST', 'TEST', NULL, 'TyPYE87p', 1),
	(2, 'IU3fPNvB', 'dasdsada', 'dadasdasd', NULL, 'TyPYE87p', 1),
	(3, 'F7setd5L', 'dasdasddasdsad', 'dasdasdas', NULL, 'TyPYE87p', 2);
/*!40000 ALTER TABLE `service` ENABLE KEYS */;

-- Dumping structure for table bautista_dental_db.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table bautista_dental_db.user: ~2 rows (approximately)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `userId`, `firstName`, `lastName`, `contact`, `email`, `password`, `photo`, `createdAt`) VALUES
	(1, 'uw4dCUjX', 'Test', 'Test', '09876543211', 'test@test.com', '$2y$10$epn33a74dP4l6M4gsXXDl.tuf2MKebBRo1EjW9QoL5lZwv.E6vWW2', NULL, '2020-01-13 17:53:43'),
	(2, 'ZDK1kq94', 'test2', 'test2', '1234567890', 'test2@test2.com', '$2y$10$RHmVj63bFUynu.mXZpkDO.Z.EsAvtmd8D2NVqxIkh9NGJMv0vU1H2', NULL, '2020-01-22 19:28:35'),
	(3, 'HYLJlA27', 'Demo', ' User', '09095929288', 'dem0@gmail.com', '$2y$10$/vwEbm/dyR3zEq/Vg7MlfOb6B0bUX1WQdkhh2zmuuowSXTJu2OXeO', NULL, '2020-01-27 19:51:27');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
