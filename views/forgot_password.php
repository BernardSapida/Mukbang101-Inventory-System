<?php
  require_once "../includes/database.inc.php";
  require_once "../includes/signin.inc.php";

  session_start();
  // error_reporting(E_ERROR | E_PARSE);

  $db = new Database();
  $errArray = array();

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

  require '../PHPMailer/src/Exception.php';
  require '../PHPMailer/src/PHPMailer.php';
  require '../PHPMailer/src/SMTP.php';

  if(isset($_POST["resetPassword"])) {
    $email = $_POST["email"];
    
    if(!empty($email)) {
      $result = $db -> connect("select", "accounts", "email", $email);

      if(!$result) array_push($errArray, "Email address didn't exist!");

      if(is_array($result)) {
        $mail = new PHPMailer(true);

        try {
          // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                                   //Display output
          $mail->isSMTP(); 
          $mail->Host       = 'outlook.office365.com';                                //Set the SMTP server to send through
          $mail->SMTPAuth   = true;                                                   //Enable SMTP authentication
          $mail->Username   = 'mukbang101.service@gmail.com';
          $mail->Password   = 'Mukbang102032';                                        //SMTP password
          $mail->SMTPSecure = "STARTTLS";                                             //Enable implicit TLS encryption
          $mail->Port       = 587;                                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

          // Recipients
          $mail->setFrom('mukbang101.service@gmail.com', 'Mukbang101 Service');
          $mail->addAddress($email, $result["firstname"] . " " . $result["lastname"]);         //Add a recipient & Name is optional
          $mail->addReplyTo('mukbang101.service@gmail.com', 'Reply');

          // Content
          $_SESSION["uid"] = $result["uid"];
          $_SESSION["token_email"] = $email;
          $_SESSION["token_url"] = uniqid();
          $mail->isHTML(true);                                                        //Set email format to HTML
          $mail->Subject = 'Message from Mukbang101';
          $mail->Body    = 'We received your message, thank you for reaching us out and we will try out best to respond soonest!<br/>- Mr. Bernard';
          $mail->Body    = '  <section class="section_email-template" style="padding: 15px 30px; position: relative; background-color: black;">
                                  <div class="container_email-body" style="margin: auto; background-color: rgb(255, 247, 232); border-radius: 5px; display: grid; place-items: center; padding: 0 50px;">
                                      <div class="container_email-body-content" style="padding:20px 0 30px 0;">
                                          <h1 style="text-align: center; line-height: 1; margin-bottom: 8px; font-size: 34px; color: hsl(0, 0%, 2%);">Hello, <span style="color: hsl(349, 100%, 54%);">Bernard Sapida</span></h1>
                                          <p style="text-align: center; line-height: 1; margin-bottom: 4px;font-weight: 700; color: hsl(0, 0%, 2%);">We received your reset password request.</p>
                                          <p style="text-align: center; line-height: 1; color: hsl(0, 0%, 2%);">Here\'s the link to reset your password <a href="http://localhost/inventory/views/reset_password.php?token=' . $_SESSION["token_url"] . '">click link</a></p>
                                      </div>
                                  </div>
                                  <div class="container_email-footer" style="margin: 15px 0; position: relative; z-index: 1; color: hsl(0, 0%, 100%);">
                                      <p class="email-reminder" style="text-align: center; margin: 10px; font-size: 12px; color: hsl(0, 0%, 100%, .5); font-weight: 300;">This is an automated email. Please do not reply.</p>
                                      <p class="email-copyright" style="text-align: center; margin: 10px; font-size: 12px; color: hsl(0, 0%, 100%, .5); font-weight: 300;">Copyright &copy;2022 Mukbang101. All Rights Reserved.</p>
                                  </div>
                              </section>';
          $mail->AltBody = 'We received your message, thank you for reaching us out and we will try out best to respond soonest!';
          $mail->send();
          header("Location: signin.php");
        } catch (Exception $e) {
          // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
      } else {
        array_push($errArray, "Email address didn't exist!");
      }
    } else {
        if(empty($email)) array_push($errArray, "Email address is required!");
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
    <link rel="stylesheet" href="../css/forgot_password.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    <title>Inventory System</title>
  </head>
  <body>
    <section class="section_signup">
        <div class="container_signup">
            <div class="container_title">
                <h1>Forgot <span>Password</span></h1>
                <p>Enter your email and we'll send you a link to reset your password.</p>
            </div>
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
                <button type="submit" name="resetPassword" id="submit" aria-label="btn-submit">Submit</button>
                <button type="button" id="back" aria-label="btn-previous">Back</button> 
            </form>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="../js/signup.js"></script>
  </body>
</html>