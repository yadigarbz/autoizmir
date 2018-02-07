<?php
/**
 * Created by PhpStorm.
 * User: yadigarbz
 * Date: 1.02.2018
 * Time: 04:15
 */

    $page = 1;
    if(isset($_GET["f"]) && $_GET["f"] == "page"){
        if(isset($_GET["page"]) && $_GET["page"] > 1){
            $page = $_GET["page"];
        }
    }

    require_once $vP.'main\header.php';

    require_once $vP.'v_c_minibanner.php';
    require_once $vP.'v_c_breadcrumb.php';
    //require_once $vP.'v_c_infobar.php';
    require_once $vP.'v_c_carslist.php';

    require_once $vP.'main\footer.php';

?>