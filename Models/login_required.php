<script type="text/javascript">
    $(window).on('load', function() {
        $('#myEmptyModal').modal('show');
    });
</script>
<div id="myEmptyModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="color: #14213d;">Notification</h4>
                <button type="button" class="close" id="btn_close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <h6>To be able to use this feature you need to login and update your shipping information</h6>
            </div>
            <div class="modal-footer">
                <a href="../Views/signin.php" class="btn btn-primary" name="btn_ok" id="btn_ok">Ok</a>
            </div>
        </div>
    </div>
</div>