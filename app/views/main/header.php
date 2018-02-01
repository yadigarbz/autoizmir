
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title>Auto İZMİR</title>

        <link rel="shortcut icon" type="image/x-icon" href="<?php echo $base ?>images/favicon.png" />

        <link href="<?php echo $base ?>css/master.css" rel="stylesheet">

        <link rel="alternate stylesheet" type="text/css" href="<?php echo $base ?>assets/switcher/css/color2.css" title="color2" media="all" data-default-color="true"/>

        <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="//oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    <?php
        $bClass = "m-home";
        switch ($p){
            case 'anasayfa':
                $bClass = "m-home";break;
            case 'arabalar':
                $bClass = "m-listingsTwo";break;
            default:
                $bClass = "m-home";
        }
    ?>
    <body class="<?php echo $bClass ?>" data-scrolling-animations="true" data-equal-height=".b-auto__main-item">
        <div id="page-preloader"><span class="spinner"></span></div>


    <?php require_once $vP."main/navbar.php"; ?>