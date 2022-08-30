$(document).ready(function() {
    $("#humberger-menu-header").click(function() {
        $(".section_navigation").show();
    });

    $("#humberger-menu-nav").click(function() {
        $(".section_navigation").hide();
    });

    $(window).resize(function() {
        if(window.innerWidth >= 768) $(".section_navigation").show();
        else $(".section_navigation").hide();
    });

    $("ul li a").click(function() {
        $("ul li a").removeClass("active");
        $(this).addClass("active");
    });

    $(".container-profile").click(function() {
        $("#signout").fadeToggle();
    });

    $("#signout").click(function() {
        window.location.href = "signout.php";
    })
});