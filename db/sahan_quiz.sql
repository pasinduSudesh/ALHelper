-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2019 at 06:02 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sahan_quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id` int(11) NOT NULL,
  `subject` int(11) NOT NULL,
  `categories` int(11) NOT NULL,
  `questions` varchar(500) NOT NULL,
  `question_image` varchar(200) NOT NULL,
  `ans1` varchar(100) NOT NULL,
  `ans2` varchar(100) NOT NULL,
  `ans3` varchar(100) NOT NULL,
  `ans4` varchar(100) NOT NULL,
  `ans5` varchar(100) NOT NULL,
  `ans` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `subject`, `categories`, `questions`, `question_image`, `ans1`, `ans2`, `ans3`, `ans4`, `ans5`, `ans`) VALUES
(1, 1, 2, 'fefewfef', '', 'ewfwe', 'fwe', 'ewfwe', 'wefw', 'efw', 'option1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `password`, `email`, `image`) VALUES
(1, 'admin', 'admin', 'viaviwebtech@gmail.com', 'profile.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quiz_cat`
--

CREATE TABLE `tbl_quiz_cat` (
  `id` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `category_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_quiz_cat`
--

INSERT INTO `tbl_quiz_cat` (`id`, `mid`, `category_name`) VALUES
(1, 1, 'sc8'),
(2, 1, 'sc10'),
(3, 1, 'sc9'),
(4, 1, 'sc7'),
(5, 1, 'sc5'),
(6, 1, 'sc6'),
(7, 1, 'sc3'),
(8, 1, 'sc4'),
(9, 1, 'sc2'),
(10, 2, 'math2'),
(11, 2, 'math3'),
(12, 2, 'math4'),
(13, 2, 'math5'),
(14, 2, 'math6'),
(15, 2, 'math7'),
(16, 2, 'math8'),
(17, 2, 'math9'),
(18, 2, 'math10'),
(19, 6, 'eng2'),
(20, 6, 'eng3'),
(22, 6, 'eng4'),
(23, 6, 'eng5'),
(24, 6, 'eng6'),
(25, 6, 'eng7'),
(26, 6, 'eng8'),
(27, 6, 'eng9'),
(28, 6, 'eng10'),
(29, 6, 'eng9');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quiz_main_cat`
--

CREATE TABLE `tbl_quiz_main_cat` (
  `mid` int(11) NOT NULL,
  `cat_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_quiz_main_cat`
--

INSERT INTO `tbl_quiz_main_cat` (`mid`, `cat_name`) VALUES
(1, 'science'),
(2, 'maths'),
(6, 'english');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_settings`
--

CREATE TABLE `tbl_settings` (
  `id` int(11) NOT NULL,
  `onesignal_app_id` text NOT NULL,
  `onesignal_rest_key` text NOT NULL,
  `app_name` varchar(255) NOT NULL,
  `app_logo` varchar(255) NOT NULL,
  `app_email` varchar(255) NOT NULL,
  `app_version` varchar(255) NOT NULL,
  `app_author` varchar(255) NOT NULL,
  `app_contact` varchar(255) NOT NULL,
  `app_website` varchar(255) NOT NULL,
  `app_description` text NOT NULL,
  `app_developed_by` varchar(255) NOT NULL,
  `app_privacy_policy` text NOT NULL,
  `api_all_order_by` varchar(255) NOT NULL,
  `api_latest_limit` int(3) NOT NULL,
  `api_cat_order_by` varchar(255) NOT NULL,
  `api_cat_post_order_by` varchar(255) NOT NULL,
  `publisher_id` text NOT NULL,
  `interstital_ad` text NOT NULL,
  `interstital_ad_id` text NOT NULL,
  `banner_ad` text NOT NULL,
  `banner_ad_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_settings`
--

INSERT INTO `tbl_settings` (`id`, `onesignal_app_id`, `onesignal_rest_key`, `app_name`, `app_logo`, `app_email`, `app_version`, `app_author`, `app_contact`, `app_website`, `app_description`, `app_developed_by`, `app_privacy_policy`, `api_all_order_by`, `api_latest_limit`, `api_cat_order_by`, `api_cat_post_order_by`, `publisher_id`, `interstital_ad`, `interstital_ad_id`, `banner_ad`, `banner_ad_id`) VALUES
(1, 'e2140601-4da3-4133-89ba-35883b1c2d46', 'YWZlYThjMDItMmQ5OC00NjQzLWIwMjEtYjlhMmRiZjk0NTVi', 'Class for fun', 'Logopit_1538713759343.jpg', '', '', '', '', '', '', '', '<p>What personal information we gather to use mobile application?<br />\r\nRequired name and contact details along with the account/credit-debit card details to ensure that the user has successfully subscribed to view the videos further. Also, to know the time limit of the subscription.</p>\r\n\r\n<p>When do we collect information?<br />\r\nWe collect info in application at the time of registration and payment. Later stages when the user wants to edit their profile they can visit the profile page.</p>\r\n\r\n<p>How do we use information?<br />\r\nWe use info to make sure user has subscribed properly going through all the necessary procedures in order to send further notifications of updation to them. For payment related details gathered too for successful log in.</p>\r\n\r\n<p>How do we protect information?<br />\r\nIt is taken care of that nobody&rsquo;s personnel details are leaked or going out anywhere. The data gathered is strictly under our control, our server with intent to connect further and to have location dynamics. All the security measures are being done for the same</p>\r\n', 'ASC', 15, 'category_name', 'DESC', 'pub-9456493320432553', 'true', 'ca-app-pub-8356404931736973/8732534868', 'true', 'ca-app-pub-3940256099942544/6300978111');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `grade` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `name`, `grade`, `email`, `password`, `phone`, `status`) VALUES
(124, 'Pooja', 2, 'poojaa@gmail.com', '12345', '1234567899', '1'),
(125, 'Pooja', 2, 'pooja@gmail.com', '12345', '8767675796', '1'),
(127, 'Tarun Patnaik', 2, 'tarunpat1971@gmail.com', 'tarunpatnaik', '7205404013', '1'),
(128, 'tailor', 4, 'tailor@gmail.com', '123456', '7567005767', '1'),
(129, 'arpit', 1, 'arpit@gmail.com', '12345', '123456', '1'),
(130, 'tarun', 5, 'tarunpat1971@abc.com', 'tarunpatnaik', '7205404013', '1'),
(131, 'dannywise', 5, 'bekeedaniels@gmail.com', 'dannywiseqq', '0806930345', '1'),
(132, 'sahan', 7, 'whschandimal@gmail.com', 'sahan96', '758264076', '1'),
(133, 'sahan', 2, 'abc123@gmail.com', 'sahan96', '9884151', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_quiz_cat`
--
ALTER TABLE `tbl_quiz_cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_quiz_main_cat`
--
ALTER TABLE `tbl_quiz_main_cat`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_quiz_cat`
--
ALTER TABLE `tbl_quiz_cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_quiz_main_cat`
--
ALTER TABLE `tbl_quiz_main_cat`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
