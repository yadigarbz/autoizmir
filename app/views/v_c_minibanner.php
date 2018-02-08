<?php
    $title = "Arabalar";
    switch ($p){
        case 'arabalar':
            if(isset($f) && $f == "detail") $title = getCarBasic($param)["title"];
            else $title = "Arabalar";
            break;
        case 'hakkimizda':
            $title = "Hakkımızda";
            break;
        default:
            $title = "Arabalar";
    }
?>
<section class="b-pageHeader">
    <div class="container">
        <h1 class=" wow zoomInLeft" data-wow-delay="0.5s"><?php echo $title ?></h1>
        <!--<div class="b-pageHeader__search wow zoomInRight" data-wow-delay="0.5s">
            <h3>Aramanıza ait <span style="font-weight: bold">28</span> sonuç bulundu.</h3>
        </div>-->
    </div>
</section>