<?php
session_start();
include 'koneksi.php';

$query = "SELECT * FROM list_produk";
$result = mysqli_query($koneksi, $query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Produk</title>
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
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="list_produk.php">Products</a>
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
                        <div class="logout-button ms-auto">
                            <a href="logout.php">
                                <button type="button" class="btn btn-dark logout">Logout</button>
                            </a>
                        </div>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main class="base-produk">
        <div class="title-product-page mb-5">
            <h1 style="font-size: 64px;">Our Products</h1>
        </div>
        <div class="wrapper-produk container">
            <div class="parent-card row gy-4">
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    
                
                <div class="col-md-4">
                    <div class="card h-100">
                        <img src="<?php echo $row['gambar']; ?>" class="card-img-top" alt="Croissant">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['nama_produk']; ?></h5>
                            <p class="card-text"><?php echo $row['deskripsi']; ?></p>
                            <p class="card-text"><small class="text-body-secondary">Price: <?php echo $row['harga']; ?></small></p>
                        </div>
                    </div>
                </div>
                <?php }
                ?>
            </div>
        </div>
    </main>
</body>
</html>