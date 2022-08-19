$(document).ready(function() {
    $("#btn-edit-information").click(function(){
        $(this).fadeOut(0);
        $("#btn-save-information").fadeIn(0);
    });

    $("#btn-save-information").click(function(){
        $(this).fadeOut(0);
        $("#btn-edit-information").fadeIn(0);
    });

    $("#btn-edit-password").click(function(){
        $(this).fadeOut(0);
        $("#btn-save-password").fadeIn(0);
    });

    $("#btn-save-password").click(function(){
        $(this).fadeOut(0);
        $("#btn-edit-password").fadeIn(0);
    });
});