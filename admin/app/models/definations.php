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
            $query      = "DELETE FROM car_manifacturers WHERE mfc_id = $mfcId";
            $sql        = mysqli_query($con, $query);
            if($sql){
                header("Location: ".$base."definations/vehicle_mfcs/list");
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
    }

    switch($f){
        default:
            require_once $vP."v_defination_list.php";
    }

    require_once $vP."main/footer.php";

?>