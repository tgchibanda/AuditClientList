/*
Navicat MySQL Data Transfer

Source Server         : MySql
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : nkonki

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2018-03-01 15:05:29
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
INSERT INTO `accounting_framework` VALUES ('4', 'Modified Cash Basis', '1');
INSERT INTO `accounting_framework` VALUES ('5', 'Other', '1');

-- ----------------------------
-- Table structure for `assurance_work`
-- ----------------------------
DROP TABLE IF EXISTS `assurance_work`;
CREATE TABLE `assurance_work` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` text,
  `active_status` varchar(22) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of assurance_work
-- ----------------------------
INSERT INTO `assurance_work` VALUES ('1', 'AG (CO): The Auditor-General South Africa - Contracted Out', '1');
INSERT INTO `assurance_work` VALUES ('2', 'AG (S4): The Auditor-General South Africa - Section 4(3) of the Public Audit Act', '1');
INSERT INTO `assurance_work` VALUES ('3', 'ATA: Attorneys trust accounts', '1');
INSERT INTO `assurance_work` VALUES ('4', 'CoA: Companies Act', '1');
INSERT INTO `assurance_work` VALUES ('5', 'CO-OP: Cooperatives', '1');
INSERT INTO `assurance_work` VALUES ('6', 'EA: Estate Agents - business and trust', '1');
INSERT INTO `assurance_work` VALUES ('7', 'FSB: Financial Services Board', '1');
INSERT INTO `assurance_work` VALUES ('8', 'MedS: Medical Schemes', '1');
INSERT INTO `assurance_work` VALUES ('9', 'NONP: Non-profit organisations where the turnover is more than', '1');
INSERT INTO `assurance_work` VALUES ('10', 'OAW: Other assurance work', '1');
INSERT INTO `assurance_work` VALUES ('11', 'SARB: South African Reserve Bank', '1');
INSERT INTO `assurance_work` VALUES ('12', 'SUBJSE: Subsidiaries of listed companies', '1');
INSERT INTO `assurance_work` VALUES ('13', 'TER: All tertiary institutions', '1');

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
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

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
INSERT INTO `audit` VALUES ('36', '02/20/2018 04:55:18', 'admin', 'Loggin', 'Systems Login');
INSERT INTO `audit` VALUES ('37', '02/21/2018 12:04:12', 'admin', 'Loggin', 'Systems Login');
INSERT INTO `audit` VALUES ('38', '02/21/2018 08:37:24', 'admin', 'Loggin', 'Systems Login');
INSERT INTO `audit` VALUES ('39', '02/26/2018 03:56:42', 'admin', 'New Client', 'Created TEST');
INSERT INTO `audit` VALUES ('40', '02/26/2018 04:43:32', 'admin', 'New Client', 'Created TESTRRRRR');
INSERT INTO `audit` VALUES ('41', '02/26/2018 04:47:56', 'admin', 'New Client', 'Created TESTRRRRR');
INSERT INTO `audit` VALUES ('42', '02/26/2018 04:49:22', 'admin', 'New Client', 'Created TESTRRRRR');
INSERT INTO `audit` VALUES ('43', '02/26/2018 08:59:41', 'admin', 'Loggin', 'Systems Login');
INSERT INTO `audit` VALUES ('44', '02/27/2018 10:27:21', 'admin', 'Client Engagement', 'Engaged ');
INSERT INTO `audit` VALUES ('45', '02/27/2018 01:08:07', 'admin', 'Engagement edit', 'Edited 452');
INSERT INTO `audit` VALUES ('46', '02/27/2018 01:09:17', 'admin', 'Engagement edit', 'Edited 452');
INSERT INTO `audit` VALUES ('47', '02/28/2018 11:42:37', 'admin', 'New Client', 'Created XX');
INSERT INTO `audit` VALUES ('48', '02/28/2018 12:10:43', 'admin', 'Client Engagement', 'Engaged Acajou (Pty) Ltd');
INSERT INTO `audit` VALUES ('49', '02/28/2018 12:52:52', 'admin', 'Client Engagement', 'Engaged Acajou (Pty) Ltd');
INSERT INTO `audit` VALUES ('50', '02/28/2018 01:20:41', 'admin', 'Client Engagement', 'Engaged TESTRRRRR');
INSERT INTO `audit` VALUES ('51', '03/01/2018 11:58:04', 'admin', 'Client Engagement', 'Engaged Acajou (Pty) Ltd');
INSERT INTO `audit` VALUES ('52', '03/01/2018 12:10:39', 'admin', 'Engagement edit', 'Edited 456');
INSERT INTO `audit` VALUES ('53', '03/01/2018 12:17:43', 'admin', 'Engagement edit', 'Edited 456');
INSERT INTO `audit` VALUES ('54', '03/01/2018 12:18:37', 'admin', 'Engagement edit', 'Edited 456');
INSERT INTO `audit` VALUES ('55', '03/01/2018 01:34:41', 'admin', 'Engagement edit', 'Edited 456');

-- ----------------------------
-- Table structure for `audit_required`
-- ----------------------------
DROP TABLE IF EXISTS `audit_required`;
CREATE TABLE `audit_required` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `active_status` varchar(22) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of audit_required
-- ----------------------------
INSERT INTO `audit_required` VALUES ('1', 'AG (CO)', '1');
INSERT INTO `audit_required` VALUES ('2', 'AG (S4)', '1');
INSERT INTO `audit_required` VALUES ('3', 'ATA', '1');
INSERT INTO `audit_required` VALUES ('4', 'CoA', '1');
INSERT INTO `audit_required` VALUES ('5', 'CO-OP', '1');
INSERT INTO `audit_required` VALUES ('6', 'EA', '1');
INSERT INTO `audit_required` VALUES ('7', 'FSB', '1');
INSERT INTO `audit_required` VALUES ('8', 'MedS', '1');
INSERT INTO `audit_required` VALUES ('9', 'NONP', '1');
INSERT INTO `audit_required` VALUES ('10', 'OAW', '1');
INSERT INTO `audit_required` VALUES ('11', 'SARB', '1');
INSERT INTO `audit_required` VALUES ('12', 'SUBJSE', '1');
INSERT INTO `audit_required` VALUES ('13', 'TER', '1');

-- ----------------------------
-- Table structure for `clients`
-- ----------------------------
DROP TABLE IF EXISTS `clients`;
CREATE TABLE `clients` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `date` varchar(255) DEFAULT NULL,
  `company_name` text,
  `company_reg_number` varchar(255) DEFAULT NULL,
  `industry` varchar(255) DEFAULT NULL,
  `company_child` varchar(255) DEFAULT NULL,
  `relationship_owner` varchar(255) DEFAULT NULL,
  `active_status` varchar(255) DEFAULT '1',
  `engagement_stage` varchar(255) DEFAULT '0',
  `engagement_status` varchar(255) DEFAULT '0',
  `child_option` varchar(255) DEFAULT NULL,
  `parent_number` varchar(255) DEFAULT NULL,
  `child_reg_number` varchar(255) DEFAULT NULL,
  `company_parents_state` varchar(255) DEFAULT '0',
  `ref` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=391 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of clients
-- ----------------------------
INSERT INTO `clients` VALUES ('1', null, 'Acajou (Pty) Ltd', '', null, '', 'Mungofa B.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_011', 'Johannesburg');
INSERT INTO `clients` VALUES ('2', null, 'Accredited Investments (Pty) Ltd', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, '0', '1', 'SNH_l_025', 'Johannesburg');
INSERT INTO `clients` VALUES ('3', null, 'Advanced Terminations and Joints (Pty) Ltd', '', null, '', 'Helga Lotter', '1', '0', '1', 'No', null, null, '1', 'PTR_l_017', 'Pretoria ');
INSERT INTO `clients` VALUES ('4', null, 'Africabio NPC', '', null, '', 'RP Goldes', '1', '0', '1', 'No', null, null, '1', 'PTR_l_009', 'Pretoria ');
INSERT INTO `clients` VALUES ('5', null, 'African World Heritage Fund', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_090', 'Johannesburg');
INSERT INTO `clients` VALUES ('6', null, 'Agence Francaise De Developpment Project Preparation and Feasibility Studies', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_023', 'Johannesburg');
INSERT INTO `clients` VALUES ('7', null, 'Agulhas Wetlands', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_075', 'Johannesburg');
INSERT INTO `clients` VALUES ('8', null, 'ALBERANTE-RANDHART STEERING COMMITTEE (SECT 21)', '', null, '', 'J de Viliers', '1', '0', '1', 'No', null, null, '1', 'EGT_l_040', 'Alberton');
INSERT INTO `clients` VALUES ('9', null, 'ALBERTON TUISTE VIR BEJAARDES', '', null, '', 'IJ de Villiers', '1', '0', '1', 'No', null, null, '1', 'EGT_l_060', 'Alberton');
INSERT INTO `clients` VALUES ('10', null, 'ALBERTON TUISTE VIR BEJAARDES (ASSOCIATION INC UNDER SECTION 21)', '', null, '', 'IJ de Villiers', '1', '0', '1', 'No', null, null, '1', 'EGT_l_061', 'Alberton');
INSERT INTO `clients` VALUES ('11', null, 'Albou Trust', '', null, '', 'H Lotter', '1', '0', '1', 'No', null, null, '1', 'PTR_l_011', 'Pretoria ');
INSERT INTO `clients` VALUES ('12', null, 'Albou Trust', '', null, '', 'H Lotter', '1', '0', '1', 'No', null, null, '1', 'PTR_l_013', 'Pretoria ');
INSERT INTO `clients` VALUES ('13', null, 'Alchemist House (Pty) Ltd T/A Fleet Connect', '', null, '', 'Mungofa B.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_021', 'Johannesburg');
INSERT INTO `clients` VALUES ('14', null, 'AL-CLAD INTERIOR SYSTEMS (PTY) LTD', '', null, '', 'J de Viliers', '1', '0', '1', 'No', null, null, '1', 'EGT_h_007', 'Alberton');
INSERT INTO `clients` VALUES ('15', null, 'Altamonte Investments (Pty) Ltd', '', null, '', 'M.A.Motala', '1', '0', '1', 'No', null, null, '1', 'DBN_l_013', 'Durban');
INSERT INTO `clients` VALUES ('16', null, 'Amada Asset Management (Pty) Ltd', '', null, '', 'RP Goldes', '1', '0', '1', 'No', null, null, '1', 'PTR_h_006', 'Pretoria ');
INSERT INTO `clients` VALUES ('17', null, 'Anglo Inyosi Coal Community Development Trust', '', null, '', 'Muzarewetu N.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_102', 'Johannesburg');
INSERT INTO `clients` VALUES ('18', null, 'Apparel Industries (Pty) Ltd', '', null, '', 'F.A.S Haffejee', '1', '0', '1', 'No', null, null, '1', 'DBN_l_019', 'Durban');
INSERT INTO `clients` VALUES ('19', null, 'Aquarella Investments 224 (Pty) Ltd', '', null, '', 'Y.M Paruk', '1', '0', '1', 'No', null, null, '1', 'DBN_l_037', 'Durban');
INSERT INTO `clients` VALUES ('20', null, 'Araf Industries (Pty) Ltd 2016', '', null, '', 'Y.M Paruk', '1', '0', '1', 'No', null, null, '1', 'DBN_h_003', 'Durban');
INSERT INTO `clients` VALUES ('21', null, 'Araf Industries (Pty) Ltd 2017', '', null, '', 'Y.M Paruk', '1', '0', '1', 'No', null, null, '1', 'DBN_h_004', 'Durban');
INSERT INTO `clients` VALUES ('22', null, 'Argon Securities', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_049', 'Johannesburg');
INSERT INTO `clients` VALUES ('23', null, 'Asmall & Sons (Pty) Ltd', '', null, '', 'M.A Motala', '1', '0', '1', 'No', null, null, '1', 'DBN_h_019', 'Durban');
INSERT INTO `clients` VALUES ('24', null, 'Attacq Group ESD (Pty) Ltd', '', null, '', 'RP Goldes', '1', '0', '1', 'No', null, null, '1', 'PTR_l_031', 'Pretoria ');
INSERT INTO `clients` VALUES ('25', null, 'Auditor General Work- contracted out- Umgeni water', '', null, '', 'M.A Motala', '1', '0', '1', 'No', null, null, '1', 'DBN_h_001', 'Durban');
INSERT INTO `clients` VALUES ('26', null, 'Autumn Star Trading 100 (Pty) Ltd', '', null, '', 'Y.M Paruk', '1', '0', '1', 'No', null, null, '1', 'DBN_l_006', 'Durban');
INSERT INTO `clients` VALUES ('27', null, 'Basadi Ba Kopane Investment (Pty) Ltd', '', null, '', 'Muzarewetu N.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_103', 'Johannesburg');
INSERT INTO `clients` VALUES ('28', null, 'BEAUFORT WEST MUSEUM', '', null, '', 'Amaanullah Ayub', '1', '0', '1', 'No', null, null, '1', 'CTN_h_004', 'Cape Town ');
INSERT INTO `clients` VALUES ('29', null, 'Bekker Prokureurs', '', null, '', 'RP Goldes', '1', '0', '1', 'No', null, null, '1', 'PTR_h_011', 'Pretoria ');
INSERT INTO `clients` VALUES ('30', null, 'BELHAR ISLAMIC PRIMARY SCHOOL', '', null, '', 'Amaanullah Ayub', '1', '0', '1', 'No', null, null, '1', 'CTN_l_021', 'Cape Town ');
INSERT INTO `clients` VALUES ('31', null, 'BESSEMER AFRICA (PTY) LTD', '', null, '', 'S Prinsloo', '1', '0', '1', 'No', null, null, '1', 'EGT_l_024', 'Alberton');
INSERT INTO `clients` VALUES ('32', null, 'BESSEMER BELANGE (PTY) LTD', '', null, '', 'S Prinsloo', '1', '0', '1', 'No', null, null, '1', 'EGT_l_025', 'Alberton');
INSERT INTO `clients` VALUES ('33', null, 'Biarritz Investments (Pty) Ltd', '', null, '', 'Y.M Paruk', '1', '0', '1', 'No', null, null, '1', 'DBN_l_021', 'Durban');
INSERT INTO `clients` VALUES ('34', null, 'Bizhub Highveld Lions', '', null, '', 'Muzarewetu N.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_113', 'Johannesburg');
INSERT INTO `clients` VALUES ('35', null, 'Blue Shirt Bakery (Pty) Ltd', '', null, '', 'IJ de Villiers', '1', '0', '1', 'No', null, null, '1', 'EGT_l_015', 'Alberton');
INSERT INTO `clients` VALUES ('36', null, 'BODY CORPORATE HILLBROW COMMUNITY CENTRE', '', null, '', 'IJ de Villiers', '1', '0', '1', 'No', null, null, '1', 'EGT_l_055', 'Alberton');
INSERT INTO `clients` VALUES ('37', null, 'BODY CORPORATE THE BALINESE', '', null, '', 'IJ de Villiers', '1', '0', '1', 'No', null, null, '1', 'EGT_l_056', 'Alberton');
INSERT INTO `clients` VALUES ('38', null, 'BOLAND CRICKET BOARD', '', null, '', 'Amaanullah Ayub', '1', '0', '1', 'No', null, null, '1', 'CTN_l_019', 'Cape Town ');
INSERT INTO `clients` VALUES ('39', null, 'Borbartia (Pty) Ltd', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_026', 'Johannesburg');
INSERT INTO `clients` VALUES ('40', null, 'BREDASDORP MUSEUM', '', null, '', 'Amaanullah Ayub', '1', '0', '1', 'No', null, null, '1', 'CTN_h_006', 'Cape Town ');
INSERT INTO `clients` VALUES ('41', null, 'CARBONADO ENERGY (PTY) LTD', '', null, '', 'Amaanullah Ayub', '1', '0', '1', 'No', null, null, '1', 'CTN_h_008', 'Cape Town ');
INSERT INTO `clients` VALUES ('42', null, 'Casa Luigi Properties (Pty) Ltd', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_027', 'Johannesburg');
INSERT INTO `clients` VALUES ('43', null, 'Casa Mia Body Corporate', '', null, '', 'RP Goldes', '1', '0', '1', 'No', null, null, '1', 'PTR_l_039', 'Pretoria ');
INSERT INTO `clients` VALUES ('44', null, 'Centaur De Roodepoort ', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_089', 'Johannesburg');
INSERT INTO `clients` VALUES ('45', null, 'Centaur Mining South Africa ', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_088', 'Johannesburg');
INSERT INTO `clients` VALUES ('46', null, 'CENTRAL AFRICAN ROAD SERVICES (PTY) LTD', '', null, '', 'J de Viliers', '1', '0', '1', 'No', null, null, '1', 'EGT_l_001', 'Alberton');
INSERT INTO `clients` VALUES ('47', null, 'Central Cricket Franchise (Pty) Ltd', '', null, '', 'Julia van Wyk', '1', '0', '1', 'No', null, null, '1', 'BLM_l_003', 'Bloemfontein');
INSERT INTO `clients` VALUES ('48', null, 'CENTRAL GAUTENG GYMNASTICS ASSOCIATION', '', null, '', 'J de Viliers', '1', '0', '1', 'No', null, null, '1', 'EGT_l_041', 'Alberton');
INSERT INTO `clients` VALUES ('49', null, 'CHAFEKER & SHABODIEN INC', '', null, '', 'Amaanullah Ayub', '1', '0', '1', 'No', null, null, '1', 'CTN_h_016', 'Cape Town ');
INSERT INTO `clients` VALUES ('50', null, 'CHRISTELIKE MAATSKAPLIKE RAAD ALBERTON', '', null, '', 'IJ de Villiers', '1', '0', '1', 'No', null, null, '1', 'EGT_l_037', 'Alberton');
INSERT INTO `clients` VALUES ('51', null, 'CHRISTELIKE MAATSKAPLIKE RAAD STANDERTON', '', null, '', 'IJ de Villiers', '1', '0', '1', 'No', null, null, '1', 'EGT_l_033', 'Alberton');
INSERT INTO `clients` VALUES ('52', null, 'Cilbar and Company', '', null, '', 'Y.M Paruk', '1', '0', '1', 'No', null, null, '1', 'DBN_l_009', 'Durban');
INSERT INTO `clients` VALUES ('53', null, 'COMMERCIAL MINING WEARPARTS (PTY) LTD', '', null, '', 'J de Viliers', '1', '0', '1', 'No', null, null, '1', 'EGT_l_008', 'Alberton');
INSERT INTO `clients` VALUES ('54', null, 'Cricket South Africa', '', null, '', 'Masasa T.', '1', '0', '1', 'No', null, null, '1', 'SNH_h_004', 'Johannesburg');
INSERT INTO `clients` VALUES ('55', null, 'C-Track SA (Pty) Limited', '', null, '', 'Mungofa B.', '1', '0', '1', 'No', null, null, '1', 'SNH_h_005', 'Johannesburg');
INSERT INTO `clients` VALUES ('56', null, 'Darnall Motor Transport (Pty) Ltd', '', null, '', 'Y.M Paruk', '1', '0', '1', 'No', null, null, '1', 'DBN_l_016', 'Durban');
INSERT INTO `clients` VALUES ('57', null, 'DE VRIES INCORPORATED', '', null, '', 'S Prinsloo', '1', '0', '1', 'No', null, null, '1', 'EGT_h_008', 'Alberton');
INSERT INTO `clients` VALUES ('58', null, 'Dealernet (Pty) Ltd', '', null, '', 'H Lotter', '1', '0', '1', 'No', null, null, '1', 'PTR_h_002', 'Pretoria ');
INSERT INTO `clients` VALUES ('59', null, 'Dealfin (Pty) Ltd', '', null, '', 'H Lotter', '1', '0', '1', 'No', null, null, '1', 'PTR_h_007', 'Pretoria ');
INSERT INTO `clients` VALUES ('60', null, 'Debbie Pillay Attorneys', '', null, '', 'J. Jamal', '1', '0', '1', 'No', null, null, '1', 'DBN_h_015', 'Durban');
INSERT INTO `clients` VALUES ('61', null, 'Desert Star Trading 109 (Pty) Ltd', '', null, '', 'Y.M Paruk', '1', '0', '1', 'No', null, null, '1', 'DBN_l_045', 'Durban');
INSERT INTO `clients` VALUES ('62', null, 'Development Bank of South Africa', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_h_002', 'Johannesburg');
INSERT INTO `clients` VALUES ('63', null, 'DIE CHRISTELIKE MAATSKAPLIKE RAAD RING VAN HEIDELBERG', '', null, '', 'IJ de Villiers', '1', '0', '1', 'No', null, null, '1', 'EGT_l_054', 'Alberton');
INSERT INTO `clients` VALUES ('64', null, 'DigiCore Electronics (Pty) Ltd', '', null, '', 'Mungofa B.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_015', 'Johannesburg');
INSERT INTO `clients` VALUES ('65', null, 'DigiCore Financial Services (Pty) Ltd ', '', null, '', 'Mungofa B.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_017', 'Johannesburg');
INSERT INTO `clients` VALUES ('66', null, 'DigiCore Fleet Management SA (Pty) Ltd', '', null, '', 'Mungofa B.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_016', 'Johannesburg');
INSERT INTO `clients` VALUES ('67', null, 'Digicore Holdings Limited', '', null, '', 'Mungofa B.', '1', '0', '1', 'No', null, null, '1', 'SNH_h_015', 'Johannesburg');
INSERT INTO `clients` VALUES ('68', null, 'DigiCore Management Services (Pty) Ltd', '', null, '', 'Mungofa B.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_020', 'Johannesburg');
INSERT INTO `clients` VALUES ('69', null, 'DigiCore Properties (Pty) Ltd ', '', null, '', 'Mungofa B.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_018', 'Johannesburg');
INSERT INTO `clients` VALUES ('70', null, 'Dr Alberts, Bouwer & Jordaan Incorporated', '', null, '', 'H Lotter', '1', '0', '1', 'No', null, null, '1', 'PTR_l_005', 'Pretoria ');
INSERT INTO `clients` VALUES ('71', null, 'DRIES VAN DER WALT FINANSIELE DIENSTE', '', null, '', 'IJ de Villiers', '1', '0', '1', 'No', null, null, '1', 'EGT_l_042', 'Alberton');
INSERT INTO `clients` VALUES ('72', null, 'Drs Thomson Brittain and Partners', '', null, '', 'H Lotter', '1', '0', '1', 'No', null, null, '1', 'PTR_l_016', 'Pretoria ');
INSERT INTO `clients` VALUES ('73', null, 'Drs Thomson Brittain and Partners', '', null, '', 'H Lotter', '1', '0', '1', 'No', null, null, '1', 'PTR_l_028', 'Pretoria ');
INSERT INTO `clients` VALUES ('74', null, 'Dusty Moon Investments 43 (Pty) Ltd', '', null, '', 'H Lotter', '1', '0', '1', 'No', null, null, '1', 'PTR_l_032', 'Pretoria ');
INSERT INTO `clients` VALUES ('75', null, 'Dusty Moon Investments 43 (Pty) Ltd', '', null, '', 'H Lotter', '1', '0', '1', 'No', null, null, '1', 'PTR_l_033', 'Pretoria ');
INSERT INTO `clients` VALUES ('76', null, 'Eastern Cricket', '', null, '', 'Muzarewetu N.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_108', 'Johannesburg');
INSERT INTO `clients` VALUES ('77', null, 'Easy Vortex Financial Wellness (Pty) Ltd', '', null, '', 'IJ de Villiers', '1', '0', '1', 'No', null, null, '1', 'EGT_l_014', 'Alberton');
INSERT INTO `clients` VALUES ('78', null, 'EC- WFtC- Addo National Park - Woody Section (15/18)', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_085', 'Johannesburg');
INSERT INTO `clients` VALUES ('79', null, 'EKHAYA NEIGHBURHOOD CITY IMPROVEMENT DISTRICT (SECT 21)', '', null, '', 'IJ de Villiers', '1', '0', '1', 'No', null, null, '1', 'EGT_l_045', 'Alberton');
INSERT INTO `clients` VALUES ('80', null, 'Environmental Monitors 2016 / 19', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_079', 'Johannesburg');
INSERT INTO `clients` VALUES ('81', null, 'Etana Holdings', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_041', 'Johannesburg');
INSERT INTO `clients` VALUES ('82', null, 'F.H. Ali - Business account', '', null, '', 'J. Jamal', '1', '0', '1', 'No', null, null, '1', 'DBN_h_014', 'Durban');
INSERT INTO `clients` VALUES ('83', null, 'F.H. Ali - Estate Agent Trust Account - dormant', '', null, '', 'J. Jamal', '1', '0', '1', 'No', null, null, '1', 'DBN_h_016', 'Durban');
INSERT INTO `clients` VALUES ('84', null, 'Factodex (Pty) Ltd', '', null, '', 'Y.M Paruk', '1', '0', '1', 'No', null, null, '1', 'DBN_l_001', 'Durban');
INSERT INTO `clients` VALUES ('85', null, 'Fashion Fusion Distribution (Pty) Ltd', '', null, '', 'F.A.S Haffejee', '1', '0', '1', 'No', null, null, '1', 'DBN_h_018', 'Durban');
INSERT INTO `clients` VALUES ('86', null, 'Fashion Fusion Traders (Pty) Ltd', '', null, '', 'F.A.S Haffejee', '1', '0', '1', 'No', null, null, '1', 'DBN_h_002', 'Durban');
INSERT INTO `clients` VALUES ('87', null, 'Firebush Investments (Pty) Ltd', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_028', 'Johannesburg');
INSERT INTO `clients` VALUES ('88', null, 'Firewood Investments (Pty) Ltd', '', null, '', 'M.A.Motala', '1', '0', '1', 'No', null, null, '1', 'DBN_l_014', 'Durban');
INSERT INTO `clients` VALUES ('89', null, 'Fivaz Incorporated', '', null, '', 'RP Goldes', '1', '0', '1', 'No', null, null, '1', 'PTR_h_004', 'Pretoria ');
INSERT INTO `clients` VALUES ('90', null, 'FONTAINEBLEAU GEMEENSKAPSKERK', '', null, '', 'IJ de Villiers', '1', '0', '1', 'No', null, null, '1', 'EGT_l_019', 'Alberton');
INSERT INTO `clients` VALUES ('91', null, 'Free State Cricket NPC', '', null, '', 'Julia van Wyk', '1', '0', '1', 'No', null, null, '1', 'BLM_l_001', 'Bloemfontein');
INSERT INTO `clients` VALUES ('92', null, 'Freedom Stationery (Pty) Ltd', '', null, '', 'M. Haffejee', '1', '0', '1', 'No', null, null, '1', 'DBN_h_020', 'Durban');
INSERT INTO `clients` VALUES ('93', null, 'Friedshelf 1571 (Pty) Ltd', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_029', 'Johannesburg');
INSERT INTO `clients` VALUES ('94', null, 'GALAXY JUWELERS (PTY) LTD', '', null, '', 'J de Viliers', '1', '0', '1', 'No', null, null, '1', 'EGT_h_004', 'Alberton');
INSERT INTO `clients` VALUES ('95', null, 'GANGEN ATTORNEYS', '', null, '', 'Amaanullah Ayub', '1', '0', '1', 'No', null, null, '1', 'CTN_h_017', 'Cape Town ');
INSERT INTO `clients` VALUES ('96', null, 'Gauteng Cricket Board', '', null, '', 'Muzarewetu N.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_110', 'Johannesburg');
INSERT INTO `clients` VALUES ('97', null, 'Gayatri Cans (Pty) Ltd ', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_h_023', 'Johannesburg');
INSERT INTO `clients` VALUES ('98', null, 'Gayatri Cans (Pty) Ltd ', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_h_025', 'Johannesburg');
INSERT INTO `clients` VALUES ('99', null, 'Gayatri Paper Mill (Pty) Ltd ', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_h_017', 'Johannesburg');
INSERT INTO `clients` VALUES ('100', null, 'Gayatri Paper Mill (Pty) Ltd ', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_h_018', 'Johannesburg');
INSERT INTO `clients` VALUES ('101', null, 'Gayatri Paper Mill Gauteng (Pty) Ltd  ', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_053', 'Johannesburg');
INSERT INTO `clients` VALUES ('102', null, 'Gayatri Paper Mill Gauteng (Pty) Ltd  ', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_056', 'Johannesburg');
INSERT INTO `clients` VALUES ('103', null, 'Golden Era Printers & Stationers Bops (Pty) Ltd ', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_h_011', 'Johannesburg');
INSERT INTO `clients` VALUES ('104', null, 'Golden Era Printers & Stationers Bops (Pty) Ltd ', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_h_012', 'Johannesburg');
INSERT INTO `clients` VALUES ('105', null, 'Golden Gate Higlands National Park  Working for Wetlands', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_077', 'Johannesburg');
INSERT INTO `clients` VALUES ('106', null, 'Greene Consulting Engineers (Pty) Ltd', '', null, '', 'RP Goldes', '1', '0', '1', 'No', null, null, '1', 'PTR_l_008', 'Pretoria ');
INSERT INTO `clients` VALUES ('107', null, 'Griqua Diamonds (Pty) Ltd t/a Northern Cape Cricket (Pty) Ltd', '', null, '', 'Julia van Wyk', '1', '0', '1', 'No', null, null, '1', 'BLM_l_002', 'Bloemfontein');
INSERT INTO `clients` VALUES ('108', null, 'Ground Lily Investments (Pty) Ltd ', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_030', 'Johannesburg');
INSERT INTO `clients` VALUES ('109', null, 'Haupt Earle & Vennote Attorneys', '', null, '', 'RP Goldes', '1', '0', '1', 'No', null, null, '1', 'PTR_h_010', 'Pretoria ');
INSERT INTO `clients` VALUES ('110', null, 'Hazsons Holdings Shareblock (Pty) Ltd', '', null, '', 'J. Jamal', '1', '0', '1', 'No', null, null, '1', 'DBN_l_002', 'Durban');
INSERT INTO `clients` VALUES ('111', null, 'Hiconnex (Pty) Ltd', '', null, '', 'H Lotter', '1', '0', '1', 'No', null, null, '1', 'PTR_l_001', 'Pretoria ');
INSERT INTO `clients` VALUES ('112', null, 'Hiconnex Communications (Pty) Ltd', '', null, '', 'Helga Lotter', '1', '0', '1', 'No', null, null, '1', 'PTR_l_014', 'Pretoria ');
INSERT INTO `clients` VALUES ('113', null, 'Hiconnex Industrials (Pty) Ltd', '', null, '', 'Helga Lotter', '1', '0', '1', 'No', null, null, '1', 'PTR_l_015', 'Pretoria ');
INSERT INTO `clients` VALUES ('114', null, 'Highgrowth Investments (Pty) Ltd', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_042', 'Johannesburg');
INSERT INTO `clients` VALUES ('115', null, 'Hollard Behold (Cresta Properties) (Pty) Ltd', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_044', 'Johannesburg');
INSERT INTO `clients` VALUES ('116', null, 'Hollard Business Associates (Pty) Ltd', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_043', 'Johannesburg');
INSERT INTO `clients` VALUES ('117', null, 'Hollard Dealer Partners (Pty) Ltd', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_039', 'Johannesburg');
INSERT INTO `clients` VALUES ('118', null, 'Hollard Investment Managers (Pty) Ltd', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_031', 'Johannesburg');
INSERT INTO `clients` VALUES ('119', null, 'Hollard Life Properties (Pty) Ltd ', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_032', 'Johannesburg');
INSERT INTO `clients` VALUES ('120', null, 'Hollard Portfolio (Pty) Ltd', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_048', 'Johannesburg');
INSERT INTO `clients` VALUES ('121', null, 'HUGUENOT MEMORIAL MUSEUM', '', null, '', 'Amaanullah Ayub', '1', '0', '1', 'No', null, null, '1', 'CTN_h_003', 'Cape Town ');
INSERT INTO `clients` VALUES ('122', null, 'Hussun Goga & Company Attorney', '', null, '', 'Y.M Paruk', '1', '0', '1', 'No', null, null, '1', 'DBN_h_007', 'Durban');
INSERT INTO `clients` VALUES ('123', null, 'Ice Blue Clothing (Pty) Ltd', '', null, '', 'Y.M Paruk', '1', '0', '1', 'No', null, null, '1', 'DBN_l_012', 'Durban');
INSERT INTO `clients` VALUES ('124', null, 'Independent Power Producer office', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_057', 'Johannesburg');
INSERT INTO `clients` VALUES ('125', null, 'Industrial Parks Revitalisation Programme (DTI)', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_024', 'Johannesburg');
INSERT INTO `clients` VALUES ('126', null, 'Integrated Fare Collection Services (Pty) Ltd ', '', null, '', 'Mungofa B.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_019', 'Johannesburg');
INSERT INTO `clients` VALUES ('127', null, 'Intekom', '', null, '', 'Mungofa B.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_010', 'Johannesburg');
INSERT INTO `clients` VALUES ('128', null, 'Irfan Trading', '', null, '', 'F.A.S Haffejee', '1', '0', '1', 'No', null, null, '1', 'DBN_l_025', 'Durban');
INSERT INTO `clients` VALUES ('129', null, 'Islamic Guidance Trust ', '', null, '', 'R.Timol', '1', '0', '1', 'No', null, null, '1', 'DBN_l_042', 'Durban');
INSERT INTO `clients` VALUES ('130', null, 'Izingwe Aberdare Cables (Pty) Ltd', '', null, '', 'Muzarewetu N.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_092', 'Johannesburg');
INSERT INTO `clients` VALUES ('131', null, 'Izingwe Cable Investments (Pty) Ltd', '', null, '', 'Muzarewetu N.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_093', 'Johannesburg');
INSERT INTO `clients` VALUES ('132', null, 'Izingwe Capital (Pty) Ltd', '', null, '', 'Muzarewetu N.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_105', 'Johannesburg');
INSERT INTO `clients` VALUES ('133', null, 'Izingwe Holdings (Pty) Ltd', '', null, '', 'Muzarewetu N.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_097', 'Johannesburg');
INSERT INTO `clients` VALUES ('134', null, 'Izingwe International Fund (Pty) Ltd', '', null, '', 'Muzarewetu N.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_094', 'Johannesburg');
INSERT INTO `clients` VALUES ('135', null, 'Izingwe Investment Holdings (Pty) Ltd', '', null, '', 'Muzarewetu N.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_098', 'Johannesburg');
INSERT INTO `clients` VALUES ('136', null, 'Izingwe Main Street (Pty) Ltd', '', null, '', 'Muzarewetu N.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_095', 'Johannesburg');
INSERT INTO `clients` VALUES ('137', null, 'Izingwe Properties (Pty) Ltd', '', null, '', 'Muzarewetu N.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_091', 'Johannesburg');
INSERT INTO `clients` VALUES ('138', null, 'Izingwe Property Managers (Pty) Ltd', '', null, '', 'Muzarewetu N.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_096', 'Johannesburg');
INSERT INTO `clients` VALUES ('139', null, 'J AND K INTERIORS (PTY) LTD', '', null, '', 'Amaanullah Ayub', '1', '0', '1', 'No', null, null, '1', 'CTN_l_024', 'Cape Town ');
INSERT INTO `clients` VALUES ('140', null, 'Jannie Parsons Future Financials (Pty) Ltd', '', null, '', 'RP Goldes', '1', '0', '1', 'No', null, null, '1', 'PTR_h_003', 'Pretoria ');
INSERT INTO `clients` VALUES ('141', null, 'Jarvis Jacobs Raubenheimer Inc - Trust Audit', '', null, '', 'RP Goldes', '1', '0', '1', 'No', null, null, '1', 'PTR_h_005', 'Pretoria ');
INSERT INTO `clients` VALUES ('142', null, 'JOSCHO-MADULAMOHO JOINT VENTRUE', '', null, '', 'IJ de Villiers', '1', '0', '1', 'No', null, null, '1', 'EGT_l_028', 'Alberton');
INSERT INTO `clients` VALUES ('143', null, 'Jyotland Investments (Pty) Ltd', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_064', 'Johannesburg');
INSERT INTO `clients` VALUES ('144', null, 'Kalbo Land Holdings (Pty) Ltd', '', null, '', 'F.A.S Haffejee', '1', '0', '1', 'No', null, null, '1', 'DBN_l_029', 'Durban');
INSERT INTO `clients` VALUES ('145', null, 'Kamiesberg Working for Wetlands', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_074', 'Johannesburg');
INSERT INTO `clients` VALUES ('146', null, 'KHUSEL \'NDALO SOUTH AFRICA NPC', '', null, '', 'Amaanullah Ayub', '1', '0', '1', 'No', null, null, '1', 'CTN_l_004', 'Cape Town ');
INSERT INTO `clients` VALUES ('147', null, 'KHUSEL \'NDALO SOUTH AFRICA NPC DAC PROJECT 1', '', null, '', 'Amaanullah Ayub', '1', '0', '1', 'No', null, null, '1', 'CTN_l_009', 'Cape Town ');
INSERT INTO `clients` VALUES ('148', null, 'KHUSEL \'NDALO SOUTH AFRICA NPC DAC PROJECT 2', '', null, '', 'Amaanullah Ayub', '1', '0', '1', 'No', null, null, '1', 'CTN_l_011', 'Cape Town ');
INSERT INTO `clients` VALUES ('149', null, 'KHUSEL \'NDALO SOUTH AFRICA NPC DAC PROJECT 3', '', null, '', 'Amaanullah Ayub', '1', '0', '1', 'No', null, null, '1', 'CTN_l_012', 'Cape Town ');
INSERT INTO `clients` VALUES ('150', null, 'KNP WORKING FOR WETLAND', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_078', 'Johannesburg');
INSERT INTO `clients` VALUES ('151', null, 'KUSAGA TAKA CONSULTING', '', null, '', 'Amaanullah Ayub', '1', '0', '1', 'No', null, null, '1', 'CTN_l_002', 'Cape Town ');
INSERT INTO `clients` VALUES ('152', null, 'Kwa Dukuza Resource Centre NPC', '', null, '', 'J. Jamal', '1', '0', '1', 'No', null, null, '1', 'DBN_l_039', 'Durban');
INSERT INTO `clients` VALUES ('153', null, 'Kwazulu- Natal Cricket Union', '', null, '', 'M. Haffejee', '1', '0', '1', 'No', null, null, '1', 'DBN_l_017', 'Durban');
INSERT INTO `clients` VALUES ('154', null, 'Kwazulu Natal Cricket Union Bursary Trust', '', null, '', 'M. Haffejee', '1', '0', '1', 'No', null, null, '1', 'DBN_l_015', 'Durban');
INSERT INTO `clients` VALUES ('155', null, 'KZN Cricket (Pty) Ltd', '', null, '', 'M. Haffejee', '1', '0', '1', 'No', null, null, '1', 'DBN_h_006', 'Durban');
INSERT INTO `clients` VALUES ('156', null, 'L & J Finance (Pty) Ltd', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_065', 'Johannesburg');
INSERT INTO `clients` VALUES ('157', null, 'LAERSKOOL GENERAAL ALBERTS', '', null, '', 'J de Viliers', '1', '0', '1', 'No', null, null, '1', 'EGT_l_020', 'Alberton');
INSERT INTO `clients` VALUES ('158', null, 'Laeveld Agrochem (Pty) Ltd and its Subsidiaries', '', null, '', 'RP Goldes', '1', '0', '1', 'No', null, null, '1', 'PTR_h_001', 'Pretoria ');
INSERT INTO `clients` VALUES ('159', null, 'LAFARGE COMMUNITY TRUST', '', null, '', 'IJ de Villiers', '1', '0', '1', 'No', null, null, '1', 'EGT_l_062', 'Alberton');
INSERT INTO `clients` VALUES ('160', null, 'LAFARGE EDUCATION TRUST', '', null, '', 'IJ de Villiers', '1', '0', '1', 'No', null, null, '1', 'EGT_l_016', 'Alberton');
INSERT INTO `clients` VALUES ('161', null, 'LAMARA HENDRICKS ATTORNEYS', '', null, '', 'Amaanullah Ayub', '1', '0', '1', 'No', null, null, '1', 'CTN_h_015', 'Cape Town ');
INSERT INTO `clients` VALUES ('162', null, 'Laxmi Trust & Investment (Lenasia) (Pty) Ltd', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_066', 'Johannesburg');
INSERT INTO `clients` VALUES ('163', null, 'Laxmi Trust & Investment Company', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_063', 'Johannesburg');
INSERT INTO `clients` VALUES ('164', null, 'LEHLOHONOLO PROPERITIES', '', null, '', 'IJ de Villiers', '1', '0', '1', 'No', null, null, '1', 'EGT_h_013', 'Alberton');
INSERT INTO `clients` VALUES ('165', null, 'Leungo Investments (Pty) Ltd', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_047', 'Johannesburg');
INSERT INTO `clients` VALUES ('166', null, 'Lexshell 627 Investments (Pty) Ltd', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_069', 'Johannesburg');
INSERT INTO `clients` VALUES ('167', null, 'Limpopo Department of Health Programme (DBSA Mandate)', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_022', 'Johannesburg');
INSERT INTO `clients` VALUES ('168', null, 'Limpopo Impala Cricket Union (NPC)', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_071', 'Johannesburg');
INSERT INTO `clients` VALUES ('169', null, 'LUTHERON COMMUNITY OUTREACH FOUNDATION', '', null, '', 'IJ de Villiers', '1', '0', '1', 'No', null, null, '1', 'EGT_l_021', 'Alberton');
INSERT INTO `clients` VALUES ('170', null, 'Lynnwood Bridge Property Owners Association NPC', '', null, '', 'RP Goldes', '1', '0', '1', 'No', null, null, '1', 'PTR_l_019', 'Pretoria ');
INSERT INTO `clients` VALUES ('171', null, 'Lynnwood Bridge Property Owners Association NPC', '', null, '', 'RP Goldes', '1', '0', '1', 'No', null, null, '1', 'PTR_l_029', 'Pretoria ');
INSERT INTO `clients` VALUES ('172', null, 'M.S Omar and Associates', '', null, '', 'R. Timol', '1', '0', '1', 'No', null, null, '1', 'DBN_h_010', 'Durban');
INSERT INTO `clients` VALUES ('173', null, 'MADULAMMOHO HOUSING ASSOCIATION NPC', '', null, '', 'IJ de Villiers', '1', '0', '1', 'No', null, null, '1', 'EGT_h_006', 'Alberton');
INSERT INTO `clients` VALUES ('174', null, 'MAESTRO BEHUISING (PTY) LTD', '', null, '', 'S Prinsloo', '1', '0', '1', 'No', null, null, '1', 'EGT_l_044', 'Alberton');
INSERT INTO `clients` VALUES ('175', null, 'Magnolia Ridge Properties 102 (Pty) Ltd', '', null, '', 'Y.M Paruk', '1', '0', '1', 'No', null, null, '1', 'DBN_l_044', 'Durban');
INSERT INTO `clients` VALUES ('176', null, 'Mapungubwe National Park  Working for Wetlands', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_076', 'Johannesburg');
INSERT INTO `clients` VALUES ('177', null, 'MASSEL PROPERTY SERVICES (PTY) LTD', '', null, '', 'S Prinsloo', '1', '0', '1', 'No', null, null, '1', 'EGT_l_009', 'Alberton');
INSERT INTO `clients` VALUES ('178', null, 'Massmart Supplier Development Fund (Massmart SDF)', '', null, '', 'Masasa T.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_009', 'Johannesburg');
INSERT INTO `clients` VALUES ('179', null, 'MAYAT NURICK LANGA INC', '', null, '', 'J de Villiers', '1', '0', '1', 'No', null, null, '1', 'EGT_h_009', 'Alberton');
INSERT INTO `clients` VALUES ('180', null, 'McIver Apparel (Pty) Ltd', '', null, '', 'F.A.S Haffejee', '1', '0', '1', 'No', null, null, '1', 'DBN_l_020', 'Durban');
INSERT INTO `clients` VALUES ('181', null, 'MES KHULA SUSTAINABILITY TRUST', '', null, '', 'IJ de Villiers', '1', '0', '1', 'No', null, null, '1', 'EGT_l_059', 'Alberton');
INSERT INTO `clients` VALUES ('182', null, 'Metal and Engineering Industries Bargaining Council Sick Pay Fund', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_h_008', 'Johannesburg');
INSERT INTO `clients` VALUES ('183', null, 'Metal and Engineering Industries Permanent Disability Scheme', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_h_006', 'Johannesburg');
INSERT INTO `clients` VALUES ('184', null, 'Metal industries Benefit Fund Administrators', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_h_009', 'Johannesburg');
INSERT INTO `clients` VALUES ('185', null, 'METRO EVANGELIESE SORG (SECTION 21)', '', null, '', 'IJ de Villiers', '1', '0', '1', 'No', null, null, '1', 'EGT_l_004', 'Alberton');
INSERT INTO `clients` VALUES ('186', null, 'MIDVAAL THREADING (PTY) LTD', '', null, '', 'S Prinsloo', '1', '0', '1', 'No', null, null, '1', 'EGT_l_017', 'Alberton');
INSERT INTO `clients` VALUES ('187', null, 'Mogwele Waste (Pty) Ltd ', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_h_016', 'Johannesburg');
INSERT INTO `clients` VALUES ('188', null, 'Mogwele Waste (Pty) Ltd ', '', null, '', 'Amaanullah Ayub', '1', '0', '1', 'No', null, null, '1', 'CTN_h_001', 'Cape Town ');
INSERT INTO `clients` VALUES ('189', null, 'Mohammed Motala and Company', '', null, '', 'Y.M Paruk', '1', '0', '1', 'No', null, null, '1', 'DBN_h_011', 'Durban');
INSERT INTO `clients` VALUES ('190', null, 'Molsons Property Investments (Pty) Ltd ', '', null, '', 'Y.M Paruk', '1', '0', '1', 'No', null, null, '1', 'DBN_l_004', 'Durban');
INSERT INTO `clients` VALUES ('191', null, 'Monyetla', '', null, '', 'Masasa T.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_002', 'Johannesburg');
INSERT INTO `clients` VALUES ('192', null, 'Morgan Pillay, Reddy and Company', '', null, '', 'Y.M Paruk', '1', '0', '1', 'No', null, null, '1', 'DBN_h_012', 'Durban');
INSERT INTO `clients` VALUES ('193', null, 'Morning Tide Investments 67 (Pty) Ltd', '', null, '', 'Y.M Paruk', '1', '0', '1', 'No', null, null, '1', 'DBN_l_043', 'Durban');
INSERT INTO `clients` VALUES ('194', null, 'Moss Ridge Properties (Pty) Ltd', '', null, '', 'M. Haffejee', '1', '0', '1', 'No', null, null, '1', 'DBN_h_023', 'Durban');
INSERT INTO `clients` VALUES ('195', null, 'Mountain Cypress (Pty) Ltd', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_033', 'Johannesburg');
INSERT INTO `clients` VALUES ('196', null, 'MP- Ecosystem Rehabilitation and Fencing of Nature Reserve', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_082', 'Johannesburg');
INSERT INTO `clients` VALUES ('197', null, 'Mpumalanga Cricket Union (NPC)', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_072', 'Johannesburg');
INSERT INTO `clients` VALUES ('198', null, 'Mtha Financial Services Trust', '', null, '', 'Muzarewetu N.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_100', 'Johannesburg');
INSERT INTO `clients` VALUES ('199', null, 'Mtha We Mpumelelo Investments (Pty) Ltd', '', null, '', 'Muzarewetu N.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_099', 'Johannesburg');
INSERT INTO `clients` VALUES ('200', null, 'Multiply Titans', '', null, '', 'Muzarewetu N.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_112', 'Johannesburg');
INSERT INTO `clients` VALUES ('201', null, 'Mystar Education and Bussiness solution (Pty) Ltd', '', null, '', 'J de Viliers', '1', '0', '1', 'No', null, null, '1', 'EGT_l_018', 'Alberton');
INSERT INTO `clients` VALUES ('202', null, 'N G BARMHARTIGHEIDSDIENS (NGBD) - {NEW NAME - TUTELA}', '', null, '', 'IJ de Villiers', '1', '0', '1', 'No', null, null, '1', 'EGT_l_011', 'Alberton');
INSERT INTO `clients` VALUES ('203', null, 'N G BARMHARTIGHEIDSDIENS MPUMALANGA', '', null, '', 'IJ de Villiers', '1', '0', '1', 'No', null, null, '1', 'EGT_l_058', 'Alberton');
INSERT INTO `clients` VALUES ('204', null, 'N G GEMEENTE LAMBTON', '', null, '', 'IJ de Villiers', '1', '0', '1', 'No', null, null, '1', 'EGT_l_046', 'Alberton');
INSERT INTO `clients` VALUES ('205', null, 'N G KERK AASVOELKOP', '', null, '', 'IJ de Villiers', '1', '0', '1', 'No', null, null, '1', 'EGT_l_047', 'Alberton');
INSERT INTO `clients` VALUES ('206', null, 'N G KERK ELSBURG', '', null, '', 'IJ de Villiers', '1', '0', '1', 'No', null, null, '1', 'EGT_l_049', 'Alberton');
INSERT INTO `clients` VALUES ('207', null, 'N G KERK ELSBURG SUID', '', null, '', 'IJ de Villiers', '1', '0', '1', 'No', null, null, '1', 'EGT_l_048', 'Alberton');
INSERT INTO `clients` VALUES ('208', null, 'N G KERK ELSPARK', '', null, '', 'IJ de Villiers', '1', '0', '1', 'No', null, null, '1', 'EGT_l_053', 'Alberton');
INSERT INTO `clients` VALUES ('209', null, 'NATIONAL ASSOCIATION OF SOCIAL HOUSING ORGANISATION', '', null, '', 'IJ de Villiers', '1', '0', '1', 'No', null, null, '1', 'EGT_l_034', 'Alberton');
INSERT INTO `clients` VALUES ('210', null, 'NC-WftC Namaqua National Park (15/18)', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_083', 'Johannesburg');
INSERT INTO `clients` VALUES ('211', null, 'Nectatype', '', null, '', 'Masasa T.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_006', 'Johannesburg');
INSERT INTO `clients` VALUES ('212', null, 'New Berea Centre (Pty) Ltd', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_045', 'Johannesburg');
INSERT INTO `clients` VALUES ('213', null, 'New Era Labels (Bop) (Pty) Ltd ', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_054', 'Johannesburg');
INSERT INTO `clients` VALUES ('214', null, 'New Era Labels (Bop) (Pty) Ltd  ', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_051', 'Johannesburg');
INSERT INTO `clients` VALUES ('215', null, 'New Era P.P. Sacks (Bop) (Pty) Ltd ', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_h_026', 'Johannesburg');
INSERT INTO `clients` VALUES ('216', null, 'New Era Packaging Bops (Pty) Ltd ', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_h_010', 'Johannesburg');
INSERT INTO `clients` VALUES ('217', null, 'New Era Packaging Bops (Pty) Ltd ', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_h_013', 'Johannesburg');
INSERT INTO `clients` VALUES ('218', null, 'New Era Paper Bags Manufacturers Bops (Pty) Ltd', '', null, '', 'Amaanullah Ayub', '1', '0', '1', 'No', null, null, '1', 'CTN_h_013', 'Cape Town ');
INSERT INTO `clients` VALUES ('219', null, 'New Era Paper Bags Manufacturers Bops (Pty) Ltd ', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_h_021', 'Johannesburg');
INSERT INTO `clients` VALUES ('220', null, 'New Era PP Sacks BOP (Pty) Ltd.', '', null, '', 'Amaanullah Ayub', '1', '0', '1', 'No', null, null, '1', 'CTN_h_011', 'Cape Town ');
INSERT INTO `clients` VALUES ('221', null, 'Newshelf 33 (Pty) Ltd ', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_034', 'Johannesburg');
INSERT INTO `clients` VALUES ('222', null, 'NG GEMEENTE SUNWARDPARK', '', null, '', 'IJ de Villiers', '1', '0', '1', 'No', null, null, '1', 'EGT_l_051', 'Alberton');
INSERT INTO `clients` VALUES ('223', null, 'NG Kerk Faerie Glen', '', null, '', 'RP Goldes', '1', '0', '1', 'No', null, null, '1', 'PTR_l_036', 'Pretoria ');
INSERT INTO `clients` VALUES ('224', null, 'NG KERK SINODE HOeVELD', '', null, '', 'IJ de Villiers', '1', '0', '1', 'No', null, null, '1', 'EGT_l_007', 'Alberton');
INSERT INTO `clients` VALUES ('225', null, 'Nirvana Investments (Pty) Ltd', '', null, '', 'F.A.S Haffejee', '1', '0', '1', 'No', null, null, '1', 'DBN_l_030', 'Durban');
INSERT INTO `clients` VALUES ('226', null, 'North West Cricket', '', null, '', 'Muzarewetu N.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_111', 'Johannesburg');
INSERT INTO `clients` VALUES ('227', null, 'Northerns Cricket', '', null, '', 'Muzarewetu N.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_109', 'Johannesburg');
INSERT INTO `clients` VALUES ('228', null, 'Novo And Comu Joint Venture (Pty)Ltd', '', null, '', 'RP Goldes', '1', '0', '1', 'No', null, null, '1', 'PTR_l_007', 'Pretoria ');
INSERT INTO `clients` VALUES ('229', null, 'Novo Energy (Pty) Ltd', '', null, '', 'RP Goldes', '1', '0', '1', 'No', null, null, '1', 'PTR_l_003', 'Pretoria ');
INSERT INTO `clients` VALUES ('230', null, 'Novo Energy (Pty) Ltd', '', null, '', 'RP Goldes', '1', '0', '1', 'No', null, null, '1', 'PTR_l_004', 'Pretoria ');
INSERT INTO `clients` VALUES ('231', null, 'Novo Kew (Pty) Ltd', '', null, '', 'RP Goldes', '1', '0', '1', 'No', null, null, '1', 'PTR_l_020', 'Pretoria ');
INSERT INTO `clients` VALUES ('232', null, 'Novo Kew (Pty) Ltd', '', null, '', 'RP Goldes', '1', '0', '1', 'No', null, null, '1', 'PTR_l_023', 'Pretoria ');
INSERT INTO `clients` VALUES ('233', null, 'Novo Lincoln (Pty) Ltd', '', null, '', 'RP Goldes', '1', '0', '1', 'No', null, null, '1', 'PTR_l_021', 'Pretoria ');
INSERT INTO `clients` VALUES ('234', null, 'Novo Lincoln (Pty) Ltd', '', null, '', 'RP Goldes', '1', '0', '1', 'No', null, null, '1', 'PTR_l_024', 'Pretoria ');
INSERT INTO `clients` VALUES ('235', null, 'Novo Mcfarlane (Pty) Ltd', '', null, '', 'RP Goldes', '1', '0', '1', 'No', null, null, '1', 'PTR_l_022', 'Pretoria ');
INSERT INTO `clients` VALUES ('236', null, 'Novo Mcfarlane (Pty) Ltd', '', null, '', 'RP Goldes', '1', '0', '1', 'No', null, null, '1', 'PTR_l_025', 'Pretoria ');
INSERT INTO `clients` VALUES ('237', null, 'Nu Laxmi Selections (Pty) Ltd', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_061', 'Johannesburg');
INSERT INTO `clients` VALUES ('238', null, 'Nu-Laxmi Investments (Pty) Ltd', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_060', 'Johannesburg');
INSERT INTO `clients` VALUES ('239', null, 'Nu-Laxmi Leasing (Pty) Ltd', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_062', 'Johannesburg');
INSERT INTO `clients` VALUES ('240', null, 'Nuprof Investments (Pty) Ltd', '', null, '', 'Y.M Paruk', '1', '0', '1', 'No', null, null, '1', 'DBN_l_034', 'Durban');
INSERT INTO `clients` VALUES ('241', null, 'OLD HARBOUR MUSEUM', '', null, '', 'Amaanullah Ayub', '1', '0', '1', 'No', null, null, '1', 'CTN_h_005', 'Cape Town ');
INSERT INTO `clients` VALUES ('242', null, 'OLOF PALME INTERNATIONAL CENTRE - Projects', '', null, '', 'Amaanullah Ayub', '1', '0', '1', 'No', null, null, '1', 'CTN_l_001', 'Cape Town ');
INSERT INTO `clients` VALUES ('243', null, 'Ombudsman for Banking Services', '', null, '', 'Muzarewetu N.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_104', 'Johannesburg');
INSERT INTO `clients` VALUES ('244', null, 'One Call Properties CC', '', null, '', 'RP Goldes', '1', '0', '1', 'No', null, null, '1', 'PTR_h_009', 'Pretoria ');
INSERT INTO `clients` VALUES ('245', null, 'Opium Investments (Pty) Ltd', '', null, '', 'Y.M Paruk', '1', '0', '1', 'No', null, null, '1', 'DBN_l_022', 'Durban');
INSERT INTO `clients` VALUES ('246', null, 'Orient Islamic School', '', null, '', 'Y.M Paruk', '1', '0', '1', 'No', null, null, '1', 'DBN_l_028', 'Durban');
INSERT INTO `clients` VALUES ('247', null, 'Oyster Plastics (Pty) Ltd', '', null, '', 'M. Haffejee', '1', '0', '1', 'No', null, null, '1', 'DBN_h_021', 'Durban');
INSERT INTO `clients` VALUES ('248', null, 'Paramax Clothing (Pty) Ltd', '', null, '', 'F.A.S Haffejee', '1', '0', '1', 'No', null, null, '1', 'DBN_l_026', 'Durban');
INSERT INTO `clients` VALUES ('249', null, 'PARAMOUNT TRAILERS (PTY) LTD', '', null, '', 'J de Viliers', '1', '0', '1', 'No', null, null, '1', 'EGT_h_005', 'Alberton');
INSERT INTO `clients` VALUES ('250', null, 'Paruk\'s Corporate Enterprises (Pty) Ltd', '', null, '', 'F.A.S Haffejee', '1', '0', '1', 'No', null, null, '1', 'DBN_l_036', 'Durban');
INSERT INTO `clients` VALUES ('251', null, 'Petroprt N3 Heidelberg (Pty) Ltd', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_070', 'Johannesburg');
INSERT INTO `clients` VALUES ('252', null, 'Pico Ruivo (Pty) Ltd', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_035', 'Johannesburg');
INSERT INTO `clients` VALUES ('253', null, 'Plan B Financial Compliance (Pty) Ltd', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_046', 'Johannesburg');
INSERT INTO `clients` VALUES ('254', null, 'Platinum High Tech Park Development (Pty) Ltd', '', null, '', 'RP Goldes', '1', '0', '1', 'No', null, null, '1', 'PTR_l_012', 'Pretoria ');
INSERT INTO `clients` VALUES ('255', null, 'Pravda and Knowles Attorneys', '', null, '', 'Y.M Paruk', '1', '0', '1', 'No', null, null, '1', 'DBN_h_008', 'Durban');
INSERT INTO `clients` VALUES ('256', null, 'Pretoria Box Manufacturers Joint Venture ', '', null, '', 'RP Goldes', '1', '0', '1', 'No', null, null, '1', 'PTR_l_002', 'Pretoria ');
INSERT INTO `clients` VALUES ('257', null, 'Pretoria Woman\'s 10km Race NPC', '', null, '', 'RP Goldes', '1', '0', '1', 'No', null, null, '1', 'PTR_l_034', 'Pretoria ');
INSERT INTO `clients` VALUES ('258', null, 'Pretoria Woman\'s 10km Race NPC', '', null, '', 'RP Goldes', '1', '0', '1', 'No', null, null, '1', 'PTR_l_035', 'Pretoria ');
INSERT INTO `clients` VALUES ('259', null, 'PRIDE MILLING COMPANY (PTY) LTD', '', null, '', 'S Prinsloo', '1', '0', '1', 'No', null, null, '1', 'EGT_h_002', 'Alberton');
INSERT INTO `clients` VALUES ('260', null, 'Prime Stores (Pty) Ltd', '', null, '', 'F.A.S Haffejee', '1', '0', '1', 'No', null, null, '1', 'DBN_l_046', 'Durban');
INSERT INTO `clients` VALUES ('261', null, 'PRO EKKLESIA NPC', '', null, '', 'IJ de Villiers', '1', '0', '1', 'No', null, null, '1', 'EGT_l_026', 'Alberton');
INSERT INTO `clients` VALUES ('262', null, 'Prowgrowth Investment', '', null, '', 'Y.M Paruk', '1', '0', '1', 'No', null, null, '1', 'DBN_l_031', 'Durban');
INSERT INTO `clients` VALUES ('263', null, 'Pybus Thirty-Fourty (Pty) Ltd', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_068', 'Johannesburg');
INSERT INTO `clients` VALUES ('264', null, 'Qhakaza AMPS (Pty) Ltd', '', null, '', 'Mungofa B.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_014', 'Johannesburg');
INSERT INTO `clients` VALUES ('265', null, 'RATES WATCH (PTY) LTD', '', null, '', 'S Prinsloo', '1', '0', '1', 'No', null, null, '1', 'EGT_l_012', 'Alberton');
INSERT INTO `clients` VALUES ('266', null, 'Real Tree Trading 1 (Pty) Ltd', '', null, '', 'Masasa T.', '1', '0', '1', 'No', null, null, '1', 'SNH_h_014', 'Johannesburg');
INSERT INTO `clients` VALUES ('267', null, 'Reprographics', '', null, '', 'Masasa T.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_008', 'Johannesburg');
INSERT INTO `clients` VALUES ('268', null, 'Richard Cawood Properties (Pty) Ltd', '', null, '', 'RP Goldes', '1', '0', '1', 'No', null, null, '1', 'PTR_h_008', 'Pretoria ');
INSERT INTO `clients` VALUES ('269', null, 'RIDGE PROPERTIES (PTY) LTD', '', null, '', 'J de Viliers', '1', '0', '1', 'No', null, null, '1', 'EGT_l_023', 'Alberton');
INSERT INTO `clients` VALUES ('270', null, 'RUBATO TRUST', '', null, '', 'Amaanullah Ayub', '1', '0', '1', 'No', null, null, '1', 'CTN_l_025', 'Cape Town ');
INSERT INTO `clients` VALUES ('271', null, 'RUSTIVIA INDUSTRIAL ESTATES (PTY) LTD', '', null, '', 'J de Viliers', '1', '0', '1', 'No', null, null, '1', 'EGT_l_032', 'Alberton');
INSERT INTO `clients` VALUES ('272', null, 'S A TIMBER (WELKOM) (PTY) LTD', '', null, '', 'S Prinsloo', '1', '0', '1', 'No', null, null, '1', 'EGT_l_038', 'Alberton');
INSERT INTO `clients` VALUES ('273', null, 'S A TIMBER AND JOINERY WORKS (PTY) LTD', '', null, '', 'S Prinsloo', '1', '0', '1', 'No', null, null, '1', 'EGT_l_039', 'Alberton');
INSERT INTO `clients` VALUES ('274', null, 'SA Coal Mining Holdings Limited', '', null, '', 'Muzarewetu N.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_106', 'Johannesburg');
INSERT INTO `clients` VALUES ('275', null, 'SA Innovation Summit (Pty)Ltd', '', null, '', 'RP Goldes', '1', '0', '1', 'No', null, null, '1', 'PTR_l_018', 'Pretoria ');
INSERT INTO `clients` VALUES ('276', null, 'SA TIMBER (KROONSTAD) (PTY) LTD', '', null, '', 'S Prinsloo', '1', '0', '1', 'No', null, null, '1', 'EGT_l_030', 'Alberton');
INSERT INTO `clients` VALUES ('277', null, 'SA TIMBER (VIRGINIA) (PTY) LTD', '', null, '', 'S Prinsloo', '1', '0', '1', 'No', null, null, '1', 'EGT_l_031', 'Alberton');
INSERT INTO `clients` VALUES ('278', null, 'SADC LAWYERS ASSOCIATION NPC', '', null, '', 'IJ de Villiers', '1', '0', '1', 'No', null, null, '1', 'EGT_l_010', 'Alberton');
INSERT INTO `clients` VALUES ('279', null, 'Safdev Holdings (Pty) Ltd', '', null, '', 'RP Goldes', '1', '0', '1', 'No', null, null, '1', 'PTR_l_006', 'Pretoria ');
INSERT INTO `clients` VALUES ('280', null, 'SAICA Pension Fund', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_h_022', 'Johannesburg');
INSERT INTO `clients` VALUES ('281', null, 'Sand Olive (Pty) Ltd', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_036', 'Johannesburg');
INSERT INTO `clients` VALUES ('282', null, 'SANParks Natural Resource Projects', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_073', 'Johannesburg');
INSERT INTO `clients` VALUES ('283', null, 'SATIM (O F S) (PTY) LTD', '', null, '', 'S Prinsloo', '1', '0', '1', 'No', null, null, '1', 'EGT_l_029', 'Alberton');
INSERT INTO `clients` VALUES ('284', null, 'SAVECOMM PROPERTIES CC', '', null, '', 'IJ de Villiers', '1', '0', '1', 'No', null, null, '1', 'EGT_h_011', 'Alberton');
INSERT INTO `clients` VALUES ('285', null, 'Scandura Trading (Pty) Ltd', '', null, '', 'Y.M Paruk', '1', '0', '1', 'No', null, null, '1', 'DBN_l_010', 'Durban');
INSERT INTO `clients` VALUES ('286', null, 'SCHUTTE J H P Mnr', '', null, '', 'IJ de Villiers', '1', '0', '1', 'No', null, null, '1', 'EGT_h_014', 'Alberton');
INSERT INTO `clients` VALUES ('287', null, 'Seabiscuit Body Corporate', '', null, '', 'H Lotter', '1', '0', '1', 'No', null, null, '1', 'PTR_l_038', 'Pretoria ');
INSERT INTO `clients` VALUES ('288', null, 'Second Street Mall (Pty) Ltd', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_067', 'Johannesburg');
INSERT INTO `clients` VALUES ('289', null, 'Selvie Pillay and Company', '', null, '', 'J. Jamal', '1', '0', '1', 'No', null, null, '1', 'DBN_h_013', 'Durban');
INSERT INTO `clients` VALUES ('290', null, 'Seraps (Pty) Ltd', '', null, '', 'M.A.Motala', '1', '0', '1', 'No', null, null, '1', 'DBN_l_033', 'Durban');
INSERT INTO `clients` VALUES ('291', null, 'Shanduka Black Umbrellas', '', null, '', 'Muzarewetu N.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_107', 'Johannesburg');
INSERT INTO `clients` VALUES ('292', null, 'SILVER PARK SELF STORAGE (PTY) LTD', '', null, '', 'Amaanullah Ayub', '1', '0', '1', 'No', null, null, '1', 'CTN_l_015', 'Cape Town ');
INSERT INTO `clients` VALUES ('293', null, 'SILVERY SUN ENERGY INVESTMENTS (PTY) LTD', '', null, '', 'Amaanullah Ayub', '1', '0', '1', 'No', null, null, '1', 'CTN_l_016', 'Cape Town ');
INSERT INTO `clients` VALUES ('294', null, 'Sinayo Securities (Pty) Ltd', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_050', 'Johannesburg');
INSERT INTO `clients` VALUES ('295', null, 'SONYA MEISTRE INCORPORATED', '', null, '', 'J de Viliers', '1', '0', '1', 'No', null, null, '1', 'EGT_h_010', 'Alberton');
INSERT INTO `clients` VALUES ('296', null, 'SOS CHILDREN\'S VILLAGE ASSOCIATION OF RAS (NATIONAL)', '', null, '', 'J de Viliers', '1', '0', '1', 'No', null, null, '1', 'EGT_h_003', 'Alberton');
INSERT INTO `clients` VALUES ('297', null, 'SOS KINDERDORP INTERNATIONAL SOUTHERN AFRICAN REGION', '', null, '', 'J de Viliers', '1', '0', '1', 'No', null, null, '1', 'EGT_l_003', 'Alberton');
INSERT INTO `clients` VALUES ('298', null, 'South African Airways Technical (SAAT)', '', null, '', 'Muzarewetu N.', '1', '0', '1', 'No', null, null, '1', 'SNH_h_003', 'Johannesburg');
INSERT INTO `clients` VALUES ('299', null, 'SOUTH AFRICAN BOOK DEVELOPMENT COUNCIL NPC', '', null, '', 'Amaanullah Ayub', '1', '0', '1', 'No', null, null, '1', 'CTN_l_005', 'Cape Town ');
INSERT INTO `clients` VALUES ('300', null, 'South African File Manufacturers (Pty) Ltd', '', null, '', 'M. Haffejee', '1', '0', '1', 'No', null, null, '1', 'DBN_h_022', 'Durban');
INSERT INTO `clients` VALUES ('301', null, 'South African Institute of Financial Markets', '', null, '', 'RP Goldes', '1', '0', '1', 'No', null, null, '1', 'PTR_l_010', 'Pretoria ');
INSERT INTO `clients` VALUES ('302', null, 'South African Institute of Financial Markets', '', null, '', 'RP Goldes', '1', '0', '1', 'No', null, null, '1', 'PTR_l_040', 'Pretoria ');
INSERT INTO `clients` VALUES ('303', null, 'South African National Halaal Authority', '', null, '', 'Y.M Paruk', '1', '0', '1', 'No', null, null, '1', 'DBN_l_005', 'Durban');
INSERT INTO `clients` VALUES ('304', null, 'South African Society of Clinical and Radiation Oncologists', '', null, '', 'H Lotter', '1', '0', '1', 'No', null, null, '1', 'PTR_l_037', 'Pretoria ');
INSERT INTO `clients` VALUES ('305', null, 'South African Travel Company (SATC)', '', null, '', 'Masasa T.', '1', '0', '1', 'No', null, null, '1', 'SNH_h_024', 'Johannesburg');
INSERT INTO `clients` VALUES ('306', null, 'SOUTH WEST DISTRICT CRICKET COUNCIL', '', null, '', 'Amaanullah Ayub', '1', '0', '1', 'No', null, null, '1', 'CTN_l_008', 'Cape Town ');
INSERT INTO `clients` VALUES ('307', null, 'SPIES ABRAHAM MARTHINUS', '', null, '', 'IJ de Villiers', '1', '0', '1', 'No', null, null, '1', 'EGT_h_012', 'Alberton');
INSERT INTO `clients` VALUES ('308', null, 'Squadron Trading (Pty) Ltd', '', null, '', 'Y.M Paruk', '1', '0', '1', 'No', null, null, '1', 'DBN_l_011', 'Durban');
INSERT INTO `clients` VALUES ('309', null, 'SSI Schaefer Systems', '', null, '', 'Muzarewetu N.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_101', 'Johannesburg');
INSERT INTO `clients` VALUES ('310', null, 'STANDER PROKUREURS', '', null, '', 'IJ de Villiers', '1', '0', '1', 'No', null, null, '1', 'EGT_h_015', 'Alberton');
INSERT INTO `clients` VALUES ('311', null, 'Stanger and District Association for the Aged', '', null, '', 'J. Jamal', '1', '0', '1', 'No', null, null, '1', 'DBN_l_032', 'Durban');
INSERT INTO `clients` VALUES ('312', null, 'Star Schools  (Pty) Ltd', '', null, '', 'J de Viliers', '1', '0', '1', 'No', null, null, '1', 'EGT_l_052', 'Alberton');
INSERT INTO `clients` VALUES ('313', null, 'Star Schools High (Pty) Ltd', '', null, '', 'J de Viliers', '1', '0', '1', 'No', null, null, '1', 'EGT_l_002', 'Alberton');
INSERT INTO `clients` VALUES ('314', null, 'STEENBOK TRUST 253/88', '', null, '', 'J de Viliers', '1', '0', '1', 'No', null, null, '1', 'EGT_l_050', 'Alberton');
INSERT INTO `clients` VALUES ('315', null, 'Striding Edge CC', '', null, '', 'J. Jamal', '1', '0', '1', 'No', null, null, '1', 'DBN_l_035', 'Durban');
INSERT INTO `clients` VALUES ('316', null, 'Sucrose Motors and Service Station (Pty) Ltd', '', null, '', 'J. Jamal', '1', '0', '1', 'No', null, null, '1', 'DBN_l_027', 'Durban');
INSERT INTO `clients` VALUES ('317', null, 'Swiftnet (Pty) Ltd', '', null, '', 'Mungofa B.', '1', '0', '1', 'No', null, null, '1', 'SNH_h_007', 'Johannesburg');
INSERT INTO `clients` VALUES ('318', null, 'Syndicate Investments (Pty) Ltd', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_037', 'Johannesburg');
INSERT INTO `clients` VALUES ('319', null, 'Syringa Tree Investments (Pty) Ltd', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_038', 'Johannesburg');
INSERT INTO `clients` VALUES ('320', null, 'TAME COMMUNICATIONS (PTY) LTD', '', null, '', 'J de Viliers', '1', '0', '1', 'No', null, null, '1', 'EGT_l_036', 'Alberton');
INSERT INTO `clients` VALUES ('321', null, 'Telkom Benevolent Fund', '', null, '', 'Mungofa B.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_012', 'Johannesburg');
INSERT INTO `clients` VALUES ('322', null, 'Telkom Foundation Trust', '', null, '', 'Mungofa B.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_013', 'Johannesburg');
INSERT INTO `clients` VALUES ('323', null, 'Telkom SA SOC Limited', '', null, '', 'Mungofa B.', '1', '0', '1', 'No', null, null, '1', 'SNH_h_001', 'Johannesburg');
INSERT INTO `clients` VALUES ('324', null, 'TEL-SCREW PRODUCTS (PTY) LTD', '', null, '', 'S Prinsloo', '1', '0', '1', 'No', null, null, '1', 'EGT_l_005', 'Alberton');
INSERT INTO `clients` VALUES ('325', null, 'TERAOKA S A (PTY) LTD', '', null, '', 'S Prinsloo', '1', '0', '1', 'No', null, null, '1', 'EGT_h_001', 'Alberton');
INSERT INTO `clients` VALUES ('326', null, 'The Attacq Foundation Trust', '', null, '', 'RP Goldes', '1', '0', '1', 'No', null, null, '1', 'PTR_l_030', 'Pretoria ');
INSERT INTO `clients` VALUES ('327', null, 'THE HUMAN KIND GROUP (PTY) LTD', '', null, '', 'S Prinsloo', '1', '0', '1', 'No', null, null, '1', 'EGT_l_013', 'Alberton');
INSERT INTO `clients` VALUES ('328', null, 'THE KAMBULE TRUST', '', null, '', 'Amaanullah Ayub', '1', '0', '1', 'No', null, null, '1', 'CTN_l_022', 'Cape Town ');
INSERT INTO `clients` VALUES ('329', null, 'The Laxmi Group Limited', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_059', 'Johannesburg');
INSERT INTO `clients` VALUES ('330', null, 'THE MINEWORKERS BENEFICIARY FUND', '', null, '', 'Amaanullah Ayub', '1', '0', '1', 'No', null, null, '1', 'CTN_h_009', 'Cape Town ');
INSERT INTO `clients` VALUES ('331', null, 'THE MINEWORKERS TRUST FUND', '', null, '', 'Amaanullah Ayub', '1', '0', '1', 'No', null, null, '1', 'CTN_h_012', 'Cape Town ');
INSERT INTO `clients` VALUES ('332', null, 'THE NBC UMBRELLA BENEFICIARY FUND', '', null, '', 'Amaanullah Ayub', '1', '0', '1', 'No', null, null, '1', 'CTN_h_007', 'Cape Town ');
INSERT INTO `clients` VALUES ('333', null, 'THE NBC UMBRELLA TRUST', '', null, '', 'Amaanullah Ayub', '1', '0', '1', 'No', null, null, '1', 'CTN_h_002', 'Cape Town ');
INSERT INTO `clients` VALUES ('334', null, 'THE RACHELS ANGELS TRUST', '', null, '', 'Amaanullah Ayub', '1', '0', '1', 'No', null, null, '1', 'CTN_l_013', 'Cape Town ');
INSERT INTO `clients` VALUES ('335', null, 'Thekwini Reinforcing (Pty) Ltd', '', null, '', 'J. Jamal', '1', '0', '1', 'No', null, null, '1', 'DBN_h_005', 'Durban');
INSERT INTO `clients` VALUES ('336', null, 'Timol and Associates', '', null, '', 'Y.M Paruk', '1', '0', '1', 'No', null, null, '1', 'DBN_h_009', 'Durban');
INSERT INTO `clients` VALUES ('337', null, 'Titans Cricket', '', null, '', 'Muzarewetu N.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_114', 'Johannesburg');
INSERT INTO `clients` VALUES ('338', null, 'Tjokkerville', '', null, '', 'Masasa T.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_003', 'Johannesburg');
INSERT INTO `clients` VALUES ('339', null, 'Toufic Trading (Pty) Ltd', '', null, '', 'F.A.S Haffejee', '1', '0', '1', 'No', null, null, '1', 'DBN_l_038', 'Durban');
INSERT INTO `clients` VALUES ('340', null, 'TrackAN Investments (Pty) Ltd', '', null, '', 'Y.M Paruk', '1', '0', '1', 'No', null, null, '1', 'DBN_l_003', 'Durban');
INSERT INTO `clients` VALUES ('341', null, 'TRANS-TECH LOGISTICS (PTY) LTD', '', null, '', 'J de Viliers', '1', '0', '1', 'No', null, null, '1', 'EGT_l_006', 'Alberton');
INSERT INTO `clients` VALUES ('342', null, 'TREK TRANSPORT (PTY) LTD', '', null, '', 'S Prinsloo', '1', '0', '1', 'No', null, null, '1', 'EGT_l_027', 'Alberton');
INSERT INTO `clients` VALUES ('343', null, 'Triangle Stores (Pty) Ltd', '', null, '', 'F.A.S Haffejee', '1', '0', '1', 'No', null, null, '1', 'DBN_l_024', 'Durban');
INSERT INTO `clients` VALUES ('344', null, 'UITKOMS HOME FOR GIRLS', '', null, '', 'IJ de Villiers', '1', '0', '1', 'No', null, null, '1', 'EGT_l_022', 'Alberton');
INSERT INTO `clients` VALUES ('345', null, 'UKUKHULA TRUST', '', null, '', 'Amaanullah Ayub', '1', '0', '1', 'No', null, null, '1', 'CTN_l_023', 'Cape Town ');
INSERT INTO `clients` VALUES ('346', null, 'Umgeni Water Services SOC Ltd (immaterial subsidery non- trading)', '', null, '', 'M.A Motala', '1', '0', '1', 'No', null, null, '1', 'DBN_h_017', 'Durban');
INSERT INTO `clients` VALUES ('347', null, 'Unity Paper Sales (Pty) Ltd ', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_h_019', 'Johannesburg');
INSERT INTO `clients` VALUES ('348', null, 'Unity Paper Sales (Pty) Ltd ', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_h_020', 'Johannesburg');
INSERT INTO `clients` VALUES ('349', null, 'V G KERK EDENPARK', '', null, '', 'IJ de Villiers', '1', '0', '1', 'No', null, null, '1', 'EGT_l_043', 'Alberton');
INSERT INTO `clients` VALUES ('350', null, 'VAN DER ROSS & MOTALA INC', '', null, '', 'Amaanullah Ayub', '1', '0', '1', 'No', null, null, '1', 'CTN_h_014', 'Cape Town ');
INSERT INTO `clients` VALUES ('351', null, 'VAN DER WALT CRESCENT ENCLOSURE NPC', '', null, '', 'IJ de Villiers', '1', '0', '1', 'No', null, null, '1', 'EGT_l_057', 'Alberton');
INSERT INTO `clients` VALUES ('352', null, 'VASCOBA INVESTMENTS (PTY) LTD', '', null, '', 'S Prinsloo', '1', '0', '1', 'No', null, null, '1', 'EGT_l_035', 'Alberton');
INSERT INTO `clients` VALUES ('353', null, 'Vayej Bros (Pty) Ltd', '', null, '', 'Y.M Paruk', '1', '0', '1', 'No', null, null, '1', 'DBN_l_018', 'Durban');
INSERT INTO `clients` VALUES ('354', null, 'VCE/Thusong', '', null, '', 'Masasa T.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_005', 'Johannesburg');
INSERT INTO `clients` VALUES ('355', null, 'Velvet Raisin Investments (Pty) Ltd', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_040', 'Johannesburg');
INSERT INTO `clients` VALUES ('356', null, 'Vesco Ecko', '', null, '', 'Masasa T.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_007', 'Johannesburg');
INSERT INTO `clients` VALUES ('357', null, 'Vesco Parent', '', null, '', 'Masasa T.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_004', 'Johannesburg');
INSERT INTO `clients` VALUES ('358', null, 'VISION CHILD AND YOUTH CENTRE', '', null, '', 'Amaanullah Ayub', '1', '0', '1', 'No', null, null, '1', 'CTN_l_006', 'Cape Town ');
INSERT INTO `clients` VALUES ('359', null, 'Vuwa Investments (Pty) Ltd', '', null, '', 'Masasa T.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_001', 'Johannesburg');
INSERT INTO `clients` VALUES ('360', null, 'W P PROFESSION CRICKET (PTY) LTD.', '', null, '', 'Amaanullah Ayub', '1', '0', '1', 'No', null, null, '1', 'CTN_l_010', 'Cape Town ');
INSERT INTO `clients` VALUES ('361', null, 'WALKERS INCORPORATED', '', null, '', 'Amaanullah Ayub', '1', '0', '1', 'No', null, null, '1', 'CTN_h_010', 'Cape Town ');
INSERT INTO `clients` VALUES ('362', null, 'WALKERS INCORPORATED', '', null, '', 'Amaanullah Ayub', '1', '0', '1', 'No', null, null, '1', 'CTN_l_007', 'Cape Town ');
INSERT INTO `clients` VALUES ('363', null, 'Waxpak (Pty) Ltd', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_055', 'Johannesburg');
INSERT INTO `clients` VALUES ('364', null, 'Waxpak (Pty) Ltd', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_052', 'Johannesburg');
INSERT INTO `clients` VALUES ('365', null, 'WC - Table Mountain National Park - WftC 15/18', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_086', 'Johannesburg');
INSERT INTO `clients` VALUES ('366', null, 'WC - West Coast National Park', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_080', 'Johannesburg');
INSERT INTO `clients` VALUES ('367', null, 'WC - WftC Cape Agulhas National Park (15/18)', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_087', 'Johannesburg');
INSERT INTO `clients` VALUES ('368', null, 'WC WftC GRNP Knysna Section (15/18)', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_081', 'Johannesburg');
INSERT INTO `clients` VALUES ('369', null, 'WC WftC GRNP Wilderness Section (15/18)', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_084', 'Johannesburg');
INSERT INTO `clients` VALUES ('370', null, 'WELKOM TRUST', '', null, '', 'Amaanullah Ayub', '1', '0', '1', 'No', null, null, '1', 'CTN_l_020', 'Cape Town ');
INSERT INTO `clients` VALUES ('371', null, 'WESTERN CAPE CRICKET (PTY) LTD', '', null, '', 'Amaanullah Ayub', '1', '0', '1', 'No', null, null, '1', 'CTN_l_017', 'Cape Town ');
INSERT INTO `clients` VALUES ('372', null, 'WESTERN PROVINCE CRICKET ASSOCIATION', '', null, '', 'Amaanullah Ayub', '1', '0', '1', 'No', null, null, '1', 'CTN_l_003', 'Cape Town ');
INSERT INTO `clients` VALUES ('373', null, 'Womens Cultural Group', '', null, '', 'R.Timol', '1', '0', '1', 'No', null, null, '1', 'DBN_l_041', 'Durban');
INSERT INTO `clients` VALUES ('374', null, 'Womens Cultural Group Educational Trust', '', null, '', 'R.Timol', '1', '0', '1', 'No', null, null, '1', 'DBN_l_040', 'Durban');
INSERT INTO `clients` VALUES ('375', null, 'WORKERS WORLD MEDIA PRODUCTIONS', '', null, '', 'Amaanullah Ayub', '1', '0', '1', 'No', null, null, '1', 'CTN_l_014', 'Cape Town ');
INSERT INTO `clients` VALUES ('376', null, 'WORKERS WORLD MEDIA PRODUCTIONS - Projects', '', null, '', 'Amaanullah Ayub', '1', '0', '1', 'No', null, null, '1', 'CTN_l_018', 'Cape Town ');
INSERT INTO `clients` VALUES ('377', null, 'Xyletate (Pty) Ltd', '', null, '', 'Y.M Paruk', '1', '0', '1', 'No', null, null, '1', 'DBN_l_007', 'Durban');
INSERT INTO `clients` VALUES ('378', null, 'YHB Enterprise Partnership', '', null, '', 'M. Haffejee', '1', '0', '1', 'No', null, null, '1', 'DBN_l_023', 'Durban');
INSERT INTO `clients` VALUES ('379', null, 'ZARX (Pty) Ltd', '', null, '', 'Kallen S.', '1', '0', '1', 'No', null, null, '1', 'SNH_l_058', 'Johannesburg');
INSERT INTO `clients` VALUES ('387', null, 'Zwartkop Golf Estate Homeowners Association - Utilities', '', null, '', 'RP Goldes', '1', '0', '0', 'No', null, null, '1', 'PTR_l_027', 'Pretoria ');
INSERT INTO `clients` VALUES ('385', null, 'Zelpy 2940 (Pty) Ltd', '', null, '', 'Y.M Paruk', '1', '0', '0', 'No', null, null, '1', 'DBN_l_008', 'Durban');
INSERT INTO `clients` VALUES ('390', null, 'Zwartkop Golf Estate Homeowners Association - Levies', null, null, null, 'RP Goldes', '1', '0', '0', 'No', null, null, '1', 'PTR_l_026', 'Pretoria ');

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
  `client` text,
  `engagement_date` varchar(255) DEFAULT NULL,
  `engagement_type` varchar(255) DEFAULT '1',
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
  `risk` varchar(255) DEFAULT 'None',
  `audit_required` varchar(255) DEFAULT NULL,
  `resigned` varchar(255) DEFAULT 'No',
  `user` varchar(255) DEFAULT '56',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=457 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of engagements
-- ----------------------------
INSERT INTO `engagements` VALUES ('1', null, 'SNH_h_001', '', '1', null, '1', null, '1', null, null, 'Yes', '02/06/2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 16 000 000,00 ', null, '31/03/2017', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('2', null, 'SNH_h_002', '', '1', null, '1', null, '1', null, null, 'Yes', '22/06/2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 6 038 536,00 ', null, '31/03/2017', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('3', null, 'SNH_h_003', '', '1', null, '1', null, '1', null, null, 'Yes', 'Not yet signed off', null, null, null, '1', null, 'N/A', null, null, null, ' R 2 569 464,00 ', null, '31/03/2017', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('4', null, 'SNH_h_004', '', '1', null, '1', null, '1', null, null, 'Yes', '21/07/2017', null, null, null, '1', null, '1115', null, null, null, ' R 806 620,00 ', null, '30/04/2017', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('5', null, 'SNH_h_005', '', '1', null, '1', null, '1', null, null, 'Yes', 'Not yet signed off', null, null, null, '1', null, '612', null, null, null, ' R 600 000,00 ', null, '31/12/2016', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('6', null, 'SNH_h_006', '', '1', null, '1', null, '1', null, null, 'Yes', 'Not yet signed off', null, null, null, '1', null, 'N/A', null, null, null, ' R 487 600,00 ', null, '31/03/2017', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('7', null, 'SNH_h_007', '', '1', null, '1', null, '1', null, null, 'Yes', '27/06/2016', null, null, null, '1', null, '388', null, null, null, ' R 468 187,16 ', null, '31/03/2016', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('8', null, 'SNH_h_008', '', '1', null, '1', null, '1', null, null, 'Yes', 'Not yet signed off', null, null, null, '1', null, 'N/A', null, null, null, ' R 454 900,00 ', null, '31/03/2017', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('9', null, 'SNH_h_009', '', '1', null, '1', null, '1', null, null, 'Yes', '10/10/2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 451 560,00 ', null, '31/03/2017', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('10', null, 'SNH_h_010', '', '1', null, '1', null, '1', null, null, 'Yes', '31/08/2017', null, null, null, '1', null, '1993', null, null, null, ' R 425 416,00 ', null, '28/02/2017', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('11', null, 'SNH_h_011', '', '1', null, '1', null, '1', null, null, 'Yes', '31/08/2017', null, null, null, '1', null, ' 2034', null, null, null, ' R 418 937,00 ', null, '28/02/2017', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('12', null, 'SNH_h_012', '', '1', null, '1', null, '1', null, null, 'Yes', '17/02/2017', null, null, null, '1', null, '2657', null, null, null, ' R 415 107,00 ', null, '29/02/2016', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('13', null, 'SNH_h_013', '', '1', null, '1', null, '1', null, null, 'Yes', '28/02/2017', null, null, null, '1', null, '2013', null, null, null, ' R 404 908,00 ', null, '29/02/2016', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('14', null, 'SNH_h_014', '', '1', null, '1', null, '1', null, null, 'Yes', '23/10/2017', null, null, null, '1', null, '2079', null, null, null, ' R 324 245,00 ', null, '31/03/2017', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('15', null, 'SNH_h_015', '', '1', null, '1', null, '1', null, null, 'Yes', 'Not yet signed off', null, null, null, '1', null, '120', null, null, null, ' R 250 000,00 ', null, '31/12/2016', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('16', null, 'SNH_h_016', '', '1', null, '1', null, '1', null, null, 'Yes', '31/08/2017', null, null, null, '1', null, '1169', null, null, null, ' R 246 612,00 ', null, '28/02/2017', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('17', null, 'SNH_h_017', '', '1', null, '1', null, '1', null, null, 'Yes', '31/08/2017', null, null, null, '1', null, '764', null, null, null, ' R 190 033,00 ', null, '28/02/2017', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('18', null, 'SNH_h_018', '', '1', null, '1', null, '1', null, null, 'Yes', '17/02/2017', null, null, null, '1', null, '672', null, null, null, ' R 179 120,00 ', null, '29/02/2016', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('19', null, 'SNH_h_019', '', '1', null, '1', null, '1', null, null, 'Yes', '31/08/2017', null, null, null, '1', null, '770', null, null, null, ' R 160 233,00 ', null, '28/02/2017', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('20', null, 'SNH_h_020', '', '1', null, '1', null, '1', null, null, 'Yes', '19/04/2017', null, null, null, '1', null, '762', null, null, null, ' R 140 000,00 ', null, '29/02/2016', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('21', null, 'SNH_h_021', '', '1', null, '1', null, '1', null, null, 'Yes', '31/08/2017', null, null, null, '1', null, '520', null, null, null, ' R 113 156,00 ', null, '28/02/2017', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('22', null, 'SNH_h_022', '', '1', null, '1', null, '1', null, null, 'Yes', 'Not yet signed off', null, null, null, '1', null, 'N/a', null, null, null, ' R 77 416,00 ', null, '31/12/2016', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('23', null, 'SNH_h_023', '', '1', null, '1', null, '1', null, null, 'Yes', '31/08/2017', null, null, null, '1', null, '522', null, null, null, ' R 66 994,00 ', null, '28/02/2017', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('24', null, 'SNH_h_024', '', '1', null, '1', null, '1', null, null, 'Yes', 'Not yet signed off', null, null, null, '1', null, 'N/A', null, null, null, ' R 57 912,00 ', null, '31/03/2017', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('25', null, 'SNH_h_025', '', '1', null, '1', null, '1', null, null, 'Yes', '31/03/2017', null, null, null, '1', null, '565', null, null, null, ' R 43 322,00 ', null, '29/02/2016', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('26', null, 'SNH_h_026', '', '1', null, '1', null, '1', null, null, 'Yes', '31/08/2017', null, null, null, '1', null, '690', null, null, null, ' R 37 143,00 ', null, '28/02/2017', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('52', null, 'SNH_l_001', '', '1', null, '1', null, '1', null, null, 'Yes', '', null, null, null, '1', null, '59', null, null, null, ' R -   ', null, '', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('53', null, 'SNH_l_002', '', '1', null, '1', null, '1', null, null, 'Yes', '04/11/2016', null, null, null, '1', null, '39', null, null, null, ' R -   ', null, '31/03/2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('54', null, 'SNH_l_003', '', '1', null, '1', null, '1', null, null, 'Yes', '04/11/2016', null, null, null, '1', null, '12', null, null, null, ' R -   ', null, '31/03/2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('55', null, 'SNH_l_004', '', '1', null, '1', null, '1', null, null, 'Yes', '28/11/2016', null, null, null, '1', null, '303', null, null, null, ' R -   ', null, '31/03/2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('56', null, 'SNH_l_005', '', '1', null, '1', null, '1', null, null, 'Yes', '04/11/2016', null, null, null, '1', null, '3', null, null, null, ' R -   ', null, '31/03/2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('57', null, 'SNH_l_006', '', '1', null, '1', null, '1', null, null, 'Yes', '04/11/2016', null, null, null, '1', null, '1', null, null, null, ' R -   ', null, '31/03/2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('58', null, 'SNH_l_007', '', '1', null, '1', null, '1', null, null, 'Yes', '04/11/2016', null, null, null, '1', null, '3', null, null, null, ' R -   ', null, '31/03/2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('59', null, 'SNH_l_008', '', '1', null, '1', null, '1', null, null, 'Yes', '04/11/2016', null, null, null, '1', null, '29', null, null, null, ' R -   ', null, '31/03/2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('60', null, 'SNH_l_009', '', '1', null, '1', null, '1', null, null, 'Yes', '07/04/2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 209 000,00 ', null, '31/12/2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('61', null, 'SNH_l_010', '', '1', null, '1', null, '1', null, null, 'Yes', '', null, null, null, '1', null, '', null, null, null, ' R 30 984,00 ', null, '31/03/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('62', null, 'SNH_l_011', '', '1', null, '1', null, '1', null, null, 'Yes', '', null, null, null, '1', null, '', null, null, null, ' R 45 000,00 ', null, '31/03/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('63', null, 'SNH_l_012', '', '1', null, '1', null, '1', null, null, 'Yes', '', null, null, null, '1', null, 'N/A', null, null, null, ' R 80 000,00 ', null, '31/12/2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('64', null, 'SNH_l_013', '', '1', null, '1', null, '1', null, null, 'Yes', '', null, null, null, '1', null, 'N/A', null, null, null, ' R 76 900,00 ', null, '31/03/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('65', null, 'SNH_l_014', '', '1', null, '1', null, '1', null, null, 'Yes', '', null, null, null, '1', null, '80', null, null, null, ' R 190 766,00 ', null, '28/02/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('66', null, 'SNH_l_015', '', '1', null, '1', null, '1', null, null, 'Yes', '', null, null, null, '1', null, 'N/A', null, null, null, ' R 100 000,00 ', null, '31/12/2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('67', null, 'SNH_l_016', '', '1', null, '1', null, '1', null, null, 'Yes', '', null, null, null, '1', null, 'N/A', null, null, null, ' R 100 000,00 ', null, '31/12/2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('68', null, 'SNH_l_017', '', '1', null, '1', null, '1', null, null, 'Yes', '', null, null, null, '1', null, 'N/A', null, null, null, ' R 100 000,00 ', null, '31/12/2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('69', null, 'SNH_l_018', '', '1', null, '1', null, '1', null, null, 'Yes', '', null, null, null, '1', null, 'N/A', null, null, null, ' R 100 000,00 ', null, '31/12/2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('70', null, 'SNH_l_019', '', '1', null, '1', null, '1', null, null, 'Yes', '', null, null, null, '1', null, 'N/A', null, null, null, ' R 100 000,00 ', null, '31/12/2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('71', null, 'SNH_l_020', '', '1', null, '1', null, '1', null, null, 'Yes', '', null, null, null, '1', null, 'N/A', null, null, null, ' R 100 000,00 ', null, '31/12/2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('72', null, 'SNH_l_021', '', '1', null, '1', null, '1', null, null, 'Yes', '', null, null, null, '1', null, 'N/A', null, null, null, ' R 100 000,00 ', null, '31/12/2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('73', null, 'SNH_l_022', '', '1', null, '1', null, '1', null, null, 'Yes', '05/10/2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 45 945,00 ', null, '31-03-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('74', null, 'SNH_l_023', '', '1', null, '1', null, '1', null, null, 'Yes', '31/07/2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 45 945,00 ', null, '31-03-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('75', null, 'SNH_l_024', '', '1', null, '1', null, '1', null, null, 'Yes', '05/10/2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 51 272,00 ', null, '31-03-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('76', null, 'SNH_l_025', '', '1', null, '1', null, '1', null, null, 'Yes', '16/11/2017', null, null, null, '1', null, '1', null, null, null, ' R 3 032,00 ', null, '30-06-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('77', null, 'SNH_l_026', '', '1', null, '1', null, '1', null, null, 'Yes', 'Not yet signed off', null, null, null, '1', null, '2', null, null, null, ' R 29 024,00 ', null, '30-06-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('78', null, 'SNH_l_027', '', '1', null, '1', null, '1', null, null, 'Yes', '16/11/2017', null, null, null, '1', null, '1', null, null, null, ' R 3 032,00 ', null, '30-06-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('79', null, 'SNH_l_028', '', '1', null, '1', null, '1', null, null, 'Yes', 'Not yet signed off', null, null, null, '1', null, '1', null, null, null, ' R 24 692,00 ', null, '30-06-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('80', null, 'SNH_l_029', '', '1', null, '1', null, '1', null, null, 'Yes', 'Not yet signed off', null, null, null, '1', null, '8', null, null, null, ' R 20 360,00 ', null, '30-06-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('81', null, 'SNH_l_030', '', '1', null, '1', null, '1', null, null, 'Yes', '16/11/2017', null, null, null, '1', null, '1', null, null, null, ' R 3 032,00 ', null, '30-06-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('82', null, 'SNH_l_031', '', '1', null, '1', null, '1', null, null, 'Yes', '31/10/2017', null, null, null, '1', null, '2', null, null, null, ' R 25 775,00 ', null, '30-06-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('83', null, 'SNH_l_032', '', '1', null, '1', null, '1', null, null, 'Yes', 'Not yet signed off', null, null, null, '1', null, '58', null, null, null, ' R 19 277,00 ', null, '30-06-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('84', null, 'SNH_l_033', '', '1', null, '1', null, '1', null, null, 'Yes', 'Not yet signed off', null, null, null, '1', null, '1', null, null, null, ' R 19 927,00 ', null, '30-06-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('85', null, 'SNH_l_034', '', '1', null, '1', null, '1', null, null, 'Yes', '04/12/2017', null, null, null, '1', null, '1', null, null, null, ' R 3 032,00 ', null, '30-06-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('86', null, 'SNH_l_035', '', '1', null, '1', null, '1', null, null, 'Yes', 'Not yet signed off', null, null, null, '1', null, '1', null, null, null, ' R 14 512,00 ', null, '30-06-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('87', null, 'SNH_l_036', '', '1', null, '1', null, '1', null, null, 'Yes', 'Not yet signed off', null, null, null, '1', null, '44', null, null, null, ' R 123 029,00 ', null, '30-06-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('88', null, 'SNH_l_037', '', '1', null, '1', null, '1', null, null, 'Yes', 'Not yet signed off', null, null, null, '1', null, '15', null, null, null, ' R 130 498,00 ', null, '30-06-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('89', null, 'SNH_l_038', '', '1', null, '1', null, '1', null, null, 'Yes', 'Not yet signed off', null, null, null, '1', null, '10', null, null, null, ' R 136 025,00 ', null, '30-06-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('90', null, 'SNH_l_039', '', '1', null, '1', null, '1', null, null, 'Yes', '16/11/2017', null, null, null, '1', null, '1', null, null, null, ' R 3 032,00 ', null, '30-06-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('91', null, 'SNH_l_040', '', '1', null, '1', null, '1', null, null, 'Yes', 'Not yet signed off', null, null, null, '1', null, '1', null, null, null, ' R 14 945,00 ', null, '30-06-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('92', null, 'SNH_l_041', '', '1', null, '1', null, '1', null, null, 'Yes', '16/11/2017', null, null, null, '1', null, '2', null, null, null, ' R 3 032,00 ', null, '30-06-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('93', null, 'SNH_l_042', '', '1', null, '1', null, '1', null, null, 'Yes', '16/11/2017', null, null, null, '1', null, '3', null, null, null, ' R 3 032,00 ', null, '30-06-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('94', null, 'SNH_l_043', '', '1', null, '1', null, '1', null, null, 'Yes', 'Not yet signed off', null, null, null, '1', null, '1', null, null, null, ' R 16 028,00 ', null, '30-06-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('95', null, 'SNH_l_044', '', '1', null, '1', null, '1', null, null, 'Yes', 'Not yet signed off', null, null, null, '1', null, '18', null, null, null, ' R 30 107,00 ', null, '30-06-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('96', null, 'SNH_l_045', '', '1', null, '1', null, '1', null, null, 'Yes', '04/12/2017', null, null, null, '1', null, '1', null, null, null, ' R 3 032,00 ', null, '30-06-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('97', null, 'SNH_l_046', '', '1', null, '1', null, '1', null, null, 'Yes', '04/12/2017', null, null, null, '1', null, '1', null, null, null, ' R 3 032,00 ', null, '30-06-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('98', null, 'SNH_l_047', '', '1', null, '1', null, '1', null, null, 'Yes', 'Not yet signed off', null, null, null, '1', null, '4', null, null, null, ' R 40 071,00 ', null, '30-06-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('99', null, 'SNH_l_048', '', '1', null, '1', null, '1', null, null, 'Yes', '04/12/2017', null, null, null, '1', null, '3', null, null, null, ' R 20 360,00 ', null, '30-06-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('100', null, 'SNH_l_049', '', '1', null, '1', null, '1', null, null, 'Yes', '31-05-2017', null, null, null, '1', null, '18', null, null, null, ' R 60 000,00 ', null, '28/02/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('101', null, 'SNH_l_050', '', '1', null, '1', null, '1', null, null, 'Yes', '26-04-2017', null, null, null, '1', null, '9', null, null, null, ' R 72 747,00 ', null, '28/02/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('102', null, 'SNH_l_051', '', '1', null, '1', null, '1', null, null, 'Yes', '17-02-2017', null, null, null, '1', null, '242', null, null, null, ' R 114 554,00 ', null, '29-02-2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('103', null, 'SNH_l_052', '', '1', null, '1', null, '1', null, null, 'Yes', '17-02-2017', null, null, null, '1', null, '74', null, null, null, ' R 17 790,00 ', null, '29-02-2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('104', null, 'SNH_l_053', '', '1', null, '1', null, '1', null, null, 'Yes', '17-02-2017', null, null, null, '1', null, '146', null, null, null, ' R 14 371,00 ', null, '29-02-2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('105', null, 'SNH_l_054', '', '1', null, '1', null, '1', null, null, 'Yes', '31/08/2017', null, null, null, '1', null, '242', null, null, null, ' R 55 714,00 ', null, '28-02-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('106', null, 'SNH_l_055', '', '1', null, '1', null, '1', null, null, 'Yes', '31/08/2017', null, null, null, '1', null, '74', null, null, null, ' R 7 774,00 ', null, '28-02-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('107', null, 'SNH_l_056', '', '1', null, '1', null, '1', null, null, 'Yes', '31/08/2017', null, null, null, '1', null, '146', null, null, null, ' R 31 960,00 ', null, '28-02-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('108', null, 'SNH_l_057', '', '1', null, '1', null, '1', null, null, 'Yes', '19/09/2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 855 000,00 ', null, '31-03-2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('109', null, 'SNH_l_058', '', '1', null, '1', null, '1', null, null, 'Yes', '10-05-2017', null, null, null, '1', null, '27', null, null, null, ' R 82 324,00 ', null, '31-12-2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('110', null, 'SNH_l_059', '', '1', null, '1', null, '1', null, null, 'Yes', '06-07-2017', null, null, null, '1', null, '15', null, null, null, ' R 100 000,00 ', null, '29-02-2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('111', null, 'SNH_l_060', '', '1', null, '1', null, '1', null, null, 'Yes', '06-07-2017', null, null, null, '1', null, '10', null, null, null, ' R 9 536,04 ', null, '29-02-2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('112', null, 'SNH_l_061', '', '1', null, '1', null, '1', null, null, 'Yes', '06-07-2017', null, null, null, '1', null, '10', null, null, null, ' R 7 335,41 ', null, '29-02-2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('113', null, 'SNH_l_062', '', '1', null, '1', null, '1', null, null, 'Yes', '03-07-2017', null, null, null, '1', null, '17', null, null, null, ' R 16 705,00 ', null, '29-02-2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('114', null, 'SNH_l_063', '', '1', null, '1', null, '1', null, null, 'Yes', '06-07-2017', null, null, null, '1', null, '7', null, null, null, ' R 2 239,00 ', null, '29-02-2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('115', null, 'SNH_l_064', '', '1', null, '1', null, '1', null, null, 'Yes', '06-07-2017', null, null, null, '1', null, '5', null, null, null, ' R 3 100,00 ', null, '29-02-2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('116', null, 'SNH_l_065', '', '1', null, '1', null, '1', null, null, 'Yes', '06-07-2017', null, null, null, '1', null, '12', null, null, null, ' R 19 072,07 ', null, '29-02-2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('117', null, 'SNH_l_066', '', '1', null, '1', null, '1', null, null, 'Yes', '06-07-2017', null, null, null, '1', null, '8', null, null, null, ' R 5 501,56 ', null, '29-02-2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('118', null, 'SNH_l_067', '', '1', null, '1', null, '1', null, null, 'Yes', '06-07-2017', null, null, null, '1', null, '11', null, null, null, ' R 15 771,14 ', null, '29-02-2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('119', null, 'SNH_l_068', '', '1', null, '1', null, '1', null, null, 'Yes', '06-07-2017', null, null, null, '1', null, '9', null, null, null, ' R 4 034,89 ', null, '29-02-2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('120', null, 'SNH_l_069', '', '1', null, '1', null, '1', null, null, 'Yes', 'Not yet signed off', null, null, null, '1', null, 'N/A', null, null, null, ' R 165 000,00 ', null, '29-02-2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('121', null, 'SNH_l_070', '', '1', null, '1', null, '1', null, null, 'Yes', 'Not yet signed off', null, null, null, '1', null, 'N/A', null, null, null, ' R 95 400,00 ', null, '29-02-2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('122', null, 'SNH_l_071', '', '1', null, '1', null, '1', null, null, 'Yes', '10-08-2017', null, null, null, '1', null, '9', null, null, null, ' R 20 000,00 ', null, '30-04-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('123', null, 'SNH_l_072', '', '1', null, '1', null, '1', null, null, 'Yes', '21-08-2017', null, null, null, '1', null, '31', null, null, null, ' R 16 000,00 ', null, '30-04-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('124', null, 'SNH_l_073', '', '1', null, '1', null, '1', null, null, 'Yes', '21-04-2017', null, null, null, '1', null, 'N/A', null, null, null, ' Voluntary audit - not a legal entity ', null, '31-03-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('125', null, 'SNH_l_074', '', '1', null, '1', null, '1', null, null, 'Yes', '21-04-2017', null, null, null, '1', null, 'N/A', null, null, null, ' Voluntary audit - not a legal entity ', null, '31-03-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('126', null, 'SNH_l_075', '', '1', null, '1', null, '1', null, null, 'Yes', '21-04-2017', null, null, null, '1', null, 'N/A', null, null, null, ' Voluntary audit - not a legal entity ', null, '31-03-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('127', null, 'SNH_l_076', '', '1', null, '1', null, '1', null, null, 'Yes', '21-04-2017', null, null, null, '1', null, 'N/A', null, null, null, ' Voluntary audit - not a legal entity ', null, '31-03-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('128', null, 'SNH_l_077', '', '1', null, '1', null, '1', null, null, 'Yes', '21-04-2017', null, null, null, '1', null, 'N/A', null, null, null, ' Voluntary audit - not a legal entity ', null, '31-03-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('129', null, 'SNH_l_078', '', '1', null, '1', null, '1', null, null, 'Yes', '21-04-2017', null, null, null, '1', null, 'N/A', null, null, null, ' Voluntary audit - not a legal entity ', null, '31-03-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('130', null, 'SNH_l_079', '', '1', null, '1', null, '1', null, null, 'Yes', '21-04-2017', null, null, null, '1', null, 'N/A', null, null, null, ' Voluntary audit - not a legal entity ', null, '31-03-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('131', null, 'SNH_l_080', '', '1', null, '1', null, '1', null, null, 'Yes', '21-04-2017', null, null, null, '1', null, 'N/A', null, null, null, ' Voluntary audit - not a legal entity ', null, '31-03-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('132', null, 'SNH_l_081', '', '1', null, '1', null, '1', null, null, 'Yes', '21-04-2017', null, null, null, '1', null, 'N/A', null, null, null, ' Voluntary audit - not a legal entity ', null, '31-03-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('133', null, 'SNH_l_082', '', '1', null, '1', null, '1', null, null, 'Yes', '21-04-2017', null, null, null, '1', null, 'N/A', null, null, null, ' Voluntary audit - not a legal entity ', null, '31-03-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('134', null, 'SNH_l_083', '', '1', null, '1', null, '1', null, null, 'Yes', '21-04-2017', null, null, null, '1', null, 'N/A', null, null, null, ' Voluntary audit - not a legal entity ', null, '31-03-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('135', null, 'SNH_l_084', '', '1', null, '1', null, '1', null, null, 'Yes', '21-04-2017', null, null, null, '1', null, 'N/A', null, null, null, ' Voluntary audit - not a legal entity ', null, '31-03-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('136', null, 'SNH_l_085', '', '1', null, '1', null, '1', null, null, 'Yes', '21-04-2017', null, null, null, '1', null, 'N/A', null, null, null, ' Voluntary audit - not a legal entity ', null, '31-03-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('137', null, 'SNH_l_086', '', '1', null, '1', null, '1', null, null, 'Yes', '21-04-2017', null, null, null, '1', null, 'N/A', null, null, null, ' Voluntary audit - not a legal entity ', null, '31-03-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('138', null, 'SNH_l_087', '', '1', null, '1', null, '1', null, null, 'Yes', '21-04-2017', null, null, null, '1', null, 'N/A', null, null, null, ' Voluntary audit - not a legal entity ', null, '31-03-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('139', null, 'SNH_l_088', '', '1', null, '1', null, '1', null, null, 'Yes', 'Not yet signed off', null, null, null, '1', null, '1', null, null, null, ' R 52 358,00 ', null, '28-02-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('140', null, 'SNH_l_089', '', '1', null, '1', null, '1', null, null, 'Yes', 'Not yet signed off', null, null, null, '1', null, '1', null, null, null, ' R 125 046,00 ', null, '28-02-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('141', null, 'SNH_l_090', '', '1', null, '1', null, '1', null, null, 'Yes', '22/06/2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 145 906,00 ', null, '31/03/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('142', null, 'SNH_l_091', '', '1', null, '1', null, '1', null, null, 'Yes', '', null, null, null, '1', null, '', null, null, null, ' R -   ', null, '', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('143', null, 'SNH_l_092', '', '1', null, '1', null, '1', null, null, 'Yes', '', null, null, null, '1', null, '', null, null, null, ' R -   ', null, '', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('144', null, 'SNH_l_093', '', '1', null, '1', null, '1', null, null, 'Yes', '', null, null, null, '1', null, '', null, null, null, ' R -   ', null, '', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('145', null, 'SNH_l_094', '', '1', null, '1', null, '1', null, null, 'Yes', '', null, null, null, '1', null, '', null, null, null, ' R -   ', null, '', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('146', null, 'SNH_l_095', '', '1', null, '1', null, '1', null, null, 'Yes', '', null, null, null, '1', null, '', null, null, null, ' R -   ', null, '', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('147', null, 'SNH_l_096', '', '1', null, '1', null, '1', null, null, 'Yes', '', null, null, null, '1', null, '', null, null, null, ' R -   ', null, '', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('148', null, 'SNH_l_097', '', '1', null, '1', null, '1', null, null, 'Yes', '', null, null, null, '1', null, '', null, null, null, ' R -   ', null, '', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('149', null, 'SNH_l_098', '', '1', null, '1', null, '1', null, null, 'Yes', '', null, null, null, '1', null, '', null, null, null, ' R -   ', null, '', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('150', null, 'SNH_l_099', '', '1', null, '1', null, '1', null, null, 'Yes', '', null, null, null, '1', null, '', null, null, null, ' R -   ', null, '', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('151', null, 'SNH_l_100', '', '1', null, '1', null, '1', null, null, 'Yes', '', null, null, null, '1', null, '', null, null, null, ' R -   ', null, '', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('152', null, 'SNH_l_101', '', '1', null, '1', null, '1', null, null, 'Yes', '', null, null, null, '1', null, '', null, null, null, ' R 141 320,00 ', null, '31/12/2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('153', null, 'SNH_l_102', '', '1', null, '1', null, '1', null, null, 'Yes', '', null, null, null, '1', null, 'N/A', null, null, null, ' R -   ', null, '31/12/2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('154', null, 'SNH_l_103', '', '1', null, '1', null, '1', null, null, 'Yes', '', null, null, null, '1', null, '', null, null, null, ' R -   ', null, '28/02/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('155', null, 'SNH_l_104', '', '1', null, '1', null, '1', null, null, 'Yes', '', null, null, null, '1', null, 'N/A', null, null, null, ' R -   ', null, '31/12/2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('156', null, 'SNH_l_105', '', '1', null, '1', null, '1', null, null, 'Yes', '', null, null, null, '1', null, '115', null, null, null, ' R -   ', null, '', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('157', null, 'SNH_l_106', '', '1', null, '1', null, '1', null, null, 'Yes', '', null, null, null, '1', null, '696', null, null, null, ' R 200 000,00 ', null, '31/12/2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('158', null, 'SNH_l_107', '', '1', null, '1', null, '1', null, null, 'Yes', '', null, null, null, '1', null, '91', null, null, null, ' R -   ', null, '30-06-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('159', null, 'SNH_l_108', '', '1', null, '1', null, '1', null, null, 'Yes', '', null, null, null, '1', null, '', null, null, null, ' R -   ', null, '30/04/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('160', null, 'SNH_l_109', '', '1', null, '1', null, '1', null, null, 'Yes', '', null, null, null, '1', null, '', null, null, null, ' R -   ', null, '30/04/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('161', null, 'SNH_l_110', '', '1', null, '1', null, '1', null, null, 'Yes', '', null, null, null, '1', null, '', null, null, null, ' R -   ', null, '30/04/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('162', null, 'SNH_l_111', '', '1', null, '1', null, '1', null, null, 'Yes', '', null, null, null, '1', null, '', null, null, null, ' R -   ', null, '30/04/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('163', null, 'SNH_l_112', '', '1', null, '1', null, '1', null, null, 'Yes', '', null, null, null, '1', null, '', null, null, null, ' R -   ', null, '30/04/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('164', null, 'SNH_l_113', '', '1', null, '1', null, '1', null, null, 'Yes', '', null, null, null, '1', null, '', null, null, null, ' R -   ', null, '30/04/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('165', null, 'SNH_l_114', '', '1', null, '1', null, '1', null, null, 'Yes', '', null, null, null, '1', null, '', null, null, null, ' R -   ', null, '30/04/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('169', null, 'CTN_h_001', '', '1', null, '1', null, '1', null, null, 'Yes', '31-03-2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 130 000,00 ', null, '29/02/2016', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('170', null, 'CTN_h_002', '', '1', null, '1', null, '1', null, null, 'Yes', '21-08-2017', null, null, null, '1', null, 'N/A', null, null, null, ' R -   ', null, '28/02/2017', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('171', null, 'CTN_h_003', '', '1', null, '1', null, '1', null, null, 'Yes', '31-07-2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 107 557,00 ', null, '31-03-2017', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('172', null, 'CTN_h_004', '', '1', null, '1', null, '1', null, null, 'Yes', '31-08-2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 98 325,00 ', null, '31-03-2017', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('173', null, 'CTN_h_005', '', '1', null, '1', null, '1', null, null, 'Yes', '31-07-2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 97 708,00 ', null, '31-03-2017', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('174', null, 'CTN_h_006', '', '1', null, '1', null, '1', null, null, 'Yes', '31-07-2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 93 718,00 ', null, '31-03-2017', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('175', null, 'CTN_h_007', '', '1', null, '1', null, '1', null, null, 'Yes', '21-08-2017', null, null, null, '1', null, 'N/A', null, null, null, ' R -   ', null, '28/02/2017', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('176', null, 'CTN_h_008', '', '1', null, '1', null, '1', null, null, 'Yes', '21-08-2017', null, null, null, '1', null, '4599', null, null, null, ' R 80 000,00 ', null, ' 28/02/2017 ', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('177', null, 'CTN_h_009', '', '1', null, '1', null, '1', null, null, 'Yes', '04-08-2017', null, null, null, '1', null, 'N/A', null, null, null, ' R -   ', null, '28/02/2017', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('178', null, 'CTN_h_010', '', '1', null, '1', null, '1', null, null, 'Yes', '29-09-2017', null, null, null, '1', null, 'N/A', null, null, null, ' R -   ', null, '31/03/2017', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('179', null, 'CTN_h_011', '', '1', null, '1', null, '1', null, null, 'Yes', '31-03-2017', null, null, null, '1', null, 'N/A', null, null, null, ' R -   ', null, '29/02/2016', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('180', null, 'CTN_h_012', '', '1', null, '1', null, '1', null, null, 'Yes', '14-08-2017', null, null, null, '1', null, 'N/A', null, null, null, ' R -   ', null, '28/02/2017', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('181', null, 'CTN_h_013', '', '1', null, '1', null, '1', null, null, 'Yes', '06-07-2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 50 000,00 ', null, '29/02/2016', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('182', null, 'CTN_h_014', '', '1', null, '1', null, '1', null, null, 'Yes', '30/08/2017', null, null, null, '1', null, 'N/A', null, null, null, ' R -   ', null, '28/02/2016', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('183', null, 'CTN_h_015', '', '1', null, '1', null, '1', null, null, 'Yes', 'Not yet signed off', null, null, null, '1', null, 'N/A', null, null, null, ' R -   ', null, ' 28/02/2017 ', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('184', null, 'CTN_h_016', '', '1', null, '1', null, '1', null, null, 'Yes', '30/08/2017', null, null, null, '1', null, 'N/A', null, null, null, ' R -   ', null, ' 28/02/2017 ', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('185', null, 'CTN_h_017', '', '1', null, '1', null, '1', null, null, 'Yes', '30/08/2017', null, null, null, '1', null, '20', null, null, null, ' R -   ', null, ' 28/02/2017 ', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('188', null, 'CTN_l_001', '', '1', null, '1', null, '1', null, null, 'Yes', '28-02-2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 177 000,00 ', null, '31-12-2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('189', null, 'CTN_l_002', '', '1', null, '1', null, '1', null, null, 'Yes', 'Pending', null, null, null, '1', null, '77', null, null, null, ' R 174 000,00 ', null, '28-02-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('190', null, 'CTN_l_003', '', '1', null, '1', null, '1', null, null, 'Yes', 'Pending', null, null, null, '1', null, 'N/A', null, null, null, ' R 130 000,00 ', null, '30-04-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('191', null, 'CTN_l_004', '', '1', null, '1', null, '1', null, null, 'Yes', 'Pending', null, null, null, '1', null, '215', null, null, null, ' R 112 395,00 ', null, '30-06-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('192', null, 'CTN_l_005', '', '1', null, '1', null, '1', null, null, 'Yes', 'AGM Pending', null, null, null, '1', null, '14', null, null, null, ' R 81 000,00 ', null, '31-12-2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('193', null, 'CTN_l_007', '', '1', null, '1', null, '1', null, null, 'Yes', '29-03-2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 66 500,00 ', null, '31-03-2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('194', null, 'CTN_l_008', '', '1', null, '1', null, '1', null, null, 'Yes', '12-06-2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 65 000,00 ', null, '30-04-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('195', null, 'CTN_l_009', '', '1', null, '1', null, '1', null, null, 'Yes', 'Pending', null, null, null, '1', null, 'N/A', null, null, null, ' R 52 700,00 ', null, '31-03-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('196', null, 'CTN_l_010', '', '1', null, '1', null, '1', null, null, 'Yes', 'Pending', null, null, null, '1', null, 'N/A', null, null, null, ' R 50 000,00 ', null, '30-04-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('197', null, 'CTN_l_011', '', '1', null, '1', null, '1', null, null, 'Yes', 'Pending', null, null, null, '1', null, 'N/A', null, null, null, ' R 47 700,00 ', null, '31-03-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('198', null, 'CTN_l_012', '', '1', null, '1', null, '1', null, null, 'Yes', 'Pending', null, null, null, '1', null, 'N/A', null, null, null, ' R 47 700,00 ', null, '31-03-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('199', null, 'CTN_l_014', '', '1', null, '1', null, '1', null, null, 'Yes', '11-09-2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 37 414,00 ', null, '31-12-2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('200', null, 'CTN_l_016', '', '1', null, '1', null, '1', null, null, 'Yes', 'Pending', null, null, null, '1', null, '95', null, null, null, ' R 35 000,00 ', null, '28-02-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('201', null, 'CTN_l_017', '', '1', null, '1', null, '1', null, null, 'Yes', 'Pending', null, null, null, '1', null, 'N/A', null, null, null, ' R 35 000,00 ', null, '30-04-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('202', null, 'CTN_l_018', '', '1', null, '1', null, '1', null, null, 'Yes', '11-09-2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 32 000,00 ', null, '31-12-2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('203', null, 'CTN_l_019', '', '1', null, '1', null, '1', null, null, 'Yes', '18-07-2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 30 000,00 ', null, '30-04-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('204', null, 'CTN_l_024', '', '1', null, '1', null, '1', null, null, 'Yes', '29-07-2017', null, null, null, '1', null, '20', null, null, null, ' R 16 000,00 ', null, '29-02-2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('206', null, 'CTN_l_001', '', '1', null, '1', null, '1', null, null, 'Yes', '28-02-2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 177 000,00 ', null, '31-12-2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('232', null, 'PTR_h_001', '', '1', null, '1', null, '1', null, null, 'Yes', 'Estimate Sign-off Date - 15-12-2017', null, null, null, '1', null, '2091', null, null, null, ' R 479 422,50 ', null, '31/07/2017', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('207', null, 'CTN_l_002', '', '1', null, '1', null, '1', null, null, 'Yes', 'Pending', null, null, null, '1', null, '77', null, null, null, ' R 174 000,00 ', null, '28-02-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('208', null, 'CTN_l_003', '', '1', null, '1', null, '1', null, null, 'Yes', 'Pending', null, null, null, '1', null, 'N/A', null, null, null, ' R 130 000,00 ', null, '30-04-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('209', null, 'CTN_l_004', '', '1', null, '1', null, '1', null, null, 'Yes', 'Pending', null, null, null, '1', null, '215', null, null, null, ' R 112 395,00 ', null, '30-06-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('210', null, 'CTN_l_005', '', '1', null, '1', null, '1', null, null, 'Yes', 'AGM Pending', null, null, null, '1', null, '14', null, null, null, ' R 81 000,00 ', null, '31-12-2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('211', null, 'CTN_l_006', '', '1', null, '1', null, '1', null, null, 'Yes', '26-09-2016', null, null, null, '1', null, '41', null, null, null, ' R 70 000,00 ', null, '29-02-2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('212', null, 'CTN_l_007', '', '1', null, '1', null, '1', null, null, 'Yes', '29-03-2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 66 500,00 ', null, '31-03-2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('213', null, 'CTN_l_008', '', '1', null, '1', null, '1', null, null, 'Yes', '12-06-2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 65 000,00 ', null, '30-04-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('214', null, 'CTN_l_009', '', '1', null, '1', null, '1', null, null, 'Yes', 'Pending', null, null, null, '1', null, 'N/A', null, null, null, ' R 52 700,00 ', null, '31-03-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('215', null, 'CTN_l_010', '', '1', null, '1', null, '1', null, null, 'Yes', 'Pending', null, null, null, '1', null, 'N/A', null, null, null, ' R 50 000,00 ', null, '30-04-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('216', null, 'CTN_l_011', '', '1', null, '1', null, '1', null, null, 'Yes', 'Pending', null, null, null, '1', null, 'N/A', null, null, null, ' R 47 700,00 ', null, '31-03-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('217', null, 'CTN_l_012', '', '1', null, '1', null, '1', null, null, 'Yes', 'Pending', null, null, null, '1', null, 'N/A', null, null, null, ' R 47 700,00 ', null, '31-03-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('218', null, 'CTN_l_013', '', '1', null, '1', null, '1', null, null, 'Yes', '10-10-2016', null, null, null, '1', null, '9', null, null, null, ' R 39 250,00 ', null, '29-02-2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('219', null, 'CTN_l_014', '', '1', null, '1', null, '1', null, null, 'Yes', '11-09-2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 37 414,00 ', null, '31-12-2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('220', null, 'CTN_l_015', '', '1', null, '1', null, '1', null, null, 'Yes', '01-08-2016', null, null, null, '1', null, '16', null, null, null, ' R 36 500,00 ', null, '29-02-2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('221', null, 'CTN_l_016', '', '1', null, '1', null, '1', null, null, 'Yes', 'Pending', null, null, null, '1', null, '95', null, null, null, ' R 35 000,00 ', null, '28-02-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('222', null, 'CTN_l_017', '', '1', null, '1', null, '1', null, null, 'Yes', 'Pending', null, null, null, '1', null, 'N/A', null, null, null, ' R 35 000,00 ', null, '30-04-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('223', null, 'CTN_l_018', '', '1', null, '1', null, '1', null, null, 'Yes', '11-09-2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 32 000,00 ', null, '31-12-2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('224', null, 'CTN_l_019', '', '1', null, '1', null, '1', null, null, 'Yes', '18-07-2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 30 000,00 ', null, '30-04-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('225', null, 'CTN_l_020', '', '1', null, '1', null, '1', null, null, 'Yes', '10-10-2016', null, null, null, '1', null, 'N/A', null, null, null, ' R 22 500,00 ', null, '31-03-2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('226', null, 'CTN_l_021', '', '1', null, '1', null, '1', null, null, 'Yes', '28-06-2016', null, null, null, '1', null, 'N/A', null, null, null, ' R 19 500,00 ', null, '31-12-2015', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('227', null, 'CTN_l_022', '', '1', null, '1', null, '1', null, null, 'Yes', '10-10-2016', null, null, null, '1', null, '25', null, null, null, ' R 17 500,00 ', null, '29-02-2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('228', null, 'CTN_l_023', '', '1', null, '1', null, '1', null, null, 'Yes', '10-10-2016', null, null, null, '1', null, '26', null, null, null, ' R 17 500,00 ', null, '29-02-2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('229', null, 'CTN_l_024', '', '1', null, '1', null, '1', null, null, 'Yes', '29-07-2017', null, null, null, '1', null, '20', null, null, null, ' R 16 000,00 ', null, '29-02-2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('230', null, 'CTN_l_025', '', '1', null, '1', null, '1', null, null, 'Yes', '10-10-2016', null, null, null, '1', null, '7', null, null, null, ' R 15 000,00 ', null, '29-02-2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('233', null, 'PTR_h_002', '', '1', null, '1', null, '1', null, null, 'Yes', '21-09-2017', null, null, null, '1', null, '63', null, null, null, ' R 87 000,00 ', null, '30/06/2017', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('234', null, 'PTR_h_003', '', '1', null, '1', null, '1', null, null, 'Yes', '25-07-2017', null, null, null, '1', null, '44', null, null, null, ' R 70 478,00 ', null, '31/03/2017', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('235', null, 'PTR_h_004', '', '1', null, '1', null, '1', null, null, 'Yes', '31-08-2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 47 685,00 ', null, '28/02/2017', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('236', null, 'PTR_h_005', '', '1', null, '1', null, '1', null, null, 'Yes', 'Estimate Sign-off Date - 30-11-2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 46 300,00 ', null, '28/02/2017', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('237', null, 'PTR_h_006', '', '1', null, '1', null, '1', null, null, 'Yes', '30-06-2017', null, null, null, '1', null, '1', null, null, null, ' R 29 000,00 ', null, '28/02/2017', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('238', null, 'PTR_h_007', '', '1', null, '1', null, '1', null, null, 'Yes', '31-10-2017', null, null, null, '1', null, '10', null, null, null, ' R 21 400,00 ', null, '30/06//2017', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('239', null, 'PTR_h_008', '', '1', null, '1', null, '1', null, null, 'Yes', '30-06-2017', null, null, null, '1', null, '3', null, null, null, ' R 19 850,00 ', null, '28/02/2017', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('240', null, 'PTR_h_009', '', '1', null, '1', null, '1', null, null, 'Yes', '30-06-2017', null, null, null, '1', null, '5', null, null, null, ' R 15 290,00 ', null, '28/02/2017', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('241', null, 'PTR_h_010', '', '1', null, '1', null, '1', null, null, 'Yes', '31-08-2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 13 600,00 ', null, '28/02/2017', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('242', null, 'PTR_h_011', '', '1', null, '1', null, '1', null, null, 'Yes', '31-08-2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 5 670,00 ', null, '28/02/2017', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('244', null, 'PTR_l_001', '', '1', null, '1', null, '1', null, null, 'Yes', 'Estimate Sign-off Date - 14-12-2017', null, null, null, '1', null, '140', null, null, null, ' R 217 508,09 ', null, '28/02/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('285', null, 'EGT_h_001', '', '1', null, '1', null, '1', null, null, 'Yes', 'Not yet signed off', null, null, null, '1', null, '517', null, null, null, ' R 495 772,00 ', null, '31/08/2017', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('245', null, 'PTR_l_002', '', '1', null, '1', null, '1', null, null, 'Yes', '02-05-2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 198 835,00 ', null, '15/12/2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('246', null, 'PTR_l_003', '', '1', null, '1', null, '1', null, null, 'Yes', 'Estimate Sign-off Date - 30-11-2017', null, null, null, '1', null, '134', null, null, null, ' R 145 000,00 ', null, '28/02/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('247', null, 'PTR_l_004', '', '1', null, '1', null, '1', null, null, 'Yes', '05-09-2017', null, null, null, '1', null, '53', null, null, null, ' R 126 000,00 ', null, '28/02/2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('248', null, 'PTR_l_005', '', '1', null, '1', null, '1', null, null, 'Yes', 'Estimate Sign-off Date - 28-02-2018', null, null, null, '1', null, '250', null, null, null, ' R 117 325,50 ', null, '28/02/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('249', null, 'PTR_l_006', '', '1', null, '1', null, '1', null, null, 'Yes', 'Estimate Sign-off Date - 06-12-2017', null, null, null, '1', null, '11', null, null, null, ' R 78 750,00 ', null, '30/06/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('250', null, 'PTR_l_007', '', '1', null, '1', null, '1', null, null, 'Yes', 'Estimate Sign-off Date - 30-11-2017', null, null, null, '1', null, '46', null, null, null, ' R 62 000,00 ', null, '28/02/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('251', null, 'PTR_l_008', '', '1', null, '1', null, '1', null, null, 'Yes', '24-08-2017', null, null, null, '1', null, '39', null, null, null, ' R 58 725,00 ', null, '28/02/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('252', null, 'PTR_l_009', '', '1', null, '1', null, '1', null, null, 'Yes', '30/06/2017', null, null, null, '1', null, '15', null, null, null, ' R 43 510,00 ', null, '31/12/2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('253', null, 'PTR_l_010', '', '1', null, '1', null, '1', null, null, 'Yes', '25-01-2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 41 470,00 ', null, '31/07/2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('254', null, 'PTR_l_011', '', '1', null, '1', null, '1', null, null, 'Yes', 'Estimate Sign-off Date - 28-02-2018', null, null, null, '1', null, '132', null, null, null, ' R 38 500,00 ', null, '28/02/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('255', null, 'PTR_l_012', '', '1', null, '1', null, '1', null, null, 'Yes', 'Estimate Sign-off Date - 06-12-2017', null, null, null, '1', null, '1', null, null, null, ' R 37 590,00 ', null, '30/06/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('256', null, 'PTR_l_013', '', '1', null, '1', null, '1', null, null, 'Yes', '26-05-2017', null, null, null, '1', null, '132', null, null, null, ' R 35 000,00 ', null, '28/02/2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('257', null, 'PTR_l_014', '', '1', null, '1', null, '1', null, null, 'Yes', 'Estimate Sign-off Date - 14-12-2017', null, null, null, '1', null, '21', null, null, null, ' R 27 820,00 ', null, '28/02/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('258', null, 'PTR_l_015', '', '1', null, '1', null, '1', null, null, 'Yes', 'Estimate Sign-off Date - 14-12-2017', null, null, null, '1', null, '10', null, null, null, ' R 24 610,00 ', null, '28/02/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('259', null, 'PTR_l_016', '', '1', null, '1', null, '1', null, null, 'Yes', 'Estimate Sign-off Date - 28-02-2018', null, null, null, '1', null, '5', null, null, null, ' R 31 993,00 ', null, '28/02/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('260', null, 'PTR_l_017', '', '1', null, '1', null, '1', null, null, 'Yes', 'Estimate Sign-off Date - 14-12-2017', null, null, null, '1', null, '34', null, null, null, ' R 21 935,00 ', null, '28/02/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('261', null, 'PTR_l_018', '', '1', null, '1', null, '1', null, null, 'Yes', '07-04-2017', null, null, null, '1', null, '8', null, null, null, ' R 21 366,00 ', null, '28/02/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('262', null, 'PTR_l_019', '', '1', null, '1', null, '1', null, null, 'Yes', 'Estimate Sign-off Date - 15-12-2017', null, null, null, '1', null, '2', null, null, null, ' R 20 000,00 ', null, '30/06/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('263', null, 'PTR_l_020', '', '1', null, '1', null, '1', null, null, 'Yes', 'Estimate Sign-off Date - 30-11-2017', null, null, null, '1', null, '7', null, null, null, ' R 20 000,00 ', null, '28/02/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('264', null, 'PTR_l_021', '', '1', null, '1', null, '1', null, null, 'Yes', 'Estimate Sign-off Date - 30-11-2017', null, null, null, '1', null, '49', null, null, null, ' R 20 000,00 ', null, '28/02/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('265', null, 'PTR_l_022', '', '1', null, '1', null, '1', null, null, 'Yes', 'Estimate Sign-off Date - 30-11-2017', null, null, null, '1', null, '1', null, null, null, ' R 20 000,00 ', null, '28/02/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('266', null, 'PTR_l_023', '', '1', null, '1', null, '1', null, null, 'Yes', '05-09-2017', null, null, null, '1', null, '0', null, null, null, ' R 18 000,00 ', null, '28/02/2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('267', null, 'PTR_l_024', '', '1', null, '1', null, '1', null, null, 'Yes', '05-09-2017', null, null, null, '1', null, '40', null, null, null, ' R 18 000,00 ', null, '28/02/2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('268', null, 'PTR_l_025', '', '1', null, '1', null, '1', null, null, 'Yes', '05-09-2017', null, null, null, '1', null, '2', null, null, null, ' R 18 000,00 ', null, '28/02/2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('269', null, 'PTR_l_026', '', '1', null, '1', null, '1', null, null, 'Yes', '05-05-2017', null, null, null, '1', null, '39', null, null, null, ' R 17 445,00 ', null, '28/02/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('270', null, 'PTR_l_027', '', '1', null, '1', null, '1', null, null, 'Yes', '05-05-2017', null, null, null, '1', null, '39', null, null, null, ' R 17 445,00 ', null, '28/02/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('271', null, 'PTR_l_028', '', '1', null, '1', null, '1', null, null, 'Yes', '24-03-2017', null, null, null, '1', null, '5', null, null, null, ' R 17 000,00 ', null, '28/02/2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('272', null, 'PTR_l_029', '', '1', null, '1', null, '1', null, null, 'Yes', '27/06/2017', null, null, null, '1', null, '2', null, null, null, ' R 15 639,68 ', null, '30/06/2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('273', null, 'PTR_l_030', '', '1', null, '1', null, '1', null, null, 'Yes', '21-04-2017', null, null, null, '1', null, '2', null, null, null, ' R 12 840,00 ', null, '28/02/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('274', null, 'PTR_l_031', '', '1', null, '1', null, '1', null, null, 'Yes', '21-04-2017', null, null, null, '1', null, '2', null, null, null, ' R 12 000,00 ', null, '30/06/2015', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('275', null, 'PTR_l_032', '', '1', null, '1', null, '1', null, null, 'Yes', 'Estimate Sign-off Date - 17-11-2017', null, null, null, '1', null, '8', null, null, null, ' R 11 000,00 ', null, '31/05/2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('276', null, 'PTR_l_033', '', '1', null, '1', null, '1', null, null, 'Yes', 'Estimate Sign-off Date - 24-11-2017', null, null, null, '1', null, '8', null, null, null, ' R 11 000,00 ', null, '31/05/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('277', null, 'PTR_l_034', '', '1', null, '1', null, '1', null, null, 'Yes', '07-04-2017', null, null, null, '1', null, '3', null, null, null, ' R 10 970,00 ', null, '28/02/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('278', null, 'PTR_l_035', '', '1', null, '1', null, '1', null, null, 'Yes', '07-04-2017', null, null, null, '1', null, '3', null, null, null, ' R 10 970,00 ', null, '28/02/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('279', null, 'PTR_l_036', '', '1', null, '1', null, '1', null, null, 'Yes', '07-06-2017', null, null, null, '1', null, '2', null, null, null, ' R 10 000,00 ', null, '28/02/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('280', null, 'PTR_l_037', '', '1', null, '1', null, '1', null, null, 'Yes', '07-08-2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 9 500,00 ', null, '28/02/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('281', null, 'PTR_l_038', '', '1', null, '1', null, '1', null, null, 'Yes', 'Estimate Sign-off Date - 15-12-2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 9 000,00 ', null, '30/06/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('282', null, 'PTR_l_039', '', '1', null, '1', null, '1', null, null, 'Yes', '13-04-2017', null, null, null, '1', null, '5', null, null, null, ' R 7 500,00 ', null, '30/11/2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('283', null, 'PTR_l_040', '', '1', null, '1', null, '1', null, null, 'Yes', 'Estimate Sign-off Date - 30-11-2017', null, null, null, '1', null, 'N/A', null, null, null, 'R', null, '31/07/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('301', null, 'EGT_l_001', '', '1', null, '1', null, '1', null, null, 'Yes', 'Estimated Sign-off Date 15/01/2018', null, null, null, '1', null, '279', null, null, null, ' R 345 000,00 ', null, '28/02/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('286', null, 'EGT_h_002', '', '1', null, '1', null, '1', null, null, 'Yes', '10/03/2017', null, null, null, '1', null, '2347', null, null, null, ' R 367 300,00 ', null, '31/01/2017', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('287', null, 'EGT_h_003', '', '1', null, '1', null, '1', null, null, 'Yes', '14/07/2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 354 500,00 ', null, '31/12/2016', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('288', null, 'EGT_h_004', '', '1', null, '1', null, '1', null, null, 'Yes', '28/03/2017', null, null, null, '1', null, '369', null, null, null, ' R 320 700,00 ', null, '31/12/2016', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('289', null, 'EGT_h_005', '', '1', null, '1', null, '1', null, null, 'Yes', '11/07/2017', null, null, null, '1', null, '362', null, null, null, ' R 175 000,00 ', null, '29/02/2017', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('290', null, 'EGT_h_006', '', '1', null, '1', null, '1', null, null, 'Yes', '06/07/2017', null, null, null, '1', null, '267', null, null, null, ' R 135 000,00 ', null, '28/02/2017', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('291', null, 'EGT_h_007', '', '1', null, '1', null, '1', null, null, 'Yes', '31/10/2017', null, null, null, '1', null, '469', null, null, null, ' R 108 000,00 ', null, '30/06/2017', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('292', null, 'EGT_h_008', '', '1', null, '1', null, '1', null, null, 'Yes', '30/10/2017', null, null, null, '1', null, '25', null, null, null, ' R 94 358,00 ', null, '31/07/2017', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('293', null, 'EGT_h_009', '', '1', null, '1', null, '1', null, null, 'Yes', '24/02/2017', null, null, null, '1', null, '66', null, null, null, ' R 55 000,00 ', null, '28/02/2016', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('294', null, 'EGT_h_010', '', '1', null, '1', null, '1', null, null, 'Yes', '29/08/2017', null, null, null, '1', null, '46', null, null, null, ' R 29 000,00 ', null, '29/02/2016', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('295', null, 'EGT_h_011', '', '1', null, '1', null, '1', null, null, 'Yes', '28/06/2017', null, null, null, '1', null, '4', null, null, null, ' R 15 225,00 ', null, '29/02/2017', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('296', null, 'EGT_h_012', '', '1', null, '1', null, '1', null, null, 'Yes', '09/10/2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 10 450,00 ', null, '28/02/2017', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('297', null, 'EGT_h_013', '', '1', null, '1', null, '1', null, null, 'Yes', '18/04/2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 10 000,00 ', null, '28/02/2016', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('298', null, 'EGT_h_014', '', '1', null, '1', null, '1', null, null, 'Yes', '29/08/2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 7 100,00 ', null, '28/02/2017', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('299', null, 'EGT_h_015', '', '1', null, '1', null, '1', null, null, 'Yes', '31/08/2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 5 400,00 ', null, '28/02/2017', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('364', null, 'DBN_h_001', '', '1', null, '1', null, '1', null, null, 'Yes', '03-10-2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 1 266 000,00 ', null, '30/06/2017', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('302', null, 'EGT_l_002', '', '1', null, '1', null, '1', null, null, 'Yes', '31/05/2017', null, null, null, '1', null, '9', null, null, null, ' R 245 000,00 ', null, '31/12/2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('303', null, 'EGT_l_003', '', '1', null, '1', null, '1', null, null, 'Yes', '13-06-2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 171 800,00 ', null, '31/12/2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('304', null, 'EGT_l_004', '', '1', null, '1', null, '1', null, null, 'Yes', '22/08/2017', null, null, null, '1', null, '154', null, null, null, ' R 142 450,00 ', null, '28/02/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('305', null, 'EGT_l_005', '', '1', null, '1', null, '1', null, null, 'Yes', '19/06/2017', null, null, null, '1', null, '199', null, null, null, ' R 104 100,00 ', null, '31/12/2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('306', null, 'EGT_l_006', '', '1', null, '1', null, '1', null, null, 'Yes', '11/05/2017', null, null, null, '1', null, '195', null, null, null, ' R 96 000,00 ', null, '28/02/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('307', null, 'EGT_l_007', '', '1', null, '1', null, '1', null, null, 'Yes', '14/06/2016', null, null, null, '1', null, 'N/A', null, null, null, ' R 85 000,00 ', null, '28/02/2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('308', null, 'EGT_l_008', '', '1', null, '1', null, '1', null, null, 'Yes', 'Estimated Sign-off Date 30/01/2018', null, null, null, '1', null, '46', null, null, null, ' R 72 000,00 ', null, '28/02/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('309', null, 'EGT_l_009', '', '1', null, '1', null, '1', null, null, 'Yes', '18/05/2017', null, null, null, '1', null, '91', null, null, null, ' R 66 550,00 ', null, '28/02/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('310', null, 'EGT_l_010', '', '1', null, '1', null, '1', null, null, 'Yes', '20/06/2017', null, null, null, '1', null, '9', null, null, null, ' R 53 300,00 ', null, '28/02/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('311', null, 'EGT_l_011', '', '1', null, '1', null, '1', null, null, 'Yes', '20/07/2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 48 300,00 ', null, '31/03/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('312', null, 'EGT_l_012', '', '1', null, '1', null, '1', null, null, 'Yes', '27/07/2017', null, null, null, '1', null, '19', null, null, null, ' R 47 760,00 ', null, '28/02/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('313', null, 'EGT_l_013', '', '1', null, '1', null, '1', null, null, 'Yes', '16/05/2017', null, null, null, '1', null, '47', null, null, null, ' R 40 925,00 ', null, '28/02/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('314', null, 'EGT_l_014', '', '1', null, '1', null, '1', null, null, 'Yes', '29/06/2017', null, null, null, '1', null, '6', null, null, null, ' R 40 000,00 ', null, '28/02/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('315', null, 'EGT_l_015', '', '1', null, '1', null, '1', null, null, 'Yes', 'Estimated Sign-off 30/11/2017', null, null, null, '1', null, '57', null, null, null, ' R 40 000,00 ', null, '29/02/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('316', null, 'EGT_l_016', '', '1', null, '1', null, '1', null, null, 'Yes', 'Estimated Sign-off Date 30/11/2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 34 650,00 ', null, '28/02/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('317', null, 'EGT_l_017', '', '1', null, '1', null, '1', null, null, 'Yes', '19/06/2017', null, null, null, '1', null, '43', null, null, null, ' R 32 400,00 ', null, '31/12/2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('318', null, 'EGT_l_018', '', '1', null, '1', null, '1', null, null, 'Yes', '31/05/2017', null, null, null, '1', null, '9', null, null, null, ' R 29 850,00 ', null, '31/12/2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('319', null, 'EGT_l_019', '', '1', null, '1', null, '1', null, null, 'Yes', '08/08/2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 26 532,00 ', null, '29/02/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('320', null, 'EGT_l_020', '', '1', null, '1', null, '1', null, null, 'Yes', '09/06/2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 25 410,00 ', null, '31/12/2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('321', null, 'EGT_l_021', '', '1', null, '1', null, '1', null, null, 'Yes', '05/05/2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 23 790,00 ', null, '31/12/2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('322', null, 'EGT_l_022', '', '1', null, '1', null, '1', null, null, 'Yes', '23/08/2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 21 543,86 ', null, '31/03/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('323', null, 'EGT_l_023', '', '1', null, '1', null, '1', null, null, 'Yes', 'Estimated Sign-off Date 15/01/2018', null, null, null, '1', null, '13', null, null, null, ' R 21 400,00 ', null, '28/02/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('324', null, 'EGT_l_024', '', '1', null, '1', null, '1', null, null, 'Yes', '15/09/2017', null, null, null, '1', null, '91', null, null, null, ' R 18 706,45 ', null, '30/06/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('325', null, 'EGT_l_025', '', '1', null, '1', null, '1', null, null, 'Yes', '15/09/2017', null, null, null, '1', null, '8', null, null, null, ' R 18 706,45 ', null, '30/06/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('326', null, 'EGT_l_026', '', '1', null, '1', null, '1', null, null, 'Yes', '15/09/2017', null, null, null, '1', null, '0', null, null, null, ' R 18 338,00 ', null, '31/03/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('327', null, 'EGT_l_027', '', '1', null, '1', null, '1', null, null, 'Yes', '15/09/2017', null, null, null, '1', null, '9', null, null, null, ' R 17 857,70 ', null, '30/06/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('328', null, 'EGT_l_028', '', '1', null, '1', null, '1', null, null, 'Yes', '21/08/2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 17 800,00 ', null, '30/06/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('329', null, 'EGT_l_029', '', '1', null, '1', null, '1', null, null, 'Yes', '15/09/2017', null, null, null, '1', null, '29', null, null, null, ' R 17 484,25 ', null, '30/06/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('330', null, 'EGT_l_030', '', '1', null, '1', null, '1', null, null, 'Yes', '15/09/2017', null, null, null, '1', null, '22', null, null, null, ' R 16 975,00 ', null, '30/06/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('331', null, 'EGT_l_031', '', '1', null, '1', null, '1', null, null, 'Yes', '15/09/2017', null, null, null, '1', null, '29', null, null, null, ' R 16 669,45 ', null, '30/06/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('332', null, 'EGT_l_032', '', '1', null, '1', null, '1', null, null, 'Yes', 'Estimated Sign-off Date 15/01/2018', null, null, null, '1', null, '5', null, null, null, ' R 16 600,00 ', null, '28/02/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('333', null, 'EGT_l_033', '', '1', null, '1', null, '1', null, null, 'Yes', '26/07/2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 16 000,00 ', null, '31/03/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('334', null, 'EGT_l_034', '', '1', null, '1', null, '1', null, null, 'Yes', 'Estimated Sign-off 30/11/2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 15 750,00 ', null, '31/12/2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('335', null, 'EGT_l_035', '', '1', null, '1', null, '1', null, null, 'Yes', '15/09/2017', null, null, null, '1', null, '12', null, null, null, ' R 15 481,20 ', null, '30/06/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('336', null, 'EGT_l_036', '', '1', null, '1', null, '1', null, null, 'Yes', '31/01/2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 15 120,00 ', null, '31/12/2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('337', null, 'EGT_l_037', '', '1', null, '1', null, '1', null, null, 'Yes', '13/09/2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 15 056,00 ', null, '31/03/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('338', null, 'EGT_l_038', '', '1', null, '1', null, '1', null, null, 'Yes', '15/09/2017', null, null, null, '1', null, '26', null, null, null, ' R 14 404,50 ', null, '30/06/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('339', null, 'EGT_l_039', '', '1', null, '1', null, '1', null, null, 'Yes', '15/09/2017', null, null, null, '1', null, '13', null, null, null, ' R 13 095,00 ', null, '30/06/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('340', null, 'EGT_l_040', '', '1', null, '1', null, '1', null, null, 'Yes', '29/06/2017', null, null, null, '1', null, '3', null, null, null, ' R 12 800,00 ', null, '28-02-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('341', null, 'EGT_l_041', '', '1', null, '1', null, '1', null, null, 'Yes', '27/03/2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 12 700,00 ', null, '31/12/2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('342', null, 'EGT_l_042', '', '1', null, '1', null, '1', null, null, 'Yes', '30/05/2017', null, null, null, '1', null, '3', null, null, null, ' R 11 000,00 ', null, '28/02/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('343', null, 'EGT_l_043', '', '1', null, '1', null, '1', null, null, 'Yes', '31/03/2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 11 000,00 ', null, '31/03/2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('344', null, 'EGT_l_044', '', '1', null, '1', null, '1', null, null, 'Yes', '15/09/2017', null, null, null, '1', null, '161', null, null, null, ' R 10 815,50 ', null, '30/06/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('345', null, 'EGT_l_045', '', '1', null, '1', null, '1', null, null, 'Yes', '15/03/2017', null, null, null, '1', null, '3', null, null, null, ' R 10 000,00 ', null, '31/12/2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('346', null, 'EGT_l_046', '', '1', null, '1', null, '1', null, null, 'Yes', '15/05/2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 9 982,50 ', null, '28/02/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('347', null, 'EGT_l_047', '', '1', null, '1', null, '1', null, null, 'Yes', '15/05/2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 9 982,50 ', null, '28/02/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('348', null, 'EGT_l_048', '', '1', null, '1', null, '1', null, null, 'Yes', '15/05/2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 9 982,50 ', null, '28/02/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('349', null, 'EGT_l_049', '', '1', null, '1', null, '1', null, null, 'Yes', '15/05/2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 9 982,00 ', null, '28/02/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('350', null, 'EGT_l_050', '', '1', null, '1', null, '1', null, null, 'Yes', 'Estimated Sign-off Date 15/01/2018', null, null, null, '1', null, 'N/A', null, null, null, ' R 9 700,00 ', null, '29/02/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('351', null, 'EGT_l_051', '', '1', null, '1', null, '1', null, null, 'Yes', '15/05/2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 9 680,00 ', null, '28/02/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('352', null, 'EGT_l_052', '', '1', null, '1', null, '1', null, null, 'Yes', '31/05/2017', null, null, null, '1', null, '62', null, null, null, ' R 9 240,00 ', null, '31/12/2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('353', null, 'EGT_l_053', '', '1', null, '1', null, '1', null, null, 'Yes', '15/05/2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 9 082,50 ', null, '28/02/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('354', null, 'EGT_l_054', '', '1', null, '1', null, '1', null, null, 'Yes', '26/07/2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 8 800,00 ', null, '31/03/2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('355', null, 'EGT_l_055', '', '1', null, '1', null, '1', null, null, 'Yes', '01-05-2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 8 210,53 ', null, '31/12/2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('356', null, 'EGT_l_056', '', '1', null, '1', null, '1', null, null, 'Yes', '16/05/2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 8 200,00 ', null, '31/12/2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('357', null, 'EGT_l_057', '', '1', null, '1', null, '1', null, null, 'Yes', '30/06/2016', null, null, null, '1', null, '119', null, null, null, ' R 7 700,00 ', null, '29/02/2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('358', null, 'EGT_l_058', '', '1', null, '1', null, '1', null, null, 'Yes', '20/07/2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 6 600,00 ', null, '31/03/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('359', null, 'EGT_l_059', '', '1', null, '1', null, '1', null, null, 'Yes', '07-06-2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 4 700,00 ', null, '31/12/2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('360', null, 'EGT_l_060', '', '1', null, '1', null, '1', null, null, 'Yes', '01/08/2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 3 500,00 ', null, '31/03/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('361', null, 'EGT_l_061', '', '1', null, '1', null, '1', null, null, 'Yes', '11/09/2017', null, null, null, '1', null, '0', null, null, null, ' R 1 000,00 ', null, '31/03/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('362', null, 'EGT_l_062', '', '1', null, '1', null, '1', null, null, 'Yes', 'Estimated Sign-off Date 30/11/2017', null, null, null, '1', null, 'N/A', null, null, null, '', null, '28/02/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('365', null, 'DBN_h_002', '', '1', null, '1', null, '1', null, null, 'Yes', '25-08-2017', null, null, null, '1', null, '1005', null, null, null, ' R 250 000,00 ', null, '29/02/2016', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('366', null, 'DBN_h_003', '', '1', null, '1', null, '1', null, null, 'Yes', '26/05/2017', null, null, null, '1', null, '383', null, null, null, ' R 206 875,00 ', null, '29/02/2016', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('367', null, 'DBN_h_004', '', '1', null, '1', null, '1', null, null, 'Yes', '30/06/2017', null, null, null, '1', null, '489', null, null, null, ' R 206 875,00 ', null, '28/02/2017', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('368', null, 'DBN_h_005', '', '1', null, '1', null, '1', null, null, 'Yes', 'Estimate Sign-off Date 30-11-2017', null, null, null, '1', null, '743', null, null, null, ' R 180 000,00 ', null, '30/06/2017', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('369', null, 'DBN_h_006', '', '1', null, '1', null, '1', null, null, 'Yes', 'Estimate Sign-off Date 15-12-2017', null, null, null, '1', null, '>350', null, null, null, ' R 124 000,00 ', null, '30/04/2017', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('370', null, 'DBN_h_007', '', '1', null, '1', null, '1', null, null, 'Yes', '25-08-2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 35 000,00 ', null, '28/02/2017', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('371', null, 'DBN_h_008', '', '1', null, '1', null, '1', null, null, 'Yes', '16-08-2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 31 500,00 ', null, '28/02/2017', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('372', null, 'DBN_h_009', '', '1', null, '1', null, '1', null, null, 'Yes', '25-08-2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 27 500,00 ', null, '28/02/2017', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('373', null, 'DBN_h_010', '', '1', null, '1', null, '1', null, null, 'Yes', '21-08-2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 16 000,00 ', null, '28/02/2017', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('374', null, 'DBN_h_011', '', '1', null, '1', null, '1', null, null, 'Yes', '07-08-2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 11 500,00 ', null, '28/02/2017', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('375', null, 'DBN_h_012', '', '1', null, '1', null, '1', null, null, 'Yes', '02-08-2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 11 500,00 ', null, '28/02/2017', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('376', null, 'DBN_h_013', '', '1', null, '1', null, '1', null, null, 'Yes', '21-08-2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 10 000,00 ', null, '28/02/2017', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('377', null, 'DBN_h_014', '', '1', null, '1', null, '1', null, null, 'Yes', '26-04-2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 9 275,00 ', null, '28/02/2017', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('378', null, 'DBN_h_015', '', '1', null, '1', null, '1', null, null, 'Yes', '29-08-2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 9 000,00 ', null, '28/02/2017', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('379', null, 'DBN_h_016', '', '1', null, '1', null, '1', null, null, 'Yes', '26-04-2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 1 475,00 ', null, '28/02/2017', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('380', null, 'DBN_h_017', '', '1', null, '1', null, '1', null, null, 'Yes', 'Resigned- no audit done', null, null, null, '1', null, '', null, null, null, ' RESIGNED AS AUDITORS  ', null, '30/06/2017', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('381', null, 'DBN_h_018', '', '1', null, '1', null, '1', null, null, 'Yes', 'Estimate Sign-off Date 01-02-2018', null, null, null, '1', null, '523', null, null, null, ' Audit not yet commenced ', null, '28/02/2017', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('382', null, 'DBN_h_019', '', '1', null, '1', null, '1', null, null, 'Yes', 'Estimate Sign-off Date 28-02-2018', null, null, null, '1', null, '589', null, null, null, ' Audit not yet commenced ', null, '28/02/2017', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('383', null, 'DBN_h_020', '', '1', null, '1', null, '1', null, null, 'Yes', 'Estimate Sign-off Date 28-02-2018', null, null, null, '1', null, '1500', null, null, null, ' Audit in progress ', null, '30/06/2017', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('384', null, 'DBN_h_021', '', '1', null, '1', null, '1', null, null, 'Yes', 'Estimate Sign-off Date 28-02-2018', null, null, null, '1', null, '94', null, null, null, ' Audit in progress ', null, '30/06/2017', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('385', null, 'DBN_h_022', '', '1', null, '1', null, '1', null, null, 'Yes', 'Estimate Sign-off Date 28-02-2018', null, null, null, '1', null, '92', null, null, null, ' Audit in progress ', null, '30/06/2017', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('386', null, 'DBN_h_023', '', '1', null, '1', null, '1', null, null, 'Yes', 'Estimate Sign-off Date 28-02-2018', null, null, null, '1', null, '107', null, null, null, ' Audit in progress ', null, '30/06/2017', null, null, null, null, null, 'High', null, 'No', '56');
INSERT INTO `engagements` VALUES ('388', null, 'DBN_l_002', '', '1', null, '1', null, '1', null, null, 'Yes', 'Estimate Sign-off Date 28-02-2018', null, null, null, '1', null, '15', null, null, null, ' not yet billed ', null, '28-02-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('402', null, 'DBN_l_001', '', '1', null, '1', null, '1', null, null, 'Yes', 'Estimate Sign-off Date 28-02-2018', null, null, null, '1', null, '43', null, null, null, ' work not yet commenced ', null, '28-02-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('389', null, 'DBN_l_005', '', '1', null, '1', null, '1', null, null, 'Yes', '15-09-2017', null, null, null, '1', null, 'N/A', null, null, null, ' not yet billed ', null, '28-02-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('390', null, 'DBN_l_015', '', '1', null, '1', null, '1', null, null, 'Yes', '27-07-2017', null, null, null, '1', null, 'N/A', null, null, null, ' no charge ', null, '30/04/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('391', null, 'DBN_l_017', '', '1', null, '1', null, '1', null, null, 'Yes', '14-08-2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 164 000,00 ', null, '30/04/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('392', null, 'DBN_l_023', '', '1', null, '1', null, '1', null, null, 'Yes', '08-08-2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 52 500,00 ', null, '28-02-2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('393', null, 'DBN_l_028', '', '1', null, '1', null, '1', null, null, 'Yes', '29-06-2017', null, null, null, '1', null, '138', null, null, null, ' R 32 500,00 ', null, '31-12-2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('394', null, 'DBN_l_031', '', '1', null, '1', null, '1', null, null, 'Yes', '31-08-2017', null, null, null, '1', null, '26', null, null, null, ' R 25 000,00 ', null, '28-02-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('395', null, 'DBN_l_032', '', '1', null, '1', null, '1', null, null, 'Yes', '20-03-2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 22 000,00 ', null, '31-03-2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('396', null, 'DBN_l_035', '', '1', null, '1', null, '1', null, null, 'Yes', '16-08-2017', null, null, null, '1', null, '10', null, null, null, ' R 12 100,00 ', null, '28-02-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('397', null, 'DBN_l_039', '', '1', null, '1', null, '1', null, null, 'Yes', '22 June 2017', null, null, null, '1', null, '19', null, null, null, ' R 9 000,00 ', null, '31/12/2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('398', null, 'DBN_l_040', '', '1', null, '1', null, '1', null, null, 'Yes', '05-07-2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 7 000,00 ', null, '28-02-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('399', null, 'DBN_l_041', '', '1', null, '1', null, '1', null, null, 'Yes', '05-07-2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 6 300,00 ', null, '28-02-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('400', null, 'DBN_l_042', '', '1', null, '1', null, '1', null, null, 'Yes', '21-04-2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 4 500,00 ', null, '28-02-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('449', null, 'BLM_l_001', '', '1', null, '1', null, '1', null, null, 'Yes', '12/07/2017', null, null, null, '1', null, '56', null, null, null, ' R 65 034,44 ', null, '30-04-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('403', null, 'DBN_l_002', '', '1', null, '1', null, '1', null, null, 'Yes', 'Estimate Sign-off Date 28-02-2018', null, null, null, '1', null, '15', null, null, null, ' not yet billed ', null, '28-02-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('404', null, 'DBN_l_003', '', '1', null, '1', null, '1', null, null, 'Yes', 'Estimate Sign-off Date 28-02-2018', null, null, null, '1', null, '26', null, null, null, ' not yet billed ', null, '29-02-2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('405', null, 'DBN_l_004', '', '1', null, '1', null, '1', null, null, 'Yes', 'Estimate Sign-off Date 28-02-2018', null, null, null, '1', null, '11', null, null, null, ' not yet billed ', null, '29-02-2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('406', null, 'DBN_l_005', '', '1', null, '1', null, '1', null, null, 'Yes', '15-09-2017', null, null, null, '1', null, 'N/A', null, null, null, ' not yet billed ', null, '28-02-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('407', null, 'DBN_l_006', '', '1', null, '1', null, '1', null, null, 'Yes', 'Estimate Sign-off Date 28-02-2018', null, null, null, '1', null, '7', null, null, null, ' not yet billed ', null, '28-02-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('408', null, 'DBN_l_007', '', '1', null, '1', null, '1', null, null, 'Yes', 'Estimate Sign-off Date 28-02-2018', null, null, null, '1', null, '16', null, null, null, ' not yet billed ', null, '28-02-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('409', null, 'DBN_l_008', '', '1', null, '1', null, '1', null, null, 'Yes', 'Estimate Sign-off Date 28-02-2018', null, null, null, '1', null, '7', null, null, null, ' not yet billed ', null, '29/02/2019', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('410', null, 'DBN_l_009', '', '1', null, '1', null, '1', null, null, 'Yes', 'Estimate Sign-off Date 28-02-2018', null, null, null, '1', null, '15', null, null, null, ' not yet billed ', null, '28-02-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('411', null, 'DBN_l_010', '', '1', null, '1', null, '1', null, null, 'Yes', 'Estimate Sign-off Date 28-02-2018', null, null, null, '1', null, '14', null, null, null, ' not yet billed ', null, '28-02-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('412', null, 'DBN_l_011', '', '1', null, '1', null, '1', null, null, 'Yes', 'Estimate Sign-off Date 28-02-2018', null, null, null, '1', null, '7', null, null, null, ' not yet billed ', null, '28-02-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('413', null, 'DBN_l_012', '', '1', null, '1', null, '1', null, null, 'Yes', 'Estimate Sign-off Date 28-02-2018', null, null, null, '1', null, '18', null, null, null, ' not yet billed ', null, '28-02-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('414', null, 'DBN_l_013', '', '1', null, '1', null, '1', null, null, 'Yes', 'Estimate Sign-off Date 31-01-2018', null, null, null, '1', null, '54', null, null, null, ' Not yet billed ', null, '29/02/2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('415', null, 'DBN_l_014', '', '1', null, '1', null, '1', null, null, 'Yes', 'Estimate Sign-off Date 31-01-2018', null, null, null, '1', null, '26', null, null, null, ' Not yet billed ', null, '29/02/2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('416', null, 'DBN_l_015', '', '1', null, '1', null, '1', null, null, 'Yes', '27-07-2017', null, null, null, '1', null, 'N/A', null, null, null, ' no charge ', null, '30/04/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('417', null, 'DBN_l_016', '', '1', null, '1', null, '1', null, null, 'Yes', 'Estimate Sign-off Date 28-02-2018', null, null, null, '1', null, '68', null, null, null, ' in progress ', null, '30-06-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('418', null, 'DBN_l_017', '', '1', null, '1', null, '1', null, null, 'Yes', '14-08-2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 164 000,00 ', null, '30/04/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('419', null, 'DBN_l_018', '', '1', null, '1', null, '1', null, null, 'Yes', '03-10-2017', null, null, null, '1', null, '330', null, null, null, ' R 140 000,00 ', null, '28-02-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('420', null, 'DBN_l_019', '', '1', null, '1', null, '1', null, null, 'Yes', '31-08-2017', null, null, null, '1', null, '291', null, null, null, ' R 125 000,00 ', null, '31/12/2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('421', null, 'DBN_l_020', '', '1', null, '1', null, '1', null, null, 'Yes', '31-08-2017', null, null, null, '1', null, '135', null, null, null, ' R 66 000,00 ', null, '31/12/2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('422', null, 'DBN_l_021', '', '1', null, '1', null, '1', null, null, 'Yes', '11-07-2017', null, null, null, '1', null, '82', null, null, null, ' R 60 000,00 ', null, '28-02-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('423', null, 'DBN_l_022', '', '1', null, '1', null, '1', null, null, 'Yes', '11-07-2017', null, null, null, '1', null, '31', null, null, null, ' R 56 000,00 ', null, '28-02-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('424', null, 'DBN_l_023', '', '1', null, '1', null, '1', null, null, 'Yes', '08-08-2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 52 500,00 ', null, '28-02-2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('425', null, 'DBN_l_024', '', '1', null, '1', null, '1', null, null, 'Yes', '17-02-2017', null, null, null, '1', null, '237', null, null, null, ' R 50 000,00 ', null, '29-02-2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('426', null, 'DBN_l_025', '', '1', null, '1', null, '1', null, null, 'Yes', 'Estimate Sign-off Date 15-12-2017', null, null, null, '1', null, '320', null, null, null, ' R 48 000,00 ', null, '28-02-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('427', null, 'DBN_l_026', '', '1', null, '1', null, '1', null, null, 'Yes', '17-07-2017', null, null, null, '1', null, '96', null, null, null, ' R 45 000,00 ', null, '28-02-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('428', null, 'DBN_l_027', '', '1', null, '1', null, '1', null, null, 'Yes', '25-10-2017', null, null, null, '1', null, '41', null, null, null, ' R 34 500,00 ', null, '30/06/2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('429', null, 'DBN_l_028', '', '1', null, '1', null, '1', null, null, 'Yes', '29-06-2017', null, null, null, '1', null, '138', null, null, null, ' R 32 500,00 ', null, '31-12-2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('430', null, 'DBN_l_029', '', '1', null, '1', null, '1', null, null, 'Yes', 'Estimate Sign-off Date 15-12-2017', null, null, null, '1', null, '8', null, null, null, ' R 30 000,00 ', null, '28-02-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('431', null, 'DBN_l_030', '', '1', null, '1', null, '1', null, null, 'Yes', 'Estimate Sign-off Date 15-12-2017', null, null, null, '1', null, '13', null, null, null, ' R 30 000,00 ', null, '28-02-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('432', null, 'DBN_l_031', '', '1', null, '1', null, '1', null, null, 'Yes', '31-08-2017', null, null, null, '1', null, '26', null, null, null, ' R 25 000,00 ', null, '28-02-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('433', null, 'DBN_l_032', '', '1', null, '1', null, '1', null, null, 'Yes', '20-03-2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 22 000,00 ', null, '31-03-2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('434', null, 'DBN_l_033', '', '1', null, '1', null, '1', null, null, 'Yes', '29-06-2017', null, null, null, '1', null, '36', null, null, null, ' R 16 500,00 ', null, '29/02/2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('435', null, 'DBN_l_034', '', '1', null, '1', null, '1', null, null, 'Yes', 'Estimate Sign-off Date 15-12-2017', null, null, null, '1', null, '13', null, null, null, ' R 15 350,00 ', null, '28-02-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('436', null, 'DBN_l_035', '', '1', null, '1', null, '1', null, null, 'Yes', '16-08-2017', null, null, null, '1', null, '10', null, null, null, ' R 12 100,00 ', null, '28-02-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('437', null, 'DBN_l_036', '', '1', null, '1', null, '1', null, null, 'Yes', 'Estimate Sign-off Date 15-12-2017', null, null, null, '1', null, '7', null, null, null, ' R 11 000,00 ', null, '28-02-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('438', null, 'DBN_l_037', '', '1', null, '1', null, '1', null, null, 'Yes', '11-06-2017', null, null, null, '1', null, '27', null, null, null, ' R 11 000,00 ', null, '28-02-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('439', null, 'DBN_l_038', '', '1', null, '1', null, '1', null, null, 'Yes', '07-07-2017', null, null, null, '1', null, '28', null, null, null, ' R 9 350,00 ', null, '28-02-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('440', null, 'DBN_l_039', '', '1', null, '1', null, '1', null, null, 'Yes', '22 June 2017', null, null, null, '1', null, '19', null, null, null, ' R 9 000,00 ', null, '31/12/2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('441', null, 'DBN_l_040', '', '1', null, '1', null, '1', null, null, 'Yes', '05-07-2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 7 000,00 ', null, '28-02-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('442', null, 'DBN_l_041', '', '1', null, '1', null, '1', null, null, 'Yes', '05-07-2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 6 300,00 ', null, '28-02-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('443', null, 'DBN_l_042', '', '1', null, '1', null, '1', null, null, 'Yes', '21-04-2017', null, null, null, '1', null, 'N/A', null, null, null, ' R 4 500,00 ', null, '28-02-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('444', null, 'DBN_l_043', '', '1', null, '1', null, '1', null, null, 'Yes', '10-02-2017', null, null, null, '1', null, '3', null, null, null, ' R 3 630,00 ', null, '29-02-2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('445', null, 'DBN_l_044', '', '1', null, '1', null, '1', null, null, 'Yes', '10-02-2017', null, null, null, '1', null, '12', null, null, null, ' R 3 630,00 ', null, '29-02-2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('446', null, 'DBN_l_045', '', '1', null, '1', null, '1', null, null, 'Yes', '10-02-2017', null, null, null, '1', null, '5', null, null, null, ' R 3 300,00 ', null, '29-02-2016', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('447', null, 'DBN_l_046', '', '1', null, '1', null, '1', null, null, 'Yes', '17-07-2017', null, null, null, '1', null, '6', null, null, null, ' R 3 000,00 ', null, '28-02-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('450', null, 'BLM_l_002', '', '1', null, '1', null, '1', null, null, 'Yes', '03/07/2017', null, null, null, '1', null, '62', null, null, null, ' R 50 228,28 ', null, '30-04-2017', null, null, null, null, null, 'Low', null, 'No', '56');
INSERT INTO `engagements` VALUES ('451', null, 'BLM_l_003', '', '1', null, '1', null, '1', null, null, 'Yes', '12/07/2017', null, null, null, '1', null, '58', null, null, null, ' R 34 879,75 ', null, '30-04-2017', null, null, null, null, null, 'Low', null, 'No', '56');

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
INSERT INTO `services` VALUES ('29', '08/01/2018', 'N/A', '1', 'N/A');

-- ----------------------------
-- Table structure for `sites`
-- ----------------------------
DROP TABLE IF EXISTS `sites`;
CREATE TABLE `sites` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `site_name` varchar(255) DEFAULT NULL,
  `active_status` varchar(22) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sites
-- ----------------------------
INSERT INTO `sites` VALUES ('1', 'Johannesburg', '1');
INSERT INTO `sites` VALUES ('2', 'Durban', '1');
INSERT INTO `sites` VALUES ('3', 'Stanger', '1');
INSERT INTO `sites` VALUES ('4', 'Pretoria', '1');
INSERT INTO `sites` VALUES ('5', 'Port Elizabeth', '1');
INSERT INTO `sites` VALUES ('6', 'Alberton', '1');
INSERT INTO `sites` VALUES ('7', 'North West', '1');
INSERT INTO `sites` VALUES ('8', 'Cape Town', '1');
INSERT INTO `sites` VALUES ('9', 'Bloemfontein', '1');

-- ----------------------------
-- Table structure for `test`
-- ----------------------------
DROP TABLE IF EXISTS `test`;
CREATE TABLE `test` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `date` varchar(255) DEFAULT NULL,
  `company_name` text,
  `company_reg_number` varchar(255) DEFAULT NULL,
  `industry` varchar(255) DEFAULT NULL,
  `company_child` varchar(255) DEFAULT NULL,
  `relationship_owner` varchar(255) DEFAULT NULL,
  `active_status` varchar(255) DEFAULT '1',
  `engagement_stage` varchar(255) DEFAULT '0',
  `engagement_status` varchar(255) DEFAULT '0',
  `child_option` varchar(255) DEFAULT NULL,
  `parent_number` varchar(255) DEFAULT NULL,
  `child_reg_number` varchar(255) DEFAULT NULL,
  `company_parents_state` varchar(255) DEFAULT '0',
  `ref` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=769 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of test
-- ----------------------------
INSERT INTO `test` VALUES ('1', null, 'Acajou (Pty) Ltd', 'Acajou (Pty) Ltd', null, null, 'Mungofa B.', '1', '0', '1', null, null, null, '0', 'SNH_l_011', 'Johannesburg');
INSERT INTO `test` VALUES ('388', null, 'Accredited Investments (Pty) Ltd', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('389', null, 'Advanced Terminations and Joints (Pty) Ltd', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('390', null, 'Africabio NPC', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('391', null, 'African World Heritage Fund', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('392', null, 'Agence Francaise De Developpment Project Preparation and Feasibility Studies', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('393', null, 'Agulhas Wetlands', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('394', null, 'ALBERANTE-RANDHART STEERING COMMITTEE (SECT 21)', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('395', null, 'ALBERTON TUISTE VIR BEJAARDES', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('396', null, 'ALBERTON TUISTE VIR BEJAARDES (ASSOCIATION INC UNDER SECTION 21)', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('397', null, 'Albou Trust', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('398', null, 'Albou Trust', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('399', null, 'Alchemist House (Pty) Ltd T/A Fleet Connect', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('400', null, 'AL-CLAD INTERIOR SYSTEMS (PTY) LTD', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('401', null, 'Altamonte Investments (Pty) Ltd', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('402', null, 'Amada Asset Management (Pty) Ltd', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('403', null, 'Anglo Inyosi Coal Community Development Trust', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('404', null, 'Apparel Industries (Pty) Ltd', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('405', null, 'Aquarella Investments 224 (Pty) Ltd', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('406', null, 'Araf Industries (Pty) Ltd 2016', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('407', null, 'Araf Industries (Pty) Ltd 2017', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('408', null, 'Argon Securities', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('409', null, 'Asmall & Sons (Pty) Ltd', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('410', null, 'Attacq Group ESD (Pty) Ltd', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('411', null, 'Auditor General Work- contracted out- Umgeni water', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('412', null, 'Autumn Star Trading 100 (Pty) Ltd', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('413', null, 'Basadi Ba Kopane Investment (Pty) Ltd', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('414', null, 'BEAUFORT WEST MUSEUM', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('415', null, 'Bekker Prokureurs', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('416', null, 'BELHAR ISLAMIC PRIMARY SCHOOL', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('417', null, 'BESSEMER AFRICA (PTY) LTD', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('418', null, 'BESSEMER BELANGE (PTY) LTD', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('419', null, 'Biarritz Investments (Pty) Ltd', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('420', null, 'Bizhub Highveld Lions', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('421', null, 'Blue Shirt Bakery (Pty) Ltd', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('422', null, 'BODY CORPORATE HILLBROW COMMUNITY CENTRE', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('423', null, 'BODY CORPORATE THE BALINESE', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('424', null, 'BOLAND CRICKET BOARD', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('425', null, 'Borbartia (Pty) Ltd', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('426', null, 'BREDASDORP MUSEUM', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('427', null, 'CARBONADO ENERGY (PTY) LTD', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('428', null, 'Casa Luigi Properties (Pty) Ltd', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('429', null, 'Casa Mia Body Corporate', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('430', null, 'Centaur De Roodepoort ', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('431', null, 'Centaur Mining South Africa ', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('432', null, 'CENTRAL AFRICAN ROAD SERVICES (PTY) LTD', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('433', null, 'Central Cricket Franchise (Pty) Ltd', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('434', null, 'CENTRAL GAUTENG GYMNASTICS ASSOCIATION', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('435', null, 'CHAFEKER & SHABODIEN INC', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('436', null, 'CHRISTELIKE MAATSKAPLIKE RAAD ALBERTON', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('437', null, 'CHRISTELIKE MAATSKAPLIKE RAAD STANDERTON', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('438', null, 'Cilbar and Company', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('439', null, 'COMMERCIAL MINING WEARPARTS (PTY) LTD', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('440', null, 'Cricket South Africa', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('441', null, 'C-Track SA (Pty) Limited', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('442', null, 'Darnall Motor Transport (Pty) Ltd', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('443', null, 'DE VRIES INCORPORATED', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('444', null, 'Dealernet (Pty) Ltd', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('445', null, 'Dealfin (Pty) Ltd', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('446', null, 'Debbie Pillay Attorneys', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('447', null, 'Desert Star Trading 109 (Pty) Ltd', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('448', null, 'Development Bank of South Africa', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('449', null, 'DIE CHRISTELIKE MAATSKAPLIKE RAAD RING VAN HEIDELBERG', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('450', null, 'DigiCore Electronics (Pty) Ltd', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('451', null, 'DigiCore Financial Services (Pty) Ltd ', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('452', null, 'DigiCore Fleet Management SA (Pty) Ltd', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('453', null, 'Digicore Holdings Limited', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('454', null, 'DigiCore Management Services (Pty) Ltd', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('455', null, 'DigiCore Properties (Pty) Ltd ', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('456', null, 'Dr Alberts, Bouwer & Jordaan Incorporated', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('457', null, 'DRIES VAN DER WALT FINANSIELE DIENSTE', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('458', null, 'Drs Thomson Brittain and Partners', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('459', null, 'Drs Thomson Brittain and Partners', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('460', null, 'Dusty Moon Investments 43 (Pty) Ltd', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('461', null, 'Dusty Moon Investments 43 (Pty) Ltd', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('462', null, 'Eastern Cricket', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('463', null, 'Easy Vortex Financial Wellness (Pty) Ltd', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('464', null, 'EC- WFtC- Addo National Park - Woody Section (15/18)', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('465', null, 'EKHAYA NEIGHBURHOOD CITY IMPROVEMENT DISTRICT (SECT 21)', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('466', null, 'Environmental Monitors 2016 / 19', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('467', null, 'Etana Holdings', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('468', null, 'F.H. Ali - Business account', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('469', null, 'F.H. Ali - Estate Agent Trust Account - dormant', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('470', null, 'Factodex (Pty) Ltd', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('471', null, 'Fashion Fusion Distribution (Pty) Ltd', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('472', null, 'Fashion Fusion Traders (Pty) Ltd', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('473', null, 'Firebush Investments (Pty) Ltd', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('474', null, 'Firewood Investments (Pty) Ltd', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('475', null, 'Fivaz Incorporated', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('476', null, 'FONTAINEBLEAU GEMEENSKAPSKERK', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('477', null, 'Free State Cricket NPC', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('478', null, 'Freedom Stationery (Pty) Ltd', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('479', null, 'Friedshelf 1571 (Pty) Ltd', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('480', null, 'GALAXY JUWELERS (PTY) LTD', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('481', null, 'GANGEN ATTORNEYS', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('482', null, 'Gauteng Cricket Board', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('483', null, 'Gayatri Cans (Pty) Ltd ', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('484', null, 'Gayatri Cans (Pty) Ltd ', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('485', null, 'Gayatri Paper Mill (Pty) Ltd ', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('486', null, 'Gayatri Paper Mill (Pty) Ltd ', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('487', null, 'Gayatri Paper Mill Gauteng (Pty) Ltd  ', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('488', null, 'Gayatri Paper Mill Gauteng (Pty) Ltd  ', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('489', null, 'Golden Era Printers & Stationers Bops (Pty) Ltd ', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('490', null, 'Golden Era Printers & Stationers Bops (Pty) Ltd ', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('491', null, 'Golden Gate Higlands National Park  Working for Wetlands', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('492', null, 'Greene Consulting Engineers (Pty) Ltd', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('493', null, 'Griqua Diamonds (Pty) Ltd t/a Northern Cape Cricket (Pty) Ltd', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('494', null, 'Ground Lily Investments (Pty) Ltd ', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('495', null, 'Haupt Earle & Vennote Attorneys', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('496', null, 'Hazsons Holdings Shareblock (Pty) Ltd', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('497', null, 'Hiconnex (Pty) Ltd', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('498', null, 'Hiconnex Communications (Pty) Ltd', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('499', null, 'Hiconnex Industrials (Pty) Ltd', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('500', null, 'Highgrowth Investments (Pty) Ltd', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('501', null, 'Hollard Behold (Cresta Properties) (Pty) Ltd', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('502', null, 'Hollard Business Associates (Pty) Ltd', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('503', null, 'Hollard Dealer Partners (Pty) Ltd', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('504', null, 'Hollard Investment Managers (Pty) Ltd', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('505', null, 'Hollard Life Properties (Pty) Ltd ', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('506', null, 'Hollard Portfolio (Pty) Ltd', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('507', null, 'HUGUENOT MEMORIAL MUSEUM', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('508', null, 'Hussun Goga & Company Attorney', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('509', null, 'Ice Blue Clothing (Pty) Ltd', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('510', null, 'Independent Power Producer office', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('511', null, 'Industrial Parks Revitalisation Programme (DTI)', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('512', null, 'Integrated Fare Collection Services (Pty) Ltd ', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('513', null, 'Intekom', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('514', null, 'Irfan Trading', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('515', null, 'Islamic Guidance Trust ', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('516', null, 'Izingwe Aberdare Cables (Pty) Ltd', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('517', null, 'Izingwe Cable Investments (Pty) Ltd', null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('518', null, null, null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('519', null, null, null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('520', null, null, null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('521', null, null, null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('522', null, null, null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('523', null, null, null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('524', null, null, null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('525', null, null, null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('526', null, null, null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('527', null, null, null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('528', null, null, null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('529', null, null, null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('530', null, null, null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('531', null, null, null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('532', null, null, null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('533', null, null, null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('534', null, null, null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('535', null, null, null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('536', null, null, null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('537', null, null, null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('538', null, null, null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('539', null, null, null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('540', null, null, null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('541', null, null, null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);
INSERT INTO `test` VALUES ('542', null, null, null, null, null, null, '1', '0', '0', null, null, null, '0', null, null);

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
-- Table structure for `uploads`
-- ----------------------------
DROP TABLE IF EXISTS `uploads`;
CREATE TABLE `uploads` (
  `a` varchar(255) DEFAULT NULL,
  `b` varchar(255) DEFAULT NULL,
  `c` varchar(255) DEFAULT NULL,
  `d` varchar(255) DEFAULT NULL,
  `e` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of uploads
-- ----------------------------
INSERT INTO `uploads` VALUES ('', 'Audit Fee', 'Period end of AFS (Month & Year)', 'Date Opinion was signed', 'PI Score');
INSERT INTO `uploads` VALUES ('BLM_l_001', ' R 65 034,44 ', '30-04-2017', '12/07/2017', '56');
INSERT INTO `uploads` VALUES ('BLM_l_002', ' R 50 228,28 ', '30-04-2017', '03/07/2017', '62');
INSERT INTO `uploads` VALUES ('BLM_l_003', ' R 34 879,75 ', '30-04-2017', '12/07/2017', '58');

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
  `date_qualified` varchar(255) DEFAULT NULL,
  `date_of_first_registration_with_irba` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', '03/01/2018', 'Takunda', 'Chibanda', 'admin', 'admin', 'tgchibanda@gmail.com', 'Nkonki', '1', 'South Africa', '712563214', 'Administrator', 'CA(SA)', '1', '00', null, '00');
INSERT INTO `users` VALUES ('2', '04/01/2018', 'Mitesh', 'Patel', 'mitesh', 'password', 'admin@nkonki.com', 'Nkonki', '1', 'South Africa', '721225415', 'Auditor', 'CA(SA)', '1', '841161', null, '22/01/2003');
INSERT INTO `users` VALUES ('24', '08/01/2018', 'Thuto', 'Masasa', 'thuto', 'password', 'admin@nkonki.com', 'Nkonki', '1', 'South Africa', '712563215', 'Auditor', 'CA(SA)', '1', '506223', null, '26/11/2012');
INSERT INTO `users` VALUES ('26', '04/01/2018', 'Steven', 'Firer', 'steven', 'password', 'admin@nkonki.com', 'Nkonki', '1', 'South Africa', '712563215', 'Auditor', 'CA(SA)', '1', '175463', null, '26/04/1989');
INSERT INTO `users` VALUES ('27', '04/01/2018', 'Emma', 'Mashilwane', 'emma', 'password', 'admin@nkonki.com', 'Nkonki', '1', 'South Africa', '712563215', 'Auditor', 'CA(SA)', '1', '883883', null, '20/04/2012');
INSERT INTO `users` VALUES ('28', '04/01/2018', 'Brian', 'Mungofa', 'brian', 'password', 'admin@nkonki.com', 'Nkonki', '1', 'South Africa', '712563215', 'Auditor', 'CA(SA)', '1', '502029', null, '11/03/2009');
INSERT INTO `users` VALUES ('29', '04/01/2018', 'Nyarai', 'Muzarewetu', 'nyarai', 'password', 'admin@nkonki.com', 'Nkonki', '1', 'South Africa', '712563215', 'Auditor', 'CA(SA)', '1', '507141', null, '01/04/2009');
INSERT INTO `users` VALUES ('30', '04/01/2018', 'Sangeeta', 'Kallen', 'sangeeta', 'password', 'admin@nkonki.com', 'Nkonki', '1', 'South Africa', '712563215', 'Auditor', 'CA(SA)', '1', '503514', null, '28/01/2009');
INSERT INTO `users` VALUES ('31', '04/01/2018', 'Kiran', 'Bhika', 'kiran', 'password', 'admin@nkonki.com', 'Nkonki', '1', 'South Africa', '712563215', 'Auditor', 'CA(SA)', '1', '803669', null, '30/09/2013');
INSERT INTO `users` VALUES ('32', '04/01/2018', 'Ahmed', 'Pandor', 'ahmed', 'password', 'admin@nkonki.com', 'Nkonki', '1', 'South Africa', '712563215', 'Auditor', 'CA(SA)', '1', '786837', null, '30/09/2013');
INSERT INTO `users` VALUES ('33', '04/01/2018', 'Yongama', 'Madolo', 'yongama', 'password', 'admin@nkonki.com', 'Nkonki', '1', 'South Africa', '712563215', 'Auditor', 'CA(SA)', '1', '736547', null, '07/6/2016');
INSERT INTO `users` VALUES ('34', '04/01/2018', 'Ghitesh', 'Deva', 'ghitesh', 'password', 'admin@nkonki.com', 'Nkonki', '1', 'South Africa', '712563215', 'Auditor', 'CA(SA)', '1', '797634', null, '03/02/2016');
INSERT INTO `users` VALUES ('35', null, 'Mungofa', 'B.', null, null, null, null, '1', null, null, 'Auditor', null, '0', 'N/A', null, null);
INSERT INTO `users` VALUES ('36', null, 'Kallen', 'S.', null, null, null, null, null, null, null, 'Auditor', null, '0', 'N/A', null, null);
INSERT INTO `users` VALUES ('37', null, 'Muzarewetu', 'N.', null, null, null, null, null, null, null, 'Auditor', null, '0', 'N/A', null, null);
INSERT INTO `users` VALUES ('38', null, 'Masasa', 'T.', null, null, null, null, null, null, null, 'Auditor', null, '0', 'N/A', null, null);
INSERT INTO `users` VALUES ('39', null, 'Amaanullah ', 'Ayub', null, null, null, null, null, null, null, 'Auditor', null, '0', 'N/A', null, null);
INSERT INTO `users` VALUES ('40', null, 'H', 'Lotter', null, null, null, null, null, null, null, 'Auditor', null, '0', 'N/A', null, null);
INSERT INTO `users` VALUES ('41', null, 'RP', 'Goldes', null, null, null, null, null, null, null, 'Auditor', null, '0', 'N/A', null, null);
INSERT INTO `users` VALUES ('42', null, 'S', 'Prinsloo', null, null, null, null, null, null, null, 'Auditor', null, '0', 'N/A', null, null);
INSERT INTO `users` VALUES ('43', null, 'Helga', 'Lotter', null, null, null, null, null, null, null, 'Auditor', null, '0', 'N/A', null, null);
INSERT INTO `users` VALUES ('44', null, 'J', 'de Viliers', null, null, null, null, null, null, null, 'Auditor', null, '0', 'N/A', null, null);
INSERT INTO `users` VALUES ('45', null, 'S', 'Prinsloo', null, null, null, null, null, null, null, 'Auditor', null, '0', 'N/A', null, null);
INSERT INTO `users` VALUES ('46', null, 'IJ', 'de Villiers', null, null, null, null, null, null, null, 'Auditor', null, '0', 'N/A', null, null);
INSERT INTO `users` VALUES ('47', null, 'M.A', 'Motala', null, null, null, null, null, null, null, 'Auditor', null, '0', 'N/A', null, null);
INSERT INTO `users` VALUES ('48', null, 'F.A.S', 'Haffejee', null, null, null, null, null, null, null, 'Auditor', null, '0', 'N/A', null, null);
INSERT INTO `users` VALUES ('49', null, 'Y.M', 'Paruk', null, null, null, null, null, null, null, 'Auditor', null, '0', 'N/A', null, null);
INSERT INTO `users` VALUES ('50', null, 'M.', 'Haffejee', null, null, null, null, null, null, null, 'Auditor', null, '0', 'N/A', null, null);
INSERT INTO `users` VALUES ('51', null, 'R.', 'Timol', null, null, null, null, null, null, null, 'Auditor', null, '0', 'N/A', null, null);
INSERT INTO `users` VALUES ('52', null, 'J.', 'Jamal', null, null, null, null, null, null, null, 'Auditor', null, '0', 'N/A', null, null);
INSERT INTO `users` VALUES ('53', null, 'Julia', 'van Wyk', null, null, null, null, null, null, null, 'Auditor', null, '0', 'N/A', null, null);
INSERT INTO `users` VALUES ('56', null, 'N/', 'A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', null, null, null, '1', 'N/A', null, null);

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
-- View structure for `all clients`
-- ----------------------------
DROP VIEW IF EXISTS `all clients`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `all clients` AS select `clients`.`company_name` AS `company_name`,`clients`.`relationship_owner` AS `relationship_owner`,`clients`.`ref` AS `ref`,`clients`.`city` AS `city` from `clients`;

-- ----------------------------
-- View structure for `assurance`
-- ----------------------------
DROP VIEW IF EXISTS `assurance`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `assurance` AS select `clients`.`company_name` AS `Client_Name`,`engagements`.`group_structure` AS `Group_Structure`,`clients`.`company_reg_number` AS `Client_CIPC`,`engagements`.`companies_act` AS `Companies_Act`,`engagements`.`irba_code` AS `IRBA_Code`,`engagements`.`isqc_1` AS `ISQC_1`,`engagements`.`isqc_2` AS `ISQC_2`,`engagements`.`assurance_work` AS `Assurance_Work`,`engagements`.`amount_billed` AS `Amount_Billed`,`engagements`.`jse_listed` AS `JSE_Listed`,`clients`.`industry` AS `Industry`,`engagements`.`year_of_afs` AS `Period_end_of_AFS`,`engagements`.`date_resigned` AS `Date_Opinion_was_signed`,`clients`.`relationship_owner` AS `Partner`,`engagements`.`when_next_irba` AS `Next_IRBA`,`engagements`.`accounting_framework` AS `Accounting_Framework`,`engagements`.`client_turnover` AS `Client_Turnover` from (`clients` join `engagements`) where ((`clients`.`ref` = `engagements`.`client`) and (`clients`.`engagement_status` = _latin1'1') and (`clients`.`active_status` = _latin1'1'));

-- ----------------------------
-- View structure for `irba`
-- ----------------------------
DROP VIEW IF EXISTS `irba`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `irba` AS select `clients`.`ref` AS `No`,`clients`.`company_name` AS `Client_Name`,`engagements`.`amount_billed` AS `Audit_Fee`,`engagements`.`year_of_afs` AS `Period_end_of_AFS`,`engagements`.`date_resigned` AS `Date_Opinion_was_signed`,`engagements`.`companies_act` AS `PI_Score`,`clients`.`relationship_owner` AS `Partner`,`engagements`.`risk` AS `Risk`,`clients`.`city` AS `City` from (`clients` join `engagements`) where ((`clients`.`ref` = `engagements`.`client`) and (`clients`.`engagement_status` = _latin1'1') and (`clients`.`active_status` = _latin1'1'));
