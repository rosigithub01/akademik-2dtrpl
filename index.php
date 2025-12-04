<?php
require 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
        }
        .table thead th {
            border-bottom-width: 2px;
        }
        .table tbody tr:last-child td {
            border-bottom: 0;
        }
    </style>
</head>
<body>
<div class="container py-4">

    <h1 class="mb-4">List Data Mahasiswa</h1>

    <a href="create.php" class="btn btn-success mb-3">Tambah Mahasiswa</a>

    <table class="table align-middle">
        <thead>
        <tr>
            <th style="width:60px;">NO</th>
            <th style="width:140px;">NIM</th>
            <th style="width:220px;">Nama Mahasiswa</th>
            <th style="width:160px;">Tanggal Lahir</th>
            <th>Alamat</th>
            <th style="width:200px; text-align:center;">Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $no = 1;
        $sql = mysqli_query($koneksi, "SELECT * FROM mahasiswa");
        while ($data = mysqli_fetch_assoc($sql)) {
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $data['nim']; ?></td>
                <td><?php echo $data['nama_mhs']; ?></td>
                <td><?php echo $data['tgl_lahir']; ?></td>
                <td><?php echo $data['alamat']; ?></td>
                <td class="text-center">
                    <a href="edit.php?nim=<?php echo $data['nim']; ?>"
                       class="btn btn-warning btn-sm me-2" style="min-width:70px;">Edit</a>
                    <a href="proses.php?delete=<?php echo $data['nim']; ?>"
                       class="btn btn-danger btn-sm" style="min-width:70px;"
                       onclick="return confirm('Yakin hapus data?');">Delete</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
