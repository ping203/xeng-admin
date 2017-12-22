<div class="content-wrapper">
    <?php if ($admin_info->Status == "A" || $admin_info->Status == "C"): ?>
        <section class="content-header">
            <h1>
                Sửa config <span style="color: #0000FF"><?php echo $plat ?></span>
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-body">
                        <input type="hidden" id="configpf" value="<?php echo $plat ?>">
                        <input type="hidden" id="nmconfig" value="<?php echo $namecf ?>">
                        <input type="hidden" id="idconfig" value="<?php echo $id ?>">
                        <label id="resultsearch" style="color: red;"></label>

                        <div class="box-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-1 col-sm-1 col-xs-12">
                                        <label>Tên config:</label>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12">
                                        <input type="text" class="form-control" id="txtnameconfig">
                                    </div>
                                    <div class="col-md-1 col-sm-1 col-xs-12">
                                        <label>Version config:</label>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12">
                                        <input type="text" class="form-control" id="txtversionconfig">
                                    </div>
                                    <div class="col-md-1 col-sm-1 col-xs-12">
                                        <label>Platform config:</label>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12">
                                        <select id="txtplatform" disabled="true" class="form-control">
                                            <option value="ios">Ios</option>
                                            <option value="ad">Android</option>
                                            <option value="web">Web</option>
                                            <option value="wp">WP</option>
                                            <option value="common">Common</option>
                                            <option value="otp">Otp</option>
                                            <option value="dvt">Dvt</option>
                                            <option value="brandname">Brandname</option>
                                            <option value="billing">Billing</option>
                                            <option value="other">Other</option>
                                            <option value="game_bai">Game Bài</option>
                                            <option value="i2b">I2b</option>
                                            <option value="nganluong">Ngân Lượng</option>
                                            <option value="admin">Admin</option>
                                            <option value="vippoint_event">Vippoint Event</option>
                                            <option value="vin_plus"><?php echo $namegame ?> Plus</option>
                                            <option value="lucky_vip">Lucky Vip</option>
                                            <option value="agent">Agent</option>
                                            <option value="sms_plus">Sms Plus</option>
                                        </select>
                                    </div>
                                    <div class="col-md-1 col-sm-1 col-xs-12">
                                        <input type="button" id="search_tran" value="Sửa config" class="btn btn-success">
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea id="myTextArea" cols=100 rows=30
                                                  style="color: #0000ff;font-size: 20px"></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="box-body  table-responsive no-padding">
                            <?php $this->load->view('admin/message', $this->data); ?>
                            <?php $this->load->view('admin/error', $this->data); ?>
                            <div class="modal fade" id="bsModal3" tabindex="-1" role="dialog"
                                 aria-labelledby="mySmallModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        </div>
                                        <div class="modal-body">
                                            <p style="color: #0000ff">Bạn sửa config thành công</p>
                                        </div>
                                        <div class="modal-footer">
                                            <input class="blueB logMeIn" type="button" value="Đóng" data-dismiss="modal"
                                                   aria-hidden="true">
                                        </div>
                                    </div>
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
    <?php else: ?>
        <section class="content-header">
            <h1>
                Bạn không được phân quyền
            </h1>
        </section>
    <?php endif; ?>
</div>
<script>

    $("#search_tran").click(function () {

        var data = $("#myTextArea").val();

        var myJSONString = data.replace(/\n/g, ' ').replace(/\t/g, ' ').replace(/  +/g, "");
        if (isValidJSON(myJSONString) == false) {
            $("#resultsearch").html("Không phải dữ liệu json");
            return false;

        }
        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('confignew/successeditajax')?>",
            data: {
                idconfig: $("#idconfig").val(),
                valueconfig: myJSONString,
                versionconfig: $("#txtversionconfig").val(),
                configpf: $("#configpf").val()
            }, dataType: 'json',
            success: function (result) {
                $("#spinner").hide();
                console.log(result);
                $("#resultsearch").html("");
                if (result.errorCode == 0) {

                    $.ajax({
                        type: "POST",
                        url: "<?php echo admin_url('confignew/configajax')?>",
                        data: {}, dataType: 'json'
                    });
                    $("#bsModal3").modal("show");
                } else {
                    $("#resultsearch").html("Bạn cập nhật dữ liệu không thành công !!")
                }

            }, error: function (xhr) {
                window.location = '<?php echo admin_url('login') ?>';
            }

        });

    });
    $('#bsModal3').on('hidden.bs.modal', function () {
        location.reload();
    });
    $(document).ready(function () {
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('confignew/editajax')?>",
            data: {
                configpf: $("#configpf").val(),
                nmconfig: $("#nmconfig").val()
            },
            dataType: 'json',
            success: function (result) {

                $("#txtnameconfig").val(result.gameconfig[0].name);
                $("#txtversionconfig").val(result.gameconfig[0].version);
                $("#txtplatform").val(result.gameconfig[0].platform);
                obj = JSON.parse(result.gameconfig[0].value);
                var str = JSON.stringify(obj, undefined, 40);
                document.getElementById('myTextArea').innerHTML = str;
            }
        })
    });

    function isValidJSON(string) {
        try {
            JSON.parse(string);
        } catch (e) {
            return false;
        }

        return true;
    }
</script>