-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.32-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for multitent_testing
CREATE DATABASE IF NOT EXISTS `multitent_testing` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `multitent_testing`;

-- Dumping structure for table multitent_testing.saas_migrations
CREATE TABLE IF NOT EXISTS `saas_migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table multitent_testing.saas_migrations: ~6 rows (approximately)
/*!40000 ALTER TABLE `saas_migrations` DISABLE KEYS */;
INSERT INTO `saas_migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2018_07_05_105039_create_products_table', 1),
	(4, '2018_07_05_110042_create_permission_table', 1),
	(5, '2018_07_07_144849_permission_module', 1),
	(6, '2018_07_10_064726_create_plan__packages_table', 1);
/*!40000 ALTER TABLE `saas_migrations` ENABLE KEYS */;

-- Dumping structure for table multitent_testing.saas_model_has_permissions
CREATE TABLE IF NOT EXISTS `saas_model_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_type_model_id_index` (`model_type`,`model_id`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `saas_permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table multitent_testing.saas_model_has_permissions: ~0 rows (approximately)
/*!40000 ALTER TABLE `saas_model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `saas_model_has_permissions` ENABLE KEYS */;

-- Dumping structure for table multitent_testing.saas_model_has_roles
CREATE TABLE IF NOT EXISTS `saas_model_has_roles` (
  `role_id` int(10) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_type_model_id_index` (`model_type`,`model_id`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `saas_roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table multitent_testing.saas_model_has_roles: ~0 rows (approximately)
/*!40000 ALTER TABLE `saas_model_has_roles` DISABLE KEYS */;
INSERT INTO `saas_model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
	(1, 'Gutropolis\\User', 1);
/*!40000 ALTER TABLE `saas_model_has_roles` ENABLE KEYS */;

-- Dumping structure for table multitent_testing.saas_opportunity
CREATE TABLE IF NOT EXISTS `saas_opportunity` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `organization_id` int(11) DEFAULT NULL,
  `opportunity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stages` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `expected_revenue` double DEFAULT NULL,
  `probability` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sales_person_id` int(11) DEFAULT NULL,
  `sales_team_id` int(11) DEFAULT NULL,
  `next_action` date DEFAULT NULL,
  `expected_closing` date DEFAULT NULL,
  `lost_reason` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `internal_notes` text COLLATE utf8mb4_unicode_ci,
  `assigned_partner_id` int(11) DEFAULT NULL,
  `is_archived` int(11) DEFAULT NULL,
  `is_delete_list` int(11) DEFAULT NULL,
  `is_converted_list` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table multitent_testing.saas_opportunity: ~0 rows (approximately)
/*!40000 ALTER TABLE `saas_opportunity` DISABLE KEYS */;
/*!40000 ALTER TABLE `saas_opportunity` ENABLE KEYS */;

-- Dumping structure for table multitent_testing.saas_package_feature
CREATE TABLE IF NOT EXISTS `saas_package_feature` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `order_by` varchar(50) NOT NULL,
  `package_id` varchar(50) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table multitent_testing.saas_package_feature: ~0 rows (approximately)
/*!40000 ALTER TABLE `saas_package_feature` DISABLE KEYS */;
/*!40000 ALTER TABLE `saas_package_feature` ENABLE KEYS */;

-- Dumping structure for table multitent_testing.saas_password_resets
CREATE TABLE IF NOT EXISTS `saas_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table multitent_testing.saas_password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `saas_password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `saas_password_resets` ENABLE KEYS */;

-- Dumping structure for table multitent_testing.saas_permissions
CREATE TABLE IF NOT EXISTS `saas_permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `module` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table multitent_testing.saas_permissions: ~0 rows (approximately)
/*!40000 ALTER TABLE `saas_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `saas_permissions` ENABLE KEYS */;

-- Dumping structure for table multitent_testing.saas_permission_module
CREATE TABLE IF NOT EXISTS `saas_permission_module` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table multitent_testing.saas_permission_module: ~0 rows (approximately)
/*!40000 ALTER TABLE `saas_permission_module` DISABLE KEYS */;
/*!40000 ALTER TABLE `saas_permission_module` ENABLE KEYS */;

-- Dumping structure for table multitent_testing.saas_plan_types
CREATE TABLE IF NOT EXISTS `saas_plan_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table multitent_testing.saas_plan_types: ~0 rows (approximately)
/*!40000 ALTER TABLE `saas_plan_types` DISABLE KEYS */;
INSERT INTO `saas_plan_types` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'Gutropolis', 'Abhimaniyu', '2018-07-13 10:51:36', '2018-07-13 10:51:37');
/*!40000 ALTER TABLE `saas_plan_types` ENABLE KEYS */;

-- Dumping structure for table multitent_testing.saas_plan__packages
CREATE TABLE IF NOT EXISTS `saas_plan__packages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `plan_id` int(11) NOT NULL,
  `package_type` int(11) NOT NULL,
  `price` double NOT NULL,
  `price_month` double NOT NULL,
  `price_yearly` double NOT NULL,
  `have_trial` int(11) NOT NULL,
  `users_allowed` int(11) NOT NULL,
  `support_available` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table multitent_testing.saas_plan__packages: ~0 rows (approximately)
/*!40000 ALTER TABLE `saas_plan__packages` DISABLE KEYS */;
INSERT INTO `saas_plan__packages` (`id`, `plan_id`, `package_type`, `price`, `price_month`, `price_yearly`, `have_trial`, `users_allowed`, `support_available`, `created_by`, `created_at`, `updated_at`) VALUES
	(1, 1, 2, 234, 500, 34, 0, 1, 0, NULL, '2018-07-13 05:22:20', '2018-07-13 05:22:20');
/*!40000 ALTER TABLE `saas_plan__packages` ENABLE KEYS */;

-- Dumping structure for table multitent_testing.saas_products
CREATE TABLE IF NOT EXISTS `saas_products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table multitent_testing.saas_products: ~0 rows (approximately)
/*!40000 ALTER TABLE `saas_products` DISABLE KEYS */;
/*!40000 ALTER TABLE `saas_products` ENABLE KEYS */;

-- Dumping structure for table multitent_testing.saas_roles
CREATE TABLE IF NOT EXISTS `saas_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table multitent_testing.saas_roles: ~0 rows (approximately)
/*!40000 ALTER TABLE `saas_roles` DISABLE KEYS */;
INSERT INTO `saas_roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'web', '2018-07-13 10:51:52', '2018-07-13 10:51:53');
/*!40000 ALTER TABLE `saas_roles` ENABLE KEYS */;

-- Dumping structure for table multitent_testing.saas_role_has_permissions
CREATE TABLE IF NOT EXISTS `saas_role_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `saas_permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `saas_roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table multitent_testing.saas_role_has_permissions: ~0 rows (approximately)
/*!40000 ALTER TABLE `saas_role_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `saas_role_has_permissions` ENABLE KEYS */;

-- Dumping structure for table multitent_testing.saas_users
CREATE TABLE IF NOT EXISTS `saas_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table multitent_testing.saas_users: ~1 rows (approximately)
/*!40000 ALTER TABLE `saas_users` DISABLE KEYS */;
INSERT INTO `saas_users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Ajay', 'ajaythakur9329@outlook.com', '$2y$10$weC2KTThaJeTALaY9hwzTux3N555aatp8TGYSNEC.XvDNuFv4Zv7m', NULL, '2018-07-13 04:48:26', '2018-07-13 04:48:26');
/*!40000 ALTER TABLE `saas_users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
