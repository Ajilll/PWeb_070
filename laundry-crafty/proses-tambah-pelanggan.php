<?php
include 'koneksi.php';

$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$no_hp = $_POST['no_hp'];

$query = "INSERT INTO pelanggan (nama, alamat, no_hp) VALUES ('$nama', '$alamat', '$no_hp')";

if(mysqli_query($koneksi, $query)){
    header("location:pelanggan.php");
} else {
    echo "Gagal: " . mysqli_error($koneksi);
}
?>