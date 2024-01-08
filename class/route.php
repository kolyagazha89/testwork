<?php   
include "../class/main.php";

$code = $_GET["link"];


$shortUrl = new ShortUrl();
try {
    $url = $shortUrl->shortCodeToUrl($code);
    header("Location: " . $url);
    exit;
}
catch (\Exception $e) {
    exit;
}

?>