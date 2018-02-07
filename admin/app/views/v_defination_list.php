
<?php
    if(isset($param) && $param == "add"){
        if(isset($_POST["function"]) && $_POST["function"] == "add"){
            switch($f){
                case 'vehicle_types':
                    vehicleTypeAdd( $_POST );break;
                case 'vehicle_mfcs':
                    carMfcAdd( $_POST );break;
                case 'vehicle_mdls':
                    carMdlAdd( $_POST );break;
                case 'vehicle_vrss':
                    carVrsAdd( $_POST );break;
                case 'fuel_types':
                    paramResAdd( $_POST, $f );break;
                case 'engine_types':
                    paramResAdd( $_POST, $f );break;
                case 'tsms_types':
                    paramResAdd( $_POST, $f );break;
                case 'colors':
                    paramResAdd( $_POST, $f );break;
            }
        }
    }else if(isset($param) && $param == "update"){
        if(isset($_POST["function"]) && $_POST["function"] == "update"){
            switch($f){
                case 'vehicle_types':
                    vehicleTypeUpdate( $_POST );break;
                case 'vehicle_mfcs':
                    carMfcUpdate( $_POST );break;
                case 'vehicle_mdls':
                    carMdlUpdate( $_POST);break;
                case 'vehicle_vrss':
                    carVrsUpdate( $_POST );break;
                case 'fuel_types':
                    paramResUpdate( $_POST, $f );break;
                case 'engine_types':
                    paramResUpdate( $_POST, $f );break;
                case 'tsms_types':
                    paramResUpdate( $_POST, $f );break;
                case 'colors':
                    paramResUpdate( $_POST, $f );break;
            }
        }
    }else if(isset($param) && $param == "delete"){
        if(isset($_GET["id"]) && $_GET["id"] > 0){
            switch($f){
                case 'vehicle_types':
                    vehicleTypeDelete( $_GET );break;
                case 'vehicle_mfcs':
                    carMfcDelete( $_GET );break;
                case 'vehicle_mdls':
                    carMdlDelete( $_GET );break;
                case 'vehicle_vrss':
                    carVrsDelete( $_GET );break;
                case 'fuel_types':
                    paramResDelete( $_GET, $f );break;
                case 'engine_types':
                    paramResDelete( $_GET, $f );break;
                case 'tsms_types':
                    paramResDelete( $_GET, $f );break;
                case 'colors':
                    paramResDelete( $_GET, $f );break;
            }
        }
    }
?>

