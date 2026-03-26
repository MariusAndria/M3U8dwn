<?php

$url = $_POST['url'];
$quality = $_POST['quality'];

$output = "downloads/video_" . time() . ".mp4";

$ffmpeg = "C:\\ffmpeg\\bin\\ffmpeg.exe"; // adapte si besoin

$cmd = "\"$ffmpeg\" -i \"$url\" -c copy -bsf:a aac_adtstoasc \"$output\" -progress progress.log -y";

exec($cmd . " 2>&1", $outputLog, $returnCode);

// debug propre
file_put_contents("debug.txt", implode("\n", $outputLog));

echo "STARTED";

?>