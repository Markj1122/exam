<?php 
    $dbHost     = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName     = "urlshorter_exam";

    try{
        $db = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);
    }catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }

?>