<?php
session_start();

// Kalau belum login atau bukan admin, tendang keluar
if (!isset($_SESSION['login']) || $_SESSION['role'] != 'admin') {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Selamat datang di Dashboard Admin!</h1>
    <p>Hanya admin yang bisa melihat halaman ini.</p>
</body>
</html>