<?php
class ShortUrl
{
    protected $chars = "123456789bcdfghjkmnpqrstvwxyzBCDFGHJKLMNPQRSTVWXYZ";
    protected static $table = "long2short";
    protected static $checkUrlExists = true;

    protected $db;
    public function __construct() {
        $this->db = mysqli_connect("localhost", "root", "", "tz");
    }
        
    public function urlToShortCode($url) {
        if (empty($url)) {
            return json_encode(array('success' => 0, 'text'=>"Не получен адрес URL."));
        }

        if ($this->validateUrlFormat($url) == false) {
            return json_encode(array('success' => 0, 'text'=>"Адрес URL имеет неправильный формат."));
        }

        if (self::$checkUrlExists) {
            if (!$this->verifyUrlExists($url)) {
                return json_encode(array('success' => 0, 'text'=>"Адрес URL не существует."));
            }
        }

        $shortCode = $this->urlExistsInDb($url);
        if ($shortCode == false) {
            $shortCode = $this->createShortCode($url);
        }
        
        return json_encode(array('success' => 1, 'text'=>$shortCode));
    }

    protected function validateUrlFormat($url) {
        return filter_var($url, FILTER_VALIDATE_URL);
    }

    protected function verifyUrlExists($url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_setopt($ch,  CURLOPT_RETURNTRANSFER, true);
        curl_exec($ch);
        $response = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return (!empty($response) && $response != 404);
    }
    protected function urlExistsInDb($url) {
        $query = "SELECT short_url FROM " . self::$table .
            " WHERE long_url = '" . $url . "' LIMIT 1";
        $stmt = $this->db->query($query);
        $result = $stmt->fetch_array();
        return (empty($result)) ? false : $result["short_url"];
    }
    protected function createShortCode($url) {
        $shortcode = $this->insertUrlInDb($url);
        return $shortcode;
    }
    
    protected function insertUrlInDb($url) {
        $code = substr(str_shuffle($this->chars), 0, 6);
        $query = "INSERT INTO " . self::$table .
            " (long_url, short_url) " .
            " VALUES ('". $url ."', '". $code ."')";
        $stmnt = $this->db->prepare($query);
        $stmnt->execute();

        return $code;
    }

    public function shortCodeToUrl($code, $increment = true) {

        $urlRow = $this->getUrlFromDb($code);      
        return $urlRow["long_url"];
    }


    protected function getUrlFromDb($code) {
        $query = "SELECT long_url FROM " . self::$table .
            " WHERE short_url = '". $code ."' LIMIT 1";
        $stmt = $this->db->query($query);
        $result = $stmt->fetch_array();
        return (empty($result)) ? false : $result;
    }

}