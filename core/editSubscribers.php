<?php
session_start();
include 'connectMySQL.php';

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$id = $_POST['id'];

$sql = " UPDATE subscribers
         SET first_name = '$first_name', last_name = '$last_name', email = '$email'
         WHERE id = $id";

$check = false;
if ($conn->query($sql) === TRUE) {
    $check = true;
}

$conn -> close();

echo json_encode($check);
?>