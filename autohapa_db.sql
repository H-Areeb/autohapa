-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 04, 2020 at 08:45 PM
-- Server version: 10.3.23-MariaDB-log-cll-lve
-- PHP Version: 7.3.6

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

--
-- Dumping data for table `account_info`
--

INSERT INTO `account_info` (`id`, `companyName`, `firstName`, `lastName`, `phone`, `website`, `country`, `city`, `address`, `zipCode`, `about`, `pic`, `user_id`, `type_id`, `updated_at`) VALUES
(1, 'LogoINN', 'Areeb ', 'Ur Rehman', '92314546444', 'logoInn.com', 'Turkey', 'karachi', 'ceaser Tower', 64684984, 'there is something hidden ', 'images/customerstucks.jpeg', 1, 1, '2019-10-23 12:56:49'),
(2, NULL, 'Ali ALi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, '2019-10-23 14:53:15'),
(3, NULL, 'Jim', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, '2019-10-23 16:27:07'),
(4, NULL, 'tariq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, '2019-10-23 17:03:09'),
(5, NULL, 'ITsec', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, 1, '2019-10-24 08:24:02'),
(6, NULL, 'itsec', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 1, '2019-10-24 08:52:37'),
(7, NULL, 'ITsec pak', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, 1, '2019-10-24 10:50:46'),
(8, NULL, 'ITsec pak', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 13, 1, '2019-10-24 11:15:58'),
(9, NULL, 'tr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14, 1, '2019-10-31 18:02:45'),
(10, NULL, 'ffff', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 15, 1, '2019-11-01 10:40:01'),
(11, NULL, 'Amir', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 1, '2019-11-01 14:16:47'),
(12, NULL, 'hadasda', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, 1, '2019-11-01 15:07:48'),
(13, NULL, 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 1, '2019-11-01 15:43:30'),
(14, NULL, 'tariq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1, '2019-11-01 17:27:37'),
(26, NULL, 'fdfxded', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 31, 1, '2019-11-04 13:33:29'),
(27, NULL, 'abcd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 32, 1, '2019-11-04 13:52:32'),
(28, 'undefined', 'tariq', 'riaz', '', 'undefined', 'United Kingdom', 'abc', 'address', 0, 'le2 0pf', NULL, 33, 1, '2019-11-04 14:56:17'),
(29, NULL, 'danny', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 34, 1, '2019-11-04 18:36:31'),
(30, NULL, 'khizar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 35, 1, '2019-11-06 15:01:27'),
(31, '', 'Areeb', 'Wilson', '92346448464', '', 'United Kingdom', 'abu dhabi', 'house# 17/5G , Clyton Quarters , jahangeer road no', 74550, '', 'images/customers2.jpg', 36, 1, '2019-12-19 13:22:56'),
(32, NULL, 'abcd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 37, 1, '2020-01-17 10:39:02');

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
  `type_id` int(11) NOT NULL,
  `newOrUsed` int(1) NOT NULL DEFAULT 2,
  `car_makeid` int(11) NOT NULL,
  `car_modelid` int(11) NOT NULL,
  `car_variantid` int(11) DEFAULT NULL,
  `car_trimid` int(11) DEFAULT NULL,
  `car_derivativeid` int(11) DEFAULT NULL,
  `car_bodytypeid` int(11) DEFAULT NULL,
  `car_transmissionid` int(11) DEFAULT NULL,
  `car_fueltypeid` int(11) DEFAULT NULL,
  `car_colourid` int(11) NOT NULL,
  `enginecc` varchar(20) DEFAULT NULL,
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
  `iscompleted` int(11) NOT NULL DEFAULT 2,
  `isadminapproved_id` int(11) NOT NULL DEFAULT 2,
  `isdeleteyn_id` int(1) NOT NULL DEFAULT 2,
  `ordinal` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car_ad`
--

INSERT INTO `car_ad` (`id`, `carregistrationnumber`, `type_id`, `newOrUsed`, `car_makeid`, `car_modelid`, `car_variantid`, `car_trimid`, `car_derivativeid`, `car_bodytypeid`, `car_transmissionid`, `car_fueltypeid`, `car_colourid`, `enginecc`, `dateoffirstregistration`, `price`, `adtitle`, `adsubtitle`, `ownersqty`, `servicehistoryid`, `MOTduedate`, `adverttext`, `contactnumber`, `contactsecondarynumber`, `buyercontactbyemailynid`, `locationofcarpostalcode`, `car_milage`, `customer_id`, `iscompleted`, `isadminapproved_id`, `isdeleteyn_id`, `ordinal`, `updated_at`) VALUES
(1, '8204950', 1, 2, 1, 1, 1, 1, 2, 2, 2, 3, 3, NULL, '2019-09-13', 59000.00, 'HondaCivic1.6 CRX Coupe 3dr Petrol Manual (125 bhp', 'history example', 1, 3, '2019-09-06', 'amazing gorgeous car', '96456315384', '', 0, 'le2 0pf', 2549, 1, 1, 1, 2, 0, '2019-10-18 09:41:59'),
(2, '9874563', 1, 2, 1, 1, 1, 2, 3, 1, 1, 1, 2, NULL, '2019-09-05', 26000.00, 'HondaCivic1.6 CRX Coupe 3dr Petrol Manual (130 bhp', 'small history', 1, 1, '2019-09-05', 'this is second entry in table ', '9654284631', '', 0, 'le2 opf', 1574, 2, 1, 1, 2, 0, '2019-10-18 09:41:59'),
(3, '4654646', 1, 2, 1, 1, 1, 1, 3, 1, 1, 3, 1, NULL, '2019-10-11', 35000.00, 'HondaCivic1.6 CRX Coupe 3dr Petrol Manual (130 bhp', 'history available', 3, 2, '2019-10-18', 'Audi A3 great drive which benefits from central locking, cd/radio, clean interior, history, Mot Till 24/07/2020, Smoke free, Pet free, Recent MOT Nationwide Delivery Option Available... Part Ex Considered... Grey, 5  owners, Â£899', '03151551515', '', 0, 'a12345', 22000, 1, 1, 1, 2, 0, '2019-10-18 09:41:59'),
(4, '396548726', 1, 2, 1, 1, 1, 2, 2, 3, 2, 3, 4, NULL, '2019-10-03', 45000.00, 'HondaCivic1.6 CRX Coupe 3dr Petrol Manual (125 bhp', 'LOW MILEAGE AUTO CONVERTIBLE', 2, 3, '1970-01-09', 'Audi A3 great drive which benefits from central locking, cd/radio, clean interior, history, Mot Till 24/07/2020, Smoke free, Pet free, Recent MOT Nationwide Delivery Option Available... Part Ex Considered... Grey, 5  owners, Â£899', '926457945465', '', 0, 'a12345', 1500, 1, 1, 1, 2, 0, '2019-10-18 09:41:59'),
(5, '325445615', 1, 2, 1, 1, 1, 2, 1, 1, 1, 2, 1, NULL, '2019-10-03', 66000.00, 'HondaCivic1.6 CRX Coupe 3dr Petrol Manual (125 bhp', 'LOW MILEAGE AUTO CONVERTIBLE', 2, 1, '0000-00-00', 'Audi A3 great drive which benefits from central locking, cd/radio, clean interior, history, Mot Till 24/07/2020, Smoke free, Pet free, Recent MOT Nationwide Delivery Option Available... Part Ex Considered... Grey, 5  owners, Â£899', '96547852185', '', 0, 'le2 0pf', 20000, 2, 1, 1, 2, 0, '2019-10-18 09:41:59'),
(6, '87549521', 1, 2, 1, 1, 1, 1, 1, 1, 2, 1, 1, NULL, '2019-10-09', 50000.00, 'HondaCivic1.5 CRX Coupe 3dr Petrol Manual (100 bhp', 'history available', 3, 2, '2019-10-10', 'This Honda Jazz 1.3 EX Navi CVT (Chrome Pack) is brand new and in stock at Holden Honda, Norwich. Other colours may be available to choose from! , , This model also benefits from having the Chrome Pack pre-installed, which includes Front Lower Decoration, Tailgate Decoration and Window Decorations., , Holden Honda\'s retail price includes a deposit contribution of Â£1000 if the vehicle is financed through Honda Financial Services. , ,', '032356456486', '', 0, 'a12345', 2000, 1, 1, 1, 2, 0, '2019-10-18 09:41:59'),
(11, '92265465', 1, 2, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, '2019-10-04', 47000.00, 'HondaCivic1.5 CRX Coupe 3dr Petrol Manual (100 bhp', 'history is available', 2, 2, '2019-10-10', 'This Honda Jazz 1.3 EX Navi CVT (Chrome Pack) is brand new and in stock at Holden Honda, Norwich. Other colours may be available to choose from! , , This model also benefits from having the Chrome Pack pre-installed, which includes Front Lower Decoration, Tailgate Decoration and Window Decorations., , Holden Honda\'s retail price includes a deposit contribution of Â£1000 if the vehicle is financed through Honda Financial Services. , ,', '0321465842', '', 0, 'a12345', 10000, 2, 1, 1, 2, 0, '2019-10-18 09:41:59'),
(14, '8764646', 1, 2, 1, 1, 1, 1, 1, 2, 1, 1, 1, NULL, '2019-10-09', 745044.00, 'HondaCivic1.5 CRX Coupe 3dr Petrol Manual (100 bhp', 'full history available', 3, 2, '2019-10-17', 'This Honda Jazz 1.3 EX Navi CVT (Chrome Pack) is brand new and in stock at Holden Honda, Norwich. Other colours may be available to choose from! , , This model also benefits from having the Chrome Pack pre-installed, which includes Front Lower Decoration, Tailgate Decoration and Window Decorations., , Holden Honda\'s retail price includes a deposit contribution of Â£1000 if the vehicle is financed through Honda Financial Services. , ,', '03245152654', '', 0, 'a12345', 2000, 1, 1, 1, 2, 0, '2019-10-18 09:41:59'),
(15, '5646646', 1, 2, 1, 1, 1, 1, 1, 1, 1, 1, 2, NULL, '2019-10-09', 80000.00, 'HondaCivic1.5 CRX Coupe 3dr Petrol Manual (100 bhp', '', 1, 0, '0000-00-00', '', '', '', 0, 'a12345', 2000, 1, 1, 1, 2, 0, '2019-10-18 09:41:59'),
(26, 'u8998758493', 1, 2, 2, 6, 10, 1, 1, 6, 1, 6, 10, NULL, '2019-10-01', 54620.00, 'ToyotaCorolla 1.5 CRX Coupe 3dr Petrol Manual ', 'history available', 2, 2, '2019-10-10', 'Excellent Condition Civic With Full ', '0321351456', '', 0, 'le2 0pf', 45546, 1, 1, 1, 1, 0, '2019-10-18 09:41:59'),
(27, '54564894', 1, 2, 3, 7, 17, 1, 1, 6, 1, 4, 11, NULL, '2019-10-07', 10000.00, 'AudiA11.5 CRX Coupe 3dr Petrol Manual (100 bhp)', 'history available', 3, 2, '2019-10-02', 'Excellent Condition Civic With Full ', '02118148448', '', 0, 'a1234', 2000, 1, 1, 1, 1, 0, '2019-10-18 09:41:59'),
(29, '848446846', 1, 2, 2, 4, 11, 1, 1, 8, 1, 2, 1, NULL, '2019-10-10', 5000.00, 'ToyotaLand Cruiser1.5 CRX Coupe 3dr Petrol Manual ', 'history available', 4, 2, '2019-10-09', 'Excellent Condition Civic With Full ', '032145454454', '', 0, 'le2 0pf', 20000, 1, 1, 1, 1, 0, '2019-10-18 09:41:59'),
(38, '875456411', 1, 1, 1, 3, 9, 1, 1, 2, 1, 6, 7, NULL, '2019-10-02', 55000.00, 'HondaAccord1.5 CRX Coupe 3dr Petrol Manual (100 bh', 'GOOD HISTORY*TOP SPEC', 3, 1, '2019-10-02', 'Excellent Condition Accord With Full ', '035126544448', '', 0, 'a12345', 3000, 1, 1, 1, 2, 0, '2019-10-18 09:41:59'),
(39, 'Reg. No:', 1, 2, 1, 1, 1, 1, 1, 11, 1, 4, 2, NULL, '2019-08-26', 2500.00, 'HondaCivic1.5 CRX Coupe 3dr Petrol Manual (100 bhp', 'Subtitle: ', 1, 0, '0000-00-00', 'This will appear at the top of your ad. Use it to persuade buyers to read further.', '01255888', '', 0, '2580000', 0, 33, 1, 1, 2, 0, '2019-10-18 09:41:59'),
(41, '121', 1, 2, 2, 4, 10, 1, 1, 11, 1, 7, 10, NULL, '2019-10-10', 3000.00, 'ToyotaLand Cruiser1.5 CRX Coupe 3dr Petrol Manual ', 'AZC', 1, 0, '0000-00-00', 'This will appear at the top of your ad. Use it to persuade buyers to read further.', '02086069911', '', 0, 'ub1 1su', 1222, 34, 1, 1, 2, 0, '2019-10-18 09:41:59'),
(49, '97543148', 1, 1, 3, 9, 20, 1, 1, 7, 1, 7, 8, NULL, '2019-10-02', 9955.00, 'AudiA31.5 CRX Coupe 3dr Petrol Manual (100 bhp)', 'Full Service history Long MOT', 3, 2, '2019-10-18', 'Low Mileage, Excellent Example Audi A3 1.6 petrol Starts and drives wonderful smooth silky gearbox handles so well. Full service history Very Clean inside and out Best colour combo Sky blue with Beautiful suede interior. Been a very reliable car for me new company car and lost of parking space forc', '923454767614', '', 0, 'le2 0pf', 9000, 14, 1, 1, 2, 0, '2019-10-18 20:11:12'),
(50, '97524334', 1, 2, 4, 10, 22, 1, 1, 2, 2, 3, 12, NULL, '2019-10-02', 45000.00, 'BMW1series1.5 CRX Coupe 3dr Petrol Manual (100 bhp', 'Southend-On-Sea 108 miles away', 3, 1, '2019-10-02', 'Very clean and well looked after car, it has proven to be a very reliable car for the past 2 years. It was serviced regularly. Has good tyres all, chain and water pump has already been done . It has a long mot. , Smoke free, Pet free, Recent MOT Next MOT due 10/08/2020, Part service history, Blue,', '03185486489', '', 0, 'le2 0pf', 1000, 1, 1, 2, 2, 0, '2019-10-18 09:41:59'),
(51, '7548314', 1, 1, 5, 14, 28, 1, 1, 3, 1, 2, 9, NULL, '2019-10-08', 33000.00, 'Nissan370Z1.5 CRX Coupe 3dr Petrol Manual (100 bhp', 'FSH NISMOKIT 750BHP LITCHFIELD', 3, 2, '2019-10-09', 'CARBON SPOILER. .HEATED LEATHER SEATS. .R20 ALLOYS. .BOSE SOUND SYSTEM. .BLUE SPEEDOMETER DIAL. .MAGNETIC SUSPENSION. .ELECTRIC BI-FOLDING MIRROR. OUR FINANCE SPECIALIST WILL HELP IN HOUSE WILL GET YOU APPROVAL WITHIN 30MINS. PICK ANY CAR FROM OUR WIDE RANGE OF STOCK ON OUR WEBSITE ALTERNATIVELY WE', '02313514648', '', 0, 'a12345', 6000, 1, 1, 1, 2, 0, '2019-10-23 14:27:50'),
(53, '465561561', 1, 2, 6, 16, 30, 1, 1, 9, 1, 5, 4, NULL, '2019-10-09', 85000.00, 'Land RoverDefender1.5 CRX Coupe 3dr Petrol Manual ', 'Utility Wagon With Heated Seat', 1, 1, '2019-10-03', 'Ref. YX61UXS - This stunning Land Rover Defender 110 has 42k recorded miles and has 5 seats, air conditioning, alloy wheels, electric windows, front fog lights and heated seats. All stock at David Spear Commercial Vehicles undergo a 97-point pre-delivery inspection by mechanics with over 20 years o', '032545444844', '', 0, 'le2 0pf', 2000, 1, 1, 2, 2, 0, '2019-10-19 13:43:39'),
(54, '84844123', 1, 2, 1, 2, 5, 1, 1, 8, 2, 6, 2, NULL, '2019-10-10', 85000.00, 'HondaCR-V1.5 CRX Coupe 3dr Petrol Manual (100 bhp)', 'history is available', 3, 2, '2019-10-02', 'thyis is my car and i want to sell it in actual price and i]this is my last price i ', '038484831449', '', 0, 'le2 0pf', 20000, 1, 1, 1, 2, 0, '2019-11-04 22:16:51'),
(66, '514561165', 2, 1, 7, 24, NULL, NULL, NULL, 15, NULL, NULL, 3, '2000', '2019-10-10', 8000.00, 'Ducati 1198 Super Sports', 'history available', 2, 1, '2019-10-09', 'MOT valid until 23 September 2020 - fully HPI clear plus a GOV.UK DVLA mileage history check - Our friendly staff are happy to help, you may ask for information regarding the vehicles service history, owners and condition, just phone us on 016 171 304 35. This vehicle is available to view immediatel', '0312651848', '', 0, 'le2 0pf', 2000, 1, 1, 1, 2, 0, '2019-11-02 19:17:39'),
(67, '64813513', 2, 1, 8, 22, NULL, NULL, NULL, 15, NULL, NULL, 2, '850', '2019-10-08', 87000.00, 'Suzuki Katana 1000  Super Sports', 'part time service', 3, 2, '0000-00-00', 'Finance available, APPLY ONLINE NOW AT: superbikefactory.finance NATIONWIDE DELIVERY AVAILABLE, Debit ', '53148648148', '', 0, 'a12345', 3000, 1, 1, 1, 2, 0, '2019-11-02 19:17:16'),
(68, '76846464', 1, 2, 1, 1, 1, 1, 1, 1, 1, 1, 2, '', '2019-11-01', 84464.00, 'HondaCivic1.5 CRX Coupe 3dr Petrol Manual (100 bhp', '', 1, 0, '0000-00-00', '', '', '', 0, '', 2000, 1, 2, 2, 2, 0, '2019-11-01 13:28:45'),
(69, 'sss', 2, 1, 7, 23, 0, 0, 0, 13, 0, 0, 12, 'sss', '2019-11-07', 2500.00, 'Ducati 848 Classic', '', 1, 0, '0000-00-00', 'sss', 'sssss', '', 0, 'sss', 0, 19, 2, 2, 2, 0, '2019-11-01 21:30:54'),
(71, 'Tr', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '', '2019-11-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sss', '', 0, 'sss', 0, NULL, 2, 2, 2, 0, '2019-11-01 18:13:01'),
(72, '45464113', 2, 2, 8, 21, NULL, NULL, 0, 14, NULL, NULL, 12, '200', '2019-11-01', 85000.00, 'Suzuki GSXR750 Sports tourer', 'bike with all Features', 3, 1, '2019-11-01', 'CARBON SPOILER. .HEATED LEATHER SEATS. .R20 ALLOYS. .BOSE SOUND SYSTEM. .BLUE SPEEDOMETER DIAL. .MAGNETIC SUSPENSION. .ELECTRIC BI-FOLDING MIRROR. OUR FINANCE SPECIALIST WILL HELP IN HOUSE WILL GET YOU APPROVAL WITHIN 30MINS. PICK ANY CAR FROM OUR WIDE RANGE OF STOCK ON OUR WEBSITE ALTERNATIVELY WE', '021051561561', '', 0, 'le2 0pf', 2000, 1, 1, 1, 2, 0, '2019-11-02 19:14:02'),
(73, '456446464', 2, 2, 7, 23, NULL, NULL, NULL, 15, NULL, NULL, 2, '2000', '2019-11-05', 8000.00, 'Ducati 848 Super Sports', 'full features', 2, 1, '2019-11-06', 'CARBON SPOILER. .HEATED LEATHER SEATS. .R20 ALLOYS. .BOSE SOUND SYSTEM. .BLUE SPEEDOMETER DIAL. .MAGNETIC SUSPENSION. .ELECTRIC BI-FOLDING MIRROR. OUR FINANCE SPECIALIST WILL HELP IN HOUSE WILL GET YOU APPROVAL WITHIN 30MINS. PICK ANY CAR FROM OUR WIDE RANGE OF STOCK ON OUR WEBSITE ALTERNATIVELY WE', '023151544968', '', 0, 'le2 0pf', 5000, 1, 1, 1, 2, 0, '2019-11-02 19:31:50'),
(75, 'TR10', 1, 1, 6, 16, 30, 1, 1, 1, 1, 1, 1, '', '2019-09-08', 2500.00, 'Land RoverDefender1.5 CRX Coupe 3dr Petrol Manual ', 'Subtitle', 1, 0, '0000-00-00', 'aaaa', '0128888', '', 0, '1111', 2500, 33, 1, 1, 2, 0, '2019-11-04 21:57:35'),
(77, 'test23', 1, 2, 2, 4, 10, 1, 1, 1, 1, 1, 2, '', '2019-11-03', 8500.00, 'ToyotaLand Cruiser1.5 CRX Coupe 3dr Petrol Manual ', 'Subtitle', 1, 0, '0000-00-00', 'sss', '458888', '', 0, '44', 1500, 33, 1, 2, 1, 0, '2019-11-04 23:45:44'),
(78, 'c456dc5', 1, 2, 3, 7, 16, 1, 1, 3, 1, 2, 3, '', '2019-11-05', 50000.00, '', '', 0, 0, '0000-00-00', '', '', '', 0, '', 2000, 0, 2, 2, 2, 0, '2019-11-06 16:18:05'),
(79, 'fg546440', 3, 2, 9, 25, 1, 2, 1, 17, 2, 11, 2, '', '2019-11-06', 550000.00, 'Citroen Berlingo 1.6 1000 Enterprise 5dr', '', 0, 0, '0000-00-00', '2008 (58 reg) | Panel Van | Standard cab | SWB | 184,319 miles | 1.6L | 90bhp | Manual', '', '', 0, '', 30000, 0, 1, 1, 2, 0, '2019-11-19 14:42:35'),
(80, 'Asd8542144', 3, 1, 10, 28, 1, 1, 1, 18, 1, 11, 2, '', '2019-11-01', 685200.00, 'Fort Tourneo courier Combi van', 'full services available', 2, 1, '2019-11-01', '2015 (65) SWB Ford Transit Custom presented in superb condition throughout with high viz markings (can be removed)! Specification Includes SWB, remote central Locking, ABS, PAS, FM Radio, Bluetooth Audio USB/AUX Connectivity. Electric Windows, On Board Computer, Bluetooth Telephone, ', '86544613894', '', 0, 'le2 0pf', 2000, 1, 1, 1, 2, 0, '2019-11-20 13:53:26'),
(81, 'rgrgtrg', 1, 2, 4, 10, 22, 1, 1, 11, 2, 6, 3, '', '2019-12-05', 80000.00, 'BMW1series1.5 CRX Coupe 3dr Petrol Manual (100 bhp', 'best selling car in 2017 ', 1, 2, '2019-12-04', 'Full Mot History  1 Year AA Cover And the car Drive smoothly, Next MOT due 26/10/2020, Clean bodywork, Interior - Clean Condition, Tyre condition Good, Silver, 3 owners, We are OPEN 7 DAYS A WEEK 10AM-7PM, 149-151 RED LION ROAD ,SURBITON,SURREY,KT6 7RQ, Â£1,499 p/x welcome', '754861316164', '692548646848', 0, 'le2 0pf', 6400, 1, 1, 1, 2, 0, '2019-12-19 15:21:07'),
(82, 'r8425Ly', 2, 2, 7, 23, 0, 0, 0, 15, 0, 0, 9, '696', '2019-12-12', 2691.00, 'Ducati 848 Super Sports', 'best selling bike in 2016', 2, 2, '2019-12-05', 'Finance available, APPLY ONLINE NOW AT: superbikefactory.finance NATIONWIDE DELIVERY AVAILABLE, Debit ', '96544434346', '', 0, 'le20pf', 2000, 1, 1, 1, 2, 0, '2019-12-19 15:58:28'),
(83, '8541def', 1, 1, 5, 13, 1, 1, 1, 9, 1, 7, 10, '', '2019-12-18', 85499.00, 'NissanJuke1.5 CRX Coupe 3dr Petrol Manual (100 bhp', '', 1, 0, '0000-00-00', '', '03208204950', '', 0, '74550', 20000, 36, 1, 2, 1, 0, '2019-12-19 18:40:25'),
(84, '637hf33', 1, 1, 1, 1, 1, 1, 2, 4, 2, 5, 5, '', '2019-11-28', 58400.00, 'HondaCivic1.6 CRX Coupe 3dr Petrol Manual (125 bhp', 'history available', 2, 1, '2020-01-15', '', '984684464644', '', 0, 'le2 0pf', 2000, 36, 1, 1, 2, 0, '2020-01-16 18:48:44'),
(87, '637hf36', 1, 1, 3, 7, 17, 1, 1, 6, 1, 4, 3, '', '2019-12-18', 85000.00, 'AudiA11.5 CRX Coupe 3dr Petrol Manual (100 bhp)', '', 1, 2, '2020-01-04', 'This will appear at the top of your ad. Use it to persuade buyers to read further', '846464646434', '', 0, 'le2 0pf', 2000, 36, 1, 2, 2, 0, '2020-01-17 10:06:53'),
(88, '6565454', 2, 1, 7, 23, 0, 0, 0, 14, 0, 0, 3, '696', '2019-12-12', 2000.00, 'Ducati 848 Sports tourer', '', 1, 0, '0000-00-00', '', '246448464646', '', 0, 'le2 0pf', 2000, 36, 1, 2, 2, 0, '2020-01-17 10:30:29'),
(89, 'aik1234', 1, 1, 4, 11, 24, 1, 1, 4, 2, 2, 7, '', '2019-12-05', 85000.00, 'BMW2series1.5 CRX Coupe 3dr Petrol Manual (100 bhp', '', 1, 0, '0000-00-00', '', '486464468444', '', 0, 'le20pf', 15000, 37, 1, 2, 2, 0, '2020-01-17 10:38:18');

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
(245, 50, 22),
(257, 53, 4),
(258, 53, 6),
(259, 53, 8),
(260, 53, 9),
(261, 53, 10),
(262, 53, 11),
(263, 53, 12),
(264, 53, 13),
(265, 53, 14),
(266, 53, 15),
(267, 53, 17),
(268, 53, 2),
(269, 53, 18),
(270, 53, 23),
(271, 54, 3),
(272, 54, 6),
(273, 54, 8),
(274, 54, 9),
(275, 54, 10),
(276, 54, 11),
(277, 54, 14),
(278, 54, 16),
(279, 54, 17),
(280, 54, 21),
(281, 54, 2),
(282, 54, 22),
(284, 68, 20),
(285, 0, 20),
(287, 77, 20),
(288, 80, 24),
(289, 80, 25),
(290, 80, 26),
(291, 80, 27),
(292, 80, 28),
(293, 80, 29),
(294, 80, 31),
(310, 83, 20),
(354, 89, 20);

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
(71, 38, 25),
(72, 53, 25),
(73, 53, 25),
(74, 53, 25),
(75, 53, 25),
(76, 54, 25),
(77, 66, 24),
(78, 67, 24),
(79, 69, 24),
(80, 69, 25),
(81, 69, 26),
(82, 72, 24),
(83, 72, 24),
(84, 73, 24),
(85, 75, 25),
(86, 77, 27),
(87, 79, 25),
(88, 80, 24),
(89, 81, 24),
(90, 82, 26),
(91, 83, 26),
(92, 84, 25),
(93, 87, 24),
(94, 88, 25),
(95, 89, 26);

-- --------------------------------------------------------

--
-- Table structure for table `car_derivative`
--

CREATE TABLE `car_derivative` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `car_variantid` int(11) DEFAULT NULL,
  `car_modelid` int(11) DEFAULT NULL,
  `car_makeid` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `ordinal` int(11) NOT NULL,
  `isactiveynid` int(11) NOT NULL DEFAULT 1,
  `isdeletedynid` int(11) NOT NULL DEFAULT 2,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car_derivative`
--

INSERT INTO `car_derivative` (`id`, `name`, `car_variantid`, `car_modelid`, `car_makeid`, `type_id`, `ordinal`, `isactiveynid`, `isdeletedynid`, `updated_at`, `created_at`) VALUES
(1, '1.5 CRX Coupe 3dr Petrol Manual (100 bhp)', 1, 1, 1, 1, 1, 1, 2, '2019-11-22 19:51:20', '2019-11-22 19:51:20'),
(2, '1.6 CRX Coupe 3dr Petrol Manual (125 bhp)', 1, 1, 1, 1, 2, 1, 2, '2019-11-22 19:51:20', '2019-11-22 19:51:20'),
(3, '1.6 CRX Coupe 3dr Petrol Manual (130 bhp)', 1, 1, 1, 1, 3, 1, 2, '2019-11-25 15:19:41', '2019-11-22 19:51:20');

-- --------------------------------------------------------

--
-- Table structure for table `car_feature`
--

CREATE TABLE `car_feature` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `type_id` int(11) NOT NULL,
  `isactiveynid` int(11) NOT NULL DEFAULT 1,
  `isdeletedynid` int(11) NOT NULL DEFAULT 2,
  `controltypeid` int(11) NOT NULL,
  `parentid` int(11) DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car_feature`
--

INSERT INTO `car_feature` (`id`, `name`, `type_id`, `isactiveynid`, `isdeletedynid`, `controltypeid`, `parentid`, `updated_at`, `created_at`) VALUES
(1, 'Electric sunroof', 1, 1, 2, 2, 2, '2019-11-18 09:26:54', '2019-11-18 09:26:54'),
(2, 'Manual sunroof', 1, 1, 2, 2, 1, '2019-11-18 09:26:54', '2019-11-18 09:26:54'),
(3, 'Electric windows', 1, 1, 2, 1, 0, '2019-11-18 09:26:54', '2019-11-18 09:26:54'),
(4, 'Air conditioning', 1, 1, 2, 1, 0, '2019-11-18 09:26:54', '2019-11-18 09:26:54'),
(5, 'Satellite navigation', 1, 1, 2, 1, 0, '2019-11-18 09:26:54', '2019-11-18 09:26:54'),
(6, 'Parking aid', 1, 1, 2, 1, 0, '2019-11-18 09:26:54', '2019-11-18 09:26:54'),
(7, 'DVD', 1, 1, 2, 1, 0, '2019-11-18 09:26:54', '2019-11-18 09:26:54'),
(8, 'MP3 player', 1, 1, 2, 1, 0, '2019-11-18 09:26:54', '2019-11-18 09:26:54'),
(9, 'CD player', 1, 1, 2, 1, 0, '2019-11-18 09:26:54', '2019-11-18 09:26:54'),
(10, 'Bluetooth', 1, 1, 2, 1, 0, '2019-11-18 09:26:54', '2019-11-18 09:26:54'),
(11, 'Leather trim', 1, 1, 2, 1, 0, '2019-11-18 09:26:54', '2019-11-18 09:26:54'),
(12, 'Heated seats', 1, 1, 2, 1, 0, '2019-11-18 09:26:54', '2019-11-18 09:26:54'),
(13, 'Height adjustable driver\'s seat', 1, 1, 2, 1, 0, '2019-11-18 09:26:54', '2019-11-18 09:26:54'),
(14, 'Height adjustable passenger seat', 1, 1, 2, 1, 0, '2019-11-18 09:26:54', '2019-11-18 09:26:54'),
(15, 'Folding rear seats', 1, 1, 2, 1, 0, '2019-11-18 09:26:54', '2019-11-18 09:26:54'),
(16, 'Child seat points (Isofix system)', 1, 1, 2, 1, 0, '2019-11-18 09:26:54', '2019-11-18 09:26:54'),
(17, 'Sports seats', 1, 1, 2, 1, 0, '2019-11-18 09:26:54', '2019-11-18 09:26:54'),
(18, 'Metallic paint', 1, 1, 2, 2, 0, '2019-11-18 09:26:54', '2019-11-18 09:26:54'),
(19, 'Pearlescent paint', 1, 1, 2, 2, 0, '2019-11-18 09:26:54', '2019-11-18 09:26:54'),
(20, 'Alloy Wheels', 1, 1, 2, 3, 0, '2019-11-18 09:26:54', '2019-11-18 09:26:54'),
(21, 'Spare wheel (Full)', 1, 1, 2, 1, 0, '2019-11-18 09:26:54', '2019-11-18 09:26:54'),
(22, '13\" Alloy Wheels', 1, 1, 2, 3, 0, '2019-11-18 09:26:54', '2019-11-18 09:26:54'),
(23, '14\" Alloy Wheels', 1, 1, 2, 3, 0, '2019-11-18 14:56:14', '2019-11-18 09:26:54'),
(24, '\'Guide me home\' headlights', 3, 1, 2, 1, NULL, '2019-11-20 08:43:35', '2019-11-20 08:43:35'),
(25, '15\" steel wheels', 3, 1, 2, 1, NULL, '2019-11-20 08:43:49', '2019-11-20 08:43:49'),
(26, 'Auto relocking', 3, 1, 2, 1, NULL, '2019-11-20 08:44:02', '2019-11-20 08:44:02'),
(27, 'Moulded cab headlining', 3, 1, 2, 1, NULL, '2019-11-20 08:44:15', '2019-11-20 08:44:15'),
(28, 'Full wheelcovers', 3, 1, 2, 1, NULL, '2019-11-20 08:44:38', '2019-11-20 08:44:38'),
(29, 'Drivers airbag', 3, 1, 2, 1, NULL, '2019-11-20 08:44:54', '2019-11-20 08:44:54'),
(30, 'Tinted glass', 3, 1, 2, 3, NULL, '2019-11-20 08:45:48', '2019-11-20 08:45:48'),
(31, 'Tie-down loops', 3, 1, 2, 3, NULL, '2019-11-20 08:46:00', '2019-11-20 08:46:00'),
(32, 'Trip computer REF:MY9MC', 3, 1, 2, 3, NULL, '2019-11-20 08:46:20', '2019-11-20 08:46:20');

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
(151, 'images/971593.jpg', 1, 2, 1, 2, 47),
(152, 'images/2204854.jpg', 2, 1, 1, 3, 47),
(153, 'images/1209025.jpg', 2, 2, 1, 4, 47),
(154, 'images/721773.jpg', 2, 2, 1, 0, 47),
(155, 'images/7750924.jpg', 2, 2, 1, 1, 47),
(156, 'images/850980a.jpg', 2, 2, 1, 0, 49),
(157, 'images/753350b.jpg', 2, 1, 1, 1, 49),
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
(169, 'images/40729159c8870ba1984c9a9b01cf5550165a5a.jpg', 1, 2, 1, 1, 51),
(170, 'images/148893715e15614df140159b3dc52e40bdf6bd.jpg', 1, 2, 1, 2, 51),
(171, 'images/869941b850cd470b424cc3a8b8ce1c441dd1a4.jpg', 1, 2, 1, 3, 51),
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
(199, 'images/87865a.jpg', 2, 2, 1, 2, 52),
(200, 'images/3783133b2845bbce544d40a4ae9773d9e98dbe.jpg', 2, 2, 1, 0, 53),
(201, 'images/6743476b66735686064d53b70a35189bb8d195.jpg', 2, 2, 1, 1, 53),
(202, 'images/5328878f5038fa001d43b39bcbfeb06434a22d.jpg', 2, 2, 1, 2, 53),
(203, 'images/86635651fc59d35bf54038a11a93faff314310.jpg', 2, 2, 1, 3, 53),
(204, 'images/481477d11dba32ba774018821af49bf7d61ec2.jpg', 2, 2, 1, 4, 53),
(205, 'images/333902f2e16f956e374c8b8b9643fbfc0fb1f9.jpg', 2, 2, 1, 5, 53),
(206, 'images/1953626b66735686064d53b70a35189bb8d195.jpg', 2, 2, 1, 0, 54),
(207, 'images/9436168f5038fa001d43b39bcbfeb06434a22d.jpg', 2, 2, 1, 1, 54),
(208, 'images/21179751fc59d35bf54038a11a93faff314310.jpg', 2, 2, 1, 2, 54),
(209, 'images/175194capture - copy.png', 2, 2, 1, 0, 59),
(210, 'images/9447761.jpg', 2, 2, 1, 0, 66),
(211, 'images/6674662.jpg', 2, 2, 1, 1, 66),
(212, 'images/2179153.jpg', 2, 2, 1, 2, 66),
(213, 'images/5585964.jpg', 2, 2, 1, 3, 66),
(214, 'images/2980235.jpg', 2, 2, 1, 4, 66),
(215, 'images/5165770a3a0c1a4fcf48c9ba7cdf4a0c99d323.jpg', 2, 2, 1, 0, 67),
(216, 'images/3597545e2565d7527746128f370de13f323040.jpg', 2, 2, 1, 1, 67),
(217, 'images/6527515934d589c66f454db70995eb381135ed.jpg', 2, 2, 1, 2, 67),
(218, 'images/3870838961ee5ec4d7423aaff3a6d5abe99dc9.jpg', 2, 2, 1, 3, 67),
(219, 'images/8417165641411cfb454b7bbbb3357470b80189.jpg', 2, 2, 1, 4, 67),
(220, 'images/362427d098eb9ac3724ce494b1e7c3baa428dd.jpg', 2, 2, 1, 5, 67),
(221, 'images/389427logo.jpg', 1, 2, 1, 0, 69),
(222, 'images/669380car.jpg', 2, 2, 1, 0, 0),
(223, 'images/873504car.jpg', 2, 2, 1, 0, 71),
(228, 'images/5236572.jpg', 2, 2, 1, 0, 72),
(229, 'images/3204653.jpg', 2, 2, 1, 1, 72),
(230, 'images/212635e2565d7527746128f370de13f323040.jpg', 2, 2, 1, 2, 72),
(231, 'images/2057275641411cfb454b7bbbb3357470b80189.jpg', 2, 2, 1, 3, 72),
(232, 'images/482226d098eb9ac3724ce494b1e7c3baa428dd.jpg', 2, 2, 1, 4, 72),
(242, 'images/1280968961ee5ec4d7423aaff3a6d5abe99dc9.jpg', 2, 2, 1, 0, 73),
(243, 'images/7814065641411cfb454b7bbbb3357470b80189.jpg', 2, 2, 1, 1, 73),
(244, 'images/139536car.jpg', 1, 2, 1, 0, 75),
(245, 'images/750516car.jpg', 1, 2, 1, 0, 77),
(246, 'images/195756van1.jpg', 1, 2, 1, 0, 79),
(247, 'images/5943351.jpg', 1, 2, 1, 0, 80),
(248, 'images/2275532.jpg', 1, 2, 1, 1, 80),
(249, 'images/7955533.jpg', 1, 2, 1, 2, 80),
(250, 'images/9374674.jpg', 1, 2, 1, 3, 80),
(251, 'images/6510685.jpg', 1, 2, 1, 4, 80),
(252, 'images/8823191.jpg', 1, 2, 1, 0, 81),
(253, 'images/8928862.jpg', 1, 2, 1, 1, 81),
(254, 'images/3495593.jpg', 1, 2, 1, 2, 81),
(255, 'images/2088054.jpg', 1, 2, 1, 3, 81),
(256, 'images/1895145.jpg', 1, 2, 1, 4, 81),
(257, 'images/4328661.jpg', 1, 2, 1, 0, 82),
(258, 'images/7303992.jpg', 1, 2, 1, 1, 82),
(259, 'images/7155153.jpg', 1, 2, 1, 2, 82),
(260, 'images/5947654.jpg', 1, 2, 1, 3, 82),
(261, 'images/4955475.jpg', 2, 2, 1, 4, 82),
(262, 'images/1720562.jpg', 2, 2, 1, 0, 83),
(263, 'images/5133645.jpg', 2, 2, 1, 1, 83),
(264, 'images/5137641 - copy.jpg', 1, 2, 1, 0, 84),
(265, 'images/8616992 - copy.jpg', 2, 2, 1, 1, 84),
(266, 'images/8327772.jpg', 2, 2, 1, 2, 84),
(267, 'images/791123 - copy.jpg', 2, 2, 1, 3, 84),
(268, 'images/1727555 - copy.jpg', 2, 2, 1, 4, 84),
(269, 'images/2043223.jpg', 2, 2, 1, 0, 87),
(270, 'images/8173014.jpg', 2, 2, 1, 1, 87),
(271, 'images/829511.jpg', 2, 2, 1, 0, 88),
(272, 'images/966792.jpg', 2, 2, 1, 1, 88),
(273, 'images/3196543.jpg', 2, 2, 1, 2, 88),
(274, 'images/8669962.jpg', 2, 2, 1, 0, 88),
(275, 'images/7077563.jpg', 2, 2, 1, 1, 88),
(276, 'images/9649124.jpg', 2, 2, 1, 2, 88),
(277, 'images/548361.jpg', 2, 2, 1, 0, 89),
(278, 'images/6709232.jpg', 2, 2, 1, 1, 89),
(279, 'images/1618372.jpg', 2, 2, 1, 0, 89),
(280, 'images/5801933.jpg', 2, 2, 1, 1, 89),
(281, 'images/9704514.jpg', 2, 2, 1, 2, 89),
(282, 'images/1935125.jpg', 2, 2, 1, 3, 89);

-- --------------------------------------------------------

--
-- Table structure for table `car_lkptbody_type`
--

CREATE TABLE `car_lkptbody_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type_id` int(11) DEFAULT NULL,
  `isactiveynid` int(11) NOT NULL DEFAULT 1,
  `isdeletedynid` int(11) NOT NULL DEFAULT 2,
  `ordinal` int(11) DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car_lkptbody_type`
--

INSERT INTO `car_lkptbody_type` (`id`, `name`, `type_id`, `isactiveynid`, `isdeletedynid`, `ordinal`, `updated_at`, `created_at`) VALUES
(1, 'Car Derived Van', 1, 1, 2, 1, '2019-11-18 09:35:32', '2019-11-18 09:35:32'),
(2, 'Chassis Cab', 1, 1, 2, 2, '2019-11-18 09:35:32', '2019-11-18 09:35:32'),
(3, 'Combi Van', 1, 1, 2, 3, '2019-11-18 09:35:32', '2019-11-18 09:35:32'),
(4, 'Convertible', 1, 1, 2, 4, '2019-11-18 09:35:32', '2019-11-18 09:35:32'),
(5, 'Coupe', 1, 1, 2, 5, '2019-11-18 09:35:32', '2019-11-18 09:35:32'),
(6, 'Crew cab', 1, 1, 2, 6, '2019-11-18 09:35:32', '2019-11-18 09:35:32'),
(7, 'Dropside', 1, 1, 2, 7, '2019-11-18 09:35:32', '2019-11-18 09:35:32'),
(8, 'Estate', 1, 1, 2, 8, '2019-11-18 09:35:32', '2019-11-18 09:35:32'),
(9, 'Glass van', 1, 1, 2, 9, '2019-11-18 09:35:32', '2019-11-18 09:35:32'),
(10, 'Gran coupe', 1, 1, 2, 10, '2019-11-18 09:35:32', '2019-11-18 09:35:32'),
(11, 'Hatchback', 1, 1, 2, 11, '2019-11-18 09:35:32', '2019-11-18 09:35:32'),
(12, 'Hearse', 1, 1, 2, 12, '2019-11-18 09:35:32', '2019-11-18 09:35:32'),
(13, 'Classic', 2, 1, 2, 1, '2019-11-18 09:35:32', '2019-11-18 09:35:32'),
(14, 'Sports tourer', 2, 1, 2, 2, '2019-11-18 09:35:32', '2019-11-18 09:35:32'),
(15, 'Super Sports', 2, 1, 2, 3, '2019-11-18 09:35:32', '2019-11-18 09:35:32'),
(16, 'Scooter', 2, 1, 2, 4, '2019-11-18 09:35:32', '2019-11-18 09:35:32'),
(17, 'Super Moto', 2, 1, 2, 5, '2019-11-18 14:55:10', '2019-11-18 09:35:32'),
(18, 'Combi van', 3, 1, 2, NULL, '2019-11-19 08:30:18', '2019-11-19 08:30:18'),
(19, 'Box van', 3, 1, 2, NULL, '2019-11-19 08:30:29', '2019-11-19 08:30:29'),
(20, 'Car Derived van', 3, 1, 2, NULL, '2019-11-19 08:30:50', '2019-11-19 08:30:50'),
(21, 'High roof van', 3, 1, 2, NULL, '2019-11-19 08:31:11', '2019-11-19 08:31:11');

-- --------------------------------------------------------

--
-- Table structure for table `car_lkptColour`
--

CREATE TABLE `car_lkptColour` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type_id` int(11) NOT NULL,
  `isactiveynid` int(11) NOT NULL DEFAULT 1,
  `isdeletedynid` int(11) NOT NULL DEFAULT 2,
  `ordinal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `car_lkptColour`
--

INSERT INTO `car_lkptColour` (`id`, `name`, `type_id`, `isactiveynid`, `isdeletedynid`, `ordinal`) VALUES
(1, 'Beige', 1, 1, 2, 1),
(2, 'Black', 1, 1, 2, 2),
(3, 'Blue', 1, 1, 2, 3),
(4, 'Bronze', 1, 1, 2, 4),
(5, 'Brown', 1, 1, 2, 5),
(6, 'Burgundy', 1, 1, 2, 6),
(7, 'Gold', 1, 1, 2, 7),
(8, 'Silver', 1, 1, 2, 8),
(9, 'White', 1, 1, 2, 9),
(10, 'Yellow', 1, 1, 2, 10),
(11, 'Grey', 1, 1, 2, 11),
(12, 'Navy', 1, 1, 2, 12),
(13, 'magenta', 1, 1, 2, 13);

-- --------------------------------------------------------

--
-- Table structure for table `car_lkptfuel_type`
--

CREATE TABLE `car_lkptfuel_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type_id` int(11) NOT NULL,
  `isactiveynid` int(11) NOT NULL DEFAULT 1,
  `isdeletedynid` int(11) NOT NULL DEFAULT 2,
  `ordinal` int(11) DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `car_lkptfuel_type`
--

INSERT INTO `car_lkptfuel_type` (`id`, `name`, `type_id`, `isactiveynid`, `isdeletedynid`, `ordinal`, `updated_at`, `created_at`) VALUES
(1, 'BI FUEL', 1, 1, 2, 1, '2019-11-18 09:34:22', '2019-11-18 09:34:22'),
(2, 'DIESEL', 1, 1, 2, 2, '2019-11-18 09:34:22', '2019-11-18 09:34:22'),
(3, 'DIESEL HYBRID', 1, 1, 2, 3, '2019-11-18 09:34:22', '2019-11-18 09:34:22'),
(4, 'ELECTRIC', 1, 1, 2, 4, '2019-11-18 09:34:22', '2019-11-18 09:34:22'),
(5, 'HYDROGEN', 1, 1, 2, 5, '2019-11-18 09:34:22', '2019-11-18 09:34:22'),
(6, 'PETROL', 1, 1, 2, 6, '2019-11-18 09:34:22', '2019-11-18 09:34:22'),
(7, 'PETROL HYBRID', 1, 1, 2, 7, '2019-11-18 09:34:22', '2019-11-18 09:34:22'),
(8, 'NATURAL GAS', 1, 1, 2, 8, '2019-11-18 09:34:22', '2019-11-18 09:34:22'),
(9, 'PETROL ETHANOL', 1, 1, 2, 9, '2019-11-18 14:56:58', '2019-11-18 09:34:22'),
(10, 'Diesel', 3, 1, 2, NULL, '2019-11-19 08:31:56', '2019-11-19 08:31:56'),
(11, 'Petrol', 3, 1, 2, NULL, '2019-11-19 08:32:03', '2019-11-19 08:32:03'),
(12, 'Unlisted', 3, 1, 2, NULL, '2019-11-19 08:32:14', '2019-11-19 08:32:14'),
(13, 'Bi fuel', 3, 1, 2, NULL, '2019-11-19 08:34:24', '2019-11-19 08:34:24'),
(14, 'Petrol Hybird', 3, 1, 2, NULL, '2019-11-25 10:05:42', '2019-11-19 08:36:14');

-- --------------------------------------------------------

--
-- Table structure for table `car_lkpttransmission`
--

CREATE TABLE `car_lkpttransmission` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type_id` int(11) NOT NULL,
  `isactiveynid` int(11) NOT NULL DEFAULT 1,
  `isdeletedynid` int(11) NOT NULL DEFAULT 2,
  `ordinal` int(11) DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car_lkpttransmission`
--

INSERT INTO `car_lkpttransmission` (`id`, `name`, `type_id`, `isactiveynid`, `isdeletedynid`, `ordinal`, `updated_at`, `created_at`) VALUES
(1, 'Automatic', 1, 1, 2, 1, '2019-11-18 09:32:28', '2019-11-18 09:32:28'),
(2, 'Manual', 1, 1, 2, 2, '2019-11-18 09:32:28', '2019-11-18 09:32:28');

-- --------------------------------------------------------

--
-- Table structure for table `car_make`
--

CREATE TABLE `car_make` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type_id` int(11) NOT NULL,
  `isactiveynid` int(11) NOT NULL DEFAULT 1,
  `isdeletedynid` int(11) NOT NULL DEFAULT 2,
  `ordinal` int(11) DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car_make`
--

INSERT INTO `car_make` (`id`, `name`, `type_id`, `isactiveynid`, `isdeletedynid`, `ordinal`, `updated_at`, `created_at`) VALUES
(1, 'Honda', 1, 1, 2, 1, '2019-11-18 09:28:58', '2019-11-18 09:28:58'),
(2, 'Toyota', 1, 1, 2, 2, '2019-11-18 09:28:58', '2019-11-18 09:28:58'),
(3, 'Audi', 1, 1, 2, 3, '2019-11-18 09:28:58', '2019-11-18 09:28:58'),
(4, 'BMW', 1, 1, 2, 4, '2019-11-18 09:28:58', '2019-11-18 09:28:58'),
(5, 'Nissan', 1, 1, 2, 5, '2019-11-18 09:28:58', '2019-11-18 09:28:58'),
(6, 'Land Rover', 1, 1, 2, 6, '2019-11-18 09:28:58', '2019-11-18 09:28:58'),
(7, 'Ducati', 2, 1, 2, 1, '2019-11-18 09:28:58', '2019-11-18 09:28:58'),
(8, 'Suzuki', 2, 1, 2, 2, '2019-11-18 14:57:32', '2019-11-18 09:28:58'),
(9, 'Citeron', 3, 1, 2, 1, '2019-11-19 08:25:09', '2019-11-19 08:25:09'),
(10, 'Fort', 3, 1, 2, 2, '2019-11-19 08:25:32', '2019-11-19 08:25:32'),
(11, 'Fiat', 3, 1, 2, 3, '2019-11-19 08:25:40', '2019-11-19 08:25:40'),
(12, 'Nissan', 3, 2, 2, 4, '2019-11-25 15:28:59', '2019-11-19 08:26:07');

-- --------------------------------------------------------

--
-- Table structure for table `car_model`
--

CREATE TABLE `car_model` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type_id` int(11) NOT NULL,
  `isactiveynid` int(11) NOT NULL DEFAULT 1,
  `car_makeid` int(11) NOT NULL,
  `isdeletedynid` int(11) NOT NULL DEFAULT 2,
  `ordinal` int(11) DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car_model`
--

INSERT INTO `car_model` (`id`, `name`, `type_id`, `isactiveynid`, `car_makeid`, `isdeletedynid`, `ordinal`, `updated_at`, `created_at`) VALUES
(1, 'Civic', 1, 1, 1, 2, 1, '2019-11-18 09:30:42', '2019-11-18 09:30:42'),
(2, 'CR-V', 1, 1, 1, 2, 2, '2019-11-18 09:30:42', '2019-11-18 09:30:42'),
(3, 'Accord', 1, 1, 1, 2, 3, '2019-11-18 09:30:42', '2019-11-18 09:30:42'),
(4, 'Land Cruiser', 1, 1, 2, 2, 1, '2019-11-18 09:30:42', '2019-11-18 09:30:42'),
(5, 'Camry', 1, 1, 2, 2, 2, '2019-11-18 09:30:42', '2019-11-18 09:30:42'),
(6, 'Corolla', 1, 1, 2, 2, 3, '2019-11-18 09:30:42', '2019-11-18 09:30:42'),
(7, 'A1', 1, 1, 3, 2, 1, '2019-11-18 09:30:42', '2019-11-18 09:30:42'),
(8, 'A2', 1, 1, 3, 2, 2, '2019-11-18 09:30:42', '2019-11-18 09:30:42'),
(9, 'A3', 1, 1, 3, 2, 3, '2019-11-18 09:30:42', '2019-11-18 09:30:42'),
(10, '1series', 1, 1, 4, 2, 1, '2019-11-18 09:30:42', '2019-11-18 09:30:42'),
(11, '2series', 1, 1, 4, 2, 2, '2019-11-18 09:30:42', '2019-11-18 09:30:42'),
(12, '3series', 1, 1, 4, 2, 3, '2019-11-18 09:30:42', '2019-11-18 09:30:42'),
(13, 'Juke', 1, 1, 5, 2, 1, '2019-11-18 09:30:42', '2019-11-18 09:30:42'),
(14, '370Z', 1, 1, 5, 2, 2, '2019-11-18 09:30:42', '2019-11-18 09:30:42'),
(15, 'Almera', 1, 1, 5, 2, 3, '2019-11-18 09:30:42', '2019-11-18 09:30:42'),
(16, 'Defender', 1, 1, 6, 2, 1, '2019-11-18 09:30:42', '2019-11-18 09:30:42'),
(17, 'Discovery', 1, 1, 6, 2, 2, '2019-11-18 09:30:42', '2019-11-18 09:30:42'),
(18, 'Freelander', 1, 1, 6, 2, 3, '2019-11-18 09:30:42', '2019-11-18 09:30:42'),
(21, 'GSXR750', 2, 1, 8, 2, 1, '2019-11-18 09:30:42', '2019-11-18 09:30:42'),
(22, 'Katana 1000 ', 2, 1, 8, 2, 2, '2019-11-18 09:30:42', '2019-11-18 09:30:42'),
(23, '848', 2, 1, 7, 2, 1, '2019-11-18 09:30:42', '2019-11-18 09:30:42'),
(24, '1198', 2, 1, 7, 2, 2, '2019-11-18 15:49:08', '2019-11-18 09:30:42'),
(25, 'Berlingo', 3, 1, 9, 2, NULL, '2019-11-19 08:27:18', '2019-11-19 08:27:18'),
(26, 'Dispatch', 3, 1, 9, 2, NULL, '2019-11-19 08:27:42', '2019-11-19 08:27:42'),
(27, 'Ranger', 3, 1, 10, 2, NULL, '2019-11-19 08:29:03', '2019-11-19 08:29:03'),
(28, 'Tourneo courier', 3, 2, 10, 2, 1, '2019-11-26 10:00:26', '2019-11-19 08:29:36');

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
(24, 'Ultimate', 100, 74.95, 1, 2, 1, 1),
(25, 'Premium', 6, 58.95, 1, 2, 1, 2),
(26, 'Standard', 3, 46.95, 1, 2, 1, 3),
(27, 'Basic', 2, 36.95, 1, 2, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `car_trim`
--

CREATE TABLE `car_trim` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type_id` int(11) NOT NULL,
  `car_variantid` int(11) NOT NULL,
  `isactiveynid` int(11) NOT NULL DEFAULT 1,
  `isdeletedynid` int(11) NOT NULL DEFAULT 2,
  `ordinal` int(11) NOT NULL,
  `car_makeid` int(11) NOT NULL,
  `car_modelid` int(11) DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car_trim`
--

INSERT INTO `car_trim` (`id`, `name`, `type_id`, `car_variantid`, `isactiveynid`, `isdeletedynid`, `ordinal`, `car_makeid`, `car_modelid`, `updated_at`, `created_at`) VALUES
(1, 'Not Sure', 1, 1, 1, 2, 1, 1, 1, '2019-11-25 15:25:46', '2019-11-25 15:25:46'),
(2, 'CRX', 1, 1, 1, 2, 2, 1, 1, '2019-11-25 15:25:46', '2019-11-25 15:25:46');

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
  `isActive_ynid` int(11) NOT NULL DEFAULT 0,
  `isdeleted_ynid` int(11) NOT NULL DEFAULT 2,
  `ordinal` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car_user`
--

INSERT INTO `car_user` (`id`, `name`, `type_id`, `email`, `password`, `remember_token`, `google_id`, `isActive_ynid`, `isdeleted_ynid`, `ordinal`, `updated_at`) VALUES
(1, 'Joy son', 1, 'support@logoinn.com', '$2y$10$tEpauaTn8fLjQEXqQ1YfHeksMaF1I30YE3/6VhpQh2N3x/WZn5iGG', NULL, NULL, 1, 2, 0, '2019-10-18 13:43:04'),
(2, 'tariq', 2, 'tariq.riaz1@eitsec.co.uk', '$2y$10$30KLhNaGC.tJYDpyU6JdYu5Vz0FUBqmsaOYrgZ2vPAIdn5sa/bYDi', NULL, NULL, 1, 2, 0, '2019-10-18 13:43:04'),
(3, 'Ali Ali', 1, 'shaamey@gmail.com', '$2y$10$NKKPcUKvnoao5V82uz3J5OiUHrVwQ6oP7AwikFlQPyXYgJ11BN7H.', NULL, NULL, 1, 2, 0, '2019-10-18 13:43:04'),
(4, 'Jim', 2, 'jim.morris@logoinn.com', '$2y$10$JFJZ4CLTY2OgtiaYQY7nbu6Esq84FV4NgB3DJoCNQLScTJFNnUV1W', NULL, NULL, 1, 2, 0, '2019-10-18 13:43:04'),
(32, 'abcd', 1, 'areeb.rehman@eitsec.co.uk22', '$2y$10$igMH0ZGAEEtR98lNDsk/8.6Y9GgfnoWS1scdnE52lNu5NV1QplqzO', '03AOLTBLS-kVLudtkCSXW7teVaPhtZ5frU8Ulq2Pg2C97uJkqdw7PdRvhd5Uj9-UQzXB-2DFyFdaak0JM4gnGcBtaXPk5ZEn6OEW', NULL, 1, 2, 0, '2019-11-04 13:52:32'),
(33, 'test', 1, 'tariq.riaz@eitsec.co.uk', '$2y$10$0wVv1hQGA6ovuh5A39MXZeR/xI3BTO2FJuYylMACChlCt.ccKtC1m', '03AOLTBLSOjmvhYctBKuqPYl7K0q_zRQbskGi9RpH5QzGtan_KV9fYO3czLuYJwwDwXd8YAZ7CATq_M72dhOc6MqXjiJaaKSBpPQ', NULL, 1, 2, 0, '2019-11-04 14:56:17'),
(34, 'danny', 1, 'danny.hopkins@logoinn.com', '$2y$10$M1F.h4KJYkfCcMOyTbAV9OiE7Fl3Lg8GdYFhsIzj/tvmJUWf6D.QC', '03AOLTBLQ1l7lQlH42Q8Iqr7tSKu9BRmnTjnqidgW-6wXvoRdEMtAFuMBq8xZ1-9bD3LMKZOSwZ4in1Vk-czadI9XIKSDZcmO-I_', NULL, 0, 2, 0, '2019-11-04 18:36:31'),
(35, 'khizar', 1, 'khizer.jawaid@eitsec.co.uk', '$2y$10$yUYwuhGkerljVHVtnxzDJOxWQKswge2rhFNRTXgGE0IAmlZzRC9Cm', '03AOLTBLTYdgy63CbNLhme4Po_bBkixCZD1dNec_SiOH36ud8--4PhEW5QkVCViIP-0DGf6gCuBvK9rf-2svVmENU8fO04gzNeAs', NULL, 1, 2, 0, '2019-11-06 15:01:27'),
(36, 'Mark', 1, 'areeb.rehman@eitsec.co.uk', '$2y$10$1BNYP/PluLs5BjMtiDJyf.p/qtWQ3lgjZvzeBarTttCy2g.576Wau', '03AOLTBLSW7GXQBdKtWwFyBStv0V1SsHjJDOJIcCSkwjxNJso3WuCyQUX-I7d8pQX00hHSY-xsi_Jo0nfG7WZ1qtv0c-E8Ku2nQ3', NULL, 1, 2, 0, '2019-12-19 13:22:56'),
(37, 'abcd', 1, 'areeb.rehman@eitsec.co.uk1', '$2y$10$LVI/vQautF93E0AgsnFIGu4nE8majVTiT4MC03H37076F2H2/hdVS', '03AOLTBLTeUKhmpY_38-JCbLWgClt77ZMAZ2uEP28uQMel5WPwtVYgBu2osCfXOdcFUx8xQn157Antd-DLkciuOO6DbLPaOZRS15', NULL, 0, 2, 0, '2020-01-17 10:39:02');

-- --------------------------------------------------------

--
-- Table structure for table `car_variant`
--

CREATE TABLE `car_variant` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type_id` int(11) NOT NULL,
  `car_makeid` int(11) NOT NULL,
  `car_modelid` int(11) DEFAULT NULL,
  `isactiveynid` int(11) NOT NULL DEFAULT 1,
  `isdeletedynid` int(11) NOT NULL DEFAULT 2,
  `ordinal` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car_variant`
--

INSERT INTO `car_variant` (`id`, `name`, `type_id`, `car_makeid`, `car_modelid`, `isactiveynid`, `isdeletedynid`, `ordinal`, `created_at`, `updated_at`) VALUES
(1, 'Coupe', 1, 1, 1, 1, 2, 1, '2019-11-21 20:33:41', '2019-11-21 20:33:41'),
(2, 'Hatchback', 1, 1, 1, 1, 2, 2, '2019-11-21 20:33:41', '2019-11-21 20:33:41'),
(3, 'Estate', 1, 1, 1, 1, 2, 3, '2019-11-21 20:33:41', '2019-11-21 20:33:41'),
(4, 'SUV mk1', 1, 1, 2, 1, 2, 1, '2019-11-21 20:33:41', '2019-11-21 20:33:41'),
(5, 'SUV mk2', 1, 1, 2, 1, 2, 2, '2019-11-21 20:33:41', '2019-11-21 20:33:41'),
(6, 'SUV mk3 facelit', 1, 2, 2, 1, 2, 3, '2019-11-21 20:33:41', '2019-11-21 20:33:41'),
(7, 'ES GT', 1, 2, 3, 1, 2, 1, '2019-11-21 20:33:41', '2019-11-21 20:33:41'),
(8, 'EXECUTIVE', 1, 2, 3, 1, 2, 2, '2019-11-21 20:33:41', '2019-11-21 20:33:41'),
(9, 'SPORT', 1, 2, 3, 1, 2, 3, '2019-11-21 20:33:41', '2019-11-21 20:33:41'),
(10, 'ICON', 1, 3, 4, 1, 2, 1, '2019-11-21 20:33:41', '2019-11-21 20:33:41'),
(11, 'LC4', 1, 3, 4, 1, 2, 2, '2019-11-21 20:33:41', '2019-11-21 20:33:41'),
(12, 'LC5', 1, 3, 4, 1, 2, 3, '2019-11-21 20:33:41', '2019-11-21 20:33:41'),
(13, 'CDX', 1, 3, 5, 1, 2, 1, '2019-11-21 20:33:41', '2019-11-21 20:33:41'),
(14, 'DESIGN', 1, 4, 5, 1, 2, 2, '2019-11-21 20:33:41', '2019-11-21 20:33:41'),
(15, 'EXCEL', 1, 4, 6, 1, 2, 1, '2019-11-21 20:33:41', '2019-11-21 20:33:41'),
(16, 'CoD', 1, 5, 7, 1, 2, 1, '2019-11-21 20:33:41', '2019-11-21 20:33:41'),
(17, 'SPORT', 1, 5, 7, 1, 2, 2, '2019-11-21 20:33:41', '2019-11-21 20:33:41'),
(18, 'S LINE', 1, 5, 7, 1, 2, 3, '2019-11-21 20:33:41', '2019-11-21 20:33:41'),
(19, 'FSI', 1, 5, 8, 1, 2, 1, '2019-11-21 20:33:41', '2019-11-21 20:33:41'),
(20, 'TFSI', 1, 4, 9, 1, 2, 1, '2019-11-21 20:33:41', '2019-11-21 20:33:41'),
(21, 'TDI', 1, 4, 9, 1, 2, 2, '2019-11-21 20:33:41', '2019-11-21 20:33:41'),
(22, '116D', 1, 4, 10, 1, 2, 1, '2019-11-21 20:33:41', '2019-11-21 20:33:41'),
(23, '118D', 1, 4, 10, 1, 2, 2, '2019-11-21 20:33:41', '2019-11-21 20:33:41'),
(24, 'M SPORT', 1, 6, 11, 1, 2, 1, '2019-11-21 20:33:41', '2019-11-21 20:33:41'),
(25, '320D', 1, 6, 12, 1, 2, 1, '2019-11-21 20:33:41', '2019-11-21 20:33:41'),
(26, 'ACENTA', 1, 6, 13, 1, 2, 1, '2019-11-21 20:33:41', '2019-11-21 20:33:41'),
(27, 'TEKNA', 1, 6, 13, 1, 2, 2, '2019-11-21 20:33:41', '2019-11-21 20:33:41'),
(28, 'GT', 1, 6, 14, 1, 2, 1, '2019-11-21 20:33:41', '2019-11-21 20:33:41'),
(29, 'SX', 1, 2, 15, 1, 2, 1, '2019-11-21 20:33:41', '2019-11-21 20:33:41'),
(30, 'VFR', 1, 3, 16, 1, 2, 1, '2019-11-21 20:33:41', '2019-11-21 20:33:41'),
(31, 'HSE LUXURY', 1, 4, 17, 1, 2, 1, '2019-11-21 20:33:41', '2019-11-21 20:33:41'),
(32, 'SD V6', 1, 1, 17, 1, 2, 2, '2019-11-21 20:33:41', '2019-11-21 20:33:41'),
(33, 'SD4', 1, 1, 17, 1, 2, 3, '2019-11-21 20:33:41', '2019-11-21 20:33:41'),
(34, 'ADVENTURE', 1, 1, 18, 1, 2, 1, '2019-11-21 20:33:41', '2019-11-21 20:33:41'),
(35, 'FREESTYLE', 1, 6, 18, 1, 2, 2, '2019-11-21 20:33:41', '2019-11-22 10:39:58');

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
('areeburrehman13@gmail.com', '$2y$10$x5MCYMczlr1Q7dD6hYI8k.CDFo8suOoppQr90ehBiy7ym2mp4tz4.', '2019-10-10 13:13:09'),
('areeburrehman13@gmail.com', '$2y$10$x5MCYMczlr1Q7dD6hYI8k.CDFo8suOoppQr90ehBiy7ym2mp4tz4.', '2019-10-10 13:13:09'),
('areeburrehman13@gmail.com', '$2y$10$x5MCYMczlr1Q7dD6hYI8k.CDFo8suOoppQr90ehBiy7ym2mp4tz4.', '2019-10-10 13:13:09'),
('areeburrehman13@gmail.com', '$2y$10$x5MCYMczlr1Q7dD6hYI8k.CDFo8suOoppQr90ehBiy7ym2mp4tz4.', '2019-10-10 13:13:09');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `is_visible` int(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `name`, `is_visible`) VALUES
(1, 'car', 1),
(2, 'bike', 1),
(3, 'Vans', 1),
(4, 'Motorhomes', 1),
(5, 'Caravans', 1),
(6, 'Trucks', 1),
(7, 'Farm', 1),
(8, 'Plant', 1);

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
(2, 'Areeb Ur Rehman', 'support@logoinn.com', NULL, '$2y$12$FLQVbNUiG5slzwQiCOSsMuAT8weAuPnFJ7UC1KEznr62fIBh3NYlu', 'KfEWFsEFroshIbovqeCeqxAGpkhW6LO3F0TOSAjbgITRu3voFnSZKW45hnhj', '2019-10-18 13:41:03', '2019-10-18 13:41:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_info`
--
ALTER TABLE `account_info`
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
-- Indexes for table `car_lkptColour`
--
ALTER TABLE `car_lkptColour`
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
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `car_ad_feature_`
--
ALTER TABLE `car_ad_feature_`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=355;

--
-- AUTO_INCREMENT for table `car_ad_pkg`
--
ALTER TABLE `car_ad_pkg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `car_derivative`
--
ALTER TABLE `car_derivative`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `car_feature`
--
ALTER TABLE `car_feature`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `car_images`
--
ALTER TABLE `car_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=283;

--
-- AUTO_INCREMENT for table `car_lkptbody_type`
--
ALTER TABLE `car_lkptbody_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `car_lkptColour`
--
ALTER TABLE `car_lkptColour`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `car_lkptfuel_type`
--
ALTER TABLE `car_lkptfuel_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `car_lkpttransmission`
--
ALTER TABLE `car_lkpttransmission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `car_make`
--
ALTER TABLE `car_make`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `car_model`
--
ALTER TABLE `car_model`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

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
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
