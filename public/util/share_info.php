<?php
$source_url = "http://goshare.design4web.dk/view/8";
$url = "http://api.facebook.com/restserver.php?method=links.getStats&urls=".urlencode($source_url);
$xml = file_get_contents($url);
$xml = simplexml_load_string($xml);

echo "Share --- ".$shares = $xml->link_stat->share_count;
echo "<br/>";

echo "Like --- ".$likes = $xml->link_stat->like_count;
echo "<br/>";

echo "Comments ---".$comments = $xml->link_stat->comment_count; 
echo "<br/>";

echo "Total --- ".$total = $xml->link_stat->total_count;
echo "<br/>";

echo $max = max($shares,$likes,$comments);