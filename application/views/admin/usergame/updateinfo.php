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
            Cập nhật tài khoản
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
                    <label  style="color: red;word-break: break-all" id="errorname"></label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <label for="exampleInputEmail1">Nickname:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <input class="form-control" id="filter_iname" placeholder="Nhập nick name" type="text">
                </div>
            </div>

        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <label for="exampleInputEmail1">Sinh nhật:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class='input-group date' id='datetimepicker1'>
                        <input type='text' value="" class="form-control"
                               id="birth_day" name="birth_day"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <label for="exampleInputEmail1">Giới tính:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <select id="gioitinh" class="form-control">
                        <option value="1">Nam</option>
                        <option value="0">Nữ</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <label for="exampleInputEmail1">Địa chỉ:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <input class="form-control" id="txtaddress" type="text" placeholder="Nhập địa chỉ">
                </div>
                <div class="col-md-1 col-sm-2 col-xs-12">
                </div>
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <input type="button" id="search_tran" value="Cập nhật" class="btn btn-success">
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
                        <p style="color: #0000ff">Bạn cập nhật tài khoản thành công</p>
                    </div>
                    <div class="modal-footer">
                        <input class="blueB logMeIn" type="button" value="Đóng" data-dismiss="modal"
                               aria-hidden="true">
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
    $(function () {
        $('#datetimepicker1').datetimepicker({
            format: 'DD-MM-YYYY'
        });

    });
    $("#search_tran").click(function () {
        if($("#filter_iname").val() == ""){
            alert("Bạn chưa nhập nick name");
            return false;
        }
        if($("#birth_day").val() == ""){
            alert("Bạn chưa nhập ngày sinh nhật");
            return false;
        }
        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('usergame/updateinfoajax')?>",
            data: {
                nickname: $("#filter_iname").val(),
                birthday : $("#birth_day").val(),
                gioitinh : $("#gioitinh").val(),
                address : $("#txtaddress").val()
            },

            dataType: 'json',
            success: function (result) {
                if(result == 0){
                    $("#errorname").html("");
                    $("#filter_iname").val("");
                    $("#txtaddress").val("");
                    $("#bsModal3").modal("show");
                    $("#spinner").hide();

                }else if(result == 1){
                    $("#errorname").html("Bạn cập nhật không thành công");
                    $("#spinner").hide();
                }else{
                    $("#errorname").html("Nickname không tồn tại");
                    $("#spinner").hide();
                }
            }
        });
    });

</script>
