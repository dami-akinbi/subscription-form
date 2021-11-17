<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" type="text/css" href="./css/all.min.css" />
  <script src="./js/all.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css" />
  <title>Custom Blog</title>
</head>

<body>
  <input type="checkbox" name="" id="toggle" />
  <label for="toggle" class="show-btn">Show Modal</label>
  <div class="wrapper">
    <label for="toggle" class="cancel-btn"><i class="fas fa-times"></i></label>
    <div class="icon"><i class="far fa-envelope"></i></div>
    <div class="content">
      <header>Kindly subscribe</header>
      <br />
      <p>
        Subscribe here and get updates mailed to you
      </p>
    </div>
    <form action="index.php" method="POST">
      <?php
      $userEmail = ""; // at the initial
      if (isset($_POST['subscribe'])) { // subscribe button clicked
        // code
        $userEmail = $_POST['email']; // get email
        // validate email
        if (filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
          $subject = "Welcome Email.";
          $message = "Hi,\n\nYou are highly welcome.\n\nYou will succeed as a mighty Software Engineer in Jesus Name. Amen.\n\nWith love,\nModupeoluwa Akinbi.";
          $sender = "From: modupeakinbi@gmail.com"; // remember the XAMPP configuration
          if (mail($userEmail, $subject, $message, $sender)) { // php function to send mail
      ?>
            <!-- show a success message if mail is sent successfully -->
            <div class="alert success">Thank you for subscribing.</div>
          <?php
            $userEmail = ""; // leave blank again once mail is sent
          } else {
          ?>
            <!-- show an error message if mail failed to send successfully -->
            <div class="alert error">Email sending failed.</div>
          <?php
          }
        } else {
          ?>
          <!-- show error message if user email is invalid -->
          <div class="alert error"><?php echo $userEmail; ?> is not valid.</div>
      <?php
        }
      }
      ?>
      <div class="field">
        <input type="text" name="email" id="" placeholder="Email Address" value="<?php echo $userEmail; ?>" required />
      </div>
      <div class="field btn">
        <input type="submit" name="subscribe" value="Subscribe" />
      </div>
    </form>
    <div class="text">We do not share your information.</div>
  </div>
</body>

</html>