<?php

$filename = 'order.json';

if (file_exists($filename)) {
    
    $myfile = fopen("order.json", "r") or die("Unable to open file!");
    echo '<pre>';
    echo fread($myfile, filesize("order.json"));
    echo '</pre>';
    fclose($myfile);
    
}


else {
    echo "The file " . '<b>' . $filename . '</b>' . " does not exist";
}



?>