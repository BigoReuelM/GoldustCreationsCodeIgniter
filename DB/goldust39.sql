-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 07, 2018 at 07:17 AM
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`appointmentID`, `eventID`, `transactionID`, `date`, `time`, `agenda`, `employeeID`, `status`) VALUES
(0000001, 0000003, NULL, '2018-04-15', '14:00:00', 'Final Fitting', 0006, 'ongoing'),
(0000002, 0000004, NULL, '2018-04-08', '09:00:00', 'Final Fitting', 0007, 'ongoing');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`clientID`, `firstName`, `middleName`, `lastName`, `registrationDate`, `contactNumber`) VALUES
(0000002, 'Michelle', 'Hermansen', 'Ostergaard', '2018-04-02 00:00:00', '09919902873'),
(0000003, 'Anton', 'Karlsen', 'Poulsen', '2018-04-04 00:00:00', '09918290387'),
(0000004, 'Johan', 'Schultz', 'Jeppesen', '2018-04-07 00:00:00', '09918827739'),
(0000005, 'Peter', 'Olsen', 'Svendsen', '2018-04-01 00:00:00', '09991887267'),
(0000006, 'Benjamin', 'Ravn', 'Bruun', '2018-04-09 00:00:00', '09128374657');

-- --------------------------------------------------------

--
-- Table structure for table `decors`
--

