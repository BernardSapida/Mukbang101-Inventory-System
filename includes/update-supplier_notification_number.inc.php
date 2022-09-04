<?php
    require_once "database.inc.php";

    session_start();

    $db = new Database();

    $_SESSION["notification number"] = 0;

    $db -> connect("update", "accounts", array(
        "supplierName" => $_SESSION["store name"],
        "notificationNumber" => 0,
    ), "notification");

    echo "sucess";
?>