<?php
session_start();
include 'koneksi.php';

if (isset($_POST['register'])) {
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $password =$_POST['password'];

    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['registError'] = "[ERROR] Email sudah terdaftar!";
        exit();
    } else {
        $query = "INSERT INTO users (email, password) VALUES ('$email', '$password')";
        if (mysqli_query($koneksi, $query)) {
            echo "<script>alert('Registrasi berhasil! Silahkan login.');
                  window.location='login.php';</script>";
            exit();
        } else {
            $_SESSION['registError'] = "[ERROR] Registrasi gagal!";
            header('Location: login.php');
            exit();
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
        <link rel="stylesheet" href="stylebake.css">
</head>
<body>

 <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand ms-4" href="index.php">🥐 Rise & Bake</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>

<main class="content-log-reg"> 
    <div class=" container card col-md-4 mt-5 shadow p-3 mb-5 bg-body rounded">
        <form action="" method="POST" class="register"> 
            <h3 class="card-title mb-4 text-center">🥐 Register</h3>
            <?php
                if (isset($_SESSION['registError'])) { ?>
                <div class="alert alert-danger text-center" role="alert" style="font-size: 0.8rem;">
                    <?php echo $_SESSION['registError'];
                    unset($_SESSION['registError']); ?>
                </div>
            <?php
            } ?> 
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email">
            </div>
            
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>

            <button type="submit" class="btn w-100" name="register">Register</button>

            <p class="card-text text-center mt-3">Sudah memiliki akun? <a href="login.php">Login di sini</a></p>
        </form>
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