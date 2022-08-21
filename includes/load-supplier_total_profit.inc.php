<?php
    require_once "database.inc.php";

    session_start();

    $db = new Database();

    $result = $db -> connect("select", "supplier_customer", "order status");
    $total = 0;

    forEach($result as $database => $row){
        if(strcmp($row['supplier uid'], $_SESSION["uid"]) == 0) {
            $total += $row['total'];
        }
    }

    echo "Php " . number_format($total, 2);
?>