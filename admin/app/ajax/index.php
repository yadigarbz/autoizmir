<?php
/**
 * Created by PhpStorm.
 * User: yadigarbz
 * Date: 6.02.2018
 * Time: 23:04
 */

    function getCarMfcByModel( $param ){

        global $con;
        $data = array();

        $query = "SELECT mdl_id as mdlid, mfc.mfc_id as id, mfc_name as name FROM car_manifacturers mfc
                  LEFT JOIN car_models mdl ON mfc.mfc_id = mdl.mfc_id
                  GROUP BY mfc.mfc_id";
        $sql = mysqli_query($con, $query);

        if($sql){
            while($sData = mysqli_fetch_assoc($sql)){
                $data[] = $sData;
            }
        }

        return json_encode($data);


    }

    function getCarMdlByVersion( $param ){

        global $con;
        $data = array();

        $query = "SELECT vrs_id as vrsid, mdl.mdl_id as id, mdl_name as name FROM car_models mdl
                      LEFT JOIN car_versions vrs ON vrs.mdl_id = mdl.mdl_id
                      GROUP BY mdl.mdl_id";
        $sql = mysqli_query($con, $query);

        if($sql){
            while($sData = mysqli_fetch_assoc($sql)){
                $data[] = $sData;
            }
        }

        return json_encode($data);

    }

    function getCarMdlByMfc( $param ){
        global $con;
        $data = array();

        if(!isInjectionWord($param)) {
            $query = "SELECT mdl_id as id, mdl_name as name FROM car_models WHERE mfc_id = $param";
            $sql = mysqli_query($con, $query);

            if ($sql) {
                while ($sData = mysqli_fetch_assoc($sql)) {
                    $data[] = $sData;
                }
            }
        }

        return json_encode($data);
    }

    function getCarVrsByMdl( $param ){
        global $con;
        $data = array();

        if(!isInjectionWord($param)) {
            $query = "SELECT vrs_id as id, vrs_name as name FROM car_versions WHERE mdl_id = $param";
            $sql = mysqli_query($con, $query);

            if ($sql) {
                while ($sData = mysqli_fetch_assoc($sql)) {
                    $data[] = $sData;
                }
            }
        }

        return json_encode($data);
    }

    if(isset($_GET["f"]) && isset($_GET["param"])){

        $f = $_GET["f"];
        $p = $_GET["param"];

        if(!isInjectionWord($p)){

            switch($f){
                case "mdltovrs":
                    echo getCarVrsByMdl($p);break;
                case "mfctomdl":
                    echo getCarMdlByMfc($p);break;
                case "vrstomdl":
                    echo getCarMdlByVersion($p);break;
                case "mdltomfc":
                    echo getCarMfcByModel($p);break;
                default:
                    echo "selam";
            }

        }

    }

?>