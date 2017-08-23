/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : 97admin

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-08-23 15:33:37
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `username` varchar(255) NOT NULL COMMENT '用户名',
  `head_pic` varchar(255) DEFAULT NULL COMMENT '头像',
  `sex` tinyint(1) NOT NULL DEFAULT '1' COMMENT '性别 1男 2女 3保密',
  `phone` varchar(20) DEFAULT NULL COMMENT '手机',
  `email` varchar(255) DEFAULT NULL COMMENT '邮箱',
  `password` varchar(64) NOT NULL COMMENT '密码',
  `reg_time` int(10) DEFAULT NULL COMMENT '注册时间',
  `token` varchar(32) DEFAULT NULL COMMENT 'token令牌',
  `salt` varchar(10) NOT NULL COMMENT '盐',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否禁用 1可用 2禁用',
  PRIMARY KEY (`id`),
  UNIQUE KEY `un_u` (`username`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'admin', '\"\\/public\\/img\\/uploads\\/head_pic\\/97Admin_1503308307.jpg\"', '2', '', '', '161bd0f58cfc9e8044caec114a69fe4db131387796e40d2938f3d9f454a74c85', null, '6d77f334170e2e706555b55a381c32ae', '123456', '1');

-- ----------------------------
-- Table structure for admin_log
-- ----------------------------
DROP TABLE IF EXISTS `admin_log`;
CREATE TABLE `admin_log` (
  `id` int(9) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `admin_id` int(9) NOT NULL COMMENT '后台管理员id',
  `time` datetime DEFAULT NULL COMMENT '操作时间',
  `ip` varchar(25) DEFAULT NULL COMMENT '操作ip',
  `log` varchar(255) DEFAULT NULL COMMENT '操作说明',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin_log
-- ----------------------------
INSERT INTO `admin_log` VALUES ('10', '6', '2017-07-19 06:02:09', '127.0.0.1', '登录成功');
INSERT INTO `admin_log` VALUES ('11', '6', '2017-07-19 06:03:21', '127.0.0.1', '登录成功');
INSERT INTO `admin_log` VALUES ('12', '6', '2017-07-20 06:01:42', '127.0.0.1', '登录成功');
INSERT INTO `admin_log` VALUES ('13', '6', '2017-07-21 05:59:46', '127.0.0.1', '登录成功');
INSERT INTO `admin_log` VALUES ('14', '6', '2017-07-21 05:59:49', '127.0.0.1', '登录成功');
INSERT INTO `admin_log` VALUES ('15', '6', '2017-07-24 03:25:22', '127.0.0.1', '登录成功');
INSERT INTO `admin_log` VALUES ('16', '6', '2017-07-24 03:25:25', '127.0.0.1', '登录成功');
INSERT INTO `admin_log` VALUES ('17', '6', '2017-07-24 06:00:49', '127.0.0.1', '登录成功');
INSERT INTO `admin_log` VALUES ('18', '6', '2017-07-25 06:33:36', '127.0.0.1', '登录成功');
INSERT INTO `admin_log` VALUES ('19', '6', '2017-07-26 06:47:10', '127.0.0.1', '登录成功');
INSERT INTO `admin_log` VALUES ('20', '6', '2017-07-26 06:47:12', '127.0.0.1', '登录成功');
INSERT INTO `admin_log` VALUES ('21', '6', '2017-07-26 07:55:29', '127.0.0.1', '登录成功');
INSERT INTO `admin_log` VALUES ('22', '6', '2017-07-27 06:29:54', '127.0.0.1', '登录成功');
INSERT INTO `admin_log` VALUES ('23', '6', '2017-07-27 07:02:33', '127.0.0.1', '登录成功');
INSERT INTO `admin_log` VALUES ('24', '6', '2017-07-27 07:24:59', '127.0.0.1', '登录成功');
INSERT INTO `admin_log` VALUES ('25', '6', '2017-08-01 07:11:13', '127.0.0.1', '登录成功');
INSERT INTO `admin_log` VALUES ('26', '6', '2017-08-02 02:07:46', '127.0.0.1', '登录成功');
INSERT INTO `admin_log` VALUES ('27', '6', '2017-08-02 06:51:43', '127.0.0.1', '登录成功');
INSERT INTO `admin_log` VALUES ('28', '6', '2017-08-02 09:03:29', '127.0.0.1', '登录成功');
INSERT INTO `admin_log` VALUES ('29', '6', '2017-08-03 06:41:23', '127.0.0.1', '登录成功');
INSERT INTO `admin_log` VALUES ('30', '6', '2017-08-03 06:41:57', '127.0.0.1', '登录成功');
INSERT INTO `admin_log` VALUES ('31', '6', '2017-08-03 06:43:07', '127.0.0.1', '登录成功');
INSERT INTO `admin_log` VALUES ('32', '6', '2017-08-03 06:50:43', '127.0.0.1', '登录成功');
INSERT INTO `admin_log` VALUES ('33', '6', '2017-08-04 01:57:43', '127.0.0.1', '登录成功');
INSERT INTO `admin_log` VALUES ('34', '6', '2017-08-04 08:37:53', '127.0.0.1', '登录成功');
INSERT INTO `admin_log` VALUES ('35', '6', '2017-08-07 05:38:18', '127.0.0.1', '登录成功');
INSERT INTO `admin_log` VALUES ('36', '6', '2017-08-07 06:09:14', '127.0.0.1', '登录成功');
INSERT INTO `admin_log` VALUES ('37', '6', '2017-08-07 07:09:38', '127.0.0.1', '登录成功');
INSERT INTO `admin_log` VALUES ('38', '6', '2017-08-10 07:20:18', '127.0.0.1', '登录成功');
INSERT INTO `admin_log` VALUES ('39', '6', '2017-08-10 07:25:15', '127.0.0.1', '登录成功');
INSERT INTO `admin_log` VALUES ('40', '6', '2017-08-11 05:43:20', '127.0.0.1', '登录成功');
INSERT INTO `admin_log` VALUES ('41', '6', '2017-08-16 03:11:36', '127.0.0.1', '登录成功');
INSERT INTO `admin_log` VALUES ('42', '6', '2017-08-16 05:39:57', '127.0.0.1', '登录成功');
INSERT INTO `admin_log` VALUES ('43', '6', '2017-08-17 07:45:45', '127.0.0.1', '登录成功');
INSERT INTO `admin_log` VALUES ('44', '6', '2017-08-17 08:37:31', '127.0.0.1', '登录成功');
INSERT INTO `admin_log` VALUES ('45', '6', '2017-08-18 07:32:39', '127.0.0.1', '登录成功');
INSERT INTO `admin_log` VALUES ('46', '6', '2017-08-18 08:06:12', '127.0.0.1', '登录成功');
INSERT INTO `admin_log` VALUES ('47', '1', '2017-08-21 08:01:38', '127.0.0.1', '登录成功');
INSERT INTO `admin_log` VALUES ('48', '1', '2017-08-21 08:02:33', '127.0.0.1', '登录成功');
INSERT INTO `admin_log` VALUES ('49', '1', '2017-08-21 08:37:36', '127.0.0.1', '登录成功');
INSERT INTO `admin_log` VALUES ('50', '1', '2017-08-21 09:05:51', '127.0.0.1', '登录成功');
INSERT INTO `admin_log` VALUES ('51', '1', '2017-08-22 01:25:46', '127.0.0.1', '登录成功');
INSERT INTO `admin_log` VALUES ('52', '1', '2017-08-22 01:26:50', '127.0.0.1', '登录成功');
INSERT INTO `admin_log` VALUES ('53', '1', '2017-08-22 06:03:26', '127.0.0.1', '登录成功');
INSERT INTO `admin_log` VALUES ('54', '1', '2017-08-22 06:28:27', '127.0.0.1', '登录成功');
INSERT INTO `admin_log` VALUES ('55', '1', '2017-08-22 07:02:55', '127.0.0.1', '登录成功');
INSERT INTO `admin_log` VALUES ('56', '1', '2017-08-22 07:07:47', '127.0.0.1', '登录成功');
INSERT INTO `admin_log` VALUES ('57', '8', '2017-08-22 08:09:19', '127.0.0.1', '登录成功');
INSERT INTO `admin_log` VALUES ('58', '1', '2017-08-22 09:27:39', '127.0.0.1', '登录成功');
INSERT INTO `admin_log` VALUES ('59', '1', '2017-08-23 07:23:39', '127.0.0.1', '登录成功');

-- ----------------------------
-- Table structure for admin_role
-- ----------------------------
DROP TABLE IF EXISTS `admin_role`;
CREATE TABLE `admin_role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '角色id',
  `role_name` varchar(40) NOT NULL COMMENT '角色名称',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1未删除 2删除',
  `explain` varchar(255) DEFAULT NULL COMMENT '描述',
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin_role
-- ----------------------------
INSERT INTO `admin_role` VALUES ('1', '超级管理员', '1', '拥有系统所有权限！');
INSERT INTO `admin_role` VALUES ('2', '系统管理员', '1', '部分权限');

-- ----------------------------
-- Table structure for admin_role_accos
-- ----------------------------
DROP TABLE IF EXISTS `admin_role_accos`;
CREATE TABLE `admin_role_accos` (
  `admin_id` int(9) unsigned NOT NULL COMMENT '管理员id',
  `role_id` int(9) NOT NULL COMMENT '权限id',
  KEY `re_admin_id` (`admin_id`),
  KEY `re_role_id` (`role_id`),
  CONSTRAINT `re_admin_id` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `re_role_id` FOREIGN KEY (`role_id`) REFERENCES `admin_role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin_role_accos
-- ----------------------------
INSERT INTO `admin_role_accos` VALUES ('1', '1');

-- ----------------------------
-- Table structure for auth
-- ----------------------------
DROP TABLE IF EXISTS `auth`;
CREATE TABLE `auth` (
  `auth_id` int(9) unsigned NOT NULL AUTO_INCREMENT COMMENT '权限id',
  `name` varchar(255) DEFAULT NULL COMMENT '操作规则唯一标识（控制器/方法）',
  `pid` int(9) NOT NULL DEFAULT '0' COMMENT '父级id 默认为顶级',
  `title` varchar(255) NOT NULL COMMENT '操作规则中文名称',
  `icon` varchar(255) DEFAULT NULL COMMENT '操作规则图标（顶级有效）',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态：1正常，2禁用',
  `sort` int(9) NOT NULL DEFAULT '0' COMMENT '排序',
  `explain` varchar(255) DEFAULT NULL COMMENT '描述',
  PRIMARY KEY (`auth_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth
-- ----------------------------
INSERT INTO `auth` VALUES ('1', 'Index/index', '0', '控制台', 'fa fa-tachometer', '1', '1', '友情提示：经常查看操作日志，发现异常以便及时追查原因。');
INSERT INTO `auth` VALUES ('2', '', '0', '系统设置', 'fa fa-cogs', '1', '2', '');
INSERT INTO `auth` VALUES ('3', 'Menu/add', '4', '添加菜单', null, '1', '3', null);
INSERT INTO `auth` VALUES ('4', 'Menu/index', '2', '后台菜单', '', '1', '1', '关于后台菜单，新增时输入控制器方法名时一定要细心！');
INSERT INTO `auth` VALUES ('5', 'Menu/edit', '4', '编辑菜单', '', '1', '4', '这里是编辑菜单');
INSERT INTO `auth` VALUES ('6', 'Menu/del', '4', '删除菜单', '', '1', '5', '删除菜单');
INSERT INTO `auth` VALUES ('7', 'Setting/setting', '2', '网站设置', '', '2', '1', '友情提示：这是网站设置的提示。');
INSERT INTO `auth` VALUES ('8', 'Setting/setting', '2', '网站设置', '', '1', '1', '友情提示：这是网站设置的提示。');
INSERT INTO `auth` VALUES ('9', '', '0', '权限管理', 'fa fa-users', '1', '3', '权限管理');
INSERT INTO `auth` VALUES ('10', 'Role/index', '9', '角色管理', '', '1', '1', '这里是角色管理');
INSERT INTO `auth` VALUES ('11', 'Role/add', '10', '添加角色', '', '1', '1', '');
INSERT INTO `auth` VALUES ('12', 'Role/edit', '10', '编辑角色', '', '1', '1', '');
INSERT INTO `auth` VALUES ('13', 'Role/del', '10', '删除角色', '', '1', '1', '逻辑删除角色');
INSERT INTO `auth` VALUES ('14', '', '0', '个人中心', 'fa fa-user', '1', '4', '友情提示：请注意牢记自己所填的信息！');
INSERT INTO `auth` VALUES ('15', 'User/info', '14', '个人资料', '', '1', '1', '');
INSERT INTO `auth` VALUES ('16', 'User/changePass', '14', '修改密码', '', '1', '2', '请正确输入原密码！');
INSERT INTO `auth` VALUES ('17', '', '0', '其他功能', 'fa fa-legal', '1', '1', '自行开发');
INSERT INTO `auth` VALUES ('18', 'Admin/index', '17', '自行开发', '', '1', '1', '');
INSERT INTO `auth` VALUES ('19', 'User/add', '22', '添加用户', '', '1', '3', '');
INSERT INTO `auth` VALUES ('20', 'User/checkUserExcess', '19', '检测会员', '', '1', '2', '检查用户是否重复');
INSERT INTO `auth` VALUES ('21', 'User/edit', '22', '编辑用户', '', '1', '3', '编辑用户');
INSERT INTO `auth` VALUES ('22', 'User/index', '9', '用户管理', '', '1', '2', '');
INSERT INTO `auth` VALUES ('23', 'User/del', '22', '用户删除', '', '1', '3', '');
INSERT INTO `auth` VALUES ('24', 'Admin/Login', '0', '退出登录', '', '2', '10', '');
INSERT INTO `auth` VALUES ('25', 'Login/logout', '8', '退出登录', '', '1', '5', '退出登录');

-- ----------------------------
-- Table structure for auth_role_accos
-- ----------------------------
DROP TABLE IF EXISTS `auth_role_accos`;
CREATE TABLE `auth_role_accos` (
  `role_id` int(9) NOT NULL COMMENT '角色id',
  `auth_id` int(9) unsigned NOT NULL COMMENT '权限id',
  KEY `re_auth_role_id` (`role_id`),
  KEY `re_auth_id` (`auth_id`),
  CONSTRAINT `re_auth_id` FOREIGN KEY (`auth_id`) REFERENCES `auth` (`auth_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `re_auth_role_id` FOREIGN KEY (`role_id`) REFERENCES `admin_role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_role_accos
-- ----------------------------
INSERT INTO `auth_role_accos` VALUES ('2', '1');
INSERT INTO `auth_role_accos` VALUES ('1', '1');
INSERT INTO `auth_role_accos` VALUES ('1', '2');
INSERT INTO `auth_role_accos` VALUES ('1', '4');
INSERT INTO `auth_role_accos` VALUES ('1', '3');
INSERT INTO `auth_role_accos` VALUES ('1', '5');
INSERT INTO `auth_role_accos` VALUES ('1', '6');
INSERT INTO `auth_role_accos` VALUES ('1', '8');
INSERT INTO `auth_role_accos` VALUES ('1', '25');
INSERT INTO `auth_role_accos` VALUES ('1', '9');
INSERT INTO `auth_role_accos` VALUES ('1', '10');
INSERT INTO `auth_role_accos` VALUES ('1', '11');
INSERT INTO `auth_role_accos` VALUES ('1', '12');
INSERT INTO `auth_role_accos` VALUES ('1', '13');
INSERT INTO `auth_role_accos` VALUES ('1', '22');
INSERT INTO `auth_role_accos` VALUES ('1', '19');
INSERT INTO `auth_role_accos` VALUES ('1', '21');
INSERT INTO `auth_role_accos` VALUES ('1', '23');
INSERT INTO `auth_role_accos` VALUES ('1', '14');
INSERT INTO `auth_role_accos` VALUES ('1', '15');
INSERT INTO `auth_role_accos` VALUES ('1', '16');
INSERT INTO `auth_role_accos` VALUES ('1', '17');
INSERT INTO `auth_role_accos` VALUES ('1', '18');

-- ----------------------------
-- Table structure for setting
-- ----------------------------
DROP TABLE IF EXISTS `setting`;
CREATE TABLE `setting` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `key` varchar(100) NOT NULL COMMENT '变量',
  `value` varchar(255) DEFAULT NULL COMMENT '值',
  `note` varchar(255) DEFAULT NULL COMMENT '说明',
  PRIMARY KEY (`id`),
  UNIQUE KEY `un_key` (`key`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of setting
-- ----------------------------
INSERT INTO `setting` VALUES ('1', 'sitename', 'localhost', '网站地址');
INSERT INTO `setting` VALUES ('2', 'title', '97Admin', '头部');
INSERT INTO `setting` VALUES ('3', 'keywords', '97Admin', '关键词');
INSERT INTO `setting` VALUES ('4', 'description', 'pkadmin后台管理系统是基于Codeigniter框架开发', '描述');
INSERT INTO `setting` VALUES ('5', 'footer', 'Copyright © 2017 97ADMIN design by symphp', '版权信息');
INSERT INTO `setting` VALUES ('6', 'author', 'symphp', '开发者');
