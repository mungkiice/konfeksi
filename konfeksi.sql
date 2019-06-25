-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 13 Jun 2019 pada 17.18
-- Versi Server: 5.7.26-0ubuntu0.18.04.1
-- PHP Version: 7.2.19-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `konfeksi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikels`
--

CREATE TABLE `artikels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `artikels`
--

INSERT INTO `artikels` (`id`, `judul`, `gambar`, `deskripsi`, `created_at`, `updated_at`) VALUES
(2, 'Cottons', 'artikel/Z0X38vLI3YNnHGWu6PdBGL0ND3aa3rWP6cSqNaTX.jpeg', 'Anda perlu tahu jika bahan katun combed ini sendiri dibuat secara murni 100% dari serat kapas alami. Bahan combed memiliki tekstur yang sangat halus, adem dan sangat mudah sekali dalam menyerap keringat, sehingga hal tersebut akan sangat nyaman dan cocok sekali dalam dipakai di negara kita yang memiliki iklim tropis. Kain Combed sendiri memiliki serat benang halus dan terlihat rapi.', '2019-05-23 10:45:30', '2019-06-07 19:17:23'),
(3, 'Denim', 'artikel/ua8lwPzcTGlL5lzIxpXHAP5glDjKksA5kaPLfp5c.jpeg', 'Denim atau kain jeans adalah material kain yang begitu kokoh yang terbuat dari katun twill. Bahan denim sendiri memang banyak sekali digunakan dalam pembuatan celana yang sering kali Anda kenal sebagai bahan celana jeans, selain itu pada wanita bahan denim juga banyak sekali untuk digunakan pada jaket dan pakaian seperti bluss.', '2019-05-23 10:45:55', '2019-05-23 10:45:55'),
(4, 'Fleece', 'artikel/jsNjMBFS81lmon8vj7wKKypN96laT3eZUIdIJXJI.jpeg', 'Fleece adalah salah satu jenis kain yang menyerupai wol dan berbulu pada permukaannya, jenis kain ini mudah sekali dalam menguapkan keringat Anda melalui pori-pori pada kain dengan sangat cepat , memang akan terasa ringan jika dikenakan saat Anda berkeringat dikarenakan adanya sirkulasi udara yang terjadi dengan sangat-sangat baik sehingga jenis kain ini sangat nyaman untuk Anda kenakan.', '2019-05-23 10:46:21', '2019-05-23 10:46:21'),
(5, 'Polyester', 'artikel/LMdvluMpRox0JzX6hnO1greING2Og6GZUpxalCAe.jpeg', 'Polyester sendiri adalah jenis kain yang terbuat dari bahan serat sintetis atau serta buatan. Mengapa disebut hal demikian? Karena serat bahannya sendiri memang tidak tersedia secara bebas di alam. Polyester sendiri memang sebenarnya lebih mirip dengan cotton namun memiliki kualitasnya lebih rendah. Selain itu juga Polyester tidak akan menyerap keringat.', '2019-05-23 10:46:51', '2019-05-23 10:46:51'),
(6, 'Spandex', 'artikel/JyeSk7CsV8FBr5WJzeEr0B3TPqlfsDKzws299lZy.jpeg', 'Spandex adalah salah satu jenis kain juga yang mempunyai elestasitas yang sangat baik hampir mirip dengan karet elstasitasnya. Mengapa? Karena spandex sendiri mempunyai bahan 100% sintetis yang memang benar-benar diciptakan untuk menggantikan bahan karet. Tentunya bahan yang dibuat menggunakan polymer ini memang tergolong sangat kuat dan telah umum digunakan.', '2019-05-23 10:47:17', '2019-05-23 10:47:17'),
(7, 'Tetoron Cotton', 'artikel/kDkjjVP0nL0MiG59PbeojRXZ8MpJHG3e5zKchGqf.jpeg', 'Salah satu kain yang merupakan campuran campuran dari serat cotton dan polyester dalam pembuatannya, di mana 35% cotton combed dan 65% polyester. Diketahui juga kain jenis ini tidak begitu bisa dalam menyerap keringat sehingga kain tersebut nantinya akan terasa panas ketika telah dikenakan. Jika dilihat dari kelebihannya jenis kain ini sama sekali tidak mudah kusut, dan juga tidak mudah melar.', '2019-05-23 10:47:47', '2019-05-23 10:47:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfeksis`
--

