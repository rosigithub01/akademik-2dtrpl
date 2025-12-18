<?php
if (!isset($_GET['nim'])) {
    echo '<div class="alert alert-danger">NIM tidak ditemukan.</div>';
    exit;
}

$nim = $_GET['nim'];

$mhsRes = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim = '$nim'");
$mhs    = mysqli_fetch_assoc($mhsRes);
if (!$mhs) {
    echo '<div class="alert alert-danger">Data mahasiswa tidak ada.</div>';
    exit;
}

$prodiRes = mysqli_query($koneksi, "SELECT * FROM prodi ORDER BY nama_prodi ASC");
?>

<h1 class="h4 mb-3">Edit Data Mahasiswa</h1>

<form action="proses.php?aksi=update" method="post">
  <input type="hidden" name="nim_lama" value="<?= htmlspecialchars($mhs['nim']); ?>">

  <div class="mb-3">
    <label for="nim" class="form-label">NIM</label>
    <input type="text" name="nim" id="nim" class="form-control"
           value="<?= htmlspecialchars($mhs['nim']); ?>" required>
  </div>

  <div class="mb-3">
    <label for="nama_mhs" class="form-label">Nama Mahasiswa</label>
    <input type="text" name="nama_mhs" id="nama_mhs" class="form-control"
           value="<?= htmlspecialchars($mhs['nama_mhs']); ?>" required>
  </div>

  <div class="mb-3">
    <label for="prodi_id" class="form-label">Prodi</label>
    <select name="prodi_id" id="prodi_id" class="form-select" required>
      <option value="">-- Pilih Prodi --</option>
      <?php while ($p = mysqli_fetch_assoc($prodiRes)) : ?>
        <option value="<?= $p['id']; ?>" <?= ($p['id'] == $mhs['prodi_id']) ? 'selected' : ''; ?>>
          <?= htmlspecialchars($p['nama_prodi']); ?> (<?= htmlspecialchars($p['jenjang']); ?>)
        </option>
      <?php endwhile; ?>
    </select>
  </div>

  <div class="mb-3">
    <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
    <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control"
           value="<?= htmlspecialchars($mhs['tgl_lahir']); ?>" required>
  </div>

  <div class="mb-3">
    <label for="alamat" class="form-label">Alamat</label>
    <textarea name="alamat" id="alamat" rows="3" class="form-control" required><?= htmlspecialchars($mhs['alamat']); ?></textarea>
  </div>

  <button type="submit" class="btn btn-primary">Update</button>
  <a href="index.php?page=mahasiswa" class="btn btn-secondary">Kembali</a>
</form>
