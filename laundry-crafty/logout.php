<?php
session_start();
session_destroy(); // Hapus semua sesi login
header("location:index.php?pesan=logout");
?>