<?php
include 'db_config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $groom_name = $_POST['groom_name'];
        $bride_name = $_POST['bride_name'];
        $marriage_date = $_POST['marriage_date'];
        $priest_name = $_POST['priest_name'];
        $location = $_POST['location'];

        $stmt = $pdo->prepare("UPDATE marriage_records SET groom_name = ?, bride_name = ?, marriage_date = ?, priest_name = ?,location = ? WHERE id = ?");
        $stmt->execute([$groom_name, $bride_name, $marriage_date,$priest_name,$location, $id]);

        header("Location: marriageRec.php");
        exit();
    }

    $stmt = $pdo->prepare("SELECT * FROM marriage_records WHERE id = ?");
    $stmt->execute([$id]);
    $record = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$record) {
        echo "Record not found.";
        exit;
    }
} else {
    echo "Invalid request.";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit Marriage Record</title>
    <link rel="stylesheet" href="marriage.css">
</head>
<body>
<div class="form-container">
    <h2>Edit Marriage Record</h2>
    <form method="POST">
        <label>Groom's Name:</label>
        <input type="text" name="groom_name" value="<?= htmlspecialchars($record['groom_name']) ?>" required>

        <label>Bride's Name:</label>
        <input type="text" name="bride_name" value="<?= htmlspecialchars($record['bride_name']) ?>" required>

        <label>Date of Marriage:</label>
        <input type="date" name="marriage_date" value="<?= htmlspecialchars($record['marriage_date']) ?>" required>

        <label>Place:</label>
        <input type="text" name="location" value="<?= htmlspecialchars($record['location']) ?>" required>

        <label>Priest's Name:</label>
        <input type="text" name="priest_name" value="<?= htmlspecialchars($record['priest_name']) ?>" required>

        <button type="submit">Update</button>
    </form>
    <a href="marriageRec.php" class="btn">Cancel</a>
</div>
</body>
</html>
