-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Nov 2021 pada 12.43
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `produk_sidesa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota_kelompok`
--

CREATE TABLE `anggota_kelompok` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kelompok_id` bigint(20) UNSIGNED NOT NULL,
  `penduduk_id` bigint(20) UNSIGNED NOT NULL,
  `nomor_anggota` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota_keluarga`
--

CREATE TABLE `anggota_keluarga` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `keluarga_id` bigint(20) UNSIGNED NOT NULL,
  `penduduk_id` bigint(20) UNSIGNED NOT NULL,
  `hubungan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota_rumah_tangga`
--

CREATE TABLE `anggota_rumah_tangga` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rumahtangga_id` bigint(20) UNSIGNED NOT NULL,
  `penduduk_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota_suplemen`
--

CREATE TABLE `anggota_suplemen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `suplemen_id` bigint(20) UNSIGNED NOT NULL,
  `penduduk_id` bigint(20) UNSIGNED NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE `artikel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `kategoriartikel_id` bigint(20) UNSIGNED NOT NULL,
  `judul_artikel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi_artikel` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `view` int(11) NOT NULL,
  `gambar_artikel` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`id`, `user_id`, `kategoriartikel_id`, `judul_artikel`, `slug`, `isi_artikel`, `view`, `gambar_artikel`, `created_at`, `updated_at`) VALUES
(3, 1, 3, 'launching aplikasi sidesa (sistem informasi desa)', 'launching-aplikasi-sidesa-sistem-informasi-desa', '<p>MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower</p>\r\n\r\n<p>MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower to actually sit through a self-imposed MCSE training. who has the willpower to actually</p>', 1, '1616749110_about_banner.png', '2021-03-26 01:58:30', '2021-03-26 02:26:32'),
(4, 1, 2, 'cikara mengembangan aplikasi yang bagus', 'cikara-mengembangan-aplikasi-yang-bagus', '<p>MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower to actually sit through a self-imposed MCSE training.</p>', 0, '1616750706_20190724_105110.jpg', '2021-03-26 02:25:06', '2021-03-26 02:25:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bantuan`
--

CREATE TABLE `bantuan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sasaran` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_program` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `asal_dana` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `status` enum('aktif','tidak aktif') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bantuan`
--

INSERT INTO `bantuan` (`id`, `sasaran`, `nama_program`, `keterangan`, `asal_dana`, `tgl_mulai`, `tgl_akhir`, `status`, `created_at`, `updated_at`) VALUES
(2, 'keluarga - kk', 'PKK', 'bantuan untuk keluarga miskin', 'pusat', '2021-03-01', '2021-04-10', 'aktif', '2021-03-24 03:50:05', '2021-03-24 03:50:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `covid`
--

CREATE TABLE `covid` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `penduduk_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `covid`
--

INSERT INTO `covid` (`id`, `penduduk_id`, `status`, `keterangan`, `created_at`, `updated_at`, `tanggal`) VALUES
(6, 23, 'sembuh', '[{\"status\":\"terkonfirmasi\",\"tanggal\":\"2021-11-01\"},{\"status\":\"terkonfirmasi\",\"tanggal\":\"2021-11-02\",\"update\":\"2021-11-15\"},{\"status\":\"sembuh\",\"tanggal\":\"2021-11-14\"}]', '2021-11-15 06:36:52', '2021-11-15 07:13:58', '2021-11-14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_syarat_surat`
--

CREATE TABLE `data_syarat_surat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_syarat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `data_syarat_surat`
--

INSERT INTO `data_syarat_surat` (`id`, `nama_syarat`, `created_at`, `updated_at`) VALUES
(2, 'kartu penduduk', '2021-10-27 07:48:52', '2021-10-27 07:48:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dusun`
--

CREATE TABLE `dusun` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_dusun` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `dusun`
--

INSERT INTO `dusun` (`id`, `nama_dusun`, `nik`, `created_at`, `updated_at`) VALUES
(1, 'Dusun 1', '8273647362736489', '2021-03-23 19:43:06', '2021-11-02 01:55:43'),
(3, 'Pameutingan2', '3249479374749701', '2021-10-26 03:26:55', '2021-11-02 01:38:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `format_surat`
--

CREATE TABLE `format_surat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `klasifikasisurat_id` bigint(20) UNSIGNED NOT NULL,
  `nama_surat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai_masaberlaku` int(11) NOT NULL,
  `status_masaberlaku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `layanan_mandiri` enum('ya','tidak') COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_surat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `format_surat`
--

INSERT INTO `format_surat` (`id`, `kode`, `klasifikasisurat_id`, `nama_surat`, `nilai_masaberlaku`, `status_masaberlaku`, `layanan_mandiri`, `file_surat`, `created_at`, `updated_at`) VALUES
(2, 'S-01', 1, 'Keterangan Pengantar', 1, 'minggu', 'ya', '1632907852_surat_ket_pengantar.rtf', '2021-09-29 09:30:52', '2021-09-29 09:30:52'),
(3, 'S-02', 1, 'Keterangan Penduduk', 1, 'minggu', 'ya', '1632908538_surat_ket_penduduk.rtf', '2021-09-29 09:42:18', '2021-09-29 09:42:18'),
(4, 'S-03', 1, 'Biodata Penduduk', 1, 'minggu', 'ya', '1632909820_surat_bio_penduduk.rtf', '2021-09-29 10:03:40', '2021-09-29 10:03:40'),
(5, 'S-04', 1, 'Keterangan Pindah Penduduk', 1, 'minggu', 'ya', '1632909886_surat_ket_pindah_penduduk.rtf', '2021-09-29 10:04:46', '2021-09-29 10:04:46'),
(6, 'S-05', 1, 'Keterangan Jual Beli', 1, 'minggu', 'ya', '1632910016_surat_ket_jual_beli.rtf', '2021-09-29 10:06:56', '2021-09-29 10:06:56'),
(7, 'S-07', 1, 'Pengantar Surat Keterangan Catatan Kepolisian', 1, 'minggu', 'ya', '1632910066_surat_ket_catatan_kriminal.rtf', '2021-09-29 10:07:46', '2021-09-29 10:07:46'),
(8, 'S-08', 1, 'Keteranangan KTP dalam Proses', 1, 'minggu', 'ya', '1632910157_surat_ket_ktp_dalam_proses.rtf', '2021-09-29 10:09:17', '2021-09-29 10:09:17'),
(9, 'S-09', 1, 'Keterangan Beda Identitas', 1, 'minggu', 'ya', '1632910199_surat_ket_beda_nama.rtf', '2021-09-29 10:09:59', '2021-09-29 10:09:59'),
(10, 'S-10', 1, 'Keterangan Bepergian / Jalan', 1, 'minggu', 'ya', '1632910245_surat_jalan.rtf', '2021-09-29 10:10:45', '2021-09-29 10:10:45'),
(11, 'S-11', 1, 'Keterangan Kurang Mampu', 1, 'minggu', 'ya', '1632910281_surat_ket_kurang_mampu.rtf', '2021-09-29 10:11:21', '2021-09-29 10:11:21'),
(12, 'S-12', 1, 'Keterangan Izin Keramaian', 1, 'minggu', 'ya', '1632910330_surat_izin_keramaian.rtf', '2021-09-29 10:12:10', '2021-09-29 10:12:10'),
(13, 'S-13', 1, 'Pengantar Laporan Kehilangan', 1, 'minggu', 'ya', '1632910379_surat_ket_kehilangan.rtf', '2021-09-29 10:12:59', '2021-09-29 10:12:59'),
(14, 'S-14', 1, 'Keterangan Usaha', 1, 'minggu', 'ya', '1632966008_surat_ket_usaha.rtf', '2021-09-30 01:40:08', '2021-09-30 01:40:08'),
(15, 'S-15', 1, 'Keterangan JAMKESOS', 1, 'minggu', 'ya', '1632966037_surat_ket_jamkesos.rtf', '2021-09-30 01:40:37', '2021-09-30 01:40:37'),
(16, 'S-16', 1, 'Keterangan Domisili Usaha', 1, 'hari', 'ya', '1632966071_surat_ket_domisili_usaha.rtf', '2021-09-30 01:41:11', '2021-09-30 01:41:11'),
(17, 'S-17', 1, 'Keterangan Kelahiran', 1, 'minggu', 'ya', '1632966096_surat_ket_kelahiran.rtf', '2021-09-30 01:41:36', '2021-09-30 01:41:36'),
(18, 'S-18', 1, 'Permohonan Akta Lahir', 1, 'minggu', 'ya', '1632966124_surat_permohonan_akta.rtf', '2021-09-30 01:42:04', '2021-09-30 01:47:30'),
(19, 'S-19', 1, 'Pernyataan Belum Memiliki Akta Lahir', 1, 'hari', 'ya', '1632966495_surat_pernyataan_akta.rtf', '2021-09-30 01:48:15', '2021-09-30 01:48:15'),
(20, 'S-20', 1, 'Permohonan Duplikat Kelahiran', 1, 'hari', 'ya', '1632966535_surat_permohonan_duplikat_kelahiran.rtf', '2021-09-30 01:48:55', '2021-09-30 01:48:55'),
(21, 'S-21', 1, 'keterangan kematian', 1, 'hari', 'ya', '1632966604_surat_ket_kematian.rtf', '2021-09-30 01:50:04', '2021-09-30 01:50:04'),
(22, 'S-22', 1, 'keterangan lahir mati', 1, 'hari', 'ya', '1632966651_surat_ket_lahir_mati.rtf', '2021-09-30 01:50:51', '2021-09-30 01:50:51'),
(23, 'S-23', 1, 'Keterangan Untuk Nikah (N-1 s/d N-7)', 1, 'hari', 'ya', '1632966688_surat_ket_nikah.rtf', '2021-09-30 01:51:28', '2021-09-30 01:51:28'),
(24, 'S-30', 1, 'Keterangan Pergi Kawin', 1, 'hari', 'ya', '1632966716_surat_ket_pergi_kawin.rtf', '2021-09-30 01:51:56', '2021-09-30 01:51:56'),
(25, 'S-32', 1, 'keterangan wali hakim', 1, 'hari', 'ya', '1632966743_surat_ket_wali_hakim.rtf', '2021-09-30 01:52:23', '2021-09-30 01:52:23'),
(26, 'S-33', 1, 'permohonan duplikat surat nikah', 1, 'hari', 'ya', '1632966776_surat_permohonan_duplikat_surat_nikah.rtf', '2021-09-30 01:52:56', '2021-09-30 01:52:56'),
(27, 'S-34', 1, 'permohonan cerai', 1, 'hari', 'ya', '1632966799_surat_permohonan_cerai.rtf', '2021-09-30 01:53:19', '2021-09-30 01:53:19'),
(28, 'S-35', 1, 'keterangan pengantar rujuk/cerai', 1, 'hari', 'ya', '1632966884_surat_ket_rujuk_cerai.rtf', '2021-09-30 01:54:44', '2021-09-30 01:54:44'),
(29, 'S-35', 1, 'permohonan kartu keluarga', 1, 'hari', 'ya', '1632966915_surat_permohonan_kartu_keluarga.rtf', '2021-09-30 01:55:15', '2021-09-30 01:55:15'),
(30, 'S-37', 1, 'domilisi usaha non-warga', 1, 'hari', 'ya', '1632966953_surat_domisili_usaha_non_warga.rtf', '2021-09-30 01:55:53', '2021-09-30 01:55:53'),
(31, 'S-38', 1, 'keterangan beda identitas KIS', 1, 'hari', 'ya', '1632966984_surat_ket_beda_identitas_kis.rtf', '2021-09-30 01:56:24', '2021-09-30 01:56:24'),
(32, 'S-39', 1, 'keterangan izin orang tua/suami/istri', 1, 'hari', 'ya', '1632967031_surat_izin_orangtua_suami_istri.rtf', '2021-09-30 01:57:11', '2021-09-30 01:57:11'),
(33, 'S-40', 1, 'pernyataan penguasaan fisik bidang tanah (SPORADIK)', 1, 'hari', 'ya', '1632967082_surat_sporadik.rtf', '2021-09-30 01:58:02', '2021-09-30 01:58:02'),
(34, 'S-41', 1, 'permohonan perubahan kartu keluarga', 1, 'hari', 'ya', '1632967280_surat_permohonan_perubahan_kartu_keluarga.rtf', '2021-09-30 02:01:20', '2021-09-30 02:01:20'),
(35, 'S-31', 1, 'keterangan domisili', 1, 'hari', 'ya', '1632967331_surat_ket_domisili.rtf', '2021-09-30 02:02:11', '2021-09-30 02:02:11'),
(36, 'S-42', 1, 'keterangan penghasilan orangtua', 1, 'hari', 'ya', '1632967373_surat_ket_penghasilan_orangtua.rtf', '2021-09-30 02:02:53', '2021-09-30 02:02:53'),
(37, 'S-43', 1, 'pengantar permohonan penerbitan buku pas lintas', 1, 'hari', 'ya', '1632967408_surat_permohonan_penerbitan_buku_pas_lintas.rtf', '2021-09-30 02:03:28', '2021-09-30 02:03:28'),
(38, 'S-44', 1, 'keterangan penghasilan ayah', 1, 'hari', 'ya', '1632967436_surat_ket_penghasilan_ayah.rtf', '2021-09-30 02:03:56', '2021-09-30 02:03:56'),
(39, 'S-45', 1, 'keterangan penghasilan ibu', 1, 'hari', 'ya', '1632967459_surat_ket_penghasilan_ibu.rtf', '2021-09-30 02:04:19', '2021-09-30 02:04:19'),
(40, 'S-46', 1, 'perintah perjalanan dinas', 1, 'hari', 'ya', '1632967481_surat_perintah_perjalanan_dinas.rtf', '2021-09-30 02:04:41', '2021-09-30 02:04:41'),
(41, 'S-47', 1, 'kuasa', 1, 'hari', 'ya', '1632967524_surat_kuasa.rtf', '2021-09-30 02:05:24', '2021-09-30 02:06:46'),
(42, 'S-48', 1, 'keterangan kepemilikan kendaraan', 1, 'hari', 'ya', '1632967553_surat_ket_kepemilikan_kendaraan.rtf', '2021-09-30 02:05:53', '2021-09-30 02:05:53'),
(43, 'S-49', 1, 'keterangan kepemilikan tanah', 1, 'hari', 'ya', '1632967586_surat_ket_kepemilikan_tanah.rtf', '2021-09-30 02:06:26', '2021-09-30 02:06:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `forum`
--

CREATE TABLE `forum` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket_forum` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `poto` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `forum`
--

INSERT INTO `forum` (`id`, `nama`, `ket_forum`, `poto`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Diskusi Kebijakan PPKM', 'membahas tentang agenda PPKM desa', '1631574338_lahan-pertanian-shutterstock.jpg', 'aktif', '2021-09-13 23:05:38', '2021-09-13 23:05:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `forum_diskusi`
--

CREATE TABLE `forum_diskusi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `forum_id` bigint(20) UNSIGNED NOT NULL,
  `isi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri`
--

CREATE TABLE `galeri` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_galeri` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_galeri` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('aktif','tidak aktif') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `galeri`
--

INSERT INTO `galeri` (`id`, `nama_galeri`, `keterangan`, `gambar_galeri`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Cikara Studio', 'ini adalah album pertama', '1616986923_IMG-20200208-WA0005.jpg', 'aktif', '2021-03-28 20:02:03', '2021-03-28 20:02:03'),
(3, 'Pemagangan unsil6', 'pkl dari cendikia6', '1616989637_20191101_164544.jpg', 'aktif', '2021-03-28 20:19:48', '2021-03-28 20:51:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri_photo`
--

CREATE TABLE `galeri_photo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `galeri_id` bigint(20) UNSIGNED NOT NULL,
  `nama_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('aktif','tidak aktif') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `galeri_photo`
--

INSERT INTO `galeri_photo` (`id`, `galeri_id`, `nama_photo`, `photo`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'kegiatan dikelas', '1616989799_20191101_144741.jpg', 'aktif', '2021-03-28 20:16:25', '2021-03-28 20:50:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `informasi_publik`
--

CREATE TABLE `informasi_publik` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul_dokumen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_dokumen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_dokumen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_informasi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` year(4) NOT NULL,
  `status` enum('aktif','tidak aktif') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `info_website`
--

CREATE TABLE `info_website` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teks_atas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tentang` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maps` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo_brand` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `bg_produk` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_fb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_tw` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_yt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_in` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_pi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_ig` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sebutan_kabupaten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sebutan_desa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `info_website`
--

INSERT INTO `info_website` (`id`, `email`, `telp`, `teks_atas`, `tentang`, `alamat`, `maps`, `logo_brand`, `bg_produk`, `link_fb`, `link_tw`, `link_yt`, `link_in`, `link_pi`, `link_ig`, `created_at`, `updated_at`, `sebutan_kabupaten`, `sebutan_desa`) VALUES
(1, 'cikarastudio@gmail.com', '081322561697', 'Selamat Datang di Aplikasi Digital BUMDes', 'SID yang baik dirancang sebagai alat dukung untuk pelayanan di kantor desa. Fungsi yang dapat dilakukan antara lain administrasi kependudukan, perencanaan, pelaporan, inventarisir aset kantor desa, inventarisir sarana prasaranan di desa, pengelolaan anggaran desa,  layanan publik, dan lain sebagainya.', 'Perum Grand Sukarindik Regency Blok A 33 Tasikmalaya', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.447262188441!2d108.19525241477515!3d-7.303542994728801!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f5134320c3c31%3A0xa622852d7b1f7eba!2sCikara%20Studio!5e0!3m2!1sid!2sid!4v1629444227698!5m2!1sid!2sid\" width=\"100%\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'icon.png', '1629444316_bg-login.jpg', 'https://web.facebook.com/firman.chatomz/', 'https://twitter.com/firman_chatomz', 'https://www.youtube.com/channel/UCNnujqOJv9u-nFCZyY3V89A', NULL, NULL, NULL, '2021-04-06 06:05:04', '2021-09-23 09:32:14', 'kabupaten', 'desa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventaris`
--

CREATE TABLE `inventaris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_barang` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asal_usul` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_barang` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor_register` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `luas_tanah` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun_pengadaan` year(4) DEFAULT NULL,
  `lokasi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hak_tanah` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penggunaan_barang` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_sertifikat` date DEFAULT NULL,
  `no_sertifikat` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penggunaan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `merk` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ukuran` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bahan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor_pabrik` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor_rangka` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor_mesin` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor_polisi` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bpkb` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kondisi_bangunan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bangunan_bertingkat` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kontruksi_beton` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `luas_bangunan` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor_bangunan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_dok_bangunan` date DEFAULT NULL,
  `status_tanah` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor_kode_tanah` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kontruksi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `panjang` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lebar` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `luas` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_kepemilikan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_dok_kepemilikan` date DEFAULT NULL,
  `jenis_aset` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fisik_bangunan` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_mulai` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `inventaris`
--

INSERT INTO `inventaris` (`id`, `kode`, `nama_barang`, `asal_usul`, `harga`, `keterangan`, `kode_barang`, `nomor_register`, `luas_tanah`, `tahun_pengadaan`, `lokasi`, `hak_tanah`, `penggunaan_barang`, `tanggal_sertifikat`, `no_sertifikat`, `penggunaan`, `merk`, `ukuran`, `bahan`, `nomor_pabrik`, `nomor_rangka`, `nomor_mesin`, `nomor_polisi`, `bpkb`, `kondisi_bangunan`, `bangunan_bertingkat`, `kontruksi_beton`, `luas_bangunan`, `nomor_bangunan`, `tgl_dok_bangunan`, `status_tanah`, `nomor_kode_tanah`, `kontruksi`, `panjang`, `lebar`, `luas`, `no_kepemilikan`, `tgl_dok_kepemilikan`, `jenis_aset`, `jumlah`, `fisik_bangunan`, `tgl_mulai`, `created_at`, `updated_at`) VALUES
(1, 'tanah', '1.01.01.01.000 - TANAH BENGKOK', 'bantuan pemerintah', '14.000', 'fds fdsfsd fdsf', '52.01.14.2005.01.2021', '1.00.00.00.000.000001', '23', 2021, 'dfdf dfds sdf ds', 'hak pakai', 'pemerintah desa', '2021-03-18', '55555', 'permukiman', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-18 20:55:48', '2021-03-20 03:37:45'),
(2, 'peralatan-mesin', '2.01.01.01.003 - SWAMP TRACTOR + ATTACHMENT', 'bantuan pemerintah', '23000', 'fsdf dsf dsf ds', '52.01.14.2005.01.2021', '2.00.00.00.000.000001', NULL, 2015, NULL, NULL, 'ppk', NULL, NULL, NULL, 'tttt', '45', 'gggfgf fg', '55555', '44444', '3333', '2222', '8888', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-18 21:15:25', '2021-03-20 03:38:40'),
(3, 'gedung-bangunan', '3.00.00.00.000 - GEDUNG DAN BANGUNAN', 'hibah', '20000', 'ggg fgfg fg fg', '52.01.14.2005.01.2021', '2.00.00.00.000.000001', '444', 2011, 'ere aer aer ea', NULL, 'ppk', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rusak ringan', '3', NULL, '333', '44444', '2021-03-19', 'tanah milik pemda', '4455525', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-20 02:01:59', '2021-03-20 02:01:59'),
(4, 'jalan-irigasi-jaringan', '4.01.01.01.000 - JALAN DESA', 'bantuan provinsi', '560000', 'tr rt fg fsg sg fg', '52.01.14.2005.01.2021', '2.00.00.00.000.000001', NULL, 2012, 'fdf fd dff', NULL, 'lkmd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rusak berat', NULL, NULL, NULL, NULL, NULL, 'tanah negara (tanah yang dikuasai langsung oleh negara)', '7777', 'gfg fgf fg', '11', '22', '33', '5556655', '2021-03-13', NULL, NULL, NULL, NULL, '2021-03-20 02:12:34', '2021-03-20 02:12:34'),
(5, 'asset-tetap', '5.01.01.01.000 - BUKU', 'hak adat', '80000', 'gf fg fgffgf fgfg', '52.01.14.2005.01.2021', '2.00.00.00.000.000001', NULL, 2015, NULL, NULL, 'ppk', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'barang kesenian', '44', NULL, NULL, '2021-03-20 02:22:55', '2021-03-20 03:39:23'),
(6, 'kontruksi-pengerjaan', '565645645645654', 'pembelian sendiri', '20000', '6b 56 56 56', NULL, NULL, NULL, NULL, '656b 565', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', 'tidak aktif', NULL, '44444', '2021-03-23', 'tanah milik pemda', '4455525', NULL, NULL, NULL, '33', NULL, NULL, NULL, NULL, 'permanen', NULL, '2021-03-20 02:47:59', '2021-03-20 02:47:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`, `keterangan_kategori`, `label`, `created_at`, `updated_at`) VALUES
(1, 'keamanan', 'laporan terkait keamanan desa', 'lapor', '2021-09-12 17:00:00', '2021-09-12 17:00:00'),
(3, 'Sinovac', 'vaksin pertama', 'vaksinasi', '2021-11-03 09:58:08', '2021-11-03 09:58:08'),
(4, 'astrazeneca', 'vaksin varian delta', 'vaksinasi', '2021-11-03 23:32:23', '2021-11-03 23:32:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_artikel`
--

CREATE TABLE `kategori_artikel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategori_artikel`
--

INSERT INTO `kategori_artikel` (`id`, `nama_kategori`, `keterangan`, `created_at`, `updated_at`) VALUES
(2, 'Ekonomi', 'artikel yang membahas tentang ekonomi', '2021-03-26 00:36:32', '2021-03-26 00:36:32'),
(3, 'Perikanan', 'artikel tentang penghasilan ikan', '2021-03-26 00:36:47', '2021-03-26 00:37:42'),
(4, 'Olahraga', 'artikel tentang olahraga', '2021-03-26 00:37:53', '2021-03-26 00:37:53'),
(5, 'hewan', 'artikel tentang hewan', '2021-11-01 01:47:06', '2021-11-01 01:47:06'),
(6, 'tumbuhan', 'artikel tentang tumbuhan', '2021-11-01 01:47:06', '2021-11-01 01:47:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_kelompok`
--

CREATE TABLE `kategori_kelompok` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_kategori` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategori_kelompok`
--

INSERT INTO `kategori_kelompok` (`id`, `nama_kategori`, `deskripsi_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Programmer', 'kelompok yang bergerak dibidang komputasi', '2021-03-16 19:10:59', '2021-03-16 19:18:27'),
(3, 'produksi budidaya', 'penghasil tanaman dan tumbuhan budidaya', '2021-03-16 19:18:42', '2021-03-16 19:18:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelompok`
--

CREATE TABLE `kelompok` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategorikelompok_id` bigint(20) UNSIGNED NOT NULL,
  `penduduk_id` bigint(20) UNSIGNED NOT NULL,
  `nama_kelompok` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_kelompok` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_kelompok` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `keluarga`
--

CREATE TABLE `keluarga` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `penduduk_id` bigint(20) UNSIGNED NOT NULL,
  `no_kk` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status_kk` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `klasifikasi_surat`
--

CREATE TABLE `klasifikasi_surat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('aktif','tidak aktif') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `klasifikasi_surat`
--

INSERT INTO `klasifikasi_surat` (`id`, `kode`, `nama`, `keterangan`, `status`, `created_at`, `updated_at`) VALUES
(1, '000', 'UMUM', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(2, '001', 'Lambang', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(3, '001.1', 'Garuda', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(4, '001.2', 'Bendera Kebangsaan', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(5, '001.3', 'Lagu Kebangsaan', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(6, '001.4', 'Daerah', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(7, '001.31', 'Provinsi', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(8, '001.32', 'Kabupaten/Kota', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(9, '002', 'Tanda Kehormatan/Penghargaan untuk pegawai ', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(10, '002.1', 'Bintang', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(11, '002.2', 'Satyalencana', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(12, '002.3', 'Samkarya Nugraha', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(13, '002.4', 'Monumen', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(14, '002.5', 'Penghargaan Secara Adat', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(15, '002.6', 'Penghargaan lainnya', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(16, '003', 'Hari Raya/Besar', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(17, '003.1', 'Nasional 17 Agustus, Hari Pahlawan, dan sebagainya', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(18, '003.2', 'Hari Raya Keagamaan', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(19, '003.3', 'Hari Ulang Tahun', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(20, '003.4', 'Hari-hari Besar Internasional', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(21, '004', 'Ucapan', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(22, '004.1', 'Ucapan Terima Kasih', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(23, '004.2', 'Ucapan Selamat', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(24, '004.3', 'Ucapan Belasungkawa', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(25, '004.4', 'Ucapan Lainnya', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(26, '005', 'Undangan', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(27, '006', 'Tanda Jabatan', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(28, '006.1', 'Pamong Praja', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(29, '006.2', 'Tanda Pengenal', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(30, '006.3', 'Pejabat lainnya', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(31, '007', '-', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(32, '008', '-', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(33, '009', '-', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(34, '010', 'URUSAN DALAM ', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(35, '011', 'Kantor Dinas', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(36, '012', 'Rumah Dinas', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(37, '012.1', 'Tanah Untuk Rumah Dinas', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(38, '012.2', 'Perabot Rumah Dinas', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(39, '012.3', 'Rumah Dinas Golongan 1', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(40, '012.4', 'Rumah Dinas Golongan 2', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(41, '012.5', 'Rumah Dinas Golongan 3', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(42, '012.6', 'Rumah/Bangunan Lainnya', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(43, '012.7', 'Rumah Pejabat Negara', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(44, '013', 'Mess/Guest House', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(45, '014', 'Rumah Susun/Apartemen', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(46, '015', 'Penerangan Listrik/Jasa Listrik', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(47, '016', 'Telepon/Faximile/Internet', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(48, '017', 'Keamanan/Ketertiban Kantor', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(49, '018', 'Kebersihan Kantor', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(50, '019', 'Protokol', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(51, '019.1', 'Upacara Bendera', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(52, '019.2', 'Tata Tempat', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(53, '019.21', 'Pemasangan Gambar Presiden/Wakil Presiden', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(54, '019.3', 'Audiensi / Menghadap Pimpinan', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(55, '019.4', 'Alamat-Alamat Kantor Pejabat', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(56, '019.5', 'Bandir/Umbul-Umbul/Spanduk', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(57, '020', 'PERALATAN', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(58, '020.1', 'Penawaran', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(59, '021', 'Alat Tulis', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(60, '022', 'Mesin Kantor', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(61, '023', 'Perabot Kantor', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(62, '024', 'Alat Angkutan', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(63, '025', 'Pakaian Dinas', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(64, '026', 'Senjata', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(65, '027', 'Pengadaan', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(66, '028', 'Inventaris', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(67, '029', '-', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(68, '030', 'KEKAYAAN DAERAH', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(69, '031', 'Sumber Daya Alam', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(70, '032', 'Asset Daerah', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(71, '033', '-', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(72, '034', '-', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(73, '035', '-', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(74, '036', '-', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(75, '040', 'PERPUSTAKAAN DOKUMENTASI / KEARSIPAN / SANDI', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(76, '041', 'Perpustakaan', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(77, '041.1', 'Umum', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(78, '041.2', 'Khusus', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(79, '041.3', 'Perguruan Tinggi', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(80, '041.4', 'Sekolah', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(81, '041.5', 'Keliling', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(82, '042', 'Dokumentasi', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(83, '043', '-', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(84, '044', '-', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(85, '045', 'Kearsipan', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(86, '045.1', 'Pola Klasifikasi', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(87, '045.2', 'Penataan Berkas', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(88, '045.3', 'Penyusutan Arsip', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(89, '045.31', 'Jadwal Retensi Arsip', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(90, '045.32', 'Pemindahan Arsip', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(91, '045.33', 'Penilaian Arsip', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(92, '045.34', 'Pemusnahan Arsip', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(93, '045.35', 'Penyerahan Arsip', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(94, '045.36', 'Berita Acara Penyusutan Arsip', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(95, '045.37', 'Daftar Pencarian Arsip', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(96, '045.4', 'Pembinaan Kearsipan', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(97, '045.41', 'Bimbingan Teknis', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(98, '045.5', 'Pemeliharaan /Perawatan Arsip', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(99, '045.6', 'Pengawetan/Fumigasi', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(100, '046', 'Sandi', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(101, '047', 'Website', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(102, '048', 'Pengelolaan Data', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(103, '049', 'Jaringan Komunikasi Data', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(104, '050', 'PERENCANAAN', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(105, '050.1', 'Repelita/8 Sukses', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(106, '050.11', 'Pelita Daerah', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(107, '050.12', 'Bantuan Pembangunan Daerah', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(108, '050.13', 'Bappeda', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(109, '051', 'Proyek Bidang Pemerintahan, ', '', 'aktif', '2021-09-23 09:00:19', '2021-09-23 09:00:19'),
(110, '052', 'Bidang Politik', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(111, '053', 'Bidang Keamanan Dan Ketertiban', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(112, '054', 'Bidang Kesejahteraan Rakyat ', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(113, '055', 'Bidang Perekonomian ', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(114, '056', 'Bidang Pekerjaan Umum ', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(115, '057', 'Bidang Pengawasan', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(116, '058', 'Bidang Kepegawaian', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(117, '059', 'Bidang Keuangan', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(118, '060', 'ORGANISASI / KETATALAKSANAAN', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(119, '060.1', 'Program Kerja', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(120, '061', 'Organisasi Instansi Pemerintah (struktur organisasi)', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(121, '061.1', 'Susunan dan Tata Kerja', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(122, '061.2', 'Tata Tertib Kantor, Jam Kerja di Bulan Puasa', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(123, '062', 'Organisasi Badan Non Pemerintah', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(124, '063', 'Organisasi Badan Internasional', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(125, '064', 'Organisasi Semi Pemerintah, BKS-AKSI', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(126, '065', 'Ketatalaksanaan / Tata Naskah / Sistem', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(127, '066', 'Stempel Dinas', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(128, '067', 'Pelayanan Umum / Pelayanan Publik / Analisis', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(129, '068', 'Komputerisasi / Siskomdagri', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(130, '069', 'Standar Pelayanan Minimal', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(131, '070', 'PENELITIAN', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(132, '071', 'Riset', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(133, '072', 'Survey', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(134, '073', 'Kajian', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(135, '074', 'Kerjasama Penelitian Dengan Perguruan Tinggi', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(136, '075', 'Kementerian Lainnya', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(137, '076', 'Non Kementerian', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(138, '077', 'Provinsi', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(139, '078', 'Kabupaten/Kota', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(140, '079', 'Kecamatan /Desa', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(141, '080', 'KONFERENSI / RAPAT / SEMINAR', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(142, '081', 'Gubernur', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(143, '082', 'Bupati / Walikota', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(144, '083', 'Komponen, Eselon Lainnya', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(145, '084', 'Instansi Lainnya', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(146, '085', 'Internasional Di Dalam Negeri', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(147, '086', 'Internasional Di Luar Negeri', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(148, '087', '-', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(149, '088', '-', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(150, '089', '-', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(151, '090', 'PERJALANAN DINAS', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(152, '091', 'Perjalanan Presiden/Wakil Presiden Ke Daerah', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(153, '092', 'Perjalanan Menteri Ke Daerah', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(154, '093', 'Perjalanan Pejabat Tinggi (Pejabat Eselon 1)', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(155, '094', 'Perjalanan Pegawai Termasuk Pemanggilan Pegawai', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(156, '095', 'Perjalanan Tamu Asing Ke Daerah', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(157, '096', 'Perjalanan Presiden/Wakil Presiden Ke Luar Negeri', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(158, '097', 'Perjalanan Menteri Ke Luar Negeri', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(159, '098', 'Perjalanan Pejabat Tinggi Ke Luar Negeri', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(160, '099', 'Perjalanan Pegawai ke Luar Negeri', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(161, '100', 'PEMERINTAHAN', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(162, '101', 'negeri', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(163, '102', 'GDN', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(164, '103', '-', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(165, '104', '-', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(166, '105', '-', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(167, '110', 'PEMERINTAHAN PUSAT', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(168, '111', 'Presiden', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(169, '111.1', 'Pertanggung jawaban presiden kpd MPR', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(170, '111.2', 'Amanat Presiden/Amanat Kenegaraan/Pidato', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(171, '112', 'Wakil Presiden', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(172, '112.1', 'Pertanggung jawaban wakil presiden kepada MPR', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(173, '112.2', 'Amanat Wakil Presiden/Amanat Kenegaraan/Pidato', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(174, '113', 'Susunan Kabinet', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(175, '113.1', 'Reshuffle', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(176, '113.2', 'Penunjukan Menteri ad interim', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(177, '113.3', 'Sidang Kabinet', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(178, '114', 'Kementerian Dalam Negeri', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(179, '114.1', 'Amanat Menteri Dalam Negeri/Sambutan', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(180, '115', 'Kementerian lainnya', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(181, '116', 'Lembaga Tinggi Negara', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(182, '117', 'Lembaga Non Kementerian', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(183, '118', 'Otonomi/Desentralisasi/Dekonsentrasi', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(184, '119', 'Kerjasama Antar Kementerian', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(185, '120', 'PEMERINTAH PROVINSI', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(186, '120.04', 'Laporan daerah', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(187, '120.42', 'Monografi tambahkan kode wilayah', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(188, '120.1', 'Koordinasi', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(189, '120.2', 'Instansi Tingkat Provinsi', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(190, '120.21', 'Dinas Otonomi', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(191, '120.22', 'Instansi Vertikal', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(192, '120.23', 'Kerjasama antar Provinsi/Daerah', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(193, '121', 'Gubernur tambahkan kode wilayah, ', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(194, '122', 'Wakil Gubernur tambahkan kode wilayah, ', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(195, '123', 'Sekretaris Wilayah tambahkan kode wilayah, ', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(196, '124', 'Pembentukan/Pemekaran Wilayah', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(197, '124.1', 'Pembinaan/Perubahan Nama kepada: Daerah, Kota,Benda, Geografis, Gunung, Sungai, Pulau, Selat, Batas laut, dan sebagainya', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(198, '124.2', 'Pemekaran  Wilayah', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(199, '124.3', 'Forum Koordinasi lainnya', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(200, '125', 'Pembentukan Pemekaran Wilayah', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(201, '125.1', 'Pembinaan/Perubahan Nama Kepada: Daerah, Kota, Benda, Geografis, Gunung, Sungai, Pulau, Selat, Batas Laut, dan sebagainya.', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(202, '125.2', 'Pembentukan Wialayah', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(203, '125.3', 'Pemindahan Ibukota', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(204, '125.4', 'Perubahan batas Wilayah', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(205, '125.5', 'Pemekaran Wialayah', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(206, '126', 'Pembagian Wilayah', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(207, '127', 'Penyerahan Urusan', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(208, '128', 'Swaparaja/Penataan Wilayah/Daerah', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(209, '129', '-', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(210, '130', 'PEMERINTAH KABUPATEN / KOTA', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(211, '131', 'Pemberhentian, Serah Terima Jabatan, dsb', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(212, '132', 'Pemberhentian, Serah Terima Jabatan, Sekretaris Daerah Kabupaten/Kota, Tambahkan Kode Wilayah, ', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(213, '133', 'Pelantikan, Pemberhentian, Serah Terima Jabatan,.', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(214, '134', 'Forum Koordinasi Pemerintah Di Daerah', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(215, '134.1', 'Muspida', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(216, '134.2', 'Forum PAN (Panitian Anggaran Nasional)', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(217, '134.3', 'Forum Koordinasi Lainnya', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(218, '134.4', 'Kerjasama antar Kabupaten/Kota', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(219, '135', 'Pembentukan / Pemekaran Wilayah', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(220, '135.1', 'Pemindahan Ibukota', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(221, '135.2', 'Pembentukan Wilayah Pembantu Bupati/Walikota', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(222, '135.3', 'Pemabagian Wilayah Kabupaten/Kota', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(223, '135.4', 'Perubahan Batas Wilayah', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(224, '135.5', 'Pemekaran Wilayah', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(225, '135.6', 'Permasalahan Batas Wilayah', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(226, '135.7', 'Pembentukan Ibukota Kabupaten/Kota Pemberian dan Penggantian Nama Kabupaten/Kota, Daerah,', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(227, '135.8', 'Jalan', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(228, '136', 'Pembagian Wilayah', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(229, '137', 'Penyerahan Urusan', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(230, '138', 'Pemerintah Wilayah Kecamatan', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(231, '138.1', 'Sambutan / Pengarahan / Amanat', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(232, '138.2', 'Pembentukan Kecamatan', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(233, '138.3', 'Pemekaran Kecamatan', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(234, '138.4', 'Perluasan/Perubahan Batas Wilayah Kecamatan', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(235, '138.5', 'Pembentukan Perwakilan Kecamatan/Kemantren', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(236, '138.6', '-', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(237, '138.7', '-', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(238, '139', '-', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(239, '140', 'PEMERINTAHAN DESA / KELURAHAN', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(240, '141', 'Pengangkatan, Pemberhenian, dan sebagainya', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(241, '142', 'Penghasilan Pamong Desa', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(242, '143', 'Kekayaan Desa', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(243, '144', 'Dewan Tingkat Desa, Dewan Marga, Rembug Desa', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(244, '145', 'Administrasi Desa', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(245, '146', 'Kewilayahan', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(246, '146.1', 'Pembentukan Desa/Kelurahan', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(247, '146.2', 'Pemekaran Desa/Kelurahan', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(248, '146.3', 'Perubahan Batas Wilayah / Perluasan Desa / Kelurahan', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(249, '146.4', 'Perubahan Nama Desa / Kelurahan', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(250, '146.5', 'Kerjasama Antar Desa / Kelurahan', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(251, '147', 'Lembaga-lembaga Tingkat Desa', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(252, '148', 'Perangkat Kelurahan', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(253, '148.1', 'Kepala Kelurahan', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(254, '148.2', 'Sekretaris Kelurahan', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(255, '148.3', 'Staf Kelurahan', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(256, '149.1', 'Dewan Kelurahan', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(257, '149.2', 'Rukun Tetangga', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(258, '149.3', 'Rukun Warga', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(259, '149.4', 'Rukun Kampung', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(260, '150', 'LEGISLATIF MPR / DPR / DPD', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(261, '151', 'Keanggotaan MPR', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(262, '151.1', 'Pencalonan', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(263, '151.2', 'Pemberhentian', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(264, '151.3', 'Recall', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(265, '151.4', 'Pelanggaran', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(266, '152', 'Persidangan', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(267, '153', 'Kesejahteraan', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(268, '153.1', 'Keuangan', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(269, '153.2', 'Penghargaan', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(270, '154', 'Hak', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(271, '155', 'Keanggotaan DPR ', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(272, '156', 'Reses', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(273, '157', 'Kesejahteraan', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(274, '157.1', 'Keuangan', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(275, '157.2', 'Penghargaan', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(276, '158', 'Jawaban Pemerintah', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(277, '159', 'Hak', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(278, '160', 'DPRD PROVINSI TAMBAHKAN KODE WILAYAH', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(279, '161', 'Keanggotaan', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(280, '161.1', 'Pencalonan', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(281, '161.2', 'Pengangkatan', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(282, '161.3', 'Pemberhentian', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(283, '161.4', 'Recall', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(284, '161.5', 'Meninggal', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(285, '161.6', 'Pelanggaran', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(286, '162', 'Persidangan', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(287, '162.1', 'Reses', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(288, '163', 'Kesejahteraan', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(289, '163.1', 'Keuangan', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(290, '163.2', 'Penghargaan', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(291, '164', 'Hak', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(292, '165', 'Sekretaris DPRD Provinsi', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(293, '166', '-', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(294, '167', '-', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(295, '168', '-', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(296, '169', '-', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(297, '170', 'DPRD KABUPATEN TAMBAHKAN KODE WILAYAH', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(298, '171', 'Keanggotaan', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(299, '171.1', 'Pencalonan', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(300, '171.2', 'Pengangkatan', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(301, '171.3', 'Pemberhentian', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(302, '171.4', 'Recall', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(303, '171.5', 'Pelanggaran', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(304, '172', 'Persidangan', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(305, '173', 'Kesejahteraan', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(306, '173.1', 'Keuangan', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(307, '173.2', 'Penghargaan', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(308, '174', 'Hak', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(309, '175', 'Sekretaris DPRD Kabupaten/Kota', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(310, '176', '-', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(311, '177', '-', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(312, '178', '-', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(313, '180', 'HUKUM', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(314, '180.1', 'Kontitusi', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(315, '180.11', 'Dasar Hukum', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(316, '180.12', 'Undang-Undang Dasar', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(317, '180.2', 'GBHN', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(318, '180.3', 'Amnesti, Abolisi dan Grasi', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(319, '181', 'Perdata', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(320, '181.1', 'Tanah', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(321, '181.2', 'Rumah', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(322, '181.3', 'Utang/Piutang', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(323, '181.31', 'Gadai', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(324, '181.32', 'Hipotik', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(325, '181.4', 'Notariat', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(326, '182', 'Pidana', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(327, '182.1', 'Penyidik Pegawai Negeri Sipil (PPNS)', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(328, '183', 'Peradilan', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(329, '183.1', 'Bantuan Hukum', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(330, '184', 'Hukum Internasional', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(331, '185', 'Imigrasi', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(332, '185.1', 'Visa', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(333, '185.2', 'Pasport', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(334, '185.3', 'Exit', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(335, '185.4', 'Reentry', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(336, '185.5', 'Lintas Batas/Batas Antar Negara', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(337, '186', 'Kepenjaraan', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(338, '187', 'Kejaksaan', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(339, '188', 'Peraturan Perundang-Undangan', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(340, '188.1', 'TAP MPR', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(341, '188.2', 'Undang-Undang Dasar', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(342, '188.3', 'Peraturan', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(343, '188.31', 'Peraturan Pemerintah', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(344, '188.32', 'Peraturan Menteri', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(345, '188.33', 'Peraturan Lembaga Non Departemen', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(346, '188.34', 'Peraturan Daerah', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(347, '188.341', 'Peraturan Provinsi', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(348, '188.342', 'Peraturan Kabupaten/Kota', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(349, '188.4', 'Keputusan', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(350, '188.41', 'Presiden', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(351, '188.42', 'Menteri', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(352, '188.43', 'Lembaga Non Departemen', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(353, '188.44', 'Gubernur', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(354, '188.45', 'Bupati/Walikota', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(355, '188.5', 'Instruksi', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(356, '188.51', 'Presiden', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(357, '188.52', 'Menteri', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(358, '188.53', 'Lembaga Non Departemen', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(359, '188.54', 'Gubernur', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(360, '188.55', 'Bupati/Walikota', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(361, '189', 'Hukum Adat', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(362, '189.1', 'Tokoh Adat/Masyarakat', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(363, '190', 'HUBUNGAN LUAR NEGERI', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(364, '191', 'Perwakilan Asing', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(365, '192', 'Tamu Negara', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(366, '193', 'Kerjasama Dengan Negara Asing', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(367, '193.1', 'Asean', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(368, '193.2', 'Bantuan Luar Negeri/Hibah', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(369, '194', 'Perwakilan RI Di Luar Negeri/Hibah', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(370, '195', 'PBB', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(371, '196', 'Laporan Luar Negeri', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(372, '197', 'Hutang Luar Negeri PHLN/LOAN', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(373, '198', '-', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(374, '199', '-', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(375, '200', 'POLITIK', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(376, '201', 'Kebijaksanaan umum', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(377, '202', 'Orde baru', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(378, '203', 'Reformasi', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(379, '204', '-', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(380, '205', '-', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(381, '206', '-', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(382, '210', 'KEPARTAIAN', '', 'aktif', '2021-09-23 09:00:20', '2021-09-23 09:00:20'),
(383, '211', 'Lambang partai', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(384, '212', 'Kartu tanda anggota', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(385, '213', 'Bantuan keuangan parpol', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(386, '214', '-', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(387, '215', '-', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(388, '216', '-', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(389, '220', 'ORGANISASI KEMASYARAKATAN', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(390, '221', 'Berdasarkan perjuangan', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(391, '221.1', 'Perintis kemerdekaan', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(392, '221.2', 'angkatan 45', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(393, '221.3', 'Veteran', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(394, '222', 'Berdasarkan Kekaryaan', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(395, '222.1', 'PEPABRI', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(396, '222.2', 'Wredatama', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(397, '223', 'Berdasarkan kerohanian', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(398, '224', 'Lembaga adat', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(399, '225', 'Lembaga Swadaya Masyarakat', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(400, '226', '-', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(401, '230', 'ORGANISASI PROFESI DAN FUNGSIONAL', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(402, '231', 'Ikatan Dokter Indonesia', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(403, '232', 'Persatuan Guru Republik Indonesia', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(404, '233', 'PERSATUAN SARJANA HUKUM INDONESIA', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(405, '234', 'Persatuan Advokat Indonesia', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(406, '235', 'Lembaga Bantuan Hukum Indonesia', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(407, '236', 'Korps Pegawai Republik Indonesia', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(408, '237', 'Persatuan Wartawan Indonesia', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(409, '238', 'Ikatan Cendikiawan Muslim Indonesia', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(410, '239', 'Organisasi Profesi Dan Fungsional Lainnya', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(411, '240', 'ORGANISASI PEMUDA', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(412, '241', 'Komite Nasional Pemuda Indonesia', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(413, '242', 'Organisasi Mahasiswa', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(414, '243', 'Organisasi Pelajar', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(415, '244', 'Gerakan Pemuda Ansor', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(416, '245', 'Gerakan Pemuda Islam Indonesia', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(417, '246', 'Gerakan Pemuda Marhaenis', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(418, '247', '-', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(419, '248', '-', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(420, '250', 'ORGANISASI BURUH, TANI, NELAYAN DAN ANGKUTAN', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(421, '251', 'Federasi Buruh Seluruh Indonesia', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(422, '252', 'Organisasi Buruh Internasional', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(423, '253', 'Himpunan Kerukunan Tani', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(424, '254', 'Himpunan Nelayan Seluruh Indonesia', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(425, '255', 'Keluarga Sopir Proporsional Indonesia', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(426, '256', '-', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(427, '257', '-', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(428, '258', '-', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(429, '260', 'ORGANISASI WANITA', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(430, '261', 'Dharma Wanita', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(431, '262', 'Persatuan Wanita Indonesia', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(432, '263', 'Pemberdayaan Perempuan (wanita)', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(433, '264', 'Kongres Wanita', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(434, '265', '-', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(435, '266', '-', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(436, '267', '-', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(437, '268', '-', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(438, '269', '-', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(439, '270', 'PEMILIHAN UMUM', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(440, '271', 'Pencalonan', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(441, '272', 'Nomor Urut Partai / Tanda Gambar', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(442, '273', 'Kampanye', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(443, '274', 'Petugas Pemilu', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(444, '275', 'Pemilih / Daftar Pemilih', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(445, '276', 'Sarana', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(446, '276.1', 'TPS', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(447, '276.2', 'Kendaraan', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(448, '276.3', 'Surat Suara', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(449, '276.4', 'Kotak Suara', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(450, '276.5', 'Dana', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(451, '277', 'Pemungutan Suara / Perhitungan Suara', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(452, '278', 'Penetapan Hasil Pemilu', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(453, '279', 'Penetapan Perolehan Jumlah Kursi Dan Calon Terpilih', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(454, '280', 'Pengucapan Sumpah Janji MPR,DPR,DPD', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(455, '281', '', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(456, '282', '-', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(457, '283', '-', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(458, '284', '-', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(459, '300', 'KEAMANAN / KETERTIBAN', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(460, '301', 'Keamanan', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(461, '302', 'Ketertiban', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(462, '303', '-', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(463, '310', 'PERTAHANAN', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(464, '311', 'Darat', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(465, '312', 'Laut', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(466, '313', 'Udara', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(467, '314', 'Perbatasan', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(468, '315', '-', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(469, '316', '-', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(470, '317', '-', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(471, '320', 'KEMILITERAN', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(472, '321', 'Latihan Militer', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(473, '322', 'Wajib Militer', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(474, '323', 'Operasi Militer', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(475, '324', 'Kekaryaan TNI Pejabat Sipil dari TNI', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(476, '324.1', 'TMD', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(477, '325', '-', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(478, '326', '-', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(479, '327', '-', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(480, '328', '-', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(481, '330', 'KEAMANAN', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(482, '331', 'Kepolisian', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(483, '331.1', 'Polisi Pamong Praja', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(484, '331.2', 'Kamra', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(485, '331.3', 'Kamling', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(486, '331.4', 'Jaga Wana', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(487, '332', 'Huru-Hara / Demonstrasi', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(488, '333', 'Senjata Api Tajam', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(489, '334', 'Bahan Peledak', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(490, '335', 'Perjudian', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(491, '336', 'Surat-Surat Kaleng', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(492, '337', 'Pengaduan', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(493, '338', 'Himbauan / Larangan', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(494, '339', 'Teroris', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(495, '340', 'PERTAHANAN SIPIL', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(496, '341', 'Perlindungan Sipil', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(497, '342', '-', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(498, '343', '-', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(499, '344', '-', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(500, '350', 'KEJAHATAN', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(501, '351', 'Makar / Pemberontak', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(502, '352', 'Pembunuhan', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(503, '353', 'Penganiayaan, Pencurian', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(504, '354', 'Subversi / Penyelundupan / Narkotika', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(505, '355', 'Pemalsuan', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(506, '356', 'Korupsi / Penyelewengan / Penyalahgunaan Jabatan / KKN', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(507, '357', 'Pemerkosaan / Perbuatan Cabul', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(508, '358', 'Kenakalan', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(509, '359', 'Kejahatan Lainnya', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(510, '360', 'BENCANA', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(511, '361', 'Gunung Berapi / Gempa', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(512, '362', 'Banjir / Tanah Longsor', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(513, '363', 'Angin Topan', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(514, '364', 'Kebakaran', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(515, '364.1', 'Pemadam Kebakaran', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(516, '365', 'Kekeringan', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(517, '366', 'Tsunami', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(518, '367', '-', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(519, '368', '-', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(520, '370', 'KECELAKAAN / SAR', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(521, '371', 'Darat', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(522, '372', 'Udara', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(523, '373', 'Laut', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(524, '374', 'Sungai / Danau', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(525, '375', '-', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(526, '376', '-', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(527, '377', '-', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(528, '380', '-', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(529, '381', '-', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(530, '382', '-', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(531, '383', '-', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(532, '390', '-', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(533, '391', '-', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(534, '392', '-', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(535, '393', '-', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(536, '400', 'KESEJAHTERAAN RAKYAT', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(537, '401', 'Keluarga Miskin', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(538, '402', 'PNPM Mandiri Pedesaan', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(539, '403', '-', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21');
INSERT INTO `klasifikasi_surat` (`id`, `kode`, `nama`, `keterangan`, `status`, `created_at`, `updated_at`) VALUES
(540, '404', '-', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(541, '410', 'PEMBANGUNAN DESA', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(542, '411', 'Pembinaan Usaha Gotong Royong', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(543, '411.1', 'Swadaya Gotong Royong', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(544, '411.11', 'Penataan Gotong Royong', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(545, '411.12', 'Gotong Royong Dinamis', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(546, '411.13', 'Gotong Royong Statis', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(547, '411.14', 'Pungutan', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(548, '411.2', 'Lembaga Sosial Desa (LSD)', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(549, '411.21', 'Pembinaan', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(550, '411.22', 'Klasifikasi', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(551, '411.23', 'Proyek', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(552, '411.24', 'Musyawarah', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(553, '411.3', 'Latihan Kerja Masyarakat', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(554, '411.31', 'Kader Masyarakat', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(555, '411.32', 'Kuliah Kerja Nyata (KKN)', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(556, '411.33', 'Pusat Latihan', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(557, '411.34', 'Kursus-Kursus', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(558, '411.35', 'Kurikulum / Sylabus', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(559, '411.36', 'Ketrampilan', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(560, '411.37', 'Pramuka', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(561, '411.4', 'Pembinaan Kesejahteraan Keluarga (PKK)', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(562, '411.41', 'Program', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(563, '411.42', 'Pembinaan Organisasi', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(564, '411.43', 'Kegiatan', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(565, '411.5', 'Penyuluhan', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(566, '411.51', 'Publikasi', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(567, '411.52', 'Peragaan', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(568, '411.53', 'Sosio Drama', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(569, '411.54', 'Siaran Pedesaan', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(570, '411.55', 'Penyuluhan Lapangan', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(571, '411.6', 'Kelembagaan Desa', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(572, '411.61', 'Kelompok Tani', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(573, '411.62', 'Rukun Tani', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(574, '411.63', 'Subak', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(575, '411.64', 'Dharma Tirta', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(576, '412', 'Perekonomian Desa', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(577, '412.1', 'Produksi Desa', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(578, '412.11', 'Pengolahan', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(579, '412.12', 'Pemasaran', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(580, '412.2', 'Keuangan Desa', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(581, '412.21', 'Perkreditan Desa', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(582, '412.22', 'Inventarisasi Data', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(583, '412.23', 'Perkembangan / Pelaksanaan', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(584, '412.24', 'Bantuan / Stimulans', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(585, '412.25', 'Petunjuk / Pembinaan Pelaksanaan', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(586, '412.3', 'Koperasi Desa', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(587, '412.31', 'Badan Usaha Unit Desa (BUUD)', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(588, '412.32', 'Koperasi Usaha Desa', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(589, '412.4', 'Penataan Bantuan Pembangunan Desa', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(590, '412.41', 'Jumlah Desa Yang Diberi Bantuan', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(591, '412.42', 'Pengarahan', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(592, '412.43', 'Pusat', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(593, '412.44', 'Daerah', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(594, '412.5', 'Alokasi Bantuan Pembangunan Desa', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(595, '412.51', 'Pusat', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(596, '412.52', 'Daerah', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(597, '412.6', 'Pelaksanaan Bantuan Pembangunan Desa', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(598, '412.61', 'Bantuan Langsung', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(599, '412.62', 'Bantuan Keserasian', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(600, '412.63', 'Bantuan Juara Lomba Desa', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(601, '413', 'Prasarana Desa', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(602, '413.1', 'Prasarana Desa', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(603, '413.11', 'Pembinaan', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(604, '413.12', 'Bimbingan Teknis', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(605, '413.2', 'Pemukiman Kembali Penduduk', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(606, '413.21', 'Lokasi', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(607, '413.22', 'Diskusi', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(608, '413.23', 'Pelaksanaan', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(609, '413.3', 'Masyarakat Pradesa', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(610, '413.31', 'Pembinaan', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(611, '413.32', 'Penyuluhan', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(612, '413.4', 'Pemugaran Perumahan Dan Lingkungan Desa', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(613, '413.41', 'Rumah Sehat', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(614, '413.42', 'Proyek Perintis', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(615, '413.43', 'Pelaksanaan', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(616, '413.44', 'Pengembangan', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(617, '413.45', 'Perbaikan Kampung', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(618, '414', 'Pengembangan Desa', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(619, '414.1', 'Tingkat Perkembangan Desa', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(620, '414.11', 'Jumlah Desa', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(621, '414.12', 'Pemekaran Desa', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(622, '414.13', 'Pembentukan Desa Baru', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(623, '414.14', 'Evaluasi', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(624, '414.15', 'Bagan', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(625, '414.2', 'Unit Desa Kerja Pembangunan (UDKP)', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(626, '414.21', 'Penyuluhan Program', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(627, '414.22', 'Lokasi UDKP', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(628, '414.23', 'Pelaksanaan', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(629, '414.24', 'Bimbingan/Pembinaan', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(630, '414.25', 'Evaluasi', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(631, '414.3', 'Tata Desa', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(632, '414.31', 'Inventarisasi', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(633, '414.32', 'Penyusunan Pola Tata Desa', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(634, '414.33', 'Aplikasi Tata Desa', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(635, '414.34', 'Pemetaan', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(636, '414.35', 'Pedoman Pelaksanaan', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(637, '414.36', 'Evaluasi', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(638, '414.4', 'Perlombaan Desa', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(639, '414.41', 'Pedoman', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(640, '414.42', 'Penilaian', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(641, '414.43', 'Kejuaraan', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(642, '414.44', 'Piagam', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(643, '415', 'Koordinasi', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(644, '415.1', 'Sektor Khusus', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(645, '415.2', 'Rapat Koordinasi Horizontal (RKH)', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(646, '415.3', 'Tim Koordinasi Pusat (TKP)', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(647, '415.4', 'Kerjasama', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(648, '415.41', 'Luar Negeri (UNICEF)', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(649, '415.42', 'Perguruan Tinggi', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(650, '415.43', 'Kementerian / Lembaga Non Kementerian', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(651, '416', '-', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(652, '417', '-', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(653, '418', '-', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(654, '420', 'PENDIDIKAN', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(655, '420.1', 'Pendidikan Khusus Klasifikasi Disini Pendidikan Putra/I Irja', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(656, '421', 'Sekolah', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(657, '421.1', 'Pra Sekolah', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(658, '421.2', 'Sekolah Dasar', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(659, '421.3', 'Sekolah Menengah', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(660, '421.4', 'Sekolah Tinggi', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(661, '421.5', 'Sekolah Kejuruan', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(662, '421.6', 'Kegiatan Sekolah, Dies Natalis Lustrum', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(663, '421.7', 'Kegiatan Pelajar', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(664, '421.71', 'Reuni Darmawisata', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(665, '421.72', 'Pelajar Teladan', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(666, '421.73', 'Resimen Mahasiswa', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(667, '421.8', 'Sekolah Pendidikan Luar Biasa', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(668, '421.9', 'Pendidikan Luar Sekolah / Pemberantasan Buta Huruf', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(669, '422', 'Administrasi Sekolah', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(670, '422.1', 'Mapras, Perpeloncoan', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(671, '422.2', 'Tahun Pelajaran', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(672, '422.3', 'Hari Libur', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(673, '422.4', 'Uang Sekolah, Klasifikasi Disini SPP', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(674, '422.5', 'Beasiswa', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(675, '423', 'Metode Belajar', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(676, '423.1', 'Kuliah', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(677, '423.2', 'Ceramah, Simposium', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(678, '423.3', 'Diskusi', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(679, '423.4', 'Kuliah Lapangan, Widyawisata, KKN, Studi Tur', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(680, '423.5', 'Kurikulum', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(681, '423.6', 'Karya Tulis', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(682, '423.7', 'Ujian', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(683, '424', 'Tenaga Pengajar, Guru, Dosen, Dekan, Rektor', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(684, '425', 'Sarana Pendidikan', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(685, '425.1', 'Gedung', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(686, '425.11', 'Gedung Sekolah', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(687, '425.12', 'Kampus', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(688, '425.13', 'Pusat Kegiatan Mahasiswa', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(689, '425.2', 'Buku', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(690, '425.3', 'Perlengkapan Sekolah', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(691, '426', 'Keolahragaan', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(692, '426.1', 'Cabang Olah Raga', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(693, '426.2', 'Sarana', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(694, '426.21', 'Gedung Olah Raga', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(695, '426.22', 'Stadion', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(696, '426.23', 'Lapangan', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(697, '426.24', 'Kolam renang', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(698, '426.3', 'Pesta Olah Raga, ', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(699, '426.4', 'KONI', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(700, '427', 'Kepramukaan Meliputi: Organisasi Dan Kegiatan Remaja', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(701, '428', 'Kepramukaan', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(702, '429', 'Pendidikan  Kedinasan Untuk Depdagri, Lihat 890', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(703, '430', 'KEBUDAYAAN', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(704, '431', 'Kesenian', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(705, '431.1', 'Cabang Kesenian', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(706, '431.2', 'Sarana', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(707, '431.21', 'Gedung Kesenian', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(708, '432', 'Kepurbakalaan', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(709, '432.1', 'Museum', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(710, '432.2', 'Peninggalan Kuno', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(711, '432.21', 'Candi Termasuk Pemugaran', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(712, '432.22', 'Benda', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(713, '433', 'Sejarah', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(714, '434', 'Bahasa', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(715, '435', 'Usaha Pertunjukan, Hiburan, Kesenangan', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(716, '436', 'Kepercayaan', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(717, '437', '-', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(718, '438', '-', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(719, '439', '-', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(720, '440', 'KESEHATAN', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(721, '441', 'Pembinaan Kesehatan', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(722, '441.1', 'Gizi', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(723, '441.2', 'Mata', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(724, '441.3', 'Jiwa', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(725, '441.4', 'Kanker', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(726, '441.5', 'Usaha Kegiatan Sekolah (UKS)', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(727, '441.6', 'Perawatan', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(728, '441.7', 'Penyuluhan Kesehatan Masyarakat (PKM)', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(729, '441.8', 'Pekan Imunisasi Nasional', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(730, '442', 'Obat-obatan', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(731, '442.1', 'Pengadaan', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(732, '442.2', 'Penyimpanan', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(733, '443', 'Penyakit Menular', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(734, '443.1', 'Pencegahan', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(735, '443.2', 'Pemberantasan dan Pencegahan Penyakit Menular Langsung (P2ML)', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(736, '443.21', 'Kusta', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(737, '443.22', 'Kelamin', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(738, '443.23', 'Frambosia', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(739, '443.24', 'TBC / AIDS / HIV', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(740, '443.3', 'Epidemiologi dan Karantina (Epidka)', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(741, '443.31', 'Kholera', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(742, '443.32', 'Imunisasi', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(743, '443.33', 'Survailense', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(744, '443.34', 'Rabies (Anjing Gila) Antraks', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(745, '443.4', 'Pemberantasan & Pencegahan Penyakit Menular Sumber Binatang (P2B)', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(746, '443.41', 'Malaria', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(747, '443.42', 'Dengue Faemorrhagic Fever (Demam Berdarah HDF)', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(748, '443.43', 'Filaria', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(749, '443.44', 'Serangga', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(750, '443.5', 'Hygiene Sanitasi', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(751, '443.51', 'Tempat-tempat Pembuatan Dan Penjualan Makanan dan Minuman (TPPMM)', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(752, '443.52', 'Sarana Air Minum Dan Jamban Keluarga (Samijaga)', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(753, '443.53', 'Pestisida', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(754, '444', 'Gizi', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(755, '444.1', ' Kekurangan Makanan Bahaya Kelaparan, Busung Lapar', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(756, '444.2', 'Keracunan Makanan', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(757, '444.3', 'Menu Makanan Rakyat', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(758, '444.4', 'Badan Perbaikan Gizi Daerah (BPGD)', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(759, '444.5', 'Program Makanan Tambahn Anak Sekolah (PMT-AS)', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(760, '445', 'Rumah Sakit, Balai Kesehatan, PUSKESMAS, PUSKESMAS, Keliling, Poliklinik', '', 'aktif', '2021-09-23 09:00:21', '2021-09-23 09:00:21'),
(761, '446', 'Tenaga Medis', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(762, '448', 'Pengobatan Tadisional', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(763, '448.1', 'Pijat', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(764, '448.2', 'Tusuk Jarum', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(765, '448.3', 'Jamu Tradisional', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(766, '448.4', 'Dukun / Paranormal', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(767, '450', 'AGAMA', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(768, '451', 'Islam', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(769, '451.1', 'Peribadatan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(770, '451.11', 'Sholat', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(771, '451.12', 'Zakat Fitrah', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(772, '451.13', 'Puasa', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(773, '451.14', 'MTQ', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(774, '451.2', 'Rumah Ibadah', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(775, '451.3', 'Tokoh Agama', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(776, '451.4', 'Pendidikan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(777, '451.41', 'Tinggi', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(778, '451.42', 'Menengah', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(779, '451.43', 'Dasar', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(780, '451.44', 'Pondok Pesantren', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(781, '451.45', 'Gedung Sekolah', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(782, '451.46', 'Tenaga Pengajar', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(783, '451.47', 'Buku', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(784, '451.48', 'Dakwah', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(785, '451.49', 'Organisasi / Lembaga Pendidikan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(786, '451.5', 'Harta Agama Wakaf, Baitulmal, dsb', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(787, '451.6', 'Peradilan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(788, '451.7', 'Organisasi Keagamaan Bukan Politik Majelis Ulama', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(789, '451.8', 'Mazhab', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(790, '452', 'Protestan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(791, '452.1', 'Peribadatan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(792, '452.2', 'Rumah Ibadah', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(793, '452.3', 'Tokoh Agama, Rohaniawan, Pendeta, Domine', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(794, '452.4', 'Mazhab', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(795, '452.5', 'Organisasi Gerejani', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(796, '453', 'Katolik', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(797, '453.1', 'Peribadatan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(798, '453.2', 'Rumah Ibadah', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(799, '453.3', 'Tokoh Agama, Rohaniawan, Pendeta, Pastor', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(800, '453.4', 'Mazhab', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(801, '453.5', 'Organisasi Gerejani', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(802, '454', 'Hindu', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(803, '454.1', 'Peribadatan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(804, '454.2', 'Rumah Ibadah', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(805, '454.3', 'Tokoh Agama, Rohaniawan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(806, '454.4', 'Mazhab', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(807, '454.5', 'Organisasi Keagamaan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(808, '455', 'Budha', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(809, '455.1', 'Peribadatan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(810, '455.2', 'Rumah Ibadah', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(811, '455.3', 'Tokoh Agama, Rohaniawan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(812, '455.4', 'Mazhab', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(813, '455.5', 'Organisasi Keagamaan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(814, '456', 'Urusan Haji', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(815, '456.1', 'ONH', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(816, '456.2', 'Manasik', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(817, '457', '-', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(818, '458', '-', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(819, '458', '-', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(820, '460', 'SOSIAL', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(821, '461', 'Rehabilitasi Penderita Cacat', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(822, '461.1', 'Cacat Maat', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(823, '461.2', 'Cacat Tubuh', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(824, '461.3', 'Cacat Mental', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(825, '461.4', 'Bisul/Tuli', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(826, '462', 'Tuna Sosial', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(827, '462.1', 'Gelandangan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(828, '462.2', 'Pengemis', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(829, '462.3', 'Tuna Susila', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(830, '462.4', 'Anak Nakal', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(831, '463', 'Kesejahteraan Anak / Keluarga', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(832, '463.1', 'Anak Putus Sekolah', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(833, '463.2', 'Ibu Teladan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(834, '463.3', 'Anak Asuh', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(835, '464', 'Pembinaan Pahlawan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(836, '464.1', 'Tunjangan Kepada Pahlawan Dan Jandanya', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(837, '464.2', 'Dan Tunjangan Kepada Perintis', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(838, '464.3', 'Cacat Veteran', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(839, '465', 'Kesejahteraan Sosial', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(840, '465.1', 'Lanjut Usia', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(841, '465.2', 'Korban Kekacauan, Pengungsi, Repatriasi', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(842, '466', 'Sumbangan Sosial', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(843, '466.1', 'Korban Bencana', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(844, '466.2', 'Pencarian Dana Untuk Sumbangan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(845, '466.3', 'Meliputi: Penyelenggaraan Undian, Ketangkasan, Bazar, dsb', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(846, '466.4', 'Panti Asuhan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(847, '466.5', 'Panti Jompo', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(848, '467', ' Bimbingan Sosial', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(849, '467.1', 'Masyarakat Suku Terasing Meliputi: Bimbingan, Pendidikan, Kesehatan, Pemukiman', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(850, '468', 'PMI', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(851, '469', 'Makam', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(852, '469.1', 'Umum', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(853, '469.2', 'Pahlawan Meliputi: Penghargaan Kepada Pahlawan, Tunjangan Kpd Pahlawan Dan Jandanya', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(854, '469.3', 'Khusus Keluarga Raja', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(855, '469.4', 'Krematorium', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(856, '470', 'KEPENDUDUKAN', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(857, '471', 'Pendaftaran Penduduk', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(858, '471.1', 'Identitas Penduduk', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(859, '471.11', 'Biodata', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(860, '471.12', 'Nomor Induk Kependudukan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(861, '471.13', 'Kartu Tanda Penduduk', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(862, '471.14', 'Kartu Keluarga', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(863, '471.15', 'Advokasi Indentitas Penduduk', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(864, '471.2', 'Perpindahan Penduduk Dalam Wilayah Indonesia', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(865, '471.21', 'Perpindahan Penduduk WNI', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(866, '471.22', 'Perpindahan Penduduk WNA Dalam Wilayah Indonesia', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(867, '471.23', 'Perpindahan Penduduk WNA dan WNI Tinggal Sementara', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(868, '471.24', 'Daerah Terbelakan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(869, '471.25', 'Bedol Desa', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(870, '471.3', 'Perpindahan Penduduk Antar Negara', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(871, '471.31', 'Penduduk Indonesia Ke Luar Negeri', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(872, '471.32', 'Orang Asing Tinggal Sementara', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(873, '471.33', 'Orang Asing Tinggal Tetap', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(874, '471.34', 'Perpindahan Penduduk Antar Negara Di Wilayah Pembatasan Antar Negara (Pelintas Batas Tradisional)', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(875, '471.4', 'Pendaftaran Pengungsi Dan Penduduk Rentan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(876, '471.41', 'Akibat Bencana Alam', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(877, '471.42', 'Akibat Kerusuhan Sosial', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(878, '471.43', 'Pendaftaran Penduduk Daerah Terbelakang', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(879, '471.44', 'Pendaftaran Penduduk Rentan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(880, '472', 'Pencatatan Sipil', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(881, '472.1', 'Kelahiran, Kematian Dan Advokasi', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(882, '472.11', 'Kelahiran', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(883, '472.12', 'Kematian', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(884, '472.13', 'Advokasi Kelahiran Dan Kematian', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(885, '472.2', 'Perkawinan, Peceraian Dan Advokasi', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(886, '472.3', 'Perkawinan Agama Islam', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(887, '472.4', 'Perkawinan Agama Non Islam', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(888, '472.5', 'Perceraian Agama Islam', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(889, '472.6', 'Perceraian Agama Non Islam', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(890, '472.7', 'Advokasi Perkawinan Dan Perceraian', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(891, '472.3', 'Pengangkatan, Pengakuan, Dan Pengesahan Anak Serta Perubahan Dan Pembatalan Akta Dan Advokasi Pengangkatan Anak', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(892, '472.31', 'Pengangkatan Anak', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(893, '472.32', 'Pengakuan Anak', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(894, '472.33', 'Pengesahan Anak', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(895, '472.34', 'Perubahan Anak', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(896, '472.35', 'Pembatalan Anak', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(897, '472.36', 'Advokasi Pengurusan Pengangkatan, Pengakuan Dan Pengesahan Anak Serta Perubahan Dan Pembatalan Akta', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(898, '472.4', 'Pencatatan Kewarganegaraan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(899, '472.41', 'Akibat Perkawinan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(900, '472.42', 'Akibat Kelahiran', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(901, '472.43', 'Non Perkawinan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(902, '472.44', 'Non Kelahiran', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(903, '472.45', 'Perubahan WNI ke WNA', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(904, '473', 'Informasi Kependudukan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(905, '473.1', 'Teknologi Informasi', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(906, '473.11', 'Perangkat Keras', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(907, '473.12', 'Perangkat Lunak', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(908, '473.13', 'Jaringan Komunikasi Data', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(909, '473.2', 'Kelembagaan Dan Sumber Daya Informasi', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(910, '473.21', 'Daerah Maju', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(911, '473.22', 'Daerah Berkembang', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(912, '473.23', 'Daerah Terbelakang', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(913, '473.3', 'Pengolahan Data Kependudukan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(914, '473.31', 'Pendaftaran Penduduk', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(915, '473.32', 'Kejadian Vital Penduduk', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(916, '473.33', 'Penduduk Non Registrasi', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(917, '473.4', 'Pelayanan Informasi Kependudukan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(918, '473.41', 'Media Elektronik', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(919, '473.42', 'Media Cetak', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(920, '473.43', 'Outlet', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(921, '474', 'Perkembangan Penduduk', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(922, '474.1', 'Pengarahan Kuantitas Penduduk', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(923, '474.11', 'Struktur Jumlah', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(924, '474.12', 'Komposisi', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(925, '474.13', 'Fertilitas', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(926, '474.14', 'Kesehatan Reproduksi', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(927, '474.15', 'Morbiditas Penduduk', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(928, '474.16', 'Mortalitas Penduduk', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(929, '474.2', 'Pengembangan Kuantitas Penduduk', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(930, '474.21', 'Anak dan Remaja', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(931, '474.22', 'Penduduk Usia Produktif', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(932, '474.23', 'Penduduk Lanjut Usia', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(933, '474.24', 'Gender', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(934, '474.3', 'Penataan Persebaran Penduduk', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(935, '474.31', 'Migrasi Antar Wilayah', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(936, '474.32', 'Migrasi Internasional', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(937, '474.33', 'Urbanisasi', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(938, '474.34', 'Sementara', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(939, '474.35', 'Migrasi Non Permanen', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(940, '474.4', 'Perlindungan Pemberdayaan Penduduk', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(941, '474.41', 'Pengembangan Sistem Pelindungan Penduduk', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(942, '474.42', 'Pelayanan Kelembagaan Ekonomi', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(943, '474.43', 'Pelayanan Kelembagaan Sosial Budaya', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(944, '474.44', 'Partisipasi Masyarakat', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(945, '474.5', 'Pengembangan Wawasan Kependudukan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(946, '474.51', 'Pendidikan Jalur Sekolah', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(947, '474.52', 'Pendidikan Jalur Luar Sekolah', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(948, '474.53', 'Pendidikan Jalur Masyarakat', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(949, '474.54', 'Pembangunan Berwawasan Kependudukan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(950, '475', 'Proyeksi Dan Penyerasian Kebijakan Kependudukan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(951, '475.1', 'Indikator Kependudukan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(952, '475.11', 'Perumusan Penetapan Dan Pengembangan Indikator Kependudukan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(953, '475.12', 'Pemanfaatan Indikator Kependudukan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(954, '475.13', 'Sosialisasi Indikator Kependudukan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(955, '475.2', 'Proyeksi Kependudukan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(956, '475.21', 'Penyusunan Dan Pengembangan Proyeksi Kependudukan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(957, '475.22', 'Pemanfaatan Proyeksi Kependudukan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(958, '475.3', 'Analisis Dampak Kependudukan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(959, '475.31', 'Penyusunan Dan Pengembangan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(960, '475.32', 'Pemanfaatan Analisis Dampak Kependudukan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(961, '475.4', 'Penyerasian Kebijakan Lembaga Non Pemerintah', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(962, '475.41', 'Lembaga Internasioanal', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(963, '475.42', 'Lembaga Masyarakat Dan Nirlaba', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(964, '475.43', 'Lembaga Usaha Swasta', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(965, '475.5', 'Penyerasian Kebijakan Lembaga Pemerintah', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(966, '475.51', 'Lembaga Pemerintah', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(967, '475.52', 'Pemerintah Provinsidan Kota', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(968, '475.53', 'Pemerintah Kabupaten', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(969, '475.6', 'Analisis', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(970, '476', 'Monitoring', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(971, '477', 'Evaluasi', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(972, '478', 'Dokumentasi', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(973, '479', '-', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(974, '480', 'MEDIA MASSA', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(975, '481', 'Penerbitan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(976, '481.1', 'Surat Kabar', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(977, '481.2', 'Majalah', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(978, '481.3', 'Buku', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(979, '481.4', 'Penerjemahan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(980, '482', 'Radio', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(981, '482.1', 'RRI', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(982, '482.11', 'Siaran Pedesaan Jgn Diklasifikasikan Disini', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(983, '482.2', 'Non RRI', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(984, '482.3', 'Luar Negeri', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(985, '483', 'Televisi', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(986, '484', 'Film', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(987, '485', 'Pers', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(988, '485.1', 'Kewartawanan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(989, '485.2', 'Wawancara', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(990, '485.3', 'Informasi Nasional', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(991, '486', 'Grafika', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(992, '487', 'Penerangan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(993, '487.1', 'Pameran Non Komersil', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(994, '488', 'Operation Room', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(995, '489', 'Hubungan Masyarakat', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(996, '490', 'Pengaduan Masyarakat', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(997, '491', '-', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(998, '492', '-', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(999, '500', 'PEREKONOMIAN', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1000, '500.1', 'Dewan Stabilisasi', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1001, '501', 'Pengadaan Pangan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1002, '502', 'Pengadaan Sandang Perizinan Pada Umumnya Untuk Perizinan Suatu Bidang,', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1003, '503', 'Kalsifikasikan Masalahnya', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1004, '504', '-', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1005, '505', '-', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1006, '506', '-', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1007, '510', 'PERDAGANGAN', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1008, '510.1', 'Promosi Perdagangan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1009, '510.11', 'Pekan Raya', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1010, '510.12', 'Iklan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1011, '510.13', 'Pameran Non Komersil', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1012, '510.2', 'Pelelangan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1013, '510.3', 'Tera', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1014, '511', 'Pemasaran', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1015, '511.1', 'Sembilan Bahan Pokok, Tambahkan Kode Wilayah : Beras, Garam, Tanah, Minyak Goreng', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1016, '511.2', 'Pasar', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1017, '511.3', 'Pertokoan, Kaki Lima, Kios', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1018, '512', 'Ekspor', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1019, '513', 'Impor', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1020, '514', 'Perdagangan Antar Pulau', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1021, '515', 'Perdagangan Luar Negeri', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1022, '516', 'Pergudangan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1023, '517', 'Aneka Usaha Perdagangan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1024, '518', 'Koperasi untuk BUUD, KUD lihat ( 412.31-412.32)', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1025, '519', '-', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1026, '520', 'PERTANIAN', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1027, '521', 'Tanaman Pangan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1028, '521.1', 'Program', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1029, '521.11', 'Bimas / Inmas Termasuk Kredit', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1030, '521.12', 'Penyuluhan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1031, '521.2', 'Produksi', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1032, '521.21', 'Padi / Panen', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1033, '521.22', 'Palawija', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1034, '521.23', 'Jagung', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1035, '521.24', 'Ketela Pohon / Ubi-Ubian', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1036, '521.25', 'Hortikultura', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1037, '521.26', 'Sayuran / Buah-Buahan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1038, '521.27', 'Tanaman Hias', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1039, '521.28', 'Pembudidayaan Rumput Laut', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1040, '521.3', 'Saran Usaha Pertanian', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1041, '521.31', 'Peralatan Meliputi: Traktor Dan Peralatan Lainya', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1042, '521.32', 'Pembibitan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1043, '521.33', 'Pupuk', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1044, '521.4', 'Perlindungan Tanaman', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1045, '521.41', 'Penyakit, Penyakit Daun, Penyakit Batang Hama, Serangga, Wereng, Walang Sangit, Tungru, Tikus Dan Sejenisnya', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1046, '521.42', 'Pemberantasan Hama Meliputi: Penyemprotan, Penyiangan, Geropyokan, Sparayer,', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1047, '521.43', 'Pemberantasan Melalui Udara', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1048, '521.44', 'Pestisida', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1049, '521.5', 'Tanah Pertanian Pangan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1050, '521.51', 'Persawahan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1051, '521.52', 'Perladangan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1052, '521.53', 'Kebun', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1053, '521.54', 'Rumpun Ikan Laut', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1054, '521.55', 'KTA/Lahan Kritis', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1055, '521.6', 'Pengusaha Petani', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1056, '521.7', 'Bina Usaha', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1057, '521.71', 'Pasca Panen', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1058, '521.72', 'Pemasaran Hasil', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1059, '522', 'Kehutanan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1060, '522.1', 'Program', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22');
INSERT INTO `klasifikasi_surat` (`id`, `kode`, `nama`, `keterangan`, `status`, `created_at`, `updated_at`) VALUES
(1061, '522.11', 'Hak Pengusahaan Hutan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1062, '522.12', 'Tata Guna Hutan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1063, '522.13', 'Perpetaan Hutan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1064, '522.14', 'Tumpangsari', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1065, '522.2', 'Produksi', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1066, '522.21', 'Kayu', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1067, '522.22', 'Non Kayu', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1068, '522.3', 'Sarana  Usaha  Kehutanan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1069, '522.4', 'Penghijauan, Reboisasi', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1070, '522.5', 'Kelestarian', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1071, '522.51', 'Cagar Alam, Marga Satwa, Suaka Marga Satwa', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1072, '522.52', 'Berburu Meliputi Larangan Dan Ijin Berburu', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1073, '522.53', 'Kebun Binatang', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1074, '522.54', 'Konservasi Lahan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1075, '522.6', 'Penyakit/Hama', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1076, '522.7', 'Jenis-jenis Hutan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1077, '522.71', 'Hutan Hidup', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1078, '522.72', 'Hutan Wisata', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1079, '522.73', 'Hutan Produksi', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1080, '522.74', 'Hutan Lindung', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1081, '523', 'Perikanan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1082, '523.1', 'Program', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1083, '523.11', 'Penyuluhan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1084, '523.12', 'Teknologi', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1085, '523.2', 'Produksi', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1086, '523.21', 'Pelelangan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1087, '523.3', 'Usaha Perikanan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1088, '523.31', 'Pembibitan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1089, '523.32', 'Daerah Penagkapan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1090, '523.33', 'Pertambakan Meliputi: ( Tambak Ikan Air Deras, Tambak Udang dll )', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1091, '523.34', 'Jaring Terapung', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1092, '523.4', 'Sarana', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1093, '523.41', 'Peralatan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1094, '523.42', 'Kapal', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1095, '523.43', 'Pelabuhan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1096, '523.5', 'Pengusaha', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1097, '523.6', 'Nelayan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1098, '524', 'Peternakan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1099, '524.1', 'Produksi', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1100, '524.11', 'Susu Ternak Rakyat', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1101, '524.12', 'Telur', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1102, '524.13', 'Daging', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1103, '524.14', 'Kulit', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1104, '524.2', 'Sarana Usaha Ternak', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1105, '524.21', 'Pembibitan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1106, '524.22', 'Kandang Ternak', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1107, '524.3', 'Kesehatan Hewan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1108, '524.31', 'Penyakit Hewan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1109, '524.32', 'Pos Kesehatan Hewan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1110, '524.33', 'Tesi Pullorum', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1111, '524.34', 'Karantina', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1112, '524.35', 'Pemberantasan Penyakit Hewan Termasuk Usaha Pencegahannya', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1113, '524.4', 'Perunggasan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1114, '524.5', 'Pengembangan Ternak', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1115, '524.51', 'Inseminasi Buatan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1116, '524.52', 'Pembibitan / Bibit Unggul', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1117, '524.53', 'Penyebaran Ternak', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1118, '524.6', 'Makanan Ternak', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1119, '524.7', 'Tempat Pemotongan Hewan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1120, '524.8', 'Data Peternakan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1121, '525', 'Perkebunan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1122, '525.1', 'Program', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1123, '525.2', 'Produksi', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1124, '525.21', 'Karet', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1125, '525.22', 'The', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1126, '525.23', 'Tembakau', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1127, '525.24', 'Tebu', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1128, '525.25', 'Cengkeh', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1129, '525.26', 'Kopra', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1130, '525.27', 'Kopi', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1131, '525.28', 'Coklat', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1132, '525.29', 'Aneka Tanaman', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1133, '526', '-', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1134, '527', '-', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1135, '528', '-', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1136, '530', 'PERINDUSTRIAN', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1137, '530.08', 'Undang-Undang Gangguan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1138, '531', 'Industri Logam', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1139, '532', 'Industri Mesin/Elektronik', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1140, '533', 'Industri Kimia/Farmasi', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1141, '534', 'Industri Tekstil', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1142, '535', 'Industri Makanan / Minuman', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1143, '536', 'Aneka Industri / Perusahaan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1144, '537', 'Aneka Kerajinan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1145, '538', 'Usaha Negara / BUMN', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1146, '538.1', 'Perjan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1147, '538.2', 'Perum', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1148, '538.3', 'Persero / PT, CV', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1149, '539', 'Perusahaan Daerah / BUMD/BULD', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1150, '540', 'PERTAMBANGAN / KESAMUDRAAN', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1151, '541', 'Minyak Bumi / Bensin', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1152, '541.1', 'Pengusahaan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1153, '542', 'Gas bumi', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1154, '542.1', 'Eksploitasi / Pengeboran', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1155, '542.11', 'Kontrak Kerja', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1156, '542.2', 'Penogolahan,', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1157, '543', 'Aneka Tambang', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1158, '543.1', 'Timah', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1159, '543.2', 'Alumunium, Boxit', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1160, '543.3', 'Besi Termasuk Besi Tua', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1161, '543.4', 'Tembaga', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1162, '543.5', 'Batu Bara', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1163, '544', 'Logam Mulia,Emas,Intan,Perak', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1164, '545', 'Logam', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1165, '546', 'Geologi', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1166, '546.1', 'Vulkanologi', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1167, '546.11', 'Pengawasan Gunung Berapi', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1168, '546.2', 'Sumur Artesis, Air Bawah Tanah', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1169, '547', 'Hidrologi', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1170, '548', 'Kesamudraan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1171, '549', 'Pesisir Pantai', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1172, '550', 'PERHUBUNGAN', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1173, '551', 'Perhubungan Darat', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1174, '551.1', 'Lalu Lintas Jalan Raya, Sungai, Danau', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1175, '551.11', 'Keamanan Lalu Lintas, Rambu-Rambu', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1176, '551.2', 'Angkutan Jalan Raya', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1177, '551.21', 'Perizinan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1178, '551.22', 'Terminal', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1179, '551.23', 'Alat Angkutan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1180, '551.3', 'Angkutan Sungai', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1181, '551.31', 'Perizinan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1182, '551.32', 'Terminal', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1183, '551.33', 'Pelabuhan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1184, '551.4', 'Angkutan Danau', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1185, '551.41', 'Perizinan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1186, '551.42', 'Terminal', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1187, '551.43', 'Pelabuhan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1188, '551.5', 'Feri', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1189, '551.51', 'Perizinan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1190, '551.52', 'Terminal', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1191, '551.53', 'Pelabuhan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1192, '551.6', 'Perkereta-Apian', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1193, '552', 'Perhubungan Laut', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1194, '552.1', 'Lalu Lintas Angkutan Laut, Pelayanan Umum', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1195, '552.11', 'Keamanan Lalu Lintas, Rambu-Rambu', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1196, '552.12', 'Pelayaran Dalam Negeri', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1197, '552.13', 'Pelayaran Luar Negeri', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1198, '552.2', 'Perkapalan Alat Angkutan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1199, '552.3', 'Pelabuhan', '', 'aktif', '2021-09-23 09:00:22', '2021-09-23 09:00:22'),
(1200, '552.4', 'Pengerukan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1201, '552.5', 'Penjagaan Pantai', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1202, '553', 'Perhubungan Udara', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1203, '553.1', 'Lalu Lintas Udara / Keamanan Lalu Lintas Udara', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1204, '553.2', 'Pelabuhan Udara', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1205, '553.3', 'Alat Angkutan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1206, '554', 'Pos', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1207, '555', 'Telekomunikasi', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1208, '555.1', 'Telepon', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1209, '555.2', 'Telegram', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1210, '555.3', 'Telex / SSB, Faximile', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1211, '555.4', 'Satelit, Internet', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1212, '555.5', 'Stasiun Bumi, Parabola', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1213, '556', 'Pariwisata dan Rekreasi', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1214, '556.1', 'Obyek Kepariwisataan Taman Mini Indonesia Indah', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1215, '556.2', 'Perhotelan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1216, '556.3', 'Travel service', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1217, '556.4', 'Tempat Rekreasi', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1218, '557', 'Meteorologi', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1219, '557.1', 'Ramalan Cuaca', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1220, '557.2', 'Curah Hujan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1221, '557.3', 'Kemarau Panjang', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1222, '558', '-', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1223, '559', '-', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1224, '560', 'TENAGA KERJA', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1225, '560.1', 'Pengangguran', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1226, '561', 'Upah', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1227, '562', 'Penempatan Tenaga Kerja, TKI', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1228, '563', 'Latihan Kerja', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1229, '564', 'Tenaga Kerja', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1230, '564.1', 'Butsi', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1231, '564.2', 'Padat Karya', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1232, '565', 'Perselisihan Perburuhan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1233, '566', 'Keselamatan Kerja', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1234, '567', 'Pemutusan Hubungan Kerja', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1235, '568', 'kesejahteraan Buruh', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1236, '569', 'Tenaga Orang Asing', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1237, '570', 'PERMODALAN', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1238, '571', 'Modal Domestik', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1239, '572', 'Modal Asing', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1240, '573', 'Modal Patungan (Joint Venture) / Penyertaan Modal', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1241, '574', 'Pasar Uang Dan Modal', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1242, '575', 'Saham', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1243, '576', 'Belanja Modal', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1244, '577', 'Modal Daerah', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1245, '580', 'PERBANKAN / MONETER', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1246, '581', 'Kredit', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1247, '582', 'Investasi', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1248, '583', 'Pembukaan ,Perubahan,Penutupan Rekening, Deposito', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1249, '584', 'Bank Pembangunan Daerah', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1250, '585', 'Asuransi Dana Kecelakaan Lalu Lintas', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1251, '586', 'Alat Pembayaran, Cek, Giro, Wesel, Transfer', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1252, '587', 'Fiskal', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1253, '588', 'Hutang Negara', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1254, '589', 'Moneter', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1255, '590', 'AGRARIA', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1256, '591', 'Tataguna Tanah', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1257, '591.1', 'Pemetaan dan Pengukuran', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1258, '591.2', 'Perpetaan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1259, '591.3', 'penyediaan Data', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1260, '591.4', 'Fatwa Tata Guna Tanah', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1261, '591.5', 'Tanah Kritis', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1262, '592', 'Landreform', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1263, '592.1', 'Redistribusi', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1264, '592.11', 'Pendaftaran Pemilikan Dan Pengurusan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1265, '592.12', 'Penentuan Tanah Obyek Landreform', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1266, '592.13', 'Pembagian Tanah Obyek Landreform', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1267, '592.14', 'Sengketa Redistribusi Tanah Obyek Landreform', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1268, '592.2', 'Ganti Rugi', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1269, '592.21', 'Ganti Rugi Tanah Kelebihan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1270, '592.22', 'Ganti Rugi Tanah Absentee', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1271, '592.23', 'Ganti Rugi Tanah Partikelir', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1272, '592.3', 'Bagi Hasil', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1273, '592.31', 'Penetapan Imbangan Bagi Hasil', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1274, '592.32', 'Pelaksanaan Perjanjian Bagi Hasil', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1275, '592.33', 'Sengketa Perjanjian Bagi Hasil', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1276, '592.4', 'Gadai Tanah', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1277, '592.41', 'Pendaftaran Pemilikan Dan Pengurusan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1278, '592.42', 'Pelaksanaan Gadai Tanah', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1279, '592.43', 'Sengketa Gadai Tanah', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1280, '592.5', 'Bimbingan dan Penyuluhan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1281, '592.6', 'Pengembangan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1282, '592.7', 'Yayasan Dana Landreform', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1283, '593', 'Pengurusan Hak-Hak Tanah', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1284, '593.01', 'Penyusunan Program Dan Bimbingan Teknis', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1285, '593.1', 'Sewa Tanah', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1286, '593.11', 'Sewa Tanah Untuk Tanaman Tertentu, Tebu, Tembakau, Rosela, Chorcorus', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1287, '593.2', 'Hak Milik', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1288, '593.21', 'Perorangan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1289, '593.22', 'Badan Hukum', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1290, '593.3', 'Hak Pakai', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1291, '593.31', 'Perorangan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1292, '593.311', 'Warga Negara Indonesia', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1293, '593.312', 'Warga Negara Asing', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1294, '593.32', 'Badan Hukum', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1295, '593.321', 'Badan Hukum Indonesia', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1296, '593.322', 'Badan Hukum Asing, Kedutaan, Konsulat Kantor Dagang Asing', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1297, '593.33', 'Tanah Gedung-Gedung Negara', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1298, '593.4', 'Guna Usaha', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1299, '593.41', 'Perkebunan Besar', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1300, '593.42', 'Perkebunan Rakyat', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1301, '593.43', 'Peternakan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1302, '593.44', 'Perikanan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1303, '593.45', 'Kehutanan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1304, '593.5', 'Hak Guna Bangunan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1305, '593.51', 'Perorangan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1306, '593.52', 'Badan Hukum', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1307, '593.53', 'P3MB (Panitia Pelaksana Penguasaan Milik Belanda)', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1308, '593.54', 'Badan Hukum Asing Belanda-Prrk No 5165', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1309, '593.55', 'Pemulihan Hak (Pen Pres 4/1960)', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1310, '593.6', 'Hak Pengelolaan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1311, '593.61', 'PN Perumnas, Bonded Ware House, Industrial Estate, Real Estate', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1312, '593.62', 'Perusahaan Daerah Pembangunan Perumahan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1313, '593.7', 'Sengketa Tanah', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1314, '593.71', 'Peradilan Perkara Tanah', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1315, '593.8', 'Pencabutan dan Pembebasan Tanah', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1316, '593.81', 'Pencabutan Hak', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1317, '593.82', 'Pembebasan Tanah', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1318, '593.83', 'Ganti Rugi Tanah', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1319, '594', 'Pendaftaran Tanah', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1320, '594.1', 'Pengukuran / Pemetaan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1321, '594.11', 'Fotogrametri', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1322, '594.12', 'Terristris', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1323, '594.13', 'Triangulasi', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1324, '594.14', 'Peralatan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1325, '594.2', 'Dana Pengukuran (Permen Agraria No. 61/1965)', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1326, '594.3', 'Sertifikat', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1327, '594.4', 'Pejabat Pembuat Akta Tanah (PPAT)', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1328, '595', 'Lahan Transmigrasi', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1329, '595.1', 'Tataguna Tanah', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1330, '595.2', 'Landreform', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1331, '595.3', 'Pengurusan Hak-Hak Tanah', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1332, '595.4', 'Pendaftaran Tanah', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1333, '596', '-', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1334, '597', '-', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1335, '598', '-', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1336, '599', '-', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1337, '600', 'PEKERJAAN UMUM DAN KETENAGAKERJAAN', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1338, '601', 'Tata Bangunan Konstruksi Dan Industri Konstruksi', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1339, '602', 'Kontraktor Pemborong', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1340, '602.1', 'Tender', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1341, '602.2', 'Pennunjukan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1342, '602.3', 'Prakualifikasi', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1343, '602.31', 'Daftar Rekanan Mampu (DRM)', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1344, '602.32', 'Tanda Daftar Rekanan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1345, '603', 'Arsitektur', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1346, '604', 'Bahan Bangunan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1347, '604.1', 'Tanah Dan Batu Seperti: Batu Belah, Steen Slaag, Split dsb', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1348, '604.2', 'Aspal, Aspal Buatan, Aspal Alam (butas)', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1349, '604.3', 'Besi Dan Logam Lainnya', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1350, '604.31', 'Besi Beton', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1351, '604.32', 'Besi Profil', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1352, '604.33', 'Paku', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1353, '604.34', 'Alumunium, Profil', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1354, '604.4', 'Bahan-Bahan Pelindung Dan Pengawet ', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1355, '604.5', 'Semen', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1356, '604.6', 'Kayu', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1357, '604.7', 'Bahan Penutup Atap ', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1358, '604.8', 'Alat-Alat Penggantung Dan Pengunci', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1359, '604.9', 'Bahan-Bahan Bangunan Lainnya', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1360, '605', 'Instalasi', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1361, '605.1', 'Instalasi Bangunan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1362, '605.2', 'Instalasi Listrik', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1363, '605.3', 'Instalasi Air Sanitasi', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1364, '605.4', 'Instalasi Pengatur Udara', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1365, '605.5', 'Instalasi Akustik', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1366, '605.6', 'Instalasi Cahaya / Penerangan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1367, '606', 'Konstruksi Pencegahan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1368, '606.1', 'Konstruksi Pencegahan Terhadap Kebakaran', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1369, '606.2', 'Konstruksi Pencegahan Terhadap Gempa', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1370, '606.3', 'Konstruksi Penegahan Terhadap Angin Udara/Panas', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1371, '606.4', 'Konstruksi Pencegahan Terhadap Kegaduhan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1372, '606.5', 'Konstruksi Pencegahan Terhadap Gas/Explosive', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1373, '606.6', 'Konstruksi Pencegahan Terhadap Serangga', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1374, '606.7', 'Konstruksi Pencegahan Terhadap Radiasi Atom', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1375, '607', '-', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1376, '608', '-', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1377, '609', '-', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1378, '610', 'PENGAIRAN', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1379, '611', 'Irigasi', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1380, '611.1', 'Bangunan Waduk', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1381, '611.11', 'Bendungan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1382, '611.12', 'Tanggul', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1383, '611.13', 'Pelimpahan Banjir', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1384, '611.14', 'Menara Pengambilan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1385, '611.2', 'Bangunan Pengambilan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1386, '611.21', 'Bendungan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1387, '611.22', 'Bendungan Dengan Pintu Bilas', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1388, '611.23', 'Bendungan Dengan Pompa', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1389, '611.24', 'Pengambilan Bebas', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1390, '611.25', 'Pengambilan Bebas Dengan Pompa', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1391, '611.26', 'Sumur Dengan Pompa', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1392, '611.27', 'Kantung Lumpur', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1393, '611.28', 'Slit Ekstrator', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1394, '611.29', 'Escope Channel', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1395, '611.3', 'Bangunan Pembawa', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1396, '611.31', 'Saluran', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1397, '611.311', 'Saluran Induk', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1398, '611.312', 'Saluran Sekunder', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1399, '611.313', 'Suplesi', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1400, '611.314', 'Tersier', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1401, '611.315', 'Saluran Kwarter', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1402, '611.316', 'Saluran Pasangan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1403, '611.317', 'Saluran Tertutup / Terowongan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1404, '611.32', 'Bangunan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1405, '611.321', 'Bangunan Bagi', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1406, '611.322', 'Bangunan Bagi Dan Sadap', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1407, '611.323', 'Bangunan Sadap', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1408, '611.324', 'Bangunan Check', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1409, '611.325', 'Bangunan Terjun', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1410, '611.33', 'Box Tersier', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1411, '611.34', 'Got Miring', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1412, '611.35', 'Talang', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1413, '611.36', 'Syphon', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1414, '611.37', 'Gorong-Gorong', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1415, '611.38', 'Pelimpah Samping', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1416, '611.4', 'Bangunan Pembuang', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1417, '611.41', 'Saluran', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1418, '611.411', 'Saluran Pembuang Induk', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1419, '611.412', 'Saluran Pembuang Sekunder', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1420, '611.413', 'Saluran Tersier', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1421, '611.42', 'Bangunan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1422, '611.421', 'Bangunan Outlet', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1423, '611.422', 'Bangunan Terjun', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1424, '611.423', 'Bangunan Penahan Banjir', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1425, '611.43', 'Gorong-Gorong Pembuang', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1426, '611.44', 'Talang Pembuang', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1427, '611.45', 'Syphon Pembuang', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1428, '611.5', 'Bangunan Lainnya', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1429, '611.51', 'Jalan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1430, '611.511', 'Jalan Inspeksi', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1431, '611.512', 'Jalan Logistik Waduk Lapangan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1432, '611.52', 'Jembatan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1433, '611.521', 'Jembatan Inspeksi', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1434, '611.522', 'Jembatan Hewan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1435, '611.53', 'Tangga Cuci', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1436, '611.54', 'Kubangan Kerbau', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1437, '611.55', 'Waduk Lapangan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1438, '611.56', 'Bangunan Penunjang', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1439, '611.57', 'Jaringan Telepon', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1440, '611.58', 'Stasiun Agro', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1441, '612', 'Folder', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1442, '612.1', 'Tanggul Keliling', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1443, '612.11', 'Tanggul', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1444, '612.12', 'Bangunan Penutup Sungai', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1445, '612.13', 'Jembatan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1446, '612.2', 'Bangunan Pembawa', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1447, '612.21', 'Saluran', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1448, '612.211', 'Saluran Muka', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1449, '612.212', 'Saluran Pembawa Waduk', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1450, '612.213', 'Saluran Pembawa Sekunder', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1451, '612.22', 'Stasiun Pompa Pemasukan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1452, '612.23', 'Bangunan Bagi', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1453, '612.24', 'Gorong-Gorong', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1454, '612.25', 'Syphon', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1455, '612.3', 'Bangunan Pembuang', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1456, '612.31', 'Stasiun Pompa Pembuang', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1457, '612.32', 'Saluran', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1458, '612.321', 'Saluran Pembuang Induk', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1459, '612.322', 'Saluran Pembuang Sekunder', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1460, '612.33', 'Pintu Air Pembuangan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1461, '612.34', 'Gorong-Gorong Pembuangan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1462, '612.35', 'Syphon Pembuangan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1463, '612.4', 'Bangunan Lainnya', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1464, '612.41', 'Bangunan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1465, '612.411', 'Bangunan Pengukur Air', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1466, '612.412', 'Bangunan Pengukur Curah Hujan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1467, '612.413', 'Bangunan Gudang Stasiun Pompa', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1468, '612.414', 'Bangunan Listrik Stasiun Pompa', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1469, '612.42', 'Rumah Petugas Aksploitasi', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1470, '613', 'Pasang Surut', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1471, '613.1', 'Bangunan Pembawa', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1472, '613.11', 'Saluran', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1473, '613.111', 'Saluran Pembawa Induk', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1474, '613.112', 'Saluran Pembawa Sekunder', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1475, '613.113', 'Saluran Pembawa Tersier', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1476, '613.114', 'Saluran penyimpanan air', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1477, '613.12', 'Bangunan Pintu Pemasukan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1478, '613.2', 'Bangunan Pembuang', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1479, '613.21', 'Saluran', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1480, '613.211', 'Saluran Pembuang Induk', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1481, '613.212', 'Saluran Pembuang Sekunder', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1482, '613.213', 'Saluran Pembuang Tersier', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1483, '613.214', 'Saluran Pengumpul Air', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1484, '613.22', 'Bangunan Pintu Pembuang', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1485, '613.3', 'Bangunan Lainnya', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1486, '613.31', 'Kolam Pasang', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1487, '613.32', 'Saluran', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1488, '613.321', 'Saluran Lalu Lintas', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1489, '613.322', 'Saluran Muka', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1490, '613.33', 'Bangunan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1491, '613.331', 'Bangunan Penangkis Kotoran', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1492, '613.332', 'Bangunan Pengukur Muka Air', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1493, '613.333', 'Bangunan Pengukur Curah Hujan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1494, '613.34', 'Jalan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1495, '613.35', 'Jembatan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1496, '614', 'Pengendalian Sungai', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1497, '614.1', 'Bangunan Pengaman', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1498, '614.11', 'Tanggul Banjir', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1499, '614.12', 'Pintu Pengatur Banjir', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1500, '614.13', 'Klep Pengatur Banjir', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1501, '614.14', 'Tembok Pengaman Talud', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1502, '614.15', 'Krib', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1503, '614.16', 'Kantung Lumpur', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1504, '614.17', 'Check-Dam', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1505, '614.18', 'Syphon', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1506, '614.2', 'Saluran Pengaman', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1507, '614.21', 'Saluran Banjir', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1508, '614.22', 'Saluran Drainage', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1509, '614.23', 'Corepure', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1510, '614.3', 'Bangunan Lainnya', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1511, '614.31', 'Warning System', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1512, '614.32', 'Stasiun', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1513, '614.321', 'Stasiun Pengukur Curah Hujan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1514, '614.322', 'Stasiun Pengukur Air', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1515, '614.323', 'Stasiun Pengukur Cuaca', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1516, '614.324', 'Stasiun Pos Penjagaan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1517, '615', 'Pengamanan Pantai', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1518, '615.1', 'Tanggul', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1519, '615.2', 'Krib', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1520, '615.3', 'Bangunan Lainnya', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1521, '616', 'Air Tanah', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1522, '616.1', 'Stasiun Pompa', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1523, '616.2', 'Bangunan Pembawa', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1524, '616.3', 'Bangunan Pembuang', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1525, '616.4', 'Bangunan Lainnya', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1526, '617', '-', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1527, '618', '-', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1528, '619', '-', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1529, '620', 'JALAN', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1530, '621', 'Jalan Kota', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1531, '621.1', 'Daerah Penguasaan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1532, '621.11', 'Tanah', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1533, '621.12', 'Tanaman', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1534, '621.13', 'Bangunan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1535, '621.2', 'Bangunan Sementara', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1536, '621.21', 'Jalan Sementara', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1537, '621.22', 'Jembatan Sementara', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1538, '621.23', 'Kantor Proyek', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1539, '621.24', 'Gedung Proyek', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1540, '621.25', 'Barak Kerja', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1541, '621.26', 'Laboratorium Lapangan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1542, '621.27', 'Rumah', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1543, '621.3', 'Badan Jalan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1544, '621.31', 'Pekerjaan Tanah (Earth Work)', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1545, '621.32', 'Stabilisasi', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1546, '621.4', 'Perkerasan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1547, '621.41', 'Lapis Pondasi Bawah', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1548, '621.42', 'Lapis Pondasi', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1549, '621.43', 'Lapis Permukaan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1550, '621.5', 'Drainage', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1551, '621.51', 'Parit Tanah', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1552, '621.52', 'Gorong-Gorong (Culvert)', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1553, '621.6', 'Buku Trotuir', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1554, '621.61', 'Tanah', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1555, '621.62', 'Perkerasan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1556, '621.63', 'Pasangan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1557, '621.7', 'Median', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1558, '621.71', 'Tanah', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1559, '621.72', 'Tanaman', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1560, '621.73', 'Perkerasan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1561, '621.74', 'Pasangan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1562, '621.8', 'Daerah Samping', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1563, '621.81', 'Tanaman', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1564, '621.82', 'Pagar', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1565, '621.9', 'Bangunan Pelengkap Dan Pengamanan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1566, '621.91', 'Rambu-Rambu/Tanda-Tanda Lalu Lintas', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1567, '621.92', 'Lampu Penerangan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1568, '621.93', 'Lampu Pengatur Lalu Lintas', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1569, '621.94', 'Patok-Patok KM', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1570, '621.95', 'Patok-Patok ROW (Sempadan)', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1571, '621.96', 'Rel Pengamanan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1572, '621.97', 'Pagar', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1573, '621.98', 'Turap Penahan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1574, '621.99', 'Bronjong', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1575, '622', 'Jalan Luar Kota', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1576, '622.1', 'Daerah Penguasaan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1577, '622.11', 'Tanah', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1578, '622.12', 'Tanaman', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1579, '622.13', 'Bangunan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1580, '622.2', 'Bangunan Sementara', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1581, '622.21', 'Jalan Sementara', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1582, '622.22', 'Jembatan Sementara', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1583, '622.23', 'Kantor Proyek', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1584, '622.24', 'Gudang Proyek', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1585, '622.25', 'Barak Kerja', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1586, '622.26', 'Laboratorium Lapangan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1587, '622.27', 'Rumah', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23');
INSERT INTO `klasifikasi_surat` (`id`, `kode`, `nama`, `keterangan`, `status`, `created_at`, `updated_at`) VALUES
(1588, '622.3', 'Badan Jalan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1589, '622.31', 'Pekerjaan Tanah (Earth Work)', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1590, '622.32', 'Stabilisasi', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1591, '622.4', 'Perkerasan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1592, '622.41', 'Lapis Pondasi Bawah', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1593, '622.42', 'Lapis Pondasi', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1594, '622.43', 'Lapis Permukaan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1595, '622.5', 'Drainage', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1596, '622.51', 'Parit', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1597, '622.52', 'Gorong-Gorong (Culvert)', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1598, '622.53', 'Sub Drainage', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1599, '622.6', 'Trotoar', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1600, '622.61', 'Tanah', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1601, '622.62', 'Perkerasan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1602, '622.7', 'Median', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1603, '622.71', 'Tanah', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1604, '622.72', 'Tanaman', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1605, '622.73', 'Perkerasan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1606, '622.74', 'Pasangan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1607, '622.8', 'Daerah Samping', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1608, '622.81', 'Tanaman', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1609, '622.82', 'Pagar', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1610, '622.9', 'Bangunan Pelengkap Dan Pengamanan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1611, '622.91', 'Rambu-Rambu/Tanda-Tanda Lalu Lintas', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1612, '622.92', 'Lampu Penerangan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1613, '622.93', 'Lampu Pengatur Lalu Lintas', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1614, '622.94', 'Patok-Patok KM', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1615, '622.95', 'Patok-Patok ROW (Sempadan)', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1616, '622.96', 'Rel Pengamanan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1617, '622.97', 'Pagar', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1618, '622.98', 'Turap Penahan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1619, '622.99', 'Bronjong', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1620, '623', '-', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1621, '623', '-', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1622, '623', '-', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1623, '630', 'JEMBATAN', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1624, '631', 'Jembatan Pada Jalan Kota', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1625, '631.1', 'Daerah Penguasaan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1626, '631.11', 'Tanah', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1627, '631.12', 'Tanaman', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1628, '631.13', 'Bangunan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1629, '631.2', 'Bangunan Sementara', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1630, '631.21', 'Jalan Sementara', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1631, '631.22', 'Jembatan Sementara', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1632, '631.23', 'Kantor Proyek', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1633, '631.24', 'Gudang Proyek', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1634, '631.25', 'Barak Kerja', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1635, '631.26', 'Laboratorium Lapangan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1636, '631.27', 'Rumah', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1637, '631.3', 'Pekerjaan Tanah (Earth Work)', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1638, '631.31', 'Galian Tanah', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1639, '631.32', 'Timbunan Tanah', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1640, '631.4', 'Pondasi', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1641, '631.41', 'Pondasi Kepala Jalan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1642, '631.42', 'Pondasi Pilar', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1643, '631.43', 'Angker', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1644, '631.5', 'Bangunan Bawah', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1645, '631.51', 'Kepala Jembatan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1646, '631.52', 'Pilar', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1647, '631.53', 'Piloon', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1648, '631.54', 'Landasan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1649, '631.6', 'Bangunan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1650, '631.61', 'Gelagar', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1651, '631.62', 'Lantai', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1652, '631.63', 'Perkerasan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1653, '631.64', 'Jalan Orang / Trotoar', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1654, '631.65', 'Sandaran', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1655, '631.66', 'Talang air', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1656, '631.7', 'Bangunan / Pengaman', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1657, '631.71', 'Turap Penahan', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1658, '631.72', 'Bronjong', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1659, '631.73', '', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1660, '631.74', 'Kist Dam', '', 'aktif', '2021-09-23 09:00:23', '2021-09-23 09:00:23'),
(1661, '631.75', 'Corepure', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1662, '631.76', 'Krib', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1663, '631.8', 'Bangunan Pelengkap', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1664, '631.81', 'Rambu-Rambu/Tanda-Tanda Lalu Lintas', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1665, '631.82', 'Lampu Penerangan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1666, '631.83', 'Lampu Pengatur Lalu Lintas', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1667, '631.84', 'Patok Pengaman', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1668, '631.85', 'Patok ROW (Sempadan)', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1669, '631.86', 'Pagar', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1670, '631.9', 'Oprit', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1671, '631.91', 'Badan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1672, '631.92', 'Perkerasan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1673, '631.93', 'Drainage', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1674, '631.94', 'Baku', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1675, '631.95', 'Median', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1676, '632', 'Jembatan Pada Jalan Luar Kota', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1677, '632.1', 'Daerah Penguasaan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1678, '632.11', 'Tanah', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1679, '632.12', 'Tanaman', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1680, '632.13', 'Bangunan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1681, '632.2', 'Bangunan Sementara', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1682, '632.21', 'Jalan Sementara', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1683, '632.22', 'Jembatan Sementara', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1684, '632.23', 'Kantor Proyek', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1685, '632.24', 'Gudang Proyek', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1686, '632.25', 'Barak Kerja', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1687, '632.26', 'Laboratorium Lapangan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1688, '632.27', 'Rumah', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1689, '632.3', 'Pekerjaan Tanah (Earth Work)', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1690, '632.31', 'Galian Tanah', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1691, '632.32', 'Timnunan Tanah', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1692, '632.4', 'Pondasi', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1693, '632.41', 'Pondasi Kepala Jembatan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1694, '632.42', 'Pondasi Pilar', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1695, '632.43', 'Pondasi Angker', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1696, '632.5', 'Bangunan Bawah', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1697, '632.51', 'Kepala Jembatan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1698, '632.52', 'Pilar', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1699, '632.53', 'Piloon', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1700, '632.54', 'Landasan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1701, '632.6', 'Bangunan Atas', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1702, '632.61', 'Gelagar', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1703, '632.62', 'Lantai', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1704, '632.63', 'Perkerasan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1705, '632.64', 'Jalan Orang / Trotoar', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1706, '632.65', 'Sandaran', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1707, '632.66', 'Talang Air', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1708, '632.7', 'Bangunan Pengaman', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1709, '632.71', 'Turap / Penahan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1710, '632.72', 'Bronjong', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1711, '632.73', 'Stek Dam', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1712, '632.74', 'Kist Dam', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1713, '632.75', 'Corepure', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1714, '632.76', 'Krib', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1715, '632.8', 'Bangunan Pelengkap', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1716, '632.81', 'Rambu-Rambu/Tanda-Tanda Lalu Lintas', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1717, '632.82', 'Lampu Penerangan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1718, '632.83', 'Lampu Pengatur Lalu Lintas', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1719, '632.84', 'Patok Pengaman', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1720, '632.85', 'Patok ROW (Sempadan)', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1721, '632.86', 'Pagar', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1722, '632.9', 'Oprit', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1723, '632.91', 'Badan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1724, '632.92', 'Perkerasan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1725, '632.93', 'Drainage', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1726, '632.94', 'Baku', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1727, '632.95', 'Median', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1728, '633', '-', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1729, '634', '-', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1730, '635', '-', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1731, '640', 'BANGUNAN', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1732, '640.1', 'Gedung Pengadilan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1733, '640.2', 'Rumah Pejabat Negara', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1734, '640.3', 'Gedung DPR', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1735, '640.4', 'Gedung Balai Kota', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1736, '640.5', 'Penjara', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1737, '640.6', 'Perkantoran', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1738, '642', 'Bangunan Pendidikan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1739, '642.1', 'Taman Kanak-Kanak', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1740, '642.2', 'SD & SEKOLAH MENENGAH', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1741, '642.3', 'Perguruan Tinggi', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1742, '643', 'Bangunan Rekreasi', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1743, '643.1', 'BANGUNAN OLAH RAGA', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1744, '643.2', 'Gedung Kesenian', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1745, '643.3', 'Gedung Pemancar', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1746, '644', 'Bangunan Perdagangan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1747, '644.1', 'Pusat Perbelanjaan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1748, '644.2', 'Gedung Perdagangan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1749, '644.3', 'Bank', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1750, '644.4', 'Pekantoran', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1751, '645', 'Bangunan Pelayanan Umum', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1752, '645.1', 'MCK', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1753, '645.2', 'Gedung Parkir', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1754, '645.3', 'Rumah Sakit', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1755, '645.4', 'Gedung Telkom', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1756, '645.5', 'Terminal Angkutan udara', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1757, '645.6', 'Terminal Angkutan udara', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1758, '645.7', 'Terminal Angkutan Darat', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1759, '645.8', 'Bangunan Keagamaan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1760, '646', 'Bangunan Peninggalan Sejarah', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1761, '646.1', 'Monumen', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1762, '646.2', 'Candi', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1763, '646.3', 'Keraton', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1764, '646.4', 'Rumah Tradisional', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1765, '647', 'Bangunan Industri', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1766, '648', 'Bangunan Tempat Tinggal', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1767, '648.1', 'Rumah Perkotaan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1768, '648.11', 'Inti / Sederhana', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1769, '648.12', 'Sedang / Mewah', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1770, '648.2', 'Rumah Pedesaan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1771, '648.21', 'Rumah Contoh', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1772, '648.3', 'Real Estate', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1773, '648.4', 'Bapetarum', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1774, '649', 'Elemen Bangunan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1775, '649.1', 'Pondasi', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1776, '649.11', 'Di Atas Tiang', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1777, '649.2', 'Dinding', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1778, '649.21', 'Penahan Beban', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1779, '649.22', 'Tidak Menahan Beban', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1780, '649.3', 'Atap', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1781, '649.4', 'Lantai / Langit-Langit', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1782, '649.41', 'Supended', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1783, '649.42', 'Solit', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1784, '649.5', 'Pintu / Jendela', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1785, '649.51', 'Pintu Harmonik', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1786, '649.52', 'Pintu Biasa', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1787, '649.53', 'Pintu Sorong', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1788, '649.54', 'Pintu Kayu', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1789, '649.55', 'Jendela Sorong', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1790, '649.56', 'Jendela Vertikal', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1791, '650', 'TATA KOTA', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1792, '651', 'Daerah Perdagangan / Pelabuhan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1793, '651.1', 'Daerah Pusat Perbelanjaan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1794, '651.2', 'Daerah Perkotaan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1795, '652', 'Daerah Pemerintah', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1796, '653', 'Daerah Perumahan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1797, '653.1', 'Kepadatan Rendah', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1798, '653.2', 'Kepadatan Tinggi', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1799, '654', 'Daerah Industri', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1800, '654.1', 'Industri Berat', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1801, '654.2', 'Industri Ringan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1802, '654.3', 'Industri Ringan (Home Industry)', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1803, '655', 'Daerah Rekreasi', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1804, '655.1', 'Public Garden', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1805, '655.2', 'Sport & Playing Fields', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1806, '655.3', 'Open Space', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1807, '656', 'Transportasi (Tata Letak)', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1808, '656.1', 'Jaringan Jalan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1809, '656.11', 'Penerangan Jalan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1810, '656.2', 'Jaringan Kereta Api', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1811, '656.3', 'Jaringan Sungai', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1812, '657', 'Assaineering', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1813, '657.1', 'Saluran Pengumpulan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1814, '657.2', 'Instalasi Pengolahan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1815, '657.21', 'Bangunan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1816, '657.211', 'Bangunan Penyaringan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1817, '657.212', 'Bangunan Penghancur Kotoran / Sampah', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1818, '657.213', 'Bangunan Pengendap', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1819, '657.214', 'Bangunan Pengering Lumpur', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1820, '657.22', 'Unit Densifektan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1821, '657.23', 'Unit Perpompaan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1822, '658', 'Kesehatan Lingkungan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1823, '658.1', 'Persampahan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1824, '658.11', 'Bangunan Pengumpul', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1825, '658.12', 'Bangunan Pemusnahan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1826, '658.2', 'Pengotoran Udara', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1827, '658.3', 'pengotoran Air', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1828, '658.31', 'Air Buangan Industri Limbah', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1829, '658.4', 'Kegaduhan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1830, '658.5', 'Kebersihan Kota', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1831, '659', '-', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1832, '660', 'TATA LINGKUNGAN', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1833, '660.1', 'Persampahan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1834, '660.2', 'Kebersihan Lingkungan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1835, '660.3', 'Pencemaran', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1836, '660.31', 'Pecemaran Air', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1837, '660.32', 'Pencemaran Udara', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1838, '661', 'Daerah Hutan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1839, '662', 'Daerah Pertanian', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1840, '663', 'Daerah Pemikiman', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1841, '664', 'Pusat Pertumbuhan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1842, '665', 'Transportasi', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1843, '665.1', 'Jaringan Jalan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1844, '665.2', 'Jaringan Kereta Api', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1845, '665.3', 'Jaringan Sungai', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1846, '666', '-', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1847, '667', '-', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1848, '668', '-', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1849, '670', 'KETENAGAAN', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1850, '671', 'Listrik', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1851, '671.1', 'Kelistrikan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1852, '671.11', 'Kelisrikan PLN', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1853, '671.12', 'Kelistrikan Non PLN', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1854, '671.2', 'Pembangkit Tenaga Listrik', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1855, '671.21', 'PLTA  ( Pembangkit  Listrik Tenaga Air )', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1856, '671.22', 'PLTD  ( Pembangkit Listrik Tenaga Diesel )', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1857, '671.23', 'PLTG P ( Pembangkit Listrik Tenaga Gas )', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1858, '671.24', 'PLTM ( Pembangkit  Listrik Tenaga Matahari )', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1859, '671.25', 'PLTN ( Pembangkit Listrik Tenaga Nuklir )', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1860, '671.26', 'PLTPB ( Pembangkit Listrik Tenaga Uap )', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1861, '671.3', 'Transmisi Tenaga Listrik', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1862, '671.31', 'Gardu Induk/Gardu Penghubung/Gardu Trafo', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1863, '671.32', 'Saluran Udara Tegangan Tinggi', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1864, '671.33', 'Kabel Bawah Tanah', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1865, '671.4', 'Distribusi Tenaga Listrik', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1866, '671.41', 'Gardu Distribusi', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1867, '671.42', 'Tegangan Rendah', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1868, '671.43', 'Tegangan Menengah', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1869, '671.44', 'Jaringan Bawah Tanah', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1870, '671.5', 'Pengusahaan Listrik', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1871, '671.51', 'Sambungan Listrik', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1872, '671.52', 'Penjualan Tenaga Listrik', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1873, '671.53', 'Tarif Listrik', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1874, '672', 'Tenaga Air', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1875, '673', 'Tenaga Minyak', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1876, '674', 'Tenaga Gas', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1877, '675', 'Tenaga Matahari', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1878, '676', 'Tenaga Nuklir', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1879, '677', 'Tenaga Panas Bumi', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1880, '678', 'Tenaga Uap', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1881, '679', 'Tenaga Lainya', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1882, '680', 'PERALATAN', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1883, '681', '-', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1884, '682', '-', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1885, '683', '-', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1886, '690', 'AIR MINUM', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1887, '691', 'Intake', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1888, '691.1', 'Broncaptering', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1889, '691.2', 'Sumur', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1890, '691.3', 'Bendungan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1891, '691.4', 'Saringan (screen)', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1892, '691.5', 'Pintu air', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1893, '691.6', 'Saluran Pembawa', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1894, '691.7', 'Alat Ukur', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1895, '691.8', 'Perpompaan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1896, '692', 'Transmisi Air Baku', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1897, '692.1', 'Perpipaan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1898, '692.2', 'Katup Udara (Air Relief)', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1899, '692.3', 'Katup Penguras (Blow Off)', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1900, '692.4', 'Bak Pelepas Tekanan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1901, '692.5', 'Jembatan Pipa', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1902, '692.6', 'Syphon', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1903, '693', 'Instalasi Pengelolaan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1904, '693.1', 'Bangunan Ukur', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1905, '693.2', 'Bangunan Aerasi', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1906, '693.3', 'Bangunan Pengendapan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1907, '693.4', 'Bangunan Pembubuh Bahan Kimia', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1908, '693.5', 'Bangunan Pengaduk', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1909, '693.6', 'Bangunan Saringan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1910, '693.7', 'Perpompaan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1911, '693.8', 'Clear Hell', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1912, '694', 'Distribusi', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1913, '694.1', 'Reservoir Menara Bawah Tanah', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1914, '694.11', 'Menara', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1915, '694.12', 'reservoir di Bawah Tanah', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1916, '694.2', 'Perpipaan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1917, '694.3', 'Perpompaan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1918, '694.4', 'Jembatan Pipa', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1919, '694.5', 'Syphon', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1920, '694.6', 'Hydran', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1921, '694.61', 'Hydran Umum', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1922, '694.62', 'Hydran Kebakaran', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1923, '694.7', 'Katup', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1924, '694.71', 'Katup Udara (Air Relief)', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1925, '694.72', 'Katup Pelepas (Blow Off)', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1926, '694.8', 'Bak Pelepas Tekanan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1927, '695', '-', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1928, '696', '-', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1929, '697', '-', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1930, '698', '-', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1931, '699', '-', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1932, '700', 'PENGAWASAN', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1933, '701', 'Bidang Urusan Dalam', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1934, '702', 'Bidang Peralatan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1935, '703', 'Bidang Kekayaan Daerah', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1936, '704', 'Bidang Perpustakaan / Dokumentasi / Kearsipan Sandi', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1937, '705', 'Bidang Perencanaan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1938, '706', 'Bidang Organisasi / Ketatalaksanaan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1939, '707', 'Bidang Penelitian', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1940, '708', 'Bidang Konferensi', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1941, '709', 'Bidang Perjalanan Dinas', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1942, '710', 'BIDANG PEMERINTAHAN', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1943, '711', 'Bidang Pemerintahan Pusat', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1944, '712', 'Bidang Pemerintahan Provinsi', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1945, '713', 'Bidang Pemerintahan Kabupaten / Kota', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1946, '714', 'Bidang Pemerintahan Desa', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1947, '715', 'Bidang MPR / DPR', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1948, '716', 'Bidang DPRD Provinsi', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1949, '717', 'Bidang DPRD Kabupaten / Kota', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1950, '718', 'Bidang Hukum', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1951, '719', 'Bidang Hubungan Luar Negeri', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1952, '720', 'BIDANG POLITIK', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1953, '721', 'Bidang Kepartaian', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1954, '722', 'Bidang Organisasi Kemasyarakatan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1955, '723', 'Bidang Organisasi Profesi Dan Fungsional', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1956, '724', 'Bidang Organisasi Pemuda', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1957, '725', 'Bidang Organisasi Buruh, Tani, Dan Nelayan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1958, '726', 'Bidang Organisasi Wanita', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1959, '727', 'Bidang Pemilihan Umum', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1960, '730', 'BIDANG KEAMANAN/KETERTIBAN', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1961, '731', 'Bidang Pertahanan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1962, '732', 'Bidang Kemiliteran', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1963, '733', 'Bidang Perlindungan Masyarakat', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1964, '734', 'Bidang Kemanan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1965, '735', 'bidang Kejahatan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1966, '736', 'Bidang Bencana', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1967, '737', 'Bidang Kecelakaan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1968, '738', '-', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1969, '739', '-', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1970, '740', 'BIDANG KESEJAHTERAAN RAKYAT', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1971, '741', 'Bidang Pembagunan Desa', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1972, '742', 'Bidang Pendidikan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1973, '743', 'Bidang Kebudayaan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1974, '744', 'Bidang Kesehatan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1975, '745', 'Bidang Agama', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1976, '746', 'Bidang Sosial', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1977, '747', 'Bidang Kependudukan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1978, '748', 'Bidang Media Massa', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1979, '749', '-', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1980, '750', 'BIDANG PEREKONOMIAN', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1981, '751', 'Bidang Perdagangan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1982, '752', 'Bidang Pertanian', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1983, '753', 'Bidang Perindustrian', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1984, '754', 'Bidang Pertambangan / Kesamudraan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1985, '755', 'Bidang Perhubungan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1986, '756', 'Bidang Tenaga Kerja', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1987, '757', 'Bidang Permodalan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1988, '758', 'Bidang Perbankan / Moneter', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1989, '759', 'Bidang Agraria', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1990, '760', 'BIDANG PEKERJAAN UMUM', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1991, '761', 'Bidang Pengairan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1992, '762', 'Bidang Jalan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1993, '763', 'Bidang Jembatan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1994, '764', 'Bidang Bangunan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1995, '765', 'Bidang Tata Kota', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1996, '766', 'Bidang Lingkungan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1997, '767', 'Bidang Ketenagaan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1998, '768', 'Bidang Peralatan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(1999, '769', 'Bidang Air Minum', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2000, '770', '-', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2001, '771', '-', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2002, '772', '-', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2003, '780', 'BIDANG KEPEGAWAIAN', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2004, '781', 'Bidang Pengadaan Pegawai', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2005, '782', 'Bidang Mutasi Pegawai', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2006, '783', 'Bidang Kedudukan Pegawai', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2007, '784', 'Bidang Kesejahteran Pegawai', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2008, '785', 'Bidang Cuti', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2009, '786', 'Bidang Penilaian', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2010, '787', 'Bidang Tata Usaha Kepegawaian', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2011, '788', 'Bidang Pemberhentian Pegawai', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2012, '789', 'Bidang Pendidikan Pegawai', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2013, '790', 'BIDANG KEUANGAN', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2014, '791', 'Bidang Anggaran', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2015, '792', 'Bidang Otorisasi', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2016, '793', 'Bidang Verifikasi', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2017, '794', 'Bidang Pembukuan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2018, '795', 'Bidang Perbendaharaan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2019, '796', 'Bidang Pembina Kebendaharaan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2020, '797', 'Bidang Pendapatan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2021, '798', '-', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2022, '799', 'Bidang Bendaharaan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2023, '800', 'KEPEGAWAIAN', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2024, '800.1', 'Perencanaan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2025, '800.2', 'Penelitian', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2026, '800.043', 'Pengaduan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2027, '800.05', 'Tim', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2028, '800.07', 'Statistik', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2029, '800.08', 'Peraturan Perundang-Undangan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2030, '810', 'PENGADAAN', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2031, '811', 'Lamaran', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2032, '811.1', 'Testing', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2033, '811.2', 'Screening', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2034, '811.3', 'Panggilan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2035, '812', 'Pengujian Kesehatan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2036, '813', 'Pengangkatan Calon Pegawai', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2037, '813.1', 'Pengangkatan Calon Pegawai Golongan 1', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2038, '813.2', 'Pengangkatan Calon Pegawai Golongan II', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2039, '813.3', 'Pengangkatan Calon Pegawai Golongan III', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2040, '813.4', 'Pengangkatan Calon Pegawai Golongan IV', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2041, '813.5', 'Pengangkatan Calon Guru Inpres', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2042, '814', 'Pengangkatan Tenaga Lepas', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2043, '814.1', 'Pengangkatan Tenaga Bulanan / Tenaga Kontrak', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2044, '814.2', 'Pengangkatan Tenaga Harian', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2045, '814.3', 'Pengangkatan Tenaga Pensiunan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2046, '815', '-', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2047, '816', '-', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2048, '817', '-', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2049, '820', 'MUTASI', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2050, '821', 'Pengangkatan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2051, '821.1', 'Pengangkatan Menjadi Pegawai Negeri Tetap', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2052, '821.11', 'Pengangkatan Menjadi Pegawai Negeri Golongan 1', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2053, '821.12', 'Pengangkatan Menjadi Pegawai Negeri Golongan 2', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2054, '821.13', 'Pengangkatan Menjadi Pegawai Negeri Golongan 3', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2055, '821.14', 'Pengangkatan Menjadi Pegawai Negeri Golongan 4', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2056, '821.15', 'Pengangkatan Menjadi Pegawai Negeri Sipil Yang Cuti Di Luar Tanggungan Negara', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2057, '821.2', 'Pengangkatan Dalam Jabatan, Pembebasan Dari Jabatan, Berita Acara Serah Terima Jabatan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2058, '821.21', 'Sekjen/Dirjen/Irjen/Kabag', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2059, '821.22', 'Kepala Biro/Direktur/Inspektur/Kepala Pusat/Sekretaris/Kepala Dinas/Asisten Sekwilda', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2060, '821.23', 'Kepala Bagian/Kepala Sub Direktorat/Kepala Bidang/Inspektur Pembantu', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2061, '821.24', 'Kepala Subbagian/Kepala Seksi/Kepala Sub Bidang/Pemeriksa', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2062, '821.25', 'Residen/Pembantu Gubernur', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2063, '821.26', 'Wedana/Pembantu Bupati', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2064, '821.27', 'Camat', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2065, '821.28', 'Lurah Administratif (Lurah Desa)', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2066, '821.29', 'Jabatan Lainnya', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2067, '822', 'Kenaikan Gaji Berkala', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2068, '822.1', 'Pegawai Golongan 1', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2069, '822.2', 'Pegawai Golongan 2', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2070, '822.3', 'Pegawai Golongan 3', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2071, '822.4', 'Pegawai Golongan 4', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2072, '823', 'Kenaikan Pangkat / Pengangkatan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2073, '823.1', 'Pegawai Golongan 1', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2074, '823.2', 'Pegawai Golongan 2', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2075, '823.3', 'Pegawai Golongan 3', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2076, '823.4', 'Pegawai Golongan 4', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2077, '824', 'Pemindahan / Pelimpahan / Perbantuan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2078, '824.1', 'Pegawai Golongan 1', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2079, '824.2', 'Pegawai Golongan 2', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2080, '824.3', 'Pegawai Golongan 3', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2081, '824.4', 'Pegawai Golongan 4', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2082, '824.5', 'Lolos Butuh', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2083, '824.6', 'Kurikulum dan Silabi', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2084, '824.7', 'Proposal (TOR)', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2085, '825', 'Datasering dan Penempatan Kembali', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2086, '826', 'Penunjukan Tugas Belajar', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2087, '826.1', 'Dalam Negeri', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2088, '826.2', 'Luar Negeri', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2089, '826.3', 'Tunjangan Belajar', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2090, '826.4', 'Penempatan Kembali', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2091, '827', 'Wajib Militer', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2092, '828', 'Mutasi Dengan Instansi Lain', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2093, '829', '-', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2094, '830', 'KEDUDUKAN', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2095, '831', 'Perhitungan Masa Kerja', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2096, '832', 'Penyesuaian Pangkat / Gaji', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2097, '832.1', 'Pegawai Golongan 1', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2098, '832.2', 'Pegawai Golongan 2', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2099, '832.3', 'Pegawai Golongan 3', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2100, '832.4', 'Pegawai Golongan 4', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2101, '833', 'Penghargaan Ijazah / Penyesuaian', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2102, '834', 'Jenjang Pangkat / Eselonering', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2103, '835', '-', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2104, '836', '-', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2105, '837', '-', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2106, '840', 'KESEJAHTERAAN PEGAWAI', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2107, '841', 'Tunjangan', '', 'aktif', '2021-09-23 09:00:24', '2021-09-23 09:00:24'),
(2108, '841.1', 'Jabatan', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2109, '841.2', 'Kehormatan', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2110, '841.3', 'Kematian/Uang Duka', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2111, '841.4', 'Tunjangan Hari Raya', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2112, '841.5', 'Perjalanan Dinas Tetap/Cuti/Pindah', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2113, '841.6', 'Keluarga', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2114, '841.7', 'Sandang, Pangan, Papan (Bapertarum)', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2115, '842', 'Dana', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2116, '842.1', 'Taspen', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2117, '842.2', 'Kesehatan', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2118, '842.3', 'Asuransi', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25');
INSERT INTO `klasifikasi_surat` (`id`, `kode`, `nama`, `keterangan`, `status`, `created_at`, `updated_at`) VALUES
(2119, '843', 'Perawatan Kesehatan', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2120, '843.1', 'Poliklinik', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2121, '843.2', 'Perawatan Dokter', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2122, '843.3', 'Obat-Obatan', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2123, '843.4', 'Keluarga Berencana', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2124, '844', 'Koperasi / Distribusi', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2125, '844.1', 'Distribusi Pangan', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2126, '844.2', 'Distribusi Sandang', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2127, '844.3', 'Distribusi Papan', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2128, '845', 'Perumahan/Tanah', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2129, '845.1', 'Perumahan Pegawai', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2130, '845.2', 'Tanah Kapling', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2131, '845.3', 'Losmen/Hotel', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2132, '846', 'Bantuan Sosial', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2133, '846.1', 'Bantuan Kebakaran', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2134, '846.2', 'Bantuan Kebanjiran', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2135, '847', '-', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2136, '848', '-', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2137, '849', '-', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2138, '850', 'CUTI ', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2139, '851', 'Cuti Tahunan', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2140, '852', 'Cuti Besar', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2141, '853', 'Cuti Sakit', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2142, '854', 'Cuti Hamil', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2143, '855', 'Cuti Naik Haji/Umroh', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2144, '856', 'Cuti Di Luar Tangungan Neagara', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2145, '857', 'Cuti Alasan Lain/Alasan Penting', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2146, '858', '-', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2147, '859', '-', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2148, '860', 'PENILAIAN', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2149, '861', 'Penghargaan', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2150, '861.1', 'Bintang/Satyalencana', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2151, '861.2', 'Kenaikan Pangkat Anumerta', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2152, '861.3', 'Kenaikan Gaji Istimewa', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2153, '861.4', 'Hadiah Berupa Uang', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2154, '861.5', 'Pegawai Teladan', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2155, '862', 'Hukuman', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2156, '862.1', 'Teguran Peringatan', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2157, '862.2', 'Penundaan Kenaikan Gaji', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2158, '862.3', 'Penurunan Pangkat', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2159, '862.4', 'Pemindahan', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2160, '863', 'Konduite, DP3, Disiplin Pegawai', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2161, '864', 'Ujian Dinas', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2162, '864.1', 'Tingkat 1', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2163, '864.2', 'Tingkat 2', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2164, '864.3', 'Tingkat 3', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2165, '865', 'Penilaian Kehidupan Pegawai Negeri', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2166, '866', 'Rehabilitasi / Pengaktifan Kembali', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2167, '867', '-', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2168, '868', '-', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2169, '869', '-', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2170, '870', 'TATA USAHA KEPEGAWAIAN', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2171, '871', 'Formasi', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2172, '872', 'Bezetting/Daftar Urut Kepegawaian', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2173, '873', 'Registrasi', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2174, '873.1', 'NIP', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2175, '873.2', 'KARPEG', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2176, '873.3', 'Legitiminasi/Tanda Pengenal', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2177, '873.4', 'Daftar Keluarga, Perkawinan, Perceraian, Karis, Karsu', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2178, '874', 'Daftar Riwayat Pekerjaan', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2179, '874.1', 'Tanggal Lahir', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2180, '874.2', 'Penggantian Nama', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2181, '874.3', 'Izin kepartaian Organisasi', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2182, '875', 'Kewenangan Mutasi Pegawai', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2183, '875.1', 'Pelimpahan Wewenang', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2184, '875.2', 'Specimen Tanda Tangan', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2185, '876', 'Penggajian', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2186, '876.1', 'SKPP', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2187, '877', 'Sumpah/Janji', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2188, '878', 'Korps Pegawai', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2189, '879', '-', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2190, '880', 'PEMBERHENTIAN PEGAWAI', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2191, '881', 'Permintaan Sendiri', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2192, '882', 'Dengan Hak Pensiun', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2193, '882.1', 'Pemberhentian Dengan Hak Pensiun Pegawai Negeri Golongan 1', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2194, '882.2', 'Pemberhentian Dengan Hak Pensiun Pegawai Negeri Golongan 2', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2195, '882.3', 'Pemberhentian Dengan Hak Pensiun Pegawai Negeri Golongan 3', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2196, '882.4', 'Pemberhentian Dengan Hak Pensiun Pegawai Negeri Golongan 4', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2197, '882.5', 'Pensiun Janda / Duda', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2198, '882.6', 'Pensiun Yatim Piatu', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2199, '882.7', 'Uang Muka Pensiun', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2200, '883', 'Karena Meninggal', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2201, '883.1', 'Karena Meninggal Dalam Tugas', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2202, '884', 'Alasan Lain', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2203, '885', 'Uang Pesangon', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2204, '886', 'Uang Tunggu', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2205, '887', 'Untuk Sementara Waktu', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2206, '888', 'Tidak Dengan Hormat', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2207, '889', '-', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2208, '890', 'PENDIDIKAN PEGAWAI', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2209, '891', 'Perencanaan', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2210, '891.1', 'Program', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2211, '891.2', 'Kurikulum dan Silabi', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2212, '891.3', 'Proposal ( TOR )', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2213, '892', 'Pendidikan _Egular / Kader', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2214, '892.1', 'IPDN / APDN', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2215, '892.2', 'Kursus-Kursus Reguler', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2216, '893', 'Pendidikan dan Pelatihan / Non Reguler', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2217, '893.1', 'LEMHANAS', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2218, '893.2', 'Pendidikan dan Pelatihan Struktural, SPATI, SPAMEN, SPAMA, ADUMLA, ADUM', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2219, '893.3', 'Kursus-Kursus / Penataran', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2220, '893.4', 'Diklat Tehnik, Fungsional Dan Manajemen Pemerintahan', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2221, '893.5', 'Diklat Lainnya', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2222, '894', 'Pendidikan Luar Negeri', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2223, '894.1', 'Berkesinambungan / Berkala / Bergelar', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2224, '894.2', 'Non Gelar / Diploma', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2225, '895', 'Metode', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2226, '895.1', 'Kuliah', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2227, '895.2', 'Ceramah, Simposium', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2228, '895.3', 'Diskusi, Raker, Seminar, Lokakarya, Orientasi', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2229, '895.4', 'Studi Lapangan, Kkn, Widyawisata', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2230, '895.5', 'Tanya Jawab / Sylabi / Modul / Kursil', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2231, '895.7', 'Penugasan', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2232, '895.8', 'Gladi', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2233, '896', 'Tenaga Pengajar / Widyaiswara/Narasumber', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2234, '896.1', 'Moderator', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2235, '897', 'Administrasi Pendidikan', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2236, '897.1', 'Tahun Pelajaran', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2237, '897.2', 'Persyaratan, Pendaftaran, Testing, Ujian', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2238, '897.3', 'STTP', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2239, '897.4', 'Penilaian Angka Kredit', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2240, '897.5', 'Laporan Pendidikan Dan Pelatihan', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2241, '898', 'Fasilitas Belajar', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2242, '898.1', 'Tunjangan Belajar', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2243, '898.2', 'Asrama', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2244, '898.3', 'Uang Makan', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2245, '898.4', 'Uang Transport', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2246, '898.5', 'Uang Buku', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2247, '898.6', 'Uang Ujian', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2248, '898.7', 'Uang Semester / Uang Kuliah', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2249, '898.8', 'Uang Saku', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2250, '899', 'Sarana', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2251, '899.1', 'Bantuan Sarana Belajar', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2252, '899.2', 'Bantuan Alat-Alat Tulis', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2253, '899.3', 'Bantuan Sarana Belajar Lainnya', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2254, '900', 'KEUANGAN', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2255, '901', 'Nota Keuangan', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2256, '902', 'APBN', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2257, '903', 'APBD', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2258, '904', 'APBN-P', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2259, '905', 'Dana Alokasi Umum', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2260, '906', 'Dana Alokasi Khusus', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2261, '907', 'Dekonsentrasi (Pelimpahan Dana Dari Pusat Ke Daerah)', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2262, '907', '-', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2263, '908', '-', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2264, '910', 'ANGGARAN', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2265, '911', 'Rutin', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2266, '912', 'Pembangunan', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2267, '913', 'Anggaran Belanja Tambahan', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2268, '914', 'Daftar Isian Kegiatan (DIK)', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2269, '914.1', 'Daftar Usulan Kegiatan (DUK)', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2270, '915', 'Daftar Isian Poyek (DIP)', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2271, '915.1', 'Daftar Usulan Proyek (DUP)', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2272, '915.2', 'Daftar Isian Pengguna Anggaran (DIPA)', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2273, '916', 'Revisi Anggaran', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2274, '917', '-', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2275, '918', '-', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2276, '920', 'OTORISASI / SKO', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2277, '921', 'Rutin', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2278, '922', 'Pembangunan', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2279, '923', 'SIAP', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2280, '924', 'Ralat SKO', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2281, '925', '-', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2282, '926', '-', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2283, '927', '-', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2284, '930', 'VERIFIKASI', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2285, '931', 'SPM Rutin (daftar p8)', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2286, '932', 'SPM Pembangunan (daftar p8)', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2287, '933', 'Penerimaan (daftar p6. p7)', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2288, '934', 'SPJ Rutin', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2289, '935', 'SPJ Pembangunan', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2290, '936', 'Nota Pemeriksaan', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2291, '937', 'SP Pemindahan Pembukuan', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2292, '938', '-', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2293, '939', '-', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2294, '940', 'PEMBUKUAN', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2295, '941', 'Penyusunan Perhitungan Anggaran', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2296, '942', 'Permintaan  Data Anggaran Laporan Fisik Pembangunan', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2297, '943', 'Laporan Fisik Pembangunan', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2298, '944', '-', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2299, '945', '-', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2300, '950', 'PERBENDAHARAAN', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2301, '951', 'Tuntutan Ganti Rugi (ICW Pasal 74)', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2302, '952', 'Tuntutan Bendaharawan', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2303, '953', 'Penghapusan Kekayaan Negara', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2304, '954', 'Pengangkatan/Penggantian Pemimpin Proyak Dan Pengangkatan/Pemberhentian Bendaharawan', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2305, '955', 'Spesimen Tanda Tangan', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2306, '956', 'Surat Tagihan Piutang, Ikhtisar Bulanan', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2307, '957', '-', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2308, '958', '-', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2309, '959', '-', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2310, '960', 'PEMBINAAN KEBENDAHARAAN', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2311, '961', 'Pemeriksaan Kas Dan Hasil Pemeriksaan Kas', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2312, '962', 'Pemeriksaan Administrasi Bendaharawan', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2313, '963', 'Laporan Keuangan Bendaharawan', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2314, '964', '-', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2315, '965', '-', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2316, '966', '-', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2317, '970', 'PENDAPATAN', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2318, '971', 'Perimbangan Keuangan', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2319, '972', 'Subsidi', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2320, '973', 'Pajak,Ipeda, IHH,IHPH', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2321, '974', 'Retribusi', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2322, '975', 'Bea', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2323, '976', 'Cukai', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2324, '977', 'Pungutan / PNBP', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2325, '978', 'Bantuan Presiden, Menteri Dan Bantuan Lainnya', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2326, '979', '-', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2327, '980', '-', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2328, '981', '-', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2329, '990', 'BENDAHARAWAN', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2330, '991', 'SKPP / SPP', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2331, '992', 'Teguran SPJ', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2332, '993', '-', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2333, '994', '-', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25'),
(2334, '995', '-', '', 'aktif', '2021-09-23 09:00:25', '2021-09-23 09:00:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ks`
--

CREATE TABLE `ks` (
  `id` int(4) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `uraian` mediumtext NOT NULL,
  `enabled` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ks`
--

INSERT INTO `ks` (`id`, `kode`, `nama`, `uraian`, `enabled`) VALUES
(1, '000', 'UMUM', '-', 1),
(2, '001', 'Lambang', '-', 1),
(3, '001.1', 'Garuda', '-', 1),
(4, '001.2', 'Bendera Kebangsaan', '-', 1),
(5, '001.3', 'Lagu Kebangsaan', '-', 1),
(6, '001.4', 'Daerah', '-', 1),
(7, '001.31', 'Provinsi', '-', 1),
(8, '001.32', 'Kabupaten/Kota', '-', 1),
(9, '002', 'Tanda Kehormatan/Penghargaan untuk pegawai ', 'lihat 861.1', 1),
(10, '002.1', 'Bintang', '-', 1),
(11, '002.2', 'Satyalencana', '-', 1),
(12, '002.3', 'Samkarya Nugraha', '-', 1),
(13, '002.4', 'Monumen', '-', 1),
(14, '002.5', 'Penghargaan Secara Adat', '-', 1),
(15, '002.6', 'Penghargaan lainnya', '-', 1),
(16, '003', 'Hari Raya/Besar', '-', 1),
(17, '003.1', 'Nasional 17 Agustus, Hari Pahlawan, dan sebagainya', '-', 1),
(18, '003.2', 'Hari Raya Keagamaan', '-', 1),
(19, '003.3', 'Hari Ulang Tahun', '-', 1),
(20, '003.4', 'Hari-hari Besar Internasional', '-', 1),
(21, '004', 'Ucapan', '-', 1),
(22, '004.1', 'Ucapan Terima Kasih', '-', 1),
(23, '004.2', 'Ucapan Selamat', '-', 1),
(24, '004.3', 'Ucapan Belasungkawa', '-', 1),
(25, '004.4', 'Ucapan Lainnya', '-', 1),
(26, '005', 'Undangan', '-', 1),
(27, '006', 'Tanda Jabatan', '-', 1),
(28, '006.1', 'Pamong Praja', '-', 1),
(29, '006.2', 'Tanda Pengenal', '-', 1),
(30, '006.3', 'Pejabat lainnya', '-', 1),
(31, '007', '-', '-', 1),
(32, '008', '-', '-', 1),
(33, '009', '-', '-', 1),
(34, '010', 'URUSAN DALAM ', 'Gedung Kantor/Termasuk Instalasi Prasarana Fisik Pamong', 1),
(35, '011', 'Kantor Dinas', '-', 1),
(36, '012', 'Rumah Dinas', '-', 1),
(37, '012.1', 'Tanah Untuk Rumah Dinas', '-', 1),
(38, '012.2', 'Perabot Rumah Dinas', '-', 1),
(39, '012.3', 'Rumah Dinas Golongan 1', '-', 1),
(40, '012.4', 'Rumah Dinas Golongan 2', '-', 1),
(41, '012.5', 'Rumah Dinas Golongan 3', '-', 1),
(42, '012.6', 'Rumah/Bangunan Lainnya', '-', 1),
(43, '012.7', 'Rumah Pejabat Negara', '-', 1),
(44, '013', 'Mess/Guest House', '-', 1),
(45, '014', 'Rumah Susun/Apartemen', '-', 1),
(46, '015', 'Penerangan Listrik/Jasa Listrik', '-', 1),
(47, '016', 'Telepon/Faximile/Internet', '-', 1),
(48, '017', 'Keamanan/Ketertiban Kantor', '-', 1),
(49, '018', 'Kebersihan Kantor', '-', 1),
(50, '019', 'Protokol', '-', 1),
(51, '019.1', 'Upacara Bendera', '-', 1),
(52, '019.2', 'Tata Tempat', '-', 1),
(53, '019.21', 'Pemasangan Gambar Presiden/Wakil Presiden', '-', 1),
(54, '019.3', 'Audiensi / Menghadap Pimpinan', '-', 1),
(55, '019.4', 'Alamat-Alamat Kantor Pejabat', '-', 1),
(56, '019.5', 'Bandir/Umbul-Umbul/Spanduk', '-', 1),
(57, '020', 'PERALATAN', '-', 1),
(58, '020.1', 'Penawaran', '-', 1),
(59, '021', 'Alat Tulis', '-', 1),
(60, '022', 'Mesin Kantor', '-', 1),
(61, '023', 'Perabot Kantor', '-', 1),
(62, '024', 'Alat Angkutan', '-', 1),
(63, '025', 'Pakaian Dinas', '-', 1),
(64, '026', 'Senjata', '-', 1),
(65, '027', 'Pengadaan', '-', 1),
(66, '028', 'Inventaris', '-', 1),
(67, '029', '-', '-', 1),
(68, '030', 'KEKAYAAN DAERAH', '-', 1),
(69, '031', 'Sumber Daya Alam', '-', 1),
(70, '032', 'Asset Daerah', '-', 1),
(71, '033', '-', '-', 1),
(72, '034', '-', '-', 1),
(73, '035', '-', '-', 1),
(74, '036', '-', '-', 1),
(75, '040', 'PERPUSTAKAAN DOKUMENTASI / KEARSIPAN / SANDI', '-', 1),
(76, '041', 'Perpustakaan', '-', 1),
(77, '041.1', 'Umum', '-', 1),
(78, '041.2', 'Khusus', '-', 1),
(79, '041.3', 'Perguruan Tinggi', '-', 1),
(80, '041.4', 'Sekolah', '-', 1),
(81, '041.5', 'Keliling', '-', 1),
(82, '042', 'Dokumentasi', '-', 1),
(83, '043', '-', '-', 1),
(84, '044', '-', '-', 1),
(85, '045', 'Kearsipan', '-', 1),
(86, '045.1', 'Pola Klasifikasi', '-', 1),
(87, '045.2', 'Penataan Berkas', '-', 1),
(88, '045.3', 'Penyusutan Arsip', '-', 1),
(89, '045.31', 'Jadwal Retensi Arsip', '-', 1),
(90, '045.32', 'Pemindahan Arsip', '-', 1),
(91, '045.33', 'Penilaian Arsip', '-', 1),
(92, '045.34', 'Pemusnahan Arsip', '-', 1),
(93, '045.35', 'Penyerahan Arsip', '-', 1),
(94, '045.36', 'Berita Acara Penyusutan Arsip', '-', 1),
(95, '045.37', 'Daftar Pencarian Arsip', '-', 1),
(96, '045.4', 'Pembinaan Kearsipan', '-', 1),
(97, '045.41', 'Bimbingan Teknis', '-', 1),
(98, '045.5', 'Pemeliharaan /Perawatan Arsip', '-', 1),
(99, '045.6', 'Pengawetan/Fumigasi', '-', 1),
(100, '046', 'Sandi', '-', 1),
(101, '047', 'Website', '-', 1),
(102, '048', 'Pengelolaan Data', '-', 1),
(103, '049', 'Jaringan Komunikasi Data', '-', 1),
(104, '050', 'PERENCANAAN', '-', 1),
(105, '050.1', 'Repelita/8 Sukses', '-', 1),
(106, '050.11', 'Pelita Daerah', '-', 1),
(107, '050.12', 'Bantuan Pembangunan Daerah', '-', 1),
(108, '050.13', 'Bappeda', '-', 1),
(109, '051', 'Proyek Bidang Pemerintahan, ', 'Klasifikasikan Disini : Proyek Prasaran Fisik Pemerintahan, Tambahkan Perincian 100 Pada 051 Contoh: Proyek Kepenjaraan 051.86', 1),
(110, '052', 'Bidang Politik', '-', 1),
(111, '053', 'Bidang Keamanan Dan Ketertiban', 'Tambahkan Perincian 300 Pada 053 Contoh: Proyek Ketataprajaan 053.311 ', 1),
(112, '054', 'Bidang Kesejahteraan Rakyat ', 'Tambahkan Peincian 400 pada 054 Contoh: Proyek Resettlement Desa 054.671', 1),
(113, '055', 'Bidang Perekonomian ', 'Tambahkan Perincian 500 Pada 055 Contoh: Proyek Pasar 055.112', 1),
(114, '056', 'Bidang Pekerjaan Umum ', 'Tambahkan Perincian 600 pada 056 Contoh: Proyek Jembatan 056.3', 1),
(115, '057', 'Bidang Pengawasan', '-', 1),
(116, '058', 'Bidang Kepegawaian', '-', 1),
(117, '059', 'Bidang Keuangan', '-', 1),
(118, '060', 'ORGANISASI / KETATALAKSANAAN', '-', 1),
(119, '060.1', 'Program Kerja', '-', 1),
(120, '061', 'Organisasi Instansi Pemerintah (struktur organisasi)', '-', 1),
(121, '061.1', 'Susunan dan Tata Kerja', '-', 1),
(122, '061.2', 'Tata Tertib Kantor, Jam Kerja di Bulan Puasa', '-', 1),
(123, '062', 'Organisasi Badan Non Pemerintah', '-', 1),
(124, '063', 'Organisasi Badan Internasional', '-', 1),
(125, '064', 'Organisasi Semi Pemerintah, BKS-AKSI', '-', 1),
(126, '065', 'Ketatalaksanaan / Tata Naskah / Sistem', '-', 1),
(127, '066', 'Stempel Dinas', '-', 1),
(128, '067', 'Pelayanan Umum / Pelayanan Publik / Analisis', '-', 1),
(129, '068', 'Komputerisasi / Siskomdagri', '-', 1),
(130, '069', 'Standar Pelayanan Minimal', '-', 1),
(131, '070', 'PENELITIAN', '-', 1),
(132, '071', 'Riset', '-', 1),
(133, '072', 'Survey', '-', 1),
(134, '073', 'Kajian', '-', 1),
(135, '074', 'Kerjasama Penelitian Dengan Perguruan Tinggi', '-', 1),
(136, '075', 'Kementerian Lainnya', '-', 1),
(137, '076', 'Non Kementerian', '-', 1),
(138, '077', 'Provinsi', '-', 1),
(139, '078', 'Kabupaten/Kota', '-', 1),
(140, '079', 'Kecamatan /Desa', '-', 1),
(141, '080', 'KONFERENSI / RAPAT / SEMINAR', '-', 1),
(142, '081', 'Gubernur', '-', 1),
(143, '082', 'Bupati / Walikota', '-', 1),
(144, '083', 'Komponen, Eselon Lainnya', '-', 1),
(145, '084', 'Instansi Lainnya', '-', 1),
(146, '085', 'Internasional Di Dalam Negeri', '-', 1),
(147, '086', 'Internasional Di Luar Negeri', '-', 1),
(148, '087', '-', '-', 1),
(149, '088', '-', '-', 1),
(150, '089', '-', '-', 1),
(151, '090', 'PERJALANAN DINAS', '-', 1),
(152, '091', 'Perjalanan Presiden/Wakil Presiden Ke Daerah', '-', 1),
(153, '092', 'Perjalanan Menteri Ke Daerah', '-', 1),
(154, '093', 'Perjalanan Pejabat Tinggi (Pejabat Eselon 1)', '-', 1),
(155, '094', 'Perjalanan Pegawai Termasuk Pemanggilan Pegawai', '-', 1),
(156, '095', 'Perjalanan Tamu Asing Ke Daerah', '-', 1),
(157, '096', 'Perjalanan Presiden/Wakil Presiden Ke Luar Negeri', '-', 1),
(158, '097', 'Perjalanan Menteri Ke Luar Negeri', '-', 1),
(159, '098', 'Perjalanan Pejabat Tinggi Ke Luar Negeri', '-', 1),
(160, '099', 'Perjalanan Pegawai ke Luar Negeri', '-', 1),
(161, '100', 'PEMERINTAHAN', 'Meliputi: Tata Praja, Legislatif, Yudikatif, Hubungan luar', 1),
(162, '101', 'negeri', '-', 1),
(163, '102', 'GDN', '-', 1),
(164, '103', '-', '-', 1),
(165, '104', '-', '-', 1),
(166, '105', '-', '-', 1),
(167, '110', 'PEMERINTAHAN PUSAT', '-', 1),
(168, '111', 'Presiden', 'Meliputi: pencalonan, pengangkatan, pelantikan, sumpah, dan serah jabatan', 1),
(169, '111.1', 'Pertanggung jawaban presiden kpd MPR', '-', 1),
(170, '111.2', 'Amanat Presiden/Amanat Kenegaraan/Pidato', '-', 1),
(171, '112', 'Wakil Presiden', 'Meliputi: pencalonan, pengangkatan, pelantikan, sumpah, dan serah jabatan', 1),
(172, '112.1', 'Pertanggung jawaban wakil presiden kepada MPR', '-', 1),
(173, '112.2', 'Amanat Wakil Presiden/Amanat Kenegaraan/Pidato', '-', 1),
(174, '113', 'Susunan Kabinet', '-', 1),
(175, '113.1', 'Reshuffle', '-', 1),
(176, '113.2', 'Penunjukan Menteri ad interim', '-', 1),
(177, '113.3', 'Sidang Kabinet', '-', 1),
(178, '114', 'Kementerian Dalam Negeri', '-', 1),
(179, '114.1', 'Amanat Menteri Dalam Negeri/Sambutan', '-', 1),
(180, '115', 'Kementerian lainnya', '-', 1),
(181, '116', 'Lembaga Tinggi Negara', '-', 1),
(182, '117', 'Lembaga Non Kementerian', '-', 1),
(183, '118', 'Otonomi/Desentralisasi/Dekonsentrasi', '-', 1),
(184, '119', 'Kerjasama Antar Kementerian', '-', 1),
(185, '120', 'PEMERINTAH PROVINSI', '-', 1),
(186, '120.04', 'Laporan daerah', '-', 1),
(187, '120.42', 'Monografi tambahkan kode wilayah', '-', 1),
(188, '120.1', 'Koordinasi', '-', 1),
(189, '120.2', 'Instansi Tingkat Provinsi', '-', 1),
(190, '120.21', 'Dinas Otonomi', '-', 1),
(191, '120.22', 'Instansi Vertikal', '-', 1),
(192, '120.23', 'Kerjasama antar Provinsi/Daerah', '-', 1),
(193, '121', 'Gubernur tambahkan kode wilayah, ', 'Meliputi: Pencalonan, Pengangkatan, Meninggal, Pelantikan, Pemberhentian, Serah Terima Jabatan dan sebagainya.', 1),
(194, '122', 'Wakil Gubernur tambahkan kode wilayah, ', 'Meliputi: Pencalonan, Pengangkatan, Meninggal, Pelantikan, Pemberhentian, Serah Terima Jabatan  dan sebagainya.', 1),
(195, '123', 'Sekretaris Wilayah tambahkan kode wilayah, ', 'Meliputi: Pencalonan, Pengangkatan, Meninggal, Pelantikan, Pemberhentian, Serah Terima Jabatan dan sebagainya.', 1),
(196, '124', 'Pembentukan/Pemekaran Wilayah', '-', 1),
(197, '124.1', 'Pembinaan/Perubahan Nama kepada: Daerah, Kota,Benda, Geografis, Gunung, Sungai, Pulau, Selat, Batas laut, dan sebagainya', '-', 1),
(198, '124.2', 'Pemekaran  Wilayah', '-', 1),
(199, '124.3', 'Forum Koordinasi lainnya', '-', 1),
(200, '125', 'Pembentukan Pemekaran Wilayah', '-', 1),
(201, '125.1', 'Pembinaan/Perubahan Nama Kepada: Daerah, Kota, Benda, Geografis, Gunung, Sungai, Pulau, Selat, Batas Laut, dan sebagainya.', '-', 1),
(202, '125.2', 'Pembentukan Wialayah', '-', 1),
(203, '125.3', 'Pemindahan Ibukota', '-', 1),
(204, '125.4', 'Perubahan batas Wilayah', '-', 1),
(205, '125.5', 'Pemekaran Wialayah', '-', 1),
(206, '126', 'Pembagian Wilayah', '-', 1),
(207, '127', 'Penyerahan Urusan', '-', 1),
(208, '128', 'Swaparaja/Penataan Wilayah/Daerah', '-', 1),
(209, '129', '-', '-', 1),
(210, '130', 'PEMERINTAH KABUPATEN / KOTA', 'Bupati /Walikota, Tambahkan Kode Wilayah, Meliputi: Pencalonan,Pengangkatan, Meninggal, Pelantikan,', 1),
(211, '131', 'Pemberhentian, Serah Terima Jabatan, dsb', 'Sambutan / Pengarahan / Amanat Wakil Bupati /Walikota, Tambahkan Kode Wilayah, Meliputi: Pencalonan, Pengangkatan, Meninggal, Pelantikan,', 1),
(212, '132', 'Pemberhentian, Serah Terima Jabatan, Sekretaris Daerah Kabupaten/Kota, Tambahkan Kode Wilayah, ', 'Meliputi: Pencalonan, Pengangkatan, Meninggal,', 1),
(213, '133', 'Pelantikan, Pemberhentian, Serah Terima Jabatan,.', '-', 1),
(214, '134', 'Forum Koordinasi Pemerintah Di Daerah', '-', 1),
(215, '134.1', 'Muspida', '-', 1),
(216, '134.2', 'Forum PAN (Panitian Anggaran Nasional)', '-', 1),
(217, '134.3', 'Forum Koordinasi Lainnya', '-', 1),
(218, '134.4', 'Kerjasama antar Kabupaten/Kota', '-', 1),
(219, '135', 'Pembentukan / Pemekaran Wilayah', '-', 1),
(220, '135.1', 'Pemindahan Ibukota', '-', 1),
(221, '135.2', 'Pembentukan Wilayah Pembantu Bupati/Walikota', '-', 1),
(222, '135.3', 'Pemabagian Wilayah Kabupaten/Kota', '-', 1),
(223, '135.4', 'Perubahan Batas Wilayah', '-', 1),
(224, '135.5', 'Pemekaran Wilayah', '-', 1),
(225, '135.6', 'Permasalahan Batas Wilayah', '-', 1),
(226, '135.7', 'Pembentukan Ibukota Kabupaten/Kota Pemberian dan Penggantian Nama Kabupaten/Kota, Daerah,', '-', 1),
(227, '135.8', 'Jalan', '-', 1),
(228, '136', 'Pembagian Wilayah', '-', 1),
(229, '137', 'Penyerahan Urusan', '-', 1),
(230, '138', 'Pemerintah Wilayah Kecamatan', '-', 1),
(231, '138.1', 'Sambutan / Pengarahan / Amanat', '-', 1),
(232, '138.2', 'Pembentukan Kecamatan', '-', 1),
(233, '138.3', 'Pemekaran Kecamatan', '-', 1),
(234, '138.4', 'Perluasan/Perubahan Batas Wilayah Kecamatan', '-', 1),
(235, '138.5', 'Pembentukan Perwakilan Kecamatan/Kemantren', '-', 1),
(236, '138.6', '-', '-', 1),
(237, '138.7', '-', '-', 1),
(238, '139', '-', '-', 1),
(239, '140', 'PEMERINTAHAN DESA / KELURAHAN', 'Pamong Desa, Meliputi: Pencalonan, Pemilihan, Meninggal,', 1),
(240, '141', 'Pengangkatan, Pemberhenian, dan sebagainya', '-', 1),
(241, '142', 'Penghasilan Pamong Desa', '-', 1),
(242, '143', 'Kekayaan Desa', '-', 1),
(243, '144', 'Dewan Tingkat Desa, Dewan Marga, Rembug Desa', '-', 1),
(244, '145', 'Administrasi Desa', '-', 1),
(245, '146', 'Kewilayahan', '-', 1),
(246, '146.1', 'Pembentukan Desa/Kelurahan', '-', 1),
(247, '146.2', 'Pemekaran Desa/Kelurahan', '-', 1),
(248, '146.3', 'Perubahan Batas Wilayah / Perluasan Desa / Kelurahan', '-', 1),
(249, '146.4', 'Perubahan Nama Desa / Kelurahan', '-', 1),
(250, '146.5', 'Kerjasama Antar Desa / Kelurahan', '-', 1),
(251, '147', 'Lembaga-lembaga Tingkat Desa', 'Jangan Klasifikasikan Disini, Lihat 410 Dengan Perinciannya', 1),
(252, '148', 'Perangkat Kelurahan', '-', 1),
(253, '148.1', 'Kepala Kelurahan', '-', 1),
(254, '148.2', 'Sekretaris Kelurahan', '-', 1),
(255, '148.3', 'Staf Kelurahan', '-', 1),
(256, '149.1', 'Dewan Kelurahan', '-', 1),
(257, '149.2', 'Rukun Tetangga', '-', 1),
(258, '149.3', 'Rukun Warga', '-', 1),
(259, '149.4', 'Rukun Kampung', '-', 1),
(260, '150', 'LEGISLATIF MPR / DPR / DPD', '-', 1),
(261, '151', 'Keanggotaan MPR', '-', 1),
(262, '151.1', 'Pencalonan', '-', 1),
(263, '151.2', 'Pemberhentian', '-', 1),
(264, '151.3', 'Recall', '-', 1),
(265, '151.4', 'Pelanggaran', '-', 1),
(266, '152', 'Persidangan', '-', 1),
(267, '153', 'Kesejahteraan', '-', 1),
(268, '153.1', 'Keuangan', '-', 1),
(269, '153.2', 'Penghargaan', '-', 1),
(270, '154', 'Hak', '-', 1),
(271, '155', 'Keanggotaan DPR ', 'Pencalonan Pengangkatan Persidangan Sidang Pleno Dengar Pendapat/Rapat Komisi', 1),
(272, '156', 'Reses', '-', 1),
(273, '157', 'Kesejahteraan', '-', 1),
(274, '157.1', 'Keuangan', '-', 1),
(275, '157.2', 'Penghargaan', '-', 1),
(276, '158', 'Jawaban Pemerintah', '-', 1),
(277, '159', 'Hak', '-', 1),
(278, '160', 'DPRD PROVINSI TAMBAHKAN KODE WILAYAH', '-', 1),
(279, '161', 'Keanggotaan', '-', 1),
(280, '161.1', 'Pencalonan', '-', 1),
(281, '161.2', 'Pengangkatan', '-', 1),
(282, '161.3', 'Pemberhentian', '-', 1),
(283, '161.4', 'Recall', '-', 1),
(284, '161.5', 'Meninggal', '-', 1),
(285, '161.6', 'Pelanggaran', '-', 1),
(286, '162', 'Persidangan', '-', 1),
(287, '162.1', 'Reses', '-', 1),
(288, '163', 'Kesejahteraan', '-', 1),
(289, '163.1', 'Keuangan', '-', 1),
(290, '163.2', 'Penghargaan', '-', 1),
(291, '164', 'Hak', '-', 1),
(292, '165', 'Sekretaris DPRD Provinsi', '-', 1),
(293, '166', '-', '-', 1),
(294, '167', '-', '-', 1),
(295, '168', '-', '-', 1),
(296, '169', '-', '-', 1),
(297, '170', 'DPRD KABUPATEN TAMBAHKAN KODE WILAYAH', '-', 1),
(298, '171', 'Keanggotaan', '-', 1),
(299, '171.1', 'Pencalonan', '-', 1),
(300, '171.2', 'Pengangkatan', '-', 1),
(301, '171.3', 'Pemberhentian', '-', 1),
(302, '171.4', 'Recall', '-', 1),
(303, '171.5', 'Pelanggaran', '-', 1),
(304, '172', 'Persidangan', '-', 1),
(305, '173', 'Kesejahteraan', '-', 1),
(306, '173.1', 'Keuangan', '-', 1),
(307, '173.2', 'Penghargaan', '-', 1),
(308, '174', 'Hak', '-', 1),
(309, '175', 'Sekretaris DPRD Kabupaten/Kota', '-', 1),
(310, '176', '-', '-', 1),
(311, '177', '-', '-', 1),
(312, '178', '-', '-', 1),
(313, '180', 'HUKUM', '-', 1),
(314, '180.1', 'Kontitusi', '-', 1),
(315, '180.11', 'Dasar Hukum', '-', 1),
(316, '180.12', 'Undang-Undang Dasar', '-', 1),
(317, '180.2', 'GBHN', '-', 1),
(318, '180.3', 'Amnesti, Abolisi dan Grasi', '-', 1),
(319, '181', 'Perdata', '-', 1),
(320, '181.1', 'Tanah', '-', 1),
(321, '181.2', 'Rumah', '-', 1),
(322, '181.3', 'Utang/Piutang', '-', 1),
(323, '181.31', 'Gadai', '-', 1),
(324, '181.32', 'Hipotik', '-', 1),
(325, '181.4', 'Notariat', '-', 1),
(326, '182', 'Pidana', '-', 1),
(327, '182.1', 'Penyidik Pegawai Negeri Sipil (PPNS)', '-', 1),
(328, '183', 'Peradilan', 'Peradilan Agama Islam 451.6, Peradilan Perkara Tanah 593.71', 1),
(329, '183.1', 'Bantuan Hukum', '-', 1),
(330, '184', 'Hukum Internasional', '-', 1),
(331, '185', 'Imigrasi', '-', 1),
(332, '185.1', 'Visa', '-', 1),
(333, '185.2', 'Pasport', '-', 1),
(334, '185.3', 'Exit', '-', 1),
(335, '185.4', 'Reentry', '-', 1),
(336, '185.5', 'Lintas Batas/Batas Antar Negara', '-', 1),
(337, '186', 'Kepenjaraan', '-', 1),
(338, '187', 'Kejaksaan', '-', 1),
(339, '188', 'Peraturan Perundang-Undangan', '-', 1),
(340, '188.1', 'TAP MPR', '-', 1),
(341, '188.2', 'Undang-Undang Dasar', '-', 1),
(342, '188.3', 'Peraturan', '-', 1),
(343, '188.31', 'Peraturan Pemerintah', '-', 1),
(344, '188.32', 'Peraturan Menteri', '-', 1),
(345, '188.33', 'Peraturan Lembaga Non Departemen', '-', 1),
(346, '188.34', 'Peraturan Daerah', '-', 1),
(347, '188.341', 'Peraturan Provinsi', '-', 1),
(348, '188.342', 'Peraturan Kabupaten/Kota', '-', 1),
(349, '188.4', 'Keputusan', '-', 1),
(350, '188.41', 'Presiden', '-', 1),
(351, '188.42', 'Menteri', '-', 1),
(352, '188.43', 'Lembaga Non Departemen', '-', 1),
(353, '188.44', 'Gubernur', '-', 1),
(354, '188.45', 'Bupati/Walikota', '-', 1),
(355, '188.5', 'Instruksi', '-', 1),
(356, '188.51', 'Presiden', '-', 1),
(357, '188.52', 'Menteri', '-', 1),
(358, '188.53', 'Lembaga Non Departemen', '-', 1),
(359, '188.54', 'Gubernur', '-', 1),
(360, '188.55', 'Bupati/Walikota', '-', 1),
(361, '189', 'Hukum Adat', '-', 1),
(362, '189.1', 'Tokoh Adat/Masyarakat', '-', 1),
(363, '190', 'HUBUNGAN LUAR NEGERI', '-', 1),
(364, '191', 'Perwakilan Asing', '-', 1),
(365, '192', 'Tamu Negara', '-', 1),
(366, '193', 'Kerjasama Dengan Negara Asing', '-', 1),
(367, '193.1', 'Asean', '-', 1),
(368, '193.2', 'Bantuan Luar Negeri/Hibah', '-', 1),
(369, '194', 'Perwakilan RI Di Luar Negeri/Hibah', '-', 1),
(370, '195', 'PBB', '-', 1),
(371, '196', 'Laporan Luar Negeri', '-', 1),
(372, '197', 'Hutang Luar Negeri PHLN/LOAN', '-', 1),
(373, '198', '-', '-', 1),
(374, '199', '-', '-', 1),
(375, '200', 'POLITIK', '-', 1),
(376, '201', 'Kebijaksanaan umum', '-', 1),
(377, '202', 'Orde baru', '-', 1),
(378, '203', 'Reformasi', '-', 1),
(379, '204', '-', '-', 1),
(380, '205', '-', '-', 1),
(381, '206', '-', '-', 1),
(382, '210', 'KEPARTAIAN', '-', 1),
(383, '211', 'Lambang partai', '-', 1),
(384, '212', 'Kartu tanda anggota', '-', 1),
(385, '213', 'Bantuan keuangan parpol', '-', 1),
(386, '214', '-', '-', 1),
(387, '215', '-', '-', 1),
(388, '216', '-', '-', 1),
(389, '220', 'ORGANISASI KEMASYARAKATAN', '-', 1),
(390, '221', 'Berdasarkan perjuangan', '-', 1),
(391, '221.1', 'Perintis kemerdekaan', '-', 1),
(392, '221.2', 'angkatan 45', '-', 1),
(393, '221.3', 'Veteran', '-', 1),
(394, '222', 'Berdasarkan Kekaryaan', '-', 1),
(395, '222.1', 'PEPABRI', '-', 1),
(396, '222.2', 'Wredatama', '-', 1),
(397, '223', 'Berdasarkan kerohanian', '-', 1),
(398, '224', 'Lembaga adat', '-', 1),
(399, '225', 'Lembaga Swadaya Masyarakat', '-', 1),
(400, '226', '-', '-', 1),
(401, '230', 'ORGANISASI PROFESI DAN FUNGSIONAL', '-', 1),
(402, '231', 'Ikatan Dokter Indonesia', '-', 1),
(403, '232', 'Persatuan Guru Republik Indonesia', '-', 1),
(404, '233', 'PERSATUAN SARJANA HUKUM INDONESIA', '-', 1),
(405, '234', 'Persatuan Advokat Indonesia', '-', 1),
(406, '235', 'Lembaga Bantuan Hukum Indonesia', '-', 1),
(407, '236', 'Korps Pegawai Republik Indonesia', '-', 1),
(408, '237', 'Persatuan Wartawan Indonesia', '-', 1),
(409, '238', 'Ikatan Cendikiawan Muslim Indonesia', '-', 1),
(410, '239', 'Organisasi Profesi Dan Fungsional Lainnya', '-', 1),
(411, '240', 'ORGANISASI PEMUDA', '-', 1),
(412, '241', 'Komite Nasional Pemuda Indonesia', '-', 1),
(413, '242', 'Organisasi Mahasiswa', '-', 1),
(414, '243', 'Organisasi Pelajar', '-', 1),
(415, '244', 'Gerakan Pemuda Ansor', '-', 1),
(416, '245', 'Gerakan Pemuda Islam Indonesia', '-', 1),
(417, '246', 'Gerakan Pemuda Marhaenis', '-', 1),
(418, '247', '-', '-', 1),
(419, '248', '-', '-', 1),
(420, '250', 'ORGANISASI BURUH, TANI, NELAYAN DAN ANGKUTAN', '-', 1),
(421, '251', 'Federasi Buruh Seluruh Indonesia', '-', 1),
(422, '252', 'Organisasi Buruh Internasional', '-', 1),
(423, '253', 'Himpunan Kerukunan Tani', '-', 1),
(424, '254', 'Himpunan Nelayan Seluruh Indonesia', '-', 1),
(425, '255', 'Keluarga Sopir Proporsional Indonesia', '-', 1),
(426, '256', '-', '-', 1),
(427, '257', '-', '-', 1),
(428, '258', '-', '-', 1),
(429, '260', 'ORGANISASI WANITA', '-', 1),
(430, '261', 'Dharma Wanita', '-', 1),
(431, '262', 'Persatuan Wanita Indonesia', '-', 1),
(432, '263', 'Pemberdayaan Perempuan (wanita)', '-', 1),
(433, '264', 'Kongres Wanita', '-', 1),
(434, '265', '-', '-', 1),
(435, '266', '-', '-', 1),
(436, '267', '-', '-', 1),
(437, '268', '-', '-', 1),
(438, '269', '-', '-', 1),
(439, '270', 'PEMILIHAN UMUM', '-', 1),
(440, '271', 'Pencalonan', '-', 1),
(441, '272', 'Nomor Urut Partai / Tanda Gambar', '-', 1),
(442, '273', 'Kampanye', '-', 1),
(443, '274', 'Petugas Pemilu', '-', 1),
(444, '275', 'Pemilih / Daftar Pemilih', '-', 1),
(445, '276', 'Sarana', '-', 1),
(446, '276.1', 'TPS', '-', 1),
(447, '276.2', 'Kendaraan', '-', 1),
(448, '276.3', 'Surat Suara', '-', 1),
(449, '276.4', 'Kotak Suara', '-', 1),
(450, '276.5', 'Dana', '-', 1),
(451, '277', 'Pemungutan Suara / Perhitungan Suara', '-', 1),
(452, '278', 'Penetapan Hasil Pemilu', '-', 1),
(453, '279', 'Penetapan Perolehan Jumlah Kursi Dan Calon Terpilih', '-', 1),
(454, '280', 'Pengucapan Sumpah Janji MPR,DPR,DPD', '-', 1),
(455, '281', '', '-', 1),
(456, '282', '-', '-', 1),
(457, '283', '-', '-', 1),
(458, '284', '-', '-', 1),
(459, '300', 'KEAMANAN / KETERTIBAN', '-', 1),
(460, '301', 'Keamanan', '-', 1),
(461, '302', 'Ketertiban', '-', 1),
(462, '303', '-', '-', 1),
(463, '310', 'PERTAHANAN', '-', 1),
(464, '311', 'Darat', '-', 1),
(465, '312', 'Laut', '-', 1),
(466, '313', 'Udara', '-', 1),
(467, '314', 'Perbatasan', '-', 1),
(468, '315', '-', '-', 1),
(469, '316', '-', '-', 1),
(470, '317', '-', '-', 1),
(471, '320', 'KEMILITERAN', '-', 1),
(472, '321', 'Latihan Militer', '-', 1),
(473, '322', 'Wajib Militer', '-', 1),
(474, '323', 'Operasi Militer', '-', 1),
(475, '324', 'Kekaryaan TNI Pejabat Sipil dari TNI', '-', 1),
(476, '324.1', 'TMD', '-', 1),
(477, '325', '-', '-', 1),
(478, '326', '-', '-', 1),
(479, '327', '-', '-', 1),
(480, '328', '-', '-', 1),
(481, '330', 'KEAMANAN', '-', 1),
(482, '331', 'Kepolisian', '-', 1),
(483, '331.1', 'Polisi Pamong Praja', '-', 1),
(484, '331.2', 'Kamra', '-', 1),
(485, '331.3', 'Kamling', '-', 1),
(486, '331.4', 'Jaga Wana', '-', 1),
(487, '332', 'Huru-Hara / Demonstrasi', '-', 1),
(488, '333', 'Senjata Api Tajam', '-', 1),
(489, '334', 'Bahan Peledak', '-', 1),
(490, '335', 'Perjudian', '-', 1),
(491, '336', 'Surat-Surat Kaleng', '-', 1),
(492, '337', 'Pengaduan', '-', 1),
(493, '338', 'Himbauan / Larangan', '-', 1),
(494, '339', 'Teroris', '-', 1),
(495, '340', 'PERTAHANAN SIPIL', '-', 1),
(496, '341', 'Perlindungan Sipil', '-', 1),
(497, '342', '-', '-', 1),
(498, '343', '-', '-', 1),
(499, '344', '-', '-', 1),
(500, '350', 'KEJAHATAN', '-', 1),
(501, '351', 'Makar / Pemberontak', '-', 1),
(502, '352', 'Pembunuhan', '-', 1),
(503, '353', 'Penganiayaan, Pencurian', '-', 1),
(504, '354', 'Subversi / Penyelundupan / Narkotika', '-', 1),
(505, '355', 'Pemalsuan', '-', 1),
(506, '356', 'Korupsi / Penyelewengan / Penyalahgunaan Jabatan / KKN', '-', 1),
(507, '357', 'Pemerkosaan / Perbuatan Cabul', '-', 1),
(508, '358', 'Kenakalan', '-', 1),
(509, '359', 'Kejahatan Lainnya', '-', 1),
(510, '360', 'BENCANA', '-', 1),
(511, '361', 'Gunung Berapi / Gempa', '-', 1),
(512, '362', 'Banjir / Tanah Longsor', '-', 1),
(513, '363', 'Angin Topan', '-', 1),
(514, '364', 'Kebakaran', '-', 1),
(515, '364.1', 'Pemadam Kebakaran', '-', 1),
(516, '365', 'Kekeringan', '-', 1),
(517, '366', 'Tsunami', '-', 1),
(518, '367', '-', '-', 1),
(519, '368', '-', '-', 1),
(520, '370', 'KECELAKAAN / SAR', '-', 1),
(521, '371', 'Darat', '-', 1),
(522, '372', 'Udara', '-', 1),
(523, '373', 'Laut', '-', 1),
(524, '374', 'Sungai / Danau', '-', 1),
(525, '375', '-', '-', 1),
(526, '376', '-', '-', 1),
(527, '377', '-', '-', 1),
(528, '380', '-', '-', 1),
(529, '381', '-', '-', 1),
(530, '382', '-', '-', 1),
(531, '383', '-', '-', 1),
(532, '390', '-', '-', 1),
(533, '391', '-', '-', 1),
(534, '392', '-', '-', 1),
(535, '393', '-', '-', 1),
(536, '400', 'KESEJAHTERAAN RAKYAT', '-', 1),
(537, '401', 'Keluarga Miskin', '-', 1),
(538, '402', 'PNPM Mandiri Pedesaan', '-', 1),
(539, '403', '-', '-', 1),
(540, '404', '-', '-', 1),
(541, '410', 'PEMBANGUNAN DESA', '-', 1),
(542, '411', 'Pembinaan Usaha Gotong Royong', '-', 1),
(543, '411.1', 'Swadaya Gotong Royong', '-', 1),
(544, '411.11', 'Penataan Gotong Royong', '-', 1),
(545, '411.12', 'Gotong Royong Dinamis', '-', 1),
(546, '411.13', 'Gotong Royong Statis', '-', 1),
(547, '411.14', 'Pungutan', '-', 1),
(548, '411.2', 'Lembaga Sosial Desa (LSD)', '-', 1),
(549, '411.21', 'Pembinaan', '-', 1),
(550, '411.22', 'Klasifikasi', '-', 1),
(551, '411.23', 'Proyek', '-', 1),
(552, '411.24', 'Musyawarah', '-', 1),
(553, '411.3', 'Latihan Kerja Masyarakat', '-', 1),
(554, '411.31', 'Kader Masyarakat', '-', 1),
(555, '411.32', 'Kuliah Kerja Nyata (KKN)', '-', 1),
(556, '411.33', 'Pusat Latihan', '-', 1),
(557, '411.34', 'Kursus-Kursus', '-', 1),
(558, '411.35', 'Kurikulum / Sylabus', '-', 1),
(559, '411.36', 'Ketrampilan', '-', 1),
(560, '411.37', 'Pramuka', '-', 1),
(561, '411.4', 'Pembinaan Kesejahteraan Keluarga (PKK)', '-', 1),
(562, '411.41', 'Program', '-', 1),
(563, '411.42', 'Pembinaan Organisasi', '-', 1),
(564, '411.43', 'Kegiatan', '-', 1),
(565, '411.5', 'Penyuluhan', '-', 1),
(566, '411.51', 'Publikasi', '-', 1),
(567, '411.52', 'Peragaan', '-', 1),
(568, '411.53', 'Sosio Drama', '-', 1),
(569, '411.54', 'Siaran Pedesaan', '-', 1),
(570, '411.55', 'Penyuluhan Lapangan', '-', 1),
(571, '411.6', 'Kelembagaan Desa', '-', 1),
(572, '411.61', 'Kelompok Tani', '-', 1),
(573, '411.62', 'Rukun Tani', '-', 1),
(574, '411.63', 'Subak', '-', 1),
(575, '411.64', 'Dharma Tirta', '-', 1),
(576, '412', 'Perekonomian Desa', '-', 1),
(577, '412.1', 'Produksi Desa', '-', 1),
(578, '412.11', 'Pengolahan', '-', 1),
(579, '412.12', 'Pemasaran', '-', 1),
(580, '412.2', 'Keuangan Desa', '-', 1),
(581, '412.21', 'Perkreditan Desa', '-', 1),
(582, '412.22', 'Inventarisasi Data', '-', 1),
(583, '412.23', 'Perkembangan / Pelaksanaan', '-', 1),
(584, '412.24', 'Bantuan / Stimulans', '-', 1),
(585, '412.25', 'Petunjuk / Pembinaan Pelaksanaan', '-', 1),
(586, '412.3', 'Koperasi Desa', '-', 1),
(587, '412.31', 'Badan Usaha Unit Desa (BUUD)', '-', 1),
(588, '412.32', 'Koperasi Usaha Desa', '-', 1),
(589, '412.4', 'Penataan Bantuan Pembangunan Desa', '-', 1),
(590, '412.41', 'Jumlah Desa Yang Diberi Bantuan', '-', 1),
(591, '412.42', 'Pengarahan', '-', 1),
(592, '412.43', 'Pusat', '-', 1),
(593, '412.44', 'Daerah', '-', 1),
(594, '412.5', 'Alokasi Bantuan Pembangunan Desa', '-', 1),
(595, '412.51', 'Pusat', '-', 1),
(596, '412.52', 'Daerah', '-', 1),
(597, '412.6', 'Pelaksanaan Bantuan Pembangunan Desa', '-', 1),
(598, '412.61', 'Bantuan Langsung', '-', 1),
(599, '412.62', 'Bantuan Keserasian', '-', 1),
(600, '412.63', 'Bantuan Juara Lomba Desa', '-', 1),
(601, '413', 'Prasarana Desa', '-', 1),
(602, '413.1', 'Prasarana Desa', '-', 1),
(603, '413.11', 'Pembinaan', '-', 1),
(604, '413.12', 'Bimbingan Teknis', '-', 1),
(605, '413.2', 'Pemukiman Kembali Penduduk', '-', 1),
(606, '413.21', 'Lokasi', '-', 1),
(607, '413.22', 'Diskusi', '-', 1),
(608, '413.23', 'Pelaksanaan', '-', 1),
(609, '413.3', 'Masyarakat Pradesa', '-', 1),
(610, '413.31', 'Pembinaan', '-', 1),
(611, '413.32', 'Penyuluhan', '-', 1),
(612, '413.4', 'Pemugaran Perumahan Dan Lingkungan Desa', '-', 1),
(613, '413.41', 'Rumah Sehat', '-', 1),
(614, '413.42', 'Proyek Perintis', '-', 1),
(615, '413.43', 'Pelaksanaan', '-', 1),
(616, '413.44', 'Pengembangan', '-', 1),
(617, '413.45', 'Perbaikan Kampung', '-', 1),
(618, '414', 'Pengembangan Desa', '-', 1),
(619, '414.1', 'Tingkat Perkembangan Desa', '-', 1),
(620, '414.11', 'Jumlah Desa', '-', 1),
(621, '414.12', 'Pemekaran Desa', '-', 1),
(622, '414.13', 'Pembentukan Desa Baru', '-', 1),
(623, '414.14', 'Evaluasi', '-', 1),
(624, '414.15', 'Bagan', '-', 1),
(625, '414.2', 'Unit Desa Kerja Pembangunan (UDKP)', '-', 1),
(626, '414.21', 'Penyuluhan Program', '-', 1),
(627, '414.22', 'Lokasi UDKP', '-', 1),
(628, '414.23', 'Pelaksanaan', '-', 1),
(629, '414.24', 'Bimbingan/Pembinaan', '-', 1),
(630, '414.25', 'Evaluasi', '-', 1),
(631, '414.3', 'Tata Desa', '-', 1),
(632, '414.31', 'Inventarisasi', '-', 1),
(633, '414.32', 'Penyusunan Pola Tata Desa', '-', 1),
(634, '414.33', 'Aplikasi Tata Desa', '-', 1),
(635, '414.34', 'Pemetaan', '-', 1),
(636, '414.35', 'Pedoman Pelaksanaan', '-', 1),
(637, '414.36', 'Evaluasi', '-', 1),
(638, '414.4', 'Perlombaan Desa', '-', 1),
(639, '414.41', 'Pedoman', '-', 1),
(640, '414.42', 'Penilaian', '-', 1),
(641, '414.43', 'Kejuaraan', '-', 1),
(642, '414.44', 'Piagam', '-', 1),
(643, '415', 'Koordinasi', '-', 1),
(644, '415.1', 'Sektor Khusus', '-', 1),
(645, '415.2', 'Rapat Koordinasi Horizontal (RKH)', '-', 1),
(646, '415.3', 'Tim Koordinasi Pusat (TKP)', '-', 1),
(647, '415.4', 'Kerjasama', '-', 1),
(648, '415.41', 'Luar Negeri (UNICEF)', '-', 1),
(649, '415.42', 'Perguruan Tinggi', '-', 1),
(650, '415.43', 'Kementerian / Lembaga Non Kementerian', '-', 1),
(651, '416', '-', '-', 1),
(652, '417', '-', '-', 1),
(653, '418', '-', '-', 1),
(654, '420', 'PENDIDIKAN', '-', 1),
(655, '420.1', 'Pendidikan Khusus Klasifikasi Disini Pendidikan Putra/I Irja', '-', 1),
(656, '421', 'Sekolah', '-', 1),
(657, '421.1', 'Pra Sekolah', '-', 1),
(658, '421.2', 'Sekolah Dasar', '-', 1),
(659, '421.3', 'Sekolah Menengah', '-', 1),
(660, '421.4', 'Sekolah Tinggi', '-', 1),
(661, '421.5', 'Sekolah Kejuruan', '-', 1),
(662, '421.6', 'Kegiatan Sekolah, Dies Natalis Lustrum', '-', 1),
(663, '421.7', 'Kegiatan Pelajar', '-', 1),
(664, '421.71', 'Reuni Darmawisata', '-', 1),
(665, '421.72', 'Pelajar Teladan', '-', 1),
(666, '421.73', 'Resimen Mahasiswa', '-', 1),
(667, '421.8', 'Sekolah Pendidikan Luar Biasa', '-', 1),
(668, '421.9', 'Pendidikan Luar Sekolah / Pemberantasan Buta Huruf', '-', 1),
(669, '422', 'Administrasi Sekolah', 'Persyaratan Masuk Sekolah, Testing, Ujian, Pendaftaran,', 1),
(670, '422.1', 'Mapras, Perpeloncoan', '-', 1),
(671, '422.2', 'Tahun Pelajaran', '-', 1),
(672, '422.3', 'Hari Libur', '-', 1),
(673, '422.4', 'Uang Sekolah, Klasifikasi Disini SPP', '-', 1),
(674, '422.5', 'Beasiswa', '-', 1),
(675, '423', 'Metode Belajar', '-', 1),
(676, '423.1', 'Kuliah', '-', 1),
(677, '423.2', 'Ceramah, Simposium', '-', 1),
(678, '423.3', 'Diskusi', '-', 1),
(679, '423.4', 'Kuliah Lapangan, Widyawisata, KKN, Studi Tur', '-', 1),
(680, '423.5', 'Kurikulum', '-', 1),
(681, '423.6', 'Karya Tulis', '-', 1),
(682, '423.7', 'Ujian', '-', 1),
(683, '424', 'Tenaga Pengajar, Guru, Dosen, Dekan, Rektor', 'Klasifikasi Disini: Guru Teladan', 1),
(684, '425', 'Sarana Pendidikan', '-', 1),
(685, '425.1', 'Gedung', '-', 1),
(686, '425.11', 'Gedung Sekolah', '-', 1),
(687, '425.12', 'Kampus', '-', 1),
(688, '425.13', 'Pusat Kegiatan Mahasiswa', '-', 1),
(689, '425.2', 'Buku', '-', 1),
(690, '425.3', 'Perlengkapan Sekolah', '-', 1),
(691, '426', 'Keolahragaan', '-', 1),
(692, '426.1', 'Cabang Olah Raga', '-', 1),
(693, '426.2', 'Sarana', '-', 1),
(694, '426.21', 'Gedung Olah Raga', '-', 1),
(695, '426.22', 'Stadion', '-', 1),
(696, '426.23', 'Lapangan', '-', 1),
(697, '426.24', 'Kolam renang', '-', 1),
(698, '426.3', 'Pesta Olah Raga, ', 'Klasifikasi Disini: PON, Porsade, Olimpiade, dsb', 1),
(699, '426.4', 'KONI', '-', 1),
(700, '427', 'Kepramukaan Meliputi: Organisasi Dan Kegiatan Remaja', 'Klasifikasi Disini: Gelanggang Remaja', 1),
(701, '428', 'Kepramukaan', '-', 1),
(702, '429', 'Pendidikan  Kedinasan Untuk Depdagri, Lihat 890', '-', 1),
(703, '430', 'KEBUDAYAAN', '-', 1),
(704, '431', 'Kesenian', '-', 1),
(705, '431.1', 'Cabang Kesenian', '-', 1),
(706, '431.2', 'Sarana', '-', 1),
(707, '431.21', 'Gedung Kesenian', '-', 1),
(708, '432', 'Kepurbakalaan', '-', 1),
(709, '432.1', 'Museum', '-', 1),
(710, '432.2', 'Peninggalan Kuno', '-', 1),
(711, '432.21', 'Candi Termasuk Pemugaran', '-', 1),
(712, '432.22', 'Benda', '-', 1),
(713, '433', 'Sejarah', '-', 1),
(714, '434', 'Bahasa', '-', 1),
(715, '435', 'Usaha Pertunjukan, Hiburan, Kesenangan', '-', 1),
(716, '436', 'Kepercayaan', '-', 1),
(717, '437', '-', '-', 1),
(718, '438', '-', '-', 1),
(719, '439', '-', '-', 1),
(720, '440', 'KESEHATAN', '-', 1),
(721, '441', 'Pembinaan Kesehatan', '-', 1),
(722, '441.1', 'Gizi', '-', 1),
(723, '441.2', 'Mata', '-', 1),
(724, '441.3', 'Jiwa', '-', 1),
(725, '441.4', 'Kanker', '-', 1),
(726, '441.5', 'Usaha Kegiatan Sekolah (UKS)', '-', 1),
(727, '441.6', 'Perawatan', '-', 1),
(728, '441.7', 'Penyuluhan Kesehatan Masyarakat (PKM)', '-', 1),
(729, '441.8', 'Pekan Imunisasi Nasional', '-', 1),
(730, '442', 'Obat-obatan', '-', 1),
(731, '442.1', 'Pengadaan', '-', 1),
(732, '442.2', 'Penyimpanan', '-', 1),
(733, '443', 'Penyakit Menular', '-', 1),
(734, '443.1', 'Pencegahan', '-', 1),
(735, '443.2', 'Pemberantasan dan Pencegahan Penyakit Menular Langsung (P2ML)', '-', 1),
(736, '443.21', 'Kusta', '-', 1),
(737, '443.22', 'Kelamin', '-', 1),
(738, '443.23', 'Frambosia', '-', 1),
(739, '443.24', 'TBC / AIDS / HIV', '-', 1),
(740, '443.3', 'Epidemiologi dan Karantina (Epidka)', '-', 1),
(741, '443.31', 'Kholera', '-', 1),
(742, '443.32', 'Imunisasi', '-', 1),
(743, '443.33', 'Survailense', '-', 1),
(744, '443.34', 'Rabies (Anjing Gila) Antraks', '-', 1),
(745, '443.4', 'Pemberantasan & Pencegahan Penyakit Menular Sumber Binatang (P2B)', '-', 1),
(746, '443.41', 'Malaria', '-', 1),
(747, '443.42', 'Dengue Faemorrhagic Fever (Demam Berdarah HDF)', '-', 1),
(748, '443.43', 'Filaria', '-', 1),
(749, '443.44', 'Serangga', '-', 1),
(750, '443.5', 'Hygiene Sanitasi', '-', 1),
(751, '443.51', 'Tempat-tempat Pembuatan Dan Penjualan Makanan dan Minuman (TPPMM)', '-', 1),
(752, '443.52', 'Sarana Air Minum Dan Jamban Keluarga (Samijaga)', '-', 1),
(753, '443.53', 'Pestisida', '-', 1),
(754, '444', 'Gizi', '-', 1),
(755, '444.1', ' Kekurangan Makanan Bahaya Kelaparan, Busung Lapar', '-', 1),
(756, '444.2', 'Keracunan Makanan', '-', 1),
(757, '444.3', 'Menu Makanan Rakyat', '-', 1),
(758, '444.4', 'Badan Perbaikan Gizi Daerah (BPGD)', '-', 1),
(759, '444.5', 'Program Makanan Tambahn Anak Sekolah (PMT-AS)', '-', 1),
(760, '445', 'Rumah Sakit, Balai Kesehatan, PUSKESMAS, PUSKESMAS, Keliling, Poliklinik', '-', 1),
(761, '446', 'Tenaga Medis', '-', 1),
(762, '448', 'Pengobatan Tadisional', '-', 1),
(763, '448.1', 'Pijat', '-', 1),
(764, '448.2', 'Tusuk Jarum', '-', 1),
(765, '448.3', 'Jamu Tradisional', '-', 1),
(766, '448.4', 'Dukun / Paranormal', '-', 1),
(767, '450', 'AGAMA', '-', 1),
(768, '451', 'Islam', '-', 1),
(769, '451.1', 'Peribadatan', '-', 1),
(770, '451.11', 'Sholat', '-', 1),
(771, '451.12', 'Zakat Fitrah', '-', 1),
(772, '451.13', 'Puasa', '-', 1),
(773, '451.14', 'MTQ', '-', 1),
(774, '451.2', 'Rumah Ibadah', '-', 1),
(775, '451.3', 'Tokoh Agama', '-', 1),
(776, '451.4', 'Pendidikan', '-', 1),
(777, '451.41', 'Tinggi', '-', 1),
(778, '451.42', 'Menengah', '-', 1),
(779, '451.43', 'Dasar', '-', 1),
(780, '451.44', 'Pondok Pesantren', '-', 1),
(781, '451.45', 'Gedung Sekolah', '-', 1),
(782, '451.46', 'Tenaga Pengajar', '-', 1),
(783, '451.47', 'Buku', '-', 1),
(784, '451.48', 'Dakwah', '-', 1),
(785, '451.49', 'Organisasi / Lembaga Pendidikan', '-', 1),
(786, '451.5', 'Harta Agama Wakaf, Baitulmal, dsb', '-', 1),
(787, '451.6', 'Peradilan', '-', 1),
(788, '451.7', 'Organisasi Keagamaan Bukan Politik Majelis Ulama', '-', 1),
(789, '451.8', 'Mazhab', '-', 1),
(790, '452', 'Protestan', '-', 1),
(791, '452.1', 'Peribadatan', '-', 1),
(792, '452.2', 'Rumah Ibadah', '-', 1),
(793, '452.3', 'Tokoh Agama, Rohaniawan, Pendeta, Domine', '-', 1),
(794, '452.4', 'Mazhab', '-', 1),
(795, '452.5', 'Organisasi Gerejani', '-', 1),
(796, '453', 'Katolik', '-', 1),
(797, '453.1', 'Peribadatan', '-', 1),
(798, '453.2', 'Rumah Ibadah', '-', 1),
(799, '453.3', 'Tokoh Agama, Rohaniawan, Pendeta, Pastor', '-', 1),
(800, '453.4', 'Mazhab', '-', 1),
(801, '453.5', 'Organisasi Gerejani', '-', 1),
(802, '454', 'Hindu', '-', 1),
(803, '454.1', 'Peribadatan', '-', 1),
(804, '454.2', 'Rumah Ibadah', '-', 1),
(805, '454.3', 'Tokoh Agama, Rohaniawan', '-', 1),
(806, '454.4', 'Mazhab', '-', 1),
(807, '454.5', 'Organisasi Keagamaan', '-', 1),
(808, '455', 'Budha', '-', 1),
(809, '455.1', 'Peribadatan', '-', 1),
(810, '455.2', 'Rumah Ibadah', '-', 1),
(811, '455.3', 'Tokoh Agama, Rohaniawan', '-', 1),
(812, '455.4', 'Mazhab', '-', 1),
(813, '455.5', 'Organisasi Keagamaan', '-', 1),
(814, '456', 'Urusan Haji', '-', 1),
(815, '456.1', 'ONH', '-', 1),
(816, '456.2', 'Manasik', '-', 1),
(817, '457', '-', '-', 1),
(818, '458', '-', '-', 1),
(819, '458', '-', '-', 1),
(820, '460', 'SOSIAL', '-', 1),
(821, '461', 'Rehabilitasi Penderita Cacat', '-', 1),
(822, '461.1', 'Cacat Maat', '-', 1),
(823, '461.2', 'Cacat Tubuh', '-', 1),
(824, '461.3', 'Cacat Mental', '-', 1),
(825, '461.4', 'Bisul/Tuli', '-', 1),
(826, '462', 'Tuna Sosial', '-', 1),
(827, '462.1', 'Gelandangan', '-', 1),
(828, '462.2', 'Pengemis', '-', 1),
(829, '462.3', 'Tuna Susila', '-', 1),
(830, '462.4', 'Anak Nakal', '-', 1),
(831, '463', 'Kesejahteraan Anak / Keluarga', '-', 1),
(832, '463.1', 'Anak Putus Sekolah', '-', 1),
(833, '463.2', 'Ibu Teladan', '-', 1),
(834, '463.3', 'Anak Asuh', '-', 1),
(835, '464', 'Pembinaan Pahlawan', 'Pahlawan Meliputi: Penghargaan Kepada Pahlawan,', 1),
(836, '464.1', 'Tunjangan Kepada Pahlawan Dan Jandanya', 'Perintis Kemerdekaan Meliputi: Pembinaan, Penghargaan', 1),
(837, '464.2', 'Dan Tunjangan Kepada Perintis', '-', 1),
(838, '464.3', 'Cacat Veteran', '-', 1),
(839, '465', 'Kesejahteraan Sosial', '-', 1),
(840, '465.1', 'Lanjut Usia', '-', 1),
(841, '465.2', 'Korban Kekacauan, Pengungsi, Repatriasi', '-', 1),
(842, '466', 'Sumbangan Sosial', '-', 1),
(843, '466.1', 'Korban Bencana', '-', 1),
(844, '466.2', 'Pencarian Dana Untuk Sumbangan', '-', 1),
(845, '466.3', 'Meliputi: Penyelenggaraan Undian, Ketangkasan, Bazar, dsb', '-', 1),
(846, '466.4', 'Panti Asuhan', '-', 1),
(847, '466.5', 'Panti Jompo', '-', 1),
(848, '467', ' Bimbingan Sosial', '-', 1),
(849, '467.1', 'Masyarakat Suku Terasing Meliputi: Bimbingan, Pendidikan, Kesehatan, Pemukiman', '-', 1),
(850, '468', 'PMI', '-', 1),
(851, '469', 'Makam', '-', 1),
(852, '469.1', 'Umum', '-', 1),
(853, '469.2', 'Pahlawan Meliputi: Penghargaan Kepada Pahlawan, Tunjangan Kpd Pahlawan Dan Jandanya', '-', 1),
(854, '469.3', 'Khusus Keluarga Raja', '-', 1),
(855, '469.4', 'Krematorium', '-', 1),
(856, '470', 'KEPENDUDUKAN', '-', 1),
(857, '471', 'Pendaftaran Penduduk', '-', 1),
(858, '471.1', 'Identitas Penduduk', '-', 1),
(859, '471.11', 'Biodata', '-', 1),
(860, '471.12', 'Nomor Induk Kependudukan', '-', 1),
(861, '471.13', 'Kartu Tanda Penduduk', '-', 1),
(862, '471.14', 'Kartu Keluarga', '-', 1),
(863, '471.15', 'Advokasi Indentitas Penduduk', '-', 1),
(864, '471.2', 'Perpindahan Penduduk Dalam Wilayah Indonesia', '-', 1),
(865, '471.21', 'Perpindahan Penduduk WNI', '-', 1),
(866, '471.22', 'Perpindahan Penduduk WNA Dalam Wilayah Indonesia', '-', 1),
(867, '471.23', 'Perpindahan Penduduk WNA dan WNI Tinggal Sementara', '-', 1),
(868, '471.24', 'Daerah Terbelakan', '-', 1),
(869, '471.25', 'Bedol Desa', '-', 1),
(870, '471.3', 'Perpindahan Penduduk Antar Negara', '-', 1),
(871, '471.31', 'Penduduk Indonesia Ke Luar Negeri', '-', 1),
(872, '471.32', 'Orang Asing Tinggal Sementara', '-', 1),
(873, '471.33', 'Orang Asing Tinggal Tetap', '-', 1),
(874, '471.34', 'Perpindahan Penduduk Antar Negara Di Wilayah Pembatasan Antar Negara (Pelintas Batas Tradisional)', '-', 1),
(875, '471.4', 'Pendaftaran Pengungsi Dan Penduduk Rentan', '-', 1),
(876, '471.41', 'Akibat Bencana Alam', '-', 1),
(877, '471.42', 'Akibat Kerusuhan Sosial', '-', 1),
(878, '471.43', 'Pendaftaran Penduduk Daerah Terbelakang', '-', 1),
(879, '471.44', 'Pendaftaran Penduduk Rentan', '-', 1),
(880, '472', 'Pencatatan Sipil', '-', 1),
(881, '472.1', 'Kelahiran, Kematian Dan Advokasi', '-', 1),
(882, '472.11', 'Kelahiran', '-', 1),
(883, '472.12', 'Kematian', '-', 1),
(884, '472.13', 'Advokasi Kelahiran Dan Kematian', '-', 1),
(885, '472.2', 'Perkawinan, Peceraian Dan Advokasi', '-', 1),
(886, '472.3', 'Perkawinan Agama Islam', '-', 1),
(887, '472.4', 'Perkawinan Agama Non Islam', '-', 1),
(888, '472.5', 'Perceraian Agama Islam', '-', 1),
(889, '472.6', 'Perceraian Agama Non Islam', '-', 1),
(890, '472.7', 'Advokasi Perkawinan Dan Perceraian', '-', 1),
(891, '472.3', 'Pengangkatan, Pengakuan, Dan Pengesahan Anak Serta Perubahan Dan Pembatalan Akta Dan Advokasi Pengangkatan Anak', '-', 1),
(892, '472.31', 'Pengangkatan Anak', '-', 1),
(893, '472.32', 'Pengakuan Anak', '-', 1),
(894, '472.33', 'Pengesahan Anak', '-', 1),
(895, '472.34', 'Perubahan Anak', '-', 1),
(896, '472.35', 'Pembatalan Anak', '-', 1),
(897, '472.36', 'Advokasi Pengurusan Pengangkatan, Pengakuan Dan Pengesahan Anak Serta Perubahan Dan Pembatalan Akta', '-', 1),
(898, '472.4', 'Pencatatan Kewarganegaraan', '-', 1),
(899, '472.41', 'Akibat Perkawinan', '-', 1),
(900, '472.42', 'Akibat Kelahiran', '-', 1),
(901, '472.43', 'Non Perkawinan', '-', 1),
(902, '472.44', 'Non Kelahiran', '-', 1),
(903, '472.45', 'Perubahan WNI ke WNA', '-', 1),
(904, '473', 'Informasi Kependudukan', '-', 1),
(905, '473.1', 'Teknologi Informasi', '-', 1),
(906, '473.11', 'Perangkat Keras', '-', 1),
(907, '473.12', 'Perangkat Lunak', '-', 1),
(908, '473.13', 'Jaringan Komunikasi Data', '-', 1),
(909, '473.2', 'Kelembagaan Dan Sumber Daya Informasi', '-', 1),
(910, '473.21', 'Daerah Maju', '-', 1),
(911, '473.22', 'Daerah Berkembang', '-', 1),
(912, '473.23', 'Daerah Terbelakang', '-', 1),
(913, '473.3', 'Pengolahan Data Kependudukan', '-', 1),
(914, '473.31', 'Pendaftaran Penduduk', '-', 1),
(915, '473.32', 'Kejadian Vital Penduduk', '-', 1),
(916, '473.33', 'Penduduk Non Registrasi', '-', 1),
(917, '473.4', 'Pelayanan Informasi Kependudukan', '-', 1),
(918, '473.41', 'Media Elektronik', '-', 1),
(919, '473.42', 'Media Cetak', '-', 1),
(920, '473.43', 'Outlet', '-', 1),
(921, '474', 'Perkembangan Penduduk', '-', 1),
(922, '474.1', 'Pengarahan Kuantitas Penduduk', '-', 1),
(923, '474.11', 'Struktur Jumlah', '-', 1),
(924, '474.12', 'Komposisi', '-', 1),
(925, '474.13', 'Fertilitas', '-', 1),
(926, '474.14', 'Kesehatan Reproduksi', '-', 1),
(927, '474.15', 'Morbiditas Penduduk', '-', 1),
(928, '474.16', 'Mortalitas Penduduk', '-', 1),
(929, '474.2', 'Pengembangan Kuantitas Penduduk', '-', 1),
(930, '474.21', 'Anak dan Remaja', '-', 1),
(931, '474.22', 'Penduduk Usia Produktif', '-', 1),
(932, '474.23', 'Penduduk Lanjut Usia', '-', 1),
(933, '474.24', 'Gender', '-', 1),
(934, '474.3', 'Penataan Persebaran Penduduk', '-', 1),
(935, '474.31', 'Migrasi Antar Wilayah', '-', 1),
(936, '474.32', 'Migrasi Internasional', '-', 1),
(937, '474.33', 'Urbanisasi', '-', 1),
(938, '474.34', 'Sementara', '-', 1),
(939, '474.35', 'Migrasi Non Permanen', '-', 1),
(940, '474.4', 'Perlindungan Pemberdayaan Penduduk', '-', 1),
(941, '474.41', 'Pengembangan Sistem Pelindungan Penduduk', '-', 1),
(942, '474.42', 'Pelayanan Kelembagaan Ekonomi', '-', 1),
(943, '474.43', 'Pelayanan Kelembagaan Sosial Budaya', '-', 1),
(944, '474.44', 'Partisipasi Masyarakat', '-', 1),
(945, '474.5', 'Pengembangan Wawasan Kependudukan', '-', 1),
(946, '474.51', 'Pendidikan Jalur Sekolah', '-', 1),
(947, '474.52', 'Pendidikan Jalur Luar Sekolah', '-', 1),
(948, '474.53', 'Pendidikan Jalur Masyarakat', '-', 1),
(949, '474.54', 'Pembangunan Berwawasan Kependudukan', '-', 1),
(950, '475', 'Proyeksi Dan Penyerasian Kebijakan Kependudukan', '-', 1),
(951, '475.1', 'Indikator Kependudukan', '-', 1),
(952, '475.11', 'Perumusan Penetapan Dan Pengembangan Indikator Kependudukan', '-', 1),
(953, '475.12', 'Pemanfaatan Indikator Kependudukan', '-', 1),
(954, '475.13', 'Sosialisasi Indikator Kependudukan', '-', 1),
(955, '475.2', 'Proyeksi Kependudukan', '-', 1),
(956, '475.21', 'Penyusunan Dan Pengembangan Proyeksi Kependudukan', '-', 1),
(957, '475.22', 'Pemanfaatan Proyeksi Kependudukan', '-', 1),
(958, '475.3', 'Analisis Dampak Kependudukan', '-', 1),
(959, '475.31', 'Penyusunan Dan Pengembangan', '-', 1),
(960, '475.32', 'Pemanfaatan Analisis Dampak Kependudukan', '-', 1),
(961, '475.4', 'Penyerasian Kebijakan Lembaga Non Pemerintah', '-', 1),
(962, '475.41', 'Lembaga Internasioanal', '-', 1),
(963, '475.42', 'Lembaga Masyarakat Dan Nirlaba', '-', 1),
(964, '475.43', 'Lembaga Usaha Swasta', '-', 1),
(965, '475.5', 'Penyerasian Kebijakan Lembaga Pemerintah', '-', 1),
(966, '475.51', 'Lembaga Pemerintah', '-', 1),
(967, '475.52', 'Pemerintah Provinsidan Kota', '-', 1),
(968, '475.53', 'Pemerintah Kabupaten', '-', 1),
(969, '475.6', 'Analisis', '-', 1),
(970, '476', 'Monitoring', '-', 1),
(971, '477', 'Evaluasi', '-', 1),
(972, '478', 'Dokumentasi', '-', 1),
(973, '479', '-', '-', 1),
(974, '480', 'MEDIA MASSA', '-', 1),
(975, '481', 'Penerbitan', '-', 1),
(976, '481.1', 'Surat Kabar', '-', 1),
(977, '481.2', 'Majalah', '-', 1),
(978, '481.3', 'Buku', '-', 1),
(979, '481.4', 'Penerjemahan', '-', 1),
(980, '482', 'Radio', '-', 1),
(981, '482.1', 'RRI', '-', 1),
(982, '482.11', 'Siaran Pedesaan Jgn Diklasifikasikan Disini', '-', 1),
(983, '482.2', 'Non RRI', '-', 1),
(984, '482.3', 'Luar Negeri', '-', 1),
(985, '483', 'Televisi', '-', 1),
(986, '484', 'Film', '-', 1),
(987, '485', 'Pers', '-', 1),
(988, '485.1', 'Kewartawanan', '-', 1),
(989, '485.2', 'Wawancara', '-', 1),
(990, '485.3', 'Informasi Nasional', '-', 1),
(991, '486', 'Grafika', '-', 1),
(992, '487', 'Penerangan', '-', 1),
(993, '487.1', 'Pameran Non Komersil', '-', 1),
(994, '488', 'Operation Room', '-', 1),
(995, '489', 'Hubungan Masyarakat', '-', 1),
(996, '490', 'Pengaduan Masyarakat', '-', 1),
(997, '491', '-', '-', 1),
(998, '492', '-', '-', 1),
(999, '500', 'PEREKONOMIAN', '-', 1),
(1000, '500.1', 'Dewan Stabilisasi', '-', 1),
(1001, '501', 'Pengadaan Pangan', '-', 1),
(1002, '502', 'Pengadaan Sandang Perizinan Pada Umumnya Untuk Perizinan Suatu Bidang,', '-', 1),
(1003, '503', 'Kalsifikasikan Masalahnya', '-', 1),
(1004, '504', '-', '-', 1),
(1005, '505', '-', '-', 1),
(1006, '506', '-', '-', 1),
(1007, '510', 'PERDAGANGAN', 'Klasifikasikan Disini: Tata Niaga', 1),
(1008, '510.1', 'Promosi Perdagangan', '-', 1),
(1009, '510.11', 'Pekan Raya', '-', 1),
(1010, '510.12', 'Iklan', '-', 1),
(1011, '510.13', 'Pameran Non Komersil', '-', 1),
(1012, '510.2', 'Pelelangan', '-', 1),
(1013, '510.3', 'Tera', '-', 1),
(1014, '511', 'Pemasaran', '-', 1),
(1015, '511.1', 'Sembilan Bahan Pokok, Tambahkan Kode Wilayah : Beras, Garam, Tanah, Minyak Goreng', '-', 1),
(1016, '511.2', 'Pasar', '-', 1),
(1017, '511.3', 'Pertokoan, Kaki Lima, Kios', '-', 1),
(1018, '512', 'Ekspor', '-', 1),
(1019, '513', 'Impor', '-', 1),
(1020, '514', 'Perdagangan Antar Pulau', '-', 1),
(1021, '515', 'Perdagangan Luar Negeri', '-', 1),
(1022, '516', 'Pergudangan', '-', 1),
(1023, '517', 'Aneka Usaha Perdagangan', '-', 1),
(1024, '518', 'Koperasi untuk BUUD, KUD lihat ( 412.31-412.32)', '-', 1),
(1025, '519', '-', '-', 1),
(1026, '520', 'PERTANIAN', '-', 1),
(1027, '521', 'Tanaman Pangan', '-', 1),
(1028, '521.1', 'Program', '-', 1),
(1029, '521.11', 'Bimas / Inmas Termasuk Kredit', '-', 1),
(1030, '521.12', 'Penyuluhan', '-', 1),
(1031, '521.2', 'Produksi', '-', 1),
(1032, '521.21', 'Padi / Panen', '-', 1),
(1033, '521.22', 'Palawija', '-', 1),
(1034, '521.23', 'Jagung', '-', 1),
(1035, '521.24', 'Ketela Pohon / Ubi-Ubian', '-', 1),
(1036, '521.25', 'Hortikultura', '-', 1),
(1037, '521.26', 'Sayuran / Buah-Buahan', '-', 1),
(1038, '521.27', 'Tanaman Hias', '-', 1),
(1039, '521.28', 'Pembudidayaan Rumput Laut', '-', 1),
(1040, '521.3', 'Saran Usaha Pertanian', '-', 1),
(1041, '521.31', 'Peralatan Meliputi: Traktor Dan Peralatan Lainya', '-', 1),
(1042, '521.32', 'Pembibitan', '-', 1),
(1043, '521.33', 'Pupuk', '-', 1),
(1044, '521.4', 'Perlindungan Tanaman', '-', 1),
(1045, '521.41', 'Penyakit, Penyakit Daun, Penyakit Batang Hama, Serangga, Wereng, Walang Sangit, Tungru, Tikus Dan Sejenisnya', '-', 1),
(1046, '521.42', 'Pemberantasan Hama Meliputi: Penyemprotan, Penyiangan, Geropyokan, Sparayer,', '-', 1),
(1047, '521.43', 'Pemberantasan Melalui Udara', '-', 1),
(1048, '521.44', 'Pestisida', '-', 1),
(1049, '521.5', 'Tanah Pertanian Pangan', '-', 1),
(1050, '521.51', 'Persawahan', '-', 1),
(1051, '521.52', 'Perladangan', '-', 1),
(1052, '521.53', 'Kebun', '-', 1),
(1053, '521.54', 'Rumpun Ikan Laut', '-', 1),
(1054, '521.55', 'KTA/Lahan Kritis', '-', 1),
(1055, '521.6', 'Pengusaha Petani', '-', 1),
(1056, '521.7', 'Bina Usaha', '-', 1),
(1057, '521.71', 'Pasca Panen', '-', 1),
(1058, '521.72', 'Pemasaran Hasil', '-', 1),
(1059, '522', 'Kehutanan', '-', 1),
(1060, '522.1', 'Program', '-', 1),
(1061, '522.11', 'Hak Pengusahaan Hutan', '-', 1),
(1062, '522.12', 'Tata Guna Hutan', '-', 1),
(1063, '522.13', 'Perpetaan Hutan', '-', 1),
(1064, '522.14', 'Tumpangsari', '-', 1),
(1065, '522.2', 'Produksi', '-', 1),
(1066, '522.21', 'Kayu', '-', 1),
(1067, '522.22', 'Non Kayu', '-', 1),
(1068, '522.3', 'Sarana  Usaha  Kehutanan', '-', 1),
(1069, '522.4', 'Penghijauan, Reboisasi', '-', 1),
(1070, '522.5', 'Kelestarian', '-', 1),
(1071, '522.51', 'Cagar Alam, Marga Satwa, Suaka Marga Satwa', '-', 1),
(1072, '522.52', 'Berburu Meliputi Larangan Dan Ijin Berburu', '-', 1),
(1073, '522.53', 'Kebun Binatang', '-', 1),
(1074, '522.54', 'Konservasi Lahan', '-', 1),
(1075, '522.6', 'Penyakit/Hama', '-', 1),
(1076, '522.7', 'Jenis-jenis Hutan', '-', 1),
(1077, '522.71', 'Hutan Hidup', '-', 1),
(1078, '522.72', 'Hutan Wisata', '-', 1),
(1079, '522.73', 'Hutan Produksi', '-', 1),
(1080, '522.74', 'Hutan Lindung', '-', 1),
(1081, '523', 'Perikanan', '-', 1),
(1082, '523.1', 'Program', '-', 1),
(1083, '523.11', 'Penyuluhan', '-', 1),
(1084, '523.12', 'Teknologi', '-', 1),
(1085, '523.2', 'Produksi', '-', 1),
(1086, '523.21', 'Pelelangan', '-', 1),
(1087, '523.3', 'Usaha Perikanan', '-', 1),
(1088, '523.31', 'Pembibitan', '-', 1),
(1089, '523.32', 'Daerah Penagkapan', '-', 1),
(1090, '523.33', 'Pertambakan Meliputi: ( Tambak Ikan Air Deras, Tambak Udang dll )', '-', 1),
(1091, '523.34', 'Jaring Terapung', '-', 1),
(1092, '523.4', 'Sarana', '-', 1),
(1093, '523.41', 'Peralatan', '-', 1),
(1094, '523.42', 'Kapal', '-', 1),
(1095, '523.43', 'Pelabuhan', '-', 1),
(1096, '523.5', 'Pengusaha', '-', 1),
(1097, '523.6', 'Nelayan', '-', 1),
(1098, '524', 'Peternakan', '-', 1),
(1099, '524.1', 'Produksi', '-', 1),
(1100, '524.11', 'Susu Ternak Rakyat', '-', 1),
(1101, '524.12', 'Telur', '-', 1),
(1102, '524.13', 'Daging', '-', 1),
(1103, '524.14', 'Kulit', '-', 1),
(1104, '524.2', 'Sarana Usaha Ternak', '-', 1),
(1105, '524.21', 'Pembibitan', '-', 1),
(1106, '524.22', 'Kandang Ternak', '-', 1),
(1107, '524.3', 'Kesehatan Hewan', '-', 1),
(1108, '524.31', 'Penyakit Hewan', '-', 1),
(1109, '524.32', 'Pos Kesehatan Hewan', '-', 1),
(1110, '524.33', 'Tesi Pullorum', '-', 1),
(1111, '524.34', 'Karantina', '-', 1),
(1112, '524.35', 'Pemberantasan Penyakit Hewan Termasuk Usaha Pencegahannya', '-', 1),
(1113, '524.4', 'Perunggasan', '-', 1),
(1114, '524.5', 'Pengembangan Ternak', '-', 1),
(1115, '524.51', 'Inseminasi Buatan', '-', 1),
(1116, '524.52', 'Pembibitan / Bibit Unggul', '-', 1),
(1117, '524.53', 'Penyebaran Ternak', '-', 1),
(1118, '524.6', 'Makanan Ternak', '-', 1),
(1119, '524.7', 'Tempat Pemotongan Hewan', '-', 1);
INSERT INTO `ks` (`id`, `kode`, `nama`, `uraian`, `enabled`) VALUES
(1120, '524.8', 'Data Peternakan', '-', 1),
(1121, '525', 'Perkebunan', '-', 1),
(1122, '525.1', 'Program', '-', 1),
(1123, '525.2', 'Produksi', '-', 1),
(1124, '525.21', 'Karet', '-', 1),
(1125, '525.22', 'The', '-', 1),
(1126, '525.23', 'Tembakau', '-', 1),
(1127, '525.24', 'Tebu', '-', 1),
(1128, '525.25', 'Cengkeh', '-', 1),
(1129, '525.26', 'Kopra', '-', 1),
(1130, '525.27', 'Kopi', '-', 1),
(1131, '525.28', 'Coklat', '-', 1),
(1132, '525.29', 'Aneka Tanaman', '-', 1),
(1133, '526', '-', '-', 1),
(1134, '527', '-', '-', 1),
(1135, '528', '-', '-', 1),
(1136, '530', 'PERINDUSTRIAN', '-', 1),
(1137, '530.08', 'Undang-Undang Gangguan', '-', 1),
(1138, '531', 'Industri Logam', '-', 1),
(1139, '532', 'Industri Mesin/Elektronik', '-', 1),
(1140, '533', 'Industri Kimia/Farmasi', '-', 1),
(1141, '534', 'Industri Tekstil', '-', 1),
(1142, '535', 'Industri Makanan / Minuman', '-', 1),
(1143, '536', 'Aneka Industri / Perusahaan', '-', 1),
(1144, '537', 'Aneka Kerajinan', '-', 1),
(1145, '538', 'Usaha Negara / BUMN', '-', 1),
(1146, '538.1', 'Perjan', '-', 1),
(1147, '538.2', 'Perum', '-', 1),
(1148, '538.3', 'Persero / PT, CV', '-', 1),
(1149, '539', 'Perusahaan Daerah / BUMD/BULD', '-', 1),
(1150, '540', 'PERTAMBANGAN / KESAMUDRAAN', '-', 1),
(1151, '541', 'Minyak Bumi / Bensin', '-', 1),
(1152, '541.1', 'Pengusahaan', '-', 1),
(1153, '542', 'Gas bumi', '-', 1),
(1154, '542.1', 'Eksploitasi / Pengeboran', '-', 1),
(1155, '542.11', 'Kontrak Kerja', '-', 1),
(1156, '542.2', 'Penogolahan,', 'Meliputi :Tangki, Pompa, Tanker', 1),
(1157, '543', 'Aneka Tambang', '-', 1),
(1158, '543.1', 'Timah', '-', 1),
(1159, '543.2', 'Alumunium, Boxit', '-', 1),
(1160, '543.3', 'Besi Termasuk Besi Tua', '-', 1),
(1161, '543.4', 'Tembaga', '-', 1),
(1162, '543.5', 'Batu Bara', '-', 1),
(1163, '544', 'Logam Mulia,Emas,Intan,Perak', '-', 1),
(1164, '545', 'Logam', '-', 1),
(1165, '546', 'Geologi', '-', 1),
(1166, '546.1', 'Vulkanologi', '-', 1),
(1167, '546.11', 'Pengawasan Gunung Berapi', '-', 1),
(1168, '546.2', 'Sumur Artesis, Air Bawah Tanah', '-', 1),
(1169, '547', 'Hidrologi', '-', 1),
(1170, '548', 'Kesamudraan', '-', 1),
(1171, '549', 'Pesisir Pantai', '-', 1),
(1172, '550', 'PERHUBUNGAN', '-', 1),
(1173, '551', 'Perhubungan Darat', '-', 1),
(1174, '551.1', 'Lalu Lintas Jalan Raya, Sungai, Danau', '-', 1),
(1175, '551.11', 'Keamanan Lalu Lintas, Rambu-Rambu', '-', 1),
(1176, '551.2', 'Angkutan Jalan Raya', '-', 1),
(1177, '551.21', 'Perizinan', '-', 1),
(1178, '551.22', 'Terminal', '-', 1),
(1179, '551.23', 'Alat Angkutan', '-', 1),
(1180, '551.3', 'Angkutan Sungai', '-', 1),
(1181, '551.31', 'Perizinan', '-', 1),
(1182, '551.32', 'Terminal', '-', 1),
(1183, '551.33', 'Pelabuhan', '-', 1),
(1184, '551.4', 'Angkutan Danau', '-', 1),
(1185, '551.41', 'Perizinan', '-', 1),
(1186, '551.42', 'Terminal', '-', 1),
(1187, '551.43', 'Pelabuhan', '-', 1),
(1188, '551.5', 'Feri', '-', 1),
(1189, '551.51', 'Perizinan', '-', 1),
(1190, '551.52', 'Terminal', '-', 1),
(1191, '551.53', 'Pelabuhan', '-', 1),
(1192, '551.6', 'Perkereta-Apian', '-', 1),
(1193, '552', 'Perhubungan Laut', '-', 1),
(1194, '552.1', 'Lalu Lintas Angkutan Laut, Pelayanan Umum', '-', 1),
(1195, '552.11', 'Keamanan Lalu Lintas, Rambu-Rambu', '-', 1),
(1196, '552.12', 'Pelayaran Dalam Negeri', '-', 1),
(1197, '552.13', 'Pelayaran Luar Negeri', '-', 1),
(1198, '552.2', 'Perkapalan Alat Angkutan', '-', 1),
(1199, '552.3', 'Pelabuhan', '-', 1),
(1200, '552.4', 'Pengerukan', '-', 1),
(1201, '552.5', 'Penjagaan Pantai', '-', 1),
(1202, '553', 'Perhubungan Udara', '-', 1),
(1203, '553.1', 'Lalu Lintas Udara / Keamanan Lalu Lintas Udara', '-', 1),
(1204, '553.2', 'Pelabuhan Udara', '-', 1),
(1205, '553.3', 'Alat Angkutan', '-', 1),
(1206, '554', 'Pos', '-', 1),
(1207, '555', 'Telekomunikasi', '-', 1),
(1208, '555.1', 'Telepon', '-', 1),
(1209, '555.2', 'Telegram', '-', 1),
(1210, '555.3', 'Telex / SSB, Faximile', '-', 1),
(1211, '555.4', 'Satelit, Internet', '-', 1),
(1212, '555.5', 'Stasiun Bumi, Parabola', '-', 1),
(1213, '556', 'Pariwisata dan Rekreasi', '-', 1),
(1214, '556.1', 'Obyek Kepariwisataan Taman Mini Indonesia Indah', '-', 1),
(1215, '556.2', 'Perhotelan', '-', 1),
(1216, '556.3', 'Travel service', '-', 1),
(1217, '556.4', 'Tempat Rekreasi', '-', 1),
(1218, '557', 'Meteorologi', '-', 1),
(1219, '557.1', 'Ramalan Cuaca', '-', 1),
(1220, '557.2', 'Curah Hujan', '-', 1),
(1221, '557.3', 'Kemarau Panjang', '-', 1),
(1222, '558', '-', '-', 1),
(1223, '559', '-', '-', 1),
(1224, '560', 'TENAGA KERJA', '-', 1),
(1225, '560.1', 'Pengangguran', '-', 1),
(1226, '561', 'Upah', '-', 1),
(1227, '562', 'Penempatan Tenaga Kerja, TKI', '-', 1),
(1228, '563', 'Latihan Kerja', '-', 1),
(1229, '564', 'Tenaga Kerja', '-', 1),
(1230, '564.1', 'Butsi', '-', 1),
(1231, '564.2', 'Padat Karya', '-', 1),
(1232, '565', 'Perselisihan Perburuhan', '-', 1),
(1233, '566', 'Keselamatan Kerja', '-', 1),
(1234, '567', 'Pemutusan Hubungan Kerja', '-', 1),
(1235, '568', 'kesejahteraan Buruh', '-', 1),
(1236, '569', 'Tenaga Orang Asing', '-', 1),
(1237, '570', 'PERMODALAN', '-', 1),
(1238, '571', 'Modal Domestik', '-', 1),
(1239, '572', 'Modal Asing', '-', 1),
(1240, '573', 'Modal Patungan (Joint Venture) / Penyertaan Modal', '-', 1),
(1241, '574', 'Pasar Uang Dan Modal', '-', 1),
(1242, '575', 'Saham', '-', 1),
(1243, '576', 'Belanja Modal', '-', 1),
(1244, '577', 'Modal Daerah', '-', 1),
(1245, '580', 'PERBANKAN / MONETER', '-', 1),
(1246, '581', 'Kredit', '-', 1),
(1247, '582', 'Investasi', '-', 1),
(1248, '583', 'Pembukaan ,Perubahan,Penutupan Rekening, Deposito', '-', 1),
(1249, '584', 'Bank Pembangunan Daerah', '-', 1),
(1250, '585', 'Asuransi Dana Kecelakaan Lalu Lintas', '-', 1),
(1251, '586', 'Alat Pembayaran, Cek, Giro, Wesel, Transfer', '-', 1),
(1252, '587', 'Fiskal', '-', 1),
(1253, '588', 'Hutang Negara', '-', 1),
(1254, '589', 'Moneter', '-', 1),
(1255, '590', 'AGRARIA', '-', 1),
(1256, '591', 'Tataguna Tanah', '-', 1),
(1257, '591.1', 'Pemetaan dan Pengukuran', '-', 1),
(1258, '591.2', 'Perpetaan', '-', 1),
(1259, '591.3', 'penyediaan Data', '-', 1),
(1260, '591.4', 'Fatwa Tata Guna Tanah', '-', 1),
(1261, '591.5', 'Tanah Kritis', '-', 1),
(1262, '592', 'Landreform', '-', 1),
(1263, '592.1', 'Redistribusi', '-', 1),
(1264, '592.11', 'Pendaftaran Pemilikan Dan Pengurusan', '-', 1),
(1265, '592.12', 'Penentuan Tanah Obyek Landreform', '-', 1),
(1266, '592.13', 'Pembagian Tanah Obyek Landreform', '-', 1),
(1267, '592.14', 'Sengketa Redistribusi Tanah Obyek Landreform', '-', 1),
(1268, '592.2', 'Ganti Rugi', '-', 1),
(1269, '592.21', 'Ganti Rugi Tanah Kelebihan', 'Meliputi : Sengketa Ganti Rugi Tanah Kelebihan Tanah', 1),
(1270, '592.22', 'Ganti Rugi Tanah Absentee', 'Meliputi : Sengketa Ganti Rugi Tanah Absentee', 1),
(1271, '592.23', 'Ganti Rugi Tanah Partikelir', 'Meliputi : Sengketa Ganti Rugi Tanah Partikelir', 1),
(1272, '592.3', 'Bagi Hasil', '-', 1),
(1273, '592.31', 'Penetapan Imbangan Bagi Hasil', '-', 1),
(1274, '592.32', 'Pelaksanaan Perjanjian Bagi Hasil', '-', 1),
(1275, '592.33', 'Sengketa Perjanjian Bagi Hasil', '-', 1),
(1276, '592.4', 'Gadai Tanah', '-', 1),
(1277, '592.41', 'Pendaftaran Pemilikan Dan Pengurusan', '-', 1),
(1278, '592.42', 'Pelaksanaan Gadai Tanah', '-', 1),
(1279, '592.43', 'Sengketa Gadai Tanah', '-', 1),
(1280, '592.5', 'Bimbingan dan Penyuluhan', '-', 1),
(1281, '592.6', 'Pengembangan', '-', 1),
(1282, '592.7', 'Yayasan Dana Landreform', '-', 1),
(1283, '593', 'Pengurusan Hak-Hak Tanah', '-', 1),
(1284, '593.01', 'Penyusunan Program Dan Bimbingan Teknis', '-', 1),
(1285, '593.1', 'Sewa Tanah', '-', 1),
(1286, '593.11', 'Sewa Tanah Untuk Tanaman Tertentu, Tebu, Tembakau, Rosela, Chorcorus', '-', 1),
(1287, '593.2', 'Hak Milik', '-', 1),
(1288, '593.21', 'Perorangan', '-', 1),
(1289, '593.22', 'Badan Hukum', '-', 1),
(1290, '593.3', 'Hak Pakai', '-', 1),
(1291, '593.31', 'Perorangan', '-', 1),
(1292, '593.311', 'Warga Negara Indonesia', '-', 1),
(1293, '593.312', 'Warga Negara Asing', '-', 1),
(1294, '593.32', 'Badan Hukum', '-', 1),
(1295, '593.321', 'Badan Hukum Indonesia', '-', 1),
(1296, '593.322', 'Badan Hukum Asing, Kedutaan, Konsulat Kantor Dagang Asing', '-', 1),
(1297, '593.33', 'Tanah Gedung-Gedung Negara', '-', 1),
(1298, '593.4', 'Guna Usaha', '-', 1),
(1299, '593.41', 'Perkebunan Besar', '-', 1),
(1300, '593.42', 'Perkebunan Rakyat', '-', 1),
(1301, '593.43', 'Peternakan', '-', 1),
(1302, '593.44', 'Perikanan', '-', 1),
(1303, '593.45', 'Kehutanan', '-', 1),
(1304, '593.5', 'Hak Guna Bangunan', '-', 1),
(1305, '593.51', 'Perorangan', '-', 1),
(1306, '593.52', 'Badan Hukum', '-', 1),
(1307, '593.53', 'P3MB (Panitia Pelaksana Penguasaan Milik Belanda)', '-', 1),
(1308, '593.54', 'Badan Hukum Asing Belanda-Prrk No 5165', '-', 1),
(1309, '593.55', 'Pemulihan Hak (Pen Pres 4/1960)', '-', 1),
(1310, '593.6', 'Hak Pengelolaan', '-', 1),
(1311, '593.61', 'PN Perumnas, Bonded Ware House, Industrial Estate, Real Estate', '-', 1),
(1312, '593.62', 'Perusahaan Daerah Pembangunan Perumahan', '-', 1),
(1313, '593.7', 'Sengketa Tanah', '-', 1),
(1314, '593.71', 'Peradilan Perkara Tanah', '-', 1),
(1315, '593.8', 'Pencabutan dan Pembebasan Tanah', '-', 1),
(1316, '593.81', 'Pencabutan Hak', '-', 1),
(1317, '593.82', 'Pembebasan Tanah', '-', 1),
(1318, '593.83', 'Ganti Rugi Tanah', '-', 1),
(1319, '594', 'Pendaftaran Tanah', '-', 1),
(1320, '594.1', 'Pengukuran / Pemetaan', '-', 1),
(1321, '594.11', 'Fotogrametri', '-', 1),
(1322, '594.12', 'Terristris', '-', 1),
(1323, '594.13', 'Triangulasi', '-', 1),
(1324, '594.14', 'Peralatan', '-', 1),
(1325, '594.2', 'Dana Pengukuran (Permen Agraria No. 61/1965)', '-', 1),
(1326, '594.3', 'Sertifikat', '-', 1),
(1327, '594.4', 'Pejabat Pembuat Akta Tanah (PPAT)', '-', 1),
(1328, '595', 'Lahan Transmigrasi', '-', 1),
(1329, '595.1', 'Tataguna Tanah', '-', 1),
(1330, '595.2', 'Landreform', '-', 1),
(1331, '595.3', 'Pengurusan Hak-Hak Tanah', '-', 1),
(1332, '595.4', 'Pendaftaran Tanah', '-', 1),
(1333, '596', '-', '-', 1),
(1334, '597', '-', '-', 1),
(1335, '598', '-', '-', 1),
(1336, '599', '-', '-', 1),
(1337, '600', 'PEKERJAAN UMUM DAN KETENAGAKERJAAN', '-', 1),
(1338, '601', 'Tata Bangunan Konstruksi Dan Industri Konstruksi', '-', 1),
(1339, '602', 'Kontraktor Pemborong', '-', 1),
(1340, '602.1', 'Tender', '-', 1),
(1341, '602.2', 'Pennunjukan', '-', 1),
(1342, '602.3', 'Prakualifikasi', '-', 1),
(1343, '602.31', 'Daftar Rekanan Mampu (DRM)', '-', 1),
(1344, '602.32', 'Tanda Daftar Rekanan', '-', 1),
(1345, '603', 'Arsitektur', '-', 1),
(1346, '604', 'Bahan Bangunan', '-', 1),
(1347, '604.1', 'Tanah Dan Batu Seperti: Batu Belah, Steen Slaag, Split dsb', '-', 1),
(1348, '604.2', 'Aspal, Aspal Buatan, Aspal Alam (butas)', '-', 1),
(1349, '604.3', 'Besi Dan Logam Lainnya', '-', 1),
(1350, '604.31', 'Besi Beton', '-', 1),
(1351, '604.32', 'Besi Profil', '-', 1),
(1352, '604.33', 'Paku', '-', 1),
(1353, '604.34', 'Alumunium, Profil', '-', 1),
(1354, '604.4', 'Bahan-Bahan Pelindung Dan Pengawet ', '(Cat, Tech Til, Pengawet Kayu)', 1),
(1355, '604.5', 'Semen', '-', 1),
(1356, '604.6', 'Kayu', '-', 1),
(1357, '604.7', 'Bahan Penutup Atap ', '(Genting, Asbes Gelombang, Seng Dan Sebagainya)', 1),
(1358, '604.8', 'Alat-Alat Penggantung Dan Pengunci', '-', 1),
(1359, '604.9', 'Bahan-Bahan Bangunan Lainnya', '-', 1),
(1360, '605', 'Instalasi', '-', 1),
(1361, '605.1', 'Instalasi Bangunan', '-', 1),
(1362, '605.2', 'Instalasi Listrik', '-', 1),
(1363, '605.3', 'Instalasi Air Sanitasi', '-', 1),
(1364, '605.4', 'Instalasi Pengatur Udara', '-', 1),
(1365, '605.5', 'Instalasi Akustik', '-', 1),
(1366, '605.6', 'Instalasi Cahaya / Penerangan', '-', 1),
(1367, '606', 'Konstruksi Pencegahan', '-', 1),
(1368, '606.1', 'Konstruksi Pencegahan Terhadap Kebakaran', '-', 1),
(1369, '606.2', 'Konstruksi Pencegahan Terhadap Gempa', '-', 1),
(1370, '606.3', 'Konstruksi Penegahan Terhadap Angin Udara/Panas', '-', 1),
(1371, '606.4', 'Konstruksi Pencegahan Terhadap Kegaduhan', '-', 1),
(1372, '606.5', 'Konstruksi Pencegahan Terhadap Gas/Explosive', '-', 1),
(1373, '606.6', 'Konstruksi Pencegahan Terhadap Serangga', '-', 1),
(1374, '606.7', 'Konstruksi Pencegahan Terhadap Radiasi Atom', '-', 1),
(1375, '607', '-', '-', 1),
(1376, '608', '-', '-', 1),
(1377, '609', '-', '-', 1),
(1378, '610', 'PENGAIRAN', '-', 1),
(1379, '611', 'Irigasi', '-', 1),
(1380, '611.1', 'Bangunan Waduk', '-', 1),
(1381, '611.11', 'Bendungan', '-', 1),
(1382, '611.12', 'Tanggul', '-', 1),
(1383, '611.13', 'Pelimpahan Banjir', '-', 1),
(1384, '611.14', 'Menara Pengambilan', '-', 1),
(1385, '611.2', 'Bangunan Pengambilan', '-', 1),
(1386, '611.21', 'Bendungan', '-', 1),
(1387, '611.22', 'Bendungan Dengan Pintu Bilas', '-', 1),
(1388, '611.23', 'Bendungan Dengan Pompa', '-', 1),
(1389, '611.24', 'Pengambilan Bebas', '-', 1),
(1390, '611.25', 'Pengambilan Bebas Dengan Pompa', '-', 1),
(1391, '611.26', 'Sumur Dengan Pompa', '-', 1),
(1392, '611.27', 'Kantung Lumpur', '-', 1),
(1393, '611.28', 'Slit Ekstrator', '-', 1),
(1394, '611.29', 'Escope Channel', '-', 1),
(1395, '611.3', 'Bangunan Pembawa', '-', 1),
(1396, '611.31', 'Saluran', '-', 1),
(1397, '611.311', 'Saluran Induk', '-', 1),
(1398, '611.312', 'Saluran Sekunder', '-', 1),
(1399, '611.313', 'Suplesi', '-', 1),
(1400, '611.314', 'Tersier', '-', 1),
(1401, '611.315', 'Saluran Kwarter', '-', 1),
(1402, '611.316', 'Saluran Pasangan', '-', 1),
(1403, '611.317', 'Saluran Tertutup / Terowongan', '-', 1),
(1404, '611.32', 'Bangunan', '-', 1),
(1405, '611.321', 'Bangunan Bagi', '-', 1),
(1406, '611.322', 'Bangunan Bagi Dan Sadap', '-', 1),
(1407, '611.323', 'Bangunan Sadap', '-', 1),
(1408, '611.324', 'Bangunan Check', '-', 1),
(1409, '611.325', 'Bangunan Terjun', '-', 1),
(1410, '611.33', 'Box Tersier', '-', 1),
(1411, '611.34', 'Got Miring', '-', 1),
(1412, '611.35', 'Talang', '-', 1),
(1413, '611.36', 'Syphon', '-', 1),
(1414, '611.37', 'Gorong-Gorong', '-', 1),
(1415, '611.38', 'Pelimpah Samping', '-', 1),
(1416, '611.4', 'Bangunan Pembuang', '-', 1),
(1417, '611.41', 'Saluran', '-', 1),
(1418, '611.411', 'Saluran Pembuang Induk', '-', 1),
(1419, '611.412', 'Saluran Pembuang Sekunder', '-', 1),
(1420, '611.413', 'Saluran Tersier', '-', 1),
(1421, '611.42', 'Bangunan', '-', 1),
(1422, '611.421', 'Bangunan Outlet', '-', 1),
(1423, '611.422', 'Bangunan Terjun', '-', 1),
(1424, '611.423', 'Bangunan Penahan Banjir', '-', 1),
(1425, '611.43', 'Gorong-Gorong Pembuang', '-', 1),
(1426, '611.44', 'Talang Pembuang', '-', 1),
(1427, '611.45', 'Syphon Pembuang', '-', 1),
(1428, '611.5', 'Bangunan Lainnya', '-', 1),
(1429, '611.51', 'Jalan', '-', 1),
(1430, '611.511', 'Jalan Inspeksi', '-', 1),
(1431, '611.512', 'Jalan Logistik Waduk Lapangan', '-', 1),
(1432, '611.52', 'Jembatan', '-', 1),
(1433, '611.521', 'Jembatan Inspeksi', '-', 1),
(1434, '611.522', 'Jembatan Hewan', '-', 1),
(1435, '611.53', 'Tangga Cuci', '-', 1),
(1436, '611.54', 'Kubangan Kerbau', '-', 1),
(1437, '611.55', 'Waduk Lapangan', '-', 1),
(1438, '611.56', 'Bangunan Penunjang', '-', 1),
(1439, '611.57', 'Jaringan Telepon', '-', 1),
(1440, '611.58', 'Stasiun Agro', '-', 1),
(1441, '612', 'Folder', '-', 1),
(1442, '612.1', 'Tanggul Keliling', '-', 1),
(1443, '612.11', 'Tanggul', '-', 1),
(1444, '612.12', 'Bangunan Penutup Sungai', '-', 1),
(1445, '612.13', 'Jembatan', '-', 1),
(1446, '612.2', 'Bangunan Pembawa', '-', 1),
(1447, '612.21', 'Saluran', '-', 1),
(1448, '612.211', 'Saluran Muka', '-', 1),
(1449, '612.212', 'Saluran Pembawa Waduk', '-', 1),
(1450, '612.213', 'Saluran Pembawa Sekunder', '-', 1),
(1451, '612.22', 'Stasiun Pompa Pemasukan', '-', 1),
(1452, '612.23', 'Bangunan Bagi', '-', 1),
(1453, '612.24', 'Gorong-Gorong', '-', 1),
(1454, '612.25', 'Syphon', '-', 1),
(1455, '612.3', 'Bangunan Pembuang', '-', 1),
(1456, '612.31', 'Stasiun Pompa Pembuang', '-', 1),
(1457, '612.32', 'Saluran', '-', 1),
(1458, '612.321', 'Saluran Pembuang Induk', '-', 1),
(1459, '612.322', 'Saluran Pembuang Sekunder', '-', 1),
(1460, '612.33', 'Pintu Air Pembuangan', '-', 1),
(1461, '612.34', 'Gorong-Gorong Pembuangan', '-', 1),
(1462, '612.35', 'Syphon Pembuangan', '-', 1),
(1463, '612.4', 'Bangunan Lainnya', '-', 1),
(1464, '612.41', 'Bangunan', '-', 1),
(1465, '612.411', 'Bangunan Pengukur Air', '-', 1),
(1466, '612.412', 'Bangunan Pengukur Curah Hujan', '-', 1),
(1467, '612.413', 'Bangunan Gudang Stasiun Pompa', '-', 1),
(1468, '612.414', 'Bangunan Listrik Stasiun Pompa', '-', 1),
(1469, '612.42', 'Rumah Petugas Aksploitasi', '-', 1),
(1470, '613', 'Pasang Surut', '-', 1),
(1471, '613.1', 'Bangunan Pembawa', '-', 1),
(1472, '613.11', 'Saluran', '-', 1),
(1473, '613.111', 'Saluran Pembawa Induk', '-', 1),
(1474, '613.112', 'Saluran Pembawa Sekunder', '-', 1),
(1475, '613.113', 'Saluran Pembawa Tersier', '-', 1),
(1476, '613.114', 'Saluran penyimpanan air', '-', 1),
(1477, '613.12', 'Bangunan Pintu Pemasukan', '-', 1),
(1478, '613.2', 'Bangunan Pembuang', '-', 1),
(1479, '613.21', 'Saluran', '-', 1),
(1480, '613.211', 'Saluran Pembuang Induk', '-', 1),
(1481, '613.212', 'Saluran Pembuang Sekunder', '-', 1),
(1482, '613.213', 'Saluran Pembuang Tersier', '-', 1),
(1483, '613.214', 'Saluran Pengumpul Air', '-', 1),
(1484, '613.22', 'Bangunan Pintu Pembuang', '-', 1),
(1485, '613.3', 'Bangunan Lainnya', '-', 1),
(1486, '613.31', 'Kolam Pasang', '-', 1),
(1487, '613.32', 'Saluran', '-', 1),
(1488, '613.321', 'Saluran Lalu Lintas', '-', 1),
(1489, '613.322', 'Saluran Muka', '-', 1),
(1490, '613.33', 'Bangunan', '-', 1),
(1491, '613.331', 'Bangunan Penangkis Kotoran', '-', 1),
(1492, '613.332', 'Bangunan Pengukur Muka Air', '-', 1),
(1493, '613.333', 'Bangunan Pengukur Curah Hujan', '-', 1),
(1494, '613.34', 'Jalan', '-', 1),
(1495, '613.35', 'Jembatan', '-', 1),
(1496, '614', 'Pengendalian Sungai', '-', 1),
(1497, '614.1', 'Bangunan Pengaman', '-', 1),
(1498, '614.11', 'Tanggul Banjir', '-', 1),
(1499, '614.12', 'Pintu Pengatur Banjir', '-', 1),
(1500, '614.13', 'Klep Pengatur Banjir', '-', 1),
(1501, '614.14', 'Tembok Pengaman Talud', '-', 1),
(1502, '614.15', 'Krib', '-', 1),
(1503, '614.16', 'Kantung Lumpur', '-', 1),
(1504, '614.17', 'Check-Dam', '-', 1),
(1505, '614.18', 'Syphon', '-', 1),
(1506, '614.2', 'Saluran Pengaman', '-', 1),
(1507, '614.21', 'Saluran Banjir', '-', 1),
(1508, '614.22', 'Saluran Drainage', '-', 1),
(1509, '614.23', 'Corepure', '-', 1),
(1510, '614.3', 'Bangunan Lainnya', '-', 1),
(1511, '614.31', 'Warning System', '-', 1),
(1512, '614.32', 'Stasiun', '-', 1),
(1513, '614.321', 'Stasiun Pengukur Curah Hujan', '-', 1),
(1514, '614.322', 'Stasiun Pengukur Air', '-', 1),
(1515, '614.323', 'Stasiun Pengukur Cuaca', '-', 1),
(1516, '614.324', 'Stasiun Pos Penjagaan', '-', 1),
(1517, '615', 'Pengamanan Pantai', '-', 1),
(1518, '615.1', 'Tanggul', '-', 1),
(1519, '615.2', 'Krib', '-', 1),
(1520, '615.3', 'Bangunan Lainnya', '-', 1),
(1521, '616', 'Air Tanah', '-', 1),
(1522, '616.1', 'Stasiun Pompa', '-', 1),
(1523, '616.2', 'Bangunan Pembawa', '-', 1),
(1524, '616.3', 'Bangunan Pembuang', '-', 1),
(1525, '616.4', 'Bangunan Lainnya', '-', 1),
(1526, '617', '-', '-', 1),
(1527, '618', '-', '-', 1),
(1528, '619', '-', '-', 1),
(1529, '620', 'JALAN', '-', 1),
(1530, '621', 'Jalan Kota', '-', 1),
(1531, '621.1', 'Daerah Penguasaan', '-', 1),
(1532, '621.11', 'Tanah', '-', 1),
(1533, '621.12', 'Tanaman', '-', 1),
(1534, '621.13', 'Bangunan', '-', 1),
(1535, '621.2', 'Bangunan Sementara', '-', 1),
(1536, '621.21', 'Jalan Sementara', '-', 1),
(1537, '621.22', 'Jembatan Sementara', '-', 1),
(1538, '621.23', 'Kantor Proyek', '-', 1),
(1539, '621.24', 'Gedung Proyek', '-', 1),
(1540, '621.25', 'Barak Kerja', '-', 1),
(1541, '621.26', 'Laboratorium Lapangan', '-', 1),
(1542, '621.27', 'Rumah', '-', 1),
(1543, '621.3', 'Badan Jalan', '-', 1),
(1544, '621.31', 'Pekerjaan Tanah (Earth Work)', '-', 1),
(1545, '621.32', 'Stabilisasi', '-', 1),
(1546, '621.4', 'Perkerasan', '-', 1),
(1547, '621.41', 'Lapis Pondasi Bawah', '-', 1),
(1548, '621.42', 'Lapis Pondasi', '-', 1),
(1549, '621.43', 'Lapis Permukaan', '-', 1),
(1550, '621.5', 'Drainage', '-', 1),
(1551, '621.51', 'Parit Tanah', '-', 1),
(1552, '621.52', 'Gorong-Gorong (Culvert)', '-', 1),
(1553, '621.6', 'Buku Trotuir', '-', 1),
(1554, '621.61', 'Tanah', '-', 1),
(1555, '621.62', 'Perkerasan', '-', 1),
(1556, '621.63', 'Pasangan', '-', 1),
(1557, '621.7', 'Median', '-', 1),
(1558, '621.71', 'Tanah', '-', 1),
(1559, '621.72', 'Tanaman', '-', 1),
(1560, '621.73', 'Perkerasan', '-', 1),
(1561, '621.74', 'Pasangan', '-', 1),
(1562, '621.8', 'Daerah Samping', '-', 1),
(1563, '621.81', 'Tanaman', '-', 1),
(1564, '621.82', 'Pagar', '-', 1),
(1565, '621.9', 'Bangunan Pelengkap Dan Pengamanan', '-', 1),
(1566, '621.91', 'Rambu-Rambu/Tanda-Tanda Lalu Lintas', '-', 1),
(1567, '621.92', 'Lampu Penerangan', '-', 1),
(1568, '621.93', 'Lampu Pengatur Lalu Lintas', '-', 1),
(1569, '621.94', 'Patok-Patok KM', '-', 1),
(1570, '621.95', 'Patok-Patok ROW (Sempadan)', '-', 1),
(1571, '621.96', 'Rel Pengamanan', '-', 1),
(1572, '621.97', 'Pagar', '-', 1),
(1573, '621.98', 'Turap Penahan', '-', 1),
(1574, '621.99', 'Bronjong', '-', 1),
(1575, '622', 'Jalan Luar Kota', '-', 1),
(1576, '622.1', 'Daerah Penguasaan', '-', 1),
(1577, '622.11', 'Tanah', '-', 1),
(1578, '622.12', 'Tanaman', '-', 1),
(1579, '622.13', 'Bangunan', '-', 1),
(1580, '622.2', 'Bangunan Sementara', '-', 1),
(1581, '622.21', 'Jalan Sementara', '-', 1),
(1582, '622.22', 'Jembatan Sementara', '-', 1),
(1583, '622.23', 'Kantor Proyek', '-', 1),
(1584, '622.24', 'Gudang Proyek', '-', 1),
(1585, '622.25', 'Barak Kerja', '-', 1),
(1586, '622.26', 'Laboratorium Lapangan', '-', 1),
(1587, '622.27', 'Rumah', '-', 1),
(1588, '622.3', 'Badan Jalan', '-', 1),
(1589, '622.31', 'Pekerjaan Tanah (Earth Work)', '-', 1),
(1590, '622.32', 'Stabilisasi', '-', 1),
(1591, '622.4', 'Perkerasan', '-', 1),
(1592, '622.41', 'Lapis Pondasi Bawah', '-', 1),
(1593, '622.42', 'Lapis Pondasi', '-', 1),
(1594, '622.43', 'Lapis Permukaan', '-', 1),
(1595, '622.5', 'Drainage', '-', 1),
(1596, '622.51', 'Parit', '-', 1),
(1597, '622.52', 'Gorong-Gorong (Culvert)', '-', 1),
(1598, '622.53', 'Sub Drainage', '-', 1),
(1599, '622.6', 'Trotoar', '-', 1),
(1600, '622.61', 'Tanah', '-', 1),
(1601, '622.62', 'Perkerasan', '-', 1),
(1602, '622.7', 'Median', '-', 1),
(1603, '622.71', 'Tanah', '-', 1),
(1604, '622.72', 'Tanaman', '-', 1),
(1605, '622.73', 'Perkerasan', '-', 1),
(1606, '622.74', 'Pasangan', '-', 1),
(1607, '622.8', 'Daerah Samping', '-', 1),
(1608, '622.81', 'Tanaman', '-', 1),
(1609, '622.82', 'Pagar', '-', 1),
(1610, '622.9', 'Bangunan Pelengkap Dan Pengamanan', '-', 1),
(1611, '622.91', 'Rambu-Rambu/Tanda-Tanda Lalu Lintas', '-', 1),
(1612, '622.92', 'Lampu Penerangan', '-', 1),
(1613, '622.93', 'Lampu Pengatur Lalu Lintas', '-', 1),
(1614, '622.94', 'Patok-Patok KM', '-', 1),
(1615, '622.95', 'Patok-Patok ROW (Sempadan)', '-', 1),
(1616, '622.96', 'Rel Pengamanan', '-', 1),
(1617, '622.97', 'Pagar', '-', 1),
(1618, '622.98', 'Turap Penahan', '-', 1),
(1619, '622.99', 'Bronjong', '-', 1),
(1620, '623', '-', '-', 1),
(1621, '623', '-', '-', 1),
(1622, '623', '-', '-', 1),
(1623, '630', 'JEMBATAN', '-', 1),
(1624, '631', 'Jembatan Pada Jalan Kota', '-', 1),
(1625, '631.1', 'Daerah Penguasaan', '-', 1),
(1626, '631.11', 'Tanah', '-', 1),
(1627, '631.12', 'Tanaman', '-', 1),
(1628, '631.13', 'Bangunan', '-', 1),
(1629, '631.2', 'Bangunan Sementara', '-', 1),
(1630, '631.21', 'Jalan Sementara', '-', 1),
(1631, '631.22', 'Jembatan Sementara', '-', 1),
(1632, '631.23', 'Kantor Proyek', '-', 1),
(1633, '631.24', 'Gudang Proyek', '-', 1),
(1634, '631.25', 'Barak Kerja', '-', 1),
(1635, '631.26', 'Laboratorium Lapangan', '-', 1),
(1636, '631.27', 'Rumah', '-', 1),
(1637, '631.3', 'Pekerjaan Tanah (Earth Work)', '-', 1),
(1638, '631.31', 'Galian Tanah', '-', 1),
(1639, '631.32', 'Timbunan Tanah', '-', 1),
(1640, '631.4', 'Pondasi', '-', 1),
(1641, '631.41', 'Pondasi Kepala Jalan', '-', 1),
(1642, '631.42', 'Pondasi Pilar', '-', 1),
(1643, '631.43', 'Angker', '-', 1),
(1644, '631.5', 'Bangunan Bawah', '-', 1),
(1645, '631.51', 'Kepala Jembatan', '-', 1),
(1646, '631.52', 'Pilar', '-', 1),
(1647, '631.53', 'Piloon', '-', 1),
(1648, '631.54', 'Landasan', '-', 1),
(1649, '631.6', 'Bangunan', '-', 1),
(1650, '631.61', 'Gelagar', '-', 1),
(1651, '631.62', 'Lantai', '-', 1),
(1652, '631.63', 'Perkerasan', '-', 1),
(1653, '631.64', 'Jalan Orang / Trotoar', '-', 1),
(1654, '631.65', 'Sandaran', '-', 1),
(1655, '631.66', 'Talang air', '-', 1),
(1656, '631.7', 'Bangunan / Pengaman', '-', 1),
(1657, '631.71', 'Turap Penahan', '-', 1),
(1658, '631.72', 'Bronjong', '-', 1),
(1659, '631.73', '', '-', 1),
(1660, '631.74', 'Kist Dam', '-', 1),
(1661, '631.75', 'Corepure', '-', 1),
(1662, '631.76', 'Krib', '-', 1),
(1663, '631.8', 'Bangunan Pelengkap', '-', 1),
(1664, '631.81', 'Rambu-Rambu/Tanda-Tanda Lalu Lintas', '-', 1),
(1665, '631.82', 'Lampu Penerangan', '-', 1),
(1666, '631.83', 'Lampu Pengatur Lalu Lintas', '-', 1),
(1667, '631.84', 'Patok Pengaman', '-', 1),
(1668, '631.85', 'Patok ROW (Sempadan)', '-', 1),
(1669, '631.86', 'Pagar', '-', 1),
(1670, '631.9', 'Oprit', '-', 1),
(1671, '631.91', 'Badan', '-', 1),
(1672, '631.92', 'Perkerasan', '-', 1),
(1673, '631.93', 'Drainage', '-', 1),
(1674, '631.94', 'Baku', '-', 1),
(1675, '631.95', 'Median', '-', 1),
(1676, '632', 'Jembatan Pada Jalan Luar Kota', '-', 1),
(1677, '632.1', 'Daerah Penguasaan', '-', 1),
(1678, '632.11', 'Tanah', '-', 1),
(1679, '632.12', 'Tanaman', '-', 1),
(1680, '632.13', 'Bangunan', '-', 1),
(1681, '632.2', 'Bangunan Sementara', '-', 1),
(1682, '632.21', 'Jalan Sementara', '-', 1),
(1683, '632.22', 'Jembatan Sementara', '-', 1),
(1684, '632.23', 'Kantor Proyek', '-', 1),
(1685, '632.24', 'Gudang Proyek', '-', 1),
(1686, '632.25', 'Barak Kerja', '-', 1),
(1687, '632.26', 'Laboratorium Lapangan', '-', 1),
(1688, '632.27', 'Rumah', '-', 1),
(1689, '632.3', 'Pekerjaan Tanah (Earth Work)', '-', 1),
(1690, '632.31', 'Galian Tanah', '-', 1),
(1691, '632.32', 'Timnunan Tanah', '-', 1),
(1692, '632.4', 'Pondasi', '-', 1),
(1693, '632.41', 'Pondasi Kepala Jembatan', '-', 1),
(1694, '632.42', 'Pondasi Pilar', '-', 1),
(1695, '632.43', 'Pondasi Angker', '-', 1),
(1696, '632.5', 'Bangunan Bawah', '-', 1),
(1697, '632.51', 'Kepala Jembatan', '-', 1),
(1698, '632.52', 'Pilar', '-', 1),
(1699, '632.53', 'Piloon', '-', 1),
(1700, '632.54', 'Landasan', '-', 1),
(1701, '632.6', 'Bangunan Atas', '-', 1),
(1702, '632.61', 'Gelagar', '-', 1),
(1703, '632.62', 'Lantai', '-', 1),
(1704, '632.63', 'Perkerasan', '-', 1),
(1705, '632.64', 'Jalan Orang / Trotoar', '-', 1),
(1706, '632.65', 'Sandaran', '-', 1),
(1707, '632.66', 'Talang Air', '-', 1),
(1708, '632.7', 'Bangunan Pengaman', '-', 1),
(1709, '632.71', 'Turap / Penahan', '-', 1),
(1710, '632.72', 'Bronjong', '-', 1),
(1711, '632.73', 'Stek Dam', '-', 1),
(1712, '632.74', 'Kist Dam', '-', 1),
(1713, '632.75', 'Corepure', '-', 1),
(1714, '632.76', 'Krib', '-', 1),
(1715, '632.8', 'Bangunan Pelengkap', '-', 1),
(1716, '632.81', 'Rambu-Rambu/Tanda-Tanda Lalu Lintas', '-', 1),
(1717, '632.82', 'Lampu Penerangan', '-', 1),
(1718, '632.83', 'Lampu Pengatur Lalu Lintas', '-', 1),
(1719, '632.84', 'Patok Pengaman', '-', 1),
(1720, '632.85', 'Patok ROW (Sempadan)', '-', 1),
(1721, '632.86', 'Pagar', '-', 1),
(1722, '632.9', 'Oprit', '-', 1),
(1723, '632.91', 'Badan', '-', 1),
(1724, '632.92', 'Perkerasan', '-', 1),
(1725, '632.93', 'Drainage', '-', 1),
(1726, '632.94', 'Baku', '-', 1),
(1727, '632.95', 'Median', '-', 1),
(1728, '633', '-', '-', 1),
(1729, '634', '-', '-', 1),
(1730, '635', '-', '-', 1),
(1731, '640', 'BANGUNAN', '-', 1),
(1732, '640.1', 'Gedung Pengadilan', '-', 1),
(1733, '640.2', 'Rumah Pejabat Negara', '-', 1),
(1734, '640.3', 'Gedung DPR', '-', 1),
(1735, '640.4', 'Gedung Balai Kota', '-', 1),
(1736, '640.5', 'Penjara', '-', 1),
(1737, '640.6', 'Perkantoran', '-', 1),
(1738, '642', 'Bangunan Pendidikan', '-', 1),
(1739, '642.1', 'Taman Kanak-Kanak', '-', 1),
(1740, '642.2', 'SD & SEKOLAH MENENGAH', '-', 1),
(1741, '642.3', 'Perguruan Tinggi', '-', 1),
(1742, '643', 'Bangunan Rekreasi', '-', 1),
(1743, '643.1', 'BANGUNAN OLAH RAGA', '-', 1),
(1744, '643.2', 'Gedung Kesenian', '-', 1),
(1745, '643.3', 'Gedung Pemancar', '-', 1),
(1746, '644', 'Bangunan Perdagangan', '-', 1),
(1747, '644.1', 'Pusat Perbelanjaan', '-', 1),
(1748, '644.2', 'Gedung Perdagangan', '-', 1),
(1749, '644.3', 'Bank', '-', 1),
(1750, '644.4', 'Pekantoran', '-', 1),
(1751, '645', 'Bangunan Pelayanan Umum', '-', 1),
(1752, '645.1', 'MCK', '-', 1),
(1753, '645.2', 'Gedung Parkir', '-', 1),
(1754, '645.3', 'Rumah Sakit', '-', 1),
(1755, '645.4', 'Gedung Telkom', '-', 1),
(1756, '645.5', 'Terminal Angkutan udara', '-', 1),
(1757, '645.6', 'Terminal Angkutan udara', '-', 1),
(1758, '645.7', 'Terminal Angkutan Darat', '-', 1),
(1759, '645.8', 'Bangunan Keagamaan', '-', 1),
(1760, '646', 'Bangunan Peninggalan Sejarah', '-', 1),
(1761, '646.1', 'Monumen', '-', 1),
(1762, '646.2', 'Candi', '-', 1),
(1763, '646.3', 'Keraton', '-', 1),
(1764, '646.4', 'Rumah Tradisional', '-', 1),
(1765, '647', 'Bangunan Industri', '-', 1),
(1766, '648', 'Bangunan Tempat Tinggal', '-', 1),
(1767, '648.1', 'Rumah Perkotaan', '-', 1),
(1768, '648.11', 'Inti / Sederhana', '-', 1),
(1769, '648.12', 'Sedang / Mewah', '-', 1),
(1770, '648.2', 'Rumah Pedesaan', '-', 1),
(1771, '648.21', 'Rumah Contoh', '-', 1),
(1772, '648.3', 'Real Estate', '-', 1),
(1773, '648.4', 'Bapetarum', '-', 1),
(1774, '649', 'Elemen Bangunan', '-', 1),
(1775, '649.1', 'Pondasi', '-', 1),
(1776, '649.11', 'Di Atas Tiang', '-', 1),
(1777, '649.2', 'Dinding', '-', 1),
(1778, '649.21', 'Penahan Beban', '-', 1),
(1779, '649.22', 'Tidak Menahan Beban', '-', 1),
(1780, '649.3', 'Atap', '-', 1),
(1781, '649.4', 'Lantai / Langit-Langit', '-', 1),
(1782, '649.41', 'Supended', '-', 1),
(1783, '649.42', 'Solit', '-', 1),
(1784, '649.5', 'Pintu / Jendela', '-', 1),
(1785, '649.51', 'Pintu Harmonik', '-', 1),
(1786, '649.52', 'Pintu Biasa', '-', 1),
(1787, '649.53', 'Pintu Sorong', '-', 1),
(1788, '649.54', 'Pintu Kayu', '-', 1),
(1789, '649.55', 'Jendela Sorong', '-', 1),
(1790, '649.56', 'Jendela Vertikal', '-', 1),
(1791, '650', 'TATA KOTA', '-', 1),
(1792, '651', 'Daerah Perdagangan / Pelabuhan', '-', 1),
(1793, '651.1', 'Daerah Pusat Perbelanjaan', '-', 1),
(1794, '651.2', 'Daerah Perkotaan', '-', 1),
(1795, '652', 'Daerah Pemerintah', '-', 1),
(1796, '653', 'Daerah Perumahan', '-', 1),
(1797, '653.1', 'Kepadatan Rendah', '-', 1),
(1798, '653.2', 'Kepadatan Tinggi', '-', 1),
(1799, '654', 'Daerah Industri', '-', 1),
(1800, '654.1', 'Industri Berat', '-', 1),
(1801, '654.2', 'Industri Ringan', '-', 1),
(1802, '654.3', 'Industri Ringan (Home Industry)', '-', 1),
(1803, '655', 'Daerah Rekreasi', '-', 1),
(1804, '655.1', 'Public Garden', '-', 1),
(1805, '655.2', 'Sport & Playing Fields', '-', 1),
(1806, '655.3', 'Open Space', '-', 1),
(1807, '656', 'Transportasi (Tata Letak)', '-', 1),
(1808, '656.1', 'Jaringan Jalan', '-', 1),
(1809, '656.11', 'Penerangan Jalan', '-', 1),
(1810, '656.2', 'Jaringan Kereta Api', '-', 1),
(1811, '656.3', 'Jaringan Sungai', '-', 1),
(1812, '657', 'Assaineering', '-', 1),
(1813, '657.1', 'Saluran Pengumpulan', '-', 1),
(1814, '657.2', 'Instalasi Pengolahan', '-', 1),
(1815, '657.21', 'Bangunan', '-', 1),
(1816, '657.211', 'Bangunan Penyaringan', '-', 1),
(1817, '657.212', 'Bangunan Penghancur Kotoran / Sampah', '-', 1),
(1818, '657.213', 'Bangunan Pengendap', '-', 1),
(1819, '657.214', 'Bangunan Pengering Lumpur', '-', 1),
(1820, '657.22', 'Unit Densifektan', '-', 1),
(1821, '657.23', 'Unit Perpompaan', '-', 1),
(1822, '658', 'Kesehatan Lingkungan', '-', 1),
(1823, '658.1', 'Persampahan', '-', 1),
(1824, '658.11', 'Bangunan Pengumpul', '-', 1),
(1825, '658.12', 'Bangunan Pemusnahan', '-', 1),
(1826, '658.2', 'Pengotoran Udara', '-', 1),
(1827, '658.3', 'pengotoran Air', '-', 1),
(1828, '658.31', 'Air Buangan Industri Limbah', '-', 1),
(1829, '658.4', 'Kegaduhan', '-', 1),
(1830, '658.5', 'Kebersihan Kota', '-', 1),
(1831, '659', '-', '-', 1),
(1832, '660', 'TATA LINGKUNGAN', '-', 1),
(1833, '660.1', 'Persampahan', '-', 1),
(1834, '660.2', 'Kebersihan Lingkungan', '-', 1),
(1835, '660.3', 'Pencemaran', '-', 1),
(1836, '660.31', 'Pecemaran Air', '-', 1),
(1837, '660.32', 'Pencemaran Udara', '-', 1),
(1838, '661', 'Daerah Hutan', '-', 1),
(1839, '662', 'Daerah Pertanian', '-', 1),
(1840, '663', 'Daerah Pemikiman', '-', 1),
(1841, '664', 'Pusat Pertumbuhan', '-', 1),
(1842, '665', 'Transportasi', '-', 1),
(1843, '665.1', 'Jaringan Jalan', '-', 1),
(1844, '665.2', 'Jaringan Kereta Api', '-', 1),
(1845, '665.3', 'Jaringan Sungai', '-', 1),
(1846, '666', '-', '-', 1),
(1847, '667', '-', '-', 1),
(1848, '668', '-', '-', 1),
(1849, '670', 'KETENAGAAN', '-', 1),
(1850, '671', 'Listrik', '-', 1),
(1851, '671.1', 'Kelistrikan', '-', 1),
(1852, '671.11', 'Kelisrikan PLN', '-', 1),
(1853, '671.12', 'Kelistrikan Non PLN', '-', 1),
(1854, '671.2', 'Pembangkit Tenaga Listrik', '-', 1),
(1855, '671.21', 'PLTA  ( Pembangkit  Listrik Tenaga Air )', '-', 1),
(1856, '671.22', 'PLTD  ( Pembangkit Listrik Tenaga Diesel )', '-', 1),
(1857, '671.23', 'PLTG P ( Pembangkit Listrik Tenaga Gas )', '-', 1),
(1858, '671.24', 'PLTM ( Pembangkit  Listrik Tenaga Matahari )', '-', 1),
(1859, '671.25', 'PLTN ( Pembangkit Listrik Tenaga Nuklir )', '-', 1),
(1860, '671.26', 'PLTPB ( Pembangkit Listrik Tenaga Uap )', '-', 1),
(1861, '671.3', 'Transmisi Tenaga Listrik', '-', 1),
(1862, '671.31', 'Gardu Induk/Gardu Penghubung/Gardu Trafo', '-', 1),
(1863, '671.32', 'Saluran Udara Tegangan Tinggi', '-', 1),
(1864, '671.33', 'Kabel Bawah Tanah', '-', 1),
(1865, '671.4', 'Distribusi Tenaga Listrik', '-', 1),
(1866, '671.41', 'Gardu Distribusi', '-', 1),
(1867, '671.42', 'Tegangan Rendah', '-', 1),
(1868, '671.43', 'Tegangan Menengah', '-', 1),
(1869, '671.44', 'Jaringan Bawah Tanah', '-', 1),
(1870, '671.5', 'Pengusahaan Listrik', '-', 1),
(1871, '671.51', 'Sambungan Listrik', '-', 1),
(1872, '671.52', 'Penjualan Tenaga Listrik', '-', 1),
(1873, '671.53', 'Tarif Listrik', '-', 1),
(1874, '672', 'Tenaga Air', '-', 1),
(1875, '673', 'Tenaga Minyak', '-', 1),
(1876, '674', 'Tenaga Gas', '-', 1),
(1877, '675', 'Tenaga Matahari', '-', 1),
(1878, '676', 'Tenaga Nuklir', '-', 1),
(1879, '677', 'Tenaga Panas Bumi', '-', 1),
(1880, '678', 'Tenaga Uap', '-', 1),
(1881, '679', 'Tenaga Lainya', '-', 1),
(1882, '680', 'PERALATAN', '-', 1),
(1883, '681', '-', '-', 1),
(1884, '682', '-', '-', 1),
(1885, '683', '-', '-', 1),
(1886, '690', 'AIR MINUM', '-', 1),
(1887, '691', 'Intake', '-', 1),
(1888, '691.1', 'Broncaptering', '-', 1),
(1889, '691.2', 'Sumur', '-', 1),
(1890, '691.3', 'Bendungan', '-', 1),
(1891, '691.4', 'Saringan (screen)', '-', 1),
(1892, '691.5', 'Pintu air', '-', 1),
(1893, '691.6', 'Saluran Pembawa', '-', 1),
(1894, '691.7', 'Alat Ukur', '-', 1),
(1895, '691.8', 'Perpompaan', '-', 1),
(1896, '692', 'Transmisi Air Baku', '-', 1),
(1897, '692.1', 'Perpipaan', '-', 1),
(1898, '692.2', 'Katup Udara (Air Relief)', '-', 1),
(1899, '692.3', 'Katup Penguras (Blow Off)', '-', 1),
(1900, '692.4', 'Bak Pelepas Tekanan', '-', 1),
(1901, '692.5', 'Jembatan Pipa', '-', 1),
(1902, '692.6', 'Syphon', '-', 1),
(1903, '693', 'Instalasi Pengelolaan', '-', 1),
(1904, '693.1', 'Bangunan Ukur', '-', 1),
(1905, '693.2', 'Bangunan Aerasi', '-', 1),
(1906, '693.3', 'Bangunan Pengendapan', '-', 1),
(1907, '693.4', 'Bangunan Pembubuh Bahan Kimia', '-', 1),
(1908, '693.5', 'Bangunan Pengaduk', '-', 1),
(1909, '693.6', 'Bangunan Saringan', '-', 1),
(1910, '693.7', 'Perpompaan', '-', 1),
(1911, '693.8', 'Clear Hell', '-', 1),
(1912, '694', 'Distribusi', '-', 1),
(1913, '694.1', 'Reservoir Menara Bawah Tanah', '-', 1),
(1914, '694.11', 'Menara', '-', 1),
(1915, '694.12', 'reservoir di Bawah Tanah', '-', 1),
(1916, '694.2', 'Perpipaan', '-', 1),
(1917, '694.3', 'Perpompaan', '-', 1),
(1918, '694.4', 'Jembatan Pipa', '-', 1),
(1919, '694.5', 'Syphon', '-', 1),
(1920, '694.6', 'Hydran', '-', 1),
(1921, '694.61', 'Hydran Umum', '-', 1),
(1922, '694.62', 'Hydran Kebakaran', '-', 1),
(1923, '694.7', 'Katup', '-', 1),
(1924, '694.71', 'Katup Udara (Air Relief)', '-', 1),
(1925, '694.72', 'Katup Pelepas (Blow Off)', '-', 1),
(1926, '694.8', 'Bak Pelepas Tekanan', '-', 1),
(1927, '695', '-', '-', 1),
(1928, '696', '-', '-', 1),
(1929, '697', '-', '-', 1),
(1930, '698', '-', '-', 1),
(1931, '699', '-', '-', 1),
(1932, '700', 'PENGAWASAN', '-', 1),
(1933, '701', 'Bidang Urusan Dalam', '-', 1),
(1934, '702', 'Bidang Peralatan', '-', 1),
(1935, '703', 'Bidang Kekayaan Daerah', '-', 1),
(1936, '704', 'Bidang Perpustakaan / Dokumentasi / Kearsipan Sandi', '-', 1),
(1937, '705', 'Bidang Perencanaan', '-', 1),
(1938, '706', 'Bidang Organisasi / Ketatalaksanaan', '-', 1),
(1939, '707', 'Bidang Penelitian', '-', 1),
(1940, '708', 'Bidang Konferensi', '-', 1),
(1941, '709', 'Bidang Perjalanan Dinas', '-', 1),
(1942, '710', 'BIDANG PEMERINTAHAN', '-', 1),
(1943, '711', 'Bidang Pemerintahan Pusat', '-', 1),
(1944, '712', 'Bidang Pemerintahan Provinsi', '-', 1),
(1945, '713', 'Bidang Pemerintahan Kabupaten / Kota', '-', 1),
(1946, '714', 'Bidang Pemerintahan Desa', '-', 1),
(1947, '715', 'Bidang MPR / DPR', '-', 1),
(1948, '716', 'Bidang DPRD Provinsi', '-', 1),
(1949, '717', 'Bidang DPRD Kabupaten / Kota', '-', 1),
(1950, '718', 'Bidang Hukum', '-', 1),
(1951, '719', 'Bidang Hubungan Luar Negeri', '-', 1),
(1952, '720', 'BIDANG POLITIK', '-', 1),
(1953, '721', 'Bidang Kepartaian', '-', 1),
(1954, '722', 'Bidang Organisasi Kemasyarakatan', '-', 1),
(1955, '723', 'Bidang Organisasi Profesi Dan Fungsional', '-', 1),
(1956, '724', 'Bidang Organisasi Pemuda', '-', 1),
(1957, '725', 'Bidang Organisasi Buruh, Tani, Dan Nelayan', '-', 1),
(1958, '726', 'Bidang Organisasi Wanita', '-', 1),
(1959, '727', 'Bidang Pemilihan Umum', '-', 1),
(1960, '730', 'BIDANG KEAMANAN/KETERTIBAN', '-', 1),
(1961, '731', 'Bidang Pertahanan', '-', 1),
(1962, '732', 'Bidang Kemiliteran', '-', 1),
(1963, '733', 'Bidang Perlindungan Masyarakat', '-', 1),
(1964, '734', 'Bidang Kemanan', '-', 1),
(1965, '735', 'bidang Kejahatan', '-', 1),
(1966, '736', 'Bidang Bencana', '-', 1),
(1967, '737', 'Bidang Kecelakaan', '-', 1),
(1968, '738', '-', '-', 1),
(1969, '739', '-', '-', 1),
(1970, '740', 'BIDANG KESEJAHTERAAN RAKYAT', '-', 1),
(1971, '741', 'Bidang Pembagunan Desa', '-', 1),
(1972, '742', 'Bidang Pendidikan', '-', 1),
(1973, '743', 'Bidang Kebudayaan', '-', 1),
(1974, '744', 'Bidang Kesehatan', '-', 1),
(1975, '745', 'Bidang Agama', '-', 1),
(1976, '746', 'Bidang Sosial', '-', 1),
(1977, '747', 'Bidang Kependudukan', '-', 1),
(1978, '748', 'Bidang Media Massa', '-', 1),
(1979, '749', '-', '-', 1),
(1980, '750', 'BIDANG PEREKONOMIAN', '-', 1),
(1981, '751', 'Bidang Perdagangan', '-', 1),
(1982, '752', 'Bidang Pertanian', '-', 1),
(1983, '753', 'Bidang Perindustrian', '-', 1),
(1984, '754', 'Bidang Pertambangan / Kesamudraan', '-', 1),
(1985, '755', 'Bidang Perhubungan', '-', 1),
(1986, '756', 'Bidang Tenaga Kerja', '-', 1),
(1987, '757', 'Bidang Permodalan', '-', 1),
(1988, '758', 'Bidang Perbankan / Moneter', '-', 1),
(1989, '759', 'Bidang Agraria', '-', 1),
(1990, '760', 'BIDANG PEKERJAAN UMUM', '-', 1),
(1991, '761', 'Bidang Pengairan', '-', 1),
(1992, '762', 'Bidang Jalan', '-', 1),
(1993, '763', 'Bidang Jembatan', '-', 1),
(1994, '764', 'Bidang Bangunan', '-', 1),
(1995, '765', 'Bidang Tata Kota', '-', 1),
(1996, '766', 'Bidang Lingkungan', '-', 1),
(1997, '767', 'Bidang Ketenagaan', '-', 1),
(1998, '768', 'Bidang Peralatan', '-', 1),
(1999, '769', 'Bidang Air Minum', '-', 1),
(2000, '770', '-', '-', 1),
(2001, '771', '-', '-', 1),
(2002, '772', '-', '-', 1),
(2003, '780', 'BIDANG KEPEGAWAIAN', '-', 1),
(2004, '781', 'Bidang Pengadaan Pegawai', '-', 1),
(2005, '782', 'Bidang Mutasi Pegawai', '-', 1),
(2006, '783', 'Bidang Kedudukan Pegawai', '-', 1),
(2007, '784', 'Bidang Kesejahteran Pegawai', '-', 1),
(2008, '785', 'Bidang Cuti', '-', 1),
(2009, '786', 'Bidang Penilaian', '-', 1),
(2010, '787', 'Bidang Tata Usaha Kepegawaian', '-', 1),
(2011, '788', 'Bidang Pemberhentian Pegawai', '-', 1),
(2012, '789', 'Bidang Pendidikan Pegawai', '-', 1),
(2013, '790', 'BIDANG KEUANGAN', '-', 1),
(2014, '791', 'Bidang Anggaran', '-', 1),
(2015, '792', 'Bidang Otorisasi', '-', 1),
(2016, '793', 'Bidang Verifikasi', '-', 1),
(2017, '794', 'Bidang Pembukuan', '-', 1),
(2018, '795', 'Bidang Perbendaharaan', '-', 1),
(2019, '796', 'Bidang Pembina Kebendaharaan', '-', 1),
(2020, '797', 'Bidang Pendapatan', '-', 1),
(2021, '798', '-', '-', 1),
(2022, '799', 'Bidang Bendaharaan', '-', 1),
(2023, '800', 'KEPEGAWAIAN', 'Klasifikasi Disini: Kebijaksanaan Kepegawaian', 1),
(2024, '800.1', 'Perencanaan', '-', 1),
(2025, '800.2', 'Penelitian', '-', 1),
(2026, '800.043', 'Pengaduan', '-', 1),
(2027, '800.05', 'Tim', '-', 1),
(2028, '800.07', 'Statistik', '-', 1),
(2029, '800.08', 'Peraturan Perundang-Undangan', '-', 1),
(2030, '810', 'PENGADAAN', 'Meliputi: Lamaran, Pengujian Kesehatan, Dan Pengangkatan Calon Pegawai', 1),
(2031, '811', 'Lamaran', '-', 1),
(2032, '811.1', 'Testing', '-', 1),
(2033, '811.2', 'Screening', '-', 1),
(2034, '811.3', 'Panggilan', '-', 1),
(2035, '812', 'Pengujian Kesehatan', '-', 1),
(2036, '813', 'Pengangkatan Calon Pegawai', '-', 1),
(2037, '813.1', 'Pengangkatan Calon Pegawai Golongan 1', '-', 1),
(2038, '813.2', 'Pengangkatan Calon Pegawai Golongan II', '-', 1),
(2039, '813.3', 'Pengangkatan Calon Pegawai Golongan III', '-', 1),
(2040, '813.4', 'Pengangkatan Calon Pegawai Golongan IV', '-', 1),
(2041, '813.5', 'Pengangkatan Calon Guru Inpres', '-', 1),
(2042, '814', 'Pengangkatan Tenaga Lepas', '-', 1),
(2043, '814.1', 'Pengangkatan Tenaga Bulanan / Tenaga Kontrak', '-', 1),
(2044, '814.2', 'Pengangkatan Tenaga Harian', '-', 1),
(2045, '814.3', 'Pengangkatan Tenaga Pensiunan', '-', 1),
(2046, '815', '-', '-', 1),
(2047, '816', '-', '-', 1),
(2048, '817', '-', '-', 1),
(2049, '820', 'MUTASI', 'Meliputi: Pengangkatan, Kenaikan Gaji Berkala, Kenaikan Pangkat, Pemindahan, Pelimpahan Datasering, Tugas Belajar Dan Wajib Militer', 1),
(2050, '821', 'Pengangkatan', '-', 1),
(2051, '821.1', 'Pengangkatan Menjadi Pegawai Negeri Tetap', '-', 1),
(2052, '821.11', 'Pengangkatan Menjadi Pegawai Negeri Golongan 1', '-', 1),
(2053, '821.12', 'Pengangkatan Menjadi Pegawai Negeri Golongan 2', '-', 1),
(2054, '821.13', 'Pengangkatan Menjadi Pegawai Negeri Golongan 3', '-', 1),
(2055, '821.14', 'Pengangkatan Menjadi Pegawai Negeri Golongan 4', '-', 1),
(2056, '821.15', 'Pengangkatan Menjadi Pegawai Negeri Sipil Yang Cuti Di Luar Tanggungan Negara', '-', 1),
(2057, '821.2', 'Pengangkatan Dalam Jabatan, Pembebasan Dari Jabatan, Berita Acara Serah Terima Jabatan', '-', 1),
(2058, '821.21', 'Sekjen/Dirjen/Irjen/Kabag', '-', 1),
(2059, '821.22', 'Kepala Biro/Direktur/Inspektur/Kepala Pusat/Sekretaris/Kepala Dinas/Asisten Sekwilda', '-', 1),
(2060, '821.23', 'Kepala Bagian/Kepala Sub Direktorat/Kepala Bidang/Inspektur Pembantu', '-', 1),
(2061, '821.24', 'Kepala Subbagian/Kepala Seksi/Kepala Sub Bidang/Pemeriksa', '-', 1),
(2062, '821.25', 'Residen/Pembantu Gubernur', '-', 1),
(2063, '821.26', 'Wedana/Pembantu Bupati', '-', 1),
(2064, '821.27', 'Camat', '-', 1),
(2065, '821.28', 'Lurah Administratif (Lurah Desa)', '-', 1),
(2066, '821.29', 'Jabatan Lainnya', '-', 1),
(2067, '822', 'Kenaikan Gaji Berkala', '-', 1),
(2068, '822.1', 'Pegawai Golongan 1', '-', 1),
(2069, '822.2', 'Pegawai Golongan 2', '-', 1),
(2070, '822.3', 'Pegawai Golongan 3', '-', 1),
(2071, '822.4', 'Pegawai Golongan 4', '-', 1),
(2072, '823', 'Kenaikan Pangkat / Pengangkatan', '-', 1),
(2073, '823.1', 'Pegawai Golongan 1', '-', 1),
(2074, '823.2', 'Pegawai Golongan 2', '-', 1),
(2075, '823.3', 'Pegawai Golongan 3', '-', 1),
(2076, '823.4', 'Pegawai Golongan 4', '-', 1),
(2077, '824', 'Pemindahan / Pelimpahan / Perbantuan', '-', 1),
(2078, '824.1', 'Pegawai Golongan 1', '-', 1),
(2079, '824.2', 'Pegawai Golongan 2', '-', 1),
(2080, '824.3', 'Pegawai Golongan 3', '-', 1),
(2081, '824.4', 'Pegawai Golongan 4', '-', 1),
(2082, '824.5', 'Lolos Butuh', '-', 1),
(2083, '824.6', 'Kurikulum dan Silabi', '-', 1),
(2084, '824.7', 'Proposal (TOR)', '-', 1),
(2085, '825', 'Datasering dan Penempatan Kembali', '-', 1),
(2086, '826', 'Penunjukan Tugas Belajar', '-', 1),
(2087, '826.1', 'Dalam Negeri', '-', 1),
(2088, '826.2', 'Luar Negeri', '-', 1),
(2089, '826.3', 'Tunjangan Belajar', '-', 1),
(2090, '826.4', 'Penempatan Kembali', '-', 1),
(2091, '827', 'Wajib Militer', '-', 1),
(2092, '828', 'Mutasi Dengan Instansi Lain', '-', 1),
(2093, '829', '-', '-', 1),
(2094, '830', 'KEDUDUKAN', 'Meliputi: Perhitungan Masa Kerja, Penyesuaian Pangkat/Gaji, Penghargaan Ijasah, Dan Jenjang Pangkat', 1),
(2095, '831', 'Perhitungan Masa Kerja', '-', 1),
(2096, '832', 'Penyesuaian Pangkat / Gaji', '-', 1),
(2097, '832.1', 'Pegawai Golongan 1', '-', 1),
(2098, '832.2', 'Pegawai Golongan 2', '-', 1),
(2099, '832.3', 'Pegawai Golongan 3', '-', 1),
(2100, '832.4', 'Pegawai Golongan 4', '-', 1),
(2101, '833', 'Penghargaan Ijazah / Penyesuaian', '-', 1),
(2102, '834', 'Jenjang Pangkat / Eselonering', '-', 1),
(2103, '835', '-', '-', 1),
(2104, '836', '-', '-', 1),
(2105, '837', '-', '-', 1),
(2106, '840', 'KESEJAHTERAAN PEGAWAI', 'Meliputi: Tunjangan, Dana, Perawatan Kesehatan, Koperasi, Distribusi, Permahan/Tanah, Bantuan Sosial, Rekreasi Dan Dispensasi.', 1),
(2107, '841', 'Tunjangan', '-', 1),
(2108, '841.1', 'Jabatan', '-', 1),
(2109, '841.2', 'Kehormatan', '-', 1),
(2110, '841.3', 'Kematian/Uang Duka', '-', 1),
(2111, '841.4', 'Tunjangan Hari Raya', '-', 1),
(2112, '841.5', 'Perjalanan Dinas Tetap/Cuti/Pindah', '-', 1),
(2113, '841.6', 'Keluarga', '-', 1),
(2114, '841.7', 'Sandang, Pangan, Papan (Bapertarum)', '-', 1),
(2115, '842', 'Dana', '-', 1),
(2116, '842.1', 'Taspen', '-', 1),
(2117, '842.2', 'Kesehatan', '-', 1),
(2118, '842.3', 'Asuransi', '-', 1),
(2119, '843', 'Perawatan Kesehatan', '-', 1),
(2120, '843.1', 'Poliklinik', '-', 1),
(2121, '843.2', 'Perawatan Dokter', '-', 1),
(2122, '843.3', 'Obat-Obatan', '-', 1),
(2123, '843.4', 'Keluarga Berencana', '-', 1),
(2124, '844', 'Koperasi / Distribusi', '-', 1),
(2125, '844.1', 'Distribusi Pangan', '-', 1),
(2126, '844.2', 'Distribusi Sandang', '-', 1),
(2127, '844.3', 'Distribusi Papan', '-', 1),
(2128, '845', 'Perumahan/Tanah', '-', 1),
(2129, '845.1', 'Perumahan Pegawai', '-', 1),
(2130, '845.2', 'Tanah Kapling', '-', 1),
(2131, '845.3', 'Losmen/Hotel', '-', 1),
(2132, '846', 'Bantuan Sosial', '-', 1),
(2133, '846.1', 'Bantuan Kebakaran', '-', 1),
(2134, '846.2', 'Bantuan Kebanjiran', '-', 1),
(2135, '847', '-', '-', 1),
(2136, '848', '-', '-', 1),
(2137, '849', '-', '-', 1),
(2138, '850', 'CUTI ', 'Meliputi Cuti Tahunan, Cuti Besar, Cuti Sakit, Cuti Hamil, Cuti Naik Haji, Cuti Diluar Tanggungan Negara Dan Cuti Alasan Lain', 1),
(2139, '851', 'Cuti Tahunan', '-', 1),
(2140, '852', 'Cuti Besar', '-', 1),
(2141, '853', 'Cuti Sakit', '-', 1),
(2142, '854', 'Cuti Hamil', '-', 1),
(2143, '855', 'Cuti Naik Haji/Umroh', '-', 1),
(2144, '856', 'Cuti Di Luar Tangungan Neagara', '-', 1),
(2145, '857', 'Cuti Alasan Lain/Alasan Penting', '-', 1),
(2146, '858', '-', '-', 1),
(2147, '859', '-', '-', 1),
(2148, '860', 'PENILAIAN', 'Meliputi: Penghargaan, Hukuman, Konduite, Ujian Dinas,Penilaian Kakayaan Pribadi Dan Rehabilitasi', 1),
(2149, '861', 'Penghargaan', '-', 1),
(2150, '861.1', 'Bintang/Satyalencana', '-', 1),
(2151, '861.2', 'Kenaikan Pangkat Anumerta', '-', 1),
(2152, '861.3', 'Kenaikan Gaji Istimewa', '-', 1),
(2153, '861.4', 'Hadiah Berupa Uang', '-', 1),
(2154, '861.5', 'Pegawai Teladan', '-', 1),
(2155, '862', 'Hukuman', '-', 1),
(2156, '862.1', 'Teguran Peringatan', '-', 1),
(2157, '862.2', 'Penundaan Kenaikan Gaji', '-', 1),
(2158, '862.3', 'Penurunan Pangkat', '-', 1),
(2159, '862.4', 'Pemindahan', 'Catatan: Pemberhentian Untuk Sementara Waktu Dan Pemberhentian Tidak Dengan Hormat Lihat 887 Dan 888', 1),
(2160, '863', 'Konduite, DP3, Disiplin Pegawai', '-', 1),
(2161, '864', 'Ujian Dinas', '-', 1),
(2162, '864.1', 'Tingkat 1', '-', 1),
(2163, '864.2', 'Tingkat 2', '-', 1),
(2164, '864.3', 'Tingkat 3', '-', 1),
(2165, '865', 'Penilaian Kehidupan Pegawai Negeri', 'Meliputi: Petunjuk Pelaksanaan Hidup Sederhana, Penilaian Kekayaan Pribadi ( LP2P )', 1),
(2166, '866', 'Rehabilitasi / Pengaktifan Kembali', '-', 1),
(2167, '867', '-', '-', 1),
(2168, '868', '-', '-', 1),
(2169, '869', '-', '-', 1),
(2170, '870', 'TATA USAHA KEPEGAWAIAN', 'Meliputi: Formasi, Bezetting, Registrasi,Daftar, Riwayat Hidup, Hak, Penggajian, Sumpah,/Janji Dan Korps Pegawai', 1),
(2171, '871', 'Formasi', '-', 1),
(2172, '872', 'Bezetting/Daftar Urut Kepegawaian', '-', 1),
(2173, '873', 'Registrasi', '-', 1),
(2174, '873.1', 'NIP', '-', 1),
(2175, '873.2', 'KARPEG', '-', 1),
(2176, '873.3', 'Legitiminasi/Tanda Pengenal', '-', 1),
(2177, '873.4', 'Daftar Keluarga, Perkawinan, Perceraian, Karis, Karsu', '-', 1),
(2178, '874', 'Daftar Riwayat Pekerjaan', '-', 1),
(2179, '874.1', 'Tanggal Lahir', '-', 1),
(2180, '874.2', 'Penggantian Nama', '-', 1),
(2181, '874.3', 'Izin kepartaian Organisasi', '-', 1),
(2182, '875', 'Kewenangan Mutasi Pegawai', '-', 1),
(2183, '875.1', 'Pelimpahan Wewenang', '-', 1),
(2184, '875.2', 'Specimen Tanda Tangan', '-', 1),
(2185, '876', 'Penggajian', '-', 1),
(2186, '876.1', 'SKPP', '-', 1),
(2187, '877', 'Sumpah/Janji', '-', 1),
(2188, '878', 'Korps Pegawai', '-', 1),
(2189, '879', '-', '-', 1),
(2190, '880', 'PEMBERHENTIAN PEGAWAI', 'Meliputi Atas  Pemberhentian,Permintaan Sendiri, Dengan Hak Pensiun, Karena Meninggal Dunia, Alasan Lain, Dengan Diberi Uang Pesangon, Uang Tnggu Untuk Sementara Waktu Dan Pemberhentian Tidak Dengan  Hormat', 1),
(2191, '881', 'Permintaan Sendiri', '-', 1),
(2192, '882', 'Dengan Hak Pensiun', '-', 1),
(2193, '882.1', 'Pemberhentian Dengan Hak Pensiun Pegawai Negeri Golongan 1', '-', 1),
(2194, '882.2', 'Pemberhentian Dengan Hak Pensiun Pegawai Negeri Golongan 2', '-', 1),
(2195, '882.3', 'Pemberhentian Dengan Hak Pensiun Pegawai Negeri Golongan 3', '-', 1),
(2196, '882.4', 'Pemberhentian Dengan Hak Pensiun Pegawai Negeri Golongan 4', '-', 1),
(2197, '882.5', 'Pensiun Janda / Duda', '-', 1),
(2198, '882.6', 'Pensiun Yatim Piatu', '-', 1),
(2199, '882.7', 'Uang Muka Pensiun', '-', 1),
(2200, '883', 'Karena Meninggal', '-', 1),
(2201, '883.1', 'Karena Meninggal Dalam Tugas', '-', 1),
(2202, '884', 'Alasan Lain', '-', 1),
(2203, '885', 'Uang Pesangon', '-', 1),
(2204, '886', 'Uang Tunggu', '-', 1),
(2205, '887', 'Untuk Sementara Waktu', '-', 1),
(2206, '888', 'Tidak Dengan Hormat', '-', 1),
(2207, '889', '-', '-', 1),
(2208, '890', 'PENDIDIKAN PEGAWAI', 'Meliputi: Perencanaan, Pendidikan Reguler, Pendidikan Non-Reguler, Pendidikan Ke Luar Negeri, Metode, Tenaga Pengajar, Administrasi Pendidikan, Fasilitas Sarana Pendidikan', 1),
(2209, '891', 'Perencanaan', '-', 1),
(2210, '891.1', 'Program', '-', 1),
(2211, '891.2', 'Kurikulum dan Silabi', '-', 1),
(2212, '891.3', 'Proposal ( TOR )', '-', 1),
(2213, '892', 'Pendidikan _Egular / Kader', '-', 1),
(2214, '892.1', 'IPDN / APDN', '-', 1),
(2215, '892.2', 'Kursus-Kursus Reguler', '-', 1),
(2216, '893', 'Pendidikan dan Pelatihan / Non Reguler', '-', 1),
(2217, '893.1', 'LEMHANAS', '-', 1),
(2218, '893.2', 'Pendidikan dan Pelatihan Struktural, SPATI, SPAMEN, SPAMA, ADUMLA, ADUM', '-', 1),
(2219, '893.3', 'Kursus-Kursus / Penataran', '-', 1),
(2220, '893.4', 'Diklat Tehnik, Fungsional Dan Manajemen Pemerintahan', '-', 1),
(2221, '893.5', 'Diklat Lainnya', '-', 1),
(2222, '894', 'Pendidikan Luar Negeri', '-', 1),
(2223, '894.1', 'Berkesinambungan / Berkala / Bergelar', '-', 1),
(2224, '894.2', 'Non Gelar / Diploma', '-', 1),
(2225, '895', 'Metode', '-', 1),
(2226, '895.1', 'Kuliah', '-', 1),
(2227, '895.2', 'Ceramah, Simposium', '-', 1),
(2228, '895.3', 'Diskusi, Raker, Seminar, Lokakarya, Orientasi', '-', 1),
(2229, '895.4', 'Studi Lapangan, Kkn, Widyawisata', '-', 1),
(2230, '895.5', 'Tanya Jawab / Sylabi / Modul / Kursil', '-', 1),
(2231, '895.7', 'Penugasan', '-', 1);
INSERT INTO `ks` (`id`, `kode`, `nama`, `uraian`, `enabled`) VALUES
(2232, '895.8', 'Gladi', '-', 1),
(2233, '896', 'Tenaga Pengajar / Widyaiswara/Narasumber', '-', 1),
(2234, '896.1', 'Moderator', '-', 1),
(2235, '897', 'Administrasi Pendidikan', '-', 1),
(2236, '897.1', 'Tahun Pelajaran', '-', 1),
(2237, '897.2', 'Persyaratan, Pendaftaran, Testing, Ujian', '-', 1),
(2238, '897.3', 'STTP', '-', 1),
(2239, '897.4', 'Penilaian Angka Kredit', '-', 1),
(2240, '897.5', 'Laporan Pendidikan Dan Pelatihan', '-', 1),
(2241, '898', 'Fasilitas Belajar', '-', 1),
(2242, '898.1', 'Tunjangan Belajar', '-', 1),
(2243, '898.2', 'Asrama', '-', 1),
(2244, '898.3', 'Uang Makan', '-', 1),
(2245, '898.4', 'Uang Transport', '-', 1),
(2246, '898.5', 'Uang Buku', '-', 1),
(2247, '898.6', 'Uang Ujian', '-', 1),
(2248, '898.7', 'Uang Semester / Uang Kuliah', '-', 1),
(2249, '898.8', 'Uang Saku', '-', 1),
(2250, '899', 'Sarana', '-', 1),
(2251, '899.1', 'Bantuan Sarana Belajar', '-', 1),
(2252, '899.2', 'Bantuan Alat-Alat Tulis', '-', 1),
(2253, '899.3', 'Bantuan Sarana Belajar Lainnya', '-', 1),
(2254, '900', 'KEUANGAN', '-', 1),
(2255, '901', 'Nota Keuangan', '-', 1),
(2256, '902', 'APBN', '-', 1),
(2257, '903', 'APBD', '-', 1),
(2258, '904', 'APBN-P', '-', 1),
(2259, '905', 'Dana Alokasi Umum', '-', 1),
(2260, '906', 'Dana Alokasi Khusus', '-', 1),
(2261, '907', 'Dekonsentrasi (Pelimpahan Dana Dari Pusat Ke Daerah)', '-', 1),
(2262, '907', '-', '-', 1),
(2263, '908', '-', '-', 1),
(2264, '910', 'ANGGARAN', '-', 1),
(2265, '911', 'Rutin', '-', 1),
(2266, '912', 'Pembangunan', '-', 1),
(2267, '913', 'Anggaran Belanja Tambahan', '-', 1),
(2268, '914', 'Daftar Isian Kegiatan (DIK)', '-', 1),
(2269, '914.1', 'Daftar Usulan Kegiatan (DUK)', '-', 1),
(2270, '915', 'Daftar Isian Poyek (DIP)', '-', 1),
(2271, '915.1', 'Daftar Usulan Proyek (DUP)', '-', 1),
(2272, '915.2', 'Daftar Isian Pengguna Anggaran (DIPA)', '-', 1),
(2273, '916', 'Revisi Anggaran', '-', 1),
(2274, '917', '-', '-', 1),
(2275, '918', '-', '-', 1),
(2276, '920', 'OTORISASI / SKO', '-', 1),
(2277, '921', 'Rutin', '-', 1),
(2278, '922', 'Pembangunan', '-', 1),
(2279, '923', 'SIAP', '-', 1),
(2280, '924', 'Ralat SKO', '-', 1),
(2281, '925', '-', '-', 1),
(2282, '926', '-', '-', 1),
(2283, '927', '-', '-', 1),
(2284, '930', 'VERIFIKASI', '-', 1),
(2285, '931', 'SPM Rutin (daftar p8)', '-', 1),
(2286, '932', 'SPM Pembangunan (daftar p8)', '-', 1),
(2287, '933', 'Penerimaan (daftar p6. p7)', '-', 1),
(2288, '934', 'SPJ Rutin', '-', 1),
(2289, '935', 'SPJ Pembangunan', '-', 1),
(2290, '936', 'Nota Pemeriksaan', '-', 1),
(2291, '937', 'SP Pemindahan Pembukuan', '-', 1),
(2292, '938', '-', '-', 1),
(2293, '939', '-', '-', 1),
(2294, '940', 'PEMBUKUAN', '-', 1),
(2295, '941', 'Penyusunan Perhitungan Anggaran', '-', 1),
(2296, '942', 'Permintaan  Data Anggaran Laporan Fisik Pembangunan', '-', 1),
(2297, '943', 'Laporan Fisik Pembangunan', '-', 1),
(2298, '944', '-', '-', 1),
(2299, '945', '-', '-', 1),
(2300, '950', 'PERBENDAHARAAN', '-', 1),
(2301, '951', 'Tuntutan Ganti Rugi (ICW Pasal 74)', '-', 1),
(2302, '952', 'Tuntutan Bendaharawan', '-', 1),
(2303, '953', 'Penghapusan Kekayaan Negara', '-', 1),
(2304, '954', 'Pengangkatan/Penggantian Pemimpin Proyak Dan Pengangkatan/Pemberhentian Bendaharawan', '-', 1),
(2305, '955', 'Spesimen Tanda Tangan', '-', 1),
(2306, '956', 'Surat Tagihan Piutang, Ikhtisar Bulanan', '-', 1),
(2307, '957', '-', '-', 1),
(2308, '958', '-', '-', 1),
(2309, '959', '-', '-', 1),
(2310, '960', 'PEMBINAAN KEBENDAHARAAN', '-', 1),
(2311, '961', 'Pemeriksaan Kas Dan Hasil Pemeriksaan Kas', '-', 1),
(2312, '962', 'Pemeriksaan Administrasi Bendaharawan', '-', 1),
(2313, '963', 'Laporan Keuangan Bendaharawan', '-', 1),
(2314, '964', '-', '-', 1),
(2315, '965', '-', '-', 1),
(2316, '966', '-', '-', 1),
(2317, '970', 'PENDAPATAN', '-', 1),
(2318, '971', 'Perimbangan Keuangan', '-', 1),
(2319, '972', 'Subsidi', '-', 1),
(2320, '973', 'Pajak,Ipeda, IHH,IHPH', '-', 1),
(2321, '974', 'Retribusi', '-', 1),
(2322, '975', 'Bea', '-', 1),
(2323, '976', 'Cukai', '-', 1),
(2324, '977', 'Pungutan / PNBP', '-', 1),
(2325, '978', 'Bantuan Presiden, Menteri Dan Bantuan Lainnya', '-', 1),
(2326, '979', '-', '-', 1),
(2327, '980', '-', '-', 1),
(2328, '981', '-', '-', 1),
(2329, '990', 'BENDAHARAWAN', '-', 1),
(2330, '991', 'SKPP / SPP', '-', 1),
(2331, '992', 'Teguran SPJ', '-', 1),
(2332, '993', '-', '-', 1),
(2333, '994', '-', '-', 1),
(2334, '995', '-', '-', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `lapak`
--

CREATE TABLE `lapak` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nama_lapak` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tentang` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_lapak` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lapor`
--

CREATE TABLE `lapor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggapan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identitas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `posting` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datalike` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `lapor`
--

INSERT INTO `lapor` (`id`, `user_id`, `isi`, `kategori`, `status`, `tanggapan`, `identitas`, `posting`, `photo`, `datalike`, `created_at`, `updated_at`) VALUES
(12, 12, 'saya ingin melapor ada maling', 'keamanan', 'selesai', 'siap laksanakan', 'ya', 'ya', '1636956799-2021-11-15.png', NULL, '2021-11-15 06:13:19', '2021-11-15 06:13:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `members`
--

CREATE TABLE `members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_01_23_032109_create_sessions_table', 1),
(7, '2021_01_23_033905_add_level_t_users', 1),
(8, '2021_01_23_042745_create_members_table', 1),
(10, '2021_02_23_154402_create_table_profil', 2),
(11, '2021_03_12_145951_create_table_penduduk', 3),
(12, '2021_03_12_153619_create_table_keluarga', 4),
(13, '2021_03_16_040908_add_fk_pendudukid_to_keluarga', 5),
(14, '2021_03_16_044128_create_table_anggota_keluarga', 6),
(15, '2021_03_16_044218_add_fk_to_anggotakeluarga', 6),
(16, '2021_03_16_072818_create_table_rumah_tangga', 7),
(17, '2021_03_16_072954_create_table_anggota_rumah_tangga', 7),
(18, '2021_03_16_073045_add_fk_to_rumah_tangga', 8),
(19, '2021_03_16_073120_add_fk_to_anggota_rumah_tangga', 9),
(20, '2021_03_17_012704_create_table_kategori_kelompok', 10),
(21, '2021_03_17_012803_create_table_kelompok', 10),
(22, '2021_03_17_012921_add_fk_to_kelompok', 11),
(23, '2021_03_17_025236_create_table_anggota_kelompok', 12),
(24, '2021_03_17_025333_add_fk_to_anggota_kelompok', 12),
(25, '2021_03_17_034026_create_table_suplemen', 13),
(26, '2021_03_17_034155_create_table_anggota_suplemen', 13),
(27, '2021_03_17_034259_add_fk_to_anggota_suplemen', 14),
(28, '2021_03_18_031221_create_table_staf', 15),
(29, '2021_03_18_064040_create_table_informasi_publik', 16),
(30, '2021_03_19_021809_create_table_inventaris', 17),
(31, '2021_03_20_104325_create_table_klasifikasi_surat', 18),
(32, '2021_03_20_140836_create_table_bantuan', 19),
(33, '2021_03_24_022341_create_table_dusun', 20),
(34, '2021_03_24_024950_create_table_rw', 21),
(35, '2021_03_24_025325_add_fk_to_rw', 21),
(36, '2021_03_24_031150_create_table_rt', 22),
(37, '2021_03_24_031234_add_fk_to_rt', 22),
(38, '2021_03_24_034927_add_fk_rw_id_to_penduduk', 23),
(39, '2021_03_24_110859_create_table_peserta_bantuan', 24),
(40, '2021_03_24_111111_add_fk_to_peserta_bantuan', 24),
(41, '2021_03_25_081155_create_table_pemudik', 25),
(42, '2021_03_26_031023_create_table_slider', 26),
(43, '2021_03_26_064406_create_table_kategori_artikel', 27),
(44, '2021_03_26_064449_create_table_artikel', 27),
(45, '2021_03_26_064627_add_fk_to_artikel', 27),
(46, '2021_03_29_020244_create_table_galer', 28),
(47, '2021_03_29_020401_create_table_galeri_photo', 28),
(48, '2021_03_29_020527_add_fk_to_galeri_photo', 29),
(49, '2021_09_10_013120_create_table_visitor', 30),
(50, '2021_09_10_153111_create_table_kategori', 31),
(51, '2021_09_10_153416_add_field_kategori_to_artikel', 31),
(52, '2021_09_13_095633_create_table_potensi', 32),
(53, '2021_09_13_095828_create_table_potensi_sub', 32),
(54, '2021_09_13_095949_add_fk_to_potensi_sub', 33),
(55, '2021_09_13_152203_create_table_lapor', 34),
(56, '2021_09_13_152447_add_fk_user_id_lapor', 34),
(57, '2021_09_14_050445_create_table_surat_penduduk', 35),
(58, '2021_09_14_050609_add_fk_to_surat_penduduk', 35),
(59, '2021_09_14_054244_create_table_forum', 36),
(60, '2021_09_14_054411_create_table_forum_diskusi', 36),
(61, '2021_09_14_054457_add_fk_to_forum_diskusi', 36),
(62, '2021_09_14_060742_add_fk_forum_to_forum_diskusi', 37),
(63, '2021_09_17_135001_create_table_produk', 38),
(64, '2021_09_17_135029_create_table_lapak', 38),
(65, '2021_09_17_140658_add_fk_to_lapak', 39),
(66, '2021_09_17_140740_add_fk_to_produk', 39),
(67, '2021_09_23_152134_create_table_format_surat', 40),
(68, '2021_09_23_152304_create_table_syarat_surat', 40),
(69, '2021_09_23_152321_create_table_data_syarat_surat', 40),
(70, '2021_09_23_152704_create_table_penduduk_surat', 40),
(71, '2021_09_23_152954_add_fk_to_penduduk_surat', 41),
(72, '2021_09_23_153108_add_fk_to_format_surat', 42),
(73, '2021_09_23_153154_add_fk_to_syarat_surat', 43),
(74, '2021_09_23_162527_add_field_to_info_website', 44),
(75, '2021_09_23_163500_add_field_to_penduduk_surat', 45),
(76, '2021_09_29_165239_add_kode_surat_to_table_format_surat', 46),
(77, '2021_10_06_150950_add_field_surat_to_penduduk_surat', 47),
(78, '2021_10_26_130343_add_field_to_rumah_tangga', 47),
(79, '2021_10_27_131906_add_photo_to_staf', 48),
(80, '2021_10_27_145228_add_photo_to_lapor', 49),
(81, '2021_10_27_154251_add_field_to_lapor', 50),
(84, '2021_11_03_160425_create_table_vaksinasi', 51),
(85, '2021_11_03_160538_add_fk_penduduk_to_vaksinasi', 52),
(86, '2021_11_05_090457_add_field_status_kk_to_keluarga', 53),
(87, '2021_11_10_114620_create_table_akses_user', 54),
(88, '2021_11_10_114647_add_fk_to_table_akses_user', 54),
(89, '2021_11_10_155415_create_table_covid', 55),
(90, '2021_11_10_155640_add_fk_table_covid', 55),
(91, '2021_11_11_170349_create_table_penduduk_aduan', 56),
(93, '2021_11_11_172601_add_fk_to_penduduk_aduan', 57),
(94, '2021_11_12_093116_add_field_like_to_table_lapor', 58),
(95, '2021_11_14_084719_add_field_status_to_penduduk_aduan', 59),
(97, '2021_11_14_171400_add_field_notif_to_table_pendudukaduan', 60),
(98, '2021_11_15_133546_add_tanggal_to_table_covid', 61);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemudik`
--

CREATE TABLE `pemudik` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nik` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jk` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agama` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `goldar` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_penduduk` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rt_id` int(11) DEFAULT NULL,
  `asal_pemudik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_mudik` date NOT NULL,
  `tujuan_mudik` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_hari` int(11) NOT NULL,
  `no_hp` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_covid` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_pantau` enum('ya','tidak') COLLATE utf8mb4_unicode_ci NOT NULL,
  `keluhan_kesehatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penduduk`
--

CREATE TABLE `penduduk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rt_id` bigint(20) UNSIGNED NOT NULL,
  `nik` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_penduduk` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_ktp` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_rekam` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_card` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kk_sebelum` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hubungan_keluarga` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jk` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_penduduk` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_akta` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `waktu_lahir` time DEFAULT NULL,
  `tempat_dilahirkan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelahiran` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anak_ke` int(11) NOT NULL,
  `penolong_kelahiran` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `berat_lahir` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `panjang_lahir` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pendidikan_kk` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan_tempuh` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_warganegara` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_paspor` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_akhirpaspor` date DEFAULT NULL,
  `nomor_kitas` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik_ayah` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ayah` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik_ibu` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ibu` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat_penduduk` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long_penduduk` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_telp` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat_sebelum` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat_sekarang` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_perkawinan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_bukunikah` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_perkawinan` date DEFAULT NULL,
  `akta_perceraian` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_perceraian` date DEFAULT NULL,
  `golongan_darah` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cacat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sakit_menahun` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `akseptor_kb` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asuransi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poto` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `penduduk`
--

INSERT INTO `penduduk` (`id`, `rt_id`, `nik`, `nama_penduduk`, `status_ktp`, `status_rekam`, `id_card`, `kk_sebelum`, `hubungan_keluarga`, `jk`, `agama`, `status_penduduk`, `no_akta`, `tempat_lahir`, `tgl_lahir`, `waktu_lahir`, `tempat_dilahirkan`, `jenis_kelahiran`, `anak_ke`, `penolong_kelahiran`, `berat_lahir`, `panjang_lahir`, `pendidikan_kk`, `pendidikan_tempuh`, `pekerjaan`, `status_warganegara`, `nomor_paspor`, `tgl_akhirpaspor`, `nomor_kitas`, `nik_ayah`, `nama_ayah`, `nik_ibu`, `nama_ibu`, `lat_penduduk`, `long_penduduk`, `no_telp`, `email`, `alamat_sebelum`, `alamat_sekarang`, `status_perkawinan`, `no_bukunikah`, `tgl_perkawinan`, `akta_perceraian`, `tgl_perceraian`, `golongan_darah`, `cacat`, `sakit_menahun`, `akseptor_kb`, `asuransi`, `poto`, `created_at`, `updated_at`) VALUES
(6, 1, '3498712097533222', 'Ayesha Mutiara Shavilla', 'belum', 'belum rekam', NULL, '09987654324778', 'istri', 'perempuan', 'islam', 'tetap', '98644568908', 'Tasikmalaya', '2004-05-30', NULL, 'rs/rb', 'tunggal', 1, 'dokter', '2000', '60', 'slta/sederajat', 'sedang tk/kelompok bermain', 'kepala desa', 'wni', NULL, NULL, NULL, '5692864245728', 'Keenan', '42557281827366', 'Naura', NULL, NULL, '082121135161', 'ayeshamutiaras@gmail.com', 'Jakarta', 'Bali', 'cerai hidup', '788326463321', NULL, '654215453673', '2021-09-22', 'AB', 'cacat rungu/wicara', 'malaria', 'suntik', 'bpjs non penerima bantuan iuran', NULL, '2021-09-22 07:14:20', '2021-11-10 04:41:11'),
(7, 1, '3206165488906543', 'Alfi Letari', 'ktp-el', 'belum rekam', 'dvsegthhrfnnf', '085667890332', 'anak', 'perempuan', 'islam', 'tetap', '789963467389', 'Tasikmalaya', '2000-08-22', NULL, 'rumah', 'tunggal', 1, 'bidan perawat', '3000', '42', 'slta/sederajat', 'sedang slta/sederajat', 'belum/tidak bekerja', 'wni', NULL, NULL, NULL, '320616500432156', 'yusuf', '32061657899653', 'dira', NULL, NULL, '0856672345167', 'alfii@gmail.com', 'garut', 'jakarta', 'belum kawin', NULL, NULL, NULL, NULL, 'A', 'TIDAK CACAT', 'tidak ada/tidak sakit', 'LAINNYA', 'asuransi lainnya', NULL, '2021-09-22 07:19:42', '2021-11-15 04:53:17'),
(8, 1, '3367867823100', 'Widi Astuti', 'ktp-el', 'sudah rekam', NULL, '79868534245366', 'anak', 'perempuan', 'islam', 'tetap', '7828993372891', 'Tasikmalaya', '2004-03-02', NULL, 'rs/rb', 'tunggal', 3, 'dokter', '2000', '65', 'belum tamat sd/sederajat', 'sedang slta/sederajat', 'pelajar/mahasiswa', 'wni', NULL, NULL, NULL, '78747843992872', 'mansur', '24142354346666', 'jaenab', NULL, NULL, '089663456876', 'widias33@gmail.com', 'tasikmalaya', 'tasikmalaya', 'belum kawin', NULL, NULL, NULL, NULL, 'AB', 'TIDAK CACAT', 'tidak ada/tidak sakit', 'LAINNYA', 'asuransi lainnya', NULL, '2021-09-22 07:19:55', '2021-09-22 07:19:55'),
(9, 1, '09876543389000', 'Ijem', 'ktp-el', 'belum rekam', NULL, '567890987654', 'pembantu', 'perempuan', 'islam', 'pendatang', '0987654334578', 'Majalengka', '2002-06-18', NULL, 'rumah', 'kembar 4', 5, 'dukun', '2500', '69', 'tamat sd/sederajat', 'sedang tk/kelompok bermain', 'petani/pekebun', 'wni', NULL, NULL, NULL, '67389864567899', 'Kusoy', '98726543456787', 'Mamah', NULL, NULL, '0866534325', 'ijem@gmail.com', 'Majalengka', 'Jakarta', 'belum kawin', NULL, NULL, NULL, NULL, 'O', 'TIDAK CACAT', 'tidak ada/tidak sakit', 'LAINNYA', 'asuransi lainnya', NULL, '2021-09-22 07:23:21', '2021-09-22 07:23:21'),
(10, 1, '9876534567890', 'Inem', 'ktp-el', 'sudah rekam', NULL, '765434567898', 'istri', 'perempuan', 'kristen', 'tetap', '876567898765', 'Riau', '1990-07-19', NULL, 'rs/rb', 'tunggal', 2, 'dokter', '3000', '50', 'strata II', 'sedang s-2/sederajat', 'bupati', 'wni', NULL, NULL, NULL, '8675456757654', 'Asep', '5346576877667', 'Inah', NULL, NULL, '086565654564', 'Inem@gmail.com', 'Nusa Tenggara Barat', 'Riau', 'kawin', '4567876545', '2010-11-02', NULL, NULL, 'B', 'TIDAK CACAT', 'tidak ada/tidak sakit', 'LAINNYA', 'bpjs non penerima bantuan iuran', NULL, '2021-09-22 07:27:43', '2021-09-22 07:27:43'),
(16, 1, '9876544356709', 'Indra Permana', 'ktp-el', 'belum rekam', NULL, '099876543247', 'suami', 'laki-laki', 'kristen', 'tetap', '5436789786756', 'Tasikmalaya', '1989-07-27', NULL, 'rs/rb', 'tunggal', 1, 'dokter', '2500', '66', 'strata II', 'sedang s-2/sederajat', 'pegawai negeri sipil (pns)', 'wni', NULL, NULL, NULL, '67389864567899', 'Saepul', '5346576877600', 'Markonah', NULL, NULL, '086565654567', 'indra@gmail.com', 'Riau', 'Sulawesi', 'kawin', '788326463355', '2021-09-01', NULL, NULL, 'O', 'TIDAK CACAT', 'tidak ada/tidak sakit', 'LAINNYA', 'asuransi lainnya', NULL, '2021-09-22 07:50:07', '2021-09-22 07:50:07'),
(17, 1, '320677890012657', 'rudi', 'ktp-el', 'sudah rekam', NULL, '3245567899012', 'suami', 'laki-laki', 'islam', 'tetap', '456678523421', 'banten', '1997-07-10', NULL, 'rumah', 'tunggal', 3, 'bidan perawat', '2700', '41', 'slta/sederajat', 'tidak sedang sekolah', 'nelayan/perikanan', 'wni', NULL, NULL, NULL, '3206778932145678', 'tatang', '3206778906652456', 'entin', NULL, NULL, '0877562425212', 'rudi@gmail.com', 'banten', 'garut', 'kawin', '445678900643', '2020-09-27', NULL, NULL, 'O', 'TIDAK CACAT', 'tidak ada/tidak sakit', 'LAINNYA', 'asuransi lainnya', NULL, '2021-09-22 07:51:11', '2021-09-22 07:51:11'),
(18, 1, '3903875298364', 'nadia', 'ktp-el', 'sudah rekam', NULL, '32940293745709', 'istri', 'perempuan', 'islam', 'tetap', '32064184730923', 'bandung', '2021-09-08', NULL, 'puskesmas', 'tunggal', 1, 'bidan perawat', '2500', '38', 'sltp/sederajat', 'sedang sltp/sederajat', 'mengurus rumah tangga', 'wni', NULL, NULL, NULL, '35208721648932', 'idris', '39204821745638', 'neni', NULL, NULL, '085175925676', 'sari@gmail.com', 'surabaya', 'bandung', 'kawin', '698253401264', '2021-10-01', NULL, NULL, 'A', 'CACAT FISIK', 'tidak ada/tidak sakit', 'PIL', 'tidak/belum punya', NULL, '2021-09-22 08:02:36', '2021-09-22 08:02:36'),
(19, 1, '34082947319432', 'agis', 'belum', 'belum wajib', NULL, '39802715493217', 'anak', 'laki-laki', 'islam', 'pendatang', '39210483298345', 'jakarta', '2021-10-19', NULL, 'rs/rb', 'kembar 2', 2, 'dokter', '2700', '32', 'tidak/belum sekolah', 'belum masuk tk/kelompok bermain', 'belum/tidak bekerja', 'wni', NULL, NULL, NULL, '39102735498213', 'andri', '32091649237845', 'ratih', NULL, NULL, '082618490543', 'ratih@gmail.com', 'bogor', 'jakarta', 'belum kawin', NULL, NULL, NULL, NULL, 'AB-', 'CACAT LAINNYA', 'paru-paru', 'SUNTIK', 'tidak/belum punya', NULL, '2021-09-22 08:08:46', '2021-09-22 08:08:46'),
(20, 1, '32902743184756', 'cica', 'ktp-el', 'sudah rekam', NULL, '32081639203745', 'mertua', 'perempuan', 'islam', 'tidak tetap', '32902815384586', 'sumedang', '2021-11-18', NULL, 'rumah', 'tunggal', 5, 'bidan perawat', '2400', '31', 'slta/sederajat', 'sedang slta/sederajat', 'pensiunan', 'wni', NULL, NULL, NULL, '38091623846573', 'herman', '39012873456723', 'lisa', NULL, NULL, '082719836742', 'lisa@gmail.com', 'tegal', 'sumedang', 'cerai hidup', '32091735462983', '2021-09-08', '32091798263549', '2021-12-24', 'AB-', 'TIDAK CACAT', 'tidak ada/tidak sakit', 'SUSUK KB', 'asuransi lainnya', NULL, '2021-09-22 08:14:20', '2021-09-22 08:14:20'),
(21, 1, '32091847236458', 'nita', 'belum', 'belum wajib', NULL, '32091679263487', 'cucu', 'perempuan', 'islam', 'tetap', '32091736298761', 'banten', '2021-07-07', NULL, 'lainnya', 'tunggal', 4, 'lainnya', '2300', '32', 'tidak/belum sekolah', 'belum masuk tk/kelompok bermain', 'belum/tidak bekerja', 'wni', NULL, NULL, NULL, '30981273649574', 'agus', '32098153846238', 'rita', NULL, NULL, '085298154826', 'rita@gmail.com', 'cirebon', 'banten', 'belum kawin', '39109826384612', '2021-08-11', NULL, NULL, 'O', 'TIDAK CACAT', 'tidak ada/tidak sakit', 'IUD', 'tidak/belum punya', NULL, '2021-09-22 08:18:35', '2021-09-22 08:18:35'),
(23, 1, '7777777777777777', 'firman chatomz', 'proses', 'sudah rekam', NULL, NULL, NULL, 'perempuan', 'kristen', 'pendatang', '547858758748735', 'garut', '2021-11-21', NULL, 'rumah', 'tunggal', 8, 'lainnya', NULL, NULL, 'strata II', 'sedang s-3/sederajat', 'guru', 'wna', '7438478374', NULL, NULL, '6564565465465464', 'asep', '4637463746376473', 'wiwin', NULL, NULL, '081322561697', 'life.chatomz@gmail.com', NULL, 'jalan gsr', 'kawin', NULL, NULL, NULL, NULL, 'A', 'cacat lainnya', 'tidak', 'kondom', 'bpjs penerima bantuan iuran', NULL, '2021-11-14 01:36:20', '2021-11-15 04:37:45'),
(24, 1, '5475487548574587', 'dewi firman', 'sudah', 'sudah rekam', NULL, NULL, NULL, 'perempuan', 'islam', 'tetap', NULL, 'garut', '1996-06-05', NULL, 'rumah', 'tunggal', 3, 'lainnya', NULL, NULL, 'diploma I/II', 'sedang slta/sederajat', 'perdagangan', 'wni', NULL, NULL, NULL, '4738743847347384', 'dedi', '4473847834928473', 'siti', NULL, NULL, NULL, NULL, NULL, 'jalan raya galunggung jeungjing', 'kawin', NULL, NULL, NULL, NULL, 'O', 'tidak', 'tidak', 'lainnya', 'lainnya', NULL, '2021-11-14 02:01:12', '2021-11-15 02:24:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penduduk_aduan`
--

CREATE TABLE `penduduk_aduan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notif` enum('aktif','non-aktif') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `penduduk_aduan`
--

INSERT INTO `penduduk_aduan` (`id`, `user_id`, `key`, `isi`, `created_at`, `updated_at`, `status`, `notif`) VALUES
(12, 12, 'nik', '7364938462537463', '2021-11-14 02:49:07', '2021-11-15 02:24:17', 'selesai', 'non-aktif'),
(13, 12, 'tgl_lahir', '15 januari 1995', '2021-11-14 03:04:28', '2021-11-15 02:24:25', 'selesai', 'aktif'),
(15, 12, 'status_ktp', 'sudah', '2021-11-15 02:28:07', '2021-11-15 02:34:32', 'selesai', 'aktif'),
(16, 12, 'jk', 'perempuan', '2021-11-15 02:37:44', '2021-11-15 02:38:39', 'selesai', 'aktif'),
(17, 12, 'agama', 'kristen', '2021-11-15 02:40:39', '2021-11-15 02:42:43', 'selesai', 'aktif'),
(18, 12, 'status_penduduk', 'saya pendatang', '2021-11-15 02:49:05', '2021-11-15 02:50:18', 'selesai', 'aktif'),
(20, 12, 'no_akta', '743874838487384', '2021-11-15 02:59:54', '2021-11-15 03:01:38', 'selesai', 'aktif'),
(21, 12, 'anak_ke', 'saya anak ke 8', '2021-11-15 03:02:44', '2021-11-15 03:05:47', 'selesai', 'aktif'),
(22, 12, 'pekerjaan', 'guru', '2021-11-15 03:07:17', '2021-11-15 03:09:52', 'selesai', 'aktif'),
(23, 12, 'nik_ayah', '74837847387483748', '2021-11-15 03:12:51', '2021-11-15 03:16:18', 'selesai', 'aktif'),
(24, 12, 'nik_ibu', '74837847387788748', '2021-11-15 03:16:50', '2021-11-15 03:17:02', 'selesai', 'aktif'),
(25, 12, 'no_telp', '081322561697', '2021-11-15 03:17:33', '2021-11-15 04:37:45', 'selesai', 'aktif'),
(26, 12, 'email', 'life.chatomz@gmail.com', '2021-11-15 03:24:34', '2021-11-15 04:14:41', 'selesai', 'aktif'),
(27, 12, 'nama_penduduk', 'firman chatomz', '2021-11-15 03:46:56', '2021-11-15 04:14:29', 'selesai', 'aktif'),
(28, 12, 'golongan_darah', 'A', '2021-11-15 04:17:32', '2021-11-15 04:17:55', 'selesai', 'aktif'),
(29, 12, 'nama_ayah', 'asep', '2021-11-15 04:18:43', '2021-11-15 04:18:57', 'selesai', 'aktif'),
(30, 12, 'nama_ibu', 'wiwin', '2021-11-15 04:19:23', '2021-11-15 04:19:39', 'selesai', 'aktif'),
(31, 12, 'cacat', 'lainnya', '2021-11-15 04:22:39', '2021-11-15 04:22:50', 'selesai', 'aktif'),
(32, 12, 'sakit_menahun', 'lainnya', '2021-11-15 04:24:25', '2021-11-15 04:24:48', 'selesai', 'aktif'),
(33, 12, 'akseptor_kb', 'kondom', '2021-11-15 04:26:50', '2021-11-15 04:27:20', 'selesai', 'aktif'),
(34, 12, 'asuransi', 'bjps', '2021-11-15 04:27:37', '2021-11-15 04:27:45', 'selesai', 'aktif'),
(35, 12, 'pendidikan_kk', 's1', '2021-11-15 04:29:35', '2021-11-15 04:30:11', 'selesai', 'aktif'),
(36, 12, 'pendidikan_tempuh', 's3', '2021-11-15 04:32:23', '2021-11-15 04:32:33', 'selesai', 'aktif'),
(37, 12, 'status_warganegara', 'WNA asing', '2021-11-15 04:34:21', '2021-11-15 04:34:32', 'selesai', 'aktif'),
(38, 12, 'nomor_paspor', '7438478374', '2021-11-15 04:35:11', '2021-11-15 04:35:20', 'selesai', 'aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penduduk_surat`
--

CREATE TABLE `penduduk_surat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `formatsurat_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_surat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keperluan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_awal` date DEFAULT NULL,
  `tgl_akhir` date DEFAULT NULL,
  `atas_nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `staf_pemerintahan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menjabat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tampilkan_poto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kepala_kk` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_kk` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rt_tujuan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rw_tujuan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dusun_tujuan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desa_tujuan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kecamatan_tujuan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kabupaten_tujuan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alasan_pindah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_pindah` date DEFAULT NULL,
  `jumlah_pengikut` int(11) DEFAULT NULL,
  `barang` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_identitas` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jk` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agama` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ketua_adat` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `perbedaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kartu_identitas` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rincian` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usaha` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_jamkesos` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hari_lahir` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `waktu_lahir` time DEFAULT NULL,
  `kelahiran_ke` int(11) DEFAULT NULL,
  `nama_ibu` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik_ibu` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `umur_ibu` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaan_ibu` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat_ibu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desa_ibu` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kec_ibu` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kab_ibu` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_ayah` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik_ayah` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `umur_ayah` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaan_ayah` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat_ayah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desa_ayah` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kec_ayah` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kab_ayah` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_pelapor` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik_pelapor` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `umur_pelapor` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaan_pelapor` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desa_pelapor` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kec_pelapor` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kab_pelapor` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prov_pelapor` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hub_pelapor` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir_pelapor` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir_pelapor` date DEFAULT NULL,
  `nama_saksi1` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik_saksi1` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir_saksi1` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir_saksi1` date DEFAULT NULL,
  `umur_saksi1` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaan_saksi1` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desa_saksi1` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kec_saksi1` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kab_saksi1` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prov_saksi1` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_saksi2` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik_saksi2` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir_saksi2` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir_saksi2` date DEFAULT NULL,
  `umur_saksi2` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaan_saksi2` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desa_saksi2` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kec_saksi2` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kab_saksi2` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prov_saksi2` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta_bantuan`
--

CREATE TABLE `peserta_bantuan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bantuan_id` bigint(20) UNSIGNED NOT NULL,
  `penduduk_id` bigint(20) UNSIGNED NOT NULL,
  `no_kartu` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_kartu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `potensi`
--

CREATE TABLE `potensi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_potensi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan_potensi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poto_potensi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dilihat` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `potensi`
--

INSERT INTO `potensi` (`id`, `nama_potensi`, `keterangan_potensi`, `poto_potensi`, `dilihat`, `created_at`, `updated_at`) VALUES
(2, 'Peternakan', 'bidang peternakan begitu banyak dan sangat lebih baik', '1631506370_8b74fa22d37e4b3b037c69e1720f6636.jpg', 3, '2021-09-13 04:12:50', '2021-09-13 05:18:05'),
(3, 'Pariwisata2', 'objek wisata begitu indah dan mempesona2', '1631506422_wisara.jpg', 0, '2021-09-13 04:13:42', '2021-11-02 02:37:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `potensi_sub`
--

CREATE TABLE `potensi_sub` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `potensi_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `potensi_sub`
--

INSERT INTO `potensi_sub` (`id`, `potensi_id`, `nama`, `gambar`, `detail`, `created_at`, `updated_at`) VALUES
(3, 2, 'padi', '1635820720_apple.png', 'fzczxcxzc', '2021-11-02 02:38:40', '2021-11-02 02:38:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lapak_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dilihat` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil`
--

CREATE TABLE `profil` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_desa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_desa` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_pos` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kepala_desa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip_kepaladesa` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telepon` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_kecamatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_kecamatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_camat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip_camat` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_kabupaten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_kabupaten` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_provinsi` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lambang_desa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kantor_desa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `titik_lat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `titik_lang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `profil`
--

INSERT INTO `profil` (`id`, `nama_desa`, `kode_desa`, `kode_pos`, `kepala_desa`, `nip_kepaladesa`, `alamat`, `email`, `telepon`, `website`, `nama_kecamatan`, `kode_kecamatan`, `nama_camat`, `nip_camat`, `nama_kabupaten`, `kode_kabupaten`, `provinsi`, `kode_provinsi`, `lambang_desa`, `kantor_desa`, `titik_lat`, `titik_lang`, `created_at`, `updated_at`) VALUES
(1, 'Puteran', '20051', '461581', 'firman setiawan1', '1200938473837483', 'Jalan raya Jeungjing Pelitaasih selaawi garut', 'pelitaasih@gmail.com', '0813225616971', 'https://www.youtube.com/', 'selaawi', '381', 'muhammad solihin', '2738293874837483', 'garut', '061', 'jawa barat', '321', '-', '-', '-', '-', NULL, '2021-11-12 07:41:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rt`
--

CREATE TABLE `rt` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rw_id` bigint(20) UNSIGNED NOT NULL,
  `nama_rt` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rt`
--

INSERT INTO `rt` (`id`, `rw_id`, `nama_rt`, `nik`, `created_at`, `updated_at`) VALUES
(1, 1, '002', '8273647362736489', '2021-03-23 20:26:00', '2021-10-26 04:12:54'),
(3, 1, '005', '4374826463246347', '2021-10-26 04:12:46', '2021-11-02 02:28:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rumah_tangga`
--

CREATE TABLE `rumah_tangga` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `penduduk_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nomor` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_daftar` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rw`
--

CREATE TABLE `rw` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dusun_id` bigint(20) UNSIGNED NOT NULL,
  `nama_rw` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rw`
--

INSERT INTO `rw` (`id`, `dusun_id`, `nama_rw`, `nik`, `created_at`, `updated_at`) VALUES
(1, 1, '001', '7777777777777777', '2021-03-23 20:04:06', '2021-11-02 02:09:41'),
(3, 1, 'RW 1', '7777777777777777', '2021-11-02 02:09:50', '2021-11-02 02:09:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('8TWx9OyNwzgChCKiDOYFC2unzlDJf4RhoasP3yw9', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYTVQWWFUNjh2R01UalVjTzRJd20zQzRxMFFJbXNxd3ZLWWdVZFB4SiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly9sb2NhbGhvc3QvY2lrYXJhc3R1ZGlvL3NpZGVzYSI7fX0=', 1637062806);

-- --------------------------------------------------------

--
-- Struktur dari tabel `slider`
--

CREATE TABLE `slider` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_slider` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('aktif','tidak aktif') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `slider`
--

INSERT INTO `slider` (`id`, `nama_slider`, `keterangan`, `gambar`, `link`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Desa Wisata menjadi daya tarik perekonomian Desa', 'keterangan singkat', '1637055788_puteran.png', NULL, 'aktif', '2021-09-10 04:17:33', '2021-11-16 09:43:08'),
(4, 'Suasana perkampungan', 'ok siap', '1637062426_ladang.jpg', NULL, 'aktif', '2021-09-10 04:18:00', '2021-11-16 11:33:46'),
(5, 'Petani mata pencaharian yang paling banyak', NULL, '1637062440_langit.jpg', NULL, 'aktif', '2021-09-10 04:18:27', '2021-11-16 11:34:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `staf`
--

CREATE TABLE `staf` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_pegawai` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nipd` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nip` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `golongan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nosk_pengangkatan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tglsk_pengangkatan` date DEFAULT NULL,
  `nosk_pemberhentian` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tglsk_pemberhentian` date DEFAULT NULL,
  `masa_jabatan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_pegawai` enum('aktif','tidak aktif') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `staf`
--

INSERT INTO `staf` (`id`, `nama_pegawai`, `nik`, `nipd`, `nip`, `tempat_lahir`, `tgl_lahir`, `jk`, `pendidikan`, `agama`, `golongan`, `nosk_pengangkatan`, `tglsk_pengangkatan`, `nosk_pemberhentian`, `tglsk_pemberhentian`, `masa_jabatan`, `jabatan`, `status_pegawai`, `created_at`, `updated_at`, `photo`) VALUES
(2, 'agung', '123456789123456', '46376476', '35463564', 'tasikmalaya', '2021-03-02', 'perempuan', 'sltp/sederajat', 'katholik', 'I', NULL, NULL, NULL, NULL, '2 tahun', 'kepala desa', 'aktif', '2021-03-17 21:24:05', '2021-10-27 07:00:27', '1635318027_Logo_PU_(RGB).jpg'),
(3, 'gugun gunawan', '8473847387493748', NULL, NULL, 'garut', '2021-10-14', 'laki-laki', 'tamat sd/sederajat', 'islam', '3', NULL, NULL, NULL, NULL, '3', 'sekertaris desa', 'aktif', '2021-10-27 07:07:31', '2021-10-27 07:07:31', '1635318451__DSC0323.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `suplemen`
--

CREATE TABLE `suplemen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sasaran` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_suplemen` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan_suplemen` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `suplemen`
--

INSERT INTO `suplemen` (`id`, `sasaran`, `nama_suplemen`, `keterangan_suplemen`, `created_at`, `updated_at`) VALUES
(1, 'keluarga / kk', 'cikara3', 'kumpulan aneh3', '2021-03-16 21:01:42', '2021-03-16 21:28:34'),
(2, 'keluarga / kk', 'bantuan', 'PDH kuyy', '2021-03-16 21:01:58', '2021-03-16 21:01:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `syarat_surat`
--

CREATE TABLE `syarat_surat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `penduduksurat_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `level`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'firman setiawan', 'cikarastudio@gmail.com', 'admin', NULL, '$2y$10$K0NgF.O1bfn8p4fx67QvzOyG9nIfZNYWR9BNl0NXYjEqQbvdIuiBu', NULL, NULL, NULL, NULL, '1635388827_vera.jpg', '2021-02-01 23:03:50', '2021-10-28 02:40:27'),
(12, '5453454353454354', 'firman@gmail.com', 'penduduk', NULL, '$2y$10$K54Fyfj9wWTRh3w8Csgbw.CgTu3p.jrsFhwuYNX3KwaVHWMij1iTK', NULL, NULL, NULL, NULL, NULL, '2021-11-14 01:41:21', '2021-11-14 01:41:21'),
(14, '5475487548574587', 'dewi@gmail.com', 'penduduk', NULL, '$2y$10$1G1VCAdCoG5j.2eTfVBjf.PFHqbye3vtqjHGTDosxLaWR1pXgIP9S', NULL, NULL, NULL, NULL, NULL, '2021-11-14 02:01:58', '2021-11-14 02:01:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_akses`
--

CREATE TABLE `user_akses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `penduduk_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `user_akses`
--

INSERT INTO `user_akses` (`id`, `user_id`, `penduduk_id`, `created_at`, `updated_at`) VALUES
(3, 12, 23, '2021-11-14 01:41:21', '2021-11-14 01:41:21'),
(4, 14, 24, '2021-11-14 02:01:58', '2021-11-14 02:01:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vaksinasi`
--

CREATE TABLE `vaksinasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `penduduk_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_vaksin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dosis` int(11) NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `vaksinasi`
--

INSERT INTO `vaksinasi` (`id`, `kategori_id`, `penduduk_id`, `tanggal_vaksin`, `dosis`, `keterangan`, `created_at`, `updated_at`) VALUES
(4, 4, 23, '2021-11-15', 1, 'ok mantap', '2021-11-15 07:37:29', '2021-11-15 07:37:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `visitor`
--

CREATE TABLE `visitor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `browser` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_visitor` date NOT NULL,
  `hits` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `visitor`
--

INSERT INTO `visitor` (`id`, `ip_address`, `browser`, `tgl_visitor`, `hits`, `created_at`, `updated_at`) VALUES
(1, '::1', 'Chrome', '2021-09-10', 190, '2021-09-09 18:40:35', '2021-09-10 10:12:32'),
(2, '::1', 'Chrome', '2021-09-13', 84, '2021-09-13 01:11:13', '2021-09-13 12:29:24'),
(3, '::1', 'Chrome', '2021-09-14', 78, '2021-09-13 21:59:45', '2021-09-14 06:08:51'),
(4, '::1', 'Chrome', '2021-09-15', 16, '2021-09-15 05:10:39', '2021-09-15 06:00:34'),
(5, '::1', 'Chrome', '2021-09-17', 4, '2021-09-17 06:42:35', '2021-09-17 08:19:08'),
(6, '::1', 'Chrome', '2021-09-21', 12, '2021-09-21 07:44:34', '2021-09-21 09:27:03'),
(7, '::1', 'Chrome', '2021-09-23', 23, '2021-09-23 07:43:50', '2021-09-23 09:57:34'),
(8, '::1', 'Chrome', '2021-09-24', 1, '2021-09-24 05:41:09', '2021-09-24 05:41:09'),
(9, '::1', 'Chrome', '2021-09-29', 6, '2021-09-29 09:25:26', '2021-09-29 10:14:05'),
(10, '::1', 'Chrome', '2021-09-30', 3, '2021-09-30 02:08:06', '2021-09-30 02:46:13'),
(11, '::1', 'Chrome', '2021-10-01', 1, '2021-10-01 09:56:46', '2021-10-01 09:56:46'),
(12, '::1', 'Chrome', '2021-10-14', 1, '2021-10-14 04:41:16', '2021-10-14 04:41:16'),
(13, '::1', 'Chrome', '2021-10-26', 10, '2021-10-26 02:38:31', '2021-10-26 09:23:40'),
(14, '::1', 'Chrome', '2021-10-27', 12, '2021-10-27 04:22:41', '2021-10-27 09:52:08'),
(15, '::1', 'Chrome', '2021-10-28', 12, '2021-10-28 01:12:13', '2021-10-28 09:35:07'),
(16, '::1', 'Chrome', '2021-10-29', 4, '2021-10-29 02:39:26', '2021-10-29 10:10:06'),
(17, '::1', 'Chrome', '2021-11-01', 2, '2021-11-01 01:18:07', '2021-11-01 01:19:49'),
(18, '::1', 'Chrome', '2021-11-01', 1, '2021-11-01 01:18:07', '2021-11-01 01:18:07'),
(19, '::1', 'Chrome', '2021-11-02', 1, '2021-11-02 01:21:27', '2021-11-02 01:21:27'),
(20, '::1', 'Chrome', '2021-11-03', 2, '2021-11-02 22:42:53', '2021-11-02 23:20:13'),
(21, '::1', 'Chrome', '2021-11-04', 1, '2021-11-04 00:42:54', '2021-11-04 00:42:54'),
(22, '::1', 'Chrome', '2021-11-10', 3, '2021-11-10 07:21:27', '2021-11-10 10:46:44'),
(23, '::1', 'Chrome', '2021-11-11', 2, '2021-11-11 11:00:37', '2021-11-11 11:20:26'),
(24, '::1', 'Chrome', '2021-11-12', 9, '2021-11-12 04:34:02', '2021-11-12 07:52:02'),
(25, '127.0.0.1', 'Chrome', '2021-11-15', 1, '2021-11-15 01:08:34', '2021-11-15 01:08:34'),
(26, '::1', 'Chrome', '2021-11-15', 2, '2021-11-15 04:37:59', '2021-11-15 13:37:32'),
(27, '::1', 'Chrome', '2021-11-16', 14, '2021-11-16 09:04:54', '2021-11-16 11:40:06');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota_kelompok`
--
ALTER TABLE `anggota_kelompok`
  ADD PRIMARY KEY (`id`),
  ADD KEY `anggota_kelompok_kelompok_id_foreign` (`kelompok_id`),
  ADD KEY `anggota_kelompok_penduduk_id_foreign` (`penduduk_id`);

--
-- Indeks untuk tabel `anggota_keluarga`
--
ALTER TABLE `anggota_keluarga`
  ADD PRIMARY KEY (`id`),
  ADD KEY `anggota_keluarga_keluarga_id_foreign` (`keluarga_id`),
  ADD KEY `anggota_keluarga_penduduk_id_foreign` (`penduduk_id`);

--
-- Indeks untuk tabel `anggota_rumah_tangga`
--
ALTER TABLE `anggota_rumah_tangga`
  ADD PRIMARY KEY (`id`),
  ADD KEY `anggota_rumah_tangga_rumahtangga_id_foreign` (`rumahtangga_id`),
  ADD KEY `anggota_rumah_tangga_penduduk_id_foreign` (`penduduk_id`);

--
-- Indeks untuk tabel `anggota_suplemen`
--
ALTER TABLE `anggota_suplemen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `anggota_suplemen_suplemen_id_foreign` (`suplemen_id`),
  ADD KEY `anggota_suplemen_penduduk_id_foreign` (`penduduk_id`);

--
-- Indeks untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artikel_user_id_foreign` (`user_id`),
  ADD KEY `artikel_kategoriartikel_id_foreign` (`kategoriartikel_id`);

--
-- Indeks untuk tabel `bantuan`
--
ALTER TABLE `bantuan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `covid`
--
ALTER TABLE `covid`
  ADD PRIMARY KEY (`id`),
  ADD KEY `covid_penduduk_id_foreign` (`penduduk_id`);

--
-- Indeks untuk tabel `data_syarat_surat`
--
ALTER TABLE `data_syarat_surat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dusun`
--
ALTER TABLE `dusun`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `format_surat`
--
ALTER TABLE `format_surat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `format_surat_klasifikasisurat_id_foreign` (`klasifikasisurat_id`);

--
-- Indeks untuk tabel `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `forum_diskusi`
--
ALTER TABLE `forum_diskusi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `forum_diskusi_user_id_foreign` (`user_id`),
  ADD KEY `forum_diskusi_forum_id_foreign` (`forum_id`);

--
-- Indeks untuk tabel `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `galeri_photo`
--
ALTER TABLE `galeri_photo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `galeri_photo_galeri_id_foreign` (`galeri_id`);

--
-- Indeks untuk tabel `informasi_publik`
--
ALTER TABLE `informasi_publik`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `info_website`
--
ALTER TABLE `info_website`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `inventaris`
--
ALTER TABLE `inventaris`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori_artikel`
--
ALTER TABLE `kategori_artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori_kelompok`
--
ALTER TABLE `kategori_kelompok`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelompok`
--
ALTER TABLE `kelompok`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelompok_kategorikelompok_id_foreign` (`kategorikelompok_id`),
  ADD KEY `kelompok_penduduk_id_foreign` (`penduduk_id`);

--
-- Indeks untuk tabel `keluarga`
--
ALTER TABLE `keluarga`
  ADD PRIMARY KEY (`id`),
  ADD KEY `keluarga_penduduk_id_foreign` (`penduduk_id`);

--
-- Indeks untuk tabel `klasifikasi_surat`
--
ALTER TABLE `klasifikasi_surat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ks`
--
ALTER TABLE `ks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lapak`
--
ALTER TABLE `lapak`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lapak_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `lapor`
--
ALTER TABLE `lapor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lapor_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `members_email_unique` (`email`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pemudik`
--
ALTER TABLE `pemudik`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penduduk`
--
ALTER TABLE `penduduk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penduduk_rt_id_foreign` (`rt_id`);

--
-- Indeks untuk tabel `penduduk_aduan`
--
ALTER TABLE `penduduk_aduan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penduduk_aduan_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `penduduk_surat`
--
ALTER TABLE `penduduk_surat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penduduk_surat_formatsurat_id_foreign` (`formatsurat_id`),
  ADD KEY `user ke surat` (`user_id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `peserta_bantuan`
--
ALTER TABLE `peserta_bantuan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `peserta_bantuan_bantuan_id_foreign` (`bantuan_id`),
  ADD KEY `peserta_bantuan_penduduk_id_foreign` (`penduduk_id`);

--
-- Indeks untuk tabel `potensi`
--
ALTER TABLE `potensi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `potensi_sub`
--
ALTER TABLE `potensi_sub`
  ADD PRIMARY KEY (`id`),
  ADD KEY `potensi_sub_potensi_id_foreign` (`potensi_id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produk_lapak_id_foreign` (`lapak_id`);

--
-- Indeks untuk tabel `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rt`
--
ALTER TABLE `rt`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rt_rw_id_foreign` (`rw_id`);

--
-- Indeks untuk tabel `rumah_tangga`
--
ALTER TABLE `rumah_tangga`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rumah_tangga_penduduk_id_foreign` (`penduduk_id`);

--
-- Indeks untuk tabel `rw`
--
ALTER TABLE `rw`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rw_dusun_id_foreign` (`dusun_id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `staf`
--
ALTER TABLE `staf`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `suplemen`
--
ALTER TABLE `suplemen`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `syarat_surat`
--
ALTER TABLE `syarat_surat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `syarat_surat_penduduksurat_id_foreign` (`penduduksurat_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `user_akses`
--
ALTER TABLE `user_akses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_akses_user_id_foreign` (`user_id`),
  ADD KEY `user_akses_penduduk_id_foreign` (`penduduk_id`);

--
-- Indeks untuk tabel `vaksinasi`
--
ALTER TABLE `vaksinasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vaksinasi_penduduk_id_foreign` (`penduduk_id`),
  ADD KEY `vaksinasi_kategori_id_foreign` (`kategori_id`);

--
-- Indeks untuk tabel `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggota_kelompok`
--
ALTER TABLE `anggota_kelompok`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `anggota_keluarga`
--
ALTER TABLE `anggota_keluarga`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `anggota_rumah_tangga`
--
ALTER TABLE `anggota_rumah_tangga`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `anggota_suplemen`
--
ALTER TABLE `anggota_suplemen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `bantuan`
--
ALTER TABLE `bantuan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `covid`
--
ALTER TABLE `covid`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `data_syarat_surat`
--
ALTER TABLE `data_syarat_surat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `dusun`
--
ALTER TABLE `dusun`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `format_surat`
--
ALTER TABLE `format_surat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `forum`
--
ALTER TABLE `forum`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `forum_diskusi`
--
ALTER TABLE `forum_diskusi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `galeri_photo`
--
ALTER TABLE `galeri_photo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `informasi_publik`
--
ALTER TABLE `informasi_publik`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `info_website`
--
ALTER TABLE `info_website`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `inventaris`
--
ALTER TABLE `inventaris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kategori_artikel`
--
ALTER TABLE `kategori_artikel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kategori_kelompok`
--
ALTER TABLE `kategori_kelompok`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kelompok`
--
ALTER TABLE `kelompok`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `keluarga`
--
ALTER TABLE `keluarga`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `klasifikasi_surat`
--
ALTER TABLE `klasifikasi_surat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2335;

--
-- AUTO_INCREMENT untuk tabel `ks`
--
ALTER TABLE `ks`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2335;

--
-- AUTO_INCREMENT untuk tabel `lapak`
--
ALTER TABLE `lapak`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `lapor`
--
ALTER TABLE `lapor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT untuk tabel `pemudik`
--
ALTER TABLE `pemudik`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `penduduk`
--
ALTER TABLE `penduduk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `penduduk_aduan`
--
ALTER TABLE `penduduk_aduan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `penduduk_surat`
--
ALTER TABLE `penduduk_surat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `peserta_bantuan`
--
ALTER TABLE `peserta_bantuan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `potensi`
--
ALTER TABLE `potensi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `potensi_sub`
--
ALTER TABLE `potensi_sub`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `profil`
--
ALTER TABLE `profil`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `rt`
--
ALTER TABLE `rt`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `rumah_tangga`
--
ALTER TABLE `rumah_tangga`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `rw`
--
ALTER TABLE `rw`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `slider`
--
ALTER TABLE `slider`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `staf`
--
ALTER TABLE `staf`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `suplemen`
--
ALTER TABLE `suplemen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `syarat_surat`
--
ALTER TABLE `syarat_surat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `user_akses`
--
ALTER TABLE `user_akses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `vaksinasi`
--
ALTER TABLE `vaksinasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `visitor`
--
ALTER TABLE `visitor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `anggota_kelompok`
--
ALTER TABLE `anggota_kelompok`
  ADD CONSTRAINT `anggota_kelompok_kelompok_id_foreign` FOREIGN KEY (`kelompok_id`) REFERENCES `kelompok` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `anggota_kelompok_penduduk_id_foreign` FOREIGN KEY (`penduduk_id`) REFERENCES `penduduk` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `anggota_keluarga`
--
ALTER TABLE `anggota_keluarga`
  ADD CONSTRAINT `anggota_keluarga_keluarga_id_foreign` FOREIGN KEY (`keluarga_id`) REFERENCES `keluarga` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `anggota_keluarga_penduduk_id_foreign` FOREIGN KEY (`penduduk_id`) REFERENCES `penduduk` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `anggota_rumah_tangga`
--
ALTER TABLE `anggota_rumah_tangga`
  ADD CONSTRAINT `anggota_rumah_tangga_penduduk_id_foreign` FOREIGN KEY (`penduduk_id`) REFERENCES `penduduk` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `anggota_rumah_tangga_rumahtangga_id_foreign` FOREIGN KEY (`rumahtangga_id`) REFERENCES `rumah_tangga` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `anggota_suplemen`
--
ALTER TABLE `anggota_suplemen`
  ADD CONSTRAINT `anggota_suplemen_penduduk_id_foreign` FOREIGN KEY (`penduduk_id`) REFERENCES `penduduk` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `anggota_suplemen_suplemen_id_foreign` FOREIGN KEY (`suplemen_id`) REFERENCES `suplemen` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD CONSTRAINT `artikel_kategoriartikel_id_foreign` FOREIGN KEY (`kategoriartikel_id`) REFERENCES `kategori_artikel` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `artikel_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `covid`
--
ALTER TABLE `covid`
  ADD CONSTRAINT `covid_penduduk_id_foreign` FOREIGN KEY (`penduduk_id`) REFERENCES `penduduk` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `format_surat`
--
ALTER TABLE `format_surat`
  ADD CONSTRAINT `format_surat_klasifikasisurat_id_foreign` FOREIGN KEY (`klasifikasisurat_id`) REFERENCES `klasifikasi_surat` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `forum_diskusi`
--
ALTER TABLE `forum_diskusi`
  ADD CONSTRAINT `forum_diskusi_forum_id_foreign` FOREIGN KEY (`forum_id`) REFERENCES `forum` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `forum_diskusi_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `galeri_photo`
--
ALTER TABLE `galeri_photo`
  ADD CONSTRAINT `galeri_photo_galeri_id_foreign` FOREIGN KEY (`galeri_id`) REFERENCES `galeri` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kelompok`
--
ALTER TABLE `kelompok`
  ADD CONSTRAINT `kelompok_kategorikelompok_id_foreign` FOREIGN KEY (`kategorikelompok_id`) REFERENCES `kategori_kelompok` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kelompok_penduduk_id_foreign` FOREIGN KEY (`penduduk_id`) REFERENCES `penduduk` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `keluarga`
--
ALTER TABLE `keluarga`
  ADD CONSTRAINT `keluarga_penduduk_id_foreign` FOREIGN KEY (`penduduk_id`) REFERENCES `penduduk` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `lapak`
--
ALTER TABLE `lapak`
  ADD CONSTRAINT `lapak_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `lapor`
--
ALTER TABLE `lapor`
  ADD CONSTRAINT `lapor_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penduduk`
--
ALTER TABLE `penduduk`
  ADD CONSTRAINT `penduduk_rt_id_foreign` FOREIGN KEY (`rt_id`) REFERENCES `rt` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penduduk_aduan`
--
ALTER TABLE `penduduk_aduan`
  ADD CONSTRAINT `penduduk_aduan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penduduk_surat`
--
ALTER TABLE `penduduk_surat`
  ADD CONSTRAINT `penduduk_surat_formatsurat_id_foreign` FOREIGN KEY (`formatsurat_id`) REFERENCES `format_surat` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user ke surat` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `peserta_bantuan`
--
ALTER TABLE `peserta_bantuan`
  ADD CONSTRAINT `peserta_bantuan_bantuan_id_foreign` FOREIGN KEY (`bantuan_id`) REFERENCES `bantuan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `peserta_bantuan_penduduk_id_foreign` FOREIGN KEY (`penduduk_id`) REFERENCES `penduduk` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `potensi_sub`
--
ALTER TABLE `potensi_sub`
  ADD CONSTRAINT `potensi_sub_potensi_id_foreign` FOREIGN KEY (`potensi_id`) REFERENCES `potensi` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_lapak_id_foreign` FOREIGN KEY (`lapak_id`) REFERENCES `lapak` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `rt`
--
ALTER TABLE `rt`
  ADD CONSTRAINT `rt_rw_id_foreign` FOREIGN KEY (`rw_id`) REFERENCES `rw` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `rumah_tangga`
--
ALTER TABLE `rumah_tangga`
  ADD CONSTRAINT `rumah_tangga_penduduk_id_foreign` FOREIGN KEY (`penduduk_id`) REFERENCES `penduduk` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `rw`
--
ALTER TABLE `rw`
  ADD CONSTRAINT `rw_dusun_id_foreign` FOREIGN KEY (`dusun_id`) REFERENCES `dusun` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `syarat_surat`
--
ALTER TABLE `syarat_surat`
  ADD CONSTRAINT `syarat_surat_penduduksurat_id_foreign` FOREIGN KEY (`penduduksurat_id`) REFERENCES `penduduk` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user_akses`
--
ALTER TABLE `user_akses`
  ADD CONSTRAINT `user_akses_penduduk_id_foreign` FOREIGN KEY (`penduduk_id`) REFERENCES `penduduk` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_akses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `vaksinasi`
--
ALTER TABLE `vaksinasi`
  ADD CONSTRAINT `vaksinasi_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `vaksinasi_penduduk_id_foreign` FOREIGN KEY (`penduduk_id`) REFERENCES `penduduk` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
