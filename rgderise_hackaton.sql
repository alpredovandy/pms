-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 07, 2020 at 04:21 AM
-- Server version: 5.6.45
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rgderise_hackaton`
--

-- --------------------------------------------------------

--
-- Table structure for table `button`
--

CREATE TABLE `button` (
  `id_button` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `data` varchar(255) NOT NULL,
  `counter` int(11) NOT NULL,
  `action` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `button`
--

INSERT INTO `button` (`id_button`, `id`, `data`, `counter`, `action`) VALUES
(6, 21, 'Sat Aug 24 21:46:16 2019\n', 2, 0),
(7, 21, 'Sun Aug 25 04:18:16 2019\n', 0, 0),
(8, 21, 'Sun Aug 25 04:25:38 2019\n', 1, 0),
(9, 21, 'Sun Aug 25 04:38:54 2019\n', 0, 0),
(10, 21, 'Sun Aug 25 04:44:10 2019\n', 0, 0),
(11, 21, 'Sun Aug 25 04:46:02 2019\n', 0, 0),
(12, 21, 'Sun Aug 25 04:46:49 2019\n', 0, 0),
(13, 21, 'Sun Aug 25 04:48:09 2019\n', 0, 0),
(14, 21, 'Sun Aug 25 04:50:01 2019\n', 0, 0),
(15, 21, 'Sun Aug 25 04:51:08 2019\n', 0, 0),
(16, 21, 'Sun Aug 25 04:53:51 2019\n', 0, 0),
(17, 21, 'Sun Aug 25 04:55:30 2019\n', 0, 0),
(18, 21, 'Sun Aug 25 04:57:11 2019\n', 0, 0),
(19, 21, 'Sun Aug 25 04:58:31 2019\n', 0, 0),
(20, 21, 'Sun Aug 25 05:02:24 2019\n', 0, 0),
(21, 21, 'Sun Aug 25 05:06:21 2019\n', 0, 0),
(22, 21, '2::', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `checkup`
--

CREATE TABLE `checkup` (
  `id_checkup` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `keluhan` text NOT NULL,
  `hasil_tensi` int(11) NOT NULL,
  `suhu` int(11) NOT NULL,
  `hasil_analisa` text NOT NULL,
  `sistol` int(11) NOT NULL,
  `distol` int(11) NOT NULL,
  `denyut_jantung` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checkup`
--

INSERT INTO `checkup` (`id_checkup`, `id_pasien`, `keluhan`, `hasil_tensi`, `suhu`, `hasil_analisa`, `sistol`, `distol`, `denyut_jantung`, `status`) VALUES
(1, 1, 'asd', 2, 2, 'asd', 32, 34, 12, 'Ok');

-- --------------------------------------------------------

--
-- Table structure for table `history_pasien`
--

CREATE TABLE `history_pasien` (
  `id_history` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `id_ruangan` int(11) NOT NULL,
  `jumlah_infus` int(11) NOT NULL,
  `ekg` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history_pasien`
--

INSERT INTO `history_pasien` (`id_history`, `id_pasien`, `id_dokter`, `id_ruangan`, `jumlah_infus`, `ekg`) VALUES
(1, 15, 1, 1, 11, 31);

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id_ruangan` int(11) NOT NULL,
  `nama_ruangan` varchar(255) NOT NULL,
  `nomor_ruangan` varchar(255) NOT NULL,
  `kapasitas` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id_ruangan`, `nama_ruangan`, `nomor_ruangan`, `kapasitas`) VALUES
(1, 'Flamboyan', '320', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `jk` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `nama_keluarga` varchar(255) DEFAULT NULL,
  `alamat_keluarga` varchar(255) DEFAULT NULL,
  `email_keluarga` varchar(255) DEFAULT NULL,
  `no_hp_keluarga` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL,
  `ruangan` varchar(255) DEFAULT NULL,
  `dokter` varchar(255) DEFAULT NULL,
  `alat` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `no_hp`, `email`, `jk`, `username`, `password`, `foto`, `nama_keluarga`, `alamat_keluarga`, `email_keluarga`, `no_hp_keluarga`, `role`, `ruangan`, `dokter`, `alat`) VALUES
(1, 'dr. Terawan Agus Putranto, Sp.Rad', '081234567890', 'agus@sagraha.com', 'on', 'agus', 'agus', '', NULL, NULL, NULL, NULL, 'dokter', NULL, NULL, 0),
(2, 'perawat A', '082382518263', 'perawat_a@hms.com', 'on', 'perawat', 'perawat', '', NULL, NULL, NULL, NULL, 'perawat', NULL, NULL, 0),
(9, 'dr. Muhammad Mahrus Zain', '081275575929', 'mahrus@sagraha.com', 'on', 'mahrus@pcr.ac.id', 'mahrus', '', NULL, NULL, NULL, NULL, 'dokter', NULL, NULL, 0),
(15, 'Budi', '082382518263', 'budi@sagraha.com', 'on', 'budi', 'budi', '', 'Muhammad Mahrus Zain', NULL, 'mahrus@pcr.ac.id', '081275575929', 'pasien', 'Flamboyan', 'Dokter AB', 1),
(16, 'dr. ahmad', '081234567890', 'ahmad@dokter.com', 'on', 'ahmad', 'AHMAD', '1.jpg', NULL, NULL, NULL, NULL, 'dokter', NULL, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `button`
--
ALTER TABLE `button`
  ADD PRIMARY KEY (`id_button`);

--
-- Indexes for table `checkup`
--
ALTER TABLE `checkup`
  ADD PRIMARY KEY (`id_checkup`);

--
-- Indexes for table `history_pasien`
--
ALTER TABLE `history_pasien`
  ADD PRIMARY KEY (`id_history`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `button`
--
ALTER TABLE `button`
  MODIFY `id_button` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `checkup`
--
ALTER TABLE `checkup`
  MODIFY `id_checkup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `history_pasien`
--
ALTER TABLE `history_pasien`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id_ruangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
