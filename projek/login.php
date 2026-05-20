<?php
session_start();
include 'koneksi.php';

if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $password = $_POST['password'];

    // Cari user berdasarkan email
    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Verifikasi password yang di-hash
        if ($user['password'] == $password) {
            $_SESSION['login'] = true;
            $_SESSION['email'] = $email;
            $_SESSION['role'] = $user['role'];
            if ($user['role'] == 'admin') {
                header("Location: dashboard.php");
            } else {
                header("Location: list_produk.php"); 
            }
            exit();
        } else {
            $_SESSION['loginError'] = "[ERROR] Password salah!";
            header('Location: login.php');
            exit();
        }
    } else {
        $_SESSION['loginError'] = "[ERROR] Email tidak ditemukan!";
        header('Location: login.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
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
        <main class="content-log-reg" style="background-color: transparent !important;">
            <div class=" container card col-md-4 mt-5 shadow p-3 mb-5 bg-body rounded">
                <form action="" method="POST" class="login"> 
                    <h3 class="card-title mb-4 text-center">🥐 Login</h3>
                    <?php
                    if (isset($_SESSION['loginError'])) { ?>
                        <div class="alert alert-danger text-center" role="alert" style="font-size: 0.8rem;">
                            <?php echo $_SESSION['loginError'];
                            unset($_SESSION['loginError']); ?>
                        </div>
                    <?php
                    } ?>
                    <div class="mb-3 text-left">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email" required>
                    </div>

                    <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    </div>

                    <button type="submit" class="btn w-100" name="login">Login</button>

                    <p class="card-text text-center mt-3">Belum memiliki akun? <a href="register.php">Daftar di sini</a></p>
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