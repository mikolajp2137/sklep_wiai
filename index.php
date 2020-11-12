<?php
    include_once 'header.php';

?>
    <div class="slider">
        <div>
            <a href="article-1.html"><img src="images/example.webp" alt="slider-1"></a>
            <div class="slide-caption"><h4><a href="article-1.html">Herbata w świecie Gwiezdnych Wojen</a></h4></div>
        </div>
        <div>
            <a href="article-2.html"><img src="images/herbata_czarna_w_szklanym_kubku.jfif" alt="slider-2"></a>
            <div class="slide-caption"><h4><a href="article-2.html">Herbata czarna</a></h4></div>
        </div>
        <div>
            <a href="article-3.html"><img src="images/yerba.jpg" alt="slider-3"></a>
            <div class="slide-caption"><h4><a href="article-3.html">Yerba mate</a></h4></div>
        </div>
    </div>

    <main>
        <div class="row">
            <div class="col col-bg">
                <h1>O blogu</h1>
                <?php
                if (isset($_SESSION["userid"])){
                    echo "<p>Cześć ".$_SESSION["username"]."!</p>";
                }else{
                }
                ?>
                <p>Witaj na blogu Yerbata, gdzie króluje yerba i herbata! Znajdziesz tu wiele recenzji i testów herbat oraz yerb różnych firm, opinie o sklepach, ciekawostki na temat tych roślin i wiele więcej. Jeśli nie masz dużo czasu na czytanie, to zdecydowanie spodoba Ci się nasza strona, ponieważ nasze teksty są zwarte, krótkie i przystępne. Poniżej wyświetlają się najnowsze wpisy, zachęcam do przejrzenia ich, może któryś Cię zainteresuje :)</p>
            </div>
        </div>

        <div class="row">
            <div class="col col-1">
                <img src="images/example.webp" alt="image" class="thumbnail">
                <h2><a href="article-1.html">Herbata w świecie Gwiezdnych Wojen</a></h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis semper sem mauris, at vulputate diam ultricies at. Aliquam erat volutpat. Fusce neque leo, luctus at lobortis id, pretium eu nisi. Proin auctor erat eget dolor dignissim sagittis. Vivamus eget egestas libero. Nulla non sodales quam, porta porta quam. Praesent eget orci et velit efficitur varius. Praesent purus magna, feugiat a ultrices vitae, mollis quis justo.</p>
            </div>
            <div class="col col-1">
                <img src="images/herbata_czarna_w_szklanym_kubku.jfif" alt="image" class="thumbnail">
                <h2><a href="article-2.html">Herbata czarna</a></h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis semper sem mauris, at vulputate diam ultricies at. Aliquam erat volutpat. Fusce neque leo, luctus at lobortis id, pretium eu nisi. Proin auctor erat eget dolor dignissim sagittis. Vivamus eget egestas libero. Nulla non sodales quam, porta porta quam. Praesent eget orci et velit efficitur varius. Praesent purus magna, feugiat a ultrices vitae, mollis quis justo.</p>
            </div>
        </div>

        <div class="row">
            <div class="col col-1">
                <img src="images/yerba.jpg" alt="image" class="thumbnail">
                <h2><a href="article-3.html">Yerba mate</a></h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis semper sem mauris, at vulputate diam ultricies at. Aliquam erat volutpat. Fusce neque leo, luctus at lobortis id, pretium eu nisi. Proin auctor erat eget dolor dignissim sagittis. Vivamus eget egestas libero. Nulla non sodales quam, porta porta quam. Praesent eget orci et velit efficitur varius. Praesent purus magna, feugiat a ultrices vitae, mollis quis justo.</p>
            </div>
            <div class="col col-1">
                <img src="images/example.webp" alt="image" class="thumbnail">
                <h2><a href="article-1.html">Herbata w świecie Gwiezdnych Wojen</a></h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis semper sem mauris, at vulputate diam ultricies at. Aliquam erat volutpat. Fusce neque leo, luctus at lobortis id, pretium eu nisi. Proin auctor erat eget dolor dignissim sagittis. Vivamus eget egestas libero. Nulla non sodales quam, porta porta quam. Praesent eget orci et velit efficitur varius. Praesent purus magna, feugiat a ultrices vitae, mollis quis justo.</p>
            </div>
        </div>

        <div class="row">
            <div class="col col-1">
                <img src="images/example.webp" alt="image" class="thumbnail">
                <h2><a href="article-1.html">Herbata w świecie Gwiezdnych Wojen</a></h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis semper sem mauris, at vulputate diam ultricies at. Aliquam erat volutpat. Fusce neque leo, luctus at lobortis id, pretium eu nisi. Proin auctor erat eget dolor dignissim sagittis. Vivamus eget egestas libero. Nulla non sodales quam, porta porta quam. Praesent eget orci et velit efficitur varius. Praesent purus magna, feugiat a ultrices vitae, mollis quis justo.</p>
            </div>
            <div class="col col-1">
                <img src="images/example.webp" alt="image" class="thumbnail">
                <h2><a href="article-1.html">Herbata w świecie Gwiezdnych Wojen</a></h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis semper sem mauris, at vulputate diam ultricies at. Aliquam erat volutpat. Fusce neque leo, luctus at lobortis id, pretium eu nisi. Proin auctor erat eget dolor dignissim sagittis. Vivamus eget egestas libero. Nulla non sodales quam, porta porta quam. Praesent eget orci et velit efficitur varius. Praesent purus magna, feugiat a ultrices vitae, mollis quis justo.</p>
            </div>
        </div>
    </main>

    <a href="#" class="gotop"><i class="fas fa-caret-square-up"></i></a>

    <script src="js/jquery.js"></script>
    <script type="text/javascript" src="slick/slick.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.slider').slick({
                infinite: true,
                autoplay: true,
                speed: 400,
                fade: true,
                cssEase: 'linear',
                arrows: false,
                swipe: true,
                swipeToSlide: true,
            });
        });
    </script>
<?php
    include_once 'footer.php';

?>
