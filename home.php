<?php
// Memulai session jika belum dimulai
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Atur waktu kedaluwarsa session
ini_set('session.gc_maxlifetime', 3600); // 1 jam
session_set_cookie_params(3600);

// Header untuk mencegah cache
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1
header("Pragma: no-cache"); // HTTP 1.0
header("Expires: 0"); // Proxies
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MITI Petshop</title>
    <style>
        /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #FFE8F2; /* Pink Soft Background */
        }

        h1, h2, h3 {
            color: #333;
        }

        /* Header */
        header {
            background-color: rgb(77, 42, 59);
            padding: 20px;
            text-align: center;
        }

        header .logo a {
            font-size: 24px;
            font-weight: bold;
            color: white;
            text-decoration: none;
        }

        /* Fullscreen Background Section */
        .fullscreen-section {
            height: 100vh;
            background-size: cover;
            background-position: center;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            align-items: center;
            text-align: center;
            padding-bottom: 50px;
        }

        .fullscreen-section h1 {
            font-size: 64px;
            color: rgb(109, 59, 84); /* Match Navbar Color */
            text-shadow: 3px 3px 16px rgba(255, 255, 255, 1);
            animation: glow 1.5s infinite alternate;
            margin-bottom: 120px; /* Adjust margin to move text slightly down */
        }

        @keyframes glow {
            from {
                text-shadow: 3px 3px 8px rgba(255, 255, 255, 0.5);
            }
            to {
                text-shadow: 3px 3px 16px rgba(255, 255, 255, 1);
            }
        }

        .section-1 {
            background: url('oyen1.jpg') no-repeat center center;
        }

        .section-2 {
            background: url('peach3.jpg') no-repeat center center;
        }

        .section-3 {
            background: url('oyen2.jpg') no-repeat center center;
        }

        /* Custom Cursor styles */
        .cursor {
            position: absolute;
            width: 50px;
            height: 50px;
            pointer-events: none;
            transform: translate(-50%, -50%);
            transition: transform 0.1s ease;
            background-image: url('https://png.pngtree.com/png-vector/20240309/ourmid/pngtree-orange-brown-cat-face-png-image_11913315.png'); /* Gambar kepala kucing */
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

        /* Featured Products Section */
        .featured-products {
            padding: 40px 20px;
            text-align: center;
        }

        .featured-products h2 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .product-card {
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            transition: transform 0.3s ease-in-out;
        }

        .product-card img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            cursor: pointer;
            transition: transform 0.3s ease-in-out;
        }

        .product-card img:hover {
            transform: scale(1.1); /* Efek hover: zoom in */
        }

        /* Gift Box */
        .gift-box {
            background-color:rgb(209, 126, 152);
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            cursor: pointer;
            margin-top: 40px;
            font-size: 24px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }

        .gift-box:hover {
            background-color:rgb(162, 57, 66);
        }

        .gift-img {
            display: none;
            margin-top: 20px;
        }

        /* Button Styles */
        .btn {
            padding: 10px 20px;
            background-color: rgb(48, 24, 36);
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin: 0 10px;
            display: inline-block;
            font-size: 18px;
            transition: all 0.3s ease-in-out;
        }

        .btn:hover {
            transform: translateY(-5px);
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            background-color:rgb(147, 83, 83); /* Change background color on hover */
        }

        .button-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: -80px; /* Adjust margin to move buttons slightly closer to text */
        }

        /* Footer */
        footer {
            background-color: rgb(77, 42, 59);
            color: white;
            padding: 20px 0;
            text-align: center;
        }
    </style>
</head>
<body>

<!-- Header -->
<header>
    <div class="logo">
        <a href="#">MITI Petshop</a>
    </div>
</header>

<!-- Fullscreen Background Section 1 -->
<section class="fullscreen-section section-1">
    <h1>Welcome to MITI Petshop</h1>
    <div class="button-container">
        <a href="katalog.php" class="btn">Shop Now</a>
        <a href="dashboard.php" class="btn">Go to Dashboard</a>
        <a href="" class="btn">Scroll! Temukan Gift mu.</a>
    </div>
</section>

<!-- Fullscreen Background Section 2 -->
<section class="fullscreen-section section-2">
    <h1>Happy Shopping!</h1>
</section>

<!-- Fullscreen Background Section 3 -->
<section class="fullscreen-section section-3">
    <p align="left"><h1></h1></p>
</section>

