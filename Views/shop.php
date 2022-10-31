<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../font/font.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bubbler+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <script src="../js/email_api.js"></script>
    <script type="text/javascript">
        (function() {
            emailjs.init("user_c5wJats9s5YzOg83Xx6qZ");
        })();
    </script>
    <script src="https://kit.fontawesome.com/beac25d89a.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;1,200;1,300;1,400;1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../logo/favicon.png">
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/shop.css">
    <title>HNT - Style</title>
</head>

<body>
    <script>
        $(function() {
            $("#header").load("../common/header.php");
            $("#footer").load("../common/footer.php");
        });
    </script>
    <div class="container-fruid">
        <div id="header"></div>
        <div class="container">
            <div class="heading text-center">
                <h2 class="title">All product</h2>
            </div>
            <div class="row sort d-flex justify-content-between text-center mt-5 mb-5">
                <a href="../Views/shop.php?sort=shirt" id="shirt" class="col-md-2 col-sm-6 col-xs-12 sort-items">Shirt</a>
                <a href="../Views/shop.php?sort=coat" id="coat" class="col-md-2 col-sm-6 col-xs-12 sort-items">Coat</a>
                <a href="../Views/shop.php?sort=pant" id="pant" class="col-md-2 col-sm-6 col-xs-12 sort-items">Pant</a>
                <a href="../Views/shop.php?sort=short" id="short" class="col-md-2 col-sm-6 col-xs-12 sort-items">Short</a>
                <a href="../Views/shop.php?sort=accessories" id="accessories" class="col-md-2 col-sm-6 col-xs-12 sort-items">Accessories</a>
            </div>
            <div class="items-container">
                <div class="row items-row card-deck">
                    <?php
                    require_once "../MySQL/db_module.php";
                    $link = null;
                    TaoKetNoi($link);
                    if (isset($_GET['sort'])) {
                        $sort = $_GET['sort'];
                        switch ($sort) {
                            case 'shirt':
                                $result = ChayTruyVanTraVeDL($link, 'SELECT * from tbl_sanpham WHERE id_dm = 1 and id_sp>3');
                                break;
                            case 'coat':
                                $result = ChayTruyVanTraVeDL($link, 'SELECT * from tbl_sanpham WHERE id_dm = 2 and id_sp>3');
                                break;
                            case 'pant':
                                $result = ChayTruyVanTraVeDL($link, 'SELECT * from tbl_sanpham WHERE id_dm = 3 and id_sp>3');
                                break;
                            case 'short':
                                $result = ChayTruyVanTraVeDL($link, 'SELECT * from tbl_sanpham WHERE id_dm = 4 and id_sp>3');
                                break;
                            case 'accessories':
                                $result = ChayTruyVanTraVeDL($link, 'SELECT * from tbl_sanpham WHERE id_dm = 5 and id_sp>3');
                                break;
                        }
                    } else {
                        $result = ChayTruyVanTraVeDL($link, 'SELECT * from tbl_sanpham WHERE id_sp>3');
                    }
                    giaiPhongBoNho($link, null);
                    while ($items = mysqli_fetch_assoc($result)) {
                        echo "<div class='col-lg-3 col-md-4 col-sm-6'>";
                        echo "<div class='card-item'>";
                        echo "<img class='card-img-top' src='../img/items/" . $items['hinhanh'] . "' alt='Card image cap'>";
                        echo "<div class='card-body'>";
                        echo '<h3 class="card-title">' . $items['tensp'] . '</h3>
                                        <p class="card-text">' . number_format($items['gia']) . ' VND</p>';
                        echo "<div class='row'>";
                        echo "<form method='post' action='../Views/product.php'>
                                            <input type='submit' class='btn buy-now' value='Detail' name='Info'>
                                            <input type='hidden' value='" . $items['id_sp'] . "' name='id'>
                                            <input type='hidden' value='" . $items['tensp'] . "' name='ten'> 
                                            <input type='hidden' value='" . $items['gia'] . "' name='gia'>
                                            <input type='hidden' value='" . $items['hinhanh'] . "' name='hinhanh'>
                                            <input type='hidden' value='" . $items['mota'] . "' name='mota'>
                                            <input type='hidden' value='" . $items['anhphu1'] . "' name='anhphu1'>
                                            <input type='hidden' value='" . $items['anhphu2'] . "' name='anhphu2'>          
                                            </form>";

                        echo "<form method='post' action='../Models/xulygiohang.php'>
                                            <input type='submit' class='btn add-to-cart' value='Add to cart' name='action' >
                                            <input type='hidden' value='" . $items['id_sp'] . "' name='id'>
                                            <input type='hidden' value='" . $items['tensp'] . "' name='ten'> 
                                            <input type='hidden' value='" . $items['gia'] . "' name='gia'>
                                            <input type='hidden' value='" . $items['hinhanh'] . "' name='hinhanh'>
                                            <input type='hidden' value='" . $items['mota'] . "' name='mota'>
                                            <input type='hidden' value='" . $items['anhphu1'] . "' name='anhphu1'>
                                            <input type='hidden' value='" . $items['anhphu2'] . "' name='anhphu2'>  
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>";
                    }
                    ?>
                </div>
            </div>
        </div>
        <div id="footer"></div>
    </div>
    <script>
        document.getElementById("<?php echo $sort ?>").style.color = '#FCA311'
    </script>
</body>

</html>