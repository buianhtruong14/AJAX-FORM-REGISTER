<?php
session_start();
include 'connectMySQL.php';
include 'pr.php';
$name = $_POST['name'];
$content = $_POST['content'];
$id =$_POST['id'];

$sql = "UPDATE templates 
        SET name = '$name', content = '$content' 
        WHERE id=$id";

$check = false;
if($conn->query($sql) === TRUE) {
    $check = true;
}

$conn->close();

echo json_encode($check);
?>
