$(document).ready(function() {
    $(".empty-product").hide();
    $(".empty-transaction").hide();

    $("#search-item").keyup(function() {
        search_product($(this).val());
    });

    function search_product(value) {
        let isEmpty = true;

        $("tbody.table_stock tr").each(function() {
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

        $("tbody.table_transaction tr").each(function() {
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

    $("#admin_total_profit").load("../includes/load-admin_total_supplier.inc.php");
    $("#admin_total_stocks").load("../includes/load-admin_total_stocks.inc.php");
    $("#admin_total_transactions").load("../includes/load-admin_total_transactions.inc.php");

    $(".table_stock").load("../includes/load-dashboard_admin_product.inc.php");
    $(".table_transaction").load("../includes/load-admin_transactions.inc.php");
});