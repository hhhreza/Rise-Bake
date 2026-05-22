<?php
session_start();
include 'koneksi.php';
// Kalau belum login atau bukan admin, tendang keluar
if ($_SESSION['login'] != true || $_SESSION['role'] != 'admin') {
    header("Location: index.php");
    exit();
}

$queryTotalProduk = "SELECT COUNT(*) AS total_produk FROM list_produk";
$hasilTotalProduk = mysqli_query($koneksi, $queryTotalProduk);
$rowTotalProduk = mysqli_fetch_assoc($hasilTotalProduk);

$queryTotalPenjualan= "SELECT COUNT(*) AS total_transaksi FROM data_penjualan";
$hasilTotalPenjualan = mysqli_query($koneksi, $queryTotalPenjualan);
$rowTotalPenjualan = mysqli_fetch_assoc($hasilTotalPenjualan);

$queryTotalPendapatan= "SELECT SUM(harga_total) AS total_pendapatan FROM data_penjualan";
$hasilTotalPendapatan = mysqli_query($koneksi, $queryTotalPendapatan);
$rowTotalPendapatan = mysqli_fetch_assoc($hasilTotalPendapatan);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
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
    <main class="content-admin">
        <div class="text-center parent-dashboard">
            <h1>Selamat Datang di Dashboard Admin!</h1>
            <h5>Let's track the market!</h5>
        </div>
        <div>
            <div class="container mt-4">
                <div class="row justify-content-center gap-3">
                    <div class="col-md-4 card bg-white text-dark p-3 shadow-sm border-0 rounded">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h6 class="text-muted mb-1 text-uppercase small fw-bold">Total Varian Produk</h6>
                                <h3 class="fw-bold mb-0"><?php echo $rowTotalProduk['total_produk']; ?></h3>
                            </div>
                            <div class="bg-warning-subtle text-warning p-3 rounded-circle">
                                🍞
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 card bg-white text-dark p-3 shadow-sm border-0 rounded">
                        <div class="d-flex align-items-between justify-content-between">
                            <div>
                                <h6 class="text-muted mb-1 text-uppercase small fw-bold">Total Transaksi</h6>
                                <h3 class="fw-bold mb-0"><?php echo $rowTotalPenjualan['total_transaksi']; ?></h3>
                            </div>
                            <div class="bg-success-subtle text-success p-3 rounded-circle">
                                💰
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 card bg-white text-dark p-3 shadow-sm border-0 rounded">
                        <div class="d-flex align-items-between justify-content-between">
                            <div>
                                <h6 class="text-muted mb-1 text-uppercase small fw-bold">Total Pendapatan</h6>
                                <h3 class="fw-bold mb-0">Rp<?php echo $rowTotalPendapatan['total_pendapatan']; ?></h3>
                            </div>
                            <div class="bg-success-subtle text-success p-3 rounded-circle">
                                💵
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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