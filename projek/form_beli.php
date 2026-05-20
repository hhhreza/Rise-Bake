<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pemesanan</title>
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
                                <a class="nav-link active" aria-current="page" href="login.php">Login</a>
                            </li>
                        <?php }
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="about_us.php">About Us</a>
                        </li>
                        <?php
                        if (isset($_SESSION['email'])) { ?>
                            <div class="logout-button ms-auto">
                                <a href="logout.php">
                                    <button type="button" class="btn btn-dark logout">Logout</button>
                                </a>
                            </div>
                        <?php }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header text-white">
                        <h4 class="mb-0">Form Pemesanan</h4>
                    </div>
                    <div class="card-body">
                        <form action="terimakasih.html" method="get">

                            <div class="mb-3">
                                <label class="form-label">Nama Pembeli</label>
                                <input type="text" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Alamat Lengkap</label>
                                <textarea class="form-control" rows="3" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Nomor HP</label>
                                <input type="text" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Jumlah Pesanan</label>
                                <input type="number" class="form-control" min="1" value="1" required>
                            </div>

                            <div class="mb-3">
                               <label class="form-label">Metode Pembayaran</label><br>
                                <input type="radio" id="cod" name="metode" value="cod">
                                <label for="cod">Cash On Delivery</label><br>
                                <input type="radio" id="tf" name="metode" value="tf">
                                <label for="tf">Transfer Bank</label><br>
                                <input type="radio" id="qris" name="metode" value="qris">
                                <label for="qris">QRIS</label>
                            </div>
                            
                            <button type="submit" class="btn btn-success w-100">Submit Pesanan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-dark text-white text-center py-3 mt-4">
        <div class="container">
            <p class="mb-0">&copy; 2026 RezTech. All Rights Reserved.</p>
        </div>
    </footer>

</body>
</html>