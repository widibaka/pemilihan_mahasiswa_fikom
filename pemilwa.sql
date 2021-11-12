-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.21-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table pemilwa.pemilwa_admin
DROP TABLE IF EXISTS `pemilwa_admin`;
CREATE TABLE IF NOT EXISTS `pemilwa_admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `nama_admin` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_admin`),
  UNIQUE KEY `nama_admin` (`nama_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table pemilwa.pemilwa_admin: ~1 rows (approximately)
DELETE FROM `pemilwa_admin`;
/*!40000 ALTER TABLE `pemilwa_admin` DISABLE KEYS */;
INSERT INTO `pemilwa_admin` (`id_admin`, `nama_admin`, `password`) VALUES
	(1, 'admin', 'admin');
/*!40000 ALTER TABLE `pemilwa_admin` ENABLE KEYS */;

-- Dumping structure for table pemilwa.pemilwa_kandidat
DROP TABLE IF EXISTS `pemilwa_kandidat`;
CREATE TABLE IF NOT EXISTS `pemilwa_kandidat` (
  `id_kandidat` int(11) NOT NULL AUTO_INCREMENT,
  `id_organisasi` int(11) DEFAULT 0,
  `nama_kandidat` varchar(100) DEFAULT '',
  `visi` text DEFAULT '',
  `misi` text DEFAULT '',
  `image` varchar(50) DEFAULT 'no_image.jpg',
  PRIMARY KEY (`id_kandidat`) USING BTREE,
  KEY `id_organisasi` (`id_organisasi`),
  CONSTRAINT `pemilwa_kandidat_ibfk_1` FOREIGN KEY (`id_organisasi`) REFERENCES `pemilwa_organisasi` (`id_organisasi`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table pemilwa.pemilwa_kandidat: ~3 rows (approximately)
DELETE FROM `pemilwa_kandidat`;
/*!40000 ALTER TABLE `pemilwa_kandidat` DISABLE KEYS */;
INSERT INTO `pemilwa_kandidat` (`id_kandidat`, `id_organisasi`, `nama_kandidat`, `visi`, `misi`, `image`) VALUES
	(2, 1, 'Dika', 'VisiCorp Visi On was a short-lived but influential graphical user interface-based operating environment program for IBM compatible personal computers running MS-DOS.', 'The Malaysia Institute for Supply Chain Innovation is a supply chain post-graduate school located in Shah Alam, Malaysia. The school was launched as a joint initiative between the Massachusetts Institute of Technology and the Government of Malaysia on March 22, 2011. MISI is a member of the MIT Global SCALE Network. MISI offers post-graduate and executive education programs in supply chain management. ', '1636633264-65.jpg'),
	(3, 1, 'Rio', '2 VisiCorp Visi On was a short-lived but influential graphical user interface-based operating environment program for IBM compatible personal computers running MS-DOS.', '2 The Malaysia Institute for Supply Chain Innovation is a supply chain post-graduate school located in Shah Alam, Malaysia. The school was launched as a joint initiative between the Massachusetts Institute of Technology and the Government of Malaysia on March 22, 2011. MISI is a member of the MIT Global SCALE Network. MISI offers post-graduate and executive education programs in supply chain management. ', '1636633275-28.jpg'),
	(6, 5, 'Suprapto', '<p>lorem ipsum adalah</p><ol><li>Kizamu</li></ol>', '<ul class="b_vList b_divsec" xss=removed><li data-priority="" xss=removed>Compiled CSS, JS<br>The fastest way to get Summernote is to download the precompiled and minified versions of our CSS and JavaScript. No documentation or original source code files are included. Download compiled</li><li data-priority="" xss=removed>Download source code<br>Get the latest Summernote LESS and Javascript source code by downloading it directly from GitHub.Download</li><li data-priority="" xss=removed>Clone or Fork via Github<br>Visit us on GitHub to clone or fork the Summernote project.project</li></ul>', '1636649320-67.JPG');
/*!40000 ALTER TABLE `pemilwa_kandidat` ENABLE KEYS */;

-- Dumping structure for table pemilwa.pemilwa_login_log
DROP TABLE IF EXISTS `pemilwa_login_log`;
CREATE TABLE IF NOT EXISTS `pemilwa_login_log` (
  `id_login` int(11) NOT NULL AUTO_INCREMENT,
  `nama_admin` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `waktu` datetime NOT NULL,
  PRIMARY KEY (`id_login`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table pemilwa.pemilwa_login_log: ~2 rows (approximately)
DELETE FROM `pemilwa_login_log`;
/*!40000 ALTER TABLE `pemilwa_login_log` DISABLE KEYS */;
INSERT INTO `pemilwa_login_log` (`id_login`, `nama_admin`, `waktu`) VALUES
	(1, 'admin', '2021-11-12 14:17:33'),
	(2, 'admin', '2021-11-12 14:18:49');
/*!40000 ALTER TABLE `pemilwa_login_log` ENABLE KEYS */;

-- Dumping structure for table pemilwa.pemilwa_organisasi
DROP TABLE IF EXISTS `pemilwa_organisasi`;
CREATE TABLE IF NOT EXISTS `pemilwa_organisasi` (
  `id_organisasi` int(11) NOT NULL AUTO_INCREMENT,
  `nama_organisasi` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `logo` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'default_logo.svg',
  `publikasi` enum('Ya','Tidak') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Tidak',
  `caption` text COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `ti` enum('1','0') COLLATE utf8_unicode_ci DEFAULT '1',
  `si` enum('1','0') COLLATE utf8_unicode_ci DEFAULT '1',
  `mi` enum('1','0') COLLATE utf8_unicode_ci DEFAULT '1',
  `tk` enum('1','0') COLLATE utf8_unicode_ci DEFAULT '1',
  `email_khusus` enum('1','0') COLLATE utf8_unicode_ci DEFAULT '1',
  PRIMARY KEY (`id_organisasi`),
  UNIQUE KEY `nama_organisasi` (`nama_organisasi`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table pemilwa.pemilwa_organisasi: ~8 rows (approximately)
DELETE FROM `pemilwa_organisasi`;
/*!40000 ALTER TABLE `pemilwa_organisasi` DISABLE KEYS */;
INSERT INTO `pemilwa_organisasi` (`id_organisasi`, `nama_organisasi`, `logo`, `publikasi`, `caption`, `ti`, `si`, `mi`, `tk`, `email_khusus`) VALUES
	(1, 'Ormawa 234', '1636695605-791.png', 'Ya', 'Dalam matematika, himpunan adalah kumpulan objek yang memiliki sifat yang dapat didefinisikan dengan jelas, atau lebih jelasnya adalah segala koleksi benda-benda tertentu yang dianggap sebagai satu kesatuan.', '1', '1', '1', '1', '1'),
	(3, 'Estetika', '1636696645-751.png', 'Ya', '', '0', '0', '0', '0', '0'),
	(4, 'BEM Fikom', 'default_logo.svg', 'Ya', '', '0', '0', '0', '0', '0'),
	(5, 'FOKAMM', 'default_logo.svg', 'Ya', '', '0', '0', '0', '0', '1'),
	(6, 'HMPSI UDB', 'default_logo.svg', 'Ya', '', '0', '0', '0', '0', '0'),
	(7, 'HMPMI UDB', 'default_logo.svg', 'Ya', '', '0', '0', '0', '0', '0'),
	(8, 'HMPTI UDB', 'default_logo.svg', 'Tidak', '', '1', '1', '1', '1', '1');
/*!40000 ALTER TABLE `pemilwa_organisasi` ENABLE KEYS */;

-- Dumping structure for table pemilwa.pemilwa_pemilih
DROP TABLE IF EXISTS `pemilwa_pemilih`;
CREATE TABLE IF NOT EXISTS `pemilwa_pemilih` (
  `id_pemilih` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT '',
  `nama_pemilih` varchar(255) NOT NULL DEFAULT '',
  `nim_mahasiswa` varchar(9) NOT NULL DEFAULT '',
  `prodi` varchar(50) NOT NULL DEFAULT '',
  `angkatan` varchar(50) NOT NULL DEFAULT '',
  `waktu` datetime NOT NULL,
  `id_kandidat` int(11) NOT NULL DEFAULT 0,
  `id_organisasi` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_pemilih`),
  KEY `id_kandidat` (`id_kandidat`),
  KEY `id_organisasi` (`id_organisasi`),
  CONSTRAINT `pemilwa_pemilih_ibfk_1` FOREIGN KEY (`id_kandidat`) REFERENCES `pemilwa_kandidat` (`id_kandidat`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table pemilwa.pemilwa_pemilih: ~1 rows (approximately)
DELETE FROM `pemilwa_pemilih`;
/*!40000 ALTER TABLE `pemilwa_pemilih` DISABLE KEYS */;
INSERT INTO `pemilwa_pemilih` (`id_pemilih`, `email`, `nama_pemilih`, `nim_mahasiswa`, `prodi`, `angkatan`, `waktu`, `id_kandidat`, `id_organisasi`) VALUES
	(18, 'sss@sss', 'Widi', '180103159', 'TI', '18', '2021-11-12 15:49:27', 2, 1);
/*!40000 ALTER TABLE `pemilwa_pemilih` ENABLE KEYS */;

-- Dumping structure for table pemilwa.pemilwa_pemilih_khusus
DROP TABLE IF EXISTS `pemilwa_pemilih_khusus`;
CREATE TABLE IF NOT EXISTS `pemilwa_pemilih_khusus` (
  `id_pem_khus` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `id_organisasi` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_pem_khus`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table pemilwa.pemilwa_pemilih_khusus: ~1 rows (approximately)
DELETE FROM `pemilwa_pemilih_khusus`;
/*!40000 ALTER TABLE `pemilwa_pemilih_khusus` DISABLE KEYS */;
INSERT INTO `pemilwa_pemilih_khusus` (`id_pem_khus`, `email`, `id_organisasi`) VALUES
	(3, 'widi.udb@gmail.com', 5);
/*!40000 ALTER TABLE `pemilwa_pemilih_khusus` ENABLE KEYS */;

-- Dumping structure for table pemilwa.pemilwa_settings
DROP TABLE IF EXISTS `pemilwa_settings`;
CREATE TABLE IF NOT EXISTS `pemilwa_settings` (
  `id_settings` int(1) DEFAULT 1,
  `tanggal_mulai` datetime DEFAULT NULL,
  `tanggal_selesai` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table pemilwa.pemilwa_settings: ~1 rows (approximately)
DELETE FROM `pemilwa_settings`;
/*!40000 ALTER TABLE `pemilwa_settings` DISABLE KEYS */;
INSERT INTO `pemilwa_settings` (`id_settings`, `tanggal_mulai`, `tanggal_selesai`) VALUES
	(1, '2021-11-17 00:00:00', '2021-11-20 23:59:59');
/*!40000 ALTER TABLE `pemilwa_settings` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
