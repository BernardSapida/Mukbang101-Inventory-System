$(document).ready(function() {
    $("ul li a").click(function() {
        $("ul li a").removeClass("active");
        $(this).addClass("active");
    });
});