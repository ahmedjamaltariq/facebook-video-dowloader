<?php
        $options  = array('http' => array('user_agent' => 'custom user agent string'));
        $context  = stream_context_create($options);
        $response = file_get_contents('__PASTE_FACEBBOOK_VIDEO_LINK_HERE__', false, $context);
        preg_match_all('#\bhttps?://[^,\s()<>]+(?:\([\w\d]+\)|([^,[:punct:]\s]|/))#', strip_tags($response), $match);
        $searchword = 'video';
        $matches = array_filter($match[0], function($var) use ($searchword) { return preg_match("/\b$searchword\b/i", $var); });
        $filename = rand().".mp4";
        file_put_contents($filename, fopen(reset($matches), 'r'));

?>
