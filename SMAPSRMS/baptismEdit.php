<?php
include 'db_config.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    echo "Invalid ID.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'child_name' => $_POST['child_name'],
        'dob' => $_POST['dob'],
        'birth_place' => $_POST['birth_place'],
        'gender' => $_POST['gender'],
        'father_name' => $_POST['father_name'],
        'mother_name' => $_POST['mother_name'],
        'address' => $_POST['address'],
        'godparents' => $_POST['godparents'],
        'baptism_date' => $_POST['baptism_date'],
        'baptism_time' => $_POST['baptism_time'],
        'priest_name' => $_POST['priest_name'],
        'id' => $id
    ];

    $stmt = $pdo->prepare("UPDATE baptismal_records SET child_name = :child_name, dob = :dob, birth_place = :birth_place, gender = :gender, father_name = :father_name, mother_name = :mother_name, address = :address, godparents = :godparents, baptism_date = :baptism_date, baptism_time = :baptism_time, priest_name = :priest_name WHERE id = :id");
    $stmt->execute($data);
    header("Location: baptismalRec.php");
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM baptismal_records WHERE id = ?");
$stmt->execute([$id]);
$record = $stmt->fetch();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Baptismal Record</title>
    <link rel="stylesheet" href="baptism.css" />
</head>
<body>
<div class="form-container">
    <h2>Edit Baptismal Record</h2>
    <form method="POST">
        <label>Name: <input type="text" name="child_name" value="<?= $record['child_name'] ?>" required></label>
        <label>Date of Birth: <input type="date" name="dob" value="<?= $record['dob'] ?>" required></label>
        <label>Birth Place: <input type="text" name="birth_place" value="<?= $record['birth_place'] ?>" required></label>
        <label>Gender:
            <select name="gender">
                <option value="Male" <?= $record['gender'] === 'Male' ? 'selected' : '' ?>>Male</option>
                <option value="Female" <?= $record['gender'] === 'Female' ? 'selected' : '' ?>>Female</option>
            </select>
        </label>
        <label>Father's Name: <input type="text" name="father_name" value="<?= $record['father_name'] ?>" required></label>
        <label>Mother's Name: <input type="text" name="mother_name" value="<?= $record['mother_name'] ?>" required></label>
        <label>Address: <input type="text" name="address" value="<?= $record['address'] ?>" required></label>
        <label>Godparents: <textarea name="godparents"><?= $record['godparents'] ?></textarea></label>
        <label>Baptism Date: <input type="date" name="baptism_date" value="<?= $record['baptism_date'] ?>" required></label>
        <label>Time: <input type="time" name="baptism_time" value="<?= $record['baptism_time'] ?>" required></label>
        <label>Priest Name: <input type="text" name="priest_name" value="<?= $record['priest_name'] ?>" required></label>
        <button type="submit" class="btn">Update</button>
    </form>
</div>
</body>
</html>
