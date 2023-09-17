--
-- Database: `salonpramod`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `AdminId` int AUTO_INCREMENT NOT NULL,
  `AdminName` char(50) DEFAULT NULL,
  `UserName` char(50) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY(AdminId) 
)ENGINE=INNODB;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`AdminId`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Admin', 'admin', 7898799798, 'tester1@gmail.com', 'admin@123', '2022-05-25 06:21:50');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `UserID` int AUTO_INCREMENT NOT NULL,
  `FirstName` varchar(120) DEFAULT NULL,
  `LastName` varchar(250) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY(UserID)
)ENGINE=INNODB;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`UserID`, `FirstName`, `LastName`, `MobileNumber`, `Email`, `Password`, `RegDate`) VALUES
(1, 'Khusi', NULL, 8956234569, 'khusi@gmail.com', 'khusi@123', '2021-10-16 14:22:03');

-- --------------------------------------------------------

--
-- Table structure for table `tblbookings`
--

CREATE TABLE `tblbookings` (
  `BookId` int AUTO_INCREMENT NOT NULL,
  `UserID` int(10) DEFAULT NULL,
  `AptDate` date DEFAULT NULL,
  `AptTime` time DEFAULT NULL,
  `Message` varchar(250) DEFAULT NULL,
  `BookingDate` timestamp NULL DEFAULT current_timestamp(),
  `Remark` varchar(250) DEFAULT NULL,
  `Status` varchar(250) DEFAULT NULL,
  `RemarkDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY(BookId),
  FOREIGN KEY (UserID) REFERENCES tbluser(UserID) ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=INNODB;

--
-- Dumping data for table `tblbookings`
--

INSERT INTO `tblbookings` (`BookId`, `UserID`, `AptDate`, `AptTime`, `Message`, `BookingDate`, `Remark`, `Status`, `RemarkDate`) VALUES
(1, 1, '2022-05-12', '19:03:00', 'Test msg', '2022-05-12 18:30:00', 'Your appointment has been book.', 'Selected', '2022-05-13 06:11:41');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontact`
--

CREATE TABLE `tblcontact` (
  `ID` int AUTO_INCREMENT NOT NULL,
  `FirstName` varchar(200) DEFAULT NULL,
  `LastName` varchar(200) DEFAULT NULL,
  `Phone` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Message` mediumtext DEFAULT NULL,
  `EnquiryDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `IsRead` int(5) DEFAULT NULL,
  PRIMARY KEY(ID)
)ENGINE=INNODB;

--
-- Dumping data for table `tblcontact`
--

INSERT INTO `tblcontact` (`ID`, `FirstName`, `LastName`, `Phone`, `Email`, `Message`, `EnquiryDate`, `IsRead`) VALUES
(1, 'Kajal', 'Sharma', 9879878798, 'kajal@gmail.com', 'guhgjhg', '2022-05-10 08:43:18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblinvoice`
--

CREATE TABLE `tblinvoice` (
  `invoiceId` int AUTO_INCREMENT NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `BookId` int(11) DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY(invoiceId),
  FOREIGN KEY (UserID) REFERENCES tbluser(UserID) ON UPDATE CASCADE ON DELETE CASCADE,
  FOREIGN KEY (BookId) REFERENCES tblbookings(BookId) ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=INNODB;

--
-- Dumping data for table `tblinvoice`
--

INSERT INTO `tblinvoice` (`invoiceId`, `UserID`, `BookId`, `PostingDate`) VALUES
(1, 1, 1,'2022-05-13 11:42:21');


