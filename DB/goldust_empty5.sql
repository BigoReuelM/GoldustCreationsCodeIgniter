-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 20, 2018 at 05:40 PM
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
-- Table structure for table `appointments`
--

DROP TABLE IF EXISTS `appointments`;
CREATE TABLE IF NOT EXISTS `appointments` (
  `appointmentID` int(7) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `eventID` int(7) UNSIGNED ZEROFILL DEFAULT NULL,
  `transactionID` int(7) UNSIGNED ZEROFILL DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time NOT NULL,
  `agenda` varchar(45) NOT NULL,
  `employeeID` int(4) UNSIGNED ZEROFILL NOT NULL,
  `status` enum('finished','cancelled','ongoing','') NOT NULL,
  PRIMARY KEY (`appointmentID`),
  UNIQUE KEY `appointmentID_UNIQUE` (`appointmentID`),
  KEY `eventID` (`eventID`),
  KEY `employeeID` (`employeeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `clientID` int(7) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `firstName` varchar(25) NOT NULL,
  `middleName` varchar(25) NOT NULL,
  `lastName` varchar(25) NOT NULL,
  `registrationDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `contactNumber` varchar(11) NOT NULL,
  PRIMARY KEY (`clientID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `decors`
--

DROP TABLE IF EXISTS `decors`;
CREATE TABLE IF NOT EXISTS `decors` (
  `decorsID` int(7) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `decorName` varchar(20) NOT NULL,
  `color` varchar(10) NOT NULL,
  `decorType` enum('utensils','furnishing','trinkets','drapes and curtains') DEFAULT NULL,
  `themeID` int(7) UNSIGNED ZEROFILL DEFAULT NULL,
  PRIMARY KEY (`decorsID`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `designs`
--

DROP TABLE IF EXISTS `designs`;
CREATE TABLE IF NOT EXISTS `designs` (
  `designID` int(7) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `designName` varchar(35) NOT NULL,
  `color` varchar(20) NOT NULL,
  `designType` enum('suit','gown','costume','accesory') NOT NULL,
  `themeID` int(7) UNSIGNED ZEROFILL DEFAULT NULL,
  PRIMARY KEY (`designID`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE IF NOT EXISTS `employees` (
  `employeeID` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `firstName` varchar(30) NOT NULL,
  `midName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `email` varchar(25) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `contactNumber` varchar(11) NOT NULL,
  `role` enum('handler','admin','staff','on-call staff') NOT NULL DEFAULT 'handler',
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`employeeID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `entourage`
--

DROP TABLE IF EXISTS `entourage`;
CREATE TABLE IF NOT EXISTS `entourage` (
  `entourageID` int(7) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `eventID` int(7) UNSIGNED ZEROFILL NOT NULL,
  `entourageName` varchar(25) DEFAULT NULL,
  `role` varchar(25) DEFAULT NULL,
  `shoulder` tinyint(3) UNSIGNED DEFAULT NULL,
  `chest` tinyint(3) UNSIGNED DEFAULT NULL,
  `stomach` tinyint(3) UNSIGNED DEFAULT NULL,
  `waist` tinyint(3) UNSIGNED DEFAULT NULL,
  `armLength` tinyint(3) UNSIGNED DEFAULT NULL,
  `armHole` tinyint(3) UNSIGNED DEFAULT NULL,
  `muscle` tinyint(3) UNSIGNED DEFAULT NULL,
  `pantsLength` tinyint(3) UNSIGNED DEFAULT NULL,
  `baston` tinyint(3) UNSIGNED DEFAULT NULL,
  `status` enum('done','not-done') NOT NULL DEFAULT 'not-done',
  PRIMARY KEY (`entourageID`,`eventID`),
  KEY `eventID` (`eventID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `entouragedetails`
--

DROP TABLE IF EXISTS `entouragedetails`;
CREATE TABLE IF NOT EXISTS `entouragedetails` (
  `entourageID` int(7) UNSIGNED ZEROFILL NOT NULL,
  `designID` int(7) UNSIGNED ZEROFILL NOT NULL,
  PRIMARY KEY (`entourageID`,`designID`),
  KEY `fk_etd_designID_idx` (`designID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `eventdecors`
--

DROP TABLE IF EXISTS `eventdecors`;
CREATE TABLE IF NOT EXISTS `eventdecors` (
  `eventID` int(7) UNSIGNED ZEROFILL NOT NULL,
  `decorID` int(7) UNSIGNED ZEROFILL NOT NULL,
  `quantity` int(5) UNSIGNED NOT NULL,
  PRIMARY KEY (`eventID`,`decorID`),
  KEY `eventID` (`eventID`),
  KEY `decorID` (`decorID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `eventdesigns`
--

DROP TABLE IF EXISTS `eventdesigns`;
CREATE TABLE IF NOT EXISTS `eventdesigns` (
  `eventID` int(7) UNSIGNED ZEROFILL NOT NULL,
  `designID` int(7) UNSIGNED ZEROFILL NOT NULL,
  `quantity` int(5) UNSIGNED NOT NULL,
  PRIMARY KEY (`eventID`,`designID`),
  KEY `eventID` (`eventID`),
  KEY `designID` (`designID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `eventservices`
--

DROP TABLE IF EXISTS `eventservices`;
CREATE TABLE IF NOT EXISTS `eventservices` (
  `eventID` int(7) UNSIGNED ZEROFILL NOT NULL,
  `serviceID` int(7) UNSIGNED ZEROFILL NOT NULL,
  `amount` decimal(10,2) DEFAULT '0.00',
  `quantity` int(5) NOT NULL,
  PRIMARY KEY (`eventID`,`serviceID`),
  KEY `eventID` (`eventID`),
  KEY `serviceID` (`serviceID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `eventstaff`
--

DROP TABLE IF EXISTS `eventstaff`;
CREATE TABLE IF NOT EXISTS `eventstaff` (
  `eventID` int(7) UNSIGNED ZEROFILL NOT NULL,
  `employeeID` int(4) UNSIGNED ZEROFILL NOT NULL,
  `employeeRole` varchar(20) NOT NULL,
  PRIMARY KEY (`eventID`,`employeeID`),
  KEY `eventID` (`eventID`),
  KEY `employeeID` (`employeeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `eventthemes`
--

DROP TABLE IF EXISTS `eventthemes`;
CREATE TABLE IF NOT EXISTS `eventthemes` (
  `eventID` int(7) UNSIGNED ZEROFILL NOT NULL,
  `themeID` int(7) UNSIGNED ZEROFILL NOT NULL,
  PRIMARY KEY (`eventID`,`themeID`),
  KEY `fk_et_themeID` (`themeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

DROP TABLE IF EXISTS `expenses`;
CREATE TABLE IF NOT EXISTS `expenses` (
  `expensesID` int(7) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `expensesName` varchar(25) NOT NULL,
  `expensesAmount` decimal(10,2) UNSIGNED NOT NULL,
  `expenseDate` date DEFAULT NULL,
  `receiptNum` varchar(20) NOT NULL,
  `employeeID` int(4) UNSIGNED ZEROFILL NOT NULL,
  PRIMARY KEY (`expensesID`),
  UNIQUE KEY `expensesID_UNIQUE` (`expensesID`),
  KEY `employeeID` (`employeeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `paymentID` int(7) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `clientID` int(7) UNSIGNED ZEROFILL NOT NULL,
  `eventID` int(7) UNSIGNED ZEROFILL DEFAULT NULL,
  `transactionID` int(7) UNSIGNED ZEROFILL DEFAULT NULL,
  `employeeID` int(4) UNSIGNED ZEROFILL NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `amount` decimal(10,2) UNSIGNED NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`paymentID`),
  KEY `clientID` (`clientID`),
  KEY `eventID` (`eventID`),
  KEY `transactionID` (`transactionID`),
  KEY `employeeID` (`employeeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `serviceID` int(7) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `serviceName` varchar(25) NOT NULL,
  `description` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`serviceID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `theme`
--

DROP TABLE IF EXISTS `theme`;
CREATE TABLE IF NOT EXISTS `theme` (
  `themeID` int(7) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `themeName` varchar(45) DEFAULT NULL,
  `themeDesc` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`themeID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transactiondecors`
--

DROP TABLE IF EXISTS `transactiondecors`;
CREATE TABLE IF NOT EXISTS `transactiondecors` (
  `transactionID` int(7) UNSIGNED ZEROFILL NOT NULL,
  `decorID` int(7) UNSIGNED ZEROFILL NOT NULL,
  `quantity` int(4) NOT NULL,
  PRIMARY KEY (`transactionID`,`decorID`),
  KEY `transactionID` (`transactionID`),
  KEY `decorID` (`decorID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transactiondesign`
--

DROP TABLE IF EXISTS `transactiondesign`;
CREATE TABLE IF NOT EXISTS `transactiondesign` (
  `transactionID` int(7) UNSIGNED ZEROFILL NOT NULL,
  `designID` int(7) UNSIGNED ZEROFILL NOT NULL,
  `quantity` int(4) NOT NULL,
  PRIMARY KEY (`transactionID`,`designID`),
  KEY `transactionID` (`transactionID`),
  KEY `designID` (`designID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transactiondetails`
--

DROP TABLE IF EXISTS `transactiondetails`;
CREATE TABLE IF NOT EXISTS `transactiondetails` (
  `transactionID` int(7) UNSIGNED ZEROFILL NOT NULL,
  `serviceID` int(7) UNSIGNED ZEROFILL NOT NULL,
  `quantity` int(7) NOT NULL,
  `amount` int(10) NOT NULL,
  PRIMARY KEY (`transactionID`,`serviceID`),
  KEY `fk_tradtls_serviceID_idx` (`serviceID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
CREATE TABLE IF NOT EXISTS `transactions` (
  `transactionID` int(7) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `clientID` int(7) UNSIGNED ZEROFILL NOT NULL,
  `time` time DEFAULT NULL,
  `dateAvail` date DEFAULT NULL,
  `homeAddress` varchar(50) DEFAULT NULL,
  `IDType` varchar(15) DEFAULT NULL,
  `yearAndSection` varchar(15) DEFAULT NULL,
  `school` varchar(35) DEFAULT NULL,
  `depositAmt` double DEFAULT NULL,
  `employeeID` int(4) UNSIGNED ZEROFILL DEFAULT NULL,
  `totalAmount` decimal(10,2) UNSIGNED DEFAULT NULL,
  `transactionstatus` enum('on-going','finished','cancelled','') DEFAULT NULL,
  `cancelledDate` date DEFAULT NULL,
  `finishDate` date DEFAULT NULL,
  `refundAmt` int(8) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`transactionID`),
  KEY `clientID` (`clientID`),
  KEY `employeeID` (`employeeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `fk_app_employeeID` FOREIGN KEY (`employeeID`) REFERENCES `employees` (`employeeID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_app_eventID` FOREIGN KEY (`eventID`) REFERENCES `events` (`eventID`);

--
-- Constraints for table `entourage`
--
ALTER TABLE `entourage`
  ADD CONSTRAINT `fk_ent_eventID` FOREIGN KEY (`eventID`) REFERENCES `events` (`eventID`);

--
-- Constraints for table `eventdecors`
--
ALTER TABLE `eventdecors`
  ADD CONSTRAINT `fk_ed_decorID` FOREIGN KEY (`decorID`) REFERENCES `decors` (`decorsID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ed_eventID` FOREIGN KEY (`eventID`) REFERENCES `events` (`eventID`);

--
-- Constraints for table `eventdesigns`
--
ALTER TABLE `eventdesigns`
  ADD CONSTRAINT `fk_evdes_designID` FOREIGN KEY (`designID`) REFERENCES `designs` (`designID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_evdes_eventID` FOREIGN KEY (`eventID`) REFERENCES `events` (`eventID`);

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `fk_ev_clientID` FOREIGN KEY (`clientID`) REFERENCES `clients` (`clientID`),
  ADD CONSTRAINT `fk_ev_employeeID` FOREIGN KEY (`employeeID`) REFERENCES `employees` (`employeeID`);

--
-- Constraints for table `eventservices`
--
ALTER TABLE `eventservices`
  ADD CONSTRAINT `fk_es_eventID` FOREIGN KEY (`eventID`) REFERENCES `events` (`eventID`),
  ADD CONSTRAINT `fk_es_serviceID` FOREIGN KEY (`serviceID`) REFERENCES `services` (`serviceID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `eventstaff`
--
ALTER TABLE `eventstaff`
  ADD CONSTRAINT `fk_evsta_employeeID` FOREIGN KEY (`employeeID`) REFERENCES `employees` (`employeeID`),
  ADD CONSTRAINT `fk_evsta_eventID` FOREIGN KEY (`eventID`) REFERENCES `events` (`eventID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `eventthemes`
--
ALTER TABLE `eventthemes`
  ADD CONSTRAINT `fk_et_eventID` FOREIGN KEY (`eventID`) REFERENCES `events` (`eventID`),
  ADD CONSTRAINT `fk_et_themeID` FOREIGN KEY (`themeID`) REFERENCES `theme` (`themeID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `fk_exp_employeeID` FOREIGN KEY (`employeeID`) REFERENCES `employees` (`employeeID`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `fk_pay_clientID` FOREIGN KEY (`clientID`) REFERENCES `clients` (`clientID`),
  ADD CONSTRAINT `fk_pay_employeeID` FOREIGN KEY (`employeeID`) REFERENCES `employees` (`employeeID`),
  ADD CONSTRAINT `fk_pay_eventID` FOREIGN KEY (`eventID`) REFERENCES `events` (`eventID`),
  ADD CONSTRAINT `fk_pay_transactionID` FOREIGN KEY (`transactionID`) REFERENCES `transactions` (`transactionID`);

--
-- Constraints for table `transactiondecors`
--
ALTER TABLE `transactiondecors`
  ADD CONSTRAINT `fk_tde_decorID` FOREIGN KEY (`decorID`) REFERENCES `decors` (`decorsID`);

--
-- Constraints for table `transactiondesign`
--
ALTER TABLE `transactiondesign`
  ADD CONSTRAINT `fk_td_designID` FOREIGN KEY (`designID`) REFERENCES `designs` (`designID`),
  ADD CONSTRAINT `fk_td_transactionID` FOREIGN KEY (`transactionID`) REFERENCES `transactions` (`transactionID`);

--
-- Constraints for table `transactiondetails`
--
ALTER TABLE `transactiondetails`
  ADD CONSTRAINT `fk_trd_serviceID` FOREIGN KEY (`serviceID`) REFERENCES `services` (`serviceID`),
  ADD CONSTRAINT `fk_trd_transactionID` FOREIGN KEY (`transactionID`) REFERENCES `transactions` (`transactionID`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `fk_tr_clientID` FOREIGN KEY (`clientID`) REFERENCES `clients` (`clientID`),
  ADD CONSTRAINT `fk_tr_employeeID` FOREIGN KEY (`employeeID`) REFERENCES `employees` (`employeeID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
