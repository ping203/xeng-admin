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
            Thống kê giftcode
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
                    <label for="exampleInputEmail1">Tìm theo::</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <select name="filterdate"  id="filterdate"  class="form-control">
                        <option value="1" <?php if ($this->input->post("filterdate") == "1") {echo "selected";} ?>>Ngày tạo</option>
                        <option value="2" <?php if ($this->input->post("filterdate") == "2") {echo "selected";} ?>>Ngày sử dụng</option>
                    </select>
                </div>
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <label for="exampleInputEmail1">Nguồn xuất:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <select id="nguonxuat" name="nguonxuat" class="form-control">
                        <option value="" <?php if($this->input->post("nguonxuat")== ""){echo "selected";}  ?>>Chọn</option>
                        <?php foreach($source as $row): ?>
                            <option value="<?php echo $row->key ?>" <?php if($this->input->post("nguonxuat")==  $row->key){echo "selected";}  ?>><?php echo $row->name ?></option>
                        <?php endforeach; ?>
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
                    <select id="money" name="money" class="form-control">
                        <option value="1"><?php echo $namegame ?></option>
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
                <table  class="table  table-bordered table-hover" id="checkAll">
                    <tbody id="reportvt">
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
<style>
    .tdmoney {
        text-align: right;
    }
</style>
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
    if($("#money").val() == 1){
        giftcodevin();
    }else if($("#money").val() == 0){
        giftcodexu();
    }

});

