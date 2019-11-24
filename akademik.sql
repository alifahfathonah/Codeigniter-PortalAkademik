-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2019 at 07:09 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `akademik`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen`
--

CREATE TABLE `absen` (
  `id` int(20) NOT NULL,
  `tatap_muka` varchar(50) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL,
  `nama_mahasiswa` varchar(100) NOT NULL,
  `hadir` varchar(50) NOT NULL,
  `sakit` varchar(50) NOT NULL,
  `izin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `NIDN` int(11) NOT NULL,
  `nama_dosen` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`NIDN`, `nama_dosen`, `email`, `password`, `photo`, `role`) VALUES
(12345, 'admin', 'admin@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '', 1),
(240001, 'Heri Hermawan', 'heri@gmail.com', '76074f612628b0b8b7639f6e244b4aa9', '6afb2db574552720ffc6b47f21d36a67.png', 0),
(240002, 'Endang Ayu Susanti', 'endang@gmail.com', '42d5032e0ff118cf8b2f2e8499822326', '', 0),
(240003, 'Yuni ayu susi', 'yuni@gmail.com', 'ee7c8e9b161ad434a06e4bdb0be6570f', '', 0),
(240071, 'Apriyandi', 'apriyandi@gmail.com', 'e63e07a8f776b0d1747dd389afca9e11', 'f50ded6b109fa4e7b36bf89ab56b0e68.jpg', 0),
(240085, 'Eka Yuni', 'Eka@gmail.com', '579a4b9c882eb9b6b0c978765d40a7f7', '', 0),
(2017400, 'Farhan', 'Farhan@gmail.com', 'c387ed8b1a24c19b7f852c4c52741c5e', '', 0),
(317086711, 'Yuyun Umaidah', 'yuyunumaida@gmail.com', '41ad1bd82a8744f040c267fdcafa54e8', '188edc73d90f5ed840d36a09a54f6140.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_pembayaran`
--

CREATE TABLE `jenis_pembayaran` (
  `kode_jenis` int(11) NOT NULL,
  `jenis_pembayaran` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_pembayaran`
--

INSERT INTO `jenis_pembayaran` (`kode_jenis`, `jenis_pembayaran`) VALUES
(1, 'BPP Semester 1'),
(2, 'SKS Semester 1'),
(3, 'BPP Semester 2'),
(4, 'SKS Semester 2'),
(5, 'BPP Semester 3'),
(6, 'SKS Semester 3'),
(7, 'BPP Semester 4'),
(8, 'SKS Semester 4'),
(9, 'BPP Semester 5'),
(10, 'SKS Semester 5'),
(11, 'BPP Semester 6'),
(12, 'SKS Semester 6'),
(13, 'BPP Semester 7'),
(14, 'SKS Semester 7'),
(15, 'BPP Semester 8'),
(16, 'SKS Semester 8');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `kode_jurusan` varchar(5) NOT NULL,
  `nama_jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`kode_jurusan`, `nama_jurusan`) VALUES
('SI', 'Sistem Informasi'),
('TIF', 'Teknik Informatika'),
('TKL', 'Teknik Kelautan'),
('EKO', 'Ekonomi');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `kode_kelas` varchar(20) NOT NULL,
  `NIDN` int(11) NOT NULL,
  `kode_matakuliah` int(11) NOT NULL,
  `waktu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kode_kelas`, `NIDN`, `kode_matakuliah`, `waktu`) VALUES
(1546180271, 'A', 240003, 1546180028, 'Senin, 13:00 sd 15:00'),
(1546180293, 'B', 240002, 1546180028, 'Selasa, 15.00 sd 17.00'),
(1546186323, 'MALAM', 2017400, 1546180089, 'Jumat, 18.00 sd 19.00'),
(1546354776, 'A', 240001, 1546180100, 'Kamis, 10.30 sd 12.30'),
(1546397403, 'MALAM', 2017400, 1546180028, 'Kamis, 19.00 sd 21.00');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `NIM` int(11) NOT NULL,
  `nama_mahasiswa` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `strata` varchar(50) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `angkatan` varchar(50) NOT NULL,
  `foto` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`NIM`, `nama_mahasiswa`, `email`, `password`, `strata`, `jurusan`, `angkatan`, `foto`) VALUES
