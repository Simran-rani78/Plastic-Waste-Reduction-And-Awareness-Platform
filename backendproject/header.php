<?php
session_start();

// Check if user is logged in
$isLoggedIn = isset($_SESSION['user_id']);
$userName = $isLoggedIn ? $_SESSION['user_name'] : '';
$userAvatar = $isLoggedIn ? 'path/to/avatar.jpg' : '';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <a href="index.php" class="text-2xl font-bold text-green-600">EcoPlastic</a>
                </div>
                <div class="hidden md:flex items-center space-x-4">
                    <a href="index.php" class="text-gray-700 hover:text-green-600">Home</a>
                    <a href="resources.php" class="text-gray-700 hover:text-green-600">Resources</a>
                    <a href="campaigns.php" class="text-gray-700 hover:text-green-600">Campaigns</a>
                    <a href="solutions.php" class="text-gray-700 hover:text-green-600">Solutions</a>
                    <?php if ($isLoggedIn): ?>
                        <div class="relative">
                            <button id="user-menu-button" class="w-8 h-8 rounded-full bg-green-600 text-white flex items-center justify-center focus:outline-none">
                                <?php echo strtoupper(substr($userName, 0, 1)); ?>
                            </button>
                            <div id="user-menu" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 hidden">
                                <a href="userdashboard.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Dashboard</a>
                                <a href="userprofile.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                               
                                <a href="logout.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</a>
                            </div>
                        </div>
                    <?php else: ?>
                        <a href="login.php" class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700">Login</a>
                        <a href="signup.php" class="border border-green-600 text-green-600 px-4 py-2 rounded-md hover:bg-green-50">Register</a>
                    <?php endif; ?>
                    <button id="theme-toggle" class="p-2 rounded-full text-gray-500 hover:text-green-600 focus:outline-none">
                        <i class="fas fa-moon"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>
    <script>
        const themeToggle = document.getElementById('theme-toggle');
        const body = document.body;

        themeToggle.addEventListener('click', () => {
            body.classList.toggle('dark-mode');
            const icon = themeToggle.querySelector('i');
            if (body.classList.contains('dark-mode')) {
                icon.classList.remove('fa-moon');
                icon.classList.add('fa-sun');
            } else {
                icon.classList.remove('fa-sun');
                icon.classList.add('fa-moon');
            }
        });

        // Toggle user menu on click
        const userMenuButton = document.getElementById('user-menu-button');
        const userMenu = document.getElementById('user-menu');

        userMenuButton.addEventListener('click', () => {
            userMenu.classList.toggle('hidden');
        });

        // Close menu when clicking outside
        document.addEventListener('click', (event) => {
            if (!userMenuButton.contains(event.target) && !userMenu.contains(event.target)) {
                userMenu.classList.add('hidden');
            }
        });
    </script>
</body>
</html> 