$(document).ready(function() {
    $("#information_validation_add").hide();
    $("#information_validation_edit").hide();

    $("#add-product").click(function(){
        $(".section_add-product").fadeIn();
        $("#product_code_add").val(Math.random().toString().replace("0.", "10").substring(0, 12));
        $(".btn-add_product").prop("disabled", false);
    });

    $("#btn-x-add").click(function(){
        $(".section_add-product").fadeOut();
        $("#information_validation_add").fadeOut();
    });

    $(".btn-add_product").click(function() {
        event.preventDefault();

        let errArray = [];

        if($("#product_name_add").val().length <= 0) errArray.push("Product name is required!");
        if($("#category_add").val().length <= 0) errArray.push("Category is required!");
        if($("#box_quantity_add").val().length <= 0) errArray.push("Box quantity is required!");
        if(!/^(\d)+$/g.test($("#box_quantity_add").val())) errArray.push("Box quantity is invalid!");
        if($("#pcs_per_box_add").val().length <= 0) errArray.push("Pcs per box is required!");
        if(!/^(\d)+$/g.test($("#pcs_per_box_add").val())) errArray.push("Pcs per box is invalid!");
        if($("#price_per_box_add").val().length <= 0) errArray.push("Price per box is required!");
        if(!/^(\d)+$|^(\d)+.(\d{2})$/g.test($("#price_per_box_add").val())) errArray.push("Price per box is invalid!");
    
        if(errArray.length == 0) {
            $(".table_product").load("../includes/load-supplier_added_product.inc.php", {
                productCode: $("#product_code_add").val(),
                productName: $("#product_name_add").val(),
                category: $("#category_add").val(),
                boxQuantity: $("#box_quantity_add").val(),
                pcsPerBox: $("#pcs_per_box_add").val(),
                pricePerBox: $("#price_per_box_add").val(),
                addedProduct: true
            });

            $("#information_validation_add").css({"background-color":"var(--green)"});
            $("#information_validation_add p").text("Product is successfully added!");
            $("#information_validation_add").fadeIn();

            $(this).prop("disabled", true);
            $(".section_add-product").fadeOut(2000);
            $("#information_validation_add").fadeOut(2000);
            $("#form_addedProduct")[0].reset();
        } else {
            $("#information_validation_add").css({"background-color":"var(--red3)"});
            $("#information_validation_add p").text(errArray[0]);
            $("#information_validation_add").fadeIn();
        }
    });

    $(".table_product").load("../includes/load-supplier_product.inc.php");
});