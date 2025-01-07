<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Puzzle Kucing | MITI Petshop</title>
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
        }

        header {
            background-color: #f48fb1;
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
            padding: 10px 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
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

        #puzzle-container {
            display: grid;
            grid-template-columns: repeat(3, 150px);
            grid-template-rows: repeat(3, 150px);
            gap: 5px;
            margin-top: 80px;
        }

        .puzzle-piece {
            width: 150px;
            height: 150px;
            background-color: #eee;
            border: 2px solid #ddd;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 24px;
            text-align: center;
        }

        #message {
            font-size: 20px;
            color: green;
            margin-top: 20px;
        }

        #game-container {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

<!-- Navbar -->
<header>
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
    <h1>Puzzle Kucing</h1>
    <p>Geser potongan gambar untuk menyusun gambar kucing yang utuh.</p>
    <div id="puzzle-container">
        <!-- Puzzle pieces will be generated here -->
    </div>
    <div id="message"></div>
</div>

<script>
    const puzzleImage = "https://images.pexels.com/photos/45201/kitty-cat-kitten-pet-45201.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"; // Ganti dengan URL gambar kucing yang ingin digunakan
    const puzzleContainer = document.getElementById("puzzle-container");
    const message = document.getElementById("message");
    let puzzlePieces = [];
    let emptySlot = 8; // Indeks potongan kosong (slot terakhir)

    function initializePuzzle() {
        puzzlePieces = [];
        for (let i = 0; i < 9; i++) {
            puzzlePieces.push(i);
        }
        shuffle(puzzlePieces);
        renderPuzzle();
    }

    function shuffle(array) {
        for (let i = array.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [array[i], array[j]] = [array[j], array[i]]; // Swap elements
        }
    }

    function renderPuzzle() {
        puzzleContainer.innerHTML = "";
        for (let i = 0; i < puzzlePieces.length; i++) {
            const piece = puzzlePieces[i];
            const puzzlePiece = document.createElement("div");
            puzzlePiece.classList.add("puzzle-piece");
            if (piece !== 8) {
                puzzlePiece.style.backgroundImage = `url(${puzzleImage})`;
                puzzlePiece.style.backgroundPosition = `-${(piece % 3) * 150}px -${Math.floor(piece / 3) * 150}px`;
                puzzlePiece.dataset.index = i;
                puzzlePiece.addEventListener("click", movePiece);
            } else {
                puzzlePiece.style.backgroundColor = "#fff";
            }
            puzzleContainer.appendChild(puzzlePiece);
        }
    }

    function movePiece(event) {
        const pieceIndex = parseInt(event.target.dataset.index);
        const emptyRow = Math.floor(emptySlot / 3);
        const emptyCol = emptySlot % 3;
        const clickedRow = Math.floor(pieceIndex / 3);
        const clickedCol = pieceIndex % 3;

        // Cek apakah potongan yang diklik berada di sebelah potongan kosong
        if ((Math.abs(emptyRow - clickedRow) === 1 && emptyCol === clickedCol) ||
            (Math.abs(emptyCol - clickedCol) === 1 && emptyRow === clickedRow)) {
            puzzlePieces[emptySlot] = puzzlePieces[pieceIndex];
            puzzlePieces[pieceIndex] = 8;
            emptySlot = pieceIndex;
            renderPuzzle();
            checkWin();
        }
    }

    function checkWin() {
        if (puzzlePieces.join("") === "012345678") {
            message.textContent = "Selamat, Anda berhasil menyusun gambar kucing!";
            message.style.color = "green";
        } else {
            message.textContent = "";
        }
    }

    // Mulai permainan ketika halaman dimuat
    initializePuzzle();
</script>

</body>
</html>