(2017240030, 'ridiyantono', 'ridiyantono24@gmail.com', 'ffccdeccb0bd3e8805254389194508fe', 's1', 'sistem informasi', '2017', NULL),
(2017240072, 'genta prima syahnur', 'gentaprima600@gmail.com', '41ad1bd82a8744f040c267fdcafa54e8', 'S1', 'sistem informasi', '2017', NULL),
(2017240073, 'Vannesa ', 'eca@gmail.com', '087d395f6f13ae75ad622b6d8890ec37', 'S1', 'Sistem Informasi', '2018', NULL),
(2018240001, 'Ricko', 'basukisiregar00@gmail.com', '4cc17b1ceee97cd6b13a96c1a30ba267', 'S1', 'Sistem Informasi', '2017', '52765550da2f48b760e5afb8456bf123.png');

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE `matakuliah` (
  `kode_matakuliah` int(20) NOT NULL,
  `nama_matakuliah` varchar(50) NOT NULL,
  `sks` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matakuliah`
--

INSERT INTO `matakuliah` (`kode_matakuliah`, `nama_matakuliah`, `sks`) VALUES
(1546180028, 'Metodologi Penelitian', 3),
(1546180069, 'Pemograman WEB', 2),
(1546180078, 'Praktek Pemograman Web', 1),
(1546180089, 'Pemograman Java', 2),
(1546180100, 'Praktek Pemograman Java', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `NIM` int(11) NOT NULL,
  `nilai_absen` int(11) NOT NULL,
  `nilai_tugas` int(11) NOT NULL,
  `nilai_uts` int(11) NOT NULL,
  `nilai_uas` int(11) NOT NULL,
  `nilai_akhir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id`, `id_kelas`, `NIM`, `nilai_absen`, `nilai_tugas`, `nilai_uts`, `nilai_uas`, `nilai_akhir`) VALUES
(22, 1546354776, 2017240072, 61, 62, 62, 64, 63),
(23, 1546354776, 2017240073, 71, 72, 72, 74, 73),
(24, 1546180271, 2017240072, 51, 52, 52, 54, 53),
(25, 1546180271, 2017240073, 41, 42, 42, 44, 43);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `kode_jenis` int(11) NOT NULL,
  `NIM` int(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `tgl_pembayaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `kode_jenis`, `NIM`, `nominal`, `tgl_pembayaran`) VALUES
(1546414346, 1, 2017240072, 3000000, '02 January 2019'),
(1546510006, 1, 2018240001, 3000000, '03 January 2019');

-- --------------------------------------------------------

--
-- Table structure for table `perkuliahan`
--

CREATE TABLE `perkuliahan` (
  `kode_perkuliahan` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `NIM` int(11) NOT NULL,
  `kode_matakuliah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perkuliahan`
--

INSERT INTO `perkuliahan` (`kode_perkuliahan`, `id_kelas`, `NIM`, `kode_matakuliah`) VALUES
(1, 1546180271, 2017240072, 1546180028),
(3, 1546354776, 2017240072, 1546180100),
(4, 1546180271, 2017240073, 1546180028),
(6, 1546354776, 2017240073, 1546180100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`NIDN`);

--
-- Indexes for table `jenis_pembayaran`
--
ALTER TABLE `jenis_pembayaran`
  ADD PRIMARY KEY (`kode_jenis`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `kode_matakuliah` (`kode_matakuliah`),
  ADD KEY `NIDN` (`NIDN`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`NIM`);

--
-- Indexes for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`kode_matakuliah`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `NIM` (`NIM`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `kode_jenis` (`kode_jenis`),
  ADD KEY `NIM` (`NIM`);

--
-- Indexes for table `perkuliahan`
--
ALTER TABLE `perkuliahan`
  ADD PRIMARY KEY (`kode_perkuliahan`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `NIM` (`NIM`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `perkuliahan`
--
ALTER TABLE `perkuliahan`
  MODIFY `kode_perkuliahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`kode_matakuliah`) REFERENCES `matakuliah` (`kode_matakuliah`),
  ADD CONSTRAINT `kelas_ibfk_2` FOREIGN KEY (`NIDN`) REFERENCES `dosen` (`NIDN`);

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`NIM`) REFERENCES `mahasiswa` (`NIM`),
  ADD CONSTRAINT `nilai_ibfk_3` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`kode_jenis`) REFERENCES `jenis_pembayaran` (`kode_jenis`),
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`NIM`) REFERENCES `mahasiswa` (`NIM`);

--
-- Constraints for table `perkuliahan`
--
ALTER TABLE `perkuliahan`
  ADD CONSTRAINT `perkuliahan_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`),
  ADD CONSTRAINT `perkuliahan_ibfk_2` FOREIGN KEY (`NIM`) REFERENCES `mahasiswa` (`NIM`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
