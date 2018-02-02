<?php
ob_start();
session_start();
/**
 * Created by PhpStorm.
 * User: yadigarbz
 * Date: 31.01.2018
 * Time: 23:16
 */
$base = "//".$_SERVER["SERVER_NAME"]."/autoizmir/admin/";
$app = $base."app";
$views = $app."views";

require_once 'app/config/db.php';

$con = getConnection();

require_once "./app/loader.php";

loader($pVariable);

?>