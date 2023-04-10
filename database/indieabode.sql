-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2023 at 01:26 PM
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
  `tagline` varchar(100) NOT NULL,
  `socialLink` varchar(50) NOT NULL,
  `phoneNumber` varchar(15) NOT NULL,
  `fullName` varchar(50) NOT NULL,
  `cardNo` varchar(30) NOT NULL,
  `expireDate` date NOT NULL,
  `cvv` varchar(10) NOT NULL,
  `birthDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`userID`, `profilePhoto`, `location`, `tagline`, `socialLink`, `phoneNumber`, `fullName`, `cardNo`, `expireDate`, `cvv`, `birthDate`) VALUES
(46, '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00'),
(47, '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00'),
(48, '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00'),
(51, '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00'),
(52, '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00'),
(53, '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00'),
(78, '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00');

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
(14, 78, '84140');

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
(16, 20, 46, '2023-03-21');

-- --------------------------------------------------------

--
-- Table structure for table `asset_purchases`
--

CREATE TABLE `asset_purchases` (
  `id` int(11) NOT NULL,
  `assetID` int(11) NOT NULL,
  `buyerID` int(11) NOT NULL,
  `orderID` varchar(250) NOT NULL,
  `purchasedPrice` double NOT NULL,
  `purchasedData` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `asset_purchases`
--

INSERT INTO `asset_purchases` (`id`, `assetID`, `buyerID`, `orderID`, `purchasedPrice`, `purchasedData`) VALUES
(18, 17, 46, '6418200e3e141', 30, '2023-03-20'),
(19, 17, 46, '641825ffad068', 30, '2023-03-20'),
(20, 20, 46, '6419734216074', 30, '2023-03-21');

-- --------------------------------------------------------

--
-- Table structure for table `asset_stats`
--

CREATE TABLE `asset_stats` (
  `assetID` int(11) NOT NULL,
  `downloads` int(11) NOT NULL DEFAULT 0,
  `views` int(11) NOT NULL DEFAULT 0,
  `ratings` int(11) NOT NULL DEFAULT 0,
  `ratingCount` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `asset_stats`
--

INSERT INTO `asset_stats` (`assetID`, `downloads`, `views`, `ratings`, `ratingCount`) VALUES
(9, 0, 0, 0, 0),
(10, 0, 0, 0, 0),
(17, 0, 0, 0, 0),
(18, 0, 0, 0, 0),
(19, 0, 0, 0, 0),
(20, 0, 0, 0, 0),
(21, 0, 0, 0, 0);

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
(4, 9, 0, 1, 0, 0, '2023-03-15');

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
(2, 46, 'fef100', 'No:345/D/2', 'fef', 'Attanagalla', 'ffef', 'ff', 'Sri Lanka'),
(3, 51, 'fef100', 'No:345/D/2', 'fef', 'Attanagalla', 'ffef', 'ff', 'Sri Lanka'),
(4, 52, 'kk alwis', 'No:345/D/3', 'Kongaswatte2', 'Attanagalla2', 'Western2', '21112', 'Sri Lanka');

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
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`complaintID`, `reason`, `description`, `gamerID`, `type`) VALUES
(2, 'Spam', 'Not Cheerful as it claims', 46, 'Game'),
(3, 'Spam', 'I made the same game', 46, 'Game');

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
-- Table structure for table `crowdfund`
--

CREATE TABLE `crowdfund` (
  `crowdFundID` int(11) NOT NULL,
  `currentAmount` float NOT NULL,
  `deadline` date NOT NULL,
  `expectedAmount` float NOT NULL,
  `gameDeveloperName` varchar(50) NOT NULL,
  `gameName` varchar(30) NOT NULL,
  `title` varchar(50) NOT NULL,
  `tagline` varchar(255) NOT NULL,
  `backers` int(11) NOT NULL,
  `details` text NOT NULL,
  `visibility` varchar(10) NOT NULL,
  `crowdfundCoverImg` varchar(255) NOT NULL,
  `crowdfundSS` varchar(255) NOT NULL,
  `crowdfundTrailer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `crowdfund`
--

