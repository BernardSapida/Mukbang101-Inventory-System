<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Kathline Araya Talavera, Arigadas Kimmy, Sheanne Samali">
    <meta name="description" content="">
    <link rel="stylesheet" href="../css/forgot_password.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    <!-- <link rel="icon" type="image/any-icon" href="images/burgerhub.ico"> -->
    <title>Inventory System</title>
  </head>
  <body>
    <section class="section_signup">
        <div class="container_signup">
            <div class="container_title">
                <h1>Forgot <span>Password</span></h1>
                <p>Enter your email and we'll send you a link to reset your password.</p>
            </div>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <label for="email">
                    <p>Email Address</p>
                    <input type="text" id="email" name="email" placeholder="Email Address" autocomplete="email">
                </label>
                <button type="submit" id="submit" aria-label="btn-submit">Submit</button>
                <button type="button" id="back" aria-label="btn-previous">Back</button> 
            </form>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="../js/signup.js"></script>
  </body>
</html>