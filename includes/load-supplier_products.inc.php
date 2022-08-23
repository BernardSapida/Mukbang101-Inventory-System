<?php
    require_once "database.inc.php";

    $db = new Database();

    $result = $db -> connect("select", "supplier_product", array("supplierName" => $_POST["name"]));

    echo '<tr class="empty-product"><td colspan="5">No data found</td></tr>';

    forEach($result as $database => $row){
        echo "<tr data=" . $row['product code'] . " class='" . (($row['box quantity'] <= 10) ? "danger" : "")  . "'>";
        echo "<td>" . $row['product code'] . "</td>";
        echo "<td>" . $row['product name'] . "</td>";
        echo "<td>" . $row['box quantity'] . "</td>";
        echo "<td>" . $row['pcs per box'] . "</td>";
        echo "<td>₱ " . number_format($row['price per box'], 2) . "</td>";
        echo "</tr>";
    }
?>

<script>
    $(document).ready(function() {
        $(".empty-product").hide();

        $(".btn-view").click(function(){
            $(".section_view-products").fadeIn();
            $(".supplier_products").load("../includes/load-supplier_products.inc.php",{name: $(this).parents("tr").attr("data")});
            $("#storeName").text($(this).parents("tr").attr("data"));
        });

        $("#btn-close").click(function(){
            $(".section_view-products").fadeOut();
        });

        $("#search-product").keyup(function() {
            search_supplier($(this).val());
        });

        function search_supplier(value) {
            let isEmpty = true;

            $("tbody.supplier_products tr").each(function() {
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
                $(".empty-product").show();
            } else {
                $(".empty-product").hide();
            }
        }
    });
</script>