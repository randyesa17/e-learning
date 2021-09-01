-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 24, 2021 at 07:22 AM
-- Server version: 8.0.22
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elearning`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `idadmin` varchar(200) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`idadmin`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idadmin`, `nama`, `username`, `password`) VALUES
('admin603c9b5acb51c', 'Randy Esa Priadi', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
('admin603cabd7e4a22', 'Esa', 'esa', '80ad0b9fa48a74fe86a9c8ee665d96bb');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

DROP TABLE IF EXISTS `guru`;
CREATE TABLE IF NOT EXISTS `guru` (
  `nip` varchar(50) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `tempatLahir` varchar(50) NOT NULL,
  `tglLahir` date NOT NULL,
  `kelamin` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `idmapel` int NOT NULL,
  `foto` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`nip`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

DROP TABLE IF EXISTS `jadwal`;
CREATE TABLE IF NOT EXISTS `jadwal` (
  `idjadwal` int NOT NULL AUTO_INCREMENT,
  `namajadwal` varchar(100) NOT NULL,
  `ruang` varchar(10) NOT NULL,
  `jenis` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tgl` date NOT NULL,
  PRIMARY KEY (`idjadwal`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

DROP TABLE IF EXISTS `kelas`;
CREATE TABLE IF NOT EXISTS `kelas` (
  `idkelas` int NOT NULL AUTO_INCREMENT,
  `kelas` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`idkelas`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kumpulantugas`
--

DROP TABLE IF EXISTS `kumpulantugas`;
CREATE TABLE IF NOT EXISTS `kumpulantugas` (
  `no` int NOT NULL AUTO_INCREMENT,
  `kodekelas` varchar(10) NOT NULL,
  `kodetugas` varchar(20) NOT NULL,
  `nis` varchar(15) NOT NULL,
  `file` varchar(255) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

DROP TABLE IF EXISTS `mapel`;
CREATE TABLE IF NOT EXISTS `mapel` (
  `idmapel` int NOT NULL AUTO_INCREMENT,
  `mapel` varchar(100) NOT NULL,
  PRIMARY KEY (`idmapel`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

DROP TABLE IF EXISTS `materi`;
CREATE TABLE IF NOT EXISTS `materi` (
  `idmateri` varchar(20) NOT NULL,
  `tema` varchar(255) NOT NULL,
  `koderuang` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tipe` varchar(50) NOT NULL,
  `file` varchar(255) NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idmateri`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

DROP TABLE IF EXISTS `nilai`;
CREATE TABLE IF NOT EXISTS `nilai` (
  `no` int NOT NULL AUTO_INCREMENT,
  `nis` varchar(15) NOT NULL,
  `idmapel` int NOT NULL,
  `nilaiTugas` int DEFAULT NULL,
  `nilaiUjian` int DEFAULT NULL,
  `nilaiAkhir` int DEFAULT NULL,
  PRIMARY KEY (`no`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengerjaanujian`
--

DROP TABLE IF EXISTS `pengerjaanujian`;
CREATE TABLE IF NOT EXISTS `pengerjaanujian` (
  `no` int NOT NULL AUTO_INCREMENT,
  `nis` varchar(15) NOT NULL,
  `kodeujian` varchar(10) NOT NULL,
  `tglselesai` datetime NOT NULL,
  `nilai` int DEFAULT NULL,
  PRIMARY KEY (`no`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `idpost` int NOT NULL AUTO_INCREMENT,
  `koderuang` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `idmateri` varchar(20) DEFAULT NULL,
  `tema` varchar(255) DEFAULT NULL,
  `tipe` varchar(50) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `kodetugas` varchar(20) DEFAULT NULL,
  `perintah` varchar(200) DEFAULT NULL,
  `kodeujian` varchar(10) DEFAULT NULL,
  `jenisujian` varchar(100) DEFAULT NULL,
  `tglujian` date DEFAULT NULL,
  `tgl` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idpost`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ruangkelas`
--

DROP TABLE IF EXISTS `ruangkelas`;
CREATE TABLE IF NOT EXISTS `ruangkelas` (
  `no` int NOT NULL AUTO_INCREMENT,
  `koderuang` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `namaruang` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `idmapel` int NOT NULL,
  `idkelas` int NOT NULL,
  `nip` varchar(50) NOT NULL,
  `nis` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`no`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

DROP TABLE IF EXISTS `siswa`;
CREATE TABLE IF NOT EXISTS `siswa` (
  `nis` varchar(15) NOT NULL,
  `nisn` varchar(15) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `tempatLahir` varchar(50) NOT NULL,
  `tglLahir` date NOT NULL,
  `kelamin` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `idkelas` int NOT NULL,
  `foto` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`nis`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

DROP TABLE IF EXISTS `soal`;
CREATE TABLE IF NOT EXISTS `soal` (
  `idsoal` int NOT NULL AUTO_INCREMENT,
  `kodeujian` varchar(10) NOT NULL,
  `soal` text NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `pilA` varchar(255) NOT NULL,
  `pilB` varchar(255) NOT NULL,
  `pilC` varchar(255) NOT NULL,
  `pilD` varchar(255) NOT NULL,
  `kunci` varchar(5) NOT NULL,
  PRIMARY KEY (`idsoal`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

DROP TABLE IF EXISTS `tugas`;
CREATE TABLE IF NOT EXISTS `tugas` (
  `kodetugas` varchar(20) NOT NULL,
  `koderuang` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `perintah` varchar(200) NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`kodetugas`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ujian`
--

DROP TABLE IF EXISTS `ujian`;
CREATE TABLE IF NOT EXISTS `ujian` (
  `kodeujian` varchar(10) NOT NULL,
  `koderuang` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `tglujian` date NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`kodeujian`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
