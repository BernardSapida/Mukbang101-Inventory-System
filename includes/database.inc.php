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
                                WHEN `order status` = 'processing' THEN 1 
                                WHEN `order status` = 'to ship' THEN 2 
                                WHEN `order status` = 'to receive' THEN 3 
                                WHEN `order status` = 'completed' THEN 4 
                                WHEN `order status` = 'cancelled' THEN 5
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
            

            // foreach($result as $array => $row){
            //     echo "<tr>";
            //         echo "<td>" . $row['date'] . "</td>";
            //         echo "<td>" . $row['transaction no.'] . "</td>";
            //         echo "<td>" . $row['customer name'] . "</td>";
            //         echo "<td>" . $row['delivery address'] . "</td>";
            //         echo "<td>" . $row['contact no.'] . "</td>";
            //         echo "<td>" . $row['email address'] . "</td>";
            //         echo "<td>" . $row['customer store name'] . "</td>";
            //         echo "<td>" . $row['product code'] . "</td>";
            //         echo "<td>" . $row['product name'] . "</td>";
            //         echo "<td>" . $row['box quantity'] . "</td>";
            //         echo "<td>" . $row['pcs per box'] . "</td>";
            //         echo "<td>" . $row['price per box'] . "</td>";
            //         echo "<td>" . $row['payment method'] . "</td>";
            //         echo "<td>" . $row['reference no.'] . "</td>";
            //         echo "<td>" . $row['vat 12%'] . "</td>";
            //         echo "<td>" . $row['shipping fee'] . "</td>";
            //         echo "<td>" . $row['discount'] . "</td>";
            //         echo "<td>" . $row['total'] . "</td>";
            //         echo "<td>" . $row['order status'] . "</td>";
            //     echo "</tr>";
            // }

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
                        $type = $data['type'];

                        $stmt = $conn->prepare("INSERT INTO `$tableName` (`uid`, `image`, `firstname`, `lastname`, `email`, `address`, `store name`, `contact no.`, `password`, `type`) VALUES (:uid, :image, :firstname, :lastname, :email, :address, :supplier, :contact, :password, :type)");
                        $stmt -> bindParam(':uid', $uid);
                        $stmt -> bindParam(':image', $image);
                        $stmt -> bindParam(':firstname', $firstname);
                        $stmt -> bindParam(':lastname', $lastname);
                        $stmt -> bindParam(':email', $email);
                        $stmt -> bindParam(':address', $address);
                        $stmt -> bindParam(':supplier', $supplier);
                        $stmt -> bindParam(':contact', $contact);
                        $stmt -> bindParam(':password', $password);
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
                case "admin_product":
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

                        $stmt = $conn->prepare("INSERT INTO `$tableName` (`supplier name`, `product code`, `product name`, `category`, `box quantity`, `pcs per box`, `price per box`) 
                        VALUES (:supplierName, :productCode, :productName, :category, :boxQuantity, :pcsPerBox, :pricePerBox)");
                        $stmt -> bindParam(':supplierName', $supplierName);
                        $stmt -> bindParam(':productCode', $productCode);
                        $stmt -> bindParam(':productName', $productName);
                        $stmt -> bindParam(':category', $category);
                        $stmt -> bindParam(':boxQuantity', $boxQuantity);
                        $stmt -> bindParam(':pcsPerBox', $pcsPerBox);
                        $stmt -> bindParam(':pricePerBox', $pricePerBox);
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
                                $storeName = $data['store name'];
                                $contact = $data['contact no.'];
                                $type = $data['type'];
                                
                                $stmt = $conn->prepare("UPDATE `$tableName` SET `uid` = '$uid', `image` = '$image', `firstname` = '$firstname', `lastname` = '$lastname', `email` = '$email', `address` = '$address', `store name` = '$storeName', `contact no.` = '$contact', `type` = '$type' WHERE `uid` = '$uid'");
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

                        $stmt = $conn->prepare("UPDATE `$tableName` SET `order status` = '$orderStatus' WHERE `transaction no.` = $transactionNo");
                        $stmt->execute();
                    };
                    break;
                case "admin_product":
                    {
                        $productCode = $data['productCode'];
                        $quantity = $data['quantity'];
                        $price = $data['price'];

                        $stmt = $conn->prepare("UPDATE `$tableName` SET `price` = '$price', `quantity` = '$quantity' WHERE `product code` = $productCode");
                        $stmt->execute();
                    };
                    break;
                case "supplier_customer":
                    {
                        $transactionNo = $data['transactionNo'];
                        $orderStatus = $data['orderStatus'];

                        $stmt = $conn->prepare("UPDATE `$tableName` SET `order status` = '$orderStatus' WHERE `transaction no.` = $transactionNo");
                        $stmt->execute();
                    };
                    break;
                case "supplier_product":
                    {
                        $productCode = $data['productCode'];
                        $productName = $data['productName'];
                        $category = $data['category'];
                        $boxQuantity = $data['boxQuantity'];
                        $pcsPerBox = $data['pcsPerBox'];
                        $pricePerBox = $data['pricePerBox'];

                        $stmt = $conn->prepare("UPDATE `$tableName` SET `product code` = '$productCode', `product name` = '$productName', `category` = '$category', `box quantity` = '$boxQuantity', `pcs per box` = '$pcsPerBox', `price per box` = '$pricePerBox' WHERE `product code` = $productCode");
                        $stmt->execute();
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