CREATE TABLE `konfeksis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota_id` int(11) NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diverifikasi` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `konfeksis`
--

INSERT INTO `konfeksis` (`id`, `user_id`, `alamat`, `kota`, `kota_id`, `deskripsi`, `gambar`, `diverifikasi`, `created_at`, `updated_at`) VALUES
(2, 3, 'Jalan Belakang RSU Saiful Anwar', 'Kota Malang', 256, 'Kami adalah perusahaan yang mengkhususkan diri dibidang konveksi yang memproduksi dan menjual Jas Almamater, Toga Wisuda, Kaos Distro dan lain sebagainya. Harga yang kami tawarkan sangat murah dibawah rata-rata, dengan bantuan alat konveksi terbaru dan tenaga ahli dibidangnya terciptalah produk jas almamater unggulan yang setiap harinya dikirim kepada para pemesan diseluruh Indonesia. Segera hubungi kami untuk pemesanan dan penawaran, melayani pengiriman ke seluruh Indonesia dengan jasa pengiriman terdepan dan terpercaya.', 'konfeksi/sphY7tJNno5KFu0HF9WNJnjYjIDWYiDnZpDXC8rF.png', 1, '2019-05-23 10:06:01', '2019-05-23 10:32:07'),
(3, 5, 'Jalan Bareng Kulon', 'Kota Malang', 256, 'Baboon T-Shirt berdiri sejak tahun 2010. Berlokasi di Jl. Perum Dirgantara VI A6 No. 26 Lesanpuro Kedungkandang Malang, dengan produk andalannya yaitu konveksi pakaian.', 'konfeksi/glq70XP0Yl8CptILCWTZCB9j7eDecAF72UZ00ybr.jpeg', 1, '2019-05-23 14:20:05', '2019-05-23 14:21:19'),
(4, 10, 'Jalan Gajayana', 'Kota Malang', 256, 'Konfeksi di Malang', 'konfeksi/Qv8B9hTa8TYW9IbZSri0mbqpOVubZdtBw1EzGb4h.jpeg', 0, '2019-06-06 18:45:41', '2019-06-08 02:13:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_03_25_061103_create_konfeksis_table', 1),
(3, '2019_03_28_025301_create_notifications_table', 1),
(4, '2019_03_31_033239_create_ulasans_table', 1),
(5, '2019_03_31_033424_create_produks_table', 1),
(6, '2019_03_31_033425_create_pesanans_table', 1),
(7, '2019_03_31_033636_create_penawarans_table', 1),
(8, '2019_03_31_033818_create_artikels_table', 1),
(9, '2019_04_08_080046_create_status_pesanans_table', 1),
(10, '2019_04_08_170812_create_konfirmasi_pembayarans_table', 1),
(11, '2019_05_22_182034_create_pesans_table', 2),
(12, '2019_05_25_152924_add_pesanan_id_to_pesans', 2),
(13, '2019_06_07_003006_edit_member_to_pelanggan_users', 3),
(14, '2019_06_07_010324_add_new_role_to_users', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penawarans`
--

