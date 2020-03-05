<?php

include 'connectMySQL.php';
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "INSERT INTO customers (first_name, last_name, email, password) 
        VALUE ('$first_name', '$last_name', '$email', '$password')";

if($conn->query($sql) === TRUE) {
    header("Location: login.php");
} else {
    echo "alert('Đăng kí thất bai')";
}

$conn->close();





?>