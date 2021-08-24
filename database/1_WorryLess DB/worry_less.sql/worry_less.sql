-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2019 at 12:26 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `worry_less`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance_log`
--

CREATE TABLE `attendance_log` (
  `slno` int(11) NOT NULL,
  `institute_id` varchar(20) NOT NULL,
  `rfid` varchar(100) NOT NULL,
  `regno` varchar(20) NOT NULL,
  `class` varchar(10) NOT NULL,
  `date1` date NOT NULL,
  `time1` time NOT NULL,
  `present_stat` varchar(10) NOT NULL,
  `msg_stat` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance_log`
--

INSERT INTO `attendance_log` (`slno`, `institute_id`, `rfid`, `regno`, `class`, `date1`, `time1`, `present_stat`, `msg_stat`) VALUES
(1, 'GA101', '115', 'A161419', '10', '2019-04-11', '22:01:00', 'present', 'sent'),
(2, 'GA101', '115', 'A161419', '10', '2019-04-11', '22:01:05', '', 'sent'),
(3, 'GA101', '178', 'A161431', '10', '2019-04-11', '22:01:10', 'present', 'sent'),
(4, 'GA101', '178', 'A161431', '10', '2019-04-11', '22:01:16', '', 'sent'),
(5, 'GA101', '115', 'A161419', '10', '2019-04-15', '09:29:00', 'present', 'sent'),
(6, 'GA101', '178', 'A161431', '10', '2019-04-15', '10:29:00', 'present', 'sent'),
(7, 'GA101', '115', 'A161419', '10', '2019-04-15', '23:01:00', '', 'sent'),
(10, 'GA101', '178', 'A161431', '10', '2019-04-16', '16:04:58', 'present', 'sent'),
(11, 'GA101', '115', 'A161419', '10', '2019-04-16', '16:05:31', 'present', 'sent'),
(12, 'GA101', '115', 'A161419', '10', '2019-04-16', '23:18:50', '', 'sent'),
(13, 'GA101', '178', 'A161431', '10', '2019-04-16', '23:18:52', '', 'sent'),
(14, 'GA101', '115', 'A161419', '10', '2019-04-22', '16:33:49', 'present', 'sent'),
(15, 'GA101', '178', 'A161431', '10', '2019-04-22', '16:34:24', 'present', 'sent'),
(16, 'GA101', '115', 'A161419', '10', '2019-04-22', '09:30:00', 'present', 'sent'),
(17, 'GA101', '115', 'A161419', '10', '2019-04-22', '16:49:15', '', 'sent'),
(18, 'GA101', '115', 'A161419', '10', '2019-04-22', '16:50:22', '', 'sent'),
(19, 'GA101', '115', 'A161419', '10', '2019-04-22', '16:50:29', '', 'sent'),
(20, 'GA101', '178', 'A161431', '10', '2019-04-22', '16:50:38', '', 'sent');

-- --------------------------------------------------------

--
-- Table structure for table `dev_login`
--

