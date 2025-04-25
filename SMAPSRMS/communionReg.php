<?php 
session_start();
include 'db_config.php'; // Connect to sacramental_records DB

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $participant_name = $_POST['participant_name'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $school_grade = $_POST['school_grade'];
    $guardian_name = $_POST['guardian_name'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $communion_date = $_POST['communion_date'];
    $priest_name = $_POST['priest_name'];

    $sql = "INSERT INTO communion_records 
        (participant_name, dob, gender, school_grade, guardian_name, contact, address, communion_date, priest_name)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssss",$participant_name, $dob, $gender, $school_grade, $guardian_name, $contact, $address, $communion_date, $priest_name);

    if ($stmt->execute()) {
        echo "<h2>✅ Communion registration successful!</h2>";
        echo "<a href='communion.php'>Register another</a>";
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
    <meta charset="UTF-8">
    <title>Communion Registration Form</title>
    <link rel="stylesheet" href="communion.css">
</head>
<body>

<div class="form-container">
    <header>
        <h2>COMMUNION REGISTRATION FORM</h2>
        <button class="close-btn" onclick="window.close();">&times;</button>
    </header>

    <form action="communion_submit.php" method="POST">
        <div class="church-info">
            <label>Church:</label>
            <input type="text" value="SAINT MICHAEL THE ARCHANGEL PARISH" readonly name="church_name">
        </div>

        <div class="section">
            <h3>PARTICIPANT INFORMATION</h3>
            <label>Full Name:</label>
            <input type="text" name="participant_name" required>

            <label>Date of Birth:</label>
            <input type="date" name="dob" required>

            <label>Gender:</label>
            <select name="gender" required>
                <option value="">Select</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>

            <label>School/Grade:</label>
            <input type="text" name="school_grade" required>
        </div>

        <div class="section">
            <h3>PARENT/GUARDIAN INFORMATION</h3>
            <label>Parent/Guardian Name:</label>
            <input type="text" name="guardian_name" required>

            <label>Contact Number:</label>
            <input type="text" name="contact" required>

            <label>Address:</label>
            <input type="text" name="address" required>
        </div>

        <div class="section">
            <h3>COMMUNION DETAILS</h3>
            <label>Date of Communion:</label>
            <input type="date" name="communion_date" required>

            <label>Priest Name:</label>
            <input type="text" name="priest_name" required>
        </div>

        <div class="button-container">
            <button type="submit" class="register-btn">Register</button>
        </div>
    </form>

    <footer>
        <p>&copy; SMAP 2025. All Rights Reserved | <a href="#">Privacy Policy</a></p>
    </footer>
</div>

</body>
</html>
