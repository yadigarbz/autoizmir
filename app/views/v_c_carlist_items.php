<div class="col-lg-9 col-sm-8 col-xs-12">
    <div class="b-items__cars">
        <?php foreach(getPageCars($page) as $row ) { ?>
            <div class="b-items__cars-one wow zoomInUp" data-wow-delay="0.5s">
            <div class="b-items__cars-one-img">
                <img style="height:100%" src="<?php echo $base; ?>images/cars/<?php echo getCarMainPhoto($row["id"])["photo"]; ?>" alt=''/>
                <?php if($row["credit"]) { ?><span class="b-items__cars-one-img-type m-premium">KREDİ FIRSATI</span> <?php } ?>
            </div>
            <div class="b-items__cars-one-info">
                <form class="b-items__cars-one-info-header s-lineDownLeft">
                    <h2><?php echo $row["title"] ?></h2>
                    <input type="checkbox" name="check1" id='check1'/>
                    <label for="check1" class="b-items__cars-one-img-check"><span class="fa fa-check"></span></label>
                </form>
                <div class="row s-noRightMargin">
                    <div class="col-md-9 col-xs-12">
                        <p><?php echo $row["sub"] ?></p>
                        <div class="m-width row m-smallPadding">
                            <div class="col-xs-6">
                                <div class="row m-smallPadding">
                                    <div class="col-xs-6">
                                        <span class="b-items__cars-one-info-title">Araç Tipi:</span>
                                        <span class="b-items__cars-one-info-title">Kilometre:</span>
                                        <span class="b-items__cars-one-info-title">Vites:</span>
                                    </div>
                                    <div class="col-xs-6">
                                        <span class="b-items__cars-one-info-value"><?php echo $row["type"] ?></span>
                                        <span class="b-items__cars-one-info-value"><?php echo $row["km"] ?> KM</span>
                                        <span class="b-items__cars-one-info-value"><?php echo $row["transmission"] ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="row m-smallPadding">
                                    <div class="col-xs-4">
                                        <span class="b-items__cars-one-info-title">Motor:</span>
                                        <span class="b-items__cars-one-info-title">Renk:</span>
                                        <span class="b-items__cars-one-info-title">Specs:</span>
                                    </div>
                                    <div class="col-xs-8">
                                        <span class="b-items__cars-one-info-value"><?php echo $row["engine"] ?></span>
                                        <span class="b-items__cars-one-info-value"><?php echo $row["color"] ?></span>
                                        <span class="b-items__cars-one-info-value"><?php echo $row["pass"] ?>-Yolcu, <?php echo $row["door"] ?>-Kapı</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-12">
                        <div class="b-items__cars-one-info-price">
                            <div class="pull-right">
                                <h3>Fiyat:</h3>
                                <h4 style="font-family: 'Roboto', sans-serif;">₺<?php echo priceWriter($row["price"]) ?></h4>
                            </div>
                            <a href="<?php echo $base ?>arabalar/detay/<?php echo $row["id"] ?>" class="btn m-btn">DETAYLARI GÖR<span class="fa fa-angle-right"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
    <?php
        $pages = getPages($allCars);
        if($pages["all"] > 1){
    ?>
    <div class="b-items__pagination wow zoomInUp" data-wow-delay="0.5s">

        <div class="b-items__pagination-main">
            <a href="#" class="m-left"><span class="fa fa-angle-left"></span></a>
            <?php for($i = 0; $i<$pages) ?>
            <span class="m-active"><a href="#">1</a></span>
            <span><a href="#">2</a></span>
            <span><a href="#">3</a></span>
            <span><a href="#">4</a></span>
            <a href="#" class="m-right"><span class="fa fa-angle-right"></span></a>
        </div>
    </div>
    <?php } ?>
</div>