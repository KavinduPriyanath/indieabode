-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2023 at 06:15 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `indieabode`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `userID` int(11) NOT NULL,
  `profilePhoto` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `phoneNumber` varchar(15) NOT NULL,
  `displayName` varchar(100) NOT NULL,
  `twitter` varchar(50) NOT NULL,
  `linkedin` varchar(50) NOT NULL,
  `introduction` text NOT NULL,
  `website` varchar(200) NOT NULL,
  `revenueShare` int(11) NOT NULL DEFAULT 10,
  `followers` int(11) NOT NULL DEFAULT 0,
  `following` int(11) NOT NULL DEFAULT 0,
  `indieCoins` int(11) NOT NULL DEFAULT 50
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`userID`, `profilePhoto`, `location`, `phoneNumber`, `displayName`, `twitter`, `linkedin`, `introduction`, `website`, `revenueShare`, `followers`, `following`, `indieCoins`) VALUES
(46, 'pic.jpg', 'hrtht', '4543334', 'kavindu', 'rththt', 'hrtht', 'Hi. I\'m computer science undergraduate and indie game developer who enjoys working with games', 'thhwwww', 17, 0, 3, 50),
(47, '', '', '', '', '', '', '', '', 10, 0, 1, 50),
(48, '', '', '', '', '', '', '', '', 10, 0, 0, 50),
(51, '', '', '', 'oh my god', '', '', '', '', 10, 0, 0, 50),
(52, '', '', '', '', '', '', '', '', 10, 0, 1, 40),
(53, '', '', '', '', '', '', '', '', 10, 0, 0, 95),
(78, '', '', '', '', '', '', '', '', 10, 0, 0, 50),
(80, '', '', '', '', '', '', '', '', 10, 0, 0, 50),
(81, '', '', '', '', '', '', 'Hi. I\'m computer science undergraduate and indie game developer who enjoys working with games', '', 10, 2, 0, 50),
(82, '', '', '', '', '', '', '', '', 10, 2, 0, 50),
(83, '', '', '', '', '', '', '', '', 10, 0, 0, 50),
(84, '', '', '', '', '', '', '', '', 10, 0, 0, 35),
(86, '', '', '', '', '', '', '', '', 10, 0, 0, 100),
(87, '', '', '', '', '', '', '', '', 10, 1, 1, 50),
(89, '', '', '', '', '', '', '', '', 10, 0, 0, 50),
(91, '', '', '', '', '', '', '', '', 10, 0, 0, 50),
(92, '', '', '', '', '', '', 'Fellow indie game developer with the intention of making something unique in the gaming world one day', '', 10, 0, 0, 50),
(93, '', '', '', '', '', '', '', '', 10, 0, 0, 50),
(95, '', '', '', '', '', '', '', '', 10, 0, 0, 50),
(97, '', '', '', '', '', '', '', '', 10, 0, 0, 50),
(98, '', '', '', '', '', '', '', '', 10, 0, 0, 50),
(99, '', '', '', '', '', '', '', '', 10, 0, 0, 50),
(100, '', '', '', '', '', '', '', '', 10, 0, 0, 50),
(101, '', '', '', '', '', '', '', '', 10, 0, 0, 50),
(102, '', '', '', '', '', '', '', '', 10, 1, 0, 50),
(103, '', '', '', '', '', '', '', '', 10, 0, 0, 50);

-- --------------------------------------------------------

--
-- Table structure for table `activation_keys`
--

CREATE TABLE `activation_keys` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `activationCode` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activation_keys`
--

INSERT INTO `activation_keys` (`id`, `userID`, `activationCode`) VALUES
(2, 46, '93213'),
(3, 47, '60865'),
(4, 48, '67170'),
(11, 51, '31055'),
(12, 52, '57168'),
(13, 53, '60090'),
(14, 78, '84140'),
(15, 79, '43541'),
(16, 80, '88692'),
(17, 81, '32305'),
(18, 82, '82155'),
(19, 83, '29897'),
(20, 84, '93595'),
(26, 86, '36850'),
(27, 87, '50650'),
(36, 89, '54574'),
(38, 91, '26856'),
(39, 91, '49511'),
(40, 91, '58335'),
(41, 91, '28040'),
(42, 80, '18459'),
(43, 92, '81426'),
(44, 93, '27749'),
(46, 95, '35354'),
(48, 97, '25305'),
(49, 98, '94626'),
(50, 99, '84620'),
(51, 100, '26167'),
(52, 101, '17006'),
(53, 102, '53514'),
(54, 91, '24895'),
(55, 91, '99618'),
(56, 91, '68566'),
(57, 103, '78362'),
(58, 91, '45876');

-- --------------------------------------------------------

--
-- Table structure for table `addassetsale`
--

CREATE TABLE `addassetsale` (
  `assetSaleID` int(11) NOT NULL,
  `assetID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `addgamesale`
--

CREATE TABLE `addgamesale` (
  `gameSaleID` int(11) NOT NULL,
  `gameID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`) VALUES
(1, 'nodee', 'nadeedarshika1999@gmail.com', 'n99d10W05.');

-- --------------------------------------------------------

--
-- Table structure for table `assetcart`
--

