<?php
include 'db_config.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    try {
        $stmt = $pdo->prepare("SELECT * FROM communion_records WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $record = $stmt->fetch();

        if (!$record) {
            echo "Record not found.";
            exit;
        }
    } catch (PDOException $e) {
        die("Error retrieving record: " . $e->getMessage());
    }
} else {
    die("Invalid ID.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Communion Record</title>
    <link rel="stylesheet" href="communion.css">
</head>
<body>
    <div class="form-container">
        <h2>View Communion Record</h2>
        <p><strong>Name:</strong> <?= htmlspecialchars($record['participant_name']) ?></p>
        <p><strong>Date of Birth:</strong> <?= htmlspecialchars($record['dob']) ?></p>
        <p><strong>Gender:</strong> <?= htmlspecialchars($record['gender']) ?></p>
        <p><strong>School Grade:</strong> <?= htmlspecialchars($record['school_grade']) ?></p>
        <p><strong>Guardian Name:</strong> <?= htmlspecialchars($record['guardian_name']) ?></p>
        <p><strong>Contact:</strong> <?= htmlspecialchars($record['contact']) ?></p>
        <p><strong>Address:</strong> <?= htmlspecialchars($record['address']) ?></p>
        <p><strong>Communion Date:</strong> <?= htmlspecialchars($record['communion_date']) ?></p>
        <p><strong>Priest Name:</strong> <?= htmlspecialchars($record['priest_name']) ?></p>

        <a href="communion.php" class="btn">Back to Records</a>
    </div>
</body>
</html>
