<?php

$progressFile = "progress.log";

if(!file_exists($progressFile)){
    echo 0;
    exit;
}

$content = file_get_contents($progressFile);

// simple estimation
if(strpos($content, "progress=end") !== false){
    echo 100;
    exit;
}

// simulation progression
preg_match('/out_time_ms=(\d+)/', $content, $matches);

if(isset($matches[1])){
    $time = $matches[1];
    $percent = min(99, intval($time / 1000000)); // approximation
    echo $percent;
}else{
    echo 0;
}

?>