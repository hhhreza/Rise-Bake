<?php
session_start();
include 'koneksi.php';

// Kalau belum login atau bukan admin, tendang keluar
if ($_SESSION['login'] != true || $_SESSION['role'] != 'admin') {
    header("Location: index.php");
    exit();
}

$kode_bakery = $_POST['kode_bakery'];
$nama_produk = $_POST['nama_produk'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];
$deskripsi = $_POST['deskripsi'];
$gambar = $_POST['gambar'];

$cekKode = "SELECT * FROM list_produk WHERE kode_bakery = '$kode_bakery'";
$resultKode = mysqli_query($koneksi, $cekKode);

if (mysqli_num_rows($resultKode) > 0) {
    $_SESSION['insertGagal'] = "Kode bakery telah terdaftar";
    header('Location: form_tambah.php');
    exit();
}
else {
    $queryInsert = "INSERT INTO list_produk(id_produk, kode_bakery, nama_produk, harga, stok, deskripsi, gambar) VALUES ('', '$kode_bakery', '$nama_produk', '$harga', '$stok', '$deskripsi', '$gambar')";
    $resultInsert = mysqli_query($koneksi, $queryInsert);
    if ($resultInsert) {
        header('Location: data_produk.php');
        exit;
    }
}
?>