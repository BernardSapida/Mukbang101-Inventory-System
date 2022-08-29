<?php
    class Database {
        function connect($operation, $tableName, $data = null, $account = null) {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $result = false;

            try {
                $conn = new PDO("mysql:host=$servername; dbname=inventory", $username, $password);
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                switch($operation) {
                    case "select":
                        $result = $this -> selectData($conn, $tableName, $data, $account);
                        break;
                    case "insert":
                        $result = $this -> insertData($conn, $tableName, $data);
                        break;
                    case "update":
                        $result = $this -> updateData($conn, $tableName, $data, $account);
                        break;
                    case "delete":
                        $this -> deleteData($conn, $tableName, $data);
                        break;
                }
                
                return $result;
                echo "Connected successfully";
            } catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        }

        function selectData($conn, $tableName, $data, $account) {
            if(!empty($data) && !empty($account)) {
                $stmt = $conn->prepare("SELECT * FROM `$tableName` WHERE `$data` = '$account'");
                $stmt -> execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
            } else {
                switch($tableName) {
                    case "supplier_customer":
                        {
                            if(strcmp($data, "order status") == 0) {
                                $stmt = $conn->prepare("SELECT * FROM `$tableName` WHERE `order status` = 'completed'");
                            } else {
                                $stmt = $conn->prepare("SELECT * FROM `$tableName` ORDER BY CASE 
                                WHEN `order status` = 'Processing' THEN 1 
                                WHEN `order status` = 'To ship' THEN 2 
                                WHEN `order status` = 'To receive' THEN 3 
                                WHEN `order status` = 'Completed' THEN 4 
                                WHEN `order status` = 'Cancelled' THEN 5
                                END");
                            }
                        }
                        break;
                    case "supplier_product":
                        $supplierName = $data["supplierName"];
                        $stmt = $conn->prepare("SELECT * FROM `$tableName` WHERE `supplier name` = '$supplierName' ORDER BY `box quantity` ASC");
                        break;
                    case "admin_product":
                        $stmt = $conn->prepare("SELECT * FROM `$tableName` ORDER BY `quantity` ASC");
                        break;
                    case "admin_orders":
                        if(strcmp($data, "all records") == 0) $stmt = $conn->prepare("SELECT * FROM `$tableName` ORDER BY CASE  WHEN `order status` = 'Processing' THEN 1  WHEN `order status` = 'To ship' THEN 2  WHEN `order status` = 'To receive' THEN 3  WHEN `order status` = 'Completed' THEN 4  WHEN `order status` = 'Cancelled' THEN 5 END");
                        else $stmt = $conn->prepare("SELECT * FROM `$tableName` WHERE `order status` = 'completed'");
                        break;
                    case "accounts":
                        $stmt = $conn->prepare("SELECT * FROM `$tableName` WHERE `type` = '$data'");
                        break;
                    default:
                        $stmt = $conn->prepare("SELECT * FROM $tableName");
                        break;
                }

                $stmt -> execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }

            return $result;
        }

        function insertData($conn, $tableName, $data) {
            switch($tableName) {
                case "accounts":
                    {
                        $uid = $data['uid'];
                        $image = $data['image'];
                        $firstname = $data['firstname'];
                        $lastname = $data['lastname'];
                        $email = $data['email'];
                        $address = $data['address'];
                        $supplier = $data['store name'];
                        $contact = $data['contact no.'];
                        $password = $data['password'];
                        $paymentName = $data['paymentName'];
                        $paymentNumber = $data['paymentNumber'];
                        $type = $data['type'];

                        $stmt = $conn->prepare("INSERT INTO `$tableName` (`uid`, `image`, `firstname`, `lastname`, `email`, `address`, `store name`, `contact no.`, `password`, `payment name`, `payment number`, `type`) VALUES (:uid, :image, :firstname, :lastname, :email, :address, :supplier, :contact, :password, :paymentName, :paymentNumber, :type)");
                        $stmt -> bindParam(':uid', $uid);
                        $stmt -> bindParam(':image', $image);
                        $stmt -> bindParam(':firstname', $firstname);
                        $stmt -> bindParam(':lastname', $lastname);
                        $stmt -> bindParam(':email', $email);
                        $stmt -> bindParam(':address', $address);
                        $stmt -> bindParam(':supplier', $supplier);
                        $stmt -> bindParam(':contact', $contact);
                        $stmt -> bindParam(':password', $password);
                        $stmt -> bindParam(':paymentName', $paymentName);
                        $stmt -> bindParam(':paymentNumber', $paymentNumber);
                        $stmt -> bindParam(':type', $type);
                        $stmt->execute();
                    };
                    break;
                case "admin_orders":
                    {
                        $transactionNo = $data['transactionNo'];
                        $name = $data['name'];
                        $deliveryAddress = $data['deliveryAddress'];
                        $contactNo = $data['contactNo'];
                        $emailAddress = $data['emailAddress'];
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

                        $stmt = $conn->prepare("INSERT INTO `$tableName` (`transaction no.`, `name`, `delivery address`, `contact no.`, `email address`, `product code`, `product name`, `box quantity`, `pcs per box`, `price per box`, `payment method`, `reference no.`, `vat 12%`, `shipping fee`, `discount`, `total`, `order status`) 
                        VALUES (:transactionNo, :name, :deliveryAddress, :contactNo, :emailAddress, :productCode, :productName, :boxQuantity, :pcsPerBox, :pricePerBox, :paymentMethod, :referenceNo, :vat12, :shippingFee, :discount, :total, :orderStatus)");
                        $stmt -> bindParam(':transactionNo', $transactionNo);
                        $stmt -> bindParam(':name', $name);
                        $stmt -> bindParam(':deliveryAddress', $deliveryAddress);
                        $stmt -> bindParam(':contactNo', $contactNo);
                        $stmt -> bindParam(':emailAddress', $emailAddress);
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
                case "admin_product":
                    {
                        $productCode = $data['productCode'];
                        $productName = $data['productName'];
                        $category = $data['category'];
                        $quantity = $data['quantity'];
                        $price = $data['price'];
                        $status = $data['status'];

                        $stmt = $conn->prepare("INSERT INTO `$tableName` (`product code`, `product name`, `category`, `quantity`, `price`, `status`) 
                        VALUES (:productCode, :productName, :category, :quantity, :price, :status)");
                        $stmt -> bindParam(':productCode', $productCode);
                        $stmt -> bindParam(':productName', $productName);
                        $stmt -> bindParam(':category', $category);
                        $stmt -> bindParam(':quantity', $quantity);
                        $stmt -> bindParam(':price', $price);
                        $stmt -> bindParam(':status', $status);
                        $stmt->execute();

                        return "sucess";
                    }
                    break;
                case "admin_transaction_sales":
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
                case "supplier_product":
                    {
                        $supplierName = $data['supplierName'];
                        $productCode = $data['productCode'];
                        $productName = $data['productName'];
                        $category = $data['category'];
                        $boxQuantity = $data['boxQuantity'];
                        $pcsPerBox = $data['pcsPerBox'];
                        $pricePerBox = $data['pricePerBox'];
                        $shippingFee = $data['shippingFee'];
                        $discount = $data['discount'];
                        $status = "ACTIVE";

                        $stmt = $conn->prepare("INSERT INTO `$tableName` (`supplier name`, `product code`, `product name`, `category`, `box quantity`, `pcs per box`, `price per box`, `shipping fee`, `discount`, `status`) 
                        VALUES (:supplierName, :productCode, :productName, :category, :boxQuantity, :pcsPerBox, :pricePerBox, :shippingFee, :discount, :status)");
                        $stmt -> bindParam(':supplierName', $supplierName);
                        $stmt -> bindParam(':productCode', $productCode);
                        $stmt -> bindParam(':productName', $productName);
                        $stmt -> bindParam(':category', $category);
                        $stmt -> bindParam(':boxQuantity', $boxQuantity);
                        $stmt -> bindParam(':pcsPerBox', $pcsPerBox);
                        $stmt -> bindParam(':pricePerBox', $pricePerBox);
                        $stmt -> bindParam(':shippingFee', $shippingFee);
                        $stmt -> bindParam(':discount', $discount);
                        $stmt -> bindParam(':status', $status);
                        $stmt->execute();
                    };
                    break;
                case "supplier_customer":
                    {
                        $supplierName = $data['supplierName'];
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

                        $stmt = $conn->prepare("INSERT INTO `$tableName` (`supplier name`, `transaction no.`, `customer name`, `delivery address`, `contact no.`, `email address`, `customer store name`, `product code`, `product name`, `box quantity`, `pcs per box`, `price per box`, `payment method`, `reference no.`, `vat 12%`, `shipping fee`, `discount`, `total`, `order status`) 
                        VALUES (:supplierName, :transactionNo, :customerName, :deliveryAddress, :contactNo, :emailAddress, :customerStoreName, :productCode, :productName, :boxQuantity, :pcsPerBox, :pricePerBox, :paymentMethod, :referenceNo, :vat12, :shippingFee, :discount, :total, :orderStatus)");
                        $stmt -> bindParam(':supplierName', $supplierName);
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
                case "accounts":
                    {
                        $stmt = "";

                        switch($account) {
                            case "information":
                                $uid = $data['uid'];
                                $image = $data['image'];
                                $firstname = $data['firstname'];
                                $lastname = $data['lastname'];
                                $email = $data['email'];
                                $address = $data['address'];
                                $storeName = $data['storeName'];
                                $contact = $data['contact no.'];
                                $paymentName = $data['paymentName'];
                                $paymentNumber = $data['paymentNumber'];
                                $type = $data['type'];
                                
                                $stmt = $conn->prepare("UPDATE `$tableName` SET `uid` = '$uid', `image` = '$image', `firstname` = '$firstname', `lastname` = '$lastname', `email` = '$email', `address` = '$address', `store name` = '$storeName', `contact no.` = '$contact', `payment name` = '$paymentName', `payment number` = '$paymentNumber', `type` = '$type' WHERE `uid` = '$uid'");
                                break;
                            case "password":
                                $uid = $data['uid'];
                                $password = $data['password'];

                                $stmt = $conn->prepare("UPDATE `$tableName` SET `password` = '$password' WHERE uid = '$uid'");
                                break;
                        }
                        
                        $stmt->execute();
                        
                        return true;
                    };
                    break;
                case "admin_orders":
                    {
                        $transactionNo = $data['transactionNo'];
                        $orderStatus = $data['orderStatus'];

                        $stmt = $conn->prepare("UPDATE `$tableName` SET `order status` = '$orderStatus' WHERE `transaction no.` = '$transactionNo'");
                        $stmt->execute();
                    };
                    break;
                case "admin_product":
                    {
                        $productCode = $data['productCode'];
                        if(!empty($account)) {
                            $status = $data['status'];

                            $stmt = $conn->prepare("UPDATE `$tableName` SET `status` = '$status' WHERE `product code` = '$productCode'");
                            $stmt->execute();
                        } else {
                            $productName = $data['productName'];
                            $category = $data['category'];
                            $quantity = $data['quantity'];
                            $price = $data['price'];

                            $stmt = $conn->prepare("UPDATE `$tableName` SET `product name` = '$productName', `category` = '$category', `price` = '$price', `quantity` = '$quantity' WHERE `product code` = '$productCode'");
                            $stmt->execute();
                        }
                    };
                    break;
                case "supplier_customer":
                    {
                        $transactionNo = $data['transactionNo'];
                        $orderStatus = $data['orderStatus'];

                        $stmt = $conn->prepare("UPDATE `$tableName` SET `order status` = '$orderStatus' WHERE `transaction no.` = '$transactionNo'");
                        $stmt->execute();
                    };
                    break;
                case "supplier_product":
                    {
                        if(!empty($account)) {
                            $productCode = $data['productCode'];
                            $status = $data['status'];

                            $stmt = $conn->prepare("UPDATE `$tableName` SET `status` = '$status' WHERE `product code` = '$productCode'");
                            $stmt->execute();

                            return "SUCCESS";
                        } else {
                            $productCode = $data['productCode'];
                            $productName = $data['productName'];
                            $category = $data['category'];
                            $boxQuantity = $data['boxQuantity'];
                            $pcsPerBox = $data['pcsPerBox'];
                            $pricePerBox = $data['pricePerBox'];
                            $shippingFee = $data['shippingFee'];
                            $discount = $data['discount'];

                            $stmt = $conn->prepare("UPDATE `$tableName` SET `product code` = '$productCode', `product name` = '$productName', `category` = '$category', `box quantity` = '$boxQuantity', `pcs per box` = '$pcsPerBox', `price per box` = '$pricePerBox', `shipping fee` = '$shippingFee', `discount` = '$discount' WHERE `product code` = '$productCode'");
                            $stmt->execute();
                        }
                    };
                    break;
                }
        }

        function deleteData($conn, $tableName, $data) {
            $productCode = $data["productCode"];

            $sql = "DELETE FROM `$tableName` WHERE `product code` = $productCode";
            $conn->exec($sql);
        }
    }
?>