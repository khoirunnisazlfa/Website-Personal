<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Produk Kucing</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #fce4ec;
            color: #333;
            cursor: none; /* Hide the default cursor */
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
            box-sizing: border-box;
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

        .login-button {
            padding: 10px;
            background-color: rgb(70, 24, 39);
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
            position: absolute;
            right: 20px; /* Ensures it's placed correctly */
            top: 50%; /* Centers it vertically */
            transform: translateY(-50%);
        }

        .login-button:hover {
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
            flex: 1 1 calc(33.333% - 20px);
            box-sizing: border-box;
            max-width: calc(33.333% - 20px);
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

        .rating {
            font-size: 18px;
            font-weight: bold;
            display: inline-block;
            margin: 10px 0;
        }

        .rating span {
            color: #d81b60;
            font-size: 20px;
            transition: transform 0.3s ease-in-out;
        }

        .rating span:hover {
            transform: scale(1.3);
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

        /* Custom Cursor styles */
        .cursor {
            position: absolute;
            width: 50px;
            height: 50px;
            pointer-events: none;
            transform: translate(-50%, -50%);
            transition: transform 0.1s ease;
            background-image: url('https://png.pngtree.com/png-clipart/20220530/original/pngtree-cute-pink-cat-paw-vector-png-image_7770332.png');
            background-size: cover;
        }

        .cursor:hover {
            transform: translate(-50%, -50%) scale(1.5);
        }

        /* Particle effect styles for cursor trail */
        .particle {
            position: absolute;
            width: 6px;
            height: 6px;
            background-color: #800000; /* Maroon for particles */
            border-radius: 50%;
            animation: particle-animation 0.6s forwards;
        }

        @keyframes particle-animation {
            to {
                transform: translate(var(--x), var(--y));
                opacity: 0;
            }
        }

        /* Hide the audio controls */
        audio {
            display: none;
        }
    </style>
</head>
<body>
    <header>
        <h1>MITI Product</h1>
        <nav>
            <a href="dashboard.php">Home</a>
            <a href="katalog.php">Katalog</a>
            <a href="tentang.php">Tentang Kami</a>
            <a href="profil.php">Profil</a>
            <a href="game.php">Game</a>
        </nav>
        <form method="POST" action="login.php" style="display: inline;">
            <button type="submit" class="login-button">Login</button>
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
            <h2>Best Seller Bulan Ini</h2>
        </div>

        <div id="products" class="products">
            <div class="product">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSiKMm2qIDUI-Mdo960uV1_ZI1P0TAy-xvS7w&s" alt="Makanan Kering Kucing">
                <h3>Royal Canin</h3>
                <p>Makanan Kering Untuk Kucing.</p>
                <p class="rating">
                    <span>★</span>
                    <span>★</span>
                    <span>★</span>
                    <span>★</span>
                    <span>★</span> (5/5)
                </p>
                <p class="price">Rp 250.000</p>
            </div>
            <div class="product">
                <img src="https://images.tokopedia.net/img/cache/700/VqbcmM/2021/11/23/39cc0fc6-5bac-4deb-a0db-1abd9e991da0.jpg" alt="Dry Food Kucing">
                <h3>Whiskas</h3>
                <p>Harganya yang terjangkau dan rasanya yang lezat, produk ini paling digemari oleh pecinta kucing.</p>
                <p class="rating">
                    <span>★</span>
                    <span>★</span>
                    <span>★</span>
                    <span>★</span>
                    <span>★</span> (5/5)
                </p>
                <p class="price">Rp 55.000</p>
            </div>
            <div class="product">
                <img src="https://i.pinimg.com/736x/52/e0/b7/52e0b726a88a79e47be2f8e01c910817.jpg" alt="Makanan Basah Kucing">
                <h3>ME-O Snack</h3>
                <p>Ideal untuk kucing dengan rasa lembut yang disukai kucing kesayangan Anda.</p>
                <p class="rating">
                    <span>★</span>
                    <span>★</span>
                    <span>★</span>
                    <span>★</span>
                    <span>★</span> (5/5)
                </p>
                <p class="price">Rp 50.000</p>
            </div>
            <div class="product">
                <img src="https://id-live-01.slatic.net/p/7970aea1315e380dcfa9ae66fd8d7bb5.jpg" alt="Vitamin Kucing">
                <h3>Vitamin</h3>
                <p>Membuat anabul kamu menjadi lebih sehat dan gemoy karena nafsu makan yang meningkat.</p>
                <p class="rating">
                    <span>★</span>
                    <span>★</span>
                    <span>★</span>
                    <span>★</span>
                    <span>★</span> (5/5)
                </p>
                <p class="price">Rp 220.000</p>
            </div>
            <div class="product">
                <img src="https://images.tokopedia.net/img/cache/1500/VqbcmM/2024/6/18/75f41667-e155-4064-815b-5b0be8953f16.jpg" alt="Snack Kucing">
                <h3>Shampoo</h3>
                <p>Hilangkan kutu yang membandel dari kulit anabul kamu.</p>
                <p class="rating">
                    <span>★</span>
                    <span>★</span>
                    <span>★</span>
                    <span>★</span>
                    <span>★</span> (5/5)
                </p>
                <p class="price">Rp 375.000</p>
            </div>
            <div class="product">
                <img src="https://s3.bukalapak.com/img/83232439792/s-463-463/data.png.webp" alt="Aksesoris Kucing">
                <h3>Aksesoris Kucing</h3>
                <p>Bikin anabul ketjeh dan mempesona.</p>
                <p class="rating">
                    <span>★</span>
                    <span>★</span>
                    <span>★</span>
                    <span>★</span>
                    <span>★</span> (5/5)
                </p>
                <p class="price">Rp 50.000</p>
            </div>
        </div>
    </main>

    <!-- Custom Cursor JS -->
    <div class="cursor" id="cursor"></div>

    <!-- Audio Player with Auto Play -->
    <audio autoplay loop>
        <source src="yungkai.mp3" type="audio/mp3">
        Your browser does not support the audio element.
    </audio>

    <script>
        const cursor = document.getElementById('cursor');

        document.addEventListener('mousemove', (e) => {
            cursor.style.left = `${e.pageX}px`;
            cursor.style.top = `${e.pageY}px`;
        });
    </script>
</body>
</html>
