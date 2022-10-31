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
    $giohang = isset($_SESSION['giohang']) ? $_SESSION['giohang'] : array();
    $id_user = getId($link, $_SESSION['username']);
    $address = getAddress($link, $id_user);
    $now = (new \DateTime())->format('Y-m-d');
    if (count($giohang) < 1){
            echo 
            '<div id="myEmptyModal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" style="color: #14213d;">Notification</h4>
                        <button type="button" class="close" id="btn_close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <h6>Oop, your cart is empty</h6>
                    </div>
                    <div class="modal-footer">
                            <input class="btn btn-primary" name="btn_ok" id="btn_ok" data-dismiss="modal" value="Confirm"></input>
                    </div>
                </div>
            </div>
        </div>';
    }
    else{
        foreach($giohang as $item){
            $total = intval($item['gia'])*$item['soluong'];
            $item_id = $item['id'];
            $item_quantity = $item['soluong'];
            $result = ChayTruyVanKhongTraVeDL($link, "INSERT INTO tbl_lsmuahang 
                            VALUES (null, '$id_user', '$address', '$now', '$total', '1' , '$item_id', '$item_quantity');");
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
                                    <h6>Oops, some thing wrong</h6>
                                </div>
                                <div class="modal-footer">
                                        <input class="btn btn-primary" name="btn_ok" id="btn_ok" data-dismiss="modal" value="Confirm"></input>
                                </div>
                            </div>
                        </div>
                    </div>';
                break;
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
                unset($_SESSION["giohang"]);
            }
        }
    };
    mysqli_close($link);
    
?>