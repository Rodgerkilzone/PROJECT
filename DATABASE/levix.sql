-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2018 at 06:11 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `levix`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `job_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cover_letter_url` varchar(100) NOT NULL,
  `cv_url` varchar(100) NOT NULL,
  `date_applied` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`job_id`, `user_id`, `cover_letter_url`, `cv_url`, `date_applied`) VALUES
(24, 4, 'assets/cover_docs/24_4.docx', 'assets/cv_docs/24_4.docx', '2018-08-19 09:14:46'),
(25, 3, 'assets/cover_docs/25_3.docx', 'assets/cv_docs/25_3.docx', '2018-08-19 17:37:00'),
(22, 3, 'assets/cover_docs/22_3.docx', 'assets/cv_docs/22_3.docx', '2018-08-20 04:51:12'),
(24, 3, 'assets/cover_docs/24_3.docx', 'assets/cv_docs/24_3.docx', '2018-08-21 09:16:53'),
(25, 4, 'assets/cover_docs/25_4.docx', 'assets/cv_docs/25_4.docx', '2018-08-22 14:46:51'),
(28, 4, 'assets/cover_docs/28_4.docx', 'assets/cv_docs/28_4.docx', '2018-08-23 09:21:25');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `company_type` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `about` varchar(500) NOT NULL,
  `location` varchar(20) NOT NULL,
  `phone_number` int(20) NOT NULL,
  `facebook_url` varchar(100) NOT NULL,
  `twitter_url` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company_name`, `company_type`, `email`, `about`, `location`, `phone_number`, `facebook_url`, `twitter_url`, `password`) VALUES
(5, 'Rog Tech', 'Ict_and_software', 'rodgerkilonzo@yahoo.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus numquam sint earum nesciunt.   ', 'Nairobi', 700115788, '', '', '202cb962ac59075b964b07152d234b70'),
(6, 'Armrift construction', 'construction', 'mike@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus numquam sint earum nesciunt.', 'Mombasa', 734345232, '', '', '202cb962ac59075b964b07152d234b70'),
(7, 'aga khan', 'Health', 'rodgerkilonzo@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus numquam sint earum nesciunt.', 'Kisumu', 2147483647, '', '', '202cb962ac59075b964b07152d234b70'),
(8, 'NTV', 'Media_and_Journalism', 'rick@gmail.com', 'This news TV station company', 'Nairobi', 734578293, '', '', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `job_name` varchar(20) NOT NULL,
  `job_type` varchar(20) NOT NULL,
  `about` varchar(500) NOT NULL,
  `requirements` varchar(500) NOT NULL,
  `resposibility` varchar(500) NOT NULL,
  `experience` varchar(20) NOT NULL,
  `salary` varchar(50) NOT NULL,
  `deadline` date NOT NULL,
  `date_posted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `company_id`, `job_name`, `job_type`, `about`, `requirements`, `resposibility`, `experience`, `salary`, `deadline`, `date_posted`) VALUES
(22, 5, 'Mobile developer', 'ICT_and_Software', 'We are looking fr a mobile developer for a government project.', 'A in kcse', 'debugging', '0-2(Years)', 'Ksh 50,000-100,000', '2018-08-30', '2018-08-14'),
(23, 5, 'Civil ', 'Engineering', 'we need a civil engineer for a road construction in kilimani', 'degree in civil\r\nA in kcse', 'supervise construction', '0-2(Years)', 'Ksh 50,000-100,000', '2018-08-29', '2018-08-15'),
(24, 5, 'Surgeon', 'Health', 'Looking for a surgeon for a senior position in Aga khan mombasa.', 'Degree in medicine . A in KCSE  . A in kcpe', 'supervise operation in theater', '3-5(Years)', 'Ksh 50,000-100,000', '2018-08-31', '2018-08-15'),
(26, 7, 'pharmacist', 'Health', 'we are looking for a pharmacist to assist in our clinic here in kisumu', 'A in kcse', 'sell medicine', '0-2(Years)', 'Ksh 50,000-100,000', '2018-09-29', '2018-08-22'),
(27, 6, 'accontant', 'Banking_and_Finance', 'accounting ', 'A in KCSE', 'accounting', 'N/A', 'Ksh 50,000-100,000', '2018-08-18', '2018-08-23'),
(28, 6, 'secretary', 'Other_Jobs', 'secretary', 'A in kcse', 'secretary', '0-2(Years)', 'Ksh 50,000-100,001', '2018-09-25', '2018-08-23'),
(29, 6, 'Civil Engneering', 'Engineering', 'supervising construction of buildings in nairobi.', 'A in Kcse', 'supervising, Management', '0-2(Years)', 'Ksh 50,000-100,001', '2018-09-27', '2018-09-14');

-- --------------------------------------------------------

--
-- Table structure for table `job_seeker`
--

CREATE TABLE `job_seeker` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `location` varchar(50) NOT NULL,
  `phone_number` int(20) NOT NULL,
  `hobbies` varchar(500) NOT NULL,
  `skills` varchar(500) NOT NULL,
  `education` varchar(500) NOT NULL,
  `experience` varchar(500) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_seeker`
--

INSERT INTO `job_seeker` (`user_id`, `first_name`, `last_name`, `email`, `gender`, `location`, `phone_number`, `hobbies`, `skills`, `education`, `experience`, `password`) VALUES
(3, 'rodger', 'kilonzo', 'rodger@gmail.com', 'Male', 'Nairobi', 721908323, '{"hicking":null}', '{"android developer":null,"accounting":null}', '{"Primary-moringa":"","Secondary-MFA":"","College-kenyatta university":"diploma accounting"}', '{"kcb- (2015-2018)":"accountant","equity-(2017-2018)":"customer care"}', '202cb962ac59075b964b07152d234b70'),
(4, 'ken', 'michal', 'ken@gmail.com', 'Male', 'mombasa', 721908323, '{"hicking":null}', '{"accounting":null,"android developer":null}', '{"Primary-kenya navy primary school (2001-2010)":"","Secondary-moi forces (2010-2014)":"","University-Kenyatta University (2011-2018)":"electrical engineering"}', '{"familiy bank - (2018-2019)":"accountant","kcb- (2015-2018)":"watchman","equity-(2017-2018)":"cleaner"}', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `job_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` varchar(500) NOT NULL,
  `date_sent` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `viewed` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`job_id`, `user_id`, `message`, `date_sent`, `viewed`) VALUES
(22, 3, '{"Sorry you did not qualify for the job":"2018-08-21 17:56:47"} ', '2018-08-21 15:56:47', 1),
(25, 3, '{"hello , we  have reviewed your application and you have qualified for an interview please avail yourself Tuesday next week.":"2018-08-21 18:07:53"} ', '2018-08-21 16:07:53', 1),
(24, 4, '{"hello ken":"2018-08-21 19:58:11"} ', '2018-08-21 17:58:11', 1),
(25, 4, '{"Hello we invite you to an interview next week":"2018-08-22 16:54:13"} ', '2018-08-22 14:54:13', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `job_seeker`
--
ALTER TABLE `job_seeker`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `job_seeker`
--
ALTER TABLE `job_seeker`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
