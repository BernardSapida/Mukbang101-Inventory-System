<div class="container_main">
    <div class="container_records">
        <h1>Dashboard</h1>
        <div class="container_card">
            <div class="card">
                <div class="container-icon">
                    <i class="fa-solid fa-peso-sign"></i>
                </div>
                <div class="value">
                    <p class="amount" id="supplier_total_profit">Php 0.00</p>
                    <p class="label">Total Profit</p>
                </div>
            </div>
            <div class="card">
                <div class="container-icon">
                    <i class="fa-solid fa-boxes-stacked"></i>
                </div>
                <div class="value">
                    <p class="amount" id="supplier_total_stocks">0</p>
                    <p class="label">Total Stocks</p>
                </div>
            </div>
            <div class="card">
                <div class="container-icon">
                    <i class="fa-solid fa-money-bill-transfer"></i>
                </div>
                <div class="value">
                    <p class="amount" id="supplier_total_transactions">0</p>
                    <p class="label">Total Transactions</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container_tables">
        <div class="stock_table">
            <div class="container_table-title">
                <h1>Stock per item</h1>
                <input type="text" name="search-item" id="search-item" placeholder="Search an item...">
            </div>
            <div class="table-responsive">
                <table class="table_stock">
                    <thead>
                        <tr>
                            <th>Product Code</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Box Quantity</th>
                        </tr>
                    </thead>
                    <tbody class="table_product">
                        <tr class="empty-product"><td colspan="8">No data found</td></tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="transaction_table">
            <div class="container_table-title">
                <h1>Customers Order</h1>
                <input type="text" name="search-transaction" id="search-transaction" placeholder="Search a transaction...">
            </div>
            <div class="table-responsive">
                <table class="table_transaction">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Transaction No.</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Total Amount</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody class="table_customers">
                        <tr class="empty-transaction"><td colspan="19">No data found</td></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>