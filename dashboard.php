<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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

        .login-button {
            padding: 10px 20px;
            color: #fff;
            background:rgb(132, 56, 59);
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .slider {
            max-width: 100%;
            margin: 20px auto;
            overflow: hidden;
            position: relative;
        }

        .slider img {
            width: 100%;
            display: block;
        }

        .slider-container {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .slider-buttons {
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            display: flex;
            justify-content: space-between;
            transform: translateY(-50%);
        }

        .slider-button {
            background: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            font-size: 20px;
        }

        .categories-wrapper {
            position: relative;
            overflow: hidden;
            max-width: 100%;
        }

        .categories {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .category {
            flex: 0 0 auto;
            width: 200px;
            margin-right: 20px;
            background: white;
            padding: 10px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .category img {
            width: 100%;
            border-radius: 10px;
        }

        .reviews-section {
            margin-top: 40px;
        }

        .review {
            background-color: #f8bbd0;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 8px;
        }

        .review p {
            margin: 0;
            font-size: 14px;
        }

        .review .name {
            font-weight: bold;
        }

        .review .rating {
            color: #ff9800;
        }

        .review-form {
            background-color: #fce4ec;
            padding: 15px;
            border-radius: 8px;
            margin-top: 20px;
        }

        .review-form input, .review-form textarea {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        .review-form button {
            background-color: #f48fb1;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .review-form button:hover {
            background-color: #f06292;
        }

        iframe {
            width: 100%;
            height: 400px;
            border: none;
        }

        /* Article Section Styles */
        .articles-section {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 40px;
        }

        .article {
            width: calc(25% - 20px); /* 4 articles in a row */
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .article:hover {
            transform: scale(1.05);
        }

        .article img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .article-content {
            padding: 15px;
        }

        .article-content h4 {
            margin: 0;
            font-size: 18px;
        }

        .article-content p {
            margin: 10px 0;
            font-size: 14px;
            color: #666;
        }

        .article-content a {
            text-decoration: none;
            color: #f48fb1;
        }

    </style>
</head>
<body>
    <header>
        <h1>MITI PetShop</h1>
        <nav>
            <a href="dashboard.php">Home</a>
            <a href="katalog.php">katalog</a>
            <a href="tentang.php">About</a>
            <a href="profil.php">Profile</a>
            <a href="game.php">Game</a>
        </nav>
        <form method="POST" action="login.php" style="display: inline;">
            <button type="submit" class="login-button">Login</button>
        </form>
    </header>
    <main>
        <!-- Banner Slider -->
        <section class="slider">
            <div class="slider-container" id="slider-container">
                <img src="banner1.jpg" alt="Banner 1">
            </div>
            <section class="slider">
            <div class="slider-container" id="slider-container">
                <img src="banner3.jpg" alt="Banner 2">
            </div>
        </section>
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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

        .logout-button {
            padding: 10px 20px;
            color: #fff;
            background: #d9534f;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .slider {
            max-width: 100%;
            margin: 20px auto;
            overflow: hidden;
            position: relative;
        }

        .slider img {
            width: 100%;
            display: block;
        }

        .slider-container {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .slider-buttons {
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            display: flex;
            justify-content: space-between;
            transform: translateY(-50%);
        }

        .slider-button {
            background: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            font-size: 20px;
        }

        .categories-wrapper {
            position: relative;
            overflow: hidden;
            max-width: 100%;
        }

        .categories {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .category {
            flex: 0 0 auto;
            width: 200px;
            margin-right: 20px;
            background: white;
            padding: 10px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .category img {
            width: 100%;
            border-radius: 10px;
        }

        .info-section {
            background-color: #333;
            color: white;
            padding: 20px 0;
            display: flex;
            justify-content: center;
            text-align: center;
        }

        .info-box {
            margin: 0 20px;
            max-width: 300px;
        }

        .info-box img {
            width: 50px;
            margin-bottom: 10px;
        }

        .info-box p {
            font-size: 14px;
            margin: 0;
        }

        .info-box h3 {
            color: #f48fb1;
            margin: 10px 0;
        }

        .reviews-section {
            margin-top: 40px;
        }

        .review {
            background-color: #f8bbd0;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 8px;
        }

        .review p {
            margin: 0;
            font-size: 14px;
        }

        .review .name {
            font-weight: bold;
        }

        .review .rating {
            color: #ff9800;
        }

        iframe {
            width: 100%;
            height: 400px;
            border: none;
        }
    </style>

        <!-- Info Section -->
        <section class="info-section">
            <div class="info-box">
                <img src="logo1.jpg" alt="Icon 1">
                <h3>Makanan Sehat</h3>
                <p>Makanan kami yang lezat akan memuaskan kucing kesayangan Anda dan menjaganya agar tetap fit.</p>
            </div>
            <div class="info-box">
                <img src="logo2.jpg" alt="Icon 2">
                <h3>Komitmen Kami</h3>
                <p>Kami berkomitmen menggunakan 100% ikan dari sumber berkelanjutan untuk melindungi lautan.</p>
            </div>
            <div class="info-box">
                <img src="logo3.jpg" alt="Icon 3">
                <h3>Aksesoris</h3>
                <p>Menyediakan berbagai aksesoris kucing yang kiyowo dan modis, sehingga membuat penampilan anabul menjadi lebih ketcjeh.</p>
            </div>
        </section>
        
      
    <script>
        let bannerIndex = 0;
        const sliderContainer = document.getElementById('slider-container');
        const banners = sliderContainer.children;

        function showBanner(index) {
            const offset = -index * 100;
            sliderContainer.style.transform = translateX(${offset}%);
        }

        document.getElementById('prev').addEventListener('click', () => {
            bannerIndex = (bannerIndex - 1 + banners.length) % banners.length;
            showBanner(bannerIndex);
        });

        document.getElementById('next').addEventListener('click', () => {
            bannerIndex = (bannerIndex + 1) % banners.length;
            showBanner(bannerIndex);
        });

        setInterval(() => {
            bannerIndex = (bannerIndex + 1) % banners.length;
            showBanner(bannerIndex);
        }, 3000);
    </script>

        <!-- Product Section -->
        <section class="categories-wrapper">
            <div class="categories" id="categories">
                <div class="category">
                    <img src="https://bahagiapetshop.co.id/wp-content/uploads/2023/12/Royal-Canin-INDOOR27Makanan-Kering-Kucing-Dry-2kg.jpg" alt="Produk 1">
                    <p>Makanan Kering</p>
                </div>
                <div class="category">
                    <img src="https://cf.shopee.co.id/file/e770b3e5976df2f13217df3e79334551" alt="Produk 2">
                    <p>Makanan Basah</p>
                </div>
                <div class="category">
                    <img src="https://www.static-src.com/wcsstore/Indraprastha/images/catalog/full/98/MTA-27465416/no_brand_meo_creamy_treats_cakalang-snack_kucing_15gr__full01_mxnen5lh.jpg" alt="Produk 3">
                    <p>Snack Kucing</p>
                </div>
                <div class="category">
                    <img src="https://www.desain.id/blog/storage/uploads/contents/1041/Baju%20kucing%20dengan%20motif%20musim%20dingin.png" alt="Produk 4">
                    <p>Pakaian Kucing</p>
                </div>
                <div class="category">
                    <img src="https://cf.shopee.co.id/file/sg-11134201-22100-1cco7flec2iv18" alt="Produk 5">
                    <p>Aksesoris Kucing</p>
                </div>
                <div class="category">
                    <img src="https://cf.shopee.co.id/file/7b1f0a205e8bae3876ed5bf6e119f35c" alt="Produk 6">
                    <p>Vitamin Kucing</p>
                </div>
                <div class="category">
                    <img src="https://cf.shopee.co.id/file/e72eafa0935afda150889497b0377f2d" alt="Produk 7">
                    <p>Shampoo</p>
                </div>
                <div class="category">
                    <img src="https://i1.wp.com/www.theweddingvowsg.com/wp-content/uploads/2021/05/Mainan-Kucing-3-In-1-Tower.jpg?resize=900%2C900&ssl=1" alt="Produk 8">
                    <p>Mainan Kucing</p>
                </div>
            </div>
        </section>

        <!-- Article Section -->
        <section class="articles-section">
            <div class="article">
                <img src="https://www.mipacko.com/wp-content/uploads/2023/02/kucing-jpg.webp" alt="Article 1">
                <div class="article-content">
                    <h4>Perawatan Kucing Agar Sehat</h4>
                    <p>Mempelajari cara merawat kucing yang baik untuk menjaga kesehatannya. Menjaga kebersihan dan memberi makan yang tepat sangat penting...</p>
                    <a href="https://example.com/article1" target="_blank">Baca Selengkapnya</a>
                </div>
            </div>
            <div class="article">
                <img src="https://images.tokopedia.net/blog-tokopedia-com/uploads/2017/09/Mainan-kucing.jpg" alt="Article 2">
                <div class="article-content">
                    <h4>Tips Memilih Mainan Kucing</h4>
                    <p>Mainan kucing dapat meningkatkan aktivitas fisik dan mental kucing. Berikut beberapa tips memilih mainan yang baik untuk kucing...</p>
                    <a href="https://example.com/article2" target="_blank">Baca Selengkapnya</a>
                </div>
            </div>
            <div class="article">
                <img src="https://www.purina.co.id/sites/default/files/2022-08/Jenis_Makanan_Kucing_yang_Perlu_Diketahui-teaser.jpg" alt="Article 3">
                <div class="article-content">
                    <h4>Jenis-jenis Makanan Kucing</h4>
                    <p>Memahami berbagai jenis makanan kucing sangat penting untuk memberi makan dengan seimbang. Pilih makanan yang sesuai dengan kebutuhan gizi...</p>
                    <a href="https://example.com/article3" target="_blank">Baca Selengkapnya</a>
                </div>
            </div>
            <div class="article">
                <img src="https://ica.or.id/wp-content/uploads/2022/01/nathalie-jolie-nKzeG3iE_Qg-unsplash-scaled.jpg" alt="Article 4">
                <div class="article-content">
                    <h4>Menjaga Kucing di Musim Panas</h4>
                    <p>Dalam musim panas, perawatan khusus diperlukan untuk menjaga kucing tetap nyaman. Berikut adalah beberapa tips untuk melindungi kucing dari panas...</p>
                    <a href="https://example.com/article4" target="_blank">Baca Selengkapnya</a>
                </div>
            </div>
        </section>

        <!-- Review Section -->
        <section class="reviews-section">
            <h3>Ulasan Produk</h3>
            <div class="review">
                <p class="name">John Doe</p>
                <p class="rating">⭐⭐⭐⭐</p>
                <p>Produk ini sangat disukai oleh kucing saya! Makanan keringnya enak dan bergizi.</p>
            </div>
            <div class="review">
                <p class="name">Jane Smith</p>
                <p class="rating">⭐⭐⭐⭐⭐</p>
                <p>Kucing saya sangat suka makanan ini, harganya juga terjangkau!</p>
            </div>
            <div class="review-form">
                <h4>Tambahkan Ulasan</h4>
                <form method="POST">
                    <input type="text" name="name" placeholder="Nama Anda" required>
                    <textarea name="review" rows="4" placeholder="Tulis ulasan..." required></textarea>
                    <button type="submit">Kirim</button>
                </form>
            </div>
        </section>

        <!-- Video Section -->
        <section>
            <iframe src="https://www.youtube.com/embed/SZOUfVCOjlA?autoplay=1&mute=1&controls=0" 
                    frameborder="0" 
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen>
            </iframe>
        </section>
    </main>

    <script>
        // Slider functionality
        let bannerIndex = 0;
        const sliderContainer = document.getElementById('slider-container');
        const banners = sliderContainer.children;

        function showBanner(index) {
            const offset = -index * 100;
            sliderContainer.style.transform = `translateX(${offset}%)`;
        }

        document.getElementById('prev').addEventListener('click', () => {
            bannerIndex = (bannerIndex - 1 + banners.length) % banners.length;
            showBanner(bannerIndex);
        });

        document.getElementById('next').addEventListener('click', () => {
            bannerIndex = (bannerIndex + 1) % banners.length;
            showBanner(bannerIndex);
        });

        // Auto-slide banners
        setInterval(() => {
            bannerIndex = (bannerIndex + 1) % banners.length;
            showBanner(bannerIndex);
        }, 3000);

        // Product slider functionality
        let productIndex = 0;
        const categories = document.getElementById('categories');
        const productItems = categories.children;
        const productWidth = productItems[0].offsetWidth + 20;

        setInterval(() => {
            productIndex = (productIndex + 1) % productItems.length;
            const offset = -productIndex * productWidth;
            categories.style.transform = `translateX(${offset}px)`;
        }, 3000);
    </script>
</body>
</html>
