<?php
    require_once "../includes/database.inc.php";
    require_once "../includes/signin.inc.php";
    require_once "../includes/signin.inc.php";

    session_start();

    // error_reporting(E_ERROR | E_PARSE);

    if(empty($_SESSION["token_url"]) && strcmp($_SESSION["token_url"], $_GET["token"]) != 0) {
      header('location: signin.php');
    }

    $db = new Database();
    $errNewPassword = "";
    $errConfirmPassword = "";
    $errArray = array();

    if(isset($_POST["reset-password"])) {
        $newPassword = $_POST['new_password'];
        $confirmPassword = $_POST['confirm_password'];

        if(empty($newPassword)) array_push($errArray, "New password is required!");
        if(empty($confirmPassword)) array_push($errArray, "Confirm password is required!");
        if(strlen($newPassword) < 8) array_push($errArray, "Password is too short!");
        if(!preg_match_all("/\W/i", $newPassword)) array_push($errArray, "Your password should contain unique symbols!");
        if(!preg_match_all("/[A-Z]/", $newPassword)) array_push($errArray, "Your password should have 1 or more uppercase letters!");
        if(!preg_match_all("/[a-z]/", $newPassword)) array_push($errArray, "Your password should have 1 or more lowercase letters!");
        if(!preg_match_all("/[0-9]/", $newPassword)) array_push($errArray, "Your password should have 1 or more numerical values!");
        if(strcmp($newPassword, $confirmPassword) != 0) array_push($errArray, "Your new password and confirm password didn't match!");

        if(count($errArray) == 0) {
          $db -> connect("update", "accounts", array("uid" => $_SESSION["uid"], "password" => password_hash($newPassword, PASSWORD_DEFAULT)), "password");
          echo "<script>alert('Successfuly reset password! You can now login.')</script>";
          sleep(3);
          header("Location: signin.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Kathline Araya Talavera, Arigadas Kimmy, Sheanne Samali">
    <meta name="description" content="">
    <link rel="stylesheet" href="../css/reset_password.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    <!-- <link rel="icon" type="image/any-icon" href="images/burgerhub.ico"> -->
    <title>Inventory System</title>
  </head>
  <body>
    <section class="section_signup">
        <div class="container_signup">
            <h1>Reset <span>Password</span></h1>
            <?php
              if(!empty($errArray)) {
                echo '<div class="container_validation">
                    <p>' . $errArray[0] .'</p>
                </div>';
              }
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <label for="new_password">
                    <p>New Password</p>
                    <input type="text" id="new_password" name="new_password" placeholder="New password" autocomplete="new-password" value="<?php echo isset($_POST["new_password"]) ? $_POST["new_password"] : ""?>">
                </label>
                <label for="email">
                    <p>Confirm Password</p>
                    <input type="text" id="confirm_password" name="confirm_password" placeholder="Confirm password" autocomplete="new-password" value="<?php echo isset($_POST["confirm_password"]) ? $_POST["confirm_password"] : ""?>">
                </label>
                <button type="submit" name="reset-password" id="reset-password" aria-label="reset-password">Reset Password</button>
            </form>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="../js/signup.js"></script>
  </body>
</html>