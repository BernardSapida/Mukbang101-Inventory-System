<?php
    require_once "database.inc.php";

    $db = new Database();

    if(isset($_POST["productCode"])) {
        $result = $db -> connect("select", "supplier_product", "product code", $_POST["productCode"]);

        echo json_encode($result);
    }
?>