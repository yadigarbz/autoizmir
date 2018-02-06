<?php if(isset($loaderSta) && $loaderSta) { ?>
    <div id="loader">
        <div>
            <i class="fa fa-spinner fa-spin"></i>
        </div>
    </div>
    <?php
        if(isset($_POST["username"]) && isset($_POST["password"])){
            getAuth($_POST["username"], $_POST["password"]);
        }else{
            header("Location: $base.index.html");
        }
    ?>
<?php } else { ?>

    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-grid--tablet-and-mobile m-grid--hor-tablet-and-mobile m-login m-login--1 m-login--signin" id="m_login">
        <div class="m-grid__item m-grid__item--order-tablet-and-mobile-2 m-login__aside">
            <div class="m-stack m-stack--hor m-stack--desktop">
                <div class="m-stack__item m-stack__item--fluid">
                    <div class="m-login__wrapper">
                        <div class="m-login__logo">
                            <a href="#">
                                <img src="<?php echo $base ?>images/logo.png">
                            </a>
                        </div>
                        <div class="m-login__signin">
                            <div class="m-login__head">
                                <h3 class="m-login__title">
                                    Yönetici Oturumu Aç
                                </h3>
                            </div>
                            <form class="m-login__form m-form" action="" method="post">
                                <input type="hidden" name="login" value="true">
                                <div class="form-group m-form__group">
                                    <input class="form-control m-input" type="text" placeholder="Email" name="username" autocomplete="off">
                                </div>
                                <div class="form-group m-form__group">
                                    <input class="form-control m-input m-login__form-input--last" type="password" placeholder="Password" name="password">
                                </div>

                                <div class="m-login__form-action">
                                    <button id="m_login_signin_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air">
                                        Giriş Yap
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="m-grid__item m-grid__item--fluid m-grid m-grid--center m-grid--hor m-grid__item--order-tablet-and-mobile-1	m-login__content" style="background-image: url(<?php echo $base ?>images/loginbg.jpg)">
            <div class="m-grid__item m-grid__item--middle">
                <h3 class="m-login__welcome">
                    Join Our Community
                </h3>
                <p class="m-login__msg">
                    Lorem ipsum dolor sit amet, coectetuer adipiscing
                    <br>
                    elit sed diam nonummy et nibh euismod
                </p>
            </div>
        </div>
    </div>

<?php }  ?>
