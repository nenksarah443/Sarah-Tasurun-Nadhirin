-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2019 at 04:57 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ttssaraht`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_rute` (IN `price` INT(10), IN `depart_at` DATETIME)  NO SQL
BEGIN
INSERT INTO rute (price,depart_at)
VALUES (price,depart_at);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(20) NOT NULL,
  `gender` enum('L','P') NOT NULL DEFAULT 'L'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `address`, `phone`, `gender`) VALUES
(21, 'Sarah Tasurun Nadhirin', 'Jl. Raya Banjarsari No.123, Kec.Banjarsari, Kab.Ciamis.', '081222333444', 'P'),
(22, 'Adela Amanda', 'Jl. Raya Padaherang, Kec.Padaherang, Kab.Pangandaran.', '082333444555', 'P'),
(23, 'Adit Tria Caesar', 'Jl. Raya Pangandaran Kec. Pangandaran Kab.Pangandaran', '083444555666', 'L'),
(24, 'Aeni Istinganatul Janah', 'Jl. Raya Padaherang, kab.Pangandaran.', '084555666777', 'P'),
(25, 'Aji Putra Ramadhan', 'Jl. Raya Kalipucang Kec.Kalipucang, Kab.Pangandaran.', '085666777888', 'L'),
(26, 'Asti Pujianti', 'Jl. Raya Kalipucang Kec.Gua Donan Kab.Pangandaran', '086777888999', 'P'),
(27, 'Dede Rokaesih', 'Jl. Raya Padaherang Kab.Pangandaran.', '087888999000', 'P'),
(28, 'Deliana', 'Jl. Raya Kalipucang Kab.Pangandaran.', '089000111222', 'P'),
(29, 'Devi Zulianti', 'Jl. Raya Padaherang Kab.Pangandaran.', '081122334455', 'P'),
(30, 'Dini Renita', 'Jl. Raya Banjarsari No.123, Kec.Banjarsari, Kab.Ciamis.', '082233445566', 'P'),
(31, 'Ela Ayu Ningrum', 'Jl. Raya Patimuan, Kab.Patimuan, Prov. Jawa Tengah.', '084455667788', 'P'),
(32, 'Euis Ratna Dewi`', 'Jl. Raya Patimuan, Kab.Patimuan, Prov. Jawa Tengah.', '085566778899', 'P'),
(33, 'Fajar Ramdhani', 'Jl. Raya Sopla, Kab.Pangandaran.', '086677889900', 'L'),
(34, 'Feby Andika Prasetyo', 'Jl. Raya Kalipucang, Kab.Pangandaran.', '081112223334', 'L'),
(35, 'Gita Fajriani Aziz', 'Jl. Raya Patinggen 2, Kec.Padaherang, Kab.Pangandaran.', '082223334445', 'P'),
(36, 'Hani Setiawati', 'Jl. Raya Kalipucang, Kab.Pangandaran.', '083334445556', 'P'),
(37, 'Hendrik', 'Jl. Raya Kalipucang, Kab.Pangandaran.', '084445556667', 'L'),
(38, 'Lidia Salsa Dila', 'Jl. Raya Brujul, Kec.Padaherang, Kab.Pangandaran.', '085556667778', 'P'),
(39, 'Meliani Nurbaeti', 'Jl. Raya Padaherang, Kab.Pangandaran.', '086667778889', 'P'),
(40, 'Rifky Khoerunnisa', 'Jl. Raya Sopla, Kab.Pangandaran.', '089990001112', 'P'),
(41, 'Rini Ristiani', 'Jl. Raya Kalipucang, Kab.Pangandaran.', '082345678900', 'P'),
(42, 'Risa Fajriyah', 'Jl. Raya Pamarican, Kab.Ciamis.', '083456789011', 'P'),
(43, 'Riska Apriliani', 'Jl. Raya Padaherang, Kab.Pangandaran', '084567890122', 'P'),
(44, 'Yusup Aj''lan', 'Jl.Raya Banjarsari Kec.Banjarsari', '081223344556', 'L'),
(45, 'Rachel Liza', 'Jl.Raya Tanggerang', '089123456789', 'P'),
(100, 'M4m4n', 'Banjarsari', '082123456789', 'L'),
(101, 'Maman', 'Tasikmalaya', '082111222333', 'L'),
(102, 'Siapa aja', 'Tasikmalaya', '081234567789', 'L');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(10) NOT NULL,
  `id_rute` int(10) NOT NULL,
  `depart_at` datetime NOT NULL,
  `kapasitas` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `id_rute`, `depart_at`, `kapasitas`) VALUES
