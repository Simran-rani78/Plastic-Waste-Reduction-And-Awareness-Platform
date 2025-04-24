<?php
session_start();

// Check if user is logged in as admin
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'admin') {
    header('Location: adminlogin.php');
    exit();
}

// Database connection
$host = "localhost";
$dbname = "ecoplastic";
$username = "root";
$password = "";

// Initialize variables
$users = [];
$campaigns = [];

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Handle user deletion
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_user_id'])) {
        $deleteUserId = $_POST['delete_user_id'];
        $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
        $stmt->execute([$deleteUserId]);
    }

    // Handle new user creation
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['new_user'])) {
        $newUserName = $_POST['name'];
        $newUserEmail = $_POST['email'];
        $newUserPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $newUserType = $_POST['user_type'];

        $stmt = $conn->prepare("INSERT INTO users (name, email, password, user_type) VALUES (?, ?, ?, ?)");
        $stmt->execute([$newUserName, $newUserEmail, $newUserPassword, $newUserType]);
    }

    // Handle new campaign creation
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['new_campaign'])) {
        $campaignTitle = $_POST['title'];
        $campaignDescription = $_POST['description'];
        $campaignDetail1 = $_POST['detail1'];
        $campaignDetail2 = $_POST['detail2'];
        $campaignStatus = $_POST['status'];
        $campaignType = $_POST['type'];

        $stmt = $conn->prepare("INSERT INTO campaigns (title, description, detail1, detail2, status, type) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$campaignTitle, $campaignDescription, $campaignDetail1, $campaignDetail2, $campaignStatus, $campaignType]);
    }

    // Handle campaign deletion
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_campaign_id'])) {
        $deleteCampaignId = $_POST['delete_campaign_id'];
        $stmt = $conn->prepare("DELETE FROM campaigns WHERE id = ?");
        $stmt->execute([$deleteCampaignId]);
    }

    // Fetch all users
    $stmt = $conn->prepare("SELECT id, name, email, user_type, last_login FROM users");
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Fetch all campaigns
    $stmt = $conn->prepare("SELECT id, title, description, detail1, detail2, status, type FROM campaigns");
    $stmt->execute();
    $campaigns = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - EcoPlastic</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Add custom styles for input fields */
        input[type="text"], input[type="email"], input[type="password"], textarea, select {
            background-color: #f9fafb; /* Light gray background */
            border: 2px solid #d1d5db; /* Gray border */
            transition: border-color 0.3s ease;
        }
        input[type="text"]:focus, input[type="email"]:focus, input[type="password"]:focus, textarea:focus, select:focus {
            border-color: #10b981; /* Green border on focus */
            background-color: #ffffff; /* White background on focus */
        }
    </style>
