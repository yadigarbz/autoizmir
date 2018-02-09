
<?php
if(isset($param) && $param == "add"){
    if(isset($_POST["function"]) && $_POST["function"] == "add"){
        echo "what";
        switch($f){
            case 'dizels':
                dizelAdd( $_POST );break;
        }
    }
}else if(isset($param) && $param == "update"){
    if(isset($_POST["function"]) && $_POST["function"] == "update"){
        switch($f){
            case 'dizels':
                dizelUpdate( $_POST );break;
        }
    }
}else if(isset($param) && $param == "delete"){
    if(isset($_GET["id"]) && $_GET["id"] > 0){
        switch($f){
            case 'dizels':
                dizelDelete( $_GET );break;
        }
    }
}
?>

<div class="m-grid__item m-grid__item--fluid m-wrapper">
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
                <?php if($f == "dizels") { ?>
                    <form class="m-form m-form--fit m-form--label-align-center" method="post" action="add">
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group row">
                                    <label class="col-form-label col-2">
                                        <?php echo $f == "vehicle_mdls" ? "Marka Seçin" : "İlan Seçin" ; ?>
                                    </label>
                                <div class="col-10">
                                    <input type="hidden" name="function" value="add">
                                    <select class="form-control m-input update-object add-mdl-mfc" name="mfcid">
                                            <option value="0" selected disabled> Lütfen ilan seçin </option>
                                            <?php foreach (getCars() as $row) { ?>

                                                <option value="<?php echo $row["id"] ?>">
                                                    <?php echo $row["name"] ?>
                                                </option>

                                            <?php } ?>
                                    </select>
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
                                    <script>
                                        $(document).ready(function () {
                                            var btn = $(".add-submit");
                                            var carSlct = $(".add-mdl-mfc");

                                            function isOk(){
                                                return carSlct.val() > 0;
                                            }

                                            carSlct.change(function () {
                                                if(isOk())
                                                    btn.attr("disabled", false);
                                                else
                                                    btn.attr("disabled", true);
                                            })

                                        })
                                    </script>
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
                <?php if($f == "dizels") { ?>
                    <form class="m-form m-form--fit m-form--label-align-center" action="update" method="post">
                        <input type="hidden" name="function" value="update">
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group row">
                                <div class="col-6">
                                    <label>
                                        Tanımlama Seçin
                                    </label>
                                    <select class="form-control m-input update--object" name="id">
                                        <option value="0" selected disabled> Lütfen değiştirmek isteiğiniz tanımlamayı seçin </option>
                                        <?php foreach($data as $row) { ?>
                                            <option value="<?php echo $row["id"] ?>">
                                                <?php echo $row["title"] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label>
                                        <?php echo $f == "vehicle_mdls" ? "Marka Seçin" : "İlan Seçin" ; ?>
                                    </label>
                                    <select class="form-control m-input update--sub" name="mfcid" disabled>
                                        <option value="0" selected disabled> Lütfen önce slider seçin </option>
                                    </select>
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
                                    <script>
                                        $(document).ready(function () {
                                            var upBtn = $(".update-submit");
                                            var upObj = $(".update--object");
                                            var upSlct = $(".update--sub");

                                            function isUpOk(){
                                               return upObj.val() && upSlct.val();
                                            }

                                            upObj.change(function () {
                                                if(upObj.val() > 0){
                                                    $.ajax("<?php echo $base ?>ajax/getcars/1",{
                                                        dataType: "json"
                                                    }).done(function (data) {
                                                        upSlct.children("option").remove();
                                                        upSlct.append("<option value='0' disabled selected> Lütfen Bir İlan Seçin </option>");
                                                        upSlct.attr("disabled", false);
                                                        $.each(data, function (index, data) {
                                                            upSlct.append("<option value='"+data.id+"'>"+data.title+"</option>");
                                                        });
                                                    }).always(function () {
                                                        if(isUpOk())
                                                            upBtn.attr("disabled", false);
                                                        else
                                                            upBtn.attr("disabled", true);
                                                    })
                                                }
                                            });

                                            upSlct.change(function () {
                                                if(isUpOk())
                                                    upBtn.attr("disabled", false);
                                                else
                                                    upBtn.attr("disabled", true);
                                            })

                                        })
                                    </script>
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
