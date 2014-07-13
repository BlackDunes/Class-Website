-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 13, 2014 at 05:32 PM
-- Server version: 5.1.44
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `classSite`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE IF NOT EXISTS `assignments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `period_id` int(11) NOT NULL,
  `day_id` int(11) NOT NULL,
  `color` tinyint(1) NOT NULL COMMENT '0- normal color. 1- different color for important assignment',
  `bold` tinyint(1) NOT NULL COMMENT '0 - not bold. 1 - bold',
  `cancel` int(11) NOT NULL COMMENT '0 - active. 1 - assignment cancelled',
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`id`, `period_id`, `day_id`, `color`, `bold`, `cancel`, `text`) VALUES
(1, 1, 2, 0, 0, 0, 'Drink all of your milk with breakfast'),
(2, 1, 2, 1, 1, 0, 'Full contact duck-duck-goose'),
(3, 1, 5, 0, 1, 0, 'Chapter 5 test'),
(4, 4, 8, 0, 0, 0, 'testing'),
(5, 5, 14, 0, 0, 0, 'Just another test.'),
(6, 5, 14, 0, 0, 0, 'TEST NUMBER TWO!'),
(7, 5, 14, 0, 0, 0, 'Test three'),
(8, 4, 14, 0, 0, 0, 'Class rules review'),
(9, 4, 14, 0, 0, 0, 'Ice breaker activity'),
(10, 1, 15, 0, 0, 0, 'Discussion on the introduction if <i>Romeo & Juliet</i>'),
(11, 1, 25, 0, 0, 0, 'Sample Assignment 1'),
(12, 1, 25, 0, 0, 0, 'Sample Assignment 2'),
(13, 1, 27, 0, 0, 0, 'More classwork here');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` char(40) NOT NULL,
  `author` char(40) NOT NULL,
  `cover` text NOT NULL,
  `caption` longtext NOT NULL,
  `week` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `cover`, `caption`, `week`) VALUES
(1, 'A Portrait of the Artist as a Young Man', 'James Joyce', 'portrait.jpg', 'This novel spans the front half of young Stephen''s life, and chronicles his struggles with patriotism, religion, and life in general. Gives an amazing view of Dublin, Ireland.', 31),
(2, 'Lord of the Flies', 'William Golding', 'lordoftheflies.jpg', 'Poor Piggy.', 32),
(19, 'Ender''s Game', 'Orson Scott Card', 'ender.jpg', '', 36),
(18, 'Redwall', 'Brian Jacques', 'redwall.jpg', '', 35),
(17, 'Everything is Illuminated', 'Jonathan Safran Foer', 'everything.jpg', '', 34),
(15, 'Lolita', 'Vladimir Nabokov', 'lolita.jpg', '', 33),
(20, 'Doctor Sleep', 'Stephen King', 'doctorsleep.jpg', '', 25),
(21, 'Fantastic Mr. Fox', 'Roald Dahl', 'fox.jpg', '', 26),
(22, 'The Catcher in the Rye', 'J. D. Salinger', 'Catcher.jpg', '', 27);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grade` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `description` text NOT NULL,
  `journal` tinyint(1) NOT NULL COMMENT '0: class does not use a journal. 1: class uses a journal',
  `active_unit` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `grade`, `name`, `description`, `journal`, `active_unit`, `active`, `created`, `modified`) VALUES
(1, 9, 'English 1', 'The introductory English course.', 1, 2, 1, '2013-08-14', '2013-08-27'),
(2, 10, 'English 2 Honors', 'Honors class', 1, 7, 1, '2013-08-14', '2013-12-14'),
(5, 12, 'Adv. Public Speaking', 'Public speaking, utilizing technology', 0, 17, 1, '2013-08-14', '0000-00-00'),
(4, 10, 'Public Speaking', 'Speaking in public', 0, 15, 1, '2013-08-14', '0000-00-00'),
(6, 11, 'English 3', '', 1, 0, 0, '2013-08-14', '2013-08-14');

-- --------------------------------------------------------

--
-- Table structure for table `days`
--

CREATE TABLE IF NOT EXISTS `days` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `ab` text NOT NULL,
  `halfday` int(11) NOT NULL,
  `noschool` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `days`
--

INSERT INTO `days` (`id`, `date`, `ab`, `halfday`, `noschool`) VALUES
(1, '2013-07-21', 'b', 0, 0),
(2, '2013-07-22', 'A', 0, 0),
(3, '2013-07-23', 'B', 1, 0),
(4, '2013-07-24', '0', 0, 1),
(5, '2013-07-26', 'A', 0, 0),
(6, '2013-07-29', 'B', 0, 0),
(7, '2013-07-30', '', 0, 1),
(8, '2013-07-31', 'B', 1, 0),
(9, '2013-08-01', 'A', 0, 0),
(10, '2013-08-02', 'B', 0, 0),
(11, '2013-08-05', 'A', 0, 0),
(12, '2013-08-06', 'B', 0, 0),
(13, '2013-08-07', 'A', 0, 0),
(14, '2013-08-08', 'B', 0, 0),
(15, '2013-08-09', 'A', 0, 0),
(27, '2013-08-15', 'A', 0, 0),
(26, '2013-08-14', '0', 0, 1),
(25, '2013-08-13', 'A', 0, 0),
(24, '2013-08-12', 'B', 0, 0),
(28, '2013-08-16', 'B', 0, 0),
(38, '2013-08-27', '0', 0, 1),
(37, '2013-08-26', '0', 0, 1),
(36, '2013-09-06', 'A', 1, 0),
(35, '2013-09-05', 'B', 1, 0),
(34, '2013-09-04', 'A', 1, 0),
(39, '2013-08-28', '0', 0, 1),
(40, '2013-08-29', '0', 0, 1),
(41, '2013-08-30', '0', 0, 1),
(42, '2013-09-02', '0', 0, 1),
(43, '2013-09-03', '0', 0, 1),
(44, '2013-09-09', 'B', 0, 0),
(45, '2013-09-10', 'A', 0, 0),
(46, '2013-09-11', 'B', 0, 0),
(47, '2013-09-12', 'A', 0, 0),
(48, '2013-09-13', 'B', 0, 0),
(49, '2014-01-13', 'A', 0, 0),
(50, '2014-01-14', 'M', 1, 0),
(51, '2014-01-15', 'F', 1, 0),
(52, '2014-01-16', 'B', 0, 0),
(53, '2014-01-17', 'B', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `homeworks`
--

CREATE TABLE IF NOT EXISTS `homeworks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `period_id` int(11) NOT NULL,
  `day_id` int(11) NOT NULL,
  `color` tinyint(1) NOT NULL,
  `bold` tinyint(1) NOT NULL COMMENT '1 = bold',
  `cancel` int(11) NOT NULL COMMENT '1 = cancelled',
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `homeworks`
--

