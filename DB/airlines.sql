-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2016 at 10:19 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `airlines`
--

-- --------------------------------------------------------

--
-- Table structure for table `flight_details`
--

CREATE TABLE IF NOT EXISTS `flight_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `flightname` varchar(100) NOT NULL,
  `frm` varchar(100) NOT NULL,
  `fto` varchar(100) NOT NULL,
  `amount` int(100) NOT NULL,
  `seatavil` int(50) NOT NULL,
  `doc` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `flight_details`
--

INSERT INTO `flight_details` (`id`, `flightname`, `frm`, `fto`, `amount`, `seatavil`, `doc`) VALUES
(1, 'Spice jet', 'Chennai', 'Banglore', 20000, 248, '2016-03-27'),
(2, 'Indian Airlines', 'Chennai', 'Banglore', 30000, 298, '2016-03-27'),
(3, 'Spicejet', 'coimbathore', 'Mumbai', 3500, 285, '2016-03-28');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE IF NOT EXISTS `ticket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `flightname` varchar(100) NOT NULL,
  `frm` varchar(100) NOT NULL,
  `fto` varchar(100) NOT NULL,
  `amount` int(11) NOT NULL,
  `avail` int(11) NOT NULL,
  `pass` int(11) NOT NULL,
  `ref_no` int(11) NOT NULL,
  `flight_id` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id`, `name`, `flightname`, `frm`, `fto`, `amount`, `avail`, `pass`, `ref_no`, `flight_id`, `total`) VALUES
(1, 'aaa', 'Spicejet', 'coimbathore', 'Mumbai', 3500, 297, 3, 32850, 0, 10500),
(3, 'aaa', 'Spicejet', 'coimbathore', 'Mumbai', 3500, 294, 3, 21903, 0, 10500),
(4, 'aaa', 'Spicejet', 'coimbathore', 'Mumbai', 3500, 291, 3, 23091, 0, 10500),
(5, 'aaa', 'Spicejet', 'coimbathore', 'Mumbai', 3500, 288, 3, 51069, 0, 10500),
(6, 'aaa', 'Spicejet', 'coimbathore', 'Mumbai', 3500, 288, 3, 30899, 0, 10500),
(7, 'aaa', 'Spicejet', 'coimbathore', 'Mumbai', 3500, 288, 3, 1229, 0, 10500),
(8, 'sudheesh s', 'Spice jet', 'Chennai', 'Banglore', 20000, 250, 2, 50504, 0, 40000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `secret` varchar(100) DEFAULT 'not defined',
  `account_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `email`, `password`, `phone`, `secret`, `account_created`) VALUES
(1, 'sudheesh', 'sudheesh', 'sudheesh@gmail.com', 'sduheesh', '9999999999', '123', '2016-03-25 15:44:03'),
(2, 'sudheesh', 'aaa', 'aaaa', '123', '1111', '111', '2016-03-25 15:58:36'),
(3, '', '', '', '', '', '', '2016-03-26 05:29:06'),
(4, 'SUDHEESH', 'SUDHEESH1223', '2dsudheesh@gmail.com', 'ASSSS', '9786819939', '123', '2016-03-26 09:17:46');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
