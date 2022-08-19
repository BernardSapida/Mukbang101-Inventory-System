$(document).ready(function() {
    $("#supplier_information [name]").prop("disabled", true);
    $("#supplier_password [name]").prop("disabled", true);

    $("#btn-edit-information").click(function(){
        $(this).hide();
        $("#btn-save-information").fadeIn(0);
        $("#supplier_information [name]").prop("disabled", false);
    });

    $("#btn-save-information").click(function(){
        $(this).hide();
        $("#btn-edit-information").fadeIn(0);
        $("#supplier_information [name]").prop("disabled", true);
    });

    $("#btn-edit-password").click(function(){
        $(this).hide();
        $("#btn-save-password").fadeIn(0);
        $("#supplier_password [name]").prop("disabled", false);
    });

    $("#btn-save-password").click(function(){
        $(this).hide();
        $("#btn-edit-password").fadeIn(0);
        $("#supplier_password [name]").prop("disabled", true);
    });

    $("#eye-password").click(function() {
        if(Array.from(this.classList).indexOf("fa-eye-slash") != -1) {
            this.classList.remove("fa-eye-slash");
            this.classList.toggle("fa-eye");
            $("#current_password").attr("type", "text");
        } else {
            this.classList.remove("fa-eye");
            this.classList.toggle("fa-eye-slash");
            $("#current_password").attr("type", "password");
        }
    });

    $("#eye-new_password").click(function() {
        if(Array.from(this.classList).indexOf("fa-eye-slash") != -1) {
            this.classList.remove("fa-eye-slash");
            this.classList.toggle("fa-eye");
            $("#new_password").attr("type", "text");
        } else {
            this.classList.remove("fa-eye");
            this.classList.toggle("fa-eye-slash");
            $("#new_password").attr("type", "password");
        }
    });

    $("#eye-confirm_password").click(function() {
        if(Array.from(this.classList).indexOf("fa-eye-slash") != -1) {
            this.classList.remove("fa-eye-slash");
            this.classList.toggle("fa-eye");
            $("#confirm_password").attr("type", "text");
        } else {
            this.classList.remove("fa-eye");
            this.classList.toggle("fa-eye-slash");
            $("#confirm_password").attr("type", "password");
        }
    });
});