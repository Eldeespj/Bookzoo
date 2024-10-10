-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 14, 2023 at 03:44 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_bookzoo`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL auto_increment,
  `admin_name` varchar(100) NOT NULL,
  `admin_contact` varchar(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  PRIMARY KEY  (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_contact`, `admin_email`, `admin_password`) VALUES
(1, 'Akash', '1324455', 'akash@gmail.com', '12345'),
(2, 'eldees', '1234567890', 'eldees@gmial.com', '12'),
(3, 'tinu', '12', 'tinu@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_animal`
--

CREATE TABLE `tbl_animal` (
  `animal_id` int(11) NOT NULL auto_increment,
  `animal_name` varchar(100) NOT NULL,
  `animal_quantity` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `cell_id` int(11) NOT NULL,
  PRIMARY KEY  (`animal_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_animal`
--

INSERT INTO `tbl_animal` (`animal_id`, `animal_name`, `animal_quantity`, `subcategory_id`, `cell_id`) VALUES
(1, 'Hello', 0, 2, 0),
(2, 'Hello', 0, 2, 2),
(3, 'Hello', 0, 2, 2),
(4, 'Hello', 0, 2, 1),
(5, 'Hello', 5, 2, 1),
(6, 'parraot', 5, 2, 3),
(7, 'hello', 20, 5, 7),
(8, 'hai', 2, 9, 3),
(9, 'ma', 90, 6, 7),
(10, 'moo', 87, 7, 7);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_assignduty`
--

CREATE TABLE `tbl_assignduty` (
  `assign_id` int(11) NOT NULL auto_increment,
  `assign_date` varchar(50) NOT NULL,
  `cell_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `assignduty_status` int(11) NOT NULL default '0',
  PRIMARY KEY  (`assign_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_assignduty`
--

INSERT INTO `tbl_assignduty` (`assign_id`, `assign_date`, `cell_id`, `staff_id`, `assignduty_status`) VALUES
(1, '2023-08-17', 2, 2, 0),
(2, '2023-09-01', 5, 0, 0),
(3, '2023-09-01', 5, 0, 0),
(4, '2023-09-08', 4, 0, 0),
(5, '2023-09-22', 0, 5, 0),
(6, '2023-09-15', 0, 5, 0),
(7, '2023-09-12', 3, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `booking_id` int(11) NOT NULL auto_increment,
  `booking_date` varchar(100) NOT NULL,
  `booking_currentdate` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `booking_status` varchar(100) NOT NULL default '0',
  `booking_payment` varchar(100) NOT NULL default '0',
  `booking_adult` int(11) NOT NULL,
  `booking_children` int(11) NOT NULL,
  PRIMARY KEY  (`booking_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`booking_id`, `booking_date`, `booking_currentdate`, `user_id`, `booking_status`, `booking_payment`, `booking_adult`, `booking_children`) VALUES
(1, '15/05/2023', '2023-08-23', 2, '0', '1000', 10, 3),
(2, '2023-08-24', '2023-08-23', 2, '0', '1000', 10, 3),
(3, '2023-08-11', '2023-08-23', 2, '1', '2300', 23, 2),
(4, '2023-08-03', '2023-08-23', 2, '1', '2300', 23, 2),
(5, '2023-08-16', '2023-08-26', 2, '1', '3000', 30, 13),
(6, '2023-08-16', '2023-08-26', 2, '1', '200', 2, 1),
(7, '2023-07-11', '2023-08-26', 2, '1', '1500', 15, 12),
(8, '2023-09-06', '2023-09-02', 2, '0', '4000', 40, 2),
(9, '2023-09-22', '2023-09-13', 2, '1', '200', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL auto_increment,
  `category_name` varchar(100) NOT NULL,
  PRIMARY KEY  (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(1, 'birds'),
(2, 'animals'),
(3, 'snakes'),
(4, 'others'),
(5, 'flowers');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cell`
--

CREATE TABLE `tbl_cell` (
  `cell_id` int(11) NOT NULL auto_increment,
  `cell_name` varchar(100) NOT NULL,
  PRIMARY KEY  (`cell_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_cell`
--

INSERT INTO `tbl_cell` (`cell_id`, `cell_name`) VALUES
(1, 'Cell-A'),
(2, 'cell-B'),
(3, 'cell-C'),
(4, 'cell-D'),
(5, 'cell-E'),
(6, 'cell-F'),
(7, 'cell-G'),
(8, 'cell-h');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaint`
--

CREATE TABLE `tbl_complaint` (
  `complaint_id` int(11) NOT NULL auto_increment,
  `complaint_title` varchar(100) NOT NULL,
  `complaint_detailss` varchar(500) NOT NULL,
  `user_id` int(11) NOT NULL,
  `complaint_status` int(11) NOT NULL,
  `complaint_reply` varchar(500) NOT NULL,
  `complaint_date` date NOT NULL,
  PRIMARY KEY  (`complaint_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbl_complaint`
--

INSERT INTO `tbl_complaint` (`complaint_id`, `complaint_title`, `complaint_detailss`, `user_id`, `complaint_status`, `complaint_reply`, `complaint_date`) VALUES
(1, 'bad behaviour', 'not good ', 0, 0, '', '0000-00-00'),
(2, 'bad behaviour', 'not good ', 0, 0, '', '0000-00-00'),
(3, '', '', 0, 0, '', '0000-00-00'),
(4, 'bad behaviour', 'ben has', 0, 0, '', '0000-00-00'),
(5, 'bad behaviour', 'ben has', 2, 0, '', '0000-00-00'),
(6, 'bad behaviour', 'djdodddodldllsdlsmlmdlsmdlmsld', 2, 0, '', '0000-00-00'),
(7, 'bad ', 'nnammawssmlsmwlm', 2, 0, '', '0000-00-00'),
(8, 'bad ', 'nnammawssmlsmwlm', 2, 0, '', '0000-00-00'),
(9, 'bad ', 'zzazazazaaza', 2, 0, '', '0000-00-00'),
(10, 'staff behaviour', 'staff behaviour is not good', 2, 1, 'we will solve ', '0000-00-00'),
(11, 'service ', 'service is not good,the behaviour is very bad', 2, 1, 'we will try to solve all the problems in our zoo', '2023-09-02'),
(12, 'not good', 'service is not good idont like the behaviour of staff', 2, 1, 'ok we will sovlve', '2023-09-13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `district_id` int(11) NOT NULL auto_increment,
  `district_name` varchar(100) NOT NULL,
  PRIMARY KEY  (`district_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`district_id`, `district_name`) VALUES
(1, 'idukki'),
(2, 'eranakulam'),
(3, 'thrissur'),
(4, 'thrissur'),
(5, 'palakkad'),
(6, 'wayanad'),
(7, 'kozhikode'),
(8, 'kannur'),
(9, 'Alappuzha');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `feedback_id` int(11) NOT NULL auto_increment,
  `feedback_title` varchar(100) NOT NULL,
  `feedback_details` varchar(400) NOT NULL,
  `user_id` int(11) NOT NULL,
  `feedback_date` date NOT NULL,
  PRIMARY KEY  (`feedback_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`feedback_id`, `feedback_title`, `feedback_details`, `user_id`, `feedback_date`) VALUES
(1, 'good', 'ijdoododkpkpdkpd', 2, '2023-08-31'),
(2, 'india', 'indian is my country', 2, '2023-09-02'),
(3, 'iam john vj', 'iam john vj giving thid complaint', 2, '2023-09-13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place`
--

CREATE TABLE `tbl_place` (
  `place_id` int(11) NOT NULL auto_increment,
  `place_name` varchar(100) NOT NULL,
  `district_id` int(11) NOT NULL,
  PRIMARY KEY  (`place_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_place`
--

INSERT INTO `tbl_place` (`place_id`, `place_name`, `district_id`) VALUES
(1, 'thodupuzha', 1),
(2, 'muvattupuzha', 2),
(3, 'perumbavvor', 2),
(4, 'karimannoor', 1),
(5, 'vazhakulam', 1),
(6, 'aluva', 2),
(7, 'mannoor', 2),
(8, 'paipra', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staff`
--

CREATE TABLE `tbl_staff` (
  `staff_id` int(11) NOT NULL auto_increment,
  `staff_name` varchar(100) NOT NULL,
  `staff_email` varchar(100) NOT NULL,
  `staff_password` varchar(100) NOT NULL,
  `staff_proof` varchar(500) NOT NULL,
  `staff_photo` varchar(500) NOT NULL,
  `staff_contact` varchar(500) NOT NULL,
  `staff_address` varchar(500) NOT NULL,
  `place_id` int(11) NOT NULL,
  PRIMARY KEY  (`staff_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_staff`
--

INSERT INTO `tbl_staff` (`staff_id`, `staff_name`, `staff_email`, `staff_password`, `staff_proof`, `staff_photo`, `staff_contact`, `staff_address`, `place_id`) VALUES
(1, 'tinu', 'tinu@gmail.com', '', '', 'Screenshot (18).png', '6582365412', 'muvattupuzha', 1),
(2, 'amal', 'amal@gmail.com', '123456789', 'Screenshot (25).png', 'Screenshot (27).png', '', 'mavattupuzha', 2),
(3, 'tinu jose', 'tinu@gmail.com', '12345', 'Screenshot (19).png', 'Screenshot (20).png', '1234567890', 'mekkadambu', 2),
(4, 'anson', 'anson@gmail.com', '12', 'Screenshot (24).png', 'Screenshot (26).png', '1234567890', 'karimannoor', 2),
(5, 'nknk', 'nm@gmial.com', 'kk', 'Screenshot (23).png', 'Screenshot (31).png', '1234567890', 'nnlmlmlmlmlmlmlm', 4),
(6, 'jo', 'jo@gmail.com', 'pnm', '', '', '1234567890', 'muvattupuzha', 1),
(7, 'Ani', 'ani@gmail.com', '12345', 'Screenshot (19).png', 'Screenshot (26).png', '1234567890', 'ani house\r\nmannoor\r\naluva', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategory`
--

CREATE TABLE `tbl_subcategory` (
  `subcategory_id` int(11) NOT NULL auto_increment,
  `subcategory_name` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY  (`subcategory_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tbl_subcategory`
--

INSERT INTO `tbl_subcategory` (`subcategory_id`, `subcategory_name`, `category_id`) VALUES
(2, 'flying birds', 1),
(5, 'non flying birds', 1),
(6, 'poisonous ', 3),
(7, 'non poisonous', 3),
(8, 'herbivores', 2),
(9, 'carnivores', 2),
(10, 'nflowers', 5),
(11, 'nother', 4),
(12, 'mmm', 2),
(13, 'small', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL auto_increment,
  `user_name` varchar(100) NOT NULL,
  `user_contact` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_address` varchar(500) NOT NULL,
  `user_image` varchar(500) NOT NULL,
  `place_id` int(11) NOT NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_contact`, `user_email`, `user_password`, `user_address`, `user_image`, `place_id`) VALUES
(4, 'emil', '3467785899', 'emil@gmail.com', '123', 'emil house\r\nthrikklathoor', 'Screenshot (21).png', 2),
(5, 'manu', '13245567777789', 'manu@gmail.com', '12', 'josxkskmclmxlcmxlmcxlmcmx', 'Screenshot (20).png', 4),
(6, 'nmm', '6558687', 'nmn@gmail.com', '12', 'cnojcksckscsc;s;cskcsc', 'Screenshot (35).png', 1),
(7, 'kk', '12345', 'kk@gmail.com', '12', 'nnncmcmcmcc', 'Screenshot (22).png', 3),
(8, 'eden', '1234567890', 'eden@gmail.com', '12', 'guugihiooouoyui', 'Screenshot (18).png', 2),
(9, 'Anil', '1234567890', 'anil@gmail.com', '12345', 'anil house\r\nmannoor\r\nperumbavoor', 'Screenshot (21).png', 7);
