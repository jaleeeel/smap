<?php
include 'db_config.php'; // brings in $pdo

// Verify PDO connection exists
if (!isset($pdo) || !($pdo instanceof PDO)) {
    die("Database connection is not properly initialized");
}

try {
    // Fetch marriage records using PDO
    $sql = "SELECT * FROM marriage_records;";
    $stmt = $pdo->query($sql);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    if (empty($records)) {
        $records = []; // Ensure $records is always an array
    }
} catch (PDOException $e) {
    // More user-friendly error handling
    die("<div class='error'>Could not load marriage records. Please try again later.<br>
         <small>Technical details: " . htmlspecialchars($e->getMessage()) . "</small></div>");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Marriage Records</title>
    <link rel="stylesheet" href="baptism.css" />
</head>
<body>
    <div class="records-container">
        <header>
            <h1>MARRIAGE RECORDS</h1>
            <a href="homepage.php" class="btn go-back">Go Back</a>
        </header>

        <table class="records-table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Groom</th>
                    <th>Bride</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                try {
                    $stmt = $pdo->query("SELECT * FROM marriage_records ORDER BY marriage_date DESC");
                    $count = 1;
                    while ($row = $stmt->fetch()) {
                        echo "<tr>";
                        echo "<td>{$count}</td>";
                        echo "<td>{$row['groom_name']}</td>";
                        echo "<td>{$row['bride_name']}</td>";
                        echo "<td>{$row['marriage_date']}</td>";
                        echo "<td class='action-buttons'>
                                <a href='marriageView.php?id={$row['id']}' class='btn view-btn' title='View'>&#128065;</a>
                                <a href='marriageEdit.php?id={$row['id']}' class='btn edit-btn' title='Edit'>&#9998;</a>
                                <a href='marriageDelete.php?id={$row['id']}' class='btn delete-btn' title='Delete' onclick='return confirm(\"Delete this record?\");'>&#128465;</a>
                                <a href='marriageCert.php?id={$row['id']}' class='btn print-btn' title='Print Certificate' target='_blank'>&#128424;</a>
                              </td>";
                        echo "</tr>";
                        $count++;
                    }
                } catch (PDOException $e) {
                    echo "<tr><td colspan='5'>❌ Error fetching records: " . $e->getMessage() . "</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <div style="text-align: center; margin-top: 30px;">
            <a href="marriageReg.php" class="btn add-btn">Add New Record</a>
        </div>

        <footer>
            Copyright © SMAP 2025. smap.com. All Rights Reserved |
            <a href="privacy.php">Privacy Policy</a>
        </footer>
    </div>
</body>
</html>
