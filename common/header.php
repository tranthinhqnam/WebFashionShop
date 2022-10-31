<link rel="stylesheet" href="../css/common.css">
<div class="row header">
  <div class="nav-expand">
        <a type="button" class="nav-btn-expand-overlay">
          <i class="fas fa-bars"></i>
        </a>
        <div class="nav-expand-overlay md">
          <ul class="navbar-nav navbar-expand-overlay">
            <li class="nav-overlay-item active">
              <a class="nav-link" href="../Views/Index.php?Home">Home<span class="sr-only"></span></a>
            </li>
                <li class="nav-overlay-item">
                  <a class="nav-link" href="../Views/shop.php">Shop</a>
                </li>
                <li class="nav-overlay-item">
                  <a class="nav-link" href="../Views/blog.php">Blog</a>
                </li>
              </ul>
            <button class="close-expand-btn btn">
              <i class="fas fa-times close-expand"></i>
            </button>
          </div>
          <div class="nav-expand-overlay sm">
            <ul class="navbar-nav navbar-expand-overlay">
                <li class="nav-overlay-item active">
                    <a class="nav-link" href="../Views/Search.php">Search</a>
                  </li>
                  <li class="nav-overlay-item active">
                    <a class="nav-link" href="../Views/Index.php?Home">Home</a>
                  </li>
                  <li class="nav-overlay-item">
                    <a class="nav-link" href="../Views/shop.php">Shop</a>
                  </li>
                <li class="nav-overlay-item">
                  <a class="nav-link" href="../Views/blog.php">Blog</a>
                </li>
                <li class="nav-overlay-item">
                  <a class="nav-link" href="<?php
                include_once "../Models/xulydangnhap.php";
                if(isset($_SESSION['username'])){
                  echo  "../Views/account.php";
                }
                else{
                  echo  "../Views/signin.php";
                }
                ?>">User</a>
                </li>
                <li class="nav-overlay-item">
                    <a class="nav-link" href="../Models/xulygiohang.php">Cart</a>
                </li>
            </ul>
            <button class="close-expand-btn btn">
                <i class="fas fa-times close-expand"></i>
              </button>
        </div>
      </div>
      <div class="col-lg-1 col-md-1 logo-container"></div>
      <nav class="navbar navbar-expand-lg">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item active">
                <a class="nav-link" href="../Views/Index.php?Home">Home<span class="sr-only"></span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../Views/shop.php">Shop</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../Views/blog.php">Blog</a>
              </li>
            </ul>
          </div>
        </nav>
        <nav class="navbar nav-icon navbar-expand-lg navbar-expand-md">
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="../Views/Search.php">
                <i class="fas fa-search"></i>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../Models/xulygiohang.php">
                  <i class="fas fa-shopping-basket"></i>
                </a>
              </li>
              <li class="nav-item">
                <?php
                include_once "../Models/xulydangnhap.php";
                if(isset($_SESSION['username'])){
                  echo  "<a class='nav-link' href='../Views/account.php'>";
                }
                else{
                  echo  "<a class='nav-link' href='../Views/signin.php'>";
                }
                // echo "<a class='nav-link' href='../Views/signin.php'>";
                ?>
                    <i class="fas fa-user"></i>
                </a>
              </li>
            </ul>
        </div>
      </nav>
      <script src="../js/script.js"></script>
</div>