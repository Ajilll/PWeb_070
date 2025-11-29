<?php
session_start();
include 'koneksi.php';

// 1. Ambil data dari form
$id_pelanggan = $_POST['id_pelanggan'];
$id_layanan = $_POST['id_layanan'];
$berat = $_POST['berat'];
$tgl_masuk = $_POST['tgl_masuk'];
$id_user = $_SESSION['id_user']; // Siapa admin yang input?

// 2. Ambil Data Harga & Estimasi dari Database Layanan
// (Kita butuh harga_per_kg untuk menghitung total)
$query_layanan = mysqli_query($koneksi, "SELECT * FROM layanan WHERE id_layanan='$id_layanan'");
$data_layanan = mysqli_fetch_assoc($query_layanan);

$harga_per_kg = $data_layanan['harga_per_kg'];
$estimasi_jam = $data_layanan['estimasi_jam'];

// 3. Hitung Total Harga
$total_harga = $berat * $harga_per_kg;

// 4. Hitung Tanggal Selesai (Otomatis berdasarkan estimasi)
// tgl_selesai = tgl_masuk + estimasi jam (dikonversi ke detik)
$tgl_selesai = date('Y-m-d', strtotime($tgl_masuk) + ($estimasi_jam * 3600));

// 5. Simpan ke Database Transaksi
$query = "INSERT INTO transaksi (id_pelanggan, id_layanan, tgl_masuk, tgl_selesai, berat, total_harga, status, id_user) 
          VALUES ('$id_pelanggan', '$id_layanan', '$tgl_masuk', '$tgl_selesai', '$berat', '$total_harga', 'baru', '$id_user')";

if(mysqli_query($koneksi, $query)){
    header("location:transaksi.php");
} else {
    echo "Gagal: " . mysqli_error($koneksi);
}
?>