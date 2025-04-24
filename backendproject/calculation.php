<?php
session_start();

// Database connection
$host = "localhost";
$dbname = "ecoplastic";
$username = "root";
$password = "";
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Ensure user is logged in
$user_id = $_SESSION['user_id'] ?? null;
if (!$user_id) {
    die("User not logged in.");
}

try {
    // Step 1: Count joined campaigns
    $countStmt = $conn->prepare("SELECT COUNT(*) FROM user_campaigns WHERE user_id = ?");
    $countStmt->execute([$user_id]);
    $joinedCount = (int)$countStmt->fetchColumn();
    $ecoPoints = $joinedCount * 5;

    // Debug log
    echo "<script>console.log('User ID: $user_id, Joined: $joinedCount, Eco Points: $ecoPoints');</script>";

    // Step 2: Upsert into user_stats
    $upsert = $conn->prepare("
        INSERT INTO user_stats (user_id, campaigns_joined, eco_points)
        VALUES (?, ?, ?)
        ON DUPLICATE KEY UPDATE 
            campaigns_joined = VALUES(campaigns_joined), 
            eco_points = VALUES(eco_points)
    ");
    $upsert->execute([$user_id, $joinedCount, $ecoPoints]);

} catch (PDOException $e) {
    echo "Error syncing joined campaigns: " . $e->getMessage();
}

?>
