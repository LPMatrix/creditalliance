-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for creditalliance
CREATE DATABASE IF NOT EXISTS `creditalliance` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `creditalliance`;

-- Dumping structure for table creditalliance.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table creditalliance.admin: ~0 rows (approximately)
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`id`, `name`, `username`, `password`) VALUES
	(1, 'Yayah Mohammed', 'CreditAlliance', 'error404');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- Dumping structure for table creditalliance.beneficiary
CREATE TABLE IF NOT EXISTS `beneficiary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ownerID` varchar(40) NOT NULL,
  `accountno` varchar(40) NOT NULL,
  `name` text NOT NULL,
  `bank` text NOT NULL,
  `address` text NOT NULL,
  `country` text NOT NULL,
  `iban` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table creditalliance.beneficiary: ~0 rows (approximately)
/*!40000 ALTER TABLE `beneficiary` DISABLE KEYS */;
/*!40000 ALTER TABLE `beneficiary` ENABLE KEYS */;

-- Dumping structure for table creditalliance.customers
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `accountno` varchar(15) NOT NULL,
  `balance` varchar(1000) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phoneno` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `kinname` varchar(40) NOT NULL,
  `kinemail` varchar(50) NOT NULL,
  `kinphoneno` varchar(20) NOT NULL,
  `password` varchar(200) NOT NULL,
  `status` varchar(40) NOT NULL,
  `lastlogin` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table creditalliance.customers: ~4 rows (approximately)
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` (`id`, `accountno`, `balance`, `name`, `email`, `phoneno`, `address`, `kinname`, `kinemail`, `kinphoneno`, `password`, `status`, `lastlogin`) VALUES
	(2, '1537214085023', '550', 'Esinniobiwa Quareeb', 'graceadeola1@gmail.com', '08162609437', 'No, 61, Alimi Road, Ode Alausa Ilorin, Room 27, Room 27, Room 27, Room 27, Room 27, Room 27, Room 27', 'Esinniobiwa Quareeb', 'abiola@gmail.com', '+2348162609437', '3fd777d7d7f349da6cc06252a9dc6b43', 'Ask for Code', '2018-09-18 12:49:20am'),
	(3, '1537219568347', '1200', 'Betsy Cooker', 'jgrey797@gmail.com', '5088560866', '                  Hgdbjklvb', 'Frank Turner ', 'hannahjay58c@gmail ', '99099000', '2cdbb15f0c136451fceac02dad481a2a', 'Ask for Code', '2018-09-18 12:49:20am'),
	(5, '1575563362137', '950', 'Sanusi Mubaraq', 'mubaraqsanusi908@gmail.com', '08185824523', '4, Challawa Crescent, Barnawa', 'Sanusi Farouq', 'mubaraqsanusi908@gmail.com', '+2348185824523', '1a1dc91c907325c69271ddf0c944bc72', 'Transaction Successful', '2020-01-03 11:31:57 am'),
	(6, '1576267440911', '700', 'Sanusi Matrix', 'mintermntr@gmail.com', '08185824523', '4, Challawa Crescent, Barnawa', 'Sanusi Mubaraq', 'mubaraqsanusi908@gmail.com', '+2348185824523', '1a1dc91c907325c69271ddf0c944bc72', 'Transaction Successful', '2019-12-15 08:42:25am');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;

-- Dumping structure for table creditalliance.transactions
CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transID` varchar(40) NOT NULL,
  `fromAcc` varchar(40) NOT NULL,
  `toAcc` varchar(40) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `transCode` varchar(30) NOT NULL,
  `type` varchar(500) NOT NULL,
  `status` int(1) NOT NULL,
  `date` varchar(100) NOT NULL,
  `iban` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table creditalliance.transactions: ~0 rows (approximately)
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
INSERT INTO `transactions` (`id`, `transID`, `fromAcc`, `toAcc`, `amount`, `transCode`, `type`, `status`, `date`, `iban`, `country`) VALUES
	(1, '210733', '1575563362137', ' 987654321 ', '50', '', 'Local', 0, '2019-12-31', '', '');
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
