-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2023 at 05:52 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `denrticket1`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `compid` int(11) NOT NULL,
  `compname` varchar(50) NOT NULL,
  `compadd` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`compid`, `compname`, `compadd`) VALUES
(1, 'Company A', 'Address A'),
(2, 'Company B', 'Address B');

-- --------------------------------------------------------

--
-- Table structure for table `conversation`
--

CREATE TABLE `conversation` (
  `convoid` int(11) NOT NULL,
  `ticketid` int(11) NOT NULL,
  `convonum` varchar(50) NOT NULL,
  `conSenderID` int(11) NOT NULL,
  `conReceiverID` int(11) NOT NULL,
  `conSub` varchar(50) NOT NULL,
  `conbody` text NOT NULL,
  `condate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `conversation`
--

INSERT INTO `conversation` (`convoid`, `ticketid`, `convonum`, `conSenderID`, `conReceiverID`, `conSub`, `conbody`, `condate`) VALUES
(1, 1, 'CONV001', 2, 1, 'Subject 1', 'Body of conversation 1', '2023-11-25 04:38:30'),
(2, 1, 'CONV002', 2, 1, 'Subject 1 continue', 'Body of conversation 1', '2023-11-25 04:38:30'),
(3, 1, 'CONV003', 2, 1, 'Subject 1 continue', 'Body of conversation 1', '2023-11-25 04:38:30'),
(4, 1, 'CONV004', 2, 1, 'Subject 1 continue', 'Body of conversation 1', '2023-11-25 04:38:30'),
(5, 2, 'CONV005', 3, 1, 'Subject 2', 'Body of conversation 2', '2023-11-25 04:38:30');

-- --------------------------------------------------------

--
-- Table structure for table `conversation_trash`
--

CREATE TABLE `conversation_trash` (
  `convoid` int(11) NOT NULL,
  `ticketid` int(11) NOT NULL,
  `convonum` varchar(50) NOT NULL,
  `conReceiverID` int(11) NOT NULL,
  `conSenderID` int(11) NOT NULL,
  `conSub` varchar(50) NOT NULL,
  `conbody` text NOT NULL,
  `condate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `filelocation`
--

CREATE TABLE `filelocation` (
  `fileid` int(11) NOT NULL,
  `filenum` varchar(50) NOT NULL,
  `filename` varchar(50) NOT NULL,
  `filelink` varchar(250) NOT NULL,
  `convoid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `filelocation`
--

INSERT INTO `filelocation` (`fileid`, `filenum`, `filename`, `filelink`, `convoid`) VALUES
(1, 'FILE001', 'File 1', 'http://example.com/file1', 1),
(2, 'FILE002', 'File 2', 'http://example.com/file2', 2);

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `ticketid` int(11) NOT NULL,
  `ticketnum` varchar(50) NOT NULL,
  `userid` int(11) NOT NULL,
  `compid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`ticketid`, `ticketnum`, `userid`, `compid`) VALUES
(1, 'TICKET001', 2, 1),
(2, 'TICKET002', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `ticketdetails`
--

CREATE TABLE `ticketdetails` (
  `tdid` int(11) NOT NULL,
  `tdticketid` int(11) NOT NULL,
  `tdconvoid` int(11) NOT NULL,
  `tdremarks` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ticketdetails`
--

INSERT INTO `ticketdetails` (`tdid`, `tdticketid`, `tdconvoid`, `tdremarks`) VALUES
(1, 1, 1, 'Details for ticket 1'),
(2, 2, 2, 'Details for ticket 2');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_trash`
--

CREATE TABLE `ticket_trash` (
  `ticketid` int(11) NOT NULL,
  `ticketnum` varchar(50) NOT NULL,
  `userid` int(11) NOT NULL,
  `compid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `uemail` varchar(50) NOT NULL,
  `ufname` varchar(50) NOT NULL,
  `umname` varchar(50) NOT NULL,
  `ulname` varchar(50) NOT NULL,
  `phonenum` varchar(20) DEFAULT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `uemail`, `ufname`, `umname`, `ulname`, `phonenum`, `role`) VALUES
(1, 'billy100007@gmail.com', 'Ranichel Louisville', 'Casipong', 'Rivera', NULL, ''),
(2, 'user1@gmail.com', 'John', 'Doe', 'Smith', '1234567890', 'Admin'),
(3, 'user2@gmail.com', 'Jane', 'Doe', 'Johnson', '0987654321', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `uduserid` int(11) NOT NULL,
  `udcompid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`uduserid`, `udcompid`) VALUES
(2, 1),
(3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_auth`
--

CREATE TABLE `user_auth` (
  `authid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_auth`
--

INSERT INTO `user_auth` (`authid`, `userid`, `username`, `password`, `role`) VALUES
(1, 1, 'billy100007@gmail.com', '$2y$10$pRH7UK1S2dXsiRmITjAJ1OBSdRVlMvkIn4PzABHur3/ozXMga0UIu', 'Guest'),
(2, 2, 'user1@gmail.com', 'hashed_password_1', 'Admin'),
(3, 3, 'user2@gmail.com', 'hashed_password_2', 'Employee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`compid`);

--
-- Indexes for table `conversation`
--
ALTER TABLE `conversation`
  ADD PRIMARY KEY (`convoid`),
  ADD KEY `conSenderID` (`conSenderID`),
  ADD KEY `conReceiverID` (`conReceiverID`),
  ADD KEY `ticketid` (`ticketid`);

--
-- Indexes for table `conversation_trash`
--
ALTER TABLE `conversation_trash`
  ADD PRIMARY KEY (`convoid`),
  ADD KEY `conReceiverID` (`conReceiverID`),
  ADD KEY `conSenderID` (`conSenderID`),
  ADD KEY `ticketid` (`ticketid`);

--
-- Indexes for table `filelocation`
--
ALTER TABLE `filelocation`
  ADD PRIMARY KEY (`fileid`),
  ADD KEY `convoid` (`convoid`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ticketid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `compid` (`compid`);

--
-- Indexes for table `ticketdetails`
--
ALTER TABLE `ticketdetails`
  ADD PRIMARY KEY (`tdid`),
  ADD KEY `tdticketid` (`tdticketid`),
  ADD KEY `tdconvoid` (`tdconvoid`);

--
-- Indexes for table `ticket_trash`
--
ALTER TABLE `ticket_trash`
  ADD PRIMARY KEY (`ticketid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `compid` (`compid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD PRIMARY KEY (`uduserid`,`udcompid`),
  ADD KEY `udcompid` (`udcompid`);

--
-- Indexes for table `user_auth`
--
ALTER TABLE `user_auth`
  ADD PRIMARY KEY (`authid`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `userid` (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `compid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `conversation`
--
ALTER TABLE `conversation`
  MODIFY `convoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `conversation_trash`
--
ALTER TABLE `conversation_trash`
  MODIFY `convoid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `filelocation`
--
ALTER TABLE `filelocation`
  MODIFY `fileid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ticketid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ticketdetails`
--
ALTER TABLE `ticketdetails`
  MODIFY `tdid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ticket_trash`
--
ALTER TABLE `ticket_trash`
  MODIFY `ticketid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_auth`
--
ALTER TABLE `user_auth`
  MODIFY `authid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `conversation`
--
ALTER TABLE `conversation`
  ADD CONSTRAINT `conversation_ibfk_1` FOREIGN KEY (`conSenderID`) REFERENCES `user` (`userid`),
  ADD CONSTRAINT `conversation_ibfk_2` FOREIGN KEY (`conReceiverID`) REFERENCES `user` (`userid`),
  ADD CONSTRAINT `conversation_ibfk_3` FOREIGN KEY (`ticketid`) REFERENCES `ticket` (`ticketid`);

--
-- Constraints for table `conversation_trash`
--
ALTER TABLE `conversation_trash`
  ADD CONSTRAINT `conversation_trash_ibfk_1` FOREIGN KEY (`conReceiverID`) REFERENCES `user` (`userid`),
  ADD CONSTRAINT `conversation_trash_ibfk_2` FOREIGN KEY (`conSenderID`) REFERENCES `user` (`userid`),
  ADD CONSTRAINT `conversation_trash_ibfk_3` FOREIGN KEY (`ticketid`) REFERENCES `ticket_trash` (`ticketid`);

--
-- Constraints for table `filelocation`
--
ALTER TABLE `filelocation`
  ADD CONSTRAINT `filelocation_ibfk_1` FOREIGN KEY (`convoid`) REFERENCES `conversation` (`convoid`);

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`),
  ADD CONSTRAINT `ticket_ibfk_2` FOREIGN KEY (`compid`) REFERENCES `company` (`compid`);

--
-- Constraints for table `ticketdetails`
--
ALTER TABLE `ticketdetails`
  ADD CONSTRAINT `ticketdetails_ibfk_1` FOREIGN KEY (`tdticketid`) REFERENCES `ticket` (`ticketid`),
  ADD CONSTRAINT `ticketdetails_ibfk_2` FOREIGN KEY (`tdconvoid`) REFERENCES `conversation` (`convoid`);

--
-- Constraints for table `ticket_trash`
--
ALTER TABLE `ticket_trash`
  ADD CONSTRAINT `ticket_trash_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`),
  ADD CONSTRAINT `ticket_trash_ibfk_2` FOREIGN KEY (`compid`) REFERENCES `company` (`compid`);

--
-- Constraints for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD CONSTRAINT `userdetails_ibfk_1` FOREIGN KEY (`uduserid`) REFERENCES `user` (`userid`),
  ADD CONSTRAINT `userdetails_ibfk_2` FOREIGN KEY (`udcompid`) REFERENCES `company` (`compid`);

--
-- Constraints for table `user_auth`
--
ALTER TABLE `user_auth`
  ADD CONSTRAINT `user_auth_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
