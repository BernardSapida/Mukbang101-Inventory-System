<?php
    require_once "database.inc.php";

    $db = new Database();

    $result = $db -> connect("select", "admin_transaction_sales");

    echo '<tr class="empty-transaction"><td colspan="6">No data found</td></tr>';

    forEach($result as $database => $row){
        echo "<tr data='" . $row['reference no.'] . "'>";
        echo "<td>" . date("F d, Y g:i:s A", strtotime($row['date'])) . "</td>";
        echo "<td>" . $row['reference no.'] . "</td>";
        echo "<td>" . $row['vat 12%'] . "</td>";
        echo "<td>" . $row['discount'] . "</td>";
        echo "<td>" . $row['total amount'] . "</td>";
        echo '<td><button type="button" class="btn-view" aria-label="btn-view"><i class="fa-solid fa-scroll"></i> View Details</button></td>';
        echo "</tr>";
    }
?>

<script>
    $(document).ready(function() {
        $(".empty-transaction").hide();

        $(".btn-view").click(function(){
            window.location.href = `admin.php?page=admin-view_receipt&&referenceNo=${$(this).parents("tr").attr("data")}`;
            // $(".supplier_products").load("../includes/load-supplier_products.inc.php",{name: $(this).parents("tr").attr("data")});
            // $("#storeName").text($(this).parents("tr").attr("data"));
        });

        $("#search-receipt").keyup(function() {
            search_transaction($(this).val());
        });

        function search_transaction(value) {
            let isEmpty = true;

            $("tbody.sales_report tr").each(function() {
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
                $(".empty-transaction").show();
            } else {
                $(".empty-transaction").hide();
            }
        }

        if($("tbody.sales_report tr").length == 1) {
            $(".empty-transaction td").text("Empty table");
            $(".empty-transaction").show();
        }
    });
</script>