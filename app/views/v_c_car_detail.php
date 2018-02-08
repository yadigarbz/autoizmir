<?php $carD = getCarSpect($param) ?>
<section class="b-detail s-shadow">
    <div class="container">
        <header class="b-detail__head s-lineDownLeft wow zoomInUp" data-wow-delay="0.5s">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <div class="b-detail__head-title">
                        <h1><?php echo $carD["title"] ?></h1>
                        <h3><?php echo $carD["sub"] ?></h3>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-12 m--align-right">
                    <div class="b-detail__head-price">
                        <div class="b-detail__head-price-num" style="font-family: 'Roboto', Sans-Serif; background-color:#2475ce;">₺<?php echo priceWriter($carD["pay"]) ?></div>
                        <p style="text-align: right;"> Peşinat </p>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-12 m--align-left">
                    <div class="b-detail__head-price" style="float:left;">
                        <div class="b-detail__head-price-num" style="font-family: 'Roboto', Sans-Serif">₺<?php echo priceWriter($carD["price"]) ?></div>
                    <p style="text-align: left;"> Vergiler Dahil </p>
                    </div>
                </div>
            </div>
        </header>
        <div class="b-detail__main">
            <div class="row">
                <div class="col-md-8 col-xs-12">
                    <div class="b-detail__main-info">
                        <div class="b-detail__main-info-images wow zoomInUp" data-wow-delay="0.5s">
                            <div class="row m-smallPadding">
                                <div class="col-xs-10">
                                    <ul class="b-detail__main-info-images-big bxslider enable-bx-slider" data-pager-custom="#bx-pager" data-mode="horizontal" data-pager-slide="true" data-mode-pager="vertical" data-pager-qty="5">
                                        <?php foreach(getCarPhotos($param) as $photo) { ?>
                                        <li class="s-relative">
                                            <!--<a data-toggle="modal" data-target="#myModal" href="#" class="b-items__cars-one-img-video"><span class="fa fa-film"></span>VIDEO</a>-->
                                            <img height=100 class="img-responsive center-block" src="<?php echo $base ?>images/cars/<?php echo $photo["photo"] ?>" alt="<?php echo $carD["title"] ?>" />
                                        </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                                <div class="col-xs-2 pagerSlider pagerVertical">
                                    <div class="b-detail__main-info-images-small" id="bx-pager">
                                        <?php $i = 0; foreach(getCarPhotos($param) as $photo) { ?>
                                            <a href="#" data-slide-index="<?php echo $i; ?>" class="b-detail__main-info-images-small-one">
                                                <img class="img-responsive" src="<?php echo $base ?>images/cars/<?php echo $photo["photo"] ?>" alt="<?php echo $carD["title"] ?>" />
                                            </a>
                                        <?php $i++; } ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="b-detail__main-info-characteristics wow zoomInUp" data-wow-delay="0.5s">
                            <div class="b-detail__main-info-characteristics-one">
                                <div class="b-detail__main-info-characteristics-one-top">
                                    <div><span class="fa fa-car"></span></div>
                                    <p><?php echo $carD["hire"] ?></p>
                                </div>
                                <div class="b-detail__main-info-characteristics-one-bottom">
                                    Taksit Sayısı
                                </div>
                            </div>
                            <div class="b-detail__main-info-characteristics-one">
                                <div class="b-detail__main-info-characteristics-one-top">
                                    <div><span class="fa fa-trophy"></span></div>
                                    <p><?php echo $carD["km"] ?></p>
                                </div>
                                <div class="b-detail__main-info-characteristics-one-bottom">
                                    Kilometre
                                </div>
                            </div>
                            <div class="b-detail__main-info-characteristics-one">
                                <div class="b-detail__main-info-characteristics-one-top">
                                    <div><span class="fa fa-at"></span></div>
                                    <p><?php echo mb_substr($carD["transmission"], 0 ,15, "UTF-8") ?></p>
                                </div>
                                <div class="b-detail__main-info-characteristics-one-bottom">
                                    Vites
                                </div>
                            </div>
                            <div class="b-detail__main-info-characteristics-one">
                                <div class="b-detail__main-info-characteristics-one-top">
                                    <div><span class="fa fa-car"></span></div>
                                    <p><?php echo $carD["vrs"] ?></p>
                                </div>
                                <div class="b-detail__main-info-characteristics-one-bottom">
                                    Versiyon
                                </div>
                            </div>
                            <div class="b-detail__main-info-characteristics-one">
                                <div class="b-detail__main-info-characteristics-one-top">
                                    <div><span class="fa fa-user"></span></div>
                                    <p><?php echo $carD["pass"] ?></p>
                                </div>
                                <div class="b-detail__main-info-characteristics-one-bottom">
                                    Yolcu
                                </div>
                            </div>
                            <div class="b-detail__main-info-characteristics-one">
                                <div class="b-detail__main-info-characteristics-one-top">
                                    <div><span class="fa fa-fire-extinguisher"></span></div>
                                    <p><?php echo $carD["city"] ?>L</p>
                                </div>
                                <div class="b-detail__main-info-characteristics-one-bottom">
                                    Şehir İçi
                                </div>
                            </div>
                            <div class="b-detail__main-info-characteristics-one">
                                <div class="b-detail__main-info-characteristics-one-top">
                                    <div><span class="fa fa-fire-extinguisher"></span></div>
                                    <p><?php echo $carD["outcons"] ?>L</p>
                                </div>
                                <div class="b-detail__main-info-characteristics-one-bottom">
                                    Şehir Dışı
                                </div>
                            </div>
                        </div>
                        <div class="b-detail__main-info-text wow zoomInUp" data-wow-delay="0.5s">
                            <div class="b-detail__main-aside-about-form-links">
                                <a href="#" class="j-tab m-active s-lineDownCenter" data-to='#info1'>İlan Bilgisi</a>
                            </div>
                            <div id="info1">
                                <?php echo $carD["descrip"]; ?>
                            </div>
                        </div>
                        <!--<div class="b-detail__main-info-extra wow zoomInUp" data-wow-delay="0.5s">
                            <h2 class="s-titleDet">EXTRA FEATURES</h2>
                            <div class="row">
                                <div class="col-xs-4">
                                    <ul>
                                        <li><span class="fa fa-check"></span>Security System</li>
                                        <li><span class="fa fa-check"></span>Air Conditioning</li>
                                        <li><span class="fa fa-check"></span>Alloy Wheels</li>
                                        <li><span class="fa fa-check"></span>Anti-Lock Brakes (ABS)</li>
                                        <li><span class="fa fa-check"></span>Anti-Theft</li>
                                        <li><span class="fa fa-check"></span>Anti-Starter</li>
                                    </ul>
                                </div>
                                <div class="col-xs-4">
                                    <ul>
                                        <li><span class="fa fa-check"></span>Dual Airbag</li>
                                        <li><span class="fa fa-check"></span>Intermittent Wipers</li>
                                        <li><span class="fa fa-check"></span>Keyless Entry</li>
                                        <li><span class="fa fa-check"></span>Power Mirrors</li>
                                        <li><span class="fa fa-check"></span>Power Seat</li>
                                        <li><span class="fa fa-check"></span>Power Steering</li>
                                    </ul>
                                </div>
                                <div class="col-xs-4">
                                    <ul>
                                        <li><span class="fa fa-check"></span>CD Player</li>
                                        <li><span class="fa fa-check"></span>Driver Side Airbag</li>
                                        <li><span class="fa fa-check"></span>Power Windows</li>
                                        <li><span class="fa fa-check"></span>Remote Start</li>
                                    </ul>
                                </div>
                            </div>
                        </div>-->
                    </div>
                </div>
                <div class="col-md-4 col-xs-12">
                    <aside class="b-detail__main-aside">
                        <div class="b-detail__main-aside-desc wow zoomInUp" data-wow-delay="0.5s">
                            <h2 class="s-titleDet">ÖZELLİKLER</h2>
                            <div class="row">
                                <div class="col-xs-6">
                                    <h4 class="b-detail__main-aside-desc-title">Marka</h4>
                                </div>
                                <div class="col-xs-6">
                                    <p class="b-detail__main-aside-desc-value"><?php echo $carD["mfc"] ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <h4 class="b-detail__main-aside-desc-title">Model</h4>
                                </div>
                                <div class="col-xs-6">
                                    <p class="b-detail__main-aside-desc-value"><?php echo $carD["mdl"] ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <h4 class="b-detail__main-aside-desc-title">Kilometre</h4>
                                </div>
                                <div class="col-xs-6">
                                    <p class="b-detail__main-aside-desc-value"><?php echo priceWriter($carD["km"]) ?> km</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <h4 class="b-detail__main-aside-desc-title">Tip</h4>
                                </div>
                                <div class="col-xs-6">
                                    <p class="b-detail__main-aside-desc-value"><?php echo $carD["type"] ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <h4 class="b-detail__main-aside-desc-title">Versiyon</h4>
                                </div>
                                <div class="col-xs-6">
                                    <p class="b-detail__main-aside-desc-value"><?php echo $carD["vrs"] ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <h4 class="b-detail__main-aside-desc-title">Motor</h4>
                                </div>
                                <div class="col-xs-6">
                                    <p class="b-detail__main-aside-desc-value"><?php echo $carD["engine"] ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <h4 class="b-detail__main-aside-desc-title">Vites</h4>
                                </div>
                                <div class="col-xs-6">
                                    <p class="b-detail__main-aside-desc-value"><?php echo $carD["transmission"] ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <h4 class="b-detail__main-aside-desc-title">Dış Renk - Kaplama</h4>
                                </div>
                                <div class="col-xs-6">
                                    <p class="b-detail__main-aside-desc-value"><?php echo $carD["coloro"] ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <h4 class="b-detail__main-aside-desc-title">İç Renk - Döşeme</h4>
                                </div>
                                <div class="col-xs-6">
                                    <p class="b-detail__main-aside-desc-value"><?php echo $carD["colori"] ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <h4 class="b-detail__main-aside-desc-title">Yolcu/Kapı</h4>
                                </div>
                                <div class="col-xs-6">
                                    <p class="b-detail__main-aside-desc-value"><?php echo $carD["pass"] ?> Yolcu / <?php echo $carD["door"] ?> Kapı</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <h4 class="b-detail__main-aside-desc-title">Yakıt Türü</h4>
                                </div>
                                <div class="col-xs-6">
                                    <p class="b-detail__main-aside-desc-value"><?php echo $carD["fuel"] ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <h4 class="b-detail__main-aside-desc-title">Şehir İçi Yakıt tüketimi</h4>
                                </div>
                                <div class="col-xs-6">
                                    <p class="b-detail__main-aside-desc-value"><?php echo $carD["city"] ?>L/100km</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <h4 class="b-detail__main-aside-desc-title">Şehir Dışı Yakıt Tüketimi</h4>
                                </div>
                                <div class="col-xs-6">
                                    <p class="b-detail__main-aside-desc-value"><?php echo $carD["outcons"] ?>L/100km</p>
                                </div>
                            </div>
                        </div>
                        <div class="b-detail__main-aside-about wow zoomInUp" data-wow-delay="0.5s">
                            <h2 class="s-titleDet">Araç Hakkında Bilgi Alın</h2>
                            <div class="b-detail__main-aside-about-call">
                                <span class="fa fa-phone"></span>
                                <div>+90 <?php echo $carD["salesp"] ?></div>
                                <p>Satış danışmanımızdan 7/24 bilgi alabilirsiniz.</p>
                            </div>
                            <div class="b-detail__main-aside-about-seller">
                                <p>Danışman: <span><?php echo $carD["sales"] ?></span></p>
                            </div>
                            <!--<div class="b-detail__main-aside-about-form">
                                <div class="b-detail__main-aside-about-form-links">
                                    <a href="#" class="j-tab m-active s-lineDownCenter" data-to='#form1'>GENERAL INQUIRY</a>
                                    <a href="#" class="j-tab" data-to='#form2'>SCHEDULE TEST DRIVE</a>
                                </div>
                                <form id="form1" action="/" method="post">
                                    <input type="text" placeholder="YOUR NAME" value="" name="name" />
                                    <input type="email" placeholder="EMAIL ADDRESS" value="" name="email" />
                                    <input type="tel" placeholder="PHONE NO." value="" name="name" />
                                    <textarea name="text" placeholder="message"></textarea>
                                    <div><input type="checkbox" name="one" value="" /><label>Send me a copy of this message</label></div>
                                    <div><input type="checkbox" name="two" value="" /><label>Send me a copy of this message</label></div>
                                    <button type="submit" class="btn m-btn">SEND MESSAGE<span class="fa fa-angle-right"></span></button>
                                </form>
                                <form id="form2" action="/" method="post">
                                    <input type="text" placeholder="YOUR NAME" value="" name="name" />
                                    <textarea name="text" placeholder="message"></textarea>
                                    <div><input type="checkbox" name="one" value="" /><label>Send me a copy of this message</label></div>
                                    <div><input type="checkbox" name="two" value="" /><label>Send me a copy of this message</label></div>
                                    <button type="submit" class="btn m-btn">SEND MESSAGE<span class="fa fa-angle-right"></span></button>
                                </form>
                            </div>
                        </div>-->
                        <!--<div class="b-detail__main-aside-payment wow zoomInUp" data-wow-delay="0.5s">
                            <h2 class="s-titleDet">CAR PAYMENT CALCULATOR</h2>
                            <div class="b-detail__main-aside-payment-form">
                                <form action="/" method="post">
                                    <input type="text" placeholder="TOTAL VALUE/LOAN AMOUNT" value="" name="name" />
                                    <input type="text" placeholder="DOWN PAYMENT" value="" name="name" />
                                    <div class="s-relative">
                                        <select name="select" class="m-select">
                                            <option value="">LOAN TERM IN MONTHS</option>
                                        </select>
                                        <span class="fa fa-caret-down"></span>
                                    </div>
                                    <input type="text" placeholder="INTEREST RATE IN %" value="" name="name" />
                                    <button type="submit" class="btn m-btn">ESTIMATE PAYMENT<span class="fa fa-angle-right"></span></button>
                                </form>
                            </div>
                            <div class="b-detail__main-aside-about-call">
                                <span class="fa fa-calculator"></span>
                                <div>$250 <p>PER MONTH</p></div>
                                <p>Total Number of Payments: <span>50</span></p>
                            </div>
                        </div>-->
                    </aside>
                </div>
            </div>
        </div>
    </div>
</section><!--b-detail-->

<section class="b-related m-home">
    <?php $rndC = getRandomCars(); ?>
    <div class="container">
        <h5 class="s-titleBg wow zoomInUp" data-wow-delay="0.5s">DAHA FAZLA ARAÇ</h5><br />
        <h2 class="s-title wow zoomInUp" data-wow-delay="0.5s">Tavsiye Edilen Araçlar</h2>
        <div class="row">
            <?php foreach($rndC as $car) { ?>
            <div class="col-md-3 col-xs-6">
                <div class="b-auto__main-item wow zoomInLeft" data-wow-delay="0.5s">
                    <img class="img-responsive center-block" src="<?php echo $base ?>images/cars/<?php echo $car["photo"] ?>" alt="LandRover" />
                    <div class="b-world__item-val">
                        <span class="b-world__item-val-title"><span><?php echo $car["cy"] ?></span> Model</span>
                    </div>
                    <h2><a href="<?php echo $base ?>arabalar/detay/<?php echo $car["id"] ?>"><?php echo $car["title"] ?></a></h2>
                    <div class="b-auto__main-item-info s-lineDownLeft">
                        <span class="m-price" style="font-family: 'Roboto', sans-serif">
                            ₺ <?php echo priceWriter($car["price"]) ?>
                        </span>
                        <span class="m-number">
                            <span class="fa fa-tachometer"></span><?php echo priceWriter($car["km"]) ?> KM
                        </span>
                    </div>
                    <div class="b-featured__item-links m-auto">
                        <a href="#"><?php echo $car["hire"] ?></a>
                        <a href="#"><?php echo $car["cy"] ?></a>
                        <a href="#"><?php echo $car["transmission"] ?></a>
                        <a href="#"><?php echo $car["coloro"] ?></a>
                        <a href="#"><?php echo $car["fuel"] ?></a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section><!--"b-related-->

<section class="b-brands s-shadow">
    <div class="container">
        <!--<h5 class="s-titleBg wow zoomInUp" data-wow-delay="0.5s">FIND OUT MORE</h5><br />
        <h2 class="s-title wow zoomInUp" data-wow-delay="0.5s">BRANDS WE OFFER</h2>
        <div class="">
            <div class="b-brands__brand wow rotateIn" data-wow-delay="0.5s">
                <img src="media/brands/bmwLogo.png" alt="brand" />
            </div>
            <div class="b-brands__brand wow rotateIn" data-wow-delay="0.5s">
                <img src="media/brands/ferrariLogo.png" alt="brand" />
            </div>
            <div class="b-brands__brand wow rotateIn" data-wow-delay="0.5s">
                <img src="media/brands/volvo.png" alt="brand" />
            </div>
            <div class="b-brands__brand wow rotateIn" data-wow-delay="0.5s">
                <img src="media/brands/mercLogo.png" alt="brand" />
            </div>
            <div class="b-brands__brand wow rotateIn" data-wow-delay="0.5s">
                <img src="media/brands/audiLogo.png" alt="brand" />
            </div>
            <div class="b-brands__brand wow rotateIn" data-wow-delay="0.5s">
                <img src="media/brands/honda.png" alt="brand" />
            </div>
            <div class="b-brands__brand wow rotateIn" data-wow-delay="0.5s">
                <img src="media/brands/peugeot.png" alt="brand" />
            </div>
        </div>-->
    </div>
</section><!--b-brands-->