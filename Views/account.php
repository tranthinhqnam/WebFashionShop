<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My account</title>
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
  <link rel="stylesheet" href="../css/style-account.css">
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
      <li class="breadcrumb-item active" aria-current="page">My account</li>
    </ol>
  </nav>
  <!-- account page -->
  <div class="container">
    <div class="account-page">
      <div class="header-account">MY ACCOUNT</div>
      <div class="content-account">
        <div class="row">
          <!-- account setting page -->
          <div class="account-setting-page col-lg-4 col-md-12 col-sm-12">
            <div class="header-account-setting">
              <p>Account setting</p>
            </div>
            <?php
            include_once "../Models/xulydangnhap.php";
            echo "Hello " . $_SESSION['username'];
            echo "<br/>";
            echo "<br/>";
            echo "<br/>";
            ?>
            <div class="content-account-setting">
              <p>
                <a href="../Views/updateProfile.php">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                  </svg>
                  Edit profile
                </a>
              </p>
              <!-- <p>
                <a href="">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-x-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6.146-2.854a.5.5 0 0 1 .708 0L14 6.293l1.146-1.147a.5.5 0 0 1 .708.708L14.707 7l1.147 1.146a.5.5 0 0 1-.708.708L14 7.707l-1.146 1.147a.5.5 0 0 1-.708-.708L13.293 7l-1.147-1.146a.5.5 0 0 1 0-.708z" />
                  </svg>
                  Request to delete account
                </a>
              </p> -->
              <p>
                <a href="../Models/dangxuat.php">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                  </svg>
                  Sign out
                </a>
              </p>
            </div>
          </div>
          <!-- profile page -->
          <div class="profile-page col-lg-8 col-md-12 col-sm-12">
            <div class="header-profile">
              <p>My profile</p>
            </div>
            <div class="content-profile">
              <table id="profile-table">
                <?php
                include_once "../MySQL/db_module.php";
                include_once "../Models/users_module.php";
                $link = NULL;
                TaoKetNoi($link);

                //Lấy id user
                $id_user = getId($link, $_SESSION['username']);
                $res = ChayTruyVanTraVeDL($link, "SELECT * from tbl_info_users WHERE id_user='" . $id_user . "'");
                while ($row = mysqli_fetch_assoc($res)) {
                  echo "<tr>";
                  echo "<th>Name of user :</th>";
                  echo "<td>" . $row['ten'] . "</td>";
                  echo "</tr>";
                  echo "<tr>";
                  echo "<th>Phone number :</th>";
                  echo "<td>" . $row['sdt'] . "</td>";
                  echo "</tr>";
                  echo "<tr>";
                  echo "<th>Address :</th>";
                  echo "<td>" . $row['diachi'] . "</td>";
                  echo "</tr>";
                  echo "<tr>";
                  echo "<th>Sex :</th>";
                  echo "<td>" . $row['gioitinh'] . "</td>";
                  echo "</tr>";
                  echo "<tr>";
                  echo "<th>Date of birth :</th>";
                  echo "<td>" . $row['ngaysinh'] . "</td>";
                  echo "</tr>";
                }
                giaiPhongBoNho($link, $res);
                ?>
              </table>
              <p id="useprofile">(Note: Please update your profile to use our services.)</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- order page -->
    <div class="order-page">
      <div class="header-order">
        <span>MY ORDERS</span>
      </div>
      <?php
      TaoKetNoi($link);
      $id_user = getId($link, $_SESSION['username']);
      $result = ChayTruyVanTraVeDL($link, "SELECT * FROM tbl_lsmuahang INNER JOIN tbl_sanpham ON tbl_lsmuahang.id_sp = tbl_sanpham.id_sp WHERE tbl_lsmuahang.id_user = " . $id_user . "");
      //$result = ChayTruyVanTraVeDL($link, "SELECT * FROM tbl_lsmuahang WHERE id_user = ". $id_user ."");
      if (mysqli_num_rows($result) > 0) {
        echo "<div class='content-order'>
            <table class='table' id='order-table' style='font-weight: bold; text-align: center;'>
            <th>Code orders</th>
            <th>Purchase date</th>
            <th>Product name</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Receiver's address</th>
            <th>Order Status</th>";
        while ($item = mysqli_fetch_assoc($result)) {
          echo "
            <tr>
              <td>" . $item['id_ls'] . "</td>
              <td>" . $item['date'] . "</td>
              <td>" . $item['tensp'] . "</td>
              <td>" . $item['soluong'] . "</td>
              <td>" . $item['total'] . "</td>
              <td>
                " . $item['diachi'] . "</br>
              </td>
              <td>" . ($item['status'] > 0 ? 'Success' : 'Failed') . "</td>
        
            </tr>

            ";
        };
        echo '</table>
          
          </div>';
      } else {
        echo "<h2 class='text-center pt-3'>Sorry, you haven't been used our services yet</h2>";
      }
      giaiPhongBoNho($link, $result);
      ?>


    </div>
  </div>
  <div id="footer"></div>
</body>

</html>