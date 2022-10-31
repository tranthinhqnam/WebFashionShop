<script type="text/javascript">
$(window).on('load', function() {
$('#myEmptyModal').modal('show');
});
</script>
<?php
    require_once "../MySQL/db_module.php";
    require_once "users_module.php";
    $link = null;
    TaoKetNoi($link);
    $item = isset($_SESSION['bonho'])? $_SESSION['bonho'] : array();
    $id_user = getId($link, $_SESSION['username']);
    $address = getAddress($link, $id_user);
    $now = (new \DateTime())->format('Y-m-d');
    foreach ($item as $k => $v) {
        $item_id = $v['id'];
        $total = intval($v['gia']);
    }
    $result = ChayTruyVanKhongTraVeDL($link, "INSERT INTO tbl_lsmuahang 
                            VALUES (null, '$id_user','$address','$now', '$total', '1' , '$item_id','1');");
    if(!$result){
        // Lưu lịch sử thất bại
        echo '
            <div id="myEmptyModal" class="modal fade" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" style="color: #14213d;">Notification</h4>
                            <button type="button" class="close" id="btn_close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <h6>Oops, some thing wrong, please try again</h6>
                        </div>
                        <div class="modal-footer">
                                <input class="btn btn-primary" name="btn_ok" id="btn_ok" data-dismiss="modal" value="Confirm"></input>
                        </div>
                    </div>
                </div>
            </div>';
    }
    // Lưu lịch sử thành công
    else{
        echo '
        <div id="myEmptyModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title" style="color: #14213d;">Notification</h4>
        <button type="button" class="close" id="btn_close" data-dismiss="modal" aria-label="Close"><span
        aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
        <h6>Succeed, thank you for choosing us</h6>
        </div>
        <div class="modal-footer">
        <input class="btn btn-primary" name="btn_ok" id="btn_ok" data-dismiss="modal" value="Confirm"></input>
        </div>
        </div>
        </div>
        </div>';
        unset($_SESSION["bonho"]);
    }

mysqli_close($link);
?>