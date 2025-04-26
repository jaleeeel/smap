<?php
include 'db_config.php';

$id = $_GET['id'] ?? null;
if (!$id) die("Invalid ID");

$stmt = $pdo->prepare("SELECT * FROM confirmation_records WHERE id = ?");
$stmt->execute([$id]);
$record = $stmt->fetch();

if (!$record) die("Record not found.");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Confirmation Certificate</title>
    <link rel="stylesheet" href="dashboard.css">
    <style>
        .certificate {
            width: 80%;
            margin: auto;
            padding: 40px;
            border: 2px solid #000;
            text-align: center;
            font-family: 'Georgia', serif;
            background-color: #fff;
        }
        .btn-print {
            margin: 20px;
            padding: 10px 20px;
            background: #28A745;
            color: #fff;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <button class="btn-print" onclick="window.print()">Print Certificate</button>
    <div class="certificate">
        <h2>Confirmation Certificate</h2>
        <p>This certifies that <strong><?= htmlspecialchars($record['child_name']) ?></strong></p>
        <p>was confirmed in the Catholic faith on <strong><?= htmlspecialchars($record['confirmation_date']) ?></strong>.</p>
        <p>Officiated by <strong><?= htmlspecialchars($record['priest_name']) ?></strong>.</p>
        <p>Issued this <?= date("jS") ?> day of <?= date("F Y") ?>.</p>
        <p><strong>SAINT MICHAEL THE ARCHANGEL PARISH</strong></p>
    </div>
</body>
</html>
