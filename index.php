<?php 
    require_once '/model/shortener.php';
    require_once '/controller/control.php';
    require_once '/config/config.php';

    $sorturl = "";
    $shortclass = new Shortener($db);
    if(isset($_POST['shorten'])) {
        $domain = "http://localhost:/exam/";//change the value depending on what port you are using. ex:http://localhost:/exam/ or http://localhost:8080/exam/.
        $longurl = isset($_POST['longurl'])? $_POST['longurl']:'';
   
        $sorturl = new Controller($db,$longurl,$domain,$shortclass);
        $sorturl->shortenUrl();
    }

    if(isset($_GET["c"])) {
        try {
            $url = $shortclass->shortCodeToUrl($_GET["c"]);
            header("Location: ".$url);
            exit;
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    
?>
<html>
    <head>
        <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="./assets/css/bootstrap.css">
        <link rel="stylesheet" href="./assets/css/customstyle.css">
        <script src="./assets/js/customjs.js"></script>
    <head>
        <body>
            <div class="container">
                <div class="row input-urlform">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <h3>Short Your Long Url</h3>
                        <form method="POST" action="">
                            <label for="longurl">Input Your URL</label>
                            <input type="text" name="longurl" class="form-control" placeholder="ex: http/makingUrlshort.com/testing/testing" required>
                            <input type="submit" name="shorten" value="SHORT" class="btn btn-primary">
                        </form>
                    </div>
                    <div class="col-md-3"></div>
                </div>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <p>
                            <?php if($sorturl!="") {?>
                            Shorten URL:
                                        <a class="shortenurl" href="<?= $sorturl->get_Shorturl(); ?>">
                                            <input type="text" id="shorturl" value="<?= $sorturl->get_Shorturl(); ?>" readonly>
                                        </a>
                                        <button class="btn btn-success" onclick="clickCopy()">copy</button>
                            <br>
                            Original URL: <?= $sorturl->get_Orig(); ?>
                            <?php }?>
                        </p>
                        <p>
                            Examinee: Mark Jhon Buhayang.
                        </p>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
        </body>
</html>