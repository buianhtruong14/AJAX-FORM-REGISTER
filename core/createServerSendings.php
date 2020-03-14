<?php
session_start();
include 'connectMySQL.php';
include 'pr.php';
$name = $_POST['name'];
$account = $_POST['account'];
$password = $_POST['password'];
$customers_id = $_SESSION['customer_id'];

$sql = " INSERT INTO server_sendings (name, account, password, customer_id)
        VALUE ('$name', '$account', '$password', '$customers_id')";

$check = false;
if ($conn->query($sql) === TRUE) {
    $check = true;
}

$conn -> close();

echo json_encode($check);
?>