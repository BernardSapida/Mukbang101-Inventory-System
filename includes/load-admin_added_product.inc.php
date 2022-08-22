<?php
    require_once "database.inc.php";

    session_start();

    $db = new Database();
    
    if(isset($_POST["addedProduct"])) {
        // retrieve supplier ID!
        $db -> connect("insert", "admin_products", array(
            "supplierUID" => $_SESSION["uid"],
            "productCode" => $_POST["productCode"],
            "supplierName" => $_POST["supplierName"],
            "productName" => $_POST["productName"],
            "category" => $_POST["category"],
            "quantity" => $_POST["quantity"],
        ));

        $result = $db -> connect("select", "supplier_product", array("supplierUID" => $_SESSION["uid"]));

        echo '<tr class="empty-product"><td colspan="8">No data found</td></tr>';
    
        forEach($result as $database => $row){
            echo "<tr data=" . $row['product code'] . " class='" . (($row['box quantity'] <= 10) ? "danger" : "")  . "'>";
            echo "<td>" . $row['product code'] . "</td>";
            echo "<td>" . $row['product name'] . "</td>";
            echo "<td>" . $row['category'] . "</td>";
            echo "<td>" . $row['box quantity'] . "</td>";
            echo "<td>" . $row['pcs per box'] . "</td>";
            echo "<td>₱ " . number_format($row['price per box'], 2). "</td>";
            echo "<td>" . date("F d, Y", strtotime($row['date of stock'])) . "</td>";
            echo '<td>
                    <button type="button" class="btn-edit" aria-label="btn-edit"><i class="fa-solid fa-pen-to-square"></i> Edit</button>
                    <button type="button" class="btn-delete" aria-label="btn-delete"><i class="fa-solid fa-trash-can"></i></button>
                </td>';
            echo "</tr>";
        }
    }
?>