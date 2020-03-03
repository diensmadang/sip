-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 23, 2020 at 03:29 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pgm`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

DROP TABLE IF EXISTS `dosen`;
CREATE TABLE IF NOT EXISTS `dosen` (
  `id_dosen` int(3) NOT NULL AUTO_INCREMENT,
  `nidn` int(15) DEFAULT NULL,
  `dosen` varchar(50) NOT NULL,
  PRIMARY KEY (`id_dosen`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nidn`, `dosen`) VALUES
(1, 12345, 'BUDI'),
(2, 54321, 'WATI');

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

DROP TABLE IF EXISTS `laporan`;
CREATE TABLE IF NOT EXISTS `laporan` (
  `kode_penelitian` varchar(20) NOT NULL,
  `judul_penelitian` text NOT NULL,
  `npj` varchar(50) NOT NULL,
  `tahun_penelitian` int(4) NOT NULL,
  `nama_instansi` text NOT NULL,
  `alamat_instansi` text NOT NULL,
  `pendanaan` int(4) NOT NULL,
  `tgl_terima` varchar(100) NOT NULL,
  `nomor_induk` varchar(20) NOT NULL,
  `hadiah_tukar` varchar(100) NOT NULL,
  `pdf` text NOT NULL,
  PRIMARY KEY (`kode_penelitian`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`kode_penelitian`, `judul_penelitian`, `npj`, `tahun_penelitian`, `nama_instansi`, `alamat_instansi`, `pendanaan`, `tgl_terima`, `nomor_induk`, `hadiah_tukar`, `pdf`) VALUES
('2020.1', 'Sistem Informasi', 'Endhul', 1, 'UMB', 'Alalak', 1, '14 February 2020', '12345', 'Mobil Avansa', 'IVONG_RUSDIYANTI-SUB-DCGGHW-BDJ-FLIGHT_ORIGINATING.pdf'),
('2020.2', 'hgfhgfh', 'Super Administrator', 1, 'UMB', 'Alalak', 1, '14 February 2020', '99999', 'Mobil Avansa', '1064-2172-3-PB.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_akhir`
--

DROP TABLE IF EXISTS `laporan_akhir`;
CREATE TABLE IF NOT EXISTS `laporan_akhir` (
  `id_laporan` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_laporan` date DEFAULT NULL,
  `usulan_id` int(11) NOT NULL,
  `ringkasan_penelitian` text DEFAULT NULL,
  `file_program` varchar(100) DEFAULT NULL,
  `file_sptb` varchar(100) DEFAULT NULL,
  `link_luaranjurnal` varchar(100) DEFAULT NULL,
  `file_pernyataan` varchar(100) DEFAULT NULL,
  `tahun_penelitian` int(4) DEFAULT NULL,
  `verifikasi` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_laporan`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laporan_akhir`
--

INSERT INTO `laporan_akhir` (`id_laporan`, `tgl_laporan`, `usulan_id`, `ringkasan_penelitian`, `file_program`, `file_sptb`, `link_luaranjurnal`, `file_pernyataan`, `tahun_penelitian`, `verifikasi`) VALUES
(1, '2020-02-22', 3, 'PENERAPAN SISTEM INI TELAH DILAKUKAN....', 'advokat3.pdf', 'advokat_(1)3.pdf', 'WWW.JURNAL.COM/DFKESCG', 'advokat_(2)3.pdf', 1, 'BERJALAN'),
(2, '2020-02-22', 2, 'APA SAJA', 'advokat4.pdf', 'advokat_(2)4.pdf', 'WWW.DDDD.COM/ADFDFD', 'advokat_(1)4.pdf', 1, 'BERJALAN'),
(3, '2020-02-22', 3, 'APA SAJA', 'advokat2.pdf', 'advokat_(1)2.pdf', 'WWW.DDDD.COM/ADFDFD', 'advokat_(2)2.pdf', 1, 'BERJALAN');

-- --------------------------------------------------------

--
-- Table structure for table `pendanaan`
--

DROP TABLE IF EXISTS `pendanaan`;
CREATE TABLE IF NOT EXISTS `pendanaan` (
  `code_pendanaan` int(4) NOT NULL AUTO_INCREMENT,
  `pendanaan_name` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  PRIMARY KEY (`code_pendanaan`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendanaan`
--

INSERT INTO `pendanaan` (`code_pendanaan`, `pendanaan_name`, `deskripsi`) VALUES
(1, 'RENOP LPPM 2020', 'Dana Penelitian sebesar 2 M');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_penelitian`
--

DROP TABLE IF EXISTS `riwayat_penelitian`;
CREATE TABLE IF NOT EXISTS `riwayat_penelitian` (
  `id_riwayat` int(3) NOT NULL AUTO_INCREMENT,
  `riwayat_penelitian` varchar(100) DEFAULT NULL,
  `riwayat_usulan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_riwayat`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `skema_penelitian`
--

DROP TABLE IF EXISTS `skema_penelitian`;
CREATE TABLE IF NOT EXISTS `skema_penelitian` (
  `id_skema` int(2) NOT NULL AUTO_INCREMENT,
  `skema` varchar(50) NOT NULL,
  `luaran` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_skema`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skema_penelitian`
--

INSERT INTO `skema_penelitian` (`id_skema`, `skema`, `luaran`) VALUES
(1, 'UNGGULAN', 'S1/S2/SCOPUS'),
(2, 'REGULER', 'S1-6 (TERAKREDITASI)'),
(3, 'MANDIRI', 'PUBLIKASI ILMIAH');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(4) NOT NULL AUTO_INCREMENT,
  `nama_user` varchar(50) NOT NULL,
  `level` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `foto` varchar(250) NOT NULL,
  `last_login` varchar(100) NOT NULL,
  `gelar` varchar(50) NOT NULL,
  `nidn` int(15) NOT NULL,
  `jafung` varchar(50) NOT NULL,
  `pendidikan` varchar(2) NOT NULL,
  `id_scholar` varchar(50) NOT NULL,
  `id_sinta` varchar(50) NOT NULL,
  `active` int(1) NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `level`, `email`, `username`, `password`, `foto`, `last_login`, `gelar`, `nidn`, `jafung`, `pendidikan`, `id_scholar`, `id_sinta`, `active`) VALUES
(9, 'TIM LP2M', 'Super Admin', 'superadmin@gmail.com', 'super', '1b3231655cebb7a1f783eddf27d254ca', '1479878875351.png', 'February 22, 2020 - 22:10', '', 0, '', '', '', '', 1),
(11, 'Admin', 'Admin', 'admin@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'iconpetugas.png', 'May 01, 2017 - 23:22', '', 0, '', '', '', '', 0),
(13, 'Pimpinan', 'Pimpinan', 'pimpinan@gmail.com', 'pimpinan', '90973652b88fe07d05a4304f0a945de8', '1479878787802.png', 'May 01, 2017 - 23:24', '', 0, '', '', '', '', 0),
(16, 'Pengunjung', 'Pengunjung', 'Pengunjung@gmail.com', 'user', '9bc65c2abec141778ffaa729489f3e87', 'anggota.png', 'May 01, 2017 - 22:39', '', 0, '', '', '', '', 0),
(18, 'Nyoman', 'Pengunjung', 'nyoman@gmail.com', 'asik', '7d6805ee1c2ddfbd75f951edd438e675', '1479878910495.png', 'April 26, 2017 - 06:35', '', 0, '', '', '', '', 0),
(19, 'berangkat', 'Pengunjung', 'berangkat@gmail.com', 'berangkat', 'ad70a434c93fd7917e452960322aef12', '1479878828327.png', '', '', 0, '', '', '', '', 0),
(20, 'Galih', 'Pengunjung', 'gpro@gmail.com', '12345', '827ccb0eea8a706c4c34a16891f84e7b', 'IMG-20150829-WA0002.jpg', '', '', 0, '', '', '', '', 0),
(21, 'Endhul', 'Pengunjung', 'end@gmail.com', 'endhul', 'b80cb397701e0a2f633f8afd9150adf0', '', 'February 18, 2020 - 05:58', 'MSc', 12345, 'Profesor', 'S1', 'A12S123D', 'AS123XDE', 1);

-- --------------------------------------------------------

--
-- Table structure for table `usulan_penelitian`
--

DROP TABLE IF EXISTS `usulan_penelitian`;
CREATE TABLE IF NOT EXISTS `usulan_penelitian` (
  `id_usulan` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_usulan` date DEFAULT NULL,
  `skema_id` int(3) DEFAULT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `bidang_kajian` varchar(100) DEFAULT NULL,
  `dana_penelitian` int(4) DEFAULT NULL,
  `ketua` varchar(50) DEFAULT NULL,
  `anggota2` varchar(50) DEFAULT NULL,
  `anggota3` varchar(50) DEFAULT NULL,
  `tenaga_ahli` varchar(50) DEFAULT NULL,
  `file_proposal` varchar(100) DEFAULT NULL,
  `file_suratrencanabelanja` varchar(100) DEFAULT NULL,
  `file_pernyataan` varchar(100) DEFAULT NULL,
  `tahun_penelitian` int(4) DEFAULT NULL,
  `verifikasi` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_usulan`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usulan_penelitian`
--

INSERT INTO `usulan_penelitian` (`id_usulan`, `tgl_usulan`, `skema_id`, `judul`, `bidang_kajian`, `dana_penelitian`, `ketua`, `anggota2`, `anggota3`, `tenaga_ahli`, `file_proposal`, `file_suratrencanabelanja`, `file_pernyataan`, `tahun_penelitian`, `verifikasi`) VALUES
(1, '2020-02-20', 3, 'SISTEM INFORMASI', 'BISNIS INFORMATIKA', 1, 'BUDI', 'WATI', 'BUDI', 'BUDIMAN', '20200114_100445.pdf', 'pemohon.pdf', 'Latihan_Pra_USBN_Matematika.pdf', 1, 'PENDING'),
(2, '2020-02-22', 2, 'PENERAPAN SISTEM', 'SISTEM INFORMASI', 1, 'IWAN', 'WATI', 'AMIR', 'DENDI', 'PENERAPAN.PDF', 'SURAT.PDF', 'PERNYATAAN.PDF', 1, 'DITERIMA'),
(3, '2020-02-21', 3, 'SISTEM PELURU KENDALI', 'BALISTIK AKADEMIK', 1, 'WATI', 'BUDI', '', 'DONO', 'advokat1.pdf', 'advokat_(1)1.pdf', 'advokat_(2)1.pdf', 1, 'PENDING');

-- --------------------------------------------------------

--
-- Table structure for table `years`
--

DROP TABLE IF EXISTS `years`;
CREATE TABLE IF NOT EXISTS `years` (
  `code_years` int(4) NOT NULL AUTO_INCREMENT,
  `years_name` varchar(11) NOT NULL,
  PRIMARY KEY (`code_years`),
  UNIQUE KEY `years_name` (`years_name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `years`
--

INSERT INTO `years` (`code_years`, `years_name`) VALUES
(1, '2020');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
