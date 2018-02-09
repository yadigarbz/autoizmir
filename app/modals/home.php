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
function getCarSpect ( $id ){
    global $base;
    global $con;

    $car = array();
    if(!isInjectionWord($id)){
        $query = "SELECT cr.car_id as id,
                        cr.year as cy,
                        cr.car_title as title,
                        cr.price as price,
                        cr.hire_p as hire,
                        cr.a_payment as pay,
                        cr.c_creadit as credit,
                        cr.car_kilometer as km,
                        ct.typ_name as type,
                        cmf.mfc_name as mfc,
                        cmd.mdl_name as mdl,
                        ft.ftyp_name as fuel,
                        tt.ttyp_name as transmission,
                        cco.clr_name as coloro,
                        cp.photo_path as photo
                  FROM cars cr
                  INNER JOIN car_types ct ON ct.typ_id = cr.typ_id
                  INNER JOIN car_manifacturers cmf ON cmf.mfc_id = cr.mfc_id
                  INNER JOIN car_models cmd ON cmd.mdl_id = cr.mdl_id
                  INNER JOIN fuel_types ft ON ft.ftyp_id = cr.ftyp_id
                  INNER JOIN transmission_types tt ON tt.ttyp_id = cr.ttyp_id
                  INNER JOIN colors cco ON cco.clr_id = cr.out_c 
                  INNER JOIN car_photos cp ON cp.car_id = cr.car_id
                  WHERE cr.car_id = $id and cp.is_main = 1";
        $sql = mysqli_query($con, $query);
        if($sql){
                $car = mysqli_fetch_assoc($sql);
        }else{
            echo mysqli_error($con);
        }
    }
    return $car;
}
function getDizelCars(){
   global $con;
   $cars = array();
   $query = "SELECT car_id as id FROM dizelSlider";
   $sql = mysqli_query($con, $query);
   if($sql){
       while($data = mysqli_fetch_array($sql))
           $cars[] = getCarSpect($data["id"]);
   }
   return $cars;
}
function getBenzinCars(){
    global $con;
    $cars = array();
    $query = "SELECT car_id as id FROM benzinSlider";
    $sql = mysqli_query($con, $query);
    if($sql){
        while($data = mysqli_fetch_array($sql))
            $cars[] = getCarSpect($data["id"]);
    }
    return $cars;
}

require_once $vP.'main/header.php';

require_once $vP.'v_slider.php';
require_once $vP.'v_carsearch.php';
require_once $vP.'v_dieselcarousel.php';
require_once $vP.'v_gasolinecarousel.php';
require_once $vP.'v_customerbrief.php';
require_once $vP.'v_customerscomment.php';

require_once $vP.'main/footer.php';

?>
