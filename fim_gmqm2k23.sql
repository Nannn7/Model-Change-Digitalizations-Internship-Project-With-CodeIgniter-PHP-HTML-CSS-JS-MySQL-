-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Agu 2024 pada 16.11
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fim_gmqm2k23`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `app_user`
--

CREATE TABLE `app_user` (
  `id` int(11) NOT NULL,
  `nrp` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL COMMENT '[1] -> Super Admin | [2] -> Operator Ganti Model | [3] -> Admin Quality | [4] -> In QC | [5] -> Otentikasi | [6] -> Admin ToolShop | [7] -> User Android ToolShop | [8] -> User Android GM',
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '[0] Tidak aktif | [1] Aktif',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `app_user`
--

INSERT INTO `app_user` (`id`, `nrp`, `nama`, `username`, `password`, `role`, `status`, `created_at`, `updated_at`) VALUES
(18, '3242', 'Admin Ganti Model', 'adm_gm', 'fim@2023', 2, 1, '2023-09-13 03:19:57', '2023-09-13 03:19:57'),
(19, '2131', 'Admin Quality', 'adm_qty', 'fim@2023', 3, 1, '2023-09-13 03:20:45', '2023-09-13 03:20:45'),
(21, '7199', 'Super Admin', 'sup_adm', 'fim@2023', 1, 1, '2023-09-13 03:37:02', '2023-10-26 02:54:49'),
(25, '3814', 'Operator', 'opr505', 'fim@2023', 4, 1, '2023-11-15 04:46:27', '2023-11-15 04:46:27'),
(31, '7131', 'Super Nan.', 'sup_nan', 'nowyouseeme7', 1, 1, NULL, NULL),
(34, '7777', 'Auth', 'auth', 'fim@2023', 5, 1, NULL, NULL),
(36, '8551', 'Admin ToolShop', 'adm_toolshop', 'fim@2024', 6, 1, NULL, NULL),
(37, '1211', 'User Android Toolshop', 'usr_toolshop', 'fim@2024', 7, 1, NULL, NULL),
(38, '8534', 'User Android GM', 'usr_gm', 'fim@2024', 8, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `idBarang` int(11) NOT NULL,
  `idPalet` int(11) DEFAULT NULL,
  `itemCode` varchar(45) DEFAULT NULL,
  `tanggalMasuk` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `createdBy` varchar(45) DEFAULT NULL,
  `createdDate` int(11) DEFAULT NULL,
  `modifiedBy` varchar(45) DEFAULT NULL,
  `modifiedDate` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `gantimodel`
--

CREATE TABLE `gantimodel` (
  `id_gm` int(11) NOT NULL,
  `line` varchar(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `start_gm` datetime DEFAULT NULL,
  `finish_gm` datetime DEFAULT NULL,
  `user_qc` varchar(255) NOT NULL,
  `pass_qc` varchar(255) NOT NULL,
  `user_del` varchar(255) NOT NULL,
  `pass_del` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `shift` int(11) NOT NULL COMMENT '[1] -> Shift 1 | [2] -> Shift 2 | [3] -> Shift 3'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `gantimodel`
--

INSERT INTO `gantimodel` (`id_gm`, `line`, `product`, `start_gm`, `finish_gm`, `user_qc`, `pass_qc`, `user_del`, `pass_del`, `created_at`, `updated_at`, `shift`) VALUES
(1, 'Line 1', 'K0JA', '2024-03-13 21:48:00', NULL, '', '', 'auth', 'fim@2023', NULL, NULL, 0),
(2, 'Line 26', 'K1ZG', '2024-03-20 21:55:00', NULL, '', '', 'auth', 'fim@2023', NULL, NULL, 0),
(3, 'Line 1', 'FIM-98', '2024-03-30 16:45:00', '2024-03-30 16:46:00', 'auth', 'fim@2023', '', '', NULL, NULL, 0),
(4, 'Line 1', 'FIM-98', '2024-03-30 17:31:00', NULL, '', '', 'auth', 'fim@2023', NULL, NULL, 0),
(5, 'Line 4', 'FIM-97', '2024-03-30 19:10:00', '2024-03-30 19:19:00', 'auth', 'fim@2023', '', '', NULL, NULL, 0),
(6, 'Line 1', 'K81', '2024-03-30 19:20:00', NULL, '', '', 'auth', 'fim@2023', NULL, NULL, 0),
(7, 'Line 6', 'K18A', '2024-06-14 14:25:00', NULL, '', '', 'auth', 'fim@2023', NULL, NULL, 0),
(8, 'Line 26', 'KZLN', '2024-06-17 20:45:00', '2024-07-04 08:08:00', 'auth', 'fim@2023', '', '', NULL, NULL, 0),
(9, 'Line 7', '4D56NS', '2024-07-04 10:08:00', '2024-07-14 20:24:00', 'auth', 'fim@2023', '', '', NULL, NULL, 0),
(10, 'Line 2', 'K81', '2024-07-14 20:27:00', '2024-08-26 13:21:00', 'auth', 'fim@2023', '', '', NULL, NULL, 0),
(11, 'Line 8', 'W04D', '2024-07-16 09:40:00', '2024-07-16 09:48:00', 'auth', 'fim@2023', '', '', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `historybarang`
--

CREATE TABLE `historybarang` (
  `idHistory` int(11) NOT NULL,
  `purchaseOrder` varchar(45) DEFAULT NULL,
  `deliveryNote` varchar(45) DEFAULT NULL,
  `idPalet` int(11) NOT NULL,
  `mainItemCode` varchar(45) NOT NULL,
  `itemCode` varchar(45) NOT NULL,
  `jumlahMasuk` int(11) NOT NULL,
  `jumlahKeluar` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `createdBy` varchar(45) DEFAULT NULL,
  `createdDate` datetime NOT NULL,
  `modifiedBy` varchar(45) DEFAULT NULL,
  `modifiedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `item`
--

