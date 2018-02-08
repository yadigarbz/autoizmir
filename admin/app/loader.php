<?php
/**
 * Created by PhpStorm.
 * User: yadigarbz
 * Date: 31.01.2018
 * Time: 23:30
 */

function loader($p) {

    global $base;

    if(isUserActive()) {
        switch ($p) {
            case 'ajax':
                require_once "ajax/index.php";break;
            case 'adminf':
                require_once "controllers/admin.php";break;
            case 'defination':
                require_once "controllers/definations.php";break;
            case 'cars':
                require_once "controllers/cars.php";break;
            case 'logout':
                require_once "controllers/auth.php";break;
            default:
                require_once "controllers/dashboard.php";$p = "home";
        }
    }else{
        require_once "controllers/auth.php";$p = "login";
    }
}

?>