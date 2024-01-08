<?php
include "../class/main.php";

$shortUrl = new ShortUrl();
try {
    $code = $shortUrl->urlToShortCode($_POST["longurl"]);
    echo $code;
    exit;
}
catch (\Exception $e) {
    echo "Error";
}

?>