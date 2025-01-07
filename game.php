<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Match Nama Kucing | MITI Petshop</title>
    <style>
        body {
            background-color: #fce4ec;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }

        /* Navbar Styles */
        header {
            background-color: #f48fb1;
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
            padding: 10px 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        nav {
            display: flex;
            justify-content: center;
        }

        nav a {
            text-decoration: none;
            color: white;
            margin: 0 15px;
            padding: 10px;
            font-weight: bold;
            border-radius: 5px;
        }

        nav a:hover {
            background-color: #f06292;
        }

        /* Logo Styles */
        .logo {
            display: flex;
            align-items: center;
        }

        .logo img {
            width: 70px;
            height: 70px;
            margin-right: 10px;
        }

        .logo h1 {
            margin: 0;
            font-size: 24px;
            color: white;
        }

        /* Game Container */
        #game-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 400px;
            margin-top: 100px; /* Adjusted to account for fixed navbar */
        }

        h1 {
            color: #d81b60;
            font-size: 28px;
        }

        input[type="text"] {
            padding: 10px;
            font-size: 16px;
            width: 80%;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        button {
            background-color: #f48fb1;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #f06292;
        }

        .result {
            font-size: 20px;
            font-weight: bold;
            margin-top: 20px;
            color: #d81b60;
        }

        .not-matched {
            color: red;
        }

        .matched {
            color: green;
        }

        .loved {
            color: #ff4081;
        }

        /* New Game Link */
        .new-game {
            margin-top: 20px;
            font-size: 18px;
            color: #d81b60;
        }

        .new-game a {
            text-decoration: none;
            color: #f48fb1;
            font-weight: bold;
        }

        .new-game a:hover {
            color: #f06292;
        }

        /* Custom Cursor styles */
        .cursor {
            position: absolute;
            width: 50px;
            height: 50px;
            pointer-events: none;
            transform: translate(-50%, -50%);
            transition: transform 0.1s ease;
            background-image: url('https://png.pngtree.com/png-clipart/20220530/original/pngtree-cute-pink-cat-paw-vector-png-image_7770332.png'); /* Make sure the URL is correct */
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

<!-- Navbar -->
<header>
    <div class="logo">
        <img src="logo2 mitipetshop.jpg" alt="MITI Petshop Logo"> <!-- Replace with actual logo path -->
        <h1>MITI Petshop</h1>
    </div>
    <nav>
        <a href="dashboard.php">Dashboard</a>
        <a href="katalog.php">Katalog</a>
        <a href="profil.php">Profil</a>
        <a href="tentang.php">Tentang</a>
        <a href="login.php">Login</a>
    </nav>
</header>

<!-- Game Content -->
<div id="game-container">
    <h1>Cocokkan Nama Anda dengan Nama Kucing</h1>
    <div>
        <input type="text" id="user-name" placeholder="Masukkan Nama Anda" />
        <input type="text" id="cat-name" placeholder="Masukkan Nama Kucing" />
    </div>
    <button onclick="checkMatch()">Periksa Kecocokan</button>
    <div id="result" class="result"></div>

    <!-- Link to the Puzzle Game -->
    <div class="new-game">
        <p>Atau coba game lainnya: <a href="puzzle.php">Game Puzzle</a></p>
    </div>
</div>

<script>
    // Create custom cursor functionality
    const cursor = document.createElement('div');
    cursor.classList.add('cursor');
    document.body.appendChild(cursor);

    document.addEventListener('mousemove', function(event) {
        cursor.style.left = event.pageX + 'px';
        cursor.style.top = event.pageY + 'px';
    });

    function checkMatch() {
        var userName = document.getElementById('user-name').value.trim();
        var catName = document.getElementById('cat-name').value.trim();
        var resultElement = document.getElementById('result');
        
        if (userName === "" || catName === "") {
            resultElement.textContent = "Tolong masukkan kedua nama!";
            resultElement.className = "result not-matched";
            return;
        }

        // Calculate match percentage
        var matchScore = 0;
        var totalChars = Math.max(userName.length, catName.length);
        
        for (var i = 0; i < userName.length; i++) {
            if (catName.toLowerCase().includes(userName[i].toLowerCase())) {
                matchScore++;
            }
        }

        var matchPercentage = (matchScore / totalChars) * 100;

        // Display match result
        var resultText = "Persentase Kecocokan: " + matchPercentage.toFixed(2) + "%";
        var resultClass = "result";

        if (matchPercentage <= 40) {
            resultText += " - Kalian Tidak Cocok!";
            resultClass += " not-matched";
        } else if (matchPercentage <= 80) {
            resultText += " - Kalian Cocok!";
            resultClass += " matched";
        } else {
            resultText += " - Kalian Saling Mencintai!";
            resultClass += " loved";
        }

        resultElement.textContent = resultText;
        resultElement.className = resultClass;
    }
</script>

</body>
</html>
