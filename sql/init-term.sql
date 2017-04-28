/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : term

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2017-04-20 15:13:47
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for art_admin
-- ----------------------------
DROP TABLE IF EXISTS `art_admin`;
CREATE TABLE `art_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `uid` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for art_article
-- ----------------------------
DROP TABLE IF EXISTS `art_article`;
CREATE TABLE `art_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `artid` varchar(255) DEFAULT NULL,
  `uid` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `typeid` tinyint(4) DEFAULT NULL,
  `passtime` varchar(255) DEFAULT NULL COMMENT '处理时间',
  `sendtime` datetime DEFAULT NULL,
  `savetime` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL COMMENT '1为保存草稿，2为投递,3垃圾箱 4隐藏',
  `self_typeid` int(11) DEFAULT '0' COMMENT '默认分类0',
  `tag` varchar(255) DEFAULT NULL,
  `isopen` tinyint(4) DEFAULT '1' COMMENT '默认1公开 2私人',
  `ispass` tinyint(4) DEFAULT '6' COMMENT '(默认未投稿6,1为一级通过，2为2级通过，3为3级通过，4为不通过，5为正在审核',
  `istop` int(2) DEFAULT '1' COMMENT '是否置顶（1否 2是)',
  `isbox` tinyint(4) DEFAULT '1' COMMENT '是否存放在优文箱子 1否 2是',
  `readnum` int(11) DEFAULT '0',
  `grad` int(11) DEFAULT '0',
  `clicknum` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for art_auth
-- ----------------------------
DROP TABLE IF EXISTS `art_auth`;
CREATE TABLE `art_auth` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for art_collect
-- ----------------------------
DROP TABLE IF EXISTS `art_collect`;
CREATE TABLE `art_collect` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `artid` varchar(255) DEFAULT NULL,
  `aid` varchar(255) DEFAULT NULL,
  `uid` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `collecttime` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for art_comment
-- ----------------------------
DROP TABLE IF EXISTS `art_comment`;
CREATE TABLE `art_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `artid` varchar(255) DEFAULT NULL,
  `aid` varchar(255) DEFAULT NULL,
  `wid` varchar(255) DEFAULT NULL,
  `content` longtext,
  `addtime` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for art_home_pic
-- ----------------------------
DROP TABLE IF EXISTS `art_home_pic`;
CREATE TABLE `art_home_pic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `typeid` int(11) DEFAULT NULL,
  `picurl` varchar(255) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for art_manage_comment
-- ----------------------------
DROP TABLE IF EXISTS `art_manage_comment`;
CREATE TABLE `art_manage_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `artid` varchar(255) DEFAULT NULL,
  `oneuid` varchar(255) DEFAULT NULL,
  `onename` varchar(255) DEFAULT NULL,
  `onegrade` varchar(255) DEFAULT NULL,
  `onediscuss` varchar(255) DEFAULT NULL,
  `towuid` varchar(255) DEFAULT NULL,
  `towname` varchar(255) DEFAULT NULL,
  `twograde` varchar(255) DEFAULT NULL,
  `towdiscuss` varchar(255) DEFAULT NULL,
  `threeuid` varchar(255) DEFAULT NULL,
  `thressdiscuss` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for art_message
-- ----------------------------
DROP TABLE IF EXISTS `art_message`;
CREATE TABLE `art_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `title` varchar(255) DEFAULT NULL,
  `content` longtext,
  `pushtime` varchar(255) DEFAULT NULL,
  `outtime` varchar(255) DEFAULT NULL,
  `artid` varchar(255) DEFAULT '',
  `wid` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for art_notice
-- ----------------------------
DROP TABLE IF EXISTS `art_notice`;
CREATE TABLE `art_notice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nid` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` longtext,
  `pushtime` varchar(255) DEFAULT NULL,
  `outtime` varchar(255) DEFAULT NULL,
  `issend` tinyint(4) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for art_role
-- ----------------------------
DROP TABLE IF EXISTS `art_role`;
CREATE TABLE `art_role` (
  `roleid` int(11) NOT NULL AUTO_INCREMENT,
  `rolename` varchar(255) DEFAULT NULL,
  `rolecode` varchar(255) DEFAULT NULL,
  `roleauth` varchar(255) DEFAULT NULL,
  `descript` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`roleid`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for art_self_type
-- ----------------------------
DROP TABLE IF EXISTS `art_self_type`;
CREATE TABLE `art_self_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(255) DEFAULT NULL,
  `typename` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for art_sub_users
-- ----------------------------
DROP TABLE IF EXISTS `art_sub_users`;
CREATE TABLE `art_sub_users` (
  `sub_user_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `iccard` varchar(255) DEFAULT NULL COMMENT '身份证',
  `email` varchar(255) DEFAULT NULL,
  `registertime` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `parentid` varchar(255) DEFAULT NULL,
  `actionlist` varchar(255) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT '',
  `pswquestion` varchar(255) DEFAULT '',
  `pswanswer` varchar(255) DEFAULT '',
  `roleid` tinyint(4) DEFAULT NULL,
  `typeid` tinyint(4) DEFAULT '1' COMMENT '负责文章类型默认1负责全部类型',
  `isdefriend` tinyint(4) DEFAULT '1' COMMENT '默认1不禁用 2禁用 3拉黑(删除)',
  `birthday` varchar(255) DEFAULT NULL,
  `head_img` varchar(255) DEFAULT 'http://localhost:8080/term/newSpaperSystem/Application/Home/View/public/img/logo2.png',
  `backup` varchar(255) DEFAULT '一句话介绍一下自己吧，让别人更了解你',
  PRIMARY KEY (`sub_user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for art_type
-- ----------------------------
DROP TABLE IF EXISTS `art_type`;
CREATE TABLE `art_type` (
  `typeid` int(11) NOT NULL AUTO_INCREMENT,
  `typename` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1' COMMENT '默认1开启 2禁用',
  `parentid` tinyint(4) DEFAULT '0',
  `typelevel` tinyint(4) DEFAULT '1',
  `levelname` varchar(255) DEFAULT NULL,
  `picurl` varchar(255) DEFAULT NULL,
  `heatorder` tinyint(4) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `istop` tinyint(4) DEFAULT '2' COMMENT '1置顶，默认2不置顶',
  PRIMARY KEY (`typeid`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for art_users
-- ----------------------------
DROP TABLE IF EXISTS `art_users`;
CREATE TABLE `art_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `registertime` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `parentid` varchar(255) DEFAULT NULL,
  `actionlist` varchar(255) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `pswquestion` varchar(255) DEFAULT NULL,
  `pswanswer` varchar(255) DEFAULT NULL,
  `isdefriend` tinyint(4) DEFAULT '1' COMMENT '是否拉黑默认1不拉黑',
  `status` tinyint(4) DEFAULT '1',
  `birthday` varchar(255) DEFAULT NULL,
  `backup` varchar(255) DEFAULT '一句话介绍一下自己吧，让别人更了解你',
  `head_img` varchar(255) DEFAULT 'http://assets.jikexueyuan.com/user/avtar/default.gif',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
