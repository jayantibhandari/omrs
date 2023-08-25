-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2021 at 07:17 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `omrsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` varchar(200) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Admin', 'admin', 777112200, 'admin@gmail.com', 'f962f8b8a7f6485a38b654d639a2bfc7', '2020-04-28 05:26:03');

-- --------------------------------------------------------

--
-- Table structure for table `tblregistration`
--

CREATE TABLE `tblregistration` (
  `ID` int(10) NOT NULL,
  `RegistrationNumber` varchar(100) DEFAULT NULL,
  `UserID` int(10) DEFAULT NULL,
  `DateofMarriage` varchar(200) NOT NULL,
  `HusbandName` varchar(200) DEFAULT NULL,
  `HusImage` varchar(200) NOT NULL,
  `HusbandReligion` varchar(50) DEFAULT NULL,
  `Husbanddob` varchar(200) DEFAULT NULL,
  `HusbandSBM` varchar(50) DEFAULT NULL,
  `HusbandAdd` mediumtext DEFAULT NULL,
  `HusbandZipcode` int(10) DEFAULT NULL,
  `HusbandState` varchar(200) DEFAULT NULL,
  `HusbandAdharno` varchar(200) DEFAULT NULL,
  `WifeName` varchar(200) DEFAULT NULL,
  `WifeImage` varchar(200) NOT NULL,
  `WifeReligion` varchar(200) DEFAULT NULL,
  `Wifedob` varchar(200) DEFAULT NULL,
  `WifeSBM` varchar(50) DEFAULT NULL,
  `WifeAdd` mediumtext DEFAULT NULL,
  `WifeZipcode` int(10) DEFAULT NULL,
  `WifeState` varchar(200) DEFAULT NULL,
  `WifeAdharNo` varchar(200) DEFAULT NULL,
  `WitnessNamefirst` varchar(200) DEFAULT NULL,
  `WitnessAddressFirst` mediumtext DEFAULT NULL,
  `WitnessNamesec` varchar(200) DEFAULT NULL,
  `WitnessAddresssec` mediumtext DEFAULT NULL,
  `WitnessNamethird` varchar(200) DEFAULT NULL,
  `WitnessAddressthird` mediumtext DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` varchar(100) DEFAULT NULL,
  `Remark` varchar(120) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblregistration`
--

INSERT INTO `tblregistration` (`ID`, `RegistrationNumber`, `UserID`, `DateofMarriage`, `HusbandName`, `HusImage`, `HusbandReligion`, `Husbanddob`, `HusbandSBM`, `HusbandAdd`, `HusbandZipcode`, `HusbandState`, `HusbandAdharno`, `WifeName`, `WifeImage`, `WifeReligion`, `Wifedob`, `WifeSBM`, `WifeAdd`, `WifeZipcode`, `WifeState`, `WifeAdharNo`, `WitnessNamefirst`, `WitnessAddressFirst`, `WitnessNamesec`, `WitnessAddresssec`, `WitnessNamethird`, `WitnessAddressthird`, `RegDate`, `Status`, `Remark`, `UpdationDate`) VALUES
(1, '483974079', 1, '11/06/2021', 'kamal Silva', 'b9fb9d37bdf15a699bc071ce49baea531588155948.jpg', 'Buddhist', '04/21/1991', 'Bachelor', '38 Jampettah Street, 13,   Colombo', 110096, 'Western', '454477546654', 'Neelam Kumari', '1e6ae4ada992769567b71815f124fac51588155948.jpg', 'Catholic', '04/28/1992', 'Bachelor', '11 A, Circular Road,Mount Lavinia', 110096, 'Western', '256565656565', 'Anura Siripala', '401 1/1 Galle Road, Colombo', 'Upul Siriwardhana', '4/2 Cambridge Place, Kandy', 'Damitha Senanayaka', '72 Armour Street,Mathara', '2021-11-07 16:41:00', 'Verified', 'Your Application has been verified', '2021-11-08 16:57:21'),
(2, '782520546', 1, '10/07/2021', 'Sunil Perera', '', 'Catholic', '04/01/1995', 'Bachelor', '28, Lane one,Kandewatte', 113213, 'Western', '321545445645', 'rewr', '', 'Buddhist', '04/01/1996', 'Bachelor', '61 A, Nawala Road,  Nugegoda', 313132, 'Western', '464445', 'Saranga Fernando', '15 Cinsapa Road,Kandy', 'Saman Ekanayaka', '566 Maradana Road,Colombo', 'Viraj Siriwardana', '103, Heenatikumbura,Kurunagala', '2021-11-08 16:46:02', 'Rejected', 'rejected', '2021-11-08 12:24:41'),
(3, '290346708', 1, '07/06/2021', 'Nimal Fernando', 'b9fb9d37bdf15a699bc071ce49baea531588155948.jpg', 'Buddhist', '04/08/1991', 'Divorsee', ' B11,Halmillawewa,Kurunegala', 221001, 'North Western', '765478977979', 'Gayatri', '1e6ae4ada992769567b71815f124fac51588155948.jpg', 'Buddhist', '05/02/1993', 'Bachelor', '245/29,Ampitiya road, Kandy', 221001, 'Central', '798764987978', 'Kusal Somapala', '27 Old Moor Street, Bandarawela', 'Damith Silva ', '1A Daisy Villa Avenue,Gampaha', 'Nadeeka Perera', 'No. 427/1, Sooriyagoda,Ampara', '2021-11-08 16:45:58', NULL, NULL, '2021-11-08 10:26:55'),
(4, '535376446', 1, '09/04/2021', 'Amal Gunapala', 'b9fb9d37bdf15a699bc071ce49baea531588156505.jpg', 'Buddhist', '03/01/1989', 'Bachelor', 'B15,main street,Badulla', 110097, 'Uva', '656465464654', 'Rakhi Ojha', '1e6ae4ada992769567b71815f124fac51588156505.jpg', 'Buddhist', '02/09/1992', 'Bachelor', ' 271 Old Moor Street,Badulla', 110097, 'Uva', '148974497898', 'Kamala Perera', '490/4 Havelock Road,KUrunagala', 'Praneetha Silva', ' 223 Dam Street,Ampara', 'Sapumal Edirisinghe', '98, Sri Sangaraja Mawatha,Balangoda', '2021-07-15 16:45:54', NULL, NULL, '2021-11-08 17:01:02'),
(5, '575693756', 2, '08/06/2021', 'Vimal Ekanayaka', '7fdc1a630c238af0815181f9faa190f51588416555.jpg', 'Catholic', '01/22/1990', 'Bachelor', 'B27,Siyambalewa,Jaffna', 110001, 'Northern ', '123654788544', 'Garima Singh', '993aae75fc102f0885f6c2b6b5db93bd1588416555.jpg', 'Catholic', '08/19/1992', 'Bachelor', '139 Sea Street,Galle', 110096, 'South', '101121454545', 'Asanka Gunathilaka', '28 Grandpass Road,Colombo', 'Vimala Bandara', ' 60 Vajira Road,Mathara', 'Kumudu Bandara', '77 Rosmead Place,Colombo', '2021-10-08 16:45:49', 'Verified', 'Marriage Registered', '2021-11-08 16:59:07'),
(6, '400267756', 8, '11/08/2021', 'Sachin Perera', '75be1e920da4e11c234a5592543bf2d11636392876.jpg', 'Buddhist', '1995/10/10', 'Bachelor', 'Sachin Gedara', 101010, 'Western', '010101', 'Vimala Silva', 'efb174732a806f283698f9a9cb5d44c31636392876.jpg', 'Buddhist', '1998/09/08', 'Bachelor', 'Vimala Gedara', 121212, 'South', '121212', 'Kamal Siriwardana', 'Kamal gedara', 'Sunil Ekanayaka', 'Sunil Gedara', 'Amal Perera', 'Amal Gedara', '2021-11-08 17:35:29', 'Verified', 'Verified Successfully!', '2021-11-08 17:35:29');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `ID` int(10) NOT NULL,
  `FirstName` varchar(150) DEFAULT NULL,
  `LastName` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Address` mediumtext DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`ID`, `FirstName`, `LastName`, `MobileNumber`, `Address`, `Password`, `RegDate`) VALUES
(1, 'Kamal', 'Silva', 777112233, 'Gampaha, Colombo', '202cb962ac59075b964b07152d2e7b', '2020-04-28 06:12:34'),
(2, 'Nimal', 'Perera', 777112244, 'Ingiriya road, Padukka ', 'f925916e2754e5e03f75dd58a5733251', '2020-05-02 10:46:08'),
(3, 'Saman', 'Fernando', 777112255, 'Bidunuwewa, Bandarawela', 'e10adc3949ba59abbe56e057f20f883e', '2021-11-04 18:13:27'),
(4, 'Sunila', 'Siripala', 771122337, 'Sunilage gedara', 'f962f8b8a7f6485a38b654d639a2bfc7', '2021-11-07 02:16:05'),
(5, 'Sachin', 'Silva', 718261048, 'gedara', 'f962f8b8a7f6485a38b654d639a2bfc7', '2021-11-07 03:42:36'),
(6, 'Sachin', 'Perera', 77112244, 'Gedara', '849153a1b287b22bf64170d267c2d85b', '2021-11-08 17:30:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblregistration`
--
ALTER TABLE `tblregistration`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblregistration`
--
ALTER TABLE `tblregistration`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
