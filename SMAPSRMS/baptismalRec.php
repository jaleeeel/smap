<?php
session_start();
include 'db_config.php'; // This should define $pdo
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Communion Records</title>
    <link rel="stylesheet" href="communion.css" />
</head>
<body>
    <div class="form-container">
        <header>
            <h2>BAPTISMAL RECORDS</h2>
            <a href="homepage.php" class="btn go-back">Go Back</a>
            
        </header>

        <table class="records-table">
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
                try {
                    $stmt = $pdo->query("SELECT id, child_name, baptism_date FROM baptismal_records ORDER BY baptism_date DESC");
                    $records = $stmt->fetchAll();
                    $count = 1;

                    if ($records) {
                        foreach ($records as $row) {
                            echo "<tr>";
                            echo "<td>" . $count++ . "</td>";
                            echo "<td>" . htmlspecialchars($row['child_name']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['baptism_date']) . "</td>";
                            echo "<td class='action-buttons'>
                                    <a href='baptismView.php?id={$row['id']}' class='btn view-btn'>View</a>
                                    <a href='baptismEdit.php?id={$row['id']}' class='btn edit-btn'>Edit</a>
                                    <a href='baptismDelete.php?id={$row['id']}' class='btn delete-btn' onclick='return confirm(\"Are you sure you want to delete this record?\");'>Delete</a>
                                    <a href='baptismCert.php?id={$row['id']}&type=communion' class='btn print-btn' target='_blank'>Print</a>
                                  </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>No records found.</td></tr>";
                    }
                } catch (PDOException $e) {
                    echo "<tr><td colspan='4'>Error fetching records: " . htmlspecialchars($e->getMessage()) . "</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <a href="baptismReg.php" class="btn add-btn">Add New Record</a>

        <footer>
            &copy; SMAP 2025. smap.com. All Rights Reserved | <a href="privacy.php">Privacy Policy</a>
        </footer>
    </div>
</body>
</html>
