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
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <label for="new_password">
                    <p>New Password</p>
                    <input type="text" id="new_password" name="new_password" placeholder="New password" autocomplete="new-password">
                </label>
                <label for="email">
                    <p>Confirm Password</p>
                    <input type="text" id="confirm_password" name="confirm_password" placeholder="Confirm password" autocomplete="new-password">
                </label>
                <button type="submit" id="btn-reset-password" aria-label="btn-reset-password">Reset Password</button>
            </form>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="../js/signup.js"></script>
  </body>
</html>