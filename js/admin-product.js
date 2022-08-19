$(document).ready(function() {
    $("#add-product").click(function(){
        $(".section_add-product").fadeIn();
    })

    $("#btn-x").click(function(){
        $(".section_add-product").fadeOut();
    })
});