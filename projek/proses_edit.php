<?php
session_start();
include 'koneksi.php';

// Kalau belum login atau bukan admin, tendang keluar
if ($_SESSION['login'] != true || $_SESSION['role'] != 'admin') {
    header("Location: index.php");
    exit();
}

$id = $_POST['id_produk'];
$kode_bakery = $_POST['kode_bakery'];
$nama_produk = $_POST['nama_produk'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];
$deskripsi = $_POST['deskripsi'];

$query = "UPDATE list_produk SET kode_bakery = '$kode_bakery', nama_produk = '$nama_produk', harga = '$harga', stok = '$stok', deskripsi = '$deskripsi' WHERE id_produk = '$id'";
$result = mysqli_query($koneksi, $query);

if ($result) {
    header('Location: data_produk.php');
    exit();
}
else {
    echo "Gagal mengubah data: " . mysqli_error($koneksi);
}
?>