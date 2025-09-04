-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 04, 2025 at 08:31 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`) VALUES
(2, 'Travel', 'Travel\r\n'),
(4, 'Science And Tecnology ', 'For Science And Tecnology Description 1'),
(5, 'Uncategorize', 'This is description for uncategorize catgeory'),
(11, 'Art', 'This is description for art category'),
(12, 'Food', 'This is category food'),
(13, 'Wild Life', 'This is wild life category'),
(14, 'Lingkungan', 'Ini  kategori lingkungan');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `category_id` int UNSIGNED DEFAULT NULL,
  `author_id` int UNSIGNED NOT NULL,
  `is_featured` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `thumbnail`, `date_time`, `category_id`, `author_id`, `is_featured`) VALUES
(13, 'Travel post', 'Aliquam faucibus, elit ut dictum aliquet, felis nisl adipiscing sapien, sed malesuada diam lacus eget erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Suspendisse sollicitudin velit sed leo. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur?\r\n', '1748500308blog7.jpg', '2025-05-29 06:31:48', 2, 5, 0),
(14, 'Science and tecnology post', 'Aliquam faucibus, elit ut dictum aliquet, felis nisl adipiscing sapien, sed malesuada diam lacus eget erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Suspendisse sollicitudin velit sed leo. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur?\r\n', '1748500332blog17.jpg', '2025-05-29 06:32:12', 4, 5, 0),
(15, 'Lorem', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1748583893blog5.jpg', '2025-05-30 05:44:53', 2, 13, 0),
(17, 'Kisah Sukses Startup Ramah Lingkungan yang Mengubah Sampah Plastik', 'Ceritakan perjalanan sebuah startup yang berhasil menginovasi pengolahan sampah plastik menjadi produk bernilai tinggi, dampaknya terhadap lingkungan, dan tantangan yang mereka hadapi.', '1748826128blog59.jpg', '2025-06-02 01:02:08', 4, 5, 0),
(18, 'Menjaga Keindahan Hutan Kota: Wujud Cinta Tanah Air dari Mahasiswa UBSI Bekasi', 'Halo #SobatPeduliLingkungan!\r\n\r\nTahukah kalian bahwa menjaga kebersihan lingkungan adalah salah satu bentuk nyata dari cinta tanah air?  Di tengah permasalahan sampah plastik yang kian menggunung, kami dari Universitas Bina Sarana Informatika (UBSI) Kampus Kaliabang, Kota Bekasi, mengambil langkah konkret untuk berkontribusi.  Kami baru saja menyelesaikan kegiatan pengabdian masyarakat dengan aksi bersih-bersih di Hutan Kota Patriot Bina Bangsa!\r\n\r\n\r\nHutan Kota Patriot Bina Bangsa ini merupakan paru-paru penting bagi Kota Bekasi, berfungsi sebagai tempat rekreasi, edukasi, dan pelestarian keanekaragaman hayati.  Sayangnya, keindahan dan fungsinya seringkali terancam oleh sampah yang berserakan, akibat kurangnya fasilitas kebersihan yang memadai dan kesadaran sebagian pengunjung. \r\n\r\n\r\n\r\n\r\nTim kami yang terdiri dari Darell Rangga Putra Rachman, Denada Putri Hidayat, Muhamad Rifki Saputra, Siti Komariyah, dan Syifa Aulia, berinisiatif untuk melakukan aksi bersih-bersih ini.  Tujuan utamanya adalah meningkatkan kesadaran masyarakat tentang pentingnya menjaga kebersihan hutan kota Bekasi sebagai salah satu bentuk cinta terhadap tanah air. \r\n\r\n\r\nApa saja yang kami lakukan?\r\n\r\nKami memulai dengan koordinasi tim dan mitra kami, UPTD Taman Hutan Kota Bekasi, kemudian mempersiapkan alat-alat seperti sapu, kantong sampah, dan sarung tangan.  Selanjutnya, kami memobilisasi tim dan melakukan aksi bersih-bersih di area-area yang menjadi titik rawan penumpukan sampah di hutan kota.  Semua kegiatan ini kami dokumentasikan untuk keperluan evaluasi dan sebagai bukti nyata hasil kerja kami. \r\n\r\n\r\n\r\n\r\nApa hasilnya?\r\n\r\nKami sangat senang melihat area yang telah kami bersihkan menunjukkan peningkatan kebersihan yang signifikan!  Sampah yang berserakan berkurang drastis, membuat Hutan Kota terlihat lebih indah dan nyaman. \r\n\r\n\r\n\r\n\r\nManfaat dari kegiatan ini tidak hanya sekadar bersih-bersih, lho!\r\n\r\nMeningkatkan Kebersihan: Area hutan kota menjadi lebih sehat dan nyaman untuk publik. \r\nMelestarikan Ekosistem: Mendukung kelangsungan hidup flora dan fauna serta menjaga keanekaragaman hayati. \r\nMeningkatkan Estetika: Hutan kota menjadi lebih menarik sebagai tempat rekreasi dan edukasi. \r\nMendukung Fungsi Paru-Paru Kota: Hutan kota dapat berfungsi optimal sebagai penyaring udara alami. \r\nMendukung Program Pemerintah: Berkontribusi pada program pelestarian lingkungan seperti Gerakan Indonesia Bersih. \r\nMendorong Keberlanjutan: Diharapkan muncul kesinambungan upaya pelestarian di masa depan. \r\nKami berharap, kegiatan ini dapat menjadi inspirasi bagi lebih banyak pihak untuk ikut berkontribusi dalam menjaga kebersihan lingkungan dan meningkatkan kesadaran akan pentingnya ruang terbuka hijau sebagai bagian dari kesejahteraan masyarakat dan wujud nyata cinta kita pada tanah air.  Mari bersama-sama kita jaga keindahan alam Indonesia!\r\n\r\n\r\n\r\n#HutanKota #CintaTanahAir #LingkunganBersih #UBSI #PengabdianMasyarakat #Bekasi #LestariLingkungan', '1748826469blog32.jpg', '2025-06-02 01:07:49', 14, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `firstname` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `avatar`, `is_admin`) VALUES
(5, 'darell', 'rangga', 'darell', 'darellrangga199@gmail.com', '$2y$10$pJNAdHF3ycoEEO/zFziKB.JaQI/LAs7T1ZZKLxeSnioqeGieS3Uva', '1747810665IMG_20241009_115556-removebg-preview-removebg-preview.png', 1),
(13, 'Daniel', 'Muinu', 'Daniel', 'daniel@gmail.com', '$2y$10$tDJ4RyxSXCyuV8sDz/qy3uQcUCZHYWv6HViq2VnwK7qRTfOBPNVfG', '1748583820avatar13.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_blog_category1` (`category_id`),
  ADD KEY `FK_blog_author1` (`author_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `FK_blog_author1` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_blog_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `FK_blog_category1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
