<?php
// Koneksi database
require_once 'db.php';

// Ambil produk yang memiliki kategori vitamin
$query = "SELECT * FROM products WHERE category = 'vitamin' ORDER BY name";
$stmt = $conn->prepare($query);
$stmt->execute();
$vitamin_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vitamin Kucing</title>
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

        .logout-button {
            padding: 10px;
            background-color: #f48fb1;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
            margin-left: 10px;
        }

        .logout-button:hover {
            background-color: #f06292;
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
            flex: 1 1 calc(16.666% - 20px); /* Menampilkan 6 produk dalam satu baris */
            box-sizing: border-box;
            max-width: calc(16.666% - 20px); /* Mengatur maksimal lebar produk */
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
            color: #d81b60; /* Pink */
            font-size: 20px;
            transition: transform 0.3s ease-in-out;
        }

        .rating span:hover {
            transform: scale(1.3); /* Efek zoom pada bintang saat hover */
        }

        .price {
            font-size: 16px;
            font-weight: bold;
            color: #d81b60;
            margin-top: 10px;
        }

        .center-text {
            text-align: center;
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
        <h1>Welcome, MITI Lovers</h1>
        <nav>
            <a href="dashboard.php">Home</a>
            <a href="katalog.php">Katalog</a>
            <a href="tentang.php">Tentang Kami</a>
            <a href="profil.php">Profil</a>
        </nav>
        <form method="POST" action="logout.php" style="display: inline;">
            <button type="submit" class="logout-button">Logout</button>
        </form>
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
            <h2>Vitamin Kucing</h2>
            <p>Temukan berbagai pilihan vitamin kucing dari berbagai merek yang berkualitas!</p>
        </div>

        <div class="products">
            <?php foreach ($vitamin_products as $product): ?>
                <div class="product">
                    <img src="<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                    <h3><?php echo htmlspecialchars($product['name']); ?></h3>
                    <p class="rating">
                        <span>★</span>
                        <span>★</span>
                        <span>★</span>
                        <span>★</span>
                        <span>★</span> (5/5)
                    </p>
                    <p class="price">Rp <?php echo number_format($product['price'], 0, ',', '.'); ?></p>
                    <a href="payment_method.php?product_name=<?php echo urlencode($product['name']); ?>&product_price=<?php echo urlencode($product['price']); ?>&product_category=<?php echo urlencode($product['category']); ?>" class="btn-order">Pesan Sekarang</a>
                </div>
            <?php endforeach; ?>
        </div>
    </main>
</body>
</html>
