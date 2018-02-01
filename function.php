<?php
/**
 * Created by PhpStorm.
 * User: yadigarbz
 * Date: 31.01.2018
 * Time: 23:16
 */
    $base = "//".$_SERVER["SERVER_NAME"]."/autoizmir/";
    $app = $base."app";
    $views = $app."views";

    require_once 'app/config/db.php';

    $con = getConnection();

    function getPages(){

        global $con;

        $pages = [];

        $sql = mysqli_query($con, "SELECT page_seo as seo, page_title as title FROM pages");
        if($sql){
            while($data = mysqli_fetch_array($sql)){
                $pages[] = $data;
            }
        }
        return $pages;
    }

    require_once "./app/loader.php";

    loader($pVariable);

?>