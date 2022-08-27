$(document).ready(function() {
    $("#information_validation").hide();
    $("#password_validation").hide();
    $("#admin_information [name]").prop("disabled", true);
    $("#admin_password [name]").prop("disabled", true);
    $("#eye-password").hide();
    $("#eye-new_password").hide();
    $("#eye-confirm_password").hide();

    $("#btn-edit-information").click(function(){
        $(this).hide();
        $("#btn-cancel-information").fadeIn(0);
        $("#btn-save-information").fadeIn(0);
        $("#admin_information [name]").prop("disabled", false);
    });

    $("#btn-cancel-information").click(function(){
        $(this).hide();
        $("#btn-save-information").hide();
        $("#btn-edit-information").fadeIn(0);
        $("#admin_information [name]").prop("disabled", true);
        $("#information_validation").hide();
    });

    $("#btn-save-information").click(function(){
        let form = $("#admin_information")[0];
        let data = new FormData(form);
        let errArray = [];

        data.append("image", $("#account-image")[0].files);
        if($("#firstname").val().length < 2) errArray.push("Firstname is too short!");
        if($("#lastname").val().length < 2) errArray.push("Lastname is required!");
        if($("#email").val().length < 2) errArray.push("Email is required!");
        if(!/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/.test($("#email").val())) errArray.push("Email is invalid!");
        if($("#store_address").val().length == 0) errArray.push("Store address is required!");
        if($("#store_address").val().length < 10) errArray.push("Store address is invalid!");
        if($("#store_name").val().length == 0) errArray.push("Store name is required!");
        if($("#store_name").val().length < 2) errArray.push("Store name is too short!");
        if($("#contact_number").val().length == 0) errArray.push("Contact no. is required!");
        if($("#contact_number").val().length != 11 || $("#contact_number").val().indexOf("09") != 0) errArray.push("Contact no. is invalid!");

        if(errArray.length == 0) {
            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: "../includes/update-account_information.inc.php",
                data: data,
                contentType: false,
                cache: false,
                processData: false,
                success: function(result, status, xhr) {
                    console.log(result);
                    if (result == "updated") {
                        $("#admin_password").find("input[type=password]").val("");
                        $("#information_validation").css({"background-color":"var(--green)"});
                        $("#information_validation p").text("Successfully changed information!");
                        $("#information_validation").fadeIn(0);
                        $("#information_validation").fadeOut(5000);
                        $("#btn-save-information").hide();
                        $("#btn-cancel-information").hide();
                        $("#btn-edit-information").fadeIn(0);
                        $("#admin_information [name]").prop("disabled", true);
                        $("#eye-password").removeClass("fa-eye");
                        $("#eye-password").addClass("fa-eye-slash");
                    } 
                    
                    if (result.length != 0 && result != "updated") {
                        $("#profile").attr("src", "../profile/"+result);
                        $("#admin_password").find("input[type=password]").val("");
                        $("#information_validation").css({"background-color":"var(--green)"});
                        $("#information_validation p").text("Successfully changed information!");
                        $("#information_validation").fadeIn(0);
                        $("#information_validation").fadeOut(5000);
                        $("#btn-save-information").hide();
                        $("#btn-edit-information").fadeIn(0);
                        $("#admin_information [name]").prop("disabled", true);
                    }
                },
                error(e) {
                    console.log(e);
                }
            });
        } else {
            $("#information_validation").css({"background-color":"var(--red3)"});
            $("#information_validation p").text(errArray[0]);
            $("#information_validation").fadeIn();
        }
    });

    $("#account-image").on("change", function() {  
        let text;
        let newImage = this.files[0];
        
        if(newImage) {
            const fileReader = new FileReader();
            fileReader.readAsDataURL(newImage);
            fileReader.addEventListener("load", function () {
                $("#account-profile").attr("src", this.result);
            }); 
        } else {
            text = 'Please select a file';
        }
        $("#account-profile").html(text);
    });

    $("#btn-edit-password").click(function(){
        $(this).hide();
        $("#btn-cancel-password").fadeIn(0);
        $("#btn-save-password").fadeIn(0);
        $("#admin_password [name]").prop("disabled", false);
        $("#eye-password").show();
        $("#eye-new_password").show();
        $("#eye-confirm_password").show();
    });

    $("#btn-cancel-password").click(function(){
        $(this).hide();
        $("#btn-save-password").hide();
        $("#btn-edit-password").fadeIn(0);
        $("#admin_password [name]").prop("disabled", true);
        $("#password_validation").hide();
        $("#admin_password")[0].reset();
        $("#eye-password").removeClass("fa-eye");
        $("#eye-password").addClass("fa-eye-slash");
        $("#eye-password").hide();
        $("#eye-new_password").hide();
        $("#eye-confirm_password").hide();
    });

    $("#btn-save-password").click(function(){
        let errArray = [];

        if($("#current_password").val().length == 0) errArray.push("Current password is required");
        if($("#new_password").val().length == 0) errArray.push("New password is required");
        if(!/\W/gi.test($("#new_password").val())) errArray.push("Password should contain unique symbols");
        if(!/[A-Z]/g.test($("#new_password").val())) errArray.push("Password should have 1 or more uppercase letters");
        if(!/[a-z]/g.test($("#new_password").val())) errArray.push("Password should have 1 or more lowercase letters");
        if(!/[0-9]/g.test($("#new_password").val())) errArray.push("Password should have 1 or more numerical values");
        if($("#confirm_password").val().length == 0) errArray.push("Confirm password is required");
        if($("#confirm_password").val() != $("#new_password").val()) errArray.push("New password and confirm password didn't matched!");

        if(errArray.length == 0) {
            $.ajax({
                type: "POST",
                url: "../includes/update-account_password.inc.php",
                data: $("#admin_password").serialize(),
                success: function(result, status, xhr) {
                    if(result == true) {
                        $("#admin_password").find("input[type=password]").val("");
                        $("#password_validation").css({"background-color":"var(--green)"});
                        $("#password_validation p").text("Successfully changed password!");
                        $("#password_validation").fadeIn(0);
                        $("#password_validation").fadeOut(5000);
                        $("#btn-save-password").hide();
                        $("#btn-cancel-password").hide();
                        $("#btn-edit-password").fadeIn(0);
                        $("#admin_password [name]").prop("disabled", true);
                        $("#admin_password")[0].reset();
                    } else {
                        $("#password_validation").css({"background-color":"var(--red3)"});
                        $("#password_validation p").text(result);
                        $("#password_validation").fadeIn();
                    }
                }
            });
        } else {
            $("#password_validation").css({"background-color":"var(--red3)"});
            $("#password_validation p").text(errArray[0]);
            $("#password_validation").fadeIn();
        }
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