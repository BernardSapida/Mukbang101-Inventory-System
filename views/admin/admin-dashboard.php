<div class="container_main">
    <div class="container_records">
        <h1>Dashboard</h1>
        <div class="container_card">
            <div class="card">
                <div class="container-icon">
                    <i class="fa-solid fa-truck-ramp-box"></i>
                </div>
                <div class="value">
                    <p class="amount" id="admin_total_profit">0</p>
                    <p class="label">Total Suppliers</p>
                </div>
            </div>
            <div class="card">
                <div class="container-icon">
                    <i class="fa-solid fa-boxes-stacked"></i>
                </div>
                <div class="value">
                    <p class="amount" id="admin_total_stocks">0</p>
                    <p class="label">Total Stocks</p>
                </div>
            </div>
            <div class="card">
                <div class="container-icon">
                    <i class="fa-solid fa-money-bill-transfer"></i>
                </div>
                <div class="value">
                    <p class="amount" id="admin_total_transactions">Php 0.00</p>
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
                <table>
                    <thead>
                        <tr>
                            <th>Product Code</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>
                    <tbody class="table_stock">
                        <tr class="empty-product"><td colspan="4">No data found</td></tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="transaction_table">
            <div class="container_table-title">
                <h1>List of transaction</h1>
                <input type="text" name="search-transaction" id="search-transaction" placeholder="Search a transaction...">
            </div>
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Transaction No.</th>
                            <th>Supplier</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Total Amount</th>
                        </tr>
                    </thead>
                    <tbody class="table_transaction">
                        <tr class="empty-transaction"><td colspan="6">No data found</td></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>