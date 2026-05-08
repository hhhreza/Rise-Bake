<?php
session_start();
include 'koneksi.php';

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Cek apakah email sudah terdaftar
    $query = "SELECT * FROM users WHERE email='$email'";
  
    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Email sudah terdaftar. Silahkan gunakan email lain.');</script>";
    } else {
        // Simpan data pengguna baru ke database
        $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
        if (mysqli_query($koneksi, $query)) {
            $_SESSION['login'] = true;
            header("Location: login.php");
            exit();
        } else {
            echo "<script>alert('Registrasi gagal. Silahkan coba lagi.');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
</head>
<body>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">🥐 RiZe Bakery</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

    <div class=" container card col-md-4 mt-5 shadow p-3 mb-5 bg-body rounded">
        <form action="" class="text-center register"> 🥐 Register</form>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Masukkan email">
             </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Password">
            </div>

            <button type="submit" class="btn btn-primary" name="register">Register</button>

            <p class="card-text text-center mt-3">Sudah memiliki akun? <a href="login.php">Login di sini</a></p>
    </div>

    <footer class="footer">
    <div class="text-center mt-4 mb-4">
        <p>Cat Lovers &copy; 2026</p>
    </div>
</footer>
    
</body>
</html>