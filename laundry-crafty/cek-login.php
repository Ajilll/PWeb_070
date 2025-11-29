<?php
// Panggil koneksi (session_start ada di dalam koneksi.php)
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

// Cari user berdasarkan username
$query = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username'");
$cek = mysqli_num_rows($query);

if ($cek > 0) {
    // Ambil data user
    $data = mysqli_fetch_assoc($query);

    // Cek apakah password yang diketik cocok dengan hash di database
    if (password_verify($password, $data['password'])) {
        // Jika COCOK, simpan data ke SESSION
        $_SESSION['status'] = "login";
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $data['role'];
        $_SESSION['id_user'] = $data['id_user'];

        // Alihkan ke dashboard
        header("location:dashboard.php");
    } else {
        // Password salah
        header("location:index.php?pesan=gagal");
    }
} else {
    // Username tidak ditemukan
    header("location:index.php?pesan=gagal");
}
?>