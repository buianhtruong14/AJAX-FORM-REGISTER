<?php
$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "yoyo";

//Create connection
$conn = new mysqli($serverName, $userName, $password, $dbName);

if(!$conn) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE server_sending(
id INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(255) NOT NULL,
account VARCHAR(99) NOT NULL,
password VARCHAR(99) NOT NULL,
customer_id INT(6) NOT NULL,
create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
$conn->query($sql);
$conn->close();
?>