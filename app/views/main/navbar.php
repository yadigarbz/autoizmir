<nav class="b-nav">
    <div class="container">
        <div class="row">
            <div class="col-sm-3 col-xs-4">
                <div class="b-nav__logo wow slideInLeft" data-wow-delay="0.3s">
                    <h3><a href="<?php echo $base."anasayfa.html" ?>">Auto<span>İZMİR</span></a></h3>
                    <h2><a href="<?php echo $base."anasayfa.html" ?>">2. EL TAKSİTLE ARAÇ SATIŞ</a></h2>
                </div>
            </div>
            <div class="col-sm-9 col-xs-8">
                <div class="b-nav__list wow slideInRight" data-wow-delay="0.3s">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav">
                            <span class="sr-only">MOBİL MENÜ</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse navbar-main-slide" id="nav">
                        <ul class="navbar-nav-menu">
                        <?php foreach($global["pages"] as $page) {
                                if($p == $page["seo"]){
                        ?>
                            <li><a class="active" href="<?php echo $base.$page["seo"]; ?>.html"><?php echo $page["title"]; ?></a></li>
                        <?php  } else { ?>
                            <li><a href="<?php echo $base.$page["seo"]; ?>.html"><?php echo $page["title"]; ?></a></li>
                        <?php } } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav><!--b-nav-->