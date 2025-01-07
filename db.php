<?php
// db.php

$host = 'localhost'; // Alamat server database
$dbname = 'miti_petshop'; // Nama database yang ingin Anda gunakan
$username = 'root'; // Username untuk login ke database
$password = ''; // Password untuk login ke database

try {
    // Membuat koneksi PDO ke database
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set mode error PDO ke exception untuk debugging
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Menangani error koneksi jika gagal
    echo "Koneksi gagal: " . $e->getMessage();
    die();
}
?>
