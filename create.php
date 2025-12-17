<?php
$sqlProdi = "SELECT * FROM prodi ORDER BY nama_prodi ASC";
$prodiRes = mysqli_query($koneksi, $sqlProdi);
?>
<h1>Tambah Data Mahasiswa</h1>

<div class="row">
  <div class="col-md-6">
    <form action="proses.php?aksi=tambah" method="post">
      <div class="mb-3">
        <label class="form-label" for="nim">NIM</label>
        <input type="text" name="nim" id="nim" class="form-control" required>
      </div>

      <div class="mb-3">
        <label class="form-label" for="nama_mhs">Nama Mahasiswa</label>
        <input type="text" name="nama_mhs" id="nama_mhs" class="form-control" required>
      </div>

      <div class="mb-3">
        <label class="form-label" for="prodi_id">Prodi</label>
        <select name="prodi_id" id="prodi_id" class="form-select" required>
          <option value="">-- Pilih Prodi --</option>
          <option value="">Manajemen Informatika</option>
          <option value="">Teknik Komputer</option>
          <option value="">Teknologi Rekayasa Perangkat Lunak</option>
          <option value="">Animasi</option>
          <?php while($p = mysqli_fetch_assoc($prodiRes)): ?>
            <option value="<?= $p['id']; ?>">
              <?= htmlspecialchars($p['nama_prodi']); ?> (<?= htmlspecialchars($p['jenjang']); ?>)
            </option>
          <?php endwhile; ?>
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label" for="tgl_lahir">Tanggal Lahir</label>
        <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" required>
      </div>

      <div class="mb-3">
        <label class="form-label" for="alamat">Alamat</label>
        <textarea name="alamat" id="alamat" rows="3" class="form-control" required></textarea>
      </div>

      <button type="submit" class="btn btn-success">Simpan</button>
      <a href="index.php?page=mahasiswa" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
</div>
