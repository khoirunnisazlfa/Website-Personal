<?php
session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

require_once 'db.php'; // Koneksi ke database

// Fungsi untuk menambahkan produk
if (isset($_POST['add_product'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $category = $_POST['category'];

    // Proses upload gambar
    $image = '';
    if (!empty($_FILES['image']['name'])) {
        $uploadDir = 'uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        $imagePath = $uploadDir . basename($_FILES['image']['name']);
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];

        if (in_array($_FILES['image']['type'], $allowedTypes)) {
            move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
            $image = $imagePath;
        }
    }

    // Simpan ke database
    $query = "INSERT INTO products (name, description, price, stock, category, image) VALUES (:name, :description, :price, :stock, :category, :image)";
    $stmt = $conn->prepare($query);
    $stmt->execute([
        ':name' => $name,
        ':description' => $description,
        ':price' => $price,
        ':stock' => $stock,
        ':category' => $category,
        ':image' => $image,
    ]);

    header("Location: product.php");
    exit;
}

// Fungsi untuk mengedit produk
if (isset($_POST['edit_product'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $category = $_POST['category'];

    // Proses upload gambar baru jika ada
    $image = $_POST['existing_image']; // jika tidak ada gambar baru, gunakan gambar lama
    if (!empty($_FILES['image']['name'])) {
        $uploadDir = 'uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        $imagePath = $uploadDir . basename($_FILES['image']['name']);
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];

        if (in_array($_FILES['image']['type'], $allowedTypes)) {
            move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
            $image = $imagePath;
        }
    }

    // Update database
    $query = "UPDATE products SET name = :name, description = :description, price = :price, stock = :stock, category = :category, image = :image WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->execute([
        ':name' => $name,
        ':description' => $description,
        ':price' => $price,
        ':stock' => $stock,
        ':category' => $category,
        ':image' => $image,
        ':id' => $id,
    ]);

    header("Location: product.php");
    exit;
}

// Fungsi untuk menghapus produk
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    // Hapus produk dari database
    $query = "DELETE FROM products WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->execute([':id' => $id]);

    header("Location: product.php");
    exit;
}

// Ambil data produk yang ingin diedit jika ada
$product = null;
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];

    // Ambil data produk berdasarkan ID
    $query = "SELECT * FROM products WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->execute([':id' => $id]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
}

// Ambil semua produk dari database
$query = "SELECT * FROM products ORDER BY category, name";
$stmt = $conn->prepare($query);
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Produk</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1c1c1c;
            color: #ffe8f2;
            margin: 0;
            padding: 20px;
        }
        header {
            background: #ad1457;
            color: #ffe8f2;
            padding: 10px;
            text-align: center;
        }
        form {
            margin-bottom: 20px;
            background: #2e2e2e;
            padding: 20px;
            border-radius: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #444;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #ad1457;
        }
        td {
            background-color: #2e2e2e;
        }
        .form-control {
            margin-bottom: 10px;
            width: 100%;
            padding: 10px;
            border: 1px solid #444;
            border-radius: 5px;
            background: #1c1c1c;
            color: #ffe8f2;
        }
        .btn {
            padding: 5px 10px;
            border: none;
            color: #ffe8f2;
            background-color: #ad1457;
            cursor: pointer;
            border-radius: 5px;
            font-size: 12px;
        }
        .btn:hover {
            background-color: #880e4f;
        }
        img {
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Kelola Produk</h1>
    </header>

    <!-- Formulir untuk menambah atau mengedit produk -->
    <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo isset($product) ? $product['id'] : ''; ?>">
        <input type="text" name="name" class="form-control" placeholder="Nama Produk" value="<?php echo isset($product) ? htmlspecialchars($product['name']) : ''; ?>" required>
        <textarea name="description" class="form-control" placeholder="Deskripsi Produk" required><?php echo isset($product) ? htmlspecialchars($product['description']) : ''; ?></textarea>
        <input type="number" name="price" class="form-control" placeholder="Harga" value="<?php echo isset($product) ? $product['price'] : ''; ?>" required>
        <input type="number" name="stock" class="form-control" placeholder="Stok" value="<?php echo isset($product) ? $product['stock'] : ''; ?>" required>
        <select name="category" class="form-control" required>
            <option value="wetfood" <?php echo isset($product) && $product['category'] == 'wetfood' ? 'selected' : ''; ?>>Wet Food</option>
            <option value="dryfood" <?php echo isset($product) && $product['category'] == 'dryfood' ? 'selected' : ''; ?>>Dry Food</option>
            <option value="vitamin" <?php echo isset($product) && $product['category'] == 'vitamin' ? 'selected' : ''; ?>>Vitamin</option>
            <option value="snack" <?php echo isset($product) && $product['category'] == 'snack' ? 'selected' : ''; ?>>Snack</option>
            <option value="mainan" <?php echo isset($product) && $product['category'] == 'mainan' ? 'selected' : ''; ?>>Mainan</option>
            <option value="aksesoris" <?php echo isset($product) && $product['category'] == 'aksesoris' ? 'selected' : ''; ?>>Aksesoris</option>
            <option value="pakaian" <?php echo isset($product) && $product['category'] == 'pakaian' ? 'selected' : ''; ?>>Pakaian</option>
        </select>
        <input type="file" name="image" class="form-control" accept="image/*">
        <button type="submit" name="<?php echo isset($product) ? 'edit_product' : 'add_product'; ?>" class="btn">
            <?php echo isset($product) ? 'Update Produk' : 'Tambah Produk'; ?>
        </button>
    </form>

    <!-- Tabel Daftar Produk -->
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Kategori</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?php echo htmlspecialchars($product['name']); ?></td>
                    <td><?php echo htmlspecialchars($product['description']); ?></td>
                    <td>Rp<?php echo number_format($product['price'], 0, ',', '.'); ?></td>
                    <td><?php echo htmlspecialchars($product['stock']); ?></td>
                    <td><?php echo htmlspecialchars($product['category']); ?></td>
                    <td><img src="<?php echo htmlspecialchars($product['image']); ?>" alt="Produk" width="50"></td>
                    <td>
                        <a href="product.php?edit=<?php echo $product['id']; ?>" class="btn">Edit</a>
                        <a href="product.php?delete=<?php echo $product['id']; ?>" class="btn" onclick="return confirm('Yakin ingin menghapus produk ini?');">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
