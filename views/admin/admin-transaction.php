<div class="container_main">
    <div class="container_table-products">
        <div class="container_tables">
            <div class="product_table">
                <div class="container_table-title">
                    <div class="container_title">
                        <h1>Transaction</h1>
                        <select name="order_status" id="order_status">
                            <option value="All">All records</option>
                            <option value="Processing">Processing</option>
                            <option value="To ship">To ship</option>
                            <option value="To receive">To receive</option>
                            <option value="Completed">Completed</option>
                            <option value="Cancelled">Cancelled</option>
                        </select>
                    </div>
                    <input type="text" name="search-item" id="search-item" placeholder="Search an item...">
                </div>
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Transaction No.</th>
                                <th>Name</th>
                                <th>Delivery Address</th>
                                <th>Contact No.</th>
                                <th>Email Address</th>
                                <th>Supplier Name</th>
                                <th>Product Code</th>
                                <th>Product Name</th>
                                <th>Box Quantity</th>
                                <th>Pcs per Box</th>
                                <th>Price per Box</th>
                                <th>Payment Method</th>
                                <th>Reference No.</th>
                                <th>VAT 12%</th>
                                <th>Shipping Fee</th>
                                <th>Discount</th>
                                <th>Total</th>
                                <th>Order Status</th>
                            </tr>
                        </thead>
                        <tbody id="transaction_table">
                            <tr class="empty-item"><td colspan="19">No data found</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>