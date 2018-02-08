<?php if(isset($param) && $param == "update") {
        if(isset($_POST["function"]) && $_POST["function"] == "update"){
            updateCar( $_POST );
        }
    } elseif(isset($param) && $param > 0) {
        $cData = getCar($param);
        $sData = getCarSpect($param);
    ?>
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title ">
                    İlan Düzenleme
                </h3>
            </div>
        </div>
    </div>
    <div class="m-content">
        <div class="row">
            <div class="col-xl-3 col-lg-4">
                <div class="m-portlet  ">
                    <div class="m-portlet__body">
                        <div class="m-card-profile">
                            <div class="m-card-profile__title m--hide">
                                Your Profile
                            </div>
                            <div class="m-card-profile__pic">
                                <div class="m-card-profile__pic-wrapper">
                                    <img height="100" src="<?php echo $base ?>../images/cars/<?php echo getCarMainPhoto($param)["photo"] ?>" alt=""/>
                                </div>
                            </div>
                            <div class="m-card-profile__details">
                                <span class="m-card-profile__name">
                                    <?php echo $cData["title"] ?>
                                </span>
                            </div>
                        </div>
                        <ul class="m-nav m-nav--hover-bg m-portlet-fit--sides">
                            <li class="m-nav__separator m-nav__separator--fit"></li>
                            <li class="m-nav__section m--hide">
                                <span class="m-nav__section-text">
                                    Section
                                </span>
                            </li>
                            <li class="m-nav__item">
                                <a class="m-nav__link" style="height:auto">
                                    <i class="m-nav__link-icon flaticon-coins"></i>
                                    <span class="m-nav__link-title">
                                        <span class="m-nav__link-wrap">
                                            <span class="m-nav__link-text">
                                                <?php echo $cData["price"] ?>
                                            </span>
                                        </span>
                                    </span>
                                </a>
                            </li>
                            <li class="m-nav__item">
                                <a class="m-nav__link" style="height:auto">
                                    <i class="m-nav__link-icon flaticon-share"></i>
                                    <span class="m-nav__link-text">
                                        <?php echo $sData["type"] ?>
                                    </span>
                                </a>
                            </li>
                            <li class="m-nav__item">
                                <a class="m-nav__link" style="height:auto">
                                    <i class="m-nav__link-icon flaticon-chat-1"></i>
                                    <span class="m-nav__link-text">
                                        <?php echo $sData["mfc"] ?>
                                    </span>
                                </a>
                            </li>
                            <li class="m-nav__item">
                                <a class="m-nav__link" style="height:auto">
                                    <i class="m-nav__link-icon flaticon-graphic-2"></i>
                                    <span class="m-nav__link-text">
                                        <?php echo $sData["mdl"] ?>
                                    </span>
                                </a>
                            </li>
                            <li class="m-nav__item">
                                <a class="m-nav__link" style="height:auto">
                                    <i class="m-nav__link-icon flaticon-time-3"></i>
                                    <span class="m-nav__link-text">
                                        <?php echo $cData["cy"] ?>
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <div class="m-portlet__body-separator"></div>
                        <div class="m-widget1 m-widget1--paddingless">
                            <div class="m-widget1__item">
                                <div class="row m-row--no-padding align-items-center">
                                    <div class="col">
                                        <h3 class="m-widget1__title">
                                            Maksimum Taksit Sayısı
                                        </h3>
                                    </div>
                                    <div class="col m--align-right">
                                        <span class="m-widget1__number m--font-brand">
                                            <?php echo $cData["hire"] ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="m-widget1__item">
                                <div class="row m-row--no-padding align-items-center">
                                    <div class="col">
                                        <h3 class="m-widget1__title">
                                            Peşinat
                                        </h3>
                                    </div>
                                    <div class="col m--align-right">
                                        <span class="m-widget1__number m--font-danger">
                                            <?php echo $cData["pay"] ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8">
                <div class="m-portlet m-portlet--tabs  ">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-tools">
                            <ul class="nav nav-tabs m-tabs m-tabs-line m-tabs-line--left m-tabs-line--primary" role="tablist">
                                <li class="nav-item m-tabs__item">
                                    <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_user_profile_tab_1" role="tab">
                                        <i class="flaticon-share m--hide"></i>
                                        İlan Bilgileri
                                    </a>
                                </li>
                                <li class="nav-item m-tabs__item">
                                    <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_2" role="tab">
                                        Fotoğraflar
                                    </a>
                                </li>
                                <!--<li class="nav-item m-tabs__item">
                                    <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_3" role="tab">
                                        Settings
                                    </a>
                                </li>-->
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active" id="m_user_profile_tab_1">
                            <form class="m-form m-form--fit m-form--label-align-right" method="post" action="<?php echo $base ?>cars/car-edit/update">
                                <input type="hidden" name="function" value="update" />
                                <input type="hidden" name="car_id" value="<?php echo $param ?>" />
                                <div class="m-portlet__body">
                                    <div class="form-group m-form__group row">
                                        <div class="col-10">
                                            <h3 class="m-form__section">
                                                1. İlan Bilgileri
                                            </h3>
                                        </div>
                                    </div>

                                    <!-- Titles -->
                                    <div class="form-group m-form__group row">
                                        <div class="col-6">
                                            <label for="example-text-input">
                                                İlan Başlığı
                                            </label>
                                            <input value="<?php echo $cData["title"] ?>" class="form-control m-input car-title" name="title" maxlength="120" type="text" placeholder="İlan başlığı girin (Zorunlu Alan)">
                                        </div>
                                        <div class="col-6">
                                            <label for="example-text-input">
                                                İlan Kısa Metin
                                            </label>
                                            <input value="<?php echo $cData["sub"] ?>"  class="form-control m-input car-sub" name="sub" maxlength="150" type="text" placeholder="İlan kısa metni girin (Zorunlu Alan)">
                                        </div>
                                    </div>
                                    <!-- Price / KM -->
                                    <div class="form-group m-form__group row">
                                        <div class="col-6">
                                            <label for="example-text-input">
                                                Fiyat
                                            </label>
                                            <div class="input-group m-input-group m-input-group--square">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        ₺
                                                    </span>
                                                </div>
                                                <input value="<?php echo $cData["price"] ?>"  type="text" class="form-control m-input car-price" name="price" placeholder="İlan fiyatı girin (Zorunlu Alan)" aria-describedby="basic-addon1">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label for="example-text-input">
                                                Araç kilometresi
                                            </label>
                                            <div class="m-input-icon m-input-icon--left">
                                                <input value="<?php echo $cData["km"] ?>"  type="text" class="form-control m-input car-km" name="kilometer" placeholder="Araç kilometresi girin (Girilmezse 0 Olarak Alınır)">
                                                <span class="m-input-icon__icon m-input-icon__icon--left">
                                                    <span>
                                                        <i class="fa fa-tachometer"></i>
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Payment / Hire -->
                                    <div class="form-group m-form__group row">
                                        <div class="col-6">
                                            <label for="example-text-input">
                                                Peşinat Fiyatı
                                            </label>
                                            <div class="input-group m-input-group m-input-group--square">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        ₺
                                                    </span>
                                                </div>
                                                <input value="<?php echo $cData["pay"] ?>"  type="text" class="form-control m-input car-pay" name="payment" placeholder="Satışta İstenilen Peşinatı Girin (0 Girilirse Görüntülenmez)" aria-describedby="basic-addon1">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label for="example-text-input">
                                                Taksit Sayısı
                                            </label>
                                            <div class="m-input-icon m-input-icon--left">
                                                <input value="<?php echo $cData["hire"] ?>"  type="text" class="form-control m-input car-hire" name="hire" placeholder="Maksimum taksit sayısını girin (Zorunlu Alan)">
                                                <span class="m-input-icon__icon m-input-icon__icon--left">
                                                    <span>
                                                        <i class="fa fa-bars"></i>
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Credit / Year -->
                                    <div class="form-group m-form__group row">
                                        <div class="col-6">
                                            <label>
                                                Kredi İmkanı
                                            </label>
                                            <label class="m-checkbox col-12">
                                                <input <?php echo $cData["credit"] ? "checked" : "" ?> type="checkbox" class="car-credit" name="credit">
                                                Kredi İmkanı Vardır.
                                                <span></span>
                                            </label>
                                        </div>
                                        <div class="col-6">
                                            <label for="example-text-input">
                                                Araç Yılı ( 1900 ile 2040 arası girilebilir )
                                            </label>
                                            <div class="m-input-icon m-input-icon--left">
                                                <input value="<?php echo $cData["cy"] ?>" type="text" class="form-control m-input car-year" name="year" placeholder="Araç üretim yılı girin ( Zorunlu Alan )">
                                                <span class="m-input-icon__icon m-input-icon__icon--left">
                                                    <span>
                                                        <i class="fa fa-calendar-check-o"></i>
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>

                                    <div class="form-group m-form__group row">
                                        <div class="col-10">
                                            <h3 class="m-form__section">
                                                2. Araç Bilgileri
                                            </h3>
                                        </div>
                                    </div>

                                    <div class="form-group m-form__group row">
                                        <div class="col-6">
                                            <label>
                                                Araç Tipi
                                            </label>
                                            <select class="form-control m-input m-input--square car-type" name="type">
                                                <option value="0" disabled> Araç Tipi Seçin ( Zorunlu ) </option>
                                                <?php foreach(getCarTypes() as $row) {
                                                    if ($row["id"] == $cData["typ"]) {
                                                        ?>
                                                        <option value="<?php echo $row["id"] ?>" selected ><?php echo $row["name"] ?></option>
                                                    <?php } else { ?>
                                                        <option value="<?php echo $row["id"] ?>"><?php echo $row["name"] ?></option>
                                                    <?php }
                                                }?>
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <label>
                                                Araç Markası
                                            </label>
                                            <select class="form-control m-input m-input--square car-mfc" name="mfc">
                                                <option value="0" disabled > Araç Markası Seçin ( Zorunlu ) </option>
                                                <?php foreach(getCarMfcs() as $row) {
                                                    if ($row["id"] == $cData["mfc"]) {
                                                        ?>
                                                        <option value="<?php echo $row["id"] ?>" selected><?php echo $row["name"] ?></option>
                                                    <?php } else { ?>
                                                        <option value="<?php echo $row["id"] ?>"><?php echo $row["name"] ?></option>
                                                    <?php }
                                                }?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group m-form__group row">
                                        <div class="col-6">
                                            <label>
                                                Araç Modeli
                                            </label>
                                            <select class="form-control m-input m-input--square car-mdl" name="mdl">
                                                <option value="0" disabled > Araç Modeli Seçin ( Zorunlu ) </option>
                                                <?php foreach(getCarMdlByMfc($cData["mfc"]) as $row) {
                                                    if ($row["id"] == $cData["mdl"]) {
                                                        ?>
                                                        <option value="<?php echo $row["id"] ?>" selected ><?php echo $row["name"] ?></option>
                                                    <?php } else { ?>
                                                        <option value="<?php echo $row["id"] ?>"><?php echo $row["name"] ?></option>
                                                    <?php }
                                                }?>
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <label>
                                                Araç Versiyonu
                                            </label>
                                            <select class="form-control m-input m-input--square car-vrs" name="vrs">
                                                <option value="0" disabled > Araç Versiyonu Seçin ( Zorunlu ) </option>
                                                <?php foreach(getCarVrsByMdl($cData["mdl"]) as $row) {
                                                    if ($row["id"] == $cData["vrs"]) {
                                                        ?>
                                                        <option value="<?php echo $row["id"] ?>" selected ><?php echo $row["name"] ?></option>
                                                    <?php } else { ?>
                                                        <option value="<?php echo $row["id"] ?>"><?php echo $row["name"] ?></option>
                                                    <?php }
                                                }?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group m-form__group row">
                                        <div class="col-6">
                                            <label>
                                                Yakıt Tipi
                                            </label>
                                            <select class="form-control m-input m-input--square car-fuel" name="fuel">
                                                <option value="0" disabled > Yakıt Tipi Seçin ( Zorunlu ) </option>
                                                <?php foreach(getParamRes( "fuel_types" ) as $row) {
                                                    if ($row["id"] == $cData["fuel"]) {
                                                        ?>
                                                        <option value="<?php echo $row["id"] ?>" selected ><?php echo $row["name"] ?></option>
                                                    <?php } else { ?>
                                                        <option value="<?php echo $row["id"] ?>"><?php echo $row["name"] ?></option>
                                                    <?php }
                                                }?>
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <label>
                                                Motor Tipi
                                            </label>
                                            <select class="form-control m-input m-input--square car-engine" name="engine">
                                                <option value="0" disabled > Motor Tipi Seçin ( Zorunlu ) </option>
                                                <?php foreach(getParamRes( "engine_types" ) as $row)  {
                                                    if ($row["id"] == $cData["engine"]) {
                                                        ?>
                                                        <option value="<?php echo $row["id"] ?>" selected ><?php echo $row["name"] ?></option>
                                                    <?php } else { ?>
                                                        <option value="<?php echo $row["id"] ?>"><?php echo $row["name"] ?></option>
                                                    <?php }
                                                }?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group m-form__group row">
                                        <div class="col-6">
                                            <label>
                                                Vites Türü
                                            </label>
                                            <select class="form-control m-input m-input--square car-transmission" name="transmission">
                                                <option value="0" disabled > Vites Türü Seçin ( Zorunlu ) </option>
                                                <?php foreach(getParamRes( "tsms_types" ) as $row)  {
                                                    if ($row["id"] == $cData["trans"]) {
                                                        ?>
                                                        <option value="<?php echo $row["id"] ?>" selected ><?php echo $row["name"] ?></option>
                                                    <?php } else { ?>
                                                        <option value="<?php echo $row["id"] ?>"><?php echo $row["name"] ?></option>
                                                    <?php }
                                                }?>
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <label>
                                                İç Renk ( Döşeme Rengi )
                                            </label>
                                            <select class="form-control m-input m-input--square car-in-color" name="in-color">
                                                <option value="0" disabled > Döşeme Rengi Seçin ( Zorunlu ) </option>
                                                <?php foreach(getParamRes( "colors" ) as $row)  {
                                                    if ($row["id"] == $cData["inside_c"]) {
                                                        ?>
                                                        <option value="<?php echo $row["id"] ?>" selected ><?php echo $row["name"] ?></option>
                                                    <?php } else { ?>
                                                        <option value="<?php echo $row["id"] ?>"><?php echo $row["name"] ?></option>
                                                    <?php }
                                                }?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group m-form__group row">
                                        <div class="col-6">
                                            <label>
                                                Dış Renk ( Kaplama Rengi )
                                            </label>
                                            <select class="form-control m-input m-input--square car-out-color" name="out-color">
                                                <option value="0" disabled > Kaplama Rengi Seçin ( Zorunlu ) </option>
                                                <?php foreach(getParamRes( "colors" ) as $row)  {
                                                    if ($row["id"] == $cData["out_c"]) {
                                                        ?>
                                                        <option value="<?php echo $row["id"] ?>" selected ><?php echo $row["name"] ?></option>
                                                    <?php } else { ?>
                                                        <option value="<?php echo $row["id"] ?>"><?php echo $row["name"] ?></option>
                                                    <?php }
                                                }?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>

                                    <div class="form-group m-form__group row">
                                        <div class="col-10">
                                            <h3 class="m-form__section">
                                                3. Genel Bilgiler
                                            </h3>
                                        </div>
                                    </div>

                                    <div class="form-group m-form__group row">
                                        <div class="col-6">
                                            <label>
                                                Yolcu Sayısı
                                            </label>
                                            <input value="<?php echo $cData["passenger"] ?>" class="form-control m-input car-passenger" name="passenger" maxlength="120" type="text" placeholder="Kişi sayısı girin (Opsiyonel Alan)">
                                        </div>
                                        <div class="col-6">
                                            <label>
                                                Kapı Sayısı
                                            </label>
                                            <input value="<?php echo $cData["doors"] ?>" class="form-control m-input car-door" name="door" maxlength="150" type="text" placeholder="Kapı Sayısı girin (Opsiyonel Alan)">
                                        </div>
                                    </div>

                                    <div class="form-group m-form__group row">
                                        <div class="col-6">
                                            <label>
                                                Şehir İçi Yakıt Tüketimi
                                            </label>
                                            <div class="input-group m-input-group">
                                                <input value="<?php echo $cData["city"] ?>" type="text" class="form-control m-input car-cit-cons" name="city-cons" placeholder="Litre bazında girin (Opsiyonel Alan)" aria-describedby="basic-addon1">
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        / 100km
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label>
                                                Düz Yol Yakıt Tüketimi
                                            </label>
                                            <div class="input-group m-input-group">
                                                <input value="<?php echo $cData["outcon"] ?>" type="text" class="form-control m-input car-out-cons" name="out-cons" placeholder="Litre bazında girin (Opsiyonel Alan)" aria-describedby="basic-addon1">
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        / 100km
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group m-form__group row">
                                        <div class="col-6">
                                            <label>
                                                Satış Temsilcisi
                                            </label>
                                            <select class="form-control m-input m-input--square car-sales" name="sales">
                                                <option value="0" disabled > Temsilci bilgisi seçin( Zorunlu ) </option>
                                                <?php foreach(getParamRes( "sales" ) as $row){
                                                    if ($row["id"] == $cData["sales"]) {
                                                        ?>
                                                        <option value="<?php echo $row["id"] ?>" selected ><?php echo $row["name"] ?></option>
                                                    <?php } else { ?>
                                                        <option value="<?php echo $row["id"] ?>"><?php echo $row["name"] ?></option>
                                                    <?php }
                                                }?>
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <label>
                                                İlan Açıklaması (Word'den Kopyalanırsa Renk ve Kalınlıklar Aktarılır)
                                            </label>
                                            <textarea class="form-control m-input m-input--air car-desc" name="description" style="resize:none" rows="3"><?php echo $cData["descrip"] ?></textarea>
                                        </div>
                                    </div>

                                </div>
                                <div class="m-portlet__foot m-portlet__foot--fit">
                                    <div class="m-form__actions m--align-right">
                                        <div class="row">
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-accent m-btn m-btn--air add-car-submit m-btn--custom" disabled>
                                                    İlanı Kaydet
                                                </button>
                                                &nbsp;&nbsp;
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane " id="m_user_profile_tab_2">
                            <div class="m-portlet__body">
                                <style>
                                    .set-photo:hover, .add-photo:hover{
                                        background-color: rgba(0,0,0,0.2);
                                        opacity: 1 !important;
                                        color: #fff;
                                        transition: all 0.3s ease-in-out;
                                    }
                                    .add-photo:hover .top-hover, .set-photo:hover .top-hover{
                                        opacity: 1 !important;
                                        color: #fff;
                                        transition: all 0.3s ease-in-out;
                                    }
                                    .top-hover:hover{
                                        color:#f4da70 !important;
                                    }
                                </style>
                                <div class="col-12 row m--align-center">
                                <?php
                                    $i = 0;
                                    foreach(getCarPhotos($param) as $photo) {
                                        if($i != 0 && $i%3 == 0){
                                            echo "</div><div class=\"col-12 row m--align-center\">";
                                        }
                                    ?>
                                        <div class="col-3 m--align-center m--margin-5" style="height:200px; display:inline-block">
                                            <div class="set-photo col-12" href="#" style="display:table;border:1px solid rgb(230,230,230);width:100%;height:100%;text-decoration: none;color:#9f9f9f;background-size: contain;background-position: center center;background-repeat: no-repeat;background-image: url(<?php echo $base ?>../images/cars/<?php echo $photo["photo"] ?>);">
                                                <a style="display:table-cell; text-decoration: none" class="col-6 m--valign-middle <?php echo $photo["main"] ? "del-main": "do-main" ?>" data-target="<?php echo $photo["id"] ?>" href="#">
                                                    <i style="font-size:30px; opacity:0; transition: all 0.3s ease-in-out; <?php echo $photo["main"] ? "color:#00730a;": "" ?>" class="top-hover la <?php echo $photo["main"] ? "la-check": "la-home" ?>"></i>
                                                </a>
                                                <a style="display:table-cell; text-decoration: none" class="col-6 m--valign-middle del-photo" href="#" data-target="<?php echo $photo["id"] ?>">
                                                    <i style="font-size:30px; opacity:0; transition: all 0.3s ease-in-out;" class="top-hover la la-trash"></i>
                                                </a>
                                            </div>
                                        </div>
                                <?php $i++;
                                    } ?>
                                </div>
                                <div class="col-12 row m--align-center">

                                    <div class="col-3 m--align-center m--margin-5" style="height:200px;">
                                        <input name="new-photo" id="new-photo" type="file" style="display:none" />
                                        <a class="add-photo" href="#" style="display:table; width:100%; height:100%; border:1px solid rgb(230,230,230); text-decoration: none;color:#9f9f9f"><i style="font-size:30px;display:table-cell; vertical-align: middle" class=" top-hover la la-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane " id="m_user_profile_tab_3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>