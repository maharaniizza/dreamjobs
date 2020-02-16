-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 16, 2020 at 09:27 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dreamjobs`
--
CREATE DATABASE IF NOT EXISTS `dreamjobs` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `dreamjobs`;

-- --------------------------------------------------------

--
-- Table structure for table `msapplicantstatus`
--

CREATE TABLE `msapplicantstatus` (
  `ApplicantStatusID` int(11) NOT NULL,
  `ApplicantStatusName` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `msapplicantstatus`
--

INSERT INTO `msapplicantstatus` (`ApplicantStatusID`, `ApplicantStatusName`) VALUES
(1, 'On Process'),
(2, 'Accepted'),
(3, 'Rejected'),
(4, 'On Review');

-- --------------------------------------------------------

--
-- Table structure for table `mscompany`
--

CREATE TABLE `mscompany` (
  `CompanyID` varchar(15) NOT NULL,
  `CompanyName` varchar(255) DEFAULT NULL,
  `CompanyDesc` varchar(255) DEFAULT NULL,
  `CompanyType` varchar(255) DEFAULT NULL,
  `CompanySize` varchar(255) DEFAULT NULL,
  `CompanyWebsite` varchar(255) DEFAULT NULL,
  `CompanyEmail` varchar(255) DEFAULT NULL,
  `CompanyPhone` varchar(55) DEFAULT NULL,
  `CompanyFoundYear` year(4) DEFAULT NULL,
  `CompanyHeadLoc` varchar(255) DEFAULT NULL,
  `CreatedDate` date DEFAULT NULL,
  `UpdatedDate` date DEFAULT NULL,
  `CreatedBy` varchar(125) DEFAULT NULL,
  `UpdatedBy` varchar(125) DEFAULT NULL,
  `CompanyImage` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mscompany`
--

INSERT INTO `mscompany` (`CompanyID`, `CompanyName`, `CompanyDesc`, `CompanyType`, `CompanySize`, `CompanyWebsite`, `CompanyEmail`, `CompanyPhone`, `CompanyFoundYear`, `CompanyHeadLoc`, `CreatedDate`, `UpdatedDate`, `CreatedBy`, `UpdatedBy`, `CompanyImage`) VALUES
('COM001', 'Bina Nusantara', 'BINUS UNIVERSITY was originally founded as a short-term computer training institute, Modern Computer Course, on October 21, 1974. It was the start a rapid growth and expansion, blessed with a solid foundation, clear vision, and high dedication.', 'Educational Institution', '<50 Employee', 'http://www.binus.ac.id', 'company@binus,com', '021535066015', 1974, 'Jakarta Barat, DKI Jakarta', '2020-01-01', NULL, 'STF001', NULL, '08a39e33cf2688b23fa40d64da13aefb');

-- --------------------------------------------------------

--
-- Table structure for table `mscompanyadmin`
--

