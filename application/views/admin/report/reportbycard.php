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
            Xuất thẻ nạp
        </h1>
    </section>
    <section class="content">
    <div class="row">
    <div class="col-xs-12">
    <div class="box box-body">

    <label id="resultsearch" style="color: red;"></label>
    <?php if (isset($message) && $message): ?>
        <input type="hidden" id="errorinput" value="<?php echo $message ?>">
    <?php endif; ?>
    <div class="box-body">

    <form action="<?php echo admin_url('report/exportbycard') ?>" method="post">
    <?php if ($this->input->post('ok')): ?>
        <?php echo $error; ?>
    <?php endif; ?>
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
        </div>

    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-md-1 col-sm-2 col-xs-12">
                <label for="exampleInputEmail1">Loại thẻ:</label>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12">
                <select id="select_provider" name="select_provider" class="form-control">
                    <option value="">Chọn</option>
                    <option
                        value="Viettel" <?php if ($this->input->post('select_provider') == "Viettel") {
                        echo "selected";
                    } ?>>Viettel
                    </option>
                    <option
                        value="Mobifone" <?php if ($this->input->post('select_provider') == "Mobifone") {
                        echo "selected";
                    } ?>>Mobifone
                    </option>
                    <option
                        value="Vinaphone" <?php if ($this->input->post('select_provider') == "Vinaphone") {
                        echo "selected";
                    } ?>>Vinaphone
                    </option>
                    <option value="Zing" <?php if ($this->input->post('select_provider') == "Zing") {
                        echo "selected";
                    } ?>>Zing
                    </option>
                    <option value="Vcoin" <?php if ($this->input->post('select_provider') == "Vcoin") {
                        echo "selected";
                    } ?>>Vcoin
                    </option>
                    <option value="Gate" <?php if ($this->input->post('select_provider') == "Gate") {
                        echo "selected";
                    } ?>>Gate
                    </option>
                    <option
                        value="VietNamMobile" <?php if ($this->input->post('select_provider') == "VietNamMobile") {
                        echo "selected";
                    } ?>>VietNamMobile
                    </option>
                </select>
            </div>
            <div class="col-md-1 col-sm-2 col-xs-12">
                <label for="exampleInputEmail1">Trạng thái:</label>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12">
                <select id="select_status" name="select_status" class="form-control">
                    <option value="">Chọn</option>
                    <option value="0" <?php if ($this->input->post('select_status') == "0") {
                        echo "selected";
                    } ?>>Thành công
                    </option>
                    <option value="1" <?php if ($this->input->post('select_status') == "1") {
                        echo "selected";
                    } ?>>Thất bại
                    </option>
                    <option value="30" <?php if ($this->input->post('select_status') == "30") {
                        echo "selected";
                    } ?>>Đang xử lý
                    </option>
                    <option value="31" <?php if ($this->input->post('select_status') == "31") {
                        echo "selected";
                    } ?>>Thẻ đã nạp trước đó
                    </option>
                    <option value="32" <?php if ($this->input->post('select_status') == "32") {
                        echo "selected";
                    } ?>>Thẻ bị khóa
                    </option>
                    <option value="33" <?php if ($this->input->post('select_status') == "33") {
                        echo "selected";
                    } ?>>Thẻ chưa kích hoạt
                    </option>
                    <option value="34" <?php if ($this->input->post('select_status') == "34") {
                        echo "selected";
                    } ?>>Thẻ hết hạn
                    </option>
                    <option value="35" <?php if ($this->input->post('select_status') == "35") {
                        echo "selected";
                    } ?>>Sai mã thẻ
                    </option>
                    <option value="36" <?php if ($this->input->post('select_status') == "36") {
                        echo "selected";
                    } ?>>Mã serial không đúng
                    </option>
                </select>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-md-1 col-sm-2 col-xs-12">
                <label for="exampleInputEmail1">Mệnh giá:</label>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12">
                <select id="select_menhgia" name="select_menhgia" class="form-control">
                    <option value="">Chọn</option>
                    <option value="10000" <?php if ($this->input->post('select_menhgia') == "10000") {
                        echo "selected";
                    } ?>>10,000
                    </option>
                    <option value="20000" <?php if ($this->input->post('select_menhgia') == "20000") {
                        echo "selected";
                    } ?>>20,000
                    </option>
                    <option value="30000" <?php if ($this->input->post('select_menhgia') == "30000") {
                        echo "selected";
                    } ?>>30,000
                    </option>
                    <option value="50000" <?php if ($this->input->post('select_menhgia') == "50000") {
                        echo "selected";
                    } ?>>50,000
                    </option>
                    <option value="100000" <?php if ($this->input->post('select_menhgia') == "100000") {
                        echo "selected";
                    } ?>>100,000
                    </option>
                    <option value="200000" <?php if ($this->input->post('select_menhgia') == "200000") {
                        echo "selected";
                    } ?>>200,000
                    </option>
                    <option value="300000" <?php if ($this->input->post('select_menhgia') == "300000") {
                        echo "selected";
                    } ?>>300,000
                    </option>
                    <option value="500000" <?php if ($this->input->post('select_menhgia') == "500000") {
                        echo "selected";
                    } ?>>500,000
                    </option>
                    <option value="1000000" <?php if ($this->input->post('select_menhgia') == "1000000") {
                        echo "selected";
                    } ?>>1,000,000
                    </option>
                    <option value="2000000" <?php if ($this->input->post('select_menhgia') == "2000000") {
                        echo "selected";
                    } ?>>2,000,000
                    </option>
                    <option value="5000000" <?php if ($this->input->post('select_menhgia') == "5000000") {
                        echo "selected";
                    } ?>>5,000,000
                    </option>
                    <option value="10000000" <?php if ($this->input->post('select_menhgia') == "10000000") {
                        echo "selected";
                    } ?>>10,000,000
                    </option>
                    <option value="20000000" <?php if ($this->input->post('select_menhgia') == "20000000") {
                        echo "selected";
                    } ?>>20,000,000
                    </option>
                </select>
            </div>
            <div class="col-md-1 col-sm-2 col-xs-12">
                <label for="exampleInputEmail1">Tên bảng:</label>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12">
                <select id="select_table" name="select_table" class="form-control">

                    <option value="1" <?php if ($this->input->post('select_table') == "1") {
                        echo "selected";
                    } ?>>dvt_recharge_by_card
                    </option>
                    <option value="2" <?php if ($this->input->post('select_table') == "2") {
                        echo "selected";
                    } ?>>dvt_recharge_by_sms
                    </option>
                    <option value="3" <?php if ($this->input->post('select_table') == "3") {
                        echo "selected";
                    } ?>>dvt_recharge_by_sms_plus
                    </option>
                    <option value="4" <?php if ($this->input->post('select_table') == "4") {
                        echo "selected";
                    } ?>>dvt_cash_out_by_card
                    </option>
                    <option value="5" <?php if ($this->input->post('select_table') == "5") {
                        echo "selected";
                    } ?>>dvt_cash_out_by_topup
                    </option>
                    <option value="6" <?php if ($this->input->post('select_table') == "6") {
                        echo "selected";
                    } ?>>ngan_luong_transaction
                    </option>
                </select>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-md-1 col-sm-2 col-xs-12">
                <label for="exampleInputEmail1">Nhà cung cấp:</label>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12">
                <select id="select_partner" name="select_partner" class="form-control">
                    <option value="" <?php if ($this->input->post('select_partner') == "") {
                        echo "selected";
                    } ?>>Chọn
                    </option>
                    <option value="vtc" <?php if ($this->input->post('select_partner') == "vtc") {
                        echo "selected";
                    } ?>>VTC
                    </option>
                    <option value="epay" <?php if ($this->input->post('select_partner') == "epay") {
                        echo "selected";
                    } ?>>EPay
                    </option>
                    <option value="1pay" <?php if ($this->input->post('select_partner') == "1pay") {
                        echo "selected";
                    } ?>>1 Pay
                    </option>
                    <option value="dvt" <?php if ($this->input->post('select_partner') == "dvt") {
                        echo "selected";
                    } ?>>Dịch vụ thẻ
                    </option>

                </select>
            </div>
            <div class="col-md-1 col-sm-2 col-xs-12">
                <label for="exampleInputEmail1">Thuê bao:</label>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12">
                <select id="select_dichvu" name="select_dichvu" class="form-control">
                    <option value="" <?php if ($this->input->post('select_dichvu') == "") {
                        echo "selected";
                    } ?>>Chọn
                    </option>
                    <option value="1" <?php if ($this->input->post('select_dichvu') == "1") {
                        echo "selected";
                    } ?>>Trả trước
                    </option>
                    <option value="2" <?php if ($this->input->post('select_dichvu') == "2") {
                        echo "selected";
                    } ?>>Trả sau
                    </option>

                </select>
            </div>
            <div class="col-md-1 col-sm-2 col-xs-12">
                <input type="submit" id="search_tran" value="Xuất Excel" class="btn btn-success" name="ok">
            </div>
        </div>
    </div>
    </form>

    </div>

    <div class="box-body">

        <?php $this->load->view('admin/error', $this->data); ?>

        <div id="spinner" class="spinner" style="display:none;">
            <img id="img-spinner" src="<?php echo public_url('admin/images/gif-load.gif') ?>" alt="Loading"/>
        </div>
        <div class="text-center">
            <ul id="pagination-demo" class="pagination-sm"></ul>
        </div>
        <div class="modal fade" id="bsModal3" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                    </div>
                    <div class="modal-body">
                        <p style="color: red">Không tồn tại dữ liệu</p>
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

    if ($("#errorinput").val() == 1) {
        $("#bsModal3").modal("show");
    }
</script>