DROP TABLE IF EXISTS `decors`;
CREATE TABLE IF NOT EXISTS `decors` (
  `decorsID` int(7) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `decorName` varchar(20) NOT NULL,
  `color` varchar(10) NOT NULL,
  `decorType` enum('utensils','furnishing','trinkets','Cloth Decors') DEFAULT NULL,
  `themeID` int(7) UNSIGNED ZEROFILL DEFAULT NULL,
  PRIMARY KEY (`decorsID`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `decors`
--

INSERT INTO `decors` (`decorsID`, `decorName`, `color`, `decorType`, `themeID`) VALUES
(0000018, 'utensils', 'silver', 'utensils', NULL),
(0000020, 'plastic utensil', 'black', 'utensils', NULL),
(0000021, 'utensil', 'brown', 'utensils', NULL),
(0000023, 'utensil', 'brown', 'utensils', NULL),
(0000024, 'red utensils', 'red', 'utensils', NULL),
(0000025, 'blue utensils', 'blue', 'utensils', NULL),
(0000028, 'trinket box', 'silver', 'trinkets', NULL),
(0000029, 'party table', 'blue', 'furnishing', NULL),
(0000030, 'table', 'white', 'furnishing', NULL),
(0000031, 'Activity Table', 'red', 'furnishing', NULL),
(0000032, 'table', 'white', 'furnishing', NULL),
(0000033, 'trinket box', 'blue', 'trinkets', NULL),
(0000034, 'trinket', 'black', 'trinkets', NULL),
(0000038, 'isle runner, columns', 'white', 'Cloth Decors', 0000002),
(0000039, 'Table, Chair', 'white', 'furnishing', 0000002);

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
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `designs`
--

INSERT INTO `designs` (`designID`, `designName`, `color`, `designType`, `themeID`) VALUES
(0000017, 'Suit ', 'Aqua', 'suit', NULL),
(0000018, 'suit', 'brown', 'suit', NULL),
(0000019, 'Suit', 'dark blue', 'suit', NULL),
(0000020, 'Ball Gown', 'brown', 'gown', NULL),
(0000021, 'evening dress', 'blue', 'gown', NULL),
(0000022, 'Gown', 'dark blue', 'gown', NULL),
(0000023, 'long gown', 'blue', 'gown', NULL),
(0000024, 'Cars Costume', 'red', 'costume', NULL),
(0000025, 'Greek goddess', 'white', 'costume', NULL),
(0000026, 'Yoda', 'green', 'costume', NULL),
(0000027, 'Cosplay Uniform', 'green', 'costume', NULL),
(0000028, 'Sunglasses', 'black', 'accesory', NULL),
(0000029, 'Hairclip', 'white', 'accesory', NULL),
(0000030, 'Earring', 'white', 'accesory', NULL),
(0000031, 'Necklace', 'blue', 'accesory', NULL),
(0000032, 'Wedding Dress', 'white', 'gown', 0000002),
(0000033, 'White dress', 'white', 'gown', 0000002),
(0000034, 'Suit', 'white', 'suit', 0000002),
(0000035, 'white shirt', 'white', 'suit', 0000002);

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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employeeID`, `firstName`, `midName`, `lastName`, `address`, `email`, `username`, `password`, `contactNumber`, `role`, `status`) VALUES
(0001, 'admin', 'admin', 'admin', 'admin', 'admin@yahoo.com', '0001admin', '$2y$10$w34WQHdoSex4lYT91V1NXuFPgyrYgj02eWYaUfb57nf5qPpcZg2Pi', '1111111111', 'admin', 'active'),
(0005, 'Sophia', 'Santos', 'Alves', 'Quirino Hill, Baguio City', 'sophia@yahoo.com', '0005Sophia', '$2y$10$lle1Efu.W1.5o8W7.458setHZDrTT65yGE22lJDklO0aqjJroih8u', '09871827364', 'handler', 'active'),
(0006, 'Ana', 'Goncalves', 'Correia', 'Km 3, La Trinidad, Benguet', 'ananana@yahoo.com', '0006Ana', '$2y$10$oXYyerIaflVqrtHtgb2RfOZVo4OGG0QdHY6VGmwU.dYawCgnOXbVO', '09987162539', 'handler', 'active'),
(0007, 'Rafaela', 'Melo', 'Castro', 'Pico, La Trinidad, Benguet', 'rafaelacastro@yahoo.com', '0007Rafaela', '$2y$10$fTQw6tKxfkIqe2Pi.5Uiwekm0.DV4609StRj.M4sDUxkerhj5Yc.e', '09182783976', 'handler', 'active'),
(0008, 'Mariana', 'Carvalho', 'Cardoso', 'Bakakeng Sur, Baguio City', 'mariana@gmail.com', '0008Mariana', '$2y$10$Ka3i074e/XbDa9QMMkO8I.D3h1atEW3X6mZ3iQ7BTJdkOunEqm9zG', '09982783674', 'handler', 'active'),
(0009, 'Evelyn', 'Rocha', 'Carvalho', 'Dizon Subd., Baguio City', 'rochaeve@yahoo.com', '0009Evelyn', '$2y$10$JAckgBMPUwoKGEkgAtA2Hu5t0vkO2mUL51g1cAoi79.c2GITOELHW', '09992837452', 'handler', 'active'),
(0010, 'Yasmin', 'Silva', 'Cardoso', 'Km 3, La Trinidad, Benguet', 'cardoso@gmail.com', '0010Yasmin', '$2y$10$m7BEkYwJvhwc0lJS/Jwl/eJwu5FV6YSyf.EhqZGx5tY0cEzAkfGc2', '09182738728', 'handler', 'active'),
(0011, 'Sarah', 'Fernandes', 'Carvalho', 'Pinsao, Baguio CIty', 'sarahcarvalho@gmail.com', '0011Sarah', '$2y$10$VndNdFSFH1khxTiRCjEdUedIw7SBtuBvmtXtPhnHCvY3O/n2xLGzq', '09281772636', 'handler', 'active'),
(0012, 'Torben', 'Hedegaard', 'Henriksen', 'Pinget, Baguio City', 'bentor@yahoo.com', NULL, NULL, '09182773647', 'staff', 'active'),
(0013, 'Rasmus', 'Mathiesen', 'Lind', 'Queen Of Peace, Baguio City', 'rasmusra@yahoo.com', NULL, NULL, '09182883749', 'staff', 'active'),
(0014, 'Alfred', 'Bak', 'Jensen', 'Km 4, La Trinidad, Benguet', 'alfjensen@gmail.com', NULL, NULL, '09182778376', 'on-call staff', 'active'),
(0015, 'Sebastian', 'Villadsen', 'Johansen', 'Lower Quirino Hill, Baguio City', 'sebas@yahoo.com', NULL, NULL, '09128923900', 'on-call staff', 'active');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `entourage`
--

INSERT INTO `entourage` (`entourageID`, `eventID`, `entourageName`, `role`, `shoulder`, `chest`, `stomach`, `waist`, `armLength`, `armHole`, `muscle`, `pantsLength`, `baston`, `status`) VALUES
(0000001, 0000003, 'Anne M. Knudsen ', 'Bridesmaid', 26, 29, 27, 29, 26, 20, 20, 0, 0, 'not-done'),
(0000002, 0000003, 'Nansen J. Krogh', 'Bestman', 37, 39, 38, 40, 35, 30, 32, 39, 10, 'not-done');

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

--
-- Dumping data for table `entouragedetails`
--

INSERT INTO `entouragedetails` (`entourageID`, `designID`) VALUES
(0000002, 0000019),
(0000001, 0000022);

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

--
-- Dumping data for table `eventdecors`
--

INSERT INTO `eventdecors` (`eventID`, `decorID`, `quantity`) VALUES
(0000003, 0000018, 250),
(0000003, 0000030, 70);

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

--
-- Dumping data for table `eventdesigns`
--

INSERT INTO `eventdesigns` (`eventID`, `designID`, `quantity`) VALUES
(0000003, 0000019, 0),
(0000003, 0000022, 0);

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
  `eventDuration` int(11) NOT NULL,
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
  `themeID` int(7) UNSIGNED ZEROFILL DEFAULT NULL,
  PRIMARY KEY (`eventID`),
  KEY `clientID` (`clientID`),
  KEY `employeeID` (`employeeID`),
  KEY `themeID` (`themeID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`eventID`, `eventName`, `clientID`, `celebrantName`, `eventDate`, `eventDuration`, `eventLocation`, `eventType`, `eventTime`, `motif`, `employeeID`, `totalAmount`, `eventStatus`, `packageType`, `dateAssisted`, `refundedAmount`, `refundedDate`, `cancelledDate`, `resumeDate`, `finishedDate`, `themeID`) VALUES
(0000002, 'Irene Ostergaard Birthday', 0000002, 'Irene Ostergaard', '2018-04-06', 0, 'Km 6, La Trinidad, Benguet', 'Birthday', '10:00:00', 'Red', 0005, 1650, 'on-going', 'semi-package', '2018-04-02', NULL, NULL, NULL, NULL, NULL, NULL),
(0000003, 'Anton-Damgaard Nuptial', 0000003, 'Anton-Damgaard', '2018-04-18', 0, 'Baguio Cathedral, Baguio City', 'Wedding', '13:00:00', 'White', 0006, NULL, 'on-going', 'semi-package', '2018-04-05', NULL, NULL, NULL, NULL, NULL, NULL),
(0000004, 'Ella Castro&#039;s Debut', 0000003, 'Ella Castro', '2018-04-12', 0, 'Bakakeng Sur, Baguio City', 'Birthday', '14:00:00', 'Green', 0007, NULL, 'on-going', 'semi-package', '2018-04-09', NULL, NULL, NULL, NULL, NULL, NULL),
(0000005, '11th ABC Inc. Convention', 0000003, 'ABC Inc.', '2018-04-18', 0, 'Easter Gym, Easter College, Baguio City', 'Conference', '10:00:00', NULL, 0008, NULL, 'on-going', 'semi-package', '2018-04-03', NULL, NULL, NULL, NULL, NULL, NULL),
(0000006, 'Sports Fest', 0000003, 'BSU', '2018-04-17', 0, 'BSU, La Trinidad, Benguet', 'Sports Fest', '09:00:00', NULL, 0008, NULL, 'on-going', 'semi-package', '2018-04-09', NULL, NULL, NULL, NULL, NULL, NULL),
(0000007, 'Michael Birthday', 0000002, 'Michael Ostergaard', '2018-07-25', 3, NULL, NULL, '10:00:00', NULL, 0005, NULL, 'on-going', NULL, '2018-05-07', NULL, NULL, NULL, NULL, NULL, NULL),
(0000008, 'YMCA Staff Seminar', 0000002, 'YMCA', '2018-05-15', 3, NULL, NULL, '10:00:00', NULL, 0005, NULL, 'new', NULL, '2018-05-07', NULL, NULL, NULL, NULL, NULL, NULL);

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

--
-- Dumping data for table `eventservices`
--

INSERT INTO `eventservices` (`eventID`, `serviceID`, `amount`, `quantity`) VALUES
(0000002, 0000006, '1400.00', 2),
(0000002, 0000010, '250.00', 100),
(0000003, 0000001, '0.00', 0),
(0000003, 0000002, '0.00', 0),
(0000003, 0000007, '0.00', 0),
(0000003, 0000009, '0.00', 0),
(0000004, 0000001, '0.00', 0),
(0000004, 0000002, '0.00', 0),
(0000004, 0000006, '0.00', 0),
(0000004, 0000007, '0.00', 0),
(0000004, 0000010, '0.00', 0),
(0000005, 0000005, '0.00', 0);

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

--
-- Dumping data for table `eventstaff`
--

INSERT INTO `eventstaff` (`eventID`, `employeeID`, `employeeRole`) VALUES
(0000002, 0012, 'Invitation designer'),
(0000002, 0014, 'Caterer'),
(0000003, 0012, 'Photographer'),
(0000003, 0013, 'Tailor'),
(0000003, 0015, 'Makeup Artist'),
(0000004, 0013, 'Photographer'),
(0000004, 0014, 'Makeup Artist'),
(0000005, 0014, ''),
(0000005, 0015, ''),
(0000006, 0012, ''),
(0000006, 0014, '');

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

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`serviceID`, `serviceName`, `description`, `status`) VALUES
(0000001, 'Gowns', 'Gown Rentals', 'active'),
(0000002, 'Make-up', 'Make-up Services', 'active'),
(0000003, 'Church', 'Church Decoration', 'active'),
(0000004, 'Floral Entourage', 'Flower', 'active'),
(0000005, 'Reception', 'Reception Venue Decoration', 'active'),
(0000006, 'Cakes', 'Cakes', 'active'),
(0000007, 'Photo &amp; Video', 'Multimedia Coverage', 'active'),
(0000008, 'Sign Frame', 'Sign Frame', 'active'),
(0000009, 'Tokens', 'Tokens For Event Participants', 'active'),
(0000010, 'Invitations', 'Invitations', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `theme`
--

DROP TABLE IF EXISTS `theme`;
CREATE TABLE IF NOT EXISTS `theme` (
  `themeID` int(7) UNSIGNED ZEROFILL NOT NULL,
  `themeName` varchar(250) NOT NULL,
  `themeDesc` varchar(250) NOT NULL,
  PRIMARY KEY (`themeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  ADD CONSTRAINT `fk_ev_employeeID` FOREIGN KEY (`employeeID`) REFERENCES `employees` (`employeeID`),
  ADD CONSTRAINT `fk_ev_themeID` FOREIGN KEY (`themeID`) REFERENCES `theme` (`themeID`) ON DELETE CASCADE ON UPDATE CASCADE;

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
