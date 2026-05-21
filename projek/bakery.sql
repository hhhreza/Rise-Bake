-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Bulan Mei 2026 pada 15.40
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bakery`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pembeli`
--

CREATE TABLE `data_pembeli` (
  `id_pembeli` int(5) NOT NULL,
  `nama_pembeli` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(10) NOT NULL,
  `jumlah_beli` int(10) NOT NULL,
  `metode_pembayaran` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_pembeli`
--

INSERT INTO `data_pembeli` (`id_pembeli`, `nama_pembeli`, `alamat`, `no_hp`, `jumlah_beli`, `metode_pembayaran`) VALUES
(1, 'rEZA', 'jalan jalan', '08128822', 2, 'cod'),
(2, 'Gilang', 'jlna', '0812345678', 2, 'cod'),
(3, 'Amal', 'jalan jalan', '0812345678', 1, 'qris'),
(4, 'aMAL', 'Jalan Demangan', '081233900', 1, 'tf'),
(5, 'Miaw', 'Nun Jauh di sana', '0812872872', 3, 'qris'),
(6, 'Leon S. Kurniawan', 'Sleman, Yogyakarta', '0867676767', 1, 'tf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_penjualan`
--

CREATE TABLE `data_penjualan` (
  `id_penjualan` int(10) NOT NULL,
  `id_produk` int(5) NOT NULL,
  `id_pembeli` int(5) NOT NULL,
  `harga` int(100) NOT NULL,
  `jumlah_beli` int(10) NOT NULL,
  `harga_total` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_penjualan`
--

INSERT INTO `data_penjualan` (`id_penjualan`, `id_produk`, `id_pembeli`, `harga`, `jumlah_beli`, `harga_total`) VALUES
(1, 3, 1, 35000, 2, 70000),
(2, 2, 2, 25000, 2, 50000),
(3, 1, 3, 35000, 1, 35000),
(4, 2, 4, 25000, 1, 25000),
(5, 1, 5, 35000, 3, 105000),
(6, 2, 6, 25000, 1, 25000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `list_produk`
--

CREATE TABLE `list_produk` (
  `id_produk` int(5) NOT NULL,
  `kode_bakery` varchar(10) NOT NULL DEFAULT 'BKR001',
  `nama_produk` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `list_produk`
--

INSERT INTO `list_produk` (`id_produk`, `kode_bakery`, `nama_produk`, `harga`, `stok`, `deskripsi`, `gambar`) VALUES
(1, 'BKR001', 'Croissant', 35000, 8, 'Pastry asal Prancis berlapis-lapis dengan bentuk khas menyerupai bulan sabit. Teksturnya sangat renyah di luar namun lembut di dalam. Varian rasanya bervariasi, mulai dari polos (plain), isian cokelat, hingga almond.', 'Croissant1.jpg'),
(2, 'BKR002', 'Choux', 25000, 10, 'Di Indonesia lebih dikenal sebagai kue sus. Adonannya dimasak terlebih dahulu di atas panci sebelum dipanggang hingga mengembang. Biasanya diisi dengan vla manis (contoh: cream puff, éclair).', 'Choux.jpg'),
(3, 'BKR003', 'Puff Pastry', 35000, 12, 'Adonan berlapis-lapis tipis yang menggunakan banyak mentega tanpa ragi. Saat dipanggang, menteganya meleleh dan menciptakan rongga serta tekstur yang sangat renyah. Contoh produknya seperti apple pie, cheese roll, dan palmieren (kupu-kupu).', 'Puff-Pastry.jpg'),
(4, 'BKR004', 'Donat', 30000, 10, 'Donat adalah penganan yang digoreng, dibuat dari adonan tepung terigu, gula pasir, kuning telur, ragi roti, dan mentega. Donat yang paling umum adalah donat dengan bentuk seperti cincin dan ada lubang di tengahnya, biasanya ditaburi dengan meses atau gula halus. Sedangkan donat dengan bentuk bundar diisi isian manis, seperti selai, jelly, krim, cokelat, dan custard.', 'Donut.jpg'),
(5, 'BKR005', 'Brownies', 25000, 17, 'Kue ini memiliki karakteristik unik karena tidak menggunakan banyak pengembang, sehingga menghasilkan tekstur yang padat, berat, dan kaya rasa cokelat, berbeda dari kue bolu biasa yang ringan dan berongga.', 'Brownies.jpg'),
(6, 'BKR006', 'Cheese Cake', 20000, 5, 'Hidangan penutup mewah berbahan utama keju lembut yang populer di seluruh dunia. Hidangan ini sangat dicintai karena menawarkan perpaduan rasa manis, gurih, dan sedikit sentuhan asam yang mewah, berpadu dengan tekstur super lembut yang langsung meleleh di dalam mulut.', 'Cheese Cake.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_users` int(5) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(20) DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_users`, `email`, `password`, `role`) VALUES
(1, 'hello@rizebakery.com', 'atminpekok', 'admin'),
(6, 'dwikyreza23@gmail.com', 'reza123', 'user'),
(7, 'mazayafirasyan@gmail.com', 'icikiwir1', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_pembeli`
--
ALTER TABLE `data_pembeli`
  ADD PRIMARY KEY (`id_pembeli`);

--
-- Indeks untuk tabel `data_penjualan`
--
ALTER TABLE `data_penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `fk_id_produk` (`id_produk`),
  ADD KEY `fk_id_pembeli` (`id_pembeli`);

--
-- Indeks untuk tabel `list_produk`
--
ALTER TABLE `list_produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD UNIQUE KEY `kode_bakery` (`kode_bakery`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_pembeli`
--
ALTER TABLE `data_pembeli`
  MODIFY `id_pembeli` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `data_penjualan`
--
ALTER TABLE `data_penjualan`
  MODIFY `id_penjualan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `list_produk`
--
ALTER TABLE `list_produk`
  MODIFY `id_produk` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data_penjualan`
--
ALTER TABLE `data_penjualan`
  ADD CONSTRAINT `fk_id_pembeli` FOREIGN KEY (`id_pembeli`) REFERENCES `data_pembeli` (`id_pembeli`),
  ADD CONSTRAINT `fk_id_produk` FOREIGN KEY (`id_produk`) REFERENCES `list_produk` (`id_produk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
