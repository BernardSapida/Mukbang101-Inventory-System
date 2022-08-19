<?php
    require_once "database.inc.php";

    $db = new Database();

    $result = $db -> connect("select", "supplier_customer");
    
    forEach($result as $database => $row){
        echo "<tr data='" . $row['transaction no.'] . "'>";
        echo "<td>" . date("F d, Y g:i:s A", strtotime($row['date'])) . "</td>";
        echo "<td>" . $row['transaction no.'] . "</td>";
        echo "<td>" . $row['customer name'] . "</td>";
        echo "<td>" . $row['delivery address'] . "</td>";
        echo "<td>" . $row['contact no.'] . "</td>";
        echo "<td>" . $row['email address'] . "</td>";
        echo "<td>" . $row['customer store name'] . "</td>";
        echo "<td>" . $row['product code'] . "</td>";
        echo "<td>" . $row['product name'] . "</td>";
        echo "<td>" . $row['box quantity'] . "</td>";
        echo "<td>" . $row['pcs per box'] . "</td>";
        echo "<td>" . $row['price per box'] . "</td>";
        echo "<td>" . $row['payment method'] . "</td>";
        echo "<td>" . $row['reference no.'] . "</td>";
        echo "<td>" . $row['vat 12%'] . "</td>";
        echo "<td>" . $row['shipping fee'] . "</td>";
        echo "<td>" . $row['discount'] . "</td>";
        echo "<td>" . $row['total'] . "</td>";
        echo '<td><select name="supplier" class="update_status" id="supplier" aria-label="update status">
                <option value="processing" ' . (!strcmp($row['order status'], "processing") ? "selected" : "") . '>Processing</option>
                <option value="to ship" ' . (!strcmp($row['order status'], "to ship") ? "selected" : "") . '>To ship</option>
                <option value="to receive" ' . (!strcmp($row['order status'], "to receive") ? "selected" : "") . '>To receive</option>
                <option value="completed" ' . (!strcmp($row['order status'], "completed") ? "selected" : "") . '>Completed</option>
                <option value="cancelled" ' . (!strcmp($row['order status'], "cancelled") ? "selected" : "") . '>Cancelled</option>
            </select></td>';
        echo "</tr>";
    }
?>

<script>
    $(document).ready(function() {
        $(".update_status").on("change", function() {
            $.ajax({
                type: "POST",
                url: "../includes/update-status.inc.php",
                data: {
                    transactionNo: $(this).parents("tr").attr("data"),
                    status: $(this).val()
                },
                success: function(result, status, xhr) {
                    console.log(result);
                    console.log(status);
                }
            });
        });
    });
</script>