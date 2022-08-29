<?php
    require_once "database.inc.php";

    session_start();

    $db = new Database();
    
    if(isset($_POST["addedProduct"])) {
        $db -> connect("update", "admin_product", array(
            "productCode" => $_POST["productCode"],
            "productName" => $_POST["productName"],
            "category" => $_POST["category"],
            "quantity" => $_POST["quantity"],
            "price" => $_POST["price"],
        ));

        $result = $db -> connect("select", "admin_product", "product code", $_POST["productCode"]);

        echo json_encode($result);
    }
?>