</head>
<body class="bg-gray-50">
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <a href="index.php" class="text-2xl font-bold text-green-600">EcoPlastic</a>
                </div>
                <div class="hidden md:flex items-center space-x-4">
                    <a href="logout.php" class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700">Logout</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-8">Admin Dashboard</h1>

        <!-- New User Form -->
        <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-8 p-6">
            <h2 class="text-xl font-bold text-gray-900 mb-4">Add New User</h2>
            <form method="POST" action="admindashboard.php">
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" name="name" id="name" required class="mt-1 block w-full rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" id="email" required class="mt-1 block w-full rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" name="password" id="password" required class="mt-1 block w-full rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">
                    </div>
                    <div>
                        <label for="user_type" class="block text-sm font-medium text-gray-700">User Type</label>
                        <select name="user_type" id="user_type" required class="mt-1 block w-full rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                </div>
                <div class="mt-6">
                    <button type="submit" name="new_user" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        Add User
                    </button>
                </div>
            </form>
        </div>

        <!-- New Campaign Form -->
        <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-8 p-6">
            <h2 class="text-xl font-bold text-gray-900 mb-4">Add New Campaign</h2>
            <form method="POST" action="admindashboard.php">
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">Campaign Title</label>
                        <input type="text" name="title" id="title" required class="mt-1 block w-full rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">
                    </div>
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">Brief Description (30 words max)</label>
                        <textarea name="description" id="description" maxlength="150" required class="mt-1 block w-full rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"></textarea>
                    </div>
                    <div>
                        <label for="detail1" class="block text-sm font-medium text-gray-700">Detail 1</label>
                        <input type="text" name="detail1" id="detail1" required class="mt-1 block w-full rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">
                    </div>
                    <div>
                        <label for="detail2" class="block text-sm font-medium text-gray-700">Detail 2</label>
                        <input type="text" name="detail2" id="detail2" required class="mt-1 block w-full rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">
                    </div>
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                        <select name="status" id="status" required class="mt-1 block w-full rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">
                            <option value="active">Active</option>
                            <option value="upcoming">Upcoming</option>
                        </select>
                    </div>
                    <div>
                        <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
                        <select name="type" id="type" required class="mt-1 block w-full rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">
                            <option value="challenge">Challenge</option>
                            <option value="social work">Social Work</option>
                            <option value="business">Business</option>
                        </select>
                    </div>
                </div>
                <div class="mt-6">
                    <button type="submit" name="new_campaign" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        Add Campaign
                    </button>
                </div>
            </form>
        </div>

        <!-- User Table -->
        <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-8">
            <h2 class="text-xl font-bold text-gray-900 mb-4">User Management</h2>
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User Type</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Last Login</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php foreach ($users as $user): ?>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap"><?php echo htmlspecialchars($user['name']); ?></td>
                        <td class="px-6 py-4 whitespace-nowrap"><?php echo htmlspecialchars($user['email']); ?></td>
                        <td class="px-6 py-4 whitespace-nowrap"><?php echo htmlspecialchars($user['user_type']); ?></td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <?php echo $user['last_login'] ? htmlspecialchars($user['last_login']) : 'No data'; ?>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <form method="POST" action="admindashboard.php" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                <input type="hidden" name="delete_user_id" value="<?php echo $user['id']; ?>">
                                <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Add spacing between sections -->
        <div class="my-8"></div>

        <!-- Campaigns Section -->
        <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-8">
            <h2 class="text-xl font-bold text-gray-900 mb-4">Campaign Management</h2>
            <?php foreach ($campaigns as $campaign): ?>
            <div class="bg-white shadow overflow-hidden sm:rounded-lg campaign-card mb-4">
                <div class="px-4 py-5 sm:px-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-lg leading-6 font-medium text-gray-900"><?php echo htmlspecialchars($campaign['title']); ?></h3>
                            <p class="mt-1 max-w-2xl text-sm text-gray-500"><?php echo htmlspecialchars($campaign['description']); ?></p>
                        </div>
                        <span class="px-3 py-1 text-sm font-semibold text-green-800 bg-green-100 rounded-full"><?php echo htmlspecialchars($campaign['Status']); ?></span>
                    </div>
                </div>
                <div class="border-t border-gray-200">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                            <div>
                                <h4 class="text-sm font-medium text-gray-500">Campaign Details</h4>
                                <p class="mt-2 text-sm text-gray-900">Details about the campaign.</p>
                                <ul class="mt-4 space-y-2">
                                    <li class="flex items-start">
                                        <i class="fas fa-calendar-alt text-green-500 mt-1 mr-2"></i>
                                        <span class="text-sm text-gray-600">Duration: <?php echo htmlspecialchars($campaign['detail1']); ?></span>
                                    </li>
                                    <li class="flex items-start">
                                        <i class="fas fa-users text-green-500 mt-1 mr-2"></i>
                                        <span class="text-sm text-gray-600">Participants: <?php echo htmlspecialchars($campaign['detail2']); ?></span>
                                    </li>
                                    <li class="flex items-start">
                                        <i class="fas fa-tag text-green-500 mt-1 mr-2"></i>
                                        <span class="text-sm text-gray-600">Type: <?php echo htmlspecialchars($campaign['type']); ?></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Delete Button -->
                        <form method="POST" action="admindashboard.php" onsubmit="return confirm('Are you sure you want to delete this campaign?');">
                            <input type="hidden" name="delete_campaign_id" value="<?php echo $campaign['id']; ?>">
                            <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <br>
        <br>

        <div class="mt-8">
            <a href="export.php" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Download data
            </a>
        </div>
    </div>
</body>
</html>
