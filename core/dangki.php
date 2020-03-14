<?php

include 'connectMySQL.php';
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "INSERT INTO customers (first_name, last_name, email, password) 
        VALUE ('$first_name', '$last_name', '$email', '$password')";

$check = false;
if($conn->query($sql) === TRUE) {
    $check = true;
}

$conn->close();

echo json_encode($check);
?>

