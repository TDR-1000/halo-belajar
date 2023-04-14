/*
 Navicat Premium Data Transfer

 Source Server         : Qu
 Source Server Type    : MySQL
 Source Server Version : 50537
 Source Host           : localhost:3306
 Source Schema         : halobelajar

 Target Server Type    : MySQL
 Target Server Version : 50537
 File Encoding         : 65001

 Date: 13/04/2023 13:49:53
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for hb_login
-- ----------------------------
DROP TABLE IF EXISTS `hb_login`;
CREATE TABLE `hb_login`  (
  `id_login` int(10) NOT NULL,
  `id_user` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `password` longtext CHARACTER SET utf8 COLLATE utf8_bin NULL,
  PRIMARY KEY (`id_login`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Compact;

-- ----------------------------
-- Records of hb_login
-- ----------------------------
INSERT INTO `hb_login` VALUES (1, '1', 'demo@demo.com', '$2y$10$5JNBaWcFz3p27bKsf2h07O4Z.UHbslGCJiHZyg1pusaAPOg5FLzGm');
INSERT INTO `hb_login` VALUES (2, '2', 'antahberantah070@gmail.com', '$2y$10$1QsbiN7ALU1zybVrDhqmYelyvw0/icp5G3o./DmgemWdFlsDx3b/e');

-- ----------------------------
-- Table structure for hb_user
-- ----------------------------
DROP TABLE IF EXISTS `hb_user`;
CREATE TABLE `hb_user`  (
  `id_user` int(10) NOT NULL,
  `uid` longtext CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `level` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `nama_user` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `email_user` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `status_user` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `token_user` longtext CHARACTER SET utf8 COLLATE utf8_bin NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Compact;

-- ----------------------------
-- Records of hb_user
-- ----------------------------
INSERT INTO `hb_user` VALUES (1, 'c2c76e73fd8d82b8649bb0e4a5b4a762', 'top', 'demo', 'demo@demo.com', NULL, NULL);
INSERT INTO `hb_user` VALUES (2, 'e8429b3c306ccbbe8cb2ffa882e5d84a', 'low', 'The Mull', 'antahberantah070@gmail.com', NULL, 'c2c76e73fd8d82b8649bb0e4a5b4a762');

SET FOREIGN_KEY_CHECKS = 1;
