<?php

function pr($req, $exit = TRUE)
{
    echo '<pre>';
    print_r($req);
    echo '</pre>';

    if ($exit) exit;
}

?>