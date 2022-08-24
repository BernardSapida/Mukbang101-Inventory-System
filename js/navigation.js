$(document).ready(function() {
    $("ul li a").click(function() {
        $("ul li a").removeClass("active");
        $(this).addClass("active");
    });

    $("#caret").click(function() {
        $("#signout").fadeToggle();
    });

    $("#signout").click(function() {
        window.location.href = "signout.php";
    })
});