<?php
include 'koneksi.php';

$kode_bakery = $_POST['kode_bakery'];
$nama_produk = $_POST['nama_produk'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];
$deskripsi = $_POST['deskripsi'];

$cekKode = "SELECT * FROM list_produk WHERE kode_bakery = '$kode_bakery'";
$resultKode = mysqli_query($koneksi, $cekKode);

if (mysqli_num_rows($resultKode) > 0) {
    $_SESSION['insertGagal'] = "Kode buku telah terdaftar";
    header('Location: form_tambah.php');
    exit();
}
else {
    $queryInsert = "INSERT INTO list_produk(id_produk, kode_bakery, nama_produk, harga, stok, deskripsi) VALUES ('', '$kode_bakery', '$nama_produk', '$harga', '$stok', '$deskripsi')";
    $resultInsert = mysqli_query($koneksi, $queryInsert);
    if ($resultInsert) {
        header('Location: data_produk.php');
        exit;
    }
}
?>