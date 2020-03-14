<?php
session_start();
include 'connectMySQL.php';

$id = $_GET['id'];

$sql = "DELETE FROM subscribers WHERE id=$id";

$check = false;
if ($conn->query($sql) === TRUE) {
    $conn -> close();
    header("Location: ../public/subscribers.php");
}

?>