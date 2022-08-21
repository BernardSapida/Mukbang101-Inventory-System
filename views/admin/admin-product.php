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
                    <table class="">
                        <thead>
                            <tr>
                                <th>Product Code</th>
                                <th>Supplier Name</th>
                                <th>Product Name</th>
                                <th>Category</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Date of Stocks</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="empty-product"><td colspan="8">No data found</td></tr>
                            <tr>
                                <td>21312312312</td>
                                <td>Supplier 1</td>
                                <td>Product 1</td>
                                <td>Category 1</td>
                                <td>220</td>
                                <td>Php 1,500</td>
                                <td>August 17, 2022</td>
                                <td>
                                    <button type="button" id="btn-order" aria-label="btn-order"><i class="fa-solid fa-box"></i> Order</button>
                                    <button type="button" id="btn-edit" aria-label="btn-edit"><i class="fa-solid fa-pen-to-square"></i></button>
                                    <button type="button" id="btn-delete" aria-label="btn-delete"><i class="fa-solid fa-trash-can"></i></button>
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
        <button class="btn_x_add" id="btn_x_add">X</button>
        <h1>Add Product</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <label for="supplier">
                <p>Supplier <span>*</span></p>
                <select name="supplier" id="supplier">
                    <option value=""></option>
                </select>
            </label>
            <label for="supplier">
                <p>Product <span>*</span></p>
                <select name="supplier" id="supplier">
                    <option value=""></option>
                </select>
            </label>
            <label for="category">
                <p>Category</p>
                <input type="text" name="category" id="category" placeholder="Product category">
            </label>
            <label for="quantity">
                <p>Quantity <span>*</span></p>
                <input type="text" name="quantity" id="quantity" placeholder="Quantity">
            </label>
            <label for="date">
                <p>Date of Stock <span>*</span></p>
                <input type="text" name="date" id="date" placeholder="Date">
            </label>
            <button type="button" class="btn-add_product" aria-label="add product">Add Product</button>
        </form>
    </div>
</section>
<section class="section_edit-product">
    <div class="container_edit-product">
        <button class="btn_x_edit" id="btn_x_edit">X</button>
        <h1>Edit Product</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <label for="supplier">
                <p>Supplier <span>*</span></p>
                <select name="supplier" id="supplier">
                    <option value=""></option>
                </select>
            </label>
            <label for="supplier">
                <p>Product <span>*</span></p>
                <select name="supplier" id="supplier">
                    <option value=""></option>
                </select>
            </label>
            <label for="category">
                <p>Category</p>
                <input type="text" name="category" id="category" placeholder="Product category">
            </label>
            <label for="quantity">
                <p>Quantity <span>*</span></p>
                <input type="text" name="quantity" id="quantity" placeholder="Quantity">
            </label>
            <label for="date">
                <p>Date of Stock <span>*</span></p>
                <input type="text" name="date" id="date" placeholder="Date">
            </label>
            <button type="button" class="btn-edit_product" aria-label="edit product">Add Product</button>
        </form>
    </div>
</section>