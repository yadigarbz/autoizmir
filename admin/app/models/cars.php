<?php
/**
 * Created by PhpStorm.
 * User: yadigarbz
 * Date: 3.02.2018
 * Time: 15:11
 */

    $vP= $aBase."\../views/";

    require_once $vP."main/header.php";

    function getCarTypes(){
    global $con;
    $types = array();
    $query = "SELECT typ_id as id, typ_name as name, typ_seo as seo FROM car_types";
    $sql = mysqli_query($con, $query);
    if($sql){
        while($data = mysqli_fetch_assoc($sql)){
            $types[] = $data;
        }
    }else{
        echo mysqli_error($con);
    }
    return $types;
}
    function getCarMfcs(){
    global $con;
    $types = array();
    $query = "SELECT mfc_id as id, mfc_name as name, mfc_seo as seo FROM car_manifacturers";
    $sql = mysqli_query($con, $query);
    if($sql){
        while($data = mysqli_fetch_assoc($sql)){
            $types[] = $data;
        }
    }else{
        echo mysqli_error($con);
    }
    return $types;
}
    function getCarMdls(){
    global $con;
    $types = array();
    $query = "SELECT cmdl.mdl_id as id, cmdl.mdl_name as name, cmnf.mfc_name as mfcname, cmdl.mdl_seo as seo FROM car_models cmdl
                  INNER JOIN car_manifacturers cmnf ON cmnf.mfc_id = cmdl.mfc_id";
    $sql = mysqli_query($con, $query);
    if($sql){
        while($data = mysqli_fetch_assoc($sql)){
            $types[] = $data;
        }
    }else{
        echo mysqli_error($con);
    }
    return $types;
}
    function getCarVrs(){
    global $con;
    $types = array();
    $query = "SELECT cvrs.vrs_id as id, cvrs.vrs_name as name, cmdl.mdl_name as mdlname, cvrs.vrs_seo as seo FROM car_versions cvrs
                  INNER JOIN car_models cmdl ON cmdl.mdl_id = cvrs.mdl_id";
    $sql = mysqli_query($con, $query);
    if($sql){
        while($data = mysqli_fetch_assoc($sql)){
            $types[] = $data;
        }
    }else{
        echo mysqli_error($con);
    }
    return $types;
}
    function getParamRes( $f ){
    global $con;

    $table = "";
    $columns = array();

    switch($f){
        case 'fuel_types':
            $table = "fuel_types"; $columns[0] = "ftyp_id"; $columns[1] = "ftyp_name";break;
        case 'engine_types':
            $table = "engine_types"; $columns[0] = "etyp_id"; $columns[1] = "etyp_name";break;
        case 'tsms_types':
            $table = "transmission_types"; $columns[0] = "ttyp_id"; $columns[1] = "ttyp_name";break;
        case 'colors':
            $table = "colors"; $columns[0] = "clr_id"; $columns[1] = "clr_name";break;
    }

    $types = array();
    $query = "SELECT $columns[0] as id, $columns[1] as name FROM $table";
    $sql = mysqli_query($con, $query);
    if($sql){
        while($data = mysqli_fetch_assoc($sql)){
            $types[] = $data;
        }
    }else{
        echo mysqli_error($con);
    }
    return $types;
}

    if(isset($_GET["f"]))
        $f = $_GET["f"];
    if(isset($_GET["param"]))
        $param = $_GET["param"];

    switch($f){
        case 'car-add':
            require_once $vP."v_cars_add.php";break;
        default:
            require_once $vP."v_cars_list.php";
    }

    require_once $vP."main/footer.php";

?>