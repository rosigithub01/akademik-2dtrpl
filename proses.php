<?php
require 'koneksi.php';

$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : '';

/* ====== MAHASISWA ====== */

if ($aksi == 'tambah') {

    $nim       = $_POST['nim'];
    $nama_mhs  = $_POST['nama_mhs'];
    $prodi_id  = (int) $_POST['prodi_id'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $alamat    = $_POST['alamat'];

    $sql = "INSERT INTO mahasiswa (nim, nama_mhs, tgl_lahir, alamat, prodi_id)
            VALUES ('$nim', '$nama_mhs', '$tgl_lahir', '$alamat', $prodi_id)";
    mysqli_query($koneksi, $sql);
    header('Location: index.php?page=mahasiswa');
    exit;

} elseif ($aksi == 'update') {

    $nim_lama  = $_POST['nim_lama'];
    $nim       = $_POST['nim'];
    $nama_mhs  = $_POST['nama_mhs'];
    $prodi_id  = (int) $_POST['prodi_id'];   // pastikan id prodi
    $tgl_lahir = $_POST['tgl_lahir'];
    $alamat    = $_POST['alamat'];

    $sql = "UPDATE mahasiswa SET
                nim       = '$nim',
                nama_mhs  = '$nama_mhs',
                prodi_id  = $prodi_id,
                tgl_lahir = '$tgl_lahir',
                alamat    = '$alamat'
            WHERE nim = '$nim_lama'";

    mysqli_query($koneksi, $sql);
    header('Location: index.php?page=mahasiswa');
    exit;

} elseif ($aksi == 'hapus') {

    $nim = $_GET['nim'];
    mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE nim = '$nim'");
    header('Location: index.php?page=mahasiswa');
    exit;

/* ====== PRODI ====== */

} elseif ($aksi == 'prodi_tambah') {

    $nama_prodi = $_POST['nama_prodi'];
    $jenjang    = $_POST['jenjang'];
    $keterangan = $_POST['keterangan'];

    $sql = "INSERT INTO prodi (nama_prodi, jenjang, keterangan)
            VALUES ('$nama_prodi', '$jenjang', '$keterangan')";
    mysqli_query($koneksi, $sql);
    header('Location: index.php?page=prodi');
    exit;

} elseif ($aksi == 'prodi_update') {

    $id         = (int) $_POST['id'];
    $nama_prodi = $_POST['nama_prodi'];
    $jenjang    = $_POST['jenjang'];
    $keterangan = $_POST['keterangan'];

    $sql = "UPDATE prodi SET
                nama_prodi = '$nama_prodi',
                jenjang    = '$jenjang',
                keterangan = '$keterangan'
            WHERE id = $id";

    mysqli_query($koneksi, $sql);
    header('Location: index.php?page=prodi');
    exit;

} elseif ($aksi == 'prodi_hapus') {

    $id = (int) $_GET['id'];
    mysqli_query($koneksi, "DELETE FROM prodi WHERE id = $id");
    header('Location: index.php?page=prodi');
    exit;

} else {

    header('Location: index.php');
    exit;
}
