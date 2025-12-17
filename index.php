<?php
require 'koneksi.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Akademik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-warning">
      <div class="container">
        <a class="navbar-brand" href="index.php">Akademik</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link <?= (!isset($_GET['page']) || $_GET['page']=='home')?'active':''; ?>" href="index.php?page=home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?= (isset($_GET['page']) && $_GET['page']=='mahasiswa')?'active':''; ?>" href="index.php?page=mahasiswa">Data Mahasiswa</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?= (isset($_GET['page']) && $_GET['page']=='create_mhs')?'active':''; ?>" href="index.php?page=create_mhs">Tambah Mahasiswa</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?= (isset($_GET['page']) && $_GET['page']=='prodi')?'active':''; ?>" href="index.php?page=prodi">Prodi</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container my-4">
      <?php
      $page = isset($_GET['page']) ? $_GET['page'] : 'home';

      if ($page == 'home')        include 'home.php';
      if ($page == 'mahasiswa')   include 'list.php';
      if ($page == 'create_mhs')  include 'create.php';
      if ($page == 'edit_mhs')    include 'edit.php';
      if ($page == 'prodi')       include 'prodi.php';
      ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
