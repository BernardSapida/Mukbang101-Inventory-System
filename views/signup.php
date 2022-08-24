<?php
    require_once "../includes/signup.inc.php";
    require_once "../includes/view-restriction.inc.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Kathline Araya Talavera, Arigadas Kimmy, Sheanne Samali">
    <meta name="description" content="">
    <link rel="stylesheet" href="../css/signup.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    <!-- <link rel="icon" type="image/any-icon" href="images/burgerhub.ico"> -->
    <title>Inventory System</title>
  </head>
  <body>
    <section class="section_signup">
        <div class="container_signup">
            <div class="container_title">
                <h1>Sign Up to <span>Mukbang101</span></h1>
                <p>Create your supplier account</p>
            </div>
            <?php
                if(!empty($errArray)) {
                    echo '<div class="container_validation">
                        <p>' . $errArray[0] .'</p>
                    </div>';
                }
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="container_name">
                    <label for="firstname">
                        <p>Firstname</p>
                        <input type="text" id="firstname" name="firstname" placeholder="Firstname" autocomplete="given-name" value="<?php echo isset($_POST["firstname"]) ? $firstname : ""?>">
                    </label>
                    <label for="lastname">
                        <p>Lastname</p>
                        <input type="text" id="lastname" name="lastname" placeholder="Lastname" autocomplete="family-name" value="<?php echo isset($_POST["lastname"]) ? $lastname : ""?>">
                    </label>
                </div>
                <label for="email">
                    <p>Email Address</p>
                    <input type="text" id="email" name="email" placeholder="Email Address" autocomplete="email" value="<?php echo isset($_POST["email"]) ? $email : ""?>">
                </label>
                <label for="storeAddress">
                    <p>Store Address</p>
                    <input type="text" id="storeAddress" name="storeAddress" placeholder="Store Address" autocomplete="street-address" value="<?php echo isset($_POST["storeAddress"]) ? $storeAddress : ""?>">
                </label>
                <label for="storeName">
                    <p>Store Name</p>
                    <input type="text" id="storeName" name="storeName" placeholder="Store Name" autocomplete="name" value="<?php echo isset($_POST["storeName"]) ? $storeName : ""?>">
                </label>
                <label for="contactNumber">
                    <p>Contact No.</p>
                    <input type="text" id="contactNumber" name="contactNumber" placeholder="Contact Number" autocomplete="tel-national" value="<?php echo isset($_POST["contactNumber"]) ? $contactNumber : ""?>">
                </label>
                <div class="container_password">
                    <label for="password">
                        <p>Password</p>
                        <div class="new_password">
                            <input type="password" id="password" name="password" placeholder="Password" autocomplete="new-password" value="<?php echo isset($_POST["password"]) ? $password : ""?>">
                            <i class="fa-solid fa-eye-slash icon_hide-password" id="eye-password"></i>
                        </div>
                    </label>
                    <label for="confirmPassword">
                        <p>Confirm Password</p>
                        <div class="confirm_password">
                            <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" autocomplete="new-password" value="<?php echo isset($_POST["confirmPassword"]) ? $confirmPassword : ""?>">
                            <i class="fa-solid fa-eye-slash icon_hide-password" id="eye-confirm-password"></i>
                        </div>
                    </label>
                </div>  
                <div class="container_button">
                    <button type="button" id="back" aria-label="btn-previous"><i class="fa-solid fa-arrow-left"></i> Back</button> 
                    <button type="submit" name="signup" aria-label="btn-signup"><i class="fa-solid fa-right-to-bracket"></i> Sign Up</button>
                </div>              
            </form>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="../js/signup.js"></script>
  </body>
</html>