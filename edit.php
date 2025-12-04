<?php
require 'koneksi.php';

if (!isset($_GET['nim'])) {
    header("Location: index.php");
    exit();
}

$nim  = $_GET['nim'];
$sql  = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim='$nim'");
$data = mysqli_fetch_assoc($sql);

if (!$data) {
    echo "Data tidak ditemukan";
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-4">
    <h1 class="mb-4">Edit Data Mahasiswa</h1>

    <form method="post" action="proses.php">
        <input type="hidden" name="nim_lama" value="<?php echo $data['nim']; ?>">
        <div class="mb-3">
            <label class="form-label">NIM</label>
            <input type="text" name="nim" class="form-control"
                   value="<?php echo $data['nim']; ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Nama Mahasiswa</label>
            <input type="text" name="nama_mhs" class="form-control"
                   value="<?php echo $data['nama_mhs']; ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" class="form-control"
                   value="<?php echo $data['tgl_lahir']; ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control" rows="3" required><?php
                echo $data['alamat']; ?></textarea>
        </div>
        <button type="submit" name="update" class="btn btn-primary">Perbarui</button>
        <a href="index.php" class="btn btn-outline-secondary">Kembali</a>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
