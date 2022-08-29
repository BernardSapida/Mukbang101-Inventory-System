<?php
    require_once "database.inc.php";

    $db = new Database();


    if(isset($_POST['productCode'])) {
        $result = $db -> connect(
            "update", 
            "admin_product", 
            array(
                "productCode" => $_POST["productCode"], 
                "status" => $_POST["status"]
            ),
            "status"
        );
        echo $result;
    }
?>