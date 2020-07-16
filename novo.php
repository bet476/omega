$format = new Streaming\Format\X264();
$format->on('progress', function ($video, $format, $percentage){
        echo sprintf("\r Transcoding... (%s%%)[%s%s]", $percentage, str_repeat('#', $percentage), str_repeat('-', (100 - $percentage)));
});

$video->hls()
    ->setFormat($format)
    ->autoGenerateRepresentations([720, 480, 360, 240]) 
    ->save('https://playplusespn-lh.akamaihd.net/i/pp_espnbra@374460/master.m3u8');