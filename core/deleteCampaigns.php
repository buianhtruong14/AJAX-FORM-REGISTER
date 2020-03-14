<?php
session_start();
include 'connectMySQL.php';
include 'pr.php';

$id = $_GET['id'];

$sql = "DELETE FROM campaigns WHERE id=$id";

$check = false;
if ($conn->query($sql) === TRUE) {
    $conn -> close();
    header("Location: ../public/campaigns.php");
}

?>