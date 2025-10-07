<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form AJAX</title>
    <!-- 1. Sertakan Library Bootstrap untuk Styling -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

<div class="container" style="margin-top: 50px;">
    <h2>Submit Form Tanpa Refresh Halaman</h2>
    <p>Menggunakan AJAX, jQuery, dan PHP</p>
    
    <!-- 2. Kerangka HTML Form -->
    <form name="ContactForm" method="post" action="">
        <div class="form-group">
            <label for="name">Nama:</label>
            <input type="text" class="form-control" id="name">
        </div>
        <div class="form-group">
            <label for="email">Alamat Email:</label>
            <input type="email" class="form-control" id="email">
        </div>
        <div class="form-group">
            <label for="message">Pesan:</label>
            <textarea name="message" class="form-control" id="message"></textarea>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>

    <!-- Div ini berfungsi sebagai "papan pengumuman" untuk menampilkan pesan error atau sukses -->
    <div class="message_box" style="margin:10px 0px;"></div>
</div>

<!-- 3. Sertakan Library jQuery sebelum tag penutup </body> -->
<script src="js/jquery.min.js"></script>

<!-- 4. Kode jQuery untuk Validasi dan AJAX -->
<script>
$(document).ready(function() {
    var delay = 2000; // Waktu tunda sebelum menampilkan pesan sukses

    // Fungsi untuk validasi format email
    function isValidEmailAddress(emailAddress) {
        var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
        return pattern.test(emailAddress);
    };

    // Saat tombol submit di-klik
    $('.btn-default').click(function(e){
        // Mencegah aksi default form (yaitu refresh halaman)
        e.preventDefault();

        var name = $('#name').val();
        var email = $('#email').val();
        var message = $('#message').val();

        // Validasi: Cek apakah nama kosong
        if(name == ''){
            $('.message_box').html('<span style="color:red;">Masukkan Nama Anda!</span>');
            $('#name').focus();
            return false;
        }

        // Validasi: Cek apakah email kosong
        if(email == ''){
            $('.message_box').html('<span style="color:red;">Masukkan Alamat Email!</span>');
            $('#email').focus();
            return false;
        }
		
        // Validasi: Cek apakah format email benar
        if(!isValidEmailAddress(email)){
            $('.message_box').html('<span style="color:red;">Alamat email tidak benar!</span>');
            $('#email').focus();
            return false;
        }
        
        // Validasi: Cek apakah pesan kosong
        if(message == ''){
            $('.message_box').html('<span style="color:red;">Masukkan Pesan Anda!</span>');
            $('#message').focus();
            return false;
        }

        // Jika semua validasi lolos, jalankan AJAX
        $.ajax({
            type: "POST",
            url: "ajax.php", // Alamat file PHP yang akan memproses data
            data: "name="+name+"&email="+email+"&message="+message,
            
            // Tampilkan loader sebelum request dikirim
            beforeSend: function() {
                $('.message_box').html('<img src="Loader.gif" width="25" height="25"/>');
            },
            
            // Fungsi yang dijalankan jika request berhasil
            success: function(data) {
                // Tunda sebentar, lalu tampilkan pesan dari server (ajax.php)
                setTimeout(function() {
                    $('.message_box').html(data);
                    // Kosongkan form setelah berhasil
                    if (data.includes("Terima kasih")) {
                        $('#name').val('');
                        $('#email').val('');
                        $('#message').val('');
                    }
                }, delay);
            }
        });
    });
});
</script>

</body>
</html>