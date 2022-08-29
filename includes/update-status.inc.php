<?php
    require_once "database.inc.php";

    $db = new Database();

    $db -> connect("update", "supplier_customer", array(
            "transactionNo" => $_POST['transactionNo'],
            "orderStatus" => $_POST["status"],
    ));

    $db -> connect("update", "admin_orders", array(
            "transactionNo" => $_POST['transactionNo'],
            "orderStatus" => $_POST["status"],
    ));

    if(strcmp($_POST["status"], "Completed") == 0) {
        $adminOrders = $db -> connect("select", "admin_orders", "transaction no.", $_POST["transactionNo"]);
        $doesExist = $db -> connect("select", "admin_product", "product name", $adminOrders["product name"]);
        $supplier = $db -> connect("select", "supplier_product", "product name", $adminOrders["product name"]);
        
        if(!empty($doesExist)) {
            echo "UPDATE";
            $db -> connect("update", "admin_product", array(
                "productCode" => $doesExist["product code"],
                "productName" => $doesExist["product name"],
                "category" => $doesExist["category"],
                "quantity" => $doesExist["quantity"] + ($adminOrders["pcs per box"] * $adminOrders["box quantity"]),
                "price" => $doesExist["price"],
            ));
        } else {
            echo "INSERT";
            $db -> connect("insert", "admin_product", array(
                "productCode" => $adminOrders["product code"],
                "productName" => $adminOrders["product name"],
                "category" => $supplier["category"],
                "quantity" => ($adminOrders["pcs per box"] * $adminOrders["box quantity"]),
                "price" => "0",
                "status" => "ACTIVE"
            ));
        }
    } 
    
?>