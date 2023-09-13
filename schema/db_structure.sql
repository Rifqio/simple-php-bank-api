/*
 Navicat Premium Data Transfer

 Source Server         : MySQL
 Source Server Type    : MySQL
 Source Server Version : 100427 (10.4.27-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : db_bank

 Target Server Type    : MySQL
 Target Server Version : 100427 (10.4.27-MariaDB)
 File Encoding         : 65001

 Date: 13/09/2023 22:26:36
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for account_balance
-- ----------------------------
DROP TABLE IF EXISTS `account_balance`;
CREATE TABLE `account_balance`  (
  `id_balance` int NOT NULL AUTO_INCREMENT,
  `user_id` int NULL DEFAULT NULL,
  `balance` bigint NULL DEFAULT NULL,
  PRIMARY KEY (`id_balance`) USING BTREE,
  INDEX `user_foreign_balance`(`user_id` ASC) USING BTREE,
  CONSTRAINT `user_foreign_balance` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for account_transfer
-- ----------------------------
DROP TABLE IF EXISTS `account_transfer`;
CREATE TABLE `account_transfer`  (
  `id_transaction` int NOT NULL AUTO_INCREMENT,
  `from_account` int NULL DEFAULT NULL,
  `to_account` int NULL DEFAULT NULL,
  `amount` bigint NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_transaction`) USING BTREE,
  INDEX `from_user_foreign`(`from_account` ASC) USING BTREE,
  INDEX `to_user_foreign`(`to_account` ASC) USING BTREE,
  CONSTRAINT `from_user_foreign` FOREIGN KEY (`from_account`) REFERENCES `users` (`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `to_user_foreign` FOREIGN KEY (`to_account`) REFERENCES `users` (`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id_user` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
