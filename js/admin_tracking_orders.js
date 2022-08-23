$(document).ready(function() {
    $.ajax({
        type: "POST",
        url: "../includes/load-admin_tracking_orders.inc.php",
        data: "tracking order",
        dataType: "json",
        success: function(result, status, xhr) {
            $("#processing").text(result["Processing"]);
            $("#toShip").text(result["To ship"]);
            $("#toReceive").text(result["To receive"]);
            $("#completed").text(result["Completed"]);
            $("#cancelled").text(result["Cancelled"]);

            if($("#processing").text() == "0") $("#processing").hide();
            if($("#toShip").text() == "0") $("#toShip").hide();
            if($("#toReceive").text() == "0") $("#toReceive").hide();
            if($("#completed").text() == "0") $("#completed").hide();
            if($("#cancelled").text() == "0") $("#cancelled").hide();
        }
    });

    $("#c-processing").click(function() { window.location.href = "admin.php?page=admin-transaction&&sortby=processing"; });
    $("#c-toShip").click(function() { window.location.href = "admin.php?page=admin-transaction&&sortby=toship"; });
    $("#c-toReceive").click(function() { window.location.href = "admin.php?page=admin-transaction&&sortby=toreceive"; });
    $("#c-completed").click(function() { window.location.href = "admin.php?page=admin-transaction&&sortby=completed"; });
    $("#c-cancelled").click(function() { window.location.href = "admin.php?page=admin-transaction&&sortby=cancelled"; });
});