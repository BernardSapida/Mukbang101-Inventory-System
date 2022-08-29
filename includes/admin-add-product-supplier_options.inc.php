<?php
    require_once "database.inc.php";

    session_start();

    $db = new Database();
    $result = $db -> connect("select", "accounts", "supplier");

    echo "<option value=''>-- select supplier --</option>";

    forEach($result as $database => $row){
        echo "<option value='" . $row["store name"] . "'>" . $row["store name"] . "</option>";
    }
?>