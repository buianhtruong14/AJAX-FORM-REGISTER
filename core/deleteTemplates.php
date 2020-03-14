<?php
session_start();
include 'connectMySQL.php';
include 'pr.php';

$id = $_GET['templates_id'];

$sql = "DELETE FROM templates WHERE id=$id";

$check = false;
if ($conn->query($sql) === TRUE) {
    $conn -> close();
    header("Location: ../public/templates.php");
}

?>