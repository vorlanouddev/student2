/*
 Navicat Premium Data Transfer

 Source Server         : Servers
 Source Server Type    : MySQL
 Source Server Version : 100125
 Source Host           : localhost:3306
 Source Schema         : students

 Target Server Type    : MySQL
 Target Server Version : 100125
 File Encoding         : 65001

 Date: 29/06/2019 21:28:58
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for class_room
-- ----------------------------
DROP TABLE IF EXISTS `class_room`;
CREATE TABLE `class_room`  (
  `class_id` int(3) NOT NULL AUTO_INCREMENT,
  `teach_id` int(5) NOT NULL,
  `class_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `class_remark` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `time` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`class_id`) USING BTREE,
  INDEX `teach_id`(`teach_id`) USING BTREE,
  CONSTRAINT `class_room_ibfk_2` FOREIGN KEY (`teach_id`) REFERENCES `teacher` (`teach_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of class_room
-- ----------------------------
INSERT INTO `class_room` VALUES (7, 3, 'ຫ້ອງປໍ ກຽມ', '', 'admin', '2019-06-16 11:56:56');
INSERT INTO `class_room` VALUES (8, 4, 'ຫ້ອງປໍ 5', '', 'admin', '2019-06-16 11:43:59');
INSERT INTO `class_room` VALUES (9, 5, 'ຫ້ອງປໍ 4', '', 'admin', '2019-06-16 11:44:36');
INSERT INTO `class_room` VALUES (11, 7, 'ຫ້ອງປໍ 1', '', 'admin', '2019-06-16 11:57:33');
INSERT INTO `class_room` VALUES (12, 6, 'ຫ້ອງປໍ 2', '', 'admin', '2019-06-16 11:58:06');
INSERT INTO `class_room` VALUES (13, 6, 'ຫ້ອງປໍ 3', '', 'admin', '2019-06-16 11:58:27');

-- ----------------------------
-- Table structure for district
-- ----------------------------
DROP TABLE IF EXISTS `district`;
CREATE TABLE `district`  (
  `dis_id` int(3) NOT NULL AUTO_INCREMENT,
  `pro_id` int(2) NOT NULL,
  `dis_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`dis_id`) USING BTREE,
  INDEX `pro_id`(`pro_id`) USING BTREE,
  CONSTRAINT `district_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `province` (`pro_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2014 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of district
-- ----------------------------
INSERT INTO `district` VALUES (2001, 10004, 'ໜອງແຮດ');
INSERT INTO `district` VALUES (2002, 10005, 'ປາກຊັນ');
INSERT INTO `district` VALUES (2008, 10004, 'ໂພນສະຫວັນ');
INSERT INTO `district` VALUES (2009, 10011, 'ໂພນໂຮງ');
INSERT INTO `district` VALUES (2010, 10011, 'ວຽງຄຳ');
INSERT INTO `district` VALUES (2011, 10011, 'ແກ້ວອຸດົມ');
INSERT INTO `district` VALUES (2012, 10005, 'ທ່າພະບາດ');
INSERT INTO `district` VALUES (2013, 10011, 'ກາສີ');

-- ----------------------------
-- Table structure for province
-- ----------------------------
DROP TABLE IF EXISTS `province`;
CREATE TABLE `province`  (
  `pro_id` int(2) NOT NULL AUTO_INCREMENT,
  `pro_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`pro_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10015 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of province
-- ----------------------------
INSERT INTO `province` VALUES (10003, 'ຈຳປາສັກ');
INSERT INTO `province` VALUES (10004, 'ຊຽງຂວາງ');
INSERT INTO `province` VALUES (10005, 'ບໍລິຄຳໄຊ');
INSERT INTO `province` VALUES (10011, 'ວຽງຈັນ');
INSERT INTO `province` VALUES (10012, 'ຜົງສາລີ');
INSERT INTO `province` VALUES (10013, 'ວຽງຈັນs');
INSERT INTO `province` VALUES (10014, 'ນະຄອນຫລວງc');

-- ----------------------------
-- Table structure for ranks
-- ----------------------------
DROP TABLE IF EXISTS `ranks`;
CREATE TABLE `ranks`  (
  `r_id` int(5) NOT NULL AUTO_INCREMENT,
  `s_id` int(5) NULL DEFAULT NULL,
  `class_id` int(6) NULL DEFAULT NULL,
  `score` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `r_month` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `r_part` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `user` varchar(55) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`r_id`) USING BTREE,
  INDEX `s_id`(`s_id`) USING BTREE,
  INDEX `class_id`(`class_id`) USING BTREE,
  CONSTRAINT `ranks_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `student` (`s_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `ranks_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `class_room` (`class_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of ranks
-- ----------------------------
INSERT INTO `ranks` VALUES (1, 3, 11, '65', '06', '2019-2020', 'ແສງ');
INSERT INTO `ranks` VALUES (2, 4, 11, '54', '06', '2019-2020', 'ແສງ');
INSERT INTO `ranks` VALUES (3, 5, 11, '48', '06', '2019-2020', 'ແສງ');
INSERT INTO `ranks` VALUES (4, 6, 11, '65', '06', '2019-2020', 'ແສງ');
INSERT INTO `ranks` VALUES (5, 7, 11, '60', '06', '2019-2020', 'ແສງ');
INSERT INTO `ranks` VALUES (6, 8, 11, '61', '06', '2019-2020', 'ແສງ');
INSERT INTO `ranks` VALUES (7, 1, 12, '66', '06', '2019-2020', 'ແສງ');
INSERT INTO `ranks` VALUES (8, 9, 12, '45', '06', '2019-2020', 'ແສງ');
INSERT INTO `ranks` VALUES (9, 10, 12, '50', '06', '2019-2020', 'ແສງ');
INSERT INTO `ranks` VALUES (10, 11, 12, '44', '06', '2019-2020', 'ແສງ');
INSERT INTO `ranks` VALUES (11, 12, 12, '60', '06', '2019-2020', 'ແສງ');
INSERT INTO `ranks` VALUES (12, 25, 8, '18', '06', '2019-2020', 'ແສງ');
INSERT INTO `ranks` VALUES (13, 25, 8, '16', '07', '2019-2020', 'ແສງ');
INSERT INTO `ranks` VALUES (14, 13, 13, '60', '06', '2019-2020', 'ແສງ');
INSERT INTO `ranks` VALUES (15, 14, 13, '44', '06', '2019-2020', 'ແສງ');
INSERT INTO `ranks` VALUES (16, 20, 9, '10', '06', '2019-2020', 'ແສງ');
INSERT INTO `ranks` VALUES (17, 17, 13, '90', '06', '2019-2020', 'ແສງ');
INSERT INTO `ranks` VALUES (18, 15, 13, '77', '06', '2019-2020', 'ແສງ');
INSERT INTO `ranks` VALUES (19, 28, 8, '76', '06', '2019-2020', 'ແສງ');

-- ----------------------------
-- Table structure for student
-- ----------------------------
DROP TABLE IF EXISTS `student`;
CREATE TABLE `student`  (
  `s_id` int(10) NOT NULL AUTO_INCREMENT,
  `s_num` int(4) NOT NULL,
  `s_gender` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `s_fname` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `s_lname` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `s_dob` date NOT NULL,
  `s_vill_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `s_dis_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `s_pro_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `s_tel` int(15) NOT NULL,
  `national` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `trib` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `plash` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `s_status` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `s_remark` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `user` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `time` datetime(0) NOT NULL,
  PRIMARY KEY (`s_id`) USING BTREE,
  INDEX `s_num`(`s_num`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 33 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of student
-- ----------------------------
INSERT INTO `student` VALUES (1, 9141, 'ທ້າວ', 'ກອງດີ', 'ສິດນະລົງ', '2019-06-01', 'ໂພສີ', 'ປາກຊັນ', 'ບໍລິຄຳໄຊ', 2058469512, 'ລາວ', 'ລາວ', 'ພຸດ', 'ເຂົ້າ', '', 'ແສງ', '2019-06-16 15:39:59');
INSERT INTO `student` VALUES (2, 8855, 'ທ້າວ', 'ແສງອາລຸນ', 'ພັດສີ', '2019-06-06', 'ໂພສີ', 'ປາກຊັນ', 'ບໍລິຄຳໄຊ', 21564798, 'ລາວ', 'ລາວ', 'ພຸດ', 'ເຂົ້າ', '', 'ແສງ', '2019-06-16 16:48:49');
INSERT INTO `student` VALUES (3, 3213, 'ນາງ', 'ກືມ', 'ຕະມ໋ອງ', '2007-06-03', 'ໂພນທັນ', 'ກາສີ', 'ວຽງຈັນ', 2098765467, 'ລາວ', 'ກືມມຸ', 'ພີ', 'ເຂົ້າ', '', 'ແສງ', '2019-06-17 10:14:45');
INSERT INTO `student` VALUES (4, 7606, 'ນາງ', 'ຄຳນາງ', 'ຕະມ໋ອງ', '2006-02-11', 'ໂພນທັນ', 'ກາສີ', 'ວຽງຈັນ', 2096752312, 'ລາວ', 'ກືມມຸ', 'ພີ', 'ເຂົ້າ', '', 'ແສງ', '2019-06-17 10:21:57');
INSERT INTO `student` VALUES (5, 6708, 'ນາງ', 'ສະເດົາ', 'ສີວົງສາ', '2012-06-03', 'ນາແທ່ນ', 'ກາສີ', 'ວຽງຈັນ', 2053625171, 'ລາວ', 'ລາວໄຕ', 'ພຸດ', 'ເຂົ້າ', '', 'ແສງ', '2019-06-17 10:29:09');
INSERT INTO `student` VALUES (6, 7383, 'ທ້າວ', 'ເກມ', 'ສີຫະລາດ', '2011-06-26', 'ໂພນທັນ', 'ກາສີ', 'ວຽງຈັນ', 2098765789, 'ລາວ', 'ກືມມຸ', 'ພີ', 'ເຂົ້າ', '', 'ແສງ', '2019-06-17 10:37:05');
INSERT INTO `student` VALUES (7, 4906, 'ທ້າວ', 'ກອງແກ້ວ', 'ຫຼວງໄຊ', '2012-06-05', 'ນາແທ່ນ', 'ກາສີ', 'ວຽງຈັນ', 2056743217, 'ລາວ', 'ໄທແດງ', 'ພຸດ', 'ເຂົ້າ', '', 'ແສງ', '2019-06-17 10:44:21');
INSERT INTO `student` VALUES (8, 3996, 'ທ້າວ', 'ຂຽວຕະກອນ', 'ພັນວິໄລ', '2011-06-19', 'ນາແທ່ນ', 'ກາສີ', 'ວຽງຈັນ', 2058755667, 'ລາວ', 'ລາວໄຕ', 'ພຸດ', 'ເຂົ້າ', '', 'ແສງ', '2019-06-17 10:51:12');
INSERT INTO `student` VALUES (9, 3413, 'ນາງ', 'ສຸດໃຈ', 'ແກ້ວບຸນມາ', '2011-06-26', 'ໂພນທັນ', 'ກາສີ', 'ວຽງຈັນ', 2098887656, 'ລາວ', 'ກືມມຸ', 'ພີ', 'ເຂົ້າ', '', 'ແສງ', '2019-06-17 11:13:44');
INSERT INTO `student` VALUES (10, 5749, 'ທ້າວ', 'ສຸທໍ່', 'ພົມມະຈັກ', '2011-06-24', 'ໂພນທັນ', 'ກາສີ', 'ວຽງຈັນ', 2059987655, 'ລາວ', 'ກືມມຸ', 'ພີ', 'ເຂົ້າ', '', 'ແສງ', '2019-06-17 11:19:04');
INSERT INTO `student` VALUES (11, 5407, 'ນາງ', 'ນາງ ແສນ', 'ອິນທະວົງ', '2010-06-18', 'ນາແທ່ນ', 'ກາສີ', 'ວຽງຈັນ', 2055587908, 'ລາວ', 'ລາວໄຕ', 'ພຸດ', 'ເຂົ້າ', '', 'ແສງ', '2019-06-17 11:24:39');
INSERT INTO `student` VALUES (12, 9953, 'ທ້າວ', 'ສາຄອນ', 'ພິລາວັນ', '2011-06-14', 'ໂພນທັນ', 'ກາສີ', 'ວຽງຈັນ', 2055433987, 'ລາວ', 'ກືມມຸ', 'ພີ', 'ເຂົ້າ', '', 'ແສງ', '2019-06-17 11:29:19');
INSERT INTO `student` VALUES (13, 3018, 'ນາງ', 'ແວວດາວ', 'ທຳມະວົງ', '2010-06-18', 'ໂພນທັນ', 'ກາສີ', 'ວຽງຈັນ', 2056675435, 'ລາວ', 'ກືມມຸ', 'ພີ', 'ເຂົ້າ', '', 'ແສງ', '2019-06-17 12:29:01');
INSERT INTO `student` VALUES (14, 8282, 'ທ້າວ', 'ແສງຂັນ', 'ອິນທະວົງ', '2009-06-20', 'ນາແທ່ນ', 'ກາສີ', 'ວຽງຈັນ', 2147483647, 'ລາວ', 'ລາວໄຕ', 'ພຸດ', 'ເຂົ້າ', '', 'ແສງ', '2019-06-17 12:32:50');
INSERT INTO `student` VALUES (15, 4172, 'ທ້າວ', 'ອາທິດ', 'ພົມມະຈັກ', '2009-06-13', 'ໂພນທັນ', 'ກາສີ', 'ວຽງຈັນ', 2054789985, 'ລາວ', 'ກືມມຸ', 'ພີ', 'ເຂົ້າ', '', 'ແສງ', '2019-06-17 12:37:22');
INSERT INTO `student` VALUES (16, 925, 'ນາງ', 'ວິໄລ', 'ທອງມາ', '2009-06-14', 'ນາແທ່ນ', 'ກາສີ', 'ວຽງຈັນ', 2056743897, 'ລາວ', 'ລາວໄຕ', 'ພຸດ', 'ເຂົ້າ', '', 'ແສງ', '2019-06-17 12:41:36');
INSERT INTO `student` VALUES (17, 1226, 'ທ້າວ', 'ກີ່', 'ແກ້ພິລາວັນ', '2009-06-27', 'ໂພນທັນ', 'ກາສີ', 'ວຽງຈັນ', 2096684423, 'ລາວ', 'ກືມມຸ', 'ພີ', 'ເຂົ້າ', '', 'ແສງ', '2019-06-17 12:45:25');
INSERT INTO `student` VALUES (18, 7163, 'ທ້າວ', 'ແດງ', 'ແພງວັນ', '2009-06-28', 'ນາແທ່ນ', 'ກາສີ', 'ວຽງຈັນ', 2147483647, 'ລາວ', 'ລາວໄຕ', 'ພຸດ', 'ເຂົ້າ', '', 'ແສງ', '2019-06-17 12:49:08');
INSERT INTO `student` VALUES (19, 3131, 'ທ້າວ', 'ແສນ', 'ວັນນະພາ', '2010-06-26', 'ນາແທ່ນ', 'ກາສີ', 'ວຽງຈັນ', 2056786534, 'ລາວ', 'ລາວໄຕ', 'ພຸດ', 'ເຂົ້າ', '', 'ແສງ', '2019-06-17 12:55:44');
INSERT INTO `student` VALUES (20, 1829, 'ນາງ', 'ແຕງໂມ', 'ອິນທະວົງ', '2009-06-20', 'ນາແທ່ນ', 'ກາສີ', 'ວຽງຈັນ', 2056754908, 'ລາວ', 'ລາວໄຕ', 'ພຸດ', 'ເຂົ້າ', '', 'ແສງ', '2019-06-17 13:00:06');
INSERT INTO `student` VALUES (21, 7821, 'ທ້າວ', 'ທອງ', 'ແກ້ວບູນມາ', '2010-06-24', 'ໂພນທັນ', 'ກາສີ', 'ວຽງຈັນ', 2056787678, 'ລາວ', 'ກືມມຸ', 'ພີ', 'ເຂົ້າ', '', 'ແສງ', '2019-06-17 13:03:39');
INSERT INTO `student` VALUES (22, 766, 'ທ້າວ', 'ນຳ', 'ບູນມີ', '2010-06-27', 'ນາແທ່ນ', 'ກາສີ', 'ວຽງຈັນ', 2059878905, 'ລາວ', 'ລາວໄຕ', 'ພຸດ', 'ເຂົ້າ', '', 'ແສງ', '2019-06-17 13:07:53');
INSERT INTO `student` VALUES (23, 5178, 'ນາງ', 'ພູດທະສອນ', 'ສີຫະລາດ', '2009-06-26', 'ໂພນທັນ', 'ກາສີ', 'ວຽງຈັນ', 2097865456, 'ລາວ', 'ກືມມຸ', 'ພີ', 'ເຂົ້າ', '', 'ແສງ', '2019-06-17 13:12:36');
INSERT INTO `student` VALUES (24, 8506, 'ທ້າວ', 'ສອນໄຊ', 'ທຳມະວົງ', '2010-06-19', 'ໂພນທັນ', 'ກາສີ', 'ວຽງຈັນ', 2099556734, 'ລາວ', 'ກືມມຸ', 'ພີ', 'ເຂົ້າ', '', 'ແສງ', '2019-06-17 13:16:30');
INSERT INTO `student` VALUES (25, 3654, 'ທ້າວ', 'ວັນໂນ', 'ໄຟວັນ', '2008-06-20', 'ໂພນທັນ', 'ກາສີ', 'ວຽງຈັນ', 2097875646, 'ລາວ', 'ກືມມຸ', 'ພີ', 'ເຂົ້າ', '', 'ແສງ', '2019-06-17 13:22:41');
INSERT INTO `student` VALUES (26, 5216, 'ທ້າວ', 'ວຽນ', 'ວຽງແກ້ວ', '2009-06-26', 'ໂພນທັນ', 'ກາສີ', 'ວຽງຈັນ', 2058764987, 'ລາວ', 'ກືມມຸ', 'ພີ', 'ເຂົ້າ', '', 'ແສງ', '2019-06-17 13:26:14');
INSERT INTO `student` VALUES (27, 9932, 'ນາງ', 'ຫາ', 'ອິນໄຳຟວັນ', '2008-06-20', 'ນາແທ່ນ', 'ກາສີ', 'ວຽງຈັນ', 2092343678, 'ລາວ', 'ລາວໄຕ', 'ພຸດ', 'ເຂົ້າ', '', 'ແສງ', '2019-06-17 13:29:54');
INSERT INTO `student` VALUES (28, 5191, 'ທ້າວ', 'ກີ່', 'ແກ້ວທິດາ', '2008-06-27', 'ໂພນທັນ', 'ກາສີ', 'ວຽງຈັນ', 2056890768, 'ລາວ', 'ກືມມຸ', 'ພີ', 'ເຂົ້າ', '', 'ແສງ', '2019-06-17 13:33:47');
INSERT INTO `student` VALUES (29, 7517, 'ນາງ', 'ຍົມ', 'ພົມມະຈັກ', '2008-06-25', 'ນາແທ່ນ', 'ກາສີ', 'ວຽງຈັນ', 2059672376, 'ລາວ', 'ລາວໄຕ', 'ພຸດ', 'ເຂົ້າ', '', 'ແສງ', '2019-06-17 13:39:43');
INSERT INTO `student` VALUES (30, 6001, 'ນາງ', 'ມາລີ', 'ສີຫາລາດ', '2008-06-19', 'ນາແທ່ນ', 'ກາສີ', 'ວຽງຈັນ', 2097865432, 'ລາວ', 'ລາວໄຕ', 'ພຸດ', 'ເຂົ້າ', '', 'ແສງ', '2019-06-17 13:44:37');
INSERT INTO `student` VALUES (31, 1184, 'ທ້າວ', 'sdfas', 'sdfas', '2019-06-02', 'ນາແທ່ນ', 'ກາສີ', 'ວຽງຈັນ', 2058469512, 'ລາວ', 'ລາວ', 'ພຸດ', 'ເຂົ້າ', '', 'ແສງ', '2019-06-29 18:46:17');
INSERT INTO `student` VALUES (32, 8767, 'ທ້າວ', 'fgsd', 'dfgs', '2019-06-08', 'ໂພສີ', 'ປາກຊັນ', 'ບໍລິຄຳໄຊ', 2058469512, 'ລາວ', 'ລາວ', 'ພຸດ', 'ເຂົ້າ', 'dfgs', 'ແສງ', '2019-06-29 18:48:22');

-- ----------------------------
-- Table structure for subject
-- ----------------------------
DROP TABLE IF EXISTS `subject`;
CREATE TABLE `subject`  (
  `sub_id` int(3) NOT NULL AUTO_INCREMENT,
  `teach_id` int(5) NOT NULL,
  `sub_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sub_remark` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`sub_id`, `sub_name`) USING BTREE,
  INDEX `teach_id`(`teach_id`) USING BTREE,
  INDEX `sub_id`(`sub_id`) USING BTREE,
  CONSTRAINT `subject_ibfk_1` FOREIGN KEY (`teach_id`) REFERENCES `teacher` (`teach_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of subject
-- ----------------------------
INSERT INTO `subject` VALUES (13, 3, 'ຄະນິດສາດ', '', 'admin');
INSERT INTO `subject` VALUES (14, 3, 'ອັງກິດ', '', 'admin');
INSERT INTO `subject` VALUES (15, 3, 'ໂລກອ້ອມຕົວ', '', 'admin');
INSERT INTO `subject` VALUES (17, 3, 'ພາສາລາວ', '', 'admin');
INSERT INTO `subject` VALUES (18, 3, 'ຫັດຖະກຳ', '', 'admin');
INSERT INTO `subject` VALUES (19, 3, 'ສິລະປະດົນຕີ', '', 'admin');
INSERT INTO `subject` VALUES (20, 3, 'ສິລະປະກຳ', '', 'ແສງ');
INSERT INTO `subject` VALUES (21, 3, 'ຄຸນສົມບັດ', '', 'ແສງ');
INSERT INTO `subject` VALUES (22, 3, 'ພາລະສຶກສາ', '', 'ແສງ');

-- ----------------------------
-- Table structure for tb_father
-- ----------------------------
DROP TABLE IF EXISTS `tb_father`;
CREATE TABLE `tb_father`  (
  `f_id` int(5) NOT NULL AUTO_INCREMENT,
  `s_id` int(10) NOT NULL,
  `f_fname` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `f_lname` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `f_dob` date NOT NULL,
  `f_job` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `f_vill_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `f_dis_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `f_pro_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `f_tel` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `f_remark` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`f_id`) USING BTREE,
  INDEX `s_id`(`s_id`) USING BTREE,
  CONSTRAINT `tb_father_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `student` (`s_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 31 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_father
-- ----------------------------
INSERT INTO `tb_father` VALUES (1, 1, 'ສົມຊາຍ', 'ຈັນດີ', '1998-05-02', 'ນັກເລງ', 'ນາແທ່ນ', 'ກາສີ', 'ວຽງຈັນ', '020 4577533', '', 'ແສງ');
INSERT INTO `tb_father` VALUES (2, 2, 'ສົມເພັດ', 'ສຸກັນຍາ', '2019-06-16', 'ພະນັກງານ', 'ໂພສີ', 'ປາກຊັນ', 'ບໍລິຄຳໄຊ', '02058795', '', 'ແສງ');
INSERT INTO `tb_father` VALUES (3, 3, 'ທ້າວ ຄຳໝັ້ນ', 'ຕະມ໋ອງ', '1973-06-04', 'ປະຊາຊົນ', 'ໂພນທັນ', 'ກາສີ', 'ວຽງຈັນ', '0305554321', '', 'ແສງ');
INSERT INTO `tb_father` VALUES (4, 4, 'ພອນຄຳ', 'ຕະມ໋ອງ', '1978-07-04', 'ປະຊາຊົນ', 'ໂພນທັນ', 'ກາສີ', 'ວຽງຈັນ', '0305986721', '', 'ແສງ');
INSERT INTO `tb_father` VALUES (5, 5, 'ທ້າວ ສີ', 'ສີວົງສາ', '1970-09-12', 'ພະນັກງານ', 'ນາແທ່ນ', 'ກາສີ', 'ວຽງຈັນ', '02098753132', '', 'ແສງ');
INSERT INTO `tb_father` VALUES (6, 6, 'ທ້າວ ສີດາ', 'ສີຫະລາດ', '1983-06-14', 'ພະນັກງານ', 'ໂພນທັນ', 'ກາສີ', 'ວຽງຈັນ', '020923465432', '', 'ແສງ');
INSERT INTO `tb_father` VALUES (7, 7, 'ທ້າວ ອຸດອນ', 'ຫຼວງໄຊ', '1987-06-07', 'ປະຊາຊົນ', 'ໂພນທັນ', 'ກາສີ', 'ວຽງຈັນ', '020578965432', '', 'ແສງ');
INSERT INTO `tb_father` VALUES (8, 8, 'ທ້າວ ສອນ', 'ພັນວິໄລ', '1980-06-13', 'ພະນັກງານ', 'ນາແທ່ນ', 'ກາສີ', 'ວຽງຈັນ', '02056668754', '', 'ແສງ');
INSERT INTO `tb_father` VALUES (9, 9, 'ທ້າວ ໄນທ້າວ', 'ແກ້ວບຸນມາ', '1986-06-11', 'ປະຊາຊົນ', 'ໂພນທັນ', 'ກາສີ', 'ວຽງຈັນ', '02052243178', '', 'ແສງ');
INSERT INTO `tb_father` VALUES (10, 10, 'ທ້າວ ເບີທໍ່', 'ພົມມະຈັກ', '1986-06-13', 'ພະນັກງານ', 'ໂພນທັນ', 'ກາສີ', 'ວຽງຈັນ', '02059986251', '', 'ແສງ');
INSERT INTO `tb_father` VALUES (11, 11, 'ທ້າວ ຊຽງຄຳ', 'ອິນທະວົງ', '1984-06-18', 'ພະນັກງານ', 'ນາແທ່ນ', 'ກາສີ', 'ວຽງຈັນ', '02055599876', '', 'ແສງ');
INSERT INTO `tb_father` VALUES (12, 12, 'ນາງ ນ້ອຍ', 'ພິລາວັນ', '1985-06-25', 'ພະນັກງານ', 'ໂພນທັນ', 'ກາສີ', 'ວຽງຈັນ', '02096547687', '', 'ແສງ');
INSERT INTO `tb_father` VALUES (13, 13, 'ສອນ', 'ທຳມະວົງ', '1986-06-13', 'ພະນັກງານ', 'ໂພນທັນ', 'ກາສີ', 'ວຽງຈັນ', '02097657893', '', 'ແສງ');
INSERT INTO `tb_father` VALUES (14, 14, 'ຄຳກອງ', 'ອິນທະວົງ', '1983-06-20', 'ພະນັກງານ', 'ນາແທ່ນ', 'ກາສີ', 'ວຽງຈັນ', '02055776435', '', 'ແສງ');
INSERT INTO `tb_father` VALUES (15, 15, 'ມອນ', 'ພົມມິຈັກ', '1983-06-15', 'ພະນັກງານ', 'ໂພນທັນ', 'ກາສີ', 'ວຽງຈັນ', '02097755236', '', 'ແສງ');
INSERT INTO `tb_father` VALUES (16, 16, 'ສົມມາ', 'ທອງມາ', '1985-06-03', 'ປະຊາຊົນ', 'ນາແທ່ນ', 'ກາສີ', 'ວຽງຈັນ', '020559976586', '', 'ແສງ');
INSERT INTO `tb_father` VALUES (17, 17, 'ກົງ', 'ແກ້ວພິລາວັນ', '1984-06-14', 'ພະນັກງານ', 'ໂພນທັນ', 'ກາສີ', 'ວຽງຈັນ', '020544776892', '', 'ແສງ');
INSERT INTO `tb_father` VALUES (18, 18, 'ແກ້ວ', 'ແພງວັນ', '1985-06-27', 'ປະຊາຊົນ', 'ໂພນທັນ', 'ກາສີ', 'ວຽງຈັນ', '02057899446', '', 'ແສງ');
INSERT INTO `tb_father` VALUES (19, 19, 'ຊຽງຄຳ', 'ວັນນະພາ', '1985-06-27', 'ພະນັກງານ', 'ນາແທ່ນ', 'ກາສີ', 'ວຽງຈັນ', '02055678776', '', 'ແສງ');
INSERT INTO `tb_father` VALUES (20, 20, 'ຄຳ', 'ອິນທະວົງ', '1982-06-26', 'ປະຊາຊົນ', 'ນາແທ່ນ', 'ກາສີ', 'ວຽງຈັນ', '02056749087', '', 'ແສງ');
INSERT INTO `tb_father` VALUES (21, 21, 'ປອນ', 'ແກ້ວບູນມາ', '1984-06-13', 'ພະນັກງານ', 'ໂພນທັນ', 'ກາສີ', 'ວຽງຈັນ', '02056732145', '', 'ແສງ');
INSERT INTO `tb_father` VALUES (22, 22, 'ເຕີມ', 'ບູນມີ', '1984-06-19', 'ພະນັກງານ', 'ນາແທ່ນ', 'ກາສີ', 'ວຽງຈັນ', '02099564356', '', 'ແສງ');
INSERT INTO `tb_father` VALUES (23, 23, 'ເພັດ', 'ສີຫະລາດ', '1985-06-05', 'ພະນັກງານ', 'ໂພນທັນ', 'ກາສີ', 'ວຽງຈັນ', '02057345876', '', 'ແສງ');
INSERT INTO `tb_father` VALUES (24, 24, 'ວັນ', 'ທຳມະວົງ', '1984-06-14', 'ປະຊາຊົນ', 'ໂພນທັນ', 'ກາສີ', 'ວຽງຈັນ', '02099223456', '', 'ແສງ');
INSERT INTO `tb_father` VALUES (25, 25, 'ຈັນດີ', 'ໄຟວັນ', '1983-06-06', 'ພະນັກງານ', 'ໂພນທັນ', 'ກາສີ', 'ວຽງຈັນ', '02044678456', '', 'ແສງ');
INSERT INTO `tb_father` VALUES (26, 26, 'ພາ', 'ວຽງແກ້ວ', '1983-06-21', 'ປະຊາຊົນ', 'ໂພນທັນ', 'ກາສີ', 'ວຽງຈັນ', '02058734508', '', 'ແສງ');
INSERT INTO `tb_father` VALUES (27, 27, 'ລີ', 'ອິນໄຟວັນ', '1983-06-12', 'ປະຊາຊົນ', 'ນາແທ່ນ', 'ກາສີ', 'ວຽງຈັນ', '02056483089', '', 'ແສງ');
INSERT INTO `tb_father` VALUES (28, 28, 'ກົງ', 'ແກ້ວທິດາ', '1984-06-13', 'ພະນັກງານ', 'ໂພນທັນ', 'ກາສີ', 'ວຽງຈັນ', '02056734567', '', 'ແສງ');
INSERT INTO `tb_father` VALUES (29, 29, 'ຄົມ', 'ພົມມະຈັກ', '1984-06-19', 'ພະນັກງານ', 'ນາແທ່ນ', 'ກາສີ', 'ວຽງຈັນ', '02059864567', '', 'ແສງ');
INSERT INTO `tb_father` VALUES (30, 30, 'ທອງ', 'ສີຫາລາດ', '1984-06-14', 'ພະນັກງານ', 'ນາແທ່ນ', 'ກາສີ', 'ວຽງຈັນ', '02056873245', '', 'ແສງ');

-- ----------------------------
-- Table structure for tb_miss
-- ----------------------------
DROP TABLE IF EXISTS `tb_miss`;
CREATE TABLE `tb_miss`  (
  `miss_id` int(10) NOT NULL AUTO_INCREMENT,
  `s_id` int(10) NOT NULL,
  `sub_id` int(3) NOT NULL,
  `miss_date` datetime(0) NOT NULL,
  `miss_hours` int(3) NOT NULL,
  `miss_reason` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `m_part` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `time` datetime(0) NOT NULL,
  PRIMARY KEY (`miss_id`) USING BTREE,
  INDEX `s_id`(`s_id`) USING BTREE,
  INDEX `sub_id`(`sub_id`) USING BTREE,
  CONSTRAINT `tb_miss_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `student` (`s_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `tb_miss_ibfk_2` FOREIGN KEY (`sub_id`) REFERENCES `subject` (`sub_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 25 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_miss
-- ----------------------------
INSERT INTO `tb_miss` VALUES (1, 1, 13, '2019-06-19 01:09:46', 2, 'ມີເຫດຜົນ', '', 'ແສງ', '2019-06-19 01:09:46');
INSERT INTO `tb_miss` VALUES (2, 2, 13, '2019-06-19 01:09:46', 2, 'ມີເຫດຜົນ', '', 'ແສງ', '2019-06-19 01:09:46');
INSERT INTO `tb_miss` VALUES (3, 3, 13, '2019-06-19 01:09:46', 2, 'ມີເຫດຜົນ', '', 'ແສງ', '2019-06-19 01:09:46');
INSERT INTO `tb_miss` VALUES (4, 19, 13, '2019-06-22 14:31:55', 2, 'ມີເຫດຜົນ', 'ແສງ', '2019-2020', '2019-06-22 14:31:55');
INSERT INTO `tb_miss` VALUES (5, 20, 13, '2019-06-22 14:31:55', 2, 'ມີເຫດຜົນ', 'ແສງ', '2019-2020', '2019-06-22 14:31:55');
INSERT INTO `tb_miss` VALUES (6, 19, 14, '2019-06-22 20:13:52', 2, 'ມີເຫດຜົນ', 'ແສງ', '2019-2020', '2019-06-22 20:13:52');
INSERT INTO `tb_miss` VALUES (7, 21, 14, '2019-06-22 20:13:52', 2, 'ມີເຫດຜົນ', 'ແສງ', '2019-2020', '2019-06-22 20:13:52');
INSERT INTO `tb_miss` VALUES (8, 24, 14, '2019-06-22 20:13:52', 2, 'ມີເຫດຜົນ', 'ແສງ', '2019-2020', '2019-06-22 20:13:52');
INSERT INTO `tb_miss` VALUES (9, 19, 18, '2019-06-22 20:26:04', 2, 'ເຈັບເປັນ', '2019-2020', 'ແສງ', '2019-06-22 22:33:36');
INSERT INTO `tb_miss` VALUES (10, 20, 14, '2019-06-22 20:57:11', 2, 'ບໍ່ມີເຫັດຜົນ', '2019-2020', 'ແສງ', '2019-06-22 20:57:11');
INSERT INTO `tb_miss` VALUES (11, 21, 14, '2019-06-22 20:57:11', 2, 'ບໍ່ມີເຫັດຜົນ', '2019-2020', 'ແສງ', '2019-06-22 20:57:11');
INSERT INTO `tb_miss` VALUES (15, 19, 13, '2019-06-23 20:14:24', 2, 'ບໍ່ມີເຫັດຜົນ', '2019-2020', 'ແສງ', '2019-06-23 20:14:24');
INSERT INTO `tb_miss` VALUES (16, 20, 13, '2019-06-23 20:14:24', 2, 'ບໍ່ມີເຫັດຜົນ', '2019-2020', 'ແສງ', '2019-06-23 20:14:24');
INSERT INTO `tb_miss` VALUES (17, 3, 15, '2019-06-24 12:16:38', 2, 'ບໍ່ມີເຫັດຜົນ', '2019-2020', 'ແສງ', '2019-06-24 12:16:38');
INSERT INTO `tb_miss` VALUES (18, 4, 15, '2019-06-24 12:16:38', 2, 'ບໍ່ມີເຫັດຜົນ', '2019-2020', 'ແສງ', '2019-06-24 12:16:38');
INSERT INTO `tb_miss` VALUES (19, 5, 15, '2019-06-24 12:16:38', 2, 'ບໍ່ມີເຫັດຜົນ', '2019-2020', 'ແສງ', '2019-06-24 12:16:38');
INSERT INTO `tb_miss` VALUES (20, 6, 15, '2019-06-24 12:16:38', 2, 'ບໍ່ມີເຫັດຜົນ', '2019-2020', 'ແສງ', '2019-06-24 12:16:38');
INSERT INTO `tb_miss` VALUES (21, 7, 15, '2019-06-24 12:16:38', 2, 'ບໍ່ມີເຫັດຜົນ', '2019-2020', 'ແສງ', '2019-06-24 12:16:38');
INSERT INTO `tb_miss` VALUES (22, 8, 15, '2019-06-24 12:16:38', 2, 'ບໍ່ມີເຫັດຜົນ', '2019-2020', 'ແສງ', '2019-06-24 12:16:38');
INSERT INTO `tb_miss` VALUES (23, 4, 19, '2019-06-24 12:17:04', 2, 'ມີເຫດຜົນ', '2019-2020', 'ແສງ', '2019-06-24 12:17:04');
INSERT INTO `tb_miss` VALUES (24, 7, 19, '2019-06-24 12:17:04', 2, 'ມີເຫດຜົນ', '2019-2020', 'ແສງ', '2019-06-24 12:17:04');

-- ----------------------------
-- Table structure for tb_mother
-- ----------------------------
DROP TABLE IF EXISTS `tb_mother`;
CREATE TABLE `tb_mother`  (
  `m_id` int(5) NOT NULL AUTO_INCREMENT,
  `s_id` int(10) NOT NULL,
  `m_fname` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `m_lname` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `m_dob` date NOT NULL,
  `m_vill_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `m_dis_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `m_pro_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `m_tel` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `m_remark` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `m_job` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `user` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`m_id`) USING BTREE,
  INDEX `s_id`(`s_id`) USING BTREE,
  CONSTRAINT `tb_mother_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `student` (`s_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 31 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_mother
-- ----------------------------
INSERT INTO `tb_mother` VALUES (1, 1, 'ສົມຍິງ', 'ມະນຸດເມຍ', '2019-06-02', 'ໂພສີ', 'ປາກຊັນ', 'ບໍລິຄຳໄຊ', '02056754', '', 'ຂາເລາະ', 'ແສງ');
INSERT INTO `tb_mother` VALUES (2, 2, 'ດາວີ', 'ສີສົມພົນ', '2019-06-12', 'ນາແທ່ນ', 'ກາສີ', 'ວຽງຈັນ', '02457875', '', 'ພະນັກງານ', 'ແສງ');
INSERT INTO `tb_mother` VALUES (3, 3, 'ອອນຈັນ', 'ຕະມ໋ອງ', '1977-03-07', 'ໂພນທັນ', 'ກາສີ', 'ວຽງຈັນ', '0305554321', '', 'ປະຊາຊົນ', 'ແສງ');
INSERT INTO `tb_mother` VALUES (4, 4, 'ນາງ ຕາ', 'ຕະມ໋ອງ', '1977-06-04', 'ນາແທ່ນ', 'ກາສີ', 'ວຽງຈັນ', '0309876532', '', 'ປະຊາຊົນ', 'ແສງ');
INSERT INTO `tb_mother` VALUES (5, 5, 'ນາງ ເກີດ', 'ສີວົງສາ', '1978-08-04', 'ນາແທ່ນ', 'ກາສີ', 'ວຽງຈັນ', '02098675341', '', 'ປະຊາຊົນ', 'ແສງ');
INSERT INTO `tb_mother` VALUES (6, 6, 'ນາງ ວັນນາ', 'ສີຫະລາດ', '1983-06-27', 'ໂພນທັນ', 'ກາສີ', 'ວຽງຈັນ', '02054678764', '', 'ປະຊາຊົນ', 'ແສງ');
INSERT INTO `tb_mother` VALUES (7, 7, 'ນາງ ສີ', 'ຫຼວງໄຊ', '1986-06-12', 'ໂພນທັນ', 'ກາສີ', 'ວຽງຈັນ', '02051876905', '', 'ປະຊາຊົນ', 'ແສງ');
INSERT INTO `tb_mother` VALUES (8, 9, 'ນາງ ຊົ່ງຢ່າງ', 'ແກ້ວບຸນມາ', '1985-06-21', 'ນາແທ່ນ', 'ກາສີ', 'ວຽງຈັນ', '02091367543', '', 'ປະຊາຊົນ', 'ແສງ');
INSERT INTO `tb_mother` VALUES (9, 10, 'ນາງ ອິດສະດາ', 'ພົມມະຈັກ', '1985-06-13', 'ໂພນທັນ', 'ກາສີ', 'ວຽງຈັນ', '02058988865', '', 'ປະຊາຊົນ', 'ແສງ');
INSERT INTO `tb_mother` VALUES (10, 11, 'ນາງ ກອງຈັນ', 'ອິນທະວົງ', '1986-06-13', 'ນາແທ່ນ', 'ກາສີ', 'ວຽງຈັນ', '02099658765', '', 'ພະນັກງານ', 'ແສງ');
INSERT INTO `tb_mother` VALUES (11, 12, 'ນາງ ອຳພອນ', 'ພິລາວັນ', '1984-06-19', 'ໂພນທັນ', 'ກາສີ', 'ວຽງຈັນ', '02059879872', '', 'ປະຊາຊົນ', 'ແສງ');
INSERT INTO `tb_mother` VALUES (12, 13, 'ນວນ', 'ທຳມະວົງ', '1984-06-14', 'ໂພນທັນ', 'ກາສີ', 'ວຽງຈັນ', '02056774435', '', 'ປະຊາຊົນ', 'ແສງ');
INSERT INTO `tb_mother` VALUES (13, 14, 'ວັນນາ', 'ອິນທະວົງ', '1985-06-12', 'ໂພນທັນ', 'ກາສີ', 'ວຽງຈັນ', '020992345279', '', 'ພະນັກງານ', 'ແສງ');
INSERT INTO `tb_mother` VALUES (14, 15, 'ຄຳຫຼ້າ', 'ພົມມະຈັກ', '1986-06-13', 'ໂພນທັນ', 'ກາສີ', 'ວຽງຈັນ', '02056687342', '', 'ພະນັກງານ', 'ແສງ');
INSERT INTO `tb_mother` VALUES (15, 16, 'ທອງວັນ', 'ທອງມາ', '1985-06-03', 'ນາແທ່ນ', 'ກາສີ', 'ວຽງຈັນ', '02055873456', '', 'ພະນັກງານ', 'ແສງ');
INSERT INTO `tb_mother` VALUES (16, 17, 'ໄຂ', 'ແກ້ວພິລາວັນ', '1985-06-10', 'ໂພນທັນ', 'ກາສີ', 'ວຽງຈັນ', '02058732245', '', 'ພະນັກງານ', 'ແສງ');
INSERT INTO `tb_mother` VALUES (17, 18, 'ນວນຈັນ', 'ແພງວັນ', '1984-06-21', 'ນາແທ່ນ', 'ກາສີ', 'ວຽງຈັນ', '02099675546', '', 'ປະຊາຊົນ', 'ແສງ');
INSERT INTO `tb_mother` VALUES (18, 19, 'ຈັນດີ', 'ວັນນະພາ', '1985-06-20', 'ນາແທ່ນ', 'ກາສີ', 'ວຽງຈັນ', '02057634567', '', 'ປະຊາຊົນ', 'ແສງ');
INSERT INTO `tb_mother` VALUES (19, 20, 'ຄຳນາງ', 'ອິນທະວົງ', '1986-06-13', 'ນາແທ່ນ', 'ກາສີ', 'ວຽງຈັນ', '02054678906', '', 'ປະຊາຊົນ', 'ແສງ');
INSERT INTO `tb_mother` VALUES (20, 21, 'ປາລີ', 'ແກ້ວບູນມາ', '1986-06-11', 'ໂພນທັນ', 'ກາສີ', 'ວຽງຈັນ', '02053467567', '', 'ປະຊາຊົນ', 'ແສງ');
INSERT INTO `tb_mother` VALUES (21, 22, 'ປາ', 'ບູນມີ', '1986-06-19', 'ນາແທ່ນ', 'ກາສີ', 'ວຽງຈັນ', '0204456786', '', 'ປະຊາຊົນ', 'ແສງ');
INSERT INTO `tb_mother` VALUES (22, 23, 'ໄມ', 'ສີຫະລາດ', '1984-06-13', 'ໂພນທັນ', 'ກາສີ', 'ວຽງຈັນ', '02095567223', '', 'ປະຊາຊົນ', 'ແສງ');
INSERT INTO `tb_mother` VALUES (23, 24, 'ວີນາ', 'ທຳມະວົງສາ', '1986-06-17', 'ໂພນທັນ', 'ກາສີ', 'ວຽງຈັນ', '02056348906', '', 'ປະຊາຊົນ', 'ແສງ');
INSERT INTO `tb_mother` VALUES (24, 25, 'ໄຟລີນ', 'ໄຟວັນ', '1985-06-13', 'ໂພນທັນ', 'ກາສີ', 'ວຽງຈັນ', '02055478976', '', 'ປະຊາຊົນ', 'ແສງ');
INSERT INTO `tb_mother` VALUES (25, 26, 'ຄຳ', 'ວຽງແກ້ວ', '1985-06-12', 'ໂພນທັນ', 'ກາສີ', 'ວຽງຈັນ', '02059765873', '', 'ປະຊາຊົນ', 'ແສງ');
INSERT INTO `tb_mother` VALUES (26, 27, 'ນ້ອຍ', 'ອິນໄຟວັນ', '1985-06-12', 'ນາແທ່ນ', 'ກາສີ', 'ວຽງຈັນ', '02095674367', '', 'ພະນັກງານ', 'ແສງ');
INSERT INTO `tb_mother` VALUES (27, 28, 'ຈັນທາ', 'ແກ້ວທິດາ', '1986-06-07', 'ໂພນທັນ', 'ກາສີ', 'ວຽງຈັນ', '02054790789', '', 'ປະຊາຊົນ', 'ແສງ');
INSERT INTO `tb_mother` VALUES (28, 29, 'ຕູນ', 'ພົມມະຈັກ', '1986-06-13', 'ນາແທ່ນ', 'ກາສີ', 'ວຽງຈັນ', '02095689234', '', 'ພະນັກງານ', 'ແສງ');
INSERT INTO `tb_mother` VALUES (29, 30, 'ໂນ', 'ສີຫາລາດ', '1984-06-12', 'ນາແທ່ນ', 'ກາສີ', 'ວຽງຈັນ', '02056874536', '', 'ປະຊາຊົນ', 'ແສງ');
INSERT INTO `tb_mother` VALUES (30, 8, 'bdfgfd', 'fdgdf', '2019-06-18', 'fgfg', 'dfgdf', 'fgfdg', '8475664556', '', 'uyiu', '');

-- ----------------------------
-- Table structure for tb_point
-- ----------------------------
DROP TABLE IF EXISTS `tb_point`;
CREATE TABLE `tb_point`  (
  `p_id` int(10) NOT NULL AUTO_INCREMENT,
  `s_id` int(10) NOT NULL,
  `class_id` int(5) NULL DEFAULT NULL,
  `sub_id` int(3) NOT NULL,
  `point` int(3) NOT NULL,
  `p_month` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `p_remark` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `p_part` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `user` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `time` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`p_id`) USING BTREE,
  INDEX `s_id`(`s_id`) USING BTREE,
  INDEX `sub_id`(`sub_id`) USING BTREE,
  INDEX `class_id`(`class_id`) USING BTREE,
  CONSTRAINT `tb_point_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `student` (`s_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `tb_point_ibfk_2` FOREIGN KEY (`sub_id`) REFERENCES `subject` (`sub_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `tb_point_ibfk_3` FOREIGN KEY (`class_id`) REFERENCES `class_room` (`class_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 150 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_point
-- ----------------------------
INSERT INTO `tb_point` VALUES (1, 3, 11, 13, 10, '06', '', '2019-2020', 'ແສງ', '2019-06-19 00:53:22');
INSERT INTO `tb_point` VALUES (2, 3, 11, 14, 8, '06', '', '2019-2020', 'ແສງ', '2019-06-19 00:53:41');
INSERT INTO `tb_point` VALUES (3, 3, 11, 15, 5, '06', '', '2019-2020', 'ແສງ', '2019-06-19 00:53:45');
INSERT INTO `tb_point` VALUES (4, 3, 11, 17, 6, '06', '', '2019-2020', 'ແສງ', '2019-06-19 00:53:53');
INSERT INTO `tb_point` VALUES (5, 3, 11, 18, 7, '06', '', '2019-2020', 'ແສງ', '2019-06-19 00:53:58');
INSERT INTO `tb_point` VALUES (6, 3, 11, 19, 5, '06', '', '2019-2020', 'ແສງ', '2019-06-19 00:54:03');
INSERT INTO `tb_point` VALUES (7, 3, 11, 20, 7, '06', '', '2019-2020', 'ແສງ', '2019-06-19 00:54:07');
INSERT INTO `tb_point` VALUES (8, 3, 11, 21, 9, '06', '', '2019-2020', 'ແສງ', '2019-06-19 00:54:15');
INSERT INTO `tb_point` VALUES (9, 3, 11, 22, 8, '06', '', '2019-2020', 'ແສງ', '2019-06-19 00:54:19');
INSERT INTO `tb_point` VALUES (10, 4, 11, 13, 7, '06', '', '2019-2020', 'ແສງ', '2019-06-19 00:54:48');
INSERT INTO `tb_point` VALUES (11, 4, 11, 14, 8, '06', '', '2019-2020', 'ແສງ', '2019-06-19 00:54:57');
INSERT INTO `tb_point` VALUES (12, 4, 11, 15, 6, '06', '', '2019-2020', 'ແສງ', '2019-06-19 00:55:01');
INSERT INTO `tb_point` VALUES (13, 4, 11, 17, 5, '06', '', '2019-2020', 'ແສງ', '2019-06-19 00:55:09');
INSERT INTO `tb_point` VALUES (14, 4, 11, 18, 6, '06', '', '2019-2020', 'ແສງ', '2019-06-19 00:55:13');
INSERT INTO `tb_point` VALUES (15, 4, 11, 19, 4, '06', '', '2019-2020', 'ແສງ', '2019-06-19 00:55:17');
INSERT INTO `tb_point` VALUES (16, 4, 11, 20, 2, '06', '', '2019-2020', 'ແສງ', '2019-06-19 00:55:21');
INSERT INTO `tb_point` VALUES (17, 4, 11, 21, 6, '06', '', '2019-2020', 'ແສງ', '2019-06-19 00:55:25');
INSERT INTO `tb_point` VALUES (18, 4, 11, 22, 10, '06', '', '2019-2020', 'ແສງ', '2019-06-19 00:55:28');
INSERT INTO `tb_point` VALUES (19, 5, 11, 13, 5, '06', '', '2019-2020', 'ແສງ', '2019-06-19 00:55:54');
INSERT INTO `tb_point` VALUES (20, 5, 11, 14, 2, '06', '', '2019-2020', 'ແສງ', '2019-06-19 00:56:07');
INSERT INTO `tb_point` VALUES (21, 5, 11, 15, 8, '06', '', '2019-2020', 'ແສງ', '2019-06-19 00:56:15');
INSERT INTO `tb_point` VALUES (22, 5, 11, 17, 8, '06', '', '2019-2020', 'ແສງ', '2019-06-19 00:56:23');
INSERT INTO `tb_point` VALUES (23, 5, 11, 18, 2, '06', '', '2019-2020', 'ແສງ', '2019-06-19 00:56:28');
INSERT INTO `tb_point` VALUES (24, 5, 11, 19, 2, '06', '', '2019-2020', 'ແສງ', '2019-06-19 00:56:32');
INSERT INTO `tb_point` VALUES (25, 5, 11, 20, 7, '06', '', '2019-2020', 'ແສງ', '2019-06-19 00:56:40');
INSERT INTO `tb_point` VALUES (26, 5, 11, 21, 4, '06', '', '2019-2020', 'ແສງ', '2019-06-19 00:56:45');
INSERT INTO `tb_point` VALUES (27, 5, 11, 22, 10, '06', '', '2019-2020', 'ແສງ', '2019-06-19 00:56:51');
INSERT INTO `tb_point` VALUES (28, 6, 11, 13, 10, '06', '', '2019-2020', 'ແສງ', '2019-06-19 00:57:18');
INSERT INTO `tb_point` VALUES (29, 6, 11, 14, 5, '06', '', '2019-2020', 'ແສງ', '2019-06-19 00:57:31');
INSERT INTO `tb_point` VALUES (30, 6, 11, 15, 8, '06', '', '2019-2020', 'ແສງ', '2019-06-19 00:57:43');
INSERT INTO `tb_point` VALUES (31, 6, 11, 17, 5, '06', '', '2019-2020', 'ແສງ', '2019-06-19 00:57:49');
INSERT INTO `tb_point` VALUES (32, 6, 11, 18, 8, '06', '', '2019-2020', 'ແສງ', '2019-06-19 00:57:54');
INSERT INTO `tb_point` VALUES (33, 6, 11, 19, 7, '06', '', '2019-2020', 'ແສງ', '2019-06-19 00:57:58');
INSERT INTO `tb_point` VALUES (34, 6, 11, 20, 9, '06', '', '2019-2020', 'ແສງ', '2019-06-19 00:58:02');
INSERT INTO `tb_point` VALUES (35, 6, 11, 21, 10, '06', '', '2019-2020', 'ແສງ', '2019-06-19 00:58:06');
INSERT INTO `tb_point` VALUES (36, 6, 11, 22, 3, '06', '', '2019-2020', 'ແສງ', '2019-06-19 00:58:11');
INSERT INTO `tb_point` VALUES (37, 7, 11, 13, 10, '06', '', '2019-2020', 'ແສງ', '2019-06-19 00:58:22');
INSERT INTO `tb_point` VALUES (38, 7, 11, 14, 7, '06', '', '2019-2020', 'ແສງ', '2019-06-19 00:58:39');
INSERT INTO `tb_point` VALUES (39, 7, 11, 15, 5, '06', '', '2019-2020', 'ແສງ', '2019-06-19 00:58:43');
INSERT INTO `tb_point` VALUES (40, 7, 11, 17, 1, '06', '', '2019-2020', 'ແສງ', '2019-06-19 00:58:52');
INSERT INTO `tb_point` VALUES (41, 7, 11, 18, 7, '06', '', '2019-2020', 'ແສງ', '2019-06-19 00:58:56');
INSERT INTO `tb_point` VALUES (42, 7, 11, 19, 6, '06', '', '2019-2020', 'ແສງ', '2019-06-19 00:59:01');
INSERT INTO `tb_point` VALUES (43, 7, 11, 20, 7, '06', '', '2019-2020', 'ແສງ', '2019-06-19 00:59:05');
INSERT INTO `tb_point` VALUES (44, 7, 11, 21, 7, '06', '', '2019-2020', 'ແສງ', '2019-06-19 00:59:08');
INSERT INTO `tb_point` VALUES (45, 7, 11, 22, 10, '06', '', '2019-2020', 'ແສງ', '2019-06-19 00:59:13');
INSERT INTO `tb_point` VALUES (46, 8, 11, 13, 2, '06', '', '2019-2020', 'ແສງ', '2019-06-19 01:00:00');
INSERT INTO `tb_point` VALUES (47, 8, 11, 14, 10, '06', '', '2019-2020', 'ແສງ', '2019-06-19 01:01:33');
INSERT INTO `tb_point` VALUES (48, 8, 11, 15, 6, '06', '', '2019-2020', 'ແສງ', '2019-06-19 01:01:36');
INSERT INTO `tb_point` VALUES (49, 8, 11, 17, 9, '06', '', '2019-2020', 'ແສງ', '2019-06-19 01:01:49');
INSERT INTO `tb_point` VALUES (50, 8, 11, 18, 5, '06', '', '2019-2020', 'ແສງ', '2019-06-19 01:01:53');
INSERT INTO `tb_point` VALUES (51, 8, 11, 19, 7, '06', '', '2019-2020', 'ແສງ', '2019-06-19 01:01:57');
INSERT INTO `tb_point` VALUES (52, 8, 11, 20, 8, '06', '', '2019-2020', 'ແສງ', '2019-06-19 01:02:01');
INSERT INTO `tb_point` VALUES (53, 8, 11, 21, 9, '06', '', '2019-2020', 'ແສງ', '2019-06-19 01:02:06');
INSERT INTO `tb_point` VALUES (54, 8, 11, 22, 5, '06', '', '2019-2020', 'ແສງ', '2019-06-19 01:02:10');
INSERT INTO `tb_point` VALUES (55, 1, 12, 13, 10, '06', '', '2019-2020', 'ແສງ', '2019-06-19 10:44:49');
INSERT INTO `tb_point` VALUES (56, 1, 12, 14, 8, '06', '', '2019-2020', 'ແສງ', '2019-06-19 10:44:55');
INSERT INTO `tb_point` VALUES (57, 1, 12, 15, 7, '06', '', '2019-2020', 'ແສງ', '2019-06-19 10:45:00');
INSERT INTO `tb_point` VALUES (58, 1, 12, 17, 6, '06', '', '2019-2020', 'ແສງ', '2019-06-19 10:45:06');
INSERT INTO `tb_point` VALUES (59, 1, 12, 18, 6, '06', '', '2019-2020', 'ແສງ', '2019-06-19 10:45:10');
INSERT INTO `tb_point` VALUES (60, 1, 12, 19, 5, '06', '', '2019-2020', 'ແສງ', '2019-06-19 10:45:15');
INSERT INTO `tb_point` VALUES (61, 1, 12, 20, 5, '06', '', '2019-2020', 'ແສງ', '2019-06-19 10:45:19');
INSERT INTO `tb_point` VALUES (62, 1, 12, 21, 9, '06', '', '2019-2020', 'ແສງ', '2019-06-19 10:46:13');
INSERT INTO `tb_point` VALUES (63, 1, 12, 22, 10, '06', '', '2019-2020', 'ແສງ', '2019-06-19 10:46:17');
INSERT INTO `tb_point` VALUES (64, 9, 12, 13, 9, '06', '', '2019-2020', 'ແສງ', '2019-06-19 10:46:30');
INSERT INTO `tb_point` VALUES (65, 9, 12, 14, 6, '06', '', '2019-2020', 'ແສງ', '2019-06-19 10:46:35');
INSERT INTO `tb_point` VALUES (66, 9, 12, 15, 7, '06', '', '2019-2020', 'ແສງ', '2019-06-19 10:46:40');
INSERT INTO `tb_point` VALUES (67, 9, 12, 17, 1, '06', '', '2019-2020', 'ແສງ', '2019-06-19 10:46:49');
INSERT INTO `tb_point` VALUES (68, 9, 12, 18, 0, '06', '', '2019-2020', 'ແສງ', '2019-06-19 10:46:54');
INSERT INTO `tb_point` VALUES (69, 9, 12, 19, 7, '06', '', '2019-2020', 'ແສງ', '2019-06-19 10:46:58');
INSERT INTO `tb_point` VALUES (70, 9, 12, 20, 3, '06', '', '2019-2020', 'ແສງ', '2019-06-19 10:47:02');
INSERT INTO `tb_point` VALUES (71, 9, 12, 21, 4, '06', '', '2019-2020', 'ແສງ', '2019-06-19 10:47:07');
INSERT INTO `tb_point` VALUES (72, 9, 12, 22, 8, '06', '', '2019-2020', 'ແສງ', '2019-06-19 10:47:11');
INSERT INTO `tb_point` VALUES (73, 10, 12, 13, 10, '06', '', '2019-2020', 'ແສງ', '2019-06-19 10:53:40');
INSERT INTO `tb_point` VALUES (74, 10, 12, 14, 1, '06', '', '2019-2020', 'ແສງ', '2019-06-19 10:53:45');
INSERT INTO `tb_point` VALUES (75, 10, 12, 15, 5, '06', '', '2019-2020', 'ແສງ', '2019-06-19 10:53:49');
INSERT INTO `tb_point` VALUES (76, 10, 12, 17, 8, '06', '', '2019-2020', 'ແສງ', '2019-06-19 10:53:57');
INSERT INTO `tb_point` VALUES (77, 10, 12, 18, 9, '06', '', '2019-2020', 'ແສງ', '2019-06-19 10:54:00');
INSERT INTO `tb_point` VALUES (78, 10, 12, 19, 8, '06', '', '2019-2020', 'ແສງ', '2019-06-19 10:54:04');
INSERT INTO `tb_point` VALUES (79, 10, 12, 20, 3, '06', '', '2019-2020', 'ແສງ', '2019-06-19 10:54:08');
INSERT INTO `tb_point` VALUES (80, 10, 12, 21, 1, '06', '', '2019-2020', 'ແສງ', '2019-06-19 10:54:12');
INSERT INTO `tb_point` VALUES (81, 10, 12, 22, 5, '06', '', '2019-2020', 'ແສງ', '2019-06-19 10:54:16');
INSERT INTO `tb_point` VALUES (82, 11, 12, 13, 5, '06', '', '2019-2020', 'ແສງ', '2019-06-19 10:54:41');
INSERT INTO `tb_point` VALUES (83, 11, 12, 14, 7, '06', '', '2019-2020', 'ແສງ', '2019-06-19 10:54:45');
INSERT INTO `tb_point` VALUES (84, 11, 12, 15, 3, '06', '', '2019-2020', 'ແສງ', '2019-06-19 10:54:48');
INSERT INTO `tb_point` VALUES (85, 11, 12, 17, 5, '06', '', '2019-2020', 'ແສງ', '2019-06-19 10:54:55');
INSERT INTO `tb_point` VALUES (86, 11, 12, 18, 6, '06', '', '2019-2020', 'ແສງ', '2019-06-19 10:55:00');
INSERT INTO `tb_point` VALUES (87, 11, 12, 19, 4, '06', '', '2019-2020', 'ແສງ', '2019-06-19 10:55:03');
INSERT INTO `tb_point` VALUES (88, 11, 12, 20, 4, '06', '', '2019-2020', 'ແສງ', '2019-06-19 10:55:06');
INSERT INTO `tb_point` VALUES (89, 11, 12, 21, 5, '06', '', '2019-2020', 'ແສງ', '2019-06-19 10:55:10');
INSERT INTO `tb_point` VALUES (90, 11, 12, 22, 5, '06', '', '2019-2020', 'ແສງ', '2019-06-19 10:55:15');
INSERT INTO `tb_point` VALUES (91, 12, 12, 13, 5, '06', '', '2019-2020', 'ແສງ', '2019-06-19 10:55:22');
INSERT INTO `tb_point` VALUES (92, 12, 12, 14, 3, '06', '', '2019-2020', 'ແສງ', '2019-06-19 10:55:26');
INSERT INTO `tb_point` VALUES (93, 12, 12, 15, 7, '06', '', '2019-2020', 'ແສງ', '2019-06-19 10:55:30');
INSERT INTO `tb_point` VALUES (94, 12, 12, 17, 7, '06', '', '2019-2020', 'ແສງ', '2019-06-19 10:55:42');
INSERT INTO `tb_point` VALUES (95, 12, 12, 18, 9, '06', '', '2019-2020', 'ແສງ', '2019-06-19 10:55:45');
INSERT INTO `tb_point` VALUES (96, 12, 12, 19, 6, '06', '', '2019-2020', 'ແສງ', '2019-06-19 10:55:49');
INSERT INTO `tb_point` VALUES (97, 12, 12, 20, 8, '06', '', '2019-2020', 'ແສງ', '2019-06-19 10:55:52');
INSERT INTO `tb_point` VALUES (98, 12, 12, 21, 7, '06', '', '2019-2020', 'ແສງ', '2019-06-19 10:55:54');
INSERT INTO `tb_point` VALUES (99, 12, 12, 22, 8, '06', '', '2019-2020', 'ແສງ', '2019-06-19 10:55:58');
INSERT INTO `tb_point` VALUES (104, 13, 13, 13, 8, '06', '', '2019-2020', 'ແສງ', '2019-06-23 16:06:36');
INSERT INTO `tb_point` VALUES (105, 13, 13, 14, 7, '06', '', '2019-2020', 'ແສງ', '2019-06-23 16:06:40');
INSERT INTO `tb_point` VALUES (106, 13, 13, 15, 9, '06', '', '2019-2020', 'ແສງ', '2019-06-23 16:06:45');
INSERT INTO `tb_point` VALUES (107, 13, 13, 17, 9, '06', '', '2019-2020', 'ແສງ', '2019-06-23 16:06:56');
INSERT INTO `tb_point` VALUES (108, 13, 13, 18, 4, '06', '', '2019-2020', 'ແສງ', '2019-06-23 16:07:02');
INSERT INTO `tb_point` VALUES (109, 13, 13, 19, 9, '06', '', '2019-2020', 'ແສງ', '2019-06-23 16:07:06');
INSERT INTO `tb_point` VALUES (110, 13, 13, 20, 1, '06', '', '2019-2020', 'ແສງ', '2019-06-23 16:07:11');
INSERT INTO `tb_point` VALUES (111, 13, 13, 21, 10, '06', '', '2019-2020', 'ແສງ', '2019-06-23 16:07:17');
INSERT INTO `tb_point` VALUES (112, 13, 13, 22, 3, '06', '', '2019-2020', 'ແສງ', '2019-06-23 16:07:22');
INSERT INTO `tb_point` VALUES (113, 14, 13, 13, 7, '06', '', '2019-2020', 'ແສງ', '2019-06-23 16:07:34');
INSERT INTO `tb_point` VALUES (114, 14, 13, 14, 5, '06', '', '2019-2020', 'ແສງ', '2019-06-23 16:07:37');
INSERT INTO `tb_point` VALUES (115, 14, 13, 15, 5, '06', '', '2019-2020', 'ແສງ', '2019-06-23 16:07:41');
INSERT INTO `tb_point` VALUES (116, 14, 13, 17, 9, '06', '', '2019-2020', 'ແສງ', '2019-06-23 16:07:48');
INSERT INTO `tb_point` VALUES (117, 14, 13, 18, 6, '06', '', '2019-2020', 'ແສງ', '2019-06-23 16:07:52');
INSERT INTO `tb_point` VALUES (118, 14, 13, 19, 5, '06', '', '2019-2020', 'ແສງ', '2019-06-23 16:07:56');
INSERT INTO `tb_point` VALUES (119, 14, 13, 20, 0, '06', '', '2019-2020', 'ແສງ', '2019-06-23 16:08:00');
INSERT INTO `tb_point` VALUES (120, 14, 13, 21, 3, '06', '', '2019-2020', 'ແສງ', '2019-06-23 16:08:04');
INSERT INTO `tb_point` VALUES (121, 14, 13, 22, 4, '06', '', '2019-2020', 'ແສງ', '2019-06-23 16:08:08');
INSERT INTO `tb_point` VALUES (122, 20, 9, 13, 10, '06', '', '2019-2020', 'ແສງ', '2019-06-23 16:58:22');
INSERT INTO `tb_point` VALUES (123, 17, 13, 13, 10, '06', '', '2019-2020', 'ແສງ', '2019-06-23 23:04:31');
INSERT INTO `tb_point` VALUES (124, 17, 13, 14, 10, '06', '', '2019-2020', 'ແສງ', '2019-06-23 23:04:37');
INSERT INTO `tb_point` VALUES (125, 17, 13, 15, 10, '06', '', '2019-2020', 'ແສງ', '2019-06-23 23:04:44');
INSERT INTO `tb_point` VALUES (126, 17, 13, 17, 10, '06', '', '2019-2020', 'ແສງ', '2019-06-23 23:04:54');
INSERT INTO `tb_point` VALUES (127, 17, 13, 18, 10, '06', '', '2019-2020', 'ແສງ', '2019-06-23 23:04:59');
INSERT INTO `tb_point` VALUES (128, 17, 13, 19, 10, '06', '', '2019-2020', 'ແສງ', '2019-06-23 23:05:04');
INSERT INTO `tb_point` VALUES (129, 17, 13, 20, 10, '06', '', '2019-2020', 'ແສງ', '2019-06-23 23:05:09');
INSERT INTO `tb_point` VALUES (130, 17, 13, 21, 10, '06', '', '2019-2020', 'ແສງ', '2019-06-23 23:05:14');
INSERT INTO `tb_point` VALUES (131, 17, 13, 22, 10, '06', '', '2019-2020', 'ແສງ', '2019-06-23 23:05:19');
INSERT INTO `tb_point` VALUES (132, 15, 13, 13, 10, '06', '', '2019-2020', 'ແສງ', '2019-06-23 23:56:41');
INSERT INTO `tb_point` VALUES (133, 15, 13, 14, 7, '06', '', '2019-2020', 'ແສງ', '2019-06-23 23:56:49');
INSERT INTO `tb_point` VALUES (134, 15, 13, 15, 8, '06', '', '2019-2020', 'ແສງ', '2019-06-23 23:56:56');
INSERT INTO `tb_point` VALUES (135, 15, 13, 17, 8, '06', '', '2019-2020', 'ແສງ', '2019-06-23 23:57:07');
INSERT INTO `tb_point` VALUES (136, 15, 13, 18, 7, '06', '', '2019-2020', 'ແສງ', '2019-06-23 23:57:13');
INSERT INTO `tb_point` VALUES (137, 15, 13, 19, 10, '06', '', '2019-2020', 'ແສງ', '2019-06-23 23:57:18');
INSERT INTO `tb_point` VALUES (138, 15, 13, 20, 8, '06', '', '2019-2020', 'ແສງ', '2019-06-23 23:57:23');
INSERT INTO `tb_point` VALUES (139, 15, 13, 21, 10, '06', '', '2019-2020', 'ແສງ', '2019-06-23 23:57:28');
INSERT INTO `tb_point` VALUES (140, 15, 13, 22, 9, '06', '', '2019-2020', 'ແສງ', '2019-06-23 23:57:33');
INSERT INTO `tb_point` VALUES (141, 28, 8, 13, 10, '06', '', '2019-2020', 'ແສງ', '2019-06-29 13:54:12');
INSERT INTO `tb_point` VALUES (142, 28, 8, 14, 8, '06', '', '2019-2020', 'ແສງ', '2019-06-29 13:55:15');
INSERT INTO `tb_point` VALUES (143, 28, 8, 15, 7, '06', '', '2019-2020', 'ແສງ', '2019-06-29 13:55:25');
INSERT INTO `tb_point` VALUES (144, 28, 8, 17, 10, '06', '', '2019-2020', 'ແສງ', '2019-06-29 13:55:40');
INSERT INTO `tb_point` VALUES (145, 28, 8, 18, 8, '06', '', '2019-2020', 'ແສງ', '2019-06-29 13:55:53');
INSERT INTO `tb_point` VALUES (146, 28, 8, 19, 8, '06', '', '2019-2020', 'ແສງ', '2019-06-29 13:56:01');
INSERT INTO `tb_point` VALUES (147, 28, 8, 20, 9, '06', '', '2019-2020', 'ແສງ', '2019-06-29 13:56:08');
INSERT INTO `tb_point` VALUES (148, 28, 8, 21, 9, '06', '', '2019-2020', 'ແສງ', '2019-06-29 13:56:15');
INSERT INTO `tb_point` VALUES (149, 28, 8, 22, 7, '06', '', '2019-2020', 'ແສງ', '2019-06-29 13:56:22');

-- ----------------------------
-- Table structure for teacher
-- ----------------------------
DROP TABLE IF EXISTS `teacher`;
CREATE TABLE `teacher`  (
  `teach_id` int(5) NOT NULL AUTO_INCREMENT,
  `teach_fname` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `teach_lname` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `teach_gender` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `teach_dob` date NOT NULL,
  `teach_address` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `teach_tel` int(15) NOT NULL,
  `teach_lvl` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sty_branch` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `build_teach` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `time` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`teach_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of teacher
-- ----------------------------
INSERT INTO `teacher` VALUES (3, 'ຄຳໝັ້ນ', 'ຫຼວງໄຊ', 'ທ້າວ', '0072-07-08', 'ບ້ານ ນາໝົນ', 2098927674, 'ປະລິນຍາຕີ', 'ທົ່ວໄປ', 'ຄູອະນູບານ (8+3)', 'admin', '2019-06-16 10:53:26');
INSERT INTO `teacher` VALUES (4, 'ແກ້ວ', 'ສຸຂະເສີມ', 'ທ້າວ', '1973-10-13', 'ບ້ານ ນາແທ່ນ', 20, 'ປະລິນຍາຕີ', 'ສ້າງຄູ', 'ຄູປະຖົມ(11+1)+3', 'admin', '2019-06-16 10:57:43');
INSERT INTO `teacher` VALUES (5, 'ແສງເພັດ', 'ສີສຸພອນ', 'ນາງ', '1987-04-14', 'ບ້ານ ນາແທ່ນ,ເມືອງ ກາສີ,ແຂວງ ວຽງຈັນ', 20, 'ປະລິນຍາຕີ', 'ສ້າງຄູ', 'ຄູປະຖົມ(11+1)+3', 'admin', '2019-06-16 11:01:53');
INSERT INTO `teacher` VALUES (6, 'ບຸນມີ', 'ສີວິໄລທອງ', 'ທ້າວ', '1960-03-02', 'ບ້ານ ນາແທ່ນ,ເມືອງ ກາສີ,ແຂວງ ວຽງຈັນ', 20, 'ປະລິນຍາຕີ', 'ສ້າງຄູ', 'ຄູອະນູບານ (8+3)', 'admin', '2019-06-16 11:04:52');
INSERT INTO `teacher` VALUES (7, 'ສົມພອນ', 'ຈັນທະກຸນ', 'ນາງ', '1974-06-08', 'ບ້ານ ນາແທ່ນ,ເມືອງ ກາສີ,ແຂວງ ວຽງຈັນ', 20987, 'ປະລິນຍາຕີ', 'ທົ່ວໄປ', 'ປະຖົມ(8+3)', 'admin', '2019-06-16 11:53:47');

-- ----------------------------
-- Table structure for up_room
-- ----------------------------
DROP TABLE IF EXISTS `up_room`;
CREATE TABLE `up_room`  (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `s_id` int(6) NOT NULL,
  `class_id` int(6) NOT NULL,
  `gener` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `part` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `up_status` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `user_up` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `time_up` datetime(0) NOT NULL,
  PRIMARY KEY (`ID`) USING BTREE,
  INDEX `class_id`(`class_id`) USING BTREE,
  INDEX `s_id`(`s_id`) USING BTREE,
  CONSTRAINT `up_room_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `student` (`s_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `up_room_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `class_room` (`class_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 39 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of up_room
-- ----------------------------
INSERT INTO `up_room` VALUES (2, 1, 12, '1', '2019-2020', NULL, 'ແສງ', '2019-06-16 16:51:13');
INSERT INTO `up_room` VALUES (7, 3, 11, '1', '2019-2020', '', 'ແສງ', '2019-06-17 10:14:45');
INSERT INTO `up_room` VALUES (8, 4, 11, '1', '2019-2020', '', 'ແສງ', '2019-06-17 10:21:57');
INSERT INTO `up_room` VALUES (9, 5, 11, '1', '2019-2020', '', 'ແສງ', '2019-06-17 10:29:09');
INSERT INTO `up_room` VALUES (10, 6, 11, '1', '2019-2020', '', 'ແສງ', '2019-06-17 10:37:05');
INSERT INTO `up_room` VALUES (11, 7, 11, '1', '2019-2020', '', 'ແສງ', '2019-06-17 10:44:21');
INSERT INTO `up_room` VALUES (12, 8, 11, '1', '2019-2020', '', 'ແສງ', '2019-06-17 10:51:12');
INSERT INTO `up_room` VALUES (15, 9, 12, '1', '2019-2020', '', 'ແສງ', '2019-06-17 11:13:44');
INSERT INTO `up_room` VALUES (16, 10, 12, '1', '2019-2020', '', 'ແສງ', '2019-06-17 11:19:04');
INSERT INTO `up_room` VALUES (17, 11, 12, '1', '2019-2020', '', 'ແສງ', '2019-06-17 11:24:39');
INSERT INTO `up_room` VALUES (18, 12, 12, '1', '2019-2020', '', 'ແສງ', '2019-06-17 11:29:19');
INSERT INTO `up_room` VALUES (19, 13, 13, '1', '2019-2020', '', 'ແສງ', '2019-06-17 12:29:01');
INSERT INTO `up_room` VALUES (20, 14, 13, '1', '2019-2020', '', 'ແສງ', '2019-06-17 12:32:50');
INSERT INTO `up_room` VALUES (21, 15, 13, '1', '2019-2020', '', 'ແສງ', '2019-06-17 12:37:22');
INSERT INTO `up_room` VALUES (22, 16, 13, '1', '2019-2020', '', 'ແສງ', '2019-06-17 12:41:36');
INSERT INTO `up_room` VALUES (23, 17, 13, '1', '2019-2020', '', 'ແສງ', '2019-06-17 12:45:25');
INSERT INTO `up_room` VALUES (24, 18, 13, '1', '2019-2020', '', 'ແສງ', '2019-06-17 12:49:08');
INSERT INTO `up_room` VALUES (25, 19, 9, '1', '2019-2020', '', 'ແສງ', '2019-06-17 12:55:44');
INSERT INTO `up_room` VALUES (26, 20, 9, '1', '2019-2020', '', 'ແສງ', '2019-06-17 13:00:06');
INSERT INTO `up_room` VALUES (27, 21, 9, '1', '2019-2020', '', 'ແສງ', '2019-06-17 13:03:39');
INSERT INTO `up_room` VALUES (28, 22, 9, '1', '2019-2020', '', 'ແສງ', '2019-06-17 13:07:53');
INSERT INTO `up_room` VALUES (29, 23, 9, '1', '2019-2020', '', 'ແສງ', '2019-06-17 13:12:36');
INSERT INTO `up_room` VALUES (30, 24, 9, '1', '2019-2020', '', 'ແສງ', '2019-06-17 13:16:30');
INSERT INTO `up_room` VALUES (31, 25, 8, '1', '2019-2020', '', 'ແສງ', '2019-06-17 13:22:41');
INSERT INTO `up_room` VALUES (32, 26, 8, '1', '2019-2020', '', 'ແສງ', '2019-06-17 13:26:14');
INSERT INTO `up_room` VALUES (33, 27, 8, '1', '2019-2020', '', 'ແສງ', '2019-06-17 13:29:54');
INSERT INTO `up_room` VALUES (34, 28, 8, '1', '2019-2020', '', 'ແສງ', '2019-06-17 13:33:47');
INSERT INTO `up_room` VALUES (35, 29, 8, '1', '2019-2020', '', 'ແສງ', '2019-06-17 13:39:43');
INSERT INTO `up_room` VALUES (36, 30, 8, '1', '2019-2020', '', 'ແສງ', '2019-06-17 13:44:37');
INSERT INTO `up_room` VALUES (38, 32, 8, '1', '2019-2020', '', 'ແສງ', '2019-06-29 18:48:22');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `userid` int(5) NOT NULL AUTO_INCREMENT,
  `fname` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `lname` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `gender` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tel` int(15) NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `pass` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `status` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `time` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`userid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (3, 'ແສງ', 'ມະນີວອນ', 'ທ້າວ', '1996-06-04', 'ບ້ານ ໂພນທັນ ເມືອງ ກາສີ,ແຂວງ ວຽງຈັນ', 2097453112, 'saeng@gmail.com', 'ແສງ', '555', 'admin', '2019-06-16 12:21:34');

-- ----------------------------
-- Table structure for village
-- ----------------------------
DROP TABLE IF EXISTS `village`;
CREATE TABLE `village`  (
  `vill_id` int(4) NOT NULL AUTO_INCREMENT,
  `dis_id` int(3) NOT NULL,
  `vill_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`vill_id`) USING BTREE,
  INDEX `dis_id`(`dis_id`) USING BTREE,
  CONSTRAINT `village_ibfk_1` FOREIGN KEY (`dis_id`) REFERENCES `district` (`dis_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of village
-- ----------------------------
INSERT INTO `village` VALUES (8, 2013, 'ນາແທ່ນ');
INSERT INTO `village` VALUES (9, 2013, 'ໂພນທັນ');
INSERT INTO `village` VALUES (10, 2002, 'ໂພສີ');

-- ----------------------------
-- View structure for view_address
-- ----------------------------
DROP VIEW IF EXISTS `view_address`;
CREATE ALGORITHM = UNDEFINED DEFINER = `root`@`localhost` SQL SECURITY DEFINER VIEW `view_address` AS SELECT
district.dis_name,
province.pro_name,
village.vill_id,
village.dis_id,
village.vill_name
FROM
district
INNER JOIN province ON district.pro_id = province.pro_id
INNER JOIN village ON village.dis_id = district.dis_id ;

-- ----------------------------
-- View structure for view_miss
-- ----------------------------
DROP VIEW IF EXISTS `view_miss`;
CREATE ALGORITHM = UNDEFINED DEFINER = `root`@`localhost` SQL SECURITY DEFINER VIEW `view_miss` AS SELECT
student.s_num,
student.s_gender,
student.s_fname,
student.s_lname,
up_room.class_id,
up_room.part,
up_room.gener,
tb_miss.miss_id,
tb_miss.s_id,
tb_miss.sub_id,
tb_miss.miss_date,
tb_miss.miss_hours,
tb_miss.miss_reason,
tb_miss.m_part,
tb_miss.user,
tb_miss.time,
subject.sub_name,
subject.sub_remark,
subject.teach_id,
teacher.teach_fname,
teacher.teach_lname,
teacher.teach_gender
FROM
student
INNER JOIN up_room ON up_room.s_id = student.s_id
INNER JOIN tb_miss ON tb_miss.s_id = student.s_id
INNER JOIN subject ON tb_miss.sub_id = subject.sub_id
INNER JOIN teacher ON subject.teach_id = teacher.teach_id ;

-- ----------------------------
-- View structure for view_point
-- ----------------------------
DROP VIEW IF EXISTS `view_point`;
CREATE ALGORITHM = UNDEFINED DEFINER = `root`@`localhost` SQL SECURITY DEFINER VIEW `view_point` AS SELECT
student.s_gender,
student.s_fname,
student.s_lname,
student.s_num,
tb_point.class_id,
tb_point.sub_id,
`subject`.sub_name,
`subject`.sub_remark,
tb_point.point,
tb_point.p_month,
tb_point.p_remark,
tb_point.p_part,
tb_point.p_id,
tb_point.s_id,
up_room.gener,
up_room.part,
up_room.ID
FROM
student
INNER JOIN tb_point ON tb_point.s_id = student.s_id
INNER JOIN `subject` ON tb_point.sub_id = `subject`.sub_id
INNER JOIN up_room ON up_room.s_id = student.s_id ;

-- ----------------------------
-- View structure for view_ranks
-- ----------------------------
DROP VIEW IF EXISTS `view_ranks`;
CREATE ALGORITHM = UNDEFINED DEFINER = `root`@`localhost` SQL SECURITY DEFINER VIEW `view_ranks` AS SELECT
class_room.class_name,
class_room.class_remark,
ranks.r_id,
ranks.s_id,
ranks.class_id,
ranks.score,
ranks.r_month,
ranks.r_part,
ranks.`user`,
up_room.gener,
up_room.up_status
FROM
ranks
INNER JOIN class_room ON ranks.class_id = class_room.class_id
INNER JOIN up_room ON up_room.class_id = class_room.class_id ;

-- ----------------------------
-- View structure for view_room
-- ----------------------------
DROP VIEW IF EXISTS `view_room`;
CREATE ALGORITHM = UNDEFINED DEFINER = `root`@`localhost` SQL SECURITY DEFINER VIEW `view_room` AS SELECT
teacher.teach_id,
teacher.teach_fname,
teacher.teach_lname,
teacher.teach_gender,
teacher.teach_dob,
teacher.teach_address,
teacher.teach_tel,
teacher.teach_lvl,
teacher.sty_branch,
teacher.build_teach,
teacher.`user`,
teacher.time,
class_room.class_name,
class_room.class_remark,
class_room.class_id
FROM
teacher
INNER JOIN class_room ON class_room.teach_id = teacher.teach_id ;

-- ----------------------------
-- View structure for view_score
-- ----------------------------
DROP VIEW IF EXISTS `view_score`;
CREATE ALGORITHM = UNDEFINED DEFINER = `root`@`localhost` SQL SECURITY DEFINER VIEW `view_score` AS SELECT
subject.sub_remark,
subject.sub_name,
tb_point.p_id,
tb_point.s_id,
tb_point.class_id,
tb_point.sub_id,
tb_point.point,
tb_point.p_month,
tb_point.p_remark,
tb_point.user,
tb_point.time,
student.s_num,
student.s_gender,
student.s_fname,
student.s_lname,
student.s_dob,
student.s_vill_name,
student.s_dis_name,
student.s_pro_name,
student.s_tel,
student.national,
student.trib,
student.s_status,
student.s_remark,
student.plash,
class_room.class_name,
class_room.class_remark,
tb_point.p_part,
up_room.gener,
up_room.part
FROM
tb_point
INNER JOIN subject ON tb_point.sub_id = subject.sub_id
INNER JOIN student ON tb_point.s_id = student.s_id
INNER JOIN class_room ON tb_point.class_id = class_room.class_id
INNER JOIN up_room ON up_room.s_id = student.s_id AND up_room.class_id = class_room.class_id ;

-- ----------------------------
-- View structure for view_student
-- ----------------------------
DROP VIEW IF EXISTS `view_student`;
CREATE ALGORITHM = UNDEFINED DEFINER = `root`@`localhost` SQL SECURITY DEFINER VIEW `view_student` AS SELECT
student.s_id,
student.s_num,
student.s_gender,
student.s_fname,
student.s_lname,
student.s_dob,
student.s_vill_name,
student.s_dis_name,
student.s_pro_name,
student.s_tel,
student.national,
student.trib,
student.plash,
student.s_status,
student.s_remark,
student.`user`,
student.time,
tb_mother.m_fname,
tb_mother.m_lname,
tb_mother.m_dob,
tb_mother.m_vill_name,
tb_mother.m_dis_name,
tb_mother.m_pro_name,
tb_mother.m_tel,
tb_mother.m_remark,
tb_mother.m_id,
tb_mother.m_job,
tb_father.f_id,
tb_father.f_fname,
tb_father.f_lname,
tb_father.f_dob,
tb_father.f_job,
tb_father.f_vill_name,
tb_father.f_dis_name,
tb_father.f_pro_name,
tb_father.f_tel,
tb_father.f_remark
FROM
student
INNER JOIN tb_mother ON tb_mother.s_id = student.s_id
INNER JOIN tb_father ON tb_father.s_id = student.s_id ;

-- ----------------------------
-- View structure for view_sub
-- ----------------------------
DROP VIEW IF EXISTS `view_sub`;
CREATE ALGORITHM = UNDEFINED DEFINER = `root`@`localhost` SQL SECURITY DEFINER VIEW `view_sub` AS SELECT
`subject`.sub_id,
`subject`.sub_name,
teacher.teach_fname,
`subject`.teach_id,
`subject`.sub_remark,
`subject`.`user`
FROM
`subject`
INNER JOIN teacher ON `subject`.teach_id = teacher.teach_id ;

-- ----------------------------
-- View structure for view_uproom1
-- ----------------------------
DROP VIEW IF EXISTS `view_uproom1`;
CREATE ALGORITHM = UNDEFINED DEFINER = `root`@`localhost` SQL SECURITY DEFINER VIEW `view_uproom1` AS SELECT
student.s_num,
student.s_gender,
student.s_fname,
student.s_lname,
up_room.s_id,
up_room.ID,
up_room.class_id,
up_room.gener,
up_room.part,
up_room.up_status,
up_room.user_up,
class_room.class_name,
class_room.class_remark,
student.s_dob,
student.s_vill_name,
student.s_dis_name,
student.s_pro_name,
student.s_tel,
student.national,
student.trib,
student.plash,
student.s_status,
student.s_remark,
tb_father.f_fname,
tb_father.f_lname,
tb_father.f_dob,
tb_father.f_job,
tb_father.f_vill_name,
tb_father.f_dis_name,
tb_father.f_pro_name,
tb_father.f_tel,
tb_father.f_remark,
tb_mother.m_fname,
tb_mother.m_lname,
tb_mother.m_dob,
tb_mother.m_vill_name,
tb_mother.m_dis_name,
tb_mother.m_pro_name,
tb_mother.m_tel,
tb_mother.m_remark,
tb_mother.m_job,
student.`user`,
student.time
FROM
student
INNER JOIN up_room ON up_room.s_id = student.s_id
INNER JOIN class_room ON up_room.class_id = class_room.class_id
INNER JOIN tb_father ON tb_father.s_id = student.s_id
INNER JOIN tb_mother ON tb_mother.s_id = student.s_id ;

-- ----------------------------
-- View structure for view_user
-- ----------------------------
DROP VIEW IF EXISTS `view_user`;
CREATE ALGORITHM = UNDEFINED DEFINER = `root`@`localhost` SQL SECURITY DEFINER VIEW `view_user` AS SELECT
user.userid,
user.fname,
user.lname,
user.gender,
user.dob,
user.address,
user.tel,
user.email,
user.user,
user.pass,
user.status,
user.time
FROM
user ;

SET FOREIGN_KEY_CHECKS = 1;
