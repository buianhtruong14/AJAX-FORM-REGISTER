<?php
session_start();
include 'connectMySQL.php';
include 'pr.php';
$name = $_POST['name'];
$content = $_POST['content'];
$customer_id = $_SESSION['customer_id'];

$sql = "INSERT INTO templates (name, content, customer_id) 
        VALUE ('$name', '$content', '$customer_id')";

$check = false;
if($conn->query($sql) === TRUE) {
    $check = true;
}

$conn->close();

echo json_encode($check);
?>
