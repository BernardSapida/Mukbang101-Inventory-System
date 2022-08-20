<?php
    require_once "database.inc.php";

    $db = new Database();

    $result = $db -> connect("select", "supplier_customer", "order status");

    echo '<tr class="empty"><td colspan="20">No data found</td></tr>';
    
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
        echo "<td>" . $row['total'] . "</td>";;
        echo "<td>" . $row['order status'] . "</td>";
    }
?>

<script>
    $(document).ready(function() {
        $(".empty").hide();

        $("#search-item").keyup(function() {
            search_item($(this).val());
        });

        if($("table tbody tr").length == 1) {
            $(".empty td").text("Empty table");
            $(".empty").show();
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
                $(".empty td").text("No data found");
                $(".empty").show();
            } else {
                $(".empty").hide();
            }

            if(value.length == 0) {
                if($("table tbody tr").length == 1) {
                    $(".empty td").text("Empty table");
                    $(".empty").show();
                }
            }
        }

        if($("table tbody tr").length == 1) {
            $(".empty td").text("Empty table");
            $(".empty").show();
        }
    });
</script>