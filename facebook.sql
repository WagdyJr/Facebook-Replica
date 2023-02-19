-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2021 at 12:10 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `facebook`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `AID` int(2) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `joiningDate` date NOT NULL DEFAULT current_timestamp(),
  `aboutMe` longtext DEFAULT NULL,
  `profilePic` varchar(200) NOT NULL,
  `UID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`AID`, `Email`, `password`, `joiningDate`, `aboutMe`, `profilePic`, `UID`) VALUES
(25, 'ali.wagdyy@yahoo.com', '1234', '2021-01-14', '7ambola', '', 94),
(26, 'omarwagdysaleh@gmail.com', '1234', '2021-01-16', NULL, '', 95),
(27, 'hussein@yahoo.com', '1234', '2021-01-16', NULL, '', 96),
(28, 'mahmoud@yahoo.com', '1234', '2021-01-16', NULL, '', 97),
(29, 'hassanhosny@gmail.com', '08c9151a413f1b73503d', '2021-01-17', NULL, '', 98),
(30, 'reem@yahoo.com', '08c9151a413f1b73503d', '2021-01-17', NULL, '', 103),
(31, 'ali.wagdyy@yahoo.co', '08c9151a413f1b73503d', '2021-01-17', 'asdasd', '', 104);

-- --------------------------------------------------------

--
-- Table structure for table `addd`
--

CREATE TABLE `addd` (
  `addID` int(2) NOT NULL,
  `flID` int(5) NOT NULL,
  `frID` int(5) NOT NULL,
  `approve` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `CID` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `time` time NOT NULL DEFAULT current_timestamp(),
  `description` varchar(100) NOT NULL,
  `UID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `friendlist`
--

