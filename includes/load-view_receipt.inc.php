<?php
    require_once "database.inc.php";

    $db = new Database();
    $result = $db -> connect("select", "admin_transaction_sales", "reference no.", $_POST["referenceNo"]);
    $productNames = explode(" && ", $result["product name"]);
    $productQuantities = explode(" && ", $result["quantity"]);
    $productPrices = explode(" && ", $result["price"]);
    
    for($i = 0; $i < count($productNames); $i++) {
        echo '<tr>
                <td>
                    <p>' . str_replace("%20", " ", $productNames[$i]) . '</p>
                </td>
                <td>
                    <p>' . str_replace("%20", " ", $productQuantities[$i]) . '</p>
                </td>
                <td>
                    <p>' . str_replace("%20", " ", $productPrices[$i]) . '</p>
                </td>
            </tr>';
    }
?>

<script>
    $(document).ready(function() {
       $("#referenceNo").text("<?php echo $result["reference no."] ?>");
       $("#date").text("<?php echo date("F d, Y", strtotime($result["date"])) ?>");
       $("#subTotal").text(Intl.NumberFormat('en-US').format("<?php echo ($result["total amount"] + $result["discount"]) ?>"));
       $("#vat").text(Intl.NumberFormat('en-US').format("<?php echo $result["vat 12%"] ?>"));
       $("#discount").text(Intl.NumberFormat('en-US').format("<?php echo $result["discount"] ?>"));
       $("#totalAmount").text(Intl.NumberFormat('en-US').format("<?php echo $result["total amount"] ?>"));
    });
</script>