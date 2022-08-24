<?php
    require_once "database.inc.php";

    $db = new Database();
    $array = array();
    $nameIndex = 0;
    $quantityIndex = 1;
    $priceIndex = 2;
    $filteredItems = array_splice($_POST, 0, count($_POST) - 5);
    $array = array();
    $productNames = array();
    $productQuantities = array();
    $productPrices = array();

    foreach($filteredItems as $key => $value) {
        array_push($array, $value);
    }

    for($i = 0; $i < (count($array) / 3); $i++) {
        array_push($productNames, $array[$nameIndex]);
        array_push($productQuantities, $array[$quantityIndex]);
        array_push($productPrices, $array[$priceIndex]);

        $nameIndex += 3;
        $quantityIndex += 3;
        $priceIndex += 3;
    }

    $result = $db->connect("insert", "admin_transaction_sales", array(
        "referenceNo" => $_POST["referenceNo"],
        "productName" => implode(" && ", $productNames),
        "quantity" => implode(" && ", $productQuantities),
        "price" => implode(" && ", $productPrices),
        "vat12" => $_POST["vat"],
        "discount" => $_POST["discount"],
        "totalAmount" => $_POST["totalAmount"],
    ));

    echo json_encode($productPrices);
?>