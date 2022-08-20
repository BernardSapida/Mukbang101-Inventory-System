<?php
    require_once "database.inc.php";

    $db = new Database();
    
    echo "test";
    
    if(isset($_POST["addedProduct"])) {
        $db -> connect("update", "supplier_product", array(
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