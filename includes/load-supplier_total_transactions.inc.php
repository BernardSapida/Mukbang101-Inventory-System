<?php
    require_once "database.inc.php";

    session_start();

    $db = new Database();

    $result = $db -> connect("select", "supplier_customer", "order status");
    $count = 0;

    forEach($result as $database => $row){
        if(strcmp($row['supplier uid'], $_SESSION["uid"]) == 0) {
            $count++;
        }
    }

    echo $count;
?>