<?php
session_start();
include 'koneksi.php';

// Kalau belum login atau bukan admin, tendang keluar
if ($_SESSION['login'] != true || $_SESSION['role'] != 'admin') {
    header("Location: index.php");
    exit();
}

$id = $_GET['id_produk'];
$query = "SELECT * FROM list_produk WHERE id_produk = '$id'";
$result = mysqli_query($koneksi, $query);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
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
    <main class="content-edit-produk">
        <div class="parent-form-edit">
            <form class="form-edit" action="proses_edit.php" method="post">
                <div class="text-center title-form-tambah">
                    <h1 style="font-family: Poppins Bold">Edit Produk</h1>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="idproduk" name="id_produk" hidden value="<?php echo $row['id_produk']; ?>">
                </div>
                <div class="mb-3">
                    <label for="kodebakery" class="form-label">Kode Bakery</label>
                    <input type="text" class="form-control" id="kodebakery" name="kode_bakery" readonly value="<?php echo $row['kode_bakery']; ?>">
                </div>
                <div class="mb-3">
                    <label for="namaproduk" class="form-label">Nama Produk</label>
                    <input type="text" class="form-control" id="namaproduk" name="nama_produk" value="<?php echo $row['nama_produk']; ?>">
                </div>
                <div class="harga-stok gap-2 d-flex">
                    <div class="mb-3 w-100">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="text" class="form-control" id="harga" name="harga" value="<?php echo $row['harga']; ?>">
                    </div>
                    <div class="mb-3 w-100 ms-auto">
                        <label for="stok" class="form-label">Stok</label>
                        <input type="number" class="form-control" id="stok" name="stok" value="<?php echo $row['stok']; ?>">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <input type="textarea" class="form-control" id="deskripsi" name="deskripsi" value="<?php echo $row['deskripsi']; ?>">
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">Tambahkan gambar</label>
                    <input type="file" class="form-control" id="gambar" name="gambar">
                </div>
                <button type="submit" class="btn btn-secondary w-100" name="submit">Save Changes</button>
            </form>
        </div>
    </main>
</body>
</html>