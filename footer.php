<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer</title>
    <style>
        footer {
            background: #000; /* Black background for contrast */
            color: #d63384; /* Pinkish text color */
            text-align: center;
            padding: 20px 0;
            font-family: 'Arial', sans-serif;
        }

        footer a {
            color: #d63384;
            text-decoration: none;
            margin: 0 10px;
            font-size: 1rem;
            transition: color 0.3s ease;
        }

        footer a:hover {
            color: #ff7eb9; /* Lighter pink for hover effect */
        }

        .social-icons {
            margin: 15px 0;
        }

        .social-icons a {
            font-size: 1.5rem;
            margin: 0 10px;
            color: #d63384;
            transition: transform 0.3s ease, color 0.3s ease;
        }

        .social-icons a:hover {
            transform: scale(1.2);
            color: #ff7eb9; /* Lighter pink on hover */
        }

        .back-to-top {
            margin-top: 10px;
            display: block;
            color: #d63384;
            text-decoration: none;
            font-size: 1rem;
            transition: color 0.3s ease;
        }

        .back-to-top:hover {
            color: #ff7eb9;
        }
    </style>
</head>
<body>
    <footer>
        <div>
            <p>&copy; <?php echo date('Y'); ?> nndzulllfa_k. All rights reserved.</p>
        </div>
        <div class="social-icons">
            <a href="https://www.instagram.com/yourusername" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="https://www.facebook.com/yourusername" target="_blank"><i class="fab fa-facebook-f"></i></a>
            <a href="https://www.tiktok.com/@yourusername" target="_blank"><i class="fab fa-tiktok"></i></a>
            <a href="https://wa.me/qr/yourqr" target="_blank"><i class="fab fa-whatsapp"></i></a>
        </div>
        <a href="#about" class="back-to-top">Back to Top</a>
    </footer>

    <!-- Font Awesome for social icons -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>

    <!-- Smooth scroll functionality -->
    <script>
        document.querySelector('.back-to-top').addEventListener('click', function(e) {
            e.preventDefault();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    </script>
    <?php include 'footer.php'; ?>
</body>
</html>
