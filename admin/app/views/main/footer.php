            </div>
    <!-- end:: Body -->
    <!-- begin::Footer -->
            <?php if(isset($_SESSION["login"]) && $_SESSION["login"]) { ?>
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
    <!-- end::Footer -->
    </div>
    <div class="m-scroll-top m-scroll-top--skin-top" data-toggle="m-scroll-top" data-scroll-offset="500" data-scroll-speed="300">
        <i class="la la-arrow-up"></i>
    </div>
    <!-- end::Scroll Top -->		    <!-- begin::Quick Nav -->
            <?php } ?>
    <!-- begin::Quick Nav -->
    <!--begin::Base Scripts -->
    <script src="<?php echo $base ?>js/base/vendors.bundle.js" type="text/javascript"></script>
    <script src="<?php echo $base ?>js/base/scripts.bundle.js" type="text/javascript"></script>
    <!--end::Base Scripts -->
    <!--begin::Page Snippets -->
    <?php if($p == "home"){ ?>
    <script src="<?php echo $base ?>js/base/dashboard.js" type="text/javascript"></script>
    <?php } ?>

    <?php if($f == "vehicle_mdls") { ?>
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
    <!--end::Page Snippets -->
    </body>
<!-- end::Body -->
</html>