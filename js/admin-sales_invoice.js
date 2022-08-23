$(document).ready(function() {
    let uuid = Math.random().toString(16).substr(2, 8);
    let referenceNo = (Math.random().toString()).substring(2,14);
    let date = new Date().toLocaleString('en-US', {month: 'long', day: 'numeric', year: 'numeric'})
    let subTotal = 0.00;
    let vat = 0.00;
    let discount = 0.00;
    let totalAmount = 0.00;

    $("#referenceNo").text(referenceNo);
    $("#date").text(date);

    $(".container_items table tbody").append(`
        <tr>
            <td>
                <input type="text" name="product_name${uuid}" id="product_name${uuid}" placeholder="Product Name">
            </td>
            <td>
                <input type="number" name="quantity${uuid}" id="quantity${uuid}" placeholder="Quantity">
            </td>
            <td>
                <input type="number" name="price${uuid}" id="price${uuid}" placeholder="Price">
            </td>
            <td>
                <button type="button" class="btn-delete" aria-label="delete"><i class="fa-solid fa-trash-can"></i></button>
            </td>
        </tr>
    `);

    // alert($(`#product_name${uuid}`).val())
    // form.append(`product_name${uuid}`, $(`#product_name${uuid}`).val());
    // form.append(`quantity${uuid}`, $(`#quantity${uuid}`).val());
    // form.append(`price${uuid}`, $(`#price${uuid}`).val());

    $("#btn-add").click(function() {
        uuid = Math.random().toString(16).substr(2, 8);

        $(".container_items table tbody").append(`
            <tr>
                <td>
                    <input type="text" name="product_name${uuid}" id="product_name${uuid}" placeholder="Product Name">
                </td>
                <td>
                    <input type="number" name="quantity${uuid}" id="quantity${uuid}" placeholder="Quantity">
                </td>
                <td>
                    <input type="number" name="price${uuid}" id="price${uuid}" placeholder="Price">
                </td>
                <td>
                    <button type="button" class="btn-delete" aria-label="delete"><i class="fa-solid fa-trash-can"></i></button>
                </td>
            </tr>
        `);

        // form.append(`product_name${uuid}`, $(`#product_name${uuid}`).val());
        // form.append(`quantity${uuid}`, $(`#quantity${uuid}`).val());
        // form.append(`price${uuid}`, $(`#price${uuid}`).val());

        $(".btn-delete").click(function() {
            $(this).parents("tr").remove();
        });

        $("input").keyup(function() {
            computeSubTotal();
        });
    });

    $(".btn-delete").click(function() {
        $(this).parents("tr").remove();
    });

    $("input").keyup(function() {
        computeSubTotal();
    });

    function computeSubTotal() {
        let form = $("#form_receipt").serialize().split("&");
        let quantityIndex = 1;
        let priceIndex = 2;
        let data = {};
        discount = Number($("#discount").val());
        
        for(var key in form) data[form[key].split("=")[0]] = form[key].split("=")[1];

        for(let i = 0; i < Math.floor(form.length / 3); i++) {
            subTotal += (Number($(`#${Object.keys(data)[priceIndex]}`).val()) * Number($(`#${Object.keys(data)[quantityIndex]}`).val()));
            quantityIndex += 3;
            priceIndex += 3;
        }
        // console.log("Length: " + Math.floor(form.length / 3));
        // console.log("Sub. Total: " + subTotal);
        // console.log("Discount: " + discount);


        $("#subTotal").text(Intl.NumberFormat('en-US').format(subTotal));
        $("#totalAmount").text(Intl.NumberFormat('en-US').format(subTotal - discount));

        subTotal = 0;
        total = 0;
        if($("#discount").val() <= 0) $("#discount").val(0);
    }

    $("#btn-submit").click(function() {
        // let form = $("#form_receipt").serialize();
        let total = 0;
        let form = $("#form_receipt").serialize().split("&");
        let data = {};

        // console.log(form.length / 3);
        for(var key in form) data[form[key].split("=")[0]] = form[key].split("=")[1];

        let dataKeys = Object.keys(data);
        let dataValues = Object.values(data);

        dataValues.pop();
        // console.log(dataKeys)
        if(dataKeys.length == 1) {
            $("#container_validation").css({"background-color":"var(--red3)"});
            $("#container_validation p").text("Please add a product!");
            $("#container_validation").fadeIn();
        } else {
            if (dataValues.filter(v => v == 0).length == 0) {
                $("#container_validation").css({"background-color":"var(--green)"});
                $("#container_validation p").text("Product is successfully added!");
                $("#container_validation").fadeIn();
    
                $(this).prop("disabled", true);
                $("#container_validation").fadeOut(2000);
                $("#form_receipt")[0].reset();
                setTimeout(function() {
                    window.location.href = "admin.php?page=admin-transaction_sales";
                }, 2000);
            } else {
                $("#container_validation").css({"background-color":"var(--red3)"});
                $("#container_validation p").text("All fields are required!");
                $("#container_validation").fadeIn();
            }
        }

        // console.log($(`#${Object.keys(data)[priceIndex]}`).val());

        // data["referenceNo"] = referenceNo;
        // data["date"] = date;
        // data["subTotal"] = subTotal;
        // data["vat"] = vat;
        // data["discount"] = discount;
        // data["totalAmount"] = totalAmount;
        // console.log(data);

        // console.log(total);

        // $.ajax({
        //     type: "POST",
        //     url: "../includes/insert-sales_receipt.inc.php",
        //     data: {
        //         data: $("#form_receipt").serializeArray(),
        //         val1: 10,
        //         val2: 20,
        //     },
        //     dataType: "JSON",
        //     success: function(result, status, xhr) {
        //         console.table(result);
        //     }
        // });

        // const orderList = {};
        // form.forEach((value, key) => (orderList[key] = value));
        // console.log(orderList);
    });
});