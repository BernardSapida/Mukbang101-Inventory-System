<?php
    require_once "database.inc.php";

    $db = new Database();


    if(isset($_POST['productCode'])) {
        $db -> connect(
            "delete", 
            "admin_product", 
            array(
                "productCode" => $_POST["productCode"], 
            )
        );
    }
?>