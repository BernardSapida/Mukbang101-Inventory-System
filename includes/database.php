<?php
    class Database {
        function connect($operation, $tableName, $data, $account = null) {
            $servername = "localhost";
            $username = "root";
            $password = "";

            try {
                $conn = new PDO("mysql:host=$servername; dbname=inventory", $username, $password);
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                switch($operation) {
                    case "select":
                        $this -> selectData($conn, $tableName);
                        break;
                    case "insert":
                        $this -> insertData($conn, $tableName, $data);
                        break;
                    case "update":
                        $this -> updateData($conn, $tableName, $data, $account);
                        break;
                    case "delete":
                        $this -> deleteData($conn, $tableName, $data);
                        break;
                }

                echo "Connected successfully";
            } catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        }

        function selectData($conn, $tableName) {
            $stmt = $conn->prepare("SELECT * FROM $tableName");
            $stmt -> execute();

            // while($data = $stmt->fetch( PDO::FETCH_ASSOC )){
            //     echo $data['id'].'<br>';
            //     echo $data['uid'].'<br>';
            //     echo $data['image'].'<br>';
            //     echo $data['firstname'].'<br>';
            //     echo $data['lastname'].'<br>';
            //     echo $data['email'].'<br>';
            //     echo $data['address'].'<br>';
            //     echo $data['supplier store name'].'<br>';
            //     echo $data['contact no.'].'<br>';
            //     echo $data['password'].'<br>';
            //     echo $data['type'].'<br>';
            // }
        }

        function insertData($conn, $tableName, $data) {
            switch($tableName) {
                case "account":
                    {
                        $uid = $data['uid'];
                        $image = $data['image'];
                        $firstname = $data['firstname'];
                        $lastname = $data['lastname'];
                        $address = $data['address'];
                        $email = $data['email'];
                        $supplier = $data['supplier store name'];
                        $contact = $data['contact no.'];
                        $password = $data['password'];
                        $type = $data['type'];

                        $stmt = $conn->prepare("INSERT INTO `$tableName` (`uid`, `image`, `firstname`, `lastname`, `email`, `address`, `supplier store name`, `contact no.`, `password`, `type`) VALUES (:uid, :image, :firstname, :lastname, :address, :email, :supplier, :contact, :password, :type)");
                        $stmt -> bindParam(':uid', $uid);
                        $stmt -> bindParam(':image', $image);
                        $stmt -> bindParam(':firstname', $firstname);
                        $stmt -> bindParam(':lastname', $lastname);
                        $stmt -> bindParam(':email', $email);
                        $stmt -> bindParam(':address', $address);
                        $stmt -> bindParam(':contact', $contact);
                        $stmt -> bindParam(':supplier', $supplier);
                        $stmt -> bindParam(':password', $password);
                        $stmt -> bindParam(':type', $type);
                        $stmt->execute();
                    };
                    break;
                case "admin orders":
                    {
                        $transactionNo = $data['transactionNo'];
                        $name = $data['name'];
                        $deliveryAddress = $data['deliveryAddress'];
                        $contactNo = $data['contactNo'];
                        $emailAddress = $data['emailAddress'];
                        $supplierName = $data['supplierName'];
                        $productCode = $data['productCode'];
                        $productName = $data['productName'];
                        $boxQuantity = $data['boxQuantity'];
                        $pcsPerBox = $data['pcsPerBox'];
                        $pricePerBox = $data['pricePerBox'];
                        $paymentMethod = $data['paymentMethod'];
                        $referenceNo = $data['referenceNo'];
                        $vat12 = $data['vat12'];
                        $shippingFee = $data['shippingFee'];
                        $discount = $data['discount'];
                        $total = $data['total'];
                        $orderStatus = $data['orderStatus'];

                        $stmt = $conn->prepare("INSERT INTO `$tableName` (`transaction no.`, `name`, `delivery address`, `contact no.`, `email address`, `supplier name`, `product code`, `product name`, `box quantity`, `pcs per box`, `price per box`, `payment method`, `reference no.`, `vat 12%`, `shipping fee`, `discount`, `total`, `order status`) 
                        VALUES (:transactionNo, :name, :deliveryAddress, :contactNo, :emailAddress, :supplierName, :productCode, :productName, :boxQuantity, :pcsPerBox, :pricePerBox, :paymentMethod, :referenceNo, :vat12, :shippingFee, :discount, :total, :orderStatus)");
                        $stmt -> bindParam(':transactionNo', $transactionNo);
                        $stmt -> bindParam(':name', $name);
                        $stmt -> bindParam(':deliveryAddress', $deliveryAddress);
                        $stmt -> bindParam(':contactNo', $contactNo);
                        $stmt -> bindParam(':emailAddress', $emailAddress);
                        $stmt -> bindParam(':supplierName', $supplierName);
                        $stmt -> bindParam(':productCode', $productCode);
                        $stmt -> bindParam(':productName', $productName);
                        $stmt -> bindParam(':boxQuantity', $boxQuantity);
                        $stmt -> bindParam(':pcsPerBox', $pcsPerBox);
                        $stmt -> bindParam(':pricePerBox', $pricePerBox);
                        $stmt -> bindParam(':paymentMethod', $paymentMethod);
                        $stmt -> bindParam(':referenceNo', $referenceNo);
                        $stmt -> bindParam(':vat12', $vat12);
                        $stmt -> bindParam(':shippingFee', $shippingFee);
                        $stmt -> bindParam(':discount', $discount);
                        $stmt -> bindParam(':total', $total);
                        $stmt -> bindParam(':orderStatus', $orderStatus);
                        $stmt->execute();
                    };
                    break;
                case "admin product":
                    {
                        $productCode = $data['productCode'];
                        $supplierName = $data['supplierName'];
                        $productName = $data['productName'];
                        $category = $data['category'];
                        $quantity = $data['quantity'];
                        $price = $data['price'];

                        $stmt = $conn->prepare("INSERT INTO `$tableName` (`product code`, `supplier name`, `product name`, `category`, `quantity`, `price`) 
                        VALUES (:productCode, :supplierName, :productName, :category, :quantity, :price)");
                        $stmt -> bindParam(':productCode', $productCode);
                        $stmt -> bindParam(':supplierName', $supplierName);
                        $stmt -> bindParam(':productName', $productName);
                        $stmt -> bindParam(':category', $category);
                        $stmt -> bindParam(':quantity', $quantity);
                        $stmt -> bindParam(':price', $price);
                        $stmt->execute();
                    }
                    break;
                case "admin transaction sales":
                    {
                        $referenceNo = $data['referenceNo'];
                        $productName = $data['productName'];
                        $quantity = $data['quantity'];
                        $price = $data['price'];
                        $vat12 = $data['vat12'];
                        $discount = $data['discount'];
                        $totalAmount = $data['totalAmount'];

                        $stmt = $conn->prepare("INSERT INTO `$tableName` (`reference no.`, `product name`, `quantity`, `price`, `vat 12%`, `discount`, `total amount`) 
                        VALUES (:referenceNo, :productName, :quantity, :price, :vat12, :discount, :totalAmount)");
                        $stmt -> bindParam(':referenceNo', $referenceNo);
                        $stmt -> bindParam(':productName', $productName);
                        $stmt -> bindParam(':quantity', $quantity);
                        $stmt -> bindParam(':price', $price);
                        $stmt -> bindParam(':vat12', $vat12);
                        $stmt -> bindParam(':discount', $discount);
                        $stmt -> bindParam(':totalAmount', $totalAmount);
                        $stmt->execute();
                    }
                    break;
                case "supplier product":
                    {
                        $productCode = $data['productCode'];
                        $productName = $data['productName'];
                        $category = $data['category'];
                        $boxQuantity = $data['boxQuantity'];
                        $pcsPerBox = $data['pcsPerBox'];
                        $pricePerBox = $data['pricePerBox'];

                        $stmt = $conn->prepare("INSERT INTO `$tableName` (`product code`, `product name`, `category`, `box quantity`, `pcs per box`, `price per box`) 
                        VALUES (:productCode, :productName, :category, :boxQuantity, :pcsPerBox, :pricePerBox)");
                        $stmt -> bindParam(':productCode', $productCode);
                        $stmt -> bindParam(':productName', $productName);
                        $stmt -> bindParam(':category', $category);
                        $stmt -> bindParam(':boxQuantity', $boxQuantity);
                        $stmt -> bindParam(':pcsPerBox', $pcsPerBox);
                        $stmt -> bindParam(':pricePerBox', $pricePerBox);
                        $stmt->execute();
                    };
                    break;
                case "supplier customer":
                    {
                        $transactionNo = $data['transactionNo'];
                        $customerName = $data['customerName'];
                        $deliveryAddress = $data['deliveryAddress'];
                        $contactNo = $data['contactNo'];
                        $emailAddress = $data['emailAddress'];
                        $customerStoreName = $data['customerStoreName'];
                        $productCode = $data['productCode'];
                        $productName = $data['productName'];
                        $boxQuantity = $data['boxQuantity'];
                        $pcsPerBox = $data['pcsPerBox'];
                        $pricePerBox = $data['pricePerBox'];
                        $paymentMethod = $data['paymentMethod'];
                        $referenceNo = $data['referenceNo'];
                        $vat12 = $data['vat12'];
                        $shippingFee = $data['shippingFee'];
                        $discount = $data['discount'];
                        $total = $data['total'];
                        $orderStatus = $data['orderStatus'];

                        $stmt = $conn->prepare("INSERT INTO `$tableName` (`transaction no.`, `customer name`, `delivery address`, `contact no.`, `email address`, `customer store name`, `product code`, `product name`, `box quantity`, `pcs per box`, `price per box`, `payment method`, `reference no.`, `vat 12%`, `shipping fee`, `discount`, `total`, `order status`) 
                        VALUES (:transactionNo, :customerName, :deliveryAddress, :contactNo, :emailAddress, :customerStoreName, :productCode, :productName, :boxQuantity, :pcsPerBox, :pricePerBox, :paymentMethod, :referenceNo, :vat12, :shippingFee, :discount, :total, :orderStatus)");
                        $stmt -> bindParam(':transactionNo', $transactionNo);
                        $stmt -> bindParam(':customerName', $customerName);
                        $stmt -> bindParam(':deliveryAddress', $deliveryAddress);
                        $stmt -> bindParam(':contactNo', $contactNo);
                        $stmt -> bindParam(':emailAddress', $emailAddress);
                        $stmt -> bindParam(':customerStoreName', $customerStoreName);
                        $stmt -> bindParam(':productCode', $productCode);
                        $stmt -> bindParam(':productName', $productName);
                        $stmt -> bindParam(':boxQuantity', $boxQuantity);
                        $stmt -> bindParam(':pcsPerBox', $pcsPerBox);
                        $stmt -> bindParam(':pricePerBox', $pricePerBox);
                        $stmt -> bindParam(':paymentMethod', $paymentMethod);
                        $stmt -> bindParam(':referenceNo', $referenceNo);
                        $stmt -> bindParam(':vat12', $vat12);
                        $stmt -> bindParam(':shippingFee', $shippingFee);
                        $stmt -> bindParam(':discount', $discount);
                        $stmt -> bindParam(':total', $total);
                        $stmt -> bindParam(':orderStatus', $orderStatus);
                        $stmt->execute();
                    };
                    break;
            }
        }

        function updateData($conn, $tableName, $data, $account) {
                switch($tableName) {
                case "account":
                    {
                        $uid = $data['uid'];
                        $image = $data['image'];
                        $firstname = $data['firstname'];
                        $lastname = $data['lastname'];
                        $email = $data['email'];
                        $address = $data['address'];
                        $supplier = $data['supplier store name'];
                        $contact = $data['contact no.'];
                        $password = $data['password'];
                        $type = $data['type'];
                        $stmt = "";

                        switch($account) {
                            case "profile":
                                $stmt = $conn->prepare("UPDATE `$tableName` SET `image` = '$image' WHERE uid = $uid");
                                break;
                            case "information":
                                $stmt = $conn->prepare("UPDATE `$tableName` SET `uid` = '$uid', `image` = '$image', `firstname` = '$firstname', `lastname` = '$lastname', `email` = '$email', `address` = '$address', `supplier store name` = '$supplier', `contact no.` = '$contact', `type` = '$type' WHERE uid = $uid");
                                break;
                            case "password":
                                $stmt = $conn->prepare("UPDATE `$tableName` SET `password` = '$password' WHERE uid = $uid");
                                break;
                        }
                        
                        $stmt->execute();
                    };
                    break;
                case "admin orders":
                    {
                        $transactionNo = $data['transactionNo'];
                        $orderStatus = $data['orderStatus'];

                        $stmt = $conn->prepare("UPDATE `$tableName` SET `order status` = '$orderStatus' WHERE `transaction no.` = $transactionNo");
                        $stmt->execute();
                    };
                    break;
                case "admin product":
                    {
                        $productCode = $data['productCode'];
                        $price = $data['price'];

                        $stmt = $conn->prepare("UPDATE `$tableName` SET `price` = '$price' WHERE `product code` = $productCode");
                        $stmt->execute();
                    };
                    break;
                case "supplier customer":
                    {
                        $transactionNo = $data['transactionNo'];
                        $orderStatus = $data['orderStatus'];

                        $stmt = $conn->prepare("UPDATE `$tableName` SET `order status` = '$orderStatus' WHERE `transaction no.` = $transactionNo");
                        $stmt->execute();
                    };
                    break;
                case "supplier product":
                    {
                        $id = $data['id'];
                        $productCode = $data['productCode'];
                        $productName = $data['productName'];
                        $category = $data['category'];
                        $boxQuantity = $data['boxQuantity'];
                        $pcsPerBox = $data['pcsPerBox'];
                        $pricePerBox = $data['pricePerBox'];

                        $stmt = $conn->prepare("INSERT INTO `$tableName` (`product code`, `product name`, `category`, `box quantity`, `pcs per box`, `price per box`) 
                        VALUES (:productCode, :productName, :category, :boxQuantity, :pcsPerBox, :pricePerBox)");
                        $stmt = $conn->prepare("UPDATE `$tableName` SET `product code` = '$productCode', `product name` = '$productName', `category` = '$category', `box quantity` = '$boxQuantity', `pcs per box` = '$pcsPerBox', `price per box` = '$pricePerBox' WHERE `id` = $id");
                        $stmt->execute();
                    };
                    break;
                }
        }

        function deleteData($conn, $tableName, $data) {
            $id = $data["id"];

            $sql = "DELETE FROM `$tableName` WHERE id=$id";
            $conn->exec($sql);
        }
    }
?>