CREATE TABLE `assetcart` (
  `assetID` int(11) NOT NULL,
  `cartID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `assetsale`
--

CREATE TABLE `assetsale` (
  `assetSaleID` int(11) NOT NULL,
  `assetClosingDate` datetime NOT NULL,
  `assetStartingDate` datetime NOT NULL,
  `discountAssetPrice` float NOT NULL,
  `assetPercentage` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `asset_cart`
--

CREATE TABLE `asset_cart` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `assetID` int(11) NOT NULL,
  `addedDate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `asset_cart`
--

INSERT INTO `asset_cart` (`id`, `userID`, `assetID`, `addedDate`) VALUES
(31, 46, 36, '2023-05-13');

-- --------------------------------------------------------

--
-- Table structure for table `asset_library`
--

CREATE TABLE `asset_library` (
  `id` int(11) NOT NULL,
  `assetID` int(11) NOT NULL,
  `developerID` int(11) NOT NULL,
  `createdAt` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `asset_library`
--

INSERT INTO `asset_library` (`id`, `assetID`, `developerID`, `createdAt`) VALUES
(1, 10, 46, '2023-03-15'),
(15, 17, 46, '2023-03-20'),
(16, 20, 46, '2023-03-21'),
(17, 21, 46, '2023-04-18'),
(18, 9, 78, '2023-04-18'),
(19, 29, 46, '2023-04-23'),
(22, 21, 87, '2023-04-23'),
(23, 10, 83, '2023-05-08'),
(24, 31, 81, '2023-05-10'),
(25, 38, 46, '2023-05-11'),
(26, 37, 46, '2023-05-12');

-- --------------------------------------------------------

--
-- Table structure for table `asset_purchases`
--

CREATE TABLE `asset_purchases` (
  `id` int(11) NOT NULL,
  `assetID` int(11) NOT NULL,
  `buyerID` int(11) NOT NULL,
  `orderID` varchar(250) NOT NULL,
  `purchasedPrice` float NOT NULL,
  `purchasedData` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `asset_purchases`
--

INSERT INTO `asset_purchases` (`id`, `assetID`, `buyerID`, `orderID`, `purchasedPrice`, `purchasedData`) VALUES
(18, 17, 46, '6418200e3e141', 30, '2023-03-20'),
(19, 17, 46, '641825ffad068', 30, '2023-03-20'),
(20, 20, 46, '6419734216074', 30, '2023-03-21'),
(21, 21, 46, '643e64a57e5e2', 30, '2023-04-18'),
(22, 9, 78, '643e681aa58db', 30, '2023-04-18'),
(23, 29, 46, '6444b3e376984', 34, '2023-04-23'),
(24, 17, 82, '6444d2173979b', 30, '2023-04-23'),
(25, 19, 82, '6444d2173979b', 32.49, '2023-04-23'),
(26, 21, 87, '64453ce3ded5c', 30, '2023-04-23'),
(27, 31, 81, '645b7fb56497e', 45, '2023-05-10'),
(28, 38, 46, '645c6c67aea26', 45, '2023-05-11');

-- --------------------------------------------------------

--
-- Table structure for table `asset_reviews`
--

CREATE TABLE `asset_reviews` (
  `id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `reviewTopic` varchar(255) NOT NULL,
  `review` text NOT NULL,
  `created_date` date NOT NULL DEFAULT current_timestamp(),
  `userID` int(11) NOT NULL,
  `assetID` int(11) NOT NULL,
  `recommendation` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `asset_reviews`
--

INSERT INTO `asset_reviews` (`id`, `rating`, `reviewTopic`, `review`, `created_date`, `userID`, `assetID`, `recommendation`) VALUES
(1, 1, 'hiuy', 'oihyy', '2023-04-19', 46, 10, 'No'),
(2, 3, 'jj', 'ytjytjyj', '2023-04-19', 51, 10, 'Yes'),
(3, 3, 'rggr', 'rgrg', '2023-04-28', 78, 9, 'Yes'),
(4, 3, 'goyi', 'gkgo', '2023-05-02', 46, 29, 'Yes'),
(5, 3, 'efefef', 'grgrgrgrge', '2023-05-08', 46, 9, 'Yes'),
(6, 3, 'Rock Solid!', 'If you are looking for a tool to take your game AI to the next level, look no further than the Behavior Designer: it is the best behavior tree plugin in the UAS. This plugin is a game-changer when it comes to designing, implementing and maintaining your games AI.', '2023-05-11', 46, 38, 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `asset_stats`
--

CREATE TABLE `asset_stats` (
  `assetID` int(11) NOT NULL,
  `downloads` int(11) NOT NULL DEFAULT 0,
  `views` int(11) NOT NULL DEFAULT 0,
  `ratings` int(11) NOT NULL DEFAULT 0,
  `ratingCount` int(11) NOT NULL DEFAULT 0,
  `revenue` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `asset_stats`
--

INSERT INTO `asset_stats` (`assetID`, `downloads`, `views`, `ratings`, `ratingCount`, `revenue`) VALUES
(9, 5, 19, 0, 0, 0),
(10, 5, 18, 0, 0, 0),
(17, 5, 9, 0, 0, 26.109),
(18, 0, 6, 0, 0, 0),
(19, 2, 7, 0, 0, 28.276),
(20, 1, 6, 0, 0, 0),
(21, 5, 5, 0, 0, 26.109),
(29, 3, 11, 0, 0, 29.5902),
(31, 0, 9, 0, 0, 39.1635),
(32, 0, 1, 0, 0, 0),
(33, 2, 3, 0, 0, 0),
(34, 0, 4, 0, 0, 0),
(35, 0, 4, 0, 0, 0),
(36, 0, 7, 0, 0, 0),
(37, 2, 5, 0, 0, 0),
(38, 1, 5, 0, 0, 39.1635),
(39, 1, 5, 0, 0, 0),
(40, 0, 3, 0, 0, 0),
(41, 0, 4, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `asset_stats_history`
--

CREATE TABLE `asset_stats_history` (
  `id` int(11) NOT NULL,
  `assetID` int(11) NOT NULL,
  `views` int(11) NOT NULL,
  `downloads` int(11) NOT NULL,
  `ratings` int(11) NOT NULL,
  `reviews` int(11) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `asset_stats_history`
--

INSERT INTO `asset_stats_history` (`id`, `assetID`, `views`, `downloads`, `ratings`, `reviews`, `created_at`) VALUES
(1, 17, 0, 2, 0, 0, '2023-03-09'),
(2, 10, 0, 1, 0, 0, '2023-03-14'),
(3, 10, 0, 1, 0, 0, '2023-03-15'),
(4, 9, 0, 1, 0, 0, '2023-03-15'),
(5, 10, 1, 0, 0, 0, '2023-04-18'),
(6, 17, 1, 0, 0, 0, '2023-04-18'),
(7, 18, 1, 0, 0, 0, '2023-04-18'),
(8, 19, 1, 0, 0, 0, '2023-04-18'),
(9, 24, 1, 0, 0, 0, '2023-04-18'),
(10, 9, 0, 4, 0, 0, '2023-04-18'),
(11, 25, 1, 0, 0, 0, '2023-04-19'),
(12, 26, 1, 0, 0, 0, '2023-04-19'),
(13, 29, 1, 0, 0, 0, '2023-04-19'),
(14, 9, 3, 0, 0, 0, '2023-04-19'),
(15, 10, 5, 0, 0, 0, '2023-04-19'),
(16, 17, 2, 0, 0, 0, '2023-04-19'),
(17, 10, 5, 0, 0, 0, '2023-04-23'),
(18, 18, 3, 0, 0, 0, '2023-04-23'),
(19, 19, 3, 2, 0, 0, '2023-04-23'),
(20, 20, 3, 0, 0, 0, '2023-04-23'),
(21, 21, 3, 2, 0, 0, '2023-04-23'),
(22, 29, 5, 1, 0, 0, '2023-04-23'),
(23, 9, 5, 0, 0, 0, '2023-04-23'),
(24, 17, 2, 1, 0, 0, '2023-04-23'),
(25, 17, 0, 1, 0, 0, '2023-04-24'),
(26, 29, 1, 1, 0, 0, '2023-04-28'),
(27, 19, 1, 0, 0, 0, '2023-04-28'),
(28, 9, 1, 0, 0, 0, '2023-04-28'),
(29, 10, 1, 0, 0, 0, '2023-04-28'),
(30, 10, 1, 0, 0, 0, '2023-04-30'),
(31, 9, 4, 0, 0, 0, '2023-05-01'),
(32, 29, 1, 0, 0, 0, '2023-05-01'),
(33, 20, 1, 0, 0, 0, '2023-05-01'),
(34, 10, 2, 0, 0, 0, '2023-05-01'),
(35, 17, 2, 0, 0, 0, '2023-05-01'),
(36, 9, 1, 0, 0, 0, '2023-05-02'),
(37, 29, 0, 1, 0, 0, '2023-05-02'),
(38, 9, 1, 0, 0, 0, '2023-05-05'),
(39, 29, 1, 0, 0, 0, '2023-05-05'),
(40, 10, 1, 0, 0, 0, '2023-05-05'),
(41, 18, 1, 0, 0, 0, '2023-05-05'),
(42, 17, 1, 0, 0, 0, '2023-05-05'),
(43, 19, 1, 0, 0, 0, '2023-05-05'),
(44, 20, 1, 0, 0, 0, '2023-05-05'),
(45, 21, 2, 1, 0, 0, '2023-05-05'),
(46, 9, 4, 0, 0, 0, '2023-05-08'),
(47, 10, 2, 3, 0, 0, '2023-05-08'),
(48, 29, 2, 0, 0, 0, '2023-05-08'),
(49, 21, 0, 2, 0, 0, '2023-05-08'),
(50, 19, 1, 0, 0, 0, '2023-05-08'),
(51, 17, 1, 0, 0, 0, '2023-05-08'),
(52, 18, 1, 0, 0, 0, '2023-05-08'),
(53, 31, 2, 0, 0, 0, '2023-05-08'),
(54, 33, 1, 1, 0, 0, '2023-05-08'),
(55, 34, 3, 0, 0, 0, '2023-05-09'),
(56, 0, 1, 0, 0, 0, '2023-05-09'),
(57, 35, 3, 0, 0, 0, '2023-05-09'),
(58, 31, 2, 0, 0, 0, '2023-05-09'),
(59, 36, 1, 0, 0, 0, '2023-05-09'),
(60, 33, 1, 1, 0, 0, '2023-05-09'),
(61, 37, 1, 0, 0, 0, '2023-05-09'),
(62, 31, 2, 0, 0, 0, '2023-05-10'),
(63, 20, 1, 1, 0, 0, '2023-05-10'),
(64, 37, 2, 0, 0, 0, '2023-05-10'),
(65, 35, 1, 0, 0, 0, '2023-05-10'),
(66, 33, 1, 0, 0, 0, '2023-05-10'),
(67, 36, 3, 0, 0, 0, '2023-05-10'),
(68, 34, 1, 0, 0, 0, '2023-05-10'),
(69, 17, 0, 1, 0, 0, '2023-05-10'),
(70, 38, 5, 1, 0, 0, '2023-05-11'),
(71, 31, 2, 0, 0, 0, '2023-05-11'),
(72, 39, 3, 0, 0, 0, '2023-05-11'),
(73, 36, 1, 0, 0, 0, '2023-05-11'),
(74, 40, 1, 0, 0, 0, '2023-05-11'),
(75, 41, 1, 0, 0, 0, '2023-05-11'),
(76, 41, 2, 0, 0, 0, '2023-05-12'),
(77, 31, 1, 0, 0, 0, '2023-05-12'),
(78, 32, 1, 0, 0, 0, '2023-05-12'),
(79, 36, 1, 0, 0, 0, '2023-05-12'),
(80, 37, 1, 1, 0, 0, '2023-05-12'),
(81, 40, 2, 0, 0, 0, '2023-05-12'),
(82, 39, 1, 0, 0, 0, '2023-05-12'),
(83, 37, 1, 1, 0, 0, '2023-05-13'),
(84, 39, 1, 1, 0, 0, '2023-05-13'),
(85, 41, 1, 0, 0, 0, '2023-05-13'),
(86, 36, 1, 0, 0, 0, '2023-05-13');

-- --------------------------------------------------------

--
-- Table structure for table `asset_view_tracker`
--

CREATE TABLE `asset_view_tracker` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `assetID` int(11) NOT NULL,
  `sessionID` int(11) NOT NULL,
  `viewedDate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `asset_view_tracker`
--

INSERT INTO `asset_view_tracker` (`id`, `userID`, `assetID`, `sessionID`, `viewedDate`) VALUES
(1, 78, 9, 72, '2023-04-18'),
(2, 78, 10, 72, '2023-04-18'),
(3, 78, 17, 72, '2023-04-18'),
(4, 78, 18, 72, '2023-04-18'),
(5, 78, 19, 72, '2023-04-18'),
(6, 78, 24, 72, '2023-04-18'),
(7, 0, 9, 0, '2023-04-18'),
(8, 46, 9, 58, '2023-04-18'),
(9, 46, 10, 42, '2023-04-18'),
(10, 46, 9, 42, '2023-04-18'),
(11, 78, 25, 76, '2023-04-19'),
(12, 78, 26, 76, '2023-04-19'),
(13, 78, 29, 76, '2023-04-19'),
(14, 78, 9, 76, '2023-04-19'),
(15, 46, 9, 48, '2023-04-19'),
(16, 46, 10, 48, '2023-04-19'),
(17, 51, 9, 83, '2023-04-19'),
(18, 51, 10, 83, '2023-04-19'),
(19, 78, 10, 21, '2023-04-19'),
(20, 78, 17, 21, '2023-04-19'),
(21, 0, 10, 0, '2023-04-19'),
(22, 78, 10, 48, '2023-04-19'),
(23, 46, 17, 38, '2023-04-19'),
(24, 46, 10, 18, '2023-04-23'),
(25, 46, 18, 18, '2023-04-23'),
(26, 46, 19, 18, '2023-04-23'),
(27, 46, 20, 18, '2023-04-23'),
(28, 46, 21, 18, '2023-04-23'),
(29, 46, 29, 18, '2023-04-23'),
(30, 82, 9, 53, '2023-04-23'),
(31, 82, 18, 53, '2023-04-23'),
(32, 82, 29, 53, '2023-04-23'),
(33, 82, 10, 53, '2023-04-23'),
(34, 82, 19, 98, '2023-04-23'),
(35, 82, 9, 98, '2023-04-23'),
(36, 82, 10, 98, '2023-04-23'),
(37, 82, 17, 98, '2023-04-23'),
(38, 82, 21, 98, '2023-04-23'),
(39, 87, 10, 68, '2023-04-23'),
(40, 87, 19, 68, '2023-04-23'),
(41, 87, 18, 68, '2023-04-23'),
(42, 87, 29, 68, '2023-04-23'),
(43, 87, 9, 68, '2023-04-23'),
(44, 87, 20, 68, '2023-04-23'),
(45, 87, 17, 68, '2023-04-23'),
(46, 87, 9, 51, '2023-04-23'),
(47, 87, 10, 51, '2023-04-23'),
(48, 87, 29, 51, '2023-04-23'),
(49, 46, 29, 50, '2023-04-23'),
(50, 46, 9, 50, '2023-04-23'),
(51, 46, 20, 50, '2023-04-23'),
(52, 87, 21, 11, '2023-04-23'),
(53, 46, 29, 80, '2023-04-28'),
(54, 46, 19, 80, '2023-04-28'),
(55, 78, 9, 92, '2023-04-28'),
(56, 46, 10, 73, '2023-04-28'),
(57, 81, 10, 80, '2023-04-30'),
(58, 46, 9, 23, '2023-05-01'),
(59, 46, 29, 23, '2023-05-01'),
(60, 46, 20, 23, '2023-05-01'),
(61, 46, 10, 23, '2023-05-01'),
(62, 87, 9, 26, '2023-05-01'),
(63, 87, 10, 16, '2023-05-01'),
(64, 46, 9, 62, '2023-05-01'),
(65, 46, 17, 62, '2023-05-01'),
(66, 87, 9, 33, '2023-05-01'),
(67, 87, 17, 33, '2023-05-01'),
(68, 46, 9, 80, '2023-05-02'),
(69, 92, 9, 78, '2023-05-05'),
(70, 92, 29, 78, '2023-05-05'),
(71, 92, 10, 78, '2023-05-05'),
(72, 92, 18, 78, '2023-05-05'),
(73, 92, 17, 78, '2023-05-05'),
(74, 92, 19, 78, '2023-05-05'),
(75, 92, 20, 78, '2023-05-05'),
(76, 92, 21, 78, '2023-05-05'),
(77, 46, 21, 58, '2023-05-05'),
(78, 46, 9, 89, '2023-05-08'),
(79, 46, 10, 89, '2023-05-08'),
(80, 46, 29, 89, '2023-05-08'),
(81, 83, 10, 70, '2023-05-08'),
(82, 83, 9, 70, '2023-05-08'),
(83, 83, 29, 70, '2023-05-08'),
(84, 83, 19, 70, '2023-05-08'),
(85, 83, 17, 70, '2023-05-08'),
(86, 83, 18, 70, '2023-05-08'),
(87, 46, 9, 95, '2023-05-08'),
(88, 46, 9, 10, '2023-05-08'),
(89, 102, 31, 50, '2023-05-08'),
(90, 101, 31, 25, '2023-05-08'),
(91, 46, 33, 32, '2023-05-08'),
(92, 102, 34, 49, '2023-05-09'),
(93, 78, 0, 42, '2023-05-09'),
(94, 78, 35, 42, '2023-05-09'),
(95, 102, 31, 99, '2023-05-09'),
(96, 102, 35, 99, '2023-05-09'),
(97, 102, 34, 99, '2023-05-09'),
(98, 97, 36, 53, '2023-05-09'),
(99, 87, 33, 15, '2023-05-09'),
(100, 87, 34, 15, '2023-05-09'),
(101, 87, 35, 15, '2023-05-09'),
(102, 87, 31, 15, '2023-05-09'),
(103, 87, 37, 15, '2023-05-09'),
(104, 46, 31, 97, '2023-05-10'),
(105, 102, 37, 32, '2023-05-10'),
(106, 102, 35, 32, '2023-05-10'),
(107, 87, 33, 51, '2023-05-10'),
(108, 81, 36, 67, '2023-05-10'),
(109, 81, 34, 91, '2023-05-10'),
(110, 81, 20, 91, '2023-05-10'),
(111, 81, 36, 91, '2023-05-10'),
(112, 81, 31, 91, '2023-05-10'),
(113, 82, 37, 10, '2023-05-10'),
(114, 46, 36, 94, '2023-05-10'),
(115, 97, 38, 86, '2023-05-11'),
(116, 46, 38, 70, '2023-05-11'),
(117, 46, 38, 66, '2023-05-11'),
(118, 97, 38, 11, '2023-05-11'),
(119, 78, 38, 89, '2023-05-11'),
(120, 78, 31, 46, '2023-05-11'),
(121, 102, 31, 75, '2023-05-11'),
(122, 78, 39, 25, '2023-05-11'),
(123, 46, 36, 63, '2023-05-11'),
(124, 87, 39, 76, '2023-05-11'),
(125, 78, 39, 44, '2023-05-11'),
(126, 87, 40, 37, '2023-05-11'),
(127, 97, 41, 78, '2023-05-11'),
(128, 46, 41, 41, '2023-05-12'),
(129, 46, 31, 83, '2023-05-12'),
(130, 46, 32, 83, '2023-05-12'),
(131, 46, 36, 74, '2023-05-12'),
(132, 46, 37, 74, '2023-05-12'),
(133, 46, 41, 19, '2023-05-12'),
(134, 46, 40, 19, '2023-05-12'),
(135, 46, 39, 19, '2023-05-12'),
(136, 46, 40, 11, '2023-05-12'),
(137, 46, 37, 53, '2023-05-13'),
(138, 46, 39, 53, '2023-05-13'),
(139, 46, 41, 53, '2023-05-13'),
(140, 46, 36, 35, '2023-05-13');

-- --------------------------------------------------------

--
-- Table structure for table `billing_addresses`
--

CREATE TABLE `billing_addresses` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `streetLine1` varchar(100) NOT NULL,
  `streetLine2` varchar(100) DEFAULT NULL,
  `city` varchar(100) NOT NULL,
  `province` varchar(100) DEFAULT NULL,
  `zipCode` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `billing_addresses`
--

INSERT INTO `billing_addresses` (`id`, `userID`, `fullName`, `streetLine1`, `streetLine2`, `city`, `province`, `zipCode`, `country`) VALUES
(2, 46, 'kavindu priyanath', '342/C/2', 'Biyagama', 'Warana', 'Uva', '121001', 'Sri Lanka'),
(3, 52, 'fef', 'grgr', 'grgrg', 'rrh', 'hrg', 'grgrg', 'Sri Lanka'),
(4, 47, 'fefefjkukiuliuli', 'grgr', 'grgrg', 'rrh', 'hrg', 'grgrg', 'Sri Lanka'),
(5, 78, 'Akila Dharmadasa', 'No.456/2, A', 'Kottawa', 'Nugegoda', 'Eastern', '11230', 'Sri Lanka'),
(6, 53, 'fefefjkukiuliuli', 'grgr', 'grgrg', 'rrh', 'hrg', 'grgrg', 'Sri Lanka'),
(7, 84, 'fefe', 'grgr', 'hrhr', 'rhh', 'rhrh', 'hrhr', 'Sri Lanka'),
(8, 86, 'Pathum Sinrasa', 'No.452/C/2', 'Nagoda', 'Urapola', 'Western', '11120', 'Sri Lanka'),
(9, 82, 'liliul', 'uililui', 'jyj', 'kuyku', 'kluili', 'uililiu', 'Sri Lanka'),
(10, 87, 'liliul', 'uililui', 'jyj', 'kuyku', 'kluili', 'uililiu', 'Sri Lanka'),
(11, 92, 'fgweg', 'ergreg', 'ergreg', 'ergreg', 'regerg', 'gregre', 'Sri Lanka'),
(12, 100, 'ewe', 'ege', 'ee', 'egeg', 'egeg', 'gege', 'Sri Lanka'),
(13, 99, 'egwe', 'wegewg', 'egwe', 'reger', 'ergrg', 'regrg', 'Sri Lanka'),
(14, 83, 'Tharindu Lasath Dananjaya', 'No:231/C/2', 'Bogahamula', 'Haggalla', 'Sabaragamu', '12300', 'Sri Lanka'),
(15, 81, 'Kulith Thamuditha', 'No.212/2', 'Polgahalanda', 'Kaduwela', 'Western', '11120', 'Sri Lanka');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `userID` varchar(30) NOT NULL,
  `itemID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `userID`, `itemID`) VALUES
(1, '31', '1'),
(2, '31', '2'),
(3, '31', '1'),
(4, '31', '1'),
(12, '51', '10'),
(13, '51', '9'),
(14, '46', '9');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `msgID` int(11) NOT NULL,
  `senderID` int(11) NOT NULL,
  `receiverID` int(11) NOT NULL,
  `msg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `complaintID` int(11) NOT NULL,
  `reason` varchar(40) NOT NULL,
  `description` text NOT NULL,
  `gamerID` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `itemID` int(11) NOT NULL,
  `checked` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`complaintID`, `reason`, `description`, `gamerID`, `type`, `itemID`, `checked`) VALUES
(2, 'Spam', 'Not Cheerful as it claims', 46, 'Game', 0, 1),
(3, 'Spam', 'I made the same game', 46, 'Game', 0, 0),
(4, 'Broken', 'fefef', 0, 'Asset', 0, 0),
(5, 'Broken', 'vvnerlerv', 46, 'Game', 0, 0),
(6, 'Offensive material', 'efnefne', 46, 'Game', 183, 0),
(7, 'Offensive material', 'efenfefeffe', 46, 'Asset', 36, 0);

-- --------------------------------------------------------

--
-- Table structure for table `complaint_reasons_items`
--

CREATE TABLE `complaint_reasons_items` (
  `id` int(11) NOT NULL,
  `reason` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaint_reasons_items`
--

INSERT INTO `complaint_reasons_items` (`id`, `reason`) VALUES
(1, 'Broken'),
(2, 'Offensive material'),
(3, 'Uploader not authorized to distribute'),
(4, 'Miscategorized — Shows up on wrong part of itch.io, incorrect tags, incorrect platforms, etc.'),
(5, 'Spam'),
(6, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `complaint_reason_jams`
--

CREATE TABLE `complaint_reason_jams` (
  `id` int(11) NOT NULL,
  `reason` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaint_reason_jams`
--

INSERT INTO `complaint_reason_jams` (`id`, `reason`) VALUES
(1, 'Miscategorized — Shows up on wrong part of indieabode, incorrect tags, incorrect platforms, etc.'),
(2, 'Spam'),
(3, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `complaint_reason_sales`
--

CREATE TABLE `complaint_reason_sales` (
  `id` int(11) NOT NULL,
  `reason` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaint_reason_sales`
--

INSERT INTO `complaint_reason_sales` (`id`, `reason`) VALUES
(0, 'spam');

-- --------------------------------------------------------

--
-- Table structure for table `complaint_submissions`
--

CREATE TABLE `complaint_submissions` (
  `id` int(11) NOT NULL,
  `gamerID` int(11) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `jamID` int(11) NOT NULL,
  `submissionID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaint_submissions`
--

INSERT INTO `complaint_submissions` (`id`, `gamerID`, `reason`, `description`, `jamID`, `submissionID`) VALUES
(1, 46, 'Invalid Jam Submission', 'fefef', 67, 195),
(2, 52, 'Offensive Material', 'I think', 67, 195),
(3, 52, 'Invalid Jam Submission', 'I do not think that this game belongs to neither the jam theme nor any of the criterias specified.', 62, 210),
(4, 52, 'Invalid Jam Submission', 'I do not think that this game fit into the theme of the gamejam. Also it kinda looked suspicious and I think this is a pre-made game but still submitted as a gamejam submission.', 62, 205),
(5, 53, 'Miscategorized', 'The game is surely made according to the theme and other criteria of the game jam but its game page has many false information. It would be better if the developer paid attention to this. But however as a submission this game has no fault.', 62, 204);

-- --------------------------------------------------------

--
-- Table structure for table `crowdfund`
--

CREATE TABLE `crowdfund` (
  `crowdFundID` int(11) NOT NULL,
  `currentAmount` float NOT NULL,
  `deadline` date NOT NULL,
  `expectedAmount` float NOT NULL,
  `gameDeveloperName` int(11) NOT NULL,
  `gameName` varchar(30) NOT NULL,
  `title` varchar(50) NOT NULL,
  `tagline` varchar(255) NOT NULL,
  `backers` int(11) NOT NULL,
  `details` text NOT NULL,
  `visibility` varchar(10) NOT NULL,
  `crowdfundCoverImg` varchar(255) NOT NULL,
  `crowdfundSS` varchar(255) NOT NULL,
  `crowdfundTrailer` varchar(255) NOT NULL,
  `viewCount` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `siteShareCollected` int(11) NOT NULL DEFAULT 0,
  `ActivityCheck` int(11) NOT NULL DEFAULT 6
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `crowdfund`
--

INSERT INTO `crowdfund` (`crowdFundID`, `currentAmount`, `deadline`, `expectedAmount`, `gameDeveloperName`, `gameName`, `title`, `tagline`, `backers`, `details`, `visibility`, `crowdfundCoverImg`, `crowdfundSS`, `crowdfundTrailer`, `viewCount`, `created_at`, `siteShareCollected`, `ActivityCheck`) VALUES
(4, 77.36, '2023-06-03', 500, 46, '96', 'ergrgrtgd wdw 111', 'httrh 11f wgkrg errogrog jregjreogj rejgergrjgierjgrej grgjregjre jrgjrgjregrjg', 2, 'ffwf <b>fefefeef </b>', 'draft', 'Cover-4.jpg', 'SS-4-0.jpg,SS-4-1.jpg', 'https://itch.io/11/my-first-game-jam-winter-2023', 20, '2023-05-04 23:14:42', 0, 6),
(6, 0, '2023-05-05', 100, 46, '95', 'new crowdfunding', 'gtgrtgrttrht', 0, '<h3>ABOUT THIS GAME</h3>\r\n<br>\r\n<p>Lost, alone and separated from family, a stray cat must untangle an ancient mystery to escape a long-forgotten city.\r\n\r\nStray is a third-person cat adventure game set amidst the detailed, neon-lit alleys of a decaying cybercity and the murky environments of its seedy underbelly. Roam surroundings high and low, defend against unforeseen threats and solve the mysteries of this unwelcoming place inhabited by curious droids and dangerous creatures.\r\n\r\nSee the world through the eyes of a cat and interact with the environment in playful ways. Be stealthy, nimble, silly, and sometimes as annoying as possible with the strange inhabitants of this mysterious world.\r\n\r\nAlong the way, the cat befriends a small flying drone, known only as B-12. With the help of this newfound companion, the duo must find a way out.\r\n\r\nStray is developed by BlueTwelve Studio, a small team from the south of France mostly made up of cats and a handful of humans.<p>', 'draft', 'Cover-Monster Hunter Rise.jpg', 'SS-Monster Hunter Rise-0.jpg,SS-Monster Hunter Rise-1.jpg', 'https://itch.io/jam/my-first-game-jam-winter-2023', 4, '2023-05-04 23:14:42', 0, 6),
(11, 0, '2023-04-26', 234, 46, '91', 'htrhrt', 'gtgrtgrttrht', 0, 'gtthh<b>gtgt</b>', 'draft', 'Cover-91.jpg', 'SS-91-0.jpg,SS-91-1.jpg,SS-91-2.jpg', 'https://itch.io/jam/my-first-game-jam-winter-2023', 4, '2023-05-04 23:14:42', 0, 6),
(12, 0, '2023-04-29', 51, 46, '89', 'ergrgrtgfefregreg gregerger ', 'gtgrtgrttrhte greg ererh erherhh hh thj7j eg owgrjrjgri r grgjrgj rgjjowjg ', 0, '', 'draft', 'Cover-89.jpg', 'SS-89-0.jpg,SS-89-1.jpg', 'https://itch.io/jam/my-first-game-jam-winter-2023', 4, '2023-05-04 23:14:42', 0, 6);

-- --------------------------------------------------------

--
-- Table structure for table `crowdfund_donations`
--

CREATE TABLE `crowdfund_donations` (
  `id` int(11) NOT NULL,
  `crowdfundID` int(11) NOT NULL,
  `donorID` int(11) NOT NULL,
  `donationAmount` double NOT NULL,
  `orderID` varchar(255) NOT NULL,
  `donatedDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `crowdfund_donations`
--

INSERT INTO `crowdfund_donations` (`id`, `crowdfundID`, `donorID`, `donationAmount`, `orderID`, `donatedDate`) VALUES
(1, 5, 46, 30, '641', '2023-03-24 13:13:39'),
(2, 5, 46, 30, '641d56d7a2d61', '2023-03-24 13:23:15'),
(3, 5, 46, 30, '641d573b5ae9d', '2023-03-24 13:24:58'),
(4, 5, 46, 30, '641d577695806', '2023-03-24 13:25:55'),
(5, 5, 46, 30, '641d57a3203e2', '2023-03-24 13:26:35'),
(6, 4, 51, 30, '641d714f9c04d', '2023-03-24 15:16:17'),
(7, 5, 51, 30, '641d717c219cb', '2023-03-24 15:16:55'),
(8, 5, 46, 30, '6433a6896a058', '2023-04-10 11:38:52'),
(9, 4, 52, 30, '64548c0601c89', '2023-05-05 10:24:56'),
(10, 4, 86, 50, '64548d94a58ea', '2023-05-05 10:31:29');

-- --------------------------------------------------------

--
-- Table structure for table `crowdfund_view_tracker`
--

CREATE TABLE `crowdfund_view_tracker` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `sessionID` int(11) NOT NULL,
  `crowdfundID` int(11) NOT NULL,
  `viewedDate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `crowdfund_view_tracker`
--

INSERT INTO `crowdfund_view_tracker` (`id`, `userID`, `sessionID`, `crowdfundID`, `viewedDate`) VALUES
(1, 46, 77, 1, '2023-04-12'),
(2, 46, 77, 8, '2023-04-12'),
(3, 51, 90, 8, '2023-04-12'),
(4, 46, 74, 9, '2023-04-13'),
(5, 46, 96, 4, '2023-04-14'),
(6, 46, 96, 11, '2023-04-15'),
(7, 0, 0, 6, '2023-04-19'),
(8, 0, 0, 4, '2023-04-19'),
(9, 46, 16, 4, '2023-04-26'),
(10, 46, 16, 12, '2023-04-26'),
(11, 46, 80, 4, '2023-04-28'),
(12, 46, 80, 12, '2023-04-28'),
(13, 52, 65, 4, '2023-05-04'),
(14, 52, 74, 4, '2023-05-05'),
(15, 86, 86, 4, '2023-05-05'),
(16, 46, 65, 4, '2023-05-05'),
(17, 46, 65, 6, '2023-05-05'),
(18, 46, 65, 11, '2023-05-05'),
(19, 46, 65, 12, '2023-05-05'),
(20, 46, 100, 4, '2023-05-05'),
(21, 46, 100, 6, '2023-05-05'),
(22, 46, 100, 11, '2023-05-05'),
(23, 46, 100, 12, '2023-05-05'),
(24, 92, 78, 4, '2023-05-05'),
(25, 46, 95, 4, '2023-05-08'),
(26, 46, 32, 4, '2023-05-08'),
(27, 46, 32, 6, '2023-05-08'),
(28, 46, 32, 11, '2023-05-08'),
(29, 46, 66, 4, '2023-05-09'),
(30, 46, 97, 4, '2023-05-10'),
(31, 52, 81, 4, '2023-05-11'),
(32, 46, 53, 4, '2023-05-11'),
(33, 46, 38, 4, '2023-05-12'),
(34, 52, 72, 4, '2023-05-12'),
(35, 52, 30, 4, '2023-05-12'),
(36, 52, 13, 4, '2023-05-12');

-- --------------------------------------------------------

--
-- Table structure for table `devlog`
--

CREATE TABLE `devlog` (
  `publishDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `description` text NOT NULL,
  `name` varchar(50) NOT NULL,
  `Tagline` varchar(255) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `Visibility` varchar(255) NOT NULL,
  `devlogImg` varchar(255) NOT NULL,
  `gameName` varchar(255) NOT NULL,
  `devLogID` int(11) NOT NULL,
  `CreatedDate` datetime DEFAULT current_timestamp(),
  `likeCount` int(11) NOT NULL DEFAULT 0,
  `commentCount` int(11) NOT NULL DEFAULT 0,
  `viewCount` int(11) NOT NULL DEFAULT 0,
  `ActivityCheck` int(11) NOT NULL DEFAULT 5
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `devlog`
--

INSERT INTO `devlog` (`publishDate`, `description`, `name`, `Tagline`, `Type`, `Visibility`, `devlogImg`, `gameName`, `devLogID`, `CreatedDate`, `likeCount`, `commentCount`, `viewCount`, `ActivityCheck`) VALUES
('2023-02-09 17:38:43', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce quis hendrerit neque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras fermentum pharetra sem. Vestibulum eu est urna. Cras non ipsum non massa sodales condimentum quis eu risus. Praesent volutpat lorem a dolor tristique luctus eget sed elit. Ut facilisis faucibus justo tincidunt eleifend. Curabitur ultrices sapien id lorem posuere, vitae mattis nisi faucibus. Aliquam congue lorem sit amet velit lobortis, non venenatis massa feugiat. Aenean ut vehicula nibh, sed vehicula lacus. Praesent eu eros id leo maximus rhoncus eget eget risus. Curabitur vitae faucibus ligula, ac tincidunt dui. Sed diam massa, euismod sit amet augue a, pharetra egestas augue. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.\r\n\r\nIn hendrerit magna a dui tincidunt porta. Curabitur suscipit ex consectetur mauris ullamcorper rutrum. Mauris feugiat aliquet tristique. Curabitur egestas suscipit iaculis. Quisque tristique posuere augue, ac aliquet nisi vestibulum id. Curabitur efficitur nibh eu ipsum venenatis, et ornare tellus pellentesque. Nullam mollis lacus in nibh vestibulum, nec dignissim justo tristique. In congue dolor suscipit, eleifend leo et, commodo purus. Curabitur gravida risus et leo porttitor facilisis ut vestibulum ex. Donec enim tortor, commodo facilisis vestibulum non, viverra sed augue. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aenean ultricies metus vitae lobortis fermentum. Maecenas vulputate ante a sollicitudin congue. Duis purus erat, finibus eget magna sit amet, porta pharetra massa.\r\n\r\nVestibulum eleifend imperdiet felis sit amet placerat. Nulla auctor pretium turpis, quis porttitor lacus tempor vitae. Vestibulum semper non enim at dignissim. Mauris consequat elit ac purus congue iaculis. Aenean ac nibh a dolor efficitur fermentum. Mauris a porttitor lorem, ac gravida tellus. Cras iaculis malesuada mollis.', 'Finishing Utility Inventory', 'Bonjour! This is a post about me finally finishing the Utiltiy ', 'Game Design', 'draft', 'SS-Albion Online.png', '89', 28, '2020-12-29 00:00:00', 2, 3, 9, 5),
('2023-02-09 17:41:03', '', 'How to Build a Mansion', 'Showing steps of using tiles to build a mansion in the city ', 'Game Design', 'draft', '', '93', 29, '2020-12-26 00:00:00', 0, 0, 1, 5),
('2023-02-09 17:43:00', 'dwfwf', 'Level Editor Tutorial', 'Optimized level editor is available to players for free with extensions', 'Game Design', 'draft', 'SS-Final Fantasy VII.jpg', '93', 30, '2020-11-29 00:00:00', 1, 1, 5, 5),
('2023-03-07 12:55:38', 'dwdw', 'dwd', 'ddwd', 'Tutorial', 'draft', 'Cover-31.png', '89', 31, '2023-04-19 20:22:07', 1, 0, 1, 5),
('2023-03-12 18:12:11', 'ththt', 'tthht too', 'hth omg', 'Tutorial', 'draft', 'Cover-34.jpg', '89', 34, '2023-04-24 00:00:00', 0, 0, 0, 5),
('2023-04-10 04:44:15', 'fef <b>whats up</b>', 'New Devlog 1', 'Hello all i have returned with a polished new devlog', 'Marketing', 'draft', 'Cover-35.jpg', '95', 35, '2022-11-10 20:22:17', 0, 0, 2, 5),
('2023-04-10 04:50:44', 'grgrg&nbsp;<div><div style=\"text-align: center;\">grgrgrgrgrgrg</div><div style=\"text-align: center;\"><br></div><div>grrgrg<b>grggrggrg grgrgeeg</b></div></div>', 'fefefg', 'ggrgrggg', 'Major Update', 'draft', 'SS-89.jpg', '89', 36, '2022-11-02 00:00:00', 1, 1, 1, 5),
('2023-04-26 15:04:59', '', 'fefef', 'grgrgrg rger  g wgg  gg htrh g gg fewfwefef', 'Major Update', 'draft', 'SS-91.jpg', '91', 40, '2023-04-26 20:34:59', 0, 0, 2, 5),
('2023-05-10 08:32:03', '', 'Expendabros new multiplayer', 'The expendabros is a pixel based 2D platformer with coop features and vastly unique character customization features', 'Major Update', 'draft', 'SS-214.jpg', '214', 41, '2023-05-10 14:02:03', 1, 0, 2, 5),
('2023-05-10 08:54:16', '', 'Every Ascendancy Ranked', 'With 19 Ascendancy classes to pick from, the Path of Exile player base is spoiled for choice. How do the Ascendancies rank from worst to best?', 'Postmortem', 'public', 'SS-189.jpg', '189', 42, '2023-05-10 14:24:16', 1, 0, 2, 5),
('2023-05-10 09:21:45', '', 'New Update!', 'Enjoy the full experience of Island Saver on your mobile at anywhere at any time with your favourite person', 'Major Update', 'public', 'SS-197.jpg', '197', 44, '2023-05-10 14:51:45', 2, 0, 4, 5),
('2023-05-10 09:25:36', '', 'Who is Nasuverse?', 'Kinoko Nasu, writer of most of the Fate series, has many other written works that have been adapted into anime, and they exist in the same multiverse.', 'Marketing', 'public', 'SS-206.png', '206', 45, '2023-05-10 14:55:36', 0, 0, 2, 5),
('2023-05-10 11:38:11', '', 'Roguelike Dungeon Reveals', 'Path of Exile update 3.20 adds a roguelike dungeon to the ARPG game, reworks the Atlas Tree and Eldritch Altars, adds Ruthless mode, and buffs unique weapons', 'Major Update', 'public', 'SS-189.jpg', '189', 46, '2023-05-10 17:08:11', 0, 0, 2, 5),
('2023-05-12 23:10:06', '', 'Fire element added', 'Fire elemental ability has been on the requests received by our dev teams daily. Hence we decided to add that to this new update.', 'Major Update', 'public', 'SS-96.jpg', '96', 47, '2023-05-13 04:40:06', 0, 0, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `devlog_comments`
--

CREATE TABLE `devlog_comments` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `devlogID` int(11) NOT NULL,
  `createdAt` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `devlog_comments`
--

INSERT INTO `devlog_comments` (`id`, `userID`, `comment`, `devlogID`, `createdAt`) VALUES
(22, 46, 'dwdw', 28, '2023-03-01'),
(23, 46, 'dwd\n', 28, '2023-03-08'),
(24, 46, 'gi\n', 30, '2023-03-22'),
(25, 46, 'grgrg', 36, '2023-04-10'),
(26, 52, 'I am a Gamer', 28, '2023-05-04');

-- --------------------------------------------------------

--
-- Table structure for table `devlog_comments_replies`
--

CREATE TABLE `devlog_comments_replies` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `commentID` int(11) NOT NULL,
  `replyMsg` varchar(255) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `devlog_comments_replies`
--

INSERT INTO `devlog_comments_replies` (`id`, `userID`, `commentID`, `replyMsg`, `created_at`) VALUES
(20, 52, 3, 'er', '2023-03-01'),
(21, 52, 3, '23', '2023-03-01'),
(22, 52, 8, '1', '2023-03-01'),
(23, 52, 8, '2', '2023-03-01'),
(24, 52, 8, '3', '2023-03-01'),
(30, 46, 20, '@KRDA ddwd', '2023-03-01'),
(31, 46, 20, '@KRDA dwdwdd', '2023-03-01'),
(32, 46, 3, '@KRDA dwdwd', '2023-03-01'),
(33, 46, 22, 'yo', '2023-03-08'),
(34, 46, 22, '@Beidou yo 2', '2023-03-08'),
(35, 46, 25, 'grgrg', '2023-04-10'),
(37, 46, 22, 'toytiu', '2023-05-02'),
(38, 46, 26, 'rgregr', '2023-05-08');

-- --------------------------------------------------------

--
-- Table structure for table `devlog_likes`
--

CREATE TABLE `devlog_likes` (
  `id` int(11) NOT NULL,
  `devlogID` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `devlog_likes`
--

INSERT INTO `devlog_likes` (`id`, `devlogID`, `userID`) VALUES
(12, 31, 46),
(13, 36, 46),
(14, 37, 46),
(15, 30, 46),
(16, 28, 46),
(20, 28, 52),
(21, 41, 46),
(22, 42, 83);

-- --------------------------------------------------------

--
-- Table structure for table `devlog_posttype`
--

CREATE TABLE `devlog_posttype` (
  `id` int(11) NOT NULL,
  `postType` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `devlog_posttype`
--

INSERT INTO `devlog_posttype` (`id`, `postType`) VALUES
(1, 'Major Update'),
(2, 'Postmortem'),
(3, 'Game Design'),
(4, 'Tutorial'),
(5, 'Marketing');

-- --------------------------------------------------------

--
-- Table structure for table `devlog_view_tracker`
--

CREATE TABLE `devlog_view_tracker` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `sessionID` int(11) NOT NULL,
  `devlogID` int(11) NOT NULL,
  `viewedDate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `devlog_view_tracker`
--

INSERT INTO `devlog_view_tracker` (`id`, `userID`, `sessionID`, `devlogID`, `viewedDate`) VALUES
(1, 46, 10, 28, '2023-04-12'),
(2, 51, 19, 28, '2023-04-12'),
(3, 46, 77, 30, '2023-04-12'),
(4, 46, 60, 35, '2023-04-14'),
(5, 0, 0, 30, '2023-04-19'),
(6, 46, 69, 30, '2023-04-19'),
(7, 46, 24, 31, '2023-04-19'),
(8, 46, 80, 40, '2023-04-26'),
(9, 46, 80, 28, '2023-04-28'),
(10, 52, 65, 28, '2023-05-04'),
(11, 92, 78, 28, '2023-05-05'),
(12, 93, 58, 36, '2023-05-05'),
(13, 81, 70, 28, '2023-05-06'),
(14, 81, 70, 30, '2023-05-06'),
(15, 46, 62, 28, '2023-05-08'),
(16, 52, 50, 28, '2023-05-08'),
(17, 52, 50, 29, '2023-05-08'),
(18, 52, 50, 30, '2023-05-08'),
(19, 52, 50, 40, '2023-05-08'),
(20, 84, 61, 28, '2023-05-08'),
(21, 46, 95, 28, '2023-05-08'),
(22, 46, 88, 41, '2023-05-10'),
(23, 46, 88, 35, '2023-05-10'),
(24, 82, 90, 42, '2023-05-10'),
(25, 83, 48, 42, '2023-05-10'),
(26, 83, 48, 43, '2023-05-10'),
(27, 83, 48, 44, '2023-05-10'),
(28, 81, 67, 45, '2023-05-10'),
(29, 82, 10, 46, '2023-05-10'),
(30, 46, 94, 46, '2023-05-10'),
(31, 46, 70, 44, '2023-05-11'),
(32, 46, 70, 45, '2023-05-11'),
(33, 52, 73, 44, '2023-05-11'),
(34, 46, 41, 44, '2023-05-12'),
(35, 46, 83, 28, '2023-05-12'),
(36, 46, 74, 41, '2023-05-12'),
(37, 46, 70, 47, '2023-05-13');

-- --------------------------------------------------------

--
-- Table structure for table `downloadasset`
--

CREATE TABLE `downloadasset` (
  `assetID` int(11) NOT NULL,
  `gamerID` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `downloadgame`
--

CREATE TABLE `downloadgame` (
  `gamerID` int(11) NOT NULL,
  `gameID` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `followers`
--

CREATE TABLE `followers` (
  `id` int(11) NOT NULL,
  `follower` int(11) NOT NULL,
  `following` int(11) NOT NULL,
  `followed_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `followers`
--

INSERT INTO `followers` (`id`, `follower`, `following`, `followed_date`) VALUES
(13, 52, 81, '2023-04-30 22:50:28'),
(16, 46, 82, '2023-05-10 09:12:42'),
(18, 87, 102, '2023-05-10 12:17:19'),
(19, 47, 82, '2023-05-10 12:43:30'),
(22, 46, 87, '2023-05-12 15:16:55'),
(23, 46, 81, '2023-05-12 15:17:33');

-- --------------------------------------------------------

--
-- Table structure for table `freeasset`
--

CREATE TABLE `freeasset` (
  `assetID` int(11) NOT NULL,
  `assetName` varchar(50) NOT NULL,
  `assetGenre` varchar(50) NOT NULL,
  `assetPrice` varchar(100) NOT NULL,
  `version` varchar(10) NOT NULL DEFAULT '1.0',
  `assetDetails` text NOT NULL,
  `assetScreenshots` text NOT NULL,
  `assetTitle` varchar(50) NOT NULL,
  `assetTagline` varchar(255) NOT NULL,
  `assetClassification` varchar(20) NOT NULL,
  `assetReleaseStatus` varchar(20) NOT NULL,
  `assetTags` varchar(200) NOT NULL,
  `assetFile` varchar(255) NOT NULL,
  `assetLicense` varchar(20) NOT NULL,
  `assetCoverImg` varchar(255) NOT NULL,
  `assetVisibility` tinyint(1) NOT NULL,
  `assetVideoURL` varchar(255) NOT NULL,
  `assetType` varchar(30) NOT NULL,
  `assetStyle` varchar(20) NOT NULL,
  `assetCreatorID` int(11) NOT NULL,
  `fileSize` varchar(15) NOT NULL,
  `fileExtension` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `freeasset`
--

INSERT INTO `freeasset` (`assetID`, `assetName`, `assetGenre`, `assetPrice`, `version`, `assetDetails`, `assetScreenshots`, `assetTitle`, `assetTagline`, `assetClassification`, `assetReleaseStatus`, `assetTags`, `assetFile`, `assetLicense`, `assetCoverImg`, `assetVisibility`, `assetVideoURL`, `assetType`, `assetStyle`, `assetCreatorID`, `fileSize`, `fileExtension`, `created_at`) VALUES
(9, 'Sprout Lands 2', '', '30', '1.0', '', 'SS-Sprout Lands-0.png,SS-Sprout Lands-1.png', '', 'Cute pixel pastel farming asset pack for free', '2d', 'Released', 'pixel art, sprout la', 'Game-9.zip', 'proprietary', 'Cover-987.png', 0, 'https://www.youtube.com/watch?v=dnJUE2ptB5U', 'sprite', 'pixelart', 87, '', '', '2023-04-17 20:17:28'),
(10, 'Cozy People', '', '0', '1.0', '', 'SS-Cozy People-0.png,SS-Cozy People-1.png', '', 'Animated characters, hairstyles and clothes!', '3d', 'Released', 'food, sprites, icons', 'asset-Cozy People.zip', 'open-source', 'Cover-Cozy People.png', 0, 'https://www.youtube.com/watch?v=dnJUE2ptB5U', 'sprite', 'pixelart', 47, '', '', '2023-04-23 00:00:00'),
(17, 'Sprout Lands', '', '30', '1.0', '', 'SS-Sprout Lands-0.png,SS-Sprout Lands-1.png', '', 'Cute pixel pastel farming asset pack for free', '2d', 'Released', 'pixel art, sprout la', 'Game-9.zip', 'proprietary', 'Cover-9.png', 0, 'https://www.youtube.com/watch?v=dnJUE2ptB5U', 'sprite', 'pixelart', 87, '', '', '2023-01-08 00:00:00'),
(18, 'New Asset 2', '', '0', '1.0', '', 'SS-New Asset 2-0.jpg,SS-New Asset 2-1.jpg,SS-New Asset 2-2.png', '', 'cute pixel pastel farming asset pack', 'visualEffects', 'Released', 'fefef', 'asset-New Asset 2.zip', 'proprietary', 'Cover-New Asset 2.jpg', 0, 'https://www.youtube.com/watch?v=dnJUE2ptB5U', 'skybox', '8bit', 47, '', '', '2023-01-24 00:00:00'),
(19, 'Sprout Lands', '', '30', '1.0', '', 'SS-Sprout Lands-0.png,SS-Sprout Lands-1.png', '', 'Cute pixel pastel farming asset pack for free', '2d', 'Released', 'pixel art, sprout la', 'Game-9.zip', 'proprietary', 'Cover-9.png', 0, 'https://www.youtube.com/watch?v=dnJUE2ptB5U', 'sprite', 'pixelart', 87, '', '', '2022-01-28 00:00:00'),
(20, 'New Asset 4', '', '50.99', '1.0', '', 'SS-New Asset 4-0.jpg,SS-New Asset 4-1.jpg,SS-New Asset 4-2.jpg', '', 'cute pixel pastel farming asset pack', '3d', 'Released', 'grgr', 'asset-New Asset 4.zip', 'open-source', 'Cover-New Asset 4.jpg', 0, 'https://www.youtube.com/watch?v=dnJUE2ptB5U', 'sprite', 'pixelart', 47, '', '', '2022-01-11 00:00:00'),
(21, 'New Asset 5', '', '30', '1.0', '', 'SS-New Asset 5-0.png,SS-New Asset 5-1.png', '', 'cute pixel pastel farming asset pack', '3d', 'Released', 'brbr', 'asset-New Asset 5.zip', 'open-source', 'Cover-New Asset 5.png', 0, 'https://www.youtube.com/watch?v=dnJUE2ptB5U', 'sprite', 'pixelart', 78, '', '', '2023-01-01 00:00:00'),
(29, 'New Asset 1000', '', '34', '1.0', 'fefe&nbsp;', 'SS-New Asset 1000-0.jpg,SS-New Asset 1000-1.jpg,SS-New Asset 1000-2.jpg', '', 'Animated characters, hairstyles and clothes!', '3d', 'released', 'rhgth,jytjty', 'asset-New Asset 1000.zip', 'open-source', 'Cover-New Asset 1000.jpg', 0, 'https://www.youtube.com/watch?v=dnJUE2ptB5U', 'sprite', 'pixelart', 78, '', '', '2023-04-19 11:29:38'),
(31, 'Medieval Church', '', '45', '1.0', '', 'SS-Large Medieval Church-0.jpg,SS-Large Medieval Church-1.jpg,SS-Large Medieval Church-2.jpg', '', 'High Quality Textured church for your next medieval 3D game', '3d', 'Released', '', '', 'proprietary', 'Cover-Large Medieval Church.jpg', 0, '', 'sprite', 'lowpoly', 102, '', '', '2023-05-08 22:16:15'),
(32, 'Sci-Fi UI Pack', '', '0', '1.0', '', 'SS-Sci-Fi UI Pack-0.jpg,SS-Sci-Fi UI Pack-1.jpg,SS-Sci-Fi UI Pack-2.jpg', '', 'A sci-fi ui toolkit, which contains UI components along with a free demo scene', '2d', 'Released', 'scifi,ui,icons,backgrounds,sprite', '', 'proprietary', 'Cover-Sci-Fi UI Pack.jpg', 0, '', 'sprite', 'pixelart', 101, '', '', '2023-05-08 22:26:06'),
(33, 'Character Editor', '', '0', '1.0', '', 'SS-Character Editor-0.jpg,SS-Character Editor-1.jpg,SS-Character Editor-2.jpg,SS-Character Editor-3.jpg', '', 'Includes all possible releases and all extensions, the built-in inventory system and the full icon collection', '3d', 'released', '', '', 'open-source', 'Cover-Character Editor.jpg', 0, '', 'sprite', 'pixelart', 102, '', '', '2023-05-08 22:35:17'),
(34, 'Anime Combat Sounds', '', '50', '1.0', '', 'SS-Anime Combat Sounds-0.jpg,SS-Anime Combat Sounds-1.jpg', '', 'Epic sound effects great for Anime-fighting games, JRPG, and more!', 'audio', 'Released', 'anime,audio,sound track', 'Game-34.zip', 'proprietary', 'Cover-Anime Combat Sounds.jpg', 0, '', 'sprite', 'pixelart', 102, '', '', '2023-05-09 11:52:42'),
(35, '2D Platformer Tileset', '', '0', '1.0', '', 'SS-2D Platformer Tileset-0.jpg,SS-2D Platformer Tileset-1.jpg,SS-2D Platformer Tileset-2.jpg', '', 'Set of tiles and props that can be used to create platformer games', '2d', 'released', 'platformer,tiles,tilesets,2d', 'asset-2D Platformer Tileset.zip', 'proprietary', 'Cover-2D Platformer Tileset.jpg', 0, '', 'sprite', 'pixelart', 78, '', '', '2023-05-09 13:12:43'),
(36, 'Hospital Ward', '', '80', '1.0', '', 'SS-Hospital Ward-0.jpg,SS-Hospital Ward-1.jpg,SS-Hospital Ward-2.jpg', '', 'Ideal for medical training demos and hospital scenes for either high end video games or AR', '3d', 'released', 'hospital,3d,ward,asset,high quality,hd', 'asset-Hospital Ward.zip', 'open-source', 'Cover-Hospital Ward.jpg', 0, '', 'sprite', 'pixelart', 97, '', '', '2023-05-09 23:23:40'),
(37, 'Low Poly Hospital', '', '0', '1.0', '', 'SS-Low Poly Hospital-0.jpg,SS-Low Poly Hospital-1.jpg,SS-Low Poly Hospital-2.jpg,SS-Low Poly Hospital-3.jpg', '', 'This is a three-story building with an elevator and stairs between the floors, equipped rooms, wards and the surrounding area. The building is assembled from modular parts, all doors open.', '3d', 'released', '', 'asset-Low Poly Hospital.zip', 'open-source', 'Cover-Low Poly Hospital.jpg', 0, '', 'sprite', 'pixelart', 87, '', '', '2023-05-09 23:30:42'),
(38, 'Behaviour Designer', '', '45', '1.0', '', 'SS-Behaviour Designer-0.jpg,SS-Behaviour Designer-1.jpg,SS-Behaviour Designer-2.jpg', '', 'Behavior trees are used by AAA studios to create a lifelike AI. With Opsive\'s Behavior Designer, you can bring the power of behaviour trees to Unity!', '3d', 'released', '', 'asset-Behaviour Designer.zip', 'open-source', 'Cover-Behaviour Designer.jpg', 0, '', 'sprite', 'pixelart', 97, '', '', '2023-05-11 09:38:05'),
(39, 'Magica Cloth 2', '', '0', '1.0', '', 'SS-Magica Cloth 2-0.jpg,SS-Magica Cloth 2-1.jpg,SS-Magica Cloth 2-2.jpg', '', 'MagicaCloth2 is a cloth simulation that works with Unity DOTS. Available for both Transform and Mesh. It will be the successor version of the previous MagicaCloth.', '3d', 'Released', '', 'Game-39.zip', 'open-source', 'Cover-Magica Cloth 2.jpg', 0, '', 'sprite', 'pixelart', 78, '', '', '2023-05-11 10:29:23'),
(40, 'Pixel Art Fonts', '', '0', '1.0', '', 'SS-Pixel Art Fonts-0.jpg,SS-Pixel Art Fonts-1.jpg', '', 'Pixel Art Fonts is a collection of 8 unique hand crafted fonts, that require no plugins to use!', '2d', 'released', '', 'asset-Pixel Art Fonts.zip', 'open-source', 'Cover-Pixel Art Fonts.jpg', 0, '', 'font', 'pixelart', 87, '', '', '2023-05-11 14:42:55'),
(41, 'Dynamic Bone', '', '36', '1.0', '', 'SS-Dynamic Bone-0.jpg,SS-Dynamic Bone-1.jpg,SS-Dynamic Bone-2.jpg', '', 'Dynamic Bone applies physics to character bones or joints. With simple setup, your character hair, cloth, breasts or any part will move realistically.', '3d', 'released', '', 'asset-Dynamic Bone.zip', 'open-source', 'Cover-Dynamic Bone.jpg', 0, '', 'sprite', 'pixelart', 97, '', '', '2023-05-11 14:50:06');

-- --------------------------------------------------------

--
-- Table structure for table `freegame`
--

CREATE TABLE `freegame` (
  `gameID` int(11) NOT NULL,
  `gameName` varchar(255) NOT NULL,
  `releaseStatus` varchar(50) NOT NULL,
  `gameDetails` text NOT NULL,
  `gameScreenshots` text NOT NULL,
  `gameTrailor` varchar(255) NOT NULL,
  `gameTagline` varchar(255) NOT NULL,
  `gameClassification` varchar(50) NOT NULL,
  `gameTags` varchar(255) NOT NULL,
  `gameFeatures` varchar(255) NOT NULL,
  `platform` varchar(50) NOT NULL,
  `gameType` varchar(15) NOT NULL,
  `gameFile` varchar(255) NOT NULL,
  `gameVisibility` varchar(20) NOT NULL DEFAULT 'draft',
  `gameCoverImg` varchar(255) NOT NULL,
  `gameDeveloperID` int(11) NOT NULL,
  `minOS` varchar(255) NOT NULL,
  `minProcessor` varchar(255) NOT NULL,
  `minMemory` varchar(255) NOT NULL,
  `minStorage` varchar(255) NOT NULL,
  `minGraphics` varchar(255) NOT NULL,
  `other` varchar(255) NOT NULL,
  `recommendOS` varchar(255) NOT NULL,
  `recommendProcessor` varchar(255) NOT NULL,
  `recommendMemory` varchar(255) NOT NULL,
  `recommendStorage` varchar(255) NOT NULL,
  `recommendGraphics` varchar(255) NOT NULL,
  `gamePrice` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `gamePublisherID` int(11) NOT NULL DEFAULT 0,
  `jamSubmission` int(11) NOT NULL DEFAULT 0,
  `ActivityCheck` int(11) NOT NULL DEFAULT 3
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `freegame`
--

INSERT INTO `freegame` (`gameID`, `gameName`, `releaseStatus`, `gameDetails`, `gameScreenshots`, `gameTrailor`, `gameTagline`, `gameClassification`, `gameTags`, `gameFeatures`, `platform`, `gameType`, `gameFile`, `gameVisibility`, `gameCoverImg`, `gameDeveloperID`, `minOS`, `minProcessor`, `minMemory`, `minStorage`, `minGraphics`, `other`, `recommendOS`, `recommendProcessor`, `recommendMemory`, `recommendStorage`, `recommendGraphics`, `gamePrice`, `created_at`, `gamePublisherID`, `jamSubmission`, `ActivityCheck`) VALUES
(89, 'Albion Online Z1', 'Upcoming', '', '', '', 'Free medieval fantasy MMORPG, set in a medieval world', 'Action', '', '', 'Linux', 'Demo', '', 'public', '', 46, '', '', '', '', '', '', '', '', '', '', '', '0', '2023-04-03 19:55:08', 47, 0, 3),
(90, 'Stray', 'Upcoming', '<h3>ABOUT THIS GAME</h3>\n<br>\n<p>Lost, alone and separated from family, a stray cat must untangle an ancient mystery to escape a long-forgotten city.\n\nStray is a third-person cat adventure game set amidst the detailed, neon-lit alleys of a decaying cybercity and the murky environments of its seedy underbelly. Roam surroundings high and low, defend against unforeseen threats and solve the mysteries of this unwelcoming place inhabited by curious droids and dangerous creatures.\n\nSee the world through the eyes of a cat and interact with the environment in playful ways. Be stealthy, nimble, silly, and sometimes as annoying as possible with the strange inhabitants of this mysterious world.\n\nAlong the way, the cat befriends a small flying drone, known only as B-12. With the help of this newfound companion, the duo must find a way out.\n\nStray is developed by BlueTwelve Studio, a small team from the south of France mostly made up of cats and a handful of humans.<p>', 'SS-Stray-0.jpg,SS-Stray-1.jpg,SS-Stray-2.jpg', 'https://www.youtube.com/watch?v=dnJUE2ptB5U', 'follows a stray cat who falls into a walled city populated by robots', 'action', 'stray, cat, 3d', 'Puzzle', 'Linux', 'DLC', 'Game-Stray.zip', '0', 'Cover-Stray.jpg', 49, 'windows 7', 'Intel Core I3', '4 GB', '5 GB', 'mx330', 'Extra Content', 'windows 10', 'Intel Core I5', '8 GB', '10 GB', 'mx1650', '3.99', '2020-01-23 19:55:18', 0, 0, 3),
(91, 'Scarlet Nexus', 'Upcoming', '<h3>ABOUT THIS GAME</h3>\r\n<p>In the far distant future, a psionic hormone was discovered in the human brain, granting people extra-sensory powers and changed the world as we knew it. As humanity entered this new era, deranged mutants known as Others began to descend from the sky with a hunger for human brains. Highly resistant to conventional attack methods, extreme measures needed to be taken to battle the overwhelming threat and preserve humanity. Those with acute extra-sensory abilities, known as psionics, were our only chance to fight the onslaught from above. Since then, psionics have been scouted for their talents and recruited to the Other Suppression Force (OSF), humanity’s last line of defense.\r\n</p>\r\n<br>\r\n<p>Featuring a dual story, begin your adventure with either Yuito Sumeragi, an energetic recruit from a prestigious political family or Kasane Randall, the mysterious scout whose power and skill has gained great notoriety among the OSF. As their different experiences interweave with each other, it is only then that you will reveal the full story and unlock all the mysteries of a Brain Punk future caught between technology and psychic abilities in SCARLET NEXUS.\r\n</p>\r\n<br>\r\n<p>Kinetic Psychic Combat – Using psycho-kinetic abilities, the world around you becomes your greatest weapon. Lift, break and throw pieces of your environment to build your attack combos and lay waste to your enemies.\r\n\r\nExterminate the Others – Deranged mutants that descended from the sky, highly resistant to conventional attack methods and defenses. Tormented by the constant pain of their mutation, they seek brains of living organisms to calm their madness.\r\n\r\nDiscover a Brain Punk future – Explore and protect a futuristic Japanese landscape that combines inspirations from classic anime and western science fiction.\r\n\r\nA Dual Story Experience – Dive into a complex story of bonds, courage and heroism, crafted by minds behind the iconic Tales of Vesperia.</p>', 'SS-Scarlet Nexus-0.jpg,SS-Scarlet Nexus-1.jpg,SS-Scarlet Nexus-2.jpg', 'https://www.youtube.com/watch?v=dnJUE2ptB5U', 'Elite psionics each armed with a talent in psychokinesis', 'RPG', 'scarlet, nexus, rpg,thhrh', 'Leaderboard', 'Windows,Linux', 'Demo', 'Game-Scarlet Nexus.zip', '0', 'Cover-Scarlet Nexus.jpg', 46, '', '', '', '', '', '', '', '', '', '', '', '0', '2022-01-27 00:00:00', 0, 0, 3),
(92, 'Naruto Shippuden', 'Released', '<h3>ABOUT THIS GAME</h3>\r\n<br>\r\n<p>The latest opus in the acclaimed STORM series is taking you on a colourful and breathtaking ride. Take advantage of the totally revamped battle system and prepare to dive into the most epic fights you’ve ever seen in the NARUTO SHIPPUDEN: Ultimate Ninja STORM series!</p>\r\n<br>\r\n<p>\r\nPrepare for the most awaited STORM game ever created!</p>\r\n\r\n', 'SS-Naruto Shippuden-0.jpg,SS-Naruto Shippuden-1.jpg,SS-Naruto Shippuden-2.jpg', 'https://www.youtube.com/watch?v=dnJUE2ptB5U', 'The latest opus in the acclaimed STORM series is taking you ', 'action', 'naruto, anime, shippuden', 'Multi-Player', 'Windows', 'Base Game', 'Game-Naruto Shippuden.zip', '0', 'Cover-Naruto Shippuden.jpg', 49, 'windows 7', 'Intel Core I3', '4 GB', '5 GB', 'mx330', 'English', 'windows 10', 'Intel Core I5', '8 GB', '10 GB', 'mx1650', '7.99', '2022-01-04 00:00:00', 0, 0, 3),
(93, 'Monster Hunter Rise', 'Released', '<h3>ABOUT THIS GAME</h3>\r\n<br>\r\n<p>Rise to the challenge and join the hunt! In Monster Hunter Rise, the latest installment in the award-winning and top-selling Monster Hunter series, you’ll become a hunter, explore brand new maps and use a variety of weapons to take down fearsome monsters as part of an all-new storyline. The PC release also comes packed with a number of additional visual and performance enhancing optimizations.</p>\r\n<br>\r\n<h3>\r\nFerocious monsters with unique ecologies</h3>\r\n<p>\r\nHunt down a plethora of monsters with distinct behaviors and deadly ferocity. From classic returning monsters to all-new creatures inspired by Japanese folklore, including the flagship wyvern Magnamalo, you’ll need to think on your feet and master their unique tendencies if you hope to reap any of the rewards!</p>\r\n\r\n', 'SS-Monster Hunter Rise-0.jpg,SS-Monster Hunter Rise-1.jpg,SS-Monster Hunter Rise-2.jpg', 'https://www.youtube.com/watch?v=dnJUE2ptB5U', 'Rise to the challenge and join the hunt! In Monster Hunter Rise', 'Strategy', 'monster hunter, rpg, singlepla', 'Single-Player', 'Windows', 'Base Game', 'Game-Monster Hunter Rise.zip', '0', 'Cover-Monster Hunter Rise.png', 46, 'windows 7', 'Intel Core I3', '4 GB', '5 GB', 'mx330', '', 'windows 10', 'Intel Core I5', '8 GB', '10 GB', 'mx1650', '4', '2023-01-16 18:56:30', 0, 0, 3),
(95, 'Naruto Shippuden', 'Released', '<h3>ABOUT THIS GAME</h3>\r\n<br>\r\n<p>The latest opus in the acclaimed STORM series is taking you on a colourful and breathtaking ride. Take advantage of the totally revamped battle system and prepare to dive into the most epic fights you’ve ever seen in the NARUTO SHIPPUDEN: Ultimate Ninja STORM series!</p>\r\n<br>\r\n<p>\r\nPrepare for the most awaited STORM game ever created!</p>\r\n\r\n', 'SS-Naruto Shippuden-0.jpg,SS-Naruto Shippuden-1.jpg,SS-Naruto Shippuden-2.jpg', 'https://www.youtube.com/watch?v=dnJUE2ptB5U', 'The latest opus in the acclaimed STORM series is taking you ', 'Action', 'naruto, anime, shippuden', 'Single-Player,Multi-Player', 'Windows,MacOS', 'Base Game', 'Game-Naruto Shippuden.zip', '', 'Cover-Naruto Shippuden.jpg', 46, 'windows 7', 'Intel Core I3', '4 GB', '5 GB', 'mx330', 'English', 'windows 10', 'Intel Core I5', '8 GB', '10 GB', 'mx1650', '0', '2023-01-09 00:00:00', 0, 0, 3),
(96, 'Final Fantasy Vi', 'Upcoming', 'f<div><u>fefef</u>ffe<div>g</div><div>rgrg</div><div>g</div><div>g</div><div><u>grgrg</u></div></div>', 'SS-Final Fantasy V-0.jpg', 'https://www.youtube.com/watch?v=dnJUE2ptB5U', 'Remaster of CRISIS CORE featuring updated graphics, combats', 'Strategy', ',grgrg,hth,ff', 'Single-Player,Achievements', 'Windows,Linux', 'DLC', 'Game-Final Fantasy V.zip', '', 'Cover-Final Fantasy V.jpg', 46, '', '', '', '', '', '', '', '', '', '', '', '0', '2023-01-16 11:57:03', 0, 0, 3),
(181, 'grgr', 'Released', '', 'SS-grgr-0.jpg,SS-grgr-1.jpg', 'https://www.youtube.com/watch?v=dnJUE2ptB5U', 'follows a stray cat who falls into a walled city populated by robots, ', 'action', 'game,grgre', 'Multi Player', 'Windows', 'Demo', 'Game-grgr.zip', '0', 'Cover-grgr.jpg', 46, '', '', '', '', '', '', '', '', '', '', '', '0', '2023-01-24 00:00:00', 0, 0, 3),
(183, 'Albion Online New', 'early access', 'this game is <b>Free </b>so please play', 'SS-Albion Online New-0.jpg,SS-Albion Online New-1.jpg,SS-Albion Online New-2.jpg', 'https://www.youtube.com/watch?v=dnJUE2ptB5U', 'follows a stray cat who falls into a walled city populated by robots, ', 'simulation', 'free,albion', 'Single-Player,Multi-Player', 'Windows,Linux', 'Prologue', 'Game-Albion Online New.zip', 'draft', 'Cover-Albion Online New.jpg', 46, '', '', '', '', '', '', '', '', '', '', '', '0', '2023-04-19 08:38:16', 0, 0, 3),
(184, 'Loria', 'Released', '<b>ABOUT THIS GAME</b><div>Loria is a homage to classics from golden era of strategy games, with modern spin on controls and user experience.<br></div><div><br></div><div>Game introduces not just RTS elements but also RPG elements such as: hero units, collecting items and quest driven missions offers for a more interesting take on the RTS genre.<br></div><div><br></div><div>Goal of Loria is to take the best concepts from the classics and create a modern user-experience, intelligent AI, smooth controls, pleasing aesthetic and to add interesting content.<br></div><div><br></div><div>Loria was made with passion and love of the RTS genre, that has given us so many hours of fun.<br></div><div>Hopefully we have managed to recreate the experience and fun.<br></div><div><br></div><div>Loria features:<br></div><div><ul><li><li>2 playable races</li><li>2 campaigns with 8 missions each ( 16 missions in summary )</li><li>Entertaining story</li><li>Dozens of units, buildings and upgrades</li><li>6 unique heroes</li><li>Levelable heroes with backpack</li><li>Veteran units</li></li><li>Skirmish games</li></ul><br></div><div><b>Soundtrack is included as well in basic package.</b><br></div><div>About Multiplayer:<br></div><div><br></div>', 'SS-Loria81-0.jpg,SS-Loria81-1.png,SS-Loria81-2.jpg', 'https://www.youtube.com/watch?v=dnJUE2ptB5U', ' A homage to classics from golden era of strategy games', 'RPG', 'Loria,Story,Strategy,Retro', 'Single-Player', 'Windows,MacOS,Linux', 'Base Game', 'Game-Loria81.zip', 'public', 'Cover-Loria81.jpg', 81, 'Windows 7', 'Intel Core I3', '4 GB', '5 GB', 'mx330', 'English', 'Windows 10', 'Intel Core I5', '8 GB', '10 GB', 'mx1650', '0', '2023-04-20 21:55:44', 0, 0, 3),
(186, 'Fallout Shelter', 'Released', '<b>ABOUT THIS GAME</b><div>Fallout Shelter puts you in control of a state-of-the-art underground Vault from Vault-Tec. Build the perfect Vault, keep your Dwellers happy, and protect them from the dangers of the Wasteland.<br></div><div><br></div><div><b>BUILD THE PERFECT VAULT</b></div><div>Create a brighter future…underground! Select from a variety of modern-day rooms to turn an excavation beneath 2,000 feet of bedrock into the very picture of Vault Life.<br></div>', 'SS-Fallout Shelter82-0.jpg,SS-Fallout Shelter82-1.jpg,SS-Fallout Shelter82-2.jpg', 'https://www.youtube.com/watch?v=dnJUE2ptB5U', 'Puts you in control of a state-of-the-art underground Vault', 'Strategy', 'Free to Play,Survival,Base Building,Fallout Shelter', 'Single-Player', 'Windows', 'Base Game', 'Game-Fallout Shelter82.zip', 'public', 'Cover-Fallout Shelter82.jpg', 82, 'Windows 7', 'Intel Core I3', '4 GB', '5 GB', 'mx330', 'English', 'Windows 10', 'Intel Core I5', '8 GB', '10 GB', 'mx1650', '0', '2023-04-21 08:41:04', 0, 0, 3),
(187, 'Recourse', 'Released', '<b>ABOUT THIS GAME</b><div>Journey to a scenic arctic planet inhabited by experimental A.I. units and discarded robots. Play as Sleet, a sentient robot confronted with a series of puzzles and has little idea what is going on. Then meet Floe, an older A.I. unit, willing to help you proceed and unravel the mysteries of this beautiful desolate planet.<br></div><div><br></div><div><b>MORE ABOUT THE DEMO</b></div><div>Currently only five levels have been fully developed and implemented to be experience for free in this demo. <i><b>Having a publisher for this game is much appreciated.</b></i></div>', 'SS-Recourse81-0.jpg,SS-Recourse81-1.jpg,SS-Recourse81-2.jpg,SS-Recourse81-3.jpg', 'https://www.youtube.com/watch?v=dnJUE2ptB5U', 'Curiosity is a sign of intelligence. Lets see how far can yours go?', 'Action', 'Indie,Casual,Platformer,Puzzle,Kulla,Recourse', 'Single-Player,Puzzle', 'Windows', 'Demo', 'Game-Recourse81.zip', 'public', 'Cover-Recourse81.jpg', 81, 'Windows 7', 'Intel Core I3', '4 GB', '5 GB', 'mx330', 'English', 'Windows 10', 'Intel Core I5', '8 GB', '10 GB', 'mx1650', '0', '2023-04-21 11:05:33', 0, 0, 3),
(188, 'Dark Deception', 'Released', '<b>ABOUT DARK DECEPTION</b><div>Dark Deception is a story driven first-person horror action maze game that mixes the fast-paced style of classic arcade games with fun horror game design. Trapped in a dark world full of nightmarish mazes and ridiculous monsters, the only way out is to face the darkness and find a way to survive.<br></div><div><br></div><div>This is the first chapter in the Dark Deception story. Investigate and survive the first maze. Be careful though. You are not alone. There are monsters in there and they are looking for you. You will face your fears. The question is - what are you afraid of?</div>', 'SS-Dark Deception46-0.jpg,SS-Dark Deception46-1.jpg,SS-Dark Deception46-2.jpg', '', 'Death awaits you in Dark Deception, There is nowhere to hide anymore', 'Adventure', 'horror,fps,first-person,multiplayer,blood,fear,night', 'Multi-Player', 'Windows', 'Base Game', 'Game-Dark Deception46.zip', 'public', 'Cover-Dark Deception46.jpg', 46, 'Windows 7', 'Intel Core I3', '4 GB', '5 GB', 'mx330', 'English', 'Windows 10', 'Intel Core I5', '8 GB', '10 GB', 'mx1650', '30', '2023-04-21 16:24:37', 0, 0, 3),
(189, 'Path of Exile', 'Released', '<b>ABOUT THE GAME</b><div>You are an Exile, struggling to survive on the dark continent of Wraeclast, as you fight to earn power that will allow you to exact your revenge against those who wronged you. Created by hardcore gamers, Path of Exile is an online Action RPG set in a dark fantasy world. With a focus on visceral action combat, powerful items and deep character customization, Path of Exile is completely free and will never be pay-to-win.<br></div><div><br></div><div><b>KEY FEATURES</b></div><div><ul><li><b>Freedom. Power. Revenge.</b></li></ul>Banished for your misdeeds to the dark, brutal world of Wraeclast, you play as the Duelist, Witch, Ranger, Templar, Marauder, Shadow or the Scion class. From forsaken shores through to the ruined city of Sarn, explore Wraeclast and uncover the ancient secrets waiting for you.<br></div>', 'SS-Path of Exile82-0.jpg,SS-Path of Exile82-1.jpg,SS-Path of Exile82-2.jpg,SS-Path of Exile82-3.jpg', '', 'Struggling to survive on the vast dark continent of Wraeclast', 'RPG', 'rpg,hack and slash,action,hicraft,gore,blood', 'Multi-Player,Achievements,Multiplayer-Co-op', 'Windows,MacOS', 'Base Game', 'Game-Path of Exile82.zip', 'public', 'Cover-Path of Exile82.jpg', 82, '', '', '', '', '', '', '', '', '', '', '', '49.99', '2023-04-21 23:29:43', 0, 0, 3),
(191, 'Deltarune', 'Released', '', 'SS-Deltarune46-0.jpg,SS-Deltarune46-1.jpg,SS-Deltarune46-2.jpg', '', 'Meet new and old characters in a tale that steps closer to its end', 'RPG', 'Story Rich,Pixel Graphics,Funny,2D', 'Single-Player', 'Windows', 'Base Game', 'Game-Deltarune46.zip', 'draft', 'Cover-Deltarune46.jpg', 46, '', '', '', '', '', '', '', '', '', '', '', '0', '2023-04-26 11:57:53', 0, 0, 3),
(195, 'Red Hot Vengeance', 'Released', '', 'SS-Red Hot Vengeance46-0.png,SS-Red Hot Vengeance46-1.jpg,SS-Red Hot Vengeance46-2.jpg,SS-Red Hot Vengeance46-3.jpg', '', 'He had one rule: No killing women or children. Beware of hitman', 'Action', 'Free to Play,Violent,Gore,Blood,Indie', 'Single-Player,Puzzle', 'Windows', 'Base Game', 'Game-Red Hot Vengeance46.zip', 'public', 'Cover-Red Hot Vengeance46.jpg', 46, '', '', '', '', '', '', '', '', '', '', '', '0', '2023-05-02 00:24:37', 0, 67, 3),
(196, 'Gravitas', 'Released', '', 'SS-Gravitas82-0.jpg,SS-Gravitas82-1.jpg,SS-Gravitas82-2.jpg,SS-Gravitas82-3.jpg', 'https://www.youtube.com/watch?v=dnJUE2ptB5U', 'A short-first-person puzzle game platforming game that transports  ', 'Adventure', 'puzzle,puzzle platformer,indie,platformer', 'Single-Player,Puzzle,Achievements', 'Windows', 'Base Game', 'Game-Gravitas82.zip', 'public', 'Cover-Gravitas82.jpg', 82, '', '', '', '', '', '', '', '', '', '', '', '40', '2023-05-04 12:03:39', 0, 0, 3),
(197, 'Island Saver', 'Released', '', 'SS-Island Saver83-0.jpg,SS-Island Saver83-1.jpg,SS-Island Saver83-2.jpg', '', 'A group of amazing islands need your help! Horrid plastic waste has w', 'Action', '', 'Multi-Player,Multiplayer-Co-op', 'Windows', 'Base Game', 'Game-Island Saver83.zip', 'public', 'Cover-Island Saver83.jpg', 83, '', '', '', '', '', '', '', '', '', '', '', '59.99', '2023-05-04 12:56:38', 0, 0, 3),
(198, 'Donut County', 'Released', '', 'SS-Donut County81-0.jpg,SS-Donut County81-1.jpg,SS-Donut County81-2.jpg', 'https://www.youtube.com/watch?v=dnJUE2ptB5U', 'A story-based physics puzzle game where you play as an an ever-growin', 'Simulation', 'funny,casual,cute,puzzle,physics,indie', 'Single-Player', 'MacOS', 'Base Game', 'Game-Donut County81.zip', 'public', 'Cover-Donut County81.jpg', 81, '', '', '', '', '', '', '', '', '', '', '', '30', '2023-05-04 17:31:24', 0, 0, 3),
(199, 'Biphase', 'Released', '', 'SS-Biphase46-0.jpg,SS-Biphase46-1.jpg,SS-Biphase46-2.jpg,SS-Biphase46-3.jpg', 'https://www.youtube.com/watch?v=dnJUE2ptB5U', '2D platform jumping game with exploration and puzzles as its core', 'Action', 'indie,minimalist,tool jam,abstract,freetoplay,casual', 'Single-Player,Puzzle', 'Windows', 'Base Game', 'Game-Biphase46.zip', 'public', 'Cover-Biphase46.jpg', 46, '', '', '', '', '', '', '', '', '', '', '', '0', '2023-05-04 23:48:29', 0, 62, 3),
(200, 'Sprout', 'Released', '', 'SS-Sprout92-0.jpg,SS-Sprout92-1.jpg', '', 'A mini precision-platformer built for speed-running. Run, jump and dash your way through 100 levels across five unique lands, and restore your world to its former glory.', 'Strategy', 'indie,casual,adventure,strategy,free,gamejam,tool jam', 'Single-Player', 'Windows', 'Base Game', 'Game-Sprout92.zip', 'public', 'Cover-Sprout92.jpg', 92, '', '', '', '', '', '', '', '', '', '', '', '0', '2023-05-05 16:55:29', 0, 62, 3),
(201, 'Hawken', 'Released', '', 'SS-Hawken83-0.jpg,SS-Hawken83-1.jpg,SS-Hawken83-2.jpg', '', 'Multiplayer mech first-person shooter video game with an unique play style and game modes', 'Action', 'multiplayer,fps,first person,mech', 'Multi-Player,Achievements', 'Windows,MacOS', 'Base Game', 'Game-Hawken83.zip', 'public', 'Cover-Hawken83.jpg', 83, '', '', '', '', '', '', '', '', '', '', '', '59.99', '2023-05-05 19:49:22', 0, 0, 3),
(202, 'Firestone', 'Released', '', 'SS-Firestone83-0.png,SS-Firestone83-1.jpg,SS-Firestone83-2.jpg', '', 'Firestone: Online Idle RPG is a multiplayer fantasy game with idle rpg mechanics. Collect heroes, upgrade their skills, and sent them in AFK battles or go on an incremental clicker frenzy onwards', 'RPG', 'idle,idler,party-based,rpg,action rpg', 'Online-Co-op', 'Windows', 'Demo', 'Game-Firestone83.zip', 'public', 'Cover-Firestone83.jpg', 83, '', '', '', '', '', '', '', '', '', '', '', '0', '2023-05-05 19:55:17', 0, 0, 3),
(203, 'Room to Grow', 'Released', '', 'SS-Room to Grow83-0.jpg,SS-Room to Grow83-1.jpg,SS-Room to Grow83-2.jpg', '', 'Tackle thorny problems in this plant pushing puzzle game. Learn to maneuver like a cactus as you grow your way back to the desert!', 'Strategy', 'puzzle,difficult,sokoban,indie,singleplayer', 'Single-Player', 'Windows', 'Base Game', 'Game-Room to Grow83.zip', 'public', 'Cover-Room to Grow83.png', 83, '', '', '', '', '', '', '', '', '', '', '', '0', '2023-05-05 20:00:44', 0, 62, 3),
(204, 'Super Auto Pets', 'Released', '', 'SS-Super Auto Pets93-0.png,SS-Super Auto Pets93-1.jpg,SS-Super Auto Pets93-2.jpg', '', 'Build the strongest team of pets and tussle with your friends!', 'Strategy', 'auto battler,free to play,multiplayer', 'Multi-Player,Achievements', 'Windows', 'Base Game', 'Game-Super Auto Pets93.zip', 'public', 'Cover-Super Auto Pets93.jpg', 93, '', '', '', '', '', '', '', '', '', '', '', '0', '2023-05-05 20:40:29', 0, 62, 3),
(205, 'Fulfillment', 'Released', '', 'SS-Fulfillment81-0.jpg,SS-Fulfillment81-1.jpg,SS-Fulfillment81-2.jpg', '', 'Exciting Adventure About the Joys of Working at an Amazing Fulfillment Center! Short, social commentary game that is 100% free, no micro-transactions.', 'Adventure', 'casual,action,tooljam,adventure,gamejam,submission,indie', 'Single-Player', 'Windows', 'Base Game', 'Game-Fulfillment81.zip', 'public', 'Cover-Fulfillment81.jpg', 81, '', '', '', '', '', '', '', '', '', '', '', '0', '2023-05-06 13:15:23', 0, 62, 3),
(206, 'Kinoko', 'Released', '', 'SS-Kinoko81-0.jpg,SS-Kinoko81-1.jpg,SS-Kinoko81-2.jpg,SS-Kinoko81-3.jpg', '', 'The crisp winter air fills your lungs, but you can feel the earth underneath calling for you. The warmth from the sun melts the snow away and flowers bloom. Spring is here.', 'Adventure', 'casual,indie,cute', 'Single-Player', 'Windows,Linux', 'Base Game', 'Game-Kinoko81.zip', 'public', 'Cover-Kinoko81.jpg', 81, '', '', '', '', '', '', '', '', '', '', '', '35', '2023-05-06 13:24:12', 0, 0, 3),
(207, 'Wakfu', 'Released', '', 'SS-Wakfu93-0.jpg,SS-Wakfu93-1.jpg,SS-Wakfu93-2.jpg,SS-Wakfu93-3.jpg', '', 'STEP INTO A LIMITLESS UNIVERSE Touchdown in the World of Twelve and set off on a great adventure in WAKFU - an original massively multiplayer online role playing universe', 'RPG', 'mmorpg,anime,top down', 'Multi-Player,Online-Co-op,Multiplayer-Co-op,MMO', 'Windows', 'Base Game', 'Game-Wakfu93.zip', 'public', 'Cover-Wakfu93.jpg', 93, '', '', '', '', '', '', '', '', '', '', '', '0', '2023-05-06 13:33:04', 0, 0, 3),
(208, 'Spiral Knights', 'Released', '', 'SS-Spiral Knights82-0.jpg,SS-Spiral Knights82-1.jpg,SS-Spiral Knights82-2.jpg,SS-Spiral Knights82-3.jpg', '', 'Join the ranks of the Spiral Knights. Stranded on an alien world, you must explore the ever-changing Clockworks beneath its surface.', 'RPG', 'free,action,rpg,tool jam,gamejam', 'Single-Player', 'Windows', 'Base Game', 'Game-Spiral Knights82.zip', 'public', 'Cover-Spiral Knights82.jpg', 82, '', '', '', '', '', '', '', '', '', '', '', '0', '2023-05-06 21:05:37', 0, 62, 3),
(209, 'Eternal Senia', 'Early Access', '', 'SS-Eternal Senia95-0.jpg,SS-Eternal Senia95-1.jpg,SS-Eternal Senia95-2.jpg,SS-Eternal Senia95-3.jpg', '', 'Thoughts and expectations of action role playing game', 'RPG', 'action,rpg,anime,protagonist', 'Multi-Player,MMO', 'Windows', 'Base Game', 'Game-Eternal Senia95.zip', 'public', 'Cover-Eternal Senia95.jpg', 95, '', '', '', '', '', '', '', '', '', '', '', '56.49', '2023-05-06 23:12:08', 0, 0, 3),
(210, 'Anacrusis', 'Released', '', 'SS-Anacrusis95-0.jpg,SS-Anacrusis95-1.jpg,SS-Anacrusis95-2.jpg,SS-Anacrusis95-3.jpg', '', 'A four-player, mod-friendly, cooperative first-person shooter set aboard a massive starship stranded at the edge of space.', 'Action', 'fps,shooter,multiplayer', 'Multi-Player', 'Windows', 'Base Game', 'Game-Anacrusis95.zip', 'public', 'Cover-Anacrusis95.jpg', 95, '', '', '', '', '', '', '', '', '', '', '', '0', '2023-05-06 23:16:17', 0, 62, 3),
(211, 'GTFO', 'Released', '', 'SS-GTFO82-0.jpg,SS-GTFO82-1.jpg,SS-GTFO82-2.jpg', '', 'GTFO is an extreme cooperative horror shooter that throws you from gripping suspense to explosive action in a heartbeat. Stealth, strategy, and teamwork are necessary to survive.', 'Action', '', 'Multi-Player', 'Windows', 'Demo', 'Game-GTFO82.zip', 'public', 'Cover-GTFO82.jpg', 82, '', '', '', '', '', '', '', '', '', '', '', '0', '2023-05-07 11:27:04', 100, 0, 3),
(212, 'Undefeated', 'Released', '', 'SS-Undefeated46-0.jpg,SS-Undefeated46-1.jpg,SS-Undefeated46-2.jpg,SS-Undefeated46-3.jpg', '', 'Become an invincible hero with unlimited super powers on UNDEFEATED!', 'Action', 'demo,open world,super hero ,action', 'Single-Player', 'Windows', 'Demo', 'Game-Undefeated46.zip', 'public', 'Cover-Undefeated46.jpg', 46, '', '', '', '', '', '', '', '', '', '', '', '0', '2023-05-07 19:13:38', 99, 0, 3),
(213, 'Dwarf Fortress', 'Released', '', 'SS-Dwarf Fortress83-0.jpg,SS-Dwarf Fortress83-1.jpg,SS-Dwarf Fortress83-2.jpg', '', 'The deepest, most intricate simulation of a world that has ever been created. Build a fortress and try to help your dwarves survive against a deeply generat', 'Simulation', 'pixel,simulation,free', 'Single-Player', 'Windows,Linux', 'Base Game', 'Game-Dwarf Fortress83.zip', 'public', 'Cover-Dwarf Fortress83.jpg', 83, '', '', '', '', '', '', '', '', '', '', '', '0', '2023-05-10 07:17:32', 0, 0, 3),
(214, 'Expendabros', 'Released', '', 'SS-Expendabros46-0.jpg,SS-Expendabros46-1.jpg,SS-Expendabros46-2.jpg,SS-Expendabros46-3.jpg,SS-Expendabros46-4.jpg', '', 'The Expendabros have assembled and set their sights on the forces of ruthless arms dealer Conrad Stonebanks in the forests of Eastern Europe. ', 'Action', 'pixel,coop,2d', 'Co-op,Online-Co-op', 'Windows', 'Base Game', 'Game-Expendabros46.zip', 'public', 'Cover-Expendabros46.jpg', 46, '', '', '', '', '', '', '', '', '', '', '', '40', '2023-05-10 13:57:16', 0, 0, 3),
(215, 'Bomber Crew', 'Released', '', 'SS-Bomber Crew83-0.jpg,SS-Bomber Crew83-1.png', '', 'Chocks away! Bomber Crew is a strategic simulation game, where picking the right crew and keeping your bomber in tip top shape is the difference between completing your mission or losing it all!', 'Action', '', 'Single-Player', 'Linux', 'Demo', 'Game-Bomber Crew83.zip', 'public', 'Cover-Bomber Crew83.jpg', 83, '', '', '', '', '', '', '', '', '', '', '', '0', '2023-05-11 16:01:23', 0, 0, 3),
(216, 'Cloud Climber', 'Released', '', 'SS-Cloud Climber81-0.jpg,SS-Cloud Climber81-1.jpg,SS-Cloud Climber81-2.jpg', '', 'A surreal first person walking sim about the end of humanity. Explore magnificent sky-bound ruins, and learn why they were built.', 'Adventure', '', 'Single-Player,Achievements', 'Windows', 'Demo', 'Game-Cloud Climber81.zip', 'public', 'Cover-Cloud Climber81.jpg', 81, '', '', '', '', '', '', '', '', '', '', '', '0', '2023-05-11 16:28:06', 0, 0, 3),
(217, 'Crew 2', 'Released', '', 'SS-Crew 246-0.jpg,SS-Crew 246-1.jpg,SS-Crew 246-2.jpg', '', 'Take on the American motorsports scene as you explore and dominate the land, air, and sea across the entire USA', 'Action', 'ergre', 'Single-Player', 'Windows', 'Base Game', 'Game-Crew 246.zip', 'public', 'Cover-Crew 246.jpg', 46, '', '', '', '', '', '', '', '', '', '', '', '40', '2023-05-13 08:39:59', 0, 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `gamecart`
--

CREATE TABLE `gamecart` (
  `gameID` int(11) NOT NULL,
  `cartID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gamegenre`
--

CREATE TABLE `gamegenre` (
  `gameID` int(11) NOT NULL,
  `gameGenre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gamejam`
--

CREATE TABLE `gamejam` (
  `gameJamID` int(11) NOT NULL,
  `submissionStartDate` datetime NOT NULL,
  `submissionEndDate` datetime NOT NULL,
  `jamContent` text NOT NULL,
  `votingEndDate` datetime NOT NULL,
  `jamTitle` varchar(255) NOT NULL,
  `jamTagline` varchar(255) NOT NULL,
  `jamType` varchar(20) NOT NULL,
  `jamCriteria` varchar(255) NOT NULL,
  `jamVisibility` varchar(20) NOT NULL,
  `maxParticipants` int(11) NOT NULL,
  `canJoinAfterStarted` int(11) NOT NULL,
  `jamHostID` int(11) NOT NULL,
  `jamVoters` varchar(30) NOT NULL,
  `jamTwitter` varchar(255) NOT NULL,
  `jamCoverImg` varchar(255) NOT NULL,
  `joinedCount` int(11) NOT NULL DEFAULT 0,
  `submissionsCount` int(11) NOT NULL DEFAULT 0,
  `jamTheme` varchar(250) NOT NULL,
  `ratings` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gamejam`
--

INSERT INTO `gamejam` (`gameJamID`, `submissionStartDate`, `submissionEndDate`, `jamContent`, `votingEndDate`, `jamTitle`, `jamTagline`, `jamType`, `jamCriteria`, `jamVisibility`, `maxParticipants`, `canJoinAfterStarted`, `jamHostID`, `jamVoters`, `jamTwitter`, `jamCoverImg`, `joinedCount`, `submissionsCount`, `jamTheme`, `ratings`) VALUES
(53, '2023-04-08 16:55:00', '2023-04-13 16:55:00', ' This is an online game jam, so anyone, from anywhere, aged 13 or older can enter the jam. (Those younger can take part, as long as a parent or guardian uploads the game).\r\n\r\nYou can work alone or in teams. There is no limit on the number of people per team and people can be in multiple teams.', '2023-04-17 16:55:00', 'GMTK GameJam 2023', '48 hour game development marathon', 'Non-Ranked', 'Creativity', 'Public', 0, 1, 89, 'Public', '#gmtk', 'Cover-GMTK GameJam.jpg', 0, 0, '', 0),
(55, '2023-04-20 12:00:00', '2023-01-03 12:00:00', ' Genshin Impact takes place in the fantasy world of Teyvat, home to seven nations, each of which is tied to a different element and ', '2023-04-30 12:00:00', 'Brackeys Jam IV', 'This is a gamejam', 'Non-Ranked', 'Creativity', 'Draft', 40, 1, 79, 'Public', '#brackeys', 'Cover-GameJam.jpg', 0, 0, '', 0),
(56, '2023-04-28 16:55:00', '2023-04-20 16:55:00', ' majhcdsjc vmnb', '2023-05-02 00:00:00', 'Community Jam I', 'grg', 'Ranked', 'mdhcbgd', 'Draft', 67, 1, 79, 'Public', 'mhcbds', 'Cover-majbhdhjsa.jpg', 0, 0, '', 0),
(57, '2022-12-01 16:55:00', '2022-12-08 16:55:00', '<p>Lost, alone and separated from family, a stray cat must untangle an ancient mystery to escape a long-forgotten city.\r\n\r\nStray is a third-person cat adventure game set amidst the detailed, neon-lit alleys of a decaying cybercity and the murky environments of its seedy underbelly. Roam surroundings high and low, defend against unforeseen threats and solve the mysteries of this unwelcoming place inhabited by curious droids and dangerous creatures.\r\n\r\nSee the world through the eyes of a cat and interact with the environment in playful ways. Be stealthy, nimble, silly, and sometimes as annoying as possible with the strange inhabitants of this mysterious world.\r\n\r\nAlong the way, the cat befriends a small flying drone, known only as B-12. With the help of this newfound companion, the duo must find a way out.\r\n\r\nStray is developed by BlueTwelve Studio, a small team from the south of France mostly made up of cats and a handful of humans.<p>\r\n<br>\r\n<p>Lost, alone and separated from family, a stray cat must untangle an ancient mystery to escape a long-forgotten city.\r\n\r\nStray is a third-person cat adventure game set amidst the detailed, neon-lit alleys of a decaying cybercity and the murky environments of its seedy underbelly. Roam surroundings high and low, defend against unforeseen threats and solve the mysteries of this unwelcoming place inhabited by curious droids and dangerous creatures.\r\n\r\nSee the world through the eyes of a cat and interact with the environment in playful ways. Be stealthy, nimble, silly, and sometimes as annoying as possible with the strange inhabitants of this mysterious world.\r\n\r\nAlong the way, the cat befriends a small flying drone, known only as B-12. With the help of this newfound companion, the duo must find a way out.\r\n\r\nStray is developed by BlueTwelve Studio, a small team from the south of France mostly made up of cats and a handful of humans.<p>', '2023-12-14 16:55:00', 'GMTK GameJam', '48 hour game development marathon', 'Non-Ranked', 'Creativity', 'Public', 0, 1, 89, 'Public', '#gmtk', 'Cover-GMTK GameJam.jpg', 0, 7, '', 0),
(58, '2023-01-02 12:00:00', '2023-05-16 00:00:00', ' Genshin Impact takes place in the fantasy world of Teyvat, home to seven nations, each of which is tied to a different element and ', '2023-01-04 12:00:00', 'GMTK GameJam', 'This is a gamejam', 'Non-Ranked', 'Creativity', 'Draft', 40, 1, 79, 'Public', '#brackeys', 'Cover-GameJam.jpg', 0, 7, '', 0),
(59, '2023-05-16 16:55:00', '2023-12-08 16:55:00', ' majhcdsjc vmnb', '2023-05-26 00:00:00', 'Go Godot Jam 4', 'grg', 'Ranked', 'mdhcbgd', 'Draft', 67, 1, 89, 'Public', 'mhcbds', 'Cover-majbhdhjsa.jpg', 1, 7, '', 0),
(60, '2023-01-02 12:00:00', '2023-01-03 12:00:00', ' Genshin Impact takes place in the fantasy world of Teyvat, home to seven nations, each of which is tied to a different element and ', '2023-01-04 12:00:00', 'GameJam', 'This is a gamejam', 'Non-Ranked', 'Creativity', 'Draft', 40, 1, 89, 'Public', '#brackeys', 'Cover-GameJam.jpg', 0, 7, '', 0),
(61, '2023-12-01 16:55:00', '2023-12-08 16:55:00', ' majhcdsjc vmnb', '0000-00-00 00:00:00', 'majbhdhjsa', 'grg', 'Ranked', 'mdhcbgd', 'Draft', 67, 1, 89, 'Public', 'mhcbds', 'Cover-majbhdhjsa.jpg', 0, 7, '', 0),
(62, '2023-05-04 16:55:00', '2023-05-07 16:55:00', 'gregr <b>rhrtthtrhrth </b>htrt <u>trhthththh </u>htrtttrthrthr 11', '2023-05-10 16:55:00', 'The Tool Jam 3', 'Try your best and build a game under the theme that evolves around tools', 'Ranked', 'Creativity', 'Public', 0, 0, 79, 'Public', '#tooljam ', 'Cover-The Tool Jam 3.jpg', 7, 7, 'Tool are Friends', 78),
(63, '2023-03-12 16:55:00', '2023-03-18 16:55:00', '', '2023-03-20 16:55:00', 'Kenney Jam', 'Make a game using Kenney Assets in 24 hours', 'Ranked', 'Creativity', 'Public', 0, 0, 89, 'Public', '#kenny', 'Cover-Kenney Jam.png', 0, 7, 'Growth', 0),
(64, '2023-03-22 16:55:00', '2023-03-24 16:55:00', '', '2023-03-28 16:55:00', 'Linux GameJam 2023', 'Make a game on or for GNU/Linux using any framework or engine', 'Ranked', 'Creativity', 'Public', 0, 0, 89, 'Public', '#kenny', 'Cover-Linux GameJam 2023.png', 0, 7, 'Strong Together', 0),
(65, '2023-05-11 16:55:00', '2023-05-13 16:55:00', '', '2023-05-16 16:55:00', 'Scream Zone Jam 2023', 'The horrifically wonderful horror jam returns', 'Ranked', '', 'Draft', 0, 0, 89, 'Public', '', 'Cover-Scream Zone Jam 2023.png', 4, 7, 'Progress', 0),
(66, '2023-05-11 16:55:00', '2023-05-14 16:55:00', '', '2023-05-17 16:55:00', 'CC Jam 2', 'fefefefefef', 'Ranked', '', 'Draft', 0, 0, 79, 'Public', '', 'Cover-Metoer Shower Jam 2023.png', 0, 7, 'Progress', 0),
(67, '2023-04-26 16:55:00', '2023-05-01 16:55:00', '', '2023-05-02 16:55:00', 'Bullet Hell Jam 2023', 'Spend 10 days cramming as many bullets/projectiles as you can into a short game', 'Ranked', 'Theme, Audio, Visual, Fun', 'Draft', 0, 0, 79, 'Public', '#bulletHell', 'Cover-Bullet Hel Jam 2023.jpg', 1, 7, 'Limited', 0);

-- --------------------------------------------------------

--
-- Table structure for table `gamer`
--

CREATE TABLE `gamer` (
  `gamerID` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `accountStatus` int(11) NOT NULL DEFAULT 1,
  `avatar` varchar(255) NOT NULL,
  `userRole` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `loginDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `logoutTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `verified` int(1) NOT NULL DEFAULT 0,
  `token` varchar(255) NOT NULL,
  `trustrank` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gamer`
--

INSERT INTO `gamer` (`gamerID`, `email`, `password`, `accountStatus`, `avatar`, `userRole`, `username`, `firstName`, `lastName`, `loginDate`, `logoutTime`, `verified`, `token`, `trustrank`) VALUES
(46, '7prend@gmail.com', '$2y$10$28/Xs048i8U8nOr9xdhzaO3VEMWZxxL8maz1lzUf1XYlGIre41wFW', 1, 'avatar1.png', 'game developer', 'Beidou', 'Kavindu', 'Priyanath', '2023-02-09 07:45:17', '2023-02-09 07:45:17', 1, '', 2),
(47, 'ypasindu11@gmail.com', '$2y$10$X6vRwMBT21PqzM57sr3fPeBK7gXyaUYiRYWEioYg/La9Sb4iPvI5.', 1, 'avatar3.png', 'game publisher', 'YPasi', 'Yeshan', 'pasindu', '2023-02-09 10:08:12', '2023-02-09 10:08:12', 1, '', 2),
(48, 'nadeedarshika1999@gmail.com', '$2y$10$IwPRWNFoePVsvPrzle.DyO9.8MxiOC1PAM/qVuwmJnIXE7UkRp/SS', 1, 'avatar3.png', 'asset creator', 'Nadee', 'Nadee', 'Dharshi', '2023-02-09 14:57:04', '2023-02-09 14:57:04', 0, '', 2),
(51, 'kavindupriyanath@gmail.com', '$2y$10$skpVtooDwBUkpWwlLpxATeSiM0NMG7D5tkJYJKmmQ4trlMvhAr4jm', 1, 'avatar3.png', 'game developer', 'Prend', 'John', 'Cena', '2023-02-21 15:13:19', '2023-02-21 15:13:19', 1, '301ddcc8122c834473cf07d5493fe159', 2),
(52, 'kimalrasanka321@gmail.com', '$2y$10$3moxbOLzKlvkAKVnCHLxS.atHdVSAWsJrqyIA/Ki9LXWrFaZKT4Mu', 1, 'avatar2.png', 'gamer', 'KRDA', 'kimal', 'xsx', '2023-02-28 06:45:33', '2023-02-28 06:45:33', 1, '', 2),
(53, 'klhimashanupama@gmail.com', '$2y$10$B.F4OXoJEJIWcmHKvofCRuCN8FooMdd3u8jDIn8BhvsJVPaQs0VD6', 1, 'avatar4.png', 'gamer', 'Hima', 'Himash', 'Anu', '2023-02-28 16:24:11', '2023-02-28 16:24:11', 1, '', 2),
(78, 'akiladharmadasa1.1@gmail.com', '$2y$10$GPdfkGBN0VVqHsFnd5swGu.TgeDM.rixafWAHmLmhsSvvLcRqZG1e', 1, 'avatar2.png', 'asset creator', 'akilaks', 'akila', 'gona', '2023-04-08 06:10:47', '2023-04-08 06:10:47', 1, '', 2),
(79, 'krdaadrk@gmail.com', '$2y$10$TckipfGE5ZYpX4hiP6C1Ru4Ls48/3uu0LBMB8Lz/CqXPlBNaZ4HaO', 1, 'avatar4.png', 'gamejam organizer', 'KLHA', 'krda1', 'adrk2', '2023-04-15 05:16:25', '2023-04-15 05:16:25', 1, '', 2),
(80, 'tkulith@gmail.com', '$2y$10$yNJAErwvKixcAYquMChKYOynfHEVQ5U0sMw5FTk0ZV9iocL6rbRpO', 1, 'avatar4.png', 'game developer', 'Hyperkulla', 'Kulith', 'Thamuditha', '2023-04-20 16:07:05', '2023-04-20 16:07:05', 0, '', 2),
(81, 'dukerane69@gmail.com', '$2y$10$XrgXA7THJcHEtr0LwM8xvuaXk3t4S8nA378KoBOMk1c8tKlSvAJqS', 1, 'avatar4.png', 'game developer', 'Kulla123', 'Kulith', 'Thamuditha', '2023-04-20 16:10:10', '2023-04-20 16:10:10', 1, '', 2),
(82, 'hicraft1112@gmail.com', '$2y$10$fZ/8rWDnDsraekd6igNZhuN7114Qn.is4TcCiARCeRdYZV8w289CK', 1, 'avatar1.png', 'game developer', 'Hicraft', 'Hi', 'Craft', '2023-04-20 17:00:03', '2023-04-20 17:00:03', 1, '', 2),
(83, 'lasathtiktak@gmail.com', '$2y$10$sKeGKfzuhGRllFl9wr.tceJ8qZaXrmse3fbTJW.3/jjYndiVIiCDK', 1, 'avatar2.png', 'game developer', 'Lasa', 'Tharindu', 'Lasath', '2023-04-21 03:30:22', '2023-04-21 03:30:22', 1, '', 2),
(84, 'somasira83@gmail.com', '$2y$10$cIOyyp/HlJRMwsRE4aFwje.5jsX8PgBE.6bnbTSSmujsSOnihN7Ai', 1, 'avatar4.png', 'gamer', 'Escanor', 'Seven', 'Sin', '2023-04-22 14:44:57', '2023-04-22 14:44:57', 1, '', 2),
(86, 'sinharasa7@gmail.com', '$2y$10$PEbhk8sh.Zr35K2S0WCs3.j2IHkpqRPT7bP8yU4Mxn0cIXuF3mlbm', 1, 'avatar2.png', 'gamer', 'Baan', 'Undead', 'Ban', '2023-04-22 14:53:27', '2023-04-22 14:53:27', 1, '', 2),
(87, 'liyanagunawardanainoka@gmail.com', '$2y$10$zx9.kYnkZV.TCQ3tXw6a7uk5jT5.ZR9o08mEaIFvtsxJtAwADdAoi', 1, 'avatar4.png', 'asset creator', 'King', 'Fairy', 'King', '2023-04-23 06:46:19', '2023-04-23 06:46:19', 1, '', 2),
(89, '2020cs104@stu.ucsc.cmb.ac.lk', '$2y$10$6h2JqX09rf5YF80v.k84n.R5uiiEAU5d9oUMkjckdnq1gbnaiu92q', 1, 'avatar1.png', 'gamejam organizer', 'Capn', 'Cap', 'Meliodas', '2023-04-23 18:38:32', '2023-04-23 18:38:32', 1, '', 2),
(91, '2020cs029@stu.ucsc.cmb.ac.lk', '$2y$10$ooDrFzqhYNmkl3nef6nHP.e7Vm2VjL0Q8HpgWZNIMMQ9L/HdEcPZa', 1, 'avatar2.png', 'game developer', 'fefeg', 'fefe', 'grgrg', '2023-04-29 08:13:53', '2023-04-29 08:13:53', 0, '', 2),
(92, 'dhanuka20081203@gmail.com', '$2y$10$7fVtHEYbFG5QmGCAoMXga.4mBRQBrEBu/ARN/9l5Y9mKxDiDeAn8K', 1, 'avatar4.png', 'game developer', 'Sasa', 'Sasanka', 'Dhanuka', '2023-05-05 10:08:30', '2023-05-05 10:08:30', 1, '', 2),
(93, 'jayakodyrusiru@gmail.com', '$2y$10$8rfpRPLvvxkvb1iZklPww.U65Bm04mpekLu2hgkNGar8eSjePKzHq', 1, 'avatar1.png', 'game developer', 'Gemba', 'Rusiru', 'Jayakodi', '2023-05-05 14:55:45', '2023-05-05 14:55:45', 1, '', 2),
(95, 'pddw.new@gmail.com', '$2y$10$2U3Qv2z2nYGEQ3tfqCPE4.Tq9VQrkMhfbhB7N/VZ0z6xhZjTUG0Sy', 1, 'avatar4.png', 'game developer', 'Carly', 'Charles', 'Dion', '2023-05-06 16:59:10', '2023-05-06 16:59:10', 1, '', 2),
(97, 'sherondesilva69@gmail.com', '$2y$10$FPfrdUiihmlFuhGpj4mvZe4HhjDXUdDcyuM4HbjUhnfUUm2EQ2PHm', 1, 'avatar2.png', 'asset creator', 'Mayya', 'Mahela', 'Chamudi', '2023-05-06 18:43:20', '2023-05-06 18:43:20', 1, '', 2),
(98, 'kimuthukisal23@gmail.com', '$2y$10$mYrs5YuPqHQuYHUDmT6jZ.XbbnE5/pJRBCLPQ3afEBrlzwSCO4Ltm', 1, 'avatar4.png', 'game publisher', 'Kimu', 'Kimuthu', 'Kisal', '2023-05-07 06:40:13', '2023-05-07 06:40:13', 1, '', 2),
(99, 'moviecafe.2001@gmail.com', '$2y$10$diqyQzvUjrFq1QvYbLf6MO.I.Aed5744tjwy.tKGbh.yEkKzvlCOW', 1, 'avatar4.png', 'game publisher', 'Tharu', 'Imesha', 'De Silva', '2023-05-07 06:52:25', '2023-05-07 06:52:25', 1, '', 2),
(100, 'pravindusatharasinghe1@gmail.com', '$2y$10$XI542.Va9yQc0RAC3xcP/usmSUwd1XrPKdP6Eg3VQQTMRVaHEw9i2', 1, 'avatar4.png', 'game publisher', 'PraX', 'Pravindu', 'Sathare', '2023-05-07 07:12:38', '2023-05-07 07:12:38', 1, '', 2),
(101, 'ranasinghe.rhasr@gmail.com', '$2y$10$JQ5xjGpol8RBkYdD8/RhG.o0K3jWt2anNRIxFc5GzWl0.3N/6w2Q2', 1, 'avatar4.png', 'asset creator', 'Sandu', 'Sanduni', 'Gamage', '2023-05-07 14:49:40', '2023-05-07 14:49:40', 1, '', 2),
(102, 'klnethmi.liyanage@gmail.com', '$2y$10$rPMX8Xdh9mnlhJIHvoIMFeKYSH1uKNDUtiNZX01F.GMQ49C/tD/W2', 1, 'avatar2.png', 'asset creator', 'Nemmi', 'Nethmie', 'Liyanage', '2023-05-07 14:53:34', '2023-05-07 14:53:34', 1, '', 2),
(103, 'kalyanivithanage0314@gmail.com', '$2y$10$bwXjPFwVt6TV.86jf.J1nOwEQgXdVZZ8oN4A8WGdeNpYikQhw9G5W', 1, 'avatar1.png', 'game developer', 'Jamy', 'Kalyani', 'Withanage', '2023-05-11 11:13:43', '2023-05-11 11:13:43', 1, '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `gamesale`
--

CREATE TABLE `gamesale` (
  `gameSaleID` int(11) NOT NULL,
  `saleClosingDate` datetime NOT NULL,
  `saleStartingDate` datetime NOT NULL,
  `discountGamePrice` float NOT NULL,
  `gamePercentage` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `games_cart`
--

CREATE TABLE `games_cart` (
  `id` int(11) NOT NULL,
  `gamerID` int(11) NOT NULL,
  `itemID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `games_cart`
--

INSERT INTO `games_cart` (`id`, `gamerID`, `itemID`) VALUES
(1, 52, 96),
(2, 46, 91),
(3, 52, 101);

-- --------------------------------------------------------

--
-- Table structure for table `games_filters`
--

CREATE TABLE `games_filters` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `filter` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `games_filters`
--

INSERT INTO `games_filters` (`id`, `type`, `filter`) VALUES
(1, 'platform', 'Windows'),
(2, 'platform', 'Mac'),
(3, 'platform', 'Linux'),
(4, 'platform', 'Android'),
(5, 'platform', 'Web'),
(6, 'releaseStatus', 'Released'),
(7, 'releaseStatus', 'Early Access'),
(8, 'releaseStatus', 'Upcoming'),
(9, 'features', 'Single-Player'),
(10, 'features', 'Multi-Player'),
(11, 'features', 'Co-op'),
(12, 'features', 'Puzzle'),
(13, 'features', 'Achievements'),
(14, 'features', 'Leaderboard'),
(16, 'gametype', 'Base Game'),
(17, 'gametype', 'DLC'),
(18, 'gametype', 'Prologue'),
(19, 'gametype', 'Demo'),
(20, 'classification', 'Action'),
(21, 'classification', 'Adventure'),
(22, 'classification', 'RPG'),
(23, 'classification', 'Racing'),
(24, 'classification', 'Simulation'),
(25, 'classification', 'Strategy'),
(26, 'features', 'Online-Co-op'),
(27, 'features', 'Multiplayer-Co-op'),
(28, 'features', 'MMO'),
(29, 'features', 'Split-Screen');

-- --------------------------------------------------------

--
-- Table structure for table `games_view_tracker`
--

CREATE TABLE `games_view_tracker` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `sessionID` int(11) NOT NULL,
  `gameID` int(11) NOT NULL,
  `viewed_date` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `games_view_tracker`
--

INSERT INTO `games_view_tracker` (`id`, `userID`, `sessionID`, `gameID`, `viewed_date`) VALUES
(10, 46, 83, 90, '2023-03-11'),
(11, 46, 83, 91, '2023-03-11'),
(12, 46, 83, 96, '2023-03-11'),
(13, 51, 30, 90, '2023-03-11'),
(14, 0, 0, 90, '2023-03-11'),
(15, 46, 76, 90, '2023-03-11'),
(16, 46, 76, 92, '2023-03-11'),
(17, 46, 76, 96, '2023-03-11'),
(18, 46, 12, 96, '2023-03-11'),
(19, 46, 12, 90, '2023-03-11'),
(20, 46, 12, 89, '2023-03-11'),
(21, 52, 96, 96, '2023-03-12'),
(22, 53, 58, 96, '2023-03-12'),
(23, 53, 58, 91, '2023-03-12'),
(24, 53, 45, 91, '2023-03-12'),
(25, 53, 45, 96, '2023-03-12'),
(26, 53, 45, 90, '2023-03-12'),
(27, 53, 18, 96, '2023-03-12'),
(28, 53, 18, 92, '2023-03-12'),
(29, 53, 32, 96, '2023-03-12'),
(30, 53, 32, 91, '2023-03-12'),
(31, 53, 32, 92, '2023-03-12'),
(32, 0, 0, 92, '2023-03-12'),
(33, 0, 0, 96, '2023-03-12'),
(34, 0, 0, 91, '2023-03-12'),
(35, 53, 62, 91, '2023-03-12'),
(36, 53, 62, 92, '2023-03-12'),
(37, 46, 80, 92, '2023-03-12'),
(38, 53, 94, 92, '2023-03-12'),
(39, 46, 86, 108, '2023-03-13'),
(40, 0, 0, 108, '2023-03-13'),
(41, 46, 39, 96, '2023-03-13'),
(42, 46, 39, 107, '2023-03-13'),
(43, 46, 39, 115, '2023-03-13'),
(44, 46, 39, 114, '2023-03-13'),
(45, 46, 39, 117, '2023-03-13'),
(46, 46, 39, 106, '2023-03-13'),
(47, 53, 83, 95, '2023-03-13'),
(48, 46, 84, 91, '2023-03-14'),
(49, 52, 83, 91, '2023-03-15'),
(50, 52, 83, 96, '2023-03-15'),
(51, 52, 83, 103, '2023-03-15'),
(52, 52, 83, 107, '2023-03-15'),
(53, 52, 83, 101, '2023-03-15'),
(54, 46, 44, 91, '2023-03-15'),
(55, 46, 44, 90, '2023-03-15'),
(56, 46, 44, 96, '2023-03-15'),
(57, 52, 80, 90, '2023-03-16'),
(58, 52, 80, 91, '2023-03-16'),
(59, 52, 80, 92, '2023-03-16'),
(60, 52, 80, 95, '2023-03-16'),
(61, 52, 38, 90, '2023-03-16'),
(62, 52, 38, 96, '2023-03-16'),
(63, 46, 91, 90, '2023-03-19'),
(64, 46, 29, 91, '2023-03-20'),
(65, 46, 29, 148, '2023-03-20'),
(66, 52, 65, 107, '2023-03-21'),
(67, 52, 65, 91, '2023-03-21'),
(68, 52, 86, 92, '2023-03-21'),
(69, 52, 86, 96, '2023-03-21'),
(70, 52, 86, 114, '2023-03-21'),
(71, 52, 86, 107, '2023-03-21'),
(72, 52, 86, 102, '2023-03-21'),
(73, 52, 86, 105, '2023-03-21'),
(74, 52, 27, 106, '2023-03-21'),
(75, 52, 81, 106, '2023-03-21'),
(76, 46, 91, 91, '2023-03-21'),
(77, 46, 89, 149, '2023-03-22'),
(78, 46, 89, 151, '2023-03-22'),
(79, 46, 89, 152, '2023-03-22'),
(80, 46, 89, 153, '2023-03-22'),
(81, 46, 81, 92, '2023-03-22'),
(82, 46, 81, 95, '2023-03-22'),
(83, 46, 56, 91, '2023-03-22'),
(84, 46, 40, 91, '2023-03-23'),
(85, 46, 34, 90, '2023-03-23'),
(86, 46, 32, 154, '2023-04-02'),
(87, 0, 0, 104, '2023-04-02'),
(88, 46, 72, 90, '2023-04-07'),
(89, 46, 72, 96, '2023-04-07'),
(90, 46, 69, 156, '2023-04-08'),
(91, 46, 69, 90, '2023-04-08'),
(92, 46, 69, 148, '2023-04-08'),
(93, 46, 69, 145, '2023-04-08'),
(94, 46, 69, 144, '2023-04-08'),
(95, 46, 69, 92, '2023-04-08'),
(96, 46, 69, 96, '2023-04-08'),
(97, 46, 69, 91, '2023-04-08'),
(98, 46, 69, 162, '2023-04-08'),
(99, 46, 69, 161, '2023-04-08'),
(100, 46, 69, 163, '2023-04-08'),
(101, 46, 23, 164, '2023-04-08'),
(102, 46, 23, 165, '2023-04-08'),
(103, 46, 23, 166, '2023-04-08'),
(104, 46, 23, 167, '2023-04-08'),
(105, 46, 23, 179, '2023-04-09'),
(106, 46, 97, 180, '2023-04-09'),
(107, 46, 97, 91, '2023-04-09'),
(108, 46, 89, 96, '2023-04-10'),
(109, 52, 88, 96, '2023-04-10'),
(110, 46, 13, 96, '2023-04-10'),
(111, 46, 36, 91, '2023-04-10'),
(112, 46, 36, 96, '2023-04-10'),
(113, 52, 87, 96, '2023-04-10'),
(114, 52, 87, 90, '2023-04-10'),
(115, 46, 63, 104, '2023-04-10'),
(116, 46, 63, 110, '2023-04-10'),
(117, 46, 63, 115, '2023-04-10'),
(118, 46, 63, 93, '2023-04-10'),
(119, 46, 63, 92, '2023-04-10'),
(120, 46, 63, 89, '2023-04-10'),
(121, 46, 63, 90, '2023-04-10'),
(122, 46, 63, 95, '2023-04-10'),
(123, 46, 63, 91, '2023-04-10'),
(124, 46, 63, 96, '2023-04-10'),
(125, 52, 55, 92, '2023-04-10'),
(126, 52, 55, 90, '2023-04-10'),
(127, 52, 55, 95, '2023-04-10'),
(128, 52, 60, 96, '2023-04-10'),
(129, 52, 60, 91, '2023-04-10'),
(130, 52, 60, 92, '2023-04-10'),
(131, 52, 60, 95, '2023-04-10'),
(132, 52, 42, 95, '2023-04-10'),
(133, 52, 95, 90, '2023-04-10'),
(134, 52, 95, 89, '2023-04-10'),
(135, 52, 95, 96, '2023-04-10'),
(136, 52, 95, 92, '2023-04-10'),
(137, 52, 95, 93, '2023-04-10'),
(138, 53, 12, 89, '2023-04-10'),
(139, 53, 12, 92, '2023-04-10'),
(140, 53, 12, 96, '2023-04-10'),
(141, 53, 12, 93, '2023-04-10'),
(142, 53, 17, 89, '2023-04-10'),
(143, 53, 17, 91, '2023-04-10'),
(144, 53, 17, 96, '2023-04-10'),
(145, 53, 17, 90, '2023-04-10'),
(146, 52, 88, 95, '2023-04-10'),
(147, 52, 25, 96, '2023-04-10'),
(148, 52, 25, 95, '2023-04-10'),
(149, 52, 25, 93, '2023-04-10'),
(150, 53, 31, 93, '2023-04-10'),
(151, 53, 31, 95, '2023-04-10'),
(152, 53, 31, 96, '2023-04-10'),
(153, 53, 31, 90, '2023-04-10'),
(154, 53, 31, 92, '2023-04-10'),
(155, 53, 31, 91, '2023-04-10'),
(156, 46, 53, 93, '2023-04-10'),
(157, 46, 53, 92, '2023-04-10'),
(158, 52, 65, 92, '2023-04-10'),
(159, 53, 51, 92, '2023-04-10'),
(160, 53, 51, 96, '2023-04-10'),
(161, 53, 51, 95, '2023-04-10'),
(162, 46, 33, 92, '2023-04-10'),
(163, 46, 68, 96, '2023-04-10'),
(164, 51, 79, 91, '2023-04-10'),
(165, 46, 37, 96, '2023-04-11'),
(166, 46, 37, 91, '2023-04-11'),
(167, 46, 37, 93, '2023-04-11'),
(168, 46, 37, 90, '2023-04-11'),
(169, 46, 37, 92, '2023-04-11'),
(170, 46, 37, 95, '2023-04-11'),
(171, 0, 0, 93, '2023-04-11'),
(172, 46, 24, 181, '2023-04-11'),
(173, 46, 24, 182, '2023-04-11'),
(174, 46, 50, 92, '2023-04-11'),
(175, 52, 19, 96, '2023-04-11'),
(176, 52, 19, 93, '2023-04-11'),
(177, 52, 19, 89, '2023-04-11'),
(178, 52, 19, 90, '2023-04-11'),
(179, 52, 19, 91, '2023-04-11'),
(180, 52, 19, 95, '2023-04-11'),
(181, 52, 19, 92, '2023-04-11'),
(182, 46, 93, 92, '2023-04-11'),
(183, 46, 93, 91, '2023-04-11'),
(184, 52, 72, 95, '2023-04-11'),
(185, 52, 72, 92, '2023-04-11'),
(186, 52, 72, 93, '2023-04-11'),
(187, 52, 72, 96, '2023-04-11'),
(188, 52, 72, 90, '2023-04-11'),
(189, 52, 72, 91, '2023-04-11'),
(190, 46, 62, 92, '2023-04-11'),
(191, 46, 62, 91, '2023-04-11'),
(192, 46, 62, 93, '2023-04-11'),
(193, 52, 34, 91, '2023-04-11'),
(194, 52, 34, 90, '2023-04-11'),
(195, 52, 34, 89, '2023-04-11'),
(196, 52, 34, 92, '2023-04-11'),
(197, 52, 34, 95, '2023-04-11'),
(198, 52, 34, 96, '2023-04-11'),
(199, 52, 34, 181, '2023-04-11'),
(200, 52, 34, 182, '2023-04-11'),
(201, 52, 34, 93, '2023-04-11'),
(202, 46, 77, 92, '2023-04-12'),
(203, 46, 77, 95, '2023-04-12'),
(204, 46, 77, 91, '2023-04-12'),
(205, 46, 77, 93, '2023-04-12'),
(206, 46, 71, 96, '2023-04-13'),
(207, 46, 17, 96, '2023-04-13'),
(208, 46, 96, 96, '2023-04-13'),
(209, 46, 30, 181, '2023-04-15'),
(210, 46, 20, 92, '2023-04-16'),
(211, 46, 20, 95, '2023-04-16'),
(212, 46, 20, 96, '2023-04-16'),
(213, 52, 71, 92, '2023-04-16'),
(214, 52, 71, 91, '2023-04-16'),
(215, 46, 64, 181, '2023-04-16'),
(216, 52, 85, 90, '2023-04-17'),
(217, 52, 85, 91, '2023-04-17'),
(218, 52, 85, 95, '2023-04-17'),
(219, 52, 11, 90, '2023-04-18'),
(220, 52, 11, 91, '2023-04-18'),
(221, 52, 11, 92, '2023-04-18'),
(222, 52, 11, 93, '2023-04-18'),
(223, 52, 11, 96, '2023-04-18'),
(224, 46, 90, 92, '2023-04-18'),
(225, 53, 46, 92, '2023-04-18'),
(226, 46, 60, 183, '2023-04-19'),
(227, 46, 60, 96, '2023-04-19'),
(228, 46, 67, 90, '2023-04-19'),
(229, 46, 67, 92, '2023-04-19'),
(230, 46, 67, 95, '2023-04-19'),
(231, 0, 0, 95, '2023-04-19'),
(232, 46, 60, 95, '2023-04-19'),
(233, 46, 96, 93, '2023-04-19'),
(234, 46, 29, 95, '2023-04-19'),
(235, 46, 29, 93, '2023-04-19'),
(236, 52, 47, 95, '2023-04-19'),
(237, 52, 47, 93, '2023-04-19'),
(238, 52, 47, 96, '2023-04-19'),
(239, 52, 47, 181, '2023-04-19'),
(240, 52, 47, 183, '2023-04-19'),
(241, 52, 47, 92, '2023-04-19'),
(242, 52, 47, 91, '2023-04-19'),
(243, 52, 47, 89, '2023-04-19'),
(244, 52, 47, 182, '2023-04-19'),
(245, 46, 48, 90, '2023-04-19'),
(246, 78, 48, 95, '2023-04-19'),
(247, 78, 48, 96, '2023-04-19'),
(248, 78, 48, 91, '2023-04-19'),
(249, 46, 38, 96, '2023-04-19'),
(250, 46, 44, 93, '2023-04-19'),
(251, 51, 25, 93, '2023-04-19'),
(252, 46, 45, 93, '2023-04-20'),
(253, 52, 70, 92, '2023-04-20'),
(254, 46, 42, 93, '2023-04-20'),
(255, 81, 0, 184, '2023-04-20'),
(256, 81, 41, 184, '2023-04-20'),
(257, 81, 15, 184, '2023-04-20'),
(258, 81, 19, 184, '2023-04-20'),
(259, 81, 13, 184, '2023-04-20'),
(260, 81, 87, 184, '2023-04-21'),
(261, 81, 87, 92, '2023-04-21'),
(262, 81, 87, 95, '2023-04-21'),
(263, 82, 96, 186, '2023-04-21'),
(264, 82, 96, 93, '2023-04-21'),
(265, 82, 96, 184, '2023-04-21'),
(266, 81, 92, 187, '2023-04-21'),
(267, 81, 64, 187, '2023-04-21'),
(268, 46, 67, 188, '2023-04-21'),
(269, 81, 10, 184, '2023-04-21'),
(270, 81, 10, 187, '2023-04-21'),
(271, 82, 97, 186, '2023-04-21'),
(272, 82, 97, 188, '2023-04-21'),
(273, 82, 97, 184, '2023-04-21'),
(274, 82, 97, 189, '2023-04-21'),
(275, 52, 76, 96, '2023-04-22'),
(276, 52, 15, 96, '2023-04-22'),
(277, 52, 15, 188, '2023-04-22'),
(278, 52, 15, 189, '2023-04-22'),
(279, 52, 12, 189, '2023-04-22'),
(280, 82, 65, 189, '2023-04-22'),
(281, 52, 56, 189, '2023-04-22'),
(282, 52, 56, 188, '2023-04-22'),
(283, 52, 56, 183, '2023-04-22'),
(284, 52, 56, 182, '2023-04-22'),
(285, 52, 56, 181, '2023-04-22'),
(286, 52, 56, 93, '2023-04-22'),
(287, 52, 56, 95, '2023-04-22'),
(288, 52, 56, 96, '2023-04-22'),
(289, 53, 20, 189, '2023-04-22'),
(290, 53, 20, 188, '2023-04-22'),
(291, 53, 80, 188, '2023-04-22'),
(292, 82, 12, 188, '2023-04-22'),
(293, 84, 69, 188, '2023-04-22'),
(294, 84, 69, 189, '2023-04-22'),
(295, 86, 66, 189, '2023-04-22'),
(296, 86, 66, 188, '2023-04-22'),
(297, 86, 48, 92, '2023-04-22'),
(298, 82, 53, 189, '2023-04-23'),
(299, 82, 53, 188, '2023-04-23'),
(300, 52, 83, 90, '2023-04-23'),
(301, 46, 13, 190, '2023-04-26'),
(302, 46, 13, 188, '2023-04-26'),
(303, 46, 13, 191, '2023-04-26'),
(304, 46, 13, 182, '2023-04-26'),
(305, 46, 13, 181, '2023-04-26'),
(306, 46, 31, 191, '2023-04-27'),
(307, 46, 31, 189, '2023-04-27'),
(308, 46, 31, 184, '2023-04-27'),
(309, 46, 31, 187, '2023-04-27'),
(310, 46, 31, 186, '2023-04-27'),
(311, 52, 18, 181, '2023-04-28'),
(312, 52, 18, 187, '2023-04-28'),
(313, 52, 18, 188, '2023-04-28'),
(314, 46, 73, 90, '2023-04-28'),
(315, 46, 27, 183, '2023-04-30'),
(316, 46, 27, 191, '2023-04-30'),
(317, 46, 27, 189, '2023-04-30'),
(318, 46, 27, 188, '2023-04-30'),
(319, 46, 27, 187, '2023-04-30'),
(320, 46, 27, 186, '2023-04-30'),
(321, 46, 27, 184, '2023-04-30'),
(322, 46, 27, 181, '2023-04-30'),
(323, 46, 27, 90, '2023-04-30'),
(324, 46, 27, 89, '2023-04-30'),
(325, 46, 27, 95, '2023-04-30'),
(326, 81, 80, 95, '2023-04-30'),
(327, 81, 80, 187, '2023-04-30'),
(328, 81, 80, 92, '2023-04-30'),
(329, 46, 29, 187, '2023-04-30'),
(330, 52, 41, 187, '2023-04-30'),
(331, 46, 68, 187, '2023-05-01'),
(332, 46, 68, 186, '2023-05-01'),
(333, 46, 68, 189, '2023-05-01'),
(334, 46, 23, 188, '2023-05-01'),
(335, 46, 23, 189, '2023-05-01'),
(336, 46, 23, 90, '2023-05-01'),
(337, 46, 78, 96, '2023-05-01'),
(338, 46, 62, 187, '2023-05-01'),
(339, 46, 39, 195, '2023-05-02'),
(340, 46, 80, 187, '2023-05-02'),
(341, 46, 31, 195, '2023-05-02'),
(342, 52, 66, 189, '2023-05-02'),
(343, 84, 66, 187, '2023-05-02'),
(344, 84, 66, 188, '2023-05-02'),
(345, 52, 57, 188, '2023-05-02'),
(346, 86, 13, 188, '2023-05-02'),
(347, 52, 78, 187, '2023-05-03'),
(348, 79, 71, 195, '2023-05-03'),
(349, 79, 84, 195, '2023-05-03'),
(350, 86, 77, 196, '2023-05-04'),
(351, 86, 77, 188, '2023-05-04'),
(352, 84, 22, 196, '2023-05-04'),
(353, 86, 24, 197, '2023-05-04'),
(354, 84, 30, 197, '2023-05-04'),
(355, 84, 30, 93, '2023-05-04'),
(356, 53, 71, 198, '2023-05-04'),
(357, 86, 93, 198, '2023-05-04'),
(358, 52, 65, 187, '2023-05-04'),
(359, 46, 27, 199, '2023-05-04'),
(360, 86, 86, 96, '2023-05-05'),
(361, 92, 78, 188, '2023-05-05'),
(362, 92, 78, 189, '2023-05-05'),
(363, 92, 78, 90, '2023-05-05'),
(364, 92, 78, 91, '2023-05-05'),
(365, 92, 78, 92, '2023-05-05'),
(366, 92, 78, 199, '2023-05-05'),
(367, 46, 58, 189, '2023-05-05'),
(368, 53, 69, 196, '2023-05-05'),
(369, 47, 70, 92, '2023-05-05'),
(370, 92, 35, 200, '2023-05-05'),
(371, 92, 35, 191, '2023-05-05'),
(372, 92, 15, 90, '2023-05-05'),
(373, 83, 76, 199, '2023-05-05'),
(374, 47, 11, 187, '2023-05-06'),
(375, 81, 70, 183, '2023-05-06'),
(376, 81, 70, 188, '2023-05-06'),
(377, 81, 70, 181, '2023-05-06'),
(378, 81, 70, 95, '2023-05-06'),
(379, 81, 70, 191, '2023-05-06'),
(380, 81, 63, 91, '2023-05-06'),
(381, 81, 63, 205, '2023-05-06'),
(382, 81, 63, 206, '2023-05-06'),
(383, 93, 52, 207, '2023-05-06'),
(384, 82, 20, 203, '2023-05-06'),
(385, 82, 20, 196, '2023-05-06'),
(386, 82, 20, 208, '2023-05-06'),
(387, 95, 82, 209, '2023-05-06'),
(388, 95, 82, 210, '2023-05-06'),
(389, 82, 89, 186, '2023-05-07'),
(390, 82, 89, 189, '2023-05-07'),
(391, 82, 89, 196, '2023-05-07'),
(392, 82, 89, 208, '2023-05-07'),
(393, 82, 89, 211, '2023-05-07'),
(394, 46, 21, 200, '2023-05-07'),
(395, 46, 21, 199, '2023-05-07'),
(396, 46, 21, 191, '2023-05-07'),
(397, 46, 21, 195, '2023-05-07'),
(398, 46, 21, 196, '2023-05-07'),
(399, 46, 21, 197, '2023-05-07'),
(400, 46, 21, 187, '2023-05-07'),
(401, 46, 34, 212, '2023-05-07'),
(402, 52, 86, 90, '2023-05-07'),
(403, 46, 62, 89, '2023-05-08'),
(404, 52, 50, 89, '2023-05-08'),
(405, 84, 61, 89, '2023-05-08'),
(406, 84, 61, 211, '2023-05-08'),
(407, 84, 61, 199, '2023-05-08'),
(408, 46, 95, 91, '2023-05-08'),
(409, 46, 95, 93, '2023-05-08'),
(410, 46, 95, 187, '2023-05-08'),
(411, 46, 95, 210, '2023-05-08'),
(412, 47, 76, 197, '2023-05-08'),
(413, 52, 96, 209, '2023-05-08'),
(414, 86, 19, 201, '2023-05-08'),
(415, 86, 19, 206, '2023-05-08'),
(416, 46, 83, 212, '2023-05-09'),
(417, 46, 68, 212, '2023-05-09'),
(418, 83, 60, 213, '2023-05-10'),
(419, 52, 53, 201, '2023-05-10'),
(420, 52, 53, 203, '2023-05-10'),
(421, 52, 53, 200, '2023-05-10'),
(422, 52, 53, 90, '2023-05-10'),
(423, 46, 97, 212, '2023-05-10'),
(424, 46, 97, 198, '2023-05-10'),
(425, 46, 97, 189, '2023-05-10'),
(426, 53, 71, 96, '2023-05-10'),
(427, 86, 90, 201, '2023-05-10'),
(428, 86, 90, 196, '2023-05-10'),
(429, 86, 90, 187, '2023-05-10'),
(430, 47, 47, 92, '2023-05-10'),
(431, 47, 47, 187, '2023-05-10'),
(432, 47, 47, 191, '2023-05-10'),
(433, 47, 47, 186, '2023-05-10'),
(434, 86, 30, 208, '2023-05-10'),
(435, 46, 88, 214, '2023-05-10'),
(436, 82, 10, 198, '2023-05-10'),
(437, 84, 37, 201, '2023-05-10'),
(438, 46, 94, 95, '2023-05-10'),
(439, 52, 80, 189, '2023-05-10'),
(440, 52, 80, 188, '2023-05-10'),
(441, 46, 63, 189, '2023-05-10'),
(442, 46, 94, 186, '2023-05-10'),
(443, 52, 43, 95, '2023-05-11'),
(444, 46, 35, 184, '2023-05-11'),
(445, 46, 63, 183, '2023-05-11'),
(446, 46, 58, 184, '2023-05-11'),
(447, 46, 59, 186, '2023-05-11'),
(448, 83, 94, 186, '2023-05-11'),
(449, 83, 94, 201, '2023-05-11'),
(450, 83, 94, 215, '2023-05-11'),
(451, 81, 63, 216, '2023-05-11'),
(452, 81, 63, 93, '2023-05-11'),
(453, 46, 70, 197, '2023-05-11'),
(454, 52, 72, 198, '2023-05-12'),
(455, 53, 71, 189, '2023-05-12'),
(456, 46, 41, 95, '2023-05-12'),
(457, 46, 41, 202, '2023-05-12'),
(458, 46, 41, 215, '2023-05-12'),
(459, 46, 83, 198, '2023-05-12'),
(460, 46, 83, 184, '2023-05-12'),
(461, 46, 83, 187, '2023-05-12'),
(462, 46, 83, 189, '2023-05-12'),
(463, 46, 83, 188, '2023-05-12'),
(464, 47, 38, 186, '2023-05-12'),
(465, 52, 13, 214, '2023-05-12'),
(466, 46, 74, 189, '2023-05-12'),
(467, 52, 52, 189, '2023-05-12'),
(468, 52, 52, 201, '2023-05-12'),
(469, 52, 52, 188, '2023-05-12'),
(470, 46, 19, 189, '2023-05-12'),
(471, 46, 19, 199, '2023-05-12'),
(472, 46, 11, 198, '2023-05-12'),
(473, 86, 37, 188, '2023-05-12'),
(474, 46, 70, 96, '2023-05-13'),
(475, 46, 35, 217, '2023-05-13');

-- --------------------------------------------------------

--
-- Table structure for table `game_cart`
--

CREATE TABLE `game_cart` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `gameID` int(11) NOT NULL,
  `addedDate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `game_cart`
--

INSERT INTO `game_cart` (`id`, `userID`, `gameID`, `addedDate`) VALUES
(11, 46, 92, '2023-04-11'),
(17, 53, 189, '2023-04-22'),
(19, 53, 188, '2023-04-22'),
(29, 86, 201, '2023-05-08');

-- --------------------------------------------------------

--
-- Table structure for table `game_library`
--

CREATE TABLE `game_library` (
  `id` int(11) NOT NULL,
  `gameID` int(11) NOT NULL,
  `gamerID` int(11) NOT NULL,
  `createdAt` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `game_library`
--

INSERT INTO `game_library` (`id`, `gameID`, `gamerID`, `createdAt`) VALUES
(1, 107, 52, '2023-03-15'),
(2, 96, 52, '2023-03-15'),
(3, 106, 52, '2023-03-21'),
(4, 95, 52, '2023-04-10'),
(9, 93, 52, '2023-04-11'),
(15, 182, 52, '2023-04-11'),
(16, 91, 52, '2023-04-11'),
(17, 92, 52, '2023-04-11'),
(18, 95, 0, '2023-04-19'),
(19, 181, 52, '2023-04-19'),
(25, 189, 52, '2023-04-22'),
(26, 189, 53, '2023-04-22'),
(27, 188, 53, '2023-04-22'),
(28, 188, 84, '2023-04-22'),
(29, 189, 84, '2023-04-22'),
(30, 189, 86, '2023-04-22'),
(31, 188, 86, '2023-04-22'),
(32, 196, 86, '2023-05-04'),
(33, 196, 84, '2023-05-04'),
(34, 197, 86, '2023-05-04'),
(35, 197, 84, '2023-05-04'),
(36, 198, 52, '2023-05-04'),
(37, 198, 53, '2023-05-04'),
(38, 198, 86, '2023-05-04'),
(39, 198, 84, '2023-05-04'),
(40, 196, 53, '2023-05-05'),
(41, 89, 52, '2023-05-08'),
(44, 89, 84, '2023-05-08'),
(45, 209, 52, '2023-05-08'),
(46, 214, 52, '2023-05-12');

-- --------------------------------------------------------

--
-- Table structure for table `game_purchases`
--

CREATE TABLE `game_purchases` (
  `id` int(11) NOT NULL,
  `gameID` int(11) NOT NULL,
  `buyerID` int(11) NOT NULL,
  `orderID` varchar(255) NOT NULL,
  `purchasedPrice` float NOT NULL,
  `purchasedDate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `game_purchases`
--

INSERT INTO `game_purchases` (`id`, `gameID`, `buyerID`, `orderID`, `purchasedPrice`, `purchasedDate`) VALUES
(1, 106, 52, '641996fdad338', 30, '2023-03-21'),
(2, 95, 52, '6433f938442db', 30, '2023-04-10'),
(3, 92, 52, '64358669b14e9', 30, '2023-04-11'),
(5, 189, 52, '6443ab97c9839', 49.99, '2023-04-22'),
(6, 189, 52, '6443ad2bdcd01', 49.99, '2023-04-22'),
(7, 189, 52, '6443b0ea6cbed', 49.99, '2023-04-22'),
(8, 189, 52, '6443b1aff23a1', 49.99, '2023-04-22'),
(9, 189, 52, '6443b232426bd', 49.99, '2023-04-22'),
(10, 189, 53, '6443e7a97c091', 79.99, '2023-04-22'),
(11, 189, 53, '6443e7ea3e09e', 79.99, '2023-04-22'),
(12, 188, 53, '6443e7ea3e09e', 79.99, '2023-04-22'),
(13, 188, 84, '6443f34c510a9', 79.99, '2023-04-22'),
(14, 189, 84, '6443f34c510a9', 79.99, '2023-04-22'),
(15, 189, 86, '6443f6316333f', 49.99, '2023-04-22'),
(16, 188, 86, '6443f6316333f', 30, '2023-04-22'),
(17, 196, 86, '64535743c6705', 40, '2023-05-04'),
(18, 196, 84, '64535814c0ad2', 40, '2023-05-04'),
(19, 197, 86, '64535e5d5af23', 59.99, '2023-05-04'),
(20, 197, 84, '64535f5760d8a', 59.99, '2023-05-04'),
(21, 196, 53, '6454dd1a67f99', 40, '2023-05-05'),
(22, 209, 52, '6458e057c80bf', 56.49, '2023-05-08'),
(23, 214, 52, '645de012af69c', 40, '2023-05-12');

-- --------------------------------------------------------

--
-- Table structure for table `game_reviews`
--

CREATE TABLE `game_reviews` (
  `id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `reviewTopic` varchar(100) NOT NULL,
  `review` text NOT NULL,
  `created_date` date NOT NULL DEFAULT current_timestamp(),
  `userID` int(11) NOT NULL,
  `gameID` int(11) NOT NULL,
  `recommendation` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `game_reviews`
--

INSERT INTO `game_reviews` (`id`, `rating`, `reviewTopic`, `review`, `created_date`, `userID`, `gameID`, `recommendation`) VALUES
(81, 2, 'grgr', 'Hey! The actual sprite without empty space in the image is about 38x20 pixels, but it depends on the animation as in some theres a sword and stuff. So because of that I kept the image size as 120x80 pixels for every animation. And the character is centere', '2023-04-10', 52, 93, 'Yes'),
(86, 1, 'grg', 'Hey! The actual sprite without empty space in the image is about 38x20 pixels, but it depends on the animation as in some theres a sword and stuff. So because of that I kept the image size as 120x80 pixels for every animation. And the character is centered correctly to be in the middle/bottom of the whole image.', '2023-04-10', 53, 96, 'No'),
(89, 3, 'grgrg', 'Hey! The actual sprite without empty space in the image is about 38x20 pixels, but it depends on the animation as in some theres a sword and stuff. So because of that I kept the image size as 120x80 pixels for every animation. And the character is centered correctly to be in the middle/bottom of the whole image.', '2023-04-16', 52, 92, 'No'),
(95, 4, 'Really cool game', 'If you like pac-man and horror games, Dark deception is your best bet. the game takes place in a maze-like area, (multiple maze-like areas,) where you have to collect crystals called soul shards. once you collect all the soul shards, you escape the level and go to the next. BUT, each level is filled with a bunch of deadly monsters ranging from killer monkeys, to duckies with human legs that live in the sewer. the graphics are amazing, the music design is amazing, the gameplay loop is amazing, the difficulty for each level isnot too easy, or too hard, and story is also amazing. the story is the biggest part i have left unexplained, which you will probably figure it out near the end of the game, and I wont give any spoilers. ', '2023-05-02', 84, 188, 'Yes'),
(96, 3, 'Astonishing and Suprising', 'I had like 42 hearts attack but they were worth it. When i downloaded it and the woman was talking I was wondering if I did the right thing spending time in this game, but after playing the game I do not regret downloading it.', '2023-05-02', 52, 188, 'Yes'),
(97, 1, 'Totally Unethical', 'The developer of this game has shamelessly stolen a piece of work created by a fan for this game after the developer offered to PUBLISH this workpiece as official material, then proceeded to lie about the events on Twitter.\n\nThis is unacceptable.', '2023-05-02', 86, 188, 'Yes'),
(98, 4, 'ggrg', 'grgrg', '2023-05-08', 52, 209, 'Yes'),
(99, 5, 'Awesome Mech Game', 'I have been after playing a cool mech game for ages. Look no further this is a total blast.  A little rough around the edges in polish but it does not get a 4 star for that.\n\nThe gfx are cool esp the maps.. & gameplay is energetic and fun and the mechs are so cool with tons of tricks.  ', '2023-05-10', 52, 201, 'Yes'),
(100, 2, 'dvfv', 'veve', '2023-05-12', 52, 214, 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `game_specifications`
--

CREATE TABLE `game_specifications` (
  `gameID` int(11) NOT NULL,
  `min_os` int(11) NOT NULL,
  `min_processor` int(11) NOT NULL,
  `min_memory` int(11) NOT NULL,
  `min_storage` int(11) NOT NULL,
  `min_graphics` int(11) NOT NULL,
  `rec_os` int(11) NOT NULL,
  `rec_processor` int(11) NOT NULL,
  `rec_memory` int(11) NOT NULL,
  `rec_storage` int(11) NOT NULL,
  `rec_graphics` int(11) NOT NULL,
  `other` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `game_stats`
--

CREATE TABLE `game_stats` (
  `id` int(11) NOT NULL,
  `gameID` int(11) NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `downloads` int(11) NOT NULL DEFAULT 0,
  `ratings` int(11) NOT NULL DEFAULT 0,
  `revenue` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `game_stats`
--

INSERT INTO `game_stats` (`id`, `gameID`, `views`, `downloads`, `ratings`, `revenue`) VALUES
(1, 96, 50, 13, 1, 0),
(2, 89, 18, 5, 0, 0),
(3, 90, 35, 0, 0, 0),
(4, 91, 38, 13, 0, 0),
(5, 92, 43, 5, 0, 0),
(6, 93, 26, 2, 0, 0),
(7, 95, 32, 4, 1, 0),
(8, 184, 14, 3, 0, 0),
(10, 186, 11, 4, 0, 0),
(11, 187, 21, 10, 0, 0),
(12, 188, 24, 2, 0, 152.48),
(14, 189, 25, 2, 0, 295.858),
(16, 191, 7, 2, 0, 0),
(18, 195, 5, 3, 0, 0),
(19, 196, 7, 5, 0, 104.436),
(20, 197, 5, 1, 0, 104.419),
(21, 198, 7, 1, 0, 0),
(22, 199, 6, 6, 0, 0),
(23, 200, 3, 2, 0, 0),
(24, 201, 6, 0, 0, 0),
(25, 202, 1, 0, 0, 0),
(26, 203, 2, 5, 0, 0),
(27, 204, 0, 5, 0, 0),
(28, 205, 1, 5, 0, 0),
(29, 206, 2, 0, 0, 0),
(30, 207, 1, 0, 0, 0),
(31, 208, 3, 4, 0, 0),
(32, 209, 2, 1, 0, 49.1632),
(33, 210, 2, 1, 0, 0),
(34, 211, 2, 2, 0, 0),
(35, 212, 4, 1, 0, 0),
(36, 213, 1, 0, 0, 0),
(37, 214, 2, 1, 0, 32.1044),
(38, 215, 2, 1, 0, 0),
(39, 216, 1, 1, 0, 0),
(40, 217, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `game_stats_history`
--

CREATE TABLE `game_stats_history` (
  `id` int(11) NOT NULL,
  `gameID` int(11) NOT NULL,
  `views` int(11) NOT NULL,
  `downloads` int(11) NOT NULL,
  `ratings` int(11) NOT NULL,
  `reviews` int(11) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `game_stats_history`
--

INSERT INTO `game_stats_history` (`id`, `gameID`, `views`, `downloads`, `ratings`, `reviews`, `created_at`) VALUES
(1, 89, 2, 1, 4, 1, '2023-03-07'),
(2, 89, 4, 2, 5, 4, '2023-03-08'),
(7, 101, 0, 3, 0, 0, '2023-03-09'),
(8, 90, 0, 1, 0, 0, '2023-03-09'),
(9, 105, 0, 2, 0, 0, '2023-03-09'),
(13, 90, 5, 2, 0, 0, '2023-03-11'),
(14, 91, 1, 0, 0, 0, '2023-03-11'),
(15, 96, 3, 1, 0, 0, '2023-03-11'),
(16, 92, 1, 1, 0, 0, '2023-03-11'),
(17, 89, 1, 0, 0, 0, '2023-03-11'),
(18, 96, 6, 0, 0, 0, '2023-03-12'),
(19, 91, 5, 0, 0, 0, '2023-03-12'),
(20, 90, 1, 0, 0, 0, '2023-03-12'),
(21, 92, 6, 1, 0, 0, '2023-03-12'),
(22, 108, 1, 0, 0, 0, '2023-03-12'),
(23, 108, 1, 0, 0, 0, '2023-03-13'),
(24, 96, 1, 0, 0, 0, '2023-03-13'),
(25, 107, 1, 0, 0, 0, '2023-03-13'),
(26, 115, 1, 0, 0, 0, '2023-03-13'),
(27, 114, 1, 0, 0, 0, '2023-03-13'),
(28, 117, 1, 0, 0, 0, '2023-03-13'),
(29, 106, 1, 0, 0, 0, '2023-03-13'),
(30, 95, 1, 0, 0, 0, '2023-03-13'),
(31, 91, 1, 1, 0, 0, '2023-03-14'),
(32, 91, 2, 0, 0, 0, '2023-03-15'),
(33, 96, 2, 3, 0, 0, '2023-03-15'),
(34, 103, 1, 1, 0, 0, '2023-03-15'),
(35, 107, 1, 2, 0, 0, '2023-03-15'),
(36, 101, 1, 0, 0, 0, '2023-03-15'),
(37, 90, 1, 0, 0, 0, '2023-03-15'),
(38, 90, 2, 0, 0, 0, '2023-03-16'),
(39, 91, 1, 0, 0, 0, '2023-03-16'),
(40, 92, 1, 0, 0, 0, '2023-03-16'),
(41, 95, 1, 0, 0, 0, '2023-03-16'),
(42, 96, 1, 0, 0, 0, '2023-03-16'),
(43, 90, 1, 0, 0, 0, '2023-03-19'),
(44, 91, 1, 0, 0, 0, '2023-03-20'),
(45, 148, 1, 0, 0, 0, '2023-03-20'),
(46, 107, 2, 0, 0, 0, '2023-03-21'),
(47, 91, 2, 0, 0, 0, '2023-03-21'),
(48, 92, 1, 0, 0, 0, '2023-03-21'),
(49, 96, 1, 0, 0, 0, '2023-03-21'),
(50, 114, 1, 0, 0, 0, '2023-03-21'),
(51, 102, 1, 0, 0, 0, '2023-03-21'),
(52, 105, 1, 0, 0, 0, '2023-03-21'),
(53, 106, 2, 0, 0, 0, '2023-03-21'),
(54, 149, 1, 0, 0, 0, '2023-03-22'),
(55, 151, 1, 0, 0, 0, '2023-03-22'),
(56, 152, 1, 0, 0, 0, '2023-03-22'),
(57, 153, 1, 0, 0, 0, '2023-03-22'),
(58, 92, 1, 0, 0, 0, '2023-03-22'),
(59, 95, 1, 0, 0, 0, '2023-03-22'),
(60, 91, 1, 0, 0, 0, '2023-03-22'),
(61, 91, 1, 0, 0, 0, '2023-03-23'),
(62, 90, 1, 0, 0, 0, '2023-03-23'),
(63, 154, 1, 0, 0, 0, '2023-04-02'),
(64, 104, 1, 0, 0, 0, '2023-04-02'),
(65, 90, 1, 0, 0, 0, '2023-04-07'),
(66, 96, 1, 0, 0, 0, '2023-04-07'),
(67, 156, 1, 0, 0, 0, '2023-04-08'),
(68, 90, 1, 0, 0, 0, '2023-04-08'),
(69, 148, 1, 0, 0, 0, '2023-04-08'),
(70, 145, 1, 0, 0, 0, '2023-04-08'),
(71, 144, 1, 0, 0, 0, '2023-04-08'),
(72, 92, 1, 0, 0, 0, '2023-04-08'),
(73, 96, 1, 0, 0, 0, '2023-04-08'),
(74, 91, 1, 0, 0, 0, '2023-04-08'),
(75, 162, 1, 0, 0, 0, '2023-04-08'),
(76, 161, 1, 0, 0, 0, '2023-04-08'),
(77, 163, 1, 0, 0, 0, '2023-04-08'),
(78, 164, 1, 0, 0, 0, '2023-04-08'),
(79, 165, 1, 0, 0, 0, '2023-04-08'),
(80, 166, 1, 0, 0, 0, '2023-04-08'),
(81, 167, 1, 0, 0, 0, '2023-04-08'),
(82, 179, 1, 0, 0, 0, '2023-04-08'),
(83, 180, 1, 0, 0, 0, '2023-04-09'),
(84, 91, 1, 0, 0, 0, '2023-04-09'),
(85, 96, 14, 4, 0, 0, '2023-04-10'),
(86, 91, 6, 0, 0, 0, '2023-04-10'),
(87, 90, 6, 0, 0, 0, '2023-04-10'),
(88, 104, 1, 0, 0, 0, '2023-04-10'),
(89, 110, 1, 0, 0, 0, '2023-04-10'),
(90, 115, 1, 0, 0, 0, '2023-04-10'),
(91, 93, 6, 0, 0, 0, '2023-04-10'),
(92, 92, 10, 0, 0, 0, '2023-04-10'),
(93, 89, 4, 0, 0, 0, '2023-04-10'),
(94, 95, 8, 1, 0, 0, '2023-04-10'),
(95, 96, 4, 1, 0, 0, '2023-04-11'),
(96, 91, 6, 10, 0, 0, '2023-04-11'),
(97, 93, 6, 1, 0, 0, '2023-04-11'),
(98, 90, 4, 0, 0, 0, '2023-04-11'),
(99, 92, 7, 2, 0, 0, '2023-04-11'),
(100, 95, 4, 0, 0, 0, '2023-04-11'),
(101, 181, 2, 0, 0, 0, '2023-04-11'),
(102, 182, 2, 1, 0, 0, '2023-04-11'),
(103, 89, 2, 0, 0, 0, '2023-04-11'),
(104, 92, 1, 0, 0, 0, '2023-04-12'),
(105, 95, 1, 0, 0, 0, '2023-04-12'),
(106, 91, 1, 0, 0, 0, '2023-04-12'),
(107, 93, 1, 0, 0, 0, '2023-04-12'),
(108, 96, 3, 1, 0, 0, '2023-04-13'),
(109, 181, 1, 0, 0, 0, '2023-04-15'),
(110, 96, 1, 1, 0, 0, '2023-04-16'),
(111, 92, 2, 0, 0, 0, '2023-04-16'),
(112, 95, 1, 0, 0, 0, '2023-04-16'),
(113, 91, 1, 0, 0, 0, '2023-04-16'),
(114, 181, 1, 0, 0, 0, '2023-04-16'),
(115, 90, 1, 0, 0, 0, '2023-04-17'),
(116, 91, 1, 0, 0, 0, '2023-04-17'),
(117, 95, 1, 0, 0, 0, '2023-04-17'),
(118, 90, 1, 0, 0, 0, '2023-04-18'),
(119, 91, 1, 0, 0, 0, '2023-04-18'),
(120, 92, 3, 0, 0, 0, '2023-04-18'),
(121, 93, 1, 0, 0, 0, '2023-04-18'),
(122, 96, 1, 0, 0, 0, '2023-04-18'),
(123, 183, 2, 0, 0, 0, '2023-04-19'),
(124, 96, 4, 0, 0, 0, '2023-04-19'),
(125, 90, 2, 0, 0, 0, '2023-04-19'),
(126, 92, 2, 1, 0, 0, '2023-04-19'),
(127, 95, 6, 3, 0, 0, '2023-04-19'),
(128, 93, 5, 0, 0, 0, '2023-04-19'),
(129, 181, 1, 0, 0, 0, '2023-04-19'),
(130, 91, 2, 0, 0, 0, '2023-04-19'),
(131, 89, 1, 0, 0, 0, '2023-04-19'),
(132, 182, 1, 0, 0, 0, '2023-04-19'),
(133, 93, 2, 0, 0, 0, '2023-04-20'),
(134, 92, 1, 0, 0, 0, '2023-04-20'),
(135, 91, 0, 1, 0, 0, '2023-04-20'),
(136, 184, 5, 3, 0, 0, '2023-04-20'),
(137, 184, 4, 0, 0, 0, '2023-04-21'),
(138, 92, 1, 0, 0, 0, '2023-04-21'),
(139, 95, 1, 0, 0, 0, '2023-04-21'),
(140, 186, 2, 0, 0, 0, '2023-04-21'),
(141, 93, 1, 0, 0, 0, '2023-04-21'),
(142, 187, 3, 3, 0, 0, '2023-04-21'),
(143, 188, 2, 0, 0, 0, '2023-04-21'),
(144, 189, 1, 0, 0, 0, '2023-04-21'),
(145, 96, 1, 0, 0, 0, '2023-04-21'),
(146, 96, 2, 0, 0, 0, '2023-04-22'),
(147, 188, 7, 1, 0, 0, '2023-04-22'),
(148, 189, 7, 1, 0, 0, '2023-04-22'),
(149, 183, 1, 0, 0, 0, '2023-04-22'),
(150, 182, 1, 0, 0, 0, '2023-04-22'),
(151, 181, 1, 0, 0, 0, '2023-04-22'),
(152, 93, 1, 0, 0, 0, '2023-04-22'),
(153, 95, 1, 0, 0, 0, '2023-04-22'),
(154, 92, 1, 0, 0, 0, '2023-04-22'),
(155, 189, 1, 0, 0, 0, '2023-04-23'),
(156, 188, 1, 0, 0, 0, '2023-04-23'),
(157, 90, 1, 0, 0, 0, '2023-04-23'),
(158, 190, 1, 0, 0, 0, '2023-04-26'),
(159, 188, 1, 0, 0, 0, '2023-04-26'),
(160, 191, 1, 0, 0, 0, '2023-04-26'),
(161, 182, 1, 0, 0, 0, '2023-04-26'),
(162, 181, 1, 0, 0, 0, '2023-04-26'),
(163, 191, 1, 1, 0, 0, '2023-04-27'),
(164, 189, 1, 0, 0, 0, '2023-04-27'),
(165, 184, 1, 0, 0, 0, '2023-04-27'),
(166, 187, 1, 1, 0, 0, '2023-04-27'),
(167, 186, 1, 0, 0, 0, '2023-04-27'),
(168, 91, 0, 1, 0, 0, '2023-04-28'),
(169, 181, 1, 0, 0, 0, '2023-04-28'),
(170, 187, 1, 0, 0, 0, '2023-04-28'),
(171, 188, 1, 0, 0, 0, '2023-04-28'),
(172, 90, 1, 0, 0, 0, '2023-04-28'),
(173, 183, 1, 0, 0, 0, '2023-04-29'),
(174, 191, 1, 0, 0, 0, '2023-04-29'),
(175, 189, 1, 0, 0, 0, '2023-04-29'),
(176, 188, 1, 0, 0, 0, '2023-04-29'),
(177, 187, 1, 0, 0, 0, '2023-04-29'),
(178, 186, 1, 0, 0, 0, '2023-04-29'),
(179, 184, 1, 0, 0, 0, '2023-04-29'),
(180, 181, 1, 0, 0, 0, '2023-04-29'),
(181, 90, 1, 0, 0, 0, '2023-04-29'),
(182, 89, 1, 0, 0, 0, '2023-04-29'),
(183, 95, 1, 0, 0, 0, '2023-04-29'),
(184, 95, 1, 0, 0, 0, '2023-04-30'),
(185, 187, 3, 0, 0, 0, '2023-04-30'),
(186, 92, 1, 0, 0, 0, '2023-04-30'),
(187, 187, 2, 0, 0, 0, '2023-05-01'),
(188, 186, 1, 0, 0, 0, '2023-05-01'),
(189, 189, 2, 0, 0, 0, '2023-05-01'),
(190, 188, 1, 0, 0, 0, '2023-05-01'),
(191, 90, 1, 0, 0, 0, '2023-05-01'),
(192, 96, 1, 2, 0, 0, '2023-05-01'),
(193, 195, 1, 0, 0, 0, '2023-05-01'),
(194, 187, 2, 3, 0, 0, '2023-05-02'),
(195, 195, 1, 1, 0, 0, '2023-05-02'),
(196, 189, 1, 0, 0, 0, '2023-05-02'),
(197, 188, 3, 1, 0, 0, '2023-05-02'),
(198, 187, 1, 0, 0, 0, '2023-05-03'),
(199, 195, 2, 2, 0, 0, '2023-05-03'),
(200, 196, 2, 1, 0, 0, '2023-05-04'),
(201, 188, 1, 0, 0, 0, '2023-05-04'),
(202, 197, 2, 1, 0, 0, '2023-05-04'),
(203, 93, 1, 0, 0, 0, '2023-05-04'),
(204, 198, 2, 1, 0, 0, '2023-05-04'),
(205, 89, 0, 1, 0, 0, '2023-05-04'),
(206, 187, 1, 0, 0, 0, '2023-05-04'),
(207, 199, 1, 1, 0, 0, '2023-05-04'),
(208, 96, 1, 0, 0, 0, '2023-05-05'),
(209, 188, 1, 0, 0, 0, '2023-05-05'),
(210, 189, 2, 0, 0, 0, '2023-05-05'),
(211, 90, 2, 0, 0, 0, '2023-05-05'),
(212, 91, 1, 0, 0, 0, '2023-05-05'),
(213, 92, 2, 0, 0, 0, '2023-05-05'),
(214, 187, 0, 1, 0, 0, '2023-05-05'),
(215, 199, 2, 1, 0, 0, '2023-05-05'),
(216, 196, 1, 2, 0, 0, '2023-05-05'),
(217, 200, 1, 0, 0, 0, '2023-05-05'),
(218, 191, 1, 0, 0, 0, '2023-05-05'),
(219, 187, 1, 1, 0, 0, '2023-05-06'),
(220, 183, 1, 0, 0, 0, '2023-05-06'),
(221, 188, 1, 0, 0, 0, '2023-05-06'),
(222, 181, 1, 0, 0, 0, '2023-05-06'),
(223, 95, 1, 0, 0, 0, '2023-05-06'),
(224, 191, 1, 1, 0, 0, '2023-05-06'),
(225, 91, 1, 0, 0, 0, '2023-05-06'),
(226, 205, 1, 1, 0, 0, '2023-05-06'),
(227, 206, 1, 0, 0, 0, '2023-05-06'),
(228, 207, 1, 0, 0, 0, '2023-05-06'),
(229, 203, 1, 1, 0, 0, '2023-05-06'),
(230, 196, 1, 0, 0, 0, '2023-05-06'),
(231, 208, 1, 1, 0, 0, '2023-05-06'),
(232, 209, 1, 0, 0, 0, '2023-05-06'),
(233, 210, 1, 0, 0, 0, '2023-05-06'),
(234, 186, 1, 0, 0, 0, '2023-05-07'),
(235, 189, 1, 0, 0, 0, '2023-05-07'),
(236, 196, 2, 0, 0, 0, '2023-05-07'),
(237, 208, 1, 0, 0, 0, '2023-05-07'),
(238, 211, 1, 2, 0, 0, '2023-05-07'),
(239, 200, 1, 0, 0, 0, '2023-05-07'),
(240, 199, 1, 0, 0, 0, '2023-05-07'),
(241, 191, 1, 0, 0, 0, '2023-05-07'),
(242, 195, 1, 0, 0, 0, '2023-05-07'),
(243, 197, 1, 0, 0, 0, '2023-05-07'),
(244, 187, 1, 0, 0, 0, '2023-05-07'),
(245, 212, 1, 0, 0, 0, '2023-05-07'),
(246, 90, 1, 0, 0, 0, '2023-05-07'),
(247, 89, 3, 1, 0, 0, '2023-05-08'),
(248, 211, 1, 0, 0, 0, '2023-05-08'),
(249, 199, 1, 1, 0, 0, '2023-05-08'),
(250, 203, 0, 1, 0, 0, '2023-05-08'),
(251, 91, 1, 0, 0, 0, '2023-05-08'),
(252, 93, 1, 0, 0, 0, '2023-05-08'),
(253, 187, 1, 1, 0, 0, '2023-05-08'),
(254, 210, 1, 0, 0, 0, '2023-05-08'),
(255, 197, 1, 0, 0, 0, '2023-05-08'),
(256, 209, 1, 1, 0, 0, '2023-05-08'),
(257, 201, 1, 0, 0, 0, '2023-05-08'),
(258, 206, 1, 0, 0, 0, '2023-05-08'),
(259, 212, 2, 0, 0, 0, '2023-05-09'),
(260, 213, 1, 0, 0, 0, '2023-05-10'),
(261, 201, 3, 0, 0, 0, '2023-05-10'),
(262, 203, 1, 3, 0, 0, '2023-05-10'),
(263, 200, 1, 2, 0, 0, '2023-05-10'),
(264, 205, 0, 4, 0, 0, '2023-05-10'),
(265, 90, 1, 0, 0, 0, '2023-05-10'),
(266, 212, 1, 1, 0, 0, '2023-05-10'),
(267, 198, 2, 0, 0, 0, '2023-05-10'),
(268, 189, 3, 0, 0, 0, '2023-05-10'),
(269, 96, 1, 0, 0, 0, '2023-05-10'),
(270, 196, 1, 2, 0, 0, '2023-05-10'),
(271, 187, 2, 0, 0, 0, '2023-05-10'),
(272, 199, 0, 1, 0, 0, '2023-05-10'),
(273, 92, 1, 0, 0, 0, '2023-05-10'),
(274, 191, 1, 0, 0, 0, '2023-05-10'),
(275, 186, 2, 0, 0, 0, '2023-05-10'),
(276, 204, 0, 4, 0, 0, '2023-05-10'),
(277, 208, 1, 3, 0, 0, '2023-05-10'),
(278, 210, 0, 1, 0, 0, '2023-05-10'),
(279, 214, 1, 0, 0, 0, '2023-05-10'),
(280, 95, 2, 0, 0, 0, '2023-05-10'),
(281, 188, 1, 0, 0, 0, '2023-05-10'),
(282, 184, 1, 0, 0, 0, '2023-05-10'),
(283, 183, 1, 0, 0, 0, '2023-05-11'),
(284, 184, 1, 0, 0, 0, '2023-05-11'),
(285, 186, 2, 3, 0, 0, '2023-05-11'),
(286, 201, 1, 0, 0, 0, '2023-05-11'),
(287, 215, 1, 1, 0, 0, '2023-05-11'),
(288, 216, 1, 0, 0, 0, '2023-05-11'),
(289, 93, 1, 1, 0, 0, '2023-05-11'),
(290, 197, 1, 0, 0, 0, '2023-05-11'),
(291, 198, 3, 0, 0, 0, '2023-05-12'),
(292, 189, 5, 1, 0, 0, '2023-05-12'),
(293, 95, 1, 0, 0, 0, '2023-05-12'),
(294, 202, 1, 0, 0, 0, '2023-05-12'),
(295, 215, 1, 0, 0, 0, '2023-05-12'),
(296, 216, 0, 1, 0, 0, '2023-05-12'),
(297, 184, 1, 0, 0, 0, '2023-05-12'),
(298, 187, 1, 0, 0, 0, '2023-05-12'),
(299, 188, 3, 0, 0, 0, '2023-05-12'),
(300, 186, 1, 1, 0, 0, '2023-05-12'),
(301, 214, 1, 1, 0, 0, '2023-05-12'),
(302, 204, 0, 1, 0, 0, '2023-05-12'),
(303, 201, 1, 0, 0, 0, '2023-05-12'),
(304, 199, 1, 2, 0, 0, '2023-05-12'),
(305, 96, 1, 0, 0, 0, '2023-05-13'),
(306, 217, 1, 0, 0, 0, '2023-05-13');

-- --------------------------------------------------------

--
-- Table structure for table `gig`
--

CREATE TABLE `gig` (
  `gigID` int(11) NOT NULL,
  `gigName` varchar(50) NOT NULL,
  `gigTrailor` varchar(255) NOT NULL,
  `gigScreenshot` varchar(255) NOT NULL,
  `gigDetails` text NOT NULL,
  `game` int(11) NOT NULL,
  `gameDeveloperID` int(11) NOT NULL,
  `gamePublisherID` int(11) NOT NULL,
  `gigTagline` varchar(140) NOT NULL,
  `currentStage` varchar(30) NOT NULL,
  `plannedReleaseDate` varchar(30) NOT NULL,
  `estimatedShare` varchar(50) NOT NULL,
  `expectedCost` varchar(30) NOT NULL,
  `visibility` varchar(10) NOT NULL,
  `gigCoverImg` varchar(100) NOT NULL,
  `orderedDate` date DEFAULT NULL,
  `viewCount` int(11) NOT NULL DEFAULT 0,
  `requests` int(11) NOT NULL DEFAULT 0,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `gigStatus` int(11) NOT NULL DEFAULT 0,
  `ActivityCheck` int(11) NOT NULL DEFAULT 4
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gig`
--

INSERT INTO `gig` (`gigID`, `gigName`, `gigTrailor`, `gigScreenshot`, `gigDetails`, `game`, `gameDeveloperID`, `gamePublisherID`, `gigTagline`, `currentStage`, `plannedReleaseDate`, `estimatedShare`, `expectedCost`, `visibility`, `gigCoverImg`, `orderedDate`, `viewCount`, `requests`, `created_at`, `gigStatus`, `ActivityCheck`) VALUES
(12, 'Local Bus Simulator', 'https://www.indiegala.com/login', 'SS-Naruto Shippuden-0.jpg,SS-Naruto Shippuden-1.jpg,SS-Naruto Shippuden-2.jpg', 'cscsc', 89, 46, 0, 'Bus simulator game consisting with customizable local buses ', '12', '2023-04-20', '12', '1000', 'draft', 'Cover-Local Bus Simulator.jpg', NULL, 29, 0, '2023-03-15', 1, 4),
(13, 'Indie Desert FPS ', 'https://www.indiegala.com/login', 'SS-Stray-0.jpg,SS-Stray-1.jpg,SS-Stray-2.jpg,SS-Stray-3.jpg', 'fefeff', 93, 51, 0, 'Surviving an endless desert after being stranded by you know', '1', '2023-04-20', '12', '1000', 'draft', 'Cover-Indie Desert FPS .jpg', NULL, 20, 0, '2023-04-11', 0, 4),
(20, 'This is a new gig made by me and my other', 'https://www.indieabode.ffcom', 'SS-20-0.jpg,SS-20-1.jpg,SS-20-2.jpg', 'fkh hthth<u>jyjyjyjj <b>yjtyjytjyj </b>jytjjjytjj yjtyjytj</u>', 96, 46, 0, 'I am developing an open world game with extreme high movements', '3', '2023-04-20', '13', '200', 'draft', 'Cover-20.jpg', NULL, 14, 0, '2023-04-10', 0, 4),
(25, 'Indie Puzzle Platformer', 'https://www.indiegala.com/login', 'SS-187-0.jpg,SS-187-1.jpg,SS-187-2.jpg', '<b>ABOUT THIS GAME</b><div>Currently I have been developing this game for five months and has gained considerably pleasing progress. Currently it contains five levels with nearly 15 minutes of gameplay. The game has been released on Indieabode as a Demo to try out for anybody who gets liking in the game features, mechanics shown in the images and videos.</div><div><br></div><div><b>DEVELOPMENT OF RECOURSE</b></div><div>Recourse is been developed in Unity game engine using C# as the programming language. As the sole developer I am responsible for all the coding, modeling, texturing and sounds also. Every model currently in use in the game is made by me using Blender and Substance Painter. For audios, and sound effects I am using Audacity and SFXR. The however still lacks on VFX but they would also be added to the game due time.</div>', 187, 81, 0, 'Stylish Puzzle Platformer with a casual gameplay loop', '1', '2024-06-17', '10', '500', 'draft', 'Cover-Indie Puzzle Platformer.jpg', NULL, 7, 0, '2023-04-21', 1, 4),
(26, 'New Gig 2fe', '', 'SS-187-0.jpg', '', 187, 81, 0, 'I am developing an open world game with extreme high movements', '2', '2023-04-05', '3', '1234', 'draft', 'Cover-New Gig 2fe.jpg', NULL, 7, 1, '2023-04-26', 0, 4),
(27, 'Cooperative Horror Shooter', '', 'SS-211-0.jpg,SS-211-1.jpg,SS-211-2.jpg', '', 211, 82, 0, 'Explore the world of horror with your friends while striving to survive yourself', '6', '2025-06-17', '10', '1000', 'public', 'Cover-Cooperative Horror Shooter.jpg', NULL, 10, 2, '2023-05-07', 1, 4),
(28, 'Open World Super Hero Game', '', 'SS-212-0.jpg,SS-212-1.png,SS-212-2.jpg', '', 212, 46, 0, 'Become your favourite super hero super man and explore the continent flying around the globe', '2', '2024-10-03', '20', '1000', 'public', 'Cover-Open World Super Hero Game.jpg', NULL, 4, 1, '2023-05-07', 1, 4),
(29, 'A stylish bombing game', '', 'SS-29-0.jpg,SS-29-1.png', '', 215, 83, 0, 'Drop bombs all across the world with your favourite friends', '4', '2023-05-23', '25', '500', 'public', 'Cover-A stylish bombing game.jpg', NULL, 3, 1, '2023-05-11', 0, 4),
(31, 'Nostalgic Atmospheric FPS', '', 'SS-216-0.jpg,SS-216-1.jpg,SS-216-2.jpg', '', 216, 81, 0, 'Explore the world connected through the ropes which binds woods to form a bridge across the tall towers', '5', '2026-11-25', '20', '10000', 'public', 'Cover-Nostalgic Atmospheric FPS.jpg', NULL, 2, 0, '2023-05-11', 0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `gigmessages`
--

CREATE TABLE `gigmessages` (
  `msgID` int(11) NOT NULL,
  `senderID` int(11) NOT NULL,
  `receiverID` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `gigID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gigmessages`
--

INSERT INTO `gigmessages` (`msgID`, `senderID`, `receiverID`, `message`, `gigID`) VALUES
(1, 46, 100, 'qwe', 21),
(2, 46, 100, 'dd', 21),
(3, 46, 100, 'f', 21),
(4, 47, 100, 'qw', 21),
(5, 47, 46, 'hello', 21),
(6, 46, 47, 'good morning', 21),
(7, 47, 46, 'yeah you too', 21),
(8, 46, 47, 'so whats up', 21),
(9, 47, 46, 'yo', 21),
(10, 47, 51, 'hi kavindu', 13),
(11, 47, 51, 'i am interested in your game mentioned in the gig', 13),
(12, 47, 51, 'wanna talk about it more?', 13),
(13, 46, 47, 'easy', 21),
(14, 46, 47, 'fefefef', 21),
(15, 47, 46, 'yes', 21),
(16, 47, 46, 'yu can say so', 21),
(17, 47, 46, 'surew', 21),
(18, 47, 46, 'for what', 21),
(19, 47, 46, 'hiii', 23),
(20, 47, 46, 'seems like everything is working right?', 12),
(21, 46, 47, 'hthr', 12),
(22, 47, 46, 'what', 12),
(23, 46, 47, 'sry', 12),
(24, 46, 47, 'dw', 12),
(25, 98, 82, 'Hello ', 27),
(26, 82, 98, 'yess', 27),
(27, 82, 98, 'are you interested in this game?', 27),
(28, 98, 82, 'yes I am', 27),
(29, 98, 82, 'But I need to know more about you and the game', 27),
(30, 82, 98, 'Did you check my portfolio?', 27),
(31, 98, 82, 'Yes I did. I could say you are very professional and creative', 27),
(32, 98, 82, 'it would be nice to work with someone who has already got experience in the field', 27),
(33, 82, 98, 'Wow', 27),
(34, 82, 98, 'Thank You So much', 27),
(35, 98, 82, 'Now About the Order', 27),
(36, 82, 98, 'Yes', 27),
(37, 98, 82, 'So you are saying that you need $1000 ahead right?', 27),
(38, 82, 98, 'yes sir', 27),
(39, 98, 82, 'Will that be enough for you to successfully achieve the goal', 27),
(40, 82, 98, 'I have calculated the whole plan and I think that would be enough', 27),
(41, 98, 82, 'okay great. I can provide you that amount to continue your work', 27),
(42, 98, 82, 'But the issue is the share value!', 27),
(43, 82, 98, 'what is the suggestion sir', 27),
(44, 98, 82, 'I could work with atleast 15%', 27),
(45, 98, 82, 'but 10% is too low', 27),
(46, 98, 82, 'also for this game I would prefer 20%', 27),
(47, 98, 82, 'Is it too much for you?', 27),
(48, 82, 98, 'I might have to think over it', 27),
(49, 82, 98, 'can you give me 2 days max', 27),
(50, 82, 98, 'I will inform you surely', 27),
(51, 98, 82, 'okay no problem', 27),
(52, 98, 82, 'take your time', 27),
(53, 100, 82, 'hi', 27),
(54, 100, 82, 'I would like to buy this order right now?', 27),
(55, 82, 100, 'oh really?', 27),
(56, 82, 100, 'no changes needed?', 27),
(57, 100, 82, 'No nothing', 27),
(58, 100, 82, 'I am happy with the numbers', 27),
(59, 82, 100, 'great. Lets confirm the numbers then?', 27),
(60, 100, 82, 'here I go', 27),
(61, 100, 82, 'done', 27),
(62, 100, 82, 'your turn', 27),
(63, 82, 100, 'okay', 27),
(64, 82, 100, 'did', 27),
(65, 82, 100, 'Now you should be able to buy the game', 27),
(66, 100, 82, 'yeah', 27),
(67, 100, 82, 'it is visible', 27),
(68, 46, 99, 'helloo', 28),
(69, 46, 99, 'are you there?', 28),
(70, 99, 46, 'yeah', 28),
(71, 99, 46, 'I might like to do some changes', 28),
(72, 46, 99, 'okay ', 28),
(73, 99, 46, 'i customized', 28),
(74, 99, 46, 'Wht do u think?', 28),
(75, 46, 99, 'Its okay ig', 28),
(76, 47, 83, 'cvc', 29);

-- --------------------------------------------------------

--
-- Table structure for table `gigs_views_tracker`
--

CREATE TABLE `gigs_views_tracker` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `sessionID` int(11) NOT NULL,
  `gigID` int(11) NOT NULL,
  `viewedDate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gigs_views_tracker`
--

INSERT INTO `gigs_views_tracker` (`id`, `userID`, `sessionID`, `gigID`, `viewedDate`) VALUES
(1, 46, 77, 12, '2023-04-12'),
(2, 46, 74, 20, '2023-04-13'),
(3, 46, 52, 20, '2023-04-14'),
(4, 46, 52, 13, '2023-04-14'),
(5, 47, 63, 12, '2023-04-15'),
(6, 47, 58, 12, '2023-04-16'),
(7, 47, 58, 21, '2023-04-16'),
(8, 47, 58, 20, '2023-04-16'),
(9, 47, 58, 13, '2023-04-16'),
(10, 0, 0, 12, '2023-04-16'),
(11, 47, 41, 12, '2023-04-16'),
(12, 47, 13, 12, '2023-04-16'),
(13, 47, 70, 12, '2023-04-16'),
(14, 47, 49, 12, '2023-04-16'),
(15, 47, 48, 12, '2023-04-16'),
(16, 47, 95, 12, '2023-04-16'),
(17, 47, 23, 12, '2023-04-16'),
(18, 47, 99, 12, '2023-04-16'),
(19, 47, 65, 12, '2023-04-17'),
(20, 47, 60, 12, '2023-04-18'),
(21, 47, 47, 12, '2023-04-18'),
(22, 47, 47, 20, '2023-04-18'),
(23, 47, 11, 12, '2023-04-18'),
(24, 47, 50, 12, '2023-04-19'),
(25, 52, 47, 12, '2023-04-19'),
(26, 46, 23, 12, '2023-04-19'),
(27, 52, 10, 20, '2023-04-19'),
(28, 52, 10, 21, '2023-04-19'),
(29, 52, 10, 13, '2023-04-19'),
(30, 52, 10, 12, '2023-04-19'),
(31, 46, 60, 20, '2023-04-19'),
(32, 46, 60, 12, '2023-04-19'),
(33, 46, 60, 24, '2023-04-19'),
(34, 46, 60, 13, '2023-04-19'),
(35, 46, 60, 21, '2023-04-19'),
(36, 52, 52, 13, '2023-04-19'),
(37, 47, 79, 20, '2023-04-19'),
(38, 47, 79, 12, '2023-04-19'),
(39, 47, 79, 13, '2023-04-19'),
(40, 47, 79, 21, '2023-04-19'),
(41, 46, 46, 20, '2023-04-19'),
(42, 47, 34, 20, '2023-04-19'),
(43, 78, 48, 20, '2023-04-19'),
(44, 78, 48, 13, '2023-04-19'),
(45, 78, 48, 12, '2023-04-19'),
(46, 81, 64, 12, '2023-04-21'),
(47, 81, 64, 25, '2023-04-21'),
(48, 46, 80, 12, '2023-04-28'),
(49, 46, 80, 25, '2023-04-28'),
(50, 81, 82, 12, '2023-04-30'),
(51, 47, 56, 20, '2023-04-30'),
(52, 46, 68, 25, '2023-05-01'),
(53, 52, 65, 12, '2023-05-04'),
(54, 52, 65, 25, '2023-05-04'),
(55, 52, 65, 13, '2023-05-04'),
(56, 52, 65, 26, '2023-05-04'),
(57, 92, 78, 12, '2023-05-05'),
(58, 92, 78, 26, '2023-05-05'),
(59, 92, 78, 25, '2023-05-05'),
(60, 47, 11, 13, '2023-05-06'),
(61, 47, 11, 26, '2023-05-06'),
(62, 81, 70, 13, '2023-05-06'),
(63, 81, 70, 26, '2023-05-06'),
(64, 81, 70, 25, '2023-05-06'),
(65, 82, 73, 13, '2023-05-06'),
(66, 82, 29, 27, '2023-05-07'),
(67, 98, 58, 27, '2023-05-07'),
(68, 98, 97, 27, '2023-05-07'),
(69, 99, 89, 27, '2023-05-07'),
(70, 98, 64, 27, '2023-05-07'),
(71, 98, 78, 27, '2023-05-07'),
(72, 100, 51, 27, '2023-05-07'),
(73, 98, 75, 27, '2023-05-07'),
(74, 100, 93, 27, '2023-05-07'),
(75, 46, 34, 28, '2023-05-07'),
(76, 99, 57, 28, '2023-05-07'),
(77, 98, 59, 12, '2023-05-07'),
(78, 98, 59, 25, '2023-05-07'),
(79, 98, 59, 27, '2023-05-07'),
(80, 98, 59, 28, '2023-05-07'),
(81, 98, 59, 13, '2023-05-07'),
(82, 98, 59, 20, '2023-05-07'),
(83, 98, 59, 26, '2023-05-07'),
(84, 46, 95, 13, '2023-05-08'),
(85, 47, 76, 13, '2023-05-08'),
(86, 47, 76, 20, '2023-05-08'),
(87, 47, 76, 26, '2023-05-08'),
(88, 46, 10, 13, '2023-05-08'),
(89, 46, 32, 13, '2023-05-08'),
(90, 46, 32, 26, '2023-05-08'),
(91, 46, 32, 20, '2023-05-08'),
(92, 46, 68, 28, '2023-05-09'),
(93, 81, 41, 13, '2023-05-10'),
(94, 46, 97, 13, '2023-05-10'),
(95, 83, 94, 29, '2023-05-11'),
(96, 81, 63, 29, '2023-05-11'),
(97, 81, 63, 30, '2023-05-11'),
(98, 81, 63, 31, '2023-05-11'),
(99, 81, 63, 13, '2023-05-11'),
(100, 46, 41, 13, '2023-05-12'),
(101, 46, 41, 31, '2023-05-12'),
(102, 47, 38, 29, '2023-05-12');

-- --------------------------------------------------------

--
-- Table structure for table `gig_purchases`
--

CREATE TABLE `gig_purchases` (
  `id` int(11) NOT NULL,
  `gigID` int(11) NOT NULL,
  `developerID` int(11) NOT NULL,
  `publisherID` int(11) NOT NULL,
  `publisherCost` double NOT NULL,
  `sharePercentage` double NOT NULL,
  `publisherIncome` double NOT NULL DEFAULT 0,
  `purchasedDate` date NOT NULL DEFAULT current_timestamp(),
  `orderID` varchar(250) NOT NULL,
  `developerShare` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gig_purchases`
--

INSERT INTO `gig_purchases` (`id`, `gigID`, `developerID`, `publisherID`, `publisherCost`, `sharePercentage`, `publisherIncome`, `purchasedDate`, `orderID`, `developerShare`) VALUES
(5, 12, 46, 47, 1000, 15, 0, '2023-04-18', '643e31b288504', 0),
(6, 27, 82, 100, 1000, 10, 0, '2023-05-07', '6457a70585432', 0),
(7, 28, 46, 99, 500, 25, 0, '2023-05-07', '6457b935c652e', 459.325);

-- --------------------------------------------------------

--
-- Table structure for table `giveaways`
--

CREATE TABLE `giveaways` (
  `id` int(11) NOT NULL,
  `gameID` int(11) NOT NULL,
  `copiesCount` int(11) NOT NULL,
  `pieceWorth` int(11) NOT NULL,
  `copiesLeft` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `giveaways`
--

INSERT INTO `giveaways` (`id`, `gameID`, `copiesCount`, `pieceWorth`, `copiesLeft`) VALUES
(2, 188, 3, 450, 2),
(3, 198, 5, 50, 1);

-- --------------------------------------------------------

--
-- Table structure for table `giveaway_claims`
--

CREATE TABLE `giveaway_claims` (
  `id` int(11) NOT NULL,
  `gameID` int(11) NOT NULL,
  `winnerID` int(11) NOT NULL,
  `won_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `giveaway_claims`
--

INSERT INTO `giveaway_claims` (`id`, `gameID`, `winnerID`, `won_date`) VALUES
(1, 198, 84, '2023-05-04'),
(2, 198, 86, '2023-05-04'),
(3, 198, 52, '2023-05-04'),
(4, 198, 53, '2023-05-04'),
(5, 188, 86, '2023-05-12');

-- --------------------------------------------------------

--
-- Table structure for table `handlecomplaint`
--

CREATE TABLE `handlecomplaint` (
  `complaintID` int(11) NOT NULL,
  `gamerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `joinjam_gamedevs`
--

CREATE TABLE `joinjam_gamedevs` (
  `gamerID` int(11) NOT NULL,
  `gameJamID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `joinjam_gamedevs`
--

INSERT INTO `joinjam_gamedevs` (`gamerID`, `gameJamID`) VALUES
(52, 57),
(52, 57),
(52, 57),
(52, 57),
(52, 57),
(52, 57),
(46, 67),
(81, 65),
(46, 65),
(46, 58),
(82, 65),
(83, 65),
(46, 62),
(92, 62),
(83, 62),
(93, 62),
(82, 62),
(81, 62),
(95, 62),
(46, 59);

-- --------------------------------------------------------

--
-- Table structure for table `joinjam_gamers`
--

CREATE TABLE `joinjam_gamers` (
  `GamerID` int(11) NOT NULL,
  `GameJamID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `joinjam_gamers`
--

INSERT INTO `joinjam_gamers` (`GamerID`, `GameJamID`) VALUES
(52, 57),
(53, 57),
(84, 62),
(52, 62),
(86, 62),
(53, 62);

-- --------------------------------------------------------

--
-- Table structure for table `library`
--

CREATE TABLE `library` (
  `id` int(11) NOT NULL,
  `developerID` varchar(50) NOT NULL,
  `itemID` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `library`
--

INSERT INTO `library` (`id`, `developerID`, `itemID`) VALUES
(41, '46', '92'),
(42, '46', '96'),
(43, '53', '92'),
(44, '46', '91'),
(45, '46', '10'),
(46, '52', '96');

-- --------------------------------------------------------

--
-- Table structure for table `organizegamejam`
--

CREATE TABLE `organizegamejam` (
  `gameJamID` int(11) NOT NULL,
  `gameJamOrganizerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `paidasset`
--

CREATE TABLE `paidasset` (
  `assetID` int(11) NOT NULL,
  `assetName` varchar(50) NOT NULL,
  `assetGenre` varchar(50) NOT NULL,
  `assetDetails` text NOT NULL,
  `assetScreenshots` varchar(255) NOT NULL,
  `assetTitle` varchar(50) NOT NULL,
  `assetTagline` varchar(255) NOT NULL,
  `assetClasification` varchar(50) NOT NULL,
  `assetReleaseStatus` varchar(20) NOT NULL,
  `assetTags` varchar(20) NOT NULL,
  `assetFile` varchar(255) NOT NULL,
  `assetLicence` varchar(255) NOT NULL,
  `assetCoverImg` varchar(255) NOT NULL,
  `assetVisibility` tinyint(1) NOT NULL,
  `assetVideoURL` varchar(255) NOT NULL,
  `assetType` varchar(30) NOT NULL,
  `assetStyle` varchar(50) NOT NULL,
  `assetPrice` float NOT NULL,
  `assetCreatorID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `paidgame`
--

CREATE TABLE `paidgame` (
  `gameID` int(11) NOT NULL,
  `gameName` varchar(50) NOT NULL,
  `releaseStatus` varchar(30) NOT NULL,
  `gameDetails` varchar(255) NOT NULL,
  `gameScreenshots` varchar(255) NOT NULL,
  `gameTrailor` varchar(255) NOT NULL,
  `gameTitle` varchar(50) NOT NULL,
  `GameTagline` varchar(255) NOT NULL,
  `gameClassification` varchar(50) NOT NULL,
  `gamePlatform` varchar(30) NOT NULL,
  `gameFeatures` varchar(50) NOT NULL,
  `gameTags` varchar(30) NOT NULL,
  `gameFile` varchar(255) NOT NULL,
  `gameVisibility` varchar(50) NOT NULL,
  `gameCoverImg` varchar(255) NOT NULL,
  `gamePrice` float NOT NULL,
  `gameDeveloperID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `participatecrowdfund`
--

CREATE TABLE `participatecrowdfund` (
  `crowdFundID` int(11) NOT NULL,
  `gamerID` int(11) NOT NULL,
  `donatedAmount` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentID` int(11) NOT NULL,
  `paymentAmount` float NOT NULL,
  `cardNumber` varchar(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `cvv` varchar(3) NOT NULL,
  `expireDate` date NOT NULL,
  `gameID` int(11) NOT NULL,
  `assetID` int(11) NOT NULL,
  `cartID` int(11) NOT NULL,
  `gigID` int(11) NOT NULL,
  `crowdFundID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `portfolioID` int(11) NOT NULL,
  `profilePic` varchar(255) NOT NULL,
  `postCount` int(11) NOT NULL,
  `followerCount` int(11) NOT NULL,
  `followingCount` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `tagline` varchar(255) NOT NULL,
  `gamerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rategame`
--

CREATE TABLE `rategame` (
  `gamerID` int(11) NOT NULL,
  `gameID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ratesubmission`
--

CREATE TABLE `ratesubmission` (
  `gamerID` int(11) NOT NULL,
  `submissionID` int(11) NOT NULL,
  `rating` float NOT NULL,
  `id` int(11) NOT NULL,
  `jamID` int(11) NOT NULL,
  `rated_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ratesubmission`
--

INSERT INTO `ratesubmission` (`gamerID`, `submissionID`, `rating`, `id`, `jamID`, `rated_date`) VALUES
(53, 183, 2, 8, 57, '2023-04-20'),
(52, 183, 5, 9, 57, '2023-04-20'),
(84, 199, 3, 10, 62, '2023-05-08'),
(52, 199, 5, 11, 62, '2023-05-08'),
(52, 203, 2, 12, 62, '2023-05-08'),
(86, 210, 4, 13, 62, '2023-05-08'),
(52, 200, 3, 14, 62, '2023-05-10'),
(52, 205, 1, 15, 62, '2023-05-10'),
(52, 204, 5, 16, 62, '2023-05-10'),
(52, 208, 2, 17, 62, '2023-05-10'),
(52, 210, 3, 18, 62, '2023-05-10'),
(53, 199, 1, 19, 62, '2023-05-10'),
(53, 200, 3, 20, 62, '2023-05-10'),
(53, 203, 4, 21, 62, '2023-05-10'),
(53, 205, 4, 22, 62, '2023-05-10'),
(53, 208, 3, 23, 62, '2023-05-10'),
(53, 210, 0, 24, 62, '2023-05-10'),
(84, 200, 4, 25, 62, '2023-05-10'),
(84, 203, 3, 26, 62, '2023-05-10'),
(84, 204, 4, 27, 62, '2023-05-10'),
(84, 205, 1, 28, 62, '2023-05-10'),
(84, 210, 1, 29, 62, '2023-05-10'),
(84, 208, 5, 30, 62, '2023-05-10'),
(86, 208, 3, 31, 62, '2023-05-10'),
(86, 205, 1, 32, 62, '2023-05-10'),
(86, 204, 3, 33, 62, '2023-05-10'),
(86, 203, 3, 34, 62, '2023-05-10'),
(86, 200, 5, 35, 62, '2023-05-10'),
(86, 199, 2, 36, 62, '2023-05-10');

-- --------------------------------------------------------

--
-- Table structure for table `requestedgigs`
--

CREATE TABLE `requestedgigs` (
  `id` int(11) NOT NULL,
  `gigID` int(11) NOT NULL,
  `developerID` int(11) NOT NULL,
  `publisherID` int(11) NOT NULL,
  `gigToken` varchar(255) NOT NULL,
  `cost` int(11) NOT NULL,
  `share` int(11) NOT NULL,
  `publisherCostApproval` varchar(50) DEFAULT 'null',
  `developerCostApproval` varchar(50) DEFAULT 'null',
  `publisherShareApproval` varchar(50) DEFAULT 'null',
  `developerShareApproval` varchar(50) DEFAULT 'null',
  `eligible` int(11) NOT NULL DEFAULT 0,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requestedgigs`
--

INSERT INTO `requestedgigs` (`id`, `gigID`, `developerID`, `publisherID`, `gigToken`, `cost`, `share`, `publisherCostApproval`, `developerCostApproval`, `publisherShareApproval`, `developerShareApproval`, `eligible`, `created_at`) VALUES
(40, 20, 46, 47, '2047', 200, 0, 'Approved', 'null', 'Approved', '', 0, '2023-05-07'),
(41, 13, 51, 47, '1347', 0, 0, 'Approved', '', '', '', 0, '2023-05-07'),
(54, 27, 82, 98, '2798', 1000, 10, 'null', 'null', 'null', 'null', 0, '2023-05-07'),
(60, 26, 81, 47, '2647', 1000, 10, 'Approved', 'Approved', 'Approved', 'Approved', 1, '2023-05-08'),
(61, 29, 83, 47, '2947', 500, 25, 'Approved', 'null', 'Approved', 'null', 0, '2023-05-12');

-- --------------------------------------------------------

--
-- Table structure for table `sitegamesrevenue`
--

CREATE TABLE `sitegamesrevenue` (
  `id` int(11) NOT NULL,
  `gameID` int(11) NOT NULL,
  `orderID` varchar(255) NOT NULL,
  `siteShare` float NOT NULL,
  `sale_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sitegamesrevenue`
--

INSERT INTO `sitegamesrevenue` (`id`, `gameID`, `orderID`, `siteShare`, `sale_date`) VALUES
(5, 189, '6443b232426bd', 4.999, '2023-04-22'),
(6, 189, '6443e7a97c091', 7.999, '2023-04-22'),
(7, 189, '6443e7ea3e09e', 7.999, '2023-04-22'),
(8, 188, '6443e7ea3e09e', 13.5983, '2023-04-22'),
(9, 188, '6443f34c510a9', 13.5983, '2023-04-22'),
(10, 189, '6443f34c510a9', 7.999, '2023-04-22'),
(11, 189, '6443f6316333f', 4.999, '2023-04-22'),
(12, 188, '6443f6316333f', 5.1, '2023-04-22'),
(13, 196, '64535743c6705', 4, '2023-05-04'),
(14, 196, '64535814c0ad2', 4, '2023-05-04'),
(15, 197, '64535e5d5af23', 5.999, '2023-05-04'),
(16, 197, '64535f5760d8a', 5.999, '2023-05-04'),
(17, 196, '6454dd1a67f99', 4, '2023-05-05'),
(18, 209, '6458e057c80bf', 5.649, '2023-05-08'),
(19, 214, '645de012af69c', 6.8, '2023-05-12');

-- --------------------------------------------------------

--
-- Table structure for table `site_assets_revenue`
--

CREATE TABLE `site_assets_revenue` (
  `id` int(11) NOT NULL,
  `assetID` int(11) NOT NULL,
  `orderID` varchar(255) NOT NULL,
  `siteShare` float NOT NULL,
  `sale_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `site_assets_revenue`
--

INSERT INTO `site_assets_revenue` (`id`, `assetID`, `orderID`, `siteShare`, `sale_date`) VALUES
(1, 29, '6444b3e376984', 3.4, '2023-04-23'),
(2, 17, '6444d2173979b', 3, '2023-04-23'),
(3, 19, '6444d2173979b', 3.249, '2023-04-23'),
(4, 21, '64453ce3ded5c', 3, '2023-04-23'),
(5, 31, '645b7fb56497e', 4.5, '2023-05-10'),
(6, 38, '645c6c67aea26', 4.5, '2023-05-11');

-- --------------------------------------------------------

--
-- Table structure for table `site_crowdfund_revenue`
--

CREATE TABLE `site_crowdfund_revenue` (
  `id` int(11) NOT NULL,
  `crowdfundID` int(11) NOT NULL,
  `siteShare` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `site_gig_revenue`
--

CREATE TABLE `site_gig_revenue` (
  `id` int(11) NOT NULL,
  `gigID` int(11) NOT NULL,
  `orderID` varchar(255) NOT NULL,
  `siteShare` float NOT NULL,
  `sale_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `site_gig_revenue`
--

INSERT INTO `site_gig_revenue` (`id`, `gigID`, `orderID`, `siteShare`, `sale_date`) VALUES
(1, 27, '6457a70585432', 50, '2023-05-07'),
(2, 28, '6457b935c652e', 25, '2023-05-07');

-- --------------------------------------------------------

--
-- Table structure for table `spin_wheel`
--

CREATE TABLE `spin_wheel` (
  `id` int(11) NOT NULL,
  `gamerID` int(11) NOT NULL,
  `reward` varchar(250) NOT NULL,
  `spinned_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `spin_wheel`
--

INSERT INTO `spin_wheel` (`id`, `gamerID`, `reward`, `spinned_date`) VALUES
(4, 52, '5', '2023-05-01'),
(5, 53, '6', '2023-05-01'),
(6, 52, '5', '2023-05-02'),
(7, 53, '0', '2023-05-02'),
(8, 86, '5', '2023-05-02'),
(9, 84, '15', '2023-05-04'),
(10, 52, '15', '2023-05-04'),
(11, 86, '10', '2023-05-04'),
(12, 53, '10', '2023-05-04'),
(13, 53, '15', '2023-05-05'),
(14, 84, '10', '2023-05-08'),
(15, 86, '10', '2023-05-08'),
(16, 52, '5', '2023-05-10'),
(17, 53, '5', '2023-05-10'),
(18, 84, '10', '2023-05-10'),
(19, 86, '5', '2023-05-10'),
(20, 52, '5', '2023-05-11'),
(21, 52, '15', '2023-05-12'),
(22, 53, '5', '2023-05-12'),
(23, 86, '5', '2023-05-12');

-- --------------------------------------------------------

--
-- Table structure for table `submission`
--

CREATE TABLE `submission` (
  `id` int(11) NOT NULL,
  `submissionID` int(11) NOT NULL,
  `gameJamID` int(11) NOT NULL,
  `rating` int(11) NOT NULL DEFAULT 0,
  `gamerID` int(11) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'qualified'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `submission`
--

INSERT INTO `submission` (`id`, `submissionID`, `gameJamID`, `rating`, `gamerID`, `status`) VALUES
(1, 93, 58, 0, 46, 'qualified'),
(2, 183, 57, 7, 46, 'qualified'),
(3, 181, 57, 0, 51, 'qualified'),
(5, 195, 67, 0, 46, 'qualified'),
(6, 199, 62, 11, 46, 'qualified'),
(7, 200, 62, 15, 92, 'qualified'),
(8, 203, 62, 12, 83, 'qualified'),
(11, 204, 62, 12, 93, 'qualified'),
(12, 205, 62, 7, 81, 'disqualified'),
(13, 208, 62, 13, 82, 'qualified'),
(14, 210, 62, 8, 95, 'qualified');

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `gamerID` int(11) NOT NULL,
  `gameDeveloperFlag` tinyint(1) NOT NULL,
  `gamePublisherFlag` tinyint(1) NOT NULL,
  `gameJamOrgernizerFlag` tinyint(1) NOT NULL,
  `adminFlag` tinyint(1) NOT NULL,
  `assetCreatorFlag` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `roleType` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `roleType`) VALUES
(1, 'admin'),
(2, 'gamer'),
(3, 'game developer'),
(4, 'asset creator'),
(5, 'gamejam organizer'),
(6, 'game publisher');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `activation_keys`
--
ALTER TABLE `activation_keys`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `addassetsale`
--
ALTER TABLE `addassetsale`
  ADD PRIMARY KEY (`assetSaleID`,`assetID`),
  ADD KEY `assetID` (`assetID`);

--
-- Indexes for table `addgamesale`
--
ALTER TABLE `addgamesale`
  ADD PRIMARY KEY (`gameSaleID`),
  ADD KEY `gameID` (`gameID`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assetcart`
--
ALTER TABLE `assetcart`
  ADD PRIMARY KEY (`assetID`,`cartID`),
  ADD KEY `cartID` (`cartID`);

--
-- Indexes for table `assetsale`
--
ALTER TABLE `assetsale`
  ADD PRIMARY KEY (`assetSaleID`);

--
-- Indexes for table `asset_cart`
--
ALTER TABLE `asset_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `asset_library`
--
ALTER TABLE `asset_library`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `asset_purchases`
--
ALTER TABLE `asset_purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `asset_reviews`
--
ALTER TABLE `asset_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `asset_stats`
--
ALTER TABLE `asset_stats`
  ADD PRIMARY KEY (`assetID`);

--
-- Indexes for table `asset_stats_history`
--
ALTER TABLE `asset_stats_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `asset_view_tracker`
--
ALTER TABLE `asset_view_tracker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billing_addresses`
--
ALTER TABLE `billing_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`complaintID`);

--
-- Indexes for table `complaint_reasons_items`
--
ALTER TABLE `complaint_reasons_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaint_reason_jams`
--
ALTER TABLE `complaint_reason_jams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaint_submissions`
--
ALTER TABLE `complaint_submissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crowdfund`
--
ALTER TABLE `crowdfund`
  ADD PRIMARY KEY (`crowdFundID`);

--
-- Indexes for table `crowdfund_donations`
--
ALTER TABLE `crowdfund_donations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crowdfund_view_tracker`
--
ALTER TABLE `crowdfund_view_tracker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `devlog`
--
ALTER TABLE `devlog`
  ADD PRIMARY KEY (`devLogID`);

--
-- Indexes for table `devlog_comments`
--
ALTER TABLE `devlog_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userID` (`userID`),
  ADD KEY `devlogID` (`devlogID`);

--
-- Indexes for table `devlog_comments_replies`
--
ALTER TABLE `devlog_comments_replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userID` (`userID`),
  ADD KEY `commentID` (`commentID`);

--
-- Indexes for table `devlog_likes`
--
ALTER TABLE `devlog_likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `devlog_posttype`
--
ALTER TABLE `devlog_posttype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `devlog_view_tracker`
--
ALTER TABLE `devlog_view_tracker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `followers`
--
ALTER TABLE `followers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `freeasset`
--
ALTER TABLE `freeasset`
  ADD PRIMARY KEY (`assetID`);

--
-- Indexes for table `freegame`
--
ALTER TABLE `freegame`
  ADD PRIMARY KEY (`gameID`);

--
-- Indexes for table `gamejam`
--
ALTER TABLE `gamejam`
  ADD PRIMARY KEY (`gameJamID`);

--
-- Indexes for table `gamer`
--
ALTER TABLE `gamer`
  ADD PRIMARY KEY (`gamerID`);

--
-- Indexes for table `games_cart`
--
ALTER TABLE `games_cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gamerID` (`gamerID`);

--
-- Indexes for table `games_filters`
--
ALTER TABLE `games_filters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `games_view_tracker`
--
ALTER TABLE `games_view_tracker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `game_cart`
--
ALTER TABLE `game_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `game_library`
--
ALTER TABLE `game_library`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `game_purchases`
--
ALTER TABLE `game_purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `game_reviews`
--
ALTER TABLE `game_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userID` (`userID`),
  ADD KEY `gameID` (`gameID`);

--
-- Indexes for table `game_stats`
--
ALTER TABLE `game_stats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gameID` (`gameID`);

--
-- Indexes for table `game_stats_history`
--
ALTER TABLE `game_stats_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gig`
--
ALTER TABLE `gig`
  ADD PRIMARY KEY (`gigID`),
  ADD KEY `gameDeveloperID` (`gameDeveloperID`),
  ADD KEY `game` (`game`);

--
-- Indexes for table `gigmessages`
--
ALTER TABLE `gigmessages`
  ADD PRIMARY KEY (`msgID`);

--
-- Indexes for table `gigs_views_tracker`
--
ALTER TABLE `gigs_views_tracker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gig_purchases`
--
ALTER TABLE `gig_purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `giveaways`
--
ALTER TABLE `giveaways`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `giveaway_claims`
--
ALTER TABLE `giveaway_claims`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `joinjam_gamedevs`
--
ALTER TABLE `joinjam_gamedevs`
  ADD KEY `gamerID` (`gamerID`),
  ADD KEY `gameJamID` (`gameJamID`);

--
-- Indexes for table `library`
--
ALTER TABLE `library`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratesubmission`
--
ALTER TABLE `ratesubmission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requestedgigs`
--
ALTER TABLE `requestedgigs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gigID` (`gigID`);

--
-- Indexes for table `sitegamesrevenue`
--
ALTER TABLE `sitegamesrevenue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_assets_revenue`
--
ALTER TABLE `site_assets_revenue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_crowdfund_revenue`
--
ALTER TABLE `site_crowdfund_revenue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_gig_revenue`
--
ALTER TABLE `site_gig_revenue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spin_wheel`
--
ALTER TABLE `spin_wheel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submission`
--
ALTER TABLE `submission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `activation_keys`
--
ALTER TABLE `activation_keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `asset_cart`
--
ALTER TABLE `asset_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `asset_library`
--
ALTER TABLE `asset_library`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `asset_purchases`
--
ALTER TABLE `asset_purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `asset_reviews`
--
ALTER TABLE `asset_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `asset_stats_history`
--
ALTER TABLE `asset_stats_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `asset_view_tracker`
--
ALTER TABLE `asset_view_tracker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `billing_addresses`
--
ALTER TABLE `billing_addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `complaintID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `complaint_reasons_items`
--
ALTER TABLE `complaint_reasons_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `complaint_reason_jams`
--
ALTER TABLE `complaint_reason_jams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `complaint_submissions`
--
ALTER TABLE `complaint_submissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `crowdfund`
--
ALTER TABLE `crowdfund`
  MODIFY `crowdFundID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `crowdfund_donations`
--
ALTER TABLE `crowdfund_donations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `crowdfund_view_tracker`
--
ALTER TABLE `crowdfund_view_tracker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `devlog`
--
ALTER TABLE `devlog`
  MODIFY `devLogID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `devlog_comments`
--
ALTER TABLE `devlog_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `devlog_comments_replies`
--
ALTER TABLE `devlog_comments_replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `devlog_likes`
--
ALTER TABLE `devlog_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `devlog_posttype`
--
ALTER TABLE `devlog_posttype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `devlog_view_tracker`
--
ALTER TABLE `devlog_view_tracker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `followers`
--
ALTER TABLE `followers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `freeasset`
--
ALTER TABLE `freeasset`
  MODIFY `assetID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `freegame`
--
ALTER TABLE `freegame`
  MODIFY `gameID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=218;

--
-- AUTO_INCREMENT for table `gamejam`
--
ALTER TABLE `gamejam`
  MODIFY `gameJamID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `gamer`
--
ALTER TABLE `gamer`
  MODIFY `gamerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `games_cart`
--
ALTER TABLE `games_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `games_filters`
--
ALTER TABLE `games_filters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `games_view_tracker`
--
ALTER TABLE `games_view_tracker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=476;

--
-- AUTO_INCREMENT for table `game_cart`
--
ALTER TABLE `game_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `game_library`
--
ALTER TABLE `game_library`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `game_purchases`
--
ALTER TABLE `game_purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `game_reviews`
--
ALTER TABLE `game_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `game_stats`
--
ALTER TABLE `game_stats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `game_stats_history`
--
ALTER TABLE `game_stats_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=307;

--
-- AUTO_INCREMENT for table `gig`
--
ALTER TABLE `gig`
  MODIFY `gigID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `gigmessages`
--
ALTER TABLE `gigmessages`
  MODIFY `msgID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `gigs_views_tracker`
--
ALTER TABLE `gigs_views_tracker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `gig_purchases`
--
ALTER TABLE `gig_purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `giveaways`
--
ALTER TABLE `giveaways`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `giveaway_claims`
--
ALTER TABLE `giveaway_claims`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `library`
--
ALTER TABLE `library`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `ratesubmission`
--
ALTER TABLE `ratesubmission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `requestedgigs`
--
ALTER TABLE `requestedgigs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `sitegamesrevenue`
--
ALTER TABLE `sitegamesrevenue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `site_assets_revenue`
--
ALTER TABLE `site_assets_revenue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `site_crowdfund_revenue`
--
ALTER TABLE `site_crowdfund_revenue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `site_gig_revenue`
--
ALTER TABLE `site_gig_revenue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `spin_wheel`
--
ALTER TABLE `spin_wheel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `submission`
--
ALTER TABLE `submission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `gamer` (`gamerID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `activation_keys`
--
ALTER TABLE `activation_keys`
  ADD CONSTRAINT `activation_keys_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `gamer` (`gamerID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `asset_stats`
--
ALTER TABLE `asset_stats`
  ADD CONSTRAINT `asset_stats_ibfk_1` FOREIGN KEY (`assetID`) REFERENCES `freeasset` (`assetID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `devlog_comments`
--
ALTER TABLE `devlog_comments`
  ADD CONSTRAINT `devlog_comments_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `gamer` (`gamerID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `devlog_comments_ibfk_2` FOREIGN KEY (`devlogID`) REFERENCES `devlog` (`devLogID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `games_cart`
--
ALTER TABLE `games_cart`
  ADD CONSTRAINT `games_cart_ibfk_1` FOREIGN KEY (`gamerID`) REFERENCES `gamer` (`gamerID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `game_reviews`
--
ALTER TABLE `game_reviews`
  ADD CONSTRAINT `game_reviews_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `gamer` (`gamerID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `game_reviews_ibfk_2` FOREIGN KEY (`gameID`) REFERENCES `freegame` (`gameID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `game_stats`
--
ALTER TABLE `game_stats`
  ADD CONSTRAINT `game_stats_ibfk_1` FOREIGN KEY (`gameID`) REFERENCES `freegame` (`gameID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gig`
--
ALTER TABLE `gig`
  ADD CONSTRAINT `gig_ibfk_1` FOREIGN KEY (`gameDeveloperID`) REFERENCES `gamer` (`gamerID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gig_ibfk_2` FOREIGN KEY (`game`) REFERENCES `freegame` (`gameID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `joinjam_gamedevs`
--
ALTER TABLE `joinjam_gamedevs`
  ADD CONSTRAINT `joinjam_gamedevs_ibfk_1` FOREIGN KEY (`gamerID`) REFERENCES `gamer` (`gamerID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `joinjam_gamedevs_ibfk_2` FOREIGN KEY (`gameJamID`) REFERENCES `gamejam` (`gameJamID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `requestedgigs`
--
ALTER TABLE `requestedgigs`
  ADD CONSTRAINT `requestedgigs_ibfk_1` FOREIGN KEY (`gigID`) REFERENCES `gig` (`gigID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
