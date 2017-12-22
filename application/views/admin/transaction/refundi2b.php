<div class="content-wrapper">
<?php if ($role == false): ?>
    <section class="content-header">
        <h1>
            Bạn không được phân quyền
        </h1>
    </section>
<?php else: ?>

    <section class="content-header">
        <h1>
            Kiểm tra giao dich Ngân Lượng
        </h1>
    </section>
    <section class="content">
    <div class="row">
    <div class="col-xs-12">
    <div class="box box-body">

    <label id="resultsearch" style="color: red;"></label>

    <div class="box-body">
        <div class="form-group">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <label style="color: red" id="errorcode"></label>
                </div>
            </div>

        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <label for="exampleInputEmail1">Nhập token:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <input type="text" class="form-control" id="txttoken">
                </div>
                <div class="col-md-1 col-sm-2 col-xs-12">
                </div>
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <input type="button" id="search_tran" value="Tìm kiếm" class="btn btn-success">
                </div>

            </div>
        </div>
    </div>

    <div class="box-body  table-responsive no-padding">
        <?php $this->load->view('admin/message', $this->data); ?>
        <?php $this->load->view('admin/error', $this->data); ?>
        <div class="modal fade" id="bsModal3" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                    </div>
                    <div class="modal-body">
                        <p style="color: #0000ff">Bạn đã cập nhật giao dich thành công </p>
                    </div>
                    <div class="modal-footer">
                        <input class="blueB logMeIn" type="button" value="Đóng" data-dismiss="modal"
                               aria-hidden="true">
                    </div>
                </div>
            </div>
        </div>
        <div id="spinner" class="spinner" style="display:none;">
            <img id="img-spinner" src="<?php echo public_url('admin/images/gif-load.gif') ?>" alt="Loading"/>
        </div>
        <div class="text-center">
            <ul id="pagination-demo" class="pagination-sm"></ul>
        </div>

    </div>
    </div>
    </div>
    </div>
    </section>
<?php endif; ?>
</div>
<script>
    $("#search_tran").click(function () {
        if ($("#txttoken").val() == "") {
            $("#errorcode").html("Bạn chưa nhập token");
            return false;
        }
		   $('#search_tran').prop('disabled', true);
        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('transaction/refundi2bajax')?>",
            data: {
                token: $("#txttoken").val()
            },

            dataType: 'text',
            success: function (result) {
                $("#spinner").hide();
                $("#bsModal3").modal("show");

            } ,error: function () {
               errorThongBao();

            },timeout : timeOutApi
        });

    });
    $('#bsModal3').on('hidden.bs.modal', function () {
        location.reload();
    });

</script>

