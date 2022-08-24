<div class="container_main">
    <h1 class="noprint">Sales Invoice</h1>
    <div class="container_form">
        <form id="form_receipt" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="container_validation" id="container_validation">
                <p></p>
            </div>
            <div class="container_details">
                <div class="container_contact-details">
                    <h1>Receipt</h1>
                    <p>Reference No.: <span id="referenceNo"></span></p>
                    <p>Date: <span id="date"></span></p>
                </div>
                <div class="container_banner">
                    <img src="../images/banner1.jpg" alt="banner image">
                </div>
            </div>
            <div class="container_items">
                <table>
                    <thead>
                        <tr>
                            <td>Product Name</td>
                            <td>Quantity</td>
                            <td>Price</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody class="sales_receipt"></tbody>
                </table>
            </div>
            <button type="button" class="noprint" id="btn-add" aria-label="add product"><i class="fa-solid fa-circle-plus"></i> Add Product</button>
            <div class="container_payment">
                <div class="container_amount">
                    <p>Sub. Total:</p>
                    <p>Php <span id="subTotal">0</span></p>
                </div>
                <div class="container_amount">
                    <p>VAT 12%:</p>
                    <p>Php <span id="vat">0</span></p>
                </div>
                <div class="container_amount">
                    <p>Discount:</p>
                    <input type="number" name="discount" id="discount">
                </div>
                <div class="container_amount">
                    <p>Total Amount:</p>
                    <p>Php <span id="totalAmount">0</span></p>
                </div>
                <div class="container_button">
                    <button type="button" class="noprint" id="btn-submit" aria-label="submit"><i class="fa-solid fa-paper-plane"></i> Submit</button>
                    <button type="button" class="noprint" id="btn-print" aria-label="print"><i class="fa-solid fa-print"></i> Print</button>
                </div>
            </div>
        </form>
    </div>
</div>