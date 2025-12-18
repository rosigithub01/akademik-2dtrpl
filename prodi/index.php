<?php
require '../mahasiswa/koneksi.php';

$page = isset($_GET['page']) ? $_GET['page'] : 'list';
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Akademik - Prodi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
  <div class="container">
    <a class="navbar-brand" href="../mahasiswa/index.php">Akademik</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMain">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navMain">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="../mahasiswa/index.php?page=home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../mahasiswa/index.php?page=mahasiswa">Data Mahasiswa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= ($page=='list' || $page=='create') ? 'active' : '' ?>" href="index.php?page=list">Prodi</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container mb-5">
<?php
if ($page == 'list') {
    include 'list.php';
} elseif ($page == 'create') {
    include 'create.php';
} else {
    echo '<div class="alert alert-danger">Halaman tidak ditemukan.</div>';
}
?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
