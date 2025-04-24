<?php include 'header.php'; ?>

<?php
// Remove the session_start() call since it's already in header.php
// session_start();

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

    // Fetch all campaigns
    $stmt = $conn->prepare("SELECT id, title, description, detail1, detail2, status, type FROM campaigns");
    $stmt->execute();
    $campaigns = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Handle join action
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'join') {
    $user_id = $_SESSION['user_id'];
    $campaign_id = $_POST['campaign_id'];

    try {
        // Insert into user_campaigns
        $stmt = $conn->prepare("INSERT INTO user_campaigns (user_id, campaign_id) VALUES (?, ?)");
        $stmt->execute([$user_id, $campaign_id]);
        echo "<script>alert('Campaign joined successfully!');</script>";
    } catch(PDOException $e) {
        echo "Error joining campaign: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campaigns - EcoPlastic</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .campaign-card {
            position: relative;
            transition: all 0.3s ease;
        }
        .campaign-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
        .join-btn {
            transition: all 0.2s ease;
        }
        .join-btn:hover {
            transform: scale(1.05);
        }
        .timeline-item {
            position: relative;
            padding-left: 3rem;
        }
        .timeline-item::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 2px;
            background-color: #10B981;
        }
        .timeline-item::after {
            content: '';
            position: absolute;
            left: -0.5rem;
            top: 0.5rem;
            width: 1rem;
            height: 1rem;
            border-radius: 50%;
            background-color: #10B981;
        }
        .status-badge {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background-color: #10B981;
            color: #fff;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.875rem;
            font-weight: 600;
        }
    </style>
