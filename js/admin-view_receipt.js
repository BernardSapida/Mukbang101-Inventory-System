$(document).ready(function() {
    const params = new URLSearchParams(window.location.search);
    $(".sales_receipt").load("../includes/load-view_receipt.inc.php", {
        referenceNo: params.get("referenceNo")
    });

    $("#btn-print").click(function() {
        window.print();
    }); 
});