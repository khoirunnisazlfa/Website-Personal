<?php
session_start(); // Start the session to track user login status

// Check if the user is logged in, if not redirect to login page
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            background: #FFE8F2; /* Soft Pink background */
            color: #fff;
            overflow-x: hidden;
        }

        .hero {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .banner-container {
            display: flex;
            width: calc(100% * 3); /* Adjusted for 3 banners */
            height: 100%;
            animation: slide 15s linear infinite;
        }

        .banner {
            flex: 0 0 100%; /* Each banner takes full viewport width */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .banner img {
            width: 100%;
            height: 100%;
            object-fit: contain; /* Ensure the image is fully visible without being cropped */
        }

        @keyframes slide {
            0% { transform: translateX(0); }
            33.33% { transform: translateX(-100%); }
            66.66% { transform: translateX(-200%); }
            100% { transform: translateX(0); }
        }

        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 10px;
            margin: 30px;
            justify-items: center;
        }

        .gallery img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
        }

        .gallery img:hover {
            transform: scale(1.05);
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.3);
        }

        .fullscreen-images img {
            width: 100%;
            height: auto;
            object-fit: contain;
        }

        .media {
            text-align: center;
            margin: 40px 0;
        }

        .playlist {
            position: relative;
            display: inline-block;
            background-color: #333;
            border-radius: 15px;
            padding: 15px 20px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
        }

        .playlist audio {
            display: none; /* Hide default audio player */
        }

        .playlist::before {
            content: '▶ Play Song';
            display: block;
            font-size: 1.2rem;
            color: #fff;
            text-align: center;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .playlist.active::before {
            content: '⏸ Pause Song';
        }

        .playlist:hover::before {
            color: #d63384;
        }

        .video-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 40px 0;
        }

        .video-section video {
            width: 80%;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.3);
        }

        .video-section h3 {
            margin-bottom: 20px;
            font-size: 1.8rem;
            color: #d63384;
        }

        .cv-section {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }

        .cv-section img {
            width: 300px;
            height: auto;
            border-radius: 10px;
            border: 2px solid #d63384;
        }

        .empty-section {
            background: #FFE8F2; /* Bright Pink background */
            color: #B22222; /* Red Brick */
            text-align: center;
            padding: 50px 20px;
            font-size: 1.8rem;
            font-weight: bold;
        }

        footer {
            background: #000;
            padding: 20px;
            text-align: center;
        }

        footer p {
            margin: 0;
            color: #d63384;
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
    <section class="hero" id="about">
        <div class="banner-container">
            <div class="banner"><img src="profile1.jpg" alt="Banner 1"></div>
            <div class="banner"><img src="profile2.jpg" alt="Banner 2"></div>
            <div class="banner"><img src="profile3.jpg" alt="Banner 3"></div>
        </div>
    </section>

    <section class="gallery" id="gallery">
        <h2 style="text-align: center; color: #d63384;">My Gallery</h2>
        <img src="me1.jpg" alt="Image 1" class="gallery-img">
        <img src="me2.jpg" alt="Image 2" class="gallery-img">
        <img src="me3.jpg" alt="Image 3" class="gallery-img">
    </section>

    <section class="fullscreen-images" id="favorite-song">
        <h1 style="color: #B22222; margin-bottom: 20px; text-align: center;">Welcome to My Aesthetic Profile Page!</h1>
        <div class="media">
            <h2 style="color: #d63384;">Favorite Song</h2>
            <div class="playlist">
                <audio id="audio-player">
                    <source src="stayaway.mp3" type="audio/mpeg">
                    Your browser does not support the audio element.
                </audio>
            </div>
        </div>
        <img src="pp1.jpg" alt="Full Image 1">
        <div class="video-section">
            <h3>Mini Vlog</h3>
            <video controls>
                <source src="saturdaymoody.mp4" type="video/mp4">
                Your browser does not support the video element.
            </video>
        </div>
        <img src="pp2.jpg" alt="Full Image 2">
        <div class="cv-section">
            <img src="cv1.jpg" alt="CV 1">
            <img src="cv2.jpg" alt="CV 2">
        </div>
        <img src="pp3.jpg" alt="Full Image 3">
    </section>

    <section class="empty-section">
        "Terima kasih telah berkunjung di halaman kami, See You!"
    </section>

    <footer>
        <p>&copy; 2025 nndzulllfa_k. All rights reserved.</p>
    </footer>

    <!-- Custom cursor element -->
    <div class="cursor"></div>

    <script>
        // Toggle play/pause for the music
        const playlist = document.querySelector('.playlist');
        const audioPlayer = document.getElementById('audio-player');
        
        playlist.addEventListener('click', () => {
            if (audioPlayer.paused) {
                audioPlayer.play();
                playlist.classList.add('active');
            } else {
                audioPlayer.pause();
                playlist.classList.remove('active');
            }
        });

        // JavaScript to move the custom cursor with the mouse
        const cursor = document.querySelector('.cursor');

        document.addEventListener('mousemove', (e) => {
            cursor.style.left = e.pageX + 'px';
            cursor.style.top = e.pageY + 'px';
        });
    </script>
</body>
</html>
