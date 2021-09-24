-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2021 at 02:09 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_toko1`
--

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE `gambar` (
  `id_gambar` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(14, 'Makanan'),
(15, 'Minuman'),
(16, 'Paket');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id_order_detail` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `produk` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `total_pembayaran` int(111) NOT NULL,
  `catatan` text NOT NULL,
  `bank` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id_order_detail`, `id_order`, `produk`, `qty`, `harga`, `total_pembayaran`, `catatan`, `bank`, `status`) VALUES
(69, 53, 'es jeruk', 2, '5000', 10000, '', '', 'dimasak'),
(70, 53, 'nasi goreng', 1, '12000', 12000, '', '', 'dimasak'),
(71, 54, 'Rendang', 1, '25000', 25000, 'pedes', '', 'pending'),
(72, 54, 'tahu goreng', 1, '10000', 10000, 'pedes', '', 'pending'),
(73, 56, 'nasi goreng', 1, '12000', 12000, '', '', 'pending'),
(74, 57, 'nasi goreng', 1, '12000', 12000, '', '', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `meja` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_lengkap`, `meja`) VALUES
(8, 'syamsul bahari', ''),
(9, 'grace', ''),
(10, 'matubaman', ''),
(11, 'matubaman', ''),
(12, 'wkwkwkw', ''),
(13, 'wkwkwkw', ''),
(14, 'samsul', '20'),
(15, 'samsul', '20'),
(16, 'samsul', '20'),
(17, 'asasd', '23'),
(18, 'asasd', '23'),
(19, '232323', 's3343'),
(20, '232323', 's3343'),
(21, 'as', '23'),
(22, 'samsul', '232'),
(23, 'samsul', '230'),
(24, 'sa', '23'),
(25, 'sam', '13'),
(26, 'samsul', '23'),
(27, 'asd', '2'),
(28, 'raka', '1'),
(29, 'raka1', '2'),
(30, 'raka2', '3'),
(31, 'raka3', '4'),
(32, 'raka 5', '9'),
(33, 'rakaJ', '10'),
(34, 'raka1', '10'),
(35, 'G N Aditya Subawa', '1'),
(36, 'Aditya Subawa', '1'),
(37, 'Aditya Subawa', '1'),
(38, 'Dari hp', '1'),
(39, 'Dari iphone', '0'),
(40, 'Raka', '10'),
(41, 'Ical', '9'),
(42, 'raka h', '10'),
(43, 'rakaa', '17'),
(44, 'raka test', '14'),
(45, 'test 2', '16'),
(46, 'raka', '17'),
(47, 'raka1', '2'),
(48, 'test12', '12'),
(49, 'raka j', '15'),
(50, 'raka j', '15'),
(51, 'raka jh', '23'),
(52, 'athifah', '11'),
(53, 'athifah n', '18'),
(54, 'julianza', '14'),
(55, 'julianza', '14'),
(56, 'a', '9'),
(57, 's', '22');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `atm` varchar(255) NOT NULL,
  `nama_atm` varchar(255) NOT NULL,
  `no_rekening` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `atm`, `nama_atm`, `no_rekening`) VALUES