</head>
<body class="bg-gray-50">

    <div class="bg-white">
        <div class="max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl font-extrabold tracking-tight text-gray-900 sm:text-5xl md:text-6xl">
                    <span class="block">Active Campaigns</span>
                    <span class="block text-green-600">Join the Movement</span>
                </h1>
                <p class="mt-3 max-w-md mx-auto text-base text-gray-500 sm:text-lg md:mt-5 md:text-xl md:max-w-3xl">
                    Participate in initiatives that make a real difference in reducing plastic waste.
                </p>
            </div>
        </div>
    </div>


    <div class="bg-green-600 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-extrabold text-white">Campaign Impact</h2>
                <p class="mt-3 max-w-2xl mx-auto text-xl text-green-100">Our campaigns are making a difference</p>
            </div>
            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-4">
                <div class="bg-white bg-opacity-10 rounded-lg p-6 text-center">
                    <div class="text-4xl font-bold text-white mb-2">12</div>
                    <div class="text-green-100">Active Campaigns</div>
                </div>
                <div class="bg-white bg-opacity-10 rounded-lg p-6 text-center">
                    <div class="text-4xl font-bold text-white mb-2">5,000+</div>
                    <div class="text-green-100">Participants</div>
                </div>
                <div class="bg-white bg-opacity-10 rounded-lg p-6 text-center">
                    <div class="text-4xl font-bold text-white mb-2">25</div>
                    <div class="text-green-100">Countries</div>
                </div>
                <div class="bg-white bg-opacity-10 rounded-lg p-6 text-center">
                    <div class="text-4xl font-bold text-white mb-2">100+</div>
                    <div class="text-green-100">Tons Recycled</div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-green-50 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-extrabold text-gray-900">Featured Campaign</h2>
                <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500">Our most impactful initiative this month</p>
            </div>
            <div class="bg-white overflow-hidden shadow rounded-lg campaign-card">
                <div class="md:flex">
                    <div class="md:flex-shrink-0">
                        <img class="h-64 w-full object-cover md:w-64" src="https://images.unsplash.com/photo-1532601224476-15c79f2f7a51?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Beach Cleanup">
                    </div>
                    <div class="p-8">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="text-2xl font-bold text-gray-900">Global Beach Cleanup Day</h3>
                                <p class="mt-1 text-sm text-gray-500">September 15, 2024</p>
                            </div>
                            <span class="px-3 py-1 text-sm font-semibold text-green-800 bg-green-100 rounded-full">Featured</span>
                        </div>
                        <p class="mt-4 text-gray-600">
                            Join thousands of volunteers worldwide for our annual Global Beach Cleanup Day. This year, we're aiming to remove 100 tons of plastic waste from beaches across 50 countries.
                        </p>
                        <div class="mt-6 flex flex-col sm:flex-row sm:space-x-4">
                            <form method="POST" action="campaigns.php">
                                <input type="hidden" name="campaign_id" value="1">
                                <button type="submit" name="action" value="join" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-green-600 hover:bg-green-700 join-btn">
                                Join Campaign
                                </button>
                            </form>
                            <a href="#" class="mt-3 sm:mt-0 inline-flex items-center justify-center px-5 py-3 border border-gray-300 shadow-sm text-base font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                Learn More
                            </a>
                        </div>
                        <div class="mt-6 flex items-center text-sm text-gray-500">
                            <i class="fas fa-users mr-2"></i>
                            <span>5,000+ participants already registered</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="text-center mb-10">
            <h2 class="text-3xl font-extrabold text-gray-900">All Campaigns</h2>
            <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500">Find the perfect campaign for you</p>
        </div>

        <div class="mb-8 bg-white p-4 rounded-lg shadow">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                <div class="mb-4 md:mb-0">
                    <label for="campaign-filter" class="block text-sm font-medium text-gray-700 mb-1">Filter by Type</label>
                    <select id="campaign-filter" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm rounded-md">
                        <option value="all">All Campaigns</option>
                        <option value="cleanup">Cleanup Initiatives</option>
                        <option value="education">Educational Programs</option>
                        <option value="business">Business Programs</option>
                        <option value="challenge">Challenges</option>
                    </select>
                </div>
                <div>
                    <label for="campaign-search" class="block text-sm font-medium text-gray-700 mb-1">Search Campaigns</label>
                    <div class="relative">
                        <input type="text" id="campaign-search" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm rounded-md" placeholder="Search...">
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                            <i class="fas fa-search text-gray-400"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="space-y-8">
            <?php foreach ($campaigns as $campaign): ?>
            <div class="bg-white shadow overflow-hidden sm:rounded-lg campaign-card">
                <span class="status-badge"><?php echo htmlspecialchars($campaign['status']); ?></span>
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900"><?php echo htmlspecialchars($campaign['title']); ?></h3>
                    <p class="mt-1 text-sm text-gray-500"><?php echo htmlspecialchars($campaign['description']); ?></p>
                </div>
                <div class="border-t border-gray-200">
                    <div class="px-4 py-5 sm:p-6">
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
                        <div class="mt-6">
                            <form method="POST" action="campaigns.php">
                                <input type="hidden" name="campaign_id" value="<?php echo $campaign['id']; ?>">
                                <button type="submit" name="action" value="join" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 join-btn">
                                Join Campaign
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>


    <div class="bg-green-50 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-extrabold text-gray-900">Campaign Timeline</h2>
                <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500">Upcoming and past campaigns</p>
            </div>
            <div class="max-w-3xl mx-auto">
                <div class="space-y-8">
                    <div class="timeline-item">
                        <div class="bg-white p-6 rounded-lg shadow">
                            <div class="flex items-center justify-between">
                                <h3 class="text-lg font-medium text-gray-900">Global Beach Cleanup Day</h3>
                                <span class="px-3 py-1 text-sm font-semibold text-green-800 bg-green-100 rounded-full">Upcoming</span>
                            </div>
                            <p class="mt-2 text-sm text-gray-600">September 15, 2024</p>
                            <p class="mt-4 text-gray-600">
                                Join thousands of volunteers worldwide for our annual Global Beach Cleanup Day.
                            </p>
                            <div class="mt-4">
                                <a href="#" class="text-green-600 hover:text-green-500 inline-flex items-center">
                                    Learn More
                                    <i class="fas fa-arrow-right ml-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="bg-white p-6 rounded-lg shadow">
                            <div class="flex items-center justify-between">
                                <h3 class="text-lg font-medium text-gray-900">Plastic-Free July Challenge</h3>
                                <span class="px-3 py-1 text-sm font-semibold text-green-800 bg-green-100 rounded-full">Active</span>
                            </div>
                            <p class="mt-2 text-sm text-gray-600">July 1-31, 2024</p>
                            <p class="mt-4 text-gray-600">
                                A month-long challenge to eliminate single-use plastics from your daily life.
                            </p>
                            <div class="mt-4">
                                <a href="#" class="text-green-600 hover:text-green-500 inline-flex items-center">
                                    Learn More
                                    <i class="fas fa-arrow-right ml-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="bg-white p-6 rounded-lg shadow">
                            <div class="flex items-center justify-between">
                                <h3 class="text-lg font-medium text-gray-900">Earth Day Cleanup</h3>
                                <span class="px-3 py-1 text-sm font-semibold text-gray-800 bg-gray-100 rounded-full">Past</span>
                            </div>
                            <p class="mt-2 text-sm text-gray-600">April 22, 2024</p>
                            <p class="mt-4 text-gray-600">
                                Community cleanup events held in 30 cities to celebrate Earth Day.
                            </p>
                            <div class="mt-4">
                                <a href="#" class="text-green-600 hover:text-green-500 inline-flex items-center">
                                    View Results
                                    <i class="fas fa-arrow-right ml-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="bg-white p-6 rounded-lg shadow">
                            <div class="flex items-center justify-between">
                                <h3 class="text-lg font-medium text-gray-900">Business Sustainability Summit</h3>
                                <span class="px-3 py-1 text-sm font-semibold text-gray-800 bg-gray-100 rounded-full">Past</span>
                            </div>
                            <p class="mt-2 text-sm text-gray-600">March 15, 2024</p>
                            <p class="mt-4 text-gray-600">
                                A summit bringing together businesses to discuss plastic reduction strategies.
                            </p>
                            <div class="mt-4">
                                <a href="#" class="text-green-600 hover:text-green-500 inline-flex items-center">
                                    View Results
                                    <i class="fas fa-arrow-right ml-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
 
        const campaignFilter = document.getElementById('campaign-filter');
        const campaignSearch = document.getElementById('campaign-search');
        const campaignCards = document.querySelectorAll('.campaign-card');
        
        function filterCampaigns() {
            const filterValue = campaignFilter.value;
            const searchTerm = campaignSearch.value.toLowerCase();
            
            campaignCards.forEach(card => {
                const title = card.querySelector('h3').textContent.toLowerCase();
                const description = card.querySelector('p').textContent.toLowerCase();
                const typeElement = card.querySelector('.fa-tag').nextElementSibling;
                const type = typeElement ? typeElement.textContent.toLowerCase() : '';
                
                const matchesFilter = filterValue === 'all' || type.includes(filterValue);
                const matchesSearch = title.includes(searchTerm) || description.includes(searchTerm);
                
                if (matchesFilter && matchesSearch) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }
        
        campaignFilter.addEventListener('change', filterCampaigns);
        campaignSearch.addEventListener('input', filterCampaigns);
    </script>
</body>
</html> 