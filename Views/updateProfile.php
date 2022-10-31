<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Profile</title>
  <link rel="stylesheet" href="../font/font.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bubbler+One&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/beac25d89a.js" crossorigin="anonymous"></script>
  <script src="../js/email_api.js"></script>
  <script type="text/javascript">
    (function() {
      emailjs.init("user_c5wJats9s5YzOg83Xx6qZ");
    })();
  </script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../css/profile.css">
  <link rel="icon" type="image/x-icon" href="../logo/favicon.png">
</head>

<body>
  <!-- Profile -->
  <script>
    $(function() {
      $("#header").load("../common/header.php");
      $("#footer").load("../common/footer.php");
    });
  </script>

  <?php
  include_once "../MySQL/db_module.php";
  include_once "../Models/users_module.php";
  include_once "../Models/xulydangnhap.php";
  $link = NULL;
  TaoKetNoi($link);

  //Lấy id user
  $id_user = getId($link, $_SESSION['username']);
  $res = ChayTruyVanTraVeDL($link, "SELECT * from tbl_info_users WHERE id_user='" . $id_user . "'");
  while ($row = mysqli_fetch_assoc($res)) {
    $name = $row['ten'];
    $phone = $row['sdt'];
    $address = $row['diachi'];
    $gender = $row['gioitinh'];
    $birthday = $row['ngaysinh'];
  }
  giaiPhongBoNho($link, $res);
  ?>

  <div id="header"></div>
  <div class="container profile-container">
    <h2 class="heading">Profile Information </h2>
    <form method="POST" class="profile">
      <label for="name"><b>Username</b></label>

      <!-- Nếu chưa có thông tin thì thêm, có rồi thì sửa -->
      <?php
      $link =NULL;
      TaoKetNoi($link);
      $id = getId($link, $_SESSION['username']);
      if(checkExistUser($link, $id)){
        ?>
      <input class="text-box" type="text" placeholder="Enter Username" name="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : $name; ?>" required>

      <label for="phone"><b>Phone number</b></label>
      <input class="text-box" type="text" placeholder="Phone number" name="phone" value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : $phone; ?>" required>

      <label for="address"><b>Address</b></label>
      <input class="text-box" type="text" placeholder="Address" name="address" value="<?php echo isset($_POST['address']) ? $_POST['address'] : $address; ?>" required>

      <div class="sex-container row">
        <div class="col-6">
          <input class="sex" name="sex" type="radio" value="Male" checked="active"/> Male
        </div>
        <div class="col-6">
          <input class="sex" name="sex" type="radio" value="Female" /> Female
        </div>
      </div>
      <label for="birthday"><b>Date of birth</b></label>
      <input class="text-box" type="date" placeholder="Date" name="date" value="<?php echo isset($_POST['date']) ? $_POST['date'] : $birthday; ?>" required>
      <?php
      }
      else {
      ?>
      <input class="text-box" type="text" placeholder="Enter Username" name="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : ""; ?>" required>

      <label for="phone"><b>Phone number</b></label>
      <input class="text-box" type="text" placeholder="Phone number" name="phone" value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : ""; ?>" required>

      <label for="address"><b>Address</b></label>
      <input class="text-box" type="text" placeholder="Address" name="address" value="<?php echo isset($_POST['address']) ? $_POST['address'] : ""; ?>" required>

      <div class="sex-container row">
        <div class="col-6">
          <input class="sex" name="sex" type="radio" value="Male" checked="active"/> Male
        </div>
        <div class="col-6">
          <input class="sex" name="sex" type="radio" value="Female" /> Female
        </div>

      </div>
      <label for="birthday"><b>Date of birth</b></label>
      <input class="text-box" type="date" placeholder="Date" name="date" value="<?php echo isset($_POST['date']) ? $_POST['date'] : ""; ?>" required>
      <?php
      }
      mysqli_close($link);
      ?>

      <div class="d-flex justify-content-center">
        <input type="submit" class="btn" value="Save" name="update" style="text-align: center;"></input>
      </div>
    </form>
    <?php
    include_once "../Models/user_info.php";
    ?>
  </div>
  <div id="footer"></div>



</body>

</html>