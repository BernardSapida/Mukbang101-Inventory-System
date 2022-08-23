<?php
    $current_page = empty($_GET["page"]) ? "" : $_GET["page"];

    switch($current_page) {
        case "admin-dashboard":
            echo '<link rel="stylesheet" href="../css/admin-dashboard.css">';
            echo '<script defer src="../js/admin-dashboard.js"></script>';
            break;
        case "admin-product":
            echo '<link rel="stylesheet" href="../css/admin-product.css">';
            echo '<script defer src="../js/admin-product.js"></script>';
            break;
        case "admin-checkout":
            echo '<link rel="stylesheet" href="../css/admin-checkout.css">';
            echo '<script defer src="../js/admin-checkout.js"></script>';
            break;
        case "admin-sales_invoice":
            echo '<link rel="stylesheet" href="../css/admin-sales_invoice.css">';
            echo '<script defer src="../js/admin-sales_invoice.js"></script>';
            break;
        case "admin-transaction":
            echo '<link rel="stylesheet" href="../css/admin-transaction.css">';
            echo '<script defer src="../js/admin-transaction.js"></script>';
            break;
        case "admin-supplier":
            echo '<link rel="stylesheet" href="../css/admin-supplier.css">';
            echo '<script defer src="../js/admin-supplier.js"></script>';
            break;
        case "admin-tracking_orders":
            echo '<link rel="stylesheet" href="../css/admin-tracking_order.css">';
            echo '<script defer src="../js/admin_tracking_orders.js"></script>';
            break;
        case "admin-account":
            echo '<link rel="stylesheet" href="../css/admin-account.css">';
            echo '<script defer src="../js/admin-account.js"></script>';
            break;
        case "admin-transaction_sales":
            echo '<link rel="stylesheet" href="../css/admin-transaction_sales.css">';
            break;
        default:
            echo '<link rel="stylesheet" href="../css/admin-dashboard.css">';
            echo '<script defer src="../js/admin-dashboard.js"></script>';
            break;
    }
?>