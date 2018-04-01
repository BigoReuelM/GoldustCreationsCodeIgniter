-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 01, 2018 at 03:55 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `goldust`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `eventID` int(7) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `eventName` varchar(45) DEFAULT NULL,
  `clientID` int(7) UNSIGNED ZEROFILL NOT NULL,
  `celebrantName` varchar(30) DEFAULT NULL,
  `eventDate` date DEFAULT NULL,
  `eventLocation` varchar(40) DEFAULT NULL,
  `eventType` varchar(15) DEFAULT NULL,
  `eventTime` time DEFAULT NULL,
  `motif` varchar(15) DEFAULT NULL,
  `employeeID` int(4) UNSIGNED ZEROFILL DEFAULT NULL,
  `totalAmount` int(11) DEFAULT NULL,
  `eventStatus` enum('on-going','finished','cancelled','new') DEFAULT 'new',
  `packageType` enum('full-package','semi-package') DEFAULT NULL,
  `dateAssisted` date DEFAULT NULL,
  `refundedAmount` decimal(10,2) DEFAULT NULL,
  `refundedDate` date DEFAULT NULL,
  `cancelledDate` date DEFAULT NULL,
  `resumeDate` date DEFAULT NULL,
  `finishedDate` date DEFAULT NULL,
  PRIMARY KEY (`eventID`),
  KEY `clientID` (`clientID`),
  KEY `employeeID` (`employeeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `fk_ev_clientID` FOREIGN KEY (`clientID`) REFERENCES `clients` (`clientID`),
  ADD CONSTRAINT `fk_ev_employeeID` FOREIGN KEY (`employeeID`) REFERENCES `employees` (`employeeID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
