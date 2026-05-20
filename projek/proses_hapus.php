<?php
session_start();
include 'koneksi.php';

// Kalau belum login atau bukan admin, tendang keluar
if ($_SESSION['login'] != true || $_SESSION['role'] != 'admin') {
    header("Location: index.php");
    exit();
}

$id = $_GET['id_produk'];
$query = "DELETE FROM list_produk WHERE id_produk = '$id'";
$result = mysqli_query($koneksi, $query);

if ($result) {
    header('Location: data_produk.php');
    exit();
}
else {
    echo "Gagal mengubah data: " . mysqli_error($koneksi);
}

?>