-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2016 at 03:37 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `musico`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_control_list`
--

CREATE TABLE IF NOT EXISTS `access_control_list` (
`ID` int(11) NOT NULL,
  `module_ID` int(11) NOT NULL,
  `account_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
`ID` int(10) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(70) DEFAULT NULL,
  `account_type_ID` int(10) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1 - active, 2 - draft, 3 - deactivated, 4 -delete'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=303 ;

-- --------------------------------------------------------

--
-- Table structure for table `account_basic_information`
--

CREATE TABLE IF NOT EXISTS `account_basic_information` (
`ID` int(11) NOT NULL,
  `account_ID` int(11) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `middle_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `email_address` varchar(45) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `account_type`
--

CREATE TABLE IF NOT EXISTS `account_type` (
`ID` int(10) NOT NULL,
  `description` varchar(45) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Table structure for table `action_log`
--

CREATE TABLE IF NOT EXISTS `action_log` (
`ID` int(11) NOT NULL,
  `account_ID` int(11) NOT NULL,
  `api_controller_ID` int(11) NOT NULL,
  `access_number_ID` int(11) NOT NULL,
  `detail` text NOT NULL,
  `datetime` double NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=186547 ;

-- --------------------------------------------------------

--
-- Table structure for table `api_controller`
--

CREATE TABLE IF NOT EXISTS `api_controller` (
`ID` int(11) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `file_uploaded`
--

CREATE TABLE IF NOT EXISTS `file_uploaded` (
`ID` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `path` text NOT NULL,
  `size` double NOT NULL,
  `datetime` double NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=306 ;

-- --------------------------------------------------------

--
-- Table structure for table `group_access_control_list`
--

CREATE TABLE IF NOT EXISTS `group_access_control_list` (
`ID` int(11) NOT NULL,
  `module_ID` int(11) NOT NULL,
  `group_ID` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE IF NOT EXISTS `module` (
`ID` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `parent_ID` int(11) NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `module_api_controller`
--

CREATE TABLE IF NOT EXISTS `module_api_controller` (
`ID` int(11) NOT NULL,
  `module_ID` int(11) NOT NULL,
  `api_controller_ID` int(11) NOT NULL,
  `privilege_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='foreign for module' AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_control_list`
--
ALTER TABLE `access_control_list`
 ADD PRIMARY KEY (`ID`), ADD KEY `access_control_list_account_ID` (`account_ID`), ADD KEY `access_control_list_module_ID` (`module_ID`);

--
-- Indexes for table `account`
--
ALTER TABLE `account`
 ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `username` (`username`), ADD KEY `account_account_type_ID_idx` (`account_type_ID`);

--
-- Indexes for table `account_basic_information`
--
ALTER TABLE `account_basic_information`
 ADD PRIMARY KEY (`ID`,`account_ID`), ADD KEY `abiai` (`account_ID`);

--
-- Indexes for table `account_type`
--
ALTER TABLE `account_type`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `action_log`
--
ALTER TABLE `action_log`
 ADD PRIMARY KEY (`ID`), ADD KEY `api_controller_ID` (`api_controller_ID`,`access_number_ID`), ADD KEY `account_ID` (`account_ID`);

--
-- Indexes for table `api_controller`
--
ALTER TABLE `api_controller`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `file_uploaded`
--
ALTER TABLE `file_uploaded`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `group_access_control_list`
--
ALTER TABLE `group_access_control_list`
 ADD PRIMARY KEY (`ID`), ADD KEY `group_access_control_list_module_ID_idx` (`module_ID`), ADD KEY `group_access_control_list_group_ID_idx` (`group_ID`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `module_api_controller`
--
ALTER TABLE `module_api_controller`
 ADD PRIMARY KEY (`ID`), ADD KEY `module_api_controller_module_ID` (`module_ID`), ADD KEY `module_api_controller_api_controller_ID` (`api_controller_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_control_list`
--
ALTER TABLE `access_control_list`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=303;
--
-- AUTO_INCREMENT for table `account_basic_information`
--
ALTER TABLE `account_basic_information`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `account_type`
--
ALTER TABLE `account_type`
MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `action_log`
--
ALTER TABLE `action_log`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=186547;
--
-- AUTO_INCREMENT for table `api_controller`
--
ALTER TABLE `api_controller`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `file_uploaded`
--
ALTER TABLE `file_uploaded`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=306;
--
-- AUTO_INCREMENT for table `group_access_control_list`
--
ALTER TABLE `group_access_control_list`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `module_api_controller`
--
ALTER TABLE `module_api_controller`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `access_control_list`
--
ALTER TABLE `access_control_list`
ADD CONSTRAINT `access_control_list_account_ID` FOREIGN KEY (`account_ID`) REFERENCES `account` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `access_control_list_module_ID` FOREIGN KEY (`module_ID`) REFERENCES `module` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `account`
--
ALTER TABLE `account`
ADD CONSTRAINT `account_at_type_ID` FOREIGN KEY (`account_type_ID`) REFERENCES `account_type` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `account_basic_information`
--
ALTER TABLE `account_basic_information`
ADD CONSTRAINT `acco_basi_info` FOREIGN KEY (`account_ID`) REFERENCES `account` (`ID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `action_log`
--
ALTER TABLE `action_log`
ADD CONSTRAINT `action_log_account_ID` FOREIGN KEY (`ID`) REFERENCES `account` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `group_access_control_list`
--
ALTER TABLE `group_access_control_list`
ADD CONSTRAINT `group_access_control_list_group_ID` FOREIGN KEY (`group_ID`) REFERENCES `account_type` (`ID`) ON DELETE NO ACTION ON UPDATE CASCADE,
ADD CONSTRAINT `group_access_control_list_module_ID` FOREIGN KEY (`module_ID`) REFERENCES `module` (`ID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `module_api_controller`
--
ALTER TABLE `module_api_controller`
ADD CONSTRAINT `module_api_controler_api_controller_ID` FOREIGN KEY (`api_controller_ID`) REFERENCES `api_controller` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `module_api_controller_module_ID` FOREIGN KEY (`module_ID`) REFERENCES `module` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
