<!DOCTYPE html>
<html lang="en">

<head>
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
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;1,200;1,300;1,400;1,500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/common.css">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="../logo/favicon.png">
  <title>HNT - Style</title>
</head>

<body>
  <script>
    $(function() {
      $("#header").load("../common/header.php");
      $("#footer").load("../common/footer.php");
    });
  </script>

  <div class="container-fluid">
    <div id="header"></div>

    <div class="promo-video">
      <video autoplay muted loop src="https://cdn.shopify.com/s/files/1/1003/3354/files/ESSENTIALS-FW21-WEB.mp4?v=1629305981" id="video-background"></video>
      <div class="promo-video-heading">
        <br>Fall collection</br>2021</h2>
      </div>
    </div>

    <div class="categorys-container">
      <div class="row categorys-flex">

        <?php
        $data = $this->model->searchForSample();
        foreach ($data as $dat) {
          echo " <div class='categorys col-md-4 col-sm-12' id='ctg1' style='background: url(" . '../img/categorys/' . $dat->gethinhanh() . ") center/cover no-repeat; background-size: 98% auto;'>";
          echo "<div class='overlay'>";
          echo       "<h2 class='ctg-heading'>Unique</h2>";
          echo " </div>";
          echo "</div>";
        }
        ?>
      </div>
    </div>


    <div class="items-container">

      <h2 id="more-of-us">More of us</h2>

      <div class="row items-row card-deck">
        <?php
        require_once "../MySQL/db_module.php";
        //Xác định vi trí page
        $link = NULL;
        TaoKetNoi($link);
        $amount = 8;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $page = is_numeric($page) ? $page : 1;
        $from = ($page - 1) * 8;
        //Đếm số sp
        $countProduct = ChayTruyVanTraVeDL($link, " SELECT count(*) from tbl_sanpham");
        $row = mysqli_fetch_row($countProduct);
        $total = ceil($row[0] / $amount);
        giaiPhongBoNho($link, $countProduct);
        $data = $this->model->getProductList($from, $amount);
        foreach ($data as $dat) {
          echo "<div class='col-lg-3 col-md-4 col-sm-6 col-xs-12'>";
          echo "<div class='card-item'>";
          echo " <img class='card-img-top' src=" . '../img/items/' . $dat->gethinhanh() . " alt='Card image cap'>";
          echo "<div class='card-body'>";
          echo "<h3 class='card-title'>" . $dat->gettensp() . "</h3>";
          echo      "<p class='card-text'>" . number_format($dat->getgia()) . " VND</p>";
          echo "<div class='row'> 
          <form method='post' action='../Views/product.php'>
          <input type='submit' class='btn buy-now' value='Detail' name='Info'>
          <input type='hidden' value='" . $dat->getid_sp() . "' name='id'>
          <input type='hidden' value='" . $dat->gettensp() . "' name='ten'> 
          <input type='hidden' value='" . $dat->getgia() . "' name='gia'>
          <input type='hidden' value='" . $dat->gethinhanh() . "' name='hinhanh'>
          <input type='hidden' value='" . $dat->getmota() . "' name='mota'>
          <input type='hidden' value='" . $dat->getanhphu1() . "' name='anhphu1'>
          <input type='hidden' value='" . $dat->getanhphu2() . "' name='anhphu2'>               
          </form>";
          //Nút Add
          echo
          "<form method='post' action='../Models/xulygiohang.php'>
          <input type='submit' class='btn add-to-cart' value='Add to cart' name='action' >
          <input type='hidden' value='" . $dat->getid_sp() . "' name='id'>
          <input type='hidden' value='" . $dat->gettensp() . "' name='ten'> 
          <input type='hidden' value='" . $dat->getgia() . "' name='gia'>
          <input type='hidden' value='" . $dat->gethinhanh() . "' name='hinhanh'>
          <input type='hidden' value='" . $dat->getmota() . "' name='mota'>
          <input type='hidden' value='" . $dat->getanhphu1() . "' name='anhphu1'>
          <input type='hidden' value='" . $dat->getanhphu2() . "' name='anhphu2'> 
          </form>";
          echo "</div>";
          echo   "</div>";
          echo  "</div>";
          echo "</div>";
        }
        ?>
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
          for ($i = 1; $i <= $total; $i++) {
            if ($i != $page) {
              echo "<a class='page-node' href='./Index.php?page=" . $i . "'>$i</a>";
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

    <div class="promo-container">

      <h2 id="more-of-us">Orthers greatness</h2>

      <div class="row promo-row">
        <div id="promo-item-1" class="promo-item  col-md-4 col-sm-12">
          <a href="shop.php" class="promo-link">
            <h2 class="promo-item-heading">Kicky</h2>
          </a>
        </div>
        <div id="promo-item-2" class="promo-item  col-md-4 col-sm-12">
          <a href="shop.php" class="promo-link">
            <h2 class="promo-item-heading">Sassy</h2>
          </a>
        </div>
        <div id="promo-item-3" class="promo-item  col-md-4 col-sm-12">
          <a href="shop.php" class="promo-link">
            <h2 class="promo-item-heading">Casual</h2>
          </a>
        </div>
      </div>
    </div>

    <div id="footer"></div>
  </div>
  <script type="text/javascript" src="../js/script.js"></script>
</body>

</html>