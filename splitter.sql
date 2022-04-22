-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2022 at 03:44 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `splitter`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getprojects` (IN `username` VARCHAR(30))  SELECT * FROM PROJECT WHERE UNAME = username$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `expname` varchar(30) NOT NULL,
  `mname` varchar(30) NOT NULL,
  `amount` int(11) NOT NULL,
  `pid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`expname`, `mname`, `amount`, `pid`) VALUES
('Cab', 'Rishabh', 1000, 2),
('Food', 'Ashar', 700, 2),
('Beach', 'Kaushik', 800, 2),
('Theater', 'Akshit', 1000, 1),
('Beach', 'Rishabh', 1500, 1),
('Food', 'Ranjit', 1000, 3),
('Cab', 'Rishma', 1500, 3),
('Cinema', 'Ravi', 1200, 4),
('Drinks', 'Rishabh', 700, 4),
('Train', 'Ramu', 800, 4),
('Tea', 'Ravi', 800, 7),
('Cab', 'Ravi', 1000, 10),
('Food', 'Rishabh', 1500, 10);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback` varchar(100) NOT NULL,
  `username` varchar(30) NOT NULL,
  `fid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback`, `username`, `fid`) VALUES
('Great application good for splitting money among friends', 'rishabh@gmail.com', 1),
('jdshf sdfhudfsh sdifyhids', 'radnus@gmail.com', 2),
('Nice apllication', 'akshay@gmail.com', 3);

-- --------------------------------------------------------

--
-- Table structure for table `greviances`
--

CREATE TABLE `greviances` (
  `username` varchar(30) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `greviance` varchar(100) NOT NULL,
  `gid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `greviances`
--

INSERT INTO `greviances` (`username`, `subject`, `greviance`, `gid`) VALUES
('rishabh@gmail.com', 'Wrong calculation', 'My project is not showing correct data according to expenses.', 1),
('radnus@gmail.com', 'Hello', 'jshdf isdugfh dsuhf', 2),
('akshay@gmail.com', 'My data not showing correctly', 'Please help regardin this problem', 3);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `mname` varchar(30) NOT NULL,
  `pid` int(11) NOT NULL,
  `overview` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`mname`, `pid`, `overview`) VALUES
('Akshay', 10, -500),
('Akshit', 1, -1700),
('Anju', 3, -2200),
('Anshu', 1, -2700),
('Ashar', 2, -2500),
('Golu', 3, -2200),
('Kaushik', 2, -2400),
('Kaushik', 10, -500),
('Manish', 7, -700),
('Mukesh', 5, 275),
('Radnus', 7, -700),
('Ramakrishna', 2, -3200),
('Ramesh', 5, -1025),
('Ramu', 4, -900),
('Ranjit', 3, -1200),
('Ravi', 1, 300),
('Ravi', 4, 1300),
('Ravi', 5, 775),
('Ravi', 7, 1100),
('Ravi', 10, 500),
('Rishabh', 1, 1000),
('Rishabh', 2, 1500),
('Rishabh', 3, 0),
('Rishabh', 4, 500),
('Rishabh', 7, 800),
('Rishabh', 10, 1000),
('Rishma', 3, -700),
('Sachin', 2, -3200),
('Sachin', 4, -1700),
('Sachin', 10, -500),
('Suraj', 1, -2700),
('Suresh', 5, -1025);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `pname` varchar(30) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `pid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`pname`, `uname`, `pid`) VALUES
('Goa', 'rishabh@gmail.com', 1),
('Mangalore', 'rishabh@gmail.com', 2),
('Chennai', 'rishabh@gmail.com', 3),
('Manali', 'ravi@rediff.com', 4),
('Mumbai', 'ravi@rediff.com', 5),
('Ooty', 'rishabh@gmail.com', 6),
('Bnaglaore', 'radnus@gmail.com', 7),
('Goa', 'radnus@gmail.com', 8),
('Chennai', 'akshay@gmail.com', 9),
('Bangalore', 'akshay@gmail.com', 10),
('Mumbai', 'akshay@gmail.com', 11);

-- --------------------------------------------------------

--
-- Table structure for table `signup_logs`
--

CREATE TABLE `signup_logs` (
  `username` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `logno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `signup_logs`
--

INSERT INTO `signup_logs` (`username`, `name`, `logno`) VALUES
('ramu@yahoo.com', 'Rama', 1),
('kaushik@gmail.com', 'Suryoday ', 2),
('radnus@yahoo.com', 'Radnus', 3),
('radnus@gmail.com', 'Radnus', 4),
('akshay@gmail.com', 'Akshay', 5);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`fname`, `lname`, `username`, `password`) VALUES
('Akshay', 'Kumar', 'akshay@gmail.com', 'Akshay@12'),
('Suryoday ', 'Kaushik', 'kaushik@gmail.com', 'ksdhUIB%1@3'),
('Radnus', 'John', 'radnus@gmail.com', 'Radnus#45'),
('Rama', 'Krishna', 'ramu@yahoo.com', 'hsdDFfh123#'),
('Ravi', 'Verma', 'ravi@rediff.com', 'sfejdh123@S'),
('Rishabh ', 'Dubey', 'rishabh@gmail.com', 'Rish077@');

--
-- Triggers `user`
--
DELIMITER $$
CREATE TRIGGER `register_log` AFTER INSERT ON `user` FOR EACH ROW INSERT INTO signup_logs(username,name) VALUES (NEW.username,NEW.fname)
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD KEY `mname` (`mname`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fid`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `greviances`
--
ALTER TABLE `greviances`
  ADD PRIMARY KEY (`gid`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD UNIQUE KEY `mname` (`mname`,`pid`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`pid`),
  ADD UNIQUE KEY `pid` (`pid`,`pname`),
  ADD KEY `uname` (`uname`);

--
-- Indexes for table `signup_logs`
--
ALTER TABLE `signup_logs`
  ADD PRIMARY KEY (`logno`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `greviances`
--
ALTER TABLE `greviances`
  MODIFY `gid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `signup_logs`
--
ALTER TABLE `signup_logs`
  MODIFY `logno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `expense`
--
ALTER TABLE `expense`
  ADD CONSTRAINT `expense_ibfk_1` FOREIGN KEY (`mname`) REFERENCES `member` (`mname`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `expense_ibfk_2` FOREIGN KEY (`pid`) REFERENCES `project` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `greviances`
--
ALTER TABLE `greviances`
  ADD CONSTRAINT `greviances_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `member_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `project` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`uname`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
