<?php
    require_once "database.inc.php";
    
    session_start();

    $db = new Database();

    $result = $db -> connect("select", "accounts", "supplier");

    echo '<tr class="empty-supplier"><td colspan="7">No data found</td></tr>';

    forEach($result as $database => $row){
        echo "<tr data='" . $row['store name'] . "'>";
        echo "<td><img src='../profile/" . $row['image'] . "' alt='supplier image'></td>";
        echo "<td>" . $row['store name'] . "</td>";
        echo "<td>" . $row['firstname'] . " " . $row['lastname'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['contact no.'] . "</td>";
        echo "<td>" . $row['address'] . "</td>";
        echo '<td>
                <button class="btn-view" aria-label="btn-view"><i class="fa-solid fa-bag-shopping"></i> View Products</button>
            </td>';
        echo "</tr>";
    }
?>

<script>
    $(document).ready(function() {
        $(".empty-supplier").hide();

        $(".btn-view").click(function(){
            $(".section_view-products").fadeIn();
            $(".supplier_products").load("../includes/load-supplier_products.inc.php",{name: $(this).parents("tr").attr("data")});
            $("#storeName").text($(this).parents("tr").attr("data"));
        });

        $("#btn-close").click(function(){
            $(".section_view-products").fadeOut();
        });

        $("#search-supplier").keyup(function() {
            search_supplier($(this).val());
        });

        function search_supplier(value) {
            let isEmpty = true;

            $("tbody.supplier_informations tr").each(function() {
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
                $(".empty-supplier").show();
            } else {
                $(".empty-supplier").hide();
            }
        }
    });
</script>
