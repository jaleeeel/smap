<?php
session_start();
include 'db_config.php'; // Connect to sacramental_records DB

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $groom_name = $_POST['groom_name'];
    $groom_dob = $_POST['groom_dob'];
    $groom_address = $_POST['groom_address'];
    $bride_name = $_POST['bride_name'];
    $groom_dob = $_POST['groom_dob'];
    $groom_address = $_POST['groom_address'];
    $marriage_date = $_POST['marriage_date'];
    $marriage_time = $_POST['marriage_time'];
    $witnesses = $_POST['witnesses'];
    $priest_name = $_POST['priest_name'];
    $location = $_POST['location'];

    $sql = "INSERT INTO marriage_records 
        (groom_name, groom_dob, groom_address, bride_name,groom_dob, groom_address, marriage_date, marriage_time, witnesses, priest_name, location)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssss",$groom_name, $groom_dob, $groom_address, $bride_name,$groom_dob,  $groom_address, $marriage_date, $marriage_time, $witnesses, $priest_name, $location);

    if ($stmt->execute()) {
        echo "<h2>✅ Communion registration successful!</h2>";
        echo "<a href='baptismalRec.php'>Register another</a>";
    } else {
        echo "<h2>❌ Error: " . $stmt->error . "</h2>";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Marriage Registration</title>
    <link rel="stylesheet" href="baptism.css" />
</head>
<body>
<div class="form-container">
    <header>
        <h2>MARRIAGE REGISTRATION FORM</h2>
        <a href="homepage.php" class="btn go-back">Go Back</a>
    </header>

    <form action="marriage_submit.php" method="POST">
        <div class="church-info">
            <label>Church:</label>
            <input type="text" value="SAINT MICHAEL THE ARCHANGEL PARISH" readonly />
        </div>

        <div class="section">
            <h3>GROOM'S INFORMATION</h3>
            <label>Full Name:</label>
            <input type="text" name="groom_name" required>

            <label>Date of Birth:</label>
            <input type="date" name="groom_dob" required>

            <label>Address:</label>
            <input type="text" name="groom_address" required>
        </div>

        <div class="section">
            <h3>BRIDE'S INFORMATION</h3>
            <label>Full Name:</label>
            <input type="text" name="bride_name" required>

            <label>Date of Birth:</label>
            <input type="date" name="bride_dob" required>

            <label>Address:</label>
            <input type="text" name="bride_address" required>
        </div>

        <div class="section">
            <h3>MARRIAGE DETAILS</h3>
            <label>Date of Marriage:</label>
            <input type="date" name="marriage_date" required>

            <label>Time:</label>
            <input type="time" name="marriage_time" required>

            <label>Presiding Priest:</label>
            <input type="text" name="priest_name" required>

            <label>Witnesses:</label>
            <textarea name="witnesses" rows="3" required></textarea>
        </div>

        <div class="button-container">
            <button type="submit" class="register-btn">Register</button>
        </div>
    </form>

    <footer>
        <p>&copy; SMAP 2025. smap.com. All Rights Reserved | <a href="#">Privacy Policy</a></p>
    </footer>
</div>
</body>
</html>