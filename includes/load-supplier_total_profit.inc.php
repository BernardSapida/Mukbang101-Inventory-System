<?php
    require_once "database.inc.php";

    $db = new Database();

    $result = $db -> connect("select", "supplier_customer", "order status");
    $total = 0;

    forEach($result as $database => $row){
        $total += $row['total'];
    }

    echo "Php " . number_format($total, 2);
?>