(2, 6, '2019-02-28 12:48:00', 200),
(3, 7, '2019-02-25 13:10:00', 449),
(4, 1, '2019-04-10 15:19:00', 199),
(5, 9, '2019-04-10 22:00:00', 450),
(6, 10, '2019-04-10 09:36:00', 449),
(7, 13, '2019-04-11 20:42:00', 171),
(8, 14, '2019-04-10 19:00:00', 309);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(10) NOT NULL,
  `reservation_code` varchar(191) NOT NULL,
  `reservation_at` time NOT NULL,
  `reservation_date` date NOT NULL,
  `customerid` int(10) NOT NULL,
  `seat_code` varchar(10) NOT NULL,
  `id_jadwal` int(10) DEFAULT NULL,
  `depart_at` datetime NOT NULL,
  `price` int(10) NOT NULL,
  `jumlah` int(10) DEFAULT NULL,
  `userid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `reservation_code`, `reservation_at`, `reservation_date`, `customerid`, `seat_code`, `id_jadwal`, `depart_at`, `price`, `jumlah`, `userid`) VALUES
(5, 'TTS20190408001', '09:30:51', '2019-04-08', 24, 'SA01', 4, '2019-02-25 15:19:00', 350000, 1, 1),
(6, 'TTS20190408006', '09:37:32', '2019-04-08', 25, 'GC01', 6, '2019-04-10 09:36:00', 155000, 1, 1),
(7, 'PTS20190408007', '20:44:12', '2019-04-08', 24, 'GI01', 7, '2019-04-11 20:42:00', 450000, 1, 1),
(8, 'TTS20190408008', '21:42:44', '2019-04-08', 44, 'PS01', 3, '2019-02-25 13:10:00', 120000, 1, 12),
(9, 'TTS20190408009', '21:53:41', '2019-04-08', 40, 'PN01', 8, '2019-04-10 19:00:00', 10000, 1, 1);

--
-- Triggers `reservation`
--
DELIMITER $$
CREATE TRIGGER `nambah_kursi` AFTER UPDATE ON `reservation` FOR EACH ROW UPDATE `jadwal` SET kapasitas =(old.jumlah + kapasitas)
WHERE id=old.id_jadwal
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trigger_kursi` AFTER INSERT ON `reservation` FOR EACH ROW UPDATE `jadwal` SET kapasitas = (kapasitas - new.jumlah)
WHERE id = new.id_jadwal
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `rute`
--

