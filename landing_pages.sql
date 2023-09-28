-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Feb 2022 pada 15.18
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `landing_pages`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `address_contact`
--

CREATE TABLE `address_contact` (
  `id` int(11) NOT NULL,
  `address` varchar(80) NOT NULL,
  `country` varchar(80) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(45) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `address_contact`
--

INSERT INTO `address_contact` (`id`, `address`, `country`, `telephone`, `phone`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Jalan Gunung Loli Lorong 2 No. 37 D3, Kota Palu', 'Kec.Besusu 94112', '085757063969', '6285757063969', 'yuracompanypalu@gmail.com', NULL, '2022-01-10 11:13:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Account for Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'rnidevon@gmail.com', 1, '2022-01-10 11:08:31', 1),
(2, '::1', 'rnidevon@gmail.com', 1, '2022-01-10 11:11:15', 1),
(3, '::1', 'rnidevon@gmail.com', 1, '2022-01-10 11:11:36', 1),
(4, '::1', 'rnidevon@gmail.com', 1, '2022-01-10 11:12:38', 1),
(5, '::1', 'devonnosuke', NULL, '2022-01-14 09:32:55', 0),
(6, '::1', 'devonnosuke', NULL, '2022-01-14 09:33:02', 0),
(7, '::1', 'YuraCorp', NULL, '2022-01-14 09:33:18', 0),
(8, '::1', 'rnidevon@gmail.com', 1, '2022-01-14 09:34:20', 1),
(9, '::1', 'devonnosuke', NULL, '2022-01-15 21:26:48', 0),
(10, '::1', 'yura2022', NULL, '2022-01-15 21:27:03', 0),
(11, '::1', 'rnidevon@gmail.com', 1, '2022-01-15 21:27:09', 1),
(12, '::1', 'rnidevon@gmail.com', 1, '2022-01-15 22:53:33', 1),
(13, '::1', 'rnidevon@gmail.com', 1, '2022-01-15 23:00:39', 1),
(14, '::1', 'yura2021', NULL, '2022-02-09 04:05:20', 0),
(15, '::1', 'rnidevon@gmail.com', 1, '2022-02-09 04:07:10', 1),
(16, '::1', 'yura2022', NULL, '2022-02-11 03:44:45', 0),
(17, '::1', 'yura2022', NULL, '2022-02-11 03:44:51', 0),
(18, '::1', 'rnidevon@gmail.com', 1, '2022-02-11 03:44:56', 1),
(19, '::1', 'rnidevon@gmail.com', 1, '2022-02-11 08:42:15', 1),
(20, '::1', 'rnidevon@gmail.com', 1, '2022-02-11 09:18:26', 1),
(21, '::1', 'rnidevon@gmail.com', 1, '2022-02-12 06:12:11', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cta`
--

CREATE TABLE `cta` (
  `id` int(3) NOT NULL,
  `cta_type` varchar(150) NOT NULL,
  `cta_value` varchar(400) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cta`
--

INSERT INTO `cta` (`id`, `cta_type`, `cta_value`, `created_at`, `updated_at`) VALUES
(1, 'whatsapp', '6285757063969', NULL, '2021-12-21 02:59:34'),
(2, 'telephone', '02167544322', NULL, '2021-12-21 02:59:34'),
(3, 'envelope', 'rnidevosn@gmail.com', NULL, '2021-12-21 02:59:34'),
(4, 'whatsapp_text', 'dai jumana pradha', '2021-12-17 09:56:24', '2021-12-21 02:59:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `educational`
--

CREATE TABLE `educational` (
  `id` int(11) NOT NULL,
  `country_collage` varchar(65) NOT NULL,
  `collage_name` varchar(125) NOT NULL,
  `title` enum('associate','certificate','B.A.','BArch','BM','BFA','B.Sc.','M.A.','M.B.A','M.F.A','M.Sc.','J.D.','M.D.','Ph.D','LLB','LLM','other') NOT NULL,
  `major` varchar(50) NOT NULL,
  `year_graduation` int(6) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `educational`
--

INSERT INTO `educational` (`id`, `country_collage`, `collage_name`, `title`, `major`, `year_graduation`, `created_at`, `updated_at`) VALUES
(1, '&lt;u&gt;Indonesia&lt;/u&gt;', 'SMKN 3 PALU', 'certificate', 'Software Enginering', 2018, '2021-08-15 10:35:46', '2021-12-10 23:36:34'),
(47, '&lt;h1&gt;Philadelphia&lt;/h1&gt;', 'SMKN3 PALU UNIVERSITY', 'certificate', 'BKP', 2016, '2021-12-07 01:57:36', '2021-12-10 23:31:26'),
(48, '&lt;i&gt;Kamboja&lt;/i&gt;', 'Laos Universitys', 'BArch', 'Civil', 2021, '2021-12-10 23:30:37', '2021-12-10 23:37:52'),
(49, 'Kamboja1', 'Laos Universitys1', 'BFA', 'BKP', 2019, '2021-12-19 09:55:06', '2021-12-19 09:55:06'),
(50, 'Kamboja5', 'SMkN 3 PALU', 'BFA', 'Civil', 2013, '2021-12-19 09:55:37', '2021-12-19 09:55:37'),
(51, 'Palestine', 'Palestine University', 'certificate', 'MBA', 2016, '2021-12-19 09:56:12', '2021-12-19 09:56:12'),
(52, 'VietNam', 'TiengViet Univ', 'BArch', 'Software Enginering', 2012, '2021-12-19 09:57:00', '2021-12-19 09:57:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `questions` mediumtext NOT NULL,
  `answer` longtext NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `faq`
--

INSERT INTO `faq` (`id`, `questions`, `answer`, `created_at`, `updated_at`) VALUES
(1, 'Apakah bisa menambah Section website custom?', 'Tentu bisa, hanya dengan menamnbah 25$, kami akan membuatkan section/halaman yang\r\nmenampilkan data yang dinamis, pembuatan database dan membuat menu nya di halaman admin anda, dengan tingkat komplesifitas data dari mudah hingga menengah.', NULL, '2022-01-07 01:11:00'),
(2, 'Apakah bisa menambah Section wesite custom?', 'Tentu bisa, hanya dengan menamnbah 25$, kami akan membuatkan section/halaman yang nmenampilkan data yang dinamis, pembuatan database dan membuat menu nya di halaman admin anda, dengan tingkat komplesifitas data dari mudah hingga menengah.', NULL, '2022-01-08 11:32:43'),
(4, 'What\'s my questions?', 'I dont know meh!', '2022-01-07 00:52:37', '2022-01-07 00:52:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1629516904, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal`
--

CREATE TABLE `personal` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL COMMENT 'for persoal data',
  `born` text NOT NULL COMMENT 'for persoal data',
  `age` int(3) NOT NULL COMMENT 'for persoal data',
  `gender` enum('male','female') NOT NULL COMMENT 'for persoal data',
  `country` text NOT NULL COMMENT 'for persoal data',
  `about_text` longtext NOT NULL COMMENT 'for persoal data',
  `cv` varchar(150) NOT NULL COMMENT 'for persoal data',
  `img` varchar(225) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `personal`
--

INSERT INTO `personal` (`id`, `fullname`, `born`, `age`, `gender`, `country`, `about_text`, `cv`, `img`, `created_at`, `updated_at`) VALUES
(1, 'Dai Jumana Pradha', 'The City', 22, 'male', 'Indonesia', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem eveniet nulla aliquam. Quisquam, tempora ratione possimus consectetur et quasi sint ab molestias beatae recusandae blanditiis debitis in quo vel obcaecati.', 'PersonalCV_Dec_11_2021-AM-01-49_1639208948.pdf', 'Personal_Sep_14_2021-PM-09-40_1631673639.jpg', NULL, '2022-01-15 22:54:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `portfolio`
--

CREATE TABLE `portfolio` (
  `id` int(11) NOT NULL COMMENT 'portfolio id',
  `file_name` mediumtext NOT NULL COMMENT 'file name of portfolio',
  `type` enum('image','video') NOT NULL COMMENT 'name type of portfolio',
  `captions` tinytext NOT NULL COMMENT 'captions of portfolio',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `portfolio`
--

INSERT INTO `portfolio` (`id`, `file_name`, `type`, `captions`, `created_at`, `updated_at`) VALUES
(3, 'Portfolio_Sep_17_2021-AM-07-21_1631881265.jpg', 'image', 'Table Services Half Restaurant', '2021-09-17 07:21:06', '2021-09-17 07:21:06'),
(4, 'Portfolio_Sep_17_2021-AM-07-21_1631881301.jpg', 'image', 'Table Services screen shoot', '2021-09-17 07:21:41', '2021-09-17 07:21:41'),
(5, 'Portfolio_Sep_17_2021-AM-07-22_1631881332.jpg', 'image', 'Rajawali Umrah Landing Pages', '2021-09-17 07:22:12', '2021-09-17 07:22:12'),
(6, 'Portfolio_Sep_17_2021-AM-07-22_1631881369.jpg', 'image', 'Rajawali Umrah Admin Pages', '2021-09-17 07:22:50', '2021-09-17 07:22:50'),
(7, 'Portfolio_Sep_17_2021-AM-07-23_1631881426.jpg', 'image', 'Rajawali Umrah Mobile Display', '2021-09-17 07:23:46', '2021-09-17 07:23:46'),
(8, 'Portfolio_Sep_17_2021-AM-07-24_1631881477.jpg', 'image', 'Rajawali Umrah Contact section', '2021-09-17 07:24:37', '2021-09-17 07:24:37'),
(9, 'Portfolio_Sep_17_2021-AM-07-30_1631881830.jpg', 'image', 'Rajawali Cargo Landing Pages', '2021-09-17 07:30:31', '2021-09-17 07:30:31'),
(10, 'Portfolio_Sep_17_2021-AM-07-31_1631881872.jpg', 'image', 'Rajawali cargo Contact Section', '2021-09-17 07:31:12', '2021-09-17 07:31:12'),
(11, 'Portfolio_Sep_17_2021-AM-07-31_1631881913.jpg', 'image', 'Rajawali Cargo Admin Pages', '2021-09-17 07:31:53', '2021-09-17 07:31:53'),
(12, 'Portfolio_Sep_17_2021-AM-07-32_1631881962.jpg', 'image', 'Rajawali Cargo Mobile Display', '2021-09-17 07:32:43', '2021-09-17 07:32:43'),
(33, 'iAz2C_WqJ5g', 'video', 'asdasd', '2021-10-11 12:03:46', '2021-10-11 12:03:46'),
(39, 'Portfolio_Nov_16_2021-AM-07-35_1637069739.jpg', 'image', 'GGWP', '2021-11-16 07:35:40', '2021-11-16 07:35:40'),
(42, 'Portfolio_Nov_16_2021-AM-07-42_1637070146.jpg', 'image', 'Syaitoon', '2021-11-16 07:42:27', '2021-11-16 07:42:27'),
(44, 'Portfolio_Nov_16_2021-AM-07-44_1637070261.jpg', 'image', 'SMK BISA!', '2021-11-16 07:44:21', '2021-11-16 07:44:21'),
(47, 'Portfolio_Nov_16_2021-AM-10-06_1637078802.jpg', 'image', 'Mashiro', '2021-11-16 10:06:43', '2021-11-16 10:06:43'),
(49, 'Portfolio_Nov_18_2021-PM-09-09_1637291358.jpg', 'image', 'Akasaka Devonosuke', '2021-11-18 21:09:19', '2021-11-18 21:09:19'),
(58, '1HDnwrxXCZk', 'video', 'New VIdeo', '2022-02-11 09:22:12', '2022-02-11 09:22:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` mediumtext NOT NULL,
  `features` text NOT NULL,
  `img` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `services`
--

INSERT INTO `services` (`id`, `name`, `description`, `features`, `img`, `created_at`, `updated_at`) VALUES
(1, 'Paket haji reguler', 'Informasi singkat paket', 'hotel, makan, tiket pesawat, akomodasi, Transport, Wisata, hotel, makan', 'services-sample.jpg', NULL, NULL),
(2, 'Paket Berdua', 'paket umroh reguler 2 orang detail', 'Semua akomodasi selama umroh, makan, tempat wisata, tempat belanja, oleh-oleh', 'services-sample.jpg', NULL, NULL),
(3, 'Paket Umroh+turki', '&lt;h1&gt;paket umroh reguler 1 orang+ wisata ke Turki&lt;/h1&gt;', 'Transport, Wisata, Oleh-oleh', 'services-sample.jpg', NULL, '2021-12-10 23:57:52'),
(8, 'Service One', 'This is a descriptions of Service Numbar Wan', 'Eat,Sleep,Code', 'Service_Dec_01_2021-AM-07-04_1638363874.jpg', '2021-12-01 07:04:35', '2021-12-01 07:10:32'),
(9, 'Service Number Two', 'This is a descriptions of service Namba To', 'Makang,Mandi,Minung', 'Service_Dec_01_2021-AM-07-12_1638364343.jpg', '2021-12-01 07:12:23', '2021-12-01 07:12:23'),
(11, 'asdasdasdasdasd', 'cvxcvrd s dasdas dasdasd', 'aaa,sss,ddf,fff,ggg', 'Service_Dec_05_2021-AM-11-44_1638726278.jpg', '2021-12-05 11:44:38', '2021-12-05 11:44:38'),
(12, 'The Services', 'this is a descriptions', 'Makan,Mandi,Tidor', 'Service_Dec_07_2021-AM-03-13_1638868387.jpg', '2021-12-07 03:09:04', '2021-12-07 03:13:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `skill_name` varchar(150) NOT NULL,
  `skill_value` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `skills`
--

INSERT INTO `skills` (`id`, `skill_name`, `skill_value`, `created_at`, `updated_at`) VALUES
(2, 'CSS Materialize', 83, NULL, '2021-08-19'),
(4, 'Codeigniter 4', 75, NULL, '2021-09-02'),
(45, 'React JS', 74, '2021-10-11 08:06:51', '2021-10-11'),
(48, 'Angular', 85, '2021-10-23 09:31:35', '2021-10-23'),
(54, 'ES676', 79, '2021-11-16 09:54:43', '2021-11-16'),
(57, '&lt;h1&gt;Fluter&lt;/h1&gt;', 15, '2021-12-07 00:50:57', '2021-12-10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL COMMENT 'carousel id',
  `tagline` varchar(150) NOT NULL COMMENT 'Tagline carousel text',
  `description` text NOT NULL COMMENT 'description carousel text',
  `align` enum('left','right','center') NOT NULL DEFAULT 'left' COMMENT 'alignment carousel text',
  `img` varchar(225) NOT NULL DEFAULT 'carouselDefault.png' COMMENT 'image for carousel',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sliders`
--

INSERT INTO `sliders` (`id`, `tagline`, `description`, `align`, `img`, `created_at`, `updated_at`) VALUES
(1, 'Welcome To Subaru Projects web Profile!X', 'Welcome To Subaru Projects web Profile!X', 'right', 'Slider_Sep_12_2021-PM-10-27_1631503632.webp', NULL, '2021-12-07 01:48:48'),
(3, 'Making Big Jobs Small is the Job of a Programmer', 'Making Big Jobs Small is the Job of a Programmer', 'right', '1631457383_07896e9b75de37a27392.webp', '2021-08-19 03:30:33', '2021-11-16 10:15:22'),
(21, 'Jika malas itu baik, maka sudah dari dulu aku kaya', 'Jika malas itu baik, maka sudah dari dulu aku kayas', 'left', '1631457778_1b1a039e07f1aa840de3.webp', '2021-08-24 20:34:45', '2021-12-03 21:46:59'),
(22, 'Good looking merupakan penyamaran terbaik bagi penjahat.', 'Good looking merupakan penyamaran terbaik bagi penjahat.', 'right', '1631457854_eddb42a80a6ba6330d48.webp', '2021-08-24 20:54:55', '2021-09-12 09:44:16'),
(26, 'Lebih baik merasakan lelahnya belajar, daripada merasakan pedihnya kebodohan', 'Lebih baik merasakan lelahnya belajar, daripada merasakan pedihnya kebodohan', 'center', '1631457816_3316d821ba80860acf1d.webp', '2021-08-31 03:23:32', '2021-10-23 07:56:07'),
(56, 'Sample 0007', 'dari pada merasakan pedihnya kebodohan Sample', 'right', 'Slider_Feb_11_2022-AM-09-20_1644592822.webp', '2021-12-07 01:54:50', '2022-02-11 09:20:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `social_contact`
--

CREATE TABLE `social_contact` (
  `id` int(11) NOT NULL,
  `contact_type` varchar(45) NOT NULL COMMENT 'type of your social media',
  `link` mediumtext NOT NULL COMMENT 'your social media links or number phone',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `social_contact`
--

INSERT INTO `social_contact` (`id`, `contact_type`, `link`, `created_at`, `updated_at`) VALUES
(1, 'youtube', 'https://www.youtube.com/channel/UCgkN6uLicUVdbf_kk3pr3dg', '2021-08-15 08:56:19', '2021-08-15 08:56:19'),
(8, 'whatsapp', '0857-5706-3969', '2021-08-16 23:19:12', '2021-08-19 03:37:43'),
(19, 'twitter', 'https://twitter.com/daipradhaa', '2021-09-02 19:24:17', '2021-09-02 19:24:17'),
(24, 'discord', 'https://discord.com/daipradhaa', '2021-10-11 08:08:36', '2021-10-11 08:08:36'),
(28, 'twitch', 'https://twich.com', '2021-11-16 08:12:19', '2021-11-16 08:12:19'),
(31, 'envelope', 'mailto:devonwullan@gmail.com', '2021-11-20 20:41:44', '2021-11-20 20:41:44'),
(32, 'telephone', 'tel:+6285757063969', '2021-11-20 20:44:09', '2021-11-20 20:44:09'),
(36, 'telegram', 'tel:+6285757063969', '2021-11-21 03:32:46', '2021-11-21 03:32:46'),
(39, 'instagram', 'https://www.instagram.com/daipradaa/', '2021-12-07 00:55:17', '2021-12-07 00:55:17'),
(40, 'facebook', 'https://www.facebook.com/DaiJumanaPrada/', '2021-12-07 00:56:32', '2021-12-07 00:56:32'),
(43, 'github', 'https://github.com/daipradhaa', '2022-01-08 12:06:01', '2022-01-08 12:06:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'rnidevon@gmail.com', 'yura2022', '$2y$10$k4pmfgT.AXYayKIAzaVjtOPrPUD5AECXLhXJ7aXQBzIgyULD3lGDK', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-01-10 11:07:45', '2022-01-10 11:07:45', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `address_contact`
--
ALTER TABLE `address_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indeks untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indeks untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indeks untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indeks untuk tabel `cta`
--
ALTER TABLE `cta`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `educational`
--
ALTER TABLE `educational`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `social_contact`
--
ALTER TABLE `social_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `address_contact`
--
ALTER TABLE `address_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `cta`
--
ALTER TABLE `cta`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `educational`
--
ALTER TABLE `educational`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT untuk tabel `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `personal`
--
ALTER TABLE `personal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'portfolio id', AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT untuk tabel `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT untuk tabel `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'carousel id', AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT untuk tabel `social_contact`
--
ALTER TABLE `social_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
