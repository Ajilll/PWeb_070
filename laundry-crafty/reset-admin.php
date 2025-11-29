<?php
include 'koneksi.php';

// 1. Kita hapus dulu user admin yang lama (kalau ada) agar tidak duplikat
mysqli_query($koneksi, "DELETE FROM user WHERE username='admin'");

// 2. Siapkan data admin baru
$username = "admin";
$password_asli = "admin123"; 

// 3. Enkripsi passwordnya (Hashing)
$password_hash = password_hash($password_asli, PASSWORD_DEFAULT);

// 4. Masukkan ke database
$query = "INSERT INTO user (username, password, role) VALUES ('$username', '$password_hash', 'admin')";

if(mysqli_query($koneksi, $query)){
    echo "<h1>Sukses!</h1>";
    echo "User admin berhasil di-reset.<br>";
    echo "Username: <b>admin</b><br>";
    echo "Password: <b>admin123</b><br>";
    echo "<br><a href='index.php'>Ke Halaman Login</a>";
} else {
    echo "Gagal: " . mysqli_error($koneksi);
}
?>