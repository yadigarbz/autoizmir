<footer class="b-footer">
    <a id="to-top" href="#this-is-top"><i class="fa fa-chevron-up"></i></a>
    <div class="container">
        <div class="row">
            <div class="col-xs-4">
                <div class="b-footer__company wow slideInLeft" data-wow-delay="0.3s">
                    <div class="b-nav__logo">
                        <h3><a href="<?php echo $base."anasayfa.html" ?>">Auto<span>İZMİR</span></a></h3>
                    </div>
                    <p>&copy; 2018 Designed and Powered by Yadigar Berkay Zengin.</p>
                </div>
            </div>
            <div class="col-xs-8">
                <div class="b-footer__content wow slideInRight" data-wow-delay="0.3s">
                    <div class="b-footer__content-social">
                        <a href="#"><span class="fa fa-facebook-square"></span></a>
                        <a href="#"><span class="fa fa-twitter-square"></span></a>
                        <a href="#"><span class="fa fa-google-plus-square"></span></a>
                        <a href="#"><span class="fa fa-instagram"></span></a>
                        <a href="#"><span class="fa fa-youtube-square"></span></a>
                        <a href="#"><span class="fa fa-skype"></span></a>
                    </div>
                    <nav class="b-footer__content-nav">
                        <ul>
                            <?php foreach($global["pages"] as $page) {?>
                                <li><a href="<?php echo $base.$page["seo"]; ?>.html"><?php echo $page["title"]; ?></a></li>
                            <?php } ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</footer><!--b-footer-->