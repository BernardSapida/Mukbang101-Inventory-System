<?php
    require_once "database.inc.php";

    session_start();

    $db = new Database();
    if(isset($_POST["selectedSupplier"])) {
        $result = $db -> connect("select", "supplier_product", "supplier name", $_POST["selectedSupplier"]);
        $account = $db -> connect("select", "accounts", "store name", $_POST["selectedSupplier"]);

        $result["name"] = $_SESSION["firstname"] . " " . $_SESSION["lastname"];
        $result["address"] = $_SESSION["address"];
        $result["contact no."] = $_SESSION["contact no."];
        $result["payment name"] = $account["payment name"];
        $result["payment number"] = $account["payment number"];

        echo json_encode($result);
    }
?>