$(document).ready(function () {
    $("#toDate").val(getFirtDayOfMonth());
    $("#fromDate").val(getLastDayOfMonth());
    giftcodevin();
});
function giftcodexu(){
    var result = "";
    var total1 = 0;
    var total2 = 0;
    var total3 = 0;
    var total4 = 0;
    var total5 = 0;
    var total6 = 0;
    var total7 = 0;
    var total8 = 0;
    var total9 = 0;
    var total10 = 0;
    var total11 = 0;
    var total12 = 0;
    $("#spinner").show();
    $.ajax({
        type: "POST",
        url: "<?php echo admin_url('giftcode/giftcodemktuseajax')?>",
        data: {
            toDate: $("#toDate").val(),
            fromDate: $("#fromDate").val(),
            money: $("#money").val(),
            source: $("#nguonxuat").val(),
            filterdate: $("#filterdate").val()
        },
        dataType: 'json',
        success: function (result1) {
            $("#spinner").hide();
            $("#resultsearch").html("");
            var ii = 2;
            $.each(result1.trans[1].trans, function (index, value) {
                ii++;
            });
            var jj = 2;
            $.each(result1.trans[3].trans, function (index, value) {
                jj++;
            });
            var kk = 2;
            $.each(result1.trans[5].trans, function (index, value) {
                kk++;
            });
            result += "<tr>";
            result += "<td colspan='1'></td>";
            result += "<td style='color: #000000;font-size: 20px;text-align: right;font-weight: 600'>" + "Mệnhgiá" + "</td>";
            result += "<td style='color: #000000;font-size: 20px;text-align: right;font-weight: 600'>" + "Số lượng" + "</td>";
            result += "<td style='color: #000000;font-size: 20px;text-align: right;font-weight: 600'>" + "Đã dùng" + "</td>";
            result += "<td style='color: #000000;font-size: 20px;text-align: right;font-weight: 600'>" + "Tổng tiền đã dùng" + "</td>";
            result += "<td style='color: #000000;font-size: 20px;text-align: right;font-weight: 600'>" + "Đã khóa" + "</td>";
            result += "<td style='color: #000000;font-size: 20px;text-align: right;font-weight: 600'>" + "Còn lại" + "</td>";
            result += "</tr>";
            result += "<tr>";
            result += "<td rowspan='"+ii+"' style='vertical-align: middle;color:#0000ff;text-align: center;background: #e8e2e2;font-weight: 700; font-size: 20px'>" + "Đại lý" + "</td>";
            result += "</tr>";
            for( var i = result1.trans[1].trans.length - 1; i >=0 ;i-- ){
                result += resultgiftcode(result1.trans[1].trans[i].faceValue, result1.trans[1].trans[i].quantity, result1.trans[1].trans[i].used,result1.trans[1].trans[i].lock);
                total1 += result1.trans[1].trans[i].quantity;
                total2 += result1.trans[1].trans[i].used;
                total3 += result1.trans[1].trans[i].lock;
                total10 +=  result1.trans[1].trans[i].used*result1.trans[1].trans[i].faceValue
            }
            result += sumresult(total1,total2,total3,total10);
            result += "<tr>";
            result += "<td colspan='7' style='height: 50px'></td>";
            result += "</tr>";
            result += "<tr>";
            result += "<td rowspan='"+jj+"' style='vertical-align: middle;color:#0000ff;text-align: center;background: #e8e2e2;font-weight: 700; font-size: 20px'>" + "Marketing" + "</td>";
            result += "</tr>";
            for( var j = result1.trans[3].trans.length - 1; j >=0 ;j-- ){
                result += resultgiftcode(result1.trans[3].trans[j].faceValue, result1.trans[3].trans[j].quantity, result1.trans[3].trans[j].used,result1.trans[3].trans[j].lock);
                total4 += result1.trans[3].trans[j].quantity;
                total5 += result1.trans[3].trans[j].used;
                total6 += result1.trans[3].trans[j].lock;
                total11 +=  result1.trans[3].trans[j].used*result1.trans[3].trans[j].faceValue

            }
            result += sumresult(total4,total5,total6,total11);
            result += "<tr>";
            result += "<td colspan='7' style='height: 50px'></td>";
            result += "</tr>";
            result += "<tr>";
            result += "<td rowspan='"+kk+"' style='vertical-align: middle;color:#0000ff;text-align: center;background: #e8e2e2;font-weight: 700; font-size: 20px'>" + "Vận hành" + "</td>";
            result += "</tr>";
            for( var k = result1.trans[5].trans.length - 1; k >=0 ;k-- ){
                result += resultgiftcode(result1.trans[5].trans[k].faceValue, result1.trans[5].trans[k].quantity, result1.trans[5].trans[k].used,result1.trans[5].trans[k].lock);
                total7 += result1.trans[5].trans[k].quantity;
                total8 += result1.trans[5].trans[k].used;
                total9 += result1.trans[5].trans[k].lock;
                total12 +=  result1.trans[5].trans[k].used*result1.trans[5].trans[k].faceValue
            }

            result += sumresult(total7,total8,total9,total12);
            result += "<tr>";
            result += "<td colspan='7' style='height: 50px'></td>";
            result += "</tr>";
            result += sumresulttong(total1+total4+total7, total2+total5+total8,total3+total6+total9,total10+total11+total12);
            $('#reportvt').html(result);
        }, error: function () {
            $("#spinner").hide();
            $("#resultsearch").html("Hệ thống quá tải.Vui lòng thử lại");
            $('#reportvt').html("");
        }, timeout: timeOutApi
    });
}
function giftcodevin(){
    var result = "";
    var total1 = 0;
    var total2 = 0;
    var total3 = 0;
    var total4 = 0;
    var total5 = 0;
    var total6 = 0;
    var total7 = 0;
    var total8 = 0;
    var total9 = 0;
    var total10 = 0;
    var total11 = 0;
    var total12 = 0;
    $("#spinner").show();
    $.ajax({
        type: "POST",
        url: "<?php echo admin_url('giftcode/giftcodemktuseajax')?>",
        data: {
            toDate: $("#toDate").val(),
            fromDate: $("#fromDate").val(),
            money: $("#money").val(),
            source: $("#nguonxuat").val(),
            filterdate: $("#filterdate").val()
        },
        dataType: 'json',
        success: function (result1) {
            $("#spinner").hide();
            $("#resultsearch").html("");
            var ii = 2;
            $.each(result1.trans[0].trans, function (index, value) {
                ii++;
            });
            var jj = 2;
            $.each(result1.trans[2].trans, function (index, value) {
                jj++;
            });
            var kk = 2;
            $.each(result1.trans[4].trans, function (index, value) {
                kk++;
            });
            result += "<tr>";
            result += "<td colspan='1'></td>";
            result += "<td style='color: #000000;font-size: 20px;text-align: right;font-weight: 600'>" + "Mệnhgiá" + "</td>";
            result += "<td style='color: #000000;font-size: 20px;text-align: right;font-weight: 600'>" + "Số lượng" + "</td>";
            result += "<td style='color: #000000;font-size: 20px;text-align: right;font-weight: 600'>" + "Đã dùng" + "</td>";
            result += "<td style='color: #000000;font-size: 20px;text-align: right;font-weight: 600'>" + "Tổng tiền đã dùng" + "</td>";
            result += "<td style='color: #000000;font-size: 20px;text-align: right;font-weight: 600'>" + "Đã khóa" + "</td>";
            result += "<td style='color: #000000;font-size: 20px;text-align: right;font-weight: 600'>" + "Còn lại" + "</td>";
            result += "</tr>";
            result += "<tr>";
            result += "<td rowspan='"+ii+"' style='vertical-align: middle;color:#0000ff;text-align: center;background: #e8e2e2;font-weight: 700; font-size: 20px'>" + "Đại lý" + "</td>";
            result += "</tr>";
            for( var i = result1.trans[0].trans.length - 1; i >=0 ;i-- ){
                result += resultgiftcode(result1.trans[0].trans[i].faceValue, result1.trans[0].trans[i].quantity, result1.trans[0].trans[i].used,result1.trans[0].trans[i].lock);
                total1 += result1.trans[0].trans[i].quantity;
                total2 += result1.trans[0].trans[i].used;
                total3 += result1.trans[0].trans[i].lock;
                total10 +=  result1.trans[0].trans[i].used*result1.trans[0].trans[i].faceValue
            }
            result += sumresult(total1,total2,total3,total10);
            result += "<tr>";
            result += "<td colspan='7' style='height: 50px'></td>";
            result += "</tr>";
            result += "<tr>";
            result += "<td rowspan='"+jj+"' style='vertical-align: middle;color:#0000ff;text-align: center;background: #e8e2e2;font-weight: 700; font-size: 20px'>" + "Marketing" + "</td>";
            result += "</tr>";
            for( var j = result1.trans[2].trans.length - 1; j >=0 ;j-- ){
                result += resultgiftcode(result1.trans[2].trans[j].faceValue, result1.trans[2].trans[j].quantity, result1.trans[2].trans[j].used,result1.trans[2].trans[j].lock);
                total4 += result1.trans[2].trans[j].quantity;
                total5 += result1.trans[2].trans[j].used;
                total6 += result1.trans[2].trans[j].lock;
                total11 +=  result1.trans[2].trans[j].used*result1.trans[2].trans[j].faceValue

            }
            result += sumresult(total4,total5,total6,total11);
            result += "<tr>";
            result += "<td colspan='7' style='height: 50px'></td>";
            result += "</tr>";
            result += "<tr>";
            result += "<td rowspan='"+kk+"' style='vertical-align: middle;color:#0000ff;text-align: center;background: #e8e2e2;font-weight: 700; font-size: 20px'>" + "Vận hành" + "</td>";
            result += "</tr>";
            for( var k = result1.trans[4].trans.length - 1; k >=0 ;k-- ){
                result += resultgiftcode(result1.trans[4].trans[k].faceValue, result1.trans[4].trans[k].quantity, result1.trans[4].trans[k].used,result1.trans[4].trans[k].lock);
                total7 += result1.trans[4].trans[k].quantity;
                total8 += result1.trans[4].trans[k].used;
                total9 += result1.trans[4].trans[k].lock;
                total12 +=  result1.trans[4].trans[k].used*result1.trans[4].trans[k].faceValue
            }

            result += sumresult(total7,total8,total9,total12);
            result += "<tr>";
            result += "<td colspan='7' style='height: 50px'></td>";
            result += "</tr>";
            result += sumresulttong(total1+total4+total7, total2+total5+total8,total3+total6+total9,total10+total11+total12);
            $('#reportvt').html(result);
        }, error: function () {
            $("#spinner").hide();
            $("#resultsearch").html("Hệ thống quá tải.Vui lòng thử lại");
            $('#reportvt').html("");
        }, timeout: timeOutApi
    });

}

