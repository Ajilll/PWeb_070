<?php
$koneksi = mysqli_connect("localhost", "root", "", "manajemen_user");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>