<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baptismal Records</title>
    <link rel="stylesheet" href="baptism.css">
    <link rel="stylesheet" href="marriage.css"> <!-- Include marriage styles for consistency -->
</head>
<body>

<div class="records-container">
    <header>
        <h1>BAPTISMAL RECORDS</h1>
        <a href="homepage.php" class="btn go-back">Go Back</a>
        <button class="close-btn" onclick="window.close();">&times;</button>
    </header>
    
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $records = [
                ['id' => 1, 'name' => 'Juan Dela Cruz', 'date' => '2025-01-15'],
                ['id' => 2, 'name' => 'Maria Clara', 'date' => '2025-02-20'],
            ];
            $count = 1;
            foreach ($records as $record) {
                echo "<tr>";
                echo "<td>{$count}</td>";
                echo "<td>{$record['name']}</td>";
                echo "<td>{$record['date']}</td>";
                echo "<td class='action-buttons'>
                        <a href='viewBaptism.php?id={$record['id']}' class='view-btn'>View</a>
                        <a href='editBaptism.php?id={$record['id']}' class='edit-btn'>Edit</a>
                        <a href='deleteBaptism.php?id={$record['id']}' class='delete-btn' onclick='return confirm(\"Are you sure you want to delete this record?\");'>Delete</a>
                        <a href='certificate.php?id={$record['id']}' class='print-btn' target='_blank'>Print</a>
                      </td>";
                echo "</tr>";
                $count++;
            }
            ?>
        </tbody>
    </table>
    
    <a href="baptismReg.php" class="btn add-new">Add New Record</a>
    
    <footer>
        Copyright © SMAP 2025. smap.com. All Rights Reserved | <a href="privacy.php">Privacy Policy</a>
    </footer>
</div>

</body>
</html>
