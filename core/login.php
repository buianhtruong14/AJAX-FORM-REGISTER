<?php
include 'connectMySQL.php';
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM customers WHERE email='$email'";
    $result = $conn->query($sql)->fetch_assoc();
    if ($result['password'] == $password){
        session_start();
        $_SESSION['customer_id'] = $result['id'];
        $_SESSION['name'] = $result['last_name'];
        header("Location: ../public/dashboard.php");
    } else {
        echo "đăng nhập thất bại";
    }

?>