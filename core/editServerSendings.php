<?php
session_start();
include 'connectMySQL.php';
include 'pr.php';


$name = $_POST['name'];
$account = $_POST['account'];
$password = $_POST['password'];
$id = $_POST['id'];

$sql = " UPDATE server_sendings
         SET name='$name', account='$account', password='$password'
         WHERE id = $id";

$check = false;
if ($conn->query($sql) === TRUE) {
    $check = true;
}

$conn -> close();

echo json_encode($check);
?>