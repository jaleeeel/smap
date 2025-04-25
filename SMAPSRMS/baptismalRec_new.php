<?php
session_start();
require_once 'db_config.php';

// Verify PDO connection exists
if (!isset($pdo) || !($pdo instanceof PDO)) {
    die("Database connection is not properly initialized");
}

try {
    // Fetch baptismal records using PDO
    $sql = "SELECT * FROM baptisms";
    $stmt = $pdo->query($sql);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    if (empty($records)) {
        $records = []; // Ensure $records is always an array
    }
} catch (PDOException $e) {
    die("<div class='error'>Could not load baptismal records. Please try again later.<br>
         <small>Technical details: " . htmlspecialchars($e->getMessage()) . "</small></div>");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baptismal Records</title>
    <link rel="stylesheet" href="marriage.css"> <!-- Using marriage.css for consistent styling -->
    <style>
        /* Additional styles specific to baptismal records */
        .records-container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 16px;
            padding: 40px;
            width: 90%;
            max-width: 1200px;
            margin: 20px auto;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }
        h1 {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 30px;
        }
        th {
            background-color: #3498db; /* Blue accent color for baptismal records */
        }
    </style>
</head>
<body>

<div class="records-container">
    <header>
        <h1>BAPTISMAL RECORDS</h1>
        <a href="homepage.php" class="btn go-back">Go Back</a>
        <button class="close-btn" onclick="window.location.href='homepage.php';">&times;</button>
    </header>
    
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Baptism Date</th>
                <th>Parents</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($records as $index => $record): ?>
            <tr>
                <td><?= $index+1 ?></td>
                <td><?= htmlspecialchars($record['name']) ?></td>
                <td><?= date('F j, Y', strtotime($record['baptism_date'])) ?></td>
                <td><?= htmlspecialchars($record['parents']) ?></td>
                <td class="actions">
                    <a href="viewBaptism.php?id=<?= $record['id'] ?>" class="btn view">View</a>
                    <a href="editBaptism.php?id=<?= $record['id'] ?>" class="btn edit">Edit</a>
                    <a href="deleteBaptism.php?id=<?= $record['id'] ?>" class="btn delete" onclick="return confirm('Delete this record?')">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
    <div style="text-align: center; margin-top: 30px;">
        <a href="baptismReg.php" class="btn add-new">Register New Baptism</a>
    </div>
</div>

</body>
</html>
