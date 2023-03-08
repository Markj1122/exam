<?php 
    include "/model/shorturl.php";
    $sorturl = "";
    if(isset($_POST['shorten'])) {
        $longurl = isset($_POST['longurl'])? $_POST['longurl']:'';
        $sorturl = new Shorturl($longurl);
        $sorturl->toShorturl();
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
                            <input type="text" name="longurl" class="form-control" placeholder="example:http/makingUrlshort.com/testing/testing" required>
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
                            Shorten URL:<i class="shortenurl">
                                            <a class="shortenurl" href="<?= $sorturl->getShorturl(); ?>">
                                                <input type="text" id="shorturl" value="<?= $sorturl->getShorturl(); ?>" readonly>
                                            </a>
                                        </i> 
                                        <button class="copy" onclick="clickCopy()">copy</button>
                            <br>
                            Original URL: <?= $sorturl->getOrigurl(); ?>
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