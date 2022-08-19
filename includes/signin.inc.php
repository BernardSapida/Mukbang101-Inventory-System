<?php
    require_once "database.inc.php";
    
    error_reporting(E_ERROR | E_PARSE);

    session_start();

    $db = new Database();
    $err_email = "";
    $err_password = "";
    $errArray = array();

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
                    $_SESSION["uid"] = explode(" ", $result['uid'])[0];
                    $_SESSION["image"] = explode(" ", $result['image'])[1];
                    $_SESSION["firstname"] = $result['firstname'];
                    $_SESSION["lastname"] = $result['lastname'];
                    $_SESSION["email"] = $result['email'];
                    $_SESSION["address"] = $result['address'];
                    $_SESSION["supplier store name"] = $result['supplier store name'];
                    $_SESSION["contact no."] = $result['contact no.'];
                    $_SESSION["password"] = $result['password'];
                    $_SESSION["type"] = $result['type'];

                    header("Location: supplier.php");
                } else {
                    array_push($errArray, "Password is incorrect!");
                }
            } else {
                array_push($errArray, "Email didn't exist!");
            }
        } else {
            if(empty($email)) array_push($errArray, "Email is required!");
            if(empty($password)) array_push($errArray, "Password is required!");
        }
    }
?>