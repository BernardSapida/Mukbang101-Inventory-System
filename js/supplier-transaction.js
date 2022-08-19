$(document).ready(function() {
    $(".empty").hide();

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
            $(".empty").show();
        } else {
            $(".empty").hide();
        }
    }
});