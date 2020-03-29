<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $link ="<a href='https://www.facebook.com/yyzhang1102'>link test click</a><a href='https://www.facebook.com/bonthanhlun'>link test click2</a>";
    // $link = strstr($link,'href');
    // $countLink = strpos($link,'href');
    // $lengthLink = strlen($link);
    // $link1 = substr($link,$countLink,$lengthLink);
    // $relink1 = strstr($link1,'http');
    // $cutLink = explode("'",$relink1);
    // $dataLink[] = $cutLink[0];

    // $countLink = strpos($relink1,'href');
    // $lengthLink = strlen($relink1);
    // $link2 = substr($relink1,$countLink,$lengthLink);
    // $relink2 = strstr($link2,'http');
    // $cutLink = explode("'",$relink2);
    // $dataLink[] = $cutLink[0];
    // $countLink = strpos($relink2,'href');
    while (!empty(strpos($link,'href'))){
        $link = strstr($link,'href');
        $link = strstr($link,'http');
        $cutLink = explode("'",$link);
        $dataLink[] = $cutLink[0];
    }
    // function cutlink :))
    function cutLink($l){
    
        while (!empty(strpos($l,'href'))){
            $l = strstr($l,'href');
            $l = strstr($l,'http');
            $cutLink = explode("'",$l);
            $dataLink[] = $cutLink[0];
            }
        return $dataLink;
    }
    // print_r($dataLink);
    // cutLink($link);
    echo addslashes ("Freetuts's a website learning online");

    // echo $relink."</br>";
    // echo $link1."</br>";
    // echo $relink1."</br>";
    // echo $link2."</br>";
    // echo $relink2."</br>";
    // echo $countLink."</br>";
    // print_r($dataLink);
    // check click 1 link oki

    // $relink = explode("'",strstr($link,'http'));
    // $link = str_replace($relink[0],'http://app.yoyo.de/core/mailCheck.php?id=88&name_campaign=test mail', $link);
    // echo $link;
    // print_r($relink);

    //checkmail oki============>>

    // $h = "<div><p>tinh yêu xanh mượt</p></div>";
    // $name = "Chiến Dịch 1";
    // $id = 99;
    // // $h = str_replace("<div>","<div><a href="."'http://app.yoyo.de/core/mailCheck.php?id=".$id."&name_campaign=".$name."'"." >lêulo</a>", $h);
    // $h = str_replace("<p>","<p><img src="."'http://app.yoyo.de/core/mailCheck.php?id=".$id."&name_campaign=".$name."'"." width='1px' height='1px' >", $h);
    // echo $h;
    ?>
</body>
</html>