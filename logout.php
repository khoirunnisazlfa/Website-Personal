<?php
// logout.php
session_start();

if (isset($_GET['confirm']) && $_GET['confirm'] === 'yes') {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('https://i.pinimg.com/originals/31/3b/3f/313b3f82c9a2a349f8f9447dd12df29a.gif') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .confirmation {
            text-align: center;
            background: rgba(51, 51, 51, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 400px;
        }
        .confirmation h1 {
            color: #f48fb1;
            font-size: 18px;
            margin-bottom: 20px;
        }
        .btn {
            padding: 10px 20px;
            margin: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            color: #fff;
        }
        .btn-confirm {
            background-color: #d81b60;
        }
        .btn-cancel {
            background-color: #ad1457;
        }
        .btn:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>
    <div class="confirmation">
        <h1>Apakah Anda yakin ingin keluar dari halaman?</h1>
        <a href="logout.php?confirm=yes" class="btn btn-confirm">Ya</a>
        <a href="javascript:history.back()" class="btn btn-cancel">Tidak</a>
    </div>
</body>
</html>
