$(document).ready(function() {
    $("#eye-password").click(function() {
        if(Array.from(this.classList).indexOf("fa-eye-slash") != -1) {
            this.classList.remove("fa-eye-slash");
            this.classList.toggle("fa-eye");
            $("#password").attr("type", "text");
        } else {
            this.classList.remove("fa-eye");
            this.classList.toggle("fa-eye-slash");
            $("#password").attr("type", "password");
        }
    });

    $("#eye-confirm-password").click(function() {
        if(Array.from(this.classList).indexOf("fa-eye-slash") != -1) {
            this.classList.remove("fa-eye-slash");
            this.classList.toggle("fa-eye");
            $("#confirmPassword").attr("type", "text");
        } else {
            this.classList.remove("fa-eye");
            this.classList.toggle("fa-eye-slash");
            $("#confirmPassword").attr("type", "password");
        }
    });

    $("#back").click(function() {
        window.location.href = "signin.php";
    });
});