<?php
session_start();
include 'db_config.php';

// Get record counts from database
$records = [
    'baptism' => 0,
    'communion' => 0,
    'confirmation' => 0,
    'marriage' => 0
];

try {
    $stmt = $pdo->query("SELECT COUNT(*) FROM baptismal_records");
    $records['baptism'] = $stmt->fetchColumn();
    
    $stmt = $pdo->query("SELECT COUNT(*) FROM communion_records");
    $records['communion'] = $stmt->fetchColumn();
    
    $stmt = $pdo->query("SELECT COUNT(*) FROM confirmation_records");
    $records['confirmation'] = $stmt->fetchColumn();
    
    $stmt = $pdo->query("SELECT COUNT(*) FROM marriage_records");
    $records['marriage'] = $stmt->fetchColumn();
} catch (PDOException $e) {
    // Handle error
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="dashboard-container"> 
        <header style="text-align: center; width: 100%; margin-bottom: 30px;">
            <h1>Sacramental Records Dashboard</h1>
        </header>
        
        <div class="stats-container">
            <div class="stat-card baptism">
                <h3>Baptism Records</h3>
                <div class="stat-value"><?= $records['baptism'] ?></div>
            </div>
            
            <div class="stat-card communion">
                <h3>Communion Records</h3>
                <div class="stat-value"><?= $records['communion'] ?></div>
            </div>
            
            <div class="stat-card confirmation">
                <h3>Confirmation Records</h3>
                <div class="stat-value"><?= $records['confirmation'] ?></div>
            </div>
            
            <div class="stat-card marriage">
                <h3>Marriage Records</h3>
                <div class="stat-value"><?= $records['marriage'] ?></div>
            </div>
        </div>

        <div class="chart-container">
            <canvas id="recordsChart"></canvas>
        </div>
    </div>

    <script src="dashboard.js"></script>
</body>
</html>