(1, 'bca', 'syamsul bahari', '25117843'),
(2, 'BNI', 'sam', '9898988');

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan`
--

CREATE TABLE `pengaturan` (
  `id_pengaturan` int(11) NOT NULL,
  `nama_toko` varchar(255) NOT NULL,
  `provinsi_toko` varchar(255) NOT NULL,
  `provinsi_id` int(11) NOT NULL,
  `kota_toko` varchar(255) NOT NULL,
  `kota_id` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `kontak` varchar(255) NOT NULL,
  `logo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengaturan`
--

INSERT INTO `pengaturan` (`id_pengaturan`, `nama_toko`, `provinsi_toko`, `provinsi_id`, `kota_toko`, `kota_id`, `alamat`, `kontak`, `logo`) VALUES
(1, 'Warung Nusantara', 'Bali', 1, 'Badung', 17, '', '085284177555555', 'warnus.JPEG');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `level` int(11) NOT NULL,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_admin`, `nama`, `username`, `password`, `level`, `last_login`) VALUES
(1, 'admin_koki', 'kokiwarnus', '672a724b8edd3d54cb5199b07a7b08460ba932d9', 1, '2021-06-11 15:46:43'),
(2, 'admin_kasir', 'kasirwarnus', '0af76771cdea501109d7e51e47c6e55848339595', 1, '2021-06-11 15:46:03'),
(3, 'admin_warnus', 'warnus1', '34d0f2a8cb5d0cdd925982df85e57023d8edc4cf', 1, '2021-06-20 04:01:33');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `diskon` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` varchar(11) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `harga`, `diskon`, `deskripsi`, `tanggal`, `jumlah`, `gambar`) VALUES
(137, 14, 'Rendang', '25000', '10%', 'catatan : pedas atau tidak pedas<br>', '2021-04-24', '100', 'rendang1.jpg'),
(138, 15, 'teh', '5000', '0%', '<p>catatan : manis atau tawar, panas atau dingin<br></p>', '2021-04-25', '100', 'esteh.png'),
(139, 14, 'tempe goreng', '10000', '0%', '<p>&lt;p&gt;catatan : manis atau tawar, panas atau dingin&lt;br&gt;&lt;/p&gt;<br></p>', '2021-05-25', '100', 'tempe.png'),
(140, 14, 'ayam goreng', '12000', '5%', '<p>ayam goreng krispi<br></p>', '2021-05-25', '100', 'ayam.png'),
(141, 14, 'nasi padang', '20000', '0%', '<p>nasi padang<br></p>', '2021-05-25', '100', 'nasi-padang.png'),
(142, 14, 'ayam pedes manis', '15000', '0%', '<p>ayam pedes manis<br></p>', '2021-05-25', '100', 'ayam-pedes-manis.png'),
(143, 15, 'es jeruk', '5000', '0%', '<p>es jeruk<br></p>', '2021-05-25', '100', 'es-jeruk.png'),
(145, 14, 'nasi goreng', '12000', '0%', '<p>nasi goreng <br></p>', '2021-05-25', '100', 'nasigoreng.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id_order` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_pelanggan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id_order`, `tanggal`, `id_pelanggan`) VALUES
(8, '2020-04-19', 8),
(9, '2020-04-19', 9),
(10, '2020-04-19', 10),
(11, '2020-04-19', 11),
(12, '2020-04-19', 12),
(13, '2020-04-19', 13),
(14, '2021-01-21', 14),
(15, '2021-01-21', 15),
(16, '2021-01-21', 16),
(17, '2021-01-21', 17),
(18, '2021-01-21', 18),
(19, '2021-01-21', 19),
(20, '2021-01-21', 20),
(21, '2021-01-21', 21),
(22, '2021-01-22', 22),
(23, '2021-01-22', 23),
(24, '2021-01-22', 24),
(25, '2021-01-22', 25),
(26, '2021-01-22', 26),
(27, '2021-03-24', 27),
(28, '2021-04-22', 28),
(29, '2021-04-23', 29),
(30, '2021-04-24', 30),
(31, '2021-04-24', 31),
(32, '2021-04-24', 32),
(33, '2021-04-24', 33),
(34, '2021-05-02', 34),
(35, '2021-05-24', 35),
(36, '2021-05-25', 36),
(37, '2021-05-25', 37),
(38, '2021-05-25', 38),
(39, '2021-05-25', 39),
(40, '2021-05-25', 40),
(41, '2021-05-26', 41),
(42, '2021-05-26', 42),
(43, '2021-05-26', 43),
(44, '2021-05-26', 44),
(45, '2021-05-26', 45),
(46, '2021-05-28', 46),
(47, '2021-05-28', 47),
(48, '2021-06-10', 48),
(49, '2021-06-12', 49),
(50, '2021-06-12', 50),
(51, '2021-06-12', 51),
(52, '2021-06-12', 52),
(53, '2021-06-12', 53),
(54, '2021-06-13', 54),
(55, '2021-06-13', 55),
(56, '2021-06-13', 56),
(57, '2021-06-13', 57);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id_order_detail`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD PRIMARY KEY (`id_pengaturan`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id_order`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id_order_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
