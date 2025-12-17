<?php
if (!isset($_GET['nim'])) {
  header('Location: index.php?page=mahasiswa');
  exit;
}
$nim = $_GET['nim'];

$sqlMhs = "SELECT * FROM mahasiswa WHERE nim = '$nim'";
$resMhs = mysqli_query($koneksi, $sqlMhs);
$mhs    = mysqli_fetch_assoc($resMhs);
if (!$mhs) {
  header('Location: index.php?page=mahasiswa');
  exit;
}

$sqlProdi = "SELECT * FROM prodi ORDER BY nama_prodi ASC";
$prodiRes = mysqli_query($koneksi, $sqlProdi);
?>
<h1>Edit Data Mahasiswa</h1>

<div class="row">
  <div class="col-md-6">
    <form action="proses.php?aksi=update" method="post">
      <input type="hidden" name="nim_lama" value="<?= htmlspecialchars($mhs['nim']); ?>">

      <div class="mb-3">
        <label class="form-label" for="nim">NIM</label>
        <input type="text" name="nim" id="nim" class="form-control" value="<?= htmlspecialchars($mhs['nim']); ?>" required>
      </div>

      <div class="mb-3">
        <label class="form-label" for="nama_mhs">Nama Mahasiswa</label>
        <input type="text" name="nama_mhs" id="nama_mhs" class="form-control" value="<?= htmlspecialchars($mhs['nama_mhs']); ?>" required>
      </div>

      <div class="mb-3">
        <label class="form-label" for="prodi_id">Prodi</label>
        <select name="prodi_id" id="prodi_id" class="form-select" required>
    <option value="">-- Pilih Prodi --</option>
    <?php while($p = mysqli_fetch_assoc($prodiRes)): ?>
        <option value="<?= $p['id']; ?>" <?= ($p['id'] == $mhs['prodi_id']) ? 'selected' : ''; ?>>
            <?= htmlspecialchars($p['nama_prodi']); ?> (<?= htmlspecialchars($p['jenjang']); ?>)
        </option>
    <?php endwhile; ?>
</select>

      </div>

      <div class="mb-3">
        <label class="form-label" for="tgl_lahir">Tanggal Lahir</label>
        <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" value="<?= htmlspecialchars($mhs['tgl_lahir']); ?>" required>
      </div>

      <div class="mb-3">
        <label class="form-label" for="alamat">Alamat</label>
        <textarea name="alamat" id="alamat" rows="3" class="form-control" required><?= htmlspecialchars($mhs['alamat']); ?></textarea>
      </div>

      <button type="submit" class="btn btn-primary">Perbarui</button>
      <a href="index.php?page=mahasiswa" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
</div>
