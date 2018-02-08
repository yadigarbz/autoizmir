<?php
/**
 * Created by PhpStorm.
 * User: yadigarbz
 * Date: 31.01.2018
 * Time: 23:30
 */

    function loader($p) {

        global $base;
        $global["pages"] = getPages();
        function getLastAddedCars(){
            global $con;
            $cars = array();
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
                  WHERE cr.sta_id = 1 and cp.is_main = 1 ORDER BY add_time DESC LIMIT 3";
            $sql = mysqli_query($con, $query);
            if($sql){
                while($data = mysqli_fetch_assoc($sql))
                    $cars[] = $data;
            }else{
                echo mysqli_error($con);
            }
            return $cars;
        }

        switch($p){
            case 'iletisim':
                require_once "controllers/pages.php";break;
            case 'anasayfa':
                require_once "controllers/main.php";break;
            case 'arabalar':
                require_once "controllers/cars.php";break;
            default:
                require_once "controllers/main.php";
        }
    }

?>