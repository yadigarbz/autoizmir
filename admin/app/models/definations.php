<?php
/**
 * Created by PhpStorm.
 * User: yadigarbz
 * Date: 3.02.2018
 * Time: 21:40
 */

    $vP= $aBase."\../views/";

    $utype = getUserGrade();

    require_once $vP."main/header.php";

    if(isset($_GET["f"]))
        $f = $_GET["f"];

    if(isset($_GET["param"]))
        $param = $_GET["param"];
    else
        $param = "list";

    function getSeoOfName( $text ){

        $changeLetters = ["ı", "ç", "ş", "ö", "ü", "ğ", " ", ",", "'", '"', "+", "-", "&", "%", "(", ")", "?", "."];
        $optionalLetters = ["i", "c", "s", "o", "u", "g", "", "", "", "", "", "", "", "", "", "", "", ""];

        $newText = str_replace($changeLetters, $optionalLetters, $text);

        return $newText;

    }

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
    function setCarTypeColumns(){
        $uType = getUserGrade();
        $deleteButton = $uType == 1 ? '<a href="delete/\' + row.id + \'" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill"><i class="fa fa-trash"></i></a>\\' : '\\';
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
                    field : "name",
                    title  : "Araç Tipi"
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
                            ' . $deleteButton . '
                        \';
                    }
                }
            ]
        ';

        return $columnObject;
    }
    function vehicleTypeUpdate($variables){
        global $base;
        global $con;
        if(!isInjectionWord($variables["id"]) && !isInjectionWord($variables["value"])){

            $typeId   = $variables["id"];
            $typeName = $variables["value"];
            $query      = "UPDATE car_types SET typ_name = '$typeName' WHERE typ_id = $typeId";
            $sql        = mysqli_query($con, $query);
            if($sql){
                header("Location: ".$base."definations/vehicle_types/list");
            }

        }
    }
    function vehicleTypeAdd($variables){
        global $base;
        global $con;

        if(!isInjectionWord($variables["type_name"])){

            $typeName   = isset($variables["type_name"]) ? $variables["type_name"] : "null";
            $typeSeo    = getSeoOfName($typeName);
            $query      = "INSERT INTO car_types(typ_name, typ_seo) VALUES ('$typeName', '$typeSeo')";
            $sql        = mysqli_query($con, $query);
            if($sql){
                header("Location: ".$base."definations/vehicle_types/list");
            }

        }

    }
    function vehicleTypeDelete($variables){
        global $base;
        global $con;
        if(!isInjectionWord($variables["id"])){

            $typeId   = $variables["id"];
            $query      = "DELETE FROM car_types WHERE typ_id = $typeId";
            $sql        = mysqli_query($con, $query);
            if($sql){
                header("Location: ".$base."definations/vehicle_types/list");
            }
        }
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
    function setCarMfcColumns(){
        $uType = getUserGrade();
        $deleteButton = $uType == 1 ? '<a href="delete/\' + row.id + \'" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill"><i class="fa fa-trash"></i></a>\\' : '\\';
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
                        field : "name",
                        title  : "Marka Adı"
                    },
                    {
                        field: "Actions",
                        width: 110,
                        title: "Actions",
                        sortable: false,
                        overflow: "visible",
                        template: function (row, index, datatable) {
                            var dropup = (datatable.getPageSize() - index) <= 4 ? "dropup" : "";
            
                            return \'\
                            ' . $deleteButton . '
                            \';
                        }
                    }
                ]
            ';

        return $columnObject;
    }
    function carMfcUpdate($variables){
        global $base;
        global $con;
        if(!isInjectionWord($variables["id"]) && !isInjectionWord($variables["value"])){

            $typeId   = $variables["id"];
            $typeName = $variables["value"];
            $query      = "UPDATE car_manifacturers SET mfc_name = '$typeName' WHERE mfc_id = $typeId";
            $sql        = mysqli_query($con, $query);
            if($sql){
                header("Location: ".$base."definations/vehicle_mfcs/list");
            }

        }
    }
    function carMfcAdd($variables){
        global $base;
        global $con;

        if(!isInjectionWord($variables["type_name"])){

            $mfcName   = isset($variables["type_name"]) ? $variables["type_name"] : "null";
            $mfcSeo    = getSeoOfName($mfcName);
            $query      = "INSERT INTO car_manifacturers(mfc_name, mfc_seo) VALUES ('$mfcName', '$mfcSeo')";
            $sql        = mysqli_query($con, $query);
            if($sql){
                header("Location: ".$base."definations/vehicle_mfcs/list");
            }

        }

    }
    function carMfcDelete($variables){
        global $base;
        global $con;
        if(!isInjectionWord($variables["id"])){

            $mfcId     = $variables["id"];
            $query      = "DELETE FROM car_manifacturers WHERE mfc_id = $mfcId";
            $sql        = mysqli_query($con, $query);
            if($sql){
                header("Location: ".$base."definations/vehicle_mfcs/list");
            }
        }
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
    function setCarMdlsColumns(){
        $uType = getUserGrade();
        $deleteButton = $uType == 1 ? '<a href="delete/\' + row.id + \'" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill"><i class="fa fa-trash"></i></a>\\' : '\\';
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
                            field : "name",
                            title  : "Model Adı"
                        },
                        {
                            field : "mfcname",
                            title  : "Marka Adı"
                        },
                        {
                            field: "Actions",
                            width: 110,
                            title: "Actions",
                            sortable: false,
                            overflow: "visible",
                            template: function (row, index, datatable) {
                                var dropup = (datatable.getPageSize() - index) <= 4 ? "dropup" : "";
                
                                return \'\
                                ' . $deleteButton . '
                                \';
                            }
                        }
                    ]
                ';

        return $columnObject;
    }
    function carMdlUpdate($variables){
        global $base;
        global $con;
        if(!isInjectionWord($variables["id"]) && !isInjectionWord($variables["mfcid"]) && !isInjectionWord($variables["value"])){

            $typeId     = $variables["id"];
            $typeName   = $variables["value"];
            $mfcid      = $variables["mfcid"];
            $query      = "UPDATE car_models SET mdl_name = '$typeName', mfc_id = $mfcid WHERE mdl_id = $typeId";
            $sql        = mysqli_query($con, $query);
            if($sql){
                header("Location: ".$base."definations/vehicle_mdls/list");
            }

        }
    }
    function carMdlAdd($variables){
        global $base;
        global $con;

        if(!isInjectionWord($variables["type_name"]) && !isInjectionWord($variables["mfcid"])){

            $mdlName    = isset($variables["type_name"]) ? $variables["type_name"] : "null";
            $mfcID      = isset($variables["mfcid"]) ? $variables["mfcid"] : "null";
            $mdlSeo     = getSeoOfName($mdlName);
            $query      = "INSERT INTO car_models(mfc_id, mdl_name, mdl_seo) VALUES ( $mfcID, '$mdlName', '$mdlSeo')";
            $sql        = mysqli_query($con, $query);
            if($sql){
                header("Location: ".$base."definations/vehicle_mdls/list");
            }

        }

    }
    function carMdlDelete($variables){
        global $base;
        global $con;
        if(!isInjectionWord($variables["id"])){

            $mfcId     = $variables["id"];
            $query      = "DELETE FROM car_models WHERE mdl_id = $mfcId";
            $sql        = mysqli_query($con, $query);
            if($sql){
                header("Location: ".$base."definations/vehicle_mdls/list");
            }
        }
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
    function setCarVrsColumns(){
        $uType = getUserGrade();
        $deleteButton = $uType == 1 ? '<a href="delete/\' + row.id + \'" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill"><i class="fa fa-trash"></i></a>\\' : '\\';
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
                                field : "name",
                                title  : "Versiyon Adı"
                            },
                            {
                                field : "mdlname",
                                title  : "Model Adı"
                            },
                            {
                                field: "İşlemler",
                                width: 110,
                                title: "Actions",
                                sortable: false,
                                overflow: "visible",
                                template: function (row, index, datatable) {
                                    var dropup = (datatable.getPageSize() - index) <= 4 ? "dropup" : "";
                    
                                    return \'\
                                    ' . $deleteButton . '
                                    \';
                                }
                            }
                        ]
                    ';

        return $columnObject;
    }
    function carVrsUpdate($variables){
        global $base;
        global $con;
        if(!isInjectionWord($variables["id"]) && !isInjectionWord($variables["mfcid"]) && !isInjectionWord($variables["value"])){

            $typeId     = $variables["id"];
            $typeName   = $variables["value"];
            $mfcid      = $variables["mfcid"];
            $query      = "UPDATE car_versions SET vrs_name = '$typeName', mdl_id = $mfcid WHERE vrs_id = $typeId";
            $sql        = mysqli_query($con, $query);
            if($sql){
                header("Location: ".$base."definations/vehicle_vrss/list");
            }

        }
    }
    function carVrsAdd($variables){
        global $base;
        global $con;

        if(!isInjectionWord($variables["type_name"]) && !isInjectionWord($variables["mfcid"])){

            $mdlName    = isset($variables["type_name"]) ? $variables["type_name"] : "null";
            $mfcID      = isset($variables["mfcid"]) ? $variables["mfcid"] : "null";
            $mdlSeo     = getSeoOfName($mdlName);
            $query      = "INSERT INTO car_versions(mdl_id, vrs_name, vrs_seo) VALUES ( $mfcID, '$mdlName', '$mdlSeo')";
            $sql        = mysqli_query($con, $query);
            if($sql){
                header("Location: ".$base."definations/vehicle_vrss/list");
            }

        }

    }
    function carVrsDelete($variables){
        global $base;
        global $con;
        if(!isInjectionWord($variables["id"])){

            $mfcId     = $variables["id"];
            $query      = "DELETE FROM car_versions WHERE vrs_id = $mfcId";
            $sql        = mysqli_query($con, $query);
            if($sql){
                header("Location: ".$base."definations/vehicle_vrss/list");
            }
        }
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
    function setParamResColumns( $f ){
        $name = "";
        switch($f){
            case 'fuel_types':
                $name = "Yakıt Tipi";break;
            case 'engine_types':
                $name = "Motor Tipi";break;
            case 'tsms_types':
                $name = "Vites Tipi";break;
            case 'colors':
                $name = "Renk Adı";break;
        }
        $uType = getUserGrade();
        $deleteButton = $uType == 1 ? '<a href="delete/\' + row.id + \'" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill"><i class="fa fa-trash"></i></a>\\' : '\\';
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
                                    field : "name",
                                    title  : "'.$name.'"
                                },
                                {
                                    field: "İşlemler",
                                    width: 110,
                                    title: "Actions",
                                    sortable: false,
                                    overflow: "visible",
                                    template: function (row, index, datatable) {
                                        var dropup = (datatable.getPageSize() - index) <= 4 ? "dropup" : "";
                        
                                        return \'\
                                        ' . $deleteButton . '
                                        \';
                                    }
                                }
                            ]
                        ';

        return $columnObject;
    }
    function paramResUpdate($variables, $f){
        global $base;
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

        if(!isInjectionWord($variables["id"]) && !isInjectionWord($variables["value"])){

            $typeId     = $variables["id"];
            $typeName   = $variables["value"];
            $query      = "UPDATE $table SET $columns[1] = '$typeName' WHERE $columns[0] = $typeId";
            $sql        = mysqli_query($con, $query);
            if($sql){
                header("Location: ".$base."definations/$f/list");
            }

        }
    }
    function paramResAdd($variables, $f){
        global $base;
        global $con;

        $table = "";
        $columns = array();

        switch($f){
            case 'fuel_types':
                $table = "fuel_types";$columns[0] = "ftyp_name";break;
            case 'engine_types':
                $table = "engine_types";$columns[0] = "etyp_name";break;
            case 'tsms_types':
                $table = "transmission_types";$columns[0] = "ttyp_name";break;
            case 'colors':
                $table = "colors";$columns[0] = "clr_name";break;
        }


        if(!isInjectionWord($variables["type_name"])){

            $mfcName   = isset($variables["type_name"]) ? $variables["type_name"] : "null";
            $query      = "INSERT INTO $table($columns[0]) VALUES ('$mfcName')";
            $sql        = mysqli_query($con, $query);
            if($sql){
                header("Location: ".$base."definations/$f/list");
            }

        }

    }
    function paramResDelete($variables, $f){
        global $base;
        global $con;

        $table = "";
        $columns = array();

        switch($f){
            case 'fuel_types':
                $table = "fuel_types";$columns[0] = "ftyp_id";break;
            case 'engine_types':
                $table = "engine_types";$columns[0] = "etyp_id";break;
            case 'tsms_types':
                $table = "transmission_types";$columns[0] = "ttyp_id";break;
            case 'colors':
                $table = "colors";$columns[0] = "clr_id";break;
        }

        if(!isInjectionWord($variables["id"])){

            $mfcId     = $variables["id"];
            $query      = "DELETE FROM $table WHERE $columns[0] = $mfcId";
            $sql        = mysqli_query($con, $query);
            if($sql){
                header("Location: ".$base."definations/$f/list");
            }
        }
    }

    $columns    = "";
    $data       = "";
    switch ($f){
        case 'vehicle_types':
            $columns    = setCarTypeColumns();
            $data       = getCarTypes();
            $page["name"] = "Araç Tipi";
            break;
        case 'vehicle_mfcs':
            $columns    = setCarMfcColumns();
            $data       = getCarMfcs();
            $page["name"] = "Araç Markası";
            break;
        case 'vehicle_mdls':
            $columns    = setCarMdlsColumns();
            $data       = getCarMdls();
            $page["name"] = "Araç Modeli";
            break;
        case 'vehicle_vrss':
            $columns    = setCarVrsColumns();
            $data       = getCarVrs();
            $page["name"] = "Model Versiyonu";
            break;
        case 'fuel_types':
            $columns    = setParamResColumns($f);
            $data       = getParamRes($f);
            $page["name"] = "Yakıt Tipi";
            break;
        case 'engine_types':
            $columns    = setParamResColumns($f);
            $data       = getParamRes($f);
            $page["name"] = "Motor Tipi";
            break;
        case 'tsms_types':
            $columns    = setParamResColumns($f);
            $data       = getParamRes($f);
            $page["name"] = "Vites Tipi";
            break;
        case 'colors':
            $columns    = setParamResColumns($f);
            $data       = getParamRes($f);
            $page["name"] = "Renk";
            break;
    }

    switch($f){
        default:
            require_once $vP."v_defination_list.php";
    }

    require_once $vP."main/footer.php";

?>