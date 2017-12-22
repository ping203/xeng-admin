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
            Danh sách giftcode
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
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <label for="exampleInputEmail1">Từ ngày:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class='input-group date' id='datetimepicker1'>
                        <input type='text' value="" class="form-control"
                               id="toDate" name="toDate"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    </div>
                </div>
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <label for="exampleInputEmail1">Đến ngày:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">

                    <div class='input-group date' id='datetimepicker2'>
                        <input type='text' value="" class="form-control"
                               id="fromDate" name="fromDate"/>
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
                    <label for="exampleInputEmail1">Tiền:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <select id="money" name="money"
                            class="form-control">
                        <option value="1"><?php echo $namegame ?></option>
                        <option value="0">Xu</option>
                    </select>
                </div>
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <label for="exampleInputEmail1">Trạng thái:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <select id="gcuse" name="gcuse" class="form-control">
                        <option value="1">Đã sử dụng</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <label for="exampleInputEmail1">Mệnh giá <?php echo $namegame ?>:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <select id="menhgiavin" name="menhgiavin" class="form-control">
                        <option value="">Chọn</option>
                        <option value="10">10K <?php echo $namegame ?></option>
                        <option value="20">20K <?php echo $namegame ?></option>
                        <option value="50">50K <?php echo $namegame ?></option>
                        <option value="100">100K <?php echo $namegame ?></option>
                        <option value="200">200K <?php echo $namegame ?></option>
                    </select>
                </div>
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <label for="exampleInputEmail1">Mệnh giá xu:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <select id="menhgiaxu" name="menhgiaxu" class="form-control">
                        <option value="">Chọn</option>
                        <option value="1">1M Xu</option>
                        <option value="3">3M Xu</option>
                        <option value="5">5M Xu</option>
                        <option value="9">9M Xu</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <label for="exampleInputEmail1">Nickname:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <input class="form-control" name="nickname" id="nickname">
                </div>
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <label for="exampleInputEmail1">Giftcode:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <input class="form-control"  id="giftcode" name="giftcode">
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <label for="exampleInputEmail1">Nguồn xuất:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <select id="nguonxuat" class="form-control" name="nguonxuat">
                        <option value="">Tất cả</option>
                        <option value="">Giftcode Marketing</option>
                        <?php foreach($sourcemkt as $row): ?>
                            <option value="<?php echo $row->key ?>" <?php if($this->input->post("nguonxuat")==  $row->key){echo "selected";}  ?>><?php echo '------'. $row->name ?></option>
                        <?php endforeach; ?>
                        <option value="">Giftcode vận hành</option>
                        <?php foreach($sourcevh as $row): ?>
                            <option value="<?php echo $row->key ?>" <?php if($this->input->post("nguonxuat")==  $row->key){echo "selected";}  ?>><?php echo '------'. $row->name ?></option>
                        <?php endforeach; ?>
                        <option value="">Giftcode đại lý</option>
                        <?php foreach($sourcedl as $row): ?>
                            <option value="<?php echo $row->key ?>" <?php if($this->input->post("nguonxuat")==  $row->key){echo "selected";}  ?>><?php echo '------'. $row->nameagent.'('.$row->nickname.')' ?></option>
                        <?php endforeach; ?>

                    </select>
                </div>
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <label for="exampleInputEmail1">Loại giftcode:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <select id="typegiftcode" class="form-control" name="typegiftcode">
                        <option value="" <?php if($this->input->post("typegiftcode")== ""){echo "selected";}  ?>>Chọn</option>
                        <option value="1" <?php if($this->input->post("typegiftcode")== "1"){echo "selected";}  ?>>Giftcode đại lý</option>
                        <option value="2" <?php if($this->input->post("typegiftcode")== "2"){echo "selected";}  ?>>Giftcode marketing</option>
                        <option value="3" <?php if($this->input->post("typegiftcode")== "3"){echo "selected";}  ?>>Giftcode vận hành</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <label for="exampleInputEmail1">Tìm theo:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <select name="filterdate"  id="filterdate"  class="form-control">
                        <option value="1" <?php if ($this->input->post("filterdate") == "1") {echo "selected";} ?>>Ngày tạo</option>
                        <option value="2" <?php if ($this->input->post("filterdate") == "2") {echo "selected";} ?>>Ngày sử dụng</option>
                    </select>
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
        <div class="row">
            <div class="col-sm-12">
                <table id="example2" class="table  table-bordered table-hover">
                    <thead>
                    <tr>
                        <td>STT</td>
                        <td>Mệnh giá</td>
                        <td>GiftCode</td>
                        <td>Username</td>
                        <td>Nickname</td>
                        <td>Số lương</td>
                        <td>Trạng thái</td>
                        <td>Ngày tạo</td>
                        <td>Ngày sử dụng</td>
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
<script>
$(function () {
    $('#datetimepicker1').datetimepicker({
        format: 'YYYY-MM-DD HH:mm:ss'
    });
    $('#datetimepicker2').datetimepicker({
        format: 'YYYY-MM-DD HH:mm:ss'
    });

});
$("#search_tran").click(function () {
    var fromDatetime = $("#toDate").val();
    var toDatetime = $("#fromDate").val();
    if (fromDatetime > toDatetime) {
        alert('Ngày kết thúc phải lớn hơn ngày bắt đầu')
        return false;
    }
    $('#pagination-demo').css("display","block");
    var oldpage = 0;
    if($("#money").val()==1){
        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('giftcode/giftcodemktajax') ?>",
            data: {
                nickname: $("#nickname").val(),
                giftcode : $("#giftcode").val(),
                menhgiavin: $("#menhgiavin").val(),
                source: $("#nguonxuat").val(),
                toDate: $("#toDate").val(),
                fromDate: $("#fromDate").val(),
                money: $("#money").val(),
                pages : 1,
                gcuse: $("#gcuse").val(),
                typegc : $("#typegiftcode").val(),
                filterdate: $("#filterdate").val()
            },
            dataType: 'json',
            success: function (result) {
                $("#spinner").hide();
                var totalPage = result.total;
                var countrow  = result.totalRecord;
                $("#num").html(countrow) ;
                if (result.transactions == "") {
                    $('#pagination-demo').css("display","none");
                    $("#resultsearch").html("Không tìm thấy kết quả");
                    $('#logaction').html("");
                } else {
                    $("#resultsearch").html("");
                    stt = 1;
                    $.each(result.transactions, function (index, value) {
                        result += resultgiftcodevin(stt,value.price,value.giftCode,value.nickName,value.userName,value.quantity,value.createTime,value.useGiftCode,value.updateTime);
                        stt++;
                    });
                    $('#logaction').html(result);
                    var table = $('#checkAll').DataTable({
                        "ordering": true,
                        "searching": true,
                        "paging": false,
                        "draw": false,
						 "retrieve": true
                    });
                    if($('#pagination-demo').data("twbs-pagination")){
                        $('#pagination-demo').twbsPagination('destroy');
                    }
                    $('#pagination-demo').twbsPagination({
                        totalPages: totalPage,
                        visiblePages: 5,
                        onPageClick: function (event, page) {
                            if(oldpage >0 ) {
                                $("#spinner").show();
                                table.destroy();
                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo admin_url('giftcode/giftcodemktajax') ?>",
                                    data: {
                                        nickname: $("#nickname").val(),
                                        giftcode : $("#giftcode").val(),
                                        menhgiavin: $("#menhgiavin").val(),
                                        source: $("#nguonxuat").val(),
                                        toDate: $("#toDate").val(),
                                        fromDate: $("#fromDate").val(),
                                        money: $("#money").val(),
                                        pages : page,
                                        gcuse: $("#gcuse").val(),
                                        typegc : $("#typegiftcode").val(),
                                        filterdate: $("#filterdate").val()
                                    },
                                    dataType: 'json',
                                    success: function (result) {
                                        $("#spinner").hide();
                                        stt = 1;
                                        $.each(result.transactions, function (index, value) {
                                            result += resultgiftcodevin(stt,value.price,value.giftCode,value.nickName,value.userName,value.quantity,value.createTime,value.useGiftCode,value.updateTime);
                                            stt++;
                                        });
                                        $('#logaction').html(result);
                                        table = $('#checkAll').DataTable({
                                            "ordering": true,
                                            "searching": true,
                                            "paging": false,
                                            "draw": false,
											 "retrieve": true
                                        });
                                    }
                                });
                            }
                            oldpage = page;
                        }
                    });
                }

            }
        })
    }else if($("#money").val()==0){
        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('giftcode/giftcodemktajax') ?>",
            data: {
                nickname: $("#nickname").val(),
                giftcode : $("#giftcode").val(),
                menhgiaxu : $("#menhgiaxu").val(),
                source: $("#nguonxuat").val(),
                toDate: $("#toDate").val(),
                fromDate: $("#fromDate").val(),
                money: $("#money").val(),
                pages : 1,
                gcuse: $("#gcuse").val(),
                typegc : $("#typegiftcode").val(),
                filterdate: $("#filterdate").val()
            },
            dataType: 'json',
            success: function (result) {
                $("#spinner").hide();
                var totalPage1 = result.total;
                var countrow  = result.totalRecord;
                $("#num").html(countrow) ;
                if (result.transactions == "") {
                    $('#pagination-demo').css("display","none");
                    $("#resultsearch").html("Không tìm thấy kết quả");
                    $('#logaction').html("");
                } else {
                    $("#resultsearch").html("");
                    stt = 1;
                    $.each(result.transactions, function (index, value) {
                        result += resultgiftcodevin(stt,value.price,value.giftCode,value.nickName,value.userName,value.quantity,value.createTime,value.useGiftCode,value.updateTime);
                        stt++;
                    });
                    $('#logaction').html(result);
                    var table = $('#checkAll').DataTable({
                        "ordering": true,
                        "searching": true,
                        "paging": false,
                        "draw": false,
						 "retrieve": true
                    });

                    if($('#pagination-demo').data("twbs-pagination")){
                        $('#pagination-demo').twbsPagination('destroy');
                    }
                    $('#pagination-demo').twbsPagination({
                        totalPages: totalPage,
                        visiblePages: 5,
                        onPageClick: function (event, page) {
                            if(oldpage >0 ) {
                                $("#spinner").show();
                                table.destroy();
                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo admin_url('giftcode/giftcodemktajax') ?>",
                                    data: {
                                        nickname: $("#nickname").val(),
                                        giftcode : $("#giftcode").val(),
                                        menhgiaxu: $("#menhgiaxu").val(),
                                        source: $("#nguonxuat").val(),
                                        toDate: $("#toDate").val(),
                                        fromDate: $("#fromDate").val(),
                                        money: $("#money").val(),
                                        pages : page,
                                        gcuse: $("#gcuse").val(),
                                        typegc : $("#typegiftcode").val(),
                                        filterdate: $("#filterdate").val()
                                    },
                                    dataType: 'json',
                                    success: function (result) {
                                        $("#spinner").hide();
                                        stt = 1;
                                        $.each(result.transactions, function (index, value) {
                                            result += resultgiftcodevin(stt,value.price,value.giftCode,value.nickName,value.userName,value.quantity,value.createTime,value.useGiftCode,value.updateTime);
                                            stt++;
                                        });
                                        $('#logaction').html(result);
                                        table = $('#checkAll').DataTable({
                                            "ordering": true,
                                            "searching": true,
                                            "paging": false,
                                            "draw": false,
											 "retrieve": true
                                        });
                                    }
                                });
                            }
                            oldpage = page;
                        }
                    });

                }


            }
        })
    }
});
function resultgiftcodevin(stt, price, giftcode, nickname,username, quantity, createtime, status,usetime) {
    var rs = "";
    rs += "<tr>";
    rs += "<td>" + stt + "</td>";
    if ($("#money").val() == 1) {
        rs += "<td>" + price + "K" + "</td>";
    } else if ($("#money").val() == 0) {
        rs += "<td>" + price + "M" + "</td>";
    }
    rs += "<td>" + giftcode + "</td>";
    rs += "<td>" + username + "</td>";
    rs += "<td>" + nickname + "</td>";

    rs += "<td>" + quantity + "</td>";

    if (status == 1) {
        rs += "<td>" + "Đã sử dụng" + "</td>";
    } else {
        rs += "<td>" + "Chưa sử dụng" + "</td>";
    }
    rs += "<td>" + createtime + "</td>";
    rs += "<td>" + usetime + "</td>";
    rs += "</tr>";
    return rs;
}
$(document).ready(function () {
    $("#resultsearch").html("Vui lòng ấn nút tìm kiếm");
});
</script>
