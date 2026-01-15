<?php
require 'koneksi.php';

if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    header("Location: login.php");
    exit;
}

$email_session = $_SESSION['email'];
$pesan = "";

// ambil data user
$sqlUser  = "SELECT * FROM pengguna WHERE email='$email_session'";
$qUser    = mysqli_query($koneksi, $sqlUser);
$dataUser = mysqli_fetch_assoc($qUser);
if (!$dataUser) {
    die("Data pengguna tidak ditemukan.");
}
$id_user = $dataUser['id'];

if (isset($_POST['simpan'])) {
    $nama_baru      = trim($_POST['nama_lengkap']);
    $password_baru  = trim($_POST['password_baru']);
    $password_ulang = trim($_POST['password_ulang']);

    if ($nama_baru == "") {
        $pesan = "Nama tidak boleh kosong.";
    } else {
        if ($password_baru != "") {
            if ($password_baru != $password_ulang) {
                $pesan = "Konfirmasi password tidak sama.";
            } else {
                $pass_md5  = md5($password_baru);
                $sqlUpdate = "UPDATE pengguna 
                              SET nama_lengkap='$nama_baru', password='$pass_md5'
                              WHERE id='$id_user'";
                mysqli_query($koneksi, $sqlUpdate);
                $pesan = "Profil dan password berhasil diupdate.";
            }
        } else {
            $sqlUpdate = "UPDATE pengguna 
                          SET nama_lengkap='$nama_baru'
                          WHERE id='$id_user'";
            mysqli_query($koneksi, $sqlUpdate);
            $pesan = "Profil berhasil diupdate.";
        }

        // reload data
        $sqlUser  = "SELECT * FROM pengguna WHERE id='$id_user'";
        $qUser    = mysqli_query($koneksi, $sqlUser);
        $dataUser = mysqli_fetch_assoc($qUser);
    }
}
?>

<h3 class="mb-4">Edit Profil Pengguna</h3>

<?php if ($pesan != ""): ?>
  <div class="alert alert-info"><?php echo $pesan; ?></div>
<?php endif; ?>

<form method="post" class="mb-5">
  <div class="mb-3 col-md-6">
    <label class="form-label">Email (tidak dapat diubah)</label>
    <input type="email" class="form-control"
           value="<?php echo htmlspecialchars($dataUser['email']); ?>" readonly>
  </div>

  <div class="mb-3 col-md-6">
    <label class="form-label">Nama Lengkap</label>
    <input type="text" name="nama_lengkap" class="form-control"
           value="<?php echo htmlspecialchars($dataUser['nama_lengkap']); ?>" required>
  </div>

  <div class="mb-3 col-md-6">
    <label class="form-label">Password Baru</label>
    <input type="password" name="password_baru" class="form-control"
           placeholder="Kosongkan jika tidak ingin mengubah password">
  </div>

  <div class="mb-3 col-md-6">
    <label class="form-label">Ulangi Password Baru</label>
    <input type="password" name="password_ulang" class="form-control"
           placeholder="Ulangi password baru">
  </div>

  <div class="col-md-6 d-flex justify-content-between">
    <a href="index.php?page=home" class="btn btn-secondary">Kembali</a>
    <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
  </div>
</form>
