<div class="b-info">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-xs-12">
                <aside class="b-info__aside wow zoomInLeft" data-wow-delay="0.3s">
                    <article class="b-info__aside-article">
                        <h3>Açılış Saatleri</h3>
                        <div class="b-info__aside-article-item">
                            <h6>Satış Departmanı</h6>
                            <p>Pzt - Cmt : 8:00 AM - 5:00 PM<span>&middot;</span>
                                Pazar kapalı</p>
                        </div>
                        <div class="b-info__aside-article-item">
                            <h6>Servis Hizmeti</h6>
                            <p>Pzt - Cmt : 8:00 AM - 5:00 PM<span>&middot;</span>
                                Pazar kapalı</p>
                        </div>
                    </article>
                    <article class="b-info__aside-article">
                        <h3>Hakkımızda</h3>
                        <p>Vestibulum varius od lio eget conseq
                            uat blandit, lorem auglue comm lodo
                            nisl non ultricies lectus nibh mas lsa
                            Duis scelerisque aliquet. Ante donec
                            libero pede porttitor dacu msan esct
                            venenatis quis.</p>
                    </article>
                </aside>
            </div>
            <div class="col-md-4 col-xs-12">
                <div class="b-info__latest">
                    <h3 class="wow slideInUp" data-wow-delay="0.3s">Son Eklenenler</h3>
                    <?php
                        $last = getLastAddedCars();
                        foreach($last as $item){
                    ?>
                        <div class="b-info__latest-article wow slideInUp" data-wow-delay="0.3s">
                            <div class="b-info__latest-article-photo m-audi" style="background:url(<?php echo $base ?>images/cars/<?php echo $item["photo"] ?>); background-size:cover; background-position:center center; background-repeat: no-repeat;"></div>
                            <div class="b-info__latest-article-info">
                                <h6><a href="<?php echo $base ?>arabalar/detay/<?php echo $item["id"] ?>"><?php echo $item["title"] ?></a></h6>
                                <div class="b-featured__item-links m-auto">
                                    <a href="#"><?php echo $item["hire"] ?></a>
                                    <a href="#"><?php echo $item["cy"] ?></a>
                                    <a href="#"><?php echo $item["transmission"] ?></a>
                                    <a href="#"><?php echo $item["coloro"] ?></a>
                                    <a href="#"><?php echo $item["fuel"] ?></a>
                                </div>
                                <p><span class="fa fa-tachometer"></span> <?php echo priceWriter($item["km"]) ?> KM</p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-md-4 col-xs-12">
                <address class="b-info__contacts wow slideInUp" data-wow-delay="0.3s">
                    <p>İLETİŞİM </p>
                    <div class="b-info__contacts-item">
                        <span class="fa fa-map-marker"></span>
                        <em>202 W 7th St, Suite 233 Los Angeles,<br />
                            California 90014 USA</em>
                    </div>
                    <div class="b-info__contacts-item">
                        <span class="fa fa-phone"></span>
                        <em>Telefon:  0-800- 624-5462</em>
                    </div>
                    <div class="b-info__contacts-item">
                        <span class="fa fa-fax"></span>
                        <em>FAX:  0-800- 624-5462</em>
                    </div>
                    <div class="b-info__contacts-item">
                        <span class="fa fa-envelope"></span>
                        <em>Email:  info@autoizmir.com</em>
                    </div>
                </address>
                <address class="b-info__map">
                    <a href="<?php echo $base."iletisim.html" ?>">Harita Konumunu Göster</a>
                </address>
            </div>
        </div>
    </div>
</div><!--b-info-->