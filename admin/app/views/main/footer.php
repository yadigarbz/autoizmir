            </div>
            <?php if(isset($_SESSION["login"]) && $_SESSION["login"] && isset($_COOKIE["user"])) { ?>
        <footer class="m-grid__item		m-footer ">
        <div class="m-container m-container--fluid m-container--full-height m-page__container">
            <div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
                <div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
                                <span class="m-footer__copyright">
                                    2017 &copy; Metronic theme by
                                    <a href="https://keenthemes.com" class="m-link">
                                        Keenthemes
                                    </a>
                                </span>
                </div>
                <div class="m-stack__item m-stack__item--right m-stack__item--middle m-stack__item--first">
                    <ul class="m-footer__nav m-nav m-nav--inline m--pull-right">
                        <li class="m-nav__item">
                            <a href="#" class="m-nav__link">
                                            <span class="m-nav__link-text">
                                                About
                                            </span>
                            </a>
                        </li>
                        <li class="m-nav__item">
                            <a href="#"  class="m-nav__link">
                                            <span class="m-nav__link-text">
                                                Privacy
                                            </span>
                            </a>
                        </li>
                        <li class="m-nav__item">
                            <a href="#" class="m-nav__link">
                                            <span class="m-nav__link-text">
                                                T&C
                                            </span>
                            </a>
                        </li>
                        <li class="m-nav__item">
                            <a href="#" class="m-nav__link">
                                            <span class="m-nav__link-text">
                                                Purchase
                                            </span>
                            </a>
                        </li>
                        <li class="m-nav__item m-nav__item">
                            <a href="#" class="m-nav__link" data-toggle="m-tooltip" title="Support Center" data-placement="left">
                                <i class="m-nav__link-icon flaticon-info m--icon-font-size-lg3"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    </div>
    <div class="m-scroll-top m-scroll-top--skin-top" data-toggle="m-scroll-top" data-scroll-offset="500" data-scroll-speed="300">
        <i class="la la-arrow-up"></i>
    </div>
            <?php } ?>
    <script src="<?php echo $base ?>js/base/vendors.bundle.js" type="text/javascript"></script>
    <script src="<?php echo $base ?>js/base/scripts.bundle.js" type="text/javascript"></script>

    <?php if($p == "home"){ ?>
    <script src="<?php echo $base ?>js/base/dashboard.js" type="text/javascript"></script>
    <?php } ?>

    <?php if(isset($f) && ($f == "vehicle_mdls" || $f == "vehicle_vrss")) { ?>
        <script>
            $(document).ready(function(){
                function isAddMdlNameValid(){
                    var name = $(".add-mdl-name").val();
                    if(name.length > 0 && name[0] !== " ") return true;
                    else return false;
                }
                function isAddMdlMfcValid(){
                    if($(".add-mdl-mfc").val() > 0) return true;
                    else return false;
                }
                $(".add-mdl-mfc").change(function(){
                    if(isAddMdlNameValid() && isAddMdlMfcValid())
                        $(".add-submit").prop("disabled", false);
                    else
                        $(".add-submit").prop("disabled", true);
                });
                $(".add-mdl-name").on("keyup",function(){
                    if(isAddMdlNameValid() && isAddMdlMfcValid())
                        $(".add-submit").prop("disabled", false);
                    else
                        $(".add-submit").prop("disabled", true);
                });

                var upObject    = $(".update--object");
                var upSub       = $(".update--sub");
                var upName      = $(".update--name");

                <?php if($f == "vehicle_mdls") { ?>
                    upObject.change(function () {
                    if(upObject.val() > 0){
                        $.ajax("<?php echo $base ?>ajax/mdltomfc/"+upObject.val(),{
                            dataType: "json"
                        }).done(function(data){
                            upSub.children("option").remove();
                            upSub.append("<option value='0' selected disabled> Lütfen Bir Marka Seçin </option>");
                            upSub.attr("disabled", false);
                            $.each(data, function ( index, data ) {
                                var _appendObject = "";
                                if (parseInt(data.mdlid) == parseInt(upObject.val())){
                                    _appendObject = "<option value='" + data.id + "' selected >" + data.name + "</option>";
                                }else{
                                    _appendObject = "<option value='" + data.id + "' >" + data.name + "</option>";
                                }
                                upSub.append(_appendObject);
                            });
                            var upVal = $(".update--object option:selected").text();
                            upName.val(upVal.trim());
                        }).fail(function ( e, m ) {
                            console.log(m);
                        }).always(function () {
                            if(upSub.val() > 0 && upName.val().length > 0){
                                $(".update-submit").attr("disabled", false);
                            }else{
                                $(".update-submit").attr("disabled", true);
                            }
                        });
                    }
                });
                <?php } else { ?>
                    upObject.change(function () {
                    if(upObject.val() > 0){
                        $.ajax("<?php echo $base ?>ajax/vrstomdl/"+upObject.val(),{
                            dataType: "json"
                        }).done(function(data){
                            upSub.children("option").remove();
                            upSub.append("<option value='0' selected disabled> Lütfen Bir Model Seçin </option>");
                            upSub.attr("disabled", false);
                            $.each(data, function ( index, data ) {
                                var _appendObject = "";
                                if (parseInt(data.vrsid) == parseInt(upObject.val())){
                                    _appendObject = "<option value='" + data.id + "' selected >" + data.name + "</option>";
                                }else{
                                    _appendObject = "<option value='" + data.id + "' >" + data.name + "</option>";
                                }
                                upSub.append(_appendObject);
                            });
                            var upVal = $(".update--object option:selected").text();
                            upName.val(upVal.trim());
                        }).fail(function ( e, m ) {
                            console.log(m);
                        }).always(function () {
                            if(upSub.val() > 0 && upName.val().length > 0){
                                $(".update-submit").attr("disabled", false);
                            }else{
                                $(".update-submit").attr("disabled", true);
                            }
                        });
                    }
                })
                <?php } ?>
                upName.on("keyup", function(){
                    if(upObject.val() > 0 && upSub.val() > 0 && upName.val().length > 0){
                        $(".update-submit").attr("disabled", false);
                    }else{
                        $(".update-submit").attr("disabled", true);
                    }
                })

            })
        </script>
    <?php } ?>

    <?php
        if(isset($f) && $f == "list" || (isset($param) && $param == "list")){
            require_once $aBase."\../helpers/definationtable.php";
     ?>
        <script>
            $(document).ready(function(){

                function isUpdateNameValid(){
                    var name = $(".update-name").val();
                    if(name.length > 0 && name[0] !== " ") return true;
                    else return false;
                }

                function isUpdateObjectValid(){
                    if($(".update-object").val() > 0) return true;
                    else return false;
                }

                $(".update-object").change(function(){
                    if(isUpdateNameValid() && isUpdateObjectValid())
                        $(".update-submit").prop("disabled", false);
                    else
                        $(".update-submit").prop("disabled", true);
                });
                $(".update-name").on("keyup",function(){
                    if(isUpdateNameValid() && isUpdateObjectValid())
                        $(".update-submit").prop("disabled", false);
                    else
                        $(".update-submit").prop("disabled", true);
                });
            })
        </script>
    <?php } ?>

    <?php if(isset($f) && $f == "car-add") { ?>
        <script>
            $(document).ready(function () {

                var title   = $(".car-title");
                var sub     = $(".car-sub");
                var price   = $(".car-price");
                var km      = $(".car-km");
                var pay     = $(".car-pay");
                var hire    = $(".car-hire");
                var credit  = $(".car-credit");
                var year    = $(".car-year");

                var type    = $(".car-type");
                var mfc     = $(".car-mfc");
                var mdl     = $(".car-mdl");
                var vrs     = $(".car-vrs");
                var fuel    = $(".car-fuel");
                var engine  = $(".car-engine");
                var transmission = $(".car-transmission");
                var incolor = $(".car-in-color");
                var outcolor = $(".car-out-color");

                var passenger = $(".car-passenger");
                var door    = $(".car-door");
                var citycons = $(".car-city-cons");
                var outcons = $(".car-out-cons");
                var sales = $(".car-sales");
                var description = $(".car-desc");

                var btn     = $(".add-car-submit");

                function isNecessartAreasValid(){

                    var title   = $(".car-title");
                    var sub     = $(".car-sub");
                    var price   = $(".car-price");
                    var km      = $(".car-km");
                    var pay     = $(".car-pay");
                    var hire    = $(".car-hire");
                    var credit  = $(".car-credit");
                    var year    = $(".car-year");

                    var type    = $(".car-type");
                    var mfc     = $(".car-mfc");
                    var mdl     = $(".car-mdl");
                    var vrs     = $(".car-vrs");
                    var fuel    = $(".car-fuel");
                    var engine  = $(".car-engine");
                    var transmission = $(".car-transmission");
                    var incolor = $(".car-in-color");
                    var outcolor = $(".car-out-color");

                    var passenger = $(".car-passenger");
                    var door    = $(".car-door");
                    var citycons = $(".car-city-cons");
                    var outcons = $(".car-out-cons");
                    var sales = $(".car-sales");
                    var description = $(".car-desc");

                    if(title.val().length > 0){
                        if(sub.val().length > 0){
                            if(price.val().length > 0 && price.val() > 0) {
                                if (km.val().length > 0 && km.val() > 0) {
                                    if(hire.val().length > 0 && hire.val() > 0){
                                        if(year.val().length > 0 && year.val() > 1900 && year.val() < 2040) {

                                            if (type.val() > 0) {
                                                if (mfc.val() > 0) {
                                                    if (mdl.val() > 0) {
                                                        if (vrs.val() > 0) {
                                                            if (fuel.val() > 0) {
                                                                if (engine.val() > 0) {
                                                                    if (transmission.val() > 0) {
                                                                        if (incolor.val() > 0) {
                                                                            if (outcolor.val() > 0) {

                                                                                if (sales.val() > 0) {

                                                                                    return true;

                                                                                } else return false;

                                                                            } else return false;
                                                                        } else return false;
                                                                    } else return false;
                                                                } else return false;
                                                            } else return false;
                                                        } else return false;
                                                    } else return false;
                                                } else return false;
                                            } else return false;

                                        }else return false
                                    }else return false;
                                }else return false;
                            }else return false;
                        }else return false;
                    }else return false;

                }

                title.on("keyup", function () {
                    if(isNecessartAreasValid())
                        btn.attr("disabled",false);
                    else
                        btn.attr("disabled",true);
                });
                sub.on("keyup", function () {
                    if(isNecessartAreasValid())
                        btn.attr("disabled",false);
                    else
                        btn.attr("disabled",true);
                });
                price.on("keyup", function () {
                    if(isNecessartAreasValid())
                        btn.attr("disabled",false);
                    else
                        btn.attr("disabled",true);
                });
                km.on("keyup", function () {
                    if(isNecessartAreasValid())
                        btn.attr("disabled",false);
                    else
                        btn.attr("disabled",true);
                });
                hire.on("keyup", function () {
                    if(isNecessartAreasValid())
                        btn.attr("disabled",false);
                    else
                        btn.attr("disabled",true);
                });
                year.on("keyup", function () {
                    if(isNecessartAreasValid())
                        btn.attr("disabled",false);
                    else
                        btn.attr("disabled",true);
                });
                type.on("change", function () {
                    if(isNecessartAreasValid())
                        btn.attr("disabled",false);
                    else
                        btn.attr("disabled",true);
                });
                mfc.on("change", function () {

                    if(isNecessartAreasValid())
                        btn.attr("disabled",false);
                    else
                        btn.attr("disabled",true);

                    if(mfc.val() > 0){
                        $.ajax("<?php echo $base ?>ajax/mfctomdl/"+mfc.val(),{
                            dataType:"json"
                        }).done(function (data) {
                            mdl.children("option").remove();
                            mdl.append("<option value='0' selected disabled> Lütfen Model Seçin ( Zorunlu ) </option>");
                            mdl.attr("disabled", false);
                            $.each(data, function ( index, data) {
                                mdl.append("<option value='"+ data.id +"'>" + data.name + "</option>");
                            });
                        });
                    }

                });
                mdl.on("change", function () {

                    if(isNecessartAreasValid())
                        btn.attr("disabled",false);
                    else
                        btn.attr("disabled",true);

                    if(mdl.val() > 0){
                        $.ajax("<?php echo $base ?>ajax/mdltovrs/"+mdl.val(),{
                            dataType:"json"
                        }).done(function (data) {
                            vrs.children("option").remove();
                            vrs.append("<option value='0' selected disabled> Lütfen Versiyon Seçin ( Zorunlu ) </option>");
                            vrs.attr("disabled", false);
                            $.each(data, function ( index, data) {
                                vrs.append("<option value='"+ data.id +"'>" + data.name + "</option>");
                            });
                        });
                    }

                });
                vrs.on("change", function () {
                    if(isNecessartAreasValid())
                        btn.attr("disabled",false);
                    else
                        btn.attr("disabled",true);
                });
                fuel.on("change", function () {
                    if(isNecessartAreasValid())
                        btn.attr("disabled",false);
                    else
                        btn.attr("disabled",true);
                });
                engine.on("change", function () {
                    if(isNecessartAreasValid())
                        btn.attr("disabled",false);
                    else
                        btn.attr("disabled",true);
                });
                transmission.on("change", function () {
                    if(isNecessartAreasValid())
                        btn.attr("disabled",false);
                    else
                        btn.attr("disabled",true);
                });
                incolor.on("change", function () {
                    if(isNecessartAreasValid())
                        btn.attr("disabled",false);
                    else
                        btn.attr("disabled",true);
                })
                outcolor.on("change", function () {
                    if(isNecessartAreasValid())
                        btn.attr("disabled",false);
                    else
                        btn.attr("disabled",true);
                });
                sales.on("change", function () {
                    if(isNecessartAreasValid())
                        btn.attr("disabled",false);
                    else
                        btn.attr("disabled",true);
                });


            });
        </script>
    <?php } ?>

    <?php if(isset($f) && $f == "car-edit") { ?>
        <script>
            $(document).ready(function () {

                var title   = $(".car-title");
                var sub     = $(".car-sub");
                var price   = $(".car-price");
                var km      = $(".car-km");
                var pay     = $(".car-pay");
                var hire    = $(".car-hire");
                var credit  = $(".car-credit");
                var year    = $(".car-year");

                var type    = $(".car-type");
                var mfc     = $(".car-mfc");
                var mdl     = $(".car-mdl");
                var vrs     = $(".car-vrs");
                var fuel    = $(".car-fuel");
                var engine  = $(".car-engine");
                var transmission = $(".car-transmission");
                var incolor = $(".car-in-color");
                var outcolor = $(".car-out-color");

                var passenger = $(".car-passenger");
                var door    = $(".car-door");
                var citycons = $(".car-city-cons");
                var outcons = $(".car-out-cons");
                var sales = $(".car-sales");
                var description = $(".car-desc");

                var btn     = $(".add-car-submit");

                function isNecessartAreasValid(){

                    var title   = $(".car-title");
                    var sub     = $(".car-sub");
                    var price   = $(".car-price");
                    var km      = $(".car-km");
                    var pay     = $(".car-pay");
                    var hire    = $(".car-hire");
                    var credit  = $(".car-credit");
                    var year    = $(".car-year");

                    var type    = $(".car-type");
                    var mfc     = $(".car-mfc");
                    var mdl     = $(".car-mdl");
                    var vrs     = $(".car-vrs");
                    var fuel    = $(".car-fuel");
                    var engine  = $(".car-engine");
                    var transmission = $(".car-transmission");
                    var incolor = $(".car-in-color");
                    var outcolor = $(".car-out-color");

                    var passenger = $(".car-passenger");
                    var door    = $(".car-door");
                    var citycons = $(".car-city-cons");
                    var outcons = $(".car-out-cons");
                    var sales = $(".car-sales");
                    var description = $(".car-desc");

                    if(title.val().length > 0){
                        if(sub.val().length > 0){
                            if(price.val().length > 0 && price.val() > 0) {
                                if (km.val().length > 0 && km.val() > 0) {
                                    if(hire.val().length > 0 && hire.val() > 0){
                                        if(year.val().length > 0 && year.val() > 1900 && year.val() < 2040) {

                                            if (type.val() > 0) {
                                                if (mfc.val() > 0) {
                                                    if (mdl.val() > 0) {
                                                        if (vrs.val() > 0) {
                                                            if (fuel.val() > 0) {
                                                                if (engine.val() > 0) {
                                                                    if (transmission.val() > 0) {
                                                                        if (incolor.val() > 0) {
                                                                            if (outcolor.val() > 0) {

                                                                                if (sales.val() > 0) {

                                                                                    return true;

                                                                                } else return false;

                                                                            } else return false;
                                                                        } else return false;
                                                                    } else return false;
                                                                } else return false;
                                                            } else return false;
                                                        } else return false;
                                                    } else return false;
                                                } else return false;
                                            } else return false;

                                        }else return false
                                    }else return false;
                                }else return false;
                            }else return false;
                        }else return false;
                    }else return false;

                }

                title.on("keyup", function () {
                    if(isNecessartAreasValid())
                        btn.attr("disabled",false);
                    else
                        btn.attr("disabled",true);
                });
                sub.on("keyup", function () {
                    if(isNecessartAreasValid())
                        btn.attr("disabled",false);
                    else
                        btn.attr("disabled",true);
                });
                price.on("keyup", function () {
                    if(isNecessartAreasValid())
                        btn.attr("disabled",false);
                    else
                        btn.attr("disabled",true);
                });
                km.on("keyup", function () {
                    if(isNecessartAreasValid())
                        btn.attr("disabled",false);
                    else
                        btn.attr("disabled",true);
                });
                hire.on("keyup", function () {
                    if(isNecessartAreasValid())
                        btn.attr("disabled",false);
                    else
                        btn.attr("disabled",true);
                });
                year.on("keyup", function () {
                    if(isNecessartAreasValid())
                        btn.attr("disabled",false);
                    else
                        btn.attr("disabled",true);
                });
                type.on("change", function () {
                    if(isNecessartAreasValid())
                        btn.attr("disabled",false);
                    else
                        btn.attr("disabled",true);
                });
                mfc.on("change", function () {

                    if(isNecessartAreasValid())
                        btn.attr("disabled",false);
                    else
                        btn.attr("disabled",true);

                    if(mfc.val() > 0){
                        $.ajax("<?php echo $base ?>ajax/mfctomdl/"+mfc.val(),{
                            dataType:"json"
                        }).done(function (data) {
                            mdl.children("option").remove();
                            mdl.append("<option value='0' selected disabled> Lütfen Model Seçin ( Zorunlu ) </option>");
                            mdl.attr("disabled", false);
                            $.each(data, function ( index, data) {
                                mdl.append("<option value='"+ data.id +"'>" + data.name + "</option>");
                            });
                        });
                    }

                });
                mdl.on("change", function () {

                    if(isNecessartAreasValid())
                        btn.attr("disabled",false);
                    else
                        btn.attr("disabled",true);

                    if(mdl.val() > 0){
                        $.ajax("<?php echo $base ?>ajax/mdltovrs/"+mdl.val(),{
                            dataType:"json"
                        }).done(function (data) {
                            vrs.children("option").remove();
                            vrs.append("<option value='0' selected disabled> Lütfen Versiyon Seçin ( Zorunlu ) </option>");
                            vrs.attr("disabled", false);
                            $.each(data, function ( index, data) {
                                vrs.append("<option value='"+ data.id +"'>" + data.name + "</option>");
                            });
                        });
                    }

                });
                vrs.on("change", function () {
                    if(isNecessartAreasValid())
                        btn.attr("disabled",false);
                    else
                        btn.attr("disabled",true);
                });
                fuel.on("change", function () {
                    if(isNecessartAreasValid())
                        btn.attr("disabled",false);
                    else
                        btn.attr("disabled",true);
                });
                engine.on("change", function () {
                    if(isNecessartAreasValid())
                        btn.attr("disabled",false);
                    else
                        btn.attr("disabled",true);
                });
                transmission.on("change", function () {
                    if(isNecessartAreasValid())
                        btn.attr("disabled",false);
                    else
                        btn.attr("disabled",true);
                });
                incolor.on("change", function () {
                    if(isNecessartAreasValid())
                        btn.attr("disabled",false);
                    else
                        btn.attr("disabled",true);
                })
                outcolor.on("change", function () {
                    if(isNecessartAreasValid())
                        btn.attr("disabled",false);
                    else
                        btn.attr("disabled",true);
                });
                sales.on("change", function () {
                    if(isNecessartAreasValid())
                        btn.attr("disabled",false);
                    else
                        btn.attr("disabled",true);
                });

                var Upload = function (file) {
                    this.file = file;
                };

                Upload.prototype.getType = function() {
                    return this.file.type;
                };
                Upload.prototype.getSize = function() {
                    return this.file.size;
                };
                Upload.prototype.getName = function() {
                    return this.file.name;
                };
                Upload.prototype.doUpload = function () {
                    var that = this;
                    var formData = new FormData();

                    formData.append("file", this.file, this.getName());
                    formData.append("upload_file", true);

                    $.ajax("<?php echo $base ?>ajax/upCarPhoto/<?php echo $param ?>", {
                        type: "POST",
                        xhr: function () {
                            var myXhr = $.ajaxSettings.xhr();
                            if (myXhr.upload) {
                                myXhr.upload.addEventListener('progress', that.progressHandling, false);
                            }
                            return myXhr;
                        },
                        success: function (data) {
                            document.location.href = "";
                        },
                        error: function (code, error) {
                            console.log(error);
                        },
                        async: true,
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        timeout: 60000
                    });
                };

                /*Upload.prototype.progressHandling = function (event) {
                    var percent = 0;
                    var position = event.loaded || event.position;
                    var total = event.total;
                    var progress_bar_id = "#progress-wrp";
                    if (event.lengthComputable) {
                        percent = Math.ceil(position / total * 100);
                    }
                    // update progressbars classes so it fits your code
                    $(progress_bar_id + " .progress-bar").css("width", +percent + "%");
                    $(progress_bar_id + " .status").text(percent + "%");
                };*/

                var addPhoto = $(".add-photo");
                var photoInput = $("#new-photo");
                addPhoto.on("click", function () {
                    photoInput.trigger("click");
                });
                photoInput.change(function () {
                    var file = $(this)[0].files[0];
                    var upload = new Upload(file);

                    upload.doUpload();

                });

                var delMain = $(".del-main");
                delMain.on("click", function(){
                    var tarVal = $(this).attr("data-target");
                    $.ajax("<?php echo $base ?>ajax/delmainphoto/<?php echo $param ?>").done(function (data) {
                        if(data)
                            window.location.href = "";
                    });
                });

                var doMain = $(".do-main");
                doMain.on("click", function(){
                    var tarVal = $(this).attr("data-target");
                    $.ajax("<?php echo $base ?>ajax/domainphoto/" + tarVal + "/<?php echo $param ?>").done(function (data) {
                        if(data)
                            window.location.href = "";
                    });
                });

                var delPhoto = $(".del-photo");
                delPhoto.on("click", function(){
                    var tarVal = $(this).attr("data-target");
                    $.ajax("<?php echo $base ?>ajax/delphoto/" + tarVal).done(function (data) {
                        if(data)
                            window.location.href = "";
                    });
                });

            });
        </script>
    <?php } ?>
    </body>
</html>