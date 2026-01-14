<?php
require 'koneksi.php';

session_start();
if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit;
}

$page = isset($_GET['page']) ? $_GET['page'] : 'home';
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Akademik</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center" href="index.php?page=home">
    <i class="bi bi-mortarboard me-2"></i>Akademik</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMain">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navMain">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?= $page=='home' ? 'active' : '' ?>"
             href="index.php?page=home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= in_array($page, ['mahasiswa','create_mhs','edit_mhs']) ? 'active' : '' ?>"
             href="index.php?page=mahasiswa">Data Mahasiswa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $page=='prodi' ? 'active' : '' ?>"
             href="index.php?page=prodi">Prodi</a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a href="index.php?page=edit_profile" class="btn btn-dark btn-sm me-2">
            <i class="bi bi-person-circle me-1"></i> Edit Profil
          </a>
        </li>
        <li class="nav-item">
          <a href="logout.php" class="btn btn-danger btn-sm">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container mb-5">
<?php
if ($page == 'home') {
    include 'home.php';
} elseif ($page == 'mahasiswa') {
    include 'list.php';
} elseif ($page == 'create_mhs') {
    include 'create.php';
} elseif ($page == 'edit_mhs') {
    include 'edit.php';
} elseif ($page == 'edit_profile') {
    include 'edit_profile.php';
} elseif ($page == 'prodi') {
    header('Location: ../prodi/index.php?page=list');
    exit;
} else {
    echo '<div class="alert alert-danger">Halaman tidak ditemukan.</div>';
}
?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
