$(document).ready(function() {
    $("#btn-add").click(function() {
        $(".container_items table tbody").append('<tr><td><input type="text" name="product_name1" id="product_name1" placeholder="Product Name"></td><td><input type="text" name="quantity1" id="quantity1" placeholder="Quantity"></td><td><input type="text" name="price1" id="price1" placeholder="Price"></td><td><button type="button" class="btn-delete" aria-label="delete"><i class="fa-solid fa-trash-can"></i></button></td></tr>');
    });

    $(".btn-delete").click(function() {
        $(".btn-delete").parent().parent().parent().remove();
    });
});