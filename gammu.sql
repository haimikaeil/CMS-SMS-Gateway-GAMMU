/*
 Navicat Premium Data Transfer

 Source Server         : LOKAL
 Source Server Type    : MySQL
 Source Server Version : 100422
 Source Host           : localhost:3306
 Source Schema         : gammu

 Target Server Type    : MySQL
 Target Server Version : 100422
 File Encoding         : 65001

 Date: 11/08/2022 13:31:28
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for daemons
-- ----------------------------
DROP TABLE IF EXISTS `daemons`;
CREATE TABLE `daemons`  (
  `Start` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Info` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of daemons
-- ----------------------------

-- ----------------------------
-- Table structure for gammu
-- ----------------------------
DROP TABLE IF EXISTS `gammu`;
CREATE TABLE `gammu`  (
  `Version` int NOT NULL DEFAULT 0
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = FIXED;

-- ----------------------------
-- Records of gammu
-- ----------------------------
INSERT INTO `gammu` VALUES (11);

-- ----------------------------
-- Table structure for inbox
-- ----------------------------
DROP TABLE IF EXISTS `inbox`;
CREATE TABLE `inbox`  (
  `UpdatedInDB` timestamp NOT NULL DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP,
  `ReceivingDateTime` timestamp NOT NULL DEFAULT current_timestamp,
  `Text` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `SenderNumber` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `SMSCNumber` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `Class` int NOT NULL DEFAULT -1,
  `TextDecoded` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ID` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `RecipientID` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Processed` enum('false','true') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'false',
  `is_baca` enum('Y','N') CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'N',
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of inbox
-- ----------------------------

-- ----------------------------
-- Table structure for kontak
-- ----------------------------
DROP TABLE IF EXISTS `kontak`;
CREATE TABLE `kontak`  (
  `id_kontak` int NOT NULL AUTO_INCREMENT,
  `tanggal` datetime NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nomor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_kontak`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of kontak
-- ----------------------------

-- ----------------------------
-- Table structure for log
-- ----------------------------
DROP TABLE IF EXISTS `log`;
CREATE TABLE `log`  (
  `id_log` int NOT NULL AUTO_INCREMENT,
  `aktivitas` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `id_user` int NULL DEFAULT NULL,
  `id_cs` int NULL DEFAULT NULL,
  `waktu` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_log`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of log
-- ----------------------------

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu`  (
  `id_menu` int NOT NULL,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `link` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `parent` int NULL DEFAULT NULL,
  `icon` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tipe` int NULL DEFAULT NULL COMMENT '1 = dashboard || 2 = general || 3 = setting || 4 = SKP',
  `status` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES (1, 'Dashboard', 'dashboard', 0, 'icon-home', 1, 'Y');
INSERT INTO `menu` VALUES (3, 'User', 'user', 0, 'icon-users', 7, 'Y');
INSERT INTO `menu` VALUES (2, 'Log', 'log', 0, 'icon-directions', 1, 'Y');
INSERT INTO `menu` VALUES (4, 'Tulis Pesan', 'send_sms', 0, ' icon-paper-plane', 2, 'Y');
INSERT INTO `menu` VALUES (5, 'Pesan Masuk', 'pesan_masuk', 0, 'icon-envelope-open', 2, 'Y');
INSERT INTO `menu` VALUES (6, 'Pesan Keluar', 'pesan_keluar', 0, 'icon-envelope', 2, 'Y');
INSERT INTO `menu` VALUES (7, 'Pesan Terkirim', 'pesan_terkirim', 0, 'icon-envelope-letter', 2, 'Y');
INSERT INTO `menu` VALUES (8, 'Kontak', 'kontak', 0, 'icon-notebook', 3, 'Y');
INSERT INTO `menu` VALUES (9, 'Broadcast Pesan', 'broadcast_pesan', 0, 'icon-book-open', 3, 'Y');

-- ----------------------------
-- Table structure for outbox
-- ----------------------------
DROP TABLE IF EXISTS `outbox`;
CREATE TABLE `outbox`  (
  `UpdatedInDB` timestamp NOT NULL DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP,
  `InsertIntoDB` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `SendingDateTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Text` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `DestinationNumber` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `Class` int NULL DEFAULT -1,
  `TextDecoded` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ID` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `MultiPart` enum('false','true') CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'false',
  `RelativeValidity` int NULL DEFAULT -1,
  `SenderID` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `SendingTimeOut` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `DeliveryReport` enum('default','yes','no') CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'default',
  `CreatorID` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`ID`) USING BTREE,
  INDEX `outbox_date`(`SendingDateTime`, `SendingTimeOut`) USING BTREE,
  INDEX `outbox_sender`(`SenderID`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 2603 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of outbox
-- ----------------------------

-- ----------------------------
-- Table structure for outbox_multipart
-- ----------------------------
DROP TABLE IF EXISTS `outbox_multipart`;
CREATE TABLE `outbox_multipart`  (
  `Text` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `Class` int NULL DEFAULT -1,
  `TextDecoded` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `ID` int UNSIGNED NOT NULL DEFAULT 0,
  `SequencePosition` int NOT NULL DEFAULT 1,
  PRIMARY KEY (`ID`, `SequencePosition`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of outbox_multipart
-- ----------------------------

-- ----------------------------
-- Table structure for pbk
-- ----------------------------
DROP TABLE IF EXISTS `pbk`;
CREATE TABLE `pbk`  (
  `ID` int NOT NULL AUTO_INCREMENT,
  `GroupID` int NOT NULL DEFAULT -1,
  `Name` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Number` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of pbk
-- ----------------------------

-- ----------------------------
-- Table structure for pbk_groups
-- ----------------------------
DROP TABLE IF EXISTS `pbk_groups`;
CREATE TABLE `pbk_groups`  (
  `Name` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ID` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of pbk_groups
-- ----------------------------

-- ----------------------------
-- Table structure for phones
-- ----------------------------
DROP TABLE IF EXISTS `phones`;
CREATE TABLE `phones`  (
  `ID` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `UpdatedInDB` timestamp NOT NULL DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP,
  `InsertIntoDB` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `TimeOut` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Send` enum('yes','no') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'no',
  `Receive` enum('yes','no') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'no',
  `IMEI` varchar(35) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Client` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Battery` int NOT NULL DEFAULT 0,
  `Signal` int NOT NULL DEFAULT 0,
  `Sent` int NOT NULL DEFAULT 0,
  `Received` int NOT NULL DEFAULT 0,
  PRIMARY KEY (`IMEI`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of phones
-- ----------------------------
INSERT INTO `phones` VALUES ('Modem', '2022-08-11 13:29:35', '2022-08-10 21:20:46', '2022-08-11 13:29:45', 'yes', 'yes', '353805017282364', 'Gammu 1.28.90, Windows Server 2007, GCC 4.4, MinGW 3.13', 0, 51, 0, 0);

-- ----------------------------
-- Table structure for sentitems
-- ----------------------------
DROP TABLE IF EXISTS `sentitems`;
CREATE TABLE `sentitems`  (
  `UpdatedInDB` timestamp NOT NULL DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP,
  `InsertIntoDB` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `SendingDateTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `DeliveryDateTime` timestamp NULL DEFAULT NULL,
  `Text` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DestinationNumber` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `SMSCNumber` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `Class` int NOT NULL DEFAULT -1,
  `TextDecoded` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ID` int UNSIGNED NOT NULL DEFAULT 0,
  `SenderID` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `SequencePosition` int NOT NULL DEFAULT 1,
  `Status` enum('SendingOK','SendingOKNoReport','SendingError','DeliveryOK','DeliveryFailed','DeliveryPending','DeliveryUnknown','Error') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'SendingOK',
  `StatusError` int NOT NULL DEFAULT -1,
  `TPMR` int NOT NULL DEFAULT -1,
  `RelativeValidity` int NOT NULL DEFAULT -1,
  `CreatorID` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`ID`, `SequencePosition`) USING BTREE,
  INDEX `sentitems_date`(`DeliveryDateTime`) USING BTREE,
  INDEX `sentitems_tpmr`(`TPMR`) USING BTREE,
  INDEX `sentitems_dest`(`DestinationNumber`) USING BTREE,
  INDEX `sentitems_sender`(`SenderID`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of sentitems
-- ----------------------------

-- ----------------------------
-- Table structure for sisa_pulsa
-- ----------------------------
DROP TABLE IF EXISTS `sisa_pulsa`;
CREATE TABLE `sisa_pulsa`  (
  `tanggal` datetime NULL DEFAULT NULL,
  `sisa_pulsa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of sisa_pulsa
-- ----------------------------
INSERT INTO `sisa_pulsa` VALUES ('2022-08-10 12:43:08', 'Pulsa Rp0 sd31-12-2037 .Mau Pulsa Darurat?');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `no_telp` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Super Administrator', '085708855277', 'admin@endqueue.com');

SET FOREIGN_KEY_CHECKS = 1;
