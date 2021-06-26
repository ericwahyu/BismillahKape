-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Jun 2021 pada 08.56
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
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `id_kategori_anggota` int(11) NOT NULL,
  `foto_anggota` text NOT NULL,
  `nama_anggota` varchar(100) NOT NULL,
  `jabatan_anggota` varchar(100) NOT NULL,
  `tahun_angkatan` year(4) NOT NULL,
  `pekerjaan_anggota` varchar(100) NOT NULL,
  `pesankesan_anggota` text NOT NULL,
  `name_instagram` varchar(100) NOT NULL,
  `name_facebook` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `id_kategori_anggota`, `foto_anggota`, `nama_anggota`, `jabatan_anggota`, `tahun_angkatan`, `pekerjaan_anggota`, `pesankesan_anggota`, `name_instagram`, `name_facebook`) VALUES
(8, 1, '60ceb4749ccf6.+62 858-9436-4025 20190722_003201 - Katsrur Rizqi Aviva.jpg', 'Katsrur Rizqi Aviva', 'Asisten laboratorium', 2015, 'Bekerja bidang IT-Technical Writer', 'menambah ilmu dan menambah pengalaman berorganisasi', '', ''),
(9, 1, '60ceb49861865.20200809_163121 - Tri Swasono Himawan.jpg', 'Tri Swasono Himawan', 'Asisten laboratorium', 2013, 'Staff Operasional', 'Asik, menantang, belajar hal-hal baru diluar edukasi perkuliahan. Lebih perbarui soal hardware, biar dapat bereksperimen lebih. Terima kasih', '', ''),
(10, 1, '60ceb7df33e21.IMG_20210511_130342 - Bagus Eko.jpg', 'Bagus Eko Prasetyo', 'Admin Lab', 2019, 'Programmer di Pusat Sistem Informasi ITATS', 'Semangat Menikmati Proses Belajar, Terkadang Indomie yang katanya instan nyatanya juga memerlukan beberapa proses. ', '', ''),
(11, 1, '60cebb6db8990.IMG_20151114_152347 - Muhammad Rifqi Arifandi.jpg', 'Muhammad Rifqi Arifandi', 'Asisten laboratorium', 2013, 'Merintis usaha WiFi', 'Pesan : banyak mencari ilmu, Kesan : amazing', '', ''),
(12, 2, '60d31a6a23982.IMG20210601161617_mh1622566231559_mr1622569613385_1_-removebg-preview.png', 'Fernanda Putra aditya', 'Asisten laboratorium', 2018, 'Fokus kuliah dengan segala laporan dan project, dan sedang bekerja di Snack Bowl Surabaya', 'Pesan : Untuk aslab periode berikutnya, semoga lebih baik dalam mengelola sistem di dalam Lab. RPL serta melaksanakan tugas dengan baik dan semoga Lab. RPL bisa lebih baik lagi dalam hal sistem praktikum dan pengelolaan infrastruktur di dalam Lab. RPL Kesan : To be honored menjadi asisten lab apalagi menjadi Asisten Lab. RPL. Proud of my self, karena bisa melaksanakan tugas dengan baik dan juga untuk teman teman aslab se periode sangat mantappu jiwa. Terimakasih untuk 2 periode yang sudah dilalui dengan sangat baik. Aku sayang kalian.', 'putraadityafernanda', ''),
(13, 2, '60d318b6520a5.WhatsApp_Image_2021-06-19_at_23.24.19_-_Michael-removebg-preview.png', 'Michael Araona Wily', 'Koordinator Laboratorium', 2018, 'KP,KKN,Kerja , dll', 'Menyenangkan', '', ''),
(14, 1, '60d31fd6167b0.IMG_20200823_110701 - Tommy Ferdian Hadimarta.jpg', 'Tommy Ferdian Hadimarta', 'Asisten laboratorium', 2014, 'Software Engginer', 'Senang bisa sharing ilmu dan punya banyak kenalan', '', ''),
(15, 1, '60d3203b1d284.20201202_123229 - moch irfan.jpg', 'Moch. Irfan Chanafi', 'Asisten laboratorium', 2015, 'STAFF IT', 'Alhamdulillah bermanfaat', '', ''),
(16, 2, '60d3212c1af5f.20181008_070736 - Sita Fara Yunanda.jpg', 'Sita Fara Yunanda', 'Asisten laboratorium', 2018, '', '', '', ''),
(17, 2, '60d4867fae06a.Odila_Untuk lab - Odila Windy Astuti Halimaking.png', 'Odila Windy Astuti Halimaking', 'Asisten laboratorium', 2018, 'Mahasiswa Akhir ', 'Menjadi Aslab Bukan untuk balas dendam Tetapi Menjadikan lebih baik dari praktikum sebelumnya. ', '', '');

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
(4, 1, 'Praktikum Pemrograman Berbasis Objek', '60c0bf5d86e04.IMG-20191114-WA0003[1].jpg', '2021-06-19', '<p><strong>Pelaksanaan Praktikum Pemrograman Berbasis Objek Periode VI</strong></p><p>praktikum akan di laksanakan pada tanggal 30 juni 2021, praktikum dilakukan di Laboratorium Rekayasa Perangkat Lunak&nbsp;</p><p>&nbsp;</p>'),
(6, 2, 'Praktikum Basis Data', '60c0c07001c36.IMG-20210609-WA0010[1].jpg', '2021-07-30', '<p><strong>Pelaksanaan Praktikum Basis Data&nbsp;Periode V</strong></p><p>praktikum akan di laksanakan pada tanggal 3&nbsp;maret&nbsp;2022, praktikum dilakukan di Laboratorium Rekayasa Perangkat Lunak&nbsp;</p>');

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
  `tanggal_gallery` date NOT NULL,
  `deskripsi_gallery` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gallery`
--

INSERT INTO `gallery` (`id_gallery`, `id_kategori_gallery`, `caption_gallery`, `gambar_gallery`, `tanggal_gallery`, `deskripsi_gallery`) VALUES
(1, 10, 'Persiapan pelaksanan webinar relasi antar objek pada OOP', '60cea2a0b068d.IMG-20201117-WA0031[2].jpg', '2021-02-09', 'Persiapan webinar bertujuan untuk para praktikan yang mengikuti praktikum Pemrograman Berbasis Objek lebih mengerti macam-macam dan kegunaan relasi antar objek pada OOP  '),
(9, 8, 'Makan-makan setelah mengadakan rapat pembahasan soal praktikum pemrograman berbasis objek', '60cea0dcb851f.IMG-20210203-WA0012[1].jpg', '2021-03-10', 'menyelesaikan rapat pembahasan soal praktikum dan metode penilaian praktikum'),
(10, 1, 'Liburan ke pantai Pasir Putih Kediri setelah selesai pelaksanaan praktikum Pemrograman Berbasis Obje', '60cea32581660.IMG-20210619-WA0011[1].jpg', '2021-04-11', 'Liburan para Asisten lab setelah menyelesaikan pelaksanaan praktikum PBO'),
(11, 7, 'Buka bersama seluruh Aslab Teknik Informatika Itats ', '60cea3907169a.IMG-20210619-WA0012[1].jpg', '2021-04-12', 'Menjalankan berbuka puasa bersama diikuti oleh kepala asisten laboratorium bahasa pemrograman, rpl, dan jarkom. '),
(12, 9, 'Pelantikan resmi Aslab aktif angkatan tahun 2018 pada praktikum PBO 2020 periode VI', '60cea408d7366.IMG-20191114-WA0006[1].jpg', '2021-05-18', 'Pelantikan Asisten Laboratorium Rekayasa Perangkat Lunak tahun angkatan 2018, di hadiri oleh KA lab RPL dan juga Aslab senior yang memberi arahan untuk aslab baru');

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
(10, '60d192279a7cc.IMG-20210620-WA0000[1].jpg', 'Asistensi Praktikum', '2021-06-08', '<p>Waktu asistensi praktikan kepada Asisten&nbsp;Laboratorium saat praktikum Pemrograman Berbasis Ob'),
(14, '60d192b9c0ba4.IMG-20210620-WA0002[1].jpg', 'Pelaksanaan Praktikum PBO 2019', '2021-06-11', '<p>Pengawasan Asisten Lab kepada praktikan malam ketika berlangsungnya kegiatan praktikum Pemrograma'),
(16, '60d1936fd1c18.IMG-20210620-WA0004[1].jpg', 'Persiapan Praktikum ', '2021-06-16', '<p>Persiapan materi dan metode penilaian Praktikum Basis Data tahun 2019</p>'),
(19, '60d194b025af4.IMG-20210620-WA0001[1].jpg', 'Praktikum Basis Data', '2021-06-16', '<p>Pelaksanaan Praktikum Basis Data di Laboratorium RPL modul 1, berlangsung dengan hikmat</p>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_anggota`
--

