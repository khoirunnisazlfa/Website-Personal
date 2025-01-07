<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang MITI Petshop</title>
    <style>
        /* Reset default margin and padding */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body and page background */
        body {
            font-family: Arial, sans-serif;
            background-color: #fff;
            color: #333;
        }

        /* Navbar styles */
        header {
            background-color: #FFB6C1; /* Pink */
            padding: 10px 0;
            transition: background-color 0.3s ease;
        }

        header:hover {
            background-color: #FF1493; /* Pink hover */
        }

        .navbar-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 90%;
            margin: 0 auto;
        }

        /* Text MITI Petshop */
        .logo {
            font-size: 28px;
            color: #fff; /* White */
            font-weight: bold;
            text-decoration: none;
        }

        .nav-links {
            list-style: none;
            display: flex;
        }

        .nav-links li {
            margin-right: 20px;
            position: relative;
        }

        .nav-links li a {
            text-decoration: none;
            color: #8B0000; /* Red ketan */
            font-size: 18px;
            transition: color 0.3s ease;
            padding: 8px 16px;
        }

        .nav-links li a:hover {
            color: #FF1493; /* Pink hover */
            border: 2px solid #FF1493; /* Border effect on hover */
            border-radius: 5px;
        }

        /* Active link */
        .nav-links li a.active {
            color: #FF1493;
            border: 2px solid #FF1493;
            border-radius: 5px;
        }

        /* Login button updated */
        .login-button {
            background-color: rgb(96, 45, 45); /* Red ketan */
            color: #fff;
            border: none;
            padding: 12px 20px; /* Increased padding */
            cursor: pointer;
            font-size: 16px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            width: auto;
            white-space: nowrap;
            margin-right: 20px; /* Adjusted margin to avoid cutting off */
        }

        .login-button:hover {
            background-color: #FF1493; /* Pink hover */
        }

        /* About section */
        .about-section {
            padding: 20px;
            text-align: center;
            background-color: #FFEBEE; /* Light pink */
            border: 2px solid #800000; /* Maroon color */
            margin: 20px;
            border-radius: 10px;
        }

        .about-section h1 {
            color: #8B0000; /* Red ketan */
            margin-bottom: 15px;
        }

        .about-section p {
            color: #555;
            font-size: 18px;
            margin-bottom: 20px;
        }

        /* New Sections (Kelebihan, Penghargaan, Kontak, Media Sosial) */
        .features, .awards, .contact, .social-media {
            margin: 40px auto;
            width: 80%;
            text-align: center;
            border: 2px solid #800000; /* Maroon border */
            border-radius: 10px;
            padding: 20px;
            background-color: #FFEBEE; /* Matching background color */
            transition: transform 0.3s ease;
        }

        .features:hover, .awards:hover, .contact:hover, .social-media:hover {
            transform: scale(1.05);
        }

        h2 {
            color: #8B0000;
            margin-bottom: 20px;
            font-size: 24px;
        }

        .features ul, .awards ul, .social-media ul {
            list-style: none;
            padding: 0;
        }

        .features li, .awards li, .social-media li {
            font-size: 18px;
            color: #333;
            margin: 10px 0;
            padding-left: 20px;
            position: relative;
        }

        .features li:before, .awards li:before, .social-media li:before {
            content: '\2022';
            position: absolute;
            left: 0;
            color: #800000; /* Maroon bullet */
            font-size: 24px;
            top: 0;
        }

        .features li:hover, .awards li:hover, .social-media li:hover {
            transform: translateX(10px);
            color: #FF1493; /* Pink hover */
        }

        .social-media ul {
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .social-media li {
            font-size: 20px;
        }

        .social-media img {
            width: 40px;
            height: 40px;
            transition: transform 0.3s ease;
        }

        .social-media img:hover {
            transform: scale(1.1);
        }

        .contact p {
            font-size: 18px;
            color: #333;
        }

        /* Footer styles */
        footer {
            text-align: center;
            background-color: #FFB6C1; /* Pink */
            padding: 10px 0;
            margin-top: 40px;
        }

        footer p {
            color: #8B0000; /* Red ketan */
            font-size: 14px;
        }

        /* Canvas styles */
        canvas {
            position: fixed;
            top: 0;
            left: 0;
            z-index: -1;
            width: 100%;
            height: 100%;
            background-color: #FFEBEE; /* Light pink background for the canvas */
        }

        /* Custom Cursor styles */
        .cursor {
            position: absolute;
            width: 50px;
            height: 50px;
            pointer-events: none;
            transform: translate(-50%, -50%);
            transition: transform 0.1s ease;
            background-image: url('https://png.pngtree.com/png-clipart/20220530/original/pngtree-cute-pink-cat-paw-vector-png-image_7770332.png'); /* Ganti dengan gambar kepala kucing */
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
    </style>
</head>
<body>
    <!-- Custom Cursor -->
    <div class="cursor" id="cursor"></div>

    <!-- Canvas animation -->
    <canvas id="canvas"></canvas>

    <!-- Navbar -->
    <header>
        <nav>
            <div class="navbar-container">
                <span class="logo">MITI Petshop</span> <!-- Text bukan link -->
                <ul class="nav-links">
                    <li><a href="dashboard.php">Home</a></li>
                    <li><a href="katalog.php">Katalog</a></li>
                    <li><a href="tentang.php">Tentang</a></li>
                    <li><a href="profil.php">Profil</a></li>
                    <li><a href="game.php">Game</a></li>
                </ul>
                <button class="login-button">Login</button>
            </div>
        </nav>
    </header>

    <!-- Content -->
    <main class="about-section">
        <h1>Tentang MITI Petshop</h1>
        
        <!-- MITI Petshop Logo Image -->
        <img src="logo mitipetshop.jpg" alt="MITI Petshop Logo" style="margin-top: 20px; max-width: 200px; display: block; margin-left: auto; margin-right: auto;">
        
        <p>MITI Petshop adalah toko yang menyediakan berbagai produk dan kebutuhan untuk kucing kesayangan Anda. Kami menawarkan pilihan makanan kucing, vitamin, mainan, aksesori, dan pakaian yang berkualitas untuk memastikan kucing Anda sehat dan bahagia.</p>
        <p>Dengan harga terjangkau dan pelayanan yang ramah, MITI Petshop menjadi pilihan utama bagi para pecinta kucing yang ingin memberikan yang terbaik untuk hewan peliharaan mereka.</p>
    </main>

    <!-- Keuntungan dan Penghargaan -->
    <section class="features">
        <h2>Kelebihan Kami</h2>
        <ul>
            <li>Produk Berkualitas dan Terjamin</li>
            <li>Pelayanan Cepat dan Ramah</li>
            <li>Harga Terjangkau</li>
            <li>Pilihan Produk Lengkap untuk Kucing</li>
        </ul>
    </section>

    <section class="awards">
        <h2>Penghargaan</h2>
        <ul>
            <li>Juara 1 Lomba Toko Petshop Terbaik 2024</li>
            <li>Memiliki Sertifikat Produk Aman untuk Hewan</li>
        </ul>
    </section>

    <!-- Kontak -->
    <section class="contact">
        <h2>Kontak Kami</h2>
        <p>Alamat: Jl. Kucing Raya No. 123, Jakarta</p>
        <p>Telepon: +62 123 456 789</p>
        <p>Email: info@mitipetshop.com</p>
    </section>

    <!-- Media Sosial -->
    <section class="social-media">
        <h2>Ikuti Kami di Media Sosial</h2>
        <ul>
            <li><a href="https://facebook.com" target="_blank"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/51/Facebook_f_logo_%282019%29.svg/1200px-Facebook_f_logo_%282019%29.svg.png" alt="Facebook"></a></li>
            <li><a href="https://instagram.com" target="_blank"><img src="https://upload.wikimedia.org/wikipedia/commons/a/a5/Instagram_icon.png" alt="Instagram"></a></li>
            <li><a href="https://twitter.com" target="_blank"><img src="https://static.promediateknologi.id/crop/0x0:0x0/0x0/webp/photo/p2/140/2024/06/18/new-2023-twitter-logo-x-icon-design_1017-45418-336605222.jpg" alt="Twitter"></a></li>
        </ul>
    </section>

    <footer>
        <p>&copy; 2025 MITI Petshop. Semua hak cipta dilindungi.</p>
    </footer>

    <!-- JavaScript for Canvas Animation -->
    <script>
        const canvas = document.getElementById("canvas");
        const ctx = canvas.getContext("2d");

        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;

        let particles = [];

        class Particle {
            constructor(x, y) {
                this.x = x;
                this.y = y;
                this.size = Math.random() * 3 + 1;
                this.speedX = Math.random() * 2 - 1;
                this.speedY = Math.random() * 2 - 1;
            }

            update() {
                this.x += this.speedX;
                this.y += this.speedY;
                if (this.size > 0.2) this.size -= 0.1;
            }

            draw() {
                ctx.fillStyle = '#800000'; /* Maroon color */
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
                ctx.fill();
            }
        }

        function createParticles(e) {
            let xPos = e.x;
            let yPos = e.y;

            for (let i = 0; i < 10; i++) { /* Increased particles */
                particles.push(new Particle(xPos, yPos));
            }
        }

        function animateParticles() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            for (let i = 0; i < particles.length; i++) {
                particles[i].update();
                particles[i].draw();

                if (particles[i].size <= 0.2) {
                    particles.splice(i, 1);
                    i--;
                }
            }
            requestAnimationFrame(animateParticles);
        }

        canvas.addEventListener("mousemove", createParticles);
        animateParticles();

        // Custom Cursor
        const cursor = document.getElementById("cursor");

        document.addEventListener("mousemove", (e) => {
            cursor.style.left = e.pageX + "px";
            cursor.style.top = e.pageY + "px";
        });

        // Navbar active link effect
        const navLinks = document.querySelectorAll('.nav-links a');
        navLinks.forEach(link => {
            link.addEventListener('click', function () {
                navLinks.forEach(link => link.classList.remove('active'));
                this.classList.add('active');
            });
        });

        // Particle effect for cursor trail
        document.addEventListener("mousemove", (e) => {
            const particle = document.createElement("div");
            particle.classList.add("particle");
            particle.style.left = `${e.pageX - 3}px`;
            particle.style.top = `${e.pageY - 3}px`;

            document.body.appendChild(particle);

            setTimeout(() => {
                particle.remove();
            }, 600);
        });
    </script>
</body>
</html>
