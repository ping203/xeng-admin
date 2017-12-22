<!-- head -->
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Thêm mới utm campain
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
                                            <label for="exampleInputEmail1">Tên utm_campain request:</label>
                                        </div>
                                        <div class="col-md-3 col-sm-4 col-xs-12">
                                            <input type="text" class="form-control" id="param_recampain" value="" name="recampain">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-1 col-sm-2 col-xs-12">
                                            <label for="exampleInputEmail1">Tên utm_campain hiển thị:</label>
                                        </div>
                                        <div class="col-md-3 col-sm-4 col-xs-12">
                                            <input type="text" class="form-control" id="param_discampain" value="" name="discampain">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-1 col-sm-2 col-xs-12">
                                        </div>
                                        <div class="col-md-1 col-sm-2 col-xs-12">
                                            <input type="button" id="addcampain" class="btn btn-success" value="Thêm mới">
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
                                        <p style="color: #0000ff">Bạn thêm campain thành công</p>
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
    $("#addcampain").click(function () {

        if ($("#param_recampain").val() == "") {
            $("#error-status").html("Bạn chưa nhập tên campain");
            return false;
        }
        if ($("#param_discampain").val() == "") {
            $("#error-status").html("Bạn chưa nhập tên displaycampain");
            return false;
        }

        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('marketing/addcampainajax')?>",
            data: {
                name: $("#param_recampain").val(),
                displayname: $("#param_discampain").val()
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
        window.location.href = "<?php echo admin_url('marketing/campain') ?>";
    });

</script>
