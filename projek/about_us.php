<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
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
                                <a class="nav-link" href="login.php">Login</a>
                            </li>
                        <?php }
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="about_us.php">About Us</a>
                        </li>
                        <?php
                        if (isset($_SESSION['email'])) { ?>
                            <li class="logout-button nav-item ms-auto">
                                <a href="logout.php">
                                    <button type="button" class="btn btn-dark logout">Logout</button>
                                </a>
                            </li>
                        <?php }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main class="content-about-us">
        <div class="title-about-us text-center">
            <h1>About Us</h1>
        </div>
        <div class="parent-about-us">
            <div class="card card-profile mb-3" style="width: 540px; height: 240px">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="Gambar/Reza.jpeg" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Dwiky Reza Kurniawan</h5>
                            <p class="card-text">Information Systems - 25 <br> UPN "Veteran" Yogyakarta</p>
                            <p class="card-text"><small class="text-body-secondary">124250002</small></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-profile mb-3" style="width: 540px; height: 240px">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="Gambar/Mazaya.jpg" class="img-fluid img-about-us rounded-start" alt="mazaya">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Mazaya Hannindra Firasyan</h5>
                            <p class="card-text">Information Systems - 25 <br> UPN "Veteran" Yogyakarta</p>
                            <p class="card-text"><small class="text-body-secondary">124250013</small></p>
                        </div>
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