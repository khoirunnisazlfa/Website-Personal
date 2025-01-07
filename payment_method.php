<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

$user = $_SESSION['user'];

// Koneksi database
require_once 'db.php';

// Ambil data produk yang dikirim melalui URL
$product_name = isset($_GET['product_name']) ? $_GET['product_name'] : '';
$product_price = isset($_GET['product_price']) ? $_GET['product_price'] : 0;
$product_category = isset($_GET['product_category']) ? $_GET['product_category'] : '';

// Jika form dibeli telah disubmit, update stok produk dan beri pesan sukses
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $address = $_POST['address'];
    $subdistrict = $_POST['subdistrict'];
    $district = $_POST['district'];
    $village = $_POST['village'];
    $rt_rw = $_POST['rt_rw'];
    $payment_method = $_POST['payment_method'];
    $account_number = isset($_POST['account_number']) ? $_POST['account_number'] : '';

    // Update stok produk
    $query = "UPDATE products SET stock = stock - 1 WHERE name = :product_name";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':product_name', $product_name);
    $stmt->execute();

    // Tampilkan pesan sukses pembayaran
    $message = "Pembayaran berhasil! Stok produk telah diperbarui.";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Metode Pembayaran</title>
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

        .content {
            padding: 100px 20px;
        }

        .product-details {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .form-container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .form-container label {
            display: block;
            margin-bottom: 10px;
        }

        .form-container input, .form-container select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        .form-container button {
            background-color: #f48fb1;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }

        .form-container button:hover {
            background-color: #f06292;
        }

        .message {
            font-size: 18px;
            color: green;
            margin-top: 20px;
        }

        .additional-info {
            display: none;
            margin-top: 10px;
        }
    </style>
    <script>
        // Fungsi untuk menampilkan input tambahan berdasarkan metode pembayaran
        function showPaymentDetails(paymentMethod) {
            const additionalInfo = document.getElementById('additional-info');
            const accountNumberInput = document.getElementById('account_number');
            if (paymentMethod === 'Transfer Bank' || paymentMethod === 'Gopay' || paymentMethod === 'OVO' || paymentMethod === 'DANA') {
                additionalInfo.style.display = 'block';
                accountNumberInput.placeholder = `Masukkan nomor ${paymentMethod}`;
            } else {
                additionalInfo.style.display = 'none';
            }
        }
    </script>
</head>
<body>
    <header>
        <h1>Welcome, <?php echo $user; ?>!</h1>
    </header>

    <div class="content">
        <div class="product-details">
            <h2>Detail Produk yang Dibeli</h2>
            <p>Nama Produk: <?php echo htmlspecialchars($product_name); ?></p>
            <p>Harga: Rp <?php echo number_format($product_price, 0, ',', '.'); ?></p>
            <p>Kategori: <?php echo htmlspecialchars($product_category); ?></p>
        </div>

        <?php if (isset($message)): ?>
            <div class="message"><?php echo $message; ?></div>
        <?php endif; ?>

        <div class="form-container">
            <h2>Isi Data Pembayaran</h2>
            <form method="POST" action="">
                <label for="address">Alamat Pengiriman</label>
                <input type="text" id="address" name="address" required placeholder="Alamat Lengkap">

                <label for="subdistrict">Kecamatan</label>
                <input type="text" id="subdistrict" name="subdistrict" required>

                <label for="district">Kabupaten/Kota</label>
                <input type="text" id="district" name="district" required>

                <label for="village">Desa/Kelurahan</label>
                <input type="text" id="village" name="village" required>

                <label for="rt_rw">RT/RW</label>
                <input type="text" id="rt_rw" name="rt_rw" required>

                <label for="payment_method">Metode Pembayaran</label>
                <select id="payment_method" name="payment_method" required onchange="showPaymentDetails(this.value)">
                    <option value="Transfer Bank">Transfer Bank</option>
                    <option value="Kartu Kredit">Kartu Kredit</option>
                    <option value="Gopay">Gopay</option>
                    <option value="OVO">OVO</option>
                    <option value="DANA">DANA</option>
                </select>

                <div id="additional-info" class="additional-info">
                    <label for="account_number">Nomor Rekening/ID</label>
                    <input type="text" id="account_number" name="account_number" placeholder="Masukkan nomor rekening atau ID">
                </div>

                <button type="submit">Konfirmasi Pembayaran</button>
            </form>
        </div>
    </div>
</body>
</html>
