<?php
    require_once "database.inc.php";

    $db = new Database();

    $result = $db -> connect("select", "accounts", "supplier");

    echo count($result);
?>