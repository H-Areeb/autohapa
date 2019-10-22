-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2019 at 06:15 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `autohapa_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_info`
--

CREATE TABLE `account_info` (
  `id` int(11) NOT NULL,
  `companyName` varchar(50) DEFAULT NULL,
  `firstName` varchar(50) DEFAULT NULL,
  `lastName` varchar(50) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `zipCode` int(9) DEFAULT NULL,
  `about` text DEFAULT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `account_type`
--

CREATE TABLE `account_type` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `isvisible` int(1) NOT NULL DEFAULT 1,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_type`
--

INSERT INTO `account_type` (`id`, `type`, `isvisible`, `updated_at`) VALUES
(1, 'dealer', 1, '2019-10-21 15:35:33'),
(2, 'buyer', 1, '2019-10-21 15:35:33');

-- --------------------------------------------------------

--
-- Table structure for table `carpkg_features`
--

CREATE TABLE `carpkg_features` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `isActive_ynid` int(11) NOT NULL DEFAULT 1,
  `isdeleted_ynid` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carpkg_features`
--

INSERT INTO `carpkg_features` (`id`, `name`, `isActive_ynid`, `isdeleted_ynid`) VALUES
(24, 'Stand out - show up to 8 photos in search results', 1, 2),
(25, 'Reach more buyers and promote your car on mobile', 1, 2),
(26, 'Be seen first in our featured section at the top of search results', 1, 2),
(27, 'Reach more buyers and promote your car on desktop', 1, 2),
(28, 'Advertise until sold - you\'ll be able to re-book your advert for free, for as long as you like', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `carpkg_features_details`
--

CREATE TABLE `carpkg_features_details` (
  `id` int(11) NOT NULL,
  `car_pkg_id` int(11) NOT NULL,
  `pkg_features_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carpkg_features_details`
--

INSERT INTO `carpkg_features_details` (`id`, `car_pkg_id`, `pkg_features_id`) VALUES
(24, 24, 24),
(25, 24, 25),
(26, 24, 26),
(27, 24, 27),
(28, 24, 28),
(29, 25, 24),
(30, 25, 25),
(31, 25, 26),
(32, 26, 24),
(33, 26, 25);

-- --------------------------------------------------------

--
-- Table structure for table `car_ad`
--

CREATE TABLE `car_ad` (
  `id` int(11) NOT NULL,
  `carregistrationnumber` varchar(50) NOT NULL,
  `car_makeid` int(11) NOT NULL,
  `car_modelid` int(11) NOT NULL,
  `car_variantid` int(11) NOT NULL,
  `car_trimid` int(11) NOT NULL,
  `car_derivativeid` int(11) NOT NULL,
  `car_bodytypeid` int(11) NOT NULL,
  `car_transmissionid` int(11) NOT NULL,
  `car_fueltypeid` int(11) NOT NULL,
  `car_colourid` int(11) NOT NULL,
  `dateoffirstregistration` date NOT NULL,
  `price` decimal(11,2) DEFAULT NULL,
  `adtitle` varchar(50) DEFAULT NULL,
  `adsubtitle` varchar(50) DEFAULT NULL,
  `ownersqty` int(11) DEFAULT NULL,
  `servicehistoryid` int(11) DEFAULT NULL,
  `MOTduedate` date DEFAULT NULL,
  `adverttext` varchar(5000) DEFAULT NULL,
  `contactnumber` varchar(15) DEFAULT NULL,
  `contactsecondarynumber` varchar(15) DEFAULT NULL,
  `buyercontactbyemailynid` int(11) DEFAULT NULL,
  `locationofcarpostalcode` varchar(50) DEFAULT NULL,
  `car_milage` decimal(15,0) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `isadminapproved_id` int(11) NOT NULL DEFAULT 2,
  `isdeleteyn_id` int(1) NOT NULL DEFAULT 2,
  `ordinal` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car_ad`
--

INSERT INTO `car_ad` (`id`, `carregistrationnumber`, `car_makeid`, `car_modelid`, `car_variantid`, `car_trimid`, `car_derivativeid`, `car_bodytypeid`, `car_transmissionid`, `car_fueltypeid`, `car_colourid`, `dateoffirstregistration`, `price`, `adtitle`, `adsubtitle`, `ownersqty`, `servicehistoryid`, `MOTduedate`, `adverttext`, `contactnumber`, `contactsecondarynumber`, `buyercontactbyemailynid`, `locationofcarpostalcode`, `car_milage`, `customer_id`, `isadminapproved_id`, `isdeleteyn_id`, `ordinal`, `updated_at`) VALUES
(1, '8204950', 1, 1, 1, 1, 2, 2, 2, 3, 3, '2019-09-13', '59000.00', 'HondaCivic1.6 CRX Coupe 3dr Petrol Manual (125 bhp', 'history example', 1, 3, '2019-09-06', 'amazing gorgeous car', '96456315384', '', 0, 'le2 0pf', '2549', 1, 1, 2, 0, '2019-10-18 09:41:59'),
(2, '9874563', 1, 1, 1, 2, 3, 1, 1, 1, 2, '2019-09-05', '26000.00', 'HondaCivic1.6 CRX Coupe 3dr Petrol Manual (130 bhp', 'small history', 1, 1, '2019-09-05', 'this is second entry in table ', '9654284631', '', 0, 'le2 opf', '1574', 2, 1, 2, 0, '2019-10-18 09:41:59'),
(3, '4654646', 1, 1, 1, 1, 3, 1, 1, 3, 1, '2019-10-11', '35000.00', 'HondaCivic1.6 CRX Coupe 3dr Petrol Manual (130 bhp', 'history available', 3, 2, '2019-10-18', 'Audi A3 great drive which benefits from central locking, cd/radio, clean interior, history, Mot Till 24/07/2020, Smoke free, Pet free, Recent MOT Nationwide Delivery Option Available... Part Ex Considered... Grey, 5  owners, Â£899', '03151551515', '', 0, 'a12345', '22000', 1, 1, 2, 0, '2019-10-18 09:41:59'),
(4, '396548726', 1, 1, 1, 2, 2, 3, 2, 3, 4, '2019-10-03', '45000.00', 'HondaCivic1.6 CRX Coupe 3dr Petrol Manual (125 bhp', 'LOW MILEAGE AUTO CONVERTIBLE', 2, 3, '1970-01-09', 'Audi A3 great drive which benefits from central locking, cd/radio, clean interior, history, Mot Till 24/07/2020, Smoke free, Pet free, Recent MOT Nationwide Delivery Option Available... Part Ex Considered... Grey, 5  owners, Â£899', '926457945465', '', 0, 'a12345', '1500', 1, 1, 2, 0, '2019-10-18 09:41:59'),
(5, '325445615', 1, 1, 1, 2, 1, 1, 1, 2, 1, '2019-10-03', '66000.00', 'HondaCivic1.6 CRX Coupe 3dr Petrol Manual (125 bhp', 'LOW MILEAGE AUTO CONVERTIBLE', 2, 1, '0000-00-00', 'Audi A3 great drive which benefits from central locking, cd/radio, clean interior, history, Mot Till 24/07/2020, Smoke free, Pet free, Recent MOT Nationwide Delivery Option Available... Part Ex Considered... Grey, 5  owners, Â£899', '96547852185', '', 0, 'le2 0pf', '20000', 2, 1, 2, 0, '2019-10-18 09:41:59'),
(6, '87549521', 1, 1, 1, 1, 1, 1, 2, 1, 1, '2019-10-09', '50000.00', 'HondaCivic1.5 CRX Coupe 3dr Petrol Manual (100 bhp', 'history available', 3, 2, '2019-10-10', 'This Honda Jazz 1.3 EX Navi CVT (Chrome Pack) is brand new and in stock at Holden Honda, Norwich. Other colours may be available to choose from! , , This model also benefits from having the Chrome Pack pre-installed, which includes Front Lower Decoration, Tailgate Decoration and Window Decorations., , Holden Honda\'s retail price includes a deposit contribution of Â£1000 if the vehicle is financed through Honda Financial Services. , ,', '032356456486', '', 0, 'a12345', '2000', 1, 1, 2, 0, '2019-10-18 09:41:59'),
(11, '92265465', 1, 1, 1, 1, 1, 1, 1, 1, 1, '2019-10-04', '47000.00', 'HondaCivic1.5 CRX Coupe 3dr Petrol Manual (100 bhp', 'history is available', 2, 2, '2019-10-10', 'This Honda Jazz 1.3 EX Navi CVT (Chrome Pack) is brand new and in stock at Holden Honda, Norwich. Other colours may be available to choose from! , , This model also benefits from having the Chrome Pack pre-installed, which includes Front Lower Decoration, Tailgate Decoration and Window Decorations., , Holden Honda\'s retail price includes a deposit contribution of Â£1000 if the vehicle is financed through Honda Financial Services. , ,', '0321465842', '', 0, 'a12345', '10000', 2, 1, 2, 0, '2019-10-18 09:41:59'),
(14, '8764646', 1, 1, 1, 1, 1, 2, 1, 1, 1, '2019-10-09', '745044.00', 'HondaCivic1.5 CRX Coupe 3dr Petrol Manual (100 bhp', 'full history available', 3, 2, '2019-10-17', 'This Honda Jazz 1.3 EX Navi CVT (Chrome Pack) is brand new and in stock at Holden Honda, Norwich. Other colours may be available to choose from! , , This model also benefits from having the Chrome Pack pre-installed, which includes Front Lower Decoration, Tailgate Decoration and Window Decorations., , Holden Honda\'s retail price includes a deposit contribution of Â£1000 if the vehicle is financed through Honda Financial Services. , ,', '03245152654', '', 0, 'a12345', '2000', 1, 1, 2, 0, '2019-10-18 09:41:59'),
(15, '5646646', 1, 1, 1, 1, 1, 1, 1, 1, 2, '2019-10-09', '80000.00', 'HondaCivic1.5 CRX Coupe 3dr Petrol Manual (100 bhp', '', 1, 0, '0000-00-00', '', '', '', 0, 'a12345', '2000', 1, 1, 2, 0, '2019-10-18 09:41:59'),
(26, 'u8998758493', 2, 6, 10, 1, 1, 6, 1, 6, 10, '2019-10-01', '54620.00', 'ToyotaCorolla 1.5 CRX Coupe 3dr Petrol Manual ', 'history available', 2, 2, '2019-10-10', 'Excellent Condition Civic With Full ', '0321351456', '', 0, 'le2 0pf', '45546', 1, 1, 1, 0, '2019-10-18 09:41:59'),
(27, '54564894', 3, 7, 17, 1, 1, 6, 1, 4, 11, '2019-10-07', '10000.00', 'AudiA11.5 CRX Coupe 3dr Petrol Manual (100 bhp)', 'history available', 3, 2, '2019-10-02', 'Excellent Condition Civic With Full ', '02118148448', '', 0, 'a1234', '2000', 1, 1, 1, 0, '2019-10-18 09:41:59'),
(29, '848446846', 2, 4, 11, 1, 1, 8, 1, 2, 1, '2019-10-10', '5000.00', 'ToyotaLand Cruiser1.5 CRX Coupe 3dr Petrol Manual ', 'history available', 4, 2, '2019-10-09', 'Excellent Condition Civic With Full ', '032145454454', '', 0, 'le2 0pf', '20000', 1, 1, 1, 0, '2019-10-18 09:41:59'),
(38, '875456411', 1, 3, 9, 1, 1, 2, 1, 6, 7, '2019-10-02', '55000.00', 'HondaAccord1.5 CRX Coupe 3dr Petrol Manual (100 bh', 'GOOD HISTORY*TOP SPEC', 3, 1, '2019-10-02', 'Excellent Condition Accord With Full ', '035126544448', '', 0, 'a12345', '3000', 1, 1, 2, 0, '2019-10-18 09:41:59'),
(39, 'Reg. No:', 1, 1, 1, 1, 1, 11, 1, 4, 2, '2019-08-26', '2500.00', 'HondaCivic1.5 CRX Coupe 3dr Petrol Manual (100 bhp', 'Subtitle: ', 1, 0, '0000-00-00', 'This will appear at the top of your ad. Use it to persuade buyers to read further.', '01255888', '', 0, '2580000', '0', 33, 1, 2, 0, '2019-10-18 09:41:59'),
(40, '1022', 1, 1, 1, 1, 1, 1, 1, 2, 2, '2019-10-01', '20000.00', '', '', 0, 0, '0000-00-00', '', '', '', 0, '', '120000', 0, 2, 2, 0, '2019-10-18 09:41:59'),
(41, '121', 2, 4, 10, 1, 1, 11, 1, 7, 10, '2019-10-10', '3000.00', 'ToyotaLand Cruiser1.5 CRX Coupe 3dr Petrol Manual ', 'AZC', 1, 0, '0000-00-00', 'This will appear at the top of your ad. Use it to persuade buyers to read further.', '02086069911', '', 0, 'ub1 1su', '1222', 34, 1, 2, 0, '2019-10-18 09:41:59'),
(47, '87544131', 1, 2, 5, 1, 1, 11, 1, 8, 11, '2019-10-02', '55000.00', 'HondaCR-V1.5 CRX Coupe 3dr Petrol Manual (100 bhp)', '', 1, 0, '0000-00-00', '', '0321651464', '', 0, 'le2 0pf', '20000', 1, 2, 2, 0, '2019-10-18 09:41:59'),
(49, '97543148', 3, 9, 20, 1, 1, 7, 1, 7, 8, '2019-10-02', '9955.00', 'AudiA31.5 CRX Coupe 3dr Petrol Manual (100 bhp)', 'Full Service history Long MOT', 3, 2, '2019-10-18', 'Low Mileage, Excellent Example Audi A3 1.6 petrol Starts and drives wonderful smooth silky gearbox handles so well. Full service history Very Clean inside and out Best colour combo Sky blue with Beautiful suede interior. Been a very reliable car for me new company car and lost of parking space forc', '923454767614', '', 0, 'le2 0pf', '9000', 14, 2, 2, 0, '2019-10-18 09:41:59'),
(50, '97524334', 4, 10, 22, 1, 1, 2, 2, 3, 12, '2019-10-02', '45000.00', 'BMW1series1.5 CRX Coupe 3dr Petrol Manual (100 bhp', 'Southend-On-Sea 108 miles away', 3, 1, '2019-10-02', 'Very clean and well looked after car, it has proven to be a very reliable car for the past 2 years. It was serviced regularly. Has good tyres all, chain and water pump has already been done . It has a long mot. , Smoke free, Pet free, Recent MOT Next MOT due 10/08/2020, Part service history, Blue,', '03185486489', '', 0, 'le2 0pf', '1000', 32, 2, 2, 0, '2019-10-18 09:41:59'),
(51, '7548314', 5, 14, 28, 1, 1, 3, 1, 2, 9, '2019-10-08', '33000.00', 'Nissan370Z1.5 CRX Coupe 3dr Petrol Manual (100 bhp', 'FSH NISMOKIT 750BHP LITCHFIELD', 3, 2, '2019-10-09', 'CARBON SPOILER. .HEATED LEATHER SEATS. .R20 ALLOYS. .BOSE SOUND SYSTEM. .BLUE SPEEDOMETER DIAL. .MAGNETIC SUSPENSION. .ELECTRIC BI-FOLDING MIRROR. OUR FINANCE SPECIALIST WILL HELP IN HOUSE WILL GET YOU APPROVAL WITHIN 30MINS. PICK ANY CAR FROM OUR WIDE RANGE OF STOCK ON OUR WEBSITE ALTERNATIVELY WE', '02313514648', '', 0, 'a12345', '6000', 1, 1, 2, 0, '2019-10-21 05:36:20'),
(52, '874311', 6, 16, 30, 1, 1, 8, 1, 4, 12, '2019-10-03', '74000.00', '', '', 0, 0, '0000-00-00', '', '', '', 0, '', '1500', 0, 2, 2, 0, '2019-10-18 09:41:59');

-- --------------------------------------------------------

--
-- Table structure for table `car_ad_feature_`
--

CREATE TABLE `car_ad_feature_` (
  `id` int(11) NOT NULL,
  `carad_id` int(11) NOT NULL,
  `feature_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car_ad_feature_`
--

INSERT INTO `car_ad_feature_` (`id`, `carad_id`, `feature_id`) VALUES
(11, 2, 3),
(12, 2, 4),
(13, 2, 5),
(14, 2, 6),
(15, 2, 7),
(16, 2, 12),
(17, 2, 13),
(18, 2, 14),
(19, 2, 15),
(20, 2, 17),
(21, 2, 21),
(22, 2, 1),
(23, 2, 23),
(24, 3, 4),
(25, 3, 6),
(26, 3, 14),
(27, 3, 1),
(28, 3, 22),
(29, 4, 4),
(30, 4, 6),
(31, 4, 7),
(32, 4, 8),
(33, 4, 9),
(34, 4, 10),
(35, 4, 12),
(36, 4, 13),
(37, 4, 17),
(38, 4, 2),
(39, 4, 19),
(40, 4, 22),
(41, 5, 4),
(42, 5, 6),
(43, 5, 7),
(44, 5, 8),
(45, 5, 9),
(46, 5, 10),
(47, 5, 12),
(48, 5, 17),
(49, 5, 21),
(50, 5, 1),
(51, 5, 18),
(52, 5, 22),
(80, 11, 4),
(81, 11, 6),
(82, 11, 12),
(83, 11, 13),
(84, 11, 1),
(85, 11, 19),
(86, 11, 22),
(95, 14, 3),
(96, 14, 4),
(97, 14, 6),
(98, 14, 1),
(99, 14, 19),
(100, 14, 22),
(114, 19, 3),
(115, 19, 6),
(116, 19, 7),
(117, 19, 8),
(118, 19, 9),
(119, 19, 14),
(120, 19, 1),
(121, 19, 22),
(122, 26, 3),
(123, 26, 5),
(124, 26, 7),
(125, 26, 8),
(126, 26, 10),
(127, 26, 14),
(128, 26, 16),
(129, 26, 17),
(130, 26, 1),
(131, 26, 19),
(132, 26, 22),
(133, 27, 6),
(134, 27, 7),
(135, 27, 9),
(136, 27, 11),
(137, 27, 13),
(138, 27, 15),
(139, 27, 17),
(140, 27, 2),
(141, 27, 19),
(142, 27, 22),
(143, 38, 3),
(144, 38, 4),
(145, 38, 5),
(146, 38, 6),
(147, 38, 7),
(148, 38, 8),
(149, 38, 15),
(150, 38, 17),
(151, 38, 1),
(152, 38, 22),
(154, 41, 5),
(155, 41, 1),
(156, 41, 20),
(157, 44, 3),
(158, 44, 4),
(159, 44, 6),
(160, 44, 7),
(161, 44, 8),
(162, 44, 9),
(163, 44, 11),
(164, 44, 13),
(165, 44, 14),
(166, 44, 17),
(167, 44, 21),
(168, 44, 2),
(169, 44, 18),
(170, 44, 22),
(195, 45, 3),
(196, 45, 5),
(197, 45, 7),
(198, 45, 9),
(199, 45, 11),
(200, 45, 13),
(201, 45, 1),
(202, 45, 20),
(216, 49, 3),
(217, 49, 4),
(218, 49, 6),
(219, 49, 8),
(220, 49, 9),
(221, 49, 10),
(222, 49, 11),
(223, 49, 12),
(224, 49, 13),
(225, 49, 14),
(226, 49, 16),
(227, 49, 17),
(228, 49, 21),
(229, 49, 2),
(230, 49, 19),
(231, 49, 23),
(232, 50, 3),
(233, 50, 5),
(234, 50, 6),
(235, 50, 7),
(236, 50, 8),
(237, 50, 9),
(238, 50, 10),
(239, 50, 11),
(240, 50, 12),
(241, 50, 17),
(242, 50, 21),
(243, 50, 1),
(244, 50, 19),
(245, 50, 22);

-- --------------------------------------------------------

--
-- Table structure for table `car_ad_pkg`
--

CREATE TABLE `car_ad_pkg` (
  `id` int(11) NOT NULL,
  `car_ad_id` int(11) NOT NULL,
  `car_pkg_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car_ad_pkg`
--

INSERT INTO `car_ad_pkg` (`id`, `car_ad_id`, `car_pkg_id`) VALUES
(1, 1, 25),
(2, 2, 24),
(3, 3, 24),
(4, 3, 24),
(5, 3, 24),
(6, 3, 24),
(7, 3, 24),
(8, 3, 24),
(9, 3, 24),
(10, 3, 24),
(11, 3, 24),
(12, 3, 24),
(13, 3, 24),
(14, 3, 24),
(15, 3, 24),
(16, 3, 0),
(17, 3, 24),
(18, 2, 25),
(19, 2, 0),
(20, 2, 24),
(21, 2, 25),
(22, 2, 0),
(23, 2, 0),
(24, 2, 0),
(25, 2, 24),
(26, 2, 24),
(27, 2, 24),
(28, 2, 0),
(29, 2, 25),
(30, 2, 25),
(31, 2, 24),
(32, 2, 24),
(33, 2, 24),
(34, 2, 24),
(35, 2, 24),
(36, 2, 24),
(37, 2, 24),
(38, 2, 24),
(39, 2, 24),
(40, 2, 24),
(41, 2, 24),
(42, 4, 24),
(43, 6, 24),
(44, 6, 24),
(45, 6, 24),
(46, 6, 24),
(47, 11, 25),
(48, 14, 24),
(49, 15, 24),
(50, 19, 24),
(51, 25, 24),
(52, 26, 24),
(53, 27, 24),
(54, 28, 27),
(55, 29, 24),
(56, 35, 25),
(57, 38, 24),
(58, 38, 24),
(59, 38, 24),
(60, 38, 24),
(61, 38, 24),
(62, 38, 24),
(63, 39, 26),
(64, 41, 24),
(65, 44, 24),
(66, 0, 24),
(67, 45, 24),
(68, 38, 24),
(69, 38, 24),
(70, 38, 24),
(71, 38, 25);

-- --------------------------------------------------------

--
-- Table structure for table `car_derivative`
--

CREATE TABLE `car_derivative` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `car_variantid` int(11) NOT NULL,
  `isactiveynid` int(11) NOT NULL DEFAULT 1,
  `isdeletedynid` int(11) NOT NULL DEFAULT 2,
  `ordinal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car_derivative`
--

INSERT INTO `car_derivative` (`id`, `name`, `car_variantid`, `isactiveynid`, `isdeletedynid`, `ordinal`) VALUES
(1, '1.5 CRX Coupe 3dr Petrol Manual (100 bhp)', 1, 1, 2, 1),
(2, '1.6 CRX Coupe 3dr Petrol Manual (125 bhp)', 1, 1, 2, 2),
(3, '1.6 CRX Coupe 3dr Petrol Manual (130 bhp)', 1, 1, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `car_feature`
--

CREATE TABLE `car_feature` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `isactiveynid` int(11) NOT NULL DEFAULT 1,
  `isdeletedynid` int(11) NOT NULL DEFAULT 2,
  `controltypeid` int(11) NOT NULL,
  `parentid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car_feature`
--

INSERT INTO `car_feature` (`id`, `name`, `isactiveynid`, `isdeletedynid`, `controltypeid`, `parentid`) VALUES
(1, 'Electric sunroof', 1, 2, 2, 2),
(2, 'Manual sunroof', 1, 2, 2, 1),
(3, 'Electric windows', 1, 2, 1, 0),
(4, 'Air conditioning', 1, 2, 1, 0),
(5, 'Satellite navigation', 1, 2, 1, 0),
(6, 'Parking aid', 1, 2, 1, 0),
(7, 'DVD', 1, 2, 1, 0),
(8, 'MP3 player', 1, 2, 1, 0),
(9, 'CD player', 1, 2, 1, 0),
(10, 'Bluetooth', 1, 2, 1, 0),
(11, 'Leather trim', 1, 2, 1, 0),
(12, 'Heated seats', 1, 2, 1, 0),
(13, 'Height adjustable driver\'s seat', 1, 2, 1, 0),
(14, 'Height adjustable passenger seat', 1, 2, 1, 0),
(15, 'Folding rear seats', 1, 2, 1, 0),
(16, 'Child seat points (Isofix system)', 1, 2, 1, 0),
(17, 'Sports seats', 1, 2, 1, 0),
(18, 'Metallic paint', 1, 2, 2, 0),
(19, 'Pearlescent paint', 1, 2, 2, 0),
(20, 'Alloy Wheels', 1, 2, 3, 0),
(21, 'Spare wheel (Full)', 1, 2, 1, 0),
(22, '13\" Alloy Wheels', 1, 2, 3, 0),
(23, '14\" Alloy Wheels', 1, 2, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `car_images`
--

CREATE TABLE `car_images` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `isadminApproved_ynid` int(11) NOT NULL DEFAULT 2,
  `isdeleted_ynid` int(11) NOT NULL DEFAULT 2,
  `isvisibleid` int(11) NOT NULL DEFAULT 1,
  `ordinal` int(11) NOT NULL,
  `carad_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car_images`
--

INSERT INTO `car_images` (`id`, `name`, `isadminApproved_ynid`, `isdeleted_ynid`, `isvisibleid`, `ordinal`, `carad_id`) VALUES
(1, 'images/343156car4.jpg', 2, 2, 1, 0, 1),
(2, 'images/725007car5.jpg', 2, 2, 1, 1, 1),
(3, 'images/810157car6.jpg', 2, 2, 1, 2, 1),
(4, 'images/85937car7.jpg', 2, 2, 1, 3, 1),
(5, 'images/214196car7.jpg', 2, 2, 1, 0, 2),
(6, 'images/997744car8.jpg', 2, 2, 1, 1, 2),
(7, 'images/37797car9.jpg', 2, 2, 1, 2, 2),
(8, 'images/907442car10.jpg', 2, 2, 1, 3, 2),
(9, 'images/408338car5.jpg', 2, 2, 1, 0, 3),
(10, 'images/680679car10.jpg', 2, 2, 1, 1, 3),
(11, 'images/942166car11.jpg', 2, 2, 1, 2, 3),
(12, 'images/83071car12.jpg', 2, 2, 1, 3, 3),
(13, 'images/337912680679car10.jpg', 2, 2, 1, 0, 4),
(14, 'images/340748690648blog5.jpg', 2, 2, 1, 1, 4),
(15, 'images/321998725007car5.jpg', 2, 2, 1, 2, 4),
(16, 'images/510439742110blog2.jpg', 2, 2, 1, 3, 4),
(17, 'images/617784751378car2.jpg', 2, 2, 1, 4, 4),
(18, 'images/272426car6.jpg', 2, 2, 1, 0, 5),
(19, 'images/258189car7.jpg', 2, 2, 1, 1, 5),
(20, 'images/126759car8.jpg', 2, 2, 1, 2, 5),
(21, 'images/770311car9.jpg', 2, 2, 1, 3, 5),
(22, 'images/505774272426car6.jpg', 2, 2, 1, 0, 6),
(23, 'images/874211296176car1.jpg', 2, 2, 1, 1, 6),
(24, 'images/371326320443blog2.jpg', 2, 2, 1, 2, 6),
(25, 'images/860979343156car4.jpg', 2, 2, 1, 3, 6),
(26, 'images/458824408338car5.jpg', 2, 2, 1, 4, 6),
(27, 'images/444308car1.jpg', 2, 2, 1, 0, 11),
(28, 'images/423485car2.jpg', 2, 2, 1, 1, 11),
(29, 'images/127682car3.jpg', 2, 2, 1, 2, 11),
(30, 'images/926444car4.jpg', 2, 2, 1, 3, 11),
(31, 'images/960603car5.jpg', 2, 2, 1, 4, 11),
(32, 'images/194418458824408338car5.jpg', 2, 2, 1, 0, 14),
(33, 'images/951087505774272426car6.jpg', 2, 2, 1, 1, 14),
(34, 'images/904963510439742110blog2.jpg', 2, 2, 1, 2, 14),
(35, 'images/731795617784751378car2.jpg', 2, 2, 1, 3, 14),
(36, 'images/40237833560blog1 - copy.jpg', 2, 2, 1, 0, 14),
(37, 'images/95183637797car9 - copy.jpg', 2, 2, 1, 1, 14),
(38, 'images/78432237797car9.jpg', 2, 2, 1, 2, 14),
(39, 'images/84943383071car12 - copy.jpg', 2, 2, 1, 3, 14),
(40, 'images/10547733560blog1 - copy.jpg', 2, 2, 1, 0, 15),
(41, 'images/69914637797car9 - copy.jpg', 2, 2, 1, 1, 15),
(42, 'images/28976795509car1.jpg', 2, 2, 1, 2, 15),
(43, 'images/538697214196car7.jpg', 2, 2, 1, 3, 15),
(44, 'images/502213272426car6.jpg', 2, 2, 1, 4, 15),
(45, 'images/918340car2.jpg', 2, 2, 1, 0, 19),
(46, 'images/976579car3.jpg', 2, 2, 1, 1, 19),
(47, 'images/133469car4.jpg', 2, 2, 1, 2, 19),
(48, 'images/820669car5.jpg', 2, 2, 1, 3, 19),
(49, 'images/403809logo.jpg', 2, 2, 1, 0, 25),
(50, 'images/601483car2.jpg', 2, 2, 1, 0, 26),
(51, 'images/747245car3.jpg', 2, 2, 1, 1, 26),
(52, 'images/801168car4.jpg', 2, 2, 1, 2, 26),
(53, 'images/882531car10.jpg', 2, 2, 1, 3, 26),
(54, 'images/664144214196car7.jpg', 2, 2, 1, 0, 27),
(55, 'images/333315230049car4.jpg', 2, 2, 1, 1, 27),
(56, 'images/674107258189car7.jpg', 2, 2, 1, 2, 27),
(57, 'images/786118272426car6.jpg', 2, 2, 1, 3, 27),
(58, 'images/234935car.jpg', 2, 2, 1, 0, 29),
(59, 'images/696883car.jpg', 2, 2, 1, 0, 30),
(60, 'images/772901car2.jpg', 2, 2, 1, 1, 30),
(61, 'images/907759car.jpg', 2, 2, 1, 0, 30),
(62, 'images/186324car2.jpg', 2, 2, 1, 1, 30),
(63, 'images/210333car3.jpg', 2, 2, 1, 0, 30),
(64, 'images/779934car3.jpg', 2, 2, 1, 0, 30),
(65, 'images/886010car2.jpg', 2, 2, 1, 0, 30),
(66, 'images/961737car3.jpg', 2, 2, 1, 1, 30),
(67, 'images/723166car2.jpg', 2, 2, 1, 0, 30),
(68, 'images/506620car3.jpg', 2, 2, 1, 1, 30),
(69, 'images/309871car2.jpg', 2, 2, 1, 0, 30),
(70, 'images/82448car3.jpg', 2, 2, 1, 1, 30),
(71, 'images/338095car2.jpg', 2, 2, 1, 0, 30),
(72, 'images/790871car3.jpg', 2, 2, 1, 1, 30),
(73, 'images/438954car2.jpg', 2, 2, 1, 0, 30),
(74, 'images/911995car3.jpg', 2, 2, 1, 1, 30),
(75, 'images/687738car2.jpg', 2, 2, 1, 0, 30),
(76, 'images/369543car3.jpg', 2, 2, 1, 1, 30),
(77, 'images/471383car2.jpg', 2, 2, 1, 0, 30),
(78, 'images/880747car3.jpg', 2, 2, 1, 1, 30),
(79, 'images/592182car2.jpg', 2, 2, 1, 0, 30),
(80, 'images/723625car2.jpg', 2, 2, 1, 0, 30),
(81, 'images/106978car2.jpg', 2, 2, 1, 0, 30),
(82, 'images/820138car3.jpg', 2, 2, 1, 1, 30),
(83, 'images/909527banner1.jpg', 2, 2, 1, 0, 31),
(84, 'images/462996banner1.jpg', 2, 2, 1, 0, 31),
(85, 'images/906052banner1.jpg', 2, 2, 1, 0, 0),
(86, 'images/6729142018%2f09%2f13%2ff8%2fb8e27b3b340b4147b86c0d1c2cd7d1b5.67978.jpg%2f1200x630.jpg', 2, 2, 1, 0, 33),
(87, 'images/8121292018%2f09%2f13%2ff8%2fb8e27b3b340b4147b86c0d1c2cd7d1b5.67978.jpg%2f1200x630.jpg', 2, 2, 1, 0, 33),
(88, 'images/5593912018%2f09%2f13%2ff8%2fb8e27b3b340b4147b86c0d1c2cd7d1b5.67978.jpg%2f1200x630.jpg', 2, 2, 1, 0, 33),
(89, 'images/466734234935car.jpg', 2, 2, 1, 0, 35),
(90, 'images/470434car2.jpg', 2, 2, 1, 0, 38),
(91, 'images/4812231.jpg', 2, 2, 1, 1, 38),
(92, 'images/9861703.jpg', 2, 2, 1, 2, 38),
(93, 'images/709719car.jpg', 2, 2, 1, 0, 39),
(94, 'images/314089index.jpg', 2, 2, 1, 0, 41),
(105, 'images/8341131.jpg', 2, 2, 1, 0, 45),
(106, 'images/6115482.jpg', 2, 2, 1, 1, 45),
(107, 'images/6222483.jpg', 2, 2, 1, 2, 45),
(108, 'images/3196194.jpg', 2, 2, 1, 3, 45),
(109, 'images/1617395.jpg', 2, 2, 1, 4, 45),
(140, 'images/3753601.jpg', 2, 2, 1, 0, 45),
(141, 'images/5107892.jpg', 2, 2, 1, 1, 45),
(142, 'images/714073.jpg', 2, 2, 1, 2, 45),
(143, 'images/3711564.jpg', 2, 2, 1, 3, 45),
(144, 'images/9116561.jpg', 2, 2, 1, 0, 45),
(145, 'images/3538892.jpg', 2, 2, 1, 1, 45),
(146, 'images/8951143.jpg', 2, 2, 1, 2, 45),
(147, 'images/469404.jpg', 2, 2, 1, 3, 45),
(148, 'images/8770555.jpg', 2, 2, 1, 4, 45),
(149, 'images/6556531.jpg', 2, 2, 1, 0, 47),
(150, 'images/1030912.jpg', 2, 2, 1, 1, 47),
(151, 'images/971593.jpg', 2, 2, 1, 2, 47),
(152, 'images/2204854.jpg', 2, 2, 1, 3, 47),
(153, 'images/1209025.jpg', 2, 2, 1, 4, 47),
(154, 'images/721773.jpg', 2, 2, 1, 0, 47),
(155, 'images/7750924.jpg', 2, 2, 1, 1, 47),
(156, 'images/850980a.jpg', 2, 2, 1, 0, 49),
(157, 'images/753350b.jpg', 2, 2, 1, 1, 49),
(158, 'images/849304c.jpg', 2, 2, 1, 2, 49),
(159, 'images/517128d.jpg', 2, 2, 1, 3, 49),
(160, 'images/902840e.jpg', 2, 2, 1, 4, 49),
(161, 'images/64222f.jpg', 2, 2, 1, 5, 49),
(162, 'images/947710g.jpg', 2, 2, 1, 0, 50),
(163, 'images/996500h.jpg', 2, 2, 1, 1, 50),
(164, 'images/763102i.jpg', 2, 2, 1, 2, 50),
(165, 'images/362597j.jpg', 2, 2, 1, 3, 50),
(166, 'images/460876k.jpg', 2, 2, 1, 4, 50),
(167, 'images/325790l.jpg', 2, 2, 1, 5, 50),
(168, 'images/8594493e85f467272d44158ec5308044109280.jpg', 1, 2, 1, 0, 51),
(169, 'images/40729159c8870ba1984c9a9b01cf5550165a5a.jpg', 2, 2, 1, 1, 51),
(170, 'images/148893715e15614df140159b3dc52e40bdf6bd.jpg', 1, 2, 1, 2, 51),
(171, 'images/869941b850cd470b424cc3a8b8ce1c441dd1a4.jpg', 2, 2, 1, 3, 51),
(172, 'images/923729g.jpg', 2, 2, 1, 0, 52),
(173, 'images/556067h.jpg', 2, 2, 1, 1, 52),
(174, 'images/6625341.jpg', 2, 2, 1, 0, 52),
(175, 'images/5870492.jpg', 2, 2, 1, 1, 52),
(176, 'images/3971383.jpg', 2, 2, 1, 2, 52),
(177, 'images/3348603e85f467272d44158ec5308044109280.jpg', 2, 2, 1, 3, 52),
(178, 'images/8661544.jpg', 2, 2, 1, 4, 52),
(179, 'images/2705215.jpg', 2, 2, 1, 5, 52),
(180, 'images/65633159c8870ba1984c9a9b01cf5550165a5a.jpg', 2, 2, 1, 6, 52),
(181, 'images/444650715e15614df140159b3dc52e40bdf6bd.jpg', 2, 2, 1, 7, 52),
(182, 'images/302829a.jpg', 2, 2, 1, 8, 52),
(183, 'images/687746b.jpg', 2, 2, 1, 9, 52),
(184, 'images/751542.jpg', 2, 2, 1, 0, 52),
(185, 'images/7723884.jpg', 2, 2, 1, 1, 52),
(186, 'images/562785b850cd470b424cc3a8b8ce1c441dd1a4.jpg', 2, 2, 1, 2, 52),
(187, 'images/804663c.jpg', 2, 2, 1, 3, 52),
(188, 'images/201991.jpg', 2, 2, 1, 0, 52),
(189, 'images/2483472.jpg', 2, 2, 1, 1, 52),
(190, 'images/3155303.jpg', 2, 2, 1, 2, 52),
(191, 'images/370483c.jpg', 2, 2, 1, 0, 52),
(192, 'images/607917d.jpg', 2, 2, 1, 1, 52),
(193, 'images/11566e.jpg', 2, 2, 1, 2, 52),
(194, 'images/66978c.jpg', 2, 2, 1, 0, 52),
(195, 'images/152892d.jpg', 2, 2, 1, 1, 52),
(196, 'images/702415e.jpg', 2, 2, 1, 2, 52),
(197, 'images/7401752.jpg', 2, 2, 1, 0, 52),
(198, 'images/7589583.jpg', 2, 2, 1, 1, 52),
(199, 'images/87865a.jpg', 2, 2, 1, 2, 52);

-- --------------------------------------------------------

--
-- Table structure for table `car_lkptbody_type`
--

CREATE TABLE `car_lkptbody_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `isactiveynid` int(11) NOT NULL DEFAULT 1,
  `isdeletedynid` int(11) NOT NULL DEFAULT 2,
  `ordinal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car_lkptbody_type`
--

INSERT INTO `car_lkptbody_type` (`id`, `name`, `isactiveynid`, `isdeletedynid`, `ordinal`) VALUES
(1, 'Car Derived Van', 1, 2, 1),
(2, 'Chassis Cab', 1, 2, 2),
(3, 'Combi Van', 1, 2, 3),
(4, 'Convertible', 1, 2, 4),
(5, 'Coupe', 1, 2, 5),
(6, 'Crew cab', 1, 2, 6),
(7, 'Dropside', 1, 2, 7),
(8, 'Estate', 1, 2, 8),
(9, 'Glass van', 1, 2, 9),
(10, 'Gran coupe', 1, 2, 10),
(11, 'Hatchback', 1, 2, 11),
(12, 'Hearse', 1, 2, 12);

-- --------------------------------------------------------

--
-- Table structure for table `car_lkptcolour`
--

CREATE TABLE `car_lkptcolour` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `isactiveynid` int(11) NOT NULL DEFAULT 1,
  `isdeletedynid` int(11) NOT NULL DEFAULT 2,
  `ordinal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `car_lkptcolour`
--

INSERT INTO `car_lkptcolour` (`id`, `name`, `isactiveynid`, `isdeletedynid`, `ordinal`) VALUES
(1, 'Beige', 1, 2, 1),
(2, 'Black', 1, 2, 2),
(3, 'Blue', 1, 2, 3),
(4, 'Bronze', 1, 2, 4),
(5, 'Brown', 1, 2, 5),
(6, 'Burgundy', 1, 2, 6),
(7, 'Gold', 1, 2, 7),
(8, 'Silver', 1, 2, 8),
(9, 'White', 1, 2, 9),
(10, 'Yellow', 1, 2, 10),
(11, 'Grey', 1, 2, 11),
(12, 'Navy', 1, 2, 12),
(13, 'magenta', 1, 2, 13);

-- --------------------------------------------------------

--
-- Table structure for table `car_lkptfuel_type`
--

CREATE TABLE `car_lkptfuel_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `isactiveynid` int(11) NOT NULL DEFAULT 1,
  `isdeletedynid` int(11) NOT NULL DEFAULT 2,
  `ordinal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `car_lkptfuel_type`
--

INSERT INTO `car_lkptfuel_type` (`id`, `name`, `isactiveynid`, `isdeletedynid`, `ordinal`) VALUES
(1, 'BI FUEL', 1, 2, 1),
(2, 'DIESEL', 1, 2, 2),
(3, 'DIESEL HYBRID', 1, 2, 3),
(4, 'ELECTRIC', 1, 2, 4),
(5, 'HYDROGEN', 1, 2, 5),
(6, 'PETROL', 1, 2, 6),
(7, 'PETROL HYBRID', 1, 2, 7),
(8, 'NATURAL GAS', 1, 2, 8),
(9, 'PETROL ETHANOL', 1, 2, 9);

-- --------------------------------------------------------

--
-- Table structure for table `car_lkpttransmission`
--

CREATE TABLE `car_lkpttransmission` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `isactiveynid` int(11) NOT NULL DEFAULT 1,
  `isdeletedynid` int(11) NOT NULL DEFAULT 2,
  `ordinal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car_lkpttransmission`
--

INSERT INTO `car_lkpttransmission` (`id`, `name`, `isactiveynid`, `isdeletedynid`, `ordinal`) VALUES
(1, 'Automatic', 1, 2, 1),
(2, 'Manual', 1, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `car_make`
--

CREATE TABLE `car_make` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `isactiveynid` int(11) NOT NULL DEFAULT 1,
  `isdeletedynid` int(11) NOT NULL DEFAULT 2,
  `ordinal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car_make`
--

INSERT INTO `car_make` (`id`, `name`, `isactiveynid`, `isdeletedynid`, `ordinal`) VALUES
(1, 'Honda', 1, 2, 1),
(2, 'Toyota', 1, 2, 2),
(3, 'Audi', 1, 2, 3),
(4, 'BMW', 1, 2, 4),
(5, 'Nissan', 1, 2, 5),
(6, 'Land Rover', 1, 2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `car_model`
--

CREATE TABLE `car_model` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `isactiveynid` int(11) NOT NULL DEFAULT 1,
  `car_makeid` int(11) NOT NULL,
  `isdeletedynid` int(11) NOT NULL DEFAULT 2,
  `ordinal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car_model`
--

INSERT INTO `car_model` (`id`, `name`, `isactiveynid`, `car_makeid`, `isdeletedynid`, `ordinal`) VALUES
(1, 'Civic', 1, 1, 2, 1),
(2, 'CR-V', 1, 1, 2, 2),
(3, 'Accord', 1, 1, 2, 3),
(4, 'Land Cruiser', 1, 2, 2, 1),
(5, 'Camry', 1, 2, 2, 2),
(6, 'Corolla', 1, 2, 2, 3),
(7, 'A1', 1, 3, 2, 1),
(8, 'A2', 1, 3, 2, 2),
(9, 'A3', 1, 3, 2, 3),
(10, '1series', 1, 4, 2, 1),
(11, '2series', 1, 4, 2, 2),
(12, '3series', 1, 4, 2, 3),
(13, 'Juke', 1, 5, 2, 1),
(14, '370Z', 1, 5, 2, 2),
(15, 'Almera', 1, 5, 2, 3),
(16, 'Defender', 1, 6, 2, 1),
(17, 'Discovery', 1, 6, 2, 2),
(18, 'Freelander', 1, 6, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `car_package`
--

CREATE TABLE `car_package` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `adDisplayWeek` int(11) NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `isActive_ynid` int(11) NOT NULL DEFAULT 1,
  `isdeleted_ynid` int(11) NOT NULL DEFAULT 2,
  `isvisibleid` int(11) NOT NULL DEFAULT 1,
  `ordinal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car_package`
--

INSERT INTO `car_package` (`id`, `name`, `adDisplayWeek`, `price`, `isActive_ynid`, `isdeleted_ynid`, `isvisibleid`, `ordinal`) VALUES
(24, 'Ultimate', 100, '74.95', 1, 2, 1, 1),
(25, 'Premium', 6, '58.95', 1, 2, 1, 2),
(26, 'Standard', 3, '46.95', 1, 2, 1, 3),
(27, 'Basic', 2, '36.95', 1, 2, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `car_trim`
--

CREATE TABLE `car_trim` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `car_variantid` int(11) NOT NULL,
  `isactiveynid` int(11) NOT NULL DEFAULT 1,
  `isdeletedynid` int(11) NOT NULL DEFAULT 2,
  `ordinal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car_trim`
--

INSERT INTO `car_trim` (`id`, `name`, `car_variantid`, `isactiveynid`, `isdeletedynid`, `ordinal`) VALUES
(1, 'Not Sure', 1, 1, 2, 1),
(2, 'CRX', 1, 1, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `car_user`
--

CREATE TABLE `car_user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `google_id` varchar(255) DEFAULT NULL,
  `isActive_ynid` int(11) NOT NULL DEFAULT 1,
  `isdeleted_ynid` int(11) NOT NULL DEFAULT 2,
  `ordinal` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car_user`
--

INSERT INTO `car_user` (`id`, `name`, `type_id`, `email`, `password`, `remember_token`, `google_id`, `isActive_ynid`, `isdeleted_ynid`, `ordinal`, `updated_at`) VALUES
(1, 'Areeb Ur Rehman', 1, 'areeburrehman13@gmail.com', '$2y$10$bmVTE2Kq.IKMNKXqJwg2/.nWkXLEJYR9f03KndF1EHLowE0PLBjhi', NULL, NULL, 1, 2, 0, '2019-10-18 09:43:04'),
(14, 'tariq', 2, 'tariq.riaz@eitsec.co.uk', '$2y$10$30KLhNaGC.tJYDpyU6JdYu5Vz0FUBqmsaOYrgZ2vPAIdn5sa/bYDi', NULL, NULL, 1, 2, 0, '2019-10-18 09:43:04'),
(32, 'Ali Ali', 1, 'shaamey@gmail.com', '$2y$10$NKKPcUKvnoao5V82uz3J5OiUHrVwQ6oP7AwikFlQPyXYgJ11BN7H.', NULL, NULL, 1, 2, 0, '2019-10-18 09:43:04'),
(34, 'Jim', 2, 'jim.morris@logoinn.com', '$2y$10$JFJZ4CLTY2OgtiaYQY7nbu6Esq84FV4NgB3DJoCNQLScTJFNnUV1W', NULL, NULL, 1, 2, 0, '2019-10-18 09:43:04');

-- --------------------------------------------------------

--
-- Table structure for table `car_variant`
--

CREATE TABLE `car_variant` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `car_modelid` int(11) NOT NULL,
  `isactiveynid` int(11) NOT NULL DEFAULT 1,
  `isdeletedynid` int(11) NOT NULL DEFAULT 2,
  `ordinal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car_variant`
--

INSERT INTO `car_variant` (`id`, `name`, `car_modelid`, `isactiveynid`, `isdeletedynid`, `ordinal`) VALUES
(1, 'Coupe', 1, 1, 2, 1),
(2, 'Hatchback', 1, 1, 2, 2),
(3, 'Estate', 1, 1, 2, 3),
(4, 'SUV mk1', 2, 1, 2, 1),
(5, 'SUV mk2', 2, 1, 2, 2),
(6, 'SUV mk3 facelit', 2, 1, 2, 3),
(7, 'ES GT', 3, 1, 2, 1),
(8, 'EXECUTIVE', 3, 1, 2, 2),
(9, 'SPORT', 3, 1, 2, 3),
(10, 'ICON', 4, 1, 2, 1),
(11, 'LC4', 4, 1, 2, 2),
(12, 'LC5', 4, 1, 2, 3),
(13, 'CDX', 5, 1, 2, 1),
(14, 'DESIGN', 5, 1, 2, 2),
(15, 'EXCEL', 6, 1, 2, 1),
(16, 'CoD', 7, 1, 2, 1),
(17, 'SPORT', 7, 1, 2, 2),
(18, 'S LINE', 7, 1, 2, 3),
(19, 'FSI', 8, 1, 2, 1),
(20, 'TFSI', 9, 1, 2, 1),
(21, 'TDI', 9, 1, 2, 2),
(22, '116D', 10, 1, 2, 1),
(23, '118D', 10, 1, 2, 2),
(24, 'M SPORT', 11, 1, 2, 1),
(25, '320D', 12, 1, 2, 1),
(26, 'ACENTA', 13, 1, 2, 1),
(27, 'TEKNA', 13, 1, 2, 2),
(28, 'GT', 14, 1, 2, 1),
(29, 'SX', 15, 1, 2, 1),
(30, 'COUNTY', 16, 1, 2, 1),
(31, 'HSE LUXURY', 17, 1, 2, 1),
(32, 'SD V6', 17, 1, 2, 2),
(33, 'SD4', 17, 1, 2, 3),
(34, 'ADVENTURE', 18, 1, 2, 1),
(35, 'FREESTYLE', 18, 1, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('areeburrehman13@gmail.com', '$2y$10$x5MCYMczlr1Q7dD6hYI8k.CDFo8suOoppQr90ehBiy7ym2mp4tz4.', '2019-10-10 13:13:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Areeb Ur Rehman', 'areeburrehman13@gmail.com', NULL, '$2y$10$2kNZbpzS3dyoYkgd1X6Yy.yEL7NZNq7bRpt/3THU.CQz2ig2kGubO', NULL, '2019-10-18 13:41:03', '2019-10-18 13:41:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_info`
--
ALTER TABLE `account_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_type`
--
ALTER TABLE `account_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carpkg_features`
--
ALTER TABLE `carpkg_features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carpkg_features_details`
--
ALTER TABLE `carpkg_features_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_ad`
--
ALTER TABLE `car_ad`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `carregistrationnumber` (`carregistrationnumber`);

--
-- Indexes for table `car_ad_feature_`
--
ALTER TABLE `car_ad_feature_`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_ad_pkg`
--
ALTER TABLE `car_ad_pkg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_derivative`
--
ALTER TABLE `car_derivative`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_feature`
--
ALTER TABLE `car_feature`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_images`
--
ALTER TABLE `car_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_lkptbody_type`
--
ALTER TABLE `car_lkptbody_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_lkptcolour`
--
ALTER TABLE `car_lkptcolour`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_lkptfuel_type`
--
ALTER TABLE `car_lkptfuel_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_lkpttransmission`
--
ALTER TABLE `car_lkpttransmission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_make`
--
ALTER TABLE `car_make`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_model`
--
ALTER TABLE `car_model`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_package`
--
ALTER TABLE `car_package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_trim`
--
ALTER TABLE `car_trim`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_user`
--
ALTER TABLE `car_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_variant`
--
ALTER TABLE `car_variant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`(191));

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_info`
--
ALTER TABLE `account_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `account_type`
--
ALTER TABLE `account_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `carpkg_features`
--
ALTER TABLE `carpkg_features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `carpkg_features_details`
--
ALTER TABLE `carpkg_features_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `car_ad`
--
ALTER TABLE `car_ad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `car_ad_feature_`
--
ALTER TABLE `car_ad_feature_`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=257;

--
-- AUTO_INCREMENT for table `car_ad_pkg`
--
ALTER TABLE `car_ad_pkg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `car_derivative`
--
ALTER TABLE `car_derivative`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `car_feature`
--
ALTER TABLE `car_feature`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `car_images`
--
ALTER TABLE `car_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;

--
-- AUTO_INCREMENT for table `car_lkptbody_type`
--
ALTER TABLE `car_lkptbody_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `car_lkptcolour`
--
ALTER TABLE `car_lkptcolour`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `car_lkptfuel_type`
--
ALTER TABLE `car_lkptfuel_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `car_lkpttransmission`
--
ALTER TABLE `car_lkpttransmission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `car_make`
--
ALTER TABLE `car_make`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `car_model`
--
ALTER TABLE `car_model`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `car_package`
--
ALTER TABLE `car_package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `car_trim`
--
ALTER TABLE `car_trim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `car_user`
--
ALTER TABLE `car_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `car_variant`
--
ALTER TABLE `car_variant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
