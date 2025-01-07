<?php
echo '<pre>';
print_r($_GET); // Menampilkan semua data yang dikirim melalui URL
echo '</pre>';
// Mengambil data produk dari URL
$product_name = $_GET['name'] ?? '';
$product_price = $_GET['price'] ?? '';
$category = $_GET['category'] ?? '';
$product_image = $_GET['image'] ?? '';

// Validasi jika URL gambar tidak ditemukan atau tidak valid
$image_error_message = '';
if (empty($product_image)) {
    $image_error_message = 'Gambar tidak tersedia untuk produk ini.';
} elseif (!filter_var($product_image, FILTER_VALIDATE_URL) && !file_exists($product_image)) {
    $image_error_message = 'URL gambar tidak valid atau file gambar tidak ditemukan.';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Method</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f3f3;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .product-image {
            text-align: center;
            margin-bottom: 20px;
        }
        .product-image img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }
        .product-image .error-message {
            color: #d81b60;
            font-weight: bold;
        }
        h1 {
            color: #d81b60;
            text-align: center;
        }
        p {
            font-size: 16px;
            line-height: 1.5;
        }
        .btn-payment {
            display: inline-block;
            margin: 10px 5px;
            padding: 10px 20px;
            background-color: #d81b60;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
        }
        .btn-payment:hover {
            background-color: #ad1457;
        }
        .payment-options {
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Payment Method</h1>

    <div class="product-image">
        <?php if (empty($image_error_message)): ?>
            <img src="<?php echo htmlspecialchars($product_image); ?>" alt="<?php echo htmlspecialchars($product_name); ?>">
        <?php else: ?>
            <p class="error-message"><?php echo $image_error_message; ?></p>
        <?php endif; ?>
    </div>

    <p><strong>Product:</strong> <?php echo htmlspecialchars($product_name); ?></p>
    <p><strong>Category:</strong> <?php echo htmlspecialchars($category); ?></p>
    <p><strong>Price:</strong> Rp <?php echo number_format($product_price, 0, ',', '.'); ?></p>

    <h3>Select Payment Method</h3>
    <div class="payment-options">
        <a href="bank_transfer.php?name=<?php echo urlencode($product_name); ?>&price=<?php echo urlencode($product_price); ?>&category=<?php echo urlencode($category); ?>&image=<?php echo urlencode($product_image); ?>" class="btn-payment">Bank Transfer</a>
        <a href="paypal.php?name=<?php echo urlencode($product_name); ?>&price=<?php echo urlencode($product_price); ?>&category=<?php echo urlencode($category); ?>&image=<?php echo urlencode($product_image); ?>" class="btn-payment">PayPal</a>
        <a href="whatsapp.php?name=<?php echo urlencode($product_name); ?>&price=<?php echo urlencode($product_price); ?>&category=<?php echo urlencode($category); ?>&image=<?php echo urlencode($product_image); ?>" class="btn-payment">WhatsApp Payment</a>
    </div>
</div>

</body>
</html>
