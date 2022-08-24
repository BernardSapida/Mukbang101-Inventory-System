<?php 
  require_once "../includes/view-restriction.inc.php";
  require_once "../includes/signin.inc.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Kathline Araya Talavera, Arigadas Kimmy, Sheanne Samali">
    <meta name="description" content="">
    <link rel="stylesheet" href="../css/signin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    <!-- <link rel="icon" type="image/any-icon" href="images/burgerhub.ico"> -->
    <title>Inventory System</title>
  </head>
  <body>
    <section class="section_signin">
      <div class="container_signin">
        <img src="../images/banner1.jpg" alt="mukbang101 image banner">
        <h1>INVENTORY <span>SYSTEM</span></h1>
        <?php
            if(!empty($errArray)) {
                echo '<div class="container_validation">
                    <p>' . $errArray[0] .'</p>
                </div>';
            }
        ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
          <label for="email">
            <p>Email Address</p>
            <input type="text" id="email" name="email" placeholder="Email Address" autocomplete="email" value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ""?>">
          </label>
          <label for="password">
            <p>Password</p>
            <div class="signin_password">
              <input type="password" id="password" name="password" placeholder="Password" autocomplete="current-password"  value="<?php echo isset($_POST["password"]) ? $_POST["password"] : ""?>">
              <i class="fa-solid fa-eye-slash icon_hide-password" id="eye"></i>
            </div>
          </label>
          <button type="submit" name="signin" id="btn-signin" aria-label="btn-signin">Sign In</button>
          <div class="container_account">
            <div class="container_account_create">
              <p>New supplier? <a href="signup.php">Create an account</a></p>
            </div>
            <div class="container_account_forgot">
              <p><a href="forgot_password.php">Forgot password?</a></p>
            </div>
          </div>
        </form>
      </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="../js/signin.js"></script>
  </body>
</html>