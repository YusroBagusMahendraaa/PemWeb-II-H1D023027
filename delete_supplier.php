<?php
include 'db.php';

$id = $_GET['id'] ?? null;
if ($id) {
    $pdo->prepare("DELETE FROM suppliers WHERE id = ?")->execute([$id]);
}

header("Location: index.php");
?>
