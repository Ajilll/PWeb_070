<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

if (isset($_POST['name']) && $_POST['name'] != "" && isset($_POST['email']) && $_POST['email'] != "") {

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();                                
        $mail->Host       = 'smtp.gmail.com';           
        $mail->SMTPAuth   = true;                       
        $mail->Username   = 'alriansyahazil@gmail.com';     
        $mail->Password   = 'xhxlnqaipcxevxja';         
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; 
        $mail->Port       = 465;                        

        $mail->setFrom('alriansyahazil@gmail.com', 'Formulir Kontak Website'); 
        $mail->addAddress('alriansyahhidayat@gmail.com', 'Nama Admin'); 

        $name = htmlspecialchars($_POST['name']);
        $email_pengirim = htmlspecialchars($_POST['email']);
        $message_body = htmlspecialchars($_POST['message']);

        $mail->isHTML(true); 
        $mail->Subject = 'Pesan Baru dari ' . $name;
        $mail->Body    = "Pesan baru telah diterima dari formulir kontak.<br><br>" .
                         "<b>Nama:</b> " . $name . "<br>" .
                         "<b>Email:</b> " . $email_pengirim . "<br>" .
                         "<b>Pesan:</b><br>" . nl2br($message_body);
        $mail->AltBody = 'Pesan dari: ' . $name . ' Email: ' . $email_pengirim . ' Pesan: ' . $message_body;

        $mail->send();
        echo "<span style='color:green; font-weight:bold;'>
        Terima kasih telah menghubungi kami, kami akan segera merespon Anda.
        </span>";
    } catch (Exception $e) {
        echo "<span style='color:red; font-weight:bold;'>
        Maaf! Pesan tidak dapat dikirim. Mailer Error: {$mail->ErrorInfo}
        </span>";
    }

} else {
    echo "<span style='color:red; font-weight:bold;'>
    Harap isi semua kolom yang wajib diisi.
    </span>";
}

?>
