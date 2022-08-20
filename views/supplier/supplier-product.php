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
                                <th>category_add</th>
                                <th>Box Quantity</th>
                                <th>Pcs per box</th>
                                <th>Price per box</th>
                                <th>Date of Stocks</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="table_product">
                            <tr class="empty-product"><td colspan="8">No data found</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="section_add-product">
    <div class="container_add-product">
        <button class="btn-x-add" id="btn-x-add">X</button>
        <h1>Add Product</h1>
        <div class="container_validation_add" id="information_validation_add">
            <p></p>
        </div>
        <form id="form_addedProduct" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <label for="product_code_add">
                <p>Product Code <span>*</span></p>
                <input type="text" name="product_code_add" id="product_code_add" placeholder="Product code" disabled>
            </label>
            <label for="product_name_add">
                <p>Product Name <span>*</span></p>
                <input type="text" name="product_name_add" id="product_name_add" placeholder="Product name">
            </label>
            <label for="category_add">
                <p>Category <span>*</span></p>
                <input type="text" name="category_add" id="category_add" placeholder="Category">
            </label>
            <label for="box_quantity_add">
                <p>Box Quantity <span>*</span></p>
                <input type="text" name="box_quantity_add" id="box_quantity_add" placeholder="Quantity">
            </label>
            <label for="pcs_per_box_add">
                <p>Pcs per box <span>*</span></p>
                <input type="text" name="pcs_per_box_add" id="pcs_per_box_add" placeholder="Pcs per box">
            </label>
            <label for="price_per_box_add">
                <p>Price per box <span>*</span></p>
                <input type="text" name="price_per_box_add" id="price_per_box_add" placeholder="Price per box">
            </label>
            <button class="btn-add_product" id="btn-add_product" aria-label="add product">Add Product</button>
        </form>
    </div>
</section>
<section class="section_edit-product">
    <div class="container_edit-product">
        <button class="btn-x-edit" id="btn-x-edit">X</button>
        <h1 id="product-title">Edit Product</h1>
        <div class="container_validation_edit" id="information_validation_edit">
            <p></p>
        </div>
        <form id="form_editProduct" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <label for="product_code_edit">
                <p>Product Code <span>*</span></p>
                <input type="text" name="product_code_edit" id="product_code_edit" placeholder="Product code" disabled>
            </label>
            <label for="product_name_edit">
                <p>Product Name <span>*</span></p>
                <input type="text" name="product_name_edit" id="product_name_edit" placeholder="Product name">
            </label>
            <label for="category_edit">
                <p>Category <span>*</span></p>
                <input type="text" name="category_edit" id="category_edit" placeholder="Category">
            </label>
            <label for="box_quantity_edit">
                <p>Box Quantity <span>*</span></p>
                <input type="text" name="box_quantity_edit" id="box_quantity_edit" placeholder="Quantity">
            </label>
            <label for="pcs_per_box_edit">
                <p>Pcs per box <span>*</span></p>
                <input type="text" name="pcs_per_box_edit" id="pcs_per_box_edit" placeholder="Pcs per box">
            </label>
            <label for="price_per_box_edit">
                <p>Price per box <span>*</span></p>
                <input type="text" name="price_per_box_edit" id="price_per_box_edit" placeholder="Price per box">
            </label>
            <button class="btn-edit_product" id="btn-edit_product" aria-label="edit product">Save Changes</button>
        </form>
    </div>
</section>