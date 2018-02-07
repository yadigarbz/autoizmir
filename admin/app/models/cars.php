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
        case 'sales':
            $table = "sales_managers"; $columns[0] = "smn_id"; $columns[1] = "smn_name";break;
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

    function getCarMFC($id){
        global $con;
        $mfc = array();
        $query = "SELECT mfc_id as id, mfc_name as name FROM car_manifacturers WHERE mfc_id = $id";
        $sql = mysqli_query($con, $query);
        if($sql){
            $mfc = mysqli_fetch_assoc($sql);
        }
        return $mfc;
    }

    function getActiveCars(){
        global $con;
        $cars = array();
        $query = "SELECT car_title,car_subtitle,sta_id,price,c_creadit,hire_p,a_payment,car_kilometer,year,typ_id,mfc_id,mdl_id,vrs_id,etyp_id,ttyp_id,out_c,inside_c,passenger,doors,ftyp_id,city_cons,out_cons,description,sales
                      FROM cars WHERE sta_id = 1";
        $sql = mysqli_query($con,$query);
        if($sql){
            while($data = mysqli_fetch_assoc($sql)){
                $cars[] = $data;
            }
        }
        return $cars;
    }
    function getActiveCarsList(){
        global $con;
        $cars = array();
        $query = "SELECT cr.car_id as id,
                        cr.car_title as title, 
                        ct.typ_name as type,
                        cmf.mfc_name as mfc,
                        cmd.mdl_name as mdl,
                        ft.ftyp_name as fuel,
                        sm.smn_name as sales
                  FROM cars cr
                  INNER JOIN car_types ct ON ct.typ_id = cr.typ_id
                  INNER JOIN car_manifacturers cmf ON cmf.mfc_id = cr.mfc_id
                  INNER JOIN car_models cmd ON cmd.mdl_id = cr.mdl_id
                  INNER JOIN fuel_types ft ON ft.ftyp_id = cr.ftyp_id
                  INNER JOIN sales_managers sm ON sm.smn_id = cr.sales 
                  WHERE sta_id = 1";
        $sql = mysqli_query($con,$query);
        if($sql){
            while($data = mysqli_fetch_assoc($sql)){
                $cars[] = $data;
            }
        }
        return $cars;
    }

    function setCarColumns(){
    global $base;
    $uType = getUserGrade();
    $deleteButton = $uType == 1 ? '<a href="'.$base.'cars/delete/\' + row.id + \'" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill"><i class="fa fa-trash"></i></a>\\' : '\\';
    $columnObject = '
            [
                {
                    field : "id",
                    title : "#",
                    width : 50,
                    sortable : true,
                    textAlign: "center"
                },
                {
                    field : "title",
                    title  : "İlan Başlığı"
                },
                {
                    field : "type",
                    title  : "Araç Türü"
                },
                {
                    field : "mfc",
                    title  : "Marka"
                },
                {
                    field : "mdl",
                    title  : "Model"
                },
                {
                    field : "fuel",
                    title  : "Yakıt"
                },
                {
                    field : "sales",
                    title  : "Sorumlu"
                },
                {
                    field: "Actions",
                    width: 110,
                    title: "İşlemler",
                    sortable: false,
                    overflow: "visible",
                    template: function (row, index, datatable) {
                        var dropup = (datatable.getPageSize() - index) <= 4 ? "dropup" : "";
        
                        return \'\
                            <a href="'.$base.'cars/car-edit/\' + row.id + \'" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill"><i class="la la-edit"></i></a>\\
                            ' . $deleteButton . '
                        \';
                    }
                }
            ]
        ';

    return $columnObject;
}

    function getCar( $id ){
        global $con;
        $car = array();
        if(!isInjectionWord($id)) {
            $query = "SELECT car_title as title,
                            car_subtitle as sub,
                            sta_id as sta,
                            price as price,
                            c_creadit as credit,
                            hire_p as hire,
                            a_payment as pay,
                            car_kilometer as km,
                            year as cy,
                            typ_id as typ,
                            mfc_id as mfc,
                            mdl_id as mdl,
                            vrs_id as vrs,
                            etyp_id as engine,
                            ttyp_id as trans,
                            out_c as ocolor,
                            inside_c as icolor,
                            passenger,
                            doors,
                            ftyp_id as fuel,
                            city_cons as city,
                            out_cons as outcon,
                            description as descrip,
                            sales
                      FROM cars WHERE car_id = $id";
            $sql = mysqli_query($con, $query);
            if ($sql) {
                $car = mysqli_fetch_assoc($sql);
            }else{
                echo mysqli_error($con);
            }
        }
        return $car;
    }
    function addCar($var){

        global $con;
        global $base;

        if(!isInjectionWord($var)){

            $title = $var["title"];
            $sub = $var["sub"];
            $price = $var["price"];
            $km = $var["kilometer"];
            $year = $var["year"];
            $credit = $var["credit"] == "on" ? true : false;
            $pay = $var["payment"];
            $hire = $var["hire"];
            $type = $var["type"];
            $mfc = $var["mfc"];
            $mdl = $var["mdl"];
            $vrs = $var["vrs"];
            $fuel = $var["fuel"];
            $engine = $var["engine"];
            $trans = $var["transmission"];
            $oColor = $var["out-color"];
            $iColor = $var["in-color"];
            $passenger = $var["passenger"];
            $door = $var["door"];
            $citycons = $var["city-cons"];
            $outcons = $var["out-cons"];
            $sales = $var["sales"];
            $desc = $var["description"];

            $query = "INSERT INTO cars(
                                    car_title,
                                    car_subtitle,
                                    sta_id,
                                    price,
                                    c_creadit,
                                    hire_p,
                                    a_payment,
                                    car_kilometer,
                                    year,
                                    typ_id,
                                    mfc_id,
                                    mdl_id,
                                    vrs_id,
                                    etyp_id,
                                    ttyp_id,
                                    out_c,
                                    inside_c,
                                    passenger,
                                    doors,
                                    ftyp_id,
                                    city_cons,
                                    out_cons,
                                    description,
                                    sales
            ) VALUES
              (
                '$title',
                '$sub',
                1,
                $price,
                $credit,
                $hire,
                $pay,
                $km,
                $year,
                $type,
                $mfc,
                $mdl,
                $vrs,
                $engine,
                $trans,
                $oColor,
                $iColor,
                '$passenger',
                '$door',
                $fuel,
                '$citycons',
                '$outcons',
                '$desc',
                $sales
              )";

            $sql = mysqli_query($con, $query);

            if($sql){
                header("Location: ".$base."cars/list/active");
            }else{
                echo mysqli_error($con);
            }

        }

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
        return $data;
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

        return $data;
    }

    if(isset($_GET["f"]))
        $f = $_GET["f"];
    if(isset($_GET["param"]))
        $param = $_GET["param"];

    switch($f){
        case 'car-edit':
            require_once $vP."v_cars_edit.php";break;
        case 'car-add':
            require_once $vP."v_cars_add.php";break;
        default:
            $data = getActiveCarsList();
            $columns = setCarColumns();
            require_once $vP."v_cars_list.php";
    }


    $data = getActiveCarsList();
    $columns = setCarColumns();

    require_once $vP."main/footer.php";

?>