<?php
require('../Models/blogpt.php');
$id = 1;
$id_blog = '';
if (isset($_GET['id_blog'])) {
    $id_blog = $_GET['id_blog'];
    $sql = 'SELECT * FROM `tbl_blog1` WHERE id_blog =' . $id_blog;
    $blog = getonedatablog($sql);
    if ($blog != null) {
        $title = $blog['title'];
        $timeAuthor = $blog['time&author'];
        $background = $blog['background'];
        $content = $blog['content'];
    }
}
function more(){
    header('Location: blog.php');
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Blog detail</title>
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
    <div class="container-fluid blogdetailpage">
        <div id="header"></div>
        <div class="content-detail">
            <div class="image-content-detail" style='background-image: url("../img/blog/<?= $background ?>");'></div>
            <div class="container text-content-detail">
                <div class="title-detail"><?= $title ?></div>
                <div class="time-category">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                    </svg>
                    _ <?= $timeAuthor ?>
                </div>
                <div class="text-detail">
                    <?= $content ?>
                </div>
            </div>
        </div>
        <div class="container more">
            <div class="maylike">
                <span>YOU MAY ALSO LIKE</span>
            </div>
            <div class="row">
                <?php
                $catergory = array_slice(getdatablog(), $id, 4);
                $id = viewblogcategorydetailblog($catergory, $id);
                ?>
            </div>
            <div class="row">
                <?php
                $catergory = array_slice(getdatablog(), $id, 4);
                $id = viewblogcategorydetailblog($catergory, $id);
                ?>
            </div>
            <div class="row loadmore">
                <button class="btn btn-loadmore" onclick="location.href='blog.php'">
                    SEE MORE
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z" />
                    </svg>
                </button>
            </div>
        </div>
        <div id="footer"></div>
    </div>
</body>

</html>