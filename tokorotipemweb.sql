-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 12 Des 2016 pada 08.06
-- Versi Server: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokorotipemweb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id_user` varchar(20) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `pass` varchar(48) NOT NULL,
  `salt` varchar(10) NOT NULL,
  `id_level` varchar(20) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(500) DEFAULT NULL,
  `ttl` date DEFAULT NULL,
  `jenkel` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id_user`, `email`, `pass`, `salt`, `id_level`, `username`, `nama`, `alamat`, `ttl`, `jenkel`) VALUES
('USER01', 'kasir@kasir.com', 'f3986676c084672f27a3748726eaec30', 'kasir', '2', 'kasir', 'kasir', 'Jakarta', '0000-00-00', 'Perempuan'),
('USER02', 'admin@admin.com', 'f6fdffe48c908deb0f4c3bd36c032e72', 'admin', '1', 'admin', 'Admin', 'Tangerang', '0000-00-00', 'Laki-laki'),
('USER04', 'admin3@admin.com', 'f6fdffe48c908deb0f4c3bd36c032e72', 'admin', '1', 'admin3', 'Admin A', 'Tangerang', '0000-00-00', 'Perempuan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `msgudang`
--

CREATE TABLE `msgudang` (
  `id_roti` varchar(50) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mslevel`
--

CREATE TABLE `mslevel` (
  `id_level` varchar(20) NOT NULL,
  `nama_bagian` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mslevel`
--

INSERT INTO `mslevel` (`id_level`, `nama_bagian`) VALUES
('1', 'Admin'),
('2', 'Kasir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `msroti`
--

CREATE TABLE `msroti` (
  `id_roti` varchar(50) NOT NULL,
  `nama_roti` varchar(50) DEFAULT NULL,
  `harga_pokok` int(11) DEFAULT NULL,
  `harga_jual` int(11) DEFAULT NULL,
  `id_tiperoti` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `msroti`
--

INSERT INTO `msroti` (`id_roti`, `nama_roti`, `harga_pokok`, `harga_jual`, `id_tiperoti`) VALUES
('RK001', 'Roti Kopi', 7000, 10000, 'B0001'),
('RV001', 'Roti Vanilla Plain', 8000, 10000, 'B0001'),
('RV002', 'Roti Vanilla Kopi', 8500, 12000, 'B0001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mstiperoti`
--

CREATE TABLE `mstiperoti` (
  `id_tiperoti` varchar(50) NOT NULL,
  `nama_tiperoti` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mstiperoti`
--

INSERT INTO `mstiperoti` (`id_tiperoti`, `nama_tiperoti`) VALUES
('B0001', 'Bun'),
('D0001', 'Donut');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transactiondetail`
--

CREATE TABLE `transactiondetail` (
  `transactiondetail_id` varchar(50) NOT NULL,
  `transactionheader_id` varchar(50) DEFAULT NULL,
  `id_roti` varchar(50) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `harga_roti` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transactiondetail`
--

INSERT INTO `transactiondetail` (`transactiondetail_id`, `transactionheader_id`, `id_roti`, `qty`, `harga_roti`) VALUES
('TD0001', 'TR0001', 'RV002', 7, 12000),
('TD0002', 'TR0001', 'RK001', 1, 10000),
('TD0003', 'TR0002', 'RV001', 2, 10000);

--
-- Trigger `transactiondetail`
--
DELIMITER $$
CREATE TRIGGER `minus_stock` AFTER INSERT ON `transactiondetail` FOR EACH ROW UPDATE msgudang
	SET msgudang.stok = ms_gudang.stok - NEW.qty
    WHERE id_roti = NEW.id_roti
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transactionheader`
--

CREATE TABLE `transactionheader` (
  `transactionheader_id` varchar(50) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `id_user` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transactionheader`
--

INSERT INTO `transactionheader` (`transactionheader_id`, `tanggal`, `id_user`) VALUES
('TR0001', '0000-00-00', 'USER01'),
('TR0002', '0000-00-00', 'USER02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_level_fk` (`id_level`);

--
-- Indexes for table `msgudang`
--
ALTER TABLE `msgudang`
  ADD KEY `id_roti` (`id_roti`);

--
-- Indexes for table `mslevel`
--
ALTER TABLE `mslevel`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `msroti`
--
ALTER TABLE `msroti`
  ADD PRIMARY KEY (`id_roti`),
  ADD KEY `id_tiperoti_fk` (`id_tiperoti`);

--
-- Indexes for table `mstiperoti`
--
ALTER TABLE `mstiperoti`
  ADD PRIMARY KEY (`id_tiperoti`);

--
-- Indexes for table `transactiondetail`
--
ALTER TABLE `transactiondetail`
  ADD PRIMARY KEY (`transactiondetail_id`),
  ADD KEY `transactionheader_id_fk` (`transactionheader_id`),
  ADD KEY `id_roti_fk` (`id_roti`);

--
-- Indexes for table `transactionheader`
--
ALTER TABLE `transactionheader`
  ADD PRIMARY KEY (`transactionheader_id`),
  ADD KEY `id_user_fk` (`id_user`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `id_level_fk` FOREIGN KEY (`id_level`) REFERENCES `mslevel` (`id_level`);

--
-- Ketidakleluasaan untuk tabel `msgudang`
--
ALTER TABLE `msgudang`
  ADD CONSTRAINT `msgudang_ibfk_1` FOREIGN KEY (`id_roti`) REFERENCES `msroti` (`id_roti`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `msroti`
--
ALTER TABLE `msroti`
  ADD CONSTRAINT `id_tiperoti_fk` FOREIGN KEY (`id_tiperoti`) REFERENCES `mstiperoti` (`id_tiperoti`);

--
-- Ketidakleluasaan untuk tabel `transactiondetail`
--
ALTER TABLE `transactiondetail`
  ADD CONSTRAINT `id_roti_fk` FOREIGN KEY (`id_roti`) REFERENCES `msroti` (`id_roti`),
  ADD CONSTRAINT `transactionheader_id_fk` FOREIGN KEY (`transactionheader_id`) REFERENCES `transactionheader` (`transactionheader_id`);

--
-- Ketidakleluasaan untuk tabel `transactionheader`
--
ALTER TABLE `transactionheader`
  ADD CONSTRAINT `id_user_fk` FOREIGN KEY (`id_user`) REFERENCES `login` (`id_user`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
