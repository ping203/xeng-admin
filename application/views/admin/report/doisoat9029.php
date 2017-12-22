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
                Đối soát 9029

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
                                            <input type='text' value="<?php echo $start_time ?>" class="form-control"
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
                                            <input type='text' value="<?php echo $end_time ?>" class="form-control"
                                                   id="fromDate" name="fromDate"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                                        </div>
                                    </div>
                                    <div class="col-md-1 col-sm-2 col-xs-12">
                                        <input type="button" id="search_tran" value="Tìm kiếm" class="btn btn-success">
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
                                    <table id="checkAll" class="table table-bordered">
                                        <tbody id="reportvmg">
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
    td {
        word-break: break-all;
    }

    thead {
        font-size: 12px;
    }

    .moneysystem {
        font-weight: 600;

        color: #000000;
    }

    .tdmoney {

        text-align: right;
    }
    .tdmoneybold {
        font-weight: 600;
        text-align: right;
    }
}</style>

<script>
    $(function () {
        $('#datetimepicker1').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss'
        });
        $('#datetimepicker2').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss'
        });

    });


    $(document).ready(function () {
        $("#resultsearch").html("Vui lòng ấn nút tìm kiếm");
    });

    $("#search_tran").click(function () {
        var result = "";
        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('report/doisoat9029ajax')?>",
            data: {

                toDate: $("#toDate").val(),
                fromDate: $("#fromDate").val()

            },

            dataType: 'json',
            success: function (result1) {
				$("#resultsearch").html("");
                $("#spinner").hide();

                result += "<tr>";
                result += '<td rowspan="2" style="vertical-align: middle;" class="moneysystem">'+""+'</td>';
                result += '<td colspan="3" class="moneysystem">'+"Viettel"+'</td>';
                result += '<td colspan="3" class="moneysystem">'+"Mobifone"+'</td>';
                result += '<td colspan="3" class="moneysystem">'+"Vinaphone"+'</td>';
                result += "</tr>";
                result += "<tr>";
                result += "<td class='moneysystem' >"+'Đơn giá'+"</td>";
                result += "<td class='moneysystem' >"+'Số lượng'+"</td>";
                result += "<td class='moneysystem' >"+'Tổng tiền'+"</td>";
                result += "<td class='moneysystem' >"+'Đơn giá'+"</td>";
                result += "<td class='moneysystem' >"+'Số lượng'+"</td>";
                result += "<td class='moneysystem' >"+'Tổng tiền'+"</td>";
                result += "<td class='moneysystem' >"+'Đơn giá'+"</td>";
                result += "<td class='moneysystem' >"+'Số lượng'+"</td>";
                result += "<td class='moneysystem' >"+'Tổng tiền'+"</td>";
                result += "</tr>";
                var total1 = 0;
                var total2 = 0;
                var total3 = 0;
                var total4 = 0;
                var total5 = 0;
                var total6 = 0;
                var i=0;
                for( var j = result1.moneyReponse[1].trans.length - 1; j >=0 ;j-- ){
                    result += resultviettel(result1.moneyReponse[1].trans[j].faceValue,result1.moneyReponse[1].trans[j].quantity,result1.moneyReponse[3].trans[j].faceValue,result1.moneyReponse[3].trans[j].quantity,result1.moneyReponse[2].trans[j].faceValue,result1.moneyReponse[2].trans[j].quantity);
                    total1 += dongiaviettel(result1.moneyReponse[1].trans[j].faceValue)*result1.moneyReponse[1].trans[j].quantity ;
                    total2 += dongiavinamobi(result1.moneyReponse[3].trans[j].faceValue)*result1.moneyReponse[3].trans[j].quantity ;
                    total3 += dongiavinamobi(result1.moneyReponse[2].trans[j].faceValue)*result1.moneyReponse[2].trans[j].quantity ;
                    total4 += result1.moneyReponse[1].trans[j].quantity;
                    total5 += result1.moneyReponse[3].trans[j].quantity;
                    total6 += result1.moneyReponse[2].trans[j].quantity;
                    i++;
                }
                result += resultsum(total1,total2,total3,total4,total5,total6);
                $('#reportvmg').html(result);
            }, error: function () {
            $('#reportvmg').html("");
           errorThongBao();
        }, timeout: timeOutApi
        })
    });


    function resultviettel(menhgia1,soluong1,menhgia2,soluong2,menhgia3,soluong3) {
        var rs = "";
        rs += "<tr>";
        rs += "<td class='tdmoney'>"+ commaSeparateNumber(menhgia1) +"</td>";
        rs += "<td class='tdmoney'>"+ commaSeparateNumber(dongiaviettel(menhgia1)) +"</td>";
        rs += "<td class='tdmoney'>"+ commaSeparateNumber(soluong1) +"</td>";
        rs += "<td class='tdmoney'>"+ commaSeparateNumber(dongiaviettel(menhgia1)*soluong1) +"</td>";
        rs += "<td class='tdmoney'>"+ commaSeparateNumber(dongiavinamobi(menhgia2)) +"</td>";
        rs += "<td class='tdmoney'>"+ commaSeparateNumber(soluong2) +"</td>";
        rs += "<td class='tdmoney'>"+ commaSeparateNumber(dongiavinamobi(menhgia2)*soluong2) +"</td>";
        rs += "<td class='tdmoney'>"+ commaSeparateNumber(dongiavinamobi(menhgia3)) +"</td>";
        rs += "<td class='tdmoney'>"+ commaSeparateNumber(soluong3) +"</td>";
        rs += "<td class='tdmoney'>"+ commaSeparateNumber(dongiavinamobi(menhgia3)*soluong3) +"</td>";

        rs += "</tr>";

        return rs;
    }
    function dongiaviettel(dongia){
        var strresult = 0;
        if (dongia == 100000) {
            strresult = 60000;
        } else if (dongia == 50000) {
            strresult = 30000;
        }
        else if (dongia == 30000) {
            strresult = 18000;
        }
        else if (dongia == 20000) {
            strresult = 12000;
        }
        else if (dongia == 15000) {
            strresult = 9000;
        }
        else if (dongia == 10000) {
            strresult = 6000;
        }
        else if (dongia == 5000) {
            strresult = 3000;
        }
        else if (dongia == 4000) {
            strresult = 2400;
        }
        else if (dongia == 3000) {
            strresult = 1800;
        }
        else if (dongia == 2000) {
            strresult = 1200;
        }
        else if (dongia == 1000) {
            strresult = 600;
        }

        return strresult;

    }
    function dongiavinamobi(dongia){
        var strresult = 0;
        if (dongia == 100000) {
            strresult = 65000;
        } else if (dongia == 50000) {
            strresult = 32500;
        }
        else if (dongia == 30000) {
            strresult = 19500;
        }
        else if (dongia == 20000) {
            strresult = 13000;
        }
        else if (dongia == 15000) {
            strresult = 9750;
        }
        else if (dongia == 10000) {
            strresult = 6500;
        }
        else if (dongia == 5000) {
            strresult = 3250;
        }
        else if (dongia == 4000) {
            strresult = 2600;
        }
        else if (dongia == 3000) {
            strresult = 1950;
        }
        else if (dongia == 2000) {
            strresult = 1300;
        }
        else if (dongia == 1000) {
            strresult = 650;
        }

        return strresult;

    }

    function resultsum(money1,money2,money3,quantity1,quantity2,quantity3) {
        var rs = "";
        rs += "<tr>";
        rs += "<td colspan='3' class='tdmoneybold'>"+ commaSeparateNumber(quantity1) +"</td>";
        rs += "<td  class='tdmoneybold'>"+ commaSeparateNumber(money1) +"</td>";
        rs += "<td colspan='2' class='tdmoneybold'>"+ commaSeparateNumber(quantity2) +"</td>";
        rs += "<td  class='tdmoneybold'>"+ commaSeparateNumber(money2) +"</td>";
        rs += "<td colspan='2' class='tdmoneybold'>"+ commaSeparateNumber(quantity3) +"</td>";
        rs += "<td class='tdmoneybold'>"+ commaSeparateNumber(money3) +"</td>";
        rs += "</tr>";

        return rs;
    }



</script>


<script>
    function commaSeparateNumber(val) {
        while (/(\d+)(\d{3})/.test(val.toString())) {
            val = val.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
        }
        return val;
    }
</script>