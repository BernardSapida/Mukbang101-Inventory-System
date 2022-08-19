<?php
    require_once "database.inc.php";

    $db = new Database();

    $result = $db -> connect("select", "supplier_product");
    
    forEach($result as $database => $row){
        echo "<tr class='" . (($row['box quantity'] <= 10) ? "danger" : "")  . "'>";
        echo "<td>" . $row['product code'] . "</td>";
        echo "<td>" . $row['product name'] . "</td>";
        echo "<td>" . $row['category'] . "</td>";
        echo "<td>" . $row['box quantity'] . "</td>";
        echo "<td>" . $row['pcs per box'] . "</td>";
        echo "<td>" . $row['price per box'] . "</td>";
        echo "<td>" . date("F d, Y", strtotime($row['date of stock'])) . "</td>";
        echo '<td>
                <button id="btn-order" aria-label="btn-order"><i class="fa-solid fa-pen-to-square"></i> Update</button>
                <button id="btn-delete" aria-label="btn-delete"><i class="fa-solid fa-trash-can"></i></button>
            </td>';
        echo "</tr>";
    }
?>

