<?php
    require_once "database.inc.php";

    session_start();

    $db = new Database();

    $result = $db -> connect("select", "supplier_customer");

    echo '<tr class="empty-item"><td colspan="19">No data found</td></tr>';

    forEach($result as $database => $row){
        if(strcmp($row['supplier name'], $_SESSION["store name"]) == 0) {
            echo "<tr data='" . $row['transaction no.'] . "' code='" . $row['product code'] . "'>";
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
            echo "<td>₱ " . $row['vat 12%'] . "</td>";
            echo "<td>₱ " . $row['shipping fee'] . "</td>";
            echo "<td>₱ " . $row['discount'] . "</td>";
            echo "<td>₱ " . $row['total'] . "</td>";
            echo '<td><select name="supplier" class="update_status" id="supplier" aria-label="update status">
                    <option value="Processing" ' . (!strcmp($row['order status'], "Processing") ? "selected" : "") . '>Processing</option>
                    <option value="To ship" ' . (!strcmp($row['order status'], "To ship") ? "selected" : "") . '>To ship</option>
                    <option value="To receive" ' . (!strcmp($row['order status'], "To receive") ? "selected" : "") . '>To receive</option>
                    <option value="Completed" ' . (!strcmp($row['order status'], "Completed") ? "selected" : "") . '>Completed</option>
                    <option value="Cancelled" ' . (!strcmp($row['order status'], "Cancelled") ? "selected" : "") . '>Cancelled</option>
                </select></td>';
            echo "</tr>";
        }
    }
?>

<script>
    $(document).ready(function() {
        $(".empty-item").hide();

        $("#search-item").keyup(function() {
            search_item($(this).val());
        });

        function search_item(value) {
            let isEmpty = true;

            $("table tbody tr").each(function() {
                let isFound = false;
                
                $(this).each(function() {
                    if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0) {
                        isFound = true;
                    }
                });
                
                if(isFound) {
                    $(this).show();
                    isEmpty = false;
                } else {
                    $(this).hide();
                }
            });

            if(isEmpty) {
                $(".empty-item td").text("No data found");
                $(".empty-item").show();
            } else {
                $(".empty-item").hide();
            }

            if(value.length == 0) {
                if($("table tbody tr").length == 1) {
                    $(".empty-item td").text("Empty table");
                    $(".empty-item").show();
                }
            }
        }

        if($("table tbody tr").length == 1) {
            $(".empty-item td").text("Empty table");
            $(".empty-item").show();
        }

        $(".update_status").on("change", function() {
            $.ajax({
                type: "POST",
                url: "../includes/update-status.inc.php",
                data: {
                    productCode: $(this).parents("tr").attr("code"),
                    transactionNo: $(this).parents("tr").attr("data"),
                    status: $(this).val()
                },
                success: function(result, status, xhr) {
                    console.log(result);
                },
                error(e) {
                    console.log(e);
                }
            });
        });
    });
</script>