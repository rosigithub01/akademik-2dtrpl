<?php
$prodiRes = mysqli_query($koneksi, "SELECT * FROM prodi ORDER BY nama_prodi ASC");
?>

<h1 class="h4 mb-3">Tambah Data Mahasiswa</h1>

<form action="proses.php?aksi=tambah" method="post">
  <div class="mb-3">
    <label for="nim" class="form-label">NIM</label>
    <input type="text" name="nim" id="nim" class="form-control" required>
  </div>

  <div class="mb-3">
    <label for="nama_mhs" class="form-label">Nama Mahasiswa</label>
    <input type="text" name="nama_mhs" id="nama_mhs" class="form-control" required>
  </div>

  <div class="mb-3">
    <label for="prodi_id" class="form-label">Prodi</label>
    <select name="prodi_id" id="prodi_id" class="form-select" required>
      <option value="">-- Pilih Prodi --</option>
      <?php while ($p = mysqli_fetch_assoc($prodiRes)) : ?>
        <option value="<?= $p['id']; ?>">
          <?= htmlspecialchars($p['nama_prodi']); ?> (<?= htmlspecialchars($p['jenjang']); ?>)
        </option>
      <?php endwhile; ?>
    </select>
  </div>

  <div class="mb-3">
    <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
    <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" required>
  </div>

  <div class="mb-3">
    <label for="alamat" class="form-label">Alamat</label>
    <textarea name="alamat" id="alamat" rows="3" class="form-control" required></textarea>
  </div>

  <button type="submit" class="btn btn-primary">Simpan</button>
  <a href="index.php?page=mahasiswa" class="btn btn-secondary">Kembali</a>
</form>
