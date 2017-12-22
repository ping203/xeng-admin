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
                Danh sách source
            </h1>
            <ol class="breadcrumb">
                <a href="<?php echo admin_url('marketing/addsource') ?>" class="btn btn-block btn-success">Thêm source</a>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-body">

                        <label id="resultsearch" style="color: red;"></label>
                        <div class="box-body  table-responsive no-padding">
                            <?php $this->load->view('admin/message', $this->data); ?>
                            <?php $this->load->view('admin/error', $this->data); ?>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example2" class="table  table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <td>STT</td>
                                            <td>Tên</td>
                                            <td>Tên hiển thị</td>
                                            <td>Hành động</td>
                                        </tr>
                                        </thead>
                                        <tbody id="logaction">
                                        <?php $i = 1; ?>
                                        <?php foreach($list as $row): ?>
                                            <tr>
                                                <td class="textC"><?php echo $i; ?></td>
                                                <td><?php echo $row->name ?></td>
                                                <td><?php echo $row->display ?></td>
                                                <td class="option">
                                                    <a href="<?php echo admin_url('marketing/editsource/' . $row->id) ?>" title="Chỉnh sửa" class="tipS ">
                                                        <img src="<?php echo public_url('admin') ?>/images/icons/color/edit.png"/>
                                                    </a>
                                                    <a href="<?php echo admin_url('marketing/deletesource/' . $row->id) ?>" title="Xóa"
                                                       class="tipS verify_action">
                                                        <img src="<?php echo public_url('admin') ?>/images/icons/color/delete.png"/>
                                                    </a>
                                                </td>

                                            </tr>
                                            <?php $i++; ?>
                                        <?php endforeach;?>
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
    $('a.verify_action').click(function () {
        if (!confirm('Bạn chắc chắn muốn xóa ?')) {
            return false;
        }
    });
</script>
