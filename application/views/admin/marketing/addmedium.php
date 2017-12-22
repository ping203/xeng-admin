<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Thêm mới utm medium
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-body">

                    <label id="resultsearch" style="color: red;"></label>

                    <div class="box-body">
                        <form id="form" class="form" enctype="multipart/form-data" method="post" action="">
                            <fieldset>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <label id="error-status" style="color: red">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-1 col-sm-2 col-xs-12">
                                            <label for="exampleInputEmail1">Tên utm_medium request:</label>
                                        </div>
                                        <div class="col-md-3 col-sm-4 col-xs-12">
                                            <input type="text" class="form-control" id="param_remedium" value="" name="remedium">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-1 col-sm-2 col-xs-12">
                                            <label for="exampleInputEmail1">Tên utm_medium  hiển thị:</label>
                                        </div>
                                        <div class="col-md-3 col-sm-4 col-xs-12">
                                            <input type="text" class="form-control" id="param_dismedium" value="" name="dismedium">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-1 col-sm-2 col-xs-12">
                                        </div>
                                        <div class="col-md-1 col-sm-2 col-xs-12">
                                            <input type="button" id="addmedium" class="btn btn-success" value="Thêm mới">
                                        </div>
                                    </div>
                                </div>

                            </fieldset>
                        </form>
                        <div class="modal fade" id="bsModal3" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    </div>
                                    <div class="modal-body">
                                        <p style="color: #0000ff">Bạn thêm medium thành công</p>
                                    </div>
                                    <div class="modal-footer">
                                        <input class="blueB logMeIn" type="button" value="Đóng" data-dismiss="modal" aria-hidden="true">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>
</div>

<script>
    $("#addmedium").click(function () {

        if ($("#param_remedium").val() == "") {
            $("#error-status").html("Bạn chưa nhập tên medium");
            return false;
        }
        if ($("#param_dismedium").val() == "") {
            $("#error-status").html("Bạn chưa nhập tên displaymedium");
            return false;
        }

        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('marketing/addmediumajax')?>",
            data: {
                name: $("#param_remedium").val(),
                displayname: $("#param_dismedium").val()
            },

            dataType: 'json',
            success: function (result) {
                $("#spinner").hide();
                if (result == 0) {
                    $("#error-status").html("Thêm mới không thành công");
                } else {
                    $("#error-status").html("");
                    $("#bsModal3").modal("show");
                }

            }, error: function () {
                $("#spinner").hide();
                $("#error-status").html("Hệ thống quá tải. Vui lòng gọi 19008698 hoặc F5 lại pages");
            }, timeout: timeOutApi
        })

    });

    $('#bsModal3').on('hidden.bs.modal', function () {
        window.location.href = "<?php echo admin_url('marketing/medium') ?>";
    });

</script>