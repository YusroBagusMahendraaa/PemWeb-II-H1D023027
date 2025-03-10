<?php
include 'db.php';

$id = $_GET['id'] ?? null;
if (!$id) header("Location: index.php");

$supplier = $pdo->prepare("SELECT * FROM suppliers WHERE id = ?");
$supplier->execute([$id]);
$supplier = $supplier->fetch(PDO::FETCH_ASSOC);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pdo->prepare("UPDATE suppliers SET name = ?, contact = ? WHERE id = ?")
        ->execute([$_POST['name'], $_POST['contact'], $id]);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Supplier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2>Edit Supplier</h2>
    <form method="post">
        <label>Nama Supplier:</label>
        <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($supplier['name']) ?>" required>
        
        <label>Kontak:</label>
        <input type="text" name="contact" class="form-control" value="<?= htmlspecialchars($supplier['contact']) ?>">
        
        <button type="submit" class="btn btn-success mt-3">Simpan</button>
        <a href="index.php" class="btn btn-secondary mt-3">Kembali</a>
    </form>
</body>
</html>
