<?php
    $current_page = empty($_GET["page"]) ? "" : $_GET["page"];

    switch($current_page) {
        case "admin-dashboard":
            echo file_get_contents('admin/admin-dashboard.php');
            break;
        case "admin-product":
            echo file_get_contents('admin/admin-product.php');
            break;
        case "admin-sales_invoice":
            echo file_get_contents('admin/admin-sales_invoice.php');
            break;
        case "admin-transaction":
            echo file_get_contents('admin/admin-transaction.php');
            break;
        case "admin-supplier":
            echo file_get_contents('admin/admin-supplier.php');
            break;
        case "admin-tracking_orders":
            echo file_get_contents('admin/admin-tracking_orders.php');
            break;
        case "admin-account":
            echo file_get_contents('admin/admin-account.php');
            break;
        case "admin-tracking_table":
            echo file_get_contents('admin/admin-tracking_table.php');
            break;
        case "admin-transaction_sales":
            echo file_get_contents('admin/admin-transaction_sales.php');
            break;
        case "admin-checkout":
            echo file_get_contents('admin/admin-checkout.php');
            break;
        default:
            echo file_get_contents('admin/admin-dashboard.php');
            break;
    }
?>