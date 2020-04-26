-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2020 at 06:32 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `politala`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(100) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(200) NOT NULL,
  `verifikasi` int(1) NOT NULL,
  `code_verif` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `nama`, `email`, `password`, `verifikasi`, `code_verif`) VALUES
('acid', 'acid', 'missyoucid@gmail.com', '$2y$10$IT7pn.FJLvK7gynungR0T.CufVckdzJDdb7M5318Sg0eoH8m5na7O', 1, 'f923389424a4f813fe311e13e24932f1'),
('admin', 'admin', 'admin@gmail.com', '$2y$10$IT7pn.FJLvK7gynungR0T.CufVckdzJDdb7M5318Sg0eoH8m5na7O', 1, 'f923389424a4f813fe311e13e24932f1');

-- --------------------------------------------------------

--
-- Table structure for table `admin_auth`
--

CREATE TABLE `admin_auth` (
  `id` int(11) NOT NULL,
  `code` varchar(200) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_auth`
--

INSERT INTO `admin_auth` (`id`, `code`) VALUES
(1, '$2y$10$MLLulwDv3vRU7saDIEID2uS6woApY/YUeACpC4qfrGh9NGsE/Ccyu'),
(2, '$2y$10$9tw1/3IzZJY2vADditvhxeA4oyoVTqwUvXlmf0QbTEDpr9JaTOfUK'),
(3, '$2y$10$9tw1/3IzZJY2vADditvhxeA4oyoVTqwUvXlmf0QbTEDpr9JaTOfUK'),
(4, '$2y$10$6jM.FiTnhsszhVpoOIh2zeTTE6DR.wLP69om8uqv8Et7/F9ROQPC.');

-- --------------------------------------------------------

--
-- Table structure for table `dokumentasi_pemilihan`
--

CREATE TABLE `dokumentasi_pemilihan` (
  `id` int(4) NOT NULL,
  `tahun` int(4) NOT NULL,
  `tipe` int(1) NOT NULL,
  `src` varchar(100) NOT NULL,
  `file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokumentasi_pemilihan`
--

INSERT INTO `dokumentasi_pemilihan` (`id`, `tahun`, `tipe`, `src`, `file`) VALUES
(1, 2019, 1, 'assets/voting_assets/video/', 'doc-1.mp4'),
(2, 2019, 0, 'assets/voting_assets/image/dokumentasi/2019/', 'doc-2.jpg'),
(3, 2019, 0, 'assets/voting_assets/image/dokumentasi/2019/', 'doc-3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kpum`
--

CREATE TABLE `kpum` (
  `id` int(11) NOT NULL,
  `tahun` int(4) NOT NULL,
  `struktur_kepengurusan` varchar(150) NOT NULL,
  `visi` varchar(150) NOT NULL,
  `misi` varchar(150) NOT NULL,
  `dokumentasi` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kpum`
--

INSERT INTO `kpum` (`id`, `tahun`, `struktur_kepengurusan`, `visi`, `misi`, `dokumentasi`) VALUES
(2, 2016, '05042020_044513.jpg', '05042020_0445131.jpg', '05042020_0445132.jpg', '05042020_0445133.jpg'),
(3, 2015, '05042020_044638.jpg', '05042020_0446381.jpg', '05042020_0446382.jpg', '05042020_0446383.jpg'),
(4, 2020, '', '', '', NULL),
(5, 3090, '', '', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(8) NOT NULL,
  `nama` varchar(80) CHARACTER SET utf8 NOT NULL,
  `semester` varchar(2) CHARACTER SET utf8 NOT NULL,
  `kelas` varchar(2) CHARACTER SET utf8 NOT NULL,
  `status` varchar(11) CHARACTER SET utf8 NOT NULL,
  `status_value` int(1) NOT NULL,
  `angkatan` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `semester`, `kelas`, `status`, `status_value`, `angkatan`) VALUES
('A1314010', 'Rama', '4', '4D', 'Aktif', 1, 2020),
('A131600', 'Gapuri', '4', '4C', 'Aktif', 1, 2019),
('A1316060', 'tes', '4C', '4', 'Aktif', 1, 2019),
('A1316070', 'MUHAMMAD RASYID', 'IV', '4D', 'Aktif', 1, 2019),
('A1316071', 'Muhammad Fani', 'IV', '6C', 'Aktif', 1, 2019),
('A1316072', 'Masyuri', 'IV', '6C', 'Aktif', 1, 2019),
('A1316081', 'Nana', '3', '3C', 'Aktif', 1, 2020),
('A1316082', 'Oca', '3', '3D', 'Aktif', 1, 2020),
('A1316090', 'FAJAR', 'II', '3C', 'Aktif', 1, 2020);

-- --------------------------------------------------------

--
-- Table structure for table `paslon`
--

CREATE TABLE `paslon` (
  `no_urut` int(2) NOT NULL,
  `presma` varchar(50) NOT NULL,
  `wapresma` varchar(50) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `visi` varchar(100) NOT NULL,
  `misi` varchar(100) NOT NULL,
  `jumlah_pemilih` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paslon`
--

INSERT INTO `paslon` (`no_urut`, `presma`, `wapresma`, `foto`, `visi`, `misi`, `jumlah_pemilih`) VALUES
(3, 'A1316071', 'A1316072', '04042020_151224.jpg', '04042020_1512241.jpg', '04042020_1512242.jpg', 0),
(4, 'A1316081', 'A1316082', '04042020_160759.jpg', '04042020_1607591.jpg', '04042020_1607592.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pencoblos`
--

CREATE TABLE `pencoblos` (
  `id` int(11) NOT NULL,
  `nim` varchar(8) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `angkatan` int(4) NOT NULL,
  `password` varchar(200) NOT NULL,
  `verifikasi` int(1) NOT NULL,
  `paslon_pilihan` int(2) NOT NULL,
  `code_verif` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pencoblos`
--

INSERT INTO `pencoblos` (`id`, `nim`, `nama`, `email`, `jurusan`, `angkatan`, `password`, `verifikasi`, `paslon_pilihan`, `code_verif`) VALUES
(4, 'A1316090', 'FAJAR', 'f@gmail.com', 'Diploma Komputer', 2020, '$2y$10$1OAXjpiqBaRsU/RkMh/JPOpH9fnOTAQt7ohClW9fKrU6AmG/.vs6i', 1, 4, 'efeed9ecfbf74dddc4bd6e1996523c4d'),
(19, 'A1314010', 'Rama', 'muchrifani@gmail.com', 'Sistem Komputer', 2020, '$2y$10$77R4qX8dSMwIfihk7isjUOBqxaLP16Fo11fmZRbKddJXURLzG7Kf6', 1, 4, '5f857b8fa79a3976227ec13c9b922c31'),
(20, 'A1316081', 'Nana', 'rasyid.acid98@gmail.com', 'Sistem Informasi', 2020, '$2y$10$C2QVNoCSfxg6Cv9C2xUAcOU.bvgvz.x94uRxuZ5mYb5yXNBGUYR4m', 1, 4, '4738763fe620a1308928b48a4b8f88fd');

-- --------------------------------------------------------

--
-- Table structure for table `pending_paslon`
--

CREATE TABLE `pending_paslon` (
  `id` int(11) NOT NULL,
  `nim_presma` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `nim_wapresma` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `nama_presma` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `nama_wapresma` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `email_presma` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `email_wapresma` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `jurusan_presma` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `jurusan_wapresma` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `angkatan_presma` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `angkatan_wapresma` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `foto_paslon` varchar(255) NOT NULL,
  `visi` varchar(255) NOT NULL,
  `misi` varchar(255) NOT NULL,
  `berkas_presma` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `berkas_wapresma` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `status` varchar(100) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pending_paslon`
--

INSERT INTO `pending_paslon` (`id`, `nim_presma`, `nim_wapresma`, `nama_presma`, `nama_wapresma`, `email_presma`, `email_wapresma`, `jurusan_presma`, `jurusan_wapresma`, `angkatan_presma`, `angkatan_wapresma`, `foto_paslon`, `visi`, `misi`, `berkas_presma`, `berkas_wapresma`, `status`) VALUES
(31, 'A1316071', 'A1316072', 'Muhammad Fani', 'Masyuri', 'huri@g.com', 'tes@gmail.com', 'Sistem Komputer', 'Sistem Komputer', '2019', '2019', '04042020_151224.jpg', '04042020_1512241.jpg', '04042020_1512242.jpg', '04042020_1512243.jpg', '04042020_1512244.jpg', '1'),
(32, 'A1316081', 'A1316082', 'Nana', 'Oca', 'nana@gmail.com', 'oca@gmail.com', 'Sistem Komputer', 'Sistem Komputer', '2020', '2020', '04042020_160759.jpg', '04042020_1607591.jpg', '04042020_1607592.jpg', '04042020_1607593.jpg', '04042020_1607594.jpg', '2');

-- --------------------------------------------------------

--
-- Table structure for table `presma`
--

CREATE TABLE `presma` (
  `no_urut` int(2) NOT NULL,
  `nim` varchar(8) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `angkatan` int(4) NOT NULL,
  `email` varchar(100) NOT NULL,
  `file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `presma`
--

INSERT INTO `presma` (`no_urut`, `nim`, `nama`, `jurusan`, `angkatan`, `email`, `file`) VALUES
(6, 'A1316071', 'Muhammad Fani', 'Sistem Komputer', 2019, '', ''),
(8, 'A1316081', 'Nana', 'Sistem Komputer', 2020, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

CREATE TABLE `vote` (
  `tahun` int(4) NOT NULL,
  `total` int(11) NOT NULL,
  `mencoblos` int(11) NOT NULL,
  `belum_mencoblos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vote`
--

INSERT INTO `vote` (`tahun`, `total`, `mencoblos`, `belum_mencoblos`) VALUES
(2015, 188, 170, 18),
(2016, 190, 155, 35),
(2017, 187, 177, 10),
(2018, 201, 198, 3),
(2019, 9, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vote_rules`
--

CREATE TABLE `vote_rules` (
  `id` int(11) NOT NULL,
  `tahun` year(4) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vote_rules`
--

INSERT INTO `vote_rules` (`id`, `tahun`, `start_date`, `end_date`, `start_time`, `end_time`) VALUES
(5, 2020, '2020-04-02', '2020-04-02', '02:34:00', '03:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `wapresma`
--

CREATE TABLE `wapresma` (
  `no_urut` int(2) NOT NULL,
  `nim` varchar(8) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `angkatan` int(4) NOT NULL,
  `email` varchar(100) NOT NULL,
  `file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `wapresma`
--

INSERT INTO `wapresma` (`no_urut`, `nim`, `nama`, `jurusan`, `angkatan`, `email`, `file`) VALUES
(6, 'A1316072', 'Masyuri', 'Sistem Komputer', 2019, '', ''),
(8, 'A1316082', 'Oca', 'Sistem Komputer', 2020, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `admin_auth`
--
ALTER TABLE `admin_auth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dokumentasi_pemilihan`
--
ALTER TABLE `dokumentasi_pemilihan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kpum`
--
ALTER TABLE `kpum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `paslon`
--
ALTER TABLE `paslon`
  ADD PRIMARY KEY (`no_urut`);

--
-- Indexes for table `pencoblos`
--
ALTER TABLE `pencoblos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Index 1` (`nim`);

--
-- Indexes for table `pending_paslon`
--
ALTER TABLE `pending_paslon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `presma`
--
ALTER TABLE `presma`
  ADD PRIMARY KEY (`no_urut`);

--
-- Indexes for table `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`tahun`);

--
-- Indexes for table `vote_rules`
--
ALTER TABLE `vote_rules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wapresma`
--
ALTER TABLE `wapresma`
  ADD PRIMARY KEY (`no_urut`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_auth`
--
ALTER TABLE `admin_auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `dokumentasi_pemilihan`
--
ALTER TABLE `dokumentasi_pemilihan`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `kpum`
--
ALTER TABLE `kpum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `paslon`
--
ALTER TABLE `paslon`
  MODIFY `no_urut` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pencoblos`
--
ALTER TABLE `pencoblos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `pending_paslon`
--
ALTER TABLE `pending_paslon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `presma`
--
ALTER TABLE `presma`
  MODIFY `no_urut` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `vote_rules`
--
ALTER TABLE `vote_rules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `wapresma`
--
ALTER TABLE `wapresma`
  MODIFY `no_urut` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `pencoblos`
--
ALTER TABLE `pencoblos`
  ADD CONSTRAINT `FK_pencoblos_mhs` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
