<?php
include 'db_config.php';

$id = $_GET['id'] ?? null;
if (!$id) die("Invalid ID");

$stmt = $pdo->prepare("DELETE FROM confirmation_records WHERE id = ?");
$stmt->execute([$id]);

header("Location: confirmation_records.php");
exit;
?>
