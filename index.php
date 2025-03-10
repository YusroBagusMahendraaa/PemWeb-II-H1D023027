<?php
include 'db.php';

// Ambil semua data supplier dari database
$suppliers = $pdo->query("SELECT * FROM suppliers")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Supplier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2>Daftar Supplier</h2>
    <a href="add_supplier.php" class="btn btn-primary mb-3">Tambah Supplier</a>
    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Kontak</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($suppliers as $s): ?>
        <tr>
            <td><?= $s['id'] ?></td>
            <td><?= htmlspecialchars($s['name']) ?></td>
            <td><?= htmlspecialchars($s['contact']) ?></td>
            <td>
                <a href="edit_supplier.php?id=<?= $s['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="delete_supplier.php?id=<?= $s['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus?');">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
