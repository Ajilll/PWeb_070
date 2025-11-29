<?php
include 'koneksi.php';

$id = $_POST['id_pelanggan'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$no_hp = $_POST['no_hp'];

$query = "UPDATE pelanggan SET nama='$nama', alamat='$alamat', no_hp='$no_hp' WHERE id_pelanggan='$id'";

if(mysqli_query($koneksi, $query)){
    header("location:pelanggan.php");
} else {
    echo "Gagal update: " . mysqli_error($koneksi);
}
?>