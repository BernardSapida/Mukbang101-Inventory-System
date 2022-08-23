<?php
    require_once "database.inc.php";

    session_start();

    $db = new Database();

    if(isset($_POST["productCode"])) {
        $result = $db -> connect("select", "supplier_product", "product code", $_POST["productCode"]);
        $result["name"] = $_SESSION["firstname"] . " " . $_SESSION["lastname"];
        $result["address"] = $_SESSION["address"];
        $result["contact no."] = $_SESSION["contact no."];

        echo json_encode($result);
    }
?>