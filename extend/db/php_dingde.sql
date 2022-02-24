/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50651
Source Host           : localhost:3306
Source Database       : php_dingde

Target Server Type    : MYSQL
Target Server Version : 50651
File Encoding         : 65001

Date: 2022-02-22 23:23:16
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for classify
-- ----------------------------
DROP TABLE IF EXISTS `classify`;
CREATE TABLE `classify` (
  `classify_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '分类id',
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '分类名称',
  `create_datetime` datetime DEFAULT NULL COMMENT '创建时间',
  `update_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  PRIMARY KEY (`classify_id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='产品分类表';

-- ----------------------------
-- Records of classify
-- ----------------------------
INSERT INTO `classify` VALUES ('66', '导电纱线 长丝', '2022-02-22 19:20:22', '2022-02-22 19:20:25');
INSERT INTO `classify` VALUES ('67', '复合纱', '2022-02-22 19:21:02', '2022-02-22 19:21:04');

-- ----------------------------
-- Table structure for product
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `product_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '产品id',
  `classify_id` int(10) unsigned NOT NULL COMMENT '所属分类id',
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '产品名称',
  `img_url` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '产品图片',
  `detail` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_datetime` datetime DEFAULT NULL COMMENT '创建时间',
  `update_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='产品表';
