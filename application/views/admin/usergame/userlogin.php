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
            Lịch sử tài khoản login
        </h1>
        <ol class="breadcrumb">
            <label class="">Tổng: <span id="sumResult" style="color: #0000ff"></span></label>
        </ol>
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
                    <label for="exampleInputEmail1">Nickname:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <input type="text" class="form-control" id="filter_iname"
                           value="<?php echo $this->input->post('name') ?>" name="name">
                </div>
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <label for="exampleInputEmail1">Ip:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <input type="text" class="form-control" id="iplogin" value="<?php echo $this->input->post('iplogin') ?>" name="iplogin">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <label for="exampleInputEmail1">Trạng thái:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <select id="status" name="timkiemtheo" class="form-control">
                        <option value="1" <?php if($this->input->post('timkiemtheo')== "1" ){echo "selected";} ?>>Đăng nhập</option>
                        <option value="0" <?php if($this->input->post('timkiemtheo')== "0" ){echo "selected";} ?>>Đăng ký</option>
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
                        <td>User name</td>
                        <td>Nick name</td>
                        <td>IP</td>
                        <td>Thiết bị</td>
                        <td>Trạng thái</td>
                        <td>Bảo mật</td>
                        <td>Ngày tạo</td>
                        <td>Sử dụng giftcode</td>
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
    })
    function resultSearchTransction(stt, username, nickname, ip, agent, type,security,date) {
        var rs = "";
        rs += "<tr>";
        rs += "<td>" + stt + "</td>";
        rs += "<td>" + username + "</td>";
        rs += "<td>" + nickname + "</td>";
        rs += "<td>" + ip + "</td>";
        rs += "<td class='col-sm-3'>" + agent + "</td>";
        if(type == 1){
        rs += "<td>" + " Đăng nhập" + "</td>";
        }else{
            rs += "<td>" + "Đăng ký" + "</td>";
        }
        if(security == 1){
            rs += "<td>" + "Có" + "</td>";
        }else if(security == 0){
            rs += "<td>" + "Không" + "</td>";
        }
        rs += "<td>" + date + "</td>";
        rs += "<td>" +  "<a class='ajax' style = 'color:blue;' href='<?php echo admin_url('usergame/detailgc') ?>"+"/"+nickname+"'>"+"Chi tiết"+"</a>";
        rs += "</tr>";
        return rs;
    }
    $(document).ready(function () {
		 $("#resultsearch").html("Vui lòng ấn nút tìm kiếm");
	})
     $("#search_tran").click(function () {
        var result = "";
        var oldPage = 0;
        $('#pagination-demo').css("display", "block");
        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('usergame/userloginajax')?>",
           
            data: {
                nickname: $("#filter_iname").val(),
                iplogin: $("#iplogin").val(),
                toDate: $("#toDate").val(),
                fromDate: $("#fromDate").val(),
                status: $("#status").val(),
                pages : 1
            },

            dataType: 'json',
            success: function (result) {
                $("#spinner").hide();
                if (result.transactions == "") {
                    $('#pagination-demo').css("display", "none");
                    $("#resultsearch").html("Không tìm thấy kết quả");
					   $('#logaction').html("");
                }else {
					 $("#resultsearch").html("");
                    $("#numuser").html(result.totalRecord);
                    var totalPage = result.total;
                    stt = 1;
                    $.each(result.transactions, function (index, value) {
                        result += resultSearchTransction(stt, value.user_name, value.nick_name, value.ip, value.agent, value.type,value.security, value.time_log);
                        stt++
                    });
                    $('#logaction').html(result);
                    $(".ajax").colorbox({iframe:true, innerWidth:1000, innerHeight:300});
                    $('#pagination-demo').twbsPagination({
                        totalPages: totalPage,
                        visiblePages: 5,
                        onPageClick: function (event, page) {
                            if (oldPage > 0) {
                                $("#spinner").show();

                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo admin_url('usergame/userloginajax')?>",
                                  
                                    data: {
                                        nickname: $("#filter_iname").val(),
                                        iplogin: $("#iplogin").val(),
                                        toDate: $("#toDate").val(),
                                        fromDate: $("#fromDate").val(),
                                        status: $("#status").val(),
                                        pages : page
                                    },
                                    dataType: 'json',
                                    success: function (result) {
										 $("#resultsearch").html("");
                                        $("#spinner").hide();
                                        stt = 1;
                                        $.each(result.transactions, function (index, value) {
                                            result += resultSearchTransction(stt, value.user_name, value.nick_name, value.ip, value.agent, value.type,value.security, value.time_log);
                                            stt++
                                        });
                                        $('#logaction').html(result);
                                        $(".ajax").colorbox({iframe:true, innerWidth:1000, innerHeight:300});
                                    }, error: function () {
                $("#spinner").hide();
                $('#logaction').html("");
                $("#resultsearch").html("Hệ thống quá tải. Vui lòng gọi 19008698 hoặc F5 lại pages");
            },timeout : timeOutApi
                                });
                            }
                            oldPage = page;
                        }
                    });


                }
            }, error: function () {
                $("#spinner").hide();
                $('#logaction').html("");
                $("#resultsearch").html("Hệ thống quá tải. Vui lòng gọi 19008698 hoặc F5 lại pages");
            },timeout : timeOutApi
        });

    });
</script>
<script>
    function commaSeparateNumber(val) {
        while (/(\d+)(\d{3})/.test(val.toString())) {
            val = val.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
        }
        return val;
    }

</script>