-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Jun 2021 pada 05.08
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.3.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Dumping data untuk tabel `book`
--

INSERT INTO `book` (`id_booking`, `id_pembelian`, `id_pelanggan`, `booking_mulai`, `booking_stop`) VALUES
(73105557, 78081683, 71976146, '2021-05-20 07:14:59', '2021-05-21 07:14:59'),
(94978356, 78081683, 40871900, '2021-05-19 21:29:12', '2021-05-20 21:29:12'),
(48704006, 78081683, 77945793, '2021-05-20 01:31:22', '2021-05-21 01:31:22'),
(25552675, 62841710, 77945793, '2021-05-25 19:19:55', '2021-05-26 19:19:55'),
(48875875, 62841710, 76474836, '2021-05-25 19:22:14', '2021-05-26 19:22:14'),
(54450723, 62841710, 20357528, '2021-05-25 19:27:11', '2021-05-26 19:27:11'),
(94434984, 62841710, 77945793, '2021-06-07 09:42:51', '2021-06-08 09:42:51'),
(10298810, 62841710, 77945793, '2021-06-24 14:12:12', '2021-06-25 14:12:12'),
(93942088, 62841710, 82650300, '2021-06-26 09:33:15', '2021-06-27 09:33:15');

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
(57800832, 'A 1856 BP', 'SIGRA R M/T', 'Putih', 2020, 125000, '', '', '2021-04-04', 105000000, 115000000, 0, 2350000, 0, 'terjual', 'hsuen', 'sigra r putih.jpg', NULL),
(62841710, 'A 1604 AC', 'TERIOS TX M/T', 'SILVER', 2013, 0, '', '', '2021-02-16', 115000000, 130000000, 2000000, 0, 1250000, 'siap', 'hsuen', 'terios tx AT.jpg', NULL),
(68213017, 'A 1384 KS', 'CR-V Prestige A/T', 'ABU-ABU METALIK', 2017, 0, '', '', '2021-03-25', 375000000, 405000000, 0, 0, 2500000, 'siap', 'DEMO', 'crv.jpg', NULL),
(78081683, 'A 1450 FX', 'BRIO E A/T', 'MERAH', 2018, 150000, 'Bensin', '', '2021-05-05', 123000000, 125000000, 0, 0, 0, 'terjual', 'hsuen', 'brio e mt merah.jpg', NULL);

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
  `author` text DEFAULT NULL,
  `waktu` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penawaran`
--

INSERT INTO `penawaran` (`id_penawaran`, `id_pelanggan`, `tipe`, `warna`, `tahun`, `jarak_tempuh`, `jenis_bbm`, `harga`, `gambar`, `status`, `author`, `waktu`) VALUES
(72045651, 77945793, 'Pajero Dakkar', 'Hitam Metalik', 2016, 250000, 'Bensin', 320000000, 'WhatsApp Image 2021-06-17 at 14.17.07.jpeg', 'selesai', 'COST_1', '2021-06-24 12:27:53');

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
(85478528, 57800832, '', 'IIP', '2021-05-03', 114000000, 0, 1000000, 'BCA', '4', 0, 'hsuen', 40871900),
(85478529, 78081683, '', 'IIP', '2021-06-09', 130000000, 0, 1000000, '', '', 0, 'husen', 77945793);

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
(6, 62841710, 'A 1604 AC', 'TERIOS TX M/T', 'SILVER', 2013, 0, '', 130000000, '2021-02-16', 'hsuen', 'terios tx AT.jpg', 0, NULL),
(10, 68213017, 'A 1384 KS', 'CR-V Prestige A/T', 'ABU-ABU METALIK', 2017, 0, '', 405000000, '2021-03-25', 'DEMO', 'crv.jpg', 0, NULL);

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
(15, 'husen', 'coolwolf', 'coolwolf', '', 'coowolf@gmail.com', '087771236822', 'staff'),
(1001, 'DEMO', 'admin', 'fargasa', '', NULL, '123456123', 'admin'),
(12063925, 'baru', 'baruuuu', 'baruuuu', 'awdwa', '', '2313213032', 'pelanggan'),
(20357528, 'COST_3', 'cost3', 'costumer', '', '', '32165413216', 'pelanggan'),
(40871900, 'zahra', 'zahra', 'coolwolf', '', '', '08777213545', 'pelanggan'),
(45547275, 'dino', 'salesman', 'salesman', 'ciputat', '', '08555111333', 'sales'),
(63732501, 'riski', 'riski', 'riski123', '', '', '21312313312', 'pelanggan'),
(64155055, 'OWNERFARGASA', 'owner', 'fargasa', 'FARGASA', '', '0811122333', 'owner'),
(71976146, 'batu', 'batu', 'babatu', '', '', '222555222555', 'pelanggan'),
(74555333, 'ada', 'adaa', 'adaada', '', '', '123123123123', 'pelanggan'),
(76474836, 'COST_2', 'cost2', 'costumer', '', '', '3216542163', 'pelanggan'),
(77945793, 'COST_1', 'cost1', 'costumer', 'ciputat', '', '3216543161', 'pelanggan'),
(82650300, 'zahra cantik', 'zahra2', 'zahra123', 'serang', '', '08747745451', 'pelanggan');

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
  MODIFY `id_penawaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85333476;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85478530;

--
-- AUTO_INCREMENT untuk tabel `stok`
--
ALTER TABLE `stok`
  MODIFY `id_stok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
