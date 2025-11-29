<?php
session_start(); // Penting: Kita nyalakan session di sini untuk sistem login nanti

$server = "localhost";
$user = "root";
$pass = "";
$db_name = "laundry_crafty";

$koneksi = mysqli_connect($server, $user, $pass, $db_name);

if (!$koneksi) {
    die("Gagal terhubung ke database: " . mysqli_connect_error());
}
?>