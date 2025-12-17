<?php
$sql = "SELECT m.nim, m.nama_mhs, m.tgl_lahir, m.alamat, m.prodi_id,
               p.nama_prodi
        FROM mahasiswa m
        LEFT JOIN prodi p ON m.prodi_id = p.id
        ORDER BY m.nim ASC";
$query = mysqli_query($koneksi, $sql);
?>
<h1>List Data Mahasiswa</h1>

<a href="index.php?page=create_mhs" class="btn btn-success mb-3">Tambah Mahasiswa</a>

<table class="table table-bordered align-middle">
  <thead class="table-light">
    <tr>
      <th style="width:60px;">No</th>
      <th>NIM</th>
      <th>Nama Mahasiswa</th>
      <th>Prodi</th>
      <th>Tanggal Lahir</th>
      <th>Alamat</th>
      <th style="width:150px;">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $no=1; while($row = mysqli_fetch_assoc($query)): ?>
    <tr>
      <td><?= $no++; ?></td>
      <td><?= htmlspecialchars($row['nim']); ?></td>
      <td><?= htmlspecialchars($row['nama_mhs']); ?></td>
      <td><?= htmlspecialchars($row['nama_prodi'] ?? '-'); ?></td>
      <td><?= htmlspecialchars($row['tgl_lahir']); ?></td>
      <td><?= htmlspecialchars($row['alamat']); ?></td>
      <td>
        <a href="index.php?page=edit_mhs&nim=<?= urlencode($row['nim']); ?>" class="btn btn-warning btn-sm">Edit</a>
        <a href="proses.php?aksi=hapus&nim=<?= urlencode($row['nim']); ?>" onclick="return confirm('Yakin menghapus?');" class="btn btn-danger btn-sm">Delete</a>
      </td>
    </tr>
    <?php endwhile; ?>
  </tbody>
</table>
