<?php
session_start();
include 'connectMySQL.php';
include 'pr.php';

$id = $_GET['lists_id'];

$sql = "DELETE FROM lists WHERE id=$id";

$check = false;
if ($conn->query($sql) === TRUE) {
    $conn -> close();
    header("Location: ../public/lists.php");
}

?>