CREATE TABLE `item` (
  `itemCode` varchar(45) NOT NULL,
  `itemName` varchar(45) NOT NULL,
  `jumlahItem` int(11) NOT NULL,
  `netQuantity` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `createdBy` varchar(45) NOT NULL,
  `createdDate` datetime NOT NULL,
  `modifiedBy` varchar(45) NOT NULL,
  `modifiedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `itemhistory`
--

CREATE TABLE `itemhistory` (
  `id` int(11) NOT NULL,
  `itemCode` varchar(45) NOT NULL,
  `jumlahSebelum` int(11) NOT NULL,
  `jumlahSesudah` int(11) NOT NULL,
  `createdBy` varchar(45) DEFAULT NULL,
  `createdDate` datetime NOT NULL,
  `modifiedBy` varchar(45) DEFAULT NULL,
  `modifiedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lemari`
--

CREATE TABLE `lemari` (
  `idLemari` int(11) NOT NULL,
  `deskripsiLemari` varchar(45) NOT NULL,
  `ukuranLemari` varchar(45) NOT NULL,
  `status` int(11) NOT NULL,
  `createdBy` varchar(45) NOT NULL,
  `createdDate` datetime NOT NULL,
  `modifiedBy` varchar(45) NOT NULL,
  `modifiedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `lemari`
--

INSERT INTO `lemari` (`idLemari`, `deskripsiLemari`, `ukuranLemari`, `status`, `createdBy`, `createdDate`, `modifiedBy`, `modifiedDate`) VALUES
(1, 'A', '3 x 6', 1, '', '2022-02-24 14:24:42', '', '2022-05-17 10:53:49'),
(2, 'B', '3 x 6', 1, '', '2022-02-24 14:24:42', '', '2022-02-24 14:24:42'),
(3, 'C', '3 X 6 ', 1, '', '2022-02-24 14:24:42', '', '2022-03-07 15:00:20'),
(4, 'D', '3 X 6', 1, '', '2022-02-24 14:24:42', '', '2022-02-24 14:24:42'),
(5, 'E', '3 X 6', 1, '', '2022-02-24 14:24:42', '', '2022-02-24 14:24:42'),
(6, 'F', '3 X 6', 1, '', '2022-02-24 14:24:42', '', '2022-02-24 14:24:42'),
(7, 'G', '3 X 7', 1, '', '2022-02-24 14:24:42', '', '2022-02-24 14:24:42'),
(8, 'H', '2 X 7 / 1 X 3', 1, '', '2022-02-24 14:24:42', '', '2022-02-24 14:24:42'),
(9, 'I', '1 X 6', 1, '', '2022-02-24 14:24:42', '', '2022-02-24 14:50:21'),
(10, 'J', '1 X 6', 1, '', '2022-02-24 14:24:42', '', '2022-02-24 15:57:11'),
(11, 'K', '1 X 6', 1, '', '2022-02-24 14:24:42', '', '2022-02-24 14:24:42'),
(12, 'L', '2 X 6 / 1 x 7', 1, '', '2022-02-24 14:24:42', '', '2022-06-14 10:24:27'),
(13, 'P', '4 X 6', 1, '', '2022-10-21 15:07:41', '', '2023-01-18 09:37:13'),
(14, 'Q', '4 X 5', 1, '', '2023-01-18 09:46:38', '', '2023-01-18 09:50:14'),
(15, 'R', '4 X 5', 1, '', '2023-01-18 09:50:05', '', '2023-01-18 09:50:22'),
(16, 'S', '4 X 4', 1, '', '2023-01-18 09:50:36', '', '0000-00-00 00:00:00'),
(17, 'TRY', '1 x 1', 1, '', '2023-06-28 11:33:09', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mainitem`
--

CREATE TABLE `mainitem` (
  `id` int(11) NOT NULL,
  `mainItemCode` varchar(45) NOT NULL,
  `mainItemName` varchar(45) NOT NULL,
  `itemCode` varchar(45) NOT NULL,
  `position` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `createdBy` varchar(45) NOT NULL,
  `createdDate` datetime NOT NULL,
  `modifiedBy` varchar(45) NOT NULL,
  `modifiedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `md_jig`
--

CREATE TABLE `md_jig` (
  `id` int(11) NOT NULL,
  `CodeJig` varchar(255) NOT NULL,
  `DetailJig` varchar(255) NOT NULL,
  `GambarJig` varchar(255) NOT NULL,
  `Mesin` varchar(255) DEFAULT NULL,
  `Lokasi` varchar(255) DEFAULT 'GM',
  `A` varchar(255) DEFAULT NULL,
  `B` varchar(255) DEFAULT NULL,
  `C` varchar(255) DEFAULT NULL,
  `D` varchar(255) DEFAULT NULL,
  `E` varchar(255) DEFAULT NULL,
  `F` varchar(255) DEFAULT NULL,
  `G` varchar(255) DEFAULT NULL,
  `H` varchar(255) DEFAULT NULL,
  `I` varchar(255) DEFAULT NULL,
  `J` varchar(255) DEFAULT NULL,
  `D1` varchar(255) DEFAULT NULL,
  `D2` varchar(255) DEFAULT NULL,
  `D3` varchar(255) DEFAULT NULL,
  `D4` varchar(255) DEFAULT NULL,
  `D5` varchar(255) DEFAULT NULL,
  `D6` varchar(255) DEFAULT NULL,
  `D7` varchar(255) DEFAULT NULL,
  `D8` varchar(255) DEFAULT NULL,
  `Status` int(11) NOT NULL COMMENT '[0] -> Disposal | [1] -> Aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `md_jig`
--

INSERT INTO `md_jig` (`id`, `CodeJig`, `DetailJig`, `GambarJig`, `Mesin`, `Lokasi`, `A`, `B`, `C`, `D`, `E`, `F`, `G`, `H`, `I`, `J`, `D1`, `D2`, `D3`, `D4`, `D5`, `D6`, `D7`, `D8`, `Status`) VALUES
(1, 'J01L4PHR001', 'Jig untuk proses PHR line 4', 'kursus-gambar-teknik.jpg', '5', 'Line 4', '5.5', '0,0001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `md_line`
--

CREATE TABLE `md_line` (
  `id` int(11) NOT NULL,
  `nama_line` varchar(255) NOT NULL,
  `status_line` int(11) NOT NULL DEFAULT 1 COMMENT '[0] Tidak aktif | [1] Aktif',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `md_line`
--

INSERT INTO `md_line` (`id`, `nama_line`, `status_line`, `created_at`, `updated_at`) VALUES
(1, 'Line 1', 1, NULL, '2023-09-14 07:50:31'),
(2, 'Line 2', 1, NULL, '2023-09-14 07:50:54'),
(3, 'Line 3', 1, '2023-09-14 07:02:26', '2023-09-14 07:48:27'),
(4, 'Line 4', 1, '2023-09-14 07:04:37', '2023-09-14 07:48:45'),
(5, 'Line 5', 1, '2023-09-14 07:06:51', '2023-09-14 08:52:04'),
(6, 'Line 6', 1, '2023-09-18 03:26:23', '2023-09-18 03:26:23'),
(7, 'Line 7', 1, '2023-09-18 03:26:35', '2023-09-18 03:26:35'),
(8, 'Line 8', 1, '2023-09-18 03:26:46', '2023-09-18 03:26:46'),
(9, 'Line 9', 1, '2023-09-18 03:28:08', '2023-09-18 03:28:08'),
(10, 'Line 10', 1, '2023-09-18 03:30:49', '2023-09-18 03:30:49'),
(11, 'Line 11', 1, '2023-09-18 03:35:09', '2023-09-18 03:35:09'),
(12, 'Line 12', 1, '2023-09-18 03:35:23', '2023-09-18 03:35:23'),
(13, 'Line 13', 1, '2023-09-18 03:35:36', '2023-09-18 03:35:36'),
(14, 'Line 14', 1, '2023-09-18 03:35:50', '2023-09-18 03:35:50'),
(15, 'Line 15', 1, '2023-09-18 03:36:57', '2023-09-18 03:36:57'),
(16, 'Line 16', 1, '2023-09-18 03:37:12', '2023-09-18 03:37:12'),
(17, 'Line 17', 1, '2023-09-18 03:37:23', '2023-09-18 03:37:23'),
(18, 'Line 18', 1, '2023-09-18 03:37:41', '2023-09-18 03:37:41'),
(19, 'Line 19', 1, '2023-09-18 03:38:10', '2023-09-18 03:38:10'),
(20, 'Line 20', 1, '2023-09-18 03:38:25', '2023-09-18 03:38:25'),
(21, 'Line 21', 1, '2023-09-18 03:38:58', '2023-09-18 03:38:58'),
(22, 'Line 22', 1, '2023-09-18 03:48:10', '2023-09-18 03:48:10'),
(23, 'Line 23', 1, '2023-09-18 03:48:24', '2023-09-18 03:48:24'),
(24, 'Line 24', 1, '2023-09-18 03:49:00', '2023-09-18 03:49:00'),
(25, 'Line 25', 1, '2023-09-18 03:49:24', '2023-09-18 03:49:24'),
(26, 'Line 26', 1, '2023-09-18 03:52:07', '2023-09-18 03:52:07'),
(27, 'Line 27', 1, '2023-09-18 03:52:17', '2023-09-18 03:52:17'),
(28, 'Line 28', 1, '2023-09-18 03:52:30', '2023-09-18 03:52:30'),
(29, 'Line 29', 1, '2023-09-18 03:52:41', '2023-09-18 03:52:41'),
(30, 'Line 30', 1, '2023-09-18 03:53:00', '2023-09-18 03:53:00'),
(31, 'Line 31', 1, '2023-09-18 03:58:07', '2023-09-18 03:58:07'),
(32, 'Line 32', 1, '2023-09-18 03:58:33', '2023-09-18 03:58:33'),
(33, 'Line 33', 1, '2023-09-18 03:58:57', '2023-09-18 03:58:57'),
(34, 'Line 34', 1, '2023-09-18 04:03:07', '2023-09-18 04:03:07'),
(35, 'Line 35', 1, '2023-09-18 04:03:26', '2023-09-18 04:03:26'),
(36, 'Line Showa', 1, '2023-09-18 04:04:17', '2023-09-18 04:04:17'),
(37, 'Line Kayaba', 0, '2023-09-18 04:04:49', '2023-09-18 04:04:49'),
(38, 'Line NP-1', 1, '2023-09-18 04:05:22', '2023-09-18 04:05:22'),
(39, 'Line NP-4', 1, '2023-09-18 04:05:48', '2023-09-18 04:05:48'),
(42, 'Line NP-2', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `md_mesin`
--

CREATE TABLE `md_mesin` (
  `id` int(11) NOT NULL,
  `namaMesin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `md_mesin`
--

INSERT INTO `md_mesin` (`id`, `namaMesin`) VALUES
(1, 'GBR'),
(2, 'GBF'),
(3, 'Torenga'),
(4, 'RT'),
(5, 'PHR'),
(6, 'DOH'),
(7, 'FTRG'),
(8, 'VALVE'),
(9, 'COMBUSTION'),
(10, 'ARG'),
(11, 'ODF'),
(12, 'CBC');

-- --------------------------------------------------------

--
-- Struktur dari tabel `md_product`
--

CREATE TABLE `md_product` (
  `id` int(11) NOT NULL,
  `line` varchar(255) DEFAULT NULL,
  `nama_produk` varchar(255) DEFAULT NULL,
  `status_produk` int(11) NOT NULL DEFAULT 1 COMMENT '[0] Tidak aktif | [1] Aktif',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `md_product`
--

INSERT INTO `md_product` (`id`, `line`, `nama_produk`, `status_produk`, `created_at`, `updated_at`) VALUES
(70, 'Line 1', 'KVBF', 1, '2023-09-18 06:25:48', '2023-09-18 06:25:48'),
(71, 'Line 1', 'K81', 1, '2023-09-18 06:26:35', '2023-09-18 06:26:35'),
(72, 'Line 1', 'KWBF', 1, '2023-09-18 06:32:40', '2023-09-18 06:32:40'),
(73, 'Line 1', 'KVYG', 1, '2023-09-18 06:44:50', '2023-09-18 06:44:50'),
(74, 'Line 1', 'K48A', 1, '2023-09-18 06:45:16', '2023-09-18 06:45:16'),
(75, 'Line 1', 'K0JA', 1, '2023-09-18 06:45:40', '2023-09-18 06:45:40'),
(76, 'Line 1', 'FIM-98', 1, '2023-09-18 06:45:59', '2023-09-18 06:45:59'),
(77, 'Line 2', 'K48', 1, '2023-09-18 06:46:42', '2023-09-18 06:46:42'),
(78, 'Line 2', 'K81', 1, '2023-09-18 06:47:02', '2023-09-18 06:47:02'),
(79, 'Line 2', 'K0JA', 1, '2023-09-18 06:47:18', '2023-09-18 06:47:18'),
(80, 'Line 3', '4JA90L', 1, '2023-09-18 06:48:07', '2023-09-18 06:48:07'),
(81, 'Line 3', '4JA1', 1, '2023-09-18 06:48:40', '2023-09-18 06:48:40'),
(82, 'Line 3', '4JB1', 1, '2023-09-18 06:49:00', '2023-09-18 06:49:20'),
(83, 'Line 3', 'C223', 1, '2023-09-18 06:49:59', '2023-09-18 06:49:59'),
(84, 'Line 3', 'NE6T', 1, '2023-09-18 06:50:52', '2023-09-18 06:50:52'),
(85, 'Line 3', 'FE6', 1, '2023-09-18 06:51:18', '2023-09-18 06:51:18'),
(86, 'Line 3', '4D31', 1, '2023-09-18 06:51:52', '2023-09-18 06:51:52'),
(87, 'Line 3', '4D34', 1, '2023-09-18 07:06:41', '2023-09-18 07:06:41'),
(88, 'Line 3', '4D33', 1, '2023-09-18 07:07:04', '2023-09-18 07:07:04'),
(89, 'Line 3', '6D16T', 1, '2023-09-18 07:08:09', '2023-09-18 07:08:09'),
(90, 'Line 3', '6D16BM', 1, '2023-09-18 07:08:31', '2023-09-18 07:08:31'),
(91, 'Line 3', '4D56NSL', 1, '2023-09-18 07:09:07', '2023-09-18 07:09:07'),
(92, 'Line 3', 'TF85', 1, '2023-09-18 07:09:39', '2023-09-18 07:09:39'),
(93, 'Line 4', 'FIM-97', 1, '2023-09-18 07:11:18', '2023-09-18 07:11:18'),
(94, 'Line 4', 'KFV', 1, '2023-09-18 07:12:25', '2023-09-18 07:12:25'),
(95, 'Line 4', 'KPHF', 1, '2023-09-18 07:18:27', '2023-09-18 07:18:27'),
(96, 'Line 4', 'K81', 1, '2023-09-18 07:18:53', '2023-09-18 07:18:53'),
(97, 'Line 4', 'K0JA', 1, '2023-09-18 07:19:29', '2023-09-18 07:19:29'),
(98, 'Line 4', 'FIM-36', 1, '2023-09-18 07:42:21', '2023-09-18 07:42:21'),
(99, 'Line 4', 'FIM-39', 1, '2023-09-18 07:42:41', '2023-09-18 07:42:41'),
(100, 'Line 4', 'FIM-77', 1, '2023-09-18 07:43:06', '2023-09-18 07:43:06'),
(101, 'Line 4', 'FIM-82', 1, '2023-09-18 07:43:25', '2023-09-18 07:43:25'),
(102, 'Line 4', 'FIM-92', 1, '2023-09-18 07:43:42', '2023-09-18 07:43:42'),
(103, 'Line 4', 'FIM-97', 1, '2023-09-18 07:44:22', '2023-09-18 07:44:22'),
(104, 'Line 5', 'K56A', 1, '2023-09-18 07:45:26', '2023-09-18 07:45:26'),
(105, 'Line 5', 'K41A', 1, '2023-09-18 08:01:21', '2023-09-18 08:01:21'),
(106, 'Line 5', 'K48A', 1, '2023-09-18 08:01:50', '2023-09-18 08:01:50'),
(107, 'Line 5', 'K81A', 1, '2023-09-18 08:06:55', '2023-09-18 08:06:55'),
(108, 'Line 5', 'FIM-78', 1, '2023-09-18 08:07:42', '2023-09-18 08:07:42'),
(109, 'Line 5', 'FIM-97', 1, '2023-09-18 08:21:18', '2023-09-18 08:21:18'),
(110, 'Line 6', '5MX', 1, '2023-09-18 08:26:06', '2023-09-18 08:26:06'),
(111, 'Line 6', 'KVBF', 1, '2023-09-18 08:31:03', '2023-09-18 08:31:03'),
(112, 'Line 6', 'KVYG', 1, '2023-09-18 08:31:23', '2023-09-18 08:31:23'),
(113, 'Line 6', 'KYEA', 1, '2023-09-18 08:31:43', '2023-09-18 08:31:43'),
(114, 'Line 6', 'KZLN', 1, '2023-09-18 08:32:05', '2023-09-18 08:32:05'),
(115, 'Line 6', 'K18A', 1, '2023-09-18 08:40:36', '2023-09-18 08:40:36'),
(116, 'Line 6', 'K0JA', 1, '2023-09-18 08:40:57', '2023-09-18 08:40:57'),
(117, 'Line 7', '4D56SL', 1, '2023-09-18 08:42:29', '2023-09-18 08:42:29'),
(118, 'Line 7', '4D56NS', 1, '2023-09-18 08:43:02', '2023-09-18 08:43:02'),
(119, 'Line 7', 'L300', 1, '2023-09-18 08:43:32', '2023-09-18 08:43:32'),
(120, 'Line 8', 'W04D', 1, '2023-09-19 00:37:14', '2023-09-19 00:37:14'),
(121, 'Line 8', 'RD85', 1, '2023-09-19 00:38:29', '2023-09-19 00:38:29'),
(122, 'Line 8', '4D34', 1, '2023-09-19 00:39:30', '2023-09-19 00:40:08'),
(123, 'Line 8', '4D34T6', 1, '2023-09-19 00:41:25', '2023-09-19 00:41:25'),
(124, 'Line 8', '4D31', 1, '2023-09-19 00:42:23', '2023-09-19 00:42:23'),
(125, 'Line 8', 'H07D', 1, '2023-09-19 00:43:04', '2023-09-19 00:43:04'),
(126, 'Line 8', '4D33', 1, '2023-09-19 00:43:51', '2023-09-19 00:43:51'),
(127, 'Line 8', '6D16T', 1, '2023-09-19 00:45:09', '2023-09-19 00:45:09'),
(128, 'Line 8', '6D16FM/BM', 1, '2023-09-19 00:45:55', '2023-09-19 00:45:55'),
(129, 'Line 8', '4HG', 1, '2023-09-19 00:47:58', '2023-09-19 00:47:58'),
(130, 'Line 9', '4ST1', 1, '2023-09-19 00:49:41', '2023-09-19 00:49:41'),
(131, 'Line 9', 'GN5', 1, '2023-09-19 00:50:21', '2023-09-19 00:50:21'),
(132, 'Line 9', 'GF6', 1, '2023-09-19 00:51:27', '2023-09-19 00:51:27'),
(133, 'Line 9', 'KVYG', 1, '2023-09-19 00:52:04', '2023-09-19 00:52:04'),
(134, 'Line 9', 'KVYP', 1, '2023-09-19 00:53:28', '2023-09-19 00:53:28'),
(135, 'Line 9', 'KZLN', 1, '2023-09-19 00:55:55', '2023-09-19 00:55:55'),
(136, 'Line 9', 'K81', 1, '2023-09-19 00:58:04', '2023-09-19 00:58:04'),
(137, 'Line 9', 'K0JA', 1, '2023-09-19 00:58:54', '2023-09-19 00:58:54'),
(138, 'Line 9', 'K48', 1, '2023-09-19 00:59:37', '2023-09-19 00:59:37'),
(139, 'Line 9', 'XB 511', 1, '2023-09-19 01:00:36', '2023-09-19 01:00:36'),
(140, 'Line 9', 'FD110', 1, '2023-09-19 01:01:07', '2023-09-19 01:01:07'),
(141, 'Line 9', '3XA', 1, '2023-09-19 01:01:46', '2023-09-19 01:01:46'),
(142, 'Line 9', '4X8', 1, '2023-09-19 01:02:34', '2023-09-19 01:02:34'),
(143, 'Line 9', 'FIM-43', 1, '2023-09-19 01:05:07', '2023-09-19 01:05:07'),
(144, 'Line 9', 'FIM-44', 1, '2023-09-19 01:05:50', '2023-09-19 01:05:50'),
(145, 'Line 9', 'FIM-74', 1, '2023-09-19 01:06:28', '2023-09-19 01:06:28'),
(146, 'Line 9', 'FIM-83', 1, '2023-09-19 01:10:25', '2023-09-19 01:10:25'),
(147, 'Line 10', '4G15', 1, '2023-09-19 01:34:27', '2023-09-19 01:34:27'),
(148, 'Line 10', '4G17', 1, '2023-09-19 01:35:49', '2023-09-19 01:35:49'),
(149, 'Line 10', 'AN112R', 1, '2023-09-19 01:36:16', '2023-09-19 01:36:16'),
(150, 'Line 10', '4ST1', 1, '2023-09-19 01:37:11', '2023-09-19 01:37:11'),
(151, 'Line 10', 'KVYG', 1, '2023-09-19 01:37:35', '2023-09-19 01:37:35'),
(152, 'Line 10', 'Y9B', 1, '2023-09-19 01:40:28', '2023-09-19 01:40:28'),
(153, 'Line 10', 'YC7', 1, '2023-09-19 01:40:54', '2023-09-19 01:40:54'),
(154, 'Line 10', 'Y80', 1, '2023-09-19 01:41:18', '2023-09-19 01:41:18'),
(155, 'Line 10', 'GF6', 1, '2023-09-19 01:42:04', '2023-09-19 01:42:04'),
(156, 'Line 10', 'GN5', 1, '2023-09-19 01:44:37', '2023-09-19 01:44:37'),
(157, 'Line 10', '45P', 1, '2023-09-19 01:45:36', '2023-09-19 01:45:36'),
(158, 'Line 10', '5BP', 1, '2023-09-19 01:55:55', '2023-09-19 01:55:55'),
(159, 'Line 10', 'DZ06', 1, '2023-09-19 02:01:57', '2023-09-19 02:01:57'),
(160, 'Line 10', 'DZ07', 1, '2023-09-19 02:03:16', '2023-09-19 02:03:16'),
(161, 'Line 10', 'DZ08', 1, '2023-09-19 02:03:56', '2023-09-19 02:03:56'),
(162, 'Line 10', 'KEH6', 1, '2023-09-19 02:04:25', '2023-09-19 02:04:25'),
(163, 'Line 10', 'FIM-11', 1, '2023-09-19 02:05:08', '2023-09-19 02:05:08'),
(164, 'Line 10', 'FIM-12', 1, '2023-09-19 02:05:37', '2023-09-19 02:05:37'),
(165, 'Line 10', 'FIM-13', 1, '2023-09-19 02:06:38', '2023-09-19 02:06:38'),
(166, 'Line 10', 'FIM-30', 1, '2023-09-19 02:10:39', '2023-09-19 02:10:39'),
(167, 'Line 10', 'FIM-50', 1, '2023-09-19 02:17:28', '2023-09-19 02:17:28'),
(168, 'Line 10', 'FIM-51', 1, '2023-09-19 02:18:21', '2023-09-19 02:18:21'),
(169, 'Line 10', 'FIM-G2', 1, '2023-09-19 02:41:38', '2023-09-19 02:41:38'),
(170, 'Line 10', 'FIM-G3', 1, '2023-09-19 02:42:10', '2023-09-19 02:42:10'),
(171, 'Line 10', 'FIM-G5', 1, '2023-09-19 02:42:47', '2023-09-19 02:42:47'),
(172, 'Line 11', 'K81', 1, '2023-09-19 02:45:45', '2023-09-19 02:45:45'),
(173, 'Line 11', 'K59', 1, '2023-09-19 02:46:30', '2023-09-19 02:46:30'),
(174, 'Line 11', 'K59A', 1, '2023-09-19 02:46:59', '2023-09-19 02:46:59'),
(175, 'Line 11', 'K18', 1, '2023-09-19 02:48:01', '2023-09-19 02:48:01'),
(176, 'Line 11', 'K56A', 1, '2023-09-19 02:49:09', '2023-09-19 02:49:09'),
(177, 'Line 11', 'K97A', 1, '2023-09-19 02:49:31', '2023-09-19 02:49:31'),
(178, 'Line 11', 'KYEA', 1, '2023-09-19 02:50:07', '2023-09-19 02:50:07'),
(179, 'Line 11', 'XA681', 1, '2023-09-19 03:04:22', '2023-09-19 03:04:22'),
(180, 'Line 11', 'XC231RM', 1, '2023-09-19 03:06:29', '2023-09-19 03:06:29'),
(181, 'Line 11', '45P', 1, '2023-09-19 03:31:09', '2023-09-19 03:31:09'),
(182, 'Line 11', 'FIM-34', 1, '2023-09-19 03:32:08', '2023-09-19 03:32:08'),
(183, 'Line 11', 'FIM-72', 1, '2023-09-19 03:33:21', '2023-09-19 03:33:21'),
(184, 'Line 11', 'FIM-73', 1, '2023-09-19 03:34:45', '2023-09-19 03:34:45'),
(185, 'Line 11', 'FIM-78', 1, '2023-09-19 03:35:28', '2023-09-19 03:35:28'),
(186, 'Line 11', 'FIM-79', 1, '2023-09-19 03:36:13', '2023-09-19 03:36:13'),
(187, 'Line 11', 'FIM-80', 1, '2023-09-19 03:36:45', '2023-09-19 03:36:45'),
(188, 'Line 11', 'FIM-84', 1, '2023-09-19 03:51:58', '2023-09-19 03:51:58'),
(189, 'Line 11', 'FIM-86', 1, '2023-09-19 03:52:55', '2023-09-19 03:52:55'),
(190, 'Line 11', 'FIM-88', 1, '2023-09-19 03:54:37', '2023-09-19 03:54:37'),
(191, 'Line 11', 'FIM-95', 1, '2023-09-19 03:55:06', '2023-09-19 03:55:06'),
(192, 'Line 12', '3SO', 1, '2023-09-19 03:57:42', '2023-09-19 03:57:42'),
(193, 'Line 12', 'K0JA', 1, '2023-09-19 03:59:50', '2023-09-19 03:59:50'),
(194, 'Line 12', '5D9NR', 1, '2023-09-19 04:00:26', '2023-09-19 04:00:26'),
(195, 'Line 12', '5MX', 1, '2023-09-19 04:03:01', '2023-09-19 04:03:01'),
(196, 'Line 12', 'K81', 1, '2023-09-19 04:11:31', '2023-09-19 04:11:31'),
(197, 'Line 13', '5D9NR', 1, NULL, NULL),
(198, 'Line 13', 'AN112R', 1, NULL, NULL),
(199, 'Line 13', '3SO1', 1, NULL, NULL),
(200, 'Line 13', 'XC601', 1, NULL, NULL),
(201, 'Line 13', 'XB 511', 1, NULL, NULL),
(202, 'Line 13', 'XC231', 1, NULL, NULL),
(203, 'Line 13', 'XC321S', 1, NULL, NULL),
(204, 'Line 13', 'XA681', 1, NULL, NULL),
(205, 'Line 13', 'FIM-2', 1, NULL, NULL),
(206, 'Line 13', 'FIM-40XB', 1, NULL, NULL),
(207, 'Line 13', 'FIM-47', 1, NULL, NULL),
(208, 'Line 13', 'FIM-48', 1, NULL, NULL),
(209, 'Line 13', 'FIM-52', 1, NULL, NULL),
(210, 'Line 13', 'FIM-53', 1, NULL, NULL),
(211, 'Line 13', 'FIM-54', 1, NULL, NULL),
(212, 'Line 13', 'FIM-56', 1, NULL, NULL),
(213, 'Line 13', 'FIM-68', 1, NULL, NULL),
(214, 'Line 13', 'FIM-69', 1, NULL, NULL),
(215, 'Line 13', 'FIM-74XB', 1, NULL, NULL),
(216, 'Line 13', 'FIM-76', 1, NULL, NULL),
(217, 'Line 13', 'FIM-94', 1, NULL, NULL),
(218, 'Line 13', 'FIM-97XB', 1, NULL, NULL),
(219, 'Line 14', 'K81', 1, NULL, NULL),
(220, 'Line 14', 'KPHF', 1, NULL, NULL),
(221, 'Line 14', 'KA110', 1, NULL, NULL),
(222, 'Line 14', 'AN112R', 1, NULL, NULL),
(223, 'Line 14', 'K0JA', 1, NULL, NULL),
(224, 'Line 14', '3KA', 1, NULL, NULL),
(225, 'Line 14', '3XA', 1, NULL, NULL),
(226, 'Line 14', 'FIM-44', 1, NULL, NULL),
(227, 'Line 14', 'FIM-97', 1, NULL, NULL),
(228, 'Line 14', 'FIM-74', 1, NULL, NULL),
(229, 'Line 15', 'D79F', 1, NULL, NULL),
(230, 'Line 15', 'D16D', 1, NULL, NULL),
(231, 'Line 15', 'FIM-G1', 1, NULL, NULL),
(232, 'Line 15', 'KZLN', 1, NULL, NULL),
(233, 'Line 15', 'KWN', 1, NULL, NULL),
(234, 'Line 15', 'KWCA', 1, NULL, NULL),
(235, 'Line 15', 'K0825', 1, NULL, NULL),
(236, 'Line 15', 'Y4L', 1, NULL, NULL),
(237, 'Line 15', 'K15A', 1, NULL, NULL),
(238, 'Line 15', 'K41A', 1, NULL, NULL),
(239, 'Line 15', 'FIM-31', 1, NULL, NULL),
(240, 'Line 15', 'FIM-58', 1, NULL, NULL),
(241, 'Line 15', 'FIM-81', 1, NULL, NULL),
(242, 'Line 15', 'FIM-85', 1, NULL, NULL),
(243, 'Line 15', 'FIM-90', 1, NULL, NULL),
(244, 'Line 16', 'KVBF', 1, NULL, NULL),
(245, 'Line 16', 'KZLN', 1, NULL, NULL),
(246, 'Line 16', 'KWBF', 1, NULL, NULL),
(247, 'Line 16', 'K03T', 1, NULL, NULL),
(248, 'Line 16', 'KWWM', 1, NULL, NULL),
(249, 'Line 16', 'KPHF', 1, NULL, NULL),
(250, 'Line 16', 'FIM-41', 1, NULL, NULL),
(251, 'Line 16', 'FIM-42', 1, NULL, NULL),
(252, 'Line 16', 'FIM-77', 1, NULL, NULL),
(253, 'Line 16', 'FIM-92', 1, NULL, NULL),
(254, 'Line 17', '4ST1', 1, NULL, NULL),
(255, 'Line 17', 'KFV', 1, NULL, NULL),
(256, 'Line 17', '5MX', 1, NULL, NULL),
(257, 'Line 17', 'FD110', 1, NULL, NULL),
(258, 'Line 17', 'XB 511', 1, NULL, NULL),
(259, 'Line 18', 'KVYP', 1, NULL, NULL),
(260, 'Line 18', '5YC', 1, NULL, NULL),
(261, 'Line 18', '5EA', 1, NULL, NULL),
(262, 'Line 19', 'K81', 1, NULL, NULL),
(263, 'Line 19', 'K1ZG', 1, NULL, NULL),
(264, 'Line 19', 'K97', 1, NULL, NULL),
(265, 'Line 19', 'K59', 1, NULL, NULL),
(266, 'Line 20', '4D34T6', 1, NULL, NULL),
(267, 'Line 20', 'K0JA', 1, NULL, NULL),
(268, 'Line 21', 'K03T', 1, NULL, NULL),
(269, 'Line 21', 'KYZA', 1, NULL, NULL),
(270, 'Line 21', 'K41', 1, NULL, NULL),
(271, 'Line 21', 'K81', 1, NULL, NULL),
(272, 'Line 21', 'K48', 1, NULL, NULL),
(273, 'Line 21', 'KWBF', 1, NULL, NULL),
(274, 'Line 21', '45P', 1, NULL, NULL),
(275, 'Line 21', 'FIM-30', 1, NULL, NULL),
(276, 'Line 21', 'FIM-97', 1, NULL, NULL),
(277, 'Line 21', 'FIM-74', 1, NULL, NULL),
(278, 'Line 21', 'FIM-98XB', 1, NULL, NULL),
(279, 'Line 22', 'K59', 1, NULL, NULL),
(280, 'Line 22', 'K97', 1, NULL, NULL),
(281, 'Line 22', 'K15A', 1, NULL, NULL),
(282, 'Line 22', 'KWN', 1, NULL, NULL),
(283, 'Line 22', 'KWCA', 1, NULL, NULL),
(284, 'Line 22', 'K1ZG', 1, NULL, NULL),
(285, 'Line 22', 'K9016', 1, NULL, NULL),
(286, 'Line 22', 'K0825', 1, NULL, NULL),
(287, 'Line 22', '45P', 1, NULL, NULL),
(288, 'Line 22', 'FIM-31', 1, NULL, NULL),
(289, 'Line 22', 'FIM-70', 1, NULL, NULL),
(290, 'Line 22', 'FIM-90', 1, NULL, NULL),
(291, 'Line 22', 'FIM-91', 1, NULL, NULL),
(292, 'Line 22', 'FIM-99', 1, NULL, NULL),
(293, 'Line 23', 'K59', 1, NULL, NULL),
(294, 'Line 23', '3S01', 1, NULL, NULL),
(295, 'Line 23', 'KVBF', 1, NULL, NULL),
(296, 'Line 23', 'K0JA', 1, NULL, NULL),
(297, 'Line 23', 'K56A', 1, NULL, NULL),
(298, 'Line 23', 'FIM-2', 1, NULL, NULL),
(299, 'Line 23', 'FIM-40XB', 1, NULL, NULL),
(300, 'Line 23', 'FIM-47', 1, NULL, NULL),
(301, 'Line 23', 'FIM-52', 1, NULL, NULL),
(302, 'Line 23', 'FIM-53', 1, NULL, NULL),
(303, 'Line 23', 'FIM-54', 1, NULL, NULL),
(304, 'Line 23', 'FIM-55', 1, NULL, NULL),
(305, 'Line 23', 'FIM-58', 1, NULL, NULL),
(306, 'Line 23', 'FIM-72', 1, NULL, NULL),
(307, 'Line 23', 'FIM-73', 1, NULL, NULL),
(308, 'Line 23', 'FIM-74', 1, NULL, NULL),
(309, 'Line 23', 'FIM-75', 1, NULL, NULL),
(310, 'Line 23', 'FIM-76', 1, NULL, NULL),
(311, 'Line 23', 'FIM-78', 1, NULL, NULL),
(312, 'Line 23', 'FIM-80', 1, NULL, NULL),
(313, 'Line 23', 'FIM-81', 1, NULL, NULL),
(314, 'Line 23', 'FIM-82', 1, NULL, NULL),
(315, 'Line 23', 'FIM-85', 1, NULL, NULL),
(316, 'Line 23', 'FIM-88', 1, NULL, NULL),
(317, 'Line 23', 'FIM-90', 1, NULL, NULL),
(318, 'Line 23', 'FIM-91', 1, NULL, NULL),
(319, 'Line 24', 'K84', 1, NULL, NULL),
(320, 'Line 24', 'KYEA', 1, NULL, NULL),
(321, 'Line 24', 'K81', 1, NULL, NULL),
(322, 'Line 24', 'XD831', 1, NULL, NULL),
(323, 'Line 24', 'XD832', 1, NULL, NULL),
(324, 'Line 24', 'XE517', 1, NULL, NULL),
(325, 'Line 24', 'XE511', 1, NULL, NULL),
(326, 'Line 24', 'XE351', 1, NULL, NULL),
(327, 'Line 24', 'FIM-70', 1, NULL, NULL),
(328, 'Line 24', 'FIM-90', 1, NULL, NULL),
(329, 'Line 25', 'KWN', 1, NULL, NULL),
(330, 'Line 26', 'K81', 1, NULL, NULL),
(331, 'Line 26', 'K97', 1, NULL, NULL),
(332, 'Line 26', 'K1ZG', 1, NULL, NULL),
(333, 'Line 26', 'KZLN', 1, NULL, NULL),
(334, 'Line 26', 'KVYG', 1, NULL, NULL),
(335, 'Line 26', 'FIM-38', 1, NULL, NULL),
(336, 'Line 27', 'XE512', 1, NULL, NULL),
(337, 'Line 27', 'XE311', 1, NULL, NULL),
(338, 'Line 27', 'XE351', 1, NULL, NULL),
(339, 'Line 27', 'XE611', 1, NULL, NULL),
(340, 'Line 27', 'XE517', 1, NULL, NULL),
(341, 'Line 27', 'XE519', 1, NULL, NULL),
(342, 'Line 27', 'XE641', 1, NULL, NULL),
(343, 'Line 27', 'XD831', 1, NULL, NULL),
(344, 'Line 27', 'XD832', 1, NULL, NULL),
(345, 'Line 27', 'FIM-29', 1, NULL, NULL),
(346, 'Line 27', 'FIM-49', 1, NULL, NULL),
(347, 'Line 28', 'K41', 1, NULL, NULL),
(348, 'Line 28', 'K48', 1, NULL, NULL),
(349, 'Line 28', 'K0JA', 1, NULL, NULL),
(350, 'Line 28', 'KZLN', 1, NULL, NULL),
(351, 'Line 29', 'K59A', 1, NULL, NULL),
(352, 'Line 29', 'KWN', 1, NULL, NULL),
(353, 'Line 30', 'D79F', 1, NULL, NULL),
(354, 'Line 30', 'D26F', 1, NULL, NULL),
(355, 'Line 30', 'D30D', 1, NULL, NULL),
(356, 'Line 31', 'TF85', 1, NULL, NULL),
(357, 'Line 31', '4D31', 1, NULL, NULL),
(358, 'Line 31', '4D34', 1, NULL, NULL),
(359, 'Line 31', '4D34T6', 1, NULL, NULL),
(360, 'Line 31', '4D56NS', 1, NULL, NULL),
(361, 'Line 31', 'RD85DIS', 1, NULL, NULL),
(362, 'Line 31', 'RD65', 1, NULL, NULL),
(363, 'Line 31', 'RD65DIS', 1, NULL, NULL),
(364, 'Line 31', 'RD110', 1, NULL, NULL),
(365, 'Line 31', 'FIM-D1', 1, NULL, NULL),
(366, 'Line 32', '5YC', 1, NULL, NULL),
(367, 'Line 32', '5EA', 1, NULL, NULL),
(368, 'Line 32', 'D30D', 1, NULL, NULL),
(369, 'Line 32', 'D79F', 1, NULL, NULL),
(370, 'Line 32', 'Y4L', 1, NULL, NULL),
(371, 'Line 33', '5EA', 1, NULL, NULL),
(372, 'Line 33', 'K81', 1, NULL, NULL),
(373, 'Line 33', 'KWN', 1, NULL, NULL),
(374, 'Line 33', 'FIM-15', 1, NULL, NULL),
(375, 'Line 33', 'FIM-47', 1, NULL, NULL),
(376, 'Line 33', 'FIM-74', 1, NULL, NULL),
(377, 'Line 33', 'FIM-97', 1, NULL, NULL),
(378, 'Line 34', 'KEH6', 1, NULL, NULL),
(379, 'Line 34', 'GF6', 1, NULL, NULL),
(380, 'Line 34', 'GN5', 1, NULL, NULL),
(381, 'Line 34', '45P', 1, NULL, NULL),
(382, 'Line 34', 'FIM-29', 1, NULL, NULL),
(383, 'Line 34', 'FIM-30', 1, NULL, NULL),
(384, 'Line 34', 'FIM-36', 1, NULL, NULL),
(385, 'Line 34', 'FIM-48', 1, NULL, NULL),
(386, 'Line 34', 'FIM-49', 1, NULL, NULL),
(387, 'Line 34', 'FIM-50', 1, NULL, NULL),
(388, 'Line 34', 'FIM-56', 1, NULL, NULL),
(389, 'Line 34', 'FIM-68', 1, NULL, NULL),
(390, 'Line 34', 'FIM-69', 1, NULL, NULL),
(391, 'Line 34', 'FIM-70', 1, NULL, NULL),
(392, 'Line 34', 'FIM-81', 1, NULL, NULL),
(393, 'Line 34', 'FIM-82', 1, NULL, NULL),
(394, 'Line 34', 'FIM-85', 1, NULL, NULL),
(395, 'Line 34', 'FIM-90', 1, NULL, NULL),
(396, 'Line 34', 'FIM-93', 1, NULL, NULL),
(397, 'Line 34', 'FIM-94', 1, NULL, NULL),
(398, 'Line 35', 'K0JA', 1, NULL, NULL),
(399, 'Line SHOWA', 'STJ 1509', 1, NULL, NULL),
(400, 'Line KAYABA', 'Cyl.Guide', 1, NULL, NULL),
(401, 'Line NP-1', 'ROFRD65', 1, NULL, NULL),
(402, 'Line NP-4', 'STJ 1509', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `md_proses`
--

CREATE TABLE `md_proses` (
  `id` int(11) NOT NULL,
  `proses` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `md_proses`
--

INSERT INTO `md_proses` (`id`, `proses`, `created_at`, `updated_at`) VALUES
(1, 'OD', NULL, NULL),
(2, 'PH', NULL, NULL),
(3, 'ALL RG', NULL, NULL),
(4, 'COMB', NULL, NULL),
(5, 'VALVE', NULL, NULL),
(6, 'DRILL SLANT', NULL, NULL),
(7, 'DRILL LURUS', NULL, NULL),
(8, 'SFOD', NULL, NULL),
(9, 'PH Rough', NULL, NULL),
(10, 'GBF', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `md_tipe`
--

CREATE TABLE `md_tipe` (
  `id` int(11) NOT NULL,
  `tipe` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `md_tipe`
--

INSERT INTO `md_tipe` (`id`, `tipe`, `created_at`, `updated_at`) VALUES
(1, 'PROFILE', NULL, NULL),
(2, 'TATEFORM', NULL, NULL),
(3, 'ARASA', NULL, NULL),
(4, 'PITCH', NULL, NULL),
(5, 'ROUNDNESS', NULL, NULL),
(6, 'UNERI', NULL, NULL),
(7, 'RADIUS ATAS', NULL, NULL),
(8, 'RADIUS BAWAH', NULL, NULL),
(9, 'CHAMFER ATAS', NULL, NULL),
(10, 'CHAMFER BAWAH', NULL, NULL),
(11, 'SELESHION', NULL, NULL),
(12, '3rd STEP LOWER', NULL, NULL),
(13, 'POSISI', NULL, NULL),
(14, 'DIAMETER', NULL, NULL),
(15, 'VOLUME', NULL, NULL),
(16, 'TINGGI', NULL, NULL),
(17, 'DIAMETER BESAR', NULL, NULL),
(18, 'DIAMETER KECIL', NULL, NULL),
(19, 'SUDUT', NULL, NULL),
(20, 'HEAD RADIUS', NULL, NULL),
(21, 'HEAD CHAMFER', NULL, NULL),
(22, 'HEAD ROUGHNESS', NULL, NULL),
(23, 'HEAD DIAMETER', NULL, NULL),
(24, 'SNAPRING RADIUS', NULL, NULL),
(25, 'BOSS RADIUS', NULL, NULL),
(26, 'SIDE RELIEF', NULL, NULL),
(27, 'PIN HOLE CHAMFER', NULL, NULL),
(28, 'SKIRT CHAMFER IN', NULL, NULL),
(29, 'SKIRT CHAMFER OUT', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `md_ukur`
--

CREATE TABLE `md_ukur` (
  `id` int(11) NOT NULL,
  `proses` varchar(255) DEFAULT NULL,
  `tipe_pengukuran` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `md_ukur`
--

INSERT INTO `md_ukur` (`id`, `proses`, `tipe_pengukuran`, `created_at`, `updated_at`) VALUES
(1, '01 - OD', 'PROFILE', NULL, NULL),
(2, '02 - OD', 'TATEFORM', NULL, NULL),
(3, '03 - OD', 'ARASA', NULL, NULL),
(4, '04 - OD', 'PITCH', NULL, NULL),
(5, '05 - PH', 'ARASA', NULL, NULL),
(6, '06 - PH', 'PROFILE', NULL, NULL),
(7, '07 - PH', 'ROUNDNESS', NULL, NULL),
(8, '08 - ALL RG', 'ARASA', NULL, NULL),
(9, '09 - ALL RG', 'UNERI', NULL, NULL),
(10, '10 - ALL RG', 'RADIUS ATAS', NULL, NULL),
(11, '11 - ALL RG', 'RADIUS BAWAH', NULL, NULL),
(12, '12 - ALL RG', 'CHAMFER ATAS', NULL, NULL),
(13, '13 - ALL RG', 'CHAMFER BAWAH', NULL, NULL),
(14, '14 - ALL RG', 'SELESHION', NULL, NULL),
(15, '15 - ALL RG', '3RD STEP LOWER', NULL, NULL),
(16, '16 - COMB', 'POSISI', NULL, NULL),
(17, '17 - COMB', 'PROFILE', NULL, NULL),
(18, '18 - COMB', 'DIAMETER', NULL, NULL),
(19, '19 - COMB', 'VOLUME', NULL, NULL),
(20, '20 - VALVE', 'TINGGI', NULL, NULL),
(21, '21 - VALVE', 'DIAMETER BESAR', NULL, NULL),
(22, '22 - VALVE', 'DIAMETER KECIL', NULL, NULL),
(23, '23 - VALVE', 'POSISI', '0000-00-00 00:00:00', NULL),
(24, '24 - VALVE', 'Profil/Radius/Sudut', NULL, NULL),
(25, '25 - DRILL SLANT', 'POSISI', NULL, NULL),
(26, '26 - DRILL SLANT', 'SUDUT', NULL, NULL),
(27, '27 - DRILL LURUS', 'POSISI', NULL, NULL),
(28, '28 - DRILL LURUS', 'SUDUT', NULL, NULL),
(29, '29 - SFOD', 'HEAD RADIUS', NULL, NULL),
(30, '30 - SFOD', 'HEAD CHAMFER', NULL, NULL),
(31, '31 - SFOD', 'HEAD ROUGHNESS', NULL, NULL),
(32, '32 - SFOD', 'HEAD DIAMETER', NULL, NULL),
(33, '33 - PH Rough 1', 'SNAPRING RADIUS', NULL, NULL),
(34, '34 - PH Rough 1', 'BOSS RADIUS', NULL, NULL),
(35, '35 - PH Rough 1', 'SIDE RELIEF', NULL, NULL),
(36, '36 - PH Rough 1', 'PIN HOLE CHAMFER', NULL, NULL),
(37, '37 - PH Rough 2', 'SNAPRING RADIUS', NULL, NULL),
(38, '38 - PH Rough 2', 'BOSS RADIUS', NULL, NULL),
(39, '39 - PH Rough 2', 'SIDE RELIEF', NULL, NULL),
(40, '40 - PH Rough 2', 'PIN HOLE CHAMFER', NULL, NULL),
(41, '41 - GBF', 'SKIRT CHAMFER IN', NULL, NULL),
(42, '42 - GBF', 'SKIRT CHAMFER OUT', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `measurement`
--

CREATE TABLE `measurement` (
  `id` int(11) NOT NULL,
  `id_gm` varchar(255) DEFAULT '-',
  `id_dy` varchar(255) DEFAULT '-',
  `line` varchar(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `ukur` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT 9 COMMENT '[0] -> NG | [1] -> OK | [9] -> Belum GM',
  `file` varchar(255) DEFAULT NULL,
  `catatan` varchar(255) DEFAULT NULL,
  `start_ukur` datetime DEFAULT NULL,
  `on_ukur` datetime DEFAULT NULL,
  `finish_ukur` datetime DEFAULT NULL,
  `shift` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `tgl` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `measurement`
--

INSERT INTO `measurement` (`id`, `id_gm`, `id_dy`, `line`, `product`, `ukur`, `status`, `file`, `catatan`, `start_ukur`, `on_ukur`, `finish_ukur`, `shift`, `created_at`, `updated_at`, `tgl`) VALUES
(1, '2', '-', 'Line 26', 'K1ZG', '01 - OD - PROFILE', 1, 'bg_login.png', 'hasil ukur sudah ok', '2024-03-20 21:56:00', '2024-03-20 21:56:00', '2024-03-20 21:58:00', NULL, NULL, NULL, NULL),
(2, '5', '-', 'Line 4', 'FIM-97', '01 - OD - PROFILE', 1, 'bg_login_(1).png', 'OKE', '2024-03-30 19:10:00', '2024-03-30 19:10:00', '2024-03-30 19:11:00', NULL, NULL, NULL, NULL),
(3, '-', '-', 'Line 1', 'K0JA', '01 - OD - PROFILE', 1, 'logokontakapp.png', 'Oke', '2024-06-01 13:53:00', '2024-06-01 13:57:00', '2024-06-01 13:58:00', NULL, NULL, NULL, NULL),
(4, '-', '-', 'Line 3', '4D33', '05 - PH - ARASA', 1, 'kontakapp.png', 'Mantap', '2024-06-01 14:40:00', '2024-06-01 14:41:00', '2024-06-01 14:41:00', NULL, NULL, NULL, NULL),
(5, '-', '-', 'Line 1', 'K48A', '01 - OD - PROFILE', 1, 'logokontakappp.png', 'Hasil OK', '2024-06-07 17:04:00', '2024-06-07 17:39:00', '2024-06-07 17:39:00', NULL, NULL, NULL, NULL),
(7, '-', '-', 'Line 10', 'GN5', '03 - OD - ARASA', 0, 'bg_login1.png', 'Kurang OK', '2024-06-10 20:29:00', '2024-06-10 20:30:00', '2024-06-14 14:40:00', NULL, NULL, NULL, NULL),
(8, '-', '-', 'Line 3', '4D33', '04 - OD - PITCH', 1, 'kontakapp1.png', 'Mantap', '2024-06-12 12:36:00', '2024-06-14 14:37:00', '2024-06-17 20:15:00', NULL, NULL, NULL, NULL),
(10, '7', '-', 'Line 6', 'K18A', '01 - OD - PROFILE', 1, 'bg_login2.png', 'GOOD', '2024-06-14 14:43:00', '2024-06-14 14:43:00', '2024-06-17 20:15:00', NULL, NULL, NULL, NULL),
(13, '8', '-', 'Line 26', 'KZLN', '01 - OD - PROFILE', 1, 'logokontakapp1.png', 'Oke', '2024-06-17 20:51:00', '2024-06-17 20:53:00', '2024-06-17 20:54:00', NULL, NULL, NULL, NULL),
(14, '9', '-', 'Line 7', '4D56NS', '01 - OD - PROFILE', 1, 'logokontakappp1.png', 'Sudah OK', '2024-07-04 10:11:00', '2024-07-04 10:12:00', '2024-07-04 10:14:00', NULL, NULL, NULL, NULL),
(15, '9', '-', 'Line 7', '4D56NS', '05 - PH - ARASA', 1, 'OD-Profile.jpg', 'Sudah Oke', '2024-07-04 10:21:00', '2024-07-04 10:21:00', '2024-07-14 20:24:00', NULL, NULL, NULL, NULL),
(16, '10', '-', 'Line 2', 'K81', '01 - OD - PROFILE', 1, 'OD-Profile1.jpg', 'Hasil OK', '2024-07-14 20:27:00', '2024-07-14 20:28:00', '2024-07-14 20:28:00', NULL, NULL, NULL, NULL),
(17, '10', '-', 'Line 2', 'K81', '01 - OD - PROFILE', 0, 'OD-Profile2.jpg', 'Masih NG pada beberapa, silahkan cek pada gambar', '2024-07-16 07:25:00', '2024-07-16 07:26:00', '2024-07-16 07:26:00', NULL, NULL, NULL, NULL),
(18, '11', '-', 'Line 8', 'W04D', '01 - OD - PROFILE', 1, 'OD-Profile3.jpg', 'Hasil OK', '2024-07-16 09:46:00', '2024-07-16 09:46:00', '2024-07-16 09:47:00', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `palet`
--

CREATE TABLE `palet` (
  `idPalet` int(11) NOT NULL,
  `idRak` int(11) NOT NULL,
  `deskripsiPalet` varchar(45) NOT NULL,
  `maxBarang` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `ipAddress` varchar(45) DEFAULT NULL,
  `gpio1` int(11) DEFAULT NULL,
  `gpio2` int(11) DEFAULT NULL,
  `gpio3` int(11) DEFAULT NULL,
  `gpioStatus` int(11) NOT NULL,
  `createdBy` varchar(45) DEFAULT NULL,
  `createdDate` datetime NOT NULL,
  `modifiedBy` varchar(45) DEFAULT NULL,
  `modifiedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `palet`
--

INSERT INTO `palet` (`idPalet`, `idRak`, `deskripsiPalet`, `maxBarang`, `status`, `ipAddress`, `gpio1`, `gpio2`, `gpio3`, `gpioStatus`, `createdBy`, `createdDate`, `modifiedBy`, `modifiedDate`) VALUES
(1, 1, 'A1.1', 1800, 1, '192.168.100.170', 13, 19, 26, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:30:04'),
(2, 1, 'A1.2', 1800, 1, '192.168.100.160', 8, 0, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:31:17'),
(3, 1, 'A1.3', 1800, 1, '192.168.100.160', 7, 0, 0, 1, '', '0000-00-00 00:00:00', '', '2022-11-04 13:31:27'),
(4, 1, 'A1.4', 1800, 1, '192.168.100.160', 5, 0, 0, 1, '', '0000-00-00 00:00:00', '', '2022-11-04 13:31:35'),
(5, 1, 'A1.5', 1800, 1, '192.168.100.160', 6, 0, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:31:42'),
(6, 1, 'A1.6', 1800, 1, '192.168.100.170', 8, 0, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:32:06'),
(7, 2, 'A2.1', 1800, 1, '192.168.100.170', 7, 0, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:32:13'),
(8, 2, 'A2.2', 1800, 1, '192.168.100.170', 5, 0, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:32:19'),
(9, 2, 'A2.3', 1800, 1, '192.168.100.170', 6, 0, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:32:25'),
(10, 2, 'A2.4', 1800, 1, '192.168.100.200', 0, 9, 11, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 14:01:25'),
(11, 2, 'A2.5', 1800, 1, '192.168.100.200', 10, 9, 11, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 14:01:37'),
(12, 2, 'A2.6', 1800, 1, '192.168.100.200', 13, 0, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 14:01:46'),
(13, 3, 'A3.1', 1800, 1, '192.168.100.190', 2, 0, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 14:02:49'),
(14, 3, 'A3.2', 1800, 1, '192.168.100.190', 0, 3, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 14:02:58'),
(15, 3, 'A3.3', 1800, 1, '192.168.100.190', 2, 3, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 14:03:06'),
(16, 3, 'A3.4', 1800, 1, '192.168.100.190', 0, 0, 4, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 14:03:14'),
(17, 3, 'A3.5', 1800, 1, '192.168.100.190', 2, 0, 4, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 14:03:23'),
(18, 3, 'A3.6', 1800, 1, '192.168.100.190', 0, 3, 4, 1, '', '0000-00-00 00:00:00', '', '2022-11-04 14:03:30'),
(19, 4, 'B1.1', 1800, 1, '192.168.100.170', 23, 24, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:39:58'),
(20, 4, 'B1.2', 1800, 1, '192.168.100.170', 0, 0, 25, 1, '', '0000-00-00 00:00:00', '', '2022-11-04 13:40:05'),
(21, 4, 'B1.3', 1800, 1, '192.168.100.170', 23, 0, 25, 1, '', '0000-00-00 00:00:00', '', '2022-11-04 13:40:15'),
(22, 4, 'B1.4', 1800, 1, '192.168.100.170', 0, 24, 25, 1, '', '0000-00-00 00:00:00', '', '2022-11-04 13:40:25'),
(23, 4, 'B1.5', 1800, 1, '192.168.100.170', 23, 24, 25, 1, '', '0000-00-00 00:00:00', '', '2022-11-04 13:40:35'),
(24, 4, 'B1.6', 1800, 1, '192.168.100.170', 10, 0, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:40:43'),
(25, 5, 'B2.1', 1800, 1, '192.168.100.170', 0, 9, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:40:52'),
(26, 5, 'B2.2', 1800, 1, '192.168.100.170', 10, 9, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:41:01'),
(27, 5, 'B2.3', 1800, 1, '192.168.100.170', 0, 0, 11, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:41:14'),
(28, 5, 'B2.4', 1800, 1, '192.168.100.170', 10, 0, 11, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:41:21'),
(29, 5, 'B2.5', 1800, 1, '192.168.100.170', 0, 9, 11, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:41:32'),
(30, 5, 'B2.6', 1800, 1, '192.168.100.170', 10, 9, 11, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:41:39'),
(31, 6, 'B3.1', 1800, 1, '192.168.100.170', 13, 0, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:41:55'),
(32, 6, 'B3.2', 1800, 1, '192.168.100.170', 0, 19, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:42:08'),
(33, 6, 'B3.3', 1800, 1, '192.168.100.170', 13, 19, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:42:17'),
(34, 6, 'B3.4', 1800, 1, '192.168.100.170', 0, 0, 26, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:42:26'),
(35, 6, 'B3.5', 1800, 1, '192.168.100.170', 13, 0, 26, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:42:35'),
(36, 6, 'B3.6', 1800, 1, '192.168.100.170', 0, 19, 26, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:42:43'),
(37, 7, 'C1.1', 1800, 1, '192.168.100.170', 0, 3, 4, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:42:55'),
(38, 7, 'C1.2', 1800, 1, '192.168.100.170', 2, 3, 4, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:43:02'),
(39, 7, 'C1.3', 1800, 1, '192.168.100.170', 14, 0, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:43:09'),
(40, 7, 'C1.4', 1800, 1, '192.168.100.170', 0, 15, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:43:17'),
(41, 7, 'C1.5', 1800, 1, '192.168.100.170', 14, 15, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:44:39'),
(42, 7, 'C1.6', 1800, 1, '192.168.100.170', 0, 0, 18, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:44:49'),
(43, 8, 'C2.1', 1800, 1, '192.168.100.170', 14, 0, 18, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:44:58'),
(44, 8, 'C2.2', 1800, 1, '192.168.100.170', 0, 15, 18, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:45:43'),
(45, 8, 'C2.3', 1800, 1, '192.168.100.170', 14, 15, 18, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:45:54'),
(46, 8, 'C2.4', 1800, 1, '192.168.100.170', 17, 0, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:46:08'),
(47, 8, 'C2.5', 1800, 1, '192.168.100.170', 0, 27, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:46:22'),
(48, 8, 'C2.6', 1800, 1, '192.168.100.170', 17, 27, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:23:01'),
(49, 9, 'C3.1', 1800, 1, '192.168.100.170', 0, 0, 22, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:46:35'),
(50, 9, 'C3.2', 1800, 1, '192.168.100.170', 17, 0, 22, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:46:47'),
(51, 9, 'C3.3', 1800, 1, '192.168.100.170', 0, 27, 22, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:47:26'),
(52, 9, 'C3.4', 1800, 1, '192.168.100.170', 17, 27, 22, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:47:45'),
(53, 9, 'C3.5', 1800, 1, '192.168.100.170', 23, 0, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:47:55'),
(54, 9, 'C3.6', 1800, 1, '192.168.100.170', 0, 24, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:48:06'),
(55, 10, 'D1.1', 1800, 1, '192.168.100.160', 0, 19, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:48:29'),
(56, 10, 'D1.2', 1800, 1, '192.168.100.160', 13, 19, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:48:44'),
(57, 10, 'D1.3', 1800, 1, '192.168.100.160', 0, 0, 26, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:48:54'),
(58, 10, 'D1.4', 1800, 1, '192.168.100.160', 13, 0, 26, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:49:16'),
(59, 10, 'D1.5', 1800, 1, '192.168.100.160', 0, 19, 26, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:49:24'),
(60, 10, 'D1.6', 1800, 1, '192.168.100.160', 13, 19, 26, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:49:35'),
(61, 11, 'D2.1', 1800, 1, '192.168.100.160', 16, 0, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:49:49'),
(62, 11, 'D2.2', 1800, 1, '192.168.100.160', 0, 20, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:49:57'),
(63, 11, 'D2.3', 1800, 1, '192.168.100.160', 16, 20, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:50:10'),
(64, 11, 'D2.4', 1800, 1, '192.168.100.160', 0, 0, 21, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:50:21'),
(65, 11, 'D2.5', 1800, 1, '192.168.100.160', 16, 0, 21, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:50:30'),
(66, 11, 'D2.6', 1800, 1, '192.168.100.160', 0, 20, 21, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:50:40'),
(67, 12, 'D3.1', 1800, 1, '192.168.100.160', 16, 20, 21, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:50:52'),
(68, 12, 'D3.2', 1800, 1, '192.168.100.170', 2, 0, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:51:10'),
(69, 12, 'D3.3', 1800, 1, '192.168.100.170', 0, 3, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:51:18'),
(70, 12, 'D3.4', 1800, 1, '192.168.100.170', 2, 3, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:51:28'),
(71, 12, 'D3.5', 1800, 1, '192.168.100.170', 0, 0, 4, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:51:40'),
(72, 12, 'D3.6', 1800, 1, '192.168.100.170', 2, 0, 4, 1, '', '0000-00-00 00:00:00', '', '2022-11-04 13:51:48'),
(73, 13, 'E1.1', 1800, 1, '192.168.100.160', 17, 0, 22, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:52:15'),
(74, 13, 'E1.2', 1800, 1, '192.168.100.160', 0, 27, 22, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:52:27'),
(75, 13, 'E1.3', 1800, 1, '192.168.100.160', 17, 27, 22, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:52:37'),
(76, 13, 'E1.4', 1800, 1, '192.168.100.160', 23, 0, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:52:49'),
(77, 13, 'E1.5', 1800, 1, '192.168.100.160', 0, 24, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:53:04'),
(78, 13, 'E1.6', 1800, 1, '192.168.100.160', 23, 24, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:53:12'),
(79, 14, 'E2.1', 1800, 1, '192.168.100.160', 0, 0, 25, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:53:21'),
(80, 14, 'E2.2', 1800, 1, '192.168.100.160', 23, 0, 25, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:53:30'),
(81, 14, 'E2.3', 1800, 1, '192.168.100.160', 0, 24, 25, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:53:49'),
(82, 14, 'E2.4', 1800, 1, '192.168.100.160', 23, 24, 25, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:53:57'),
(83, 14, 'E2.5', 1800, 1, '192.168.100.160', 10, 0, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:54:06'),
(84, 14, 'E2.6', 1800, 1, '192.168.100.160', 0, 9, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:54:18'),
(85, 15, 'E3.1', 1800, 1, '192.168.100.160', 10, 9, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:54:29'),
(86, 15, 'E3.2', 1800, 1, '192.168.100.160', 0, 0, 11, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:54:39'),
(87, 15, 'E3.3', 1800, 1, '192.168.100.160', 10, 0, 11, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:54:51'),
(88, 15, 'E3.4', 1800, 1, '192.168.100.160', 0, 9, 11, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:56:11'),
(89, 15, 'E3.5', 1800, 1, '192.168.100.160', 10, 9, 11, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:56:21'),
(90, 15, 'E3.6', 1800, 1, '192.168.100.160', 13, 0, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:56:38'),
(91, 16, 'F1.1', 1800, 1, '192.168.100.160', 2, 0, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:05:39'),
(92, 16, 'F1.2', 1800, 1, '192.168.100.160', 0, 3, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:06:01'),
(93, 16, 'F1.3', 1800, 1, '192.168.100.160', 2, 3, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 14:21:04'),
(94, 16, 'F1.4', 1800, 1, '192.168.100.160', 0, 0, 4, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 14:21:14'),
(95, 16, 'F1.5', 1800, 1, '192.168.100.160', 2, 0, 4, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 14:21:47'),
(96, 16, 'F1.6', 1800, 1, '192.168.100.160', 0, 3, 4, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 14:21:56'),
(97, 17, 'F2.1', 1800, 1, '192.168.100.160', 2, 3, 4, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 14:22:05'),
(98, 17, 'F2.2', 1800, 1, '192.168.100.160', 14, 0, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 14:22:13'),
(99, 17, 'F2.3', 1800, 1, '192.168.100.160', 0, 15, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 14:22:21'),
(100, 17, 'F2.4', 1800, 1, '192.168.100.160', 14, 15, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 14:21:38'),
(101, 17, 'F2.5', 1800, 1, '192.168.100.160', 0, 0, 18, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 14:20:34'),
(102, 17, 'F2.6', 1800, 1, '192.168.100.160', 14, 0, 18, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 14:20:50'),
(103, 18, 'F3.1', 1800, 1, '192.168.100.160', 0, 15, 18, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:57:50'),
(104, 18, 'F3.2', 1800, 1, '192.168.100.160', 14, 15, 18, 1, '', '0000-00-00 00:00:00', '', '2022-11-04 13:58:06'),
(105, 18, 'F3.3', 1800, 1, '192.168.100.160', 17, 0, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:58:17'),
(106, 18, 'F3.4', 1800, 1, '192.168.100.160', 0, 27, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:58:33'),
(107, 18, 'F3.5', 1800, 1, '192.168.100.160', 17, 27, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:59:01'),
(108, 18, 'F3.6', 1800, 1, '192.168.100.160', 0, 0, 22, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:59:12'),
(109, 19, 'G1.1', 1800, 1, '192.168.100.190', 2, 3, 4, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:59:50'),
(110, 19, 'G1.2', 1800, 1, '192.168.100.190', 14, 0, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 14:00:03'),
(111, 19, 'G1.3', 1800, 1, '192.168.100.190', 0, 15, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 14:04:18'),
(112, 19, 'G1.4', 1800, 1, '192.168.100.190', 14, 15, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 14:04:38'),
(113, 19, 'G1.5', 1800, 1, '192.168.100.190', 0, 0, 18, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:44:43'),
(114, 19, 'G1.6', 1800, 1, '192.168.100.190', 14, 0, 18, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 14:18:26'),
(115, 19, 'G1.7', 1800, 1, '192.168.100.190', 0, 15, 18, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 14:18:47'),
(116, 20, 'G2.1', 1800, 1, '192.168.100.190', 14, 15, 18, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 14:19:14'),
(117, 20, 'G2.2', 1800, 1, '192.168.100.190', 17, 0, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 14:19:27'),
(118, 20, 'G2.3', 1800, 1, '192.168.100.190', 0, 27, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 14:19:38'),
(119, 20, 'G2.4', 1800, 1, '192.168.100.190', 17, 27, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 14:19:47'),
(120, 20, 'G2.5', 1800, 1, '192.168.100.190', 0, 0, 22, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 14:20:17'),
(121, 20, 'G2.6', 1800, 1, '192.168.100.190', 17, 0, 22, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 14:17:41'),
(122, 20, 'G2.7', 1800, 1, '192.168.100.190', 0, 27, 22, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 14:17:49'),
(123, 21, 'G3.1', 1800, 1, '192.168.100.190', 17, 27, 22, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 14:18:12'),
(124, 21, 'G3.2', 1800, 1, '192.168.100.190', 23, 0, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 14:17:33'),
(125, 21, 'G3.3', 1800, 1, '192.168.100.190', 0, 24, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 14:17:17'),
(126, 21, 'G3.4', 1800, 1, '192.168.100.190', 23, 24, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 14:17:08'),
(127, 21, 'G3.5', 1800, 1, '192.168.100.190', 0, 0, 25, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 13:48:09'),
(128, 21, 'G3.6', 1800, 1, '192.168.100.190', 23, 0, 25, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 14:16:55'),
(129, 21, 'G3.7', 1800, 1, '192.168.100.190', 0, 24, 25, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 14:16:42'),
(130, 22, 'H1.1', 1800, 1, '192.168.100.190', 23, 24, 25, 1, '', '0000-00-00 00:00:00', '', '2022-11-04 14:16:30'),
(131, 22, 'H1.2', 1800, 1, '192.168.100.190', 23, 24, 25, 1, '', '0000-00-00 00:00:00', '', '2022-11-04 14:14:47'),
(132, 22, 'H1.3', 1800, 1, '192.168.100.190', 23, 24, 25, 1, '', '0000-00-00 00:00:00', '', '2022-11-04 14:15:08'),
(133, 23, 'H2.1', 1800, 1, '192.168.100.190', 10, 0, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 14:15:20'),
(134, 23, 'H2.2', 1800, 1, '192.168.100.190', 0, 9, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 14:15:30'),
(135, 23, 'H2.3', 1800, 1, '192.168.100.190', 10, 9, 0, 1, '', '0000-00-00 00:00:00', '', '2022-11-04 14:15:40'),
(136, 23, 'H2.4', 1800, 1, '192.168.100.190', 0, 0, 11, 1, '', '0000-00-00 00:00:00', '', '2022-11-04 14:16:00'),
(137, 23, 'H2.5', 1800, 1, '', 0, 0, 0, 0, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(138, 23, 'H2.6', 1800, 1, '', 0, 0, 0, 0, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(139, 23, 'H2.7', 1800, 1, '', 0, 0, 0, 0, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(140, 24, 'H3.1', 1800, 1, '192.168.100.190', 10, 0, 11, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 14:14:57'),
(141, 24, 'H3.2', 1800, 1, '192.168.100.190', 0, 9, 11, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 14:11:57'),
(142, 24, 'H3.3', 1800, 1, '192.168.100.190', 10, 9, 11, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 14:12:09'),
(143, 24, 'H3.4', 1800, 1, '192.168.100.190', 13, 0, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 14:12:18'),
(144, 24, 'H3.5', 1800, 1, '192.168.100.190', 0, 19, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 14:12:37'),
(145, 24, 'H3.6', 1800, 1, '192.168.100.190', 13, 19, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 14:12:48'),
(146, 24, 'H3.7', 1800, 1, '192.168.100.190', 0, 0, 26, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 14:13:37'),
(147, 25, 'I1.1', 1800, 1, '192.168.100.190', 13, 19, 26, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 14:13:48'),
(148, 25, 'I1.2', 1800, 1, '192.168.100.200', 2, 0, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 14:14:13'),
(149, 25, 'I1.3', 1800, 1, '192.168.100.200', 0, 3, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 14:14:21'),
(150, 25, 'I1.4', 1800, 1, '192.168.100.200', 2, 3, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 14:14:31'),
(151, 25, 'I1.5', 1800, 1, '', 0, 0, 0, 0, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(152, 25, 'I1.6', 1800, 1, '', 0, 0, 0, 0, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(153, 26, 'J1.1', 1800, 1, '192.168.100.200', 0, 0, 4, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 14:11:11'),
(154, 26, 'J1.2', 1800, 1, '192.168.100.200', 2, 0, 4, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 14:11:21'),
(155, 26, 'J1.3', 1800, 1, '192.168.100.200', 0, 3, 4, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 14:11:30'),
(156, 26, 'J1.4', 1800, 1, '192.168.100.200', 2, 3, 4, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 14:11:38'),
(157, 26, 'J1.5', 1800, 1, '192.168.100.200', 14, 0, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-07 09:38:25'),
(158, 26, 'J1.6', 1800, 1, '192.168.100.200', 0, 15, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-07 09:39:04'),
(159, 27, 'K1.1', 1800, 1, '192.168.100.200', 14, 15, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 14:10:44'),
(160, 27, 'K1.2', 1800, 1, '192.168.100.200', 0, 0, 18, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 14:10:30'),
(161, 27, 'K1.3', 1800, 1, '192.168.100.200', 14, 0, 18, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 14:09:24'),
(162, 27, 'K1.4', 1800, 1, '192.168.100.200', 0, 15, 18, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 14:09:33'),
(163, 27, 'K1.5', 1800, 1, '192.168.100.200', 14, 15, 18, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 14:09:45'),
(164, 27, 'K1.6', 1800, 1, '192.168.100.200', 17, 0, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 14:10:11'),
(165, 28, 'L1.1', 1800, 1, '192.168.100.200', 0, 27, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 14:09:54'),
(166, 28, 'L1.2', 1800, 1, '192.168.100.200', 17, 27, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 14:09:13'),
(167, 28, 'L1.3', 1800, 1, '192.168.100.200', 0, 0, 22, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 14:09:04'),
(168, 28, 'L1.4', 1800, 1, '192.168.100.200', 17, 0, 22, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 14:08:55'),
(169, 28, 'L1.5', 1800, 1, '192.168.100.200', 0, 27, 22, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 14:08:47'),
(170, 28, 'L1.6', 1800, 1, '', 0, 0, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-01 13:39:32'),
(171, 29, 'L2.1', 1800, 1, '192.168.100.200', 17, 27, 22, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 14:07:00'),
(172, 29, 'L2.2', 1800, 1, '192.168.100.200', 23, 0, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 14:07:08'),
(173, 29, 'L2.3', 1800, 1, '192.168.100.200', 0, 24, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 14:08:31'),
(174, 29, 'L2.4', 1800, 1, '192.168.100.200', 23, 24, 0, 1, '', '0000-00-00 00:00:00', '', '2022-11-04 14:08:21'),
(175, 29, 'L2.5', 1800, 1, '192.168.100.200', 0, 0, 25, 1, '', '0000-00-00 00:00:00', '', '2022-11-04 14:08:14'),
(176, 29, 'L2.6', 1800, 1, '192.168.100.200', 23, 0, 25, 1, '', '0000-00-00 00:00:00', '', '2022-11-04 14:07:50'),
(177, 30, 'L3.1', 1800, 1, '192.168.100.200', 0, 24, 25, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 14:07:41'),
(178, 30, 'L3.2', 1800, 1, '192.168.100.200', 23, 24, 25, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 14:07:31'),
(179, 30, 'L3.3', 1800, 1, '192.168.100.200', 10, 0, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-07 14:36:31'),
(180, 30, 'L3.4', 1800, 1, '192.168.100.200', 0, 9, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-07 14:36:01'),
(181, 30, 'L3.5', 1800, 1, '192.168.100.200', 10, 9, 0, 0, '', '0000-00-00 00:00:00', '', '2022-11-04 14:06:19'),
(182, 30, 'L3.6', 1800, 1, '192.168.100.200', 0, 0, 11, 0, '', '0000-00-00 00:00:00', '', '2022-11-07 14:32:23'),
(183, 30, 'L3.7', 1800, 1, '192.168.100.200', 10, 0, 11, 0, '', '0000-00-00 00:00:00', '', '2022-11-07 14:31:57'),
(184, 33, 'P3.2', 50000, 1, '192.168.100.210', 23, 0, 0, 0, '', '2022-10-21 15:10:49', '', '2023-02-17 13:25:50'),
(185, 33, 'P3.5', 50000, 1, '192.168.100.210', 0, 24, 0, 0, '', '2023-01-18 09:40:32', '', '2023-02-17 13:26:08'),
(186, 34, 'P4.2', 50000, 1, '192.168.100.210', 23, 24, 0, 0, '', '2023-01-18 09:41:52', '', '2023-02-17 13:26:25'),
(187, 36, 'Q2.1', 50000, 1, '192.168.100.210', 2, 0, 0, 0, '', '2023-01-19 01:50:42', '', '2023-02-17 13:17:00'),
(188, 36, 'Q2.5', 50000, 1, '192.168.100.210', 0, 3, 0, 0, '', '2023-01-19 01:51:24', '', '2023-02-17 13:17:31'),
(189, 37, 'Q3.4', 50000, 1, '192.168.100.210', 2, 3, 0, 1, '', '2023-01-19 01:53:35', '', '2023-02-17 13:17:50'),
(190, 38, 'Q4.1', 50000, 1, '192.168.100.210', 0, 0, 4, 1, '', '2023-01-19 01:54:09', '', '2023-02-17 13:18:02'),
(191, 38, 'Q4.2', 10000, 1, '192.168.100.210', 2, 0, 4, 1, '', '2023-01-19 02:03:54', '', '2023-02-17 13:18:17'),
(192, 38, 'Q4.4', 10000, 1, '192.168.100.210', 0, 3, 4, 1, '', '2023-01-19 02:04:56', '', '2023-02-17 13:18:36'),
(193, 40, 'R2.1', 10000, 1, '192.168.100.210', 2, 3, 4, 0, '', '2023-01-19 02:09:49', '', '2023-02-17 13:18:50'),
(194, 40, 'R2.3', 10000, 1, '192.168.100.210', 14, 0, 0, 0, '', '2023-01-19 04:23:44', '', '2023-02-17 13:21:40'),
(195, 40, 'R2.4', 10000, 1, '192.168.100.210', 0, 15, 0, 0, '', '2023-01-19 04:24:33', '', '2023-02-17 13:21:56'),
(196, 40, 'R2.5', 10000, 1, '192.168.100.210', 14, 15, 0, 1, '', '2023-01-19 04:25:14', '', '2023-02-17 13:22:12'),
(197, 41, 'R3.1', 10000, 1, '192.168.100.210', 0, 0, 18, 0, '', '2023-01-19 04:25:57', '', '2023-02-17 13:22:37'),
(198, 41, 'R3.4', 10000, 1, '192.168.100.210', 14, 0, 18, 0, '', '2023-01-19 04:26:40', '', '2023-02-17 13:22:58'),
(199, 42, 'R4.3', 10000, 1, '192.168.100.210', 0, 15, 18, 0, '', '2023-01-19 04:27:10', '', '2023-02-17 13:23:10'),
(200, 44, 'S2.2', 100000, 1, '192.168.100.210', 14, 15, 18, 0, '', '2023-01-19 04:27:50', '', '2023-02-17 13:23:34'),
(201, 44, 'S2.3', 100000, 1, '192.168.100.210', 17, 0, 0, 0, '', '2023-01-19 04:29:02', '', '2023-02-17 13:23:58'),
(202, 44, 'S2.4', 100000, 1, '192.168.100.210', 0, 27, 0, 0, '', '2023-01-19 04:29:44', '', '2023-02-17 13:24:09'),
(203, 45, 'S3.1', 100000, 1, '192.168.100.210', 17, 27, 0, 0, '', '2023-01-19 04:30:25', '', '2023-02-17 13:24:22'),
(204, 45, 'S3.2', 100000, 1, '192.168.100.210', 0, 0, 22, 0, '', '2023-01-19 04:31:01', '', '2023-02-17 13:24:45'),
(205, 45, 'S3.4', 100000, 1, '192.168.100.210', 17, 0, 22, 0, '', '2023-01-19 04:32:35', '', '2023-02-17 13:25:15'),
(206, 46, 'S4.1', 100000, 1, '192.168.100.210', 0, 27, 22, 0, '', '2023-01-19 04:33:12', '', '2023-02-17 13:25:26'),
(207, 47, 'TRY1.1', 1500, 1, '192.168.100.23', 2, 3, 0, 1, '', '2023-06-28 11:35:33', '', '2023-11-20 16:53:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rak`
--

CREATE TABLE `rak` (
  `idRak` int(11) NOT NULL,
  `idLemari` int(11) DEFAULT NULL,
  `deskripsiRak` varchar(50) NOT NULL,
  `currentVolume` int(11) NOT NULL,
  `maxVolume` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `createdBy` varchar(50) NOT NULL,
  `createdDate` datetime NOT NULL,
  `modifiedBy` varchar(50) NOT NULL,
  `modifiedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `rak`
--

INSERT INTO `rak` (`idRak`, `idLemari`, `deskripsiRak`, `currentVolume`, `maxVolume`, `status`, `createdBy`, `createdDate`, `modifiedBy`, `modifiedDate`) VALUES
(1, 1, 'Rak A1', 6, 6, 1, '', '2022-01-01 00:00:00', '', '2022-01-01 00:00:00'),
(2, 1, 'Rak A2', 6, 6, 1, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(3, 1, 'Rak A3', 6, 6, 1, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(4, 2, 'Rak B1', 6, 6, 1, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(5, 2, 'Rak B2', 6, 6, 1, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(6, 2, 'Rak B3', 6, 6, 1, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(7, 3, 'Rak C1', 6, 6, 1, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(8, 3, 'Rak C2', 6, 6, 1, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(9, 3, 'Rak C3', 6, 6, 1, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(10, 4, 'Rak D1', 6, 6, 1, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(11, 4, 'Rak D2', 4, 6, 1, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(12, 4, 'Rak D3', 6, 6, 1, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(13, 5, 'Rak E1', 6, 6, 1, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(14, 5, 'Rak E2', 6, 6, 1, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(15, 5, 'Rak E3', 6, 6, 1, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(16, 6, 'Rak F1', 6, 6, 1, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(17, 6, 'Rak F2', 6, 6, 1, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(18, 6, 'Rak F3', 6, 6, 1, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(19, 7, 'Rak G1', 6, 6, 1, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(20, 7, 'Rak G2', 6, 6, 1, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(21, 7, 'Rak G3', 6, 6, 1, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(22, 8, 'Rak H1', 3, 3, 1, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(23, 8, 'Rak H2', 4, 6, 1, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(24, 8, 'Rak H3', 6, 6, 1, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(25, 9, 'Rak I1', 4, 6, 1, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(26, 10, 'Rak J1', 6, 6, 1, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(27, 11, 'Rak K1', 6, 6, 1, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(28, 12, 'Rak L1', 6, 6, 1, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(29, 12, 'Rak L2', 6, 6, 1, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(30, 12, 'Rak L3', 7, 7, 1, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(31, 13, 'Rak P1', 6, 6, 1, '', '2022-10-21 15:09:44', '', '2023-01-18 09:43:43'),
(32, 13, 'Rak P2', 6, 6, 1, '', '2023-01-18 09:44:12', '', '2023-01-18 09:44:22'),
(33, 13, 'Rak P3', 6, 6, 1, '', '2023-01-18 09:45:21', '', '2023-01-18 09:45:29'),
(34, 13, 'Rak P4', 6, 6, 1, '', '2023-01-18 09:45:43', '', '0000-00-00 00:00:00'),
(35, 14, 'Rak Q1', 5, 5, 1, '', '2023-01-18 09:47:03', '', '0000-00-00 00:00:00'),
(36, 14, 'Rak Q2', 5, 5, 1, '', '2023-01-18 09:47:16', '', '0000-00-00 00:00:00'),
(37, 14, 'Rak Q3', 5, 5, 1, '', '2023-01-18 09:47:34', '', '0000-00-00 00:00:00'),
(38, 14, 'Rak Q4', 5, 5, 1, '', '2023-01-18 09:47:58', '', '0000-00-00 00:00:00'),
(39, 15, 'Rak R1', 5, 5, 1, '', '2023-01-18 09:51:17', '', '0000-00-00 00:00:00'),
(40, 15, 'Rak R2', 5, 5, 1, '', '2023-01-19 01:45:06', '', '2023-01-19 01:45:28'),
(41, 15, 'Rak R3', 5, 5, 1, '', '2023-01-19 01:45:47', '', '0000-00-00 00:00:00'),
(42, 15, 'Rak R4', 5, 5, 1, '', '2023-01-19 01:46:15', '', '0000-00-00 00:00:00'),
(43, 16, 'Rak S1', 5, 5, 1, '', '2023-01-19 01:46:46', '', '0000-00-00 00:00:00'),
(44, 16, 'Rak S2', 5, 5, 1, '', '2023-01-19 01:47:07', '', '0000-00-00 00:00:00'),
(45, 16, 'Rak S3', 5, 5, 1, '', '2023-01-19 01:47:29', '', '0000-00-00 00:00:00'),
(46, 16, 'Rak S4', 5, 5, 1, '', '2023-01-19 01:47:50', '', '0000-00-00 00:00:00'),
(47, 17, 'TRY1', 100, 1000, 1, '', '2023-06-28 11:34:01', '', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `app_user`
--
ALTER TABLE `app_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`idBarang`);

--
-- Indeks untuk tabel `gantimodel`
--
ALTER TABLE `gantimodel`
  ADD PRIMARY KEY (`id_gm`),
  ADD KEY `user_qc` (`user_qc`),
  ADD KEY `pass_qc` (`pass_qc`),
  ADD KEY `user_del` (`user_del`),
  ADD KEY `pass_del` (`pass_del`);

--
-- Indeks untuk tabel `historybarang`
--
ALTER TABLE `historybarang`
  ADD PRIMARY KEY (`idHistory`);

--
-- Indeks untuk tabel `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`itemCode`);

--
-- Indeks untuk tabel `itemhistory`
--
ALTER TABLE `itemhistory`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lemari`
--
ALTER TABLE `lemari`
  ADD PRIMARY KEY (`idLemari`);

--
-- Indeks untuk tabel `mainitem`
--
ALTER TABLE `mainitem`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `md_jig`
--
ALTER TABLE `md_jig`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `md_line`
--
ALTER TABLE `md_line`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama_line` (`nama_line`);

--
-- Indeks untuk tabel `md_mesin`
--
ALTER TABLE `md_mesin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `md_product`
--
ALTER TABLE `md_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama_produk` (`nama_produk`);

--
-- Indeks untuk tabel `md_proses`
--
ALTER TABLE `md_proses`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `md_tipe`
--
ALTER TABLE `md_tipe`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `md_ukur`
--
ALTER TABLE `md_ukur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proses` (`proses`),
  ADD KEY `tipe_pengukuran` (`tipe_pengukuran`);

--
-- Indeks untuk tabel `measurement`
--
ALTER TABLE `measurement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_gm` (`id_gm`),
  ADD KEY `line` (`line`),
  ADD KEY `product` (`product`),
  ADD KEY `ukur` (`ukur`);

--
-- Indeks untuk tabel `palet`
--
ALTER TABLE `palet`
  ADD PRIMARY KEY (`idPalet`);

--
-- Indeks untuk tabel `rak`
--
ALTER TABLE `rak`
  ADD PRIMARY KEY (`idRak`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `app_user`
--
ALTER TABLE `app_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `gantimodel`
--
ALTER TABLE `gantimodel`
  MODIFY `id_gm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `md_jig`
--
ALTER TABLE `md_jig`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `md_line`
--
ALTER TABLE `md_line`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `md_mesin`
--
ALTER TABLE `md_mesin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `md_product`
--
ALTER TABLE `md_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=412;

--
-- AUTO_INCREMENT untuk tabel `md_proses`
--
ALTER TABLE `md_proses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `md_tipe`
--
ALTER TABLE `md_tipe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `md_ukur`
--
ALTER TABLE `md_ukur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `measurement`
--
ALTER TABLE `measurement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `rak`
--
ALTER TABLE `rak`
  MODIFY `idRak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
