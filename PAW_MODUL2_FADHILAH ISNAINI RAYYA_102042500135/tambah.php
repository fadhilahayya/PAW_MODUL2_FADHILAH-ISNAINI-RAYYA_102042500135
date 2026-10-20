<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $judul    = $_POST['judul'];
    $penulis  = $_POST['penulis'];
    $kategori = $_POST['kategori'];
    $harga    = (int) $_POST['harga'];
    $stok     = (int) $_POST['stok'];

    $stmt = mysqli_prepare($conn,
        "INSERT INTO buku_123 (judul, penulis, kategori, harga, stok) VALUES (?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "sssii", $judul, $penulis, $kategori, $harga, $stok);
    mysqli_stmt_execute($stmt);

    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5" style="max-width: 600px;">
    <div class="card shadow-sm">
        <div class="card-body">
            <h3 class="mb-4">Tambah Buku</h3>

            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Judul</label>
                    <input type="text" name="judul" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Penulis</label>
                    <input type="text" name="penulis" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <select name="kategori" class="form-select" required>
                        <option value="Novel">Novel</option>
                        <option value="Pemrograman">Pemrograman</option>
                        <option value="Pendidikan">Pendidikan</option>
                        <option value="Komik">Komik</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Harga (Rp)</label>
                    <input type="number" name="harga" class="form-control" min="0" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Stok</label>
                    <input type="number" name="stok" class="form-control" min="0" required>
                </div>
                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                <a href="index.php" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>

</div>
</body>
</html>