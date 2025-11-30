<?php

include("config.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['daftar'])){

    // ambil data dari formulir
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];

    $foto = $_FILES['foto']['name'];
    $temp = $_FILES['foto']['tmp_name'];
    $fotobaru = date('dmYHis').$foto;
    $path = "images/".$fotobaru;

    // buat query
    if(move_uploaded_file($temp, $path)){
        
        // Jika upload berhasil, Lakukan Insert ke Database
        $sql = "INSERT INTO calon_siswa (nama, alamat, jenis_kelamin, agama, foto) 
                VALUE ('$nama', '$alamat', '$jk', '$agama', '$fotobaru')";
        
        $query = mysqli_query($db, $sql);

        // apakah query simpan berhasil?
        if( $query ) {
            header('Location: index.php?status=sukses');
        } else {
            header('Location: index.php?status=gagal');
        }

    } else {
        // Jika gambar gagal diupload, Lakukan ini
        echo "Maaf, Gambar gagal untuk diupload.";
        echo "<br><a href='form-daftar.php'>Kembali Ke Form</a>";
    }


} else {
    die("Akses dilarang...");
}

?>