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
                Cộng trừ xu
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
                                        <label id="errorname" style="color: red;"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-1 col-sm-2 col-xs-12">
                                        <label for="exampleInputEmail1">Nickname:</label>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-12">
                                        <input class="form-control" id="filter_iname" placeholder="Nhập nick name"
                                               type="text">
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-1 col-sm-2 col-xs-12">
                                        <label for="exampleInputEmail1">Tiền xu:</label>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-12">
                                        <input class="form-control" id="txtmoney" placeholder="Nhập số tiền xu "
                                               type="text">
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-12">
                                        <label id="numchuyen" style="color: blueviolet"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-1 col-sm-2 col-xs-12">
                                        <label for="exampleInputEmail1">Lý do:</label>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-12">
                                        <input class="form-control" id="txtreason" type="text" placeholder="Nhập lý do">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-1 col-sm-2 col-xs-12">
                                        <label for="exampleInputEmail1">Mã otp:</label>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-12">
                                        <input class="form-control" id="txtotp" type="text" placeholder="Nhập OTP">
                                    </div>

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-1 col-sm-2 col-xs-12">
                                        <label for="exampleInputEmail1">Loại OTP:</label>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-12">
                                        <select id="txttypeotp" class="form-control">
                                            <option value="0">SMS OTP</option>
                                            <option value="1">APP OTP</option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-1 col-sm-2 col-xs-12">
                                    </div>
                                    <div class="col-md-1 col-sm-2 col-xs-12">
                                        <input type="button" id="congxu" value="Công xu" class="btn btn-success">
                                    </div>
                                    <div class="col-md-1 col-sm-2 col-xs-12">
                                        <input type="button" id="truxu" value="Trừ xu" class="btn btn-success">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="box-body">
                            <?php $this->load->view('admin/message', $this->data); ?>
                            <?php $this->load->view('admin/error', $this->data); ?>

                            <div id="spinner" class="spinner" style="display:none;">
                                <img id="img-spinner" src="<?php echo public_url('admin/images/gif-load.gif') ?>"
                                     alt="Loading"/>
                            </div>
                            <div class="text-center">
                                <ul id="pagination-demo" class="pagination-sm"></ul>
                            </div>
                            <div class="modal fade" id="bsModal3" tabindex="-1" role="dialog"
                                 aria-labelledby="mySmallModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        </div>
                                        <div class="modal-body">
                                            <p style="color: #0000ff">Bạn cộng xu thành công</p>
                                        </div>
                                        <div class="modal-footer">
                                            <input class="blueB logMeIn" type="button" value="Đóng" data-dismiss="modal"
                                                   aria-hidden="true">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="bsModal4" tabindex="-1" role="dialog"
                                 aria-labelledby="mySmallModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        </div>
                                        <div class="modal-body">
                                            <p style="color: #0000ff">Bạn trừ xu thành công</p>
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
    $("#congxu").click(function () {
        if ($("#filter_iname").val() == "") {
            $("#errorname").html("Bạn chưa nhập nick name");
            return false;
        }
        if ($("#txtmoney").val() == "") {
            $("#errorname").html("Bạn chưa nhập số tiền");
            return false;
        }
        if ($("#txtmoney").val() > 50000000000) {
            $("#errorname").html("Số xu bạn chuyển không được lớn hơn 50.000.000 xu");
            return false;
        }
        if ($("#txtreason").val() == "") {
            $("#errorname").html("Bạn chưa nhập lý do");
            return false;
        }
        if ($("#txtotp").val() == "") {
            $("#errorname").html("Bạn chưa nhập OTP");
            return false;
        }


        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('usergame/congxuajax')?>",
            data: {
                nickname: $("#filter_iname").val(),
                money: $("#txtmoney").val(),
                reason: $("#txtreason").val(),
                otp: $("#txtotp").val(),
                typeotp: $("#txttypeotp").val()
            },

            dataType: 'json',
            success: function (result) {
                $("#spinner").hide();
                if (result == 1) {
                    $("#errorname").html("");
                    $("#filter_iname").val("");
                    $("#txtmoney").val("");
                    $("#txtreason").val("");
                    $("#txtotp").val("");
                    $("#numchuyen").html("");
                    $("#bsModal3").modal("show");
                } else if (result == 2) {
                    $("#errorname").html("Bạn chuyển xu thất bại");
                } else if (result == 4) {
                    $("#errorname").html("OTP sai");
                } else if (result == 5) {
                    $("#errorname").html("OTP hết hạn");
                }
                else if (result == 3) {
                    $("#errorname").html("Nick name không đủ tiền");
                }
                else if (result == 6) {
                    $("#errorname").html("Nick name không tồn tại");
                }
            }
        });
    });
    $("#truxu").click(function () {
        if ($("#filter_iname").val() == "") {
            $("#errorname").html("Bạn chưa nhập nick name");
            return false;
        }
        if ($("#txtmoney").val() == "") {
            $("#errorname").html("Bạn chưa nhập số tiền");
            return false;
        }
        if ($("#txtreason").val() == "") {
            $("#errorname").html("Bạn chưa nhập lý do");
            return false;
        }
        if ($("#txtotp").val() == "") {
            $("#errorname").html("Bạn chưa nhập OTP");
            return false;
        }


        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('usergame/truxuajax')?>",
            data: {
                nickname: $("#filter_iname").val(),
                money: -$("#txtmoney").val(),
                reason: $("#txtreason").val(),
                otp: $("#txtotp").val(),
                typeotp: $("#txttypeotp").val()
            },

            dataType: 'json',
            success: function (result) {
                $("#spinner").hide();
                if (result == 1) {
                    $("#errorname").html("");
                    $("#filter_iname").val("");
                    $("#txtmoney").val("");
                    $("#txtreason").val("");
                    $("#txtotp").val("");
                    $("#numchuyen").html("");
                    $("#bsModal4").modal("show");
                } else if (result == 2) {
                    $("#errorname").html("Bạn chuyển xu thất bại");
                } else if (result == 4) {
                    $("#errorname").html("OTP sai");
                } else if (result == 5) {
                    $("#errorname").html("OTP hết hạn");
                }
                else if (result == 3) {
                    $("#errorname").html("Nick name không đủ tiền");
                }
                else if (result == 6) {
                    $("#errorname").html("Nick name không tồn tại");
                }
            }
        });
    });
    $(document).ready(function () {
        $("#txtmoney").keydown(function (e) {
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
    var format = function (num) {
        var str = num.toString().replace("", ""), parts = false, output = [], i = 1, formatted = null;
        if (str.indexOf(".") > 0) {
            parts = str.split(".");
            str = parts[0];
        }
        str = str.split("").reverse();
        for (var j = 0, len = str.length; j < len; j++) {
            if (str[j] != ",") {
                output.push(str[j]);
                if (i % 3 == 0 && j < (len - 1)) {
                    output.push(",");
                }
                i++;
            }
        }
        formatted = output.reverse().join("");
        return (formatted + ((parts) ? "." + parts[1].substr(0, 2) : ""));
    };
    $("#txtmoney").keyup(function (e) {
        $(this).val(($(this).val()));
        $("#numchuyen").text(format($(this).val()));

    });
</script>
