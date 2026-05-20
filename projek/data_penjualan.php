<?php
session_start(); // Jangan lupa session_start() kalau pakai $_SESSION
include 'koneksi.php';

if ($_SESSION['login'] != true || $_SESSION['role'] != 'admin') {
    header("Location: index.php");
    exit();
}   

// JOIN data_penjualan, data_pembeli, dan list_produk
$query = "SELECT pj.id_penjualan, pb.nama_pembeli, p.nama_produk, pj.harga, pj.jumlah_beli, pj.harga_total FROM data_penjualan pj JOIN data_pembeli pb ON pj.id_pembeli = pb.id_pembeli JOIN list_produk p ON pj.id_produk = p.id_produk ORDER BY pj.id_penjualan ASC"; // Urutkan dari transaksi terbaru

$result = mysqli_query($koneksi, $query);   

?>
<!DOCTYPE html>
<html lang="en">
<head>      
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Penjualan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="stylebake.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand ms-4" href="dashboardAdmin.php">🥐 Rise & Bake</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto justiify-content-center me-4 gap-1">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="dashboardAdmin.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="data_produk.php">Data Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="data_penjualan.php">Data Penjualan</a>
                    </li>
                    <li class="logout-button nav-item ms-auto">
                        <a href="logout.php">
                            <button type="button" class="btn btn-dark logout">Logout</button>
                        </a>
                    </li>   
                </ul>
            </div>
        </div>
    </nav>
    </header>
    <main class="content-dataproduk">
        <div class="text-center title-dataproduk mb-5">
            <h1>Data Penjualan</h1>
        </div>
        <div class="parent-table-product mb-5 container">
            <table class="list-dataproduk">
                <tr>
                    <th>ID Penjualan</th>
                    <th>Nama Pembeli</th>
                    <th>Nama Produk</th>
                    <th>Harga Satuan</th>
                    <th>Jumlah Beli</th>
                    <th>Total Harga</th>
                </tr>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                 <tr>
                    <td><?php echo $row['id_penjualan']; ?></td>
                    <td><?php echo $row['nama_pembeli']; ?></td>
                    <td><?php echo $row['nama_produk']; ?></td>
                    <td>Rp <?php echo $row['harga']; ?></td>
                    <td><?php echo $row['jumlah_beli']; ?></td>
                    <td>Rp <?php echo $row['harga_total']; ?></td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </main>
    <footer class="footer">
        <div class="wrap-footer">
                <p class="copyright">&copy; 2026 Rise & Bake. All rights reserved.</p>
                <p class="address">📍 Babarsari josjis | 📧 hello@rizebakery.com</p>
        </div>
    </footer>
</body>
</html>