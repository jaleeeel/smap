<?php
session_start();
include 'db_config.php';

// Fetch confirmation records from the database
$records = [];
try {
    $stmt = $pdo->query("SELECT * FROM confirmation_records");
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // Handle error gracefully
    $records = []; // Set records to an empty array
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Confirmation Records</title>
    <link rel="stylesheet" href="dashboard.css" />
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .form-container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        header {
            text-align: center;
            margin-bottom: 20px;
        }
        h2 {
            color: #333;
        }
        .records-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .records-table th, .records-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .records-table th {
            background-color: #4CAF50;
            color: white;
        }
        .records-table tr:hover {
            background-color: #f1f1f1;
        }
        .action-buttons a {
            margin-right: 5px;
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 5px;
            color: white;
        }
        .view-btn { background-color: #007BFF; }
        .edit-btn { background-color: #FFC107; }
        .delete-btn { background-color: #DC3545; }
        .print-btn { background-color: #28A745; }
        .add-btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        footer {
            text-align: center;
            margin-top: 20px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <header>
            <h2>CONFIRMATION RECORDS</h2>
        </header>

        <div class="action-buttons">
            <button onclick="window.history.back();" class="btn">Go Back</button>
            <button onclick="window.close();" class="btn">Close</button>
        </div>

        <table class="records-table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Child's Name</th>
                    <th>Confirmation Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($records) > 0): ?>
                    <?php $count = 1; ?>
                    <?php foreach ($records as $record): ?>
                        <tr>
                            <td><?= $count ?></td>
                            <td><?= htmlspecialchars($record['child_name']) ?></td>
                            <td><?= htmlspecialchars($record['confirmation_date']) ?></td>
                            <td class='action-buttons'>
                                <a href='view_confirmation.php?id=<?= $record['id'] ?>' class='btn view-btn'>View</a>
                                <a href='edit_confirmation.php?id=<?= $record['id'] ?>' class='btn edit-btn'>Edit</a>
                                <a href='delete_confirmation.php?id=<?= $record['id'] ?>' class='btn delete-btn' onclick='return confirm("Are you sure you want to delete this record?");'>Delete</a>
                                <a href='certificate.php?id=<?= $record['id'] ?>&type=confirmation' class='btn print-btn' target='_blank'>Print</a>
                            </td>
                        </tr>
                        <?php $count++; ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4">No confirmation records found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <a href="confirmationReg.php" class="btn add-btn">Add New Record</a>

        <footer>
            Copyright © SMAP 2025. smap.com. All Rights Reserved | <a href="privacy.php">Privacy Policy</a>
        </footer>
    </div>
</body>
</html>
