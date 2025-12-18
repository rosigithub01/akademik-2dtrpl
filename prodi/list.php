<?php
$rows = mysqli_query($koneksi, "SELECT * FROM prodi ORDER BY nama_prodi ASC");
?>

<div class="d-flex justify-content-between align-items-center mb-3">
  <h1 class="h4 mb-0">List Prodi</h1>
  <a href="index.php?page=create" class="btn btn-primary btn-sm">Tambah Prodi</a>
</div>

<table class="table table-bordered align-middle">
  <thead class="table-light">
    <tr>
      <th style="width:60px;">No</th>
      <th>Nama Prodi</th>
      <th>Jenjang</th>
      <th>Keterangan</th>
      <th style="width:150px;">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $no = 1; while ($row = mysqli_fetch_assoc($rows)) : ?>
    <tr>
      <td><?= $no++; ?></td>
      <td><?= htmlspecialchars($row['nama_prodi']); ?></td>
      <td><?= htmlspecialchars($row['jenjang']); ?></td>
      <td><?= htmlspecialchars($row['keterangan']); ?></td>
      <td>
        <a href="index.php?page=create&id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
        <a href="../mahasiswa/proses.php?aksi=prodi_hapus&id=<?= $row['id']; ?>"
           onclick="return confirm('Yakin menghapus prodi ini?');"
           class="btn btn-danger btn-sm">Delete</a>
      </td>
    </tr>
    <?php endwhile; ?>
  </tbody>
</table>
