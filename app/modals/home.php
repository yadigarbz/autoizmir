<?php

/**
 * Created by PhpStorm.
 * User: yadigarbz
 * Date: 31.01.2018
 * Time: 23:43
 */

function getSlides(){
    global $con;
    $types = array();
    $query = "SELECT sl.slide_id as id, sl.slide_title as name, sl.car_id as cid, cr.car_title as title, cr.year as cy, cr.price as price, mf.mfc_name as mfc, md.mdl_name as mdl FROM slides sl
              INNER JOIN cars cr ON cr.car_id = sl.car_id
              INNER JOIN car_manifacturers mf ON mf.mfc_id = cr.mfc_id
              INNER JOIN car_models md ON md.mdl_id = cr.mdl_id";
    $sql = mysqli_query($con, $query);
    if($sql){
        while($data = mysqli_fetch_assoc($sql)){
            $data["photo"] = getCarMainPhoto($data["cid"])["photo"];
            $types[] = $data;
        }
    }else{
        echo mysqli_error($con);
    }
    return $types;
}
function getCarSlideInfo($id){
    global $con;
    $photo = array();
    if(!isInjectionWord($id)){
        $query = "SELECT car_title as title, price, cr.year as cy FROM cars cr WHERE car_id = $id";
        $sql = mysqli_query($con, $query);
        if($sql){
            $photo = mysqli_fetch_array($sql);
        }
    }
    return $photo;
}
function getCarMainPhoto( $id ){

    global $con;
    $photo = array();
    if(!isInjectionWord($id)){
        $query = "SELECT photo_id as id, photo_path as photo, is_main as main FROM car_photos WHERE car_id = $id and is_main = 1";
        $sql = mysqli_query($con, $query);
        if($sql){
            $photo = mysqli_fetch_array($sql);
        }
    }
    return $photo;

}

require_once $vP.'main\header.php';

require_once $vP.'v_slider.php';
require_once $vP.'v_carsearch.php';
require_once $vP.'v_dieselcarousel.php';
require_once $vP.'v_gasolinecarousel.php';
require_once $vP.'v_customerbrief.php';
require_once $vP.'v_customerscomment.php';

require_once $vP.'main/footer.php';

?>
