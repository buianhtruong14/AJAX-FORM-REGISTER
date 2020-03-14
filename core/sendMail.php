<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/OAuth.php';
require 'PHPMailer/src/POP3.php';

include 'connectMySQL.php';
include 'pr.php';


if(isset($_POST['server_sending_id'])){
    $name = $_SESSION['campaigns']['name'];
    $reply_to = $_SESSION['campaigns']['reply_to'];
    $subject = $_SESSION['campaigns']['subject'];
    $from_to = $_SESSION['campaigns']['from_to'];
    $customers_id = $_SESSION['customer_id'];
    $list_id = $_SESSION['campaigns']['list_id'];
    $template_id = $_SESSION['campaigns']['template_id'];
    $server_sending_id = $_POST['server_sending_id'];

    //Sending Mail
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.sendgrid.net';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'yyzhang1102';                     // SMTP username
        $mail->Password   = 'Doilamloz1';                               // SMTP password
        $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 587;                                    // TCP port to connect to

        //Recipients
        $mail->CharSet = 'UTF-8';
        $mail->From = 'buianhtruong14@gmail.com';
        $mail->FromName = 'Bùi Anh Trường';
        $mail->addAddress('tieudv@zozo.vn', 'Mr.Tieu');     // Add a recipient
        $mail->WordWrap = 1;
        //$mail->addAddress('ellen@example.com');               // Name is optional
        //$mail->addReplyTo('buianhtruong14@gmail.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        // Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Hoàn Thành Bài Test Thứ 2';
        $mail->Body    = '<p>Chào Anh</p>
    <br> 
    <p>Đây là mail Trường gửi thông qua SMTP Sendgrid .</p>
    <br>
    <p>Chân thành cảm ơn anh</p>';
        $mail->AltBody = '';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        $check = false;
        echo "false";
    }
}

//$sql = "INSERT INTO campaigns (name, reply_to, subject, from_to, customer_id,
//    list_id, template_id, server_sending_id)
//        VALUE ('$name', '$reply_to', '$subject', '$from_to', '$customers_id',
//        '$list_id', '$template_id', '$server_sending_id')";
//if ($conn->query($sql) === TRUE) {
//    $check = true;
//}
?>