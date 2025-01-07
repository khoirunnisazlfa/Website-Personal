<?php
// produk.php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk Kucing</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #fce4ec; /* Light pink background */
            color: #333;
        }
        header {
            background: #f48fb1; /* Soft pink header */
            color: white;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        header h1 {
            margin: 0;
        }
        header nav a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
        }
        header nav a:hover {
            text-decoration: underline;
        }
        main {
            margin: 20px;
        }

        .products {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-top: 30px;
        }

        .product {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .product img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .product h3 {
            color: #d81b60;
        }

        .product p {
            font-size: 14px;
            color: #666;
        }

        .price {
            font-size: 18px;
            font-weight: bold;
            color: #d81b60;
        }

        .buy-button {
            padding: 10px 20px;
            background-color: #f48fb1;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            margin-top: 10px;
            text-decoration: none;
        }

        .buy-button:hover {
            background-color: #f06292;
        }
    </style>
</head>
<body>
    <header>
        <h1>Welcome, <?php echo $user; ?>!</h1>
        <nav>
            <a href="dashboard.php">Home</a>
            <a href="produk.php">Produk</a>
            <a href="tentang.php">Tentang Kami</a>
            <a href="profil.php">Profil</a>
        </nav>
        <form method="POST" action="logout.php" style="display: inline;">
            <button type="submit" class="logout-button">Logout</button>
        </form>
    </header>
    
    <main>
        <h2>Produk Kucing Kami</h2>

        <div class="products">
            <!-- Product 1 -->
            <div class="product">
                <img src="https://down-id.img.susercontent.com/file/id-11134207-7qul7-liee1whkvas84c" alt="Produk 1">
                <h3>WET FOOD</h3>
                <a href="pembayaran.php?product=1&name=Makanan+Kering+Kucing&price=50000" class="buy-button">Pesan Sekarang</a>
            </div>

            <!-- Product 2 -->
            <div class="product">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSiKMm2qIDUI-Mdo960uV1_ZI1P0TAy-xvS7w&s" alt="Produk 2">
                <h3>DRY FOOD</h3>
                <a href="pembayaran.php?product=2&name=Makanan+Basah+Kucing&price=60000" class="buy-button">Pesan Sekarang</a>
            </div>

            <!-- Product 3 -->
            <div class="product">
                <img src="https://upload.jaknot.com/2022/08/images/products/0084bd/original/lavigne-mainan-cakaran-kucing-bola-aroma-catnip-scratcher-ball-lv-95.jpg" alt="Produk 3">
                <h3>MAINAN</h3>
                <a href="pembayaran.php?product=3&name=Snack+Kucing&price=30000" class="buy-button">Pesan Sekarang</a>
            </div>

            <!-- Product 4 -->
            <div class="product">
                <img src="https://id-live-01.slatic.net/p/7970aea1315e380dcfa9ae66fd8d7bb5.jpg" alt="Produk 4">
                <h3>VITAMIN</h3>
                <a href="pembayaran.php?product=4&name=Susu+Kucing&price=40000" class="buy-button">Pesan Sekarang</a>
            </div>

            <!-- Product 5 -->
            <div class="product">
                <img src="https://i.pinimg.com/736x/52/e0/b7/52e0b726a88a79e47be2f8e01c910817.jpg" alt="Produk 5">
                <h3>SNACK</h3>
                <a href="pembayaran.php?product=5&name=Cat+Litter&price=20000" class="buy-button">Pesan Sekarang</a>
            </div>
             <!-- Product 6 -->
             <div class="product">
                <img src="https://s3.bukalapak.com/img/83232439792/s-463-463/data.png.webp" alt="Produk 5">
                <h3>AKSESORIS</h3>
                <a href="pembayaran.php?product=5&name=Cat+Litter&price=20000" class="buy-button">Pesan Sekarang</a>
            </div>
             <!-- Product 7 -->
             <div class="product">
                <img src="https://down-id.img.susercontent.com/file/sg-11134202-22110-m45yumrygnjv22" alt="Produk 5">
                <h3>PAKAIAN</h3>
                <a href="pembayaran.php?product=5&name=Cat+Litter&price=20000" class="buy-button">Pesan Sekarang</a>
            </div>
        </div>
    </main>

</body>
</html>
