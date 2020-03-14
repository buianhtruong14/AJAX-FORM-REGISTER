<?php
session_start();
include 'connectMySQL.php';

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$lists_id = $_SESSION['lists_id'];

$sql = " INSERT INTO subscribers (first_name, last_name, email, lists_id)
        VALUE ('$first_name', '$last_name', '$email', '$lists_id')";

$check = false;
if ($conn->query($sql) === TRUE) {
    $check = true;
}

$conn -> close();

echo json_encode($check);
?>