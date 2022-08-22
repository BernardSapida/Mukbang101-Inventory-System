$(document).ready(function() {
    $("#container_validation_add").hide();
    $("#container_validation_edit").hide();
    $("#product_add").prop("disabled", "disabled");

    $("#supplier_add").load("../includes/admin-add-product-supplier_options.inc.php");

    $("#supplier_add").on("change", function() {
        $("#product_add").load("../includes/admin-add-product-name_options.inc.php", {
            selectedSupplier: $("#supplier_add").val()
        });

        $("#category_add").val("Product category");

        if($("#supplier_add").val() == "") {
            $("#product_add").prop("disabled", "disabled");
        } else {
            $("#product_add").prop("disabled", "");
        }
    });

    $("#product_add").on("change", function() {
        if($("#product_add").val() == "") {
            $("#category_add").val("Product category");
            $("#product_code_add").val("Product code");
        } else {
            $.ajax({
                type: "POST",
                url: "../includes/admin-add_category.inc.php",
                data: {
                    productName:  $("#product_add").val()
                },
                dataType: "JSON",
                success: function(result, status, xhr) {
                    $("#category_add").val(result["category"]);
                    $("#product_code_add").val(result["product code"]);
                }
            })
        };
    });

    $("#add-product").click(function(){
        $(".section_add-product").fadeIn();
        $(".btn-add_product").prop("disabled", false);
    });

    $("#btn_x_add").click(function(){
        $(".section_add-product").fadeOut();
        $("#information_validation_add").fadeOut();
        $("#add_product")[0].reset();
    });

    $(".btn-add_product").click(function() {
        event.preventDefault();

        let errArray = [];

        if($("#supplier_add").val().length <= 0) errArray.push("Supplier is required!");
        if($("#product_add").val().length <= 0) errArray.push("Product is required!");
        if($("#product_code_add").val().length <= 0) errArray.push("Product code is required!");
        if($("#category_add").val().length <= 0) errArray.push("Category is required!");
        if($("#quantity_add").val().length <= 0) errArray.push("Quantity is required!");
        if(!/^(\d)+$/g.test($("#quantity_add").val())) errArray.push("Quantity is invalid!");
    
        if(errArray.length == 0) {
            $(".table_product").load("../includes/load-admin_added_product.inc.php", {
                productCode: $("#product_code_add").val(),
                supplierName: $("#supplier_add").val(),
                productName: $("#product_add").val(),
                category: $("#category_add").val(),
                quantity: $("#quantity_add").val(),
                addedProduct: true
            });

            $("#container_validation_add").css({"background-color":"var(--green)"});
            $("#container_validation_add p").text("Product is successfully added!");
            $("#container_validation_add").fadeIn();

            $(this).prop("disabled", true);
            $(".section_add-product").fadeOut(2000);
            $("#container_validation_add").fadeOut(2000);
            $("#form_addedProduct")[0].reset();
        } else {
            $("#container_validation_add").css({"background-color":"var(--red3)"});
            $("#container_validation_add p").text(errArray[0]);
            $("#container_validation_add").fadeIn();
        }
    });

    // ADD TO LOAD FUNCTION

    $(".empty-product").hide();

    $("#search-item").keyup(function() {
        search_item($(this).val());
    });

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
            $(".empty-product td").text("No data found");
            $(".empty-product").show();
        } else {
            $(".empty-product").hide();
        }

        if(value.length == 0) {
            if($("table tbody tr").length == 1) {
                $(".empty-product td").text("Empty table");
                $(".empty-product").show();
            }
        }
    }

    $("#btn-delete").click(function() {
        let productCode = $(this).parents("tr").attr("data");

        // $.ajax({
        //     type: "POST",
        //     url: "../includes/delete-supplier_product.inc.php",
        //     data: {
        //         productCode: $(this).parents("tr").attr("data")
        //     },
        //     success: function(result, status, xhr) {
        //         $(`tr[data = ${productCode}]`).remove();

        //         if($("table tbody tr").length == 0) {
        //             $(".empty-product td").text("Empty table");
        //             $(".empty-product").show();
        //         }
        //     }
        // });
    });

    $("#btn-edit").click(function(){
        $(".section_edit-product").fadeIn();
        $(".btn-edit_product").prop("disabled", false);

        // $.ajax({
        //     type: "POST",
        //     url: "../includes/edit-admin_product.inc.php",
        //     data: {productCode: $(this).parents("tr").attr("data")},
        //     dataType: "JSON",
        //     success: function(result, status, xhr) {
        //         console.table(result);
        //         $("#product_code_edit").val(result["product code"]);
        //         $("#product_name_edit").val(result["product name"]);
        //         $("#category_edit").val(result["category"]);
        //         $("#box_quantity_edit").val(result["box quantity"]);
        //         $("#pcs_per_box_edit").val(result["pcs per box"]);
        //         $("#price_per_box_edit").val(result["price per box"]);
        //     }
        // });
    });

    $("#btn-order").click(function(){
        window.location.href = "admin.php?page=admin-checkout";
    });

    $("#btn_x_edit").click(function(){
        $(".section_edit-product").fadeOut();
        $("#information_validation_edit").fadeOut();
    });

    if($("table tbody tr").length == 1) {
        $(".empty-product td").text("Empty table");
        $(".empty-product").show();
    }
});