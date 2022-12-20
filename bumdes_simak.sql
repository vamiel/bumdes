-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2022 at 08:27 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bumdes_simak`
--

-- --------------------------------------------------------

--
-- Table structure for table `internet_login`
--

CREATE TABLE `internet_login` (
  `idpengguna` int(11) NOT NULL,
  `nama_pengguna` varchar(100) NOT NULL,
  `alamat_pengguna` int(100) NOT NULL,
  `nik_pengguna` int(16) NOT NULL,
  `rt` varchar(5) NOT NULL,
  `rw` varchar(5) NOT NULL,
  `no_hp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pb_keluar`
--

CREATE TABLE `pb_keluar` (
  `idkeluar` int(11) NOT NULL,
  `idbarang` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `penerima` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pb_keluar`
--

INSERT INTO `pb_keluar` (`idkeluar`, `idbarang`, `tanggal`, `penerima`, `qty`) VALUES
(3, 7, '2022-11-30 21:25:11', 'Lia', 50),
(4, 8, '2022-11-30 22:33:05', 'Lia', 20),
(5, 15, '2022-12-05 10:04:25', 'Pembeli', 50),
(6, 16, '2022-12-05 11:00:46', 'Pembeli', 50),
(9, 20, '2022-12-05 11:09:30', 'Pembeli', 100),
(10, 20, '2022-12-05 11:40:54', 'Pembeli', 100);

-- --------------------------------------------------------

--
-- Table structure for table `pb_login`
--

