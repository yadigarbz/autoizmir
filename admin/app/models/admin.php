<?php
/**
 * Created by PhpStorm.
 * User: yadigarbz
 * Date: 8.02.2018
 * Time: 11:04
 */
$vP= $aBase."/../views/";

require_once $vP."main/header.php";

function getCars(){
    global $con;
    $cars = array();
    $query = "select car_id as id, car_title as name from cars where sta_id = 1";
    $sql = mysqli_query($con, $query);
    if($sql)
        while($data = mysqli_fetch_assoc($sql))
            $cars[] = $data;

    return $cars;
}

function getSlides(){
    global $con;
    $types = array();
    $query = "SELECT sl.slide_id as id, sl.slide_title as name, cr.car_title as title FROM slides sl
              INNER JOIN cars cr ON cr.car_id = sl.car_id";
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
function setSlideColumns(){
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
                            title  : "Slide Başlığı"
                        },
                        {
                            field : "title",
                            title  : "İlan Adı"
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
function slideUpdate($variables){
    global $base;
    global $con;
    if(!isInjectionWord($variables["id"]) && !isInjectionWord($variables["mfcid"]) && !isInjectionWord($variables["value"])){

        $typeId     = $variables["id"];
        $typeName   = $variables["value"];
        $mfcid      = $variables["mfcid"];
        $query      = "UPDATE slides SET slide_title = '$typeName', car_id = $mfcid WHERE slide_id = $typeId";
        $sql        = mysqli_query($con, $query);
        if($sql){
            header("Location: ".$base."adminf/slides/list");
        }

    }
}
function slideAdd($variables){
    global $base;
    global $con;

    if(!isInjectionWord($variables["type_name"]) && !isInjectionWord($variables["mfcid"])){

        $mdlName    = isset($variables["type_name"]) ? $variables["type_name"] : "null";
        $mfcID      = isset($variables["mfcid"]) ? $variables["mfcid"] : "null";
        $query      = "INSERT INTO slides(car_id, slide_title) VALUES ( $mfcID, '$mdlName')";
        $sql        = mysqli_query($con, $query);
        if($sql){
            header("Location: ".$base."adminf/slides/list");
        }else echo mysqli_error($con);

    }else{
        echo "fuck";
    }

}
function slideDelete($variables){
    global $base;
    global $con;
    if(!isInjectionWord($variables["id"])){

        $mfcId     = $variables["id"];
        $query      = "DELETE FROM slides WHERE slide_id = $mfcId";
        $sql        = mysqli_query($con, $query);
        if($sql){
            header("Location: ".$base."adminf/slides/list");
        }
    }
}

function getBenzins(){
    global $con;
    $types = array();
    $query = "SELECT sl.slide_id as id, cr.car_title as title FROM benzinSlider sl
              INNER JOIN cars cr ON cr.car_id = sl.car_id";
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
function setBenzinColumns(){
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
                            field : "title",
                            title  : "İlan Adı"
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
function benzinUpdate($variables){
    global $base;
    global $con;
    if(!isInjectionWord($variables["id"]) && !isInjectionWord($variables["mfcid"])){

        $typeId     = $variables["id"];
        $mfcid      = $variables["mfcid"];
        $query      = "UPDATE benzinSlider SET car_id = $mfcid WHERE slide_id = $typeId";
        $sql        = mysqli_query($con, $query);
        if($sql){
            header("Location: ".$base."adminf/benzins/list");
        }

    }
}
function benzinAdd($variables){
    global $base;
    global $con;

    if(!isInjectionWord($variables["mfcid"])){

        $mfcID      = isset($variables["mfcid"]) ? $variables["mfcid"] : "null";
        $query      = "INSERT INTO benzinSlider(car_id) VALUES ( $mfcID)";
        $sql        = mysqli_query($con, $query);
        if($sql){
            header("Location: ".$base."adminf/benzins/list");
        }else echo mysqli_error($con);

    }else{
        echo "fuck";
    }

}
function benzinDelete($variables){
    global $base;
    global $con;
    if(!isInjectionWord($variables["id"])){

        $mfcId     = $variables["id"];
        $query      = "DELETE FROM benzinSlider WHERE slide_id = $mfcId";
        $sql        = mysqli_query($con, $query);
        if($sql){
            header("Location: ".$base."adminf/benzins/list");
        }
    }
}

function getDizels(){
    global $con;
    $types = array();
    $query = "SELECT sl.slide_id as id, cr.car_title as title FROM dizelSlider sl
              INNER JOIN cars cr ON cr.car_id = sl.car_id";
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
function setDizelColumns(){
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
                            field : "title",
                            title  : "İlan Adı"
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
function dizelUpdate($variables){
    global $base;
    global $con;
    if(!isInjectionWord($variables["id"]) && !isInjectionWord($variables["mfcid"])){

        $typeId     = $variables["id"];
        $mfcid      = $variables["mfcid"];
        $query      = "UPDATE dizelSlider SET car_id = $mfcid WHERE slide_id = $typeId";
        $sql        = mysqli_query($con, $query);
        if($sql){
            header("Location: ".$base."adminf/dizels/list");
        }

    }
}
function dizelAdd($variables){
    global $base;
    global $con;

    if(!isInjectionWord($variables["mfcid"])){

        $mfcID      = isset($variables["mfcid"]) ? $variables["mfcid"] : "null";
        $query      = "INSERT INTO dizelSlider(car_id) VALUES ( $mfcID)";
        $sql        = mysqli_query($con, $query);
        if($sql){
            header("Location: ".$base."adminf/dizels/list");
        }else echo mysqli_error($con);

    }else{
        echo "fuck";
    }

}
function dizelDelete($variables){
    global $base;
    global $con;
    if(!isInjectionWord($variables["id"])){

        $mfcId     = $variables["id"];
        $query      = "DELETE FROM dizelSlider WHERE slide_id = $mfcId";
        $sql        = mysqli_query($con, $query);
        if($sql){
            header("Location: ".$base."adminf/dizels/list");
        }
    }
}

if(isset($_GET["f"]))
    $f = $_GET["f"];

if(isset($_GET["param"]))
    $param = $_GET["param"];
else
    $param = "list";

$columns    = "";
$data       = "";

switch($f){
    case 'dizels':
        $columns    = setDizelColumns();
        $data       = getDizels();
        $page["name"] = "Dizel Slayt";
        require_once $vP."v_dizel_add.php";
        break;
    case 'benzins':
        $columns    = setBenzinColumns();
        $data       = getBenzins();
        $page["name"] = "Benzin Slayt";
        require_once $vP."v_benzin_add.php";
        break;
    default:
        $columns    = setSlideColumns();
        $data       = getSlides();
        $page["name"] = "Slayt";
        require_once $vP."v_slide_add.php";
}

require_once $vP."main/footer.php";

?>