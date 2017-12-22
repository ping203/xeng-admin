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
            Kiểm tra giftcode
        </h1>
    </section>
    <section class="content">
    <div class="row">
    <div class="col-xs-12">
    <div class="box box-body">

    <label id="resultsearch" style="color: red;"></label>
        <input type="hidden" id="listgiftcode" value="<?php echo $listnn ?>">
    <div class="box-body">
        <div class="form-group">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <label  style="color: red;word-break: break-all" id="errocode"><?php echo $error; ?></label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <label  style="color: red;word-break: break-all" id="errocodeuse"></label>
                </div>
            </div>
        </div>
        <form action="<?php echo admin_url("giftcode/checkgiftcode") ?>" id="fileinfo" name="fileinfo"
              enctype="multipart/form-data" method="post">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-1 col-sm-2 col-xs-12">
                        <label for="exampleInputEmail1">Giftcode:</label>
                    </div>
                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <input type="file" id="userfile" name="filexls"
                               value="<?php echo $this->input->post('filexls') ?>">
                    </div>
                    <div class="col-md-1 col-sm-2 col-xs-12">
                    </div>
                    <div class="col-md-1 col-sm-2 col-xs-12">
                        <input type="submit" class="btn btn-success" id="upload"
                               value="Upload" name="ok">
                    </div>
                </div>
            </div>
        </form>
        <div class="form-group">
            <div class="row">
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <label for="exampleInputEmail1">Hiển thị:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <select id="selectdisplay" name="selectdisplay" class="form-control">
                        <option value="50" >50</option>
                        <option value="100" >100</option>
                        <option value="200" >200</option>
                        <option value="500" >500</option>
                        <option value="1000" >1000</option>
                        <option value="2000" >2000</option>
                        <option value="5000" >5000</option>
                    </select>
                </div>
                <div class="col-md-1 col-sm-2 col-xs-12">
                </div>
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <input type="button" id="openuser" value="Tìm kiếm" class="btn btn-success">
                </div>
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <input type="button" id="exportexel" value="Xuất Exel" class="btn btn-success">
                </div>
            </div>
        </div>
    </div>

    <div class="box-body  table-responsive no-padding">
        <?php $this->load->view('admin/message', $this->data); ?>
        <?php $this->load->view('admin/error', $this->data); ?>
        <div class="row">
            <div class="col-sm-12">
                <table id="checkAll" class="table  table-bordered table-hover">
                    <thead>
                    <tr>
                        <td>STT</td>
                        <td>Giftcode</td>
                        <td>Nickname</td>
                        <td>Tổng tiền nạp</td>
                        <td>Thời gian</td>
                    </tr>
                    </thead>
                    <tbody id="logaction">

                    </tbody>
                </table>
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

<script type="text/javascript">
    $("#openuser").click(function () {
        var result = ""
        if($("#listgiftcode").val() == ""){
            $("#errocode").html("Không tồn tại file ");
        }else {
            var oldPage = 0;
            $("#spinner").show();
            $.ajax({
                type: "POST",
                url: "<?php echo admin_url('giftcode/checkgiftcodeajax')?>",
                data: {
                    giftcode: $("#listgiftcode").val(),
                    display : $("#selectdisplay").val(),
                    pages : 1
                },
                dataType: 'json',
                success: function (res) {
                    console.log(res);
                    $("#spinner").hide();
                    if (res.errorCode == "0") {
                        if (res.giftCodeNotExits != null || res.giftCodeNotExits != "") {
                            $("#errocode").html("Giftcode không tồn tại:" + (res.giftCodeNotExits));
                        }else{
                            $("#errocode").html("");
                        }
                        if (res.giftCodeNotUse != null || res.giftCodeNotUse != "") {
                            $("#errocodeuse").html("Giftcode chưa sử dụng :" + (res.giftCodeNotUse));
                        }else{
                            $("#errocodeuse").html("");
                        }


                        var totalPage = res.total;
                        stt = 1;
                        $.each(res.transactions, function (index, value) {
                            result += resultSearchTransction(stt, value.giftcode, value.nickName, value.totalRecharge, value.createTime);
                            stt++;
                        });
                        $('#logaction').html(result);
                        $('#pagination-demo').twbsPagination({
                            totalPages: totalPage,
                            visiblePages: 5,
                            onPageClick: function (event, page) {
                                if (oldPage > 0) {
                                    $("#spinner").show();
                                    $.ajax({
                                        type: "POST",
                                        url: "<?php echo admin_url('giftcode/checkgiftcodeajax')?>",
                                        data: {
                                            giftcode: $("#listgiftcode").val(),
                                            pages : page,
                                            display : $("#selectdisplay").val()
                                        },
                                        dataType: 'json',
                                        success: function (result) {
                                            $("#spinner").hide();
                                            stt = 1;
                                            $.each(res.transactions, function (index, value) {
                                                result += resultSearchTransction(stt, value.giftcode, value.nickName, value.totalRecharge, value.createTime);
                                                stt++;
                                            });
                                            $('#logaction').html(result);
                                        }
                                    });
                                }
                                oldPage = page;
                            }
                        });

                    }else if(res.errorCode == "10002"){
                        $("#errocode").html("File giftcode có chứa khoảng trắng .Vui lòng upload lại file");
                    }
                }, error: function () {
                    $("#spinner").hide();
                    $("#errocode").html("Hệ thống gián đoạn");
                },timeout : timeOutApi
            });
        }

    });
    $("#exportexel").click(function () {
        $("#checkAll").table2excel({
            exclude: ".noExl",
            name: "Excel Document Name",
            filename: "List giftcode",
            fileext: ".xls",
            exclude_img: true,
            exclude_links: true,
            exclude_inputs: true
        });
    });

    function commaSeparateNumber(val) {
        while (/(\d+)(\d{3})/.test(val.toString())) {
            val = val.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
        }
        return val;
    }
    function resultSearchTransction(stt, giftcode, nickname, totalre,time) {

        var rs = "";
        rs += "<tr>";
        rs += "<td>" + stt + "</td>";
        rs += "<td>" + giftcode + "</td>";
        rs += "<td>" + nickname + "</td>";
        rs += "<td>" + commaSeparateNumber(totalre) + "</td>";
        rs += "<td>" + time + "</td>";
        return rs;
    }
</script>