CREATE TABLE `dev_login` (
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dev_login`
--

INSERT INTO `dev_login` (`username`, `password`) VALUES
('admin', 'admin'),
('admin1', 'admin1');

-- --------------------------------------------------------

--
-- Table structure for table `institute_master`
--

CREATE TABLE `institute_master` (
  `institute_id` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `email_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `institute_master`
--

INSERT INTO `institute_master` (`institute_id`, `name`, `contact_no`, `address`, `email_id`) VALUES
('GA101', 'Grace Advent School', '0987654321', 'Old Agraharam Street', 'mr.rahulksingh@gmail.com');

--
-- Triggers `institute_master`
--
DELIMITER $$
CREATE TRIGGER `after_insert_new_institute` AFTER INSERT ON `institute_master` FOR EACH ROW BEGIN
insert into inst_working_days (institute_id) values(new.institute_id);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `inst_working_days`
--

CREATE TABLE `inst_working_days` (
  `institute_id` varchar(20) NOT NULL,
  `working_days` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inst_working_days`
--

INSERT INTO `inst_working_days` (`institute_id`, `working_days`) VALUES
('GA101', 8);

-- --------------------------------------------------------

--
-- Table structure for table `login_parent`
--

CREATE TABLE `login_parent` (
  `inst_id` varchar(20) NOT NULL,
  `stud_id` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_parent`
--

INSERT INTO `login_parent` (`inst_id`, `stud_id`, `password`) VALUES
('GA101', 'A161419', '12345'),
('GA101', 'A161431', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `login_teacher`
--

CREATE TABLE `login_teacher` (
  `inst_id` varchar(20) NOT NULL,
  `staff_id` varchar(20) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_teacher`
--

INSERT INTO `login_teacher` (`inst_id`, `staff_id`, `pass`) VALUES
('GA101', 'GRA_S_1', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `rfid_log`
--

CREATE TABLE `rfid_log` (
  `rfid_no` varchar(100) NOT NULL,
  `msg_stat` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rfid_log`
--

INSERT INTO `rfid_log` (`rfid_no`, `msg_stat`) VALUES
('100', ''),
('101', ''),
('102', ''),
('102', ''),
('103', ''),
('178', ''),
('115', ''),
('178', ''),
('115', ''),
('115', ''),
('178', ''),
('115', ''),
('178', ''),
('178', ''),
('1000', ''),
('1000', '');

-- --------------------------------------------------------

--
-- Table structure for table `student_master`
--

CREATE TABLE `student_master` (
  `institute_id` varchar(20) NOT NULL,
  `rfid` varchar(100) NOT NULL,
  `regno` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `class` varchar(10) NOT NULL,
  `section` varchar(20) NOT NULL,
  `f_m_name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact_no` varchar(10) NOT NULL,
  `email_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_master`
--

INSERT INTO `student_master` (`institute_id`, `rfid`, `regno`, `name`, `class`, `section`, `f_m_name`, `address`, `contact_no`, `email_id`) VALUES
('GA101', '115', 'A161419', 'Rahulkumar Singh', '10', 'A', 'Chandan', 'Old Agraharam Street', '7010375918', 'mr.rahulksingh@gmail.com'),
('GA101', '178', 'A161431', 'S. Yogesh', '10', 'B', 'B.Shyam', 'Market toilet', '7010375918', 'yogi@hotmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `working_days_log`
--

CREATE TABLE `working_days_log` (
  `institute_id` varchar(20) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `working_days_log`
--

INSERT INTO `working_days_log` (`institute_id`, `date`) VALUES
('GA101', '2019-04-12'),
('GA101', '2019-04-15'),
('GA101', '2019-04-16'),
('GA101', '2019-04-17'),
('GA101', '2019-04-18'),
('GA101', '2019-04-19'),
('GA101', '2019-04-21'),
('GA101', '2019-04-22');

--
-- Triggers `working_days_log`
--
DELIMITER $$
CREATE TRIGGER `change_inst_working_days` AFTER INSERT ON `working_days_log` FOR EACH ROW BEGIN
update inst_working_days set working_days=working_days+1 where institute_id=new.institute_id;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance_log`
--
ALTER TABLE `attendance_log`
  ADD PRIMARY KEY (`slno`);

--
-- Indexes for table `dev_login`
--
ALTER TABLE `dev_login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `institute_master`
--
ALTER TABLE `institute_master`
  ADD PRIMARY KEY (`institute_id`);

--
-- Indexes for table `inst_working_days`
--
ALTER TABLE `inst_working_days`
  ADD PRIMARY KEY (`institute_id`);

--
-- Indexes for table `login_parent`
--
ALTER TABLE `login_parent`
  ADD PRIMARY KEY (`inst_id`,`stud_id`);

--
-- Indexes for table `login_teacher`
--
ALTER TABLE `login_teacher`
  ADD PRIMARY KEY (`inst_id`,`staff_id`);

--
-- Indexes for table `student_master`
--
ALTER TABLE `student_master`
  ADD PRIMARY KEY (`institute_id`,`rfid`,`regno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance_log`
--
ALTER TABLE `attendance_log`
  MODIFY `slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
