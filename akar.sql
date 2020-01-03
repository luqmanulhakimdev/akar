-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.19 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for akar
DROP DATABASE IF EXISTS `akar`;
CREATE DATABASE IF NOT EXISTS `akar` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `akar`;

-- Dumping structure for table akar.absen
DROP TABLE IF EXISTS `absen`;
CREATE TABLE IF NOT EXISTS `absen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_karyawan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `masuk` time NOT NULL,
  `pulang` time DEFAULT NULL,
  `keterangan` text NOT NULL,
  `ip_address` varchar(20) NOT NULL,
  `latlng_masuk` text NOT NULL,
  `latlng_pulang` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_karyawan` (`id_karyawan`),
  CONSTRAINT `absen_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table akar.absen: ~0 rows (approximately)
DELETE FROM `absen`;
/*!40000 ALTER TABLE `absen` DISABLE KEYS */;
/*!40000 ALTER TABLE `absen` ENABLE KEYS */;

-- Dumping structure for table akar.admin
DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `awalan` varchar(20) DEFAULT NULL,
  `nama_depan` varchar(100) NOT NULL,
  `nama_tengah` varchar(100) DEFAULT NULL,
  `nama_belakang` varchar(100) NOT NULL,
  `akhiran` varchar(20) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `foto` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table akar.admin: ~1 rows (approximately)
DELETE FROM `admin`;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`id`, `awalan`, `nama_depan`, `nama_tengah`, `nama_belakang`, `akhiran`, `username`, `password`, `foto`) VALUES
	(1, NULL, 'Luqmanul', NULL, 'Hakim', ', SI', 'admin', '$2y$12$uKftHEbZFAnP0lGpCeANfOAgp8xEleDeH9/X8tmFaCY5DoaEHW67K', NULL);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- Dumping structure for table akar.karyawan
DROP TABLE IF EXISTS `karyawan`;
CREATE TABLE IF NOT EXISTS `karyawan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `awalan` varchar(20) NOT NULL,
  `nama_depan` varchar(100) NOT NULL,
  `nama_tengah` varchar(100) NOT NULL,
  `nama_belakang` varchar(100) NOT NULL,
  `akhiran` varchar(20) NOT NULL,
  `jalan_no` varchar(255) NOT NULL,
  `rt` varchar(10) NOT NULL,
  `rw` varchar(10) NOT NULL,
  `desa_kel` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kd_pos` varchar(10) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `jalan_no_domisili` varchar(255) NOT NULL,
  `rt_domisili` varchar(10) NOT NULL,
  `rw_domisili` varchar(10) NOT NULL,
  `desa_kel_domisili` varchar(100) NOT NULL,
  `kecamatan_domisili` varchar(100) NOT NULL,
  `kd_pos_domisili` varchar(10) NOT NULL,
  `kota_domisili` varchar(100) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `status` varchar(100) NOT NULL,
  `no_ktp` varchar(20) NOT NULL,
  `no_kk` varchar(20) NOT NULL,
  `no_npwp` varchar(20) NOT NULL,
  `no_bpjs_ketenagakerjaan` varchar(20) NOT NULL,
  `no_bpjs_kesehatan` varchar(20) NOT NULL,
  `bank` varchar(100) NOT NULL,
  `no_rek` varchar(100) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `email` varchar(100) NOT NULL,
  `j_kel` varchar(10) NOT NULL,
  `tem_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tgl_mulai_bekerja` date NOT NULL,
  `status_kepegawaian` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `foto` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table akar.karyawan: ~1 rows (approximately)
DELETE FROM `karyawan`;
/*!40000 ALTER TABLE `karyawan` DISABLE KEYS */;
INSERT INTO `karyawan` (`id`, `username`, `password`, `awalan`, `nama_depan`, `nama_tengah`, `nama_belakang`, `akhiran`, `jalan_no`, `rt`, `rw`, `desa_kel`, `kecamatan`, `kd_pos`, `kota`, `jalan_no_domisili`, `rt_domisili`, `rw_domisili`, `desa_kel_domisili`, `kecamatan_domisili`, `kd_pos_domisili`, `kota_domisili`, `agama`, `status`, `no_ktp`, `no_kk`, `no_npwp`, `no_bpjs_ketenagakerjaan`, `no_bpjs_kesehatan`, `bank`, `no_rek`, `telepon`, `email`, `j_kel`, `tem_lahir`, `tgl_lahir`, `tgl_mulai_bekerja`, `status_kepegawaian`, `jabatan`, `foto`) VALUES
	(1, 'agus', '$2y$10$mMF0DyHAXZZfxlOl.B.66uSqqrclN5pcwvGaTsBSls0DsLPPDMgNe', '', 'Agus', 'Budi', 'Nugraha', 'S.kom', 'Jl. Krembangan Baru 11', '002', '013', 'Kemayoran', 'Krembangan', '60442', 'Surabaya', '', '', '', '', '', '', '', 'Islam', 'Menikah', '676565465678', '676565463212', '', '', '', '', '', '08225342346', 'agusnugraha112@gmail.com', 'Laki-laki', 'Surabaya', '1995-04-09', '2017-01-02', 'Tetap', 'Staff Admin', NULL);
/*!40000 ALTER TABLE `karyawan` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
