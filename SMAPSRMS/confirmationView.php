<?php
include 'db_config.php';

$id = $_GET['id'] ?? null;
if (!$id) die("Invalid record ID.");

$stmt = $pdo->prepare("SELECT * FROM confirmation_records WHERE id = ?");
$stmt->execute([$id]);
$record = $stmt->fetch();

if (!$record) die("Record not found.");
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Confirmation Record</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
<div class="form-container">
    <h2>View Confirmation Record</h2>
    <p><strong>Child's Name:</strong> <?= htmlspecialchars($record['child_name']) ?></p>
    <p><strong>Date of Birth:</strong> <?= htmlspecialchars($record['dob']) ?></p>
    <p><strong>Gender:</strong> <?= htmlspecialchars($record['gender']) ?></p>
    <p><strong>Confirmation Date:</strong> <?= htmlspecialchars($record['confirmation_date']) ?></p>
    <p><strong>Father's Name:</strong> <?= htmlspecialchars($record['father_name']) ?></p>
    <p><strong>Mother's Name:</strong> <?= htmlspecialchars($record['mother_name']) ?></p>
    <p><strong>Address:</strong> <?= htmlspecialchars($record['address']) ?></p>
    <p><strong>Priest Name:</strong> <?= htmlspecialchars($record['priest_name']) ?></p>
    <br>
    <a href="confirmation_records.php" class="btn">Back</a>
</div>
</body>
</html>
