<?php
    require_once "database.inc.php";

    session_start();

    $db = new Database();
    
    if(isset($_POST["addedProduct"])) {
        $db -> connect("update", "admin_product", array(
            "productCode" => $_POST["productCode"],
            "quantity" => $_POST["quantity"],
            "price" => $_POST["price"],
        ));

        $result = $db -> connect("select", "admin_product", "product code", $_POST["productCode"]);

        echo json_encode($result);
    }
?>