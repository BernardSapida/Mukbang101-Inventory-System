<?php
    require_once "database.inc.php";

    error_reporting(E_ERROR | E_PARSE);

    $db = new Database();

    if(isset($_POST["signup"])) {
        $uid = uniqid(rand(0,999));
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $email = $_POST["email"];
        $storeAddress = $_POST["storeAddress"];
        $storeName = $_POST["storeName"];
        $contactNumber = $_POST["contactNumber"];
        $password = $_POST["password"];
        $confirmPassword = $_POST["confirmPassword"];
        $image = "default.jpg";
        $type = "supplier";

        $errFirstname = "";
        $errLastname = "";
        $errEmail = "";
        $errStoreAddress = "";
        $errStoreName = "";
        $errContactNumber = "";
        $errPassword = "";
        $errConfirmPassword = "";
      	$signup_success = false;
        $errArray = array();

        if(empty($firstname)) {
            $errFirstname = "Firstname is required!";
            array_push($errArray, $errFirstname);
        }

        if(strlen($firstname) < 2) {
            $errFirstname = "Firstname is too short!";
            array_push($errArray, $errFirstname);
        }

        if(empty($lastname)) {
            $errLastname = "Lastname is required!";
            array_push($errArray, $errLastname);
        }

        if(strlen($lastname) < 2) {
            $errLastname = "Lastname is too short!";
            array_push($errArray, $errLastname);
        }

        if(empty($email)) {
            $errEmail = "Email is required!";
            array_push($errArray, $errEmail);
        }

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errEmail = "Email is invalid!";
            array_push($errArray, $errEmail);
        }

        if($db -> connect("select", "accounts", "email", $email)) {
            $errEmail = "Email is already registered!";
            array_push($errArray, $errEmail);
        }

        if(empty($storeAddress)) {
            $errStoreAddress = "Store address is required!";
            array_push($errArray, $errStoreAddress);
        }

        if(strlen($storeAddress) < 10) {
            $errStoreAddress = "Store address is invalid!";
            array_push($errArray, $errStoreAddress);
        }

        if(empty($storeName)) {
            $errStoreName = "Store name is required!";
            array_push($errArray, $errStoreName);
        } 

        if(strlen($storeName) < 2) {
            $errStoreName = "Store name is too short!";
            array_push($errArray, $errStoreName);
        }

        if(empty($contactNumber)) {
            $errContactNumber = "Contact no. is required!";
            array_push($errArray, $errContactNumber);
        } 

        if(strlen($contactNumber) != 11 || stripos($contactNumber, "09")) {
            $errContactNumber = "Contact no. is invalid!";
            array_push($errArray, $errContactNumber);
        }

        if(empty($password)) {
            $errPassword = "Password is required!";
            array_push($errArray, $errPassword);
        } 

        if(empty($confirmPassword)) {
            $errConfirmPassword = "Confirm password is required!";
            array_push($errArray, $errConfirmPassword);
        } 

        if(!empty($firstname) && !empty($lastname) && !empty($email) && !empty($storeAddress) && !empty($storeName) && !empty($contactNumber) && !empty($password) && !empty($confirmPassword)) {
            if(!preg_match_all("/\W/i", $password)) $errPassword = "Your password should contain unique symbols!";
            if(!preg_match_all("/[A-Z]/", $password)) $errPassword = "Your password should have 1 or more uppercase letters!";
            if(!preg_match_all("/[a-z]/", $password)) $errPassword = "Your password should have 1 or more lowercase letters!";
            if(!preg_match_all("/[0-9]/", $password)) $errPassword = "Your password should have 1 or more numerical values!";
            if($password != $confirmPassword) $errConfirmPassword = "Your new password and confirm password didn't matched!";

            
            if(!empty($errPassword)) array_push($errArray, $errPassword);
            if(!empty($errConfirmPassword)) array_push($errArray, $errConfirmPassword);

            if(empty($errFirstname) && empty($errLastname) && empty($errEmail) && empty($errStoreAddress) && empty($errStoreName) && empty($errContactNumber) && empty($errPassword) && empty($errConfirmPassword)) {
                $encryptPassword = password_hash($password, PASSWORD_DEFAULT);

                $db -> connect(
                    "insert", 
                    "accounts", 
                    array(
                        "uid" => $uid, 
                        "image" => $image, 
                        "firstname" => $firstname,
                        "lastname" => $lastname,
                        "email" => $email,
                        "address" => $storeAddress,
                        "store name" => $storeName,
                        "contact no." => $contactNumber,
                        "password" => $encryptPassword,
                        "type" => "supplier",
                    )
                );
                
                $firstname = "";
                $lastname = "";
                $email = "";
                $storeAddress = "";
                $storeName = "";
                $contactNumber = "";
                $password = "";
                $confirmPassword = "";

                echo "<script>
                    alert('Your account has been created. You can signin now!');
                    window.location.href = 'signin.php';
                </script>";
            }
        }
    }
?>