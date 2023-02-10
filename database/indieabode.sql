-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2023 at 04:28 PM
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
(48, '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00');

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
(4, 48, '67170');

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
(9, 0, 0, 0, 0);

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
(5, '37', '2');

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `complaintID` int(11) NOT NULL,
  `reason` varchar(40) NOT NULL,
  `description` text NOT NULL,
  `gamerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 0, '0000-00-00', 0, '12', 'Albion Online', 'ergrgrtg', 'dwd', 0, 'dwdwd', 'draft', 'Cover-Albion Online.jpg', 'SS-Albion Online-0.png,SS-Albion Online-1.png', 'https://itch.io/jam/my-first-game-jam-winter-2023');

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
  `ReleaseDate` date DEFAULT NULL,
  `likeCount` int(11) NOT NULL DEFAULT 0,
  `commentCount` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `devlog`
--

INSERT INTO `devlog` (`publishDate`, `description`, `name`, `Tagline`, `Type`, `Visibility`, `devlogImg`, `gameName`, `devLogID`, `ReleaseDate`, `likeCount`, `commentCount`) VALUES
('2022-12-15 19:26:39', 'What is a game inventory?\r\nIn RPGs, an item inventory is a common UI feature where one can view all the items that have been collected thus far. Often, these are sorted by categories, such as \"equipment\" or \"potions.\" In other game genres, the items may take effect as soon as they are obtained.', 'Added Inventory System', 'craft new items easily with the upgraded inventory', 'Game Design', 'public', 'SS-Added Inventory System.png', 'Almighty Shields', 14, '0000-00-00', 0, 0),
('2022-12-15 19:26:39', 'What is a game inventory?\r\nIn RPGs, an item inventory is a common UI feature where one can view all the items that have been collected thus far. Often, these are sorted by categories, such as \"equipment\" or \"potions.\" In other game genres, the items may take effect as soon as they are obtained.', 'Added Inventory System', 'craft new items easily with the upgraded inventory', 'Game Design', 'public', 'SS-Added Inventory System.png', 'Almighty Shields', 20, '0000-00-00', 0, 0),
('2022-12-15 19:26:39', 'What is a game inventory?\r\nIn RPGs, an item inventory is a common UI feature where one can view all the items that have been collected thus far. Often, these are sorted by categories, such as \"equipment\" or \"potions.\" In other game genres, the items may take effect as soon as they are obtained.', 'Added Inventory System', 'craft new items easily with the upgraded inventory', 'Game Design', 'public', 'SS-Added Inventory System.png', 'Almighty Shields', 21, '2023-01-31', 0, 0),
('2022-12-15 19:26:39', 'What is a game inventory?\r\nIn RPGs, an item inventory is a common UI feature where one can view all the items that have been collected thus far. Often, these are sorted by categories, such as \"equipment\" or \"potions.\" In other game genres, the items may take effect as soon as they are obtained.', 'Added Inventory System', 'craft new items easily with the upgraded inventory', 'Game Design', 'public', 'SS-Added Inventory System.png', 'Almighty Shields', 22, '2023-01-31', 0, 0),
('2023-01-30 15:07:27', 'dwdwd', 'dwd', 'ddw', 'Game Design', 'draft', '', 'Stray', 23, '0000-00-00', 0, 0),
('2023-01-31 15:51:49', 'gregergerg', 'fewfewf', 'gergre', 'Tutorial', 'draft', '', 'Albion Online 2', 24, '0000-00-00', 0, 0),
('2023-01-31 15:57:34', 'gegegeg', 'weff', 'geg', 'Tutorial', 'draft', 'Cover-Albion Online 2.jpg', 'Albion Online 2', 25, '0000-00-00', 0, 0),
('2023-01-31 16:01:20', 'gregerg', 'gergre', 'grgerg', 'Major Update', 'draft', 'SS-Albion Online 2.png', 'Albion Online 2', 26, '0000-00-00', 0, 0),
('2023-01-31 16:15:19', 'dwdwd', 'dwd', 'dwd', 'Major Update', 'draft', 'SS-Albion Online 2.jpg', 'Albion Online 2', 27, '0000-00-00', 0, 0);

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
(9, 'Sprout Lands', '', '', '', '', 'SS-Sprout Lands-0.png,SS-Sprout Lands-1.png', '', 'Cute pixel pastel farming asset pack', '2d', 'released', 'pixel art, sprout la', 'asset-Sprout Lands.zip', 'proprietary', 'Cover-Sprout Lands.png', 0, 'https://www.youtube.com/watch?v=dnJUE2ptB5U', 'sprite', 'pixelart', 47, '', '', '0000-00-00 00:00:00');

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
(89, 'Albion Online', 'released', '<h3>ABOUT THIS GAME </h3>\r\n<p> \r\nAlbion Online is a sandbox MMORPG set in an open medieval fantasy world. The game features a player-driven economy where nearly every item is player-crafted. Combine armor pieces and weapons suited to your playstyle in a unique, classless \"you are what you wear\" system. Explore the world, take on other adventurers in thrilling battles, conquer territories, and build a home.\r\n</p>\r\n<br>\r\n<h3>Key Features</h3>\r\n<p>From basic tools and clothes to mighty armors and powerful weapons – nearly every item in the game is crafted by players, in player-constructed buildings, from resources gathered by players. Buy, sell, and trade with other players at local marketplaces all across the world of Albion. Craft rare and powerful items, then sell them to the highest bidder and grow your fortune.</p>\r\n<br>\r\n<p>\r\nIn Albion Online\'s classless combat system, you are what you wear. The weapons and armor you use define your skills, and switching playstyles is as easy as switching gear. Test out new equipment anytime and change up your weapons, armor, and mounts to suit any situation. Hone your character’s skills by crafting new items, or by simply using your favorite equipment.</p>\r\n<br>\r\n', 'SS-Albion Online-0.jpg,SS-Albion Online-1.jpg,SS-Albion Online-2.jpg', 'https://www.youtube.com/watch?v=dnJUE2ptB5U', 'Free medieval fantasy MMORPG, set in a medieval world', 'adventure', 'albion, albion online, online', 'multiplayer', 'Windows', 'Base Game', 'Game-Albion Online.zip', 0, 'Cover-Albion Online.jpg', 46, 'windows 7', 'Intel Core I3', '4 GB', '5 GB', 'mx330', 'English', 'windows 10', 'Intel Core I5', '8 GB', '10 GB', 'mx1650', '', '0000-00-00 00:00:00'),
(90, 'Stray', 'released', '<h3>ABOUT THIS GAME</h3>\r\n<br>\r\n<p>Lost, alone and separated from family, a stray cat must untangle an ancient mystery to escape a long-forgotten city.\r\n\r\nStray is a third-person cat adventure game set amidst the detailed, neon-lit alleys of a decaying cybercity and the murky environments of its seedy underbelly. Roam surroundings high and low, defend against unforeseen threats and solve the mysteries of this unwelcoming place inhabited by curious droids and dangerous creatures.\r\n\r\nSee the world through the eyes of a cat and interact with the environment in playful ways. Be stealthy, nimble, silly, and sometimes as annoying as possible with the strange inhabitants of this mysterious world.\r\n\r\nAlong the way, the cat befriends a small flying drone, known only as B-12. With the help of this newfound companion, the duo must find a way out.\r\n\r\nStray is developed by BlueTwelve Studio, a small team from the south of France mostly made up of cats and a handful of humans.<p>', 'SS-Stray-0.jpg,SS-Stray-1.jpg,SS-Stray-2.jpg', 'https://www.youtube.com/watch?v=dnJUE2ptB5U', 'follows a stray cat who falls into a walled city populated by robots', 'action', 'stray, cat, 3d', 'singleplayer', 'Windows', 'Base Game', 'Game-Stray.zip', 0, 'Cover-Stray.jpg', 46, 'windows 7', 'Intel Core I3', '4 GB', '5 GB', 'mx330', 'Extra Content', 'windows 10', 'Intel Core I5', '8 GB', '10 GB', 'mx1650', '', '0000-00-00 00:00:00'),
(91, 'Scarlet Nexus', 'released', '<h3>ABOUT THIS GAME</h3>\r\n<p>In the far distant future, a psionic hormone was discovered in the human brain, granting people extra-sensory powers and changed the world as we knew it. As humanity entered this new era, deranged mutants known as Others began to descend from the sky with a hunger for human brains. Highly resistant to conventional attack methods, extreme measures needed to be taken to battle the overwhelming threat and preserve humanity. Those with acute extra-sensory abilities, known as psionics, were our only chance to fight the onslaught from above. Since then, psionics have been scouted for their talents and recruited to the Other Suppression Force (OSF), humanity’s last line of defense.\r\n</p>\r\n<br>\r\n<p>Featuring a dual story, begin your adventure with either Yuito Sumeragi, an energetic recruit from a prestigious political family or Kasane Randall, the mysterious scout whose power and skill has gained great notoriety among the OSF. As their different experiences interweave with each other, it is only then that you will reveal the full story and unlock all the mysteries of a Brain Punk future caught between technology and psychic abilities in SCARLET NEXUS.\r\n</p>\r\n<br>\r\n<p>Kinetic Psychic Combat – Using psycho-kinetic abilities, the world around you becomes your greatest weapon. Lift, break and throw pieces of your environment to build your attack combos and lay waste to your enemies.\r\n\r\nExterminate the Others – Deranged mutants that descended from the sky, highly resistant to conventional attack methods and defenses. Tormented by the constant pain of their mutation, they seek brains of living organisms to calm their madness.\r\n\r\nDiscover a Brain Punk future – Explore and protect a futuristic Japanese landscape that combines inspirations from classic anime and western science fiction.\r\n\r\nA Dual Story Experience – Dive into a complex story of bonds, courage and heroism, crafted by minds behind the iconic Tales of Vesperia.</p>', 'SS-Scarlet Nexus-0.jpg,SS-Scarlet Nexus-1.jpg,SS-Scarlet Nexus-2.jpg', 'https://www.youtube.com/watch?v=dnJUE2ptB5U', 'Elite psionics each armed with a talent in psychokinesis', 'RPG', 'scarlet, nexus, rpg', 'co-op', 'Windows', 'Base Game', 'Game-Scarlet Nexus.zip', 0, 'Cover-Scarlet Nexus.jpg', 46, 'windows 7', 'Intel Core I3', '4 GB', '5 GB', 'mx330', 'English', 'windows 10', 'Intel Core I5', '8 GB', '10 GB', 'mx1650', '', '0000-00-00 00:00:00'),
(92, 'Naruto Shippuden', 'released', '<h3>ABOUT THIS GAME</h3>\r\n<br>\r\n<p>The latest opus in the acclaimed STORM series is taking you on a colourful and breathtaking ride. Take advantage of the totally revamped battle system and prepare to dive into the most epic fights you’ve ever seen in the NARUTO SHIPPUDEN: Ultimate Ninja STORM series!</p>\r\n<br>\r\n<p>\r\nPrepare for the most awaited STORM game ever created!</p>\r\n\r\n', 'SS-Naruto Shippuden-0.jpg,SS-Naruto Shippuden-1.jpg,SS-Naruto Shippuden-2.jpg', 'https://www.youtube.com/watch?v=dnJUE2ptB5U', 'The latest opus in the acclaimed STORM series is taking you ', 'action', 'naruto, anime, shippuden', 'singleplayer', 'Windows', 'Base Game', 'Game-Naruto Shippuden.zip', 0, 'Cover-Naruto Shippuden.jpg', 46, 'windows 7', 'Intel Core I3', '4 GB', '5 GB', 'mx330', 'English', 'windows 10', 'Intel Core I5', '8 GB', '10 GB', 'mx1650', '', '0000-00-00 00:00:00'),
(93, 'Monster Hunter Rise', 'released', '<h3>ABOUT THIS GAME</h3>\r\n<br>\r\n<p>Rise to the challenge and join the hunt! In Monster Hunter Rise, the latest installment in the award-winning and top-selling Monster Hunter series, you’ll become a hunter, explore brand new maps and use a variety of weapons to take down fearsome monsters as part of an all-new storyline. The PC release also comes packed with a number of additional visual and performance enhancing optimizations.</p>\r\n<br>\r\n<h3>\r\nFerocious monsters with unique ecologies</h3>\r\n<p>\r\nHunt down a plethora of monsters with distinct behaviors and deadly ferocity. From classic returning monsters to all-new creatures inspired by Japanese folklore, including the flagship wyvern Magnamalo, you’ll need to think on your feet and master their unique tendencies if you hope to reap any of the rewards!</p>\r\n\r\n', 'SS-Monster Hunter Rise-0.jpg,SS-Monster Hunter Rise-1.jpg,SS-Monster Hunter Rise-2.jpg', 'https://www.youtube.com/watch?v=dnJUE2ptB5U', 'Rise to the challenge and join the hunt! In Monster Hunter Rise', 'strategy', 'monster hunter, rpg, singlepla', 'singleplayer', 'Windows', 'Base Game', 'Game-Monster Hunter Rise.zip', 0, 'Cover-Monster Hunter Rise.png', 46, 'windows 7', 'Intel Core I3', '4 GB', '5 GB', 'mx330', '', 'windows 10', 'Intel Core I5', '8 GB', '10 GB', 'mx1650', '', '0000-00-00 00:00:00'),
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
(56, '2023-12-01 16:55:00', '2023-12-08 16:55:00', ' majhcdsjc vmnb', '0000-00-00 00:00:00', 'majbhdhjsa', 'grg', 'Ranked', 'mdhcbgd', 'Draft', 67, 1, 16, 'Public', 'mhcbds', 'Cover-majbhdhjsa.jpg');

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
(47, 'ypasindu11@gmail.com', '$2y$10$X6vRwMBT21PqzM57sr3fPeBK7gXyaUYiRYWEioYg/La9Sb4iPvI5.', 1, 'avatar3.png', 'asset creator', 'YPasi', 'Yeshan', 'pasindu', '2023-02-09 10:08:12', '2023-02-09 10:08:12', 1, ''),
(48, 'nadeedarshika1999@gmail.com', '$2y$10$IwPRWNFoePVsvPrzle.DyO9.8MxiOC1PAM/qVuwmJnIXE7UkRp/SS', 1, 'avatar3.png', 'asset creator', 'Nadee', 'Nadee', 'Dharshi', '2023-02-09 14:57:04', '2023-02-09 14:57:04', 0, '');

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
-- Table structure for table `gig`
--

CREATE TABLE `gig` (
  `gigID` int(11) NOT NULL,
  `gigName` varchar(50) NOT NULL,
  `gigTrailor` varchar(255) NOT NULL,
  `gigScreenshot` varchar(255) NOT NULL,
  `gigDetails` text NOT NULL,
  `game` varchar(50) NOT NULL,
  `gameDeveloperID` int(11) NOT NULL,
  `gamePublisherID` int(11) NOT NULL,
  `gigTagline` varchar(140) NOT NULL,
  `currentStage` varchar(30) NOT NULL,
  `plannedReleaseDate` varchar(30) NOT NULL,
  `estimatedShare` varchar(50) NOT NULL,
  `expectedCost` varchar(30) NOT NULL,
  `visibility` varchar(10) NOT NULL,
  `gigCoverImg` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `joinjam`
--

CREATE TABLE `joinjam` (
  `gamerID` int(11) NOT NULL,
  `gameJamID` int(11) NOT NULL
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
(3, '12', '1'),
(8, '30', '1'),
(9, '30', '2'),
(10, '39', '2'),
(13, '39', '1');

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
-- Table structure for table `submission`
--

CREATE TABLE `submission` (
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
-- Indexes for table `asset_stats`
--
ALTER TABLE `asset_stats`
  ADD PRIMARY KEY (`assetID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `devlog`
