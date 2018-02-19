/*
Navicat MySQL Data Transfer

Source Server         : MySql
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : nkonki

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2018-02-19 16:55:48
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `accounting_framework`
-- ----------------------------
DROP TABLE IF EXISTS `accounting_framework`;
CREATE TABLE `accounting_framework` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `active_status` varchar(22) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of accounting_framework
-- ----------------------------
INSERT INTO `accounting_framework` VALUES ('1', 'IFRS', '1');
INSERT INTO `accounting_framework` VALUES ('2', 'IFRS for SMEs', '1');
INSERT INTO `accounting_framework` VALUES ('3', 'GRAP', '1');
INSERT INTO `accounting_framework` VALUES ('4', 'Medified Cash Basis', '1');
INSERT INTO `accounting_framework` VALUES ('5', 'Other', '1');

-- ----------------------------
-- Table structure for `assurance_work`
-- ----------------------------
DROP TABLE IF EXISTS `assurance_work`;
CREATE TABLE `assurance_work` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `active_status` varchar(22) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of assurance_work
-- ----------------------------
INSERT INTO `assurance_work` VALUES ('1', 'AG (CO)', '1');
INSERT INTO `assurance_work` VALUES ('2', 'AG (S4)', '1');
INSERT INTO `assurance_work` VALUES ('3', 'ATA', '1');
INSERT INTO `assurance_work` VALUES ('4', 'CoA ', '1');
INSERT INTO `assurance_work` VALUES ('5', 'CO-OP ', '1');
INSERT INTO `assurance_work` VALUES ('6', 'EA', '1');
INSERT INTO `assurance_work` VALUES ('7', 'FSB ', '1');
INSERT INTO `assurance_work` VALUES ('8', 'MedS', '1');
INSERT INTO `assurance_work` VALUES ('9', 'NONP  ', '1');
INSERT INTO `assurance_work` VALUES ('10', 'OAW', '1');
INSERT INTO `assurance_work` VALUES ('11', 'SARB', '1');
INSERT INTO `assurance_work` VALUES ('12', 'SUBJSE  ', '1');
INSERT INTO `assurance_work` VALUES ('13', 'TER', '1');

-- ----------------------------
-- Table structure for `audit`
-- ----------------------------
DROP TABLE IF EXISTS `audit`;
CREATE TABLE `audit` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `date` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `action_type` varchar(255) DEFAULT NULL,
  `details` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of audit
-- ----------------------------
INSERT INTO `audit` VALUES ('1', '01/25/2018 02:52:35', 'admin', 'Loggin', 'Systems Login');
INSERT INTO `audit` VALUES ('2', '01/25/2018 02:54:03', 'admin', 'New Client', 'Created Monomotapa Hotel');
INSERT INTO `audit` VALUES ('3', '01/25/2018 02:56:04', 'admin', 'Client Engagement', 'Engaged Monomotapa Hotel');
INSERT INTO `audit` VALUES ('4', '01/25/2018 02:57:22', 'admin', 'Closed Project', 'Closed Monomotapa Hotel project. REF 250118025512');
INSERT INTO `audit` VALUES ('5', '01/25/2018 03:16:20', 'admin', 'Logout', 'Systems Logout');
INSERT INTO `audit` VALUES ('6', '01/25/2018 03:16:49', 'admin', 'Loggin', 'Systems Login');
INSERT INTO `audit` VALUES ('7', '01/25/2018 03:28:11', 'admin', 'New Client', 'Created Twenty Third');
INSERT INTO `audit` VALUES ('8', '01/25/2018 03:42:58', 'admin', 'Client Engagement', 'Engaged Twenty Third');
INSERT INTO `audit` VALUES ('9', '01/25/2018 03:47:50', 'admin', 'Closed Project', 'Closed Twenty Third project. REF 250118032832');
INSERT INTO `audit` VALUES ('10', '01/26/2018 08:04:05', 'admin', 'Loggin', 'Systems Login');
INSERT INTO `audit` VALUES ('11', '01/29/2018 09:13:00', 'admin', 'Loggin', 'Systems Login');
INSERT INTO `audit` VALUES ('12', '01/29/2018 11:02:03', 'admin', 'New Client', 'Created Test');
INSERT INTO `audit` VALUES ('13', '01/29/2018 11:18:27', 'admin', 'New Client', 'Created q');
INSERT INTO `audit` VALUES ('14', '01/29/2018 11:20:38', 'admin', 'New Client', 'Created qqq');
INSERT INTO `audit` VALUES ('15', '01/29/2018 11:24:07', 'admin', 'New Client', 'Created q');
INSERT INTO `audit` VALUES ('16', '01/29/2018 11:45:52', 'admin', 'Client Engagement', 'Engaged q');
INSERT INTO `audit` VALUES ('17', '01/29/2018 02:22:26', 'admin', 'Client Engagement', 'Engaged CPS Technologies');
INSERT INTO `audit` VALUES ('18', '01/30/2018 09:58:08', 'admin', 'Loggin', 'Systems Login');
INSERT INTO `audit` VALUES ('19', '01/30/2018 07:59:42', 'admin', 'Loggin', 'Systems Login');
INSERT INTO `audit` VALUES ('20', '01/30/2018 09:22:36', 'admin', 'New User', 'Created ');
INSERT INTO `audit` VALUES ('21', '01/30/2018 09:24:05', 'admin', 'New User', 'Created ');
INSERT INTO `audit` VALUES ('22', '01/30/2018 09:24:32', 'admin', 'New User', 'Created ');
INSERT INTO `audit` VALUES ('23', '01/30/2018 09:31:15', 'admin', 'Client Engagement', 'Engaged IT Medics');
INSERT INTO `audit` VALUES ('24', '01/30/2018 10:11:13', 'admin', 'Client Engagement', 'Engaged CPS Technologies');
INSERT INTO `audit` VALUES ('25', '01/30/2018 10:21:41', 'admin', 'New Client', 'Created g');
INSERT INTO `audit` VALUES ('26', '01/31/2018 09:07:57', 'admin', 'Loggin', 'Systems Login');
INSERT INTO `audit` VALUES ('27', '01/31/2018 03:49:59', 'admin', 'Logout', 'Systems Logout');
INSERT INTO `audit` VALUES ('28', '01/31/2018 03:50:56', 'admin', 'Loggin', 'Systems Login');
INSERT INTO `audit` VALUES ('29', '01/31/2018 03:59:02', 'admin', 'New User', 'Created ');
INSERT INTO `audit` VALUES ('30', '01/31/2018 04:03:17', 'admin', 'New Client', 'Created Toyota');
INSERT INTO `audit` VALUES ('31', '01/31/2018 04:45:35', 'admin', 'Client Engagement', 'Engaged Toyota');
INSERT INTO `audit` VALUES ('32', '02/01/2018 08:16:04', 'admin', 'Loggin', 'Systems Login');
INSERT INTO `audit` VALUES ('33', '02/06/2018 01:48:25', 'admin', 'Loggin', 'Systems Login');
INSERT INTO `audit` VALUES ('34', '02/19/2018 10:39:50', 'admin', 'Loggin', 'Systems Login');
INSERT INTO `audit` VALUES ('35', '02/19/2018 03:39:52', 'admin', 'Client Engagement', 'Engaged CPS Technologies');

-- ----------------------------
-- Table structure for `clients`
-- ----------------------------
DROP TABLE IF EXISTS `clients`;
CREATE TABLE `clients` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `date` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `company_reg_number` varchar(255) DEFAULT NULL,
  `industry` varchar(255) DEFAULT NULL,
  `company_child` varchar(255) DEFAULT NULL,
  `relationship_owner` varchar(255) DEFAULT NULL,
  `active_status` varchar(255) DEFAULT '1',
  `engagement_stage` varchar(255) DEFAULT '0',
  `engagement_status` varchar(255) DEFAULT '0',
  `city` varchar(255) DEFAULT NULL,
  `child_option` varchar(255) DEFAULT NULL,
  `parent_number` varchar(255) DEFAULT NULL,
  `child_reg_number` varchar(255) DEFAULT NULL,
  `company_parents_state` varchar(255) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of clients
-- ----------------------------
INSERT INTO `clients` VALUES ('1', '01/08/2018 11:28:32', 'CPS Technologies', '1010', 'IT', 'None', 'Revo Chewa', '1', '0', '1', null, null, null, null, '1');
INSERT INTO `clients` VALUES ('2', '01/08/2018 04:00:05', 'Twenty Third Century Systems', '1111', 'IT', 'None', 'Revo Chewa', '1', '0', '0', null, null, null, null, '1');
INSERT INTO `clients` VALUES ('4', '01/18/2018 01:59:49', 'IT Medics', '1313', 'IT', 'None', 'Revo Chewa', '1', '0', '1', null, null, null, null, '1');
INSERT INTO `clients` VALUES ('8', '01/25/2018 03:17:06', 'Twenty Third', '999', 'IT', null, '2', '1', '0', '0', 'Falls', 'on', null, null, '1');
INSERT INTO `clients` VALUES ('7', '01/25/2018 02:53:00', 'Monomotapa Hotel', '1515', 'Accounting', 'Troutbeck', '24', '1', '0', '0', 'Gweru', 'on', null, null, '1');
INSERT INTO `clients` VALUES ('17', '01/31/2018 03:59:06', 'Toyota', 'ABC123', 'Auditor General South Africa assignments', 'Comoil 12111: Deisel 77464', '29', '1', '0', '1', 'JHB', 'on', '2', '', '1');

-- ----------------------------
-- Table structure for `closed_projects`
-- ----------------------------
DROP TABLE IF EXISTS `closed_projects`;
CREATE TABLE `closed_projects` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `date` varchar(255) DEFAULT NULL,
  `active_status` varchar(255) DEFAULT '1',
  `engagement_id` varchar(255) DEFAULT NULL,
  `auditor_rating` varchar(255) DEFAULT NULL,
  `auditor_remarks` varchar(255) DEFAULT NULL,
  `contact_rating` varchar(255) DEFAULT NULL,
  `contact_remarks` varchar(255) DEFAULT NULL,
  `end_date` varchar(255) DEFAULT NULL,
  `closing_notes` text,
  `captured_by` varchar(255) DEFAULT NULL,
  `track` varchar(255) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of closed_projects
-- ----------------------------
INSERT INTO `closed_projects` VALUES ('1', '01/25/2018 02:56:45', '1', '250118025512', 'Good', 'This was ok', 'Good', 'I will keep updating', '2018-01-26', 'Thank you', 'admin', '1');
INSERT INTO `closed_projects` VALUES ('2', '01/25/2018 03:46:34', '1', '250118032832', 'Good', 'hhhh', 'Good', 'jj', '2018-01-26', 'xx', 'admin', '1');

-- ----------------------------
-- Table structure for `communication`
-- ----------------------------
DROP TABLE IF EXISTS `communication`;
CREATE TABLE `communication` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `session` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `1` varchar(255) DEFAULT NULL,
  `2` varchar(255) DEFAULT NULL,
  `3` varchar(255) DEFAULT NULL,
  `4` varchar(255) DEFAULT NULL,
  `5` varchar(255) DEFAULT NULL,
  `6` varchar(255) DEFAULT NULL,
  `7` varchar(255) DEFAULT NULL,
  `8` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of communication
-- ----------------------------
INSERT INTO `communication` VALUES ('1', '120218021906', '12/02/2018', 'Yes', 'No', 'No', 'No', 'No', 'No', 'No', 'No');

-- ----------------------------
-- Table structure for `company_image`
-- ----------------------------
DROP TABLE IF EXISTS `company_image`;
CREATE TABLE `company_image` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `date` varchar(255) DEFAULT NULL,
  `session` varchar(255) DEFAULT NULL,
  `1` varchar(255) DEFAULT NULL,
  `2` varchar(255) DEFAULT NULL,
  `3` varchar(255) DEFAULT NULL,
  `4` varchar(255) DEFAULT NULL,
  `5` varchar(255) DEFAULT NULL,
  `6` varchar(255) DEFAULT NULL,
  `7` varchar(255) DEFAULT NULL,
  `8` varchar(255) DEFAULT NULL,
  `9` varchar(255) DEFAULT NULL,
  `10` varchar(255) DEFAULT NULL,
  `11` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of company_image
-- ----------------------------
INSERT INTO `company_image` VALUES ('1', '12/02/2018', '120218021906', 'Yes', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'dissatisfaction', 'hhh', 'hhhh');

-- ----------------------------
-- Table structure for `compensation`
-- ----------------------------
DROP TABLE IF EXISTS `compensation`;
CREATE TABLE `compensation` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `session` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `1` varchar(255) DEFAULT NULL,
  `2` varchar(255) DEFAULT NULL,
  `3` varchar(255) DEFAULT NULL,
  `4` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of compensation
-- ----------------------------
INSERT INTO `compensation` VALUES ('1', '120218021906', '12/02/2018', 'Yes', 'No', 'No', 'No');

-- ----------------------------
-- Table structure for `culture`
-- ----------------------------
DROP TABLE IF EXISTS `culture`;
CREATE TABLE `culture` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `session` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `1` varchar(255) DEFAULT NULL,
  `2` varchar(255) DEFAULT NULL,
  `3` varchar(255) DEFAULT NULL,
  `4` varchar(255) DEFAULT NULL,
  `5` varchar(255) DEFAULT NULL,
  `6` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of culture
-- ----------------------------
INSERT INTO `culture` VALUES ('1', '120218021906', '12/02/2018', 'Yes', 'No', 'No', 'No', 'No', 'No');

-- ----------------------------
-- Table structure for `engagements`
-- ----------------------------
DROP TABLE IF EXISTS `engagements`;
CREATE TABLE `engagements` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `date` varchar(255) DEFAULT NULL,
  `client` varchar(255) DEFAULT NULL,
  `engagement_date` varchar(255) DEFAULT NULL,
  `engagement_type` varchar(255) DEFAULT NULL,
  `engaged_by` varchar(255) DEFAULT NULL,
  `engagement_status` varchar(255) DEFAULT '1',
  `start_notes` text,
  `active_status` varchar(255) DEFAULT '1',
  `engagement_id` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `assurance` varchar(255) DEFAULT NULL,
  `date_resigned` varchar(255) DEFAULT '--/--',
  `rotation_period` varchar(255) DEFAULT NULL,
  `rotation_year` varchar(255) DEFAULT NULL,
  `anticipated_rotation_partner` varchar(255) DEFAULT NULL,
  `editable` varchar(255) DEFAULT '1',
  `group_structure` varchar(255) DEFAULT NULL,
  `companies_act` varchar(255) DEFAULT NULL,
  `irba_code` varchar(255) DEFAULT NULL,
  `isqc_1` varchar(255) DEFAULT NULL,
  `isqc_2` varchar(255) DEFAULT NULL,
  `amount_billed` varchar(255) DEFAULT NULL,
  `jse_listed` varchar(255) DEFAULT NULL,
  `year_of_afs` varchar(255) DEFAULT NULL,
  `when_next_irba` varchar(255) DEFAULT NULL,
  `accounting_framework` varchar(255) DEFAULT NULL,
  `client_turnover` varchar(255) DEFAULT NULL,
  `first_engagement_date` varchar(255) DEFAULT NULL,
  `assurance_work` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of engagements
-- ----------------------------
INSERT INTO `engagements` VALUES ('1', '01/25/2018 02:55:12', '7', '2018-01-25', '1', '2', '3', 'This is a full audit', '1', '250118025512', 'Falls', 'on', null, '5', '2023', 'Rudo Nhongo', '1', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `engagements` VALUES ('2', '01/25/2018 03:28:32', '8', '2018-01-24', '1', '24', '3', 'This is a simple note', '1', '250118032832', 'Gweru', 'on', '--/--', '7', '2025', 'James Mayo', '1', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `engagements` VALUES ('4', '01/29/2018 02:22:04', '1', '2018-01-26', '25', '2', '1', 'jj', '1', '290118022204', 'Falls', 'on', '2018-02-15', null, null, null, '1', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `engagements` VALUES ('5', '01/30/2018 09:30:57', '4', '2018-01-31', '21', '28', '1', 'Breife description', '1', '300118093057', null, 'on', '2018-02-16', null, null, null, '1', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `engagements` VALUES ('6', '01/30/2018 09:41:45', '1', '2018-01-25', '1', '26', '1', 'brief', '1', '300118094145', 'Pretoria', 'on', '--/--', '5', '2023', 'Revo Chewa', '1', 'who is', 'public score', 'Yes', 'was an engaement quality', 'was a monitoring', '10000', 'jse', 'yea', 'when is next', 'accounting framework', 'client turnover', '2018-01-31', null);
INSERT INTO `engagements` VALUES ('7', '01/31/2018 04:43:08', '17', '2018-01-25', '1', '29', '1', 'brief', '1', '310118044308', 'JHB', 'on', '2018-02-28', '7', '2025', 'Wels Bels', '1', 'BMW', '234', 'Yes', 'Yes', 'Yes', '23444', 'Delta', '2018-01-25', '2018-01-26', 'accounting framework', 'client turnover', '2018-01-26', null);
INSERT INTO `engagements` VALUES ('8', '02/19/2018 03:33:40', '1', '2018-02-07', '1', 'Select Option', '1', '2345dfg', '1', '190218033340', null, 'on', '--/--', '5', '2023', 'Tinashe Makiwa', '1', '345', '345', 'Yes', 'Yes', null, '345', 'SL', '2018-02-07', null, 'Tati other framework baba', 'xcb', '2018-02-14', 'AG (CO)');

-- ----------------------------
-- Table structure for `engagement_types`
-- ----------------------------
DROP TABLE IF EXISTS `engagement_types`;
CREATE TABLE `engagement_types` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(255) DEFAULT NULL,
  `active_status` varchar(255) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of engagement_types
-- ----------------------------
INSERT INTO `engagement_types` VALUES ('1', 'IT Audit', '1');
INSERT INTO `engagement_types` VALUES ('2', 'Compliance Audit', '1');
INSERT INTO `engagement_types` VALUES ('3', 'Financial Audit', '1');
INSERT INTO `engagement_types` VALUES ('4', 'Investigative Audit', '1');
INSERT INTO `engagement_types` VALUES ('5', 'Operational Audit', '1');
INSERT INTO `engagement_types` VALUES ('6', 'Tax Audit', '1');

-- ----------------------------
-- Table structure for `group_companies`
-- ----------------------------
DROP TABLE IF EXISTS `group_companies`;
CREATE TABLE `group_companies` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `date` varchar(255) DEFAULT NULL,
  `group_name` varchar(255) DEFAULT NULL,
  `active_status` varchar(255) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of group_companies
-- ----------------------------
INSERT INTO `group_companies` VALUES ('1', '08/01/2018', 'African Sun', '1');
INSERT INTO `group_companies` VALUES ('2', '08/01/2018', 'No parent', '0');

-- ----------------------------
-- Table structure for `industries`
-- ----------------------------
DROP TABLE IF EXISTS `industries`;
CREATE TABLE `industries` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `date` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `active_status` varchar(255) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of industries
-- ----------------------------
INSERT INTO `industries` VALUES ('1', '08/01/2018', 'Asset and Fund Managers', '1');
INSERT INTO `industries` VALUES ('2', '08/01/2018', 'Associations', '1');
INSERT INTO `industries` VALUES ('5', '08/01/2018', 'Federations', '1');
INSERT INTO `industries` VALUES ('6', '08/01/2018', 'Institutions', '1');
INSERT INTO `industries` VALUES ('7', '08/01/2018', 'Attorneys Trust Accounts', '1');
INSERT INTO `industries` VALUES ('8', '08/01/2018', 'Estate Agents Trust Accounts', '1');
INSERT INTO `industries` VALUES ('9', '08/01/2018', 'Auditor General South Africa assignments', '1');
INSERT INTO `industries` VALUES ('10', '08/01/2018', 'Body Corporates', '1');
INSERT INTO `industries` VALUES ('11', '08/01/2018', 'Shareblocks', '1');
INSERT INTO `industries` VALUES ('12', '08/01/2018', 'Construction entities', '1');
INSERT INTO `industries` VALUES ('13', '08/01/2018', 'Cooperatives', '1');
INSERT INTO `industries` VALUES ('14', '08/01/2018', 'Farming', '1');
INSERT INTO `industries` VALUES ('15', '08/01/2018', 'Agriculture entities', '1');
INSERT INTO `industries` VALUES ('16', '08/01/2018', 'Financial institutions (eg. Bank, Insurance)', '1');
INSERT INTO `industries` VALUES ('17', '08/01/2018', 'Manufacturers', '1');
INSERT INTO `industries` VALUES ('18', '08/01/2018', 'Engineering', '1');
INSERT INTO `industries` VALUES ('19', '08/01/2018', 'Medical schemes', '1');
INSERT INTO `industries` VALUES ('20', '08/01/2018', 'Property entities', '1');
INSERT INTO `industries` VALUES ('21', '08/01/2018', 'Investment entities', '1');
INSERT INTO `industries` VALUES ('22', '08/01/2018', 'Trusts', '1');
INSERT INTO `industries` VALUES ('23', '08/01/2018', 'Retailers', '1');
INSERT INTO `industries` VALUES ('24', '08/01/2018', 'Wholesalers', '1');
INSERT INTO `industries` VALUES ('25', '08/01/2018', 'Retirement funds', '1');
INSERT INTO `industries` VALUES ('26', '08/01/2018', 'Pension funds', '1');
INSERT INTO `industries` VALUES ('27', '08/01/2018', 'Provident funds', '1');
INSERT INTO `industries` VALUES ('28', '08/01/2018', 'Schools', '1');
INSERT INTO `industries` VALUES ('29', '08/01/2018', 'Service entities', '1');
INSERT INTO `industries` VALUES ('30', '08/01/2018', 'Stockbrokers', '1');
INSERT INTO `industries` VALUES ('31', '08/01/2018', 'Tertiary institutions', '1');
INSERT INTO `industries` VALUES ('32', '08/01/2018', 'Trade unions', '1');
INSERT INTO `industries` VALUES ('33', '08/01/2018', 'Other', '1');

-- ----------------------------
-- Table structure for `job_role`
-- ----------------------------
DROP TABLE IF EXISTS `job_role`;
CREATE TABLE `job_role` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `session` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `1` varchar(255) DEFAULT NULL,
  `2` varchar(255) DEFAULT NULL,
  `3` varchar(255) DEFAULT NULL,
  `4` varchar(255) DEFAULT NULL,
  `5` varchar(255) DEFAULT NULL,
  `6` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of job_role
-- ----------------------------
INSERT INTO `job_role` VALUES ('1', '120218021906', '12/02/2018', 'Yes', 'No', 'No', 'No', 'No', 'No');
INSERT INTO `job_role` VALUES ('2', '120218021906', '12/02/2018', 'Yes', 'No', 'No', 'No', 'No', 'No');

-- ----------------------------
-- Table structure for `leadership_and_management`
-- ----------------------------
DROP TABLE IF EXISTS `leadership_and_management`;
CREATE TABLE `leadership_and_management` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `date` varchar(255) DEFAULT NULL,
  `session` varchar(255) DEFAULT NULL,
  `1` varchar(255) DEFAULT NULL,
  `2` varchar(255) DEFAULT NULL,
  `3` varchar(255) DEFAULT NULL,
  `4` varchar(255) DEFAULT NULL,
  `5` varchar(255) DEFAULT NULL,
  `6` varchar(255) DEFAULT NULL,
  `7` varchar(255) DEFAULT NULL,
  `8` varchar(255) DEFAULT NULL,
  `9` varchar(255) DEFAULT NULL,
  `10` varchar(255) DEFAULT NULL,
  `11` varchar(255) DEFAULT NULL,
  `12` varchar(255) DEFAULT NULL,
  `13` varchar(255) DEFAULT NULL,
  `14` varchar(255) DEFAULT NULL,
  `15` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of leadership_and_management
-- ----------------------------
INSERT INTO `leadership_and_management` VALUES ('1', '12/02/2018', '120218021906', 'Yes', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No');

-- ----------------------------
-- Table structure for `learning_and_development`
-- ----------------------------
DROP TABLE IF EXISTS `learning_and_development`;
CREATE TABLE `learning_and_development` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `session` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `1` varchar(255) DEFAULT NULL,
  `2` varchar(255) DEFAULT NULL,
  `3` varchar(255) DEFAULT NULL,
  `4` varchar(255) DEFAULT NULL,
  `5` varchar(255) DEFAULT NULL,
  `6` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `division` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of learning_and_development
-- ----------------------------
INSERT INTO `learning_and_development` VALUES ('1', '120218021906', '12/02/2018', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Tinashe', 'JHB');

-- ----------------------------
-- Table structure for `performance_namagement`
-- ----------------------------
DROP TABLE IF EXISTS `performance_namagement`;
CREATE TABLE `performance_namagement` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `session` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `1` varchar(255) DEFAULT NULL,
  `2` varchar(255) DEFAULT NULL,
  `3` varchar(255) DEFAULT NULL,
  `4` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of performance_namagement
-- ----------------------------
INSERT INTO `performance_namagement` VALUES ('1', '120218021906', '12/02/2018', 'Yes', 'No', 'No', 'No');

-- ----------------------------
-- Table structure for `project_notes`
-- ----------------------------
DROP TABLE IF EXISTS `project_notes`;
CREATE TABLE `project_notes` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `date` varchar(255) DEFAULT NULL,
  `project_id` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `notes` text,
  `active_status` varchar(255) DEFAULT '1',
  `notes_category` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of project_notes
-- ----------------------------

-- ----------------------------
-- Table structure for `services`
-- ----------------------------
DROP TABLE IF EXISTS `services`;
CREATE TABLE `services` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `date` varchar(255) DEFAULT NULL,
  `name` text,
  `active_status` varchar(255) DEFAULT '1',
  `type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of services
-- ----------------------------
INSERT INTO `services` VALUES ('1', '08/01/2018', 'Reasonable Assurance under ISA 700', '1', 'Assurance');
INSERT INTO `services` VALUES ('2', '08/01/2018', 'Reasonable Assurance under ISA 800', '1', 'Assurance');
INSERT INTO `services` VALUES ('5', '08/01/2018', 'Reasonable Assurance under ISA 805', '1', 'Assurance');
INSERT INTO `services` VALUES ('6', '08/01/2018', 'Reasonable Assurance under ISA 810', '1', 'Assurance');
INSERT INTO `services` VALUES ('7', '08/01/2018', 'Reasonable Assurance under ISAE 3000 for Attorneys Trusts', '1', 'Assurance');
INSERT INTO `services` VALUES ('8', '08/01/2018', 'Reasonable Assurance under ISAE 3000 other than Attorneys Trusts', '1', 'Assurance');
INSERT INTO `services` VALUES ('9', '08/01/2018', 'Reasonable Assurance under ISAE 3402', '1', 'Assurance');
INSERT INTO `services` VALUES ('10', '08/01/2018', 'Reasonable Assurance under ISAE 3410', '1', 'Assurance');
INSERT INTO `services` VALUES ('11', '08/01/2018', 'Reasonable Assurance under ISAE 3420', '1', 'Assurance');
INSERT INTO `services` VALUES ('12', '08/01/2018', 'Limited Assurance under ISRE 2400', '1', 'Assurance');
INSERT INTO `services` VALUES ('13', '08/01/2018', 'Limited Assurance under ISRE 2410', '1', 'Assurance');
INSERT INTO `services` VALUES ('14', '08/01/2018', 'Limited Assurance under ISRE 3000', '1', 'Assurance');
INSERT INTO `services` VALUES ('15', '08/01/2018', 'Limited Assurance under ISRE 3400', '1', 'Assurance');
INSERT INTO `services` VALUES ('16', '08/01/2018', 'Limited Assurance under ISRE 3402', '1', 'Assurance');
INSERT INTO `services` VALUES ('17', '08/01/2018', 'Limited Assurance under ISRE 3410', '1', 'Assurance');
INSERT INTO `services` VALUES ('18', '08/01/2018', 'Limited Assurance under ISRE 3420', '1', 'Assurance');
INSERT INTO `services` VALUES ('19', '08/01/2018', 'Related Services under ISRS 4400', '1', 'Assurance');
INSERT INTO `services` VALUES ('20', '08/01/2018', 'Related Services under ISRS 4410', '1', 'Assurance');
INSERT INTO `services` VALUES ('21', '08/01/2018', 'Accounting / Maintenance of accounting records', '1', 'Non Assurance');
INSERT INTO `services` VALUES ('22', '08/01/2018', 'Corporate advisory', '1', 'Non Assurance');
INSERT INTO `services` VALUES ('23', '08/01/2018', 'Taxation services', '1', 'Non Assurance');
INSERT INTO `services` VALUES ('24', '08/01/2018', 'Internal audit', '1', 'Non Assurance');
INSERT INTO `services` VALUES ('25', '08/01/2018', 'Statutory services', '1', 'Non Assurance');
INSERT INTO `services` VALUES ('26', '08/01/2018', 'Forensic services', '1', 'Non Assurance');
INSERT INTO `services` VALUES ('27', '08/01/2018', 'Other services', '1', 'Non Assurance');
INSERT INTO `services` VALUES ('28', '08/01/2018', 'Reasonable Assurance under ISAE 3400', '1', 'Assurance');

-- ----------------------------
-- Table structure for `sites`
-- ----------------------------
DROP TABLE IF EXISTS `sites`;
CREATE TABLE `sites` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `site_name` varchar(255) DEFAULT NULL,
  `active_status` varchar(22) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sites
-- ----------------------------
INSERT INTO `sites` VALUES ('1', 'Johannesburg', '1');
INSERT INTO `sites` VALUES ('2', 'Durban', '1');
INSERT INTO `sites` VALUES ('3', 'Stanger', '1');
INSERT INTO `sites` VALUES ('4', 'Pretoria', '1');
INSERT INTO `sites` VALUES ('5', 'Port Elizabeth', '1');

-- ----------------------------
-- Table structure for `update_status_notes`
-- ----------------------------
DROP TABLE IF EXISTS `update_status_notes`;
CREATE TABLE `update_status_notes` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `date` varchar(255) DEFAULT NULL,
  `project_id` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `notes` text,
  `active_status` varchar(255) DEFAULT '1',
  `project_status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of update_status_notes
-- ----------------------------

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `date` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `contact` int(255) DEFAULT NULL,
  `access` varchar(255) DEFAULT NULL,
  `role` text,
  `active_status` varchar(255) DEFAULT '1',
  `irba` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', '03/01/2018', 'Takunda', 'Chibanda', 'admin', 'admin', 'tgchibanda@gmail.com', '4059 Fracolin Road New Northlea', 'Gweru', 'South Africa', '712563214', 'Administrator', 'This is the systems developer. Does android and ios development.', '1', null);
INSERT INTO `users` VALUES ('2', '04/01/2018', 'Revo', 'Chewa', 'revo', 'password', 'revo@gmail.com', '25 Sunrise Flats Victoria Falls', 'Falls', 'Zimbabwe', '721225415', 'Auditor', 'There is nothing more to do', '1', null);
INSERT INTO `users` VALUES ('24', '08/01/2018', 'Tinashe', 'Makiwa', 'tinashe', 'password', 'tinashe@gmail.com', '23 Mkoba', 'Gweru', 'Zimbabwe', '712563215', 'Auditor', 'Systems administrator', '1', null);
INSERT INTO `users` VALUES ('26', null, 'Hitan', 'Ahul', null, null, null, null, 'Pretoria', null, null, 'Auditor', null, '1', null);
INSERT INTO `users` VALUES ('27', null, 'Wels', 'Bels', null, null, null, null, 'Pretoria', null, null, 'Auditor', null, '1', null);
INSERT INTO `users` VALUES ('28', null, 'Jay', 'Node', null, null, null, null, 'Pretoria', null, null, 'Auditor', null, '1', null);
INSERT INTO `users` VALUES ('29', null, 'Wellington', 'Mbombi', null, null, null, null, 'JHB', null, null, 'Auditor', null, '1', '12HHJ12');

-- ----------------------------
-- Table structure for `work_environment`
-- ----------------------------
DROP TABLE IF EXISTS `work_environment`;
CREATE TABLE `work_environment` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `session` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `1` varchar(255) DEFAULT NULL,
  `2` varchar(255) DEFAULT NULL,
  `3` varchar(255) DEFAULT NULL,
  `4` varchar(255) DEFAULT NULL,
  `5` varchar(255) DEFAULT NULL,
  `6` varchar(255) DEFAULT NULL,
  `7` varchar(255) DEFAULT NULL,
  `8` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of work_environment
-- ----------------------------
INSERT INTO `work_environment` VALUES ('1', '120218021906', '12/02/2018', 'Yes', 'No', 'No', 'No', 'No', 'No', 'No', 'No');

-- ----------------------------
-- View structure for `our clients`
-- ----------------------------
DROP VIEW IF EXISTS `our clients`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `our clients` AS select `clients`.`company_name` AS `Name`,`clients`.`company_email` AS `Email`,`clients`.`company_contact` AS `Contact`,`clients`.`company_city` AS `City`,`clients`.`company_country` AS `Country`,`clients`.`company_address` AS `Address` from `clients`;

-- ----------------------------
-- View structure for `system users`
-- ----------------------------
DROP VIEW IF EXISTS `system users`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `system users` AS select `users`.`name` AS `Name`,`users`.`surname` AS `Surname`,`users`.`username` AS `Username`,`users`.`email` AS `Email`,`users`.`address` AS `Address`,`users`.`city` AS `City`,`users`.`country` AS `Country`,`users`.`contact` AS `Contact`,`users`.`access` AS `Access` from `users`;
