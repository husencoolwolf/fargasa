CREATE TABLE `pembelian` (
	`id_pembelian` INT NOT NULL,
	`nopol` TEXT NOT NULL,
	`tipe` TEXT NOT NULL,
	`warna` TEXT NOT NULL,
	`tahun` INT NOT NULL,
	`jarak_tempuh` INT,
	`jenis_bbm` TEXT,
	`mediator` TEXT,
	`tgl_beli` DATE NOT NULL,
	`hrg_beli` INT NOT NULL,
	`fee_mediator` INT,
	`pajak` INT,
	`rekondisi` INT,
	`status` TEXT DEFAULT 'siap',
	`author` TEXT NOT NULL,
	`gambar` TEXT,
	`id_pelanggan` INT,
	PRIMARY KEY (`id_pembelian`)
);

CREATE TABLE `stok` (
	`id_stok` INT NOT NULL AUTO_INCREMENT,
	`id_pembelian` INT NOT NULL,
	`nopol` TEXT NOT NULL,
	`tipe` TEXT NOT NULL,
	`warna` TEXT NOT NULL,
	`tahun` INT NOT NULL,
	`jarak_tempuh` INT,
	`jenis_bbm` TEXT,
	`hrg_jual` INT,
	`author` TEXT NOT NULL,
	`gambar` TEXT,
	`booked` BOOLEAN NOT NULL DEFAULT false,
	`id_pelanggan` INT,
	PRIMARY KEY (`id_stok`)
);

CREATE TABLE `penjualan` (
	`id_penjualan` INT NOT NULL AUTO_INCREMENT,
	`id_pembelian` INT NOT NULL,
	`nopol` TEXT NOT NULL,
	`tipe` TEXT NOT NULL,
	`warna` TEXT NOT NULL,
	`tahun` TEXT NOT NULL,
	`jarak_tempuh` TEXT,
	`jenis_bbm` TEXT,
	`mediator` TEXT,
	`sales` TEXT NOT NULL,
	`tgl_jual` DATE NOT NULL,
	`hrg_jual` INT NOT NULL,
	`fee_mediator` INT,
	`fee_sales` INT NOT NULL,
	`pajak` INT,
	`rekondisi` INT,
	`leas` TEXT,
	`tenor` TEXT,
	`author` TEXT NOT NULL,
	`gambar` TEXT,
	`id_pelanggan` INT,
	PRIMARY KEY (`id_penjualan`)
);

CREATE TABLE `user` (
	`id_user` INT NOT NULL,
	`nama` TEXT NOT NULL,
	`username` TEXT NOT NULL UNIQUE,
	`password` TEXT NOT NULL,
	`email` TEXT NOT NULL UNIQUE,
	`no_hp` TEXT UNIQUE,
	`privilege` TEXT NOT NULL DEFAULT 'pelanggan',
	PRIMARY KEY (`id_user`)
);

CREATE TABLE `log` (
	`id_log` INT NOT NULL AUTO_INCREMENT,
	`waktu` TIMESTAMP,
	`tipe_log` TEXT NOT NULL,
	`nopol` TEXT NOT NULL,
	`tipe` TEXT NOT NULL,
	`tahun` TEXT NOT NULL,
	`author` TEXT NOT NULL,
	PRIMARY KEY (`id_log`)
);

CREATE TABLE `penawaran` (
	`id_penawaran` INT NOT NULL AUTO_INCREMENT,
	`tipe` TEXT NOT NULL,
	`warna` TEXT NOT NULL,
	`tahun` INT NOT NULL,
	`jarak_tempuh` INT,
	`jenis_bbm` TEXT,
	PRIMARY KEY (`id_penawaran`)
);

ALTER TABLE `pembelian` ADD CONSTRAINT `pembelian_fk0` FOREIGN KEY (`id_pelanggan`) REFERENCES `user`(`id_user`);

ALTER TABLE `stok` ADD CONSTRAINT `stok_fk0` FOREIGN KEY (`id_pembelian`) REFERENCES `pembelian`(`id_pembelian`);

ALTER TABLE `stok` ADD CONSTRAINT `stok_fk1` FOREIGN KEY (`id_pelanggan`) REFERENCES `user`(`id_user`);

ALTER TABLE `penjualan` ADD CONSTRAINT `penjualan_fk0` FOREIGN KEY (`id_pembelian`) REFERENCES `pembelian`(`id_pembelian`);

ALTER TABLE `penjualan` ADD CONSTRAINT `penjualan_fk1` FOREIGN KEY (`id_pelanggan`) REFERENCES `user`(`id_user`);

