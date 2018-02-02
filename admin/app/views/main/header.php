<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo $base ?>css/normalize.css">
    <link rel="stylesheet" href="<?php echo $base ?>css/style.css" media="all">
        <?php if(isset($loaderSta) && $loaderSta || (($_SESSION["login"]) && $_SESSION["login"])) { ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <?php } ?>
</head>
<body>

<?php if(isset($_SESSION["login"]) && $_SESSION["login"]) {
    require_once $vP."main/topbar.php";
    require_once $vP."main/leftbar.php";
 } ?>
