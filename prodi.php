<?php
require 'koneksi.php';

// ambil semua prodi
$sqlProdi = "SELECT * FROM prodi ORDER BY nama_prodi ASC";
$rows     = mysqli_query($koneksi, $sqlProdi);

// cek apakah mode edit
$editMode = false;
$editData = null;
if (isset($_GET['edit'])) {
    $id = (int) $_GET['edit'];
    $q  = mysqli_query($koneksi, "SELECT * FROM prodi WHERE id = $id");
    $editData = mysqli_fetch_assoc($q);
    if ($editData) {
        $editMode = true;
    }
}
?>

<h1>Data Prodi</h1>

<div class="row mb-4">
  <div class="col-md-6">
    <h5><?= $editMode ? 'Edit Prodi' : 'Tambah Prodi'; ?></h5>
    <form action="proses.php?aksi=<?= $editMode ? 'prodi_update' : 'prodi_tambah'; ?>" method="post">
      <?php if ($editMode): ?>
        <input type="hidden" name="id" value="<?= $editData['id']; ?>">
      <?php endif; ?>

      <div class="mb-3">
        <label class="form-label" for="nama_prodi">Nama Prodi</label>
        <input type="text" name="nama_prodi" id="nama_prodi" class="form-control"
               value="<?= $editMode ? htmlspecialchars($editData['nama_prodi']) : ''; ?>" required>
      </div>

      <div class="mb-3">
        <label class="form-label" for="jenjang">Jenjang</label>
        <select name="jenjang" id="jenjang" class="form-select" required>
          <?php
          $jenjangs = ['D2','D3','D4','S2'];
          $val = $editMode ? $editData['jenjang'] : '';
          ?>
          <option value="">-- Pilih Jenjang --</option>
          <?php foreach($jenjangs as $j): ?>
            <option value="<?= $j; ?>" <?= ($j == $val) ? 'selected' : ''; ?>><?= $j; ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label" for="keterangan">Keterangan</label>
        <textarea name="keterangan" id="keterangan" rows="3" class="form-control"><?= $editMode ? htmlspecialchars($editData['keterangan']) : ''; ?></textarea>
      </div>

      <button type="submit" class="btn btn-primary"><?= $editMode ? 'Update' : 'Simpan'; ?></button>
      <?php if ($editMode): ?>
        <a href="index.php?page=prodi" class="btn btn-secondary">Batal</a>
      <?php endif; ?>
    </form>
  </div>
</div>

<h5>List Prodi</h5>
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
    <?php $no = 1; while($row = mysqli_fetch_assoc($rows)): ?>
    <tr>
      <td><?= $no++; ?></td>
      <td><?= htmlspecialchars($row['nama_prodi']); ?></td>
      <td><?= htmlspecialchars($row['jenjang']); ?></td>
      <td><?= htmlspecialchars($row['keterangan']); ?></td>
      <td>
        <a href="index.php?page=prodi&edit=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
        <a href="proses.php?aksi=prodi_hapus&id=<?= $row['id']; ?>"
           onclick="return confirm('Yakin menghapus prodi ini?');"
           class="btn btn-danger btn-sm">Delete</a>
      </td>
    </tr>
    <?php endwhile; ?>
  </tbody>
</table>
