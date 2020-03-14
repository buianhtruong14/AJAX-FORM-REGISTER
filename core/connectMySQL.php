<?php

$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "yoyo";

$conn = new mysqli($serverName, $userName, $password, $dbName);

if (!$conn) {
    die ( "Connection faild: " . $conn->connect_error);
}


?>