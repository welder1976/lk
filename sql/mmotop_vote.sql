/*
 Navicat Premium Data Transfer

 Source Server         : NightHold Acc
 Source Server Type    : MySQL
 Source Server Version : 50562
 Source Host           : 185.221.153.103:3306
 Source Schema         : auth_lich

 Target Server Type    : MySQL
 Target Server Version : 50562
 File Encoding         : 65001

 Date: 08/05/2022 17:36:24
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for mmotop_vote
-- ----------------------------
DROP TABLE IF EXISTS `mmotop_vote`;
CREATE TABLE `mmotop_vote`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vote_id` int(10) UNSIGNED NOT NULL,
  `vote_date` int(11) NOT NULL,
  `vote_ip` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `vote_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `vote_count` int(11) NOT NULL,
  `vote_today` int(11) NOT NULL DEFAULT 0,
  `acc_id` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9089 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of mmotop_vote
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
