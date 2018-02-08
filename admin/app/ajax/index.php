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

    function imageUpload($image, $hoid, $subname){

        global $base;

        $target_dir = __DIR__."../../../../images/cars/";
        $target_file = $target_dir . basename($image["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $check = getimagesize($image["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }
        if($uploadOk == 1) {
            $fType = "";
            $imageResized = resizeImage($image, 1920);
            switch ($image['type']) {
                case 'image/jpeg':
                    $fType = "jpg";
                    break;
                case 'image/png':
                    $fType = "png";
                    break;
                default: return false;
            }
            if($fType == "jpg") {
                if(imagejpeg($imageResized, $target_dir.$hoid . "_".$subname."_" . "_1920." . $imageFileType))return true;
                else return false;
            }
            elseif($fType == "png")
                if(imagepng($imageResized, $target_dir.$hoid. "_".$subname."_" . "_1920.". $imageFileType)) return true;
                else return false;
            else return false;

        }else{
            return false;
        }

    }
    function resizeImage($image, $w, $h = 0){

        $fType = "";
        list($width, $height) = getimagesize($image["tmp_name"]);
        switch ($image['type']) {
            case 'image/jpeg':
                $fType = "jpg";
                break;
            case 'image/png':
                $fType = "png";
                break;
            default: return false;
        }

        if($h == 0){

            if($fType == "png"){

                $ratio = ceil(($height/$width)*100);
                $newWidth = $w;
                $newHeight = ceil(($w/100)*$ratio);

                $src = imagecreatefrompng($image["tmp_name"]);
                $dst = imagecreatetruecolor($newWidth, $newHeight);
                imagealphablending($dst, false);
                imagesavealpha($dst,true);
                $transparent = imagecolorallocatealpha($dst, 255, 255, 255, 127);
                imagefilledrectangle($dst, 0, 0, $newWidth, $newHeight, $transparent);
                imagecopyresampled($dst, $src, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

                return $dst;

            }elseif($fType == "jpg"){

                $ratio = ceil(($height/$width)*100);
                $newWidth = $w;
                $newHeight = ceil(($w/100)*$ratio);

                $src = imagecreatefromjpeg($image["tmp_name"]);
                $dst = imagecreatetruecolor($newWidth, $newHeight);
                imagecopyresampled($dst, $src, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

                return $dst;

            }

        }else{

            if($fType == "png"){

                $newWidth = $w;
                $newHeight = $h;

                $src = imagecreatefrompng($image["tmp_name"]);
                $dst = imagecreatetruecolor($newWidth, $newHeight);
                imagecopyresampled($dst, $src, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

                return $dst;

            }elseif($fType == "jpg"){

                $newWidth = $w;
                $newHeight = $h;

                $src = imagecreatefromjpeg($image["tmp_name"]);
                $dst = imagecreatetruecolor($newWidth, $newHeight);
                imagecopyresampled($dst, $src, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

                return $dst;

            }

        }
    }

    function photoUploader ( $param, $file ){

        global $con;

        if(!isInjectionWord($param)) {

            $query = "SELECT count(photo_id) FROM car_photos WHERE car_id = $param";
            $sql = mysqli_query($con, $query);
            if($sql) {

                $photoSub = intval(mysqli_fetch_array($sql)[0]) + 1;

                if (imageUpload($file["file"], $param, $photoSub)) {
                    $target_dir = __DIR__ . "../../../../images/cars/";
                    $target_file = $target_dir . basename($file["file"]["name"]);
                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                    $photoName = $param . "_" . $photoSub . "_" . "_1920." . $imageFileType;
                    $query = "INSERT INTO car_photos(car_id, photo_path) VALUES($param, '$photoName')";
                    $sql = mysqli_query($con, $query);
                    if ($sql) {
                        return true;
                    } else return false;
                } else return false;

            }else return false;

        }else return false;

    }

    function delmainphoto($param){

        global $con;
        if(!isInjectionWord($param)) {
            $query = "UPDATE car_photos SET is_main = 0 WHERE car_id = $param";
            $sql = mysqli_query($con, $query);
            if($sql){
                return true;
            }else{
                return false;
            }
        }else return false;

    }

    function domainphoto($param, $p1){

        global $con;
        if(!isInjectionWord($param) && !isInjectionWord($p1)) {
            $query = "UPDATE car_photos SET is_main = 0 WHERE car_id = $p1";
            $sql = mysqli_query($con, $query);
            if($sql) {
                $query = "UPDATE car_photos SET is_main = 1 WHERE photo_id = $param";
                $sql = mysqli_query($con, $query);
                if ($sql) return true;
                else return false;
            }else return false;
        }else return false;

    }

    function delphoto( $p ){
        global $con;
        if(!isInjectionWord($p)) {
            $query = "DELETE FROM car_photos WHERE photo_id = $p";
            $sql = mysqli_query($con, $query);
            if($sql) return true;
            else return false;
        }else return false;
    }

    if(isset($_GET["f"]) && isset($_GET["param"])){

        $f = $_GET["f"];
        $p = $_GET["param"];
        $p1 = 0;

        if(isset($_GET["param1"]))
            $p1 = $_GET["param1"];

        if(!isInjectionWord($p)){

            switch($f){
                case "delphoto":
                    echo delphoto($p);break;
                case "domainphoto":
                    echo domainphoto($p, $p1);break;
                case "delmainphoto":
                    echo delmainphoto($p);break;
                case "upCarPhoto":
                    photoUploader($p, $_FILES);break;
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