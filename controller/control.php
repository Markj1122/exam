<?php 

    class Controller {
        private $long_url;
        private $db;
        private $domain;
        private $shorterClass;
        private $shorturl;
        private $token;

        public function __construct($db,$url,$domain,$shortclass) {
            $this->db = $db;
            $this->long_url = $url;
            $this->domain =  $domain;
            $this->shorterClass = $shortclass;
        }

        public function shortenUrl() {
            try {
                $this->token = $this->shorterClass->urlToShortCode($this->long_url);
                $this->shorturl = $this->domain.$this->token;
            }catch(Exception $e) {
                $this->shorturl = $e->getMessage();
            }
        }

        public function get_Shorturl() {
            return $this->shorturl;
        }

        public function get_Orig() {
            return $this->long_url;
        }
    }
?>