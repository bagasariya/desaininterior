/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50626
Source Host           : 127.0.0.1:3306
Source Database       : ap

Target Server Type    : MYSQL
Target Server Version : 50626
File Encoding         : 65001

Date: 2017-08-01 18:35:01
*/

SET FOREIGN_KEY_CHECKS=0;

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
INSERT INTO `contact` VALUES ('a', 'in', 'a');
INSERT INTO `contact` VALUES ('a', 'innn', 'b');
INSERT INTO `contact` VALUES ('ariya.b4son@gmail.com', 'Facebook', 'https://web.facebook.com/bagasariya26');
INSERT INTO `contact` VALUES ('ketykeren@yahoo.com', 'Instagram', 'instagram.com/chantique');
INSERT INTO `contact` VALUES ('pbariyawibawa@gmail.com', 'Facebook', 'https://facebook.com/bagas.ariya26');
INSERT INTO `contact` VALUES ('a@a.com', 'Instagram', 'hohoho');
INSERT INTO `contact` VALUES ('ariya.b4son@gmail.com', 'Instagram', 'https://www.instagram.com/bagasariya/?hl=id');
INSERT INTO `contact` VALUES ('ariya.b4son@gmail.com', 'Twitter', 'https://twitter.com/bagasariya');
INSERT INTO `contact` VALUES ('ariya.b4son@gmail.com', 'Youtube', 'hahahha');

-- ----------------------------
-- Table structure for post
-- ----------------------------
DROP TABLE IF EXISTS `post`;
CREATE TABLE `post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(100) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `image_title` varchar(30) DEFAULT NULL,
  `image_description` varchar(255) DEFAULT NULL,
  `status` enum('published','draft') DEFAULT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of post
-- ----------------------------
INSERT INTO `post` VALUES ('8', 'ariya.b4son@gmail.com', 'https://pbs.twimg.com/media/DFt_jGCWsAAdGIn.jpg', 'd', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n        conseq', 'published');
INSERT INTO `post` VALUES ('9', 'ariya.b4son@gmail.com', 'https://pbs.twimg.com/media/DFupMqIV0AASbY9.jpg', 'k', 'h', 'published');
INSERT INTO `post` VALUES ('12', 'pbariyawibawa@gmail.com', 'https://scontent-sin6-2.cdninstagram.com/t51.2885-15/e35/20347207_1450090598413453_1686198821765251072_n.jpg', 'judul', 'kamera bagus', 'published');
INSERT INTO `post` VALUES ('13', 'ariya.b4son@gmail.com', 'https://scontent-sit4-1.cdninstagram.com/t51.2885-15/e35/20225859_784301775082443_5236973870212186112_n.jpg', 'kopi sedap', 'kopi adalah minuman terenak *katanya', 'published');

-- ----------------------------
-- Table structure for post_tag
-- ----------------------------
DROP TABLE IF EXISTS `post_tag`;
CREATE TABLE `post_tag` (
  `post_id` int(11) DEFAULT NULL,
  `tag_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of post_tag
-- ----------------------------
INSERT INTO `post_tag` VALUES ('1', '1');
INSERT INTO `post_tag` VALUES ('1', '3');
INSERT INTO `post_tag` VALUES ('12', '6');
INSERT INTO `post_tag` VALUES ('13', '2');
INSERT INTO `post_tag` VALUES ('13', '8');

