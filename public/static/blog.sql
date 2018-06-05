/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : blog

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-05-02 17:01:16
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for yl_admins
-- ----------------------------
DROP TABLE IF EXISTS `yl_admins`;
CREATE TABLE `yl_admins` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL DEFAULT '' COMMENT '//密码',
  `delete_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yl_admins
-- ----------------------------
INSERT INTO `yl_admins` VALUES ('1', 'admin', '1d7b-yXHkmxqciG-AiSES3eaDIqvvoW1', '1523863939');
INSERT INTO `yl_admins` VALUES ('3', 'admin01', '123456', '0');
INSERT INTO `yl_admins` VALUES ('4', 'vivian', 'a86c-yXHkmxqciG-AiSES3eaDIqvvoW1', '0');

-- ----------------------------
-- Table structure for yl_article
-- ----------------------------
DROP TABLE IF EXISTS `yl_article`;
CREATE TABLE `yl_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cateid` int(11) NOT NULL COMMENT '//分类id',
  `title` varchar(150) NOT NULL DEFAULT '' COMMENT '//标题',
  `author` varchar(50) NOT NULL DEFAULT '' COMMENT '//作者',
  `sub_title` varchar(150) NOT NULL DEFAULT '' COMMENT '//子标题',
  `keyowrds` varchar(80) NOT NULL,
  `description` text,
  `thumb` varchar(100) NOT NULL DEFAULT '' COMMENT '//缩略图',
  `addtime` int(10) NOT NULL DEFAULT '0' COMMENT '//添加时间',
  `updatetime` int(10) NOT NULL DEFAULT '0' COMMENT '//更新时间',
  `status` int(1) NOT NULL DEFAULT '99' COMMENT '0,审核，99发布',
  PRIMARY KEY (`id`),
  KEY `fk_yl_article_yl_article_1` (`cateid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yl_article
-- ----------------------------

-- ----------------------------
-- Table structure for yl_art_cate
-- ----------------------------
DROP TABLE IF EXISTS `yl_art_cate`;
CREATE TABLE `yl_art_cate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(80) NOT NULL DEFAULT '' COMMENT '//分类名称',
  `cate_image` varchar(100) NOT NULL DEFAULT '' COMMENT '//分类图片',
  `cate_keywords` varchar(80) NOT NULL DEFAULT '' COMMENT '//分类关键词',
  `cate_description` text COMMENT '//描述信息',
  `pid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yl_art_cate
-- ----------------------------
