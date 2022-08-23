<?php
    require_once "database.inc.php";

    $db = new Database();
    $result = $db -> connect("select", "admin_orders", "all records");
    $array = array();
    $processing = 0;
    $toShip = 0;
    $toReceive = 0;
    $completed = 0;
    $cancelled = 0;

    forEach($result as $database => $row) {
        if(strcmp($row['order status'], "Processing") == 0) $processing++;
        if(strcmp($row['order status'], "To ship") == 0) $toShip++;
        if(strcmp($row['order status'], "To receive") == 0) $toReceive++;
        if(strcmp($row['order status'], "Completed") == 0) $completed++;
        if(strcmp($row['order status'], "Cancelled") == 0) $cancelled++;
    }

    $array["Processing"] = $processing;
    $array["To ship"] = $toShip;
    $array["To receive"] = $toReceive;
    $array["Completed"] = $completed;
    $array["Cancelled"] = $cancelled;

    echo json_encode($array);
?>