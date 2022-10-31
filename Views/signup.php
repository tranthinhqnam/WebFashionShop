<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HNT-Sign Up</title>
  <link rel="stylesheet" href="../font/font.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bubbler+One&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/beac25d89a.js" crossorigin="anonymous"></script>
  <!-- <script src="../js/email_api.js"></script>
  <script type="text/javascript">
    (function() {
      emailjs.init("user_c5wJats9s5YzOg83Xx6qZ");
    })();
  </script> -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../css/signup.css">
  <link rel="icon" type="image/x-icon" href="../logo/favicon.png">
</head>

<body>
  <script>
    $(function() {
      $("#header").load("../common/header.php");
      $("#footer").load("../common/footer.php");
    });
  </script>
  <div id="header"></div>
  <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../Views/Index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Sign up</li>
        </ol>
    </nav>
  <div class="container-fluid signup-container">
    <!-- Sign Up -->
    <div class="signup">
      <div class="container">
        <div class='heading' style="text-align: center;">
          <h3> SIGN UP </h3>
          <h5>Please fill in this form to create an account.</h5>
          <?php
          include_once "../Models/msg.php";
          ?>
        </div>
        <form method="post">
          <label for="username"><b>Name</b></label>
          <input class="text-box" type="text" placeholder="Enter Username" name="username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : ""; ?>" data-toggle="popover" data-content="Username must be between 8 and 30 characters" required>

          <label for="email"><b>Email</b></label>
          <input class="text-box" type="email" placeholder="Enter Email" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ""; ?>" data-toggle="popover" data-content="Enter a valid email address" required>

          <label for="password"><b>Password</b></label>
          <input class="text-box" type="password" placeholder="Enter Password" name="password" data-toggle="popover" data-content="Password must be at least 8 characters long required" >

          <label for="repeatpassword"><b>Repeat Password</b></label>
          <input class="text-box" type="password" placeholder="Repeat Password" name="repeatpassword" required>

          <!-- <button type="submit" id="btnsignin">Cancel</button> -->
          <div class="d-flex justify-content-center">
            <input type="submit" id="btnsignup" class="btn" value="Sign Up" name="signup" data-toggle="modal" data-target="#myModal"></input>
          </div>
        </form>
        <?php
        include_once "../Models/xulydangky.php";
        ?>
      </div>
    </div>
  </div>
  <div id="footer"></div>
  <script>
    $(document).ready(function(){
      $('[data-toggle="popover"]').popover({
        trigger: 'focus'
      });
    });
  </script>
</body>

</html>