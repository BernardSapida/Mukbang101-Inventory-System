<?php
    require_once "database.inc.php";

    session_start();

    $db = new Database();
    $result = $db -> connect("select", "supplier_product", array("supplierName" => $_POST["selectedSupplier"]));
    $account = $db -> connect("select", "accounts", "store name", $_POST["selectedSupplier"]);
    
    echo "<option value=''>-- select product --</option>";

    forEach($result as $database => $row){
        echo "<option value='" . $row["product name"] . "'>" . $row["product name"] . "</option>";
    }
?>