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
        $paymentName = $_POST["payment_name"];
        $paymentNumber = $_POST["payment_number"];
        $password = $_POST["password"];
        $confirmPassword = $_POST["confirmPassword"];
        $image = "default.jpg";
        $type = "supplier";
        $errArray = array();

        if(empty($firstname)) array_push($errArray, "Firstname is required!");
        if(strlen($firstname) < 2) array_push($errArray, "Firstname is too short!");
        if(empty($lastname)) array_push($errArray, "Lastname is required!");
        if(strlen($lastname) < 2) array_push($errArray, "Lastname is too short!");
        if(empty($email)) array_push($errArray, "Email is required!");
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) array_push($errArray, "Email is invalid!");
        if($db -> connect("select", "accounts", "email", $email)) array_push($errArray, "Email is already registered!");
        if(empty($storeAddress)) array_push($errArray, "Store address is required!");
        if(strlen($storeAddress) < 10) array_push($errArray, "Store address is invalid!");
        if(empty($storeName)) array_push($errArray, "Store name is required!");
        if(strlen($storeName) < 2) array_push($errArray, "Store name is too short!");
        if(empty($contactNumber)) array_push($errArray, "Contact no. is required!");
        if(strlen($contactNumber) != 11 || stripos($contactNumber, "09")) array_push($errArray, "Contact no. is invalid!");
        if(empty($paymentName)) array_push($errArray, "Gcash/Paymaya name is required!");
        if(strlen($paymentName) < 2) array_push($errArray, "Gcash/Paymaya name is too short!");
        if(empty($paymentNumber)) array_push($errArray, "Gcash/Paymaya number is required!");
        if(strlen($paymentNumber) != 11 || stripos($paymentNumber, "09")) array_push($errArray, "Gcash/Paymaya number is invalid!");
        if(empty($password)) array_push($errArray, "Password is required!");
        if(empty($confirmPassword)) array_push($errArray, "Confirm password is required!");

        if(!empty($firstname) && !empty($lastname) && !empty($email) && !empty($storeAddress) && !empty($storeName) && !empty($contactNumber) && !empty($password) && !empty($confirmPassword)) {
            if(!preg_match_all("/\W/i", $password)) array_push($errArray, "Your password should contain unique symbols!");
            if(!preg_match_all("/[A-Z]/", $password)) array_push($errArray, "Your password should have 1 or more uppercase letters!");
            if(!preg_match_all("/[a-z]/", $password)) array_push($errArray, "Your password should have 1 or more lowercase letters!");
            if(!preg_match_all("/[0-9]/", $password)) array_push($errArray, "Your password should have 1 or more numerical values!");
            if($password != $confirmPassword) array_push($errArray, "Your new password and confirm password didn't matched!");

            if(empty($errArray)) {
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
                        "paymentName" => $paymentName,
                        "paymentNumber" => $paymentNumber,
                        "type" => "supplier",
                    )
                );

                echo "<script>
                    alert('Your account has been created. You can signin now!');
                    window.location.href = 'signin.php';
                </script>";
            }
        }
    }
?>