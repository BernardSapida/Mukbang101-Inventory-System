<?php
    require_once "database.inc.php";
    
    session_start();

    $db = new Database();

    $result = $db -> connect("select", "supplier_product", array("supplierName" => $_SESSION["store name"]));

    forEach($result as $database => $row){
        echo "<tr data=" . $row['product code'] . " class='" . (($row['box quantity'] <= 10) ? "danger" : "")  . "'>";
        echo "<td>" . $row['product code'] . "</td>";
        echo "<td>" . $row['product name'] . "</td>";
        echo "<td>" . $row['category'] . "</td>";
        echo "<td>" . $row['box quantity'] . "</td>";
        echo "<td>" . $row['pcs per box'] . "</td>";
        echo "<td>₱ " . number_format($row['price per box'], 2) . "</td>";
        echo "<td>" . date("F d, Y", strtotime($row['date of stock'])) . "</td>";
        echo '<td>
                <button type="button" class="btn-edit" aria-label="btn-edit"><i class="fa-solid fa-pen-to-square"></i> Edit</button>
                <button type="button" class="btn-delete" aria-label="btn-delete"><i class="fa-solid fa-trash-can"></i></button>
            </td>';
        echo "</tr>";
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
            $(".btn-edit_product").prop("disabled", false);

            $.ajax({
                type: "POST",
                url: "../includes/edit-supplier_product.inc.php",
                data: {productCode: $(this).parents("tr").attr("data")},
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
        });

        $("#btn-x-edit").click(function(){
            $(".section_edit-product").fadeOut();
            $("#information_validation_edit").fadeOut();
        });

        $(".btn-edit_product").click(function() {
            event.preventDefault();

            let errArray = [];

            if($("#product_name_edit").val().length <= 0) errArray.push("Product name is required!");
            if($("#category_edit").val().length <= 0) errArray.push("Category is required!");
            if($("#box_quantity_edit").val().length <= 0) errArray.push("Box quantity is required!");
            if(!/^(\d)+$/g.test($("#box_quantity_edit").val())) errArray.push("Box quantity is invalid!");
            if($("#pcs_per_box_edit").val().length <= 0) errArray.push("Pcs per box is required!");
            if(!/^(\d)+$/g.test($("#pcs_per_box_edit").val())) errArray.push("Pcs per box is invalid!");
            if($("#price_per_box_edit").val().length <= 0) errArray.push("Price per box is required!");
            if(!/^(\d)+$|^(\d)+.(\d{2})$/g.test($("#price_per_box_edit").val())) errArray.push("Price per box is invalid!");
        
            if(errArray.length == 0) {
                $.ajax({
                    type: "POST",
                    url: "../includes/update-supplier_product.inc.php",
                    data: {
                        productCode: $("#product_code_edit").val(),
                        productName: $("#product_name_edit").val(),
                        category: $("#category_edit").val(),
                        boxQuantity: $("#box_quantity_edit").val(),
                        pcsPerBox: $("#pcs_per_box_edit").val(),
                        pricePerBox: $("#price_per_box_edit").val(),
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

                $("#information_validation_edit").css({"background-color":"var(--green)"});
                $("#information_validation_edit p").text("Product is successfully updated!");
                $("#information_validation_edit").fadeIn();

                $(this).prop("disabled", true);
                $(".section_edit-product").fadeOut(2000);
                setTimeout(function() {
                    $("#information_validation_edit").fadeOut();
                }, 2000);
                // $("#form_editProduct")[0].reset();
                
                $(".table_product").load("../includes/load-supplier_product_table.inc.php");
            } else {
                $("#information_validation_edit").css({"background-color":"var(--red3)"});
                $("#information_validation_edit p").text(errArray[0]);
                $("#information_validation_edit").fadeIn();
            }
        });
    });
</script>