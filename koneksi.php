<?php
$server   = "localhost";
$user     = "root";
$password = "";
$database = "db_akademik";

$koneksi = mysqli_connect($server, $user, $password, $database);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
