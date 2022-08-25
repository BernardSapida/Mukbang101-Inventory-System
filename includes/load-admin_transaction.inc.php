<?php
    require_once "database.inc.php";

    $db = new Database();
    $result = $db -> connect("select", "admin_orders", "all records");

    echo '<tr class="empty-item"><td colspan="19">No data found</td></tr>';
    
    forEach($result as $database => $row){
        echo "<tr data=" . $row['product code'] . " transactionNo = '" . $row['transaction no.'] . "' class='" . (($row['quantity'] <= 10) ? "danger" : "")  . "'>";
        echo "<td>" . date("F d, Y", strtotime($row['date of stock'])) . "</td>";
        echo "<td>" . $row['transaction no.'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['delivery address'] . "</td>";
        echo "<td>" . $row['contact no.'] . "</td>";
        echo "<td>" . $row['email address'] . "</td>";
        echo "<td>" . $row['supplier name'] . "</td>";
        echo "<td>" . $row['product code'] . "</td>";
        echo "<td>" . $row['product name'] . "</td>";
        echo "<td>" . $row['box quantity'] . "</td>";
        echo "<td>" . $row['pcs per box'] . "</td>";
        echo "<td>₱ " . number_format(intval($row['price per box']), 2) . "</td>";
        echo "<td>" . $row['payment method'] . "</td>";
        echo "<td>" . $row['reference no.'] . "</td>";
        echo "<td>₱ " . number_format(intval($row['vat 12%']), 2) . "</td>";
        echo "<td>₱ " . number_format(intval($row['shipping fee']), 2) . "</td>";
        echo "<td>₱ " . number_format(intval($row['discount']), 2) . "</td>";
        echo "<td>₱ " . number_format(intval($row['total']), 2) . "</td>";
        if(strcmp($row['order status'], "Processing") == 0) echo "<td>" . $row['order status'] . " <button type='button' class='btn-delete' aria-label='delete'><i class='fa-solid fa-xmark'></i> Cancel</button></td>";
        else echo "<td>" . $row['order status'] . "</td>";
        echo "</tr>";
    }
?>

<script>
    $(document).ready(function() {
        $(".empty-item").hide();
        
        $("#search-item").keyup(function() {
            search_item($(this).val());
        });

        if($("table tbody tr").length == 1) {
            $(".empty-item td").text("Empty table");
            $(".empty-item").show();
        }

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
            $(".empty").show();
        }

        $(".btn-delete").click(function(){
            $.ajax({
                type: "POST",
                url: "../includes/admin-cancel_orders.inc.php",
                data: {
                    "transactionNo": $(this).parents("tr").attr("transactionNo"),
                    "orderStatus": "Cancelled"
                },
                error(e) {
                    console.log(e)
                }
            });

            $(this).parent().text("Cancelled");
            $(this).remove();
        });
    });
</script>