CREATE TABLE `pb_login` (
  `iduser` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pb_login`
--

INSERT INTO `pb_login` (`iduser`, `email`, `password`) VALUES
(1, 'coba2@gmail.com', '123'),
(2, 'christo@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `pb_masuk`
--

CREATE TABLE `pb_masuk` (
  `idmasuk` int(11) NOT NULL,
  `idbarang` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `keterangan` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pb_masuk`
--

INSERT INTO `pb_masuk` (`idmasuk`, `idbarang`, `tanggal`, `keterangan`, `qty`) VALUES
(13, 9, '2022-12-05 00:36:19', 'Lia', 100),
(14, 10, '2022-12-05 00:38:56', 'Lia', 100),
(15, 11, '2022-12-05 00:39:31', 'Lia', 100),
(16, 13, '2022-12-05 09:53:30', 'Lia', 50),
(22, 18, '2022-12-05 11:02:42', 'Lia', 50),
(23, 18, '2022-12-05 11:09:14', 'Lia', 100);

-- --------------------------------------------------------

--
-- Table structure for table `pb_stock`
--

CREATE TABLE `pb_stock` (
  `idbarang` int(11) NOT NULL,
  `namabarang` varchar(50) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `stock` int(100) NOT NULL,
  `pb_image` varchar(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pb_stock`
--

INSERT INTO `pb_stock` (`idbarang`, `namabarang`, `deskripsi`, `stock`, `pb_image`) VALUES
(18, 'iPhone 13 Pro', 'Smartphone', 500, ''),
(19, 'Vivo V21', 'Smartphone', 500, ''),
(21, 'Asus ROG', 'Smartphone', 200, '');

-- --------------------------------------------------------

--
-- Table structure for table `toko_cart`
--

CREATE TABLE `toko_cart` (
  `idcart` int(11) NOT NULL,
  `orderid` varchar(100) NOT NULL,
  `userid` int(11) NOT NULL,
  `tglorder` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(10) NOT NULL DEFAULT 'Cart'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `toko_cart`
--

INSERT INTO `toko_cart` (`idcart`, `orderid`, `userid`, `tglorder`, `status`) VALUES
(10, '15wKVT0nej25Y', 2, '2020-03-16 12:10:42', 'Selesai'),
(11, '15Swf8Ye0Fm.M', 2, '2020-03-16 12:17:34', 'Cart'),
(12, '15PzF03ejd8W2', 1, '2020-05-13 02:40:48', 'Confirmed');

-- --------------------------------------------------------

--
-- Table structure for table `toko_detailorder`
--

CREATE TABLE `toko_detailorder` (
  `detailid` int(11) NOT NULL,
  `orderid` varchar(100) NOT NULL,
  `idproduk` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `toko_detailorder`
--

INSERT INTO `toko_detailorder` (`detailid`, `orderid`, `idproduk`, `qty`) VALUES
(13, '15wKVT0nej25Y', 1, 100),
(14, '15PzF03ejd8W2', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `toko_kategori`
--

CREATE TABLE `toko_kategori` (
  `idkategori` int(11) NOT NULL,
  `namakategori` varchar(20) NOT NULL,
  `tgldibuat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `toko_kategori`
--

INSERT INTO `toko_kategori` (`idkategori`, `namakategori`, `tgldibuat`) VALUES
(1, 'Bunga Tangkai', '2019-12-20 07:28:34'),
(2, 'Bunga Papan', '2019-12-20 07:34:17'),
(3, 'Bunga Hidup', '2020-03-16 12:15:40');

-- --------------------------------------------------------

--
-- Table structure for table `toko_konfirmasi`
--

CREATE TABLE `toko_konfirmasi` (
  `idkonfirmasi` int(11) NOT NULL,
  `orderid` varchar(100) NOT NULL,
  `userid` int(11) NOT NULL,
  `payment` varchar(10) NOT NULL,
  `namarekening` varchar(25) NOT NULL,
  `tglbayar` date NOT NULL,
  `tglsubmit` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `toko_konfirmasi`
--

INSERT INTO `toko_konfirmasi` (`idkonfirmasi`, `orderid`, `userid`, `payment`, `namarekening`, `tglbayar`, `tglsubmit`) VALUES
(1, '15PzF03ejd8W2', 1, 'Bank BCA', 'Admin', '2020-05-16', '2020-05-13 02:41:51');

-- --------------------------------------------------------

--
-- Table structure for table `toko_login`
--

CREATE TABLE `toko_login` (
  `userid` int(11) NOT NULL,
  `namalengkap` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `notelp` varchar(15) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tgljoin` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` varchar(7) NOT NULL DEFAULT 'Member',
  `lastlogin` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `toko_login`
--

INSERT INTO `toko_login` (`userid`, `namalengkap`, `email`, `password`, `notelp`, `alamat`, `tgljoin`, `role`, `lastlogin`) VALUES
(1, 'Admin', 'admin', '$2y$10$GJVGd4ji3QE8ikTBzNyA0uLQhiGd6MirZeSJV1O6nUpjSVp1eaKzS', '01234567890', 'Indonesia', '2020-03-16 11:31:17', 'Admin', NULL),
(2, 'Guest', 'guest', '$2y$10$xXEMgj5pMT9EE0QAx3QW8uEn155Je.FHH5SuIATxVheOt0Z4rhK6K', '01234567890', 'Indonesia', '2020-03-16 11:30:40', 'Member', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `toko_pembayaran`
--

CREATE TABLE `toko_pembayaran` (
  `no` int(11) NOT NULL,
  `metode` varchar(25) NOT NULL,
  `norek` varchar(25) NOT NULL,
  `logo` text DEFAULT NULL,
  `an` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `toko_pembayaran`
--

INSERT INTO `toko_pembayaran` (`no`, `metode`, `norek`, `logo`, `an`) VALUES
(1, 'Bank BCA', '13131231231', 'images/bca.jpg', 'Tokopekita'),
(2, 'Bank Mandiri', '943248844843', 'images/mandiri.jpg', 'Tokopekita'),
(3, 'DANA', '0882313132123', 'images/dana.png', 'Tokopekita');

-- --------------------------------------------------------

--
-- Table structure for table `toko_produk`
--

CREATE TABLE `toko_produk` (
  `idproduk` int(11) NOT NULL,
  `idkategori` int(11) NOT NULL,
  `namaproduk` varchar(30) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `rate` int(11) NOT NULL,
  `hargabefore` int(11) NOT NULL,
  `hargaafter` int(11) NOT NULL,
  `tgldibuat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `toko_produk`
--

INSERT INTO `toko_produk` (`idproduk`, `idkategori`, `namaproduk`, `gambar`, `deskripsi`, `rate`, `hargabefore`, `hargaafter`, `tgldibuat`) VALUES
(1, 1, 'Mawar Merah', 'produk/7443a12318c5f4f29059d243fd14f447.png', 'Setangkai mawar merah', 5, 23000, 19000, '2019-12-20 09:10:26'),
(2, 1, 'Mawar Putih', 'produk/15kwuDMbYtraw.png', 'Setangkai mawar putih', 4, 24000, 19500, '2019-12-20 09:24:13'),
(3, 3, 'Bunga Hidup', 'produk/15Ak7lFMfvuJc.jpg', 'Bunga Hidup', 5, 25000, 15000, '2020-03-16 12:16:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `internet_login`
--
ALTER TABLE `internet_login`
  ADD PRIMARY KEY (`idpengguna`);

--
-- Indexes for table `pb_keluar`
--
ALTER TABLE `pb_keluar`
  ADD PRIMARY KEY (`idkeluar`);

--
-- Indexes for table `pb_login`
--
ALTER TABLE `pb_login`
  ADD PRIMARY KEY (`iduser`);

--
-- Indexes for table `pb_masuk`
--
ALTER TABLE `pb_masuk`
  ADD PRIMARY KEY (`idmasuk`);

--
-- Indexes for table `pb_stock`
--
ALTER TABLE `pb_stock`
  ADD PRIMARY KEY (`idbarang`);

--
-- Indexes for table `toko_cart`
--
ALTER TABLE `toko_cart`
  ADD PRIMARY KEY (`idcart`),
  ADD UNIQUE KEY `orderid` (`orderid`),
  ADD KEY `orderid_2` (`orderid`);

--
-- Indexes for table `toko_detailorder`
--
ALTER TABLE `toko_detailorder`
  ADD PRIMARY KEY (`detailid`),
  ADD KEY `orderid` (`orderid`),
  ADD KEY `idproduk` (`idproduk`);

--
-- Indexes for table `toko_kategori`
--
ALTER TABLE `toko_kategori`
  ADD PRIMARY KEY (`idkategori`);

--
-- Indexes for table `toko_konfirmasi`
--
ALTER TABLE `toko_konfirmasi`
  ADD PRIMARY KEY (`idkonfirmasi`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `toko_login`
--
ALTER TABLE `toko_login`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `toko_pembayaran`
--
ALTER TABLE `toko_pembayaran`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `toko_produk`
--
ALTER TABLE `toko_produk`
  ADD PRIMARY KEY (`idproduk`),
  ADD KEY `idkategori` (`idkategori`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `internet_login`
--
ALTER TABLE `internet_login`
  MODIFY `idpengguna` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pb_keluar`
--
ALTER TABLE `pb_keluar`
  MODIFY `idkeluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pb_login`
--
ALTER TABLE `pb_login`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pb_masuk`
--
ALTER TABLE `pb_masuk`
  MODIFY `idmasuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `pb_stock`
--
ALTER TABLE `pb_stock`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `toko_cart`
--
ALTER TABLE `toko_cart`
  MODIFY `idcart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `toko_detailorder`
--
ALTER TABLE `toko_detailorder`
  MODIFY `detailid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `toko_kategori`
--
ALTER TABLE `toko_kategori`
  MODIFY `idkategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `toko_konfirmasi`
--
ALTER TABLE `toko_konfirmasi`
  MODIFY `idkonfirmasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `toko_login`
--
ALTER TABLE `toko_login`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `toko_pembayaran`
--
ALTER TABLE `toko_pembayaran`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `toko_produk`
--
ALTER TABLE `toko_produk`
  MODIFY `idproduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `toko_detailorder`
--
ALTER TABLE `toko_detailorder`
  ADD CONSTRAINT `idproduk` FOREIGN KEY (`idproduk`) REFERENCES `toko_produk` (`idproduk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderid` FOREIGN KEY (`orderid`) REFERENCES `toko_cart` (`orderid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `toko_konfirmasi`
--
ALTER TABLE `toko_konfirmasi`
  ADD CONSTRAINT `userid` FOREIGN KEY (`userid`) REFERENCES `toko_login` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `toko_produk`
--
ALTER TABLE `toko_produk`
  ADD CONSTRAINT `idkategori` FOREIGN KEY (`idkategori`) REFERENCES `toko_kategori` (`idkategori`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