CREATE TABLE `mscompanyadmin` (
  `CompanyAdminId` varchar(15) NOT NULL,
  `UserID` varchar(15) DEFAULT NULL,
  `CompanyID` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mscompanyadmin`
--

INSERT INTO `mscompanyadmin` (`CompanyAdminId`, `UserID`, `CompanyID`) VALUES
('STF000', 'USR000', 'COM001'),
('STF001', 'USR005', 'COM001');

-- --------------------------------------------------------

--
-- Table structure for table `mseducationtype`
--

CREATE TABLE `mseducationtype` (
  `EducationTypeID` int(11) NOT NULL,
  `EducationTypeName` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mseducationtype`
--

INSERT INTO `mseducationtype` (`EducationTypeID`, `EducationTypeName`) VALUES
(1, 'SMA'),
(2, 'S1'),
(3, 'S2'),
(4, 'S3');

-- --------------------------------------------------------

--
-- Table structure for table `msposition`
--

CREATE TABLE `msposition` (
  `PositionID` varchar(15) NOT NULL,
  `PositionName` varchar(255) DEFAULT NULL,
  `CreatedDate` date DEFAULT NULL,
  `UpdatedDate` date DEFAULT NULL,
  `CreatedBy` varchar(125) DEFAULT NULL,
  `UpdatedBy` varchar(125) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `msposition`
--

INSERT INTO `msposition` (`PositionID`, `PositionName`, `CreatedDate`, `UpdatedDate`, `CreatedBy`, `UpdatedBy`) VALUES
('POS001', 'Junior Programmer', '2020-01-02', NULL, 'USR000', NULL),
('POS002', 'Junior Analyst', '2020-02-02', NULL, 'USR000', NULL),
('POS003', 'System Security', '2020-02-09', NULL, NULL, NULL),
('POS004', 'Graphic Designer', '2020-01-08', '2020-01-09', 'USR000', 'USR000'),
('POS005', 'Business Intelligence Officer', '2020-01-10', NULL, 'USR000', NULL),
('POS006', 'Warehouse Manager', '2020-01-12', NULL, 'USR000', NULL),
('POS007', 'Retail Human Capital Operation Supervisor', '2020-01-14', NULL, 'USR000', NULL),
('POS008', 'Senior Technical Consultant', '2020-01-16', '2020-01-17', 'USR000', 'USR000'),
('POS009', 'Data Scientist', '2020-01-18', NULL, 'USR000', NULL),
('POS010', 'Architect', '2020-01-20', NULL, 'USR002', NULL),
('POS011', 'Project Engineer ', '2020-01-22', NULL, 'USR000', NULL),
('POS012', 'Planning Production Inventory Control', '2020-01-24', '2020-01-25', 'USR000', 'USR000'),
('POS013', 'Logistic Staff', '2020-01-26', NULL, 'USR000', NULL),
('POS014', 'Teller', '2020-01-28', NULL, 'USR000', NULL),
('POS015', 'Secretary', '2020-01-30', NULL, 'USR000', NULL),
('POS016', 'Android Developer', '2020-02-02', '2020-02-03', 'USR000', 'USR000'),
('POS017', 'Senior Software Engineer', '2020-02-04', NULL, 'USR000', NULL),
('POS018', 'Art Director', '2020-02-06', NULL, 'USR000', NULL),
('POS019', 'IT Developer', '2020-01-01', NULL, 'USR000', NULL),
('POS020', 'Freelance Designer', '2020-01-03', '2020-01-04', 'USR000', 'USR000'),
('POS021', 'Accountant', '2020-01-06', NULL, 'USR000', NULL),
('POS022', 'Manager HRD', '2020-02-10', NULL, 'USR000', NULL),
('POS023', 'Office Boy', '2020-02-11', NULL, 'USR000', NULL),
('POS024', 'Office girl', '2020-02-12', NULL, 'USR000', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `msrole`
--

CREATE TABLE `msrole` (
  `RoleID` int(11) NOT NULL,
  `RoleName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `msrole`
--

INSERT INTO `msrole` (`RoleID`, `RoleName`) VALUES
(1, 'Applicant'),
(2, 'CompanyUser'),
(3, 'CompanyAdmin');

-- --------------------------------------------------------

--
-- Table structure for table `mssalaryrange`
--

CREATE TABLE `mssalaryrange` (
  `SalaryRangeId` int(11) NOT NULL,
  `SalaryRange` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mssalaryrange`
--

INSERT INTO `mssalaryrange` (`SalaryRangeId`, `SalaryRange`) VALUES
(1, '<500.000'),
(2, '500.000-1.000.000'),
(3, '1.000.000-5.000.000'),
(4, '5.000.000-10.000.000'),
(5, '10.000.000-15.000.000');

-- --------------------------------------------------------

--
-- Table structure for table `msskill`
--

CREATE TABLE `msskill` (
  `SkillID` varchar(15) NOT NULL,
  `SkillName` varchar(255) DEFAULT NULL,
  `SkillDesc` varchar(255) DEFAULT NULL,
  `CreatedDate` date DEFAULT NULL,
  `UpdatedDate` date DEFAULT NULL,
  `CreatedBy` varchar(125) DEFAULT NULL,
  `UpdatedBy` varchar(125) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `msskill`
--

INSERT INTO `msskill` (`SkillID`, `SkillName`, `SkillDesc`, `CreatedDate`, `UpdatedDate`, `CreatedBy`, `UpdatedBy`) VALUES
('JBS001', 'Microsoft SQL Lite', 'test', '2020-02-07', '2020-02-07', 'USR000', 'USR000'),
('JBS002', 'Java Programming', 'Programming', '2020-01-02', '2020-01-03', 'USR000', 'USR000'),
('JBS003', 'HTML Programming', 'Programming', '2020-01-03', '2020-01-04', 'USR000', 'USR000'),
('JBS004', 'Framework CSS dan JavaScript', 'Programming', '2020-01-04', '2020-01-05', 'USR000', 'USR000'),
('JBS005', 'PHP Programming', 'Programming', '2020-01-05', '2020-01-06', 'USR000', 'USR000'),
('JBS006', 'C Programming', 'Programming', '2020-01-06', '2020-01-07', 'USR000', 'USR000'),
('JBS007', 'Pascal Programming', 'Programming', '2020-01-07', '2020-01-08', 'USR000', 'USR000'),
('JBS008', 'Visual Basic', 'Programming', '2020-01-08', '2020-01-09', 'USR000', 'USR000'),
('JBS009', 'Adobe Photoshop', 'Photo editing software', '2020-01-09', '2020-01-10', 'USR000', 'USR000'),
('JBS010', 'Microsoft Excel', 'An electronic spreadsheet program used for storing, organizing, and manipulating data', '2020-01-10', '2020-01-11', 'USR000', 'USR000'),
('JBS011', 'Microsoft Word', 'Word Processor', '2020-01-11', '2020-01-12', 'USR000', 'USR000'),
('JBS012', 'Ruby Programming', 'Programming', '2020-01-12', '2020-01-13', 'USR000', 'USR000'),
('JBS013', 'Ada Programming', 'Programming', '2020-01-13', '2020-01-14', 'USR000', 'USR000'),
('JBS014', 'ASP .NET', 'Programming', '2020-01-14', '2020-01-15', 'USR000', 'USR000'),
('JBS015', 'R Programming', 'Statistical Computing', '2020-01-15', '2020-01-16', 'USR000', 'USR000'),
('JBS016', 'Microsoft Power Point', 'Presentation Program', '2020-01-16', '2020-01-17', 'USR000', 'USR000'),
('JBS017', 'Python Programming', 'Programming', '2020-01-17', '2020-01-18', 'USR000', 'USR000'),
('JBS018', 'Corel Draw', 'Vector Graphics Editor ', '2020-01-18', '2020-01-19', 'USR000', 'USR000'),
('JBS019', 'Macromedia Flash', 'Create vector drawings or animated images', '2020-01-19', '2020-01-20', 'USR000', 'USR000'),
('JBS020', 'COBOL Programming', 'Programming', '2020-01-20', '2020-01-21', 'USR000', 'USR000'),
('JBS021', 'SAS', 'Statistical Software', '2020-01-21', '2020-01-22', 'USR000', 'USR000'),
('JBS022', 'Oracle Application Express', 'Web application for the Oracle Database', '2020-01-22', '2020-01-23', 'USR000', 'USR000'),
('JBS023', 'Android Studio', 'Android development software', '2020-01-23', '2020-01-24', 'USR000', 'USR000'),
('JBS024', 'Tableau Software', 'Interactive data visualization software', '2020-01-24', '2020-01-25', 'USR000', 'USR000'),
('JBS025', 'Linux OS', 'understand to using all command and tool on linux os', '2020-02-09', '2020-02-27', 'USR000', 'USR000'),
('JBS026', 'Wireshark ', 'understand to use wireshark', '2020-02-22', '2020-02-29', 'USR001', 'USR002');

-- --------------------------------------------------------

--
-- Table structure for table `msstep`
--

CREATE TABLE `msstep` (
  `StepID` int(11) NOT NULL,
  `StepName` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `msstep`
--

INSERT INTO `msstep` (`StepID`, `StepName`) VALUES
(1, 'Screening Test'),
(2, 'Psikotest'),
(3, 'Interview'),
(4, 'Announcement');

-- --------------------------------------------------------

--
-- Table structure for table `msuser`
--

CREATE TABLE `msuser` (
  `UserID` varchar(15) NOT NULL,
  `RoleID` int(11) DEFAULT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) NOT NULL,
  `UserEmail` varchar(255) DEFAULT NULL,
  `UserPassword` varchar(255) DEFAULT NULL,
  `LastLogin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `msuser`
--

INSERT INTO `msuser` (`UserID`, `RoleID`, `FirstName`, `LastName`, `UserEmail`, `UserPassword`, `LastLogin`) VALUES
('USR000', 3, 'admin', 'company', 'admin@company.com', '$2y$10$icLoWQxXT0Q3nvdWnwD5uufy6.3M9JcpGCCo73NB9G6U6YjrHAA36', '2020-02-13'),
('USR001', 1, 'Marcelina', 'Prayangga', 'aa@gmail.com', '$2y$10$1N/BoWBqmf/ZwpwO3NeCuujhGP431n4LsaoUlM4h1ezhS8Kzg2U/y', '2020-02-11'),
('USR002', 1, 'boy', 'sugi', 'boy@gmail.com', '$2y$10$mn1OSwhGGbYpzh54YfA8OudMgYtUtZOtxJVrgx4HfC1Y7rNknVtOe', '2020-02-12'),
('USR003', 1, 'Maharani', 'Izza', 'maharani@gmail.com', '$2y$10$79DU2Aihvz8QoAW2IyWBUujA6XGi36bIV9dJx6cS7mf5i60Kt/HHG', '2020-02-12'),
('USR004', 1, 'Sheila', 'GracIa', 'sheila@gmail.com', '$2y$10$cfbrslHDZXeBr60uNdDNs.a.NoMDCvIcifqQ5P3GylkU7sq43P4VS', '2020-02-12'),
('USR005', 2, 'john', 'doe', 'john@gmail.com', '$2y$10$sGXZrAkC4J9PEfP6PFmpG.NJinZ9vRY0KL02hoh1GZffPR1UOcc7K', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `msvacancystatus`
--

CREATE TABLE `msvacancystatus` (
  `VacancyStatusID` int(11) NOT NULL,
  `VacancyStatusName` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `msvacancystatus`
--

INSERT INTO `msvacancystatus` (`VacancyStatusID`, `VacancyStatusName`) VALUES
(1, 'Open'),
(2, 'Closed');

-- --------------------------------------------------------

--
-- Table structure for table `transactioncode`
--

CREATE TABLE `transactioncode` (
  `TransactionCode` varchar(15) NOT NULL,
  `TransactionName` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactioncode`
--

INSERT INTO `transactioncode` (`TransactionCode`, `TransactionName`) VALUES
('APL', 'Applicant Form'),
('COM', 'Company'),
('JBS', 'Job Skill'),
('POS', 'Position'),
('STF', 'Staff'),
('USR', 'User'),
('VAC', 'Vacant');

-- --------------------------------------------------------

--
-- Table structure for table `trapplicantform`
--

CREATE TABLE `trapplicantform` (
  `ApplicantFormId` varchar(15) NOT NULL,
  `UserID` varchar(15) DEFAULT NULL,
  `ApplicantDOB` date DEFAULT NULL,
  `ApplicantGender` varchar(10) DEFAULT NULL,
  `ApplicantAddress` varchar(255) DEFAULT NULL,
  `ApplicantPhone` varchar(55) DEFAULT NULL,
  `ApplicantIdentityNo` varchar(50) DEFAULT NULL,
  `EducationTypeID` int(11) DEFAULT NULL,
  `LastEducationName` varchar(255) DEFAULT NULL,
  `LastEducationMajor` varchar(255) DEFAULT NULL,
  `SalaryRangeID` int(11) DEFAULT NULL,
  `CreatedDate` date DEFAULT NULL,
  `UpdatedDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trapplicantform`
--

INSERT INTO `trapplicantform` (`ApplicantFormId`, `UserID`, `ApplicantDOB`, `ApplicantGender`, `ApplicantAddress`, `ApplicantPhone`, `ApplicantIdentityNo`, `EducationTypeID`, `LastEducationName`, `LastEducationMajor`, `SalaryRangeID`, `CreatedDate`, `UpdatedDate`) VALUES
('APL001', 'USR001', '2000-03-01', 'Female', 'Jl. U No.5A , Kemanggisan , Jakarta Barat', '085370552443', '2342423423432', 4, 'TRI RATNA', 'SMA', 3, '2020-02-11', '2020-02-11'),
('APL002', 'USR002', '2000-09-03', 'Male', 'Jl. U no.28, Jakarta Barat', '081273738329', '2171109233009003', 4, 'Teknik Informatika Bina Nusantara', 'S1', 4, '2020-02-11', '2020-02-11'),
('APL003', 'USR003', '1999-08-19', 'Female', 'JL 1, Tangerang Selatan ', '087888269149', '9994199318', 4, 'Bina Nusantara', 'S1', 1, '2020-02-12', '2020-02-12'),
('APL004', 'USR004', '2001-01-01', 'Female', 'Jl. ABC no. 1', '082115554006', '3173805992166480', 4, 'SMA X', 'SMA', 3, '2020-02-12', '2020-02-12');

-- --------------------------------------------------------

--
-- Table structure for table `trapplicantskilldetail`
--

CREATE TABLE `trapplicantskilldetail` (
  `SkillID` varchar(15) NOT NULL,
  `ApplicantFormID` varchar(15) NOT NULL,
  `CreatedDate` date DEFAULT NULL,
  `UpdatedDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trapplicantskilldetail`
--

INSERT INTO `trapplicantskilldetail` (`SkillID`, `ApplicantFormID`, `CreatedDate`, `UpdatedDate`) VALUES
('JBS001', 'APL003', '2020-02-12', '2020-02-12'),
('JBS001', 'APL004', '2020-02-12', '2020-02-12'),
('JBS002', 'APL001', '2020-02-11', '2020-02-11'),
('JBS002', 'APL002', '2020-02-11', '2020-02-11'),
('JBS003', 'APL004', '2020-02-12', '2020-02-12'),
('JBS005', 'APL004', '2020-02-12', '2020-02-12'),
('JBS006', 'APL001', '2020-02-11', '2020-02-11'),
('JBS018', 'APL002', '2020-02-11', '2020-02-11'),
('JBS023', 'APL001', '2020-02-11', '2020-02-11'),
('JBS026', 'APL002', '2020-02-11', '2020-02-11');

-- --------------------------------------------------------

--
-- Table structure for table `trpositionskilldetail`
--

CREATE TABLE `trpositionskilldetail` (
  `SkillID` varchar(15) NOT NULL,
  `PositionID` varchar(15) NOT NULL,
  `CreatedDate` date DEFAULT NULL,
  `UpdatedDate` date DEFAULT NULL,
  `CreatedBy` varchar(125) DEFAULT NULL,
  `UpdatedBy` varchar(125) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trpositionskilldetail`
--

INSERT INTO `trpositionskilldetail` (`SkillID`, `PositionID`, `CreatedDate`, `UpdatedDate`, `CreatedBy`, `UpdatedBy`) VALUES
('JBS020', 'POS024', '2020-02-12', NULL, NULL, NULL),
('JBS021', 'POS023', '2020-02-11', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trvacancy`
--

CREATE TABLE `trvacancy` (
  `VacancyID` varchar(15) NOT NULL,
  `VacancyTitle` varchar(50) NOT NULL,
  `CompanyID` varchar(15) DEFAULT NULL,
  `PositionID` varchar(15) DEFAULT NULL,
  `VacancyStatusId` int(11) DEFAULT NULL,
  `SalaryRangeID` int(11) DEFAULT NULL,
  `EducationTypeID` int(11) DEFAULT NULL,
  `VacancyLocation` varchar(255) DEFAULT NULL,
  `CreatedDate` date DEFAULT NULL,
  `UpdatedDate` date DEFAULT NULL,
  `CreatedBy` varchar(125) DEFAULT NULL,
  `UpdatedBy` varchar(125) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trvacancy`
--

INSERT INTO `trvacancy` (`VacancyID`, `VacancyTitle`, `CompanyID`, `PositionID`, `VacancyStatusId`, `SalaryRangeID`, `EducationTypeID`, `VacancyLocation`, `CreatedDate`, `UpdatedDate`, `CreatedBy`, `UpdatedBy`) VALUES
('VAC000', 'System Security Bimay', 'COM001', 'POS003', 2, 4, 2, 'Jakarta', '2020-02-11', NULL, 'USR000', NULL),
('VAC001', 'Bimay developer', 'COM001', 'POS001', 1, 3, 1, 'Jakarta', '2020-02-12', NULL, 'USR000', NULL),
('VAC002', 'Testing', 'COM001', 'POS004', 1, 1, 2, 'jl. U no 32, jakarta', '2020-02-12', NULL, 'USR000', NULL),
('VAC003', 'Testing 2', 'COM001', 'POS001', 1, 1, 1, 'Jl. U no 19, jakarta', '2020-02-12', NULL, 'USR000', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trvacancydetail`
--

CREATE TABLE `trvacancydetail` (
  `ApplicantFormID` varchar(15) NOT NULL,
  `StepID` int(11) NOT NULL,
  `ApplicantStatusID` int(11) DEFAULT NULL,
  `VacancyID` varchar(15) NOT NULL,
  `FlagStatus` varchar(255) DEFAULT NULL,
  `CreatedDate` date DEFAULT NULL,
  `UpdatedDate` date DEFAULT NULL,
  `CreatedBy` varchar(125) DEFAULT NULL,
  `UpdatedBy` varchar(125) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trvacancydetail`
--

INSERT INTO `trvacancydetail` (`ApplicantFormID`, `StepID`, `ApplicantStatusID`, `VacancyID`, `FlagStatus`, `CreatedDate`, `UpdatedDate`, `CreatedBy`, `UpdatedBy`) VALUES
('APL001', 1, 2, 'VAC000', NULL, '2020-02-11', NULL, NULL, NULL),
('APL001', 2, 2, 'VAC000', NULL, '2020-02-11', NULL, NULL, NULL),
('APL001', 3, 2, 'VAC000', NULL, '2020-02-11', NULL, NULL, NULL),
('APL001', 4, 2, 'VAC000', NULL, '2020-02-11', NULL, NULL, NULL),
('APL002', 1, 3, 'VAC002', NULL, '2020-02-12', NULL, NULL, NULL),
('APL003', 1, 4, 'VAC001', NULL, '2020-02-12', NULL, NULL, NULL),
('APL003', 1, 2, 'VAC002', NULL, '2020-02-12', NULL, NULL, NULL),
('APL003', 1, 4, 'VAC003', NULL, '2020-02-12', NULL, NULL, NULL),
('APL003', 2, 1, 'VAC001', NULL, '2020-02-12', NULL, NULL, NULL),
('APL003', 2, 4, 'VAC002', NULL, '2020-02-12', NULL, NULL, NULL),
('APL003', 2, 1, 'VAC003', NULL, '2020-02-12', NULL, NULL, NULL),
('APL003', 3, 1, 'VAC001', NULL, '2020-02-12', NULL, NULL, NULL),
('APL003', 3, 1, 'VAC002', NULL, '2020-02-12', NULL, NULL, NULL),
('APL003', 3, 1, 'VAC003', NULL, '2020-02-12', NULL, NULL, NULL),
('APL003', 4, 1, 'VAC001', NULL, '2020-02-12', NULL, NULL, NULL),
('APL003', 4, 1, 'VAC002', NULL, '2020-02-12', NULL, NULL, NULL),
('APL003', 4, 1, 'VAC003', NULL, '2020-02-12', NULL, NULL, NULL),
('APL004', 1, 4, 'VAC001', NULL, '2020-02-12', NULL, NULL, NULL),
('APL004', 1, 4, 'VAC002', NULL, '2020-02-12', NULL, NULL, NULL),
('APL004', 2, 1, 'VAC001', NULL, '2020-02-12', NULL, NULL, NULL),
('APL004', 2, 1, 'VAC002', NULL, '2020-02-12', NULL, NULL, NULL),
('APL004', 3, 1, 'VAC001', NULL, '2020-02-12', NULL, NULL, NULL),
('APL004', 3, 1, 'VAC002', NULL, '2020-02-12', NULL, NULL, NULL),
('APL004', 4, 1, 'VAC001', NULL, '2020-02-12', NULL, NULL, NULL),
('APL004', 4, 1, 'VAC002', NULL, '2020-02-12', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trvacancydetailtemp`
--

CREATE TABLE `trvacancydetailtemp` (
  `ApplicantFormID` varchar(15) NOT NULL,
  `StepID` int(11) NOT NULL,
  `ApplicantStatusID` int(11) NOT NULL,
  `VacancyID` varchar(15) NOT NULL,
  `FlagStatus` varchar(255) DEFAULT NULL,
  `CreatedDate` date DEFAULT NULL,
  `UpdatedDate` date DEFAULT NULL,
  `CreatedBy` varchar(125) DEFAULT NULL,
  `UpdatedBy` varchar(125) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `trvacancysteptime`
--

CREATE TABLE `trvacancysteptime` (
  `VacancyID` varchar(15) NOT NULL,
  `StepID` int(11) NOT NULL,
  `Time` date DEFAULT NULL,
  `StepStatus` varchar(50) NOT NULL,
  `CreatedDate` date DEFAULT NULL,
  `UpdatedDate` date DEFAULT NULL,
  `CreatedBy` varchar(125) DEFAULT NULL,
  `UpdatedBy` varchar(125) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trvacancysteptime`
--

INSERT INTO `trvacancysteptime` (`VacancyID`, `StepID`, `Time`, `StepStatus`, `CreatedDate`, `UpdatedDate`, `CreatedBy`, `UpdatedBy`) VALUES
('VAC000', 1, '2020-02-11', 'Confirmed', '0000-00-00', NULL, 'USR000', NULL),
('VAC000', 2, '2020-02-11', 'Confirmed', '0000-00-00', NULL, 'USR000', NULL),
('VAC000', 3, '2020-02-11', 'Confirmed', '0000-00-00', NULL, 'USR000', NULL),
('VAC000', 4, '2020-02-11', 'Confirmed', '0000-00-00', NULL, 'USR000', NULL),
('VAC001', 1, '2020-02-12', 'On Review', '2020-02-12', NULL, 'USR000', NULL),
('VAC001', 2, '2020-02-12', 'Coming', '2020-02-12', NULL, 'USR000', NULL),
('VAC001', 3, '2020-02-12', 'Coming', '2020-02-12', NULL, 'USR000', NULL),
('VAC001', 4, '2020-02-12', 'Coming', '2020-02-12', NULL, 'USR000', NULL),
('VAC002', 1, '2020-02-12', 'Confirmed', '2020-02-12', NULL, 'USR000', NULL),
('VAC002', 2, '2020-02-12', 'On Review', '2020-02-12', NULL, 'USR000', NULL),
('VAC002', 3, '2020-02-12', 'Coming', '2020-02-12', NULL, 'USR000', NULL),
('VAC002', 4, '2020-02-13', 'Coming', '2020-02-12', NULL, 'USR000', NULL),
('VAC003', 1, '2020-02-12', 'On Review', '2020-02-12', NULL, 'USR000', NULL),
('VAC003', 2, '2020-02-12', 'Coming', '2020-02-12', NULL, 'USR000', NULL),
('VAC003', 3, '2020-02-12', 'Coming', '2020-02-12', NULL, 'USR000', NULL),
('VAC003', 4, '2020-02-13', 'Coming', '2020-02-12', NULL, 'USR000', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trworkexperience`
--

CREATE TABLE `trworkexperience` (
  `RecID` int(11) NOT NULL,
  `ApplicantFormID` varchar(15) DEFAULT NULL,
  `CompanyName` varchar(255) DEFAULT NULL,
  `WorkPeriod` varchar(50) DEFAULT NULL,
  `LastPosition` varchar(255) DEFAULT NULL,
  `LastSalary` varchar(255) DEFAULT NULL,
  `CreatedDate` date DEFAULT NULL,
  `UpdatedDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trworkexperience`
--

INSERT INTO `trworkexperience` (`RecID`, `ApplicantFormID`, `CompanyName`, `WorkPeriod`, `LastPosition`, `LastSalary`, `CreatedDate`, `UpdatedDate`) VALUES
(45, 'APL001', 'E-Sport', '1 Jan 2019-31 Apr 2020', 'Manajer', '500.000-1000.000', '2020-02-11', '2020-02-11'),
(46, 'APL002', 'Bina Nusantara', '1 Jan 2017-31 Apr 2020', 'Manager', '5000.000-10.000.000', '2020-02-11', '2020-02-11'),
(47, 'APL003', 'BINUS', '1 Jan 2020-31 Jan 2020', 'PRrograammer', 'less than 500.000', '2020-02-12', '2020-02-12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `msapplicantstatus`
--
ALTER TABLE `msapplicantstatus`
  ADD PRIMARY KEY (`ApplicantStatusID`);

--
-- Indexes for table `mscompany`
--
ALTER TABLE `mscompany`
  ADD PRIMARY KEY (`CompanyID`);

--
-- Indexes for table `mscompanyadmin`
--
ALTER TABLE `mscompanyadmin`
  ADD PRIMARY KEY (`CompanyAdminId`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `CompanyID` (`CompanyID`);

--
-- Indexes for table `mseducationtype`
--
ALTER TABLE `mseducationtype`
  ADD PRIMARY KEY (`EducationTypeID`);

--
-- Indexes for table `msposition`
--
ALTER TABLE `msposition`
  ADD PRIMARY KEY (`PositionID`);

--
-- Indexes for table `msrole`
--
ALTER TABLE `msrole`
  ADD PRIMARY KEY (`RoleID`);

--
-- Indexes for table `mssalaryrange`
--
ALTER TABLE `mssalaryrange`
  ADD PRIMARY KEY (`SalaryRangeId`);

--
-- Indexes for table `msskill`
--
ALTER TABLE `msskill`
  ADD PRIMARY KEY (`SkillID`);

--
-- Indexes for table `msstep`
--
ALTER TABLE `msstep`
  ADD PRIMARY KEY (`StepID`);

--
-- Indexes for table `msuser`
--
ALTER TABLE `msuser`
  ADD PRIMARY KEY (`UserID`),
  ADD KEY `RoleID` (`RoleID`);

--
-- Indexes for table `msvacancystatus`
--
ALTER TABLE `msvacancystatus`
  ADD PRIMARY KEY (`VacancyStatusID`);

--
-- Indexes for table `transactioncode`
--
ALTER TABLE `transactioncode`
  ADD PRIMARY KEY (`TransactionCode`);

--
-- Indexes for table `trapplicantform`
--
ALTER TABLE `trapplicantform`
  ADD PRIMARY KEY (`ApplicantFormId`),
  ADD KEY `UserIDID` (`UserID`),
  ADD KEY `EducationTypeID` (`EducationTypeID`),
  ADD KEY `SalaryRangeID` (`SalaryRangeID`);

--
-- Indexes for table `trapplicantskilldetail`
--
ALTER TABLE `trapplicantskilldetail`
  ADD PRIMARY KEY (`SkillID`,`ApplicantFormID`),
  ADD KEY `ApplicantFormID` (`ApplicantFormID`),
  ADD KEY `SkillID` (`SkillID`);

--
-- Indexes for table `trpositionskilldetail`
--
ALTER TABLE `trpositionskilldetail`
  ADD PRIMARY KEY (`SkillID`,`PositionID`),
  ADD KEY `PositionIDID` (`PositionID`);

--
-- Indexes for table `trvacancy`
--
ALTER TABLE `trvacancy`
  ADD PRIMARY KEY (`VacancyID`),
  ADD KEY `CompanyID_` (`CompanyID`),
  ADD KEY `PositionID_` (`PositionID`),
  ADD KEY `VacancyStatusID` (`VacancyStatusId`),
  ADD KEY `SalaryID` (`SalaryRangeID`),
  ADD KEY `EducationID` (`EducationTypeID`);

--
-- Indexes for table `trvacancydetail`
--
ALTER TABLE `trvacancydetail`
  ADD PRIMARY KEY (`ApplicantFormID`,`StepID`,`VacancyID`),
  ADD KEY `ApplicantStatusID` (`ApplicantStatusID`),
  ADD KEY `StepID` (`StepID`),
  ADD KEY `VacancyID` (`VacancyID`);

--
-- Indexes for table `trvacancydetailtemp`
--
ALTER TABLE `trvacancydetailtemp`
  ADD PRIMARY KEY (`ApplicantFormID`,`StepID`,`ApplicantStatusID`,`VacancyID`);

--
-- Indexes for table `trvacancysteptime`
--
ALTER TABLE `trvacancysteptime`
  ADD PRIMARY KEY (`VacancyID`,`StepID`),
  ADD KEY `StepID_` (`StepID`);

--
-- Indexes for table `trworkexperience`
--
ALTER TABLE `trworkexperience`
  ADD PRIMARY KEY (`RecID`),
  ADD KEY `ApplicantID` (`ApplicantFormID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `msapplicantstatus`
--
ALTER TABLE `msapplicantstatus`
  MODIFY `ApplicantStatusID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mseducationtype`
--
ALTER TABLE `mseducationtype`
  MODIFY `EducationTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `msrole`
--
ALTER TABLE `msrole`
  MODIFY `RoleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mssalaryrange`
--
ALTER TABLE `mssalaryrange`
  MODIFY `SalaryRangeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `msstep`
--
ALTER TABLE `msstep`
  MODIFY `StepID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `msvacancystatus`
--
ALTER TABLE `msvacancystatus`
  MODIFY `VacancyStatusID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `trworkexperience`
--
ALTER TABLE `trworkexperience`
  MODIFY `RecID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mscompanyadmin`
--
ALTER TABLE `mscompanyadmin`
  ADD CONSTRAINT `CompanyID` FOREIGN KEY (`CompanyID`) REFERENCES `mscompany` (`CompanyID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `UserID` FOREIGN KEY (`UserID`) REFERENCES `msuser` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `msuser`
--
ALTER TABLE `msuser`
  ADD CONSTRAINT `RoleID` FOREIGN KEY (`RoleID`) REFERENCES `msrole` (`RoleID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trapplicantform`
--
ALTER TABLE `trapplicantform`
  ADD CONSTRAINT `EducationTypeID` FOREIGN KEY (`EducationTypeID`) REFERENCES `mseducationtype` (`EducationTypeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `SalaryRangeID` FOREIGN KEY (`SalaryRangeID`) REFERENCES `mssalaryrange` (`SalaryRangeId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `UserIDID` FOREIGN KEY (`UserID`) REFERENCES `msuser` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trapplicantskilldetail`
--
ALTER TABLE `trapplicantskilldetail`
  ADD CONSTRAINT `ApplicantFormID` FOREIGN KEY (`ApplicantFormID`) REFERENCES `trapplicantform` (`ApplicantFormId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `SkillIDID` FOREIGN KEY (`SkillID`) REFERENCES `msskill` (`SkillID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trpositionskilldetail`
--
ALTER TABLE `trpositionskilldetail`
  ADD CONSTRAINT `PositionIDID` FOREIGN KEY (`PositionID`) REFERENCES `msposition` (`PositionID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `SkillID` FOREIGN KEY (`SkillID`) REFERENCES `msskill` (`SkillID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trvacancy`
--
ALTER TABLE `trvacancy`
  ADD CONSTRAINT `CompanyID_` FOREIGN KEY (`CompanyID`) REFERENCES `mscompany` (`CompanyID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `EducationID` FOREIGN KEY (`EducationTypeID`) REFERENCES `mseducationtype` (`EducationTypeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `PositionID_` FOREIGN KEY (`PositionID`) REFERENCES `msposition` (`PositionID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `SalaryID` FOREIGN KEY (`SalaryRangeID`) REFERENCES `mssalaryrange` (`SalaryRangeId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `VacancyStatusID` FOREIGN KEY (`VacancyStatusId`) REFERENCES `msvacancystatus` (`VacancyStatusID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trvacancydetail`
--
ALTER TABLE `trvacancydetail`
  ADD CONSTRAINT `ApplicantStatusID` FOREIGN KEY (`ApplicantStatusID`) REFERENCES `msapplicantstatus` (`ApplicantStatusID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FormID` FOREIGN KEY (`ApplicantFormID`) REFERENCES `trapplicantform` (`ApplicantFormId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `StepID` FOREIGN KEY (`StepID`) REFERENCES `msstep` (`StepID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `VacancyID` FOREIGN KEY (`VacancyID`) REFERENCES `trvacancy` (`VacancyID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trvacancysteptime`
--
ALTER TABLE `trvacancysteptime`
  ADD CONSTRAINT `StepID_` FOREIGN KEY (`StepID`) REFERENCES `msstep` (`StepID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `VacancyID_` FOREIGN KEY (`VacancyID`) REFERENCES `trvacancy` (`VacancyID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trworkexperience`
--
ALTER TABLE `trworkexperience`
  ADD CONSTRAINT `ApplicantID` FOREIGN KEY (`ApplicantFormID`) REFERENCES `trapplicantform` (`ApplicantFormId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
