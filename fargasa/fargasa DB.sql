-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Jul 2021 pada 09.39
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fargasa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `book`
--

CREATE TABLE `book` (
  `id_booking` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `booking_mulai` timestamp NOT NULL DEFAULT current_timestamp(),
  `booking_stop` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Trigger `book`
--
DELIMITER $$
CREATE TRIGGER `tr_booking_stop` BEFORE INSERT ON `book` FOR EACH ROW BEGIN
  SET NEW.booking_stop = NOW() + INTERVAL 24 HOUR;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `log`
--

CREATE TABLE `log` (
  `id_log` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tipe_log` text NOT NULL,
  `nopol` text NOT NULL,
  `tipe` text NOT NULL,
  `tahun` int(11) NOT NULL,
  `author` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `nopol` text NOT NULL,
  `tipe` text NOT NULL,
  `warna` text NOT NULL,
  `tahun` int(11) NOT NULL,
  `jarak_tempuh` int(11) DEFAULT NULL,
  `jenis_bbm` text DEFAULT NULL,
  `mediator` text DEFAULT NULL,
  `tgl_beli` date NOT NULL,
  `hrg_beli` int(11) NOT NULL,
  `hrg_jual` int(11) NOT NULL,
  `fee_mediator` int(11) DEFAULT NULL,
  `pajak` int(11) DEFAULT NULL,
  `rekondisi` int(11) DEFAULT NULL,
  `status` text DEFAULT 'siap',
  `author` text NOT NULL,
  `gambar` text DEFAULT NULL,
  `id_pelanggan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `nopol`, `tipe`, `warna`, `tahun`, `jarak_tempuh`, `jenis_bbm`, `mediator`, `tgl_beli`, `hrg_beli`, `hrg_jual`, `fee_mediator`, `pajak`, `rekondisi`, `status`, `author`, `gambar`, `id_pelanggan`) VALUES
(131047, 'A 1604 AC', 'TERIOS TX M/T', 'Silver', 2013, 0, '', '', '2021-02-08', 115000000, 130000000, 2000000, 2630000, 1250000, 'terjual', 'DEMO', 'default.png', NULL),
(2587260, 'A 1440 FI', 'YARIS 1.5 E A/T', 'PUTIH', 2013, 0, '', '', '2021-05-10', 100000000, 118000000, 0, 6384000, 1990000, 'terjual', 'Administrator', 'default.png', NULL),
(4093445, 'A 1125 TW', 'RUSH 1.5 S A/T', 'PUTIH', 2012, 0, '', '', '2021-05-01', 112000000, 125000000, 0, 3050000, 0, 'terjual', 'Administrator', 'default.png', NULL),
(5575072, 'A 1122 YA', 'YARIS 1.5 S M/T', 'ORANYE', 2014, 0, '', '', '2021-06-07', 123000000, 143000000, 2000000, 0, 0, 'terjual', 'Administrator', 'default.png', NULL),
(5910865, 'A 1529 BB', 'AYLA R A/T', 'Abu-abu', 2017, 0, '', '', '2021-02-06', 90000000, 107000000, 0, 0, 500000, 'terjual', 'DEMO', 'default.png', NULL),
(8703445, 'A 1422 FK', 'MOBILIO RS A/T', 'Silver', 2014, 0, '', '', '2021-02-03', 124000000, 140000000, 2000000, 0, 500000, 'terjual', 'DEMO', 'default.png', NULL),
(9299783, 'A 1687 FN', 'AVANZA G M/T', 'Putih', 2015, 0, '', '', '2021-02-07', 120000000, 133000000, 0, 0, 500000, 'terjual', 'DEMO', 'default.png', NULL),
(9316165, 'A 1876 TQ', 'RUSH TRD M/T', 'Hitam', 2014, 0, '', '', '2021-02-09', 130000000, 140000000, 0, 0, 0, 'terjual', 'DEMO', 'default.png', NULL),
(11263312, 'A 1354 R', 'AYLA X M/T', 'Abu-abu', 2016, 0, '', '', '2021-02-05', 70000000, 85000000, 2000000, 0, 500000, 'terjual', 'DEMO', 'default.png', NULL),
(13312527, 'A 1450 FX', 'BRIO E A/T', 'MERAH', 2018, 0, '', '', '2021-05-05', 123000000, 125000000, 0, 0, 0, 'terjual', 'Administrator', 'default.png', NULL),
(13737280, 'A 1678 TY', 'TERIOS TX A/T', 'SILVER METALIK', 2012, 0, '', '', '2021-05-06', 99000000, 118000000, 2000000, 0, 2300000, 'terjual', 'Administrator', 'default.png', NULL),
(19799118, 'A 1897 TH', 'RUSH S M/T', 'PUTIH', 2016, 0, '', '', '2021-06-27', 150000000, 0, 0, 0, 0, 'terjual', 'Administrator', 'default.png', NULL),
(21834759, 'A 1263 TM', 'KIJANG INNOVA G A/T', 'PUTIH', 2012, 0, '', '', '2021-05-22', 185000000, 190000000, 0, 0, 0, 'terjual', 'Administrator', 'default.png', NULL),
(26886883, 'F 1240 EQ', 'VIOS E M/T', 'SILVER METALIK', 2005, 0, '', '', '2021-06-20', 35000000, 0, 0, 0, 0, 'terjual', 'Administrator', 'default.png', NULL),
(31575117, 'A 1831 AY', 'CALYA G A/T', 'PUTIH', 2017, 0, '', '', '2021-04-04', 90000000, 105000000, 1000000, 0, 0, 'terjual', 'Administrator', 'default.png', NULL),
(32059917, 'A 1490 FR', 'BRIO E A/T', 'PUTIH', 2016, 0, '', '', '2021-06-05', 105000000, 120000000, 0, 0, 450000, 'terjual', 'Administrator', 'default.png', NULL),
(33020245, 'A 1378 TU', 'AVANZA G A/T', 'HITAM METALIK', 2013, 0, '', '', '2021-06-15', 103000000, 0, 0, 0, 0, 'terjual', 'Administrator', 'default.png', NULL),
(35107871, 'A 1626 AK', 'AVANZA G A/T', 'SILVER', 2018, 0, '', '', '2021-06-30', 102000000, 0, 2000000, 0, 0, 'siap', 'Administrator', 'default.png', NULL),
(36459715, 'A 1306 RC', 'CALYA G A/T', 'ABU-ABU METALIK', 2018, 0, '', '', '2021-06-16', 100000000, 0, 2000000, 0, 0, 'siap', 'Administrator', 'default.png', NULL),
(36885768, 'A 1384 KS', 'CRV 1.5 TURBO PRESTIGE A/T', 'ABU-ABU', 2017, 0, '', '', '2021-03-16', 372000000, 405000000, 3000000, 0, 650000, 'terjual', 'DEMO', 'default.png', NULL),
(38914496, 'A 1422 FW', 'Pajero Dakkar 4x2 A/T', 'HITAM', 2018, 0, '', '', '2021-03-01', 425000000, 455000000, 0, 0, 0, 'terjual', 'DEMO', 'default.png', NULL),
(40823947, 'A 1896 KG', 'YARIS E M/T', 'SILVER', 2010, 0, '', '', '2021-05-24', 83000000, 98000000, 0, 0, 2000000, 'terjual', 'Administrator', 'default.png', NULL),
(41175281, 'A 1440 UI', 'YARIS TRD M/T', 'SILVER', 2012, 0, '', '', '2021-03-02', 103000000, 122000000, 2000000, 3200000, 500000, 'terjual', 'DEMO', 'default.png', NULL),
(45027060, 'A 1593 VW', 'ERTIGA GL A/T', 'PUTIH METALIK', 2015, 0, '', '', '2021-06-19', 105000000, 0, 2000000, 0, 2800000, 'siap', 'Administrator', 'default.png', NULL),
(45074186, 'A 1323 FR', 'BRIO E A/T', 'Merah', 2016, 0, '', '', '2021-02-01', 105000000, 120000000, 2000000, 0, 0, 'terjual', 'DEMO', 'default.png', NULL),
(47745133, 'A 1 HU', 'PAJERO DAKKAR A/T', 'HITAM MIKA', 2016, 0, '', '', '2021-06-15', 370000000, 0, 4000000, 0, 600000, 'siap', 'Administrator', 'default.png', NULL),
(48031542, 'A 1596 FW', 'BRIO E M/T', 'ABU - ABU METALIK', 2018, 0, '', '', '2021-05-14', 103500000, 118000000, 0, 0, 450000, 'terjual', 'Administrator', 'default.png', NULL),
(48850252, 'A 1832 RD', 'BRIO E A/T', 'Merah', 2018, 0, '', '', '2021-02-02', 118000000, 132000000, 2000000, 2845000, 500000, 'terjual', 'DEMO', 'default.png', NULL),
(51150841, 'A 1084 EB', 'CALYA G M/T', 'ABU - ABU', 2019, 0, '', '', '2021-05-28', 109000000, 118000000, 2000000, 0, 0, 'terjual', 'Administrator', 'default.png', NULL),
(63193251, 'A 1201 FW', 'SIGRA R A/T', 'PUTIH', 2018, 0, '', 'PURA', '2021-03-03', 85000000, 105000000, 2000000, 2000000, 2000000, 'terjual', 'DEMO', 'default.png', NULL),
(63980145, 'A 1368 AP', 'AVANZA G A/T', 'PUTIH', 2014, 0, '', '', '2021-06-27', 110000000, 0, 0, 0, 1200000, 'siap', 'Administrator', 'default.png', NULL),
(64231799, 'A 1265 YO', 'MOBILIO E A/T', 'ABU-ABU METALIK', 2015, 0, '', '', '2021-06-14', 115000000, 0, 0, 3275000, 0, 'terjual', 'Administrator', 'default.png', NULL),
(70393020, 'A 1063 BM', 'Veloz 1.5 M/T', 'Hitam', 2013, 0, '', '', '2020-12-10', 104500000, 115000000, 2000000, 0, 4000000, 'terjual', 'DEMO', 'default.png', NULL),
(70598991, 'A 1543 FJ', 'ERTIGA GX M/T', 'PUTIH', 2014, 0, '', '', '2021-05-25', 108000000, 122000000, 0, 0, 600000, 'terjual', 'Administrator', 'default.png', NULL),
(73233672, 'A 1856 BP', 'SIGRA R M/T', 'PUTIH', 2020, 0, '', '', '2021-04-04', 105000000, 115000000, 0, 2, 0, 'terjual', 'Administrator', 'default.png', NULL),
(80793544, 'A 1302 TX', 'MOBILIO RS A/T', 'SILVER', 2015, 0, '', '', '2021-03-04', 143000000, 146000000, 0, 0, 0, 'terjual', 'DEMO', 'default.png', NULL),
(81394933, 'A 8065 T', 'Hilux G MT', 'Hitam', 2018, 0, '', '', '2020-12-01', 170000000, 179000000, 0, 0, 0, 'siap', 'DEMO', 'default.png', NULL),
(83114401, 'A 1527 EM', 'YARIS S M/T ', 'PUTIH', 2013, 0, '', '', '2021-06-18', 105000000, 0, 0, 0, 0, 'siap', 'Administrator', 'default.png', NULL),
(85050411, 'A 1737 TH', 'YARIS 1.5 G A/T', 'HITAM', 2015, 0, '', '', '2021-05-01', 120000000, 130000000, 0, 0, 0, 'terjual', 'Administrator', 'default.png', NULL),
(85918529, 'A 1225 VQ', 'AGYA S TRD A/T', 'Putih', 2015, 0, '', '', '2021-02-04', 78000000, 95000000, 0, 8000000, 500000, 'terjual', 'DEMO', 'default.png', NULL),
(86254964, 'B 1517 BEQ', 'VIOS E A/T', 'SILVER', 2013, 0, '', '', '2021-06-07', 103000000, 120000000, 0, 0, 0, 'siap', 'Administrator', 'default.png', NULL),
(86481478, 'A 1278 TJ', 'BRIO E M/T', 'MERAH', 2015, 0, '', '', '2021-06-29', 92000000, 0, 0, 0, 0, 'siap', 'Administrator', 'default.png', NULL),
(87362359, 'A 1254 PK', 'YARIS S A/T', 'HITAM', 2012, 0, '', '', '2021-06-07', 103000000, 118000000, 2000000, 0, 2300000, 'siap', 'Administrator', 'default.png', NULL),
(87880950, 'A 1872 PM', 'AGYA 1.2 G M/T', 'HITAM', 2018, 0, '', '', '2021-05-21', 94500000, 110000000, 0, 0, 450000, 'terjual', 'Administrator', 'default.png', NULL),
(88183645, 'A 1107 T', 'MOBILIO RS A/T', 'PUTIH', 2017, 0, '', '', '2021-06-05', 150000000, 173000000, 2000000, 0, 500000, 'terjual', 'Administrator', 'default.png', NULL),
(89331172, 'B 1382 FAA', 'CAMRY Q A/T', 'Hitam', 2010, 0, '', '', '2021-02-10', 140000000, 145000000, 0, 0, 0, 'terjual', 'DEMO', 'default.png', NULL),
(91369420, 'A 1498 TR', 'Agya G A/T', 'SILVER', 2014, 0, '', '', '2021-03-01', 73000000, 82500000, 1000000, 0, 500000, 'terjual', 'DEMO', 'default.png', NULL),
(91893766, 'A 1766 AY', 'JAZZ RS A/T', 'SILVER', 2011, 0, '', '', '2021-05-26', 110000000, 125000000, 1500000, 0, 0, 'terjual', 'Administrator', 'default.png', NULL),
(94296012, 'A 1770 TM', 'AVANZA G A/T', 'PUTIH', 2013, 0, '', '', '2021-05-27', 103000000, 118000000, 2000000, 0, 1350000, 'terjual', 'Administrator', 'default.png', NULL),
(95698359, 'A 1511 BF', 'BRIO RS M/T', 'PUTIH', 2018, 0, '', '', '2021-06-17', 125000000, 140000000, 2000000, 0, 500000, 'siap', 'Administrator', 'default.png', NULL),
(99927894, 'A 1831 EB', 'BRIO S M/T', 'PUTIH', 2019, 0, '', '', '2021-07-20', 125000000, 137000000, 0, 0, 0, 'siap', 'Administrator', 'default.png', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penawaran`
--

CREATE TABLE `penawaran` (
  `id_penawaran` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `tipe` text NOT NULL,
  `warna` text NOT NULL,
  `tahun` int(11) NOT NULL,
  `jarak_tempuh` int(11) DEFAULT NULL,
  `jenis_bbm` text DEFAULT NULL,
  `harga` int(11) NOT NULL,
  `gambar` text NOT NULL,
  `status` text NOT NULL DEFAULT 'menunggu',
  `waktu` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `mediator` text DEFAULT NULL,
  `sales` text NOT NULL,
  `tgl_jual` date NOT NULL,
  `hrg_jual` int(11) NOT NULL,
  `fee_mediator` int(11) DEFAULT NULL,
  `fee_sales` int(11) NOT NULL,
  `leas` text DEFAULT NULL,
  `tenor` text DEFAULT NULL,
  `refund` int(11) DEFAULT NULL,
  `author` text NOT NULL,
  `id_pelanggan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_pembelian`, `mediator`, `sales`, `tgl_jual`, `hrg_jual`, `fee_mediator`, `fee_sales`, `leas`, `tenor`, `refund`, `author`, `id_pelanggan`) VALUES
(6961552, 70598991, '', 'HENDRO', '2021-06-22', 117500000, 0, 1000000, '', '', 0, 'Administrator', NULL),
(9464172, 85918529, '', 'HENDRO', '2021-04-24', 93500000, 3000000, 0, '', '', 0, 'Administrator', NULL),
(11090501, 64231799, '', 'ARIF', '2021-06-24', 127000000, 0, 1000000, 'MUF', '4', 7000000, 'Administrator', NULL),
(11871723, 41175281, '', 'IIP', '2021-04-12', 115000000, 1000000, 1000000, '', '', 0, 'Administrator', NULL),
(16186191, 32059917, '', 'HENDRO', '2021-06-19', 115000000, 0, 1000000, '', '', 0, 'Administrator', NULL),
(20092651, 5910865, '', 'RIO', '2021-03-19', 91000000, 0, 0, 'BCA', '5', 5200000, 'Administrator', NULL),
(24383646, 38914496, '', 'ADIT', '2021-05-03', 440000000, 0, 1000000, 'ACC', '4', 17000000, 'Administrator', NULL),
(25671069, 48850252, '', 'NINIT', '2021-04-10', 127000000, 3000000, 0, 'ACC', '4', 5600000, 'Administrator', NULL),
(26302257, 21834759, '', 'NINIT', '2021-06-07', 185000000, 0, 0, '', '', 0, 'Administrator', NULL),
(37740733, 70393020, '', 'IIP', '2021-03-03', 115000000, 0, 0, '', '', 0, 'Administrator', NULL),
(38816921, 5575072, '', 'ADIT', '2021-06-10', 137000000, 0, 1000000, '', '', 0, 'Administrator', NULL),
(40171783, 63193251, '', 'IIP', '2021-04-27', 93000000, 0, 0, 'MUF', '4', 5032322, 'Administrator', NULL),
(41445059, 9316165, '', 'IIP', '2021-03-03', 140000000, 0, 0, 'BCA', '4', 7000000, 'Administrator', NULL),
(44324368, 80793544, '', 'KUMIS', '2021-03-31', 146000000, 0, 1500000, 'BUANA', '4', 7000000, 'Administrator', NULL),
(46998062, 73233672, '', 'IIP', '2021-05-03', 114000000, 0, 1000000, 'BCA', '5', 5300000, 'Administrator', NULL),
(49103288, 91369420, '', 'IIP', '2021-03-15', 82500000, 2000000, 1000000, '', '', 0, 'Administrator', NULL),
(49607887, 131047, '', 'RIO', '2021-05-21', 123000000, 2500000, 0, 'MUF', '4', 8300000, 'Administrator', NULL),
(54687718, 48031542, '', 'ADIT', '2021-06-08', 113000000, 0, 1000000, 'BCA', '4', 6278766, 'Administrator', NULL),
(55017307, 94296012, '', 'IIP', '2021-06-21', 115000000, 0, 1000000, 'BUANA', '4', 5500000, 'Administrator', NULL),
(62607016, 11263312, '', 'ADIT', '2021-03-19', 77000000, 0, 1000000, 'BCA', '5', 5000000, 'Administrator', NULL),
(64090334, 89331172, '', 'KUMIS', '2021-03-03', 145000000, 0, 0, 'ACC', '4', 5000000, 'Administrator', NULL),
(66157987, 2587260, '', 'IIP', '2021-06-17', 119000000, 0, 1000000, 'MUF', '4', 5000000, 'Administrator', NULL),
(67973186, 40823947, '', 'IIP', '2021-06-04', 90000000, 0, 1000000, 'OTO', '4', 3800000, 'Administrator', NULL),
(68375262, 13312527, '', 'IIP', '2021-05-21', 125000000, 0, 1000000, 'MUF', '3', 5300000, 'Administrator', NULL),
(72393103, 88183645, '', 'NINIT', '2021-06-16', 170000000, 0, 0, 'BCA', '4', 7976948, 'Administrator', NULL),
(74306385, 9299783, '', 'IIP', '2021-03-05', 127000000, 1000000, 0, '', '', 0, 'Administrator', NULL),
(79939905, 26886883, '', 'IIP', '2021-06-23', 39000000, 0, 1000000, '', '', 0, 'Administrator', NULL),
(80009906, 8703445, '', 'ADIT', '2021-04-26', 132000000, 0, 0, '', '', 0, 'Administrator', NULL),
(80085102, 19799118, '', 'HENDRO', '2021-07-20', 162000000, 0, 1000000, '', '', 0, 'Administrator', NULL),
(80978285, 87880950, '', 'NINIT', '2021-06-01', 105000000, 0, 0, '', '', 0, 'Administrator', NULL),
(81459807, 33020245, '', 'IIP', '2021-06-20', 114000000, 0, 1000000, '', '', 0, 'Administrator', NULL),
(82871142, 13737280, '', 'IIP', '2021-07-05', 115000000, 0, 1000000, '', '', 0, 'Administrator', NULL),
(82968439, 85050411, '', 'HENDRO', '2021-05-05', 125000000, 1000000, 1000000, '', '', 0, 'Administrator', NULL),
(87265122, 36885768, '', 'IIP', '2021-07-21', 380000000, 0, 1500000, '', '', 0, 'Administrator', NULL),
(90359225, 51150841, '', 'ALAM', '2021-06-18', 116000000, 0, 0, 'MUF', '4', 6230553, 'Administrator', NULL),
(91041142, 4093445, '', 'NINIT', '2021-06-15', 125000000, 0, 0, 'BCA', '4', 6400715, 'Administrator', NULL),
(92150694, 31575117, '', 'IIP', '2021-04-24', 108000000, 3000000, 1000000, 'BCA', '4', 6800000, 'Administrator', NULL),
(93575106, 91893766, '', 'IIP', '2021-06-01', 126000000, 0, 1000000, '', '', 0, 'Administrator', NULL),
(93713822, 45074186, '', 'IIP', '2021-04-04', 114000000, 0, 1, '', '', 0, 'Administrator', NULL);

--
-- Trigger `penjualan`
--
DELIMITER $$
CREATE TRIGGER `tr_penjualan_del_stok` BEFORE INSERT ON `penjualan` FOR EACH ROW BEGIN
	DELETE FROM stok WHERE 
    stok.id_pembelian=NEW.id_pembelian;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_penjualan_up_status` BEFORE INSERT ON `penjualan` FOR EACH ROW BEGIN
	UPDATE pembelian SET pembelian.status="terjual" WHERE pembelian.id_pembelian= NEW.id_pembelian;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok`
--

CREATE TABLE `stok` (
  `id_stok` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `nopol` text NOT NULL,
  `tipe` text NOT NULL,
  `warna` text NOT NULL,
  `tahun` int(11) NOT NULL,
  `jarak_tempuh` int(11) DEFAULT NULL,
  `jenis_bbm` text DEFAULT NULL,
  `hrg_jual` int(11) DEFAULT NULL,
  `tgl_beli` date NOT NULL,
  `author` text NOT NULL,
  `gambar` text DEFAULT NULL,
  `booked` tinyint(1) NOT NULL DEFAULT 0,
  `id_pelanggan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `stok`
--

INSERT INTO `stok` (`id_stok`, `id_pembelian`, `nopol`, `tipe`, `warna`, `tahun`, `jarak_tempuh`, `jenis_bbm`, `hrg_jual`, `tgl_beli`, `author`, `gambar`, `booked`, `id_pelanggan`) VALUES
(1, 81394933, 'A 8065 T', 'Hilux G MT', 'Hitam', 2018, 0, '', 179000000, '2020-12-01', 'DEMO', 'default.png', 0, NULL),
(14, 35107871, 'A 1626 AK', 'AVANZA G A/T', 'SILVER', 2018, NULL, NULL, NULL, '2021-06-30', 'DEMO', 'default.png', 0, NULL),
(15, 86481478, 'A 1278 TJ', 'BRIO E M/T', 'MERAH', 2015, NULL, NULL, NULL, '2021-06-29', 'DEMO', 'default.png', 0, NULL),
(17, 86254964, 'B 1517 BEQ', 'VIOS E A/T', 'SILVER', 2013, NULL, NULL, NULL, '2021-06-07', 'DEMO', 'default.png', 0, NULL),
(18, 87362359, 'A 1254 PK', 'YARIS S A/T', 'HITAM', 2012, NULL, NULL, NULL, '2021-06-07', 'DEMO', 'default.png', 0, NULL),
(19, 47745133, 'A 1 HU', 'PAJERO DAKKAR A/T', 'HITAM MIKA', 2016, NULL, NULL, NULL, '2021-06-15', 'DEMO', 'default.png', 0, NULL),
(20, 36459715, 'A 1306 RC', 'CALYA G A/T', 'ABU-ABU METALIK', 2018, NULL, NULL, NULL, '2021-06-16', 'DEMO', 'default.png', 0, NULL),
(21, 95698359, 'A 1511 BF', 'BRIO RS M/T', 'PUTIH', 2018, NULL, NULL, NULL, '2021-06-17', 'DEMO', 'default.png', 0, NULL),
(22, 83114401, 'A 1527 EM', 'YARIS S M/T', 'PUTIH', 2013, NULL, NULL, NULL, '2021-06-18', 'DEMO', 'default.png', 0, NULL),
(23, 45027060, 'A 1593 VW', 'ERTIGA GL A/T', 'PUTIH METALIK', 2015, NULL, NULL, NULL, '2021-06-19', 'DEMO', 'default.png', 0, NULL),
(24, 63980145, 'A 1368 AP', 'AVANZA G A/T', 'PUTIH', 2014, NULL, NULL, NULL, '2021-06-27', 'DEMO', 'default.png', 0, NULL),
(26, 99927894, 'A 1831 EB', 'BRIO S M/T', 'PUTIH', 2019, 0, '', 137000000, '2021-07-20', 'Administrator', 'default.png', 0, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `alamat` text NOT NULL,
  `email` text DEFAULT NULL,
  `no_hp` text NOT NULL,
  `privilege` text DEFAULT '\'pelanggan\''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `alamat`, `email`, `no_hp`, `privilege`) VALUES
(1001, 'Administrator', 'admin', 'husen13tahun', 'Jl. Merpati Raya 161, Ciputat, Tangerang Selatan', 'muhammad.ali.husaini.job@gmail.com', '087771236822', 'admin'),
(8714030, 'Renita', 'renita', 'renitafargasa', 'Jl. Kyai H. Abdul Latif No.5, Karangasem, Kec. Cilegon, Kota Cilegon, Banten 42417', 'renitarenita81@gmail.com', '087773524888', 'owner');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `book`
--
ALTER TABLE `book`
  ADD KEY `FK_pembelian-book` (`id_pembelian`),
  ADD KEY `FK_pelanggan-book` (`id_pelanggan`);

--
-- Indeks untuk tabel `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id_log`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `pembelian_fk0` (`id_pelanggan`);

--
-- Indeks untuk tabel `penawaran`
--
ALTER TABLE `penawaran`
  ADD PRIMARY KEY (`id_penawaran`),
  ADD KEY `penawaran_fk0` (`id_pelanggan`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `penjualan_fk0` (`id_pembelian`),
  ADD KEY `penjualan_fk1` (`id_pelanggan`);

--
-- Indeks untuk tabel `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`id_stok`),
  ADD KEY `stok_fk1` (`id_pelanggan`),
  ADD KEY `stok_fk0` (`id_pembelian`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`) USING HASH,
  ADD UNIQUE KEY `no_hp` (`no_hp`) USING HASH;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `log`
--
ALTER TABLE `log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `penawaran`
--
ALTER TABLE `penawaran`
  MODIFY `id_penawaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111222334;

--
-- AUTO_INCREMENT untuk tabel `stok`
--
ALTER TABLE `stok`
  MODIFY `id_stok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `FK_pelanggan-book` FOREIGN KEY (`id_pelanggan`) REFERENCES `user` (`id_user`) ON DELETE CASCADE,
  ADD CONSTRAINT `Fk_pembelian-book` FOREIGN KEY (`id_pembelian`) REFERENCES `pembelian` (`id_pembelian`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_fk0` FOREIGN KEY (`id_pelanggan`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `penawaran`
--
ALTER TABLE `penawaran`
  ADD CONSTRAINT `penawaran_fk0` FOREIGN KEY (`id_pelanggan`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_fk0` FOREIGN KEY (`id_pembelian`) REFERENCES `pembelian` (`id_pembelian`),
  ADD CONSTRAINT `penjualan_fk1` FOREIGN KEY (`id_pelanggan`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `stok`
--
ALTER TABLE `stok`
  ADD CONSTRAINT `stok_fk0` FOREIGN KEY (`id_pembelian`) REFERENCES `pembelian` (`id_pembelian`) ON DELETE CASCADE,
  ADD CONSTRAINT `stok_fk1` FOREIGN KEY (`id_pelanggan`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
