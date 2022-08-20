<?php
    require_once "database.inc.php";

    session_start();

    $db = new Database();

    $result = $db -> connect("select", "accounts", "uid", $_SESSION["uid"]);
    $errPassword = "";

    if(!password_verify($_POST["current_password"], $result["password"])) {
        $errPassword = "Current password is incorrect!";
    } else {
        $result = $db -> connect(
            "update", 
            "accounts", 
            array(
                "uid" => $_SESSION["uid"], 
                "password" => password_hash($_POST["new_password"], PASSWORD_DEFAULT)
            ),
            "password"
        );
    }

    
    
    if(empty($errPassword)) {
        if(!empty($result)) echo true;
    } else {
        echo $errPassword;
    }
?>