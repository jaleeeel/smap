<?php
include 'db_config.php';

if (!isset($_GET['id'])) {
    echo "No record selected.";
    exit;
}

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM marriage_records WHERE id = ?");
$stmt->execute([$id]);
$record = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$record) {
    echo "Record not found.";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>View Marriage Record</title>
    <link rel="stylesheet" href="marriage.css">
</head>
<body>
<div class="record-view">
    <h2>Marriage Record Details</h2>
    <p><strong>Groom:</strong> <?= htmlspecialchars($record['groom_name']) ?></p>
    <p><strong>Bride:</strong> <?= htmlspecialchars($record['bride_name']) ?></p>
    <p><strong>Date:</strong> <?= htmlspecialchars($record['marriage_date']) ?></p>
    <p><strong>Place:</strong> <?= htmlspecialchars($record['place']) ?></p>
    <p><strong>Officiant:</strong> <?= htmlspecialchars($record['priest_name']) ?></p>
    <a href="marriageRec.php" class="btn">Back to Records</a>
</div>
</body>
</html>
