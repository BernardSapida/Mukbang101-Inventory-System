<?php
    session_start();

    switch($_SESSION["type"]) {
        case "supplier":
            header("location: supplier.php");
            break;
        case "":
            header("location: signin.php");
            break;
    }
?>