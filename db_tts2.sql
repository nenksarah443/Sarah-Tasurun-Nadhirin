-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2018 at 01:00 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tts2`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `phone` bigint(20) NOT NULL,
  `gender` enum('L','P') NOT NULL DEFAULT 'L'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `address`, `phone`, `gender`) VALUES
(3, 'Aeni Isti', 'Padaherang, Rt/11 Rw/01, Kec.Padaherang, Kab. Pangandaran ', 82111222333, 'P'),
(4, 'Aji Putra', 'Kalipucang, Rt/01 Rw/13, Kec. Kalipucang, Kab.Pangandaran', 89111222333, 'L'),
(6, 'Yusuf ajlan', 'Jl. Raya Banjarsari No.111, Kec.Banjarsari.', 82223334445, 'L');

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
  `seat_code` int(10) NOT NULL,
  `ruteid` int(10) NOT NULL,
  `depart_at` time NOT NULL,
  `price` int(10) NOT NULL,
  `userid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rute`
--

CREATE TABLE `rute` (
  `id` int(10) NOT NULL,
  `depart_at` time NOT NULL,
  `rute_from` varchar(100) NOT NULL,
  `rute_to` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `transportationid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(2, 'Pesawat'),
(5, 'Kereta Api');

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
(1, 'Sarah Tasurun Nadhirin', 'Nadhi', 'sarahtasurunnadhirin19@gmail.com', '$2y$10$GpR/1Yw40rWKvFLzXB5KlOu/X4g25nJeZwAxbetj9Q1xIHtq.SsJq', 'admin', 'nMQRZ3QCpLOY4XFV3L5XfqExUhbPaLoG57I9jtsHQaMiCJEcOajtBYzTKFkQ', '2018-10-13 21:16:16', '2018-10-23 03:57:22'),
(2, 'Yusuf Al-Aj''lan', 'Yusuf', 'yusuf@gmail.com', '$2y$10$bC2wALXCR1p0Ebgcu9izIOW4X3jWIIxTVq1Bo7BgS7vrGOpcyqb6K', 'operator', 'JsIJvq75BKMmlbVvzvGSWpuHmmVOgOsHcefxPlxMuujVjp1uF2RWzXfQdiRf', '2018-10-13 23:49:41', '2018-10-22 10:18:04'),
(5, 'Irvan Fauzan', 'Irvan', 'irvanfauzan@gmail.com', '$2y$10$GWykZYO8vjiFiTXC4tqvPef3xGYdH1zQepEMuw3lDXGIl5OaSO0fW', 'operator', 'PM3wK6Ib1BBWARjVSy54aYfGbzI5fMU4VDi24IZvEKu5vg0UsFR1db1YmRCB', '2018-10-14 02:02:41', '2018-10-17 06:46:52'),
(6, 'Siti Nur Ajijah', 'Sitinur', 'sitinurajijah1@gmail.com', '$2y$10$bTeI01cRME9SokJec.pWcOILiTqre6bKloNcQc2SfyOgXNg7myu3i', 'operator', 'Iq7ULNRN20STwg36SAcDX0pipMbCjlq19oAY9nABSmWXkJZFRIYWQWQtUjwc', '2018-10-14 02:36:44', '2018-10-14 02:36:44'),
(7, 'Aeni Isti Janah', 'Aeni', 'aeni@yahoo.com', '$2y$10$Cey.I2MzIYMT.vh3xR4EYe.Fonc/I0xpGPsUdzikw.JkIDSXF4sK2', 'operator', 'Mn7y96P6s8UGMoyEfCc12aikL1xNZ7pBH6cIhugZ1tfIXItQHTZxIbZhHrdL', '2018-10-14 02:37:59', '2018-10-14 02:37:59'),
(8, 'Yulianti', 'Yuli', 'yuli@yahoo.com', '$2y$10$xFSxLu3FNnJJoGiZuXen.OZq2mIMDGYIRidUn4619zhzTvJ9klJgi', 'operator', '9iNcouuw9quCvUfOqq88J8Zj3WhwzgVvglKGkQU4yIaTHnFNgRWRz66RrECZ', '2018-10-14 02:39:05', '2018-10-14 02:39:05'),
(10, 'Delia', 'Hartati', 'delia@yahoo.com', '$2y$10$2mcj34zHrFTeKAcAvHs/y.PsW3lB0Zm.qmnmSGsydCQzXTc/G57P.', 'operator', 'aXjzwTqapM4xsClfK8ykfRYF8hJKKi2hhEjCSRKB3EFRmCC7T5KTxDjyEegW', '2018-10-14 02:41:54', '2018-10-14 02:41:54'),
(11, 'Hendi', 'Hendi', 'hendi@gmail.com', '$2y$10$u3Yd1TVhnLZzbmVugVWd4O/D.tVwoFUedqOGKAjOG9gOf.RX/zwCy', 'operator', '4E7VIqwhRKC0V7IVvMBYVX4Slmwa6yi38j3plB93zphC9XnHHauTvubZpSEO', '2018-10-14 02:42:53', '2018-10-14 02:42:53'),
(12, 'Rachel Liza', 'Rachel', 'rachelliza@gmail.com', '$2y$10$/q1H3NlVUpQeiTJbC7ZCWuhqD/fO00LzTICpVhWHU8rB9Gh6DLWim', 'operator', NULL, '2018-10-15 21:51:43', '2018-10-15 21:51:43'),
(14, 'Neni Rismawati', 'Neni', 'neni@gmail.com', '$2y$10$xATJz8haViJ55iW3QYaCq.6sdj5dFYQAKQb8L7bsiHeu3Jnvre1ku', 'operator', NULL, '2018-10-16 01:03:25', '2018-10-16 01:03:25'),
(15, 'Nurhasanah', 'Nurhasan', 'nurhasanah@yahoo.com', '$2y$10$NJEm006XUkWfGLvR1Mw8R.pYgtfmjukwgTzFUhw5IuNHd2UakaA22', 'operator', NULL, '2018-10-16 04:45:34', '2018-10-16 04:45:34'),
(16, 'Asti Pujianti', 'Asti', 'astipujianti@yahoo.com', '$2y$10$DarAjfmb4nbzHUt7zpqa5OoaD/1baJabR..bIEX7GnNnXy.Tp6ifW', 'operator', NULL, '2018-10-16 18:27:39', '2018-10-16 18:27:39'),
(17, 'Wiro Sableng', 'Wiro_Sableng', 'wiro@gmail.com', '$2y$10$haDpS235cqVLpfNKkCzdreOamPrdA5YwtZbMuAZhaohtyuyjlA91y', 'operator', 'mguEQhk77nFsxHZD5qTU2F4P2HufPfEmOccv9FEkLtH52bArbrx69uSwu8gU', '2018-10-17 09:14:56', '2018-10-17 09:14:56'),
(18, 'lulus jadi', 'lulus', 'lulus@gmail.com', '$2y$10$kf/6Kl7IZCyelA4QUliHLefHj5meZ4C/p67AXiuHvV1Jlftqjxs0.', 'operator', NULL, '2018-10-22 10:19:16', '2018-10-22 10:19:16'),
(19, 'ererSitikus', 'siti', 'rache@gmail.com', '$2y$10$bUn6vj3IzLHt/v6qwF29rOj25TQb9A5Hcze0JMma1VhLAmGtJkeSK', 'operator', NULL, '2018-10-22 19:00:26', '2018-10-23 03:50:18'),
(20, 'Alisa Subandono', 'Alisa', 'alisa@gmail.com', '$2y$10$oyKqSjFoRm5G8o6Q5aYZR.IOqGXmqHjhruMHBhKo58DCUVU963Z46', 'admin', NULL, '2018-10-23 03:51:43', '2018-10-23 03:51:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
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
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rute`
--
ALTER TABLE `rute`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transportation`
--
ALTER TABLE `transportation`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transportation_type`
--
ALTER TABLE `transportation_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
