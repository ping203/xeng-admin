<!-- head -->

<!-- head -->

<div class="content-wrapper">
    <?php if ($admin_info->Status == "A"): ?>
        <section class="content-header">
            <h1>
                Cập nhật nhóm người dùng
            </h1>
        </section>
        <section class="content">
            <div class="row">

                <div class="col-md-12">
                    <div class="box box-body">
                        <form id="form" class="form" enctype="multipart/form-data" method="post" action="">
                            <div class="box-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-3 col-md-2">
                                            <label for="exampleInputEmail1">Tên nhóm:</label>
                                        </div>
                                        <div class="col-xs-6 col-md-4">
                                            <input type="text" class="form-control" id="param_name" value="<?php echo $info->Name?>" name="name">
                                        </div>
                                        <div class="col-xs-3 col-md-6">
                                            <label style="color: red"><?php echo form_error('name') ?></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-3 col-md-2">
                                            <label for="exampleInputEmail1">Ghi chú:</label>
                                        </div>
                                        <div class="col-xs-6 col-md-4">
                                            <input type="text" class="form-control"
                                                   value="<?php echo $info->Description?>" id="param_username" name="description">
                                        </div>
                                        <div class="col-xs-3 col-md-6">
                                            <label style="color: red"><?php echo form_error('description') ?></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-3 col-md-2">
                                            <label for="exampleInputEmail1">Phân quyền:</label>
                                        </div>
                                        <div class="col-xs-6 col-md-4">
                                            <a href="<?php echo admin_url('groupuser/role/'.$info->Id)?>" style="color: #0000ff;font-weight: bold">Phân quyền</a>
                                        </div>

                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-3 col-md-2">
                                        </div>
                                        <div class="col-xs-6 col-md-4">
                                            <input type="submit" class="btn btn-success" value="Cập nhật">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    <?php else : ?>
        <section class="content-header">
            <h1>
                Bạn không được phân quyền
            </h1>
        </section>
    <?php endif ?>
</div>