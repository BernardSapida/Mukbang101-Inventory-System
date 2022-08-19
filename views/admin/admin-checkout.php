<div class="container_main">
    <div class="container_title">
        <h1>Checkout</h1>
        <button class="btn-back" id="btn-back" aria-label="btn-back"><i class="fa-solid fa-arrow-left"></i> Back</button>
    </div>
    <div class="container_form">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="container_details">
                <div class="container_contact-details">
                    <h1>Contact Details</h1>
                    <label for="name">
                        <p>Name <span>*</span></p>
                        <input type="text" name="name" id="name" placeholder="Name">
                    </label>
                    <label for="name">
                        <p>Delivery Address <span>*</span></p>
                        <input type="text" name="delivery_address" id="delivery_address" placeholder="Delivery Address">
                    </label>
                    <label for="name">
                        <p>Contact Number <span>*</span></p>
                        <input type="text" name="contact_number" id="contact_number" placeholder="Contact Number">
                    </label>
                </div>
                <div class="container_supplier-details">
                    <h1>Supplier Details</h1>
                    <label for="supplier_name">
                        <p>Supplier Name</p>
                        <input type="text" name="supplier_name" id="supplier_name" placeholder="Name">
                    </label>
                    <label for="product_name">
                        <p>Product Name</p>
                        <input type="text" name="product_name" id="product_name" placeholder="Delivery Address">
                    </label>
                    <label for="quantity">
                        <p>Quantity <span>*</span></p>
                        <input type="text" name="quantity" id="quantity" placeholder="Contact Number">
                    </label>
                    <label for="price">
                        <p>Price</p>
                        <input type="text" name="price" id="price" placeholder="Contact Number">
                    </label>
                </div>
            </div>
            <div class="container_payment">
                <h1>Payment Method</h1>
                <label for="cod">
                    <input type="radio" name="payment_mode" id="cod">
                    <div class="payment_mode">
                        <div class="container_logo">
                            <div class="radio"></div>
                            <i class="fa-solid fa-truck-fast"></i>
                        </div>
                        <p>Cash on Delivery</p>
                    </div>
                </label>
                <label for="gcash">
                    <input type="radio" name="payment_mode" id="gcash">
                    <div class="payment_mode">
                        <div class="container_logo">
                            <div class="radio"></div>
                            <img src="../images/gcash.png" alt="gcash logo">
                        </div>
                        <div class="container_details">
                            <h1>Gcash</h1>
                            <p>Accessible 24/7. Amount will reflect real-time.</p>
                            <label for="gcash_reference_number">
                                <p>Please enter reference # of payment: <span>*</span></p>
                                <input type="text" name="gcash_reference_number" id="gcash_reference_number" placeholder="Reference number">
                            </label>
                        </div>
                    </div>
                </label>
                <label for="paymaya">
                    <input type="radio" name="payment_mode" id="paymaya">
                    <div class="payment_mode">
                        <div class="container_logo">
                            <div class="radio"></div>
                            <img src="../images/paymaya.png" alt="paymaya logo">
                        </div>
                        <div class="container_details">
                            <h1>Paymaya</h1>
                            <p>Accessible 24/7. Amount will reflect real-time.</p>
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
                        <p class="amount">Php 15 <span>x 50</span></p>
                    </div>
                    <div class="container_computation">
                        <p class="label">VAT 12%</span></p>
                        <p class="amount">Php 0</p>
                    </div>
                    <div class="container_computation">
                        <p class="label">Shipping Fee</span></p>
                        <p class="amount">Php 120</p>
                    </div>
                    <div class="container_computation">
                        <p class="label">Discount</span></p>
                        <p class="amount">Php 50</p>
                    </div>
                    <hr>
                    <div class="container_computation">
                        <p class="label">Total</span></p>
                        <p class="amount">Php 820.00</p>
                    </div>
                </div>
                <button type="submit" aria-label="place order">Place Order</button>
            </div>
        </form>
    </div>
</div>