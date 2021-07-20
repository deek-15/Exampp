-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2021 at 04:36 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `loginid` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `loginid`, `pass`) VALUES
(1, 'deek', '1234'),
(2, 'hemanth', '12@!'),
(3, 'krishna', 'abcd@');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `que_id` int(5) NOT NULL,
  `test_id` int(5) DEFAULT NULL,
  `que_desc` varchar(500) DEFAULT NULL,
  `ans1` varchar(75) DEFAULT NULL,
  `ans2` varchar(75) DEFAULT NULL,
  `ans3` varchar(75) DEFAULT NULL,
  `ans4` varchar(75) DEFAULT NULL,
  `true_ans` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`que_id`, `test_id`, `que_desc`, `ans1`, `ans2`, `ans3`, `ans4`, `true_ans`) VALUES
(1, 1, '		A collection of interrelated records is called a 				', 'Database', 'Spreadsheet', 'Management information system', 'Text file', 1),
(2, 1, '		ROLLBACK in a database is  a ____ statement.		', 'DDL', 'DML', 'DCL', 'TCL', 4),
(3, 1, 'A field that uniquely identifies which person, thing, or event the record describes is a ____', 'Key', 'Field', 'Data', 'File', 1),
(4, 1, 'A _______is a special kind of a store procedure that executes in response to certain action on the table like insertion, deletion or updating of data.', 'Procedure', 'Trigger', 'Function', 'None of the above', 2),
(5, 1, ' The attribute AGE is calculated from DATE_OF_BIRTH. The attribute AGE is', 'Single valued', 'Multi valued', 'Composite', 'Derived', 4),
(6, 2, 'The total energy of a particle performing simple harmonic motion depends on _____', 'k, a, m', 'k, a', 'k, a, x', 'k, x', 2),
(7, 2, 'Which of the following is an example for impulsive force?', 'A person in a moving bus', 'A horse suddenly stopping', 'Force exerted by a bat hitting a ball', 'Sharpening of knife', 3),
(8, 2, 'When a body falls freely under gravity, then the work done by the gravity is _______', 'Positive', 'Negative', 'Zero', 'Infinity', 1),
(9, 2, 'A bullet fired from a gun can pierce a target due to its _________', 'Mechanical energy', 'Heat energy', 'Kinetic energy', 'Acceleration', 3),
(10, 2, 'Absorptive power of perfectly black body is', 'Zero', 'Infinity', 'One', 'Constant', 3),
(11, 3, 'Alkali metals give a ______ when dissolved in liquid ammonia.', 'Deep blue solution', 'Colourless', 'Red colour', 'None of the above', 1),
(12, 3, 'Which of the following is also known as wood alcohol? ', 'Methanol', 'Ethanol', 'Propanol', 'Butanol', 1),
(13, 3, 'Which among the following are constituents of Brass?', 'Zinc and Copper', 'Iron and Zinc', 'Copper and Nickel', 'Iron and Copper', 1),
(14, 3, 'Which among the following was first human-made plastic?', 'Bakelite', 'Polyethene', 'Celluloid', 'Nylon', 3),
(15, 3, 'Which of these is NOT an allotropic form of carbon?', 'Diamond', 'Graphite', 'Fullerene', 'None of the above', 4);

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `resid` int(11) NOT NULL,
  `login` varchar(20) DEFAULT NULL,
  `test_id` int(5) DEFAULT NULL,
  `test_date` date DEFAULT NULL,
  `score` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `sub_id` int(5) NOT NULL,
  `sub_name` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`sub_id`, `sub_name`) VALUES
(1, 'DBMS'),
(2, 'Physics'),
(3, 'Chemistry');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `test_id` int(5) NOT NULL,
  `sub_id` int(5) DEFAULT NULL,
  `test_name` varchar(30) DEFAULT NULL,
  `total_que` varchar(15) DEFAULT NULL,
  `negative` enum('Yes','No') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`test_id`, `sub_id`, `test_name`, `total_que`, `negative`) VALUES
(1, 1, 'DBMS General', '5', 'Yes'),
(2, 2, 'Physics General', '5', 'No'),
(3, 3, 'Chemistry General', '5', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(5) NOT NULL,
  `login` varchar(20) DEFAULT NULL,
  `pass` varchar(20) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `phone` varchar(13) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `login`, `pass`, `username`, `phone`, `email`) VALUES
(1, '2019103014', '1234', 'Deekshith', '8073655986', 'dixitf15@gmail.com'),
(2, '2019103032', 'abcd@', 'Krishna Teja', '8688985574', 'krishnateja9129@gmail.com'),
(3, '2019103020', '12@!', 'Hemanth', '9985960129', 'hemanthdasararaju@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`que_id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`resid`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `que_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `resid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `sub_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `test_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
