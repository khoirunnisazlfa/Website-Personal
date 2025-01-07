<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - Admin Dashboard</title>
    <style>
        /* General body style */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #000000;
            color: #fff;
            background-image: url('https://www.example.com/cat-paw-print.png');
            background-size: cover;
            background-position: center center;
            height: 100vh;
        }

        /* Header style */
        header {
            background-color: #f8a5c2;
            color: #000;
            text-align: center;
            padding: 10px 20px;
            border-bottom: 10px solid #f8a5c2;
        }

        /* Sidebar container style */
        .sidebar {
            width: 15%;
            background-color: #222222;
            padding-top: 60px; /* Add padding to move content down */
            position: fixed;
            height: 100%;
            top: 0;
            left: -15%; /* Initially hidden */
            display: flex;
            flex-direction: column;
            align-items: center;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.3);
            transition: left 0.3s ease-in-out;
        }

        /* Sidebar link style */
        .sidebar a {
            display: block;
            color: #fff;
            padding: 15px;
            text-decoration: none;
            margin: 8px 0;
            border-radius: 5px;
            background-color: #f8a5c2;
            text-align: center;
            font-size: 14px;
            width: 100%;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        /* Hover effect for sidebar links */
        .sidebar a:hover {
            background-color: #000000;
            color: #f8a5c2;
        }

        /* Main content container */
        .content {
            margin-left: 0;
            padding: 20px;
            background-color: #333333;
            color: #fff;
            height: 100%;
            transition: margin-left 0.3s ease-in-out;
        }

        /* Footer style */
        footer {
            background-color: #f8a5c2;
            color: #000;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        /* Toggle button style */
        .toggle-btn {
            position: fixed;
            top: 20px; /* Keep the toggle button at the top */
            left: 20px;
            z-index: 1000;
            background-color: #f8a5c2;
            color: #000;
            padding: 10px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .toggle-btn:hover {
            background-color: #000;
            color: #f8a5c2;
        }
    </style>
</head>
<body>

    <!-- Sidebar menu -->
    <div class="sidebar" id="sidebar">
        <a href="dashboard.php" target="kanan">Home</a>
        <a href="product.php" target="kanan">Product</a>
        <a href="profile.php" target="kanan">Profile</a>
        <a href="logout.php" target="kanan">Logout</a>
    </div>

    <!-- Toggle button -->
    <button class="toggle-btn" onclick="toggleSidebar()">☰ Menu</button>

    <!-- Main content area -->
    <div class="content" id="content">
        <iframe name="kanan" src="home.php" width="100%" height="100%" style="border:none;"></iframe>
    </div>

    <script>
        // Function to toggle sidebar visibility
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const content = document.getElementById('content');
            if (sidebar.style.left === '0px') {
                sidebar.style.left = '-15%'; // Hide sidebar
                content.style.marginLeft = '0';
            } else {
                sidebar.style.left = '0'; // Show sidebar
                content.style.marginLeft = '15%';
            }
        }
    </script>

</body>
</html>
