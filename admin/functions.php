<?php
ob_start();
session_start();
/**
 * Created by PhpStorm.
 * User: yadigarbz
 * Date: 31.01.2018
 * Time: 23:16
 */
$base = "//".$_SERVER["SERVER_NAME"]."/izmir/admin/";
$app = $base."app";
$views = $app."views";

require_once 'app/config/db.php';

$con = getConnection();

function isUserActive(){
    if(isset($_SESSION["login"]) && $_SESSION["login"] && isset($_COOKIE["user"])) {
        return true;
    }else{
        return false;
    }
}
function getUserGrade(){
    global $con;
    $type = 0;
    $umail = isset($_COOKIE["usermail"]) ? $_COOKIE["usermail"] : "null";
    $query = "SELECT user_type as type FROM admin_users WHERE user_mail = '$umail'";
    $sql = mysqli_query($con, $query);
    if($sql){
        $type = mysqli_fetch_array($sql)["type"];
    }
    return $type;
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

require_once "./app/loader.php";

loader($pVariable);

?>