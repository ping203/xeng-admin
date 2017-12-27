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
            Lịch sử user vippoint event
        </h1>

    </section>
    <section class="content">
    <div class="row">
    <div class="col-xs-12">
    <div class="box box-body">

    <label id="resultsearch" style="color: red;"></label>

    <div class="box-body">
        <form action="<?php echo admin_url('event/uservippoint') ?>" method="post">
        <div class="form-group">
            <div class="row">
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <label for="exampleInputEmail1">Từ ngày:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class='input-group date' id='datetimepicker1'>
                        <input type='text' value="<?php echo $this->input->post('toDate'); ?>" class="form-control"
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
                        <input type='text' value="<?php echo $this->input->post('fromDate'); ?>" class="form-control"
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
                    <label for="exampleInputEmail1">Sắp xếp:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <select id="sort" name="sort" class="form-control">
                        <option value="" <?php if ($this->input->post('sort') == "") {
                            echo "selected";
                        } ?>>Sắp xếp
                        </option>
                        <option value="2" <?php if ($this->input->post('sort') == "2") {
                            echo "selected";
                        } ?>>Giảm dần
                        </option>
                        <option value="1" <?php if ($this->input->post('sort') == "1") {
                            echo "selected";
                        } ?>>Tăng dần
                        </option>

                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <label for="exampleInputEmail1">Trường:</label>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="checkbox" value="1" name="chklist" id="filed_0"> <span style="padding-left: 10px;">Vippoint</span>
                    <input type="checkbox" value="2"  name="chklist" id="filed_1"><span style="padding-left: 10px;">VP Event</span>
                    <input type="checkbox" value="3" name="chklist" id="filed_2"><span
                        style="padding-left: 10px;">VP Được cộng</span>
                    <input type="checkbox" value="4"  name="chklist" id="filed_3"><span style="padding-left: 10px;">Số lần cộng</span>
                    <input type="checkbox" value="5"  name="chklist" id="filed_4"><span
                        style="padding-left: 10px;">VP bị trừ</span>
                    <input type="checkbox" value="6"  name="chklist" id="filed_5"><span style="padding-left: 10px;">Số lần trừ</span>
                    <input type="checkbox" value="7"  name="chklist" id="filed_6"><span
                        style="padding-left: 10px;">Cứ điểm</span>
                    <input type="checkbox" value="8"  name="chklist" id="filed_7"><span style="padding-left: 10px;">Cứ điểm max</span>
                    <input type="hidden" value="<?php echo $this->input->post('field'); ?>" id="field" name="field"   >
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <label for="exampleInputEmail1">Tài khoản:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <select id="select_acc" name="select_acc" class="form-control">
                        <option value="" <?php if ($this->input->post('select_acc') == "") {
                            echo "selected";
                        } ?>>Tất cả
                        </option>
                        <option value="0" <?php if ($this->input->post('select_acc') == "0") {
                            echo "selected";
                        } ?>>Tài khoản thường
                        </option>
                        <option value="1" <?php if ($this->input->post('select_acc') == "1") {
                            echo "selected";
                        } ?>>Tài khoản bot
                        </option>

                    </select>
                </div>
                <div class="col-md-1 col-sm-2 col-xs-12">

                </div>
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <input type="submit" id="search_tran" value="Tìm kiếm" class="btn btn-success">
                </div>

            </div>
        </div>
            </form>

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
                        <td>Nick name</td>
                        <td>Vippoint </td>
                        <td>VP Event</td>
                        <td>VP được cộng</td>
                        <td>Số lần cộng</td>
                        <td>VP bị trừ</td>
                        <td>Số lần trừ</td>
                        <td>Cứ điểm</td>
                        <td>Cứ điểm Max</td>
                        <td>Tài khoản</td>
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
        var lst=''
        $.each($("input[name='chklist']:checked"), function(){
            lst+= $(this).val()+",";
        });
        $("#field").val(lst);
        var data = $("#field").val();
        var field= data.split(",");
        var checkboxes = $('input:checkbox[name="chklist"]');

        for (var j = 0; j < field.length; j++){
            checkboxes
                .filter('[value="'+field[j]+'"]')
                .attr("checked","checked");
        }
    });
    function resultSearchTransction(stt, nickname, vpReal,vpEvent,vpAdd,numAdd,vpSub,numSub,place,placeMax,isbot,date) {
        var rs = "";
        rs += "<tr>";
        rs += "<td>" + stt + "</td>";
        rs += "<td>" + nickname + "</td>";
        rs += "<td>" + commaSeparateNumber(vpReal)+ "</td>";
        rs += "<td>" + commaSeparateNumber(vpEvent)  + "</td>";
        rs += "<td>" + commaSeparateNumber(vpAdd)  + "</td>";
        rs += "<td>" + commaSeparateNumber(numAdd) + "</td>";
        rs += "<td>" + commaSeparateNumber(vpSub) + "</td>";
        rs += "<td>" + commaSeparateNumber(numSub)  + "</td>";
        rs += "<td>" + commaSeparateNumber(place)  + "</td>";
        rs += "<td>" + commaSeparateNumber(placeMax) + "</td>";
        if(isbot == 0){
            rs += "<td>" + "Tài khoản thường" + "</td>";
        }else if(isbot == 1){
            rs += "<td>" + "Tài khoản bot" + "</td>";
        }

        rs += "<td>" + date + "</td>";
        rs += "</tr>";
        return rs;
    }
    $(document).ready(function () {
        //check box
        var data = $("#field").val();
        var field= data.split(",");
        var checkboxes = $('input:checkbox[name="chklist"]');

        for (var j = 0; j < field.length; j++){
            checkboxes
                .filter('[value="'+field[j]+'"]')
                .attr("checked","checked");
        }
        ///
        var oldPage = 0;
        var result = "";
        $('#pagination-demo').css("display", "block");
        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('event/uservippointajax')?>",
            data: {
                nickname: $("#filter_iname").val(),
                toDate: $("#toDate").val(),
                fromDate: $("#fromDate").val(),
                sort: $("#sort").val(),
                field: $("#field").val(),
                account : $("#select_acc").val(),
                pages: 1
            },

            dataType: 'json',
            success: function (result) {
                $("#spinner").hide();
                if (result.transactions == "") {
                    $('#pagination-demo').css("display", "none");
                    $("#resultsearch").html("Không tìm thấy kết quả");
                } else {
                    var totalPage = result.total;
                    var totalrecord = commaSeparateNumber(result.totalRecord);

                    $('#sumrecord').html(totalrecord);
                    stt = 1;
                    $.each(result.transactions, function (index, value) {
                        result += resultSearchTransction(stt, value.nickName, value.vp_real, value.vp_event,value.vp_add,value.num_add,value.vp_sub,value.num_sub,value.place,value.placemax,value.is_bot,value.updateTime);
                        stt++;

                    });
                    $('#logaction').html(result);
                    var table = $('#checkAll').DataTable({
                        "ordering": true,
                        "searching": true,
                        "paging": false,
                        "draw": false
                    });
                    $('#pagination-demo').twbsPagination({
                        totalPages: totalPage,
                        visiblePages: 5,
                        onPageClick: function (event, page) {
                            if (oldPage > 0) {
                                $("#spinner").show();
                                table.destroy();
                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo admin_url('event/uservippointajax')?>",
                                    data: {
                                        nickname: $("#filter_iname").val(),
                                        toDate: $("#toDate").val(),
                                        fromDate: $("#fromDate").val(),
                                        sort: $("#sort").val(),
                                        field: $("#field").val(),
                                        account : $("#select_acc").val(),
                                        pages: page
                                    },
                                    dataType: 'json',
                                    success: function (result) {
                                        $("#spinner").hide();
                                        stt = 1;
                                        $.each(result.transactions, function (index, value) {
                                            result += resultSearchTransction(stt, value.nickName, value.vp_real, value.vp_event,value.vp_add,value.num_add,value.vp_sub,value.num_sub,value.place,value.placemax,value.is_bot, value.updateTime);
                                            stt++;

                                        });
                                        $('#logaction').html(result);
                                        table = $('#checkAll').DataTable({
                                            "ordering": true,
                                            "searching": true,
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
<script>
    function commaSeparateNumber(val) {
        while (/(\d+)(\d{3})/.test(val.toString())) {
            val = val.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
        }
        return val;
    }
</script>