-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 09, 2023 at 03:20 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lession2`
--

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `ma` varchar(100) NOT NULL,
  `ten` varchar(100) NOT NULL,
  PRIMARY KEY  (`ma`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`ma`, `ten`) VALUES
('dm01', 'Ao'),
('dm02', 'Quan');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `ma` int(50) NOT NULL auto_increment,
  `ten` varchar(100) NOT NULL,
  `danhmuc` varchar(100) NOT NULL,
  `anh` varchar(100) default NULL,
  PRIMARY KEY  (`ma`),
  KEY `danhmuc` (`danhmuc`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`ma`, `ten`, `danhmuc`, `anh`) VALUES
(1, 'Ao so mi hoa', 'dm01', 'ao-1.jpg'),
(2, 'Quan bong', 'dm02', 'quan-1.jpg'),
(3, 'Ao thun happy', 'dm01', 'ao-2.jpg'),
(4, 'Quan jean rach tua lua', 'dm02', 'quan-2.jpg'),
(5, 'Ao kaki', 'dm01', NULL),
(6, 'Quan yem', 'dm02', NULL),
(7, 'Ao caro', 'dm01', NULL),
(8, 'Quan thun', 'dm02', NULL),
(9, 'Ao ba ba', 'dm01', NULL),
(10, 'Quan tay', 'dm02', NULL),
(11, 'Ao dai', 'dm01', NULL),
(13, 'Ao hoa', 'dm01', NULL),
(14, 'Quan lung', 'dm02', '0a8b00ec69.jpg'),
(15, 'Ao nhat binh', 'dm01', '7de2b785a3.jpg'),
(16, 'Quan tui hop', 'dm02', 'ac13d8d9a4.jpg'),
(17, 'Ao tim', 'dm01', '75f0df23df.jpg'),
(18, 'Ao nau', 'dm01', '479d583587.jpg'),
(19, 'Quan xam', 'dm02', '6439d653ab.jpg'),
(20, 'Ao cam', 'dm01', 'f425f892f0.jpg');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`danhmuc`) REFERENCES `danhmuc` (`ma`);
