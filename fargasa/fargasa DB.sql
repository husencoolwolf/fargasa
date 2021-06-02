-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Jun 2021 pada 18.22
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
(54450723, 62841710, 20357528, '2021-05-25 19:27:11', '2021-05-26 19:27:11');

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
(57800832, 'A 1856 BP', 'SIGRA R M/T', 'Putih', 2020, 125000, '', '', '2021-04-04', 105000000, 115000000, 0, 2350000, 0, 'siap', 'hsuen', 'sigra r putih.jpg', NULL),
(62841710, 'A 1604 AC', 'TERIOS TX M/T', 'SILVER', 2013, 0, '', '', '2021-02-16', 115000000, 130000000, 2000000, 0, 1250000, 'siap', 'hsuen', 'terios tx AT.jpg', NULL),
(78081683, 'A 1450 FX', 'BRIO E A/T', 'MERAH', 2018, 150000, 'Bensin', '', '2021-05-05', 123000000, 125000000, 0, 0, 0, 'siap', 'hsuen', 'brio e mt merah.jpg', NULL);

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
  `gambar` text NOT NULL
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
  `author` text NOT NULL,
  `id_pelanggan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
	UPDATE pembelian SET pembelian.status="terjual";
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
(5, 78081683, 'A 1450 FX', 'BRIO E A/T', 'MERAH', 2018, 150000, 'Bensin', 125000000, '2021-04-04', 'hsuen', 'brio e mt merah.jpg', 0, NULL),
(6, 62841710, 'A 1604 AC', 'TERIOS TX M/T', 'SILVER', 2013, 0, '', 130000000, '2021-02-16', 'hsuen', 'terios tx AT.jpg', 0, NULL),
(7, 57800832, 'A 1856 BP', 'SIGRA R M/T', 'Putih', 2020, 125000, '', 115000000, '2021-05-05', 'hsuen', 'sigra r putih.jpg', 0, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `email` text DEFAULT NULL,
  `no_hp` text NOT NULL,
  `privilege` text DEFAULT '\'pelanggan\''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `email`, `no_hp`, `privilege`) VALUES
(15, 'hsuen', 'coolwolf', 'coolwolf', 'coowolf@gmail.com', '087771236822', 'staff'),
(1001, 'DEMO', 'admin', 'admin', NULL, '123456123', 'staff'),
(20357528, 'COST_3', 'cost3', 'costumer', '', '32165413216', 'pelanggan'),
(40871900, 'zahra', 'zahra', 'coolwolf', '', '08777213545', 'pelanggan'),
(63732501, 'riski', 'riski', 'riski123', '', '21312313312', 'pelanggan'),
(71976146, 'batu', 'batu', 'babatu', '', '222555222555', 'pelanggan'),
(74555333, 'ada', 'adaa', 'adaada', NULL, '123123123123', 'pelanggan'),
(76474836, 'COST_2', 'cost2', 'costumer', '', '3216542163', 'pelanggan'),
(77945793, 'COST_1', 'cost1', 'costumer', '', '3216543161', 'pelanggan');

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
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2123466;

--
-- AUTO_INCREMENT untuk tabel `stok`
--
ALTER TABLE `stok`
  MODIFY `id_stok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
