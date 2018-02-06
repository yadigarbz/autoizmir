<?php
/**
 * Created by PhpStorm.
 * User: yadigarbz
 * Date: 3.02.2018
 * Time: 15:11
 */

    $vP= $aBase."\../views/";

    require_once $vP."main/header.php";

    if(isset($_GET["f"]))
        $f = $_GET["f"];
    if(isset($_GET["param"]))
        $param = $_GET["param"];

    switch($f){
        default:
            require_once $vP."v_cars_list.php";
    }

    require_once $vP."main/footer.php";

?>