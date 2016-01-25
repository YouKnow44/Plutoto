<?php
//echo file_get_contents("https://graph.facebook.com/596447807049170?fields=posts&access_token=1671896086356419|_8gk-2_y1-Bs1yns04E-ms4tkhI");
echo function_exists('curl_init');
$c = curl_init("https://graph.facebook.com/596447807049170?fields=posts&access_token=1671896086356419|_8gk-2_y1-Bs1yns04E-ms4tkhI");
$f = fopen("postFacebook.txt", "w");
curl_setopt($c, CURLOPT_FILE, $f);
curl_setopt($c, CURLOPT_HEADER, 0);

curl_exec($c);
curl_close($c);
fclose($f);
?>
