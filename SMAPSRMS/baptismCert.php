<?php
include 'db_config.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    echo "Invalid ID.";
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
    <title>Baptismal Certificate</title>
    <link rel="stylesheet" href="certificate.css" />
</head>
<body>
<div class="certificate-container">
    <h1>SAINT MICHAEL THE ARCHANGEL PARISH</h1>
    <h2>BAPTISMAL CERTIFICATE</h2>
    <p>This is to certify that <strong><?= htmlspecialchars($record['child_name']) ?></strong>, born on <strong><?= htmlspecialchars($record['dob']) ?></strong> in <strong><?= htmlspecialchars($record['birth_place']) ?></strong>, child of <strong><?= htmlspecialchars($record['father_name']) ?></strong> and <strong><?= htmlspecialchars($record['mother_name']) ?></strong>, was baptized on <strong><?= htmlspecialchars($record['baptism_date']) ?></strong> at <strong><?= htmlspecialchars($record['baptism_time']) ?></strong> by <strong><?= htmlspecialchars($record['priest_name']) ?></strong>.</p>
    <p>Godparents: <strong><?= htmlspecialchars($record['godparents']) ?></strong></p>
    <p>This certificate is issued for legal purposes.</p>
    <footer>
        <p>Church Seal and Signature</p>
        <p>Address: 123 Church St, City, Country</p>
    </footer>
</div>
<button onclick="window.print()">Print</button>
</body>
</html>
