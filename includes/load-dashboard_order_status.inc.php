<?php
    require_once "database.inc.php";

    session_start();

    $db = new Database();

    $result = $db -> connect("select", "supplier_customer");

    echo '<tr class="empty-transaction"><td colspan="19">No data found</td></tr>';

    forEach($result as $database => $row){
        if(strcmp($row['supplier name'], $_SESSION["store name"]) == 0) {
            echo "<tr>";
            echo "<td>" . date("F d, Y g:i:s A", strtotime($row['date'])) . "</td>";
            echo "<td>" . $row['transaction no.'] . "</td>";
            echo "<td>" . $row['product name'] . "</td>";
            echo "<td>" . $row['box quantity'] . "</td>";
            echo "<td>" . "₱ " . number_format($row['total'], 2) . "</td>";
            echo "<td>" . $row["order status"] . "</td>";
            echo "</tr>";
        }
    }
?>

<script>
    $(document).ready(function() {
        $(".empty-transaction").hide();

        $("#search-transaction").keyup(function() {
            search_transaction($(this).val());
        });

        function search_transaction(value) {
            let isEmpty = true;

            $(".table_transaction tbody tr").each(function() {
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
                $(".empty-transaction td").text("No data found");
                $(".empty-transaction").show();
            } else {
                $(".empty-transaction").hide();
            }

            if(value.length == 0) {
                if($("tbody.table_customers tr").length == 1) {
                    $(".empty-transaction td").text("Empty table");
                    $(".empty-transaction").show();
                }
            }
        }

        if($("tbody.table_customers tr").length == 1) {
            $(".empty-transaction td").text("Empty table");
            $(".empty-transaction").show();
        }
    });	
</script>