<!-- Featured Products Section -->
<section class="featured-products">
    <h2>Miti Gallery</h2>
    <div class="products-grid">
        <div class="product-card">
            <img src="miti1.jpg" alt="Product 1" onclick="imageClick('Product 1')">
        </div>
        <div class="product-card">
            <img src="miti2.jpg" alt="Product 2" onclick="imageClick('Product 2')">
        </div>
        <div class="product-card">
            <img src="miti3.jpg" alt="Product 3" onclick="imageClick('Product 3')">
        </div>
        <div class="product-card">
            <img src="miti4.jpg" alt="Product 4" onclick="imageClick('Product 4')">
        </div>
        <div class="product-card">
            <img src="miti5.jpg" alt="Product 5" onclick="imageClick('Product 5')">
        </div>
        <div class="product-card">
            <img src="k2.jpg" alt="Product 6" onclick="imageClick('Product 6')">
        </div>
        <div class="product-card">
            <img src="k3.jpg" alt="Product 6" onclick="imageClick('Product 6')">
        </div>
        <div class="product-card">
            <img src="k1.jpg" alt="Product 6" onclick="imageClick('Product 6')">
        </div>
        <div class="product-card">
            <img src="k4.jpg" alt="Product 6" onclick="imageClick('Product 6')">
        </div>
        <div class="product-card">
            <img src="k5.jpg" alt="Product 6" onclick="imageClick('Product 6')">
        </div>
        <div class="product-card">
            <img src="k6.jpg" alt="Product 6" onclick="imageClick('Product 6')">
        </div>
        <div class="product-card">
            <img src="k7.jpg" alt="Product 6" onclick="imageClick('Product 6')">
        </div>
        <div class="product-card">
            <img src="k8.jpg" alt="Product 6" onclick="imageClick('Product 6')">
        </div>
        <div class="product-card">
            <img src="k9.jpg" alt="Product 6" onclick="imageClick('Product 6')">
        </div>
        <div class="product-card">
            <img src="k10.jpg" alt="Product 6" onclick="imageClick('Product 6')">
        </div>
    </div>
    
    
    <!-- Gift Box -->
    <div class="gift-box" onclick="showGiftImage()">Click to Open Your Gift</div>
    <div class="gift-img" id="gift-img">
        <img src="https://i.pinimg.com/originals/9c/c3/59/9cc359123cb3ec2568b6c2a0cefa0e83.gif" alt="Cat with Love" style="width: 100%; max-width: 300px;">
    </div>
</section>

<!-- Footer -->
<footer>
    <p>&copy; 2025 MITI Petshop. All rights reserved.</p>
</footer>

<!-- Custom Cursor -->
<div class="cursor" id="cursor"></div>

<!-- Canvas for particle effect -->
<canvas id="canvas"></canvas>

<!-- Audio Player with Auto Play (Hidden Controls) -->
<audio autoplay loop style="display: none;">
    <source src="AESPA.mp3" type="audio/mp3">
    Your browser does not support the audio element.
</audio>

<script>
    // Fungsi untuk menampilkan alert atau efek ketika gambar diklik
    function imageClick(imgSrc) {
        alert("You clicked on the image: " + imgSrc);
    }
    // Fungsi untuk menampilkan alert atau efek ketika gambar diklik
    function imageClick(imgSrc) {
        alert("You clicked on the image: " + imgSrc);
    }
    // Fungsi untuk menampilkan alert atau efek ketika gambar diklik
    function imageClick(imgSrc) {
        alert("You clicked on the image: " + imgSrc);
    }

    // Function to show the cat holding love image
    function showGiftImage() {
        const giftImg = document.getElementById('gift-img');
        giftImg.style.display = 'block';
    }
    // Function to show the cat holding love image
    function showGiftImage() {
        const giftImg = document.getElementById('gift-img');
        giftImg.style.display = 'block';
    }
    // Function to show the cat holding love image
    function showGiftImage() {
        const giftImg = document.getElementById('gift-img');
        giftImg.style.display = 'block';
    }

    // Custom Cursor and Particle Effect JavaScript
    const cursor = document.getElementById('cursor');
    const canvas = document.getElementById('canvas');
    const ctx = canvas.getContext('2d');
    let particles = [];

    // Resize canvas to match the window size
    window.addEventListener('resize', () => {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
    });

    // Initialize canvas size
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;

    // Mouse move event listener to move the cursor
    document.addEventListener('mousemove', (e) => {
        cursor.style.left = `${e.pageX}px`;
        cursor.style.top = `${e.pageY}px`;

        // Generate particles
        generateParticles(e.pageX, e.pageY);
    });

    // Particle generator
    function generateParticles(x, y) {
        for (let i = 0; i < 5; i++) {
            const particle = {
                x: x,
                y: y,
                size: Math.random() * 5 + 2,
                speedX: Math.random() * 2 - 1,
                speedY: Math.random() * 2 - 1,
            };
            particles.push(particle);
        }
    }

    // Update particles
    function updateParticles() {
        particles.forEach((particle, index) => {
            particle.x += particle.speedX;
            particle.y += particle.speedY;
            particle.size *= 0.98;

            if (particle.size < 0.5) {
                particles.splice(index, 1);
            }
        });
    }

    // Draw particles on canvas
    function drawParticles() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        particles.forEach((particle) => {
            ctx.beginPath();
            ctx.arc(particle.x, particle.y, particle.size, 0, Math.PI * 2);
            ctx.fillStyle = "#800000"; // Maroon color for particles
            ctx.fill();
        });
    }

    // Main loop to animate particles
    function animate() {
        updateParticles();
        drawParticles();
        requestAnimationFrame(animate);
    }

    animate();
</script>

</body>
</html>
