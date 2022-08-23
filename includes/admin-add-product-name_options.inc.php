<?php
    require_once "database.inc.php";

    session_start();

    $db = new Database();
    $result = $db -> connect("select", "supplier_product", array("supplierName" => $_POST["selectedSupplier"]));
    
    echo "<option value=''>-- select product --</option>";

    forEach($result as $database => $row){
        echo "<option value='" . $row["product name"] . "'>" . $row["product name"] . "</option>";
    }
?>

<script>
    $("#supplier_add").on("change", function() {
        $("#product_add").load("../includes/admin-add-product-name_options.inc.php", {
            selectedSupplier: $("#supplier_add").val()
        });
    });
</script>