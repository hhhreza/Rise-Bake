<?php
session_start();
include 'koneksi.php';

if ($_SESSION['login'] != true || $_SESSION['role'] != 'admin') {
    header("Location: index.php");
    exit();
}   


$query = "SELECT pj.id_penjualan, pb.nama_pembeli, p.nama_produk, pj.harga, pj.jumlah_beli, pj.harga_total FROM data_penjualan pj JOIN data_pembeli pb ON pj.id_pembeli = pb.id_pembeli JOIN list_produk p ON pj.id_produk = p.id_produk ORDER BY pj.id_penjualan ASC"; 

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
        <div class="card border-0 shadow-sm overflow-hidden mb-4 mx-4 w-75" style="border-radius: 12px;">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0" style="background-color: #fff;">
                    
                    <thead style="background-color: #4a3525; color: #ffffff;">
                        <tr>
                            <th scope="col" class="ps-4 py-3" style="width: 13%;">ID Pembeli</th>
                            <th scope="col" class="py-3" style="width: 18%;">Nama Pembeli</th>
                            <th scope="col" class="py-3" style="width: 13%;">Nama Produk</th>
                            <th scope="col" class="py-3" style="width: 17%;">Harga Satuan</th>
                            <th scope="col" class="py-3" style="width: 19%;">Jumlah Beli</th>
                            <th scope="col" class="pe-4 py-3" style="width: 20%;">Total Harga</th>
                        </tr>
                    </thead>
                    
                    <tbody class="table-group-divider" style="border-color: #e0d7cf;">
                        
                        <?php
                        // Logika looping php kamu tetap berjalan di sini
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td class="ps-4 fw-bold text-secondary"><?php echo $row['id_penjualan']; ?></td>
                            <td class="fw-semibold text-dark"><?php echo $row['nama_pembeli']; ?></td>
                            <td class="fw-semibold text-dark"><?php echo $row['nama_produk']; ?></td>
                            <td>
                                <span class="badge bg-success-subtle text-success px-2 py-1 rounded">
                                    <?php echo $row['harga']; ?>
                                </span>
                            </td>
                            <td class="fw-semibold text-dark"><?php echo $row['jumlah_beli']; ?></td>
                            <td>
                                <span class="badge bg-success-subtle text-success px-2 py-1 rounded">
                                    <?php echo $row['harga_total']; ?>
                                </span>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
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