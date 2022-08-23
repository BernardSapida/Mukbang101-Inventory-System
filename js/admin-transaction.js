$(document).ready(function() {
    const params = new URLSearchParams(window.location.search);

    $(".empty-item").hide();
    
    $("#search-item").keyup(function() {
        search_item($(this).val());
    });

    $("#order_status").change(function() {
        if($("#order_status").val() == "All") search_item("");
        if($("#order_status").val() == "Processing") search_item("Processing");
        if($("#order_status").val() == "To ship") search_item("To ship");
        if($("#order_status").val() == "To receive") search_item("To receive");
        if($("#order_status").val() == "Completed") search_item("Completed");
        if($("#order_status").val() == "Cancelled") search_item("Cancelled");
    });

    if($("table tbody tr").length == 1) {
        $(".empty-item td").text("Empty table");
        $(".empty-item").show();
    }

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
            $(".empty-item td").text("No data found");
            $(".empty-item").show();
        } else {
            $(".empty-item").hide();
        }

        if(value.length == 0) {
            if($("table tbody tr").length == 1) {
                $(".empty-item td").text("Empty table");
                $(".empty-item").show();
            }
        }

        return isEmpty;
    }

    $("#transaction_table").load("../includes/load-admin_transaction.inc.php", {}, 
    function() {
        if(params.get("sortby") != null) {
            if(params.get("sortby") == "processing") { 
                $("#order_status option[value = 'Processing']").attr("selected", "selected");
                search_item("Processing");
            }
    
            if(params.get("sortby") == "toship") { 
                $("#order_status option[value = 'To ship']").attr("selected", "selected");
                search_item("To ship");
            }
    
            if(params.get("sortby") == "toreceive") { 
                $("#order_status option[value = 'To receive']").attr("selected", "selected");
                search_item("To receive");
            }
    
            if(params.get("sortby") == "completed") { 
                $("#order_status option[value = 'Completed']").attr("selected", "selected");
                search_item("Completed");
            }
    
            if(params.get("sortby") == "cancelled") { 
                $("#order_status option[value = 'Cancelled']").attr("selected", "selected");
                search_item("Cancelled");
            }
        }
    });
});