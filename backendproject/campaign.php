<?php
session_start();

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

// Handle join and exit actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];
    $campaign_id = $_POST['campaign_id'];
    $action = $_POST['action'];

    if ($action === 'join') {
        // Join campaign
        try {
            $stmt = $conn->prepare("INSERT INTO user_campaigns (user_id, campaign_id) VALUES (?, ?)");
            $stmt->execute([$user_id, $campaign_id]);
            header('Location: userdashboard.php');
            exit();
        } catch(PDOException $e) {
            echo "Error joining campaign: " . $e->getMessage();
        }
    } elseif ($action === 'exit') {
        // Exit campaign
        try {
            $stmt = $conn->prepare("DELETE FROM user_campaigns WHERE user_id = ? AND campaign_id = ?");
            $stmt->execute([$user_id, $campaign_id]);
            header('Location: userdashboard.php');
            exit();
        } catch(PDOException $e) {
            echo "Error exiting campaign: " . $e->getMessage();
        }
    }
}
?>

<!-- Existing HTML content for campaigns -->
<!-- Add Join Campaign button for each campaign -->
<form method="POST" action="campaign.php">
    <input type="hidden" name="campaign_id" value="<?php echo $campaign['id']; ?>">
    <button type="submit" name="action" value="join" class="text-green-600 hover:text-green-800">Join Campaign</button>
</form> 