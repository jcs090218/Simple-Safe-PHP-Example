/*
Service Platform Data Transfer

Source Server         : $server_name$
Source Server Type    : $server_type$
Source Server Version : $server_version$
Source Host           : $hostname$
Source Schema         : $schema$

Target Server Type    : $server_type$
Target Server Version : $server_version$
File Encoding         : $file_encoding$

Date: 2017-11-23 14:56:48
*/

-- ----------------------------
-- Table structure for `accounts`
-- ----------------------------
DROP TABLE IF EXISTS `accounts`;
CREATE TABLE `accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL DEFAULT '',
  `password` varchar(128) NOT NULL DEFAULT '',
  `email` tinytext,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
  );

-- ----------------------------
-- Records of accounts
-- ----------------------------
INSERT INTO `accounts` VALUES ('1', 'Hello1122', 'pass123', 'hello1122@somemail.com');
INSERT INTO `accounts` VALUES ('2', 'Hello2233', 'pass456', 'hello2233@somemail.com');
INSERT INTO `accounts` VALUES ('3', 'Hello3344', 'pass789', 'hello3344@somemail.com');
