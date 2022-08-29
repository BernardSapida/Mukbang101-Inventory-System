<?php
    require_once "database.inc.php";

    session_start();

    $db = new Database();

    $image = htmlspecialchars($_SESSION["image"]);
    $image_new_name = "";

    if(!empty($_FILES["account-image"])) {
        $image_name = $_FILES["account-image"]["name"];
        $image_size = $_FILES["account-image"]["size"];
        $image_tmp = $_FILES["account-image"]["tmp_name"];
        $image_err = $_FILES["account-image"]["error"];

        if($image_err === 0) {
            $image_external = pathinfo($image_name, PATHINFO_EXTENSION);
            $image_external_lowercase = strtolower($image_external);
            $allowed_externals = array("jpg", "jpeg", "png");
            
            if(in_array($image_external_lowercase, $allowed_externals)){
                $image_new_name = uniqid("img-", true) . '.' . $image_external_lowercase;
                $image_upload_path = '../profile/' . $image_new_name;
                move_uploaded_file($image_tmp, $image_upload_path);

                $image = $image_new_name;
            }
        }
    }

    $result = $db -> connect(
        "update", 
        "accounts", 
        array(
            "uid" => $_SESSION["uid"], 
            "image" => (empty($image) ? $_SESSION["image"] : $image), 
            "firstname" => $_POST["firstname"],
            "lastname" => $_POST["lastname"],
            "email" => $_POST["email"],
            "address" => $_POST["store_address"],
            "storeName" => $_POST["store_name"],
            "contact no." => $_POST["contact_number"],
            "paymentName" => $_POST["payment_name"],
            "paymentNumber" => $_POST["payment_number"],
            "type" => $_SESSION["type"]
        ),
        "information"
    );

    if(strcmp(htmlspecialchars($_SESSION["image"]), $image) == 0) {
        echo $image;
    } else {
        echo $image_new_name;
    }

    if($result) {
        $_SESSION["image"] = $image;
        $_SESSION["firstname"] = $_POST["firstname"];
        $_SESSION["lastname"] = $_POST["lastname"];
        $_SESSION["email"] = $_POST["email"];
        $_SESSION["address"] = $_POST["store_address"];
        $_SESSION["store name"] = $_POST["store_name"];
        $_SESSION["contact no."] = $_POST["contact_number"];
        $_SESSION["payment name"] = $_POST["payment_name"];
        $_SESSION["payment number"] = $_POST["payment_number"];
    }
?>