--
ALTER TABLE `devlog`
  ADD PRIMARY KEY (`devLogID`);

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
-- Indexes for table `gig`
--
ALTER TABLE `gig`
  ADD PRIMARY KEY (`gigID`),
  ADD KEY `gameDeveloperID` (`gameDeveloperID`);

--
-- Indexes for table `joinjam`
--
ALTER TABLE `joinjam`
  ADD KEY `gamerID` (`gamerID`),
  ADD KEY `gameJamID` (`gameJamID`);

--
-- Indexes for table `library`
--
ALTER TABLE `library`
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
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `activation_keys`
--
ALTER TABLE `activation_keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `crowdFundID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `devlog`
--
ALTER TABLE `devlog`
  MODIFY `devLogID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `devlog_posttype`
--
ALTER TABLE `devlog_posttype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `freeasset`
--
ALTER TABLE `freeasset`
  MODIFY `assetID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `freegame`
--
ALTER TABLE `freegame`
  MODIFY `gameID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `gamejam`
--
ALTER TABLE `gamejam`
  MODIFY `gameJamID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `gamer`
--
ALTER TABLE `gamer`
  MODIFY `gamerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `games_cart`
--
ALTER TABLE `games_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gig`
--
ALTER TABLE `gig`
  MODIFY `gigID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `library`
--
ALTER TABLE `library`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
-- Constraints for table `games_cart`
--
ALTER TABLE `games_cart`
  ADD CONSTRAINT `games_cart_ibfk_1` FOREIGN KEY (`gamerID`) REFERENCES `gamer` (`gamerID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gig`
--
ALTER TABLE `gig`
  ADD CONSTRAINT `gig_ibfk_1` FOREIGN KEY (`gameDeveloperID`) REFERENCES `gamer` (`gamerID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `joinjam`
--
ALTER TABLE `joinjam`
  ADD CONSTRAINT `joinjam_ibfk_1` FOREIGN KEY (`gamerID`) REFERENCES `gamer` (`gamerID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `joinjam_ibfk_2` FOREIGN KEY (`gameJamID`) REFERENCES `gamejam` (`gameJamID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;