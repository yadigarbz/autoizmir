<?php
/**
 * Created by PhpStorm.
 * User: yadigarbz
 * Date: 2.02.2018
 * Time: 13:20
 */

    $vP= $aBase."\../views/";

    if($p == "logout"){

        $_SESSION["login"] = false;
        setcookie("user", "", time() -3600);
        setcookie("usermail", "", time() -3600);
        header("Location: index.html");

    }else {

        if (isset($_POST["login"]))
            $loaderSta = true;

        function getAuth($username, $password)
        {

            global $base;
            global $con;
            $pass = md5($password);
            $sql = mysqli_query($con, "SELECT display_name as name, user_name as usern, user_pass as pass FROM admin_users WHERE user_mail = '$username'");
            if ($sql) {
                $data = mysqli_fetch_array($sql);

                if ($data["pass"] == $pass) {
                    $_SESSION["login"] = true;
                    $user["name"] = $data["name"];
                    $user["user"] = $data["usern"];
                    setcookie("user", $user["name"], time() + 3600);
                    setcookie("usermail", $username, time() + 3600);
                    header("Location: " . $base .  "index.html");
                } else {
                    echo "Hatalı Giriş";
                }

            }

        }

        require_once $vP . "main/header.php";

        require_once $vP . "v_login.php";

        require_once $vP . "main/footer.php";

    }

?>