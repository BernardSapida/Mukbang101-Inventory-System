$(document).ready(function() {
    $(".empty-stock").hide();
    $(".empty-transaction").hide();

    $("#search-item").keyup(function() {
        search_stock($(this).val());
    });

    function search_stock(value) {
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
});