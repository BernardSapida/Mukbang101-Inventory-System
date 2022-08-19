<?php
    if(isset($_GET['page'])) {
        $page = $_GET['page'];

        # file_get_contents('pagetest2.php')

        switch($page) {
            case "admin-dashboard":
                $array = array(
                    'page' => "pagetest.php"
                );
                break;
            case "admin-product":
                $array = array(
                    'page' => "pagetest.php"
                );
                break;
            case "admin-sales_invoice.php":
                echo json_encode(array(
                    'page' => "pagetest.php"
                ));
                break;
            case "admin-transaction.php":
                echo json_encode(array(
                    'page' => "pagetest.php"
                ));
                break;
            case "admin-supplier.php":
                echo json_encode(array(
                    'page' => "pagetest.php"
                ));
                break;
            case "admin-tracking_orders.php":
                echo json_encode(array(
                    'page' => "pagetest.php"
                ));
                break;
            case "admin-account.php":
                echo json_encode(array(
                    'page' => "pagetest.php"
                ));
                break;
        }
    }
?>
