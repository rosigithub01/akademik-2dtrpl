<?php
require 'koneksi.php';

// INSERT (tambah data)
if (isset($_POST['submit'])) {
    $nim       = $_POST['nim'];
    $nama_mhs  = $_POST['nama_mhs'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $alamat    = $_POST['alamat'];

    $query = "INSERT INTO mahasiswa (nim, nama_mhs, tgl_lahir, alamat)
              VALUES ('$nim', '$nama_mhs', '$tgl_lahir', '$alamat')";
    $sql = mysqli_query($koneksi, $query);

    if ($sql) {
        header("Location: index.php");
        exit();
    } else {
        echo "Gagal menyimpan data!";
    }
}

// UPDATE (edit data)
if (isset($_POST['update'])) {
    $nim_lama  = $_POST['nim_lama'];
    $nim       = $_POST['nim'];
    $nama_mhs  = $_POST['nama_mhs'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $alamat    = $_POST['alamat'];

    $query = "UPDATE mahasiswa SET
                nim='$nim',
                nama_mhs='$nama_mhs',
                tgl_lahir='$tgl_lahir',
                alamat='$alamat'
              WHERE nim='$nim_lama'";
    $sql = mysqli_query($koneksi, $query);

    if ($sql) {
        header("Location: index.php");
        exit();
    } else {
        echo "Gagal mengupdate data!";
    }
}

// DELETE (hapus data)
if (isset($_GET['delete'])) {
    $nim = $_GET['delete'];

    $query = "DELETE FROM mahasiswa WHERE nim='$nim'";
    $sql = mysqli_query($koneksi, $query);

    if ($sql) {
        header("Location: index.php");
        exit();
    } else {
        echo "Gagal menghapus data!";
    }
}

// Jika tidak ada aksi, kembali ke index
if (!isset($_POST['submit']) && !isset($_POST['update']) && !isset($_GET['delete'])) {
    header("Location: index.php");
    exit();
}
?>