CREATE TABLE `kategori_anggota` (
  `id_kategori_anggota` int(11) NOT NULL,
  `nama_kategori_anggota` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori_anggota`
--

INSERT INTO `kategori_anggota` (`id_kategori_anggota`, `nama_kategori_anggota`) VALUES
(1, 'alumni'),
(2, 'aslab aktif'),
(3, 'Kepala Asisten Laboratorium');

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
(1, 'Praktikum Pemrograman Berbasis Objek'),
(2, 'Praktikum Basis Data');

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
(1, 'Liburan'),
(7, 'Buka Bersama'),
(8, 'Makan-makan'),
(9, 'Pelantikan Aslab Baru'),
(10, 'Rapat');

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
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

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
-- Indeks untuk tabel `kategori_anggota`
--
ALTER TABLE `kategori_anggota`
  ADD PRIMARY KEY (`id_kategori_anggota`);

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
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
  MODIFY `id_gallery` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `halaman`
--
ALTER TABLE `halaman`
  MODIFY `id_halaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `kategori_anggota`
--
ALTER TABLE `kategori_anggota`
  MODIFY `id_kategori_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kategori_berita`
--
ALTER TABLE `kategori_berita`
  MODIFY `id_kategori_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `kategori_gallery`
--
ALTER TABLE `kategori_gallery`
  MODIFY `id_kategori_gallery` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
