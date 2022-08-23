<div class="container_main">
    <div class="container_table-supplier">
        <div class="table_supplier">
            <div class="container_table-title">
                <h1>Supplier</h1>
                <input type="text" name="search-supplier" id="search-supplier" placeholder="Search an item...">
            </div>
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Store Name</th>
                            <th>Owner Name</th>
                            <th>Email</th>
                            <th>Contact No.</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="supplier_informations"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<section class="section_view-products">
    <div class="container_table-view">
        <div class="table_view-products">
            <div class="container_table-title">
                <h1 id="storeName"></h1>
                <input type="text" name="search-product" id="search-product" placeholder="Search a product...">
            </div>
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>Product Code</th>
                            <th>Product Name</th>
                            <th>Remaining Boxes</th>
                            <th>Quantity per box</th>
                            <th>Price per box</th>
                        </tr>
                    </thead>
                    <tbody class="supplier_products"></tbody>
                </table>
            </div>
        </div>
        <button class="btn-close" id="btn-close">Close</button>
    </div>
</section>