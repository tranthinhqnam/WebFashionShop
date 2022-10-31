<?php
require_once('../Models/blogpt.php');
$id = 0;
?>

<!DOCTYPE html>
<html>

<head>
    <title>Blog </title>
    <script src="javascript.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bubbler+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="font/font.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
    <link rel="stylesheet" href="../css/style-blog.css">
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
        <div class="blogpage container">
            <div class="header-blogpage">HNT-STYLE BLOG</div>
            <div class="content-blogpage">
                <div class="row">
                    <div class="col-md-5 col-sm-12 col-12 content-category-item-first">

                        <?php
                        $catergory = array_slice(getdatablog(), $id, 1);
                        foreach ($catergory as $item) {
                            echo '
                        <div class="align-items-center image-category">
                            <a href="blogdetail.php?id_blog=' . $item['id_blog'] . '">
                                <img src="../img/blog/' . $item["img_intro"] . '">
                            </a>
                        </div>
                        <div class="title-category-first">
                            <a href="blogdetail.php?id_blog=' . $item['id_blog'] . '">
                                ' . $item['title'] . '
                            </a>
                        </div>
                        ';
                            $id++;
                        }
                        ?>

                    </div>
                    <div class="col-md-7 col-sm-12 col-12">
                        <?php
                        $catergory = array_slice(getdatablog(), $id, 3);
                        $id = viewblogcategory($catergory, $id);
                        ?>
                    </div>
                </div>

                <?php
                $catergory = array_slice(getdatablog(), $id, 6);
                $id = viewblogcategory($catergory, $id);
                ?>

                <!-- <div class="row loadmore">
                    <button class="btn btn-loadmore">
                        SEE MORE
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z" />
                        </svg>
                    </button>
                </div> -->
            </div>
        </div>
        <div id="footer"></div>
    </div>
</body>

</html>