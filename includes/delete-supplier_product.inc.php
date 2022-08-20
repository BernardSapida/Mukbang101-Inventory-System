<?php
    require_once "database.inc.php";

    $db = new Database();


    if(isset($_POST['productCode'])) {
        $db -> connect(
            "delete", 
            "supplier_product", 
            array(
                "productCode" => $_POST["productCode"], 
            )
        );
    }
?>