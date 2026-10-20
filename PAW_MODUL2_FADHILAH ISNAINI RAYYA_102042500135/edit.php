<?php
include 'koneksi.php';

$id = (int) $_GET['id'];

if (isset($_POST['update'])) {
    $judul    = $_POST['judul'];
    $penulis  = $_POST['penulis'];
    $kategori = $_POST['kategori'];
    $harga    = (int) $_POST['harga'];
    $stok     = (int) $_POST['stok'];

    $stmt = mysqli_prepare($conn,
        "UPDATE buku_123 SET judul=?, penulis=?, kategori=?, harga=?, stok=? WHERE id=?");
    mysqli_stmt_bind_param($stmt, "sssiii", $judul, $penulis, $kategori, $harga, $stok, $id);
    mysqli_stmt_execute($stmt);

    header("Location: index.php");
    exit;
}

$stmt = mysqli_prepare($conn, "SELECT * FROM buku_123 WHERE id=?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$data = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));

if (!$data) {
    die("Data tidak ditemukan.");
}

$kategoriList = ['Novel', 'Pemrograman', 'Pendidikan', 'Komik', 'Lainnya'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5" style="max-width: 600px;">
    <div class="card shadow-sm">
        <div class="card-body">
            <h3 class="mb-4">Edit Buku</h3>
            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Judul</label>
                    <input type="text" name="judul" class="form-control"
                           value="<?= htmlspecialchars($data['judul']) ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Penulis</label>
                    <input type="text" name="penulis" class="form-control"
                           value="<?= htmlspecialchars($data['penulis']) ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <select name="kategori" class="form-select" required>
                        <?php foreach ($kategoriList as $k) : ?>
                            <option value="<?= $k ?>" <?= $data['kategori'] == $k ? 'selected' : '' ?>><?= $k ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Harga (Rp)</label>
                    <input type="number" name="harga" class="form-control" min="0"
                           value="<?= $data['harga'] ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Stok</label>
                    <input type="number" name="stok" class="form-control" min="0"
                           value="<?= $data['stok'] ?>" required>
                </div>
                <button type="submit" name="update" class="btn btn-warning">Update</button>
                <a href="index.php" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>