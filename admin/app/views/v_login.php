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

    <div id="main-container">
        <div class="bg-container" style="background-image:url(<?php echo $base ?>images/loginbg.jpg)">
            <div></div>
        </div>
        <div class="login-table">

            <div class="login-header">
                <h2> AUTO İZMİR Yönetim Paneli </h2>
            </div>

            <form method="post">
                <div class="row">
                    <input type="hidden" name="login">
                    <div class="row">
                        <div class="input-group full-justify">
                            <label for="user-name"> Kullanıcı Adı </label>
                            <input type="email" name="username" id="user-name" placeholder="Kullanıcı adınızı giriniz">
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-group full-justify">
                            <label for="password"> Şifre </label>
                            <input type="password" name="password" id="password" placeholder="Lütfen şifrenizi giriniz">
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-group full-justify btn">
                            <input type="submit" id="login" value="GİRİŞ YAP">
                        </div>
                    </div>
                </div>
            </form>

        </div>

    </div>

<?php }  ?>
