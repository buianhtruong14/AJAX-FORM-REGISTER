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

$check = false;
if(isset($_POST['name'])){
    $_SESSION['campaigns'] = [
        "name" => $_POST['name'],
        "reply_to" => $_POST['reply_to'],
        "subject" => $_POST['subject'],
        "from_to" => $_POST['from_to'],
        "from_name" => $_POST['from_name'],
    ];
    $check = true;
}
if(isset($_POST['list_id'])){

    $_SESSION['campaigns']['list_id'] = $_POST['list_id'];

    $check = true;
}
if(isset($_POST['template_id'])){

    $_SESSION['campaigns']['template_id'] = $_POST['template_id'];

    $check = true;
}
if(isset($_POST['server_sending_id'])){
    $name = $_SESSION['campaigns']['name'];
    $reply_to = $_SESSION['campaigns']['reply_to'];
    $subject = $_SESSION['campaigns']['subject'];
    $from_to = $_SESSION['campaigns']['from_to'];
    $from_name = $_SESSION['campaigns']['from_name'];
    $customers_id = $_SESSION['customer_id'];
    $list_id = $_SESSION['campaigns']['list_id'];
    $template_id = $_SESSION['campaigns']['template_id'];
    $server_sending_id = $_POST['server_sending_id'];

    /*--------Sending Mail -----------*/

    //take data

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.sendgrid.net';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication

        //take data Username and password in server_sending datatable
        $sql_server_sending = "SELECT * FROM server_sendings WHERE id= $server_sending_id";
        $result_server_sending = $conn->query($sql_server_sending)->fetch_assoc();
        $mail->Username   = $result_server_sending['account'];                     // SMTP username
        $mail->Password   = $result_server_sending['password'];                               // SMTP password

        $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 587;                                    // TCP port to connect to

        //Recipients
        $mail->CharSet = 'UTF-8';

        //take data campaigns form
        $mail->From = $from_to;
        $mail->FromName = $from_name;
        $mail->addReplyTo($reply_to);
        $mail->WordWrap = 50;
        //$mail->addAddress('ellen@example.com');               // Name is optional
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        // Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;

        //take data body in template datatable
        $sql_templates = "SELECT * FROM templates WHERE id= $template_id";
        $result_templates = $conn->query($sql_templates)->fetch_assoc();



        $mail->AltBody = '';
        if(isset($result_templates['file_attachment'])){
            $fileAttachment = unserialize($result_templates['file_attachment']);
            for ( $i = 0; $i < count($fileAttachment); $i++){
                $mail->addAttachment('../public/upload/'.$fileAttachment[$i]);
            }
        }

            // Optional name

        //take data email, name in subscribers  datatable
        $sql_subscribers = "SELECT * FROM subscribers WHERE lists_id= $list_id";
        $result_subscribers = $conn->query($sql_subscribers);
        while ($row = $result_subscribers->fetch_assoc()){
            $mail->addAddress($row['email'],  $row['first_name'].$row['last_name']);
            $fullname = $row['first_name'].' '.$row['last_name'];

            $mail->Body    = $result_templates['content'];// Add a recipient

            $mail->send();
        }

        //send Mail finish, save data in campaigns datatable
        $sql = "INSERT INTO campaigns (name, reply_to, subject, from_to, customer_id,
        list_id, template_id, server_sending_id, from_name,status)
        VALUE ('$name', '$reply_to', '$subject', '$from_to', '$customers_id',
        '$list_id', '$template_id', '$server_sending_id', '$from_name', 'finish')";
        if ($conn->query($sql) === TRUE) {
            $check = true;
        }
    } catch (Exception $e) {
        $check = false;
    }

}


$conn -> close();
echo json_encode($check);


?>