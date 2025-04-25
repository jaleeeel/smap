<?php
include 'db_config.php';

$id = $_GET['id'] ?? null;

if ($id) {
    $stmt = $pdo->prepare("DELETE FROM baptismal_records WHERE id = ?");
    $stmt->execute([$id]);
}

header("Location: baptismalRec.php");
exit;
?>
