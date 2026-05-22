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
    <main class="content-about-us py-5" style="background-color: #886246; color: #f9f1eb;">
    
    <section class="container my-5">
        <div class="row align-items-center g-5">
            <div class="col-md-5">
                <h6 class="text-uppercase text-warning fw-bold mb-2" style="letter-spacing: 2px;">Since 2026</h6>
                <h1 class="display-4 fw-bold mb-4" style="font-family: Anerome;">Freshly Baked, Every Single Day.</h1>
            </div>
            <div class="col-md-7">
                <p class="lead fw-medium text-white mb-3">
                    Your perfect bite starts here! Berawal dari kecintaan kami terhadap aroma panggangan yang menenangkan di pagi hari, Rise & Bake hadir untuk menemani setiap awal harimu.
                </p>
                <p class="text-white" style="line-height: 1.8; font-family: Poppins;">
                    Kami mengusung komitmen untuk menyajikan sourdough, croissant, hingga bagel otentik yang diproduksi langsung dari oven kami setiap subuh. Dari dapur kami di Babarsari, Yogyakarta, kami mendedikasikan diri untuk meramu adonan terbaik, memanggangnya dengan presisi, dan menyajikannya hangat-hangat demi senyum pertama di pagi harimu.
                </p>
            </div>
        </div>
    </section>

    <hr class="container my-5 opacity-25" style="color: #f9f1eb;">

    <section class="container my-5 text-center">
        <h2 class="fw-bold mb-2" style="font-family: Anerome;">Behind The Oven</h2>
        <p class="mb-5" style="font-family: Poppins;">Kenali tim mahasiswa Sistem Informasi di balik kelezatan Rise & Bake</p>
        
        <div class="row justify-content-center g-4">
            
            <div class="col-12 col-md-4">
                <div class="card border-0 bg-transparent team-card">
                    <div class="position-relative mx-auto overflow-hidden rounded-circle mb-4 shadow" style="width: 200px; height: 200px;">
                        <img src="gambar/Reza.jpeg" class="w-100 h-100 object-fit-cover" alt="Dwiky Reza Kurniawan" style="object-position: top center;">
                    </div>
                    <h5 class="fw-bold mb-1 text-white" style="font-family: Poppins;">Dwiky Reza Kurniawan</h5>
                    <p class="text-warning small fw-semibold mb-2" style="font-family: Poppins;">Co-Founder & Head Baker</p>
                    <p class="small text-white" style="font-family: Poppins;">Information Systems '25<br>UPN "Veteran" Yogyakarta</p>
                    <span class="badge bg-light text-secondary border px-3 py-2 rounded-pill mt-2 small">124250002</span>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="card border-0 bg-transparent team-card">
                    <div class="position-relative mx-auto overflow-hidden rounded-circle mb-4 shadow" style="width: 200px; height: 200px;">
                        <img src="gambar/Mazaya.jpg" class="w-100 h-100 object-fit-cover" alt="Mazaya Hannindra Firasyan" style="object-position: top center;">
                    </div>
                    <h5 class="fw-bold mb-1 text-white" style="font-family: Poppins;">Mazaya Hannindra Firasyan</h5>
                    <p class="text-warning small fw-semibold mb-2" style="font-family: Poppins;">Co-Founder & System Analyst</p>
                    <p class="small text-white" style="font-family: Poppins;">Information Systems '25<br>UPN "Veteran" Yogyakarta</p>
                    <span class="badge bg-light text-secondary border px-3 py-2 rounded-pill mt-2 small">124250013</span>
                </div>
            </div>

        </div>
    </section>

    <hr class="container my-5 opacity-25" style="color: #f9f1eb;">

    <section class="container my-5 text-center">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="p-3">
                    <div class="fs-1 mb-2">🌾</div>
                    <h5 class="fw-bold">Bahan Premium</h5>
                    <p class="text-white small">Kami hanya menggunakan tepung organik dan mentega pilihan tanpa bahan pengawet buatan.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-3">
                    <div class="fs-1 mb-2">🔥</div>
                    <h5 class="fw-bold">Dipanggang Segar</h5>
                    <p class="text-white small">Setiap produk dipanggang beberapa jam sebelum sampai ke tangan Anda demi menjaga kerenyahan.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-3">
                    <div class="fs-1 mb-2">❤️</div>
                    <h5 class="fw-bold">Dibuat Tulus</h5>
                    <p class="text-white small">Setiap adonan diramu menggunakan tangan terampil dengan penuh rasa cinta dan higienitas tinggi.</p>
                </div>
            </div>
        </div>
    </section>

</main>
    <footer class="footer">
        <div class="wrap-footer">
            <p class="copyright">&copy; 2026 Rise & Bake. All rights reserved.</p>
            <p class="address">📍 Babarsari josjis | 📧 hello@rizebakery.com</p>
        </div>
    </footer>
</body>
</html>