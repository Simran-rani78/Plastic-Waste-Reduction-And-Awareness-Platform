<?php include 'header.php'; ?>

<?php


// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Database connection
$host = "localhost";
$dbname = "ecoplastic";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Fetch user data
$user_id = $_SESSION['user_id'];

// Handle exit campaign
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'exit') {
    $campaign_id = $_POST['campaign_id'];
    try {
        $deleteStmt = $conn->prepare("DELETE FROM user_campaigns WHERE user_id = ? AND campaign_id = ?");
        $deleteStmt->execute([$user_id, $campaign_id]);
        header("Location: userdashboard.php");
        exit();
    } catch (PDOException $e) {
        echo "Error exiting campaign: " . $e->getMessage();
    }
}

// Sync joined campaigns count into user_stats
try {
    $countStmt = $conn->prepare("SELECT COUNT(*) FROM user_campaigns WHERE user_id = ?");
    $countStmt->execute([$user_id]);
    $joinedCount = (int)$countStmt->fetchColumn();

    $update = $conn->prepare("UPDATE user_stats SET campaigns_joined = ? WHERE user_id = ?");
    $update->execute([$joinedCount, $user_id]);
    if ($update->rowCount() === 0) {
        $insert = $conn->prepare("INSERT INTO user_stats (user_id, campaigns_joined) VALUES (?, ?)");
        $insert->execute([$user_id, $joinedCount]);
    }
} catch (PDOException $e) {
    echo "Error syncing joined campaigns: " . $e->getMessage();
}

// Example query to fetch user-specific data
try {
    $stmt = $conn->prepare("SELECT * FROM user_stats WHERE user_id = ?");
    $stmt->execute([$user_id]);
    $userStats = $stmt->fetch(PDO::FETCH_ASSOC);

    // Example data
    $plasticReduced = $userStats['plastic_reduced'] ?? '0 kg';
    $carbonFootprint = $userStats['carbon_footprint'] ?? '0%';
    $campaignsJoined = $userStats['campaigns_joined'] ?? '0';
    $ecoPoints = $userStats['eco_points'] ?? '0';
} catch(PDOException $e) {
    echo "Error fetching data: " . $e->getMessage();
}

// Initialize joined campaigns array
$joinedCampaigns = [];

// Fetch joined campaigns
try {
    $stmt = $conn->prepare("SELECT c.id, c.title, c.description FROM campaigns c JOIN user_campaigns uc ON c.id = uc.campaign_id WHERE uc.user_id = ?");
    $stmt->execute([$user_id]);
    $joinedCampaigns = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error fetching joined campaigns: " . $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - EcoPlastic</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-50">

    <!-- Dashboard Content -->
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <!-- Welcome Section -->
        <div class="bg-white overflow-hidden shadow rounded-lg mb-6">
            <div class="px-4 py-5 sm:p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <img class="h-12 w-12 rounded-full" src="https://ui-avatars.com/api/?name=John+Doe&background=0D9488&color=fff" alt="User avatar">
                    </div>
                    <div class="ml-5">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Welcome back, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</h3>
                        <p class="text-sm text-gray-500">Here's your environmental impact summary for this month.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4 mb-6">
            <!-- Plastic Reduced -->
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-recycle text-green-500 text-2xl"></i>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">Plastic Reduced</dt>
                                <dd class="flex items-baseline">
                                    <div class="text-2xl font-semibold text-gray-900"><?php echo htmlspecialchars($plasticReduced); ?></div>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Carbon Footprint -->
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-leaf text-green-500 text-2xl"></i>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">Carbon Footprint</dt>
                                <dd class="flex items-baseline">
                                    <div class="text-2xl font-semibold text-gray-900"><?php echo htmlspecialchars($carbonFootprint); ?></div>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Campaigns Joined -->
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-handshake text-green-500 text-2xl"></i>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">Campaigns Joined</dt>
                                <dd class="flex items-baseline">
                                    <div class="text-2xl font-semibold text-gray-900"><?php echo htmlspecialchars($campaignsJoined); ?></div>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Points Earned -->
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-star text-green-500 text-2xl"></i>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">Eco Points</dt>
                                <dd class="flex items-baseline">
                                    <div class="text-2xl font-semibold text-gray-900"><?php echo htmlspecialchars($ecoPoints); ?></div>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Joined Campaigns Section -->
        <div class="space-y-4 mb-6">
            <h3 class="text-lg font-medium text-gray-900 border-b border-gray-200 pb-2 mb-4">Joined Campaigns</h3>
            <?php if (empty($joinedCampaigns)): ?>
                <p class="text-gray-500">You haven't joined any campaigns yet.</p>
            <?php else: ?>
                <?php foreach ($joinedCampaigns as $campaign): ?>
                    <div class="bg-white shadow rounded-lg px-6 py-5 flex flex-col sm:flex-row sm:items-center sm:justify-between">
                        <div>
                            <h4 class="text-lg font-semibold text-gray-900"><?php echo htmlspecialchars($campaign['title']); ?></h4>
                            <p class="mt-1 text-sm text-gray-600"><?php echo htmlspecialchars($campaign['description']); ?></p>
                        </div>
                        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="mt-4 sm:mt-0">
                            <input type="hidden" name="campaign_id" value="<?php echo $campaign['id']; ?>">
                            <button type="submit" name="action" value="exit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 text-sm font-medium">
                                Exit Campaign
                            </button>
                        </form>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <!-- Upcoming Events -->
        <div class="bg-white shadow rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Upcoming Events</h3>
                <div class="space-y-4">
                    <div class="flex items-center p-4 bg-green-50 rounded-lg">
                        <div class="flex-shrink-0">
                            <i class="fas fa-calendar-alt text-green-500 text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-sm font-medium text-gray-900">Community Recycling Drive</h4>
                            <p class="text-sm text-gray-500">March 25, 2024 • 10:00 AM</p>
                        </div>
                        <div class="ml-auto">
                            <button class="inline-flex items-center px-3 py-1 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700">
                                Join
                            </button>
                        </div>
                    </div>
                    <div class="flex items-center p-4 bg-green-50 rounded-lg">
                        <div class="flex-shrink-0">
                            <i class="fas fa-calendar-alt text-green-500 text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-sm font-medium text-gray-900">Plastic-Free Workshop</h4>
                            <p class="text-sm text-gray-500">March 28, 2024 • 2:00 PM</p>
                        </div>
                        <div class="ml-auto">
                            <button class="inline-flex items-center px-3 py-1 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700">
                                Join
                            </button>
                        </div>
                    </div>
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
                        <li><a href="/resources.html" class="text-gray-300 hover:text-white">Resources</a></li>
                        <li><a href="/campaigns.html" class="text-gray-300 hover:text-white">Campaigns</a></li>
                        <li><a href="/solutions.html" class="text-gray-300 hover:text-white">Solutions</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-white text-lg font-semibold mb-4">Contact Us</h3>
                    <ul class="space-y-2">
                        <li class="text-gray-300">Email: info@ecoplastic.com</li>
                        <li class="text-gray-300">Phone: 12346789</li>
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
    </script>
</body>
</html> 