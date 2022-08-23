<?php
    require_once "database.inc.php";

    session_start();

    $db = new Database();
    $result = $db -> connect("select", "admin_product");
    $productCode = 1;

    echo '<tr class="empty-product"><td colspan="8">No data found</td></tr>';
    
    forEach($result as $database => $row){
        echo "<tr data=" . $row['product code'] . " class='" . (($row['quantity'] <= 10) ? "danger" : "")  . "'>";
        echo "<td>" . $row['product code'] . "</td>";
        echo "<td>" . $row['supplier name'] . "</td>";
        echo "<td>" . $row['product name'] . "</td>";
        echo "<td>" . $row['category'] . "</td>";
        echo "<td>" . $row['quantity'] . "</td>";
        echo "<td>₱ " . number_format(intval($row['price']), 2) . "</td>";
        echo "<td>" . date("F d, Y", strtotime($row['date of stock'])) . "</td>";
        echo '<td>
                <button type="button" class="btn-order" aria-label="btn-order"><i class="fa-solid fa-box"></i> Order</button>
                <button type="button" class="btn-edit" aria-label="btn-edit"><i class="fa-solid fa-pen-to-square"></i></button>
                <button type="button" class="btn-delete" aria-label="btn-delete"><i class="fa-solid fa-trash-can"></i></button>
            </td>';
        echo "</tr>";
    }
?>

<script>
    $(document).ready(function() {
        $(".empty-product").hide();

        $(".btn-order").click(function(){
            window.location.href = `admin.php?page=admin-checkout&&productCode=${$(this).parents("tr").attr("data")}`;
        });

        $(".btn-edit").click(function(){
            $(".section_edit-product").fadeIn();
            $(".btn-edit_product").prop("disabled", false);

            $.ajax({
                type: "POST",
                url: "../includes/edit-admin_product.inc.php",
                data: {productCode: $(this).parents("tr").attr("data")},
                dataType: "JSON",
                success: function(result, status, xhr) {
                    $("#product_code_edit").val(result["product code"]);
                    $("#supplier_edit").val(result["supplier name"]);
                    $("#product_edit").val(result["product name"]);
                    $("#category_edit").val(result["category"]);
                    $("#quantity_edit").val(result["quantity"]);
                    $("#price_edit").val(result["price"]);
                }
            });
        });

        $("#btn_x_edit").click(function(){
            $(".section_edit-product").fadeOut();
            $("#information_validation_edit").fadeOut();
        });

        $(".btn-delete").click(function() {
            let productCode = $(this).parents("tr").attr("data");

            $.ajax({
                type: "POST",
                url: "../includes/delete-admin_product.inc.php",
                data: {
                    productCode: $(this).parents("tr").attr("data")
                },
                success: function(result, status, xhr) {
                    $(`tr[data = ${productCode}]`).remove();

                    if($("table tbody tr").length == 0) {
                        $(".empty-product td").text("Empty table");
                        $(".empty-product").show();
                    }
                }
            });
        });

        $(".btn-edit_product").click(function() {
            event.preventDefault();

            let errArray = [];

            if($("#supplier_edit").val().length <= 0) errArray.push("Supplier is required!");
            if($("#product_edit").val().length <= 0) errArray.push("Product is required!");
            if($("#product_code_edit").val().length <= 0) errArray.push("Product code is required!");
            if($("#category_edit").val().length <= 0) errArray.push("Category is required!");
            if($("#quantity_edit").val().length <= 0) errArray.push("Quantity is required!");
            if(!/^(\d)+$/g.test($("#quantity_edit").val())) errArray.push("Quantity is invalid!");
            if($("#price_edit").val().length <= 0) errArray.push("Price is required!");
            if(!/^(\d)+$|^(\d)+.(\d{2})$/g.test($("#price_edit").val())) errArray.push("Price is invalid!");

            if(errArray.length == 0) {
                $.ajax({
                    type: "POST",
                    url: "../includes/update-admin_product.inc.php",
                    data: {
                        productCode: $("#product_code_edit").val(),
                        // productName: $("#product_name_edit").val(),
                        // category: $("#category_edit").val(),
                        quantity: $("#quantity_edit").val(),
                        // pcsPerBox: $("#pcs_per_box_edit").val(),
                        price: $("#price_edit").val(),
                        addedProduct: true
                    },
                    dataType: "JSON",
                    success: function(result, status, xhr) {
                        $("#product_code_edit").val(result["product code"]);
                        $("#product_name_edit").val(result["product name"]);
                        $("#category_edit").val(result["category"]);
                        $("#box_quantity_edit").val(result["box quantity"]);
                        $("#pcs_per_box_edit").val(result["pcs per box"]);
                        $("#price_per_box_edit").val(result["price per box"]);
                    }
                });

                $("#container_validation_edit").css({"background-color":"var(--green)"});
                $("#container_validation_edit p").text("Product is successfully updated!");
                $("#container_validation_edit").fadeIn();

                $(this).prop("disabled", true);
                $(".section_edit-product").fadeOut(2000);
                setTimeout(function() {
                    $("#container_validation_edit").fadeOut();
                }, 2000);
                // $("#form_editProduct")[0].reset();
                
                $(".table_product").load("../includes/load-admin_product_table.inc.php");
            } else {
                $("#container_validation_edit").css({"background-color":"var(--red3)"});
                $("#container_validation_edit p").text(errArray[0]);
                $("#container_validation_edit").fadeIn();
            }
        });
    });
</script>