<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <!--<div class="m-subheader">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--seperator">
                    Tanımlamalar
                </h3>
            </div>
        </div>
    </div>-->
    <div class="m-content">
        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            <?php if(isset($page["name"])) {
                                echo  $page["name"] . " Tanımlamaları";
                                ?>
                            <?php } else { ?>
                                Tanımlamalar
                            <?php } ?>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="m-portlet__body">
                <div class="m_datatable" id="local_data"></div>
            </div>
        </div>
    </div>
    <div class="m-content">
        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            <?php if(isset($page["name"])) {
                                echo "Yeni " . $page["name"] . " Tanımlama";
                                ?>
                            <?php } else { ?>
                                Yeni Tanımlama
                            <?php } ?>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="m-portlet__body">
                <?php if($f == "vehicle_vrss" || ($f == "vehicle_mdls")) { ?>
                    <form class="m-form m-form--fit m-form--label-align-center" method="post" action="add">
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group row">
                                <div class="col-6">
                                    <label>
                                        <?php echo $f == "vehicle_mdls" ? "Marka Seçin" : "Model Seçin" ; ?>
                                    </label>
                                    <select class="form-control m-input update-object add-mdl-mfc" name="mfcid">
                                        <?php
                                            if($f == "vehicle_mdls") { ?>
                                            <option value="0" selected disabled> Lütfen marka seçin </option>
                                                <?php foreach (getCarMfcs() as $row) { ?>

                                            <option value="<?php echo $row["id"] ?>">
                                                <?php echo $row["name"] ?>
                                            </option>

                                        <?php   }
                                            } elseif($f == "vehicle_vrss") { ?>
                                            <option value="0" selected disabled> Lütfen model seçin </option>
                                                <?php foreach(getCarMdls() as $row){ ?>

                                            <option value="<?php echo $row["id"] ?>">
                                                <?php echo $row["name"] ?>
                                            </option>

                                        <?php   }
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label for="example-text-input" >
                                        Tanımlama Adı
                                    </label>
                                    <input type="hidden" name="function" value="add">
                                    <input class="form-control m-input add-mdl-name" type="text" placeholder="Tanımlama Adı giriniz" name="type_name">
                                </div>
                            </div>
                        </div>
                        <div class="m-portlet__foot m-portlet__foot--fit">
                            <div class="m-form__actions">
                                <div class="row">
                                    <div class="col-2"></div>
                                    <div class="col-10 m--align-right">
                                        <button type="submit" class="btn btn-success add-submit" disabled>
                                            Ekle
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                <?php } else { ?>
                    <form class="m-form m-form--fit m-form--label-align-center" method="post" action="add">
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group row">
                                <label for="example-text-input" class="col-2 col-form-label">
                                    Tanımlama Adı
                                </label>
                                <div class="col-10">
                                    <input type="hidden" name="function" value="add">
                                    <input class="form-control m-input" type="text" placeholder="Tanımlama Adı giriniz" name="type_name">
                                </div>
                            </div>
                        </div>
                        <div class="m-portlet__foot m-portlet__foot--fit">
                            <div class="m-form__actions">
                                <div class="row">
                                    <div class="col-2"></div>
                                    <div class="col-10 m--align-right">
                                        <button type="submit" class="btn btn-success">
                                            Ekle
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="m-content">
        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            <?php if(isset($page["name"])) {
                                echo $page["name"] . " Güncelleme";
                                ?>
                            <?php } else { ?>
                                Tanımlama Güncelleme
                            <?php } ?>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="m-portlet__body">
                <?php if($f == "vehicle_vrss" || $f == "vehicle_mdls") { ?>
                    <form class="m-form m-form--fit m-form--label-align-center" action="update" method="post">
                        <input type="hidden" name="function" value="update">
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group row">
                                <div class="col-4">
                                    <label>
                                        Tanımlama Seçin
                                    </label>
                                    <select class="form-control m-input update--object" name="id">
                                        <option value="0" selected disabled> Lütfen değiştirmek isteiğiniz tanımlamayı seçin </option>
                                        <?php foreach($data as $row) { ?>
                                            <option value="<?php echo $row["id"] ?>">
                                                <?php echo $row["name"] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <label>
                                        <?php echo $f == "vehicle_mdls" ? "Marka Seçin" : "Model Seçin" ; ?>
                                    </label>
                                    <select class="form-control m-input update--sub" name="mfcid" disabled>
                                        <option value="0" selected disabled> Lütfen önce model seçin </option>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <label>
                                        Tanımlama Adı
                                    </label>
                                    <input class="form-control m-input update--name" type="text" name="value" placeholder="Yeni tanım adı girin" >
                                </div>
                            </div>
                        </div>
                        <div class="m-portlet__foot m-portlet__foot--fit">
                            <div class="m-form__actions">
                                <div class="row">
                                    <div class="col-10"></div>
                                    <div class="col-2 m--align-right">
                                        <button type="submit" class="btn btn-success update-submit" disabled="true">
                                            Güncelle
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                <?php } else { ?>
                    <form class="m-form m-form--fit m-form--label-align-center" action="update" method="post">
                        <input type="hidden" name="function" value="update">
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group row">
                                <div class="col-6">
                                    <label>
                                        Tanımlama Seçin
                                    </label>
                                    <select class="form-control m-input update-object" name="id">
                                        <option value="0" selected disabled> Lütfen değiştirmek isteiğiniz tanımlamayı seçin </option>
                                        <?php foreach($data as $row) { ?>
                                            <option value="<?php echo $row["id"] ?>">
                                                <?php echo $row["name"] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label>
                                        Tanımlama Adı
                                    </label>
                                    <input class="form-control m-input update-name" type="text" name="value" placeholder="Yeni tanım adı girin" >
                                </div>
                            </div>
                        </div>
                        <div class="m-portlet__foot m-portlet__foot--fit">
                            <div class="m-form__actions">
                                <div class="row">
                                    <div class="col-10"></div>
                                    <div class="col-2 m--align-right">
                                        <button type="submit" class="btn btn-success update-submit" disabled="true">
                                            Güncelle
                                        </button>
                                        <script>

                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                <?php } ?>

            </div>
        </div>
    </div>
</div>
