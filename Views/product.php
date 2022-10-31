<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
  </script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;1,200;1,300;1,400;1,500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/common.css">
  <link rel="stylesheet" href="../css/style-products.css">
  <link rel="stylesheet" href="../font/font.css">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="icon" type="image/x-icon" href="../logo/favicon.png">

  <script src="../js/script-product.js"></script>
  <title>Details of product</title>
</head>

<body>
  <style>
    <?php
    //Manual nav cho hình ảnh
    if (isset($_POST['Info'])) {
      echo '
        #s1{
          background: url("../img/items/' . $_POST['hinhanh'] . '") center / cover;
        }
        #s2{
          background: url("../img/items/' . $_POST['anhphu1'] . '") center / cover;
        }
        #s3{
          background: url("../img/items/' . $_POST['anhphu2'] . '") center / cover;
        }
        ';
    } else {
      foreach ($sp as $k => $v) {
        echo '
          #s1{
            background: url("../img/items/' . $v['hinhanh'] . '") center / cover;
          }
          #s2{
            background: url("../img/items/' . $v['anhphu1'] . '") center / cover;
          }
          #s3{
            background: url("../img/items/' . $v['anhphu2'] . '") center / cover;
          }
          ';
      }
    }
    ?>
  </style>



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
      <li class="breadcrumb-item active" aria-current="page">Product's details</li>
    </ol>
  </nav>
  <div class="container-fluid">
    <div class="row">
      <div class="item-img col-lg-6 col-md-12 col-sm-12">
        <div class="slider">
          <div class="slides">
            <input type="radio" name="slide" id="slide1">
            <input type="radio" name="slide" id="slide2">
            <input type="radio" name="slide" id="slide3">
            <?php
            $sp = isset($_SESSION['bonho']) ? $_SESSION['bonho'] : array();
            if (isset($_POST['Info'])) {
              include_once "../Models/xulysp.php";
            }
            if (isset($_POST['Info'])) {
              echo "<div class='slide first'>";
              echo "<img src='../img/items/" . $_POST['hinhanh'] . "' alt='Slide 1'>";
              echo "</div>";
            } else {
              foreach ($sp as $k => $v) {
                echo "<div class='slide first'>";
                echo "<img src='../img/items/" . $v['hinhanh'] . "' alt='Slide 1'>";
                echo "</div>";
              }
            }
            ?>
            <div class="slide">
              <?php
              if (isset($_POST['Info'])) {
                echo "<div class='slide'>";
                echo "<img src='../img/items/" . $_POST['anhphu1'] . "' alt='Slide 2'>";
                echo "</div>";
              } else {
                foreach ($sp as $k => $v) {
                  echo "<div class='slide'>";
                  echo "<img src='../img/items/" . $v['anhphu1'] . "' alt='Slide 2'>";
                  echo "</div>";
                }
              }
              ?>
              <!-- <img src="../img/items/item2.jpg" alt="Slide 2"> -->
            </div>
            <div class="slide">
              <?php
              if (isset($_POST['Info'])) {
                echo "<div class='slide'>";
                echo "<img src='../img/items/" . $_POST['anhphu2'] . "' alt='Slide 3'>";
                echo "</div>";
              } else {
                foreach ($sp as $k => $v) {
                  echo "<div class='slide'>";
                  echo "<img src='../img/items/" . $v['anhphu2'] . "' alt='Slide 3'>";
                  echo "</div>";
                }
              }
              ?>
              <!-- <img src="../img/items/item3.jpg" alt="Slide 3"> -->
            </div>

          </div>
          <div class="navigation-manual">
            <label for="slide1" class="manual-btn" id="s1"></label>
            <label for="slide2" class="manual-btn" id="s2"></label>
            <label for="slide3" class="manual-btn" id="s3"></label>
          </div>
        </div>
      </div>
      <div class="item-detail col-lg-5 col-md-12 col-12">
        <?php
        if (isset($_POST['Info'])) {
          echo "<h3 style=' color: #72DDF7; font-weight: bold' class='py-4'>" . $_POST['ten'] . "</h3>";
          echo "<h2>" . number_format($_POST['gia']) . " VND </h2>";
        } else {
          foreach ($sp as $k => $v) {
            echo "<h3 style=' color: #72DDF7; font-weight: bold' class='py-4'>" . $v['ten'] . "</h3>";
            echo "<h2>" . number_format($v['gia']) . " VND </h2>";
          }
        }

        ?>
        <br />
        <button data-toggle="modal" data-target="#myModal" value="Buy now" class="buy-now">Buy now</button>
        <div id="myModal" class="modal fade" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" style="color: #14213d;">Notification</h4>
                <button type="button" class="close" id="btn_close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              <div class="modal-body">
                <h6>Do you want to make a purchase?</h6>
              </div>
              <div class="modal-footer">
                <form method="post">
                  <input type="submit" class="btn btn-primary" name="btn_ok" id="btn_ok" value="Confirm"></input>
                </form>
              </div>
            </div>
          </div>
        </div>
        <?php
        if (isset($_POST['btn_ok'])) {
          if (isset($_SESSION['username'])) {
            require_once '../Models/buynow.php';
          } else {
            require_once '../Models/login_required.php';
          }
        }
        ?>
        <?php
        if (isset($_POST['Info'])) {
          echo "<form method='post' action='../Models/xulygiohang.php'>
          <input type='submit' class='add-to-cart' value='Add to cart' name='action' >
          <input type='hidden' value='" . $_POST['id'] . "' name='id'>
          <input type='hidden' value='" . $_POST['ten'] . "' name='ten'> 
          <input type='hidden' value='" . $_POST['gia'] . "' name='gia'>
          <input type='hidden' value='" . $_POST['hinhanh'] . "' name='hinhanh'>
          <input type='hidden' value='" . $_POST['mota'] . "' name='mota'>
          </form>";
          echo "<h4 class='mt-5 mb-5'>Product Details</h4>";
          echo "<span>" . $_POST['mota'] . "</span>";
        } else {
          foreach ($sp as $k => $v) {
            echo "<form method='post' action='../Models/xulygiohang.php'>
            <input type='submit' class='add-to-cart' value='Add to cart' name='action' >
            <input type='hidden' value='" . $v['id'] . "' name='id'>
            <input type='hidden' value='" . $v['ten'] . "' name='ten'> 
            <input type='hidden' value='" . $v['gia'] . "' name='gia'>
            <input type='hidden' value='" . $v['hinhanh'] . "' name='hinhanh'>
            <input type='hidden' value='" . $v['mota'] . "' name='mota'>
            </form>";
            echo "<h4 class='mt-5 mb-5'>Product Details</h4>";
            echo "<span>" . $v['mota'] . "</span>";
          }
        }

        ?>
      </div>
    </div>
    <h2 class="similar">MORE OF US</h2>
    <div class="items-container">
      <div class="row items-row card-deck">
        <?php
        require_once "../MySQL/db_module.php";
        $link = NULL;
        TaoKetNoi($link);
        //Xác định vi trí page
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $page = is_numeric($page) ? $page : 1;
        $from = ($page - 1) * prosPerPage;
        //Đếm số sp
        $countProduct = ChayTruyVanTraVeDL($link, " SELECT count(*) from tbl_sanpham");
        $row = mysqli_fetch_row($countProduct);
        $total = ceil($row[0] / prosPerPage);
        $res = chayTruyVanTraVeDL($link, "SELECT * FROM tbl_sanpham where id_sp>3 limit " . ($from) . "," . prosPerPage);
        while ($rows = mysqli_fetch_assoc($res)) {
          echo "<div class='col-lg-3 col-md-4 col-sm-6 col-xs-12'>";
          echo "<div class='card-item'>";
          echo " <img class='card-img-top' src=" . '../img/items/' . $rows['hinhanh'] . " alt='Card image cap'>";
          echo "<div class='card-body'>";
          echo "<h3 class='card-title'>" . $rows['tensp'] . "</h3>";
          echo      "<p class='card-text'>" . number_format($rows['gia']) . " VND</p>";
          echo "<div class='row'> 
                        <form method='post' action='../Views/product.php'>
                        <input type='submit' class='btn buy-now' value='Detail' name='Info'>
                        <input type='hidden' value='" . $rows['id_sp'] . "' name='id'>
                        <input type='hidden' value='" . $rows['tensp'] . "' name='ten'> 
                        <input type='hidden' value='" . $rows['gia'] . "' name='gia'>
                        <input type='hidden' value='" . $rows['hinhanh'] . "' name='hinhanh'>
                        <input type='hidden' value='" . $rows['mota'] . "' name='mota'>          
                        </form>";
          //Nút Add
          echo
          "<form method='post' action='../Models/xulygiohang.php'>
                        <input type='submit' class='btn add-to-cart' value='Add to cart' name='action' >
                        <input type='hidden' value='" . $rows['id_sp'] . "' name='id'>
                        <input type='hidden' value='" . $rows['tensp'] . "' name='ten'> 
                        <input type='hidden' value='" . $rows['gia'] . "' name='gia'>
                        <input type='hidden' value='" . $rows['hinhanh'] . "' name='hinhanh'>
                        <input type='hidden' value='" . $rows['mota'] . "' name='mota'>
                        </form>";
          echo "</div>";
          echo   "</div>";
          echo  "</div>";
          echo "</div>";
        }
        giaiPhongBoNho($link, $res);
        ?>
      </div>
    </div>
  </div>
  <div class="wrapbox-content-page">
    <div class="row pagination text-center">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <a class="prev" href="#" style="margin-right:30px;">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
          </svg>
        </a>
        <?php
        for ($i = 1; $i < $total; $i++) {
          if ($i != $page) {
            echo "<a class='page-node' href='./product.php?page=" . $i . "'>$i</a>";
          } else
            echo "<span>$i</span>";
        }
        ?>
        <a class="next" href="#" style="margin-left:30px;">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
          </svg>
        </a>
      </div>
    </div>
  </div>
  <div id="footer"></div>
  <script src="../js/script-cart.js"></script>
  <script src="../js/script.js"></script>
</body>

</html>