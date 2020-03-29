<?php
session_start();
include 'connectMySQL.php';
include 'pr.php';
$name = $_POST['name'];
$content = $_POST['content'];
$link = $content;
while (!empty(strpos($link, 'href'))) {
    $link = strstr($link, 'href');
    $link = strstr($link, 'http');
    $link = addslashes($link);
    $cutLink = explode("\\", $link);
    $dataLink[] = $cutLink[0];
}
$upLoadCount = count($_FILES['fileUpLoad']['name']);
for ($i = 0; $i < $upLoadCount; $i++) {
    $upLoadName = $_FILES['fileUpLoad']['name'][$i];
    $fileAttachment[] = $upLoadName;
    move_uploaded_file(
        $_FILES['fileUpLoad']['tmp_name'][$i],
        "../public/upload/$upLoadName"
    );
}

// $countfile = $_POST['countfile'];
// $fileAttachment = array();
// for ($i = 1; $i < $countfile + 1; $i++) {
//     $fileAttachment[$i-1] = $_POST["file$i"];
// }
$dataLink = serialize($dataLink);
$seralizedArray = serialize($fileAttachment);
$customer_id = $_SESSION['customer_id'];
if (isset($_FILES['fileUpLoad']['name'])) {
    $sql = "INSERT INTO templates (name, content, customer_id, file_attachment, link) 
        VALUE ('$name', '$content', '$customer_id', '$seralizedArray', '$dataLink')";
} else {
    $sql = "INSERT INTO templates (name, content, customer_id, link) 
        VALUE ('$name', '$content', '$customer_id','$dataLink')";
}
$check = false;
if ($conn->query($sql) === TRUE) {
    $check = true;
}

$conn->close();

header("Location: ../public/templates.php");
