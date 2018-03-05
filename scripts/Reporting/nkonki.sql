-- phpMyAdmin SQL Dump
-- version 2.11.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 27, 2018 at 02:30 PM
-- Server version: 5.0.45
-- PHP Version: 5.2.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `c1client_cpstechnologies_co_za`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounting_framework`
--

CREATE TABLE `accounting_framework` (
  `id` int(255) NOT NULL auto_increment,
  `name` varchar(255) default NULL,
  `active_status` varchar(22) default '1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `accounting_framework`
--

INSERT INTO `accounting_framework` (`id`, `name`, `active_status`) VALUES
(1, 'IFRS', '1'),
(2, 'IFRS for SMEs', '1'),
(3, 'GRAP', '1'),
(4, 'Medified Cash Basis', '1'),
(5, 'Other', '1');

-- --------------------------------------------------------

--
-- Stand-in structure for view `all clients`
--
CREATE TABLE `all clients` (
`company_name` text
,`relationship_owner` varchar(255)
,`ref` varchar(255)
,`city` varchar(255)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `assurance`
--
CREATE TABLE `assurance` (
`Client_Name` text
,`Group_Structure` varchar(255)
,`Client_CIPC` varchar(255)
,`Companies_Act` varchar(255)
,`IRBA_Code` varchar(255)
,`ISQC_1` varchar(255)
,`ISQC_2` varchar(255)
,`Assurance_Work` varchar(255)
,`Amount_Billed` varchar(255)
,`JSE_Listed` varchar(255)
,`Industry` varchar(255)
,`Period_end_of_AFS` varchar(255)
,`Date_Opinion_was_signed` varchar(255)
,`Partner` varchar(255)
,`Next_IRBA` varchar(255)
,`Accounting_Framework` varchar(255)
,`Client_Turnover` varchar(255)
);
-- --------------------------------------------------------

--
-- Table structure for table `assurance_work`
--

CREATE TABLE `assurance_work` (
  `id` int(255) NOT NULL auto_increment,
  `name` varchar(255) default NULL,
  `active_status` varchar(22) default '1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `assurance_work`
--

INSERT INTO `assurance_work` (`id`, `name`, `active_status`) VALUES
(1, 'AG (CO)', '1'),
(2, 'AG (S4)', '1'),
(3, 'ATA', '1'),
(4, 'CoA', '1'),
(5, 'CO-OP', '1'),
(6, 'EA', '1'),
(7, 'FSB', '1'),
(8, 'MedS', '1'),
(9, 'NONP', '1'),
(10, 'OAW', '1'),
(11, 'SARB', '1'),
(12, 'SUBJSE', '1'),
(13, 'TER', '1');

-- --------------------------------------------------------

--
-- Table structure for table `audit`
--

CREATE TABLE `audit` (
  `id` int(255) NOT NULL auto_increment,
  `date` varchar(255) default NULL,
  `username` varchar(255) default NULL,
  `action_type` varchar(255) default NULL,
  `details` text,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `audit`
--

INSERT INTO `audit` (`id`, `date`, `username`, `action_type`, `details`) VALUES
(1, '01/25/2018 02:52:35', 'admin', 'Loggin', 'Systems Login'),
(2, '01/25/2018 02:54:03', 'admin', 'New Client', 'Created Monomotapa Hotel'),
(3, '01/25/2018 02:56:04', 'admin', 'Client Engagement', 'Engaged Monomotapa Hotel'),
(4, '01/25/2018 02:57:22', 'admin', 'Closed Project', 'Closed Monomotapa Hotel project. REF 250118025512'),
(5, '01/25/2018 03:16:20', 'admin', 'Logout', 'Systems Logout'),
(6, '01/25/2018 03:16:49', 'admin', 'Loggin', 'Systems Login'),
(7, '01/25/2018 03:28:11', 'admin', 'New Client', 'Created Twenty Third'),
(8, '01/25/2018 03:42:58', 'admin', 'Client Engagement', 'Engaged Twenty Third'),
(9, '01/25/2018 03:47:50', 'admin', 'Closed Project', 'Closed Twenty Third project. REF 250118032832'),
(10, '01/26/2018 08:04:05', 'admin', 'Loggin', 'Systems Login'),
(11, '01/29/2018 09:13:00', 'admin', 'Loggin', 'Systems Login'),
(12, '01/29/2018 11:02:03', 'admin', 'New Client', 'Created Test'),
(13, '01/29/2018 11:18:27', 'admin', 'New Client', 'Created q'),
(14, '01/29/2018 11:20:38', 'admin', 'New Client', 'Created qqq'),
(15, '01/29/2018 11:24:07', 'admin', 'New Client', 'Created q'),
(16, '01/29/2018 11:45:52', 'admin', 'Client Engagement', 'Engaged q'),
(17, '01/29/2018 02:22:26', 'admin', 'Client Engagement', 'Engaged CPS Technologies'),
(18, '01/30/2018 09:58:08', 'admin', 'Loggin', 'Systems Login'),
(19, '01/30/2018 07:59:42', 'admin', 'Loggin', 'Systems Login'),
(20, '01/30/2018 09:22:36', 'admin', 'New User', 'Created '),
(21, '01/30/2018 09:24:05', 'admin', 'New User', 'Created '),
(22, '01/30/2018 09:24:32', 'admin', 'New User', 'Created '),
(23, '01/30/2018 09:31:15', 'admin', 'Client Engagement', 'Engaged IT Medics'),
(24, '01/30/2018 10:11:13', 'admin', 'Client Engagement', 'Engaged CPS Technologies'),
(25, '01/30/2018 10:21:41', 'admin', 'New Client', 'Created g'),
(26, '01/31/2018 09:07:57', 'admin', 'Loggin', 'Systems Login'),
(27, '01/31/2018 03:49:59', 'admin', 'Logout', 'Systems Logout'),
(28, '01/31/2018 03:50:56', 'admin', 'Loggin', 'Systems Login'),
(29, '01/31/2018 03:59:02', 'admin', 'New User', 'Created '),
(30, '01/31/2018 04:03:17', 'admin', 'New Client', 'Created Toyota'),
(31, '01/31/2018 04:45:35', 'admin', 'Client Engagement', 'Engaged Toyota'),
(32, '02/01/2018 08:16:04', 'admin', 'Loggin', 'Systems Login'),
(33, '02/06/2018 01:48:25', 'admin', 'Loggin', 'Systems Login'),
(34, '02/19/2018 10:39:50', 'admin', 'Loggin', 'Systems Login'),
(35, '02/19/2018 03:39:52', 'admin', 'Client Engagement', 'Engaged CPS Technologies'),
(36, '02/20/2018 04:55:18', 'admin', 'Loggin', 'Systems Login'),
(37, '02/21/2018 12:04:12', 'admin', 'Loggin', 'Systems Login'),
(38, '02/21/2018 08:37:24', 'admin', 'Loggin', 'Systems Login'),
(39, '02/26/2018 03:56:42', 'admin', 'New Client', 'Created TEST'),
(40, '02/26/2018 04:43:32', 'admin', 'New Client', 'Created TESTRRRRR'),
(41, '02/26/2018 04:47:56', 'admin', 'New Client', 'Created TESTRRRRR'),
(42, '02/26/2018 04:49:22', 'admin', 'New Client', 'Created TESTRRRRR'),
(43, '02/26/2018 08:59:41', 'admin', 'Loggin', 'Systems Login'),
(44, '02/27/2018 10:27:21', 'admin', 'Client Engagement', 'Engaged '),
(45, '02/27/2018 01:08:07', 'admin', 'Engagement edit', 'Edited 452'),
(46, '02/27/2018 01:09:17', 'admin', 'Engagement edit', 'Edited 452');

-- --------------------------------------------------------

--
-- Table structure for table `audit_required`
--

CREATE TABLE `audit_required` (
  `id` int(255) NOT NULL auto_increment,
  `name` text,
  `active_status` varchar(22) default '1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `audit_required`
--

INSERT INTO `audit_required` (`id`, `name`, `active_status`) VALUES
(1, 'AG (CO): The Auditor-General South Africa - Contracted Out', '1'),
(2, 'AG (S4): The Auditor-General South Africa - Section 4(3) of the Public Audit Act', '1'),
(3, 'ATA: Attorneys trust accounts', '1'),
(4, 'CoA: Companies Act', '1'),
(5, 'CO-OP: Cooperatives', '1'),
(6, 'EA: Estate Agents - business and trust', '1'),
(7, 'FSB: Financial Services Board', '1'),
(8, 'MedS: Medical Schemes', '1'),
(9, 'NONP: Non-profit organisations where the turnover is more than', '1'),
(10, 'OAW: Other assurance work', '1'),
(11, 'SARB: South African Reserve Bank', '1'),
(12, 'SUBJSE: Subsidiaries of listed companies', '1'),
(13, 'TER: All tertiary institutions', '1');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(255) NOT NULL auto_increment,
  `date` varchar(255) default NULL,
  `company_name` text,
  `company_reg_number` varchar(255) default NULL,
  `industry` varchar(255) default NULL,
  `company_child` varchar(255) default NULL,
  `relationship_owner` varchar(255) default NULL,
  `active_status` varchar(255) default '1',
  `engagement_stage` varchar(255) default '0',
  `engagement_status` varchar(255) default '0',
  `child_option` varchar(255) default NULL,
  `parent_number` varchar(255) default NULL,
  `child_reg_number` varchar(255) default NULL,
  `company_parents_state` varchar(255) default '0',
  `ref` varchar(255) default NULL,
  `city` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=389 ;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `date`, `company_name`, `company_reg_number`, `industry`, `company_child`, `relationship_owner`, `active_status`, `engagement_stage`, `engagement_status`, `child_option`, `parent_number`, `child_reg_number`, `company_parents_state`, `ref`, `city`) VALUES
(1, NULL, 'Acajou (Pty) Ltd', '', NULL, '', 'Mungofa B.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_011', 'Johannesburg'),
(2, NULL, 'Accredited Investments (Pty) Ltd', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, '0', '1', 'SNH_l_025', 'Johannesburg'),
(3, NULL, 'Advanced Terminations and Joints (Pty) Ltd', '', NULL, '', 'Helga Lotter', '1', '0', '1', 'No', NULL, NULL, '1', 'PTR_l_017', 'Pretoria '),
(4, NULL, 'Africabio NPC', '', NULL, '', 'RP Goldes', '1', '0', '1', 'No', NULL, NULL, '1', 'PTR_l_009', 'Pretoria '),
(5, NULL, 'African World Heritage Fund', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_090', 'Johannesburg'),
(6, NULL, 'Agence Francaise De Developpment Project Preparation and Feasibility Studies', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_023', 'Johannesburg'),
(7, NULL, 'Agulhas Wetlands', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_075', 'Johannesburg'),
(8, NULL, 'ALBERANTE-RANDHART STEERING COMMITTEE (SECT 21)', '', NULL, '', 'J de Viliers', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_l_040', 'Alberton'),
(9, NULL, 'ALBERTON TUISTE VIR BEJAARDES', '', NULL, '', 'IJ de Villiers', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_l_060', 'Alberton'),
(10, NULL, 'ALBERTON TUISTE VIR BEJAARDES (ASSOCIATION INC UNDER SECTION 21)', '', NULL, '', 'IJ de Villiers', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_l_061', 'Alberton'),
(11, NULL, 'Albou Trust', '', NULL, '', 'H Lotter', '1', '0', '1', 'No', NULL, NULL, '1', 'PTR_l_011', 'Pretoria '),
(12, NULL, 'Albou Trust', '', NULL, '', 'H Lotter', '1', '0', '1', 'No', NULL, NULL, '1', 'PTR_l_013', 'Pretoria '),
(13, NULL, 'Alchemist House (Pty) Ltd T/A Fleet Connect', '', NULL, '', 'Mungofa B.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_021', 'Johannesburg'),
(14, NULL, 'AL-CLAD INTERIOR SYSTEMS (PTY) LTD', '', NULL, '', 'J de Viliers', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_h_007', 'Alberton'),
(15, NULL, 'Altamonte Investments (Pty) Ltd', '', NULL, '', 'M.A.Motala', '1', '0', '1', 'No', NULL, NULL, '1', 'DBN_l_013', 'Durban'),
(16, NULL, 'Amada Asset Management (Pty) Ltd', '', NULL, '', 'RP Goldes', '1', '0', '1', 'No', NULL, NULL, '1', 'PTR_h_006', 'Pretoria '),
(17, NULL, 'Anglo Inyosi Coal Community Development Trust', '', NULL, '', 'Muzarewetu N.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_102', 'Johannesburg'),
(18, NULL, 'Apparel Industries (Pty) Ltd', '', NULL, '', 'F.A.S Haffejee', '1', '0', '1', 'No', NULL, NULL, '1', 'DBN_l_019', 'Durban'),
(19, NULL, 'Aquarella Investments 224 (Pty) Ltd', '', NULL, '', 'Y.M Paruk', '1', '0', '1', 'No', NULL, NULL, '1', 'DBN_l_037', 'Durban'),
(20, NULL, 'Araf Industries (Pty) Ltd 2016', '', NULL, '', 'Y.M Paruk', '1', '0', '1', 'No', NULL, NULL, '1', 'DBN_h_003', 'Durban'),
(21, NULL, 'Araf Industries (Pty) Ltd 2017', '', NULL, '', 'Y.M Paruk', '1', '0', '1', 'No', NULL, NULL, '1', 'DBN_h_004', 'Durban'),
(22, NULL, 'Argon Securities', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_049', 'Johannesburg'),
(23, NULL, 'Asmall & Sons (Pty) Ltd', '', NULL, '', 'M.A Motala', '1', '0', '1', 'No', NULL, NULL, '1', 'DBN_h_019', 'Durban'),
(24, NULL, 'Attacq Group ESD (Pty) Ltd', '', NULL, '', 'RP Goldes', '1', '0', '1', 'No', NULL, NULL, '1', 'PTR_l_031', 'Pretoria '),
(25, NULL, 'Auditor General Work- contracted out- Umgeni water', '', NULL, '', 'M.A Motala', '1', '0', '1', 'No', NULL, NULL, '1', 'DBN_h_001', 'Durban'),
(26, NULL, 'Autumn Star Trading 100 (Pty) Ltd', '', NULL, '', 'Y.M Paruk', '1', '0', '1', 'No', NULL, NULL, '1', 'DBN_l_006', 'Durban'),
(27, NULL, 'Basadi Ba Kopane Investment (Pty) Ltd', '', NULL, '', 'Muzarewetu N.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_103', 'Johannesburg'),
(28, NULL, 'BEAUFORT WEST MUSEUM', '', NULL, '', 'Amaanullah Ayub', '1', '0', '1', 'No', NULL, NULL, '1', 'CTN_h_004', 'Cape Town '),
(29, NULL, 'Bekker Prokureurs', '', NULL, '', 'RP Goldes', '1', '0', '1', 'No', NULL, NULL, '1', 'PTR_h_011', 'Pretoria '),
(30, NULL, 'BELHAR ISLAMIC PRIMARY SCHOOL', '', NULL, '', 'Amaanullah Ayub', '1', '0', '1', 'No', NULL, NULL, '1', 'CTN_l_021', 'Cape Town '),
(31, NULL, 'BESSEMER AFRICA (PTY) LTD', '', NULL, '', 'S Prinsloo', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_l_024', 'Alberton'),
(32, NULL, 'BESSEMER BELANGE (PTY) LTD', '', NULL, '', 'S Prinsloo', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_l_025', 'Alberton'),
(33, NULL, 'Biarritz Investments (Pty) Ltd', '', NULL, '', 'Y.M Paruk', '1', '0', '1', 'No', NULL, NULL, '1', 'DBN_l_021', 'Durban'),
(34, NULL, 'Bizhub Highveld Lions', '', NULL, '', 'Muzarewetu N.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_113', 'Johannesburg'),
(35, NULL, 'Blue Shirt Bakery (Pty) Ltd', '', NULL, '', 'IJ de Villiers', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_l_015', 'Alberton'),
(36, NULL, 'BODY CORPORATE HILLBROW COMMUNITY CENTRE', '', NULL, '', 'IJ de Villiers', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_l_055', 'Alberton'),
(37, NULL, 'BODY CORPORATE THE BALINESE', '', NULL, '', 'IJ de Villiers', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_l_056', 'Alberton'),
(38, NULL, 'BOLAND CRICKET BOARD', '', NULL, '', 'Amaanullah Ayub', '1', '0', '1', 'No', NULL, NULL, '1', 'CTN_l_019', 'Cape Town '),
(39, NULL, 'Borbartia (Pty) Ltd', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_026', 'Johannesburg'),
(40, NULL, 'BREDASDORP MUSEUM', '', NULL, '', 'Amaanullah Ayub', '1', '0', '1', 'No', NULL, NULL, '1', 'CTN_h_006', 'Cape Town '),
(41, NULL, 'CARBONADO ENERGY (PTY) LTD', '', NULL, '', 'Amaanullah Ayub', '1', '0', '1', 'No', NULL, NULL, '1', 'CTN_h_008', 'Cape Town '),
(42, NULL, 'Casa Luigi Properties (Pty) Ltd', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_027', 'Johannesburg'),
(43, NULL, 'Casa Mia Body Corporate', '', NULL, '', 'RP Goldes', '1', '0', '1', 'No', NULL, NULL, '1', 'PTR_l_039', 'Pretoria '),
(44, NULL, 'Centaur De Roodepoort ', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_089', 'Johannesburg'),
(45, NULL, 'Centaur Mining South Africa ', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_088', 'Johannesburg'),
(46, NULL, 'CENTRAL AFRICAN ROAD SERVICES (PTY) LTD', '', NULL, '', 'J de Viliers', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_l_001', 'Alberton'),
(47, NULL, 'Central Cricket Franchise (Pty) Ltd', '', NULL, '', 'Julia van Wyk', '1', '0', '1', 'No', NULL, NULL, '1', 'BLM_l_003', 'Bloemfontein'),
(48, NULL, 'CENTRAL GAUTENG GYMNASTICS ASSOCIATION', '', NULL, '', 'J de Viliers', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_l_041', 'Alberton'),
(49, NULL, 'CHAFEKER & SHABODIEN INC', '', NULL, '', 'Amaanullah Ayub', '1', '0', '1', 'No', NULL, NULL, '1', 'CTN_h_016', 'Cape Town '),
(50, NULL, 'CHRISTELIKE MAATSKAPLIKE RAAD ALBERTON', '', NULL, '', 'IJ de Villiers', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_l_037', 'Alberton'),
(51, NULL, 'CHRISTELIKE MAATSKAPLIKE RAAD STANDERTON', '', NULL, '', 'IJ de Villiers', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_l_033', 'Alberton'),
(52, NULL, 'Cilbar and Company', '', NULL, '', 'Y.M Paruk', '1', '0', '1', 'No', NULL, NULL, '1', 'DBN_l_009', 'Durban'),
(53, NULL, 'COMMERCIAL MINING WEARPARTS (PTY) LTD', '', NULL, '', 'J de Viliers', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_l_008', 'Alberton'),
(54, NULL, 'Cricket South Africa', '', NULL, '', 'Masasa T.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_h_004', 'Johannesburg'),
(55, NULL, 'C-Track SA (Pty) Limited', '', NULL, '', 'Mungofa B.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_h_005', 'Johannesburg'),
(56, NULL, 'Darnall Motor Transport (Pty) Ltd', '', NULL, '', 'Y.M Paruk', '1', '0', '1', 'No', NULL, NULL, '1', 'DBN_l_016', 'Durban'),
(57, NULL, 'DE VRIES INCORPORATED', '', NULL, '', 'S Prinsloo', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_h_008', 'Alberton'),
(58, NULL, 'Dealernet (Pty) Ltd', '', NULL, '', 'H Lotter', '1', '0', '1', 'No', NULL, NULL, '1', 'PTR_h_002', 'Pretoria '),
(59, NULL, 'Dealfin (Pty) Ltd', '', NULL, '', 'H Lotter', '1', '0', '1', 'No', NULL, NULL, '1', 'PTR_h_007', 'Pretoria '),
(60, NULL, 'Debbie Pillay Attorneys', '', NULL, '', 'J. Jamal', '1', '0', '1', 'No', NULL, NULL, '1', 'DBN_h_015', 'Durban'),
(61, NULL, 'Desert Star Trading 109 (Pty) Ltd', '', NULL, '', 'Y.M Paruk', '1', '0', '1', 'No', NULL, NULL, '1', 'DBN_l_045', 'Durban'),
(62, NULL, 'Development Bank of South Africa', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_h_002', 'Johannesburg'),
(63, NULL, 'DIE CHRISTELIKE MAATSKAPLIKE RAAD RING VAN HEIDELBERG', '', NULL, '', 'IJ de Villiers', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_l_054', 'Alberton'),
(64, NULL, 'DigiCore Electronics (Pty) Ltd', '', NULL, '', 'Mungofa B.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_015', 'Johannesburg'),
(65, NULL, 'DigiCore Financial Services (Pty) Ltd ', '', NULL, '', 'Mungofa B.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_017', 'Johannesburg'),
(66, NULL, 'DigiCore Fleet Management SA (Pty) Ltd', '', NULL, '', 'Mungofa B.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_016', 'Johannesburg'),
(67, NULL, 'Digicore Holdings Limited', '', NULL, '', 'Mungofa B.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_h_015', 'Johannesburg'),
(68, NULL, 'DigiCore Management Services (Pty) Ltd', '', NULL, '', 'Mungofa B.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_020', 'Johannesburg'),
(69, NULL, 'DigiCore Properties (Pty) Ltd ', '', NULL, '', 'Mungofa B.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_018', 'Johannesburg'),
(70, NULL, 'Dr Alberts, Bouwer & Jordaan Incorporated', '', NULL, '', 'H Lotter', '1', '0', '1', 'No', NULL, NULL, '1', 'PTR_l_005', 'Pretoria '),
(71, NULL, 'DRIES VAN DER WALT FINANSIELE DIENSTE', '', NULL, '', 'IJ de Villiers', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_l_042', 'Alberton'),
(72, NULL, 'Drs Thomson Brittain and Partners', '', NULL, '', 'H Lotter', '1', '0', '1', 'No', NULL, NULL, '1', 'PTR_l_016', 'Pretoria '),
(73, NULL, 'Drs Thomson Brittain and Partners', '', NULL, '', 'H Lotter', '1', '0', '1', 'No', NULL, NULL, '1', 'PTR_l_028', 'Pretoria '),
(74, NULL, 'Dusty Moon Investments 43 (Pty) Ltd', '', NULL, '', 'H Lotter', '1', '0', '1', 'No', NULL, NULL, '1', 'PTR_l_032', 'Pretoria '),
(75, NULL, 'Dusty Moon Investments 43 (Pty) Ltd', '', NULL, '', 'H Lotter', '1', '0', '1', 'No', NULL, NULL, '1', 'PTR_l_033', 'Pretoria '),
(76, NULL, 'Eastern Cricket', '', NULL, '', 'Muzarewetu N.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_108', 'Johannesburg'),
(77, NULL, 'Easy Vortex Financial Wellness (Pty) Ltd', '', NULL, '', 'IJ de Villiers', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_l_014', 'Alberton'),
(78, NULL, 'EC- WFtC- Addo National Park - Woody Section (15/18)', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_085', 'Johannesburg'),
(79, NULL, 'EKHAYA NEIGHBURHOOD CITY IMPROVEMENT DISTRICT (SECT 21)', '', NULL, '', 'IJ de Villiers', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_l_045', 'Alberton'),
(80, NULL, 'Environmental Monitors 2016 / 19', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_079', 'Johannesburg'),
(81, NULL, 'Etana Holdings', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_041', 'Johannesburg'),
(82, NULL, 'F.H. Ali - Business account', '', NULL, '', 'J. Jamal', '1', '0', '1', 'No', NULL, NULL, '1', 'DBN_h_014', 'Durban'),
(83, NULL, 'F.H. Ali - Estate Agent Trust Account - dormant', '', NULL, '', 'J. Jamal', '1', '0', '1', 'No', NULL, NULL, '1', 'DBN_h_016', 'Durban'),
(84, NULL, 'Factodex (Pty) Ltd', '', NULL, '', 'Y.M Paruk', '1', '0', '1', 'No', NULL, NULL, '1', 'DBN_l_001', 'Durban'),
(85, NULL, 'Fashion Fusion Distribution (Pty) Ltd', '', NULL, '', 'F.A.S Haffejee', '1', '0', '1', 'No', NULL, NULL, '1', 'DBN_h_018', 'Durban'),
(86, NULL, 'Fashion Fusion Traders (Pty) Ltd', '', NULL, '', 'F.A.S Haffejee', '1', '0', '1', 'No', NULL, NULL, '1', 'DBN_h_002', 'Durban'),
(87, NULL, 'Firebush Investments (Pty) Ltd', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_028', 'Johannesburg'),
(88, NULL, 'Firewood Investments (Pty) Ltd', '', NULL, '', 'M.A.Motala', '1', '0', '1', 'No', NULL, NULL, '1', 'DBN_l_014', 'Durban'),
(89, NULL, 'Fivaz Incorporated', '', NULL, '', 'RP Goldes', '1', '0', '1', 'No', NULL, NULL, '1', 'PTR_h_004', 'Pretoria '),
(90, NULL, 'FONTAINEBLEAU GEMEENSKAPSKERK', '', NULL, '', 'IJ de Villiers', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_l_019', 'Alberton'),
(91, NULL, 'Free State Cricket NPC', '', NULL, '', 'Julia van Wyk', '1', '0', '1', 'No', NULL, NULL, '1', 'BLM_l_001', 'Bloemfontein'),
(92, NULL, 'Freedom Stationery (Pty) Ltd', '', NULL, '', 'M. Haffejee', '1', '0', '1', 'No', NULL, NULL, '1', 'DBN_h_020', 'Durban'),
(93, NULL, 'Friedshelf 1571 (Pty) Ltd', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_029', 'Johannesburg'),
(94, NULL, 'GALAXY JUWELERS (PTY) LTD', '', NULL, '', 'J de Viliers', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_h_004', 'Alberton'),
(95, NULL, 'GANGEN ATTORNEYS', '', NULL, '', 'Amaanullah Ayub', '1', '0', '1', 'No', NULL, NULL, '1', 'CTN_h_017', 'Cape Town '),
(96, NULL, 'Gauteng Cricket Board', '', NULL, '', 'Muzarewetu N.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_110', 'Johannesburg'),
(97, NULL, 'Gayatri Cans (Pty) Ltd ', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_h_023', 'Johannesburg'),
(98, NULL, 'Gayatri Cans (Pty) Ltd ', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_h_025', 'Johannesburg'),
(99, NULL, 'Gayatri Paper Mill (Pty) Ltd ', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_h_017', 'Johannesburg'),
(100, NULL, 'Gayatri Paper Mill (Pty) Ltd ', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_h_018', 'Johannesburg'),
(101, NULL, 'Gayatri Paper Mill Gauteng (Pty) Ltd  ', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_053', 'Johannesburg'),
(102, NULL, 'Gayatri Paper Mill Gauteng (Pty) Ltd  ', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_056', 'Johannesburg'),
(103, NULL, 'Golden Era Printers & Stationers Bops (Pty) Ltd ', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_h_011', 'Johannesburg'),
(104, NULL, 'Golden Era Printers & Stationers Bops (Pty) Ltd ', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_h_012', 'Johannesburg'),
(105, NULL, 'Golden Gate Higlands National Park  Working for Wetlands', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_077', 'Johannesburg'),
(106, NULL, 'Greene Consulting Engineers (Pty) Ltd', '', NULL, '', 'RP Goldes', '1', '0', '1', 'No', NULL, NULL, '1', 'PTR_l_008', 'Pretoria '),
(107, NULL, 'Griqua Diamonds (Pty) Ltd t/a Northern Cape Cricket (Pty) Ltd', '', NULL, '', 'Julia van Wyk', '1', '0', '1', 'No', NULL, NULL, '1', 'BLM_l_002', 'Bloemfontein'),
(108, NULL, 'Ground Lily Investments (Pty) Ltd ', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_030', 'Johannesburg'),
(109, NULL, 'Haupt Earle & Vennote Attorneys', '', NULL, '', 'RP Goldes', '1', '0', '1', 'No', NULL, NULL, '1', 'PTR_h_010', 'Pretoria '),
(110, NULL, 'Hazsons Holdings Shareblock (Pty) Ltd', '', NULL, '', 'J. Jamal', '1', '0', '1', 'No', NULL, NULL, '1', 'DBN_l_002', 'Durban'),
(111, NULL, 'Hiconnex (Pty) Ltd', '', NULL, '', 'H Lotter', '1', '0', '1', 'No', NULL, NULL, '1', 'PTR_l_001', 'Pretoria '),
(112, NULL, 'Hiconnex Communications (Pty) Ltd', '', NULL, '', 'Helga Lotter', '1', '0', '1', 'No', NULL, NULL, '1', 'PTR_l_014', 'Pretoria '),
(113, NULL, 'Hiconnex Industrials (Pty) Ltd', '', NULL, '', 'Helga Lotter', '1', '0', '1', 'No', NULL, NULL, '1', 'PTR_l_015', 'Pretoria '),
(114, NULL, 'Highgrowth Investments (Pty) Ltd', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_042', 'Johannesburg'),
(115, NULL, 'Hollard Behold (Cresta Properties) (Pty) Ltd', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_044', 'Johannesburg'),
(116, NULL, 'Hollard Business Associates (Pty) Ltd', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_043', 'Johannesburg'),
(117, NULL, 'Hollard Dealer Partners (Pty) Ltd', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_039', 'Johannesburg'),
(118, NULL, 'Hollard Investment Managers (Pty) Ltd', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_031', 'Johannesburg'),
(119, NULL, 'Hollard Life Properties (Pty) Ltd ', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_032', 'Johannesburg'),
(120, NULL, 'Hollard Portfolio (Pty) Ltd', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_048', 'Johannesburg'),
(121, NULL, 'HUGUENOT MEMORIAL MUSEUM', '', NULL, '', 'Amaanullah Ayub', '1', '0', '1', 'No', NULL, NULL, '1', 'CTN_h_003', 'Cape Town '),
(122, NULL, 'Hussun Goga & Company Attorney', '', NULL, '', 'Y.M Paruk', '1', '0', '1', 'No', NULL, NULL, '1', 'DBN_h_007', 'Durban'),
(123, NULL, 'Ice Blue Clothing (Pty) Ltd', '', NULL, '', 'Y.M Paruk', '1', '0', '1', 'No', NULL, NULL, '1', 'DBN_l_012', 'Durban'),
(124, NULL, 'Independent Power Producer office', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_057', 'Johannesburg'),
(125, NULL, 'Industrial Parks Revitalisation Programme (DTI)', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_024', 'Johannesburg'),
(126, NULL, 'Integrated Fare Collection Services (Pty) Ltd ', '', NULL, '', 'Mungofa B.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_019', 'Johannesburg'),
(127, NULL, 'Intekom', '', NULL, '', 'Mungofa B.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_010', 'Johannesburg'),
(128, NULL, 'Irfan Trading', '', NULL, '', 'F.A.S Haffejee', '1', '0', '1', 'No', NULL, NULL, '1', 'DBN_l_025', 'Durban'),
(129, NULL, 'Islamic Guidance Trust ', '', NULL, '', 'R.Timol', '1', '0', '1', 'No', NULL, NULL, '1', 'DBN_l_042', 'Durban'),
(130, NULL, 'Izingwe Aberdare Cables (Pty) Ltd', '', NULL, '', 'Muzarewetu N.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_092', 'Johannesburg'),
(131, NULL, 'Izingwe Cable Investments (Pty) Ltd', '', NULL, '', 'Muzarewetu N.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_093', 'Johannesburg'),
(132, NULL, 'Izingwe Capital (Pty) Ltd', '', NULL, '', 'Muzarewetu N.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_105', 'Johannesburg'),
(133, NULL, 'Izingwe Holdings (Pty) Ltd', '', NULL, '', 'Muzarewetu N.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_097', 'Johannesburg'),
(134, NULL, 'Izingwe International Fund (Pty) Ltd', '', NULL, '', 'Muzarewetu N.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_094', 'Johannesburg'),
(135, NULL, 'Izingwe Investment Holdings (Pty) Ltd', '', NULL, '', 'Muzarewetu N.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_098', 'Johannesburg'),
(136, NULL, 'Izingwe Main Street (Pty) Ltd', '', NULL, '', 'Muzarewetu N.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_095', 'Johannesburg'),
(137, NULL, 'Izingwe Properties (Pty) Ltd', '', NULL, '', 'Muzarewetu N.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_091', 'Johannesburg'),
(138, NULL, 'Izingwe Property Managers (Pty) Ltd', '', NULL, '', 'Muzarewetu N.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_096', 'Johannesburg'),
(139, NULL, 'J AND K INTERIORS (PTY) LTD', '', NULL, '', 'Amaanullah Ayub', '1', '0', '1', 'No', NULL, NULL, '1', 'CTN_l_024', 'Cape Town '),
(140, NULL, 'Jannie Parsons Future Financials (Pty) Ltd', '', NULL, '', 'RP Goldes', '1', '0', '1', 'No', NULL, NULL, '1', 'PTR_h_003', 'Pretoria '),
(141, NULL, 'Jarvis Jacobs Raubenheimer Inc - Trust Audit', '', NULL, '', 'RP Goldes', '1', '0', '1', 'No', NULL, NULL, '1', 'PTR_h_005', 'Pretoria '),
(142, NULL, 'JOSCHO-MADULAMOHO JOINT VENTRUE', '', NULL, '', 'IJ de Villiers', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_l_028', 'Alberton'),
(143, NULL, 'Jyotland Investments (Pty) Ltd', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_064', 'Johannesburg'),
(144, NULL, 'Kalbo Land Holdings (Pty) Ltd', '', NULL, '', 'F.A.S Haffejee', '1', '0', '1', 'No', NULL, NULL, '1', 'DBN_l_029', 'Durban'),
(145, NULL, 'Kamiesberg Working for Wetlands', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_074', 'Johannesburg'),
(146, NULL, 'KHUSEL ''NDALO SOUTH AFRICA NPC', '', NULL, '', 'Amaanullah Ayub', '1', '0', '1', 'No', NULL, NULL, '1', 'CTN_l_004', 'Cape Town '),
(147, NULL, 'KHUSEL ''NDALO SOUTH AFRICA NPC DAC PROJECT 1', '', NULL, '', 'Amaanullah Ayub', '1', '0', '1', 'No', NULL, NULL, '1', 'CTN_l_009', 'Cape Town '),
(148, NULL, 'KHUSEL ''NDALO SOUTH AFRICA NPC DAC PROJECT 2', '', NULL, '', 'Amaanullah Ayub', '1', '0', '1', 'No', NULL, NULL, '1', 'CTN_l_011', 'Cape Town '),
(149, NULL, 'KHUSEL ''NDALO SOUTH AFRICA NPC DAC PROJECT 3', '', NULL, '', 'Amaanullah Ayub', '1', '0', '1', 'No', NULL, NULL, '1', 'CTN_l_012', 'Cape Town '),
(150, NULL, 'KNP WORKING FOR WETLAND', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_078', 'Johannesburg'),
(151, NULL, 'KUSAGA TAKA CONSULTING', '', NULL, '', 'Amaanullah Ayub', '1', '0', '1', 'No', NULL, NULL, '1', 'CTN_l_002', 'Cape Town '),
(152, NULL, 'Kwa Dukuza Resource Centre NPC', '', NULL, '', 'J. Jamal', '1', '0', '1', 'No', NULL, NULL, '1', 'DBN_l_039', 'Durban'),
(153, NULL, 'Kwazulu- Natal Cricket Union', '', NULL, '', 'M. Haffejee', '1', '0', '1', 'No', NULL, NULL, '1', 'DBN_l_017', 'Durban'),
(154, NULL, 'Kwazulu Natal Cricket Union Bursary Trust', '', NULL, '', 'M. Haffejee', '1', '0', '1', 'No', NULL, NULL, '1', 'DBN_l_015', 'Durban'),
(155, NULL, 'KZN Cricket (Pty) Ltd', '', NULL, '', 'M. Haffejee', '1', '0', '1', 'No', NULL, NULL, '1', 'DBN_h_006', 'Durban'),
(156, NULL, 'L & J Finance (Pty) Ltd', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_065', 'Johannesburg'),
(157, NULL, 'LAERSKOOL GENERAAL ALBERTS', '', NULL, '', 'J de Viliers', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_l_020', 'Alberton'),
(158, NULL, 'Laeveld Agrochem (Pty) Ltd and its Subsidiaries', '', NULL, '', 'RP Goldes', '1', '0', '1', 'No', NULL, NULL, '1', 'PTR_h_001', 'Pretoria '),
(159, NULL, 'LAFARGE COMMUNITY TRUST', '', NULL, '', 'IJ de Villiers', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_l_062', 'Alberton'),
(160, NULL, 'LAFARGE EDUCATION TRUST', '', NULL, '', 'IJ de Villiers', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_l_016', 'Alberton'),
(161, NULL, 'LAMARA HENDRICKS ATTORNEYS', '', NULL, '', 'Amaanullah Ayub', '1', '0', '1', 'No', NULL, NULL, '1', 'CTN_h_015', 'Cape Town '),
(162, NULL, 'Laxmi Trust & Investment (Lenasia) (Pty) Ltd', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_066', 'Johannesburg'),
(163, NULL, 'Laxmi Trust & Investment Company', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_063', 'Johannesburg'),
(164, NULL, 'LEHLOHONOLO PROPERITIES', '', NULL, '', 'IJ de Villiers', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_h_013', 'Alberton'),
(165, NULL, 'Leungo Investments (Pty) Ltd', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_047', 'Johannesburg'),
(166, NULL, 'Lexshell 627 Investments (Pty) Ltd', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_069', 'Johannesburg'),
(167, NULL, 'Limpopo Department of Health Programme (DBSA Mandate)', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_022', 'Johannesburg'),
(168, NULL, 'Limpopo Impala Cricket Union (NPC)', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_071', 'Johannesburg'),
(169, NULL, 'LUTHERON COMMUNITY OUTREACH FOUNDATION', '', NULL, '', 'IJ de Villiers', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_l_021', 'Alberton'),
(170, NULL, 'Lynnwood Bridge Property Owners Association NPC', '', NULL, '', 'RP Goldes', '1', '0', '1', 'No', NULL, NULL, '1', 'PTR_l_019', 'Pretoria '),
(171, NULL, 'Lynnwood Bridge Property Owners Association NPC', '', NULL, '', 'RP Goldes', '1', '0', '1', 'No', NULL, NULL, '1', 'PTR_l_029', 'Pretoria '),
(172, NULL, 'M.S Omar and Associates', '', NULL, '', 'R. Timol', '1', '0', '1', 'No', NULL, NULL, '1', 'DBN_h_010', 'Durban'),
(173, NULL, 'MADULAMMOHO HOUSING ASSOCIATION NPC', '', NULL, '', 'IJ de Villiers', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_h_006', 'Alberton'),
(174, NULL, 'MAESTRO BEHUISING (PTY) LTD', '', NULL, '', 'S Prinsloo', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_l_044', 'Alberton'),
(175, NULL, 'Magnolia Ridge Properties 102 (Pty) Ltd', '', NULL, '', 'Y.M Paruk', '1', '0', '1', 'No', NULL, NULL, '1', 'DBN_l_044', 'Durban'),
(176, NULL, 'Mapungubwe National Park  Working for Wetlands', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_076', 'Johannesburg'),
(177, NULL, 'MASSEL PROPERTY SERVICES (PTY) LTD', '', NULL, '', 'S Prinsloo', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_l_009', 'Alberton'),
(178, NULL, 'Massmart Supplier Development Fund (Massmart SDF)', '', NULL, '', 'Masasa T.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_009', 'Johannesburg'),
(179, NULL, 'MAYAT NURICK LANGA INC', '', NULL, '', 'J de Villiers', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_h_009', 'Alberton'),
(180, NULL, 'McIver Apparel (Pty) Ltd', '', NULL, '', 'F.A.S Haffejee', '1', '0', '1', 'No', NULL, NULL, '1', 'DBN_l_020', 'Durban'),
(181, NULL, 'MES KHULA SUSTAINABILITY TRUST', '', NULL, '', 'IJ de Villiers', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_l_059', 'Alberton'),
(182, NULL, 'Metal and Engineering Industries Bargaining Council Sick Pay Fund', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_h_008', 'Johannesburg'),
(183, NULL, 'Metal and Engineering Industries Permanent Disability Scheme', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_h_006', 'Johannesburg'),
(184, NULL, 'Metal industries Benefit Fund Administrators', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_h_009', 'Johannesburg'),
(185, NULL, 'METRO EVANGELIESE SORG (SECTION 21)', '', NULL, '', 'IJ de Villiers', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_l_004', 'Alberton'),
(186, NULL, 'MIDVAAL THREADING (PTY) LTD', '', NULL, '', 'S Prinsloo', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_l_017', 'Alberton'),
(187, NULL, 'Mogwele Waste (Pty) Ltd ', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_h_016', 'Johannesburg'),
(188, NULL, 'Mogwele Waste (Pty) Ltd ', '', NULL, '', 'Amaanullah Ayub', '1', '0', '1', 'No', NULL, NULL, '1', 'CTN_h_001', 'Cape Town '),
(189, NULL, 'Mohammed Motala and Company', '', NULL, '', 'Y.M Paruk', '1', '0', '1', 'No', NULL, NULL, '1', 'DBN_h_011', 'Durban'),
(190, NULL, 'Molsons Property Investments (Pty) Ltd ', '', NULL, '', 'Y.M Paruk', '1', '0', '1', 'No', NULL, NULL, '1', 'DBN_l_004', 'Durban'),
(191, NULL, 'Monyetla', '', NULL, '', 'Masasa T.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_002', 'Johannesburg'),
(192, NULL, 'Morgan Pillay, Reddy and Company', '', NULL, '', 'Y.M Paruk', '1', '0', '1', 'No', NULL, NULL, '1', 'DBN_h_012', 'Durban'),
(193, NULL, 'Morning Tide Investments 67 (Pty) Ltd', '', NULL, '', 'Y.M Paruk', '1', '0', '1', 'No', NULL, NULL, '1', 'DBN_l_043', 'Durban'),
(194, NULL, 'Moss Ridge Properties (Pty) Ltd', '', NULL, '', 'M. Haffejee', '1', '0', '1', 'No', NULL, NULL, '1', 'DBN_h_023', 'Durban'),
(195, NULL, 'Mountain Cypress (Pty) Ltd', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_033', 'Johannesburg'),
(196, NULL, 'MP- Ecosystem Rehabilitation and Fencing of Nature Reserve', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_082', 'Johannesburg'),
(197, NULL, 'Mpumalanga Cricket Union (NPC)', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_072', 'Johannesburg'),
(198, NULL, 'Mtha Financial Services Trust', '', NULL, '', 'Muzarewetu N.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_100', 'Johannesburg'),
(199, NULL, 'Mtha We Mpumelelo Investments (Pty) Ltd', '', NULL, '', 'Muzarewetu N.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_099', 'Johannesburg'),
(200, NULL, 'Multiply Titans', '', NULL, '', 'Muzarewetu N.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_112', 'Johannesburg'),
(201, NULL, 'Mystar Education and Bussiness solution (Pty) Ltd', '', NULL, '', 'J de Viliers', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_l_018', 'Alberton'),
(202, NULL, 'N G BARMHARTIGHEIDSDIENS (NGBD) - {NEW NAME - TUTELA}', '', NULL, '', 'IJ de Villiers', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_l_011', 'Alberton'),
(203, NULL, 'N G BARMHARTIGHEIDSDIENS MPUMALANGA', '', NULL, '', 'IJ de Villiers', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_l_058', 'Alberton'),
(204, NULL, 'N G GEMEENTE LAMBTON', '', NULL, '', 'IJ de Villiers', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_l_046', 'Alberton'),
(205, NULL, 'N G KERK AASVOELKOP', '', NULL, '', 'IJ de Villiers', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_l_047', 'Alberton'),
(206, NULL, 'N G KERK ELSBURG', '', NULL, '', 'IJ de Villiers', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_l_049', 'Alberton'),
(207, NULL, 'N G KERK ELSBURG SUID', '', NULL, '', 'IJ de Villiers', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_l_048', 'Alberton'),
(208, NULL, 'N G KERK ELSPARK', '', NULL, '', 'IJ de Villiers', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_l_053', 'Alberton'),
(209, NULL, 'NATIONAL ASSOCIATION OF SOCIAL HOUSING ORGANISATION', '', NULL, '', 'IJ de Villiers', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_l_034', 'Alberton'),
(210, NULL, 'NC-WftC Namaqua National Park (15/18)', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_083', 'Johannesburg'),
(211, NULL, 'Nectatype', '', NULL, '', 'Masasa T.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_006', 'Johannesburg'),
(212, NULL, 'New Berea Centre (Pty) Ltd', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_045', 'Johannesburg'),
(213, NULL, 'New Era Labels (Bop) (Pty) Ltd ', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_054', 'Johannesburg'),
(214, NULL, 'New Era Labels (Bop) (Pty) Ltd  ', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_051', 'Johannesburg'),
(215, NULL, 'New Era P.P. Sacks (Bop) (Pty) Ltd ', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_h_026', 'Johannesburg'),
(216, NULL, 'New Era Packaging Bops (Pty) Ltd ', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_h_010', 'Johannesburg'),
(217, NULL, 'New Era Packaging Bops (Pty) Ltd ', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_h_013', 'Johannesburg'),
(218, NULL, 'New Era Paper Bags Manufacturers Bops (Pty) Ltd', '', NULL, '', 'Amaanullah Ayub', '1', '0', '1', 'No', NULL, NULL, '1', 'CTN_h_013', 'Cape Town '),
(219, NULL, 'New Era Paper Bags Manufacturers Bops (Pty) Ltd ', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_h_021', 'Johannesburg'),
(220, NULL, 'New Era PP Sacks BOP (Pty) Ltd.', '', NULL, '', 'Amaanullah Ayub', '1', '0', '1', 'No', NULL, NULL, '1', 'CTN_h_011', 'Cape Town '),
(221, NULL, 'Newshelf 33 (Pty) Ltd ', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_034', 'Johannesburg'),
(222, NULL, 'NG GEMEENTE SUNWARDPARK', '', NULL, '', 'IJ de Villiers', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_l_051', 'Alberton'),
(223, NULL, 'NG Kerk Faerie Glen', '', NULL, '', 'RP Goldes', '1', '0', '1', 'No', NULL, NULL, '1', 'PTR_l_036', 'Pretoria '),
(224, NULL, 'NG KERK SINODE HOeVELD', '', NULL, '', 'IJ de Villiers', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_l_007', 'Alberton'),
(225, NULL, 'Nirvana Investments (Pty) Ltd', '', NULL, '', 'F.A.S Haffejee', '1', '0', '1', 'No', NULL, NULL, '1', 'DBN_l_030', 'Durban'),
(226, NULL, 'North West Cricket', '', NULL, '', 'Muzarewetu N.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_111', 'Johannesburg'),
(227, NULL, 'Northerns Cricket', '', NULL, '', 'Muzarewetu N.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_109', 'Johannesburg'),
(228, NULL, 'Novo And Comu Joint Venture (Pty)Ltd', '', NULL, '', 'RP Goldes', '1', '0', '1', 'No', NULL, NULL, '1', 'PTR_l_007', 'Pretoria '),
(229, NULL, 'Novo Energy (Pty) Ltd', '', NULL, '', 'RP Goldes', '1', '0', '1', 'No', NULL, NULL, '1', 'PTR_l_003', 'Pretoria '),
(230, NULL, 'Novo Energy (Pty) Ltd', '', NULL, '', 'RP Goldes', '1', '0', '1', 'No', NULL, NULL, '1', 'PTR_l_004', 'Pretoria '),
(231, NULL, 'Novo Kew (Pty) Ltd', '', NULL, '', 'RP Goldes', '1', '0', '1', 'No', NULL, NULL, '1', 'PTR_l_020', 'Pretoria '),
(232, NULL, 'Novo Kew (Pty) Ltd', '', NULL, '', 'RP Goldes', '1', '0', '1', 'No', NULL, NULL, '1', 'PTR_l_023', 'Pretoria '),
(233, NULL, 'Novo Lincoln (Pty) Ltd', '', NULL, '', 'RP Goldes', '1', '0', '1', 'No', NULL, NULL, '1', 'PTR_l_021', 'Pretoria '),
(234, NULL, 'Novo Lincoln (Pty) Ltd', '', NULL, '', 'RP Goldes', '1', '0', '1', 'No', NULL, NULL, '1', 'PTR_l_024', 'Pretoria '),
(235, NULL, 'Novo Mcfarlane (Pty) Ltd', '', NULL, '', 'RP Goldes', '1', '0', '1', 'No', NULL, NULL, '1', 'PTR_l_022', 'Pretoria '),
(236, NULL, 'Novo Mcfarlane (Pty) Ltd', '', NULL, '', 'RP Goldes', '1', '0', '1', 'No', NULL, NULL, '1', 'PTR_l_025', 'Pretoria '),
(237, NULL, 'Nu Laxmi Selections (Pty) Ltd', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_061', 'Johannesburg'),
(238, NULL, 'Nu-Laxmi Investments (Pty) Ltd', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_060', 'Johannesburg'),
(239, NULL, 'Nu-Laxmi Leasing (Pty) Ltd', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_062', 'Johannesburg'),
(240, NULL, 'Nuprof Investments (Pty) Ltd', '', NULL, '', 'Y.M Paruk', '1', '0', '1', 'No', NULL, NULL, '1', 'DBN_l_034', 'Durban'),
(241, NULL, 'OLD HARBOUR MUSEUM', '', NULL, '', 'Amaanullah Ayub', '1', '0', '1', 'No', NULL, NULL, '1', 'CTN_h_005', 'Cape Town '),
(242, NULL, 'OLOF PALME INTERNATIONAL CENTRE - Projects', '', NULL, '', 'Amaanullah Ayub', '1', '0', '1', 'No', NULL, NULL, '1', 'CTN_l_001', 'Cape Town '),
(243, NULL, 'Ombudsman for Banking Services', '', NULL, '', 'Muzarewetu N.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_104', 'Johannesburg'),
(244, NULL, 'One Call Properties CC', '', NULL, '', 'RP Goldes', '1', '0', '1', 'No', NULL, NULL, '1', 'PTR_h_009', 'Pretoria '),
(245, NULL, 'Opium Investments (Pty) Ltd', '', NULL, '', 'Y.M Paruk', '1', '0', '1', 'No', NULL, NULL, '1', 'DBN_l_022', 'Durban'),
(246, NULL, 'Orient Islamic School', '', NULL, '', 'Y.M Paruk', '1', '0', '1', 'No', NULL, NULL, '1', 'DBN_l_028', 'Durban'),
(247, NULL, 'Oyster Plastics (Pty) Ltd', '', NULL, '', 'M. Haffejee', '1', '0', '1', 'No', NULL, NULL, '1', 'DBN_h_021', 'Durban'),
(248, NULL, 'Paramax Clothing (Pty) Ltd', '', NULL, '', 'F.A.S Haffejee', '1', '0', '1', 'No', NULL, NULL, '1', 'DBN_l_026', 'Durban'),
(249, NULL, 'PARAMOUNT TRAILERS (PTY) LTD', '', NULL, '', 'J de Viliers', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_h_005', 'Alberton'),
(250, NULL, 'Paruk''s Corporate Enterprises (Pty) Ltd', '', NULL, '', 'F.A.S Haffejee', '1', '0', '1', 'No', NULL, NULL, '1', 'DBN_l_036', 'Durban'),
(251, NULL, 'Petroprt N3 Heidelberg (Pty) Ltd', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_070', 'Johannesburg'),
(252, NULL, 'Pico Ruivo (Pty) Ltd', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_035', 'Johannesburg'),
(253, NULL, 'Plan B Financial Compliance (Pty) Ltd', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_046', 'Johannesburg'),
(254, NULL, 'Platinum High Tech Park Development (Pty) Ltd', '', NULL, '', 'RP Goldes', '1', '0', '1', 'No', NULL, NULL, '1', 'PTR_l_012', 'Pretoria '),
(255, NULL, 'Pravda and Knowles Attorneys', '', NULL, '', 'Y.M Paruk', '1', '0', '1', 'No', NULL, NULL, '1', 'DBN_h_008', 'Durban'),
(256, NULL, 'Pretoria Box Manufacturers Joint Venture ', '', NULL, '', 'RP Goldes', '1', '0', '1', 'No', NULL, NULL, '1', 'PTR_l_002', 'Pretoria '),
(257, NULL, 'Pretoria Woman''s 10km Race NPC', '', NULL, '', 'RP Goldes', '1', '0', '1', 'No', NULL, NULL, '1', 'PTR_l_034', 'Pretoria '),
(258, NULL, 'Pretoria Woman''s 10km Race NPC', '', NULL, '', 'RP Goldes', '1', '0', '1', 'No', NULL, NULL, '1', 'PTR_l_035', 'Pretoria '),
(259, NULL, 'PRIDE MILLING COMPANY (PTY) LTD', '', NULL, '', 'S Prinsloo', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_h_002', 'Alberton'),
(260, NULL, 'Prime Stores (Pty) Ltd', '', NULL, '', 'F.A.S Haffejee', '1', '0', '1', 'No', NULL, NULL, '1', 'DBN_l_046', 'Durban'),
(261, NULL, 'PRO EKKLESIA NPC', '', NULL, '', 'IJ de Villiers', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_l_026', 'Alberton'),
(262, NULL, 'Prowgrowth Investment', '', NULL, '', 'Y.M Paruk', '1', '0', '1', 'No', NULL, NULL, '1', 'DBN_l_031', 'Durban'),
(263, NULL, 'Pybus Thirty-Fourty (Pty) Ltd', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_068', 'Johannesburg'),
(264, NULL, 'Qhakaza AMPS (Pty) Ltd', '', NULL, '', 'Mungofa B.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_014', 'Johannesburg'),
(265, NULL, 'RATES WATCH (PTY) LTD', '', NULL, '', 'S Prinsloo', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_l_012', 'Alberton'),
(266, NULL, 'Real Tree Trading 1 (Pty) Ltd', '', NULL, '', 'Masasa T.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_h_014', 'Johannesburg'),
(267, NULL, 'Reprographics', '', NULL, '', 'Masasa T.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_008', 'Johannesburg'),
(268, NULL, 'Richard Cawood Properties (Pty) Ltd', '', NULL, '', 'RP Goldes', '1', '0', '1', 'No', NULL, NULL, '1', 'PTR_h_008', 'Pretoria '),
(269, NULL, 'RIDGE PROPERTIES (PTY) LTD', '', NULL, '', 'J de Viliers', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_l_023', 'Alberton'),
(270, NULL, 'RUBATO TRUST', '', NULL, '', 'Amaanullah Ayub', '1', '0', '1', 'No', NULL, NULL, '1', 'CTN_l_025', 'Cape Town '),
(271, NULL, 'RUSTIVIA INDUSTRIAL ESTATES (PTY) LTD', '', NULL, '', 'J de Viliers', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_l_032', 'Alberton'),
(272, NULL, 'S A TIMBER (WELKOM) (PTY) LTD', '', NULL, '', 'S Prinsloo', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_l_038', 'Alberton'),
(273, NULL, 'S A TIMBER AND JOINERY WORKS (PTY) LTD', '', NULL, '', 'S Prinsloo', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_l_039', 'Alberton'),
(274, NULL, 'SA Coal Mining Holdings Limited', '', NULL, '', 'Muzarewetu N.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_106', 'Johannesburg'),
(275, NULL, 'SA Innovation Summit (Pty)Ltd', '', NULL, '', 'RP Goldes', '1', '0', '1', 'No', NULL, NULL, '1', 'PTR_l_018', 'Pretoria '),
(276, NULL, 'SA TIMBER (KROONSTAD) (PTY) LTD', '', NULL, '', 'S Prinsloo', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_l_030', 'Alberton'),
(277, NULL, 'SA TIMBER (VIRGINIA) (PTY) LTD', '', NULL, '', 'S Prinsloo', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_l_031', 'Alberton'),
(278, NULL, 'SADC LAWYERS ASSOCIATION NPC', '', NULL, '', 'IJ de Villiers', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_l_010', 'Alberton'),
(279, NULL, 'Safdev Holdings (Pty) Ltd', '', NULL, '', 'RP Goldes', '1', '0', '1', 'No', NULL, NULL, '1', 'PTR_l_006', 'Pretoria '),
(280, NULL, 'SAICA Pension Fund', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_h_022', 'Johannesburg'),
(281, NULL, 'Sand Olive (Pty) Ltd', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_036', 'Johannesburg'),
(282, NULL, 'SANParks Natural Resource Projects', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_073', 'Johannesburg'),
(283, NULL, 'SATIM (O F S) (PTY) LTD', '', NULL, '', 'S Prinsloo', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_l_029', 'Alberton'),
(284, NULL, 'SAVECOMM PROPERTIES CC', '', NULL, '', 'IJ de Villiers', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_h_011', 'Alberton'),
(285, NULL, 'Scandura Trading (Pty) Ltd', '', NULL, '', 'Y.M Paruk', '1', '0', '1', 'No', NULL, NULL, '1', 'DBN_l_010', 'Durban'),
(286, NULL, 'SCHUTTE J H P Mnr', '', NULL, '', 'IJ de Villiers', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_h_014', 'Alberton'),
(287, NULL, 'Seabiscuit Body Corporate', '', NULL, '', 'H Lotter', '1', '0', '1', 'No', NULL, NULL, '1', 'PTR_l_038', 'Pretoria '),
(288, NULL, 'Second Street Mall (Pty) Ltd', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_067', 'Johannesburg'),
(289, NULL, 'Selvie Pillay and Company', '', NULL, '', 'J. Jamal', '1', '0', '1', 'No', NULL, NULL, '1', 'DBN_h_013', 'Durban'),
(290, NULL, 'Seraps (Pty) Ltd', '', NULL, '', 'M.A.Motala', '1', '0', '1', 'No', NULL, NULL, '1', 'DBN_l_033', 'Durban'),
(291, NULL, 'Shanduka Black Umbrellas', '', NULL, '', 'Muzarewetu N.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_107', 'Johannesburg'),
(292, NULL, 'SILVER PARK SELF STORAGE (PTY) LTD', '', NULL, '', 'Amaanullah Ayub', '1', '0', '1', 'No', NULL, NULL, '1', 'CTN_l_015', 'Cape Town '),
(293, NULL, 'SILVERY SUN ENERGY INVESTMENTS (PTY) LTD', '', NULL, '', 'Amaanullah Ayub', '1', '0', '1', 'No', NULL, NULL, '1', 'CTN_l_016', 'Cape Town '),
(294, NULL, 'Sinayo Securities (Pty) Ltd', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_050', 'Johannesburg'),
(295, NULL, 'SONYA MEISTRE INCORPORATED', '', NULL, '', 'J de Viliers', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_h_010', 'Alberton'),
(296, NULL, 'SOS CHILDREN''S VILLAGE ASSOCIATION OF RAS (NATIONAL)', '', NULL, '', 'J de Viliers', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_h_003', 'Alberton'),
(297, NULL, 'SOS KINDERDORP INTERNATIONAL SOUTHERN AFRICAN REGION', '', NULL, '', 'J de Viliers', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_l_003', 'Alberton'),
(298, NULL, 'South African Airways Technical (SAAT)', '', NULL, '', 'Muzarewetu N.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_h_003', 'Johannesburg'),
(299, NULL, 'SOUTH AFRICAN BOOK DEVELOPMENT COUNCIL NPC', '', NULL, '', 'Amaanullah Ayub', '1', '0', '1', 'No', NULL, NULL, '1', 'CTN_l_005', 'Cape Town '),
(300, NULL, 'South African File Manufacturers (Pty) Ltd', '', NULL, '', 'M. Haffejee', '1', '0', '1', 'No', NULL, NULL, '1', 'DBN_h_022', 'Durban'),
(301, NULL, 'South African Institute of Financial Markets', '', NULL, '', 'RP Goldes', '1', '0', '1', 'No', NULL, NULL, '1', 'PTR_l_010', 'Pretoria '),
(302, NULL, 'South African Institute of Financial Markets', '', NULL, '', 'RP Goldes', '1', '0', '1', 'No', NULL, NULL, '1', 'PTR_l_040', 'Pretoria '),
(303, NULL, 'South African National Halaal Authority', '', NULL, '', 'Y.M Paruk', '1', '0', '1', 'No', NULL, NULL, '1', 'DBN_l_005', 'Durban'),
(304, NULL, 'South African Society of Clinical and Radiation Oncologists', '', NULL, '', 'H Lotter', '1', '0', '1', 'No', NULL, NULL, '1', 'PTR_l_037', 'Pretoria '),
(305, NULL, 'South African Travel Company (SATC)', '', NULL, '', 'Masasa T.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_h_024', 'Johannesburg'),
(306, NULL, 'SOUTH WEST DISTRICT CRICKET COUNCIL', '', NULL, '', 'Amaanullah Ayub', '1', '0', '1', 'No', NULL, NULL, '1', 'CTN_l_008', 'Cape Town '),
(307, NULL, 'SPIES ABRAHAM MARTHINUS', '', NULL, '', 'IJ de Villiers', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_h_012', 'Alberton'),
(308, NULL, 'Squadron Trading (Pty) Ltd', '', NULL, '', 'Y.M Paruk', '1', '0', '1', 'No', NULL, NULL, '1', 'DBN_l_011', 'Durban'),
(309, NULL, 'SSI Schaefer Systems', '', NULL, '', 'Muzarewetu N.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_101', 'Johannesburg'),
(310, NULL, 'STANDER PROKUREURS', '', NULL, '', 'IJ de Villiers', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_h_015', 'Alberton'),
(311, NULL, 'Stanger and District Association for the Aged', '', NULL, '', 'J. Jamal', '1', '0', '1', 'No', NULL, NULL, '1', 'DBN_l_032', 'Durban'),
(312, NULL, 'Star Schools  (Pty) Ltd', '', NULL, '', 'J de Viliers', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_l_052', 'Alberton'),
(313, NULL, 'Star Schools High (Pty) Ltd', '', NULL, '', 'J de Viliers', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_l_002', 'Alberton'),
(314, NULL, 'STEENBOK TRUST 253/88', '', NULL, '', 'J de Viliers', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_l_050', 'Alberton'),
(315, NULL, 'Striding Edge CC', '', NULL, '', 'J. Jamal', '1', '0', '1', 'No', NULL, NULL, '1', 'DBN_l_035', 'Durban'),
(316, NULL, 'Sucrose Motors and Service Station (Pty) Ltd', '', NULL, '', 'J. Jamal', '1', '0', '1', 'No', NULL, NULL, '1', 'DBN_l_027', 'Durban'),
(317, NULL, 'Swiftnet (Pty) Ltd', '', NULL, '', 'Mungofa B.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_h_007', 'Johannesburg'),
(318, NULL, 'Syndicate Investments (Pty) Ltd', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_037', 'Johannesburg'),
(319, NULL, 'Syringa Tree Investments (Pty) Ltd', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_038', 'Johannesburg'),
(320, NULL, 'TAME COMMUNICATIONS (PTY) LTD', '', NULL, '', 'J de Viliers', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_l_036', 'Alberton'),
(321, NULL, 'Telkom Benevolent Fund', '', NULL, '', 'Mungofa B.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_012', 'Johannesburg'),
(322, NULL, 'Telkom Foundation Trust', '', NULL, '', 'Mungofa B.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_013', 'Johannesburg'),
(323, NULL, 'Telkom SA SOC Limited', '', NULL, '', 'Mungofa B.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_h_001', 'Johannesburg'),
(324, NULL, 'TEL-SCREW PRODUCTS (PTY) LTD', '', NULL, '', 'S Prinsloo', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_l_005', 'Alberton'),
(325, NULL, 'TERAOKA S A (PTY) LTD', '', NULL, '', 'S Prinsloo', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_h_001', 'Alberton'),
(326, NULL, 'The Attacq Foundation Trust', '', NULL, '', 'RP Goldes', '1', '0', '1', 'No', NULL, NULL, '1', 'PTR_l_030', 'Pretoria '),
(327, NULL, 'THE HUMAN KIND GROUP (PTY) LTD', '', NULL, '', 'S Prinsloo', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_l_013', 'Alberton'),
(328, NULL, 'THE KAMBULE TRUST', '', NULL, '', 'Amaanullah Ayub', '1', '0', '1', 'No', NULL, NULL, '1', 'CTN_l_022', 'Cape Town '),
(329, NULL, 'The Laxmi Group Limited', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_059', 'Johannesburg'),
(330, NULL, 'THE MINEWORKERS BENEFICIARY FUND', '', NULL, '', 'Amaanullah Ayub', '1', '0', '1', 'No', NULL, NULL, '1', 'CTN_h_009', 'Cape Town '),
(331, NULL, 'THE MINEWORKERS TRUST FUND', '', NULL, '', 'Amaanullah Ayub', '1', '0', '1', 'No', NULL, NULL, '1', 'CTN_h_012', 'Cape Town '),
(332, NULL, 'THE NBC UMBRELLA BENEFICIARY FUND', '', NULL, '', 'Amaanullah Ayub', '1', '0', '1', 'No', NULL, NULL, '1', 'CTN_h_007', 'Cape Town '),
(333, NULL, 'THE NBC UMBRELLA TRUST', '', NULL, '', 'Amaanullah Ayub', '1', '0', '1', 'No', NULL, NULL, '1', 'CTN_h_002', 'Cape Town '),
(334, NULL, 'THE RACHELS ANGELS TRUST', '', NULL, '', 'Amaanullah Ayub', '1', '0', '1', 'No', NULL, NULL, '1', 'CTN_l_013', 'Cape Town '),
(335, NULL, 'Thekwini Reinforcing (Pty) Ltd', '', NULL, '', 'J. Jamal', '1', '0', '1', 'No', NULL, NULL, '1', 'DBN_h_005', 'Durban'),
(336, NULL, 'Timol and Associates', '', NULL, '', 'Y.M Paruk', '1', '0', '1', 'No', NULL, NULL, '1', 'DBN_h_009', 'Durban'),
(337, NULL, 'Titans Cricket', '', NULL, '', 'Muzarewetu N.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_114', 'Johannesburg'),
(338, NULL, 'Tjokkerville', '', NULL, '', 'Masasa T.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_003', 'Johannesburg'),
(339, NULL, 'Toufic Trading (Pty) Ltd', '', NULL, '', 'F.A.S Haffejee', '1', '0', '1', 'No', NULL, NULL, '1', 'DBN_l_038', 'Durban'),
(340, NULL, 'TrackAN Investments (Pty) Ltd', '', NULL, '', 'Y.M Paruk', '1', '0', '1', 'No', NULL, NULL, '1', 'DBN_l_003', 'Durban'),
(341, NULL, 'TRANS-TECH LOGISTICS (PTY) LTD', '', NULL, '', 'J de Viliers', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_l_006', 'Alberton'),
(342, NULL, 'TREK TRANSPORT (PTY) LTD', '', NULL, '', 'S Prinsloo', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_l_027', 'Alberton'),
(343, NULL, 'Triangle Stores (Pty) Ltd', '', NULL, '', 'F.A.S Haffejee', '1', '0', '1', 'No', NULL, NULL, '1', 'DBN_l_024', 'Durban'),
(344, NULL, 'UITKOMS HOME FOR GIRLS', '', NULL, '', 'IJ de Villiers', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_l_022', 'Alberton'),
(345, NULL, 'UKUKHULA TRUST', '', NULL, '', 'Amaanullah Ayub', '1', '0', '1', 'No', NULL, NULL, '1', 'CTN_l_023', 'Cape Town '),
(346, NULL, 'Umgeni Water Services SOC Ltd (immaterial subsidery non- trading)', '', NULL, '', 'M.A Motala', '1', '0', '1', 'No', NULL, NULL, '1', 'DBN_h_017', 'Durban'),
(347, NULL, 'Unity Paper Sales (Pty) Ltd ', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_h_019', 'Johannesburg'),
(348, NULL, 'Unity Paper Sales (Pty) Ltd ', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_h_020', 'Johannesburg'),
(349, NULL, 'V G KERK EDENPARK', '', NULL, '', 'IJ de Villiers', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_l_043', 'Alberton'),
(350, NULL, 'VAN DER ROSS & MOTALA INC', '', NULL, '', 'Amaanullah Ayub', '1', '0', '1', 'No', NULL, NULL, '1', 'CTN_h_014', 'Cape Town '),
(351, NULL, 'VAN DER WALT CRESCENT ENCLOSURE NPC', '', NULL, '', 'IJ de Villiers', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_l_057', 'Alberton'),
(352, NULL, 'VASCOBA INVESTMENTS (PTY) LTD', '', NULL, '', 'S Prinsloo', '1', '0', '1', 'No', NULL, NULL, '1', 'EGT_l_035', 'Alberton'),
(353, NULL, 'Vayej Bros (Pty) Ltd', '', NULL, '', 'Y.M Paruk', '1', '0', '1', 'No', NULL, NULL, '1', 'DBN_l_018', 'Durban'),
(354, NULL, 'VCE/Thusong', '', NULL, '', 'Masasa T.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_005', 'Johannesburg'),
(355, NULL, 'Velvet Raisin Investments (Pty) Ltd', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_040', 'Johannesburg'),
(356, NULL, 'Vesco Ecko', '', NULL, '', 'Masasa T.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_007', 'Johannesburg'),
(357, NULL, 'Vesco Parent', '', NULL, '', 'Masasa T.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_004', 'Johannesburg'),
(358, NULL, 'VISION CHILD AND YOUTH CENTRE', '', NULL, '', 'Amaanullah Ayub', '1', '0', '1', 'No', NULL, NULL, '1', 'CTN_l_006', 'Cape Town '),
(359, NULL, 'Vuwa Investments (Pty) Ltd', '', NULL, '', 'Masasa T.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_001', 'Johannesburg');
INSERT INTO `clients` (`id`, `date`, `company_name`, `company_reg_number`, `industry`, `company_child`, `relationship_owner`, `active_status`, `engagement_stage`, `engagement_status`, `child_option`, `parent_number`, `child_reg_number`, `company_parents_state`, `ref`, `city`) VALUES
(360, NULL, 'W P PROFESSION CRICKET (PTY) LTD.', '', NULL, '', 'Amaanullah Ayub', '1', '0', '1', 'No', NULL, NULL, '1', 'CTN_l_010', 'Cape Town '),
(361, NULL, 'WALKERS INCORPORATED', '', NULL, '', 'Amaanullah Ayub', '1', '0', '1', 'No', NULL, NULL, '1', 'CTN_h_010', 'Cape Town '),
(362, NULL, 'WALKERS INCORPORATED', '', NULL, '', 'Amaanullah Ayub', '1', '0', '1', 'No', NULL, NULL, '1', 'CTN_l_007', 'Cape Town '),
(363, NULL, 'Waxpak (Pty) Ltd', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_055', 'Johannesburg'),
(364, NULL, 'Waxpak (Pty) Ltd', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_052', 'Johannesburg'),
(365, NULL, 'WC - Table Mountain National Park - WftC 15/18', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_086', 'Johannesburg'),
(366, NULL, 'WC - West Coast National Park', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_080', 'Johannesburg'),
(367, NULL, 'WC - WftC Cape Agulhas National Park (15/18)', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_087', 'Johannesburg'),
(368, NULL, 'WC WftC GRNP Knysna Section (15/18)', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_081', 'Johannesburg'),
(369, NULL, 'WC WftC GRNP Wilderness Section (15/18)', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_084', 'Johannesburg'),
(370, NULL, 'WELKOM TRUST', '', NULL, '', 'Amaanullah Ayub', '1', '0', '1', 'No', NULL, NULL, '1', 'CTN_l_020', 'Cape Town '),
(371, NULL, 'WESTERN CAPE CRICKET (PTY) LTD', '', NULL, '', 'Amaanullah Ayub', '1', '0', '1', 'No', NULL, NULL, '1', 'CTN_l_017', 'Cape Town '),
(372, NULL, 'WESTERN PROVINCE CRICKET ASSOCIATION', '', NULL, '', 'Amaanullah Ayub', '1', '0', '1', 'No', NULL, NULL, '1', 'CTN_l_003', 'Cape Town '),
(373, NULL, 'Womens Cultural Group', '', NULL, '', 'R.Timol', '1', '0', '1', 'No', NULL, NULL, '1', 'DBN_l_041', 'Durban'),
(374, NULL, 'Womens Cultural Group Educational Trust', '', NULL, '', 'R.Timol', '1', '0', '1', 'No', NULL, NULL, '1', 'DBN_l_040', 'Durban'),
(375, NULL, 'WORKERS WORLD MEDIA PRODUCTIONS', '', NULL, '', 'Amaanullah Ayub', '1', '0', '1', 'No', NULL, NULL, '1', 'CTN_l_014', 'Cape Town '),
(376, NULL, 'WORKERS WORLD MEDIA PRODUCTIONS - Projects', '', NULL, '', 'Amaanullah Ayub', '1', '0', '1', 'No', NULL, NULL, '1', 'CTN_l_018', 'Cape Town '),
(377, NULL, 'Xyletate (Pty) Ltd', '', NULL, '', 'Y.M Paruk', '1', '0', '1', 'No', NULL, NULL, '1', 'DBN_l_007', 'Durban'),
(378, NULL, 'YHB Enterprise Partnership', '', NULL, '', 'M. Haffejee', '1', '0', '1', 'No', NULL, NULL, '1', 'DBN_l_023', 'Durban'),
(379, NULL, 'ZARX (Pty) Ltd', '', NULL, '', 'Kallen S.', '1', '0', '1', 'No', NULL, NULL, '1', 'SNH_l_058', 'Johannesburg'),
(387, NULL, 'Zwartkop Golf Estate Homeowners Association - Utilities', '', NULL, '', 'RP Goldes', '1', '0', '0', 'No', NULL, NULL, '1', 'PTR_l_027', 'Pretoria '),
(385, NULL, 'Zelpy 2940 (Pty) Ltd', '', NULL, '', 'Y.M Paruk', '1', '0', '0', 'No', NULL, NULL, '1', 'DBN_l_008', 'Durban'),
(386, NULL, 'Zwartkop Golf Estate Homeowners Association - Levies', '', NULL, '', 'RP Goldes', '1', '0', '0', 'No', NULL, NULL, '1', 'PTR_l_026', 'Pretoria '),
(388, '02/26/2018 03:56:12', 'TESTRRRRR', '', 'Federations', '', 'Sangeeta Kallen', '1', '0', '0', 'No', '2', '', '1', 'SDFRRRRRRRRRR', 'Johannesburg');

-- --------------------------------------------------------

--
-- Table structure for table `closed_projects`
--

CREATE TABLE `closed_projects` (
  `id` int(255) NOT NULL auto_increment,
  `date` varchar(255) default NULL,
  `active_status` varchar(255) default '1',
  `engagement_id` varchar(255) default NULL,
  `auditor_rating` varchar(255) default NULL,
  `auditor_remarks` varchar(255) default NULL,
  `contact_rating` varchar(255) default NULL,
  `contact_remarks` varchar(255) default NULL,
  `end_date` varchar(255) default NULL,
  `closing_notes` text,
  `captured_by` varchar(255) default NULL,
  `track` varchar(255) default '1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `closed_projects`
--

INSERT INTO `closed_projects` (`id`, `date`, `active_status`, `engagement_id`, `auditor_rating`, `auditor_remarks`, `contact_rating`, `contact_remarks`, `end_date`, `closing_notes`, `captured_by`, `track`) VALUES
(1, '01/25/2018 02:56:45', '1', '250118025512', 'Good', 'This was ok', 'Good', 'I will keep updating', '2018-01-26', 'Thank you', 'admin', '1'),
(2, '01/25/2018 03:46:34', '1', '250118032832', 'Good', 'hhhh', 'Good', 'jj', '2018-01-26', 'xx', 'admin', '1');

-- --------------------------------------------------------

--
-- Table structure for table `communication`
--

CREATE TABLE `communication` (
  `id` int(255) NOT NULL auto_increment,
  `session` varchar(255) default NULL,
  `date` varchar(255) default NULL,
  `1` varchar(255) default NULL,
  `2` varchar(255) default NULL,
  `3` varchar(255) default NULL,
  `4` varchar(255) default NULL,
  `5` varchar(255) default NULL,
  `6` varchar(255) default NULL,
  `7` varchar(255) default NULL,
  `8` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `communication`
--

INSERT INTO `communication` (`id`, `session`, `date`, `1`, `2`, `3`, `4`, `5`, `6`, `7`, `8`) VALUES
(1, '120218021906', '12/02/2018', 'Yes', 'No', 'No', 'No', 'No', 'No', 'No', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `company_image`
--

CREATE TABLE `company_image` (
  `id` int(255) NOT NULL auto_increment,
  `date` varchar(255) default NULL,
  `session` varchar(255) default NULL,
  `1` varchar(255) default NULL,
  `2` varchar(255) default NULL,
  `3` varchar(255) default NULL,
  `4` varchar(255) default NULL,
  `5` varchar(255) default NULL,
  `6` varchar(255) default NULL,
  `7` varchar(255) default NULL,
  `8` varchar(255) default NULL,
  `9` varchar(255) default NULL,
  `10` varchar(255) default NULL,
  `11` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `company_image`
--

INSERT INTO `company_image` (`id`, `date`, `session`, `1`, `2`, `3`, `4`, `5`, `6`, `7`, `8`, `9`, `10`, `11`) VALUES
(1, '12/02/2018', '120218021906', 'Yes', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'dissatisfaction', 'hhh', 'hhhh');

-- --------------------------------------------------------

--
-- Table structure for table `compensation`
--

CREATE TABLE `compensation` (
  `id` int(255) NOT NULL auto_increment,
  `session` varchar(255) default NULL,
  `date` varchar(255) default NULL,
  `1` varchar(255) default NULL,
  `2` varchar(255) default NULL,
  `3` varchar(255) default NULL,
  `4` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `compensation`
--

INSERT INTO `compensation` (`id`, `session`, `date`, `1`, `2`, `3`, `4`) VALUES
(1, '120218021906', '12/02/2018', 'Yes', 'No', 'No', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `culture`
--

CREATE TABLE `culture` (
  `id` int(255) NOT NULL auto_increment,
  `session` varchar(255) default NULL,
  `date` varchar(255) default NULL,
  `1` varchar(255) default NULL,
  `2` varchar(255) default NULL,
  `3` varchar(255) default NULL,
  `4` varchar(255) default NULL,
  `5` varchar(255) default NULL,
  `6` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `culture`
--

INSERT INTO `culture` (`id`, `session`, `date`, `1`, `2`, `3`, `4`, `5`, `6`) VALUES
(1, '120218021906', '12/02/2018', 'Yes', 'No', 'No', 'No', 'No', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `engagements`
--

CREATE TABLE `engagements` (
  `id` int(255) NOT NULL auto_increment,
  `date` varchar(255) default NULL,
  `client` text,
  `engagement_date` varchar(255) default NULL,
  `engagement_type` varchar(255) default '1',
  `engaged_by` varchar(255) default NULL,
  `engagement_status` varchar(255) default '1',
  `start_notes` text,
  `active_status` varchar(255) default '1',
  `engagement_id` varchar(255) default NULL,
  `city` varchar(255) default NULL,
  `assurance` varchar(255) default NULL,
  `date_resigned` varchar(255) default '--/--',
  `rotation_period` varchar(255) default NULL,
  `rotation_year` varchar(255) default NULL,
  `anticipated_rotation_partner` varchar(255) default NULL,
  `editable` varchar(255) default '1',
  `group_structure` varchar(255) default NULL,
  `companies_act` varchar(255) default NULL,
  `irba_code` varchar(255) default NULL,
  `isqc_1` varchar(255) default NULL,
  `isqc_2` varchar(255) default NULL,
  `amount_billed` varchar(255) default NULL,
  `jse_listed` varchar(255) default NULL,
  `year_of_afs` varchar(255) default NULL,
  `when_next_irba` varchar(255) default NULL,
  `accounting_framework` varchar(255) default NULL,
  `client_turnover` varchar(255) default NULL,
  `first_engagement_date` varchar(255) default NULL,
  `assurance_work` varchar(255) default NULL,
  `risk` varchar(255) default 'None',
  `audit_required` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=453 ;

--
-- Dumping data for table `engagements`
--

INSERT INTO `engagements` (`id`, `date`, `client`, `engagement_date`, `engagement_type`, `engaged_by`, `engagement_status`, `start_notes`, `active_status`, `engagement_id`, `city`, `assurance`, `date_resigned`, `rotation_period`, `rotation_year`, `anticipated_rotation_partner`, `editable`, `group_structure`, `companies_act`, `irba_code`, `isqc_1`, `isqc_2`, `amount_billed`, `jse_listed`, `year_of_afs`, `when_next_irba`, `accounting_framework`, `client_turnover`, `first_engagement_date`, `assurance_work`, `risk`, `audit_required`) VALUES
(1, NULL, 'SNH_h_001', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '02/06/2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 16 000 000,00 ', NULL, '31/03/2017', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(2, NULL, 'SNH_h_002', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '22/06/2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 6 038 536,00 ', NULL, '31/03/2017', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(3, NULL, 'SNH_h_003', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Not yet signed off', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 2 569 464,00 ', NULL, '31/03/2017', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(4, NULL, 'SNH_h_004', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '21/07/2017', NULL, NULL, NULL, '1', NULL, '1115', NULL, NULL, NULL, ' R 806 620,00 ', NULL, '30/04/2017', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(5, NULL, 'SNH_h_005', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Not yet signed off', NULL, NULL, NULL, '1', NULL, '612', NULL, NULL, NULL, ' R 600 000,00 ', NULL, '31/12/2016', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(6, NULL, 'SNH_h_006', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Not yet signed off', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 487 600,00 ', NULL, '31/03/2017', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(7, NULL, 'SNH_h_007', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '27/06/2016', NULL, NULL, NULL, '1', NULL, '388', NULL, NULL, NULL, ' R 468 187,16 ', NULL, '31/03/2016', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(8, NULL, 'SNH_h_008', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Not yet signed off', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 454 900,00 ', NULL, '31/03/2017', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(9, NULL, 'SNH_h_009', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '10/10/2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 451 560,00 ', NULL, '31/03/2017', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(10, NULL, 'SNH_h_010', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '31/08/2017', NULL, NULL, NULL, '1', NULL, '1993', NULL, NULL, NULL, ' R 425 416,00 ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(11, NULL, 'SNH_h_011', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '31/08/2017', NULL, NULL, NULL, '1', NULL, ' 2034', NULL, NULL, NULL, ' R 418 937,00 ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(12, NULL, 'SNH_h_012', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '17/02/2017', NULL, NULL, NULL, '1', NULL, '2657', NULL, NULL, NULL, ' R 415 107,00 ', NULL, '29/02/2016', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(13, NULL, 'SNH_h_013', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '28/02/2017', NULL, NULL, NULL, '1', NULL, '2013', NULL, NULL, NULL, ' R 404 908,00 ', NULL, '29/02/2016', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(14, NULL, 'SNH_h_014', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '23/10/2017', NULL, NULL, NULL, '1', NULL, '2079', NULL, NULL, NULL, ' R 324 245,00 ', NULL, '31/03/2017', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(15, NULL, 'SNH_h_015', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Not yet signed off', NULL, NULL, NULL, '1', NULL, '120', NULL, NULL, NULL, ' R 250 000,00 ', NULL, '31/12/2016', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(16, NULL, 'SNH_h_016', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '31/08/2017', NULL, NULL, NULL, '1', NULL, '1169', NULL, NULL, NULL, ' R 246 612,00 ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(17, NULL, 'SNH_h_017', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '31/08/2017', NULL, NULL, NULL, '1', NULL, '764', NULL, NULL, NULL, ' R 190 033,00 ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(18, NULL, 'SNH_h_018', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '17/02/2017', NULL, NULL, NULL, '1', NULL, '672', NULL, NULL, NULL, ' R 179 120,00 ', NULL, '29/02/2016', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(19, NULL, 'SNH_h_019', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '31/08/2017', NULL, NULL, NULL, '1', NULL, '770', NULL, NULL, NULL, ' R 160 233,00 ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(20, NULL, 'SNH_h_020', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '19/04/2017', NULL, NULL, NULL, '1', NULL, '762', NULL, NULL, NULL, ' R 140 000,00 ', NULL, '29/02/2016', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(21, NULL, 'SNH_h_021', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '31/08/2017', NULL, NULL, NULL, '1', NULL, '520', NULL, NULL, NULL, ' R 113 156,00 ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(22, NULL, 'SNH_h_022', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Not yet signed off', NULL, NULL, NULL, '1', NULL, 'N/a', NULL, NULL, NULL, ' R 77 416,00 ', NULL, '31/12/2016', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(23, NULL, 'SNH_h_023', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '31/08/2017', NULL, NULL, NULL, '1', NULL, '522', NULL, NULL, NULL, ' R 66 994,00 ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(24, NULL, 'SNH_h_024', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Not yet signed off', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 57 912,00 ', NULL, '31/03/2017', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(25, NULL, 'SNH_h_025', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '31/03/2017', NULL, NULL, NULL, '1', NULL, '565', NULL, NULL, NULL, ' R 43 322,00 ', NULL, '29/02/2016', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(26, NULL, 'SNH_h_026', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '31/08/2017', NULL, NULL, NULL, '1', NULL, '690', NULL, NULL, NULL, ' R 37 143,00 ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(52, NULL, 'SNH_l_001', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '', NULL, NULL, NULL, '1', NULL, '59', NULL, NULL, NULL, ' R -   ', NULL, '', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(53, NULL, 'SNH_l_002', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '04/11/2016', NULL, NULL, NULL, '1', NULL, '39', NULL, NULL, NULL, ' R -   ', NULL, '31/03/2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(54, NULL, 'SNH_l_003', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '04/11/2016', NULL, NULL, NULL, '1', NULL, '12', NULL, NULL, NULL, ' R -   ', NULL, '31/03/2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(55, NULL, 'SNH_l_004', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '28/11/2016', NULL, NULL, NULL, '1', NULL, '303', NULL, NULL, NULL, ' R -   ', NULL, '31/03/2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(56, NULL, 'SNH_l_005', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '04/11/2016', NULL, NULL, NULL, '1', NULL, '3', NULL, NULL, NULL, ' R -   ', NULL, '31/03/2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(57, NULL, 'SNH_l_006', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '04/11/2016', NULL, NULL, NULL, '1', NULL, '1', NULL, NULL, NULL, ' R -   ', NULL, '31/03/2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(58, NULL, 'SNH_l_007', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '04/11/2016', NULL, NULL, NULL, '1', NULL, '3', NULL, NULL, NULL, ' R -   ', NULL, '31/03/2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(59, NULL, 'SNH_l_008', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '04/11/2016', NULL, NULL, NULL, '1', NULL, '29', NULL, NULL, NULL, ' R -   ', NULL, '31/03/2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(60, NULL, 'SNH_l_009', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '07/04/2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 209 000,00 ', NULL, '31/12/2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(61, NULL, 'SNH_l_010', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '', NULL, NULL, NULL, '1', NULL, '', NULL, NULL, NULL, ' R 30 984,00 ', NULL, '31/03/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(62, NULL, 'SNH_l_011', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '', NULL, NULL, NULL, '1', NULL, '', NULL, NULL, NULL, ' R 45 000,00 ', NULL, '31/03/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(63, NULL, 'SNH_l_012', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 80 000,00 ', NULL, '31/12/2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(64, NULL, 'SNH_l_013', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 76 900,00 ', NULL, '31/03/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(65, NULL, 'SNH_l_014', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '', NULL, NULL, NULL, '1', NULL, '80', NULL, NULL, NULL, ' R 190 766,00 ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(66, NULL, 'SNH_l_015', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 100 000,00 ', NULL, '31/12/2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(67, NULL, 'SNH_l_016', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 100 000,00 ', NULL, '31/12/2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(68, NULL, 'SNH_l_017', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 100 000,00 ', NULL, '31/12/2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(69, NULL, 'SNH_l_018', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 100 000,00 ', NULL, '31/12/2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(70, NULL, 'SNH_l_019', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 100 000,00 ', NULL, '31/12/2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(71, NULL, 'SNH_l_020', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 100 000,00 ', NULL, '31/12/2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(72, NULL, 'SNH_l_021', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 100 000,00 ', NULL, '31/12/2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(73, NULL, 'SNH_l_022', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '05/10/2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 45 945,00 ', NULL, '31-03-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(74, NULL, 'SNH_l_023', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '31/07/2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 45 945,00 ', NULL, '31-03-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(75, NULL, 'SNH_l_024', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '05/10/2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 51 272,00 ', NULL, '31-03-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(76, NULL, 'SNH_l_025', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '16/11/2017', NULL, NULL, NULL, '1', NULL, '1', NULL, NULL, NULL, ' R 3 032,00 ', NULL, '30-06-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(77, NULL, 'SNH_l_026', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Not yet signed off', NULL, NULL, NULL, '1', NULL, '2', NULL, NULL, NULL, ' R 29 024,00 ', NULL, '30-06-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(78, NULL, 'SNH_l_027', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '16/11/2017', NULL, NULL, NULL, '1', NULL, '1', NULL, NULL, NULL, ' R 3 032,00 ', NULL, '30-06-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(79, NULL, 'SNH_l_028', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Not yet signed off', NULL, NULL, NULL, '1', NULL, '1', NULL, NULL, NULL, ' R 24 692,00 ', NULL, '30-06-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(80, NULL, 'SNH_l_029', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Not yet signed off', NULL, NULL, NULL, '1', NULL, '8', NULL, NULL, NULL, ' R 20 360,00 ', NULL, '30-06-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(81, NULL, 'SNH_l_030', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '16/11/2017', NULL, NULL, NULL, '1', NULL, '1', NULL, NULL, NULL, ' R 3 032,00 ', NULL, '30-06-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(82, NULL, 'SNH_l_031', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '31/10/2017', NULL, NULL, NULL, '1', NULL, '2', NULL, NULL, NULL, ' R 25 775,00 ', NULL, '30-06-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(83, NULL, 'SNH_l_032', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Not yet signed off', NULL, NULL, NULL, '1', NULL, '58', NULL, NULL, NULL, ' R 19 277,00 ', NULL, '30-06-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(84, NULL, 'SNH_l_033', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Not yet signed off', NULL, NULL, NULL, '1', NULL, '1', NULL, NULL, NULL, ' R 19 927,00 ', NULL, '30-06-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(85, NULL, 'SNH_l_034', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '04/12/2017', NULL, NULL, NULL, '1', NULL, '1', NULL, NULL, NULL, ' R 3 032,00 ', NULL, '30-06-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(86, NULL, 'SNH_l_035', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Not yet signed off', NULL, NULL, NULL, '1', NULL, '1', NULL, NULL, NULL, ' R 14 512,00 ', NULL, '30-06-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(87, NULL, 'SNH_l_036', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Not yet signed off', NULL, NULL, NULL, '1', NULL, '44', NULL, NULL, NULL, ' R 123 029,00 ', NULL, '30-06-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(88, NULL, 'SNH_l_037', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Not yet signed off', NULL, NULL, NULL, '1', NULL, '15', NULL, NULL, NULL, ' R 130 498,00 ', NULL, '30-06-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(89, NULL, 'SNH_l_038', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Not yet signed off', NULL, NULL, NULL, '1', NULL, '10', NULL, NULL, NULL, ' R 136 025,00 ', NULL, '30-06-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(90, NULL, 'SNH_l_039', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '16/11/2017', NULL, NULL, NULL, '1', NULL, '1', NULL, NULL, NULL, ' R 3 032,00 ', NULL, '30-06-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(91, NULL, 'SNH_l_040', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Not yet signed off', NULL, NULL, NULL, '1', NULL, '1', NULL, NULL, NULL, ' R 14 945,00 ', NULL, '30-06-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(92, NULL, 'SNH_l_041', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '16/11/2017', NULL, NULL, NULL, '1', NULL, '2', NULL, NULL, NULL, ' R 3 032,00 ', NULL, '30-06-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(93, NULL, 'SNH_l_042', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '16/11/2017', NULL, NULL, NULL, '1', NULL, '3', NULL, NULL, NULL, ' R 3 032,00 ', NULL, '30-06-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(94, NULL, 'SNH_l_043', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Not yet signed off', NULL, NULL, NULL, '1', NULL, '1', NULL, NULL, NULL, ' R 16 028,00 ', NULL, '30-06-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(95, NULL, 'SNH_l_044', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Not yet signed off', NULL, NULL, NULL, '1', NULL, '18', NULL, NULL, NULL, ' R 30 107,00 ', NULL, '30-06-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(96, NULL, 'SNH_l_045', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '04/12/2017', NULL, NULL, NULL, '1', NULL, '1', NULL, NULL, NULL, ' R 3 032,00 ', NULL, '30-06-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(97, NULL, 'SNH_l_046', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '04/12/2017', NULL, NULL, NULL, '1', NULL, '1', NULL, NULL, NULL, ' R 3 032,00 ', NULL, '30-06-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(98, NULL, 'SNH_l_047', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Not yet signed off', NULL, NULL, NULL, '1', NULL, '4', NULL, NULL, NULL, ' R 40 071,00 ', NULL, '30-06-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(99, NULL, 'SNH_l_048', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '04/12/2017', NULL, NULL, NULL, '1', NULL, '3', NULL, NULL, NULL, ' R 20 360,00 ', NULL, '30-06-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(100, NULL, 'SNH_l_049', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '31-05-2017', NULL, NULL, NULL, '1', NULL, '18', NULL, NULL, NULL, ' R 60 000,00 ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(101, NULL, 'SNH_l_050', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '26-04-2017', NULL, NULL, NULL, '1', NULL, '9', NULL, NULL, NULL, ' R 72 747,00 ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(102, NULL, 'SNH_l_051', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '17-02-2017', NULL, NULL, NULL, '1', NULL, '242', NULL, NULL, NULL, ' R 114 554,00 ', NULL, '29-02-2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(103, NULL, 'SNH_l_052', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '17-02-2017', NULL, NULL, NULL, '1', NULL, '74', NULL, NULL, NULL, ' R 17 790,00 ', NULL, '29-02-2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(104, NULL, 'SNH_l_053', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '17-02-2017', NULL, NULL, NULL, '1', NULL, '146', NULL, NULL, NULL, ' R 14 371,00 ', NULL, '29-02-2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(105, NULL, 'SNH_l_054', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '31/08/2017', NULL, NULL, NULL, '1', NULL, '242', NULL, NULL, NULL, ' R 55 714,00 ', NULL, '28-02-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(106, NULL, 'SNH_l_055', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '31/08/2017', NULL, NULL, NULL, '1', NULL, '74', NULL, NULL, NULL, ' R 7 774,00 ', NULL, '28-02-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(107, NULL, 'SNH_l_056', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '31/08/2017', NULL, NULL, NULL, '1', NULL, '146', NULL, NULL, NULL, ' R 31 960,00 ', NULL, '28-02-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(108, NULL, 'SNH_l_057', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '19/09/2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 855 000,00 ', NULL, '31-03-2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(109, NULL, 'SNH_l_058', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '10-05-2017', NULL, NULL, NULL, '1', NULL, '27', NULL, NULL, NULL, ' R 82 324,00 ', NULL, '31-12-2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(110, NULL, 'SNH_l_059', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '06-07-2017', NULL, NULL, NULL, '1', NULL, '15', NULL, NULL, NULL, ' R 100 000,00 ', NULL, '29-02-2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(111, NULL, 'SNH_l_060', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '06-07-2017', NULL, NULL, NULL, '1', NULL, '10', NULL, NULL, NULL, ' R 9 536,04 ', NULL, '29-02-2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(112, NULL, 'SNH_l_061', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '06-07-2017', NULL, NULL, NULL, '1', NULL, '10', NULL, NULL, NULL, ' R 7 335,41 ', NULL, '29-02-2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(113, NULL, 'SNH_l_062', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '03-07-2017', NULL, NULL, NULL, '1', NULL, '17', NULL, NULL, NULL, ' R 16 705,00 ', NULL, '29-02-2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(114, NULL, 'SNH_l_063', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '06-07-2017', NULL, NULL, NULL, '1', NULL, '7', NULL, NULL, NULL, ' R 2 239,00 ', NULL, '29-02-2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(115, NULL, 'SNH_l_064', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '06-07-2017', NULL, NULL, NULL, '1', NULL, '5', NULL, NULL, NULL, ' R 3 100,00 ', NULL, '29-02-2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(116, NULL, 'SNH_l_065', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '06-07-2017', NULL, NULL, NULL, '1', NULL, '12', NULL, NULL, NULL, ' R 19 072,07 ', NULL, '29-02-2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(117, NULL, 'SNH_l_066', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '06-07-2017', NULL, NULL, NULL, '1', NULL, '8', NULL, NULL, NULL, ' R 5 501,56 ', NULL, '29-02-2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(118, NULL, 'SNH_l_067', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '06-07-2017', NULL, NULL, NULL, '1', NULL, '11', NULL, NULL, NULL, ' R 15 771,14 ', NULL, '29-02-2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(119, NULL, 'SNH_l_068', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '06-07-2017', NULL, NULL, NULL, '1', NULL, '9', NULL, NULL, NULL, ' R 4 034,89 ', NULL, '29-02-2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(120, NULL, 'SNH_l_069', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Not yet signed off', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 165 000,00 ', NULL, '29-02-2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(121, NULL, 'SNH_l_070', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Not yet signed off', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 95 400,00 ', NULL, '29-02-2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(122, NULL, 'SNH_l_071', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '10-08-2017', NULL, NULL, NULL, '1', NULL, '9', NULL, NULL, NULL, ' R 20 000,00 ', NULL, '30-04-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(123, NULL, 'SNH_l_072', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '21-08-2017', NULL, NULL, NULL, '1', NULL, '31', NULL, NULL, NULL, ' R 16 000,00 ', NULL, '30-04-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(124, NULL, 'SNH_l_073', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '21-04-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' Voluntary audit - not a legal entity ', NULL, '31-03-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(125, NULL, 'SNH_l_074', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '21-04-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' Voluntary audit - not a legal entity ', NULL, '31-03-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(126, NULL, 'SNH_l_075', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '21-04-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' Voluntary audit - not a legal entity ', NULL, '31-03-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(127, NULL, 'SNH_l_076', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '21-04-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' Voluntary audit - not a legal entity ', NULL, '31-03-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(128, NULL, 'SNH_l_077', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '21-04-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' Voluntary audit - not a legal entity ', NULL, '31-03-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(129, NULL, 'SNH_l_078', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '21-04-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' Voluntary audit - not a legal entity ', NULL, '31-03-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(130, NULL, 'SNH_l_079', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '21-04-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' Voluntary audit - not a legal entity ', NULL, '31-03-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(131, NULL, 'SNH_l_080', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '21-04-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' Voluntary audit - not a legal entity ', NULL, '31-03-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(132, NULL, 'SNH_l_081', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '21-04-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' Voluntary audit - not a legal entity ', NULL, '31-03-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(133, NULL, 'SNH_l_082', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '21-04-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' Voluntary audit - not a legal entity ', NULL, '31-03-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(134, NULL, 'SNH_l_083', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '21-04-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' Voluntary audit - not a legal entity ', NULL, '31-03-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(135, NULL, 'SNH_l_084', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '21-04-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' Voluntary audit - not a legal entity ', NULL, '31-03-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(136, NULL, 'SNH_l_085', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '21-04-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' Voluntary audit - not a legal entity ', NULL, '31-03-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(137, NULL, 'SNH_l_086', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '21-04-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' Voluntary audit - not a legal entity ', NULL, '31-03-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(138, NULL, 'SNH_l_087', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '21-04-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' Voluntary audit - not a legal entity ', NULL, '31-03-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(139, NULL, 'SNH_l_088', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Not yet signed off', NULL, NULL, NULL, '1', NULL, '1', NULL, NULL, NULL, ' R 52 358,00 ', NULL, '28-02-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(140, NULL, 'SNH_l_089', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Not yet signed off', NULL, NULL, NULL, '1', NULL, '1', NULL, NULL, NULL, ' R 125 046,00 ', NULL, '28-02-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(141, NULL, 'SNH_l_090', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '22/06/2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 145 906,00 ', NULL, '31/03/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(142, NULL, 'SNH_l_091', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '', NULL, NULL, NULL, '1', NULL, '', NULL, NULL, NULL, ' R -   ', NULL, '', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(143, NULL, 'SNH_l_092', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '', NULL, NULL, NULL, '1', NULL, '', NULL, NULL, NULL, ' R -   ', NULL, '', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(144, NULL, 'SNH_l_093', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '', NULL, NULL, NULL, '1', NULL, '', NULL, NULL, NULL, ' R -   ', NULL, '', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(145, NULL, 'SNH_l_094', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '', NULL, NULL, NULL, '1', NULL, '', NULL, NULL, NULL, ' R -   ', NULL, '', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(146, NULL, 'SNH_l_095', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '', NULL, NULL, NULL, '1', NULL, '', NULL, NULL, NULL, ' R -   ', NULL, '', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(147, NULL, 'SNH_l_096', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '', NULL, NULL, NULL, '1', NULL, '', NULL, NULL, NULL, ' R -   ', NULL, '', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(148, NULL, 'SNH_l_097', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '', NULL, NULL, NULL, '1', NULL, '', NULL, NULL, NULL, ' R -   ', NULL, '', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(149, NULL, 'SNH_l_098', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '', NULL, NULL, NULL, '1', NULL, '', NULL, NULL, NULL, ' R -   ', NULL, '', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(150, NULL, 'SNH_l_099', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '', NULL, NULL, NULL, '1', NULL, '', NULL, NULL, NULL, ' R -   ', NULL, '', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(151, NULL, 'SNH_l_100', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '', NULL, NULL, NULL, '1', NULL, '', NULL, NULL, NULL, ' R -   ', NULL, '', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(152, NULL, 'SNH_l_101', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '', NULL, NULL, NULL, '1', NULL, '', NULL, NULL, NULL, ' R 141 320,00 ', NULL, '31/12/2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(153, NULL, 'SNH_l_102', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R -   ', NULL, '31/12/2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(154, NULL, 'SNH_l_103', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '', NULL, NULL, NULL, '1', NULL, '', NULL, NULL, NULL, ' R -   ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(155, NULL, 'SNH_l_104', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R -   ', NULL, '31/12/2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(156, NULL, 'SNH_l_105', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '', NULL, NULL, NULL, '1', NULL, '115', NULL, NULL, NULL, ' R -   ', NULL, '', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(157, NULL, 'SNH_l_106', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '', NULL, NULL, NULL, '1', NULL, '696', NULL, NULL, NULL, ' R 200 000,00 ', NULL, '31/12/2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(158, NULL, 'SNH_l_107', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '', NULL, NULL, NULL, '1', NULL, '91', NULL, NULL, NULL, ' R -   ', NULL, '30-06-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(159, NULL, 'SNH_l_108', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '', NULL, NULL, NULL, '1', NULL, '', NULL, NULL, NULL, ' R -   ', NULL, '30/04/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(160, NULL, 'SNH_l_109', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '', NULL, NULL, NULL, '1', NULL, '', NULL, NULL, NULL, ' R -   ', NULL, '30/04/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(161, NULL, 'SNH_l_110', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '', NULL, NULL, NULL, '1', NULL, '', NULL, NULL, NULL, ' R -   ', NULL, '30/04/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(162, NULL, 'SNH_l_111', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '', NULL, NULL, NULL, '1', NULL, '', NULL, NULL, NULL, ' R -   ', NULL, '30/04/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(163, NULL, 'SNH_l_112', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '', NULL, NULL, NULL, '1', NULL, '', NULL, NULL, NULL, ' R -   ', NULL, '30/04/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(164, NULL, 'SNH_l_113', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '', NULL, NULL, NULL, '1', NULL, '', NULL, NULL, NULL, ' R -   ', NULL, '30/04/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(165, NULL, 'SNH_l_114', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '', NULL, NULL, NULL, '1', NULL, '', NULL, NULL, NULL, ' R -   ', NULL, '30/04/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(169, NULL, 'CTN_h_001', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '31-03-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 130 000,00 ', NULL, '29/02/2016', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(170, NULL, 'CTN_h_002', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '21-08-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R -   ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(171, NULL, 'CTN_h_003', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '31-07-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 107 557,00 ', NULL, '31-03-2017', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(172, NULL, 'CTN_h_004', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '31-08-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 98 325,00 ', NULL, '31-03-2017', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(173, NULL, 'CTN_h_005', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '31-07-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 97 708,00 ', NULL, '31-03-2017', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(174, NULL, 'CTN_h_006', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '31-07-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 93 718,00 ', NULL, '31-03-2017', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(175, NULL, 'CTN_h_007', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '21-08-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R -   ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(176, NULL, 'CTN_h_008', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '21-08-2017', NULL, NULL, NULL, '1', NULL, '4599', NULL, NULL, NULL, ' R 80 000,00 ', NULL, ' 28/02/2017 ', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(177, NULL, 'CTN_h_009', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '04-08-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R -   ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(178, NULL, 'CTN_h_010', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '29-09-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R -   ', NULL, '31/03/2017', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(179, NULL, 'CTN_h_011', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '31-03-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R -   ', NULL, '29/02/2016', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(180, NULL, 'CTN_h_012', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '14-08-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R -   ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(181, NULL, 'CTN_h_013', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '06-07-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 50 000,00 ', NULL, '29/02/2016', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(182, NULL, 'CTN_h_014', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '30/08/2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R -   ', NULL, '28/02/2016', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(183, NULL, 'CTN_h_015', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Not yet signed off', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R -   ', NULL, ' 28/02/2017 ', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(184, NULL, 'CTN_h_016', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '30/08/2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R -   ', NULL, ' 28/02/2017 ', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(185, NULL, 'CTN_h_017', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '30/08/2017', NULL, NULL, NULL, '1', NULL, '20', NULL, NULL, NULL, ' R -   ', NULL, ' 28/02/2017 ', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(188, NULL, 'CTN_l_001', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '28-02-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 177 000,00 ', NULL, '31-12-2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(189, NULL, 'CTN_l_002', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Pending', NULL, NULL, NULL, '1', NULL, '77', NULL, NULL, NULL, ' R 174 000,00 ', NULL, '28-02-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(190, NULL, 'CTN_l_003', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Pending', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 130 000,00 ', NULL, '30-04-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(191, NULL, 'CTN_l_004', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Pending', NULL, NULL, NULL, '1', NULL, '215', NULL, NULL, NULL, ' R 112 395,00 ', NULL, '30-06-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(192, NULL, 'CTN_l_005', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'AGM Pending', NULL, NULL, NULL, '1', NULL, '14', NULL, NULL, NULL, ' R 81 000,00 ', NULL, '31-12-2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(193, NULL, 'CTN_l_007', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '29-03-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 66 500,00 ', NULL, '31-03-2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(194, NULL, 'CTN_l_008', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '12-06-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 65 000,00 ', NULL, '30-04-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(195, NULL, 'CTN_l_009', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Pending', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 52 700,00 ', NULL, '31-03-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(196, NULL, 'CTN_l_010', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Pending', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 50 000,00 ', NULL, '30-04-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(197, NULL, 'CTN_l_011', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Pending', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 47 700,00 ', NULL, '31-03-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(198, NULL, 'CTN_l_012', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Pending', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 47 700,00 ', NULL, '31-03-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(199, NULL, 'CTN_l_014', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '11-09-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 37 414,00 ', NULL, '31-12-2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(200, NULL, 'CTN_l_016', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Pending', NULL, NULL, NULL, '1', NULL, '95', NULL, NULL, NULL, ' R 35 000,00 ', NULL, '28-02-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(201, NULL, 'CTN_l_017', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Pending', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 35 000,00 ', NULL, '30-04-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(202, NULL, 'CTN_l_018', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '11-09-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 32 000,00 ', NULL, '31-12-2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(203, NULL, 'CTN_l_019', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '18-07-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 30 000,00 ', NULL, '30-04-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(204, NULL, 'CTN_l_024', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '29-07-2017', NULL, NULL, NULL, '1', NULL, '20', NULL, NULL, NULL, ' R 16 000,00 ', NULL, '29-02-2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(206, NULL, 'CTN_l_001', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '28-02-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 177 000,00 ', NULL, '31-12-2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(232, NULL, 'PTR_h_001', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Estimate Sign-off Date - 15-12-2017', NULL, NULL, NULL, '1', NULL, '2091', NULL, NULL, NULL, ' R 479 422,50 ', NULL, '31/07/2017', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(207, NULL, 'CTN_l_002', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Pending', NULL, NULL, NULL, '1', NULL, '77', NULL, NULL, NULL, ' R 174 000,00 ', NULL, '28-02-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(208, NULL, 'CTN_l_003', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Pending', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 130 000,00 ', NULL, '30-04-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(209, NULL, 'CTN_l_004', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Pending', NULL, NULL, NULL, '1', NULL, '215', NULL, NULL, NULL, ' R 112 395,00 ', NULL, '30-06-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(210, NULL, 'CTN_l_005', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'AGM Pending', NULL, NULL, NULL, '1', NULL, '14', NULL, NULL, NULL, ' R 81 000,00 ', NULL, '31-12-2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(211, NULL, 'CTN_l_006', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '26-09-2016', NULL, NULL, NULL, '1', NULL, '41', NULL, NULL, NULL, ' R 70 000,00 ', NULL, '29-02-2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(212, NULL, 'CTN_l_007', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '29-03-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 66 500,00 ', NULL, '31-03-2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(213, NULL, 'CTN_l_008', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '12-06-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 65 000,00 ', NULL, '30-04-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(214, NULL, 'CTN_l_009', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Pending', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 52 700,00 ', NULL, '31-03-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(215, NULL, 'CTN_l_010', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Pending', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 50 000,00 ', NULL, '30-04-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(216, NULL, 'CTN_l_011', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Pending', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 47 700,00 ', NULL, '31-03-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(217, NULL, 'CTN_l_012', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Pending', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 47 700,00 ', NULL, '31-03-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(218, NULL, 'CTN_l_013', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '10-10-2016', NULL, NULL, NULL, '1', NULL, '9', NULL, NULL, NULL, ' R 39 250,00 ', NULL, '29-02-2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(219, NULL, 'CTN_l_014', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '11-09-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 37 414,00 ', NULL, '31-12-2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(220, NULL, 'CTN_l_015', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '01-08-2016', NULL, NULL, NULL, '1', NULL, '16', NULL, NULL, NULL, ' R 36 500,00 ', NULL, '29-02-2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(221, NULL, 'CTN_l_016', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Pending', NULL, NULL, NULL, '1', NULL, '95', NULL, NULL, NULL, ' R 35 000,00 ', NULL, '28-02-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(222, NULL, 'CTN_l_017', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Pending', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 35 000,00 ', NULL, '30-04-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(223, NULL, 'CTN_l_018', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '11-09-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 32 000,00 ', NULL, '31-12-2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(224, NULL, 'CTN_l_019', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '18-07-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 30 000,00 ', NULL, '30-04-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(225, NULL, 'CTN_l_020', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '10-10-2016', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 22 500,00 ', NULL, '31-03-2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(226, NULL, 'CTN_l_021', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '28-06-2016', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 19 500,00 ', NULL, '31-12-2015', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(227, NULL, 'CTN_l_022', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '10-10-2016', NULL, NULL, NULL, '1', NULL, '25', NULL, NULL, NULL, ' R 17 500,00 ', NULL, '29-02-2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(228, NULL, 'CTN_l_023', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '10-10-2016', NULL, NULL, NULL, '1', NULL, '26', NULL, NULL, NULL, ' R 17 500,00 ', NULL, '29-02-2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(229, NULL, 'CTN_l_024', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '29-07-2017', NULL, NULL, NULL, '1', NULL, '20', NULL, NULL, NULL, ' R 16 000,00 ', NULL, '29-02-2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(230, NULL, 'CTN_l_025', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '10-10-2016', NULL, NULL, NULL, '1', NULL, '7', NULL, NULL, NULL, ' R 15 000,00 ', NULL, '29-02-2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(233, NULL, 'PTR_h_002', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '21-09-2017', NULL, NULL, NULL, '1', NULL, '63', NULL, NULL, NULL, ' R 87 000,00 ', NULL, '30/06/2017', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(234, NULL, 'PTR_h_003', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '25-07-2017', NULL, NULL, NULL, '1', NULL, '44', NULL, NULL, NULL, ' R 70 478,00 ', NULL, '31/03/2017', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(235, NULL, 'PTR_h_004', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '31-08-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 47 685,00 ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(236, NULL, 'PTR_h_005', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Estimate Sign-off Date - 30-11-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 46 300,00 ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(237, NULL, 'PTR_h_006', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '30-06-2017', NULL, NULL, NULL, '1', NULL, '1', NULL, NULL, NULL, ' R 29 000,00 ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(238, NULL, 'PTR_h_007', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '31-10-2017', NULL, NULL, NULL, '1', NULL, '10', NULL, NULL, NULL, ' R 21 400,00 ', NULL, '30/06//2017', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(239, NULL, 'PTR_h_008', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '30-06-2017', NULL, NULL, NULL, '1', NULL, '3', NULL, NULL, NULL, ' R 19 850,00 ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(240, NULL, 'PTR_h_009', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '30-06-2017', NULL, NULL, NULL, '1', NULL, '5', NULL, NULL, NULL, ' R 15 290,00 ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(241, NULL, 'PTR_h_010', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '31-08-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 13 600,00 ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(242, NULL, 'PTR_h_011', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '31-08-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 5 670,00 ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(244, NULL, 'PTR_l_001', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Estimate Sign-off Date - 14-12-2017', NULL, NULL, NULL, '1', NULL, '140', NULL, NULL, NULL, ' R 217 508,09 ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(285, NULL, 'EGT_h_001', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Not yet signed off', NULL, NULL, NULL, '1', NULL, '517', NULL, NULL, NULL, ' R 495 772,00 ', NULL, '31/08/2017', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(245, NULL, 'PTR_l_002', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '02-05-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 198 835,00 ', NULL, '15/12/2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(246, NULL, 'PTR_l_003', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Estimate Sign-off Date - 30-11-2017', NULL, NULL, NULL, '1', NULL, '134', NULL, NULL, NULL, ' R 145 000,00 ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(247, NULL, 'PTR_l_004', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '05-09-2017', NULL, NULL, NULL, '1', NULL, '53', NULL, NULL, NULL, ' R 126 000,00 ', NULL, '28/02/2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(248, NULL, 'PTR_l_005', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Estimate Sign-off Date - 28-02-2018', NULL, NULL, NULL, '1', NULL, '250', NULL, NULL, NULL, ' R 117 325,50 ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(249, NULL, 'PTR_l_006', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Estimate Sign-off Date - 06-12-2017', NULL, NULL, NULL, '1', NULL, '11', NULL, NULL, NULL, ' R 78 750,00 ', NULL, '30/06/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(250, NULL, 'PTR_l_007', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Estimate Sign-off Date - 30-11-2017', NULL, NULL, NULL, '1', NULL, '46', NULL, NULL, NULL, ' R 62 000,00 ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(251, NULL, 'PTR_l_008', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '24-08-2017', NULL, NULL, NULL, '1', NULL, '39', NULL, NULL, NULL, ' R 58 725,00 ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(252, NULL, 'PTR_l_009', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '30/06/2017', NULL, NULL, NULL, '1', NULL, '15', NULL, NULL, NULL, ' R 43 510,00 ', NULL, '31/12/2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(253, NULL, 'PTR_l_010', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '25-01-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 41 470,00 ', NULL, '31/07/2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(254, NULL, 'PTR_l_011', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Estimate Sign-off Date - 28-02-2018', NULL, NULL, NULL, '1', NULL, '132', NULL, NULL, NULL, ' R 38 500,00 ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(255, NULL, 'PTR_l_012', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Estimate Sign-off Date - 06-12-2017', NULL, NULL, NULL, '1', NULL, '1', NULL, NULL, NULL, ' R 37 590,00 ', NULL, '30/06/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL);
INSERT INTO `engagements` (`id`, `date`, `client`, `engagement_date`, `engagement_type`, `engaged_by`, `engagement_status`, `start_notes`, `active_status`, `engagement_id`, `city`, `assurance`, `date_resigned`, `rotation_period`, `rotation_year`, `anticipated_rotation_partner`, `editable`, `group_structure`, `companies_act`, `irba_code`, `isqc_1`, `isqc_2`, `amount_billed`, `jse_listed`, `year_of_afs`, `when_next_irba`, `accounting_framework`, `client_turnover`, `first_engagement_date`, `assurance_work`, `risk`, `audit_required`) VALUES
(256, NULL, 'PTR_l_013', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '26-05-2017', NULL, NULL, NULL, '1', NULL, '132', NULL, NULL, NULL, ' R 35 000,00 ', NULL, '28/02/2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(257, NULL, 'PTR_l_014', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Estimate Sign-off Date - 14-12-2017', NULL, NULL, NULL, '1', NULL, '21', NULL, NULL, NULL, ' R 27 820,00 ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(258, NULL, 'PTR_l_015', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Estimate Sign-off Date - 14-12-2017', NULL, NULL, NULL, '1', NULL, '10', NULL, NULL, NULL, ' R 24 610,00 ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(259, NULL, 'PTR_l_016', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Estimate Sign-off Date - 28-02-2018', NULL, NULL, NULL, '1', NULL, '5', NULL, NULL, NULL, ' R 31 993,00 ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(260, NULL, 'PTR_l_017', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Estimate Sign-off Date - 14-12-2017', NULL, NULL, NULL, '1', NULL, '34', NULL, NULL, NULL, ' R 21 935,00 ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(261, NULL, 'PTR_l_018', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '07-04-2017', NULL, NULL, NULL, '1', NULL, '8', NULL, NULL, NULL, ' R 21 366,00 ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(262, NULL, 'PTR_l_019', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Estimate Sign-off Date - 15-12-2017', NULL, NULL, NULL, '1', NULL, '2', NULL, NULL, NULL, ' R 20 000,00 ', NULL, '30/06/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(263, NULL, 'PTR_l_020', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Estimate Sign-off Date - 30-11-2017', NULL, NULL, NULL, '1', NULL, '7', NULL, NULL, NULL, ' R 20 000,00 ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(264, NULL, 'PTR_l_021', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Estimate Sign-off Date - 30-11-2017', NULL, NULL, NULL, '1', NULL, '49', NULL, NULL, NULL, ' R 20 000,00 ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(265, NULL, 'PTR_l_022', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Estimate Sign-off Date - 30-11-2017', NULL, NULL, NULL, '1', NULL, '1', NULL, NULL, NULL, ' R 20 000,00 ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(266, NULL, 'PTR_l_023', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '05-09-2017', NULL, NULL, NULL, '1', NULL, '0', NULL, NULL, NULL, ' R 18 000,00 ', NULL, '28/02/2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(267, NULL, 'PTR_l_024', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '05-09-2017', NULL, NULL, NULL, '1', NULL, '40', NULL, NULL, NULL, ' R 18 000,00 ', NULL, '28/02/2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(268, NULL, 'PTR_l_025', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '05-09-2017', NULL, NULL, NULL, '1', NULL, '2', NULL, NULL, NULL, ' R 18 000,00 ', NULL, '28/02/2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(269, NULL, 'PTR_l_026', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '05-05-2017', NULL, NULL, NULL, '1', NULL, '39', NULL, NULL, NULL, ' R 17 445,00 ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(270, NULL, 'PTR_l_027', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '05-05-2017', NULL, NULL, NULL, '1', NULL, '39', NULL, NULL, NULL, ' R 17 445,00 ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(271, NULL, 'PTR_l_028', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '24-03-2017', NULL, NULL, NULL, '1', NULL, '5', NULL, NULL, NULL, ' R 17 000,00 ', NULL, '28/02/2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(272, NULL, 'PTR_l_029', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '27/06/2017', NULL, NULL, NULL, '1', NULL, '2', NULL, NULL, NULL, ' R 15 639,68 ', NULL, '30/06/2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(273, NULL, 'PTR_l_030', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '21-04-2017', NULL, NULL, NULL, '1', NULL, '2', NULL, NULL, NULL, ' R 12 840,00 ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(274, NULL, 'PTR_l_031', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '21-04-2017', NULL, NULL, NULL, '1', NULL, '2', NULL, NULL, NULL, ' R 12 000,00 ', NULL, '30/06/2015', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(275, NULL, 'PTR_l_032', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Estimate Sign-off Date - 17-11-2017', NULL, NULL, NULL, '1', NULL, '8', NULL, NULL, NULL, ' R 11 000,00 ', NULL, '31/05/2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(276, NULL, 'PTR_l_033', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Estimate Sign-off Date - 24-11-2017', NULL, NULL, NULL, '1', NULL, '8', NULL, NULL, NULL, ' R 11 000,00 ', NULL, '31/05/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(277, NULL, 'PTR_l_034', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '07-04-2017', NULL, NULL, NULL, '1', NULL, '3', NULL, NULL, NULL, ' R 10 970,00 ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(278, NULL, 'PTR_l_035', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '07-04-2017', NULL, NULL, NULL, '1', NULL, '3', NULL, NULL, NULL, ' R 10 970,00 ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(279, NULL, 'PTR_l_036', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '07-06-2017', NULL, NULL, NULL, '1', NULL, '2', NULL, NULL, NULL, ' R 10 000,00 ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(280, NULL, 'PTR_l_037', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '07-08-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 9 500,00 ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(281, NULL, 'PTR_l_038', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Estimate Sign-off Date - 15-12-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 9 000,00 ', NULL, '30/06/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(282, NULL, 'PTR_l_039', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '13-04-2017', NULL, NULL, NULL, '1', NULL, '5', NULL, NULL, NULL, ' R 7 500,00 ', NULL, '30/11/2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(283, NULL, 'PTR_l_040', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Estimate Sign-off Date - 30-11-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, 'R', NULL, '31/07/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(301, NULL, 'EGT_l_001', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Estimated Sign-off Date 15/01/2018', NULL, NULL, NULL, '1', NULL, '279', NULL, NULL, NULL, ' R 345 000,00 ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(286, NULL, 'EGT_h_002', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '10/03/2017', NULL, NULL, NULL, '1', NULL, '2347', NULL, NULL, NULL, ' R 367 300,00 ', NULL, '31/01/2017', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(287, NULL, 'EGT_h_003', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '14/07/2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 354 500,00 ', NULL, '31/12/2016', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(288, NULL, 'EGT_h_004', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '28/03/2017', NULL, NULL, NULL, '1', NULL, '369', NULL, NULL, NULL, ' R 320 700,00 ', NULL, '31/12/2016', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(289, NULL, 'EGT_h_005', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '11/07/2017', NULL, NULL, NULL, '1', NULL, '362', NULL, NULL, NULL, ' R 175 000,00 ', NULL, '29/02/2017', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(290, NULL, 'EGT_h_006', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '06/07/2017', NULL, NULL, NULL, '1', NULL, '267', NULL, NULL, NULL, ' R 135 000,00 ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(291, NULL, 'EGT_h_007', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '31/10/2017', NULL, NULL, NULL, '1', NULL, '469', NULL, NULL, NULL, ' R 108 000,00 ', NULL, '30/06/2017', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(292, NULL, 'EGT_h_008', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '30/10/2017', NULL, NULL, NULL, '1', NULL, '25', NULL, NULL, NULL, ' R 94 358,00 ', NULL, '31/07/2017', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(293, NULL, 'EGT_h_009', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '24/02/2017', NULL, NULL, NULL, '1', NULL, '66', NULL, NULL, NULL, ' R 55 000,00 ', NULL, '28/02/2016', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(294, NULL, 'EGT_h_010', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '29/08/2017', NULL, NULL, NULL, '1', NULL, '46', NULL, NULL, NULL, ' R 29 000,00 ', NULL, '29/02/2016', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(295, NULL, 'EGT_h_011', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '28/06/2017', NULL, NULL, NULL, '1', NULL, '4', NULL, NULL, NULL, ' R 15 225,00 ', NULL, '29/02/2017', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(296, NULL, 'EGT_h_012', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '09/10/2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 10 450,00 ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(297, NULL, 'EGT_h_013', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '18/04/2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 10 000,00 ', NULL, '28/02/2016', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(298, NULL, 'EGT_h_014', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '29/08/2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 7 100,00 ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(299, NULL, 'EGT_h_015', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '31/08/2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 5 400,00 ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(364, NULL, 'DBN_h_001', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '03-10-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 1 266 000,00 ', NULL, '30/06/2017', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(302, NULL, 'EGT_l_002', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '31/05/2017', NULL, NULL, NULL, '1', NULL, '9', NULL, NULL, NULL, ' R 245 000,00 ', NULL, '31/12/2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(303, NULL, 'EGT_l_003', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '13-06-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 171 800,00 ', NULL, '31/12/2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(304, NULL, 'EGT_l_004', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '22/08/2017', NULL, NULL, NULL, '1', NULL, '154', NULL, NULL, NULL, ' R 142 450,00 ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(305, NULL, 'EGT_l_005', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '19/06/2017', NULL, NULL, NULL, '1', NULL, '199', NULL, NULL, NULL, ' R 104 100,00 ', NULL, '31/12/2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(306, NULL, 'EGT_l_006', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '11/05/2017', NULL, NULL, NULL, '1', NULL, '195', NULL, NULL, NULL, ' R 96 000,00 ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(307, NULL, 'EGT_l_007', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '14/06/2016', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 85 000,00 ', NULL, '28/02/2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(308, NULL, 'EGT_l_008', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Estimated Sign-off Date 30/01/2018', NULL, NULL, NULL, '1', NULL, '46', NULL, NULL, NULL, ' R 72 000,00 ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(309, NULL, 'EGT_l_009', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '18/05/2017', NULL, NULL, NULL, '1', NULL, '91', NULL, NULL, NULL, ' R 66 550,00 ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(310, NULL, 'EGT_l_010', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '20/06/2017', NULL, NULL, NULL, '1', NULL, '9', NULL, NULL, NULL, ' R 53 300,00 ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(311, NULL, 'EGT_l_011', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '20/07/2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 48 300,00 ', NULL, '31/03/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(312, NULL, 'EGT_l_012', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '27/07/2017', NULL, NULL, NULL, '1', NULL, '19', NULL, NULL, NULL, ' R 47 760,00 ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(313, NULL, 'EGT_l_013', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '16/05/2017', NULL, NULL, NULL, '1', NULL, '47', NULL, NULL, NULL, ' R 40 925,00 ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(314, NULL, 'EGT_l_014', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '29/06/2017', NULL, NULL, NULL, '1', NULL, '6', NULL, NULL, NULL, ' R 40 000,00 ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(315, NULL, 'EGT_l_015', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Estimated Sign-off 30/11/2017', NULL, NULL, NULL, '1', NULL, '57', NULL, NULL, NULL, ' R 40 000,00 ', NULL, '29/02/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(316, NULL, 'EGT_l_016', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Estimated Sign-off Date 30/11/2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 34 650,00 ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(317, NULL, 'EGT_l_017', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '19/06/2017', NULL, NULL, NULL, '1', NULL, '43', NULL, NULL, NULL, ' R 32 400,00 ', NULL, '31/12/2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(318, NULL, 'EGT_l_018', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '31/05/2017', NULL, NULL, NULL, '1', NULL, '9', NULL, NULL, NULL, ' R 29 850,00 ', NULL, '31/12/2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(319, NULL, 'EGT_l_019', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '08/08/2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 26 532,00 ', NULL, '29/02/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(320, NULL, 'EGT_l_020', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '09/06/2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 25 410,00 ', NULL, '31/12/2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(321, NULL, 'EGT_l_021', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '05/05/2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 23 790,00 ', NULL, '31/12/2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(322, NULL, 'EGT_l_022', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '23/08/2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 21 543,86 ', NULL, '31/03/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(323, NULL, 'EGT_l_023', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Estimated Sign-off Date 15/01/2018', NULL, NULL, NULL, '1', NULL, '13', NULL, NULL, NULL, ' R 21 400,00 ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(324, NULL, 'EGT_l_024', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '15/09/2017', NULL, NULL, NULL, '1', NULL, '91', NULL, NULL, NULL, ' R 18 706,45 ', NULL, '30/06/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(325, NULL, 'EGT_l_025', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '15/09/2017', NULL, NULL, NULL, '1', NULL, '8', NULL, NULL, NULL, ' R 18 706,45 ', NULL, '30/06/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(326, NULL, 'EGT_l_026', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '15/09/2017', NULL, NULL, NULL, '1', NULL, '0', NULL, NULL, NULL, ' R 18 338,00 ', NULL, '31/03/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(327, NULL, 'EGT_l_027', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '15/09/2017', NULL, NULL, NULL, '1', NULL, '9', NULL, NULL, NULL, ' R 17 857,70 ', NULL, '30/06/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(328, NULL, 'EGT_l_028', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '21/08/2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 17 800,00 ', NULL, '30/06/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(329, NULL, 'EGT_l_029', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '15/09/2017', NULL, NULL, NULL, '1', NULL, '29', NULL, NULL, NULL, ' R 17 484,25 ', NULL, '30/06/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(330, NULL, 'EGT_l_030', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '15/09/2017', NULL, NULL, NULL, '1', NULL, '22', NULL, NULL, NULL, ' R 16 975,00 ', NULL, '30/06/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(331, NULL, 'EGT_l_031', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '15/09/2017', NULL, NULL, NULL, '1', NULL, '29', NULL, NULL, NULL, ' R 16 669,45 ', NULL, '30/06/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(332, NULL, 'EGT_l_032', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Estimated Sign-off Date 15/01/2018', NULL, NULL, NULL, '1', NULL, '5', NULL, NULL, NULL, ' R 16 600,00 ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(333, NULL, 'EGT_l_033', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '26/07/2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 16 000,00 ', NULL, '31/03/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(334, NULL, 'EGT_l_034', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Estimated Sign-off 30/11/2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 15 750,00 ', NULL, '31/12/2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(335, NULL, 'EGT_l_035', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '15/09/2017', NULL, NULL, NULL, '1', NULL, '12', NULL, NULL, NULL, ' R 15 481,20 ', NULL, '30/06/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(336, NULL, 'EGT_l_036', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '31/01/2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 15 120,00 ', NULL, '31/12/2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(337, NULL, 'EGT_l_037', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '13/09/2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 15 056,00 ', NULL, '31/03/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(338, NULL, 'EGT_l_038', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '15/09/2017', NULL, NULL, NULL, '1', NULL, '26', NULL, NULL, NULL, ' R 14 404,50 ', NULL, '30/06/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(339, NULL, 'EGT_l_039', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '15/09/2017', NULL, NULL, NULL, '1', NULL, '13', NULL, NULL, NULL, ' R 13 095,00 ', NULL, '30/06/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(340, NULL, 'EGT_l_040', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '29/06/2017', NULL, NULL, NULL, '1', NULL, '3', NULL, NULL, NULL, ' R 12 800,00 ', NULL, '28-02-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(341, NULL, 'EGT_l_041', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '27/03/2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 12 700,00 ', NULL, '31/12/2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(342, NULL, 'EGT_l_042', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '30/05/2017', NULL, NULL, NULL, '1', NULL, '3', NULL, NULL, NULL, ' R 11 000,00 ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(343, NULL, 'EGT_l_043', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '31/03/2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 11 000,00 ', NULL, '31/03/2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(344, NULL, 'EGT_l_044', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '15/09/2017', NULL, NULL, NULL, '1', NULL, '161', NULL, NULL, NULL, ' R 10 815,50 ', NULL, '30/06/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(345, NULL, 'EGT_l_045', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '15/03/2017', NULL, NULL, NULL, '1', NULL, '3', NULL, NULL, NULL, ' R 10 000,00 ', NULL, '31/12/2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(346, NULL, 'EGT_l_046', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '15/05/2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 9 982,50 ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(347, NULL, 'EGT_l_047', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '15/05/2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 9 982,50 ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(348, NULL, 'EGT_l_048', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '15/05/2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 9 982,50 ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(349, NULL, 'EGT_l_049', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '15/05/2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 9 982,00 ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(350, NULL, 'EGT_l_050', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Estimated Sign-off Date 15/01/2018', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 9 700,00 ', NULL, '29/02/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(351, NULL, 'EGT_l_051', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '15/05/2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 9 680,00 ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(352, NULL, 'EGT_l_052', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '31/05/2017', NULL, NULL, NULL, '1', NULL, '62', NULL, NULL, NULL, ' R 9 240,00 ', NULL, '31/12/2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(353, NULL, 'EGT_l_053', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '15/05/2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 9 082,50 ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(354, NULL, 'EGT_l_054', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '26/07/2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 8 800,00 ', NULL, '31/03/2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(355, NULL, 'EGT_l_055', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '01-05-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 8 210,53 ', NULL, '31/12/2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(356, NULL, 'EGT_l_056', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '16/05/2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 8 200,00 ', NULL, '31/12/2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(357, NULL, 'EGT_l_057', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '30/06/2016', NULL, NULL, NULL, '1', NULL, '119', NULL, NULL, NULL, ' R 7 700,00 ', NULL, '29/02/2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(358, NULL, 'EGT_l_058', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '20/07/2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 6 600,00 ', NULL, '31/03/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(359, NULL, 'EGT_l_059', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '07-06-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 4 700,00 ', NULL, '31/12/2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(360, NULL, 'EGT_l_060', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '01/08/2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 3 500,00 ', NULL, '31/03/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(361, NULL, 'EGT_l_061', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '11/09/2017', NULL, NULL, NULL, '1', NULL, '0', NULL, NULL, NULL, ' R 1 000,00 ', NULL, '31/03/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(362, NULL, 'EGT_l_062', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Estimated Sign-off Date 30/11/2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, '', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(365, NULL, 'DBN_h_002', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '25-08-2017', NULL, NULL, NULL, '1', NULL, '1005', NULL, NULL, NULL, ' R 250 000,00 ', NULL, '29/02/2016', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(366, NULL, 'DBN_h_003', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '26/05/2017', NULL, NULL, NULL, '1', NULL, '383', NULL, NULL, NULL, ' R 206 875,00 ', NULL, '29/02/2016', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(367, NULL, 'DBN_h_004', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '30/06/2017', NULL, NULL, NULL, '1', NULL, '489', NULL, NULL, NULL, ' R 206 875,00 ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(368, NULL, 'DBN_h_005', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Estimate Sign-off Date 30-11-2017', NULL, NULL, NULL, '1', NULL, '743', NULL, NULL, NULL, ' R 180 000,00 ', NULL, '30/06/2017', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(369, NULL, 'DBN_h_006', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Estimate Sign-off Date 15-12-2017', NULL, NULL, NULL, '1', NULL, '>350', NULL, NULL, NULL, ' R 124 000,00 ', NULL, '30/04/2017', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(370, NULL, 'DBN_h_007', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '25-08-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 35 000,00 ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(371, NULL, 'DBN_h_008', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '16-08-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 31 500,00 ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(372, NULL, 'DBN_h_009', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '25-08-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 27 500,00 ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(373, NULL, 'DBN_h_010', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '21-08-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 16 000,00 ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(374, NULL, 'DBN_h_011', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '07-08-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 11 500,00 ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(375, NULL, 'DBN_h_012', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '02-08-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 11 500,00 ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(376, NULL, 'DBN_h_013', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '21-08-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 10 000,00 ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(377, NULL, 'DBN_h_014', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '26-04-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 9 275,00 ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(378, NULL, 'DBN_h_015', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '29-08-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 9 000,00 ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(379, NULL, 'DBN_h_016', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '26-04-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 1 475,00 ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(380, NULL, 'DBN_h_017', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Resigned- no audit done', NULL, NULL, NULL, '1', NULL, '', NULL, NULL, NULL, ' RESIGNED AS AUDITORS  ', NULL, '30/06/2017', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(381, NULL, 'DBN_h_018', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Estimate Sign-off Date 01-02-2018', NULL, NULL, NULL, '1', NULL, '523', NULL, NULL, NULL, ' Audit not yet commenced ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(382, NULL, 'DBN_h_019', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Estimate Sign-off Date 28-02-2018', NULL, NULL, NULL, '1', NULL, '589', NULL, NULL, NULL, ' Audit not yet commenced ', NULL, '28/02/2017', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(383, NULL, 'DBN_h_020', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Estimate Sign-off Date 28-02-2018', NULL, NULL, NULL, '1', NULL, '1500', NULL, NULL, NULL, ' Audit in progress ', NULL, '30/06/2017', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(384, NULL, 'DBN_h_021', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Estimate Sign-off Date 28-02-2018', NULL, NULL, NULL, '1', NULL, '94', NULL, NULL, NULL, ' Audit in progress ', NULL, '30/06/2017', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(385, NULL, 'DBN_h_022', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Estimate Sign-off Date 28-02-2018', NULL, NULL, NULL, '1', NULL, '92', NULL, NULL, NULL, ' Audit in progress ', NULL, '30/06/2017', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(386, NULL, 'DBN_h_023', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Estimate Sign-off Date 28-02-2018', NULL, NULL, NULL, '1', NULL, '107', NULL, NULL, NULL, ' Audit in progress ', NULL, '30/06/2017', NULL, NULL, NULL, NULL, NULL, 'High', NULL),
(388, NULL, 'DBN_l_002', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Estimate Sign-off Date 28-02-2018', NULL, NULL, NULL, '1', NULL, '15', NULL, NULL, NULL, ' not yet billed ', NULL, '28-02-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(402, NULL, 'DBN_l_001', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Estimate Sign-off Date 28-02-2018', NULL, NULL, NULL, '1', NULL, '43', NULL, NULL, NULL, ' work not yet commenced ', NULL, '28-02-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(389, NULL, 'DBN_l_005', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '15-09-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' not yet billed ', NULL, '28-02-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(390, NULL, 'DBN_l_015', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '27-07-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' no charge ', NULL, '30/04/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(391, NULL, 'DBN_l_017', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '14-08-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 164 000,00 ', NULL, '30/04/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(392, NULL, 'DBN_l_023', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '08-08-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 52 500,00 ', NULL, '28-02-2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(393, NULL, 'DBN_l_028', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '29-06-2017', NULL, NULL, NULL, '1', NULL, '138', NULL, NULL, NULL, ' R 32 500,00 ', NULL, '31-12-2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(394, NULL, 'DBN_l_031', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '31-08-2017', NULL, NULL, NULL, '1', NULL, '26', NULL, NULL, NULL, ' R 25 000,00 ', NULL, '28-02-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(395, NULL, 'DBN_l_032', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '20-03-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 22 000,00 ', NULL, '31-03-2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(396, NULL, 'DBN_l_035', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '16-08-2017', NULL, NULL, NULL, '1', NULL, '10', NULL, NULL, NULL, ' R 12 100,00 ', NULL, '28-02-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(397, NULL, 'DBN_l_039', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '22 June 2017', NULL, NULL, NULL, '1', NULL, '19', NULL, NULL, NULL, ' R 9 000,00 ', NULL, '31/12/2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(398, NULL, 'DBN_l_040', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '05-07-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 7 000,00 ', NULL, '28-02-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(399, NULL, 'DBN_l_041', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '05-07-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 6 300,00 ', NULL, '28-02-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(400, NULL, 'DBN_l_042', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '21-04-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 4 500,00 ', NULL, '28-02-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(449, NULL, 'BLM_l_001', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '12/07/2017', NULL, NULL, NULL, '1', NULL, '56', NULL, NULL, NULL, ' R 65 034,44 ', NULL, '30-04-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(403, NULL, 'DBN_l_002', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Estimate Sign-off Date 28-02-2018', NULL, NULL, NULL, '1', NULL, '15', NULL, NULL, NULL, ' not yet billed ', NULL, '28-02-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(404, NULL, 'DBN_l_003', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Estimate Sign-off Date 28-02-2018', NULL, NULL, NULL, '1', NULL, '26', NULL, NULL, NULL, ' not yet billed ', NULL, '29-02-2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(405, NULL, 'DBN_l_004', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Estimate Sign-off Date 28-02-2018', NULL, NULL, NULL, '1', NULL, '11', NULL, NULL, NULL, ' not yet billed ', NULL, '29-02-2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(406, NULL, 'DBN_l_005', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '15-09-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' not yet billed ', NULL, '28-02-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(407, NULL, 'DBN_l_006', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Estimate Sign-off Date 28-02-2018', NULL, NULL, NULL, '1', NULL, '7', NULL, NULL, NULL, ' not yet billed ', NULL, '28-02-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(408, NULL, 'DBN_l_007', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Estimate Sign-off Date 28-02-2018', NULL, NULL, NULL, '1', NULL, '16', NULL, NULL, NULL, ' not yet billed ', NULL, '28-02-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(409, NULL, 'DBN_l_008', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Estimate Sign-off Date 28-02-2018', NULL, NULL, NULL, '1', NULL, '7', NULL, NULL, NULL, ' not yet billed ', NULL, '29/02/2019', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(410, NULL, 'DBN_l_009', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Estimate Sign-off Date 28-02-2018', NULL, NULL, NULL, '1', NULL, '15', NULL, NULL, NULL, ' not yet billed ', NULL, '28-02-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(411, NULL, 'DBN_l_010', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Estimate Sign-off Date 28-02-2018', NULL, NULL, NULL, '1', NULL, '14', NULL, NULL, NULL, ' not yet billed ', NULL, '28-02-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(412, NULL, 'DBN_l_011', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Estimate Sign-off Date 28-02-2018', NULL, NULL, NULL, '1', NULL, '7', NULL, NULL, NULL, ' not yet billed ', NULL, '28-02-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(413, NULL, 'DBN_l_012', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Estimate Sign-off Date 28-02-2018', NULL, NULL, NULL, '1', NULL, '18', NULL, NULL, NULL, ' not yet billed ', NULL, '28-02-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(414, NULL, 'DBN_l_013', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Estimate Sign-off Date 31-01-2018', NULL, NULL, NULL, '1', NULL, '54', NULL, NULL, NULL, ' Not yet billed ', NULL, '29/02/2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(415, NULL, 'DBN_l_014', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Estimate Sign-off Date 31-01-2018', NULL, NULL, NULL, '1', NULL, '26', NULL, NULL, NULL, ' Not yet billed ', NULL, '29/02/2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(416, NULL, 'DBN_l_015', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '27-07-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' no charge ', NULL, '30/04/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(417, NULL, 'DBN_l_016', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Estimate Sign-off Date 28-02-2018', NULL, NULL, NULL, '1', NULL, '68', NULL, NULL, NULL, ' in progress ', NULL, '30-06-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(418, NULL, 'DBN_l_017', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '14-08-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 164 000,00 ', NULL, '30/04/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(419, NULL, 'DBN_l_018', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '03-10-2017', NULL, NULL, NULL, '1', NULL, '330', NULL, NULL, NULL, ' R 140 000,00 ', NULL, '28-02-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(420, NULL, 'DBN_l_019', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '31-08-2017', NULL, NULL, NULL, '1', NULL, '291', NULL, NULL, NULL, ' R 125 000,00 ', NULL, '31/12/2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(421, NULL, 'DBN_l_020', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '31-08-2017', NULL, NULL, NULL, '1', NULL, '135', NULL, NULL, NULL, ' R 66 000,00 ', NULL, '31/12/2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(422, NULL, 'DBN_l_021', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '11-07-2017', NULL, NULL, NULL, '1', NULL, '82', NULL, NULL, NULL, ' R 60 000,00 ', NULL, '28-02-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(423, NULL, 'DBN_l_022', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '11-07-2017', NULL, NULL, NULL, '1', NULL, '31', NULL, NULL, NULL, ' R 56 000,00 ', NULL, '28-02-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(424, NULL, 'DBN_l_023', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '08-08-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 52 500,00 ', NULL, '28-02-2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(425, NULL, 'DBN_l_024', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '17-02-2017', NULL, NULL, NULL, '1', NULL, '237', NULL, NULL, NULL, ' R 50 000,00 ', NULL, '29-02-2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(426, NULL, 'DBN_l_025', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Estimate Sign-off Date 15-12-2017', NULL, NULL, NULL, '1', NULL, '320', NULL, NULL, NULL, ' R 48 000,00 ', NULL, '28-02-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(427, NULL, 'DBN_l_026', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '17-07-2017', NULL, NULL, NULL, '1', NULL, '96', NULL, NULL, NULL, ' R 45 000,00 ', NULL, '28-02-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(428, NULL, 'DBN_l_027', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '25-10-2017', NULL, NULL, NULL, '1', NULL, '41', NULL, NULL, NULL, ' R 34 500,00 ', NULL, '30/06/2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(429, NULL, 'DBN_l_028', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '29-06-2017', NULL, NULL, NULL, '1', NULL, '138', NULL, NULL, NULL, ' R 32 500,00 ', NULL, '31-12-2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(430, NULL, 'DBN_l_029', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Estimate Sign-off Date 15-12-2017', NULL, NULL, NULL, '1', NULL, '8', NULL, NULL, NULL, ' R 30 000,00 ', NULL, '28-02-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(431, NULL, 'DBN_l_030', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Estimate Sign-off Date 15-12-2017', NULL, NULL, NULL, '1', NULL, '13', NULL, NULL, NULL, ' R 30 000,00 ', NULL, '28-02-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(432, NULL, 'DBN_l_031', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '31-08-2017', NULL, NULL, NULL, '1', NULL, '26', NULL, NULL, NULL, ' R 25 000,00 ', NULL, '28-02-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(433, NULL, 'DBN_l_032', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '20-03-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 22 000,00 ', NULL, '31-03-2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(434, NULL, 'DBN_l_033', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '29-06-2017', NULL, NULL, NULL, '1', NULL, '36', NULL, NULL, NULL, ' R 16 500,00 ', NULL, '29/02/2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(435, NULL, 'DBN_l_034', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Estimate Sign-off Date 15-12-2017', NULL, NULL, NULL, '1', NULL, '13', NULL, NULL, NULL, ' R 15 350,00 ', NULL, '28-02-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(436, NULL, 'DBN_l_035', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '16-08-2017', NULL, NULL, NULL, '1', NULL, '10', NULL, NULL, NULL, ' R 12 100,00 ', NULL, '28-02-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(437, NULL, 'DBN_l_036', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', 'Estimate Sign-off Date 15-12-2017', NULL, NULL, NULL, '1', NULL, '7', NULL, NULL, NULL, ' R 11 000,00 ', NULL, '28-02-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(438, NULL, 'DBN_l_037', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '11-06-2017', NULL, NULL, NULL, '1', NULL, '27', NULL, NULL, NULL, ' R 11 000,00 ', NULL, '28-02-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(439, NULL, 'DBN_l_038', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '07-07-2017', NULL, NULL, NULL, '1', NULL, '28', NULL, NULL, NULL, ' R 9 350,00 ', NULL, '28-02-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(440, NULL, 'DBN_l_039', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '22 June 2017', NULL, NULL, NULL, '1', NULL, '19', NULL, NULL, NULL, ' R 9 000,00 ', NULL, '31/12/2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(441, NULL, 'DBN_l_040', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '05-07-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 7 000,00 ', NULL, '28-02-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(442, NULL, 'DBN_l_041', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '05-07-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 6 300,00 ', NULL, '28-02-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(443, NULL, 'DBN_l_042', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '21-04-2017', NULL, NULL, NULL, '1', NULL, 'N/A', NULL, NULL, NULL, ' R 4 500,00 ', NULL, '28-02-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(444, NULL, 'DBN_l_043', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '10-02-2017', NULL, NULL, NULL, '1', NULL, '3', NULL, NULL, NULL, ' R 3 630,00 ', NULL, '29-02-2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(445, NULL, 'DBN_l_044', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '10-02-2017', NULL, NULL, NULL, '1', NULL, '12', NULL, NULL, NULL, ' R 3 630,00 ', NULL, '29-02-2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(446, NULL, 'DBN_l_045', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '10-02-2017', NULL, NULL, NULL, '1', NULL, '5', NULL, NULL, NULL, ' R 3 300,00 ', NULL, '29-02-2016', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(447, NULL, 'DBN_l_046', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '17-07-2017', NULL, NULL, NULL, '1', NULL, '6', NULL, NULL, NULL, ' R 3 000,00 ', NULL, '28-02-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(450, NULL, 'BLM_l_002', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '03/07/2017', NULL, NULL, NULL, '1', NULL, '62', NULL, NULL, NULL, ' R 50 228,28 ', NULL, '30-04-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(451, NULL, 'BLM_l_003', '', '1', NULL, '1', NULL, '1', NULL, NULL, 'Yes', '12/07/2017', NULL, NULL, NULL, '1', NULL, '58', NULL, NULL, NULL, ' R 34 879,75 ', NULL, '30-04-2017', NULL, NULL, NULL, NULL, NULL, 'Low', NULL),
(452, '02/27/2018 10:25:02', '388', '12/2018', '17', 'Yongama Madolo', '1', 'DETQA', '1', '270218102502', 'Johannesburg', 'Yes', '--/--', '7', '2025', 'Brian Mungofa', '1', 'SDF', '34', 'No', 'Yes', NULL, NULL, 'L', 'gfdsg', NULL, 'IFRS for SMEs', 'SDFG', '1234sd', 'MedS', 'None', 'OAW: Other assurance work');

-- --------------------------------------------------------

--
-- Table structure for table `engagement_types`
--

CREATE TABLE `engagement_types` (
  `id` int(255) NOT NULL auto_increment,
  `type_name` varchar(255) default NULL,
  `active_status` varchar(255) default '1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `engagement_types`
--

INSERT INTO `engagement_types` (`id`, `type_name`, `active_status`) VALUES
(1, 'IT Audit', '1'),
(2, 'Compliance Audit', '1'),
(3, 'Financial Audit', '1'),
(4, 'Investigative Audit', '1'),
(5, 'Operational Audit', '1'),
(6, 'Tax Audit', '1');

-- --------------------------------------------------------

--
-- Table structure for table `group_companies`
--

CREATE TABLE `group_companies` (
  `id` int(255) NOT NULL auto_increment,
  `date` varchar(255) default NULL,
  `group_name` varchar(255) default NULL,
  `active_status` varchar(255) default '1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `group_companies`
--

INSERT INTO `group_companies` (`id`, `date`, `group_name`, `active_status`) VALUES
(1, '08/01/2018', 'African Sun', '1'),
(2, '08/01/2018', 'No parent', '0');

-- --------------------------------------------------------

--
-- Table structure for table `industries`
--

CREATE TABLE `industries` (
  `id` int(255) NOT NULL auto_increment,
  `date` varchar(255) default NULL,
  `name` varchar(255) default NULL,
  `active_status` varchar(255) default '1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `industries`
--

INSERT INTO `industries` (`id`, `date`, `name`, `active_status`) VALUES
(1, '08/01/2018', 'Asset and Fund Managers', '1'),
(2, '08/01/2018', 'Associations', '1'),
(5, '08/01/2018', 'Federations', '1'),
(6, '08/01/2018', 'Institutions', '1'),
(7, '08/01/2018', 'Attorneys Trust Accounts', '1'),
(8, '08/01/2018', 'Estate Agents Trust Accounts', '1'),
(9, '08/01/2018', 'Auditor General South Africa assignments', '1'),
(10, '08/01/2018', 'Body Corporates', '1'),
(11, '08/01/2018', 'Shareblocks', '1'),
(12, '08/01/2018', 'Construction entities', '1'),
(13, '08/01/2018', 'Cooperatives', '1'),
(14, '08/01/2018', 'Farming', '1'),
(15, '08/01/2018', 'Agriculture entities', '1'),
(16, '08/01/2018', 'Financial institutions (eg. Bank, Insurance)', '1'),
(17, '08/01/2018', 'Manufacturers', '1'),
(18, '08/01/2018', 'Engineering', '1'),
(19, '08/01/2018', 'Medical schemes', '1'),
(20, '08/01/2018', 'Property entities', '1'),
(21, '08/01/2018', 'Investment entities', '1'),
(22, '08/01/2018', 'Trusts', '1'),
(23, '08/01/2018', 'Retailers', '1'),
(24, '08/01/2018', 'Wholesalers', '1'),
(25, '08/01/2018', 'Retirement funds', '1'),
(26, '08/01/2018', 'Pension funds', '1'),
(27, '08/01/2018', 'Provident funds', '1'),
(28, '08/01/2018', 'Schools', '1'),
(29, '08/01/2018', 'Service entities', '1'),
(30, '08/01/2018', 'Stockbrokers', '1'),
(31, '08/01/2018', 'Tertiary institutions', '1'),
(32, '08/01/2018', 'Trade unions', '1'),
(33, '08/01/2018', 'Other', '1');

-- --------------------------------------------------------

--
-- Stand-in structure for view `irba`
--
CREATE TABLE `irba` (
`No` varchar(255)
,`Client_Name` text
,`Audit_Fee` varchar(255)
,`Period_end_of_AFS` varchar(255)
,`Date_Opinion_was_signed` varchar(255)
,`PI_Score` varchar(255)
,`Partner` varchar(255)
,`Risk` varchar(255)
,`City` varchar(255)
);
-- --------------------------------------------------------

--
-- Table structure for table `job_role`
--

CREATE TABLE `job_role` (
  `id` int(255) NOT NULL auto_increment,
  `session` varchar(255) default NULL,
  `date` varchar(255) default NULL,
  `1` varchar(255) default NULL,
  `2` varchar(255) default NULL,
  `3` varchar(255) default NULL,
  `4` varchar(255) default NULL,
  `5` varchar(255) default NULL,
  `6` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `job_role`
--

INSERT INTO `job_role` (`id`, `session`, `date`, `1`, `2`, `3`, `4`, `5`, `6`) VALUES
(1, '120218021906', '12/02/2018', 'Yes', 'No', 'No', 'No', 'No', 'No'),
(2, '120218021906', '12/02/2018', 'Yes', 'No', 'No', 'No', 'No', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `leadership_and_management`
--

CREATE TABLE `leadership_and_management` (
  `id` int(255) NOT NULL auto_increment,
  `date` varchar(255) default NULL,
  `session` varchar(255) default NULL,
  `1` varchar(255) default NULL,
  `2` varchar(255) default NULL,
  `3` varchar(255) default NULL,
  `4` varchar(255) default NULL,
  `5` varchar(255) default NULL,
  `6` varchar(255) default NULL,
  `7` varchar(255) default NULL,
  `8` varchar(255) default NULL,
  `9` varchar(255) default NULL,
  `10` varchar(255) default NULL,
  `11` varchar(255) default NULL,
  `12` varchar(255) default NULL,
  `13` varchar(255) default NULL,
  `14` varchar(255) default NULL,
  `15` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `leadership_and_management`
--

INSERT INTO `leadership_and_management` (`id`, `date`, `session`, `1`, `2`, `3`, `4`, `5`, `6`, `7`, `8`, `9`, `10`, `11`, `12`, `13`, `14`, `15`) VALUES
(1, '12/02/2018', '120218021906', 'Yes', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `learning_and_development`
--

CREATE TABLE `learning_and_development` (
  `id` int(255) NOT NULL auto_increment,
  `session` varchar(255) default NULL,
  `date` varchar(255) default NULL,
  `1` varchar(255) default NULL,
  `2` varchar(255) default NULL,
  `3` varchar(255) default NULL,
  `4` varchar(255) default NULL,
  `5` varchar(255) default NULL,
  `6` varchar(255) default NULL,
  `name` varchar(255) default NULL,
  `division` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `learning_and_development`
--

INSERT INTO `learning_and_development` (`id`, `session`, `date`, `1`, `2`, `3`, `4`, `5`, `6`, `name`, `division`) VALUES
(1, '120218021906', '12/02/2018', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Tinashe', 'JHB');

-- --------------------------------------------------------

--
-- Table structure for table `performance_namagement`
--

CREATE TABLE `performance_namagement` (
  `id` int(255) NOT NULL auto_increment,
  `session` varchar(255) default NULL,
  `date` varchar(255) default NULL,
  `1` varchar(255) default NULL,
  `2` varchar(255) default NULL,
  `3` varchar(255) default NULL,
  `4` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `performance_namagement`
--

INSERT INTO `performance_namagement` (`id`, `session`, `date`, `1`, `2`, `3`, `4`) VALUES
(1, '120218021906', '12/02/2018', 'Yes', 'No', 'No', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `project_notes`
--

CREATE TABLE `project_notes` (
  `id` int(255) NOT NULL auto_increment,
  `date` varchar(255) default NULL,
  `project_id` varchar(255) default NULL,
  `updated_by` varchar(255) default NULL,
  `notes` text,
  `active_status` varchar(255) default '1',
  `notes_category` text,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `project_notes`
--


-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(255) NOT NULL auto_increment,
  `date` varchar(255) default NULL,
  `name` text,
  `active_status` varchar(255) default '1',
  `type` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `date`, `name`, `active_status`, `type`) VALUES
(1, '08/01/2018', 'Reasonable Assurance under ISA 700', '1', 'Assurance'),
(2, '08/01/2018', 'Reasonable Assurance under ISA 800', '1', 'Assurance'),
(5, '08/01/2018', 'Reasonable Assurance under ISA 805', '1', 'Assurance'),
(6, '08/01/2018', 'Reasonable Assurance under ISA 810', '1', 'Assurance'),
(7, '08/01/2018', 'Reasonable Assurance under ISAE 3000 for Attorneys Trusts', '1', 'Assurance'),
(8, '08/01/2018', 'Reasonable Assurance under ISAE 3000 other than Attorneys Trusts', '1', 'Assurance'),
(9, '08/01/2018', 'Reasonable Assurance under ISAE 3402', '1', 'Assurance'),
(10, '08/01/2018', 'Reasonable Assurance under ISAE 3410', '1', 'Assurance'),
(11, '08/01/2018', 'Reasonable Assurance under ISAE 3420', '1', 'Assurance'),
(12, '08/01/2018', 'Limited Assurance under ISRE 2400', '1', 'Assurance'),
(13, '08/01/2018', 'Limited Assurance under ISRE 2410', '1', 'Assurance'),
(14, '08/01/2018', 'Limited Assurance under ISRE 3000', '1', 'Assurance'),
(15, '08/01/2018', 'Limited Assurance under ISRE 3400', '1', 'Assurance'),
(16, '08/01/2018', 'Limited Assurance under ISRE 3402', '1', 'Assurance'),
(17, '08/01/2018', 'Limited Assurance under ISRE 3410', '1', 'Assurance'),
(18, '08/01/2018', 'Limited Assurance under ISRE 3420', '1', 'Assurance'),
(19, '08/01/2018', 'Related Services under ISRS 4400', '1', 'Assurance'),
(20, '08/01/2018', 'Related Services under ISRS 4410', '1', 'Assurance'),
(21, '08/01/2018', 'Accounting / Maintenance of accounting records', '1', 'Non Assurance'),
(22, '08/01/2018', 'Corporate advisory', '1', 'Non Assurance'),
(23, '08/01/2018', 'Taxation services', '1', 'Non Assurance'),
(24, '08/01/2018', 'Internal audit', '1', 'Non Assurance'),
(25, '08/01/2018', 'Statutory services', '1', 'Non Assurance'),
(26, '08/01/2018', 'Forensic services', '1', 'Non Assurance'),
(27, '08/01/2018', 'Other services', '1', 'Non Assurance'),
(28, '08/01/2018', 'Reasonable Assurance under ISAE 3400', '1', 'Assurance'),
(29, '08/01/2018', 'N/A', '1', 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `sites`
--

CREATE TABLE `sites` (
  `id` int(255) NOT NULL auto_increment,
  `site_name` varchar(255) default NULL,
  `active_status` varchar(22) default '1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `sites`
--

INSERT INTO `sites` (`id`, `site_name`, `active_status`) VALUES
(1, 'Johannesburg', '1'),
(2, 'Durban', '1'),
(3, 'Stanger', '1'),
(4, 'Pretoria', '1'),
(5, 'Port Elizabeth', '1');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(255) NOT NULL auto_increment,
  `date` varchar(255) default NULL,
  `company_name` text,
  `company_reg_number` varchar(255) default NULL,
  `industry` varchar(255) default NULL,
  `company_child` varchar(255) default NULL,
  `relationship_owner` varchar(255) default NULL,
  `active_status` varchar(255) default '1',
  `engagement_stage` varchar(255) default '0',
  `engagement_status` varchar(255) default '0',
  `child_option` varchar(255) default NULL,
  `parent_number` varchar(255) default NULL,
  `child_reg_number` varchar(255) default NULL,
  `company_parents_state` varchar(255) default '0',
  `ref` varchar(255) default NULL,
  `city` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=769 ;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `date`, `company_name`, `company_reg_number`, `industry`, `company_child`, `relationship_owner`, `active_status`, `engagement_stage`, `engagement_status`, `child_option`, `parent_number`, `child_reg_number`, `company_parents_state`, `ref`, `city`) VALUES
(1, NULL, 'Acajou (Pty) Ltd', 'Acajou (Pty) Ltd', NULL, NULL, 'Mungofa B.', '1', '0', '1', NULL, NULL, NULL, '0', 'SNH_l_011', 'Johannesburg'),
(388, NULL, 'Accredited Investments (Pty) Ltd', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(389, NULL, 'Advanced Terminations and Joints (Pty) Ltd', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(390, NULL, 'Africabio NPC', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(391, NULL, 'African World Heritage Fund', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(392, NULL, 'Agence Francaise De Developpment Project Preparation and Feasibility Studies', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(393, NULL, 'Agulhas Wetlands', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(394, NULL, 'ALBERANTE-RANDHART STEERING COMMITTEE (SECT 21)', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(395, NULL, 'ALBERTON TUISTE VIR BEJAARDES', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(396, NULL, 'ALBERTON TUISTE VIR BEJAARDES (ASSOCIATION INC UNDER SECTION 21)', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(397, NULL, 'Albou Trust', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(398, NULL, 'Albou Trust', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(399, NULL, 'Alchemist House (Pty) Ltd T/A Fleet Connect', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(400, NULL, 'AL-CLAD INTERIOR SYSTEMS (PTY) LTD', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(401, NULL, 'Altamonte Investments (Pty) Ltd', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(402, NULL, 'Amada Asset Management (Pty) Ltd', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(403, NULL, 'Anglo Inyosi Coal Community Development Trust', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(404, NULL, 'Apparel Industries (Pty) Ltd', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(405, NULL, 'Aquarella Investments 224 (Pty) Ltd', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(406, NULL, 'Araf Industries (Pty) Ltd 2016', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(407, NULL, 'Araf Industries (Pty) Ltd 2017', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(408, NULL, 'Argon Securities', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(409, NULL, 'Asmall & Sons (Pty) Ltd', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(410, NULL, 'Attacq Group ESD (Pty) Ltd', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(411, NULL, 'Auditor General Work- contracted out- Umgeni water', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(412, NULL, 'Autumn Star Trading 100 (Pty) Ltd', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(413, NULL, 'Basadi Ba Kopane Investment (Pty) Ltd', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(414, NULL, 'BEAUFORT WEST MUSEUM', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(415, NULL, 'Bekker Prokureurs', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(416, NULL, 'BELHAR ISLAMIC PRIMARY SCHOOL', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(417, NULL, 'BESSEMER AFRICA (PTY) LTD', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(418, NULL, 'BESSEMER BELANGE (PTY) LTD', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(419, NULL, 'Biarritz Investments (Pty) Ltd', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(420, NULL, 'Bizhub Highveld Lions', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(421, NULL, 'Blue Shirt Bakery (Pty) Ltd', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(422, NULL, 'BODY CORPORATE HILLBROW COMMUNITY CENTRE', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(423, NULL, 'BODY CORPORATE THE BALINESE', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(424, NULL, 'BOLAND CRICKET BOARD', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(425, NULL, 'Borbartia (Pty) Ltd', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(426, NULL, 'BREDASDORP MUSEUM', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(427, NULL, 'CARBONADO ENERGY (PTY) LTD', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(428, NULL, 'Casa Luigi Properties (Pty) Ltd', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(429, NULL, 'Casa Mia Body Corporate', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(430, NULL, 'Centaur De Roodepoort ', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(431, NULL, 'Centaur Mining South Africa ', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(432, NULL, 'CENTRAL AFRICAN ROAD SERVICES (PTY) LTD', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(433, NULL, 'Central Cricket Franchise (Pty) Ltd', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(434, NULL, 'CENTRAL GAUTENG GYMNASTICS ASSOCIATION', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(435, NULL, 'CHAFEKER & SHABODIEN INC', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(436, NULL, 'CHRISTELIKE MAATSKAPLIKE RAAD ALBERTON', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(437, NULL, 'CHRISTELIKE MAATSKAPLIKE RAAD STANDERTON', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(438, NULL, 'Cilbar and Company', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(439, NULL, 'COMMERCIAL MINING WEARPARTS (PTY) LTD', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(440, NULL, 'Cricket South Africa', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(441, NULL, 'C-Track SA (Pty) Limited', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(442, NULL, 'Darnall Motor Transport (Pty) Ltd', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(443, NULL, 'DE VRIES INCORPORATED', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(444, NULL, 'Dealernet (Pty) Ltd', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(445, NULL, 'Dealfin (Pty) Ltd', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(446, NULL, 'Debbie Pillay Attorneys', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(447, NULL, 'Desert Star Trading 109 (Pty) Ltd', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(448, NULL, 'Development Bank of South Africa', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(449, NULL, 'DIE CHRISTELIKE MAATSKAPLIKE RAAD RING VAN HEIDELBERG', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(450, NULL, 'DigiCore Electronics (Pty) Ltd', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(451, NULL, 'DigiCore Financial Services (Pty) Ltd ', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(452, NULL, 'DigiCore Fleet Management SA (Pty) Ltd', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(453, NULL, 'Digicore Holdings Limited', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(454, NULL, 'DigiCore Management Services (Pty) Ltd', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(455, NULL, 'DigiCore Properties (Pty) Ltd ', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(456, NULL, 'Dr Alberts, Bouwer & Jordaan Incorporated', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(457, NULL, 'DRIES VAN DER WALT FINANSIELE DIENSTE', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(458, NULL, 'Drs Thomson Brittain and Partners', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(459, NULL, 'Drs Thomson Brittain and Partners', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(460, NULL, 'Dusty Moon Investments 43 (Pty) Ltd', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(461, NULL, 'Dusty Moon Investments 43 (Pty) Ltd', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(462, NULL, 'Eastern Cricket', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(463, NULL, 'Easy Vortex Financial Wellness (Pty) Ltd', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(464, NULL, 'EC- WFtC- Addo National Park - Woody Section (15/18)', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(465, NULL, 'EKHAYA NEIGHBURHOOD CITY IMPROVEMENT DISTRICT (SECT 21)', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(466, NULL, 'Environmental Monitors 2016 / 19', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(467, NULL, 'Etana Holdings', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(468, NULL, 'F.H. Ali - Business account', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(469, NULL, 'F.H. Ali - Estate Agent Trust Account - dormant', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(470, NULL, 'Factodex (Pty) Ltd', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(471, NULL, 'Fashion Fusion Distribution (Pty) Ltd', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(472, NULL, 'Fashion Fusion Traders (Pty) Ltd', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(473, NULL, 'Firebush Investments (Pty) Ltd', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(474, NULL, 'Firewood Investments (Pty) Ltd', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(475, NULL, 'Fivaz Incorporated', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(476, NULL, 'FONTAINEBLEAU GEMEENSKAPSKERK', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(477, NULL, 'Free State Cricket NPC', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(478, NULL, 'Freedom Stationery (Pty) Ltd', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(479, NULL, 'Friedshelf 1571 (Pty) Ltd', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(480, NULL, 'GALAXY JUWELERS (PTY) LTD', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(481, NULL, 'GANGEN ATTORNEYS', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(482, NULL, 'Gauteng Cricket Board', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(483, NULL, 'Gayatri Cans (Pty) Ltd ', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(484, NULL, 'Gayatri Cans (Pty) Ltd ', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(485, NULL, 'Gayatri Paper Mill (Pty) Ltd ', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(486, NULL, 'Gayatri Paper Mill (Pty) Ltd ', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(487, NULL, 'Gayatri Paper Mill Gauteng (Pty) Ltd  ', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(488, NULL, 'Gayatri Paper Mill Gauteng (Pty) Ltd  ', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(489, NULL, 'Golden Era Printers & Stationers Bops (Pty) Ltd ', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(490, NULL, 'Golden Era Printers & Stationers Bops (Pty) Ltd ', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(491, NULL, 'Golden Gate Higlands National Park  Working for Wetlands', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(492, NULL, 'Greene Consulting Engineers (Pty) Ltd', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(493, NULL, 'Griqua Diamonds (Pty) Ltd t/a Northern Cape Cricket (Pty) Ltd', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(494, NULL, 'Ground Lily Investments (Pty) Ltd ', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(495, NULL, 'Haupt Earle & Vennote Attorneys', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(496, NULL, 'Hazsons Holdings Shareblock (Pty) Ltd', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(497, NULL, 'Hiconnex (Pty) Ltd', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(498, NULL, 'Hiconnex Communications (Pty) Ltd', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(499, NULL, 'Hiconnex Industrials (Pty) Ltd', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(500, NULL, 'Highgrowth Investments (Pty) Ltd', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(501, NULL, 'Hollard Behold (Cresta Properties) (Pty) Ltd', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(502, NULL, 'Hollard Business Associates (Pty) Ltd', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(503, NULL, 'Hollard Dealer Partners (Pty) Ltd', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(504, NULL, 'Hollard Investment Managers (Pty) Ltd', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(505, NULL, 'Hollard Life Properties (Pty) Ltd ', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(506, NULL, 'Hollard Portfolio (Pty) Ltd', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(507, NULL, 'HUGUENOT MEMORIAL MUSEUM', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(508, NULL, 'Hussun Goga & Company Attorney', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(509, NULL, 'Ice Blue Clothing (Pty) Ltd', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(510, NULL, 'Independent Power Producer office', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(511, NULL, 'Industrial Parks Revitalisation Programme (DTI)', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(512, NULL, 'Integrated Fare Collection Services (Pty) Ltd ', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(513, NULL, 'Intekom', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(514, NULL, 'Irfan Trading', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(515, NULL, 'Islamic Guidance Trust ', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(516, NULL, 'Izingwe Aberdare Cables (Pty) Ltd', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(517, NULL, 'Izingwe Cable Investments (Pty) Ltd', NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(518, NULL, NULL, NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(519, NULL, NULL, NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(520, NULL, NULL, NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(521, NULL, NULL, NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(522, NULL, NULL, NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(523, NULL, NULL, NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(524, NULL, NULL, NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(525, NULL, NULL, NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(526, NULL, NULL, NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(527, NULL, NULL, NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(528, NULL, NULL, NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(529, NULL, NULL, NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(530, NULL, NULL, NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(531, NULL, NULL, NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(532, NULL, NULL, NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(533, NULL, NULL, NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(534, NULL, NULL, NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(535, NULL, NULL, NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(536, NULL, NULL, NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(537, NULL, NULL, NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(538, NULL, NULL, NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(539, NULL, NULL, NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(540, NULL, NULL, NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(541, NULL, NULL, NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL),
(542, NULL, NULL, NULL, NULL, NULL, NULL, '1', '0', '0', NULL, NULL, NULL, '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `update_status_notes`
--

CREATE TABLE `update_status_notes` (
  `id` int(255) NOT NULL auto_increment,
  `date` varchar(255) default NULL,
  `project_id` varchar(255) default NULL,
  `updated_by` varchar(255) default NULL,
  `notes` text,
  `active_status` varchar(255) default '1',
  `project_status` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `update_status_notes`
--


-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `a` varchar(255) default NULL,
  `b` varchar(255) default NULL,
  `c` varchar(255) default NULL,
  `d` varchar(255) default NULL,
  `e` varchar(255) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`a`, `b`, `c`, `d`, `e`) VALUES
('', 'Audit Fee', 'Period end of AFS (Month & Year)', 'Date Opinion was signed', 'PI Score'),
('BLM_l_001', ' R 65 034,44 ', '30-04-2017', '12/07/2017', '56'),
('BLM_l_002', ' R 50 228,28 ', '30-04-2017', '03/07/2017', '62'),
('BLM_l_003', ' R 34 879,75 ', '30-04-2017', '12/07/2017', '58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL auto_increment,
  `date` varchar(255) default NULL,
  `name` varchar(255) default NULL,
  `surname` varchar(255) default NULL,
  `username` varchar(255) default NULL,
  `password` varchar(255) default NULL,
  `email` varchar(255) default NULL,
  `address` varchar(255) default NULL,
  `city` varchar(255) default NULL,
  `country` varchar(255) default NULL,
  `contact` int(255) default NULL,
  `access` varchar(255) default NULL,
  `role` text,
  `active_status` varchar(255) default '1',
  `irba` varchar(255) default NULL,
  `date_qualified` varchar(255) default NULL,
  `date_of_first_registration_with_irba` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `date`, `name`, `surname`, `username`, `password`, `email`, `address`, `city`, `country`, `contact`, `access`, `role`, `active_status`, `irba`, `date_qualified`, `date_of_first_registration_with_irba`) VALUES
(1, '03/01/2018', 'Takunda', 'Chibanda', 'admin', 'admin', 'tgchibanda@gmail.com', 'c1client_cpstechnologies_co_za', '1', 'South Africa', 712563214, 'Administrator', 'CA(SA)', '1', '00', NULL, '00'),
(2, '04/01/2018', 'Mitesh', 'Patel', 'mitesh', 'password', 'admin@c1client_cpstechnologies_co_za.com', 'c1client_cpstechnologies_co_za', '1', 'South Africa', 721225415, 'Auditor', 'CA(SA)', '1', '841161', NULL, '22/01/2003'),
(24, '08/01/2018', 'Thuto', 'Masasa', 'thuto', 'password', 'admin@c1client_cpstechnologies_co_za.com', 'c1client_cpstechnologies_co_za', '1', 'South Africa', 712563215, 'Auditor', 'CA(SA)', '1', '506223', NULL, '26/11/2012'),
(26, '04/01/2018', 'Steven', 'Firer', 'steven', 'password', 'admin@c1client_cpstechnologies_co_za.com', 'c1client_cpstechnologies_co_za', '1', 'South Africa', 712563215, 'Auditor', 'CA(SA)', '1', '175463', NULL, '26/04/1989'),
(27, '04/01/2018', 'Emma', 'Mashilwane', 'emma', 'password', 'admin@c1client_cpstechnologies_co_za.com', 'c1client_cpstechnologies_co_za', '1', 'South Africa', 712563215, 'Auditor', 'CA(SA)', '1', '883883', NULL, '20/04/2012'),
(28, '04/01/2018', 'Brian', 'Mungofa', 'brian', 'password', 'admin@c1client_cpstechnologies_co_za.com', 'c1client_cpstechnologies_co_za', '1', 'South Africa', 712563215, 'Auditor', 'CA(SA)', '1', '502029', NULL, '11/03/2009'),
(29, '04/01/2018', 'Nyarai', 'Muzarewetu', 'nyarai', 'password', 'admin@c1client_cpstechnologies_co_za.com', 'c1client_cpstechnologies_co_za', '1', 'South Africa', 712563215, 'Auditor', 'CA(SA)', '1', '507141', NULL, '01/04/2009'),
(30, '04/01/2018', 'Sangeeta', 'Kallen', 'sangeeta', 'password', 'admin@c1client_cpstechnologies_co_za.com', 'c1client_cpstechnologies_co_za', '1', 'South Africa', 712563215, 'Auditor', 'CA(SA)', '1', '503514', NULL, '28/01/2009'),
(31, '04/01/2018', 'Kiran', 'Bhika', 'kiran', 'password', 'admin@c1client_cpstechnologies_co_za.com', 'c1client_cpstechnologies_co_za', '1', 'South Africa', 712563215, 'Auditor', 'CA(SA)', '1', '803669', NULL, '30/09/2013'),
(32, '04/01/2018', 'Ahmed', 'Pandor', 'ahmed', 'password', 'admin@c1client_cpstechnologies_co_za.com', 'c1client_cpstechnologies_co_za', '1', 'South Africa', 712563215, 'Auditor', 'CA(SA)', '1', '786837', NULL, '30/09/2013'),
(33, '04/01/2018', 'Yongama', 'Madolo', 'yongama', 'password', 'admin@c1client_cpstechnologies_co_za.com', 'c1client_cpstechnologies_co_za', '1', 'South Africa', 712563215, 'Auditor', 'CA(SA)', '1', '736547', NULL, '07/6/2016'),
(34, '04/01/2018', 'Ghitesh', 'Deva', 'ghitesh', 'password', 'admin@c1client_cpstechnologies_co_za.com', 'c1client_cpstechnologies_co_za', '1', 'South Africa', 712563215, 'Auditor', 'CA(SA)', '1', '797634', NULL, '03/02/2016'),
(35, NULL, 'Mungofa', 'B.', NULL, NULL, NULL, NULL, '1', NULL, NULL, 'Auditor', NULL, '0', NULL, NULL, NULL),
(36, NULL, 'Kallen', 'S.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Auditor', NULL, '0', NULL, NULL, NULL),
(37, NULL, 'Muzarewetu', 'N.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Auditor', NULL, '0', NULL, NULL, NULL),
(38, NULL, 'Masasa', 'T.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Auditor', NULL, '0', NULL, NULL, NULL),
(39, NULL, 'Amaanullah ', 'Ayub', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Auditor', NULL, '0', NULL, NULL, NULL),
(40, NULL, 'H', 'Lotter', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Auditor', NULL, '0', NULL, NULL, NULL),
(41, NULL, 'RP', 'Goldes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Auditor', NULL, '0', NULL, NULL, NULL),
(42, NULL, 'S', 'Prinsloo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Auditor', NULL, '0', NULL, NULL, NULL),
(43, NULL, 'Helga', 'Lotter', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Auditor', NULL, '0', NULL, NULL, NULL),
(44, NULL, 'J', 'de Viliers', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Auditor', NULL, '0', NULL, NULL, NULL),
(45, NULL, 'S', 'Prinsloo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Auditor', NULL, '0', NULL, NULL, NULL),
(46, NULL, 'IJ', 'de Villiers', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Auditor', NULL, '0', NULL, NULL, NULL),
(47, NULL, 'M.A', 'Motala', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Auditor', NULL, '0', NULL, NULL, NULL),
(48, NULL, 'F.A.S', 'Haffejee', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Auditor', NULL, '0', NULL, NULL, NULL),
(49, NULL, 'Y.M', 'Paruk', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Auditor', NULL, '0', NULL, NULL, NULL),
(50, NULL, 'M.', 'Haffejee', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Auditor', NULL, '0', NULL, NULL, NULL),
(51, NULL, 'R.', 'Timol', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Auditor', NULL, '0', NULL, NULL, NULL),
(52, NULL, 'J.', 'Jamal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Auditor', NULL, '0', NULL, NULL, NULL),
(53, NULL, 'Julia', 'van Wyk', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Auditor', NULL, '0', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `work_environment`
--

CREATE TABLE `work_environment` (
  `id` int(255) NOT NULL auto_increment,
  `session` varchar(255) default NULL,
  `date` varchar(255) default NULL,
  `1` varchar(255) default NULL,
  `2` varchar(255) default NULL,
  `3` varchar(255) default NULL,
  `4` varchar(255) default NULL,
  `5` varchar(255) default NULL,
  `6` varchar(255) default NULL,
  `7` varchar(255) default NULL,
  `8` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `work_environment`
--

INSERT INTO `work_environment` (`id`, `session`, `date`, `1`, `2`, `3`, `4`, `5`, `6`, `7`, `8`) VALUES
(1, '120218021906', '12/02/2018', 'Yes', 'No', 'No', 'No', 'No', 'No', 'No', 'No');

-- --------------------------------------------------------

--
-- Structure for view `all clients`
--
DROP TABLE IF EXISTS `all clients`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `c1client_cpstechnologies_co_za`.`all clients` AS select `c1client_cpstechnologies_co_za`.`clients`.`company_name` AS `company_name`,`c1client_cpstechnologies_co_za`.`clients`.`relationship_owner` AS `relationship_owner`,`c1client_cpstechnologies_co_za`.`clients`.`ref` AS `ref`,`c1client_cpstechnologies_co_za`.`clients`.`city` AS `city` from `c1client_cpstechnologies_co_za`.`clients`;

-- --------------------------------------------------------

--
-- Structure for view `assurance`
--
DROP TABLE IF EXISTS `assurance`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `c1client_cpstechnologies_co_za`.`assurance` AS select `c1client_cpstechnologies_co_za`.`clients`.`company_name` AS `Client_Name`,`c1client_cpstechnologies_co_za`.`engagements`.`group_structure` AS `Group_Structure`,`c1client_cpstechnologies_co_za`.`clients`.`company_reg_number` AS `Client_CIPC`,`c1client_cpstechnologies_co_za`.`engagements`.`companies_act` AS `Companies_Act`,`c1client_cpstechnologies_co_za`.`engagements`.`irba_code` AS `IRBA_Code`,`c1client_cpstechnologies_co_za`.`engagements`.`isqc_1` AS `ISQC_1`,`c1client_cpstechnologies_co_za`.`engagements`.`isqc_2` AS `ISQC_2`,`c1client_cpstechnologies_co_za`.`engagements`.`assurance_work` AS `Assurance_Work`,`c1client_cpstechnologies_co_za`.`engagements`.`amount_billed` AS `Amount_Billed`,`c1client_cpstechnologies_co_za`.`engagements`.`jse_listed` AS `JSE_Listed`,`c1client_cpstechnologies_co_za`.`clients`.`industry` AS `Industry`,`c1client_cpstechnologies_co_za`.`engagements`.`year_of_afs` AS `Period_end_of_AFS`,`c1client_cpstechnologies_co_za`.`engagements`.`date_resigned` AS `Date_Opinion_was_signed`,`c1client_cpstechnologies_co_za`.`clients`.`relationship_owner` AS `Partner`,`c1client_cpstechnologies_co_za`.`engagements`.`when_next_irba` AS `Next_IRBA`,`c1client_cpstechnologies_co_za`.`engagements`.`accounting_framework` AS `Accounting_Framework`,`c1client_cpstechnologies_co_za`.`engagements`.`client_turnover` AS `Client_Turnover` from (`c1client_cpstechnologies_co_za`.`clients` join `c1client_cpstechnologies_co_za`.`engagements`) where (((`c1client_cpstechnologies_co_za`.`clients`.`ref` = `c1client_cpstechnologies_co_za`.`engagements`.`client`) or (`c1client_cpstechnologies_co_za`.`clients`.`id` = `c1client_cpstechnologies_co_za`.`engagements`.`client`)) and (`c1client_cpstechnologies_co_za`.`clients`.`engagement_status` = _latin1'1') and (`c1client_cpstechnologies_co_za`.`clients`.`active_status` = _latin1'1'));

-- --------------------------------------------------------

--
-- Structure for view `irba`
--
DROP TABLE IF EXISTS `irba`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `c1client_cpstechnologies_co_za`.`irba` AS select `c1client_cpstechnologies_co_za`.`clients`.`ref` AS `No`,`c1client_cpstechnologies_co_za`.`clients`.`company_name` AS `Client_Name`,`c1client_cpstechnologies_co_za`.`engagements`.`amount_billed` AS `Audit_Fee`,`c1client_cpstechnologies_co_za`.`engagements`.`year_of_afs` AS `Period_end_of_AFS`,`c1client_cpstechnologies_co_za`.`engagements`.`date_resigned` AS `Date_Opinion_was_signed`,`c1client_cpstechnologies_co_za`.`engagements`.`companies_act` AS `PI_Score`,`c1client_cpstechnologies_co_za`.`clients`.`relationship_owner` AS `Partner`,`c1client_cpstechnologies_co_za`.`engagements`.`risk` AS `Risk`,`c1client_cpstechnologies_co_za`.`clients`.`city` AS `City` from (`c1client_cpstechnologies_co_za`.`clients` join `c1client_cpstechnologies_co_za`.`engagements`) where (((`c1client_cpstechnologies_co_za`.`clients`.`ref` = `c1client_cpstechnologies_co_za`.`engagements`.`client`) or (`c1client_cpstechnologies_co_za`.`clients`.`id` = `c1client_cpstechnologies_co_za`.`engagements`.`client`)) and (`c1client_cpstechnologies_co_za`.`clients`.`engagement_status` = _latin1'1') and (`c1client_cpstechnologies_co_za`.`clients`.`active_status` = _latin1'1'));
