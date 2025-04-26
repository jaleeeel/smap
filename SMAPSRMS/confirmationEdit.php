<?php
include 'db_config.php';

$id = $_GET['id'] ?? null;
if (!$id) die("Invalid ID");

$stmt = $pdo->prepare("SELECT * FROM confirmation_records WHERE id = ?");
$stmt->execute([$id]);
$record = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("UPDATE confirmation_records SET child_name = ?, dob = ?, gender = ?, confirmation_date = ?, father_name = ?, mother_name = ?, address = ?, priest_name = ? WHERE id = ?");
    $stmt->execute([
        $_POST['child_name'], $_POST['dob'], $_POST['gender'], $_POST['confirmation_date'],
        $_POST['father_name'], $_POST['mother_name'], $_POST['address'], $_POST['priest_name'], $id
    ]);
    header("Location: confirmation_records.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Confirmation Record</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
<div class="form-container">
    <h2>Edit Confirmation Record</h2>
    <form method="POST">
        <label>Child Name:</label>
        <input type="text" name="child_name" value="<?= htmlspecialchars($record['child_name']) ?>" required>

        <label>Date of Birth:</label>
        <input type="date" name="dob" value="<?= $record['dob'] ?>" required>

        <label>Gender:</label>
        <select name="gender" required>
            <option value="Male" <?= $record['gender'] == 'Male' ? 'selected' : '' ?>>Male</option>
            <option value="Female" <?= $record['gender'] == 'Female' ? 'selected' : '' ?>>Female</option>
        </select>

        <label>Confirmation Date:</label>
        <input type="date" name="confirmation_date" value="<?= $record['confirmation_date'] ?>" required>

        <label>Father's Name:</label>
        <input type="text" name="father_name" value="<?= htmlspecialchars($record['father_name']) ?>" required>

        <label>Mother's Name:</label>
        <input type="text" name="mother_name" value="<?= htmlspecialchars($record['mother_name']) ?>" required>

        <label>Address:</label>
        <input type="text" name="address" value="<?= htmlspecialchars($record['address']) ?>" required>

        <label>Priest Name:</label>
        <input type="text" name="priest_name" value="<?= htmlspecialchars($record['priest_name']) ?>" required>

        <button type="submit">Update</button>
        <a href="confirmation_records.php" class="btn">Cancel</a>
    </form>
</div>
</body>
</html>
