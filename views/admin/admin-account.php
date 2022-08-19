<div class="container_main">
    <h1>Admin Information</h1>
    <div class="container_form">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <label for="admin_profile">
                <div class="container_profile">
                    <input type="file" name="admin_profile" id="admin_profile" aria-label="admin profile">
                    <img src="../images/admin.jpg" alt="admin profile">
                    <div class="camera-icon"><i class="fa-solid fa-camera"></i></div>
                </div>
            </label>
            <div class="container_fullname">
                <label for="firstname">
                    <p>Firstname</p>
                    <input type="text" name="firstname" id="firstname" aria-label="firstname" placeholder="Firstname">
                </label>
                <label for="lastname">
                    <p>Lastname</p>
                    <input type="text" name="lastname" id="lastname" aria-label="lastname" placeholder="Lastname">
                </label>
            </div>
            <label for="email">
                <p>Email</p>
                <input type="text" name="email" id="email" aria-label="email" placeholder="Email">
            </label>
            <label for="store_address">
                <p>Store Address</p>
                <input type="text" name="store_address" id="store_address" aria-label="store_address" placeholder="Store Address">
            </label>
            <label for="supplier_store_name">
                <p>Supplier Store Name</p>
                <input type="text" name="supplier_store_name" id="supplier_store_name" aria-label="supplier_store_name" placeholder="Supplier Store Name">
            </label>
            <label for="contact_number">
                <p>Contact No.</p>
                <input type="text" name="contact_number" id="contact_number" aria-label="contact_number" placeholder="Contact Number">
            </label>
            <button type="button" id="btn-edit-information" aria-label="btn edit"><i class="fa-solid fa-pen-to-square"></i> Edit Information</button>
            <button type="button" id="btn-save-information" aria-label="btn save"><i class="fa-solid fa-floppy-disk"></i> Save Changes</button>
        </form>
    </div>
</div>
<div class="container_main">
    <h1>Admin Password</h1>
    <div class="container_form">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <label for="current_password">
                <p>Current Password</p>
                <input type="text" name="current_password" id="current_password" aria-label="current password" placeholder="Current password">
            </label>
            <label for="new_password">
                <p>New Password</p>
                <input type="text" name="new_password" id="new_password" aria-label="new_password" placeholder="New password">
            </label>
            <label for="confirm_password">
                <p>Confirm Password</p>
                <input type="text" name="confirm_password" id="confirm_password" aria-label="confirm_password" placeholder="Confirm password">
            </label>
            <button type="button" id="btn-edit-password" aria-label="btn edit"><i class="fa-solid fa-pen-to-square"></i> Edit Password</button>
            <button type="button" id="btn-save-password" aria-label="btn save"><i class="fa-solid fa-floppy-disk"></i> Save Changes</button>
        </form>
    </div>
</div>