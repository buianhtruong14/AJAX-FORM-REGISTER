<!DOCTYPE html>
<html>
<head>
    <title> Jquery Load</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
$num = isset($_POST['number'])?(int)$_POST['number']:false; // kiem tra va ep kieu
if(!$num){
    die('<p>Vui long nhap so</p>');
}
for($i=0;$i<$num;$i++){
    echo $i;
}
?>

</body>
</html>
