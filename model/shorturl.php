<?php 
 
class Shorturl {
  private $long_url;
  private $short_url;

  public function __construct($long_url) {
    $this->long_url = $long_url;
  }

  public function toShorturl() {

       try {
        $apiv4 = 'https://api-ssl.bitly.com/v4/shorten';
        $AccessToken = 'b5b60b27281f3eabf8fc0c7ce6b69e42dbd0c7e7';

        $data = array(
            'long_url' => $this->long_url,
            'domain' => 'bit.ly',
            'group_guid' => 'Ba1bc23dE4F' 
        );
        $payload = json_encode($data);

        $header = array(
            'Authorization: Bearer ' . $AccessToken,
            'Content-Type: application/json',
        );

        $ch = curl_init($apiv4);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        $result = curl_exec($ch);
        $resultToJson = json_decode($result);

        if (isset($resultToJson->link)) {
          $this->short_url = $resultToJson->link;
        }
        else {
          throw new Exception("error: ".curl_error($ch));
        }
        curl_close($ch);
       } catch(Exception $e) {
        $this->short_url = $e->getMessage();
       }
      
  }

  public function getShorturl() {
    return $this->short_url;
  }
  public function getOrigurl() {
    return $this->long_url;
  }

}

?>