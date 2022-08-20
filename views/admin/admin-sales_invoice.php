<div class="container_main">
    <h1>Sales Invoice</h1>
    <div class="container_form">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="container_details">
                <div class="container_contact-details">
                    <h1>Receipt</h1>
                    <p>Reference No.: 938127123</p>
                    <p>Date: August 17, 2022</p>
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
                    <tbody>
                        <tr>
                            <td><input type="text" name="product_name1" id="product_name1" placeholder="Product Name"></td>
                            <td><input type="text" name="quantity1" id="quantity1" placeholder="Quantity"></td>
                            <td><input type="text" name="price1" id="price1" placeholder="Price"></td>
                            <td>
                                <button type="button" class="btn-delete" aria-label="delete"><i class="fa-solid fa-trash-can"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <button type="button" id="btn-add" aria-label="add product"><i class="fa-solid fa-circle-plus"></i> Add Product</button>
            <div class="container_payment">
                <div class="container_amount">
                    <p>Sub. Total:</p>
                    <p>Php 1,500.00</p>
                </div>
                <div class="container_amount">
                    <p>VAT 12%:</p>
                    <p>Php 1,500.00</p>
                </div>
                <div class="container_amount">
                    <p>Discount:</p>
                    <p>Php 1,500.00</p>
                </div>
                <div class="container_amount">
                    <p>Total Amount:</p>
                    <p>Php 1,500.00</p>
                </div>
                <div class="container_button">
                    <button type="button" id="btn-submit" aria-label="submit"><i class="fa-solid fa-paper-plane"></i> Submit</button>
                    <button type="button" id="btn-print" aria-label="print"><i class="fa-solid fa-print"></i> Print</button>
                </div>
            </div>
        </form>
    </div>
</div>