-- ----------------------------
-- Table structure for tag
-- ----------------------------
DROP TABLE IF EXISTS `tag`;
CREATE TABLE `tag` (
  `tag_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(100) DEFAULT NULL,
  `image_tag` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`tag_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tag
-- ----------------------------
INSERT INTO `tag` VALUES ('2', 'ariya.b4son@gmail.com', 'tes2');
INSERT INTO `tag` VALUES ('3', 'ariya.b4son@gmail.com', 'tes3');
INSERT INTO `tag` VALUES ('6', 'pbariyawibawa@gmail.com', 'coba1');
INSERT INTO `tag` VALUES ('7', 'pbariyawibawa@gmail.com', 'coba2');
INSERT INTO `tag` VALUES ('8', 'ariya.b4son@gmail.com', 'tes1');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_email` varchar(100) NOT NULL,
  `user_pass` varchar(100) DEFAULT NULL,
  `user_name` varchar(25) DEFAULT NULL,
  `user_real_name` varchar(255) DEFAULT NULL,
  `user_logo` varchar(255) DEFAULT NULL,
  `user_theme` varchar(255) DEFAULT NULL,
  `user_status` tinyint(255) DEFAULT NULL,
  `user_desc` tinytext,
  `user_tel` varchar(255) DEFAULT NULL,
  `user_type` enum('moderator','free','paid') DEFAULT NULL,
  PRIMARY KEY (`user_email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('a', 'a', 'a', 'username', null, null, '0', null, null, 'free');
INSERT INTO `user` VALUES ('a@a.com', 'a', 'aku adalah anak qhu', null, 'a', 'a', '1', ' a adshlksjfhsadklf', 'sauiaadasd', 'moderator');
INSERT INTO `user` VALUES ('admin', 'admin', 'admin', 'admin', null, null, '1', 'admin', '000000000000', 'free');
INSERT INTO `user` VALUES ('ariya.b4son@gmail.com', 'asd', 'bagasariya', 'Prayoga Bagas Ariya Wibawa', 'kpr.png', null, '1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dol', '085815512190', 'free');
INSERT INTO `user` VALUES ('debby.dwisafitri.um@gmail.com', 'd', 'debby', null, null, null, '1', null, null, 'paid');
INSERT INTO `user` VALUES ('fyeahkety@gmail.com', 'kety', 'kety', 'kety', null, null, '0', null, null, 'free');
INSERT INTO `user` VALUES ('ketykeren@yahoo.com', 'a', 'kety', null, null, null, '1', '  aqhu cantiq ncen ha ha h a', '080989999', 'paid');
INSERT INTO `user` VALUES ('nthderp@gmail.com', 'katya', 'katya', 'katya', null, null, '1', null, null, 'free');
INSERT INTO `user` VALUES ('pbariyawibawa@gmail.com', 'asd', 'bagas ariya', 'Bagas Ariya Saja', null, null, '1', null, null, 'free');
INSERT INTO `user` VALUES ('pcyderp@gmail.com', 'as', 'as', 'as', null, null, '0', null, null, 'free');
INSERT INTO `user` VALUES ('ridhopratamavd@gmail.com', 'a', 'a', 'a', null, null, '0', null, null, 'free');
INSERT INTO `user` VALUES ('rochmanhyea@gmail.com', 'zxcvbn', 'Rohma', null, null, null, '1', null, null, 'free');
INSERT INTO `user` VALUES ('s@s.com', 's', 's', null, 's', 's', '0', 's', null, 'free');
INSERT INTO `user` VALUES ('syahadianyusril@gmail.com', 'karep', 'Syahadian Yusril Isha', null, null, null, '0', null, null, 'free');

-- ----------------------------
-- View structure for view_contact
-- ----------------------------
DROP VIEW IF EXISTS `view_contact`;
CREATE VIEW `view_contact` AS select `contact`.`user_contact` AS `user_contact`,`contact`.`user_contact_url` AS `user_contact_url`,`user`.`user_email` AS `user_email`,`user`.`user_name` AS `user_name` from (`contact` join `user` on((`contact`.`user_email` = `user`.`user_email`))) ;

-- ----------------------------
-- View structure for view_post
-- ----------------------------
DROP VIEW IF EXISTS `view_post`;
CREATE VIEW `view_post` AS select `post`.`post_id` AS `p_id`,`post`.`image_title` AS `p_title`,`post`.`status` AS `p_status`,`post`.`image_url` AS `image_url`,`user`.`user_name` AS `p_user`,`post`.`image_description` AS `p_desc` from (`post` join `user` on((`post`.`user_email` = `user`.`user_email`))) ;

-- ----------------------------
-- View structure for view_posttag_tag
-- ----------------------------
DROP VIEW IF EXISTS `view_posttag_tag`;
CREATE VIEW `view_posttag_tag` AS select `post_tag`.`post_id` AS `post_id`,`tag`.`tag_id` AS `tag_id`,`tag`.`image_tag` AS `image_tag` from (`post_tag` join `tag` on((`tag`.`tag_id` = `post_tag`.`tag_id`))) ;

-- ----------------------------
-- View structure for view_post_tag
-- ----------------------------
DROP VIEW IF EXISTS `view_post_tag`;
CREATE VIEW `view_post_tag` AS SELECT
post.image_title AS p_title,
post.image_url AS image_url,
post.image_description AS p_desc,
post.`status` AS p_status,
post_tag.tag_id AS tag_id,
`user`.user_name AS p_user,
post.post_id AS p_id
FROM
	(
		(
			`post`
			JOIN `post_tag` ON (
				(
					`post`.`post_id` = `post_tag`.`post_id`
				)
			)
		)
		JOIN `user` ON (
			(
				`user`.`user_email` = `post`.`user_email`
			)
		)
	) ;

-- ----------------------------
-- View structure for view_tag_user
-- ----------------------------
DROP VIEW IF EXISTS `view_tag_user`;
CREATE VIEW `view_tag_user` AS select `tag`.`image_tag` AS `image_tag`,`tag`.`tag_id` AS `tag_id`,`user`.`user_name` AS `user_name` from (`tag` join `user` on((`user`.`user_email` = `tag`.`user_email`))) ;

-- ----------------------------
-- View structure for view_user_post
-- ----------------------------
DROP VIEW IF EXISTS `view_user_post`;
CREATE VIEW `view_user_post` AS select distinct `user`.`user_real_name` AS `user_real_name`,`post`.`image_url` AS `image_url`,`post`.`image_description` AS `image_description`,`post`.`status` AS `status` from (`user` join `post` on((`post`.`user_email` = `user`.`user_email`))) group by `user`.`user_email` ;
