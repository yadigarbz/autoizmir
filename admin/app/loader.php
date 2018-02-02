<?php
/**
 * Created by PhpStorm.
 * User: yadigarbz
 * Date: 31.01.2018
 * Time: 23:30
 */

function loader($p) {

    global $base;

    if(isset($_SESSION["login"])) {
        switch ($p) {
            default:
                require_once "controllers/dashboard.php";
        }
    }else{
        require_once "controllers/auth.php";
    }
}

?>