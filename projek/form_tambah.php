<?php
session_start();
include 'koneksi.php';
// Kalau belum login atau bukan admin, tendang keluar
if ($_SESSION['login'] != true || $_SESSION['role'] != 'admin') {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah Produk</title>
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
            </div>
        </nav>
    </header>
    <main class="content-tambah-produk">
        <div class="parent-form-tambah">
            <form class="form-tambah" action="proses_tambah.php" method="post">
                <div class="text-center title-form-tambah">
                    <h1 style="font-family: Poppins Bold">Tambahkan Produk</h1>
                </div>
                <?php
                if (isset($_SESSION['insertGagal'])) { ?>
                    <div class="alert alert-danger text-center" role="alert" style="font-size: 0.8rem;">
                        <?php echo $_SESSION['insertGagal'];
                        unset($_SESSION['insertGagal']); ?>
                    </div>
                <?php
                } ?>
                <div class="mb-3">
                    <label for="kodebakery" class="form-label">Kode Bakery</label>
                    <input type="text" class="form-control" id="kodebakery" name="kode_bakery" value="BKR000" required>
                </div>
                <div class="mb-3">
                    <label for="namaproduk" class="form-label">Nama Produk</label>
                    <input type="text" class="form-control" id="namaproduk" name="nama_produk" required>
                </div>
                <div class="harga-stok gap-2 d-flex">
                    <div class="mb-3 w-100">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="text" class="form-control" id="harga" name="harga" required>
                    </div>
                    <div class="mb-3 w-100 ms-auto">
                        <label for="stok" class="form-label">Stok</label>
                        <input type="number" class="form-control" id="stok" name="stok" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <input type="textarea" class="form-control" id="deskripsi" name="deskripsi" required>
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">Tambahkan gambar</label>
                    <input type="file" class="form-control" id="gambar" name="gambar" required>
                </div>
                <button type="submit" class="btn btn-secondary w-100" name="submit">Save Changes</button>
            </form>
        </div>
    </main>
</body>
</html>