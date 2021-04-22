-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2020 at 05:34 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogdbms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `admin_pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `email`, `admin_pass`) VALUES
(123456, 'Saiem Mohit', 'saiem@gmail.com', '123'),
(654321, 'Bappa Mohit', 'bappa@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `post_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `username` varchar(50) NOT NULL,
  `comment_deleted` timestamp NULL DEFAULT NULL,
  `Comment_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`post_id`, `comment_id`, `comment`, `username`, `comment_deleted`, `Comment_time`) VALUES
(13, 1, 'dsadas', 'Saiem', NULL, '2018-04-20 02:26:12'),
(13, 2, 'gfdgdf', 'Saiem', NULL, '2018-04-20 02:39:13'),
(13, 3, 'dasdasd', 'aaa', NULL, '2018-04-20 04:20:49'),
(13, 4, 'sdfsdfsf', 'aaa', NULL, '2018-04-20 04:24:20'),
(13, 5, 'hgfhgf', 'ee9', NULL, '2018-04-20 04:26:49'),
(13, 6, 'fgaskv.ldnalfvn', 'Saiem', NULL, '2018-04-20 11:01:36'),
(8, 7, 'fdassdasd', 'Saiem', NULL, '2018-04-20 14:09:53'),
(13, 8, 'jhgfjfgh', 'Saiem', NULL, '2018-04-20 14:16:29'),
(5, 9, 'jhkhjk', 'Saiem', NULL, '2018-04-20 15:54:59'),
(16, 10, 'what the hell', 'Saiem', NULL, '2018-04-24 13:35:07'),
(23, 11, 'adsad', 'Saiem', NULL, '2018-12-15 18:49:36'),
(19, 12, 'what u have written!!!!!!!!!', 'Saiem', NULL, '2018-12-16 09:50:58');

-- --------------------------------------------------------

--
-- Table structure for table `extras`
--

CREATE TABLE `extras` (
  `post_id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL,
  `link` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `extras`
--

