<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $pdo->prepare("INSERT INTO suppliers (name, contact) VALUES (?, ?)");
    $stmt->execute([$_POST['name'], $_POST['contact']]);
    header("Location: index.php"); 
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Supplier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2>Tambah Supplier</h2>
    <form method="post">
        <label>Nama Supplier:</label>
        <input type="text" name="name" class="form-control" required>
        
        <label>Kontak:</label>
        <input type="text" name="contact" class="form-control">
        
        <button type="submit" class="btn btn-success mt-3">Simpan</button>
        <a href="index.php" class="btn btn-secondary mt-3">Kembali</a>
    </form>
</body>
</html>
