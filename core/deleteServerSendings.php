<?php
session_start();
include 'connectMySQL.php';
include 'pr.php';

$id = $_GET['id'];

$sql = "DELETE FROM server_sendings WHERE id=$id";

$check = false;
if ($conn->query($sql) === TRUE) {
    $conn -> close();
    header("Location: ../public/serverSendings.php");
}

?>