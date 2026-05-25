<?php
session_start();

if ($_SESSION['login'] != true) {
    header('Location: login.php');
    exit;
}
include 'koneksi.php';

date_default_timezone_set('Asia/Jakarta'); //buat waktu

$query_produk = "SELECT * FROM list_produk";
$result_produk = mysqli_query($koneksi, $query_produk);

// Menangkap kode_bakery dari URL 
$kodeDipilih = isset($_GET['kode_bakery']) ? $_GET['kode_bakery'] : '';

if (isset($_POST['submit'])) { 
    $nama_pembeli      = $_POST['nama_pembeli'];
    $alamat            = $_POST['alamat'];
    $no_hp             = $_POST['no_hp'];
    $jumlah_beli       = $_POST['jumlah_beli'];
    $metode_pembayaran = $_POST['metode_pembayaran'];
    $kode_bakery       = $_POST['kode_bakery'];

    $query_detail = "SELECT id_produk, harga, nama_produk FROM list_produk WHERE kode_bakery = '$kode_bakery'";
    $result_detail = mysqli_query($koneksi, $query_detail);
    
    if ($row_detail = mysqli_fetch_assoc($result_detail)) {
        $id_produk   = $row_detail['id_produk'];
        $harga       = $row_detail['harga'];
        $nama_produk = $row_detail['nama_produk'];
        $harga_total = $harga * $jumlah_beli;

        $query_pembeli = "INSERT INTO data_pembeli (id_pembeli, nama_pembeli, alamat, no_hp, jumlah_beli, metode_pembayaran) 
                          VALUES (NULL, '$nama_pembeli', '$alamat', '$no_hp', '$jumlah_beli', '$metode_pembayaran')";
                  
        $insert_pembeli = mysqli_query($koneksi, $query_pembeli);
        
        if ($insert_pembeli) {
            $id_pembeli_baru = mysqli_insert_id($koneksi);

            $query_penjualan = "INSERT INTO data_penjualan (id_penjualan, id_produk, id_pembeli, harga, jumlah_beli, harga_total) 
                                VALUES (NULL, '$id_produk', '$id_pembeli_baru', '$harga', '$jumlah_beli', '$harga_total')";
            
            $insert_penjualan = mysqli_query($koneksi, $query_penjualan);

            if ($insert_penjualan) {
                // Kurangi stok
                $query_update_stok = "UPDATE list_produk SET stok = stok - $jumlah_beli WHERE id_produk = '$id_produk'";
                mysqli_query($koneksi, $query_update_stok);

                // Set session untuk dikirim ke terimakasih.php
                $_SESSION['pesanan'] = [
                    'id'          => $id_pembeli_baru,
                    'nama'        => $nama_pembeli,
                    'produk'      => $nama_produk, 
                    'jumlah'      => $jumlah_beli,
                    'metode'      => $metode_pembayaran,
                    'tanggal'     => date('d-m-Y H:i:s')
                ];

                header('Location: terimakasih.php');
                exit;
            } else {
                echo "<script>alert('Gagal menyimpan data penjualan: " . mysqli_error($koneksi) . "');</script>";
            }
        } else {
            echo "<script>alert('Error: Produk tidak ditemukan di database.');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pemesanan</title>
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
                    <ul class="navbar-nav ms-auto me-4 gap-1">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="list_produk.php">Products</a>
                        </li>
                        <?php
                        if (!isset($_SESSION['email'])) { ?>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="login.php">Login</a>
                            </li>
                        <?php }
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="about_us.php">About Us</a>
                        </li>
                        <?php
                        if (isset($_SESSION['email'])) { ?>
                            <div class="logout-button ms-auto">
                                <a href="logout.php">
                                    <button type="button" class="btn btn-dark logout">Logout</button>
                                </a>
                            </div>
                        <?php }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header text-white">
                        <h4 class="mb-0">Form Pemesanan</h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">

                            <div class="mb-3">
                                <label class="form-label">Nama Pembeli</label>
                                <input type="text" class="form-control" name="nama_pembeli" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Alamat Lengkap</label>
                                <textarea class="form-control" rows="3" name="alamat" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Nomor HP</label>
                                <input type="text" class="form-control" name="no_hp" required>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-8">
                                    <label class="form-label fw-semibold">Produk</label>
                                    <select name="kode_bakery" class="form-select" required>
                                        <option value="">-- Pilih Produk Tersedia --</option>
                                        <?php while ($produk = mysqli_fetch_assoc($result_produk)) { ?>
                                            <option value="<?= $produk['kode_bakery'] ?>" <?= $kodeDipilih === $produk['kode_bakery'] ? 'selected' : '' ?>>
                                                <?= $produk['nama_produk'] ?> - Rp <?= number_format($produk['harga'], 0, ',', '.') ?> (Stok: <?= $produk['stok'] ?>)
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold">Jumlah</label>
                                    <input type="number" name="jumlah_beli" class="form-control" min="1" max="99" value="1" required>
                                </div>
                            </div>

                            <div class="mb-3 text-center">
                                    <label class="form-label fw-semibold d-block">Metode Pembayaran</label>
                                <div class="gap-2 flex-wrap text-start d-flex justify-content-center">
                                    <input type="radio" class="btn-check" id="cod" name="metode_pembayaran" value="cod" required>
                                    <label class="btn btn-outline-dark" for="cod"> Cash On Delivery</label>

                                    <input type="radio" class="btn-check" id="tf" name="metode_pembayaran" value="tf">
                                    <label class="btn btn-outline-dark" for="tf"> Transfer Bank</label>

                                    <input type="radio" class="btn-check" id="qris" name="metode_pembayaran" value="qris">
                                    <label class="btn btn-outline-dark" for="qris"> QRIS</label>
                                </div>
                            </div>
                            
                            <button type="submit" class="btn btn-dark w-100" name="submit">Submit Pesanan</button>
                        </form>
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