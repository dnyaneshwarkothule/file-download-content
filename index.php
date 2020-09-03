<?php
$file = fopen("css.css","r");

$cnt = 0;
while(! feof($file)) {
    $str = fgets($file);
    if (strpos($str, 'https://') !== false) {
        $arr = explode(")", ltrim(strstr($str, 'https://'), 'https://'), 2);
        $url = 'https://'.$arr[0];
        $file_name = substr(strrchr($url, "/"), 1);
        if(file_put_contents( $file_name,file_get_contents($url))) {
            echo "File downloaded successfully";
        }
        else {
            echo "File downloading failed.";
        }
    }
}

fclose($file);