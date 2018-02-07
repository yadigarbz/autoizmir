<?php if(isset($param) && $param == "add") {
        if(isset($_POST["function"]) && $_POST["function"] == "add"){
            echo "burda";
            addCar( $_POST );
        }else{
            echo "velet";
        }
    } else { ?>
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title ">
                    Yeni İlan Ekleme
                </h3>
            </div>
        </div>
    </div>
    <div class="m-content">
        <div class="m-portlet m-portlet--tabs">
            <div class="m-portlet__head">
                <div class="m-portlet__head-tools">
                    <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
                        <li class="nav-item m-tabs__item">
                            <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_user_profile_tab_1" role="tab">
                                <i class="flaticon-share m--hide"></i>
                                İlan Bilgileri
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-content">
            <div class="tab-pane active" id="m_user_profile_tab_1">
                <form class="m-form m-form--fit m-form--label-align-right" method="post" action="car-add/add">
                    <input type="hidden" name="function" value="add" />
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
                                <input class="form-control m-input car-title" name="title" maxlength="120" type="text" placeholder="İlan başlığı girin (Zorunlu Alan)">
                            </div>
                            <div class="col-6">
                                <label for="example-text-input">
                                    İlan Kısa Metin
                                </label>
                                <input class="form-control m-input car-sub" name="sub" maxlength="150" type="text" placeholder="İlan kısa metni girin (Zorunlu Alan)">
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
                                    <input type="text" class="form-control m-input car-price" name="price" placeholder="İlan fiyatı girin (Zorunlu Alan)" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="example-text-input">
                                    Araç kilometresi
                                </label>
                                <div class="m-input-icon m-input-icon--left">
                                    <input type="text" class="form-control m-input car-km" name="kilometer" placeholder="Araç kilometresi girin (Girilmezse 0 Olarak Alınır)">
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
                                    <input type="text" class="form-control m-input car-pay" name="payment" placeholder="Satışta İstenilen Peşinatı Girin (0 Girilirse Görüntülenmez)" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="example-text-input">
                                    Taksit Sayısı
                                </label>
                                <div class="m-input-icon m-input-icon--left">
                                    <input type="text" class="form-control m-input car-hire" name="hire" placeholder="Maksimum taksit sayısını girin (Zorunlu Alan)">
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
                                    <input type="checkbox" class="car-credit" name="credit">
                                    Kredi İmkanı Vardır.
                                    <span></span>
                                </label>
                            </div>
                            <div class="col-6">
                                <label for="example-text-input">
                                    Araç Yılı ( 1900 ile 2040 arası girilebilir )
                                </label>
                                <div class="m-input-icon m-input-icon--left">
                                    <input type="text" class="form-control m-input car-year" name="year" placeholder="Araç üretim yılı girin ( Zorunlu Alan )">
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
                                    <option value="0" disabled selected > Araç Tipi Seçin ( Zorunlu ) </option>
                                    <?php foreach(getCarTypes() as $row) { ?>
                                        <option value="<?php echo $row["id"] ?>"><?php echo $row["name"] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-6">
                                <label>
                                    Araç Markası
                                </label>
                                <select class="form-control m-input m-input--square car-mfc" name="mfc">
                                    <option value="0" disabled selected > Araç Markası Seçin ( Zorunlu ) </option>
                                    <?php foreach(getCarMfcs() as $row) { ?>
                                        <option value="<?php echo $row["id"] ?>"><?php echo $row["name"] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group m-form__group row">
                            <div class="col-6">
                                <label>
                                    Araç Modeli
                                </label>
                                <select class="form-control m-input m-input--square car-mdl" name="mdl" disabled>
                                    <option value="0" disabled selected > Lütfen Önce Marka Seçin ( Zorunlu ) </option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label>
                                    Araç Versiyonu
                                </label>
                                <select class="form-control m-input m-input--square car-vrs" name="vrs" disabled>
                                    <option value="0" disabled selected > Lütfen Önce Model Seçin ( Zorunlu ) </option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group m-form__group row">
                            <div class="col-6">
                                <label>
                                    Yakıt Tipi
                                </label>
                                <select class="form-control m-input m-input--square car-fuel" name="fuel">
                                    <option value="0" disabled selected > Yakıt Tipi Seçin ( Zorunlu ) </option>
                                    <?php foreach(getParamRes( "fuel_types" ) as $row) { ?>
                                        <option value="<?php echo $row["id"] ?>"><?php echo $row["name"] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-6">
                                <label>
                                    Motor Tipi
                                </label>
                                <select class="form-control m-input m-input--square car-engine" name="engine">
                                    <option value="0" disabled selected > Motor Tipi Seçin ( Zorunlu ) </option>
                                    <?php foreach(getParamRes( "engine_types" ) as $row) { ?>
                                        <option value="<?php echo $row["id"] ?>"><?php echo $row["name"] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group m-form__group row">
                            <div class="col-6">
                                <label>
                                    Vites Türü
                                </label>
                                <select class="form-control m-input m-input--square car-transmission" name="transmission">
                                    <option value="0" disabled selected > Vites Türü Seçin ( Zorunlu ) </option>
                                    <?php foreach(getParamRes( "tsms_types" ) as $row) { ?>
                                        <option value="<?php echo $row["id"] ?>"><?php echo $row["name"] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-6">
                                <label>
                                    İç Renk ( Döşeme Rengi )
                                </label>
                                <select class="form-control m-input m-input--square car-in-color" name="in-color">
                                    <option value="0" disabled selected > Döşeme Rengi Seçin ( Zorunlu ) </option>
                                    <?php foreach(getParamRes( "colors" ) as $row) { ?>
                                        <option value="<?php echo $row["id"] ?>"><?php echo $row["name"] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group m-form__group row">
                            <div class="col-6">
                                <label>
                                    Dış Renk ( Kaplama Rengi )
                                </label>
                                <select class="form-control m-input m-input--square car-out-color" name="out-color">
                                    <option value="0" disabled selected > Kaplama Rengi Seçin ( Zorunlu ) </option>
                                    <?php foreach(getParamRes( "colors" ) as $row) { ?>
                                        <option value="<?php echo $row["id"] ?>"><?php echo $row["name"] ?></option>
                                    <?php } ?>
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
                                <input class="form-control m-input car-passenger" name="passenger" maxlength="120" type="text" placeholder="Kişi sayısı girin (Opsiyonel Alan)">
                            </div>
                            <div class="col-6">
                                <label>
                                    Kapı Sayısı
                                </label>
                                <input class="form-control m-input car-door" name="door" maxlength="150" type="text" placeholder="Kapı Sayısı girin (Opsiyonel Alan)">
                            </div>
                        </div>

                        <div class="form-group m-form__group row">
                            <div class="col-6">
                                <label>
                                    Şehir İçi Yakıt Tüketimi
                                </label>
                                <div class="input-group m-input-group">
                                    <input type="text" class="form-control m-input car-cit-cons" name="city-cons" placeholder="Litre bazında girin (Opsiyonel Alan)" aria-describedby="basic-addon1">
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
                                    <input type="text" class="form-control m-input car-out-cons" name="out-cons" placeholder="Litre bazında girin (Opsiyonel Alan)" aria-describedby="basic-addon1">
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
                                    <option value="0" disabled selected > Temsilci bilgisi seçin( Zorunlu ) </option>
                                    <?php foreach(getParamRes( "colors" ) as $row) { ?>
                                        <option value="<?php echo $row["id"] ?>"><?php echo $row["name"] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-6">
                                <label>
                                    İlan Açıklaması (Word'den Kopyalanırsa Renk ve Kalınlıklar Aktarılır)
                                </label>
                                <textarea class="form-control m-input m-input--air car-desc" name="description" style="resize:none" rows="3"></textarea>
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
            <div class="tab-pane " id="m_user_profile_tab_2"></div>
            <div class="tab-pane " id="m_user_profile_tab_3"></div>
        </div>
        </div>
    </div>
</div>
<?php } ?>