CREATE TABLE `friendlist` (
  `flID` int(6) NOT NULL,
  `user1` int(5) NOT NULL,
  `user2` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `friendlist`
--

INSERT INTO `friendlist` (`flID`, `user1`, `user2`) VALUES
(1, 94, 97),
(8, 94, 96),
(9, 96, 94);

-- --------------------------------------------------------

--
-- Table structure for table `friendrequest`
--

CREATE TABLE `friendrequest` (
  `frID` int(4) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp(),
  `UID` int(5) NOT NULL,
  `user2` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `has`
--

CREATE TABLE `has` (
  `hasID` int(2) NOT NULL,
  `PID` int(5) NOT NULL,
  `RID` int(5) NOT NULL,
  `NID` int(5) NOT NULL,
  `CID` int(5) NOT NULL,
  `noOfComments` int(100) NOT NULL,
  `noOfReacts` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `NID` int(5) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `time` time NOT NULL DEFAULT current_timestamp(),
  `description` varchar(100) NOT NULL,
  `UID` int(5) NOT NULL,
  `user2` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `PID` int(3) NOT NULL,
  `caption` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `uploaded_on` datetime NOT NULL DEFAULT current_timestamp(),
  `isPublic` tinyint(1) NOT NULL,
  `UID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`PID`, `caption`, `image`, `uploaded_on`, `isPublic`, `UID`) VALUES
(5, 'Pain is my middle name', '', '2021-01-17 23:56:15', 1, 94),
(7, 'Am I retarded ?', '', '2021-01-17 23:57:23', 1, 94),
(12, 'Duck off!!', '', '2021-01-17 00:02:38', 0, 94),
(22, 'interstellar', 'images3.jpg', '2021-01-17 12:00:52', 0, 94),
(26, '', 'images (6).jpg', '2021-01-17 14:52:23', 1, 98),
(27, 'Its me VANTAA!!', '', '2021-01-17 17:45:30', 1, 96),
(28, 'sayed', '', '2021-01-17 17:57:52', 0, 96),
(29, 'Post', '', '2021-01-17 19:34:10', 1, 104),
(30, 'image', 'images (6).jpg', '2021-01-17 19:34:27', 1, 104),
(31, 'private', '', '2021-01-17 19:40:32', 0, 104),
(32, 'hgfgh', 'images (6).jpg', '2021-01-21 16:31:34', 1, 94);

-- --------------------------------------------------------

--
-- Table structure for table `react`
--

CREATE TABLE `react` (
  `RID` int(5) NOT NULL,
  `type` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL DEFAULT current_timestamp(),
  `UID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sendrequest`
--

CREATE TABLE `sendrequest` (
  `SRID` int(2) NOT NULL,
  `send` int(5) NOT NULL,
  `receive` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UID` int(4) NOT NULL,
  `fName` varchar(20) NOT NULL,
  `lName` varchar(20) NOT NULL,
  `Nickname` varchar(20) DEFAULT NULL,
  `dateOfBirth` varchar(20) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `phoneNumber` varchar(11) DEFAULT NULL,
  `maritalStatus` varchar(100) DEFAULT NULL,
  `college` varchar(20) DEFAULT NULL,
  `school` varchar(20) DEFAULT NULL,
  `nationality` varchar(20) DEFAULT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UID`, `fName`, `lName`, `Nickname`, `dateOfBirth`, `gender`, `phoneNumber`, `maritalStatus`, `college`, `school`, `nationality`, `email`) VALUES
(94, 'Ali', 'WAGDY', 'WagdyJr', '1/10/1998', 'Male', '0109066245', 'In relatio', NULL, NULL, 'Alexandria', 'ali.wagdyy@yahoo.com'),
(95, 'OMAR', 'WAGDY', 'Wagdy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'omarwagdysaleh@gmail.com'),
(96, 'Mohamed', 'Hussein', 'Vanttaa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'hussein@yahoo.com'),
(97, 'Mahmoud', 'Abdelazim', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'mahmoud@yahoo.com'),
(98, 'Hassan', 'Hosny', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'hassanhosny@gmail.com'),
(103, 'Reem', 'Ashraf', '', '1/10/1998', 'Female', NULL, NULL, NULL, NULL, NULL, 'reem@yahoo.com'),
(104, 'Ahmed ', 'Mohamed', 'ahmed', '05/16/2007', 'gender', NULL, NULL, NULL, NULL, 'Egypt', 'ali.wagdyy@yahoo.co');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`AID`),
  ADD KEY `account_ibfk_1` (`UID`);

--
-- Indexes for table `addd`
--
ALTER TABLE `addd`
  ADD PRIMARY KEY (`addID`),
  ADD KEY `addd_ibfk_1` (`flID`),
  ADD KEY `addd_ibfk_2` (`frID`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`CID`),
  ADD KEY `comment_ibfk_1` (`UID`);

--
-- Indexes for table `friendlist`
--
ALTER TABLE `friendlist`
  ADD PRIMARY KEY (`flID`),
  ADD KEY `friendlist_ibfk_1` (`user1`),
  ADD KEY `friendlist_ibfk_2` (`user2`);

--
-- Indexes for table `friendrequest`
--
ALTER TABLE `friendrequest`
  ADD PRIMARY KEY (`frID`),
  ADD KEY `friendrequest_ibfk_1` (`UID`),
  ADD KEY `friendrequest_ibfk_2` (`user2`);

--
-- Indexes for table `has`
--
ALTER TABLE `has`
  ADD PRIMARY KEY (`hasID`),
  ADD KEY `has_ibfk_1` (`CID`),
  ADD KEY `has_ibfk_2` (`NID`),
  ADD KEY `has_ibfk_3` (`PID`),
  ADD KEY `has_ibfk_4` (`RID`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`NID`),
  ADD KEY `notification_ibfk_1` (`UID`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`PID`),
  ADD KEY `post_ibfk_1` (`UID`);

--
-- Indexes for table `react`
--
ALTER TABLE `react`
  ADD PRIMARY KEY (`RID`),
  ADD KEY `react_ibfk_1` (`UID`);

--
-- Indexes for table `sendrequest`
--
ALTER TABLE `sendrequest`
  ADD PRIMARY KEY (`SRID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `AID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `addd`
--
ALTER TABLE `addd`
  MODIFY `addID` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `CID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `friendlist`
--
ALTER TABLE `friendlist`
  MODIFY `flID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `friendrequest`
--
ALTER TABLE `friendrequest`
  MODIFY `frID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `has`
--
ALTER TABLE `has`
  MODIFY `hasID` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `NID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `PID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `react`
--
ALTER TABLE `react`
  MODIFY `RID` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sendrequest`
--
ALTER TABLE `sendrequest`
  MODIFY `SRID` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`UID`) REFERENCES `user` (`UID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `addd`
--
ALTER TABLE `addd`
  ADD CONSTRAINT `addd_ibfk_1` FOREIGN KEY (`flID`) REFERENCES `friendlist` (`flID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `addd_ibfk_2` FOREIGN KEY (`frID`) REFERENCES `friendrequest` (`frID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`UID`) REFERENCES `user` (`UID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `friendlist`
--
ALTER TABLE `friendlist`
  ADD CONSTRAINT `friendlist_ibfk_1` FOREIGN KEY (`user1`) REFERENCES `user` (`UID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `friendlist_ibfk_2` FOREIGN KEY (`user2`) REFERENCES `user` (`UID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `friendrequest`
--
ALTER TABLE `friendrequest`
  ADD CONSTRAINT `friendrequest_ibfk_1` FOREIGN KEY (`UID`) REFERENCES `user` (`UID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `friendrequest_ibfk_2` FOREIGN KEY (`user2`) REFERENCES `user` (`UID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `has`
--
ALTER TABLE `has`
  ADD CONSTRAINT `has_ibfk_1` FOREIGN KEY (`CID`) REFERENCES `comment` (`CID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `has_ibfk_2` FOREIGN KEY (`NID`) REFERENCES `notification` (`NID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `has_ibfk_3` FOREIGN KEY (`PID`) REFERENCES `post` (`PID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `has_ibfk_4` FOREIGN KEY (`RID`) REFERENCES `react` (`RID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`UID`) REFERENCES `user` (`UID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`UID`) REFERENCES `user` (`UID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `react`
--
ALTER TABLE `react`
  ADD CONSTRAINT `react_ibfk_1` FOREIGN KEY (`UID`) REFERENCES `user` (`UID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
