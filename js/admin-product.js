$(document).ready(function() {
    $(".empty-product").hide();
    $("#container_validation_add").hide();
    $("#container_validation_edit").hide();
    $("#product_add").prop("disabled", "disabled");

    $("#add-product").click(function(){
        $(".section_add-product").fadeIn();
        $(".btn-add_product").prop("disabled", false);
    });

    $("#supplier_add").on("change", function() {
        $("#container_validation_add").hide();

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
        $("#container_validation_add").hide();

        if($("#product_add").val() == "") {
            $("#product_code_add").val("Product code");
            $("#category_add").val("Product category");
        } else {
            $.ajax({
                type: "POST",
                url: "../includes/admin-order_details.inc.php",
                data: {
                    productName:  $("#product_add").val()
                },
                dataType: "JSON",
                success: function(result, status, xhr) {
                    $("#product_code_add").val(result["product code"]);
                    $("#category_add").val(result["category"]);
                }
            });
        };
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
        if(doesExist($("#product_code_add").val()) != true) errArray.push("Product code is existing in product table!");
        if($("#category_add").val().length <= 0) errArray.push("Category is required!");
        if($("#quantity_add").val().length <= 0) errArray.push("Quantity is required!");
        if(!/^(\d)+$/g.test($("#quantity_add").val())) errArray.push("Quantity is invalid!");
        if($("#price_add").val().length <= 0) errArray.push("Price is required!");
        if(!/^(\d)+$|^(\d)+.(\d{2})$/g.test($("#price_add").val())) errArray.push("Price is invalid!");
        

        if(errArray.length == 0) {
            $(".table_product").load("../includes/load-admin_added_product.inc.php", {
                productCode: $("#product_code_add").val(),
                supplierName: $("#supplier_add").val(),
                productName: $("#product_add").val(),
                category: $("#category_add").val(),
                quantity: $("#quantity_add").val(),
                price: $("#price_add").val(),
                addedProduct: true
            });

            $("#container_validation_add").css({"background-color":"var(--green)"});
            $("#container_validation_add p").text("Product is successfully added!");
            $("#container_validation_add").fadeIn();

            $(this).prop("disabled", true);
            $(".section_add-product").fadeOut(2000);
            $("#container_validation_add").fadeOut(2000);
            $("#add_product")[0].reset();
        } else {
            $("#container_validation_add").css({"background-color":"var(--red3)"});
            $("#container_validation_add p").text(errArray[0]);
            $("#container_validation_add").fadeIn();
        }
    });

    $("#search-item").keyup(function() {
        search_item($(this).val());
    });

    function doesExist(value) {
        let isEmpty = true;

        $("table tbody tr").each(function() {
            let isFound = false;
            
            $(this).each(function() {
                if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0) {
                    isFound = true;
                }
            });
            
            if(isFound) isEmpty = false;
        });

        return isEmpty;
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

        return isEmpty;
    }

    if($("table tbody tr").length == 1) {
        $(".empty-product td").text("Empty table");
        $(".empty-product").show();
    }

    $(".table_product").load("../includes/load-admin_product_table.inc.php");
    $("#supplier_add").load("../includes/admin-add-product-supplier_options.inc.php");
});