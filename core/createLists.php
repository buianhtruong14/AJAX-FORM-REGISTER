<?php
session_start();
include 'connectMySQL.php';
$name = $_POST['name'];
$customer_id = $_SESSION['customer_id'];

$sql = "INSERT INTO lists (name, customer_id) 
        VALUE ('$name', '$customer_id')";

$check = false;
if($conn->query($sql) === TRUE) {
    $check = true;
}

$conn->close();

echo json_encode($check);
?>
