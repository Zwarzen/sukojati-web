/*
 Navicat Premium Data Transfer

 Source Server         : lokalLaragon
 Source Server Type    : MySQL
 Source Server Version : 50733
 Source Host           : localhost:3306
 Source Schema         : webdesa

 Target Server Type    : MySQL
 Target Server Version : 50733
 File Encoding         : 65001

 Date: 14/06/2022 07:57:40
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for halaman
-- ----------------------------
DROP TABLE IF EXISTS `halaman`;
CREATE TABLE `halaman`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'nama yang tampil oleh publik',
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'nama yang sudah diformat agar bisa digunakan sebagai id samaran untuk identitas link',
  `is_statis` enum('1','0') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '1' COMMENT '0=dinamis, s=statis\r\n\r\n0 => dinamins yaitu page yang membutuhkan data dari databse melalui controler khsus\r\n\r\n\r\n1 => statis yaitu page yang bisa diisi dengan form wisywyg, artinya bisa disii langsung dengan text editor',
  `img_raw` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `img_thumb` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'wallpaper untuk halaman ini',
  `img_desc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL COMMENT 'isi halaman brupa text ',
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'potongan bagian ruet yang dituju ataua alamat yang dituju',
  `desc` varchar(125) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `allow_comment` enum('yes','no') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no',
  `keyword` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `published` enum('yes','no') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no' COMMENT 'jika pilih no maka berita tidak akan terlihat',
  `publishedby` varchar(125) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `urutan` int(11) NULL DEFAULT NULL,
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `creatorid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `createdby` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `modifiedby` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `modifierid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `publish_date` datetime(0) NULL DEFAULT NULL COMMENT 'tanggal publish pertama kali',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of halaman
-- ----------------------------
INSERT INTO `halaman` VALUES (1, '0', 'Tentang', 'tentang', '1', NULL, NULL, NULL, NULL, 'page/tentang', '', 'no', NULL, 'yes', NULL, NULL, NULL, '1', 'progy21@gmail.com', 'adminweb@banyuwangikab.go.id', '3', '2020-12-12 01:18:52', '2022-06-13 20:34:15', '2020-12-12 01:18:52');
INSERT INTO `halaman` VALUES (2, '9', 'Profil', 'anggota', '1', NULL, NULL, NULL, NULL, 'page/tentang', '', 'no', NULL, 'yes', NULL, NULL, NULL, '1', 'progy21@gmail.com', 'adminweb@banyuwangikab.go.id', '3', '2020-12-12 01:18:52', '2022-06-13 20:54:40', '2020-12-12 01:18:52');
INSERT INTO `halaman` VALUES (3, '9', 'Layanan', 'jdih', '1', NULL, NULL, NULL, NULL, 'page/tentang', '', 'no', NULL, 'yes', NULL, NULL, '', '1', 'progy21@gmail.com', 'adminweb@banyuwangikab.go.id', '3', '2020-12-12 01:17:55', '2022-06-13 20:54:22', '2020-12-12 01:18:52');
INSERT INTO `halaman` VALUES (4, '0', 'Program Kerja', 'siprada', '1', NULL, NULL, NULL, NULL, 'page/tentang', '', 'no', NULL, 'yes', NULL, NULL, '', '1', 'progy21@gmail.com', 'progy21@gmail.com', '1', '2020-12-12 01:18:52', '2021-08-23 11:15:44', '2020-12-12 01:18:52');
INSERT INTO `halaman` VALUES (5, '0', 'Transparansi', 'transparansi', '1', NULL, NULL, NULL, NULL, 'page/tentang', '', 'no', NULL, 'yes', NULL, NULL, '', '1', 'progy21@gmail.com', 'adminweb@banyuwangikab.go.id', '3', '2020-12-12 01:33:34', '2022-06-13 20:34:07', '2020-12-12 01:18:52');
INSERT INTO `halaman` VALUES (6, '0', 'Lembaga', 'lembaga', '1', NULL, NULL, NULL, NULL, 'page/tentang', '', 'no', NULL, 'yes', NULL, NULL, '', '1', 'progy21@gmail.com', 'adminweb@banyuwangikab.go.id', '3', '2020-12-12 01:34:35', '2022-06-13 20:33:56', '2020-12-12 01:18:52');
INSERT INTO `halaman` VALUES (7, '0', 'Potensi', 'potensi', '1', NULL, NULL, NULL, NULL, 'page/tentang', '', 'no', NULL, 'yes', NULL, NULL, '', '1', 'progy21@gmail.com', 'adminweb@banyuwangikab.go.id', '3', '2020-12-15 21:09:04', '2022-06-13 20:33:46', '2020-12-12 01:18:52');
INSERT INTO `halaman` VALUES (8, '0', 'Berita', 'berita', '1', NULL, NULL, NULL, NULL, 'page/tentang', '', 'no', NULL, 'yes', NULL, NULL, '', '1', 'progy21@gmail.com', 'adminweb@banyuwangikab.go.id', '3', '2021-06-02 11:25:24', '2022-06-13 20:33:37', '2020-12-12 01:18:52');
INSERT INTO `halaman` VALUES (9, '8', 'Galeri', 'galeri', '1', 'urcwsjjsuy_bwifest.jpg', 'thmb_urcwsjjsuy_bwifest.jpg', NULL, '<p>ccxvfxc</p>', 'page/tentang', '', 'no', NULL, 'yes', NULL, 1, '', '1', 'progy21@gmail.com', 'adminweb@banyuwangikab.go.id', '3', '2021-08-24 08:40:34', '2022-06-13 21:02:52', '2020-12-12 01:18:52');
INSERT INTO `halaman` VALUES (10, '0', 'Layanan KTP', NULL, '1', NULL, NULL, NULL, NULL, 'page/tentang', 'layanan KTP', 'no', NULL, 'yes', NULL, NULL, NULL, NULL, NULL, 'adminweb@banyuwangikab.go.id', '3', NULL, '2022-06-13 20:34:47', NULL);
INSERT INTO `halaman` VALUES (11, '8', 'layanan SKCK', 'layanan-skck', '1', 'vxmgcambfy_profil-pu.jpg', 'thmb_vxmgcambfy_profil-pu.jpg', NULL, '<p>dsf</p>', 'page/tentang', 'dcd', 'no', 'dfds', 'yes', '', NULL, NULL, '3', 'adminweb@banyuwangikab.go.id', 'adminweb@banyuwangikab.go.id', '3', '2022-06-13 19:11:46', '2022-06-13 21:13:56', NULL);

SET FOREIGN_KEY_CHECKS = 1;
