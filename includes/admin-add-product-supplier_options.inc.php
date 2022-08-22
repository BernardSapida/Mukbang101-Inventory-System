<?php
    require_once "database.inc.php";

    session_start();

    $db = new Database();
    $result = $db -> connect("select", "accounts", "supplier");

    echo "<option value=''>-- select supplier --</option>";

    forEach($result as $database => $row){
        echo "<option value='" . $row["supplier store name"] . "'>" . $row["supplier store name"] . "</option>";
    }
?>

<script>
    $("#supplier_add").on("change", function() {
        $("#product_add").load("../includes/admin-add-product-name_options.inc.php", {
            selectedSupplier: $("#supplier_add").val()
        });
    });
</script>