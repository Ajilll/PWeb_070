<?php
// Impor kelas-kelas PHPMailer ke dalam namespace global
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Muat file autoloader Composer (jika menggunakan composer) atau muat file secara manual
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

// Pastikan ada data yang dikirim melalui POST dan tidak kosong
if (isset($_POST['name']) && $_POST['name'] != "" && isset($_POST['email']) && $_POST['email'] != "") {

    // Buat instance; passing `true` mengaktifkan exceptions
    $mail = new PHPMailer(true);

    try {
        // Pengaturan Server
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;      // Aktifkan output debug mendetail untuk melihat proses
        $mail->isSMTP();                                // Mengirim menggunakan SMTP
        $mail->Host       = 'smtp.gmail.com';           // Atur server SMTP untuk mengirim (untuk Gmail)
        $mail->SMTPAuth   = true;                       // Aktifkan otentikasi SMTP
        $mail->Username   = 'alriansyahazil@gmail.com';     // Alamat email Gmail Anda
        $mail->Password   = 'xhxlnqaipcxevxja';         // Gunakan "App Password" dari akun Google Anda
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Aktifkan enkripsi TLS implisit
        $mail->Port       = 465;                        // Port TCP untuk dihubungkan; gunakan 587 jika Anda mengatur `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        // Penerima
        $mail->setFrom('alriansyahazil@gmail.com', 'Formulir Kontak Website'); // Email pengirim (harus sama dengan username)
        $mail->addAddress('alriansyahhidayat@gmail.com', 'Nama Admin'); // Email tujuan (email Anda yang akan menerima pesan)

        // Ambil data dari form
        $name = htmlspecialchars($_POST['name']);
        $email_pengirim = htmlspecialchars($_POST['email']);
        $message_body = htmlspecialchars($_POST['message']);

        // Konten Email
        $mail->isHTML(true); // Atur format email ke HTML
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