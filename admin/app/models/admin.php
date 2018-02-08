<?php
/**
 * Created by PhpStorm.
 * User: yadigarbz
 * Date: 8.02.2018
 * Time: 11:04
 */
$vP= $aBase."\../views/";

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
        $query      = "DELETE FROM car_models WHERE mdl_id = $mfcId";
        $sql        = mysqli_query($con, $query);
        if($sql){
            header("Location: ".$base."definations/vehicle_mdls/list");
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
switch ($f){
    case 'slides':
        $columns    = setSlideColumns();
        $data       = getSlides();
        $page["name"] = "Slayt";
        break;
}

switch($f){
    default:
        require_once $vP."v_slide_add.php";
}

require_once $vP."main/footer.php";

?>