CREATE TABLE `rute` (
  `id` int(10) NOT NULL,
  `depart_at` int(10) NOT NULL,
  `rute_from` varchar(100) NOT NULL,
  `rute_to` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `transportationid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rute`
--

INSERT INTO `rute` (`id`, `depart_at`, `rute_from`, `rute_to`, `price`, `transportationid`) VALUES
(1, 6, 'Malang', 'Jakarta', 350000, 1),
(4, 5, 'Lampung', 'Banjar Patroman', 2550000, 3),
(6, 8, 'PSE', 'SGU', 104000, 5),
(7, 17, 'PSE', 'SMC', 120000, 6),
(9, 13, 'Solobalapan', 'Yogyakarta Tugu', 55000, 8),
(10, 24, 'Gambir', 'Cirebon Kejaksaan', 155000, 8),
(11, 14, 'Surabaya Pasarturi', 'Semarang Tawang', 210000, 1),
(12, 24, 'Gambir', 'Cirebon', 155000, 1),
(13, 4, 'Jakarta', 'Yogyakarta', 450000, 4),
(14, 26, 'Bandung', 'Yogyakarta', 10000, 12),
(15, 0, '', '', 350000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `transportation`
--

CREATE TABLE `transportation` (
  `id` int(10) NOT NULL,
  `code` varchar(191) NOT NULL,
  `description` text NOT NULL,
  `seat_qty` int(10) NOT NULL,
  `transportation_typeid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transportation`
--

INSERT INTO `transportation` (`id`, `code`, `description`, `seat_qty`, `transportation_typeid`) VALUES
(2, 'Argo Wilis', 'PT. Kereta Api', 200, 1),
(4, 'Air Asia', 'PT.Garuda Indonesia', 172, 2),
(5, 'Gaya Baru Malam Selatan', 'PT. Kereta Api', 200, 1),
(6, 'Tawang Jaya', 'PT. Kereta Api', 450, 1),
(7, 'Ekonomi', 'PT. Kereta Api', 106, 1),
(8, 'Argo Lawu', 'PT. Kereta Api Indonesia', 450, 1),
(9, 'Argo Muria', 'PT. Kereta Api Indonesia', 450, 1),
(11, 'Lion air', 'PT. Garuda Indonesia', 330, 2),
(12, 'Pangandaran', 'PT. Tiket Kereta Api', 310, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transportation_type`
--

CREATE TABLE `transportation_type` (
  `id` int(11) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transportation_type`
--

INSERT INTO `transportation_type` (`id`, `description`) VALUES
(1, 'Kereta Api'),
(2, 'Pesawat');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('operator','admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'operator',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `email`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sarah Tasurun Nadhirin', 'Nadhi', 'sarahtasurunnadhirin19@gmail.com', '$2y$10$2LFk0UGf9IbVq4iXgBVh6./VIB8ZZW/MLIHpSNXS1zTM3ENfdWq3K', 'admin', '37oxd41vrl2ry6VeaeElRws00ehH41IqZI8Uucg1Y6SGqlkO0pz70nB1yP7H', '2018-10-13 21:16:16', '2019-01-19 15:20:08'),
(2, 'Yusuf Al-Aj''lan', 'Yusuf', 'yusuf@gmail.com', '$2y$10$/U1EDjGFKVILVQmnIsL0bOebUTFM2E1ApQ15W6CL7NrNFd/biDeXm', 'admin', 'WlMfPwLD5zZxgIyJY8nF2RFKhP6ypFWK1mMfZWFIoIw5qXvPMdhEvzQbkogw', '2018-10-13 23:49:41', '2018-10-23 18:31:24'),
(5, 'Irvan Fauzan', 'Irvan', 'irvanfauzan@gmail.com', '$2y$10$GWykZYO8vjiFiTXC4tqvPef3xGYdH1zQepEMuw3lDXGIl5OaSO0fW', 'operator', 'PM3wK6Ib1BBWARjVSy54aYfGbzI5fMU4VDi24IZvEKu5vg0UsFR1db1YmRCB', '2018-10-14 02:02:41', '2018-10-17 06:46:52'),
(6, 'Siti Nur Ajijah', 'Sitinur', 'sitinurajijah1@gmail.com', '$2y$10$sMc1h6UL3kiwDWbpJmBJ/eZAZN3siaBvPsvzL3XX0IXMehHKKRaYG', 'operator', 'Iq7ULNRN20STwg36SAcDX0pipMbCjlq19oAY9nABSmWXkJZFRIYWQWQtUjwc', '2018-10-14 02:36:44', '2019-04-08 14:37:14'),
(7, 'Aeni Isti Janah', 'Aeni', 'aeni@yahoo.com', '$2y$10$VdRDjzXlRvDXXIOP1SgFp.azt9RbyrL1530AfA4EKvzzQu2WVDMi.', 'operator', 'Mn7y96P6s8UGMoyEfCc12aikL1xNZ7pBH6cIhugZ1tfIXItQHTZxIbZhHrdL', '2018-10-14 02:37:59', '2018-11-02 15:42:40'),
(8, 'Yulianti', 'Yuli', 'yuli@yahoo.com', '$2y$10$xFSxLu3FNnJJoGiZuXen.OZq2mIMDGYIRidUn4619zhzTvJ9klJgi', 'operator', '9iNcouuw9quCvUfOqq88J8Zj3WhwzgVvglKGkQU4yIaTHnFNgRWRz66RrECZ', '2018-10-14 02:39:05', '2018-10-14 02:39:05'),
(10, 'Delia', 'Hartati', 'delia@yahoo.com', '$2y$10$KOGaL1lFArOMbctwZ2k8vOi/FgceNuPvuF.5K2ytC5WOPXpsMtt12', 'operator', 'aXjzwTqapM4xsClfK8ykfRYF8hJKKi2hhEjCSRKB3EFRmCC7T5KTxDjyEegW', '2018-10-14 02:41:54', '2018-11-13 02:49:45'),
(11, 'Hendi', 'Hendi', 'hendi@gmail.com', '$2y$10$Os3IuoAtg1aaTGSM8Hzequt6THh/.B5gBhV09mm/BwEhUGrqw7SJ6', 'operator', 'LMRZ1s4zvqPiUbjDXS2SSRzhIAo0I4B0HK6CwcPqW2YHSjSRgMhoRwAv5XeR', '2018-10-14 02:42:53', '2018-11-09 11:01:51'),
(12, 'Rachel Liza', 'Rachel', 'rachelliza@gmail.com', '$2y$10$zTKngcfetOH0aBqpYs3QWOvsJVTRNp2CW1feztNDhOrGcmaAxRtVS', 'operator', 'hIKvQhLvv9pHhK20Mc6MlT4BeOS9YN2eHPCGRjt7BUBf2DxqX7yi9eY0WS1D', '2018-10-15 21:51:43', '2019-04-08 14:36:32'),
(16, 'Asti Pujianti', 'Asti', 'astipujianti@yahoo.com', '$2y$10$DarAjfmb4nbzHUt7zpqa5OoaD/1baJabR..bIEX7GnNnXy.Tp6ifW', 'operator', NULL, '2018-10-16 18:27:39', '2018-10-16 18:27:39'),
(17, 'Wiro Sableng', 'Wiro_Sableng', 'wiro@gmail.com', '$2y$10$haDpS235cqVLpfNKkCzdreOamPrdA5YwtZbMuAZhaohtyuyjlA91y', 'operator', 'mguEQhk77nFsxHZD5qTU2F4P2HufPfEmOccv9FEkLtH52bArbrx69uSwu8gU', '2018-10-17 09:14:56', '2018-10-17 09:14:56'),
(20, 'Alisa Subandono', 'Alisa', 'alisa@gmail.com', '$2y$10$oyKqSjFoRm5G8o6Q5aYZR.IOqGXmqHjhruMHBhKo58DCUVU963Z46', 'operator', NULL, '2018-10-23 03:51:43', '2018-10-23 04:03:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
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
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reservation_code` (`reservation_code`);

--
-- Indexes for table `rute`
--
ALTER TABLE `rute`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transportation`
--
ALTER TABLE `transportation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `transportation_type`
--
ALTER TABLE `transportation_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `rute`
--
ALTER TABLE `rute`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `transportation`
--
ALTER TABLE `transportation`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `transportation_type`
--
ALTER TABLE `transportation_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
