<section class="b-slider">
    <div id="carousel" class="slide carousel carousel-fade">
        <div class="carousel-inner">
            <?php
                $slides = getSlides(); $i = 0;
                foreach ($slides as $slide){ ?>
            <div class="item <?php echo $i == 0 ? "active" : ""; ?>">
                <img src="<?php echo $base ?>images/cars/<?php echo $slide["photo"] ?>" />
                <div class="container">
                    <div class="carousel-caption b-slider__info">
                        <h3><?php echo $slide["name"] ?></h3>
                        <h2><?php echo $slide["mfc"] ?> <br/><?php echo $slide["mdl"] ?></h2>
                        <p><?php echo $slide["cy"] ?> Model <span style="font-family: 'Roboto', sans-serif;">₺<?php echo priceWriter($slide["price"]) ?></span></p>
                        <a class="btn m-btn" href="<?php echo $base ?>arabalar/detay/<?php echo $slide["cid"] ?>">DETAYLARI GÖR<span class="fa fa-angle-right"></span></a>
                    </div>
                </div>
            </div>
            <?php $i++; } ?>
        </div>
        <a class="carousel-control right" href="#carousel" data-slide="next">
            <span class="fa fa-angle-right m-control-right"></span>
        </a>
        <a class="carousel-control left" href="#carousel" data-slide="prev">
            <span class="fa fa-angle-left m-control-left"></span>
        </a>
    </div>
</section><!--b-slider-->
