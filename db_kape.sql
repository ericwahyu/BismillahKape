-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Jun 2021 pada 09.20
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kape`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `aslab`
--

CREATE TABLE `aslab` (
  `id_aslab` int(11) NOT NULL,
  `id_kategori_aslab` int(11) NOT NULL,
  `foto_aslab` text NOT NULL,
  `nama_aslab` varchar(100) NOT NULL,
  `tahun_angkatan` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `aslab`
--

INSERT INTO `aslab` (`id_aslab`, `id_kategori_aslab`, `foto_aslab`, `nama_aslab`, `tahun_angkatan`) VALUES
(4, 1, '60cae8765a274.COVER.jpg', 'Eric Wa', 2018),
(5, 2, '60cae92c6fc48.Capture1.PNG', 'Fernanda Putra Aditya', 2018);

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `id_kategori_berita` int(11) NOT NULL,
  `judul_berita` varchar(100) NOT NULL,
  `gambar_berita` varchar(100) NOT NULL,
  `tanggalpost_berita` date NOT NULL,
  `konten_berita` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id_berita`, `id_kategori_berita`, `judul_berita`, `gambar_berita`, `tanggalpost_berita`, `konten_berita`) VALUES
(4, 2, 'Pelantikan Aslab LAB RPL 2018', '60c0bf5d86e04.IMG-20191114-WA0003[1].jpg', '2021-06-09', '<p><strong>Pelantikan Aslab Laboratorium Rekayasa Perangkat Lunak</strong></p><p>dengan pertemuan dari Kepala LAB RPL dan beberapa alumni aslab RPL</p>'),
(6, 1, 'Makan makan Aslab', '60c0c07001c36.IMG-20210609-WA0010[1].jpg', '2021-06-09', '<p><strong>Makan-makan para alumni aslab rekayasa perangkat lunak&nbsp;</strong></p>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `gallery`
--

CREATE TABLE `gallery` (
  `id_gallery` int(11) NOT NULL,
  `id_kategori_gallery` int(11) NOT NULL,
  `caption_gallery` varchar(100) NOT NULL,
  `gambar_gallery` varchar(100) NOT NULL,
  `tanggal_gallery` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gallery`
--

INSERT INTO `gallery` (`id_gallery`, `id_kategori_gallery`, `caption_gallery`, `gambar_gallery`, `tanggal_gallery`) VALUES
(1, 1, 'makan-makan para alumni aslab', '60c0c0b052d0e.IMG-20210609-WA0010[1].jpg', '2021-06-09'),
(7, 1, 'makan-makan para alumni aslab part 2', '60c0c0c933548.IMG-20210609-WA0010[1].jpg', '2021-06-10'),
(9, 1, 'makan-makan para alumni aslab part 3', '60c0c0df81424.IMG-20210609-WA0010[1].jpg', '2021-06-11'),
(10, 1, 'makan-makan para alumni aslab part 4', '60c0c1aab5c08.IMG-20210203-WA0012[1].jpg', '2021-06-12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `halaman`
--

CREATE TABLE `halaman` (
  `id_halaman` int(11) NOT NULL,
  `gambar_halaman` varchar(100) NOT NULL,
  `judul_halaman` varchar(100) NOT NULL,
  `tanggalpost_halaman` date NOT NULL,
  `konten_halaman` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `halaman`
--

INSERT INTO `halaman` (`id_halaman`, `gambar_halaman`, `judul_halaman`, `tanggalpost_halaman`, `konten_halaman`) VALUES
(10, '60c0c132a1a71.IMG-20210203-WA0008[1].jpg', 'Makan makan Aslab', '2021-06-09', '<p>Makan-makan setelah rapat soal modul 1</p>'),
(14, '60c0c1691ec5e.IMG-20210203-WA0012[1].jpg', 'Makan makan Aslab', '2021-06-09', '<p>Makan-makan setelah rapat soal modul 2</p>'),
(16, '60c0d20ea08c6.IMG-20210609-WA0010[1].jpg', 'Makan makan Aslab', '2021-06-13', '<p>Makan-makan setelah rapat soal modul 3</p>'),
(18, '60c8cf41c0916.COVER.jpg', 'Eric WA', '2021-06-15', '<p>Saya Bangga</p>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_aslab`
--

CREATE TABLE `kategori_aslab` (
  `id_kategori_aslab` int(11) NOT NULL,
  `kategori_aslab` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori_aslab`
--

INSERT INTO `kategori_aslab` (`id_kategori_aslab`, `kategori_aslab`) VALUES
(1, 'alumni'),
(2, 'aslab aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_berita`
--

CREATE TABLE `kategori_berita` (
  `id_kategori_berita` int(11) NOT NULL,
  `nama_kategori_berita` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori_berita`
--

INSERT INTO `kategori_berita` (`id_kategori_berita`, `nama_kategori_berita`) VALUES
(1, 'Pertemuan para Aslab'),
(2, 'Pelantikan Aslab LAB RPL');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_gallery`
--

CREATE TABLE `kategori_gallery` (
  `id_kategori_gallery` int(11) NOT NULL,
  `nama_kategori_gallery` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori_gallery`
--

INSERT INTO `kategori_gallery` (`id_kategori_gallery`, `nama_kategori_gallery`) VALUES
(1, 'Mukbang'),
(5, 'alumni'),
(6, 'aslab aktif');

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
(2, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Eric WA', 'ericwa', 'ericwahyu19@gmail.com', '2021-05-10 13:54:07', '123', NULL, NULL, NULL),
(3, 'wahyu wah', 'wahyuwa', 'erickwahyu19@gmail.com', NULL, '1234', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `aslab`
--
ALTER TABLE `aslab`
  ADD PRIMARY KEY (`id_aslab`);

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD KEY `fk_kategori_berita` (`id_kategori_berita`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id_gallery`),
  ADD KEY `fk_kategori_gallery` (`id_kategori_gallery`);

--
-- Indeks untuk tabel `halaman`
--
ALTER TABLE `halaman`
  ADD PRIMARY KEY (`id_halaman`);

--
-- Indeks untuk tabel `kategori_aslab`
--
ALTER TABLE `kategori_aslab`
  ADD PRIMARY KEY (`id_kategori_aslab`);

--
-- Indeks untuk tabel `kategori_berita`
--
ALTER TABLE `kategori_berita`
  ADD PRIMARY KEY (`id_kategori_berita`);

--
-- Indeks untuk tabel `kategori_gallery`
--
ALTER TABLE `kategori_gallery`
  ADD PRIMARY KEY (`id_kategori_gallery`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `aslab`
--
ALTER TABLE `aslab`
  MODIFY `id_aslab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id_gallery` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `halaman`
--
ALTER TABLE `halaman`
  MODIFY `id_halaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `kategori_aslab`
--
ALTER TABLE `kategori_aslab`
  MODIFY `id_kategori_aslab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kategori_berita`
--
ALTER TABLE `kategori_berita`
  MODIFY `id_kategori_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `kategori_gallery`
--
ALTER TABLE `kategori_gallery`
  MODIFY `id_kategori_gallery` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `fk_kategori_berita` FOREIGN KEY (`id_kategori_berita`) REFERENCES `kategori_berita` (`id_kategori_berita`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `fk_kategori_gallery` FOREIGN KEY (`id_kategori_gallery`) REFERENCES `kategori_gallery` (`id_kategori_gallery`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
