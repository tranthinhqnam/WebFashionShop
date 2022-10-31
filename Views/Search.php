<!DOCTYPE html>
<html lang="en">

<head>
  <title>Search</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bubbler+One&display=swap" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
  <link rel="stylesheet" href="../font/font.css">
  <link rel="stylesheet" href="../css/common.css">
  <link rel="stylesheet" href="../css/style-search.css">
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
            <li class="breadcrumb-item active" aria-current="page">Search</li>
        </ol>
    </nav>
  <div class=" col-md-12 col-xs-12 SearchPage">
    <!-- Search page -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 col-xs-12">
          <div class="row heading-page">
            <div id="search">
              <p>Search</p>
              <form class="search-page">
                <input type="hidden" name="type" value="product">
                <input type="submit" alt="Go" id="go">
                <input type="text" name="keyword" class="search_box" placeholder="Search for products" value="">
              </form>
              <p class="subtext-result">
                <span>Results</span>
                <?php
                if (isset($_GET['keyword'])) {
                  echo "for <strong>" . $_GET['keyword'] . "</strong>.";
                } else
                  echo "for <strong>' '</strong>";
                ?>
              </p>
            </div>
          </div>
          <div class="wrapbox-content-page">
            <div class="results content-product-list">
              <div class="search-list-results row">
                <div class="items-container">
                  <div class="row items-row card-deck">
                    <?php                   
                    //chạy tìm kiếm
                    require_once "../MySQL/db_module.php";
                    $link = NULL;
                    TaoKetNoi($link);

                    if (isset($_GET['keyword'])) { //Chạy tìm kiếm sp
                    //    //Xác định vi trí page
                    // $page = isset($_GET['page']) ? $_GET['page'] : 1;
                    // $page = is_numeric($page) ? $page : 1;
                    // $from = ($page - 1) * 4;
                    // //Đếm số sp
                    // $countProduct = ChayTruyVanTraVeDL($link, " SELECT count(*) from tbl_sanpham");
                    // $row = mysqli_fetch_row($countProduct);
                    // $total = ceil($row[0] / 4);
                      $search_res = chayTruyVanTraVeDL($link, "SELECT * FROM tbl_sanpham WHERE id_sp>3 AND tensp like '%" . $_GET['keyword'] . "%' ");
                      while ($rows = mysqli_fetch_assoc($search_res)) {
                        echo "<div class='col-lg-3 col-md-4 col-sm-6 col-xs-12'>";
                        echo "<div class='card-item'>";
                        echo " <img class='card-img-top' src=" . '../img/items/' . $rows['hinhanh'] . " alt='Card image cap'>";
                        echo "<div class='card-body'>";
                        echo "<h3 class='card-title'>" . $rows['tensp'] . "</h3>";
                        echo      "<p class='card-text'>" . $rows['gia'] . " VND</p>";
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
                      giaiPhongBoNho($link, $search_res);
                    }                   
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="wrapbox-content-page">
              <!-- <div class="row pagination text-center">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <a class="prev" href="#" style="margin-right:30px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
                    </svg>
                  </a>
                  <?php
                  if (isset($_GET['keyword'])) {
                  for ($i = 1; $i < $total; $i++) {
                    if ($i != $page) {
                      echo "<a class='page-node' href='./Search.php?page=" . $i . "'>$i</a>";
                    } else
                      echo "<span>$i</span>";
                  }
                }
                  ?>
                  <a class="next" href="#" style="margin-left:30px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                    </svg>
                  </a>
                </div>
              </div> -->

              <h2 class="similar text-center text-uppercase">More  for  you</h2>
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
                  $res = chayTruyVanTraVeDL($link, "SELECT * FROM tbl_sanpham WHERE id_sp>3 limit " . ($from) . "," . prosPerPage);
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
                        <input type='hidden' value='" . $rows['anhphu1'] . "' name='anhphu1'>
                        <input type='hidden' value='" . $rows['anhphu2'] . "' name='anhphu2'>            
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
                        <input type='hidden' value='" . $rows['anhphu1'] . "' name='anhphu1'>
                        <input type='hidden' value='" . $rows['anhphu2'] . "' name='anhphu2'>
                        </form>";
                    echo "</div>";
                    echo   "</div>";
                    echo  "</div>";
                    echo "</div>";
                  }
                  giaiPhongBoNho($link, $res);
                  ?>
              </div>
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
                      echo "<a class='page-node' href='./Search.php?page=" . $i . "'>$i</a>";
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
            </div>
          </div>
        </div>
      </div>
      <div id="footer"></div>
    </div>
  </div>
  <script src="js/script.js"></script>
</body>

</html>