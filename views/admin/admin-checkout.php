<div class="container_main">
    <div class="container_title">
        <h1>Checkout</h1>
        <button class="btn-back" id="btn-back" aria-label="btn-back"><i class="fa-solid fa-arrow-left"></i> Back</button>
    </div>
    <div class="container_form">
        <div class="container_validation" id="container_validation">
            <p></p>
        </div>
        <form id="checkout-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="container_details">
                <div class="container_contact-details">
                    <h1>Contact Details</h1>
                    <label for="name">
                        <p>Name <span>*</span></p>
                        <input type="text" name="name" id="name" placeholder="Name" value="<?php echo $_SESSION["firstname"] . " " . $_SESSION["lastname"]; ?>">
                    </label>
                    <label for="name">
                        <p>Delivery Address <span>*</span></p>
                        <input type="text" name="delivery_address" id="delivery_address" placeholder="Delivery Address" value="<?php echo $_SESSION["address"]; ?>">
                    </label>
                    <label for="name">
                        <p>Contact Number <span>*</span></p>
                        <input type="text" name="contact_number" id="contact_number" placeholder="Contact Number" value="<?php echo $_SESSION["contact no."]; ?>">
                    </label>
                </div>
                <div class="container_supplier-details">
                    <h1>Supplier Details</h1>
                    <label for="supplier_name">
                        <p>Supplier Name <span>*</span></p>
                        <select name="supplier_name" id="supplier_name">
                            <option value="">-- select supplier --</option>
                        </select>
                    </label>
                    <label for="product_code">
                        <p>Product Code</p>
                        <input type="text" name="product_code" id="product_code" placeholder="Product Code" disabled>
                    </label>
                    <label for="product_name">
                        <p>Product Name <span>*</span></p>
                        <select name="product_name" id="product_name" disabled>
                            <option value="">-- select product --</option>
                        </select>
                    </label>
                    <label for="pcs_per_box">
                        <p>Pcs per Box</p>
                        <input type="number" name="pcs_per_box" id="pcs_per_box" placeholder="Pcs per box" disabled>
                    </label>
                    <label for="box_quantity">
                        <p>Box Quantity <span>*</span></p>
                        <input type="number" name="box_quantity" id="box_quantity" placeholder="Box Quantity">
                    </label>
                    <label for="price_per_box">
                        <p>Price per box</p>
                        <input type="text" name="price_per_box" id="price_per_box" placeholder="Price per box" disabled>
                    </label>
                </div>
            </div>
            <div class="container_payment">
                <h1>Payment Method</h1>
                <label for="cod">
                    <input type="radio" name="payment_mode" id="cod" value="cash on delivery">
                    <div class="payment_mode">
                        <div class="container_logo">
                            <div class="radio"></div>
                            <i class="fa-solid fa-truck-fast"></i>
                        </div>
                        <p>Cash on Delivery</p>
                    </div>
                </label>
                <label for="gcash">
                    <input type="radio" name="payment_mode" id="gcash" value="gcash">
                    <div class="payment_mode">
                        <div class="container_logo">
                            <div class="radio"></div>
                            <img src="../images/gcash.png" alt="gcash logo">
                        </div>
                        <div class="container_details">
                            <h1>Gcash</h1>
                            <p>Accessible 24/7. Amount will reflect real-time.</p>
                            <label for="gcash_payment_name">
                                <p>Supplier Gcash Name:</p>
                                <input type="text" name="gcash_payment_name" id="gcash_payment_name" placeholder="Supplier gcash name" disabled>
                            </label>
                            <label for="gcash_payment_number">
                                <p>Supplier Gcash Number:</p>
                                <input type="text" name="gcash_payment_number" id="gcash_payment_number" placeholder="Supplier gcash number" disabled>
                            </label>
                            <label for="gcash_reference_number">
                                <p>Please enter reference # of payment: <span>*</span></p>
                                <input type="text" name="gcash_reference_number" id="gcash_reference_number" placeholder="Reference number">
                            </label>
                        </div>
                    </div>
                </label>
                <label for="paymaya">
                    <input type="radio" name="payment_mode" id="paymaya" value="paymaya">
                    <div class="payment_mode">
                        <div class="container_logo">
                            <div class="radio"></div>
                            <img src="../images/paymaya.png" alt="paymaya logo">
                        </div>
                        <div class="container_details">
                            <h1>Paymaya</h1>
                            <p>Accessible 24/7. Amount will reflect real-time.</p>
                            <label for="paymaya_payment_name">
                                <p>Supplier Paymaya Name:</p>
                                <input type="text" name="paymaya_payment_name" id="paymaya_payment_name" placeholder="Supplier paymaya name" disabled>
                            </label>
                            <label for="paymaya_payment_number">
                                <p>Supplier Paymaya Number:</p>
                                <input type="text" name="paymaya_payment_number" id="paymaya_payment_number" placeholder="Supplier paymaya number" disabled>
                            </label>
                            <label for="paymaya_reference_number">
                                <p>Please enter reference # of payment: <span>*</span></p>
                                <input type="text" name="paymaya_reference_number" id="paymaya_reference_number" placeholder="Reference number">
                            </label>
                        </div>
                    </div>
                </label>
                <div class="container_summary">
                    <h1>Summary</h1>
                    <p>The total cost consist of total amount of quantity, vat %12, discount, and shipping charge.</p>
                    <hr>
                    <div class="container_computation">
                        <p class="label">Price <span>x Quantity</span></p>
                        <p class="price">₱0.00 <span class="quantity">x 0</span></p>
                    </div>
                    <div class="container_computation">
                        <p class="label">VAT 12%</span></p>
                        <p class="vat">₱0</p>
                    </div>
                    <div class="container_computation">
                        <p class="label">Shipping Fee</span></p>
                        <p class="shippingFee">₱0.00</p>
                    </div>
                    <div class="container_computation">
                        <p class="label">Discount</span></p>
                        <p class="discount">₱0.00</p>
                    </div>
                    <hr>
                    <div class="container_computation">
                        <p class="label">Total</span></p>
                        <p class="total-amount">₱0.00</p>
                    </div>
                </div>
                <button type="submit" id="btn-submit" aria-label="place order">Place Order</button>
            </div>
        </form>
    </div>
</div>