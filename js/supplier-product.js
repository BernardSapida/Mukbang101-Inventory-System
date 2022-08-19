$(document).ready(function() {
    $(".empty-product").hide();

    $("#add-product").click(function(){
        $(".section_add-product").fadeIn();
    })

    $("#btn-x").click(function(){
        $(".section_add-product").fadeOut();
    })


    $("#search-item").keyup(function() {
        search_item($(this).val());
    });

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
            $(".empty-product").show();
        } else {
            $(".empty-product").hide();
        }
    }

    $(".table_product").load("../includes/load-supplier_product.inc.php");
});