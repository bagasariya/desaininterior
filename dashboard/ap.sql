/*
Navicat MySQL Data Transfer

Source Server         : gotek_nia
Source Server Version : 50626
Source Host           : 192.168.43.136:3306
Source Database       : ap

Target Server Type    : MYSQL
Target Server Version : 50626
File Encoding         : 65001

Date: 2017-05-30 11:44:42
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id_tag` int(11) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(100) DEFAULT NULL,
  `image_tag` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_tag`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('1', 'a', 'a');
INSERT INTO `category` VALUES ('2', 'a', 'asasas');
INSERT INTO `category` VALUES ('3', 'a', 'asasasasas');
INSERT INTO `category` VALUES ('4', 'a', 'abc');
INSERT INTO `category` VALUES ('5', 'as', 'ass');
INSERT INTO `category` VALUES ('6', 's', 'aasa');
INSERT INTO `category` VALUES ('7', 'a', 'bbbb');
INSERT INTO `category` VALUES ('8', 'a', 'qqqqqqq');
INSERT INTO `category` VALUES ('9', 'a', 'ssdsd');
INSERT INTO `category` VALUES ('10', 'a', 'kkkkkk');
INSERT INTO `category` VALUES ('11', 'a', 'dddddd');
INSERT INTO `category` VALUES ('12', 'a', 'haha');

-- ----------------------------
-- Table structure for contact
-- ----------------------------
DROP TABLE IF EXISTS `contact`;
CREATE TABLE `contact` (
  `user_email` varchar(100) DEFAULT NULL,
  `user_contact` varchar(20) DEFAULT NULL,
  `user_contact_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of contact
-- ----------------------------

-- ----------------------------
-- Table structure for post
-- ----------------------------
DROP TABLE IF EXISTS `post`;
CREATE TABLE `post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(100) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `image_title` varchar(30) DEFAULT NULL,
  `image_description` mediumtext,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of post
-- ----------------------------
INSERT INTO `post` VALUES ('1', 'a', 'asas', 'sas', 'asasas', 'posted');
INSERT INTO `post` VALUES ('2', 'a', 'a', 'a', 'a', 'posted');
INSERT INTO `post` VALUES ('3', 'a', 'aa', 'aa', 'aa', 'posted');
INSERT INTO `post` VALUES ('4', 'dd', 'dd', 'dd', 'dd', 'posted');
INSERT INTO `post` VALUES ('5', 'a', 'sas', 'sas', 'sas', 'draft');

-- ----------------------------
-- Table structure for post_tag
-- ----------------------------
DROP TABLE IF EXISTS `post_tag`;
CREATE TABLE `post_tag` (
  `post_id` int(11) DEFAULT NULL,
  `image_tag` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of post_tag
-- ----------------------------

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_email` varchar(100) NOT NULL,
  `user_pass` varchar(100) DEFAULT NULL,
  `user_name` varchar(20) DEFAULT NULL,
  `user_logo` varchar(255) DEFAULT NULL,
  `user_theme` varchar(255) DEFAULT NULL,
  `user_status` tinyint(255) DEFAULT NULL,
  `user_desc` tinytext,
  `user_tel` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('a@a.com', 'a', 'aku adalah anak ', 'a', 'a', '1', 'a', null);
INSERT INTO `user` VALUES ('ariya.b4son@gmail.com', 'a', 'a', null, null, '1', null, null);
INSERT INTO `user` VALUES ('debby.dwisafitri.um@gmail.com', 'd', 'debby', null, null, '1', null, null);
INSERT INTO `user` VALUES ('s@s.com', 's', 's', 's', 's', '0', 's', null);
