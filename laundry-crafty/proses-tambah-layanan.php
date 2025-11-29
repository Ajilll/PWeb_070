<?php
include 'koneksi.php';

$nama = $_POST['nama_layanan'];
$harga = $_POST['harga_per_kg'];
$estimasi = $_POST['estimasi_jam'];

$query = "INSERT INTO layanan (nama_layanan, harga_per_kg, estimasi_jam) VALUES ('$nama', '$harga', '$estimasi')";
if(mysqli_query($koneksi, $query)){
    header("location:layanan.php");
} else {
    echo "Gagal: " . mysqli_error($koneksi);
}
?>