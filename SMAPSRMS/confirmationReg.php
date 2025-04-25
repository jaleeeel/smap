<?php
session_start();
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $child_name = $_POST['child_name'];
    $dob = $_POST['dob'];
    $birth_place = $_POST['birth_place'];
    $gender = $_POST['gender'];
    $father_name = $_POST['father_name'];
    $mother_name = $_POST['mother_name'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $godparents = $_POST['godparents'];
    $confirmation_date = $_POST['baptism_date'];
    $confirmation_time = $_POST['baptism_time'];
    $priest_name = $_POST['priest_name'];

    $sql = "INSERT INTO confirmation_records 
    (child_name, dob, birth_place, gender,confirmation_date, father_name, mother_name, address, contact, godparents, priest_name, confirmation_time)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssss",$child_name, $dob, $birth_place, $gender,$confirmation_date,  $father_name, $mother_name, $address, $contact, $godparents, $priest_name, $confirmation_time);

    if ($stmt->execute()) {
        echo "<h2>✅ Confirmation registration successful!</h2>";
        echo "<a href='confirmation_records.php'>Register another</a>";
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation Registration Form</title>
    <link rel="stylesheet" href="baptism.css">
</head>
<body>

    <div class="form-container">
        <header>
            <h2>CONFIRMATION REGISTRATION FORM</h2>
<button class="close-btn" onclick="window.close();">&times;</button>
        </header>

        <form action="confirmation_records.php" method="POST">
            <div class="church-info">
                <label>Church:</label>
                <input type="text" value="SAINT MICHAEL THE ARCHANGEL PARISH" readonly>
            </div>

            <div class="section">
                <h3>CHILD'S INFORMATION</h3>
                <label>Full Name:</label>
                <input type="text" name="child_name" required>

                <label>Date of Birth:</label>
                <input type="date" name="dob" required>

                <label>Place of Birth:</label>
                <input type="text" name="birth_place" required>

                <label>Gender:</label>
                <select name="gender" required>
                    <option value="">Select</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>

            <div class="section">
                <h3>PARENT'S INFORMATION</h3>
                <label>Father's Full Name:</label>
                <input type="text" name="father_name" required>

                <label>Mother's Maiden Name:</label>
                <input type="text" name="mother_name" required>

                <label>Address:</label>
                <input type="text" name="address" required>

                <label>Contact No.:</label>
                <input type="text" name="contact" required>
            </div>

            <div class="section">
                <h3>GODPARENTS (SPONSORS)</h3>
                <textarea name="godparents" rows="4" required></textarea>
                <button type="button" class="add-godparent-btn">+</button>
            </div>

            <div class="section">
                <h3>CONFIRMATION DETAIL</h3>
                <label>Date of Confirmation:</label>
                <input type="date" name="confirmation_date" required>

                <label>Time:</label>
                <input type="time" name="confirmation_time" required>

                <label>Confirming Priest:</label>
                <input type="text" name="priest_name" required>
            </div>

            <div class="button-container">
                <button type="submit" class="register-btn">Register</button>
            </div>
        </form>

        <footer>
            <p>Copyright &copy; SMAP 2025. smap.com. All Rights Reserved | <a href="#">Privacy Policy</a></p>
        </footer>
    </div>

</body>
</html>
