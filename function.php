<?php
/**
 * Created by PhpStorm.
 * User: yadigarbz
 * Date: 31.01.2018
 * Time: 23:16
 */
    $base = "//".$_SERVER["SERVER_NAME"]."/izmir/";
    $app = $base."app";
    $views = $app."views";

    require_once 'app/config/db.php';

    $con = getConnection();
    function priceWriter( $price ){
    $len = strlen($price);
    $new = "";
    for($i = 0; $i < $len; $i++){
        if($i != 0 && $i%3 == 0){
            $new = $new.".";
        }
        $new = $new . $price[($len-$i) - 1];
    }
    $tnew = "";
    for($i = 0; $i < strlen($new); $i++){
        $tnew .= $new[(strlen($new)-$i) - 1];
    }
    return $tnew;
}
    function isInjectionWord( $text ){

    $injectionWords = ["unique", "select", "from", "insert", "update"];

    if(is_array($text)) {
        if (!in_array($injectionWords, $text))
            return false;
        else
            return true;
    }else{
        for($i = 0; $i < count($injectionWords); $i++)
            if (!strpos($injectionWords[$i], $text))
                return false;
            else
                return true;
    }

}
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