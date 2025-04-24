<?php
include 'header.php';

// Redirect if not logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}
// Database connection
$host = "localhost"; $dbname = "ecoplastic"; $username = "root"; $password = "";
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
$user_id = $_SESSION['user_id'];
$success_message = '';
$error_message = '';
$name = $email = $about = '';
// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name       = trim($_POST['name']);
    $email      = trim($_POST['email-address']);
    $about      = trim($_POST['about']);
    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = 'Invalid email address.';
    }
    if (!$error_message) {
        try {
            $stmt = $conn->prepare("UPDATE users SET name=?, email=?, about=? WHERE id=?");
            $stmt->execute([$name, $email, $about, $user_id]);
            $success_message = 'Profile updated successfully.';
        } catch (PDOException $e) {
            $error_message = 'Error updating profile: ' . $e->getMessage();
        }
    }
}
// Fetch existing profile data
try {
    $stmt = $conn->prepare("SELECT name, email, about FROM users WHERE id=?");
    $stmt->execute([$user_id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$user) die('User not found.');
    if (!$name)       $name       = $user['name'];
    if (!$email)      $email      = $user['email'];
    if (!$about)      $about      = $user['about'];
} catch (PDOException $e) {
    die('Error fetching profile: ' . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - EcoPlastic</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    

    <!-- Profile Content -->
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <?php if ($success_message): ?>
            <div class="bg-green-50 border-l-4 border-green-400 p-4 mb-4">
                <p class="text-green-700"><?php echo htmlspecialchars($success_message); ?></p>
            </div>
        <?php endif; ?>
        <?php if ($error_message): ?>
            <div class="bg-red-50 border-l-4 border-red-400 p-4 mb-4">
                <p class="text-red-700"><?php echo htmlspecialchars($error_message); ?></p>
            </div>
        <?php endif; ?>
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Profile</h3>
                    <p class="mt-1 text-sm text-gray-600">
                        This information will be displayed publicly so be careful what you share.
                    </p>
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                    <div class="shadow sm:rounded-md sm:overflow-hidden">
                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6">
                                    <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                                    <input type="text" name="name" id="name" autocomplete="name" value="<?php echo htmlspecialchars($name); ?>" class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>

                                <div class="col-span-6 sm:col-span-4">
                                    <label for="email-address" class="block text-sm font-medium text-gray-700">Email address</label>
                                    <input type="email" name="email-address" id="email-address" autocomplete="email" value="<?php echo htmlspecialchars($email); ?>" class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
                                    <select id="country" name="country" autocomplete="country" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                                        <option value="US">United States</option>
                                        <option value="in" selected>India</option>
                                        <option value="GB">United Kingdom</option>
                                        <option value="AU">Australia</option>
                                    </select>
                                </div>

                                <div class="col-span-6">
                                    <label for="about" class="block text-sm font-medium text-gray-700">About</label>
                                    <div class="mt-1">
                                        <textarea id="about" name="about" rows="3" class="shadow-sm focus:ring-green-500 focus:border-green-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"><?php echo htmlspecialchars($about); ?></textarea>
                                    </div>
                                    <p class="mt-2 text-sm text-gray-500">Brief description for your profile.</p>
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="hidden sm:block" aria-hidden="true">
            <div class="py-5">
                <div class="border-t border-gray-200"></div>
            </div>
        </div>

       

        <div class="hidden sm:block" aria-hidden="true">
            <div class="py-5">
                <div class="border-t border-gray-200"></div>
            </div>
        </div>

        <div class="mt-10 sm:mt-0">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Notifications</h3>
                        <p class="mt-1 text-sm text-gray-600">
                            Decide which communications you'd like to receive and in what format.
                        </p>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form action="#" method="POST">
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                <fieldset>
                                    <legend class="sr-only">By Email</legend>
                                    <div class="text-base font-medium text-gray-900" aria-hidden="true">By Email</div>
                                    <div class="mt-4 space-y-4">
                                        <div class="flex items-start">
                                            <div class="flex items-center h-5">
                                                <input id="campaigns" name="campaigns" type="checkbox" checked class="focus:ring-green-500 h-4 w-4 text-green-600 border-gray-300 rounded">
                                            </div>
                                            <div class="ml-3 text-sm">
                                                <label for="campaigns" class="font-medium text-gray-700">Campaigns</label>
                                                <p class="text-gray-500">Get notified when there are new campaigns in your area.</p>
                                            </div>
                                        </div>
                                        <div class="flex items-start">
                                            <div class="flex items-center h-5">
                                                <input id="events" name="events" type="checkbox" checked class="focus:ring-green-500 h-4 w-4 text-green-600 border-gray-300 rounded">
                                            </div>
                                            <div class="ml-3 text-sm">
                                                <label for="events" class="font-medium text-gray-700">Events</label>
                                                <p class="text-gray-500">Get notified about upcoming environmental events.</p>
                                            </div>
                                        </div>
                                        <div class="flex items-start">
                                            <div class="flex items-center h-5">
                                                <input id="updates" name="updates" type="checkbox" class="focus:ring-green-500 h-4 w-4 text-green-600 border-gray-300 rounded">
                                            </div>
                                            <div class="ml-3 text-sm">
                                                <label for="updates" class="font-medium text-gray-700">Updates</label>
                                                <p class="text-gray-500">Get updates about your account activity.</p>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend class="sr-only">Push Notifications</legend>
                                    <div class="text-base font-medium text-gray-900" aria-hidden="true">Push Notifications</div>
                                    <div class="mt-4 space-y-4">
                                        <div class="flex items-start">
                                            <div class="flex items-center h-5">
                                                <input id="push-everything" name="push-notifications" type="radio" checked class="focus:ring-green-500 h-4 w-4 text-green-600 border-gray-300">
                                            </div>
                                            <div class="ml-3 text-sm">
                                                <label for="push-everything" class="font-medium text-gray-700">Everything</label>
                                                <p class="text-gray-500">Get notified about all activity.</p>
                                            </div>
                                        </div>
                                        <div class="flex items-start">
                                            <div class="flex items-center h-5">
                                                <input id="push-email" name="push-notifications" type="radio" class="focus:ring-green-500 h-4 w-4 text-green-600 border-gray-300">
                                            </div>
                                            <div class="ml-3 text-sm">
                                                <label for="push-email" class="font-medium text-gray-700">Same as email</label>
                                                <p class="text-gray-500">Get notified only when you receive an email.</p>
                                            </div>
                                        </div>
                                        <div class="flex items-start">
                                            <div class="flex items-center h-5">
                                                <input id="push-nothing" name="push-notifications" type="radio" class="focus:ring-green-500 h-4 w-4 text-green-600 border-gray-300">
                                            </div>
                                            <div class="ml-3 text-sm">
                                                <label for="push-nothing" class="font-medium text-gray-700">No push notifications</label>
                                                <p class="text-gray-500">Don't receive any push notifications.</p>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 mt-8">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-white text-lg font-semibold mb-4">About EcoPlastic</h3>
                    <p class="text-gray-300">Dedicated to reducing plastic waste through awareness, education, and community action.</p>
                </div>
                <div>
                    <h3 class="text-white text-lg font-semibold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="resources.php" class="text-gray-300 hover:text-white">Resources</a></li>
                        <li><a href="campaigns.php" class="text-gray-300 hover:text-white">Campaigns</a></li>
                        <li><a href="solutions.php" class="text-gray-300 hover:text-white">Solutions</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-white text-lg font-semibold mb-4">Contact Us</h3>
                    <ul class="space-y-2">
                        <li class="text-gray-300">Email: info@ecoplastic.com</li>
                        <li class="text-gray-300">Phone: (555) 123-4567</li>
                    </ul>
                </div>
            </div>
            <div class="mt-8 border-t border-gray-700 pt-8">
                <p class="text-center text-gray-300">&copy; 2024 EcoPlastic. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // User menu toggle
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

        // Password validation
        const newPassword = document.getElementById('new-password');
        const confirmPassword = document.getElementById('confirm-password');
        
        confirmPassword.addEventListener('input', function() {
            if (this.value !== newPassword.value) {
                this.setCustomValidity('Passwords do not match');
            } else {
                this.setCustomValidity('');
            }
        });
    </script>
</body>
</html> 