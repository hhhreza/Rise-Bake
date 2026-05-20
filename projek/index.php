<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rise & Bake</title>
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
    <main>
        <section class="content-1">
            <div class="wrap-headline">
                <h1 class="headline">Rise & Bake</h1>
                <p class="sub-headline">Freshly Baked, Every Single Day</p>
            </div>
        </section>
        <section class="content-2">
            <div class="wrap-advantage-image">
                <div class="wrap-advantage">
                    <h1 class="advantage-call">Your Perfect Bite <br> Starts Here!</h1>
                    <div class="advantage-list">
                        <div class="adv-items">
                            <h4>Freshly Baked</h4>
                            <p>Baked fresh every morning to make sure every bite is delicious.</p>
                        </div>
                        <div class="adv-items">
                            <h4>Ethically Sourced</h4>
                            <p>Ethically sourced ingridients that support sustainability and local farmers.</p>
                        </div>
                        <div class="adv-items">
                            <h4>Authentics Taste</h4>
                            <p>Made by expert hands using a recipe that preserves its authenticity.</p>
                        </div>
                    </div>
                </div>
                <div class="gambar">
                    <img class="img-bagel" src="Gambar/Bagel No Background.png" alt="Bagel">
                </div>
            </div>
            <div class="wrap-cta-image">
                <div class="gambar-2">
                    <img class="img-pastry" src="Gambar/Pastry 1 No Background.png" alt="Pastry-1">
                    <img class="img-pastry" src="Gambar/Pastry 2 No Background.png" alt="Pastry-2">
                    <img class="img-pastry" src="Gambar/Pastry 3 No Background.png" alt="Pastry-3">
                </div>
                <div class="wrap-cta">
                    <h1 class="cta">Explore Our Menu</h1>
                    <a role="button" href="list_produk.php" class="btn btn-secondary btn-explore">Product</a>
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