<?php
$sql = "SELECT m.*, p.nama_prodi, p.jenjang
        FROM mahasiswa m
        LEFT JOIN prodi p ON m.prodi_id = p.id
        ORDER BY m.nim ASC";
$result = mysqli_query($koneksi, $sql);
?>

<div class="d-flex justify-content-between align-items-center mb-3">
  <h1 class="h4 mb-0">Data Mahasiswa</h1>
  <a href="index.php?page=create_mhs" class="btn btn-primary btn-sm">Tambah Mahasiswa</a>
</div>

<table class="table table-bordered table-striped align-middle">
  <thead class="table-light">
    <tr>
      <th style="width:60px;">No</th>
      <th>NIM</th>
      <th>Nama</th>
      <th>Prodi</th>
      <th>Tgl Lahir</th>
      <th>Alamat</th>
      <th style="width:150px;">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $no = 1; while ($row = mysqli_fetch_assoc($result)) : ?>
    <tr>
      <td><?= $no++; ?></td>
      <td><?= htmlspecialchars($row['nim']); ?></td>
      <td><?= htmlspecialchars($row['nama_mhs']); ?></td>
      <td>
        <?= htmlspecialchars($row['nama_prodi'] ?? '-'); ?>
        <?php if (!empty($row['jenjang'])) : ?>
          (<?= htmlspecialchars($row['jenjang']); ?>)
        <?php endif; ?>
      </td>
      <td><?= htmlspecialchars($row['tgl_lahir']); ?></td>
      <td><?= htmlspecialchars($row['alamat']); ?></td>
      <td>
        <a href="index.php?page=edit_mhs&nim=<?= urlencode($row['nim']); ?>" class="btn btn-warning btn-sm">Edit</a>
        <a href="proses.php?aksi=hapus&nim=<?= urlencode($row['nim']); ?>"
           onclick="return confirm('Yakin menghapus data ini?');"
           class="btn btn-danger btn-sm">Delete</a>
      </td>
    </tr>
    <?php endwhile; ?>
  </tbody>
</table>