INSERT INTO `crowdfund` (`crowdFundID`, `currentAmount`, `deadline`, `expectedAmount`, `gameDeveloperName`, `gameName`, `title`, `tagline`, `backers`, `details`, `visibility`, `crowdfundCoverImg`, `crowdfundSS`, `crowdfundTrailer`) VALUES
(1, 0, '0000-00-00', 0, '12', 'Albion Online', 'ergrgrtg', 'dwd', 0, 'dwdwd', 'draft', 'Cover-Albion Online.jpg', 'SS-Albion Online-0.png,SS-Albion Online-1.png', 'https://itch.io/jam/my-first-game-jam-winter-2023'),
(2, 0, '0000-00-00', 0, 'Beidou', 'Scarlet Nexus', 'ergrgrtg', 'gtgrtgrttrht', 0, 'hthth', 'draft', 'Cover-Scarlet Nexus.png', 'SS-Scarlet Nexus-0.jpg,SS-Scarlet Nexus-1.jpg,SS-Scarlet Nexus-2.jpg', 'https://itch.io/jam/my-first-game-jam-winter-2023'),
(3, 0, '0000-00-00', 0, 'Beidou', 'Naruto Shippuden', 'ergrgrtgfef', 'ffef', 0, 'fefef', 'draft', 'Cover-Naruto Shippuden.jpg', 'SS-Naruto Shippuden-0.jpg,SS-Naruto Shippuden-1.jpg,SS-Naruto Shippuden-2.jpg', 'https://itch.io/jam/my-first-game-jam-winter-2023'),
(4, 0, '0000-00-00', 0, 'Beidou', 'Albion Online 2', 'ergrgrtgd wdw', 'httrh', 0, 'fefe', 'draft', 'Cover-Albion Online 2.png', 'SS-Albion Online 2-0.jpg,SS-Albion Online 2-1.jpg', 'https://itch.io/jam/my-first-game-jam-winter-2023'),
(5, 0, '0000-00-00', 0, 'Beidou', 'Albion Online', 'ergrgrtgffe', 'gtgrtgrttrht', 0, 'fefef', 'draft', 'Cover-Albion Online.png', 'SS-Albion Online-0.jpg,SS-Albion Online-1.jpg,SS-Albion Online-2.jpg', 'https://itch.io/jam/my-first-game-jam-winter-2023'),
(6, 0, '2023-04-13', 0, 'Beidou', 'Monster Hunter Rise', 'new crowdfunding', 'gtgrtgrttrht', 0, '', 'draft', 'Cover-Monster Hunter Rise.jpg', 'SS-Monster Hunter Rise-0.jpg,SS-Monster Hunter Rise-1.jpg', 'https://itch.io/jam/my-first-game-jam-winter-2023'),
(7, 0, '2023-04-28', 233, 'Beidou', 'Albion Online 3', 'grgrgg', 'grgrg', 0, 'grgg<div style=\"text-align: center;\">ggrghh</div><div style=\"text-align: center;\"><br></div>', 'draft', 'Cover-Albion Online 3.jpg', 'SS-Albion Online 3-0.jpg,SS-Albion Online 3-1.jpg', 'https://itch.io/jam/my-first-game-jam-winter-2023');

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
(8, 5, 46, 30, '6433a6896a058', '2023-04-10 11:38:52');

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
  `commentCount` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `devlog`
--

