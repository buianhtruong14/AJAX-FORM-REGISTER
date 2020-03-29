<?php
include 'connectMySQL.php';
$sql_templates = "SELECT * FROM track_link WHERE subscribers_id=9 AND name_campaigns='cd2011'";
$result_templates = $conn->query($sql_templates);
$i =0;
while ($row = $result_templates->fetch_assoc()) {
    $i += 1;
}

echo $i;

// if(isset($_GET)){
//     $template_id = $_GET['template_id'];
//     $subscribers_id = $_GET['subscribers_id'];
//     $name_campaign = $_GET['name_campaign'];
//     $customers_id = $_GET['customers_id'];
//     $sql_mail = "INSERT INTO track_link (name_campaigns, subscribers_id, customers_id) 
//             VALUE ('$name_campaign', '$subscribers_id', '$customers_id')";
//     $conn->query($sql_mail);

//     $sql_templates = "SELECT * FROM templates WHERE id= $template_id";
//     $result_templates = $conn->query($sql_templates)->fetch_assoc();
//     $link = unserialize($result_templates['link']);

//     $conn->close();
//     header("Location: ".$link[$_GET['link_number']]);
// }
// print_r($_GET);
?>