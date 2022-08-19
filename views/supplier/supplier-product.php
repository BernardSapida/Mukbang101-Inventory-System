<div class="container_main">
    <div class="container_table-products">
        <div class="container_tables">
            <div class="product_table">
                <div class="container_table-title">
                    <div class="container_title">
                        <h1>Product</h1>
                        <button id="add-product"><i class="fa-solid fa-circle-plus"></i> Add Products</button>
                    </div>
                    <input type="text" name="search-item" id="search-item" placeholder="Search an item...">
                </div>
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>Product Code</th>
                                <th>Product Name</th>
                                <th>Category</th>
                                <th>Box Quantity</th>
                                <th>Pcs per box</th>
                                <th>Price per box</th>
                                <th>Date of Stocks</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="table_product">
                            <tr class="empty-product"><td colspan="8">No data found</td></tr>
                            <tr>
                                <td>21312312312</td>
                                <td>Pancit Canton - Calamansi Flavor</td>
                                <td>Noodles</td>
                                <td>100</td>
                                <td>70</td>
                                <td>Php 1,500</td>
                                <td>August 17, 2022</td>
                                <td>
                                    <button id="btn-order" aria-label="btn-order"><i class="fa-solid fa-pen-to-square"></i> Update</button>
                                    <button id="btn-delete" aria-label="btn-delete"><i class="fa-solid fa-trash-can"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="section_add-product">
    <div class="container_add-product">
        <button class="btn-x" id="btn-x">X</button>
        <h1>Add Product</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <label for="product_code">
                <p>Product Code <span>*</span></p>
                <input type="text" name="product_code" id="product_code" placeholder="Product code">
            </label>
            <label for="product_name">
                <p>Product Name <span>*</span></p>
                <input type="text" name="product_name" id="product_name" placeholder="Product name">
            </label>
            <label for="category">
                <p>Category <span>*</span></p>
                <input type="text" name="category" id="category" placeholder="Category">
            </label>
            <label for="box_quantity">
                <p>Quantity <span>*</span></p>
                <input type="text" name="box_quantity" id="box_quantity" placeholder="Quantity">
            </label>
            <label for="price_per_box">
                <p>Price per box <span>*</span></p>
                <input type="text" name="price_per_box" id="price_per_box" placeholder="Price per box">
            </label>
            <label for="date">
                <p>Date of Stock <span>*</span></p>
                <input type="text" name="date" id="date" placeholder="Date">
            </label>
            <button class="btn-add_product" aria-label="add product">Add Product</button>
        </form>
    </div>
</section>