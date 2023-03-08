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
    <head>
        <body>
            <div class="container">
                <div class="row" style="margin-top:20px;">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <h3>Enter long URL</h3>
                        <form method="POST" action="">
                            <input type="text" name="longurl" class="form-control" placeholder="example:http/makingUrlshort.com/testing/testing" required>
                            <input type="submit" name="shorten" value="SHORT" class="btn btn-primary" style="margin-top:5pt;">
                        </form>
                    </div>
                    <div class="col-md-3"></div>
                </div>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <p>
                            <?php if($sorturl!="") {?>
                            Shorten URL: <?= $sorturl->getShorturl(); ?>
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