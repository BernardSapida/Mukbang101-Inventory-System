$(document).ready(function() {
    const params = new URLSearchParams(window.location.search);

    $("#container_validation").hide();

    $.ajax({
        type: "POST",
        url: "../includes/admin-checkout.inc.php",
        data: {
            productCode:  params.get("productCode")
        },
        dataType: "JSON",
        success: function(result, status, xhr) {
            $("#name").val(result["name"]);
            $("#delivery_address").val(result["address"]);
            $("#contact_number").val(result["contact no."]);
            $("#supplier_name").val(result["supplier name"]);
            $("#product_code").val(result["product code"]);
            $("#product_name").val(result["product name"]);
            $("#pcs_per_box").val(result["pcs per box"]);
            $("#price_per_box").val(Number(result["price per box"]).toFixed(2));
            $(".price").html("Php " + Number(result["price per box"]).toFixed(2) + " <span class='quantity'>x 0</span>");
            $(".shippingFee").html("Php " + Number(result["shipping fee"]).toFixed(2));
            $(".discount").html("Php " + Number(result["discount"]).toFixed(2));
            $(".total-amount").html("Php " + (
                Number(result["price per box"] * 0) +
                Number(result["shipping fee"]) - 
                Number(result["discount"])
            ).toFixed(2));
        }
    });   
    
    $("#box_quantity").keyup(function(){
        if($("#box_quantity").val() != "")  {
            $(".price").html("Php " + $("#price_per_box").val() + " <span class='quantity'>x " + $("#box_quantity").val() + "</span>");
            $(".total-amount").html("Php " + Intl.NumberFormat('en-US').format(
                Number($("#price_per_box").val()) * Number($("#box_quantity").val()) +
                Number($(".shippingFee").val()) -   
                Number($(".discount").val())
            ));
        } else {
            $(".price").html("Php " + $("#price_per_box").val() + " <span class='quantity'>x 0</span>");
            $(".total-amount").html("Php 0.00");
        }
    });

    $("#btn-submit").click(function() {
        let referenceNumber = null;
        let errArray = [];

        event.preventDefault();

        $("#container_validation").hide();

        if($("#name").val().length <= 0) errArray.push("Name is required!");
        if($("#delivery_address").val().length <= 0) errArray.push("Delivery address is required!");
        if($("#contact_number").val().length <= 0) errArray.push("Contact number is required!");
        if($("#supplier_name").val().length <= 0) errArray.push("Supplier name is required!");
        if($("#product_code").val().length <= 0) errArray.push("Product code is required!");
        if($("#product_name").val().length <= 0) errArray.push("Product name is required!");
        if($("#box_quantity").val().length <= 0) errArray.push("Box quantity is required!");
        if($("#pcs_per_box").val().length <= 0) errArray.push("Pcs per product is required!");
        if($("#price_per_box").val().length <= 0) errArray.push("Price per box is required!");
        if($("input[name='payment_mode']:checked").val() == null) errArray.push("Payment method is required!");

        if($("input[name='payment_mode']:checked").val() === "gcash") {
            if($("#gcash_reference_number").val().length == 0) errArray.push("Gcash payment reference number is required!");
            else if($("#gcash_reference_number").val().length != 13) errArray.push("Gcash payment reference number is invalid!");
            else referenceNumber = $("#gcash_reference_number").val();
        }

        if($("input[name='payment_mode']:checked").val() === "paymaya") {
            if($("#paymaya_reference_number").val().length == 0) errArray.push("Paymaya payment reference number is required!");
            else if($("#paymaya_reference_number").val().length != 13) errArray.push("Paymaya payment reference number is invalid!");
            else referenceNumber = $("#paymaya_reference_number").val();
        }

        if(errArray.length == 0) {
            $.ajax({
                type: "POST",
                url: "../includes/admin-checkout_placeorder.inc.php",
                dataType: "json",
                data: {
                    name:  $("#name").val(),
                    deliveryAddress: $("#delivery_address").val(),
                    contactNo: $("#contact_number").val(),
                    supplierName: $("#supplier_name").val(),
                    productCode: $("#product_code").val(),
                    productName: $("#product_name").val(),
                    boxQuantity: $("#box_quantity").val(),
                    pcsPerBox: $("#pcs_per_box").val(),
                    pricePerBox: $("#price_per_box").val().slice(0, -3),
                    paymentMethod: $("input[name='payment_mode']:checked").val(),
                    referenceNo: (referenceNumber == null ? "none" : referenceNumber),
                    vat: 0,
                    shippingFee: $(".shippingFee").text().slice(4, -3),
                    discount: $(".discount").text().slice(4, -3),
                    total: $(".total-amount").text().replace(/,/g, '').slice(4,),
                },
                success: function(result, status, xhr) {
                    console.table(result);
                }
            });

            $("#container_validation").css({"background-color":"var(--green)"});
            $("#container_validation p").text("Order is successfully placed!");
            $("#container_validation").fadeIn();

            $(this).prop("disabled", true);
            $(".section_add-product").fadeOut(2000);
            $("#container_validation").fadeOut(2000);
            $("#checkout-form")[0].reset();
        } else {
            $("#container_validation").css({"background-color":"var(--red3)"});
            $("#container_validation p").text(errArray[0]);
            $("#container_validation").fadeIn();
        }
    });

    $("#btn-back").click(function() {
        window.location.href = "admin.php?page=admin-product";
    });
});