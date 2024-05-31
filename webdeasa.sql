-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2020 at 03:33 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webdeasa`
--

-- --------------------------------------------------------

--
-- Table structure for table `dana_desa`
--

CREATE TABLE `dana_desa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jumlah` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dana_desa`
--

INSERT INTO `dana_desa` (`id`, `jumlah`, `created_at`, `updated_at`) VALUES
(1, '10', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galery`
--

CREATE TABLE `galery` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `foto` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galery`
--

INSERT INTO `galery` (`id`, `foto`, `keterangan`, `created_at`, `updated_at`) VALUES
(7, '1581513955_bg_4.jpg', 'ajfla ksdf adlsfjk kladsfasdf', '2020-02-12 06:25:55', '2020-02-12 06:25:55'),
(8, '1581514013_honda_cbr_1100_rr_0057.jpg', 'fdsafsdfa', '2020-02-12 06:26:53', '2020-02-12 06:26:53'),
(9, '1581567375_2342554562.jpg', 'kof sajdfsdlf ldsfjasdlkfa dsfj asdlf', '2020-02-12 21:16:15', '2020-02-12 21:16:15');

-- --------------------------------------------------------

--
-- Table structure for table `grafik`
--

CREATE TABLE `grafik` (
  `id` int(11) NOT NULL,
  `opsi` varchar(100) NOT NULL,
  `lebel` varchar(100) NOT NULL,
  `nomor` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grafik`
--

INSERT INTO `grafik` (`id`, `opsi`, `lebel`, `nomor`, `created_at`, `updated_at`) VALUES
(4, 'penduduk', 'Laki-Laki', '2625', '2020-02-28 03:07:01', '2020-03-11 19:23:56'),
(17, 'mata pencarian', 'Buruh Tani', '375', '2020-03-01 20:43:08', '2020-03-01 20:43:08'),
(16, 'mata pencarian', 'Petani', '750', '2020-03-01 20:42:33', '2020-03-01 20:42:33'),
(9, 'penduduk', 'Perempuan', '2647', '2020-02-28 04:44:50', '2020-03-01 20:31:39'),
(13, 'pendidikan', 'SD', '45', '2020-03-01 20:37:22', '2020-03-01 20:54:08'),
(12, 'pendidikan', 'TK', '25', '2020-03-01 20:36:31', '2020-03-02 00:44:19'),
(19, 'pendidikan', 'SMA', '60', '2020-03-01 20:56:18', '2020-03-01 20:56:18'),
(14, 'pendidikan', 'Tamat SD', '40', '2020-03-01 20:39:12', '2020-03-01 20:54:39'),
(15, 'pendidikan', 'SMP', '85', '2020-03-01 20:40:00', '2020-03-06 20:37:14'),
(18, 'mata pencarian', 'PNS', '356', '2020-03-01 20:43:30', '2020-03-01 20:44:12'),
(20, 'pendidikan', 'Tamat SMA', '50', '2020-03-01 20:56:56', '2020-03-01 20:56:56'),
(21, 'pendidikan', 'D1', '16', '2020-03-01 20:57:26', '2020-03-01 20:57:26'),
(22, 'pendidikan', 'Tamat D1/Sederajat', '05', '2020-03-01 20:58:22', '2020-03-01 20:58:48'),
(23, 'pendidikan', 'D3', '05', '2020-03-01 20:59:16', '2020-03-01 20:59:16'),
(24, 'pendidikan', 'Tamat D3/Sederajat', '08', '2020-03-01 20:59:39', '2020-03-01 20:59:39'),
(25, 'pendidikan', 'S1', '47', '2020-03-01 21:00:08', '2020-03-01 21:00:08'),
(26, 'pendidikan', 'Tamat S1/Sederajat', '120', '2020-03-01 21:00:31', '2020-03-01 21:00:31'),
(27, 'pendidikan', 'Sarjana s2', '50', '2020-04-15 12:45:31', '2020-04-15 12:45:31'),
(28, 'agama', 'Islam', '500', '2020-04-16 06:20:17', '2020-04-16 06:20:17'),
(29, 'agama', 'Kristen', '400', '2020-04-16 06:20:34', '2020-04-16 06:20:34');

-- --------------------------------------------------------

--
-- Table structure for table `komentar_brita`
--

CREATE TABLE `komentar_brita` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `komentar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brita_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `komentar_brita`
--

INSERT INTO `komentar_brita` (`id`, `name`, `komentar`, `email`, `brita_id`, `waktu`, `created_at`, `updated_at`) VALUES
(3, 'fdafd', 'dsaffd', 'cfdsfd@gmail.com', '17', '4:32pm on Friday 26th June 2020', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_01_31_072035_create_products_table', 2),
(5, '2020_02_01_093929_create_table_brita_table', 3),
(6, '2020_02_01_103355_create_galery_table', 3),
(7, '2020_02_01_103528_create_potensi_desa_table', 3),
(8, '2020_02_01_103608_create_penduduk_table', 3),
(9, '2020_02_01_103713_create_dana_desa_table', 3),
(10, '2020_02_01_103755_create_structur_desa_table', 3),
(11, '2020_02_02_025500_create_pengluaran_dasa_table', 3),
(12, '2020_02_02_025512_create_pemasukan_desa_table', 3),
(13, '2014_10_12_000000_create_users_table', 4),
(14, '2020_02_12_014910_create_komentar_brita_table', 5),
(15, '2020_02_12_032630_create_slider_table', 6),
(16, '2020_02_12_052124_create_web_setting_table', 7),
(17, '2020_02_13_000130_create_quetes_table', 8),
(18, '2020_04_15_003233_create_table_services', 9);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pemasukan_desa`
--

CREATE TABLE `pemasukan_desa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sumber` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kondisi` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pemasukan_desa`
--

INSERT INTO `pemasukan_desa` (`id`, `keterangan`, `jumlah`, `tanggal`, `user_id`, `sumber`, `kondisi`, `created_at`, `updated_at`) VALUES
(3, 'karena anu', '1000', '2020-04-02', 'Refa walada', 'refa', 'keluar', '2020-04-09 14:03:35', '2020-04-09 14:03:35'),
(4, 'buat sosialisasi', '2000', '2020-04-13', 'Refa walada', 'warga desa', 'keluar', '2020-04-09 14:05:26', '2020-04-09 14:05:26'),
(5, 'tak tau', '3000', '2020-04-05', 'Refa walada', 'nanda', 'pemasukan', '2020-04-09 14:09:36', '2020-04-09 14:09:36'),
(6, 'buat makan', '6000', '2020-05-21', 'Refa walada', 'refa', 'keluar', '2020-04-10 20:52:19', '2020-04-10 20:52:19'),
(7, 'fdsa', '5000', '2020-05-04', 'Refa walada', 'rfa', 'keluar', '2020-04-10 20:53:43', '2020-04-10 20:53:43'),
(8, 'buat ngekos', '60000', '2020-01-21', 'Refa walada', 'bank bni', 'keluar', '2020-04-11 08:58:36', '2020-04-11 08:58:36'),
(9, 'tak tau', '600', '2020-01-15', 'Refa walada', 'bank ku', 'pemasukan', '2020-04-11 08:58:37', '2020-04-11 08:58:37'),
(10, 'buat ngekos', '60000', '2020-02-01', 'Refa walada', 'bank bni', 'pemasukan', '2020-04-11 19:44:00', '2020-04-11 19:44:00'),
(11, 'tak tau', '600', '2020-03-01', 'Refa walada', 'bank ku', 'pemasukan', '2020-04-11 19:44:00', '2020-04-11 19:44:00'),
(12, 'pemasukan dana desa', '5000000', '2020-04-09', 'Refa waalada', 'desa', 'pemasukan', '2020-04-15 12:47:00', '2020-04-15 12:47:00');

-- --------------------------------------------------------

--
-- Table structure for table `penduduk`
--

CREATE TABLE `penduduk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_lengkap` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_klamin` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tampat_lahir` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_kk` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penduduk`
--

INSERT INTO `penduduk` (`id`, `nama_lengkap`, `nik`, `jenis_klamin`, `tampat_lahir`, `tanggal_lahir`, `agama`, `pendidikan`, `pekerjaan`, `no_kk`, `created_at`, `updated_at`) VALUES
(3, 'Nur mustofa', '45713546', 'Laki-Laki', 'ponorogo pulung', '2000-02-18', 'islam', 's1', 'masih sekolah', '45637092', '2020-02-12 23:35:09', '2020-02-12 23:35:09'),
(4, 'awim al -farizi', '56279481', 'Laki-Laki', 'pnorgo.21.januari', '2000-02-04', 'islam', 's1', 'mangan', '62549283', '2019-06-11 23:43:24', '2020-02-12 23:43:24'),
(5, 'kanna wakh', '59469834', 'Perempuan', 'ponorogo pulung', '2020-02-18', 'kristen', 'afasd', 'fadsfasdf', '52424242', '2020-02-13 05:51:42', '2020-02-13 05:51:42'),
(6, 'cxvzsx', '25234554', 'Laki-Laki', 'dfsgsfd', '2020-02-19', 'kristen', 'dfasd', 'fasdfasdfdf', 'asdfasdf', '2020-02-13 05:53:23', '2020-02-13 05:53:23'),
(7, 'afdsfdsf', '52432442', 'Perempuan', 'dfsdfasdf', '2020-02-19', 'islam', 'fasdfasdfads', 'fadsfa', 'sdfasdfa', '2020-02-13 05:55:50', '2020-02-13 05:55:50');

-- --------------------------------------------------------

--
-- Table structure for table `pengluaran_dasa`
--

CREATE TABLE `pengluaran_dasa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sumber` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengluaran_dasa`
--

INSERT INTO `pengluaran_dasa` (`id`, `keterangan`, `jumlah`, `tanggal`, `user_id`, `sumber`, `created_at`, `updated_at`) VALUES
(1, 'modal usaha', '1000', '2020-FebFeb-07', 'Refa walada', 'refa walada', '2020-02-06 08:05:45', '2020-02-06 17:47:19'),
(2, 'pembuatan makanan', '24', '2020-FebFeb-11', 'Refa walada', 'refa', '2020-02-11 05:12:33', '2020-02-11 05:12:33');

-- --------------------------------------------------------

--
-- Table structure for table `potensi_desa`
--

CREATE TABLE `potensi_desa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_potensi` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `potensi_desa`
--

INSERT INTO `potensi_desa` (`id`, `nama_potensi`, `alamat`, `foto`, `keterangan`, `created_at`, `updated_at`) VALUES
(2, 'bfksahfla s', 'f qhdk', '1581596234_a5f72906945986a0ec2882d1287c10a9.jpg', 'fsadfsdf', '2020-02-04 06:39:26', '2020-02-13 05:17:14'),
(4, 'Perumahan', 'ponorogo sukorejo nambangrejo', '1581596208_2342554562.jpg', 'perumahan griya asa', '2020-02-12 17:38:09', '2020-02-13 05:16:48'),
(5, 'raffasd', 'dfafdsf', '1586265200_IMG_20170710_202617.jpg', 'fadsdff', '2020-04-07 20:12:46', '2020-04-07 20:13:20');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `detail`, `created_at`, `updated_at`) VALUES
(2, 'fadf', 'fda', '2020-01-31 00:37:18', '2020-01-31 00:37:18'),
(4, 'walada', 'koi', '2020-01-31 01:03:28', '2020-01-31 01:03:28'),
(5, 'rumah', 'fjladf', '2020-01-31 01:03:46', '2020-01-31 01:03:46'),
(7, 'fafd', 'fafad', '2020-01-31 05:34:14', '2020-01-31 05:34:14'),
(8, 'fa', 'fa', '2020-01-31 05:35:34', '2020-01-31 05:35:34'),
(9, 'fsa', 'faf', '2020-02-01 20:30:41', '2020-02-01 20:30:41'),
(10, 'tesfdsadf  ref', 'fadfaf', '2020-02-01 20:31:06', '2020-02-01 20:31:06');

-- --------------------------------------------------------

--
-- Table structure for table `quetes`
--

CREATE TABLE `quetes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `foto` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `penulis` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quetes`
--

INSERT INTO `quetes` (`id`, `foto`, `keterangan`, `penulis`, `created_at`, `updated_at`) VALUES
(1, '1581552909_michael-baird-GVcMijCwzoM-unsplash.jpg', 'hidup sekali hiudp lah yang berarti', 'Refa walada', '2020-02-12 17:15:09', '2020-02-12 17:15:09');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heding` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `heding2` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `heding`, `heding2`, `keterangan`, `foto`, `color`, `created_at`, `updated_at`) VALUES
(2, 'Desa Purbosuman', 'Desa Tengah Kota', 'Desa YangMempunyai banyak perumahan', '1581479297_harley-davidson-zGzXsJUBQfs-unsplash.jpg', '#00ffff', '2020-02-11 20:48:17', '2020-04-15 07:54:17'),
(6, 'Perumahan griya asa', 'bagus', 'sekf adfl adjf adjfa ljsdfl asdjlf', '1586912031_emma-francis-vpHCfunwDrQ-unsplash.jpg', '#ffffff', '2020-02-11 21:24:38', '2020-04-15 07:53:51');

-- --------------------------------------------------------

--
-- Table structure for table `struktur_desa`
--

CREATE TABLE `struktur_desa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `masa_jabatan` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `struktur_desa`
--

INSERT INTO `struktur_desa` (`id`, `nama`, `masa_jabatan`, `foto`, `jabatan`, `created_at`, `updated_at`) VALUES
(2, 'Muhammad Refa Walada Mushtofa', '2020-02-11---2020-02-02', '1581560066_6.png', 'kepala_desa', '2020-02-04 05:12:17', '2020-02-12 19:14:26'),
(3, 'Shinta natasa', '2020-02-11---2020-02-12', '1581564000_7.png', 'BPD', '2020-02-12 20:18:57', '2020-02-12 20:20:00'),
(4, 'Nur mustof', '2020-02-19---2020-02-10', '1581563975_9.png', 'SEKDES', '2020-02-12 20:19:35', '2020-02-12 20:19:35'),
(5, 'kopit pramudiatoro', '2020-02-05---2020-01-26', '1581564158_8.png', 'KADUS', '2020-02-12 20:22:38', '2020-02-12 20:22:38'),
(6, 'anggun rismayanto', '2020-04-06---2020-04-13', '1581564221_7.png', 'KAUR KEUANGAN', '2020-02-12 20:23:41', '2020-04-11 20:24:16'),
(7, 'Refa walada', '2020-04-06---2020-04-07', '1586929485_dom-hill-nimElTcTNyY-unsplash.jpg', 'KEPALA DESA', '2020-04-15 12:44:45', '2020-04-15 12:44:45');

-- --------------------------------------------------------

--
-- Table structure for table `table_brita`
--

CREATE TABLE `table_brita` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `views` int(30) DEFAULT NULL,
  `penulis` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_brita`
--

INSERT INTO `table_brita` (`id`, `judul`, `foto`, `keterangan`, `views`, `penulis`, `created_at`, `updated_at`) VALUES
(16, 'tes 123', '1586741316_Screenshot_20180804-165602.jpg', 'mau makan', 3, 'Refa walada', '2020-04-13 08:28:36', '2020-04-15 12:36:55'),
(17, 'berita sembuh corona', '1586929406_emma-francis-vpHCfunwDrQ-unsplash.jpg', 'alhamndulillah', 1, 'Refa waalada', '2020-04-15 12:43:26', '2020-06-26 23:31:56');

-- --------------------------------------------------------

--
-- Table structure for table `table_services`
--

CREATE TABLE `table_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `h1` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `username` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `username`, `role`) VALUES
(2, 'fasdf', NULL, 'fadf', '', NULL, NULL, 'fasd', 'fa'),
(3, 'Refa waalada', NULL, '$2y$10$ESBYFubGsSMaLWUv4mG2d.dz9zo8Q9IGRF3zR9jNM2G5wX3fR5z4i', NULL, '2020-02-01 21:08:00', '2020-04-15 12:41:44', 'U300', 'admin'),
(4, 'moyok', NULL, '$2y$10$nmf88GsMfs40AIbZINJJj.t6t5V3fxJz27y7viWkWsdlWuy6nQvWS', NULL, '2020-02-01 21:08:29', '2020-02-01 21:08:29', 'U400', 'admin'),
(7, 'siti', NULL, '$2y$10$gnows6nfY/SyQ4BfB3YwcOj73JDP4KOZxX3lhLK364R1gvnKjkONi', NULL, '2020-04-15 12:42:17', '2020-04-15 12:42:17', 'U500', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `web_setting`
--

CREATE TABLE `web_setting` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fb` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ig` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twiter` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cp` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tlp` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sejarah` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `web_setting`
--

INSERT INTO `web_setting` (`id`, `fb`, `ig`, `twiter`, `cp`, `alamat`, `email`, `tlp`, `logo`, `sejarah`, `created_at`, `updated_at`, `nama`) VALUES
(1, 'fb', 'ig', 'tw', 'refa', 'ponorogo jallan a', 'email', '5289073518', '1581489506_loc.png', 'se===', NULL, '2020-04-17 05:51:15', 'Nambangrejo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dana_desa`
--
ALTER TABLE `dana_desa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galery`
--
ALTER TABLE `galery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grafik`
--
ALTER TABLE `grafik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komentar_brita`
--
ALTER TABLE `komentar_brita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pemasukan_desa`
--
ALTER TABLE `pemasukan_desa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penduduk`
--
ALTER TABLE `penduduk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengluaran_dasa`
--
ALTER TABLE `pengluaran_dasa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `potensi_desa`
--
ALTER TABLE `potensi_desa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quetes`
--
ALTER TABLE `quetes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `struktur_desa`
--
ALTER TABLE `struktur_desa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_brita`
--
ALTER TABLE `table_brita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_services`
--
ALTER TABLE `table_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_setting`
--
ALTER TABLE `web_setting`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dana_desa`
--
ALTER TABLE `dana_desa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galery`
--
ALTER TABLE `galery`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `grafik`
--
ALTER TABLE `grafik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `komentar_brita`
--
ALTER TABLE `komentar_brita`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `pemasukan_desa`
--
ALTER TABLE `pemasukan_desa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `penduduk`
--
ALTER TABLE `penduduk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `pengluaran_dasa`
--
ALTER TABLE `pengluaran_dasa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `potensi_desa`
--
ALTER TABLE `potensi_desa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `quetes`
--
ALTER TABLE `quetes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `struktur_desa`
--
ALTER TABLE `struktur_desa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `table_brita`
--
ALTER TABLE `table_brita`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `table_services`
--
ALTER TABLE `table_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `web_setting`
--
ALTER TABLE `web_setting`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
