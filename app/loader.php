<?php
/**
 * Created by PhpStorm.
 * User: yadigarbz
 * Date: 31.01.2018
 * Time: 23:30
 */

    function loader($p) {

        global $base;
        $global["pages"] = getPages();

        switch($p){
            case 'anasayfa':
                require_once "controllers/main.php";break;
            case 'arabalar':
                require_once "controllers/cars.php";break;
            default:
                require_once "controllers/main.php";
        }
    }

?>