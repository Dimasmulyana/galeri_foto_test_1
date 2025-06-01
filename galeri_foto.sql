-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2025 at 12:01 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `galeri_foto`
--

-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

CREATE TABLE `foto` (
  `id` int(11) NOT NULL,
  `nama_foto` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `path_foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `jumlah_like` int(11) DEFAULT 0,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `foto`
--

INSERT INTO `foto` (`id`, `nama_foto`, `deskripsi`, `path_foto`, `created_at`, `updated_at`, `jumlah_like`, `user_id`) VALUES
(26, 'kebun teh sukawana', 'kebun teh yang hijau,dan indah', 'fotos/oLDzbNtDZm1i4tDnsIgfwuEE62TiRqiwTYpLIVLg.jpg', '2025-06-01 01:09:37', '2025-06-01 01:10:52', 1, 23),
(27, 'danau', 'danau biru', 'fotos/CGhW4I0UtQbVg7m60p4ZFycLHkCUkQrX4jmUs2g3.jpg', '2025-06-01 01:14:15', '2025-06-01 01:14:45', 1, 24);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'dimas', 'dimasmulyana@gmail.com', '$2y$12$BYwq18BYYOc5tJSXX5gvruB2HItn82N/ddfHs6x0pykZWEr3diMkW', '2025-05-29 02:38:35', '2025-05-29 02:38:35'),
(2, 'dimas', 'adam@gmail.com', '$2y$12$xUO/HwhuigDboT7goT8DK.kBCnL9L1jx9gMQEy807Q8qDV59vTi0q', '2025-05-29 03:16:46', '2025-05-29 03:16:46'),
(3, 'oto', 'to@gmail.com', '$2y$12$3o/aOg4c1X3YIa5.uBdKdeFvslDEESz3kSH7VcoiX/jFaWnLUd6p.', '2025-05-29 04:31:36', '2025-05-29 04:31:36'),
(4, 'raihan', 'raihan@gmal.com', '$2y$12$Rw3Frru.lIt1lYpHXllJjuBM9R6LF0p6AJL3n70AdXiYEVw9uNZH6', '2025-05-30 01:37:01', '2025-05-30 01:37:01'),
(5, 'raihan', 'raihannur@gmail.com', '$2y$12$G6B9R3G7kHuHqtbW4j/o6OHo4QWPoUG.B7oh8H4lKu2iPsQ18fbvW', '2025-05-30 01:38:51', '2025-05-30 01:38:51'),
(6, 'raihan', 'nurwahid@gmail.com', '$2y$12$U/pu0qSHB0kJGFUTjyLFNuE2f3qqXKKbi0hqCHKvBf.Icz4PtDdjC', '2025-05-30 01:57:48', '2025-05-30 01:57:48'),
(7, 'adam', 'dam@gmail.com', '$2y$12$YuhsWcU9jkUTcMtvAOQg4e3tnWYECbVDt8dLPWCAm1hp.fDjKizOC', '2025-05-30 09:44:13', '2025-05-30 09:44:13'),
(8, 'acep', 'acep@gmail.com', '$2y$12$ZLkYXLMT5At4oZuN/01REOolvpIOHbaIKDkJxzJdC3/kbm6bx4iBa', '2025-05-30 09:45:50', '2025-05-30 09:45:50'),
(9, 'emul', 'emul@gmail.com', '$2y$12$Z9UTvyddJqOkTaqGnPPWGeb5L3Q8oPLC4pCWITUPRsh725f0h0xha', '2025-05-31 03:16:06', '2025-05-31 03:16:06'),
(10, 'milda', 'milda@gmail.com', '$2y$12$KuQbu7KNULem69PrnV5DlePF.Ngpaq86bvQx/m5tYCZwW6J3d0sEW', '2025-05-31 03:20:23', '2025-05-31 03:20:23'),
(11, 'diana', 'diana@gmail.com', '$2y$12$m07raYikaje1KVW.oUP8X.HrTrlYQWvRwcnQHk3MRa/QzvQ0frTFW', '2025-05-31 13:04:24', '2025-05-31 13:04:24'),
(12, 'ramdan', 'ramdan@gmail.com', '$2y$12$N9WH7eJTRHzrjfpMwyqHx.gMS/uRCjKZVlOwVPzjMRGnIasFNJIf6', '2025-06-01 03:06:24', '2025-06-01 03:06:24'),
(13, 'haji', 'haji@gmail.com', '$2y$12$a2Tjl1hz32zWHqlgMzWM5eEuyCmYyhg.jvYoZgTPaSQpXPTVziMvS', '2025-06-01 03:09:51', '2025-06-01 03:09:51'),
(14, 'padli', 'padli@gmail.com', '$2y$12$tDFGB.2B4lkwphDJModLzuPgTRYkk1gIQBvJKZrz8kS5gCZ2lvIjG', '2025-06-01 03:13:22', '2025-06-01 03:13:22'),
(15, 'pahri', 'pahri@gmail.com', '$2y$12$yBeWt/wOhFbTAHkvYCs1aet.dzNs8nSuFLXkYsaoZmWMS7uxmx8ZW', '2025-06-01 03:15:26', '2025-06-01 03:15:26'),
(16, 'ramdani', 'ramdani@gmail.com', '$2y$12$JfXR1mK8qUbUHzhKJQNJFOKHtu6kDJxmG7znFqlEmkj1lwb1iPpTu', '2025-06-01 03:29:06', '2025-06-01 03:29:06'),
(17, 'dudung', 'dudung@gmail.com', '$2y$12$oM3Lbr.2pN6rK8It9kGBX.BckCQBLUrEJZ2oMQPQ.JLJQ659hxttu', '2025-06-01 03:33:32', '2025-06-01 03:33:32'),
(18, 'asep', 'asep@gmail.com', '$2y$12$kudTgu8sqfghkpSffqjwdudUbaT1XfrD6EKLAB33nCDEXhwvAixYS', '2025-06-01 03:38:41', '2025-06-01 03:38:41'),
(19, 'abuy', 'abuy@gmail.com', '$2y$12$DRoCDX7BSz4a1SyTA858QuCAEMmlZnBlYpo0KPyPny3DcToaeXjhi', '2025-06-01 03:43:56', '2025-06-01 03:43:56'),
(20, 'denis', 'denis@gmail.com', '$2y$12$euDb3rK/YlP6UR4sacz8aOYeQbXAnLL94bR8phqwJiofcwMgshOl2', '2025-06-01 03:48:42', '2025-06-01 03:48:42'),
(21, 'adit', 'adit@gmail.com', '$2y$12$Kgh/kq6o1Y9oPbc.dnSy3eTeJCzcqHA0fMTQ91vNl5ILZy2TfEgyi', '2025-06-01 03:52:39', '2025-06-01 03:52:39'),
(22, 'dimul', 'dimul@gmail.com', '$2y$12$yBK19JSC2dXS9T700xcjeutgOTtPKZ0UMwsPSQySzeALwCeHOtXXy', '2025-06-01 07:59:28', '2025-06-01 07:59:28'),
(23, 'ucup', 'ucup@gmail.com', '$2y$12$XdcHBomF3lOtc.QstkNNeelK2phsoar2zdHlOR1D/vhkVFrcgK2z.', '2025-06-01 08:06:31', '2025-06-01 08:06:31'),
(24, 'sopi', 'sopi@gmail.com', '$2y$12$RmEvVG6svyh90KjlZA.jt.VVw.pbjB7vNKL6i0ORkDbq2Hg.eOke2', '2025-06-01 08:13:16', '2025-06-01 08:13:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
