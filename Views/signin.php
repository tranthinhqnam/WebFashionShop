<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HNT-Sign In</title>
  <link rel="stylesheet" href="../font/font.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bubbler+One&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
  <!-- <script src="https://kit.fontawesome.com/beac25d89a.js" crossorigin="anonymous"></script>
  <script src="../js/email_api.js"></script>
  <script type="text/javascript">
    (function() {
      emailjs.init("user_c5wJats9s5YzOg83Xx6qZ");
    })();
  </script> -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="../css/signin.css">
  <link rel="icon" type="image/x-icon" href="../logo/favicon.png">

</head>

<body>
  <div id="header"></div>
  <script>
        $(function() {
          $("#header").load("../common/header.php");
          $("#footer").load("../common/footer.php");
        });
    </script>
  <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../Views/Index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Sign in</li>
        </ol>
    </nav>
  <div class="container-fluid signin-container">
      <!-- Sign In -->
      <form method="post" class="signin text-center">
        <div class="container">
          <div class='heading' style="text-align: center;">
            <h3>SIGN IN</h3>
            <h5>To access your account</h5>
            <?php 
              if(isset($_GET['msg'])){
                if($_GET['msg'] == 'login-fail'){
                  echo "<p class='text-danger text-center'>Incorrect username or password</p>";
                }
              }
            ?>
          </div>
          <label for="name"><b>Username</b></label>
          <input class='text-box' type="text" placeholder="Enter Username" name="username" required>
          
          <label for="password"><b>Password</b></label>
          <input class='text-box' type="password" placeholder="Enter Password" name="password" id="password" required>
          <i class="bi bi-eye-slash" id="togglePassword"></i>

          <!-- <div style="margin-top: 20px;">
            <span class="forgot"><a href="#">I forgot my password?</a></span>
          </div> -->
          <br />
          <input class="btn" type="submit" id="btnsignin" value="Sign In" name="signin"></input>
    
        </form>
        <form method="get" action="../Views/signup.php">
        <input type="submit" class="btn" id="btnsignup" value="Create new account" name="signup"></input>
      </form>
    </div>
  </div>
  <div id="footer"></div>
  <?php
  include_once "../Models/xulydangnhap.php";
  ?>

  <script type="text/javascript" src="../js/signin.js"></script>      
</body>

</html>