-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Jan 2020 pada 19.04
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pum`
--

DELIMITER $$
--
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `all_kehilangan_idpelapor` (IN `id` INT)  NO SQL
SELECT * FROM user as x INNER JOIN pelapor as z ON x.id_user = z.id_user INNER JOIN kehilangan as c ON c.id_pelapor = z.id_pelapor WHERE c.id_kehilangan = id ORDER by c.st_lap ASC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tambahlapk` (INOUT `nomor` INT, IN `tgl` DATE, IN `wkt` TIME)  NO SQL
INSERT INTO lapkehilangan (no_surat, tgl_surat,waktu) VALUES (nomor,tgl,wkt)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nm_admin` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `lvl` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nm_admin`, `username`, `password`, `lvl`) VALUES
(1, 'Bagas Ageng', 'Bagas', 'E10adc3949ba59abbe56e057f20f883e', 11),
(2, 'Aldino Rizaldi', 'Aldino', 'E10adc3949ba59abbe56e057f20f883e', 10),
(4, 'Kepala', 'Kepala', '870f669e4bbbfa8a6fde65549826d1c4', 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kehilangan`
--

CREATE TABLE `kehilangan` (
  `id_kehilangan` int(11) NOT NULL,
  `id_pelapor` int(11) NOT NULL,
  `nm_brg_doc` text NOT NULL,
  `ket` text NOT NULL,
  `tgl_hilang` date NOT NULL,
  `pukul` time NOT NULL,
  `tempat` varchar(100) NOT NULL,
  `st_lap` int(1) NOT NULL DEFAULT '0',
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kehilangan`
--

INSERT INTO `kehilangan` (`id_kehilangan`, `id_pelapor`, `nm_brg_doc`, `ket`, `tgl_hilang`, `pukul`, `tempat`, `st_lap`, `create_date`) VALUES
(1, 1, 'Barang Hilang', 'Keterangan', '2020-01-01', '12:12:00', 'Bandar Lampung', 1, '2020-01-04 01:07:26'),
(2, 4, 'Samsung Galaxy S3', 'Imei : 91749197414', '2020-01-08', '12:12:00', 'Polinela', 0, '2020-01-08 03:53:53'),
(4, 3, 'Atm Bri ', 'No Rekening = 646186486184194801048', '2020-01-04', '11:12:00', 'Kampung Baru', 0, '2020-01-08 03:56:10'),
(5, 5, 'IPHONE 7', 'Imei : 9174919741434', '2020-01-07', '12:09:00', 'Polinela', 2, '2020-01-08 04:04:08'),
(6, 6, 'Tas', 'Warna Pict Minibag', '2019-10-12', '14:00:00', 'Mall Bumi Kedaton', 1, '2020-01-09 05:12:49'),
(7, 7, 'Triani Megawati', 'Rambut Panjang Warna Hittam, Muka Oval', '2020-01-10', '10:09:00', 'Jalan Polinela', 2, '2020-01-09 20:37:59'),
(8, 1, 'IPHONE 7', 'Imei : 91749197414', '2020-01-02', '12:12:00', 'Polinela', 0, '2020-01-10 03:30:55'),
(9, 9, 'Sim Card', 'Dengan No : 089689121897', '2019-12-11', '09:46:00', 'Jl. Bypass', 1, '2020-01-12 19:22:58'),
(10, 8, 'Kucing', 'Kucing Kampung', '2020-01-05', '06:31:00', 'Kampung Ku', 0, '2020-01-12 19:26:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lapkehilangan`
--

CREATE TABLE `lapkehilangan` (
  `id_lap` int(11) NOT NULL,
  `id_kehilangan` int(11) NOT NULL,
  `no_surat` int(11) NOT NULL,
  `tgl_surat` date NOT NULL,
  `waktu` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lapkehilangan`
--

INSERT INTO `lapkehilangan` (`id_lap`, `id_kehilangan`, `no_surat`, `tgl_surat`, `waktu`) VALUES
(1, 1, 1, '2020-01-04', '20:06:00'),
(2, 5, 2, '2020-01-08', '23:09:00'),
(3, 6, 3, '2020-01-09', '12:14:00'),
(5, 4, 4, '2020-01-15', '01:03:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelapor`
--

CREATE TABLE `pelapor` (
  `id_pelapor` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tmp_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` enum('L','P','-') NOT NULL DEFAULT '-',
  `alamat` text NOT NULL,
  `agama` enum('Islam','Kristen','Katolik','Hindu','Budha','Konguchu') NOT NULL,
  `status` varchar(20) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `kwn` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelapor`
--

INSERT INTO `pelapor` (`id_pelapor`, `id_user`, `tgl_data`, `nik`, `nama`, `tmp_lahir`, `tgl_lahir`, `jk`, `alamat`, `agama`, `status`, `pekerjaan`, `kwn`) VALUES
(1, 1, '2020-01-04 19:37:21', '1234567891234567', 'Bagas Ageng', 'Bandar Lampung', '2020-01-04', 'L', 'Bandar Lampung', 'Islam', 'Menikah', 'Wiraswasta', 'Wni'),
(2, 2, '2020-01-08 22:17:37', '0089654342689607', 'Diki Rahmad Sandi', 'Bandar Lampung', '2020-01-09', 'L', 'Bandar Lampung', 'Islam', 'Menikah', 'Wiraswasta', 'Wni'),
(3, 3, '2020-01-08 22:19:42', '0089654342689606', 'Diki Rahmad Sandi', 'Bandar Lampung', '2020-01-08', 'L', 'Bandar Lampung', 'Islam', 'Menikah', 'Wiraswasta', 'Wni'),
(4, 4, '2020-01-08 22:53:17', '7371731838811933', 'Bayu', 'Bandar Lampung', '2020-01-01', 'L', 'Bandar Lampung', 'Islam', 'Single', 'Mahasiswa', 'Wni'),
(5, 5, '2020-01-08 23:02:57', '0089654342689616', 'INDRA FIRDAUS', 'Bandar Lampung', '1999-11-16', 'L', 'Bandar Lampung', 'Islam', 'Single', 'Mahasiswa', 'Wni'),
(6, 6, '2020-01-09 12:11:22', '1805391367350954', 'Givani Lourenza', 'Bandar Lampung', '2000-02-11', 'P', 'Bandar Lampung', 'Islam', 'Single', 'Mahasiswa', 'Wni'),
(7, 7, '2020-01-10 15:36:29', '5089654342689606', 'Feri Irawan', 'Padang', '1999-10-14', 'L', 'Bandar Lampung', 'Islam', 'Single', 'Mahasiswa', 'Wni'),
(8, 8, '2020-01-13 14:20:04', '1748493030272720', 'Anisa Nur Rohkmah', 'Natar', '2020-01-24', 'P', 'Peninjauan', 'Islam', 'Menikah', 'Mahasiwa', 'Wni'),
(9, 9, '2020-01-13 14:21:30', '1871028469220009', 'Dinda Fatriani', 'B. Lampung', '1999-02-05', 'P', 'Nunyai', 'Islam', 'Single', 'Mahasiswa', 'Wni'),
(10, 10, '2020-01-13 15:01:17', '1160001028277388', 'ALDINO RIZALDI', 'Bandar Lampung', '1999-06-06', 'L', 'Jalanin Aja', 'Islam', 'Menikah', 'Pengusaha', 'Wni');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `tgl_daftar` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `no_hp` varchar(13) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `tgl_daftar`, `no_hp`, `email`, `password`, `foto`) VALUES
(1, '2020-01-04 19:36:42', '081234567898', 'Bagas.sageng@gmail.com', 'F4428f414301129ced83dba0270ee67f', '10012020021932-id_user=1.jpg'),
(2, '2020-01-08 22:16:55', '0895606226096', 'Diki@diki.com', 'Fcea920f7412b5da7be0cf42b8c93759', 'Default.png'),
(3, '2020-01-08 22:19:20', '09876548976', 'Diki245@diki.com', 'Fcea920f7412b5da7be0cf42b8c93759', 'Default.png'),
(4, '2020-01-08 22:52:34', '086671717171', 'Bayu@bayu.id', 'Fcea920f7412b5da7be0cf42b8c93759', '09012020124902-id_user=4.jpg'),
(5, '2020-01-08 23:01:57', '085640767607', 'Indra.borak16@gmail.com', '9ed2a7712760d7d953d62b01cb3e1866', 'Default.png'),
(6, '2020-01-09 12:09:58', '082280676335', 'Givanilourenza22@gmail.com', '0ee163cdb1daf5bee834a825ab56d5ae', '09012020124845-id_user=6.jpg'),
(7, '2020-01-10 15:27:10', '7898907777778', 'Irawanferii48@gmail.com', '6eff2276c4f875c14c569fbc11e4c2a0', '10012020153518-id_user=7.jpg'),
(8, '2020-01-13 14:19:13', '0895705010385', 'Anisanurr6@gmail.com', '905b145f1f8ce03a78c80a181d856a9e', '13012020142441-id_user=8.jpg'),
(9, '2020-01-13 14:19:41', '089689121897', 'Fatrianidinda@gmail.com', 'E807f1fcf82d132f9bb018ca6738a19f', 'Default.png'),
(10, '2020-01-13 15:00:04', '6282373319728', 'Aldinorizaldi4@gmail.com', 'Fb5b1992ff29e855c1b93858cf1c9117', 'Default.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `kehilangan`
--
ALTER TABLE `kehilangan`
  ADD PRIMARY KEY (`id_kehilangan`),
  ADD KEY `id_pelapor` (`id_pelapor`);

--
-- Indeks untuk tabel `lapkehilangan`
--
ALTER TABLE `lapkehilangan`
  ADD PRIMARY KEY (`id_lap`),
  ADD UNIQUE KEY `no_surat` (`no_surat`),
  ADD UNIQUE KEY `id_kehilangan` (`id_kehilangan`),
  ADD KEY `no_surat_2` (`no_surat`);

--
-- Indeks untuk tabel `pelapor`
--
ALTER TABLE `pelapor`
  ADD PRIMARY KEY (`id_pelapor`),
  ADD UNIQUE KEY `nik` (`nik`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kehilangan`
--
ALTER TABLE `kehilangan`
  MODIFY `id_kehilangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `lapkehilangan`
--
ALTER TABLE `lapkehilangan`
  MODIFY `id_lap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pelapor`
--
ALTER TABLE `pelapor`
  MODIFY `id_pelapor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kehilangan`
--
ALTER TABLE `kehilangan`
  ADD CONSTRAINT `kehilangan_ibfk_1` FOREIGN KEY (`id_pelapor`) REFERENCES `pelapor` (`id_pelapor`);

--
-- Ketidakleluasaan untuk tabel `lapkehilangan`
--
ALTER TABLE `lapkehilangan`
  ADD CONSTRAINT `lapkehilangan_ibfk_1` FOREIGN KEY (`id_kehilangan`) REFERENCES `kehilangan` (`id_kehilangan`);

--
-- Ketidakleluasaan untuk tabel `pelapor`
--
ALTER TABLE `pelapor`
  ADD CONSTRAINT `pelapor_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
