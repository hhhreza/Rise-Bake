<?php
session_start();
include 'koneksi.php';
// Kalau belum login atau bukan admin, tendang keluar
if ($_SESSION['login'] != true || $_SESSION['role'] != 'admin') {
    header("Location: index.php");
    exit();
}

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
        <div class="text-center title-dataproduk">
            <h1>Data Produk</h1>
        </div>
        <div class="parent-button-add">
            <a role="button" href="form_tambah.php" class="btn btn-secondary btn-explore mb-1">Tambah Produk</a>
        </div>
        <div class="card border-0 shadow-sm overflow-hidden mb-4 mx-5" style="border-radius: 16px;">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0" style="background-color: #fff;">
                    
                    <thead style="background-color: #4a3525; color: #ffffff;">
                        <tr>
                            <th scope="col" class="ps-4 py-3" style="width: 12%;">Kode Bakery</th>
                            <th scope="col" class="py-3" style="width: 18%;">Nama Produk</th>
                            <th scope="col" class="py-3" style="width: 13%;">Harga</th>
                            <th scope="col" class="py-3" style="width: 10%;">Stok</th>
                            <th scope="col" class="py-3" style="width: 32%;">Deskripsi</th>
                            <th scope="col" class="pe-4 py-3 text-center" style="width: 15%;">Aksi</th>
                        </tr>
                    </thead>
                    
                    <tbody class="table-group-divider" style="border-color: #e0d7cf;">
                        
                        <?php
                        // Logika looping php kamu tetap berjalan di sini
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td class="ps-4 fw-bold text-secondary"><?php echo $row['kode_bakery']; ?></td>
                            <td class="fw-semibold text-dark"><?php echo $row['nama_produk']; ?></td>
                            <td>
                                <span class="badge bg-success-subtle text-success px-2 py-1 rounded">
                                    <?php echo $row['harga']; ?>
                                </span>
                            </td>
                            <td>
                                <span class="fw-bold <?= ($row['stok'] < 10) ? 'text-danger' : 'text-muted'; ?>"><?php echo $row['stok']; ?></span> Pcs
                            </td>
                            <td>
                                <p class="text-muted small mb-0" style="line-height: 1.5; max-height: 60px; overflow-y: auto;">
                                    <?php echo $row['deskripsi']; ?>
                                </p>
                            </td>
                            <td class="pe-4 text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="form_edit.php?id_produk=<?php echo $row['id_produk']; ?>" class="btn btn-sm btn-warning fw-medium px-3 rounded-2 text-white">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <a href="proses_hapus.php?id_produk=<?php echo $row['id_produk']; ?>" class="btn btn-sm btn-danger fw-medium px-3 rounded-2" onclick="return confirm('Yakin ingin menghapus produk ini?')">
                                        <i class="bi bi-trash"></i> Hapus
                                    </a>
                                </div>
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