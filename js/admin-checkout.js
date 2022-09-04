$(document).ready(function() {
    $("#box_quantity").keyup(function(){
        if($("#box_quantity").val() != "")  {
            $(".price").html("₱" + $("#price_per_box").val() + " <span class='quantity'>x " + $("#box_quantity").val() + "</span> = <span class='pq-total'>" + Number($("#price_per_box").val()) * Number($("#box_quantity").val()) + "</span>");
            $(".vat").html("₱" + (Number($("#price_per_box").val()) * Number($("#box_quantity").val())) * .12);
            $(".total-amount").html("₱" + Intl.NumberFormat('en-US').format(
                Number($("#price_per_box").val()) * Number($("#box_quantity").val()) + 
                ((Number($("#price_per_box").val()) * Number($("#box_quantity").val())) * .12) +
                Number($(".shippingFee").text().slice(1,)) - Number($(".discount").text().slice(1,))
            ));
        } else {
            $(".price").html("₱" + $("#price_per_box").val() + " <span class='quantity'>x 0 = 0</span>");
            $(".total-amount").html("₱0.00");
        }
    });

    $("#btn-submit").click(function() {
        let referenceNumber = null;
        let errArray = [];

        event.preventDefault();

        $("#container_validation").hide();

        if($("#name").val().length <= 0) errArray.push("Name is required!");
        if($("#delivery_address").val().length == 0) errArray.push("Delivery address is required!");
        if($("#contact_number").val().length == 0) errArray.push("Contact number is required!");
        if(!$("#contact_number").val().startsWith("09")) errArray.push("Contact number is invalid!");
        if($("#supplier_name").val().length == 0) errArray.push("Supplier name is required!");
        if($("#product_name").val().length == 0) errArray.push("Product name is required!");
        if($("#product_code").val().length == 0) errArray.push("Product code is required!");
        if($("#box_quantity").val().length == 0) errArray.push("Box quantity is required!");
        if($("#pcs_per_box").val().length == 0) errArray.push("Pcs per product is required!");
        if($("#price_per_box").val().length == 0) errArray.push("Price per box is required!");
        if($("input[name='payment_mode']:checked").val() == null) errArray.push("Payment method is required!");

        if($("input[name='payment_mode']:checked").val() === "gcash") {
            if($("#paymaya_payment_name").val().length == 0) errArray.push("Supplier gcash name is required!");
            if($("#paymaya_payment_number").val().length == 0) errArray.push("Supplier gcash number is required!");
            if(($("#paymaya_payment_number").val().length != 11) || !$("#paymaya_payment_number").val().startsWith("09")) errArray.push("Supplier gcash number is invalid!");
            if($("#gcash_reference_number").val().length == 0) errArray.push("Gcash payment reference number is required!");
            if($("#gcash_reference_number").val().length != 13) errArray.push("Gcash payment reference number is invalid!");
            referenceNumber = $("#gcash_reference_number").val();
        }

        if($("input[name='payment_mode']:checked").val() === "paymaya") {
            if($("#paymaya_payment_name").val().length == 0) errArray.push("Supplier paymaya name is required!");
            if($("#paymaya_payment_number").val().length == 0) errArray.push("Supplier paymaya number is required!");
            if(($("#paymaya_payment_number").val().length != 11) || !$("#paymaya_payment_number").val().startsWith("09")) errArray.push("Supplier paymaya number is invalid!");
            if($("#paymaya_reference_number").val().length == 0) errArray.push("Paymaya payment reference number is required!");
            if($("#paymaya_reference_number").val().length != 13) errArray.push("Paymaya payment reference number is invalid!");
            referenceNumber = $("#paymaya_reference_number").val();
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
                    pricePerBox: $("#price_per_box").val(),
                    paymentMethod: $("input[name='payment_mode']:checked").val(),
                    referenceNo: (referenceNumber == null ? "none" : referenceNumber),
                    vat: $(".vat").text().slice(1,),
                    shippingFee: $(".shippingFee").text().slice(1,),
                    discount: $(".discount").text().slice(1,),
                    total: $(".total-amount").text().replace(/,/g, '').slice(1,),
                },
                success: function(result, status, xhr) {
                    console.table(result);
                },
                error(e) {
                    console.log(e);
                }
            });

            $("#container_validation").css({"background-color":"var(--green)"});
            $("#container_validation p").text("Order is successfully placed!");
            $("#container_validation").fadeIn();

            $(this).prop("disabled", true);
            $(".section_add-product").fadeOut(2000);
            $("#container_validation").fadeOut(2000);
            setTimeout(function() {
                window.location.href = "admin.php?page=admin-transaction";
            }, 2000);
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

    $("#supplier_name").change(function() {
        $("#product_name").load("../includes/admin-add-product-name_options.inc.php", {
            selectedSupplier: $("#supplier_name").val()
        });

        if($("#supplier_name").val() == "") {
            $("#product_name").prop("disabled", "disabled");
            $("#product_code").val("");
            $("#pcs_per_box").val("");
            $("#product_code").val("");
            $("#gcash_payment_name").val("");
            $("#gcash_payment_number").val("");
            $("#paymaya_payment_name").val("");
            $("#paymaya_payment_number").val("");
        } else {
            $("#product_name").prop("disabled", "");
            $.ajax({
                type: "POST",
                url: "../includes/admin-checkout.inc.php",
                dataType: "json",
                data: { selectedSupplier: $("#supplier_name").val() },
                success: function(result, status, xhr) {
                    // console.table(result);
                    $("#gcash_payment_name").val(result['payment name']);
                    $("#gcash_payment_number").val(result['payment number']);
                    $("#paymaya_payment_name").val(result['payment name']);
                    $("#paymaya_payment_number").val(result['payment number']);
                }
            });
        }
    });

    $("#product_name").change(function() {
        if($(this).val() == "") {
            $("#product_code").val("");
            $("#product_code").val("");
            $("#pcs_per_box").val("");
            $("#price_per_box").val("");
        } else {
            $.ajax({
                type: "POST",
                url: "../includes/admin-order_details.inc.php",
                data: {
                    productName:  $("#product_name").val()
                },
                dataType: "JSON",
                success: function(result, status, xhr) {
                    console.table(result);
                    $("#product_code").val(result["product code"]);
                    $("#pcs_per_box").val(result["pcs per box"]);
                    $("#price_per_box").val(result["price per box"]);
                    $(".price").html(new Intl.NumberFormat("en-US",{
                        style: "currency",
                        currency: "Php",
                        maximumFractionDigits: 2,
                      }).format(Number(result["price per box"])) + " <span class='quantity'>x 0 = 0</span>");
                    $(".shippingFee").html(new Intl.NumberFormat("en-US",{
                        style: "currency",
                        currency: "Php",
                        maximumFractionDigits: 2,
                      }).format(Number(result["shipping fee"]).toFixed(2)));
                    $(".discount").html(new Intl.NumberFormat("en-US",{
                        style: "currency",
                        currency: "Php",
                        maximumFractionDigits: 2,
                      }).format(Number(result["discount"]).toFixed(2)));
                }
            });
        }
    });

    $("#supplier_name").load("../includes/admin-add-product-supplier_options.inc.php");
});