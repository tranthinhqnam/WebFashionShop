<?php
function getdatablog()
{
    require_once "../MySQL/db_module.php";
    $link = NULL;
    TaoKetNoi($link);
    $res = chayTruyVanTraVeDL($link, "SELECT * FROM tbl_blog1");

    while ($row = mysqli_fetch_array($res, 1)) {
        $data[] = $row;
    }
    giaiPhongBoNho($link, $res);
    return $data;
}
function getonedatablog($sql)
{
    $conn = mysqli_connect('125.234.104.133', 'webgr03', 'ByB7TseNJvGSEYJT', 'webgr03');
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, 1);
    mysqli_close($conn);
    return $row;
}
function viewblogcategory($catergory, int $id)
{
    foreach ($catergory as $item) {
        echo '
<div class="row content-category-item">
    <div class="col-md-5 col-sm-12 col-12 image-content-category">
    <a href="blogdetail.php?id_blog='.$item['id_blog'].'">
    <img src="../img/blog/' . $item["img_intro"] . '">
</a>
    </div>
    <div class="col-md-7 col-sm-12 col-12 text-content-category">
        <a href="blogdetail.php?id_blog='.$item['id_blog'].'">
            <div class="title-category">
            ' . $item['title'] . '
            </div>
            <div class="text-category">
                <div class="time-category"> ' . $item['time&author'] . ' </div>
                <br>
                ' . $item['text_intro'] . '
        </a>
    </div>
</div>
</div>
';
        $id++;
    }
    return $id;
}
function viewblogcategorydetailblog($catergory, int $id)
{
    foreach ($catergory as $item) {
        echo '
        <div class="col-md-3 col-sm-6 col-6 content-category-item">
        <div class="image-content-category">
            <a href="blogdetail.php?id_blog='.$item['id_blog'].'">
                <img src="../img/blog/' . $item["img_intro"] . '">
            </a>
        </div>
        <div class="text-content-category">
            <a href="blogdetail.php?id_blog='.$item['id_blog'].'">
                <div class="title-category">
                ' . $item['title'] . '
                </div>
            </a>
        </div>
    </div>
';
        $id++;
    }
    return $id;
}
