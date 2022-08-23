<?php
    echo '<tr>
            <td>
                <input type="text" name="product_name' . $_POST["itemCount"] . '" placeholder="Product Name">
            </td>
            <td>
                <input type="text" name="quantity' . $_POST["itemCount"] . '" placeholder="Quantity">
            </td>
            <td>
                <input type="text" name="price' . $_POST["itemCount"] . '" placeholder="Price">
            </td>
            <td>
                <button type="button" class="btn-delete" aria-label="delete"><i class="fa-solid fa-trash-can"></i></button>
            </td>
        </tr>';
?>

<script>
    $(".btn-delete").click(function() {
        alert();
        // itemCount--;
        // $(this).parent().parent("tr").remove();
    });
</script>