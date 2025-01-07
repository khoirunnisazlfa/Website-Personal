<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang MITI Petshop</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            overflow-x: hidden;
        }
        .navbar {
            background-color: rgba(255, 182, 193, 0.8);
            position: fixed;
            top: 0;
            width: 100%;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            z-index: 1000;
        }
        .navbar a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
            font-weight: bold;
        }
        .navbar a:hover {
            text-decoration: underline;
        }
        .section {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            position: relative;
            color: white;
            text-align: left;
            padding: 20px 40px;
        }
        .section img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }
        .section h1 {
            font-size: 4rem;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);
            margin: 0;
        }
        .section p {
            font-size: 1.2rem;
            max-width: 600px;
        }
        .divider {
            background: linear-gradient(to right, pink, black);
            color: white;
            padding: 20px;
            text-align: center;
            font-size: 1.5rem;
            font-weight: bold;
        }
        .gradient-divider {
            background: linear-gradient(to right, pink, black);
            height: 50px;
            position: relative;
        }
        .section-center {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            width: 100%;
            height: 100%;
            padding: 20px;
            box-sizing: border-box;
        }
        .section-center h1 {
            margin: 0 0 10px 0;
        }
        .section-center p {
            margin: 0;
        }
        .contact-section {
            padding: 20px;
            text-align: center;
            color: white;
        }
        .contact-section a {
            margin: 0 10px;
            text-decoration: none;
            color: white;
            font-size: 1.2rem;
        }
        .contact-section img {
            vertical-align: middle;
            width: 24px;
            height: 24px;
            margin-right: 5px;
        }
        /* Custom Cursor styles */
        .cursor {
            position: absolute;
            width: 50px;
            height: 50px;
            pointer-events: none;
            transform: translate(-50%, -50%);
            transition: transform 0.1s ease;
            background-image: url('https://png.pngtree.com/png-clipart/20220530/original/pngtree-cute-pink-cat-paw-vector-png-image_7770332.png'); /* URL gambar kepala kucing */
            background-size: contain; /* Pastikan gambar kucing terlihat proporsional */
            background-repeat: no-repeat;
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

        /* Adjust Login button position */
        .navbar .login {
            margin-left: auto; /* Moves login button to the right */
            margin-right: 20px; /* Adds space from the edge */
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div>
            <a href="dashboard.php">Home</a>
            <a href="katalog.php">Katalog</a>
            <a href="tentang.php">Tentang</a>
            <a href="game.php">Game</a>
        </div>
        <div class="login">
            <a href="login.php">Login</a>
        </div>
    </div>

    <div class="section" id="section1">
        <img src="welcome.jpg" alt="Latar belakang bagian 1">
        <div>
            <h1>Selamat Datang <br>di MITI Petshop</h1>
            <p>Kami menyediakan kebutuhan terbaik untuk kucing Anda, mulai dari makanan, mainan, hingga aksesoris.</p>
        </div>
    </div>

    <div class="divider">Profil CEO</div>

    <div class="section" id="section2">
        <img src="forprofil1.jpg" alt="Latar belakang bagian 2">
        <div>
        </div>
    </div>

    <div class="gradient-divider"></div>

    <div class="section" id="section3">
        <img src="forprofil2.jpg" alt="Latar belakang bagian 3" style="object-fit: cover;">
        <div class="section-center">
            <h1>Visi dan Misi</h1>
            <p>Visi kami adalah menjadi toko hewan peliharaan terbaik di Indonesia. Misi kami adalah memberikan produk berkualitas tinggi dan layanan pelanggan terbaik.</p>
        </div>
    </div>

    <!-- Custom Cursor -->
    <div class="cursor" id="cursor"></div>

    <!-- Canvas for particle effect -->
    <canvas id="canvas"></canvas>

    <script>
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