INSERT INTO `homeworks` (`id`, `period_id`, `day_id`, `color`, `bold`, `cancel`, `text`) VALUES
(1, 1, 2, 0, 0, 0, 'Get plenty of sleep'),
(2, 1, 5, 0, 0, 0, 'None'),
(3, 4, 8, 0, 0, 0, 'testing'),
(4, 5, 14, 0, 0, 0, 'Testing'),
(6, 5, 14, 0, 0, 0, 'Checking out another homework'),
(7, 4, 14, 0, 0, 0, 'Bring in binder by next class'),
(8, 4, 14, 0, 0, 0, 'Be ready for quiz on Summer Reading'),
(9, 5, 14, 0, 0, 0, 'testing testing testing testing testing testing'),
(10, 1, 15, 0, 0, 0, 'Go out and buy a binder!'),
(11, 1, 15, 0, 0, 0, 'Eat the cheese'),
(12, 1, 25, 0, 0, 0, 'Sample Homework'),
(13, 1, 27, 0, 0, 0, 'Homework yet again');

-- --------------------------------------------------------

--
-- Table structure for table `journal_entries`
--

CREATE TABLE IF NOT EXISTS `journal_entries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `number` int(11) NOT NULL,
  `entry` text NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `journal_entries`
--


-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE IF NOT EXISTS `materials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `m_category_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `file` varchar(50) NOT NULL,
  `url` varchar(100) NOT NULL,
  `local` tinyint(1) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `public` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id`, `m_category_id`, `unit_id`, `name`, `file`, `url`, `local`, `active`, `created`, `modified`, `public`) VALUES
