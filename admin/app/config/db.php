<?php
/**
 * Created by PhpStorm.
 * User: yadigarbz
 * Date: 31.01.2018
 * Time: 23:34
 */

function paramaterSelector($paramT) {

    $param["host"] = "";
    $param["user"] = "";
    $param["pass"] = "";
    $param["db"] = "";

    if($paramT == 1){
        $param["host"] = "localhost";
        $param["user"] = "root";
        $param["pass"] = "";
        $param["db"] = "autoizmir";
    }

    return $param;

}

function getConnection(){

    $p = paramaterSelector(1);
    $con = mysqli_connect($p["host"], $p["user"], $p["pass"], $p["db"]);

    if(!$con){
        die("Parametre Hatası");
    }else{
        mysqli_query($con, "SET NAMES 'utf8'");
        return $con;
    }

}

?>