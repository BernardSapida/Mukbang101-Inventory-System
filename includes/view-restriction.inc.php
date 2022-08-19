<?php
    session_start();

    error_reporting(E_ERROR | E_PARSE);
    // $_SESSION["type"] = "admin";

    switch($_SESSION["type"]) {
        case "admin":
            header("location: admin.php");
            break;
        case "supplier":
            header("location: supplier.php");
            break;
    }
?>