<?php
session_start();
if(empty($_SESSION['customer_id'])){
    header("Location: index.php");
}
include 'header.php';
?>

<h1>Chào mừng bạn đến với YoYo Company !</h1>

<?php
include 'footer.php';
?>
