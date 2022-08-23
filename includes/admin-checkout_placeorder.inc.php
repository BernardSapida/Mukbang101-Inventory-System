<?php
    require_once "database.inc.php";

    session_start();

    $db = new Database();

    $db -> connect("insert", "admin_orders", array(
        "transactionNo" => uniqid(rand(0,999)),
        "name" => $_POST["name"],
        "deliveryAddress" => $_POST["deliveryAddress"],
        "contactNo" => $_POST["contactNo"],
        "emailAddress" => $_SESSION["email"],
        "supplierName" => $_POST["supplierName"],
        "productCode" => $_POST["productCode"],
        "productName" => $_POST["productName"],
        "boxQuantity" => $_POST["boxQuantity"],
        "pcsPerBox" => $_POST["pcsPerBox"],
        "pricePerBox" => $_POST["pricePerBox"],
        "paymentMethod" => $_POST["paymentMethod"],
        "referenceNo" => $_POST["referenceNo"],
        "vat12" => $_POST["vat"],
        "shippingFee" => $_POST["shippingFee"],
        "discount" => $_POST["discount"],
        "total" => $_POST["total"],
        "orderStatus" => "Processing"
    ));

    $result = $db -> connect("insert", "supplier_customer", array(
        "supplierName" => $_POST["supplierName"],
        "transactionNo" => uniqid(rand(0,999)),
        "customerName" => $_POST["name"],
        "deliveryAddress" => $_POST["deliveryAddress"],
        "contactNo" => $_POST["contactNo"],
        "emailAddress" => $_SESSION["email"],
        "customerStoreName" => $_SESSION["store name"],
        "productCode" => $_POST["productCode"],
        "productName" => $_POST["productName"],
        "boxQuantity" => $_POST["boxQuantity"],
        "pcsPerBox" => $_POST["pcsPerBox"],
        "pricePerBox" => $_POST["pricePerBox"],
        "paymentMethod" => $_POST["paymentMethod"],
        "referenceNo" => $_POST["referenceNo"],
        "vat12" => $_POST["vat"],
        "shippingFee" => $_POST["shippingFee"],
        "discount" => $_POST["discount"],
        "total" => $_POST["total"],
        "orderStatus" => "Processing"
    ));

    echo "TEST";

    echo json_encode($result);
?>