-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 09, 2020 at 08:43 AM
-- Server version: 5.7.29-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_anggota`
--

CREATE TABLE `tbl_anggota` (
  `id_anggota` int(11) NOT NULL,
  `nim` varchar(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(8) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `prodi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_anggota`
--

INSERT INTO `tbl_anggota` (`id_anggota`, `nim`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `prodi`) VALUES
(1, '2312', 'firman', 'laki', 'mojokerto', '2020-02-03', 'Rekayasa'),
(7, '219', 'ks', 'ksl', 'ss', '2020-03-13', 'sans'),
(8, '222', 'dsak', 'adkl', 'sa', '2020-03-28', 'sa'),
(9, '2313', 'asdk', 'Laki', 'mojokerto', '2020-03-20', 'RPL');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_buku`
--

CREATE TABLE `tbl_buku` (
  `id_buku` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `sinopsis` text NOT NULL,
  `cover` text NOT NULL,
  `pengarang` varchar(50) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `tahun` varchar(50) NOT NULL,
  `isbn` varchar(10) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_buku`
--

INSERT INTO `tbl_buku` (`id_buku`, `judul`, `sinopsis`, `cover`, `pengarang`, `penerbit`, `tahun`, `isbn`, `lokasi`, `jumlah`) VALUES
(1, 'halow', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', 'logo 1.jpg', 'Ando', 'saya', '2012', '2222', 'Pacet', 7),
(2, 'sda', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', 'ship_night_sea_120663_1366x768.jpg', 'da', 'dsa', '2131', '213', 'asd', 5),
(3, 'madilog', '<p>sawdq</p>\r\n', 'logo 2.jpg', 'oi', 'oi', '222', '2313', 'Las', 5),
(4, 'zulvan', '<p>sadwqd</p>\r\n', 'Screenshot_20190717_111639.png', 'sa', 'sa', '2123', '2133', '', 3),
(5, 'halo', '<p>lorem msdammdsam dsmads mdsa</p>\r\n', 'firmanunix.png', 'saya', 'dsa', '2000', '2222', 'das', 23),
(6, 'madilog', '<p>ajkdsakjdskjajklds ajlk djksajk dsajk dlkajd klsaj dklsa</p>\r\n', 'firmanunix.png', 'dsa', 'dsa', '231', '231', 'dsadsa', 3),
(7, 'halo', '<p>sdasdsad sad sa d add</p>\r\n', 'google-scholar.png', 'was', 'dsa', '2000', '103', 'sdla', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_peminjaman`
--

CREATE TABLE `tbl_peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `id_buku` varchar(10) NOT NULL,
  `tgl_peminjaman` date NOT NULL,
  `tgl_pengembalian` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status` varchar(30) NOT NULL,
  `id_user` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_peminjaman`
--

INSERT INTO `tbl_peminjaman` (`id_peminjaman`, `id_buku`, `tgl_peminjaman`, `tgl_pengembalian`, `jumlah`, `status`, `id_user`) VALUES
(3, '1', '2020-02-27', '2020-03-01', 2, 'kembali', '2'),
(4, '1', '2020-02-29', '2020-03-03', 1, 'kembali', '3'),
(5, '1', '2020-02-29', '2020-03-03', 1, 'belum kembali', '2'),
(6, '1', '2020-03-06', '2020-03-09', 1, 'kembali', '7'),
(7, '1', '2020-03-07', '2020-03-10', 1, 'belum kembali', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengembalian`
--

CREATE TABLE `tbl_pengembalian` (
  `id_pengembalian` int(11) NOT NULL,
  `id_peminjaman` varchar(10) NOT NULL,
  `tgl_kembali` date NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengembalian`
--

INSERT INTO `tbl_pengembalian` (`id_pengembalian`, `id_peminjaman`, `tgl_kembali`, `jumlah`) VALUES
(1, '1', '2020-03-01', 1),
(2, '2', '2020-03-01', 0),
(3, '3', '2020-03-01', 2),
(4, '4', '2020-03-08', 1),
(5, '6', '2020-03-07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` tinyint(4) NOT NULL,
  `id_anggota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `level`, `id_anggota`) VALUES
(1, '222', '222', 0, 2),
(2, '2133', '$2y$10$WWEZZ6jMLyAVERIx.aD6YuCbqsgdMyoDVHkfcMmVMYvKvq.E.vtnG', 1, 3),
(8, '219', '$2y$10$Nwk99bHiKm3He3zC7CZqR.TqYa17Uu510AOz2fXGo7xSTHrxj.HiW', 0, 7),
(9, '222', '$2y$10$aQ7nwzPv3PIxIZt.eMFO1uEp4pDU6sPAliPlXkrQcVjU3jrWYNlsq', 0, 8),
(10, '2313', '$2y$10$sOKI6ySmved2oDDgqNy.AeO2wQhFY6QiAhzQkCP1RRI8ZBe7EtgPW', 0, 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_anggota`
--
ALTER TABLE `tbl_anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `tbl_buku`
--
ALTER TABLE `tbl_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `tbl_peminjaman`
--
ALTER TABLE `tbl_peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- Indexes for table `tbl_pengembalian`
--
ALTER TABLE `tbl_pengembalian`
  ADD PRIMARY KEY (`id_pengembalian`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_anggota` (`id_anggota`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_anggota`
--
ALTER TABLE `tbl_anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_buku`
--
ALTER TABLE `tbl_buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_peminjaman`
--
ALTER TABLE `tbl_peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_pengembalian`
--
ALTER TABLE `tbl_pengembalian`
  MODIFY `id_pengembalian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
