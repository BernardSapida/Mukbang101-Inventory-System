<?php
    require_once "database.inc.php";

    session_start();

    $db = new Database();
    $result = $db -> connect("select", "admin_product");
    
    echo "<option value=''>-- select product --</option>";

    forEach($result as $database => $row){
        echo "<option value='" . $row["product name"] . "'>" . $row["product name"] . "</option>";
    }
?>