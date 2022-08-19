<?php
    $current_page = empty($_GET["page"]) ? "" : $_GET["page"];

    switch($current_page) {
        case "admin-dashboard":
            echo '<link rel="stylesheet" href="../css/admin-dashboard.css">';
            break;
        case "admin-product":
            echo '<link rel="stylesheet" href="../css/admin-product.css">';
            echo '<script defer src="../js/admin-product.js"></script>';
            break;
        case "admin-sales_invoice":
            echo '<link rel="stylesheet" href="../css/admin-sales_invoice.css">';
            echo '<script defer src="../js/admin-sales_invoice.js"></script>';
            break;
        case "admin-transaction":
            echo '<link rel="stylesheet" href="../css/admin-transaction.css">';
            break;
        case "admin-supplier":
            echo '<link rel="stylesheet" href="../css/admin-supplier.css">';
            echo '<script defer src="../js/admin-supplier.js"></script>';
            break;
        case "admin-tracking_orders":
            echo '<link rel="stylesheet" href="../css/admin-tracking_order.css">';
            break;
        case "admin-account":
            echo '<link rel="stylesheet" href="../css/admin-account.css">';
            echo '<script defer src="../js/admin-account.js"></script>';
            break;
        case "admin-tracking_table":
            echo '<link rel="stylesheet" href="../css/admin-tracking_order_table.css">';
            break;
        case "admin-transaction_sales":
            echo '<link rel="stylesheet" href="../css/admin-transaction_sales.css">';
            break;
        case "admin-checkout":
            echo '<link rel="stylesheet" href="../css/admin-checkout.css">';
            break;
        default:
            echo '<link rel="stylesheet" href="../css/admin-dashboard.css">';
            break;
    }
?>