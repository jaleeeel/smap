<?php
include 'db_config.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid certificate ID.");
}

$id = $_GET['id'];

try {
    $stmt = $pdo->prepare("SELECT * FROM communion_records WHERE id = :id");
    $stmt->execute([':id' => $id]);
    $record = $stmt->fetch();

    if (!$record) {
        die("No certificate found.");
    }

    // Extract values
    $name = htmlspecialchars($record['participant_name']);
    $dob = date("F j, Y", strtotime($record['dob']));
    $gender = $record['gender'];
    $guardian = htmlspecialchars($record['guardian_name']);
    $communion_date = date("F j, Y", strtotime($record['communion_date']));
    $priest = htmlspecialchars($record['priest_name']);
    $certificate_no = str_pad($record['id'], 5, '0', STR_PAD_LEFT);
    $issue_day = date("j");
    $issue_month_year = date("F Y");

} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Communion Certificate - <?= $name ?></title>
    <link rel="stylesheet" href="certificate.css"> <!-- Optional: External CSS -->
    <style>
       @page {
    size: A4;
    margin: 0;
}
@media print {
    body {
        margin: 0;
        padding: 0;
    }
    .no-print {
        display: none;
    }
}
body {
    font-family: 'Times New Roman', serif;
    background-color: #fff;
    margin: 0;
    padding: 0;
}
.certificate-container {
    width: 210mm;
    min-height: 297mm;
    margin: 0 auto;
    padding: 20mm;
    position: relative;
    box-sizing: border-box;
    background-image: url('watermark.png');
    background-repeat: no-repeat;
    background-position: center;
    background-size: contain;
}
.header {
    text-align: center;
    margin-bottom: 15mm;
}
.church-name {
    font-size: 24pt;
    font-weight: bold;
    margin-bottom: 5mm;
}
.certificate-title {
    font-size: 18pt;
    text-decoration: underline;
    margin-bottom: 10mm;
}
.content {
    font-size: 12pt;
    line-height: 1.5;
    text-align: justify;
}
.signature-area {
    margin-top: 15mm;
    display: flex;
    justify-content: space-between;
}
.signature-box {
    width: 60mm;
    border-top: 1px solid #000;
    text-align: center;
    padding-top: 2mm;
}
.certificate-number {
    position: absolute;
    top: 10mm;
    right: 20mm;
    font-size: 10pt;
}
.footer {
    margin-top: 10mm;
    font-size: 10pt;
    text-align: center;
}
.print-btn {
    position: fixed;
    top: 10px;
    right: 10px;
    padding: 10px 15px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    z-index: 1000;
}

    </style>
</head>
<body>
    <button class="print-btn no-print" onclick="window.print()">Print Certificate</button>

    <div class="certificate-container">
        <div class="certificate-number">
            Certificate No: <?= $certificate_no ?>
        </div>

        <div class="header">
            <div class="church-name">SAINT MICHAEL THE ARCHANGEL PARISH</div>
            <div class="certificate-title">COMMUNION CERTIFICATE</div>
        </div>

        <div class="content">
            <p>This is to certify that <strong><?= $name ?></strong>,
            child of <strong><?= $guardian ?></strong>,
            was born on <strong><?= $dob ?></strong> and received First Holy Communion
            according to the rites of the Roman Catholic Church
            on <strong><?= $communion_date ?></strong>
            at <strong>Saint Michael the Archangel Parish</strong>.</p>

            <p>The officiating priest was <strong><?= $priest ?></strong>.</p>

            <p>This certificate is issued upon request for whatever legal purpose it may serve.</p>

            <p>Given this <?= $issue_day ?> day of <?= $issue_month_year ?>.</p>
        </div>

        <div class="signature-area">
            <div class="signature-box">Parish Priest</div>
            <div class="signature-box">Parish Secretary</div>
        </div>

        <div class="footer">
            <p>Official Document - Not Valid Without Church Seal</p>
            <p>Parish Address: 123 Church Street, City, Country | Tel: (123) 456-7890</p>
        </div>
    </div>

    <script>
        window.onafterprint = function() {
            // Optionally close the tab after print
            // window.close();
        };
    </script>
</body>
</html>
