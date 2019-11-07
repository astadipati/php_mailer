<?php

// include_once("config.php");
// $connect = mysqli_connect("localhost", "root", "Kul0nuwun", "autopost");
$databaseHost = 'localhost';
$databaseName = 'xxx';
$databaseUsername = 'xxx';
$databasePassword = 'xxx';

$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include librari phpmailer
include('phpmailer/Exception.php');
include('phpmailer/PHPMailer.php');
include('phpmailer/SMTP.php');

$email_pengirim = 'xxx'; // Isikan dengan email pengirim
$nama_pengirim = 'PTA Surabaya'; // Isikan dengan nama pengirim

$pesan = $_POST['pesan']; // Ambil pesan dari inputan form
$id = $_POST['antrian_id']; // Ambil pesan dari inputan form
// validate
$subjek = $_POST['subjek']; // Ambil subjek dari inputan form
$permohonan_banding = $_POST['permohonan_banding']; // Ambil pesan dari inputan form
$tanggal_register_banding = $_POST['tanggal_register_banding']; // Ambil pesan dari inputan form
$nomor_perkara_banding = $_POST['nomor_perkara_banding']; // Ambil pesan dari inputan form
$pihak_nama = $_POST['pihak_nama']; // Ambil pesan dari inputan form
$cek_status = '2';
$alamat = $_POST['alamat']; // Ambil pesan dari inputan form
$email_penerima = $_POST['email_penerima']; // Ambil email penerima dari inputan form
$log = date("Y-m-d H:i:s");
// end validate

$attachment = $_FILES['attachment']['name']; // Ambil nama file yang di upload


$mail = new PHPMailer;
$mail->isSMTP();

$mail->Host = 'smtp.gmail.com';
$mail->Username = $email_pengirim; // Email Pengirim
$mail->Password = 'xxx'; // Isikan dengan Password email pengirim
$mail->Port = 465;
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
// $mail->SMTPDebug = 2; // Aktifkan untuk melakukan debugging

$mail->setFrom($email_pengirim, $nama_pengirim);
$mail->addAddress($email_penerima, '');
$mail->isHTML(true); // Aktifkan jika isi emailnya berupa html

// Load file content.php
ob_start();
include "template.php";

$content = ob_get_contents(); // Ambil isi file content.php dan masukan ke variabel $content
ob_end_clean();

$mail->Subject = $subjek;
$mail->Body = $content;
$mail->AddEmbeddedImage('image/img_logo.png', 'PTA_Surabaya', 'logo.png'); // Aktifkan jika ingin menampilkan gambar dalam email

if(empty($attachment)){ // Jika tanpa attachment
    $send = $mail->send();

    if($send){ // Jika Email berhasil dikirim
        // simpan
        $sql = "UPDATE p_diterima SET nomor_perkara_pn = '".$subjek."', permohonan_banding = '".$permohonan_banding."',
                tanggal_register_banding = '".$tanggal_register_banding."',
                nomor_perkara_banding = '".$nomor_perkara_banding."',
                pihak_nama = '".$pihak_nama."',
                alamat = '".$alamat."',
                cek_status='2',
                email_satker = '".$email_penerima."',
                log = '".$log."'
                WHERE post_id = '".$id."'";  
        mysqli_query($conn, $sql);
        // end simpan

        echo "<h1>Email berhasil dikirim</h1><br /><a href='index.php'>Kembali ke Form</a>";
    }else{ // Jika Email gagal dikirim
        echo "<h1>Email gagal dikirim</h1><br /><a href='index.php'>Kembali ke Form</a>";
        // echo '<h1>ERROR<br /><small>Error while sending email: '.$mail->getError().'</small></h1>'; // Aktifkan untuk mengetahui error message
    }
}else{ // Jika dengan attachment
    $tmp = $_FILES['attachment']['tmp_name'];
    $size = $_FILES['attachment']['size'];

    if($size <= 25000000){ // Jika ukuran file <= 25 MB (25.000.000 bytes)
        $path = 'tmp/'.$attachment; // Set path tempat upload file
        move_uploaded_file($tmp, $path); // Upload file ke folder tmp

        $mail->addAttachment($path);

        $send = $mail->send();

        if($send){ // Jika Email berhasil dikirim
            echo "<h1>Email berhasil dikirim</h1><br /><a href='index.php'>Kembali ke Form</a>";
        }else{ // Jika Email gagal dikirim
            echo "<h1>Email gagal dikirim</h1><br /><a href='index.php'>Kembali ke Form</a>";
            // echo '<h1>ERROR<br /><small>Error while sending email: '.$mail->getError().'</small></h1>'; // Aktifkan untuk mengetahui error message
        }
    }else{
        echo "<h1>Ukuran file attachment maksimal 25 MB</h1><br /><a href='index.php'>Kembali ke Form</a>";
    }
}
?>
