<?php
include 'connectMySQL.php';
if(isset($_GET)){
    $subscribers_id = 3;
    $name_campaign = 'Chiến dịch 007';
    $sql = "INSERT INTO mail_check (name_campaign, subscribers_id) VALUE ('$name_campaign', '$subscribers_id')";
    $conn->query($sql);
    $conn->close();
}
// print_r($_GET);
header("Location: https://www.facebook.com/yyzhang1102");
?>