<?php
    $current_page = empty($_GET["page"]) ? "" : $_GET["page"];

    switch($current_page) {
        case "admin-dashboard":
            require_once "admin/admin-dashboard.php";
            break;
        case "admin-product":
            require_once "admin/admin-product.php";
            break;
        case "admin-checkout":
            require_once "admin/admin-checkout.php";
            break;
        case "admin-sales_invoice":
            require_once "admin/admin-sales_invoice.php";
            break;
        case "admin-receipt_record":
            require_once "admin/admin-transaction_sales.php";
            break;
        case "admin-transaction":
            require_once "admin/admin-transaction.php";
            break;
        case "admin-supplier":
            require_once "admin/admin-supplier.php";
            break;
        case "admin-tracking_orders":
            require_once "admin/admin-tracking_orders.php";
            break;
        case "admin-account":
            require_once "admin/admin-account.php";
            break;
        case "admin-tracking_table":
            require_once "admin/admin-tracking_table.php";
            break;
        case "admin-transaction_sales":
            require_once "admin/admin-transaction_sales.php";
            break;
        default:
            require_once "admin/admin-dashboard.php";
            break;
    }
?>