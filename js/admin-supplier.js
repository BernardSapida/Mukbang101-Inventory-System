$(document).ready(function() {
    $("#btn-view").click(function(){
        $(".section_view-products").fadeIn();
    })

    $("#btn-close").click(function(){
        $(".section_view-products").fadeOut();
    })
});