CREATE TABLE `penawarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pesanan_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `biaya` decimal(13,0) DEFAULT NULL,
  `catatan` text COLLATE utf8mb4_unicode_ci,
  `status` enum('terkirim','ditolak','diterima') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'terkirim',
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `penawarans`
--

INSERT INTO `penawarans` (`id`, `pesanan_id`, `tanggal_selesai`, `biaya`, `catatan`, `status`, `gambar`, `created_at`, `updated_at`) VALUES
(2, 1, '2019-05-24', '11243000', 'Desain sesuai dengan pesanan', 'ditolak', 'pesanan/lf2TjxN2r7vEPkkbK32ky33CpaQwKTCx7ksHdsHj.webp', '2019-05-23 15:18:12', '2019-05-23 15:22:52'),
(3, 1, '2019-06-07', '20000', 'Desain sesuai dengan pesanan dan ada biaya tambahan untuk kain luring', 'terkirim', '', '2019-05-23 15:24:14', '2019-05-27 15:31:53'),
(4, 2, '2019-06-27', '3420000', 'nanti saya buatkan yang bagus mas', 'terkirim', 'pesanan/LBTfWa7wey7bUEI2rAFQp6cjunV334Riawag5L5u.jpeg', '2019-06-05 06:34:54', '2019-06-05 06:34:54'),
(5, 4, '2019-06-21', '20000', 'biaya tambahan untuk tambahan kain ukuran XL.', 'diterima', '', '2019-06-07 02:57:17', '2019-06-07 05:01:24'),
(6, 5, '2019-06-28', NULL, NULL, 'diterima', '', '2019-06-12 03:30:40', '2019-06-12 03:31:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanans`
--

CREATE TABLE `pesanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `kode_pesanan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `biaya` decimal(13,0) NOT NULL DEFAULT '0',
  `catatan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_desain` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kota_id` int(11) DEFAULT NULL,
  `kurir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor_resi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `snap_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pesanans`
--

