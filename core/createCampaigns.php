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
    $_SESSION['campaigns']['server_sending_id'] = $server_sending_id;

    /*--------Sending Mail -----------*/

    //take data

    
    $sql = "INSERT INTO campaigns (name, reply_to, subject, from_to, customer_id,
        list_id, template_id, server_sending_id, from_name)
        VALUE ('$name', '$reply_to', '$subject', '$from_to', '$customers_id',
        '$list_id', '$template_id', '$server_sending_id', '$from_name')";

    $check = true;

}


$conn -> close();
echo json_encode($check);


?>