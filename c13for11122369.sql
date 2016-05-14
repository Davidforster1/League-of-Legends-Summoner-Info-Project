-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 27, 2016 at 04:11 PM
-- Server version: 5.5.47
-- PHP Version: 5.3.10-1ubuntu3.21

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `c13for11122369`
--

-- --------------------------------------------------------

--
-- Table structure for table `summoner_info`
--

CREATE TABLE IF NOT EXISTS `summoner_info` (
  `summonerLevel` int(2) NOT NULL,
  `summonerID` int(20) NOT NULL,
  `summonerName` varchar(30) NOT NULL,
  `summonerIcon` int(10) NOT NULL,
  `summonerTier` text NOT NULL,
  `summonerDivision` text NOT NULL,
  `summonerLp` text NOT NULL,
  PRIMARY KEY (`summonerID`),
  UNIQUE KEY `summonerID` (`summonerID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `summoner_info`
--

INSERT INTO `summoner_info` (`summonerLevel`, `summonerID`, `summonerName`, `summonerIcon`, `summonerTier`, `summonerDivision`, `summonerLp`) VALUES
(30, 27427378, 'Brian', 508, 'gold', 'III', '77'),
(30, 56378840, 'EmeraldDarling', 782, 'platinum', 'V', '52'),
(30, 18997045, 'Dr Dolittle', 27, 'gold', 'II', '24'),
(30, 63543842, 'JonoSHiKi', 785, 'gold', 'V', '0'),
(30, 51497334, 'ty holinka', 982, 'platinum', 'I', '24'),
(30, 21421891, 'Mark', 21, 'platinum', 'IV', '48'),
(30, 25470907, 'Dahid', 959, 'Unranked', '', '0'),
(30, 54012260, 'KeliuPatrulis', 933, 'gold', 'V', '7'),
(30, 22359794, 'Oronyx', 916, 'platinum', 'IV', '55'),
(30, 41521157, 'Brixton', 558, 'diamond', 'II', '49'),
(30, 68710206, 'SpiderWomble', 1016, 'bronze', 'II', '5'),
(30, 28255352, 'DahidDarling', 1111, 'platinum', 'V', '33'),
(30, 28365392, 'Madie', 1105, 'silver', 'I', '0'),
(30, 54337299, 'Axgem', 1114, 'silver', 'IV', '0'),
(0, 0, '', 0, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE IF NOT EXISTS `user_login` (
  `userID` int(5) NOT NULL AUTO_INCREMENT,
  `userName` varchar(25) NOT NULL,
  `userEmail` varchar(35) NOT NULL,
  `userPassword` varchar(255) NOT NULL,
  `passreset` int(11) NOT NULL,
  PRIMARY KEY (`userID`),
  UNIQUE KEY `user_email` (`userEmail`),
  UNIQUE KEY `userName` (`userName`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`userID`, `userName`, `userEmail`, `userPassword`, `passreset`) VALUES
(2, 'admin@', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 0),
(4, 'admin2', 'admin2@admin.com', 'c84258e9c39059a89ab77d846ddab909', 0),
(5, 'admin3', 'admin3@admin.com', 'ec92b9c3efa8aa638e738cf3bc57a56e', 0),
(6, 'rich', 'rich@a.com', 'e7f4f8bd246c235418280d1f124e14f0', 0),
(7, 'daosd', 'daosd@a.com', '83b83afd96dcde1f0aa80e2993decf92', 0),
(8, 'Zest', 'zestmatt1804@gmail.com', '16f71f8ebba299f83c0150b7e68ed28d', 0),
(9, 'dave', 'dave@dave.com', '1610838743cc90e3e4fdda748282d9b8', 0),
(10, 'sam', 'sam@sam.com', '332532dcfaa1cbf61e2a266bd723612c', 0),
(11, 'dahid', 'dahidforster@gmail.com', 'fbf7174e8fae2735a4dc80f198103ac2', 0),
(12, 'jacky123', 'jacky@jacky.com', '9661fd65249b026ebea0f49927e82f0e', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
