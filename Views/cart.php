<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="../font/font.css"> <!-- Link cÃ¡i file font Ä‘Ã£ cho sáºµn -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bubbler+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/beac25d89a.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;1,200;1,300;1,400;1,500&display=swap" rel="stylesheet">
    <!--  -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/style-cart.css">
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
    <!-- ======== end header ======= -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../Views/Index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cart</li>
        </ol>
    </nav>
    <div class="content row">
        <h2>YOUR CART</h2>
        <?php
        $giohang = isset($_SESSION['giohang']) ? $_SESSION['giohang'] : array();
        if (count($giohang) == 1) {
            echo "<p>There is " . count($giohang) . " product in the cart</p>";
        } else
            echo "<p>There are " . count($giohang) . " products in the cart</p>";
        ?>
        <div class="taskbar row">
            <div class="col-lg-2 col-md-2 col-sm-2">Images</div>
            <div class="col-lg-2 col-md-2 col-sm-2">Product information</div>
            <div class="col-lg-2 col-md-2 col-sm-2">Unit price</div>
            <div class="col-lg-2 col-md-2 col-sm-2">Quantity</div>
            <div class="col-lg-2 col-md-2 col-sm-2">Into money</div>
            <div class="col-lg-1 col-md-1 col-sm-1">Delete</div>
        </div>
        <?php
        ob_start();
        $giohang = isset($_SESSION['giohang']) ? $_SESSION['giohang'] : array();
        if (isset($_POST['action'])) { //Nếu add hay bấm icon giỏ hàng cũng vào thẳng session giỏ hàng
            foreach ($giohang as $key => $value) {
                echo "<div class='info_product row'>";
                echo "<div class='img1 col-lg-2 col-md-2 col-sm-2'>";
                echo "<img src=" . '../img/items/' . $value['hinhanh'] . " alt='img1' style='height:inherit; width:inherit;'>";
                echo "</div>";
                echo "<div class='name_size col-lg-2 col-md-2 col-sm-2'>";
                echo "<h5>" . $value['ten'] . "</h5>";
                echo "" . $value['mota'] . "";
                echo "</div>";
                echo "<div class='unit-price col-lg-2 col-md-2 col-sm-2'>" . $value['gia'] . "</div>";
                echo "<div class='buttons_added col-lg-2 col-md-2 col-sm-2'>";

                echo "<form method='get'>";
                echo "<input type='hidden' name='id' value='" . $value['id'] . "'>";
                echo "<input class='minus is-form' type='button' value='-'>";
                echo "<input aria-label='quantity' class='input-qty' max='30' min='1' name='quantity' type='number' value='" . $value['soluong'] . "'>";
                echo "<input class='plus is-form' type='button' value='+'>";
                echo "<input type='submit' name='update' id='btnUpdate' value='Confirm'>";
                echo "</form>";

                echo "</div>";

                // Blogspot

                echo "<div class='into-money col-lg-2 col-md-2 col-sm-2'>" . $value['gia'] * $value['soluong'] . "</div>";
                echo "<div class='delete col-lg-1 col-md-1 col-sm-1'>";

                echo "<form method='get'>";
                echo "<input type='hidden' name='id' value='" . $value['id'] . "'>";
                // echo "<input type='submit' name='del' value='Delete item'>";
                echo "<button name='del' class='del'>";
                echo "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>";
                echo "<path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z' />";
                echo "<path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z' />";
                echo "</svg>";
                echo "</button>";
                echo "</form>";
                if (isset($_GET['del'])) {
                    xoahangkhoigio($_GET['id']);
                    header("Location: " . $_SERVER['HTTP_REFERER']);
                    break;
                }
                echo "</div>";
                echo "</div>";
            }
        } else {
            include_once "../Models/xulygiohang.php";
            foreach ($giohang as $key => $value) {
                echo "<div class='info_product row'>";
                echo "<div class='img1 col-lg-2 col-md-2 col-sm-2'>";
                echo "<img src=" . '../img/items/' . $value['hinhanh'] . " alt='img1' style='height:inherit; width:inherit;'>";
                echo "</div>";
                echo "<div class='name_size col-lg-2 col-md-2 col-sm-2'>";
                echo "<h5>" . $value['ten'] . "</h5>";
                echo "" . $value['mota'] . "";
                echo "</div>";
                echo "<div class='unit-price col-lg-2 col-md-2 col-sm-2'>" . $value['gia'] . "</div>";
                echo "<div class='buttons_added col-lg-2 col-md-2 col-sm-2'>";

                echo "<form method='get'>";
                echo "<input type='hidden' name='id' value='" . $value['id'] . "'>";
                echo "<input class='minus is-form' type='button' value='-'>";
                echo "<input aria-label='quantity' class='input-qty' max='30' min='1' name='quantity' type='number' value='" . $value['soluong'] . "'>";
                echo "<input class='plus is-form' type='button' value='+'>";

                echo "<input type='submit' name='update' id='btnUpdate' value='Confirm'>";
                include_once "../Models/cart_module.php";
                echo "</form>";
                if (isset($_GET['update'])) {
                    foreach ($giohang as $k => $v) {
                        if (isset($_GET['update']) && $v['id'] = $_GET['id']) {
                            capnhathangtrongio($v['id'], $_GET['quantity']);
                            header("Location: " . $_SERVER['HTTP_REFERER']);
                            break;
                        }
                    }
                }
                echo "</div>";
                // Nút del
                echo "<div class='into-money col-lg-2 col-md-2 col-sm-2'>" . $value['gia'] * $value['soluong'] . "</div>";
                echo "<div class='delete col-lg-1 col-md-1 col-sm-1'>";

                echo "<form method='get'>";
                echo "<input type='hidden' name='id' value='" . $value['id'] . "'>";
                echo "<button name='del' class='del'>";
                echo "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>";
                echo "<path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z' />";
                echo "<path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z' />";
                echo "</svg>";
                echo "</button>";
                echo "</form>";
                if (isset($_GET['del'])) {
                    xoahangkhoigio($_GET['id']);
                    header("Location: " . $_SERVER['HTTP_REFERER']);
                    break;
                }
                echo "</div>";
                echo "</div>";
            }
        }
        ob_end_flush();
        ?>
        <div class="total row">
            <div class="continue col-lg-4 col-md-4 col-sm-12">
                <form method="get" action="../Views/Index.php">
                    <input type="submit" class="btn btn-primary" id="btn1" value='Continue shopping'></input>
                </form>
            </div>

            <?php
            echo "<div class='count col-lg-3 col-md-3 col-sm-12'>Total: " . (isset($_SESSION['giohang']) ? tinhtien() : "0") . " VND</div>";
            ?>
        </div>
        <div class="payment row">
            <div class="col-lg-8 col-md-7 col-sm-7"></div>
            <button type="button" class="btn btn-danger col-lg-4 col-md-5 col-sm-5 " id="btn2" data-toggle="modal" data-target="#myModal">Make A Payment</button>
        </div>
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
    </div>

    <?php
    if (isset($_POST['btn_ok'])) {
        if (isset($_SESSION['username'])) {
            require_once '../Models/purchase_history.php';
        } else {
            require_once '../Models/login_required.php';
        }
    }   
    ?>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script>
        //<![CDATA[
        $('input.input-qty').each(function() {
            var $this = $(this),
                qty = $this.parent().find('.is-form'),
                min = Number($this.attr('min')),
                max = Number($this.attr('max'))
            if (min == 0) {
                var d = 0
            } else d = min
            $(qty).on('click', function() {
                if ($(this).hasClass('minus')) {
                    if (d > min) d += -1
                } else if ($(this).hasClass('plus')) {
                    var x = Number($this.val()) + 1
                    if (x <= max) d += 1
                }
                $this.attr('value', d).val(d)
            })
        })
        //]]>
    </script>
    <script src="../js/script-cart.js"></script>
    <script src="../js/script.js"></script>
    <div id="footer"></div>
</body>

</html>