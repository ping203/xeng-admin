<!-- head -->
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
                Log mở khóa tài khoản
            </h1>

        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-body">

                        <label id="resultsearch" style="color: red;"></label>
                        <div class="box-body">
                            <form action="<?php echo admin_url('actionadmin') ?>" method="post">
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
                                            <label for="exampleInputEmail1">Admin:</label>
                                        </div>
                                        <div class="col-md-3 col-sm-4 col-xs-12">
                                            <input type="text" class="form-control"
                                                   id="filter_iname" value="<?php echo $this->input->post('name') ?>"
                                                   name="name">
                                        </div>
                                        <div class="col-md-1 col-sm-2 col-xs-12">
                                            <label for="exampleInputEmail1">Hành động:</label>
                                        </div>
                                        <div class="col-md-3 col-sm-4 col-xs-12">
                                            <input type="text" class="form-control" id="txtaction"
                                                   value="<?php echo $this->input->post('txtaction') ?>"
                                                   name="txtaction">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-1 col-sm-2 col-xs-12">
                                            <label for="exampleInputEmail1">Nick name:</label>
                                        </div>
                                        <div class="col-md-3 col-sm-4 col-xs-12">
                                            <input type="text" class="form-control" id="txtname"
                                                   value="<?php echo $this->input->post('txtname') ?>" name="txtname">
                                        </div>
                                        <div class="col-md-1 col-sm-2 col-xs-12">
                                            <label for="exampleInputEmail1">Lý do:</label>
                                        </div>
                                        <div class="col-md-3 col-sm-4 col-xs-12">
                                            <input type="text" class="form-control" id="txtlydo"
                                                   value="<?php echo $this->input->post('txtlydo') ?>" name="txtlydo">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-1 col-sm-2 col-xs-12">
                                            <label for="exampleInputEmail1">Trạng thái:</label>
                                        </div>
                                        <div class="col-md-3 col-sm-4 col-xs-12">
                                            <select id="lockstatus" name="status" class="form-control">
                                                <option value="1" <?php if ($this->input->post('status') == "1") {
                                                    echo "selected";
                                                } ?>>Khóa tài khoản
                                                </option>
                                                <option value="0" <?php if ($this->input->post('status') == "0") {
                                                    echo "selected";
                                                } ?>>Mở khóa tài khoản
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-md-1 col-sm-2 col-xs-12">
                                        </div>
                                        <div class="col-md-1 col-sm-2 col-xs-12">
                                            <input type="submit" id="search_tran" value="Tìm kiếm"
                                                   class="btn btn-success">
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
                                    <table id="checkAll" class="table  table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <td>STT</td>
                                            <td>Tài khoản admin</td>
                                            <td>Nick game</td>
                                            <td>Hành động</td>
                                            <td>Lý do</td>
                                            <td>Trạng thái</td>
                                            <td>Ngày tạo</td>
                                        </tr>
                                        </thead>
                                        <tbody id="logdongbang">
                                        <?php $stt = 1; ?>
                                        <?php foreach ($list as $row): ?>
                                            <tr class="row_<?php echo $row->id ?>">
                                                <td><?php echo $stt ?></td>
                                                <td>
                                                    <?php echo $row->username ?>
                                                </td>
                                                <td class="col-sm-4" style="word-break: break-all;">
                                                    <?php echo $row->account_name ?>
                                                </td>
                                                <td>
                                                    <?php echo $row->action ?>
                                                </td>
                                                <td>
                                                    <?php echo $row->reason ?>
                                                </td>
                                                <td>
                                                    <?php if ($row->status == "1"): ?>
                                                        <?php echo "Khóa tài khoản" ?>
                                                    <?php elseif ($row->status == "0"): ?>
                                                        <?php echo "Mở khóa tài khoản" ?>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row->timestamp ?>
                                                </td>
                                            </tr>
                                            <?php $stt++; ?>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div id="spinner" class="spinner" style="display:none;">
                                <img id="img-spinner" src="<?php echo public_url('admin/images/gif-load.gif') ?>"
                                     alt="Loading"/>
                            </div>
                            <div class="pagination">
                                <div id="pagination"></div>
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
    $(document).ready(function () {

        Pagging();

    });
    function Pagging() {
        var items = $("#checkAll #logdongbang tr");
        var numItems = items.length;
        console.log(numItems);
        $("#num").html(numItems);
        var perPage = 50;
        // only show the first 2 (or "first per_page") items initially
        items.slice(perPage).hide();
        // now setup pagination
        $("#pagination").pagination({
            items: numItems,
            itemsOnPage: perPage,
            cssStyle: "light-theme",
            onPageClick: function (pageNumber) { // this is where the magic happens
                // someone changed page, lets hide/show trs appropriately
                var showFrom = perPage * (pageNumber - 1);
                var showTo = showFrom + perPage;

                items.hide() // first hide everything, then show for the new page
                    .slice(showFrom, showTo).show();
            }
        });
    }
</script>