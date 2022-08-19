<?php
    session_start();

    switch($_SESSION["type"]) {
        case "admin":
            header("location: admin.php");
            break;
        case "":
            header("location: signin.php");
            break;
    }
?>