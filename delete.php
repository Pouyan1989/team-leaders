<?php
$file = "order.json";
if (file_exists($file)) {
    if (!unlink($file)) {
        echo ("Error deleting $file");
    } else {
        echo ("Deleted $file");
    }
} else {
    
    echo "Nothing is uploaded to delete " . '<b>' . $file . '</b>';
}

?>