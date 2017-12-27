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
            Mở khóa chat
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
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <label  style="color: red" id="errocode">
                    </label>
                </div>
            </div>

        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <label for="exampleInputEmail1">Tài khoản:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <input type="text" id="nickname"  class="form-control" placeholder="Bạn cần nhập nickname">
                </div>

            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <label for="exampleInputEmail1">Thời gian:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <input type="text" id="timeblock"  class="form-control" placeholder="Bạn cần nhập số phút cấm chat">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-1 col-sm-2 col-xs-12">

                </div>
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <input type="button" value="Mở chat" name="submit" class="btn btn-success" id="openchat">
                </div>
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <input type="button" value="Khóa chat" name="submit" class="btn btn-success" id="block">
                </div>

            </div>
        </div>

    </div>

    <div class="box-body  table-responsive no-padding">
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
                        <p style="color: #0000ff">Bạn mở chat thành công</p>
                    </div>
                    <div class="modal-footer">
                        <input class="blueB logMeIn" type="button" value="Đóng" data-dismiss="modal" aria-hidden="true">
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="bsModal4" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                    </div>
                    <div class="modal-body">
                        <p style="color: #0000ff">Bạn khóa chat vĩnh viễn thành công</p>
                    </div>
                    <div class="modal-footer">
                        <input class="blueB logMeIn" type="button" value="Đóng" data-dismiss="modal" aria-hidden="true">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="bsModal5" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                    </div>
                    <div class="modal-body">
                        <p style="color: #0000ff">Bạn khóa chat thành công</p>
                    </div>
                    <div class="modal-footer">
                        <input class="blueB logMeIn" type="button" value="Đóng" data-dismiss="modal" aria-hidden="true">
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
    $("#openchat").click(function () {
        if($("#nickname").val() == ""){
            $("#errocode").html("Bạn chưa nhập nickname");
            return false;
        }
        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('mail/blockchatajax')?>",
     
            data: {
                nickname: $("#nickname").val(),
                time: 0
            },
            dataType: 'json',
            success: function (res) {
                $("#spinner").hide();
                if(res == 1){
                    $("#bsModal3").modal("show");
                    $("#errocode").html("");
                    $("#nickname").val("");
                    $("#timeblock").val("");
                }
            }
        });

    });
    $("#blockchat").click(function () {
        if($("#nickname").val() == ""){
            $("#errocode").html("Bạn chưa nhập nickname");
            return false;
        }
        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('mail/blockchatajax')?>",
        
            data: {
                nickname: $("#nickname").val(),
                time: -1
            },
            dataType: 'json',
            success: function (res) {
                $("#spinner").hide();
                if(res == 1){
                    $("#bsModal4").modal("show");
                    $("#errocode").html("");
                    $("#nickname").val("");
                    $("#timeblock").val("");
                }
            }
        });
    });
        $("#block").click(function () {
            if($("#nickname").val() == ""){
                $("#errocode").html("Bạn chưa nhập nickname");
                return false;
            }
            if($("#timeblock").val() == ""){
                $("#errocode").html("Bạn chưa nhập thời gian");
                return false;
            }
            $("#spinner").show();
            $.ajax({
                type: "POST",
                url: "<?php echo admin_url('mail/blockchatajax')?>",
          
                data: {
                    nickname: $("#nickname").val(),
                    time: 60*1000*$("#timeblock").val()
                },
                dataType: 'json',
                success: function (res) {
                    $("#spinner").hide();
                    if(res == 1){
                        $("#bsModal5").modal("show");
                        $("#errocode").html("");
                        $("#nickname").val("");
                        $("#timeblock").val("");
                    }
                }
            });
    });


    $(document).ready(function () {
        $("#timeblock").keydown(function (e) {
            // Allow: backspace, delete, tab, escape, enter and .
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                    // Allow: Ctrl+A, Command+A
                (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                    // Allow: home, end, left, right, down, up
                (e.keyCode >= 35 && e.keyCode <= 40)) {
                // let it happen, don't do anything
                return;
            }
            // Ensure that it is a number and stop the keypress
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
        });

    });
</script>