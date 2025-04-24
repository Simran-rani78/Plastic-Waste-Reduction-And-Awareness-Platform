<?php
// Database connection
$host = "localhost";
$dbname = "ecoplastic";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch all data
    $stmt = $conn->prepare("SELECT * FROM users");
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $stmt = $conn->prepare("SELECT * FROM campaigns");
    $stmt->execute();
    $campaigns = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Set headers for download
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment;filename=database_export.csv');

    $output = fopen('php://output', 'w');

    // Write users data
    fputcsv($output, array('Users Data'));
    if (!empty($users)) {
        fputcsv($output, array_keys($users[0])); // Column headers
        foreach ($users as $user) {
            fputcsv($output, $user);
        }
    }

    // Write campaigns data
    fputcsv($output, array('Campaigns Data'));
    if (!empty($campaigns)) {
        fputcsv($output, array_keys($campaigns[0])); // Column headers
        foreach ($campaigns as $campaign) {
            fputcsv($output, $campaign);
        }
    }

    fclose($output);
    exit();

} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