$('#money').change(function () {
    var val = $("#money option:selected").val();
    if (val == 1) {
        $("#labelvin").css("display", "block");
        $("#menhgiavin").css("display", "block");
        $("#menhgiaxu").css("display", "none");
    } else if (val == 0) {
        $("#menhgiaxu").css("display", "block");
        $("#labelvin").css("display", "block");
        $("#menhgiavin").css("display", "none");
    }
});
function sumresult(quantity,use,lock,money){
    var rs = "";
    rs += "<tr>";

    rs += "<td style='color: #0000ff;font-size: 20px;font-weight:700;text-align: right'>" + "Tổng" + "</td>";
    rs += "<td style='color: blue;font-size: 20px;font-weight:700;text-align: right;'>" + commaSeparateNumber(quantity) + "</td>";
    rs += "<td style='color: blue;font-size: 20px;font-weight:700;text-align: right'>" + commaSeparateNumber(use) + "</td>";
    rs += "<td style='color: blue;font-size: 20px;font-weight:700;text-align: right'>" + commaSeparateNumber(money) + "</td>";
    rs += "<td style='color: blue;font-size: 20px;font-weight:700;text-align: right'>" + commaSeparateNumber(lock) + "</td>";
    rs += "<td style='color: blue;font-size: 20px;font-weight:700;text-align: right'>" + commaSeparateNumber(quantity-use-lock) + "</td>";
    rs += "</tr>";

    return rs;
}
function sumresulttong(quantity,use,lock,money){
    var rs = "";
    rs += "<tr>";

    rs += "<td colspan='2' style='color: #0000ff;font-size: 20px;font-weight:700;text-align: right'>" + "Tổng" + "</td>";
    rs += "<td style='color: blue;font-size: 20px;font-weight:700;text-align: right;'>" + commaSeparateNumber(quantity) + "</td>";
    rs += "<td style='color: blue;font-size: 20px;font-weight:700;text-align: right'>" + commaSeparateNumber(use) + "</td>";
    rs += "<td style='color: blue;font-size: 20px;font-weight:700;text-align: right'>" + commaSeparateNumber(money) + "</td>";
    rs += "<td style='color: blue;font-size: 20px;font-weight:700;text-align: right'>" + commaSeparateNumber(lock) + "</td>";
    rs += "<td style='color: blue;font-size: 20px;font-weight:700;text-align: right'>" + commaSeparateNumber(quantity-use-lock) + "</td>";
    rs += "</tr>";

    return rs;
}
function resultgiftcode(value,quantity,use,lock) {
    var rs = "";
    rs += "<tr>";
    rs += "<td  class='tdmoney'>" + commaSeparateNumber(value) + "</td>";
    rs += "<td class='tdmoney'>" + commaSeparateNumber(quantity) + "</td>";
    rs += "<td class='tdmoney'>" + commaSeparateNumber(use) + "</td>";
    rs += "<td class='tdmoney'>" + commaSeparateNumber(use*value) + "</td>";
    rs += "<td class='tdmoney'>" + commaSeparateNumber(lock) + "</td>";
    rs += "<td class='tdmoney'>" + commaSeparateNumber(quantity-use-lock) + "</td>";
    rs += "</tr>";

    return rs;
}
function commaSeparateNumber(val) {
    while (/(\d+)(\d{3})/.test(val.toString())) {
        val = val.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
    }
    return val;
}
function getFirtDayOfMonth() {
    var date = new Date();
    var thangtruoc = '';
    var ngaytruoc = '';
    var firstDay = new Date(date.getFullYear(), date.getMonth(), 1);
    if (firstDay.getMonth() < 10) {
        thangtruoc = "0" + (firstDay.getMonth() + 1);
    }
    else {
        thangtruoc = firstDay.getMonth() + 1;
    }
    if (firstDay.getDate() < 10) {
        ngaytruoc = "0" + firstDay.getDate();
    }
    else {
        ngaytruoc = firstDay.getDate();
    }
    return firstDay.getFullYear() + '-' + (thangtruoc) + '-' + (ngaytruoc) + " " + "00:00:00";
}

function getLastDayOfMonth() {
    var date = new Date();
    var thangsau = '';
    var ngaysau = '';
    var lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0);
    if (lastDay.getMonth() < 10) {
        thangsau = "0" + (lastDay.getMonth() + 1);
    }
    else {
        thangsau = lastDay.getMonth() + 1;
    }
    if (lastDay.getDate() < 10) {
        ngaysau = "0" + lastDay.getDate();
    }
    else {
        ngaysau = lastDay.getDate();
    }
    return lastDay.getFullYear() + '-' + (thangsau) + '-' + (ngaysau) + " " + "23:59:59";
}
</script>
