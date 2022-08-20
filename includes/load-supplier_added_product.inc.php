<?php
    require_once "database.inc.php";

    $db = new Database();
    
    if(isset($_POST["addedProduct"])) {
        $db -> connect("insert", "supplier_product", array(
            "productCode" => $_POST["productCode"],
            "productName" => $_POST["productName"],
            "category" => $_POST["category"],
            "boxQuantity" => $_POST["boxQuantity"],
            "pcsPerBox" => $_POST["pcsPerBox"],
            "pricePerBox" => $_POST["pricePerBox"],
        ));

        $result = $db -> connect("select", "supplier_product");

        echo '<tr class="empty-product"><td colspan="8">No data found</td></tr>';
    
        forEach($result as $database => $row){
            echo "<tr data=" . $row['product code'] . " class='" . (($row['box quantity'] <= 10) ? "danger" : "")  . "'>";
            echo "<td>" . $row['product code'] . "</td>";
            echo "<td>" . $row['product name'] . "</td>";
            echo "<td>" . $row['category'] . "</td>";
            echo "<td>" . $row['box quantity'] . "</td>";
            echo "<td>" . $row['pcs per box'] . "</td>";
            echo "<td>" . $row['price per box'] . "</td>";
            echo "<td>" . date("F d, Y", strtotime($row['date of stock'])) . "</td>";
            echo '<td>
                    <button type="button" class="btn-edit" aria-label="btn-edit"><i class="fa-solid fa-pen-to-square"></i> Edit</button>
                    <button type="button" class="btn-delete" aria-label="btn-delete"><i class="fa-solid fa-trash-can"></i></button>
                </td>';
            echo "</tr>";
        }
    }
?>

<script>
    $(document).ready(function() {
        $(".empty-product").hide();

        $(".btn-delete").click(function() {
            let productCode = $(this).parents("tr").attr("data");

            $.ajax({
                type: "POST",
                url: "../includes/delete-supplier_product.inc.php",
                data: {
                    productCode: $(this).parents("tr").attr("data")
                },
                success: function(result, status, xhr) {
                    $(`tr[data = ${productCode}]`).remove();

                    if($("table tbody tr").length == 1) {
                        $(".empty-product td").text("Empty table");
                        $(".empty-product").show();
                    }
                }
            });
        });

        $(".btn-edit").click(function(){
            $(".section_edit-product").fadeIn();
            $("#product-title").val("Edit Product");

            $.ajax({
                type: "POST",
                url: "../includes/edit-supplier_product.inc.php",
                data: {productCode: $(this).parents("tr").attr("data")},
                dataType: "JSON",
                success: function(result, status, xhr) {
                    console.table(result);
                    $("#product_code_edit").val(result["product code"]);
                    $("#product_name_edit").val(result["product name"]);
                    $("#category_edit").val(result["category"]);
                    $("#box_quantity_edit").val(result["box quantity"]);
                    $("#pcs_per_box_edit").val(result["pcs per box"]);
                    $("#price_per_box_edit").val(result["price per box"]);
                }
            });
        });
    });
</script>