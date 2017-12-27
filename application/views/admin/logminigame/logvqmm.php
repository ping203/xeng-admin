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
            Log vòng quay may mắn
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
                                        <input type='text' value="<?php echo $this->input->post('toDate') ?>"
                                               class="form-control"
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
                                        <input type='text' value="<?php echo $this->input->post('fromDate') ?>"
                                               class="form-control"
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
                                    <input type="text" class="form-control"
                                           id="filter_iname" value="<?php echo $this->input->post('name') ?>" name="name">
                                </div>
                                <div class="col-md-1 col-sm-2 col-xs-12">

                                </div>
                                <div class="col-md-1 col-sm-2 col-xs-12">
                                    <input type="button" id="search_tran" value="Tìm kiếm"
                                           class="btn btn-success">
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
                                        <th>STT</th>
                                        <th data-toggle="true">
                                            Mã giao dịch
                                        </th>

                                        <th>
                                            Nick name
                                        </th>
                                        <th>
                                            Giải vòng quay vin
                                        </th>
                                        <th>
                                            Giải vòng quay xu
                                        </th>
                                        <th>
                                            Giải vòng quay slot
                                        </th>
                                        <th>
                                            Mô tả
                                        </th>
                                        <th>
                                            Ngày tạo
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody id="logaction">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="spinner" class="spinner" style="display:none;">
                            <img id="img-spinner" src="<?php echo public_url('admin/images/gif-load.gif') ?>"
                                 alt="Loading"/>
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

    });


    function resultSearchVQMM(stt,tranid, nickname, resultvin, resultxu,resultslot,description,trantime) {
        var rs = "";
        rs += "<tr>";
        rs += "<td>" + stt + "</td>";
        rs += "<td>" + tranid + "</td>";
        rs += "<td>" + nickname + "</td>";
        if(resultvin == "fail"){
            rs += "<td>" + "Trượt rồi" + "</td>";
        }else{
            rs += "<td>" + commaSeparateNumber(resultvin) + "</td>";
        }
        if(resultxu == "fail"){
            rs += "<td>" + "Trượt rồi" + "</td>";
        }else{
            rs += "<td id='filter_in'>" + commaSeparateNumber(resultxu) + "</td>";
        }
        if(resultslot == "fail"){
            rs += "<td>" + "Trượt rồi" + "</td>";
        }else{
        rs += "<td id='filter_in'>" + resultslot + "</td>";
        }
        rs += "<td>" + description + "</td>";
        rs += "<td>" + trantime + "</td>";
        rs += "</tr>";
        return rs;
    }


    function commaSeparateNumber(val) {
        while (/(\d+)(\d{3})/.test(val.toString())) {
            val = val.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
        }
        return val;
    }
     $(document).ready(function () {
		   $("#resultsearch").html("Vui lòng ấn nút tìm kiếm");
	 })
    $("#search_tran").click(function () {
        var result = "";
        var oldPage = 0;

        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('logminigame/logvqmmajax') ?>",
            data: {
                nickname: $("#filter_iname").val(),
                pages : 1,
                todate : $("#toDate").val(),
                fromdate : $("#fromDate").val()
            },
            dataType: 'json',
            success: function (result) {
                $("#spinner").hide();
				
				 if (result.transactions == "") {
                     $('#pagination-demo').css("display", "none");
                    $("#resultsearch").html("Không tìm thấy kết quả");
					  $('#logaction').html("");
				
                } else {
					$('#pagination-demo').css("display", "block");
					$("#resultsearch").html("");
					var totalpage = result.total;
					stt = 1;
                $.each(result.transactions, function (index, value) {
                    result += resultSearchVQMM(stt,value.tran_id, value.nick_name,value.result_vin,value.result_xu,value.result_slot,value.description,value.trans_time);
                    stt ++;
                });
                $('#logaction').html(result);
                var table = $('#checkAll').DataTable({
					"retrieve": true,
                    "ordering": true,
                    "searching": false,
                    "paging": false,
                    "draw": false
                });

                $('#pagination-demo').twbsPagination({

                    totalPages: totalpage,
                    visiblePages: 5,
                    onPageClick: function (event, page) {
                        if (oldPage > 0) {
                            $("#spinner").show();
                          //  table.destroy();
                            $.ajax({
                                type: "POST",
                                url: "<?php echo admin_url('logminigame/logvqmmajax') ?>",
                                data: {
                                    nickname: $("#filter_iname").val(),
                                    pages : page,
                                    todate : $("#toDate").val(),
                                    fromdate : $("#fromDate").val()
                                },
                                dataType: 'json',
                                cache: true,
                                success: function (result) {
                                    $("#resultsearch").html("");
                                    $("#spinner").hide();
                                    stt = 1;
                                    $.each(result.transactions, function (index, value) {
                                        result += resultSearchVQMM(stt,value.tran_id, value.nick_name,value.result_vin,value.result_xu,value.result_slot,value.description,value.trans_time);
                                        stt ++;
                                    });
                                    $('#logaction').html(result);
									
                                    table = $('#checkAll').DataTable({
										"retrieve": true,
                                        "ordering": true,
                                        "searching": false,
                                        "paging": false,
                                        "draw": false
                                    });
                                }
                            });
                        }
                        oldPage = page;
                    }
                });
				}
            }
        })
    });


</script>