<?php
include 'db_config.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid ID.");
}

$id = $_GET['id'];

try {
    $stmt = $pdo->prepare("SELECT * FROM communion_records WHERE id = :id");
    $stmt->execute([':id' => $id]);
    $record = $stmt->fetch();

    if (!$record) {
        die("Record not found.");
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $data = [
            ':participant_name' => $_POST['participant_name'],
            ':dob'              => $_POST['dob'],
            ':gender'           => $_POST['gender'],
            ':school_grade'     => $_POST['school_grade'],
            ':guardian_name'    => $_POST['guardian_name'],
            ':contact'          => $_POST['contact'],
            ':address'          => $_POST['address'],
            ':communion_date'   => $_POST['communion_date'],
            ':priest_name'      => $_POST['priest_name'],
            ':id'               => $id
        ];

        $update = $pdo->prepare("
            UPDATE communion_records SET
                participant_name = :participant_name,
                dob = :dob,
                gender = :gender,
                school_grade = :school_grade,
                guardian_name = :guardian_name,
                contact = :contact,
                address = :address,
                communion_date = :communion_date,
                priest_name = :priest_name
            WHERE id = :id
        ");
        $update->execute($data);

        header("Location: communion.php");
        exit();
    }

} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Communion Record</title>
    <link rel="stylesheet" href="communion.css">
</head>
<body>
    <div class="form-container">
        <h2>Edit Communion Record</h2>
        <form method="POST">
            <label>Name:</label>
            <input type="text" name="participant_name" value="<?= htmlspecialchars($record['participant_name']) ?>" required>

            <label>Date of Birth:</label>
            <input type="date" name="dob" value="<?= htmlspecialchars($record['dob']) ?>" required>

            <label>Gender:</label>
            <select name="gender" required>
                <option value="Male" <?= $record['gender'] == 'Male' ? 'selected' : '' ?>>Male</option>
                <option value="Female" <?= $record['gender'] == 'Female' ? 'selected' : '' ?>>Female</option>
            </select>

            <label>School Grade:</label>
            <input type="text" name="school_grade" value="<?= htmlspecialchars($record['school_grade']) ?>" required>

            <label>Guardian Name:</label>
            <input type="text" name="guardian_name" value="<?= htmlspecialchars($record['guardian_name']) ?>" required>

            <label>Contact:</label>
            <input type="text" name="contact" value="<?= htmlspecialchars($record['contact']) ?>" required>

            <label>Address:</label>
            <input type="text" name="address" value="<?= htmlspecialchars($record['address']) ?>" required>

            <label>Communion Date:</label>
            <input type="date" name="communion_date" value="<?= htmlspecialchars($record['communion_date']) ?>" required>

            <label>Priest Name:</label>
            <input type="text" name="priest_name" value="<?= htmlspecialchars($record['priest_name']) ?>" required>

            <button type="submit" class="btn save-btn">Save Changes</button>
        </form>
    </div>
</body>
</html>
