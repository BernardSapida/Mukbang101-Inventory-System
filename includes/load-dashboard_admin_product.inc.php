<?php
    require_once "database.inc.php";

    $db = new Database();

    $result = $db -> connect("select", "admin_product");

    echo '<tr class="empty-product"><td colspan="6">No data found</td></tr>';

    forEach($result as $database => $row){
        echo "<tr data=" . $row['product code'] . " class='" . (($row['box quantity'] <= 10) ? "danger" : "")  . "'>";
        echo "<td>" . $row['product code'] . "</td>";
        echo "<td>" . $row['product name'] . "</td>";
        echo "<td>" . $row['category'] . "</td>";
        echo "<td>" . $row['quantity'] . "</td>";
        echo "</tr>";
    }
?>

<script>
    $(document).ready(function() {
        $(".empty-product").hide();

        $("#search-item").keyup(function() {
            search_product($(this).val());
        });

        function search_product(value) {
            let isEmpty = true;

            $("tbody.table_stock tr").each(function() {
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
                $(".empty-product td").text("No data found");
                $(".empty-product").show();
            } else {
                $(".empty-product").hide();
            }

            if(value.length == 0) {
                if($("tbody.table_product tr").length == 1) {
                    $(".empty-product td").text("Empty table");
                    $(".empty-product").show();
                }
            }
        }

        if($("tbody.table_stock tr").length == 1) {
            $(".empty-product td").text("Empty table");
            $(".empty-product").show();
        }
    });
</script>