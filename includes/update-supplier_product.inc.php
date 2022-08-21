<?php
    require_once "database.inc.php";

    session_start();

    $db = new Database();
    
    if(isset($_POST["addedProduct"])) {
        $db -> connect("update", "supplier_product", array(
            "supplierUID" => $_SESSION["uid"],
            "productCode" => $_POST["productCode"],
            "productName" => $_POST["productName"],
            "category" => $_POST["category"],
            "boxQuantity" => $_POST["boxQuantity"],
            "pcsPerBox" => $_POST["pcsPerBox"],
            "pricePerBox" => $_POST["pricePerBox"],
        ));

        $result = $db -> connect("select", "supplier_product", "product code", $_POST["productCode"]);

        echo json_encode($result);
    }
?>