$(document).ready(function() {
    $(".empty-product").hide();
    $(".empty-transaction").hide();

    $("#search-item").keyup(function() {
        search_product($(this).val());
    });

    function search_product(value) {
        let isEmpty = true;

        $(".table_stock tbody tr").each(function() {
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
            $(".empty-stock").show();
        } else {
            $(".empty-stock").hide();
        }
    }

    $("#search-transaction").keyup(function() {
        search_transaction($(this).val());
    });

    function search_transaction(value) {
        let isEmpty = true;

        $(".table_transaction tbody tr").each(function() {
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
            $(".empty-transaction").show();
        } else {
            $(".empty-transaction").hide();
        }
    }

    if($("tbody.table_product tr").length == 1) {
        $(".empty-product td").text("Empty table");
        $(".empty-product").show();
    }

    if($("tbody.table_customers tr").length == 1) {
        $(".empty-transaction td").text("Empty table");
        $(".empty-transaction").show();
    }

    $("#supplier_total_profit").load("../includes/load-supplier_total_profit.inc.php");
    $("#supplier_total_stocks").load("../includes/load-supplier_total_stocks.inc.php");
    $("#supplier_total_transactions").load("../includes/load-supplier_total_transactions.inc.php");

    $(".table_product").load("../includes/load-dashboard_supplier_product.inc.php");
    $(".table_customers").load("../includes/load-dashboard_order_status.inc.php");
});