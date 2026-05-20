<?php 
session_start();

// Menghapus semua session
session_destroy();

// Mengalihkan halaman kembali ke login
header("Location: index.php?pesan=logout");
?>