<section class="b-featured">
    <?php $carsb = getBenzinCars(); ?>
    <div class="container">
        <h2 class="s-title wow zoomInUp" data-wow-delay="0.3s">Benzinli Araçlar</h2>
        <div id="carousel-small" class="owl-carousel enable-owl-carousel" data-items="4" data-navigation="true" data-auto-play="true" data-stop-on-hover="true" data-items-desktop="4" data-items-desktop-small="4" data-items-tablet="3" data-items-tablet-small="2">
            <?php foreach ($carsb as $item) { ?>
            <div>
                <div class="b-featured__item wow rotateIn" data-wow-delay="0.3s" data-wow-offset="150">
                    <a href="<?php echo $base."arabalar/detay/".$item["id"]; ?>" style="overflow: hidden;">
                        <img style="width:100%;margin-top:0;" src="<?php echo $base."images/cars/".$item["photo"]; ?>" alt="<?php echo $item["title"] ?>" />
                        <?php if($item["pay"] > 0) { ?><span class="m-premium advantage" style="right:0">₺ <?php echo $item["pay"] ?> Peşinatla</span><?php } ?>
                        <?php if($item["credit"]) { ?><span class="m-premium price">KREDİ FIRSATIYLA</span><?php } ?>
                    </a>
                    <div class="b-featured__item-price">
                        ₺ <?php echo $item["price"] ?>
                    </div>
                    <div class="clearfix"></div>
                    <h5><a href="<?php echo $base."arabalar/detay/".$item["id"]; ?>"><?php echo substr($item["title"], 0,15) ?></a></h5>
                    <div class="b-featured__item-count"><span class="fa fa-tachometer"></span><?php echo priceWriter($item["km"]) ?> KM</div>
                    <div class="b-featured__item-links">
                        <a href="#"><?php echo $item["hire"] ?> Taksit</a>
                        <a href="#"><?php echo $item["cy"] ?> Model</a>
                        <a href="#"><?php echo substr($item["transmission"], 0,5) ?></a>
                        <a href="#"><?php echo $item["coloro"] ?></a>
                        <a href="#"><?php echo $item["fuel"] ?></a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section><!--b-featured-->