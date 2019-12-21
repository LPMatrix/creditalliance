-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 18, 2018 at 12:54 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `creditalliance`
--
CREATE DATABASE IF NOT EXISTS `creditalliance` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `creditalliance`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`) VALUES
(1, 'Yayah Mohammed', 'CreditAlliance', 'error404');

-- --------------------------------------------------------

--
-- Table structure for table `beneficiary`
--

CREATE TABLE IF NOT EXISTS `beneficiary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ownerID` varchar(40) NOT NULL,
  `accountno` varchar(40) NOT NULL,
  `name` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `beneficiary`
--

INSERT INTO `beneficiary` (`id`, `ownerID`, `accountno`, `name`) VALUES
(1, '1537210310266', '1537214085023', 'Esinniobiwa Quareeb'),
(2, '1537219568347', '565656565', '');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `accountno` varchar(15) NOT NULL,
  `balance` varchar(1000) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phoneno` varchar(20) NOT NULL,
  `addrerss` varchar(100) NOT NULL,
  `kinname` varchar(40) NOT NULL,
  `kinemail` varchar(50) NOT NULL,
  `kinphoneno` varchar(20) NOT NULL,
  `password` varchar(200) NOT NULL,
  `status` varchar(40) NOT NULL,
  `lastlogin` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `accountno`, `balance`, `name`, `email`, `phoneno`, `addrerss`, `kinname`, `kinemail`, `kinphoneno`, `password`, `status`, `lastlogin`) VALUES
(1, '1537210310266', '390', 'Abiola Mohammed', 'yayahmohammed@gmail.com', '8162875010', 'Badagry', 'Abiola', 'yayahmohammed@gmail.com', '8162875010', 'd8d070c1a0a0be541fc80fb6b7ab0856', 'Transaction Successful', '2018-09-18 12:49:20am'),
(2, '1537214085023', '550', 'Esinniobiwa Quareeb', 'graceadeola1@gmail.com', '08162609437', 'No, 61, Alimi Road, Ode Alausa Ilorin, Room 27, Room 27, Room 27, Room 27, Room 27, Room 27, Room 27', 'Esinniobiwa Quareeb', 'abiola@gmail.com', '+2348162609437', '3fd777d7d7f349da6cc06252a9dc6b43', 'Transaction Successful', ''),
(3, '1537219568347', '130000', 'Betsy Cooker', 'jgrey797@gmail.com', '5088560866', '                  Hgdbjklvb', 'Frank Turner ', 'hannahjay58c@gmail ', '99099000', '2cdbb15f0c136451fceac02dad481a2a', 'Ask for Code', '');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transID` varchar(40) NOT NULL,
  `fromAcc` varchar(40) NOT NULL,
  `toAcc` varchar(40) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `transCode` varchar(30) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `status` int(1) NOT NULL,
  `date` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `transID`, `fromAcc`, `toAcc`, `amount`, `transCode`, `comment`, `status`, `date`) VALUES
(1, '145154', '1537210310266', '1537210310266', '3000', '', 'Opening Balance', 0, '2018-09-17 02:51:54pm'),
(2, '155521', '1537214085023', '1537214085023', '300', '', 'Opening Balance', 0, '2018-09-17 03:55:21pm'),
(5, '161631', '1537210310266', 'Esinniobiwa Quareeb ( 1537214085023 )', '5000', '', 'Transfer', 1, '2018-09-17 04:16:31pm'),
(6, '172446', '1537219568347', '1537219568347', '130000', '', 'Opening Balance', 0, '2018-09-17 05:24:46pm'),
(8, '023245', '1537210310266', '1537214085023', '50', '35559', 'Transfer', 1, '2018-09-18 02:32:45am'),
(9, '023347', '1537210310266', '1537214085023', '10', '35811', 'Transfer', 0, '2018-09-18 02:33:47am'),
(10, '023605', '1537210310266', '1537214085023', '50', '', 'Transfer', 0, '2018-09-18 02:36:05am'),
(11, '023809', '1537210310266', '1537214085023', '20', '35823', 'Transfer', 0, '2018-09-18 02:38:09am'),
(12, '024724', '1537210310266', '', '100', '', 'Transfer', 0, '2018-09-18 02:47:24am'),
(13, '024746', '1537210310266', '1537214085023', '100', '', 'Transfer', 0, '2018-09-18 02:47:46am'),
(14, '024823', '1537210310266', '1537214085023', '200', '', 'Transfer', 0, '2018-09-18 02:48:23am'),
(15, '025319', '1537210310266', '', '100', '', 'Transfer', 0, '2018-09-18 02:53:19am'),
(16, '025341', '1537210310266', '', '10', '', 'Transfer', 0, '2018-09-18 02:53:41am'),
(17, '025456', '1537210310266', '', '50', '', 'Transfer', 0, '2018-09-18 02:54:56am'),
(18, '025551', '1537210310266', '1537214085023', '50', '', 'Transfer', 0, '2018-09-18 02:55:51am');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
