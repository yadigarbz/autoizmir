<html lang="en" >
<!-- begin::Head -->
    <head>
        <meta charset="utf-8" />
        <title>
            AUTOİZMİR Yönetim Paneli
        </title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!--begin::Web font -->
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
        <script>
            WebFont.load({
                google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
                active: function() {
                    sessionStorage.fonts = true;
                }
            });
        </script>
        <!--end::Web font -->
        <!--begin::Base Styles -->
        <link href="<?php echo $base ?>css/vendors.bundle.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $base ?>css/style.bundle.css" rel="stylesheet" type="text/css" />
        <!--end::Base Styles -->
        <!--<link rel="shortcut icon" href="assets/demo/demo6/media/img/logo/favicon.ico" />-->
    </head>
    <body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-light m-aside-left--fixed m-aside-left--offcanvas m-aside-left--minimize m-brand--minimize m-footer--push m-aside--offcanvas-default"  >
        <div class="m-grid m-grid--hor m-grid--root m-page">
    <?php
        if(isUserActive()){
            require_once $vP."main/topbar.php";
            require_once $vP."main/leftbar.php";
        }
    ?>