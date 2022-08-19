<?php
    $current_page = empty($_GET["page"]) ? "" : $_GET["page"];


    switch($current_page) {
        case "supplier-dashboard":
            echo '<link rel="stylesheet" href="../css/supplier-dashboard.css">';
            echo '<script defer src="../js/supplier-dashboard.js"></script>';
            break;
        case "supplier-product": 
            echo '<link rel="stylesheet" href="../css/supplier-product.css">';
            echo '<script defer src="../js/supplier-product.js"></script>';
            break;
        case "supplier-transaction":
            echo '<link rel="stylesheet" href="../css/supplier-transaction.css">';
            echo '<script defer src="../js/supplier-transaction.js"></script>';
            break;
        case "supplier-order_status":
            echo '<link rel="stylesheet" href="../css/supplier-order_status.css">';
            echo '<script defer src="../js/supplier-order_status.js"></script>';
            break;
        case "supplier-account":
            echo '<link rel="stylesheet" href="../css/supplier-account.css">';
            echo '<script defer src="../js/supplier-account.js"></script>';
            break;
        default:
            echo '<link rel="stylesheet" href="../css/supplier-dashboard.css">';
            break;
    }
?>