INSERT INTO `devlog` (`publishDate`, `description`, `name`, `Tagline`, `Type`, `Visibility`, `devlogImg`, `gameName`, `devLogID`, `CreatedDate`, `likeCount`, `commentCount`) VALUES
('2023-02-09 17:38:43', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce quis hendrerit neque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras fermentum pharetra sem. Vestibulum eu est urna. Cras non ipsum non massa sodales condimentum quis eu risus. Praesent volutpat lorem a dolor tristique luctus eget sed elit. Ut facilisis faucibus justo tincidunt eleifend. Curabitur ultrices sapien id lorem posuere, vitae mattis nisi faucibus. Aliquam congue lorem sit amet velit lobortis, non venenatis massa feugiat. Aenean ut vehicula nibh, sed vehicula lacus. Praesent eu eros id leo maximus rhoncus eget eget risus. Curabitur vitae faucibus ligula, ac tincidunt dui. Sed diam massa, euismod sit amet augue a, pharetra egestas augue. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.\r\n\r\nIn hendrerit magna a dui tincidunt porta. Curabitur suscipit ex consectetur mauris ullamcorper rutrum. Mauris feugiat aliquet tristique. Curabitur egestas suscipit iaculis. Quisque tristique posuere augue, ac aliquet nisi vestibulum id. Curabitur efficitur nibh eu ipsum venenatis, et ornare tellus pellentesque. Nullam mollis lacus in nibh vestibulum, nec dignissim justo tristique. In congue dolor suscipit, eleifend leo et, commodo purus. Curabitur gravida risus et leo porttitor facilisis ut vestibulum ex. Donec enim tortor, commodo facilisis vestibulum non, viverra sed augue. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aenean ultricies metus vitae lobortis fermentum. Maecenas vulputate ante a sollicitudin congue. Duis purus erat, finibus eget magna sit amet, porta pharetra massa.\r\n\r\nVestibulum eleifend imperdiet felis sit amet placerat. Nulla auctor pretium turpis, quis porttitor lacus tempor vitae. Vestibulum semper non enim at dignissim. Mauris consequat elit ac purus congue iaculis. Aenean ac nibh a dolor efficitur fermentum. Mauris a porttitor lorem, ac gravida tellus. Cras iaculis malesuada mollis.', 'Finishing Utility Inventory', 'Bonjour! This is a post about me finally finishing the Utiltiy ', 'Game Design', 'draft', 'SS-Albion Online.png', '89', 28, '2020-12-29 00:00:00', 1, 2),
('2023-02-09 17:41:03', '', 'How to Build a Mansion', 'Showing steps of using tiles to build a mansion in the city ', 'Game Design', 'draft', '', '93', 29, '2020-12-26 00:00:00', 0, 0),
('2023-02-09 17:43:00', 'dwfwf', 'Level Editor Tutorial', 'Optimized level editor is available to players for free with extensions', 'Game Design', 'draft', 'SS-Final Fantasy VII.jpg', '93', 30, '2020-11-29 00:00:00', 1, 1),
('2023-03-07 12:55:38', 'dwdw', 'dwd', 'ddwd', 'Tutorial', 'draft', 'SS-89.png', '89', 31, '0000-00-00 00:00:00', 1, 0),
('2023-03-12 18:12:11', 'ththt', 'tthht', 'hth', 'Tutorial', 'draft', 'SS-89.png', '89', 34, '0000-00-00 00:00:00', 0, 0),
('2023-04-10 04:44:15', '', 'New Devlog', 'Hi all i have returned with a polished new devlog', 'Tutorial', 'draft', '', '95', 35, '0000-00-00 00:00:00', 0, 0),
('2023-04-10 04:50:44', 'grgrg&nbsp;<div><div style=\"text-align: center;\">grgrgrgrgrgrg</div><div style=\"text-align: center;\"><br></div><div>grrgrg<b>grggrggrg grgrgeeg</b></div></div>', 'fefefg', 'ggrgrggg', 'Major Update', 'draft', 'SS-89.jpg', '89', 36, '0000-00-00 00:00:00', 1, 1),
('2023-04-10 04:56:25', 'hththh<div>h</div><div>thththh</div><div><br></div><div style=\"text-align: center;\">htht</div>', 'grgrgr', 'hththth', 'Game Design', 'draft', 'SS-141.jpg', '141', 37, NULL, 1, 0);

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
(25, 46, 'grgrg', 36, '2023-04-10');

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
(35, 46, 25, 'grgrg', '2023-04-10');

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
(9, 30, 46),
(11, 28, 46),
(12, 31, 46),
(13, 36, 46),
(14, 37, 46);

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
-- Table structure for table `freeasset`
--

CREATE TABLE `freeasset` (
  `assetID` int(11) NOT NULL,
  `assetName` varchar(50) NOT NULL,
  `assetGenre` varchar(50) NOT NULL,
  `assetPrice` varchar(10) NOT NULL,
  `version` varchar(10) NOT NULL,
  `assetDetails` text NOT NULL,
  `assetScreenshots` varchar(255) NOT NULL,
  `assetTitle` varchar(50) NOT NULL,
  `assetTagline` varchar(255) NOT NULL,
  `assetClassification` varchar(20) NOT NULL,
  `assetReleaseStatus` varchar(20) NOT NULL,
  `assetTags` varchar(20) NOT NULL,
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
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `freeasset`
--

INSERT INTO `freeasset` (`assetID`, `assetName`, `assetGenre`, `assetPrice`, `version`, `assetDetails`, `assetScreenshots`, `assetTitle`, `assetTagline`, `assetClassification`, `assetReleaseStatus`, `assetTags`, `assetFile`, `assetLicense`, `assetCoverImg`, `assetVisibility`, `assetVideoURL`, `assetType`, `assetStyle`, `assetCreatorID`, `fileSize`, `fileExtension`, `created_at`) VALUES
(9, 'Sprout Lands', '', '', '', '', 'SS-Sprout Lands-0.png,SS-Sprout Lands-1.png', '', 'Cute pixel pastel farming asset pack for free', '2d', 'released', 'pixel art, sprout la', 'asset-Sprout Lands.zip', 'proprietary', 'Cover-Sprout Lands.png', 0, 'https://www.youtube.com/watch?v=dnJUE2ptB5U', 'sprite', 'pixelart', 47, '', '', '0000-00-00 00:00:00'),
(10, 'Cozy People', '', '', '', '', 'SS-Cozy People-0.png,SS-Cozy People-1.png', '', 'Animated characters, hairstyles and clothes!', '3d', 'released', 'food, sprites, icons', 'asset-Cozy People.zip', 'open-source', 'Cover-Cozy People.png', 0, 'https://www.youtube.com/watch?v=dnJUE2ptB5U', 'sprite', 'pixelart', 47, '', '', '0000-00-00 00:00:00'),
(17, 'New Asset', '', '30.00', '', '', 'SS-New Asset-0.jpg,SS-New Asset-1.png', '', 'Buy this one ASAP', '2d', 'released', 'feff', 'asset-New Asset.zip', 'proprietary', 'Cover-New Asset.png', 0, 'https://www.youtube.com/watch?v=dnJUE2ptB5U', 'skybox', '16bit', 47, '', '', '0000-00-00 00:00:00'),
(18, 'New Asset 2', '', '0', '', '', 'SS-New Asset 2-0.jpg,SS-New Asset 2-1.jpg,SS-New Asset 2-2.png', '', 'cute pixel pastel farming asset pack', 'visualEffects', 'released', 'fefef', 'asset-New Asset 2.zip', 'proprietary', 'Cover-New Asset 2.jpg', 0, 'https://www.youtube.com/watch?v=dnJUE2ptB5U', 'skybox', '8bit', 47, '', '', '0000-00-00 00:00:00'),
(19, 'New Asset 3', '', '$2.00', '', '', 'SS-New Asset 3-0.jpg,SS-New Asset 3-1.jpg,SS-New Asset 3-2.jpg', '', 'cute pixel pastel farming asset pack', '3d', 'released', 'grgg', 'asset-New Asset 3.zip', 'open-source', 'Cover-New Asset 3.jpg', 0, 'https://www.youtube.com/watch?v=dnJUE2ptB5U', 'character', '8bit', 47, '', '', '0000-00-00 00:00:00'),
(20, 'New Asset 4', '', '2.00', '', '', 'SS-New Asset 4-0.jpg,SS-New Asset 4-1.jpg,SS-New Asset 4-2.jpg', '', 'cute pixel pastel farming asset pack', '3d', 'released', 'grgr', 'asset-New Asset 4.zip', 'open-source', 'Cover-New Asset 4.jpg', 0, 'https://www.youtube.com/watch?v=dnJUE2ptB5U', 'sprite', 'pixelart', 47, '', '', '0000-00-00 00:00:00'),
(21, 'New Asset 5', '', '12', '', '', 'SS-New Asset 5-0.png,SS-New Asset 5-1.png', '', 'cute pixel pastel farming asset pack', '3d', 'released', 'brbr', 'asset-New Asset 5.zip', 'open-source', 'Cover-New Asset 5.png', 0, 'https://www.youtube.com/watch?v=dnJUE2ptB5U', 'sprite', 'pixelart', 47, '', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `freegame`
--

CREATE TABLE `freegame` (
  `gameID` int(11) NOT NULL,
  `gameName` varchar(255) NOT NULL,
  `releaseStatus` varchar(50) NOT NULL,
  `gameDetails` text NOT NULL,
  `gameScreenshots` varchar(255) NOT NULL,
  `gameTrailor` varchar(255) NOT NULL,
  `gameTagline` varchar(255) NOT NULL,
  `gameClassification` varchar(50) NOT NULL,
  `gameTags` varchar(30) NOT NULL,
  `gameFeatures` varchar(255) NOT NULL,
  `platform` varchar(50) NOT NULL,
  `gameType` varchar(15) NOT NULL,
  `gameFile` varchar(255) NOT NULL,
  `gameVisibility` tinyint(1) NOT NULL,
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
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `freegame`
--

INSERT INTO `freegame` (`gameID`, `gameName`, `releaseStatus`, `gameDetails`, `gameScreenshots`, `gameTrailor`, `gameTagline`, `gameClassification`, `gameTags`, `gameFeatures`, `platform`, `gameType`, `gameFile`, `gameVisibility`, `gameCoverImg`, `gameDeveloperID`, `minOS`, `minProcessor`, `minMemory`, `minStorage`, `minGraphics`, `other`, `recommendOS`, `recommendProcessor`, `recommendMemory`, `recommendStorage`, `recommendGraphics`, `gamePrice`, `created_at`) VALUES
(89, 'Albion Online Z1', 'Upcoming', '', '', '', 'Free medieval fantasy MMORPG, set in a medieval world', 'Action', '', '', 'Linux', 'Base Game', '', 0, '', 46, '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00'),
(90, 'Stray', 'Upcoming', '<h3>ABOUT THIS GAME</h3>\r\n<br>\r\n<p>Lost, alone and separated from family, a stray cat must untangle an ancient mystery to escape a long-forgotten city.\r\n\r\nStray is a third-person cat adventure game set amidst the detailed, neon-lit alleys of a decaying cybercity and the murky environments of its seedy underbelly. Roam surroundings high and low, defend against unforeseen threats and solve the mysteries of this unwelcoming place inhabited by curious droids and dangerous creatures.\r\n\r\nSee the world through the eyes of a cat and interact with the environment in playful ways. Be stealthy, nimble, silly, and sometimes as annoying as possible with the strange inhabitants of this mysterious world.\r\n\r\nAlong the way, the cat befriends a small flying drone, known only as B-12. With the help of this newfound companion, the duo must find a way out.\r\n\r\nStray is developed by BlueTwelve Studio, a small team from the south of France mostly made up of cats and a handful of humans.<p>', 'SS-Stray-0.jpg,SS-Stray-1.jpg,SS-Stray-2.jpg', 'https://www.youtube.com/watch?v=dnJUE2ptB5U', 'follows a stray cat who falls into a walled city populated by robots', 'action', 'stray, cat, 3d', 'Puzzle', 'Linux', 'DLC', 'Game-Stray.zip', 0, 'Cover-Stray.jpg', 49, 'windows 7', 'Intel Core I3', '4 GB', '5 GB', 'mx330', 'Extra Content', 'windows 10', 'Intel Core I5', '8 GB', '10 GB', 'mx1650', '', '0000-00-00 00:00:00'),
(91, 'Scarlet Nexus', 'Upcoming', '<h3>ABOUT THIS GAME</h3>\r\n<p>In the far distant future, a psionic hormone was discovered in the human brain, granting people extra-sensory powers and changed the world as we knew it. As humanity entered this new era, deranged mutants known as Others began to descend from the sky with a hunger for human brains. Highly resistant to conventional attack methods, extreme measures needed to be taken to battle the overwhelming threat and preserve humanity. Those with acute extra-sensory abilities, known as psionics, were our only chance to fight the onslaught from above. Since then, psionics have been scouted for their talents and recruited to the Other Suppression Force (OSF), humanity’s last line of defense.\r\n</p>\r\n<br>\r\n<p>Featuring a dual story, begin your adventure with either Yuito Sumeragi, an energetic recruit from a prestigious political family or Kasane Randall, the mysterious scout whose power and skill has gained great notoriety among the OSF. As their different experiences interweave with each other, it is only then that you will reveal the full story and unlock all the mysteries of a Brain Punk future caught between technology and psychic abilities in SCARLET NEXUS.\r\n</p>\r\n<br>\r\n<p>Kinetic Psychic Combat – Using psycho-kinetic abilities, the world around you becomes your greatest weapon. Lift, break and throw pieces of your environment to build your attack combos and lay waste to your enemies.\r\n\r\nExterminate the Others – Deranged mutants that descended from the sky, highly resistant to conventional attack methods and defenses. Tormented by the constant pain of their mutation, they seek brains of living organisms to calm their madness.\r\n\r\nDiscover a Brain Punk future – Explore and protect a futuristic Japanese landscape that combines inspirations from classic anime and western science fiction.\r\n\r\nA Dual Story Experience – Dive into a complex story of bonds, courage and heroism, crafted by minds behind the iconic Tales of Vesperia.</p>', 'SS-Scarlet Nexus-0.jpg,SS-Scarlet Nexus-1.jpg,SS-Scarlet Nexus-2.jpg', 'https://www.youtube.com/watch?v=dnJUE2ptB5U', 'Elite psionics each armed with a talent in psychokinesis', 'RPG', 'scarlet, nexus, rpg', 'Leaderboard', 'Linux', 'DLC', 'Game-Scarlet Nexus.zip', 0, 'Cover-Scarlet Nexus.jpg', 49, 'windows 7', 'Intel Core I3', '4 GB', '5 GB', 'mx330', 'English', 'windows 10', 'Intel Core I5', '8 GB', '10 GB', 'mx1650', '', '0000-00-00 00:00:00'),
(92, 'Naruto Shippuden', 'released', '<h3>ABOUT THIS GAME</h3>\r\n<br>\r\n<p>The latest opus in the acclaimed STORM series is taking you on a colourful and breathtaking ride. Take advantage of the totally revamped battle system and prepare to dive into the most epic fights you’ve ever seen in the NARUTO SHIPPUDEN: Ultimate Ninja STORM series!</p>\r\n<br>\r\n<p>\r\nPrepare for the most awaited STORM game ever created!</p>\r\n\r\n', 'SS-Naruto Shippuden-0.jpg,SS-Naruto Shippuden-1.jpg,SS-Naruto Shippuden-2.jpg', 'https://www.youtube.com/watch?v=dnJUE2ptB5U', 'The latest opus in the acclaimed STORM series is taking you ', 'action', 'naruto, anime, shippuden', 'singleplayer', 'Windows', 'Base Game', 'Game-Naruto Shippuden.zip', 0, 'Cover-Naruto Shippuden.jpg', 49, 'windows 7', 'Intel Core I3', '4 GB', '5 GB', 'mx330', 'English', 'windows 10', 'Intel Core I5', '8 GB', '10 GB', 'mx1650', '', '0000-00-00 00:00:00'),
(93, 'Monster Hunter Rise', 'Released', '<h3>ABOUT THIS GAME</h3>\r\n<br>\r\n<p>Rise to the challenge and join the hunt! In Monster Hunter Rise, the latest installment in the award-winning and top-selling Monster Hunter series, you’ll become a hunter, explore brand new maps and use a variety of weapons to take down fearsome monsters as part of an all-new storyline. The PC release also comes packed with a number of additional visual and performance enhancing optimizations.</p>\r\n<br>\r\n<h3>\r\nFerocious monsters with unique ecologies</h3>\r\n<p>\r\nHunt down a plethora of monsters with distinct behaviors and deadly ferocity. From classic returning monsters to all-new creatures inspired by Japanese folklore, including the flagship wyvern Magnamalo, you’ll need to think on your feet and master their unique tendencies if you hope to reap any of the rewards!</p>\r\n\r\n', 'SS-Monster Hunter Rise-0.jpg,SS-Monster Hunter Rise-1.jpg,SS-Monster Hunter Rise-2.jpg', 'https://www.youtube.com/watch?v=dnJUE2ptB5U', 'Rise to the challenge and join the hunt! In Monster Hunter Rise', 'Strategy', 'monster hunter, rpg, singlepla', 'singleplayer', 'Windows', 'Base Game', 'Game-Monster Hunter Rise.zip', 0, 'Cover-Monster Hunter Rise.png', 46, 'windows 7', 'Intel Core I3', '4 GB', '5 GB', 'mx330', '', 'windows 10', 'Intel Core I5', '8 GB', '10 GB', 'mx1650', '', '0000-00-00 00:00:00'),
(95, 'Naruto Shippuden', 'released', '<h3>ABOUT THIS GAME</h3>\r\n<br>\r\n<p>The latest opus in the acclaimed STORM series is taking you on a colourful and breathtaking ride. Take advantage of the totally revamped battle system and prepare to dive into the most epic fights you’ve ever seen in the NARUTO SHIPPUDEN: Ultimate Ninja STORM series!</p>\r\n<br>\r\n<p>\r\nPrepare for the most awaited STORM game ever created!</p>\r\n\r\n', 'SS-Naruto Shippuden-0.jpg,SS-Naruto Shippuden-1.jpg,SS-Naruto Shippuden-2.jpg', 'https://www.youtube.com/watch?v=dnJUE2ptB5U', 'The latest opus in the acclaimed STORM series is taking you ', 'action', 'naruto, anime, shippuden', 'singleplayer', 'Windows', 'Base Game', 'Game-Naruto Shippuden.zip', 0, 'Cover-Naruto Shippuden.jpg', 46, 'windows 7', 'Intel Core I3', '4 GB', '5 GB', 'mx330', 'English', 'windows 10', 'Intel Core I5', '8 GB', '10 GB', 'mx1650', '', '0000-00-00 00:00:00'),
(96, 'Final Fantasy VII', 'early access', '<h3>ABOUT THIS GAME</h3>\r\n<p>CRISIS CORE –FINAL FANTASY VII– REUNION is the HD remaster version of the smash hit prequel to FINAL FANTASY VII</p>\r\n<br>\r\n<p>In addition to all graphics being remastered in HD, fully voiced dialogue and new soundtrack arrangements make for a dynamic new retelling of a beloved classic.\r\n\r\nCRISIS CORE –FINAL FANTASY VII– REUNION follows the story of Zack Fair, a young warrior admired by the boy destined to save the world, trusted by men renowned as heroes of legend, and loved by the girl who holds the fate of the planet in her hands. The tale of Zack\'s dreams and honor—the legacy that connects him to Cloud—is revealed in full in this grand saga that has broken the limits of an HD remaster.</p>\r\n<br>\r\n<h3>New Features</h3>\r\n<p>All graphics fully remastered in HD, bringing the game to the latest console generation- Renewed 3D models, including characters and backgrounds, enriching the visual experience\r\n- Improved battle system providing a vastly smoother gameplay experience\r\n- Fully voiced dialogue in both English and Japanese\r\n- A newly arranged soundtrack from the original composer, Takeharu Ishimoto</p>', 'SS-Final Fantasy VII-0.jpg,SS-Final Fantasy VII-1.jpg,SS-Final Fantasy VII-2.jpg', 'https://www.youtube.com/watch?v=dnJUE2ptB5U', 'Remaster of CRISIS CORE featuring updated graphics, combats', 'RPG', 'final fantasy', 'singleplayer', 'Windows', 'Base Game', 'Game-Final Fantasy VII.zip', 0, 'Cover-Final Fantasy VII.jpg', 46, 'windows 7', 'Intel Core I3', '4 GB', '5 GB', 'mx330', 'English', 'windows 10', 'Intel Core I5', '8 GB', '10 GB', 'mx1650', '', '0000-00-00 00:00:00');

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
  `jamCoverImg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gamejam`
--

INSERT INTO `gamejam` (`gameJamID`, `submissionStartDate`, `submissionEndDate`, `jamContent`, `votingEndDate`, `jamTitle`, `jamTagline`, `jamType`, `jamCriteria`, `jamVisibility`, `maxParticipants`, `canJoinAfterStarted`, `jamHostID`, `jamVoters`, `jamTwitter`, `jamCoverImg`) VALUES
(53, '2022-12-01 16:55:00', '2022-12-08 16:55:00', ' This is an online game jam, so anyone, from anywhere, aged 13 or older can enter the jam. (Those younger can take part, as long as a parent or guardian uploads the game).\r\n\r\nYou can work alone or in teams. There is no limit on the number of people per team and people can be in multiple teams.', '2022-12-15 16:55:00', 'GMTK GameJam', '48 hour game development marathon', 'Non-Ranked', 'Creativity', 'Public', 0, 1, 12, 'Public', '#gmtk', 'Cover-GMTK GameJam.jpg'),
(55, '2023-01-02 12:00:00', '2023-01-03 12:00:00', ' Genshin Impact takes place in the fantasy world of Teyvat, home to seven nations, each of which is tied to a different element and ', '2023-01-04 12:00:00', 'GameJam', 'This is a gamejam', 'Non-Ranked', 'Creativity', 'Draft', 40, 1, 12, 'Public', '#brackeys', 'Cover-GameJam.jpg'),
(56, '2023-12-01 16:55:00', '2023-12-08 16:55:00', ' majhcdsjc vmnb', '0000-00-00 00:00:00', 'majbhdhjsa', 'grg', 'Ranked', 'mdhcbgd', 'Draft', 67, 1, 16, 'Public', 'mhcbds', 'Cover-majbhdhjsa.jpg'),
(57, '2022-12-01 16:55:00', '2022-12-08 16:55:00', ' This is an online game jam, so anyone, from anywhere, aged 13 or older can enter the jam. (Those younger can take part, as long as a parent or guardian uploads the game).\r\n\r\nYou can work alone or in teams. There is no limit on the number of people per team and people can be in multiple teams.', '2022-12-15 16:55:00', 'GMTK GameJam', '48 hour game development marathon', 'Non-Ranked', 'Creativity', 'Public', 0, 1, 12, 'Public', '#gmtk', 'Cover-GMTK GameJam.jpg'),
(58, '2023-01-02 12:00:00', '2023-01-03 12:00:00', ' Genshin Impact takes place in the fantasy world of Teyvat, home to seven nations, each of which is tied to a different element and ', '2023-01-04 12:00:00', 'GameJam', 'This is a gamejam', 'Non-Ranked', 'Creativity', 'Draft', 40, 1, 12, 'Public', '#brackeys', 'Cover-GameJam.jpg'),
(59, '2023-12-01 16:55:00', '2023-12-08 16:55:00', ' majhcdsjc vmnb', '0000-00-00 00:00:00', 'majbhdhjsa', 'grg', 'Ranked', 'mdhcbgd', 'Draft', 67, 1, 16, 'Public', 'mhcbds', 'Cover-majbhdhjsa.jpg'),
(60, '2023-01-02 12:00:00', '2023-01-03 12:00:00', ' Genshin Impact takes place in the fantasy world of Teyvat, home to seven nations, each of which is tied to a different element and ', '2023-01-04 12:00:00', 'GameJam', 'This is a gamejam', 'Non-Ranked', 'Creativity', 'Draft', 40, 1, 12, 'Public', '#brackeys', 'Cover-GameJam.jpg'),
(61, '2023-12-01 16:55:00', '2023-12-08 16:55:00', ' majhcdsjc vmnb', '0000-00-00 00:00:00', 'majbhdhjsa', 'grg', 'Ranked', 'mdhcbgd', 'Draft', 67, 1, 16, 'Public', 'mhcbds', 'Cover-majbhdhjsa.jpg');

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
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gamer`
--

INSERT INTO `gamer` (`gamerID`, `email`, `password`, `accountStatus`, `avatar`, `userRole`, `username`, `firstName`, `lastName`, `loginDate`, `logoutTime`, `verified`, `token`) VALUES
(46, '7prend@gmail.com', '$2y$10$GoMCtUazYGp/cxGTPBklXe42cuR7vcZ3K4puVwUov6xozVMjZ3umG', 1, 'avatar1.png', 'game developer', 'Beidou', 'Kavindu', 'Priyanath', '2023-02-09 07:45:17', '2023-02-09 07:45:17', 1, ''),
(47, 'ypasindu11@gmail.com', '$2y$10$X6vRwMBT21PqzM57sr3fPeBK7gXyaUYiRYWEioYg/La9Sb4iPvI5.', 1, 'avatar3.png', 'game publisher', 'YPasi', 'Yeshan', 'pasindu', '2023-02-09 10:08:12', '2023-02-09 10:08:12', 1, ''),
(48, 'nadeedarshika1999@gmail.com', '$2y$10$IwPRWNFoePVsvPrzle.DyO9.8MxiOC1PAM/qVuwmJnIXE7UkRp/SS', 1, 'avatar3.png', 'asset creator', 'Nadee', 'Nadee', 'Dharshi', '2023-02-09 14:57:04', '2023-02-09 14:57:04', 0, ''),
(51, 'kavindupriyanath@gmail.com', '$2y$10$oOiRY55.Uo1h95KzjQwcFu5RSuZ0QmafaVvAfbN03lFvdE0B6xQDq', 1, 'avatar4.png', 'game developer', 'kavi', 'kavindu', 'priyanath', '2023-02-21 15:13:19', '2023-02-21 15:13:19', 1, ''),
(52, 'kimalrasanka321@gmail.com', '$2y$10$3moxbOLzKlvkAKVnCHLxS.atHdVSAWsJrqyIA/Ki9LXWrFaZKT4Mu', 1, 'avatar2.png', 'gamer', 'KRDA', 'kimal', 'xsx', '2023-02-28 06:45:33', '2023-02-28 06:45:33', 1, ''),
(53, 'klhimashanupama@gmail.com', '$2y$10$B.F4OXoJEJIWcmHKvofCRuCN8FooMdd3u8jDIn8BhvsJVPaQs0VD6', 1, 'avatar4.png', 'gamer', 'Hima', 'Himash', 'Anu', '2023-02-28 16:24:11', '2023-02-28 16:24:11', 1, ''),
(78, 'akiladharmadasa1.1@gmail.com', '$2y$10$GPdfkGBN0VVqHsFnd5swGu.TgeDM.rixafWAHmLmhsSvvLcRqZG1e', 1, 'avatar2.png', 'asset creator', 'akilaks', 'akila', 'gona', '2023-04-08 06:10:47', '2023-04-08 06:10:47', 1, '');

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
(9, 'features', 'Single Player'),
(10, 'features', 'Multi Player'),
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
(26, 'features', 'Online Co-op'),
(27, 'features', 'Multiplayer Co-op'),
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
(127, 52, 55, 95, '2023-04-10');

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
(3, 106, 52, '2023-03-21');

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
(1, 106, 52, '641996fdad338', 30, '2023-03-21');

-- --------------------------------------------------------

--
-- Table structure for table `game_reviews`
--

CREATE TABLE `game_reviews` (
  `id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `reviewTopic` varchar(100) NOT NULL,
  `review` varchar(255) NOT NULL,
  `created_date` date NOT NULL DEFAULT current_timestamp(),
  `userID` int(11) NOT NULL,
  `gameID` int(11) NOT NULL,
  `recommendation` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `game_reviews`
--

INSERT INTO `game_reviews` (`id`, `rating`, `reviewTopic`, `review`, `created_date`, `userID`, `gameID`, `recommendation`) VALUES
(49, 4, 'This is Great', 'ddwd', '2023-02-28', 52, 89, ''),
(53, 4, 'This is Gr', 'I kindly wish to raise your awareness to people trying to cheat you out of your steam points: The following comment is copy and paste from a lot of reviews on steam. People do that to trick you into giving you steam points (the steam currency) by', '2023-02-28', 52, 89, ''),
(54, 2, 'This is Great', 'jytjtjyt', '2023-02-28', 52, 89, ''),
(55, 3, 'ddwdwd', 'geegg', '2023-03-01', 53, 93, ''),
(79, 3, 'jyj', 'jyjyjj', '2023-03-12', 53, 92, 'No');

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
  `revenue` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `game_stats`
--

INSERT INTO `game_stats` (`id`, `gameID`, `views`, `downloads`, `ratings`, `revenue`) VALUES
(1, 96, 22, 0, 0, 0),
(2, 89, 8, 0, 0, 0),
(3, 90, 16, 0, 0, 0),
(4, 91, 19, 0, 0, 0),
(5, 92, 13, 0, 0, 0),
(6, 93, 1, 0, 0, 0),
(7, 95, 5, 0, 0, 0);

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
(85, 96, 6, 0, 0, 0, '2023-04-10'),
(86, 91, 2, 0, 0, 0, '2023-04-10'),
(87, 90, 3, 0, 0, 0, '2023-04-10'),
(88, 104, 1, 0, 0, 0, '2023-04-10'),
(89, 110, 1, 0, 0, 0, '2023-04-10'),
(90, 115, 1, 0, 0, 0, '2023-04-10'),
(91, 93, 1, 0, 0, 0, '2023-04-10'),
(92, 92, 2, 0, 0, 0, '2023-04-10'),
(93, 89, 1, 0, 0, 0, '2023-04-10'),
(94, 95, 2, 0, 0, 0, '2023-04-10');

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
  `orderedDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gig`
--

INSERT INTO `gig` (`gigID`, `gigName`, `gigTrailor`, `gigScreenshot`, `gigDetails`, `game`, `gameDeveloperID`, `gamePublisherID`, `gigTagline`, `currentStage`, `plannedReleaseDate`, `estimatedShare`, `expectedCost`, `visibility`, `gigCoverImg`, `orderedDate`) VALUES
(12, 'Local Bus Simulator', 'https://www.indiegala.com/login', 'SS-Naruto Shippuden-0.jpg,SS-Naruto Shippuden-1.jpg,SS-Naruto Shippuden-2.jpg', 'cscsc', 89, 46, 0, 'Bus simulator game consisting with customizable local buses ', 'adventure', '21/02/2024', '12%', '$1000', 'draft', 'Cover-Local Bus Simulator.jpg', NULL),
(13, 'Indie Desert FPS ', 'https://www.indiegala.com/login', 'SS-Stray-0.jpg,SS-Stray-1.jpg,SS-Stray-2.jpg,SS-Stray-3.jpg', 'fefeff', 93, 51, 0, 'Surviving an endless desert after being stranded by you know', 'action', '21/02/2024', '12%', '$1000', 'draft', 'Cover-Indie Desert FPS .jpg', NULL),
(20, 'New Gig', 'https://www.indiegala.com/login', 'SS-96-0.jpg,SS-96-1.jpg,SS-96-2.jpg', 'egrgr', 96, 46, 0, 'I am developing an open world game with extreme high movements', 'RPG', '21/02/2024', '12%', '$1000', 'draft', 'Cover-New Gig.png', NULL),
(21, 'Screenshot Test', 'https://www.indiegala.com/login', 'SS-96-0.jpg,SS-96-1.jpg,SS-96-2.jpg', 'fefefef', 96, 46, 0, 'I am developing an open world game with extreme high movements', 'action', '21/02/2024', '12%', '$1000', 'draft', 'Cover-Screenshot Test.jpg', NULL);

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
(19, 47, 46, 'hiii', 23);

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

-- --------------------------------------------------------

--
-- Table structure for table `joinjam_gamers`
--

CREATE TABLE `joinjam_gamers` (
  `GamerID` int(11) NOT NULL,
  `GameJamID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `rating` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `requestedgigs`
--

CREATE TABLE `requestedgigs` (
  `id` int(11) NOT NULL,
  `gigID` int(11) NOT NULL,
  `developerID` int(11) NOT NULL,
  `publisherID` int(11) NOT NULL,
  `gigToken` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requestedgigs`
--

INSERT INTO `requestedgigs` (`id`, `gigID`, `developerID`, `publisherID`, `gigToken`) VALUES
(39, 21, 46, 47, '2147'),
(40, 20, 46, 47, '2047'),
(41, 13, 51, 47, '1347');

-- --------------------------------------------------------

--
-- Table structure for table `submission`
--

CREATE TABLE `submission` (
  `id` int(11) NOT NULL,
  `submissionID` int(11) NOT NULL,
  `gameJamID` int(11) NOT NULL,
  `rating` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Indexes for table `requestedgigs`
--
ALTER TABLE `requestedgigs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gigID` (`gigID`);

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
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `activation_keys`
--
ALTER TABLE `activation_keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `asset_cart`
--
ALTER TABLE `asset_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `asset_library`
--
ALTER TABLE `asset_library`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `asset_purchases`
--
ALTER TABLE `asset_purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `asset_stats_history`
--
ALTER TABLE `asset_stats_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `billing_addresses`
--
ALTER TABLE `billing_addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `complaintID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- AUTO_INCREMENT for table `crowdfund`
--
ALTER TABLE `crowdfund`
  MODIFY `crowdFundID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `crowdfund_donations`
--
ALTER TABLE `crowdfund_donations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `devlog`
--
ALTER TABLE `devlog`
  MODIFY `devLogID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `devlog_comments`
--
ALTER TABLE `devlog_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `devlog_comments_replies`
--
ALTER TABLE `devlog_comments_replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `devlog_likes`
--
ALTER TABLE `devlog_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `devlog_posttype`
--
ALTER TABLE `devlog_posttype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `freeasset`
--
ALTER TABLE `freeasset`
  MODIFY `assetID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `freegame`
--
ALTER TABLE `freegame`
  MODIFY `gameID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT for table `gamejam`
--
ALTER TABLE `gamejam`
  MODIFY `gameJamID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `gamer`
--
ALTER TABLE `gamer`
  MODIFY `gamerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `game_cart`
--
ALTER TABLE `game_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `game_library`
--
ALTER TABLE `game_library`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `game_purchases`
--
ALTER TABLE `game_purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `game_reviews`
--
ALTER TABLE `game_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `game_stats`
--
ALTER TABLE `game_stats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `game_stats_history`
--
ALTER TABLE `game_stats_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `gig`
--
ALTER TABLE `gig`
  MODIFY `gigID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `gigmessages`
--
ALTER TABLE `gigmessages`
  MODIFY `msgID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `library`
--
ALTER TABLE `library`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `requestedgigs`
--
ALTER TABLE `requestedgigs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `submission`
--
ALTER TABLE `submission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
