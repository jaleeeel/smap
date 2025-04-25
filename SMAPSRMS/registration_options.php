<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Options</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="form-container">
        <header>
            <h2>Select Registration Type</h2>
        </header>
        <div class="action-buttons">
            <a href="baptismReg.php" class="btn">Baptism</a>
            <a href="communion.php" class="btn">Communion</a>
            <a href="confirmationReg.php" class="btn">Confirmation</a>
            <a href="marriageReg.php" class="btn">Marriage</a>
        </div>
    </div>
</body>
</html>
