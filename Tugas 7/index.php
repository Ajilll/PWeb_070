<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form AJAX</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

<div class="container" style="margin-top: 50px;">
    <h2>Submit Form Tanpa Refresh Halaman</h2>
    <p>Menggunakan AJAX, jQuery, dan PHP</p>
    
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

    <div class="message_box" style="margin:10px 0px;"></div>
</div>

<script src="js/jquery.min.js"></script>

<script>
$(document).ready(function() {
    var delay = 2000;

    function isValidEmailAddress(emailAddress) {
        var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
        return pattern.test(emailAddress);
    };

    $('.btn-default').click(function(e){
        e.preventDefault();

        var name = $('#name').val();
        var email = $('#email').val();
        var message = $('#message').val();

        if(name == ''){
            $('.message_box').html('<span style="color:red;">Masukkan Nama Anda!</span>');
            $('#name').focus();
            return false;
        }

        if(email == ''){
            $('.message_box').html('<span style="color:red;">Masukkan Alamat Email!</span>');
            $('#email').focus();
            return false;
        }
		
        if(!isValidEmailAddress(email)){
            $('.message_box').html('<span style="color:red;">Alamat email tidak benar!</span>');
            $('#email').focus();
            return false;
        }
        
        if(message == ''){
            $('.message_box').html('<span style="color:red;">Masukkan Pesan Anda!</span>');
            $('#message').focus();
            return false;
        }

        $.ajax({
            type: "POST",
            url: "ajax.php",
            data: "name="+name+"&email="+email+"&message="+message,
            
            beforeSend: function() {
                $('.message_box').html('<img src="Loader.gif" width="25" height="25"/>');
            },
            
            success: function(data) {
                setTimeout(function() {
                    $('.message_box').html(data);
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
