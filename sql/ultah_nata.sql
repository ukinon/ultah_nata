-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               10.4.22-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.2.0.6576
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for ultah_nata
CREATE DATABASE IF NOT EXISTS `ultah_nata` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `ultah_nata`;

-- Dumping structure for table ultah_nata.post
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `post` varchar(999) NOT NULL,
  `postDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `user` (`user`),
  CONSTRAINT `user` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=138 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ultah_nata.post: ~13 rows (approximately)
REPLACE INTO `post` (`id`, `user`, `post`, `postDate`) VALUES
	(112, 1, 'test', '2023-03-10 01:37:18'),
	(113, 1, 'test lagi', '2023-03-10 02:09:39'),
	(114, 1, 'jaki kek tai', '2023-03-10 02:09:43'),
	(119, 1, 'babi', '2023-03-10 04:55:28'),
	(120, 2, 'papa', '2023-03-10 04:56:16'),
	(123, 1, 'jaki tolol', '2023-03-10 06:19:25'),
	(125, 1, 'happy birthday jaki', '2023-03-10 06:44:10'),
	(128, 1, 'test test satu dua tiga empat lima', '2023-03-12 12:14:51'),
	(129, 1, 'nata ini lagi test di hp', '2023-03-12 12:17:05'),
	(130, 1, 'test lagi', '2023-03-12 12:17:20'),
	(131, 1, 'test pagination', '2023-03-12 12:17:25'),
	(132, 1, 'fkapojksofpjksaopfjkasopfjfopasjf', '2023-03-12 13:09:48'),
	(133, 2, 'test', '2023-03-13 06:07:20');

-- Dumping structure for table ultah_nata.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `ttl` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `agama` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ultah_nata.users: ~2 rows (approximately)
REPLACE INTO `users` (`id`, `username`, `password`, `nama_lengkap`, `ttl`, `alamat`, `agama`, `status`) VALUES
	(1, 'ano', '5837f28470d02bce23c2b8a611b46590', 'Arfiano Jordhy Ramadhan', 'Bogor, 22 November 2002', 'Jalan Menteng No.113 Bogor Barat', 'Islam', 'Pacarnya Nata:3'),
	(2, 'nata', '32b976f17708b60ecca228623f418b64', 'Ervina Winata Sunjaya', 'Bogor, 19 Aoril 2003', 'Jl. Layungsari Gg.Kemboja No.21', 'Islam', 'Pacarnya Ano:3');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