INSERT INTO `extras` (`post_id`, `content_id`, `link`) VALUES
(1, 1, 'post_contents/349380393.jpg'),
(1, 2, 'post_contents/768056860.png'),
(2, 3, 'post_contents/986358405.png'),
(3, 4, 'post_contents/1069899437.jpg'),
(4, 5, 'post_contents/1793180492.jpg'),
(5, 6, 'post_contents/1773608285.png'),
(6, 7, 'post_contents/1063604165.jpg'),
(7, 8, 'post_contents/1853841441.jpg'),
(8, 9, 'post_contents/935990733.jpg'),
(9, 10, 'post_contents/75572541.jpg'),
(10, 11, 'post_contents/1617358525.jpg'),
(11, 12, 'post_contents/46650673.jpg'),
(12, 13, 'post_contents/1321815531.jpg'),
(13, 14, 'post_contents/743075415.jpg'),
(13, 15, 'post_contents/1212464681.png'),
(14, 16, 'post_contents/102921292.jpg'),
(16, 17, 'post_contents/563256930.gif'),
(17, 18, 'post_contents/1360304818.jpg'),
(18, 19, 'post_contents/787968078.png'),
(19, 20, 'post_contents/1279364814.jpg'),
(20, 21, 'post_contents/133635269.jpg'),
(21, 22, 'post_contents/975751829.jpg'),
(22, 23, 'post_contents/1983642152.'),
(23, 24, 'post_contents/1918147728.jpg'),
(24, 25, 'post_contents/1266743663.jpg'),
(25, 26, 'post_contents/1985943476.jpg'),
(26, 27, 'post_contents/1914065576.jpg'),
(27, 28, 'post_contents/558242341.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `likecommentstatus`
--

CREATE TABLE `likecommentstatus` (
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likecommentstatus`
--

INSERT INTO `likecommentstatus` (`user_id`, `post_id`, `status`) VALUES
(2, 18, 1),
(2, 17, 1),
(2, 16, 1),
(2, 14, 1),
(2, 23, 1),
(10, 24, 1),
(2, 19, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_blog`
--

CREATE TABLE `user_blog` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `post_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `post` varchar(2600) NOT NULL,
  `likes_count` int(11) NOT NULL,
  `report_count` int(11) NOT NULL,
  `report_comment` varchar(500) DEFAULT NULL,
  `time_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `blog_deleted` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_blog`
--

INSERT INTO `user_blog` (`user_id`, `user_name`, `post_id`, `title`, `post`, `likes_count`, `report_count`, `report_comment`, `time_date`, `blog_deleted`) VALUES
(2, 'Saiem', 1, 'aa', 'aa', 2, 11, NULL, '2018-12-17 16:09:43', NULL),
(2, 'Saiem', 2, 'ee', 'adasdas', 0, 5, NULL, '2018-12-17 16:09:43', NULL),
(2, 'Saiem', 3, 'tret', 'fasfsdafasdfas', 4, 6, NULL, '2018-12-17 16:09:43', NULL),
(2, 'Saiem', 4, 'dfgfdhdfh', 'jghfjkghfjfg', 0, 0, NULL, '2018-12-17 16:09:43', NULL),
(2, 'Saiem', 5, 'bgv', 'kjhkvhg', 1, 44, NULL, '2018-12-17 16:09:43', NULL),
(2, 'Saiem', 6, 'jgkhgh', 'kghhjkgh', 0, 5, NULL, '2018-12-17 16:09:43', NULL),
(2, 'Saiem', 7, 'sdfgdfghdf', 'ghjf', 0, 2, NULL, '2018-12-17 16:09:43', NULL),
(2, 'Saiem', 8, 'sdfgdfghdffd', 'ghjfsfds', 1, 0, NULL, '2018-12-17 16:09:43', NULL),
(2, 'Saiem', 9, 'ghjyu', 'ytutyutyuty', 0, 4, NULL, '2018-12-17 16:09:43', NULL),
(2, 'Saiem', 10, 'gdfgdfgdf', 'ghfjjfhjf', 0, 10, NULL, '2018-12-17 16:09:43', NULL),
(2, 'Saiem', 11, 'dasfsdfgsdfg', 'ghfdhghdfhdf', 2, 17, NULL, '2018-12-17 16:09:43', NULL),
(2, 'Saiem', 12, 'dsadsa', 'dsasdasdsgsdfgsdg', 0, 0, NULL, '2018-12-17 16:09:43', NULL),
(2, 'Saiem', 13, 'Hello', 'wahs up', 7, 3, NULL, '2018-12-17 16:09:43', NULL),
(7, 'ee9', 14, 'dasdas', 'dasdasd', 1, 7, NULL, '2018-09-22 18:46:31', NULL),
(7, 'ee9', 15, 'dasdfggs', 'shfghfg', 0, 11, NULL, '2018-04-20 20:01:15', NULL),
(2, 'Saiem', 16, 'bvxgfdg', 'halu', 1, 0, NULL, '2018-12-17 16:09:43', NULL),
(2, 'Saiem', 17, 'cchgfhgfv', 'asdfghjkl;', 7, 4, NULL, '2018-12-17 16:09:43', NULL),
(2, 'Saiem', 18, 'title 1', 'Simply download a CSS file and replace the one in Bootstrap. No messing \r\naround with hex values. Simply download a CSS file and replace the one in \r\nBootstrap. No messing around with hex values.', 1, 0, NULL, '2018-12-17 16:08:55', NULL),
(2, 'Saiem', 19, 'Story 5', 'hello mdsnvgfsdjbfjsdbajklfnsd\r\nfsdjfosdjf\r\nfksdpojkfpsdjkfp\r\nfoisdhifjsd', 1, 0, NULL, '2018-12-17 16:08:55', NULL),
(2, 'Saiem', 20, 'hello world', 'hello world', 0, 0, NULL, '2018-12-17 16:08:55', '2018-12-13 21:49:17'),
(2, 'Saiem', 21, 'hello', 'adsdas', 0, 0, NULL, '2018-12-17 16:08:55', '2018-12-13 21:48:34'),
(2, 'Saiem', 22, 'sfdsfs', 'hgfdhgdhd', 0, 0, NULL, '2018-12-17 16:08:55', '2018-12-13 21:49:05'),
(2, 'Saiem', 23, 'gkhjk', 'hkhj', 1, 0, NULL, '2018-12-17 16:08:55', '2018-12-15 20:18:17'),
(10, 'adasd39576', 24, 'Test aaaaa', 'Why both low-risk and high-risk\r\nproducts are costly. P = primary\r\ncost of product, including cost of\r\nsafety measures involved; S =\r\nsecondary costs, including\r\nwarranties, loss of customer\r\ngoodwill, litigation costs, costs of\r\ndowntime, and other secondary\r\ncosts. T = total cost. Minimum\r\ntotal cost occurs at M, where\r\nincremental savings in primary cost\r\n(slope of P) are offset by an equal\r\nincremental increase in secondary\r\ncost (slope of S). Highest\r\nacceptable risk (H) may fall below\r\nrisk at least cost (M), in which case\r\nH and its higher cost must be\r\nselected as the design or operating\r\npoint', 1, 0, NULL, '2018-12-15 20:24:06', NULL),
(2, 'Saiem', 25, 'test abc', 'Where... am I...?â€ Before he knows it, Kirito has made a full-dive into \r\nan epic, fantasy-like virtual world. With only a murky recollection of \r\nwhat happened right before he logged in, he starts to wander around, \r\nsearching for clues. He comes upon an enormous, pitch dark tree (the \r\nGigas Cedar), where he encounters a boy. â€œMy name is Eugeo. Nice to meet \r\nyou, Kirito.â€ Although he is supposedly a resident of the virtual world - \r\nan NPC - the boy shows the same array of emotions as any human being.', 0, 0, NULL, '2018-12-17 16:08:55', '2018-12-16 09:41:25'),
(6, 'Rafiul', 26, 'update query', 'It is the WHERE clause that determines how many records that will be \r\nupdated.\r\n\r\nThe following SQL statement will update the contactname to &quot;Juan&quot; for all \r\nrecords where country is &quot;Mexico&quot;:', 0, 0, NULL, '2018-12-17 10:32:09', NULL),
(6, 'Rafiul', 27, 'ORDER BY', 'The ORDER BY keyword is used to sort the result-set in ascending or \r\ndescending order.\r\n\r\nThe ORDER BY keyword sorts the records in ascending order by default. To \r\nsort the records in descending order, use the DESC keyword.', 0, 0, NULL, '2018-12-17 10:33:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_suggestion`
--

CREATE TABLE `user_suggestion` (
  `user_id` int(11) NOT NULL,
  `suggestion` varchar(1000) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_suggestion`
--

INSERT INTO `user_suggestion` (`user_id`, `suggestion`, `date`) VALUES
(2, 'ddasdasdasdasdsadsadsadsa', '2018-04-21 02:26:02'),
(7, 'asddasdddsf', '2018-04-21 02:59:41'),
(2, 'problem', '2018-12-14 04:12:03'),
(2, 'The ui glitch issu', '2018-12-16 03:00:45');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `profile_pic` varchar(50) NOT NULL,
  `occupation` varchar(30) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `dob` varchar(30) NOT NULL,
  `user_deleted` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `user_name`, `full_name`, `email`, `password`, `gender`, `profile_pic`, `occupation`, `phone_number`, `dob`, `user_deleted`) VALUES
(2, 'Saiem', 'Saiem Al', 'saiem@gmail.com', 'a', 'male', 'propics/1557249945.jpg', 'Student', '01936911899', '2018-03-20', NULL),
(4, 'aaa', 'ssa', 'aezaf@gmail.com', 'ww', 'male', 'propics/315186645.jpg', 'Student', '01936911699', '2018-03-20', NULL),
(6, 'Rafiul', 'ee', 'rafiul@gmail.com', '12345678', 'female', 'propics/126520763.png', 'vanda vaga', '01936911609', '2018-03-20', NULL),
(7, 'ee9', 'asdfa', 'ddffarriaga@gmail.com', 'Asdf1234', 'female', 'propics/126520763.png', 'kkkaa', '01936911698', '2018-03-14', NULL),
(9, 'asdasd39106', 'asdasd', 'boj222f@gmail.com', 'Asdf1234', 'male', 'propics/315186645.jpg', 'kdhbaskjd', '01936911654', '2018-04-18', NULL),
(10, 'adasd39576', 'adasd', 'scoot@gmail.com', 'asd', 'male', 'propics/166016146.jpg', 'dasdas', '01987655388', '2018-12-04', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD UNIQUE KEY `admin_id` (`admin_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `extras`
--
ALTER TABLE `extras`
  ADD PRIMARY KEY (`content_id`);

--
-- Indexes for table `user_blog`
--
ALTER TABLE `user_blog`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `extras`
--
ALTER TABLE `extras`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `user_blog`
--
ALTER TABLE `user_blog`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
