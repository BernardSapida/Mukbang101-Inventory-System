<?php
    require_once "database.inc.php";
    
    error_reporting(E_ERROR | E_PARSE);

    session_start();

    $db = new Database();
    $err_email = "";
    $err_password = "";
    $errArray = array();

    // $result = $db -> connect("select", "accounts", "email", "admin@gmail.com");

    if(isset($_POST["signin"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];
        
        if(!empty($email) && !empty($password)) {
            $result = $db -> connect("select", "accounts", "email", $email);

            if(!$result) {
                $errEmail = "Email address didn't exist!";
                array_push($errArray, $errEmail);
            }

            if(is_array($result)) {
                if(password_verify($password, $result["password"])) {
                    $_SESSION["uid"] = $result['uid'];
                    $_SESSION["image"] = $result['image'];
                    $_SESSION["firstname"] = $result['firstname'];
                    $_SESSION["lastname"] = $result['lastname'];
                    $_SESSION["email"] = $result['email'];
                    $_SESSION["address"] = $result['address'];
                    $_SESSION["store name"] = $result['store name'];
                    $_SESSION["contact no."] = $result['contact no.'];
                    $_SESSION["payment name"] = $result['payment name'];
                    $_SESSION["payment number"] = $result['payment number'];
                    $_SESSION["password"] = $result['password'];
                    $_SESSION["notification number"] = $result['notification number'];
                    $_SESSION["type"] = $result['type'];

                    header("Location: supplier.php");
                } else {
                    array_push($errArray, "Password is incorrect!");
                }
            } else {
                array_push($errArray, "Email address didn't exist!");
            }
        } else {
            if(empty($email)) array_push($errArray, "Email address is required!");
            if(empty($password)) array_push($errArray, "Password is required!");
        }
    }
?>