<?php
// login.php
session_start();

// Extend session timeout to 1 hour (3600 seconds)
ini_set('session.gc_maxlifetime', 3600); // Session timeout in seconds
session_set_cookie_params(3600); // Session cookie timeout

// Check if the user is already logged in and redirect
if (isset($_SESSION['user'])) {
    header("Location: admin_dashboard.php");
    exit;
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Dummy username and password check (you can replace it with a database check)
    if ($username === "CatLovers" && $password === "2325110457") {
        $_SESSION['user'] = $username; // Set session variable
        header("Location: admin_dashboard.php"); // Redirect to dashboard
        exit;
    } else {
        $error = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: url('https://i.pinimg.com/originals/31/3b/3f/313b3f82c9a2a349f8f9447dd12df29a.gif') no-repeat center center fixed;
            background-size: cover;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
        }

        .login-box {
            position: relative;
            background: rgba(0, 0, 0, 0.8);
            color: white;
            padding: 30px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            animation: popIn 0.8s ease;
            width: 100%;
            max-width: 350px;
            margin: 0 20px;
        }

        @keyframes popIn {
            0% { transform: scale(0.5); opacity: 0; }
            100% { transform: scale(1); opacity: 1; }
        }

        .login-box h1 {
            margin: 0;
            color: #ff69b4;
            font-size: 30px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .login-box input {
            width: 100%;
            padding: 12px;
            margin: 12px 0;
            border: 2px solid #ff69b4;
            border-radius: 5px;
            font-size: 16px;
            transition: border 0.3s ease;
        }

        .login-box input:focus {
            border: 2px solid #ff1493;
        }

        .login-box button {
            background: #ff69b4;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
            transition: background 0.3s ease;
        }

        .login-box button:hover {
            background: #ff1493;
        }

        .login-box p {
            margin: 20px 0 0;
            font-size: 1em;
        }

        .login-box a {
            color: #ff69b4;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .login-box a:hover {
            color: #ff1493;
            text-decoration: underline;
        }

        .error {
            color: red;
            font-size: 14px;
        }

        .cursor {
            position: absolute;
            width: 50px;
            height: 50px;
            pointer-events: none;
            transform: translate(-50%, -50%);
            transition: transform 0.1s ease;
            background-image: url('https://png.pngtree.com/png-vector/20240927/ourmid/pngtree-a-pink-kitten-with-big-eyes-png-image_13907388.png');
            background-size: cover;
        }

        .cursor:hover {
            transform: translate(-50%, -50%) scale(1.5);
        }

        .particle {
            position: absolute;
            width: 6px;
            height: 6px;
            background-color: #800000;
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
    <div class="overlay"></div>
    <div class="login-box">
        <h1>Login to MITI PETSHOP</h1>
        <?php if (isset($error)) { echo "<p class='error'>$error</p>"; } ?>
        <form method="POST" action="">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="login">Login</button>
        </form>
        <p>Belum punya akun? <a href="register.php">Daftar</a></p>
    </div>

    <div class="cursor"></div>
    
    <script>
        const cursor = document.querySelector('.cursor');

        document.addEventListener('mousemove', (e) => {
            cursor.style.left = e.pageX + 'px';
            cursor.style.top = e.pageY + 'px';
        });
    </script>
</body>
</html>
