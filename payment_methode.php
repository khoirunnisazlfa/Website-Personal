<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

$user = $_SESSION['user'];

// Check if the product data is passed through URL
if (isset($_GET['product']) && isset($_GET['name']) && isset($_GET['price']) && isset($_GET['category'])) {
    $product_id = $_GET['product'];
    $product_name = $_GET['name'];
    $product_price = $_GET['price'];
    $category = $_GET['category']; // Get the product category
} else {
    // Redirect to the home page if there's no product data
    header("Location: dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proses Pembayaran</title>
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
            text-align: center;
        }
        .order-details {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }
        .order-details h2 {
            color: #d81b60;
        }
        .order-details p {
            font-size: 16px;
            margin: 10px 0;
        }
        .payment-methods {
            margin: 20px 0;
        }
        .payment-option {
            display: inline-block;
            padding: 10px 30px;
            background-color: #f48fb1;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }
        .payment-option:hover {
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
        <!-- Order Details -->
        <div class="order-details">
            <h2>Detail Pembelian</h2>
            <p><strong>Nama Produk:</strong> <?php echo htmlspecialchars($product_name); ?></p>
            <p><strong>Kategori:</strong> <?php echo htmlspecialchars($category); ?></p>
            <p><strong>Harga:</strong> Rp <?php echo number_format($product_price, 0, ',', '.'); ?></p>
        </div>

        <!-- Select Payment Method -->
        <div class="payment-methods">
            <h3>Pilih Metode Pembayaran:</h3>
            <!-- Direct links to payment methods -->
            <a href="payment_confirmation.php?product=<?php echo urlencode($product_id); ?>&name=<?php echo urlencode($product_name); ?>&price=<?php echo urlencode($product_price); ?>&category=<?php echo urlencode($category); ?>" class="payment-option">Transfer Bank</a><br>
            <a href="payment_confirmation.php?product=<?php echo urlencode($product_id); ?>&name=<?php echo urlencode($product_name); ?>&price=<?php echo urlencode($product_price); ?>&category=<?php echo urlencode($category); ?>" class="payment-option">PayPal</a><br>
            <a href="payment_confirmation.php?product=<?php echo urlencode($product_id); ?>&name=<?php echo urlencode($product_name); ?>&price=<?php echo urlencode($product_price); ?>&category=<?php echo urlencode($category); ?>" class="payment-option">Pembayaran via WhatsApp</a>
        </div>
    </main>

</body>
</html>