INSERT INTO `pesanans` (`id`, `user_id`, `produk_id`, `kode_pesanan`, `tanggal_selesai`, `biaya`, `catatan`, `file_desain`, `jumlah`, `alamat`, `kota_id`, `kurir`, `nomor_resi`, `snap_token`, `created_at`, `updated_at`) VALUES
(1, 4, 1, '7186698', '2019-06-07', '63000', 'Bahan parasut, bolak balik, pakai kain luring. - Desain sesuai dengan pesanan dan ada biaya tambahan untuk kain luring. - Desain sesuai dengan pesanan dan ada biaya tambahan untuk kain luring. - Desain sesuai dengan pesanan dan ada biaya tambahan untuk kain luring. - Desain sesuai dengan pesanan dan ada biaya tambahan untuk kain luring. - Desain sesuai dengan pesanan dan ada biaya tambahan untuk kain luring. - Desain sesuai dengan pesanan dan ada biaya tambahan untuk kain luring. - Desain sesuai dengan pesanan dan ada biaya tambahan untuk kain luring. - Desain sesuai dengan pesanan dan ada biaya tambahan untuk kain luring. - Desain sesuai dengan pesanan dan ada biaya tambahan untuk kain luring. - Desain sesuai dengan pesanan dan ada biaya tambahan untuk kain luring. - Desain sesuai dengan pesanan dan ada biaya tambahan untuk kain luring. - Desain sesuai dengan pesanan dan ada biaya tambahan untuk kain luring. - Desain sesuai dengan pesanan dan ada biaya tambahan untuk kain luring. - Desain sesuai dengan pesanan dan ada biaya tambahan untuk kain luring', 'pesanan/dbTj2IcYd2NF13WF7Rl2DDLAujkMBbi3C3eiM67i.jpg', '{\"S\":\"10\",\"M\":\"2\",\"L\":0,\"XL\":0}', 'Jalan H.Usman', 151, 'jne YES', '123123', '4247075e-75e9-4f3e-b1f7-5faed81242d5', '2019-05-23 15:02:06', '2019-06-08 04:47:23'),
(2, 4, 2, '3517130', NULL, '2520000', 'Logo ada 4 untuk satu payung', 'pesanan/IVF3DPyJ5C7dYbfheRejHSf5pP7D2W5cr1kevFkX.jpeg', '{\"S\":\"10\",\"M\":\"20\",\"L\":\"6\",\"XL\":0}', NULL, 1, NULL, 'kosong', NULL, '2019-05-23 16:03:40', '2019-06-08 04:51:11'),
(3, 4, 1, '6741403', NULL, '1200000', 'ajksdnijasnd', 'pesanan/HzcW7x5FKQD2n0K8lmnNQzJMbkHYe5iJpkn1Y5O2.jpeg', '{\"S\":\"10\",\"M\":\"2\",\"L\":0,\"XL\":0}', NULL, 1, NULL, NULL, NULL, '2019-06-05 20:40:15', '2019-06-05 20:40:15'),
(4, 4, 2, '6787853', '2019-06-21', '63000', 'Catatan tambahan untuk pesanan payung mantap.. - biaya tambahan untuk tambahan kain ukuran XL.. - biaya tambahan untuk tambahan kain ukuran XL.. - biaya tambahan untuk tambahan kain ukuran XL.. - biaya tambahan untuk tambahan kain ukuran XL.. - biaya tambahan untuk tambahan kain ukuran XL.', 'pesanan/0jtt9fjxeibf5WiWZ3iIN17QxPN5VOlI7NvsAWp6.jpeg', '{\"S\":\"1102\",\"M\":\"18\",\"L\":0,\"XL\":0}', 'Jalan H.Usman No.50 Rt 03/03 Kelapa Dua, Kebon Jeruk', 151, 'jne YES', NULL, '80b3a2b6-2b63-406b-a35e-c372f351b573', '2019-06-07 02:08:35', '2019-06-07 05:01:25'),
(5, 4, 1, '8763086', '2019-06-28', '2925000', 'Bahan yang adem. - . - ', 'pesanan/gX0ZeL5kN2NGCN46XCUSXtf45mOacCBlxtjxLRxW.jpeg', '{\"S\":\"10\",\"M\":\"2\",\"L\":\"12\",\"XL\":0}', 'Jalan Sumbersari 2 No.51', 256, 'pos Express Sameday Barang', NULL, '95df2cb6-108d-4097-804e-121dd9a77123', '2019-06-12 03:20:28', '2019-06-12 03:31:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesans`
--

CREATE TABLE `pesans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `pesanan_id` bigint(20) UNSIGNED NOT NULL,
  `teks` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pesans`
--

INSERT INTO `pesans` (`id`, `user_id`, `pesanan_id`, `teks`, `created_at`, `updated_at`) VALUES
(42, 4, 1, 'halo kakak', '2019-06-04 05:26:05', '2019-06-04 05:26:05'),
(43, 4, 1, 'haloo', '2019-06-04 05:46:55', '2019-06-04 05:46:55'),
(44, 4, 4, 'halo min', '2019-06-07 03:31:03', '2019-06-07 03:31:03'),
(45, 3, 4, 'iya ada apa nak?', '2019-06-07 03:32:47', '2019-06-07 03:32:47'),
(46, 4, 4, 'apakah biaya tambahan termasuk ongkir', '2019-06-07 03:32:52', '2019-06-07 03:32:52'),
(47, 3, 4, 'biaya tambahan khusus untuk biaya produksi, ongkos kirim sudah ada harganya sendiri', '2019-06-07 03:37:09', '2019-06-07 03:37:09'),
(48, 4, 4, 'oke', '2019-06-07 03:37:14', '2019-06-07 03:37:14'),
(50, 4, 4, 'makasih min', '2019-06-07 04:35:15', '2019-06-07 04:35:15'),
(51, 3, 4, 'sama - sama', '2019-06-07 19:20:44', '2019-06-07 19:20:44'),
(52, 3, 1, 'iya, ada yang bisa saya bantu?', '2019-06-07 19:31:08', '2019-06-07 19:31:08'),
(53, 4, 1, 'min', '2019-06-07 19:31:33', '2019-06-07 19:31:33'),
(54, 4, 1, 'makasih min', '2019-06-07 19:32:27', '2019-06-07 19:32:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produks`
--

CREATE TABLE `produks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `konfeksi_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` decimal(13,0) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `produks`
--

INSERT INTO `produks` (`id`, `konfeksi_id`, `nama`, `deskripsi`, `gambar`, `harga`, `created_at`, `updated_at`) VALUES
(1, 2, 'Almamater', '<p style=\"margin: 0.85em 0px; padding: 0px; border: 0px rgb(225, 225, 225); font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 13px; line-height: inherit; font-family: HelveticaNeue, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(102, 102, 102);\"><span style=\"margin: 0px; padding: 0px; border: 0px rgb(225, 225, 225); font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; color: rgb(168, 16, 16);\">JENIS-JENIS PRODUK ALMAMATER PENITISHOP</span><br>Produk yang kami hasilkan sangat beragam, diantaranya:</p><ul style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 7px; padding: 0px; border: 0px rgb(225, 225, 225); font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 13px; line-height: inherit; font-family: HelveticaNeue, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; vertical-align: baseline; list-style-position: initial; list-style-image: initial; color: rgb(102, 102, 102);\"><li style=\"margin: 0px 0px 0px 1em; padding: 3px 0px; border: 0px rgb(225, 225, 225); font: inherit; vertical-align: baseline;\">Almamater Mahasiswa / Almamater Universitas / Almamater Kampus</li><li style=\"margin: 0px 0px 0px 1em; padding: 3px 0px; border: 0px rgb(225, 225, 225); font: inherit; vertical-align: baseline;\">Almamater Sekolah SD</li><li style=\"margin: 0px 0px 0px 1em; padding: 3px 0px; border: 0px rgb(225, 225, 225); font: inherit; vertical-align: baseline;\">Almamater Sekolah SMP</li><li style=\"margin: 0px 0px 0px 1em; padding: 3px 0px; border: 0px rgb(225, 225, 225); font: inherit; vertical-align: baseline;\">Almamater Sekolah SMA</li><li style=\"margin: 0px 0px 0px 1em; padding: 3px 0px; border: 0px rgb(225, 225, 225); font: inherit; vertical-align: baseline;\">Almamater BEM</li><li style=\"margin: 0px 0px 0px 1em; padding: 3px 0px; border: 0px rgb(225, 225, 225); font: inherit; vertical-align: baseline;\">Almamater OSIS</li><li style=\"margin: 0px 0px 0px 1em; padding: 3px 0px; border: 0px rgb(225, 225, 225); font: inherit; vertical-align: baseline;\">Almamater UKM</li><li style=\"margin: 0px 0px 0px 1em; padding: 3px 0px; border: 0px rgb(225, 225, 225); font: inherit; vertical-align: baseline;\">Almamater Dinas</li><li style=\"margin: 0px 0px 0px 1em; padding: 3px 0px; border: 0px rgb(225, 225, 225); font: inherit; vertical-align: baseline;\">Almamater Organisasi</li><li style=\"margin: 0px 0px 0px 1em; padding: 3px 0px; border: 0px rgb(225, 225, 225); font: inherit; vertical-align: baseline;\">almamater Jamaah Haji, Jamaah Yasin, Jamaah Tahlil dan Masih banyak lagi</li></ul><p style=\"margin: 0.85em 0px; padding: 0px; border: 0px rgb(225, 225, 225); font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 13px; line-height: inherit; font-family: HelveticaNeue, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(102, 102, 102);\"><span style=\"margin: 0px; padding: 0px; border: 0px rgb(225, 225, 225); font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; color: rgb(168, 16, 16);\">BAHAN UTAMA ALMAMATER</span><br>Bahan dasar Almamater yang kami gunakan merupakan yang terbaik dari yang terbaik, sedikit diantaranya yaitu:</p><ul style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 7px; padding: 0px; border: 0px rgb(225, 225, 225); font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 13px; line-height: inherit; font-family: HelveticaNeue, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; vertical-align: baseline; list-style-position: initial; list-style-image: initial; color: rgb(102, 102, 102);\"><li style=\"margin: 0px 0px 0px 1em; padding: 3px 0px; border: 0px rgb(225, 225, 225); font: inherit; vertical-align: baseline;\">High Quality Drill</li><li style=\"margin: 0px 0px 0px 1em; padding: 3px 0px; border: 0px rgb(225, 225, 225); font: inherit; vertical-align: baseline;\">Super Quality Drill</li><li style=\"margin: 0px 0px 0px 1em; padding: 3px 0px; border: 0px rgb(225, 225, 225); font: inherit; vertical-align: baseline;\">Navara Drill</li><li style=\"margin: 0px 0px 0px 1em; padding: 3px 0px; border: 0px rgb(225, 225, 225); font: inherit; vertical-align: baseline;\">Soft Twis Drill</li><li style=\"margin: 0px 0px 0px 1em; padding: 3px 0px; border: 0px rgb(225, 225, 225); font: inherit; vertical-align: baseline;\">Dan banyak lagi</li></ul><p style=\"margin: 0.85em 0px; padding: 0px; border: 0px rgb(225, 225, 225); font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 13px; line-height: inherit; font-family: HelveticaNeue, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(102, 102, 102);\"><span style=\"margin: 0px; padding: 0px; border: 0px rgb(225, 225, 225); font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; color: rgb(168, 16, 16);\">HASIL KONVEKSI ALMAMATER</span><br>Adapun style, kain, warna dan ukuran Almamater adalah sesuai keinginan anda karena anda sangat bebas memilih Almamater bagaimana dikehendaki</p>', 'image/r6X9yK8dcez32L9nd7oCxhZhz2BnnwXlIROf6f71.jpeg', '120000', '2019-05-23 14:09:39', '2019-06-07 19:00:25');
INSERT INTO `produks` (`id`, `konfeksi_id`, `nama`, `deskripsi`, `gambar`, `harga`, `created_at`, `updated_at`) VALUES
(2, 2, 'Payung', '<p style=\"margin: 0.85em 0px; padding: 0px; border: 0px rgb(225, 225, 225); font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 13px; line-height: inherit; font-family: HelveticaNeue, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(102, 102, 102);\">Menerima pesanan Payung Susun 2, Payung Golf, Payung Standart, Payung Lipat, Payung Kotak, Payung Transparant, Payung Botol, Payung Lipat Kotak Kacamata. Sangat cocok untuk sarana Promosi / Souvenir Perusahaan, harga sudah termasuk cetak logo. Anda butuh Payung Promosi dengan waktu cepat dengan hasil prima hubungi kami (dalam waktu 2 hari kerja siap kirim sudah dicetak nama ).</p><p style=\"margin: 0.85em 0px; padding: 0px; border: 0px rgb(225, 225, 225); font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 13px; line-height: inherit; font-family: HelveticaNeue, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(102, 102, 102);\"><img src=\"data:image/jpeg;base64,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\" data-filename=\"payung5.JPG\" style=\"width: 500px;\"></p><p style=\"margin: 0.85em 0px; padding: 0px; border: 0px rgb(225, 225, 225); font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 13px; line-height: inherit; font-family: HelveticaNeue, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(102, 102, 102);\">Payung yang kami hasilkan merupakan desain terbaik dan menggunakan bahan-bahan kelas tinggi, sehingga memungkinkan anda ataupun perusahaan anda memilikinya, tentunya dengan corak dan desain yang anda inginkan. payung hasil produksi kami telah tersebar ke hampir seluruh indonesia khususnya perusahaan perbankan. bagi anda yang berminat ingin memesan payung seperti dibawah ini silahkan hubungi CS.<br></p>', 'image/YV3NhNkdWeqs3aFSQiZlzEiSRnTAuWWNeDdiOUXA.jpeg', '70000', '2019-05-23 14:13:18', '2019-05-23 14:13:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_pesanans`
--

CREATE TABLE `status_pesanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pesanan_id` bigint(20) UNSIGNED NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `status_pesanans`
--

INSERT INTO `status_pesanans` (`id`, `pesanan_id`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 1, 'menunggu respon dari konfeksi', '2019-05-23 15:02:06', '2019-05-23 15:02:06'),
(2, 1, 'menunggu konfirmasi penawaran', '2019-05-23 15:14:41', '2019-05-23 15:14:41'),
(5, 1, 'menunggu pembayaran DP', '2019-05-23 15:24:56', '2019-05-23 15:24:56'),
(12, 1, 'proses penjahitan', '2019-05-23 15:54:42', '2019-05-23 15:54:42'),
(13, 2, 'menunggu respon dari konfeksi', '2019-05-23 16:03:41', '2019-05-23 16:03:41'),
(14, 1, 'menunggu pembayaran DP', '2019-05-27 15:16:25', '2019-05-27 15:16:25'),
(15, 2, 'menunggu konfirmasi penawaran', '2019-06-05 06:34:54', '2019-06-05 06:34:54'),
(16, 3, 'menunggu respon dari konfeksi', '2019-06-05 20:40:15', '2019-06-05 20:40:15'),
(17, 4, 'menunggu respon dari konfeksi', '2019-06-07 02:08:35', '2019-06-07 02:08:35'),
(18, 4, 'menunggu konfirmasi penawaran', '2019-06-07 02:57:17', '2019-06-07 02:57:17'),
(19, 4, 'menunggu pembayaran DP', '2019-06-07 04:37:40', '2019-06-07 04:37:40'),
(28, 2, 'proses packaging', '2019-06-08 04:51:43', '2019-06-08 04:51:43'),
(29, 2, 'proses pemotongan', '2019-06-08 04:52:18', '2019-06-08 04:52:18'),
(30, 5, 'menunggu respon dari konfeksi', '2019-06-12 03:20:28', '2019-06-12 03:20:28'),
(31, 5, 'menunggu konfirmasi penawaran', '2019-06-12 03:30:40', '2019-06-12 03:30:40'),
(32, 5, 'menunggu pembayaran DP', '2019-06-12 03:31:25', '2019-06-12 03:31:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ulasans`
--

CREATE TABLE `ulasans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `konfeksi_id` bigint(20) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL,
  `komentar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ulasans`
--

INSERT INTO `ulasans` (`id`, `user_id`, `konfeksi_id`, `rating`, `komentar`, `created_at`, `updated_at`) VALUES
(1, 4, 2, 4, 'Hasil produknya bagus, respon dari konfeksinya cepat dan jelas.', '2019-05-23 15:50:08', '2019-05-23 15:50:08'),
(2, 3, 3, 5, NULL, NULL, NULL),
(3, 3, 3, 5, NULL, NULL, NULL),
(4, 4, 3, 4, 'Mantap min', '2019-06-07 19:21:41', '2019-06-07 19:21:41'),
(5, 4, 3, 5, 'mantappu jiwa', '2019-06-07 19:26:51', '2019-06-07 19:26:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('Pelanggan','Konfeksi','Admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pelanggan',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `nomor_telepon`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Marilyne Stark', 'admin@gmail.com', '$2y$10$RRIIyCkawbUSVmyJ2Yc9/eSAuH4isXwFL0o7WaAs3KZvDYZ2O61zK', '(855) 418-6926', 'Admin', '2019-05-23 09:44:08', '2019-05-23 09:44:08'),
(3, 'Penitishop', 'm.kurniawaniqbal@yahoo.com', '$2y$10$x4HjjyoTHRkpea5VRk4oHum5dY6OAfnn5B0E9x6SYxPxdAXl6C4Fy', '08128237812', 'Konfeksi', '2019-05-23 10:06:01', '2019-05-23 10:25:49'),
(4, 'Muhammad Iqbal Kurniawan', 'm.kurniawanibal@gmail.com', '$2y$10$11iu/b68PbVQdUmyliSTQutbxuUQQg.XNK0tzH722Jf55FpQfQLIK', '08127162317', 'Pelanggan', '2019-05-23 10:15:31', '2019-06-07 01:38:11'),
(5, 'Baboon T-Shirt', 'baboon@example.com', '$2y$10$uS0Cb1dkdvxSWbzsWqUgLeE56j5fTWPJKAejJ3vYfQPjITnG.DKyq', '08127616233', 'Pelanggan', '2019-05-23 14:20:05', '2019-05-23 14:20:05'),
(9, 'Pelanggan Pertama', 'pertama@example.com', '$2y$10$jb7vwDksya0bJfk/7XsoUuxSILTkyoWJeLs7wbA4haT3g2KAa9PpG', '08123123123', 'Pelanggan', '2019-06-06 18:17:42', '2019-06-06 18:17:42'),
(10, 'Defix Malang', 'defix@example.net', '$2y$10$jLEkF8.4EZ2iEDcKdla7g.ql/YAY2S.S2M6H6Pvx2DyLPLoLqhe8e', '9812389123', 'Konfeksi', '2019-06-06 18:45:41', '2019-06-06 18:45:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikels`
--
ALTER TABLE `artikels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `konfeksis`
--
ALTER TABLE `konfeksis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `konfeksis_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penawarans`
--
ALTER TABLE `penawarans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penawarans_pesanan_id_foreign` (`pesanan_id`);

--
-- Indexes for table `pesanans`
--
ALTER TABLE `pesanans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pesanans_kode_pesanan_unique` (`kode_pesanan`),
  ADD KEY `pesanans_user_id_foreign` (`user_id`),
  ADD KEY `pesanans_produk_id_foreign` (`produk_id`);

--
-- Indexes for table `pesans`
--
ALTER TABLE `pesans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pesans_user_id_foreign` (`user_id`),
  ADD KEY `pesans_pesanan_id_foreign` (`pesanan_id`);

--
-- Indexes for table `produks`
--
ALTER TABLE `produks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produks_konfeksi_id_foreign` (`konfeksi_id`);

--
-- Indexes for table `status_pesanans`
--
ALTER TABLE `status_pesanans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status_pesanans_pesanan_id_foreign` (`pesanan_id`);

--
-- Indexes for table `ulasans`
--
ALTER TABLE `ulasans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ulasans_user_id_foreign` (`user_id`),
  ADD KEY `ulasans_konfeksi_id_foreign` (`konfeksi_id`);

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
-- AUTO_INCREMENT for table `artikels`
--
ALTER TABLE `artikels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `konfeksis`
--
ALTER TABLE `konfeksis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `penawarans`
--
ALTER TABLE `penawarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pesanans`
--
ALTER TABLE `pesanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pesans`
--
ALTER TABLE `pesans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `produks`
--
ALTER TABLE `produks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `status_pesanans`
--
ALTER TABLE `status_pesanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `ulasans`
--
ALTER TABLE `ulasans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `konfeksis`
--
ALTER TABLE `konfeksis`
  ADD CONSTRAINT `konfeksis_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penawarans`
--
ALTER TABLE `penawarans`
  ADD CONSTRAINT `penawarans_pesanan_id_foreign` FOREIGN KEY (`pesanan_id`) REFERENCES `pesanans` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pesanans`
--
ALTER TABLE `pesanans`
  ADD CONSTRAINT `pesanans_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pesanans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pesans`
--
ALTER TABLE `pesans`
  ADD CONSTRAINT `pesans_pesanan_id_foreign` FOREIGN KEY (`pesanan_id`) REFERENCES `pesanans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pesans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `produks`
--
ALTER TABLE `produks`
  ADD CONSTRAINT `produks_konfeksi_id_foreign` FOREIGN KEY (`konfeksi_id`) REFERENCES `konfeksis` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `status_pesanans`
--
ALTER TABLE `status_pesanans`
  ADD CONSTRAINT `status_pesanans_pesanan_id_foreign` FOREIGN KEY (`pesanan_id`) REFERENCES `pesanans` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `ulasans`
--
ALTER TABLE `ulasans`
  ADD CONSTRAINT `ulasans_konfeksi_id_foreign` FOREIGN KEY (`konfeksi_id`) REFERENCES `konfeksis` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ulasans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
