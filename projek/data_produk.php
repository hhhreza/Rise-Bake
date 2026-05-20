<?php
session_start();
include 'koneksi.php';
// Kalau belum login atau bukan admin, tendang keluar
/* if (!isset($_SESSION['login']) || $_SESSION['role'] != 'admin') {
    header("Location: index.php");
    exit();
} */

$query = "SELECT * FROM list_produk";
$result = mysqli_query($koneksi, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
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
                <ul class="navbar-nav ms-auto me-4 gap-1">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="dashboardAdmin.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="data_produk.php">Data Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="data_penjualan.php">Data Penjualan</a>
                    </li>
                    <div class="logout-button ms-auto">
                        <a href="logout.php">
                            <button type="button" class="btn btn-dark logout">Logout</button>
                        </a>
                    </div>
                </ul>
            </div>
        </div>
    </nav>
    </header>
    <main class="content-dataproduk">
        <div class="text-center title-dataproduk">
            <h1>Data Produk</h1>
        </div>
        <div class="parent-button-add">
            <a role="button" href="form_tambah.php" class="btn btn-secondary btn-explore mb-1">Tambah Produk</a>
        </div>
        <div class="parent-table-product mb-5">
            <table class="list-dataproduk">
                <tr>
                    <th>Kode Bakery</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Deskripsi</th>
                </tr>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['kode_bakery']; ?></td>
                    <td><?php echo $row['nama_produk']; ?></td>
                    <td><?php echo $row['harga']; ?></td>
                    <td><?php echo $row['stok']; ?></td>
                    <td><?php echo $row['deskripsi']; ?></td>
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