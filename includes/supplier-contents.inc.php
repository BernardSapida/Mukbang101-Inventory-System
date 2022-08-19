<?php
    $current_page = empty($_GET["page"]) ? "" : $_GET["page"];

    switch($current_page) {
        case "supplier-dashboard":
            include_once "supplier/supplier-dashboard.php";
            break;
        case "supplier-product":
            include_once "supplier/supplier-product.php";
            break;
        case "supplier-transaction":
            include_once "supplier/supplier-transaction.php";
            break;
        case "supplier-order_status":
            include_once "supplier/supplier-order_status.php";
            break;
        case "supplier-account":
            include_once "supplier/supplier-account.php";
            break;
        default:
            include_once "supplier/supplier-dashboard.php";
            break;
    }
?>