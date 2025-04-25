<?php
include 'db_config.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    echo "Invalid request.";
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM baptismal_records WHERE id = ?");
$stmt->execute([$id]);
$record = $stmt->fetch();

if (!$record) {
    echo "Record not found.";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Baptismal Record</title>
    <link rel="stylesheet" href="baptism.css" />
</head>
<body>
<div class="form-container">
    <h2>View Baptismal Record</h2>
    <p><strong>Name:</strong> <?= htmlspecialchars($record['child_name']) ?></p>
    <p><strong>DOB:</strong> <?= htmlspecialchars($record['dob']) ?></p>
    <p><strong>Birth Place:</strong> <?= htmlspecialchars($record['birth_place']) ?></p>
    <p><strong>Gender:</strong> <?= htmlspecialchars($record['gender']) ?></p>
    <p><strong>Father:</strong> <?= htmlspecialchars($record['father_name']) ?></p>
    <p><strong>Mother:</strong> <?= htmlspecialchars($record['mother_name']) ?></p>
    <p><strong>Address:</strong> <?= htmlspecialchars($record['address']) ?></p>
    <p><strong>Godparents:</strong> <?= htmlspecialchars($record['godparents']) ?></p>
    <p><strong>Baptism Date:</strong> <?= htmlspecialchars($record['baptism_date']) ?></p>
    <p><strong>Time:</strong> <?= htmlspecialchars($record['baptism_time']) ?></p>
    <p><strong>Priest:</strong> <?= htmlspecialchars($record['priest_name']) ?></p>
    <a href="baptismalRec.php" class="btn">Back to Records</a>
</div>
</body>
</html>
