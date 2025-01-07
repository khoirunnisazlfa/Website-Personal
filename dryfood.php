<?php
// Koneksi database
require_once 'db.php';

// Ambil produk yang memiliki kategori dryfood
$query = "SELECT * FROM products WHERE category = 'dryfood' ORDER BY name";
$stmt = $conn->prepare($query);
$stmt->execute();
$dryfood_products = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fungsi untuk menghasilkan rating acak antara 3 dan 5
function generateRandomRating() {
    return rand(3, 5);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dry Food Kucing</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #fce4ec;
            color: #333;
        }

        header {
            background: #f48fb1;
            color: white;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
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

        .menu {
            background: #f8bbd0;
            padding: 10px;
            display: flex;
            justify-content: center;
            gap: 15px;
            position: sticky;
            top: 60px;
            z-index: 999;
        }

        .menu a {
            text-decoration: none;
            color: #880e4f;
            padding: 8px 15px;
            background: #fce4ec;
            border-radius: 5px;
            transition: background 0.3s;
        }

        .menu a:hover {
            background: #f48fb1;
            color: white;
        }

        main {
            margin-top: 120px;
            padding: 20px;
        }

        .products {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: space-between;
        }

        .product {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            flex: 1 1 calc(16.666% - 20px);
            box-sizing: border-box;
            max-width: calc(16.666% - 20px);
        }

        .product img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .product h3 {
            color: #d81b60;
        }

        .rating {
            font-size: 18px;
            font-weight: bold;
            display: inline-block;
            margin: 10px 0;
        }

        .rating span {
            color: #d81b60;
            font-size: 20px;
        }

        .price {
            font-size: 16px;
            font-weight: bold;
            color: #d81b60;
            margin-top: 10px;
        }

        .btn-order {
            display: inline-block;
            background-color: #f48fb1;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 10px;
            transition: background-color 0.3s ease;
        }

        .btn-order:hover {
            background-color: #f06292;
        }
    </style>
</head>
<body>
    <header>
        <h1>Welcome!</h1>
        <nav>
            <a href="dashboard.php">Home</a>
            <a href="katalog.php">Katalog</a>
            <a href="tentang.php">Tentang Kami</a>
            <a href="profil.php">Profil</a>
        </nav>
    </header>

    <div class="menu">
        <a href="wetfood.php">Wet Food</a>
        <a href="dryfood.php">Dry Food</a>
        <a href="vitamin.php">Vitamin</a>
        <a href="snack.php">Snack</a>
        <a href="aksesoris.php">Aksesoris</a>
        <a href="pakaian.php">Pakaian</a>
        <a href="mainan.php">Mainan</a>
    </div>

    <main>
        <div class="center-text">
            <h2>Dry Food Kucing</h2>
            <p>Temukan berbagai pilihan makanan kering kucing dari berbagai merek yang lezat dan bergizi!</p>
        </div>

        <div class="products">
            <?php foreach ($dryfood_products as $product): ?>
                <?php $rating = generateRandomRating(); ?>
                <div class="product">
                    <img src="<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                    <h3><?php echo htmlspecialchars($product['name']); ?></h3>
                    <p class="rating">
                        <?php for ($i = 1; $i <= 5; $i++): ?>
                            <span><?php echo $i <= $rating ? '★' : '☆'; ?></span>
                        <?php endfor; ?>
                        (<?php echo $rating; ?>/5)
                    </p>
                    <p class="price">Rp <?php echo number_format($product['price'], 0, ',', '.'); ?></p>
                    <a href="payment_method.php?product_name=<?php echo urlencode($product['name']); ?>&product_price=<?php echo urlencode($product['price']); ?>&product_category=<?php echo urlencode($product['category']); ?>" class="btn-order">Pesan Sekarang</a>
                </div>
            <?php endforeach; ?>
        </div>
    </main>
</body>
</html>
