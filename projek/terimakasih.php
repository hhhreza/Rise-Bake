<?php
session_start();

// Kalau belum login, tendang ke login
if ($_SESSION['login'] != true) {
    header("Location: login.php");
    exit();
}

// Kalau tidak ada session pesanan, tendang ke index
if (!isset($_SESSION['pesanan'])) {
    header("Location: index.php");
    exit();
}

$p = $_SESSION['pesanan'];

// Pakai if-else biasa yang pasti udah diajarin
$metode_tampil = $p['metode'];
if ($p['metode'] == 'cod') {
    $metode_tampil = 'Cash On Delivery';
} elseif ($p['metode'] == 'tf') {
    $metode_tampil = 'Transfer Bank';
} elseif ($p['metode'] == 'qris') {
    $metode_tampil = 'QRIS';
}

unset($_SESSION['pesanan']); // Hapus session pesanan setelah ditampilkan di halaman ini
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Berhasil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="stylebake.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand ms-4" href="index.php">🥐 Rise & Bake</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto justiify-content-center me-4 gap-1">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="list_produk.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about_us.php">About Us</a>
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

    <main class="content-dataproduk mt-5">
        <div class="text-center title-dataproduk">
            <h1>✅ Pesanan Berhasil!</h1>
            <p>Terima kasih, <b><?php echo $p['nama']; ?></b>! Pesanan Anda sedang kami proses.</p>
        </div>
        
        <div class="parent-table-product mb-4 d-flex justify-content-center">
            <table class="list-dataproduk" style="width: 50%;">
                <tr>
                    <th colspan="2" class="text-center">Ringkasan Pesanan</th>
                </tr>
                <tr>
                    <td><b>ID Pesanan</b></td>
                    <td>#<?php echo $p['id']; ?></td>
                </tr>
                <tr>
                    <td><b>Produk</b></td>
                    <td><?php echo $p['produk']; ?></td>
                </tr>
                <tr>
                    <td><b>Jumlah</b></td>
                    <td><?php echo $p['jumlah']; ?> pcs</td>
                </tr>
                <tr>
                    <td><b>Metode Pembayaran</b></td>
                    <td><?php echo $metode_tampil; ?></td>
                </tr>
                <tr>
                    <td><b>Tanggal Pesan</b></td>
                    <td><?php echo $p['tanggal']; ?></td>
                </tr>
            </table>
        </div>

        <div class="text-center mb-5">
            <a role="button" href="list_produk.php" class="btn btn-secondary btn-explore">Belanja Lagi</a>
            <a role="button" href="index.php" class="btn btn-dark btn-explore">Kembali ke Beranda</a>
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