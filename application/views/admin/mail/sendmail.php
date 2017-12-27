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
            Gửi mail tài khoản
        </h1>
    </section>
    <section class="content">
    <div class="row">
    <div class="col-xs-12">
    <div class="box box-body">

    <label id="errocode" style="color: red;"></label>

    <div class="box-body">
        <div class="form-group">
            <div class="row">
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <label for="exampleInputEmail1">Nickname:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <input type="text" id="nickname" class="form-control">
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                   <label style="color: #0000ff">Nhập (*) gửi tất cả</label>
                </div>
            </div>

        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <label for="exampleInputEmail1">Tiêu đề:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <input id="title" type="text" class="form-control">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <label for="exampleInputEmail1">Nội dung:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <textarea id="content" row="100" class="form-control" style="height: 400px"></textarea>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-1 col-sm-2 col-xs-12">

                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <input type="button" value="Gửi mail" name="submit" class="btn btn-success" id="sendmail">
                </div>

            </div>
        </div>

    </div>

    <div class="box-body">
        <?php $this->load->view('admin/message', $this->data); ?>
        <?php $this->load->view('admin/error', $this->data); ?>
        <div id="spinner" class="spinner" style="display:none;">
            <img id="img-spinner" src="<?php echo public_url('admin/images/gif-load.gif') ?>" alt="Loading"/>
        </div>
        <div class="text-center">
            <ul id="pagination-demo" class="pagination-sm"></ul>
        </div>
        <div class="modal fade" id="bsModal3" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                    </div>
                    <div class="modal-body">
                        <p style="color: #0000ff">Bạn gửi mail thành công</p>
                    </div>
                    <div class="modal-footer">
                        <input class="btn btn-success logMeIn" type="button" value="Đóng" data-dismiss="modal" aria-hidden="true">
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </section>
<?php endif; ?>
</div>
<script>
$("#sendmail").click(function () {
   
    if($("#nickname").val() == ""){
        $("#errocode").html("Bạn chưa nhập nickname");
        return false;
    } if($("#title").val() == ""){
        $("#errocode").html("Bạn chưa nhập tiêu đề");
        return false;
    } if($("#content").val() == ""){
        $("#errocode").html("Bạn chưa nhập nội dung");
        return false;
    }
     if($("#toDate").val() == ""){
        $("#errocode").html("Bạn chưa nhập thời gian");
        return false;
    }
 $("#spinner").show();
                   $.ajax({
                       type: "POST",
                       url: "<?php echo admin_url('mail/sendmailajax')?>",
                       data: {
                           c:401,
                           nickname: $("#nickname").val(),
                            title: $("#title").val(),
                             content: $("#content").val()
                       },
                       dataType: 'json',
                       success: function (res) {
						    $("#spinner").hide();
                           if(res.errorCode == 10002){
                               $("#errocode").html("Nickname:  " + res.nickName+ "  không tồn tại");
                           }else{
                               $("#bsModal3").modal("show");
                                    $("#errocode").html("");
                           }
                       }, error: function () {
                           $("#spinner").hide();
                           $("#errocode").html("Hệ thống quá tải. Vui lòng gọi 19008698 hoặc F5 lại pages");
                       },timeout : timeOutApi
                   });
        });

</script>