<?php
/**
 * Created by PhpStorm.
 * User: yadigarbz
 * Date: 1.02.2018
 * Time: 04:15
 */

    $page = 1;
    $f = "page";
    if(isset($_GET["f"]))
        $f = $_GET["f"];

    if(isset($_GET["param"]))
        $param = $_GET["param"];

    if($f == "page"){
        if(isset($param) && intval($param) > 1){
            $page = $_GET["page"];
        }
    }elseif($f == "detail"){
        if(isset($param) && intval($param) > 0){
            $car = $param;
        }
    }

    function getPageCars($page){
        global $base;
        global $con;

        $cars = array();
        if(!isInjectionWord($page)){
            $recStart = (intval($page)*6) - 6;
            $recEnd = (intval($page)*6);
            $query = "SELECT cr.car_id as id,
                        cr.year as cy,
                        cr.car_title as title,
                        cr.car_subtitle as sub,
                        cr.price as price,
                        cr.c_creadit as credit,
                        cr.car_kilometer as km,
                        cr.car_title as title,
                        cr.passenger as pass,
                        cr.doors as door,
                        ct.typ_name as type,
                        et.etyp_name as engine,
                        cmf.mfc_name as mfc,
                        cmd.mdl_name as mdl,
                        ft.ftyp_name as fuel,
                        tt.ttyp_name as transmission,
                        cc.clr_name as color,
                        sm.smn_name as sales
                  FROM cars cr
                  INNER JOIN car_types ct ON ct.typ_id = cr.typ_id
                  INNER JOIN car_manifacturers cmf ON cmf.mfc_id = cr.mfc_id
                  INNER JOIN car_models cmd ON cmd.mdl_id = cr.mdl_id
                  INNER JOIN fuel_types ft ON ft.ftyp_id = cr.ftyp_id
                  INNER JOIN transmission_types tt ON tt.ttyp_id = cr.ttyp_id
                  INNER JOIN engine_types et ON et.etyp_id = cr.etyp_id
                  INNER JOIN colors cc ON cc.clr_id = cr.out_c
                  INNER JOIN sales_managers sm ON sm.smn_id = cr.sales 
                  WHERE sta_id = 1 LIMIT $recStart, $recEnd";
            $sql = mysqli_query($con, $query);
            if($sql){
                while($data = mysqli_fetch_assoc($sql))
                    $cars[] = $data;
            }else{
                echo mysqli_error($con);
            }
        }
        return $cars;
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

    require_once $vP.'v_c_minibanner.php';
    require_once $vP.'v_c_breadcrumb.php';
    //require_once $vP.'v_c_infobar.php';
    switch ($f) {
        case "page";
            require_once $vP.'v_c_carslist.php';
        case "detail":
            require_once $vP."v_c_car_detail.php";
    }

    require_once $vP.'main\footer.php';

?>