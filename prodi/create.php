<?php
$editMode = false;
$data = [
    'id'          => '',
    'nama_prodi'  => '',
    'jenjang'     => '',
    'keterangan'  => ''
];

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    $q  = mysqli_query($koneksi, "SELECT * FROM prodi WHERE id = $id");
    if ($row = mysqli_fetch_assoc($q)) {
        $editMode = true;
        $data = $row;
    }
}
?>

<h1 class="h4 mb-3"><?= $editMode ? 'Edit Prodi' : 'Tambah Prodi'; ?></h1>

<form action="../mahasiswa/proses.php?aksi=<?= $editMode ? 'prodi_update' : 'prodi_tambah'; ?>" method="post">
  <?php if ($editMode): ?>
    <input type="hidden" name="id" value="<?= $data['id']; ?>">
  <?php endif; ?>

  <div class="mb-3">
    <label for="nama_prodi" class="form-label">Nama Prodi</label>
    <input type="text" name="nama_prodi" id="nama_prodi" class="form-control"
           value="<?= htmlspecialchars($data['nama_prodi']); ?>" required>
  </div>

  <div class="mb-3">
    <label for="jenjang" class="form-label">Jenjang</label>
    <select name="jenjang" id="jenjang" class="form-select" required>
      <?php
      $jenjangs = ['D2','D3','D4','S2'];
      ?>
      <option value="">-- Pilih Jenjang --</option>
      <?php foreach ($jenjangs as $j): ?>
        <option value="<?= $j; ?>" <?= $j == $data['jenjang'] ? 'selected' : ''; ?>><?= $j; ?></option>
      <?php endforeach; ?>
    </select>
  </div>

  <div class="mb-3">
    <label for="keterangan" class="form-label">Keterangan</label>
    <textarea name="keterangan" id="keterangan" rows="3" class="form-control"><?= htmlspecialchars($data['keterangan']); ?></textarea>
  </div>

  <button type="submit" class="btn btn-primary"><?= $editMode ? 'Update' : 'Simpan'; ?></button>
  <a href="index.php?page=list" class="btn btn-secondary">Kembali</a>
</form>