(18, 4, 17, 'FINAL COUNTDOWN', '', '', 0, 1, '2013-09-11 20:15:52', '2013-09-11 20:15:52', 1),
(19, 3, 2, 'ENGLOSH', '', 'gfgfdsgfd', 0, 1, '2013-09-11 20:26:54', '2013-09-11 20:26:54', 1),
(10, 5, 3, 'Test test test', 'Kinnelon.doc', '', 1, 1, '2013-08-15 16:52:14', '2013-08-15 16:52:14', 1),
(14, 3, 14, 'Test', '', 'Test', 0, 1, '2013-09-11 20:14:54', '2013-09-11 20:14:54', 1),
(15, 6, 14, 'Another Test', '', '', 0, 1, '2013-09-11 20:15:05', '2013-09-11 20:15:05', 1),
(16, 7, 16, 'NEXT UNIT ITEM', '', 'gsgre', 0, 1, '2013-09-11 20:15:21', '2013-09-11 20:15:21', 1),
(17, 5, 16, 'ANother Unit THINjt', '', '', 0, 1, '2013-09-11 20:15:31', '2013-09-11 21:26:02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_categories`
--

CREATE TABLE IF NOT EXISTS `m_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `icon` text NOT NULL,
  `color` varchar(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `m_categories`
--

INSERT INTO `m_categories` (`id`, `name`, `icon`, `color`) VALUES
(3, 'Worksheets', 'blue-document-text-image.png', '384559'),
(4, 'Websites', 'globe-green.png', '385958'),
(5, 'Reviews', 'lifebuoy.png', '593838'),
(6, 'Rubrics', 'blueprint.png', '594338'),
(7, 'Books/E-Books', 'book-open-bookmark.png', '424242');

-- --------------------------------------------------------

--
-- Table structure for table `periods`
--

CREATE TABLE IF NOT EXISTS `periods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `ab` char(1) NOT NULL,
  `block` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created` date NOT NULL,
  `year` year(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `periods`
--

INSERT INTO `periods` (`id`, `course_id`, `ab`, `block`, `active`, `created`, `year`) VALUES
(1, 1, 'A', 2, 1, '2013-07-20', 2013),
(2, 1, 'A', 4, 1, '2013-07-20', 2013),
(3, 4, 'A', 5, 1, '2013-07-21', 2013),
(4, 2, 'B', 4, 1, '2013-07-21', 2013),
(5, 5, 'B', 1, 1, '2013-07-21', 2013);

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE IF NOT EXISTS `units` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `created` date NOT NULL,
  `type` int(11) NOT NULL COMMENT '1: concept, 2: book',
  `author` varchar(30) NOT NULL,
  `modified` date NOT NULL,
  `order` int(11) NOT NULL,
  `material_count` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `course_id`, `name`, `created`, `type`, `author`, `modified`, `order`, `material_count`) VALUES
(1, 1, 'Romeo & Juliet', '2013-08-13', 2, 'William Shakespeare', '2013-12-14', 1, 0),
(2, 1, 'Summer Reading', '2013-08-13', 1, '', '2013-12-14', 2, 1),
(3, 1, 'Short Stories', '2013-08-13', 1, '', '2013-12-14', 3, 0),
(7, 2, 'Summer Reading', '2013-08-14', 1, '', '2013-12-14', 2, 0),
(8, 2, 'Night', '2013-08-14', 2, 'Elie Wiesel', '2013-12-14', 1, 0),
(9, 1, 'Of Mice & Men', '2013-08-14', 2, 'John Steinbeck', '2013-12-14', 4, 0),
(10, 2, '1984', '2013-08-14', 2, 'George Orwell', '2013-12-14', 3, 0),
(13, 2, 'Jane Eyre', '2013-08-14', 2, 'Charlotte Bronte', '2013-12-14', 5, 0),
(14, 5, 'Review & App Intro', '2013-08-17', 1, '', '2013-08-17', 1, 2),
(15, 4, 'What is Public Speaking?', '2013-08-17', 1, '', '2013-08-17', 1, 0),
(16, 5, 'Capturing Attention', '2013-08-17', 1, '', '2013-08-17', 2, 2),
(17, 5, 'Assisting in Informing', '2013-08-17', 1, '', '2013-08-17', 3, 1),
(18, 5, 'Persuading the Audience', '2013-08-17', 1, '', '2013-08-17', 4, 0),
(19, 5, 'Real-Life Presentation', '2013-08-17', 1, '', '2013-08-17', 5, 0),
(21, 2, 'Poetry', '2013-08-26', 1, '', '2013-12-14', 4, 0),
(22, 2, 'Short Stories', '2013-08-26', 1, '', '2013-08-26', 6, 0),
(23, 2, 'Mythology', '2013-08-26', 1, '', '2013-08-26', 7, 0),
(24, 2, 'A Raisin in the Sun', '2013-08-26', 2, 'Lorraine Hansberry', '2013-08-26', 8, 0),
(25, 2, 'Julius Caesar', '2013-08-26', 2, 'William Shakespeare', '2013-12-14', 9, 0),
(26, 2, 'Othello', '2013-08-26', 2, 'William Shakespeare', '2013-12-14', 10, 0),
(27, 1, 'Poetry', '2013-08-26', 1, '', '2013-08-26', 5, 0),
(28, 1, 'The Odyssey', '2013-08-26', 2, 'Homer', '2013-08-26', 6, 0),
(29, 4, 'Imptromptu Speaking', '2013-08-26', 1, '', '2013-08-26', 2, 0),
(30, 4, 'Manuscript Speaking', '2013-08-26', 1, '', '2013-08-26', 3, 0),
(31, 4, 'Memorized Speaking', '2013-08-26', 1, '', '2013-08-26', 4, 0),
(32, 4, 'Extemporaneous Speaking', '2013-08-26', 1, '', '2013-08-26', 5, 0),
(33, 0, '', '2013-12-14', 0, '', '2013-12-14', 0, 0),
(34, 0, '', '2013-12-14', 0, '', '2013-12-14', 0, 0),
(35, 0, '', '2013-12-14', 0, '', '2013-12-14', 0, 0),
(36, 0, '', '2013-12-14', 0, '', '2013-12-14', 0, 0),
(37, 0, '', '2013-12-14', 0, '', '2013-12-14', -1, 0),
(38, 0, '', '2013-12-14', 0, '', '2013-12-14', 1, 0),
(39, 0, '', '2013-12-14', 0, '', '2013-12-14', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created`, `modified`) VALUES
(1, 'Tim', '65a32415fe05a388ede04bacf0d94b5b12e4b8c9', 'admin', '2013-08-02 17:28:03', '2013-08-02 17:28:03');
