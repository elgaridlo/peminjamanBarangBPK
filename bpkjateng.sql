-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Okt 2018 pada 03.45
-- Versi server: 10.1.35-MariaDB
-- Versi PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bpkjateng`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(4) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `unit_kerja` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telpon` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nip`, `nama`, `unit_kerja`, `jabatan`, `email`, `telpon`, `username`, `password`) VALUES
(1, '3313141310950001', 'Elga Ridlo Sinatriya', 'Subbag Umum dan TI', 'Jabatan Tertentu', 'elgaridlos@gmail.com', '082242633375', 'elga', '123456');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(4) NOT NULL,
  `nup` varchar(50) NOT NULL,
  `tipe` varchar(50) NOT NULL,
  `kode_jenis` varchar(50) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `tahun` varchar(50) NOT NULL,
  `kelompok` varchar(50) NOT NULL,
  `ketersediaan` int(4) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nup`, `tipe`, `kode_jenis`, `jenis`, `tahun`, `kelompok`, `ketersediaan`) VALUES
(1, '1111', 'Quick Compressor', '3030101018', 'Mesin Kompresor', '2017', 'Umum', 1),
(2, '1111', 'Lenovo Charger', '3030103001', 'Battery Charge', '2017', 'Umum', 0),
(3, '1234', 'Sony InfocusA12', '3050105048', 'LCD Projector/Infocus', '2011', 'Umum', 0),
(4, '1010', 'Canon HandyCam', '3050206046', 'Handy Cam', '2014', 'Umum', 0),
(5, '1011', 'Apple Recorder', '3060101088', 'Voice Recorder', '2010', 'Umum', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang2`
--

CREATE TABLE `barang2` (
  `id_kode` int(4) NOT NULL,
  `kode_barang` varchar(50) NOT NULL,
  `jenis_barang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang2`
--

INSERT INTO `barang2` (`id_kode`, `kode_barang`, `jenis_barang`) VALUES
(12, '3030101018', 'Mesin Kompresor'),
(13, '3030103001', 'Battery Charge'),
(14, '3030205014', 'Crimping Tolls'),
(15, '3030205027', 'Scafolding Set & Tool'),
(16, '3030207006', 'Water Pas'),
(17, '3030212028', 'Mesin Bor Listrik Tangan'),
(18, '3030301032', 'Digital Multimeter (Alat Ukur Universal)'),
(19, '3030301141', 'Distance Meter'),
(20, '3050101001', 'Mesin Ketik Manual Portable (11-13 Inci)'),
(21, '3050101003', 'Mesin Ketik Manual Langewagon (18-27 Inci)'),
(22, '3050101008', 'Mesin Ketik Elektronik/Selektrik'),
(23, '3050104014', 'Mobile File'),
(24, '3050105015', 'Alat Penghancur Kertas'),
(25, '3050105024', 'Alat Pemotong Kertas'),
(26, '3050105038', 'Laser Pointer'),
(27, '3050105048', 'LCD Projector/Infocus'),
(28, '3050105052', 'Alat Perekam Suara (Voice Pen)'),
(29, '3050206004', 'Tape Recorder (Alat Rumah Tangga Lainnya ( Home Us'),
(30, '3050206007', 'Loudspeaker'),
(31, '3050206008', 'Sound System'),
(32, '3050206012', 'Wireless'),
(33, '3050206013', 'Megaphone'),
(34, '3050206014', 'Microphone'),
(35, '3050206015', 'Microphone Table Stand'),
(36, '3050206016', 'Mic Conference'),
(37, '3050206046', 'Handy Cam'),
(38, '3060101002', 'Audio Mixing Portable'),
(39, '3060101036', 'Microphone/Wireless MIC'),
(40, '3060101037', 'Microphone/Boom Stand'),
(41, '3060101088', 'Voice Recorder'),
(42, '3060102045', 'Tripod Camera'),
(43, '3060102061', 'Lensa Kamera'),
(44, '3060102069', 'Tele Recorder'),
(45, '3060102128', 'Camera Digital');

-- --------------------------------------------------------

--
-- Struktur dari tabel `datapegawai`
--

CREATE TABLE `datapegawai` (
  `id_data` int(4) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telpon` varchar(50) NOT NULL,
  `unit_kerja` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `datapegawai`
--

INSERT INTO `datapegawai` (`id_data`, `nama`, `nip`, `jabatan`, `email`, `telpon`, `unit_kerja`, `username`, `password`) VALUES
(5, 'Elga Ridlo Sinatriya', '3314131310950001', 'Kasubbag', 'elgaridlosinatriya@gmail.com', '082242633375', 'Subbag Umum dan TI', 'elga', '12345'),
(6, 'Isfan Azhabil', '3314131310950002', 'Jabatan Tertentu', 'habil@gmail.com', '08512356789', 'Subaud Jateng II', 'habil', '123456'),
(7, 'Fatchur Rochman', '3314131310950003', 'Jabatan Tertentu', 'Fatchur@gmail.com', '082242633371', 'Subaud Jateng I', 'fatchur', '123456'),
(8, 'Mala', '3314131310950005', 'Jabatan Tertentu', 'mala@gmail.com', '081234567890', 'Subbag Umum dan TI', 'mala', '123456'),
(10, 'Minarni', '3314131310950011', 'Kepala Perwakilan', 'minarni@gmail.com', '082242633322', 'Subaud Jateng I', 'minarni', '123456'),
(11, 'Nur Ida Anggari', '3314131310950016', 'Kasubaud', 'erry.eyie@gmail.com', '081123081296', 'Subaud Jateng III', 'erry', '123456'),
(12, 'Elham Febri Sinatriya', '3314131310950015', 'Jabatan Tertentu', 'Elham@gmail.com', '081123123123', 'Subbag Umum dan TI', 'elham', '123456'),
(13, 'Alvin Mubarak Nurga Sinatriya', '3314131310950020', 'Jabatan Tertentu', 'Alvin@gmail.com', '089999111333', 'Subbag Umum dan TI', 'alvin', '123456'),
(14, 'Sopo Prakasa', '3314131310950021', 'Jabatan Tertentu', 'Sopo@gmail.com', '081234234234', 'Subaud Jateng IV', 'sopo', '123456'),
(15, 'Coba Nur Rahman', '3314131310950100', 'Jabatan Tertentu', 'Coba@gmail.com', '081123123321', 'Subbag Umum dan TI', 'Coba12', '123456'),
(17, 'Coban Nur Rochman', '33141313109500111', 'Jabatan Tertentu', 'coban@gmail.com', '082321321321', 'Subbag Umum dan TI', 'coban', '123456');

-- --------------------------------------------------------

--
-- Struktur dari tabel `history`
--

CREATE TABLE `history` (
  `id_history` int(10) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `kode_jenis` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `unit_kerja` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `tipe_barang` varchar(50) NOT NULL,
  `jenis_barang` varchar(50) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `tanggal_dikembalikan` date NOT NULL,
  `nup` varchar(50) NOT NULL,
  `peruntukan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pinjaman`
--

CREATE TABLE `pinjaman` (
  `id_peminjam` int(4) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `kode_jenis` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `unit_kerja` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `tipe_barang` varchar(50) NOT NULL,
  `jenis_barang` varchar(50) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `nup` varchar(50) NOT NULL,
  `jumlah` int(4) UNSIGNED NOT NULL,
  `peruntukan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pinjaman`
--

INSERT INTO `pinjaman` (`id_peminjam`, `nip`, `kode_jenis`, `nama`, `unit_kerja`, `jabatan`, `tipe_barang`, `jenis_barang`, `tanggal_pinjam`, `tanggal_kembali`, `nup`, `jumlah`, `peruntukan`) VALUES
(1, '3314131310950001', '3030103001', 'Elga Ridlo Sinatriya', 'Subbag Umum dan TI', 'Kasubbag', 'Lenovo Charger', 'Battery Charge', '2018-10-20', '2018-10-31', '1111', 1, 'Buat Acara Makrab Bersama'),
(2, '3314131310950100', '3050206046', 'Coba Nur Rahman', 'Subbag Umum dan TI', 'Jabatan Tertentu', 'Canon HandyCam', 'Handy Cam', '2018-10-20', '2018-10-24', '1010', 1, 'Buat Seminar International'),
(3, '33141313109500111', '3050105048', 'Coban Nur Rochman', 'Subbag Umum dan TI', 'Jabatan Tertentu', 'Sony InfocusA12', 'LCD Projector/Infocus', '2018-10-20', '2018-10-24', '1234', 1, 'Buat Seminar International');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD UNIQUE KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `barang2`
--
ALTER TABLE `barang2`
  ADD UNIQUE KEY `id_kode` (`id_kode`),
  ADD UNIQUE KEY `kode_barang` (`kode_barang`,`jenis_barang`);

--
-- Indeks untuk tabel `datapegawai`
--
ALTER TABLE `datapegawai`
  ADD UNIQUE KEY `id_data` (`id_data`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `nip` (`nip`);

--
-- Indeks untuk tabel `history`
--
ALTER TABLE `history`
  ADD UNIQUE KEY `id_staff` (`id_history`);

--
-- Indeks untuk tabel `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD UNIQUE KEY `id_peminjam` (`id_peminjam`),
  ADD UNIQUE KEY `nup` (`nup`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `barang2`
--
ALTER TABLE `barang2`
  MODIFY `id_kode` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `datapegawai`
--
ALTER TABLE `datapegawai`
  MODIFY `id_data` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `history`
--
ALTER TABLE `history`
  MODIFY `id_history` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pinjaman`
--
ALTER TABLE `pinjaman`
  MODIFY `id_peminjam` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
