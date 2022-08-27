<div class="container_main">
    <h1>Supplier Information</h1>
    <div class="container_form">
        <form id="supplier_information" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <label for="account-image">
                <div class="container_profile">
                    <input type="file" name="account-image" id="account-image" aria-label="admin profile">
                    <img id="account-profile" src="../profile/<?php echo empty($_SESSION['image']) ? "default.jpg" : $_SESSION['image'] ?>" alt="admin profile">
                    <div class="camera-icon"><i class="fa-solid fa-camera"></i></div>
                </div>
            </label>
            <div class="container_validation" id="information_validation">
                <p></p>
            </div>
            <div class="container_fullname">
                <label for="firstname">
                    <p>Firstname</p>
                    <input type="text" name="firstname" id="firstname" aria-label="firstname" placeholder="Firstname" value="<?php echo $_SESSION["firstname"]; ?>">
                </label>
                <label for="lastname">
                    <p>Lastname</p>
                    <input type="text" name="lastname" id="lastname" aria-label="lastname" placeholder="Lastname" value="<?php echo isset($_SESSION["lastname"]) ? $_SESSION["lastname"] : "lastname"; ?>">
                </label>
            </div>
            <label for="email">
                <p>Email</p>
                <input type="text" name="email" id="email" aria-label="email" placeholder="Email" value="<?php echo isset($_SESSION["email"]) ? $_SESSION["email"] : ""?>">
            </label>
            <label for="store_address">
                <p>Store Address</p>
                <input type="text" name="store_address" id="store_address" aria-label="store_address" placeholder="Store Address" value="<?php echo isset($_SESSION["address"]) ? $_SESSION["address"] : ""; ?>">
            </label>
            <label for="store_name">
                <p>Supplier Store Name</p>
                <input type="text" name="store_name" id="store_name" aria-label="store_name" placeholder="Supplier Store Name" value="<?php echo isset($_SESSION["store name"]) ? $_SESSION["store name"] : ""; ?>">
            </label>
            <label for="contact_number">
                <p>Contact No.</p>
                <input type="text" name="contact_number" id="contact_number" aria-label="contact_number" placeholder="Contact Number" value="<?php echo isset($_SESSION["contact no."]) ? $_SESSION["contact no."] : ""; ?>">
            </label>
            <div class="container_btn">
                <button type="button" id="btn-cancel-information" aria-label="btn cancel"><i class="fa-solid fa-x"></i> Cancel</button>
                <button type="button" id="btn-edit-information" aria-label="btn edit"><i class="fa-solid fa-pen-to-square"></i> Edit Information</button>
                <button type="button" id="btn-save-information" aria-label="btn save"><i class="fa-solid fa-floppy-disk"></i> Save Changes</button>
            </div>
        </form>
    </div>
</div>
<div class="container_main">
    <h1>Supplier Password</h1>
    <div class="container_form">
        <div class="container_validation" id="password_validation">
            <p></p>
        </div>
        <form id="supplier_password" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <label for="current_password">
                <p>Current Password</p>
                <div class="password">
                    <input type="password" name="current_password" id="current_password" aria-label="current password" placeholder="Current password" autocomplete="current-password">
                    <i class="fa-solid fa-eye-slash icon_hide-password" id="eye-password"></i>
                </div>
            </label>
            <label for="new_password">
                <p>New Password</p>
                <div class="password">
                    <input type="password" name="new_password" id="new_password" aria-label="new_password" placeholder="New password" autocomplete="current-password">
                    <i class="fa-solid fa-eye-slash icon_hide-password" id="eye-new_password"></i>
                </div>
            </label>

            <label for="confirm_password">
                <p>Confirm Password</p>
                <div class="password">
                    <input type="password" id="confirm_password" name="confirm_password" placeholder="confirm_password" autocomplete="current-password"  value="<?php echo isset($_POST["confirmPassword"]) ? $_POST["confirmPassword"] : ""?>">
                    <i class="fa-solid fa-eye-slash icon_hide-password" id="eye-confirm_password"></i>
                </div>
            </label>
            <div class="container_btn">
                <button type="button" id="btn-cancel-password" aria-label="btn cancel"><i class="fa-solid fa-x"></i> Cancel</button>
                <button type="button" id="btn-edit-password" aria-label="btn edit"><i class="fa-solid fa-pen-to-square"></i> Edit Password</button>
                <button type="button" id="btn-save-password" aria-label="btn save"><i class="fa-solid fa-floppy-disk"></i> Save Changes</button>
            </div>
        </form>
    </div>
</div>